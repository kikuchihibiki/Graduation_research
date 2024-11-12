<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ゲーム画面</title>

    <!-- Phaserの読み込み -->
    <script src="{{ asset('scripts/phaser.min.js') }}"></script>

    <!-- ゲームスクリプトの読み込み -->
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <!-- Phaserゲームを表示する要素 -->
    <div id="phaser-example"></div>

    <!-- ゲームの初期化スクリプト -->
    <script src="{{ asset('scripts/main_scene.js') }}"></script>
    <script src="{{ asset('scripts/game_boot.js') }}"></script>
</body>

</html>