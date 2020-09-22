<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $fillable = [
        'kanji',
        'hiragana',
        'mean',
        'lesson_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'kanji' => 'string',
        'hiragana' => 'string',
        'mean' => 'string',
        'lesson_id' => 'integer',
    ];
}
