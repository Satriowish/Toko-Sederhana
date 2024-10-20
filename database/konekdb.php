<?php 
  // Informasi koneksi
$serverName = "SATRIOWISNU\SQLEXPRESS";
$connectionOptions = array(
  "Database" => "db_toko",  // Nama database
  "Uid" => "",              // Username SQL Server, sesuaikan jika berbeda
  "PWD" => ""               // Password SQL Server, sesuaikan jika berbeda
);

// Membuat koneksi ke SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Mengecek koneksi berhasil atau gagal
if ($conn === false) {
  die(print_r(sqlsrv_errors(), true)); // Tampilkan pesan error jika gagal
} else {
  // echo "Koneksi berhasil ke SQL Server!";
}
?>
