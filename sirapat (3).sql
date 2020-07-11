-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 09:45 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirapat`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `idabsensi` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idabsensi`, `id_agenda`, `id_karyawan`, `id_user`, `status`, `date_created`) VALUES
(7, 42, 1, 12, 'hadir', '2020-07-03 10:36:39'),
(8, 42, 2, 12, 'hadir', '2020-07-03 10:36:42'),
(10, 42, 6, 12, 'hadir', '2020-07-03 10:36:48'),
(11, 42, 5, 12, 'hadir', '2020-07-03 10:36:51'),
(12, 42, 3, 12, 'hadir', '2020-07-03 10:37:55'),
(13, 43, 1, 12, 'hadir', '2020-07-05 02:57:31'),
(14, 43, 2, 12, 'hadir', '2020-07-05 02:57:38'),
(15, 43, 3, 12, 'hadir', '2020-07-05 02:57:44'),
(16, 45, 1, 12, 'hadir', '2020-07-09 06:26:27'),
(17, 45, 2, 12, 'hadir', '2020-07-09 06:26:30'),
(18, 45, 3, 12, 'hadir', '2020-07-09 06:26:32'),
(19, 45, 6, 12, 'hadir', '2020-07-09 06:26:33'),
(20, 45, 5, 12, 'hadir', '2020-07-09 06:27:31'),
(21, 41, 1, 12, 'hadir', '2020-07-10 09:26:34'),
(22, 41, 2, 12, 'hadir', '2020-07-10 09:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `agenda_rapat`
--

CREATE TABLE `agenda_rapat` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `validasi_id` int(11) NOT NULL,
  `nama_agenda` varchar(100) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `id_tipegrup` int(11) NOT NULL,
  `peserta_rapat` varchar(255) NOT NULL,
  `nomor_agenda` varchar(45) NOT NULL,
  `hal` varchar(50) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `lampiran_file` varchar(100) NOT NULL,
  `file` text,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda_rapat`
--

INSERT INTO `agenda_rapat` (`id`, `id_unit`, `id_pimpinan`, `id_user`, `validasi_id`, `nama_agenda`, `tanggal`, `jam_mulai`, `jam_selesai`, `tempat`, `id_tipegrup`, `peserta_rapat`, `nomor_agenda`, `hal`, `lampiran`, `lampiran_file`, `file`, `date_created`, `date_update`) VALUES
(41, 1, 3, 12, 0, 'Rapat Koordinasi KegiatanTA dan Persiapan Semester ganjil', '07/11/2020', '19:00:00', '22:00:00', 'Ruang Rapat Dosen Lantai 2 ', 1, 'Dosen Program Studi Teknik Informatika', '/PS.TI/VII/2019	', 'Undangan', '-', '', 'default.doc', '2020-07-02 04:01:29', NULL),
(42, 1, 3, 12, 0, 'Rapat koordinasi kegiatan magang 2020', '07/03/2020', '09:00:00', '10:00:00', 'Lab Program 2', 4, 'Dosen Program Studi Teknik Informatika', '/PS.TI/VII/2020	', 'Undangan', '-', '', 'default.doc', '2020-07-03 07:31:38', NULL),
(43, 1, 1, 12, 0, 'Rapat Tugas Akhir', '07/05/2020', '11:29:00', '00:29:00', 'Lab Program 2', 4, 'Dosen Teknik Informatika', '/PS.TI/VII/2020	', 'Undangan', '-', '', 'default.doc', '2020-07-05 06:38:10', NULL),
(44, 1, 1, 12, 0, 'Rapat Koordinasi Ujian Akhir Semester 2021', '07/09/2020', '22:00:00', '23:00:00', 'Gedung 454', 4, 'Dosen Teknik Informatika', '2789/PL36/KM/2020', 'Undangan', '-', '', 'default.doc', '2020-07-09 10:45:13', NULL),
(45, 1, 0, 12, 0, 'Rapat Tugas Akhir 2020', '07/10/2020', '22:49:00', '13:49:00', 'Lab Desain', 4, 'Dosen Teknik Informatika', '2789/PL30/KM/2020', 'Undangan', '-', '', 'default.doc', '2020-07-11 01:23:43', NULL),
(46, 0, 0, 12, 0, 'Rapat PA teknik informatika 2020', '07/11/2020', '22:13:00', '23:13:00', 'Lab Basis Data', 9, 'Karyawan teknik informatika', '2789/PL36/KA/2020', 'Undangan', '-', '', 'default.doc', '2020-07-11 12:08:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id_beritaacara` int(11) NOT NULL,
  `id_notulen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hasil` text NOT NULL,
  `date_created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara`
--

INSERT INTO `berita_acara` (`id_beritaacara`, `id_notulen`, `tanggal`, `hasil`, `date_created`) VALUES
(3, 5, '2020-06-30', 'adasdasdas', 1593354108);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nik_nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `prodi` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nik_nip`, `nama`, `jabatan`, `no_hp`, `email`, `alamat`, `prodi`, `username`, `password`, `foto`, `role_id`, `date_created`) VALUES
(1, '198310202014042001', 'Eka Mistiko Rini, S.Kom, M. Kom\r\n', 'Kajur TI\r\n', '081913922224\r\n', 'eka_mrini@yahoo.com\r\n', 'Dusun Watu Ulo Rt/Rw 004/002 Rejosari - Glagah Banyuwangi 68432\r\n', 1, 'ekamistikorini', '6780fa1d2c43c50ca31899b51719a306', 'default.jpg', 2, '0000-00-00'),
(2, '2011.36.079\r\n', 'Dedy Hidayat Kusuma, S.T, M.Cs\r\n', 'Wakil Direktur 1', '087755527517\r\n', 'dedy@poliwangi.ac.id\r\n', 'Sumber Kepuh Rt/Rw 003/001 Kedungwungu - Tegaldlimo Banyuwangi 68484\r\n', 1, 'dedyhidayat', 'dedy123', 'default.jpg', 0, '0000-00-00'),
(3, '2008.36.004\r\n', 'Moh. Dimyati A., S.T, M.Kom\r\n', 'Kaprodi TI', '08123399184\r\n', 'dimyati@poliwangi.ac.id\r\n', 'Dusun Kraja 001/001 Sumbersari - Srono Banyuwangi 68471\r\n', 1, 'mohdimyati', 'a5c82299a1f034bf4f2605db858cbbe0', 'default.jpg', 2, '0000-00-00'),
(4, '198010222015041001\r\n', 'I Wayan Suardinata, S.Kom, M.T\r\n', 'Ka. Lab TI\r\n', '085736577864\r\n', 'wayan.suardinata@poliwangi.ac.id\r\n', 'Jalan Prabu loro 525A Kelurahan Bakungan kecamtan Glagah\r\n', 1, 'wayansuardinata', 'wayan123', 'default.123', 0, '0000-00-00'),
(5, '2011.36.073\r\n', 'Herman Yuliandoko, S.T, M.T\r\n', 'Dosen\r\n', '081 334 436 478\r\n', 'abu.fahruddin@gmail.com\r\n', 'Perum Citra Garden Blok F1, Lemahbang Dewo, Rogojampi\r\n', 1, 'hermanyuliandoko', '0dd328fd38ac3b7534ab6125f9b3bde0', 'default.jpg', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `grup_jabatan`
--

CREATE TABLE `grup_jabatan` (
  `idjabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup_jabatan`
--

INSERT INTO `grup_jabatan` (`idjabatan`, `jabatan`) VALUES
(1, 'Ketua'),
(2, 'Wakil'),
(3, 'Sekertaris'),
(4, 'Bendahara'),
(5, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `grup_rapat`
--

CREATE TABLE `grup_rapat` (
  `id_grup` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup_rapat`
--

INSERT INTO `grup_rapat` (`id_grup`, `id_tipe`, `id_karyawan`, `id_jabatan`, `date_created`) VALUES
(15, 9, 3, 5, '2020-07-10'),
(16, 9, 4, 5, '2020-07-10'),
(17, 9, 6, 2, '2020-07-10'),
(18, 9, 5, 1, '2020-07-10'),
(19, 9, 7, 5, '2020-07-10'),
(24, 9, 8, 3, '2020-07-11'),
(25, 9, 10, 4, '2020-07-11'),
(31, 9, 1, 5, '2020-07-11'),
(32, 4, 1, 5, '2020-07-11'),
(33, 4, 5, 5, '2020-07-11'),
(34, 2, 5, 3, '2020-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `grup_tipe`
--

CREATE TABLE `grup_tipe` (
  `id` int(11) NOT NULL,
  `nama_grup` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup_tipe`
--

INSERT INTO `grup_tipe` (`id`, `nama_grup`, `password`, `role_id`) VALUES
(1, 'Rapat Senat', '', 0),
(2, 'Rapat Akademik', '202cb962ac59075b964b07152d234b70', 6),
(3, 'Rapat Prodi', '', 0),
(4, 'Teknik Informatika', '202cb962ac59075b964b07152d234b70', 6),
(5, 'Rapat Teknik Sipil', '', 0),
(6, 'Rapatt Wisuda', '202cb962ac59075b964b07152d234b70', 6),
(9, 'Rapat PA', '202cb962ac59075b964b07152d234b70', 6);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rapat`
--

CREATE TABLE `jenis_rapat` (
  `id` int(11) NOT NULL,
  `rapat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_rapat`
--

INSERT INTO `jenis_rapat` (`id`, `rapat`) VALUES
(1, 'Rapat Senat'),
(2, 'Rapat Akademik'),
(3, 'Rapat Jurusan'),
(4, 'Rapat Program Studi'),
(5, 'Rapat Harian');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idkaryawan` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `nik_nip` varchar(225) NOT NULL,
  `nama_karyawan` varchar(225) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `foto` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `role_id`, `unit_id`, `nik_nip`, `nama_karyawan`, `ttl`, `jabatan`, `email`, `no_hp`, `alamat`, `password`, `foto`, `date_created`, `date_updated`) VALUES
(1, 4, 1, '198310202014042001', 'Eka Mistiko Rini, S.Kom, M. Kom', 'Banyuwangi, 20 Oktober 1983', 'Kajur TI', 'eka_mrini@yahoo.com', '081 913 922 224', 'Dusun Watu Ulo Rt/Rw 004/002 Rejosari - Glagah Banyuwangi 68432', '202cb962ac59075b964b07152d234b70', 'default.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 4, 1, '2011.36.079', 'Dedy Hidayat Kusuma, S.T, M.Cs', 'Banyuwangi, 04 April 1977', 'Wakil direktur 1', 'dedy@poliwangi.ac.id', '087755527517', 'Sumber Kepuh Rt/Rw 003/001 Kedungwungu - Tegaldlimo Banyuwangi 68484', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-06-29 08:05:16', '0000-00-00 00:00:00'),
(3, 4, 1, '2013.36.106', 'Farizqi Panduardi, S.ST., M.T', 'Jember, 05 Maret 1986', 'Dosen', 'akufarisqi@gmail.com', '085 649 352 101', 'Jl.S.Parman 33 Gardenia Estate G97 ', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-07-01 06:04:42', '0000-00-00 00:00:00'),
(4, 4, 1, '198010222015041001', 'I Wayan Suardinata, S.Kom, M.T', 'Angantaka, 22 Oktober 1980', 'Ka. Lab TI', 'wayan.suardinata@poliwangi.ac.id', '085736577864', 'Jalan Prabu loro 525A Kelurahan Bakungan kecamtan Glagah', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-07-01 06:06:08', '0000-00-00 00:00:00'),
(5, 4, 1, '2011.36.073', 'Herman Yuliandoko, S.T, M.T', 'Malang, 27 September 1975', 'Dosen', 'abu.fahruddin@gmail.com', '081 334 436 478', 'Perum Citra Garden Blok F1, Lemahbang Dewo, Rogojampi', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-07-01 06:07:17', '0000-00-00 00:00:00'),
(6, 4, 1, '2008.36.005', 'Dianni Yusuf, S.Kom, M. Kom', 'Banyuwangi, 05 Maret 1984', 'Dosen', 'dianniyusuf@gmail.com', '085 655 102 715', 'Dsn. Gembolo Rt/Rw 01/01 Purwodadi - Gambiran Banyuwangi 68486', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-07-01 06:09:08', '0000-00-00 00:00:00'),
(7, 4, 1, '2011.36.080', 'Subono, S.T, M.T', 'Jember, 25 Juni 1975', 'Dosen', 'Subono1975@gmail.com', '087859576210', 'Jl. Bunga Kumis Kucing no. 20 Rt/Rw 004/002 Jatimulyo - Lowokwaru Malang 65141', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-07-01 06:10:15', '0000-00-00 00:00:00'),
(8, 4, 1, '2008.36.004', 'Moh. Dimyati A., S.T, M.Kom', 'Banyuwangi, 22 Januari 1976', 'Dosen', 'dimyati@poliwangi.ac.id', '081 233 991 84', 'Dusun Kraja 001/001 Sumbersari - Srono Banyuwangi 68471', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-07-01 06:11:09', '0000-00-00 00:00:00'),
(9, 4, 1, '2010.36.055', 'Moh. Nur Shodiq, S.T, M.T', 'Banyuwangi, 19 Januari 1983', 'Dosen', 'mohnoershodiq@gmail.com', '085 236 675 444', 'Kampungtimur 001/004 Trigonco - Asembagus Situbondo 68373', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-07-01 06:12:18', '0000-00-00 00:00:00'),
(10, 4, 1, '198404032019032012', 'Vivien Arief Wardhany, S.T,M.T', 'Banyuwangi, 03 April 1984', 'Dosen', 'vivien.wardhany@gmail.com', '08383177447', 'Dusun Satriyan 002/004 Lemahbangdewo Rogojampi - Banyuwangi  68462', '202cb962ac59075b964b07152d234b70', 'default.jpg', '2020-07-01 06:13:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_unit`
--

CREATE TABLE `karyawan_unit` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_unit`
--

INSERT INTO `karyawan_unit` (`id`, `unit`) VALUES
(1, 'D3 Teknik Informatika'),
(2, 'D3 Teknik Sipil'),
(3, 'D3 Teknik Mesin'),
(4, 'D4 Teknik Manufaktur Perkapalan'),
(5, 'D4 Teknologi Pengolahan Hasil Ternak'),
(6, 'D4 Agribisnis'),
(7, 'D4 Manajemen Bisnis Pariwisata'),
(8, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_kehadiran`
--

CREATE TABLE `konfirmasi_kehadiran` (
  `idkonfirmasi_kehadiran` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  `idundangan_rapat` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL,
  `file` tinytext,
  `date_created` datetime DEFAULT NULL,
  `idvalidasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notulen`
--

CREATE TABLE `notulen` (
  `idnotulen` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ruang_rapat` varchar(50) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `nomor_surat` varchar(45) NOT NULL,
  `jenis_rapat` varchar(45) NOT NULL,
  `daftar_hadir` varchar(45) NOT NULL,
  `total_hadir` int(11) NOT NULL,
  `ringkasan` text NOT NULL,
  `ketua_rapat` int(11) NOT NULL,
  `notulen` varchar(255) NOT NULL,
  `pic` varchar(225) NOT NULL,
  `foto_rapat` tinytext NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notulen`
--

INSERT INTO `notulen` (`idnotulen`, `id_agenda`, `tanggal`, `ruang_rapat`, `waktu_mulai`, `waktu_selesai`, `nomor_surat`, `jenis_rapat`, `daftar_hadir`, `total_hadir`, `ringkasan`, `ketua_rapat`, `notulen`, `pic`, `foto_rapat`, `date_created`) VALUES
(5, 36, '2020-06-27', 'Lab Desain', '08:00:00', '09:00:00', '03/JUR.TI/I2019', '2', 'Dosen', 20, ' bjhvbhvbhvh', 3, 'Velanda Aden Pradipta', 'Velanda Aden Pradipta', '', 1593196778),
(7, 37, '2020-06-29', 'Lab Desain', '21:57:00', '21:57:00', '03/JUR.TI/I2019/1234', '5', 'Dosen', 20, 'adasdasdsadasd', 3, 'Velanda Aden Pradipta', 'Velanda Aden Pradipta', '', 1593341847),
(8, 38, '2020-06-30', 'Lab Desain', '21:05:00', '22:05:00', '03/JUR.TI/I2019/4321', '3', 'Dosen', 20, 'fgdgddgghd', 3, 'Velanda Aden Pradipta', 'Anjas Mahardika Pramono', '', 1593407142);

-- --------------------------------------------------------

--
-- Table structure for table `permasalahan`
--

CREATE TABLE `permasalahan` (
  `idpermasalahan` int(11) NOT NULL,
  `id_notulen` int(11) NOT NULL,
  `topik_bahasan` varchar(255) NOT NULL,
  `uraian` text NOT NULL,
  `solusi` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `bataswaktu` date NOT NULL,
  `date_created` int(20) NOT NULL,
  `date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permasalahan`
--

INSERT INTO `permasalahan` (`idpermasalahan`, `id_notulen`, `topik_bahasan`, `uraian`, `solusi`, `pic`, `bataswaktu`, `date_created`, `date_updated`) VALUES
(1, 5, 'Membahas Kinerja Mahasiswa tahun 2020', 'Banyak mahasiswa yang malas, mager, ngegame mulu', 'Diberikan akses wifi yang lebih cepat dan lancar', 'Velanda Aden Pradipta', '2020-06-30', 1593344395, 1593347619),
(7, 5, 'Membahas Kinerja Dosen tahun 2020', 'frgegegerg', 'bddbdbdfbdf', 'Anjas Mahardika Pramono', '2020-06-20', 1593347660, 0),
(8, 7, 'Membahas Kinerja Mahasiswa tahun 2021', 'yymyymym', 'dadassadasd', 'Velanda Aden Pradipta', '2020-06-30', 1593348621, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`) VALUES
(1, 'D3 Teknik Informatika'),
(2, 'D3 Teknik Mesin'),
(3, 'D3 Teknik Sipil'),
(4, 'D4 Teknologi Pengolahan Hasil Ternak'),
(5, 'D4 Teknik Manufaktur Perkapalan'),
(6, 'D4 Manajemen Bisnis Pariwisata'),
(7, 'D4 Agribisnis');

-- --------------------------------------------------------

--
-- Table structure for table `reporting`
--

CREATE TABLE `reporting` (
  `idreporting` int(11) NOT NULL,
  `topik/bahasan` longtext NOT NULL,
  `uraian` longtext NOT NULL,
  `solusi` longtext NOT NULL,
  `bataswaktu` date NOT NULL,
  `idagenda_rapat` int(11) NOT NULL,
  `idnotulen` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `risalah_rapat`
--

CREATE TABLE `risalah_rapat` (
  `id_risalahrapat` int(11) NOT NULL,
  `id_notulen` int(11) NOT NULL,
  `subtopik` text NOT NULL,
  `catatan_kaki` text NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risalah_rapat`
--

INSERT INTO `risalah_rapat` (`id_risalahrapat`, `id_notulen`, `subtopik`, `catatan_kaki`, `date_created`) VALUES
(1, 6, 'Membahas Proyek Akhir 2020', 'Iki catatan kaki gaess hehe', 1593205618),
(2, 6, 'rfrfrf', 't5t5t5', 1593337378),
(4, 6, 'Membahas Kerja Praktik', 'Iki catatan kaki gaess', 1593339099),
(5, 7, 'Membahas Kerja Praktik', 'adadadcdcdcdc', 1593342071),
(6, 5, 'Membahas Proyek Akhir 2021', 'adsadsacacacaacadcadc', 1593348710);

-- --------------------------------------------------------

--
-- Table structure for table `undangan_rapat`
--

CREATE TABLE `undangan_rapat` (
  `idundangan_rapat` int(11) NOT NULL,
  `file` tinytext NOT NULL,
  `date_created` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `idprodi` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `idunit` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `niknip` int(15) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `no_hp` int(12) DEFAULT NULL,
  `idjabatan` int(11) NOT NULL,
  `idprodi` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_actived` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `niknip`, `password`, `foto`, `email`, `no_hp`, `idjabatan`, `idprodi`, `role_id`, `is_actived`, `date_created`) VALUES
(12, 'Velanda Aden Pradipta', 2147483647, '202cb962ac59075b964b07152d234b70', 'default.jpg', 'velandaaden@gmail.com', 2147483647, 0, 0, 1, 1, 1591973615),
(13, 'Muhammad Muchtammir', 2147483647, '202cb962ac59075b964b07152d234b70', 'default.jpg', 'muchtamir21@gmail.com', 2147483647, 0, 0, 2, 1, 1592021651),
(14, 'admin', 2147483647, '202cb962ac59075b964b07152d234b70', 'default.jpg', 'admin@gmail.com', 2147483647, 0, 0, 5, 1, 1592032301),
(15, 'Pimpinan', 2147483647, '202cb962ac59075b964b07152d234b70', 'default.jpg', 'pimpinan@gmail.com', 2147483647, 0, 0, 2, 1, 1592581239);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 5, 3),
(4, 5, 1),
(5, 5, 2),
(6, 2, 6),
(7, 6, 7),
(8, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Superadmin'),
(6, 'Pimpinan'),
(7, 'Grup');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pimpinan'),
(4, 'karyawan'),
(5, 'superadmin'),
(6, 'grup');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'sirapat/admin/dashboard', 'fa fa-fw fa-home text-white', 1),
(2, 2, 'Konfirmasi Kehadiran', 'sirapat/user/konfirmasi', 'far fa-fw fa-list-alt text-white', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit text-white', 1),
(4, 3, 'Menu', 'sirapat/superadmin/menu', 'fas fa-fw fa-folder text-white', 1),
(5, 3, 'Sub Menu', 'sirapat/superadmin/menu/submenu', 'fa fa-fw fa-bars text-white', 1),
(6, 3, 'Coba', 'sirapat/superadmin/coba', 'fas fa-fw fa-user-edit text-white', 1),
(7, 1, 'Daftar Agenda', 'sirapat/admin/Agenda', 'fas fa-fw fa-book text-white', 0),
(8, 1, 'Tambah Agenda', 'sirapat/admin/UnggahAgenda', 'fas fa-fw fa-calendar-plus text-white', 1),
(9, 3, 'Role', 'sirapat/superadmin/role', 'fa fa-fw fa-user-tie text-white', 1),
(10, 1, 'Agenda Rapat', 'sirapat/admin/agenda', 'fas fa-fw fa-book text-white', 1),
(11, 1, 'Share Undangan', 'sirapat/admin/undangan', 'fas fa-fw fa-paper-plane text-white', 1),
(12, 1, 'Notulen Rapat', 'sirapat/admin/notulen', 'fas fa-fw fa-file-signature text-white', 1),
(13, 1, 'Absensi', 'sirapat/admin/absensi', 'fas fa-fw fa-user-check text-white', 1),
(14, 1, 'Laporan', 'sirapat/admin/laporan', 'fas fa-fw fa-envelope-open-text text-white', 1),
(15, 6, 'Dashboard', 'sirapat/pimpinan/dashboard', 'fas fa-fw fa-home text-white', 1),
(16, 6, 'Validasi', 'sirapat/pimpinan/validasi', 'fas fa-fw fa-file-signature text-white', 1),
(17, 6, 'Agenda Rapat', 'sirapat/pimpinan/agendarapat', 'fas fa-fw fa-book text-white', 1),
(18, 3, 'Data Karyaawan', 'sirapat/superadmin/data_karyawan', 'fas fa-fw fa-users text-white', 1),
(19, 3, 'Manajemen Grup', 'sirapat/superadmin/manajemen_grup', 'fas fa-fw fa-layer-group text-white', 1),
(20, 7, 'Dashboard', 'sirapat/grup/dashboard', 'fas fa-fw fa-home text-white', 1),
(21, 7, 'Anggota', 'sirapat/grup/anggota', 'fas fa-fw fa-users text-white', 1),
(22, 7, 'Struktur', 'sirapat/grup/struktur', 'fas fa-fw fa-sitemap text-white', 1);

-- --------------------------------------------------------

--
-- Table structure for table `validasi_agenda`
--

CREATE TABLE `validasi_agenda` (
  `id_validasi` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `qrcode` text NOT NULL,
  `coment` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_validasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi_agenda`
--

INSERT INTO `validasi_agenda` (`id_validasi`, `id_agenda`, `id_user`, `id_pimpinan`, `status`, `qrcode`, `coment`, `date_created`, `date_validasi`) VALUES
(3, 35, 0, 1, 1, 'item-ekamistikorini.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(4, 34, 0, 5, 1, 'item-hermanyuliandoko.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(7, 36, 0, 4, 0, '', '', '0000-00-00', '0000-00-00 00:00:00'),
(8, 35, 0, 5, 1, 'item-hermanyuliandoko.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(13, 37, 12, 5, 1, 'item-hermanyuliandoko.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(14, 36, 12, 5, 1, 'item-hermanyuliandoko.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(15, 38, 12, 3, 1, 'item-mohdimyati.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(16, 38, 12, 1, 1, 'item-ekamistikorini.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(17, 43, 12, 1, 1, 'item-Eka Mistiko Rini, S.Kom, M. Kom.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(19, 42, 12, 1, 0, '', '', '0000-00-00', '0000-00-00 00:00:00'),
(23, 42, 12, 5, 1, 'item-Herman Yuliandoko, S.T, M.T.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(24, 42, 12, 2, 0, '', '', '0000-00-00', '0000-00-00 00:00:00'),
(25, 41, 12, 2, 1, 'item-Dedy Hidayat Kusuma, S.T, M.Cs.png', '', '0000-00-00', '0000-00-00 00:00:00'),
(39, 46, 12, 5, 1, 'item-Herman Yuliandoko, S.T, M.T.png', '', '2020-07-11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `validasi_notulen`
--

CREATE TABLE `validasi_notulen` (
  `id` int(11) NOT NULL,
  `id_notulen` int(11) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idabsensi`);

--
-- Indexes for table `agenda_rapat`
--
ALTER TABLE `agenda_rapat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id_beritaacara`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grup_jabatan`
--
ALTER TABLE `grup_jabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indexes for table `grup_rapat`
--
ALTER TABLE `grup_rapat`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indexes for table `grup_tipe`
--
ALTER TABLE `grup_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_rapat`
--
ALTER TABLE `jenis_rapat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indexes for table `karyawan_unit`
--
ALTER TABLE `karyawan_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfirmasi_kehadiran`
--
ALTER TABLE `konfirmasi_kehadiran`
  ADD PRIMARY KEY (`idkonfirmasi_kehadiran`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`);

--
-- Indexes for table `notulen`
--
ALTER TABLE `notulen`
  ADD PRIMARY KEY (`idnotulen`);

--
-- Indexes for table `permasalahan`
--
ALTER TABLE `permasalahan`
  ADD PRIMARY KEY (`idpermasalahan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporting`
--
ALTER TABLE `reporting`
  ADD PRIMARY KEY (`idreporting`);

--
-- Indexes for table `risalah_rapat`
--
ALTER TABLE `risalah_rapat`
  ADD PRIMARY KEY (`id_risalahrapat`);

--
-- Indexes for table `undangan_rapat`
--
ALTER TABLE `undangan_rapat`
  ADD PRIMARY KEY (`idundangan_rapat`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`idunit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `validasi_agenda`
--
ALTER TABLE `validasi_agenda`
  ADD PRIMARY KEY (`id_validasi`);

--
-- Indexes for table `validasi_notulen`
--
ALTER TABLE `validasi_notulen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idabsensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `agenda_rapat`
--
ALTER TABLE `agenda_rapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id_beritaacara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grup_jabatan`
--
ALTER TABLE `grup_jabatan`
  MODIFY `idjabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grup_rapat`
--
ALTER TABLE `grup_rapat`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `grup_tipe`
--
ALTER TABLE `grup_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jenis_rapat`
--
ALTER TABLE `jenis_rapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `karyawan_unit`
--
ALTER TABLE `karyawan_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notulen`
--
ALTER TABLE `notulen`
  MODIFY `idnotulen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permasalahan`
--
ALTER TABLE `permasalahan`
  MODIFY `idpermasalahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `risalah_rapat`
--
ALTER TABLE `risalah_rapat`
  MODIFY `id_risalahrapat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `idunit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `validasi_agenda`
--
ALTER TABLE `validasi_agenda`
  MODIFY `id_validasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `validasi_notulen`
--
ALTER TABLE `validasi_notulen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
