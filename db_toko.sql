-- Database: `db_toko` untuk SQL Server

-- Table structure for table `tb_admin`
CREATE TABLE tb_admin (
  admin_id INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  admin_name VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(100) NOT NULL,
  admin_telp VARCHAR(20) NOT NULL,
  admin_email VARCHAR(50) NOT NULL,
  admin_address TEXT NOT NULL
);

-- Dumping data for table `tb_admin`
INSERT INTO tb_admin (admin_name, username, password, admin_telp, admin_email, admin_address) VALUES
('Paijo', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08132655572', 'Sulis@admin.com', 'Jalan Gajah Mada, Kendal');

-- Table structure for table `tb_kategori`
CREATE TABLE tb_kategori (
  kategori_id INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  kategori_name VARCHAR(25) NOT NULL
);

-- Dumping data for table `tb_kategori`
INSERT INTO tb_kategori (kategori_name) VALUES
('Minyak Goreng'),
('Sabun Mandi');
