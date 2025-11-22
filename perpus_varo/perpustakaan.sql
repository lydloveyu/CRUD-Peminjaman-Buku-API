-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2025 at 09:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `tahun`, `stok`) VALUES
(2, 'Bumi Manusia', 'Pramoedya Ananta Toer', 1980, 8),
(3, 'Salah Asuhan', 'Abdul Muis', 1928, 5),
(4, 'Harimau! Harimau!', 'Mochtar Lubis', 1975, 6),
(6, 'Kubah', 'Ahmad Tohari', 1980, 4),
(7, 'Anjing Mengeong, Kucing Menggonggong', 'Eka Kurniawan', 2024, 9),
(8, 'Ayat-Ayat Cinta', 'Habiburrahman El‑Shirazy', 2004, 12),
(9, 'Hidup Ini Terlalu Banyak Kamu', 'Pidi Baiq', 2025, 7),
(10, 'Untukmu, Anak Bungsu', 'Hidya Hanin', 2025, 8),
(11, 'Self Improved Me', 'Puty Puar', 2023, 6),
(12, 'Atomic Habits', 'James Clear', 2018, 11),
(13, 'Filosofi Teras', 'Henry Manampiring', 2019, 9),
(14, 'The Power of Now', 'Eckhart Tolle', 1997, 5),
(15, 'Man’s Search for Meaning', 'Viktor E. Frankl', 1946, 4),
(16, 'The Defining Decade', 'Meg Jay', 2012, 6),
(17, 'Almost Adulting', 'Nadhira Afifa', 2022, 8),
(18, 'Breakthrough!', '(Penulis Breakthrough)', 2020, 5),
(19, 'Fight Like A Tiger Win Like A Champion', '(Penulis Tiger Champion)', 2000, 4),
(20, 'Badai Pasti Berlalu', 'Marga T', 1974, 10),
(21, 'Vengeance Is Mine, All Others Pay Cash', 'Eka Kurniawan', 2014, 6),
(22, 'Negeri 5 Menara', 'Ahmad Fuadi', 2009, 7),
(23, 'Sang Pemimpi', 'Donny Dhirgantoro', 2010, 6),
(24, 'Perahu Kertas', 'Dee Lestari', 2003, 8),
(25, 'Edensor', 'Andrea Hirata', 2010, 5),
(27, 'Sengsara Membawa Nikmat', 'Tulis Sutan Sati', 1929, 4),
(28, 'The 7 Habits of Highly Effective People', 'Stephen R. Covey', 1989, 10),
(29, 'How to Win Friends and Influence People', 'Dale Carnegie', 1936, 9),
(30, 'Kecerdasan Emosional', 'Daniel Goleman', 1995, 8),
(31, 'Atomic Habits', 'James Clear', 1990, 90);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
