@extends('layout.layout')

@section('title', '問題編集')

@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<h1>問題編集</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.admin_update', ['id' => $question->id]) }}" method="POST">
    @csrf
    <label for="question">問題文</label><br>
    <textarea id="question" name="question" rows="4" cols="50">{{ old('question', $question->question) }}</textarea><br>

    <label for="answer">解答</label><br>
    <textarea id="answer" name="answer" rows="2" cols="50">{{ old('answer', $question->answer) }}</textarea><br>

    <button type="submit">更新</button>
</form>

<a href="{{ route('admin.admin_questionlist') }}" class="btn btn-back">戻る</a>
@endsection
