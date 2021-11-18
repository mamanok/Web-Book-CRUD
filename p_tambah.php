<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $judul   = $_POST['judul'];
  $pengarang     = $_POST['pengarang'];
  $penerbit    = $_POST['penerbit'];
  $persediaan    = $_POST['persediaan'];
  $gambar = $_FILES['gambar']['name'];
  $sinopsis = $_POST['sinopsis'];
//cek dulu jika ada gambar produk jalankan coding ini
if($gambar != "") {
  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO buku (judul, pengarang, penerbit, persediaan, gambar, sinopsis) VALUES ('$judul', '$pengarang', '$penerbit', '$persediaan', '$nama_gambar_baru', '$sinopsis')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  }else {
                    //tampil alert dan akan redirect ke halaman daftar.php
                    //silahkan ganti daftar.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='daftar.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah.php';</script>";
            }
} else {
   $query = "INSERT INTO buku (judul, pengarang, penerbit, persediaan, sinopsis) VALUES ('$judul', '$pengarang', '$penerbit', '$persediaan', '$sinopsis')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman daftar.php
                    //silahkan ganti daftar.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='daftar.php';</script>";
                  }
}