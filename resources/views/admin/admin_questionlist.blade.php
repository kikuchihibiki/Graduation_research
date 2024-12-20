@extends('layout.layout')
@section('title', '問題一覧')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin_questionlist.css') }}">
@endsection

@section('content')
<h1>問題一覧</h1>

<form action="/search" method="POST">
    @csrf
    <input type="text" name="query" placeholder="キーワードで検索">
    <input type="submit" value="検索">
</form>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>問題</th>
            <th>解答</th>
            <th>公開</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questionsJava as $index => $question)
        <tr class="question-row" data-question-id="{{ $question->id }}">
            <td>{{ $index + 1 }}</td>
            <td class="question">{{ $question->question }}</td>
            <td><span class="answer">{{ $question->answer }}</span></td>
            <td></td>
            <td><div class="dli-create"></div></td>
            <td><div class="trash"></div></td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/select_mode" class="btn btn-back">モード選択に戻る</a>
@endsection
