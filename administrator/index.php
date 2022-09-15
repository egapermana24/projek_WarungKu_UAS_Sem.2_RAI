<?php
class menu
{
  function __construct()
  {
    include "menu.php";
  }
}
$menu = new menu;

$db = new database();
$laporan = $db->tampilLapPenjualan();
// menampilkan jumlah baris dari tabel barang
$sql = "SELECT COUNT(id) FROM barang";
$query = mysqli_query($db->koneksi, $sql);
while ($row = mysqli_fetch_array($query)) {
  $jumlahBarang = $row['COUNT(id)'];
}
// menampilkan jumlah baris dari tabel kategori
$sql2 = "SELECT COUNT(id_kategori) FROM kategori";
$query2 = mysqli_query($db->koneksi, $sql2);
while ($row2 = mysqli_fetch_array($query2)) {
  $jumlahKategori = $row2['COUNT(id_kategori)'];
}
// menampilkan jumlah stok dari tabel barang
$sql3 = "SELECT SUM(stok) FROM barang";
$query3 = mysqli_query($db->koneksi, $sql3);
while ($row3 = mysqli_fetch_array($query3)) {
  $jumlahStok = $row3['SUM(stok)'];
}
// menampilkan jumlah baris dari tabel lappembelian
$sql4 = "SELECT COUNT(no_ref) FROM lappembelian";
$query4 = mysqli_query($db->koneksi, $sql4);
while ($row4 = mysqli_fetch_array($query4)) {
  $jumlahPembelian = $row4['COUNT(no_ref)'];
}

if (!empty($laporan)) {
  $jumlahPenjualan = array_sum(array_column($laporan, 'jumlah'));
  $modal = array_sum(array_column($laporan, 'modal'));
  $total = array_sum(array_column($laporan, 'total'));
  // menghitung untung bersih dari tabel lappenjualan
  $keuntungan = $total - $modal;
} else {
  $jumlahPenjualan = 0;
  $modal = 0;
  $total = 0;
  $keuntungan = 0;
}
// JAM Sambutan

//ubah timezone menjadi jakarta
date_default_timezone_set("Asia/Jakarta");

//ambil jam dan menit
$jam = date('H:i');

//atur salam menggunakan IF
if ($jam > '05:30' && $jam <= '10:00') {
  $salam = 'Pagi';
} elseif ($jam >= '10:00' && $jam <= '15:00') {
  $salam = 'Siang';
} elseif ($jam >= '15:00' && $jam <= '18:00') {
  $salam = 'Sore';
} else {
  $salam = 'Malam';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../templates/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- my CSS -->
  <style>
    body {
      background-color: #f5f5f5;
    }

    a {
      text-decoration: none;
    }
  </style>
  <link rel="stylesheet" href="style.css">
</head>

<body class="sb-nav-fixed hijauNom">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <!-- Customisasi di dalam tag main! -->
      <main>
        <div class="container overflow-hidden">
          <h1 class="mt-4 mb-4 ms-3 display-5"> Dashboard</h1>
          <div class="row mb-2 mx-3">
            <div class="alert alert-white shadow opacity-75 " role="alert">
              <h4 class="alert-heading animasi-teks">Halo <?= $_SESSION['nama']; ?>, Selamat <?= $salam; ?>!</h4>
              <p>Selalu bahagia dan tetap semangat dalam menjalani hari.</p>
              <hr>
              <p class="mb-0"><?= $db->tgl_indo(date('Y-m-d')); ?></p>
            </div>
          </div>
          <div class="row mb-2 mx-2">
            <div class="col-sm-4 p-1">
              <div class="card">
                <a href="dataBarang.php" class="text-dark">
                  <div class="card-body shadow">
                    <h5 class="card-title"><i class="fa-solid fa-fw fa-boxes-stacked text-success"></i> Jenis Produk</h5>
                    <p class="card-text display-6 text-center"><?= $jumlahBarang; ?> jenis</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-4 p-1">
              <a href="dataKategori.php" class="text-dark">
                <div class="card">
                  <div class="card-body shadow">
                    <h5 class="card-title"><i class="fa-solid fa-object-group text-success"></i> Kategori Produk</h5>
                    <p class="card-text display-6 text-center"><?= $jumlahKategori; ?> kategori</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-4 p-1">
              <a href="dataBarang.php" class="text-dark">
                <div class="card">
                  <div class="card-body shadow">
                    <h5 class="card-title"><i class="fa-solid fa-box-open text-success"></i> Stok Produk</h5>
                    <p class="card-text display-6 text-center">Total <?= number_format($jumlahStok); ?></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="row mb-5 mx-2">
            <div class="col-sm-4 p-1">
              <a href="lapPembelian.php" class="text-dark">
                <div class="card">
                  <div class="card-body shadow">
                    <h5 class="card-title"><i class="fa-solid fa-money-bill-wave text-success"></i> Pembelian Produk</h5>
                    <p class="card-text display-6 text-center"><?= $jumlahPembelian; ?> produk</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-4 p-1">
              <a href="lapPenjualan.php" class="text-dark">
                <div class="card">
                  <div class="card-body shadow">
                    <h5 class="card-title"><i class="fa-solid fa-money-bills text-success"></i> Penjualan Produk</h5>
                    <p class="card-text display-6 text-center"><?= $jumlahPenjualan; ?> produk</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-4 p-1">
              <a href="lapPenjualan.php" class="text-dark">
                <div class="card">
                  <div class="card-body shadow">
                    <?php if (!empty($laporan)) : ?>
                      <h5 class="card-title"><i class="fa-solid fa-chart-line text-success"></i> Keuntungan</h5>
                      <p class="card-text display-6 text-center"><?= 'Rp. ' . number_format($keuntungan); ?></p>
                    <?php else : ?>
                      <h5 class="card-title"><i class="fa-solid fa-chart-line text-success"></i> Keuntungan</h5>
                      <p class="card-text display-6 text-center">Rp. 0</p>
                    <?php endif; ?>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-3 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Ega Permana 2022</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../templates/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="../templates/assets/demo/chart-area-demo.js"></script>
  <script src="../templates/assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="../templates/js/datatables-simple-demo.js"></script>
  <!-- agar saat mereload halaman tidak memunculkan resubmition form -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>