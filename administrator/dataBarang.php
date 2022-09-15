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
  <title>Data Produk</title>
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
        <div class="container overflow-hidden">

          <h1 class="mt-4 mb-5 display-5"><i class="fa-solid fa-boxes-stacked text-secondary"></i> Data Produk</h1>
          <div class="card shadow-sm p-3">
            <div class="row mt-4 ">
              <div class="col-4 form-group ms-3">
                <form action="dataBarang.php" method="POST">
                  <div class="input-group">
                    <input autocomplete="off" autofocus name="cari" type="text" class="form-control" placeholder="Cari barang">
                    <button value="cari" class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
                </form>
              </div>
              <div class="col">
                <div class="d-grid gap-2 d-md-flex me-3 justify-content-md-end">
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#tambahDataBarang"><i class="fa-solid fa-plus"></i>Tambah Data</button>
                </div>
              </div>
            </div>
            <!-- akan muncul bila stok barang telah habis -->
            <?php
            $ambilStok = $db->ambilStok();

            while ($stok = mysqli_fetch_array($ambilStok)) {
              $barang = $stok['nm_barang'];
            ?>
              <div class="alert alert-warning alert-dismissible fade show mx-3 shadow" role="alert">
                <strong>Perhatian!</strong> Stok <?= $barang; ?> hampir/telah habis.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>
            <div class="card border-0 p-1 shadow">
              <div class="card-body table-responsive border-0">
                <table class="table table-hover table-border-0">
                  <thead class="table text-center">
                    <tr>
                      <th>No.</th>
                      <th>Kode Produk</th>
                      <th>Kategori</th>
                      <th>Nama Produk</th>
                      <th>Merk</th>
                      <th>Stok</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                      <th>Satuan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    if (empty($dataBarang)) {
                      echo "<tr><td colspan='10' class='text-center'>Tidak ada data</td></tr>";
                    }
                    $no = 1;
                    foreach ($dataBarang as $row) {
                    ?>
                      <tr>
                        <th class="text-center"><?= $no++; ?></th>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['nm_kategori']; ?></td>
                        <td><?= $row['nm_barang']; ?></td>
                        <td><?= $row['merk']; ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td><?= 'Rp. ' . number_format($row['hrg_beli']); ?></td>
                        <td><?= 'Rp. ' . number_format($row['hrg_jual']); ?></td>
                        <td><?= $row['nm_satuan']; ?></td>
                        <td class="text-center">
                          <a href="<?= "prosesBarang.php?&&aksi=detail&&id=$row[id]"; ?>" class="badge bg-primary text-light"><i class="fa-solid fa-circle-info"></i></a>&nbsp;<a href="<?= "editBarang.php?aksi=edit&&id=$row[id]"; ?>" class="badge bg-warning text-light"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;<a href="<?= "prosesBarang.php?aksi=hapus&&id=$row[id]"; ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="badge bg-danger text-light btn-hapus"><i class="fa-solid fa-trash"></i></a>
                        </td>
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

  <!-- Tambah data barang -->
  <?php

  $dataKategori = $db->tampilKategori();
  $dataSatuan = $db->tampilSatuan();

  ?>
  <!-- Modal -->
  <div class="modal fade" id="tambahDataBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah data produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="prosesBarang.php?aksi=tambah" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

              <table class="table ">
                <tr>
                  <td>Kategori</td>
                  <td>
                    <select name="kategori" class="form-select" required>
                      <option disabled selected hidden>Pilih Kategori</option>
                      <?php
                      foreach ($dataKategori as $row) { ?>
                        <option value="<?= "$row[id_kategori]"; ?>"><?= "$row[nm_kategori]"; ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td><input type="text" placeholder="Nama Produk" required class="form-control" name="nama"></td>
                </tr>
                <tr>
                  <td>Merk Produk</td>
                  <td><input type="text" placeholder="Merk Produk" required class="form-control" name="merk"></td>
                </tr>
                <tr>
                  <td>Harga Beli</td>
                  <td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
                </tr>
                <tr>
                  <td>Harga Jual</td>
                  <td><input type="number" placeholder="Harga Jual" required class="form-control" name="jual"></td>
                </tr>
                <tr>
                  <td>Satuan Barang</td>
                  <td>
                    <select name="satuan" class="form-select" required>
                      <option disabled selected hidden>Pilih Satuan</option>
                      <?php
                      foreach ($dataSatuan as $row) { ?>
                        <option value="<?= "$row[id_satuan]"; ?>"><?= "$row[nm_satuan]"; ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Stok</td>
                  <td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
                </tr>
                <tr>
                  <td>Tanggal Input</td>
                  <td><input type="date" required class="form-control" value="<?= date('Y-m-d') ?>" name="tgl_masuk"></td>
                </tr>
                <input type="hidden" class="form-control" value="" name="tgl_edit">
                <tr>
                  <td>Foto Produk</td>
                  <td>
                    <input type="file" required class="form-control" name="foto">
                    <small class="text-danger">*ukuran Foto harus 1:1 atau berbentuk persegi</small>
                  </td>

                </tr>
              </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Produk</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- Akhir tambah data barang -->
  <script src="../sweet/sweetalert2.all.min.js"></script>
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