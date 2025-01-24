@extends('layout.layout')
@section('title', 'タイトル画面')
@section('css')
<link rel="stylesheet" href="{{ asset('css/ranking.css') }}">
@endsection
@section('content')
<div class="q-body">
    <h1 class="title">ランキング</h1>

    <table class="data">
        <form id="settingBox">
            <thead>
                <tr class="mode">


                    <th class="lang java">
                        <input id="javaCheck" type="radio" name="tab_item" checked value="java">
                        <label class="tab_item checkBox kind" for="javaCheck">JAVA</label>
                    </th>

                    <th class="lang php">
                        <input id="phpCheck" type="radio" name="tab_item" value="php">
                        <label class="tab_item checkBox kind" for="phpCheck">PHP</label>
                    </th>

                    <th class="lang python">
                        <input id="pythonCheck" type="radio" name="tab_item" value="python">
                        <label class="tab_item checkBox kind" for="pythonCheck">PYTHON</label>
                    </th>


                </tr>
                <tr class="level">

                    <th>
                        <input id="eazy" type="radio" name="tab_item2" value="eazy" checked>
                        <label class="tab_item checkBox2" for="eazy">イージー</label>
                    </th>


                    <th>
                        <input id="normal" type="radio" name="tab_item2" value="normal">
                        <label class="tab_item checkBox2" for="normal">ノーマル</label>
                    </th>


                    <th>
                        <input id="hard" type="radio" name="tab_item2" value="hard">
                        <label class="tab_item checkBox2" for="hard">ハード</label>
                    </th>
                </tr>
            </thead>
        </form>


        <tbody class="ranking_tab selected" id="java-eazy">
            @foreach ($rankings['javaeasy'] as $index => $rank)
            <tr class="rank{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['javaeasy']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>

        <!-- Java Normal -->
        <tbody class="ranking_tab" id="java-normal">
            @foreach ($rankings['javanormal'] as $index => $rank)
            <tr class="rank_tr_{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['javanormal']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>

        <!-- Java Hard -->
        <tbody class="ranking_tab" id="java-hard">
            @foreach ($rankings['javahard'] as $index => $rank)
            <tr class="rank_tr_{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['javahard']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>

        <!-- Python Easy -->
        <tbody class="ranking_tab" id="python-eazy">
            @foreach ($rankings['pythoneasy'] as $index => $rank)
            <tr class="rank_tr_{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['pythoneasy']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>

        <!-- Python Normal -->
        <tbody class="ranking_tab" id="python-normal">
            @foreach ($rankings['pythonnormal'] as $index => $rank)
            <tr class="rank_tr_{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['pythonnormal']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>

        <!-- Python Hard -->
        <tbody class="ranking_tab" id="python-hard">
            @foreach ($rankings['pythonhard'] as $index => $rank)
            <tr class="rank_tr_{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['pythonhard']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>

        <!-- PHP Easy -->
        <tbody class="ranking_tab" id="php-eazy">
            @foreach ($rankings['phpeasy'] as $index => $rank)
            <tr class="rank_tr_{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['phpeasy']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>

        <!-- PHP Normal -->
        <tbody class="ranking_tab" id="php-normal">
            @foreach ($rankings['phpnormal'] as $index => $rank)
            <tr class="rank_tr_{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['phpnormal']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>

        <!-- PHP Hard -->
        <tbody class="ranking_tab" id="php-hard">
            @foreach ($rankings['phphard'] as $index => $rank)
            <tr class="rank_tr_{{ $index + 1 }}">
                <td class="rank{{ $index + 1 }}">{{ $index + 1 }}位</td>
                <td class="rank-name">{{ $rank->name }}</td>
                <td class="rank-score">{{ $rank->score }}</td>
            </tr>
            @endforeach
            @for ($i = count($rankings['phphard']); $i < 5; $i++)
                <tr>
                <td class="rank{{ $i + 1 }}">{{ $i + 1 }}位</td>
                <td class="text-white">-</td>
                <td class="text-white">-</td>
                </tr>
                @endfor
        </tbody>
    </table>
    <div class="score">
        <p id="scoreDisplay" class="white">あなたのスコア: <span>-</span></p>
    </div>
    <div id="javaeazy" class="score">
        @if (isset($validScores['javaeasy']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['javaeasy']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>

    <div id="javanormal" class="score">
        @if (isset($validScores['javanormal']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['javanormal']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>

    <div id="javahard" class="score">
        @if (isset($validScores['javahard']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['javahard']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>

    <div id="phpeazy" class="score">
        @if (isset($validScores['phpeasy']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['phpeasy']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>

    <div id="phpnormal" class="score">
        @if (isset($validScores['phpnormal']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['phpnormal']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>

    <div id="phphard" class="score">
        @if (isset($validScores['phphard']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['phphard']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>

    <div id="pythoneazy" class="score">
        @if (isset($validScores['pythoneasy']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['pythoneasy']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>

    <div id="pythonnormal" class="score">
        @if (isset($validScores['pythonnormal']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['pythonnormal']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>

    <div id="pythonhard" class="score">
        @if (isset($validScores['pythonhard']['s']))
        <p class="white">あなたのスコア: <span>{{ $validScores['pythonhard']['s'] }}</span></p>
        @else
        <p>スコアはありません。</p>
        @endif
    </div>



</div>
<div class="ta">
    <div class="re">
        <a class="reset position-reset" href="{{ route('score_reset') }}">スコアリセット</a>
    </div>
    <div class="back">
        <a class="reset position-reset" href="{{ route('select_mode') }}" style="color:white;">≻戻る</a>
    </div>
</div>
<script src="{{ asset('js/score.js') }}"></script>
<script src="{{ asset('js/ranking.js') }}">
    /*９つ php-hard*/
    /*

    作ったらまず最初はジャヴァのイージーだけ表示するCSS他は隠す


    チェックボックスの値が変わったらどこにチェックボックスの内容が変わったかっていうイベント（事象）を取ってきてその値に一致するランキングのテーブルを表示する
    HTMLとJavaScriptのみしか書かない


    */
</script>
@endsection