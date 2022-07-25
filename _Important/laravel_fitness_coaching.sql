-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2022 at 05:56 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_fitness_coaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name_en`, `name_ar`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'مدير', 'admin@admin.com', '$2y$10$W/UEQYBf3o2WHkw.1CLIUe6ZalL2pyj0cJ1igb8siY2y09wQ7EJHC', 'images/admins/default_admin.png', 'A1i2dDC3AzTFCWD0bTGWzjbPsdzjhw4LSjeJhGBCis8rFwDg4Da4PXLVxfDZ', '2022-07-16 11:08:00', '2022-07-21 05:38:47'),
(2, 'admin22', 'مدير 2', 'admin2@admin.com', '$2y$10$S11.axJIFUYoaS18J9Vex.S0KGjlnQ/7ugF1IZ8qZxjSDJjx8almu', 'images/admins/admin2.png', 'KjpqXFCl7epETemi8zvSgj2q8ZeN0kiOkirdt0I3FE2yM12BKAxtB8jL18vU', '2022-07-20 13:03:58', '2022-07-20 13:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `coach_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT '0',
  `day` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fees` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `coach_id`, `client_id`, `confirm`, `day`, `time`, `created_at`, `updated_at`, `fees`) VALUES
(40, 1, 1, 1, '2022-07-26', '18:00:00', '2022-07-24 03:02:38', '2022-07-24 03:51:57', 250),
(46, 1, 1, 1, '2022-07-26', '19:00:00', '2022-07-24 07:36:03', '2022-07-24 07:36:20', 250);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `code`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Cairo', 'القاهرة', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(2, 'Alexandria', 'الآسكندرية', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(3, 'El Buheira', 'البحيرة', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(4, 'Ḩalwān', 'حلوان', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(5, 'Suez', 'السويس', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(6, 'Al Manşūrah', 'المنصورة', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(7, 'Al Fayyūm', 'الفيوم', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(8, 'Port Said', 'بور سعيد', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(9, 'Az Zaqāzīq', 'الزقازيق', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(10, 'Ismailia', 'الاسماعيلية', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(11, 'Aswān', 'اسوان', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(12, 'Al Minyā', 'المنيا', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(13, 'Damietta', 'دمياط', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(14, 'Luxor', 'الاقصر', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(15, 'Qinā', 'قنا', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(16, 'Sūhāj', 'سوهاج', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(17, 'Banī Suwayf', 'بنى سويف', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(18, 'Al ‘Arīsh', 'العريش', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(19, 'Al Ghardaqah', 'الغربية', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(20, 'Banhā', 'بنها', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(21, 'Kafr ash Shaykh', 'كفر الشيخ', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(22, 'Marsá Maţrūḩ', 'مرسى مطروح', 'BS', 5, '2022-07-16 11:08:00', '2022-07-16 11:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/clients/default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name_en`, `name_ar`, `email`, `password`, `mobile`, `date_of_birth`, `gender`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'client1', NULL, 'client1@client.com', '$2y$10$RGd67sUj1ss4hGD0tmdHre.N/syj5lk2GJM6PhklhlEUt26Mjb6um', '01234567891', '1995-06-09', 'male', 'images/clients/default_client.png', NULL, '2022-07-16 11:08:00', '2022-07-21 08:03:39'),
(2, 'client2', 'ثانى عميل', 'client2@client.com', '$2y$10$fxI/pD8UkPVApsDiMWHzNehnopJQhhlhZsF075KrwKVuWqCnsvckm', '01234567892', '1990-05-09', 'female', 'images/clients/default_client.png', NULL, '2022-07-16 11:08:00', '2022-07-20 12:54:12'),
(13, 'client3', NULL, 'client3@client.com', '$2y$10$EkUy3nQFxEnkvBptE7Qpt.XtL4gxv5zau/V74Zwt0.quKbjSfE66C', '0100020003000', '2000-07-15', 'male', 'images/clients/4UPaUwzKrdBJbWCts1624BCOwfcR6Imgo4mCUVEN.png', NULL, '2022-07-21 07:48:40', '2022-07-24 06:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `session_time` int DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialist_id` bigint UNSIGNED DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `name_en`, `name_ar`, `email`, `password`, `gender`, `mobile`, `date_of_birth`, `session_time`, `address_en`, `address_ar`, `fees`, `image`, `specialist_id`, `country_id`, `city_id`, `district_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kareem Ashraf', 'كريم اشرف', 'coach1@coach.com', '$2y$10$gxmDp8i9ngAqiHDwk57iBeoh8PcA1ByG27RgpvG1FDBY25YnyqYJi', 'male', '01234567891', '1992-06-09', 15, 'Gym Zaman', 'جيم زمان', 250, 'images/coaches/5oMETIUK4U8GXNIPJNaIujwCRp0p4C0ge4hzgS3c.jpg', 1, 5, 2, 1, 'PQp76ySKCbjTLgy7BUZoL6FEtHbqRyOLgeyg9Sir6eBofpVwqE7oiOGNIyV2', '2022-07-16 11:08:00', '2022-07-24 06:47:30'),
(2, 'Amir Ali', 'أمير علي', 'coach2@coach.com', '$2y$10$VjU9kNOcCzT6lGzUaOqcg.5Oulv7TIS0JpPp27DnDxJbeXmewv5HO', 'male', '01234567892', '1990-05-09', 20, 'Steel House Gym', 'ستيل هاوس جيم', 100, 'images/coaches/hnrhqDzpSqEkYPCa84c5GlTZbSxS6zud3bBfGzhe.jpg', 5, 5, 2, 2, 'SbPqKfpLFKcmKXEkiszOaW69UFmN1LH5MNPgfvEt8gkQ8ln2QAGr3vC2Wc2b', '2022-07-16 11:08:00', '2022-07-21 17:16:23'),
(5, 'Mohamed Farag', 'محمد فرج', 'coach3@coach.com', '$2y$10$VjU9kNOcCzT6lGzUaOqcg.5Oulv7TIS0JpPp27DnDxJbeXmewv5HO', 'male', '01234567892', '1993-01-09', 20, 'Legend Gym', 'ليجيند جيم', 200, 'images/coaches/zf2EBsu0z898DUpHjsQqn5oktGuIg4A112FcKZx8.jpg', 2, 5, 2, 3, '4QS6FLcNT3', '2022-07-16 11:08:00', '2022-07-21 16:06:24'),
(6, 'Mahmoud Reda', 'محمود رضا', 'coach4@coach.com', '$2y$10$VjU9kNOcCzT6lGzUaOqcg.5Oulv7TIS0JpPp27DnDxJbeXmewv5HO', 'male', '01234567892', '1993-11-24', 20, 'Sporting Club', 'نادي سبورتنج', 230, 'images/coaches/Gis16je1RwmwkoWAf8yjGYjAQzqjgxKcYVs6fv7o.jpg', 3, 5, 2, 3, '4QS6FLcNT3', '2022-07-16 11:08:00', '2022-07-21 17:23:00'),
(7, 'Nancy Toman', 'نانسي طمان', 'coach5@coach.com', '$2y$10$VjU9kNOcCzT6lGzUaOqcg.5Oulv7TIS0JpPp27DnDxJbeXmewv5HO', 'female', '01234567892', '1998-05-09', 20, 'Elite Gymnastics Academy', 'ايليت جيمناستك اكاديمي', 150, 'images/coaches/1FJDhhJDuetzDB5EKxH9qhUSgT1YCjPaYchkqKSx.jpg', 4, 5, 2, 3, '4QS6FLcNT3', '2022-07-16 11:08:00', '2022-07-21 17:37:05'),
(8, 'Sherif Mohamed', 'شريف محمد', 'coach6@coach.com', '$2y$10$VjU9kNOcCzT6lGzUaOqcg.5Oulv7TIS0JpPp27DnDxJbeXmewv5HO', 'male', '01234567892', '1994-05-09', 20, 'Smoha Club', 'نادي سموحة', 130, 'images/coaches/sQHLBJ4eWkFZuGxPBBwhj5gg4oeUh3Ykxdax1qJ4.jpg', 6, 5, 2, 3, '4QS6FLcNT3', '2022-07-16 11:08:00', '2022-07-21 16:14:32'),
(9, 'Akram ElSayed', 'اكرم السيد', 'coach7@coach.com', '$2y$10$VjU9kNOcCzT6lGzUaOqcg.5Oulv7TIS0JpPp27DnDxJbeXmewv5HO', 'male', '01234567892', '1992-08-23', 20, 'Gold\'s Gym', 'جولد جيم', 180, 'images/coaches/CW6QUbnlkHYnZ5hkvSzHRFQ9Xg9Oqej2GDhOJlbU.jpg', 2, 5, 2, 1, '4QS6FLcNT3', '2022-07-16 11:08:00', '2022-07-21 16:22:41'),
(12, 'derdnr', 'edrfner', 'admdffnin@admin.com', '$2y$10$koFV3Gh.1GqX/KTdcI8ca.kTu9TcSVydhWnMJWKBNpMZCJnZIUK/S', 'male', '1212141241323413513', '2000-01-23', 60, 'bsedebsrd', 'zdbsd', 200, 'images/coaches/default_coach.png', 2, 5, 2, 1, NULL, '2022-07-23 17:34:55', '2022-07-23 17:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `coaches_schedule`
--

CREATE TABLE `coaches_schedule` (
  `id` bigint UNSIGNED NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `session_duration` int NOT NULL,
  `coach_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `day` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches_schedule`
--

INSERT INTO `coaches_schedule` (`id`, `from`, `to`, `session_duration`, `coach_id`, `created_at`, `updated_at`, `day`) VALUES
(6, '17:00:00', '22:00:00', 30, 2, '2022-07-22 17:00:14', '2022-07-22 17:00:14', '2022-07-28'),
(9, '18:00:00', '21:00:00', 30, 1, '2022-07-23 20:50:49', '2022-07-23 22:51:17', '2022-07-26'),
(10, '13:00:00', '16:00:00', 30, 1, '2022-07-23 20:52:34', '2022-07-23 22:51:37', '2022-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_en`, `name_ar`, `code`, `created_at`, `updated_at`) VALUES
(1, 'United States', '', 'US', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(2, 'Canada', '', 'CA', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(3, 'Germany', '', 'GR', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(4, 'Russia', '', 'RU', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(5, 'Egypt', '', 'BS', '2022-07-16 11:08:00', '2022-07-16 11:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name_en`, `name_ar`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Miami', 'ميامي', 2, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(2, 'Kafr Abdo', 'كفر عبدو', 2, '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(3, 'Sidi Gaber', 'سيدي جابر', 2, '2022-07-16 11:08:00', '2022-07-16 11:08:00');

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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint UNSIGNED NOT NULL,
  `coach_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `coach_id`, `client_id`, `comment`, `rate`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'Amazing coach, was patient with me until i became better.', '5', '2022-07-19 17:31:38', '2022-07-19 17:31:38'),
(2, 7, 1, 'Great coach!', '5', '2022-07-21 04:28:36', '2022-07-21 04:28:36'),
(3, 8, 1, 'Avarage Coach', '3', '2022-07-21 11:23:18', '2022-07-21 11:23:18'),
(4, 1, 2, 'Good coach, but i didn\'t like the high price though to be honest.', '4', '2022-07-21 11:24:02', '2022-07-21 11:24:02'),
(5, 1, 13, 'Perfect Coach, worth every pound of the high price.', '5', '2022-07-22 04:53:37', '2022-07-22 04:53:37'),
(8, 1, 1, 'Great Coach.', '5', '2022-07-24 03:54:07', '2022-07-24 03:54:07'),
(9, 1, 1, 'Avarage coach', '3', '2022-07-24 07:36:55', '2022-07-24 07:36:55');

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
(71, '2014_10_12_100000_create_password_resets_table', 1),
(72, '2019_08_19_000000_create_failed_jobs_table', 1),
(73, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(74, '2021_06_02_192453_create_settings_table', 1),
(75, '2022_06_24_111216_create_admins_table', 1),
(76, '2022_06_24_111437_create_specialists_table', 1),
(77, '2022_06_24_111623_create_clients_table', 1),
(78, '2022_06_24_111936_create_countries_table', 1),
(79, '2022_06_24_112014_create_cities_table', 1),
(80, '2022_06_24_112133_create_districts_table', 1),
(81, '2022_06_24_112722_create_coaches_table', 1),
(82, '2022_06_27_161957_create_feedbacks_table', 1),
(83, '2022_06_29_220504_create_coaches_schedule_table', 1),
(84, '2022_06_29_220807_create_books_table', 1);

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
('client1@client.com', 'easuZlK2oOZY', NULL),
('client1@client.com', 'SJCXHeN2XCR5', NULL),
('admin@admin.com', '$2y$10$V7vC9dis5zId54xUM.efHOap6ZlYKQ7CUdAEDuTS3yui3I9c0CUwq', '2022-07-23 22:52:33'),
('admin@admin.com', '71c25c0d1fe4cb0016fefce6c328e7a558c8925d4ddbfd79c7d0f82436753e05', '2022-07-23 22:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Client', 2, 'token', 'c606d57c3df18e0f8ae675718aef834808552a6376a9d99b54b37dd734cc6418', '[\"*\"]', '2022-07-16 11:11:27', '2022-07-16 11:10:44', '2022-07-16 11:11:27'),
(2, 'App\\Models\\Client', 2, 'token', '317b66bc0ed83998f36386feeade9a998e5f51e7bf2527d8312c25e10d52f190', '[\"*\"]', '2022-07-16 11:11:32', '2022-07-16 11:11:29', '2022-07-16 11:11:32'),
(3, 'App\\Models\\Client', 2, 'token', 'bba441af2229f1ea772d6a2eb78f7b3d7b8e81debb19d52611a77b3b5bbea991', '[\"*\"]', '2022-07-16 14:44:25', '2022-07-16 11:11:37', '2022-07-16 14:44:25'),
(4, 'App\\Models\\Client', 2, 'token', '684957715e7fbdab5acef2b84fc629f9736ce524dda1d540531e6edfd621e033', '[\"*\"]', '2022-07-17 12:40:18', '2022-07-17 12:40:13', '2022-07-17 12:40:18'),
(5, 'App\\Models\\Client', 2, 'token', '64da5b2a9f3e0caa5d96061ae7536466e3aab640c66464450cfb5e1967c3642e', '[\"*\"]', '2022-07-17 12:41:30', '2022-07-17 12:41:27', '2022-07-17 12:41:30'),
(6, 'App\\Models\\Client', 1, 'token', '31c0f19f2ed15be58b6f1929f0b7ddc5e3cf6b47b0a44723a8b32190275f1aba', '[\"*\"]', NULL, '2022-07-17 14:58:45', '2022-07-17 14:58:45'),
(7, 'App\\Models\\Client', 1, 'token', 'faf7276d61dec8480519680f66fce718808c41e11595ccc62f04e1a693880263', '[\"*\"]', '2022-07-18 13:28:20', '2022-07-18 13:03:09', '2022-07-18 13:28:20'),
(8, 'App\\Models\\Client', 1, 'token', '0b966e118fa417af981ee68897cd209577146ea5ce87859006f0c5b588481de7', '[\"*\"]', '2022-07-18 13:36:07', '2022-07-18 13:28:22', '2022-07-18 13:36:07'),
(9, 'App\\Models\\Client', 1, 'token', '17be540af97a42c099fc5b9b53d014147fc64d57b232d1defe6c696be0561d6a', '[\"*\"]', '2022-07-18 20:03:14', '2022-07-18 13:36:09', '2022-07-18 20:03:14'),
(10, 'App\\Models\\Client', 1, 'token', 'f36157b229fd0203c1905b3c8d2f078f55dca31b9e60cd148b266a8c5169d294', '[\"*\"]', '2022-07-19 03:49:09', '2022-07-18 20:03:17', '2022-07-19 03:49:09'),
(11, 'App\\Models\\Client', 1, 'token', '4d74ed9c5239bb99d5c7c6da14fc30f3557ff9ea06fe58794a68c40769ca2265', '[\"*\"]', '2022-07-19 05:13:54', '2022-07-19 04:07:47', '2022-07-19 05:13:54'),
(12, 'App\\Models\\Client', 1, 'token', '85ac6e35bbb9185c680dcf8be84dfd19f12bba0f7a1a1c0781f9853af15663cf', '[\"*\"]', '2022-07-19 05:47:39', '2022-07-19 05:14:00', '2022-07-19 05:47:39'),
(13, 'App\\Models\\Client', 1, 'token', 'd563182df6f4ad7444e603180d8a1d00df47eaa42d7945adeadd2c01315104a3', '[\"*\"]', '2022-07-19 17:38:30', '2022-07-19 05:47:42', '2022-07-19 17:38:30'),
(14, 'App\\Models\\Client', 1, 'token', '2bde5ee17c2183050450762b9ef3ac5345d4247b0de00762c3fa2058cb938f3f', '[\"*\"]', '2022-07-19 17:39:03', '2022-07-19 17:38:57', '2022-07-19 17:39:03'),
(15, 'App\\Models\\Client', 1, 'token', '27445cc3378532c7784ca946fd9220e1ea273930d77a339ca41e81c9dc09cc5f', '[\"*\"]', '2022-07-19 17:46:47', '2022-07-19 17:39:54', '2022-07-19 17:46:47'),
(16, 'App\\Models\\Client', 1, 'token', 'efab3aca0d3289b287a54195f3a02dd160579684ba0838589872bba6d974a00c', '[\"*\"]', '2022-07-19 17:47:11', '2022-07-19 17:47:00', '2022-07-19 17:47:11'),
(17, 'App\\Models\\Client', 1, 'token', 'af4dec84f9c7ffa3c9d8ae285c418755bb59c08695d224f9fe69a0b2f88465ed', '[\"*\"]', '2022-07-19 17:54:30', '2022-07-19 17:52:26', '2022-07-19 17:54:30'),
(18, 'App\\Models\\Client', 1, 'token', '4296cf8f5803984e026cbbbb4debe9b1e9d770521aa1033b528a85d641a3ebeb', '[\"*\"]', '2022-07-20 05:20:43', '2022-07-20 05:20:40', '2022-07-20 05:20:43'),
(19, 'App\\Models\\Client', 1, 'token', 'e9701626b569ce1c311da797e84d5629711336cc92206782c3e943540accd15f', '[\"*\"]', '2022-07-20 10:19:38', '2022-07-20 10:19:37', '2022-07-20 10:19:38'),
(20, 'App\\Models\\Client', 1, 'token', 'f381e4fb96903755f29c230b72256606ae65da8a4c24474de5398b9ede2d613b', '[\"*\"]', '2022-07-20 10:23:55', '2022-07-20 10:23:38', '2022-07-20 10:23:55'),
(21, 'App\\Models\\Client', 1, 'token', '01a126ecb04322909a1a8d9055a4bea941e23aea9a40dd9ded95592682d69bcb', '[\"*\"]', '2022-07-20 13:30:08', '2022-07-20 10:24:04', '2022-07-20 13:30:08'),
(22, 'App\\Models\\Client', 2, 'token', 'ffba567eb795a4c1ecd273c8b047478c80e10b5e77c08f4b59fbecee525d2107', '[\"*\"]', '2022-07-21 06:32:13', '2022-07-20 13:30:13', '2022-07-21 06:32:13'),
(23, 'App\\Models\\Client', 2, 'token', 'f103eef46e66f1a48233b0b7d1f7a9ab1458aed12fc4d1742d693f274ec5bf60', '[\"*\"]', '2022-07-21 06:35:34', '2022-07-21 06:33:53', '2022-07-21 06:35:34'),
(24, 'App\\Models\\Client', 2, 'token', '1ea0ae49a20c6757dfdbd6b0cbdbd1e6d2f8569c8301d35769c1e5ac030bcd03', '[\"*\"]', '2022-07-21 06:44:28', '2022-07-21 06:35:44', '2022-07-21 06:44:28'),
(25, 'App\\Models\\Client', 2, 'token', 'ebc5bb645326f0811c0fbd3a9927bb9b6e77049994dfac3345ed56206c6c9fc8', '[\"*\"]', '2022-07-21 06:45:40', '2022-07-21 06:45:27', '2022-07-21 06:45:40'),
(26, 'App\\Models\\Client', 2, 'token', '4d1fe13bbbdbee7be0ab400bf76e088b6ad0c5db1624aa4f558ea133bd2354ce', '[\"*\"]', '2022-07-21 06:46:02', '2022-07-21 06:46:00', '2022-07-21 06:46:02'),
(27, 'App\\Models\\Client', 2, 'token', '325219346cf113b142b5197fbb74c0e64a706cb96090b252eef0ebb75b233d21', '[\"*\"]', '2022-07-21 06:46:30', '2022-07-21 06:46:28', '2022-07-21 06:46:30'),
(28, 'App\\Models\\Client', 2, 'token', '4419021da9346ff460823c96910b0f59b36912977d423150f342f11376ed41ed', '[\"*\"]', '2022-07-21 06:58:54', '2022-07-21 06:56:29', '2022-07-21 06:58:54'),
(29, 'App\\Models\\Client', 11, 'token', 'e73c08ce4bd6c083f2ff5b1b1aeffcc8cf80b50c1cddd49bd86bf606ad2e4aff', '[\"*\"]', '2022-07-21 07:47:15', '2022-07-21 07:09:24', '2022-07-21 07:47:15'),
(30, 'App\\Models\\Client', 12, 'token', '4a3cdede748181b9c084fa3f5a4c352e1029f179d3282a686d83eb08d8bfc4b1', '[\"*\"]', '2022-07-21 07:48:01', '2022-07-21 07:47:55', '2022-07-21 07:48:01'),
(31, 'App\\Models\\Client', 13, 'token', '61d6f4757fe2cd4189c897f70bb9769fa8b446bd8a62bb0b305e6777e8c5fce6', '[\"*\"]', '2022-07-21 07:48:50', '2022-07-21 07:48:46', '2022-07-21 07:48:50'),
(32, 'App\\Models\\Client', 13, 'token', '0c2b054fbdfeb646143674e130d8c298b8437a82e5ada1e2ae3593f36150436f', '[\"*\"]', '2022-07-21 08:03:26', '2022-07-21 07:48:56', '2022-07-21 08:03:26'),
(33, 'App\\Models\\Client', 1, 'token', '8f227879b87c89e9bff74646d87db5ba15100c740b42d7d2f9e97a98b84fbf29', '[\"*\"]', '2022-07-21 08:03:48', '2022-07-21 08:03:31', '2022-07-21 08:03:48'),
(34, 'App\\Models\\Client', 1, 'token', 'c2327c1d5fd4a932c6084cd1e651682420346311f02cf01952ea3300b282971d', '[\"*\"]', '2022-07-21 08:26:02', '2022-07-21 08:03:52', '2022-07-21 08:26:02'),
(35, 'App\\Models\\Client', 1, 'token', '42b9d20266afb51b6df275f25ae022a73096d483993717391b43a1436901d394', '[\"*\"]', '2022-07-22 04:52:54', '2022-07-21 08:26:06', '2022-07-22 04:52:54'),
(36, 'App\\Models\\Client', 2, 'token', '4e10b9e6de2980f8e1fc4622e80ea721d22037eec14dae47f61e2a62c39f9f8f', '[\"*\"]', '2022-07-22 17:09:45', '2022-07-22 04:52:58', '2022-07-22 17:09:45'),
(37, 'App\\Models\\Client', 1, 'token', '45f288d8bb4089eb9767a7e4432c7fe8e47ccec66eb929db592fcec339592817', '[\"*\"]', '2022-07-23 17:49:16', '2022-07-23 13:30:19', '2022-07-23 17:49:16'),
(38, 'App\\Models\\Client', 1, 'token', '7269227f30a9f125e5f3c222ea4b869f70ed911e9bee97dc9849d98cee2b0bdb', '[\"*\"]', '2022-07-23 17:59:51', '2022-07-23 17:49:22', '2022-07-23 17:59:51'),
(39, 'App\\Models\\Client', 1, 'token', '7faf225f83df38de65366275c171bd25ee39dc49035ea3374798fec988c63c0a', '[\"*\"]', '2022-07-23 18:49:37', '2022-07-23 18:12:49', '2022-07-23 18:49:37'),
(40, 'App\\Models\\Client', 1, 'token', 'c969c754762e7fbeda371d75f312e0e4a4a5bc2b237959a201c4433194a6379f', '[\"*\"]', '2022-07-24 03:50:05', '2022-07-23 20:16:55', '2022-07-24 03:50:05'),
(41, 'App\\Models\\Client', 1, 'token', '1ffab52b662739c74c20b8aba59f6e2daaffc43316f44dcd917dcf7e5c65d645', '[\"*\"]', '2022-07-24 07:33:22', '2022-07-24 03:52:45', '2022-07-24 07:33:22'),
(42, 'App\\Models\\Client', 1, 'token', 'ec06d20de02fb869965d3011102893ea7fa0f75b277ac442e21e5d5cc327e4d6', '[\"*\"]', '2022-07-24 07:36:58', '2022-07-24 07:35:32', '2022-07-24 07:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `sitename_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitename_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `keywords` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `maintenance_message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename_en`, `sitename_ar`, `logo`, `icon`, `email`, `main_lang`, `description`, `keywords`, `status`, `maintenance_message`, `created_at`, `updated_at`) VALUES
(1, 'Captainy', 'كابتني', NULL, NULL, 'captainy@business.com', 'en', NULL, NULL, 'open', NULL, '2022-07-16 11:08:00', '2022-07-22 16:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` bigint UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'فقدان الوزن', 'Weight loss', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(2, 'كمال اجسام', 'Bodybuilding', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(3, 'سباحه', 'Swimming', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(4, 'جمباز', 'Gymnastics', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(5, 'دفاع عن النفس', 'Self defence', '2022-07-16 11:08:00', '2022-07-16 11:08:00'),
(6, 'تنس', 'Tennis', '2022-07-16 11:08:00', '2022-07-16 11:08:00');

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
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_coach_id_foreign` (`coach_id`),
  ADD KEY `books_client_id_foreign` (`client_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_mobile_unique` (`mobile`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coaches_email_unique` (`email`),
  ADD KEY `coaches_specialist_id_foreign` (`specialist_id`),
  ADD KEY `coaches_country_id_foreign` (`country_id`),
  ADD KEY `coaches_city_id_foreign` (`city_id`),
  ADD KEY `coaches_district_id_foreign` (`district_id`);

--
-- Indexes for table `coaches_schedule`
--
ALTER TABLE `coaches_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coaches_schedule_coach_id_foreign` (`coach_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_city_id_foreign` (`city_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_coach_id_foreign` (`coach_id`),
  ADD KEY `feedbacks_client_id_foreign` (`client_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coaches_schedule`
--
ALTER TABLE `coaches_schedule`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `books_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `coaches_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `coaches_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `coaches_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `coaches_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`);

--
-- Constraints for table `coaches_schedule`
--
ALTER TABLE `coaches_schedule`
  ADD CONSTRAINT `coaches_schedule_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
