-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 09:04 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `swift_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IBAN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `bank_name`, `swift_code`, `IBAN`, `account_no`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, 'updated', '123', '123', '123123', 'patoki', '2019-10-22 21:27:22', '2019-10-23 22:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0,
  `msg_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `to`, `from`, `message`, `created_at`, `updated_at`, `read_status`, `msg_time`) VALUES
(1, 65, 64, 'Yes jhfyhf', '2019-10-22 17:21:56', '2019-10-22 17:21:56', 0, ''),
(2, 65, 64, 'Yes jhfyhf', '2019-10-23 19:20:51', '2019-10-23 19:20:51', 0, ''),
(3, 65, 64, 'Yes jhfyhf', '2019-10-23 20:15:14', '2019-10-23 20:15:14', 0, '1571836514');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `percentage` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `issue_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`id`, `user_id`, `type`, `issue_name`, `issue_type`, `issue_description`, `status`, `created_at`, `updated_at`, `user_type`) VALUES
(2, 1, '1', '1', '1', '1', '1', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567885748, 1567885748),
(2, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567885813, 1567885813),
(3, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567922290, 1567922290),
(4, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567927507, 1567927507),
(5, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567930664, 1567930664),
(6, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567930794, 1567930794),
(7, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567931115, 1567931115),
(8, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567932647, 1567932647),
(9, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567932770, 1567932770),
(10, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567932929, 1567932929),
(11, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567933107, 1567933107),
(12, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567953693, 1567953693),
(13, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567968833, 1567968833),
(14, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1572005313, 1572005313),
(15, 'default', '{\"displayName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\addDispatchLogsDb\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\addDispatchLogsDb\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1572010548, 1572010548);

-- --------------------------------------------------------

--
-- Table structure for table `job_dispatch_logs`
--

CREATE TABLE `job_dispatch_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `provider_fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_accept_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_id` int(11) NOT NULL DEFAULT 0
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
(3, '2019_04_18_202636_add_fields_in_users_table', 2),
(4, '2019_04_18_203408_create_providers_table', 2),
(5, '2019_04_21_191240_add_first_name_and_last_name_in_users_table', 3),
(6, '2019_04_21_203648_add_user_type_field_in_users_table', 4),
(7, '2019_04_22_211634_rename_name_column_users_table', 5),
(8, '2019_04_24_131642_rename_license_column_in_providers_table', 6),
(9, '2019_04_25_132057_create_system_prefrences_table', 7),
(10, '2019_04_25_133254_create_services_table', 7),
(11, '2019_04_26_133414_update_password_field_to_nullable_in_users_table', 8),
(12, '2019_04_28_121151_update_email_field_to_nullable_in_users_table', 9),
(13, '2019_05_02_114157_create_jobs_table', 10),
(14, '2019_05_05_112211_add_location_address_field_in_jobs_table', 11),
(15, '2019_05_07_205451_add_queued_job_in_providers_table', 12),
(16, '2019_05_11_212018_add_job_schadual_time_in_jobs_table', 13),
(17, '2019_05_11_212641_add_time_zone_in_users_table', 13),
(18, '2019_05_12_194608_add_auto_dispatch_field_in_jobs_table', 14),
(19, '2019_05_13_102126_add_stripe_unique_id_in_users_table', 15),
(20, '2019_05_25_113304_add_rating_feedback_field_in_job_table', 16),
(21, '2019_05_25_114647_add_rating_field_in_users_table', 17),
(22, '2019_05_16_111044_create_discounts_table', 18),
(23, '2019_05_22_102136_update_discounts_table', 18),
(24, '2019_06_13_101251_add_edit_job_check_field_in_jobs_table', 19),
(25, '2019_06_13_133638_add_coupon_percentage_field_in_discounts_table', 20),
(26, '2019_06_14_132101_add_notifications_table', 21),
(27, '2019_06_14_140118_add_admin_notify_column_in_jobs_table', 22),
(28, '2019_08_03_170415_add_job_dispatch_log_table', 23),
(29, '2019_08_03_172444_add_job_id_column_job_dispatch_log_table', 24),
(30, '2019_08_03_180422_rename_jobs_table', 25),
(31, '2019_08_03_180532_rename_systemjobs_table', 26),
(32, '2019_08_03_180940_create_jobs_table', 27),
(33, '2019_08_03_182553_create_failed_jobs_table', 28),
(34, '2019_08_18_191549_add_job_count_in_provider_table', 29),
(35, '2019_08_23_190154_add_provider_working_hours_log_table', 30),
(36, '2019_08_27_171947_add_reinit_field_in_provider_working_logs_table', 31),
(37, '2019_08_21_081144_create_guides_table', 32),
(38, '2019_08_22_113600_update_guides_table', 32),
(39, '2019_10_12_161640_update_user_table_erent_attributes', 33),
(40, '2019_10_13_133549_add_identity_verification_in_users_table', 34),
(41, '2019_10_16_114535_create_chats_table', 35),
(42, '2019_10_16_170838_add_read_attribute_in_chat_table', 36),
(43, '2019_10_21_142940_create_settings_table', 37),
(44, '2019_10_22_123447_create_banks_table', 38),
(45, '2019_10_23_093711_create_transactions_table', 39),
(46, '2019_10_23_130041_update_chat_message_time', 40),
(47, '2019_10_23_165932_update_forgot_password_column_users', 41),
(48, '2020_06_09_151602_create_packages_table', 42);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `type`, `data`, `viewed`, `created_at`, `updated_at`) VALUES
(1, 'Job ID #1493 Time Exeeds', 0, '{\"job_id\":1493,\"url\":\"admin\\/withdrawrequests\"}', 0, NULL, '2019-10-24 17:48:51'),
(2, 'Job ID #1493 Time Exeeds', 0, '{\"job_id\":1493,\"url\":\"admin\\/withdrawrequests\"}', 0, NULL, '2019-10-24 17:48:51'),
(3, 'Job ID #1493 Time Exeeds', 0, '{\"job_id\":1493,\"url\":\"admin\\/withdrawrequests\"}', 0, NULL, '2019-10-24 17:48:51'),
(4, 'Job ID #1493 Time Exeeds', 0, '{\"job_id\":1493,\"url\":\"admin\\/withdrawrequests\"}', 0, NULL, '2019-10-24 17:48:51'),
(5, 'Job ID #1493 Time Exeeds', 0, '{\"job_id\":1493,\"url\":\"admin\\/withdrawrequests\"}', 0, NULL, '2019-10-24 17:48:51'),
(6, 'Job ID #1493 Time Exeeds', 0, '{\"job_id\":1493,\"url\":\"admin\\/withdrawrequests\"}', 0, NULL, '2019-10-24 17:48:51'),
(7, 'Job ID #1493 Time Exeeds', 0, '{\"job_id\":1493,\"url\":\"admin\\/withdrawrequests\"}', 0, NULL, '2019-10-24 17:48:51'),
(8, 'Job ID #1493 Time Exeeds', 0, '{\"job_id\":1493,\"url\":\"admin\\/withdrawrequests\"}', 0, NULL, '2019-10-24 17:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `off_percentage` int(11) NOT NULL,
  `off_bit` int(11) NOT NULL,
  `attributes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `tagline`, `price`, `duration`, `off_percentage`, `off_bit`, `attributes`, `created_at`, `updated_at`) VALUES
(1, 'Package 1', 'Package 1 Tagline', 10.00, 1, 0, 0, '{\"adverts\":\"2\",\"images_per_post\":\"2\",\"videos_per_post\":\"2\"}', '2020-06-09 13:38:06', '2020-06-09 13:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('maaniofficial42@gmail.com', '$2y$10$kDp3FXTe7msKixVDnx52i.9IO0Z5Y1CVH0Jc8Vp2wV9i9kx026dqW', '2020-06-08 10:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `license_img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `radius` int(11) NOT NULL DEFAULT 5,
  `approval_status` tinyint(1) NOT NULL DEFAULT 0,
  `job_status` tinyint(1) NOT NULL DEFAULT 0,
  `withdraw_status` tinyint(1) NOT NULL DEFAULT 0,
  `total_earning` double NOT NULL DEFAULT 0,
  `weekly_earning` double NOT NULL DEFAULT 0,
  `overall_rating` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `queued_job` int(11) NOT NULL DEFAULT 0,
  `job_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `user_id`, `license_img`, `radius`, `approval_status`, `job_status`, `withdraw_status`, `total_earning`, `weekly_earning`, `overall_rating`, `created_at`, `updated_at`, `queued_job`, `job_count`) VALUES
(2, 30, 'license_img/4bUANfcD1ZAONnDDHcAVYD862k2t6GkuvypX2gnv.jpeg', 5, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(4, 33, 'license_img/R0SppOBeKxtUCFBKKHeWhNgGBmGe3aCWHGMP33Lf.jpeg', 1, 0, 0, 0, 0, 0, 0, NULL, '2019-09-08 13:54:11', 25, -1),
(6, 34, NULL, 4, 1, 3, 0, 0, 0, 0, NULL, '2019-05-13 03:56:33', 0, 0),
(7, 35, NULL, 4, 1, 3, 0, 0, 0, 0, NULL, '2019-05-13 03:56:24', 0, 0),
(8, 37, NULL, 1, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(9, 38, NULL, 1, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(10, 39, NULL, 12, 1, 3, 0, 0, 0, 0, NULL, '2019-05-13 03:56:29', 0, 0),
(11, 49, NULL, 0, 4, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(12, 50, NULL, 0, 5, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(13, 51, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(14, 52, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(15, 53, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-10-13 08:57:51', 0, 0),
(16, 55, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(17, 56, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0),
(18, 60, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `provider_working_logs`
--

CREATE TABLE `provider_working_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `login_time` bigint(20) NOT NULL DEFAULT 0,
  `logout_time` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reinit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider_working_logs`
--

INSERT INTO `provider_working_logs` (`id`, `provider_id`, `user_id`, `login_time`, `logout_time`, `created_at`, `updated_at`, `reinit`) VALUES
(46, 222, 0, 1566940260, 1566950399, '2019-08-28 12:21:43', '2019-08-28 12:37:06', 1),
(48, 222, 0, 1566950400, 0, '2019-08-28 12:37:06', '2019-08-28 12:37:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `commision` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `status`, `price`, `commision`, `created_at`, `updated_at`) VALUES
(2, '1 Car Lane', 0, 25, 10, NULL, '2019-04-25 10:39:41'),
(3, '2 Car Lanes', 0, 45, 10, NULL, '2019-04-25 10:39:41'),
(4, '3 Car Lanes', 0, 90, 10, NULL, '2019-04-25 10:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_maps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_places` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `google_maps`, `google_places`) VALUES
(1, 'AIzaSyC5rWpP4Bunck11Y6hQMiXkNN6ax0MTnIA', '1');

