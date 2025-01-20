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
			console.log(click_element);
			console.log(element.checked);
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

            console.log('モード:'+data.get('tab_item'));
            console.log('難易度:'+data.get('tab_item2'));

            let mode =data.get('tab_item')
            let level =data.get('tab_item2')


            //この考え方マジ大事
            let displayId = data.get('tab_item')+'-'+data.get('tab_item2')
            console.log(displayId)
            let a =document.getElementById(displayId)
            a.classList.add("selected");

            // if(mode == "java"){
            //     if(level == "eazy"){
            //         console.log(java_eazy)
            //        let a =document.getElementById("java-eazy")
            //        a.classList.add("selected");
            //     }else if(level=="normal"){
            //         let a =document.getElementById("java-nomal")
            //         a.classList.add("selected");
            //     }else if(level =="hard"){
            //         console.log(java_hard) ;
            //         let a =document.getElementById("java-hard")
            //         a.classList.add("selected");
            //     }
            // }else if(mode == "php"){
            //     if(level == "eazy"){
            //         let a =document.getElementById("php-eazy")
            //         a.classList.add("selected");
            //         console.log(php_eazy);
            //     } else if (level=="normal"){
            //         let a =document.getElementById("php-normal")
            //         a.classList.add("selected");
            //         console.log(php_normal);
            //     } else if ( level =="hard"){
            //         let a =document.getElementById("php-hard")
            //         a.classList.add("selected");
            //         console.log(php_hard);
            //     }
            // } else if (mode == "python"){
            //     if(level == "eazy"){
            //         let a =document.getElementById("python-eazy")
            //         a.classList.add("selected");
            //         console.log(python_eazy);
            //     }else if(level=="normal"){
            //         let a =document.getElementById("python-normal")
            //         a.classList.add("selected");
            //         console.log(python_normal);
            //     }else if(level =="hard"){
            //         let a =document.getElementById("python-hard")
            //         a.classList.add("selected");
            //         console.log(python_hard) ;
            //     }
            // }



			//ここにイベントの内容を記述


		});
    })



   /* console.log("toreteru");
    hoge = document.getElementsByName('tab_item')
    if (hoge[0].checked) {
        // 好きな食べ物が選択されたら下記を実行します
        document.getElementById('').style.display = "";
        document.getElementById('').style.display = "none";
        document.getElementById('').style.display = "none";
    } else if (hoge[1].checked) {
        // 好きな場所が選択されたら下記を実行します
        document.getElementById('foodList').style.display = "none";
        document.getElementById('placeList').style.display = "";
    } else {
        document.getElementById('foodList').style.display = "none";
        document.getElementById('placeList').style.display = "none";
        
    }
        */
}
window.addEventListener('load', formSwitch());

document.querySelector('.choice_reset').addEventListener('click', function (e) {
    e.preventDefault();  // リンクのデフォルト動作をキャンセル
    document.getElementById('submitBtn').click();  // フォームを送信
});