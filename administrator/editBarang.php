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
$id = $_GET['id'];
$barang = $db->tampilBarangById($id);
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
  <title>Edit Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../templates/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- my CSS -->
  <style>
    a {
      text-decoration: none;
    }

    body {
      background-image: url("../templates/img/bg.jpg");
    }
  </style>
</head>

<body class="sb-nav-fixed hijauNom">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <!-- Customisasi di dalam tag main! -->
      <main>
        <form action="prosesBarang.php?aksi=edit&&id" method="POST" enctype="multipart/form-data">
          <div class="container overflow-hidden">
            <div class="row gx-5">
              <div class="col-6 mt-2 pt-2">
                <div class="p-3">
                  <div class="card p-4 shadow-sm">

                    <table class="table table-hover">
                      <tbody>
                        <input name="id" type="hidden" value="<?= $barang['id']; ?>">
                        <input name="fotoLama" type="hidden" value="<?= $barang['foto']; ?>">
                        <tr>
                          <td>
                            <h6>Kategori Barang</h6>
                          </td>
                          <td>
                            <select name="kategori" class="form-select">
                              <option value="<?= $barang["id_kategori"]; ?>"><?= $barang["nm_kategori"]; ?></option>
                              <?php foreach ($dataKategori as $row) { ?>
                                <option value="<?= "$row[id_kategori]" ?>"><?= $row['nm_kategori']; ?></option>
                              <?php } ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Nama Barang</h6>
                          </td>
                          <td><input type="text" required class="form-control" name="nm_barang" value="<?= $barang['nm_barang']; ?>"></td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Merk</h6>
                          </td>
                          <td><input type="text" required class="form-control" name="merk" value="<?= $barang['merk']; ?>"></td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Harga Beli</h6>
                          </td>
                          <td><input type="number" required class="form-control" name="hrg_beli" value="<?= $barang['hrg_beli']; ?>"></td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Harga Jual</h6>
                          </td>
                          <td><input type="number" required class="form-control" name="hrg_jual" value="<?= $barang['hrg_jual']; ?>"></td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Satuan</h6>
                          </td>
                          <td>
                            <select name="satuan" class="form-select">
                              <option value="<?= $barang["id_satuan"]; ?>"><?= $barang["nm_satuan"]; ?></option>
                              <?php foreach ($dataSatuan as $row) { ?>
                                <option value="<?= "$row[id_satuan]" ?>"><?= $row['nm_satuan']; ?></option>
                              <?php } ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Stok</h6>
                          </td>
                          <td>
                            <input type="text" required class="form-control" name="stok" value="<?= $barang['stok']; ?> ">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Tanggal Input</h6>
                          </td>
                          <td><input readonly type="text" required class="form-control" name="tgl_masuk" value="<?= $barang['tgl_masuk']; ?>"></td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Tanggal Edit</h6>
                          </td>
                          <td>
                            <input required type="date" class="form-control" name="tgl_edit" value="<?= date('Y-m-d'); ?>">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="row">
                      <div class="vstack gap-2 col-md-5 mx-auto">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a class="btn btn-outline-primary" href="<?= "dataBarang.php"; ?>">Kembali</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 mt-5 pt-5">
                <div class="card ms-5 p-2 shadow-sm" style="width: 18rem;">
                  <img src="../img/barang/<?= $barang['foto']; ?>" class="card-img-top" alt="foto barang">
                  <div class="card-body">
                    <h4 class="card-text text-center"><input type="file" class="form-control" name="foto"></h4>
                    <small class="text-danger">*ukuran Foto harus 1:1 atau berbentuk persegi</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
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