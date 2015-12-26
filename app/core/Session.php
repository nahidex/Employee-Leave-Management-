<?php
class Session {
	public static function set($key, $val)
	{
		$_SESSION[$key] = $val;
	}
	public static function get($key)
	{	
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}
		return false;
	}
	public static function remove()
	{	
		session_unset();
		session_destroy();
	}

}