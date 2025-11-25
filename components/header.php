<?php 
$arah = isset($_SESSION['is_logged_in']) ? 'logout' : 'login' ;
 ?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BeritaHu</title>
	<link rel="stylesheet" href="<?= BASE_URL . '/assets/css/style.css'; ?>">
	<?php if (isset($list_css_tambahan)): ?>
		<?php foreach ($list_css_tambahan as $file_css): ?>
			<link rel="stylesheet" href="<?= BASE_URL . '/assets/css/' . $file_css; ?>">
		<?php endforeach; ?>
	<?php endif; ?>
</head>

<body>

	<!-- Header & Navigasi -->
	<header class="site-header">
		<div class="container">
			<a href="#" class="logo">Berita<span>Hu</span></a>

			<a href="<?= BASE_URL. '/'.$arah.'.php' ?>"><?= $arah ?></a>
			
			<?php isset($nav_file) ? include_once($nav_file) : ''; ?>

			<!-- Form Pencarian -->
			<form class="search-form" method="GET" action="">
				<input type="search" name="keyword" placeholder="Cari berita..." aria-label="Cari berita">
				<button type="submit">Cari</button>
			</form>

		</div>
	</header>