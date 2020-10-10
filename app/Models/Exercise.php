<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'lesson_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'lesson_id' => 'integer',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($exercise) {
            $exercise->questions()->delete();
        });
    }
}
