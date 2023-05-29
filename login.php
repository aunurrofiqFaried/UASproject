<?php
include 'koneksi.php';
error_reporting(0);
session_start();
if (isset($_SESSION['username'])) {
  Header("location: index.php");
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($con, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    header("Location: index.php");
  }else {
    echo "<script>alert('Email atau Password anda salah Boskuu, Coba Lagi')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/jpg" href="flower.png"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
    *{
      font-family: 'Poppins', sans-serif;
    }
  </style>
  <title>Login</title>
</head>
<body>
  <?php
    echo $_SESSION['error']
  ?>
  <div class="container d-flex min-vh-100 justify-content-center align-items-center">
    <div class="card w-75 shadow rounded">
      <form class="container pt-4 pb-2 ps-5 pe-5" action="" method="post">
        <div class="mb-3">
          <h3><b>Log <span class="text-primary">In</span></b></h3>
          <hr>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Email Address</label>
          <input class="form-control" type="email" placeholder="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input class="form-control" type="password" placeholder="password" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>
        <div class="mb-2">
          <button name="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Login</button>
        </div>
        <p class="form-text">anda belum punya akun?<a href="register.php"> buat disini aja bro!!</a></p>
      </form>
    </div>
  </div>
</body>
</html>

