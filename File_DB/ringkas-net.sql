-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 04:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ringkas-net`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(40) NOT NULL,
  `isi_blog` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `rating` smallint(6) NOT NULL,
  `komentar` text NOT NULL,
  `nama_penilai` varchar(40) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `username` varchar(400) NOT NULL,
  `email` varchar(80) NOT NULL,
  `dateofbirth` date NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `password` text NOT NULL,
  `usertype` smallint(6) NOT NULL,
  `token` text NOT NULL,
  `verified` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `namalengkap`, `username`, `email`, `dateofbirth`, `phone_number`, `password`, `usertype`, `token`, `verified`) VALUES
(6, 'Muhammad Alif Hidayatullah', 'ancreatures', 'alifw50@gmail.com', '2001-01-20', '6254926261882', '$2y$10$qdgsErRanHEbFdrS5QsHEutDiyj/V5nlh5KlViUUbPkzAhknyGAwa', 1, 'b9f9a9bcee03344b10591cc6b013f69f87f244ae486005b45fe6957c500b8107584a8c50300a5f14a41fc52dfe9a57f75803', 1),
(7, 'Net-Ringkas', 'Net-Ringkas', 'netringkas@gmail.com', '2021-05-28', '628123456789', '$2y$10$uzNbOI3t.dzhsVEGxxbhA./BP331tRM7A.Ohv3IFAv.c/NQO26XWe', 0, 'c7d10b99172cb68ee71c0925d59202550977d9d6be4c9293d9257f7def96e368a18c962b9c5c815380add3e7b53de8ff11f1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
