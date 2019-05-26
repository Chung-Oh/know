<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	/**
     * The attribute alter table name.
     *
     * @var bool
     */
	// protected $table = 'level'

	/**
     * The attribute dont have timestamp.
     *
     * @var bool
     */
	// public $timestamps = false;

	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
	public function questions()
	{
		return $this->belongsTo('App\Question', 'level_id', 'id');
	}

	public function level_challenges()
	{
		return $this->belongsTo('App\LevelChallenge', 'level_id', 'id');
	}
}
