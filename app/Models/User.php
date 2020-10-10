<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'del_flg',
        'saler_id'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'del_flg' => 'boolean',
        'saler_id' => 'integer',
    ];

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }

    public function saler()
    {
        return $this->belongsTo('App\Models\Saler');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->histories()->delete();
        });
    }
}
