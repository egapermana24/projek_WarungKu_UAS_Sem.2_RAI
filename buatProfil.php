<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Registrasi - WarungKu</title>
  <link href="templates/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
</head>

<body class="bg-light" style="background-image:url(Dokumen/denim.webp) ;">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container pb-5">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="card shadow-lg border-0 rounded-lg mt-5 p-2">
                <div class="card-header accordion-body hijauTua">
                  <h3 class="text-center text-light font-weight-light my-4 display-6">Silahkan Masukkan data</h3>
                </div>
                <form action="prosesRegistrasi.php?aksi=profil" method="POST" enctype="multipart/form-data">
                  <div class="row justify-content-center p-3">
                    <div class="col-6">
                      <div class="form-floating mb-3 mb-md-3">
                        <input name="nama" class="form-control" id="nama" type="text" required placeholder="Nama" />
                        <label for="nama">Nama Lengkap</label>
                      </div>
                      <div class="form-floating mb-3 mb-md-3">
                        <input name="nik" class="form-control" id="nik" type="number" required placeholder="Nik" />
                        <label for="nik">NIK</label>
                      </div>
                      <div class="form-floating mb-3 mb-md-3">
                        <input name="email" class="form-control" id="email" type="email" required placeholder="email" />
                        <label for="email">Email</label>
                      </div>
                      <div class="form-floating mb-3 mb-md-3">
                        <input name="noHp" class="form-control" id="noHp" type="number" required placeholder="noHp" />
                        <label for="noHp">No. Handphone</label>
                      </div>
                      <div class="form-floating mb-3 mb-md-3">
                        <input name="tempat_lahir" class="form-control" id="tempat_lahir" type="text" required placeholder="Tempat lahir" />
                        <label for="tempat_lahir">Tempat Lahir</label>
                      </div>
                      <div class="form-floating mb-md-3">
                        <textarea name="alamat" class="form-control" id="alamat" type="text" required placeholder="alamat">
                        </textarea>
                        <label for="alamat">Alamat</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3 mb-md-3">
                        <input name="tgl_lahir" class="form-control" id="tgl_lahir" type="date" required placeholder="Tanggal lahir" />
                        <label for="tgl_lahir">Tanggal Lahir</label>
                      </div>
                      <div class="form-floating mb-3 mb-md-3">
                        <input name="umur" class="form-control" id="umur" type="number" required placeholder="Umur" />
                        <label for="umur">Umur</label>
                      </div>
                      <div class="form-floating mb-3 mb-md-3">
                        <select name="jns_kelamin" class="form-select">
                          <option selected hidden>Jenis Kelamin</option>
                          <option value=" Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-floating mb-3 mb-md-3">
                        <select name="status" class="form-select">
                          <option selected hidden>Status</option>
                          <option value=" Belum Menikah">Belum Menikah</option>
                          <option value="Menikah">Menikah</option>
                        </select>
                      </div>
                      <div class="form-floating mb-3 mb-md-3">
                        <input value="User" name="level" class="form-control" id="level" type="text" readonly />
                      </div>
                      <div class="form-floating mb-md-3">
                        <input name="foto" class="form-control" id="foto" type="file" required />
                        <small class="text-danger">*foto harus berukuran 1:1 atau berbentuk persegi</small>
                        <label for="foto">Upload Foto Pribadi</label>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success w-100 my-3 shadow">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  </main>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="templates/js/scripts.js"></script>
</body>

</html>