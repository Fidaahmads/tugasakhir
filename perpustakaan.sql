-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2023 pada 04.28
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_genre`
--

CREATE TABLE `daftar_genre` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_genre`
--

INSERT INTO `daftar_genre` (`id`, `id_buku`, `id_genre`) VALUES
(5, 12, 6),
(6, 13, 3),
(7, 14, 3),
(8, 15, 6),
(9, 16, 3),
(10, 17, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `no` int(11) NOT NULL,
  `Nomor` int(11) NOT NULL,
  `Judul` varchar(300) NOT NULL,
  `Pengarang` varchar(250) NOT NULL,
  `Gambar` text NOT NULL,
  `Rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`no`, `Nomor`, `Judul`, `Pengarang`, `Gambar`, `Rak`) VALUES
(12, 1111, 'Good to Great', 'John Collins', '77213_f.jpg', 'A0001'),
(13, 1112, 'Hyouka', 'Yonezawa Honobu', 'fb72074f8f0d394cc6d6df9f47355f6e.jpeg', 'A0002'),
(14, 1113, 'Credit Roll of The Fool', 'Yonezawa Honobu', '3465850b20cadef0d81b93b7a4c0e1c8.jpeg', 'A0002'),
(15, 1114, 'Konsep Adab Syed Naquib Al Attas', 'Dr Muhammad Ardiansyah', 'download (3).jpeg', 'A0004'),
(16, 1115, 'Eventhough Im Told Im Now Have Wings', 'Yonezawa Honobu', 'd7eb813d99abf328da973f45f926a9d9.jpeg', 'A0002'),
(17, 1116, 'The Kudrayavka Sequence', 'Yonezawa Honobu', 'images.jpeg', 'A0002'),
(18, 1113, 'Credit Roll of The Fool', 'Yonezawa Honobu', '3465850b20cadef0d81b93b7a4c0e1c8.jpeg', 'A0002'),
(19, 1113, 'Credit Roll of The Fool', 'Yonezawa Honobu', '3465850b20cadef0d81b93b7a4c0e1c8.jpeg', 'A0002'),
(20, 1112, 'Hyouka', 'Yonezawa Honobu', 'fb72074f8f0d394cc6d6df9f47355f6e.jpeg', 'A0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_genre`
--

CREATE TABLE `data_genre` (
  `id` int(11) NOT NULL,
  `Genre` varchar(250) NOT NULL,
  `Jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_genre`
--

INSERT INTO `data_genre` (`id`, `Genre`, `Jumlah`) VALUES
(3, 'Fiksi-Novel-Drama', 32),
(4, 'Fiksi-Novel-Fantasi', 21),
(5, 'Fiksi-Novel-Scifi', 23),
(6, 'Non Fiksi-Bisnis', 12),
(7, 'Non Fiksi-Marketing', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`) VALUES
(1, 'adminFD', 'MauNulis', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_genre`
--
ALTER TABLE `daftar_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_genre_ibfk_1` (`id_genre`),
  ADD KEY `daftar_genre_ibfk_2` (`id_buku`);

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `data_genre`
--
ALTER TABLE `data_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_genre`
--
ALTER TABLE `daftar_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `data_genre`
--
ALTER TABLE `data_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_genre`
--
ALTER TABLE `daftar_genre`
  ADD CONSTRAINT `daftar_genre_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `data_genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daftar_genre_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `data_buku` (`no`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
