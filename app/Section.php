<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'desc', 'user_id'];
    public $timestamps = false;
}
