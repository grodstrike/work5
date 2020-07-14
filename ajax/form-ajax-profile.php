<?
	$root = $_SERVER['DOCUMENT_ROOT'];
	include $root.'/config/config.php';
	include $root.'/config/functions.php';
	$conn = connectToBd();
	$iterations = 10;
	foreach ($_POST as $key => $value) {
		$data[$key] = $value;
	}
	$id = $data['id'];
	$class_data			=	new Main();
	$userData	=	$class_data->getRow('select * from users where id="'.$data['id'].'"');
	foreach ($userData as $k) {
		$userData = $k;
	}
	$salt = $userData['salt'];
	$hash = md5(md5($data['password1'] . md5(sha1($salt))));
    for ($i = 0; $i < $iterations; ++$i) {
            $hash = md5(md5(sha1($hash)));
        }
     if (!empty($data['password1'])) {		
		if (!empty($data['password2'])) {
		if ($hash == $userData['password']) {
				$salt = uniqid();
				$hash = md5(md5($data['password2'] . md5(sha1($salt))));

				for ($i = 0; $i < $iterations; ++$i) {
					$hash = md5(md5(sha1($hash)));
				}
			
			
			
			$fio = $data['fio'];
			$email = $data['email'];
			$sql = "UPDATE users SET password='$hash', salt='$salt' WHERE id='$id'";
			$sql2 = "UPDATE users SET fio='$fio',email='$email' WHERE id='$id'";
			mysqli_query($conn,$sql2);
			if (mysqli_query($conn,$sql)) {
				echo json_encode('Данные успешно обновлены.');
				
			}
			
			
		} else {
			echo json_encode('Вы ввели неверный старый пароль');
			
		}
	} else {
		echo json_encode('Вы не ввели новый пароль');
		
	}
} else {
	echo json_encode('Вы не ввели старый пароль');
	
}   




	



?>