document.addEventListener('DOMContentLoaded', function () {
    const radios = document.querySelectorAll('input[name="level"]');
    const form = document.getElementById('level_form');
    let selectedIndex = Array.from(radios).findIndex(radio => radio.checked);

    // 初期フォーカス
    radios[selectedIndex].focus();

    // キーボードで移動
    document.addEventListener('keydown', function (event) {
        if (event.key === 'ArrowUp' || event.key === 'ArrowLeft') {
            selectedIndex = (selectedIndex - 1 + radios.length) % radios.length;
            updateSelection();
        } else if (event.key === 'ArrowDown' || event.key === 'ArrowRight') {
            selectedIndex = (selectedIndex + 1) % radios.length;
            updateSelection();
        } else if (event.key === 'Enter') {
            event.preventDefault();
            handleSelection();
        }
    });

function updateSelection() {
    radios[selectedIndex].checked = true;
    if (radios[selectedIndex].id !== 'back') {
        radios[selectedIndex].focus();
    }
}


    function handleSelection() {
        const selectedValue = radios[selectedIndex].value;
        if (selectedValue === 'back') {
            // 「戻る」動作を実行
            if (document.referrer) {
                history.back();
            } else {
                location.href = '/'; // 必要に応じてデフォルトの戻り先を指定
            }
        } else {
            // 他の選択肢が選ばれている場合はフォームを送信
            form.submit();
        }
    }
});
