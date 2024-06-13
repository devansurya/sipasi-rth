-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2024 at 04:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipasi_rth`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_reservasi`
--

CREATE TABLE `fasilitas_reservasi` (
  `id_fasilitas_reservasi` int NOT NULL,
  `id_rth` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `luas` int DEFAULT NULL,
  `kapasitas` int DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas_reservasi`
--

INSERT INTO `fasilitas_reservasi` (`id_fasilitas_reservasi`, `id_rth`, `nama`, `luas`, `kapasitas`, `foto`, `deskripsi`) VALUES
(1, 1, 'Aula Serbaguna', 200, 80, 'aula-serba-guna.jpeg', 'Aula dengan panggung dan kursi untuk kebutuhan agenda rapat'),
(7, 5, 'lapangan', 400, 200, 'img1717996887.jpg', 'lapangan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengaduan`
--

CREATE TABLE `jenis_pengaduan` (
  `id_jenispengaduan` int NOT NULL,
  `jenis_pengaduan` varchar(55) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pengaduan`
--

INSERT INTO `jenis_pengaduan` (`id_jenispengaduan`, `jenis_pengaduan`, `deskripsi`) VALUES
(1, 'Kebersihan', 'Masalah terkait area yang kotor, sampah yang tidak terkelola, atau tumpukan daun yang tidak dibersihkan.'),
(2, 'Kerusakan Fasilitas', 'Kerusakan pada bangku, lampu taman yang padam, atau fasilitas umum lainnya yang rusak.'),
(3, 'Keamanan', 'Aktivitas mencurigakan, pencurian, atau masalah terkait keselamatan umum di area tersebut.'),
(4, 'Perawatan Tanaman', 'Tanaman yang tidak terawat, vegetasi yang mati, atau adanya hama yang merusak tanaman.'),
(5, 'Aksesibilitas', 'Masalah aksesibilitas untuk penyandang disabilitas, orang tua, atau anak-anak di ruang terbuka hijau.');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_reservasi`
--

CREATE TABLE `jenis_reservasi` (
  `id_jenisreservasi` int NOT NULL,
  `jenis_reservasi` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_reservasi`
--

INSERT INTO `jenis_reservasi` (`id_jenisreservasi`, `jenis_reservasi`) VALUES
(1, 'Piknik'),
(2, 'Acara'),
(3, 'Olahraga'),
(4, 'Kegiatan Sekolah'),
(5, 'Kegiatan Komunitas'),
(6, 'Fotografi dan Syuting'),
(7, 'Workshop dan Seminar'),
(8, 'Pertemuan Bisnis'),
(9, 'Pameran dan Bazar');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `id_pengaduan` int NOT NULL,
  `id_user` int NOT NULL,
  `komentar` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_pengaduan`, `id_user`, `komentar`, `created_at`) VALUES
(1, 3, 1, 'Alhamdulilah', '2023-12-10 23:05:55'),
(2, 3, 1, 'semoga segera di tindak lanjuti', '2023-12-10 23:07:02'),
(4, 1, 1, 'hahaha', '2023-12-11 01:25:27'),
(8, 4, 2, 'semoga segera di tindak', '2023-12-12 15:55:45'),
(11, 2, 2, 'bersihin', '2024-06-05 19:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `kotak_masuk`
--

CREATE TABLE `kotak_masuk` (
  `id_kotak_masuk` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kotak_masuk`
--

INSERT INTO `kotak_masuk` (`id_kotak_masuk`, `id_user`, `nama`, `email`, `isi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Devan', 'devannsuryaa26@gmail.com', 'halo', '2023-12-12 00:07:56', '2023-12-12 00:07:56'),
(2, NULL, 'tes', 'devannsuryaa26@gmail.com', 'tsting', '2023-12-12 00:14:27', '2023-12-12 00:14:27'),
(4, 2, 'Hibat', 'hibat@gmail.com', 'baik', '2023-12-12 15:56:26', '2023-12-12 15:56:26'),
(5, 2, 'Devan', 'devannsuryaa26@gmail.com', 'pesan ini adalah testing', '2024-06-09 16:52:00', '2024-06-09 16:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_ref` int NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `pesan` text NOT NULL,
  `status_baca` int DEFAULT '0',
  `color` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_user`, `id_ref`, `type`, `pesan`, `status_baca`, `color`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'pengaduan', 'Pengaduan anda sedang dalam status penanganan', 1, 'warning', '2023-12-12 15:04:52', '2024-06-08 16:13:51'),
(2, 2, 3, 'pengaduan', 'Pengaduan anda telah selesai', 0, 'success', '2023-12-12 15:06:15', '2024-06-08 16:13:55'),
(3, 2, 2, NULL, 'Reservasi anda ditolak oleh petugas RTH', 1, 'danger', '2024-06-08 16:23:55', '2024-06-08 16:27:07'),
(4, 2, 2, NULL, 'Reservasi anda ditolak oleh petugas RTH', 1, 'danger', '2024-06-08 16:29:27', '2024-06-08 16:29:40'),
(5, 2, 2, NULL, 'Reservasi anda disetujui oleh petugas RTH', 1, 'success', '2024-06-08 16:29:32', '2024-06-08 16:32:17'),
(6, 2, 2, NULL, 'Reservasi anda ditolak oleh petugas RTH', 0, 'danger', '2024-06-08 18:34:08', '2024-06-08 18:34:08'),
(7, 2, 2, NULL, 'Reservasi anda disetujui oleh petugas RTH', 1, 'success', '2024-06-08 18:34:13', '2024-06-08 18:47:30'),
(8, 2, 1, NULL, 'Reservasi anda disetujui oleh petugas RTH', 1, 'success', '2024-06-08 18:47:20', '2024-06-08 18:47:33'),
(9, 2, 1, NULL, 'Reservasi anda ditolak oleh petugas RTH', 0, 'danger', '2024-06-08 19:04:32', '2024-06-08 19:04:32'),
(10, 2, 1, NULL, 'Reservasi anda disetujui oleh petugas RTH', 0, 'success', '2024-06-08 19:04:38', '2024-06-08 19:04:38'),
(11, 2, 1, NULL, 'Reservasi anda disetujui oleh petugas RTH', 0, 'success', '2024-06-09 15:27:02', '2024-06-09 15:27:02'),
(12, 2, 3, NULL, 'Reservasi anda disetujui oleh petugas RTH', 0, 'success', '2024-06-09 19:24:20', '2024-06-09 19:24:20'),
(13, 5, 4, NULL, 'Reservasi anda ditolak oleh petugas RTH', 0, 'danger', '2024-06-10 15:45:36', '2024-06-10 15:45:36'),
(14, 5, 4, NULL, 'Reservasi anda disetujui oleh petugas RTH', 0, 'success', '2024-06-10 15:46:14', '2024-06-10 15:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `penempatan_petugas`
--

CREATE TABLE `penempatan_petugas` (
  `id_penempatan` int NOT NULL,
  `id_user` int NOT NULL,
  `id_rth` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penempatan_petugas`
--

INSERT INTO `penempatan_petugas` (`id_penempatan`, `id_user`, `id_rth`) VALUES
(12, 4, 3),
(13, 4, 1),
(14, 3, 1),
(15, 4, 2),
(16, 3, 2),
(17, 3, 4),
(18, 3, 3),
(19, 3, 6),
(21, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int NOT NULL,
  `nama_pengadu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_pengadu` varchar(255) DEFAULT NULL,
  `id_jenispengaduan` int NOT NULL,
  `id_rth` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_status_pengaduan` int DEFAULT NULL,
  `subjek` varchar(255) NOT NULL,
  `deskripsi_pengaduan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `lokasi` varchar(500) NOT NULL,
  `visibilitas` int NOT NULL,
  `status_publish` int NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nama_pengadu`, `email_pengadu`, `id_jenispengaduan`, `id_rth`, `id_user`, `id_status_pengaduan`, `subjek`, `deskripsi_pengaduan`, `foto`, `lokasi`, `visibilitas`, `status_publish`, `create_date`) VALUES
(1, 'Septian', 'septian@gmail.com', 1, 1, NULL, 1, 'subjek', 'deskripsi', 'img1717577706.png', 'lokasi', 1, 1, '2024-06-05 15:55:06'),
(2, NULL, NULL, 1, 1, 2, 1, 'Sampah Berserakan di Taman', 'Banyak sampah berserakan di sekitar area taman, terutama di sekitar tempat duduk. Membutuhkan perhatian segera untuk menjaga kebersihan dan kenyamanan pengunjung.', 'img1717579760.jpg', 'Taman Merdeka Depok, Jalan Merdeka No. 5, Depok', 1, 1, '2024-06-05 16:29:20'),
(3, NULL, NULL, 2, 1, 2, 1, 'Ayunan Rusak di Area Bermain Anak', 'Salah satu ayunan di area bermain anak mengalami kerusakan pada rantainya. Hal ini dapat membahayakan anak-anak yang bermain di sana.', 'img1717579902.jpg', 'Taman Bermain Depok, Jalan Kartini No. 17, Depok', 2, 1, '2024-06-05 16:31:43'),
(4, NULL, NULL, 5, 3, 2, 1, 'Jalan Setapak Rusak dan Sulit Dilalui', 'Jalan setapak di taman mengalami kerusakan parah, sehingga sulit dilalui oleh pengguna kursi roda dan pengunjung lainnya. Perlu perbaikan segera untuk memastikan aksesibilitas yang baik.', 'img1717580039.jpg', 'Jalan masuk', 1, 1, '2024-06-05 16:33:59'),
(5, NULL, NULL, 5, 2, 2, 2, 'Kecelakaan', 'Jaladfxgdx', 'img1717935383.jpeg', 'cddjnkun', 1, 0, '2024-06-09 19:16:23'),
(6, NULL, NULL, 2, 1, 5, 2, 'Bangku Rusak', 'Bangku sudah hancur baiknya segera diganti', 'img1718008133.jpg', 'Di sebelah jalanan', 1, 1, '2024-06-10 15:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int NOT NULL,
  `id_jenisreservasi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_rth` int NOT NULL,
  `id_fasilitas_reservasi` int NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `deskripsi_reservasi` text NOT NULL,
  `id_status_reservasi` int NOT NULL DEFAULT '1',
  `catatan_petugas` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_jenisreservasi`, `id_user`, `id_rth`, `id_fasilitas_reservasi`, `tanggal_reservasi`, `deskripsi_reservasi`, `id_status_reservasi`, `catatan_petugas`, `create_date`) VALUES
(1, 2, 2, 1, 1, '2024-06-08', 'hahayuk', 2, NULL, '2024-06-08 13:46:13'),
(2, 7, 2, 1, 1, '2024-06-05', 'lorem ipsum dolor sit amet', 4, NULL, '2024-06-08 13:49:00'),
(3, 5, 2, 1, 1, '2024-06-12', 'untuk kegiatan', 2, NULL, '2024-06-09 19:22:28'),
(4, 5, 5, 1, 1, '2024-06-16', 'Kegiatan rapat bulanan', 2, NULL, '2024-06-10 15:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Petugas'),
(3, 'Masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `rth`
--

CREATE TABLE `rth` (
  `id_rth` int NOT NULL,
  `nama_rth` varchar(255) NOT NULL,
  `deskripsi_rth` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto_rth` text NOT NULL,
  `status_reservasi` int NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rth`
--

INSERT INTO `rth` (`id_rth`, `nama_rth`, `deskripsi_rth`, `kelurahan`, `kecamatan`, `alamat`, `foto_rth`, `status_reservasi`, `create_date`) VALUES
(1, 'Tepian Situ Jatijajar', 'Tepian Situ Jatijajar adalah ruang terbuka hijau yang terletak di sekitar Situ Jatijajar, sebuah danau yang menjadi ikon keindahan alam di kawasan tersebut. Tempat ini menawarkan pemandangan yang menyejukkan dengan hamparan air tenang dan pepohonan rindang di sekitarnya. Area ini menyediakan tempat yang ideal untuk rekreasi, olahraga, dan kegiatan sosial bagi masyarakat setempat. Selain itu, Tepian Situ Jatijajar juga berfungsi sebagai area konservasi lingkungan, membantu menjaga keseimbangan ekosistem dan mengurangi dampak polusi di sekitarnya. Fasilitas yang ada meliputi jalur jogging, area bermain anak, dan tempat duduk untuk bersantai, menjadikannya destinasi favorit bagi keluarga dan individu yang mencari suasana alami di tengah kesibukan kota.', '32.76.10.1005', '32.76.10', 'Jalan Raya Bogor Km. 37, Jatijajar, Tapos, Depok', 'situ-jatijajar.jpeg', 1, '2024-05-18 17:26:13'),
(2, 'Studio Alam TVRI', 'Sebuah kompleks studio luar ruangan yang dimiliki oleh Televisi Republik Indonesia (TVRI). Terletak di kawasan Depok, Jawa Barat, Studio Alam TVRI menawarkan lingkungan alam yang luas dan asri dengan berbagai pemandangan seperti danau, hutan, dan padang rumput. Tempat ini sering digunakan untuk pembuatan film, sinetron, dan program televisi lainnya yang membutuhkan setting alam terbuka.  Selain fungsi utamanya sebagai lokasi syuting, Studio Alam TVRI juga terbuka untuk umum dan menjadi destinasi rekreasi bagi masyarakat. Pengunjung dapat menikmati keindahan alam sambil berjalan-jalan, bersepeda, atau piknik bersama keluarga. Dengan suasana yang tenang dan jauh dari hiruk pikuk kota, Studio Alam TVRI menjadi tempat yang sempurna untuk melepas penat dan menikmati keindahan alam.', '32.76.05.1001', '32.76.05', 'Jalan Raden Saleh No.90, Kampung Cikumpa, Sukmajaya, Sukmajaya, Depok', 'studio-alam.webp', 0, '2024-05-18 17:26:13'),
(3, 'Taman Merdeka', 'Taman Merdeka menjadi salah satu destinasi favorit warga setempat untuk rekreasi dan bersantai. Taman ini menawarkan berbagai fasilitas yang mendukung aktivitas luar ruangan seperti jogging track, area bermain anak, lapangan olahraga, dan tempat duduk untuk beristirahat. Dengan pepohonan rindang dan taman yang terawat, Taman Merdeka menyediakan suasana sejuk dan nyaman bagi pengunjungnya.  Taman Merdeka juga sering digunakan untuk berbagai kegiatan komunitas, mulai dari senam pagi bersama, acara kebudayaan, hingga pertemuan sosial. Dengan lokasinya yang strategis dan akses yang mudah, taman ini menjadi tempat yang ideal untuk melepas penat dari rutinitas sehari-hari dan menikmati waktu berkualitas bersama keluarga dan teman.', '32.76.05.1004', '32.76.05', 'Jalan Merdeka No.2, Mekar Jaya, Sukmajaya, Depok', 'taman-merdeka.jpeg', 0, '2024-05-18 17:26:13'),
(4, 'Taman Kompleks Pesona Khayangan', 'Terletak di dalam perumahan Pesona Khayangan, Depok. Taman ini didesain untuk menyediakan lingkungan yang asri dan nyaman bagi para penghuni kompleks serta masyarakat sekitar. Dilengkapi dengan berbagai fasilitas seperti area bermain anak, jalur jogging, dan tempat duduk yang tersebar di seluruh taman, tempat ini menjadi lokasi yang sempurna untuk rekreasi dan aktivitas luar ruangan.  Pepohonan rindang dan tanaman hias yang terawat dengan baik menambah keindahan dan kesejukan taman ini. Taman Kompleks Pesona Khayangan juga sering menjadi lokasi bagi kegiatan komunitas, seperti senam pagi, piknik keluarga, dan acara sosial lainnya. Dengan suasana yang tenang dan aman, taman ini memberikan tempat yang ideal bagi penghuni untuk berolahraga, bersosialisasi, atau sekadar menikmati waktu santai di tengah lingkungan yang hijau dan bersih.', '32.76.05.1004', '32.76.05', 'Jalan Perumahan Pesona KayanganMekar Jaya, Sukmajaya, Depok', 'pesona-khayangan.jpeg', 0, '2024-05-18 17:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengaduan`
--

CREATE TABLE `status_pengaduan` (
  `id_status` int NOT NULL,
  `status` varchar(50) NOT NULL,
  `color` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `status_pengaduan`
--

INSERT INTO `status_pengaduan` (`id_status`, `status`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Baru', 'blue', '2023-11-15 15:22:11', '2023-12-10 16:54:50'),
(2, 'Penanganan', 'yellow', '2023-11-15 15:22:11', '2023-12-10 16:54:54'),
(3, 'Selesai', 'green', '2023-11-15 15:22:11', '2023-12-10 16:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `status_reservasi`
--

CREATE TABLE `status_reservasi` (
  `id_status_reservasi` int NOT NULL,
  `status` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_reservasi`
--

INSERT INTO `status_reservasi` (`id_status_reservasi`, `status`, `deskripsi`) VALUES
(1, 'Proses', 'Reservasi sedang menunggu persetujuan dari petugas RTH'),
(2, 'Disetujui', 'Reservasi telah di setujui oleh petugas RTH'),
(3, 'Ditolak', 'Reservasi di tolak oleh petugas RTH'),
(4, 'Dibatalkan', 'Reservasi dibatalkan oleh pemesan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `email` varchar(105) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `create_date`, `is_active`) VALUES
(1, 'rifqyzanuar5@gmail.com', '2d5a75ab86ffa5ed8b3248d5bb8ecf09', '2024-05-05 08:10:14', 1),
(2, 'devan@gmail.com', 'aca6893ec3f0a23210ebadffbb9f23b4', '2024-06-05 16:19:15', 1),
(3, 'hibat@gmail.com', '01a5945e3f6caf34d6b06319ffd09cac', '2024-06-05 16:19:15', 1),
(4, 'rezzi@gmail.com', '01a5945e3f6caf34d6b06319ffd09cac', '2024-06-05 16:19:15', 1),
(5, 'aldi@gmail.com', 'daf036f7f77e11a342e9520ff8fc256d', '2024-06-10 15:26:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id_userprofile` int NOT NULL,
  `id_user` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto_profile` text NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id_userprofile`, `id_user`, `nama`, `kelurahan`, `kecamatan`, `alamat`, `no_telp`, `foto_profile`, `create_date`) VALUES
(1, 1, 'Rifqy Zanuar', 'Sukamaju Baru', 'Tapos', 'Kp Sindangkarsa Rt 04 Rw 07. Sukamaju Baru. Tapos. Depok', '0895353053171', '', '2024-05-05 08:12:08'),
(2, 2, 'Devan Surya', 'Kalibaru', 'Cilodong', 'Jl Swadaya RT. 11 RW. 04 No. 52 Kalibaru, Cilodong', '089626033120', '', '2024-05-05 08:12:08'),
(3, 3, 'Nur Muhammad', 'Sukmajaya', 'Cilodong', 'Villa Pertiwi', '081344322245', '', '2024-05-05 08:12:08'),
(4, 4, 'Rezzi Arfian', 'Tapos', 'Tapos', 'Tapos', '081342551115', '', '2024-05-05 08:12:08'),
(5, 5, 'Mohammad Aldiansah', '', '', '', '089666253516', '', '2024-06-10 15:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_userrole` int NOT NULL,
  `id_role` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_userrole`, `id_role`, `id_user`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 5),
(6, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `visibilitas`
--

CREATE TABLE `visibilitas` (
  `id_visibilitas` int NOT NULL,
  `visibilitas` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visibilitas`
--

INSERT INTO `visibilitas` (`id_visibilitas`, `visibilitas`, `created_at`, `updated_at`) VALUES
(1, 'Publik', '2023-11-29 22:59:15', '2023-11-29 22:59:15'),
(2, 'Anonim', '2023-11-29 22:59:15', '2023-11-29 22:59:15'),
(3, 'Private', '2023-11-29 22:59:15', '2023-11-29 22:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `key_wilayah` bigint NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kd_kecamatan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `kecamatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `kd_kelurahan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `kelurahan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `kd_kabupaten` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `kabupaten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `kd_propinsi` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `propinsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kd_sektor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `kd_pos` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `luas_wilayah` float DEFAULT NULL,
  `satuan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_ubah` datetime NOT NULL,
  `versi` int NOT NULL DEFAULT '0',
  `tgl_mulai` datetime NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `versi_akhir` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`key_wilayah`, `nama`, `jenis`, `kd_kecamatan`, `kecamatan`, `kd_kelurahan`, `kelurahan`, `kd_kabupaten`, `kabupaten`, `kd_propinsi`, `propinsi`, `kd_sektor`, `kd_pos`, `luas_wilayah`, `satuan`, `tgl_ubah`, `versi`, `tgl_mulai`, `tgl_akhir`, `versi_akhir`) VALUES
(1, 'UNKNOWN', '', '', '', '', '', '', 'Depok', '', '', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(2, 'Jawa Barat', 'propinsi', '', '', '', '', '', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(3, 'Depok', 'kabupaten', '', '', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(4, 'Pancoran Mas', 'kecamatan', '32.76.01', 'Pancoran Mas', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(5, 'Depok', 'kelurahan', '32.76.01', 'Pancoran Mas', '32.76.01.1006', 'Depok', '32.76', 'Depok', '32', 'Jawa Barat', '3276020011', '', 3.77, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(6, 'Depok Jaya', 'kelurahan', '32.76.01', 'Pancoran Mas', '32.76.01.1007', 'Depok Jaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276020010', '', 1.12, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(7, 'Pancoran Mas', 'kelurahan', '32.76.01', 'Pancoran Mas', '32.76.01.1008', 'Pancoran Mas', '32.76', 'Depok', '32', 'Jawa Barat', '3276020009', '', 3.57, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(8, 'Mampang', 'kelurahan', '32.76.01', 'Pancoran Mas', '32.76.01.1009', 'Mampang', '32.76', 'Depok', '32', 'Jawa Barat', '3276020008', '', 1.94, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(9, 'Rangkapan Jaya Baru', 'kelurahan', '32.76.01', 'Pancoran Mas', '32.76.01.1010', 'Rangkapan Jaya Baru', '32.76', 'Depok', '32', 'Jawa Barat', '3276020006', '', 3.82, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(10, 'Rangkapan Jaya', 'kelurahan', '32.76.01', 'Pancoran Mas', '32.76.01.1011', 'Rangkapan Jaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276020007', '', 3.87, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(11, 'Cimanggis', 'kecamatan', '32.76.02', 'Cimanggis', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(12, 'Harjamukti', 'kelurahan', '32.76.02', 'Cimanggis', '32.76.02.1007', 'Harjamukti', '32.76', 'Depok', '32', 'Jawa Barat', '3276040009', '', 6.16, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(13, 'Curug', 'kelurahan', '32.76.02', 'Cimanggis', '32.76.02.1008', 'Curug', '32.76', 'Depok', '32', 'Jawa Barat', '3276040007', '', 2.16, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(14, 'Tugu', 'kelurahan', '32.76.02', 'Cimanggis', '32.76.02.1009', 'Tugu', '32.76', 'Depok', '32', 'Jawa Barat', '3276040012', '', 5.44, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(15, 'Mekarsari', 'kelurahan', '32.76.02', 'Cimanggis', '32.76.02.1010', 'Mekarsari', '32.76', 'Depok', '32', 'Jawa Barat', '3276040011', '', 3.96, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(16, 'Pasir Gunung Selatan', 'kelurahan', '32.76.02', 'Cimanggis', '32.76.02.1011', 'Pasir Gunung Selatan', '32.76', 'Depok', '32', 'Jawa Barat', '3276040013', '', 2.37, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(17, 'Cisalak Pasar', 'kelurahan', '32.76.02', 'Cimanggis', '32.76.02.1012', 'Cisalak Pasar', '32.76', 'Depok', '32', 'Jawa Barat', '3276040010', '', 1.76, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(18, 'Sawangan', 'kecamatan', '32.76.03', 'Sawangan', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(19, 'Pasir Putih', 'kelurahan', '32.76.03', 'Sawangan', '32.76.03.1001', 'Pasir Putih', '32.76', 'Depok', '32', 'Jawa Barat', '3276010005', '', 4.66, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(20, 'Bedahan', 'kelurahan', '32.76.03', 'Sawangan', '32.76.03.1002', 'Bedahan', '32.76', 'Depok', '32', 'Jawa Barat', '3276010004', '', 5.75, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(21, 'Pengasinan', 'kelurahan', '32.76.03', 'Sawangan', '32.76.03.1003', 'Pengasinan', '32.76', 'Depok', '32', 'Jawa Barat', '3276010003', '', 3.97, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(22, 'Cinangka', 'kelurahan', '32.76.03', 'Sawangan', '32.76.03.1009', 'Cinangka', '32.76', 'Depok', '32', 'Jawa Barat', '3276010014', '', 4.05, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(23, 'Sawangan', 'kelurahan', '32.76.03', 'Sawangan', '32.76.03.1010', 'Sawangan', '32.76', 'Depok', '32', 'Jawa Barat', '3276010007', '', 3.88, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(24, 'Sawangan Baru', 'kelurahan', '32.76.03', 'Sawangan', '32.76.03.1011', 'Sawangan Baru', '32.76', 'Depok', '32', 'Jawa Barat', '3276010006', '', 2.26, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(25, 'Kedaung', 'kelurahan', '32.76.03', 'Sawangan', '32.76.03.1012', 'Kedaung', '32.76', 'Depok', '32', 'Jawa Barat', '3276010013', '', 2.28, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(26, 'Limo', 'kecamatan', '32.76.04', 'Limo', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(27, 'Maruyung', 'kelurahan', '32.76.04', 'Limo', '32.76.04.1001', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(28, 'Grogol', 'kelurahan', '32.76.04', 'Limo', '32.76.04.1002', 'Grogol', '32.76', 'Depok', '32', 'Jawa Barat', '3276060002', '', 1.56, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(29, 'Krukut', 'kelurahan', '32.76.04', 'Limo', '32.76.04.1003', 'Krukut', '32.76', 'Depok', '32', 'Jawa Barat', '3276060003', '', 3.08, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(30, 'Limo', 'kelurahan', '32.76.04', 'Limo', '32.76.04.1004', 'Limo', '32.76', 'Depok', '32', 'Jawa Barat', '3276060004', '', 1.94, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(31, 'Sukmajaya', 'kecamatan', '32.76.05', 'Sukmajaya', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(32, 'Sukmajaya', 'kelurahan', '32.76.05', 'Sukmajaya', '32.76.05.1001', 'Sukmajaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276030006', '', 2.96, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(33, 'Abadi Jaya', 'kelurahan', '32.76.05', 'Sukmajaya', '32.76.05.1003', 'Abadi Jaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276030009', '', 2.59, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(34, 'Mekar Jaya', 'kelurahan', '32.76.05', 'Sukmajaya', '32.76.05.1004', 'Mekar Jaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276030008', '', 3.3, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(35, 'Baktijaya', 'kelurahan', '32.76.05', 'Sukmajaya', '32.76.05.1005', 'Baktijaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276030010', '', 2.77, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(36, 'Cisalak', 'kelurahan', '32.76.05', 'Sukmajaya', '32.76.05.1008', 'Cisalak', '32.76', 'Depok', '32', 'Jawa Barat', '3276030011', '', 2.62, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(37, 'Titajaya', 'kelurahan', '32.76.05', 'Sukmajaya', '32.76.05.1010', 'Tirta Jaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276030007', '', 3.28, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(38, 'Beji', 'kecamatan', '32.76.06', 'Beji', '32.76.06.1001', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(39, 'Beji', 'kelurahan', '32.76.06', 'Beji', '32.76.06.1001', 'Beji', '32.76', 'Depok', '32', 'Jawa Barat', '3276050001', '', 2.36, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(40, 'Kukusan', 'kelurahan', '32.76.06', 'Beji', '32.76.06.1002', 'Kukusan', '32.76', 'Depok', '32', 'Jawa Barat', '3276050005', '', 3.24, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(41, 'Tanah Baru', 'kelurahan', '32.76.06', 'Beji', '32.76.06.1003', 'Tanah Baru', '32.76', 'Depok', '32', 'Jawa Barat', '3276050006', '', 3.62, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(42, 'Kemiri Muka', 'kelurahan', '32.76.06', 'Beji', '32.76.06.1004', 'Kemiri Muka', '32.76', 'Depok', '32', 'Jawa Barat', '3276050003', '', 2.47, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(43, 'Pondok Cina', 'kelurahan', '32.76.06', 'Beji', '32.76.06.1005', 'Pondok Cina', '32.76', 'Depok', '32', 'Jawa Barat', '3276050004', '', 2.41, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(44, 'Beji Timur', 'kelurahan', '32.76.06', 'Beji', '32.76.06.1006', 'Beji Timur', '32.76', 'Depok', '32', 'Jawa Barat', '3276050002', '', 0.85, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(45, 'Cipayung', 'kecamatan', '32.76.07', 'Cipayung', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(46, 'Cipayung', 'kelurahan ', '32.76.07', 'Cipayung', '32.76.07.1001', 'Cipayung', '32.76', 'Depok', '32', 'Jawa Barat', '3276021005', '', 2.61, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(47, 'Cipayung Jaya', 'kelurahan', '32.76.07', 'Cipayung', '32.76.07.1002', 'Cipayung Jaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276021001', '', 2.23, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(48, 'Ratu Jaya', 'kelurahan', '32.76.07', 'Cipayung', '32.76.07.1003', 'Ratu Jaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276021004', '', 2.67, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(49, 'Bojong Pondok Terong', 'kelurahan', '32.76.07', 'Cipayung', '32.76.07.1004', 'Bojong Pondok Terong', '32.76', 'Depok', '32', 'Jawa Barat', '3276021002', '', 2.46, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(50, 'Pondok Jaya', 'kelurahan', '32.76.07', 'Cipayung', '32.76.07.1005', 'Pondok Jaya', '32.76', 'Depok', '32', 'Jawa Barat', '3276021003', '', 1.1, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(51, 'Cilodong', 'kecamatan', '32.76.08', 'Cilodong', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(52, 'Sukamaju', 'kelurahan', '32.76.08', 'Cilodong', '32.76.08.1001', 'Sukamaju', '32.76', 'Depok', '32', 'Jawa Barat', '3276031005', '', 4.46, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(53, 'Cilodong', 'kelurahan', '32.76.08', 'Cilodong', '32.76.08.1002', 'Cilodong', '32.76', 'Depok', '32', 'Jawa Barat', '3276031004', '', 2.2, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(54, 'Kalibaru', 'kelurahan', '32.76.08', 'Cilodong', '32.76.08.1003', 'Kalibaru', '32.76', 'Depok', '32', 'Jawa Barat', '3276031003', '', 3.28, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(55, 'Kalimulya', 'kelurahan', '32.76.08', 'Cilodong', '32.76.08.1004', 'Kalimulya', '32.76', 'Depok', '32', 'Jawa Barat', '3276031001', '', 3.1, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(56, 'Jatimulya', 'kelurahan', '32.76.08', 'Cilodong', '32.76.08.1005', 'Jatimulya', '32.76', 'Depok', '32', 'Jawa Barat', '3276031002', '', 2.7, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(57, 'Cinere', 'kecamatan', '32.76.09', 'Cinere', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(58, 'Cinere', 'kelurahan', '32.76.09', 'Cinere', '32.76.09.1001', 'Cinere', '32.76', 'Depok', '32', 'Jawa Barat', '3276061001', '', 7.76, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(59, 'Gandul', 'kelurahan', '32.76.09', 'Cinere', '32.76.09.1002', 'Gandul', '32.76', 'Depok', '32', 'Jawa Barat', '3276061002', '', 3.05, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(60, 'Pangkalan Jati', 'kelurahan', '32.76.09', 'Cinere', '32.76.09.1003', 'Pangkalan Jati', '32.76', 'Depok', '32', 'Jawa Barat', '3276061004', '', 2.42, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(61, 'Pangkalan Jati Baru', 'kelurahan', '32.76.09', 'Cinere', '32.76.09.1004', 'Pangkalan Jati Baru', '32.76', 'Depok', '32', 'Jawa Barat', '3276061003', '', 1.56, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(62, 'Tapos', 'kecamatan', '32.76.10', 'Tapos', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(63, 'Tapos', 'kelurahan', '32.76.10', 'Tapos', '32.76.10.1001', 'Tapos', '32.76', 'Depok', '32', 'Jawa Barat', '3276041003', '', 6.26, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(64, 'Leuwinanggung', 'kelurahan', '32.76.10', 'Tapos', '32.76.10.1002', 'Leuwinanggung', '32.76', 'Depok', '32', 'Jawa Barat', '3276041004', '', 4.7, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(65, 'Sukatani', 'kelurahan', '32.76.10', 'Tapos', '32.76.10.1003', 'Sukatani', '32.76', 'Depok', '32', 'Jawa Barat', '3276041007', '', 4.8, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(66, 'Sukamaju Baru', 'kelurahan', '32.76.10', 'Tapos', '32.76.10.1004', 'Sukamaju Baru', '32.76', 'Depok', '32', 'Jawa Barat', '3276041006', '', 3.23, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(67, 'Jatijajar', 'kelurahan', '32.76.10', 'Tapos', '32.76.10.1005', 'Jatijajar', '32.76', 'Depok', '32', 'Jawa Barat', '3276041005', '', 2.94, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(68, 'Cilangkap', 'kelurahan', '32.76.10', 'Tapos', '32.76.10.1006', 'Cilangkap', '32.76', 'Depok', '32', 'Jawa Barat', '3276041001', '', 7.22, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(69, 'Cimpaeun', 'kelurahan', '32.76.10', 'Tapos', '32.76.10.1007', 'Cimpaeun', '32.76', 'Depok', '32', 'Jawa Barat', '3276041002', '', 4.76, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(70, 'Bojongsari', 'kecamatan', '32.76.11', 'Bojongsari', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(71, 'Bojongsari', 'kelurahan', '32.76.11', 'Bojongsari', '32.76.11.1001', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(72, 'Bojongsari Baru', 'kelurahan', '32.76.11', 'Bojongsari', '32.76.11.1002', 'Bojongsari Baru', '32.76', 'Depok', '32', 'Jawa Barat', '3276011004', '', 1.77, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(73, 'Serua', 'kelurahan', '32.76.11', 'Bojongsari', '32.76.11.1003', 'Serua', '32.76', 'Depok', '32', 'Jawa Barat', '3276011007', '', 3.3, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(74, 'Pondok Petir', 'kelurahan', '32.76.11', 'Bojongsari', '32.76.11.1004', 'Pondok Petir', '32.76', 'Depok', '32', 'Jawa Barat', '3276011006', '', 3.14, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(75, 'Curug', 'kelurahan', '32.76.11', 'Bojongsari', '32.76.11.1005', 'Curug', '32.76', 'Depok', '32', 'Jawa Barat', '3276011005', '', 4.26, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(76, 'Duren Mekar', 'kelurahan', '32.76.11', 'Bojongsari', '32.76.11.1006', 'Duren Mekar', '32.76', 'Depok', '32', 'Jawa Barat', '3276011002', '', 2.08, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(77, 'Duren Seribu', 'kelurahan', '32.76.11', 'Bojongsari', '32.76.11.1007', 'Duren Seribu', '32.76', 'Depok', '32', 'Jawa Barat', '3276011001', '', 2.82, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(78, 'Luar Depok', 'kelurahan', '00.00.00', 'Luar Depok', '00.00.00.0000', 'Luar Depok', '00.00', 'Luar Depok', '00', 'Luar Depok', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(83, 'Pancoran Mas', 'kecamatan', '32.76.01', 'Pancoran Mas', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(84, 'Sukmajaya', 'kecamatan', '32.76.05', 'Sukmajaya', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(85, 'Pancoran Mas', 'Kecamatan', '32.76.01', 'Pancoran Mas', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(86, 'Sawangan', 'kecamatan', '32.76.03', 'Sawangan', '', 'Kelurahan', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(87, 'Cimanggis', 'kecamatan', '32.76.02', 'Cimanggis', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(88, 'Cilodong', 'kecamatan', '32.76.08', 'Cilodong', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(89, 'Bojongsari', 'kelurahan', '32.76.11', 'Bojongsari', '32.76.11.1001', 'Bojongsari', '32.76', 'Depok', '32', 'Jawa Barat', '3276011003', '', 2.24, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(90, 'Bojongsari', 'kecamatan', '32.76.11', 'Bojongsari', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(91, 'Cipayung', 'kecamatan', '32.76.07', 'Cipayung', '', '', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(92, 'Meruyung', 'kelurahan', '32.76.04', 'Limo', '32.76.04.1001', 'Meruyung', '32.76', 'Depok', '32', 'Jawa Barat', '3276060001', '', 1.27, 'Km2', '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(93, 'Sawangan', 'kelurahan', '32.76.03', 'Sawangan', '32.76.03.1014', 'Sawangan Lama', '32.76', 'Depok', '32', 'Jawa Barat', '3276010007', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y'),
(94, 'Sawangan', 'kelurahan', '32.76.03', 'Duren Mekar', '32.76.03.1015', 'Sawangan Lama', '32.76', 'Depok', '32', 'Jawa Barat', '', '', NULL, NULL, '2017-10-17 00:00:00', 0, '1979-10-25 00:00:00', '3000-10-31 00:00:00', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_reservasi`
--
ALTER TABLE `fasilitas_reservasi`
  ADD PRIMARY KEY (`id_fasilitas_reservasi`);

--
-- Indexes for table `jenis_pengaduan`
--
ALTER TABLE `jenis_pengaduan`
  ADD PRIMARY KEY (`id_jenispengaduan`);

--
-- Indexes for table `jenis_reservasi`
--
ALTER TABLE `jenis_reservasi`
  ADD PRIMARY KEY (`id_jenisreservasi`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kotak_masuk`
--
ALTER TABLE `kotak_masuk`
  ADD PRIMARY KEY (`id_kotak_masuk`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `penempatan_petugas`
--
ALTER TABLE `penempatan_petugas`
  ADD PRIMARY KEY (`id_penempatan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `rth`
--
ALTER TABLE `rth`
  ADD PRIMARY KEY (`id_rth`);

--
-- Indexes for table `status_pengaduan`
--
ALTER TABLE `status_pengaduan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_reservasi`
--
ALTER TABLE `status_reservasi`
  ADD PRIMARY KEY (`id_status_reservasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id_userprofile`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_userrole`);

--
-- Indexes for table `visibilitas`
--
ALTER TABLE `visibilitas`
  ADD PRIMARY KEY (`id_visibilitas`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`key_wilayah`),
  ADD KEY `nama` (`nama`),
  ADD KEY `versi_akhir` (`versi_akhir`),
  ADD KEY `IDX_DW_NAMA` (`kecamatan`,`kelurahan`,`tgl_mulai`,`tgl_akhir`),
  ADD KEY `IDX_DW_KODE` (`kd_kecamatan`,`kd_kelurahan`,`tgl_mulai`,`tgl_akhir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_reservasi`
--
ALTER TABLE `fasilitas_reservasi`
  MODIFY `id_fasilitas_reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_pengaduan`
--
ALTER TABLE `jenis_pengaduan`
  MODIFY `id_jenispengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_reservasi`
--
ALTER TABLE `jenis_reservasi`
  MODIFY `id_jenisreservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kotak_masuk`
--
ALTER TABLE `kotak_masuk`
  MODIFY `id_kotak_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penempatan_petugas`
--
ALTER TABLE `penempatan_petugas`
  MODIFY `id_penempatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rth`
--
ALTER TABLE `rth`
  MODIFY `id_rth` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_pengaduan`
--
ALTER TABLE `status_pengaduan`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_reservasi`
--
ALTER TABLE `status_reservasi`
  MODIFY `id_status_reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id_userprofile` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_userrole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visibilitas`
--
ALTER TABLE `visibilitas`
  MODIFY `id_visibilitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `key_wilayah` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
