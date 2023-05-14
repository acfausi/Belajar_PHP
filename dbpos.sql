-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2023 pada 10.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpos`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addPesanan` (`tanggal` DATE, `total` DOUBLE, `pelanggan_id` INT)   BEGIN
INSERT INTO pesanan (tanggal,total,pelanggan_id) VALUES (tanggal,total,pelanggan_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inputPelanggan` (IN `kode` VARCHAR(10), IN `nama_pelanggan` VARCHAR(50), IN `jk` CHAR(1), IN `tmp_lahir` VARCHAR(30), IN `tgl_lahir` VARCHAR(100), IN `email` VARCHAR(45), IN `kartu_id` INT(11), IN `alamat` VARCHAR(40))   BEGIN
INSERT INTO pelanggan (kode, nama_pelanggan, jk, tmp_lahir, tgl_lahir, email, kartu_id, alamat) VALUES (kode, nama_pelanggan, jk, tmp_lahir, tgl_lahir, email, kartu_id, alamat);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inputProduk` (IN `kode` VARCHAR(10), IN `nama` VARCHAR(45), IN `harga_beli` DOUBLE, IN `harga_jual` DOUBLE, IN `stok` INT(11), IN `min_stok` INT(11))   BEGIN
INSERT INTO produk(kode, nama, harga_beli, harga_jual, stok, min_stok, jenis_produk_id) VALUES (kode, nama, harga_beli, harga_jual, stok, min_stok, jenis_produk_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllPesanan` ()   BEGIN
  SELECT pesanan.id AS pesanan_id, pesanan.tanggal, pelanggan.kode AS pelanggan_kode, pelanggan.nama_pelanggan, produk.kode AS produk_kode, produk.nama AS nama_produk, pesanan_item.qty, produk.harga_jual, SUM(pesanan_item.qty * pesanan_item.harga) AS total_harga
    FROM pesanan
    JOIN pelanggan ON pesanan.pelanggan_id = pelanggan.id
    JOIN pesanan_item ON pesanan.id = pesanan_item.pesanan_id
    JOIN produk ON pesanan_item.produk_id = produk.id
    GROUP BY pesanan.id, produk.id, pesanan_item.id, pelanggan.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showPelanggan` ()   BEGIN
SELECT * FROM pelanggan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showProduk` ()   BEGIN
SELECT * FROM produk;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `totalPesanan` (`p_id_pelanggan` INT) RETURNS INT(11)  BEGIN
DECLARE total INT;
SELECT SUM(jumlah) INTO total FROM pesanan WHERE id_pelanggan = p_id_pelanggan;
    IF total IS NULL THEN
SET total = 0;
 END IF;
    RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_prooduk_vw`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_prooduk_vw` (
`id` int(11)
,`kode` varchar(10)
,`nama` varchar(45)
,`harga_beli` double
,`harga_jual` double
,`stok` int(11)
,`min_stok` int(11)
,`jenis_produk_id` int(11)
,`jenis` varchar(45)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `ket` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `nama`, `ket`) VALUES
(1, 'elektronik', 'tersedia'),
(2, 'makanan', 'tersedia'),
(3, 'minuman', 'tersedia'),
(4, 'furniture', 'tidak tersedia'),
(5, 'peralatan', 'tidak tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu`
--

CREATE TABLE `kartu` (
  `id` int(11) NOT NULL,
  `kode_k` varchar(6) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `diskon` double DEFAULT NULL,
  `iuran` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kartu`
--

INSERT INTO `kartu` (`id`, `kode_k`, `nama`, `diskon`, `iuran`) VALUES
(1, 'M111', 'boom', 50, 10),
(4, 'M112', 'boom', 50, 10),
(5, 'M005', 'ACH. FAUSI', 50, 200000),
(6, 'S011', 'ROBET', 70, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('admin','manager','staff') NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `fullname`, `username`, `password`, `role`, `foto`) VALUES
(1, 'Fausi', 'Admin', 'Admin', 'admin', 'foto.jpg'),
(2, 'Ika', 'Staff', 'Staff', 'staff', 'ika.jpg'),
(3, 'Fausi', 'Admin', 'Admin', 'admin', 'foto.jpg'),
(4, 'Ika', 'Staff', 'Staff', 'staff', 'ika.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kode_p` varchar(10) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `kartu_id` int(11) NOT NULL,
  `alamat` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_p`, `nama_pelanggan`, `jk`, `tmp_lahir`, `tgl_lahir`, `email`, `kartu_id`, `alamat`) VALUES
(7, '2887361', 'Agung', 'L', 'Bandung', '30-12-1999', 'Agung@gmail.com', 2, 'Sumenep'),
(8, '2887363', 'Fausi', 'L', 'Bandung', '10-10-1999', 'Fausi@gmail.com', 3, 'Sumenep'),
(9, '2887364', 'Rian', 'L', 'Jakarta', '20-03-2000', 'Rian@gmail.com', 4, 'Sumenep'),
(10, '2887365', 'Santi', 'P', 'Bandung', '10-05-2000', 'Santi@gmail.com', 4, 'Bandung'),
(11, NULL, 'Agung', 'L', 'Madura', '2023-05-26', 'Agung@gmail.com', 2, 'Sumenep');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nokuitansi` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `ke` int(11) DEFAULT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `update_status_pembayaran` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
    DECLARE total_bayar DECIMAL(10, 2);
    DECLARE total_pesanan DECIMAL(10, 2);
    SELECT SUM(jumlah_pembayaran) INTO total_bayar FROM pembayaran WHERE id_pesanan = NEW.id_pesanan;
    SELECT total_harga INTO total_pesanan FROM pesanan WHERE id_pesanan = NEW.id_pesanan;
    IF total_bayar >= total_pesanan THEN
        UPDATE pembayaran SET status_pembayaran = 'lunas' WHERE id = NEW.id;
    ELSE
        UPDATE pembayaran SET status_pembayaran = 'belum lunas' WHERE id = NEW.id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `nomor` varchar(10) DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double DEFAULT 0,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `pelanggan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `total`, `pelanggan_id`) VALUES
(4, '2023-05-12', 4, 0),
(5, '2023-05-22', 5, 0),
(6, '2023-05-13', 5, 10),
(7, '2023-05-23', 6, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_item`
--

CREATE TABLE `pesanan_item` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan_item`
--

INSERT INTO `pesanan_item` (`id`, `produk_id`, `pesanan_id`, `qty`, `harga`) VALUES
(0, 2, 3, 23232, 10000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) NOT NULL,
  `harga_beli` double DEFAULT 0,
  `harga_jual` double DEFAULT 0,
  `stok` int(11) DEFAULT NULL,
  `min_stok` int(11) DEFAULT NULL,
  `jenis_produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga_beli`, `harga_jual`, `stok`, `min_stok`, `jenis_produk_id`) VALUES
(2, '1113', 'Lemari', 800000, 600000, 2, 3, 5),
(3, '1114', 'Meja', 1200000, 500000, 2, 3, 2),
(4, '1115', 'Kasur', 1300000, 1100000, 4, 4, 11),
(5, '1116', 'Meja Belajar', 1100000, 1100000, 1, 1, 1),
(9, '117', 'kompor', 200000, 500000, 10, 13, 3),
(10, '1118', 'sandal', 300000, 700000, 10, 3, 10),
(13, 'M111', 'boom', 20000, 500000, 4, 6, 9),
(16, 'K112`', 'dus', 400000, 7000000, 7, 9, 10),
(19, '1010', 'TV', 3990, 6999, 7, 9, 6),
(21, 'M001', 'kipas', 100000, 200000, 3, 50, 0),
(22, '23232', 'sxss', 24242, 2.2e24, 242, 34, 0),
(23, '242', 'aaafefff', 2231233, 424242, 3, 4, 0),
(27, 'M003', 'Motor', 790000, 800000, 3, 2, 1),
(29, 'S112M', 'Ayam', 130000, 200000, 3, 4, 6),
(30, 'M005', 'Ayam', 80000, 90000, 3, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `nomer` varchar(4) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kontak` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_prooduk_vw`
--
DROP TABLE IF EXISTS `detail_prooduk_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_prooduk_vw`  AS SELECT `p`.`id` AS `id`, `p`.`kode` AS `kode`, `p`.`nama` AS `nama`, `p`.`harga_beli` AS `harga_beli`, `p`.`harga_jual` AS `harga_jual`, `p`.`stok` AS `stok`, `p`.`min_stok` AS `min_stok`, `p`.`jenis_produk_id` AS `jenis_produk_id`, `j`.`nama` AS `jenis` FROM (`jenis_produk` `j` join `produk` `p` on(`p`.`jenis_produk_id` = `j`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kartu`
--
ALTER TABLE `kartu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode_k`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode_p`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nokuitansi` (`nokuitansi`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan_item`
--
ALTER TABLE `pesanan_item`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kartu`
--
ALTER TABLE `kartu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
