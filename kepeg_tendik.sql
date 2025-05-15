-- --------------------------------------------------------
-- Host:                         10.37.19.54
-- Server version:               5.7.33-0ubuntu0.16.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table kepeg_tendik.file_upload
CREATE TABLE IF NOT EXISTS `file_upload` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(20) DEFAULT NULL,
  `path_file` varchar(225) DEFAULT NULL,
  `kategori_file` varchar(225) DEFAULT NULL,
  `nama_file` varchar(225) DEFAULT NULL,
  `kesesuaian` varchar(30) DEFAULT NULL,
  `kode_unik` varchar(255) NOT NULL,
  `waktu` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_file`),
  UNIQUE KEY `kode_unik` (`kode_unik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.file_upload: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.ijazah
CREATE TABLE IF NOT EXISTS `ijazah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenjang` varchar(256) DEFAULT NULL,
  `status_aktif` int(1) DEFAULT '0',
  `tingkat` int(1) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table kepeg_tendik.ijazah: ~11 rows (approximately)
INSERT INTO `ijazah` (`id`, `jenjang`, `status_aktif`, `tingkat`) VALUES
	(1, 'SMA Sederajat', 0, 1),
	(2, 'D3', 0, 2),
	(3, 'D4', 1, 3),
	(4, 'S1', 1, 3),
	(5, 'S1 Profesi', 1, 4),
	(6, 'S2', 1, 5),
	(7, 'S2 Terapan', 1, 5),
	(8, 'SP-1', 1, 5),
	(9, 'S3', 1, 6),
	(10, 'S3 Terapan', 1, 6),
	(11, 'SP-2', 1, 6);

-- Dumping structure for table kepeg_tendik.lokasi
CREATE TABLE IF NOT EXISTS `lokasi` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nodaftar` varchar(100) NOT NULL,
  `lokasiujian` varchar(255) NOT NULL,
  `gedungujian` varchar(255) NOT NULL,
  `ruangujian` varchar(255) NOT NULL,
  `noujian` varchar(10) NOT NULL,
  `final` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.lokasi: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_agama
CREATE TABLE IF NOT EXISTS `tb_agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `agama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_agama: ~6 rows (approximately)
INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
	(1, 'Islam'),
	(2, 'Kristen'),
	(3, 'Katolik'),
	(4, 'Hindu'),
	(5, 'Buddha'),
	(6, 'Konghucu');

-- Dumping structure for table kepeg_tendik.tb_akses_masuk
CREATE TABLE IF NOT EXISTS `tb_akses_masuk` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `nama_pegawai` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cek data pelamar, sudah terdaftar sebagai pegaai tetap atau belum';

-- Dumping data for table kepeg_tendik.tb_akses_masuk: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_bahanverifikasi
CREATE TABLE IF NOT EXISTS `tb_bahanverifikasi` (
  `id_bhnverifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kualifikasi` int(11) NOT NULL,
  `kode_kualifikasi` varchar(10) NOT NULL,
  `min_akreditasipt` varchar(2) NOT NULL,
  `min_akreditasips` varchar(2) NOT NULL,
  `ipk` varchar(225) NOT NULL,
  `min_akreditasipt1` varchar(2) NOT NULL,
  `min_akreditasips1` varchar(2) NOT NULL,
  `ipk1` varchar(225) NOT NULL,
  `min_akreditasipt2` varchar(2) NOT NULL,
  `min_akreditasips2` varchar(2) NOT NULL,
  `ipk2` varchar(225) NOT NULL,
  `min_akreditasipt3` varchar(2) NOT NULL,
  `min_akreditasips3` varchar(2) NOT NULL,
  `ipk3` varchar(225) NOT NULL,
  `itp` varchar(3) NOT NULL,
  `ielts` varchar(5) NOT NULL,
  `lainlainnya` varchar(30) NOT NULL,
  `skor_itp` varchar(10) NOT NULL,
  `skor_ielts` varchar(10) NOT NULL,
  `skor_lain` varchar(10) NOT NULL,
  `jml_total` varchar(10) NOT NULL,
  `jml_lolos` varchar(225) NOT NULL,
  `jml_tidaklolos` varchar(225) NOT NULL,
  `status_bahan` int(11) NOT NULL,
  PRIMARY KEY (`id_bhnverifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_bahanverifikasi: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_dataverifikasi
