<?php  
require_once('base.php');
require_once(BASE_PATH . '/database.php');

session_start();
if (!isset($_SESSION['is_logged_in'])) {
	header("Location:".BASE_URL."/login.php");
	exit();
}

?>