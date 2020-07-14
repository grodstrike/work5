<?	$root = $_SERVER['DOCUMENT_ROOT'];
	require $root.'/config/functions.php';
	$class_data	=	new Main();
	
	$data['users']	=	$class_data->getRow('select * from users');
	$test = $class_data->getRow('SELECT `username` FROM `users` WHERE `id` IN (SELECT `user_id` FROM `orders` GROUP BY `user_id` HAVING count(*)>2);');


	foreach ($id as $value) {
		$tmp_data2[]	=	$class_data->getRow('select * from users where id="'.$value.'"');
	}

	

?>
<div>Cписок логинов пользователей которые сделали более двух заказов:</div>
<ul>

<?foreach ($test as $value):?>
	<li>
		<?=$value['username'];?>
	</li>
<?endforeach;?>
</ul>