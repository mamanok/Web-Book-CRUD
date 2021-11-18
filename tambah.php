<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/Logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="fontawesome/css/all.min.css" crossorigin>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <title>MY LIBRARY | TAMBAH</title>
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

  <div class="container p-2 my-5">
    <div class="card">
      <div class="card-header text-white"style="background-color: #121E48;">Tambah Buku</div>
      <div class="card-body">


        <form method="post" action="p_tambah.php" name="form1" enctype="multipart/form-data">

          <div class="mb-3 mt-2 form-group">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul" required>
          </div>

          <div class="mb-3 mt-3 form-group">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" placeholder="Pengarang" name="pengarang" required>
          </div>

          <div class="mb-3 mt-3 form-group">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="penerbit" required>
          </div>

          <div class="mb-3 mt-3 form-group">
            <label for="persediaan" class="form-label">Persediaan</label>
            <input type="text" class="form-control" id="persediaan" placeholder="Persediaan Buku" name="persediaan" required>
          </div>

          <div class="mb-3 mt-3 form-group">
            <label for="sinopsis" class="form-label">Sinopsis</label>
            <textarea type="text" max="100" class="form-control" id="sinopsis" placeholder="Sinopsis" name="sinopsis" required></textarea>
          </div>

          <div class="mb-3 mt-3 form-group">
            <label for="formFile" class="form-label">Gambar</label>
            <input class="form-control" type="file" id="gambar" name="gambar" required>
          </div>

          <input class="btn btn-primary mt-3" type="submit" name="Submit" value="Submit" style="width:100%"></td>
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