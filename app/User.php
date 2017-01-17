<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color', 'email', 'password', 'family_id', 'birthday', 'residence_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lists()
    {
        return $this->belongsToMany('App\Lists', 'list_user', 'list_id', 'user_id');
    }

    public function family()
    {
        return $this->belongsTo('App\Family', 'family_id');
    }
}
