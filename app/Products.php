<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['title', 'description', 'quant', 'image', 'list_id'];
}
