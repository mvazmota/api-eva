<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['title', 'date', 'time', 'location', 'description'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'event_user', 'event_id', 'user_id');
    }

    public function family()
    {
        return $this->belongsTo('App\Family', 'family_id');
    }
}