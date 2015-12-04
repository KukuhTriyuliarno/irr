-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2015 pada 15.05
-- Versi Server: 5.5.34
-- Versi PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `dss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_inv`
--

CREATE TABLE IF NOT EXISTS `tbl_inv` (
  `id_inv` int(5) NOT NULL AUTO_INCREMENT,
  `inves` bigint(20) NOT NULL,
  `bunga` int(11) NOT NULL,
  `df1` int(11) NOT NULL,
  `df2` int(11) NOT NULL,
  `irr` double NOT NULL,
  `periode` varchar(30) NOT NULL,
  `kas` varchar(150) NOT NULL,
  `jml_periode` int(5) NOT NULL,
  `rekomen` varchar(10) NOT NULL,
  `yn` enum('y','n') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id_inv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tbl_inv`
--

INSERT INTO `tbl_inv` (`id_inv`, `inves`, `bunga`, `df1`, `df2`, `irr`, `periode`, `kas`, `jml_periode`, `rekomen`, `yn`) VALUES
(4, 10000, 9, 10, 11, 24.34, '1 >> 2 >> 3', '7000 >> 5000 >> 3000', 3, 'Terima', 'n'),
(5, 20000, 10, 11, 12, 24.99, '1 >> 2 >> 3 >> 4', '12000 >> 10000 >> 6000 >> 5000', 4, 'Terima', 'y'),
(6, 100000, 8, 8, 9, 20.97, '1 >> 2 >> 3 >> 4 >> 5', '70000 >> 40000 >> 20000 >> 10000 >> 9000', 5, 'Terima', 'y'),
(8, 300000, 10, 10, 11, 27.67, '1 >> 2 >> 3 >> 4', '200000 >> 150000 >> 100000 >> 90000', 4, 'Terima', 'n'),
(9, 60000, 11, 12, 13, 22.36, '1 >> 2 >> 3 >> 4', '40000 >> 30000 >> 10000 >> 7000', 4, 'Terima', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_run_inv`
--

CREATE TABLE IF NOT EXISTS `tbl_run_inv` (
  `id_run` int(5) NOT NULL AUTO_INCREMENT,
  `id_inv` int(5) NOT NULL,
  `id_not` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl_start` varchar(15) NOT NULL,
  `tgl_finish` varchar(15) NOT NULL,
  PRIMARY KEY (`id_run`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tbl_run_inv`
--

INSERT INTO `tbl_run_inv` (`id_run`, `id_inv`, `id_not`, `id_user`, `tgl_start`, `tgl_finish`) VALUES
(9, 5, 5, 2, '2015-11-21', '2019-11-21'),
(10, 0, 6, 6, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address` varchar(35) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fb` varchar(25) NOT NULL,
  `twitter` varchar(25) NOT NULL,
  `level` enum('admin','eksekutif') NOT NULL DEFAULT 'eksekutif',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `fname`, `lname`, `address`, `email`, `phone`, `fb`, `twitter`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'ok', 'admin', 'admin@gmail.com', '085642000000', 'admin', 'admin', 'admin'),
(2, 'kukuh', 'a2f995b2f42394ea0358748fc0d738bad0780883', 'Kukuh', 'Triyuliarno', 'Tegal', 'kukuh@gmail.com', '085642590466', 'kukuh', 'kukuh', 'eksekutif'),
(6, 'pelanggan', '597a445e77ecd913c415f2010823b7dc8095ec5c', 'pelanggan', 'ok', 'pelanggan', 'pelanggan@gmail.com', '089677777777', 'pelanggan', 'pelanggan', 'eksekutif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
