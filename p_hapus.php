<?php
include 'koneksi.php';
$id = $_GET["id_buku"];

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM buku WHERE id_buku='$id' ";
$hasil_query = mysqli_query($conn, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
  die("Gagal menghapus data: " . mysqli_errno($conn) .
    " - " . mysqli_error($conn));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='daftar.php';</script>";
}
