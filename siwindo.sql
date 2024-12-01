-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2024 pada 06.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwindo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `status` enum('pending','selesai') DEFAULT 'pending',
  `total_harga` decimal(10,2) NOT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `tanggal_pemesanan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('gunung','pantai') NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `jenis`, `deskripsi`, `harga`, `latitude`, `longitude`, `gambar`) VALUES
(1, 'Gunung Bromo', 'gunung', 'Gunung berapi aktif di Jawa Timur yang terkenal dengan pemandangan matahari terbit yang spektakuler.', 60000.00, -7.942493, 112.953012, 'https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/1052/2024/02/16/IMG_20240216_075232-199804192.jpg'),
(2, 'Gunung Rinjani', 'gunung', 'Gunung tertinggi kedua di Indonesia yang terletak di Pulau Lombok dengan keindahan Danau Segara Anak.', 10000.00, -8.41163, 116.457157, 'https://traverse.id/wp-content/uploads/2019/08/cropped-Taman-Nasional-Gunung-Rinjani-Salah-Satu-Tempat-Menjelajah-Terbaik-di-Asia-Tenggara-@himsaifanah.jpg'),
(3, 'Gunung Merapi', 'gunung', 'Gunung berapi paling aktif di Indonesia yang terletak di perbatasan Jawa Tengah dan Yogyakarta.', 30000.00, -7.540708, 110.442268, 'https://asset-2.tstatic.net/sumsel/foto/bank/images/Gunung-Merapi-di-Sleman-DI-Yogyakarta-TwitterBPPTKG.jpg'),
(4, 'Gunung Semeru', 'gunung', 'Gunung tertinggi di Pulau Jawa yang menawarkan petualangan mendaki dan keindahan alam yang luar biasa.', 25000.00, -8.1082, 112.922636, 'https://pict.sindonews.net/dyn/850/pena/news/2023/09/05/704/1193581/6-fakta-gunung-semeru-puncak-tertinggi-di-jawa-yang-jadi-tempat-kematian-soe-hok-gie-qzw.jpg'),
(5, 'Gunung Kerinci', 'gunung', 'Gunung tertinggi di Sumatra dan gunung berapi tertinggi di Indonesia dengan pemandangan yang memukau.', 20000.00, -1.697045, 101.264177, 'https://www.djkn.kemenkeu.go.id/files/images/2024/02/WhatsApp_Image_2024-02-05_at_21_09_4.jpeg'),
(6, 'Gunung Ijen', 'gunung', 'Gunung dengan kawah belerang yang memukau dan fenomena api biru yang terkenal di Banyuwangi, Jawa Timur.', 10000.00, -8.058093, 114.242603, 'https://asset.kompas.com/crops/fu2SL2EKEzm5evOAXDv-SyvvD9Y=/0x0:1200x800/1200x800/data/photo/2021/08/19/611e162fed8b4.jpg'),
(7, 'Gunung Agung', 'gunung', 'Gunung tertinggi di Bali yang dianggap suci dan menawarkan pemandangan indah dari puncaknya.', 70000.00, -8.342726, 115.508391, 'https://indoraya.news/wp-content/uploads/2022/08/gunung-agung.jpg'),
(8, 'Gunung Gede Pangrango', 'gunung', 'Gunung yang terletak di Jawa Barat dan menjadi salah satu destinasi favorit pendaki.', 30000.00, -6.771673, 106.985704, 'https://javaprivatetour.com/wp-content/uploads/2023/08/gununggede.jpeg'),
(10, 'Gunung Lawu', 'gunung', 'Gunung di perbatasan Jawa Tengah dan Jawa Timur yang memiliki banyak situs sejarah dan budaya.', 20000.00, -7.62724, 111.194123, 'https://shelterjelajah.com/wp-content/uploads/2024/03/Estimasi-Pendakian-Gunung-Lawu-Via-Tambak.jpeg'),
(11, 'Gunung Bromo', 'gunung', 'Gunung berapi aktif di Jawa Timur yang terkenal dengan pemandangan matahari terbit yang spektakuler.', 54000.00, -7.942493, 112.953012, 'https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/1052/2024/02/16/IMG_20240216_075232-199804192.jpg'),
(12, 'Gunung Rinjani', 'gunung', 'Gunung tertinggi kedua di Indonesia yang terletak di Pulau Lombok dengan keindahan Danau Segara Anak.', 10000.00, -8.41163, 116.457157, 'https://traverse.id/wp-content/uploads/2019/08/cropped-Taman-Nasional-Gunung-Rinjani-Salah-Satu-Tempat-Menjelajah-Terbaik-di-Asia-Tenggara-@himsaifanah.jpg'),
(13, 'Gunung Merapi', 'gunung', 'Gunung berapi paling aktif di Indonesia yang terletak di perbatasan Jawa Tengah dan Yogyakarta.', 30000.00, -7.540708, 110.442268, 'https://asset-2.tstatic.net/sumsel/foto/bank/images/Gunung-Merapi-di-Sleman-DI-Yogyakarta-TwitterBPPTKG.jpg'),
(14, 'Gunung Semeru', 'gunung', 'Gunung tertinggi di Pulau Jawa yang menawarkan petualangan mendaki dan keindahan alam yang luar biasa.', 25000.00, -8.1082, 112.922636, 'https://pict.sindonews.net/dyn/850/pena/news/2023/09/05/704/1193581/6-fakta-gunung-semeru-puncak-tertinggi-di-jawa-yang-jadi-tempat-kematian-soe-hok-gie-qzw.jpg'),
(15, 'Gunung Kerinci', 'gunung', 'Gunung tertinggi di Sumatra dan gunung berapi tertinggi di Indonesia dengan pemandangan yang memukau.', 20000.00, -1.697045, 101.264177, 'https://www.djkn.kemenkeu.go.id/files/images/2024/02/WhatsApp_Image_2024-02-05_at_21_09_4.jpeg'),
(16, 'Gunung Ijen', 'gunung', 'Gunung dengan kawah belerang yang memukau dan fenomena api biru yang terkenal di Banyuwangi, Jawa Timur.', 10000.00, -8.058093, 114.242603, 'https://asset.kompas.com/crops/fu2SL2EKEzm5evOAXDv-SyvvD9Y=/0x0:1200x800/1200x800/data/photo/2021/08/19/611e162fed8b4.jpg'),
(17, 'Gunung Agung', 'gunung', 'Gunung tertinggi di Bali yang dianggap suci dan menawarkan pemandangan indah dari puncaknya.', 70000.00, -8.342726, 115.508391, 'https://indoraya.news/wp-content/uploads/2022/08/gunung-agung.jpg'),
(18, 'Gunung Gede Pangrango', 'gunung', 'Gunung yang terletak di Jawa Barat dan menjadi salah satu destinasi favorit pendaki.', 30000.00, -6.771673, 106.985704, 'https://javaprivatetour.com/wp-content/uploads/2023/08/gununggede.jpeg'),
(19, 'Gunung Lawu', 'gunung', 'Gunung di perbatasan Jawa Tengah dan Jawa Timur yang memiliki banyak situs sejarah dan budaya.', 20000.00, -7.62724, 111.194123, 'https://shelterjelajah.com/wp-content/uploads/2024/03/Estimasi-Pendakian-Gunung-Lawu-Via-Tambak.jpeg'),
(20, 'Pantai Kuta', 'pantai', 'Pantai yang terkenal dengan ombak besar dan pasir putih di Bali, populer untuk surfing dan pemandangan matahari terbenam.', 25000.00, -8.714938, 115.169376, 'https://cove-blog-id.sgp1.cdn.digitaloceanspaces.com/cove-blog-id/2023/07/pantai-kuta.webp'),
(21, 'Pantai Parangtritis', 'pantai', 'Pantai di Yogyakarta yang terkenal dengan ombak besar dan keindahan matahari terbenamnya.', 20000.00, -8.028156, 110.320673, 'https://www.wisatala.com/wp-content/uploads/2023/03/pantai-parangtritis-1.jpg'),
(22, 'Pantai Pink', 'pantai', 'Pantai dengan pasir berwarna pink yang terletak di Pulau Komodo, Nusa Tenggara Timur, ideal untuk snorkeling.', 100000.00, -8.81933, 119.37586, 'https://rinjanilombok.net/wp-content/uploads/2014/12/pink-lombok.jpg'),
(23, 'Pantai Sanur', 'pantai', 'Pantai di Bali yang terkenal dengan keindahan sunrise dan suasana yang tenang untuk bersantai.', 40000.00, -8.694241, 115.263304, 'https://www.befreetour.com/img/attraction/sanur-beach20191019122349.jpg'),
(24, 'Pantai Tanjung Bira', 'pantai', 'Pantai dengan pasir putih dan air jernih di Sulawesi Selatan, cocok untuk snorkeling dan menyelam.', 30000.00, -5.01524, 120.445148, 'https://assets-a1.kompasiana.com/items/album/2023/04/28/tanjungbira1-644bc25ca7e0fa580a0b5d53.jpg'),
(25, 'Pantai Labuan Bajo', 'pantai', 'Pantai yang terletak di Labuan Bajo, Nusa Tenggara Timur, terkenal dengan keindahan bawah laut dan akses ke Pulau Komodo.', 150000.00, -8.508186, 119.892317, 'https://awsimages.detik.net.id/community/media/visual/2021/07/05/wisata-super-prioritas-labuan-bajo_169.jpeg?w=1200'),
(26, 'Pantai Balangan', 'pantai', 'Pantai di Bali yang menawarkan pemandangan menakjubkan dan suasana yang lebih sepi dan alami.', 35000.00, -8.794232, 115.117679, 'https://www.water-sport-bali.com/wp-content/uploads/2013/02/Pantai-Balangan-Bali-Facebook.jpg'),
(27, 'Pantai Nihiwatu', 'pantai', 'Pantai yang terletak di Pulau Sumba, Nusa Tenggara Timur, dengan pemandangan yang indah dan ombak yang sempurna untuk surfing.', 200000.00, -9.664122, 119.496803, 'https://backpackerjakarta.com/wp-content/uploads/2019/11/Pantai-Nihiwatu.jpg'),
(28, 'Pantai Labuana', 'pantai', 'Pantai yang terletak di Sulawesi Utara dengan pemandangan pantai yang indah dan cocok untuk kegiatan selam dan snorkeling.', 25000.00, 1.55057, 124.937801, 'https://www.mldspot.com/storage/generated/June2021/pantai-001.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `wisata_id` (`wisata_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
