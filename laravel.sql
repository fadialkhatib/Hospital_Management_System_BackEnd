-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 10:36 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abcense_scheduales`
--

CREATE TABLE `abcense_scheduales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date_id` bigint(20) UNSIGNED NOT NULL,
  `vacation` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abcense_scheduales`
--

INSERT INTO `abcense_scheduales` (`id`, `employee_id`, `date_id`, `vacation`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, '2024-05-28 19:06:20', '2024-05-28 19:06:20'),
(2, 3, 3, 0, '2024-05-28 19:06:33', '2024-05-28 19:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `active_tokens`
--

CREATE TABLE `active_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_tokens`
--

INSERT INTO `active_tokens` (`id`, `department_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 1, 'eyJpZCI6MSwibmFtZSI6IklUQWRtaW4iLCJjcmVhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjQtMDUtMjhUMTk6NDg6MjAuMDAwMDAwWiJ9', '2024-05-28 18:00:36', '2024-05-28 18:00:36'),
(2, 2, 'eyJpZCI6MiwibmFtZSI6IkFtYnVsYW5jZSIsImNyZWF0ZWRfYXQiOiIyMDI0LTA1LTI4VDE5OjQ4OjIwLjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIn0=', '2024-05-28 18:01:04', '2024-05-28 18:01:04'),
(3, 3, 'eyJpZCI6MywibmFtZSI6IkRlcGFydG1lbnRSZWNlcHRpb24iLCJjcmVhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjQtMDUtMjhUMTk6NDg6MjAuMDAwMDAwWiJ9', '2024-05-28 18:01:12', '2024-05-28 18:01:12'),
(4, 4, 'eyJpZCI6NCwibmFtZSI6IkVtZXJnZW5jeVJhZGlvR3JhcGhlciIsImNyZWF0ZWRfYXQiOiIyMDI0LTA1LTI4VDE5OjQ4OjIwLjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIn0=', '2024-05-28 18:01:16', '2024-05-28 18:01:16'),
(5, 5, 'eyJpZCI6NSwibmFtZSI6IlJhZGlvR3JhcGhlciIsImNyZWF0ZWRfYXQiOiIyMDI0LTA1LTI4VDE5OjQ4OjIwLjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIn0=', '2024-05-28 18:01:21', '2024-05-28 18:01:21'),
(6, 6, 'eyJpZCI6NiwibmFtZSI6IkVtZXJnZW5jeVRlc3RMYWIiLCJjcmVhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjQtMDUtMjhUMTk6NDg6MjAuMDAwMDAwWiJ9', '2024-05-28 18:01:25', '2024-05-28 18:01:25'),
(7, 7, 'eyJpZCI6NywibmFtZSI6IlRlc3RMYWIiLCJjcmVhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjQtMDUtMjhUMTk6NDg6MjAuMDAwMDAwWiJ9', '2024-05-28 18:01:29', '2024-05-28 18:01:29'),
(8, 8, 'eyJpZCI6OCwibmFtZSI6IkFkbWlzc2lvbk1vbml0b3IiLCJjcmVhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjQtMDUtMjhUMTk6NDg6MjAuMDAwMDAwWiJ9', '2024-05-28 18:01:33', '2024-05-28 18:01:33'),
(9, 9, 'eyJpZCI6OSwibmFtZSI6Ik1lZGljaW5lU3RvcmVLZWVwZXIiLCJjcmVhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjQtMDUtMjhUMTk6NDg6MjAuMDAwMDAwWiJ9', '2024-05-28 18:01:37', '2024-05-28 18:01:37'),
(10, 10, 'eyJpZCI6MTAsIm5hbWUiOiJFcXVpcG1lbnRTdG9yZUtlZXBlciIsImNyZWF0ZWRfYXQiOiIyMDI0LTA1LTI4VDE5OjQ4OjIwLjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMC4wMDAwMDBaIn0=', '2024-05-28 18:01:42', '2024-05-28 18:01:42'),
(11, 11, 'eyJpZCI6MTEsIm5hbWUiOiJIUiIsImNyZWF0ZWRfYXQiOiIyMDI0LTA1LTI4VDE5OjQ4OjIxLjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNC0wNS0yOFQxOTo0ODoyMS4wMDAwMDBaIn0=', '2024-05-28 18:01:46', '2024-05-28 18:01:46'),
(12, 12, 'eyJpZCI6MTIsIm5hbWUiOiJFeWVzIERlcGFydG1lbnQiLCJjcmVhdGVkX2F0IjoiMjAyNC0wNi0yNVQwNzo1NzozMy4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjQtMDYtMjVUMDc6NTc6MzMuMDAwMDAwWiJ9', '2024-06-25 04:59:38', '2024-06-25 04:59:38'),
(13, 13, 'eyJpZCI6MTMsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjI3XHUwNjQ0XHUwNjIzXHUwNjM3XHUwNjQxXHUwNjI3XHUwNjQ0IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMjVUMDc6NTg6MTYuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTI1VDA3OjU4OjE2LjAwMDAwMFoifQ==', '2024-06-25 04:59:49', '2024-06-25 04:59:49'),
(14, 14, 'eyJpZCI6MTQsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjI3XHUwNjQ0XHUwNjQ3XHUwNjM2XHUwNjQ1XHUwNjRhXHUwNjI5IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMjVUMDc6NTg6MzMuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTI1VDA3OjU4OjMzLjAwMDAwMFoifQ==', '2024-06-25 04:59:59', '2024-06-25 04:59:59'),
(15, 15, 'eyJpZCI6MTUsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjI3XHUwNjQ0XHUwNjQyXHUwNjQ0XHUwNjI4XHUwNjRhXHUwNjI5IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMjVUMDc6NTg6NTcuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTI1VDA3OjU4OjU3LjAwMDAwMFoifQ==', '2024-06-25 05:00:11', '2024-06-25 05:00:11'),
(16, 16, 'eyJpZCI6MTYsIm5hbWUiOiJzdXJnZXJ5IGRlcGFydG1lbnQgKFx1MDY0Mlx1MDYzM1x1MDY0NSBcdTA2MjdcdTA2NDRcdTA2MzlcdTA2NDVcdTA2NDRcdTA2NGFcdTA2MjdcdTA2MmEpIiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMjZUMjA6NDU6MTEuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTI2VDIwOjQ1OjExLjAwMDAwMFoifQ==', '2024-06-26 17:45:31', '2024-06-26 17:45:31'),
(17, 17, 'eyJpZCI6MTcsIm5hbWUiOiJFbWVyZ2VuY3kgU3VyZ2VyeSBEZXBhcnRtZW50IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMjlUMTQ6MDA6MDQuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTI5VDE0OjAwOjA0LjAwMDAwMFoifQ==', '2024-06-29 11:00:18', '2024-06-29 11:00:18'),
(18, 18, 'eyJpZCI6MTgsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjI3XHUwNjQ0XHUwNjM5XHUwNjM4XHUwNjQ1XHUwNjRhXHUwNjI5IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMjlUMTc6MDM6NTguMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTI5VDE3OjAzOjU4LjAwMDAwMFoifQ==', '2024-06-30 17:28:27', '2024-06-30 17:28:27'),
(19, 19, 'eyJpZCI6MTksIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjI3XHUwNjQ0XHUwNjM5XHUwNjQ2XHUwNjI3XHUwNjRhXHUwNjI5IFx1MDYyN1x1MDY0NFx1MDY0NVx1MDYzNFx1MDYyZlx1MDYyZlx1MDYyOSIsImNyZWF0ZWRfYXQiOiIyMDI0LTA2LTMwVDIwOjI1OjI4LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNC0wNi0zMFQyMDoyNToyOC4wMDAwMDBaIn0=', '2024-06-30 17:28:34', '2024-06-30 17:28:34'),
(20, 20, 'eyJpZCI6MjAsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjI3XHUwNjQ0XHUwNjM1XHUwNjJmXHUwNjMxXHUwNjRhXHUwNjI5IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMzBUMjA6MjU6NTQuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTMwVDIwOjI1OjU0LjAwMDAwMFoifQ==', '2024-06-30 17:28:39', '2024-06-30 17:28:39'),
(21, 21, 'eyJpZCI6MjEsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjI3XHUwNjQ0XHUwNjIzXHUwNjMwXHUwNjQ2XHUwNjRhXHUwNjI5IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMzBUMjA6MjY6MDcuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTMwVDIwOjI2OjA3LjAwMDAwMFoifQ==', '2024-06-30 17:28:46', '2024-06-30 17:28:46'),
(22, 22, 'eyJpZCI6MjIsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjIzXHUwNjQ1XHUwNjMxXHUwNjI3XHUwNjM2IFx1MDYyN1x1MDY0NFx1MDYyZlx1MDY0NSIsImNyZWF0ZWRfYXQiOiIyMDI0LTA2LTMwVDIwOjI2OjI1LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyNC0wNi0zMFQyMDoyNjoyNS4wMDAwMDBaIn0=', '2024-06-30 17:28:51', '2024-06-30 17:28:51'),
(23, 23, 'eyJpZCI6MjMsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjIzXHUwNjQ0XHUwNjJhXHUwNjQ4XHUwNjQ0XHUwNjRhXHUwNjJmIiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMzBUMjA6MjY6MzYuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTMwVDIwOjI2OjM2LjAwMDAwMFoifQ==', '2024-06-30 17:28:57', '2024-06-30 17:28:57'),
(24, 24, 'eyJpZCI6MjQsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjIzXHUwNjQ0XHUwNjM5XHUwNjM1XHUwNjI4XHUwNjRhXHUwNjI5IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMzBUMjA6MjY6NDYuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTMwVDIwOjI2OjQ2LjAwMDAwMFoifQ==', '2024-06-30 17:29:02', '2024-06-30 17:29:02'),
(25, 25, 'eyJpZCI6MjUsIm5hbWUiOiJcdTA2NDJcdTA2MzNcdTA2NDUgXHUwNjIzXHUwNjQ0XHUwNjJmXHUwNjI3XHUwNjJlXHUwNjQ0XHUwNjRhXHUwNjI5IiwiY3JlYXRlZF9hdCI6IjIwMjQtMDYtMzBUMjA6MjY6NTcuMDAwMDAwWiIsInVwZGF0ZWRfYXQiOiIyMDI0LTA2LTMwVDIwOjI2OjU3LjAwMDAwMFoifQ==', '2024-06-30 17:29:10', '2024-06-30 17:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `belong_to_deps`
--

CREATE TABLE `belong_to_deps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `belong_to_deps`
--

INSERT INTO `belong_to_deps` (`id`, `patient_id`, `dep_id`, `created_at`, `updated_at`) VALUES
(19, 20, 15, '2024-07-01 05:32:35', '2024-07-01 05:32:35'),
(20, 21, 15, '2024-07-01 05:35:25', '2024-07-01 05:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `births`
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
-- Table structure for table `borns`
--

CREATE TABLE `borns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`id`, `date`, `created_at`, `updated_at`) VALUES
(1, '2024-05-28 22:06:05', '2024-05-28 19:06:05', '2024-05-28 19:06:05'),
(2, '2024-05-28 22:06:20', '2024-05-28 19:06:20', '2024-05-28 19:06:20'),
(3, '2024-05-28 22:06:33', '2024-05-28 19:06:33', '2024-05-28 19:06:33'),
(4, '2022-10-01 00:00:00', '2024-05-28 19:14:41', '2024-05-28 19:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `deaths`
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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'مسؤول قسم المعلوماتية', '$2y$10$EDHJXGskmUuSbetck8GAhuCC9wOg9zAOOhii3gtr1SeePSWH/vTVG', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(2, 'قسم الاسعاف', '$2y$10$s8sEnz5ewd0dRishlTagaOnMfAvbIqKO3Mc6.weO5uiEbx91DycVy', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(3, 'الاستقبال بالقسم', '$2y$10$4V2GrTfm2nzlJvTDllsHp.UaJmHS2ovyRc493V6tG1xBMKXBNieG6', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(4, 'قسم الصور الشعاعية الاسعافية', '$2y$10$QtPW8iGA0mApxdRNhXODTuBrHCtBDzmDqfZNG5wsnbBnKaRO4IvAy', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(5, 'قسم الصور الشعاعية ', '$2y$10$HURjARIuSBTV.OC97RW/buV3.Wlr9oXWjq.LhdZFfofFH31DbOXke', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(6, 'قسم التحاليل الطبية الاسعافية', '$2y$10$5UK3ajGzFoP0fdM3/nqJV.JP2HlxJ2CG.wK7I.fjHvTs8QhAVbKlm', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(7, 'قسم التحاليل الطبية', '$2y$10$3U/Xgtf4Ft29T4mUx6wqiuTPVBEPpDRSQ2Z1gK3TRyB1wNwzYRG3W', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(8, 'قسم مراقب القبول', '$2y$10$Ec0ZCgi8WKfxdbt7Uuub3.3EdNo0c8RivDKf/Z32oL3rCr8fhepg.', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(9, 'المستودع الأدوية', '$2y$10$9JbXO5QdV4SFux10j1K7q.PcXtXxkQIr6aX4LeewQPk5bPSQ1kUoy', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(10, 'مستودع الأدوات الطبية', '$2y$10$NNWh5MAQrjxUinVLj8gIzeQ4EK4gT0FuI2A2lii.lpHSIKJGigCCO', '2024-05-28 16:48:20', '2024-05-28 16:48:20'),
(11, 'قسم الموارد البشرية', '$2y$10$UuR.YqTdqEyKs/j62PAjkuH/1m3mnMa/p8SutSHJXuni1nA..P0LS', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(12, 'قسم العينية', '$2y$10$ziQtTJFxqpyBUvzau9sigeZB0jg3Q.3kSKrvsocJYHJF.E9.qmNgW', '2024-06-25 04:57:33', '2024-06-25 04:57:33'),
(13, 'قسم الأطفال', '$2y$10$aXc475OxuHabm.dbwKTyau6QCngTipUK7jE4pgaiZPJs0q8oKN4zO', '2024-06-25 04:58:16', '2024-06-25 04:58:16'),
(14, 'قسم الهضمية', '$2y$10$gShVdp0HvOeVEkDnTd0NQ.xX5BiFnL5H9Lsodmc4daekCXvpb.AB6', '2024-06-25 04:58:33', '2024-06-25 04:58:33'),
(15, 'قسم القلبية', '$2y$10$Ta6rbTZHcc8qkfsSAkugg.3F5cEF4mFpv0qBA6uj/YzGsS/dF9m3a', '2024-06-25 04:58:57', '2024-06-25 04:58:57'),
(16, 'قسم الجراحة', '$2y$10$2Lhp.dE5.SQ2cZerzp.LWOFbj2KCQ6SzuREiW5IFJLo4P59KSZW7O', '2024-06-26 17:45:11', '2024-06-26 17:45:11'),
(17, 'قسم الجراحة الاسعافية', '$2y$10$wIPeeHZjuqTKPrAAP3X4muQtYlUtyXdwQ9nMlZCcZkhHtHCiFnUfq', '2024-06-29 11:00:04', '2024-06-29 11:00:04'),
(18, 'قسم العظمية', '$2y$10$J5oJ9fYBGiMtU.xXkmV3deY9EizpUzMuh0SbtwN2/y6R6GfaYqpty', '2024-06-29 14:03:58', '2024-06-29 14:03:58'),
(19, 'قسم العناية المشددة', '$2y$10$4mgl5PrUlCizkxGIEBuVu..HnLlbIv1zSeN4OL2YD8V7vS42gdfYS', '2024-06-30 17:25:28', '2024-06-30 17:25:28'),
(20, 'قسم الصدرية', '$2y$10$UpgUjQvv1TQUpJoFdIbr9.OJl1udb953a6qj6hzkk8csENc5idNqO', '2024-06-30 17:25:54', '2024-06-30 17:25:54'),
(21, 'قسم الأذنية', '$2y$10$bmexxY5Tb6q0LcxnUm6CF.kneVz/AwshwgEqq/.JPFZGPWatYvymm', '2024-06-30 17:26:07', '2024-06-30 17:26:07'),
(22, 'قسم أمراض الدم', '$2y$10$srf7KCOhITT69vwUhTkLlOb52IkUhdb6sKLWTq0xdb57Wvqtzpx.e', '2024-06-30 17:26:25', '2024-06-30 17:26:25'),
(23, 'قسم ألتوليد', '$2y$10$5g3vwfshx53fmx8SxRD2N.X0ByP.fzUdpuY16UyTMdUkzVGDJbt8W', '2024-06-30 17:26:36', '2024-06-30 17:26:36'),
(24, 'قسم ألعصبية', '$2y$10$FOacUIFYXgYT4AX0E2yxmeQjK577bFnr62lgILcVoGFF.ZoUeWFXG', '2024-06-30 17:26:46', '2024-06-30 17:26:46'),
(25, 'قسم ألداخلية', '$2y$10$2egD4LaOwiZurxP9glpR3OnopgFVFf2xAKrpRPmOl5k90gau0RXgq', '2024-06-30 17:26:57', '2024-06-30 17:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `empatients`
--

CREATE TABLE `empatients` (
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

--
-- Dumping data for table `empatients`
--

INSERT INTO `empatients` (`id`, `full_name`, `address`, `date_of_birth`, `mom_name`, `chain`, `gender`, `case_description`, `treatment_required`, `created_at`, `updated_at`) VALUES
(11, 'raghad alali', 'sweda', '2001-02-01 00:00:00', 'mom', 56, 'female', 'ألم في المعدة', 'قسم الهضمية', '2024-06-25 05:01:37', '2024-06-25 05:01:37'),
(14, 'حسن قاضي', 'sweda', '2020-02-01 00:00:00', 'mom', 56, 'male', 'اطفال', 'قسم الأطفال', '2024-06-25 07:09:12', '2024-06-25 07:09:12'),
(16, 'غازي حبيب', 'sweda', '2020-02-01 00:00:00', 'mom', 56, 'male', 'تحاليل', 'قسم التحاليل', '2024-06-26 17:35:15', '2024-06-26 17:35:15'),
(17, 'فادي الحلبي', 'sweda', '2020-02-01 00:00:00', 'mom', 56, 'male', 'تحاليل', 'قسم التحاليل', '2024-06-26 17:46:17', '2024-06-26 17:46:17'),
(18, 'رائد رستم', 'sweda', '2020-02-01 00:00:00', 'mom', 56, 'male', 'تحاليل', 'قسم التحاليل', '2024-06-26 17:47:03', '2024-06-26 17:47:03'),
(19, 'عبيدة حبيب', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'تحاليل', 'قسم التحاليل', '2024-06-26 17:47:41', '2024-06-26 17:47:41'),
(25, 'غسان شروف', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'عملية', 'فسم العمليات', '2024-07-01 05:14:55', '2024-07-01 05:14:55'),
(26, 'أحسان نصر', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'عملية', 'فسم العمليات', '2024-07-01 05:17:05', '2024-07-01 05:17:05'),
(27, 'هايل مزهر', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'عملية', 'فسم العمليات', '2024-07-01 05:17:32', '2024-07-01 05:17:32'),
(28, 'حسن علي', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'عملية', 'فسم العمليات', '2024-07-01 05:18:26', '2024-07-01 05:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'fadi', 1, '2024-05-28 19:03:45', '2024-05-28 19:03:45'),
(2, 'ayham', 2, '2024-05-28 19:03:57', '2024-05-28 19:03:57'),
(3, 'sarah', 3, '2024-05-28 19:04:11', '2024-05-28 19:04:11'),
(4, 'taymaa', 4, '2024-05-28 19:04:26', '2024-05-28 19:04:26'),
(5, 'ruba', 5, '2024-05-28 19:04:35', '2024-05-28 19:04:35'),
(6, 'nagham', 7, '2024-05-28 19:04:45', '2024-05-28 19:04:45'),
(7, 'obaeda', 8, '2024-05-28 19:04:56', '2024-05-28 19:04:56'),
(8, 'rami', 9, '2024-05-28 19:05:04', '2024-05-28 19:05:04'),
(9, 'ameer', 10, '2024-05-28 19:05:18', '2024-05-28 19:05:18'),
(10, 'fesal', 11, '2024-05-28 19:05:25', '2024-05-28 19:05:25'),
(11, 'ziad abo hala', 5, '2024-06-25 03:58:12', '2024-06-25 03:58:12'),
(12, 'bassam alkadamani', 2, '2024-06-25 03:58:30', '2024-06-25 03:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `em_archives`
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

--
-- Dumping data for table `em_archives`
--

INSERT INTO `em_archives` (`id`, `full_name`, `address`, `date_of_birth`, `mom_name`, `chain`, `gender`, `case_description`, `treatment_required`, `created_at`, `updated_at`) VALUES
(1, 'fadi', 'sweda', '2001-07-04 00:00:00', 'mom', 56, 'male', 'emegency', 'emergency treatment', '2024-05-28 18:23:36', '2024-05-28 18:23:36'),
(2, 'ayham', 'sweda', '2001-02-01 00:00:00', 'mom', 56, 'male', 'emegency', 'emergency treatment', '2024-05-28 18:24:11', '2024-05-28 18:24:11'),
(3, 'عبيدة حبيب', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'عملية', 'فسم العمليات', '2024-07-01 05:13:55', '2024-07-01 05:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `em_surgeries`
--

CREATE TABLE `em_surgeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `em_test_queues`
--

CREATE TABLE `em_test_queues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `em_test_queues`
--

INSERT INTO `em_test_queues` (`id`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 18, NULL, NULL),
(2, 14, NULL, NULL),
(3, 25, '2024-07-01 05:16:43', '2024-07-01 05:16:43'),
(4, 26, '2024-07-01 05:17:11', '2024-07-01 05:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `em_xray_queues`
--

CREATE TABLE `em_xray_queues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
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
-- Table structure for table `equipment_store_keepers`
--

CREATE TABLE `equipment_store_keepers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_m_p_belong_tos`
--

CREATE TABLE `e_m_p_belong_tos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_m_p_belong_tos`
--

INSERT INTO `e_m_p_belong_tos` (`id`, `patient_id`, `dep_id`, `created_at`, `updated_at`) VALUES
(14, 14, 2, '2024-06-25 07:09:12', '2024-06-25 07:09:12'),
(25, 25, 2, '2024-07-01 05:14:55', '2024-07-01 05:14:55'),
(26, 26, 2, '2024-07-01 05:17:05', '2024-07-01 05:17:05'),
(27, 27, 13, '2024-07-01 05:17:32', '2024-07-01 05:18:11'),
(28, 28, 13, '2024-07-01 05:18:26', '2024-07-01 05:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `e_m_p_transfar_operations`
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
-- Dumping data for table `e_m_p_transfar_operations`
--

INSERT INTO `e_m_p_transfar_operations` (`id`, `patient_id`, `from_dep_id`, `to_dep_id`, `created_at`, `updated_at`) VALUES
(6, 11, 2, 14, '2024-06-25 05:02:10', '2024-06-25 05:02:10'),
(10, 16, 2, 7, '2024-06-26 17:36:06', '2024-06-26 17:36:06'),
(11, 17, 2, 15, '2024-06-26 17:46:50', '2024-06-26 17:46:50'),
(12, 18, 2, 15, '2024-06-26 17:47:13', '2024-06-26 17:47:13'),
(13, 19, 2, 15, '2024-06-26 17:47:55', '2024-06-26 17:47:55'),
(18, 27, 2, 13, '2024-07-01 05:18:11', '2024-07-01 05:18:11'),
(19, 28, 2, 13, '2024-07-01 05:18:35', '2024-07-01 05:18:35');

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
-- Table structure for table `files_archives`
--

CREATE TABLE `files_archives` (
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

--
-- Dumping data for table `files_archives`
--

INSERT INTO `files_archives` (`id`, `full_name`, `address`, `date_of_birth`, `mom_name`, `chain`, `gender`, `department_id`, `test_result`, `X_ray_result`, `resident`, `created_at`, `updated_at`) VALUES
(1, 'عبيدة حبيب', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 13, 'test', 'x-ray', 'yes', '2024-07-01 05:12:05', '2024-07-01 05:12:05'),
(2, 'عامر العبد', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 13, 'test', 'x-ray', 'yes', '2024-07-01 05:23:19', '2024-07-01 05:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `h_r_s`
--

CREATE TABLE `h_r_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
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
(1, '2014_03_29_230939_create_departments_table', 1),
(2, '2014_10_12_000000_create_logins_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_27_195655_create_non_active_tokens_table', 1),
(7, '2024_03_27_195722_create_active_tokens_table', 1),
(8, '2024_03_27_200938_create_sessions_table', 1),
(9, '2024_04_06_202037_create_patients_table', 1),
(10, '2024_04_06_211759_create_patient_files_table', 1),
(11, '2024_04_08_203306_create_testqueues_table', 1),
(12, '2024_04_08_203334_create_xrayqueues_table', 1),
(14, '2024_04_16_083546_create_empatients_table', 1),
(15, '2024_04_21_054822_create_em_xray_queues_table', 1),
(16, '2024_04_21_054834_create_em_test_queues_table', 1),
(17, '2024_04_21_055028_create_belong_to_deps_table', 1),
(18, '2024_04_21_055236_create_em_archives_table', 1),
(19, '2024_04_21_061135_create_transfar_operations_table', 1),
(20, '2024_04_29_133737_create_e_m_p_transfar_operations_table', 1),
(21, '2024_04_29_133751_create_e_m_p_belong_tos_table', 1),
(22, '2024_05_14_083822_create_deaths_table', 1),
(23, '2024_05_14_083849_create_borns_table', 1),
(24, '2024_05_14_085106_create_births_table', 1),
(25, '2024_05_14_145402_create_resources_table', 1),
(26, '2024_05_15_115534_create_equipment_store_keepers_table', 1),
(27, '2024_05_15_115637_create_equipment_table', 1),
(28, '2024_05_23_065931_create_h_r_s_table', 1),
(29, '2024_05_23_072055_create_employees_table', 1),
(30, '2024_05_23_072116_create_dates_table', 1),
(31, '2024_05_23_075201_create_work_scheduales_table', 1),
(32, '2024_05_23_075414_create_abcense_scheduales_table', 1),
(33, '2024_06_19_071033_create_em_surgeries_table', 2),
(34, '2024_06_19_071531_create_surgeries_table', 2),
(35, '2024_04_15_171233_create_files_archives_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `non_active_tokens`
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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
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

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `full_name`, `address`, `date_of_birth`, `mom_name`, `chain`, `gender`, `case_description`, `treatment_required`, `created_at`, `updated_at`) VALUES
(20, 'فادي الخطيب', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'عملية', 'فسم العمليات', '2024-07-01 05:32:35', '2024-07-01 05:32:35'),
(21, 'أيهم القضماني', 'sweda', '2000-02-01 00:00:00', 'mom', 56, 'male', 'عملية', 'فسم العمليات', '2024-07-01 05:35:25', '2024-07-01 05:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `patient_files`
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

--
-- Dumping data for table `patient_files`
--

INSERT INTO `patient_files` (`id`, `department_id`, `patient_id`, `test_result`, `X_ray_result`, `resident`, `created_at`, `updated_at`) VALUES
(19, 15, 20, 'test', 'x-ray', 'yes', '2024-07-01 05:32:35', '2024-07-01 05:32:35'),
(20, 15, 21, 'test', 'x-ray', 'yes', '2024-07-01 05:35:25', '2024-07-01 05:35:25');

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
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `availability_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `end_date`, `company`, `quantity`, `availability_status`, `created_at`, `updated_at`) VALUES
(1, 'American corona', '2026', 'akwamed', '20', 0, NULL, NULL),
(2, 'setamol', '2026', 'medeksa', '20', 1, NULL, NULL),
(3, 'panadol', '2026', 'tameko', '20', 1, NULL, NULL),
(4, 'rettan', '2026', 'americano', '0', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `MACadress` varchar(255) NOT NULL,
  `sessionKey` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `MACadress`, `sessionKey`, `created_at`, `updated_at`) VALUES
(1, '00:00:00:00:00:00', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(2, '22:22:22:22:22:22', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(3, '33:33:33:33:33:33', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(4, '44:44:44:44:44:44', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(5, '55:55:55:55:55:55', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(6, '66:66:66:66:66:66', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(7, '77:77:77:77:77:77', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(8, '88:88:88:88:88:88', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(9, '99:99:99:99:99:99', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(10, '10:10:10:10:10:10', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21'),
(11, '11:11:11:11:11:11', '', '2024-05-28 16:48:21', '2024-05-28 16:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testqueues`
--

CREATE TABLE `testqueues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfar_operations`
--

CREATE TABLE `transfar_operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `from_dep_id` bigint(20) UNSIGNED NOT NULL,
  `to_dep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfar_operations`
--

INSERT INTO `transfar_operations` (`id`, `patient_id`, `from_dep_id`, `to_dep_id`, `created_at`, `updated_at`) VALUES
(4, 20, 2, 15, '2024-07-01 05:32:35', '2024-07-01 05:32:35'),
(5, 21, 2, 15, '2024-07-01 05:35:25', '2024-07-01 05:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `work_scheduales`
--

CREATE TABLE `work_scheduales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_scheduales`
--

INSERT INTO `work_scheduales` (`id`, `employee_id`, `date_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-05-28 19:06:05', '2024-05-28 19:06:05'),
(2, 1, 4, '2024-05-28 19:14:41', '2024-05-28 19:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `xrayqueues`
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
-- Indexes for table `abcense_scheduales`
--
ALTER TABLE `abcense_scheduales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abcense_scheduales_employee_id_foreign` (`employee_id`),
  ADD KEY `abcense_scheduales_date_id_foreign` (`date_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empatients`
--
ALTER TABLE `empatients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_department_id_foreign` (`department_id`);

--
-- Indexes for table `em_archives`
--
ALTER TABLE `em_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_surgeries`
--
ALTER TABLE `em_surgeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `em_surgeries_patient_id_foreign` (`patient_id`);

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
-- Indexes for table `files_archives`
--
ALTER TABLE `files_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filesarchives_department_id_foreign` (`department_id`);

--
-- Indexes for table `h_r_s`
--
ALTER TABLE `h_r_s`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surgeries_patient_id_foreign` (`patient_id`);

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
-- Indexes for table `work_scheduales`
--
ALTER TABLE `work_scheduales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_scheduales_employee_id_foreign` (`employee_id`),
  ADD KEY `work_scheduales_date_id_foreign` (`date_id`);

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
-- AUTO_INCREMENT for table `abcense_scheduales`
--
ALTER TABLE `abcense_scheduales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `active_tokens`
--
ALTER TABLE `active_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `belong_to_deps`
--
ALTER TABLE `belong_to_deps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deaths`
--
ALTER TABLE `deaths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `empatients`
--
ALTER TABLE `empatients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `em_archives`
--
ALTER TABLE `em_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `em_surgeries`
--
ALTER TABLE `em_surgeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `em_test_queues`
--
ALTER TABLE `em_test_queues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `em_xray_queues`
--
ALTER TABLE `em_xray_queues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `e_m_p_transfar_operations`
--
ALTER TABLE `e_m_p_transfar_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files_archives`
--
ALTER TABLE `files_archives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `h_r_s`
--
ALTER TABLE `h_r_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `non_active_tokens`
--
ALTER TABLE `non_active_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patient_files`
--
ALTER TABLE `patient_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testqueues`
--
ALTER TABLE `testqueues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transfar_operations`
--
ALTER TABLE `transfar_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_scheduales`
--
ALTER TABLE `work_scheduales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `xrayqueues`
--
ALTER TABLE `xrayqueues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abcense_scheduales`
--
ALTER TABLE `abcense_scheduales`
  ADD CONSTRAINT `abcense_scheduales_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `dates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abcense_scheduales_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `active_tokens`
--
ALTER TABLE `active_tokens`
  ADD CONSTRAINT `active_tokens_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `belong_to_deps`
--
ALTER TABLE `belong_to_deps`
  ADD CONSTRAINT `belong_to_deps_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `belong_to_deps_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `em_surgeries`
--
ALTER TABLE `em_surgeries`
  ADD CONSTRAINT `em_surgeries_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `empatients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `em_test_queues`
--
ALTER TABLE `em_test_queues`
  ADD CONSTRAINT `em_test_queues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `empatients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `em_xray_queues`
--
ALTER TABLE `em_xray_queues`
  ADD CONSTRAINT `em_xray_queues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `empatients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `e_m_p_belong_tos`
--
ALTER TABLE `e_m_p_belong_tos`
  ADD CONSTRAINT `e_m_p_belong_tos_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_m_p_belong_tos_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `empatients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `e_m_p_transfar_operations`
--
ALTER TABLE `e_m_p_transfar_operations`
  ADD CONSTRAINT `e_m_p_transfar_operations_from_dep_id_foreign` FOREIGN KEY (`from_dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_m_p_transfar_operations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `empatients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_m_p_transfar_operations_to_dep_id_foreign` FOREIGN KEY (`to_dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `files_archives`
--
ALTER TABLE `files_archives`
  ADD CONSTRAINT `filesarchives_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `non_active_tokens`
--
ALTER TABLE `non_active_tokens`
  ADD CONSTRAINT `non_active_tokens_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_files`
--
ALTER TABLE `patient_files`
  ADD CONSTRAINT `patient_files_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_files_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD CONSTRAINT `surgeries_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testqueues`
--
ALTER TABLE `testqueues`
  ADD CONSTRAINT `testqueues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfar_operations`
--
ALTER TABLE `transfar_operations`
  ADD CONSTRAINT `transfar_operations_from_dep_id_foreign` FOREIGN KEY (`from_dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfar_operations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfar_operations_to_dep_id_foreign` FOREIGN KEY (`to_dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_scheduales`
--
ALTER TABLE `work_scheduales`
  ADD CONSTRAINT `work_scheduales_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `dates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_scheduales_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `xrayqueues`
--
ALTER TABLE `xrayqueues`
  ADD CONSTRAINT `xrayqueues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
