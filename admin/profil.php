<?php 
session_start();
include '../database/konekdb.php'; 
if($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$query = sqlsrv_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
$d = sqlsrv_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title style="padding: 10px 0px;">Toko Bullworth</title>
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/profil.css">
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
      <h3>Profil</h3>
      <div class="box">
        <form action="" method="POST">
          <input type="text" name="nama" placeholder="Nama Lengkap"  class="input-control" 
          value="<?php echo $d->admin_name ?>" required>
          <input type="text" name="user" placeholder="Username"  class="input-control"
          value="<?php echo $d->username ?>" required>
          <input type="text" name="hp" placeholder="No Hp"  class="input-control"
          value="<?php echo $d->admin_telp ?>" required>
          <input type="email" name="email" placeholder="Email"  class="input-control" 
          value="<?php echo $d->admin_email ?>" required>
          <input type="text" name="alamat" placeholder="Alamat"  class="input-control" 
          value="<?php echo $d->admin_address ?>" required>
          <input type="submit" name="submit" value="Ubah Profil" class="login-btn">
        </form>
        <?php 
          if (isset($_POST['submit'])) {
            $nama = ucwords($_POST['nama']);
            $user = $_POST['user'];
            $hp = $_POST['hp']; 
            $email = ucwords($_POST['email']);
            $alamat = $_POST['alamat'];

            $update = sqlsrv_query($conn, "UPDATE tb_admin SET
              admin_name = '".$nama."', 
              username = '".$user."', 
              admin_telp = '".$hp."', 
              admin_email = '".$email."', 
              admin_address = '".$alamat."' 
              WHERE admin_id = '".$d->admin_id."'");

            if ($update) {
              echo '<script>alert("Ubah data berhasil")</script>';
              echo '<script>window.location="dashboard.php"</script>';
            } else {
              echo 'gagal: ' . print_r(sqlsrv_errors(), true);
            }
          }
        ?>
      </div>
      <h3>Ubah Password</h3>
      <div class="box">
        <form action="" method="POST">
          <input type="password" name="pass1" placeholder="Password Baru"  class="input-control" required>
          <input type="password" name="pass2" placeholder="Konfirmasi Password Baru"  class="input-control" required>
          <input type="submit" name="ubah_password" value="Ubah Password" class="login-btn">
        </form>
        <?php 
          if (isset($_POST['ubah_password'])) {
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            if ($pass2 != $pass1) {
              echo '<script>alert("Password Tidak Sesuai")</script>';
            } else {
              $update_pass = sqlsrv_query($conn, "UPDATE tb_admin SET
                password = '".md5($pass1)."' 
                WHERE admin_id = '".$d->admin_id."'");

              if ($update_pass) {
                echo '<script>alert("Ubah password berhasil")</script>';
                echo '<script>window.location="dashboard.php"</script>';
              } else {
                echo 'gagal: ' . print_r(sqlsrv_errors(), true);
              }
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
