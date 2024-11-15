@extends('layout.layout')
@section('title', 'タイトル画面')
@section('css')
<link rel="stylesheet" href="{{ asset('css/title.css') }}">
@endsection
@section('content')
<h1>コマンドクイズアプリ</h1>
<p class="p1">ランキングに表示される名前を入力してください</p>
<p class="p2">入力しない場合は名無しになります</p>
<form action="{{ route('save_name') }}" method="post" id="nameForm">
    @csrf
    <input type="text" name="name" placeholder="名無し" id="nameInput">
    <input type="submit" style="display:none;">
</form>
<p class="p3">不適切な名前の場合記録が削除される場合があります</p>
<p class="p4">--Enter--</p>
<script src="{{ asset('js/before_game.js') }}"></script>
@endsection