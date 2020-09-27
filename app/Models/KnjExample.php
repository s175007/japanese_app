<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnjExample extends Model
{
    use HasFactory;

    protected $fillable = [
        'kanji',
        'hiragana',
        'mean',
        'kanji_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'kanji' => 'string',
        'hiragana' => 'string',
        'mean' => 'string',
        'kanji_id' => 'integer',
    ];

    public function kanji()
    {
        return $this->belongsTo('App\Models\Kanji');
    }
}
