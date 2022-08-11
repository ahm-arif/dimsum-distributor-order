-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 04:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(7) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `jumlah_stock` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `kategori`, `deskripsi`, `jumlah_stock`) VALUES
(1, 'Dimsum Bestie', 150000, 'Frozen', 'Dimsum dengan 4 topping (crab)', 100),
(3, 'Dimsum Mix A', 185000, 'Non Frozen', 'Dimsum Premium dengan 4 topping (salmon)', 100),
(4, 'Dimsum Kamal', 1000000, 'Frozen', 'Dimsum paling enak sedunia', 99999);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(2) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul`, `isi`) VALUES
(1, 'Dimsum Salmon', '<p>Dimsum Salmon&nbsp;<span style=\"font-family:arial,helvetica,sans-serif\">merupakan perusahaan yang bergerak di bidang produksi makanan yaitu berupa Dimsum dan beberapa jenis lainnya. Kami selaku Distributor Jakarta memiliki jasa ekspedisi pengiriman yang bertempat dipusat kota Jakarta. Untuk itu kami Distributor Jakarta </span><span style=\"font-family:arial,helvetica,sans-serif\">terlahir untuk membantu seluruh agen atau stockis dalam mendapatkan atau memasok seluruh produk dari Dimsum Salmon.</span></p>'),
(2, 'Layanan Dimsum Salmon Order', '<p>Layanan jasa yang dimiliki oleh Distributor Dimsum Salmon Jakarta sebagai berikut:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Pengiriman Produk</strong></p>\r\n\r\n<p style=\"text-align:justify\">Layanan yang memberikan kepastian pengiriman kepada penerima, dengan sistem pembayaran dapat dilakukan secara tunai pada saat penyerahan kiriman.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Packing</strong></p>\r\n\r\n<p style=\"text-align:justify\">Kami memastikan kondisi dan keamanan barang atau paket diterima dengan kondisi dan kemasan yang memadai.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Konsultasi</strong></p>\r\n\r\n<p style=\"text-align:justify\">Kami menyediakan jasa konsultasi untuk memenuhi kebutuhan yaitu berupa waktu pengantara, jumlah stock, berbagai jenis penyimpanan seperti Freezer dan lain-lain.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Saran dan Masukan (Feedback)</strong></p>\r\n\r\n<p style=\"text-align:justify\">Kami menyediakan tempat untuk menampung saran dan masukan demi kenyamanan dan kemajuan bersama. Saran dan masukan akan diteruskan ke pusat dan akan ditindaklanjuti berdasarkan kesepakatan bersama.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_polisi` varchar(11) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `no_mesin` varchar(17) NOT NULL,
  `tahun` char(4) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `supir` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`no_polisi`, `merk`, `no_mesin`, `tahun`, `warna`, `supir`) VALUES
('B1234ABC', 'Toyota', '123456789', '2022', 'Silver', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_ktp` varchar(16) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `is_distributor` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`no_ktp`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `telepon`, `is_distributor`) VALUES
('12345', 'Stockist Pesanggrahan', 'Laki-laki', 'Jalan Gelora no.11 Pesanggrahan Jakarta Selatan', '08121000386', 'Y'),
('56789', 'Stockist Pademangan', 'Laki-laki', 'Pademangan - Jakarta Pusat', '0888843719', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `hak_akses` enum('Admin','Finance') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_pengguna`, `hak_akses`) VALUES
(1, 'supervisor', '09348c20a019be0318387c08df7a783d', 'Supervisor', 'Admin'),
(2, 'finance', '57336afd1f4b40dfd9f5731e35302fe5', 'Finance', 'Finance'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `no_pengiriman` varchar(50) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `alamat_penerima` varchar(100) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `berat_barang` int(11) DEFAULT NULL,
  `biaya_kirim` int(11) DEFAULT NULL,
  `kendaraan` varchar(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`no_pengiriman`, `tgl_pengiriman`, `pengirim`, `penerima`, `alamat_penerima`, `nama_barang`, `jumlah_barang`, `berat_barang`, `biaya_kirim`, `kendaraan`, `status`) VALUES
('OR-221000000000001', '2022-08-09', 'Stockist Pesanggrahan', '56789', 'Pademangan - Jakarta Pusat', 'Dimsum Bestie', 50, NULL, NULL, NULL, 'Proses Pengiriman'),
('OR-221000000000002', '2022-08-10', 'Stockist Pesanggrahan', '56789', 'Pademangan - Jakarta Pusat', 'Dimsum Bestie', 100, NULL, NULL, NULL, 'Proses Pengiriman'),
('OR-221000000000003', '2022-08-10', 'Stockist Pesanggrahan', '56789', 'Pademangan - Jakarta Pusat', 'Dimsum Mix A', 3, NULL, NULL, NULL, 'Barang Terkirim'),
('OR-221000000000004', '2022-08-10', 'Stockist Pesanggrahan', '56789', 'Pademangan - Jakarta Pusat', 'Dimsum Mix A', 10, NULL, NULL, NULL, 'Proses Pengiriman');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `no_ktp` varchar(16) NOT NULL,
  `nama_supir` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`no_ktp`, `nama_supir`, `alamat`, `telepon`) VALUES
('12345', 'Driver A', '-', '081210000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_polisi`),
  ADD KEY `supir` (`supir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`no_pengiriman`),
  ADD KEY `pelanggan` (`penerima`) USING BTREE;

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`no_ktp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`supir`) REFERENCES `supir` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`kendaraan`) REFERENCES `kendaraan` (`no_polisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
