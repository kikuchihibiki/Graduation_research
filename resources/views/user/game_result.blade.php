<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>クイズスコア画面</title>
    <style>
        /* 全体のスタイル */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .result-container {
            text-align: center;
            background-color: #7d7d7d;
            border: 4px;
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            /* 画面の80%幅にする */
            max-width: 600px;
            /* 最大幅を設定（広すぎる場合の制限） */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .title {
            margin-top: 0;
            font-size: 1.5rem;
        }

        .result-box {
            color: #ffffff;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
        }

        .score-info,
        .hint-count,
        .score {
            margin: 10px 0;
            font-size: 1.2rem;
        }

        .score span {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button-container a {
            display: inline-block;
            /* aタグをボタンのように表示 */
            background-color: #000;
            color: #fff;
            text-decoration: none;
            /* デフォルトの下線を削除 */
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 0.9rem;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container a:hover {
            background-color: #444;
        }
    </style>
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