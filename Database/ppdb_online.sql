-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2021 pada 12.26
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `pas_foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `fullname`, `pas_foto`) VALUES
(5, 'husain89@gmail.com', 'husain123', 'Muhammad Husain', '6191915e96a7a.jpg'),
(6, 'nioke8090@gmail.com', '12345678', 'Muhammad Nurul Mustofa', '6191b144cbdb6.jpg'),
(7, 'nurhafifah@gmail.com', '123456', 'Nurhafifah Lutfiah Desiana', '6191d861a1ce2.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `no_pendaftaran` int(11) NOT NULL,
  `nama_calon_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `anak_ke` varchar(50) NOT NULL,
  `jurusan_satu` varchar(50) NOT NULL,
  `jurusan_dua` varchar(50) NOT NULL,
  `pas_foto` varchar(100) NOT NULL,
  `alamat_calon_siswa` text NOT NULL,
  `tlp_calon_siswa` varchar(50) NOT NULL,
  `nama_sekolah_asal` varchar(50) NOT NULL,
  `alamat_sekolah_asal` text NOT NULL,
  `tahun_lulus` varchar(50) NOT NULL,
  `tahun_periode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jurusan_terpilih` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `calon_siswa`
--

INSERT INTO `calon_siswa` (`no_pendaftaran`, `nama_calon_siswa`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `anak_ke`, `jurusan_satu`, `jurusan_dua`, `pas_foto`, `alamat_calon_siswa`, `tlp_calon_siswa`, `nama_sekolah_asal`, `alamat_sekolah_asal`, `tahun_lulus`, `tahun_periode`, `status`, `jurusan_terpilih`) VALUES
(1, 'MUHAMMAD NURUL MUSTOFA', 'PROBOLINGGO', '2004-01-08', 'laki-laki', 'islam', '1', 'Rekayasa Perangkat Lunak', 'Teknik Instalasi Tenaga Listrik', '618e901e95571.png', 'DUSUN KRAJAN RT 008 / RW 003 DESA BANYUANYAR LOR GENDING PROBOINGGO', '085161644408', 'SMPN 1 GENDING', 'SUMBER KERANG GENDING PROBOLINGGO', '2021', '2021/2022', 'LOLOS', 'Rekayasa Perangkat Lunak'),
(2, 'nurhafifah', 'PROBOLINGGO', '2003-02-22', 'laki-laki', 'islam', '1', 'Teknik Instalasi Tenaga Listrik', 'Rekayasa Perangkat Lunak', '6191ccebdd7fb.jpg', 'DUSUN KRAJAN RT 008 / RW 003 DESA BANYUANYAR LOR GENDING PROBOINGGO', '08161644408', 'SMPN 1 GENDING', 'SUMBER KERANG GENDING PROBOLINGGO', '2021', '2021/2022', 'LOLOS', 'Teknik Instalasi Tenaga Listrik'),
(3, 'Muhammad Roihan', 'Probolinggo', '2004-05-08', 'laki-laki', 'islam', '1', 'Rekayasa Perangkat Lunak', 'Teknik Kendaraan Ringan', '6191d74d6d257.jpg', 'DUSUN KRAJAN RT 008 / RW 003 DESA BANYUANYAR LOR GENDING PROBOINGGO', '085231655547', 'SMPN 2 GENDING', 'Sumber Kerang', '2021', '2021/2022', 'LOLOS', 'Rekayasa Perangkat Lunak'),
(4, 'SAMSUL HADI', 'PROBOLINGGO', '2004-02-05', 'laki-laki', 'islam', '3', 'Rekayasa Perangkat Lunak', 'Teknik Instalasi Tenaga Listrik', '61a6277022f3a.jpg', 'DUSUN KRAJAN RT 008 / RW 003 DESA BANYUANYAR LOR GENDING PROBOINGGO', '085231533324', 'SMPN 1 GENDING', 'SUMBER KERANG GENDING PROBOLINGGO', '2021', '2020/2021', 'TIDAK DITERIMA', 'TIDAK DITERIMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `matematika` int(50) NOT NULL,
  `bhs_indo` int(50) NOT NULL,
  `bhs_ing` int(50) NOT NULL,
  `ipa` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `matematika`, `bhs_indo`, `bhs_ing`, `ipa`) VALUES
(1, 84, 85, 95, 90),
(2, 80, 62, 45, 75),
(3, 56, 78, 80, 75),
(4, 80, 85, 95, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `fullname`, `email`, `password`) VALUES
(1, 'Muhammad Nurul Mustofa', 'nioke8090@gmail.com', '12345678'),
(2, 'nurhaffalutfiah', 'nurhafifadesiana62@gmail.com', 'nurhafifa123ok'),
(3, 'Muhammad Roihan', 'roihan123@gmail.com', '12345678'),
(4, 'Samsul Hadi', 'sh2069936@gmail.com', '12345678');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `insert_into_nilai` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO nilai VALUES('', '', '', '', '')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_into_siswa` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO calon_siswa VALUES ('','','','','','','','','','default.png','','','','','','','Belum Di Validasi','Belum Di Tentukan')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_into_wali` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO wali VALUES ('','','','','','','')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(11) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `telp_ortu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wali`
--

INSERT INTO `wali` (`id_wali`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `telp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`) VALUES
(1, 'Muhammad Mursyid', 'Agustine Camelia', 'Dusun Krajan RT 008 / RW 003', '08523533324', 'Guru', 'Ibu Rumah Tangga'),
(2, 'AHMAD ZAINI', 'vivin yuliantin', 'blado kulon', '08264467989', 'petani', 'Ibu Rumah Tangga'),
(3, 'Ruhin', 'Astutik', 'Dusun Krajan RT 008 / RW 003', '05896455698', 'petani', 'Ibu Rumah Tangga'),
(4, 'Moh. Thoher', 'Ummi Kulsum', 'Dusun Krajan RT 008 / RW 003', '08523533324', 'petani', 'Ibu Rumah Tangga');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `no_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
