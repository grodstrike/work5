<?php
include './classes/Auth.class.php';
include './classes/AjaxRequest.class.php';
include './config/functions.php';

function getRequestPath() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    return '/' . ltrim(str_replace('index.php', '', $path), '/');
}

function getPage($method) {
	
	if (!empty($_COOKIE['sid'])) 
	{
	    // check session id in cookies
	    session_id($_COOKIE['sid']);
	}
	session_start();
	$user1 = new Main();
	
	if ($method == 'register') {
		$page = $user1->LoadTemplate('register');
	} else {

	if (Auth\User::isAuthorized()){ 
			
			$page = $user1->LoadTemplate($method);
		
	}else {
		$user1->LoadTemplate('login');
		
	}
	}
	return $page;
}
function getMethod(array $routes, $path) {
    // перебор всех маршрутов
    foreach ($routes as $route => $method) {
        // если маршрут сопадает с путем, возвращаем функцию
        if ($path === $route) {

            return getPage($method);
        }
    }
    $user1 = new Main();
    $user1->LoadTemplate('notFound');
    
}


