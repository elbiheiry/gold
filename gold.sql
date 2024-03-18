-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 04:07 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gold`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `type`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'GOLD', 'A History of Holding Its Value', 'Unlike paper currency, gold has maintained its value throughout the ages.Families see gold as a way to pass on and preserve their wealth from one generation to the next.', '2018-11-14 20:48:25', '2018-11-14 20:48:25'),
(2, 'GOLD', 'Portfolio Diversification', 'Properly diversified investors combine gold with stocks and bonds in a portfolio to reduce the overall volatility and risk.', '2018-11-14 20:48:25', '2018-11-14 20:48:25'),
(3, 'GOLD', 'Long-Term Value', 'Gold’s price increases in response to events that cause the value of paper investments, such as stocks and bonds, to decline. Although the price of gold can be volatile in the short term, it has maintained its value over the long term. Through the years, it has served as a hedge against inflation and the erosion of major currencies and is a smart investment.', '2018-11-14 20:49:20', '2018-11-14 20:49:20'),
(4, 'RSG', 'History', 'Ruby Star Gold has more than 80 years of experience in bullion trading in the Middle East and has been growing in the heart of Dubai for the last 9 years.', '2018-11-14 20:49:20', '2018-11-14 20:49:20'),
(5, 'RSG', 'Trust', 'Ruby Star Gold provides you with safe and secure gold and silver investment options that have come through generations of experience. RSG’s priority is customer satisfaction and achieving long-term, client loyalty.', '2018-11-14 20:50:08', '2018-11-14 20:50:08'),
(6, 'RSG', 'Quality', 'Ruby Star Gold prides itself in only providing the most reliable services that are consistently high-quality. This is coupled with unrivaled, comprehensive support at an exceptional value.', '2018-11-14 20:50:08', '2018-11-14 20:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `member_id`, `last_name`, `phone`, `address`, `country_id`, `city_id`, `total`, `created_at`, `updated_at`) VALUES
(15, 3, 'yousry', '0561455565', NULL, 2, 8, '463.10', '2018-11-20 18:40:23', '2018-11-20 18:40:23'),
(16, 6, 'darwesh', '01005654011', 'ssss', 1, 1, '463.10', '2018-11-20 18:49:27', '2018-11-20 18:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Cairo', 1, '2018-11-15 20:26:12', '2018-11-15 20:26:12'),
(2, 'Alexandria', 1, '2018-11-15 20:26:16', '2018-11-15 20:26:16'),
(3, 'Matrouh', 1, '2018-11-15 20:26:26', '2018-11-15 20:26:26'),
(6, 'Giza', 1, '2018-11-15 20:28:54', '2018-11-15 20:28:54'),
(8, 'Abu dhabi', 2, '2018-11-15 20:29:12', '2018-11-15 20:29:12'),
(9, 'Sharqah', 2, '2018-11-15 20:30:05', '2018-11-15 20:30:05'),
(10, 'Dubai', 2, '2018-11-15 20:30:11', '2018-11-15 20:30:11'),
(11, 'Alqaseem', 2, '2018-11-15 20:30:18', '2018-11-15 20:33:52'),
(12, 'Makkah', 3, '2018-11-15 20:34:01', '2018-11-15 20:34:01'),
(13, 'Madinah', 3, '2018-11-15 20:34:06', '2018-11-15 20:34:06'),
(14, 'Geddah', 3, '2018-11-15 20:34:09', '2018-11-15 20:34:14'),
(15, 'Elryad', 3, '2018-11-15 20:34:21', '2018-11-15 20:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'XLy5vNB1SFlaPVfVCAs4iNqwDXx2SGtYCxnPscqD.jpeg', '2018-11-15 07:30:45', '2018-11-15 07:30:45'),
(2, 'jkTP9pLdhE5dYX2STSE11yukulKtBFTacP1DkvM0.jpeg', '2018-11-15 07:30:50', '2018-11-15 07:30:50'),
(3, 'dT2TDRPhQuhxKpLCbIUnrvJn7Ga5b2nHNQ3jxsqc.jpeg', '2018-11-15 07:30:55', '2018-11-15 07:30:55'),
(4, 'K5EbqDlsgyfEtR9wzuPQE5rZpIkN3y47bXM55uXh.jpeg', '2018-11-15 07:30:58', '2018-11-15 07:30:58'),
(5, '0CDQv70tggQ1HJtU92rZrbKhEqcsJ2j2TgFBoEdG.jpeg', '2018-11-15 07:31:01', '2018-11-15 07:31:01'),
(6, 'KM4IPei0pEPA4KwAYVAbUa34LKxn4XCGgGGk0MPI.jpeg', '2018-11-15 07:31:08', '2018-11-15 07:31:08'),
(9, 'j5bOuIjZX7Fmmi9yJZl6n7itRTnhi5jZdjeI7weq.jpeg', '2018-11-15 07:33:00', '2018-11-15 07:33:00'),
(10, 'eOCVSJf47EjGNLVT5kFjTmYvXRpvK0DAKrag8YQL.jpeg', '2018-11-15 07:33:04', '2018-11-15 07:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Egypt', '2018-11-15 20:16:43', '2018-11-15 20:16:43'),
(2, 'UAE', '2018-11-15 20:17:06', '2018-11-15 20:17:06'),
(3, 'KSA', '2018-11-15 20:17:10', '2018-11-15 20:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `group_contents`
--

CREATE TABLE `group_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_contents`
--

INSERT INTO `group_contents` (`id`, `link`, `description`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/embed/Fx2-4YcqVvE', 'The journey started in 1935, a man with a dream and a belief in quality gold and jewelry, trust and customer service opened a small shop in the heart of Cairo, Egypt. This shop soon expanded as the demand for his gold grew and his name came to be associated with quality gold and a trustworthy business. When his sons grew old enough, they took over the family business and expanded it into the Company Egypt Gold which today includes 7 associated companies in the gold and jewelry business, including Ruby Star Gold. Ruby Star Gold continues the legacy of trust and a quality product but has adapted to meet the needs of today’s investors, traders, buyers, and sellers. With competitive pricing, our own gold trading platform and generations of experience, Ruby Star Gold has the flexibility, and experience to meet your needs.', '2018-11-15 09:02:18', '2018-11-15 07:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `group_sliders`
--

CREATE TABLE `group_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_sliders`
--

INSERT INTO `group_sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'YaoukNpNnVL8lMX1JqjoppT3EBodF07kSKXocyGy.jpeg', '2018-11-15 07:13:37', '2018-11-15 07:13:37'),
(2, 'N8riOdjGUoMHGKQwl7N316RwIRTeqn6wrZBVa3pw.jpeg', '2018-11-15 07:13:41', '2018-11-15 07:13:41'),
(3, '1dLPc9yKYvQHNNVav0iad0X2jTp4iaTq0XOGsgCL.jpeg', '2018-11-15 07:21:22', '2018-11-15 07:21:22'),
(4, 'KqXITslpSTwnj3bM6Yf3FmLMKxD3G2mmsnV9cTIt.jpeg', '2018-11-15 07:21:27', '2018-11-15 07:21:27'),
(5, 'ny51ksYsVLN7zLP5hv9fSuP3lx2j9Ktp5H4Aa5fs.jpeg', '2018-11-15 07:21:31', '2018-11-15 07:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed', 'elbiheiry2@gmail.com', '$2y$10$FoyQdrGozcdaelipUUF/TOoaYdgZIjMkDLOT.8brvU9vokaqNTRyq', 'UnVIPaAj3AgG3TDZZQwTOYArFzoJ79sNwROKiG04NRDeETRk7cdLW7N7m6he', '2018-11-15 11:48:00', '2018-11-19 16:47:27'),
(2, 'elbiheiry', 'mohamedsasa201042@yahoo.com', '$2y$10$ptBamHvTGI3ka6q2dSjmeeHJdMxQ6yZUCdLjA6NFNo8DJJK9LPOBu', 'u9gw9PGnZm80lCygdW0BkXSYHZwluzcFRtEkaOB03kf1idJtV6T2FVQpu4gY', '2018-11-15 11:53:31', '2018-11-15 13:53:34'),
(3, 'Mahmoud', 'dryousryfc@gmail.com', '$2y$10$9xnx54txz6DF0kmoxtzOA.Ir/bxQEOu3JSXIDistDdRc.VhptldGS', 'KshqErhvjeDpHIWrO3zpABiq5t34mo2f7XJSqw3Sknd6wki9AedmJIKcPBCK', '2018-11-17 05:06:25', '2018-11-20 11:48:27'),
(4, 'bassem', 'bassem.darwesh@gmail.com', '$2y$10$NkUpoxWOPTZCMI6CaHSA.OthCnu/P0e63adSh9goUaoMzEjHS2taS', NULL, '2018-11-19 13:09:23', '2018-11-19 13:09:23'),
(5, 'mahmoud', 'mahmoud@rubystargold.com', '$2y$10$6BEqOsZHSygt5gz5BND50u1xQo2W0jc1JsQgN5Svauf8UdLgn9.IS', NULL, '2018-11-19 19:04:02', '2018-11-19 19:04:02'),
(6, 'Tamer', 'capo2300@hotmail.com', '$2y$10$bfnLQQXvXkqPpdF9nsjyseq/TG1.NrYM.EAqboqhrBQGDEjZH3xKa', NULL, '2018-11-20 02:53:48', '2018-11-20 02:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_01_110214_create_settings_table', 2),
(9, '2018_10_02_105654_create_messages_table', 8),
(24, '2018_11_13_105254_create_sliders_table', 9),
(25, '2018_11_14_204640_create_abouts_table', 10),
(26, '2018_11_14_222745_create_group_sliders_table', 11),
(27, '2018_11_15_090032_create_group_contents_table', 12),
(28, '2018_11_15_092256_create_companies_table', 13),
(29, '2018_11_15_093402_create_service_contents_table', 14),
(30, '2018_11_15_095726_create_services_table', 15),
(31, '2018_11_15_101515_create_service_questions_table', 16),
(32, '2018_11_15_105332_create_products_table', 17),
(33, '2018_11_15_131644_create_members_table', 18),
(35, '2018_11_15_220512_create_countries_table', 19),
(36, '2018_11_15_220540_create_cities_table', 19),
(38, '2018_11_16_115300_create_checkouts_table', 20),
(39, '2018_11_16_120208_create_orders_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `checkout_id`, `name`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(21, 15, '1 GM PAMP Gold Bar', '1', '422', '422.00', '2018-11-20 18:40:23', '2018-11-20 18:40:23'),
(22, 16, '2.5 GM PAMP GOLD BAR', '1', '422', '422.00', '2018-11-20 18:49:27', '2018-11-20 18:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suisse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `code`, `brief`, `price`, `brand`, `weight`, `suisse`, `image`, `images`, `created_at`, `updated_at`) VALUES
(1, '1 GM PAMP Gold Bar', '1-gm-pamp-gold-bar', 'C000001', 'Fine Gold Bar, 24K, Gold Suisse 999.9 Purity', '169', 'PAMP', '2.5 gm', '999.9 PURITY', '6uvv8zDBPgMT4zWHSc4GLdVooPVbn8eoHU6pVEGT.jpeg', '', '2018-11-15 09:19:28', '2018-11-25 16:47:59'),
(2, '2.5 GM PAMP GOLD BAR', '25-gm-pamp-gold-bar', 'C000002', 'Fine Gold Bar, 24K, Gold Suisse 999.9 Purity', '422', 'PAMP', '2.5 GM', '999.9 PURITY', 'mNMr5ayNT648i25ccTxNWWIugOaN8FksSChCYk01.jpeg', '', '2018-11-15 09:20:53', '2018-11-15 12:00:36'),
(4, '5 GM PAMP GOLD BAR', '5-gm-pamp-gold-bar', 'C000003', 'Fine Gold Bar, 24K, Gold Suisse 999.9 Purity', '845', 'PAMP', '5 GM', '999.9 PURITY', '50UQIb7xoP6jwtpEkYftQQOzaMHZo5CBUyPZNU0j.jpeg', '', '2018-11-15 11:01:36', '2018-11-15 12:00:31'),
(5, '10 GM PAMP GOLD BAR', '10-gm-pamp-gold-bar', 'C000004', 'Fine Gold Bar, 24K, Gold Suisse 999.9 Purity', '1.690', 'PAMP', '10 GM', '999.9 PURITY', 'KSzIY4kDNROOmsZI4pj4WGfo7G6xHvZ48JHaEk7g.jpeg', '', '2018-11-15 11:02:25', '2018-11-15 12:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'What we offer', '2018-11-15 10:03:59', '2018-11-15 08:09:56'),
(2, 'Why Physical Gold', '2018-11-15 10:03:59', '2018-11-15 10:03:59'),
(3, 'Why to Hedge and trade online with us', '2018-11-15 10:04:06', '2018-11-15 10:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `service_contents`
--

CREATE TABLE `service_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_contents`
--

INSERT INTO `service_contents` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Our Services', 'Of all the precious metals, gold is the most popular as an investment. Compared to other precious metals used for investment, gold has the most effective haven and hedging properties across the globe.\nUnlike paper currency, coins or other assets, gold has maintained its value throughout the ages. People see gold to pass on and preserve their wealth from one generation to the next.', '2018-11-15 09:35:29', '2018-11-15 07:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `service_questions`
--

CREATE TABLE `service_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_questions`
--

INSERT INTO `service_questions` (`id`, `title`, `description`, `service_id`, `created_at`, `updated_at`) VALUES
(4, 'Physical Gold Wholesale …. Sell, Buy, Scrap, and Refinery', 'We have a Different Brands for Bullion Coins, Bullion Bars, Minted Bars with a full range of sizes (1 gram – 1000 grams) Cast Bars: full range of sizes (250g, 500g, 1Kg, and 400 Oz)', 1, '2018-11-15 08:37:31', '2018-11-15 08:37:31'),
(5, 'Hedging … Precious Metal Online Trading Platform', 'We offer a leading trade platform that offers rich charting tools, advanced order types, level ll pricing, quick entry and execution. Our remarkable interface is available on multiple devices and is connected to the world\'s most advanced, backend technology.', 1, '2018-11-15 08:37:51', '2018-11-15 08:37:51'),
(6, 'A History of Holding Its Value', 'Gold retains its value not only in times of financial uncertainty, but in times of geopolitical uncertainty. It is often called the \"crisis commodity,\" because people flee to its relative safety when world tensions rise.', 2, '2018-11-15 08:40:00', '2018-11-15 08:40:00'),
(7, 'Gold is Asset', 'Gold always maintained its value over the long term. Through the years, Gold has historically been an excellent hedge against inflation, because its price tends to rise when the cost of living increases.', 2, '2018-11-15 08:40:17', '2018-11-15 08:40:17'),
(8, 'Where is the risk?', 'Risk in gold investment lie on those that deal with paper substitute. However, if you invest in physical bullion the counterparty risk is decreased.', 2, '2018-11-15 08:40:34', '2018-11-15 08:40:34'),
(9, 'Liquidity of Gold', 'Gold can be traded anytime of the day. It can be easily bought and sold.', 2, '2018-11-15 08:40:50', '2018-11-15 08:40:50'),
(10, 'Advanced Order Protection', 'With our advanced protection options \"Take Profit\" can be used to scale out of a position at multiple levels. \"Stop Loss\" can be set to break even and \"Server Trailing Stops\" can be used to follow profitable positions', 3, '2018-11-15 08:45:25', '2018-11-15 08:45:25'),
(11, 'Fast Entry and Execution', 'Traders praise our services for speed, quality and stunning execution. Our platform orders are filled in milliseconds while simultaneously processing multiple orders and there is no queue. Quick Trade can be used to open, close, or modify orders with only one or two clicks from any section on the platform, allowing traders to respond quickly to fast moving markets.', 3, '2018-11-15 08:45:37', '2018-11-15 08:45:37'),
(12, 'Technical Analysis', 'All the tools you need in one location for technical analysis, including trend indicators, oscillators, volatility measures and line drawings are all accessible directly from the chart. We host over 70 pre-installed indicators and a variety of objects including shapes and texts.', 3, '2018-11-15 08:45:54', '2018-11-15 08:45:54'),
(13, 'Charting and Trading', 'are complementary and function together seamlessly. Our Platform Chart Trading is responsive and effective. You can create Market, Limit & Stop Orders with QuickTrade setting and open orders with \"Stop Loss\" and \"Take Profit.\" options. Existing Orders and Positions can be modified at anytime simply by dragging and placing elements on the chart. Make trading even simpler by bypassing order tickets!', 3, '2018-11-15 08:46:12', '2018-11-15 08:46:12'),
(14, 'Level II Pricing', 'The platform shows the full range of executable prices coming directly from liquidity providers. Orders are filed against the full order book using Volume Weighted Average Price (VWAP).', 3, '2018-11-15 08:46:26', '2018-11-15 08:46:26'),
(15, 'Choice of Trigger Methods', 'Pending Orders, Stop Loss and Take Profits can be triggered by the opposite side, second consecutive price and even second consecutive opposite price to protect against harmful erroneous prices.', 3, '2018-11-15 08:46:41', '2018-11-15 08:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `phone`, `address`, `email`, `facebook`, `linkedin`, `instagram`, `brief`, `created_at`, `updated_at`) VALUES
(1, 'Ruby star gold', '+97158 242 2544', 'Head Office: 2606, BB1 Tower, Business Mazaya Avenue, JLT, Dubai.\r\nGold Souq Office: 130, 5th Flr, Zone 5, Gold Center, Deira Gold Souq, Dubai. UAE', 'Info@rubystargold.com', 'http://facebook.com/', 'http://twitter.com/', 'http://youtube.com/', 'Ready to invest in your future, buy, trade or\r\nLearn to trade ? Or just have some questions ?', '2018-10-01 11:05:15', '2018-11-18 13:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(14, '0o4oMp5dToGnpEISrj6TP23Tg13zdvjLv7dysIe2.jpeg', '2018-11-14 18:32:15', '2018-11-14 20:16:44'),
(15, 'mw9cPQJZLe2vTbzs9R8otF4lKTVJ06ozjcaJp9pK.jpeg', '2018-11-14 18:32:18', '2018-11-14 18:32:18'),
(16, 'BNdcf9UYWgDvYUU4PKUbtCWmKq45iNF2Rp93F7ty.jpeg', '2018-11-14 18:32:24', '2018-11-14 18:32:24'),
(17, 'QpA1UcpJlf1i5zoVVy0shPK7tjwiYBPG1Wc5MvA2.jpeg', '2018-11-14 20:32:47', '2018-11-14 20:32:47'),
(18, 'ZwSoAUkjdzLB7GrFEJvhUKKD01lEjHrKgozHrRSg.jpeg', '2018-11-15 07:22:21', '2018-11-15 07:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@rawaby.com', '$2y$10$1I870fV.8qMJco6mPO.6VO3lXP/.fyAZ/V2mc6ItREvLXPkl47zsq', 'TGHW99eyux1NTN0EUc0ZgfuIkznkrDLgtHpKKiicsEiN3FA4ZahXRUDNTbxg', '2018-10-01 10:51:52', '2018-10-01 10:51:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_contents`
--
ALTER TABLE `group_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_sliders`
--
ALTER TABLE `group_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_contents`
--
ALTER TABLE `service_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_questions`
--
ALTER TABLE `service_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_contents`
--
ALTER TABLE `group_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_sliders`
--
ALTER TABLE `group_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_contents`
--
ALTER TABLE `service_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_questions`
--
ALTER TABLE `service_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
