<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\question;
use App\Models\ranking;

class BeforeGameController extends Controller
{
    public function title_display()
    {
        $userDirectory = getenv('APPDATA');

        $appName = 'my_name';
        $subDirectory = 'user_data';
        $filename = 'user_data.json';

        $directoryPath = $userDirectory . DIRECTORY_SEPARATOR . $appName . DIRECTORY_SEPARATOR . $subDirectory;
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $filename;

        if (!is_dir($directoryPath)) {
            if (!mkdir($directoryPath, 0777, true)) {
                $message = "ディレクトリの作成に失敗しました";
            }
        }

        if (!file_exists($filePath)) {
            $emptyData = json_encode([]);
            if (file_put_contents($filePath, $emptyData) === false) {
                $message = "jsonファイルの作成に失敗しました";
            }
        } else {
            $fileContents = file_get_contents($filePath);
            $data = json_decode($fileContents, true);

            if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                $emptyData = json_encode([]);
                if (file_put_contents($filePath, $emptyData) === false) {
                    $message = "不正なjsonファイルです";
                }
                $message = "jsonファイルを初期化しました";
            } else {
                $message = "内容を保持しています";
            }
        }

        return view('user.title', ['massage' => $message]);
    }
    public function save_name(Request $request)
    {
        $name = $request->input('name');
        $request->session()->put('name', $name);
        return view('user.setup');
    }

    public function select_mode()
    {
        return view('user.select_mode');
    }

    public function save_mode(Request $request)
    {
        $mode = $request->input('mode');
        $request->session()->put('mode', $mode);
        if ($mode == 'miss_question') {
            return view('user.wrong_select');
        }
        $timeLimits = [
            'java' => [15, 15, 10],
            'python' => [10, 10, 7],
            'php' => [12, 12, 8],
        ];
        $timeLimit = $timeLimits[$mode] ?? null;
        return view('user.select_level', ['timeLimit' => $timeLimit]);
    }

    public function start_game(Request $request)
    {
        $mode = $request->session()->get('mode');
        $level = $request->input('level');
        if ($level == 'back') {
            return redirect('/select_mode');
        }
        $request->session()->put('level', $level);

        $modeNumber = ['java' => 0, 'python' => 1, 'php' => 2][$mode] ?? null;
        $levelNumber = ['easy' => 0, 'normal' => 1, 'hard' => 2][$level] ?? null;

        $timeLimits = [
            'java' => [15, 15, 10],
            'python' => [10, 10, 7],
            'php' => [12, 12, 8],
        ];
        $timeLimit = $timeLimits[$mode][$levelNumber] ?? null;

        if ($levelNumber !== 2) {
            $questions = question::where('mode', $modeNumber)
                ->where('level', $levelNumber)
                ->where('difficulty_flag', 0)
                ->inRandomOrder()
                ->limit(5)
                ->get();

            $difficultyQuestion = question::where('mode', $modeNumber)
                ->where('level', $levelNumber)
                ->where('difficulty_flag', 1)
                ->inRandomOrder()
                ->first();

            $questions->push($difficultyQuestion);
        } else {
            $questions = question::where('mode', $modeNumber)
                ->whereIn('level', [1, 2])
                ->where('difficulty_flag', 0)
                ->inRandomOrder()
                ->get()
                ->groupBy('level');

            $normalQuestions = $questions[1]->take(3);
            $hardQuestions = $questions[2]->take(2);

            $difficultyQuestion = question::where('mode', $modeNumber)
                ->where('level', 2)
                ->where('difficulty_flag', 1)
                ->inRandomOrder()
                ->first();

            $questions = $normalQuestions->concat($hardQuestions);

            if ($difficultyQuestion) {
                $questions->push($difficultyQuestion);
            }
        }

        return view('user.game_display', [
            'mode' => $mode,
            'level' => $level,
            'question' => $questions,
            'TimeLimit' => $timeLimit
        ]);
    }

    public function wrong_answer(Request $request)
    {
        $mode = $request->input('mode');
        $modeNumber = ['java' => 0, 'python' => 1, 'php' => 2][$mode] ?? null;
        $flag = true;
        $userDirectory = getenv('APPDATA');
        $appName = 'my_name';
        $subDirectory = 'user_data';
        $filename = 'user_data.json';

        $directoryPath = $userDirectory . DIRECTORY_SEPARATOR . $appName . DIRECTORY_SEPARATOR . $subDirectory;
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $filename;

        // 2. JSONファイルを読み込む
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $jsonData = file_get_contents($filePath);
        $userData = json_decode($jsonData, true);

        // 3. 誤答数が1以上の問題IDを抽出
        $incorrectQuestions = [];
        foreach ($userData as $id => $stats) {
            if ($stats['誤答数'] >= 1) {
                $correctRate = $stats['正解数'] / ($stats['正解数'] + $stats['誤答数']);
                $incorrectQuestions[$id] = $correctRate;
            }
        }

        // 誤答数が1以上の問題が一つもない場合、$flagをfalseに設定
        if (empty($incorrectQuestions)) {
            $flag = false;
        }

        $wrong_questions = Question::whereIn('id', array_keys($incorrectQuestions))->get();
        $filtered_questions = $wrong_questions->filter(function ($question) use ($modeNumber) {
            return $question->mode == $modeNumber;
        });

        $accuracyArray = []; // Initialize accuracy array

        if (count($filtered_questions) == 0) {
            $flag = false;
        }
        if (count($filtered_questions) < 6) {
            $need_questions = 6 - count($filtered_questions);
            $correct100Percent = array_filter($userData, function ($data) {
                return $data['誤答数'] === 0;
            });
            $correct100Percent = array_keys($correct100Percent);
            $randomCorrect100Percent = (count($correct100Percent) >= $need_questions)
                ? array_rand(array_flip($correct100Percent), $need_questions)
                : $correct100Percent;
            $correct100Percent_questions = Question::whereIn('id', $randomCorrect100Percent)->get();
            $questionData = $filtered_questions->merge($correct100Percent_questions);

            foreach ($questionData as $question) {
                $questionId = $question->id;
                if (isset($userData[$questionId])) {
                    $correctCount = $userData[$questionId]['正解数'];
                    $incorrectCount = $userData[$questionId]['誤答数'];

                    // 正答率の計算
                    $totalAnswers = $correctCount + $incorrectCount;

                    if ($totalAnswers > 0) {
                        $correctRate = $correctCount / $totalAnswers;
                    } else {
                        $correctRate = 0;  // 回答がない場合は0%
                    }
                    $accuracyArray[$questionId] = $correctRate; // Store in accuracyArray
                } else {
                    // JSONデータに問題IDがない場合は、正答率を0とする
                    $accuracyArray[$questionId] = 0;
                }
            }
        } else {
            foreach ($filtered_questions as $question) {
                $questionId = $question->id;
                if (isset($userData[$questionId])) {
                    $correctCount = $userData[$questionId]['正解数'];
                    $incorrectCount = $userData[$questionId]['誤答数'];

                    // 正答率の計算
                    $totalAnswers = $correctCount + $incorrectCount;

                    if ($totalAnswers > 0) {
                        $correctRate = $correctCount / $totalAnswers;
                    } else {
                        $correctRate = 0;  // 回答がない場合は0%
                    }
                    $accuracyArray[$questionId] = $correctRate; // Store in accuracyArray
                } else {
                    // JSONデータに問題IDがない場合は、正答率を0とする
                    $accuracyArray[$questionId] = 0;
                }
            }
            asort($accuracyArray);
            $accuracyArray = array_slice($accuracyArray, 0, 6, true);
            $questionData = Question::whereIn('id', array_keys($accuracyArray))->get();
        }

        return view('user.miss_display', [
            'question' => $questionData,
            'correctRates' => array_values($accuracyArray), // Convert to numeric array
            'timeLimit' => 15,
            'flag' => $flag
        ]);
    }

    public function game_result_show()
    {
        $userDirectory = getenv('APPDATA');

        $appName = 'my_name';
        $subDirectory = 'user_data';
        $filename = 'user_data.json';

        $directoryPath = $userDirectory . DIRECTORY_SEPARATOR . $appName . DIRECTORY_SEPARATOR . $subDirectory;
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $filename;
        $idJson = session('idJson');

        $data = [];
        if (file_exists($filePath)) {
            $data = json_decode(file_get_contents($filePath), true);
        }

        foreach ($idJson as $idJsons) {
            $questionId = $idJsons['id'];
            $isCorrect = $idJsons['answer'];

            if (is_null($isCorrect)) {
                continue;
            }

            if (!isset($data[$questionId])) {
                $data[$questionId] = ['正解数' => 0, '誤答数' => 0];
            }

            if ($isCorrect === true) {
                $data[$questionId]['正解数']++;
            } elseif ($isCorrect === false) {
                $data[$questionId]['誤答数']++;
            }
        }

        file_put_contents($filePath, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));


        $name = session()->get('name');
        $mode = session()->get('mode');
        $level = session()->get('level');
        $clearFlag = session()->get('clearFlag');
        $resultScore = session()->get('resultScore');
        $modeNumber = ['java' => 0, 'python' => 1, 'php' => 2][$mode] ?? null;
        $levelNumber = ['easy' => 0, 'normal' => 1, 'hard' => 2][$level] ?? null;


        if ($clearFlag) {
            $rankings = Ranking::where('mode', $modeNumber)
                ->where('level', $levelNumber)
                ->orderBy('rank', 'asc')
                ->get();

            $rankLen = count($rankings);
            Ranking::create([
                'name' => $name,
                'score' => $resultScore,
                'mode' => $modeNumber,
                'level' => $levelNumber,
                'rank' => $rankLen
            ]);

            //ランキング取得    
            $updatedRankings = Ranking::where('mode', $modeNumber)
                ->where('level', $levelNumber)
                ->orderBy('score', 'desc')
                ->get();

            // 新しい順位に基づいて rank を更新
            foreach ($updatedRankings as $index => $ranking) {
                $ranking->rank = $index + 1;
                $ranking->save();
            }
        };

        return view('user.game_result');
    }

    public function miss_result_show()
    {
        return view('user.game_result');
    }

    public function commentary()
    {
        return view('user.commentary');
    }
    public function back_commentary()
    {
        return view('user.game_result');
    }

    public function game_restart()
    {
        $mode = session()->get('mode');
        $level = session()->get('level');
        $modeNumber = ['java' => 0, 'python' => 1, 'php' => 2][$mode] ?? null;
        $levelNumber = ['easy' => 0, 'normal' => 1, 'hard' => 2][$level] ?? null;

        $timeLimits = [
            'java' => [15, 15, 10],
            'python' => [10, 10, 7],
            'php' => [12, 12, 8],
        ];
        $timeLimit = $timeLimits[$mode][$levelNumber] ?? null;

        if ($levelNumber !== 2) {
            $questions = question::where('mode', $modeNumber)
                ->where('level', $levelNumber)
                ->inRandomOrder()
                ->limit(5)
                ->get();

            $difficultyQuestion = question::where('mode', $modeNumber)
                ->where('level', $levelNumber)
                ->where('difficulty_flag', 1)
                ->inRandomOrder()
                ->first();

            $questions->push($difficultyQuestion);
        } else {
            $questions = question::where('mode', $modeNumber)
                ->whereIn('level', [1, 2])
                ->inRandomOrder()
                ->get()
                ->groupBy('level');

            $normalQuestions = $questions[1]->take(3);
            $hardQuestions = $questions[2]->take(2);

            $difficultyQuestion = question::where('mode', $modeNumber)
                ->where('level', 2)
                ->where('difficulty_flag', 1)
                ->inRandomOrder()
                ->first();

            $questions = $normalQuestions->concat($hardQuestions);

            if ($difficultyQuestion) {
                $questions->push($difficultyQuestion);
            }
        }

        return view('user.game_display', [
            'mode' => $mode,
            'level' => $level,
            'question' => $questions,
            'TimeLimit' => $timeLimit
        ]);
    }

    public function question_commentary($id)
    {
        $commentary = question::where('id', $id)->first();
        return view('user.individual_commentary', compact('commentary'));
    }
}
