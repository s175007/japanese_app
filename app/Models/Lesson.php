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
}
