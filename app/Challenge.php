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

    /*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
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

    /*----------------------------------------------------------------------------------------
    | Defining An Accessor, Date Handler                                                     |
    |---------------------------------------------------------------------------------------*/
    public function getCreatedAtAttribute()
    {
        $date = $this->attributes['created_at'];
        // Time
        $time = substr($date, 11, 3) . substr($date, 14, 3) . substr($date, 17, 2) . ' - ';
        // Date
        $date = substr($date, 8, 2) . '/' . substr($date, 5, 2) . '/' . $year = substr($date, 0, 4);

        return $time . $date;
    }

    public function getUpdatedAtAttribute()
    {
        $date = $this->attributes['updated_at'];
        // Time
        $time = substr($date, 11, 3) . substr($date, 14, 3) . substr($date, 17, 2) . ' - ';
        // Date
        $date = substr($date, 8, 2) . '/' . substr($date, 5, 2) . '/' . $year = substr($date, 0, 4);

        return $time . $date;
    }
}
