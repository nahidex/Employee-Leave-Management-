<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Leave extends Eloquent {
	protected $fillable = ['user_id','leave_remain','leave_times', 'title','leave_count','active_token'];

	public $timestamps = [];

	public function user()
	{
		return $this->belongsTo("User");
	}

	
}