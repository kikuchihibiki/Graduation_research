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

        @font-face {
            font-family: 'k8x12L';
            src: url('/font/k8x12L.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        /* フォントを適用 */
        body {
            font-family: 'k8x12L', sans-serif;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- 他のヘッダ情報 -->
</head>

<body>

    <!-- Phaserゲームを表示する要素 -->
    <div id="phaser-example"></div>
    <script>
        var questionData = @json($question);
        var timeLimitData = @json(1);
        var modeData = @json($mode);
        var levelData = @json($level);
    </script>
    <!-- ゲームの初期化スクリプト -->
    <script src="{{ asset('scripts/main_scene.js') }}"></script>
    <script src="{{ asset('scripts/game_boot.js') }}"></script>
</body>

</html>