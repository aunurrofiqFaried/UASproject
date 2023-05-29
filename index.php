<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="flower.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
    *{
        font-family: 'Poppins', sans-serif;
    }
    </style>
    <title>index</title>
</head>
<body>
    <!-- startNav -->
    <nav class="navbar navbar-light bg-light shadow-lg mb-4">
    <div class="container">
        <a class="navbar-brand mb-0 h1" href="#"><b>Flower<span class="text-primary">ing</span></b></a>
        <div class="d-flex align-items-center">
            <a class="nav-link active text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasInput" href="#"><b>Input</b></a>
            <a class="nav-link active text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDashboard" href="#"><i class="bi bi-person-square" style="font-size: 1.5rem;"></i></a>
        </div>
    </div>
    </nav>
    <!-- endNav -->
    <!-- startInput -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasInput" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Input Data</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="input.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Flower :</label>
                    <input type="text" name="nama_bunga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Warna :</label>
                    <input type="text" name="warna" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Pasaran :</label>
                    <input type="text" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Detail :</label>
                    <textarea class="form-control" name="detail" rows="3"></textarea>
                </div>
                <input class="btn btn-success btn-md" type="submit" name="input" value="Simpan">
            </form>
        </div>
    </div>
    <!-- endInput -->
    <!-- startDashboard -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasDashboard" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Dashboard</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="">
                <div class="mb-3">
                    <label class="form-label">Username :</label>
                    <input type="text" class="form-control" disabled placeholder="<?php echo $_SESSION['username'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email :</label>
                    <input type="text" class="form-control" disabled placeholder="<?php echo $_SESSION['email'] ?>">
                </div>
            </form>
            <form action="" method="POST">
            <a href="logout.php" class="btn btn-danger btn-md"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </form>
        </div>
    </div>
    <!-- endDashboard -->
    <!-- startView -->
    <div class="container">
        <div class="row">
            <?php
            include "koneksi.php";
                $query = "SELECT * FROM bunga ORDER BY id ASC";
                $result = mysqli_query($con, $query);
                if (!$result) {
                die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
                }
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-6 col-md-4'>";
                    echo '<div class="card shadow-lg mt-2 mb-3">';
                    echo '<div class="card-body">';
                    echo "<h5 class='card-title'><b>Flower : $data[nama_bunga]</b></h5>";
                    echo "<h6 class='card-title'><b>Harga Pasar : Rp.$data[harga]</b></h6>";
                    echo "<h6 class='card-title'>Warna : $data[warna]</h6>";
                    echo "<p class='card-text'>$data[detail]</p>";
                    echo '<div>
                            <a class="btn btn-warning btn-sm" href="edit.php?id='.$data['id'].'">Edit</a>
                            <a class="btn btn-danger btn-sm" href="hapus.php?id='.$data['id'].'" onclick="return  confirm(\'anda yakin ingin hapus data ini?\')">Hapus</a>
                        </div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
            
        </div>
    </div>
    <!-- endView -->
</body>
</html>




