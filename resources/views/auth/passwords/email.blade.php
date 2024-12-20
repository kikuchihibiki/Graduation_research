@extends('layout.layout')

@section('title', 'パスワードリセット')

@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin_passreset.css') }}">
@endsection

@section('content')
<form action="{{ route('password.email') }}" method="post" id="passreset">
    <h1>パスワードリセット</h1>
    <p>パスワードをリセットするために必要な承認コードを、指定したメールアドレスに送信します。</p>
    <p>メールアドレスを入力してください。</p>

    @csrf

    <!-- メールアドレス入力フォーム -->
    <div class="form-group">
        <input type="email" name="email" placeholder="メールアドレスを入力" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <!-- 送信ボタン -->
    <button type="submit" class="btn btn-primary">次へ</button>

    @if (session('status'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('status') }}
    </div>
    @endif
</form>
@endsection