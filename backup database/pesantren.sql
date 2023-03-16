-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2022 pada 19.49
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesantren`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `nama_berkas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_santri`, `nama_berkas`) VALUES
(2, 2, '61b5b0926bbbe.pdf'),
(3, 3, '61bd9e3e498e9.pdf'),
(4, 4, '61bd9e66eed03.pdf'),
(5, 5, '61e6ed0acb045.pdf'),
(6, 6, '61e6ed8f799c5.pdf'),
(7, 7, '61e6edf6d896d.pdf'),
(8, 8, '61e6ee5411756.pdf'),
(9, 9, '61e6eed24e869.pdf'),
(10, 10, '61e6ef2ef363f.pdf'),
(11, 11, '61e6efa6b1bfb.pdf'),
(12, 12, '61e6f026d0a95.pdf'),
(13, 13, '61e6f187e60aa.pdf'),
(14, 14, '61e6f272f135c.pdf'),
(15, 15, '61e6f305dfb67.pdf'),
(16, 16, '61e6f3a9bb641.pdf'),
(17, 17, '61e6f44374954.pdf'),
(18, 18, '61e6f4b38ae42.pdf'),
(19, 19, '61e6f51956678.pdf'),
(20, 20, '61e6f5b070243.pdf'),
(21, 21, '61e6f61c5e39b.pdf'),
(22, 22, '61e6f68a0b02e.pdf'),
(23, 23, '61e6f73a55398.pdf'),
(24, 24, '61e6f794233e1.pdf'),
(25, 25, '61e6f83b4e0b8.pdf'),
(26, 26, '61e6f89d56b71.pdf'),
(27, 27, '61e6f8f91398e.pdf'),
(28, 28, '61e6fdc916068.pdf'),
(29, 29, '61e6fe253b21b.pdf'),
(30, 30, '61e6fe8e747bf.pdf'),
(31, 31, '61e6feffc49b6.pdf'),
(32, 32, '61e6ff515d3c7.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `nama_kamar` varchar(40) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_santri`, `nama_kamar`, `keterangan`) VALUES
(2, 3, 'Kamar B2', 'Sebelah'),
(3, 17, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(4, 27, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(5, 23, 'AL-IMRON', 'Kamar Santri Baru'),
(6, 15, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(7, 12, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(8, 31, 'AL-IMRON', 'Kamar Santri Baru'),
(9, 21, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(10, 11, 'AL-IMRON', 'Kamar Santri Baru'),
(11, 25, 'AL-IMRON', 'Kamar Santri Baru'),
(12, 26, 'AL-IMRON', 'Kamar Santri Baru'),
(13, 5, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(14, 29, 'AL-IMRON', 'Kamar Santri Baru'),
(15, 30, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(16, 18, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(17, 32, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(18, 19, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(19, 10, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(20, 7, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(21, 20, 'AL-IMRON', 'Kamar Santri Baru'),
(22, 14, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(23, 13, 'AL-IMRON', 'Kamar Santri Baru'),
(24, 6, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(25, 24, 'AL-IMRON', 'Kamar Santri Baru'),
(26, 28, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(27, 9, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(28, 22, 'AL-MA\'MUN', 'Kamar Santri Baru'),
(29, 8, 'AL-MUNAWIR', 'Kamar Santri Baru'),
(30, 16, 'AL-MUNAWIR', 'Kamar Santri Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_santri`, `nama_kelas`) VALUES
(2, 3, '7a'),
(3, 17, 'IBTIDA\''),
(4, 27, 'IBTIDA\''),
(5, 23, 'ALFIYAH'),
(6, 15, 'IMRITI'),
(7, 12, 'IBTIDA\''),
(8, 31, 'ALFIYAH'),
(9, 21, 'IBTIDA\''),
(10, 11, 'ALFIYAH'),
(11, 25, 'ALFIYAH'),
(12, 26, 'ALFIYAH'),
(13, 5, 'ALFIYAH'),
(14, 29, 'IBTIDA\''),
(15, 30, 'IBTIDA\''),
(16, 18, 'ALFIYAH'),
(17, 32, 'IBTIDA\''),
(18, 19, 'ALFIYAH'),
(19, 10, 'IBTIDA\''),
(20, 7, 'IBTIDA\''),
(21, 20, 'ALFIYAH'),
(22, 14, 'ALFIYAH'),
(23, 13, 'ALFIYAH'),
(24, 6, 'ALFIYAH'),
(25, 24, 'ALFIYAH'),
(26, 28, 'IBTIDA\''),
(27, 9, 'ALFIYAH'),
(28, 22, 'IMRITI'),
(29, 8, 'IBTIDA\''),
(30, 16, 'ALFIYAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_santri`, `tanggal_daftar`, `status`) VALUES
(2, 3, '2021-12-18', 1),
(3, 4, '2021-12-18', 1),
(4, 5, '2022-01-18', 1),
(5, 6, '2022-01-18', 1),
(6, 7, '2022-01-18', 1),
(7, 8, '2022-01-18', 1),
(8, 9, '2022-01-18', 1),
(9, 10, '2022-01-18', 1),
(10, 11, '2022-01-18', 1),
(11, 12, '2022-01-18', 1),
(12, 13, '2022-01-18', 1),
(13, 14, '2022-01-19', 1),
(14, 15, '2022-01-19', 1),
(15, 16, '2022-01-19', 1),
(16, 17, '2022-01-19', 1),
(17, 18, '2022-01-19', 1),
(18, 19, '2022-01-19', 1),
(19, 20, '2022-01-19', 1),
(20, 21, '2022-01-19', 1),
(21, 22, '2022-01-19', 1),
(22, 23, '2022-01-19', 1),
(23, 24, '2022-01-19', 1),
(24, 25, '2022-01-19', 1),
(25, 26, '2022-01-19', 1),
(26, 27, '2022-01-19', 1),
(27, 28, '2022-01-19', 1),
(28, 29, '2022-01-19', 1),
(29, 30, '2022-01-19', 1),
(30, 31, '2022-01-19', 1),
(31, 32, '2022-01-19', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `bidang` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `hak_akses` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `email`, `password`, `nama`, `bidang`, `tanggal_lahir`, `alamat`, `no_hp`, `hak_akses`) VALUES
(3, 'Pengurus@gmail.com', '$2y$10$0RMsFq9jodiUBgcxJhjOoe65b3G6aRYE1auE7osOlSq5FmuNNt6Ui', 'Pengurus', 'Pengurus', '2021-12-02', 'Sleman Jogjakarta', '0891234', 'Pengurus'),
(4, 'Pemimpin@gmail.com', '$2y$10$cXeDrvmW68uIZNZK6IA2PuCSKG6UmBjc/WJRs1Mfx6kEsDyweH6Za', 'Suhardi', 'Pemimpin', '2022-01-17', 'Sleman', '089123', 'Pimpinan'),
(5, 'Faisalbasri08@gmail.com', '$2y$10$h/QPsY3Dh6SDsWCLb6G94OUcaQy/DtlhatmG4w5pyTOvMZIl0Mowm', 'Muhamad Faisal Basri', 'Kependidikan', '1998-06-24', 'Cangaan Genteng Banyuwangi', '082330301930', 'Pengurus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `id_wali_santri` int(11) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id_santri`, `id_wali_santri`, `nama`, `jk`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_hp`) VALUES
(3, 2, 'Santri Baru', 'Laki - Laki', 'Sleman', 'Sleman', '2021-12-18', '089123'),
(4, 2, 'Santri Kedua', 'Perempuan', 'Sleman', 'Sleman', '2021-12-11', '081231'),
(5, 10, 'Atoifan Nawawi', 'Laki - Laki', 'Wonolelo\r\nkec. Wonosobo\r\nkabupaten Wonosobo\r\njawa Tengah\r\n', 'Wonosobo', '1999-06-15', '08114321578'),
(6, 11, 'Mslamet Fahmi', 'Laki - Laki', 'Kec.jogoroto\r\nkabupaten Jombang\r\njawa Timur\r\n', 'Jombang ', '2000-07-06', '0811481658'),
(7, 12, 'Ilham Nazil Furqon', 'Laki - Laki', 'Kerek\r\nmargomulyo\r\nkec. Ngawi\r\nkabupaten Ngawi\r\njawa Timur\r\n', 'Ngawi', '1998-07-29', '08114340354'),
(8, 13, 'Rifki Anjar', 'Laki - Laki', 'Ngringin\r\ncondongcatur\r\nkec. Depok\r\nkabupaten Sleman\r\ndaerah Istimewa Yogyakarta\r\n', 'Sleman', '1998-02-23', '08114342960'),
(9, 14, 'Nawawi Hakim', 'Laki - Laki', 'Plaosan\r\npurworejo\r\nkec. Purworejo\r\nkabupaten Purworejo\r\njawa Tengah\r\n', 'Purworejo', '1998-02-19', '081287790232'),
(10, 14, 'Ibrahim Ainul Yaqin', 'Laki - Laki', 'Pakualaman\r\nkota Yogyakarta\r\ndaerah Istimewa Yogyakarta\r\n', 'Yogyakarta', '1995-06-21', '08124458463'),
(11, 16, 'Aji Susilo', 'Laki - Laki', 'Medono\r\nkec. Pekalongan Bar.\r\nkota Pekalongan\r\njawa Tengah\r\n', 'Pekalongan', '1997-02-13', '08124492649'),
(12, 17, 'Adzani Al Qobit', 'Laki - Laki', 'Karangrejo\r\nkec. Banyuwangi\r\nkabupaten Banyuwangi\r\njawa Timur\r\n', 'Banyuwangi', '2003-02-20', '081388111148'),
(13, 18, 'Mjauharawalul', 'Laki - Laki', 'Kec. Mojowarno\r\nkabupaten Jombang\r\njawa Timur\r\n', 'Jombang ', '1998-06-17', '085342013279'),
(14, 19, 'M Zayadi', 'Laki - Laki', 'Semaki\r\nkec. Umbulharjo\r\nkota Yogyakarta\r\ndaerah Istimewa Yogyakarta\r\n', 'Yogyakarta', '1999-06-09', '085256886986'),
(15, 20, 'Adit Fkrowan Jailani', 'Laki - Laki', 'Tanamodindi\r\nkec. Palu Sel.\r\nkota Palu\r\nsulawesi Tengah\r\n', 'Palu', '1996-06-05', '085240429085'),
(16, 21, 'Wildan Nurhadi', 'Laki - Laki', 'Klegen\r\nkec. Kartoharjo\r\nkota Madiun\r\njawa Timur\r\n', 'Madiun', '1999-06-24', '08114308149'),
(17, 22, 'Abdul Aziz', 'Laki - Laki', 'Sukorejo\r\nkec. Bangsalsari\r\nkabupaten Jember\r\njawa Timur\r\n', 'Jember', '2006-02-21', '085218945770'),
(18, 23, 'Fajrud Dhuha', 'Laki - Laki', 'Perbon\r\nkec. Tuban\r\nkabupaten Tuban\r\njawa Timur\r\n', 'Tuban', '2002-05-28', '08114308149'),
(19, 24, 'Fauqi Al Amin', 'Laki - Laki', 'Taman\r\nkec. Taman\r\nkota Madiun\r\njawa Timur\r\n', 'Madiun', '2003-06-11', '085242088064'),
(20, 26, 'M Alfa Rayyan Fahmi', 'Laki - Laki', 'Rw. 02\r\nsuwawal Tim.\r\npakis Aji\r\nkabupaten Jepara\r\njawa Tengah\r\n', 'Jepara', '1998-10-23', '08114321578'),
(21, 27, 'Ahmad Nafi Fadli', 'Laki - Laki', 'Rw. 02, Suwawal Tim., Pakis Aji, Kabupaten Jepara, Jawa Tengah 59452', 'Jepara', '1994-10-14', '082111112426'),
(22, 28, 'Ridho Dinata', 'Laki - Laki', 'Kedamaian Kota Bandar Lampung Lampung', 'Lampung', '1995-10-20', '085298835555'),
(23, 29, 'Abu Syamsudin', 'Laki - Laki', 'Kerek\r\nmargomulyo\r\nkec. Ngawi\r\nkabupaten Ngawi\r\njawa Timur\r\n', 'Ngawi', '1999-02-10', '081377103091'),
(24, 30, 'Muhammad Munawir', 'Laki - Laki', 'Ringin Ardi\r\nkarangsari\r\nkec. Pengasih\r\nkabupaten Kulon Progo\r\ndaerah Istimewa Yogyakarta\r\n', 'Kulonprogo', '1995-06-28', '08124400713'),
(25, 31, 'Akbar Setya', 'Laki - Laki', 'Bantul\r\nKec. Bantul\r\nKabupaten Bantul\r\nDaerah Istimewa Yogyakarta\r\n', 'Bantul', '1996-06-12', '081287561167'),
(26, 32, 'Alifudin Annur', 'Laki - Laki', 'Dukuh\r\nKebumen\r\nKec. Kebumen\r\nKabupaten Kebumen\r\nJawa Tengah\r\n', 'Kebumen', '1997-10-22', '081316436408'),
(27, 33, 'Abshon Muluki', 'Laki - Laki', 'Penganjuran\r\nKec. Banyuwangi\r\nKabupaten Banyuwangi\r\nJawa Timur\r\n', 'Banyuwangi', '1998-06-17', '08124310133'),
(28, 34, 'Muhammad Nur Ali', 'Laki - Laki', 'Perbon\r\nKec. Tuban\r\nKabupaten Tuban\r\nJawa Timur\r\n', 'Tuban', '1996-07-16', '085240748282'),
(29, 35, 'Didik Sepuden', 'Laki - Laki', 'Banjaran\r\nBangsri\r\nKabupaten Jepara\r\nJawa Tengah\r\n', 'Jepara', '1997-02-20', '08385851960'),
(30, 36, 'Dimas Andriyan', 'Laki - Laki', 'Penganjuran\r\nKec. Banyuwangi\r\nKabupaten Banyuwangi\r\nJawa Timur\r\n', 'Banyuwangi', '1997-06-19', '08124310950'),
(31, 37, 'Ahmad Fahmi', 'Laki - Laki', 'Semaki\r\nKec. Umbulharjo\r\nKota Yogyakarta\r\nDaerah Istimewa Yogyakarta\r\n', 'Yogyakarta', '1995-10-18', '081343809996'),
(32, 38, 'Farhan Rio', 'Laki - Laki', 'Mulyoharjo II\r\nMulyoharjo\r\nKec. Jepara\r\nKabupaten Jepara\r\nJawa Tengah\r\n', 'Jepara', '1998-06-10', '08134458463');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` varchar(15) NOT NULL,
  `id_santri` int(11) DEFAULT NULL,
  `nama_tagihan` varchar(50) DEFAULT NULL,
  `batas_pembayaran` date DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_santri`, `nama_tagihan`, `batas_pembayaran`, `harga`, `pdf`, `status`) VALUES
('1YEG0K2BERE8LLK', 26, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/d9bd943d-9597-496e-b9e3-4078ea88f047/pdf', 1),
('2RCH8CNKYZ6T2SM', 30, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/261b1d69-5960-4943-a6ab-cffb5cbf29e7/pdf', 1),
('2S3EFS4HJVNURJ4', 32, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/492b6749-1b12-47eb-8a1d-4d21e2a90a59/pdf', 1),
('3JVH6QDLHOU1EJT', 20, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/f0ce49b4-2880-45b9-9463-0851c2e6f7a1/pdf', 1),
('4D635GLUCLWP4ED', 18, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/51e1eb12-90d4-4616-9696-ed95a57a722b/pdf', 1),
('4V6CF04T7ESZ1M8', 10, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/b1c5b579-8c55-48cb-9b98-415c566cebc3/pdf', 1),
('708QVHRFLEBEK82', 12, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/ac8db9f6-7a29-4d4f-968b-81106c253a2e/pdf', 1),
('A72HCHQIGI13Q1B', 6, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/4be796a8-69d2-4fc6-97de-e51609b70c0a/pdf', 1),
('A8Q9FPCB5SCJLIN', 19, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/26608b0a-2865-4b92-811f-d2a1aa4b0e33/pdf', 1),
('AX7WLPM7LJH5HTR', 17, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/3ba3921f-a2e4-495b-8df1-258933c4bbf5/pdf', 1),
('B6EAJY6HPARBTMC', 9, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/228c700f-f474-4960-b60a-1c02d17f810b/pdf', 1),
('C602GJ51ZMMO4CX', 28, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/c2df28c4-4c59-48c6-a357-bbe3070a2a73/pdf', 1),
('D2NOJ51YH2QNDL3', 27, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/517226b2-66e2-4e24-acea-fec8f74693b5/pdf', 1),
('G0A1DRK5F9TVSF0', 14, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/415f1272-c3f4-49f7-981e-c38326a05ea8/pdf', 1),
('GUXJDMONCX6HUZP', 23, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/b07eedd7-1e86-4d23-9864-0298872e155d/pdf', 1),
('IFJ66GQH6OF2ZGB', 11, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/ae0d34f7-7dfc-4ec0-ab6a-ab30f5269241/pdf', 1),
('IHN6FVGXTMMKON2', 24, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/e49405c1-0108-4130-af01-66cdf7e69dc1/pdf', 1),
('IK1BWN2L7LDB4XL', 29, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/d1b67fb5-3a2a-4b82-b426-16d150bf4146/pdf', 1),
('JPIHE0SW590E7AJ', 16, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/22df8096-6636-457c-bbe9-681ec317e333/pdf', 1),
('KUN4MDZKZZTCIDQ', 31, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/20fd03cb-2992-4a4d-9b95-46b9f24c7509/pdf', 1),
('LAOLDHILB80IKDP', 8, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/d26b7d8a-a46b-406a-9498-a0f46e6be125/pdf', 1),
('M3WXN3EV72YP4Y1', 22, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/16a63c73-0333-4595-9314-c6316f7d92f9/pdf', 1),
('N32JHG1TRH9TXNV', 5, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/4e12b5ac-d810-4f24-9fe2-f6e4429b4c78/pdf', 1),
('NFJRRY9AKQQJWNI', 7, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/5853e896-c6cb-494c-bf85-55b1d6384bd8/pdf', 1),
('PC4VNG3FNY81U17', 25, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/a2a2f286-d7dd-4b04-bf17-ea2c24fd6f00/pdf', 1),
('Q29C1XO6V5IH5I6', 15, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/9299881f-f41f-4b79-91a3-3e684af551fe/pdf', 0),
('SXISLHJANZMOO6T', 13, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/7c0b9984-e6a1-46e0-9983-a3a2e6d45404/pdf', 0),
('TS6XONEROSVFOW8', 3, 'Pembayaran Santri Baru', '2021-12-25', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/b73f0289-7b69-4f29-ae28-f03c0863db35/pdf', 1),
('V9W0PNNYWBBD044', 21, 'Pembayaran Santri Baru', '2022-01-26', 1500000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/29d191b2-2daa-4c30-8dbc-8f193a4251d2/pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal_pendaftaran`
--

CREATE TABLE `tanggal_pendaftaran` (
  `id_tanggal_pendaftaran` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggal_pendaftaran`
--

INSERT INTO `tanggal_pendaftaran` (`id_tanggal_pendaftaran`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, '2022-01-18', '2022-03-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_santri`
--

CREATE TABLE `wali_santri` (
  `id_wali_santri` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wali_santri`
--

INSERT INTO `wali_santri` (`id_wali_santri`, `nama`, `email`, `password`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_hp`) VALUES
(2, 'Wali Santri', 'Walisantri@gmail.com', '$2y$10$uveYR0lQMnZ46iZ8pT0u2eBSdCuQ5tEiJHI1bBP.Rq56mkXzgvfW6', 'Jepara No 23', 'Jepara', '2021-12-02', '089123'),
(4, 'Tests', 'Test@gmail.com', '$2y$10$Rb7/bYsE9dArpwlWlSbjKO.f8gS79boRDcHT5sMFpAhGKkjCmAOSG', 'Jepara', 'Jepara', '2021-12-11', '081923'),
(5, 'JUMADI', 'Jumadi@gmail.com', '$2y$10$/hgHlbvVPDJS.reD8tn.X.5pYYbkzXGw0SKDWUfnfLK8EJijahmiW', 'Pringgokusuman Gedong Tengen Kota Yogyakarta Daerah Istimewa Yogyakarta', 'Yogyakarta', '1987-01-16', '08124310163'),
(6, 'Kasno', 'Kasno@gmail.com', '$2y$10$heiC9jKpDLDSAS5n42pOM.wWjlAfTEAKCezf6WxZGCyXyh77KcZX2', 'Pendem Sidomulyo Kec. Pengasih Kabupaten Kulon Progo Daerah Istimewa Yogyakarta', 'Kulonprogo', '1976-02-20', '08114332247'),
(7, 'Taufiqashari', 'Asharitaufiq68@gmail.com', '$2y$10$APnCPcGjs/GkZnPZ4tIIIOBqJrmxr55SrUaE8j.6HGSMlUCrKXIuO', 'Cangaan, Genteng,banyuwangi', 'Banyuwangi', '1999-02-12', '0876645452'),
(8, 'Sikem Karto ', 'Semito@gmail.com', '$2y$10$a9ZJiwdKtW4YtE5NIJ9Z6e0wmjIpG7PJBcaFwwLGSN9zPVZsSFmmu', 'Macangaeng Gunungsimping Kec.cilacap Tengah Kabupaten Cilacap Jawa Tengah', 'Cilacap', '1988-02-17', '08114332275'),
(9, 'Suprihasri', 'Suprihasri@gmail.com', '$2y$10$G8YShoSCc6lD9hYQqw4uLe8aZEy0pNIyTDafTMR5g2Fx6A4ZcPrLC', 'Sawah Doplang Kec. Purworejo Kabupaten Purworejo Jawa Tengah', 'Purworejo', '1990-06-27', '0813407866248'),
(10, 'Cokro Winarno Sutar', 'Cokrowinarnosutar@gmail.com', '$2y$10$VTs1DxXrdQCSps1KtINNz.GrTYuYjK/cUbsIRP4WI3DhkS2SpKb6C', 'Wonolelo Kec. Wonosobo Kabupaten Wonosobo Jawa Tengah', 'Wonosobo', '1986-05-20', '08114321578'),
(11, 'Suparjo', 'Suparjo@gmail.com', '$2y$10$g6eWcjbSQOJeS32ooHkXWuw9MLaa3loWZajEVnN4jkwW2G9NiSNP2', 'Kec.jogoroto Kabupaten Jombang Jawa Timur', 'Jombang ', '1989-06-15', '0811481658'),
(12, 'Wartono ', 'Wartono@gmail.com', '$2y$10$z2/vCB0b9lSMvhA2txW9b.Gf9cT/lFaykNXsGWtPz1XCxvSRtr4GS', 'Kerek Margomulyo Kec.ngawi Kabupaten Ngawi Jawa Timur', 'Ngawi', '1985-11-14', '08114340354'),
(13, 'Mardiyono ', 'Mardiyono@gmail.com', '$2y$10$.KDejyqElqlW9q2gMc/Q3O0xRzDTjEzV7yz84K7waUhuY.xr4dTRG', 'Ngringin Condongcatur Kec. Depok Kabupaten Sleman Daerah Istimewa Yogyakarta', 'Sleman', '1980-10-31', '08114342960'),
(14, 'Suwarsi ', 'Suwarsi@gmail.com', '$2y$10$5Rp7opT5Cebrc6PBzdwm7urMShjlKIPFS8AA.iz4o7ug3y4BuyJy2', 'Plaosan Purworejo Kec. Purworejo Kabupaten Purworejo Jawa Tengah', 'Purworejo', '1987-10-13', '081287790232'),
(15, 'Sriyanto ', 'Sriyanto@gmail.com', '$2y$10$e/zUa863MDafhzBs/bbFD.ZEjdX8b9KsVgzbUQwvnmAs1TRVBiWBu', 'Pakualaman Kota Yogyakarta Daerah Istimewa Yogyakarta', 'Yogyakarta', '1977-06-28', '08124458463'),
(16, 'Heri Kusmantoro ', 'Herikusmantoro@gmail.com', '$2y$10$edLce3/Fx6moEwGfl/ZqTeZDAnZ1rUoSP8T/4F7mgUGGYg6EN4B4e', 'Medono Kec. Pekalongan Bar. Kota Pekalongan Jawa Tengah', 'Pekalongan', '1978-06-30', '08124492649'),
(17, 'Wagino', 'Wagino@gmail.com', '$2y$10$pVRrV3wir3fTL0WPQBRW7eYFH12Oc2AE.cDUtscxiwSnuOgRoVZxW', 'Karangrejo Kec. Banyuwangi Kabupaten Banyuwangi Jawa Timur', 'Banyuwangi', '1976-05-12', '081388111148'),
(18, 'Suparmi', 'Suparmi@gmail.com', '$2y$10$K.bUPIc4tqeyjkS34Pg1.etI.IZTz1LbQncdOk.5/cDdTK5Esi8A2', 'Kec.mojowarno Kabupaten Jombang Jawa Timur', 'Jombang ', '1970-06-19', '085342013279'),
(19, 'Wayem ', 'Wayem@gmail.com', '$2y$10$QPF3NRX8ZX3D1DmOOaS3ne/FOlKwXHrH5oxyCCpe7gIfpW3BNESEa', 'Semaki Kec. Umbulharjo Kota Yogyakarta Daerah Istimewa Yogyakarta', 'Yogyakarta', '1980-06-27', '085256886986'),
(20, 'Atmopawiro Loso ', 'Atmopawiroloso@gmail.com', '$2y$10$suzu9xIiT6ukX3XTUR4yq.E1z5VYNKadwv1mvDW4BLMcn.SqkoPzG', 'Tanamodindi Kec. Palu Sel. Kota Palu Sulawesi Tengah', 'Palu', '1983-06-23', '085240429085'),
(21, 'Sutardi ', 'Sutardi@gmail.com', '$2y$10$mVu6.mB5Ojn7VTM7fv0/leEcgG29pH7uDhjkdcVK.65BH0Ity0HBy', 'Klegen Kec. Kartoharjo Kota Madiun Jawa Timur', 'Madiun', '1981-06-29', '08114308149'),
(22, 'Sawi', 'Sawi@gmail.com', '$2y$10$OXscarONEYAlYTIRHIf5IOsh96Q7cUcuir7oahOCOFqSujrqHOZQa', 'Sukorejo Kec. Bangsalsari Kabupaten Jember Jawa Timur', 'Jember', '1982-06-17', '085218945770'),
(23, 'Sowo', 'Sowo@gmail.com', '$2y$10$x4nIJnpVxK1F8/SK.gA22uBhG3uXrbWz1UaELbKIB8sGsuEWctNCi', 'Perbon Kec. Tuban Kabupaten Tuban Jawa Timur', 'Tuban', '1985-05-15', '08114308149'),
(24, 'Trubus', 'Trubus@gmail.com', '$2y$10$fm10/6GcTfZ3toPsyL3ukOrLDDPm78kJDJ5JMeOzCrO.rurfqnEUe', 'Taman Kec. Taman Kota Madiun Jawa Timur', 'Madiun', '1973-10-11', '085242088064'),
(25, 'Mardi ', 'Mardi@gmail.com', '$2y$10$2k0fdtbW4r2SjRc4DBe/y.z6BIHw4KRiLNqvXTmxNwrzdzBsW/c2m', 'Karangrejo, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68411', 'Banyuwangi', '1968-06-06', '08124310287'),
(26, 'Wagiyem ', 'Wagiyem@gmail.com', '$2y$10$lgxLmwPouh4cuz8ExV57NeFZBiG6otYhBpr6f9ySS.05otG2bUGEa', 'Rw. 02 Suwawal Tim. Pakis Aji Kabupaten Jepara Jawa Tengah', 'Jepara', '1989-06-16', '08114321578'),
(27, 'Arjo Suwito ', 'Arjosuwito@gmail.com', '$2y$10$Mxp6ZcTpH2XDVrtbM/xTDuSyKdt8M9/pXHGfxPKs8cLiQoW7zmCJy', 'Rw. 02, Suwawal Tim., Pakis Aji, Kabupaten Jepara, Jawa Tengah 59452', 'Jepara', '1988-07-21', '082111112426'),
(28, 'Wiryo Pawiro Panut ', 'Wiryopawiropanut@gmail.com', '$2y$10$U4BfEGODouaYYcZv5aaz9OpzF31GXDkM3NkoWRQWYLqmGmMa.xWz2', 'Kedamaian Kota Bandar Lampung Lampung', 'Lampung', '1995-06-13', '085298835555'),
(29, 'Kusmantono', 'Kusmantono@gmail.com', '$2y$10$RIxOq7LAhNCfNC8dq81HSOwJ1x6Ss848bZXpOQYXbzkRaw2oVzPSa', 'Kerek Margomulyo Kec. Ngawi Kabupaten Ngawi Jawa Timur', 'Ngawi', '1989-06-07', '081377103091'),
(30, 'Rebo', 'Rebo@gmail.com', '$2y$10$J0lyR4H8z8BAci7Z.Clmd./uFBdZz0Dd2mG2exXB7Xm9BGk3SOa2m', 'Ringin Ardi Karangsari Kec. Pengasih Kabupaten Kulon Progo Daerah Istimewa Yogyakarta', 'Kulonprogo', '1987-06-25', '08124400713'),
(31, 'Partinah', 'Partinah@gmail.com', '$2y$10$t9mYb/W/3SjnQg.AeQ7DqOvoscAZvxXRO6Kg0xC/ovTuLZ/n1Mxta', 'Teruman Bantul Kec. Bantul Kabupaten Bantul Daerah Istimewa Yogyakarta', 'Bantul', '1976-06-25', '081287561167'),
(32, 'Suwarno', 'Suwarno@gmail.com', '$2y$10$szzLGWytYVcD034zuIysKOdV8P.HUbKFk8zt6GC9SZVFFZO8PqCSm', 'Dukuh Kebumen Kec. Kebumen Kabupaten Kebumen Jawa Tengah', 'Kebumen', '1980-06-11', '081316436408'),
(33, 'Slamet Masduqi Thoyyib', 'Slametmasduqithoyyib@gmail.com', '$2y$10$XdLAayztShDb1jBTKhDQIuI5fReg0t2K6rvgmXmk9DdH0ySKTyxHK', 'Penganjuran Kec. Banyuwangi Kabupaten Banyuwangi Jawa Timur', 'Banyuwangi', '1976-06-22', '08124310133'),
(34, 'Onesimus Marsono', 'Onesimusmarsono@gmail.com', '$2y$10$Q27QzE.nO1fvGBiHOuaGueV2SFQYRRrKrBzHWU38GDUewCUvrIChC', 'Perbon Kec. Tuban Kabupaten Tuban Jawa Timur', 'Tuban', '1989-06-14', '08114332274'),
(35, 'Sutrismi', 'Sutrismi@gmail.com', '$2y$10$vTW4EG2FDACPGEl1W88vue9wrhbJm7gjsupmsqNZrkZ8siWN9Gj1y', 'Banjaran Bangsri Kabupaten Jepara Jawa Tengah', 'Jepara', '1997-10-30', '08124310133'),
(36, 'Krisharnawan', 'Krisharnawan@gmail.com', '$2y$10$Wo95qIskzIpNrv/q5pC0P.gGAqxUdrCIn2MVeHXziN10yFDvricMi', 'Penganjuran Kec. Banyuwangi Kabupaten Banyuwangi Jawa Timur', 'Banyuwangi', '1997-06-18', '08124310950'),
(37, 'Yati', 'Yati@gmail.com', '$2y$10$XM1/uHv3Qt557uRCCYEEWO6u9OTzQO66MLtTL/ynCdprUV4Dc2Sky', 'Semaki Kec. Umbulharjo Kota Yogyakarta Daerah Istimewa Yogyakarta', 'Yogyarta', '1996-10-17', '08114308149'),
(38, 'Sunarto', 'Sunarto@gmail.com', '$2y$10$dQcUkupKyMmM4slZrA9YNeYgc.3HpfcdLFL0eOsut7XnKlKur5jjO', 'Mulyoharjo II Mulyoharjo Kec. Jepara Kabupaten Jepara Jawa Tengah', 'Jepara', '1998-07-14', '08114321578');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indeks untuk tabel `tanggal_pendaftaran`
--
ALTER TABLE `tanggal_pendaftaran`
  ADD PRIMARY KEY (`id_tanggal_pendaftaran`);

--
-- Indeks untuk tabel `wali_santri`
--
ALTER TABLE `wali_santri`
  ADD PRIMARY KEY (`id_wali_santri`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tanggal_pendaftaran`
--
ALTER TABLE `tanggal_pendaftaran`
  MODIFY `id_tanggal_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wali_santri`
--
ALTER TABLE `wali_santri`
  MODIFY `id_wali_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
