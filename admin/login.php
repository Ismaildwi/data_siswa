<?php
require '../functions/functions.php';


if (isset($_POST["masuk"])) {
  $username = ($_POST["username"]);
  $password = ($_POST["password"]);

  $cekAkun   = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
  if (mysqli_num_rows($cekAkun) === 1) {

    // cek password
    $akun = mysqli_fetch_assoc($cekAkun);
    if ($password === $akun["password"]) {
      // mulai session
      $_SESSION["login_petugas"] = $akun["id_petugas"];
      header("Location: ../index.php");
      exit;
    }
    $error = true;
  }
  $error1 = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Login Admin</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <!-- Navbar -->
  <nav class="navbar-expand-lg navbar bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-white ms-5" href="../index.php">Data Siswa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav me-5">
          <li class="nav-item me-3">
            <a class="nav-link active text-white" aria-current="page" href="../index.php">
              Beranda
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="admin.php">
              Admin
            </a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar Selesai -->
  <form action="" method="post" autocomplete="off">
    <div class="container login">
      <div class="row justify-content-center">
        <div class="col-4 box-form">
          <h1 class="text-center">Masuk Admin</h1>
          <h2 class="text-center">Silahkan masuk dengan akun Admin.</h2>
          <?php if (isset($error)) : ?>
            <p class="text-danger">*username / password salah!</p>
          <?php elseif (isset($error1)) : ?>
            <p class="text-danger">*akun tidak ditemukan!</p>
          <?php endif; ?>
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control mb-3" name="username" id="username" placeholder="Masukkan Username" />
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Masukkan Password" />
          <div class="row justify-content-between mt-4 mx-auto">
            <button class="btn btn-danger col-4 reset" type="reset">Reset</button>
            <button class="btn btn-primary col-4 submit" type="submit" name="masuk">Masuk</button>
          </div>
        </div>
      </div>
    </div>
  </form>


  <!-- Footer -->
  <footer class="text-white p-2 mt-auto">
    Copyright
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
      <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512Z" />
    </svg>
    2023
  </footer>
  <!-- Footer Selesai -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>