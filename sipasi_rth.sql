-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 01:19 PM
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
-- Database: `sipasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'user.png',
  `alamat` text,
  `jenis_kelamin` varchar(55) DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `nim`, `nama`, `email`, `telp`, `image`, `alamat`, `jenis_kelamin`, `status`, `created_at`, `updated_at`) VALUES
(1, '19220134', 'Devan Surya', 'devannsuryaa26@gmail.com', '089626033120', 'user.png', NULL, NULL, 1, '2023-11-15 15:22:45', '2023-12-12 15:52:12'),
(2, '19220144', 'Rifqy Zanuar ', 'rifqyzanuar5@gmail.com', '0895353053171', 'user.png', '', '', 1, '2023-11-24 15:22:45', '2023-12-14 00:20:31'),
(3, '19220017', 'Titania Dwi', 'titania@gmail.com', '081327274462', 'user.png', NULL, NULL, 1, '2023-11-24 15:22:45', '2023-12-11 02:37:26'),
(5, '19220148', 'Rezzi', 'rezzi@gmail.com', '081317596629', 'user.png', NULL, NULL, 0, '2023-12-12 14:44:39', '2023-12-12 14:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul`, `deskripsi`, `file`, `created_at`) VALUES
(1, 'Rekrutmen Kelulusan Siswa Kelas XII', 'Bursa Kerja Khusus (BKK) SMK 8 DETIMIHAN menyelenggarakan 2 rekrutmen untuk menyalurkan siswa kelas XII yang akan lulus serta alumni agar terserap dalam dunia industri. Pertama, menggandeng PT. Hillconjaya Sakti, merupakan perusahaan yang bergelut pada bidang pertambangan nikel dan batubara, diselenggarakan pada tanggal 3 dan 4 Maret 2023. Proses rekrutmen pada hari pertama dilakukan tes pikotest sebanyak 148 peserta dari siswa SMK 8 DETIMIHAN. Lalu proses selanjutnya yaitu sesi wawancara serta dilakukannya MCU. Setelah peserta dinyatakan lolos semua tahap barulah akan ditempatkan di berbagai lokasi tambang milik perusahaan. Pada kali ini sudah kelima kalinya PT. Hillconjaya Sakti melakukan proses rekrutmen. Formasi yang dibutuhkan yaitu mekanik dan operator. Rekrutmen diikuti dari berbagai kompetensi keahlian seperti jurusan teknik alat berat, teknik otomotif, teknik ketenagalistrikan. Bapak Agustinus sebagai HRD mengatakan, “Animo dari para siswa sangatlah besar terlihat dari jumlah peserta yang hadir dan mengikuti proses psikotest terdapat 311 peserta. Maka akan dibagi menjadi 2 sesi rekrutmen dikarenakan waktu terbatas. Sesi pertama pada tanggal 3 sampai 4 Maret 2023 dan selanjutnya akan dilaksanakan setelah lebaran usai dengan peserta sebanyak 163.”', 'rekrutmen-kelulusan.jpeg', '2023-06-20 00:09:40'),
(2, 'Suntikan Semangat dan Motivasi Belajar Siswa', 'Aktivitas pembelajaran di sekolah terkadang memang terasa menjenuhkan dan membosankan. Hal tersebut lebih dapat dirasakan pada era newnormal seperti saat ini. Peralihan proses pembelajaran daring ke moda luring membuat siswa harus menyesuaikan diri kembali. Selama ini pembelajaran daring yang dilakukan terkesan lebih santai,  sedangkan pembelajaran dengan moda luring membuat siswa harus lebih menyiapkan diri dengan lebih semangat. SMK 8 DETIMIHAN menggandeng grup band GAC (Gamaliel, Audrey, dan Cantika) untuk sejenak “melupakan” rutinitas pembelajaran dengan bernyanyi dan mendengarkan motivasi dari publik figur. GAC mendatangi SMK 8 DETIMIHAN pada Senin, 13 Maret 2023 di Hall sekolah. Hadirnya grup band kekinian tersebut menjadi penyejuk dan pematik semangat dan motivasi bagi siswa. Tak hanya membawakan lagu, GAC juga mengisi talkshow di SMK 8 DETIMIHAN. Seluruh siswa antusias mengikuti sesi tersebut. Acara yang dipandu oleh Konan Cs dari broadcast tersebut terasa semakin gayeng ketika GAC memberikan tips dan trik untuk bisa belajar lebih baik.', 'motivasi-belajar.jpeg', '2023-06-20 00:30:44'),
(3, 'WORKSHOP PENYUSUNAN PROGRAM BERBASIS DATA', 'Workshop ini diisi oleh Pengawas Sekolah Drs. Slamet Sarjono, M.M. Workshop Penyusunan Program Berbasis Data dan Arkas diselenggarakan untuk integrasi rencana kegiatan  program, dan anggaran sekolah dengan sistem TIK, serta untuk meningkatkan nilai pada Rapor Pendidikan. Hasil Rapor Pendidikan dapat digunakan sebagai referensi utama, dasar analisis, perencanaan, dan tindak lanjut peningkatan dari kualitas pendidikan. Oleh karena itu pengguna seperti kepala satuan pendidikan perlu memahami betul hasil dari Rapor Pendidikan mereka. Perlu dipahami, Rapor Pendidikan bukan merupakan laporan prestasi dari satuan pendidikan tetapi merupakan gambaran representatif dari satuan pendidikan. Sehingga apabila satuan pendidikan sudah mendapatkan hasil yang baik, maka dapat melakukan peningkatan hasil penilaian indikator pada Rapor Pendidikan dengan membuat inovasi-inovasi baru untuk meningkatkan hasil penilaian di tahun berikutnya.', 'workshop-sekolah.jpg', '2023-06-20 00:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pengaduan`
--

CREATE TABLE `kategori_pengaduan` (
  `id_kategori` int NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kategori_pengaduan`
--

INSERT INTO `kategori_pengaduan` (`id_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Akademik', '2023-11-15 15:27:51', '2023-11-15 15:27:51'),
(2, 'Administratif', '2023-11-15 15:27:51', '2023-11-15 15:27:51'),
(3, 'Layanan Kampus', '2023-11-15 15:27:51', '2023-11-15 15:27:51'),
(4, 'Kesejahteraan Mahasiswa', '2023-11-15 15:27:51', '2023-11-15 15:27:51'),
(5, 'Lingkungan Kampus', '2023-11-15 15:27:51', '2023-11-15 15:27:51');

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
(3, 3, 1, 'testing', '2023-12-10 23:57:41'),
(4, 1, 1, 'hahaha', '2023-12-11 01:25:27'),
(8, 4, 2, 'semoga segera di tindak', '2023-12-12 15:55:45');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kotak_masuk`
--

INSERT INTO `kotak_masuk` (`id_kotak_masuk`, `id_user`, `nama`, `email`, `isi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Devan', 'devannsuryaa26@gmail.com', 'halo', '2023-12-12 00:07:56', '2023-12-12 00:07:56'),
(2, NULL, 'tes', 'devannsuryaa26@gmail.com', 'tsting', '2023-12-12 00:14:27', '2023-12-12 00:14:27'),
(4, 2, 'Hibat', 'hibat@gmail.com', 'baik', '2023-12-12 15:56:26', '2023-12-12 15:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_pengaduan` int NOT NULL,
  `pesan` text NOT NULL,
  `status_baca` int DEFAULT '0',
  `color` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_user`, `id_pengaduan`, `pesan`, `status_baca`, `color`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Pengaduan anda sedang dalam status penanganan', 1, 'warning', '2023-12-12 15:04:52', '2023-12-12 15:41:06'),
(2, 2, 3, 'Pengaduan anda telah selesai', 0, 'success', '2023-12-12 15:06:15', '2023-12-12 15:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int NOT NULL,
  `id_kategori` int NOT NULL,
  `subjek` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `lokasi` varchar(500) DEFAULT NULL,
  `status` int NOT NULL,
  `visibilitas` int NOT NULL DEFAULT '1',
  `id_user` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_kategori`, `subjek`, `deskripsi`, `foto`, `lokasi`, `status`, `visibilitas`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 3, 'Website Lemot', 'Website E-Learning UBSI memakan waktu loading yang sangat lama', 'bukti.png', NULL, 1, 1, 1, '2023-11-15 15:30:33', '2023-12-10 14:50:16'),
(2, 3, 'Jalanan Rusak', 'Jalanan berlubang didepan gedung BSI Margonda, ketika hujan sangat berbahaya bagi motor yang berlalu lalang di sekitar gedung, sebaiknya segera diperbaiki', 'bukti2.png', NULL, 2, 1, 2, '2023-11-15 15:30:33', '2023-12-10 14:50:25'),
(3, 2, 'Keluhan Website Lemot', 'Website E-Learning UBSI memakan waktu loading yang sangat lama. harusnya segera diperbaiki, karena website ini di gunakan setiap hari dan sangat di butuhkan dalam aktivitas pembelajaran', 'img1701283173.PNG', 'Aplikasi Elearning', 1, 1, 2, '2023-11-30 01:39:33', '2023-12-12 16:58:24'),
(4, 1, 'Tangga Licin', 'Selepas hujan area sekitar tangga menjadi licin, dan sangat kotor. sangat berbahaya jika berlalu lalang di area tersebut sangat membahayakan', 'img1702233638.jpeg', 'Gedung UBSI Margonda', 1, 2, 1, '2023-12-11 01:40:38', '2023-12-11 01:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-11-15 15:26:01', '2023-11-15 15:26:01'),
(2, 'Mahasiswa', '2023-11-15 15:26:01', '2023-11-29 22:13:51');

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int NOT NULL,
  `id_contact` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`, `id_contact`, `created_at`, `updated_at`) VALUES
(1, 'devan', '202cb962ac59075b964b07152d234b70', 1, 1, '2023-11-15 15:24:05', '2024-04-28 17:39:58'),
(2, '19220144', '202cb962ac59075b964b07152d234b70', 2, 2, '2023-11-24 15:24:05', '2023-11-29 22:00:01'),
(3, '19220017', '202cb962ac59075b964b07152d234b70', 2, 3, '2023-11-15 15:24:05', '2023-11-29 22:14:05'),
(5, '19220148', '4e320981f6dff0883943b9934fdf3957', 2, 5, '2023-12-12 14:44:39', '2023-12-12 14:44:39');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status_pengaduan`
--
ALTER TABLE `status_pengaduan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `visibilitas`
--
ALTER TABLE `visibilitas`
  ADD PRIMARY KEY (`id_visibilitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kotak_masuk`
--
ALTER TABLE `kotak_masuk`
  MODIFY `id_kotak_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_pengaduan`
--
ALTER TABLE `status_pengaduan`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visibilitas`
--
ALTER TABLE `visibilitas`
  MODIFY `id_visibilitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
