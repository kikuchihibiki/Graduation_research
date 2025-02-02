<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\question;
use Illuminate\Support\Facades\DB;
use App\Models\ranking_result;
use GrahamCampbell\ResultType\Success;

class FunctionController extends Controller
{
    public function question_list(Request $request)
    {
        $userData = $request->input('user_data', []);
        $questionModes = [0 => 'java', 1 => 'python', 2 => 'php']; // 言語の名前
        $questionLevels = [0 => 'easy', 1 => 'normal', 2 => 'hard']; // 難易度の名前

        $questions = [];

        foreach ($questionModes as $mode => $modeName) {
            foreach ($questionLevels as $level => $levelName) {
                $questions[$modeName][$levelName] = question::where('mode', $mode)
                    ->where('level', $level)
                    ->where('delete_flag', 0)
                    ->get();
            }
        }
        session(([
            'questions' => $questions,
            'userData' => $userData,
        ]));
        return response()->json(["success" => true]);
    }

    public function show_question_list()
    {
        $questions = session('questions');
        $userData = session('userData');
        return view('user.question_list', [
            'questions' => $questions,
            'userData' => $userData
        ]);
    }
    public function ranking(request $request)
    {
        $modes = [0 => 'java', 1 => 'python', 2 => 'php'];
        $levels = [0 => 'easy', 1 => 'normal', 2 => 'hard'];

        $rankings = [];

        foreach ($modes as $modeKey => $mode) {
            foreach ($levels as $levelKey => $level) {
                // 各モードとレベルに対応するランキングを取得
                $rankings["{$mode}{$level}"] = Ranking::where('mode', $modeKey)
                    ->where('level', $levelKey)
                    ->orderBy('rank', 'asc') // 順位で並べる
                    ->orderBy('score', 'desc') // スコアで並べる
                    ->orderBy('created_at', 'desc') // スコアが同じなら新しい順
                    ->take(5) // 上位5件のみ取得
                    ->get();
            }
        }


        // ファイルパスの設定
        $scores = $request->input('scores', []);

        $scoreMode = ['java', 'python', 'php'];
        $scoreLevel = ['easy', 'normal', 'hard'];

        // ランキングのリセット情報を取得
        $ranking_reset = [];
        foreach ($scoreMode as $modeKey => $mode) {
            foreach ($scoreLevel as $levelKey => $level) {
                $ranking_reset["{$mode}{$level}"] = ranking_result::where('mode', $modeKey)
                    ->where('level', $levelKey)
                    ->orderBy('created_at', 'desc')
                    ->first();
            }
        }

        // JSONファイルのスコアをモードと難易度ごとにグループ化
        $fileScore = [];
        foreach ($scoreMode as $mode) {
            foreach ($scoreLevel as $level) {
                $fileScore["{$mode}{$level}"] = array_filter($scores, function ($score) use ($mode, $level) {
                    return $score['m'] === $mode && $score['l'] === $level;
                });
            }
        }

        // スコアが有効かどうかをフィルタリング
        $validScores = [];
        foreach ($scoreMode as $mode) {
            foreach ($scoreLevel as $level) {
                $key = "{$mode}{$level}";
                if (isset($ranking_reset[$key]) && isset($ranking_reset[$key]->created_at)) {
                    $validScores[$key] = array_filter($fileScore[$key], function ($score) use ($ranking_reset, $key) {
                        return $score['d'] > $ranking_reset[$key]->created_at;
                    });
                } else {
                    $validScores[$key] = $fileScore[$key];
                }

                // 各配列から "s" が最も高いスコアを選別
                if (!empty($validScores[$key])) {
                    $highestScores[$key] = array_reduce($validScores[$key], function ($carry, $item) {
                        return ($carry === null || $item['s'] > $carry['s']) ? $item : $carry;
                    });
                } else {
                    $highestScores[$key] = null;
                }
            }
        }
        session(([
            'rankings' => $rankings,
            'validScores' => $highestScores
        ]));
        return response()->json(["success" => true]);
    }
    public function show_ranking()
    {
        $rankings = session('rankings');
        $validScores = session('validScores');
        return view('user.ranking', [
            'rankings' => $rankings,
            'validScores' => $validScores
        ]);
    }
    public function miss_question()
    {
        return view('user.miss_question');
    }

    public function progress_reset()
    {
        $userDirectory = getenv('APPDATA');
        $appName = 'my_name';
        $subDirectory = 'user_data';
        $filename = 'user_data.json';

        $directoryPath = $userDirectory . DIRECTORY_SEPARATOR . $appName . DIRECTORY_SEPARATOR . $subDirectory;
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $filename;

        if (file_exists($filePath)) {
            $userData = json_decode(file_get_contents($filePath), true);
        } else {
            $userData = [];
        }

        // 配列をリセット（中身を空にする）
        $userData = [];

        // 必要であれば、リセット後にその内容をファイルに保存することもできます
        file_put_contents($filePath, json_encode($userData, JSON_PRETTY_PRINT));
        return redirect('/question_list');
    }

    public function score_reset()
    {
        $userDirectory = getenv('APPDATA');
        $appName = 'my_name';
        $subDirectory = 'user_data';
        $filename = 'score_data.json';

        $directoryPath = $userDirectory . DIRECTORY_SEPARATOR . $appName . DIRECTORY_SEPARATOR . $subDirectory;
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $filename;

        if (file_exists($filePath)) {
            $userData = json_decode(file_get_contents($filePath), true);
        } else {
            $userData = [];
        }

        // 配列をリセット（中身を空にする）
        $userData = [];

        // 必要であれば、リセット後にその内容をファイルに保存することもできます
        file_put_contents($filePath, json_encode($userData, JSON_PRETTY_PRINT));
        return redirect('/ranking');
    }
}
