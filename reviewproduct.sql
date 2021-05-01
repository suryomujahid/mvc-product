-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 05:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reviewproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenisID` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenisID`, `jenis`) VALUES
(17, 'Bahan Baku'),
(23, 'Ketoprak'),
(24, 'Baso'),
(25, 'Makanan'),
(29, '( Í¡Â° ÍœÊ– Í¡Â°)');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(13, 'admin', 'MTIz'),
(22, 'akunbaru', 'MTIz'),
(23, 'raeha', 'MTIz');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenisID` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tglinput` date NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `nama`, `jenisID`, `foto`, `tglinput`, `ket`) VALUES
(6, 'mid-ball', 17, 'headless soldier.png', '2021-04-30', 'wew'),
(11, 'Ketoprak', 23, 'ketoprak.jpg', '2021-04-30', 'enak iya'),
(12, 'Testa', 17, 'dab.gif', '2021-04-30', '123'),
(16, 'hehe', 24, 'facecreeper.png', '2021-04-30', 'iya'),
(29, 'makanan favorit', 25, 'indomie seleraku.png', '2021-04-30', 'kos'),
(32, 'gor batagor', 29, 'sudah kubilang.jpg', '2021-04-30', 'bogor'),
(33, 'bajigur', 25, '', '2021-04-30', 'enaj'),
(34, 'bajaj gore', 29, '', '2021-04-30', 'yea'),
(35, 'hutang', 29, '', '2021-04-30', 'joe mama'),
(36, 'gak ada foto', 23, '', '2021-04-30', 'benar'),
(37, 'satu lagi', 25, '', '2021-04-30', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenisID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
