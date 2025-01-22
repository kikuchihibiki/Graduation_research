<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * ログインフォームの表示
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');  // 仮ログイン画面
    }

    /**
     * 仮ログイン処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // バリデーション
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // メールアドレスでユーザーを検索
        $user = User::where('email', $request->input('email'))->first();

        // 仮パスワードの確認
        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);  // ユーザーをログイン状態にする

            // 仮パスワードでログイン後、パスワード変更画面にリダイレクト
            return redirect()->route('admin.password.change');
        }

        return back()->withErrors(['email' => 'メールアドレスまたはパスワードが間違っています。']);
    }

    /**
     * パスワード変更フォームの表示
     *
     * @return \Illuminate\View\View
     */
    public function showPasswordChangeForm()
    {
        return view('admin.password_change');  // パスワード変更画面
    }

    /**
     * パスワード変更処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        // パスワードのバリデーション
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 現在ログイン中のユーザー
        $user = Auth::user();

        // 新しいパスワードを保存
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // パスワード変更後、ダッシュボードにリダイレクト
        return redirect()->route('admin')->with('success', 'パスワードが変更されました。');
    }

    /**
     * ログアウト処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
