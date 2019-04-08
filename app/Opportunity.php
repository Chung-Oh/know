<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    public function level_challenges()
	{
		return $this->belongsTo('App\LevelChallenge', 'opportunity_id', 'id');
	}
}
