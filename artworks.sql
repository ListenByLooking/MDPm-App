-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 05:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artworks`
--

-- ---------------------------MENU TABLES------------------------------

CREATE TABLE `aspect_ratio` (
                              `value` varchar(255) NOT NULL,
                              PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `bitdepht` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `brand` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `channel_configuration` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `codec` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `dimensions` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `equalization` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `format_analog` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `format_digital` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `material` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `noise` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `resolution` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sample_frequency` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sound_types` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `speed` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `standard` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `stylus` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `general_type` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `software_type` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `type_element` (
                                `value` varchar(255) NOT NULL,
                                PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                         PRIMARY KEY (`id`),
                         `name` varchar(255) NOT NULL,
                         `last_name` varchar(50) DEFAULT NULL,
                         `phone_number` varchar(20) DEFAULT NULL,
                         `image` varchar(200) DEFAULT NULL,
                         `email` varchar(255) NOT NULL,
                         UNIQUE KEY `users_email_unique` (`email`),
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) NOT NULL,
                         `user_type` int(11) NOT NULL DEFAULT 2,
                         `remember_token` varchar(100) DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `phone_number`, `image`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
                                                                                                                                                                                  (1, 'CSC', 'Artworks', '9874563210', 'CSC.jpg', 'csc@gmail.com', NULL, '$2y$10$v.alrcNgmkYmkt66bkdRKO249Zf56lltYYbtI3uy/d.agw.9PANem', 1, 'KpwtijG62TMTfZVEymVKeum2pNN1xaZg8Roy4S81ze1CkwiLXtjWNm4aDodO', '2023-07-27 11:22:06', '2023-07-27 11:22:06'),
                                                                                                                                                                                  (2, 'Multimedia', 'Artworks', '9874563210', '', 'admin123@gmail.com', NULL, '$2y$10$QBtaABUS5IMd/89yezccD.X64fX4CP3OvWSeve1fMOI7pr0g5ZVDi', 2, NULL, '2024-06-23 06:49:40', NULL);




--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
--  `year` year(4) NOT NULL,
  `author` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `artwork`
--

-- INSERT INTO `artwork` (`id`, `user_id`, `title`, `description`, `year`, `author`, `status`, `created_at`) VALUES
-- (2, 1, 'test', 'test', '1951', 'fdfdf', 1, '2024-06-27 05:00:10'),
-- (3, 1, 'My Artwork', 'My Artwork', '1951', 'My Artwork', 1, '2024-06-30 05:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `audiocassette`
--



CREATE TABLE `audiocassette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
--  `dpo_id` int(11) DEFAULT NULL,
--  `component_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  `preservation_signature` varchar(255) NOT NULL,
  `original_signature` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brand_of_box` varchar(255) NOT NULL,
  `cassette_type` varchar(255) NOT NULL,
  `noise_reduction` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ALTER TABLE `audiocassette`
--    ADD PRIMARY KEY (`id`);
-- ADD KEY `dpo_id` (`dpo_id`);


--
-- Dumping data for table `audiocassette`
--

