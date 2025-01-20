@extends('layout.layout')

@section('title', '管理者ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="login-container">
    <h1>管理者ログイン</h1>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <!-- エラーメッセージ -->
    @if ($errors->any())
    <div class="alert alert-danger" role="alert" style="color: white;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form">
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">

                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" class="form-control" required>

                <!-- パスワードにエラーがあれば表示 -->
                @error('password')
                <div class="alert alert-danger" style="color: white;">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
        </div>

        <div class="pass-log">
            <a href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a>
            <div class="pass-log2">
                <p></p>
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
