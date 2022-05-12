a-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-05-2022 a las 18:35:19
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
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `editorial` varchar(255) DEFAULT NULL,
  `edicion` varchar(255) DEFAULT NULL,
  `paginas` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `enlace` varchar(255) NOT NULL,
  `url_img_caratula` varchar(255) DEFAULT NULL,
  `notas` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `titulo`, `autor`, `editorial`, `edicion`, `paginas`, `isbn`, `enlace`, `url_img_caratula`, `notas`, `created_at`, `updated_at`) VALUES
(1, 'Trilogía sobre los primeros pobladores de Tunja', 'Dra. Magdalena Corradine', NULL, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(2, 'Obra ampliada sobre los llenerenses que pasaron a América', 'Luis Garraín Villa', NULL, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(3, 'Médicos coloniales venezolanos', 'Dr. Manuel Hernández González', NULL, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(4, 'Familiares y funcionarios del Santo Oficio en Venezuela', 'Dr. Emanuel Amodio', NULL, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(5, 'Contenido práctico-teórico del Derecho Genealogista', 'Dr. Crisanto Bello', NULL, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13');

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
(7, '2022_05_02_180648_create_permission_tables', 1),
(8, '2022_05_10_212414_create_books_table', 1);

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
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

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

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.crud.users.index', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(2, 'admin.crud.users.create', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(3, 'admin.crud.users.edit', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(4, 'admin.crud.users.destroy', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(5, 'admin.crud.roles.index', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(6, 'admin.crud.roles.create', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(7, 'admin.crud.roles.edit', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(8, 'admin.crud.roles.destroy', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(9, 'admin.crud.permissions.index', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(10, 'admin.crud.permissions.create', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(11, 'admin.crud.permissions.edit', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(12, 'admin.crud.permissions.destroy', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(13, 'admin.crud.books.index', 'web', '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(14, 'admin.crud.books.create', 'web', '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(15, 'admin.crud.books.edit', 'web', '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(16, 'admin.crud.books.destroy', 'web', '2022-05-12 22:32:13', '2022-05-12 22:32:13');

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
(1, 'Administrador', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(2, 'Operador', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12'),
(3, 'Cliente', 'web', '2022-05-12 22:32:12', '2022-05-12 22:32:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(13, 2),
(14, 2),
(15, 2);

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
('Lwyh6v2SldtoHoD4B4IlxConVNNWu8M2yjbx7mLC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV2s2YmFpYzlzbkJ1TTU2a256V25xQVg0SWFaSVl5M2Y3Q2VrQjlZUCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovL2ZpZF8yMDIyLnRlc3QvYWRtaW4vdXNlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovL2ZpZF8yMDIyLnRlc3QvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1652380339);

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
(1, 'Pedro Bazó', 'bazo.pedro@gmail.com', '2022-05-12 22:32:13', '$2y$10$hutYTNXmMvL7L2QhR0slne.XP9zH9gqCtFdX4PFr.9k1jSE9qAJHS', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(2, 'Alejandro Díaz', 'sistemasccs@sefarvzla.com', '2022-05-12 22:32:13', '$2y$10$nozBnnt53JkJu5uGQZzdEupCbvG4FlBInWM5Ugrq0Uafz2gpC19UK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(3, 'Prueba Operador', 'operador@gmail.com', '2022-05-12 22:32:13', '$2y$10$Xa5qzjnnk8jBVr4u1lmtGuUF3DaolNAARDU0CCcgIhQoBkb9WPlk.', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(4, 'Prueba cliente', 'cliente@gmail.com', '2022-05-12 22:32:13', '$2y$10$H.ADcjleLPW6mbN7oMQnGOOXn44zklYeOgotKwaoCerOpkDXoR..2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(5, 'Prueba Sin Rol', 'sinrol@gmail.com', '2022-05-12 22:32:13', '$2y$10$bfPxnZ3003KNORDlTqvUEeIWHRruIJ0LMlJKkLsCT6vlOM9GBcKQm', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(6, 'Mrs. Pattie Towne', 'oeichmann@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ecXpx9m0Xe', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(7, 'Lorenz Morissette', 'lakin.trisha@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'lww6OZNhOS', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(8, 'Prof. Carrie Osinski', 'bahringer.lauriane@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'xFjaQQuQHb', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(9, 'Meda Sauer', 'pierce41@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'KC54a2dQ8z', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(10, 'Forest Doyle', 'simeon.ferry@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'jAXtEBuZ5f', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(11, 'Oswald Zemlak', 'pedro21@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'LiHhxJXXYb', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(12, 'Troy Heaney', 'reina34@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'G86VoWDSNS', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(13, 'Amina Maggio', 'lgrady@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'qx9btxWJZs', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(14, 'Prof. Jaeden Kris', 'pgoodwin@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'SwnxfsREZH', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(15, 'Ms. Meda Botsford V', 'granville.hayes@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'yvckDhmBo3', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(16, 'Katharina Berge', 'lysanne.gerlach@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'zH66ovIMj6', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(17, 'Davin Torphy I', 'dawson.lowe@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'f0NWDaeAfg', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(18, 'Dr. Magali McCullough', 'nbartell@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'e0jVevkMCd', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(19, 'Brennon Hirthe', 'daron47@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'EOnwARH2px', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(20, 'Prof. Caesar Walsh', 'ruthe24@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '7ufyMn6ruu', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(21, 'Miss Katlyn Hill DVM', 'uwillms@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'AJwG5RH4RL', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(22, 'Ms. Liana McClure PhD', 'markus.wunsch@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '0Ob7YvD212', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(23, 'Prof. Collin Russel', 'angelina43@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '4y9FmPNs1N', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(24, 'Okey Tremblay', 'banderson@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'YxTAPcJC2H', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(25, 'Conor Jacobson', 'ahmad30@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'EO6VEmBup7', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(26, 'Kristoffer Heathcote', 'erempel@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'eEh7KCGXqv', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(27, 'Dr. Camren Stanton', 'charley03@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'TWxdbGcj27', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(28, 'Elisha Bradtke', 'ikilback@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '072wch6Feb', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(29, 'Chanel Renner', 'anahi17@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '712j8Flrdx', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(30, 'Christ Hudson', 'ireinger@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'fRkRlU9BqM', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(31, 'Dr. Murphy Auer DDS', 'gardner40@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'N82RmEuftE', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(32, 'Jonathan Hyatt', 'stella.pacocha@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'tr1fJuiuuh', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(33, 'Walter Brakus', 'llewellyn.padberg@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'p51hVM94Yn', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(34, 'Deion Sanford', 'torp.lonzo@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'einfUfKPuF', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(35, 'Manuel Schulist', 'cdietrich@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'OAOGdTfZCC', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(36, 'Cheyenne Gleichner', 'cydney.abbott@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '5cKkXqpSmV', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(37, 'Cesar Oberbrunner V', 'dasia.jaskolski@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '0tweUondOt', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(38, 'Sasha Waelchi', 'block.reggie@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ufj1O95ygC', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(39, 'Mr. Forrest Denesik DVM', 'hermann58@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '26UNNpOt4z', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(40, 'Giovanni Parisian', 'rudolph.russel@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'hUCM0Et3YZ', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(41, 'Emma Beer', 'pansy68@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'uMUipGgeqS', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(42, 'Brown Walker', 'tyler.kohler@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'jAIjwfLdZs', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(43, 'Prof. Dolly Hettinger MD', 'okon.river@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '5O6pxT1Iem', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(44, 'Monserrate Mohr DVM', 'robert33@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ALZgYgiZxB', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(45, 'Oda Kuvalis', 'twila.bruen@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'xUwIP4qg8o', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(46, 'Wilmer Bahringer DVM', 'kohler.earl@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'IlOnJWufCa', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(47, 'Jaquan Conroy', 'daugherty.vallie@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'aK1aZQDRDn', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(48, 'Dr. Bertha Lockman DDS', 'nader.zackery@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'gq5e3d7kIu', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(49, 'Micaela Bahringer', 'lula01@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'axGJ1gX3s2', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(50, 'Naomie Skiles', 'joannie12@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'twiH0YMFm7', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(51, 'Mr. Murray Pacocha IV', 'ikling@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Ch0B6HeJi5', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(52, 'Kiera Goodwin DDS', 'ovonrueden@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'BIEWtXS4DQ', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(53, 'Meredith O\'Kon', 'sister73@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '1T1xuuBTb6', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(54, 'Ally Beatty', 'kody60@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'mfQjizpmJf', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(55, 'Llewellyn Lemke', 'granville.smitham@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'gmLe9SjU1j', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(56, 'Leann Wyman', 'xrippin@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'BvIfngloSQ', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(57, 'Nils Schmeler', 'jacynthe38@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'xrmxy94yvn', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(58, 'Will Langworth', 'alex.wilderman@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'N7QEMjUgXP', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(59, 'Vida Becker', 'edubuque@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'XJDFmqzGTu', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(60, 'Dr. Vincenzo Ledner III', 'rosemary.reichert@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'hBp438MSzk', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(61, 'Mr. Nigel Ledner', 'rosenbaum.sherman@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '2pCOUWdQVZ', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(62, 'Donnell Feeney', 'kris.hilda@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'UJv4yoCwkh', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(63, 'Mya Mills', 'murphy.marcelino@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'L05h996sX7', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(64, 'Wayne Kreiger', 'carolyne24@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '6G8Fbhb5lk', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(65, 'Miss Karina Senger', 'erling.dubuque@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'oR6X2Pdjvn', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(66, 'Keira Cassin Sr.', 'pete29@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'M7uvA69ZCk', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(67, 'Zackery Ferry', 'judson.eichmann@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ucWNQUv9eJ', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(68, 'Missouri Adams', 'reynolds.sigrid@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'njuQOtunEq', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(69, 'Kobe Kozey', 'koelpin.isabella@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'hyoSCQkkIo', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(70, 'Edwina Hill', 'kunde.steve@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'u1uqEeZdIr', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(71, 'Isai Dooley PhD', 'aracely50@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'HFLMFvNWen', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(72, 'Ms. Heidi O\'Connell', 'little.filiberto@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'bB3UPsAlKP', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(73, 'Nannie Gleason DVM', 'heaney.kacey@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'tqhjxrl6IY', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(74, 'Oma Gulgowski', 'yasmeen27@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '1YaLgVMiwH', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(75, 'Dr. Wilton Kerluke', 'jayne49@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'i31tA9ybJq', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(76, 'Carmen Williamson', 'keeling.axel@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'RwW2HlIEk6', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(77, 'Dallas Bergstrom', 'kwolf@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'RCEY13Y4xF', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(78, 'Mr. Billy Lind', 'ghammes@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'OK1KWUMvNN', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(79, 'Douglas Berge V', 'amari52@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'MmVZEATz8X', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(80, 'Willow Johnson I', 'howe.enrico@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'hx3uU6zUFb', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(81, 'Dorcas Ullrich', 'charlene32@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'N8GfElgTf3', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(82, 'Mr. Koby Quitzon II', 'schimmel.josh@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'IJBk0dH3F0', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(83, 'Patricia Schimmel Sr.', 'pearline.muller@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'tSSjNY9G7z', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(84, 'Clarabelle Lemke', 'rudolph19@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Ve9OkEVdyq', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(85, 'Prof. Jany Corwin', 'hudson.rutherford@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'MBOSAIgURv', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(86, 'Winifred Heller', 'vivien36@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'nh6v6ofx5k', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(87, 'Emelia Schimmel', 'hadley.koch@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'Uxv8tGt1LH', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(88, 'Ms. Mattie Bauch Jr.', 'hauck.sonya@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ZA5kAJUe0P', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(89, 'Angelica Hermiston', 'bgerhold@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'RoSftunrQj', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(90, 'Juwan Treutel', 'marco.gislason@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'SnpPBoCjI1', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(91, 'Prof. Nigel Senger', 'reilly.miracle@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'mMTGZwUwrX', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(92, 'Felicita Littel', 'pfannerstill.junior@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'TFFqe2dbfn', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(93, 'Brandy Bartoletti', 'dena68@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'o1Qkfnow84', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(94, 'Mrs. Gregoria Reichel DDS', 'hagenes.lincoln@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'H7PEKEF2TM', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(95, 'Bennie Kerluke', 'juliet.kshlerin@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'VEEyaJFVd3', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(96, 'Maynard Ankunding', 'mhegmann@example.net', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'yiPUOC03Zp', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(97, 'Maximo Borer', 'gregory.miller@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'y0U2DwEW6L', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(98, 'Casandra Weber', 'timmy56@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'aiWMbEBMch', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(99, 'Jessika Kshlerin MD', 'vidal31@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ZcB0YES7iH', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(100, 'Alexie Cassin', 'braun.princess@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '6V49rITq1R', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(101, 'Talon Lang', 'amara26@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'T6R9ilt5FB', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(102, 'Prof. Laurence Nikolaus', 'umiller@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'EFNRwAr4im', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(103, 'Ms. Karen Medhurst DDS', 'heathcote.daniela@example.com', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'qqMfy7oBX0', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13'),
(104, 'Shayne Schoen', 'stephania56@example.org', '2022-05-12 22:32:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'M9kK2fspWX', NULL, NULL, '2022-05-12 22:32:13', '2022-05-12 22:32:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

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
