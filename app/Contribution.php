<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    /**
     * The attribute guarded the ID.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'question_id',
    ];

    /*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
    public function users()
    {
    	return $this->hasMany('App\User', 'id', 'user_id');
    }

    public function questions()
    {
    	return $this->hasMany('App\Question', 'id', 'question_id');
    }
}
