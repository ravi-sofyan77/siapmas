-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2018 at 12:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4917054_pengaduan_ittp`
--

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id_departement` bigint(20) NOT NULL,
  `departement_name` varchar(175) DEFAULT NULL,
  `description` text,
  `status_departement` enum('aktif','pasif') DEFAULT 'aktif',
  `dibuat_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id_departement`, `departement_name`, `description`, `status_departement`, `dibuat_pada`) VALUES
(1, 'Logistik', NULL, 'aktif', '2018-02-24 12:56:26'),
(2, 'Akademik', NULL, 'aktif', '2018-02-24 12:56:41'),
(3, 'Keuangan', NULL, NULL, '2018-02-24 12:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengaduan`
--

CREATE TABLE `detail_pengaduan` (
  `id_detail` bigint(20) NOT NULL,
  `sarana_terkait` bigint(20) DEFAULT NULL,
  `id_pengaduan` bigint(20) DEFAULT NULL,
  `nilai_tanggapan` int(5) DEFAULT NULL,
  `pesan_tanggapan` text,
  `lampiran_tanggapan` text,
  `update_terakhir` datetime DEFAULT NULL,
  `pesan_pengaduan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'mahasiswa', 'General User'),
(3, 'staff', 'Staff bidang'),
(4, 'manager', 'Ketua bidang');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(22, '36.73.141.137', 'admin@admin.com', 1522146476);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` bigint(20) NOT NULL,
  `id_prasarana` bigint(20) DEFAULT NULL,
  `id_sarana` bigint(20) DEFAULT NULL,
  `pengaduan_dari` mediumint(8) DEFAULT NULL,
  `pengaduan_kepada` mediumint(8) UNSIGNED DEFAULT NULL,
  `pesan_pengaduan` text,
  `waktu_pengaduan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_pengaduan` enum('pending','proses','selesai') NOT NULL DEFAULT 'pending',
  `waktu_ditanggapi` datetime DEFAULT NULL,
  `ditanggapi_oleh` mediumint(8) DEFAULT NULL,
  `lampiran_pengaduan` text,
  `pesan_tanggapan` text,
  `lampiran_tanggapan` text,
  `nilai_tanggapan` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `tanggapan_diterima` enum('ya','tidak') DEFAULT NULL,
  `arsipkan` enum('ya','tidak') NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_prasarana`, `id_sarana`, `pengaduan_dari`, `pengaduan_kepada`, `pesan_pengaduan`, `waktu_pengaduan`, `status_pengaduan`, `waktu_ditanggapi`, `ditanggapi_oleh`, `lampiran_pengaduan`, `pesan_tanggapan`, `lampiran_tanggapan`, `nilai_tanggapan`, `tanggapan_diterima`, `arsipkan`) VALUES
(7, 4, 8, 10, 1, 'AC nya mati pak di dc101', '2018-03-05 05:35:14', 'proses', '2018-03-08 04:26:56', 7, '', '<p>\r\n	sedang diperbaiki</p>\r\n', '', '0', 'tidak', 'tidak'),
(8, 4, 8, 10, 1, '<p>\r\n	AC nya mati pak di dc101</p>\r\n', '2018-03-05 05:37:07', 'selesai', '2018-03-08 04:28:08', 7, '', '<p>\r\n	telah selesai diperbaiki</p>\r\n', '', '0', 'tidak', 'tidak'),
(9, 6, 18, 13, 1, '<p>\r\n	Kursi kantin Neo tidak sesuai dengan kebutuhan civitas akademika, sebaiknya dibuat seperti cafetaria atau dipisah tidak dijadikan satu baris</p>\r\n', '2018-03-05 05:43:17', 'proses', '2018-03-15 05:27:36', 7, '', '<p>\r\n	Baik mas, akan didiskusikan dengan pengelola, dalam hal ini Koperasi</p>\r\n', '', '0', 'tidak', 'tidak'),
(10, 3, 9, 11, 1, '<p>\r\n	closet mampet</p>\r\n', '2018-03-05 05:44:51', 'proses', '2018-03-10 03:56:59', 7, '', '<p>\n	sedang di proses</p>', '', '0', 'tidak', 'tidak'),
(12, 3, 10, 9, 1, '<p>\r\n	closet nya kotor<img alt=\"wink\" height=\"20\" src=\"http://pengaduan-ittp.web.id/assets/grocery_crud/texteditor/ckeditor/plugins/smiley/images/wink_smile.gif\" title=\"wink\" width=\"20\" /></p>\r\n', '2018-03-05 05:53:09', 'selesai', '2018-03-15 05:29:32', 7, '', '<p>\r\n	Okey mas, sudah di instrusikan sama penanggung jawab kebersihan</p>\r\n', '', '0', 'tidak', 'tidak'),
(13, 3, 9, NULL, 1, 'Pada bagian wastafle airnya kotor, bagian wastafle juga jorok', '2018-03-05 05:53:57', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(14, 6, 16, 14, 1, 'Mas wifi nya lambat', '2018-03-05 06:23:36', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(15, 6, 20, 15, 1, 'Kurang', '2018-03-05 06:24:22', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(16, 4, 8, 9, 1, 'Mas ac ruangan dc 101 rusak', '2018-03-05 06:44:28', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(17, 4, 21, 16, 1, 'Lemot euy', '2018-03-05 07:07:01', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(18, 1, 1, 17, 1, 'Lapangan futsal yg memadai belum ada', '2018-03-05 07:24:41', 'pending', NULL, NULL, '6e9dc-p_20180303_210545.jpg', NULL, NULL, '0', 'tidak', 'tidak'),
(19, 3, 10, 16, 1, '<p>\r\n	Ngga ada tisuny</p>\r\n', '2018-03-05 07:27:41', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(20, 2, 13, 18, 1, '<p>\r\n	Bola nya ngga ada gps nya.. jadi pas ilang susah dicari</p>\r\n', '2018-03-05 07:30:48', 'pending', NULL, NULL, 'c3c09-1.png', NULL, NULL, '0', 'tidak', 'tidak'),
(21, 3, 9, 5, 1, '<p>\r\n	dksjdksa jdkljsl kjkdj ljdlasjdksajdkaj</p>\r\n<p>\r\n	dsdjsada</p>\r\n<p>\r\n	dsdsa</p>\r\n', '2018-03-05 11:11:54', 'pending', NULL, NULL, NULL, NULL, NULL, '0', 'tidak', 'tidak'),
(22, 3, 10, 19, 1, 'Tolong dibersihkan lagi closetnya. Dan airnya kurang jernih, masih kotor. Terimakasih', '2018-03-08 06:27:57', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(23, 4, 8, 21, 1, '<p>\r\n	mas, AC rusak di ruangan DC 101</p>\r\n', '2018-03-08 07:21:40', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(24, 4, 5, 9, 1, '<p>\n	Proyektor mati</p>\n', '2018-03-10 08:52:49', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(25, 4, 5, 9, 1, '<p>\n	Proyektor mati</p>', '2018-03-10 08:58:00', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(42, 4, 4, 9, 1, '<p>\r\n	aduh apaan tuh</p>\r\n', '2018-03-22 13:38:57', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak'),
(45, 5, 15, 9, 1, '<p>\r\n	dsadsa</p>\r\n', '2018-03-27 10:02:57', 'pending', NULL, NULL, NULL, NULL, NULL, '0', 'tidak', 'tidak'),
(46, 4, 5, 9, 1, '<p>\r\n	proyektor ruang dc 301 rusak</p>\r\n', '2018-03-27 10:25:41', 'pending', NULL, NULL, '', NULL, NULL, '0', 'tidak', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `prasarana`
--

CREATE TABLE `prasarana` (
  `id_prasarana` bigint(20) NOT NULL,
  `nama_prasarana` varchar(175) DEFAULT NULL,
  `dari_bidang` mediumint(8) UNSIGNED DEFAULT NULL,
  `status_prasarana` enum('aktif','non-aktif') DEFAULT NULL,
  `keterangan_prasarana` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prasarana`
--

INSERT INTO `prasarana` (`id_prasarana`, `nama_prasarana`, `dari_bidang`, `status_prasarana`, `keterangan_prasarana`) VALUES
(1, 'Lapangan Basket', 1, 'aktif', '<p>\r\n	<img alt=\"\" src=\"https://4.imimg.com/data4/CD/SK/MY-7887487/international-standard-basketball-court-500x500.jpg\" style=\"width: 500px; height: 332px;\" /></p>\r\n'),
(2, 'Lapangan volly', 1, 'aktif', NULL),
(3, 'Toilet', 1, 'aktif', NULL),
(4, 'Ruang Kelas', 1, 'aktif', NULL),
(5, 'Parkiran', 1, 'aktif', NULL),
(6, 'Cafetaria', 1, 'aktif', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sarana`
--

CREATE TABLE `sarana` (
  `id_sarana` bigint(20) NOT NULL,
  `id_prasarana` bigint(20) NOT NULL,
  `nama_sarana` varchar(175) DEFAULT NULL,
  `status_sarana` enum('aktif','non-aktif') DEFAULT 'aktif',
  `keterangan_sarana` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarana`
--

INSERT INTO `sarana` (`id_sarana`, `id_prasarana`, `nama_sarana`, `status_sarana`, `keterangan_sarana`) VALUES
(1, 1, 'Ring basket', 'aktif', '<p>\r\n	dksajdasl</p>\r\n<p>\r\n	dksajdsakdjskl</p>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(2, 1, 'Bola Basket', 'aktif', '<p>\r\n	<strong>dsajdkajsdakljd alskjdka</strong></p>\r\n'),
(3, 4, 'Kursi', 'aktif', NULL),
(4, 4, 'Meja', 'aktif', NULL),
(5, 4, 'Proyektor', 'aktif', NULL),
(6, 4, 'Whiteboard', 'aktif', NULL),
(7, 4, 'Penghapus', 'aktif', NULL),
(8, 4, 'AC', 'aktif', NULL),
(9, 3, 'Wastafle', 'aktif', NULL),
(10, 3, 'Closet', 'aktif', NULL),
(11, 3, 'Urinoir', 'aktif', NULL),
(12, 2, 'Ring', 'aktif', NULL),
(13, 2, 'Bola', 'aktif', NULL),
(14, 5, 'CCTV', 'aktif', NULL),
(15, 5, 'Gantungan Helm', 'aktif', NULL),
(16, 6, 'Wifi', 'aktif', NULL),
(17, 6, 'Colokan', 'aktif', NULL),
(18, 6, 'Kursi', 'aktif', NULL),
(19, 6, 'Meja', 'aktif', NULL),
(20, 6, 'Tong Sampah', 'aktif', NULL),
(21, 4, 'Wifi', 'aktif', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1522144529, 1, 'Admin', 'mimins', 'ADMIN', '009029302090'),
(5, '::1', '14102065@ittelkom-pwt.ac.id', '$2y$08$HQBUahe1zx.Pz/Tj5BW/8.w/szzdd64LEohJ9Ja2vIuUGH2aMULKW', NULL, '14102065@ittelkom-pwt.ac.id', NULL, 'YpksZmFeEYhxOMasGKHCgu22b005d127037fa5fc', 1521721766, NULL, 1519478348, 1520248220, 1, 'iwan', 'firmawan', 'D3 Teknik Telekomunikasi', '02930'),
(7, '36.80.155.115', 'suroso@ittelkom-pwt.ac.id', '$2y$08$c6ModlAGcMxMQ7MC3rBIG.gf90K8wN4cDYz4RmSKcb0Tnj5sCvhwS', NULL, 'suroso@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520080400, 1522146566, 1, 'Suroso', '', 'IT Telkom Purwokerto', '082242698765'),
(8, '36.72.240.86', 'poernowo@ittelkom-pwt.ac.id', '$2y$08$A1gqqtSXqPgZaHjm7pkXiuJqlKAcfuIFnjgZmjDggfQMgSGQiby0q', NULL, 'poernowo@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520082173, NULL, 1, 'Poernowo', 'Rochadi', 'IT Telkom Purwokerto', '082242697766'),
(9, '120.188.72.246', '14102077@ittelkom-pwt.ac.id', '$2y$08$IDIDMYotcZKMalqb97yOt.kNfRoB/BLhSB5INeYBpy.KZuA0XTlHu', NULL, '14102077@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520082449, 1522146157, 1, 'Muhammad Ravi', 'Sofyan', 'S1 Teknik Informatika', '082242698581'),
(10, '36.80.191.88', '15102073@ittelkom-pwt.ac.id', '$2y$08$z/TQwOXWX6HzMTNGyyppBelWFj9Eq2Af.BosTnlsbhHR28I.O6upi', NULL, '15102073@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520227861, 1520227861, 1, 'Setie Ruhdi', 'Koara', 'S1 Teknik Informatika', '081370144977'),
(11, '180.254.9.66', '15102064@ittelkom-pwt.ac.id', '$2y$08$M3McuYIEcG0t8sz9sAVhju9nP2WtOkX4wblCfIeFmGhoZRo4dwfaO', NULL, '15102064@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520227940, 1520227941, 1, 'maya', 'meliana', 'S1 Teknik Informatika', '085726364226'),
(12, '141.0.8.58', '15102014@ittelkom-pwt.ac.id', '$2y$08$GxUK5WIb5FeEjmqfpdxkq.R5FYPzqQ4GOB0XFO4s0T.NBbMPduBay', NULL, '15102014@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520227956, 1520227956, 1, 'Daya', 'Pangestu', 'S1 Teknik Informatika', '08816616347'),
(13, '36.80.191.88', '15102070@ittelkom-pwt.ac.id', '$2y$08$QNvM3pEVYgwaqgWpvl5ze.ZkQ5Ym129QKGfgZBtsjqALJo3wDIyJW', NULL, '15102070@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520228305, 1520228305, 1, 'Phita Aulia', 'Ummami', 'S1 Teknik Informatika', '082243529272'),
(14, '120.188.87.102', '14102053@ittelkom-pwt.ac.id', '$2y$08$JjFgzSbpXkdqoBibQZXdVOCr49tuTt8OtJ242iAUkRX.tq/8OpNW2', NULL, '14102053@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520230851, 1520230851, 1, 'Avit', 'Arinovita', 'S1 Teknik Informatika', '085747848995'),
(15, '180.254.9.66', '14102074@ittelkom-pwt.ac.id', '$2y$08$3VqlAssKrxfbEvKb/d.rp.Eq0BJBKSyIFCOJDV2YGG7X/Jfuhc6K.', NULL, '14102074@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520230968, 1520230969, 1, 'Ammar', 'Rusydah', 'S1 Teknik Informatika', '085298341326'),
(16, '114.124.244.124', '16102204@ittelkom-pwt.ac.id', '$2y$08$gL6DHdVZoqGZTUZCzH2sU.5HfmrsppCuPTzUeSLRPL5ShYbskrTNy', NULL, '16102204@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520233446, 1520234764, 1, 'Mukhlis', 'Adhe', 'S1 Teknik Informatika', '081322221087'),
(17, '202.67.46.29', '14102030@ittelkom-pwt.ac.id', '$2y$08$AJN9cpgkU6X96oKduBApq.m9.7wDURgvjNsi85mVSx2qzdrOU3ffq', NULL, '14102030@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520234523, 1520234524, 1, 'Fariz', 'Azzan', 'S1 Teknik Informatika', '82133321364'),
(18, '114.124.209.248', '14102072@ittelkom-pwt.ac.id', '$2y$08$y2/nvDLpK7ruxGErawhjYOeWyFTGZ37JkydDVDlyCfCV/Ssrfi6mO', NULL, '14102072@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520234631, 1520234631, 1, 'Mufti', 'Robbani', 'S1 Teknik Informatika', '085725014307'),
(19, '202.67.46.18', '14102067@ittelkom-pwt.ac.id', '$2y$08$X3oHcjrFO4MRpo7wj3.VEe.1Fc8p.KkjrKYMhRtOQY5iKtb305eoC', NULL, '14102067@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520490406, 1520490406, 1, 'Laura Novita', 'Sarah', 'S1 Teknik Informatika', '081327922685'),
(20, '114.124.135.82', '14102055@ittelkom-pwt.ac.id', '$2y$08$9coSIx6oJs/PUqnxLRQmKupAVWUpqLKhaRySUI/Vuay5OIv5ITREm', NULL, '14102055@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520492083, 1520568415, 1, 'Deprilana Ego', 'Prakasa', 'S1 Teknik Informatika', '082242698697'),
(21, '202.67.46.236', '13102061@ittelkom-pwt.ac.id', '$2y$08$OZdkGZn7csIP1iPUH0RM/OpR0eP0dL7jfBQxKDaqFeZxZMlSVHY2e', NULL, '13102061@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1520493620, 1520493621, 1, 'rizqy', 'qorib', 'S1 Teknik Informatika', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 2, 0),
(4, 3, 0),
(6, 4, 3),
(7, 5, 2),
(11, 1, 1),
(12, 6, 3),
(13, 7, 3),
(14, 8, 3),
(15, 9, 2),
(16, 10, 2),
(17, 11, 2),
(18, 12, 2),
(19, 13, 2),
(20, 14, 2),
(21, 15, 2),
(22, 16, 2),
(23, 17, 2),
(24, 18, 2),
(25, 19, 2),
(26, 20, 2),
(27, 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_staff`
--

CREATE TABLE `users_staff` (
  `id_staff` bigint(20) NOT NULL,
  `nik_staff` varchar(25) DEFAULT NULL,
  `user_id` mediumint(8) DEFAULT NULL,
  `departement_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_staff`
--

INSERT INTO `users_staff` (`id_staff`, `nik_staff`, `user_id`, `departement_id`) VALUES
(4, '03780012', 7, 1),
(15, '17880013', 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `detail_pengaduan`
--
ALTER TABLE `detail_pengaduan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `prasarana`
--
ALTER TABLE `prasarana`
  ADD PRIMARY KEY (`id_prasarana`);

--
-- Indexes for table `sarana`
--
ALTER TABLE `sarana`
  ADD PRIMARY KEY (`id_sarana`),
  ADD KEY `id_prasarana` (`id_prasarana`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_staff`
--
ALTER TABLE `users_staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pengaduan`
--
ALTER TABLE `detail_pengaduan`
  MODIFY `id_detail` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `prasarana`
--
ALTER TABLE `prasarana`
  MODIFY `id_prasarana` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sarana`
--
ALTER TABLE `sarana`
  MODIFY `id_sarana` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users_staff`
--
ALTER TABLE `users_staff`
  MODIFY `id_staff` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
