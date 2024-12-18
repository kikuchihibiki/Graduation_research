@extends('layout.layout')
@section('title', '管理者ログイン')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section('content')
<div class="login-container">
    <h1>管理者ログイン</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form">
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-control" required>

                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="pass-log">
            <a href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a>
            <div class="pass-log2">
                <p>></p>
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection