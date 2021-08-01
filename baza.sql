-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 09:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `komentari` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listaproizvoda`
--

CREATE TABLE `listaproizvoda` (
  `id` int(11) NOT NULL,
  `naziv` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(32) NOT NULL,
  `ocena` int(2) NOT NULL,
  `tipproizvodaid` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listaproizvoda`
--

INSERT INTO `listaproizvoda` (`id`, `naziv`, `slika`, `opis`, `cena`, `ocena`, `tipproizvodaid`) VALUES
(1, 'Rubikova kocka 2x2', 'images/kocka2x2.png', 'Rubikova kocka sa 2x2 stranama.', 2500, 5, 1),
(2, 'Rubikova kocka 3x3', 'images/kocka3x3.png', 'Rubikova kocka sa 3x3 stranama.', 1500, 4, 1),
(3, 'Rubikova kocka 4x4', 'images/kocka4x4.png', 'Rubikova kocka sa 4x4 stranama.', 2000, 4, 1),
(4, 'Slagalica 2000 delova', 'images/slagalica2000delova.png', 'Slagalica od 2000 delova', 1000, 2, 2),
(5, 'Druga slagalica 2000 delova', 'images/slagalica2000delova2.png', 'Slagalica od 2000 delova', 1200, 4, 2),
(6, 'Slagalica 5000 delova', 'images/slagalica5000delova.png', 'Slagalica od 5000 delova', 2000, 5, 2),
(7, 'Drvena kocka', 'images/drvenaKocka.png', 'Drvena kocka', 500, 1, 3),
(8, 'Kamera puzla', 'images/kameraPuzla.png', 'Kamera puzla', 1000, 3, 3),
(9, 'Oslobadjanje prstena', 'images/oslobadjanjePrstena.png', 'Oslobadjanje prstena', 1000, 3, 3),
(10, 'Rubikova kocka igracka', '', 'Primer', 1000, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id` int(11) NOT NULL,
  `naziv` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id`, `naziv`, `link`) VALUES
(1, 'PROIZVODI', 'proizvodi'),
(2, 'DOKUMENTACIJA', 'dokumntacija.php'),
(3, 'AUTOR', 'autor');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `idusera` int(11) NOT NULL,
  `idproizvoda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipoviproizvoda`
--

CREATE TABLE `tipoviproizvoda` (
  `id` int(11) NOT NULL,
  `naziv` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipoviproizvoda`
--

INSERT INTO `tipoviproizvoda` (`id`, `naziv`) VALUES
(1, 'Kocke'),
(2, 'Slagalice'),
(3, 'Drvene puzle');

-- --------------------------------------------------------

--
-- Table structure for table `useri`
--

CREATE TABLE `useri` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `useri`
--

INSERT INTO `useri` (`id`, `username`, `password`, `email`) VALUES
(13, 'sreten', '827ccb0eea8a706c4c34a16891f84e7b', 'sretenvl@yahoo.com'),
(14, 'marina', '827ccb0eea8a706c4c34a16891f84e7b', 'sale@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listaproizvoda`
--
ALTER TABLE `listaproizvoda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipproizvodaid` (`tipproizvodaid`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipoviproizvoda`
--
ALTER TABLE `tipoviproizvoda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useri`
--
ALTER TABLE `useri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listaproizvoda`
--
ALTER TABLE `listaproizvoda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipoviproizvoda`
--
ALTER TABLE `tipoviproizvoda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `useri`
--
ALTER TABLE `useri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listaproizvoda`
--
ALTER TABLE `listaproizvoda`
  ADD CONSTRAINT `listaproizvoda_ibfk_1` FOREIGN KEY (`tipproizvodaid`) REFERENCES `tipoviproizvoda` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