-- INSERT INTO `audiocassette` (`id`, `dpo_id`, `component_id`, `user_id`, `preservation_signature`, `original_signature`, `brand`, `brand_of_box`, `cassette_type`, `noise_reduction`, `notes`, `status`, `created_at`) VALUES
-- (1, 2, 8, 1, 'xczc', 'zczxc', 'A', 'D', 'IEC1', 'unknown', 'zxcxzxc', 1, '2024-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

-- CREATE TABLE `components` (
--  `id` int(11) NOT NULL,
--  `artwork_id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
--  `user_id` int(11) NOT NULL,
--  `comp_type` varchar(50) NOT NULL,
--  `component_id` varchar(50) DEFAULT NULL,
--  `audio_visual` varchar(50) DEFAULT NULL,
--  `original_docs` varchar(50) DEFAULT NULL,
--  `original_docs_sub` varchar(50) DEFAULT NULL,
--  `form_name` varchar(20) NOT NULL,
--  `status` int(11) NOT NULL,
--  `created_at` datetime NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `components`
--

-- INSERT INTO `components` (`id`, `artwork_id`, `dpo_id`, `user_id`, `dpo_type`, `component`, `audio_visual`, `original_docs`, `original_docs_sub`, `form_name`, `status`, `created_at`) VALUES
-- (9, 2, 1, 1, 'score', '', '', '', '', 'score', 1, '2024-06-30 00:00:00'),
-- (10, 2, 1, 1, 'documentation', '', '', '', '', 'documentation', 1, '2024-06-30 00:00:00'),
-- (11, 2, 1, 1, 'documentation', '', '', '', '', 'documentation', 1, '2024-06-30 00:00:00'),
-- (12, 2, 1, 1, 'component', 'AudioVisual', 'Audio', 'Original', 'dat', 'dat', 1, '2024-06-30 00:00:00'),
-- (13, 2, 2, 1, 'score', '', '', '', '', 'score', 1, '2024-06-30 00:00:00'),
-- (14, 2, 2, 1, 'documentation', '', '', '', '', 'documentation', 1, '2024-06-30 00:00:00'),
-- (15, 2, 2, 1, 'component', 'AudioVisual', 'Audio', 'Original', 'dat', 'dat', 1, '2024-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `component_config`
--

-- CREATE TABLE `component_config` (
--  `id` int(11) NOT NULL,
--  `user_id` int(11) NOT NULL,
--  `key_name` varchar(50) NOT NULL,
--  `key_value` varchar(50) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `component_config`
--

-- INSERT INTO `component_config` (`id`, `user_id`, `key_name`, `key_value`) VALUES
-- (1, 1, 'brand', 'test'),
-- (2, 1, 'brand_of_box', 'test'),
-- (3, 1, 'cassette_type', 'test'),
-- (4, 1, 'brand', 'd'),
-- (5, 1, 'brand', 'E'),
-- (6, 1, 'brand', 'F'),
-- (7, 1, 'brand_of_box', 'A'),
-- (8, 1, 'brand_of_box', 'B'),
-- (9, 1, 'cassette_type', 'IECI1'),
-- (10, 1, 'cassette_type', 'IECI2'),
-- (11, 1, 'dat_brand', 'D'),
-- (12, 1, 'dat_brand_of_box', 'C'),
-- (13, 1, 'dat_brand_of_box', 'F'),
-- (14, 1, 'samplerate', 'D'),
-- (15, 1, 'stylus', 'C'),
-- (16, 1, 'brand', 'sdfsdfsd'),
-- (17, 1, 'brand', 'sdffs'),
-- (18, 1, 'tape_brand_of_box', 'asdaSDASD'),
-- (19, 1, 'tape_brand_of_box', 'CDSADA');

-- --------------------------------------------------------

--
-- Table structure for table `dat`
--






CREATE TABLE `dat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
--  `dpo_id` int(11) DEFAULT NULL,
--  `component_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  `preservation_signature` varchar(255) NOT NULL,
  `original_signature` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brand_of_box` varchar(255) NOT NULL,
  `samplerate` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ALTER TABLE `dat`
--    ADD PRIMARY KEY (`id`);
-- ADD KEY `dpo_id` (`dpo_id`);




CREATE TABLE `digital_audio` (
                       `id` int(11) NOT NULL AUTO_INCREMENT,
                       PRIMARY KEY (`id`),
--  `dpo_id` int(11) DEFAULT NULL,
--  `component_id` int(11) NOT NULL,
                       `user_id` bigint(20) UNSIGNED NOT NULL,
                       FOREIGN KEY (user_id) REFERENCES users(id),
                       `signature` varchar(255) NOT NULL,
                       `container` varchar(255) NOT NULL,
                       `encoding` varchar(255) NOT NULL,
                       `bitrate` int(11) NOT NULL,
                       `bitdepth` varchar(255) NOT NULL,
                       `duration` int(11) NOT NULL,
                       `channel_configuration` varchar(255) NOT NULL,
                       `checksum` varchar(255) NOT NULL,
                       `frequency` varchar(255) NOT NULL,
                       `filesize` int(11) NOT NULL,
                       `media` varchar(255) NOT NULL,
                       `notes` text DEFAULT NULL,
                       `status` int(11) NOT NULL,
                       `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



--
-- Dumping data for table `dat`
--

-- INSERT INTO `dat` (`id`, `dpo_id`, `component_id`, `user_id`, `preservation_signature`, `original_signature`, `brand`, `brand_of_box`, `samplerate`, `notes`, `status`, `created_at`) VALUES
-- (1, 1, 12, 1, 'QWEQ', 'QEQWE', 'C', 'D', '44100hz', 'QWEQWEE', 1, '2024-06-30 00:00:00'),
-- (2, 2, 15, 1, 'zcscz', 'sada', 'B', 'E', '44100hz', 'asdsadad', 1, '2024-06-30 00:00:00');

-- --------------------------------------------------------




--
-- Table structure for table `digital_copy`
--

CREATE TABLE `digital_copy_audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
--  `component_id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `container` varchar(255) NOT NULL,
  `encoding` varchar(255) NOT NULL,
  `original_type` varchar(255) NOT NULL,
  `id_original` int(11) NOT NULL,
  `bitrate` int(11) NOT NULL,
  `bitdepth` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `channel_config` varchar(255) NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `filesize` int(11) NOT NULL,
  `acquisition_device` varchar(255) NOT NULL,
  `media` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;






CREATE TABLE `digital_copy_photo` (
                                      `id` int(11) NOT NULL AUTO_INCREMENT,
                                      PRIMARY KEY (`id`),
                                      `user_id` bigint(20) UNSIGNED NOT NULL,
                                      FOREIGN KEY (user_id) REFERENCES users(id),
--  `component_id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
                                      `filename` varchar(255) NOT NULL,
                                      `format` varchar(255) NOT NULL,
                                      `id_original` int(11) NOT NULL,
                                      `bitdepth` varchar(50) NOT NULL,
                                      `resolution` varchar(255) NOT NULL,
                                      `ar` varchar(255) NOT NULL,
                                      `filesize` int(11) NOT NULL,
                                      `acquisition_device` varchar(255) NOT NULL,
                                      `media` varchar(255) NOT NULL,
                                      `notes` text DEFAULT NULL,
                                      `status` int(11) NOT NULL,
                                      `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;






CREATE TABLE `digital_copy_vf` (
                                      `id` int(11) NOT NULL AUTO_INCREMENT,
                                      PRIMARY KEY (`id`),
                                      `user_id` bigint(20) UNSIGNED NOT NULL,
                                      FOREIGN KEY (user_id) REFERENCES users(id),
--  `component_id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
                                      `filename` varchar(255) NOT NULL,
                                      `format` varchar(255) NOT NULL,
                                      `id_original` int(11) NOT NULL,
                                      `original_type` varchar(255) NOT NULL,
                                      `codec` varchar(255) NOT NULL,
                                      `bitrate` int(11) NOT NULL,
                                      `duration` int(11) NOT NULL,
                                      `abitdepth` varchar(50) NOT NULL,
                                      `channel_config` varchar(255) NOT NULL,
                                      `vbitdepth` varchar(50) NOT NULL,
                                      `resolution` varchar(255) NOT NULL,
                                      `ar` varchar(255) NOT NULL,
                                      `frame_rate` varchar(50) NOT NULL,
                                      `frequency` varchar(255) NOT NULL,
                                      `filesize` int(11) NOT NULL,
                                      `acquisition_device` varchar(255) NOT NULL,
                                      `media` varchar(255) NOT NULL,
                                      `notes` text DEFAULT NULL,
                                      `status` int(11) NOT NULL,
                                      `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



-- --------------------------------------------------------

--
-- Table structure for table `documentation`
--

CREATE TABLE `documentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
--  `dpo_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
--  `component_id` int(11) NOT NULL,
  `document_type` ENUM('Photos', 'A/V', 'Interviews', 'Docs') NOT NULL,
  `document_url` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `documentation`
--

-- INSERT INTO `documentation` (`id`, `dpo_id`, `user_id`, `component_id`, `document_type`, `document_url`, `status`, `created_at`) VALUES
-- (1, 1, 1, 2, 'Photos', 'https://getbootstrap.com/docs/4.0/components/modal/', 1, '2024-06-23 01:57:51'),
-- (2, 1, 1, 2, 'A/V', 'https://getbootstrap.com/docs/4.0/components/modal/', 1, '2024-06-23 01:57:51'),
-- (3, 1, 1, 2, 'Interviews', 'https://getbootstrap.com/docs/4.0/components/modal/', 1, '2024-06-23 01:57:51'),
-- (4, 1, 1, 2, 'Docs', 'https://getbootstrap.com/docs/4.0/components/modal/', 1, '2024-06-23 01:57:51'),
-- (5, 1, 1, 2, 'Docs', 'https://getbootstrap.com/docs/4.0/components/modal/', 1, '2024-06-23 01:57:51'),
-- (9, 2, 1, 7, 'Photos', 'https://uniweb.unipd.it/Home.do', 1, '2024-06-28 01:45:22'),
-- (10, 2, 1, 7, 'A/V', 'https://uniweb.unipd.it/Home.do', 1, '2024-06-28 01:45:22'),
-- (11, 2, 1, 7, 'Interviews', 'https://uniweb.unipd.it/Home.do', 1, '2024-06-28 01:45:22'),
-- (12, 2, 1, 7, 'Docs', 'https://uniweb.unipd.it/Home.do', 1, '2024-06-28 01:45:22'),
-- (13, 1, 1, 10, 'Interviews', 'https://uniweb.unipd.it/myesse3job/Myesse3jobTrovaCVSubmit.do?', 1, '2024-06-30 08:52:42'),
-- (14, 1, 1, 11, 'Docs', 'https://web.whatsapp.com/', 1, '2024-06-30 10:27:25'),
-- (15, 2, 1, 14, 'Interviews', 'https://chatgpt.com/c/7eb4e8c5-301f-43b4-a5b6-af5ddcc906f6', 1, '2024-06-30 11:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `dpos`
--

CREATE TABLE `dpos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `artwork_id` int(11) NOT NULL,
  FOREIGN KEY(artwork_id) REFERENCES artwork(id),
--  `dpo_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  `dpo_year` YEAR NOT NULL,
  `dpo_venue` varchar(250) NOT NULL,
  `dpo_city` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `dpo_component_bridge` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
    `dpo_id` int(11) NOT NULL,
    FOREIGN KEY(dpo_id) REFERENCES dpos(id),
    `comp_type` varchar(150) NOT NULL,
    `component_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Dumping data for table `dpos`
--

-- INSERT INTO `dpos` (`id`, `artwork_id`, `dpo_id`, `user_id`, `status`) VALUES
-- (1, 2, 1, 1, 1),
-- (2, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `uuid` varchar(255) NOT NULL,
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `film` (
                                  `id` int(11) NOT NULL AUTO_INCREMENT,
                                  PRIMARY KEY (`id`),
                                  `user_id` bigint(20) UNSIGNED NOT NULL,
                                  FOREIGN KEY (user_id) REFERENCES users(id),
                                  `preservation_signature` varchar(255) NOT NULL,
                                  `original_signature` varchar(255) NOT NULL,
                                  `type_of_support` varchar(255) NOT NULL,
                                  `format` varchar(255) NOT NULL,
                                  `title` varchar(255) NOT NULL,
                                  `author` varchar(255) NOT NULL,
                                  `year` year NOT NULL,
                                  `support_material` varchar(255) NOT NULL,
                                  `color` ENUM('Color', 'B/W', 'Both') NOT NULL,
                                  `sound` varchar(255) NOT NULL,
                                  `ar` varchar(255) NOT NULL,
                                  `film_brand` varchar(255) NOT NULL,
                                  `carter_brand` varchar(255) NOT NULL,
                                  `carter_material` varchar(255) NOT NULL,
                                  `cover_material` varchar(255) NOT NULL,
                                  `fps` varchar(255) NOT NULL,
                                  `cement_splices` int(11) NOT NULL,
                                  `restored_cs` int(11) NOT NULL,
                                  `tape_splices` int(11) NOT NULL,
                                  `restored_ts` int(11) NOT NULL,
                                  `restored_perforations` int(11) NOT NULL,
                                  `restored_frames` int(11) NOT NULL,
                                  `notes` text DEFAULT NULL,
                                  `status` int(11) NOT NULL,
                                  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;






CREATE TABLE `general_object` (
                       `id` int(11) NOT NULL AUTO_INCREMENT,
                       PRIMARY KEY (`id`),
                       `user_id` bigint(20) UNSIGNED NOT NULL,
                       FOREIGN KEY (user_id) REFERENCES users(id),
                       `preservation_signature` varchar(255) NOT NULL,
                       `name` varchar(255) NOT NULL,
                       `creator` varchar(255) NOT NULL,
                       `date` date NOT NULL,
                       `description` varchar(255) NOT NULL,
                       `type` varchar(255) NOT NULL,
                       `identifier` varchar(255) NOT NULL,
                       `brand` varchar(255) NOT NULL,
                       `material` varchar(255) NOT NULL,
                       `notes` text DEFAULT NULL,
                       `status` int(11) NOT NULL,
                       `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;





CREATE TABLE `hardware` (
                                  `id` int(11) NOT NULL AUTO_INCREMENT,
                                  PRIMARY KEY (`id`),
                                  `user_id` bigint(20) UNSIGNED NOT NULL,
                                  FOREIGN KEY (user_id) REFERENCES users(id),
                                  `preservation_signature` varchar(255) NOT NULL,
                                  `name` varchar(255) NOT NULL,
                                  `manufacturer` varchar(255) NOT NULL,
                                  `model` varchar(255) NOT NULL,
                                  `serial` varchar(255) NOT NULL,
                                  `os` varchar(255) NOT NULL,
                                  `year` year NOT NULL,
                                  `cpu` varchar(255) NOT NULL,
                                  `ram` varchar(255) NOT NULL,
                                  `storage` varchar(255) NOT NULL,
                                  `description` varchar(255) NOT NULL,
                                  `display` varchar(255) NOT NULL,
                                  `notes` text DEFAULT NULL,
                                  `status` int(11) NOT NULL,
                                  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `original_docs`
--

-- CREATE TABLE `original_docs` (
-- `id` int(11) NOT NULL AUTO_INCREMENT,
--  PRIMARY KEY (`id`),
--  `dpo_id` int(11) NOT NULL,
--  `user_id` bigint(20) UNSIGNED NOT NULL,
--  FOREIGN KEY (user_id) REFERENCES users(id),
--  `component_id` int(11) NOT NULL,
--  `preservation_signature` text NOT NULL,
--  `original_signature` text NOT NULL,
--  `type` enum('Type1','Type2','Type3') NOT NULL,
--  `format` enum('Format1','Format2','Format3') NOT NULL,
--  `generation` enum('Generation1','Generation2','Generation3') NOT NULL,
--  `title` varchar(255) NOT NULL,
--  `author` varchar(255) NOT NULL,
--  `year` int(11) NOT NULL,
--  `support_material` enum('Material1','Material2','Material3') NOT NULL,
--  `color_bw` enum('Color','BW') NOT NULL,
--  `sound` enum('Sound1','Sound2','Sound3') NOT NULL,
--  `aspect_ratio` enum('Aspect Ratio1','Aspect Ratio2','Aspect Ratio3') NOT NULL,
--  `film_brand` enum('Film Brand1','Film Brand2','Film Brand3') DEFAULT NULL,
--  `carter_brand` enum('Carter Brand1','Carter Brand2','Carter Brand3') DEFAULT NULL,
--  `carter_material` enum('Carter Material1','Carter Material2','Carter Material3') DEFAULT NULL,
--  `cover_material` enum('Cover Material1','Cover Material2','Cover Material3') DEFAULT NULL,
--  `cement_splices` int(11) DEFAULT NULL,
--  `restored_cs` int(11) DEFAULT NULL,
--  `tape_splices` int(11) DEFAULT NULL,
--  `restored_ts` int(11) DEFAULT NULL,
--  `restored_perforations` int(11) DEFAULT NULL,
--  `restored_frames` int(11) DEFAULT NULL,
--  `notes` text DEFAULT NULL,
--  `created_at` datetime NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email`),
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- --------------------------------------------------------

--
-- Table structure for table `phonographicdisks`
--





CREATE TABLE `phonographicdisk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
--  `dpo_id` int(11) DEFAULT NULL,
--  `component_id` int(11) NOT NULL,
  `preservation_signature` varchar(255) NOT NULL,
  `original_signature` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brand_of_box` varchar(255) NOT NULL,
  `rpm` varchar(255) NOT NULL,
  `stylus` varchar(255) NOT NULL,
  `eq` varchar(255) NOT NULL,
  `type_of_recording` enum('mechanical','electrical') DEFAULT 'mechanical',
  `incisions` enum('horizontal','vertical') DEFAULT 'horizontal',
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ALTER TABLE `phonographicdisks`
--    ADD PRIMARY KEY (`id`);
-- ADD KEY `dpo_id` (`dpo_id`);






CREATE TABLE `photo` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         PRIMARY KEY (`id`),
                         `user_id` bigint(20) UNSIGNED NOT NULL,
                         FOREIGN KEY (user_id) REFERENCES users(id),
                         `preservation_signature` varchar(255) NOT NULL,
                         `original_signature` varchar(255) NOT NULL,
                         `type_of_support` varchar(255) NOT NULL,
                         `format` varchar(255) NOT NULL,
                         `title` varchar(255) NOT NULL,
                         `author` varchar(255) NOT NULL,
                         `year` year NOT NULL,
                         `support_material` varchar(255) NOT NULL,
                         `color` ENUM('Color', 'B/W') NOT NULL,
                         `ar` varchar(255) NOT NULL,
                         `brand` varchar(255) NOT NULL,
                         `dimensions` varchar(255) NOT NULL,
                         `notes` text DEFAULT NULL,
                         `status` int(11) NOT NULL,
                         `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
--  `dpo_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
--  `component_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Dumping data for table `score`
--

-- INSERT INTO `score` (`id`, `dpo_id`, `user_id`, `component_id`, `message`, `status`, `created_at`) VALUES
-- (1, 1, 1, 1, '<p>By following these steps, you can pass a status and message from your controller to your Blade template using session data. This allows you to provide feedback to the user after form submissions or other actions, enhancing the user experience.</p>', 1, '2024-06-23 01:57:18'),
-- (4, 2, 1, 6, '<p>Scopri le opportunità della Biblioteca Digitale a tua disposizione per:</p><p>1) cercare un documento in modo facile e veloce</p><p>2) consultare da casa periodici e banche dati</p><p>3) gestire e organizzare in autonomia le tue ricerche bibliografiche</p><p>4) accedere ad una vasta gamma di oggetti multimediali (immagini, documenti, libri, audio, musica, video, risorse per la didattica). Se sei interessato, consulta la piattaforma <a href=\"https://phaidra.cab.unipd.it/\">Phaidra</a></p><p>Tutto questo e molto altro consultando il seguente link <a href=\"https://bibliotecadigitale.cab.unipd.it/\">https://bibliotecadigitale.cab.unipd.it</a></p>', 1, '2024-06-28 01:45:01'),
-- (5, 1, 1, 9, '<p>sasdffasfasf</p>', 1, '2024-06-30 08:51:49'),
-- (6, 2, 1, 13, '<p>dfdfdfdfdfdfd</p>', 1, '2024-06-30 11:29:42');

-- --------------------------------------------------------




CREATE TABLE `software` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            PRIMARY KEY (`id`),
                            `user_id` bigint(20) UNSIGNED NOT NULL,
                            FOREIGN KEY (user_id) REFERENCES users(id),
                            `preservation_signature` varchar(255) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `developer` varchar(255) NOT NULL,
                            `version` varchar(255) NOT NULL,
                            `license` varchar(255) NOT NULL,
                            `os` varchar(255) NOT NULL,
                            `type` varchar(255) NOT NULL,
                            `year` year NOT NULL,
                            `language` varchar(255) NOT NULL,
                            `requirements` varchar(255) NOT NULL,
                            `link` varchar(255) NOT NULL,
                            `library` varchar(255) NOT NULL,
                            `notes` text DEFAULT NULL,
                            `status` int(11) NOT NULL,
                            `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;





--
-- Table structure for table `tape_details`
--



CREATE TABLE `tape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
--  `dpo_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
--  `component_id` int(11) NOT NULL,
  `preservation_signature` varchar(255) NOT NULL,
  `original_signature` varchar(255) NOT NULL,
  `brand_of_tape` varchar(50) NOT NULL,
  `material_of_tape` varchar(50) NOT NULL,
  `brand_of_box` varchar(50) NOT NULL,
  `brand_of_carter` varchar(50) NOT NULL,
  `material_of_carter` varchar(50) NOT NULL,
  `diameter_of_carter` varchar(50) NOT NULL,
  `tape_width` varchar(255) NOT NULL,
  `num_of_sides` enum('One', 'Two') NOT NULL,
  `num_of_channels_sideA` int(11) NOT NULL,
  `channels_config_sideA` varchar(255) NOT NULL,
  `speed_sideA` varchar(255) NOT NULL,
  `num_of_channels_sideB` int(11) NOT NULL,
  `channels_config_sideB` varchar(255) NOT NULL,
  `speed_sideB` varchar(255) NOT NULL,
  `eq` varchar(255) NOT NULL,
  `noise_reduction` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



-- --------------------------------------------------------






CREATE TABLE `video` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        PRIMARY KEY (`id`),
                        `user_id` bigint(20) UNSIGNED NOT NULL,
                        FOREIGN KEY (user_id) REFERENCES users(id),
                        `preservation_signature` varchar(255) NOT NULL,
                        `original_signature` varchar(255) NOT NULL,
                        `format` varchar(255) NOT NULL,
                        `type_of_signal` ENUM('Analog', 'Digital') NOT NULL,
                        `title` varchar(255) NOT NULL,
                        `author` varchar(255) NOT NULL,
                        `year` year NOT NULL,
                        `support_material` varchar(255) NOT NULL,
                        `color` ENUM('Color', 'B/W', 'Both') NOT NULL,
                        `sound` varchar(255) NOT NULL,
                        `abitdepth` varchar(255) NOT NULL,
                        `frequency` varchar(255) NOT NULL,
                        `ar` varchar(255) NOT NULL,
                        `brand` varchar(255) NOT NULL,
                        `carter_material` varchar(255) NOT NULL,
                        `cover_material` varchar(255) NOT NULL,
                        `standard` varchar(255) NOT NULL,
                        `fps` varchar(255) NOT NULL,
                        `resolution` varchar(255) NOT NULL,
                        `vbitdepth` varchar(255) NOT NULL,
                        `notes` text DEFAULT NULL,
                        `status` int(11) NOT NULL,
                        `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `artwork`
--


--
-- Indexes for table `audiocassette`
--


--
-- Indexes for table `components`
--
-- ALTER TABLE `components`
  -- ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_config`
--
-- ALTER TABLE `component_config`
--  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat`
--


--
-- Indexes for table `digital_copy`
--


--
-- Indexes for table `documentation`
--


--
-- Indexes for table `dpos`
--




--
-- Indexes for table `failed_jobs`
--


--
-- Indexes for table `migrations`
--


--
-- Indexes for table `original_docs`
--


--
-- Indexes for table `password_reset_tokens`
--


--
-- Indexes for table `personal_access_tokens`
--


--
-- Indexes for table `phonographicdisks`
--


--
-- Indexes for table `score`
--


--
-- Indexes for table `tape_details`
--


--
-- Indexes for table `users`
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artwork`
--


--
-- AUTO_INCREMENT for table `audiocassette`
--


--
-- AUTO_INCREMENT for table `components`
--
-- ALTER TABLE `components`
  -- MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `component_config`
--
-- ALTER TABLE `component_config`
--  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dat`
--


--
-- AUTO_INCREMENT for table `digital_copy`
--


--
-- AUTO_INCREMENT for table `documentation`
--


--
-- AUTO_INCREMENT for table `dpos`
--




--
-- AUTO_INCREMENT for table `failed_jobs`
--


--
-- AUTO_INCREMENT for table `migrations`
--


--
-- AUTO_INCREMENT for table `original_docs`
--


--
-- AUTO_INCREMENT for table `personal_access_tokens`
--


--
-- AUTO_INCREMENT for table `phonographicdisks`
--


--
-- AUTO_INCREMENT for table `score`
--


--
-- AUTO_INCREMENT for table `tape_details`
--


--
-- AUTO_INCREMENT for table `users`
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
