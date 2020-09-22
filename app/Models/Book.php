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
}
