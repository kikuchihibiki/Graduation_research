@extends('layout.layout')
@section('title', 'モード選択')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/miss_question.css') }}" >
@endsection
@section('content')
<h1>誤答問題カテゴリ選択</h1>
<form action="{{ route('wrong_answer') }}" method="post" id="missquestion_form">
    @csrf
    <input type="radio" name="mode" value="java" id="java" checked>
    <label for="java">java</label>
    <input type="radio" name="mode" value="python" id="python">
    <label for="python">python</label>
    <input type="radio" name="mode" value="php" id="php">
    <label for="php">php</label>
    <input type="submit" style="display:none;">
</form>

<!-- 一つ前のページに戻るボタン -->
<button id="back_button" onclick="history.back()">戻る</button>
<button id="title_back_button" onclick="location.href='/'">タイトルに戻る</button>
<script src="{{ asset('js/before_game.js') }}"></script>
<script src="{{ asset('js/miss_question.js') }}"></script>
@endsection