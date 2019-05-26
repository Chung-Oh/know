<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    /**
     * The attribute alter table name.
     *
     * @var bool
     */
	// protected $table = 'alternative';

    /**
     * The attribute dont have timestamp.
     *
     * @var bool
     */
	public $timestamps = false;

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
        'content',
        'type',
        'question_id',
    ];

	/*----------------------------------------------------------------------------------------
    | Relationships with another Models, and too in the Database                             |
    |---------------------------------------------------------------------------------------*/
    public function questions()
    {
    	return $this->hasMany('App\Question', 'id', 'question_id');
    }
}
