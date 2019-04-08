<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function level_challenges()
	{
		return $this->belongsTo('App\LevelChallenge', 'time_id', 'id');
	}
}
