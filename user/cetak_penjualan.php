<?php
// menghilangkan peringatakan error karena tidak ada data yang diinputkan
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Laporan Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../templates/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body onload="javascript:window.print()" style="margin: 0 auto; width: 1000px">
  <div style="margin: auto; top: 20%; display: block; position: absolute; opacity: 0.05; font-size: 200pt; filter: alpha(opacity=20);">
    <label>
      ASLI
    </label>
  </div>

  <p>&nbsp;</p>
  <img src="../img/store.png" style="width: 10%; float:left; position:absolute; z-index: 999; ">
  <table align="center" width="90%" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <div align="center">
          <font size="8"><b>WarungKu</b></font>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div align="center">
          <font size="3">Jl. Pesantren Angka Wijaya No. 05, Cipeujeuh Kulon, Lemahabang, Kab. Cirebon, Jawa Barat</font>
        </div>
      </td>
    </tr>
  </table><br>
  <div class="card border-dark"></div>

  <div class="col text-center">
    <font size="6">
      <u>
        <h3>Laporan Penjualan Produk</h3>
      </u>
    </font>
  </div>
  <p>&nbsp;</p>

  <table class="table table-bordered">
    <thead class="table text-center">
      <tr>
        <th>No.</th>
        <th>Kode Produk</th>
        <th>Tanggal Terjual</th>
        <th>Nama Produk</th>
        <th>Kasir</th>
        <th>Jumlah</th>
        <th>Modal</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php
      require_once 'database.php';
      $db = new database();
      $laporan = $db->cetakPenjualan();
      $no = 1;
      foreach ($laporan as $lapor) {
      ?>
        <tr>
          <th class="text-center"><?= $no++; ?></th>
          <td><?= $lapor['id']; ?></td>
          <td><?= $db->tgl_indo(date($lapor['tgl_jual'])); ?></td>
          <td><?= $lapor['nm_barang']; ?></td>
          <td><?= $lapor['nama']; ?></td>
          <td><?= $lapor['jumlah']; ?></td>
          <td><?= 'Rp. ' . number_format($lapor['modal']); ?></td>
          <td><?= 'Rp. ' . number_format($lapor['total']); ?></td>
        </tr>
      <?php } ?>
    </tbody>
    <?php
    // menghilangkan tampilan error karena tidak ada data yang diinputkan
    if (empty($laporan)) {
      echo "<tr><td colspan='8' class='text-center'>Tidak ada data</td></tr>";
    }
    if (!empty($laporan)) {
      $jumlahAll = array_sum(array_column($laporan, 'jumlah'));
      $modalAll = array_sum(array_column($laporan, 'modal'));
      $totalAll = array_sum(array_column($laporan, 'total'));
      $keuntungan = $totalAll - $modalAll;

    ?>
      <tfoot>
        <tr>
          <th colspan="5">
            <h6>Total Penjualan</h6>
          </th>
          <td>
            <h6 class="text-center"><?= $jumlahAll; ?></h6>
          </td>
          <td>
            <h6 class="text-center"><?= 'Rp. ' . number_format($modalAll); ?></h6>
          </td>
          <td>
            <h6 class="text-center"><?= 'Rp. ' . number_format($totalAll); ?></h6>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <h6>Keuntungan</h6>
          </td>
          <td colspan="2" class="text-center">
            <h6><?= 'Rp. ' . number_format($keuntungan); ?></h6>
          </td>
        </tr>
      </tfoot>
    <?php } ?>
  </table>

  <p>&nbsp;</p>

  <table align="right" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <center>Cirebon, <?= $db->tgl_indo(date('Y-m-d')); ?></center>
      </td>
    </tr>
    <tr>
      <td>
        <center>Direktur WarungKu</center>
        <p align="center">
          <img src="../img/ttdLapBrg.jpeg" width="30%">
        </p>
        <center><u>Fajar Febrianto, M.Pd.</u></center>
      </td>
    </tr>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../templates/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="../templates/assets/demo/chart-area-demo.js"></script>
  <script src="../templates/assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="../templates/js/datatables-simple-demo.js"></script>
</body>

</html>