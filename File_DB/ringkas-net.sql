-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 08:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.19

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
  `views` int(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `uid`, `judul`, `penulis`, `isi_blog`, `gambar`, `views`, `created`, `modified`) VALUES
(14, 8, 'Grandfather Leninas', 'catharsis', '<p>Aku memiliki rumah yang terletak di lereng gunung dan dekat dengan sawah. Rumahku tepat berada di depan jalan untuk menuju gunung.<br />\r\n<br />\r\nDi sebelah kiri rumahku terdapat masjid yang cukup besar yang biasanya digunakan untuk shalat Idul Adha. Di depan rumahku terdapat halaman yang cukup luas dan biasanya digunakan untuk bermain anak-anak kecil di sekitar rumah.<br />\r\n<br />\r\nCat rumahku berwarna hijau muda dan kusennya berwarna hijau tua. Pintu rumahku juga berwarna hijau tua. Rumahku tidak terlalu besar namun cukup untuk menampung 10 orang, karena terdapat lantai 2 yang dapat dihuni.<br />\r\n<br />\r\nDi lantai 2 cat dinding bagian depan berwarna orange. Sementara pada jendela, kusen dan pintunya berwarna merah. Dari jauh rumahku sangat mencolok karena perpaduan dua warna tersebut.<br />\r\n<br />\r\nDi bagian depan terdapat teras yang biasa untuk duduk santai dengan keluarga. Jika masuk pintu depan akan langsung menuju ruang tamu, dan di sebelah kiri tersedia ruang lesehan dan disediakan televisi. Biasanya di sini pusat keluarga kami berkumpul.<br />\r\n<br />\r\nDi ruang lesehan itu terdapat pintu untuk masuk ke ruang tengah. Di ruang tengah ini cukup luas dan terdapat satu set meja dan kursi makan yang biasanya kami gunakan untuk makan bersama, di ruangan ini juga ada akuarium ikan.</p>\r\n', '66-7.jpg', 0, '2021-06-01 15:47:47', '2021-06-03 00:46:47'),
(16, 6, 'Injustice', 'Ancreatures', '<p><strong>Di dalam rumah ada seekor kucing jenis Persia yang bernama Milo. Milo merupakan satu &ndash; satunya kucing kesayanganku.</strong></p>\r\n\r\n<p><em>Milo memiliki sifat yang aktif dan cukup manja. Ia suka sekali dibelai dengan lembut sembari tidur di pangkuanku.</em></p>\r\n\r\n<p><u>Salah satu kebiasaan Milo yakni selalu menyambutku ketika pulang ke rumah. Ia bahkan selalu&nbsp;<em>stay</em>&nbsp;di depan pintu ketika aku membuka pintu. Lalu ia pun akan segera mengikutiku menuju kamar serta meletakkan tas di meja.</u></p>\r\n\r\n<p><s>Sebab setiap hari aku harus belajar, aku pun langsung berbaring di tempat tidur selepas pulang.</s></p>\r\n\r\n<p><span style=\"background-color:#9b59b6\">Milo sekali menemaniku ketika tiduran. Aku pun tak pernah lupa untuk mengelus &ndash; elus kepalanya. Kadang kali kita berdua tak sengaja tertidur sampai larut malam.</span></p>\r\n\r\n<p><span style=\"color:#2ecc71\">Tak hanya suka berada di dekatku, Milo juga memiliki hobi makan. Porsi makanan Milo bahkan jauh lebih besar dibandingkan dengan porsi makananku. Ia sangat gemar dengan keju cheddar. Namun Milo juga suka sekali dengan susu.</span></p>\r\n\r\n<p style=\"text-align:center\">Namun aku lebih sering memberinya berupa makanan kemasan. Hal tersebut aku lakukan guna menekan biaya pengeluaran. Karena harga keju itu lebih mahal dibandingkan dengan harga makanan kucing kemasan.</p>\r\n\r\n<p style=\"text-align:right\">Sehingga hanya sesekali aku akan memberinya makanan berupa keju. Ketika Milo memakan keju, ia akan memakannya dengan sangat lahap hingga menghabiskan hampir 500 gr keju untuk sekali makan. Sementara untuk susu, memang aku berikan dengan rutin.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.yuksinau.id/wp-content/uploads/2020/10/contoh-teks-deskripsi-tentang-hewan.jpg\" style=\"height:225px; width:400px\" /></p>\r\n\r\n<p>Milo memiliki bulu yang cukup panjang dan lebat. Warna bulu Milo adalah putih. Tubuh Milo juga sangat gemuk dan juga berisi. Hidung Milo sangat pesek, bahkan hampir tidak terlihat serta tersamarkan dengan wajahnya yang chubby.</p>\r\n\r\n<p>Milo merupakan hadiah pemberian dari nenek pada ulang tahunku yang ke 10 tahun. Pada mulanya aku memang tak menyukai hadiah tersebut, namun selepas mengenal sifat Milo aku menjadi sangat sayang kepadanya.</p>\r\n\r\n<p>Karakter Milo juga tidak terlalu liar. Ia justru termasuk ke dalam jenis kucing pendiam serta tidak banyak tingkah. Itulah mengapa aku sangat menyukai Milo.</p>\r\n', '641-36.jpg', 0, '2021-06-02 22:19:54', '2021-06-03 00:46:53'),
(20, 6, 'Lucid Dreams', 'Ancreatures', '<p>Sekolahku mempunyai lingkungan yang sangat bersih dan indah, serta mempunyai suasana dengan udara segar nan sejuk. Sebab sekolahku terletak tepat di bawah lereng Gunung Merapi.</p>\r\n\r\n<p>Di bagian depan sekolah terdapat halaman parkir dan juga lapangan bola voli yang luas. Kemudian di bagian samping kiri sekolah telah ditumbuhi dengan beragam macam tumbuhan yang turut melengkapi keindahan sekolahku.</p>\r\n\r\n<p>Sebab sekolahku masuk ke dalam sekolah favorit, seluruh lantai di dalam ruangan sudah menggunakan keramik. Sekolah ini mempunyai sekitar 30 ruang kelas, sehingga sekolahku nampak sangat luas. Sebab seluruh ruang kelasnya terletak tepat di atas tanah atau tidak bertingkat.</p>\r\n\r\n<p>Sekolahku mempunyai satu buah masjid yang biasa dipakai untuk sholat oleh guru dan juga siswa. Tak hanya itu, masjid yang ada di sekolahku juga biasa dipakai untuk penyelenggaraan kegiatan sekolah. Seperti pondok ramadhan, presentasi dan untuk pelajaran agama.</p>\r\n\r\n<p>Sebab termasuk sebagai salah satu sekolah yang maju, sekolahku mempunyai 4 laboratorium yang berbeda. Warna seragam olahraga merah hitam menjadi karakteristik yang khas dari sekolahku. Tak hanya itu, waktu masuk yang cepat juga menjadi salah satu keunikan sekolahku ini.</p>\r\n', '785-4.jpg', 2, '2021-06-03 00:53:14', '2021-06-03 00:59:06');

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
(6, 'Muhammad Alif Hidayatullah', 'Ancreatures', 'alifw50@gmail.com', '2001-01-20', '6254926261882', '$2y$10$qdgsErRanHEbFdrS5QsHEutDiyj/V5nlh5KlViUUbPkzAhknyGAwa', 1, 'b9f9a9bcee03344b10591cc6b013f69f87f244ae486005b45fe6957c500b8107584a8c50300a5f14a41fc52dfe9a57f75803', 1),
(7, 'Net-Ringkas', 'Net-Ringkas', 'netringkas@gmail.com', '2021-05-28', '628123456789', '$2y$10$uzNbOI3t.dzhsVEGxxbhA./BP331tRM7A.Ohv3IFAv.c/NQO26XWe', 0, 'c7d10b99172cb68ee71c0925d59202550977d9d6be4c9293d9257f7def96e368a18c962b9c5c815380add3e7b53de8ff11f1', 1),
(8, 'Bimo Praytino', 'catharsis', 'lifecatharsis@gmail.com', '2001-01-20', '6227395610441', '$2y$10$l8LWYkBA7nA1dMEoMgQCmemaGADf8TYfAiGTGsPjen0ET3cgqtddi', 1, '050e3d2986e43f2047ec62537abebf62a4e1330793af99fc08238d57144653a8ffcd2660c820b19c15ca3758f90b8c0060c5', 1);

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
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
