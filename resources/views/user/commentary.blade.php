@extends('layout.layout')
@section('title', '解説画面')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection
@section('content')
<div class="result">
    <table>
        <tr>
            <td>{{session('idArry')[0]}}</td>
            <td>{{ session('answerArray')[0] }}</td>
        </tr>
        <tr>
            <td>{{session('idArry')[1]}}</td>
            <td>{{ session('answerArray')[1] }}</td>
        </tr>
        <tr>
            <td>{{session('idArry')[2]}}</td>
            <td>{{ session('answerArray')[2] }}</td>
        </tr>
        <tr>
            <td>{{session('idArry')[3]}}</td>
            <td>{{ session('answerArray')[3] }}</td>
        </tr>
        <tr>
            <td>{{session('idArry')[4]}}</td>
            <td>{{ session('answerArray')[4] }}</td>
        </tr>
        <tr>
            <td>{{session('idArry')[5]}}</td>
            <td>{{ session('answerArray')[5] }}</td>
        </tr>
    </table>
    <a href="{{ route('game_result_show') }}">リザルトにもどる</a>
    <a href="{{ route('start_game') }}">もう一度遊ぶ</a>
</div>
@endsection