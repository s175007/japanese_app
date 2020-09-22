<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'user_id',
        'sel_content',
    ];

    protected $casts = [
        'id' => 'integer',
        'lesson_id' => 'integer',
        'user_id' => 'integer',
        'sel_content' => 'string',
    ];
}
