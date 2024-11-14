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
        $question = [
            ['question' => 'HTMLの拡張子は何ですか？', 'answer' => '.html'],
            ['question' => 'Webアプリケーションの開発に広く使用されるPythonの軽量フレームワークは何ですか？', 'answer' => 'flask'],
            ['question' => 'PythonでHTTPリクエストを処理するためのライブラリは何ですか？', 'answer' => 'requests'],
            ['question' => 'PythonでJSONデータを処理するための標準ライブラリは何ですか？', 'answer' => 'json'],
            ['question' => '整数型のデータタイプは何ですか？', 'answer' => 'int'],
            ['question' => '小数点数のデータタイプは何ですか？', 'answer' => 'float']
        ];
        return view('user.game_display', [
            'mode' => $mode,
            'question' => $question
        ]);
    }
    public function wrong_answer(Request $request)
    {
        $mode = $request->input('mode');
        $request->session()->put('mode', $mode);
        $question = [
            'question' => '問題です',
            'answer' => '解答です'
        ];
        return view('user.game_display', [
            'mode' => $mode,
            'question' => $question
        ]);
    }
}
