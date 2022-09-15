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
$data = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Edit Profil</title>
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
        <form action="prosesEditUser.php?aksi=edit" method="POST" enctype="multipart/form-data">
          <div class="container overflow-hidden">
            <div class="row gx-5 text-center mt-3">
              <h1 class="mt-1 mb-4 display-5">Edit Profil <?= $_SESSION['level']; ?></h1>
              <div class="col-4 mt-2 ms-5">
                <div class="p-3 text-center mt-5">
                  <img src="../img/profil/<?= $_SESSION['foto']; ?>" alt="foto" class="rounded-circle shadow-sm mx-auto" width="200">
                  <div class="col px-0 mx-5 px-1">
                    <input class="form-control form-control-sm mb-4" name="foto" type="file">
                    <input class="form-control form-control-sm mb-4" name="fotoLama" type="hidden" value="<?= $_SESSION['foto']; ?>">
                  </div>
                  <input type="hidden" name="id_profil" value="<?= $_SESSION['id_profil']; ?>">
                  <input type="hidden" name="id_login" value="<?= $_SESSION['id_login']; ?>">
                  <table class="table">
                    <tr>
                      <td>
                        <h6>Nama</h6>
                      </td>
                      <td>:</td>
                      <td><input class="form-control" name="nama" type="text" value="<?= $_SESSION['nama']; ?>"></td>
                    </tr>
                    <tr>
                      <td>
                        <h6>Nik</h6>
                      </td>
                      <td>:</td>
                      <td><input class="form-control" name="nik" type="number" value="<?= $_SESSION['nik']; ?>"></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="col-7 mt-5">
                <div class="p-3">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td>
                          <h6>Email</h6>
                        </td>
                        <td>:</td>
                        <td><input class="form-control" name="email" type="email" value="<?= $_SESSION['email']; ?>"></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>No. Telephone</h6>
                        </td>
                        <td>:</td>
                        <td><input class="form-control" name="noHp" type="text" value="<?= $_SESSION['noHp']; ?>"></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Tmpt, tgl lahir</h6>
                        </td>
                        <td>:</td>
                        <td class="input-group">
                          <input name="tempat_lahir" class="form-control" type="text" value="<?= $_SESSION['tempat_lahir']; ?>">
                          <input name="tanggal_lahir" class="form-control" type="date" value="<?= $_SESSION['tanggal_lahir']; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Umur</h6>
                        </td>
                        <td>:</td>
                        <td><input class="form-control" name="umur" type="text" value="<?= $_SESSION['umur']; ?>"></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Jenis Kelamin</h6>
                        </td>
                        <td>:</td>
                        <td><select name="jns_kelamin" class="form-select">
                            <option selected hidden value="<?= $_SESSION['jns_kelamin']; ?>"><?= $_SESSION['jns_kelamin']; ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Status</h6>
                        </td>
                        <td>:</td>
                        <td><select name="status" class="form-select">
                            <option selected hidden value="<?= $_SESSION['status']; ?>"><?= $_SESSION['status']; ?></option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                          </select></td>
                      </tr>
                      <tr>
                        <td>
                          <h6>Alamat</h6>
                        </td>
                        <td>:</td>
                        <td><textarea class="form-control" name="alamat" type="text" value="<?= $_SESSION['alamat']; ?>"><?= $_SESSION['alamat']; ?></textarea></td>
                      </tr>
                      <tr>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row mb-4 mx-5 px-5">
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="dataUser.php" class="btn btn-outline-primary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </div>
          </div>
        </form>
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
</body>

</html>