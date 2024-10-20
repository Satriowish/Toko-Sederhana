<?php 
session_start();
include '../database/konekdb.php';
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
  <title>Toko Bullworth</title>
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <div class="container">
      <h1><a href="dashboard.php">Toko Bullworth</a></h1>
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="kategori.php">Kategori</a></li>
        <li><a href="logout.php"><img style="width: 15px" src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/64/ffffff/external-logout-real-estate-kmg-design-detailed-outline-kmg-design.png"/></a></li>
      </ul>
    </div>
  </header>

  <div class="section">
    <div class="container">
      <h3>Kategori</h3>
      <div class="box">
        <p style="margin-bottom: 15px;"><a href="proses/tambah-kategori.php">Tambah Data Kategori</a></p>
        <table border="1" cellspacing="0" class="table">
          <thead>
            <tr>
              <th width="60px">No</th>
              <th width="70%">Produk</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $nomor = 1;
              // Ganti mysqli_query() dengan sqlsrv_query()
              $kategori = sqlsrv_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");

              // Gunakan sqlsrv_fetch_array() untuk SQL Server
              while ($row = sqlsrv_fetch_array($kategori, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
              <td><?php echo $nomor++ ?></td>
              <td><?php echo $row['kategori_name'] ?></td>
              <td style="text-align: center;">
                <a href="proses/edit-kategori.php?id=<?php echo $row['kategori_id'] ?>">
                  <input type="submit" name="edit" value="Edit" class="edit_btn">
                </a> 
                <a href="proses/hapus-kategori.php?id=<?php echo $row['kategori_id'] ?>" onclick="return confirm('Yakin Menghapus Data ?')">
                  <input type="submit" name="delete" value="DELETE" class="delete_btn">
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <small>Copyright &copy; 2024 - Satrio Wisnu Adi Pratama</small>
    </div>
  </footer>
</body>
</html>
