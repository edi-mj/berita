-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2025 at 07:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` longtext NOT NULL,
  `file_gambar` varchar(50) DEFAULT NULL,
  `status` enum('draft','review','published','archived') NOT NULL DEFAULT 'draft',
  `id_penulis` int NOT NULL,
  `id_redaktur` int DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Konten utama portal berita';

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `file_gambar`, `status`, `id_penulis`, `id_redaktur`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Perkembangan AI di Indonesia 2025', 'Isi lengkap tentang bagaimana AI mengubah berbagai industri di Indonesia, mulai dari kesehatan hingga transportasi...', 'ai_indonesia.jpg', 'published', 3, 1, '2025-10-01 01:00:00', '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(2, 'Dampak Ibu Kota Baru (IKN) terhadap Perekonomian Nasional', 'Analisis mendalam mengenai perpindahan ibu kota dan dampaknya terhadap pemerataan ekonomi...', 'ikn_ekonomi.jpg', 'published', 4, 2, '2025-10-02 02:00:00', '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(3, 'Analisis Pemilu Legislatif Terbaru', 'Bagaimana hasil pemilu legislatif 2025 mempengaruhi peta politik nasional dan koalisi di pemerintahan...', 'pemilu_2025.png', 'published', 3, 1, '2025-10-03 03:00:00', '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(4, 'Review 5 Startup Fintech Lokal yang Siap Mendunia', 'Ulasan mengenai 5 startup fintech Indonesia yang inovatif dan memiliki potensi besar...', 'fintech_review.jpg', 'review', 4, NULL, NULL, '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(5, 'Tantangan UKM Indonesia di Era Digitalisasi', 'Isi draft mengenai tantangan yang dihadapi UKM dalam mengadopsi teknologi digital...', 'ukm_digital.jpg', 'draft', 3, NULL, NULL, '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(6, 'Kebijakan Luar Negeri Indonesia di Panggung ASEAN', 'Arah baru kebijakan luar negeri Indonesia dalam menghadapi dinamika geopolitik di ASEAN...', 'asean_politik.jpg', 'published', 4, 2, '2025-10-05 04:00:00', '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(7, 'Masa Depan Jaringan 5G di Kota-Kota Besar Indonesia', 'Liputan khusus mengenai progres implementasi 5G dan manfaatnya bagi masyarakat perkotaan...', '5g_indonesia.jpg', 'published', 3, 1, '2025-10-06 05:00:00', '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(8, 'Prediksi Inflasi dan Arah Suku Bunga Bank Indonesia', 'Para analis memprediksi langkah BI selanjutnya setelah data inflasi terbaru dirilis...', 'bi_inflasi.png', 'review', 4, NULL, NULL, '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(9, 'RUU Keamanan Siber Kembali Dibahas: Apa Poin Krusialnya?', 'Isi draft awal mengenai pembahasan RUU Keamanan Siber yang kembali masuk prolegnas...', 'ruu_siber.jpg', 'draft', 3, NULL, NULL, '2025-11-04 07:27:55', '2025-11-04 07:27:55'),
(10, 'Sejarah Komunitas Open Source di Indonesia', 'Artikel lama yang mengulas sejarah perkembangan komunitas open source dari tahun 2000-an...', 'foss_id.jpg', 'archived', 4, 2, '2024-01-15 07:00:00', '2025-11-04 07:27:55', '2025-11-04 07:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_kategori`
--

CREATE TABLE `artikel_kategori` (
  `id_artikel` int NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabel penghubung Artikel dan Kategori (Many-to-Many)';

--
-- Dumping data for table `artikel_kategori`
--

INSERT INTO `artikel_kategori` (`id_artikel`, `id_kategori`) VALUES
(1, 1),
(4, 1),
(7, 1),
(9, 1),
(10, 1),
(2, 2),
(4, 2),
(5, 2),
(8, 2),
(3, 3),
(6, 3),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Mengelompokkan artikel';

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Ekonomi'),
(3, 'Politik'),
(1, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` enum('pembaca','penulis','redaktur') NOT NULL DEFAULT 'pembaca',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Menyimpan semua data pengguna';

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Budi Santoso', 'budiredaktur', 'budi.s@example.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1', 'redaktur', '2025-11-04 07:27:55'),
(2, 'Citra Lestari', 'citra.red', 'citra.l@example.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1', 'redaktur', '2025-11-04 07:27:55'),
(3, 'Eka Wijaya', 'ekapenulis', 'eka.w@example.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1', 'penulis', '2025-11-04 07:27:55'),
(4, 'Doni Firmansyah', 'donif', 'doni.f@example.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1', 'penulis', '2025-11-04 07:27:55'),
(5, 'Fajar Nugroho', 'fajar_n', 'fajar.n@example.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1', 'pembaca', '2025-11-04 07:27:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_penulis` (`id_penulis`),
  ADD KEY `id_redaktur` (`id_redaktur`);

--
-- Indexes for table `artikel_kategori`
--
ALTER TABLE `artikel_kategori`
  ADD PRIMARY KEY (`id_artikel`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_penulis`) REFERENCES `pengguna` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_redaktur`) REFERENCES `pengguna` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `artikel_kategori`
--
ALTER TABLE `artikel_kategori`
  ADD CONSTRAINT `artikel_kategori_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_kategori_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
