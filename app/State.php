<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function results()
	{
		return $this->belongsTo('App\Results', 'state_id', 'id');
	}
}
