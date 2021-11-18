<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/Logo.png" type="image">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="fontawesome/css/all.min.css" crossorigin>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">

  <title>MY LIBRARY | BOOK LIST</title>
</head>

<body style="background-color: #A0B0DE;">
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #121E48;">
    <div class="container">
      <ul class="navbar-nav ms-6">
        <li>
          <a class="navbar-brand text-white" href="#">
            <img src="img/Logo.png" alt="" height="50" class="d-inline-block align-text-center" style="margin-right: 10px;"><strong>MY LIBRARY</strong>
          </a>
        </li>
      </ul>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a style="margin-right: 30px;" class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle" style="font-size: 22px; margin-right: 8px"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <form action="logout" method="post">
                <a href="akunuser.php?logoutSubmit=1" type="submit" class="dropdown-item">Logout</a>
              </form>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container my-5">
  <div class="container">
          <div class="row justify-content-start" style="background-color:#fff">
            <div class="col-7" style="background-color: #A0B0DE;">
              <a href="tambah.php" class="btn btn-primary" type="add">Add</a>
            </div>
            <div class="col-5" style="background-color: #A0B0DE;">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                <button class="btn text-white" value="search" type="submit" style="background-color: #263F94">Search</button>
              </form>
              <?php
              include("koneksi.php");
              if (isset($_GET['search'])) {
                $search = $_GET['search'];
                echo "<b>Hasil Pencarian : " . $search . "</b>";
              }
              ?>
            </div>
          </div>

          <?php
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sukili = mysqli_query($conn, "SELECT * FROM buku WHERE judul like '%" . $search . "%' OR pengarang like '%" . $search . "%'");
          } else {
            $sukili = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku ASC limit 30");
          }
          while ($row = mysqli_fetch_array($sukili)) {
          ?>
            <div class="container rounded-3 p-2 mt-3 border" style="background-color: #FFF;">
              <div class="row mt-4">
                <div class="col-2 text-center">
                  <img style="height: 200px; margin-left: 15px;" src="img/<?php echo $row['gambar'] ?>">
                  <p class="my-auto text-center mt-3"><b><?php echo $row['judul']; ?></b></p>
                </div>
                <div class="col-10">
                  <div class="row">
                    <div class="col-6">
                      <p><b><?php echo $row['pengarang']; ?></b> | <a style="font-weight: 500"> <?php echo $row['penerbit']; ?></a></p>
                    </div>
                  </div>
                  <p style="text-align: justify;" class="me-4"><?php echo $row['sinopsis']; ?></p>
                </div>
                <div style="margin-bottom: 5px" class="row">
                  <div class="col-3 my-auto">
                  </div>
                  <div class="col-9 my-auto">
                    <div class="align-self-end text-end me-1">
                      <a href="edit.php?id_buku=<?php echo $row['id_buku']; ?>" class="btn btn-warning btn-sm" type="submit">Edit</a>
                      <a href="p_hapus.php?id_buku=<?php echo $row['id_buku']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')" class="btn btn-danger btn-sm" type="submit">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
          </div>
          </div>

<footer class="mt-5" style="margin-top: 5px; padding: 30px 0; background-color: #333;
    color: #fff; text-align: center;">
        <div class="container">
            <div class="row justify-content-center mt-3 mb-4">
                <div class="col-1 text-center justify-content-center">
                    <a href="#"><i class="fab fa-facebook" aria-hidden="true"
                            style="color: #ffffff; font-size: 30pt;"></i></a>
                </div>
                <div class="col-1 text-center justify-content-center">
                    <a href="https://wa.me/+6281337995963"><i class="fab fa-whatsapp" aria-hidden="true"
                            style="color: #ffffff; font-size: 32pt;"></i></a>
                </div>
                <div class="col-1 text-center justify-content-center">
                    <a href="https://www.instagram.com/hukum_newton3/"><i class="fab fa-instagram" aria-hidden="true"
                            style="color: #ffffff;font-size: 32pt;"></i></a>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <small>
                Copyright &copy; 2021 - Rahman Sucipto.All Right Reserved
            </small>
        </div>
</footer>
          <script type="text/javascript" src="js/jquery.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
</body>
</html>