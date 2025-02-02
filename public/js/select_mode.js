document.addEventListener('DOMContentLoaded', function () {
    const radios = document.querySelectorAll('input[name="mode"]');
    const form = document.getElementById('mode_form');
    let selectedIndex = Array.from(radios).findIndex(radio => radio.checked);
    radios[selectedIndex].focus();
    document.addEventListener('keydown', function (event) {
        if (event.key === 'ArrowUp' || event.key === 'ArrowLeft') {
            selectedIndex = (selectedIndex - 1 + radios.length) % radios.length;
            radios[selectedIndex].checked = true;
            radios[selectedIndex].focus();
        } else if (event.key === 'ArrowDown' || event.key === 'ArrowRight') {
            selectedIndex = (selectedIndex + 1) % radios.length;
            radios[selectedIndex].checked = true;
            radios[selectedIndex].focus();
        }
    });
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            form.submit();
        }
    });
});


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

document.getElementById('question_list').addEventListener('click', function(event) {
    event.preventDefault(); // デフォルトのリンク動作をキャンセル

    const user_data = JSON.parse(localStorage.getItem('user_data')) || []; // スコアがない場合は空配列を設定
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');

    if (!csrfTokenElement) {
        console.error('CSRF token not found');
        return; // CSRFトークンが見つからない場合、処理を中止
    }

    const csrfToken = csrfTokenElement.getAttribute('content');

    fetch('/question_list', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                user_data: user_data
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
            window.location.href = '/show_question_list';
        })
        .catch(error => {
            console.error('Error:', error);
        });
});