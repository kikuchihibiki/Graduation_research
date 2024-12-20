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
                <!-- 問題1 -->
                <tr>
                    <th class="quiz-column">
                        問題1 <span>{{ session('questionData')[0]['question'] }}</span>
                    </th>
                    <td class="action-column">
                        {{ session('answerArray')[0] }}
                        <span>
                            <a href="{{ route('question_commentary', ['id' => session('idArry')[0]]) }}" class="explanation-link">回答解説を見る</a>
                        </span>
                    </td>
                </tr>
                <!-- 問題2 -->
                <tr>
                    <th class="quiz-column">
                        問題2 <span>{{ session('questionData')[1]['question'] }}</span>
                    </th>
                    <td class="action-column">
                        {{ session('answerArray')[1] }}
                        <span>
                            <a href="{{ route('question_commentary', ['id' => session('idArry')[1]]) }}" class="explanation-link">回答解説を見る</a>
                        </span>
                    </td>
                </tr>
                <!-- 問題3 -->
                <tr>
                    <th class="quiz-column">

                        問題3 <span>{{ session('questionData')[2]['question'] }}</span>
                    </th>
                    <td class="action-column">

                        {{ session('answerArray')[2] }}
                        <span>
                            <a href="{{ route('question_commentary', ['id' => session('idArry')[2]]) }}" class="explanation-link">回答解説を見る</a>
                        </span>
                    </td>
                </tr>
                <!-- 問題4 -->
                <tr>
                    <th class="quiz-column">

                        問題4 <span>{{ session('questionData')[3]['question'] }}</span>
                    </th>
                    <td class="action-column">

                        {{ session('answerArray')[3] }}
                        <span>
                            <a href="{{ route('question_commentary', ['id' => session('idArry')[3]]) }}" class="explanation-link">回答解説を見る</a>
                        </span>
                    </td>
                </tr>
                <!-- 問題5 -->
                <tr>
                    <th class="quiz-column">

                        問題5 <span>{{ session('questionData')[4]['question'] }}</span>
                    </th>
                    <td class="action-column">

                        {{ session('answerArray')[4] }}
                        <span>
                            <a href="{{ route('question_commentary', ['id' => session('idArry')[4]]) }}" class="explanation-link">回答解説を見る</a>
                        </span>
                    </td>
                </tr>
                <!-- 問題6 -->
                <tr>
                    <th class="quiz-column">

                        問題6 <span>{{ session('questionData')[5]['question'] }}</span>
                    </th>
                    <td class="action-column">

                        {{ session('answerArray')[5] }}
                        <span>
                            <a href="{{ route('question_commentary', ['id' => session('idArry')[5]]) }}" class="explanation-link">回答解説を見る</a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- 下部メニュー -->
    <div class="bottom-menu">
        <a href="{{ route('back_commentary') }}" class="menu-btn">リザルト画面へ戻る</a>
        <a href="{{ route('start_game') }}" class="menu-btn">もう一度プレイ</a>
    </div>
</body>

</html>