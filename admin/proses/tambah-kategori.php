<?php 
session_start();
include '../../database/konekdb.php'; 
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title style="padding: 10px 0px;">Toko Bullworth</title>
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
  <header>
    <div class="container">
      <h1><a href="../dashboard.php">Toko Bullworth</a></h1>
      <ul>
        <li><a href="../dashboard.php">Dashboard</a></li>
        <li><a href="../profil.php">Profil</a></li>
        <li><a href="../kategori.php">Kategori</a></li>
        <li><a href="../logout.php"><img style="width : 15px" src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/64/ffffff/external-logout-real-estate-kmg-design-detailed-outline-kmg-design.png"/></a></li>
      </ul>
    </div>
  </header>

  <div class="section">
    <div class="container">
      <h3>Tambah Data Kategori</h3>
      <div class="box">
        <form action="" method="POST">
          <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
          <input type="submit" name="submit" value="SUBMIT" class="login-btn">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $nama = ucwords($_POST['nama']);

            // Gunakan sqlsrv_query untuk query ke SQL Server
            $insert = sqlsrv_query($conn, "INSERT INTO tb_kategori (kategori_name) VALUES (?)", array($nama));

            if ($insert) {
                echo '<script>alert("Tambah Data Berhasil")</script>';
                echo '<script>window.location="../kategori.php"</script>';
            } else {
                // Tampilkan pesan error jika query gagal
                echo 'Gagal Melakukan Penambahan Data: ' . print_r(sqlsrv_errors(), true);
            }
        }
        ?>
      </div>
    </div>
  </div>

  <footer style="padding: 25px 0px;">
    <div class="container">
    <small>Copyright &copy; 2024 - Satrio Wisnu Adi Pratama</small>
    </div>
  </footer>
</body>
</html>
