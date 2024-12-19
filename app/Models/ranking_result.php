<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ranking_result extends Model
{
    use HasFactory;
    protected $table = 'ranking_result';


    protected $fillable = [
        'mode',
        'level',
        'created_at',
    ];
}
