<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	// protected $table = 'category'; // Alter table name
	protected $fillable = ['name'];

	public function questions()
	{
		return $this->belongsTo('App\Question', 'category_id', 'id');
	}
}
