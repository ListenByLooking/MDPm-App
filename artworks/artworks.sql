-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 05:35 AM
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
-- Table structure for table `documentation`
--

CREATE TABLE `documentation` (
  `id` int(11) NOT NULL,
  `dpo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_type` varchar(50) NOT NULL,
  `document_url` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documentation`
--

INSERT INTO `documentation` (`id`, `dpo_id`, `user_id`, `document_type`, `document_url`, `status`, `created_at`) VALUES
(1, 2, 2, 'Photos', 'https://getbootstrap.com/docs/4.0/browser-bugs/', 1, '2024-06-14 01:56:34'),
(2, 2, 2, 'A/V', 'https://getbootstrap.com/docs/4.0/browser-bugs/', 1, '2024-06-14 01:56:34'),
(3, 2, 2, 'Interviews', 'https://getbootstrap.com/docs/4.0/browser-bugs/', 1, '2024-06-14 01:56:34'),
(4, 2, 2, 'Docs', 'https://getbootstrap.com/docs/4.0/browser-bugs/', 1, '2024-06-14 01:56:34'),
(5, 2, 2, 'Photos', 'https://getbootstrap.com/docs/4.0/browser-bugs/', 1, '2024-06-14 01:56:58'),
(6, 2, 2, 'A/V', 'https://getbootstrap.com/docs/4.0/browser-bugs/', 1, '2024-06-14 01:56:58'),
(7, 2, 2, 'Interviews', 'https://getbootstrap.com/docs/4.0/browser-bugs/', 1, '2024-06-14 01:56:58'),
(8, 2, 2, 'Docs', 'https://getbootstrap.com/docs/4.0/browser-bugs/', 1, '2024-06-14 01:56:58'),
(9, 2, 2, 'Photos', 'https://getbootstrap.com/docs/5.0/content/typography/', 1, '2024-06-14 01:59:17'),
(10, 2, 2, 'Photos', 'https://getbootstrap.com/docs/5.0/content/typography/', 1, '2024-06-14 02:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `dpos`
--

CREATE TABLE `dpos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `year` year(4) NOT NULL,
  `author` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dpos`
--

INSERT INTO `dpos` (`id`, `user_id`, `title`, `description`, `year`, `author`, `status`, `created_at`) VALUES
(1, 1, 'Test', 'Test', '2024', 'Test', 1, '2024-06-08 02:37:30'),
(2, 1, 'wetwst', 'yrhweyh', '2024', 'Test', 1, '2024-06-08 07:10:41'),
(3, 1, 'test', 'xfhdsh', '2024', 'Test', 1, '2024-06-08 07:12:17'),
(4, 1, 'test', 'test', '2024', 'Test', 1, '2024-06-08 07:13:03'),
(5, 1, 'add', 'das', '2024', 'Test', 1, '2024-06-08 07:13:48'),
(6, 1, 'EY7E5Y', 'UYHET', '2024', 'Test', 1, '2024-06-08 07:15:57'),
(7, 1, 'EY7E5Y', 'UYHET', '2024', 'Test', 1, '2024-06-08 07:17:46'),
(8, 1, 'anandh', 'bca', '2024', 'Test', 1, '2024-06-08 07:26:20'),
(9, 1, 'sdsds', 'dsdsdsdsd', '2024', 'sdsdsdsd', 1, '2024-06-13 04:13:32'),
(10, 1, 'sdsds', 'dsdsdsd', '2024', 'sdsdsd', 1, '2024-06-13 04:13:47'),
(11, 1, 're', 'erer', '1951', 'tes', 1, '2024-06-13 04:45:58'),
(12, 1, 'Web Developer', 'At missed advice my it no sister. Miss told ham dull knew see she spot near can. Spirit her entire her called.', '1950', 'Anand', 1, '2024-06-13 05:00:47');

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
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `dpo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `dpo_id`, `user_id`, `message`, `status`, `created_at`) VALUES
(1, 2, 1, '<p>dfsdfdsfdsf</p>', 1, '2024-06-14 02:19:23');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `phone_number`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Multimedia', 'Artworks', '9874563210', '1718078330.jpg', 'admin@gmail.com', NULL, '$2y$10$1KCoynUYNj3j04qHIvkWMu48vGm9lZqspA1..dDLpcI1C/0RTIami', '3LCBIXzjSESeZOgjOkjRxTdrOl21wtsbrZToXDuUqSIEb5Qzo9hqr9rQAFD1', '2023-07-27 11:22:06', '2023-07-27 11:22:06');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `score`
--
ALTER TABLE `score`
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
-- AUTO_INCREMENT for table `documentation`
--
ALTER TABLE `documentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dpos`
--
ALTER TABLE `dpos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
