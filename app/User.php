<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $appends = ['admin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function getIsAdminAttribute()
    {
        if ($this->attributes['admin'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function setIsAdminAttribute($request) {
        dd($request);
    }
}