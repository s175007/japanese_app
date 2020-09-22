<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string',
    ];
}
