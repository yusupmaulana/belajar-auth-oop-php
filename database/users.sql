-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Des 2017 pada 04.47
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth_oop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(14, 'yusup', '$2y$10$cn0LVtuMQYrZfHTln2h1BegL0/6iZxPjIMKOGPRcJldJnF2dy9FIO', 1),
(24, 'imam', '$2y$10$QABi5VuBRySvsGHOCjVSR.XAQSstEbsVseXCuH3jii53AbSeg/sni', 0),
(26, 'hana', '$2y$10$uuGZL9P7.VBkpBjpTjsvjeU/pp73QbYObiIqoZJ/1ZFWuyY7CtJcq', 0),
(27, 'novita', '$2y$10$5SDuA4PYs43Cxuhn46N90OWeVGL1wIl5G4bgZJT0WhV2n6kP5qXW2', 0),
(28, 'riki', '$2y$10$C8n8v4NPXDp8hcoN9Bsfde826SHwTnW3GciXY9tU4Eob4Pf6IeFnq', 0),
(29, 'parulian', '$2y$10$Hi7fjryYHHrQRnlTU9HgZ.H4980i/V7N1TSsER/S4W.NzKdReoJHm', 0),
(30, 'nizar', '$2y$10$7NiUO.BJBfEaUxx5lQdROey5Tqfoxf4EB5eTbh1ANcTL/qEeTHgDO', 0),
(31, 'abu', '$2y$10$34.5Dkqnhs9aFdT5Klqr4.SlXVTbWfumYuds6J8Sl8rfGl8WhioQu', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
