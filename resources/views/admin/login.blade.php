@extends('layout.layout')

@section('title', '管理者ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="login-container">
    <h1>仮ログイン</h1>

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="form">
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" class="form-control" required>

                <label for="password">仮パスワード</label>
                <input type="password" name="password" class="form-control" id="password" required>

                <button type="submit">ログイン</button>
            </div>
        </div>
</div>
</form>
@if ($errors->has('email'))
<ul>
    <li>{{ $errors->first('email') }}</li>
</ul>
@endif
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@endsection