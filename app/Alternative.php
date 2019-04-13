<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
	// protected $table = 'alternative'; // Alter table name
	public $timestamps = false;
	protected $guarded = ['id'];
	protected $fillable = ['content', 'type', 'question_id'];

	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
    public function questions()
    {
    	return $this->hasMany('App\Question', 'id', 'question_id');
    }
}
