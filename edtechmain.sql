-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 10:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edtechmain`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `exam_id`, `question_id`, `answer_text`, `submitted_at`, `created_at`, `updated_at`, `is_correct`) VALUES
(13, '1', '1', '3', 'Effort', '2023-09-25 06:45:17', '2023-09-25 03:45:17', '2023-09-25 03:45:17', 1),
(14, '1', '1', '4', 'good conductors', '2023-09-25 06:45:28', '2023-09-25 03:45:28', '2023-09-25 03:45:28', 1),
(15, '2', '1', '3', 'Effort', '2023-09-25 07:39:08', '2023-09-25 04:39:08', '2023-09-25 04:39:08', 1),
(16, '2', '1', '4', 'Conductor', '2023-09-25 07:39:18', '2023-09-25 04:39:18', '2023-09-25 04:39:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `choice_text`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, '3', 'Effort', '1', '2023-09-24 12:46:22', '2023-09-24 12:46:22'),
(2, '3', 'Power', '0', '2023-09-24 12:46:22', '2023-09-24 12:46:22'),
(3, '3', 'Force', '0', '2023-09-24 12:46:22', '2023-09-24 12:46:22'),
(4, '3', 'Work', '0', '2023-09-24 12:46:22', '2023-09-24 12:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `description`, `duration`, `start_time`, `end_time`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Science', 'This is the Grade 6 Science exam paper', '5', '2023-10-01 09:00:00', '2023-10-01 10:00:00', NULL, '2023-09-24 11:21:13', '2023-09-24 11:21:13'),
(2, 'Social Studies', 'This is the Grade 6 social studies exam paper', '5', '2023-10-01 10:00:00', '2023-10-01 11:00:00', NULL, '2023-09-24 11:21:13', '2023-09-24 11:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_23_182942_add_role_to_users', 2),
(6, '2023_09_23_194207_create_users_table', 3),
(7, '2023_09_23_194918_create_roles_table', 4),
(8, '2023_09_23_200532_add_role_to_users_table', 5),
(9, '2023_09_23_201157_create_users_table', 6),
(10, '2023_09_24_132157_create_exams_table', 7),
(11, '2023_09_24_132401_create_questions_table', 7),
(12, '2023_09_24_134232_create_choices_table', 7),
(13, '2023_09_24_134253_create_answers_table', 7),
(14, '2023_09_24_140715_add_is_correct_to_answers', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_question_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question_text`, `question_type`, `short_question_answer`, `created_at`, `updated_at`) VALUES
(3, '1', 'The force applied to do work is called ?', 'multiple_choice', NULL, '2023-09-24 12:46:22', '2023-09-24 12:46:22'),
(4, '1', 'What is the name of material that allows heat to pass through?', 'short_text', 'good conductors', '2023-09-24 12:46:22', '2023-09-24 12:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Parent', '2023-09-23 17:02:43', '2023-09-23 17:02:43'),
(2, 'Student', '2023-09-23 17:02:43', '2023-09-23 17:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MARK MASAI', 'MARKMASAI@GMAIL.COM', NULL, '$2y$10$1AmbECM82fSDmFwkjgRmUucT4kCFlLYnjkIHWeZ0gQrRzkwl.Fpy6', 'student', NULL, '2023-09-23 17:18:38', '2023-09-23 17:18:38'),
(2, 'John', 'john@gmail.com', NULL, '$2y$10$NX98knwbJM2oLrdTFIrzguv.9XfuGSDx2I0H5IIWpE59rsCFNaaY.', 'student', NULL, '2023-09-23 17:21:51', '2023-09-23 17:21:51'),
(3, 'JOSEPH MAINA', 'JOSEPHMAINA@GMAIL.COM', NULL, '$2y$10$zTvfVgk7T9yPGjq6x3h.RO94ywZp5Qndc7va7FH5zlcx5Bp.XhWQa', 'student', NULL, '2023-09-24 02:26:20', '2023-09-24 02:26:20'),
(4, 'TOM KARIUKI', 'TOM@GMAIL.COM', NULL, '$2y$10$p.eqGWEYruyuPq3MSH9YUe.dpCYjalNUQ7UpZUKrGuJkrf2cEy0.K', 'parent', NULL, '2023-09-24 02:33:12', '2023-09-24 02:33:12'),
(5, 'Peter', 'peter@gmail.com', NULL, '$2y$10$/PEQVTQ2VueNSCN3dEAoHO7AYk7tOTFWh9C897KRqrhAwP1t5o99a', 'Parent', NULL, '2023-09-24 03:42:22', '2023-09-24 03:42:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
