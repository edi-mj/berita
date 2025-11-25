<?php
require_once('../base.php');
require_once(BASE_PATH . '/database.php');
require_once(BASE_PATH . '/otorisasi.php');

$id = $_GET['id_artikel'] ?? 1;
$artikel = getArticleById($id);
// var_dump($artikel);
// die;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  editArticle($id, $_POST);
  header('Location: ' . BASE_URL . '/redaktur/index.php');
}

$list_css_tambahan = ['form-article.css'];
include_once(BASE_PATH . '/components/header.php');
?>
<main class="site-main">
  <div class="container">
    <div class="page-header">
      <h1>Edit Artikel</h1>

      <a href="<?= BASE_URL . '/redaktur/index.php'; ?>" class="btn btn-secondary">
        &larr; Kembali
      </a>
    </div>

    <!-- Include form dari form-article.php -->
    <?php include_once('form-article.php'); ?>

  </div>
</main>

<?php include_once(BASE_PATH . '/components/footer.php'); ?>