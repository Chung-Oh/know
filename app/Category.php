<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	// protected $table = 'category'; // Alter table name
	// protected $fillable = ['name'];

	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
	public function questions()
	{
		return $this->belongsTo('App\Question', 'category_id', 'id');
	}
}
