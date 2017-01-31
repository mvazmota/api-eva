<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'color', 'email', 'family_id', 'birthday'
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
        return $this->belongsToMany('App\Lists', 'list_user','user_id', 'list_id');
    }

    public function events()
    {
        return $this->belongsToMany('App\Events', 'event_user', 'user_id', 'event_id');
    }

    public function family()
    {
        return $this->belongsTo('App\Families', 'family_id');
    }
}
