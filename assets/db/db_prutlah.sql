-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 07:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prutlah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(28, 'Ampelgading'),
(29, 'Bantarbolang'),
(30, 'Belik'),
(31, 'Bodeh'),
(32, 'Comal'),
(33, 'Moga'),
(34, 'Pemalang'),
(35, 'Petarukan'),
(36, 'Pulosari'),
(37, 'Randudongkal'),
(38, 'Taman'),
(39, 'Ulujami'),
(40, 'Warungpring'),
(41, 'Watukumpul');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` varchar(50) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Petugas','Pengusul') NOT NULL DEFAULT 'Pengusul',
  `grup` enum('A','B') NOT NULL DEFAULT 'B'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`, `grup`) VALUES
('059549eb-1d4e-4ead-a941-024cbf8015e2', 'Paduraksa', 'pengadu1', '123', 'Pengusul', 'B'),
('11823efa-60a6-48dc-97d0-d451e98cbeb1', 'Surajaya', 'surajaya01', '123', 'Pengusul', 'B'),
('33fdb65d-93a8-485f-8aed-b976e1db5395', 'Sewaka', 'pengadu2', '123', 'Pengusul', 'B'),
('4ddca69d-0069-43f1-953a-bdfadbc6421a', 'Gongseng', 'pengadu3', '123', 'Pengusul', 'B'),
('5351949a-6598-11eb-96e0-60eb69a13690', 'Reffrains', 'Petugas', '123', 'Petugas', 'A'),
('766b07b7-658e-11eb-96e0-60eb69a13690', 'Arifinza Eska Nugraha', 'admin', '123', 'Administrator', 'A'),
('a538c884-ac43-4c3e-a819-4936f168ee32', 'Mulyoharjo', 'dgv', 'dzg', 'Pengusul', 'B'),
('f359a130-3fca-11ec-93ad-88d7f63ba10e', 'Mellifluous', 'petugas01', '123', 'Petugas', 'A'),
('fd60e63d-e3a8-4a57-b64f-5ce844199d6c', 'Mengori', 'mengori17', '123', 'Pengusul', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengusul`
--

CREATE TABLE `tb_pengusul` (
  `id_desa` varchar(50) NOT NULL,
  `nama_desa` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengusul`
--

INSERT INTO `tb_pengusul` (`id_desa`, `nama_desa`, `email`, `no_hp`, `alamat`) VALUES
('059549eb-1d4e-4ead-a941-024cbf8015e2', 'Paduraksa', 'paduraksa@protonmail.com', '087789987653', 'Jl. Santadiharja no. 25'),
('11823efa-60a6-48dc-97d0-d451e98cbeb1', 'Surajaya', 'mydesa@surajaya.go.id', '08218136451645', 'Jl. Purbaya no. 25'),
('33fdb65d-93a8-485f-8aed-b976e1db5395', 'Sewaka', 'desaku@sewaka.go.id', '085878526048', 'Jl. Melon No. 99'),
('4ddca69d-0069-43f1-953a-bdfadbc6421a', 'Gongseng', 'mydesa@gongseng.go.id', '0897253657123', 'Jl. Nangka No. 13'),
('a538c884-ac43-4c3e-a819-4936f168ee32', 'Mulyoharjo', 'mulyoharjo@yahoo.com', '084581364897645', 'Jl. Gajah no. 23'),
('fd60e63d-e3a8-4a57-b64f-5ce844199d6c', 'Mengori', 'mengori@gmail.com', '08231652176513', 'Jl. Tikus no. 25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_telegram`
--

CREATE TABLE `tb_telegram` (
  `id_telegram` varchar(5) NOT NULL,
  `user` varchar(20) NOT NULL,
  `id_chat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_telegram`
--

INSERT INTO `tb_telegram` (`id_telegram`, `user`, `id_chat`) VALUES
('tL9', 'Akun Telegram Admin', '974984241');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan`
--

CREATE TABLE `tb_usulan` (
  `id_pengaduan` int(11) NOT NULL,
  `nama_pengusul` varchar(100) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `nik` text NOT NULL,
  `foto` varchar(300) NOT NULL,
  `waktu_aduan` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Proses',
  `author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usulan`
--

INSERT INTO `tb_usulan` (`id_pengaduan`, `nama_pengusul`, `kecamatan`, `desa`, `nik`, `foto`, `waktu_aduan`, `status`, `author`) VALUES
(26, 'Budi Setiawan', 34, 'Jl. Gangga no.123, Desa Paduraksa', '332708123456120001', '3840x1080-Wallpaper-121.jpg', '2021-11-04 21:19:33', 'Tanggapi', '059549eb-1d4e-4ead-a941-024cbf8015e2'),
(28, 'Loaony Meruado', 30, 'Jl mangunkusumo no. 12, Desa Mbeluk', '332708123478650001', '1301120.jpg', '2021-11-04 21:23:47', 'Selesai', '33fdb65d-93a8-485f-8aed-b976e1db5395'),
(29, 'Levi Ackerman', 34, 'Jl. Anggatirta no 17, Paduraksa', '332708123456129900', '727047.png', '2021-11-04 21:25:40', 'Selesai', '059549eb-1d4e-4ead-a941-024cbf8015e2'),
(31, 'Dinda Yager', 34, 'Jl. Anggatirta no 12, Paduraksa', '33212345632542356421', '144308.jpg', '2021-11-07 12:32:44', 'Proses', '059549eb-1d4e-4ead-a941-024cbf8015e2'),
(32, 'Siti', 34, 'Jl. Anggatirta no 12, Paduraksa', '33251254124611', '1301120.jpg', '2021-11-08 08:31:22', 'Proses', '059549eb-1d4e-4ead-a941-024cbf8015e2'),
(33, 'Deni', 34, 'Jl. Gangga no.123', '3326176512654623', '727047.png', '2021-11-08 10:54:39', 'Proses', '059549eb-1d4e-4ead-a941-024cbf8015e2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pengusul`
--
ALTER TABLE `tb_pengusul`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_telegram`
--
ALTER TABLE `tb_telegram`
  ADD PRIMARY KEY (`id_telegram`);

--
-- Indexes for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `jenis` (`kecamatan`),
  ADD KEY `author` (`author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD CONSTRAINT `tb_usulan_ibfk_1` FOREIGN KEY (`kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usulan_ibfk_2` FOREIGN KEY (`author`) REFERENCES `tb_pengusul` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
