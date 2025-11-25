<?php  

function authentikasi(&$errors, $username, $password)
{
	$stmnt = DBH->prepare(
		'SELECT * FROM Pengguna WHERE username = :username 
		AND password = SHA2(:password, 256)'
	);
	$stmnt->execute([
		":username" => $username,
		":password" => $password
	]);

	if ($stmnt->rowCount() > 0) {
		$dataUser = $stmnt->fetch();

		session_start();

		$_SESSION['role'] = $dataUser['role'];
		$_SESSION['is_logged_in'] = true;
		if ($dataUser['role'] == 'redaktur') {
			header("Location:".BASE_URL."/redaktur");
			exit();
		} elseif ($dataUser['role'] == 'pembaca') {
			header("Location:".BASE_URL."/pembaca");
			exit();
		}

	} else {
		$errors['login'] = "Username atau Password Tidak Sesuai";
	}
}

?>