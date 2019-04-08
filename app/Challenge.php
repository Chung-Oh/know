<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
	// To enable soft deletes for a model
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'level_challenge_id'];
    protected $dates = ['deleted_at'];

    public function questions()
    {
        return $this->belongsTo('App\Question', 'challenge_id', 'id');
    }

    public function results()
    {
        return $this->belongsTo('App\Result', 'challenge_id', 'id');
    }

    public function users()
    {
    	return $this->hasMany('App\User', 'id', 'user_id');
    }

    public function level_challenges()
    {
    	return $this->hasMany('App\LevelChallenge', 'id', 'level_challenge_id');
    }
}
