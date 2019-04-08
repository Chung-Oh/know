<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'question_id'];

    public function users()
    {
    	return $this->hasMany('App\User', 'id', 'user_id');
    }

    public function questions()
    {
    	return $this->hasMany('App\Question', 'id', 'question_id');
    }
}
