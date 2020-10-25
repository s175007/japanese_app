<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'kanji',
        'onyomi',
        'kunyomi',
        'hanviet',
        'description',
        'lesson_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'img' => 'string',
        'kanji' => 'string',
        'onyomi' => 'string',
        'kunyomi' => 'string',
        'hanviet' => 'string',
        'description' => 'string',
        'lesson_id' => 'integer',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function knjExamples()
    {
        return $this->hasMany('App\Models\KnjExample');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($kanji) {
            foreach ($kanji->knjExamples as $knjExample) {
                $knjExample->delete();
            }
        });
    }
}
