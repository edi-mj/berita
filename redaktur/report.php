<?php
require_once('../base.php');
require_once(BASE_PATH . '/database.php');
require_once(BASE_PATH . '/otorisasi.php');

$articleCounts = countArticlesCategory();
$articleCounts = json_encode($articleCounts);

$nav_file = 'nav-redaktur.php';
include_once(BASE_PATH . '/components/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporting</title>
  <style>
    @media print {
      body * {
        visibility: hidden;
      }

      canvas {
        visibility: visible;
      }

      canvas {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
      }
    }
  </style>
</head>

<body>

  <main class="site-main">
    <div class="container">
      <h1>Report Artikel per Kategori</h1>

      <div class="btn-cetak">
        <button onclick="window.print()">PRINT</button>
        <button><a href="<?= BASE_URL . '/redaktur/export-excel.php' ?>">Download Excel</a></button>
      </div>

      <div>
        <canvas id="myChart"></canvas>
      </div>

    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('myChart');

    const articles = <?= $articleCounts; ?>;
    console.log(articles);

    const kategori = articles.map(item => item.kategori);
    console.log(kategori);

    const counts = articles.map(item => item.jumlah);

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: kategori,
        datasets: [{
          label: 'Jumlah Artikel per Kategori',
          data: counts,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>


</body>

</html>