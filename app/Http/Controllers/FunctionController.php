<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\question;
use Illuminate\Support\Facades\DB;
use App\Models\ranking_result;

class FunctionController extends Controller
{
    public function question_list()
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

        $questionsJava = question::where('mode', 0)->where('delete_flag', 0)->get();
        $questionsPython = question::where('mode', 1)->where('delete_flag', 0)->get();
        $questionsPHP = Question::where('mode', 2)->where('delete_flag', 0)->get();

        $questionsJava->map(function ($question) use ($userData) {
            $questionId = $question->id;
            $question->answer_status = isset($userData[$questionId]) ? '回答済み' : '未回答';
            return $question;
        });

        $questionsPython->map(function ($question) use ($userData) {
            $questionId = $question->id;
            $question->answer_status = isset($userData[$questionId]) ? '回答済み' : '未回答';
            return $question;
        });

        $questionsPHP->map(function ($question) use ($userData) {
            $questionId = $question->id;
            $question->answer_status = isset($userData[$questionId]) ? '回答済み' : '未回答';
            return $question;
        });

        return view('user.question_list', [
            'questionsJava' => $questionsJava,
            'questionsPython' => $questionsPython,
            'questionsPHP' => $questionsPHP,
            'userData' => $userData,
        ]);
    }
    public function ranking()
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
        $userDirectory = getenv('APPDATA');
        $appName = 'my_name';
        $subDirectory = 'user_data';
        $filename = 'score_data.json';
        $directoryPath = $userDirectory . DIRECTORY_SEPARATOR . $appName . DIRECTORY_SEPARATOR . $subDirectory;
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $filename;

        // JSONファイル読み込み
        if (file_exists($filePath)) {
            $scores = json_decode(file_get_contents($filePath), true);
        } else {
            $scores = [];
        }

        $scoreMode = ['java', 'python', 'php'];
        $scoreLevel = ['easy', 'normal', 'hard'];

        foreach ($modes as $modeKey => $mode) {
            foreach ($levels as $levelKey => $level) {
                $ranking_reset["{$mode}{$level}"] = ranking_result::where('mode', $modeKey)
                    ->where('level', $levelKey)
                    ->orderBy('created_at', 'desc')
                    ->first();
            }
        }
        // jsonファイルのスコアからモードと難易度の組み合わせごとに配列に格納する
        // モードと難易度ごとにスコアを配列に格納する
        foreach ($scoreMode as $mode) {
            foreach ($scoreLevel as $level) {
                // 条件に一致するスコアをフィルタリングして格納
                $fileScore["{$mode}{$level}"] = array_filter($scores, function ($score) use ($mode, $level) {
                    return $score['m'] === $mode && $score['l'] === $level;
                });
            }
        }

        foreach ($scoreMode as $mode) {
            foreach ($scoreLevel as $level) {
                $key = "{$mode}{$level}";
                if (isset($ranking_reset[$key]) && isset($ranking_reset[$key]->created_at)) {
                    // $ranking_reset[$key] が存在し、created_at がある場合のみフィルタリング
                    $validScores[$key] = array_filter($fileScore[$key], function ($score) use ($ranking_reset, $key) {
                        return $score['d'] > $ranking_reset[$key]->created_at;
                    });
                } else {
                    // $ranking_reset[$key] が存在しない場合は元のデータをそのまま使用
                    $validScores[$key] = $fileScore[$key];
                }

                // 各配列から "s" が最も高いスコアを選別
                if (!empty($validScores[$key])) {
                    $highestScores[$key] = array_reduce($validScores[$key], function ($carry, $item) {
                        return ($carry === null || $item['s'] > $carry['s']) ? $item : $carry;
                    });
                } else {
                    // スコアが存在しない場合は null を設定
                    $highestScores[$key] = null;
                }
            }
        }
        return view('user.ranking', ['rankings' => $rankings, 'validScores' => $highestScores]);
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
