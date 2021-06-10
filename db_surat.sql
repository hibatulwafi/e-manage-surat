-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 02:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manajemen users', 'web', '2021-04-18 15:59:32', '2021-04-18 15:59:32'),
(2, 'manajemen roles', 'web', '2021-04-18 15:59:32', '2021-04-18 15:59:32'),
(3, 'manajemen arsip', 'web', '2021-04-18 15:59:32', '2021-04-18 15:59:32'),
(4, 'manajemen rak', 'web', '2021-04-18 15:59:32', '2021-04-18 15:59:32'),
(5, 'manajemen transaksi', 'web', '2021-04-18 15:59:32', '2021-04-18 15:59:32'),
(6, 'manajemen peminjaman', 'web', '2021-04-26 22:17:21', '2021-04-27 03:29:37'),
(7, 'manajemen guru', 'web', '2021-04-26 22:17:21', '2021-04-26 22:17:21'),
(8, 'manajemen siswa', 'web', '2021-04-26 22:17:21', '2021-04-26 22:17:21'),
(9, 'manajemen pengajuan', 'web', '2021-04-26 22:17:21', '2021-04-26 22:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-04-18 15:59:32', '2021-04-18 15:59:32'),
(2, 'guru', 'web', '2021-04-18 15:59:32', '2021-04-18 15:59:32'),
(3, 'siswa', 'web', '2021-04-18 15:59:32', '2021-04-18 15:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(7, 1),
(8, 1),
(9, 2),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `favicon`, `logo`, `app_name`, `footer_right`, `footer_left`, `created_at`, `updated_at`) VALUES
(1, 'favicon_default.ico', 'Logo SMAN 1 Cikembar.jpg', 'AMS - SMAN 1', 'Ver 1.0', 'AMS - SMAN 1 CIKEMBAR', '2021-04-18 15:59:33', '2021-05-05 04:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `setting_surat`
--

CREATE TABLE `setting_surat` (
  `id` int(11) NOT NULL,
  `kepala_sekolah` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `logo_kop` varchar(255) NOT NULL,
  `judul_kop` varchar(255) NOT NULL,
  `subjudul_kop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` varchar(25) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `alamat_lengkap` varchar(100) DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `status_guru` varchar(20) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `diupdate_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nama_guru`, `jk`, `nik`, `ttl`, `no_telepon`, `alamat_lengkap`, `pangkat`, `jabatan`, `unit_kerja`, `status_guru`, `agama`, `dibuat_pada`, `diupdate_pada`) VALUES
('196606271993031007', 'Drs.Erwanda, M.pd', 'Laki - Laki', '3272001212212', 'Sukabumi, 21 Mei 1960', '08581233321', 'Jl Pelabuhan', 'Pembina Tingkat I IV/b', 'Kepala Sekolah', 'Sekolah Menengah Atas Negeri 1 Cikembar', 'Aktif', 'Islam', '2021-05-07 00:03:03', '2021-05-08 11:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_surat`
--

CREATE TABLE `tb_jenis_surat` (
  `id_jenis_surat` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `keterangan_jenis` varchar(255) NOT NULL,
  `status_jenis` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_surat`
--

INSERT INTO `tb_jenis_surat` (`id_jenis_surat`, `jenis_surat`, `keterangan_jenis`, `status_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Surat Tugas', 'Lorem ipsum', 1, '2021-05-26 23:37:55', NULL),
(2, 'Surat Keterangan', 'Lorem Ipsum', 1, '2021-05-26 23:37:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_profil` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `id_user`, `id_role`, `id_profil`) VALUES
(1, 2, 2, '196606271993031007'),
(2, 3, 3, '1918001'),
(3, 4, 3, '1918007');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `kode_rak` varchar(20) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `keterangan_rak` varchar(255) NOT NULL,
  `status_rak` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `kode_rak`, `nama_rak`, `keterangan_rak`, `status_rak`, `created_at`, `updated_at`) VALUES
(1, 'RK-001', 'Rak 1', 'Rak Menyimpan Arsip Dinamis', 1, '2021-04-19 15:01:10', '2021-04-27 02:32:38'),
(4, 'RK-002', 'Rak 2', 'Rak Menyimpan Arsip Statis', 1, '2021-04-19 14:06:31', '2021-04-27 02:33:30'),
(5, 'RK-003', 'Rak 3', 'Rak Menyimpan Arsip Terjaga', 1, '2021-04-27 02:33:49', NULL),
(6, 'RK-004', 'Rak 4', 'Rak Menyimpan Arsip Umum', 1, '2021-04-27 02:34:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(25) NOT NULL,
  `nisn` varchar(25) DEFAULT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `alamat_lengkap` varchar(255) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `status_siswa` varchar(20) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `diupdate_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nisn`, `nama_siswa`, `jk`, `ttl`, `no_telepon`, `alamat_lengkap`, `kelas`, `agama`, `status_siswa`, `dibuat_pada`, `diupdate_pada`) VALUES
('1918001', '0079341852', 'Annisa Zukhroful Jannah ', 'Perempuan', 'Sukabumi, 14 Maret 2007', '0857 5971 1666', 'Pesona Cibeureum Permai Blok M Jasmine No.5 Rt.02/24 Kec. Sukaraja Kab. Sukabumi', 'X MIPA 1', 'Islam ', 'Aktif', '2021-04-20 13:57:34', NULL),
('1918002', '0068784269', 'Ahmad Ghazy Nurfallah ', 'Laki - Laki', 'Sukabumi, 10 Maret 2006', '0857 9427 0201', 'Jl. Bhineka Karya No.11 Kel. Karamat Kec. Gunungpuyuh Kota Sukabumi', 'X MIPA 1', 'Islam ', 'Aktif', '2021-04-20 13:57:34', NULL),
('1918003', '0058959637', 'Al-Kindy Zia Rabani ', 'Laki - Laki', 'Sukabumi, 17 November 2005', '0857 2424 3457', 'Jl. Otto Iskandar Dinata Rt.02/02 Kel. Nanggeleng Kec. Citamiang Kota Sukabumi', 'X MIPA 1', 'Islam ', 'Aktif', '2021-04-20 13:57:34', NULL),
('1918004', '0051709284', 'Ali Wardana ', 'Laki - Laki', 'Sukabumi, 01 Oktober 2005', '0857 2310 5897', 'Jl. Kabandungan No.14 Rt.02/05 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'X MIPA 1', 'Islam ', 'Aktif', '2021-04-20 13:57:34', NULL),
('1918005', '0051137870', 'Almer Azzikra ', 'Laki - Laki', 'Sukabumi, 05 November 2005', '0815 6355 5454', 'Jl. Arief Rachman Hakim Gg.Loa No.11 Rt.01/05 Kel. Benteng Kec. Warudoyong Kota Sukabumi', 'X MIPA 1', 'Islam ', 'Aktif', '2021-04-20 13:57:34', NULL),
('1918006', '0061628360', 'Althaf Haidar Baladraf ', 'Laki - Laki', 'Malang, 11 Januari 2006', '0812 9198 1609', 'Jl. Selabintana KM.5 No.882 Rt.22/05 Desa Warnasari Kec. Sukabumi Kab. Sukabumi', 'X MIPA 1', 'Islam ', 'Aktif', '2021-04-20 13:57:34', NULL),
('1918007', '0055904304', 'Alya Siti Khofiyya', 'Perempuan', 'Klaten, 02 November 2005', '0815 6368 5000', 'Jl. Bhayangkara Gg. Kaswari No.25 Rt.06/08 Kel. Selabatu Kec. Cikole Kota Sukabumi', 'X MIPA 1', 'Islam ', 'Aktif', '2021-04-20 13:57:34', NULL),
('1918008', '0061570406', 'Amal Abdelsalam Yousif Al-Naqbi', 'Perempuan', 'Sukabumi, 28 Juli 2006', '0857 2222 2202', 'Perum Mega Residence Blok C7 Kel. Sriwidari Kec. Gunung Puyuh Kota Sukabumi', 'X MIPA 1', 'Islam ', 'Aktif', '2021-04-20 13:57:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `keterangan_surat` varchar(255) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status_surat` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `id_rak`, `nama_surat`, `keterangan_surat`, `jenis_surat`, `path`, `file`, `status_surat`, `created_at`, `updated_at`) VALUES
(1, 5, 'Surat Dinas', 'Lorem Ipsum Dolor Sit Amet', 'Surat Masuk', 'file_surat/', '1622040861_DAFTAR HADIR BULAN MARET 2021.pdf', 2, '2021-04-27 02:57:51', NULL),
(2, 1, 'Surat Undangan', 'Lorem Ipsum Dolor sit amet', 'Surat Keluar', 'file_surat/', '1622040861_DAFTAR HADIR BULAN MARET 2021.pdf', 1, '2021-04-19 14:00:24', '2021-04-19 14:14:18'),
(3, 1, 'Surat Dinas', 'Lorem Ipsum', 'Surat Masuk', 'file_surat/', '1622040861_DAFTAR HADIR BULAN MARET 2021.pdf', 1, '2021-04-26 06:48:41', '2021-04-27 02:39:21'),
(5, 1, 'arsip1', 'lorem', 'Surat Masuk', 'file_surat/', '1622040861_DAFTAR HADIR BULAN MARET 2021.pdf', 1, '2021-05-26 21:54:21', NULL),
(6, 4, 'arsip2', '1', 'Surat Masuk', 'surat/', '1622041077_laporan-pegawai-pdf_4.PDF', 1, '2021-05-26 21:57:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_keterangan`
--

CREATE TABLE `tb_surat_keterangan` (
  `id_ket` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL DEFAULT '0',
  `nis` varchar(25) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL DEFAULT 'Untuk daftar kuliah',
  `status_ket` int(1) NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `diupdate_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_keterangan`
--

INSERT INTO `tb_surat_keterangan` (`id_ket`, `no_surat`, `nis`, `nisn`, `nama_siswa`, `kelas`, `ttl`, `jk`, `alamat`, `tanggal`, `keterangan`, `status_ket`, `dibuat_pada`, `diupdate_pada`) VALUES
(2, '422/002/SMAN1.CADISDIK WILV/2021', '1918001', '0079341852', 'Annisa Zukhroful Jannah', 'X MIPA 1', 'Sukabumi, 14 Maret 2007', 'Perempuan', 'Pesona Cibeureum Permai Blok M Jasmine No.5 Rt.02/24 Kec. Sukaraja Kab. Sukabumi', '2021-05-27', 'Untuk daftar kuliah', 2, '2021-05-27 12:55:23', NULL),
(3, '0', '1918001', '0079341852', 'Annisa Zukhroful Jannah', 'X MIPA 1', 'Sukabumi, 14 Maret 2007', 'Perempuan', 'Pesona Cibeureum Permai Blok M Jasmine No.5 Rt.02/24 Kec. Sukaraja Kab. Sukabumi', '2021-05-27', 'Untuk daftar kuliah', 0, '2021-05-27 12:56:29', '2021-06-01 05:17:13'),
(4, '0', '1918001', '0079341852', 'Annisa Zukhroful Jannah', 'X MIPA 1', 'Sukabumi, 14 Maret 2007', 'Perempuan', 'Pesona Cibeureum Permai Blok M Jasmine No.5 Rt.02/24 Kec. Sukaraja Kab. Sukabumi', '2021-05-27', 'Untuk daftar kuliah', 0, '2021-05-27 12:57:52', '2021-06-01 05:17:19'),
(5, '422/002/SMAN1.CADISDIK WILV/2021', '1918001', '0079341852', 'Annisa Zukhroful Jannah', 'X MIPA 1', 'Sukabumi, 14 Maret 2007', 'Perempuan', 'Pesona Cibeureum Permai Blok M Jasmine No.5 Rt.02/24 Kec. Sukaraja Kab. Sukabumi', '2021-05-27', 'Untuk daftar kuliah', 2, '2021-05-27 12:58:12', NULL),
(6, '0', '1918001', '0079341852', 'Annisa Zukhroful Jannah', 'X MIPA 1', 'Sukabumi, 14 Maret 2007', 'Perempuan', 'Pesona Cibeureum Permai Blok M Jasmine No.5 Rt.02/24 Kec. Sukaraja Kab. Sukabumi', '2021-05-27', 'Untuk daftar kuliah', 0, '2021-05-27 12:58:23', '2021-06-01 05:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_tugas`
--

CREATE TABLE `tb_surat_tugas` (
  `id_st` int(11) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `status_pengajuan` int(1) NOT NULL DEFAULT 1,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `diupdate_pada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_tugas`
--

INSERT INTO `tb_surat_tugas` (`id_st`, `no_surat`, `nip`, `nama_guru`, `pangkat`, `jabatan`, `unit_kerja`, `nama_kegiatan`, `tanggal`, `jam`, `tempat`, `status_pengajuan`, `dibuat_pada`, `diupdate_pada`) VALUES
(1, '800/000/SMAN1.CADISDIK WILV/2021', '196606271993031007', 'Drs.Erwanda, M.pd', 'Pembina Tingkat I IV/b', 'Kepala Sekolah', 'SEKOLAH MENENGAH ATAS NEGERI 1 CIKEMBAR', 'Rapat Pimpinan', '2021-05-27', '08:00:00', 'SMAN 1 Cikembar', 2, '2021-05-27 03:23:29', '2021-05-27 03:23:29'),
(2, '0', '196606271993031007', 'Drs.Erwanda, M.pd', 'Pembina Tingkat I IV/b', 'Kepala Sekolah', 'SEKOLAH MENENGAH ATAS NEGERI 1 CIKEMBAR', 'Rapat Pimpinan ke2', '2021-05-27', '08:00:00', 'SMAN 1 Cikembar', 0, '2021-05-27 04:01:01', '2021-06-01 05:15:35'),
(3, '0', '196606271993031007', 'Drs.Erwanda, M.pd', 'Pembina Tingkat I IV/b', 'Kepala Sekolah', 'SEKOLAH MENENGAH ATAS NEGERI 1 CIKEMBAR', 'Rapat Pimpinan ke3', '2021-05-27', '08:00:00', 'SMAN 1 Cikembar', 0, '2021-05-27 04:02:31', '2021-06-01 05:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sopyan Maulana', 'admin@admin.com', 1, NULL, '$2y$10$1dM3IB1vCYEnU540zJmAjewmMvxcqRi2jPD10ptMFM3YCiNKebGri', NULL, '2021-04-18 15:59:32', '2021-05-20 14:48:36'),
(2, 'Mikasa Ackerman', 'user1@example.com', 1, NULL, '$2y$10$9K8yNbYlj9FNIHA.G4I.pOLoQKxrB0s15LzAaMa7KK9o2M8m19jSG', NULL, '2021-04-18 15:59:32', '2021-04-18 15:59:32'),
(3, 'Annisa Z.N', 'user2@example.com', 1, NULL, '$2y$10$1oEEgG7pEnrnEPLxf7WhY.4PFleWpCetv9WoTNGs6CRYMLhmGWbgi', NULL, '2021-04-18 15:59:33', '2021-04-18 15:59:33'),
(4, 'Alya', 'alya@gmail.com', 1, NULL, '$2y$10$fE7RkufBZx0EOduKErerTu59F558/ldLmzTK7Jzb75gl2XYwx44EG', NULL, '2021-06-01 08:17:47', '2021-06-01 08:17:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_surat`
--
ALTER TABLE `setting_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_profil` (`id_profil`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_surat_keterangan`
--
ALTER TABLE `tb_surat_keterangan`
  ADD PRIMARY KEY (`id_ket`);

--
-- Indexes for table `tb_surat_tugas`
--
ALTER TABLE `tb_surat_tugas`
  ADD PRIMARY KEY (`id_st`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_surat`
--
ALTER TABLE `setting_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  MODIFY `id_jenis_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_surat_keterangan`
--
ALTER TABLE `tb_surat_keterangan`
  MODIFY `id_ket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_surat_tugas`
--
ALTER TABLE `tb_surat_tugas`
  MODIFY `id_st` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
