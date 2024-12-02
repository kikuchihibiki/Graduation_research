@extends('layout.layout')
@section('title', '管理者メニュー')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin_menu.css') }}">
@endsection
@section('content')
<form action="/" method="post" id="menu_form">
    @csrf
    <input type="radio" name="menu" value="question_add" id="question_add" checked>
    <label for="question_add">問題登録　　　　新しく問題登録します</label>
    <input type="radio" name="menu" value="list" id="list">
    <label for="list">問題一覧　　　　一覧から編集、削除します</label>
    <input type="radio" name="menu" value="ranking" id="ranking">
    <label for="ranking">ランキング修正　　ランキングの編集をします</label>
    <input type="radio" name="menu" value="admin_add" id="admin_add">
    <label for="admin_add">管理者登録　　　　管理者の登録をします</label>
    <input type="radio" name="menu" value="logout" id="logout">
    <label for="logout">　　　　　　　　ログアウト　　　　</label>
    <input type="submit" style="display:none;">
</form>

<!-- モーダル要素 -->
<div class="modal-overlay">
    <div id="logout_modal" class="modal">
        <div class="modal_content">
            <p>本当にログアウトしますか？</p>
            <button id="confirm_logout">ログアウト</button>
            <button id="close_modal">キャンセル</button>
        </div>
    </div>
</div>

<script src="{{ asset('js/admin_menu.js') }}"></script>
@endsection