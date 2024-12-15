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
        return view('user.select_level');
    }

    public function start_game(Request $request)
    {
        $mode = $request->session()->get('mode');
        $level = $request->input('level');
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
    public function wrong_answer()
    {
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

        // 4. 正答率が低い順にソート
        asort($incorrectQuestions); // 正答率が低い順にソート

        // 5. 6問未満の場合、ランダムに追加して6問にする
        if (count($incorrectQuestions) < 6) {
            $remainingCount = 6 - count($incorrectQuestions);
            $allQuestionIds = array_keys($userData);
            $additionalIds = array_diff($allQuestionIds, array_keys($incorrectQuestions));

            if (!empty($additionalIds)) {
                $randomIds = array_rand($additionalIds, min($remainingCount, count($additionalIds)));

                // array_rand returns a single value if the count is 1
                if (!is_array($randomIds)) {
                    $randomIds = [$randomIds];
                }

                foreach ($randomIds as $id) {
                    $stats = $userData[$additionalIds[$id]];
                    $correctRate = $stats['正解数'] / ($stats['正解数'] + $stats['誤答数']);
                    $incorrectQuestions[$additionalIds[$id]] = $correctRate;
                }
            }
        }

        // 6. 上位6問を選択
        $incorrectQuestions = array_slice($incorrectQuestions, 0, 6, true);

        // 7. DBから問題情報を取得
        $questions = Question::whereIn('id', array_keys($incorrectQuestions))->get();

        // 8. 配列の順序を対応させる
        $questionData = [];
        $correctRates = [];
        foreach ($questions as $question) {
            $stats = $userData[$question->id];
            $correctRate = $stats['正解数'] / ($stats['正解数'] + $stats['誤答数']);

            $questionData[] = $question;
            $correctRates[] = $correctRate;
        }

        return view('user.miss_display', [
            'question' => $questionData,
            'correctRates' => $correctRates,
            'timeLimit' => 15
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

        var_dump('jsonfile', file_get_contents($filePath));
        var_dump('結果', $idJson);

        $name = session()->get('name');
        $mode = session()->get('mode');
        $level = session()->get('level');
        $resultScore = session()->get('resultScore');
        $modeNumber = ['java' => 0, 'python' => 1, 'php' => 2][$mode] ?? null;
        $levelNumber = ['easy' => 0, 'normal' => 1, 'hard' => 2][$level] ?? null;



        $rankings = Ranking::where('mode', $modeNumber)
            ->where('level', $levelNumber)
            ->orderBy('rank', 'asc')
            ->get();

        // 新しいスコアを挿入する場合
        if ($rankings->count() < 5 || $rankings->last()->score < $resultScore) {
            // データを保存
            Ranking::create([
                'name' => $name,
                'score' => $resultScore,
                'mode' => $modeNumber,
                'level' => $levelNumber,
                'rank' => 6 // 一時的に6位として挿入
            ]);

            // ランキングをスコア順に再取得し、rankを更新
            $updatedRankings = Ranking::where('mode', $modeNumber)
                ->where('level', $levelNumber)
                ->orderBy('score', 'desc')
                ->take(5) // 上位5件のみ
                ->get();

            // 新しい順位に基づいて rank を更新
            foreach ($updatedRankings as $index => $ranking) {
                $ranking->rank = $index + 1;
                $ranking->save();
            }

            // 6位以下を削除
            Ranking::where('mode', $modeNumber)
                ->where('level', $levelNumber)
                ->where('rank', '>', 5)
                ->delete();
        }
        return view('user.game_result');
    }

    public function commentary()
    {
        return view('user.commentary');
    }

    public function game_restart()
    {
        $mode = session()->get('mode');
        $level = session()->get('level');
        $question = [
            ['id' => '1', 'question' => 'HTMLの拡張子は何ですか？', 'answer' => '.html'],
            ['id' => '2', 'question' => 'Webアプリケーションの開発に広く使用されるPythonの軽量フレームワークは何ですか？', 'answer' => 'flask'],
            ['id' => '3', 'question' => 'PythonでHTTPリクエストを処理するためのライブラリは何ですか？', 'answer' => 'requests'],
            ['id' => '4', 'question' => 'PythonでJSONデータを処理するための標準ライブラリは何ですか？', 'answer' => 'json'],
            ['id' => '5', 'question' => '整数型のデータタイプは何ですか？', 'answer' => 'int'],
            ['id' => '6', 'question' => '小数点数のデータタイプは何ですか？', 'answer' => 'float']
        ];
        $TimeLimit = 15;
        return view('user.game_display', [
            'mode' => $mode,
            'level' => $level,
            'question' => $question,
            'TimeLimit' => $TimeLimit
        ]);
    }
}
