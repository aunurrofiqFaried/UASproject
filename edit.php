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
            <a class="nav-link active text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDashboard" href="#"><i class="bi bi-person-square" style="font-size: 1.5rem;"></i></a>
        </div>
    </div>
    </nav>
    <!-- endNav -->
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
    <?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
      $id = ($_GET['id']);

      $query = "SELECT * FROM bunga WHERE id = '$id'";
      $result = mysqli_query($con, $query);

      if (!$result) {
        die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
      }

      $data = mysqli_fetch_assoc($result);
      $id = $data["id"];
      $nama_bunga = $data["nama_bunga"];
      $warna = $data["warna"];
      $harga = $data["harga"];
      $detail = $data["detail"];
    }else {
      header ("Location: index.php");
    }
    ?>
<!-- startEdit -->
<div class="container">
  <div class="card rounded shadow">
    <div class="card-body">
      <form action="p_edit.php" method="POST">
        <div class="mb-2">
          <label for="" class="form-label h4"><b><span class="text-primary">Edit</span> Data</b></label>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Nama Bunga</label>
          <input name="id" type="text" class="form-control" value="<?php echo $id ?>" hidden>
          <input name="nama_bunga" type="text" class="form-control" value="<?php echo $nama_bunga ?>" required>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Warna</label>
          <input name="warna" type="text" class="form-control" value="<?php echo $warna ?>" required>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Harga</label>
          <input name="harga" type="text" class="form-control" value="<?php echo $harga ?>" required>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Warna</label>
          <textarea name="detail" class="form-control" name="" id="" cols="30" required><?php echo htmlspecialchars($detail); ?></textarea>
        </div>
        <div class="mb-3 d-flex justify-content-end">
          <input type="submit" name="edit" value="Update" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- endEdit -->
</body>
</html>