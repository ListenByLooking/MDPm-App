-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2024 at 06:43 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multimedia_arts`
--

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `description` text,
  `creation_date` date DEFAULT NULL,
  `preservation_date` date DEFAULT NULL,
  `reactivation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `component_buttons`
--

CREATE TABLE `component_buttons` (
  `id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `button_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dpos`
--

CREATE TABLE `dpos` (
  `id` int(11) NOT NULL,
  `artwork_id` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dpo_data`
--

CREATE TABLE `dpo_data` (
  `id` int(11) NOT NULL,
  `dpo_info` varchar(255) DEFAULT NULL,
  `component` varchar(255) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `documentation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dpo_data`
--

INSERT INTO `dpo_data` (`id`, `dpo_info`, `component`, `score`, `documentation`) VALUES
(1, 'DPO1', 'Component data', 'Score data', 'Documentation data'),
(2, 'DPO2', 'Component data', 'Score data', 'Documentation data'),
(3, 'DPO3', 'Component data', 'Score data', 'Documentation data'),
(4, 'DPO4', 'Component data', 'Score data', 'Documentation data'),
(5, 'DPO5', 'Component data', 'Score data', 'Documentation data'),
(6, 'DPO6', 'Component data', 'Score data', 'Documentation data'),
(7, 'DPO7', 'Component data', 'Score data', 'Documentation data'),
(8, 'DPO8', 'Component data', 'Score data', 'Documentation data'),
(9, 'DPO9', 'Component data', 'Score data', 'Documentation data'),
(10, 'DPO10', 'Component data', 'Score data', 'Documentation data'),
(11, 'DPO11', 'Component data', 'Score data', 'Documentation data'),
(12, 'DPO12', 'Component data', 'Score data', 'Documentation data'),
(13, 'DPO13', 'Component data', 'Score data', 'Documentation data');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_buttons`
--
ALTER TABLE `component_buttons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `dpos`
--
ALTER TABLE `dpos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artwork_id` (`artwork_id`);

--
-- Indexes for table `dpo_data`
--
ALTER TABLE `dpo_data`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `component_buttons`
--
ALTER TABLE `component_buttons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dpos`
--
ALTER TABLE `dpos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dpo_data`
--
ALTER TABLE `dpo_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `component_buttons`
--
ALTER TABLE `component_buttons`
  ADD CONSTRAINT `component_buttons_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`);

--
-- Constraints for table `dpos`
--
ALTER TABLE `dpos`
  ADD CONSTRAINT `dpos_ibfk_1` FOREIGN KEY (`artwork_id`) REFERENCES `artworks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
