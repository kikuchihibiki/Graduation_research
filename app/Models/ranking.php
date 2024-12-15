<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ranking extends Model
{
    use HasFactory;
    protected $table = 'ranking';
    protected $fillable = [
        'name',        // ユーザー名
        'score',       // スコア
        'mode',        // モード
        'level',       // レベル
        'rank',        // 順位
        'delete_flag', // 削除フラグ
    ];
}
