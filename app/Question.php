<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    // To enable soft deletes for a model
    use SoftDeletes;
    // protected $table = 'question'; // Alter table name
    protected $guarded = ['id'];
    protected $fillable = ['content', 'category_id', 'level_id', 'user_id', 'challenge_id'];

    public function alternatives()
    {
    	return $this->belongsTo('App\Alternative', 'question_id', 'id');
    }

    public function categories()
    {
    	return $this->hasMany('App\Category', 'id', 'category_id');
    }

    public function levels()
    {
    	return $this->hasMany('App\Level', 'id', 'level_id');
    }

    public function users()
    {
    	return $this->hasMany('App\User', 'id', 'user_id');
    }
}
