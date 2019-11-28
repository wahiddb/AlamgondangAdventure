-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Nov 2019 pada 18.24
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alamgondang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `alamat`, `email`, `password`) VALUES
(1, 'Wahid', 'karanganyar', 'wahid@gmail.com', '2b1ddf586a8155d1b59c26c087128380');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `stok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id_alat`, `nama`, `harga`, `stok`) VALUES
(1, 'Matras', '3000', '23'),
(2, 'Sleeping Bag', '5000', '20'),
(3, 'Headlamp', '5000', '10'),
(4, 'Handy Talky', '15000', '10'),
(5, 'Gas Portabel', '8000', '15'),
(6, 'Kompor Portabel', '6000', '15'),
(7, 'Megaphone', '20000', '4'),
(8, 'Tenda Dom 2-3 Orang', '15000', '5'),
(9, 'Tenda Dom 4-8 Orang', '40000', '3'),
(10, 'Nesting', '6000', '10'),
(11, 'Jaket Polar', '10000', '20'),
(12, 'Sepatu Gunung', '20000', '10'),
(13, 'Sandal Gunung', '10000', '10'),
(14, 'Tas Carrier 60L-80L', '20000', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `no_ktp` bigint(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`no_ktp`, `nama`, `alamat`, `no_hp`) VALUES
(21120117130042, 'Wahid Dwipa B', 'Tawangmangu', '083866290456'),
(21120117130082, 'Tangguh Tri P.', 'Semarang', '085789746003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_order` int(3) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_ktp` bigint(30) NOT NULL,
  `id_alat` int(3) NOT NULL,
  `jml` int(3) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_order`, `tgl_pinjam`, `tgl_kembali`, `no_ktp`, `id_alat`, `jml`, `total`) VALUES
(1, '2019-11-27', '2019-11-28', 21120117130082, 1, 1, '3000'),
(2, '2019-11-30', '2019-12-01', 21120117130042, 1, 2, '6000'),
(3, '2019-11-29', '2019-11-30', 21120117130082, 1, 2, '6000'),
(4, '2019-11-27', '2019-11-28', 21120117130082, 1, 2, '6000'),
(5, '2019-11-30', '2019-12-01', 21120117130082, 1, 2, '6000'),
(6, '2019-11-27', '2019-11-28', 21120117130042, 7, 1, '20000');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi` (
`id_order` int(3)
,`nama` varchar(100)
,`no_ktp` bigint(30)
,`alat` varchar(50)
,`jml` int(3)
,`harga` varchar(20)
,`tgl_sewa` date
,`tgl_kembali` date
,`total` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS  select `transaksi`.`id_order` AS `id_order`,`penyewa`.`nama` AS `nama`,`penyewa`.`no_ktp` AS `no_ktp`,`alat`.`nama` AS `alat`,`transaksi`.`jml` AS `jml`,`alat`.`harga` AS `harga`,`transaksi`.`tgl_pinjam` AS `tgl_sewa`,`transaksi`.`tgl_kembali` AS `tgl_kembali`,`transaksi`.`total` AS `total` from ((`transaksi` join `penyewa` on(`penyewa`.`no_ktp` = `transaksi`.`no_ktp`)) join `alat` on(`transaksi`.`id_alat` = `alat`.`id_alat`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_penyewa` (`no_ktp`),
  ADD KEY `id_alat` (`id_alat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_order` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_alat` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`),
  ADD CONSTRAINT `fk_penyewa` FOREIGN KEY (`no_ktp`) REFERENCES `penyewa` (`no_ktp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
