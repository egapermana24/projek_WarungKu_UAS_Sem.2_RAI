<?php
include "database.php";
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
  $db->inputKategori($_POST['nama'], $_POST['tgl_input']);
} elseif ($aksi == "hapus") {
  $db->hapusKategori($_GET['id']);
} elseif ($aksi == "edit") {
  header("location:dataKategori.php?aksi=edit&&id=" . $_GET['id']);
} elseif ($aksi == "ubah") {
  $db->updateKategori($_POST['id'], $_POST['nm_kategori']);
  header("location:dataKategori.php");
} else {
  echo "Database Error, Silahkan Proses Kembali <a href='data_distributor.php'>Klik Disini</a>";
}
