<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Role extends Eloquent {
	protected $table = 'roles';
	protected $fillable = ['role','user_id'];

	//public $timestamps = [];

	public function user()
	{
		return $this->belongsTo("User");
	}

}