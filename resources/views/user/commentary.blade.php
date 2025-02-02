<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>クイズ結果画面</title>
    <link rel="stylesheet" href="{{ asset('css/commentary.css') }}">
</head>

<body>
    <div class="quiz-container">
        <table class="quiz-table">
            <tbody>
                @foreach (session('questionData') as $index => $question)
                <tr>
                    <th class="quiz-column">
                        問題{{ $index + 1 }} <span>{{ $question['question'] }}</span>
                    </th>
                    <td class="action-column">
                        {{ session('answerArray')[$index] }}
                        <span>
                            <a href="{{ route('question_commentary', ['id' => session('idArry')[$index]]) }}" class="explanation-link">回答解説を見る</a>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- 下部メニュー -->
    <div class="bottom-menu">
        <a href="{{ route('back_commentary') }}" class="menu-btn">リザルト画面へ戻る</a>
        <a href="{{ route('game_restart') }}" class="menu-btn">もう一度プレイ</a>
    </div>
</body>

</html>