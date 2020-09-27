<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VcbExample extends Model
{
    use HasFactory;

    protected $fillable = [
        'vocabulary_id',
        'examples',
    ];

    protected $casts = [
        'id' => 'integer',
        'vocabulary_id' => 'integer',
        'examples' => 'string',
    ];

    public function vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary');
    }
}
