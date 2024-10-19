<?php 

include 'konekdb.php';

// Pastikan ID dikirim melalui URL
if (isset($_GET['id'])) {
    // Ambil ID dari parameter URL
    $id = $_GET['id'];

    // Siapkan query untuk menghapus data
    $query = "DELETE FROM tb_kategori WHERE kategori_id = ?";
    $params = array($id);

    // Eksekusi query
    $delete = sqlsrv_query($conn, $query, $params);

    if ($delete) {
        // Jika berhasil, redirect ke halaman kategori
        echo '<script>alert("Kategori berhasil dihapus");</script>';
        echo '<script>window.location="kategori.php"</script>';
    } else {
        // Jika gagal, tampilkan pesan error
        echo 'Gagal menghapus data: ' . print_r(sqlsrv_errors(), true);
    }
}

// Tutup koneksi jika diperlukan (optional)
sqlsrv_close($conn);

?>
