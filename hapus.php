<?php
include "koneksi.php";

if (isset($_GET['id'])) {

  $id = $_GET['id'];

  $query = "DELETE FROM bunga where id='$id'";
  $result = mysqli_query($con, $query);

  if (!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
  }
}

header("Location: index.php")
?>