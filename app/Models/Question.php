<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'exercise_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'content' => 'string',
        'exercise_id' => 'integer',
    ];
}
