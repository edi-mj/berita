<?php
require_once('../base.php');
require_once(BASE_PATH . '/database.php');

// code..

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
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Published At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="edit.php?id=1"></a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-edit"><a href="edit.php">Edit</a></button>
                        <button type="button" class="btn btn-delete"><a href="delete.php">Delete</a></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</main>

<?php include_once(BASE_PATH . '/components/footer.php'); ?>