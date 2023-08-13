-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 09:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newa`
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
(5, 'therapy maker', '11111111', NULL, 'therapy maker', NULL, 'therapy_maker@gmail.com', NULL, '$2y$10$KpUmCOES.co/z6h64F492.igPMHfiVL98NBv5TlE7yninvy/7TzLO', NULL, '2023-07-23 04:11:18', '2023-07-23 04:11:18');

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
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
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

--
-- Dumping data for table `diet_charts`
--

INSERT INTO `diet_charts` (`id`, `name`, `file`, `patient_id`, `early_morning`, `brisk_walk`, `breakfast`, `lunch`, `evening`, `dinner`, `created_at`, `updated_at`) VALUES
(1, 'SM Enayet Mahmood', 'public/uploads/IMG-20230225-WA0021.jpg', '1106231686473743', 'morning', 'walk', 'lite', 'moderate', 'heavy', '8.00', '2023-06-11 13:08:21', '2023-06-11 13:08:21');

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

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `admin_id`, `name`, `address`, `gender`, `email_address`, `phone_or_mobile_number`, `nid_number`, `nationality`, `years_of_experience`, `doctor_certificate`, `created_at`, `updated_at`) VALUES
(1, 1, 'DOC 1', 'TjE1Ro2GDg', 'Male', '8gqy0@rmf1.com', '44444444444', 'CBn8tBfEUa', 'aNWqR1hJvh', 'jzC8Met25c', 'public/uploads/ww.PNG', '2023-06-02 11:58:19', '2023-06-02 11:58:19'),
(2, 1, 'DOC 2', 'MylN4baiIb', 'Male', 'jz9qt@lccl.com', '66666666667', 'OTyWuf2n9c', 'gs7pbvEHO2', '8hjQJTRjey', 'public/uploads/Capture.PNG', '2023-06-02 11:58:49', '2023-06-02 11:58:49');

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

--
-- Dumping data for table `doctor_appointments`
--

INSERT INTO `doctor_appointments` (`id`, `admin_id`, `patient_id`, `doctor_id`, `appointment_date`, `appointment_time`, `patient_type`, `serial_number`, `status`, `created_at`, `updated_at`) VALUES
(14, 1, '2706231687877665', 2, '2023-07-23', '18:15', 'Patient', '1', '1', '2023-07-23 06:15:22', '2023-07-23 06:19:47');

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

--
-- Dumping data for table `doctor_consult_dates`
--

INSERT INTO `doctor_consult_dates` (`id`, `doctor_id`, `day`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saturday', '12:31', '00:34', '2023-06-02 11:58:19', '2023-06-02 11:58:19'),
(2, 2, 'Saturday', '12:31', '00:34', '2023-06-02 11:58:49', '2023-06-02 11:58:49');

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

--
-- Dumping data for table `face_packs`
--

INSERT INTO `face_packs` (`id`, `pack_name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'paF1', '270', '2023-08-13 11:15:25', '2023-08-13 11:15:25'),
(2, 'paf2', '3422', '2023-08-13 11:15:50', '2023-08-13 11:15:50');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `face_pack_appoinments`
--

INSERT INTO `face_pack_appoinments` (`id`, `admin_id`, `patient_id`, `patient_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2706231687877032', 'WalkByPatient', '', '2023-08-13 12:53:03', '2023-08-13 12:53:03');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `face_pack_appoinment_details`
--

INSERT INTO `face_pack_appoinment_details` (`id`, `appoinment_id`, `history_id`, `face_pack_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '1', '72', '2', '1', '2023-08-13 12:53:03', '2023-08-13 12:53:03'),
(2, '1', '72', '1', '1', '2023-08-13 12:53:03', '2023-08-13 12:53:03');

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

--
-- Dumping data for table `face_pack_details`
--

