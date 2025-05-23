-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 03:52 PM
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
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reset_token`, `reset_token_expiry`) VALUES
(1, 'root', 'prashantnatekar45@gmail.com', '$2y$10$FB8bI84SzerIKIFBcXR.JeR9rMIMirWLkwOmpwZaHom5d2QiWe8fS', NULL, NULL),
(2, 'root', 'prashantnatekar45@gmail.com', '$2y$10$ySm77eUA8gfnH.XQDMjOr.5kPjW1FUnyTHNx0lTemkP7Ln3qr1Aqi', NULL, NULL),
(4, 'root', 'prashantnatkarrg444454@gmail.com', '$2y$10$pzl6hFSF.T.kdx5AynZ/qO9MCrkTDHuowzMxnp9OtWvz8gTem8c4q', NULL, NULL),
(5, 'ajay rathod', 'ajayrathod45@gmail.com', '$2y$10$GxEOT9b7h7JmiXhG.cf2pOvxKacnEm.SflANvtO9ajihNidznTpM2', NULL, NULL),
(6, 'root', 'natekar44@gmail.com', '$2y$10$CmXC6FaCBZsPVLXcsTrrG.OZ.wLl2VWVTOF72C7CwQsMs4nActrDm', NULL, NULL),
(7, 'Rahul Kamble', 'rahulkamble01@gmail.com', '$2y$10$HpO4k9J/xFMNQdinEaocXen7T8sr1/AqSv2m2qDG/MFWDpOP04.RC', NULL, NULL),
(8, 'Prashant Natekar', 'prashantnatekar38@gmail.com', '$2y$10$QTvs5pKFIwAv8IjDtRh.nuUYKyc5sRv5j.DmkH0BMOzl0i/8whn3e', 'da4a40a599186858957177ab5ce3e76e64cf5de2781141c2f396cce70ed411c558d11c6b982a6f6dc0ff1a6a27608caeb934', '2025-03-01 01:03:12'),
(9, 'Jateen Heble', 'tent44184@gmail.com', '$2y$10$r142Pllj8nqhQjy5If6OQujAoUFgncB2RjJ1dmwmTtJB/btcQ2qAq', '673b57fac0ab77a17f371a0a2bcbe39bcaefd09162b5ecb5e41c61bd762299105b221d495369e803962e8ad3e1e77249f50a', '2025-03-01 01:06:32'),
(10, 'RAJ SHINDE', 'rajshinde01@gmail.com', '$2y$10$dCuE5Q0gEjeLyxR7DKJxJemDvHuCqfFHSVmAnNVWisRKnxYe9H3uC', NULL, NULL),
(11, 'Kshitij Kadam', 'kshitij01@gmail.com', '$2y$10$W7n7c9GdWDBhayM9.1ZQveOwGy4/sls4i6GvqA082MxrwmDnRVybW', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
