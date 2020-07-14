<?
	$class_data	=	new Main();
	$data['orders']	=	$class_data->getRow('select * from orders');
	$data['users']	=	$class_data->getRow('select * from users');
	#print_r($data);


?>