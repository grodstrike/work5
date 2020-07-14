<?	$root = $_SERVER['DOCUMENT_ROOT'];
	require $root.'/config/functions.php';
	$class_data	=	new Main();
	
	$data	=	$class_data->getRow('select * from users');
	foreach ($data as $v) {
		$email[]= $v['email'];
		
	}
	$ar1 = array_unique($email);

	$dublicats = array_diff_key($email,$ar1);
	
?>
<div>Cписок email'лов встречающихся более чем у одного пользователя:</div>
<ul>
<?foreach ($dublicats as $value):?>
	<li>
		<?=$value;?>
	</li>
<?endforeach;?>
</ul>