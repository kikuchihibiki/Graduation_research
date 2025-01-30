<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class phpquestionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PHP問題イージー40問
        $pram = [
            'question' => 'PHPファイルの拡張子は？ 〇〇〇',
            'answer' => 'php',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定された配列の各要素を特定のタイミングで別の関数に渡し、その結果がtrueを返す要素だけを残して新しい配列を返す組み込み関数は？ 〇〇〇〇〇_〇〇〇〇〇〇',
            'answer' => 'array_filter',
            'explanation' => '連想配列でもフィルタリングすることが可能です',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '与えれた条件式がtrueと評価された場合プログラム処理を実行し、falseと評価された場合無視を無視する条件分岐に用いられるキーワードは何ですか？ 〇〇',
            'answer' => 'if',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列の要素数を取得する関数は？ 〇〇〇〇〇',
            'answer' => 'count',
            'explanation' => '配列や連想配列の要素数をカウントできます',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '数値を指定した小数点以下の桁数に丸めるために使用する関数は？ 〇〇〇〇〇',
            'answer' => 'round',
            'explanation' => 'round()関数は、最も近い整数に値を四捨五入します。小数点以下の値が.5の場合は常に上に丸められます。',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '小数点を切り上げる関数は？ 〇〇〇〇',
            'answer' => 'ceil',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'メルセンヌツイスタを使ったランダムな数値を生成する関数は？ 〇〇_〇〇〇〇',
            'answer' => 'mt_rand',
            'explanation' => 'メルセンヌツイスタ (Mersenne Twister) は、乱数生成アルゴリズムの一つで、非常に高速で高品質な擬似乱数を生成する',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '小数点を切り捨てる関数は？ 〇〇〇〇〇',
            'answer' => 'floor',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列や引数の最大値を取得する関数は？ 〇〇〇',
            'answer' => 'max',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列や引数の最小値を取得する関数は何ですか？ 〇〇〇',
            'answer' => 'min',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '日時をフォーマットして取得する関数は？ 〇〇〇〇',
            'answer' => 'date',
            'explanation' => 'Unixのタイムスタンプを元に日付や時刻を文字列として返すための関数です',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リダイレクトを行うためのHTTPヘッダーを送信する関数は？ 〇〇〇〇〇〇',
            'answer' => 'header',
            'explanation' => 'Location ヘッダーを送信することで、ブラウザを指定されたURLにリダイレクトできます',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '日付を含む文字列をタイムスタンプに変換するために使用する関数は？ 〇〇〇〇〇〇〇〇〇',
            'answer' => 'strtotime',
            'explanation' => '現在日時や指定した日時のUnixタイムスタンプを取得することができます',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスを定義するために使用するキーワードは？ 〇〇〇〇〇',
            'answer' => 'class',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準出力に文字列を出力する際に使用する関数は？ 〇〇〇〇',
            'answer' => 'echo',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '関数を定義するために使用するキーワードは？ 〇〇〇〇〇〇〇〇',
            'answer' => 'function',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定した数値の絶対値を取得するために使用する関数は？ 〇〇〇',
            'answer' => 'abs',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クッキーを設定する関数は？ 〇〇〇〇〇〇〇〇〇',
            'answer' => 'setcookie',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列内の特定の要素を削除するために使用する関数は？ 〇〇〇〇〇',
            'answer' => 'unset',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列の前後の空白を削除する関数は？ 〇〇〇〇',
            'answer' => 'trim',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '変数が空かどうかを確認するために使用する関数は？ 〇〇〇〇〇',
            'answer' => 'empty',
            'explanation' => '変数が未定義であってもエラーを出さずにtrueを返します。',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '変数が定義されているかどうかを確認するために使用する関数は？ 〇〇〇〇〇',
            'answer' => 'isset',
            'explanation' => '変数がNULLに設定されていても、それが未定義であってもfalseを返します。',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '引数に指定した変数または、処理命令の戻り値を詳細に出力できるデバッグ用の関数は？ 〇〇〇_〇〇〇〇',
            'answer' => 'var_dump',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を指定した区切り文字で繰り返し分割し、ループ処理をする際に便利な関数は？ 〇〇〇〇〇〇',
            'answer' => 'strtok',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列内の部分文字列が最初に現れる場所を見つける関数は？ 〇〇〇〇〇〇',
            'answer' => 'strpos',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルを読み込む際に使用し、読み込めなかった場合に処理を中断し、かつ同script内で複数同一のファイルが指定されていた場合は読み込みを行わない関数は？ 〇〇〇〇〇〇〇_〇〇〇〇',
            'answer' => 'require_once',
            'explanation' => '既にそのファイルがインクルードされていれば、再度読み込むことはありません。',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列内の指定された文字を区切りとして配列に分割する関数は？ 〇〇〇〇〇〇〇',
            'answer' => 'explode',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列を指定された文字で区切られた文字列に変換する関数は？ 〇〇〇〇〇〇〇',
            'answer' => 'implode',
            'explanation' => 'implodeを使う際には、必ず配列を渡す必要があります。',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定した変数がnullかどうか調べる関数は？ 〇〇_〇〇〇',
            'answer' => 'is_null',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルを削除する関数は？ 〇〇〇〇〇〇',
            'answer' => 'unlink',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列をハッシュ化するために使用する関数は？ 〇〇〇〇',
            'answer' => 'hash',
            'explanation' => '使用するハッシュアルゴリズムを指定して使用できます',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ディレクトリを作成するための関数は？ 〇〇〇〇〇',
            'answer' => 'mkdir',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '連想キーと要素との関係を維持しつつ配列を昇順にソートする関数は？ 〇〇〇〇〇',
            'answer' => 'asort',
            'explanation' => 'asortは値の並べ替えを行いますが、キーの順序は変更されません。',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'キーに基づいて配列を並べ替える関数は？ 〇〇〇〇〇',
            'answer' => 'ksort',
            'explanation' => 'ksortはキーを基準に並べ替えますが、値は変更されません。',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' 配列の最後の要素を取得するための関数は？ 〇〇〇',
            'answer' => 'end',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ディレクトリを削除するための関数は？ 〇〇〇〇〇',
            'answer' => 'rmdir',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を数値に変換するための関数は？ 〇〇〇〇〇〇',
            'answer' => 'intval',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' PHP内でperlなどの別言語のプログラムを非同期に実行するための関数は？ 〇〇〇〇',
            'answer' => 'exec',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を暗号化するために使用される一般的な関数は？ 〇〇〇〇〇〇〇〇_〇〇〇〇',
            'answer' => 'password_hash',
            'explanation' => 'ハッシュアルゴリズムは基本的にbcryptを使用します。',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '環境変数を取得するための関数は？ 〇〇〇〇〇〇',
            'answer' => 'getenv',
            'explanation' => '',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        //イージー高難易度10問
        $pram = [
            'question' => '例外をスローするために使用するキーワードは？ 〇〇〇〇〇',
            'answer' => 'throw',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'base64方式で指定された文字列を暗号化してハッシュ値を生成する関数は？ 〇〇〇〇〇〇_〇〇〇〇〇〇',
            'answer' => 'base64_encode',
            'explanation' => 'エンコードにより、バイナリデータを安全にテキストデータとして取り扱えるようになりますが、暗号化やセキュリティ目的で使うべきではありません。',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '大文字と小文字を区別しながら文字列し、最後に見つかった位置を返す関数は？ 〇〇〇〇〇〇〇',
            'answer' => 'strrpos',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定されたファイルを読み取り専用で開くための関数は？ 〇〇〇〇〇',
            'answer' => 'fopen',
            'explanation' => 'ファイルを開いた後は、必ずfcloseでファイルを閉じるようにしましょう',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルを閉じるための関数は？ 〇〇〇〇〇〇',
            'answer' => 'fclose',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準入力から1行読み取るための関数は？ 〇〇〇〇〇',
            'answer' => 'fgets',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '大文字と小文字を区別せずに、文字列を部分的に比較する関数は？  〇〇〇〇〇〇〇',
            'answer' => 'stristr',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'マルチバイト対応で文字列の一部を指定した長さで抽出するための関数は？ 〇〇_ 〇〇〇〇〇〇',
            'answer' => 'mb_substr',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列の最初の文字を大文字に変換する関数は？  〇〇〇〇〇〇〇',
            'answer' => 'ucfirst',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列をランダムに並べ替える関数は？  〇〇〇〇〇〇〇',
            'answer' => 'shuffle',
            'explanation' => '連想配列（キーと値がセットになっている配列）に対してshuffle()を使うと、キーが無視されてしまいます。',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '0',
        ];
        DB::table('question')->insert($pram);


        //ノーマル問題40問
        $pram = [
            'question' => 'PHPファイルの拡張子は？',
            'answer' => 'php',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定された配列の各要素を特定のタイミングで別の関数に渡し、その結果がtrueを返す要素だけを残して新しい配列を返す組み込み関数は？',
            'answer' => 'array_filter',
            'explanation' => '連想配列でもフィルタリングすることが可能です',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '与えれた条件式がtrueと評価された場合プログラム処理を実行し、falseと評価された場合無視を無視する条件分岐に用いられるキーワードは何ですか？',
            'answer' => 'if',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列の要素数を取得する関数は？',
            'answer' => 'count',
            'explanation' => '配列や連想配列の要素数をカウントできます',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '数値を指定した小数点以下の桁数に丸めるために使用する関数は？',
            'answer' => 'round',
            'explanation' => 'round()関数は、最も近い整数に値を四捨五入します。小数点以下の値が.5の場合は常に上に丸められます。',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '小数点を切り上げる関数は？',
            'answer' => 'ceil',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'メルセンヌツイスタを使ったランダムな数値を生成する関数は？',
            'answer' => 'mt_rand',
            'explanation' => 'メルセンヌツイスタ (Mersenne Twister) は、乱数生成アルゴリズムの一つで、非常に高速で高品質な擬似乱数を生成する',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '小数点を切り捨てる関数は？',
            'answer' => 'floor',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列や引数の最大値を取得する関数は？',
            'answer' => 'max',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列や引数の最小値を取得する関数は何ですか？',
            'answer' => 'min',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '日時をフォーマットして取得する関数は？',
            'answer' => 'date',
            'explanation' => 'Unixのタイムスタンプを元に日付や時刻を文字列として返すための関数です',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'リダイレクトを行うためのHTTPヘッダーを送信する関数は？',
            'answer' => 'header',
            'explanation' => 'Location ヘッダーを送信することで、ブラウザを指定されたURLにリダイレクトできます',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '日付を含む文字列をタイムスタンプに変換するために使用する関数は？',
            'answer' => 'strtotime',
            'explanation' => '現在日時や指定した日時のUnixタイムスタンプを取得することができます',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クラスを定義するために使用するキーワードは？',
            'answer' => 'class',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準出力に文字列を出力する際に使用する関数は？',
            'answer' => 'echo',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '関数を定義するために使用するキーワードは？',
            'answer' => 'function',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定した数値の絶対値を取得するために使用する関数は？',
            'answer' => 'abs',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'クッキーを設定する関数は？',
            'answer' => 'setcookie',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列内の特定の要素を削除するために使用する関数は？',
            'answer' => 'unset',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列の前後の空白を削除する関数は？',
            'answer' => 'trim',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '変数が空かどうかを確認するために使用する関数は？',
            'answer' => 'empty',
            'explanation' => '変数が未定義であってもエラーを出さずにtrueを返します。',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '変数が定義されているかどうかを確認するために使用する関数は？',
            'answer' => 'isset',
            'explanation' => '変数が NULL に設定されていても、それが未定義であってもfalseを返します。',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '引数に指定した変数または、処理命令の戻り値を詳細に出力できるデバッグ用の関数は？',
            'answer' => 'var_dump',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を指定した区切り文字で繰り返し分割し、ループ処理をする際に便利な関数は？',
            'answer' => 'strtok',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列内の部分文字列が最初に現れる場所を見つける関数は？',
            'answer' => 'strpos',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルを読み込む際に使用し、読み込めなかった場合に処理を中断し、かつ同script内で複数同一のファイルが指定されていた場合は読み込みを行わない関数は？',
            'answer' => 'require_once',
            'explanation' => '既にそのファイルがインクルードされていれば、再度読み込むことはありません。',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列内の指定された文字を区切りとして配列に分割する関数は？',
            'answer' => 'explode',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列を指定された文字で区切られた文字列に変換する関数は？',
            'answer' => 'implode',
            'explanation' => 'implodeを使う際には、必ず配列を渡す必要があります。',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定した変数がnullかどうか調べる関数は？',
            'answer' => 'is_null',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルを削除する関数は？',
            'answer' => 'unlink',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列をハッシュ化するために使用する関数は？',
            'answer' => 'hash',
            'explanation' => '使用するハッシュアルゴリズムを指定して使用できます',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ディレクトリを作成するための関数は？',
            'answer' => 'mkdir',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '連想キーと要素との関係を維持しつつ配列を昇順にソートする関数は？',
            'answer' => 'asort',
            'explanation' => 'asortは値の並べ替えを行いますが、キーの順序は変更されません。',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'キーに基づいて配列を並べ替える関数は？',
            'answer' => 'ksort',
            'explanation' => 'ksortはキーを基準に並べ替えますが、値は変更されません。',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' 配列の最後の要素を取得するための関数は？',
            'answer' => 'end',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ディレクトリを削除するための関数は？',
            'answer' => 'rmdir',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を数値に変換するための関数は？',
            'answer' => 'intval',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => ' PHP内でperlなどの別言語のプログラムを非同期に実行するための関数は？',
            'answer' => 'exec',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を暗号化するために使用される一般的な関数は？',
            'answer' => 'password_hash',
            'explanation' => 'ハッシュアルゴリズムは基本的にbcryptを使用します。',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '環境変数を取得するための関数は？',
            'answer' => 'getenv',
            'explanation' => '',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        //ノーマル高難易度10問
        $pram = [
            'question' => '例外をスローするために使用するキーワードは？',
            'answer' => 'throw',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'base64方式で指定された文字列を暗号化してハッシュ値を生成する関数は？',
            'answer' => 'base64_encode',
            'explanation' => 'エンコードにより、バイナリデータを安全にテキストデータとして取り扱えるようになりますが、暗号化やセキュリティ目的で使うべきではありません。',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '大文字と小文字を区別しながら文字列し、最後に見つかった位置を返す関数は？',
            'answer' => 'strrpos',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定されたファイルを読み取り専用で開くための関数は？',
            'answer' => 'fopen',
            'explanation' => 'ファイルを開いた後は、必ずfcloseでファイルを閉じるようにしましょう',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルを閉じるための関数は？',
            'answer' => 'fclose',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '標準入力から1行読み取るための関数は？',
            'answer' => 'fgets',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '大文字と小文字を区別せずに、文字列を部分的に比較する関数は？',
            'answer' => 'stristr',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'マルチバイト対応で文字列の一部を指定した長さで抽出するための関数は？',
            'answer' => 'mb_substr',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列の最初の文字を大文字に変換する関数は？',
            'answer' => 'ucfirst',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列をランダムに並べ替える関数は？',
            'answer' => 'shuffle',
            'explanation' => '連想配列（キーと値がセットになっている配列）に対してshuffle()を使うと、キーが無視されてしまいます。',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '1',
        ];
        DB::table('question')->insert($pram);


        //ハード問題20問

        $pram = [
            'question' => 'PHPで変数のデータ形式を確認するために使用する関数は？',
            'answer' => 'gettype',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '日の出/日の入り時刻と薄明かりの開始/終了時刻の情報を含む配列を返す関数は？',
            'answer' => 'date_sun_info',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '画像、PDF、動画などのファイルのMIMEタイプを判別するのに使用する関数は？',
            'answer' => 'mime_content_type',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'マルチバイト文字列の長さを取得するために使用する関数は？',
            'answer' => 'mb_strlen',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定された文字列を正規表現で検索する関数は？',
            'answer' => 'preg_match',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列に要素を最後尾に追加する関数は？',
            'answer' => 'array_push',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '指定した値が配列内に存在するかを確認する関数は？',
            'answer' => 'in_array',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列のキーを取得する関数は？',
            'answer' => 'array_keys',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '異なる配列同士を結合する関数は？',
            'answer' => 'array_merge',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '外部ファイルの内容を取得する関数は？',
            'answer' => 'file_get_contents',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ファイルの存在を確認する関数は？',
            'answer' => 'file_exists',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'セッションを開始する関数は？',
            'answer' => 'seesion_start',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'セッションを破棄する関数は？',
            'answer' => 'session_destroy',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '変数が配列かどうかを確認するために使用する関数は？',
            'answer' => 'is_array',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '変数が数字または数値形式の文字列であるかを調べる関数は？',
            'answer' => 'is_numeric',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '変数が文字列かどうかを確認するために使用する関数は？',
            'answer' => 'is_string',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列内のすべての文字を大文字に変換するための関数は？',
            'answer' => 'strtoupper',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列のキーのみを取得するための関数は？',
            'answer' => 'array_keys',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'PHPで改行文字（\n）をHTMLの<br>タグに変換する関数は？',
            'answer' => 'nl2br',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列を小文字に変換する関数は？',
            'answer' => 'strtolower',
            'explanation' => '',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);


        //ハード高難易度10問
        $pram = [
            'question' => 'HTMLに用いられるメタ文字をエスケープする関数は？',
            'answer' => 'htmlspecialchars',
            'explanation' => '文字の中には HTML において特殊な意味を持つものがあり、 それらの本来の値を表示したければ HTML の表現形式に変換してやらなければなりません。 この関数は、これらの変換を行った結果の文字列を返します。',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'ひらがなをカタカナに変換するために使用する関数は？',
            'answer' => 'mb_convert_kana',
            'explanation' => '文字列 string に関して「半角」-「全角」変換を行います。 この関数は、日本語のみで使用可能です。',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'セッションIDを再生成するために使用する関数は？',
            'answer' => 'session_regenerate_id',
            'explanation' => '現在のセッションIDを 新しいものと置き換えます。その際、現在のセッション情報は維持されます',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'JSONを配列やオブジェクトに変換する関数は？',
            'answer' => 'json_decode',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '配列やオブジェクトをJSONに変換する関数は？',
            'answer' => 'json_encode',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '2つの配列を比較し、共通する値のみを取得する関数は？',
            'answer' => 'array_intersect',
            'explanation' => 'array_intersect() は、他の全ての引数に存在する array の値を全て有する配列を返します。 キーと値の関係は維持されることに注意してください。',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'フォームデータやクエリ文字列をurlエンコードするために使用する関数は？',
            'answer' => 'urlencode',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '外部ファイルに内容を書き込む関数は？',
            'answer' => 'file_put_contents',
            'explanation' => '',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => 'HTMLエンティティをデコードするための関数は？',
            'answer' => 'html_entity_decode',
            'explanation' => '厳密に言うと、この関数は次の二つの条件を満たすすべての (数値エンティティを含む) エンティティをデコードします。それ以外のエンティティは、何も変換しません。
            1) 選択したドキュメントタイプで必然的に有効になるもの。つまり XML の場合には、DTD で定義されている名前付きエンティティはデコードしません。
            2) 選択したエンコーディングに関連づけられている符号化文字集合に含まれる文字で、 選択したドキュメントタイプで許可されているもの。',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);

        $pram = [
            'question' => '文字列の一部を置換するための関数は？',
            'answer' => 'str_replace',
            'explanation' => '検索文字列に一致したすべての文字列を置換します',
            'difficulty_flag' => '1',
            'mode' => '2',
            'level' => '2',
        ];
        DB::table('question')->insert($pram);
    }
}
