<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelChallenge extends Model
{
	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
	public function challenges()
	{
		return $this->belongsTo('App\Challenge', 'level_challenge_id', 'id');
	}

	public function levels()
	{
		return $this->hasMany('App\Level', 'id', 'level_id');
	}

	public function experiences()
	{
		return $this->hasMany('App\Experience', 'id', 'experience_id');
	}

	public function opportunities()
	{
		return $this->hasMany('App\Opportunity', 'id', 'opportunity_id');
	}

	public function times()
	{
		return $this->hasMany('App\Time', 'id', 'time_id');
	}
}
