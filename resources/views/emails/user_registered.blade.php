<!DOCTYPE html>
<html>

<head>
    <title>仮パスワードとログイン情報</title>
</head>

<body>
    <p>{{ $emailData['name'] }} 様</p>
    <p>以下の情報で仮ログインをしてください。</p>
    <p>メールアドレス: {{ $emailData['email'] }}</p>
    <p>仮パスワード: {{ $emailData['password'] }}</p>
    <p>仮ログインはこちらから: <a href="{{ $emailData['url'] }}">{{ $emailData['url'] }}</a></p>
    <p>ログイン後、パスワードを変更することをお勧めします。</p>
    <p>よろしくお願いいたします。</p>
</body>

</html>