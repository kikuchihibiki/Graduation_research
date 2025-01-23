<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/layout.css">
    @yield('css')
</head>

<body>
    <main>
        @yield('content')
    </main>
    <audio id="sound">
        <source src="{{ asset('assets/audio/se_select8.mp3') }}" type="audio/mp3">
        お使いのブラウザは音楽を再生できません。
    </audio>
    <audio id="start">
        <source src="{{ asset('assets/audio/start1.mp3') }}" type="audio/mp3">
        お使いのブラウザは音楽を再生できません。
    </audio>
    <script src="{{ asset('js/sound.js') }}"></script>

</body>

</html>