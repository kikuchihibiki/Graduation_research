@extends('layout.layout')
@section('title', '難易度選択')
@section('css')
<link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection
@section('content')
<h1>難易度を選択</h1>
<form action="{{ route('start_game') }}" method="post" id="level_form">
    @csrf
    <input type="radio" name="level" value="easy" id="easy" checked>
    <label for="easy">イージー</label>
    <input type="radio" name="level" value="normal" id="normal">
    <label for="normal">ノーマル</label>
    <input type="radio" name="level" value="hard" id="hard">
    <label for="hard">ハード</label>
    <input type="submit" style="display:none;">
</form>
@endsection