<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>クイズスコア画面</title>
    <link rel="stylesheet" href="{{ asset('css/game_result.css') }}">

</head>

<body>
    <div class="result-container">
        <h1 class="title">リザルト</h1>
        <div class="result-box">
            <p class="score-info">{{ session ('correctAnswers') }}/{{ session ('totalQuestions') }}問　正解</p>
            <p class="hint-count">お手付き回数3回</p>
            <p class="score">Score <span>{{ session ('resultScore') }}</span></p>
        </div>
        <div class="button-container">
            <a href="{{ route('select_mode') }}">トップページへ</a>
            <a href="{{ route('commentary')}}">問題解説</a>
            <a href="{{ route('ranking') }}">ランキング</a>
            <a href="{{ route('game_restart') }}">もう一度遊ぶ</a>
        </div>

    </div>
</body>

</html>