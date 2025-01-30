<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class javaquestionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //java問題イージー40問
        $pram = [
            'question' => 'クラスをコンパイルするために使用するコマンドは？ 〇〇〇〇〇',
            'answer' => 'javac',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準出力に改行を伴うメッセージを表示する際に使用するメソッド名は？ 〇〇〇〇〇〇〇',
            'answer' => 'println',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '無限ループを実現するために使用されるループ構文は？ 〇〇〇',
            'answer' => 'for',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '整数型の変数に負の値も扱いたい場合に使用するデータ型は？ 〇〇〇',
            'answer' => 'int',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を扱うクラスは？ 〇〇〇〇〇〇',
            'answer' => 'string',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaで例外処理を開始するために使用するキーワードは？ 〇〇〇',
            'answer' => 'try',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ループを終了する際に使用するキーワードは？ 〇〇〇〇〇',
            'answer' => 'braek',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '次のループ処理中に現在の処理をスキップする際に使用するキーワードは？ 〇〇〇〇〇〇〇〇',
            'answer' => 'continue',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '条件が成り立たない場合に実行されるブロックを示すキーワードは？ 〇〇〇〇',
            'answer' => 'else',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準入力からユーザーからの入力を受け取るために使用するメソッド名は？ 〇〇〇〇〇〇〇〇',
            'answer' => 'nextline',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準入力から整数を受け取るために使用するメソッドは？ 〇〇〇〇〇〇〇',
            'answer' => 'nextint',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列や配列の長さを取得する際に使用するプロパティ名は？ 〇〇〇〇〇〇',
            'answer' => 'length',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'オブジェクトのハッシュコードを取得するメソッド名は？ 〇〇〇〇〇〇〇〇',
            'answer' => 'hashcode',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '無名クラスを作成する際に使用される構文は？ 〇〇〇',
            'answer' => 'new',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '乱数を生成するために使用するクラス名は？ 〇〇〇〇〇〇',
            'answer' => 'random',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '外部ライブラリやパッケージをインポートする際に使用するキーワードは？ 〇〇〇〇〇〇',
            'answer' => 'import',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスのメソッドやフィールドを静的にアクセスする際に使用するキーワードは？ 〇〇〇〇〇〇',
            'answer' => 'static',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'コレクションの要素をすべて削除する際に使用するメソッド名は？ 〇〇〇〇〇',
            'answer' => 'clear',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaで例外処理をキャッチするために使用するキーワードは？ 〇〇〇〇〇',
            'answer' => 'catch',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'メソッドの実行を停止し、値を返すために使用するキーワードは？ 〇〇〇〇〇〇',
            'answer' => 'return',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'スレッドの一時停止を行うメソッドは？ 〇〇〇〇〇',
            'answer' => 'sleep',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '列挙型を定義するために使用するキーワードは？ 〇〇〇〇',
            'answer' => 'enum',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '引数として渡された値に応じて別の値を返す構文は？ 〇〇〇〇〇〇',
            'answer' => 'switch',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '数値を四捨五入するために使用するメソッドは？ 〇〇〇〇〇',
            'answer' => 'round',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '終了ステータスコードを指定してプログラムを終了させるメソッド名は？ 〇〇〇〇',
            'answer' => 'exit',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの内容をソートするために使用するメソッド名は？ 〇〇〇〇',
            'answer' => 'sort',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストに指定した位置に要素を挿入する際に使用するメソッド名は？ 〇〇〇',
            'answer' => 'add',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '特定のスレッドが終了するのを待つ際に使用するメソッド名は？ 〇〇〇〇',
            'answer' => 'join',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '現在のスレッドがロックを獲得するまで待機するメソッド名は？ 〇〇〇〇〇',
            'answer' => 'await',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '2つの数値の最大値を取得するために使用するメソッド名は？ 〇〇〇',
            'answer' => 'max',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '暗黙的に型を変換する際に使用するキーワードは？ 〇〇〇〇',
            'answer' => 'cast',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '自分自身のインスタンスを指す変数は？ 〇〇〇〇',
            'answer' => 'this',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '重複を許さない集合を表すインターフェース名は？ 〇〇〇',
            'answer' => 'set',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスが「シングルトンパターン」を実装する際に使用されるメソッドの名前は？ 〇〇〇〇〇〇〇〇〇〇〇',
            'answer' => 'getInstance',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'コレクションのすべての要素を処理するために使用される繰り返し構造の名前は？ 〇〇〇〇〇〇〇〇',
            'answer' => 'iterator',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '例外を明示的にスロー(発生)する際に使用するキーワードは？ 〇〇〇〇〇',
            'answer' => 'throw',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '小数点以下を含む最大15桁の数字を扱えるプリミティブ型の一つのデータ型は？ 〇〇〇〇〇〇',
            'answer' => 'double',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'HTTPリクエストを送信するためのモダンなAPIのクラス名は？ 〇〇〇〇〇〇〇〇〇〇',
            'answer' => 'HttpClient',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ランタイム時に型を確認する演算子は？ 〇〇〇〇〇〇〇〇〇〇',
            'answer' => 'instanceof',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaでスタックデータ構造を提供するクラス名は？ 〇〇〇〇〇',
            'answer' => 'stack',
            'explanation' => '',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        //イージー高難易度10問
        $pram = [
            'question' => '整数を2進数文字列に変換するために使用するメソッド名は？ 〇〇〇〇〇〇〇〇〇〇〇〇〇〇',
            'answer' => 'toBinaryString',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列内の特定の部分を置き換えるために使用するメソッド名は？ 〇〇〇〇〇〇〇',
            'answer' => 'replace',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '2つの文字列を比較する際に使用するメソッド名は？ 〇〇〇〇〇〇〇〇〇',
            'answer' => 'compareTo',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列が特定のサフィックスで終わるかを確認するメソッド名は？ 〇〇〇〇〇〇〇〇',
            'answer' => 'endsWith',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列をすべて小文字に変換するために使用するメソッド名は？ 〇〇〇〇〇〇〇〇〇〇〇',
            'answer' => 'toLowerCase',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列をすべて大文字に変換するために使用するメソッド名は？ 〇〇〇〇〇〇〇〇〇〇〇',
            'answer' => 'toUpperCase',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ストリーム操作を終了し、結果をコレクションとして返すメソッド名は？ 〇〇〇〇〇〇〇',
            'answer' => 'collect',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストに特定の要素が含まれているかを確認するメソッド名は？ 〇〇〇〇〇〇〇〇',
            'answer' => 'contains',
            'explanation' => 'リストにためこんだ要素を検索したり、重複を除きながらリストに要素を追加したりするのに使います。',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'インターフェースを実装するクラスが使用するキーワードは？ 〇〇〇〇〇〇〇〇〇〇',
            'answer' => 'implements',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaアプリケーションのパフォーマンスを分析するために使用されるモニタリングツールのコマンドは？ 〇〇〇〇〇〇〇〇',
            'answer' => 'jconsole',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        //ノーマル40問
        $pram = [
            'question' => 'クラスをコンパイルするために使用するコマンドは？',
            'answer' => 'javac',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準出力に改行を伴うメッセージを表示する際に使用するメソッド名は？',
            'answer' => 'println',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '無限ループを実現するために使用されるループ構文は？',
            'answer' => 'for',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '整数型の変数に負の値も扱いたい場合に使用するデータ型は？',
            'answer' => 'int',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を扱うクラスは？',
            'answer' => 'string',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaで例外処理を開始するために使用するキーワードは？',
            'answer' => 'try',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ループを終了する際に使用するキーワードは？',
            'answer' => 'braek',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '次のループ処理中に現在の処理をスキップする際に使用するキーワードは？',
            'answer' => 'continue',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '条件が成り立たない場合に実行されるブロックを示すキーワードは？',
            'answer' => 'else',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準入力からユーザーからの入力を受け取るために使用するメソッド名は？',
            'answer' => 'nextline',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準入力から整数を受け取るために使用するメソッドは？',
            'answer' => 'nextint',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列や配列の長さを取得する際に使用するプロパティ名は？',
            'answer' => 'length',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'オブジェクトのハッシュコードを取得するメソッド名は？',
            'answer' => 'hashcode',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '無名クラスを作成する際に使用される構文は？',
            'answer' => 'new',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '乱数を生成するために使用するクラス名は？',
            'answer' => 'random',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '外部ライブラリやパッケージをインポートする際に使用するキーワードは？',
            'answer' => 'import',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスのメソッドやフィールドを静的にアクセスする際に使用するキーワードは？',
            'answer' => 'static',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'コレクションの要素をすべて削除する際に使用するメソッド名は？',
            'answer' => 'clear',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaで例外処理をキャッチするために使用するキーワードは？',
            'answer' => 'catch',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'メソッドの実行を停止し、値を返すために使用するキーワードは？',
            'answer' => 'return',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'スレッドの一時停止を行うメソッドは？',
            'answer' => 'sleep',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '列挙型を定義するために使用するキーワードは？',
            'answer' => 'enum',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '引数として渡された値に応じて別の値を返す構文は？',
            'answer' => 'switch',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '数値を四捨五入するために使用するメソッドは？',
            'answer' => 'round',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '終了ステータスコードを指定してプログラムを終了させるメソッド名は？',
            'answer' => 'exit',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストの内容をソートするために使用するメソッド名は？',
            'answer' => 'sort',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストに指定した位置に要素を挿入する際に使用するメソッド名は？',
            'answer' => 'add',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '特定のスレッドが終了するのを待つ際に使用するメソッド名は？',
            'answer' => 'join',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '現在のスレッドがロックを獲得するまで待機するメソッド名は？',
            'answer' => 'await',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '2つの数値の最大値を取得するために使用するメソッド名は？',
            'answer' => 'max',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '暗黙的に型を変換する際に使用するキーワードは？',
            'answer' => 'cast',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '自分自身のインスタンスを指す変数は？',
            'answer' => 'this',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '重複を許さない集合を表すインターフェース名は？',
            'answer' => 'set',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスが「シングルトンパターン」を実装する際に使用されるメソッドの名前は？',
            'answer' => 'getInstance',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'コレクションのすべての要素を処理するために使用される繰り返し構造の名前は？',
            'answer' => 'iterator',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '例外を明示的にスロー(発生)する際に使用するキーワードは？',
            'answer' => 'throw',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '小数点以下を含む最大15桁の数字を扱えるプリミティブ型の一つのデータ型は？',
            'answer' => 'double',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'HTTPリクエストを送信するためのモダンなAPIのクラス名は？',
            'answer' => 'HttpClient',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ランタイム時に型を確認する演算子は？',
            'answer' => 'instanceof',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaでスタックデータ構造を提供するクラス名は？',
            'answer' => 'stack',
            'explanation' => '',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        //ノーマル高難易度10問
        $pram = [
            'question' => '整数を2進数文字列に変換するために使用するメソッド名は？',
            'answer' => 'toBinaryString',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列内の特定の部分を置き換えるために使用するメソッド名は？',
            'answer' => 'replace',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '2つの文字列を比較する際に使用するメソッド名は？',
            'answer' => 'compareTo',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列が特定のサフィックスで終わるかを確認するメソッド名は？',
            'answer' => 'endsWith',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列をすべて小文字に変換するために使用するメソッド名は？',
            'answer' => 'toLowerCase',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列をすべて大文字に変換するために使用するメソッド名は？',
            'answer' => 'toUpperCase',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ストリーム操作を終了し、結果をコレクションとして返すメソッド名は？',
            'answer' => 'collect',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リストに特定の要素が含まれているかを確認するメソッド名は？',
            'answer' => 'contains',
            'explanation' => 'リストにためこんだ要素を検索したり、重複を除きながらリストに要素を追加したりするのに使います。',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'インターフェースを実装するクラスが使用するキーワードは？',
            'answer' => 'implements',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaアプリケーションのパフォーマンスを分析するために使用されるモニタリングツールのコマンドは？',
            'answer' => 'jconsole',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        //ハード20問
        $pram = [
            'question' => '現在の日付を取得するために使用するクラス名は？',
            'answer' => 'localdate',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '継承を示すために使用するキーワードは？',
            'answer' => 'extends',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '非同期処理を管理するために使用されるクラスは？',
            'answer' => 'completablefuture',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '現在のスレッドを停止させるメソッド名は？',
            'answer' => 'yield',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列をバイト配列に変換するために使用するメソッド名は？',
            'answer' => 'getbytes',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '正規表現を使用して文字列をマッチさせるためのメソッド名は？',
            'answer' => 'matches',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスの型を確認するために使用するメソッド名は？',
            'answer' => 'getclass',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'コレクションの要素数を取得するために使用するインターフェース名は？',
            'answer' => 'collection',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ラムダ式をサポートするインターフェース名は？',
            'answer' => 'functionalinterface',
            'explanation' => 'インタフェース型の宣言を、Java言語仕様に定義されている
            関数型インタフェースとすることを目的としていることを示すために使われる情報目的の注釈型です。',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '環境変数を取得するためのメソッド名は？',
            'answer' => 'getenv',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定した文字列を正規表現パターンとして使用するクラス名は？',
            'answer' => 'pattern',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定された文字列を分割するために使用するメソッド名は？',
            'answer' => 'split',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準入力から浮動小数点数を受け取るために使用するメソッド名は？',
            'answer' => 'nextdouble',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaのコードをインタラクティブに試すためのコマンドラインツールで、簡単にコードのテストやプロトタイピングができる環境を提供するコマンドは？',
            'answer' => 'jshell',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '特定の値に基づいて分岐処理を行い、複数の条件に応じて異なる処理を実行する際に使われる制御構文は？',
            'answer' => 'switch',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaで親クラスのコンストラクタを呼び出すために使用するキーワードは？',
            'answer' => 'super',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列の要素を比較する際に使用するメソッド名は？',
            'answer' => 'equals',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '例外が発生しても必ず実行されるブロックを示すキーワードは？',
            'answer' => 'finally',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列が空かどうかを確認する際に使用するメソッド名は？',
            'answer' => 'isempty',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '数値のべき乗を計算するために使用するメソッド名は？',
            'answer' => 'pow',
            'explanation' => '',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);


        //ハード高難易度10問
        $pram = [
            'question' => 'スレッドを作成する際に継承するクラスは？',
            'answer' => 'thread',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'マルチスレッド環境でデータの一貫性を保つために使用するキーワードは？',
            'answer' => 'synchonized',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'パッケージ内でのみアクセス可能にする修飾子は？',
            'answer' => 'default',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'JavaのコレクションAPIで順序付きセットを扱うクラスは？',
            'answer' => 'treeset',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルを読み込むためのクラスは？',
            'answer' => 'filereder',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ストリームを使ってデータを書き込むクラスは？',
            'answer' => 'filewriter',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '入力ストリームを扱う抽象クラスは？',
            'answer' => 'inputstream',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '出力ストリームを扱う抽象クラスは？',
            'answer' => 'outputstream',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaで標準入力を取得するクラスは？',
            'answer' => '',
            'explanation' => '取得した標準入力の情報を使って処理を行いたい場合や、対話型のプログラムで利用します。',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Javaで例外のスーパークラスは？',
            'answer' => 'throwable',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '0',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);
    }
}
