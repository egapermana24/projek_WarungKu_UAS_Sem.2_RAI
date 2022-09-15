<?php
include "database.php";
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
  $dataBarang = $db->tampilBarangById($_POST['id_Brg']);

  $total = $_POST['jumlah'] * $dataBarang['hrg_beli'];
  $tambah_stok = (int)$_POST['stok'] + (int)$_POST['jumlah'];

  $db->inputPembelian($_POST['no_ref'], $_POST['id_Brg'], $_POST['jumlah'], $total, $_POST['penerima'], $_POST['tgl_masuk'], $tambah_stok);

  echo "
        <script language = 'Javascript'>
            alert('Produk berhasil ditambahkan');
            document.location = 'lapPembelian.php';
        </script>";
}
