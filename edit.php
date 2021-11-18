<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/Logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="fontawesome/css/all.min.css" crossorigin>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <title>MY LIBRARY | EDIT</title>
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
    </div>
  </nav>

  <?php

  include 'koneksi.php';

  if (isset($_GET['id_buku'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id_buku"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM buku WHERE id_buku='$id'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
      die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
      echo "<script>alert('Data tidak ditemukan pada database');window.location='daftar.php';</script>";
    }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan Data ID.');window.location='daftar.php';</script>";
  }
  ?>

  <div class="container p-2 my-5">
    <div class="card">
      <div class="card-header text-white" style="background-color: #121E48;">Edit Buku</div>
      <div class="card-body">

        <form enctype="multipart/form-data" action="p_edit.php" method="post">

          <input name="id_buku" value="<?php echo $data['id_buku']; ?>" hidden />

          <div class="mb-3 mt-3 form-label">
            <label class="form-label" >Judul</label>
            <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>">
          </div>

          <div class="mb-3 mt-3 form-label">
            <label class="form-label">Pengarang</label>
            <input type="text" class="form-control" name="pengarang" value="<?php echo $data['pengarang']; ?>" />
          </div>

          <div class="mb-3 mt-3 form-label">
            <label class="form-label">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" required="" value="<?php echo $data['penerbit']; ?>" />
          </div>

          <div class="mb-3 mt-3 form-label">
            <label class="form-label">Persediaan</label>
            <input type="text" class="form-control" name="persediaan" required="" value="<?php echo $data['persediaan']; ?>" />
          </div>

          <div class="mb-3 mt-3 form-label">
            <label class="form-label">Sinopsis</label>
            <textarea type="text" style="height:150px;" class="form-control" name="sinopsis" required=""><?php echo $data['sinopsis']; ?></textarea>
          </div>

          <div class="mb-3 mt-3 form-label">
            <label class="form-label">Gambar</label>
            <input class="form-control" type="file" name="gambar">
            <i class="" style="font-size: 11px;color: red">Abaikan Jika Tidak Merubah Gambar</i>
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary mt-3" type="submit">Update</button>
          </div>

      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>

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
</body>

</html>