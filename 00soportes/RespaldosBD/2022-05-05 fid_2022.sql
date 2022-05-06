-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-05-2022 a las 17:06:28
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fid_2022`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_05_01_180827_create_sessions_table', 1),
(7, '2022_05_02_180648_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(2, 'Produccion', 'web', '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(3, 'Cliente', 'web', '2022-05-04 18:14:28', '2022-05-04 18:14:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('L9JmiSThgN1We8uxItoQWCqbK0bYlerNuhFBu9Ci', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWhiMVdQQTI4Q0drOUxEVVVQRGpDbHN2ZkpyelpsWjlYZVNOMzVqMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1651700130),
('lWNRAGgJwvYsz3Yekt04q2okW6PZLGb5vkuYeHdr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmhQaWFxYkRyRUpDZ1JueHVyb3lzZ3RESkpEVFVtYjdxdzIzQVJkbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL2ZpZF8yMDIyLnRlc3QvZGFzaGJvYXJkIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9maWRfMjAyMi50ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1651694681),
('RAs03NUiOtOyjW6hP8aOYwTP2X2SPqMTDjFyXJ6B', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianNKZ2hJOU1KWXNWWjNzS1Z0Nkc2YzVicVgxSEp5dE5YdGdyb3QwaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9maWRfMjAyMi50ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1651704846),
('RxUsBWlysQXvI8deW7gy6cl7E4FTQq4oma4JlXko', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUVVvU2l2YXF5dDdtVGJodlRxU0pKV2R1UnhMNE43SnhZdkJtWXU5UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1651698407),
('YeyPJwGCmSrqHm7DGpQg5WdlHyth8AEMTPJm2o4m', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMkRKS2tOMlA1OHZOdWFWZ1lqeTZ5bGJMeGJtbHpsOU5ON3d1U3EwRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9maWRfMjAyMi50ZXN0L2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkWkRPSGdVYWNIclV3aFdKMTFnS1NnZVBSR3FId2lqTFdhQjhXdVp4UlRvdEF6QkgwTGlVeXEiO30=', 1651676702),
('YXt58jcbDK8qeCug8q425EEAEmqW0xW9cgMXwGHG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHdsRFNCaGNIWHhuQ3ZTcXk1RXo5TVJTeE1ObTZCTUs2cllQbmpyTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9maWRfMjAyMi50ZXN0Ijt9fQ==', 1651757891);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text,
  `two_factor_recovery_codes` text,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Pedro Bazó', 'bazo.pedro@gmail.com', '2022-05-04 18:14:28', '$2y$10$ZDOHgUacHrUwhWJ11gKSgePRGqHwijLWaB8WuZxRTotAzBH0LiUyq', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(2, 'Prueba Producción', 'produccion@gmail.com', '2022-05-04 18:14:28', '$2y$10$mNX4Kr550bfsTwb.BAkY5ea2Q4kdw0Hbe2wAvQ.6kBWAh88dyXBSK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(3, 'Prueba cliente', 'cliente@gmail.com', '2022-05-04 18:14:28', '$2y$10$F/jPt08ml1/9kztPW/ct9./hheVKcKb4DHuNgZHkad9g0uw6BL0W6', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(4, 'Prueba Sin Rol', 'sinrol@gmail.com', '2022-05-04 18:14:28', '$2y$10$j0cnUNjNoIYw5vCtqoM4Bu98zP2NQS1s6.iFH0ij9ks3GtmqzP1UC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(5, 'Prof. Bridie Hoeger MD', 'zboncak.vallie@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'fpvIcu34ss', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(6, 'Jimmy Renner', 'destin.koch@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'cY45PLHstN', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(7, 'Jonatan Boyer DVM', 'sschuppe@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'oam5pfvQiJ', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(8, 'Ethelyn Erdman', 'dach.alphonso@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'akWtllEVOI', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(9, 'Prof. Alyce Johns DDS', 'lgrimes@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'g2PT8PKA5x', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(10, 'Talon Kovacek', 'ohara.martin@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'pGMf3ZkEuo', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(11, 'Mr. Ron Murazik', 'rafael.trantow@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Jx5FGKpE9j', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(12, 'Antonio Walter', 'brenna.mcglynn@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'cvfqcMGcYl', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(13, 'Elmo Erdman', 'jhermann@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'aezZJzirKp', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(14, 'Monserrat Jakubowski', 'frederick.yost@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ytRFxdmegG', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(15, 'Mr. Rick Hilpert', 'ted59@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'kAlBAaeb3Y', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(16, 'Deontae Greenfelder', 'kirlin.anastacio@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '7Lbh5f5EF7', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(17, 'Rylan Hodkiewicz', 'vbode@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'omG3wF7gQI', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(18, 'Magdalen Murazik', 'tkovacek@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'xXPYW8p9If', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(19, 'Dr. Antwon McDermott', 'jayda.prohaska@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'UjcBAb1LoD', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(20, 'Miss Delores Orn', 'lkoelpin@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'MY9WbA9bnL', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(21, 'Prof. Trystan Cartwright Sr.', 'myrtice.will@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ZzBJdPL07e', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(22, 'Leif Skiles', 'pacocha.jaiden@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'nOJ6WB6kOD', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(23, 'Eloy Hoeger', 'newell97@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'bIGuQxB2w7', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(24, 'Mrs. Jaquelin Feest', 'pbuckridge@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'WhqbIasDDV', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(25, 'Ryder Lowe', 'zieme.austin@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'BqyPpEiTXK', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(26, 'Prof. Ashlynn Cronin', 'margie58@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '0o6yBN5pVC', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(27, 'Jeffry Schaefer', 'cordell13@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'MgeaXH9AX9', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(28, 'Marisol Zemlak', 'ldare@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'XGet2o3rHi', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(29, 'Yoshiko Walker', 'emie09@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'j4JLbyzlPb', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(30, 'Prof. Sigurd Nolan I', 'lkonopelski@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'pMQSMIR3aA', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(31, 'Robyn Luettgen', 'gail.marquardt@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'hBqqT6F7xB', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(32, 'Mrs. Madelyn Senger DVM', 'dosinski@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'DrciLHvHbl', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(33, 'Kristoffer Schultz', 'ibednar@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '9l1MIuIsW5', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(34, 'Mayra Raynor', 'cameron37@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Kf6NQRaXl2', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(35, 'Coty Barton', 'darby.roberts@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '9PffEk8vhu', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(36, 'Gabrielle Abbott', 'thompson.riley@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ItSxMl6rpz', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(37, 'Prof. Russell Johns', 'dach.tracey@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'XVAIvEXPhS', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(38, 'Prof. Aurelie Quitzon', 'ivy.gleichner@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Mxk9BoINHe', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(39, 'Jana Christiansen DDS', 'eli65@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '8F7jP5ZUlP', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(40, 'Myah Kohler', 'nmedhurst@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'EU972P9UWv', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(41, 'Clara Gleichner', 'osinski.kavon@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '4ptlQYiDxl', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(42, 'Dr. Hunter Jaskolski', 'trantow.pink@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '2oHXx5Ostf', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(43, 'Domenica Kshlerin', 'bruen.vidal@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'SaWBQWddf2', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(44, 'Rowan Carter', 'aiyana55@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '5uifgxP30M', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(45, 'Noble Gutkowski', 'hettinger.johnson@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'jAQmFjrq5G', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(46, 'Dr. Porter Kirlin', 'kristofer.lueilwitz@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'rVVYZKW0Xl', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(47, 'Vilma Murazik', 'dayton11@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'B4CxlOsgCd', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(48, 'Maxwell O\'Conner', 'qmarks@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'XdmhK5hnwz', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(49, 'Mr. Benjamin Kutch PhD', 'clay85@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'YULgCBiMHH', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(50, 'Tressie Turcotte', 'rdach@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '8d2w9AvRZ5', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(51, 'Ms. Catharine Hettinger Jr.', 'heath.bartoletti@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'vuveTCY1T1', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(52, 'Mr. Tod Turner', 'buddy.hintz@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Y5lj7XRJ6N', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(53, 'Catharine Roberts', 'lucy.goyette@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'soycomjirP', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(54, 'Prof. Freida Reichert', 'heidenreich.della@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'XZUGvKnOuV', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(55, 'Laila Boehm', 'kframi@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '6dv8FdM3Du', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(56, 'Marcelino Senger', 'sbogisich@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'rGfFH8LtU1', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(57, 'Hal Lynch', 'vern57@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'rdm8n0HiXV', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(58, 'Miss Cathrine Sawayn', 'jed.ward@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'dEvyMCsJgP', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(59, 'Dandre Konopelski IV', 'clifford26@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '2xQtcyeCAr', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(60, 'Freeman Hessel', 'marjolaine35@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'JjNmGmf3Kl', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(61, 'Jacinthe Goyette IV', 'estella75@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '5v3Zd7aqJ2', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(62, 'Patrick Kuphal', 'cloyd05@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'daabyR0h1B', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(63, 'Alayna Bruen', 'parker.xzavier@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'CJwEupQKmN', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(64, 'Frances Mayert', 'violette11@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '9fiSygBjZh', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(65, 'Donato Treutel', 'raul.feil@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ERCno91Ojd', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(66, 'Kaci Pollich', 'ignacio.ward@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '6lwZdUtOPv', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(67, 'Joanny Predovic', 'tschulist@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'tXYB6jH801', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(68, 'Lavern Lebsack', 'boyle.mabel@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '04dT7XkT4V', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(69, 'Theresa Lebsack', 'braxton97@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'hsYGbEo4wV', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(70, 'Kitty Carter PhD', 'kunze.ben@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'U1nJubf1bF', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(71, 'Cathryn Lowe', 'bernard28@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ftttKc20fX', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(72, 'Prof. Adrianna Swift', 'lynch.gabe@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '9eEYurxPjP', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(73, 'Dr. Camren Hansen V', 'cicero72@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'aQ9sckWNvl', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(74, 'Mrs. Marianna Schaden', 'wschowalter@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'LVo8QD1YJ1', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(75, 'Emiliano Lebsack MD', 'bruen.hilda@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'SYRfzPkDTS', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(76, 'Bert Rutherford', 'rmuller@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '1d8WQR6m3k', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(77, 'Ms. Elena Dietrich', 'zryan@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'e5VrbiyuXg', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(78, 'Shaylee Predovic', 'mark.mertz@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'zHU5RgMGJM', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(79, 'Cory Marks', 'jameson18@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'xc6eTwZS5i', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(80, 'Mr. Lula Shanahan', 'ortiz.shayne@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'q3MUXJoFFy', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(81, 'Prof. Hayden Metz', 'litzy01@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'S9LwqDepve', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(82, 'Magdalen Sanford', 'iohara@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Fq5DN3HDqW', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(83, 'Stephania McLaughlin MD', 'emiliano.denesik@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'e55a7XRrKB', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(84, 'Richie Kemmer', 'amya.mraz@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'lCfUKcFWEj', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(85, 'Kaia Weissnat', 'krajcik.maggie@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'd47yp5a4bg', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(86, 'Fabian Reichel', 'jaylan59@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'MTvWULLZDp', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(87, 'Fidel Marquardt', 'romaguera.joey@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'AitprKGHLU', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(88, 'Rey Hirthe PhD', 'toberbrunner@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'OerytEia5j', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(89, 'Margarete Langosh', 'boyer.joseph@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '0FVNnOjYvO', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(90, 'Queen Lemke IV', 'alice.torphy@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'r6VQNScfCk', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(91, 'Madelyn Wilkinson Sr.', 'abdul75@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Znu4GGe85W', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(92, 'Carlie Roob MD', 'kamryn04@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'GmC0GL7ikv', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(93, 'Ms. Shayna Adams Sr.', 'damore.al@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'y382PthIYd', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(94, 'Ward Schuster', 'connie99@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'f9fVsWaS8W', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(95, 'Dr. Sid Dooley', 'dicki.alvera@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'GlkIUXtcmK', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(96, 'Gracie McKenzie', 'jody.hill@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'sqvQGYbTHK', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(97, 'Mrs. Delia Bernier I', 'vdickens@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'FzqEoQAZCk', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(98, 'Prof. Kelsi Gulgowski III', 'milford71@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'iO78n2NJiB', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(99, 'Ryley Purdy', 'lue.bailey@example.net', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'kefCYxVYLX', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(100, 'Braden Littel', 'luettgen.jake@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '3UEw1mYxaQ', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(101, 'Nathan Carroll', 'pfranecki@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Hd0cRxaovR', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(102, 'Prof. Cole Boehm Sr.', 'mitchell.rickie@example.com', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'rFOyA8rUcP', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28'),
(103, 'Howard Gutkowski', 'allison37@example.org', '2022-05-04 18:14:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ShJA87BiGP', NULL, NULL, '2022-05-04 18:14:28', '2022-05-04 18:14:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
