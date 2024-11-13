<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunctionController extends Controller
{
    public function question_list()
    {
        return view('user.question_list');
    }
    public function ranking()
    {
        return view('user.ranking');
    }
    public function miss_question()
    {
        return view('user.miss_question');
    }
}
