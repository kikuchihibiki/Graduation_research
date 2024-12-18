@extends('layout.layout')
@section('title', '問題一覧')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin_questionlist.css') }}">
@endsection
@section('content')
<h1>問題一覧</h1>
java python php
<form action="">
    <input type="text">
    <input type="submit">
</form>
<table border="1">
    <tr>
        <th>No</th>
        <th>問題</th>
        <th>解答</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @for ($i = 0; $i < 4; $i++)
        <tr>
        <td>{{ $i + 1 }}</td>
        <td>問題 {{ $i + 1 }}</td>
        <td>解答 {{ $i + 1 }}</td>
        <td><span class="dli-create"></span></td>
        <td><a>問題削除</a> {{ $i + 1 }}</td>
        </tr>
        @endfor
</table>
<a href="/select_mode">戻る</a>
@endsection