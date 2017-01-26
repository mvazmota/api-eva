<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['title', 'date', 'start_time', 'end_time', 'location', 'created_by'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'event_user', 'event_id', 'user_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User');
    }
}