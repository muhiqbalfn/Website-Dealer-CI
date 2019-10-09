-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2019 pada 13.57
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_dealer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_merk`
--

CREATE TABLE `detail_merk` (
  `id_merk` varchar(10) NOT NULL,
  `merk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_merk`
--

INSERT INTO `detail_merk` (`id_merk`, `merk`) VALUES
('mrk001', 'Yamaha'),
('mrk002', 'Honda'),
('mrk003', 'Suzuki'),
('mrk004', 'Kawasaki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` varchar(10) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_motor` varchar(10) NOT NULL,
  `jumlah` tinyint(5) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_motor`, `jumlah`, `total_harga`, `status`) VALUES
('det002', 'trs007', 'mtr002', 1, 25000000, 'pesan'),
('det004', 'trs009', 'mtr020', 2, 34000000, 'pesan'),
('det005', 'trs030', 'mtr002', 2, 50000000, 'terkirim'),
('det006', 'trs031', 'mtr003', 1, 19000000, 'terkirim'),
('det007', 'trs032', 'mtr021', 2, 50000000, 'terkirim'),
('det008', 'trs033', 'mtr003', 2, 38000000, 'terkirim');

--
-- Trigger `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `tg_delete_pesan` AFTER DELETE ON `detail_transaksi` FOR EACH ROW BEGIN UPDATE motor
SET stok=stok+OLD.jumlah
WHERE motor.id_motor=OLD.id_motor;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_pesan` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN UPDATE motor
SET stok=stok-NEW.jumlah
WHERE motor.id_motor=NEW.id_motor;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_type`
--

CREATE TABLE `detail_type` (
  `id_type` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_type`
--

