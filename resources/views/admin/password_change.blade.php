@extends('layout.layout')

@section('title', '管理者ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<h1>パスワード変更</h1>

<form method="POST" action="{{ route('admin.password.change') }}">
    @csrf
    <div class="form">
        <div class="form-group">
            <label for="password">新しいパスワード</label>
            <input type="password" name="password" id="password" class="form-control" required>

            <label for="password_confirmation">確認用パスワード</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
    </div>

    <button type="submit">変更</button>
</form>
@endsection