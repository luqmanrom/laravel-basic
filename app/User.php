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

    /**
     * The attributes that should be hidden for arrays.
     *p
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];



    /**
     * Hash the password before saving it to the database
     *
     *
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }




    public function posts()
    {
        return $this->hasMany('App\Post','user_id');
    }
}
