document.addEventListener('DOMContentLoaded', function () {
    const modeRadios = document.querySelectorAll('input[name="tab_item"]');
    const levelRadios = document.querySelectorAll('input[name="tab_item2"]');

    // 初回表示用
    updateDisplay();

    // ラジオボタン変更時の処理
    modeRadios.forEach(radio => radio.addEventListener('change', updateDisplay));
    levelRadios.forEach(radio => radio.addEventListener('change', updateDisplay));

    function updateDisplay() {
        const mode = document.querySelector('input[name="tab_item"]:checked').value;
        const level = document.querySelector('input[name="tab_item2"]:checked').value;

        const allScores = document.querySelectorAll('.score');
        allScores.forEach(score => score.style.display = 'none'); // 全て非表示

        const targetId = mode + level; // 例: "javaeasy"
        const target = document.getElementById(targetId);
        if (target) target.style.display = 'block'; // 対象のみ表示
    }
});

document.getElementById('resetScore').addEventListener('click', function() {
    // localStorage から quizScores を削除
    localStorage.removeItem('quizScores');

    // 必要なら sessionStorage も削除
    sessionStorage.removeItem('quizScores');
});

document.getElementById('resetScore').addEventListener('click', function(event) {
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