-- --------------------------------------------------------

--
-- Table structure for table `system_jobs`
--

CREATE TABLE `system_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_price` double NOT NULL DEFAULT 0,
  `provider_id` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `current_situation_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_work_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_approval` int(11) NOT NULL DEFAULT 0,
  `job_status` int(11) NOT NULL DEFAULT 1,
  `lat` double NOT NULL DEFAULT 0,
  `lng` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_schedual_time` bigint(20) NOT NULL DEFAULT 0,
  `auto_dispatch` tinyint(4) NOT NULL DEFAULT 0,
  `customer_rating` double NOT NULL DEFAULT 0,
  `driver_rating` double NOT NULL DEFAULT 0,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_job` int(11) NOT NULL DEFAULT 0,
  `admin_notify` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_jobs`
--

INSERT INTO `system_jobs` (`id`, `service_id`, `service_name`, `service_price`, `provider_id`, `customer_id`, `current_situation_img`, `after_work_img`, `customer_approval`, `job_status`, `lat`, `lng`, `created_at`, `updated_at`, `location_address`, `job_schedual_time`, `auto_dispatch`, `customer_rating`, `driver_rating`, `feedback`, `edit_job`, `admin_notify`) VALUES
(8, 3, '2 Car Lanes', 20, 34, 21, 'current_situation_img/P871HoNwRgXfVyptvghFuRS5I1rXlGlT70p6Swwi.jpeg', NULL, 0, 3, 31.5540049, 74.3048427, '2019-01-05 07:17:15', '2019-05-06 14:32:41', 'Bahria Town, Lahore, Pakistan', 1557686331, 0, 0, 0, NULL, 0, 0),
(9, 3, '2 Car Lanes', 45, 33, 21, 'current_situation_img/G9b9M24IUimsVkZqCVzY7ukrZ9xjfT5xzMn95KrT.jpeg', NULL, 0, 3, 31.5540049, 74.3048427, '2018-01-06 08:32:51', '2019-05-06 14:32:46', 'Chauburji, Lahore, Pakistan', 1557686331, 0, 0, 0, NULL, 0, 0),
(10, 3, '2 Car Lanes', 45, 33, 40, 'current_situation_img/7aX1ZnAiJxOjXSOO3jEB0IirpNe7K3Df1Rs5bkXn.jpeg', NULL, 0, 2, 31.5540049, 74.3048427, '2019-01-06 08:50:35', '2019-10-26 00:09:45', 'Chauburji, Lahore, Pakistan', 1557686331, 0, 0, 0, NULL, 0, 0),
(25, 2, '1 Car Lane', 25, 33, 21, NULL, NULL, 0, 2, -33.9258613, 151.05451749999997, '2019-09-08 13:53:49', '2019-09-08 13:54:05', 'Lahori Dhaba, Punchbowl Road, Punchbowl NSW, Australia', 1567968829, 0, 0, 0, NULL, 0, 0),
(26, 2, '1 Car Lane', 25, 0, 0, NULL, NULL, 0, 0, -33.9258613, 151.0545175, '2019-10-25 19:08:32', '2019-10-25 19:08:32', NULL, 0, 0, 0, 0, NULL, 0, 0),
(27, 2, '1 Car Lane', 25, 0, 0, NULL, NULL, 0, 2, -33.9258613, 151.0545175, '2020-02-18 20:35:48', '2020-02-21 10:23:32', 'Lahore, Pakistan', 0, 0, 0, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_prefrences`
--

