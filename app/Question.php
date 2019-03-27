<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // protected $table = 'question'; // Alter table name
    protected $guarded = ['id'];
    protected $fillable = ['content', 'categorys_id', 'levels_id', 'users_id', 'challenges_id'];
}
