<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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

    public static $create_rule = [
        'name' => 'required|string',
        'icon' => 'required|file',
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
    
}
