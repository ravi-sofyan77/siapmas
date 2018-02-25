-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 08:54 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(4, 1, 1, 5, 1, '<p>\r\n	dkadksadjasdjsaldjsakl</p>\r\n', '2018-02-25 05:22:55', 'selesai', '2018-02-25 01:46:55', 4, 'b9a3c-840877.jpg', '<p>\r\n	dasdjhdkajha sdkahdjkasdhajshdkdh asjhdajdkhadkahdjhajhj</p>\r\n<p>\r\n	<strong>dldkjskaddsadsacccdsssdasda</strong></p>\r\n<p>\r\n	<strong>sdsadsad</strong></p>\r\n', 'e1c9f-18157798_1126342067521047_7561811025934912722_n.jpg', '3', 'ya', 'ya');

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
(2, 'Lapangan volly', 1, 'aktif', '<p>\r\n	dksdkjdksaj</p>\r\n');

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
(2, 1, 'Bola Basket', 'aktif', '<p>\r\n	<strong>dsajdkajsdakljd alskjdka</strong></p>\r\n');

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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1519539733, 1, 'Admin', 'istrator', 'ADMIN', '009029302090'),
(2, '::1', 'ekosetiawan@ittelkom-pwt.ac.id', '$2y$08$2OeVIIz1t.LoFdI.1IWPo.9nGfoaESH5xtMV0f9z.hHfw9UepIkr2', NULL, 'ekosetiawan@ittelkom-pwt.ac.id', '6e3e2939e455a8c895797319d6e50d65a835f078', NULL, NULL, NULL, 1519477070, NULL, 0, 'Eko', 'setiawan', NULL, '232090'),
(3, '::1', 'ahmad@ittelkom-pwt.ac.id', '$2y$08$vr/EWyRPU0KaDVgaSNY6YOocTnW3r0xRMpU/GFG7lCkIv7sQAYm1G', NULL, 'ahmad@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1519477131, NULL, 1, 'ahmad', 'fauzi', NULL, '0290190'),
(4, '::1', 'sevi', '$2y$08$bLho9VlHQWno3sKSmx0PXu6fhjfummvOYQnhWX6BA1BuB/1xPsCPu', NULL, 'sevi@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1519477243, 1519543030, 1, 'sevi', 'setiawan', NULL, '2039290'),
(5, '::1', '14102065@ittelkom-pwt.ac.id', '$2y$08$HQBUahe1zx.Pz/Tj5BW/8.w/szzdd64LEohJ9Ja2vIuUGH2aMULKW', NULL, '14102065@ittelkom-pwt.ac.id', NULL, NULL, NULL, NULL, 1519478348, 1519543126, 1, 'iwan', 'firmawan', 'D3 Teknik Telekomunikasi', '02930');

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
(11, 1, 1);

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
(3, '293029030', 4, 1);

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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prasarana`
--
ALTER TABLE `prasarana`
  MODIFY `id_prasarana` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sarana`
--
ALTER TABLE `sarana`
  MODIFY `id_sarana` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users_staff`
--
ALTER TABLE `users_staff`
  MODIFY `id_staff` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
