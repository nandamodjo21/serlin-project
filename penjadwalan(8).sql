-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13 Mar 2023 pada 19.39
-- Versi Server: 8.0.31
-- PHP Version: 7.2.34-37+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nira` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` enum('kepala ruang','perawat') NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nira`, `nama`, `jabatan`, `alamat`) VALUES
('75020501011', 'Frangky Usman, S .Tr.Kep', 'perawat', 'Sidomulyo selatan'),
('75020501013', 'Zulkifli B. Noe, A.Md.Kep', 'perawat', 'Mootilango'),
('75020501018', 'Septiana Taidi, S.Kep', 'perawat', 'Kabila'),
('75020501022', 'Nia Anggreini Moha, A.Md.Kep', 'perawat', 'Asparaga'),
('75020501024', 'Rivega Apriliani Mohammad, A.md.Kep', 'perawat', 'Bilato'),
('75020501037', 'Ummu Kalsum W.Badu, S.Kep.Ns', 'perawat', 'Wonosari'),
('75020501046', 'Maryanto, A.Md.Kep', 'perawat', 'Kota Gorontalo'),
('75020501058', 'Dewanti Maharani, S.Kep.Ns', 'perawat', 'Paguyaman'),
('75020501065', 'Sulistiyowati, A.Md.Kep', 'perawat', 'Boliyohuto'),
('75020501087', 'Sri Dewi Yunita Djangga, S.Kep,Ns', 'perawat', 'Mootilango');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `kode_ruangan` varchar(255) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `rawat_inap`
--

INSERT INTO `rawat_inap` (`kode_ruangan`, `nama_ruangan`) VALUES
('a1611ff7-b604-11ed-8fc0-dc215c6adf56', 'Rawat Inap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota_tim`
--

