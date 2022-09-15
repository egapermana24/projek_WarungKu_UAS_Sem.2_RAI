<?php
include "database.php";
$db = new database();

$aksi = $_GET['aksi'];

if ($aksi == "edit") {
  if ($_FILES['foto']['error'] === 4) {
    $foto_baru = $_POST['fotoLama'];
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $db->editProfil($_POST['id_profil'], $_POST['id_login'], $_POST['nama'], $_POST['nik'], $_POST['email'], $_POST['noHp'], $_POST['tempat_lahir'], $_POST['tanggal_lahir'], $_POST['umur'], $_POST['jns_kelamin'], $_POST['status'], $_POST['alamat'], $foto_baru);
    echo "
    <script language = 'Javascript'>
        alert('Data Berhasil di Edit silahkan melakukan login ulang!');
        document.location = '../prosesLogin.php?aksi=logout';
    </script>";
  } else {
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $namaFile = $_FILES['foto']['name'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "  <script>
      alert('yang anda upload bukan gambar!');
      document.location = 'dataUser.php';
  </script>";
      return false;
    }
    // lolos pengecekan, gambar siap di upload
    // generate nama gambar baru
    $foto_baru = uniqid();
    $foto_baru .= '.';
    $foto_baru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/profil/' . $foto_baru);

    $db->editProfil($_POST['id_profil'], $_POST['id_login'], $_POST['nama'], $_POST['nik'], $_POST['email'], $_POST['noHp'], $_POST['tempat_lahir'], $_POST['tanggal_lahir'], $_POST['umur'], $_POST['jns_kelamin'], $_POST['status'], $_POST['alamat'], $foto_baru);
    echo "  <script language = 'Javascript'>
      alert('Data Berhasil di Edit silahkan melakukan login ulang!');
      document.location = '../prosesLogin.php?aksi=logout';
      </script>";
  }
} elseif ($aksi == "delete") {
  $db->hapusLogin($_GET['id']);
  echo "  <script language = 'Javascript'>
      alert('Data Berhasil di Hapus!');
      document.location = 'dataUser.php';
      </script>";
}
