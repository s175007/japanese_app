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

    public static $create_rule = [
        'lesson_id' => 'exists:lessons,id',
        'title' => 'required|string',
        'mean' => 'required|string',
        'using' => 'required|string',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function grmExamples()
    {
        return $this->hasMany('App\Models\GrmExample');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($grammar) {
            // $grammar->grmExamples()->delete();
            foreach ($grammar->grmExamples as $grmExample) {
                $grmExample->delete();
            }
        });
    }
}
