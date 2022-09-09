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
                <div class="container pt-3">
                    <div class="col-md-7 mx-auto col-lg-5 offset-lg-4 offset-md-3 text-center hijauTua mt-4 bg-opacity-75 rounded-3 shadow-lg pb-2 pt-2">
                        <h1 class="display-6 text-light"><i class="fa-solid fa-store"></i><br> Buat Username dan Password</h1>
                        <div class="bg-white p-5 border shadow m-3 rounded-3">
                            <!-- Login Form -->
                            <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "gagal") {
                                    echo
                                    "
                    <div class='row justify-content-center mt-2'>
                    <div class='alert alert-danger alert-dismissible fade show text-center col-10' role='alert'>
                    Username sudah ada, harap ganti!
                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>
                      </div>";
                                }
                            }
                            ?>

                            <form action="prosesRegistrasi.php?aksi=registrasi" method="POST">
                                <div class="mb-4">
                                    <div class="form-floating mb-3">
                                        <input required name="username" class="form-control form-control-sm" id="username" type="text" placeholder="username" />
                                        <label for="username"><i class="fa-regular fa-fw fa-user"></i> Username</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-floating mb-3">
                                        <input required name="password" class="form-control form-control-sm" id="password" type="password" placeholder="Password" />
                                        <label for="password"><i class="fa-solid fa-fw fa-lock"></i> Password</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-success w-100 my-3 shadow">Selanjutnya</button>
                                <p class="text-center m-0">Sudah punya akun? silahkan <a href="index.php">login!</a></p>
                            </form>
                            <!-- Login Form -->
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