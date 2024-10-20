<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toko Bullworth</title>
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <div class="box-login">
    <h2>Login</h2>
    <form action="" method="POST">
      <input type="text" name="user" placeholder="Username" class="input-control">
      <input type="password" name="pass" placeholder="Password" class="input-control">
      <input type="submit" name="submit" value="Login" class="login-btn">
    </form>
    <?php 
      if(isset($_POST['submit'])){
        session_start();
        include '../database/konekdb.php'; // File koneksi harus menggunakan sqlsrv

        // Amankan input dengan htmlspecialchars atau filter_input
        $user = htmlspecialchars($_POST['user']);
        $pass = htmlspecialchars($_POST['pass']);
        $hashed_pass = MD5($pass); // Simpan password sebagai MD5 hash sesuai dengan query

        // Query untuk mengecek user di SQL Server
        $sql = "SELECT * FROM tb_admin WHERE username = ? AND password = ?";
        $params = array($user, $hashed_pass);

        // Menjalankan query dengan prepared statement
        $stmt = sqlsrv_query($conn, $sql, $params);

        if($stmt === false){
          die(print_r(sqlsrv_errors(), true));
        }

        // Mengecek apakah user ditemukan
        if(sqlsrv_has_rows($stmt)){
          $c = sqlsrv_fetch_object($stmt);
          $_SESSION['status_login'] = true;
          $_SESSION['adn_global'] = $c;
          $_SESSION['id'] = $c->admin_id;
          //
          echo '<script>window.location="dashboard.php"</script>';
        } else {
          echo '<script>alert("Username atau Password Anda Salah!")</script>';
        }
      }
    ?>
  </div>
</body>
</html>
