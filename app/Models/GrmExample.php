<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrmExample extends Model
{
    use HasFactory;

    protected $fillable = [
        'japanese',
        'vietnamese',
        'grammar_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'japanese' => 'string',
        'vietnamese' => 'string',
        'grammar_id' => 'integer',
    ];

    public function grammar()
    {
        return $this->belongsTo('App\Models\Grammar');
    }
}
