-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 03:42 PM
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
-- Database: `constructflow_db`
--

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_19_024016_create_project_lists_table', 1),
(7, '2024_02_19_024226_create_project_members_table', 1),
(8, '2024_02_19_024314_create_task_lists_table', 1),
(9, '2024_03_04_103413_create_project_materials_table', 2),
(10, '2024_03_05_044651_create_project_file_managers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `project_file_managers`
--

CREATE TABLE `project_file_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` longtext NOT NULL,
  `file_text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_file_managers`
--

INSERT INTO `project_file_managers` (`id`, `project_id`, `user_id`, `file_name`, `file_text`, `created_at`, `updated_at`) VALUES
(5, 11, 10, 'project-files/Calsena_Rizal_Gawain 9.pdf', 'sample', '2024-04-22 19:33:06', '2024-04-22 19:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `project_lists`
--

CREATE TABLE `project_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_type` varchar(255) NOT NULL,
  `total_budget` varchar(255) NOT NULL,
  `project_owner` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `project_location_text` longtext NOT NULL,
  `project_location_codes` longtext NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_lists`
--

INSERT INTO `project_lists` (`id`, `manager_id`, `project_name`, `project_type`, `category`, `category_type`, `total_budget`, `project_owner`, `description`, `project_location_text`, `project_location_codes`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(11, 10, 'Construction of Two-Storey Building', 'Vertical Type', 'House', 'Storey 2', '6000000', 12, 'jvsdvksbdskjdb;vsi', 'a:4:{s:6:\"region\";s:8:\"MIMAROPA\";s:8:\"province\";s:16:\"Oriental Mindoro\";s:4:\"city\";s:4:\"Baco\";s:8:\"barangay\";s:9:\"Bangkatan\";}', 'a:4:{s:6:\"region\";s:2:\"17\";s:8:\"province\";s:4:\"1752\";s:4:\"city\";s:6:\"175201\";s:8:\"barangay\";s:9:\"175201002\";}', 'On-hold', '2024-04-24', '2024-10-24', '2024-04-22 18:05:03', '2024-04-22 18:05:03'),
(12, 13, 'Construction of One-Storey Building', 'Vertical Type', 'House', 'Storey 1', '2000000', 21, 'jfbkjwegoiwuegowe', 'a:4:{s:6:\"region\";s:8:\"MIMAROPA\";s:8:\"province\";s:16:\"Oriental Mindoro\";s:4:\"city\";s:4:\"Baco\";s:8:\"barangay\";s:10:\"Dulangan I\";}', 'a:4:{s:6:\"region\";s:2:\"17\";s:8:\"province\";s:4:\"1752\";s:4:\"city\";s:6:\"175201\";s:8:\"barangay\";s:9:\"175201007\";}', 'On-hold', '2024-04-25', '2024-10-25', '2024-04-22 19:29:39', '2024-04-22 19:29:39'),
(13, 10, 'Construction of Two-Storey Building', 'Vertical Type', 'House', 'Storey 2', '6000000', 12, 'jgkcgsalcs', 'a:4:{s:6:\"region\";s:8:\"MIMAROPA\";s:8:\"province\";s:16:\"Oriental Mindoro\";s:4:\"city\";s:25:\"City Of Calapan (Capital)\";s:8:\"barangay\";s:7:\"Bulusan\";}', 'a:4:{s:6:\"region\";s:2:\"17\";s:8:\"province\";s:4:\"1752\";s:4:\"city\";s:6:\"175205\";s:8:\"barangay\";s:9:\"175205011\";}', 'On-hold', '2024-04-24', '2024-10-24', '2024-04-22 21:11:08', '2024-04-22 21:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `project_materials`
--

CREATE TABLE `project_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `category_section` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_materials`
--

INSERT INTO `project_materials` (`id`, `project_id`, `item_name`, `quantity`, `total_price`, `unit`, `category_section`, `created_at`, `updated_at`) VALUES
(9, 11, 'sjcajksbcka', 50, 100.00, 'm', 'SITE CONSTRUCTION', '2024-04-22 19:32:11', '2024-04-22 19:32:11'),
(10, 11, 'fkjbasdkfjsldk', 50, 500.00, 'bags', 'CONCRETE WORKS', '2024-04-22 19:33:44', '2024-04-22 19:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(49, 10, 11, '2024-04-22 18:05:03', '2024-04-22 18:05:03'),
(50, 11, 11, '2024-04-22 18:05:03', '2024-04-22 18:05:03'),
(51, 16, 11, '2024-04-22 18:05:03', '2024-04-22 18:05:03'),
(52, 17, 11, '2024-04-22 18:05:03', '2024-04-22 18:05:03'),
(53, 11, 12, '2024-04-22 19:29:39', '2024-04-22 19:29:39'),
(54, 13, 12, '2024-04-22 19:29:39', '2024-04-22 19:29:39'),
(55, 16, 12, '2024-04-22 19:29:39', '2024-04-22 19:29:39'),
(56, 18, 12, '2024-04-22 19:29:39', '2024-04-22 19:29:39'),
(57, 10, 13, '2024-04-22 21:11:08', '2024-04-22 21:11:08'),
(58, 11, 13, '2024-04-22 21:11:08', '2024-04-22 21:11:08'),
(59, 19, 13, '2024-04-22 21:11:08', '2024-04-22 21:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `task_lists`
--

CREATE TABLE `task_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_lists`
--

INSERT INTO `task_lists` (`id`, `project_id`, `member_id`, `task_name`, `description`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(20, 11, 11, 'Drawing of Plans', '<p>scajskgcjas</p>', 5, 'Pending', '2024-04-22 21:12:46', '2024-04-22 21:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'member',
  `avatar` varchar(255) DEFAULT NULL,
  `is_activated` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `email_verified_at`, `password`, `type`, `avatar`, `is_activated`, `is_deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$12$SFC/Yu4iMEJ1q2dg9oGvi.xUDKv27NC5IW9az9hV7/eQyE.E/pHq6', '1', 'avatars/avatar_1.jpg', 0, 0, 'LFKFH1OqFFoCOS8YHxHzOOAFGJm3Lm4dRjIndpQgezE1LDW8EDV3zFDATfhn', '2024-02-27 05:48:18', '2024-03-16 05:02:48'),
(10, 'Leoven Calsena', 'calsenaleoven@gmail.com', NULL, '$2y$12$dohOasoa2i0Ov1H8I8MbD.a6aSNlx1FCzVuQyrgWLKduBIDk9y95a', '2', 'avatars/avatar_10.jpg', 1, 0, 'fPJGAoBLsLRCBZFGqe6CWdSSp2EG0H0CsNPVeJmz5xfbC3Qt6uV2lOzmWQWl', '2024-04-18 22:29:33', '2024-04-22 16:05:06'),
(11, 'Adley Herrera', 'iamleovenc@gmail.com', NULL, '$2y$12$eYF7y0EMLtAn2b8xv6uVJOajiDPRp4d0F4b2nCSg/hZ5QuED6hiwS', '3', 'avatars/avatar_11.jpg', 1, 0, NULL, '2024-04-18 22:32:08', '2024-04-18 22:32:44'),
(12, 'John Paul Del Rosario', 'vhenzity@gmail.com', NULL, '$2y$12$E0eEEAXkzj7PnjtC9LuhIeJcKDQsSNk.gY0WGOgSJweX0Onp3VLeW', '0', 'avatars/avatar_12.png', 1, 0, 'KvzEMV4yIEbpdjvRbntnyQClNzPdGyuJlOli4jSfgfKwH0DiSKESoMNbl72d', '2024-04-18 22:34:41', '2024-04-19 06:41:10'),
(13, 'Project Manager 1', 'projectmanager1@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '2', NULL, 1, 0, NULL, NULL, NULL),
(14, 'Project Manager 2', 'projectmanager2@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '2', NULL, 1, 0, NULL, NULL, NULL),
(15, 'Project Manager 3', 'projectmanager3@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '2', NULL, 1, 0, NULL, NULL, NULL),
(16, 'Project Member 1', 'projectmember1@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '3', NULL, 1, 0, NULL, NULL, NULL),
(17, 'Project Member 2', 'projectmember2@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '3', NULL, 1, 0, NULL, NULL, NULL),
(18, 'Project Member 3', 'projectmember3@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '3', NULL, 1, 0, NULL, NULL, NULL),
(19, 'Project Member 4', 'projectmember4@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '3', NULL, 1, 0, NULL, NULL, NULL),
(20, 'Project Member 5', 'projectmember5@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '3', NULL, 1, 0, NULL, NULL, NULL),
(21, 'Project Owner 1', 'projectowner1@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '0', NULL, 1, 0, NULL, NULL, NULL),
(22, 'Project Owner 2', 'projectowner2@gmail.com', NULL, '$2y$12$m/JLK12lYK4VgLW1SHMTAefdaH6fnTRHarsvlCHFhtzoNwiKGBFUu', '0', NULL, 1, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `project_file_managers`
--
ALTER TABLE `project_file_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_file_managers_project_id_foreign` (`project_id`),
  ADD KEY `project_file_managers_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_lists`
--
ALTER TABLE `project_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_lists_manager_id_foreign` (`manager_id`),
  ADD KEY `project_lists_project_owner_foreign` (`project_owner`);

--
-- Indexes for table `project_materials`
--
ALTER TABLE `project_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_materials_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_members_project_id_foreign` (`project_id`),
  ADD KEY `project_members_user_id_foreign` (`user_id`);

--
-- Indexes for table `task_lists`
--
ALTER TABLE `task_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_lists_project_id_foreign` (`project_id`),
  ADD KEY `task_lists_member_id_foreign` (`member_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_file_managers`
--
ALTER TABLE `project_file_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_lists`
--
ALTER TABLE `project_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project_materials`
--
ALTER TABLE `project_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `task_lists`
--
ALTER TABLE `task_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_file_managers`
--
ALTER TABLE `project_file_managers`
  ADD CONSTRAINT `project_file_managers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_lists` (`id`),
  ADD CONSTRAINT `project_file_managers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_lists`
--
ALTER TABLE `project_lists`
  ADD CONSTRAINT `project_lists_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_lists_project_owner_foreign` FOREIGN KEY (`project_owner`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_materials`
--
ALTER TABLE `project_materials`
  ADD CONSTRAINT `project_materials_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_lists` (`id`);

--
-- Constraints for table `project_members`
--
ALTER TABLE `project_members`
  ADD CONSTRAINT `project_members_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_lists` (`id`),
  ADD CONSTRAINT `project_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `task_lists`
--
ALTER TABLE `task_lists`
  ADD CONSTRAINT `task_lists_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `task_lists_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_lists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
