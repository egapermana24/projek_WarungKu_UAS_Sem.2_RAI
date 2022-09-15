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
$dataKategori = $db->tampilKategori();
$dataSatuan = $db->tampilSatuan();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Data Kategori & Satuan</title>
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
        <!-- Data Kategori -->
        <div class="container overflow-hidden">
          <div class="row">
            <div class="col">
              <h1 class="mt-4 mb-5 ms-3 display-5"><i class="fa-solid fa-object-group text-secondary"></i> Kategori Produk</h1>
              <form action="<?= "prosesKategori.php?aksi=ubah"; ?>" method="POST">
                <div class="d-grid gap-2 d-md-flex mb-1 me-3 justify-content-md-end">
                  <div class="input-group ms-3">
                    <?php
                    $aksi = $_GET['aksi'];
                    $id = $_GET['id'];
                    $row = $db->tampilKategoriById($id);
                    if ($aksi == "edit") {
                    ?>
                      <input name="id" type="hidden" value="<?= $row['id_kategori']; ?>">
                      <input name="nm_kategori" value="<?= $row['nm_kategori']; ?>" type="text" class="form-control form-control-sm">
                      <button class="btn btn-warning btn-sm text-light" type="submit"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    <?php
                    } else {
                      header("location:dataKategori.php");
                    } ?>
                  </div>
              </form>
              <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahDataKategori" type="button">Tambah</button>
            </div>
            <div class="card mb-4 border-0">
              <div class="card-body table-responsive">
                <table class="table table-hover shadow">
                  <thead class="table text-center">
                    <tr>
                      <th>No.</th>
                      <th>Kategori</th>
                      <th>Tanggal Input</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($dataKategori as $row) {
                    ?>
                      <tr>
                        <th><?= $no++; ?></th>
                        <td><?= $row['nm_kategori']; ?></td>
                        <td><?= $db->tgl_indo(date($row['tgl_input'])); ?></td>
                        <td>
                          <a href="<?= "prosesKategori.php?aksi=edit&&id=$row[id_kategori]"; ?>" class="badge bg-warning text-light"><i class="fa-solid fa-pen-to-square"></i></a>
                          <a href="<?= "prosesKategori.php?aksi=hapus&&id=$row[id_kategori]"; ?>" class="badge bg-danger text-light" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Akhir Data Kategori -->
          <!-- Data Satuan -->
          <div class="col">
            <h1 class="mt-4 mb-5 ms-3 display-5"><i class="fa-regular fa-clone text-secondary"></i> Satuan Produk</h1>
            <form action="<?= "prosesSatuan.php?aksi=ubah"; ?>" method="POST">
              <div class="d-grid gap-2 d-md-flex mb-1 me-3 justify-content-md-end">
                <div class="input-group ms-3">
                  <?php
                  $aksi = $_GET['aksi'];
                  $id = $_GET['id'];
                  $row = $db->tampilSatuanById($id);
                  if ($aksi == "editan") {
                  ?>
                    <input name="id" type="hidden" value="<?= $row['id_satuan']; ?>">
                    <input name="nm_satuan" value="<?= $row['nm_satuan']; ?>" type="text" class="form-control form-control-sm">
                    <button class="btn btn-warning btn-sm text-light" type="submit"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                  <?php
                  } else {
                    header("location:dataKategori.php");
                  } ?>
                </div>
            </form>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahDataSatuan" type="button">Tambah</button>
          </div>
          <div class="card mb-4 border-0">
            <div class="card-body table-responsive">
              <table class="table table-hover shadow">
                <thead class="table text-center">
                  <tr>
                    <th>No.</th>
                    <th>Satuan</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php
                  $no = 1;
                  foreach ($dataSatuan as $row) {
                  ?>
                    <tr>
                      <th><?= $no++; ?></th>
                      <td><?= $row['nm_satuan']; ?></td>
                      <td><?= $db->tgl_indo(date($row['tgl_input'])); ?></td>
                      <td>
                        <a href="<?= "prosesSatuan.php?aksi=edit&&id=$row[id_satuan]"; ?>" class="badge bg-warning text-light"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="<?= "prosesSatuan.php?aksi=hapus&&id=$row[id_satuan]"; ?>" class="badge bg-danger text-light" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Akhir Data Satuan -->
    </div>
  </div>
  </main>

  <!-- FOOTER -->
  <footer class="py-4 bg-light mt-auto">
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
  <!-- Akhir FOOTER -->
  <!-- Tambah data kategori -->
  <!-- Modal -->
  <div class="modal fade" id="tambahDataKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah data kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="prosesKategori.php?aksi=tambah" method="POST">
            <div class="modal-body">
              <table class="table ">
                <tr>
                  <td>Kategori</td>
                  <td><input type="text" required value="" class="form-control" name="nama"></td>
                </tr>
                <tr>
                  <td>Tanggal Input</td>
                  <td><input type="date" required class="form-control" value="<?= date("Y-m-d");; ?>" name="tgl_input"></td>
                </tr>
              </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kategori</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- Akhir tambah data kategori -->

  <!-- Tambah data satuan -->
  <!-- Modal -->
  <div class="modal fade" id="tambahDataSatuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah data satuan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="prosesSatuan.php?aksi=tambah" method="POST">
            <div class="modal-body">
              <table class="table ">
                <tr>
                  <td>Satuan</td>
                  <td><input type="text" required value="" class="form-control" name="nama"></td>
                </tr>
                <tr>
                  <td>Tanggal Input</td>
                  <td><input type="date" required class="form-control" value="<?= date("Y-m-d");; ?>" name="tgl_input"></td>
                </tr>
              </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Satuan</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- Akhir tambah data satuan -->

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