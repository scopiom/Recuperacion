<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['name', 'email', 'content_id'];
    public $timestamps = false;
}
