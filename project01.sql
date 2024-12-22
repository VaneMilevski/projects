-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 10:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project01`
--

-- --------------------------------------------------------

--
-- Table structure for table `hirestudent`
--

CREATE TABLE `hirestudent` (
  `id` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` bigint(12) NOT NULL,
  `student` enum('marketing','coding','data-science','design') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hirestudent`
--

INSERT INTO `hirestudent` (`id`, `fullName`, `companyName`, `email`, `number`, `student`) VALUES
(1, 'Vane Milevski', 'Transformare GmbH', 'v.milevski@transformare.com', 123, 'coding'),
(7, 'Mile Vanevski', 'Schacht', 'M.Vanevski@schacht.tech', 123, 'marketing'),
(9, 'Goran  Stojanov', 'TETEKS', 'Goran@gmail.com', 123, 'design');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hirestudent`
--
ALTER TABLE `hirestudent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hirestudent`
--
ALTER TABLE `hirestudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
