-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2022 pada 12.06
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Mahasiswa', 'mahasiswa magang'),
(2, 'mhs-stupen', 'mahasiswa stupen'),
(3, 'mhs-mengajar', 'mahasiswa mengajar'),
(4, 'dosen', 'dosen'),
(5, 'dosen-admin', 'dosen admin'),
(6, 'dosen-fakul', 'dosen fakultas'),
(7, 'warek', 'warek satu'),
(8, 'warek-admin', 'warek admin'),
(9, 'kapus-magang', 'kapus magang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 10),
(1, 22),
(2, 12),
(2, 24),
(3, 13),
(3, 25),
(4, 14),
(5, 15),
(6, 19),
(7, 16),
(8, 17),
(9, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'm494n9', 1, '2022-06-16 10:56:57', 0),
(2, '::1', 'm494n9', 1, '2022-06-16 11:03:19', 0),
(3, '::1', 'm494n9', 10, '2022-06-16 11:31:13', 0),
(4, '::1', 'magang@gmail.com', 10, '2022-06-16 11:31:39', 1),
(5, '::1', 's7up3n', NULL, '2022-06-16 11:32:41', 0),
(6, '::1', 'tupennn@gmail.com', 11, '2022-06-16 11:33:48', 1),
(7, '::1', 'ngjarr@gmail.com', 13, '2022-06-16 11:48:02', 1),
(8, '::1', 'dosen@gmail.com', 14, '2022-06-16 11:50:01', 1),
(9, '::1', 'dosen@gmail.com', 14, '2022-06-16 13:02:42', 1),
(10, '::1', 'rek70r', NULL, '2022-06-16 13:09:54', 0),
(11, '::1', 'warek@gmail.com', 16, '2022-06-16 13:10:02', 1),
(12, '::1', 'magang@gmail.com', 10, '2022-06-16 13:10:16', 1),
(13, '::1', 'rek70r', NULL, '2022-06-16 13:11:59', 0),
(14, '::1', 'rek70r', NULL, '2022-06-16 13:12:06', 0),
(15, '::1', 'warek@gmail.com', 16, '2022-06-16 13:12:10', 1),
(16, '::1', 'warek@gmail.com', 16, '2022-06-16 13:18:54', 1),
(17, '::1', 'magang@gmail.com', 10, '2022-06-16 13:21:06', 1),
(18, '::1', 'dosen@gmail.com', 14, '2022-06-16 13:22:27', 1),
(19, '::1', 'dosen@gmail.com', 14, '2022-06-16 13:23:47', 1),
(20, '::1', 'warek@gmail.com', 16, '2022-06-16 13:25:11', 1),
(21, '::1', 'magang@gmail.com', 10, '2022-06-16 13:25:38', 1),
(22, '::1', 'magang@gmail.com', 10, '2022-06-16 13:28:00', 1),
(23, '::1', 'dosen@gmail.com', 14, '2022-06-16 13:40:02', 1),
(24, '::1', 'warek@gmail.com', 16, '2022-06-16 14:00:31', 1),
(25, '::1', 'magang@gmail.com', 10, '2022-06-16 14:11:35', 1),
(26, '::1', 'dosen@gmail.com', 14, '2022-06-16 14:13:28', 1),
(27, '::1', 'magang@gmail.com', 10, '2022-06-18 16:32:27', 1),
(28, '::1', 'dosen@gmail.com', 14, '2022-06-18 16:37:35', 1),
(29, '::1', 'magang@gmail.com', 10, '2022-06-18 16:46:46', 1),
(30, '::1', 'dosen@gmail.com', 14, '2022-06-18 16:52:02', 1),
(31, '::1', 'dosen@gmail.com', 14, '2022-06-18 23:17:38', 1),
(32, '::1', 'tupennn@gmail.com', 12, '2022-06-19 18:48:09', 1),
(33, '::1', 'dosen@gmail.com', 14, '2022-06-19 18:49:35', 1),
(34, '::1', 'ngjarr@gmail.com', 13, '2022-06-19 19:03:00', 1),
(35, '::1', 'dosen@gmail.com', 14, '2022-06-19 19:04:05', 1),
(36, '::1', 'warek@gmail.com', 16, '2022-06-19 19:13:53', 1),
(37, '::1', 'tupennn@gmail.com', 12, '2022-06-19 19:16:54', 1),
(38, '::1', 'ngjarr@gmail.com', 13, '2022-06-19 19:19:06', 1),
(39, '::1', 'dosen@gmail.com', 14, '2022-06-19 19:21:09', 1),
(40, '::1', 'ngjarr@gmail.com', 13, '2022-06-19 19:26:31', 1),
(41, '::1', 'dosen@gmail.com', 14, '2022-06-19 19:29:44', 1),
(42, '::1', 'magang@gmail.com', 10, '2022-06-19 19:42:36', 1),
(43, '::1', 'dosen@gmail.com', 14, '2022-06-19 19:42:47', 1),
(44, '::1', 'magang@gmail.com', 10, '2022-06-19 19:43:26', 1),
(45, '::1', 'dosen@gmail.com', 14, '2022-06-19 19:44:38', 1),
(46, '::1', 'warek@gmail.com', 16, '2022-06-19 19:46:03', 1),
(47, '::1', 'magang@gmail.com', 10, '2022-06-19 19:51:23', 1),
(48, '::1', 'dosen@gmail.com', 14, '2022-06-19 19:59:39', 1),
(49, '::1', 'warek@gmail.com', 16, '2022-06-19 20:04:48', 1),
(50, '::1', 'tupennn@gmail.com', 12, '2022-06-19 20:08:51', 1),
(51, '::1', 'dosen@gmail.com', 14, '2022-06-19 20:09:59', 1),
(52, '::1', 'tupennn@gmail.com', 12, '2022-06-20 11:16:46', 1),
(53, '::1', 'ngjarr@gmail.com', 13, '2022-06-20 11:17:06', 1),
(54, '::1', 'dosen@gmail.com', 14, '2022-06-20 11:17:18', 1),
(55, '::1', 'magang@gmail.com', 10, '2022-06-20 11:18:29', 1),
(56, '::1', 'ngjarr@gmail.com', 13, '2022-06-20 11:38:27', 1),
(57, '::1', 'magang@gmail.com', 10, '2022-06-20 14:30:51', 1),
(58, '::1', 'tupennn@gmail.com', 12, '2022-06-20 14:31:24', 1),
(59, '::1', 'ngjarr@gmail.com', 13, '2022-06-20 14:31:50', 1),
(60, '::1', 'dosen@gmail.com', 14, '2022-06-20 14:32:10', 1),
(61, '::1', 'magang@gmail.com', 10, '2022-06-20 14:56:53', 1),
(62, '::1', 'dosen@gmail.com', 14, '2022-06-20 23:05:43', 1),
(63, '::1', 'magang@gmail.com', 10, '2022-06-20 23:06:20', 1),
(64, '::1', 'tupennn@gmail.com', 12, '2022-06-20 23:22:51', 1),
(65, '::1', 'ngjarr@gmail.com', 13, '2022-06-20 23:34:37', 1),
(66, '::1', 'tupennn@gmail.com', 12, '2022-06-20 23:34:56', 1),
(67, '::1', 'magang@gmail.com', 10, '2022-06-20 23:41:38', 1),
(68, '::1', 'tupennn@gmail.com', 12, '2022-06-20 23:41:51', 1),
(69, '::1', 'ngjarr@gmail.com', 13, '2022-06-20 23:42:09', 1),
(70, '::1', 'dosen@gmail.com', 14, '2022-06-20 23:42:21', 1),
(71, '::1', 'magang@gmail.com', 10, '2022-06-20 23:52:00', 1),
(72, '::1', 'tupennn@gmail.com', 12, '2022-06-20 23:52:51', 1),
(73, '::1', 'ngjarr@gmail.com', 13, '2022-06-20 23:54:26', 1),
(74, '::1', 'magang@gmail.com', 10, '2022-06-23 19:35:41', 1),
(75, '::1', 'warek@gmail.com', 16, '2022-06-24 13:37:50', 1),
(76, '::1', 'magang@gmail.com', 10, '2022-06-24 13:37:59', 1),
(77, '::1', 'dosen@gmail.com', 14, '2022-06-24 13:42:58', 1),
(78, '::1', 'dosen@gmail.com', 14, '2022-06-24 14:19:53', 1),
(79, '::1', 'magang@gmail.com', 10, '2022-06-24 15:05:09', 1),
(80, '::1', 'magangSIB', NULL, '2022-06-26 12:05:15', 0),
(81, '::1', 'magang@gmail.com', 10, '2022-06-26 12:05:55', 1),
(82, '::1', 'dosen@gmail.com', 14, '2022-06-26 13:22:28', 1),
(83, '::1', 'magang@gmail.com', 10, '2022-06-26 13:35:56', 1),
(84, '::1', 'magang@gmail.com', 10, '2022-06-26 23:15:02', 1),
(85, '::1', 'magang@gmail.com', 10, '2022-06-26 23:54:05', 1),
(86, '::1', 'dosen@gmail.com', 14, '2022-06-27 00:16:25', 1),
(87, '::1', 'magang@gmail.com', 10, '2022-06-27 11:07:40', 1),
(88, '::1', 'tupennn@gmail.com', 12, '2022-06-27 11:34:40', 1),
(89, '::1', 'dosen@gmail.com', 14, '2022-06-27 11:35:01', 1),
(90, '::1', 'ngjarr@gmail.com', 13, '2022-06-27 11:56:18', 1),
(91, '::1', 'dosen@gmail.com', 14, '2022-06-27 12:09:29', 1),
(92, '::1', 'warek@gmail.com', 16, '2022-06-27 12:11:03', 1),
(93, '::1', 'dosen@gmail.com', 14, '2022-06-27 12:11:17', 1),
(94, '::1', 'ngjarr@gmail.com', 13, '2022-06-27 12:19:21', 1),
(95, '::1', 'magang@gmail.com', 10, '2022-06-27 12:41:14', 1),
(96, '::1', 'tupennn@gmail.com', 12, '2022-06-27 12:41:51', 1),
(97, '::1', 'magang@gmail.com', 10, '2022-06-27 12:42:44', 1),
(98, '::1', 'tupennn@gmail.com', 12, '2022-06-27 12:43:14', 1),
(99, '::1', 'dosen@gmail.com', 14, '2022-06-27 12:45:37', 1),
(100, '::1', 'magang@gmail.com', 10, '2022-06-27 12:46:45', 1),
(101, '::1', 'tupennn@gmail.com', 12, '2022-06-27 12:48:15', 1),
(102, '::1', 'ngjarr@gmail.com', 13, '2022-06-27 12:50:30', 1),
(103, '::1', 'magang@gmail.com', 10, '2022-06-27 12:54:21', 1),
(104, '::1', 'tupennn@gmail.com', 12, '2022-06-27 12:54:40', 1),
(105, '::1', 'magang@gmail.com', 10, '2022-06-27 13:00:26', 1),
(106, '::1', 'ngjarr@gmail.com', 13, '2022-06-27 13:00:43', 1),
(107, '::1', 'tupennn@gmail.com', 12, '2022-06-27 13:06:53', 1),
(108, '::1', 'dosen@gmail.com', 14, '2022-06-27 21:34:15', 1),
(109, '::1', 'dosen@gmail.com', 14, '2022-06-27 22:36:06', 1),
(110, '::1', 'magang@gmail.com', 10, '2022-06-27 22:36:23', 1),
(111, '::1', 'dosen@gmail.com', 14, '2022-06-29 19:17:21', 1),
(112, '::1', 'magang@gmail.com', 10, '2022-06-29 19:17:39', 1),
(113, '::1', 'warek@gmail.com', 16, '2022-06-29 19:18:44', 1),
(114, '::1', 'dosen@gmail.com', 14, '2022-06-29 19:20:47', 1),
(115, '::1', 'magang@gmail.com', 10, '2022-06-29 19:23:37', 1),
(116, '::1', 'dosen@gmail.com', 14, '2022-06-29 19:32:05', 1),
(117, '::1', 'adamrifky20@gmail.com', 22, '2022-06-29 19:32:16', 1),
(118, '::1', 'malvino@gmail.com', 25, '2022-06-29 19:32:23', 1),
(119, '::1', 'muhammad.kevin', NULL, '2022-06-29 19:32:30', 0),
(120, '::1', 'magang@gmail.com', 10, '2022-06-30 10:26:26', 1),
(121, '::1', 'farhan.abdul', NULL, '2022-06-30 10:28:07', 0),
(122, '::1', 'rek70r', NULL, '2022-06-30 10:30:33', 0),
(123, '::1', 'warek@gmail.com', 16, '2022-06-30 10:30:38', 1),
(124, '::1', 'warek@gmail.com', 16, '2022-06-30 10:30:55', 1),
(125, '::1', 'dosen@gmail.com', 14, '2022-06-30 10:32:27', 1),
(126, '::1', 'warek@gmail.com', 16, '2022-06-30 10:35:23', 1),
(127, '::1', 'warek@gmail.com', 16, '2022-06-30 10:38:00', 1),
(128, '::1', 'ngjarr@gmail.com', 13, '2022-06-30 10:45:44', 1),
(129, '::1', 'warek@gmail.com', 16, '2022-06-30 10:45:52', 1),
(130, '::1', 'dosen@gmail.com', 14, '2022-06-30 10:46:02', 1),
(131, '::1', 'dosen@gmail.com', 14, '2022-06-30 15:46:19', 1),
(132, '::1', 'warek@gmail.com', 16, '2022-07-04 00:55:59', 1),
(133, '::1', 'warek@gmail.com', 16, '2022-07-04 00:59:57', 1),
(134, '::1', 'warek@gmail.com', 16, '2022-07-04 12:41:44', 1),
(135, '::1', 'warek@gmail.com', 16, '2022-07-04 12:47:53', 1),
(136, '::1', 'warek@gmail.com', 16, '2022-07-04 12:49:19', 1),
(137, '::1', 'warek@gmail.com', 16, '2022-07-04 12:49:46', 1),
(138, '::1', 'warek@gmail.com', 16, '2022-07-04 12:53:20', 1),
(139, '::1', 'warek@gmail.com', 16, '2022-07-04 12:56:38', 1),
(140, '::1', 'warek@gmail.com', 16, '2022-07-04 13:00:23', 1),
(141, '::1', 'warek@gmail.com', 16, '2022-07-04 13:33:10', 1),
(142, '::1', 'warek@gmail.com', 16, '2022-07-04 19:53:39', 1),
(143, '::1', 'warek@gmail.com', 16, '2022-07-04 20:02:27', 1),
(144, '::1', 'warek@gmail.com', 16, '2022-07-04 20:13:03', 1),
(145, '::1', 'warek@gmail.com', 16, '2022-07-04 20:28:24', 1),
(146, '::1', 'warek@gmail.com', 16, '2022-07-06 13:07:13', 1),
(147, '::1', 'warek@gmail.com', 16, '2022-07-06 15:05:05', 1),
(148, '::1', 'warek@gmail.com', 16, '2022-07-07 12:10:19', 1),
(149, '::1', 'warek@gmail.com', 16, '2022-07-07 12:44:16', 1),
(150, '::1', 'warek@gmail.com', 16, '2022-07-07 12:44:28', 1),
(151, '::1', 'warek@gmail.com', 16, '2022-07-07 12:47:33', 1),
(152, '::1', 'warek@gmail.com', 16, '2022-07-07 12:55:29', 1),
(153, '::1', 'warek@gmail.com', 16, '2022-07-08 11:27:58', 1),
(154, '::1', 'warek@gmail.com', 16, '2022-07-08 13:39:03', 1),
(155, '::1', 'warek@gmail.com', 16, '2022-07-11 16:20:37', 1),
(156, '::1', 'warek@gmail.com', 16, '2022-07-11 16:26:23', 1),
(157, '::1', 'warek@gmail.com', 16, '2022-07-13 13:13:44', 1),
(158, '::1', 'foo.lin', NULL, '2022-07-13 14:15:56', 0),
(159, '::1', 'warek@gmail.com', 16, '2022-07-13 14:27:28', 1),
(160, '::1', 'warek@gmail.com', 16, '2022-07-17 14:42:38', 1),
(161, '::1', 'warek@gmail.com', 16, '2022-07-17 14:45:37', 1),
(162, '::1', 'warek@gmail.com', 16, '2022-07-17 14:47:09', 1),
(163, '::1', 'warek@gmail.com', 16, '2022-07-17 14:49:15', 1),
(164, '::1', 'warek@gmail.com', 16, '2022-07-17 14:50:48', 1),
(165, '::1', 'warek@gmail.com', 16, '2022-07-17 15:08:07', 1),
(166, '::1', 'warek@gmail.com', 16, '2022-07-17 15:19:49', 1),
(167, '::1', 'warek@gmail.com', 16, '2022-07-17 15:21:18', 1),
(168, '::1', 'warekadmin@gmail.com', 17, '2022-07-17 15:22:20', 1),
(169, '::1', 'warek@gmail.com', 16, '2022-07-17 15:22:43', 1),
(170, '::1', 'warek@gmail.com', 16, '2022-07-17 15:34:37', 1),
(171, '::1', 'warek@gmail.com', 16, '2022-07-17 16:52:41', 1),
(172, '::1', 'warek@gmail.com', 16, '2022-07-17 16:56:37', 1),
(173, '::1', 'warek@gmail.com', 16, '2022-07-17 17:03:53', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `magang_mbkm`
--

CREATE TABLE `magang_mbkm` (
  `id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `nama_mahasiswa` varchar(1000) NOT NULL,
  `npm_mahasiswa` int(11) NOT NULL,
  `program_studi` varchar(1000) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` varchar(100) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `no_wa` varchar(1000) NOT NULL,
  `bentuk_kegiatan` varchar(1000) NOT NULL,
  `learning_path` varchar(1000) NOT NULL,
  `mitra_perusahaan` varchar(1000) NOT NULL,
  `surat_komitmen` varchar(1000) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `ket_status` varchar(1000) NOT NULL,
  `status2` varchar(1000) NOT NULL,
  `ket_status2` varchar(1000) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `magang_mbkm`
--

INSERT INTO `magang_mbkm` (`id`, `email`, `nama_mahasiswa`, `npm_mahasiswa`, `program_studi`, `fakultas`, `semester`, `ipk`, `jumlah_sks`, `no_wa`, `bentuk_kegiatan`, `learning_path`, `mitra_perusahaan`, `surat_komitmen`, `foto`, `status`, `ket_status`, `status2`, `ket_status2`, `created_at`, `deleted_at`, `update_at`) VALUES
(26, 'adamrifky13@gmail.com', 'muhammad-adam-rifky-arrasyid', 1502018105, 'Teknik Informatika', '', 0, '', 0, '085155330495', 'Magang Bersertifikat', 'CV_Adam rifky.pdf', 'PT. Bank CIMB Niaga', 'CV_Adam rifky.doc', 'foto formal_1.jpg', 'Approve', 'aman nih', 'Approve', 'aman juga', '2022-07-13 13:12:14', '2022-07-13 13:12:14', '2022-07-13 13:12:14'),
(28, 'silvy@gmail.com', 'silvy-ziana', 1402018104, 'Manajemen', 'Ekonimi dan Bisnis', 7, '3.98', 105, '086766778090', 'Magang Bersertifikat', 'CV_Adam rifky_3.doc', 'PT SUSU ABC', 'CV_Adam rifky_1.pdf', 'foto formal_3.jpg', 'Approve', 'masuk ga?', 'Approve', 'aman ga?', '2022-07-13 14:15:27', '2022-07-13 14:15:27', '2022-07-13 14:15:27'),
(29, 'billie@gmail.com', 'billie-eillish', 1402018100, 'Akuntansi', 'Ekonimi dan Bisnis', 7, '3.98', 105, '085155330495', 'Magang Bersertifikat', 'antigen_adam.pdf', 'PT. ABC SUSU', 'antigen_adam_1.pdf', 'foto formal_4.jpg', 'Approve', 'aaa', 'Approve', 'masuk ga?', '2022-07-17 13:45:01', '2022-07-17 13:45:01', '2022-07-17 13:45:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar_mbkm`
--

CREATE TABLE `mengajar_mbkm` (
  `id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `nama_mahasiswa` varchar(1000) NOT NULL,
  `npm_mahasiswa` int(11) NOT NULL,
  `program_studi` varchar(1000) NOT NULL,
  `fakultas` varchar(250) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` varchar(250) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `no_wa` varchar(1000) NOT NULL,
  `bentuk_kegiatan` varchar(1000) NOT NULL,
  `learning_path` varchar(1000) NOT NULL,
  `mitra_perusahaan` varchar(1000) NOT NULL,
  `surat_persetujuan` varchar(1000) NOT NULL,
  `surat_komitmen` varchar(1000) NOT NULL,
  `ss_mitra` varchar(1000) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `ket_status` varchar(1000) NOT NULL,
  `status2` varchar(1000) NOT NULL,
  `ket_status2` varchar(1000) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mengajar_mbkm`
--

INSERT INTO `mengajar_mbkm` (`id`, `email`, `nama_mahasiswa`, `npm_mahasiswa`, `program_studi`, `fakultas`, `semester`, `ipk`, `jumlah_sks`, `no_wa`, `bentuk_kegiatan`, `learning_path`, `mitra_perusahaan`, `surat_persetujuan`, `surat_komitmen`, `ss_mitra`, `foto`, `status`, `ket_status`, `status2`, `ket_status2`, `created_at`, `deleted_at`, `update_at`) VALUES
(10, 'aan@gmail.com', 'anak-anung-anindito', 1112010301, 'Psikologi', 'Psikologi', 7, '3.98', 105, '085155330495', 'Kampus Mengajar', 'CV Caesar Apridarkar_2.pdf', 'SDN 04 GA BAHAGIA', '', 'CV_Adam rifky_4.doc', '', 'foto formal_6.jpg', 'Approve', 'masuk orang?', 'Approve', 'masuk ges?', '2022-07-17 16:42:45', '2022-07-17 16:42:45', '2022-07-17 16:42:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1655350459, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `npm_mahasiswa` int(11) NOT NULL,
  `bentuk_kegiatan` varchar(1000) NOT NULL,
  `week` varchar(1000) NOT NULL,
  `activity` varchar(1000) NOT NULL,
  `berkas_laporan` varchar(1000) NOT NULL,
  `tanggapan` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`id`, `npm_mahasiswa`, `bentuk_kegiatan`, `week`, `activity`, `berkas_laporan`, `tanggapan`, `status`, `created_at`, `deleted_at`, `update_at`) VALUES
(49, 0, 'Magang Bersertifikat', '2022-07-15', 'Buat desain homepage', '', '', '1', '2022-07-17 10:59:06', '2022-07-17 10:59:06', '2022-07-17 10:59:06'),
(50, 1902050105, 'Magang Bersertifikat', '2022-07-17T00:00', 'Buat desain homepage', '', '', '1', '2022-07-17 12:03:55', '2022-07-17 12:03:55', '2022-07-17 12:03:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stupen_mbkm`
--

CREATE TABLE `stupen_mbkm` (
  `id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `nama_mahasiswa` varchar(1000) NOT NULL,
  `npm_mahasiswa` int(11) NOT NULL,
  `program_studi` varchar(1000) NOT NULL,
  `fakultas` varchar(1000) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` varchar(100) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `no_wa` varchar(1000) NOT NULL,
  `bentuk_kegiatan` varchar(1000) NOT NULL,
  `learning_path` varchar(1000) NOT NULL,
  `mitra_perusahaan` varchar(1000) NOT NULL,
  `surat_persetujuan` varchar(1000) NOT NULL,
  `surat_komitmen` varchar(1000) NOT NULL,
  `ss_mitra` varchar(1000) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `ket_status` varchar(1000) NOT NULL,
  `status2` varchar(1000) NOT NULL,
  `ket_status2` varchar(1000) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stupen_mbkm`
--

INSERT INTO `stupen_mbkm` (`id`, `email`, `nama_mahasiswa`, `npm_mahasiswa`, `program_studi`, `fakultas`, `semester`, `ipk`, `jumlah_sks`, `no_wa`, `bentuk_kegiatan`, `learning_path`, `mitra_perusahaan`, `surat_persetujuan`, `surat_komitmen`, `ss_mitra`, `foto`, `status`, `ket_status`, `status2`, `ket_status2`, `created_at`, `deleted_at`, `update_at`) VALUES
(15, 'amalia@gmail.com', 'amalia', 1402018093, 'Manajemen', 'Teknologi Informasi', 7, '3.98', 105, '086199450202', 'Studi Independen', 'antigen_adam_2.pdf', 'hashmicro', '', 'antigen_adam_3.pdf', '', 'foto formal_5.jpg', 'Approve', 'MASUK GA?', 'Approve', 'masuk ga', '2022-07-17 16:00:37', '2022-07-17 16:00:37', '2022-07-17 16:00:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'magang@gmail.com', 'm494n9', '$2y$10$k7u69xH5JmlZr1CebxEymeL5l.GBtTlK5b/N4zjOp88mfKOdt.oui', NULL, NULL, NULL, '9262b3ae3cf694de80f6a4e59d08b670', '1', NULL, 1, 0, '2022-06-16 11:30:21', '2022-06-16 11:30:21', NULL),
(12, 'tupennn@gmail.com', 's7up3n', '$2y$10$Le4Lv8HzvwPofDm29fMImOspRkhVN6./PwAuXG1C5EWKGs7zn8EHW', NULL, NULL, NULL, 'c00d515ef35d255c691910d7185c3fe9', '1', NULL, 1, 0, '2022-06-16 11:35:00', '2022-06-16 11:35:00', NULL),
(13, 'ngjarr@gmail.com', 'n94j4r', '$2y$10$JpqMvQ9tnn33dHk2ffpdWei6JhW4oaC0lxRmm06AoQAixHG.jDXOq', NULL, NULL, NULL, '9715c777f90a0ed6106d617d6eb60101', '1', NULL, 1, 0, '2022-06-16 11:35:53', '2022-06-16 11:35:53', NULL),
(14, 'dosen@gmail.com', '3l4nn', '$2y$10$PmBD5gZHaQoXnQC2OHkSbOm9w6K8rMMr/s8bVKpxpFGnRNj/xOF2u', NULL, NULL, NULL, '1849f5deef380e1ea779d5b210f8e266', '1', NULL, 1, 0, '2022-06-16 11:37:05', '2022-06-16 11:37:05', NULL),
(15, 'dosenadmin@gmail.com', 'admin9090', '$2y$10$R6hDKJfUFSQOFWQl7OWNXeSY7Cbjr4yBWPUlXRC5tgsHAILTbL8Pm', NULL, NULL, NULL, 'b0d439c10f08209a1ca2274128ac10fb', '1', NULL, 1, 0, '2022-06-16 11:37:50', '2022-06-16 11:37:50', NULL),
(16, 'warek@gmail.com', 'warek123', '$2y$10$2KdR/IpZ8ChpyZI9kTXaNuSyDOrqTwKhDYNVv6Aw2.Bryi6REJH4W', NULL, NULL, NULL, 'd5df6748ca05b1f360e7828d3d8965cb', '1', NULL, 1, 0, '2022-06-16 11:40:10', '2022-06-16 11:40:10', NULL),
(17, 'warekadmin@gmail.com', 'warekadmin123', '$2y$10$vAcaDWOw5TkSXEKvAun2MuCOIO6J1IA8sdHNinCWYaGGpokR4OjIW', NULL, NULL, NULL, '4d42997b31605d94b1e7aedb4c3d0aed', '1', NULL, 1, 0, '2022-06-16 11:41:00', '2022-06-16 11:41:00', NULL),
(18, 'kapusmagang@gmail.com', 'kapus123', '$2y$10$4A4OrbI6U5PoNlNZXOD9p.N0unQXsQw7BRPKYXyZnGCOaru4w/5Je', NULL, NULL, NULL, '343526db581f27676fbab43579433230', '1', NULL, 1, 0, '2022-06-16 11:42:57', '2022-06-16 11:42:57', NULL),
(19, 'dosenfakultas@gmail.com', 'dosenfakultas123', '$2y$10$SPRYDUguhROb4SHdROHuau2Wi1N4jiZ11madBOi7ueVJeE9F9v2Z.', NULL, NULL, NULL, '02a8b672d871dfa1ce3c8d51aaad8a7c', '1', NULL, 1, 0, '2022-06-16 11:46:32', '2022-06-16 11:46:32', NULL),
(22, 'adamrifky20@gmail.com', 'muhammad.adam', '$2y$10$m10jt79ZaJrjY3TbV71XOe7eoThYQSwx2dnVvYtF98GUPmaA0e1XO', NULL, NULL, NULL, '6a2755991ceee8013b028c769a95a3f2', '1', NULL, 1, 0, '2022-06-28 00:48:14', '2022-06-28 00:48:14', NULL),
(24, 'farhanbedul@gmail.com', 'farhan.abdul', '$2y$10$i80W1iVN2tN4NBEBfVcZmOpkR/wDnOoOSBeioCIsTZWwhayXx1V7y', NULL, NULL, NULL, '4c260030cfbbeb614e2fb1e53698763a', '1', NULL, 1, 0, '2022-06-28 19:16:54', '2022-06-28 19:16:54', NULL),
(25, 'malvino@gmail.com', 'muhammad.malvino', '$2y$10$tTSFiMYGj78xJRDrxMal.eLXYQY6UZm8WHhMiHQ3DEJ20iuLpIKS.', NULL, NULL, NULL, '163c1b959e79d0f4340158947bb787a3', '1', NULL, 1, 0, '2022-06-28 19:17:45', '2022-06-28 19:17:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `magang_mbkm`
--
ALTER TABLE `magang_mbkm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mengajar_mbkm`
--
ALTER TABLE `mengajar_mbkm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stupen_mbkm`
--
ALTER TABLE `stupen_mbkm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `magang_mbkm`
--
ALTER TABLE `magang_mbkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `mengajar_mbkm`
--
ALTER TABLE `mengajar_mbkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `stupen_mbkm`
--
ALTER TABLE `stupen_mbkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
