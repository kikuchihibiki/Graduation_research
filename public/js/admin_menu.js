document.addEventListener('DOMContentLoaded', function() {
    const radios = document.querySelectorAll('input[name="menu"]');
    let selectedIndex = Array.from(radios).findIndex(radio => radio.checked);

    // 初期フォーカスを最初のラジオボタンに設定
    radios[selectedIndex].focus();

    let isModalOpen = false; // モーダルの状態を管理

    document.addEventListener('keydown', function(event) {
        if (isModalOpen) {
            handleModalKeydown(event); // モーダル内のキー操作
        } else {
            handleGlobalKeydown(event); // 通常のキー操作
        }
    });

    // 通常のキー操作処理
    function handleGlobalKeydown(event) {
        if (event.key === 'ArrowUp' || event.key === 'ArrowLeft') {
            selectedIndex = (selectedIndex - 1 + radios.length) % radios.length;
            radios[selectedIndex].checked = true;
            radios[selectedIndex].focus();
        } else if (event.key === 'ArrowDown' || event.key === 'ArrowRight') {
            selectedIndex = (selectedIndex + 1) % radios.length;
            radios[selectedIndex].checked = true;
            radios[selectedIndex].focus();
        } else if (event.key === 'Enter') {
            const selectedRadio = radios[selectedIndex];
            if (selectedRadio.value === 'logout') {
                event.preventDefault(); // デフォルトのフォーム送信を防止
                showModal(); // モーダルを表示
            } else {
                document.getElementById('menu_form').submit();
            }
        }
    }

    // モーダル内のキー操作処理
    function handleModalKeydown(event) {
        const focusableElements = modal.querySelectorAll('button');
        const focusableArray = Array.from(focusableElements);
        const currentIndex = focusableArray.findIndex(el => el === document.activeElement);

        if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
            event.preventDefault();
            const prevIndex = (currentIndex - 1 + focusableArray.length) % focusableArray.length;
            focusableArray[prevIndex].focus();
        } else if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
            event.preventDefault();
            const nextIndex = (currentIndex + 1) % focusableArray.length;
            focusableArray[nextIndex].focus();
        } else if (event.key === 'Escape') {
            event.preventDefault();
            closeModal();
        }
    }

    // モーダル関連の設定
    const modal = document.getElementById('logout_modal');
    const closeModalButton = document.getElementById('close_modal');
    const confirmLogoutButton = document.getElementById('confirm_logout');

    function showModal() {
        isModalOpen = true;
        modal.style.display = 'block';
        confirmLogoutButton.focus(); // モーダル内の初期フォーカス
    }

    function closeModal() {
        isModalOpen = false;
        modal.style.display = 'none';
        radios[selectedIndex].focus(); // 元のラジオボタンにフォーカスを戻す
    }

    closeModalButton.addEventListener('click', closeModal);
    confirmLogoutButton.addEventListener('click', function() {
        document.getElementById('menu_form').submit();
    });

    // モーダル外をクリックした場合
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});