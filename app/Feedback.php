<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['message', 'user_id'];

	public function users()
	{
		return $this->hasMany('App\User', 'id', 'user_id');
	}
}
