-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2021 pada 05.12
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` text NOT NULL,
  `nama` text NOT NULL,
  `password` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` text NOT NULL,
  `prodi` text NOT NULL,
  `kewarganegaraan` text NOT NULL,
  `status` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `password`, `tgl_lahir`, `gender`, `prodi`, `kewarganegaraan`, `status`, `keterangan`) VALUES
(16, 'M3119117', 'Muhammad Muhanna', 'muhanna', '1999-09-23', 'Pria', 'Tenik Kimia', 'WNI', 'Mahasiswa Aktif', 'Menempuh semester 8'),
(17, 'T3118080', 'Arifah Kurniawati ', '444rifaa', '2000-07-11', 'Wanita', 'Teknik Perkapalan', 'WNI', 'Mahasiswa Aktif', 'Pertukaran mahasiswa di Thailand'),
(21, 'M3112890', 'Yasinta Maya', 'yasin', '0000-00-00', 'Pria', 'Teknik Informatika', 'WNI', 'Mahasiswa Aktif', 'Menempuh semester 8'),
(25, 'M3119021', 'Astri Wulandari Astuti', 'astri1', '2000-03-01', 'Wanita', 'Teknik Perkapalan', 'WNI', 'Mahasiswa Aktif', 'Mahasiswa Baru'),
(29, 'M3113030', 'Nissa Sabyan', 'sabyanambu', '2000-08-11', 'Wanita', 'Teknik Industri', 'WNA', 'Mahasiswa Aktif', 'Sedang KKN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa2`
--

CREATE TABLE `mahasiswa2` (
  `id` int(11) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` text NOT NULL,
  `tahun_lahir` int(5) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `status` text NOT NULL,
  `beasiswa` text NOT NULL,
  `prodi` text NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa2`
--

INSERT INTO `mahasiswa2` (`id`, `nim`, `nama`, `tahun_lahir`, `hp`, `password`, `status`, `beasiswa`, `prodi`, `ket`) VALUES
(20, 'M3119005', 'Septiana Kardha', 1999, '02147483647', 'seti1234', 'Mahasiswa Aktif', 'Mahasiswa Bidikmisi', 'Statistika', 'Semester 2'),
(24, 'M3119333', 'Muhammad Munif', 1998, '087805448635', 'mun1f76', 'Mahasiswa Aktif', 'Mahasiswa Bidikmisi', 'Teknik Geodesi', 'Semester 4'),
(37, 'M3111092', 'Haidar Laksana', 1999, '087786972354', 'h41d4r20', 'Mahasiswa Aktif', 'Mahasiswa Bidikmisi', 'Teknik Geodesi', 'Magang'),
(38, 'M2119085', 'Zaskia Sunkar', 2002, '081872349090', 'sunkarza', 'Mahasiswa Aktif', '', 'Teknik Industri', 'Semester 2'),
(39, 'M3119333', 'Munaf Fadli', 1998, '-', 'Munaf', 'Mahasiswa Aktif', '', 'Teknik Informatika', ''),
(40, 'M3119332', 'Nias Mabela', 2000, '081910238877', 'nias', 'Mahasiswa Aktif', 'Mahasiswa Bidikmisi', 'Teknik Industri', 'Semester 6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa2`
--
ALTER TABLE `mahasiswa2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa2`
--
ALTER TABLE `mahasiswa2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
