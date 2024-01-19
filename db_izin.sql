-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2020 pada 16.51
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_izin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_asrama`
--

CREATE TABLE `tb_asrama` (
  `id_asrama` int(11) NOT NULL,
  `asrama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_asrama`
--

INSERT INTO `tb_asrama` (`id_asrama`, `asrama`) VALUES
(1, 'Abu Bakar'),
(2, 'Umar'),
(3, 'Asrama Contoh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_izin`
--

CREATE TABLE `tb_izin` (
  `id_izin` int(11) NOT NULL,
  `id_santri` varchar(20) NOT NULL,
  `keperluan` enum('Pulang','Keluar') NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_out` datetime NOT NULL,
  `tgl_in` datetime NOT NULL,
  `status` set('1','0') NOT NULL,
  `aut_izin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_izin`
--

INSERT INTO `tb_izin` (`id_izin`, `id_santri`, `keperluan`, `keterangan`, `tgl_out`, `tgl_in`, `status`, `aut_izin`) VALUES
(2, '222', 'Pulang', 'Kerja', '2020-09-17', '2020-09-24', '0', 1),
(3, '444', 'Pulang', 'Ambil uang', '2020-09-01', '2020-09-04', '0', 1),
(4, '555', 'Pulang', 'sakit', '2020-09-17', '2020-09-24', '0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` enum('Administrator','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Zainal Arifin', 'admin', '1', 'Administrator'),
(2, 'Agus', 'tugas', '1', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_santri`
--

CREATE TABLE `tb_santri` (
  `id_santri` varchar(20) NOT NULL,
  `id_asrama` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `alamat` text NOT NULL,
  `wali` varchar(30) NOT NULL,
  `hp_wali` varchar(15) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `th_masuk` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_santri`
--

INSERT INTO `tb_santri` (`id_santri`, `id_asrama`, `nama`, `jekel`, `alamat`, `wali`, `hp_wali`, `th_masuk`, `kelas`) VALUES
('111', 2, 'joni', 'LK', 'Tangerang', 'ateng', '087234567223', 2005, '6'),
('222', 2, 'Agus', 'LK', 'demak', 'Sukiman', '087234567009', 2005, '6'),
('333', 1, 'Wahyu', 'LK', 'Pati', 'Suji', '087234567009', 2001, '6'),
('444', 1, 'Fahri', 'LK', 'Tangerang', 'Hadi', '087234567009', 2015, '6'),
('555', 1, 'Jazuli', 'LK', 'Jakarta', 'Abiyasa', '087234567009', 2010, '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_telegram`
--

CREATE TABLE `tb_telegram` (
  `id_telegram` int(11) NOT NULL,
  `telegram` varchar(50) NOT NULL,
  `id_chat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_telegram`
--

INSERT INTO `tb_telegram` (`id_telegram`, `telegram`, `id_chat`) VALUES
(1, 'Informasi Keamanan PP. DARUSSYAFAAT', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_asrama`
--
ALTER TABLE `tb_asrama`
  ADD PRIMARY KEY (`id_asrama`);

--
-- Indeks untuk tabel `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_santri`
--
ALTER TABLE `tb_santri`
  ADD PRIMARY KEY (`id_santri`),
  ADD KEY `id_asrama` (`id_asrama`);

--
-- Indeks untuk tabel `tb_telegram`
--
ALTER TABLE `tb_telegram`
  ADD PRIMARY KEY (`id_telegram`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_asrama`
--
ALTER TABLE `tb_asrama`
  MODIFY `id_asrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_izin`
--
ALTER TABLE `tb_izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_telegram`
--
ALTER TABLE `tb_telegram`
  MODIFY `id_telegram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD CONSTRAINT `tb_izin_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `tb_santri` (`id_santri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_santri`
--
ALTER TABLE `tb_santri`
  ADD CONSTRAINT `tb_santri_ibfk_1` FOREIGN KEY (`id_asrama`) REFERENCES `tb_asrama` (`id_asrama`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
