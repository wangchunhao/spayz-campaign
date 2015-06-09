<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Keywords extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'keyword';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','keyword_group_id', 'name', 'name_en','enable'];
	
	public function keywordGroups()
	{
		return $this->belongsTo('App\Model\KeywordGroups','id');
	}

}
