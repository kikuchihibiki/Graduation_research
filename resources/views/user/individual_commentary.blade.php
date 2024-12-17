<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ結果画面</title>
    <style>
        /* 全体のリセット */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 80vw;
            max-width: 900px;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* 上部: 問題と解答を横並びに */
        .top-section {
            display: flex;
            justify-content: space-between;
            gap: 1em;
            padding: 1.5em;
            background-color: #f0f0f0;
        }

        .question-section,
        .answer-section {
            flex: 1;
            padding: 1em;
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .question-number {
            color: #ffcc00;
            font-size: 1.5em;
            font-weight: bold;
        }

        .question-text {
            margin-top: 0.5em;
            font-size: 1.1em;
            color: #333;
        }

        .answer-label {
            font-size: 1em;
            margin-bottom: 0.5em;
            color: #666;
        }

        .answer-text {
            display: block;
            font-size: 2.5em;
            font-weight: bold;
            text-align: center;
            color: #333;
        }

        /* 下部: 解説を全幅で表示 */
        .explanation-section {
            padding: 1.5em;
            background-color: #fff;
            border-top: 2px solid #ddd;
        }

        .explanation-label {
            font-size: 1.2em;
            font-weight: bold;
            color: #ffcc00;
            margin-bottom: 0.5em;
        }

        .explanation-text {
            font-size: 0.95em;
            line-height: 1.5;
            color: #333;
        }

        .bottom-menu {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-around;
            padding: 15px 0;
            z-index: 1000;
        }

        .menu-btn {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            background-color: #555;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .menu-btn:hover {
            background-color: #777;
        }

        .explanation-btn:hover {
            background-color: #222;
        }
    </style>

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
            <a href="{{ route('ranking') }}" class="menu-btn">ランキング</a>
            <a href="{{ route('game_restart') }}" class="menu-btn">もう一度遊ぶ</a>
        </div>
    </div>
</body>

</html>