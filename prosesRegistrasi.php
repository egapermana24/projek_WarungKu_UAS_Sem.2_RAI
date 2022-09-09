<?php
include "administrator/database.php";
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "profil") {
  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // cek apakah tidak ada gambar yang di upload
  if ($error === 4) {
    echo "  <script>
                      alert('pilih gambar terlebih dahulu!');
                      document.location = 'buatProfil.php';
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
                      document.location = 'buatProfil.php';
                  </script>";
    return false;
  }

  // lolos pengecekan, gambar siap di upload
  // generate nama gambar baru
  $foto_baru = uniqid();
  $foto_baru .= '.';
  $foto_baru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/profil/' . $foto_baru);

  $query = mysqli_query($db->koneksi, "SELECT * FROM login ORDER BY id_login DESC LIMIT 1");
  $row = mysqli_fetch_array($query);
  $id_login = $row['id_login'];

  $db->inputProfil($id_login, $_POST['nama'], $_POST['nik'], $_POST['email'], $_POST['noHp'], $_POST['tempat_lahir'], $_POST['tgl_lahir'], $_POST['umur'], $_POST['jns_kelamin'], $_POST['status'], $_POST['alamat'], $foto_baru);
  echo "
        <script language = 'Javascript'>
            alert('Data Berhasil Ditambahkan, silahkan melakukan login!');
            document.location = 'index.php';
        </script>";
} elseif ($aksi == "registrasi") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = 'User';
  $q = mysqli_query($db->koneksi, "SELECT * FROM login WHERE username = '$username'");
  $cek = mysqli_num_rows($q);
  if ($cek > 0) {
    echo "<script language = 'JavaScript'>
  document.location='registrasi.php?pesan=gagal';</script>";
  } else {
    $db->inputLogin($username, $password, $level);
    echo "<script language = 'JavaScript'>
      alert('Anda telah berhasil membuat Akun, Silahkan memasukkan data diri!');
      document.location='buatProfil.php';
      </script>";
  }
} else {
  echo "Database Error, Silahkan Proses Kembali <a href='registrasi.php'>Klik Disini</a>";
}