CREATE TABLE IF NOT EXISTS `tb_dataverifikasi` (
  `id_dataverifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelamardataverifikasi` int(11) NOT NULL,
  `id_kualifikasi` varchar(225) NOT NULL,
  `verif_lamaran` varchar(225) DEFAULT NULL,
  `verif_ktp` varchar(225) DEFAULT NULL,
  `verif_foto` varchar(100) NOT NULL,
  `verif_sks` varchar(225) DEFAULT NULL,
  `verif_skck` varchar(225) DEFAULT NULL,
  `verif_suratpernyataanbebasparpol` varchar(225) DEFAULT NULL,
  `verif_suratpernyataanbebasdariinstansi` varchar(225) DEFAULT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `asal_sekolah1` varchar(50) NOT NULL,
  `asal_sekolah2` varchar(50) NOT NULL,
  `asal_sekolah3` varchar(50) NOT NULL,
  `verif_ijazah` varchar(223) DEFAULT NULL,
  `ket_ijazahprodi` varchar(223) DEFAULT NULL,
  `verif_transkrip` varchar(225) DEFAULT NULL,
  `ket_transkripipk` varchar(225) DEFAULT NULL,
  `verif_akreditasipt` varchar(223) DEFAULT NULL,
  `ket_akreditasipt` varchar(223) DEFAULT NULL,
  `ket_akreditasiptsaatlulus` varchar(223) DEFAULT NULL,
  `verif_akreditasiprodi` varchar(223) DEFAULT NULL,
  `ket_akreditasiprodi` varchar(223) DEFAULT NULL,
  `ket_akreditasiprodisaatlulus` varchar(223) DEFAULT NULL,
  `verif_penyetaraan` varchar(225) DEFAULT NULL,
  `ket_penyetaraan` varchar(225) DEFAULT NULL,
  `verif_ijazah1` varchar(223) DEFAULT NULL,
  `ket_ijazahprodi1` varchar(223) DEFAULT NULL,
  `verif_transkrip1` varchar(225) DEFAULT NULL,
  `ket_transkripipk1` varchar(225) DEFAULT NULL,
  `verif_akreditasipt1` varchar(223) DEFAULT NULL,
  `ket_akreditasipt1` varchar(223) DEFAULT NULL,
  `ket_akreditasipt1saatlulus` varchar(223) DEFAULT NULL,
  `verif_akreditasiprodi1` varchar(223) DEFAULT NULL,
  `ket_akreditasiprodi1` varchar(223) DEFAULT NULL,
  `ket_akreditasiprodi1saatlulus` varchar(223) DEFAULT NULL,
  `verif_penyetaraan1` varchar(225) DEFAULT NULL,
  `ket_penyetaraan1` varchar(225) DEFAULT NULL,
  `verif_ijazah2` varchar(223) DEFAULT NULL,
  `ket_ijazahprodi2` varchar(223) DEFAULT NULL,
  `verif_transkrip2` varchar(225) DEFAULT NULL,
  `ket_transkripipk2` varchar(225) DEFAULT NULL,
  `verif_akreditasipt2` varchar(223) DEFAULT NULL,
  `ket_akreditasipt2` varchar(223) DEFAULT NULL,
  `ket_akreditasipt2saatlulus` varchar(223) DEFAULT NULL,
  `verif_akreditasiprodi2` varchar(223) DEFAULT NULL,
  `ket_akreditasiprodi2` varchar(223) DEFAULT NULL,
  `ket_akreditasiprodi2saatlulus` varchar(223) DEFAULT NULL,
  `verif_penyetaraan2` varchar(225) DEFAULT NULL,
  `ket_penyetaraan2` varchar(225) DEFAULT NULL,
  `verif_ijazah3` varchar(223) DEFAULT NULL,
  `ket_ijazahprodi3` varchar(223) DEFAULT NULL,
  `verif_transkrip3` varchar(225) DEFAULT NULL,
  `ket_transkripipk3` varchar(225) DEFAULT NULL,
  `verif_akreditasipt3` varchar(223) DEFAULT NULL,
  `ket_akreditasipt3` varchar(223) DEFAULT NULL,
  `ket_akreditasipt3saatlulus` varchar(223) DEFAULT NULL,
  `verif_akreditasiprodi3` varchar(223) DEFAULT NULL,
  `ket_akreditasiprodi3` varchar(223) DEFAULT NULL,
  `ket_akreditasiprodi3saatlulus` varchar(223) DEFAULT NULL,
  `verif_penyetaraan3` varchar(225) DEFAULT NULL,
  `ket_penyetaraan3` varchar(225) DEFAULT NULL,
  `verif_toefl` varchar(225) DEFAULT NULL,
  `ket_jenistoefl` varchar(225) DEFAULT NULL,
  `ket_toefl` varchar(225) DEFAULT NULL,
  `ket_konversiitp` varchar(225) DEFAULT NULL,
  `ket_lembagapenerbit` varchar(225) DEFAULT NULL,
  `ket_keterangantoefl` varchar(225) DEFAULT NULL,
  `catatan_tambahan` text,
  `status_berkasadmin` varchar(50) DEFAULT NULL,
  `status_pelamar` varchar(100) DEFAULT NULL,
  `nik_verifikator` varchar(225) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_dataverifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_dataverifikasi: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_jadwal
CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(1) NOT NULL AUTO_INCREMENT,
  `tgl_buka` date DEFAULT NULL,
  `tgl_tutup` date DEFAULT NULL,
  `tgl_umum_adm` date DEFAULT NULL,
  `tgl_pengumuman_skdskb` date DEFAULT NULL,
  `tgl_final` date DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table kepeg_tendik.tb_jadwal: ~1 rows (approximately)
INSERT INTO `tb_jadwal` (`id_jadwal`, `tgl_buka`, `tgl_tutup`, `tgl_umum_adm`, `tgl_pengumuman_skdskb`, `tgl_final`, `keterangan`, `status`) VALUES
	(1, '2022-01-10', '2022-01-22', '2022-01-26', '2022-02-01', '2022-02-18', 'Rekrutmen Dosen Tetap Undip 2022 I', 'Tidak Aktif'),
	(2, '2022-08-01', '2022-08-01', '2023-08-12', '2022-09-02', '2022-09-16', 'Rekrutmen Dosen Tetap Undip 2022 II', 'Tidak Aktif'),
	(3, '2024-02-17', '2025-03-07', '2025-03-15', '2025-04-10', '2025-05-31', 'Rekrutmen Dosen Tetap Undip 2022 III', 'Aktif');

-- Dumping structure for table kepeg_tendik.tb_kualifikasi
CREATE TABLE IF NOT EXISTS `tb_kualifikasi` (
  `id_kualifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kualifikasi` varchar(15) NOT NULL,
  `nm_kualifikasi` varchar(100) NOT NULL,
  `jml_kebutuhan` int(2) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `syarat_pend_awal` text,
  `syarat_pend_akhir` text,
  `penempatan` text,
  `unit_kerja` text,
  `keterangan` text,
  `lokasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kualifikasi`),
  UNIQUE KEY `kode_kualifikasi` (`kode_kualifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_kualifikasi: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_lolosfinal
CREATE TABLE IF NOT EXISTS `tb_lolosfinal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(50) DEFAULT NULL,
  `kode_formasi` varchar(50) DEFAULT NULL,
  `nama_pelamar` varchar(50) DEFAULT NULL,
  `fakultas_formasi` varchar(50) DEFAULT NULL,
  `prodi_farmasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_lolosfinal: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_lolostahapdua
CREATE TABLE IF NOT EXISTS `tb_lolostahapdua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `kode_formasi` varchar(200) DEFAULT NULL,
  `fakultas_formasi` varchar(200) DEFAULT NULL,
  `kelompok_ujian` varchar(50) DEFAULT NULL,
  `skd` varchar(50) DEFAULT NULL,
  `skb` varchar(50) DEFAULT NULL,
  `status_skdskb` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_lolostahapdua: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_lolostahaptiga
CREATE TABLE IF NOT EXISTS `tb_lolostahaptiga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(50) DEFAULT NULL,
  `kode_formasi` varchar(225) DEFAULT NULL,
  `nama_pelamar` varchar(225) DEFAULT NULL,
  `fakultas_formasi` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_lolostahaptiga: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_pelamar
CREATE TABLE IF NOT EXISTS `tb_pelamar` (
  `id_pelamar` int(16) NOT NULL AUTO_INCREMENT,
  `tgl_daftar` varchar(30) DEFAULT NULL,
  `no_pendaftaran` varchar(30) DEFAULT NULL,
  `ktp` varchar(30) DEFAULT NULL,
  `status_simpanidentitas` varchar(50) DEFAULT NULL,
  `gelar_depan` varchar(255) DEFAULT NULL,
  `nama_pelamar` varchar(255) DEFAULT NULL,
  `gelar_belakang` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu') DEFAULT NULL,
  `status_menikah` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `pendidikan_terakhir` varchar(20) DEFAULT NULL,
  `alamat` text,
  `media_sosial` text,
  `status_simpanformasi` varchar(5) DEFAULT NULL,
  `pendidikan` varchar(30) DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `nm_kampus` varchar(255) DEFAULT NULL,
  `akreditasi_kampus` varchar(1) DEFAULT NULL,
  `nomor_penyetaraan` varchar(100) DEFAULT NULL,
  `ipk` varchar(5) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `akreditasi_prodi` varchar(1) DEFAULT NULL,
  `thn_lulus` int(4) DEFAULT NULL,
  `skripsi` text,
  `pend_profesi` varchar(50) DEFAULT NULL,
  `pendidikan1` varchar(30) DEFAULT NULL,
  `asal_sekolah1` varchar(50) DEFAULT NULL,
  `nm_kampus1` varchar(255) DEFAULT NULL,
  `akreditasi_kampus1` varchar(1) DEFAULT NULL,
  `nomor_penyetaraan1` varchar(100) DEFAULT NULL,
  `ipk1` varchar(5) DEFAULT NULL,
  `prodi1` varchar(255) DEFAULT NULL,
  `akreditasi_prodi1` varchar(1) DEFAULT NULL,
  `thn_lulus1` varchar(50) DEFAULT NULL,
  `skripsi1` text,
  `pendidikan2` varchar(30) DEFAULT NULL,
  `asal_sekolah2` varchar(50) DEFAULT NULL,
  `nm_kampus2` varchar(255) DEFAULT NULL,
  `akreditasi_kampus2` varchar(1) DEFAULT NULL,
  `nomor_penyetaraan2` varchar(100) DEFAULT NULL,
  `ipk2` varchar(5) DEFAULT NULL,
  `prodi2` varchar(255) DEFAULT NULL,
  `akreditasi_prodi2` varchar(1) DEFAULT NULL,
  `thn_lulus2` int(4) DEFAULT NULL,
  `tesis` text,
  `pendidikan3` varchar(30) DEFAULT NULL,
  `asal_sekolah3` varchar(50) DEFAULT NULL,
  `nm_kampus3` varchar(255) DEFAULT NULL,
  `akreditasi_kampus3` varchar(1) DEFAULT NULL,
  `nomor_penyetaraan3` varchar(100) DEFAULT NULL,
  `ipk3` varchar(5) DEFAULT NULL,
  `prodi3` varchar(255) DEFAULT NULL,
  `akreditasi_prodi3` varchar(1) DEFAULT NULL,
  `thn_lulus3` varchar(4) DEFAULT NULL,
  `desertasi` text,
  `jenis_toefl` varchar(50) DEFAULT NULL,
  `toefl` varchar(255) DEFAULT NULL,
  `toefl_lainnya` varchar(255) DEFAULT NULL,
  `tgl_sert_terbit` date DEFAULT NULL,
  `keterangan_berkas` text,
  `status_berkasadmintbpelamar` varchar(50) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `verifikator` varchar(20) DEFAULT NULL,
  `id_kualifikasi` varchar(5) DEFAULT NULL,
  `pernyataan` text,
  `jwb_pernyataan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelamar`),
  UNIQUE KEY `ktp` (`ktp`),
  UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_pelamar: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_ruangwawancara
CREATE TABLE IF NOT EXISTS `tb_ruangwawancara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noujian` varchar(50) DEFAULT NULL,
  `kode_formasi` varchar(50) DEFAULT NULL,
  `nama_pelamar` varchar(225) DEFAULT NULL,
  `fakultas_formasi` varchar(225) DEFAULT NULL,
  `ruang_wawancara` varchar(30) DEFAULT NULL,
  `gedung_wawancara` varchar(100) DEFAULT NULL,
  `jam_wawancara` varchar(50) DEFAULT NULL,
  `hari_wawancara` varchar(50) DEFAULT NULL,
  `nama_pewawancara1` varchar(225) DEFAULT NULL,
  `nama_pewawancara2` varchar(225) DEFAULT NULL,
  `nama_pewawancara3` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_ruangwawancara: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_rule
CREATE TABLE IF NOT EXISTS `tb_rule` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Level kewenangan';

-- Dumping data for table kepeg_tendik.tb_rule: ~4 rows (approximately)
INSERT INTO `tb_rule` (`id_rule`, `level`) VALUES
	(1, 'Super Administrator'),
	(2, 'Verifikator'),
	(3, 'Pelamar'),
	(4, 'Asesor');

-- Dumping structure for table kepeg_tendik.tb_statuspelamar
CREATE TABLE IF NOT EXISTS `tb_statuspelamar` (
  `id_statuspelamar` int(11) NOT NULL AUTO_INCREMENT,
  `no_status` varchar(10) NOT NULL,
  `keterangan_status` varchar(223) NOT NULL,
  PRIMARY KEY (`id_statuspelamar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_statuspelamar: ~7 rows (approximately)
INSERT INTO `tb_statuspelamar` (`id_statuspelamar`, `no_status`, `keterangan_status`) VALUES
	(1, '1', 'lolos administrasi'),
	(2, '2', 'Tidak lolos administrasi'),
	(3, '3', 'Pelamar telah submit pendaftaran'),
	(4, '4', 'Lolos tahap dua'),
	(5, '5', 'Tidak lolos tahap dua'),
	(6, '6', 'Lolos final'),
	(7, '7', 'Tidak lolos final');

-- Dumping structure for table kepeg_tendik.tb_status_kawin
CREATE TABLE IF NOT EXISTS `tb_status_kawin` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status_kawin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_status_kawin: ~4 rows (approximately)
INSERT INTO `tb_status_kawin` (`id_status`, `status_kawin`) VALUES
	(1, 'Belum Kawin'),
	(2, 'Kawin'),
	(3, 'Cerai Hidup'),
	(4, 'Cerai Mati');

-- Dumping structure for table kepeg_tendik.tb_tugas
CREATE TABLE IF NOT EXISTS `tb_tugas` (
  `id_verifikator` varchar(20) DEFAULT NULL,
  `kode_formasi` text NOT NULL,
  `nama_verifikator` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_tugas: ~0 rows (approximately)

-- Dumping structure for table kepeg_tendik.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(16) NOT NULL AUTO_INCREMENT,
  `nm_user` varchar(255) DEFAULT NULL,
  `kualifikasi` varchar(255) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `password` varchar(223) DEFAULT NULL,
  `email` varchar(223) DEFAULT NULL,
  `password_tampil` varchar(223) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nik` (`nik`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1247 DEFAULT CHARSET=latin1;

-- Dumping data for table kepeg_tendik.tb_user: ~7 rows (approximately)
INSERT INTO `tb_user` (`id_user`, `nm_user`, `kualifikasi`, `nik`, `password`, `email`, `password_tampil`, `level`) VALUES
	(1, NULL, NULL, '33111', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '1234', 1),
	(2, 'Sepmita', '', '3325035609910003', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '1234', 2),
	(3, 'Ajis', '10,12,13,14,15,16,22,23,24,25,27,28', '3315142604960001', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '1234', 2),
	(4, 'Anisa', '8,9,10,11,28', '3273134501950001', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '1234', 2),
	(5, 'Fajar', '1,2,3,4,5,6,7,8,9,10,11,17,18,19,20,21,29', '3374063108900003', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '1234', 2),
	(6, 'Sugiyanto', NULL, '3315040701870003', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '1234', 2),
	(11, '', '', '3327054503920004', '36894a44e38cac5da141a9e5b9965d9a', 'tandhyawulanp@gmail.com', '070319', 3);

-- Dumping structure for trigger kepeg_tendik.file_upload_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `file_upload_before_insert` BEFORE INSERT ON `file_upload` FOR EACH ROW BEGIN
SET
NEW.kode_unik=CONCAT(NEW.nik, NEW.kategori_file);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger kepeg_tendik.tb_pelamar_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tb_pelamar_after_update` AFTER UPDATE ON `tb_pelamar` FOR EACH ROW BEGIN
UPDATE tb_user
	SET nm_user = NEW.nama_pelamar
	WHERE nik = OLD.ktp;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger kepeg_tendik.tb_pelamar_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tb_pelamar_before_insert` BEFORE INSERT ON `tb_pelamar` FOR EACH ROW BEGIN
SET
@tahun = RIGHT(YEAR(NOW()),2),
@formasi = (SELECT RIGHT(kode_kualifikasi,3) FROM tb_kualifikasi a WHERE a.id_kualifikasi = NEW.id_kualifikasi ),
@no=(SELECT auto_increment AS NEXT_ID
FROM   `information_schema`.`tables`
WHERE  table_name = "tb_pelamar"
       AND table_schema = "kepeg_tendik")
,  
@urut=LPAD(@NO,5,'0000'),
NEW.no_pendaftaran =CONCAT(@tahun,@formasi,@urut);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger kepeg_tendik.tb_pelamar_before_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tb_pelamar_before_update` BEFORE UPDATE ON `tb_pelamar` FOR EACH ROW BEGIN
SET
@tahun=RIGHT(YEAR(NOW()),2),
@formasi=  (SELECT RIGHT(kode_kualifikasi,3) FROM tb_kualifikasi a WHERE a.id_kualifikasi = NEW.id_kualifikasi ),
@no= OLD.id_pelamar,  
@urut=LPAD(@NO,5,'0000'),
NEW.no_pendaftaran =CONCAT(@tahun,@formasi,@urut);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger kepeg_tendik.tb_user_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tb_user_after_insert` AFTER INSERT ON `tb_user` FOR EACH ROW BEGIN
INSERT INTO tb_pelamar (`ktp`,`email`) VALUES
(NEW.nik, NEW.email);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
