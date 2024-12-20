<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\question;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        // authミドルウェアをすべてのメソッドに適用
        $this->middleware('auth')->except(['admin']);
    }

    public function admin()
    {
        return view('admin.admin');
    }

    public function admin_menu()
    {
        return view('admin.admin_menu');
    }

    public function admin_password()
    {
        return view('admin.admin_passreset');
    }

    public function admin_select(Request $request)
    {
        $selectedMenu = $request->input('menu');

        switch ($selectedMenu) {
            case 'list':
                $questionsJava = question::where('mode', 0)->where('delete_flag', 0)->get();
                $questionsPython = question::where('mode', 1)->where('delete_flag', 0)->get();
                $questionsPHP = Question::where('mode', 2)->where('delete_flag', 0)->get();

                return view('admin.admin_questionlist',['questionsJava' => $questionsJava,
            'questionsPython' => $questionsPython,
            'questionsPHP' => $questionsPHP,
            ]);
            case 'ranking':
                $modes = [0 => 'java', 1 => 'python', 2 => 'php'];
                $levels = [0 => 'easy', 1 => 'normal', 2 => 'hard'];

                $rankings = [];

                foreach ($modes as $modeKey => $mode) {
                    foreach ($levels as $levelKey => $level) {
                        $rankings["{$mode}{$level}"] = Ranking::where('mode', $modeKey)
                            ->where('level', $levelKey)
                            ->orderBy('rank', 'asc')
                            ->get();
                    }
                }
                return view('admin.admin_ranking', compact('rankings'));
            case 'admin_add':
                return view('admin.admin_newAdmin');
                // case 'logout':
                //     auth()->logout();
                //     return view('auth.login');
                // default:
                //     return view('admin.admin');
        }
    }

    public function delete_ranking(Request $request)
    {
        $rankingIds = $request->input('id');

        if (!is_array($rankingIds)) {
            $rankingIds = [$rankingIds];
        }

        if ($rankingIds) {
            Ranking::whereIn('id', $rankingIds)->delete();
        }

        return redirect('/redirect_ranking');
    }

    public function redirect_ranking()
    {
        $modes = [0 => 'java', 1 => 'python', 2 => 'php'];
        $levels = [0 => 'easy', 1 => 'normal', 2 => 'hard'];

        $rankings = [];

        foreach ($modes as $modeKey => $mode) {
            foreach ($levels as $levelKey => $level) {
                $rankings["{$mode}{$level}"] = Ranking::where('mode', $modeKey)
                    ->where('level', $levelKey)
                    ->orderBy('rank', 'asc')
                    ->get();
            }
        }
        return view('admin.admin_ranking', compact('rankings'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('/admin_menu');
    }
}
