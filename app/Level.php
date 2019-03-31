<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	// protected $table = 'level' // Alter table name
	// public $timestamps = false;

    public function questions()
    {
    	return $this->belongsTo('App\Question', 'level_id', 'id');
    }
}
