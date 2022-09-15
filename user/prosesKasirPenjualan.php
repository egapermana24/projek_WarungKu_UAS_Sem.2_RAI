<?php

use function PHPSTORM_META\elementType;

include "database.php";
$db = new database();



$aksi = $_GET['aksi'];
if ($aksi == "keranjang") {
  $barang = $db->tampilBarangById($_GET['id']);
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $profil = $_GET['idProf'];
    $jumlah = $_GET['jumlah'];
    $tgl = date('Y-m-d');
    $total = $jumlah * $barang['hrg_jual'];

    $q = mysqli_query($db->koneksi, "SELECT * FROM penjualan WHERE idBarang = '$id'");
    $cek = mysqli_num_rows($q);
    if ($cek > 0) {
      $q = mysqli_query($db->koneksi, "UPDATE penjualan SET jumlah = jumlah + '$jumlah', total = total + '$total' WHERE idBarang = '$id'");
      header("location:dataPenjualan.php");
    } else {
      $db->inputPenjualan($id, $profil, $jumlah, $total, $tgl);
      header("location:dataPenjualan.php");
    }
  }
} elseif ($aksi == "edit") {
  $harga = $_POST['harga'];
  $total = $_POST['jumlah'] * $harga;
  if (isset($_GET['id'])) {
    $stok = $_POST['stok'];
    $db->updateKasir($_POST['id_jual'], $_POST['idBarang'], $_POST['jumlah'], $total, $stok);
    header("location:dataPenjualan.php");
  }
} elseif ($aksi == "hapus") {
  $db->hapusKasir($_GET['id']);
  header("location:dataPenjualan.php");
} elseif ($aksi == "hapusAll") {
  $db->hapusKasirAll();
  header("location:dataPenjualan.php");
} elseif ($aksi == "bayar") {
  $hrg_beli = $_POST['hrg_beli'];
  $id_Barang = $_POST['id_Barang'];
  $count = $_POST['count'];
  $jum = count($id_Barang);
  $id_Profil = $_POST['id_Profil'];
  $stok = $_POST['stok'];
  $total = $_POST['total'];
  $jumlah = $_POST['jumlah'];
  $nm_barang = $_POST['nm_barang'];
  for ($i = 0; $i < $count; $i++) {
    $stokDipakai = $stok[$i] - $jumlah[$i];
    $pembayaran = (int)$_POST['pembayaran'];
    $totalAll = (int)$_POST['totalAll'];
    $tanggal_input = date('Y-m-d');
    if ($pembayaran == 0 or $pembayaran == '') {
      echo "<script>alert('Masukkan jumlah uang pembayaran');
          document.location = 'dataPenjualan.php'
          </script>";
    } elseif ($pembayaran < $totalAll) {
      $kurang = $totalAll - $pembayaran;
      $krng = number_format($kurang);
      echo "<script>alert('Uang yang dimasukkan kurang Rp. $krng');
            document.location = 'dataPenjualan.php'
            </script>";
    } elseif ($pembayaran > 0) {
      if ($jumlah[$i] <= $stok[$i]) {
        $query = mysqli_query($db->koneksi, "SELECT * FROM penjualan ORDER BY id_jual DESC LIMIT 1");
        $row = mysqli_fetch_array($query);
        $id_jual = $row['id_jual'];
        $kembalian = $pembayaran - $totalAll;


        $stokSisa = $stok[$i] - $jumlah[$i];

        // input ke tabel kasir
        mysqli_query($db->koneksi, "INSERT INTO kasir VALUES ('', '$id_jual', '$pembayaran', '$totalAll', '$kembalian')");

        $ini = mysqli_query($db->koneksi, "SELECT * FROM kasir ORDER BY id_kasir DESC LIMIT 1");
        $row = mysqli_fetch_array($ini);
        $id_Kasir = $row['id_kasir'];

        // input ke tabel struk
        mysqli_query($db->koneksi, "INSERT INTO struk VALUES ('','$id_Barang[$i]', '$id_Profil[$i]', '$id_Kasir', '$jumlah[$i]', '$total[$i]', '$tanggal_input')");

        // input ke tabel lapPenjualan
        $modal[$i] = $hrg_beli[$i] * $jumlah[$i];

        mysqli_query($db->koneksi, "INSERT INTO lappenjualan VALUES ('','$id_Barang[$i]', '$jumlah[$i]', $modal[$i], '$total[$i]', '$id_Profil[$i]', '$tanggal_input')");

        // update stok barang
        mysqli_query($db->koneksi, "UPDATE barang SET stok = '$stokSisa' WHERE id = '$id_Barang[$i]'");

        echo "<script>alert('Pembayaran berhasil');
              document.location = 'dataPenjualan.php'
              </script>";
      } else {
        echo "<script>alert('Stok $nm_barang[$i] tidak mencukupi');
        document.location = 'dataPenjualan.php'
        </script>";
      }
      echo "<script>alert('gagal');
            document.location = 'dataPenjualan.php'
            </script>";
    } else {
      echo "Database Error, Silahkan Proses Kembali <a href='dataPenjualan.php'>Klik Disini</a>";
    }
  }
}
