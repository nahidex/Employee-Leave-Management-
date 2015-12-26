<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
	protected $fillable = ['name','email','password'];

	//public $timestamps = [];

	public function role()
    {
        return $this->hasOne("Role");
    }

    public function leaves()
    {
        return $this->hasMany("Leave");
    }
}