
    document.getElementById('ranking-link').addEventListener('click', function(event) {
        event.preventDefault(); // デフォルトのリンク動作を防止

        // ローカルストレージからスコアデータを取得
        const scores = JSON.parse(localStorage.getItem('quizScores'));

        if (scores) {
            // サーバーにスコアデータを送信
            fetch('/api/save-quiz-scores', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ scores: scores })
            })
            .then(response => response.json())
            .then(data => {
                // レスポンスが返ってきたら、ランキングページに遷移
                window.location.href = '/ranking';  // ランキングページへ遷移
            })
            .catch(error => {
                console.error('Error:', error);
                window.location.href = '/ranking';  // エラーが発生してもランキングページへ遷移
            });
        } else {
            window.location.href = '/ranking';  // ローカルストレージにスコアがなくてもランキングページへ遷移
        }
    });

