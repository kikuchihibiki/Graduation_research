<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ranking;

class FillauthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function game_result(Request $request)
    {
        $correctAnswers = $request->input('correctAnswers');
        $totalQuestions = $request->input('totalQuestions');
        $answerArray = $request->input('answerArray');
        $idArry = $request->input('idArry');
        $questionData = $request->input('questionArray');
        $level = $request->input('level');
        $mode = $request->input('mode');
        $resultScore = $request->input('resultScore');
        $clearFlag = $request->input('clearFlag');

        $userDirectory = getenv('APPDATA');
        $appName = 'my_name';
        $subDirectory = 'user_data';
        $filename = 'score_data.json';

        $directoryPath = $userDirectory . DIRECTORY_SEPARATOR . $appName . DIRECTORY_SEPARATOR . $subDirectory;
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $filename;

        // ディレクトリを作成
        if (!is_dir($directoryPath)) {
            if (!mkdir($directoryPath, 0777, true)) {
                return response()->json(['message' => 'ディレクトリの作成に失敗しました'], 500);
            }
        }

        // JSONファイルを作成または既存のデータを読み取る
        if (!file_exists($filePath)) {
            // ファイルが存在しない場合、空の配列を初期化
            $scoreData = [];
            if (file_put_contents($filePath, json_encode($scoreData, JSON_PRETTY_PRINT)) === false) {
                return response()->json(['message' => 'JSONファイルの作成に失敗しました'], 500);
            }
        } else {
            // ファイルが存在する場合、内容を読み取る
            $fileContents = file_get_contents($filePath);
            $scoreData = json_decode($fileContents, true);

            // JSONデータが不正な場合、空の配列を初期化
            if ($scoreData === null && json_last_error() !== JSON_ERROR_NONE) {
                $scoreData = [];
                if (file_put_contents($filePath, json_encode($scoreData, JSON_PRETTY_PRINT)) === false) {
                    return response()->json(['message' => '不正なJSONファイルです'], 500);
                }
            }
        }

        // リクエストデータを受け取り、新しいスコアデータを作成
        $level = $request->input('level');
        $mode = $request->input('mode');
        $resultScore = $request->input('resultScore');

        // 現在の日付を取得
        $date = date('Y-m-d H:i:s');

        // スコアデータを追加
        $newScore = [
            'l' => $level,
            'm' => $mode,
            's' => $resultScore,
            'd' => $date,
        ];
        $scoreData[] = $newScore;

        // JSONファイルに保存
        if ($clearFlag) {
            // スコアデータをJSONにエンコードしてファイルに書き込み
            if (file_put_contents($filePath, json_encode($scoreData, JSON_PRETTY_PRINT)) === false) {
                return response()->json(['message' => 'JSONファイルへの書き込みに失敗しました'], 500);
            }
        }
        $idJson = [];
        for ($i = 0; $i < count($idArry); $i++) {
            $idJson[] = [
                'id' => $idArry[$i],
                'answer' => $answerArray[$i]
            ];
        };

        $showAnswers = array_map(function ($value) {
            if ($value === true) {
                return '〇';
            } elseif ($value === false) {
                return '☓';
            } else {
                return '未回答';
            }
        }, $answerArray);


        session(([
            'correctAnswers' => $correctAnswers,
            'totalQuestions' => $totalQuestions,
            'resultScore' => $resultScore,
            'answerArray' => $showAnswers,
            'idArry' => $idArry,
            'idJson' => $idJson,
            'questionData' => $questionData,
            'clearFlag' => $clearFlag,
        ]));
        return response()->json(['success' => true]);
    }

    public function miss_result(Request $request)
    {
        $correctAnswers = $request->input('correctAnswers');
        $totalQuestions = $request->input('totalQuestions');
        $answerArray = $request->input('answerArray');
        $idArry = $request->input('idArry');
        $questionData = $request->input('questionArray');
        $resultScore = $request->input('resultScore');

        $idJson = [];
        for ($i = 0; $i < count($idArry); $i++) {
            $idJson[] = [
                'id' => $idArry[$i],
                'answer' => $answerArray[$i]
            ];
        };

        $showAnswers = array_map(function ($value) {
            if ($value === true) {
                return '〇';
            } elseif ($value === false) {
                return '☓';
            } else {
                return '未回答';
            }
        }, $answerArray);


        session(([
            'correctAnswers' => $correctAnswers,
            'totalQuestions' => $totalQuestions,
            'resultScore' => $resultScore,
            'answerArray' => $showAnswers,
            'idArry' => $idArry,
            'idJson' => $idJson,
            'questionData' => $questionData,
        ]));
        return response()->json(['success' => true]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
