-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 أبريل 2025 الساعة 16:23
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- بنية الجدول `active_tokens`
--

CREATE TABLE `active_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `active_tokens`
--

INSERT INTO `active_tokens` (`id`, `department_id`, `token`, `created_at`, `updated_at`) VALUES
(2, 2, 'eyJpZCI6MiwibmFtZSI6IkFtYnVsYW5jZSIsInR5cGVfaWQiOjIsImNyZWF0ZWRfYXQiOiIyMDI1LTA0LTE1VDA0OjI5OjQxLjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNS0wNC0xNVQwNDoyOTo0MS4wMDAwMDBaIn0=', '2025-04-19 15:03:35', '2025-04-19 15:03:35'),
(3, 4, 'eyJpZCI6NCwibmFtZSI6IkVtZXJnZW5jeVJhZGlvR3JhcGhlciIsInR5cGVfaWQiOjIsImNyZWF0ZWRfYXQiOiIyMDI1LTA0LTE1VDA0OjI5OjQxLjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNS0wNC0xNVQwNDoyOTo0MS4wMDAwMDBaIn0=', '2025-04-19 15:08:01', '2025-04-19 15:08:01'),
(4, 9, 'eyJpZCI6OSwibmFtZSI6IldhcmVIb3VzZSBEZXBhcnRtZW50IiwidHlwZV9pZCI6MywiY3JlYXRlZF9hdCI6IjIwMjUtMDQtMTVUMDQ6Mjk6NDIuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI1LTA0LTE1VDA0OjI5OjQyLjAwMDAwMFoifQ==', '2025-04-19 15:15:47', '2025-04-19 15:15:47');

-- --------------------------------------------------------

--
-- بنية الجدول `belong_to_deps`
--

CREATE TABLE `belong_to_deps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tender_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `bid_number` varchar(255) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `tax_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `currency` varchar(3) NOT NULL DEFAULT 'U$A',
  `valid_until` date NOT NULL,
  `status` enum('draft','submitted','under_technical_evaluation','under_financial_evaluation','accepted','rejected') NOT NULL DEFAULT 'draft',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `bid_items`
--

CREATE TABLE `bid_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid_id` bigint(20) UNSIGNED NOT NULL,
  `tender_item_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` decimal(12,3) NOT NULL,
  `total_price` decimal(15,3) NOT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'U$A',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `births`
--

CREATE TABLE `births` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `borns`
--

CREATE TABLE `borns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cleaner 1', 'clean', '2025-04-19 15:19:22', '2025-04-23 06:42:14'),
(2, 'Cleaner', 'Clean and ta3keem', '2025-04-23 11:20:01', '2025-04-23 11:20:01');

-- --------------------------------------------------------

--
-- بنية الجدول `cat_items`
--

CREATE TABLE `cat_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `cat_items`
--

INSERT INTO `cat_items` (`id`, `category_id`, `sub_category_id`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 47, NULL, NULL),
(2, 1, 1, 48, NULL, NULL),
(3, 1, 1, 49, NULL, '2025-04-23 06:54:26'),
(4, 1, 1, 51, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tender_id` bigint(20) UNSIGNED NOT NULL,
  `bid_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `contract_number` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `status` enum('draft','active','suspended','completed','terminated') NOT NULL DEFAULT 'draft',
  `barcode` varchar(255) DEFAULT NULL COMMENT 'باركود العقد',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `dates`
--

CREATE TABLE `dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `deaths`
--

