-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 10:07 PM
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
-- Database: `ayurveda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
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

INSERT INTO `admins` (`id`, `name`, `phone`, `position`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', '123456789', 'admin', NULL, 'superadmin@gmail.com', NULL, '$2y$10$/uJW1LBGSzAx3mlEauGJ4OiXqhWQZVs0KudVo0VTOBoswXwdV1UVe', NULL, '2023-05-14 07:25:03', '2023-05-14 07:25:03');

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
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
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
(16, '2023_05_14_143955_create_bills_table', 2),
(17, '2023_05_14_144038_create_doctor_appointments_table', 2),
(18, '2023_05_14_144124_create_therapy_appointments_table', 2),
(19, '2023_05_14_144154_create_therapy_appointment_date_and_times_table', 3),
(20, '2023_05_14_144220_create_therapy_appointment_details_table', 3),
(21, '2023_05_14_145248_create_patient_histories_table', 3),
(22, '2023_05_14_145316_create_staff_table', 3),
(23, '2023_05_14_145339_create_therapists_table', 3),
(24, '2023_05_14_145616_create_patient_herbs_table', 3),
(25, '2023_05_14_145658_create_patient_therapies_table', 3),
(26, '2023_05_14_145731_create_patient_medical_supplements_table', 3),
(27, '2023_05_14_151349_create_diet_charts_table', 3),
(28, '2023_05_14_153153_create_health_supplements_table', 3),
(29, '2023_05_14_153224_create_medicines_table', 3),
(30, '2023_05_14_153338_create_payments_table', 3),
(31, '2023_05_14_153414_create_rewards_table', 3),
(32, '2023_05_14_153632_create_therapy_ingredients_table', 3),
(33, '2023_05_14_153706_create_therapy_lists_table', 3),
(34, '2023_05_14_155945_create_therapy_details_table', 3);

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
(5, 'App\\Models\\Admin', 1);

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
  `part_of_the_day` varchar(255) NOT NULL,
  `how_many_dose` varchar(255) NOT NULL,
  `main_time` varchar(255) NOT NULL,
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
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_appointment_id` bigint(20) UNSIGNED NOT NULL,
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
  `amount` varchar(255) NOT NULL,
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
  `group_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `group_name`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'dashboard.view', 'admin', '2023-05-14 07:24:57', '2023-05-14 07:24:57'),
(2, 'dashboard', 'dashboard.edit', 'admin', '2023-05-14 07:24:57', '2023-05-14 07:24:57'),
(3, 'walkByPatient', 'walkByPatientAdd', 'admin', '2023-05-14 07:24:57', '2023-05-14 07:24:57'),
(4, 'walkByPatient', 'walkByPatientView', 'admin', '2023-05-14 07:24:57', '2023-05-14 07:24:57'),
(5, 'walkByPatient', 'walkByPatientDelete', 'admin', '2023-05-14 07:24:57', '2023-05-14 07:24:57'),
(6, 'walkByPatient', 'walkByPatientUpdate', 'admin', '2023-05-14 07:24:57', '2023-05-14 07:24:57'),
(7, 'patient', 'patientAdd', 'admin', '2023-05-14 07:24:58', '2023-05-14 07:24:58'),
(8, 'patient', 'patientView', 'admin', '2023-05-14 07:24:58', '2023-05-14 07:24:58'),
(9, 'patient', 'patientDelete', 'admin', '2023-05-14 07:24:58', '2023-05-14 07:24:58'),
(10, 'patient', 'patientUpdate', 'admin', '2023-05-14 07:24:58', '2023-05-14 07:24:58'),
(11, 'patientAdmit', 'patientAdmitAdd', 'admin', '2023-05-14 07:24:58', '2023-05-14 07:24:58'),
(12, 'patientAdmit', 'patientAdmitView', 'admin', '2023-05-14 07:24:58', '2023-05-14 07:24:58'),
(13, 'patientAdmit', 'patientAdmitDelete', 'admin', '2023-05-14 07:24:58', '2023-05-14 07:24:58'),
(14, 'patientAdmit', 'patientAdmitUpdate', 'admin', '2023-05-14 07:24:59', '2023-05-14 07:24:59'),
(15, 'doctor', 'doctorAdd', 'admin', '2023-05-14 07:24:59', '2023-05-14 07:24:59'),
(16, 'doctor', 'doctorView', 'admin', '2023-05-14 07:24:59', '2023-05-14 07:24:59'),
(17, 'doctor', 'doctorDelete', 'admin', '2023-05-14 07:24:59', '2023-05-14 07:24:59'),
(18, 'doctor', 'doctorUpdate', 'admin', '2023-05-14 07:24:59', '2023-05-14 07:24:59'),
(19, 'systemInformation', 'systemInformationAdd', 'admin', '2023-05-14 07:24:59', '2023-05-14 07:24:59'),
(20, 'systemInformation', 'systemInformationView', 'admin', '2023-05-14 07:25:00', '2023-05-14 07:25:00'),
(21, 'systemInformation', 'systemInformationDelete', 'admin', '2023-05-14 07:25:00', '2023-05-14 07:25:00'),
(22, 'systemInformation', 'systemInformationUpdate', 'admin', '2023-05-14 07:25:00', '2023-05-14 07:25:00'),
(23, 'user', 'userAdd', 'admin', '2023-05-14 07:25:00', '2023-05-14 07:25:00'),
(24, 'user', 'userView', 'admin', '2023-05-14 07:25:00', '2023-05-14 07:25:00'),
(25, 'user', 'userDelete', 'admin', '2023-05-14 07:25:01', '2023-05-14 07:25:01'),
(26, 'user', 'userUpdate', 'admin', '2023-05-14 07:25:01', '2023-05-14 07:25:01'),
(27, 'role', 'roleAdd', 'admin', '2023-05-14 07:25:01', '2023-05-14 07:25:01'),
(28, 'role', 'roleView', 'admin', '2023-05-14 07:25:01', '2023-05-14 07:25:01'),
(29, 'role', 'roleDelete', 'admin', '2023-05-14 07:25:02', '2023-05-14 07:25:02'),
(30, 'role', 'roleUpdate', 'admin', '2023-05-14 07:25:02', '2023-05-14 07:25:02'),
(31, 'permission', 'permissionAdd', 'admin', '2023-05-14 07:25:02', '2023-05-14 07:25:02'),
(32, 'permission', 'permissionView', 'admin', '2023-05-14 07:25:02', '2023-05-14 07:25:02'),
(33, 'permission', 'permissionDelete', 'admin', '2023-05-14 07:25:02', '2023-05-14 07:25:02'),
(34, 'permission', 'permissionUpdate', 'admin', '2023-05-14 07:25:02', '2023-05-14 07:25:02'),
(35, 'profile', 'profile.view', 'admin', '2023-05-14 07:25:02', '2023-05-14 07:25:02'),
(36, 'profile', 'profile.edit', 'admin', '2023-05-14 07:25:03', '2023-05-14 07:25:03'),
(41, 'staff', 'staffAdd', 'admin', NULL, NULL),
(42, 'staff', 'staffView', 'admin', NULL, NULL),
(43, 'staff', 'staffDelete', 'admin', NULL, NULL),
(44, 'staff', 'staffUpdate', 'admin', NULL, NULL),
(45, 'reward', 'rewardAdd', 'admin', NULL, NULL),
(46, 'reward', 'rewardView', 'admin', NULL, NULL),
(47, 'reward', 'rewardDelete', 'admin', NULL, NULL),
(48, 'reward', 'rewardUpdate', 'admin', NULL, NULL),
(49, 'therapist', 'therapistAdd', 'admin', NULL, NULL),
(50, 'therapist', 'therapistView', 'admin', NULL, NULL),
(51, 'therapist', 'therapistDelete', 'admin', NULL, NULL),
(52, 'therapist', 'therapistUpdate', 'admin', NULL, NULL),
(53, 'dietCharts', 'dietChartsAdd', 'admin', NULL, NULL),
(54, 'dietCharts', 'dietChartsView', 'admin', NULL, NULL),
(55, 'dietCharts', 'dietChartsDelete', 'admin', NULL, NULL),
(56, 'dietCharts', 'dietChartsUpdate', 'admin', NULL, NULL),
(57, 'medicineLists', 'medicineListsAdd', 'admin', NULL, NULL),
(58, 'medicineLists', 'medicineListsView', 'admin', NULL, NULL),
(59, 'medicineLists', 'medicineListsDelete', 'admin', NULL, NULL),
(60, 'medicineLists', 'medicineListsUpdate', 'admin', NULL, NULL),
(61, 'healthSupplements', 'healthSupplementsAdd', 'admin', NULL, NULL),
(62, 'healthSupplements', 'healthSupplementsView', 'admin', NULL, NULL),
(63, 'healthSupplements', 'healthSupplementsDelete', 'admin', NULL, NULL),
(64, 'healthSupplements', 'healthSupplementsUpdate', 'admin', NULL, NULL),
(65, 'therapyIngredients', 'therapyIngredientsAdd', 'admin', NULL, NULL),
(66, 'therapyIngredients', 'therapyIngredientsView', 'admin', NULL, NULL),
(67, 'therapyIngredients', 'therapyIngredientsDelete', 'admin', NULL, NULL),
(68, 'therapyIngredients', 'therapyIngredientsUpdate', 'admin', NULL, NULL),
(69, 'therapyLists', 'therapyListsAdd', 'admin', NULL, NULL),
(70, 'therapyLists', 'therapyListsView', 'admin', NULL, NULL),
(71, 'therapyLists', 'therapyListsDelete', 'admin', NULL, NULL),
(72, 'therapyLists', 'therapyListsUpdate', 'admin', NULL, NULL),
(73, 'doctorWaitingList', 'doctorWaitingListAdd', 'admin', NULL, NULL),
(74, 'doctorWaitingList', 'doctorWaitingListView', 'admin', NULL, NULL),
(75, 'doctorWaitingList', 'doctorWaitingListDelete', 'admin', NULL, NULL),
(76, 'doctorWaitingList', 'doctorWaitingListUpdate', 'admin', NULL, NULL),
(77, 'patientPrescriptionList', 'patientPrescriptionListAdd', 'admin', NULL, NULL),
(78, 'patientPrescriptionList', 'patientPrescriptionListView', 'admin', NULL, NULL),
(79, 'patientPrescriptionList', 'patientPrescriptionListDelete', 'admin', NULL, NULL),
(80, 'patientPrescriptionList', 'patientPrescriptionListUpdate', 'admin', NULL, NULL),
(81, 'Billing', 'BillingAdd', 'admin', NULL, NULL),
(82, 'Billing', 'BillingView', 'admin', NULL, NULL),
(83, 'Billing', 'BillingUpdate', 'admin', NULL, NULL),
(84, 'Billing', 'BillingDelete', 'admin', NULL, NULL),
(85, 'revisedBilling', 'revisedBillingAdd', 'admin', NULL, NULL),
(86, 'revisedBilling', 'revisedBillingView', 'admin', NULL, NULL),
(87, 'revisedBilling', 'revisedBillingDelete', 'admin', NULL, NULL),
(88, 'revisedBilling', 'revisedBillingUpdate', 'admin', NULL, NULL),
(89, 'therapyAppointment', 'therapyAppointmentAdd', 'admin', NULL, NULL),
(90, 'therapyAppointment', 'therapyAppointmentView', 'admin', NULL, NULL),
(91, 'therapyAppointment', 'therapyAppointmentDelete', 'admin', NULL, NULL),
(92, 'therapyAppointment', 'therapyAppointmentUpdate', 'admin', NULL, NULL),
(93, 'walkByPatientTherapy', 'walkByPatientTherapyAdd', 'admin', NULL, NULL),
(94, 'walkByPatientTherapy', 'walkByPatientTherapyView', 'admin', NULL, NULL),
(95, 'walkByPatientTherapy', 'walkByPatientTherapyDelete', 'admin', NULL, NULL),
(96, 'walkByPatientTherapy', 'walkByPatientTherapyUpdate', 'admin', NULL, NULL),
(97, 'doctorAppointment', 'doctorAppointmentAdd', 'admin', NULL, NULL),
(98, 'doctorAppointment', 'doctorAppointmentView', 'admin', NULL, NULL),
(99, 'doctorAppointment', 'doctorAppointmentDelete', 'admin', NULL, NULL),
(100, 'doctorAppointment', 'doctorAppointmentUpdate', 'admin', NULL, NULL);

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
(5, 'superadmin', 'admin', '2023-05-14 07:24:56', '2023-05-14 07:24:56'),
(6, 'admin', 'admin', '2023-05-14 07:24:57', '2023-05-14 07:24:57'),
(7, 'staff', 'admin', '2023-05-14 07:24:57', '2023-05-14 10:56:45'),
(8, 'user', 'admin', '2023-05-14 07:24:57', '2023-05-14 07:24:57');

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
(1, 5),
(1, 7),
(2, 5),
(2, 7),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 5),
(58, 5),
(59, 5),
(60, 5),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 5),
(66, 5),
(67, 5),
(68, 5),
(69, 5),
(70, 5),
(71, 5),
(72, 5),
(73, 5),
(74, 5),
(75, 5),
(76, 5),
(77, 5),
(78, 5),
(79, 5),
(80, 5),
(81, 5),
(82, 5),
(83, 5),
(84, 5),
(85, 5),
(86, 5),
(87, 5),
(88, 5),
(89, 5),
(90, 5),
(91, 5),
(92, 5),
(93, 5),
(94, 5),
(95, 5),
(96, 5),
(97, 5),
(98, 5),
(99, 5),
(100, 5);

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
(1, 'Ayurveda', '11111111', 'm@gmail.com', 'mirpur', 'public/uploads/168407259320230514mlogo.png', 'public/uploads/168407247720230514mlogo.png', '2023-05-14 07:54:37', '2023-05-14 07:56:33');

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
  `status` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
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
  `name` text NOT NULL,
  `amount` varchar(255) NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapy_ingredients`
