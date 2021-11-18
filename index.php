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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>MY LIBRARY | PEMINJAMAN</title>
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
              <?php
              include("koneksi.php");
              if (isset($_GET['search'])) {
                $search = $_GET['search'];
                echo "<b>Hasil Pencarian : " . $search . "</b>";
              }
              ?>
            </div>
            <div class="col-5" style="background-color: #A0B0DE;">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                <button class="btn btn-dark " value="search" type="submit">Search</button>
              </form>
            </div>
          </div>

          <div class="row row-cols-2 mt-4 " style=" width: 100%; margin: auto; align-items: center;">
            <?php
            if (isset($_GET['search'])) {
              $search = $_GET['search'];
              $sukili = mysqli_query($conn, "SELECT * FROM buku WHERE judul like '%" . $search . "%' OR pengarang like '%" . $search . "%'");
            } else {
              $sukili = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku ASC limit 30");
            }
            while ($row = mysqli_fetch_array($sukili)) {
            ?>
              <div style="width: 25%;">
                <div data-toggle="modal" name="view_detail" data-id="<?php echo $row['id_buku']; ?>" data-target="#myModal" class="details card h-100 shadow p-3 mb-5 bg-body rounded" style="max-width: 15rem;">
                  <img src="img/<?php echo $row['gambar'] ?>" class="card-img-top border" alt="gambar" height="350px">
                  <div class="card-body text-center">
                    <div class="text-center mt-2 fw-bold"><?php echo $row['judul']; ?></div>
                    <div class="text-center mt-2 small" style="font-weight: 500"><?php echo $row['pengarang']; ?></div>
                    <div div class="text-center mt-2 small"><?php echo $row['penerbit']; ?></div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
        </div>
      
    <div class="modal fade" id="myModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content" id="data_buku">
        </div>
      </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script>
      $(document).on('click', '.details', function() {
        var id_buku = $(this).data("id")
        $.ajax({
          url: "modal.php",
          method: "POST",
          data: {
            action: 'fetch_data',
            id_buku: id_buku
          },
          success: function(data) {
            $("#myModal").modal('show')
            $("#data_buku").html(data)
          }
        })
      })
    </script>
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