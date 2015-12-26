<?php
use Illuminate\Database\Capsule\Manager as Capsule;


class_alias('Cartalyst\Sentry\Facades\Native\Sentry', 'Sentry');

$capsule = new Capsule();
$capsule->addConnection([
	'driver' 		=> 'mysql',
	'host'   		=> '127.0.0.1',
	'database'   	=> 'ntasks',
	'username'   	=> 'root',
	'password'   	=> '',
	'charset'   	=> 'utf8',
	'collation'   	=> 'utf8_unicode_ci',
	'prefix'   		=> '',
]);


$capsule->setAsGlobal();
$capsule->bootEloquent();

