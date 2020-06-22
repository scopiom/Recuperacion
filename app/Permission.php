<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $fillable = ['content_id', 'user_id'];
}
