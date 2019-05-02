<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
    public function users()
    {
    	return $this->belongsTo('App\User', 'profile_id', 'id');
    }
}
