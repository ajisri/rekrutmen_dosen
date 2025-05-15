-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2019 pada 03.15
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `openrekrut`
--
CREATE DATABASE IF NOT EXISTS `openrekrut` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `openrekrut`;

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_upload`
--

CREATE TABLE IF NOT EXISTS `file_upload` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(20) NOT NULL,
  `path_file` varchar(100) NOT NULL,
  `kategori_file` varchar(30) NOT NULL,
  `nama_file` varchar(30) NOT NULL,
  `kesesuaian` varchar(30) NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kualifikasi`
--

CREATE TABLE IF NOT EXISTS `tb_kualifikasi` (
  `id_kualifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kualifikasi` varchar(15) NOT NULL,
  `nm_kualifikasi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kualifikasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_kualifikasi`
--

INSERT INTO `tb_kualifikasi` (`id_kualifikasi`, `kode_kualifikasi`, `nm_kualifikasi`) VALUES
(1, 'a-01', 'Tenaga pemroses'),
(2, 'a-o2', 'Tenaga pengolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelamar`
--

CREATE TABLE IF NOT EXISTS `tb_pelamar` (
  `id_pelamar` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` int(11) NOT NULL,
  `ktp` int(11) NOT NULL,
  `gelar_depan` varchar(10) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `gelar_belakang` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(70) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_telepon` int(14) NOT NULL,
  `alamat` varchar(223) NOT NULL,
  `pendidikan` varchar(3) NOT NULL,
  `nmr_ijazah` varchar(30) NOT NULL,
  `nm_kampus` varchar(223) NOT NULL,
  `akreditasi_kampus` varchar(2) NOT NULL,
  `ipk` varchar(5) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `akreditasi_jurusan` varchar(2) NOT NULL,
  `thn_lulus` int(4) NOT NULL,
  `toefl` varchar(10) NOT NULL,
  `keterangan_berkas` varchar(223) NOT NULL,
  `status` int(4) NOT NULL,
  `verifikator` varchar(20) NOT NULL,
  `id_kualifikasi` int(11) NOT NULL,
  PRIMARY KEY (`id_pelamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_tampil` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik`, `password`, `password_tampil`, `level`) VALUES
(1, 33111, '81dc9bdb52d04dc20036dbd8313ed055', '1234', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
