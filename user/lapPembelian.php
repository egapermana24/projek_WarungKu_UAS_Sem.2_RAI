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
$pembelian = $db->tampilLapPembelian();
$dataBarang = $db->tampilBarang();
$barang = $db->tampilBarangById($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Pembelian Produk</title>
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
</head>

<body class="sb-nav-fixed hijauNom">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <!-- Customisasi di dalam tag main! -->
      <main>
        <div class="container overflow-hidden pb-3">
          <h1 class="mt-4 mb-5 display-5"><i class="fa-solid fa-money-bill-wave text-secondary"></i> Pembelian Produk</h1>
          <div class="card shadow-sm p-2">
            <div class="row mt-4 ">
              <form action="lapPembelian.php" method="POST">
                <div class="container px-4">
                  <div class="row gx-4">
                    <div class="col-4">
                      <div class="p-0">
                        <label class="form-label">Dari Tanggal :</label>
                        <input class="form-control" type="date" name="dari">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="p-0">
                        <label class="form-label">Sampai Tanggal :</label>
                        <input class="form-control" type="date" name="sampai">
                      </div>
                    </div>
                    <div class="col-4 ms-0">
                      <div class="p-0 pt-3 mt-3">
                        <button name="cariTgl" type="submit" class="btn btn-primary btn-lg"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <?php if (isset($_POST['cariTgl'])) :
                          $dari = $_POST['dari'];
                          $sampai = $_POST['sampai'];
                        ?>
                          <a href="cetak_pembelian.php?awal=<?= $dari; ?>&&akhir=<?= $sampai; ?>" target="_blank" type="submit" class="btn btn-warning btn-lg"><i class="fa-solid fa-print"></i></a>
                        <?php else : ?>
                          <a href="cetak_pembelian.php" target="_blank" type="submit" class="btn btn-warning btn-lg"><i class="fa-solid fa-print"></i></a>
                        <?php endif; ?>
                        <a href="tambahPembelian.php" class="btn btn-success float-end"><i class="fa-solid fa-plus"></i> Produk Masuk</a>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card border-0 shadow">
              <div class="card-body table-responsive border-0">
                <table class="table table-hover table-border-0">
                  <thead class="table">
                    <tr>
                      <th>No.</th>
                      <th>No. Referensi</th>
                      <th>Tanggal Masuk</th>
                      <th>Nama Produk</th>
                      <th>Merk</th>
                      <th>Penerima</th>
                      <th>Jumlah Beli</th>
                      <th>Harga Beli</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (empty($pembelian)) {
                      echo "<tr><td colspan='9' class='text-center'>Tidak ada data</td></tr>";
                    }
                    $no = 1;
                    foreach ($pembelian as $row) {
                    ?>
                      <tr>
                        <th class="text-center"><?= $no++; ?></th>
                        <td class="text-uppercase"><?= $row['no_ref']; ?></td>
                        <td><?= $db->tgl_indo(date($row['tgl_masuk'])); ?></td>
                        <td><?= $row['nm_barang']; ?></td>
                        <td><?= $row['merk']; ?></td>
                        <td><?= $row['penerima']; ?></td>
                        <td><?= $row['jumlah']; ?></td>
                        <td><?= 'Rp. ' . number_format($row['hrg_beli']); ?></td>
                        <td><?= 'Rp. ' . number_format($row['total']); ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
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