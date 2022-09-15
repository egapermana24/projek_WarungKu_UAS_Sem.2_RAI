<?php
try {
  $host   = 'localhost'; // host server
  $user   = 'root';  // username server
  $pass   = ''; // password server
  $dbname = 'warungku'; // nama database
  $config = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
  //echo 'sukses';
} catch (PDOException $e) {
  echo 'KONEKSI GAGAL' . $e->getMessage();
}
class database
{

  var $host = "localhost";
  var $user = "root";
  var $pass = "";
  var $db = "warungku";
  var $koneksi = "";

  function __construct()
  {
    $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
  }

  // Format Tanggal
  function tgl_indo($tanggal)
  {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }
  // =========DATA BARANG==========
  // fungsi input data barang ke database
  function inputBarang($id_kategori, $nm_barang, $merk, $hrg_beli, $hrg_jual, $satuan_barang, $stok, $tgl_masuk, $tgl_edit, $foto_baru)
  {
    mysqli_query($this->koneksi, "INSERT INTO barang VALUES ('', '$id_kategori', '$nm_barang', '$merk', '$hrg_beli', '$hrg_jual', '$satuan_barang', '$stok', '$tgl_masuk', '$tgl_edit', '$foto_baru')");
  }

  // fungsi menampilkan data barang
  function tampilBarang()
  {
    if (isset($_POST['cari'])) {
      $cari = $_POST['cari'];
      $data = mysqli_query($this->koneksi, "SELECT barang.*, kategori. *, satuan. * FROM barang JOIN kategori ON barang.id_kategori = kategori.id_kategori JOIN satuan ON barang.id_satuan = satuan.id_satuan WHERE barang.id LIKE '%$cari%' OR barang.nm_barang LIKE '%$cari%' OR barang.merk LIKE '%$cari%' OR barang.hrg_beli LIKE '%$cari%' OR barang.hrg_jual LIKE '%$cari%' OR barang.stok LIKE '%$cari%' OR kategori.nm_kategori LIKE '%$cari%' OR satuan.nm_satuan LIKE '%$cari%'");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
      // jika tidak ada pencarian maka akan menampilkan semua data khusus di halaman dataBarang.php
    } else {
      $data = mysqli_query($this->koneksi, "SELECT barang.*, kategori. *, satuan. * FROM barang JOIN kategori ON barang.id_kategori = kategori.id_kategori JOIN satuan ON barang.id_satuan = satuan.id_satuan");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    }
  }

  // fungsi hapus data barang 
  function hapusBarang($id)
  {
    $dok = mysqli_query($this->koneksi, "SELECT * FROM barang WHERE id = '$id'");
    $data = mysqli_fetch_array($dok);
    $foto = $data['foto'];
    unlink("../img/barang/$foto");
    mysqli_query($this->koneksi, "DELETE FROM barang WHERE id = '$id'");
  }

  // fungsi edit data barang
  function editBarang($id, $id_kategori, $nm_barang, $merk, $hrg_beli, $hrg_jual, $id_satuan, $stok, $tgl_masuk, $tgl_edit, $foto_baru)
  {
    if ($_FILES['foto']['error'] === 4) {
      mysqli_query($this->koneksi, "UPDATE barang SET id_kategori = '$id_kategori', nm_barang = '$nm_barang', merk = '$merk', hrg_beli = '$hrg_beli', hrg_jual = '$hrg_jual', id_satuan = '$id_satuan', stok = '$stok', tgl_masuk = '$tgl_masuk', tgl_edit = '$tgl_edit', foto = '$foto_baru' WHERE id = '$id'");
    } else {
      $dok = mysqli_query($this->koneksi, "SELECT * FROM barang WHERE id = '$id'");
      $data = mysqli_fetch_array($dok);
      $foto = $data['foto'];
      unlink("../img/barang/$foto");
      mysqli_query($this->koneksi, "UPDATE barang SET id_kategori = '$id_kategori', nm_barang = '$nm_barang', merk = '$merk', hrg_beli = '$hrg_beli', hrg_jual = '$hrg_jual', id_satuan = '$id_satuan', stok = '$stok', tgl_masuk = '$tgl_masuk', tgl_edit = '$tgl_edit', foto = '$foto_baru' WHERE id = '$id'");
    }
  }


  // fungsi tampil data barang berdasarkan id
  function tampilBarangById($id)
  {
    $data = mysqli_query($this->koneksi, "SELECT barang.*, kategori. *, satuan. * FROM barang JOIN kategori ON barang.id_kategori = kategori.id_kategori JOIN satuan ON barang.id_satuan = satuan.id_satuan WHERE id = '$id'");
    $result    = mysqli_fetch_array($data);
    return $result;
  }

