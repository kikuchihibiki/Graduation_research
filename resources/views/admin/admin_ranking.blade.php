@extends('layout.layout')
@section('title', 'ランキング修正')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection
@section('content')
<a>選択してリセット</a>
<a>すべてリセット</a>
<table>
    <thead>
        <tr>
            <th class="lang java">JAVA</th>
            <th class="lang php">PHP</th>
            <th class="lang python">PYTHON</th>
        </tr>
        <tr>
            <th>イージー</th>
            <th>ノーマル</th>
            <th>ハード</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="rank"><input type="checkbox"> 1位</td>
            <td>Omoto</td>
            <td>22450</td>
        </tr>
        <tr>
            <td class="rank"><input type="checkbox">2位</td>
            <td>Kokomi</td>
            <td>22000</td>
        </tr>
        <tr>
            <td class="rank"><input type="checkbox">3位</td>
            <td>Sugiyama</td>
            <td>19000</td>
        </tr>
        <tr>
            <td class="rank"><input type="checkbox">4位</td>
            <td>Mikuru</td>
            <td>17800</td>
        </tr>
        <tr>
            <td class="rank"><input type="checkbox">5位</td>
            <td>あおい</td>
            <td>15000</td>
        </tr>
    </tbody>
</table>

<div class="back-button">
    <a href="#">≻戻る</a>
    <a href="#">≻確認</a>
</div>
@endsection