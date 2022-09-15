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
// JAM Sambutan

//ubah timezone menjadi jakarta
date_default_timezone_set("Asia/Jakarta");

//ambil jam dan menit
$jam = date('H:i');

//atur salam menggunakan IF
if ($jam > '05:30' && $jam <= '10:00') {
  $salam = 'Pagi';
} elseif ($jam >= '10:00' && $jam <= '15:00') {
  $salam = 'Siang';
} elseif ($jam >= '15:00' && $jam <= '18:00') {
  $salam = 'Sore';
} else {
  $salam = 'Malam';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard</title>
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
  <link rel="stylesheet" href="style.css">
</head>

<body class="sb-nav-fixed hijauNom">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <!-- Customisasi di dalam tag main! -->
      <main>
        <div class="container overflow-hidden">
          <h1 class="mt-4 mb-4 ms-3 display-5"> Dashboard</h1>
          <div class="row mb-2 mx-3">
            <div class="alert alert-white shadow opacity-75 " role="alert">
              <h4 class="alert-heading animasi-teks">Halo, <?= $_SESSION['nama']; ?> Selamat <?= $salam; ?>!</h4>
              <p>Selalu bahagia dan tetap semangat dalam menjalani hari.</p>
              <hr>
              <p class="mb-0"><?= $db->tgl_indo(date('Y-m-d')); ?></p>
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
  <!-- agar saat mereload halaman tidak memunculkan resubmition form -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>