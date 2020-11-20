-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2020 pada 01.40
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode` int(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `kover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode`, `jenis`, `judul`, `pengarang`, `harga`, `kover`) VALUES
(13, 'Fiksi', 'Warm Heart', 'Ullianne', 49000, '9786024529055.jpg'),
(14, 'Fiksi', 'Malik & Elsa 2', 'Boy Candra', 66000, 'Malik__Elsa_2.jpg'),
(15, 'Fiksi', 'Bukan Cinderella', 'Dheti Azmi', 173000, '9786020502571_Bukan-Cinderella.jpg'),
(16, 'Fiksi', 'Antar Kota Antar Perasaan', 'Gentakiswara', 75000, 'Cover_AKAP_21.jpg'),
(17, 'Fiksi', 'Stardom Syndrome', 'Sashi Kirana', 72000, '9786230300172_STARDOM_SYNDROME.jpg'),
(18, 'Fiksi', 'Ajaklah Tuhan ke Tanah Jawa', 'Sekar Ayu Asmara', 75000, '9786020645025_ajaklah_tuhan_ke_tanah_jawa_cov.jpg'),
(19, 'Fiksi', 'Halo, Mantan!', 'Dheti Azmi', 99000, '208076964_Halo_Mantan.jpeg'),
(20, 'Fiksi', 'Beautiful Mining Expert', 'Nurul Izzati', 95000, '9786230020285_cover_beautiful_mining_expert_front.jpg'),
(21, 'Fiksi', 'Metropop: After 10 Years', 'Bey Tobing', 80000, '9786020639963_After_10_Years.jpg'),
(22, 'Fiksi', 'Lit: Say Hi!', 'Inggrid Sonya', 115000, '9786230019630_Say_Hi_.jpg'),
(23, 'Fiksi', 'I Owe You One', 'Sophie Kinsella', 115000, '9786020640006_I_Owe_You_One.jpg'),
(24, 'Fiksi', 'Happiness In Blue', 'Janice Chrysilla', 62000, '9786230401473_Happiness_in_Blue-1.jpg'),
(25, 'Fiksi', 'City Lite: Fit and Proper Test', 'Soraya Nasution', 90000, '9786230021091_cover_fit_and_proper_test_FRONT.jpg'),
(26, 'Fiksi', 'MetroPop: Blue Morpho', 'Sekar Ayu Asmara', 60000, '9786020644738_Blue_morpho_cov.jpg'),
(27, 'Fiksi', 'Happy Ending Machine', 'Adelina Ayu', 84000, '9786230401480_Revisi_Cover_Happy_Ending_Machine-1.jpg'),
(28, 'Fiksi', 'The Antagonist Program', 'Aranindy', 89000, '9786230302633_THE_ANTAGONIST_PROGRAM.jpg'),
(29, 'Fiksi', 'School Nurse Ahn Eunyoung', 'Chung Serang', 85000, '9786020643625_school_nurse_cov_1.jpg'),
(30, 'Fiksi', 'Agave', 'Malashantii', 70000, '9786230017636_cover_agave_FINALE.jpg'),
(31, 'Nonfiksi', 'Bikin Film Itu Gampang', 'Natasha Dematra', 48000, '9786024831912_BIKIN-FILM-IT.jpg'),
(32, 'Nonfiksi', 'Menulis Artikel Ilmiah Dan Esai', 'Agus Widayoko M.Pd.,Gr.', 35000, 'img330_06OADht.jpg'),
(33, 'Nonfiksi', 'Membangun Peradaban Kota', 'Nirwono Joga', 97000, '9786020398433_Membangun-Per.jpg'),
(34, 'Nonfiksi', 'Dibalik Krisis Ekosistem', 'Hariadi Kartodihardjo', 75000, '9786027984301_9786027984301.jpg'),
(35, 'Nonfiksi', 'Pengantar Statistika', 'Nila Kesumawati', 82000, '9786024251321_9786024251321.jpg'),
(36, 'Nonfiksi', 'Infrastruktur Berkelanjutan', 'Nirwono Joga', 95000, '9786020621432_TRANS_JAWA_MENJALIN_INFRASTRUKTUR_BERKELANJUTAN_C_1_4.jpg'),
(37, 'Nonfiksi', 'Revolusi Energi', 'Arifin Panigoro', 65000, '9786022668923_romantic-prince-_terbit-ulang_.jpg'),
(38, 'Pelajaran', 'PPKn', 'Maulana Arafat Lubis, M.Pd.', 61000, '9786232184602.jpg'),
(39, 'Pelajaran', 'Hukum Lembaga Negara', 'Dr. H. Uu Nurul Huda, S.Ag., S.H., M.H.', 54000, '9786237060727.jpg'),
(40, 'Pelajaran', 'Concise Grammar French', 'Gabriele Forst', 75000, 'img20200808_11333714.jpg'),
(41, 'Pelajaran', 'Concise Grammar Japanese', 'Kayo Funatsu Bohler', 75000, 'img20200808_11374292.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `pesanan` int(100) NOT NULL,
  `kode` int(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`pesanan`, `kode`, `judul`, `pengarang`, `harga`, `id`) VALUES
(6, 21, 'Metropop: After 10 Years', 'Bey Tobing', 80000, 9),
(7, 26, 'MetroPop: Blue Morpho', 'Sekar Ayu Asmara', 60000, 9),
(8, 29, 'School Nurse Ahn Eunyoung', 'Chung Serang', 85000, 9),
(10, 15, 'Bukan Cinderella', 'Dheti Azmi', 173000, 9),
(11, 13, 'Warm Heart', 'Ullianne', 49000, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `foto`) VALUES
(1, 'admin', '123', 'admin.png'),
(9, 'yusuf', '321', 'vcbdb.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`pesanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
