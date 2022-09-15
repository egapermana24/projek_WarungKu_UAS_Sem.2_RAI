<?php
include "database.php";
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
  $db->inputSatuan($_POST['nama'], $_POST['tgl_input']);
  echo "
        <script language = 'Javascript'>
            alert('Data Berhasil Ditambahkan');
            document.location = 'dataKategori.php';
        </script>";
} elseif ($aksi == "hapus") {
  $db->hapusSatuan($_GET['id']);
  echo "
        <script language = 'Javascript'>
            alert('Data Berhasil Dihapus');
            document.location = 'dataKategori.php';
        </script>";
} elseif ($aksi == "edit") {
  header("location:dataKategori.php?aksi=editan&&id=" . $_GET['id']);
} elseif ($aksi == "ubah") {
  $db->updateSatuan($_POST['id'], $_POST['nm_satuan']);
  header("location:dataKategori.php");
} else {
  echo "Database Error, Silahkan Proses Kembali <a href='dataKategori.php'>Klik Disini</a>";
}
