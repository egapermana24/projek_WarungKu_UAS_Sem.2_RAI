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
$date = $db->tgl_indo(date($_SESSION['tanggal_lahir']));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Data User</title>
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
          <div class="row gx-5 text-center mt-3">
            <h1 class="mt-1 mb-4 display-5">Profil <?= $_SESSION['level']; ?></h1>
            <div class="col-4 mt-2 ms-4">
              <div class="p-3 text-center mt-5">
                <img src="../img/profil/<?= $_SESSION['foto']; ?>" alt="foto" class="rounded-circle mb-4 shadow-sm img-thumbnail" width="205">
                <h3><?= $_SESSION['nama']; ?></h3>
                <h5>(<?= $_SESSION['nik']; ?>)</h5>
              </div>
            </div>
            <div class="col-7 mt-5 me-4">
              <div class="p-3">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td>
                        <h6>Email</h6>
                      </td>
                      <td>:</td>
                      <td><?= $_SESSION['email']; ?></td>
                    </tr>
                    <tr>
                      <td>
                        <h6>No. Telephone</h6>
                      </td>
                      <td>:</td>
                      <td><?= $_SESSION['noHp']; ?></td>
                    </tr>
                    <tr>
                      <td>
                        <h6>Tempat, Tanggal lahir</h6>
                      </td>
                      <td>:</td>
                      <td><?= $_SESSION['tempat_lahir']; ?>, <?= $date; ?></td>
                    </tr>
                    <tr>
                      <td>
                        <h6>Umur</h6>
                      </td>
                      <td>:</td>
                      <td><?= $_SESSION['umur']; ?> Tahun</td>
                    </tr>
                    <tr>
                      <td>
                        <h6>Jenis Kelamin</h6>
                      </td>
                      <td>:</td>
                      <td><?= $_SESSION['jns_kelamin']; ?></td>
                    </tr>
                    <tr>
                      <td>
                        <h6>Status</h6>
                      </td>
                      <td>:</td>
                      <td><?= $_SESSION['status']; ?></td>
                    </tr>
                    <tr>
                      <td>
                        <h6>Alamat</h6>
                      </td>
                      <td>:</td>
                      <td><?= $_SESSION['alamat']; ?></td>
                    </tr>
                    <tr>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-2 mx-auto">
              <a href="<?= "editUser.php?aksi?edit&&id=$_SESSION[id_profil]"; ?>" class="btn btn-outline-primary ms-4"><i class="fa-solid fa-pen-to-square"></i> edit profil</a>
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
</body>

</html>