<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\question;
use Illuminate\Support\Facades\DB;

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

        // 質問をモードごとに取得し、回答状況を追加
        $questionsJava = question::where('mode', 0)->where('delete_flag', 0)->get();
        $questionsPython = question::where('mode', 1)->where('delete_flag', 0)->get();
        // コントローラー内での確認
        $questionsPHP = Question::where('mode', 2)->where('delete_flag', 0)->get();
        dd($questionsPHP);


        // 各モードの質問に回答状況を追加
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

        // モードとレベルの組み合わせ
        $modes = ['python', 'php', 'java'];
        $levels = ['easy', 'normal', 'hard'];

        // ranking_resultテーブルから最新のリセット日時を取得
        $resetResults = DB::table('ranking_result')
            ->select('mode', 'level', DB::raw('MAX(created_at) as last_reset'))
            ->where('delete_flag', 0)
            ->groupBy('mode', 'level')
            ->get();

        // 配列を初期化
        $result = [];

        // 組み合わせごとに初期値を設定
        foreach ($modes as $mode) {
            foreach ($levels as $level) {
                $key = "{$mode}{$level}"; // わかりやすい配列名
                $result[$key] = null; // デフォルト値をnullに設定
            }
        }

        // JSONデータから有効な最高スコアを取得
        foreach ($scores as $score) {
            $mode = $score['m'];
            $level = $score['l'];
            $scoreValue = $score['s'];
            $date = $score['d'];

            // 対象のリセット日時を取得
            $reset = $resetResults->first(function ($item) use ($mode, $level) {
                return $item->mode == $mode && $item->level == $level;
            });

            // リセット日時以降のスコアのみ対象
            if ($reset && $date <= $reset->last_reset) {
                continue; // 無効スコアはスキップ
            }

            // モードとレベルごとの最高スコアを更新
            $key = "{$mode}{$level}";
            if (!isset($result[$key]) || $result[$key]['s'] < $scoreValue) {
                $result[$key] = [
                    'mode' => $mode,
                    'level' => $level,
                    's' => $scoreValue,
                    'd' => $date,
                ];
            }
        }
        return view('user.ranking', ['rankings' => $rankings, 'results' => $result]);
    }
    public function miss_question()
    {
        return view('user.miss_question');
    }
}
