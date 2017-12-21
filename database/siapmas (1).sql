-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Des 2017 pada 14.39
-- Versi Server: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siapmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengaduan`
--

CREATE TABLE IF NOT EXISTS `detail_pengaduan` (
  `id_detail` bigint(20) NOT NULL,
  `sarana_terkait` bigint(20) DEFAULT NULL,
  `id_pengaduan` bigint(20) DEFAULT NULL,
  `nilai_tanggapan` int(5) DEFAULT NULL,
  `pesan_tanggapan` text,
  `lampiran_tanggapan` text,
  `update_terakhir` datetime DEFAULT NULL,
  `pesan_pengaduan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pengaduan`
--

INSERT INTO `detail_pengaduan` (`id_detail`, `sarana_terkait`, `id_pengaduan`, `nilai_tanggapan`, `pesan_tanggapan`, `lampiran_tanggapan`, `update_terakhir`, `pesan_pengaduan`) VALUES
(1, 1, 2, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL, NULL, NULL),
(3, 1, 3, NULL, NULL, NULL, NULL, NULL),
(4, 2, 3, NULL, NULL, NULL, NULL, NULL),
(5, 1, 4, NULL, NULL, NULL, NULL, NULL),
(6, 9, 4, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'mahasiswa', 'General User'),
(3, 'logistik', 'logistik'),
(4, 'keuangan', 'keuangan'),
(5, 'akademik', 'akademik'),
(6, 'prodi', 'program studi'),
(7, 'dosen', 'dosen'),
(8, 'ka_s1_informatika', 'kepala prodi s1 informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` bigint(20) NOT NULL,
  `id_groups` mediumint(8) DEFAULT NULL,
  `menu` varchar(175) DEFAULT NULL,
  `halaman` varchar(175) DEFAULT NULL,
  `status_menu` enum('aktif','pasif') DEFAULT 'aktif',
  `dibuat_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id_pengaduan` bigint(20) NOT NULL,
  `pengaduan_kepada` mediumint(8) unsigned DEFAULT NULL,
  `pesan_pengaduan` text,
  `waktu_pengaduan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_pengaduan` enum('pending','proses','selesai') NOT NULL DEFAULT 'pending',
  `waktu_ditanggapi` datetime DEFAULT NULL,
  `ditanggapi_oleh` int(11) DEFAULT NULL,
  `pengaduan_dari` int(11) DEFAULT NULL,
  `lampiran_pengaduan` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `pengaduan_kepada`, `pesan_pengaduan`, `waktu_pengaduan`, `status_pengaduan`, `waktu_ditanggapi`, `ditanggapi_oleh`, `pengaduan_dari`, `lampiran_pengaduan`) VALUES
(2, NULL, 'AC tidak menyala dan proyektor buram', '2017-12-19 12:54:21', 'pending', NULL, NULL, 1, NULL),
(3, NULL, 'AC tidak menyala dan proyektor buram', '2017-12-19 12:55:04', 'pending', NULL, NULL, 1, 'uploads/3_1513688104.jpg'),
(4, 3, 'dksadk kdjsa jkasjd ajdk akdjsak', '2017-12-19 13:28:57', 'selesai', NULL, NULL, 1, 'uploads/4_1513690137.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasarana`
--

CREATE TABLE IF NOT EXISTS `prasarana` (
  `id_prasarana` bigint(20) NOT NULL,
  `nama_prasarana` varchar(175) DEFAULT NULL,
  `sarana_dari` mediumint(8) unsigned DEFAULT NULL,
  `status_prasarana` enum('aktif','non-aktif') DEFAULT NULL,
  `keterangan_prasarana` text
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prasarana`
--

INSERT INTO `prasarana` (`id_prasarana`, `nama_prasarana`, `sarana_dari`, `status_prasarana`, `keterangan_prasarana`) VALUES
(1, 'Ruang kelas', 3, 'aktif', '<p>\r\n	dsd sdkas kdasjd<strong>kjdk jdkadaksj</strong></p>\r\n'),
(2, 'jadwal kuliah', 5, 'aktif', '<p>\r\n	dksajds akskdjaskdjask jdlkasjdak kjsakdj askkasjksjdkasjk</p>\r\n'),
(3, 'Administrasi', 4, 'aktif', '<p>\r\n	administrasi kuliah</p>\r\n'),
(4, 'S1 Informatika', 6, 'aktif', '<p>\r\n	program studi s1 Informatika</p>\r\n'),
(5, 'S1 Teknik Telekomunikasi', 6, 'aktif', '<p>\r\n	Program studi S1 teknik Telekomunikasi</p>\r\n'),
(7, 'Prasarana', 3, 'aktif', NULL),
(8, 'Toilet', 3, 'aktif', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarana`
--

CREATE TABLE IF NOT EXISTS `sarana` (
  `id_sarana` bigint(20) NOT NULL,
  `id_prasarana` bigint(20) NOT NULL,
  `nama_sarana` varchar(175) DEFAULT NULL,
  `status_sarana` enum('aktif','non-aktif') DEFAULT 'aktif',
  `keterangan_sarana` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sarana`
--

INSERT INTO `sarana` (`id_sarana`, `id_prasarana`, `nama_sarana`, `status_sarana`, `keterangan_sarana`) VALUES
(1, 1, 'AC ', 'aktif', '<p>\r\n	<img alt="blush" height="20" src="http://localhost:8080/sipitt/assets/grocery_crud/texteditor/ckeditor/plugins/smiley/images/embaressed_smile.gif" title="blush" width="20" />djsak jksajaksdj akjdka kdjaksjdaksjdkajk akas</p>\r\n'),
(2, 1, 'Proyektor', 'aktif', '<p>\r\n	<img alt="" src="http://3.bp.blogspot.com/-IenB4Oe0Z9Y/Vg3ttS31F-I/AAAAAAAAAJ8/atuSNsnj6fw/s1600/Bermacam%2BAksesoris%2BProyektor%2BUntuk%2BMeningkatkan%2BEfisiensi.gif" style="width: 990px; height: 592px;" /></p>\r\n'),
(3, 2, 'pergantian kelas', 'aktif', '<p>\r\n	dask kadkasj kajs alda kkk</p>\r\n'),
(4, 3, 'Upload bukti pembayaran', NULL, NULL),
(5, 3, 'Beasiswa', 'aktif', NULL),
(6, 7, 'Parkiran', 'aktif', NULL),
(7, 7, 'Lapangan olahragra', 'aktif', NULL),
(9, 1, 'whiteboard', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1513675908, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', '14102065@st3telkom.ac.id', '$2y$08$tFXSYg6j93X9FRd/GBvuLO.ij583iytwxu4WV8W0xuO90u.LpRV5q', NULL, '14102065@st3telkom.ac.id', NULL, NULL, NULL, NULL, 1513675945, NULL, 1, 'iwan', 'firmawan', 'mahasiswa', '090390');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengaduan`
--
ALTER TABLE `detail_pengaduan`
  MODIFY `id_detail` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prasarana`
--
ALTER TABLE `prasarana`
  MODIFY `id_prasarana` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sarana`
--
ALTER TABLE `sarana`
  MODIFY `id_sarana` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
