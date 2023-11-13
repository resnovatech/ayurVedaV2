-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2023 at 12:27 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhayurveda_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `staff_id` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `staff_id`, `position`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', '123456789', NULL, 'admin', 'public/uploads/1689865029202307208b167af653c2399dd93b952a48740620 (1).jpg', 'superadmin@gmail.com', NULL, '$2y$10$XU0GpiLPB/leEvfJVJmkIuHYDyv81tjlU11ZRh7IAM1uVLM57Xe0a', NULL, '2023-06-02 11:32:04', '2023-07-20 08:57:09'),
(2, 'therapist One', '22222222224', '1', NULL, NULL, 'axft1DtgZt', NULL, '$2y$10$WCVVGHRuFFl6s3h5w7qwWOAP2ubldhODcjr8dLQdXZZApRZiwZnne', NULL, '2023-06-02 11:35:34', '2023-06-02 11:35:34'),
(3, 'therapist Two', '77777777777', '2', NULL, NULL, 'emjru3qtJ7', NULL, '$2y$10$DtPQWdhNlim0MXomI//Fk.gdKq2bEyI50/9Br5wKSBiCwZXRIixPS', NULL, '2023-06-02 11:36:38', '2023-06-02 11:36:38'),
(4, 'staff one', '77777777777', '1', NULL, NULL, '2yyso@hbkw.com', NULL, '$2y$10$rLNfivs/Bc81qgRl1oC2BuUUw9QIFPeguSpbzu5dRJDJIx4p4YFGy', NULL, '2023-06-02 11:37:58', '2023-06-02 11:37:58'),
(5, 'therapy maker', '11111111', NULL, 'therapy maker', NULL, 'therapy_maker@gmail.com', NULL, '$2y$10$KpUmCOES.co/z6h64F492.igPMHfiVL98NBv5TlE7yninvy/7TzLO', NULL, '2023-07-23 04:11:18', '2023-07-23 04:11:18'),
(6, 'x', '01788881451', '3', NULL, NULL, 'x@gmail.com', NULL, '$2y$10$EdF78h9i9Zlr3jt4EcRY9uQFrD5AJjSQoHEuzr.ZAV6FGDlXShPt2', NULL, '2023-08-26 09:33:22', '2023-08-26 09:33:22'),
(7, 'loreta', '11111111111', NULL, 'staff', NULL, 'loreta.amm.dias@gmail.com', NULL, '$2y$10$2w0aJ2WqWlUzGQlQVB7aT.zfeIwkRG0az4mW6GMhhvRg1X6LwAS1S', NULL, '2023-11-02 08:39:11', '2023-11-02 08:39:11'),
(8, 'Rozina', '11111111111', NULL, 'staff', NULL, 'rozinasultana123@gmail.com', NULL, '$2y$10$I5877Fkx68Aw8PVqbx7lyeREf35zggHsfPo9IAI5lZXqCGX267nfu', NULL, '2023-11-02 08:41:01', '2023-11-02 08:41:01'),
(9, 'dr.mahmuda2017', '11111111', NULL, 'doctor', NULL, 'dr.mahmuda2017@gmail.com', NULL, '$2y$10$jaZpGKWRTcpZAwSEBfIPOOX2etdPREqeF1r9Cs0AVLmpuRppdpOSq', NULL, '2023-11-02 08:42:46', '2023-11-02 08:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `agrement_form_ones`
--

CREATE TABLE `agrement_form_ones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `opd_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(2) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `diagnosis` text NOT NULL,
  `physician` varchar(255) NOT NULL,
  `dos` varchar(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `poorv_karma` varchar(255) NOT NULL,
  `snehpanam` varchar(255) NOT NULL,
  `pradhan_karma` varchar(255) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `nadi` varchar(255) NOT NULL,
  `samyak_lakshana_vegaki` varchar(255) NOT NULL,
  `samyak_lakshana_manaki` varchar(255) NOT NULL,
  `samyak_lakshana_laingaki` varchar(255) NOT NULL,
  `laingaki` varchar(255) NOT NULL,
  `type_of_shodhanam` varchar(255) NOT NULL,
  `samsarjana_krama` varchar(255) NOT NULL,
  `diet_on_day_before` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agrement_form_one_sneha_lists`
--

CREATE TABLE `agrement_form_one_sneha_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agrement_form_one_id` bigint(20) UNSIGNED NOT NULL,
  `sneha_name` varchar(255) NOT NULL,
  `day_one` varchar(255) NOT NULL,
  `day_two` varchar(255) NOT NULL,
  `day_three` varchar(255) NOT NULL,
  `day_four` varchar(255) NOT NULL,
  `day_five` varchar(255) NOT NULL,
  `day_six` varchar(255) NOT NULL,
  `day_seven` varchar(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agrement_form_threes`
--

CREATE TABLE `agrement_form_threes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `opd_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(2) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `diagnosis` text NOT NULL,
  `physician` varchar(255) NOT NULL,
  `dos` varchar(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `poorv_karma` varchar(255) NOT NULL,
  `snehpanam` varchar(255) NOT NULL,
  `pradhan_karma` varchar(255) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `virechan_yog` varchar(255) NOT NULL,
  `nadi` varchar(255) NOT NULL,
  `samyak_lakshana_vegaki` varchar(255) NOT NULL,
  `samyak_lakshana_manaki` varchar(255) NOT NULL,
  `samyak_lakshana_laingaki` varchar(255) NOT NULL,
  `laingaki` varchar(255) NOT NULL,
  `type_of_shodhanam` varchar(255) NOT NULL,
  `samsarjana_krama` varchar(255) NOT NULL,
  `diet_on_day_before` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agrement_form_three_sneha_lists`
--

CREATE TABLE `agrement_form_three_sneha_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agrement_form_three_id` bigint(20) UNSIGNED NOT NULL,
  `sneha_name` varchar(255) NOT NULL,
  `day_one` varchar(255) NOT NULL,
  `day_two` varchar(255) NOT NULL,
  `day_three` varchar(255) NOT NULL,
  `day_four` varchar(255) NOT NULL,
  `day_five` varchar(255) NOT NULL,
  `day_six` varchar(255) NOT NULL,
  `day_seven` varchar(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agrement_form_twos`
--

CREATE TABLE `agrement_form_twos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `opd_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diet_charts`
--

CREATE TABLE `diet_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `early_morning` text NOT NULL,
  `brisk_walk` text NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `evening` text NOT NULL,
  `dinner` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `client_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_or_mobile_number` varchar(11) NOT NULL,
  `nid_number` varchar(25) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `years_of_experience` varchar(255) NOT NULL,
  `doctor_certificate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointments`
--

CREATE TABLE `doctor_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_date` varchar(255) NOT NULL,
  `appointment_time` varchar(255) NOT NULL,
  `patient_type` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_consult_dates`
--

CREATE TABLE `doctor_consult_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `face_packs`
--

CREATE TABLE `face_packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `face_pack_appoinments`
--

CREATE TABLE `face_pack_appoinments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `patient_type` varchar(200) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `signavailable` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `face_pack_appoinment_details`
--

CREATE TABLE `face_pack_appoinment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appoinment_id` varchar(255) DEFAULT NULL,
  `history_id` varchar(200) NOT NULL,
  `face_pack_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `fnote` text DEFAULT NULL,
  `doctor_id` varchar(255) DEFAULT NULL,
  `signavailable` varchar(122) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `face_pack_details`
--

CREATE TABLE `face_pack_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_pack_id` varchar(255) NOT NULL,
  `pack_detail_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facial_packs`
--

CREATE TABLE `facial_packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `face_pack_id` varchar(110) DEFAULT NULL,
  `pack_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facial_pack_details`
--

CREATE TABLE `facial_pack_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `face_pack_id` varchar(255) NOT NULL,
  `ingredient_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `health_supplements`
--

CREATE TABLE `health_supplements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_categories`
--

CREATE TABLE `inventory_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_categories`
--

INSERT INTO `inventory_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Thearpy Ingredient', '2023-11-02 11:08:20', '2023-11-02 11:08:20'),
(9, 'Medicine Equipment', '2023-11-02 11:09:07', '2023-11-02 11:09:07'),
(10, 'Other Ingredient', '2023-11-02 11:09:42', '2023-11-02 11:09:42'),
(12, 'Facial Ingredient', '2023-11-03 07:08:30', '2023-11-03 07:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_damages`
--

CREATE TABLE `inventory_damages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_names`
--

CREATE TABLE `inventory_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_names`
--

INSERT INTO `inventory_names` (`id`, `name`, `created_at`, `updated_at`) VALUES
(9, 'BUCKET/BALTI', '2023-11-02 11:54:51', '2023-11-02 11:54:51'),
(10, 'METAL PLATE', '2023-11-02 11:55:01', '2023-11-02 11:55:01'),
(11, 'METAL GLASS', '2023-11-02 11:55:11', '2023-11-02 11:55:11'),
(12, 'GLASS COVER', '2023-11-02 11:55:22', '2023-11-02 11:55:22'),
(13, 'BRASS GLASS', '2023-11-02 11:55:30', '2023-11-02 11:55:30'),
(14, 'MEDIUM BOWL', '2023-11-02 11:55:40', '2023-11-02 11:55:40'),
(15, 'METAL CUP', '2023-11-02 11:55:46', '2023-11-02 11:55:46'),
(16, 'LAMP', '2023-11-02 11:55:55', '2023-11-02 11:55:55'),
(17, 'KINDY', '2023-11-02 11:56:01', '2023-11-02 11:56:01'),
(18, 'SIRODHARA POT', '2023-11-02 11:56:09', '2023-11-02 11:56:09'),
(19, 'PATIL', '2023-11-02 11:56:15', '2023-11-02 11:56:15'),
(20, 'FOOT RITUAL BOWL', '2023-11-02 11:56:24', '2023-11-02 11:56:24'),
(21, 'SMALL BOWL', '2023-11-02 11:56:36', '2023-11-02 11:56:36'),
(22, 'AMLOKI', '2023-11-02 12:24:15', '2023-11-02 12:24:15'),
(23, 'HORETAKI', '2023-11-02 12:24:23', '2023-11-02 12:24:23'),
(24, 'BOHERA', '2023-11-02 12:24:31', '2023-11-02 12:24:31'),
(25, 'BRAMMI', '2023-11-02 12:24:38', '2023-11-02 12:24:38'),
(26, 'JATAMASHI', '2023-11-02 12:24:50', '2023-11-02 12:24:50'),
(27, 'BRIHARAJ', '2023-11-02 12:25:23', '2023-11-02 12:25:23'),
(28, 'BRIHARAJ\r\n', '2023-04-29 08:11:14', '2023-04-29 08:11:14'),
(29, 'TUSLI\r\n', '2023-04-29 08:11:14', '2023-04-29 08:11:14'),
(30, 'MORICH', '2023-04-29 08:11:14', '2023-10-30 14:28:03'),
(31, 'DARUCHINI', '2023-04-29 08:11:14', '2023-04-29 08:11:14'),
(32, 'LONG\r\n', '2023-11-29 17:28:39', '2023-11-30 17:28:39'),
(33, 'DHONIA ', '2023-11-21 17:28:39', '2023-11-22 17:28:39'),
(34, 'JEERA ', '2023-11-29 17:28:39', '2023-11-14 17:28:39'),
(35, 'MOURI', '2023-11-16 17:28:39', '2023-11-23 17:28:39'),
(36, 'AWSHAGANDHA', '2023-11-02 17:28:39', '2023-11-02 17:28:39'),
(37, 'YESTHIMUDHU', '2023-11-22 17:28:39', '2023-11-08 17:28:39'),
(38, 'SUJI', '2023-11-02 17:28:39', '2023-11-02 17:28:39'),
(39, 'SAFFRON', '2023-11-30 17:28:39', '2023-11-02 17:28:39'),
(40, 'ALMOND', '2023-11-14 18:30:26', '2023-11-22 18:30:26'),
(41, 'CHINA ALMOND', '2023-11-28 18:30:43', '2023-11-29 18:30:43'),
(43, 'JOVIN', '2023-11-21 18:31:32', '2023-11-08 18:31:32'),
(44, 'SALT', '2023-11-08 18:31:46', '2023-11-02 18:31:46'),
(45, 'SUGAR', '2023-11-15 18:32:04', '2023-11-16 18:32:04'),
(46, 'COFFE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'MDF', '2023-11-15 18:32:34', '2023-11-16 18:32:34'),
(48, 'SODA\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'WHEAT', '2023-11-22 18:33:05', '2023-11-16 18:33:05'),
(51, 'RAKTACHANDAN', '2023-11-16 18:33:35', '2023-11-16 18:33:36'),
(52, 'MUNJISTHA', '2023-11-14 18:33:47', '2023-11-21 18:33:47'),
(53, 'KHOSH KHOSH', '2023-11-21 18:34:05', '2023-11-14 18:34:05'),
(54, 'JOYTREE', '2023-11-15 18:34:33', '2023-11-16 18:34:33'),
(55, 'KAMPUR\r\n', '2023-11-08 18:34:52', '2023-11-14 18:34:52'),
(56, 'NEEM POWDER', '2023-11-22 18:35:16', '2023-11-23 18:35:16'),
(57, 'HIBISCUS POWDER', '2023-11-15 18:35:30', '2023-11-09 18:35:30'),
(58, 'ROSE POWDER', '2023-11-20 18:35:45', '2023-11-13 18:35:45'),
(59, 'TURMARIC', '2023-11-09 18:36:02', '2023-11-15 18:36:02'),
(60, 'MATI(MULTANI)', '2023-11-15 18:36:30', '2023-11-16 18:36:30'),
(61, 'RICE POWDER', '2023-11-21 18:36:42', '2023-11-16 18:36:42'),
(62, 'BESON', '2023-11-14 18:37:21', '2023-11-16 18:37:21'),
(63, 'MUSUR DAL', '2023-11-14 18:37:34', '2023-11-15 18:37:34'),
(64, 'AMALOKO', '2023-11-14 18:37:52', '2023-11-14 18:37:52'),
(65, 'NISINDA\r\n', '2023-11-13 18:38:10', '2023-11-15 18:38:10'),
(66, 'SUNTHI', '2023-11-13 18:38:28', '2023-11-20 18:38:28'),
(67, 'PIPUL', '2023-11-21 18:38:40', '2023-11-15 18:38:40'),
(68, 'TEJPATA', '2023-11-20 18:38:59', '2023-11-14 18:38:59'),
(69, 'ELACHI(SMALL)', '2023-11-26 18:39:25', '2023-11-29 18:39:25'),
(70, 'GHEE', '2023-11-07 18:39:40', '2023-11-15 18:39:40'),
(71, 'MADHU', '2023-11-14 18:40:04', '2023-11-08 18:40:04'),
(72, 'FITKARI', '2023-11-21 18:40:17', '2023-11-29 18:40:17'),
(73, 'SONAPATA', '2023-11-21 18:40:34', '2023-11-13 18:40:34'),
(74, 'MASH DAL', '2023-11-15 18:40:58', '2023-11-07 18:40:58'),
(75, 'METHI\r\n', '2023-11-07 18:41:14', '2023-11-08 18:41:14'),
(76, 'SESAME OIL\r\n', '2023-11-07 18:41:29', '2023-11-20 18:41:29'),
(77, 'Jovin', '2023-11-02 12:52:54', '2023-11-02 12:52:54'),
(78, 'Kampur', '2023-11-02 12:53:08', '2023-11-02 12:53:08'),
(79, 'Undergarments', '2023-11-02 12:53:18', '2023-11-02 12:53:18'),
(80, 'Shampoo', '2023-11-02 12:53:26', '2023-11-02 12:53:26'),
(81, 'Body scrub', '2023-11-02 12:53:40', '2023-11-02 12:53:40'),
(82, 'Triphala', '2023-11-02 12:53:50', '2023-11-02 12:53:50'),
(83, 'Yesthimadhu', '2023-11-02 12:54:01', '2023-11-02 12:54:01'),
(84, 'Cloth', '2023-11-02 12:54:11', '2023-11-02 12:54:11'),
(85, 'Cotton', '2023-11-02 12:54:19', '2023-11-02 12:54:19'),
(86, 'Oil', '2023-11-02 12:54:31', '2023-11-02 12:54:31'),
(87, 'Atta', '2023-11-02 12:54:55', '2023-11-02 12:54:55'),
(88, 'Dasamu', '2023-11-02 12:55:03', '2023-11-02 12:55:03'),
(89, 'Garlic', '2023-11-02 12:55:13', '2023-11-02 12:55:13'),
(90, 'Coconut', '2023-11-02 12:55:24', '2023-11-02 12:55:24'),
(91, 'Leaf', '2023-11-02 12:56:31', '2023-11-02 12:56:31'),
(92, 'Kizhi powder', '2023-11-02 12:56:42', '2023-11-02 12:56:42'),
(93, 'Roshi', '2023-11-02 12:56:50', '2023-11-02 12:56:50'),
(94, 'Milk', '2023-11-02 12:57:18', '2023-11-02 12:57:18'),
(95, 'Monjistha', '2023-11-02 12:57:30', '2023-11-02 12:57:30'),
(96, 'Raktachandan', '2023-11-02 12:57:40', '2023-11-02 12:57:40'),
(97, 'Honey', '2023-11-02 12:57:51', '2023-11-02 12:57:51'),
(98, 'Gumutra', '2023-11-02 12:58:27', '2023-11-02 12:58:27'),
(99, 'Gukshuradi', '2023-11-02 12:58:37', '2023-11-02 12:58:37'),
(100, 'Punarnava', '2023-11-02 12:58:46', '2023-11-02 12:58:46'),
(101, 'Dashamul kwath', '2023-11-02 12:58:57', '2023-11-02 12:58:57'),
(102, 'Triphala kwath', '2023-11-02 12:59:22', '2023-11-02 12:59:22'),
(103, 'Aswagandha', '2023-11-02 12:59:34', '2023-11-02 12:59:34'),
(104, 'Niguni', '2023-11-02 12:59:42', '2023-11-02 12:59:42'),
(105, 'Kashayavasti bag', '2023-11-02 12:59:48', '2023-11-02 12:59:48'),
(106, 'Gloves', '2023-11-02 13:00:14', '2023-11-02 13:00:14'),
(107, 'Kwath powder', '2023-11-02 13:00:21', '2023-11-02 13:00:21'),
(108, 'Catheter', '2023-11-02 13:00:28', '2023-11-02 13:00:28'),
(109, 'Syringe', '2023-11-02 13:00:57', '2023-11-02 13:00:57'),
(110, 'Egg', '2023-11-02 13:01:08', '2023-11-02 13:01:08'),
(111, 'Navararice', '2023-11-02 13:01:29', '2023-11-02 13:01:29'),
(112, 'Mutha', '2023-11-02 13:01:36', '2023-11-02 13:01:36'),
(113, 'Olive oil', '2023-11-02 13:01:45', '2023-11-02 13:01:45'),
(114, 'Anu taila/KB 101/triphala ghee', '2023-11-02 13:01:52', '2023-11-02 13:01:52'),
(115, 'Cotton/Foam', '2023-11-02 13:01:59', '2023-11-02 13:01:59'),
(116, 'Eye pad', '2023-11-02 13:02:26', '2023-11-02 13:02:26'),
(117, 'Takradhara powder', '2023-11-02 13:02:37', '2023-11-02 13:02:37'),
(118, 'Curd', '2023-11-02 13:02:48', '2023-11-02 13:02:48'),
(119, 'Roshi', '2023-11-02 13:02:57', '2023-11-02 13:02:57'),
(120, 'Lemon', '2023-11-02 13:03:06', '2023-11-02 13:03:06'),
(121, 'Triphala ghee', '2023-11-02 13:03:13', '2023-11-02 13:03:13'),
(122, 'Atta', '2023-11-02 13:03:20', '2023-11-02 13:03:20'),
(123, 'Rose water', '2023-11-02 13:03:28', '2023-11-02 13:03:28'),
(124, 'Bala', '2023-11-02 13:03:34', '2023-11-02 13:03:34'),
(125, 'Manjistha', '2023-11-02 13:04:28', '2023-11-02 13:04:28'),
(126, 'Amla', '2023-11-02 13:04:38', '2023-11-02 13:04:38'),
(127, 'Head pack', '2023-11-02 13:04:48', '2023-11-02 13:04:48'),
(128, 'Banana', '2023-11-02 13:05:04', '2023-11-02 13:05:04'),
(129, 'Kampur', '2023-11-02 13:05:17', '2023-11-02 13:05:17'),
(130, 'Dasamul', '2023-11-02 13:05:27', '2023-11-02 13:05:27'),
(131, 'K.K powder', '2023-11-02 13:05:36', '2023-11-02 13:05:36'),
(132, 'Shower cap', '2023-11-02 13:05:47', '2023-11-02 13:05:47'),
(133, 'Mask', '2023-11-02 13:05:59', '2023-11-02 13:05:59'),
(134, 'Rice powder', '2023-11-02 13:06:12', '2023-11-02 13:06:12'),
(135, 'Holud', '2023-11-02 13:06:30', '2023-11-02 13:06:30'),
(136, 'Tulsi', '2023-11-02 13:06:39', '2023-11-02 13:06:39'),
(137, 'Water', '2023-11-02 13:06:58', '2023-11-02 13:06:58'),
(138, 'Turmeric', '2023-11-02 13:07:14', '2023-11-02 13:07:14'),
(139, 'Nigundi', '2023-11-02 13:07:20', '2023-11-02 13:07:20'),
(140, 'Triphala', '2023-11-02 13:07:27', '2023-11-02 13:07:27'),
(141, 'Bandage', '2023-11-02 13:07:36', '2023-11-02 13:07:36'),
(142, 'AVIPATTIKAR CHURNA', '2023-11-02 13:09:03', '2023-11-02 13:09:03'),
(143, 'NAGARMOTHA', '2023-11-02 13:09:14', '2023-11-02 13:09:14'),
(144, 'MADHUMEH DAMAN CHURNA', '2023-11-02 13:09:25', '2023-11-02 13:09:25'),
(145, 'PUSHYANUG CHURNA', '2023-11-02 13:09:33', '2023-11-02 13:09:33'),
(146, 'LAVAN BHASKAR', '2023-11-02 13:09:42', '2023-11-02 13:09:42'),
(147, 'SHATAVARI CHURNA', '2023-11-02 13:09:52', '2023-11-02 13:09:52'),
(148, 'TALISADI CHURNA', '2023-11-02 13:10:02', '2023-11-02 13:10:02'),
(149, 'PANCHAVALKALA KWATHA', '2023-11-02 13:10:18', '2023-11-02 13:10:18'),
(150, 'SITOPALADI CHURNA', '2023-11-02 13:10:29', '2023-11-02 13:10:29'),
(151, 'AJMODADI CHURNA', '2023-11-02 13:10:37', '2023-11-02 13:10:37'),
(152, 'GOKSHURADI CHURNA', '2023-11-02 13:10:46', '2023-11-02 13:10:46'),
(153, 'YASHTIMADHU CHURNA', '2023-11-02 13:10:56', '2023-11-02 13:10:56'),
(154, 'BRAHMI CHURNA', '2023-11-02 13:11:07', '2023-11-02 13:11:07'),
(155, 'DASHMOOL KWATH', '2023-11-02 13:11:17', '2023-11-02 13:11:17'),
(156, 'DADIMASHTAKA CHURNA', '2023-11-02 13:11:27', '2023-11-02 13:11:27'),
(157, 'INDIGO CHURNA', '2023-11-02 13:11:40', '2023-11-02 13:11:40'),
(158, 'PUSHKARMOOLA CHURNA', '2023-11-02 13:11:48', '2023-11-02 13:11:48'),
(159, 'REETHA CHURNA', '2023-11-02 13:11:58', '2023-11-02 13:11:58'),
(160, 'DASAHNGLEP', '2023-11-02 13:12:08', '2023-11-02 13:12:08'),
(161, 'TANKAN BHASMA', '2023-11-02 13:12:19', '2023-11-02 13:12:19'),
(162, 'TANKAN BHASMA', '2023-11-02 13:12:32', '2023-11-02 13:12:32'),
(163, 'NAGKESAR CHURNA', '2023-11-02 13:12:40', '2023-11-02 13:12:40'),
(164, 'DASHMOOL CHURNA', '2023-11-02 13:13:16', '2023-11-02 13:13:16'),
(165, 'CHANDANADI CHURNA', '2023-11-02 13:13:26', '2023-11-02 13:13:26'),
(166, 'BAKUCHI', '2023-11-02 13:13:34', '2023-11-02 13:13:34'),
(167, 'KAPIKACHU CHURNA', '2023-11-02 13:13:43', '2023-11-02 13:13:43'),
(168, 'PUNARNAVADI CHURNA', '2023-11-02 13:13:55', '2023-11-02 13:13:55'),
(169, 'SHANKHPUSHPI CHURNA', '2023-11-02 13:14:04', '2023-11-02 13:14:04'),
(170, 'KESH SUTRAM', '2023-11-02 13:14:13', '2023-11-02 13:14:13'),
(171, 'LON HARBAL', '2023-11-02 13:14:21', '2023-11-02 13:14:21'),
(172, 'UDWARTANAM POWDER', '2023-11-02 13:14:29', '2023-11-02 13:14:29'),
(173, 'VELA GREEN TEA', '2023-11-02 13:15:07', '2023-11-02 13:15:07'),
(174, 'SHATPUSHPADI CHURNA', '2023-11-02 13:15:14', '2023-11-02 13:15:14'),
(175, 'GILOY SATVA', '2023-11-02 13:15:20', '2023-11-02 13:15:20'),
(176, 'HEERAK BHASMA', '2023-11-02 13:15:27', '2023-11-02 13:15:27'),
(177, 'PANCHASAKAR CHURNA', '2023-11-02 13:15:35', '2023-11-02 13:15:35'),
(178, 'ARJUN TWAK CHURNA', '2023-11-02 13:15:42', '2023-11-02 13:15:42'),
(179, 'SHATAVARI GRANULES', '2023-11-02 13:15:48', '2023-11-02 13:15:48'),
(180, 'BILWADI CHURNA', '2023-11-02 13:16:00', '2023-11-02 13:16:00'),
(181, 'DASHAMSAKAR CHURNA', '2023-11-02 13:16:13', '2023-11-02 13:16:13'),
(182, 'Massage Oil', '2023-11-03 00:13:38', '2023-11-03 00:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(4, 'SMS RASA', '0', '2023-11-21 17:28:39', '2023-11-14 17:28:39'),
(5, 'CP VATI', '0', '2023-11-22 17:28:39', '2023-11-29 17:28:39'),
(6, 'BRM VATI', '0', '2023-11-29 17:28:39', '2023-11-30 17:28:39'),
(7, 'SKU RASA', '0', '2023-11-21 17:28:39', '2023-11-22 17:28:39'),
(8, 'YR GUGGULU', '0', '2023-11-29 17:28:39', '2023-11-14 17:28:39'),
(9, 'MH GUGGULU', '0', '2023-11-16 17:28:39', '2023-11-23 17:28:39'),
(10, 'TRF GUGGULU', '0', '2023-11-02 17:28:39', '2023-11-02 17:28:39'),
(11, 'GKS GUGGULU', '0', '2023-11-22 17:28:39', '2023-11-08 17:28:39'),
(12, 'PUN GUGGULU\r\n', '0', '2023-11-02 17:28:39', '2023-11-02 17:28:39'),
(13, 'KSR GUGGULU', '0', '2023-11-30 17:28:39', '2023-11-02 17:28:39'),
(14, 'RPR VATI', '0', '2023-11-15 17:35:20', '2023-10-17 22:19:16'),
(15, 'GK RASAYAN', '0', '2023-04-29 08:11:14', '2023-11-29 17:28:39'),
(16, 'PN MANDUR\r\n', '0', '2023-11-29 17:28:39', '2023-11-30 17:28:39'),
(17, 'MYROLAX FORT', '0', '2023-11-21 17:28:39', '2023-11-22 17:28:39'),
(18, 'SPARTAN', '0', '2023-11-29 17:28:39', '2023-11-14 17:28:39'),
(19, 'STONVIL', '0', '2023-11-16 17:28:39', '2023-11-23 17:28:39'),
(20, 'LMV RASA', '0', '2023-11-02 17:35:20', '2023-11-23 17:35:20'),
(21, 'SV RASA', '0', '2023-11-22 17:28:39', '2023-11-08 17:28:39'),
(22, 'LKD GUGGULU', '0', '2023-11-02 17:28:39', '2023-11-02 17:28:39'),
(23, 'KB 101 CAP', '0', '2023-11-30 17:28:39', '2023-11-02 17:28:39'),
(24, 'SS RASA', '0', '2023-11-02 17:35:20', '2023-11-02 17:35:20'),
(25, 'KD RASA', '0', '2023-11-02 17:35:20', '2023-11-02 17:35:20'),
(26, 'KDR VATI', '0', '2023-11-30 17:35:20', '2023-11-30 17:35:20'),
(27, 'KNT VATI', '0', '2023-11-02 17:35:20', '2023-11-02 17:35:20'),
(28, 'PRV PISHTI', '0', '2023-11-30 17:35:20', '2023-11-30 17:35:20'),
(29, 'BVC GOLD', '0', '2023-11-21 17:35:20', '2023-11-15 17:35:20'),
(30, 'VS VATI', '0', '2023-11-15 17:35:20', '2023-11-22 17:35:20'),
(31, 'KNC GUGGGULU', '0', '2023-11-09 17:35:20', '2023-11-09 17:35:20'),
(32, 'AP LOH', '0', '2023-11-29 17:35:20', '2023-11-22 17:35:20'),
(33, 'ANT GUTIKA', '0', '2023-11-02 17:35:20', '2023-11-02 17:35:20'),
(34, 'NEERI TABLETS\r\n', '0', '2023-04-29 08:11:14', '2023-04-29 08:11:14'),
(35, 'AK RASA\r\n', '0', '2023-04-29 08:11:14', '2023-04-29 08:11:14'),
(36, 'PVK', '0', '2023-11-29 17:28:39', '2023-11-30 17:28:39'),
(37, 'AV VATI', '0', '2023-11-21 17:28:39', '2023-11-22 17:28:39'),
(38, 'KB 101 TAILA', '0', '2023-11-29 17:28:39', '2023-11-14 17:28:39'),
(39, 'P OIL', '0', '2023-11-16 17:28:39', '2023-11-23 17:28:39'),
(40, 'KMK TAILA', '0', '2023-11-02 17:28:39', '2023-11-02 17:28:39'),
(41, 'POLARID OINTMENT', '0', '2023-11-22 17:28:39', '2023-11-08 17:28:39'),
(42, 'TRV AVALEHYA', '0', '2023-11-02 17:28:39', '2023-11-02 17:28:39'),
(43, 'ANU TAILA', '0', '2023-11-23 17:49:20', '2023-11-02 17:28:39'),
(44, 'SVM Rasa', '0', '2023-11-15 17:49:20', '2023-11-15 17:49:20'),
(45, 'KKR Rasa', '0', '2023-11-23 17:49:20', '2023-11-22 17:49:20'),
(46, 'VK Rasa', '0', '2023-11-27 17:49:20', '2023-11-29 17:49:20'),
(47, 'DNV 101 Vati', '0', '2023-11-29 17:49:20', '2023-11-22 17:49:20'),
(48, 'GKR Vati', '0', '2023-11-22 17:49:20', '2023-11-23 17:49:20'),
(49, 'PNM', '0', '2023-11-21 17:49:20', '2023-11-23 17:49:20'),
(50, 'MYR vati', '0', '2023-11-29 17:49:20', '2023-11-23 17:49:20'),
(51, 'SPR Vati', '0', '2023-11-23 17:49:20', '2023-11-02 17:49:20'),
(52, 'SVIL Vati', '0', '2023-11-09 17:49:20', '2023-11-08 17:49:20'),
(53, 'KCR guggulu', '0', '2023-11-23 17:49:20', '2023-11-23 17:49:20'),
(54, 'APL Vato', '0', '2023-11-02 17:49:20', '2023-11-02 17:49:20'),
(55, 'KNT Vati', '0', '2023-11-29 17:49:20', '2023-11-16 17:49:20'),
(56, 'NE Vati', '0', '2023-11-02 17:49:20', '2023-11-02 17:49:20'),
(57, 'PRID Lep', '0', '2023-11-02 17:49:20', '2023-11-02 17:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_equipment`
--

CREATE TABLE `medicine_equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `other_category` varchar(255) DEFAULT NULL,
  `other_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_equipment`
--

INSERT INTO `medicine_equipment` (`id`, `name`, `quantity`, `unit`, `other_category`, `other_type`, `created_at`, `updated_at`) VALUES
(4, 'Water', '0', 'Ml', NULL, NULL, '2023-11-03 03:10:15', '2023-11-03 03:10:15'),
(5, 'AMLOKI', '0', 'Piece', NULL, NULL, '2023-11-03 07:20:09', '2023-11-03 07:20:09'),
(6, 'HORETAKI', '0', 'Piece', NULL, NULL, '2023-11-03 07:44:45', '2023-11-03 07:44:45'),
(7, 'BOHERA', '0', 'Gram', NULL, NULL, '2023-11-03 07:45:11', '2023-11-03 07:45:11'),
(8, 'BRAMMI', '0', 'Gram', NULL, NULL, '2023-11-03 07:45:29', '2023-11-03 07:45:29'),
(9, 'JATAMASHI', '0', 'Gram', NULL, NULL, '2023-11-03 07:46:03', '2023-11-03 07:46:03'),
(10, 'BRIHARAJ', '0', 'Gram', NULL, NULL, '2023-11-03 07:46:22', '2023-11-03 07:46:22'),
(11, 'Tulsi', '0', 'Gram', NULL, NULL, '2023-11-03 07:46:41', '2023-11-03 07:46:41'),
(12, 'MORICH', '0', 'Gram', NULL, NULL, '2023-11-03 07:47:04', '2023-11-03 07:47:04'),
(13, 'DARUCHINI', '0', 'Gram', NULL, NULL, '2023-11-03 07:47:34', '2023-11-03 07:47:34'),
(14, 'LONG', '0', 'Gram', NULL, NULL, '2023-11-03 07:47:50', '2023-11-03 07:47:50'),
(15, 'DHONIA', '0', 'Gram', NULL, NULL, '2023-11-03 07:48:01', '2023-11-03 07:48:01'),
(16, 'JEERA', '0', 'Gram', NULL, NULL, '2023-11-03 07:48:18', '2023-11-03 07:48:18'),
(17, 'MOURI', '0', 'Gram', NULL, NULL, '2023-11-03 07:48:30', '2023-11-03 07:48:30'),
(18, 'AWSHAGANDHA', '0', 'Gram', NULL, NULL, '2023-11-03 07:48:43', '2023-11-03 07:48:43'),
(19, 'YESTHIMUDHU', '0', 'Gram', NULL, NULL, '2023-11-03 07:49:03', '2023-11-03 07:49:03'),
(20, 'SUJI', '0', 'Gram', NULL, NULL, '2023-11-03 07:49:21', '2023-11-03 07:49:21'),
(21, 'SAFFRON', '0', 'Gram', NULL, NULL, '2023-11-03 07:49:31', '2023-11-03 07:49:31'),
(22, 'ALMOND', '0', 'Gram', NULL, NULL, '2023-11-03 07:50:26', '2023-11-03 07:50:26'),
(23, 'CHINA ALMOND', '0', 'Gram', NULL, NULL, '2023-11-03 07:50:37', '2023-11-03 07:50:37'),
(24, 'Bala', '0', 'Gram', NULL, NULL, '2023-11-03 07:50:53', '2023-11-03 07:50:53'),
(25, 'JOVIN', '0', 'Gram', NULL, NULL, '2023-11-03 07:51:07', '2023-11-03 07:51:07'),
(26, 'SALT', '0', 'Gram', NULL, NULL, '2023-11-03 07:51:30', '2023-11-03 07:51:30'),
(27, 'SUGAR', '0', 'Gram', NULL, NULL, '2023-11-03 07:51:42', '2023-11-03 07:51:42'),
(28, 'COFFE', '0', 'Gram', NULL, NULL, '2023-11-03 07:52:02', '2023-11-03 07:52:02'),
(29, 'MDF', '0', 'Gram', NULL, NULL, '2023-11-03 07:52:17', '2023-11-03 07:52:17'),
(30, 'SODA', '0', 'Gram', NULL, NULL, '2023-11-03 07:52:45', '2023-11-03 07:52:45'),
(31, 'WHEAT', '0', 'Gram', NULL, NULL, '2023-11-03 07:52:56', '2023-11-03 07:52:56'),
(32, 'Mutha', '0', 'Gram', NULL, NULL, '2023-11-03 07:53:16', '2023-11-03 07:53:16'),
(33, 'RAKTACHANDAN', '0', 'Gram', NULL, NULL, '2023-11-03 07:53:32', '2023-11-03 07:53:32'),
(34, 'MUNJISTHA', '0', 'Gram', NULL, NULL, '2023-11-03 07:53:47', '2023-11-03 07:53:47'),
(35, 'KHOSH KHOSH', '0', 'Gram', NULL, NULL, '2023-11-03 08:21:19', '2023-11-03 08:21:19'),
(36, 'JOYTREE', '0', 'Gram', NULL, NULL, '2023-11-03 08:21:36', '2023-11-03 08:21:36'),
(37, 'KAMPUR', '0', 'Gram', NULL, NULL, '2023-11-03 08:21:49', '2023-11-03 08:21:49'),
(38, 'NEEM POWDER', '0', 'Gram', NULL, NULL, '2023-11-03 08:22:08', '2023-11-03 08:22:08'),
(39, 'HIBISCUS POWDER', '0', 'Gram', NULL, NULL, '2023-11-03 08:22:19', '2023-11-03 08:22:19'),
(40, 'RICE POWDER', '0', 'Gram', NULL, NULL, '2023-11-03 08:22:32', '2023-11-03 08:22:32'),
(41, 'TURMARIC', '0', 'Gram', NULL, NULL, '2023-11-03 08:22:46', '2023-11-03 08:22:46'),
(42, 'MATI(MULTANI)', '0', 'Gram', NULL, NULL, '2023-11-03 08:23:04', '2023-11-03 08:23:04'),
(43, 'RICE POWDER', '0', 'Gram', NULL, NULL, '2023-11-03 08:23:25', '2023-11-03 08:23:25'),
(44, 'BESON', '0', 'Gram', NULL, NULL, '2023-11-03 08:23:36', '2023-11-03 08:23:36'),
(45, 'MUSUR DAL', '0', 'Gram', NULL, NULL, '2023-11-03 08:23:55', '2023-11-03 08:23:55'),
(46, 'AMALOKO', '0', 'Gram', NULL, NULL, '2023-11-03 08:24:07', '2023-11-03 08:24:07'),
(47, 'NISINDA', '0', 'Gram', NULL, NULL, '2023-11-03 08:24:20', '2023-11-03 08:24:20'),
(48, 'SUNTHI', '0', 'Gram', NULL, NULL, '2023-11-03 08:24:38', '2023-11-03 08:24:38'),
(49, 'PIPUL', '0', 'Gram', NULL, NULL, '2023-11-03 08:24:49', '2023-11-03 08:24:49'),
(50, 'TEJPATA', '0', 'Gram', NULL, NULL, '2023-11-03 08:25:00', '2023-11-03 08:25:00'),
(51, 'TEJPATA', '0', 'Gram', NULL, NULL, '2023-11-03 08:25:09', '2023-11-03 08:25:09'),
(52, 'ELACHI(SMALL)', '0', 'Gram', NULL, NULL, '2023-11-03 08:25:24', '2023-11-03 08:25:24'),
(53, 'GHEE', '0', 'Gram', NULL, NULL, '2023-11-03 08:25:35', '2023-11-03 08:25:35'),
(54, 'MADHU', '0', 'Gram', NULL, NULL, '2023-11-03 08:25:49', '2023-11-03 08:25:49'),
(55, 'FITKARI', '0', 'Piece', NULL, NULL, '2023-11-03 08:25:59', '2023-11-03 08:25:59'),
(56, 'SONAPATA', '0', 'Gram', NULL, NULL, '2023-11-03 08:26:10', '2023-11-03 08:26:10'),
(57, 'MASH DAL', '0', 'Gram', NULL, NULL, '2023-11-03 08:26:27', '2023-11-03 08:26:27'),
(58, 'METHI', '0', 'Gram', NULL, NULL, '2023-11-03 08:26:41', '2023-11-03 08:26:41'),
(59, 'SESAME OIL', '0', 'Gram', NULL, NULL, '2023-11-03 08:26:55', '2023-11-03 08:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_equip_detail`
--

CREATE TABLE `medicine_equip_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT current_timestamp(),
  `updated_at` text DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(6, '2023_05_05_080336_create_permission_tables', 1),
(7, '2023_05_05_080405_create_admins_table', 1),
(8, '2023_05_06_060503_create_system_information_table', 1),
(9, '2023_05_08_090824_create_walk_by_patients_table', 1),
(10, '2023_05_08_090854_create_walk_by_patient_services_table', 1),
(11, '2023_05_08_091100_create_patients_table', 1),
(12, '2023_05_08_091122_create_patient_files_table', 1),
(13, '2023_05_08_091908_create_doctors_table', 1),
(14, '2023_05_08_091934_create_doctor_consult_dates_table', 1),
(15, '2023_05_08_092824_create_patient_admits_table', 1),
(16, '2023_05_14_143955_create_bills_table', 1),
(17, '2023_05_14_144038_create_doctor_appointments_table', 1),
(18, '2023_05_14_144124_create_therapy_appointments_table', 1),
(19, '2023_05_14_144154_create_therapy_appointment_date_and_times_table', 1),
(20, '2023_05_14_144220_create_therapy_appointment_details_table', 1),
(21, '2023_05_14_145248_create_patient_histories_table', 1),
(22, '2023_05_14_145316_create_staff_table', 1),
(23, '2023_05_14_145339_create_therapists_table', 1),
(24, '2023_05_14_145616_create_patient_herbs_table', 1),
(25, '2023_05_14_145658_create_patient_therapies_table', 1),
(26, '2023_05_14_145731_create_patient_medical_supplements_table', 1),
(27, '2023_05_14_151349_create_diet_charts_table', 1),
(28, '2023_05_14_153153_create_health_supplements_table', 1),
(29, '2023_05_14_153224_create_medicines_table', 1),
(30, '2023_05_14_153338_create_payments_table', 1),
(31, '2023_05_14_153414_create_rewards_table', 1),
(32, '2023_05_14_153632_create_therapy_ingredients_table', 1),
(33, '2023_05_14_153706_create_therapy_lists_table', 1),
(34, '2023_05_14_155945_create_therapy_details_table', 1),
(35, '2023_05_16_113216_create_medicine_equipment_table', 1),
(36, '2023_05_16_113235_create_powders_table', 1),
(37, '2023_05_16_113307_create_packages_table', 1),
(38, '2023_05_18_053551_create_patient_packages_table', 1),
(39, '2023_05_18_061128_create_treat_ment_charts_table', 1),
(40, '2023_05_28_044646_create_therapy_packages_table', 1),
(41, '2023_05_28_100637_create_agrement_form_ones_table', 1),
(42, '2023_05_28_100703_create_agrement_form_twos_table', 1),
(43, '2023_05_29_074542_create_agrement_form_one_sneha_lists_table', 1),
(44, '2023_05_29_074618_create_vaman_yoga_lists_table', 1),
(45, '2023_05_30_094015_create_agrement_form_threes_table', 1),
(46, '2023_05_30_094346_create_agrement_form_three_sneha_lists_table', 1),
(48, '2023_06_03_101845_create_patient_main_therapies_table', 2),
(49, '2023_06_07_061255_create_patient_therapy_details_table', 3),
(50, '2023_06_07_062346_create_patient_herb_details_table', 4),
(51, '2023_07_23_084804_create_other_ingredients_table', 5),
(52, '2023_07_23_084947_create_inventory_categories_table', 6),
(53, '2023_07_23_110251_create_single_ingredients_table', 7),
(54, '2023_08_13_150728_create_facial_packs_table', 8),
(55, '2023_08_13_153130_create_facial_pack_details_table', 8),
(56, '2023_08_13_165007_create_face_packs_table', 9),
(57, '2023_08_13_165051_create_face_pack_details_table', 9),
(58, '2023_08_13_174559_create_face_pack_appoinments_table', 10),
(59, '2023_08_13_175005_create_face_pack_appoinment_details_table', 10),
(60, '2023_08_16_030911_create_inventory_names_table', 10),
(61, '2023_08_22_060010_create_discounts_table', 10),
(62, '2023_08_22_060055_create_vats_table', 10),
(63, '2023_09_28_091410_create_inventory_damages_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 7),
(1, 'App\\Models\\Admin', 8),
(1, 'App\\Models\\Admin', 9),
(3, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Admin', 3),
(3, 'App\\Models\\Admin', 6),
(4, 'App\\Models\\Admin', 4),
(5, 'App\\Models\\Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `other_equipment`
--

CREATE TABLE `other_equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_equipment_details`
--

CREATE TABLE `other_equipment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `other_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_ingredients`
--

CREATE TABLE `other_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_ingredients`
--

INSERT INTO `other_ingredients` (`id`, `category`, `name`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(5, 'Facial Ingredient', 'SAFFRON', '21', 'Piece', '2023-11-03 00:04:07', '2023-11-08 01:49:27'),
(6, NULL, 'LONG', '20', 'Piece', '2023-11-03 00:04:41', '2023-11-03 00:04:41'),
(7, NULL, 'JEERA', '20', 'Gram', '2023-11-03 00:05:26', '2023-11-03 00:05:26'),
(8, NULL, 'CHINA ALMOND', '20', 'Piece', '2023-11-03 00:06:17', '2023-11-03 00:06:17'),
(9, NULL, 'ELACHI(SMALL)', '20', 'Piece', '2023-11-03 00:07:06', '2023-11-03 00:07:06'),
(10, NULL, 'NEEM POWDER', '20', 'Gram', '2023-11-03 00:07:19', '2023-11-03 00:07:19'),
(11, NULL, 'WHEAT', '20', 'Gram', '2023-11-03 00:08:15', '2023-11-03 00:08:15'),
(12, NULL, 'YESTHIMUDHU', '20', 'Ml', '2023-11-03 00:08:43', '2023-11-03 00:08:43'),
(13, NULL, 'SONAPATA', '20', 'Gram', '2023-11-03 00:09:31', '2023-11-03 00:09:31'),
(14, NULL, 'JOVIN', '20', 'Gram', '2023-11-03 00:12:34', '2023-11-03 00:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `powder_id` varchar(255) NOT NULL,
  `powder_amount` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `refer_from` varchar(255) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_or_mobile_number` varchar(11) NOT NULL,
  `nid_number` varchar(25) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `how_did_you_come_to_know_about_this_center` text NOT NULL,
  `do_you_have_earlier_experience_of_ayurveda_please_give_details` text NOT NULL,
  `do_you_have_symptoms_in_past_one_weak` text DEFAULT NULL,
  `covid_test_result` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_admits`
--

CREATE TABLE `patient_admits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `patient_type` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_or_mobile_number` varchar(11) NOT NULL,
  `nid_number` varchar(25) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `type_of_accommodation` text NOT NULL,
  `recommended_doctor_name` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `treatment_package_name` varchar(255) NOT NULL,
  `routine` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_files`
--

CREATE TABLE `patient_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_files`
--

INSERT INTO `patient_files` (`id`, `patient_id`, `name`, `file`, `created_at`, `updated_at`) VALUES
(10, 13, 'PJHT6qsWkF', 'public/uploads/01.jpg', '2023-11-01 09:39:28', '2023-11-01 09:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `patient_herbs`
--

CREATE TABLE `patient_herbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_appointment_id` bigint(20) UNSIGNED NOT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `how_many_dose` varchar(255) DEFAULT NULL,
  `main_time` varchar(255) DEFAULT NULL,
  `status` varchar(110) DEFAULT NULL,
  `hnote` text DEFAULT NULL,
  `mnote` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_herb_details`
--

CREATE TABLE `patient_herb_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_herb_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_name` varchar(255) NOT NULL,
  `quantity` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `hnote` text DEFAULT NULL,
  `mnote` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_histories`
--

CREATE TABLE `patient_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` varchar(255) NOT NULL,
  `pradhan_vedana` text DEFAULT NULL,
  `vedana_vrutanta` text DEFAULT NULL,
  `chikitsa_vrutanta` text DEFAULT NULL,
  `stri_evam_prasooti_vrutant` text DEFAULT NULL,
  `poorva_vedana_vrutant` text DEFAULT NULL,
  `anuvanshika_vritanta` text DEFAULT NULL,
  `pratyaksh_pramanam` text DEFAULT NULL,
  `roga_preeksha_srotas_pareeksha` text DEFAULT NULL,
  `rasavaha_srotas` text DEFAULT NULL,
  `raktavaha_srotas` text DEFAULT NULL,
  `mamsavaha_srotas` text DEFAULT NULL,
  `medovaha_srotas` text DEFAULT NULL,
  `asthivaha_srotas` text DEFAULT NULL,
  `majjavaha_srotas` text DEFAULT NULL,
  `shukravaha_srotas` text DEFAULT NULL,
  `rogi_pareeksha` text DEFAULT NULL,
  `nadi` text DEFAULT NULL,
  `dosha` text DEFAULT NULL,
  `dushya` text DEFAULT NULL,
  `shwas` text DEFAULT NULL,
  `tap_temp` text DEFAULT NULL,
  `kala` text DEFAULT NULL,
  `bhara_wt` text DEFAULT NULL,
  `agni` text DEFAULT NULL,
  `raktchap_bp` text DEFAULT NULL,
  `prakruti` text DEFAULT NULL,
  `mala` text DEFAULT NULL,
  `vaya` text DEFAULT NULL,
  `mootra` text DEFAULT NULL,
  `satmya` text DEFAULT NULL,
  `kshudha` text DEFAULT NULL,
  `satva` text DEFAULT NULL,
  `nidra` text DEFAULT NULL,
  `ahara` text DEFAULT NULL,
  `vyasan` text DEFAULT NULL,
  `roga_mrag` text DEFAULT NULL,
  `rago_sthana` text DEFAULT NULL,
  `sadhyasadhyata` text DEFAULT NULL,
  `pathya` text DEFAULT NULL,
  `yoga_chikitsa` text DEFAULT NULL,
  `paramarsh` text DEFAULT NULL,
  `history_file` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bill_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_main_therapies`
--

CREATE TABLE `patient_main_therapies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapist_id` text DEFAULT NULL,
  `therapy_appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `therapy_package_id` varchar(200) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `face_pack_status` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_medical_supplements`
--

CREATE TABLE `patient_medical_supplements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_appointment_id` bigint(20) UNSIGNED NOT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `status` varchar(110) DEFAULT NULL,
  `ppnote` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_packages`
--

CREATE TABLE `patient_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_appointment_id` bigint(20) UNSIGNED NOT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `part_of_the_day` varchar(255) NOT NULL,
  `how_many_dose` varchar(255) NOT NULL,
  `main_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_therapies`
--

CREATE TABLE `patient_therapies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_appointment_id` bigint(20) UNSIGNED NOT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `therapy_type` varchar(255) DEFAULT NULL,
  `package_name` varchar(255) NOT NULL,
  `status` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_therapy_details`
--

CREATE TABLE `patient_therapy_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_therapy_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_name` varchar(255) NOT NULL,
  `quantity` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `psnote` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `main_discount` varchar(200) DEFAULT NULL,
  `all_discount` varchar(200) DEFAULT NULL,
  `special_discount` varchar(200) DEFAULT NULL,
  `vat` varchar(200) DEFAULT NULL,
  `net_amount` varchar(200) DEFAULT NULL,
  `round_off` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) DEFAULT NULL,
  `advance_amount` varchar(200) DEFAULT NULL,
  `due_amount` int(200) DEFAULT NULL,
  `status` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `group_name`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'dashboard.view', 'admin', '2023-06-02 11:31:35', '2023-06-02 11:31:35'),
(2, 'dashboard', 'dashboard.edit', 'admin', '2023-06-02 11:31:35', '2023-06-02 11:31:35'),
(3, 'walkByPatient', 'walkByPatientAdd', 'admin', '2023-06-02 11:31:35', '2023-06-02 11:31:35'),
(4, 'walkByPatient', 'walkByPatientView', 'admin', '2023-06-02 11:31:36', '2023-06-02 11:31:36'),
(5, 'walkByPatient', 'walkByPatientDelete', 'admin', '2023-06-02 11:31:36', '2023-06-02 11:31:36'),
(6, 'walkByPatient', 'walkByPatientUpdate', 'admin', '2023-06-02 11:31:36', '2023-06-02 11:31:36'),
(7, 'patient', 'patientAdd', 'admin', '2023-06-02 11:31:36', '2023-06-02 11:31:36'),
(8, 'patient', 'patientView', 'admin', '2023-06-02 11:31:36', '2023-06-02 11:31:36'),
(9, 'patient', 'patientDelete', 'admin', '2023-06-02 11:31:36', '2023-06-02 11:31:36'),
(10, 'patient', 'patientUpdate', 'admin', '2023-06-02 11:31:37', '2023-06-02 11:31:37'),
(11, 'patientAdmit', 'patientAdmitAdd', 'admin', '2023-06-02 11:31:37', '2023-06-02 11:31:37'),
(12, 'patientAdmit', 'patientAdmitView', 'admin', '2023-06-02 11:31:37', '2023-06-02 11:31:37'),
(13, 'patientAdmit', 'patientAdmitDelete', 'admin', '2023-06-02 11:31:38', '2023-06-02 11:31:38'),
(14, 'patientAdmit', 'patientAdmitUpdate', 'admin', '2023-06-02 11:31:38', '2023-06-02 11:31:38'),
(15, 'doctor', 'doctorAdd', 'admin', '2023-06-02 11:31:38', '2023-06-02 11:31:38'),
(16, 'doctor', 'doctorView', 'admin', '2023-06-02 11:31:38', '2023-06-02 11:31:38'),
(17, 'doctor', 'doctorDelete', 'admin', '2023-06-02 11:31:39', '2023-06-02 11:31:39'),
(18, 'doctor', 'doctorUpdate', 'admin', '2023-06-02 11:31:39', '2023-06-02 11:31:39'),
(19, 'systemInformation', 'systemInformationAdd', 'admin', '2023-06-02 11:31:39', '2023-06-02 11:31:39'),
(20, 'systemInformation', 'systemInformationView', 'admin', '2023-06-02 11:31:39', '2023-06-02 11:31:39'),
(21, 'systemInformation', 'systemInformationDelete', 'admin', '2023-06-02 11:31:39', '2023-06-02 11:31:39'),
(22, 'systemInformation', 'systemInformationUpdate', 'admin', '2023-06-02 11:31:39', '2023-06-02 11:31:39'),
(23, 'user', 'userAdd', 'admin', '2023-06-02 11:31:40', '2023-06-02 11:31:40'),
(24, 'user', 'userView', 'admin', '2023-06-02 11:31:40', '2023-06-02 11:31:40'),
(25, 'user', 'userDelete', 'admin', '2023-06-02 11:31:40', '2023-06-02 11:31:40'),
(26, 'user', 'userUpdate', 'admin', '2023-06-02 11:31:40', '2023-06-02 11:31:40'),
(27, 'role', 'roleAdd', 'admin', '2023-06-02 11:31:40', '2023-06-02 11:31:40'),
(28, 'role', 'roleView', 'admin', '2023-06-02 11:31:41', '2023-06-02 11:31:41'),
(29, 'role', 'roleDelete', 'admin', '2023-06-02 11:31:41', '2023-06-02 11:31:41'),
(30, 'role', 'roleUpdate', 'admin', '2023-06-02 11:31:41', '2023-06-02 11:31:41'),
(31, 'permission', 'permissionAdd', 'admin', '2023-06-02 11:31:41', '2023-06-02 11:31:41'),
(32, 'permission', 'permissionView', 'admin', '2023-06-02 11:31:41', '2023-06-02 11:31:41'),
(33, 'permission', 'permissionDelete', 'admin', '2023-06-02 11:31:42', '2023-06-02 11:31:42'),
(34, 'permission', 'permissionUpdate', 'admin', '2023-06-02 11:31:42', '2023-06-02 11:31:42'),
(35, 'profile', 'profile.view', 'admin', '2023-06-02 11:31:42', '2023-06-02 11:31:42'),
(36, 'profile', 'profile.edit', 'admin', '2023-06-02 11:31:42', '2023-06-02 11:31:42'),
(37, 'staff', 'staffAdd', 'admin', '2023-06-02 11:31:42', '2023-06-02 11:31:42'),
(38, 'staff', 'staffView', 'admin', '2023-06-02 11:31:43', '2023-06-02 11:31:43'),
(39, 'staff', 'staffDelete', 'admin', '2023-06-02 11:31:43', '2023-06-02 11:31:43'),
(40, 'staff', 'staffUpdate', 'admin', '2023-06-02 11:31:43', '2023-06-02 11:31:43'),
(41, 'reward', 'rewardAdd', 'admin', '2023-06-02 11:31:43', '2023-06-02 11:31:43'),
(42, 'reward', 'rewardView', 'admin', '2023-06-02 11:31:43', '2023-06-02 11:31:43'),
(43, 'reward', 'rewardDelete', 'admin', '2023-06-02 11:31:43', '2023-06-02 11:31:43'),
(44, 'reward', 'rewardUpdate', 'admin', '2023-06-02 11:31:44', '2023-06-02 11:31:44'),
(45, 'therapist', 'therapistAdd', 'admin', '2023-06-02 11:31:44', '2023-06-02 11:31:44'),
(46, 'therapist', 'therapistView', 'admin', '2023-06-02 11:31:44', '2023-06-02 11:31:44'),
(47, 'therapist', 'therapistDelete', 'admin', '2023-06-02 11:31:44', '2023-06-02 11:31:44'),
(48, 'therapist', 'therapistUpdate', 'admin', '2023-06-02 11:31:44', '2023-06-02 11:31:44'),
(49, 'dietCharts', 'dietChartsAdd', 'admin', '2023-06-02 11:31:45', '2023-06-02 11:31:45'),
(50, 'dietCharts', 'dietChartsView', 'admin', '2023-06-02 11:31:45', '2023-06-02 11:31:45'),
(51, 'dietCharts', 'dietChartsDelete', 'admin', '2023-06-02 11:31:45', '2023-06-02 11:31:45'),
(52, 'dietCharts', 'dietChartsUpdate', 'admin', '2023-06-02 11:31:45', '2023-06-02 11:31:45'),
(53, 'medicineLists', 'medicineListsAdd', 'admin', '2023-06-02 11:31:46', '2023-06-02 11:31:46'),
(54, 'medicineLists', 'medicineListsView', 'admin', '2023-06-02 11:31:46', '2023-06-02 11:31:46'),
(55, 'medicineLists', 'medicineListsDelete', 'admin', '2023-06-02 11:31:46', '2023-06-02 11:31:46'),
(56, 'medicineLists', 'medicineListsUpdate', 'admin', '2023-06-02 11:31:46', '2023-06-02 11:31:46'),
(57, 'healthSupplements', 'healthSupplementsAdd', 'admin', '2023-06-02 11:31:47', '2023-06-02 11:31:47'),
(58, 'healthSupplements', 'healthSupplementsView', 'admin', '2023-06-02 11:31:47', '2023-06-02 11:31:47'),
(59, 'healthSupplements', 'healthSupplementsDelete', 'admin', '2023-06-02 11:31:47', '2023-06-02 11:31:47'),
(60, 'healthSupplements', 'healthSupplementsUpdate', 'admin', '2023-06-02 11:31:47', '2023-06-02 11:31:47'),
(61, 'therapyIngredients', 'therapyIngredientsAdd', 'admin', '2023-06-02 11:31:47', '2023-06-02 11:31:47'),
(62, 'therapyIngredients', 'therapyIngredientsView', 'admin', '2023-06-02 11:31:48', '2023-06-02 11:31:48'),
(63, 'therapyIngredients', 'therapyIngredientsDelete', 'admin', '2023-06-02 11:31:48', '2023-06-02 11:31:48'),
(64, 'therapyIngredients', 'therapyIngredientsUpdate', 'admin', '2023-06-02 11:31:48', '2023-06-02 11:31:48'),
(65, 'therapyLists', 'therapyListsAdd', 'admin', '2023-06-02 11:31:48', '2023-06-02 11:31:48'),
(66, 'therapyLists', 'therapyListsView', 'admin', '2023-06-02 11:31:49', '2023-06-02 11:31:49'),
(67, 'therapyLists', 'therapyListsDelete', 'admin', '2023-06-02 11:31:49', '2023-06-02 11:31:49'),
(68, 'therapyLists', 'therapyListsUpdate', 'admin', '2023-06-02 11:31:49', '2023-06-02 11:31:49'),
(69, 'doctorWaitingList', 'doctorWaitingListAdd', 'admin', '2023-06-02 11:31:50', '2023-06-02 11:31:50'),
(70, 'doctorWaitingList', 'doctorWaitingListView', 'admin', '2023-06-02 11:31:50', '2023-06-02 11:31:50'),
(71, 'doctorWaitingList', 'doctorWaitingListDelete', 'admin', '2023-06-02 11:31:50', '2023-06-02 11:31:50'),
(72, 'doctorWaitingList', 'doctorWaitingListUpdate', 'admin', '2023-06-02 11:31:51', '2023-06-02 11:31:51'),
(73, 'patientPrescriptionList', 'patientPrescriptionListAdd', 'admin', '2023-06-02 11:31:51', '2023-06-02 11:31:51'),
(74, 'patientPrescriptionList', 'patientPrescriptionListView', 'admin', '2023-06-02 11:31:51', '2023-06-02 11:31:51'),
(75, 'patientPrescriptionList', 'patientPrescriptionListDelete', 'admin', '2023-06-02 11:31:51', '2023-06-02 11:31:51'),
(76, 'patientPrescriptionList', 'patientPrescriptionListUpdate', 'admin', '2023-06-02 11:31:52', '2023-06-02 11:31:52'),
(77, 'Billing', 'BillingAdd', 'admin', '2023-06-02 11:31:52', '2023-06-02 11:31:52'),
(78, 'Billing', 'BillingView', 'admin', '2023-06-02 11:31:52', '2023-06-02 11:31:52'),
(79, 'Billing', 'BillingDelete', 'admin', '2023-06-02 11:31:53', '2023-06-02 11:31:53'),
(80, 'Billing', 'BillingUpdate', 'admin', '2023-06-02 11:31:53', '2023-06-02 11:31:53'),
(81, 'revisedBilling', 'revisedBillingAdd', 'admin', '2023-06-02 11:31:53', '2023-06-02 11:31:53'),
(82, 'revisedBilling', 'revisedBillingView', 'admin', '2023-06-02 11:31:53', '2023-06-02 11:31:53'),
(83, 'revisedBilling', 'revisedBillingDelete', 'admin', '2023-06-02 11:31:53', '2023-06-02 11:31:53'),
(84, 'revisedBilling', 'revisedBillingUpdate', 'admin', '2023-06-02 11:31:54', '2023-06-02 11:31:54'),
(85, 'therapyAppointment', 'therapyAppointmentAdd', 'admin', '2023-06-02 11:31:54', '2023-06-02 11:31:54'),
(86, 'therapyAppointment', 'therapyAppointmentView', 'admin', '2023-06-02 11:31:54', '2023-06-02 11:31:54'),
(87, 'therapyAppointment', 'therapyAppointmentDelete', 'admin', '2023-06-02 11:31:54', '2023-06-02 11:31:54'),
(88, 'therapyAppointment', 'therapyAppointmentUpdate', 'admin', '2023-06-02 11:31:54', '2023-06-02 11:31:54'),
(89, 'walkByPatientTherapy', 'walkByPatientTherapyAdd', 'admin', '2023-06-02 11:31:55', '2023-06-02 11:31:55'),
(90, 'walkByPatientTherapy', 'walkByPatientTherapyView', 'admin', '2023-06-02 11:31:55', '2023-06-02 11:31:55'),
(91, 'walkByPatientTherapy', 'walkByPatientTherapyDelete', 'admin', '2023-06-02 11:31:55', '2023-06-02 11:31:55'),
(92, 'walkByPatientTherapy', 'walkByPatientTherapyUpdate', 'admin', '2023-06-02 11:31:55', '2023-06-02 11:31:55'),
(93, 'doctorAppointment', 'doctorAppointmentAdd', 'admin', '2023-06-02 11:31:55', '2023-06-02 11:31:55'),
(94, 'doctorAppointment', 'doctorAppointmentView', 'admin', '2023-06-02 11:31:55', '2023-06-02 11:31:55'),
(95, 'doctorAppointment', 'doctorAppointmentDelete', 'admin', '2023-06-02 11:31:56', '2023-06-02 11:31:56'),
(96, 'doctorAppointment', 'doctorAppointmentUpdate', 'admin', '2023-06-02 11:31:56', '2023-06-02 11:31:56'),
(97, 'package', 'packageAdd', 'admin', '2023-06-02 11:31:56', '2023-06-02 11:31:56'),
(98, 'package', 'packageView', 'admin', '2023-06-02 11:31:56', '2023-06-02 11:31:56'),
(99, 'package', 'packageDelete', 'admin', '2023-06-02 11:31:56', '2023-06-02 11:31:56'),
(100, 'package', 'packageUpdate', 'admin', '2023-06-02 11:31:57', '2023-06-02 11:31:57'),
(101, 'powder', 'powderAdd', 'admin', '2023-06-02 11:31:57', '2023-06-02 11:31:57'),
(102, 'powder', 'powderView', 'admin', '2023-06-02 11:31:57', '2023-06-02 11:31:57'),
(103, 'powder', 'powderDelete', 'admin', '2023-06-02 11:31:57', '2023-06-02 11:31:57'),
(104, 'powder', 'powderUpdate', 'admin', '2023-06-02 11:31:58', '2023-06-02 11:31:58'),
(105, 'treatMentChart', 'treatMentChartAdd', 'admin', '2023-06-02 11:31:58', '2023-06-02 11:31:58'),
(106, 'treatMentChart', 'treatMentChartView', 'admin', '2023-06-02 11:31:58', '2023-06-02 11:31:58'),
(107, 'treatMentChart', 'treatMentChartDelete', 'admin', '2023-06-02 11:31:58', '2023-06-02 11:31:58'),
(108, 'treatMentChart', 'treatMentChartUpdate', 'admin', '2023-06-02 11:31:58', '2023-06-02 11:31:58'),
(109, 'therapyPackages', 'therapyPackagesAdd', 'admin', '2023-06-02 11:31:59', '2023-06-02 11:31:59'),
(110, 'therapyPackages', 'therapyPackagesView', 'admin', '2023-06-02 11:31:59', '2023-06-02 11:31:59'),
(111, 'therapyPackages', 'therapyPackagesDelete', 'admin', '2023-06-02 11:31:59', '2023-06-02 11:31:59'),
(112, 'therapyPackages', 'therapyPackagesUpdate', 'admin', '2023-06-02 11:31:59', '2023-06-02 11:31:59'),
(113, 'agreementFormOne', 'agreementFormOneAdd', 'admin', '2023-06-02 11:32:00', '2023-06-02 11:32:00'),
(114, 'agreementFormOne', 'agreementFormOneView', 'admin', '2023-06-02 11:32:00', '2023-06-02 11:32:00'),
(115, 'agreementFormOne', 'agreementFormOneDelete', 'admin', '2023-06-02 11:32:00', '2023-06-02 11:32:00'),
(116, 'agreementFormOne', 'agreementFormOneUpdate', 'admin', '2023-06-02 11:32:00', '2023-06-02 11:32:00'),
(117, 'agreementFormTwo', 'agreementFormTwoAdd', 'admin', '2023-06-02 11:32:01', '2023-06-02 11:32:01'),
(118, 'agreementFormTwo', 'agreementFormTwoView', 'admin', '2023-06-02 11:32:01', '2023-06-02 11:32:01'),
(119, 'agreementFormTwo', 'agreementFormTwoDelete', 'admin', '2023-06-02 11:32:01', '2023-06-02 11:32:01'),
(120, 'agreementFormTwo', 'agreementFormTwoUpdate', 'admin', '2023-06-02 11:32:02', '2023-06-02 11:32:02'),
(121, 'agreementFormThree', 'agreementFormThreeAdd', 'admin', '2023-06-02 11:32:02', '2023-06-02 11:32:02'),
(122, 'agreementFormThree', 'agreementFormThreeView', 'admin', '2023-06-02 11:32:02', '2023-06-02 11:32:02'),
(123, 'agreementFormThree', 'agreementFormThreeDelete', 'admin', '2023-06-02 11:32:02', '2023-06-02 11:32:02'),
(124, 'agreementFormThree', 'agreementFormThreeUpdate', 'admin', '2023-06-02 11:32:02', '2023-06-02 11:32:02'),
(125, 'medicineEquipment', 'medicineEquipmentAdd', 'admin', '2023-06-02 11:32:03', '2023-06-02 11:32:03'),
(126, 'medicineEquipment', 'medicineEquipmentView', 'admin', '2023-06-02 11:32:03', '2023-06-02 11:32:03'),
(127, 'medicineEquipment', 'medicineEquipmentDelete', 'admin', '2023-06-02 11:32:03', '2023-06-02 11:32:03'),
(128, 'medicineEquipment', 'medicineEquipmentUpdate', 'admin', '2023-06-02 11:32:04', '2023-06-02 11:32:04'),
(129, 'Inventory', 'inventoryAdd', 'admin', NULL, NULL),
(130, 'Inventory', 'inventoryView', 'admin', NULL, NULL),
(131, 'Inventory', 'inventoryDelete', 'admin', NULL, NULL),
(132, 'Inventory', 'inventoryUpdate', 'admin', NULL, NULL),
(133, 'inventory Category', 'inventoryCategoryAdd', 'admin', NULL, NULL),
(134, 'inventory Category', 'inventoryCategoryView', 'admin', NULL, NULL),
(135, 'inventory Category', 'inventoryCategoryDelete', 'admin', NULL, NULL),
(136, 'inventory Category', 'inventoryCategoryUpdate', 'admin', NULL, NULL),
(137, 'Therapy Maker', 'therapyMakerAdd', 'admin', NULL, NULL),
(138, 'Therapy Maker', 'therapyMakerView', 'admin', NULL, NULL),
(139, 'Therapy Maker', 'therapyMakerDelete', 'admin', NULL, NULL),
(140, 'Therapy Maker', 'therapyMakerUpdate', 'admin', NULL, NULL),
(141, 'facialInfoList', 'facialInfoListAdd', 'admin', NULL, NULL),
(142, 'facialInfoList', 'facialInfoListView', 'admin', NULL, NULL),
(143, 'facialInfoList', 'facialInfoListDelete', 'admin', NULL, NULL),
(144, 'facialInfoList', 'facialInfoListUpdate', 'admin', NULL, NULL),
(145, 'facePack', 'facePackAdd', 'admin', NULL, NULL),
(146, 'facePack', 'facePackView', 'admin', NULL, NULL),
(147, 'facePack', 'facePackDelete', 'admin', NULL, NULL),
(148, 'facePack', 'facePackUpdate', 'admin', NULL, NULL),
(149, 'facePackAppoinment', 'facePackAppoinmentAdd', 'admin', NULL, NULL),
(150, 'facePackAppoinment', 'facePackAppoinmentView', 'admin', NULL, NULL),
(151, 'facePackAppoinment', 'facePackAppoinmentDelete', 'admin', NULL, NULL),
(152, 'facePackAppoinment', 'facePackAppoinmentUpdate', 'admin', NULL, NULL),
(153, 'inventoryName', 'inventoryNameAdd', 'admin', NULL, NULL),
(154, 'inventoryName', 'inventoryNameView', 'admin', NULL, NULL),
(155, 'inventoryName', 'inventoryNameDelete', 'admin', NULL, NULL),
(156, 'inventoryName', 'inventoryNameUpdate', 'admin', NULL, NULL),
(157, 'all_therapry', 'all_therapryAdd', 'admin', NULL, NULL),
(158, 'all_therapry', 'all_therapryView', 'admin', NULL, NULL),
(159, 'discount', 'discount.Add', 'admin', NULL, NULL),
(160, 'discount', 'discount.View', 'admin', NULL, NULL),
(161, 'discount', 'discount.Delete', 'admin', NULL, NULL),
(162, 'discount', 'discount.Update', 'admin', NULL, NULL),
(163, 'vat', 'vatAdd', 'admin', NULL, NULL),
(164, 'vat', 'vatView', 'admin', NULL, NULL),
(165, 'vat', 'vatDelete', 'admin', NULL, NULL),
(166, 'vat', 'vatUpdate', 'admin', NULL, NULL),
(167, 'inventoryDamage', 'inventoryDamageAdd', 'admin', NULL, NULL),
(168, 'inventoryDamage', 'inventoryDamageView', 'admin', NULL, NULL),
(169, 'inventoryDamage', 'inventoryDamageDelete', 'admin', NULL, NULL),
(170, 'inventoryDamage', 'inventoryDamageUpdate', 'admin', NULL, NULL),
(171, 'receptioninsTherapy', 'receptioninsTherapyView', 'admin', NULL, NULL),
(172, 'otherEquipment', 'otherEquipmentAdd', 'admin', NULL, NULL),
(173, 'otherEquipment', 'otherEquipmentView', 'admin', NULL, NULL),
(174, 'otherEquipment', 'otherEquipmentDelete', 'admin', NULL, NULL),
(175, 'otherEquipment', 'otherEquipmentUpdate', 'admin', NULL, NULL),
(176, 'signatureTherapy', 'signatureTherapyAdd', 'admin', NULL, NULL),
(177, 'signatureTherapy', 'signatureTherapyView', 'admin', NULL, NULL),
(178, 'signatureTherapy', 'signatureTherapyDelete', 'admin', NULL, NULL),
(179, 'signatureTherapy', 'signatureTherapyUpdate', 'admin', NULL, NULL),
(180, 'inventoryMixer', 'inventoryMixerAdd', 'admin', NULL, NULL),
(181, 'inventoryMixer', 'inventoryMixerView', 'admin', NULL, NULL),
(182, 'inventoryMixer', 'inventoryMixerDelete', 'admin', NULL, NULL),
(183, 'inventoryMixer', 'inventoryMixerUpdate', 'admin', NULL, NULL);

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
-- Table structure for table `powders`
--

CREATE TABLE `powders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `medicine_equipment_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `reward_for` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  `in_exchange` varchar(255) NOT NULL,
  `amount` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2023-06-02 11:31:34', '2023-06-02 11:31:34'),
(2, 'admin', 'admin', '2023-06-02 11:31:35', '2023-06-02 11:31:35'),
(3, 'therapist', 'admin', '2023-06-02 11:31:35', '2023-06-02 11:31:35'),
(4, 'staff', 'admin', '2023-06-02 11:31:35', '2023-06-02 11:31:35'),
(5, 'TherapyMaker', 'admin', '2023-07-23 04:09:49', '2023-07-23 04:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 5),
(2, 1),
(2, 5),
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
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(137, 5),
(138, 1),
(138, 5),
(139, 1),
(139, 5),
(140, 1),
(140, 5),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sign_packages`
--

CREATE TABLE `sign_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `historyId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `single_ingredients`
--

CREATE TABLE `single_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapy_appointment_detail_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_name` varchar(255) NOT NULL,
  `quantity` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `snote` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_or_mobile_number` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `nid_number` varchar(25) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `years_of_experience` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_information`
--

CREATE TABLE `system_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_information`
--

INSERT INTO `system_information` (`id`, `name`, `phone`, `email`, `address`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Ayurveda', '1111', 'a@gmail.com', 'dhaka', 'public/uploads/168995209220230721168407259320230514mlogo.png', 'public/uploads/1689864990202307201684385845202305181681112187.png', '2023-07-20 08:56:31', '2023-07-21 09:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `therapists`
--

CREATE TABLE `therapists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_or_mobile_number` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `nid_number` varchar(25) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `years_of_experience` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapy_appointments`
--

CREATE TABLE `therapy_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `history_id` varchar(200) DEFAULT NULL,
  `patient_type` varchar(255) DEFAULT NULL,
  `status` varchar(110) DEFAULT NULL,
  `signavailable` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapy_appointment_date_and_times`
--

CREATE TABLE `therapy_appointment_date_and_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapy_appointment_id` bigint(20) UNSIGNED NOT NULL,
  `therapist` varchar(255) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `face_pack_status` varchar(150) DEFAULT NULL,
  `patient_id` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `signavailable` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapy_appointment_details`
--

CREATE TABLE `therapy_appointment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapy_appointment_id` bigint(20) UNSIGNED NOT NULL,
  `therapy_name` varchar(255) NOT NULL,
  `name` text DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `signavailable` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapy_details`
--

CREATE TABLE `therapy_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapy_list_id` bigint(20) UNSIGNED NOT NULL,
  `therapy_ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `mainnote` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapy_details`
--

INSERT INTO `therapy_details` (`id`, `therapy_list_id`, `therapy_ingredient_id`, `quantity`, `unit`, `mainnote`, `created_at`, `updated_at`) VALUES
(13, 6, 9, '200', 'Ml', NULL, '2023-11-03 02:39:41', '2023-11-03 02:39:41'),
(14, 6, 10, '2', 'Gram', NULL, '2023-11-03 02:39:41', '2023-11-03 02:39:41'),
(15, 6, 11, '4', 'Gram', NULL, '2023-11-03 02:39:41', '2023-11-03 02:39:41'),
(16, 6, 12, '1', 'Piece', NULL, '2023-11-03 02:39:41', '2023-11-03 02:39:41'),
(17, 6, 13, '15', 'Ml', NULL, '2023-11-03 02:39:41', '2023-11-03 02:39:41'),
(18, 6, 14, '50', 'Gram', NULL, '2023-11-03 02:39:41', '2023-11-03 02:39:41'),
(19, 7, 15, '10', 'Gram', NULL, '2023-11-03 02:43:37', '2023-11-03 02:43:37'),
(20, 7, 16, '5', 'Gram', NULL, '2023-11-03 02:43:37', '2023-11-03 02:43:37'),
(21, 7, 17, '1', 'Piece', NULL, '2023-11-03 02:43:37', '2023-11-03 02:43:37'),
(22, 7, 18, '10', 'Piece', NULL, '2023-11-03 02:43:37', '2023-11-03 02:43:37'),
(23, 8, 19, '300', 'Ml', NULL, '2023-11-03 02:47:00', '2023-11-03 02:47:00'),
(24, 8, 20, '250', 'Gram', NULL, '2023-11-03 02:47:00', '2023-11-03 02:47:00'),
(25, 8, 11, '4', 'Gram', NULL, '2023-11-03 02:47:00', '2023-11-03 02:47:00'),
(26, 8, 10, '2', 'Gram', NULL, '2023-11-03 02:47:00', '2023-11-03 02:47:00'),
(27, 8, 21, '6', 'Gram', NULL, '2023-11-03 02:47:00', '2023-11-03 02:47:00'),
(28, 8, 18, '10', 'Piece', NULL, '2023-11-03 02:47:00', '2023-11-03 02:47:00'),
(29, 9, 19, '300', 'Ml', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(30, 9, 10, '10', 'Gram', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(31, 9, 22, '3', 'Piece', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(32, 9, 23, '.25', 'Piece', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(33, 9, 24, '4', 'Gram', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(34, 9, 25, '4', 'Gram', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(35, 9, 26, '2', 'Piece', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(36, 9, 13, '15', 'Ml', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(37, 9, 14, '60', 'Gram', NULL, '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(38, 10, 29, '3000', 'Ml', NULL, '2023-11-03 02:55:07', '2023-11-03 02:55:07'),
(39, 10, 30, '20', 'Gram', NULL, '2023-11-03 02:55:07', '2023-11-03 02:55:07'),
(40, 10, 31, '20', 'Gram', NULL, '2023-11-03 02:55:07', '2023-11-03 02:55:07'),
(41, 10, 12, '1', 'Piece', NULL, '2023-11-03 02:55:07', '2023-11-03 02:55:07'),
(42, 11, 19, '500', 'Piece', NULL, '2023-11-03 02:57:12', '2023-11-03 02:57:12'),
(43, 11, 20, '300', 'Gram', NULL, '2023-11-03 02:57:12', '2023-11-03 02:57:12'),
(44, 11, 11, '2', 'Gram', NULL, '2023-11-03 02:57:12', '2023-11-03 02:57:12'),
(45, 11, 10, '2', 'Gram', NULL, '2023-11-03 02:57:12', '2023-11-03 02:57:12'),
(46, 11, 21, '6', 'Gram', NULL, '2023-11-03 02:57:12', '2023-11-03 02:57:12'),
(47, 11, 18, '10', 'Piece', NULL, '2023-11-03 02:57:12', '2023-11-03 02:57:12'),
(48, 12, 19, '50', 'Ml', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(49, 12, 32, '50', 'Ml', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(50, 12, 25, '10', 'Gram', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(51, 12, 33, '200', 'Ml', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(52, 12, 34, '10', 'Gram', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(53, 12, 15, '10', 'Gram', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(54, 12, 35, '10', 'Gram', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(55, 12, 36, '10', 'Ml', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(56, 12, 37, '10', 'Gram', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(57, 12, 38, '10', 'Gram', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(58, 12, 39, '10', 'Gram', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(59, 12, 10, '10', 'Gram', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(60, 12, 18, '10', 'Piece', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(61, 12, 40, '1', 'Piece', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(62, 12, 41, '2', 'Piece', NULL, '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(63, 13, 19, '400', 'Ml', NULL, '2023-11-03 03:08:54', '2023-11-03 03:08:54'),
(64, 13, 20, '400', 'Gram', NULL, '2023-11-03 03:08:54', '2023-11-03 03:08:54'),
(65, 13, 11, '2', 'Gram', NULL, '2023-11-03 03:08:54', '2023-11-03 03:08:54'),
(66, 13, 10, '2', 'Gram', NULL, '2023-11-03 03:08:54', '2023-11-03 03:08:54'),
(67, 13, 21, '6', 'Gram', NULL, '2023-11-03 03:08:54', '2023-11-03 03:08:54'),
(68, 13, 18, '10', 'Piece', NULL, '2023-11-03 03:08:54', '2023-11-03 03:08:54'),
(75, 14, 29, '200', 'Ml', NULL, '2023-11-03 03:11:30', '2023-11-03 03:11:30'),
(76, 14, 42, '5', 'Gram', NULL, '2023-11-03 03:11:30', '2023-11-03 03:11:30'),
(77, 14, 43, '5', 'Gram', NULL, '2023-11-03 03:11:30', '2023-11-03 03:11:30'),
(78, 14, 38, '5', 'Gram', NULL, '2023-11-03 03:11:30', '2023-11-03 03:11:30'),
(79, 14, 18, '2', 'Piece', NULL, '2023-11-03 03:11:30', '2023-11-03 03:11:30'),
(80, 14, 28, '1', 'Piece', NULL, '2023-11-03 03:11:30', '2023-11-03 03:11:30'),
(81, 14, 44, '400', 'Ml', NULL, '2023-11-03 03:11:30', '2023-11-03 03:11:30'),
(82, 15, 19, '100', 'Ml', NULL, '2023-11-03 03:13:15', '2023-11-03 03:13:15'),
(83, 15, 45, '4', 'Piece', NULL, '2023-11-03 03:13:15', '2023-11-03 03:13:15'),
(84, 15, 46, '50', 'Gram', NULL, '2023-11-03 03:13:15', '2023-11-03 03:13:15'),
(85, 15, 12, '1', 'Piece', NULL, '2023-11-03 03:13:15', '2023-11-03 03:13:15'),
(86, 16, 47, '50', 'Gram', NULL, '2023-11-03 03:14:28', '2023-11-03 03:14:28'),
(87, 16, 48, '50', 'Gram', NULL, '2023-11-03 03:14:28', '2023-11-03 03:14:28'),
(88, 16, 25, '20', 'Gram', NULL, '2023-11-03 03:14:28', '2023-11-03 03:14:28'),
(89, 17, 9, '200', 'Ml', NULL, '2023-11-03 03:16:16', '2023-11-03 03:16:16'),
(90, 17, 12, '1', 'Piece', NULL, '2023-11-03 03:16:16', '2023-11-03 03:16:16'),
(91, 17, 13, '15', 'Ml', NULL, '2023-11-03 03:16:16', '2023-11-03 03:16:16'),
(92, 17, 14, '50', 'Gram', NULL, '2023-11-03 03:16:16', '2023-11-03 03:16:16'),
(93, 18, 19, '200', 'Piece', NULL, '2023-11-03 06:04:31', '2023-11-03 06:04:31'),
(94, 18, 41, '2', 'Piece', NULL, '2023-11-03 06:04:31', '2023-11-03 06:04:31'),
(95, 18, 18, '1', 'Piece', NULL, '2023-11-03 06:04:31', '2023-11-03 06:04:31'),
(96, 18, 49, '1', 'Piece', NULL, '2023-11-03 06:04:31', '2023-11-03 06:04:31'),
(97, 18, 50, '1', 'Piece', NULL, '2023-11-03 06:04:31', '2023-11-03 06:04:31'),
(109, 19, 19, '400', 'Piece', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(110, 19, 45, '4', 'Piece', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(111, 19, 51, '12', 'Piece', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(112, 19, 22, '3', 'Piece', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(113, 19, 10, '6', 'Gram', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(114, 19, 23, '.25', 'Piece', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(115, 19, 27, '5', 'Gram', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(116, 19, 17, '4', 'Piece', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(117, 19, 28, '4', 'Piece', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(118, 19, 12, '1', 'Piece', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(119, 19, 13, '15', 'Ml', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(120, 19, 14, '50', 'Gram', NULL, '2023-11-03 06:07:45', '2023-11-03 06:07:45'),
(121, 20, 19, '400', 'Ml', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(122, 20, 45, '4', 'Gram', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(123, 20, 22, '3', 'Piece', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(124, 20, 10, '10', 'Gram', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(125, 20, 23, '.5', 'Piece', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(126, 20, 25, '10', 'Gram', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(127, 20, 27, '20', 'Gram', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(128, 20, 17, '2', 'Piece', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(129, 20, 28, '2', 'Piece', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(130, 20, 12, '1', 'Piece', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(131, 20, 13, '15', 'Ml', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(132, 20, 14, '60', 'Gram', NULL, '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(142, 21, 19, '100', 'Ml', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(143, 21, 52, '400', 'Gram', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(144, 21, 29, '1500', 'Ml', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(145, 21, 30, '10', 'Gram', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(146, 21, 31, '10', 'Gram', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(147, 21, 17, '4', 'Piece', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(148, 21, 28, '4', 'Piece', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(149, 21, 12, '1', 'Piece', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(150, 21, 13, '15', 'Ml', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(151, 21, 55, '10', 'Gram', NULL, '2023-11-03 06:12:20', '2023-11-03 06:12:20'),
(159, 22, 56, '10', 'Ml', NULL, '2023-11-03 06:19:24', '2023-11-03 06:19:24'),
(160, 22, 11, '2', 'Gram', NULL, '2023-11-03 06:19:24', '2023-11-03 06:19:24'),
(161, 22, 10, '2', 'Gram', NULL, '2023-11-03 06:19:24', '2023-11-03 06:19:24'),
(162, 22, 53, '16', 'Drops', NULL, '2023-11-03 06:19:24', '2023-11-03 06:19:24'),
(163, 22, 15, '34', 'Gram', NULL, '2023-11-03 06:19:24', '2023-11-03 06:19:24'),
(164, 22, 18, '2', 'Piece', NULL, '2023-11-03 06:19:24', '2023-11-03 06:19:24'),
(165, 22, 28, '1', 'Piece', NULL, '2023-11-03 06:19:24', '2023-11-03 06:19:24'),
(166, 23, 19, '3000', 'Ml', NULL, '2023-11-03 06:20:56', '2023-11-03 06:20:56'),
(167, 23, 18, '20', 'Piece', NULL, '2023-11-03 06:20:56', '2023-11-03 06:20:56'),
(168, 23, 12, '1', 'Piece', NULL, '2023-11-03 06:20:56', '2023-11-03 06:20:56'),
(169, 23, 13, '15', 'Ml', NULL, '2023-11-03 06:20:56', '2023-11-03 06:20:56'),
(170, 23, 14, '60', 'Gram', NULL, '2023-11-03 06:20:56', '2023-11-03 06:20:56'),
(171, 24, 54, '6', 'Piece', NULL, '2023-11-03 06:22:17', '2023-11-03 06:22:17'),
(172, 24, 17, '4', 'Piece', NULL, '2023-11-03 06:22:17', '2023-11-03 06:22:17'),
(173, 24, 28, '4', 'Piece', NULL, '2023-11-03 06:22:17', '2023-11-03 06:22:17'),
(174, 24, 9, '300', 'Ml', NULL, '2023-11-03 06:22:17', '2023-11-03 06:22:17'),
(175, 24, 12, '1', 'Piece', NULL, '2023-11-03 06:22:17', '2023-11-03 06:22:17'),
(176, 24, 13, '15', 'Ml', NULL, '2023-11-03 06:22:17', '2023-11-03 06:22:17'),
(177, 24, 14, '60', 'Gram', NULL, '2023-11-03 06:22:17', '2023-11-03 06:22:17'),
(178, 25, 19, '500', 'Ml', NULL, '2023-11-03 06:22:59', '2023-11-03 06:22:59'),
(179, 25, 18, '2', 'Piece', NULL, '2023-11-03 06:22:59', '2023-11-03 06:22:59'),
(184, 26, 19, '2000', 'Ml', NULL, '2023-11-03 06:24:42', '2023-11-03 06:24:42'),
(185, 26, 18, '2', 'Piece', NULL, '2023-11-03 06:24:42', '2023-11-03 06:24:42'),
(186, 26, 28, '2', 'Piece', NULL, '2023-11-03 06:24:42', '2023-11-03 06:24:42'),
(187, 26, 13, '15', 'Piece', NULL, '2023-11-03 06:24:42', '2023-11-03 06:24:42'),
(188, 26, 57, '.25', 'Piece', NULL, '2023-11-03 06:24:42', '2023-11-03 06:24:42'),
(189, 27, 58, '10', 'Gram', NULL, '2023-11-03 06:47:01', '2023-11-03 06:47:01'),
(190, 27, 59, '500', 'Gram', NULL, '2023-11-03 06:47:01', '2023-11-03 06:47:01'),
(191, 27, 18, '2', 'Piece', NULL, '2023-11-03 06:47:01', '2023-11-03 06:47:01'),
(192, 27, 57, '.25', 'Piece', NULL, '2023-11-03 06:47:01', '2023-11-03 06:47:01'),
(193, 27, 28, '2', 'Piece', NULL, '2023-11-03 06:47:01', '2023-11-03 06:47:01'),
(194, 27, 13, '15', 'Ml', NULL, '2023-11-03 06:47:01', '2023-11-03 06:47:01'),
(195, 28, 45, '.5', 'Piece', NULL, '2023-11-03 06:48:47', '2023-11-03 06:48:47'),
(196, 28, 19, '200', 'Ml', NULL, '2023-11-03 06:48:47', '2023-11-03 06:48:47'),
(197, 28, 54, '3', 'Piece', NULL, '2023-11-03 06:48:47', '2023-11-03 06:48:47'),
(198, 28, 17, '2', 'Piece', NULL, '2023-11-03 06:48:47', '2023-11-03 06:48:47'),
(199, 28, 28, '2', 'Piece', NULL, '2023-11-03 06:48:47', '2023-11-03 06:48:47'),
(200, 29, 19, '200', 'Ml', NULL, '2023-11-03 06:49:36', '2023-11-03 06:49:36'),
(201, 29, 54, '3', 'Piece', NULL, '2023-11-03 06:49:36', '2023-11-03 06:49:36'),
(202, 29, 17, '2', 'Piece', NULL, '2023-11-03 06:49:36', '2023-11-03 06:49:36'),
(203, 29, 28, '2', 'Piece', NULL, '2023-11-03 06:49:36', '2023-11-03 06:49:36'),
(204, 30, 60, '60', 'Ml', NULL, '2023-11-03 06:50:25', '2023-11-03 06:50:25'),
(205, 30, 18, '10', 'Piece', NULL, '2023-11-03 06:50:25', '2023-11-03 06:50:25'),
(206, 30, 20, '200', 'Gram', NULL, '2023-11-03 06:50:25', '2023-11-03 06:50:25'),
(207, 30, 61, '20', 'Ml', NULL, '2023-11-03 06:50:25', '2023-11-03 06:50:25'),
(208, 31, 62, '20', 'Gram', NULL, '2023-11-03 06:52:10', '2023-11-03 06:52:10'),
(209, 31, 55, '20', 'Gram', NULL, '2023-11-03 06:52:10', '2023-11-03 06:52:10'),
(210, 31, 63, '60', 'Gram', NULL, '2023-11-03 06:52:10', '2023-11-03 06:52:10'),
(211, 31, 59, '1000', 'Gram', NULL, '2023-11-03 06:52:10', '2023-11-03 06:52:10'),
(212, 31, 12, '1', 'Piece', NULL, '2023-11-03 06:52:10', '2023-11-03 06:52:10'),
(213, 31, 14, '60', 'Gram', NULL, '2023-11-03 06:52:10', '2023-11-03 06:52:10'),
(214, 31, 13, '15', 'Ml', NULL, '2023-11-03 06:52:10', '2023-11-03 06:52:10'),
(215, 32, 71, '10', 'Gram', NULL, '2023-11-03 06:53:12', '2023-11-03 06:53:12'),
(216, 32, 28, '1', 'Piece', NULL, '2023-11-03 06:53:12', '2023-11-03 06:53:12'),
(217, 33, 64, '1', 'Piece', NULL, '2023-11-03 06:54:56', '2023-11-03 06:54:56'),
(218, 33, 45, '.5', 'Piece', NULL, '2023-11-03 06:54:56', '2023-11-03 06:54:56'),
(219, 33, 65, '1', 'Piece', NULL, '2023-11-03 06:54:56', '2023-11-03 06:54:56'),
(220, 33, 59, '100', 'Gram', NULL, '2023-11-03 06:54:56', '2023-11-03 06:54:56'),
(221, 33, 19, '60', 'Ml', NULL, '2023-11-03 06:54:56', '2023-11-03 06:54:56'),
(222, 33, 13, '15', 'Ml', NULL, '2023-11-03 06:54:56', '2023-11-03 06:54:56'),
(223, 34, 19, '600', 'Ml', NULL, '2023-11-03 06:56:20', '2023-11-03 06:56:20'),
(224, 34, 20, '500', 'Gram', NULL, '2023-11-03 06:56:20', '2023-11-03 06:56:20'),
(225, 34, 11, '2', 'Gram', NULL, '2023-11-03 06:56:20', '2023-11-03 06:56:20'),
(226, 34, 10, '2', 'Gram', NULL, '2023-11-03 06:56:20', '2023-11-03 06:56:20'),
(227, 34, 21, '10', 'Gram', NULL, '2023-11-03 06:56:20', '2023-11-03 06:56:20'),
(228, 34, 18, '10', 'Piece', NULL, '2023-11-03 06:56:20', '2023-11-03 06:56:20'),
(236, 35, 54, '6', 'Piece', NULL, '2023-11-03 06:59:46', '2023-11-03 06:59:46'),
(237, 35, 11, '10', 'Gram', NULL, '2023-11-03 06:59:46', '2023-11-03 06:59:46'),
(238, 35, 10, '5', 'Gram', NULL, '2023-11-03 06:59:46', '2023-11-03 06:59:46'),
(239, 35, 72, '1', 'Piece', NULL, '2023-11-03 06:59:46', '2023-11-03 06:59:46'),
(240, 35, 12, '1', 'Piece', NULL, '2023-11-03 06:59:46', '2023-11-03 06:59:46'),
(241, 35, 13, '15', 'Ml', NULL, '2023-11-03 06:59:46', '2023-11-03 06:59:46'),
(242, 35, 14, '60', 'Gram', NULL, '2023-11-03 06:59:46', '2023-11-03 06:59:46'),
(243, 35, 73, '3', 'Piece', NULL, '2023-11-03 06:59:46', '2023-11-03 06:59:46'),
(244, 36, 12, '1', 'Piece', NULL, '2023-11-03 07:00:54', '2023-11-03 07:00:54'),
(245, 36, 11, '10', 'Gram', NULL, '2023-11-03 07:00:54', '2023-11-03 07:00:54'),
(246, 36, 10, '5', 'Gram', NULL, '2023-11-03 07:00:54', '2023-11-03 07:00:54'),
(247, 37, 67, '50', 'Gram', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(248, 37, 74, '50', 'Gram', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(249, 37, 75, '20', 'Gram', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(250, 37, 61, '50', 'Ml', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(251, 37, 68, '20', 'Gram', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(252, 37, 69, '30', 'Gram', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(253, 37, 56, '50', 'Ml', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(254, 37, 59, '100', 'Gram', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(255, 37, 44, '10', 'Ml', NULL, '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(256, 38, 63, '10', 'Gram', NULL, '2023-11-03 07:05:18', '2023-11-03 07:05:18'),
(257, 38, 24, '10', 'Gram', NULL, '2023-11-03 07:05:18', '2023-11-03 07:05:18'),
(258, 38, 25, '10', 'Gram', NULL, '2023-11-03 07:05:18', '2023-11-03 07:05:18'),
(259, 38, 39, '10', 'Gram', NULL, '2023-11-03 07:05:18', '2023-11-03 07:05:18'),
(260, 38, 15, '10', 'Gram', NULL, '2023-11-03 07:05:18', '2023-11-03 07:05:18'),
(261, 38, 70, '2', 'Piece', NULL, '2023-11-03 07:05:18', '2023-11-03 07:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `therapy_ingredients`
--

CREATE TABLE `therapy_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapy_ingredients`
--

INSERT INTO `therapy_ingredients` (`id`, `name`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(9, 'Massage Oil', '20', 'Ml', '2023-11-03 00:14:35', '2023-11-03 00:14:35'),
(10, 'JOVIN', '20', 'Gram', '2023-11-03 00:15:24', '2023-11-03 00:15:24'),
(11, 'KAMPUR', '20', 'Gram', '2023-11-03 00:16:02', '2023-11-03 00:16:02'),
(12, 'Undergarments', '5', 'Piece', '2023-11-03 00:16:34', '2023-11-03 00:16:34'),
(13, 'Shampoo', '20', 'Ml', '2023-11-03 00:17:09', '2023-11-03 00:17:09'),
(14, 'Body scrub', '50', 'Gram', '2023-11-03 00:17:35', '2023-11-03 00:17:35'),
(15, 'Triphala', '20', 'Gram', '2023-11-03 02:40:32', '2023-11-03 02:59:26'),
(16, 'YESTHIMUDHU', '0', 'Gram', '2023-11-03 02:40:57', '2023-11-03 02:40:57'),
(17, 'Cloth', '0', 'Piece', '2023-11-03 02:41:26', '2023-11-03 02:41:26'),
(18, 'Cotton', '0', 'Piece', '2023-11-03 02:41:57', '2023-11-03 02:41:57'),
(19, 'Oil', '0', 'Ml', '2023-11-03 02:44:07', '2023-11-03 02:44:07'),
(20, 'Atta', '0', 'Gram', '2023-11-03 02:44:39', '2023-11-03 02:44:39'),
(21, 'Dasamul', '0', 'Gram', '2023-11-03 02:45:18', '2023-11-03 02:45:18'),
(22, 'Garlic', '0', 'Piece', '2023-11-03 02:47:38', '2023-11-03 02:47:38'),
(23, 'Coconut', '0', 'Piece', '2023-11-03 02:48:09', '2023-11-03 02:48:09'),
(24, 'TURMARIC', '0', 'Gram', '2023-11-03 02:48:26', '2023-11-03 02:48:26'),
(25, 'SALT', '0', 'Gram', '2023-11-03 02:48:43', '2023-11-03 02:48:43'),
(26, 'Leaf', '0', 'Piece', '2023-11-03 02:48:59', '2023-11-03 02:48:59'),
(27, 'Kizhi powder', '0', 'Gram', '2023-11-03 02:49:21', '2023-11-03 02:49:21'),
(28, 'Roshi', '0', 'Piece', '2023-11-03 02:49:38', '2023-11-03 02:49:38'),
(29, 'Milk', '0', 'Ml', '2023-11-03 02:53:00', '2023-11-03 02:53:00'),
(30, 'MUNJISTHA', '0', 'Gram', '2023-11-03 02:53:54', '2023-11-03 02:53:54'),
(31, 'RAKTACHANDAN', '0', 'Gram', '2023-11-03 02:54:18', '2023-11-03 02:54:18'),
(32, 'Honey', '0', 'Ml', '2023-11-03 02:57:36', '2023-11-03 02:57:36'),
(33, 'Gumutra', '0', 'Ml', '2023-11-03 02:57:53', '2023-11-03 02:57:53'),
(34, 'Gukshuradi', '0', 'Piece', '2023-11-03 02:58:37', '2023-11-03 02:58:37'),
(35, 'Punarnava', '0', 'Gram', '2023-11-03 02:59:54', '2023-11-03 02:59:54'),
(36, 'DASHMOOL KWATH', '0', 'Ml', '2023-11-03 03:00:20', '2023-11-03 03:00:20'),
(37, 'Triphala kwath', '0', 'Gram', '2023-11-03 03:00:54', '2023-11-03 03:00:54'),
(38, 'AWSHAGANDHA', '0', 'Gram', '2023-11-03 03:01:17', '2023-11-03 03:01:17'),
(39, 'Niguni', '0', 'Gram', '2023-11-03 03:01:48', '2023-11-03 03:01:48'),
(40, 'Kashayavasti bag', '0', 'Piece', '2023-11-03 03:02:16', '2023-11-03 03:02:16'),
(41, 'Gloves', '0', 'Piece', '2023-11-03 03:02:39', '2023-11-03 03:02:39'),
(42, 'SUNTHI', '0', 'Gram', '2023-11-03 03:06:52', '2023-11-03 03:06:52'),
(43, 'BRAMMI', '0', 'Gram', '2023-11-03 03:07:21', '2023-11-03 03:07:21'),
(44, 'Water', '0', 'Ml', '2023-11-03 03:11:11', '2023-11-03 03:11:11'),
(45, 'Lemon', '0', 'Piece', '2023-11-03 03:12:09', '2023-11-03 03:12:09'),
(46, 'Kwath powder', '0', 'Gram', '2023-11-03 03:12:27', '2023-11-03 03:12:27'),
(47, 'YESTHIMUDHU', '0', 'Piece', '2023-11-03 03:13:37', '2023-11-03 03:13:37'),
(48, 'MOURI', '0', 'Gram', '2023-11-03 03:13:50', '2023-11-03 03:13:50'),
(49, 'Catheter', '0', 'Piece', '2023-11-03 03:16:40', '2023-11-03 03:16:40'),
(50, 'Syringe', '0', 'Piece', '2023-11-03 03:17:08', '2023-11-03 03:17:08'),
(51, 'Egg', '0', 'Piece', '2023-11-03 03:17:43', '2023-11-03 03:17:43'),
(52, 'Navararice', '0', 'Gram', '2023-11-03 06:01:52', '2023-11-03 06:01:52'),
(53, 'Anu taila/KB 101/triphala ghee', '0', 'Drops', '2023-11-03 06:02:26', '2023-11-03 06:02:26'),
(54, 'K.K powder', '0', 'Piece', '2023-11-03 06:02:57', '2023-11-03 06:02:57'),
(55, 'Mutha', '0', 'Gram', '2023-11-03 06:12:08', '2023-11-03 06:12:08'),
(56, 'Olive oil', '0', 'Ml', '2023-11-03 06:19:10', '2023-11-03 06:19:10'),
(57, 'Eye pad', '0', 'Piece', '2023-11-03 06:24:15', '2023-11-03 06:24:15'),
(58, 'Takradhara powder', '0', 'Gram', '2023-11-03 06:25:39', '2023-11-03 06:25:39'),
(59, 'Curd', '0', 'Gram', '2023-11-03 06:25:57', '2023-11-03 06:25:57'),
(60, 'Triphala ghee', '0', 'Ml', '2023-11-03 06:26:19', '2023-11-03 06:26:19'),
(61, 'Rose water', '0', 'Ml', '2023-11-03 06:26:41', '2023-11-03 06:26:41'),
(62, 'Bala', '0', 'Gram', '2023-11-03 06:26:59', '2023-11-03 06:26:59'),
(63, 'Monjistha', '0', 'Gram', '2023-11-03 06:42:47', '2023-11-03 06:42:47'),
(64, 'Head pack', '1', 'Piece', '2023-11-03 06:43:06', '2023-11-03 06:43:06'),
(65, 'Banana', '0', 'Piece', '2023-11-03 06:43:25', '2023-11-03 06:43:25'),
(66, 'PANCHAVALKALA KWATHA', '0', 'Piece', '2023-11-03 06:43:55', '2023-11-03 06:43:55'),
(67, 'RICE POWDER', '0', 'Gram', '2023-11-03 06:44:19', '2023-11-03 06:44:19'),
(68, 'Tulsi', '0', 'Gram', '2023-11-03 06:44:33', '2023-11-03 06:44:33'),
(69, 'YESTHIMUDHU', '0', 'Gram', '2023-11-03 06:44:51', '2023-11-03 06:44:51'),
(70, 'Bandage', '0', 'Piece', '2023-11-03 06:45:12', '2023-11-03 06:45:12'),
(71, 'Amla', '0', 'Gram', '2023-11-03 06:52:43', '2023-11-03 06:52:43'),
(72, 'Shower cap', '0', 'Piece', '2023-11-03 06:57:23', '2023-11-03 06:57:23'),
(73, 'Mask', '0', 'Piece', '2023-11-03 06:59:16', '2023-11-03 06:59:16'),
(74, 'BESON', '0', 'Gram', '2023-11-03 07:01:39', '2023-11-03 07:01:39'),
(75, 'Holud', '0', 'Gram', '2023-11-03 07:02:06', '2023-11-03 07:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `therapy_ing_detail`
--

CREATE TABLE `therapy_ing_detail` (
  `id` int(11) NOT NULL,
  `main_name` varchar(255) DEFAULT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT '0',
  `unit` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT current_timestamp(),
  `updated_at` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `therapy_ing_detail`
--

INSERT INTO `therapy_ing_detail` (`id`, `main_name`, `cat_name`, `name`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(10, 'SAFFRON', NULL, 'LONG', '0', NULL, '2023-11-08 09:50:05', '2023-11-08 09:50:05'),
(11, 'SAFFRON', NULL, 'JEERA', '0', NULL, '2023-11-08 09:50:05', '2023-11-08 09:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `therapy_lists`
--

CREATE TABLE `therapy_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapy_lists`
--

INSERT INTO `therapy_lists` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(6, 'ABHYANGAM', '500', '2023-11-03 02:38:14', '2023-11-03 02:38:14'),
(7, 'ASCHYOTANAM', '500', '2023-11-03 02:43:37', '2023-11-03 02:43:37'),
(8, 'GREEVA VASTI', '500', '2023-11-03 02:47:00', '2023-11-03 02:47:00'),
(9, 'ELLAKIZHI', '500', '2023-11-03 02:52:25', '2023-11-03 02:52:25'),
(10, 'KSHEERA DHARA', '500', '2023-11-03 02:55:07', '2023-11-03 02:55:07'),
(11, 'JANU VASTI:SINGLE KNEE', '500', '2023-11-03 02:57:12', '2023-11-03 02:57:12'),
(12, 'KASHAYA VASTI', '500', '2023-11-03 03:06:07', '2023-11-03 03:06:07'),
(13, 'KATEE VASTI', '500', '2023-11-03 03:08:54', '2023-11-03 03:08:54'),
(14, 'KSHERA DHOOMA', '500', '2023-11-03 03:10:01', '2023-11-03 03:10:01'),
(15, 'KASHAYADHARA', '500', '2023-11-03 03:13:15', '2023-11-03 03:13:15'),
(16, 'KUNJAL', '500', '2023-11-03 03:14:28', '2023-11-03 03:14:28'),
(17, 'MARMA MASSAGE', '500', '2023-11-03 03:16:16', '2023-11-03 03:16:16'),
(18, 'MATRA VASTI', '500', '2023-11-03 06:04:31', '2023-11-03 06:04:31'),
(19, 'MUTTAKIZHI', '500', '2023-11-03 06:07:18', '2023-11-03 06:07:18'),
(20, 'NARANGKIZHI', '500', '2023-11-03 06:09:53', '2023-11-03 06:09:53'),
(21, 'NAVARAKIZHI', '500', '2023-11-03 06:11:47', '2023-11-03 06:11:47'),
(22, 'NASYAM', '500', '2023-11-03 06:18:50', '2023-11-03 06:18:50'),
(23, 'PIZICHIL', '500', '2023-11-03 06:20:56', '2023-11-03 06:20:56'),
(24, 'PODIKIZHI', '500', '2023-11-03 06:22:17', '2023-11-03 06:22:17'),
(25, 'PICHU', '500', '2023-11-03 06:22:59', '2023-11-03 06:22:59'),
(26, 'SIRODHARA', '500', '2023-11-03 06:23:57', '2023-11-03 06:23:57'),
(27, 'SIROTAKRADHARA', '500', '2023-11-03 06:47:01', '2023-11-03 06:47:01'),
(28, 'SNEHAPANAM', '500', '2023-11-03 06:48:47', '2023-11-03 06:48:47'),
(29, 'SPINAL MASSAGE', '500', '2023-11-03 06:49:36', '2023-11-03 06:49:36'),
(30, 'TARPANAM', '500', '2023-11-03 06:50:25', '2023-11-03 06:50:25'),
(31, 'SARWANGTAKRADHARA', '500', '2023-11-03 06:52:10', '2023-11-03 06:52:10'),
(32, 'THALAM', '500', '2023-11-03 06:53:12', '2023-11-03 06:53:12'),
(33, 'THALAPOTHACHIL', '500', '2023-11-03 06:54:56', '2023-11-03 06:54:56'),
(34, 'UROVASTI', '500', '2023-11-03 06:56:20', '2023-11-03 06:56:20'),
(35, 'UDWARTHANAM', '500', '2023-11-03 06:58:59', '2023-11-03 06:58:59'),
(36, 'USHNA SWEDAM', '500', '2023-11-03 07:00:54', '2023-11-03 07:00:54'),
(37, 'BODY SCRUB', '500', '2023-11-03 07:03:51', '2023-11-03 07:03:51'),
(38, 'VESTHANAM', '500', '2023-11-03 07:05:18', '2023-11-03 07:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `therapy_packages`
--

CREATE TABLE `therapy_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `therapy_list` varchar(255) NOT NULL,
  `time_list` text DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treat_ment_charts`
--

CREATE TABLE `treat_ment_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `therapy_id` varchar(255) NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `time_of_the_day` varchar(255) NOT NULL,
  `patient_type` varchar(255) NOT NULL,
  `appointment_date` varchar(255) DEFAULT NULL,
  `therapist` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaman_yoga_lists`
--

CREATE TABLE `vaman_yoga_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agrement_form_one_id` bigint(20) UNSIGNED NOT NULL,
  `yoga_name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vats`
--

CREATE TABLE `vats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `walk_by_patients`
--

CREATE TABLE `walk_by_patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `patient_reg_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `refer_from` varchar(255) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_or_mobile_number` varchar(11) NOT NULL,
  `nid_number` varchar(25) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `how_did_you_come_to_know_about_this_center` text NOT NULL,
  `do_you_have_earlier_experience_of_ayurveda_please_give_details` text NOT NULL,
  `do_you_have_symptoms_in_past_one_weak` text DEFAULT NULL,
  `covid_test_result` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `walk_by_patient_services`
--

CREATE TABLE `walk_by_patient_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `walk_by_patient_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `walk_by_patient_services`
--

INSERT INTO `walk_by_patient_services` (`id`, `walk_by_patient_id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(20, 14, 'Open this select menu', '0ow2wPJM1I', '2023-11-01 09:40:46', '2023-11-01 09:40:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agrement_form_ones`
--
ALTER TABLE `agrement_form_ones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agrement_form_ones_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `agrement_form_one_sneha_lists`
--
ALTER TABLE `agrement_form_one_sneha_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agrement_form_one_sneha_lists_agrement_form_one_id_foreign` (`agrement_form_one_id`);

--
-- Indexes for table `agrement_form_threes`
--
ALTER TABLE `agrement_form_threes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agrement_form_threes_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `agrement_form_three_sneha_lists`
--
ALTER TABLE `agrement_form_three_sneha_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agrement_form_three_sneha_lists_agrement_form_three_id_foreign` (`agrement_form_three_id`);

--
-- Indexes for table `agrement_form_twos`
--
ALTER TABLE `agrement_form_twos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agrement_form_twos_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_charts`
--
ALTER TABLE `diet_charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_appointments_admin_id_foreign` (`admin_id`),
  ADD KEY `doctor_appointments_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctor_consult_dates`
--
ALTER TABLE `doctor_consult_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_consult_dates_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `face_packs`
--
ALTER TABLE `face_packs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `face_pack_appoinments`
--
ALTER TABLE `face_pack_appoinments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `face_pack_appoinments_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `face_pack_appoinment_details`
--
ALTER TABLE `face_pack_appoinment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `face_pack_details`
--
ALTER TABLE `face_pack_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facial_packs`
--
ALTER TABLE `facial_packs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facial_pack_details`
--
ALTER TABLE `facial_pack_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `health_supplements`
--
ALTER TABLE `health_supplements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_categories`
--
ALTER TABLE `inventory_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_damages`
--
ALTER TABLE `inventory_damages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_names`
--
ALTER TABLE `inventory_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_equipment`
--
ALTER TABLE `medicine_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_equip_detail`
--
ALTER TABLE `medicine_equip_detail`
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
-- Indexes for table `other_equipment`
--
ALTER TABLE `other_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_equipment_details`
--
ALTER TABLE `other_equipment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_equipment_details_other_equipment_id_foreign` (`other_equipment_id`);

--
-- Indexes for table `other_ingredients`
--
ALTER TABLE `other_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `patient_admits`
--
ALTER TABLE `patient_admits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_admits_admin_id_foreign` (`admin_id`),
  ADD KEY `patient_admits_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `patient_files`
--
ALTER TABLE `patient_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_files_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patient_herbs`
--
ALTER TABLE `patient_herbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_herbs_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_herbs_doctor_appointment_id_foreign` (`doctor_appointment_id`),
  ADD KEY `patient_herbs_patient_history_id_foreign` (`patient_history_id`);

--
-- Indexes for table `patient_herb_details`
--
ALTER TABLE `patient_herb_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_herb_details_patient_herb_id_foreign` (`patient_herb_id`);

--
-- Indexes for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_histories_admin_id_foreign` (`admin_id`),
  ADD KEY `patient_histories_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_histories_doctor_appointment_id_foreign` (`doctor_appointment_id`);

--
-- Indexes for table `patient_main_therapies`
--
ALTER TABLE `patient_main_therapies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_main_therapies_therapy_appointment_id_foreign` (`therapy_appointment_id`),
  ADD KEY `patient_main_therapies_patient_history_id_foreign` (`patient_history_id`);

--
-- Indexes for table `patient_medical_supplements`
--
ALTER TABLE `patient_medical_supplements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_medical_supplements_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_medical_supplements_doctor_appointment_id_foreign` (`doctor_appointment_id`),
  ADD KEY `patient_medical_supplements_patient_history_id_foreign` (`patient_history_id`);

--
-- Indexes for table `patient_packages`
--
ALTER TABLE `patient_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_packages_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_packages_doctor_appointment_id_foreign` (`doctor_appointment_id`),
  ADD KEY `patient_packages_patient_history_id_foreign` (`patient_history_id`);

--
-- Indexes for table `patient_therapies`
--
ALTER TABLE `patient_therapies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_therapies_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_therapies_doctor_appointment_id_foreign` (`doctor_appointment_id`),
  ADD KEY `patient_therapies_patient_history_id_foreign` (`patient_history_id`);

--
-- Indexes for table `patient_therapy_details`
--
ALTER TABLE `patient_therapy_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_therapy_details_patient_therapy_id_foreign` (`patient_therapy_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_bill_id_foreign` (`bill_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `powders`
--
ALTER TABLE `powders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sign_packages`
--
ALTER TABLE `sign_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `single_ingredients`
--
ALTER TABLE `single_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `single_ingredients_therapy_appointment_detail_id_foreign` (`therapy_appointment_detail_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `system_information`
--
ALTER TABLE `system_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapists`
--
ALTER TABLE `therapists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `therapists_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `therapy_appointments`
--
ALTER TABLE `therapy_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `therapy_appointments_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `therapy_appointment_date_and_times`
--
ALTER TABLE `therapy_appointment_date_and_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapy_appointment_details`
--
ALTER TABLE `therapy_appointment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `therapy_appointment_details_therapy_appointment_id_foreign` (`therapy_appointment_id`);

--
-- Indexes for table `therapy_details`
--
ALTER TABLE `therapy_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `therapy_details_therapy_list_id_foreign` (`therapy_list_id`),
  ADD KEY `therapy_details_therapy_ingredient_id_foreign` (`therapy_ingredient_id`);

--
-- Indexes for table `therapy_ingredients`
--
ALTER TABLE `therapy_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapy_ing_detail`
--
ALTER TABLE `therapy_ing_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapy_lists`
--
ALTER TABLE `therapy_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapy_packages`
--
ALTER TABLE `therapy_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treat_ment_charts`
--
ALTER TABLE `treat_ment_charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vaman_yoga_lists`
--
ALTER TABLE `vaman_yoga_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaman_yoga_lists_agrement_form_one_id_foreign` (`agrement_form_one_id`);

--
-- Indexes for table `vats`
--
ALTER TABLE `vats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walk_by_patients`
--
ALTER TABLE `walk_by_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `walk_by_patients_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `walk_by_patient_services`
--
ALTER TABLE `walk_by_patient_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `walk_by_patient_services_walk_by_patient_id_foreign` (`walk_by_patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `agrement_form_ones`
--
ALTER TABLE `agrement_form_ones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agrement_form_one_sneha_lists`
--
ALTER TABLE `agrement_form_one_sneha_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agrement_form_threes`
--
ALTER TABLE `agrement_form_threes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agrement_form_three_sneha_lists`
--
ALTER TABLE `agrement_form_three_sneha_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agrement_form_twos`
--
ALTER TABLE `agrement_form_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diet_charts`
--
ALTER TABLE `diet_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `doctor_consult_dates`
--
ALTER TABLE `doctor_consult_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `face_packs`
--
ALTER TABLE `face_packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `face_pack_appoinments`
--
ALTER TABLE `face_pack_appoinments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `face_pack_appoinment_details`
--
ALTER TABLE `face_pack_appoinment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `face_pack_details`
--
ALTER TABLE `face_pack_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `facial_packs`
--
ALTER TABLE `facial_packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facial_pack_details`
--
ALTER TABLE `facial_pack_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_supplements`
--
ALTER TABLE `health_supplements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory_categories`
--
ALTER TABLE `inventory_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory_damages`
--
ALTER TABLE `inventory_damages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory_names`
--
ALTER TABLE `inventory_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `medicine_equipment`
--
ALTER TABLE `medicine_equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `medicine_equip_detail`
--
ALTER TABLE `medicine_equip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `other_equipment`
--
ALTER TABLE `other_equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `other_equipment_details`
--
ALTER TABLE `other_equipment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `other_ingredients`
--
ALTER TABLE `other_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient_admits`
--
ALTER TABLE `patient_admits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_files`
--
ALTER TABLE `patient_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_herbs`
--
ALTER TABLE `patient_herbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `patient_herb_details`
--
ALTER TABLE `patient_herb_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patient_histories`
--
ALTER TABLE `patient_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `patient_main_therapies`
--
ALTER TABLE `patient_main_therapies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `patient_medical_supplements`
--
ALTER TABLE `patient_medical_supplements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_packages`
--
ALTER TABLE `patient_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_therapies`
--
ALTER TABLE `patient_therapies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `patient_therapy_details`
--
ALTER TABLE `patient_therapy_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `powders`
--
ALTER TABLE `powders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sign_packages`
--
ALTER TABLE `sign_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `single_ingredients`
--
ALTER TABLE `single_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `therapy_appointments`
--
ALTER TABLE `therapy_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `therapy_appointment_date_and_times`
--
ALTER TABLE `therapy_appointment_date_and_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `therapy_appointment_details`
--
ALTER TABLE `therapy_appointment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `therapy_details`
--
ALTER TABLE `therapy_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `therapy_ingredients`
--
ALTER TABLE `therapy_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `therapy_ing_detail`
--
ALTER TABLE `therapy_ing_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `therapy_lists`
--
ALTER TABLE `therapy_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `therapy_packages`
--
ALTER TABLE `therapy_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `treat_ment_charts`
--
ALTER TABLE `treat_ment_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaman_yoga_lists`
--
ALTER TABLE `vaman_yoga_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `walk_by_patients`
--
ALTER TABLE `walk_by_patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `walk_by_patient_services`
--
ALTER TABLE `walk_by_patient_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `other_equipment_details`
--
ALTER TABLE `other_equipment_details`
  ADD CONSTRAINT `other_equipment_details_other_equipment_id_foreign` FOREIGN KEY (`other_equipment_id`) REFERENCES `other_equipment` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
