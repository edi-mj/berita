<?php
require_once('base.php');
require_once(BASE_PATH . '/database.php');

// Tambahkan varibel $nav_file jika ada navbar khusus
$nav_file = 'nav-user.php';
include_once(BASE_PATH . '/components/header.php');
?>

<!-- Konten Utama -->
<main class="site-main">
	<div class="container">

		<!-- Berita Utama (Headline) -->
		<section class="headline-section">
			<article class="headline-card">
				<img src="" alt="Gambar berita utama">
				<div class="headline-content">
					<span class="category">Ini kategori berita</span>
					<h2>Ini Judul Berita Utama</h2>
					<p class="excerpt">
						Ini deskripsi berita utama.
					</p>
					<span class="meta">Penulis/Publisher | Tanggal</span>
				</div>
			</article>
		</section>

		<!-- Layout Utama (Untuk semua berita) -->
		<div class="main-layout">

			<!-- Kolom Berita Terbaru -->
			<section class="latest-news">
				<h2 class="section-title">Berita Terbaru</h2>
				<div class="latest-news-list">
					<!-- Artikel Berita -->
					<article class="news-card">
						<img src="" alt="Gambar berita">
						<div class="news-content">
							<span class="category">Kategori</span>
							<h3>Judul</h3>
							<span class="meta">Penulis | Tanggal</span>
						</div>
					</article>
				</div>
			</section>

		</div><!-- .main-layout -->

	</div><!-- .container -->
</main>

<?php include_once(BASE_PATH . '/components/footer.php'); ?>