CREATE TABLE `deaths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mom_name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `National_id` varchar(255) NOT NULL,
  `death_date` varchar(255) NOT NULL,
  `death_hour` varchar(255) NOT NULL,
  `reason_of_death` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `departments`
--

INSERT INTO `departments` (`id`, `name`, `password`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'ITAdmin', '$2y$10$yYeIc8HRfPESXiXLnfG.H.6G5cOmcB3TV3jzAYxzsuChJ.vK8UROe', 1, '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(2, 'Ambulance', '$2y$10$zFZ0kwMlubzObIA3bekQ1eNVg9jWxGONz0dtSmY/pzIric9fcRO86', 2, '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(3, 'DepartmentReception', '$2y$10$ZOKGr9tgbBYucOyvI7sU5eGWnGiTv6Pv8fAHOxEGnVQCumfWjz/kO', 4, '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(4, 'EmergencyRadioGrapher', '$2y$10$H2yLC..B5Lj071YTGVUIU.bi5nRiFfc.wV/Ge4rIK0c6rREzUGcLe', 2, '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(5, 'RadioGrapher', '$2y$10$ylr.ko/gkdhns4MEMeNA8.RdrK/l/UlSfitjho3LVsFvVFgWPiKny', 4, '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(6, 'EmergencyTestLab', '$2y$10$vKUeL0ME0M8Im998ZlYAZu3eL7jjXGdlcmPZnDowgmK1gGmMeDX5G', 2, '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(7, 'TestLab', '$2y$10$Gkd5Tv2WjkWZkRdy3YvbWeVusNSklqH5q.ScrVZAptd32TCYDTmCC', 4, '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(8, 'AdmissionMonitor', '$2y$10$Hz8iapR9ggWivn.zdQIR9evb7R3EleQw07qaI3WuIcQtvqM06la7K', 1, '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(9, 'WareHouse Department', '$2y$10$wGZInwNIHDZbzMxLLXo3SuApXT4lnyUcEF2lTLWTc7pZyorRJgWqq', 3, '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(10, 'HR', '$2y$10$mr7gCR2m5zSnxf4GeCIZtO07nx2uJ7QrjeiKKefIahlvZbiRJirMG', 1, '2025-04-15 01:29:42', '2025-04-15 01:29:42');

-- --------------------------------------------------------

--
-- بنية الجدول `empatients`
--

CREATE TABLE `empatients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `mom_name` varchar(255) NOT NULL,
  `chain` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `chronic_diseases` varchar(255) NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `case_description` varchar(255) NOT NULL,
  `treatment_required` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `empatients`
--

INSERT INTO `empatients` (`id`, `full_name`, `address`, `date_of_birth`, `mom_name`, `chain`, `gender`, `chronic_diseases`, `blood_type`, `case_description`, `treatment_required`, `created_at`, `updated_at`) VALUES
(1, 'أيهم القضماني', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'no', 'A+', 'عملية', 'فسم العمليات', '2025-04-19 15:05:24', '2025-04-19 15:05:24');

-- --------------------------------------------------------

--
-- بنية الجدول `em_archives`
--

CREATE TABLE `em_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `mom_name` varchar(255) NOT NULL,
  `chain` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `case_description` varchar(255) NOT NULL,
  `treatment_required` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `em_test_queues`
--

CREATE TABLE `em_test_queues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `em_xray_queues`
--

CREATE TABLE `em_xray_queues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `equipment_store_keepers`
--

CREATE TABLE `equipment_store_keepers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `e_m_p_belong_tos`
--

CREATE TABLE `e_m_p_belong_tos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `e_m_p_belong_tos`
--

INSERT INTO `e_m_p_belong_tos` (`id`, `patient_id`, `dep_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2025-04-19 15:05:24', '2025-04-19 15:09:20');

-- --------------------------------------------------------

--
-- بنية الجدول `e_m_p_transfar_operations`
--

CREATE TABLE `e_m_p_transfar_operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `from_dep_id` bigint(20) UNSIGNED NOT NULL,
  `to_dep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `e_m_p_transfar_operations`
--

