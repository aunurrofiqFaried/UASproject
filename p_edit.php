<?php
if (isset($_POST['edit'])) {
  include "koneksi.php";

  $id = $_POST['id'];
  $nama_bunga = $_POST['nama_bunga'];
  $warna = $_POST['warna'];
  $harga = $_POST['harga'];
  $detail = $_POST['detail'];

  $query = "UPDATE bunga set id = '$id', nama_bunga = '$nama_bunga' , warna = '$warna' , harga = '$harga' , detail = '$detail' where id = '$id'";
  $result = mysqli_query($con, $query);

  if (!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
  }
}

header("Location: index.php")
?>