CREATE TABLE `system_prefrences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `max_job_limit` int(11) NOT NULL DEFAULT 3,
  `max_job_cancellation_time` int(11) NOT NULL DEFAULT 3,
  `max_job_acception_time` int(11) NOT NULL DEFAULT 3,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_prefrences`
--

INSERT INTO `system_prefrences` (`id`, `max_job_limit`, `max_job_cancellation_time`, `max_job_acception_time`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 5, NULL, '2019-04-25 11:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending, 1-accepted, 2-rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 23.00, 0, NULL, '2019-10-23 18:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socket_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double NOT NULL DEFAULT 0,
  `lng` double NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `address2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` bigint(20) NOT NULL DEFAULT 0,
  `CardRevisionDate` bigint(20) NOT NULL DEFAULT 0,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ClassificationCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ComplianceType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `CountryCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `EndorsementCodeDescription` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EndorsementsCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ExpirationDate` int(11) NOT NULL DEFAULT 0,
  `EyeColor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `FirstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `FullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `HAZMATExpDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `HairColor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `IIN` int(11) NOT NULL DEFAULT 0,
  `IssueDate` int(11) NOT NULL DEFAULT 0,
  `IssuedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `JurisdictionCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `LastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `LicenseNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `LimitedDurationDocument` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `MiddleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `NamePrefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `OrganDonor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `PostalCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Race` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `RestrictionCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `RestrictionCodeDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `VehicleClassCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `VehicleClassCodeDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Veteran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `WeightKG` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `WeightLBS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `identity_verification` int(11) NOT NULL DEFAULT 1,
  `forgot_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `enabled` int(11) NOT NULL DEFAULT 1 COMMENT '0-Disabled,1-Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `avatar`, `address`, `fcm_token`, `socket_token`, `social_id`, `lat`, `lng`, `status`, `first_name`, `last_name`, `type`, `time_zone`, `stripe_unique_id`, `rating`, `address2`, `birthdate`, `CardRevisionDate`, `city`, `ClassificationCode`, `ComplianceType`, `Country`, `CountryCode`, `EndorsementCodeDescription`, `EndorsementsCode`, `ExpirationDate`, `EyeColor`, `FirstName`, `FullName`, `Gender`, `HAZMATExpDate`, `HairColor`, `Height`, `IIN`, `IssueDate`, `IssuedBy`, `JurisdictionCode`, `LastName`, `LicenseNumber`, `LimitedDurationDocument`, `MiddleName`, `NamePrefix`, `OrganDonor`, `PostalCode`, `Race`, `RestrictionCode`, `RestrictionCodeDescription`, `VehicleClassCode`, `VehicleClassCodeDescription`, `Veteran`, `WeightKG`, `WeightLBS`, `identity_verification`, `forgot_password`, `enabled`) VALUES
(1, 'admin', 'maaniofficial42@gmail.com', NULL, '$2y$10$aCOFe2HhyPwS2r3F4qL6wevFuIEb3dpEFYofgxCW7eRSx4y3HPhOS', 'UC2gfqIgW1DpQ0H9joHBJSDbm92KLC8Zc3B1wVt05ep42zNycWkwcjZQluCK', '2019-04-16 14:20:51', '2020-05-29 07:28:41', '123123', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 2, 'PKT', NULL, 0, NULL, 0, 0, '', '', '', '', '', NULL, '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', 1),
(60, 'MVTef', 'm.tallalmansoor@gmail.com', NULL, '$2y$10$/0w9l0ehiD8/XhHn6PPEwO7djIO8aBvXRlOnjy3lDnNnVFpsbDIgW', NULL, '2019-10-14 18:21:25', '2019-10-14 18:21:25', '32323232323', NULL, '16 bilal park', NULL, NULL, NULL, 0, 0, 0, 'M', 'Mansoor', 1, NULL, NULL, 0, NULL, 0, 0, '', '', '', '', '', NULL, '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 1),
(66, 'CreateCreate', 'Create@Create.com', NULL, '$2y$10$R37H/ITeBG47QEF0mYu06OvguWA7rnSW9hd9GTZES5Pz9i27dTr0W', NULL, '2020-05-29 07:36:00', '2020-05-29 07:38:38', '123', NULL, '123', NULL, NULL, NULL, 0, 0, 0, 'update', 'Create', 0, NULL, NULL, 0, NULL, 0, 0, '', '', '', '', '', NULL, '', 0, '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_dispatch_logs`
--
ALTER TABLE `job_dispatch_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_working_logs`
--
ALTER TABLE `provider_working_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_jobs`
--
ALTER TABLE `system_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_prefrences`
--
ALTER TABLE `system_prefrences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job_dispatch_logs`
--
ALTER TABLE `job_dispatch_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `provider_working_logs`
--
ALTER TABLE `provider_working_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_jobs`
--
ALTER TABLE `system_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `system_prefrences`
--
ALTER TABLE `system_prefrences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
