-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 08:48 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `make_e_rab`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_instansi`
--

CREATE TABLE `data_instansi` (
  `id_instansi` int(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_instansi`
--

INSERT INTO `data_instansi` (`id_instansi`, `nama_instansi`) VALUES
(5, 'Pascasarjana');

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
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `item_rab`
--

CREATE TABLE `item_rab` (
  `id_item_rab` int(255) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `estimasi_harga_item` varchar(255) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `type_toko` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_rab`
--

INSERT INTO `item_rab` (`id_item_rab`, `nama_item`, `satuan`, `estimasi_harga_item`, `nama_toko`, `type_toko`, `status`) VALUES
(1, 'RG45', 'Kotak', '120000', 'edycom', 'Offline', 1),
(2, 'LAN cat5E', 'Box', '1850000', 'edycom', 'Offline', 1),
(4, 'Paku Clam', 'Bungkus', '20000', 'Istana Lampu', 'Offline', 1),
(6, 'Solasi Dowbletip', 'Unit', '35000', 'Istana Lampu', 'Offline', 1),
(7, 'Mata Bor', 'Unit', '30000', 'Istana Lampu', 'Offline', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(6, '::1', 'admin@admin.coms', 1545928340);

-- --------------------------------------------------------

--
-- Table structure for table `rab_record`
--

CREATE TABLE `rab_record` (
  `id_rab` int(255) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `qty_item` int(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga_item` int(255) NOT NULL,
  `sub_totalitem` int(255) NOT NULL,
  `by_surat` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab_record`
--

INSERT INTO `rab_record` (`id_rab`, `nama_item`, `qty_item`, `satuan`, `harga_item`, `sub_totalitem`, `by_surat`, `status`) VALUES
(36, 'RG45', 2, '', 120000, 240000, 28, NULL),
(44, '', 0, '', 0, 0, 20, NULL),
(45, 'RG45', 2, '', 120000, 240000, 25, NULL),
(49, 'RG45', 1, 'Kotak', 120000, 120000, 23, NULL),
(51, 'RG45', 1, 'Kotak', 120000, 120000, 31, NULL),
(56, 'RG45', 1, 'Kotak', 120000, 120000, 33, NULL),
(57, 'Paku Clam', 2, 'Bungkus', 20000, 40000, 33, NULL),
(58, 'Solasi Dowbletips', 5, 'Unit', 35000, 175000, 33, NULL),
(60, 'Solasi Dowbletips', 1, 'Unit', 35000, 35000, 2, NULL),
(61, 'Mata Bor', 4, 'Unit', 30000, 120000, 2, NULL),
(62, 'Paku Clam', 3, 'Bungkus', 20000, 60000, 2, NULL),
(63, 'RG45', 2, 'Kotak', 120000, 240000, 34, NULL),
(65, 'Paku Clam', 2, 'Bungkus', 20000, 40000, 34, NULL),
(66, 'Solasi Dowbletips', 1, 'Unit', 35000, 35000, 34, NULL),
(67, 'RG45', 2, 'Kotak', 120000, 240000, 35, NULL),
(68, 'LAN cat5E', 1, 'Box', 1850000, 1850000, 35, NULL),
(69, 'Paku Clam', 2, 'Bungkus', 20000, 40000, 35, NULL),
(70, 'Solasi Dowbletips', 2, 'Unit', 35000, 70000, 35, NULL),
(71, 'RG45', 2, 'Kotak', 120000, 240000, 36, NULL),
(72, 'LAN cat5E', 1, 'Box', 1850000, 1850000, 36, NULL),
(73, 'RG45', 1, 'Kotak', 120000, 120000, 37, NULL),
(74, 'LAN cat5E', 1, 'Box', 1850000, 1850000, 37, NULL),
(75, 'Mata Bor', 1, 'Unit', 30000, 30000, 37, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_permintaan`
--

CREATE TABLE `surat_permintaan` (
  `id_surat_permintaan` int(255) NOT NULL,
  `instansi_id` int(255) NOT NULL,
  `nomer_surat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tanggal_terima` varchar(255) NOT NULL,
  `time_stamp` int(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_permintaan`
--

INSERT INTO `surat_permintaan` (`id_surat_permintaan`, `instansi_id`, `nomer_surat`, `keperluan`, `tanggal_terima`, `time_stamp`, `status`) VALUES
(36, 3, '2956/C-UIR/13-FK/2018', 'Pemasangan Jaringan WLAN Dan LAN', '27/12/2018', 1545883462, 2),
(37, 3, '213452465768798732', 'Instalasi anu ', '27/12/2018', 1545884133, 2),
(38, 3, 'ini nome', '12134', '21/12/2018', 1545923681, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
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
(1, '127.0.0.1', 'administrator', '$2y$08$Z.Q6THMrg3DfG0acgwh9g.SbJQZh5eQqnG7aP1ErvKFcS8Pvmoi/m', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1545970311, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'coba', '$2y$08$oJllOzhT21hLWq5l73ZF9uQc.ca0XZ9brRg7dpIcT6toJYjCHgYs6', '', 'coba@admin.com', '', NULL, NULL, NULL, 1268889823, 1545973117, 1, 'coba', 'Cob', 'CADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_instansi`
--
ALTER TABLE `data_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_rab`
--
ALTER TABLE `item_rab`
  ADD PRIMARY KEY (`id_item_rab`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_record`
--
ALTER TABLE `rab_record`
  ADD PRIMARY KEY (`id_rab`);

--
-- Indexes for table `surat_permintaan`
--
ALTER TABLE `surat_permintaan`
  ADD PRIMARY KEY (`id_surat_permintaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_instansi`
--
ALTER TABLE `data_instansi`
  MODIFY `id_instansi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_rab`
--
ALTER TABLE `item_rab`
  MODIFY `id_item_rab` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rab_record`
--
ALTER TABLE `rab_record`
  MODIFY `id_rab` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `surat_permintaan`
--
ALTER TABLE `surat_permintaan`
  MODIFY `id_surat_permintaan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
