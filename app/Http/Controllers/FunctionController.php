<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\question;

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
        return view('user.ranking', compact('rankings'));
    }
    public function miss_question()
    {
        return view('user.miss_question');
    }
}
