@extends('layout.layout')

@section('title', 'パスワードリセット')

@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin_passreset.css') }}">
@endsection

@section('content')
<form action="{{ route('password.update') }}" method="post" id="passreset">
    <h1>パスワードリセット</h1>
    <p>パスワードをリセットするために必要な情報を入力してください。</p>

    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <!-- メールアドレス入力フォーム -->
    <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" placeholder="メールアドレスを入力" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $email ?? '') }}" required autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <!-- パスワード入力フォーム -->
    <div class="form-group">
        <label for="password">新しいパスワード</label>
        <input type="password" id="password" name="password" placeholder="新しいパスワード" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <!-- パスワード確認入力フォーム -->
    <div class="form-group">
        <label for="password-confirm">新しいパスワード（確認）</label>
        <input type="password" id="password-confirm" name="password_confirmation" placeholder="新しいパスワード（確認）" class="form-control" required autocomplete="new-password">
    </div>

    <!-- 送信ボタン -->
    <button type="submit" class="btn btn-primary">リセットする</button>
</form>
@endsection