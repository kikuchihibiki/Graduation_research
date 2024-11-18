@extends('layout.layout')
@section('title', 'セットアップ')
@section('css')
<link rel="stylesheet" href="{{ asset('css/setup.css') }}">
@endsection
@section('content')
<h1>セットアップ</h1>
<div class="set">
<p>このゲームは、htmlの入力フォームを使用しています</p>
<p>画面下部の文字入力フォームに文字が打てる状態で、入力モードが半角になっているかご確認ください。</p>
<div class="div_img">
<img src="{{ asset('storage/img/setup.png') }}" alt="画像" width="200">
<p class="p_img">Windowsの場合はIMEパッドから、MACの場合は入力メニューから変更できます。</p>
</div>
</div>
<div class="div_enter">
文字が入力できる状態でEnterで次へ
</div>
<form action="{{ route('select_mode') }}" method="get" id="input_setup">
    @csrf
    <input type="text" id="setupInput">
    <input type="submit" style="display:none;">
</form>
<script src="{{ asset('js/before_game.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('setupInput').focus();
    });
</script>
@endsection