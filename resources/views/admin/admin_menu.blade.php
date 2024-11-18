@extends('layout.layout')
@section('title', '管理者メニュー')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection
@section('content')
<form action="/" method="post" id="menu_form">
    @csrf
    <input type="radio" name="menu" value="question_add" id="question_add" checked>
    <label for="question_add">問題登録</label>
    <input type="radio" name="menu" value="list" id="list">
    <label for="list">問題一覧</label>
    <input type="radio" name="menu" value="ranking" id="ranking">
    <label for="ranking">ランキング修正</label>
    <input type="radio" name="menu" value="admin_add" id="menu">
    <label for="admin_add">管理者登録</label>
    <a>ログアウト</a>
    <input type="submit" style="display:none;">
</form>
<script src="{{ asset('js/admin_menu.js') }}"></script>
@endsection