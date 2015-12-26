<?php
class Dashboard extends Controller {
	protected $roles = ['Admin', 'User'];

	public function index($request, $response)
	{
		if(Auth::check()){
			///$user = User::where('id', Auth::user()->id)->firstOrFail();
			$leaves = Leave::where('user_id', Auth::user()->id)->get();

			return $this->view('dashboard/index', ['leaves' => $leaves]);
		} else {
			return $response->redirect('/login', $code = 302);
		}
	}

	public function show()
	{
		if(Auth::user()){
			//print_r(Auth::user()->role->permission);
			$users = User::with('role')->get();
			return $this->view('dashboard/show', ['users' => $users,  'roles' => $this->roles ]);

		} else {
			return $response->redirect('/login', $code = 302);
		}

	}

	public function edit($request, $response)
	{
		if(Auth::check()){

			$user = User::with('role')->findOrFail($request->id);
			return $this->view('dashboard/edit', ['user' => $user]);

		} else {
			return $response->redirect('/login', $code = 302);
		}

	}	

	public function update($request, $response)
	{
		
		if(Auth::check()){
			$user = User::with('role')->find($request->id);
			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = ncrypt($request->password);
			$user->role->permission= $request->permission;
			$user->push();
			return $this->view('dashboard/edit', ['user' => $user]);

		} else {
			return $response->redirect('/login', $code = 302);
		}
	}	

	public function delete($request, $response)
	{
		if( Auth::check() && Auth::user()->id != $request->id ){
			$u = User::findOrFail($request->id);
			$role = Role::where('user_id', $u->id)->first();
			$role->delete();
			$u->delete();
			return $response->redirect('/dashboard/show', $code = 302);

		} else {
			return $response->redirect('/login', $code = 302);
		}

	}
}