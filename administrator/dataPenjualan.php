<?php
class menu
{
  function __construct()
  {
    include "menu.php";
  }
}
$menu = new menu;

session_start();
$db = new database();
$dataBarang = $db->tampilBarang();
$dataKategori = $db->tampilKategori();
$keranjang = $db->tampilBarangById($_GET['id']);
$kasir = $db->tampilPenjualan();
$bayar = $db->jumlahPenjualan();
$setelah = $db->tampilKasir();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Keranjang Penjualan</title>
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

    .hijauTua {
      background-color: #426755;
    }

    .hijauMuda {
      background-color: #fff;
    }

    .hijauText {
      color: #426755;
    }

    .hijauNom {
      background-color: white;
    }

    a :hover {
      color: white;
    }
  </style>
</head>

<body class="sb-nav-fixed hijauNom">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <!-- Customisasi di dalam tag main! -->
      <main>
        <div class="container overflow-hidden pt-3">
          <h1 class="mt-1 mb-5 display-5"><i class="fa-solid fa-cash-register text-secondary"></i> Kasir Penjualan</h1>
          <div class="row">
            <div class="col-8">
              <div class="card shadow-sm">
                <h5 class="card-header text-light hijauTua">Hasil Pencarian</h5>
                <div class="card-img">
                  <?php if (empty($_POST['cari'])) : ?>
                    <div class="alert alert-light mb-3 text-center" role="alert">
                      Masukkan kata kunci di kolom pencarian.
                    </div>
                  <?php endif ?>
                  <?php
                  if (isset($_POST['cari'])) {
                    if (!empty($_POST['cari'])) {
                  ?>
                      <table class="table mb-0 table-hover table-borderless">
                        <thead class="table text-center">
                          <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                          </tr>
                          <tr>
                          </tr>
                        </thead>
                        <form action="<?= "prosesKasirPenjualan.php"; ?>" method="POST">
                          <tbody class="text-center">
                            <?php

                            $no = 1;
                            foreach ($dataBarang as $barang) {
                              $total = $row['total'] = $row['jumlah'] * $row['hrg_jual'];
                            ?>
                              <tr>
                                <th><?= $no++; ?></th>
                                <td><?= $barang['id']; ?></td>
                                <td><?= $barang['nm_barang']; ?></td>
                                <td><?= $barang['merk']; ?></td>
                                <td><?= 'Rp. ' . number_format($barang['hrg_jual']); ?></td>
                                <td>
                                  <a href="<?= "prosesKasirPenjualan.php?&&aksi=keranjang&&id=$barang[id]&&idProf=$_SESSION[id_profil]&&jumlah=1&&tgl=date('Y-m-d')"; ?>" class="badge bg-success"><i class="fa-solid fa-fw fa-cart-shopping"></i></a>
                                </td>
                              </tr>
                            <?php }
                            ?>
                          </tbody>
                      </table>
                    <?php } ?>
                  <?php } ?>
                </div>
                </form>
              </div>
            </div>
            <div class="col-4">
              <div class="card shadow-sm ">
                <h5 class="card-header text-light hijauTua">Cari Produk</h5>
                <div class="card-body">
                  <form action="dataPenjualan.php" method="POST">
                    <div class="input-group">
                      <input autocomplete="off" autofocus name="cari" type="text" class="form-control" placeholder="Masukkan pencarian">
                      <button value="cari" class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row gx-5 mt-3 mb-3">
            <div class="col">
              <div class="card shadow-sm">
                <div class="card-header hijauTua ">
                  <div class="row ">
                    <div class="col-6">
                      <h5 class="text-light">Kasir</h5>
                    </div>
                    <div class="col-6">
                      <a href="<?= "prosesKasirPenjualan.php?aksi=hapusAll"; ?>" class="btn btn-sm btn-danger float-end">Reset <i class="fa-solid fa-fw fa-cart-shopping"></i></a>
                    </div>
                  </div>
                </div>
                <?php
                $no = 1;
                // operasi total

                ?>

                <div class="card-body">
                  <div class="card border-0">
                    <table class="table text-center justify-content-center">
                      <thead>
                        <th>No </th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Petugas Kasir</th>
                        <th>Hapus</th>
                      </thead>
                      <?php
                      if (empty($kasir)) {
                        echo "<tr><td colspan='6' class='text-center'>Tidak ada produk yang dipilih</td></tr>";
                      }
                      ?>
                      <tbody>
                        <?php foreach ($kasir as $row) : ?>
                          <?php

                          $totalAll = array_sum(array_column($kasir, 'total'));
                          ?>
                          <form action="<?= "prosesKasirPenjualan.php?aksi=edit&&id=$row[id_jual]"; ?>" method="POST">
                            <input name="harga" type="hidden" value="<?= $row['hrg_jual']; ?>">
                            <input name="stok" type="hidden" value="<?= $row['stok']; ?>">
                            <input name="id_jual" type="hidden" value="<?= $row['id_jual']; ?>">
                            <input hidden name="idBarang" type="number" value="<?= $row['id_Barang']; ?>">
                            <input name="id_profil" type="hidden" value="<?= $row['id_profil']; ?>">
                            <tr>
                              <th><?= $no++; ?></th>
                              <td><?= $row['nm_barang']; ?></td>
                              <td>
                                <div class="row gx-0">
                                  <div class="col-sm-6 col-md-10"><input autocomplete="off" name="jumlah" class="form-control form-control-sm text-center" type="number" value="<?= $row['jumlah']; ?>"></div>
                                  <div class="col-6 col-md-2"><button type="submit" class="btn btn-outline-warning"><i class=" fa-solid fa-arrows-rotate"></i></button></div>
                                </div>
                              </td>
                              <td>
                                <?= 'Rp. ' . number_format($row['total']); ?>
                              </td>
                              <td><input class="form-control form-control-sm text-center border-0" type="text" value="<?= $row['nama']; ?>"></td>
                              <td>
                                <input name="tanggal_terjual" type="hidden" value="<?= date('Y-m-d'); ?>">
                                <a href="<?= "prosesKasirPenjualan.php?aksi=hapus&&id=$row[id_jual]"; ?>" class="btn btn-danger"><i class="fa-solid fa-x"></i></a>
                              </td>
                            </tr>
                          </form>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card p-3 mt-3 mb-1">
                    <?php
                    foreach ($kasir as $row) {
                    ?>
                      <form action="prosesKasirPenjualan.php?aksi=bayar" method="POST">
                        <input name="hrg_beli[]" type="hidden" value="<?= $row['hrg_beli']; ?>">
                        <input name="stok[]" type="hidden" value="<?= $row['stok']; ?>">
                        <input name="jumlah[]" type="hidden" value="<?= $row['jumlah']; ?>">
                        <input name="id_jual" type="hidden" value="<?= $row['id_jual']; ?>">
                        <input name="id_Barang[]" type="hidden" value="<?= $row['idBarang']; ?>">
                        <input name="id_Profil[]" type="hidden" value="<?= $row['id_profil']; ?>">
                        <input name="total[]" type="hidden" value="<?= $row['total']; ?>">
                        <input name="nm_barang[]" type="hidden" value="<?= $row['nm_barang']; ?>">
                      <?php
                      $sql = "SELECT COUNT(id_jual) FROM penjualan WHERE id_profil = '$_SESSION[id_profil]'";
                      $query = mysqli_query($db->koneksi, $sql);
                      while ($row = mysqli_fetch_array($query)) {
                        $jumlah = $row['COUNT(id_jual)'];
                      }
                    }
                      ?>
                      <div class="row mb-0">
                        <div class="col-5">
                          <h6>Total Seluruhnya</h6>
                          <input readonly type="number" name="totalAll" class="form-control form-control-sm text-start" value="<?= $totalAll; ?>">
                        </div>
                        <div class="col-5">
                          <h6>Pembayaran</h6>
                          <input autocomplete="off" type="number" name="pembayaran" class="form-control form-control-sm text-start" placeholder="MASUKKAN NOMINAL UANG">
                          <div class=" mt-1"><small class="text-danger">*pastikan sudah klik tombol <button type="button" class="btn btn-sm btn-outline-warning"><i class=" fa-solid fa-arrows-rotate"></i></button> setelah mengubah jumlah</small>
                          </div>
                        </div>
                        <div class="col mt-4">
                          <input name="count" type="hidden" value="<?= $jumlah; ?>">
                          <button type="submit" class="btn btn-success"><i class="fa-solid fa-hand-holding-dollar"></i> bayar</button>
                        </div>
                      </div>
                      </form>
                      <div class="row mb-4">
                        <div class="col-5">
                          <?php
                          $data = mysqli_query($db->koneksi, "SELECT * FROM kasir ORDER BY id_kasir DESC LIMIT 1");
                          $row = mysqli_fetch_array($data);
                          $kembalian = $row['kembalian'];
                          ?>
                          <h6>Kembalian</h6>
                          <input value="<?= $kembalian; ?>" readonly type="number" name="kembali" class="form-control form-control-sm text-start">
                        </div>
                        <div class="col-7">
                          <h6>Bukti Pembayaran</h6>
                          <?php if ($setelah > -1) : ?>
                            <a href="nota.php" target="_blank" type="submit" class="btn btn-sm btn-warning ms-1 ps-3 pe-3"><i class="fa-solid fa-print"></i> Cetak Nota</a>
                          <?php endif; ?>
                        </div>
                      </div>
                  </div>

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
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>