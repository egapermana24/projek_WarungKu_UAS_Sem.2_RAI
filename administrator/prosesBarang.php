<?php
include "database.php";
$db = new database();

$aksi = $_GET['aksi'];
// PROSES TAMBAH DATA BARANG
if ($aksi == "tambah") {
  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // cek apakah tidak ada gambar yang di upload
  if ($error === 4) {
    echo "  <script>
                      alert('pilih gambar terlebih dahulu!');
                      document.location = 'dataBarang.php';
                  </script>";
    return false;
  }

  // cek apakah yang di upload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "  <script>
                      alert('yang anda upload bukan gambar!');
                      document.location = 'dataBarang.php';
                  </script>";
    return false;
  }

  // lolos pengecekan, gambar siap di upload
  // generate nama gambar baru
  $foto_baru = uniqid();
  $foto_baru .= '.';
  $foto_baru .= $ekstensiGambar;

  move_uploaded_file($tmpName, '../img/barang/' . $foto_baru);

  $db->inputBarang($_POST['kategori'], $_POST['nama'], $_POST['merk'], $_POST['beli'], $_POST['jual'], $_POST['satuan'], $_POST['stok'], $_POST['tgl_masuk'], $_POST['tgl_edit'], $foto_baru);
  echo "
        <script language = 'Javascript'>
            alert('Data Berhasil Ditambahkan');
            document.location = 'dataBarang.php';
        </script>";
  // PROSES HAPUS DATA BARANG
} elseif ($aksi == "hapus") {
  $db->hapusBarang($_GET['id']);
  echo "
        <script language = 'Javascript'>
            alert('Data Berhasil Dihapus');
            document.location = 'dataBarang.php';
        </script>";
  // PROSES DETAIL
} elseif ($aksi == 'detail') {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    header("location:detailBarang.php?id=$id");
  }
  // PROSES EDIT
} elseif ($aksi == 'edit') {
  if (isset($_GET['id'])) {
    if ($_FILES['foto']['error'] === 4) {
      $foto_baru = $_POST['fotoLama'];
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      $db->editBarang($_POST['id'], $_POST['kategori'], $_POST['nm_barang'], $_POST['merk'], $_POST['hrg_beli'], $_POST['hrg_jual'], $_POST['satuan'], $_POST['stok'],  $_POST['tgl_masuk'], $_POST['tgl_edit'], $foto_baru);
      echo "
      <script language = 'Javascript'>
          alert('Data Berhasil di Edit');
          document.location = 'dataBarang.php';
      </script>";
    } else {
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
                      document.location = 'dataBarang.php';
                  </script>";
        return false;
      }
      // lolos pengecekan, gambar siap di upload
      // generate nama gambar baru
      $foto_baru = uniqid();
      $foto_baru .= '.';
      $foto_baru .= $ekstensiGambar;

      move_uploaded_file($tmpName, '../img/barang/' . $foto_baru);

      $db->editBarang($_POST['id'], $_POST['kategori'], $_POST['nm_barang'], $_POST['merk'], $_POST['hrg_beli'], $_POST['hrg_jual'], $_POST['satuan'], $_POST['stok'], $_POST['tgl_masuk'], $_POST['tgl_edit'], $foto_baru);
      echo "
    <script language = 'Javascript'>
        alert('Data Berhasil di Edit');
        document.location = 'dataBarang.php';
    </script>";
    }
  } else {
    echo "Database Error, Silahkan Proses Kembali <a href='dataBarang.php'>Klik Disini</a>";
  }
}
