<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $fillable = ['name', 'users', 'icon'];

    /**
     * The products that belong to the list.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'list_user', 'list_id', 'user_id');
    }
}
