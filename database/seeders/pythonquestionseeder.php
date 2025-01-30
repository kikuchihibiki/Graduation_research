<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pythonquestionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pram = [
            'question' => 'Pythonファイルの拡張子は何？〇〇',
            'answer' => 'py',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'コンソールに文字列を出力するために使用する関数は何？〇〇〇〇〇',
            'answer' => 'print',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの要素数を取得するための関数は何？〇〇〇',
            'answer' => 'len',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '既存のリストに単一の要素を追加する関数は何？〇〇〇〇〇〇',
            'answer' => 'append',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '与えれた条件式がtrueと評価された場合プログラム処理を実行し、falseと評価された場合無視を無視する条件分岐に用いられるキーワードは何ですか？〇〇',
            'answer' => 'if',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '現在の日付と時刻を取得するために使用するモジュールは何？〇〇〇〇〇〇〇〇',
            'answer' => 'datetime',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を分割してリストに変換する関数は何？〇〇〇〇〇',
            'answer' => 'split',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ランダムな数値を生成するために使用するモジュールは何？〇〇〇〇〇〇',
            'answer' => 'random',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を大文字に変換するために使用するメソッドは何？〇〇〇〇〇',
            'answer' => 'upper',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストから最初に見つかった指定の要素を削除するメソッドは何？〇〇〇〇〇〇',
            'answer' => 'remove',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonで文字列を小文字に変換するためのメソッドは何？〇〇〇〇〇',
            'answer' => 'lower',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '新しいリストは作成せず、リストを昇順に並べ替えるメソッドは何？〇〇〇〇',
            'answer' => 'sort',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を結合するために最も効率的な方法は何？〇〇〇〇',
            'answer' => 'join',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '複数の要素をリストに追加するメソッドは何？〇〇〇〇〇〇',
            'answer' => 'extend',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの最後の要素を削除して返すメソッドは何？〇〇〇',
            'answer' => 'pop',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonで数値を文字列に変換する関数は何？〇〇〇',
            'answer' => 'str',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リスト内の要素を条件でフィルタリングする関数は何？〇〇〇〇〇〇',
            'answer' => 'filter',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの各要素に関数を適用する関数は何？〇〇〇',
            'answer' => 'map',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '複数のリストを組み合わせる関数は何？〇〇〇',
            'answer' => 'zip',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リスト内の最大の要素を取得する関数は何？〇〇〇',
            'answer' => 'max',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => '文字列の両端の空白を削除する関数は何？〇〇〇〇〇',
            'answer' => 'strip',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => 'Pythonでオブジェクトの型を取得する関数は何？〇〇〇〇',
            'answer' => 'type',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を数値に変換する関数は何？〇〇〇',
            'answer' => 'int',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => '指定した範囲の整数を生成する関数は何？〇〇〇〇〇',
            'answer' => 'range',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの指定した位置に要素を挿入するメソッドは何？〇〇〇〇〇〇',
            'answer' => 'insert',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定した要素がリスト内で最初に見つかる位置を返すメソッドは何？〇〇〇〇〇',
            'answer' => 'index',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => 'Pythonで「真」を表す値は何？〇〇〇〇',
            'answer' => 'true',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonで「偽」を表す値は何？〇〇〇〇〇',
            'answer' => 'false',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '関数の実行結果を返すために使うキーワードは何？〇〇〇〇〇〇',
            'answer' => 'return',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '外部モジュールを読み込む際に使うキーワードは何？〇〇〇〇〇〇',
            'answer' => 'import',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonのセット型に要素を追加するメソッドは何？〇〇〇',
            'answer' => 'add',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストを空にするメソッドは何？〇〇〇〇〇',
            'answer' => 'clear',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定したキーに対応する値を辞書から取得するメソッドは何？〇〇〇',
            'answer' => 'get',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ループ構文で条件のみを評価し、ループの初期化や更新処理を別途書かなければならないキーワードは何？〇〇〇〇〇',
            'answer' => 'while',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ループ処理を途中で終了するために使用するキーワードは何？〇〇〇〇〇',
            'answer' => 'break',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ループ処理をスキップして次の反復を開始するためのキーワードは何？〇〇〇〇〇〇〇〇',
            'answer' => 'continue',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonで関数を定義するためのキーワードは何？〇〇〇',
            'answer' => 'def',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスを定義するためのキーワードは何？〇〇〇〇〇',
            'answer' => 'class',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => 'Pythonでプログラムの実行を一時停止するために使用するモジュールは何？〇〇〇〇',
            'answer' => 'time',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => 'ユーザーがキーボードに入力したデータを受け付けるための関数は？〇〇〇〇〇',
            'answer' => 'input',
            'explanation' => '',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        // easy高難易度

        $pram = [
            'question' => '非同期プログラミングで非同期関数を定義するために使用するキーワードは？〇〇〇〇〇',
            'answer' => 'async',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストのすべての要素が条件を満たすかを確認するために使用する組み込み関数は？〇〇〇',
            'answer' => 'all',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '非同期関数内で他の非同期タスクを待つために使用するキーワードは？〇〇〇〇〇',
            'answer' => 'await',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '非同期タスクが例外をスローした場合、その例外を取得するために使用する非同期タスクオブジェクトのメソッドは？ 〇〇〇〇〇〇〇〇〇',
            'answer' => 'exception',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'イベントループを開始するためにasyncioモジュールで使用される関数は？ 〇〇〇',
            'answer' => 'run',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '組み込み関数であり、引数に指定した整数を2進数表現の文字列に変換する関数は？ 〇〇〇',
            'answer' => 'bin',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' リストから重複を取り除くために使用するデータ型は？ 〇〇〇',
            'answer' => 'set',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定されたキーが辞書に存在しない場合にそのキーと値を追加し、存在する場合は既存の値をそのまま返すメソッドは？ 〇〇〇',
            'answer' => 'setdefault',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' 定数を定義するために使用する関数は何ですか？ 〇〇〇〇〇〇',
            'answer' => 'define',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '主に浮動小数点数の小数点以下を丸めるために使用される関数は何ですか 〇〇〇〇〇',
            'answer' => 'round',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);
        /////normal
        $pram = [
            'question' => 'Pythonファイルの拡張子は何？',
            'answer' => 'py',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'コンソールに文字列を出力するために使用する関数は何？',
            'answer' => 'print',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの要素数を取得するための関数は何？',
            'answer' => 'len',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '既存のリストに単一の要素を追加する関数は何？',
            'answer' => 'append',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '与えれた条件式がtrueと評価された場合プログラム処理を実行し、falseと評価された場合無視を無視する条件分岐に用いられるキーワードは何ですか？',
            'answer' => 'if',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '現在の日付と時刻を取得するために使用するモジュールは何？',
            'answer' => 'datetime',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を分割してリストに変換する関数は何？',
            'answer' => 'split',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ランダムな数値を生成するために使用するモジュールは何？',
            'answer' => 'random',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を大文字に変換するために使用するメソッドは何？',
            'answer' => 'upper',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストから最初に見つかった指定の要素を削除するメソッドは何？',
            'answer' => 'remove',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonで文字列を小文字に変換するためのメソッドは何？',
            'answer' => 'lower',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストを昇順に並べ替えるメソッドは何？',
            'answer' => 'sort',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を結合するために最も効率的な方法は何？',
            'answer' => 'join',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '複数の要素をリストに追加するメソッドは何？',
            'answer' => 'extend',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの最後の要素を削除して返すメソッドは何？',
            'answer' => 'pop',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonで数値を文字列に変換する関数は何？',
            'answer' => 'str',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リスト内の要素を条件でフィルタリングする関数は何？',
            'answer' => 'filter',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの各要素に関数を適用する関数は何？',
            'answer' => 'map',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '複数のリストを組み合わせる関数は何？',
            'answer' => 'zip',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リスト内の最大の要素を取得する関数は何？',
            'answer' => 'max',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => '文字列の両端の空白を削除する関数は何？',
            'answer' => 'strip',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => 'Pythonでオブジェクトの型を取得する関数は何？',
            'answer' => 'type',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を数値に変換する関数は何？',
            'answer' => 'int',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => '指定した範囲の整数を生成する関数は何？',
            'answer' => 'range',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの指定した位置に要素を挿入するメソッドは何？',
            'answer' => 'insert',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定した要素がリスト内で最初に見つかる位置を返すメソッドは何？',
            'answer' => 'index',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);



        $pram = [
            'question' => 'Pythonで「真」を表す値は何？',
            'answer' => 'true',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonで「偽」を表す値は何？',
            'answer' => 'false',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '関数の実行結果を返すために使うキーワードは何？',
            'answer' => 'return',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '外部モジュールを読み込む際に使うキーワードは何？',
            'answer' => 'import',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonのセット型に要素を追加するメソッドは何？',
            'answer' => 'add',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストを空にするメソッドは何？',
            'answer' => 'clear',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定したキーに対応する値を辞書から取得するメソッドは何？',
            'answer' => 'get',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ループ構文で条件のみを評価し、ループの初期化や更新処理を別途書かなければならないキーワードは何？',
            'answer' => 'while',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ループ処理を途中で終了するために使用するキーワードは何？',
            'answer' => 'break',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ループ処理をスキップして次の反復を開始するためのキーワードは何？',
            'answer' => 'continue',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonで関数を定義するためのキーワードは何？',
            'answer' => 'def',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスを定義するためのキーワードは何？',
            'answer' => 'class',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        $pram = [
            'question' => 'Pythonでプログラムの実行を一時停止するために使用するモジュールは何？',
            'answer' => 'time',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ユーザーがキーボードに入力したデータを受け付けるための関数は？',
            'answer' => 'input',
            'explanation' => '',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        // normal高難易度
        $pram = [
            'question' => '非同期プログラミングで非同期関数を定義するために使用するキーワードは？',
            'answer' => 'async',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストのすべての要素が条件を満たすかを確認するために使用する組み込み関数は？',
            'answer' => 'all',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '非同期関数内で他の非同期タスクを待つために使用するキーワードは？',
            'answer' => 'await',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '非同期タスクが例外をスローした場合、その例外を取得するために使用する非同期タスクオブジェクトのメソッドは？',
            'answer' => 'exception',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'イベントループを開始するためにasyncioモジュールで使用される関数は？',
            'answer' => 'run',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '組み込み関数であり、引数に指定した整数を2進数表現の文字列に変換する関数は？',
            'answer' => 'bin',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' リストから重複を取り除くために使用するデータ型は？',
            'answer' => 'set',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定されたキーが辞書に存在しない場合にそのキーと値を追加し、存在する場合は既存の値をそのまま返すメソッドは？',
            'answer' => 'setdefault',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' 定数を定義するために使用する関数は何ですか？',
            'answer' => 'define',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '主に浮動小数点数の小数点以下を丸めるために使用される関数は何ですか？',
            'answer' => 'round',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);
        //ここからhard



        $pram = [
            'question' => '文字列が指定された接頭辞で始まるならTrueを、そうでなければFalseを返しますメソッドは何ですか？',
            'answer' => 'startswith',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列が指定された接頭辞終わるならTrueを、そうでなければFalseを返しますメソッドは何ですか？',
            'answer' => 'endswith',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '関数の実行状態を保持したまま値を返し、次回呼び出されたときに続きから処理を再開するために使うキーワードは何ですか？',
            'answer' => 'yield',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'コードの一部をドキュメントとして記述するための文字列リテラルの形式は何？',
            'answer' => 'docstring',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ランダムな整数を指定した範囲から生成するモジュール内の関数は何？',
            'answer' => 'randrange',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'グローバル変数を参照するために使用する関数は何？',
            'answer' => 'globals',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'データを圧縮・解凍する際に使用するモジュールは何？',
            'answer' => 'zipfile',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルにデータを書き込むために使用する関数は何ですか？',
            'answer' => 'write',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'あらゆるイテラブル（リスト、タプル、辞書のキー、文字列など）をソートして、新しいソート済みリストを返す関数は？',
            'answer' => 'sorted',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルまたはディレクトリを削除するための関数は何？',
            'answer' => 'rmdir',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'forループの中でリストやタプルなどの要素と同時にインデックス番号（カウント、順番）を取得できる関数は？',
            'answer' => 'enumerate',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列が指定したパターンに一致するかを正規表現で確認するメソッドは何ですか？',
            'answer' => 'match',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '変数の値を交換する際に使う一般的な記法は何？',
            'answer' => 'swap',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '全てのローカル変数を辞書として取得する関数は何？',
            'answer' => 'locals',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの要素を逆順に並べ替えるメソッドは何？',
            'answer' => 'reverse',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '日時を文字列に変換する関数は何？',
            'answer' => 'strftime',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストのコピーを作成するためのメソッドは何？',
            'answer' => 'copy',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'イテラブルなオブジェクトから要素を一つずつ取得するための関数は何？',
            'answer' => 'iter',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルを開く際に使用する関数は何？',
            'answer' => 'open',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '数値の絶対値を取得する関数は何？',
            'answer' => 'abs',
            'explanation' => '',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        //高難易度

        $pram = [
            'question' => '指定した部分文字列が文字列の中に含まれているかどうかを調べ、その最初に出現する位置を返し、もし見つからなかった場合は-1を返すメソッドは何ですか？',
            'answer' => 'find',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定したファイルの最終アクセス時刻を取得する関数は何ですか？',
            'answer' => 'getatime',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'あるクラスが別のクラスを継承しているかどうかを確認するための関数は？',
            'answer' => 'issubclass',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '反復可能なオブジェクト（リストやタプルなど）をループで処理する際に、インデックス（位置）と要素の両方を同時に取得できるようにするメソッドは何ですか',
            'answer' => 'enumerate',
            'explanation' => 'インデックス（番号）付きでループ処理を行うことができます。',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'オブジェクトが特定のクラスやサブクラスに属するかを確認する関数は何ですか？',
            'answer' => 'isinstance',
            'explanation' => 'クラスの継承関係も考慮します。',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '引数として与えられた文字列が数字かどうか確認する関数は何ですか？',
            'answer' => 'isdigit',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '一時的なファイルを作成するために使用される関数は何ですか？',
            'answer' => 'TemporaryFile',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' 辞書内のすべての値を取得するメソッドは？',
            'answer' => 'values',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' 複数の 位置引数 をタプルとして受け取る関数の引数に指定する、可変長引数を表すキーワードは？',
            'answer' => '*args',
            'explanation' => '*args を使えばリストやタプルを展開して関数に渡せる。',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonのasync/awaitで非同期に実行する際に、関数を並列に実行するための関数は？',
            'answer' => 'gather',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '1',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);
    }
}
