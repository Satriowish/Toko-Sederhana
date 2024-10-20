<?php 
  
  session_start() ;
  if($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>' ;
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
        <li><a href="kategori.php">Produk</a></li>
        
        <li><a href="logout.php"><img style="width : 15px " src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/64/ffffff/external-logout-real-estate-kmg-design-detailed-outline-kmg-design.png"/></a></li>
      </ul>
    </div>
  </header>

  <div class="section">
    <div class="container">
      <h3>Dashboard</h3>
      <div class="box">
        <h4>Selamat Datang <?php echo $_SESSION['adn_global'] -> admin_name   ?> di Toko SMAI Bullworth </h4>
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