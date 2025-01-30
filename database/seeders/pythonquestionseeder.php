<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        'question' => '条件分岐に使用するキーワードは何？〇〇',
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
        'question' => 'リストを昇順に並べ替えるメソッドは何？〇〇〇〇',
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
        'answer' => 'True',
        'explanation' => '',
        'mode' => '1',
        'level' => '0',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'Pythonで「偽」を表す値は何？〇〇〇〇〇',
        'answer' => 'False',
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
        'question' => 'Pythonで無限ループを作成するためのキーワードは何？〇〇〇〇〇',
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
        'question' => 'PHPで定数を定義するために使用する関数は何？〇〇〇〇〇〇',
        'answer' => 'define',
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
    'question' => '条件分岐に使用するキーワードは何？',
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
    'answer' => 'Ture',
    'explanation' => '',
    'mode' => '1',
    'level' => '1',
];
DB::table('question')->insert($pram);

$pram = [
    'question' => 'Pythonで「偽」を表す値は何？',
    'answer' => 'False',
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
    'question' => 'Pythonで無限ループを作成するためのキーワードは何？',
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
    'question' => 'PHPで定数を定義するために使用する関数は何？',
    'answer' => 'define',
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



    //ここからhard



    $pram = [
        'question' => '文字列を指定した接頭辞で始まるか確認するメソッドは何？',
        'answer' => 'startswith',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => '例外処理を行うための構文は何？',
        'answer' => 'try-except',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'Pythonでジェネレーターを作成するためのキーワードは何？',
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
        'question' => 'Pythonでグローバル変数を参照するために使用する関数は何？',
        'answer' => 'globals',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'Pythonでデータを圧縮・解凍する際に使用するモジュールは何？',
        'answer' => 'zipfile',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'PHPでファイルにデータを書き込むために使用する関数は何？',
        'answer' => 'fwrite',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'PHPで配列をキーでソートするために使用する関数は何？',
        'answer' => 'ksort',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'PHPでファイルまたはディレクトリを削除するための関数は何？',
        'answer' => 'unlink',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'PHPで配列のすべての要素をループ処理するのに適した構文は何？',
        'answer' => 'foreach',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'Pythonで例外がスローされない場合に実行される構文は何？',
        'answer' => 'else',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'Pythonで変数の値を交換する際に使う一般的な記法は何？',
        'answer' => 'swap',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'Pythonで全てのローカル変数を辞書として取得する関数は何？',
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
        'question' => 'Pythonで日時を文字列に変換する関数は何？',
        'answer' => 'strftime',
        'explanation' => '',
        'mode' => '1',
        'level' => '2',
    ];
    DB::table('question')->insert($pram);

    $pram = [
        'question' => 'Pythonでリストのコピーを作成するためのメソッドは何？',
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
        'question' => 'Pythonでファイルを開く際に使用する関数は何？',
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
        'question' => 'Pythonでゼロ除算のエラーが発生したときにスローされる例外は何？',
        'answer' => 'ZeroDivisionError',
        'explanation' => '',
        'defficulty_flag' =>'1',
        'mode' => '1',
        'level' => '0',
    ];
    DB::table('question')->insert($pram);

    $pram = [
            'question' => ' PHPで指定したファイルのタイムスタンプを取得する関数は何？',
            'answer' => 'filemtime',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'PHPでオートロードを設定するための関数は何？',
            'answer' => 'spl_autoload_register',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'Pythonでオブジェクトが特定のクラスやサブクラスに属するかを確認する関数は何？',
            'answer' => 'isinstance',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '引数として与えられた文字列が数字かどうか確認する関数は何？',
            'answer' => 'isdigit',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'PHPで一時的なファイルを作成するために使用される関数は何？',
            'answer' => 'tmpfile',
            'explanation' => '',
            'defficulty_flag' =>'1',
            'mode' => '1',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);
}
}
