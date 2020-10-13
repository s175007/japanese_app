<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'category_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'img' => 'string',
        'category_id' => 'integer',
    ];

    public static $create_rule = [
        'name' => 'required|string',
        'image' => 'required|file',

    ];

    public static $update_rule = [
        'name' => 'required|string',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($book) {
            $book->lessons()->delete();
        });
    }
}
