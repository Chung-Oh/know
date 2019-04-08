<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    public function level_challenges()
    {
    	return $this->belongsTo('App\LevelChallenge', 'experience_id', 'id');
    }
}
