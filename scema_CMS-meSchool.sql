-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2023 at 05:05 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

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
CREATE DATABASE IF NOT EXISTS `web` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `web`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int DEFAULT NULL,
  `id_blog` varchar(11) NOT NULL,
  `link` varchar(128) NOT NULL,
  `id_user` int NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `tahun` int NOT NULL,
  `bulan` int NOT NULL,
  `tanggal` int NOT NULL,
  `waktu` time NOT NULL,
  `foto_sampul` varchar(256) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `isi` longtext NOT NULL,
  `kategori` varchar(64) NOT NULL,
  `status` int NOT NULL,
  `viewer` int NOT NULL,
  `pin` int NOT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE IF NOT EXISTS `blog_tag` (
  `id_tag_blog` int NOT NULL AUTO_INCREMENT,
  `id_tag` varchar(12) NOT NULL,
  `id_blog` varchar(12) NOT NULL,
  PRIMARY KEY (`id_tag_blog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config_upload`
--

CREATE TABLE IF NOT EXISTS `config_upload` (
  `id_config_upload` int NOT NULL AUTO_INCREMENT,
  `upload_path` varchar(128) NOT NULL,
  `allowed_types` longtext NOT NULL,
  `file_name` varchar(128) DEFAULT NULL,
  `file_ext_tolower` tinyint(1) NOT NULL,
  `over_write` tinyint(1) NOT NULL,
  `max_size` int NOT NULL,
  `encrypt_name` tinyint(1) NOT NULL,
  `remove_spaces` tinyint(1) NOT NULL,
  `upload_profil_name` varchar(128) NOT NULL,
  `upload_is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_config_upload`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE IF NOT EXISTS `home_content` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_homepage` varchar(64) NOT NULL,
  `urutan` int NOT NULL,
  `content` longtext NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_sekolah` int NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `telepon` varchar(16) DEFAULT NULL,
  `email` varchar(24) DEFAULT NULL,
  `website` varchar(32) DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(128) NOT NULL,
  `slug_kategori` varchar(128) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int NOT NULL AUTO_INCREMENT,
  `parent_comment` int DEFAULT NULL,
  `id_blog` varchar(16) NOT NULL,
  `date_comment` datetime NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `nomor_wa` varchar(16) DEFAULT NULL,
  `pesan` longtext NOT NULL,
  `icon` varchar(64) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE IF NOT EXISTS `level_user` (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(16) NOT NULL,
  `akses` int DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`, `akses`) VALUES
(1, 'root', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_sosial`
--

CREATE TABLE IF NOT EXISTS `media_sosial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `icon` varchar(64) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `urutan` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `href` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `tipe` enum('Default','Dropdown') NOT NULL,
  `new_tab` int NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_page` varchar(16) NOT NULL,
  `id_user` int NOT NULL,
  `url` varchar(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int NOT NULL AUTO_INCREMENT,
  `message_date` datetime NOT NULL,
  `nama_pengirim` varchar(64) NOT NULL,
  `wa_pesan` varchar(16) NOT NULL,
  `email_pesan` varchar(24) NOT NULL,
  `pesan` longtext NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(128) NOT NULL,
  `slug_tag` varchar(128) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id_upload` int NOT NULL AUTO_INCREMENT,
  `type` varchar(64) NOT NULL,
  `id_type` int DEFAULT NULL,
  `nama_file` varchar(128) NOT NULL,
  `alt` longtext,
  `title` varchar(128) DEFAULT NULL,
  `href` varchar(128) DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  PRIMARY KEY (`id_upload`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `telepon` varchar(16) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` int NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `telepon`, `username`, `password`, `level`, `is_active`) VALUES
(1, 'root', 'mesaidlg@gmail.com', '087839301572', 'root', '$2y$10$YXHHZo1JwgEKmq9dG0bHIusU2b4QarYcETaJ43uo9Iz89apYyf4Z6', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_config`
--

CREATE TABLE IF NOT EXISTS `web_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo` varchar(128) DEFAULT NULL,
  `judul` varchar(128) DEFAULT NULL,
  `tagline` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