--

CREATE TABLE `therapy_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
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
-- Indexes for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_histories_admin_id_foreign` (`admin_id`),
  ADD KEY `patient_histories_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_histories_doctor_appointment_id_foreign` (`doctor_appointment_id`);

--
-- Indexes for table `patient_medical_supplements`
--
ALTER TABLE `patient_medical_supplements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_medical_supplements_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_medical_supplements_doctor_appointment_id_foreign` (`doctor_appointment_id`),
  ADD KEY `patient_medical_supplements_patient_history_id_foreign` (`patient_history_id`);

--
-- Indexes for table `patient_therapies`
--
ALTER TABLE `patient_therapies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_therapies_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_therapies_doctor_appointment_id_foreign` (`doctor_appointment_id`),
  ADD KEY `patient_therapies_patient_history_id_foreign` (`patient_history_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diet_charts`
--
ALTER TABLE `diet_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_consult_dates`
--
ALTER TABLE `doctor_consult_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_supplements`
--
ALTER TABLE `health_supplements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_admits`
--
ALTER TABLE `patient_admits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_files`
--
ALTER TABLE `patient_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_herbs`
--
ALTER TABLE `patient_herbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_histories`
--
ALTER TABLE `patient_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_medical_supplements`
--
ALTER TABLE `patient_medical_supplements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_therapies`
--
ALTER TABLE `patient_therapies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapy_appointments`
--
ALTER TABLE `therapy_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapy_appointment_date_and_times`
--
ALTER TABLE `therapy_appointment_date_and_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapy_appointment_details`
--
ALTER TABLE `therapy_appointment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapy_details`
--
ALTER TABLE `therapy_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapy_ingredients`
--
ALTER TABLE `therapy_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapy_lists`
--
ALTER TABLE `therapy_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walk_by_patients`
--
ALTER TABLE `walk_by_patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walk_by_patient_services`
--
ALTER TABLE `walk_by_patient_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `bills_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD CONSTRAINT `doctor_appointments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `doctor_appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctor_consult_dates`
--
ALTER TABLE `doctor_consult_dates`
  ADD CONSTRAINT `doctor_consult_dates_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

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
  ADD CONSTRAINT `patients_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `patient_admits`
--
ALTER TABLE `patient_admits`
  ADD CONSTRAINT `patient_admits_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `patient_admits_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `patient_files`
--
ALTER TABLE `patient_files`
  ADD CONSTRAINT `patient_files_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `patient_herbs`
--
ALTER TABLE `patient_herbs`
  ADD CONSTRAINT `patient_herbs_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`),
  ADD CONSTRAINT `patient_herbs_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `patient_herbs_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`);

--
-- Constraints for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD CONSTRAINT `patient_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `patient_histories_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`),
  ADD CONSTRAINT `patient_histories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `patient_medical_supplements`
--
ALTER TABLE `patient_medical_supplements`
  ADD CONSTRAINT `patient_medical_supplements_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`),
  ADD CONSTRAINT `patient_medical_supplements_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `patient_medical_supplements_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`);

