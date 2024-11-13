<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeforeGameController extends Controller
{
    public function title_display()
    {
        return view('user.title');
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
        return view('user.game_display', ['mode' => $mode]);
    }
    public function wrong_answer(Request $request)
    {
        $mode = $request->input('mode');
        $request->session()->put('mode', $mode);
        return view('user.game_display', ['mode' => $mode]);
    }
}
