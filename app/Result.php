<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
    	'points',
    	'opportunity_made',
    	'time_start',
    	'user_id',
    	'time_end',
    	'user_id',
    	'state_id',
    	'challenge_id',
    ];

    /*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
    public function users()
    {
    	return $this->hasMany('App\User', 'id', 'user_id');
    }

    public function states()
    {
    	return $this->hasMany('App\State', 'id', 'state_id');
    }

    public function challenges()
    {
    	return $this->hasMany('App\Challenge', 'id', 'challenge_id');
    }
}
