@extends('layout.layout')
@section('title', '難易度選択')
@section('css')
<link rel="stylesheet" href="{{ asset('css/select_level.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('css/select_level.css') }}" > -->
@endsection
@section('content')

<h1>難易度を選択(6問出題)</h1>
<div class="select_level">
    <form action="{{ route('start_game') }}" method="post" id="level_form">

    @csrf
    <input type="radio" name="level" value="easy" id="easy" checked>
    <label for="easy">イージー　　　{{$timeLimit[0]}}秒　　　穴埋め形式で挑戦</label>
    <input type="radio" name="level" value="normal" id="normal">
    <label for="normal">ノーマル　　　{{$timeLimit[1]}}秒　　　穴埋め無しで挑戦</label>
    <input type="radio" name="level" value="hard" id="hard">
    <label for="hard">ハード　　　　{{$timeLimit[2]}}秒　　　穴埋め無しで挑戦</label>
    <div>
    <!-- 左下に固定する戻るボタン -->
    <input type="radio" name="level" value="back" id="back">
    <label for="back" class="back-label">戻る</label>
    <input type="submit" style="display:none;">
    </div>
</form>


    </div>
    
    <button id="title_back_button" onclick="location.href='/'">タイトルに戻る</button>

<script src="{{ asset('js/select_level.js') }}"></script>
@endsection