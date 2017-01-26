<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['title', 'description', 'quant', 'image', 'list_id', 'created_by'];

    public function createdBy()
    {
        return $this->belongsTo('App\User');
    }
}
