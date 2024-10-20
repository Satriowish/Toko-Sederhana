<?php 
session_start();
include '../../database/konekdb.php'; 
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Mengambil data kategori berdasarkan ID
$id = $_GET['id'];
$query = "SELECT * FROM tb_kategori WHERE kategori_id = ?";
$params = array($id);
$kategori = sqlsrv_query($conn, $query, $params);

if ($kategori === false) {
    echo '<script>window.location="../admin/kategori.php"</script>';
} else {
    $o = sqlsrv_fetch_object($kategori); // Hanya panggil sekali
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
        <li><a href="../produk.php">Produk</a></li>
        <li><a href="../logout.php"><img style="width: 15px" src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/64/ffffff/external-logout-real-estate-kmg-design-detailed-outline-kmg-design.png"/></a></li>
      </ul>
    </div>
  </header>

  <div class="section">
    <div class="container">
      <h3>Edit Data Kategori</h3>
      <div class="box">
        <form action="" method="POST">
          <input type="text" name="nama" placeholder="Nama Kategori" value="<?php echo isset($o->kategori_name) ? $o->kategori_name : ''; ?>" class="input-control" required>
          <input type="submit" name="submit" value="SUBMIT" class="login-btn">
        </form>

        <?php
        // Proses saat tombol submit diklik
        if (isset($_POST['submit'])) {
            $nama = ucwords($_POST['nama']);

            // Query untuk update kategori
            $updateQuery = "UPDATE tb_kategori SET kategori_name = ? WHERE kategori_id = ?";
            $paramsUpdate = array($nama, $id);  // Gunakan $id yang sudah diambil
            $update = sqlsrv_query($conn, $updateQuery, $paramsUpdate);

            if ($update === false) {
                echo 'Gagal Melakukan Update Data: ' . print_r(sqlsrv_errors(), true);
            } else {
                echo '<script>alert("Edit Data Berhasil")</script>';
                echo '<script>window.location="../kategori.php"</script>';
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
