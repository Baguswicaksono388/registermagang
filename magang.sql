-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2019 pada 07.56
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`, `image`) VALUES
(1, 'baguswicaksono388@gmail.com', 'Bagus Wicaksono4', '$2y$10$QnbK7AqB3CKJEO/9gcy.VOo/ynADD0FGHBPzrDBI13rgwsg33Ti1y', 'user.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_token`
--

CREATE TABLE `admin_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_token`
--

INSERT INTO `admin_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'baguswicaksono388@gmail.com', 'gvBZIUaczCWTK0arPeTVZ7YhMVBn29Cb+g811tVCEg0=', '2019-10-10 10:05:23'),
(2, 'baguswicaksono388@gmail.com', 'r3+3Z+s9af+ZV2VJlHnJYPqXiAd5vMemp70kwdvjbMk=', '2019-10-16 11:49:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `message_token` varchar(128) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `email`, `message`, `message_token`, `created`) VALUES
(12, 'baguswicaksono388@gmail.com', '<p>Kpd. Yth Saudara</p>\r\n\r\n<p>Dengan dikirimya e-mail ini, maka anda dimohon untuk&nbsp;<strong>mengirim e-mail&nbsp;</strong>kembali dikarenakan data yang anda masukkan ada kesalahan.</p>\r\n\r\n<p>Terima Kasih</p>\r\n\r\n<p>HRD</p>\r\n', 'j8krI9N62xAinThcMGWMlqSJ+AuUNv/YHf7rwKNaWFbtawPL1aYyB+8UB81S8rV0y3VDW9kbbSc9tOLCNXUhHw==', '2019-10-07 15:29:16'),
(13, 'baguswicaksono388@gmail.com', '<p>Coba lah mengerti</p>\r\n', 'zRqyWzLHi/HTOsbJTy4vARjDUyu4QWuP1f9mGgb9ZrTFAlT7ctR7lP9OquXydldDQZRVi5AR1KI3sJYNi5zU5A==', '2019-10-08 14:43:37'),
(14, 'baguswicaksono388@gmail.com', '<p><strong>Bagus&nbsp;</strong></p>\r\n', '/tvm+yUbFabodfFLUzS0uw5P7z/c07mxcZxnAq+AYHgWFW7swFShoibzNIznEl0hMGwFI8N9NTlG10+zZP5izg==', '2019-10-10 14:20:26'),
(15, 'baguswicaksono388@gmail.com', '<p><strong>testing</strong></p>\r\n\r\n<p><strong>catattan :</strong></p>\r\n\r\n<ol>\r\n	<li><strong>ghhgh</strong></li>\r\n</ol>\r\n', '1V9o6MD+dDt48lNAdDzYqsvEPqiiyHa+qmXe94sjut9IaHVZ0JO52iiBczohItNEBP+WDTrjAtSUn2jki+nLFA==', '2019-10-11 09:22:25'),
(16, 'baguswicaksono388@gmail.com', '<p>testing</p>\r\n', 'LaBrkDNDZWQAmMj6zkRvYexH3ljaAZmj8s45pMXxEHl/arTXBTGZWpqMkfZ0QhB/aef2mMDGQ3I6dweLI6Iu3A==', '2019-10-11 09:23:12'),
(17, 'baguswicaksono388@gmail.com', '<p>asas</p>\r\n', '/cuff71jd3wKg+u5WARvc16OaS0BLub9gxwKxPPIFfhrZH6dOS0C/ZXTSnYM+8XVJIyH2abn8g/755b4Jk7G/g==', '2019-10-16 11:52:04'),
(18, 'baguswicaksono388@gmail.com', '<p>Coba</p>\r\n', 'kB1CxGSKLNNU3MoFhRFbxhNlGC6ebKoJIVsNsFLhfWZrwo8PVD+ZwJuAc74TrH4vdNkHgNBjcGNFnxnwuGd3eA==', '2019-10-16 11:53:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resgistrant`
--

CREATE TABLE `resgistrant` (
  `id` int(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `instance` varchar(128) NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `create_at` datetime NOT NULL,
  `photo` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `status_magang` int(2) NOT NULL,
  `recomended` enum('n','y') DEFAULT NULL,
  `note` text NOT NULL,
  `angkatan` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resgistrant`
--

INSERT INTO `resgistrant` (`id`, `name`, `email`, `phone`, `instance`, `start`, `finish`, `create_at`, `photo`, `status`, `status_magang`, `recomended`, `note`, `angkatan`, `is_deleted`) VALUES
(12, 'Bagus Wicaksono', 'baguswicaksono388@gmail.com', '083863578661', 'IST Akprind', '2019-10-11', '2019-10-31', '2019-10-07 14:34:03', 'parara.PNG', 2, 1, 'n', '', 2019, 0),
(13, 'Bagus', 'bagus@gmail.com', '083863578661', 'UNY', '2018-06-13', '2018-07-28', '2019-10-07 14:35:16', 'skeleton.PNG', 0, 0, 'n', '', 2018, 0),
(14, 'coba', 'coba@coba.com', '083863578661', 'UGM', '2017-01-04', '2017-03-22', '2019-10-07 14:36:09', 'Capture.PNG', 1, 0, 'n', '', 2017, 0),
(15, 'Bagus Wicaksono Fiks', 'baguswicaksono388@gmail.com', '083863578661', 'IST Akprind', '2019-10-07', '2019-11-30', '2019-10-07 21:02:52', 'parara1.PNG', 2, 2, 'y', 'Ini dari Confirm Finish, Rekomendasi dan sudah selesai magang', 2019, 0),
(16, 'Yusuf Abdullah', 'yusuf@gmail.com', '083863578661', 'IST Akprind', '2019-10-23', '2019-12-11', '2019-10-09 06:17:21', 'Capture001.png', 2, 1, NULL, '', 2019, 0),
(17, 'Testing', 'test@test.com', '083863578661', 'UTY', '2019-10-17', '2019-10-31', '2019-10-10 14:15:28', 'parara.PNG', 2, 0, NULL, '', 2019, 0),
(18, 'Testing', 'testing@testing.com', '083863578661', 'Testing', '2019-10-18', '2019-10-25', '2019-10-11 09:14:54', 'parara.PNG', 2, 0, NULL, '', 2019, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `registration_year` int(11) NOT NULL,
  `active` varchar(128) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `years`
--

INSERT INTO `years` (`id`, `registration_year`, `active`, `create_at`) VALUES
(8, 2019, 'active', '2019-10-07 10:16:26'),
(9, 2017, 'active', '0000-00-00 00:00:00'),
(10, 2018, 'active', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_token`
--
ALTER TABLE `admin_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resgistrant`
--
ALTER TABLE `resgistrant`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `admin_token`
--
ALTER TABLE `admin_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `resgistrant`
--
ALTER TABLE `resgistrant`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
