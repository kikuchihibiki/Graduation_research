@extends('layout.layout')
@section('title', 'ゲーム一覧')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/question_list.blade.css') }}">
@endsection
@section('content')
<h1>問題一覧</h1>
java python php
<!-- 検索窓 -->
<input type="text" id="searchInput" placeholder="検索..." onkeyup="searchTable()">
<table border="1">
    <tr>
        <th>No</th>
        <th>問題</th>
        <th>解答</th>
        <th>解説</th>
        <th>回答状況</th>
    </tr>
    @for ($i = 0; $i < 4; $i++)
        <tr>
        <td>{{ $i + 1 }}</td>
        <td>問題 {{ $i + 1 }}</td>
        <td>解答 {{ $i + 1 }}</td>
        <td>解説 {{ $i + 1 }}</td>
        <td>回答状況 {{ $i + 1 }}</td>
        </tr>
        @endfor
</table>
<a href="/select_mode">戻る</a>
@endsection