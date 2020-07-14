<?php
$data_routes = new Main();
$tmp_routes = $data_routes->getRow('select * from pages');

foreach ($tmp_routes as $item) {
	$routes[$item['url']] = $item['method']; 
	
}