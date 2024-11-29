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
        <li>答え: {{ $answer }}</li>
        @endforeach
        @foreach(session('idArry') as $id)
        <li>答え: {{ $id }}</li>
        @endforeach
</div>
@endsection