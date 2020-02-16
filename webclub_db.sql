-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2020 pada 15.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webclub_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alert_eskul`
--

CREATE TABLE `alert_eskul` (
  `id` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskul`
--

CREATE TABLE `eskul` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `eskul`
--

INSERT INTO `eskul` (`id`, `nama`, `img`) VALUES
(1, 'Organisasi Siswa Intra Sekolah (OSIS)', 'Logo_1_Organisasi Siswa Intra Sekolah (OSIS).jpg'),
(2, 'Pramuka', 'Logo_2_Pramuka.jpg'),
(3, 'IKHBAT', 'Logo_3_IKHBAT.jpg'),
(4, 'Palang Merah Remaja (PMR)', 'Logo_4_Palang Merah Remaja (PMR).png'),
(5, 'Teater Noll', 'Logo_5_Teater Noll.jpg'),
(6, 'Basket', 'Logo_6_Basket.jpg'),
(7, 'Animasi', 'Logo_7_Animasi.jpg'),
(8, 'Motion Photography', 'Logo_8_Motion Photography.png'),
(9, 'Badminton', 'Logo_9_Badminton.png'),
(10, 'Futsal', 'Logo_10_Futsal.jpg'),
(11, 'Paduan Suara', 'Logo_11_Paduan Suara.jpg'),
(12, 'Lintas Sunda', 'Logo_12_Lintas Sunda.jpg'),
(13, 'Angklung', 'Logo_13_Angklung.png'),
(14, 'Seni Tari', 'Logo_14_Seni Tari.png'),
(15, 'Pencak Silat', 'Logo_15_Pencak Silat.jpg'),
(16, 'Japanese Club', 'Logo_16_Japanese Club.jpg'),
(17, 'Karya Ilmah Remaja dan Robotika (KIRR)', 'Logo_17_Karya Ilmah Remaja dan Robotika (KIRR).png'),
(18, 'Karate', 'Logo_18_Karate.jpg'),
(19, 'Taekwondo', 'Logo_19_Taekwondo.png'),
(20, 'English Club', 'Logo_20_English Club.jpg'),
(21, 'Paskibra', 'Logo_21_Paskibra.png'),
(22, 'Tarung Drajat', 'Logo_22_Tarung Drajat.jpg'),
(23, 'Patroli Keamanan Sekolah (PKS)', 'Logo_23_Patroli Keamanan Sekolah (PKS).jpg'),
(24, 'Volley', 'Logo_24_Volley.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskul_siswa`
--

CREATE TABLE `eskul_siswa` (
  `id` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon_siswa` varchar(255) NOT NULL,
  `no_telepon_orrtu` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender`
--

CREATE TABLE `kalender` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `data` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kalender`
--

INSERT INTO `kalender` (`id`, `nama`, `data`, `img`) VALUES
(1, 'Kalender Pelajaran 2020-2021', 'kal_dat_1_Kalender Pelajaran 2020-2021.docx', 'kal_img_1_Kalender Pelajaran 2020-2021.png'),
(3, 'Lorem', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_data`
--

CREATE TABLE `kalender_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `estimasi_waktu_kegiatan` varchar(255) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_bulanan`
--

CREATE TABLE `laporan_bulanan` (
  `id` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `type` enum('proposal','surat_izin','pengajuan_data') NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tujuan` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `total_biaya` float NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(3, 'Kesiswaan'),
(4, 'OSIS'),
(5, 'Pramuka'),
(6, 'OWN_Pramuka'),
(7, 'Paskibra'),
(8, 'OWN_Paskibra'),
(9, 'PMR'),
(10, 'OWN_PMR'),
(11, 'Ikhbat'),
(12, 'OWN_Ikhbat'),
(13, 'Teater'),
(14, 'OWN_Teater'),
(15, 'Lintas-Sunda'),
(16, 'OWN_Lintas-Sunda'),
(17, 'Paduan-Suara'),
(18, 'OWN_Paduan-suara'),
(19, 'Angklung'),
(20, 'OWN_Angklung'),
(21, 'Badminton'),
(22, 'OWN_Badminton'),
(23, 'KIRR'),
(24, 'OWN_KIRR'),
(25, 'Silat'),
(26, 'OWN_Silat'),
(27, 'Karate'),
(28, 'OWN_Karate'),
(29, 'Tarung-drajat'),
(30, 'OWN_Tarung-drajat'),
(31, 'Basket'),
(32, 'OWN_Basket'),
(33, 'Volly'),
(34, 'OWN_Volly'),
(35, 'Futsal'),
(36, 'OWN_Futsal'),
(37, 'Kopsis'),
(38, 'OWN_Kopsis'),
(39, 'Mostion'),
(40, 'OWN_Mostion'),
(41, 'Tari'),
(42, 'OWN_Tari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_kas`
--

CREATE TABLE `uang_kas` (
  `id` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_keluar`
--

CREATE TABLE `uang_keluar` (
  `id` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `total` float NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_masuk`
--

CREATE TABLE `uang_masuk` (
  `id` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `total` float NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `id_role`, `no_telepon`, `alamat`, `img`) VALUES
(1, 'Bima Pria Aditya', 'bpabima@gmail.com', 'lorem', 3, '087878182791', 'Jl Raya Buntuk no 69 RT 01 RW 44 Kec. Sableng Kell Suka Serang Kota Bandung', 'Pic_1_Bima Pria Aditya.jpg'),
(2, 'Lorem Ipsum', 'loremgood@gmail.com', 'loremgood', 5, '099877765421', 'Jl Males', 'Pic_2_Lorem Ipsum.png'),
(4, 'Dr. Qwerty', 'qwerty@wasd.com', 'iniqwerty', 4, '099877615', 'Jalan in dulu aja', 'Pic__Dr. Qwerty.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alert_eskul`
--
ALTER TABLE `alert_eskul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `eskul_siswa`
--
ALTER TABLE `eskul_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `kalender`
--
ALTER TABLE `kalender`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kalender_data`
--
ALTER TABLE `kalender_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `laporan_bulanan`
--
ALTER TABLE `laporan_bulanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `uang_keluar`
--
ALTER TABLE `uang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `uang_masuk`
--
ALTER TABLE `uang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alert_eskul`
--
ALTER TABLE `alert_eskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `eskul`
--
ALTER TABLE `eskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `eskul_siswa`
--
ALTER TABLE `eskul_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kalender`
--
ALTER TABLE `kalender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kalender_data`
--
ALTER TABLE `kalender_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_bulanan`
--
ALTER TABLE `laporan_bulanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uang_keluar`
--
ALTER TABLE `uang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uang_masuk`
--
ALTER TABLE `uang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alert_eskul`
--
ALTER TABLE `alert_eskul`
  ADD CONSTRAINT `alert_eskul_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id`);

--
-- Ketidakleluasaan untuk tabel `eskul_siswa`
--
ALTER TABLE `eskul_siswa`
  ADD CONSTRAINT `eskul_siswa_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id`);

--
-- Ketidakleluasaan untuk tabel `laporan_bulanan`
--
ALTER TABLE `laporan_bulanan`
  ADD CONSTRAINT `laporan_bulanan_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id`);

--
-- Ketidakleluasaan untuk tabel `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD CONSTRAINT `laporan_kegiatan_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id`);

--
-- Ketidakleluasaan untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD CONSTRAINT `uang_kas_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id`);

--
-- Ketidakleluasaan untuk tabel `uang_keluar`
--
ALTER TABLE `uang_keluar`
  ADD CONSTRAINT `uang_keluar_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id`);

--
-- Ketidakleluasaan untuk tabel `uang_masuk`
--
ALTER TABLE `uang_masuk`
  ADD CONSTRAINT `uang_masuk_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
