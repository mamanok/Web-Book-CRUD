<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/Logo.svg" type="image">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Margarine&family=Montaga&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">

  <title>MY LIBRARY | PRINT</title>
</head>

<body>
  <?php
  include("koneksi.php");

  $id = ($_GET["id_buku"]);
  $sukili = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
  while ($row = mysqli_fetch_array($sukili)) {
  ?>
    <div class="container my-5">
      <div>
        <div class=" p-3 text-muted"></div>
        <div class=" text-center">
          <h3 class="text-center mt-2"><b><?php echo $row['judul']; ?></b></h3>
          <img src="img/<?php echo $row['gambar'] ?>" class="card-img-top border" alt="gambar" style="height: 20%; width: 20%;">
          <h5 class="text-center mt-2"><b><?php echo $row['pengarang']; ?></b></h5>
          <h6 div class="text-center mt-2"><?php echo $row['penerbit']; ?></h6>
          <p div class="mt-3" style="text-align: justify"><?php echo $row['sinopsis']; ?></p>
        </div>
        <div class=" p-3 text-muted"></div>
      </div>
    </div>
  <?php
  }
  ?>
  <script>
    window.print();
  </script>
</body>

</html>