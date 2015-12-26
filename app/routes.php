<?php
use Klein\Klein as Route;
$bag = new Pimple\Container; // container
$route = new Route();
$home = new Home($bag); //controller
$dashboard = new Dashboard($bag); // controller
$user = new User();
$role = new Role();
$leave = new LeaveController($bag);

// $route->respond( function () use($home){
//     return 'Middleware should be first palce';
// });


$route->respond('GET', '/', function () use($home){
    return $home->index();
});


$route->respond('GET', '/test', function () use($user, $role){
     $users = $user->all();
     foreach ($users as $user) {
         var_dump($user->role->permission);
     }

});


$route->respond('GET', '/show/[i:id]', function ($request) use($home){
    return $home->show($request);
});

$route->respond('GET', '/create', function () use($home){
    return $home->create();
});
$route->respond('POST', '/store', function ($request, $response) use($home){
    return $home->store($request, $response);
});

$route->respond('GET', '/login', function () use($home){
    echo  $home->getLogin();
    unset($_SESSION['flash']);
});
$route->respond('POST', '/login', function ($request, $response, $service) use($home){
    return $home->postLogin($request, $response, $service);
});

$route->respond('GET', '/logout', function ($request, $response, $service) use($home){
    return $home->logout($request, $response, $service);
});

$route->respond('GET', '/dashboard/index', function ($request, $response) use($dashboard){
    return $dashboard->index($request, $response);
});

$route->respond('GET', '/dashboard/show', function ($request, $response) use($dashboard){
    return $dashboard->show($request, $response);
});

$route->respond('GET', '/dashboard/delete/[i:id]', function ($request, $response) use($dashboard){
    return $dashboard->delete($request, $response);
});

$route->respond('GET', '/dashboard/edit/[i:id]', function ($request, $response) use($dashboard){
    return $dashboard->edit($request, $response);
});
$route->respond('POST', '/dashboard/edit/[i:id]', function ($request, $response) use($dashboard){
    return $dashboard->update($request, $response);
});

$route->respond('GET', '/dashboard/leave/index', function ($request, $response) use($leave){
    return $leave->index($request, $response);
});

$route->respond('GET', '/dashboard/leave/create', function ($request, $response) use($leave){
    return $leave->create($request, $response);
});
$route->respond('POST', '/dashboard/leave/create', function ($request, $response) use($leave){
    return $leave->store($request, $response);
});

$route->respond('GET', '/dashboard/leave/approve/[i:id]', function ($request, $response) use($leave){
    return $leave->approve($request, $response);
});

// $rotue->respond('GET', '/posts', $callback);
// $rotue->respond('POST', '/posts', $callback);
// $rotue->respond('PUT', '/posts/[i:id]', $callback);
// $rotue->respond('DELETE', '/posts/[i:id]', $callback);
// $rotue->respond('OPTIONS', null, $callback);

$route->dispatch();