<?php
require_once('base.php');
require_once(BASE_PATH . '/database.php');
require_once('validations.php');

$errors = [];

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$pass = $_POST['password'];
	authentikasi($errors, $username, $pass);
}

// Tambahkan varibel $nav_file jika ada navbar khusus
$nav_file = 'nav-user.php';
include_once(BASE_PATH . '/components/header.php');
?>


<main class="site-main">
	<div class="container">
		<form method="POST">
			<div>
				<input type="text" name="username" placeholder="Masukkan Username">
			</div>
			<div>
				<input type="password" name="password" placeholder="Masukkan password">
			</div>
			<span><?= $errors['login'] ?? "" ?></span>
			<br><input type="submit" name="submit" value="Login">
		</form>
	</div>
</main>


<?php include_once(BASE_PATH . '/components/footer.php'); ?>