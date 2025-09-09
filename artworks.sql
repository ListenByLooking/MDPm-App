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

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
--  `dpo_id` int(11) DEFAULT NULL,
--  `component_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `preservation_signature` varchar(255) NOT NULL,
  `original_signature` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brand_of_box` varchar(255) NOT NULL,
  `cassette_type` varchar(255) NOT NULL,
  `noise_reduction` enum('yes','no','unknown') DEFAULT 'unknown',
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `component_config` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key_name` varchar(50) NOT NULL,
  `key_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `component_config`
--

INSERT INTO `component_config` (`id`, `user_id`, `key_name`, `key_value`) VALUES
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
  `id` int(11) NOT NULL,
--  `dpo_id` int(11) DEFAULT NULL,
--  `component_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `preservation_signature` varchar(255) NOT NULL,
  `original_signature` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brand_of_box` varchar(255) NOT NULL,
  `samplerate` varchar(255) NOT NULL,
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

CREATE TABLE `digital_copy` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
--  `component_id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `original_item` varchar(50) DEFAULT NULL,
  `codec` varchar(50) DEFAULT NULL,
  `bitrate` varchar(50) DEFAULT NULL,
  `bitdepth_audio` varchar(50) DEFAULT NULL,
  `bitdepth_video` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `aspect_ratio` varchar(50) DEFAULT NULL,
  `frame_rate` varchar(50) DEFAULT NULL,
  `sample_frequency` varchar(50) DEFAULT NULL,
  `acquisition_device` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentation`
--

CREATE TABLE `documentation` (
  `id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
--  `component_id` int(11) NOT NULL,
  `document_type` varchar(50) NOT NULL,
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
  `id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dpo_year` YEAR NOT NULL,
  `dpo_venue` varchar(250) NOT NULL,
  `dpo_city` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `dpo_component_bridge` (
    `id` int(11) NOT NULL,
    `dpo_id` int(11) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
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

CREATE TABLE `original_docs` (
  `id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
--  `component_id` int(11) NOT NULL,
  `preservation_signature` text DEFAULT NULL,
  `original_signature` text DEFAULT NULL,
  `type` enum('Type1','Type2','Type3') DEFAULT NULL,
  `format` enum('Format1','Format2','Format3') DEFAULT NULL,
  `generation` enum('Generation1','Generation2','Generation3') DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `support_material` enum('Material1','Material2','Material3') DEFAULT NULL,
  `color_bw` enum('Color','BW') DEFAULT NULL,
  `sound` enum('Sound1','Sound2','Sound3') DEFAULT NULL,
  `aspect_ratio` enum('Aspect Ratio1','Aspect Ratio2','Aspect Ratio3') DEFAULT NULL,
  `film_brand` enum('Film Brand1','Film Brand2','Film Brand3') DEFAULT NULL,
  `carter_brand` enum('Carter Brand1','Carter Brand2','Carter Brand3') DEFAULT NULL,
  `carter_material` enum('Carter Material1','Carter Material2','Carter Material3') DEFAULT NULL,
  `cover_material` enum('Cover Material1','Cover Material2','Cover Material3') DEFAULT NULL,
  `cement_splices` int(11) DEFAULT NULL,
  `restored_cs` int(11) DEFAULT NULL,
  `tape_splices` int(11) DEFAULT NULL,
  `restored_ts` int(11) DEFAULT NULL,
  `restored_perforations` int(11) DEFAULT NULL,
  `restored_frames` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
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

CREATE TABLE `phonographicdisks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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

--
-- Table structure for table `tape_details`
--

CREATE TABLE `tape_details` (
  `id` int(11) NOT NULL,
--  `dpo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
--  `component_id` int(11) NOT NULL,
  `preservation_signature` varchar(255) DEFAULT NULL,
  `original_signature` varchar(255) DEFAULT NULL,
  `brand_of_tape` varchar(50) DEFAULT NULL,
  `brand_of_box` varchar(50) DEFAULT NULL,
  `brand_of_carter` varchar(50) DEFAULT NULL,
  `material_of_carter` varchar(50) DEFAULT NULL,
  `diameter_of_carter` varchar(50) DEFAULT NULL,
  `tape_width` varchar(255) DEFAULT NULL,
  `num_of_sides` int(11) DEFAULT NULL,
  `num_of_channels_sideA` int(11) DEFAULT NULL,
  `channels_config_sideA` varchar(255) DEFAULT NULL,
  `speed_sideA` varchar(255) DEFAULT NULL,
  `num_of_channels_sideB` int(11) DEFAULT NULL,
  `channels_config_sideB` varchar(255) DEFAULT NULL,
  `speed_sideB` varchar(255) DEFAULT NULL,
  `eq` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
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
-- Indexes for dumped tables
--

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audiocassette`
--
ALTER TABLE `audiocassette`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dpo_id` (`dpo_id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_config`
--
ALTER TABLE `component_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat`
--
ALTER TABLE `dat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dpo_id` (`dpo_id`);

--
-- Indexes for table `digital_copy`
--
ALTER TABLE `digital_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentation`
--
ALTER TABLE `documentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpos`
--
ALTER TABLE `dpos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dpo_component_bridge`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `original_docs`
--
ALTER TABLE `original_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phonographicdisks`
--
ALTER TABLE `phonographicdisks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dpo_id` (`dpo_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tape_details`
--
ALTER TABLE `tape_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `audiocassette`
--
ALTER TABLE `audiocassette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `component_config`
--
ALTER TABLE `component_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dat`
--
ALTER TABLE `dat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `digital_copy`
--
ALTER TABLE `digital_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentation`
--
ALTER TABLE `documentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dpos`
--
ALTER TABLE `dpos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `dpo_component_bridge`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `original_docs`
--
ALTER TABLE `original_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phonographicdisks`
--
ALTER TABLE `phonographicdisks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tape_details`
--
ALTER TABLE `tape_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
