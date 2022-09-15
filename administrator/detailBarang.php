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
$detail = $db->tampilBarangById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Detail Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../templates/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- my CSS -->
  <style>
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
          <div class="row gx-5">
            <div class="col-6 mt-2 pt-2">
              <div class="p-3">
                <div class="card p-4 shadow-sm">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td>
                          <h6>ID Barang</h6>
                        </td>
                        <td><?= $detail['id']; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Kategori Barang</h6>
                        </td>
                        <td><?= $detail['nm_kategori']; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Nama Barang</h6>
                        </td>
                        <td><?= $detail['nm_barang']; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Merk</h6>
                        </td>
                        <td><?= $detail['merk']; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Harga Beli</h6>
                        </td>
                        <td><?= 'Rp. ' . number_format($detail['hrg_beli']); ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Harga Jual</h6>
                        </td>
                        <td><?= 'Rp. ' . number_format($detail['hrg_jual']); ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Satuan</h6>
                        </td>
                        <td><?= $detail['nm_satuan']; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Stok</h6>
                        </td>
                        <td><?= $detail['stok']; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Tanggal Input</h6>
                        </td>
                        <td><?= $db->tgl_indo(date($detail['tgl_masuk'])); ?></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Tanggal Edit</h6>
                        </td>
                        <td><?= $db->tgl_indo(date($detail['tgl_edit'])); ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <h6><a href="dataBarang.php"><button type="button" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Kembali</button></a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 mt-2 pt-5">
              <div class="ms-5 ps-5">
                <div class="card p-2 shadow-sm" style="width: 25rem;">
                  <img src="../img/barang/<?= $detail['foto']; ?>" class="img-fluid card-img-top" alt="foto barang">
                  <div class="card-body">
                    <h4 class="card-text text-center">Foto Barang</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../templates/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="../templates/assets/demo/chart-area-demo.js"></script>
  <script src="../templates/assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="../templates/js/datatables-simple-demo.js"></script>
</body>

</html>