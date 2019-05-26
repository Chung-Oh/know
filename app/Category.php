<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
     * The attribute alter table name.
     *
     * @var bool
     */
	// protected $table = 'category';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	// protected $fillable = ['name'];

	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
	public function questions()
	{
		return $this->belongsTo('App\Question', 'category_id', 'id');
	}
}
