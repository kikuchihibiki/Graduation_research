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