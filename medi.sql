

#db name = medicine





-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 10:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `medi`
--

CREATE TABLE `medi` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` varchar(25) NOT NULL,
  `manufacture` date NOT NULL,
  `expiry` date NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medi`
--

INSERT INTO `medi` (`id`, `name`, `quantity`, `manufacture`, `expiry`, `brand`, `type`) VALUES
(16, 'aloweraa', '50mg', '2022-03-02', '2022-10-08', 'kohoba', 'lotion'),
(17, 'strepsil', '120mg', '2022-01-02', '2022-07-08', 'steps', 'Tablet'),
(20, 'akarma', '1200mg', '2022-03-04', '2022-03-05', 'kohoba', 'Syrup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medi`
--
ALTER TABLE `medi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medi`
--
ALTER TABLE `medi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
