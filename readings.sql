-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 04:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `readings`
--

CREATE TABLE `readings` (
  `id` int(11) NOT NULL,
  `temperature` varchar(10) DEFAULT NULL,
  `humidity` varchar(10) DEFAULT NULL,
  `co` varchar(10) DEFAULT NULL,
  `ch4` varchar(10) DEFAULT NULL,
  `h` varchar(10) DEFAULT NULL,
  `oh` varchar(10) DEFAULT NULL,
  `smoke` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readings`
--

INSERT INTO `readings` (`id`, `temperature`, `humidity`, `co`, `ch4`, `h`, `oh`, `smoke`, `created_at`) VALUES
(1, '35°C', '60%', '35ppm', '1.2ppm', '40ppm', '50ppm', '60µg/m³', '2025-05-10 20:10:17'),
(3, '28°C', '55%', '30ppm', '1.0ppm', '35ppm', '45ppm', '55µg/m³', '2025-05-11 23:22:28'),
(4, '30°C', '40%', '50ppm', '2.0ppm', '37ppm', '47µg/m³', '57µg/m³', '2025-05-11 23:23:40'),
(5, '28°C', '55%', '30ppm', '1.0ppm', '35ppm', '45ppm', '55µg/m³', '2025-05-11 23:26:48'),
(6, '30°C', '50%', '32ppm', '1.1ppm', '38ppm', '48ppm', '58µg/m³', '2025-05-11 23:26:48'),
(7, '32°C', '52%', '34ppm', '1.2ppm', '40ppm', '50.3ppm', '60µg/m³', '2025-05-11 23:26:48'),
(8, '28°C', '55%', '30ppm', '1.0ppm', '35ppm', '45ppm', '55µg/m³', '2025-05-13 00:34:24'),
(9, '28°C', '55%', '30ppm', '1.0ppm', '35ppm', '45ppm', '55µg/m³', '2025-05-13 01:22:10'),
(10, '32°C', '66%', '44ppm', '55ppm', '66ppm', '44ppm', '33µg/m³', '2025-05-13 01:24:08'),
(11, '27.5', '60', '21', '5', '7', '3', '30', '2025-05-15 13:32:17'),
(12, '27.5', '60', '21', '5', '7', '3', '30', '2025-05-15 13:35:36'),
(13, '27.5', '60', '21', '5', '7', '3', '30', '2025-05-15 13:37:40'),
(14, '27.5', '60', '21', '5', '7', '3', '30', '2025-05-15 14:15:19'),
(15, '55', '66', '44', '77', '99', '33', '22', '2025-05-15 14:17:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `readings`
--
ALTER TABLE `readings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `readings`
--
ALTER TABLE `readings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
