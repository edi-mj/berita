<?php
require_once('../base.php');
require_once(BASE_PATH . '/database.php');
require_once(BASE_PATH . '/otorisasi.php');

// var_dump(getAllArticles());
$articles = getAllArticles();

if (isset($_GET['keyword'])) {
    $articles = getArticlesBySearch($_GET['keyword']);
}

$list_css_tambahan = [
    'table.css'
];
include_once(BASE_PATH . '/components/header.php');
?>

<main class="site-main">

    <div class="container">
        <div class="page-header">
            <h1>Daftar Draf Artikel</h1>

            <a href="create.php" class="btn btn-primary">
                + Tambah Artikel
            </a>
        </div>

        <table class="draft-table">
            <caption>Data Draf Artikel Saat Ini</caption>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Penulis</th>
                    <th>Redaktur</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Published At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><a href="edit.php?id=1"><?= $article['judul'] ?></a></td>
                        <td><?= $article['isi'] ?></td>
                        <td><?= $article['namaPenulis'] ?></td>
                        <td><?= $article['namaRedaktur'] ?></td>
                        <td><?= $article['status'] ?></td>
                        <td><?= $article['created_at'] ?></td>
                        <td><?= $article['published_at'] ?></td>
                        <td><?= $article['updated_at'] ?></td>
                        <td>
                            <button type="button" class="btn btn-edit"><a href="edit.php?id_artikel=<?= $article['id_artikel'] ?>">Edit</a></button>
                            <button type="button" class="btn btn-delete"><a href="delete.php?id_artikel=<?= $article['id_artikel'] ?>">Delete</a></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>

<?php include_once(BASE_PATH . '/components/footer.php'); ?>