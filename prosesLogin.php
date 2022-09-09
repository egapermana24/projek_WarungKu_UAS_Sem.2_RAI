<?php
include "administrator/database.php";
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "login") {
  $db->login($_POST['username'], $_POST['password']);
} else if ($aksi == "logout") {
  session_start();
  $_SESSION['username'] = "";
  unset($_SESSION['username']);
  session_unset();
  session_destroy();
  echo "<script language = 'JavaScript'>
    alert('Anda Telah Keluar Dari Sistem!');
    document.location='index.php';
    </script>";
} else {
  echo "Database Anda Error silahkan kembali lagi <a href='index.php'>Klik Disini</a>";
}
