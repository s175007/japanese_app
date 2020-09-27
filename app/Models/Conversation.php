<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'actor',
        'gender',
        'order_no',
        'lesson_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'content' => 'string',
        'actor' => 'string',
        'gender' => 'string',
        'order_no' => 'integer',
        'lesson_id' => 'integer',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}
