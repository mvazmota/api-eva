<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Families extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany('App\User', 'family_id');
    }

    public function owners()
    {
        return $this->belongsToMany('App\User', 'family_owners', 'family_id', 'user_id');
    }
}
