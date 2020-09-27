<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mean',
        'using',
        'lesson_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'mean' => 'string',
        'using' => 'string',
        'lesson_id' => 'integer',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function GrmExamples()
    {
        return $this->hasMany('App\Models\GrmExample');
    }
}
