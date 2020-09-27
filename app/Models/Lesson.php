<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'description',
        'book_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string',
        'description' => 'string',
        'book_id' => 'integer',
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    public function grammars()
    {
        return $this->hasMany('App\Models\Grammar');
    }

    public function vocabularies()
    {
        return $this->hasMany('App\Models\Vocabulary');
    }

    public function kanjis()
    {
        return $this->hasMany('App\Models\Kanji');
    }

    public function exercises()
    {
        return $this->hasMany('App\Models\Exercise');
    }

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }

    public function conversations()
    {
        return $this->hasMany('App\Models\Conversation');
    }
}
