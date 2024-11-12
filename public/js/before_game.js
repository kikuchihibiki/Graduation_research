document.getElementById('nameForm').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        var nameInput = document.querySelector('input[name="name"]');
        if (nameInput.value.trim() === '') {
            nameInput.value = '名無し';
        }
        this.submit();
    }
});

document.getElementById('nameForm').addEventListener('submit', function(event) {
    var nameInput = document.querySelector('input[name="name"]');
    if (nameInput.value.trim() === '') {
        nameInput.value = '名無し';
    }
});
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('nameInput').focus();
});

document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            document.getElementById('setupForm').submit();
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('java').focus();
});

document.addEventListener('DOMContentLoaded', function() {
    const radios = document.querySelectorAll('input[name="mode"]');
    let selectedIndex = Array.from(radios).findIndex(radio => radio.checked);

    if (selectedIndex !== -1) {
        radios[selectedIndex].focus();
    }

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


document.getElementById('mode_form').addEventListener('keypress',function(event){
    if(event.key === 'Enter'){
        event.preventDefault();
        this.submit();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const radios = document.querySelectorAll('input[name="level"]');
    let selectedIndex = Array.from(radios).findIndex(radio => radio.checked);

    // ページ読み込み時に最初にチェックされているラジオボタンにフォーカスを設定
    if (selectedIndex !== -1) {
        radios[selectedIndex].focus();
    }

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

document.getElementById('level_form').addEventListener('keypress',function(event){
    if(event.key === 'Enter'){
        event.preventDefault();
        this.submit();
    }
});

