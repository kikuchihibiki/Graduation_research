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
        $missCount = $request->input('missCount');

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
            'missCount' => $missCount,
            'newScore'  => $newScore
        ]));
        $quizData = [
            'newScore'  => $newScore,
            'idJson' => $idJson,
            'clearFlag' => $clearFlag,
        ];
        return response()->json($quizData);
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
        $quizData = [
            'idJson' => $idJson,
        ];
        return response()->json($quizData);
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
