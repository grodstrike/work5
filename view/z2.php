<?	$root = $_SERVER['DOCUMENT_ROOT'];
	require $root.'/config/functions.php';
	$class_data	=	new Main();
	
	$data['users']	=	$class_data->getRow('select * from users');
	$data['orders']	=	$class_data->getRow('select * from orders');

	

	foreach ($data['users'] as $value) {
		$tmp_data[]	=	$class_data->getRow('select * from orders where user_id="'.$value['id'].'"');
		
		if (empty($class_data->getRow('select * from orders where user_id="'.$value['id'].'"'))){
				$login_empty[] = $value['username'];
		}
	}

	

	
	
?>
<pre>
	<?print_r($tmp_data2);?>
</pre>
<div>Cписок логинов пользователей, которые не сделали ни одного заказа:</div>
<ul>
<?foreach ($login_empty as $value):?>
	<li>
		<?=$value;?>
	</li>
<?endforeach;?>
</ul>