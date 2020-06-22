<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['status', 'name', 'desc', 'img1', 'img2', 'img3', 'user_id', 'section_id'];


}
