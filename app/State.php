<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
    public function results()
	{
		return $this->belongsTo('App\Results', 'state_id', 'id');
	}
}
