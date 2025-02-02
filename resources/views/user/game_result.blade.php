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
            <p class="hint-count">お手付き回数{{session('missCount')}}回</p>
            <p class="score">Score <span>{{ session ('resultScore') }}</span></p>
        </div>
        <div class="button-container">
            <a href="{{ route('select_mode') }}">トップページへ</a>
            <a href="{{ route('commentary')}}">問題解説</a>
            <a href="#" id="ranking_list">ランキング</a>
            @if(session('missflag'))
            @else
            <a href="{{ route('game_restart') }}">もう一度遊ぶ</a>
            @endif

        </div>

    </div>
</body>
<audio id="bgm" loop>
    <source src="{{ asset('assets/audio/result.mp3') }}" type="audio/mpeg">
    お使いのブラウザはオーディオ再生に対応していません。
</audio>

<!-- JavaScriptでBGM再生を開始 -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bgm = document.getElementById('bgm');
        if (bgm) {
            bgm.play().catch(error => {
                console.error('BGMの再生に失敗しました:', error);
            });
        }
    });
    for (let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i); // キーを取得
        let value = localStorage.getItem(key); // 値を取得
        console.log(key + ': ' + value); // キーと値を出力
    }
</script>
<script>
    document.getElementById('ranking_list').addEventListener('click', function(event) {
        event.preventDefault(); // デフォルトのリンク動作をキャンセル

        const scores = JSON.parse(localStorage.getItem('quizScores')) || []; // スコアがない場合は空配列を設定
        const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');

        if (!csrfTokenElement) {
            console.error('CSRF token not found');
            return; // CSRFトークンが見つからない場合、処理を中止
        }

        const csrfToken = csrfTokenElement.getAttribute('content');

        fetch('/ranking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    scores: scores
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // 成功した場合にランキングページにリダイレクト
                window.location.href = '/show_ranking';
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>

</html>