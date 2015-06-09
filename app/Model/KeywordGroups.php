<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KeywordGroups extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'keyword_group';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','campaign_id', 'name', 'description'];
	
	public function keywords()
	{
		return $this->hasMany('App\Model\Keywords','keyword_group_id','id');
	}

}
