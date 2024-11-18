document.addEventListener('DOMContentLoaded', function() {
    const radios = document.querySelectorAll('input[name="menu"]');
    let selectedIndex = Array.from(radios).findIndex(radio => radio.checked);

    // 初期フォーカスを最初のラジオボタンに設定
    radios[selectedIndex].focus();

    document.addEventListener('keydown', function(event) {
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
});

document.getElementById('menu_form').addEventListener('keypress',function(event){
    if(event.key === 'Enter'){
        event.preventDefault();
        this.submit();
    }
});