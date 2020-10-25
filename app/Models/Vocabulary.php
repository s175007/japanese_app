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

    public static $create_rule = [
        // 'lesson_id' => 'exists:lessons,id',
        'kanji' => 'required|string',
        'hiragana' => 'required|string',
        'mean' => 'required|string',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function vcbExamples()
    {
        return $this->hasMany('App\Models\VcbExample');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($vocabulary) {
            foreach ($vocabulary->vcbExamples as $vcbExample) {
                $vcbExample->delete();
            }
        });
    }
}
