<?php 
class Auth {

	public static function logout()
	{
		Session::remove();
	}
	public static function check() {
		if (Session::get('user_id')) {
			return true;
		}
		return false;
	}
	public static function user(){
		if (self::check()) {
			$user = User::with('role')->findOrFail(Session::get('user_id'));
			return $user;
		} else {
			return false;
		}

	}

	public static function isAdmin(){
		$role = Role::where('user_id', static::user()->id )->first();
		if ($role->permission ==  1) {
			return true;
		} else {
			return false;
		}
	}

}