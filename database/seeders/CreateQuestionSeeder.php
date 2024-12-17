<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modes = ['java', 'python', 'php'];
        $levels = ['easy', 'normal', 'hard'];

        // 各組み合わせに対して6問のテストデータを挿入
        for ($i = 0; $i < 5; $i++) {
            foreach ($modes as $mode) {
                foreach ($levels as $level) {
                    $modeNumber = ['java' => 0, 'python' => 1, 'php' => 2][$mode];
                    $levelNumber = ['easy' => 0, 'normal' => 1, 'hard' => 2][$level];

                    // 時間制限の設定
                    $timeLimits = [
                        'java' => [15, 15, 10],
                        'python' => [10, 10, 7],
                        'php' => [12, 12, 8],
                    ];
                    $timeLimit = $timeLimits[$mode][$levelNumber];

                    // 6問のテストデータを挿入
                    for ($i = 1; $i <= 6; $i++) {
                        $difficultyFlag = $i == 6 ? 1 : 0; // 5番目と6番目は難易度フラグを1にする

                        DB::table('question')->insert([
                            'question' => 'test' . $i,
                            'answer' => 'answer' . $i,
                            'explanation' => 'Explanation for ' . $mode . ' ' . $level . ' question ' . $i,
                            'mode' => $modeNumber,
                            'level' => $levelNumber,
                            'difficulty_flag' => $difficultyFlag,
                            'delete_flag' => 0,
                            'public_flag' => 1,
                        ]);
                    }
                }
            }
        }
    }
}
