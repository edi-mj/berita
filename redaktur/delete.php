<?php
require_once('../base.php');
require_once(BASE_PATH . '/database.php');
require_once(BASE_PATH . '/otorisasi.php');

if(isset($_GET['id_artikel'])){
	deleteArticle($_GET['id_artikel']);
}
header("Location:index.php");