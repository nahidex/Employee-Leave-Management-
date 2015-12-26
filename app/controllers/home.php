<?php 

class Home extends Controller {

	public function index()
	{
		$users = User::all();
		return $this->view('hello', ['users' => $users]);
	}

	public function show($request)
	{
		$user = User::findOrFail($request->id)->toArray();
		return $this->view('show', ['user' => $user ]);
	}
	public function create()
	{
		return $this->view('create');
	}

	public function store($request, $response)
	{
		$user = User::create(
			[
				'name' => $request->name,
				'email'=> $request->email,
				'password' => ncrypt($request->password)
			]
		);
		Role::create([
			'permission' => 2,
			'user_id' => $user->id
		]);
		return $response->redirect('/', $code = 302);
	}

	public function getLogin()
	{

		return $this->view('login');
	}

	public function postLogin($request, $response, $service)
	{
		$u = User::where('email', $request->email)->where('password', ncrypt($request->password))->first();

		if ($u) {
			Session::set('user_id', $u->id);
			Flash::alert('flash', 'You are looged in');
			return $response->redirect('/dashboard/index', $code = 302);
		} else {
			Flash::alert('flash', 'you are a asshole');
			return $response->redirect('/login', $code = 302);
		}
		
	}

	public function logout($request, $response, $service){
		Auth::logout();
		Flash::alert('flash', 'You are looged out');
		return $response->redirect('/login', $code = 302);
	}

}