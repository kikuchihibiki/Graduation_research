<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;

class FunctionController extends Controller
{
    public function question_list()
    {
        return view('user.question_list');
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
