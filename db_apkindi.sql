-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2024 pada 01.37
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apkindi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `jenis_kode` varchar(255) DEFAULT NULL,
  `kode_buku` varchar(255) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_kategori_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_buku` varchar(200) DEFAULT NULL,
  `jenis_buku` varchar(20) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tanggal_terbit` datetime DEFAULT NULL,
  `tanggal_publish` datetime DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `status` enum('Publish','Draft') DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `jenis_kode`, `kode_buku`, `id_dosen`, `id_kategori_buku`, `id_user`, `judul_buku`, `jenis_buku`, `isi`, `gambar`, `file`, `penulis`, `penerbit`, `tanggal_terbit`, `tanggal_publish`, `website`, `keyword`, `hits`, `status`, `tanggal`) VALUES
(5, 'ISSN', '345345afsdf', 2, 2, 1, 'Perilaku satwa liar', 'buku', '<p>Paket Harga Kursus Statistik Java Web Media 2020</p>', '4.jpg', NULL, 'Ahlian, Sorean, willy', 'cvdahlia cebter', '2023-12-17 00:00:00', '2023-12-01 07:00:00', '', '', 0, 'Publish', '2024-01-02 04:11:16'),
(6, 'ISSN', '123123123', 1, 2, 1, 'Hidrologi Hutan', 'prosiding', '<p>Panduan Untuk Admin Engineering Utama</p>', '6.jpg', NULL, 'nadiah, silva, ardikusuma', 'CV. Penulis Utama', '2023-12-17 00:00:00', '2023-12-14 07:00:00', '', '', 0, 'Publish', '2024-01-02 04:11:19'),
(7, 'ISSN', '12312312s', 2, 2, 1, 'Eko wisata', 'buku', '', '6.jpg', NULL, 'prima, gunardi, limansah', 'CV. Sinar Jaya lampung', '2023-12-17 00:00:00', '2023-01-12 07:00:00', '', '', 0, 'Publish', '2024-01-02 04:11:22'),
(8, 'ISSN', '1232334ndf', 1, 6, 1, 'Penangkaran Flora Fauna', 'buku', '<p>Panduan Website</p>', '4.jpg', NULL, 'agus salim hendro g, firman', 'Universitas Lampung', '2023-12-17 00:00:00', '1970-01-01 07:00:00', 'https://infosinau.my.id', 'infosinau', 4, 'Publish', '2024-01-02 04:11:24'),
(10, 'lainya', 'test', 2, 6, 1, 'ceknama', 'buku', '<p>ASDFASDFASDF</p>', 'images-(2).jpg', 'Jadwal-pelajaran-FIX-Ganjil-2023-2024.pdf', 'ARDIANSYAH', 'PRIMA LAKUNA', '1970-01-01 00:00:00', '2023-12-19 00:00:00', 'http://www.infosinau.my.id', 'ASDFASDFASDF', 0, 'Publish', '2024-01-02 15:27:47'),
(15, 'ISSN', '23423423', 17, 6, 1, 'asdfasdf', 'buku', '<p>sdf</p>', 'download.jpg', 'SOF-INPUT-SO-29.07.2023.pdf', 'asdfasdf', 'asdfasdf', '2023-12-31 16:20:00', '2023-12-31 16:20:00', '', 'asdfasdf', 0, 'Publish', '2024-01-02 15:27:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jenis_client` enum('Perorangan','Perusahaan','Organisasi') NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pimpinan` varchar(255) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `isi_testimoni` text DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `status_client` varchar(20) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `id_user`, `jenis_client`, `nama`, `pimpinan`, `alamat`, `telepon`, `website`, `email`, `isi_testimoni`, `gambar`, `status_client`, `tempat_lahir`, `tanggal_lahir`, `tanggal_post`, `tanggal`) VALUES
(2, 1, 'Perorangan', 'AWS Indonesia', 'Uli Handayani', 'Jalan Lapangan Banteng Barat No. 3-4\r\nTromol Pos 3500', '', 'https://awsindonesia.org', 'javawebmedia@gmail.com', 'Website Yayasan AWS Indonesia saat ini sudah aktif dan bisa diakses tepat pada waktunya. Semoga selalu sukses ya.', 'Powered-by-Yayasan-AWS-Indonesia---SQUARE-2.png', 'Publish', 'JAKARTA', '1962-01-02', '0000-00-00 00:00:00', '2021-04-24 05:14:19'),
(3, 1, 'Perusahaan', 'Pemprov DKI Jakarta', 'Suprianto', 'Jl Permata No 1, Halim Perdanakusuma', '0813 8841 0829', 'http://bkddki.jakarta.go.id', 'lalu-kekah@bkkbn.go.id', 'Sebelumnya kami menggunakan website berbasis CMS Joomla. Saat ini website sudah diupdate dan berfungsi dengan baik sekali.', '5a1d2cd419e0c365574115.png', 'Publish', 'Depok', '2020-03-02', '0000-00-00 00:00:00', '2021-04-24 05:21:38'),
(5, 1, 'Perusahaan', 'Hotel Bumi Wiyata', 'Winda', 'Depok Town Square Lantai 2 Unit SS 5-7\r\nJl. Margonda Raya Kota Depok', '+6285715100485', 'https://hotelbumiwiyata.com', 'javawebmedia@gmail.com', 'Java Web Media sangat membantu proses pengembangan website kami. Menyediakan dan mempersiapkan konten mulai dari gambar hingga copy writing. Terimakasih', 'b7630a2a75006840b351bde15efe52be.jpg', 'Publish', 'Blora', '1983-02-22', '2021-04-24 07:34:12', '2021-04-24 05:21:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) UNSIGNED NOT NULL,
  `id_jabatan` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `nik` varchar(16) DEFAULT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `akses_level` enum('Dosen') NOT NULL DEFAULT 'Dosen',
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keahlian` text DEFAULT NULL,
  `jenis_jabatan` enum('Fungsional','Struktural') DEFAULT NULL,
  `status_dosen` enum('Tetap','Tidak Tetap') NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_user` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_jabatan`, `nik`, `nidn`, `nama`, `email`, `username`, `akses_level`, `token`, `password`, `gambar`, `alamat`, `telepon`, `website`, `keahlian`, `jenis_jabatan`, `status_dosen`, `tempat_lahir`, `tanggal_lahir`, `id_user`, `created_at`) VALUES
(1, 1, '18061207081111', '24232123123', 'arman', '', 'arman', 'Dosen', '', '', '4.jpg', 'Jl Permata No 1, Halim Perdanakusuma', '0813 8841 0829', 'https://sidatablkbogorkab.com', 'ada', NULL, 'Tetap', 'Depok', '1983-02-22', 2, '2024-01-02 15:13:51'),
(2, 2, '180212221222212', '1232323232323', 'agus', '', 'agus', 'Dosen', '', 'dc28d4424ece38803650f440d7eb1cb2b3fb6651', '6.jpg', 'Depok Town Square Lantai 2 Unit SS 5-7\r\nJl. Margonda Raya Kota Depok', '', 'https://javawebmedia.com', 'adsfasdfasdf', 'Struktural', 'Tidak Tetap', 'Depok', '2023-12-26', 1, '2024-01-02 15:14:00'),
(11, 1, '435345345', '345345', 'puri', '', '', 'Dosen', '', '', '512x512bb.jpg', 'asdfasdf', '345345345345', 'www.infocina.com', 'asdfasdf', 'Fungsional', 'Tetap', 'bandar lampung', '2024-01-31', 1, '2023-12-31 05:30:00'),
(17, 1, '234234234', '123123', 'GUNARDI', 'contoh@gmail.com', 'gunardi', 'Dosen', '', 'dc28d4424ece38803650f440d7eb1cb2b3fb6651', 'aa.jpg', 'pekon sidodadi kec. semaka kab. tanggamus', '081292946569', 'www.infocina.com', 'asdfasdfasdf', 'Struktural', 'Tetap', 'bandar lampung', '2023-12-31', 1, '2024-01-02 14:12:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Guru Besar'),
(2, 'Lektor Kepala'),
(3, 'Asisten Ahli'),
(4, 'Lektor'),
(5, 'Rektor'),
(6, 'Wakil Rektor'),
(7, 'Dekan'),
(8, 'Kajur'),
(9, 'Dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_mahasiswa`
--

CREATE TABLE `jumlah_mahasiswa` (
  `id_jumlah_mahasiswa` int(11) UNSIGNED NOT NULL,
  `id_tahun_akademik` int(11) DEFAULT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jumlah_mahasiswa`
--

INSERT INTO `jumlah_mahasiswa` (`id_jumlah_mahasiswa`, `id_tahun_akademik`, `jumlah_masuk`, `jumlah_keluar`) VALUES
(1, 1, 100, 100),
(2, 2, 300, 600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kategori_buku` varchar(255) NOT NULL,
  `nama_kategori_buku` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori_buku`, `id_user`, `slug_kategori_buku`, `nama_kategori_buku`, `urutan`, `hits`, `tanggal`) VALUES
(1, 1, 'buku-lain-lain', 'BUKU LAIN-LAIN', 10, 0, '2023-12-10 09:54:37'),
(2, 1, 'buku-ajar', 'BUKU AJAR', 1, 0, '2023-12-10 08:01:12'),
(3, 1, 'jurnal-nasional', 'JURNAL NASIONAL', 2, 0, '2023-12-10 09:54:18'),
(4, 1, 'jurnal-internasional', 'Jurnal Internasional', 3, 0, '2023-12-10 09:54:57'),
(5, 1, 'prosiding-nasional', 'Prosiding Nasional', 4, 0, '2023-12-10 09:55:37'),
(6, 1, 'prosiding-internasional', 'Prosiding Internasional', 5, 0, '2023-12-10 09:55:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_staff`
--

CREATE TABLE `kategori_staff` (
  `id_kategori_staff` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kategori_staff` varchar(255) NOT NULL,
  `nama_kategori_staff` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_staff`
--

INSERT INTO `kategori_staff` (`id_kategori_staff`, `id_user`, `slug_kategori_staff`, `nama_kategori_staff`, `urutan`, `hits`, `tanggal`) VALUES
(1, 0, 'pejabat-eselon-1', 'Pejabat Eselon 1', 1, 0, '2021-04-21 00:44:24'),
(2, 0, 'pejabat-struktural', 'Pejabat Struktural', 2, 0, '2021-04-21 00:44:24'),
(3, 1, 'team-inti', 'Team Inti', 2, 0, '2021-04-21 01:54:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `singkatan` varchar(255) DEFAULT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_cadangan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(400) DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `nama_facebook` varchar(255) DEFAULT NULL,
  `nama_twitter` varchar(255) DEFAULT NULL,
  `nama_instagram` varchar(255) DEFAULT NULL,
  `nama_youtube` varchar(255) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `protocol` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_timeout` int(11) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `singkatan`, `tagline`, `tentang`, `deskripsi`, `website`, `email`, `email_cadangan`, `alamat`, `telepon`, `hp`, `logo`, `icon`, `keywords`, `metatext`, `facebook`, `twitter`, `instagram`, `youtube`, `nama_facebook`, `nama_twitter`, `nama_instagram`, `nama_youtube`, `google_map`, `protocol`, `smtp_host`, `smtp_port`, `smtp_timeout`, `smtp_user`, `smtp_pass`, `tanggal`) VALUES
(1, 1, 'Aplikasi Kinerja Prodi', 'APKINDI', 'Aplikasi Kinerja Prodi', '<p><em><strong>PT Javawebmedia Edukasi</strong></em>&nbsp;atau Java Web Media berdiri pada tanggal 26 April 2010, berawal dari garasi rumah ukuran 3x4 meter. Java Web Media awalnya hanya bergerak di bidang pembuatan dan pengembangan website serta agensi desain grafis. Awal tahun 2011, perusahaan ini kemudian mulai bergerak di bidang pengembangan sumber daya manusia, khususnya di bidang keahlian computer&nbsp;<em>Graphic Design</em>,&nbsp;<em>Web Design</em>&nbsp;dan&nbsp;<em>Web Development.</em></p>\r\n<p>Lalu pada tahun 2014 Java Web Media resmi menjadi sebuah perusahaan yang terdaftar. Pada tahun 2014 itu pula kami membuka layanan kursus statistik.</p>\r\n<p>Java Web Media adalah lembaga kursus yang bergerak di bidang pendidikan khususnya kursus website, digital marketing, desain grafis dan statistik. Sampai saat ini Java Web Media sudah memiliki lulusan lebih dari 1200 orang dari berbagai status dan profesi mulai dari pelajar sekolah, mahasiswa, guru, dosen, staff profesional, freelancer, dll. Lulusan tidak hanya dari Indonesia tapi juga dari beberapa negara tetangga seperti New Zealand, Timor Leste dan Malaysia.</p>\r\n<p>Java Web Media membuka cabang pertamanya pada tahun 2014. Hingga tahun 2020 ini, Java Web Media telah memiliki 2 cabang yang berlokasi di kota Depok.</p>\r\n<p>Selain bergerak di bidang pendidikan Java Web Media juga memiliki layanan di bidang perencanaan strategis sistem informasi, pengembangan aplikasi berbasis web dan berbasis mobile (Android dan IOS/Apple).</p>', 'Pusat Kursus Private dan Reguler bidang Desain Grafis, Web Programming, Mobile Application dan Statistik', 'Bandar Lampung', 'Apkindi@gmail.com', 'Apkindi@gmail.com', '<p><strong>Java Web Media</strong><br>MALL DEPOK TOWN SQUARE<br>Lantai 2 Unit SS No. 5-7<br>(Samping Gerai Samsung)<br>Jl. Margonda Raya No 1<br>Kemiri Muka, Kecamatan Beji, Kota Depok, Jawa Barat 16424<br>Telepon: 085715100485<br>Whatsapp: +6281210697841<br>Email: contact@apkindi.co.id</p>', '+6285715100485', '+6281210697841', 'logo-java-web-media-01-01.png', 'abc.png', 'Java Web Media adalah Pusat Kursus Private dan Reguler bidang Desain Grafis, Web Programming, Mobile Application dan Statistik\r\n', '', 'https://www.facebook.com/javawebmedia', 'http://twitter.com/javawebmedia', 'https://instagram.com/javawebmedia', 'https://www.youtube.com/channel/UCmm6mFZXYQ3ZylUMa0Tmc2Q', 'Apkindi', 'Apkindi', 'Apkindi', 'Apkindi', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1145209004862!2d106.82752101476999!3d-6.379215695384046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec0869e31b4f%3A0xaa40278d69385917!2sHotel+Bumi+Wiyata!5e0!3m2!1sid!2sid!4v1532643481549\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'smtp', 'ssl://mail.websitemu.com', 465, 7, 'contact@websitemu.com', 'muhammad', '2023-12-31 09:35:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_staff` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `keahlian` text DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `status_staff` varchar(20) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id_staff`, `id_user`, `id_kategori_staff`, `nama`, `alamat`, `telepon`, `website`, `email`, `jabatan`, `keahlian`, `gambar`, `status_staff`, `tempat_lahir`, `tanggal_lahir`, `tanggal`) VALUES
(9, 1, 3, 'Andoyo Cakep', 'Jl Permata No 1, Halim Perdanakusuma', '0813 8841 0829', 'https://sidatablkbogorkab.com', 'lalu-kekah@bkkbn.go.id', 'Direktur', 'ada', '6.jpg', 'Publish', 'Depok', '1983-02-22', '2021-04-24 01:51:22'),
(10, 1, 3, 'Andoyo Cakep', 'Depok Town Square Lantai 2 Unit SS 5-7\r\nJl. Margonda Raya Kota Depok', '+6285715100485', 'https://javawebmedia.com', 'javawebmedia@gmail.com', 'Graphic Designer', '', '4.jpg', 'Publish', 'Depok', '1983-02-22', '2021-04-24 01:50:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(11) UNSIGNED NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `semester`, `periode`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, '2022/2023', 1, 'Gelombang I', '2023-02-01', '2023-01-31'),
(2, '2022/2023', 2, 'Gelombang II', '2023-02-01', '2023-06-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `akses_level` varchar(50) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `nama`, `email`, `username`, `password`, `akses_level`, `token`, `keterangan`, `tanggal_post`, `tanggal`) VALUES
(1, 1, 'agus sulistiono', 'agussulistiono0@gmail.com', 'admin', 'dc28d4424ece38803650f440d7eb1cb2b3fb6651', 'admin', '', '', '2019-10-12 15:50:21', '2024-01-02 11:03:52'),
(2, 2, 'gunardi', 'gundowino@gmail.com', 'gunardiadmin', 'dc28d4424ece38803650f440d7eb1cb2b3fb6651', 'admin', '', '', '2019-04-24 17:21:18', '2024-01-02 14:45:16'),
(3, 3, 'puri', 'gusmakreatif1@gmail.com', 'staff', 'dc28d4424ece38803650f440d7eb1cb2b3fb6651', 'admin', '', '<p>adada</p>', '2019-10-12 14:10:05', '2024-01-02 11:04:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_logs`
--

CREATE TABLE `user_logs` (
  `id_user_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tanggal_updates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_logs`
--

INSERT INTO `user_logs` (`id_user_log`, `id_user`, `ip_address`, `username`, `url`, `tanggal_updates`) VALUES
(1405, 3, '::1', 'staff', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 11:08:49'),
(1406, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 11:09:31'),
(1407, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 11:26:36'),
(1408, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 11:29:05'),
(1409, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 12:47:25'),
(1410, 1, '::1', 'admin', 'http://localhost/appkindi/admin/kategori_buku', '2024-01-02 12:47:34'),
(1411, 1, '::1', 'admin', 'http://localhost/appkindi/admin/tahunakademik', '2024-01-02 12:47:44'),
(1412, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dosen', '2024-01-02 12:47:55'),
(1413, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 12:48:04'),
(1414, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/reportbuku', '2024-01-02 12:48:08'),
(1415, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/detailperdosen/1', '2024-01-02 12:48:11'),
(1416, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/reportbuku', '2024-01-02 12:48:22'),
(1417, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 12:48:23'),
(1418, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 12:48:31'),
(1419, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/15', '2024-01-02 12:48:34'),
(1420, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/reportbuku', '2024-01-02 12:48:46'),
(1421, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 12:53:04'),
(1422, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/15', '2024-01-02 12:53:07'),
(1423, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 12:53:12'),
(1424, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 12:53:16'),
(1425, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 14:21:48'),
(1426, 1, '::1', 'admin', 'http://localhost/appkindi/admin/kategori_buku', '2024-01-02 14:37:43'),
(1427, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 14:37:51'),
(1428, 1, '::1', 'admin', 'http://localhost/appkindi/admin/kategori_buku', '2024-01-02 14:40:36'),
(1429, 1, '::1', 'gunardi', 'http://localhost/appkindi/admin/kategori_buku', '2024-01-02 14:44:17'),
(1430, 2, '::1', 'gunardi', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 14:44:27'),
(1431, 2, '::1', 'gunardi', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 14:44:37'),
(1432, 2, '::1', 'gunardi', 'http://localhost/appkindi/admin/dosen', '2024-01-02 14:44:40'),
(1433, 2, '::1', 'gunardi', 'http://localhost/appkindi/admin/buku', '2024-01-02 14:44:42'),
(1434, 2, '::1', 'gunardi', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 14:44:58'),
(1435, 1, '::1', 'gunardi', 'http://localhost/appkindi/admin/panduan', '2024-01-02 14:47:29'),
(1436, 1, '::1', 'gunardi', 'http://localhost/appkindi/admin/kategori_buku', '2024-01-02 14:51:31'),
(1437, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 15:14:35'),
(1438, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/reportbuku', '2024-01-02 15:14:47'),
(1439, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/detailperdosen/1', '2024-01-02 15:14:49'),
(1440, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:14:54'),
(1441, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/15', '2024-01-02 15:14:57'),
(1442, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/15', '2024-01-02 15:15:13'),
(1443, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:15:13'),
(1444, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:15:22'),
(1445, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:15:29'),
(1446, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:15:39'),
(1447, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:15:43'),
(1448, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:15:46'),
(1449, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:15:51'),
(1450, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:15:57'),
(1451, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:16:05'),
(1452, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:16:11'),
(1453, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:16:18'),
(1454, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:17:33'),
(1455, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:18:10'),
(1456, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:18:13'),
(1457, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:18:35'),
(1458, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:18:35'),
(1459, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:18:40'),
(1460, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:18:45'),
(1461, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:18:55'),
(1462, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:18:55'),
(1463, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/10', '2024-01-02 15:19:01'),
(1464, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:19:04'),
(1465, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/10', '2024-01-02 15:19:06'),
(1466, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:19:08'),
(1467, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/15', '2024-01-02 15:19:10'),
(1468, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/10', '2024-01-02 15:19:13'),
(1469, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:19:17'),
(1470, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:20:11'),
(1471, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:20:14'),
(1472, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:20:19'),
(1473, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:20:19'),
(1474, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:22:13'),
(1475, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:22:16'),
(1476, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:22:17'),
(1477, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/10', '2024-01-02 15:22:19'),
(1478, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:22:24'),
(1479, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:24:57'),
(1480, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:24:59'),
(1481, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:25:17'),
(1482, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:25:17'),
(1483, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/10', '2024-01-02 15:25:21'),
(1484, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:25:22'),
(1485, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:26:35'),
(1486, 1, '::1', 'admin', 'http://localhost/appkindi/admin/dasbor', '2024-01-02 15:26:49'),
(1487, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:26:53'),
(1488, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:27:09'),
(1489, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/15', '2024-01-02 15:27:11'),
(1490, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/15', '2024-01-02 15:27:18'),
(1491, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:27:18'),
(1492, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/15', '2024-01-02 15:27:34'),
(1493, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:27:38'),
(1494, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/edit/10', '2024-01-02 15:27:47'),
(1495, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku', '2024-01-02 15:27:47'),
(1496, 1, '::1', 'admin', 'http://localhost/appkindi/admin/buku/unduh/10', '2024-01-02 15:27:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`) USING BTREE;

--
-- Indeks untuk tabel `jumlah_mahasiswa`
--
ALTER TABLE `jumlah_mahasiswa`
  ADD PRIMARY KEY (`id_jumlah_mahasiswa`),
  ADD KEY `tahun_akademik` (`id_tahun_akademik`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indeks untuk tabel `kategori_staff`
--
ALTER TABLE `kategori_staff`
  ADD PRIMARY KEY (`id_kategori_staff`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id_user_log`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jumlah_mahasiswa`
--
ALTER TABLE `jumlah_mahasiswa`
  MODIFY `id_jumlah_mahasiswa` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_staff`
--
ALTER TABLE `kategori_staff`
  MODIFY `id_kategori_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id_user_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1497;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
