<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\question;
use Illuminate\Support\Facades\Validator;
use App\Models\ranking_result;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

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

                return view('admin.admin_questionlist', [
                    'questionsJava' => $questionsJava,
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
                foreach ($modes as $modeKey => $mode) {
                    foreach ($levels as $levelKey => $level) {
                        $ranking_reset["{$mode}{$level}"] = ranking_result::where('mode', $modeKey)
                            ->where('level', $levelKey)
                            ->orderBy('created_at', 'desc')
                            ->first();
                    }
                }
                return view('admin.admin_ranking', compact('rankings'), compact('ranking_reset'));
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
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.register')
                ->withErrors($validator)
                ->withInput();
        }

        // ランダムなパスワードを生成
        $randPassword = Str::random(8);

        // ユーザーを作成
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($randPassword),
        ]);

        // メール送信
        $emailData = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $randPassword,
            'url' => url('/admin/login'), // ログインURLを指定
        ];

        Mail::to($user->email)->send(new UserRegistered($emailData));

        return redirect('/admin_menu')->with('success', '登録が完了し、メールを送信しました。');
    }


    public function ranking_reset(Request $request)
    {
        // リクエストの中身を確認
        $validated = $request->validate([
            'tab_item' => ['required', 'in:java,php,python'], // 必須、指定された値のみ許可
            'tab_item2' => ['required', 'in:eazy,normal,hard'], // 必須、指定された値のみ許可
        ]);

        // バリデーション通過後、リクエスト値を取得
        $mode = $validated['tab_item'];
        $level = $validated['tab_item2'];
        $modeNumber = ['java' => 0, 'python' => 1, 'php' => 2][$mode] ?? null;
        $levelNumber = ['eazy' => 0, 'normal' => 1, 'hard' => 2][$level] ?? null;
        // 削除処理
        Ranking::where('mode', $modeNumber)->where('level', $levelNumber)->delete();

        // 履歴データを保存
        ranking_result::create([
            'mode' => $modeNumber,
            'level' => $levelNumber,
            'created_at' => now(),
        ]);

        // リダイレクト
        return redirect('/redirect_ranking')->with('status', 'ランキングがリセットされました。');
    }

    public function all_reset()
    {
        Ranking::truncate();

        $modes = [0 => 'java', 1 => 'python', 2 => 'php'];
        $levels = [0 => 'easy', 1 => 'normal', 2 => 'hard'];
        foreach ($modes as $modeKey => $mode) {
            foreach ($levels as $levelKey => $level) {
                // ranking_result にレコードを挿入
                ranking_result::create([
                    'mode' => $modeKey,  // モードの整数（例：0, 1, 2）
                    'level' => $levelKey,  // レベルの整数（例：0, 1, 2）
                    'created_at' => Carbon::now(),  // 現在時刻を設定
                    'updated_at' => Carbon::now(),  // 現在時刻を設定
                ]);
            }
        }
        return redirect('/redirect_ranking');
    }

    // 編集画面を表示する
    public function admin_edit($id)
    {
        // 該当IDの問題を取得
        $question = Question::findOrFail($id);

        // ビューを返す（adminフォルダ内のadmin_edit.blade.phpを指定）
        return view('admin.admin_edit', compact('question'));
    }
    // 更新処理
    public function admin_update(Request $request, $id)
    {
        // 入力値のバリデーション
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);

        // 該当の問題を更新
        $question = Question::findOrFail($id);
        $question->question = $request->input('question');
        $question->answer = $request->input('answer');
        $question->save();

        // 問題一覧にリダイレクト
        return redirect()->route('admin.admin_questionlist')->with('success', '問題を更新しました！');
    }

    // 問題一覧を表示するメソッド
    public function admin_questionlist()
    {
        // データベースから全ての問題を取得
        $questionsJava = Question::all();

        // 問題一覧ビューにデータを渡して表示
        return view('admin.admin_questionlist', compact('questionsJava'));
    }
}
