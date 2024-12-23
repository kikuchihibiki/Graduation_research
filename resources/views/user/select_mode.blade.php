@extends('layout.layout')
@section('title', 'モード選択')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/select_mode.css') }}">
@endsection
@section('content')
<div class="top-right-links">
    <a href="/question_list">問題一覧</a>
    <a href="/ranking">ランキング</a>
</div>
<h1>モード選択</h1>
<form action="{{ route('save_mode') }}" method="post" id="mode_form">
    @csrf
    <input type="radio" name="mode" value="java" id="java" checked>
    <label for="java">java</label>
    <input type="radio" name="mode" value="python" id="python">
    <label for="python">python</label>
    <input type="radio" name="mode" value="php" id="php">
    <label for="php">php</label>
    <input type="radio" name="mode" value="miss_question" id="miss_question">
    <label for="miss_question">誤答問題</label>
    <input type="submit" style="display:none;">
</form>

<button id="title_back_button" onclick="location.href='/'">タイトルに戻る</button>
<script src="{{ asset('js/select_mode.js') }}"></script>
@endsection