CREATE TABLE `tb_anggota_tim` (
  `kd_tim` varchar(255) NOT NULL,
  `nira` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_anggota_tim`
--

INSERT INTO `tb_anggota_tim` (`kd_tim`, `nira`) VALUES
('3fdf37d0-b609-11ed-8fc0-dc215c6adf56', '75020501018'),
('3fdf37d0-b609-11ed-8fc0-dc215c6adf56', '75020501037'),
('41c91840-b609-11ed-8fc0-dc215c6adf56', '75020501011'),
('41c91840-b609-11ed-8fc0-dc215c6adf56', '75020501013'),
('43c2ed4c-b609-11ed-8fc0-dc215c6adf56', '75020501022'),
('43c2ed4c-b609-11ed-8fc0-dc215c6adf56', '75020501024'),
('45741914-b609-11ed-8fc0-dc215c6adf56', '75020501046'),
('45741914-b609-11ed-8fc0-dc215c6adf56', '75020501058'),
('47e9391f-b609-11ed-8fc0-dc215c6adf56', '75020501065'),
('47e9391f-b609-11ed-8fc0-dc215c6adf56', '75020501087');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konfigurasi`
--

CREATE TABLE `tb_konfigurasi` (
  `kode_konfigurasi` varchar(255) NOT NULL,
  `kd_tim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kode_ruangan` varchar(255) NOT NULL,
  `kode_shift` int NOT NULL,
  `tanggal` date NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_konfigurasi`
--

INSERT INTO `tb_konfigurasi` (`kode_konfigurasi`, `kd_tim`, `kode_ruangan`, `kode_shift`, `tanggal`, `status`) VALUES
('c5701f61-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-01', 0),
('c5712d9f-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-01', 0),
('c5721cd7-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-01', 0),
('c572c572-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-01', 0),
('c57375c4-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-01', 0),
('c5741166-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-02', 0),
('c574c71e-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-02', 0),
('c5752d70-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-02', 0),
('c575d42a-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-02', 0),
('c57692ff-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-02', 0),
('c57725ad-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-03', 0),
('c577bbbe-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-03', 0),
('c578680b-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-03', 0),
('c5791ecd-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-03', 0),
('c579b90e-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-03', 0),
('c57a24a7-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-04', 0),
('c57ae2dc-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-04', 0),
('c57bb8d8-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-04', 0),
('c57c4d68-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-04', 0),
('c57ccafe-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-04', 0),
('c57daa5a-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-05', 0),
('c57e427b-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-05', 0),
('c57eb8ce-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-05', 0),
('c57f37a9-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-05', 0),
('c57fafc3-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-05', 0),
('c58061b8-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-06', 0),
('c580e584-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-06', 0),
('c581790d-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-06', 0),
('c581f69e-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-06', 0),
('c582c3ec-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-06', 0),
('c58352b3-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-07', 0),
('c583f444-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-07', 0),
('c5846abc-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-07', 0),
('c5850285-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-07', 0),
('c5859a03-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-07', 0),
('c58625e1-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-08', 0),
('c586ab7b-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-08', 0),
('c587674c-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-08', 0),
('c588353d-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-08', 0),
('c588b2dd-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-08', 0),
('c5892cf6-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-09', 0),
('c58a06e5-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-09', 0),
('c58ab979-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-09', 0),
('c58b8dd9-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-09', 0),
('c58c1660-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-09', 0),
('c58cd01d-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-10', 0),
('c58d8bc0-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-10', 0),
('c58e2b81-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-10', 0),
('c58ec16f-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-10', 0),
('c58f8397-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-10', 0),
('c59035dc-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-11', 0),
('c590af5f-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-11', 0),
('c591713d-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-11', 0),
('c5921e6b-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-11', 0),
('c592d027-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-11', 0),
('c5936de4-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-12', 0),
('c593e5be-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-12', 0),
('c594af3e-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-12', 0),
('c59526de-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-12', 0),
('c595a7be-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-12', 0),
('c5961ca0-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-13', 0),
('c596bb1a-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-13', 0),
('c597776a-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-13', 0),
('c5981f1d-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-13', 0),
('c598eed2-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-13', 0),
('c599c5fa-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-14', 0),
('c59a5b2f-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-14', 0),
('c59adfe5-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-14', 0),
('c59b6177-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-14', 0),
('c59c2714-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-14', 0),
('c59ca7eb-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-15', 0),
('c59d23ef-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-15', 0),
('c59d89e3-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-15', 0),
('c59e4b87-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-15', 0),
('c59f029e-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-15', 0),
('c59f8ae9-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-16', 0),
('c59ff302-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-16', 0),
('c5a137cc-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-16', 0),
('c5a1d388-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-16', 0),
('c5a2a8bb-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-16', 0),
('c5a37816-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-17', 0),
('c5a453aa-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-17', 0),
('c5a4dde9-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-17', 0),
('c5a57e67-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-17', 0),
('c5a5eb84-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-17', 0),
('c5a6cb35-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-18', 0),
('c5a76896-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-18', 0),
('c5a7d2cc-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-18', 0),
('c5a8606a-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-18', 0),
('c5a8fcbb-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-18', 0),
('c5a99256-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-19', 0),
('c5aa390a-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-19', 0),
('c5ab180a-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-19', 0),
('c5abd5c7-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-19', 0),
('c5ac842e-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-19', 0),
('c5ad6f4c-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-20', 0),
('c5ae0db7-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-20', 0),
('c5aee4d6-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-20', 0),
('c5af6f7d-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-20', 0),
('c5b012d7-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-20', 0),
('c5b09f72-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-21', 0),
('c5b11890-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-21', 0),
('c5b18d62-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-21', 0),
('c5b1e4f9-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-21', 0),
('c5b25f2d-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-21', 0),
('c5b2d945-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-22', 0),
('c5b3543b-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-22', 0),
('c5b3ada2-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-22', 0),
('c5b41067-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-22', 0),
('c5b4bf26-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-22', 0),
('c5b53c67-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-23', 0),
('c5b5b8c3-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-23', 0),
('c5b63267-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-23', 0),
('c5b692ea-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-23', 0),
('c5b6f32a-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-23', 0),
('c5b78c0c-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-24', 0),
('c5b7fd92-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-24', 0),
('c5b8531f-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-24', 0),
('c5b8ccf6-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-24', 0),
('c5b93492-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-24', 0),
('c5b98498-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-25', 0),
('c5ba1117-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-25', 0),
('c5baa42d-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-25', 0),
('c5bb1ee8-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-25', 0),
('c5bb858a-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-25', 0),
('c5bc1841-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-26', 0),
('c5bc89ca-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-26', 0),
('c5bcfe56-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-26', 0),
('c5bd79cb-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-26', 0),
('c5bded58-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-26', 0),
('c5be4a67-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-27', 0),
('c5beab49-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-27', 0),
('c5bef879-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-27', 0),
('c5bf7594-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-27', 0),
('c5bfec03-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-27', 0),
('c5c069f1-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-28', 0),
('c5c0cba8-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-28', 0),
('c5c13008-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-28', 0),
('c5c185cf-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-28', 0),
('c5c2051e-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-28', 0),
('c5c263b7-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-29', 0),
('c5c2ba0f-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-29', 0),
('c5c311e0-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-29', 0),
('c5c35580-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-29', 0),
('c5c3bba4-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-29', 0),
('c5c41e37-bec8-11ed-addf-dc215c6adf56', '41c91840-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 1, '2023-04-30', 0),
('c5c4bd82-bec8-11ed-addf-dc215c6adf56', '43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 2, '2023-04-30', 0),
('c5c53ea8-bec8-11ed-addf-dc215c6adf56', '45741914-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 3, '2023-04-30', 0),
('c5c5982f-bec8-11ed-addf-dc215c6adf56', '47e9391f-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 4, '2023-04-30', 0),
('c5c60926-bec8-11ed-addf-dc215c6adf56', '3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 'a1611ff7-b604-11ed-8fc0-dc215c6adf56', 5, '2023-04-30', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_shift`
--

CREATE TABLE `tb_shift` (
  `kode_shift` int NOT NULL,
  `shift` enum('Pagi','Siang','Malam','Lepas','Libur') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `waktu` time NOT NULL,
  `waktu_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_shift`
--

INSERT INTO `tb_shift` (`kode_shift`, `shift`, `waktu`, `waktu_pulang`) VALUES
(1, 'Pagi', '06:00:00', '13:59:59'),
(2, 'Siang', '14:00:00', '21:59:59'),
(3, 'Malam', '22:00:00', '05:59:59'),
(4, 'Lepas', '00:00:00', '00:00:00'),
(5, 'Libur', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tim`
--

CREATE TABLE `tb_tim` (
  `kode_tim` varchar(255) NOT NULL,
  `id_jenis_tim` int NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_tim`
--

INSERT INTO `tb_tim` (`kode_tim`, `id_jenis_tim`, `waktu`) VALUES
('3fdf37d0-b609-11ed-8fc0-dc215c6adf56', 16, '2023-02-27'),
('41c91840-b609-11ed-8fc0-dc215c6adf56', 17, '2023-02-27'),
('43c2ed4c-b609-11ed-8fc0-dc215c6adf56', 18, '2023-02-27'),
('45741914-b609-11ed-8fc0-dc215c6adf56', 19, '2023-02-27'),
('47e9391f-b609-11ed-8fc0-dc215c6adf56', 20, '2023-02-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis_tim`
--

CREATE TABLE `t_jenis_tim` (
  `id_jenis_tim` int NOT NULL,
  `tim` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `t_jenis_tim`
--

INSERT INTO `t_jenis_tim` (`id_jenis_tim`, `tim`) VALUES
(16, 'A'),
(17, 'B'),
(18, 'C'),
(19, 'D'),
(20, 'E'),
(21, 'f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_level`
--

CREATE TABLE `t_level` (
  `id_level` int NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `t_level`
--

INSERT INTO `t_level` (`id_level`, `level`) VALUES
(1, 'perawat'),
(2, 'kepala ruang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_perawat`
--

CREATE TABLE `t_perawat` (
  `kd_perawat` varchar(255) NOT NULL,
  `nira` varchar(255) NOT NULL,
  `nama_perawat` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `t_perawat`
--

INSERT INTO `t_perawat` (`kd_perawat`, `nira`, `nama_perawat`, `alamat`, `no_hp`) VALUES
('04fa9c72-93c1-11ed-a005-dc215c6adf56', '20501018', 'jefranda s modjo', 'mootilango', '0853404440971');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_temp_tim`
--

CREATE TABLE `t_temp_tim` (
  `kode_tim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `t_temp_tim`
--

INSERT INTO `t_temp_tim` (`kode_tim`) VALUES
('3fdf37d0-b609-11ed-8fc0-dc215c6adf56'),
('41c91840-b609-11ed-8fc0-dc215c6adf56'),
('43c2ed4c-b609-11ed-8fc0-dc215c6adf56'),
('45741914-b609-11ed-8fc0-dc215c6adf56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` varchar(255) NOT NULL,
  `kode_perawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `kode_perawat`, `username`, `password`, `id_level`, `status`) VALUES
('211732fb-b6fd-11ed-a17b-dc215c6adf56', '75020501011', 'frangky usman', '202cb962ac59075b964b07152d234b70', 1, 1),
('211737e0-b6fd-11ed-a17b-dc215c6adf56', '75020501013', 'zulkifli', '202cb962ac59075b964b07152d234b70', 1, 1),
('4adb13e0-b6fd-11ed-a17b-dc215c6adf56', '75020501022', 'nia anggraini', '202cb962ac59075b964b07152d234b70', 1, 1),
('4adb1761-b6fd-11ed-a17b-dc215c6adf56', '75020501024', 'rivega', '202cb962ac59075b964b07152d234b70', 1, 1),
('7596a034-b6fd-11ed-a17b-dc215c6adf56', '75020501046', 'maryanto', '202cb962ac59075b964b07152d234b70', 1, 1),
('7596a5e7-b6fd-11ed-a17b-dc215c6adf56', '75020501058', 'dewanti', '202cb962ac59075b964b07152d234b70', 1, 1),
('b43b80c1-b6fd-11ed-a17b-dc215c6adf56', '75020501065', 'sulistiyowati', '202cb962ac59075b964b07152d234b70', 1, 1),
('b43b90af-b6fd-11ed-a17b-dc215c6adf56', '75020501087', 'sri dewi yunita', '202cb962ac59075b964b07152d234b70', 1, 1),
('d5554ded-b6fd-11ed-a17b-dc215c6adf56', '75020501018', 'septiani taidi', '202cb962ac59075b964b07152d234b70', 1, 1),
('d5555562-b6fd-11ed-a17b-dc215c6adf56', '75020501037', 'ummu kalsum', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
('7c686ab7-abc9-11ed-ba21-000a1305122e', 'serlin', 'direktur@gmail.com', 'default.jpg', '$2y$10$/I54rVwku.9dcI6ZZxwAZ.bzFAnQYKSOXDFdplne0n9nDt/VI0O8y', 3, 1, '04:00:00'),
('845aae1b-973c-11ed-8771-dc215c6adf56', 'Lin ahmad', 'operator@gmail.com', 'default.jpg', '$2y$10$/I54rVwku.9dcI6ZZxwAZ.bzFAnQYKSOXDFdplne0n9nDt/VI0O8y', 1, 1, '00:00:00'),
('fdb06f3e-b455-11ed-a933-dc215c6adf56', 'jefranda', 'kruangan@gmail.com', 'default.jpg', '$2y$10$/I54rVwku.9dcI6ZZxwAZ.bzFAnQYKSOXDFdplne0n9nDt/VI0O8y', 2, 1, '06:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'kepala ruang'),
(3, 'direktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nira`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`kode_ruangan`),
  ADD UNIQUE KEY `nama_ruangan` (`nama_ruangan`);

--
-- Indexes for table `tb_anggota_tim`
--
ALTER TABLE `tb_anggota_tim`
  ADD KEY `nira` (`nira`),
  ADD KEY `kd_tim` (`kd_tim`);

--
-- Indexes for table `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  ADD PRIMARY KEY (`kode_konfigurasi`),
  ADD KEY `kode_ruangan` (`kode_ruangan`),
  ADD KEY `kode_shift` (`kode_shift`),
  ADD KEY `kd_anggota` (`kd_tim`);

--
-- Indexes for table `tb_shift`
--
ALTER TABLE `tb_shift`
  ADD PRIMARY KEY (`kode_shift`);

--
-- Indexes for table `tb_tim`
--
ALTER TABLE `tb_tim`
  ADD PRIMARY KEY (`kode_tim`),
  ADD KEY `id_jenis_tim` (`id_jenis_tim`);

--
-- Indexes for table `t_jenis_tim`
--
ALTER TABLE `t_jenis_tim`
  ADD PRIMARY KEY (`id_jenis_tim`);

--
-- Indexes for table `t_level`
--
ALTER TABLE `t_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `t_perawat`
--
ALTER TABLE `t_perawat`
  ADD PRIMARY KEY (`kd_perawat`),
  ADD UNIQUE KEY `nira` (`nira`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kd_perawat` (`kode_perawat`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_shift`
--
ALTER TABLE `tb_shift`
  MODIFY `kode_shift` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_jenis_tim`
--
ALTER TABLE `t_jenis_tim`
  MODIFY `id_jenis_tim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `t_level`
--
ALTER TABLE `t_level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota_tim`
--
ALTER TABLE `tb_anggota_tim`
  ADD CONSTRAINT `tb_anggota_tim_ibfk_1` FOREIGN KEY (`nira`) REFERENCES `pegawai` (`nira`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_tim_ibfk_2` FOREIGN KEY (`kd_tim`) REFERENCES `tb_tim` (`kode_tim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  ADD CONSTRAINT `shift` FOREIGN KEY (`kode_shift`) REFERENCES `tb_shift` (`kode_shift`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_konfigurasi_ibfk_2` FOREIGN KEY (`kode_ruangan`) REFERENCES `rawat_inap` (`kode_ruangan`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_konfigurasi_ibfk_3` FOREIGN KEY (`kd_tim`) REFERENCES `tb_tim` (`kode_tim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `tb_tim`
--
ALTER TABLE `tb_tim`
  ADD CONSTRAINT `tb_tim_ibfk_1` FOREIGN KEY (`id_jenis_tim`) REFERENCES `t_jenis_tim` (`id_jenis_tim`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `level` FOREIGN KEY (`id_level`) REFERENCES `t_level` (`id_level`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `perawat` FOREIGN KEY (`kode_perawat`) REFERENCES `pegawai` (`nira`) ON DELETE RESTRICT ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
