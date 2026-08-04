-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2026 at 02:23 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_it_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:32:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:14:\"dashboard.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:6:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:15:\"department.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:17:\"department.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:17:\"department.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:17:\"department.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:13:\"category.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:15:\"category.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:15:\"category.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:15:\"category.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:16:\"subcategory.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:18:\"subcategory.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:18:\"subcategory.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:18:\"subcategory.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:13:\"priority.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:15:\"priority.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:15:\"priority.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:15:\"priority.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:9:\"user.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:11:\"user.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:11:\"user.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:11:\"user.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:11:\"ticket.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:5:{i:0;i:1;i:1;i:3;i:2;i:4;i:3;i:6;i:4;i:7;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:13:\"ticket.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:7;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:13:\"ticket.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"ticket.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:13:\"ticket.assign\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:17:\"ticket.assignment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:14:\"ticket.comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:3;i:2;i:4;i:3;i:7;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:12:\"ticket.close\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:15:\"ticket.escalate\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:11:\"report.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:5;i:2;i:6;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:13:\"report.export\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:7:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:8:\"Helpdesk\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"IT Support\";s:1:\"c\";s:3:\"web\";}i:4;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:10:\"Supervisor\";s:1:\"c\";s:3:\"web\";}i:5;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:10:\"Manager IT\";s:1:\"c\";s:3:\"web\";}i:6;a:3:{s:1:\"a\";i:7;s:1:\"b\";s:4:\"User\";s:1:\"c\";s:3:\"web\";}}}', 1785938750);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#0d6efd',
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `name`, `icon`, `color`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HW', 'Hardware', 'fa-folder', '#0d6efd', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(2, 'SW', 'Software', 'fa-folder', '#0d6efd', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(3, 'NET', 'Network', 'fa-folder', '#0d6efd', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(4, 'PRN', 'Printer', 'fa-folder', '#0d6efd', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(5, 'EMAIL', 'Email', 'fa-folder', '#0d6efd', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(6, 'SERVER', 'Server', 'fa-folder', '#0d6efd', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(7, 'SEC', 'Security', 'fa-folder', '#0d6efd', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(8, 'OTHER', 'Other', 'fa-folder', '#0d6efd', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `code`, `name`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IT', 'Information Technology', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(2, 'HRD', 'Human Resource Development', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(3, 'FIN', 'Finance', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(4, 'ACC', 'Accounting', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(5, 'MKT', 'Marketing', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(6, 'OPS', 'Operational', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(7, 'LOG', 'Logistic', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(8, 'WH', 'Warehouse', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(9, 'GA', 'General Affairs', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(10, 'JYM', 'Stiedemann-Dibbert', 'Inventore ratione a nisi quia.', 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(11, 'MEP', 'Ebert Ltd', 'Quia explicabo alias rerum sit dolorum ut eligendi.', 1, '2026-08-04 07:03:04', '2026-08-04 07:03:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_31_023708_create_permission_tables', 1),
(5, '2026_07_31_024348_create_departments_table', 1),
(6, '2026_07_31_024356_create_categories_table', 1),
(7, '2026_07_31_024403_create_priorities_table', 1),
(8, '2026_07_31_024428_create_ticket_comments_table', 1),
(9, '2026_07_31_024435_create_ticket_histories_table', 1),
(10, '2026_07_31_024502_create_ticket_attachments_table', 1),
(11, '2026_07_31_024520_create_ticket_escalations_table', 1),
(12, '2026_07_31_025222_departments', 1),
(13, '2026_08_01_124600_create_sub_categories_table', 1),
(14, '2026_08_02_005433_add_profile_fields_to_users_table', 1),
(15, '2026_08_04_024415_create_tickets_table', 1),
(16, '2026_08_04_024512_create_ticket_assignments_table', 1),
(17, '2026_08_04_060812_create_ticket_statuses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6),
(7, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(2, 'department.view', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(3, 'department.create', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(4, 'department.update', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(5, 'department.delete', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(6, 'category.view', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(7, 'category.create', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(8, 'category.update', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(9, 'category.delete', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(10, 'subcategory.view', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(11, 'subcategory.create', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(12, 'subcategory.update', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(13, 'subcategory.delete', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(14, 'priority.view', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(15, 'priority.create', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(16, 'priority.update', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(17, 'priority.delete', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(18, 'user.view', 'web', '2026-08-04 07:03:00', '2026-08-04 07:03:00'),
(19, 'user.create', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(20, 'user.update', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(21, 'user.delete', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(22, 'ticket.view', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(23, 'ticket.create', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(24, 'ticket.update', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(25, 'ticket.delete', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(26, 'ticket.assign', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(27, 'ticket.assignment', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(28, 'ticket.comment', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(29, 'ticket.close', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(30, 'ticket.escalate', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(31, 'report.view', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(32, 'report.export', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#0d6efd',
  `response_time` int UNSIGNED NOT NULL,
  `resolution_time` int UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `code`, `name`, `color`, `response_time`, `resolution_time`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'P1', 'Critical', '#dc3545', 15, 120, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(2, 'P2', 'High', '#fd7e14', 30, 240, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(3, 'P3', 'Medium', '#ffc107', 60, 480, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(4, 'P4', 'Low', '#198754', 240, 1440, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(2, 'Admin', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(3, 'Helpdesk', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(4, 'IT Support', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(5, 'Supervisor', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(6, 'Manager IT', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01'),
(7, 'User', 'web', '2026-08-04 07:03:01', '2026-08-04 07:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
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
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(6, 2),
(7, 2),
(8, 2),
(10, 2),
(11, 2),
(12, 2),
(14, 2),
(15, 2),
(16, 2),
(18, 2),
(19, 2),
(20, 2),
(27, 2),
(1, 3),
(22, 3),
(23, 3),
(24, 3),
(26, 3),
(27, 3),
(28, 3),
(30, 3),
(1, 4),
(22, 4),
(24, 4),
(28, 4),
(29, 4),
(1, 5),
(31, 5),
(1, 6),
(22, 6),
(31, 6),
(22, 7),
(23, 7),
(28, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0NPQIxv25cC5KCEXpCCNC1Lq4prMAbAX6ZAKWKzd', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieHl5eUhkbmhRWXlZdEFFdlkzUDZCeERZV1hpZ2Q3aVFGZzU1SEs0bCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90aWNrZXRzIjtzOjU6InJvdXRlIjtzOjEzOiJ0aWNrZXRzLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1785853345);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `code`, `name`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'LAPTOP', 'Laptop', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(2, 1, 'PC', 'Desktop PC', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(3, 1, 'MONITOR', 'Monitor', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(4, 1, 'KEYBOARD', 'Keyboard', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(5, 1, 'MOUSE', 'Mouse', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(6, 2, 'WINDOWS', 'Windows', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(7, 2, 'OFFICE', 'Microsoft Office', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(8, 2, 'BROWSER', 'Browser', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(9, 2, 'PDF', 'PDF Reader', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(10, 3, 'LAN', 'LAN', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(11, 3, 'WIFI', 'WiFi', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(12, 3, 'VPN', 'VPN', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(13, 3, 'INTERNET', 'Internet', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(14, 4, 'EPSON', 'Printer Epson', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(15, 4, 'CANON', 'Printer Canon', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(16, 4, 'HP', 'Printer HP', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(17, 5, 'OUTLOOK', 'Outlook', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(18, 5, 'GMAIL', 'Gmail', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL),
(19, 5, 'EXCHANGE', 'Exchange', NULL, 1, '2026-08-04 07:03:00', '2026-08-04 07:03:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `requester_id` bigint UNSIGNED NOT NULL,
  `assigned_to` bigint UNSIGNED DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `priority_id` bigint UNSIGNED NOT NULL,
  `status` enum('NEW','OPEN','ASSIGNED','IN_PROGRESS','PENDING','ESCALATED','RESOLVED','CLOSED','CANCELLED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW',
  `due_at` timestamp NULL DEFAULT NULL,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `closed_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_number`, `subject`, `description`, `requester_id`, `assigned_to`, `department_id`, `category_id`, `sub_category_id`, `priority_id`, `status`, `due_at`, `resolved_at`, `closed_at`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HD-20260804-000001', 'Printer tidak dapat digunakan', 'Printer Epson L3210 mengalami paper jam sehingga tidak dapat mencetak dokumen.', 1, 4, 1, 1, 1, 1, 'ASSIGNED', NULL, NULL, NULL, NULL, '2026-08-04 07:03:03', '2026-08-04 07:09:59', NULL),
(2, 'HD-20260804-000002', 'Komputer sering restart sendiri', 'PC pada bagian keuangan sering restart secara tiba-tiba ketika menjalankan aplikasi.', 1, NULL, 1, 2, 2, 2, 'OPEN', NULL, NULL, NULL, NULL, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(3, 'HD-20260804-000003', 'Email perusahaan tidak dapat diakses', 'Pengguna tidak dapat login ke email perusahaan sejak pagi hari dan muncul pesan autentikasi gagal.', 1, NULL, 1, 3, 3, 3, 'IN_PROGRESS', NULL, NULL, NULL, NULL, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_assignments`
--

CREATE TABLE `ticket_assignments` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `assigned_by` bigint UNSIGNED NOT NULL,
  `assigned_to` bigint UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `assigned_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_assignments`
--

INSERT INTO `ticket_assignments` (`id`, `ticket_id`, `assigned_by`, `assigned_to`, `notes`, `assigned_at`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 'perhatikan roller yang ada pada printer apakah masih layak pakai', '2026-08-04 07:09:59', '2026-08-04 07:09:59', '2026-08-04 07:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachments`
--

CREATE TABLE `ticket_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_escalations`
--

CREATE TABLE `ticket_escalations` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_histories`
--

CREATE TABLE `ticket_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE `ticket_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#0d6efd',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_closed` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_statuses`
--

INSERT INTO `ticket_statuses` (`id`, `code`, `name`, `color`, `sort_order`, `is_default`, `is_closed`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'NEW', 'New', '#6f42c1', 1, 1, 0, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(2, 'OPEN', 'Open', '#0d6efd', 2, 0, 0, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(3, 'ASSIGNED', 'Assigned', '#20c997', 3, 0, 0, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(4, 'IN_PROGRESS', 'In Progress', '#fd7e14', 4, 0, 0, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(5, 'PENDING', 'Pending', '#ffc107', 5, 0, 0, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(6, 'ESCALATED', 'Escalated', '#dc3545', 6, 0, 0, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(7, 'RESOLVED', 'Resolved', '#198754', 7, 0, 0, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(8, 'CLOSED', 'Closed', '#212529', 8, 0, 1, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL),
(9, 'CANCELLED', 'Cancelled', '#6c757d', 9, 0, 1, 1, '2026-08-04 07:03:03', '2026-08-04 07:03:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `email`, `email_verified_at`, `password`, `department_id`, `remember_token`, `created_at`, `updated_at`, `position`, `phone`, `avatar`, `is_active`) VALUES
(1, 'EMP0001', 'Super Administrator', 'superadmin@helpdesk.test', NULL, '$2y$12$jp8lP9DBFPFH9HNrC75kbe6FgW5jZwsFNWGvSjyYPMaUMRF0eTrxq', 1, NULL, '2026-08-04 07:03:01', '2026-08-04 07:03:01', 'IT Manager', '08123456789', NULL, 1),
(2, 'EMP0002', 'Administrator', 'admin@helpdesk.test', NULL, '$2y$12$SYFadcUbSjhpC82LnVCrc.AQ8mW4YBPWukunQCPZXMGz5C.uji9rG', 1, NULL, '2026-08-04 07:03:01', '2026-08-04 07:03:01', 'Admin Staff', '08123456789', NULL, 1),
(3, 'EMP0003', 'Helpdesk Agent', 'helpdesk@helpdesk.test', NULL, '$2y$12$MoCYcfR4XGDHGaqUXCf.r.XgoBpzM1fg5DyLSILwmHntE/GmVnEva', 1, NULL, '2026-08-04 07:03:02', '2026-08-04 07:03:02', 'Helpdesk Officer', '08123456789', NULL, 1),
(4, 'EMP0004', 'IT Support Technical', 'itsupport@helpdesk.test', NULL, '$2y$12$R01F7ghCouI4gI83RGuohOutKDBxi/cF.kWkt2l/aPEwXAXftejVS', 1, NULL, '2026-08-04 07:03:02', '2026-08-04 07:03:02', 'IT Support Specialist', '08123456789', NULL, 1),
(5, 'EMP0005', 'IT Supervisor', 'supervisor@helpdesk.test', NULL, '$2y$12$.yhJcYQL6Jh9AAViHqMWz.Uba7T2B6vOjF8/RtXn/OqkZnR/awMMy', 1, NULL, '2026-08-04 07:03:02', '2026-08-04 07:03:02', 'IT Supervisor', '08123456789', NULL, 1),
(6, 'EMP0006', 'Manager IT', 'manager.it@helpdesk.test', NULL, '$2y$12$2YRGxSiFTRLYbMhKJ7IKbOXdKGWKweMEMMxGO7t2/ENqkLyRc.adW', 1, NULL, '2026-08-04 07:03:02', '2026-08-04 07:03:02', 'IT Manager', '08123456789', NULL, 1),
(7, 'EMP0007', 'Regular User', 'user@helpdesk.test', NULL, '$2y$12$9.pulLSMU.bDS2N9sHm8WuiNcCKEYIwJsynUXOhaOno109To3heTm', 1, NULL, '2026-08-04 07:03:03', '2026-08-04 07:03:03', 'Staff', '08123456789', NULL, 1),
(8, 'EMP8588', 'Test User', 'test@example.com', NULL, '$2y$12$dbQ9TGlU96pJJq2AMeq/XuJl3hdeGi/bfutuImklT.ATNQ3QLXfQi', 10, NULL, '2026-08-04 07:03:03', '2026-08-04 07:03:03', 'Pressing Machine Operator', '352-552-0510', NULL, 1),
(9, 'EMP5758', 'admin', 'admin@gmail.com', NULL, '$2y$12$fSEJDRmcRCIwCheSSYOJSevCO7PZhcMcAjXXaO0Mqg1Uz1IjvXB3K', 11, NULL, '2026-08-04 07:03:04', '2026-08-04 07:03:04', 'Train Crew', '812.697.9001', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_code_unique` (`code`),
  ADD KEY `categories_name_index` (`name`),
  ADD KEY `categories_is_active_index` (`is_active`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_code_unique` (`code`),
  ADD KEY `departments_name_index` (`name`),
  ADD KEY `departments_is_active_index` (`is_active`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `priorities_code_unique` (`code`),
  ADD KEY `priorities_is_active_index` (`is_active`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_code_unique` (`code`),
  ADD KEY `sub_categories_category_id_index` (`category_id`),
  ADD KEY `sub_categories_is_active_index` (`is_active`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_number_unique` (`ticket_number`),
  ADD KEY `tickets_department_id_foreign` (`department_id`),
  ADD KEY `tickets_category_id_foreign` (`category_id`),
  ADD KEY `tickets_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `tickets_priority_id_foreign` (`priority_id`),
  ADD KEY `tickets_updated_by_foreign` (`updated_by`),
  ADD KEY `tickets_ticket_number_index` (`ticket_number`),
  ADD KEY `tickets_status_index` (`status`),
  ADD KEY `tickets_requester_id_index` (`requester_id`),
  ADD KEY `tickets_assigned_to_index` (`assigned_to`);

--
-- Indexes for table `ticket_assignments`
--
ALTER TABLE `ticket_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_assignments_ticket_id_index` (`ticket_id`),
  ADD KEY `ticket_assignments_assigned_by_index` (`assigned_by`),
  ADD KEY `ticket_assignments_assigned_to_index` (`assigned_to`),
  ADD KEY `ticket_assignments_assigned_at_index` (`assigned_at`);

--
-- Indexes for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_escalations`
--
ALTER TABLE `ticket_escalations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_histories`
--
ALTER TABLE `ticket_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_statuses_code_unique` (`code`),
  ADD KEY `ticket_statuses_code_index` (`code`),
  ADD KEY `ticket_statuses_sort_order_index` (`sort_order`),
  ADD KEY `ticket_statuses_is_default_index` (`is_default`),
  ADD KEY `ticket_statuses_is_closed_index` (`is_closed`),
  ADD KEY `ticket_statuses_is_active_index` (`is_active`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_employee_id_unique` (`employee_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_assignments`
--
ALTER TABLE `ticket_assignments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_escalations`
--
ALTER TABLE `ticket_escalations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_histories`
--
ALTER TABLE `ticket_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_requester_id_foreign` FOREIGN KEY (`requester_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `ticket_assignments`
--
ALTER TABLE `ticket_assignments`
  ADD CONSTRAINT `ticket_assignments_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_assignments_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_assignments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
