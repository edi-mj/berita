<?php
require_once('../base.php');
require_once(BASE_PATH . '/database.php');

// code..

$list_css_tambahan = ['form-article.css'];
include_once BASE_PATH . '/components/header.php';
?>
<main class="site-main">
  <div class="container">
    <div class="page-header">
      <h1>Tambah Artikel</h1>

      <a href="<?= BASE_URL . '/redaktur/index.php'; ?>" class="btn btn-secondary">
        &larr; Kembali
      </a>
    </div>

    <!-- Include form dari form-article.php -->
    <?php include_once(BASE_PATH . '/redaktur/form-article.php'); ?>

  </div>
</main>

<?php include_once(BASE_PATH . '/components/footer.php'); ?>