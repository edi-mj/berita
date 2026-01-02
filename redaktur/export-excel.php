<?php
require_once("../base.php");
require_once(BASE_PATH . "/database.php");

header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-disposition: attachment; filename=export_excel.xls");

$articlesCategory = countArticlesCategory();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Report Artikel per Kategori</h1>
  <table border="1">
    <thead>
      <tr>
        <th>Kategori</th>
        <th>Jumlah Artikel</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($articlesCategory as $category): ?>
        <tr>
          <td><?= $category['kategori'] ?></td>
          <td><?= $category['jumlah'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>

</body>

</html>