INSERT INTO `detail_type` (`id_type`, `type`) VALUES
('typ001', 'Vixion 150 CC'),
('typ002', 'CBR 150 R'),
('typ003', 'Scoopy'),
('typ004', 'Ninja RR 150 R'),
('typ005', 'Beat 125 CC'),
('typ006', 'CB 150 R'),
('typ007', 'Scoopy 125 CC'),
('typ008', 'Supra X 125 CC'),
('typ009', 'Vario 125 CC'),
('typ010', 'H25 500 CC'),
('typ011', 'KLX 150 CC'),
('typ012', 'Ninja 250 CC'),
('typ013', 'Ninja 250 CC'),
('typ014', 'Versys 250 CC'),
('typ015', 'Axelo 110 CC'),
('typ016', 'F1 150 CC'),
('typ017', 'Satria 150 CC'),
('typ018', 'SF 150 CC'),
('typ019', 'Spin 110 CC'),
('typ020', 'Fascino 110 CC'),
('typ021', 'Mio 125 CC'),
('typ022', 'N-Max 150 CC'),
('typ023', 'Vixion 150 CC'),
('typ024', 'X-Trail 125 CC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE `motor` (
  `id_motor` varchar(10) NOT NULL,
  `id_merk` varchar(10) NOT NULL,
  `id_type` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(5) NOT NULL,
  `img_motor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `motor`
--

INSERT INTO `motor` (`id_motor`, `id_merk`, `id_type`, `tahun`, `warna`, `harga`, `stok`, `img_motor`) VALUES
('mtr002', 'mrk002', 'typ002', 2012, 'Merah', 25000000, 6, 'cbr-merah.jpg'),
('mtr003', 'mrk001', 'typ003', 2015, 'Putih', 19000000, 3, 'fino.png'),
('mtr004', 'mrk004', 'typ004', 2017, 'Hijau', 65000000, 10, 'ninja-hijau.jpg'),
('mtr005', 'mrk002', 'typ005', 2010, 'Merah', 18000000, 10, 'h-beat.png'),
('mtr006', 'mrk002', 'typ006', 2010, 'Merah', 25000000, 10, 'h-cb.png'),
('mtr007', 'mrk002', 'typ007', 2017, 'Merah', 17000000, 10, 'h-scoopy.png'),
('mtr008', 'mrk002', 'typ008', 2016, 'Merah', 17000000, 10, 'h-supra.jpg'),
('mtr009', 'mrk004', 'typ010', 2007, 'Hitam', 200000000, 10, 'k-h2r.png'),
('mtr010', 'mrk004', 'typ011', 2016, 'Hijau puti', 26000000, 10, 'k-klx.png'),
('mtr011', 'mrk004', 'typ013', 2010, 'Hijau', 50000000, 10, 'k-ninja.png'),
('mtr012', 'mrk004', 'typ012', 2016, 'Merah', 50000000, 10, 'k-ninja-1.png'),
('mtr013', 'mrk004', 'typ014', 2010, 'Abu-abu', 35000000, 10, 'k-versys.png'),
('mtr014', 'mrk003', 'typ015', 2011, 'Merah', 17000000, 10, 's-axelo.png'),
('mtr015', 'mrk003', 'typ016', 2010, 'Hitam', 21000000, 10, 's-f1.png'),
('mtr016', 'mrk003', 'typ017', 2016, 'Hitam', 17000000, 10, 's-satria.png'),
('mtr017', 'mrk003', 'typ018', 2010, 'Biru', 25000000, 10, 's-sf.png'),
('mtr018', 'mrk003', 'typ019', 2010, 'Hitam', 16000000, 10, 's-spin.png'),
('mtr019', 'mrk003', 'typ020', 2010, 'Biru muda', 17000000, 10, 'y-fascino.jpg'),
('mtr020', 'mrk001', 'typ021', 2010, 'Orange', 17000000, 4, 'y-mio.png'),
('mtr021', 'mrk001', 'typ022', 2016, 'Putih', 25000000, 6, 'y-n-max.jpg'),
('mtr022', 'mrk001', 'typ023', 2016, 'Merah', 25000000, 10, 'y-vixion.png'),
('mtr023', 'mrk001', 'typ024', 2017, 'Biru putih', 17000000, 10, 'y-x-trail.jpg'),
('mtr024', 'mrk001', 'typ002', 2019, 'putih', 28000000, 10, '46.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `no_hp`, `username`, `password`, `foto`) VALUES
('plg000', 'Administrator', 'L', 'Blitar', '081556772233', 'admin', 'admin123', 'male.png'),
('plg001', 'Muhammad Iqbal Firdaus Nuzula', 'L', 'Blitar', '087765443777', 'iqbal', 'iqbal123', 'iqbal.jpg'),
('plg002', 'Muhammad adib mahardika', 'L', 'Jakarta', '081556776655', 'owner', 'owner', 'nuzul.jpg'),
('plg003', 'Arif latifudin', 'P', 'Blitar', '085608272881', 'arif', 'arif123', 'male-topi.png'),
('plg004', 'ali musa', 'L', 'Blitar', '087756444333', 'ali', 'ali123', 'jens2.jpg'),
('plg005', 'susi wardani', 'P', 'Blitar', '097838383', 'susi', 'susi123', 'add.png'),
('plg006', 'fiyan only', 'L', 'jepara', '087654132425', 'fiyan', 'fiyan', 'd.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `jenis_kelamin`, `alamat`, `foto`) VALUES
('ptg001', 'Alfan riyanto', 'L', 'Malang', 'male.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_petugas`, `tgl_pesan`, `tgl_kirim`) VALUES
('trs007', 'plg002', 'ptg001', '2018-05-22', '2018-05-23'),
('trs008', 'plg001', 'ptg001', '2018-05-22', '2018-05-23'),
('trs009', 'plg003', 'ptg001', '2018-05-22', '2018-05-23'),
('trs010', 'plg001', 'ptg001', '2018-05-23', '2018-05-24'),
('trs017', 'plg001', 'ptg001', '2018-05-30', '2018-05-31'),
('trs018', 'plg001', 'ptg001', '2018-05-30', '2018-05-31'),
('trs019', 'plg001', 'ptg001', '2018-07-04', '2018-07-05'),
('trs020', 'plg001', 'ptg001', '2018-07-11', '2018-07-12'),
('trs021', 'plg001', 'ptg001', '2018-07-17', '2018-07-18'),
('trs022', 'plg001', 'ptg001', '2018-07-17', '2018-07-18'),
('trs023', 'plg001', 'ptg001', '2018-07-17', '2018-07-18'),
('trs024', 'plg001', 'ptg001', '2018-07-25', '2018-07-26'),
('trs025', 'plg001', 'ptg001', '2018-10-10', '2018-10-11'),
('trs028', 'plg001', 'ptg001', '2018-10-22', '2018-10-23'),
('trs029', 'plg001', 'ptg001', '2018-11-05', '2018-11-06'),
('trs030', 'plg004', 'ptg001', '2018-11-05', '2018-11-06'),
('trs031', 'plg001', 'ptg001', '2018-11-06', '2018-11-07'),
('trs032', 'plg005', 'ptg001', '2018-11-26', '2018-11-27'),
('trs033', 'plg006', 'ptg001', '2018-11-27', '2018-11-28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_merk`
--
ALTER TABLE `detail_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_motor` (`id_motor`);

--
-- Indeks untuk tabel `detail_type`
--
ALTER TABLE `detail_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indeks untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_type` (`id_type`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id_motor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `detail_type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `motor_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `detail_merk` (`id_merk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
