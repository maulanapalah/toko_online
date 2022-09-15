-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 05:43 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwm_tokonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_berita` varchar(100) NOT NULL,
  `nama_berita` varchar(100) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `id_kategori`, `kode_berita`, `nama_berita`, `slug_berita`, `keywords`, `status_berita`, `keterangan`, `gambar`, `tanggal_post`, `tanggal_update`) VALUES
(7, 1, 0, 'diskon', 'Diskon Akhir Tahun', 'diskon-akhir-tahun-diskon', 'Diskon Akhir Tahun   ', 'Publish', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '4.jpg', '2020-10-01 17:34:00', '2020-10-01 15:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `berita_kategori`
--

CREATE TABLE `berita_kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita_kategori`
--

INSERT INTO `berita_kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(0, 'berita', 'Berita', 2, '2020-09-26 13:53:21'),
(1, 'blog', 'Blog', 1, '2020-09-26 13:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(1, 1, 'Atomic BagPack-Black2', 'tas2-2.jpg', '2019-10-14 04:34:29'),
(2, 1, 'Atomic BagPack-Black3', 'tas2-3.jpg', '2019-10-14 04:34:47'),
(3, 1, 'Atomic BagPack-Black4', 'tas2-6.jpg', '2019-10-14 04:35:03'),
(4, 2, 'Atomic BagPack-Army2', 'tas1-2.jpg', '2019-10-14 06:14:45'),
(5, 2, 'Atomic BagPack-Army3', 'tas1-3.jpg', '2019-10-14 06:14:59'),
(6, 2, 'Atomic BagPack-Army4', 'tas1-6.jpg', '2019-10-14 06:15:13'),
(7, 3, 'Naco Tshirt-Black2', 'sablon20.jpg', '2019-10-16 04:09:58'),
(8, 4, 'Moeru Tshirt-Navy2', 'sablon19-2.jpg', '2019-10-16 04:13:44'),
(9, 4, 'Moeru Tshirt-Navy3', 'sablon19.jpg', '2019-10-16 04:14:02'),
(10, 5, 'Burga Tshirt-Navy2', 'sablon7.jpg', '2019-10-16 04:17:12'),
(11, 6, 'Beach Clubs-Grey2', 'belakang1.jpg', '2019-10-16 04:20:42'),
(12, 6, 'Beach Clubs-Grey3', 'sablon1.jpg', '2019-10-16 04:20:58'),
(13, 6, 'Beach Clubs-Grey4', 'sablon1-2.jpg', '2019-10-16 04:21:12'),
(14, 7, 'Alexa Tshirt-Black2', 'sablon2.jpg', '2019-10-16 04:35:53'),
(15, 8, 'Allonza Tshirt-Black2', 'sablon3.jpg', '2019-10-16 04:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(13, 0, 1, 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '08989898998', 'jln.letnan hatta soekirman', '14102019ZMGKLU4G', '2019-10-14 00:00:00', 4625000, 'Konfirmasi', 4625000, '724862487', 'raihan palah maulana', 'logotb18.png', 5, '25-09-2020', 'Bank Mandiri', '2019-10-14 06:35:41', '2020-09-26 13:59:58'),
(18, 0, 6, 'nando', 'nando@gmail.com', '08989898998', 'jalan jlaan', '16102019ULM3Z7DP', '2019-10-16 00:00:00', 185000, 'Konfirmasi', 185000, '766414687', 'nando akbar johansyah', 'logotb1.png', 5, '02-12-2019', 'Bank Mandiri', '2019-10-16 06:14:27', '2020-09-26 14:00:09'),
(19, 0, 1, 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '08989898998', 'jln.letnan hatta soekirman', '231020193VFTJ7WT', '2019-10-23 00:00:00', 185000, 'Konfirmasi', 185000, '724862487', 'Riyaldi putra', 'flat-design-landscape-of-japan-clipart-vector_csp23150152.jpg', 4, '02-12-2019', 'Bank BRI', '2019-10-23 10:37:59', '2020-09-26 14:00:17'),
(20, 0, 1, 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '08989898998', 'jln.letnan hatta soekirman', '20112019G1SRXY5W', '2019-11-20 00:00:00', 18500000, 'Konfirmasi', 18500000, '724862487', 'raihan palah maulana', '693661.png', 5, '02-12-2019', 'Bank BCA', '2019-11-20 08:46:06', '2020-09-26 14:00:22'),
(21, 0, 7, 'Meita Rusmawati', 'meitarusmawati@gmail.com', '08989898998', 'Jln.buntu', '04122019TBOKP0AQ', '2019-12-04 00:00:00', 185000, 'Konfirmasi', 185000, '724862487', 'Meita Rusmawati', 'logotb110.png', 5, '25-09-2020', 'Bank Mandiri', '2019-12-04 05:22:24', '2020-09-26 14:00:26'),
(22, 0, 1, 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '08989898998', 'jln.letnan hatta soekirman', '04122019ZJO4NWLB', '2019-12-04 00:00:00', 370000, 'Konfirmasi', 370000, '724862487', 'raihan palah maulana', 'logotb17.png', 5, '25-09-2020', 'Bank Mandiri', '2019-12-04 05:28:02', '2020-09-26 14:00:31'),
(23, 0, 1, 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '08989898998', 'jln.letnan hatta soekirman', '04122019TP8XPCBI', '2019-12-04 00:00:00', 720000, 'Konfirmasi', 720000, '724862487', 'raihan palah maulana', 'logotb16.png', 5, '25-09-2020', 'Bank Mandiri', '2019-12-04 06:00:39', '2020-09-26 14:00:35'),
(24, 0, 8, 'Rivana Jauhara Putri', 'rivana@gmail.com', '08989898998', 'Jalan masjid', '06122019AC62CWPK', '2019-12-06 00:00:00', 185000, 'Konfirmasi', 185000, '894891412', 'Rivana Jauhara Putri', 'logotb11.png', 5, '06-12-2019', 'BANK BCA Cabang Depok', '2019-12-06 10:58:45', '2020-09-26 14:00:39'),
(25, 0, 9, 'Gia', 'gia@gmail.com', '08989898998', 'Depok', '16092020KBLRI0NS', '2020-09-16 00:00:00', 185000, 'Konfirmasi', 185000, '724862487', 'Gia', 'logotb19.png', 5, '25-09-2020', 'Bank BCA', '2020-09-16 07:28:55', '2020-09-26 13:58:57'),
(26, 0, 9, 'Gia', 'gia@gmail.com', '08989898998', 'Depok', '1609202010PZ8YO3', '2020-09-16 00:00:00', 185000, 'Konfirmasi', 185000, '724862487', 'Gia', 'logotb14.png', 5, '16-09-2020', 'Bank BCA', '2020-09-16 07:29:37', '2020-09-26 13:59:02'),
(27, 0, 9, 'Gia', 'gia@gmail.com', '08989898998', 'Depok', '160920208HRDMWQV', '2020-09-16 00:00:00', 2220000, 'Konfirmasi', 2220000, '724862487', 'Gia', 'logotb15.png', 5, '16-09-2020', 'Bank Mandiri', '2020-09-16 08:35:37', '2020-09-26 13:59:05'),
(28, 0, 7, 'Meita Rusmawati', 'meitarusmawati@gmail.com', '08989898998', 'Jln.buntu', '25092020LCN8TTKO', '2020-09-25 00:00:00', 3700000, 'Konfirmasi', 3700000, '724862487', 'raihan palah maulana', 'logotb111.png', 5, '25-09-2020', 'Bank Mandiri', '2020-09-25 19:15:32', '2020-09-26 14:00:45'),
(32, 0, 7, 'Meita Rusmawati', 'meitarusmawati@gmail.com', '08989898998', 'Jln.buntu', '25092020GWMFOAIN', '2020-09-25 00:00:00', 1850000, 'Konfirmasi', 1850000, '724862487', 'meita', 'logotb112.png', 5, '26-09-2020', 'Bank Mandiri', '2020-09-25 20:19:51', '2020-09-26 14:00:50'),
(33, 0, 7, 'Meita Rusmawati', 'meitarusmawati@gmail.com', '08989898998', 'Jln.buntu', '26092020L6XN48AJ', '2020-09-26 00:00:00', 350000, 'Konfirmasi', 350000, '724862487', 'meita', 'flat-design-landscape-of-japan-clipart-vector_csp231501521.jpg', 5, '26-09-2020', 'Bank BCA', '2020-09-26 13:48:18', '2020-09-26 14:00:54'),
(34, 0, 1, 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '08989898998', 'jln.letnan hatta soekirman', '26092020JWMWDB8L', '2020-09-26 00:00:00', 1850000, 'Konfirmasi', 1850000, '724862487', 'Raihan', 'logotb113.png', 5, '26-09-2020', 'Bank Mandiri', '2020-09-26 14:06:45', '2020-09-26 14:00:59'),
(35, 0, 1, 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '08989898998', 'jln.letnan hatta soekirman', '26092020LLC9C2MW', '2020-09-26 00:00:00', 185000, 'Konfirmasi', 185000, '724862487', 'Raihan', 'logotb114.png', 5, '26-09-2020', 'Bank Mandiri', '2020-09-26 14:21:30', '2020-09-26 14:01:03'),
(36, 0, 1, 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '08989898998', 'jln.letnan hatta soekirman', '26092020M8FUF7SA', '2020-09-26 00:00:00', 2220000, 'Konfirmasi', 2220000, '724862487', 'Raihan', 'logotb115.png', 5, '26-09-2020', 'Bank BCA', '2020-09-26 14:32:18', '2020-09-26 14:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(6, 't-shirt', 'T-Shirt', 1, '2019-10-14 04:20:55'),
(7, 'bags', 'Bags', 2, '2019-10-14 04:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'RPshop', 'LifeStyle', 'RPshopLifeStyle@gmail.com', 'http://RPshoLifestyle.com', '      Distro                                   ', '            oke                                                ', '0895331408620', '            Jln.Letnan Hatta Soekirman                               ', 'https://facebook.com/RPshop_LifeStyle', 'https://instagram.com/RPshop_LifeStyle', '            RPshop LifeStyle                                 ', 'logo3.png', 'logo2.png', '            09090909                                       ', '2019-12-06 09:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 0, 'Pending', 'Raihan Palah Maulana', 'maulanaraihan2911@gmail.com', '3819dad48afadb4bd1767620152893fd994e13ce', '0895331408620', 'jln.letnan hatta soekirman', '2019-08-28 01:56:26', '2019-09-26 06:35:42'),
(6, 0, 'Pending', 'nando', 'nando@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '089230285235', 'jalan jlaan', '2019-08-30 09:08:43', '2020-09-16 05:33:00'),
(7, 0, 'Pending', 'Meita Rusmawati', 'meitarusmawati@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '089520027867', 'Jln.buntu', '2019-12-04 05:01:42', '2020-09-25 17:13:50'),
(8, 0, 'Pending', 'Rivana Jauhara Putri', 'rivana@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '089588692633', 'Jalan masjid', '2019-12-06 08:23:56', '2019-12-06 07:23:56'),
(9, 0, 'Pending', 'Gia', 'gia@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '08989898998', 'Depok', '2020-09-16 07:28:40', '2020-09-16 05:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(1, 1, 7, 'Atomic BagPack-Black', 'Atomic BagPack-Black', 'atomic-bagpack-black-atomic-bagpack-black', '<p>Shining Bright</p>\r\n', '            Atomic BagPack-Black        ', 350000, 100, 'tas2-1.jpg', 0, '-', 'Publish', '2019-10-14 06:33:30', '2019-12-02 04:30:08'),
(2, 1, 7, 'Atomic BagPack-Army', 'Atomic BagPack-Army', 'atomic-bagpack-army-atomic-bagpack-army', '<p>Shining Bright</p>\r\n', 'Atomic BagPack-Army', 350000, 99, 'tas1.jpg', 0, '-', 'Publish', '2019-10-14 08:14:11', '2020-09-26 11:48:18'),
(3, 1, 6, 'Naco Tshirt-Black', 'Naco Tshirt-Black', 'naco-tshirt-black-naco-tshirt-black', '<p>Shining Bright</p>\r\n', 'Naco Tshirt-Black ', 185000, 100, 'baju20.jpg', 0, '-', 'Publish', '2019-10-16 06:08:53', '2019-10-16 04:08:53'),
(4, 1, 6, 'Moeru Tshirt-Navy', 'Moeru Tshirt-Navy', 'moeru-tshirt-navy-moeru-tshirt-navy', '<p>Shining Bright</p>\r\n', 'Moeru Tshirt-Navy', 185000, 90, 'baju19.jpg', 0, '-', 'Publish', '2019-10-16 06:13:22', '2020-09-25 18:19:52'),
(5, 1, 6, 'Burga Tshirt-Navy', 'Burga Tshirt-Navy', 'burga-tshirt-navy-burga-tshirt-navy', '<p>Shining Bright</p>\r\n', 'Burga Tshirt-Navy', 185000, 99, 'baju7.jpg', 0, '-', 'Publish', '2019-10-16 06:16:47', '2020-09-26 12:21:30'),
(6, 1, 6, 'Beach Clubs-Grey', 'Beach Clubs-Grey', 'beach-clubs-grey-beach-clubs-grey', '<p>Shining Bright</p>\r\n', 'Beach Clubs-Grey', 185000, 100, 'baju1.jpg', 0, '-', 'Publish', '2019-10-16 06:20:21', '2019-10-16 04:20:21'),
(7, 1, 6, 'Alexa Tshirt-Black', 'Alexa Tshirt-Black', 'alexa-tshirt-black-alexa-tshirt-black', '<p>Shining Bright</p>\r\n', 'Alexa Tshirt-Black', 185000, 78, 'baju2.jpg', 0, '-', 'Publish', '2019-10-16 06:35:31', '2020-09-26 12:32:18'),
(8, 1, 6, 'Allonza Tshirt-Black', 'Allonza', 'allonza-allonza-tshirt-black', '<p>Shining Bright</p>\r\n', '      Allonza Tshirt-Black    ', 185000, 100, 'baju3.jpg', 0, '-', 'Publish', '2019-10-16 06:37:10', '2019-11-23 07:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomer_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomer_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(4, 'Bank BRI Syariah', '13131313', 'Riyaldi', NULL, '2019-08-30 10:45:11'),
(5, 'Bank BCA', '15672389', 'Raihan Palah Maulana', NULL, '2019-12-02 03:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(16, 0, 1, '14102019ZMGKLU4G', 1, 185000, 25, 4625000, '2019-10-14 00:00:00', '2019-10-14 04:35:41'),
(17, 0, 6, '16102019HNVMRLUQ', 2, 350000, 50, 17500000, '2019-10-16 00:00:00', '2019-10-16 02:58:04'),
(18, 0, 6, '16102019ELNGUOBI', 1, 185000, 200, 37000000, '2019-10-16 00:00:00', '2019-10-16 03:45:16'),
(19, 0, 6, '16102019GHINSYWB', 2, 350000, 1000, 350000000, '2019-10-16 00:00:00', '2019-10-16 04:03:12'),
(20, 0, 6, '16102019TKO3AQSG', 3, 185000, 11, 2035000, '2019-10-16 00:00:00', '2019-10-16 04:11:50'),
(21, 0, 6, '16102019ULM3Z7DP', 4, 185000, 1, 185000, '2019-10-16 00:00:00', '2019-10-16 04:14:27'),
(22, 0, 1, '231020193VFTJ7WT', 7, 185000, 1, 185000, '2019-10-23 00:00:00', '2019-10-23 08:37:59'),
(23, 0, 1, '20112019G1SRXY5W', 8, 185000, 100, 18500000, '2019-11-20 00:00:00', '2019-11-20 07:46:07'),
(24, 0, 7, '04122019TBOKP0AQ', 7, 185000, 1, 185000, '2019-12-04 00:00:00', '2019-12-04 04:22:24'),
(25, 0, 1, '04122019ZJO4NWLB', 6, 185000, 1, 185000, '2019-12-04 00:00:00', '2019-12-04 04:28:02'),
(26, 0, 1, '04122019ZJO4NWLB', 7, 185000, 1, 185000, '2019-12-04 00:00:00', '2019-12-04 04:28:02'),
(27, 0, 1, '04122019TP8XPCBI', 8, 185000, 1, 185000, '2019-12-04 00:00:00', '2019-12-04 05:00:39'),
(28, 0, 1, '04122019TP8XPCBI', 7, 185000, 1, 185000, '2019-12-04 00:00:00', '2019-12-04 05:00:39'),
(29, 0, 1, '04122019TP8XPCBI', 2, 350000, 1, 350000, '2019-12-04 00:00:00', '2019-12-04 05:00:39'),
(30, 0, 8, '06122019AC62CWPK', 8, 185000, 1, 185000, '2019-12-06 00:00:00', '2019-12-06 09:58:45'),
(31, 0, 9, '16092020KBLRI0NS', 7, 185000, 1, 185000, '2020-09-16 00:00:00', '2020-09-16 05:28:55'),
(32, 0, 9, '1609202010PZ8YO3', 8, 185000, 1, 185000, '2020-09-16 00:00:00', '2020-09-16 05:29:37'),
(33, 0, 9, '160920208HRDMWQV', 7, 185000, 2, 370000, '2020-09-16 00:00:00', '2020-09-16 06:35:38'),
(34, 0, 9, '160920208HRDMWQV', 6, 185000, 10, 1850000, '2020-09-16 00:00:00', '2020-09-16 06:35:38'),
(35, 0, 7, '25092020LCN8TTKO', 3, 185000, 10, 1850000, '2020-09-25 00:00:00', '2020-09-25 17:15:32'),
(36, 0, 7, '25092020LCN8TTKO', 8, 185000, 10, 1850000, '2020-09-25 00:00:00', '2020-09-25 17:15:32'),
(38, 0, 7, '25092020GWMFOAIN', 4, 185000, 10, 1850000, '2020-09-25 00:00:00', '2020-09-25 18:19:52'),
(39, 0, 7, '26092020L6XN48AJ', 2, 350000, 1, 350000, '2020-09-26 00:00:00', '2020-09-26 11:48:18'),
(40, 0, 1, '26092020JWMWDB8L', 7, 185000, 10, 1850000, '2020-09-26 00:00:00', '2020-09-26 12:06:45'),
(41, 0, 1, '26092020LLC9C2MW', 5, 185000, 1, 185000, '2020-09-26 00:00:00', '2020-09-26 12:21:30'),
(42, 0, 1, '26092020M8FUF7SA', 7, 185000, 12, 2220000, '2020-09-26 00:00:00', '2020-09-26 12:32:18');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN 
UPDATE produk SET stok=stok-NEW.jumlah
WHERE id_produk=NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'Raihan Palah Maulana', 'Maulanaraihan2911@gmail.com', 'raihan_palah', '3819dad48afadb4bd1767620152893fd994e13ce', 'Admin', '2019-09-26 06:34:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `berita_kategori`
--
ALTER TABLE `berita_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomer_rekening` (`nomer_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
