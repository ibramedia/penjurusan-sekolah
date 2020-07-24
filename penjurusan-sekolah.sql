-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 05:12 PM
-- Server version: 8.0.13
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
-- Database: `penjurusan-sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `minat_kerja`
--

CREATE TABLE `minat_kerja` (
  `id_minat_kerja` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kerja` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alasan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minat_kerja`
--

INSERT INTO `minat_kerja` (`id_minat_kerja`, `id_siswa`, `kerja`, `alasan`) VALUES
(2, 4, 'Guru', 'Karena ingin memberi ilmu dengan anak murid saya.'),
(3, 4, 'Polwan', 'karena supaya menjaga keamanan dan kelestarian'),
(4, 4, 'Guru Agama', 'Membimbing dan memberi ilmu agama tentang akhlak');

-- --------------------------------------------------------

--
-- Table structure for table `minat_mapel`
--

CREATE TABLE `minat_mapel` (
  `id_minat_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `mapel` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alasan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minat_mapel`
--

INSERT INTO `minat_mapel` (`id_minat_mapel`, `id_siswa`, `mapel`, `alasan`) VALUES
(1, 4, 'Agama Islam', 'Karena mempelajari tentang agama dan akhlak ya'),
(2, 4, 'Bahasa Indonesia', 'Karena mempelajari tentang bahasa yang jelas dan efektif'),
(3, 4, 'Seni Budaya', 'Karena mempelajari tentang kesenian');

-- --------------------------------------------------------

--
-- Table structure for table `minat_pt`
--

CREATE TABLE `minat_pt` (
  `id_minat_pt` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `pt` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alasan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minat_pt`
--

INSERT INTO `minat_pt` (`id_minat_pt`, `id_siswa`, `pt`, `alasan`) VALUES
(1, 4, 'UNRI', 'Saya ingin melanjut ke perguruan tinggi'),
(2, 4, 'UIN', 'Ingin melanjuti perguruan tinggi'),
(3, 4, 'Amik Dumai', 'Ingin mencapai prestasi');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `ipa` int(11) NOT NULL,
  `ips` int(11) NOT NULL,
  `psikotes` int(11) NOT NULL,
  `dokumen_psikotes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `ipa`, `ips`, `psikotes`, `dokumen_psikotes`) VALUES
(10, 9, 85, 90, 0, ''),
(11, 8, 89, 81, 130, ''),
(14, 4, 90, 78, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `peminatan`
--

CREATE TABLE `peminatan` (
  `id_peminatan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `pilihan` int(11) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminatan`
--

INSERT INTO `peminatan` (`id_peminatan`, `id_siswa`, `pilihan`, `alasan`) VALUES
(1, 4, 2, 'Karena saya lebih suka ilmu-ilmu sosial');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `no_peserta` varchar(30) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `agama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `status_sekolah_asal` varchar(20) NOT NULL,
  `bulan_tahun_masuk_smp` varchar(20) NOT NULL,
  `bulan_tahun_lulus_smp` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `no_peserta`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_hp`, `asal_sekolah`, `status_sekolah_asal`, `bulan_tahun_masuk_smp`, `bulan_tahun_lulus_smp`, `password`) VALUES
(4, '110', 'Sri Wulandari', 'Dumai', '2004-04-04', 'Islam', 'Jl. Baru Bukit Abbas', '085364232048', 'SMP Negeri 16 Bengkalis', 'Negeri', '2016-07', '2019-05', '110'),
(8, '111', 'Joni', '', '', '', '', '', '', '', '', '', '111'),
(9, '112', 'Dina', '', '', '', '', '', '', '', '', '', '112');

-- --------------------------------------------------------

--
-- Table structure for table `tu`
--

CREATE TABLE `tu` (
  `id_tu` int(11) NOT NULL,
  `nama_tu` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tu`
--

INSERT INTO `tu` (`id_tu`, `nama_tu`, `username`, `password`) VALUES
(1, 'Siti Yana', 'siti', 'siti123');

-- --------------------------------------------------------

--
-- Table structure for table `wakasis`
--

CREATE TABLE `wakasis` (
  `id_wakasis` int(11) NOT NULL,
  `nama_wakasis` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wakasis`
--

INSERT INTO `wakasis` (`id_wakasis`, `nama_wakasis`, `nip`, `username`, `password`) VALUES
(1, 'Badu Rahman', '196710106700223', 'badu', 'badu123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `minat_kerja`
--
ALTER TABLE `minat_kerja`
  ADD PRIMARY KEY (`id_minat_kerja`);

--
-- Indexes for table `minat_mapel`
--
ALTER TABLE `minat_mapel`
  ADD PRIMARY KEY (`id_minat_mapel`);

--
-- Indexes for table `minat_pt`
--
ALTER TABLE `minat_pt`
  ADD PRIMARY KEY (`id_minat_pt`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `peminatan`
--
ALTER TABLE `peminatan`
  ADD PRIMARY KEY (`id_peminatan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tu`
--
ALTER TABLE `tu`
  ADD PRIMARY KEY (`id_tu`);

--
-- Indexes for table `wakasis`
--
ALTER TABLE `wakasis`
  ADD PRIMARY KEY (`id_wakasis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `minat_kerja`
--
ALTER TABLE `minat_kerja`
  MODIFY `id_minat_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `minat_mapel`
--
ALTER TABLE `minat_mapel`
  MODIFY `id_minat_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `minat_pt`
--
ALTER TABLE `minat_pt`
  MODIFY `id_minat_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `peminatan`
--
ALTER TABLE `peminatan`
  MODIFY `id_peminatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tu`
--
ALTER TABLE `tu`
  MODIFY `id_tu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wakasis`
--
ALTER TABLE `wakasis`
  MODIFY `id_wakasis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
