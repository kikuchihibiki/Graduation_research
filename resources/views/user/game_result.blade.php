@extends('layout.layout')
@section('title', 'ゲーム結果')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection
@section('content')
<div class="result">
    <h1>ゲーム結果</h1>
    <p>{{ session ('correctAnswers') }}/{{ session ('totalQuestions') }}</p>
    <p>スコア{{ session ('resultScore') }}
        @foreach(session('answerArray') as $answer)
        <li> {{ $answer }}</li>
        @endforeach
        @foreach(session('idArry') as $id)
        <li>{{ $id }}</li>
        @endforeach
        <a href="{{ route('select_mode') }}">トップページへ</a>
        <a href="{{ route('commentary')}}">問題解説</a>
        <a href="{{ route('ranking') }}">ランキング</a>
        <a href="{{ route('start_game') }}">もう一度遊ぶ</a>
</div>
@endsection