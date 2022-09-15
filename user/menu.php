<?php
// agar tidak error disaat tidak ada data di database
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// untuk logout
session_start();
include 'database.php';
$db = new database();
$id = $_SESSION['id'];
$data = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
  echo "<script language = 'Javascript'>
    confirm('Anda Harus Login Kembali!');
    document.location='../index.php';
    </script>";
}
?>
<style>
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
<!-- topbar -->
<nav class="sb-topnav navbar navbar-expand navbar-dark hijauTua">
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ms-2" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  <!-- Navbar Brand-->
  <a class="navbar-brand ps-3" href="index.php"><i class="fa-solid fa-store"></i> WarungKu</a>
  <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-2 my-2 my-md-0">
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <a href="dataUser.php">
        <img src="../img/profil/<?= $_SESSION['foto']; ?>" alt="foto" class="nav nav-item rounded-circle" width="40">
      </a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['nama']; ?> | <?= $_SESSION['level']; ?></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="dataUser.php">Profil</a></li>
          <!-- <li><a class="dropdown-item" href="userAdmin.php">Pengaturan User</a></li> -->
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" onclick="javascript: return confirm('Apakah Anda yakin ingin keluar dari sistem?')" href="<?= "../prosesLogin.php?aksi=logout"; ?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<!-- sidebar -->
<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-light shadow" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading hijauText">Menu</div>
          <a class="nav-link hijauText" href="index.php" style="color: #426755;">
            <div class="sb-nav-link-icon hijauText"><i class="fa-solid fa-fw fa-house"></i></div>
            Beranda
          </a>
          <!--<a class="nav-link collapsed hijauText" style="color: #426755;" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon hijauText"><i class="fa-solid fa-fw fa-bars-progress"></i></div>
            Pengelolaan
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link hijauText" style="color: #426755;" href="dataBarang.php">Produk</a>
              <a class="nav-link hijauText" style="color: #426755;" href="dataKategori.php">Kategori & Satuan</a>
            </nav>
          </div> -->
          <a class="nav-link collapsed hijauText" style="color: #426755;" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon hijauText"><i class="fa-solid fa-fw fa-file-lines"></i></div>
            Laporan
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link hijauText" style="color: #426755;" href="lapPenjualan.php">
                Penjualan
              </a>
              <a class="nav-link hijauText" style="color: #426755;" href="lapPembelian.php">
                Pembelian
              </a>
            </nav>
          </div>
          <a class="nav-link hijauText" style="color: #426755;" href="dataPenjualan.php">
            <div class="sb-nav-link-icon hijauText"><i class="fa-solid fa-fw fa-cart-shopping"></i></div>
            Kasir
          </a>
          <a class="nav-link hijauText" style="color: #426755;" href="dataUser.php">
            <div class="sb-nav-link-icon hijauText"><i class="fa-regular fa-fw fa-user"></i></div>
            Profil
          </a>
          <div class="sb-sidenav-menu-heading hijauText">Lainnya</div>
          <!-- <a class="nav-link hijauText" style="color: #426755;" href="userAdmin.php">
            <div class="sb-nav-link-icon hijauText"><i class="fa-solid fa-fw fa-gear"></i></div>
            Pengaturan User
          </a> -->
          <a class="nav-link hijauText" style="color: #426755;" onclick="javascript: return confirm('Apakah Anda yakin ingin keluar dari sistem?')" href="<?= "../prosesLogin.php?aksi=logout"; ?>">
            <div class="sb-nav-link-icon hijauText"><i class="fa-solid fa-fw fa-arrow-right-from-bracket"></i></div>
            Logout
          </a>
        </div>
      </div>
    </nav>
  </div>
</div>