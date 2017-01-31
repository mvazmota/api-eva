<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'invitations';
    protected $fillable = array('code','email','expiration','active','used', 'family_id', 'created_by');

    public function createdBy()
    {
        return $this->belongsTo('App\User');
    }

    public function family()
    {
        return $this->belongsTo('App\Family');
    }
}