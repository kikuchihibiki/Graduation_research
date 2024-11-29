@extends('layout.layout')
@section('title', 'ログイン')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin_passreset.css') }}">
@endsection

@section('content')
<form action="/" method="post" id="passreset">
    <h1>タイトル</h1>
    <p>パスワードリセット</p>
    <p>承認コードをメールアドレスに送信します。</p>
    <p>メールアドレスを入力してください</p>
    
    <!-- 入力フォーム -->
    <input type="text" name="email" placeholder="メールアドレスを入力">
    
    <!-- ボタン -->
    <button type="submit">次へ</button>
</form>
@endsection
