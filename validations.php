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

		if ($_SESSION['role'] == 'redaktur') {
			header("Location: " . BASE_URL . "/redaktur");
			exit();
		} elseif ($_SESSION['role'] == 'pembaca') {
			header("Location: " . BASE_URL . "/pembaca");
			exit();
		} else {
			header("Location: " . BASE_URL . "/penulis");
			exit();
		}
	} else {
		$errors['login'] = "Username atau Password Tidak Sesuai";
	}
}


function getFileImage(&$errors)
{
	$namaFile = $_FILES["cover"]["name"];
	$error = $_FILES["cover"]["error"];
	if ($error === 4) {
		$errors['error'] = "pilih gambar terlebih dahulu";
		return false;
	}
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		$errors['error'] = "ekstensi gambar tidak valid";
		return false;
	}
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	return $namaFileBaru;
}
