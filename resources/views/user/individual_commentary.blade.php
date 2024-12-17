@extends('layout.layout')
@section('title', '個別季節')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection
@section('content')
<div class="result">
    @php
    var_dump($commentary);
    @endphp

    <a href="{{ route('ranking') }}">ランキング</a>
    <a href="{{ route('game_restart') }}">もう一度遊ぶ</a>
</div>
@endsection