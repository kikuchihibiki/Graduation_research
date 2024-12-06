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
