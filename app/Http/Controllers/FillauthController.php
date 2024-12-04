<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $resultScore = $request->input('resultScore');
        $answerArray = $request->input('answerArray');
        $idArry = $request->input('idArry');

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
