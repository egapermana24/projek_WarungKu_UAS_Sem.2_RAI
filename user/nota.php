<?php
// menghilangkan peringatakan error karena tidak ada data yang diinputkan
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

require_once 'database.php';
$db = new database();
session_start();
$nota = $db->tampilStruk();
$kasir = $db->tampilKasir();
$profil = $db->tampilProfil();

// mengambil id kasir dari tabel struk
$id_kasir = $nota[0]['id_kasir'];

date_default_timezone_set('Asia/Jakarta');
$time = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Bukti Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../templates/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body onload="javascript:window.print()" style="margin: 0 auto; width: 500px">
  <div class="card">
    <div class="card mt-3 p-3 pb-0 border-0">
      <h2 class="text-center">WarungKu</h2>
      <small class="text-center">Jl. Pesantren Angka Wijaya No. 05, Cipeujeuh Kulon, Lemahabang, Kab. Cirebon, Jawa Barat</small>
    </div>
    <div class="container">
      <div class="row g-2" style="font-size: 15px;">
        <div class="col-8">
          <div class="p-3 border bg-white border-0"> <small> NOTA : <?= $id_kasir; ?> <br> KASIR : <?= $_SESSION['nama']; ?></small></div>
        </div>
        <div class="col-4">
          <div class="p-3 border bg-white border-0"><small>TGL : <?= $db->tgl_indo(date('Y-m-d')); ?> <br> JAM : <?= date('H:i:s', $time); ?></small></div>
        </div>
      </div>
    </div>
    <div class="card border-1 bg-dark"></div>
    <table class="table text-center">
      <thead>
        <tr>
          <th class="text-start">Nama Produk</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th class="text-end">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($nota as $row) {
        ?>
          <tr>
            <td class="text-start"><?= $row['nm_barang']; ?></td>
            <td class="text-center"><?= $row['jumlah']; ?></td>
            <td class="text-center"><?= number_format($row['hrg_jual']); ?></td>
            <td class="text-end"><?= number_format($row['total']); ?></td>
          </tr>
        <?php } ?>
      </tbody>
      <tfoot class="table-borderless">
        <tr>
          <th colspan="3" class="text-start">Total <br>Bayar <br> Kembalian</th>
          <th class="text-end"><?= 'Rp. ' . number_format($row['totalAll']); ?><br><?= 'Rp. ' . number_format($row['pembayaran']); ?><br><?= 'Rp. ' . number_format($row['kembalian']); ?></th>
        </tr>
      </tfoot>
    </table>
    <div class="card mt-3 p-3 pb-0 border-0">
      <h6 class="text-center">*TERIMA KASIH*</h6>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../templates/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="../templates/assets/demo/chart-area-demo.js"></script>
  <script src="../templates/assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="../templates/js/datatables-simple-demo.js"></script>
</body>

</html>