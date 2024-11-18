@extends('layout.layout')
@section('title', '管理者ログイン')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection
@section('content')
<div class="login-container">
    <h2>管理者ログイン</h2>
    <form action="/" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <a>パスワードを忘れた方はこちら</a>
        <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
</div>
@endsection