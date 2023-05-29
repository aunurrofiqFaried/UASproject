<?php
include "koneksi.php";

if (isset($_POST['input'])) {
  $nama_bunga = $_POST['nama_bunga'];
  $warna = $_POST['warna'];
  $harga = $_POST['harga'];
  $detail = $_POST['detail'];

  $query = "INSERT INTO bunga VALUES ('','$nama_bunga', '$warna', '$harga', '$detail')";
  $result = mysqli_query($con, $query);

  if (!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
  }
}
header("location:index.php")
?>