INSERT INTO `e_m_p_transfar_operations` (`id`, `patient_id`, `from_dep_id`, `to_dep_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, '2025-04-19 15:09:20', '2025-04-19 15:09:20');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `filesarchives`
--

CREATE TABLE `filesarchives` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `mom_name` varchar(255) NOT NULL,
  `chain` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `test_result` varchar(255) NOT NULL,
  `X_ray_result` varchar(255) NOT NULL,
  `resident` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `inventory_logs`
--

CREATE TABLE `inventory_logs` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'المعرف الفريد للحركة',
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `action_type` enum('purchase','sale','return','adjustment','transfer','expiry','damage') NOT NULL COMMENT 'نوع الحركة',
  `quantity` int(11) NOT NULL COMMENT 'الكمية',
  `unit_cost` decimal(12,3) DEFAULT NULL COMMENT 'تكلفة الوحدة',
  `total_cost` decimal(15,3) DEFAULT NULL COMMENT 'التكلفة الإجمالية',
  `reference_type` varchar(255) DEFAULT NULL COMMENT 'نوع المرجع',
  `reference_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'معرف المرجع',
  `batch_number` varchar(255) DEFAULT NULL COMMENT 'رقم الدفعة',
  `expiry_date` date DEFAULT NULL COMMENT 'تاريخ الانتهاء',
  `notes` text DEFAULT NULL COMMENT 'ملاحظات',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `inventory_logs`
--

INSERT INTO `inventory_logs` (`id`, `item_id`, `department_id`, `action_type`, `quantity`, `unit_cost`, `total_cost`, `reference_type`, `reference_id`, `batch_number`, `expiry_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, 47, 9, 'adjustment', 10, 14000.000, 0.000, 'App\\Models\\Item', 47, NULL, NULL, 'no notes', '2025-04-19 17:11:58', '2025-04-19 17:11:58'),
(2, 48, 9, 'adjustment', 10, 14000.000, 0.000, '1', 48, NULL, NULL, 'no notes', '2025-04-19 17:15:31', '2025-04-19 17:15:31'),
(3, 49, 9, 'adjustment', 10, 14000.000, 0.000, 'App\\Models\\Item', 49, NULL, NULL, 'no notes', '2025-04-23 06:07:09', '2025-04-23 06:54:26'),
(4, 51, 9, 'purchase', 10, 14000.000, 0.000, 'App\\Models\\Item', 51, NULL, NULL, 'يحفظ بعيدا عن متناول الأطفال . للاستعمال الخارجي فقط', '2025-04-23 11:22:31', '2025-04-23 11:22:31');

-- --------------------------------------------------------

--
-- بنية الجدول `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `qr_code_path` varchar(255) DEFAULT NULL,
  `unit` varchar(255) NOT NULL,
  `weight` decimal(10,3) DEFAULT NULL,
  `current_quantity` int(11) NOT NULL DEFAULT 0,
  `min_quantity` varchar(255) NOT NULL DEFAULT '10',
  `cost` decimal(12,3) NOT NULL,
  `is_expirable` tinyint(1) NOT NULL DEFAULT 1,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `description`, `barcode`, `qr_code_path`, `unit`, `weight`, `current_quantity`, `min_quantity`, `cost`, `is_expirable`, `supplier_id`, `created_at`, `updated_at`) VALUES
(33, 'ww', 'aaa12469999991111111111111111', 'afafeaf', '123456789999991111111111111111q', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 16:41:34', '2025-04-19 16:41:34'),
(34, 'ww', 'aaa124699999911111111111111111', 'afafeaf', '123456789999991111111111111111q1', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 16:42:25', '2025-04-19 16:42:25'),
(35, 'ww', 'aaa1246999999111111111111111111', 'afafeaf', '123456789999991111111111111111q11', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 16:45:19', '2025-04-19 16:45:19'),
(36, 'ww', 'aaa12469999991111111111111111111', 'afafeaf', '123456789999991111111111111111q111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 16:49:23', '2025-04-19 16:49:23'),
(37, 'ww', 'aaa124699999911111111111111111111', 'afafeaf', '123456789999991111111111111111q1111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 16:51:11', '2025-04-19 16:51:11'),
(38, 'ww', 'aaa1246999999111111111111111111111', 'afafeaf', '123456789999991111111111111111q11111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 16:53:04', '2025-04-19 16:53:04'),
(39, 'ww', 'aaa12469999991111111111111111111111', 'afafeaf', '123456789999991111111111111111q111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 16:56:06', '2025-04-19 16:56:06'),
(40, 'ww', 'aaa124699999911111111111111111111111', 'afafeaf', '123456789999991111111111111111q1111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 16:56:56', '2025-04-19 16:56:56'),
(41, 'ww', 'aaa1246999999111111111111111111111111', 'afafeaf', '123456789999991111111111111111q11111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 17:04:45', '2025-04-19 17:04:45'),
(42, 'ww', 'aaa12469999991111111111111111111111111', 'afafeaf', '123456789999991111111111111111q111111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 17:05:15', '2025-04-19 17:05:15'),
(43, 'ww', 'aaa124699999911111111111111111111111111', 'afafeaf', '123456789999991111111111111111q1111111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 17:06:55', '2025-04-19 17:06:55'),
(44, 'ww', 'aaa1246999999111111111111111111111111111', 'afafeaf', '123456789999991111111111111111q11111111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 17:07:55', '2025-04-19 17:07:55'),
(45, 'ww', 'aaa12469999991111111111111111111111111111', 'afafeaf', '123456789999991111111111111111q111111111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 17:10:08', '2025-04-19 17:10:08'),
(46, 'ww', 'aaa124699999911111111111111111111111111111', 'afafeaf', '123456789999991111111111111111q1111111111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 17:11:23', '2025-04-19 17:11:23'),
(47, 'ww', 'aaa1246999999111111111111111111111111111111', 'afafeaf', '123456789999991111111111111111q11111111111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 17:11:58', '2025-04-19 17:11:58'),
(48, 'ww', 'aaa12469999991111111111111111111111111111111', 'afafeaf', '123456789999991111111111111111q111111111111111', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-19 17:15:31', '2025-04-19 17:15:31'),
(49, 'Detol', '33441122', '99% of mecrops will be destroied', '1', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-23 06:07:09', '2025-04-23 06:54:26'),
(51, 'Detool', '145325', 'Soap to clean and destroy all viruses', '145325', '123', 'dazina', 12.000, 10, '2', 14000.000, 0, 1, '2025-04-23 11:22:31', '2025-04-23 11:22:31');

-- --------------------------------------------------------

--
-- بنية الجدول `logins`
--

CREATE TABLE `logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_03_08_131908_create_types_table', 1),
(2, '2014_03_29_230939_create_departments_table', 1),
(3, '2014_10_12_000000_create_logins_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_03_27_195655_create_non_active_tokens_table', 1),
(8, '2024_03_27_195722_create_active_tokens_table', 1),
(9, '2024_03_27_200938_create_sessions_table', 1),
(10, '2024_04_06_202037_create_patients_table', 1),
(11, '2024_04_06_211759_create_patient_files_table', 1),
(12, '2024_04_08_203306_create_testqueues_table', 1),
(13, '2024_04_08_203334_create_xrayqueues_table', 1),
(14, '2024_04_15_171233_create_files_archives_table', 1),
(15, '2024_04_16_083546_create_empatients_table', 1),
(16, '2024_04_21_054822_create_em_xray_queues_table', 1),
(17, '2024_04_21_054834_create_em_test_queues_table', 1),
(18, '2024_04_21_055028_create_belong_to_deps_table', 1),
(19, '2024_04_21_055236_create_em_archives_table', 1),
(20, '2024_04_21_061135_create_transfar_operations_table', 1),
(21, '2024_04_29_133737_create_e_m_p_transfar_operations_table', 1),
(22, '2024_04_29_133751_create_e_m_p_belong_tos_table', 1),
(23, '2024_05_14_083822_create_deaths_table', 1),
(24, '2024_05_14_083849_create_borns_table', 1),
(25, '2024_05_14_085106_create_births_table', 1),
(26, '2024_05_14_145402_create_resources_table', 1),
(27, '2024_05_15_115534_create_equipment_store_keepers_table', 1),
(28, '2024_05_15_115637_create_equipment_table', 1),
(29, '2024_05_23_072116_create_dates_table', 1),
(30, '2024_06_19_071531_create_surgeries_table', 1),
(31, '2025_04_01_190416_create_categories_table', 1),
(32, '2025_04_01_190922_create_sub_categories_table', 1),
(33, '2025_04_01_191245_create_suppliers_table', 1),
(34, '2025_04_01_191833_create_items_table', 1),
(35, '2025_04_01_192846_create_cat_items_table', 1),
(36, '2025_04_01_194528_create_tenders_table', 1),
(37, '2025_04_01_200005_create_tender_items_table', 1),
(38, '2025_04_01_200925_create_bids_table', 1),
(39, '2025_04_01_201751_create_bid_items_table', 1),
(40, '2025_04_01_202141_create_contracts_table', 1),
(41, '2025_04_01_202852_create_inventory_logs_table', 1),
(42, '2025_04_01_202928_create_receipts_table', 1),
(43, '2025_04_01_203000_create_receipt_items_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `non_active_tokens`
--

CREATE TABLE `non_active_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `mom_name` varchar(255) NOT NULL,
  `chain` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `chronic_diseases` varchar(255) NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `case_description` varchar(255) NOT NULL,
  `treatment_required` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `patient_files`
--

CREATE TABLE `patient_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_result` varchar(255) NOT NULL,
  `X_ray_result` varchar(255) NOT NULL,
  `resident` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
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
-- بنية الجدول `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `receipt_number` varchar(255) NOT NULL COMMENT 'رقم الإيصال',
  `receipt_date` date NOT NULL COMMENT 'تاريخ الاستلام',
  `notes` text DEFAULT NULL COMMENT 'ملاحظات',
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'مرفقات' CHECK (json_valid(`attachments`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `receipt_items`
--

CREATE TABLE `receipt_items` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'المعرف الفريد لبند الاستلام',
  `receipt_id` bigint(20) UNSIGNED NOT NULL,
  `tender_item_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity_ordered` int(11) NOT NULL COMMENT 'الكمية المطلوبة',
  `quantity_received` int(11) NOT NULL COMMENT 'الكمية المستلمة',
  `production_date` date DEFAULT NULL COMMENT 'تاريخ الإنتاج',
  `expiry_date` date DEFAULT NULL COMMENT 'تاريخ الانتهاء',
  `storage_location` varchar(255) DEFAULT NULL COMMENT 'مكان التخزين',
  `unit_price` decimal(12,3) NOT NULL COMMENT 'سعر الوحدة',
  `total_price` decimal(15,3) NOT NULL COMMENT 'القيمة الإجمالية',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `availability_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `MACadress` varchar(255) NOT NULL,
  `sessionKey` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `MACadress`, `sessionKey`, `created_at`, `updated_at`) VALUES
(1, '00:00:00:00:00:00', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(2, '22:22:22:22:22:22', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(3, '33:33:33:33:33:33', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(4, '44:44:44:44:44:44', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(5, '55:55:55:55:55:55', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(6, '66:66:66:66:66:66', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(7, '77:77:77:77:77:77', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(8, '88:88:88:88:88:88', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(9, '99:99:99:99:99:99', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(10, '10:10:10:10:10:10', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42'),
(11, '11:11:11:11:11:11', '', '2025-04-15 01:29:42', '2025-04-15 01:29:42');

-- --------------------------------------------------------

--
-- بنية الجدول `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cl', '2025-04-19 15:21:13', '2025-04-23 06:16:58'),
(2, 'Soap', '2025-04-23 11:20:30', '2025-04-23 11:20:30');

-- --------------------------------------------------------

--
-- بنية الجدول `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `commerical_number` varchar(255) NOT NULL,
  `type` enum('local','international','government') NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `notes` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `commerical_number`, `type`, `address`, `email`, `is_approved`, `notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ffdd', '12345', 'government', 'wwweee', 'aa@gmail.com', 1, 'aefqefeafafaefeaf', NULL, '2025-04-19 15:32:08', '2025-04-19 15:32:08'),
(2, 'ffdd', '12345', 'government', 'wwweee', 'aa@gmail.com', 1, 'aefqefeafafaefeaf', NULL, '2025-04-19 15:32:39', '2025-04-19 15:32:39');

-- --------------------------------------------------------

--
-- بنية الجدول `surgeries`
--

CREATE TABLE `surgeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `tenders`
--

CREATE TABLE `tenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `tender_number` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `release_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `budget` decimal(15,2) NOT NULL,
  `status` enum('draft','published','under_evaluation','awarded','canceled') NOT NULL DEFAULT 'draft',
  `barcode` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `tender_items`
--

CREATE TABLE `tender_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tender_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `specifications` text DEFAULT NULL,
  `unit_price` decimal(12,3) DEFAULT NULL,
  `total_price` decimal(15,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `testqueues`
--

CREATE TABLE `testqueues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `transfar_operations`
--

CREATE TABLE `transfar_operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `from_dep_id` bigint(20) UNSIGNED NOT NULL,
  `to_dep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ITAdmin', '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(2, 'Emergency Department', '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(3, 'WareHouse Department', '2025-04-15 01:29:41', '2025-04-15 01:29:41'),
(4, 'Normal Department', '2025-04-15 01:29:41', '2025-04-15 01:29:41');

-- --------------------------------------------------------

--
-- بنية الجدول `xrayqueues`
--

CREATE TABLE `xrayqueues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_tokens`
--
ALTER TABLE `active_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_tokens_department_id_foreign` (`department_id`);

--
-- Indexes for table `belong_to_deps`
--
ALTER TABLE `belong_to_deps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `belong_to_deps_patient_id_foreign` (`patient_id`),
  ADD KEY `belong_to_deps_dep_id_foreign` (`dep_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bids_bid_number_unique` (`bid_number`);

--
-- Indexes for table `bid_items`
--
ALTER TABLE `bid_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_items_bid_id_foreign` (`bid_id`),
  ADD KEY `bid_items_tender_item_id_foreign` (`tender_item_id`);

--
-- Indexes for table `births`
--
ALTER TABLE `births`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borns`
--
ALTER TABLE `borns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_items`
--
ALTER TABLE `cat_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_items_category_id_foreign` (`category_id`),
  ADD KEY `cat_items_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `cat_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_tender_id_foreign` (`tender_id`),
  ADD KEY `contracts_bid_id_foreign` (`bid_id`),
  ADD KEY `contracts_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deaths`
--
ALTER TABLE `deaths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_type_id_foreign` (`type_id`);

--
-- Indexes for table `empatients`
--
ALTER TABLE `empatients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empatients_chain_unique` (`chain`);

--
-- Indexes for table `em_archives`
--
ALTER TABLE `em_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_test_queues`
--
ALTER TABLE `em_test_queues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `em_test_queues_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `em_xray_queues`
--
ALTER TABLE `em_xray_queues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `em_xray_queues_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_store_keepers`
--
ALTER TABLE `equipment_store_keepers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_m_p_belong_tos`
--
ALTER TABLE `e_m_p_belong_tos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_m_p_belong_tos_patient_id_foreign` (`patient_id`),
  ADD KEY `e_m_p_belong_tos_dep_id_foreign` (`dep_id`);

--
-- Indexes for table `e_m_p_transfar_operations`
--
ALTER TABLE `e_m_p_transfar_operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_m_p_transfar_operations_patient_id_foreign` (`patient_id`),
  ADD KEY `e_m_p_transfar_operations_from_dep_id_foreign` (`from_dep_id`),
  ADD KEY `e_m_p_transfar_operations_to_dep_id_foreign` (`to_dep_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filesarchives`
--
ALTER TABLE `filesarchives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filesarchives_department_id_foreign` (`department_id`);

--
-- Indexes for table `inventory_logs`
--
ALTER TABLE `inventory_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_logs_item_id_foreign` (`item_id`),
  ADD KEY `inventory_logs_department_id_foreign` (`department_id`),
  ADD KEY `inventory_logs_reference_type_reference_id_index` (`reference_type`,`reference_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_code_unique` (`code`),
  ADD UNIQUE KEY `items_barcode_unique` (`barcode`),
  ADD KEY `items_supplier_id_foreign` (`supplier_id`),
  ADD KEY `is_expirable` (`min_quantity`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logins_department_id_foreign` (`department_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_active_tokens`
--
ALTER TABLE `non_active_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `non_active_tokens_department_id_foreign` (`department_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_chain_unique` (`chain`);

--
-- Indexes for table `patient_files`
--
ALTER TABLE `patient_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_files_department_id_foreign` (`department_id`),
  ADD KEY `patient_files_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receipts_receipt_number_unique` (`receipt_number`),
  ADD KEY `receipts_contract_id_foreign` (`contract_id`);

--
-- Indexes for table `receipt_items`
--
ALTER TABLE `receipt_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_items_receipt_id_foreign` (`receipt_id`),
  ADD KEY `receipt_items_tender_item_id_foreign` (`tender_item_id`),
  ADD KEY `receipt_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surgeries_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenders_category_id_foreign` (`category_id`);

--
-- Indexes for table `tender_items`
--
ALTER TABLE `tender_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tender_items_tender_id_foreign` (`tender_id`),
  ADD KEY `tender_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `testqueues`
--
ALTER TABLE `testqueues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testqueues_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `transfar_operations`
--
ALTER TABLE `transfar_operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfar_operations_patient_id_foreign` (`patient_id`),
  ADD KEY `transfar_operations_from_dep_id_foreign` (`from_dep_id`),
  ADD KEY `transfar_operations_to_dep_id_foreign` (`to_dep_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xrayqueues`
--
ALTER TABLE `xrayqueues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `xrayqueues_patient_id_foreign` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_tokens`
--
ALTER TABLE `active_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `belong_to_deps`
--
ALTER TABLE `belong_to_deps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bid_items`
--
ALTER TABLE `bid_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `births`
--
ALTER TABLE `births`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borns`
--
ALTER TABLE `borns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cat_items`
--
ALTER TABLE `cat_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deaths`
--
ALTER TABLE `deaths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `empatients`
--
ALTER TABLE `empatients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `em_archives`
--
ALTER TABLE `em_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `em_test_queues`
--
ALTER TABLE `em_test_queues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `em_xray_queues`
--
ALTER TABLE `em_xray_queues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment_store_keepers`
--
ALTER TABLE `equipment_store_keepers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_m_p_belong_tos`
--
ALTER TABLE `e_m_p_belong_tos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `e_m_p_transfar_operations`
--
ALTER TABLE `e_m_p_transfar_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filesarchives`
--
ALTER TABLE `filesarchives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_logs`
--
ALTER TABLE `inventory_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'المعرف الفريد للحركة', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `non_active_tokens`
--
ALTER TABLE `non_active_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_files`
--
ALTER TABLE `patient_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_items`
--
ALTER TABLE `receipt_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'المعرف الفريد لبند الاستلام';

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tender_items`
--
ALTER TABLE `tender_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testqueues`
--
ALTER TABLE `testqueues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfar_operations`
--
ALTER TABLE `transfar_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `xrayqueues`
--
ALTER TABLE `xrayqueues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `active_tokens`
--
ALTER TABLE `active_tokens`
  ADD CONSTRAINT `active_tokens_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `belong_to_deps`
--
ALTER TABLE `belong_to_deps`
  ADD CONSTRAINT `belong_to_deps_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `belong_to_deps_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `bid_items`
--
ALTER TABLE `bid_items`
  ADD CONSTRAINT `bid_items_bid_id_foreign` FOREIGN KEY (`bid_id`) REFERENCES `bids` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bid_items_tender_item_id_foreign` FOREIGN KEY (`tender_item_id`) REFERENCES `tender_items` (`id`);

--
-- قيود الجداول `cat_items`
--
ALTER TABLE `cat_items`
  ADD CONSTRAINT `cat_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cat_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cat_items_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_bid_id_foreign` FOREIGN KEY (`bid_id`) REFERENCES `bids` (`id`),
  ADD CONSTRAINT `contracts_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `contracts_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `tenders` (`id`);

--
-- قيود الجداول `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `em_test_queues`
--
ALTER TABLE `em_test_queues`
  ADD CONSTRAINT `em_test_queues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `empatients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `em_xray_queues`
--
ALTER TABLE `em_xray_queues`
  ADD CONSTRAINT `em_xray_queues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `e_m_p_belong_tos`
--
ALTER TABLE `e_m_p_belong_tos`
  ADD CONSTRAINT `e_m_p_belong_tos_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_m_p_belong_tos_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `empatients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `e_m_p_transfar_operations`
--
ALTER TABLE `e_m_p_transfar_operations`
  ADD CONSTRAINT `e_m_p_transfar_operations_from_dep_id_foreign` FOREIGN KEY (`from_dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_m_p_transfar_operations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `empatients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_m_p_transfar_operations_to_dep_id_foreign` FOREIGN KEY (`to_dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `filesarchives`
--
ALTER TABLE `filesarchives`
  ADD CONSTRAINT `filesarchives_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `inventory_logs`
--
ALTER TABLE `inventory_logs`
  ADD CONSTRAINT `inventory_logs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `inventory_logs_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `non_active_tokens`
--
ALTER TABLE `non_active_tokens`
  ADD CONSTRAINT `non_active_tokens_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `patient_files`
--
ALTER TABLE `patient_files`
  ADD CONSTRAINT `patient_files_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_files_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`);

--
-- قيود الجداول `receipt_items`
--
ALTER TABLE `receipt_items`
  ADD CONSTRAINT `receipt_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `receipt_items_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `receipt_items_tender_item_id_foreign` FOREIGN KEY (`tender_item_id`) REFERENCES `tender_items` (`id`);

--
-- قيود الجداول `surgeries`
--
ALTER TABLE `surgeries`
  ADD CONSTRAINT `surgeries_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `tenders`
--
ALTER TABLE `tenders`
  ADD CONSTRAINT `tenders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- قيود الجداول `tender_items`
--
ALTER TABLE `tender_items`
  ADD CONSTRAINT `tender_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `tender_items_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `tenders` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `testqueues`
--
ALTER TABLE `testqueues`
  ADD CONSTRAINT `testqueues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `transfar_operations`
--
ALTER TABLE `transfar_operations`
  ADD CONSTRAINT `transfar_operations_from_dep_id_foreign` FOREIGN KEY (`from_dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfar_operations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfar_operations_to_dep_id_foreign` FOREIGN KEY (`to_dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `xrayqueues`
--
ALTER TABLE `xrayqueues`
  ADD CONSTRAINT `xrayqueues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
