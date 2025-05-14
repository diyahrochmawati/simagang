-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jul 2019 pada 03.05
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simagang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pejabat`
--

CREATE TABLE `akun_pejabat` (
  `usernamepejabat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `posisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_pejabat`
--

INSERT INTO `akun_pejabat` (`usernamepejabat`, `email`, `password`, `jabatan`, `posisi`) VALUES
('admin', 'admin@gmail.com', '$2y$10$ZawFb4AeLgXOmPebczTUIOq6GYB2Cgs6qnU2w03gw/nN6XOicDn4W', 'Admin', 'SU. '),
('akuntansi@gmail.com', 'akuntansi@gmail.com', '$2y$10$16.k0AIJcThkw.CqXRSGp.1wyLx6yY02NpX3rPVJxrzqffFxLNQa2', 'Pimpinan_Bagian', 'AK. '),
('instalasi1@gmail.com', 'instalasi1@gmail.com', '$2y$10$tKVe3oOjd/IaerbAVld/H.dwds4pmoqRhdqNx7NSrbRc785UCZLyW', 'Pimpinan_Bagian', 'I1. '),
('instalasi2@gmail.com', 'instalasi2@gmail.com', '$2y$10$3XwkndP.XCJDb7KFyP/mZueZ3jgxBIa7ApK7wxP1LOWoLcXvkZ0ri', 'Pimpinan_Bagian', 'I2. '),
('kabag@gmail.com', 'kabag@gmail.com', '$2y$10$k7HkPHN.lNhbwieXhbyCyO9mOD6wJ5IRjnbH/W6g2Eq31XDM9FgRm', 'Kabag_SDM', 'SU. '),
('pabrikasi1@gmail.com', 'pabrikasi1@gmail.com', '$2y$10$dgUyDEGlpJ/TjdrqfEx.vOyvSDYQfgeWcmPkGdmL0WeQiFYOPxnim', 'Pimpinan_Bagian', 'P1. '),
('pabrikasi2@gmail.com', 'pabrikasi2@gmail.com', '$2y$10$SD.E9BpsyYSnMFO5dswkgeJgUp8SeoNEpnBlUhiP7eZ81f1bL/XXa', 'Pimpinan_Bagian', 'P2. '),
('qualitycontrol@gmail.com', 'qualitycontrol@gmail.com', '$2y$10$2BPQRfB1Lrt1RqzUy4P1YerLDU2El1opba2yhBukOzw8zixbvi1j2', 'Pimpinan_Bagian', 'QC. '),
('sdmumum@gmail.com', 'sdmumum@gmail.com', '$2y$10$c6ukB2MAv.rLH.Nt.rVyUeFtQVu7H0iYBNsCLlGXkYrEAyRd.9yVK', 'Pimpinan_Bagian', 'SU. '),
('staff@gmail.com', 'staff@gmail.com', '$2y$10$ONuARov4RHPJsinIDI5AtOPoOr7mmV64Ao3dvS8k693R6HFsteuOq', 'Staff', 'SU. '),
('tanaman@gmail.com', 'tanaman@gmail.com', '$2y$10$iUF32qs/pJJsyoRU0oacouI9bgya3MM7KgxEhw0XW9CKsGCHBm9Bu', 'Pimpinan_Bagian', 'TN. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `username` varchar(50) NOT NULL,
  `id_daftar` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jml_peserta` int(10) NOT NULL,
  `no_ktp` bigint(30) NOT NULL,
  `nama_ketua` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenjang` varchar(30) NOT NULL,
  `instansi` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `kartu_identitas` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `surat_acc` varchar(100) NOT NULL,
  `laporan` varchar(100) NOT NULL,
  `formnilai` varchar(60) NOT NULL,
  `nilai` varchar(60) NOT NULL,
  `ket_revisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_daftar` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `no_ktpa` bigint(50) NOT NULL,
  `namaa` varchar(50) NOT NULL,
  `tempat_lahira` varchar(30) NOT NULL,
  `tanggal_lahira` date NOT NULL,
  `kelamina` varchar(20) NOT NULL,
  `alamata` text NOT NULL,
  `emaila` varchar(50) NOT NULL,
  `no_tlpa` varchar(15) NOT NULL,
  `jurusana` varchar(10) NOT NULL,
  `uploadktp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_revisi`
--

CREATE TABLE `riwayat_revisi` (
  `id_daftar` int(11) NOT NULL,
  `ket` text NOT NULL,
  `tanggal` varchar(80) NOT NULL,
  `oleh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_pejabat`
--
ALTER TABLE `akun_pejabat`
  ADD PRIMARY KEY (`usernamepejabat`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_daftar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
