-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 09:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `numero_fiche` int(11) NOT NULL,
  `envoyeur` varchar(250) NOT NULL,
  `heure_envoie` datetime NOT NULL,
  `receveur` varchar(250) NOT NULL,
  `heure_reception` datetime NOT NULL,
  `temps_attente` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `numero_fiche`, `envoyeur`, `heure_envoie`, `receveur`, `heure_reception`, `temps_attente`) VALUES
(3, 2, 'Carol', '2021-04-08 03:52:37', 'Ferrari', '2021-04-08 06:52:37', '00:00:00'),
(10, 3, 'Kenneth', '2021-04-08 10:36:06', 'Simons', '2021-04-08 21:52:06', '00:00:00'),
(11, 4, 'Dona', '2021-04-08 04:21:38', 'Huber', '2021-04-08 08:03:38', '00:00:00'),
(12, 5, 'Williamr', '2021-04-08 07:41:02', 'Soliz', '2021-04-08 09:33:02', '00:00:00'),
(14, 6, 'Sarah bercy', '2021-04-08 08:50:30', 'Anne', '2021-04-08 09:40:00', '00:00:00'),
(17, 7, 'Stéphanie', '2021-03-31 00:00:00', 'Ritchmond', '2021-04-04 00:00:00', '00:00:00'),
(19, 8, 'Marcus', '2021-04-12 00:00:00', 'Elisabeth', '2021-04-12 00:00:00', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