INSERT INTO `face_pack_details` (`id`, `main_pack_id`, `pack_detail_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2023-08-13 11:15:25', '2023-08-13 11:15:25'),
(4, '2', '2', '2023-08-13 11:28:34', '2023-08-13 11:28:34'),
(5, '2', '1', '2023-08-13 11:28:34', '2023-08-13 11:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `facial_packs`
--

CREATE TABLE `facial_packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facial_packs`
--

INSERT INTO `facial_packs` (`id`, `pack_name`, `created_at`, `updated_at`) VALUES
(1, 'finfo', '2023-08-13 10:21:55', '2023-08-13 10:21:55'),
(2, 'finfo2', '2023-08-13 10:47:56', '2023-08-13 10:47:56');

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

--
-- Dumping data for table `facial_pack_details`
--

INSERT INTO `facial_pack_details` (`id`, `face_pack_id`, `ingredient_id`, `amount`, `created_at`, `updated_at`) VALUES
(3, '1', '2', '2', '2023-08-13 10:47:34', '2023-08-13 10:47:34'),
(4, '1', '1', '2', '2023-08-13 10:47:34', '2023-08-13 10:47:34'),
(5, '2', '2', '3', '2023-08-13 10:47:56', '2023-08-13 10:47:56');

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

--
-- Dumping data for table `health_supplements`
--

INSERT INTO `health_supplements` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'health one', '400', '2023-06-02 11:42:20', '2023-06-02 11:42:20'),
(2, 'health two', '340', '2023-06-02 11:42:40', '2023-06-02 11:42:40'),
(3, 'SM Enayet Mahmood', '25', '2023-06-11 13:09:28', '2023-06-11 13:09:28');

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
(1, 'therapy Ingredient', '2023-07-23 03:32:56', '2023-07-23 03:32:56'),
(2, 'Medicine Equipment', '2023-07-23 03:33:32', '2023-07-23 03:33:32'),
(3, 'other', '2023-07-23 03:40:29', '2023-07-23 03:40:29');

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
(1, 'mm one', '270', '2023-06-02 11:40:54', '2023-06-02 11:40:54'),
(2, 'mm two', '190', '2023-06-02 11:41:06', '2023-06-02 11:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_equipment`
--

CREATE TABLE `medicine_equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_equipment`
--

INSERT INTO `medicine_equipment` (`id`, `name`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'medi 1', '212', 'r', '2023-06-02 11:38:26', '2023-07-21 10:57:54'),
(2, 'medi 2', '444', 'r', '2023-06-02 11:38:38', '2023-07-21 10:57:45');

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
(59, '2023_08_13_175005_create_face_pack_appoinment_details_table', 10);

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
(3, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Admin', 3),
(4, 'App\\Models\\Admin', 4),
(5, 'App\\Models\\Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `other_ingredients`
--

CREATE TABLE `other_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_ingredients`
--

INSERT INTO `other_ingredients` (`id`, `name`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Raktachandan kashayan', '300', 'g', '2023-08-13 08:27:42', '2023-08-13 08:27:42'),
(2, 'dohi', '50', 'g', '2023-08-13 08:28:44', '2023-08-13 08:28:44');

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

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `powder_id`, `powder_amount`, `amount`, `created_at`, `updated_at`) VALUES
(3, 'package four', 'Tablet,Medicine', '2,3', '400', '2023-06-06 05:24:37', '2023-06-27 09:08:38'),
(4, 'package three', 'Tablet,Medicine', '2,1', '10000', '2023-06-08 09:48:29', '2023-06-08 09:48:29'),
(5, 'package one', 'Medicine,Tablet', '2,1', '30000', '2023-06-08 09:50:07', '2023-07-21 01:08:35');

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
  `do_you_have_symptoms_in_past_one_weak` text NOT NULL,
  `covid_test_result` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `admin_id`, `image`, `patient_id`, `name`, `refer_from`, `age`, `gender`, `address`, `email_address`, `phone_or_mobile_number`, `nid_number`, `nationality`, `how_did_you_come_to_know_about_this_center`, `do_you_have_earlier_experience_of_ayurveda_please_give_details`, `do_you_have_symptoms_in_past_one_weak`, `covid_test_result`, `created_at`, `updated_at`) VALUES
(4, 1, 'public/uploads/userThree.png', '2706231687877665', 'Nur Imdadul', 'Mr.Z', '45', 'Male', 'Dhanmondi', 'nn@gmail.com', '33333333333', '33221134325235', 'bangladeshi', 'No', 'no', 'np', 'Yes', '2023-06-27 08:54:25', '2023-06-27 08:54:25'),
(5, 1, 'public/uploads/user4.png', '2706231687877760', 'Tarikul', 'Mr.A', '55', 'Male', 'mirpur', 't@gmail.com', '01222222222', '132432142543657', 'bangladeshi', 'online', 'no', 'no', 'Yes', '2023-06-27 08:56:00', '2023-06-27 08:56:00'),
(6, 1, 'N/A', '2706231687877986', 'Joynal Abedin', 'N/A', '65', 'Male', 'Mirpur', 'jj@gmail.com', '11111111111', '32432423545436435', 'bangladeshi', 'N/A', 'N/A', 'N/A', 'N/A', '2023-06-27 09:04:24', '2023-06-27 09:04:24'),
(7, 1, 'N/A', '2706231687878356', 'Rupos Ali', 'N/A', '45', 'Male', 'Mirpur', 'mm@gmail.com', '98888888111', '5555555555', 'bangladeshi', 'N/A', 'N/A', 'N/A', 'N/A', '2023-06-27 09:07:04', '2023-06-27 09:07:04');

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

--
-- Dumping data for table `patient_admits`
--

INSERT INTO `patient_admits` (`id`, `admin_id`, `patient_type`, `patient_id`, `doctor_id`, `name`, `age`, `gender`, `address`, `email_address`, `phone_or_mobile_number`, `nid_number`, `nationality`, `type_of_accommodation`, `recommended_doctor_name`, `start_date`, `end_date`, `treatment_package_name`, `routine`, `created_at`, `updated_at`) VALUES
(2, 1, 'New', '2706231687877986', 2, 'Joynal Abedin', '65', 'Male', 'Mirpur', 'jj@gmail.com', '11111111111', '32432423545436435', 'bangladeshi', 'no', '2', '2023-06-24', '2023-06-30', '1', 'public/uploads/dummy-image-green-e1398449160839.jpg', '2023-06-27 09:04:23', '2023-06-27 09:04:23'),
(3, 1, 'New', '2706231687878356', 2, 'Rupos Ali', '45', 'Male', 'Mirpur', 'mm@gmail.com', '98888888111', '5555555555', 'bangladeshi', 'good', '2', '2023-06-24', '2023-06-30', '2', 'public/uploads/dummy-image-green-e1398449160839.jpg', '2023-06-27 09:07:03', '2023-06-27 09:07:03');

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
(3, 4, 'd1', 'public/uploads/dummy-image-green-e1398449160839.jpg', '2023-06-27 08:54:25', '2023-06-27 08:54:25'),
(4, 5, 'd2', 'public/uploads/dummy-image-green-e1398449160839.jpg', '2023-06-27 08:56:01', '2023-06-27 08:56:01');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_herbs`
--

INSERT INTO `patient_herbs` (`id`, `doctor_id`, `doctor_appointment_id`, `patient_history_id`, `patient_id`, `name`, `package_name`, `how_many_dose`, `main_time`, `status`, `created_at`, `updated_at`) VALUES
(24, 2, 14, 64, '2706231687877665', 'mm1', '5', '3', NULL, '2', '2023-07-23 06:19:02', '2023-07-23 06:19:02'),
(25, 2, 14, 64, '2706231687877665', 'mm2', '5', '33', NULL, '2', '2023-07-23 06:19:02', '2023-07-23 06:19:02'),
(26, 2, 14, 64, '2706231687877665', 'mm two', '5', '12', NULL, '2', '2023-07-23 06:19:03', '2023-07-23 06:19:03');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_herb_details`
--

INSERT INTO `patient_herb_details` (`id`, `patient_herb_id`, `ingredient_name`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(12, 24, '2', '1', 't', '2023-07-23 06:19:02', '2023-07-23 06:19:02'),
(13, 24, '2', '2', 't', '2023-07-23 06:19:02', '2023-07-23 06:19:02'),
(14, 25, '1', '111', 'r', '2023-07-23 06:19:03', '2023-07-23 06:19:03'),
(15, 25, '2', '4444', 'r', '2023-07-23 06:19:03', '2023-07-23 06:19:03');

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

--
-- Dumping data for table `patient_histories`
--

INSERT INTO `patient_histories` (`id`, `admin_id`, `doctor_id`, `doctor_appointment_id`, `patient_id`, `pradhan_vedana`, `vedana_vrutanta`, `chikitsa_vrutanta`, `stri_evam_prasooti_vrutant`, `poorva_vedana_vrutant`, `anuvanshika_vritanta`, `pratyaksh_pramanam`, `roga_preeksha_srotas_pareeksha`, `rasavaha_srotas`, `raktavaha_srotas`, `mamsavaha_srotas`, `medovaha_srotas`, `asthivaha_srotas`, `majjavaha_srotas`, `shukravaha_srotas`, `rogi_pareeksha`, `nadi`, `dosha`, `dushya`, `shwas`, `tap_temp`, `kala`, `bhara_wt`, `agni`, `raktchap_bp`, `prakruti`, `mala`, `vaya`, `mootra`, `satmya`, `kshudha`, `satva`, `nidra`, `ahara`, `vyasan`, `roga_mrag`, `rago_sthana`, `sadhyasadhyata`, `pathya`, `yoga_chikitsa`, `paramarsh`, `history_file`, `status`, `bill_status`, `created_at`, `updated_at`) VALUES
(64, 1, 2, 14, '2706231687877665', 'lgkCIpRXhc', 'AEdvdoGRi7', 'i8w8etWQHm', 'jmn57aTu8P', 'vpc2VCNSYE', 'Ez1vrI4C7P', 'CdJEH5KuLg', 'tqoPR4sCTt', 'SJpb3AeLvQ', 'YgBL2GesOy', 'bd7PJhZFiV', 'mxcvZ8dvwd', 'Boht8jG8pz', 'LGLfvC5xlu', 'vj5WzSVaO2', 'Pf8axIXLGd', '2rBLcE8sld', 'R7ZdORucLA', 'nzz7IYrCo5', 'HB0FeWZ86w', 'HjCh0o75tW', 'yBuyDFBgCc', 'GBGTS2H5Nu', 'lvoHA8uUcb', 'N5E7MOzhyn', 'FDjh32YWy3', 'i8V4qYTe1O', 'xFQclzt18b', 'UL9Zr7fIpS', 'pdnNkhTfgC', 'biL0LcN2cG', 'Hp7jeVyl40', 'i60yugCZsc', 'jwEmJaRK0E', '72bHjLqXKy', 'TcbGacLfMt', 'UKxQNaTJsM', 'gcdURnvf47', 'wK7C5aPtd5', 'QtJZm9Vmx8', 'PBEmnOvYD7', 'public/uploads/govt-bangladesh-logo-D1143C363F-seeklogo.com.png', '0', NULL, '2023-07-23 06:16:05', '2023-07-23 06:19:47'),
(66, 1, NULL, NULL, '2706231687877032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, '2023-07-23 07:50:36', '2023-07-23 07:50:36'),
(67, 1, NULL, NULL, '2706231687877331', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, '2023-07-23 08:34:54', '2023-07-23 08:34:54'),
(68, 1, NULL, NULL, '1106231686473743', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, '2023-07-23 09:13:32', '2023-07-23 09:13:32'),
(69, 1, NULL, NULL, '2706231687877331', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, '2023-07-23 09:19:50', '2023-07-23 09:19:50'),
(70, 1, NULL, NULL, '2706231687877032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, '2023-07-23 09:22:29', '2023-07-23 09:22:29'),
(71, 1, NULL, NULL, '2706231687877032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '1', '2023-07-23 09:34:35', '2023-07-23 10:43:51'),
(72, 1, NULL, NULL, '2706231687877032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-08-13 12:53:03', '2023-08-13 13:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient_main_therapies`
--

CREATE TABLE `patient_main_therapies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `therapy_appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `therapy_package_id` varchar(200) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_main_therapies`
--

INSERT INTO `patient_main_therapies` (`id`, `therapist_id`, `therapy_appointment_id`, `patient_history_id`, `patient_id`, `name`, `therapy_package_id`, `amount`, `created_at`, `updated_at`) VALUES
(19, 2, 51, 67, '2706231687877331', 'therapy two', '2', '1', '2023-07-23 09:20:20', '2023-07-23 09:20:20'),
(20, 1, 51, 67, '2706231687877331', 'therapy One', '2', '1', '2023-07-23 09:20:21', '2023-07-23 09:20:21'),
(21, 2, 52, 66, '2706231687877032', 'therapy two', NULL, '1', '2023-07-23 09:22:42', '2023-07-23 09:22:42'),
(22, 2, 53, 71, '2706231687877032', 'therapy One', '2', '1', '2023-07-23 09:35:01', '2023-07-23 09:35:01'),
(23, 1, 53, 71, '2706231687877032', 'therapy two', '2', '1', '2023-07-23 09:35:01', '2023-07-23 09:35:01');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_medical_supplements`
--

INSERT INTO `patient_medical_supplements` (`id`, `doctor_id`, `doctor_appointment_id`, `patient_history_id`, `patient_id`, `name`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(6, 2, 14, 64, '2706231687877665', 'health two', '7', '2', '2023-07-23 06:19:20', '2023-07-23 06:19:20');

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

--
-- Dumping data for table `patient_therapies`
--

INSERT INTO `patient_therapies` (`id`, `doctor_id`, `doctor_appointment_id`, `patient_history_id`, `patient_id`, `name`, `amount`, `therapy_type`, `package_name`, `status`, `created_at`, `updated_at`) VALUES
(26, 2, 14, 64, '2706231687877665', '2', '1', 'Single', 'Single', '2', '2023-07-23 06:17:14', '2023-07-23 06:17:14'),
(27, 2, 14, 64, '2706231687877665', '2', '2', 'Package', '2', '2', '2023-07-23 06:17:56', '2023-07-23 06:17:56'),
(28, 2, 14, 64, '2706231687877665', '1', '2', 'Package', '2', '2', '2023-07-23 06:17:57', '2023-07-23 06:17:57');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_therapy_details`
--

INSERT INTO `patient_therapy_details` (`id`, `patient_therapy_id`, `ingredient_name`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(15, 26, '1', '650', 'gram', '2023-07-23 06:17:14', '2023-07-23 06:17:14'),
(16, 26, '4', '300', 'gram', '2023-07-23 06:17:14', '2023-07-23 06:17:14'),
(17, 27, '1', '65', 'gram', '2023-07-23 06:17:57', '2023-07-23 06:17:57'),
(18, 28, '2', '65', 'gram', '2023-07-23 06:17:57', '2023-07-23 06:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
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
(152, 'facePackAppoinment', 'facePackAppoinmentUpdate', 'admin', NULL, NULL);

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

--
-- Dumping data for table `powders`
--

INSERT INTO `powders` (`id`, `name`, `medicine_equipment_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Powder One', 'medi 2', '190', '2023-06-02 11:39:10', '2023-06-02 11:39:10'),
(2, 'Powder two', 'medi 1', '270', '2023-06-02 11:39:33', '2023-06-02 11:39:33');

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

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `name`, `reward_for`, `point`, `in_exchange`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'DECK', 'For Service', '77', '77', '270', '2023-06-02 11:37:00', '2023-06-02 11:37:00');

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
(152, 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `single_ingredients`
--

INSERT INTO `single_ingredients` (`id`, `therapy_appointment_detail_id`, `ingredient_name`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(32, 56, '1', '65', 'gram', '2023-07-23 09:19:50', '2023-07-23 09:19:50'),
(33, 56, '4', '120', 'gram', '2023-07-23 09:19:50', '2023-07-23 09:19:50'),
(34, 57, '2', '650', 'gram', '2023-07-23 09:19:51', '2023-07-23 09:19:51'),
(35, 58, '1', '650', 'gram', '2023-07-23 09:22:30', '2023-07-23 09:22:30'),
(36, 59, '1', '65', 'gram', '2023-07-23 09:34:36', '2023-07-23 09:34:36'),
(37, 60, '2', '65', 'gram', '2023-07-23 09:34:36', '2023-07-23 09:34:36');

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

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `admin_id`, `name`, `email`, `phone_or_mobile_number`, `address`, `nid_number`, `nationality`, `dob`, `years_of_experience`, `created_at`, `updated_at`) VALUES
(1, 1, 'staff one', '2yyso@hbkw.com', '77777777777', 'lLXw63z2up', '5tPQTuKYDu', 'ZosWNSz5M4', '2023-05-16', '77', '2023-06-02 11:37:58', '2023-06-02 11:37:58');

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

--
-- Dumping data for table `therapists`
--

INSERT INTO `therapists` (`id`, `admin_id`, `name`, `email`, `phone_or_mobile_number`, `address`, `nid_number`, `nationality`, `dob`, `years_of_experience`, `created_at`, `updated_at`) VALUES
(1, 1, 'therapist One', 'axft1DtgZt', '22222222224', '21lqQ2kCsN', 'eNhHxnsLzY', 'yHwuM1rgRn', '2023-06-17', '44', '2023-06-02 11:35:34', '2023-06-02 11:35:34'),
(2, 1, 'therapist Two', 'emjru3qtJ7', '77777777777', 'uKs1H57vYn', '7dSULb2Eg0', 'lJpHsfBFm6', '2023-06-12', '88', '2023-06-02 11:36:38', '2023-06-02 11:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `therapy_appointments`
--

CREATE TABLE `therapy_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `patient_type` varchar(255) DEFAULT NULL,
  `status` varchar(110) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapy_appointments`
--

INSERT INTO `therapy_appointments` (`id`, `admin_id`, `patient_id`, `patient_type`, `status`, `created_at`, `updated_at`) VALUES
(51, 1, '2706231687877331', NULL, '3', '2023-07-23 09:19:50', '2023-07-23 09:19:50'),
(52, 1, '2706231687877032', NULL, '3', '2023-07-23 09:22:29', '2023-07-23 09:22:29'),
(53, 1, '2706231687877032', NULL, '3', '2023-07-23 09:34:35', '2023-07-23 09:34:35');

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
  `patient_id` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapy_appointment_date_and_times`
--

INSERT INTO `therapy_appointment_date_and_times` (`id`, `therapy_appointment_id`, `therapist`, `therapy`, `date`, `start_time`, `end_time`, `serial`, `status`, `patient_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(26, 51, '2', 'therapy two', '2023-07-23', '21:20', '23:20', '1', NULL, '2706231687877331', '1', '2023-07-23 09:20:21', '2023-07-23 09:20:21'),
(27, 51, '1', 'therapy One', '2023-07-24', '22:20', '21:23', '1', NULL, '2706231687877331', '1', '2023-07-23 09:20:21', '2023-07-23 09:20:21'),
(28, 52, '2', 'therapy two', '2023-07-23', '21:27', '21:28', '2', NULL, '2706231687877032', '1', '2023-07-23 09:22:43', '2023-07-23 09:22:43'),
(29, 53, '2', 'therapy One', '2023-07-26', '12:34', '13:34', '1', NULL, '2706231687877032', '1', '2023-07-23 09:35:01', '2023-07-23 09:35:01'),
(30, 53, '1', 'therapy two', '2023-07-20', '13:34', '21:34', '1', NULL, '2706231687877032', '1', '2023-07-23 09:35:01', '2023-07-23 09:35:01');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapy_appointment_details`
--

INSERT INTO `therapy_appointment_details` (`id`, `therapy_appointment_id`, `therapy_name`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(56, 51, '2', '2', '1', '2023-07-23 09:19:50', '2023-07-23 09:19:50'),
(57, 51, '1', '2', '1', '2023-07-23 09:19:50', '2023-07-23 09:19:50'),
(58, 52, '2', 'Single', '1', '2023-07-23 09:22:30', '2023-07-23 09:22:30'),
(59, 53, '2', '2', '1', '2023-07-23 09:34:35', '2023-07-23 09:34:35'),
(60, 53, '1', '2', '1', '2023-07-23 09:34:36', '2023-07-23 09:34:36');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapy_details`
--

INSERT INTO `therapy_details` (`id`, `therapy_list_id`, `therapy_ingredient_id`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '65', 'gram', '2023-06-02 11:44:05', '2023-06-02 11:44:05'),
(2, 2, 1, '65', 'gram', '2023-06-02 11:44:50', '2023-06-02 11:44:50'),
(3, 3, 3, '2', 'gram', '2023-06-11 13:10:22', '2023-06-11 13:10:22'),
(4, 3, 2, '1', 'gram', '2023-06-11 13:10:22', '2023-06-11 13:10:22');

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
(1, 'the ing one', '212', 'r', '2023-06-02 11:43:09', '2023-07-21 10:58:31'),
(2, 'the ing two', '212', 'r', '2023-06-02 11:43:23', '2023-07-21 10:58:24'),
(3, 'SM Enayet Mahmood', '444', 'rt', '2023-06-11 13:09:41', '2023-07-21 10:58:38'),
(4, 'm1', '2', 'r', '2023-07-23 03:58:12', '2023-07-23 03:58:12');

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
(1, 'therapy One', '270', '2023-06-02 11:44:05', '2023-06-02 11:44:05'),
(2, 'therapy two', '270', '2023-06-02 11:44:50', '2023-06-02 11:44:50'),
(3, 'SM Enayet Mahmood', '2', '2023-06-11 13:10:22', '2023-06-11 13:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `therapy_packages`
--

CREATE TABLE `therapy_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `therapy_list` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapy_packages`
--

INSERT INTO `therapy_packages` (`id`, `package_name`, `therapy_list`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Therapy Package One', 'therapy two', '300', '2023-06-02 11:45:16', '2023-06-02 11:45:16'),
(2, 'Therapy Package Two', 'therapy One,therapy two', '700', '2023-06-02 11:45:48', '2023-06-03 02:03:23'),
(3, 'package4', 'SM Enayet Mahmood,therapy two', '40000', '2023-06-13 12:17:57', '2023-06-13 12:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `treat_ment_charts`
--

CREATE TABLE `treat_ment_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `therapy_id` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time_of_the_day` varchar(255) NOT NULL,
  `patient_type` varchar(255) NOT NULL,
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
  `do_you_have_symptoms_in_past_one_weak` text NOT NULL,
  `covid_test_result` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `walk_by_patients`
--

INSERT INTO `walk_by_patients` (`id`, `image`, `admin_id`, `patient_reg_id`, `name`, `refer_from`, `age`, `gender`, `address`, `email_address`, `phone_or_mobile_number`, `nid_number`, `nationality`, `how_did_you_come_to_know_about_this_center`, `do_you_have_earlier_experience_of_ayurveda_please_give_details`, `do_you_have_symptoms_in_past_one_weak`, `covid_test_result`, `created_at`, `updated_at`) VALUES
(4, 'public/uploads/IMG-20230225-WA0014.jpg', 1, '1106231686473743', 'SM Enayet Mahmood', 'Ruma', '38', 'Male', '129 Malibag 1st lane', 'enayet.mahmood@gmail.com', '01747012345', '6165161165115611', 'Bangladeshi', 'Friend', 'No', 'no', 'Yes', '2023-06-11 12:55:43', '2023-06-11 12:55:43'),
(5, 'public/uploads/userOne.png', 1, '2706231687877032', 'Rahim Sorkar', 'Mr.x', '30', 'Male', 'Gulsan,block 2', 'r@gmail.com', '11111111111', '1111111111111', 'bangladeshi', 'Facebook', 'No', 'No', 'Yes', '2023-06-27 08:43:52', '2023-06-27 08:43:52'),
(6, 'public/uploads/userTwo.png', 1, '2706231687877331', 'Abul Sajib', 'Mr.Y', '40', 'Male', 'Banani', 'sajib@gmail.com', '22222222222', '5555555555', 'bangladeshi', 'Online', 'No', 'no', 'Yes', '2023-06-27 08:48:51', '2023-06-27 08:48:51');

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
(4, 4, 'High blood pressure', 'Since past 5 years on Daily Medication for high Blood Pressure', '2023-06-11 12:55:43', '2023-06-11 12:55:43'),
(5, 4, 'Recent surgery', 'Underwent psedo Hernia Operation in Ever Care', '2023-06-11 12:55:43', '2023-06-11 12:55:43'),
(6, 5, 'Hepatitis B positive', 'No', '2023-06-27 08:43:52', '2023-06-27 08:43:52'),
(7, 6, 'Chronic illness', 'No detail', '2023-06-27 08:48:51', '2023-06-27 08:48:51');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_admin_id_foreign` (`admin_id`),
  ADD KEY `bills_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `diet_charts`
--
ALTER TABLE `diet_charts`
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
  ADD KEY `patient_main_therapies_therapist_id_foreign` (`therapist_id`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diet_charts`
--
ALTER TABLE `diet_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctor_consult_dates`
--
ALTER TABLE `doctor_consult_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `face_packs`
--
ALTER TABLE `face_packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `face_pack_appoinments`
--
ALTER TABLE `face_pack_appoinments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `face_pack_appoinment_details`
--
ALTER TABLE `face_pack_appoinment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `face_pack_details`
--
ALTER TABLE `face_pack_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facial_packs`
--
ALTER TABLE `facial_packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facial_pack_details`
--
ALTER TABLE `facial_pack_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_equipment`
--
ALTER TABLE `medicine_equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `other_ingredients`
--
ALTER TABLE `other_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient_admits`
--
ALTER TABLE `patient_admits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_files`
--
ALTER TABLE `patient_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_herbs`
--
ALTER TABLE `patient_herbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patient_herb_details`
--
ALTER TABLE `patient_herb_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient_histories`
--
ALTER TABLE `patient_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `patient_main_therapies`
--
ALTER TABLE `patient_main_therapies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `patient_medical_supplements`
--
ALTER TABLE `patient_medical_supplements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_packages`
--
ALTER TABLE `patient_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_therapies`
--
ALTER TABLE `patient_therapies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `patient_therapy_details`
--
ALTER TABLE `patient_therapy_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

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
-- AUTO_INCREMENT for table `single_ingredients`
--
ALTER TABLE `single_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `therapy_appointments`
--
ALTER TABLE `therapy_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `therapy_appointment_date_and_times`
--
ALTER TABLE `therapy_appointment_date_and_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `therapy_appointment_details`
--
ALTER TABLE `therapy_appointment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `therapy_details`
--
ALTER TABLE `therapy_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `therapy_ingredients`
--
ALTER TABLE `therapy_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `therapy_lists`
--
ALTER TABLE `therapy_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `therapy_packages`
--
ALTER TABLE `therapy_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `treat_ment_charts`
--
ALTER TABLE `treat_ment_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `walk_by_patients`
--
ALTER TABLE `walk_by_patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `walk_by_patient_services`
--
ALTER TABLE `walk_by_patient_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agrement_form_ones`
--
ALTER TABLE `agrement_form_ones`
  ADD CONSTRAINT `agrement_form_ones_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agrement_form_one_sneha_lists`
--
ALTER TABLE `agrement_form_one_sneha_lists`
  ADD CONSTRAINT `agrement_form_one_sneha_lists_agrement_form_one_id_foreign` FOREIGN KEY (`agrement_form_one_id`) REFERENCES `agrement_form_ones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agrement_form_threes`
--
ALTER TABLE `agrement_form_threes`
  ADD CONSTRAINT `agrement_form_threes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agrement_form_three_sneha_lists`
--
ALTER TABLE `agrement_form_three_sneha_lists`
  ADD CONSTRAINT `agrement_form_three_sneha_lists_agrement_form_three_id_foreign` FOREIGN KEY (`agrement_form_three_id`) REFERENCES `agrement_form_threes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agrement_form_twos`
--
ALTER TABLE `agrement_form_twos`
  ADD CONSTRAINT `agrement_form_twos_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD CONSTRAINT `doctor_appointments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_consult_dates`
--
ALTER TABLE `doctor_consult_dates`
  ADD CONSTRAINT `doctor_consult_dates_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `face_pack_appoinments`
--
ALTER TABLE `face_pack_appoinments`
  ADD CONSTRAINT `face_pack_appoinments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_admits`
--
ALTER TABLE `patient_admits`
  ADD CONSTRAINT `patient_admits_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_admits_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_files`
--
ALTER TABLE `patient_files`
  ADD CONSTRAINT `patient_files_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_herbs`
--
ALTER TABLE `patient_herbs`
  ADD CONSTRAINT `patient_herbs_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_herbs_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_herbs_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_herb_details`
--
ALTER TABLE `patient_herb_details`
  ADD CONSTRAINT `patient_herb_details_patient_herb_id_foreign` FOREIGN KEY (`patient_herb_id`) REFERENCES `patient_herbs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD CONSTRAINT `patient_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_histories_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_histories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_main_therapies`
--
ALTER TABLE `patient_main_therapies`
  ADD CONSTRAINT `patient_main_therapies_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_main_therapies_therapist_id_foreign` FOREIGN KEY (`therapist_id`) REFERENCES `therapists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_main_therapies_therapy_appointment_id_foreign` FOREIGN KEY (`therapy_appointment_id`) REFERENCES `therapy_appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_medical_supplements`
--
ALTER TABLE `patient_medical_supplements`
  ADD CONSTRAINT `patient_medical_supplements_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_medical_supplements_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_medical_supplements_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_packages`
--
ALTER TABLE `patient_packages`
  ADD CONSTRAINT `patient_packages_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_packages_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_packages_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_therapies`
--
ALTER TABLE `patient_therapies`
  ADD CONSTRAINT `patient_therapies_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_therapies_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_therapies_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_therapy_details`
--
ALTER TABLE `patient_therapy_details`
  ADD CONSTRAINT `patient_therapy_details_patient_therapy_id_foreign` FOREIGN KEY (`patient_therapy_id`) REFERENCES `patient_therapies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `single_ingredients`
--
ALTER TABLE `single_ingredients`
  ADD CONSTRAINT `single_ingredients_therapy_appointment_detail_id_foreign` FOREIGN KEY (`therapy_appointment_detail_id`) REFERENCES `therapy_appointment_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `therapists`
--
ALTER TABLE `therapists`
  ADD CONSTRAINT `therapists_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `therapy_appointments`
--
ALTER TABLE `therapy_appointments`
  ADD CONSTRAINT `therapy_appointments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `therapy_appointment_details`
--
ALTER TABLE `therapy_appointment_details`
  ADD CONSTRAINT `therapy_appointment_details_therapy_appointment_id_foreign` FOREIGN KEY (`therapy_appointment_id`) REFERENCES `therapy_appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `therapy_details`
--
ALTER TABLE `therapy_details`
  ADD CONSTRAINT `therapy_details_therapy_ingredient_id_foreign` FOREIGN KEY (`therapy_ingredient_id`) REFERENCES `therapy_ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `therapy_details_therapy_list_id_foreign` FOREIGN KEY (`therapy_list_id`) REFERENCES `therapy_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vaman_yoga_lists`
--
ALTER TABLE `vaman_yoga_lists`
  ADD CONSTRAINT `vaman_yoga_lists_agrement_form_one_id_foreign` FOREIGN KEY (`agrement_form_one_id`) REFERENCES `agrement_form_ones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `walk_by_patients`
--
ALTER TABLE `walk_by_patients`
  ADD CONSTRAINT `walk_by_patients_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `walk_by_patient_services`
--
ALTER TABLE `walk_by_patient_services`
  ADD CONSTRAINT `walk_by_patient_services_walk_by_patient_id_foreign` FOREIGN KEY (`walk_by_patient_id`) REFERENCES `walk_by_patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
