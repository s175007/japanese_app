<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Saler extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'entry_date',
        'qrcode',
        'birthday',
        'email',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'entry_date' => 'datetime',
        'qrcode' => 'string',
        'birthday' => 'datetime',
        'email' => 'string',
        'password' => 'string',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
