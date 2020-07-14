<?php
#ini_set('error_reporting', E_ALL);
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
$root = $_SERVER['DOCUMENT_ROOT'];

require_once ($root . '/controller/controller.php');
require_once ($root . '/controller/routes.php');



if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();
require_once './classes/Auth.class.php';

#получаем путь запроса
$path = getRequestPath();

#получаем функцию обработчик
$method = getMethod($routes, $path);

