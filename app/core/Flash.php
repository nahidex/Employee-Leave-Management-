<?php
class Flash {
	public static function alert($name , $val)
	{
		$_SESSION[$name] = $val;
	}
}