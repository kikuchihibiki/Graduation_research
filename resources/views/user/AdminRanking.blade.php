@extends('layout.layout')
@section('title', 'タイトル画面')
@section('css')
<link rel="stylesheet" href="{{ asset('css/ranking.css') }}">
@endsection
@section('content')
<div class="q-body">
<h1 class="title">ランキング修正</h1>


<table class="data">
<form id="settingBox">
    <thead>
        <tr class="mode">

             
            <th class="lang java" >
                <input id="javaCheck" type="radio" name="tab_item" checked value="java">
                <label class="tab_item checkBox" for="javaCheck">JAVA</label>
            </th>

            <th class="lang php" >
                <input id="phpCheck" type="radio" name="tab_item"  value="php"> 
                <label class="tab_item checkBox" for="phpCheck">PHP</label>
            </th>

            <th class="lang python">
                <input id="pythonCheck" type="radio" name="tab_item" value="python"> 
                <label class="tab_item checkBox" for="pythonCheck">PYTHON</label>
            </th>


        </tr>
        <tr class="level">

            <th>
                <input id="eazy" type="radio" name="tab_item2" value="eazy" checked> 
                <label class="tab_item checkBox2" for="eazy">イージー</label>
            </th>

            
            <th>
                <input id="normal" type="radio" name="tab_item2" value="normal" > 
                <label class="tab_item checkBox2" for="normal">ノーマル</label>
            </th>

            
            <th>
                <input id="hard" type="radio" name="tab_item2" value="hard"> 
                <label class="tab_item checkBox2" for="hard">ハード</label>
            </th>
        </tr>
    </thead>
</form>
    
        <tbody class="ranking_tab selected" id="java-eazy" >
            <tr class="rank_tr_1">
                <td class="rank"><input type="checkbox" value="" > 1位</td>
                <td class="rank-name">Omoto</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2"><input type="checkbox" value="" > 2位</td>
                <td class="rank2-name">Kokomi</td>
                <td class="rank2-score">22000</td>
            </tr>
            <tr >
                <td class="rank3"><input type="checkbox" value="" > 3位</td>
                <td class="rank3-name">Sugiyama</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4"><input type="checkbox" value="" > 4位</td>
                <td class="text-white">Mikuru</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4"><input type="checkbox" value="" >5位</td>
                <td class="text-white">あおい</td>
                <td class="text-white">15000</td>
            </tr>
        </tboby>

        
        <tbody class="ranking_tab" id="java-normal">
            <tr class="rank_tr_1">
                <td class="rank">1位</td>
                <td class="rank-name">takahashi</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2">2位</td>
                <td class="rank2-name">junchan</td>
                <td class="rank2-score">22000</td>
            </tr>
            <tr >
                <td class="rank3">3位</td>
                <td class="rank3-name">ootubokun</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4">4位</td>
                <td class="text-white">rieri-</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4">5位</td>
                <td class="text-white">enpitusensi</td>
                <td class="text-white">15000</td>
            </tr>
        </tbody>
            
        <tbody class="ranking_tab" id="java-hard">
            <tr class="rank_tr_1">
                <td class="rank">1位</td>
                <td class="rank-name">itika</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2">2位</td>
                <td class="rank2-name">kirara</td>
                <td class="rank2-score">22000</td>
            </tr>
            <tr >
                <td class="rank3">3位</td>
                <td class="rank3-name">nanase</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4">4位</td>
                <td class="text-white">nanasawa</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4">5位</td>
                <td class="text-white">mikami</td>
                <td class="text-white">15000</td>
            </tr>
        </tbody>
            
        <tbody class="ranking_tab" id="python-eazy">

            <tr class="rank_tr_1">
                <td class="rank">1位</td>
                <td class="rank-name">todori</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2">2位</td>
                <td class="rank2-name">miyano</td>
                <td class="rank2-score">220</td>
            </tr>
            <tr >
                <td class="rank3">3位</td>
                <td class="rank3-name">taison</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4">4位</td>
                <td class="text-white">kubota</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4">5位</td>
                <td class="text-white">kikuti</td>
                <td class="text-white">15000</td>
            </tr>
        </tbody>
            
        <tbody class="ranking_tab" id="python-normal">

            <tr class="rank_tr_1">
                <td class="rank">1位</td>
                <td class="rank-name">natumi</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2">2位</td>
                <td class="rank2-name">sawamura</td>
                <td class="rank2-score">22000</td>
            </tr>
            <tr >
                <td class="rank3">3位</td>
                <td class="rank3-name">siraisi</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4">4位</td>
                <td class="text-white">myoumyou</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4">5位</td>
                <td class="text-white">mizumoto</td>
                <td class="text-white">15000</td>
            </tr>
        </tbody>

        <tbody class="ranking_tab" id="python-hard">
            
            <tr class="rank_tr_1">
                <td class="rank">1位</td>
                <td class="rank-name">a</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2">2位</td>
                <td class="rank2-name">b</td>
                <td class="rank2-score">22000</td>
            </tr>
            <tr >
                <td class="rank3">3位</td>
                <td class="rank3-name">c</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4">4位</td>
                <td class="text-white">d</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4">5位</td>
                <td class="text-white">e</td>
                <td class="text-white">15000</td>
            </tr>
        </tbody>

        <tbody class="ranking_tab" id="php-eazy">

            <tr class="rank_tr_1">
                <td class="rank">1位</td>
                <td class="rank-name">haruto</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2">2位</td>
                <td class="rank2-name">ri-zerotte</td>
                <td class="rank2-score">22000</td>
            </tr>
            <tr >
                <td class="rank3">3位</td>
                <td class="rank3-name">syouko</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4">4位</td>
                <td class="text-white">bi-sutohai</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4">5位</td>
                <td class="text-white">raizou</td>
                <td class="text-white">15000</td>
            </tr>
        </tbody>
            
        <tbody class="ranking_tab" id="php-normal">

            <tr class="rank_tr_1">
                <td class="rank">1位</td>
                <td class="rank-name">koganemusi</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2">2位</td>
                <td class="rank2-name">gokudou</td>
                <td class="rank2-score">22000</td>
            </tr>
            <tr >
                <td class="rank3">3位</td>
                <td class="rank3-name">kaonasi</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4">4位</td>
                <td class="text-white">gokiburi</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4">5位</td>
                <td class="text-white">syujinkou</td>
                <td class="text-white">15000</td>
            </tr>
        </tbody>
            
        <tbody class="ranking_tab" id="php-hard">

            <tr class="rank_tr_1">
                <td class="rank">1位</td>
                <td class="rank-name">kimuti</td>
                <td class="rank-score">22450</td>
            </tr>
            <tr>
                <td class="rank2">2位</td>
                <td class="rank2-name">yamibaita-</td>
                <td class="rank2-score">22000</td>
            </tr>
            <tr >
                <td class="rank3">3位</td>
                <td class="rank3-name">NTR</td>
                <td class="rank3-score">19000</td>
            </tr>
            <tr>
                <td class="rank4">4位</td>
                <td class="text-white">arakida</td>
                <td class="text-white">17800</td>
            </tr>
            <tr>
                <td class="rank4">5位</td>
                <td class="text-white">dadadsa</td>
                <td class="text-white">15000</td>
            </tr>
        </tbody>
</table>
<div class="score">
    <p class="white">あなたのスコア: <span>11500</span></p>
</div>
<div class="back-button">
    <a href="#" style="color:white;">≻戻る</a>
</div>
</div>

<script src="{{ asset('js/ranking.js') }}">

</script>
@endsection