--
-- Constraints for table `patient_therapies`
--
ALTER TABLE `patient_therapies`
  ADD CONSTRAINT `patient_therapies_doctor_appointment_id_foreign` FOREIGN KEY (`doctor_appointment_id`) REFERENCES `doctor_appointments` (`id`),
  ADD CONSTRAINT `patient_therapies_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `patient_therapies_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `therapists`
--
ALTER TABLE `therapists`
  ADD CONSTRAINT `therapists_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `therapy_appointments`
--
ALTER TABLE `therapy_appointments`
  ADD CONSTRAINT `therapy_appointments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `therapy_appointment_details`
--
ALTER TABLE `therapy_appointment_details`
  ADD CONSTRAINT `therapy_appointment_details_therapy_appointment_id_foreign` FOREIGN KEY (`therapy_appointment_id`) REFERENCES `therapy_appointments` (`id`);

--
-- Constraints for table `therapy_details`
--
ALTER TABLE `therapy_details`
  ADD CONSTRAINT `therapy_details_therapy_ingredient_id_foreign` FOREIGN KEY (`therapy_ingredient_id`) REFERENCES `therapy_ingredients` (`id`),
  ADD CONSTRAINT `therapy_details_therapy_list_id_foreign` FOREIGN KEY (`therapy_list_id`) REFERENCES `therapy_lists` (`id`);

--
-- Constraints for table `walk_by_patients`
--
ALTER TABLE `walk_by_patients`
  ADD CONSTRAINT `walk_by_patients_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `walk_by_patient_services`
--
ALTER TABLE `walk_by_patient_services`
  ADD CONSTRAINT `walk_by_patient_services_walk_by_patient_id_foreign` FOREIGN KEY (`walk_by_patient_id`) REFERENCES `walk_by_patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
