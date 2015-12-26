<?php
class LeaveController extends Controller {

	public function index()
	{
		if (Auth::check()) {
			$leaves = Leave::with('user')->get();
			$role = Role::where('user_id', Auth::user()->id)->first();
			return $this->view('dashboard/leave/index', [ 'leaves' => $leaves, 'role' => $role ]);
		} else {
			return $response->redirect('/login', $code = 302);
		}
	}

	public function create($request, $response)
	{
		if (Auth::check()) {
			//dd(Leave::where('user_id', Auth::user()->id)->first()->leave_remain);
			return $this->view('dashboard/leave/create');
		} else {
			return $response->redirect('/login', $code = 302);
		}
	}

	public function store($request, $response)
	{
		
		$leave =  Leave::where('user_id', Auth::user()->id)->first();
		
		if($leave) {
			$l = Leave::create(
				[
					'user_id' => Auth::user()->id,
					'leave_remain'=>    ($leave->leave_remain) - ($request->leave_count),
					'leave_times' =>	($leave->leave_times) + 1,
					'leave_count' =>    ($leave->count) + ($request->leave_count),
					'title' => $request->title,
					'active_token' => false
				]
			);
		} else {
			$l = Leave::create(
				[
					'user_id' => Auth::user()->id,
					'leave_remain'=>    (20 - $request->leave_count),
					'leave_times' =>	1,
					'leave_count' =>    $request->leave_count,
					'title' => $request->title,
					'active_token' => false
				]
			);
		}


		return $response->redirect('/dashboard/leave/index', $code = 302);
	}

	public function approve($request, $response)
	{
		if( Auth::isAdmin() ){
			$leave = Leave::findOrFail($request->id);
			$leave->active_token = true;
			$leave->save();
			return $response->redirect('/dashboard/leave/index', $code = 302);


		} else {
			return $response->redirect('/dashboard/leave/index', $code = 302);
		}
	}
}