-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jan 2017 pada 06.49
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE IF NOT EXISTS `anggaran` (
  `id` int(6) NOT NULL,
  `periode` int(4) NOT NULL,
  `ukm` int(6) NOT NULL,
  `anggaran` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`id`, `periode`, `ukm`, `anggaran`) VALUES
(13, 2017, 3, 1500000),
(14, 2017, 4, 3000000),
(15, 2017, 5, 5000000),
(16, 2017, 6, 2500000),
(17, 2017, 7, 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keperluan`
--

CREATE TABLE IF NOT EXISTS `keperluan` (
  `id` int(6) NOT NULL,
  `keperluan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keperluan`
--

INSERT INTO `keperluan` (`id`, `keperluan`) VALUES
(1, 'Beli Aset'),
(2, 'Biaya Sewa'),
(3, 'Honor Pelatih'),
(5, 'Biaya Konsumsi'),
(6, 'Biaya Lomba'),
(7, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(6) NOT NULL,
  `ukm` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `periode` int(4) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keperluan` int(6) NOT NULL,
  `nota` varchar(300) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `ukm`, `username`, `periode`, `tanggal`, `jumlah`, `keperluan`, `nota`, `keterangan`) VALUES
(1, 3, 'admin', 2017, '2017-01-05', 300000, 1, 'img/nota/smile2.png', 'beli boa'),
(2, 4, 'admin', 2017, '2017-01-05', 500000, 2, 'img/nota/logo WIndows.png', 'beli bola'),
(4, 4, 'admin', 2017, '2017-01-07', 500000, 5, 'img/nota/tumblr_kt7bn8byhd1qzr04eo1_500.png', 'Makan makan'),
(5, 3, 'admin', 2017, '2017-01-07', 600000, 1, 'img/nota/faces_in_the_dark.jpg', 'Beli net'),
(6, 4, 'admin', 2017, '2017-01-08', 400000, 6, 'img/nota/Profile Picture.jpg', 'Bupati cup'),
(7, 5, 'admin', 2017, '2017-01-10', 1000000, 2, 'img/nota/Wildan biru.jpg', 'Sewa lapangan'),
(8, 6, 'admin', 2017, '2017-01-08', 500000, 2, 'img/nota/seth.jpg', 'Sewa lapangan basket'),
(9, 5, 'admin', 2017, '2017-01-10', 400000, 1, 'img/nota/Eka Pandu Winata 20150218_130206.jpg', 'Beli Shuttlecock'),
(14, 5, 'admin', 2017, '2017-01-31', 40000, 1, 'img/nota/slither 25k.png', 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukm`
--

CREATE TABLE IF NOT EXISTS `ukm` (
  `id` int(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukm`
--

INSERT INTO `ukm` (`id`, `nama`) VALUES
(3, 'Vortech'),
(4, 'Traktor FC'),
(5, 'ABC'),
(6, 'Ballers'),
(7, 'Porsenigama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `privilage` varchar(10) NOT NULL,
  `ukm` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `pass`, `nama`, `privilage`, `ukm`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Raja', 'admin', NULL),
('agung', 'e59cd3ce33a68f536c19fedb82a7936f', 'Agung', 'ukm', 5),
('andy.nov', 'da41bceff97b1cf96078ffb249b3d66e', 'Andy Novianto', 'ukm', 7),
('rivan', '708af01b0093065b9fa75aafba5a67d8', 'Rivan Dwi', 'ukm', 4),
('Tomang', '900eb34d10f2dcf30489572217ac7ad3', 'Tomang', 'ukm', 6),
('wildan.a', '7b22a6ba44f8ed83d131521fa9069a4f', 'Wildan Ainurrahman', 'ukm', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idukm` (`ukm`);

--
-- Indexes for table `keperluan`
--
ALTER TABLE `keperluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ukm` (`ukm`),
  ADD KEY `username` (`username`,`keperluan`),
  ADD KEY `keperluan.transaksi` (`keperluan`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `ukm` (`ukm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `keperluan`
--
ALTER TABLE `keperluan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD CONSTRAINT `idukm` FOREIGN KEY (`ukm`) REFERENCES `ukm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `idukm.transaksi` FOREIGN KEY (`ukm`) REFERENCES `ukm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keperluan.transaksi` FOREIGN KEY (`keperluan`) REFERENCES `keperluan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username.transaksi` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `ukm.user` FOREIGN KEY (`ukm`) REFERENCES `ukm` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
