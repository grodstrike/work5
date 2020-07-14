<?
$userData['id']	=	$_SESSION['user_id'];
$class_data			=	new Main();
$userData['data']	=	$class_data->getRow('select * from users where id="'.$userData['id'].'"');
$userData['orders']	=	$class_data->getRow('select * from orders where user_id="'.$userData['id'].'"');
foreach ($userData['data'] as $data) {
	$userData['data'] = $data;
}

?>