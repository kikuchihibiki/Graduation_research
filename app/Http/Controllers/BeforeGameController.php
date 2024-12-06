<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                die("makefile");
            }
        }

        $emptyData = json_encode([]);

        if (file_put_contents($filePath, $emptyData)) {
            echo "空のJSONファイルが作成されました: $filePath";
        } else {
            echo "JSONファイルの作成に失敗しました。";
        }
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

            if ($isCorrect === '未回答') {
                continue;
            }

            if (!isset($data[$questionId])) {
                $data[$questionId] = ['正解数' => 0, '誤答数' => 0];
            }

            if ($isCorrect === true) {
                $data[$questionId]['正解数']++;
            } else {
                $data[$questionId]['誤答数']++;
            }
        }

        file_put_contents($filePath, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        var_dump(file_get_contents($filePath));
        return view('user.game_result');
    }

    public function commentary()
    {
        return view('user.commentary');
    }
}
