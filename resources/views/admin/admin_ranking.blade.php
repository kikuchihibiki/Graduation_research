@extends('layout.layout')
@section('title', 'ランキング修正')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_ranking.css') }}">
@endsection
@section('content')
<div class="q-body">
    <div class="head_tab">
        <h1 class="title">ランキング修正</h1>
        <div class="reset_tab">
            <a href="#" class="choice_reset">選択してリセット</a>
            <a href="{{ route('all_reset') }}" class="allchoice_reset">すべてリセット</a>
        </div>
    </div>

    <table class="data">
        <form id="settingBox" action="{{ route('ranking_reset') }}" method="post">
            @csrf
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
            <input id="submitBtn" type="submit" style="display: none;">
        </form>
        <form action="{{ route('delete_ranking') }}" method="post" id="menu_form">
            @csrf
            <tbody class="ranking_tab selected" id="java-eazy">
                @foreach ($rankings['javaeasy'] as $index => $rank)
                <tr class="rank{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['javaeasy']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

            <!-- Java Normal -->
            <tbody class="ranking_tab" id="java-normal">
                @foreach ($rankings['javanormal'] as $index => $rank)
                <tr class="rank_tr_{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['javanormal']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

            <!-- Java Hard -->
            <tbody class="ranking_tab" id="java-hard">
                @foreach ($rankings['javahard'] as $index => $rank)
                <tr class="rank_tr_{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['javahard']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

            <!-- Python Easy -->
            <tbody class="ranking_tab" id="python-eazy">
                @foreach ($rankings['pythoneasy'] as $index => $rank)
                <tr class="rank_tr_{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['pythoneasy']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

            <!-- Python Normal -->
            <tbody class="ranking_tab" id="python-normal">
                @foreach ($rankings['pythonnormal'] as $index => $rank)
                <tr class="rank_tr_{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['pythonnormal']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

            <!-- Python Hard -->
            <tbody class="ranking_tab" id="python-hard">
                @foreach ($rankings['pythonhard'] as $index => $rank)
                <tr class="rank_tr_{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['pythonhard']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

            <!-- PHP Easy -->
            <tbody class="ranking_tab" id="php-eazy">
                @foreach ($rankings['phpeasy'] as $index => $rank)
                <tr class="rank_tr_{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['phpeasy']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

            <!-- PHP Normal -->
            <tbody class="ranking_tab" id="php-normal">
                @foreach ($rankings['phpnormal'] as $index => $rank)
                <tr class="rank_tr_{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['phpnormal']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

            <!-- PHP Hard -->
            <tbody class="ranking_tab" id="php-hard">
                @foreach ($rankings['phphard'] as $index => $rank)
                <tr class="rank_tr_{{ $index + 1 }}">
                    <td class="rank{{ $index + 1 }} rank_tab"><input type="checkbox" name="id" value="{{ $rank->id }}" class="deleteCheck" id="deleteCheck">{{ $index + 1 }}位</td>
                    <td class="rank-name">{{ $rank->name }}</td>
                    <td class="rank-score">{{ $rank->score }}</td>
                </tr>
                @endforeach
                @for ($i = count($rankings['phphard']); $i < 5; $i++)
                    <tr>
                    <td class="rank{{ $i + 1 }} rank_tab">{{ $i + 1 }}位</td>
                    <td class="text-white">-</td>
                    <td class="text-white">-</td>
                    </tr>
                    @endfor
            </tbody>

    </table>
    <div class="button_tab">
        <input type="submit" style="display:none;">
        </from>
        <a href="#" style="color:white; font-size: 24px;">≻戻る</a>
        <a href="javascript:void(0);" onclick="document.getElementById('menu_form').submit();" style="font-size: 24px;">≻確認</a>
    </div>

</div>

<script src="{{ asset('js/admin_ranking.js') }}">

</script>
@endsection