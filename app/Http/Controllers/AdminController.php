<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.admin');
    }
    public function admin_menu()
    {
        return view('admin.admin_menu');
    }
    // public function admin_questionlist()
    // {
    //     return view('admin.admin_questionlist');
    // }
    // public function admin_ranking()
    // {
    //     return view('admin.admin_ranking');
    // }
    // public function admin_newAdmin()
    // {
    //     return view('admin.admin_newAdmin');
    // }
    public function admin_password()
    {
        return view('admin.admin_passreset');
    }

    public function admin_select(Request $request)
    {
        $selectedMenu = $request->input('menu');

        // 選択された値に基づいてビューを返す
        switch ($selectedMenu) {
            case 'list':
                return view('admin.admin_questionlist');  // 問題一覧画面を返す
            case 'ranking':
                $modes = [0 => 'java', 1 => 'python', 2 => 'php'];
                $levels = [0 => 'easy', 1 => 'normal', 2 => 'hard'];

                $rankings = [];

                foreach ($modes as $modeKey => $mode) {
                    foreach ($levels as $levelKey => $level) {
                        // 各モードとレベルに対応するランキングを取得
                        $rankings["{$mode}{$level}"] = Ranking::where('mode', $modeKey)
                            ->where('level', $levelKey)
                            ->orderBy('rank', 'asc') // 順位で並べる
                            ->get();
                    }
                }
                return view('admin.admin_ranking', compact('rankings'));  // ランキング修正画面を返す
            case 'admin_add':
                return view('admin.admin_newAdmin');  // 管理者登録画面を返す
            case 'logout':
                auth()->logout();  // ログアウト処理
                return view('auth.login');  // ログイン画面を返す
            default:
                return view('admin.admin');  // デフォルトのメニュー画面に戻る
        }
    }

    public function delete_ranking(Request $request)
    {
        // IDが配列であることを確認
        $rankingIds = $request->input('id');

        // もしIDが単一の値であれば、配列に変換
        if (!is_array($rankingIds)) {
            $rankingIds = [$rankingIds];
        }

        // rankingIdsが送られてきた場合、該当のrankingを削除
        if ($rankingIds) {
            Ranking::whereIn('id', $rankingIds)->delete();
        }

        // 削除後のリダイレクトやメッセージ処理を追加
        return redirect('/redirect_ranking');
    }


    public function redirect_ranking()
    {
        $modes = [0 => 'java', 1 => 'python', 2 => 'php'];
        $levels = [0 => 'easy', 1 => 'normal', 2 => 'hard'];

        $rankings = [];

        foreach ($modes as $modeKey => $mode) {
            foreach ($levels as $levelKey => $level) {
                // 各モードとレベルに対応するランキングを取得
                $rankings["{$mode}{$level}"] = Ranking::where('mode', $modeKey)
                    ->where('level', $levelKey)
                    ->orderBy('rank', 'asc') // 順位で並べる
                    ->get();
            }
        }
        return view('admin.admin_ranking', compact('rankings'));
    }

    public function register(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.register')
                ->withErrors($validator)
                ->withInput();
        }

        // 新規ユーザー作成
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // 必要なら、追加のカスタムフィールド（例: 管理者フラグなど）を追加することもできます。

        return redirect('/admin_menu');
    }
}