  // fungsi tampil barang untuk stok
  function tampilBarangStok($id)
  {
    $query = mysqli_query($this->koneksi, "SELECT * FROM barang WHERE id = '$id'");
    return $query->fetch_array();
  }

  // fungsi tampil stok habis
  function ambilStok()
  {
    $query = mysqli_query($this->koneksi, "SELECT * FROM barang WHERE stok <= 5");
    return $query;
  }

  // =========DATA KATEGORI==========
  // fungsi input data kategori ke database
  function inputKategori($nm_kategori, $tgl_input)
  {
    mysqli_query($this->koneksi, "INSERT INTO kategori VALUES ('','$nm_kategori', '$tgl_input')");
  }

  // fungsi menampilkan data kategori
  function tampilKategori()
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM kategori");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }

  // fungsi tampil kategori berdasarkan id
  function tampilKategoriById($id)
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id'");
    $result    = mysqli_fetch_array($data);
    return $result;
  }

  // fungsi hapus data kategori
  function hapusKategori($id_kategori)
  {
    mysqli_query($this->koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");
  }

  // fungsi update data kategori
  function updateKategori($id, $nm_kategori)
  {
    mysqli_query($this->koneksi, "UPDATE kategori SET nm_kategori = '$nm_kategori' WHERE id_kategori = '$id'");
  }
  // =========DATA SATUAN==========
  // fungsi input data satuan ke database
  function inputSatuan($nm_satuan, $tgl_input)
  {
    mysqli_query($this->koneksi, "INSERT INTO satuan VALUES ('','$nm_satuan', '$tgl_input')");
  }

  // fungsi menampilkan data satuan
  function tampilSatuan()
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM satuan");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }

  // fungsi tampil satuan berdasarkan id
  function tampilSatuanById($id)
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM satuan WHERE id_satuan = '$id'");
    $result    = mysqli_fetch_array($data);
    return $result;
  }

  // fungsi hapus data satuan
  function hapusSatuan($id_satuan)
  {
    mysqli_query($this->koneksi, "DELETE FROM satuan WHERE id_satuan = '$id_satuan'");
  }

  // fungsi update data satuan
  function updateSatuan($id, $nm_satuan)
  {
    mysqli_query($this->koneksi, "UPDATE satuan SET nm_satuan = '$nm_satuan' WHERE id_satuan = '$id'");
  }

  // =========DATA REGISTRASI==========
  // fungsi input registrasi ke database
  function inputLogin($username, $password, $level)
  {
    mysqli_query($this->koneksi, "INSERT INTO login VALUES ('','$username', '$password', '$level')");
  }

  // =====LOGIN=====
  // fungsi login
  function login($username, $password)
  {
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $profil = mysqli_query($this->koneksi, "SELECT profil.*, login. * FROM profil JOIN login ON profil.id_login = login.id_login WHERE username = '$username' AND password = '$password'");
    $prof = mysqli_fetch_array($profil);
    $id_profil = $prof['id_profil'];
    $id_login = $prof['id_login'];
    $nama = $prof['nama'];
    $nik = $prof['nik'];
    $email = $prof['email'];
    $noHp = $prof['noHp'];
    $tempat_lahir = $prof['tempat_lahir'];
    $tanggal_lahir = $prof['tanggal_lahir'];
    $umur = $prof['umur'];
    $jns_kelamin = $prof['jns_kelamin'];
    $status = $prof['status'];
    $alamat = $prof['alamat'];
    $foto = $prof['foto'];

    $data = mysqli_query($this->koneksi, "SELECT * FROM login WHERE username = '$username' AND password = '$password'");
    $row   = mysqli_num_rows($data);


    if ($row > 0) {
      $login = mysqli_fetch_assoc($data);
      if ($login['level'] == "Administrator") {
        if ($id_login == $login['id_login']) {
          session_start();
          $_SESSION['id_login'] = $id_login;
          $_SESSION['username'] = $login['username'];
          $_SESSION['password'] = $login['password'];
          $_SESSION['level'] = $login['level'];
          $_SESSION['id_profil'] = $id_profil;
          $_SESSION['nama'] = $nama;
          $_SESSION['nik'] = $nik;
          $_SESSION['email'] = $email;
          $_SESSION['noHp'] = $noHp;
          $_SESSION['tempat_lahir'] = $tempat_lahir;
          $_SESSION['tanggal_lahir'] = $tanggal_lahir;
          $_SESSION['umur'] = $umur;
          $_SESSION['jns_kelamin'] = $jns_kelamin;
          $_SESSION['status'] = $status;
          $_SESSION['alamat'] = $alamat;
          $_SESSION['foto'] = $foto;

          echo "<script language = 'JavaScript'>confirm('Login Berhasil');
          document.location='administrator/index.php';</script>";
        }
        echo "<script language = 'JavaScript'>confirm('Silahkan isi data diri terlebih dahulu!');
        document.location='buatProfil.php';</script>";
      }
    } else {
      echo "<script language = 'JavaScript'>
      document.location='index.php?pesan=gagal';</script>";
    }
  }

  // tampil login
  function tampilLogin()
  {
    $data = mysqli_query($this->koneksi, "SELECT login.*, profil. * FROM login JOIN profil ON login.id_login = profil.id_login");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }

  // hapus login
  function hapusLogin($id)
  {
    mysqli_query($this->koneksi, "DELETE FROM login WHERE id_login = '$id'");

    mysqli_query($this->koneksi, "DELETE FROM profil WHERE id_login = '$id'");
  }

  // =========DATA PROFIL==========
  // fungsi input data profil ke database
  function inputProfil($id_login, $nama, $nik, $email, $noHp, $tempat_lahir, $tanggal_lahir, $umur, $jns_kelamin, $status, $alamat, $foto_baru)
  {
    mysqli_query($this->koneksi, "INSERT INTO profil VALUES ('','$id_login', '$nama', '$nik', '$email', '$noHp', '$tempat_lahir', '$tanggal_lahir', '$umur', '$jns_kelamin', '$status', '$alamat', '$foto_baru')");
  }

  function tampilProfil()
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM profil WHERE id_login = '$_SESSION[id_login]'");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }

  // fungsi edit profil
  function editProfil($id_profil, $id_login, $nama, $nik, $email, $noHp, $tempat_lahir, $tanggal_lahir, $umur, $jns_kelamin, $status, $alamat, $foto_baru)
  {
    if ($_FILES['foto']['error'] === 4) {
      mysqli_query($this->koneksi, "UPDATE profil SET id_login = '$id_login', nama = '$nama', nik = '$nik', email = '$email', noHp = '$noHp', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', umur = '$umur', jns_kelamin = '$jns_kelamin', status = '$status', alamat = '$alamat', foto = '$foto_baru' WHERE id_profil = '$id_profil'");
    } else {
      $dok = mysqli_query($this->koneksi, "SELECT * FROM profil WHERE id_profil = '$id_profil'");
      $data = mysqli_fetch_array($dok);
      $foto = $data['foto'];
      unlink("../img/barang/$foto");
      mysqli_query($this->koneksi, "UPDATE profil SET id_login = '$id_login', nama = '$nama', nik = '$nik', email = '$email', noHp = '$noHp', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', umur = '$umur', jns_kelamin = '$jns_kelamin', status = '$status', alamat = '$alamat', foto = '$foto_baru' WHERE id_profil = '$id_profil'");
    }
  }


  // =======KASIR PENJUALAN========
  // fungsi input data penjualan ke database
  function inputPenjualan($idBarang, $id_profil, $jumlah, $total, $tanggal_terjual)
  {
    mysqli_query($this->koneksi, "INSERT INTO penjualan VALUES ('','$idBarang', '$id_profil', '$jumlah', '$total', '$tanggal_terjual')");
  }

  // funsi tampil data penjualan
  function tampilPenjualan()
  {
    $data = mysqli_query($this->koneksi, "SELECT penjualan.*, barang.*, profil. * FROM penjualan JOIN barang ON penjualan.idBarang = barang.id JOIN profil ON penjualan.id_profil = profil.id_profil");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }



  // fungsi tampil jumlah data penjualan
  function jumlahPenjualan()
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM penjualan");
    $row = mysqli_num_rows($data);
    return $row;
  }

  // fungsi update data penjualan
  function updateKasir($id_jual, $idBarang, $jumlah, $total, $stokSisa)
  {
    mysqli_query($this->koneksi, "UPDATE penjualan SET jumlah = '$jumlah', total = '$total' WHERE id_jual = '$id_jual'");
  }


  // fungsi hapus data penjualan berdasarkan id
  function hapusKasir($id_jual)
  {
    mysqli_query($this->koneksi, "DELETE FROM penjualan WHERE id_jual = '$id_jual'");

    mysqli_query($this->koneksi, "DELETE FROM kasir");
  }

  // fungsi hapus seluruh data penjualan
  function hapusKasirAll()
  {
    mysqli_query($this->koneksi, "DELETE FROM penjualan");

    mysqli_query($this->koneksi, "DELETE FROM kasir");

    // mysqli_query($this->koneksi, "DELETE FROM lappenjualan");

    mysqli_query($this->koneksi, "DELETE FROM struk");
  }


  // fungsi tampil data kasir
  function tampilKasir()
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM kasir");
    $row = mysqli_fetch_array($data);
    $kembalian = $row['kembalian'];

    return $kembalian;
  }

  // fungsi tampil data lapPenjualan
  function tampilLapPenjualan()
  {
    if (isset($_POST['dari']) && $_POST['sampai']) {
      $dari = $_POST['dari'];
      $sampai = $_POST['sampai'];
      $data = mysqli_query($this->koneksi, "SELECT lappenjualan.*, barang.*, profil. * FROM lapPenjualan JOIN barang ON lapPenjualan.id_brg = barang.id JOIN profil ON lappenjualan.id_profil = profil.id_profil WHERE lappenjualan.tgl_jual BETWEEN '$dari' AND '$sampai'");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    } else {
      $data = mysqli_query($this->koneksi, "SELECT lappenjualan.*, barang.*, profil. * FROM lapPenjualan JOIN barang ON lapPenjualan.id_brg = barang.id JOIN profil ON lappenjualan.id_profil = profil.id_profil");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    }
  }

  // fungsi cetak laporan penjualan
  function cetakPenjualan()
  {
    if (isset($_GET['awal']) && isset($_GET['akhir'])) {
      $awal = $_GET['awal'];
      $akhir = $_GET['akhir'];
      $data = mysqli_query($this->koneksi, "SELECT lappenjualan.*, barang.*, profil. * FROM lappenjualan JOIN barang ON lappenjualan.id_Brg = barang.id JOIN profil ON lappenjualan.id_profil = profil.id_profil WHERE lappenjualan.tgl_jual BETWEEN '$awal' AND '$akhir'");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    } else {
      $data = mysqli_query($this->koneksi, "SELECT lappenjualan.*, barang.*, profil. * FROM lappenjualan JOIN barang ON lappenjualan.id_Brg = barang.id JOIN profil ON lappenjualan.id_profil = profil.id_profil");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    }
  }



  // =========PEMBELIAN==========
  // fungsi input data pembelian ke database
  function inputPembelian($no_ref, $id_Brg, $jumlah, $total, $penerima, $tgl_masuk, $tambah_stok)
  {
    mysqli_query($this->koneksi, "INSERT INTO lappembelian VALUES ('$no_ref','$id_Brg', '$jumlah','$total', '$penerima', '$tgl_masuk')");

    mysqli_query($this->koneksi, "UPDATE barang SET stok = '$tambah_stok' WHERE id = '$id_Brg'");
  }

  // fungsi cetak pembelian
  function cetakPembelian()
  {
    if (isset($_GET['awal']) && isset($_GET['akhir'])) {
      $awal = $_GET['awal'];
      $akhir = $_GET['akhir'];
      $data = mysqli_query($this->koneksi, "SELECT lappembelian.*, barang. * FROM lappembelian JOIN barang ON lappembelian.id_Brg = barang.id  WHERE lappembelian.tgl_masuk BETWEEN '$awal' AND '$akhir'");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    } else {
      $data = mysqli_query($this->koneksi, "SELECT lappembelian.*, barang. * FROM lappembelian JOIN barang ON lappembelian.id_Brg = barang.id ");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    }
  }

  // fungsi tampil data lappembelian
  function tampilLapPembelian()
  {
    if (isset($_POST['dari']) && $_POST['sampai']) {
      $dari = $_POST['dari'];
      $sampai = $_POST['sampai'];
      $data = mysqli_query($this->koneksi, "SELECT lappembelian.*, barang. * FROM lappembelian JOIN barang ON lappembelian.id_Brg = barang.id  WHERE lappembelian.tgl_masuk BETWEEN '$dari' AND '$sampai'");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    } else {
      $data = mysqli_query($this->koneksi, "SELECT lappembelian.*, barang. * FROM lappembelian JOIN barang ON lappembelian.id_Brg = barang.id ");
      while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
      }
      return $hasil;
    }
  }

  // =========STRUK=========
  // fungsi tampil data struk
  function tampilStruk()
  {
    $data = mysqli_query($this->koneksi, "SELECT struk. *, barang. *, profil. *, kasir. * FROM struk JOIN barang ON struk.id_Barang = barang.id JOIN profil ON struk.id_Profil = profil.id_profil JOIN kasir ON  struk.id_Kasir = kasir.id_kasir");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }
}
