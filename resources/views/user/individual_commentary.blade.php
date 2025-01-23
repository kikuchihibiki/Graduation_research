<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ結果画面</title>
    <link rel="stylesheet" href="{{ asset('css/individual_commentary.css') }}">
</head>

<body>
    <div class="container">
        <!-- 上部: 問題と回答 (横並び) -->
        <div class="top-section">
            <div class="question-section">
                <span class="question-number">問題</span>
                <p class="answer-text">
                    {{$commentary->question}}
                </p>
            </div>
            <div class="answer-section">
                <p class="question-number">解答</p>
                <span class="answer-text">{{$commentary->answer}}</span>
            </div>
        </div>

        <!-- 下部: 解説 -->
        <div class="explanation-section">
            <p class="explanation-label">解説</p>
            <p class="answer-text">
                {{$commentary->explanation}}
            </p>
        </div>

        <!-- ボタン部分: aタグ -->
        <div class="bottom-menu">
            <a href="{{ route('commentary') }}" class="menu-btn">戻る</a>
            <a href="{{ route('game_restart') }}" class="menu-btn">もう一度遊ぶ</a>
        </div>
    </div>
</body>

</html>