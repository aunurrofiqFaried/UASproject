<?php 
include 'koneksi.php';
error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
    <title>Register</title>
</head>
<body>
    <div class="container d-flex min-vh-100 justify-content-center align-items-center">
        <div class="card w-75 shadow rounded">
            <form class="container pt-4 pb-2 ps-5 pe-5" action="" method="POST">
                <div class="mb-3">
                    <h3><b>Regis<span class="text-primary">ter</span></b></h3>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input class="form-control" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input class="form-control" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input class="form-control" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"><i><b>Re-type Password </b></i><span class="text-danger">*</span></label>
                    <input class="form-control" type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <div class="mb-2">
                    <button name="submit" class="btn btn-primary"><i class="bi bi-clipboard-plus"></i> Register</button>
                </div>
                <p class="form-text">Anda sudah punya akun? <a href="login.php">Login </a></p>
            </form>
        </div>
    </div>
</body>
</html>