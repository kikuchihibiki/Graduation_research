<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ranking_result;
use Carbon\Carbon;

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
                return view('admin.admin_questionlist');
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
}
