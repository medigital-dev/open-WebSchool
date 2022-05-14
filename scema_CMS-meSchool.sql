-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 01:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) DEFAULT NULL,
  `id_blog` varchar(11) NOT NULL,
  `link` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `foto_sampul` varchar(256) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `isi` longtext NOT NULL,
  `kategori` varchar(64) NOT NULL,
  `status` int(11) NOT NULL,
  `viewer` int(11) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id_tag_blog` int(11) NOT NULL,
  `id_tag` varchar(12) NOT NULL,
  `id_blog` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config_upload`
--

CREATE TABLE `config_upload` (
  `id_config_upload` int(11) NOT NULL,
  `upload_path` varchar(128) NOT NULL,
  `allowed_types` longtext NOT NULL,
  `file_name` varchar(128) DEFAULT NULL,
  `file_ext_tolower` tinyint(1) NOT NULL,
  `over_write` tinyint(1) NOT NULL,
  `max_size` int(11) NOT NULL,
  `encrypt_name` tinyint(1) NOT NULL,
  `remove_spaces` tinyint(1) NOT NULL,
  `upload_profil_name` varchar(128) NOT NULL,
  `upload_is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config_upload`
--

INSERT INTO `config_upload` (`id_config_upload`, `upload_path`, `allowed_types`, `file_name`, `file_ext_tolower`, `over_write`, `max_size`, `encrypt_name`, `remove_spaces`, `upload_profil_name`, `upload_is_active`) VALUES
(1, 'assets/upload/', '*', '', 1, 0, 1024, 0, 1, 'default', 1);

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `telepon` varchar(16) DEFAULT NULL,
  `email` varchar(24) DEFAULT NULL,
  `website` varchar(32) DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `tagline` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `slug_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `parent_comment` int(11) DEFAULT NULL,
  `id_blog` varchar(16) NOT NULL,
  `date_comment` datetime NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `nomor_wa` varchar(16) DEFAULT NULL,
  `pesan` longtext NOT NULL,
  `icon` varchar(64) NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(16) NOT NULL,
  `akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`, `akses`) VALUES
(1, 'root', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_sosial`
--

CREATE TABLE `media_sosial` (
  `id_medsos` int(11) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `maps` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `href` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `tipe` enum('Default','Dropdown') NOT NULL,
  `new_tab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `id_page` varchar(16) NOT NULL,
  `id_user` int(11) NOT NULL,
  `url` varchar(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `message_date` datetime NOT NULL,
  `nama_pengirim` varchar(64) NOT NULL,
  `wa_pesan` varchar(16) NOT NULL,
  `email_pesan` varchar(24) NOT NULL,
  `pesan` longtext NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `nama_tag` varchar(128) NOT NULL,
  `slug_tag` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `nama_file` varchar(128) NOT NULL,
  `alt` longtext DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `href` varchar(128) DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `telepon` varchar(16) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `telepon`, `username`, `password`, `level`, `is_active`) VALUES
(1, 'root', 'mesaidlg@gmail.com', '087839301572', 'root', '$2y$10$YXHHZo1JwgEKmq9dG0bHIusU2b4QarYcETaJ43uo9Iz89apYyf4Z6', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id_tag_blog`);

--
-- Indexes for table `config_upload`
--
ALTER TABLE `config_upload`
  ADD PRIMARY KEY (`id_config_upload`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `media_sosial`
--
ALTER TABLE `media_sosial`
  ADD PRIMARY KEY (`id_medsos`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id_tag_blog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config_upload`
--
ALTER TABLE `config_upload`
  MODIFY `id_config_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
