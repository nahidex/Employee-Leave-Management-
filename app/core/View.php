<?php
class View {
	public static function make($path, $val = ['error' => '']){

		$loader =  new Twig_Loader_Filesystem('../app/views');
		$twig = new Twig_Environment($loader);

		return $twig->render($path.'.html', $val);
	} 

}

