<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	/**
     * The attribute guarded the ID.
     *
     * @var array
     */
	protected $guarded = ['id'];

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'message',
        'user_id',
    ];

	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
	public function users()
	{
		return $this->hasMany('App\User', 'id', 'user_id');
	}
}
