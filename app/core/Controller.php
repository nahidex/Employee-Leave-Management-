<?php
use Pimple\Container as Pimple;
class Controller
{
	protected $bag;
	public function __construct(Pimple $c)
	{
		$this->bag = $c;
	}


	public function view($path, $val = []){

		$loader =  new Twig_Loader_Filesystem('../app/views');
		$twig = new Twig_Environment($loader);
		$twig->addGlobal("session", $_SESSION);

		//array_push($val, ['flash'=>'asdfasdfasdf']);

		return $twig->render($path.'.html', $val);
	} 


}
