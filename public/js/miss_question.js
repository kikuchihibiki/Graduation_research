document.addEventListener('DOMContentLoaded', function () {
    const radios = document.querySelectorAll('input[name="mode"]');
    const form = document.getElementById('missquestion_form');
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
