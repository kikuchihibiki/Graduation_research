@extends('layout.layout')
@section('title', '管理者登録')
@section('css')
<link rel="stylesheet" href="{{ asset('css/newadmin.css') }}">
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection
@section('content')
<div class="login-container">
    <h1>管理者登録</h1>
    <form action="/" method="POST">
        @csrf
        <div class="form">
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">パスワード確認</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="registar-from">
            <p>></p>
            <button type="submit" class="btn btn-primary">登録</button>
        <div>
    </form>
</div>
@endsection