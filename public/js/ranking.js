function formSwitch() {

    java_eazy = document.querySelector(".java-eazy")
    java_normal = document.querySelector(".java-normal")
    java_hard = document.querySelector(".java-hard")

    php_eazy = document.querySelector(".php-eazy")
    php_normal = document.querySelector(".php-normal")
    php_hard = document.querySelector(".php-hard")

    python_eazy = document.querySelector(".python-eazy")
    python_normal = document.querySelector(".python-normal")
    python_hard = document.querySelector(".python-hard")


//9個書け

    let settingBox = document.getElementById("settingBox")
//radioボタンの要素を取ってきている
    document.querySelectorAll('input[type=radio]').forEach(function(element){
        //elementのなかにradioが入っている
        element.addEventListener('change', function(click_element){
            //radioボタンが変更したときにeventが発生している
            //selectedというクラスがついている要素が存在しているならば
            //そのselectedがついている要素を取得する
            let select = document.querySelector('.selected');
            
            // selectedクラスが存在する場合取得したらselectedクラスを消す
            if (select) {
            // selectedクラスを削除
            select.classList.remove('selected');   
            }

            //今現在の値を取ってくる
            // let mode = document.getElementById('mode');
            // let lebel = document.getElementById('lebel');

            // radioNodeList = mode.elements['tab_item'];
            // radioNodeList = lebel.elements['tab_item2'];

            // radioNodeList = mode.elements[1].checked = true;
            // radioNodeList = lebel.elements[1].checked = true;

            const data = new FormData(settingBox);
            let mode =data.get('tab_item')
            let level =data.get('tab_item2')


            //この考え方マジ大事
            let displayId = data.get('tab_item')+'-'+data.get('tab_item2')
            let a =document.getElementById(displayId)
            a.classList.add("selected");
			//ここにイベントの内容を記述


		});
    })

}
window.addEventListener('load', formSwitch());