<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
    public function level_challenges()
    {
    	return $this->belongsTo('App\LevelChallenge', 'experience_id', 'id');
    }
}
