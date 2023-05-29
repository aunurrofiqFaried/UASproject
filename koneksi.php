<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "projectUAS";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
  die("<script>alert('Gagal Tersambung pada database')</script>");
}
?>