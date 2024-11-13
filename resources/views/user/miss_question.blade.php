@extends('layout.layout')
@section('title', 'モード選択')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection
@section('content')
<h1>誤答問題カテゴリ選択</h1>
<form action="{{ route('wrong_answer') }}" method="post" id="mode_form">
    @csrf
    <input type="radio" name="mode" value="java" id="java" checked>
    <label for="java">java</label>
    <input type="radio" name="mode" value="python" id="python">
    <label for="python">python</label>
    <input type="radio" name="mode" value="php" id="php">
    <label for="php">php</label>
    <input type="submit" style="display:none;">
</form>
<script src="{{ asset('js/before_game.js') }}"></script>
@endsection