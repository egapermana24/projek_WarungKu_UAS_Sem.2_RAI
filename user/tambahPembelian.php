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
$dataBarang = $db->tampilBarang();
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
  <title>Tambah Pembelian</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../templates/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- my CSS -->
  <style>
    a {
      text-decoration: none;
    }

    body {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body class="sb-nav-fixed hijauNom">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <!-- Customisasi di dalam tag main! -->
      <main>
        <form class="needs-validation" action="prosesPembelian.php?aksi=tambah" method="POST">
          <div class="container overflow-hidden">
            <div class="row">
              <div class="col-6 mt-2 pt-2 mx-auto">
                <div class="p-3">
                  <div class="card p-4 shadow-sm">

                    <table class="table table-hover">
                      <tbody>
                        <input name="id" type="hidden" value="<?= $barang['id']; ?>">
                        <tr>
                          <td>
                            <h6>No Referensi</h6>
                          </td>
                          <td><input type="text" required class="form-control" name="no_ref"></td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Kode Produk</h6>
                          </td>
                          <td>
                            <select class="form-select" required name="id_Brg" id="id_barang" class="form-control" onchange="changeValue(this.value)">
                              <option value="0" hidden disabled selected>Pilih Kode Produk</option>
                              <?php
                              $jsArray = "var prdName = new Array();\n";
                              foreach ($dataBarang as $row) { ?>
                                <option value="<?= "$row[id]" ?>"><?= $row['id']; ?> [<?= $row['nm_barang']; ?>]</option>
                              <?php
                                $jsArray .= "prdName['" . $row['id'] . "']= {
                                    nm_barang : '" . addslashes($row['nm_barang']) . "',
                                    hrg_beli : '" . addslashes('Rp. ' . number_format($row['hrg_beli'])) . "',
                                    stok : '" . addslashes($row['stok']) . "',
                                    merk : '" . addslashes($row['merk']) . "'
                        };\n";
                              } ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Nama Produk</h6>
                          </td>
                          <td><input readonly id="nm_barang" type="text" required class="form-control" name="nm_barang">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Stok</h6>
                          </td>
                          <td><input readonly id="stok" type="text" required class="form-control" name="stok">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Harga Beli</h6>
                          </td>
                          <td><input readonly id="hrg_beli" type="text" required class="form-control" name="hrg_beli">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Merk</h6>
                          </td>
                          <td><input readonly id="merk" type="text" required class="form-control" name="merk">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Jumlah Pembelian</h6>
                          </td>
                          <td>
                            <input type="number" required class="form-control" name="jumlah">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Penerima</h6>
                          </td>
                          <td><input type="text" required class="form-control" name="penerima" value="<?= $_SESSION['nama']; ?>">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Tanggal Masuk</h6>
                          </td>
                          <td>
                            <input required type=" date" class="form-control" name="tgl_masuk" value="<?= date('Y-m-d'); ?>">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="row">
                      <div class="vstack gap-2 col-md-5 mx-auto">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-outline-danger">Reset</button>
                      </div>
                    </div>
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
  <script type="text/javascript">
    <?= $jsArray; ?>

    function changeValue(x) {
      document.getElementById('nm_barang').value = prdName[x].nm_barang;
      document.getElementById('hrg_beli').value = prdName[x].hrg_beli;
      document.getElementById('stok').value = prdName[x].stok;
      document.getElementById('merk').value = prdName[x].merk;
    }
  </script>
</body>

</html>