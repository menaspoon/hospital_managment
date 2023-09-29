-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 10:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departure` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `overtime` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vacation` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `month` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `attendance_time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time_departure` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`id`, `user`, `status`, `departure`, `overtime`, `vacation`, `month`, `date`, `attendance_time`, `time_departure`, `updated_at`) VALUES
(38, 19, 'plus', 'go', '10', NULL, NULL, '2023-07-30', 'July 30, 2023, 1:04 pm', 'July 30, 2023, 1:46 pm', '2023-07-30 13:48:38'),
(39, 18, 'minus', NULL, NULL, NULL, NULL, '2023-07-30', 'July 30, 2023, 1:13 pm', NULL, NULL),
(40, 17, 'plus', 'go', NULL, NULL, NULL, '2023-07-30', 'July 30, 2023, 1:16 pm', 'July 30, 2023, 1:17 pm', '2023-07-30 13:17:31'),
(41, 18, 'vacation', NULL, NULL, NULL, NULL, '2023-07-30', NULL, NULL, NULL),
(42, 19, 'vacation', NULL, NULL, NULL, NULL, '2023-07-31', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `name`, `price`, `category`, `service_provider`, `insurance_company`, `hospital`, `updated_at`, `created_at`) VALUES
(24, 'تحليل بول', 40, 1, 1, NULL, 1, NULL, NULL),
(25, 'تحليل دم', 40, 1, 1, NULL, 1, NULL, NULL),
(26, 'تحليل املاح', 40, 1, 1, NULL, 1, NULL, NULL),
(27, 'تحليل جلد', 40, 1, 1, NULL, NULL, NULL, NULL),
(28, 'Black Jacquard Taffeta Abaya', 90, 1, 3, 1, NULL, NULL, NULL),
(29, 'اسم الفحص', 0, 1, 3, 1, NULL, '2023-07-27 19:50:58', '2023-07-27 19:50:58'),
(30, 'تحليل دم', 20, 1, 3, 1, NULL, '2023-07-27 19:50:58', '2023-07-27 19:50:58'),
(31, 'تحليل بول', 10, 1, 3, 1, NULL, '2023-07-27 19:50:58', '2023-07-27 19:50:58'),
(32, 'Mena Saleep', 100, 1, NULL, 1, NULL, NULL, NULL),
(33, 'Mena Saleep', 100, 1, NULL, 1, NULL, NULL, NULL),
(34, 'Black Jacquard Taffeta Abaya', 4000, 1, 3, 1, NULL, NULL, NULL),
(35, 'Mena Saleep', 100, 1, 3, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analytics_approve_company`
--

CREATE TABLE `analytics_approve_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `precent` int(11) DEFAULT 100,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytics_approve_company`
--

INSERT INTO `analytics_approve_company` (`id`, `item`, `precent`, `company`, `hospital`, `updated_at`) VALUES
(5, 21, 100, 1, 1, NULL),
(6, 22, 10, 1, 1, NULL),
(7, 24, 100, 1, 1, NULL),
(8, 25, 100, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analytics_booking`
--

CREATE TABLE `analytics_booking` (
  `id` int(11) NOT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `doctor` int(11) DEFAULT 0,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytics_booking`
--

INSERT INTO `analytics_booking` (`id`, `medical_examination`, `price`, `name`, `doctor`, `created`, `time`, `hospital`, `status`, `updated_at`) VALUES
(79, 0, 0, 462, 0, '2023-08-6', NULL, 1, NULL, NULL),
(80, 24, 20, 462, 1, '2023-08-6', NULL, 1, NULL, NULL),
(81, 24, 40, 475, 1, '2023-08-7', NULL, 1, NULL, NULL),
(82, 24, 40, 476, 14, '2023-08-7', NULL, 1, NULL, NULL),
(83, 24, 40, 477, 14, '2023-08-7', NULL, 1, NULL, NULL),
(84, 24, 40, 478, 14, '2023-08-7', NULL, 1, NULL, NULL),
(85, 24, 40, 483, 6, '2023-08-7', NULL, 1, NULL, NULL),
(86, 24, 40, 484, 6, '2023-08-7', NULL, 1, NULL, NULL),
(87, 24, 40, 485, 6, '2023-08-7', NULL, 1, NULL, NULL),
(88, 24, 40, 486, 6, '2023-08-7', NULL, 1, NULL, NULL),
(89, 24, 40, 493, 5, '2023-08-8', NULL, 1, NULL, NULL),
(90, 24, 40, 494, 5, '2023-08-8', NULL, 1, NULL, NULL),
(91, 24, 40, 495, 5, '2023-08-8', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analytics_company`
--

CREATE TABLE `analytics_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `analytics_department`
--

CREATE TABLE `analytics_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytics_department`
--

INSERT INTO `analytics_department` (`id`, `name`, `hospital`, `updated_at`) VALUES
(1, 'Mena Saleep fffffffffff', 1, '2023-03-03 03:22:12'),
(2, 'Italian lining with beige lining', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `bool` int(11) DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `member` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_percentage` varchar(255) DEFAULT NULL,
  `discount_amount` int(11) DEFAULT NULL,
  `total_before_discount` int(255) DEFAULT NULL,
  `diagnosing` text CHARACTER SET utf8 DEFAULT NULL,
  `note` text CHARACTER SET utf8 DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approve`
--

INSERT INTO `approve` (`id`, `user`, `bool`, `service_provider`, `member`, `type`, `total_price`, `discount`, `discount_percentage`, `discount_amount`, `total_before_discount`, `diagnosing`, `note`, `insurance_company`) VALUES
(70, NULL, NULL, NULL, NULL, 'emergency', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL, 'emergency', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, NULL, 4, 55555553, 'analytics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, NULL, NULL, 4, 5555555, 'intensive_care', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `approve_public`
--

CREATE TABLE `approve_public` (
  `id` int(11) NOT NULL,
  `member` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `service_provider` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `item` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `diagnosing` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `file_number` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approve_public`
--

INSERT INTO `approve_public` (`id`, `member`, `service_provider`, `type`, `item`, `note`, `diagnosing`, `file_number`, `insurance_company`, `updated_at`, `created_at`) VALUES
(319, 'محمد احمد السيد', 'مستشفي الراعي', 'analytics', NULL, 'متعب', 'بدون', 22, 1, '2023-07-26 14:45:25', '2023-07-26 14:45:25'),
(320, 'بركات', 'مستشفي الراعي', 'intensive_care', NULL, 'متعب', 'بدون', 22, 1, '2023-07-26 14:45:25', '2023-07-26 14:45:25'),
(330, 'محمد احمد السيد', 'مستشفي الراعي', 'analytics', NULL, 'متعب', 'بدون', 22, NULL, '2023-07-26 14:46:09', '2023-07-26 14:46:09'),
(331, 'بركات', 'مستشفي الراعي', 'intensive_care', NULL, 'متعب', 'بدون', 22, NULL, '2023-07-26 14:46:09', '2023-07-26 14:46:09'),
(341, 'محمد احمد السيد', 'مستشفي الراعي', 'analytics', NULL, 'متعب', 'بدون', 23, NULL, '2023-07-26 14:58:39', '2023-07-26 14:58:39'),
(342, 'بركات', 'مستشفي الراعي', 'intensive_care', NULL, 'متعب', 'بدون', 23, NULL, '2023-07-26 14:58:39', '2023-07-26 14:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `approve_service_details`
--

CREATE TABLE `approve_service_details` (
  `id` int(11) NOT NULL,
  `service` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `approve_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approve_service_details`
--

INSERT INTO `approve_service_details` (`id`, `service`, `price`, `type`, `approve_id`) VALUES
(39, 24, 231, 'ray', 34),
(40, 24, 230, 'ray', 35),
(41, 25, 200, 'ray', 35),
(42, 5, 2000, 'surgery', 36),
(43, 2, 100, 'surgery', 36),
(44, 24, 41, 'intensive_care', 37),
(45, 11, 41, 'medical_examination', 38),
(46, 6, 33, 'medical_examination', 38),
(47, 15, 41, 'medical_examination', 39),
(48, 17, 40, 'medical_examination', 39),
(49, 24, 41, 'physical_therapy', 40),
(50, 26, 201, 'physical_therapy', 40),
(51, NULL, 0, 'surgery', 42),
(52, 24, 41, 'analytics', 43),
(53, 26, 41, 'analytics', 44),
(54, 25, 41, 'analytics', 45),
(55, NULL, 0, 'analytics', 45),
(56, 25, 40, 'analytics', 46),
(57, 25, 40, 'analytics', 47),
(58, 25, 40, 'analytics', 48),
(59, 25, 40, 'analytics', 49),
(60, 25, 40, 'analytics', 50),
(61, 25, 40, 'analytics', 51),
(62, 25, 40, 'analytics', 52),
(63, 25, 40, 'analytics', 53),
(64, 25, 40, 'analytics', 54),
(65, 25, 40, 'analytics', 55);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `balance`, `hospital`, `updated_at`) VALUES
(1, 'بنك مصر', 10000, 1, '2023-07-31 18:31:20'),
(3, 'خزينة الصيدلية', 10000, 1, NULL),
(4, 'خزينة المستشفي 2', 8000, 1, '2023-07-31 18:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `hospital`) VALUES
(1, 'باطنـــــــة', 1),
(2, 'جـــــــــراحة', 1),
(3, 'امراض النساء', 1),
(4, 'امراض الاطفال', 1),
(5, 'امراض العيون', 1),
(6, 'امراض الجلدية', 1),
(7, 'امراض المسالك', 1),
(8, 'امراض الانف والاذن والحنجرة', 1),
(9, 'امراض العقم والمساعدة علي الانجاب', 1),
(11, 'امراض النفسية والعقلية', 1),
(12, 'امراض العظام', NULL),
(13, 'سسس', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `insurance_company`) VALUES
(1, 'A+', 1),
(2, 'A', 1),
(3, 'B+', 1),
(4, 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `part` int(11) DEFAULT 0,
  `start` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `end` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `balance` int(11) DEFAULT 0,
  `year` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `commercial_register` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tax_card` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `issuer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `contracting_officer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `contracting_officer_phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `phone`, `address`, `count`, `part`, `start`, `end`, `total`, `balance`, `year`, `logo`, `discount_percentage`, `commercial_register`, `tax_card`, `issuer`, `contracting_officer`, `contracting_officer_phone`, `hospital`, `insurance_company`, `created`, `updated_at`) VALUES
(10, 'شركة النصر', 'naser@gmail.com', '⁦505580553⁩', '4545', 0, 0, '2023-06-02', '2024-06-02', 0, 10000, NULL, NULL, NULL, '4444444', NULL, 'مصر', 'مينا', '11111111', NULL, 1, '9, 6, 2023', '2023-07-18 17:26:56'),
(18, 'Mena Saleep', 'menaspoon73@gmail.com', '⁦505580553⁩', 'alex', 0, 0, NULL, NULL, 0, 14000, NULL, NULL, NULL, '4444444', '4444444', 'مصر', 'ميت', '11111111', NULL, 1, '25, 7, 2023', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `start_date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `end_date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `annual_ceiling` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `number_of_subscribers` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `singles_premium` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `annual_capita` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `degree_of_residence` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital_collection_rate` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `medical_network` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `administrative_expenses` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `issuance_expenses` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `network_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `medical_examinations_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `medical_examinations_count` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `medical_examinations_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `medical_examinations_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `medical_examinations_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `analysis_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `analysis_count` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `analysis_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `analysis_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `analysis_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ray_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ray_count` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ray_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ray_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ray_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `surgery_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `surgery_count` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `surgery_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `surgery_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `surgery_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `physical_therapy_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `physical_therapy_count` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `physical_therapy_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `physical_therapy_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `physical_therapy_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `emergency_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `emergency_count` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `emergency_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `emergency_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `emergency_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `intensive_are_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `intensive_are_count` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `intensive_are_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `intensive_are_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `intensive_are_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quartering_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quartering_count` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quartering_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quartering_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quartering_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pharmacy_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pharmacy_discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pharmacy_coverage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pharmacy_collection` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pharmacy_chronic_treatment` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `insurance_company` int(11) NOT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `start_date`, `end_date`, `annual_ceiling`, `number_of_subscribers`, `singles_premium`, `class`, `annual_capita`, `degree_of_residence`, `hospital_collection_rate`, `medical_network`, `administrative_expenses`, `issuance_expenses`, `network_coverage`, `medical_examinations_type`, `medical_examinations_count`, `medical_examinations_coverage`, `medical_examinations_discount`, `medical_examinations_collection`, `analysis_type`, `analysis_count`, `analysis_coverage`, `analysis_discount`, `analysis_collection`, `ray_type`, `ray_count`, `ray_coverage`, `ray_discount`, `ray_collection`, `surgery_type`, `surgery_count`, `surgery_coverage`, `surgery_discount`, `surgery_collection`, `physical_therapy_type`, `physical_therapy_count`, `physical_therapy_coverage`, `physical_therapy_discount`, `physical_therapy_collection`, `emergency_type`, `emergency_count`, `emergency_coverage`, `emergency_discount`, `emergency_collection`, `intensive_are_type`, `intensive_are_count`, `intensive_are_discount`, `intensive_are_coverage`, `intensive_are_collection`, `quartering_type`, `quartering_count`, `quartering_coverage`, `quartering_discount`, `quartering_collection`, `pharmacy_type`, `pharmacy_discount`, `pharmacy_coverage`, `pharmacy_collection`, `pharmacy_chronic_treatment`, `company`, `insurance_company`, `updated_at`) VALUES
(2, '2023-06-01', '2023-06-30', NULL, '100', '11', 'A+', '10000', NULL, NULL, 'A', NULL, NULL, NULL, NULL, '20', NULL, '10', '11', 'directly', '10', 'not_coverage', '100', '11', 'directly', '4', 'not_coverage', '10', '33', 'not_directly', '23', 'coverage', '12', '30', 'directly', '100', 'not_coverage', '40', '11', 'directly', '100', 'not_coverage', '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1, '2023-06-13 15:39:16'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corporate_premiums`
--

CREATE TABLE `corporate_premiums` (
  `id` int(11) NOT NULL,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `agent` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `corporate_premiums`
--

INSERT INTO `corporate_premiums` (`id`, `company`, `hospital`, `money`, `agent`, `created`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, NULL, 10000, 'احمد', '2022-11-23', NULL),
(3, 1, NULL, 1000, 'احمد السيد', '2022-11-23', NULL),
(4, 1, NULL, 1000, 'احمد السيد', '2022-11-23', NULL),
(5, 1, NULL, 200, 'احمد السيد', '2022-11-23', NULL),
(6, 10, NULL, 100, 'احمد السيد', '2023-07-18', NULL),
(7, 10, NULL, 100, 'احمد السيد', '2023-07-18', NULL),
(8, 10, NULL, 50, 'احمد', '2023-07-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `degree_of_residence`
--

CREATE TABLE `degree_of_residence` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `degree_of_residence`
--

INSERT INTO `degree_of_residence` (`id`, `name`, `insurance_company`) VALUES
(1, 'جناح', 1),
(2, 'جناح للمرافق', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosing`
--

CREATE TABLE `diagnosing` (
  `id` int(11) NOT NULL,
  `invoice` int(11) DEFAULT NULL,
  `members` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosing`
--

INSERT INTO `diagnosing` (`id`, `invoice`, `members`, `hospital`) VALUES
(2, NULL, 9, 1),
(3, NULL, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosing_details`
--

CREATE TABLE `diagnosing_details` (
  `id` int(11) NOT NULL,
  `diagnosing` int(11) DEFAULT NULL,
  `members` int(11) DEFAULT NULL,
  `invoice` int(11) DEFAULT NULL,
  `text` text CHARACTER SET utf8 DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `doctor` int(11) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosing_details`
--

INSERT INTO `diagnosing_details` (`id`, `diagnosing`, `members`, `invoice`, `text`, `file`, `doctor`, `created`, `hospital`) VALUES
(14, NULL, 8, 498, 'اضافة عددٍ لا نهائي من البضائع والمنتجات إتاحة خدمات وطرق الدفع الإلكتروني المتنوعة والآمنة المعروفة في السعودية توفر خيارات متعددة ومختلفة من شركات الشحن باقات مدفوعة ومجانية امكانية اضافة عدد غير محدود من الاقسام امكانية اضافة حساب جديد وتسجيل الدخول إمكانية استضافة عدد غير محدود من الزوار إمكانية إصدار كوبونات خاصة بكل بمتجر الإلكتروني إمكانية اضافة شريط إعلانات خاصة بكل متجر إمكانية تحسين محركات البحث ليظهر في النتائج البحثية الأولى الخاصة بالمستهلكين إمكانية إضافة فروع لكل متجرك امكانية مشاركة المنتج سلة لكل مستخدم', NULL, 5, '22, julay, 20200', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosing_files`
--

CREATE TABLE `diagnosing_files` (
  `id` int(11) NOT NULL,
  `member` int(11) DEFAULT NULL,
  `invoice` int(11) DEFAULT NULL,
  `diagnosing_details` int(11) DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosing_files`
--

INSERT INTO `diagnosing_files` (`id`, `member`, `invoice`, `diagnosing_details`, `file`, `type`, `hospital`) VALUES
(3, 8, 498, 13, '6378fa41db0913006f9ea370ed5cc37e.pdf', 'pdf', 1),
(4, 8, 498, 14, 'b805bb4f273177ba814c7e88f6c1dd5b.pdf', 'pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosing_picture`
--

CREATE TABLE `diagnosing_picture` (
  `id` int(11) NOT NULL,
  `member` int(255) DEFAULT NULL,
  `invoice` int(255) DEFAULT NULL,
  `diagnosing_details` int(11) DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosing_picture`
--

INSERT INTO `diagnosing_picture` (`id`, `member`, `invoice`, `diagnosing_details`, `photo`, `hospital`) VALUES
(1, 8, 498, 5, 'a3ffeed79227e5293cb16c5adcdb8be3.jpg', 1),
(2, 8, 498, 5, 'ea634ae4e9e6f12ca0fffa70bc14b79d.jpg', 1),
(3, 8, 498, 14, '45937183574d912d46c0c2c7aa5563fe.jpg', 1),
(4, 8, 498, 14, '45937183574d912d46c0c2c7aa5563fe.jpg', 1),
(5, 8, 498, 14, 'afd18ab76ecf90ca87a51927fc2a0613.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`id`, `name`, `price`, `category`, `service_provider`, `insurance_company`, `hospital`, `updated_at`, `created_at`) VALUES
(34, 'جلسة كهرباء', 0, 1, NULL, NULL, 1, '2023-07-27 17:51:52', '2023-07-27 17:51:52'),
(35, 'جلسة علاج طبيعي', 20, 1, NULL, NULL, 1, '2023-07-27 17:51:52', '2023-07-27 17:51:52'),
(36, 'تحليل بول', 10, 1, NULL, NULL, NULL, '2023-07-27 17:51:52', '2023-07-27 17:51:52'),
(37, 'اسم الفحص', 0, 1, NULL, NULL, NULL, '2023-07-27 17:53:25', '2023-07-27 17:53:25'),
(38, 'تحليل دم', 20, 1, NULL, NULL, NULL, '2023-07-27 17:53:25', '2023-07-27 17:53:25'),
(39, 'تحليل بول', 10, 1, NULL, NULL, NULL, '2023-07-27 17:53:25', '2023-07-27 17:53:25'),
(40, 'اسم الفحص', 0, 1, 3, 1, NULL, '2023-07-27 17:55:17', '2023-07-27 17:55:17'),
(41, 'تحليل دم', 20, 1, 3, 1, NULL, '2023-07-27 17:55:17', '2023-07-27 17:55:17'),
(42, 'تحليل بول', 10, 1, 3, 1, NULL, '2023-07-27 17:55:17', '2023-07-27 17:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_approve_company`
--

CREATE TABLE `emergency_approve_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `precent` int(11) NOT NULL DEFAULT 100,
  `category` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_approve_company`
--

INSERT INTO `emergency_approve_company` (`id`, `item`, `precent`, `category`, `company`, `hospital`) VALUES
(1, 25, 100, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_booking`
--

CREATE TABLE `emergency_booking` (
  `id` int(11) NOT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `doctor` int(11) NOT NULL DEFAULT 0,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_booking`
--

INSERT INTO `emergency_booking` (`id`, `medical_examination`, `price`, `name`, `doctor`, `created`, `time`, `hospital`, `status`, `updated_at`) VALUES
(24, 25, NULL, 348, 0, '2023-05-22', NULL, 1, 'ok', NULL),
(25, 25, NULL, 349, 5, '2023-05-22', NULL, 1, 'ok', '2023-05-22 06:01:20'),
(26, 25, NULL, 395, 1, '2023-05-25', NULL, 1, 'ok', '2023-05-25 19:05:56'),
(27, 25, 300, 403, 1, '2023-05-29', NULL, 1, 'ok', '2023-05-29 05:06:13'),
(28, 25, 300, 406, 12, '2023-05-29', NULL, 1, 'ok', '2023-05-29 06:16:23'),
(29, 25, 300, 413, 5, '2023-05-29', NULL, 1, 'ok', '2023-05-29 07:35:16'),
(30, 25, 300, 414, 6, '2023-05-29', NULL, 1, 'ok', '2023-05-29 07:55:22'),
(31, 25, 300, 415, 14, '2023-05-29', NULL, 1, 'ok', '2023-05-29 08:03:14'),
(32, 25, 300, 416, 17, '2023-05-29', NULL, 1, 'ok', '2023-05-29 08:11:48'),
(33, 25, 300, 417, 17, '2023-05-29', NULL, 1, 'ok', '2023-05-29 08:42:52'),
(34, 25, 300, 418, 17, '2023-05-29', NULL, 1, 'ok', '2023-05-29 08:43:29'),
(35, 34, 20, 484, 5, '2023-08-7', NULL, 1, NULL, NULL),
(36, 34, 20, 485, 5, '2023-08-7', NULL, 1, NULL, NULL),
(37, 34, 20, 486, 5, '2023-08-7', NULL, 1, NULL, NULL),
(38, 34, 0, 494, 17, '2023-08-8', NULL, 1, NULL, NULL),
(39, 35, 20, 495, 14, '2023-08-8', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_department`
--

CREATE TABLE `emergency_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_department`
--

INSERT INTO `emergency_department` (`id`, `name`, `hospital`, `updated_at`) VALUES
(1, 'طوارئ الاطفال', 1, '2023-05-07 08:41:29'),
(5, 'طوارئ الولادة', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nationality` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `blood_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `card_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `relative_relation` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date_of_birth` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_number` int(11) DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 0,
  `remaining_amount` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `email`, `address`, `sex`, `nationality`, `blood_type`, `card_id`, `relative_relation`, `date_of_birth`, `picture`, `insurance_number`, `balance`, `remaining_amount`, `company`, `insurance_company`, `hospital`, `created`, `updated_at`, `created_at`) VALUES
(4, 'محمد احمد السيد', '22', 'menaspoon73@gmail.com', 'alex', 'انثي', 'ليبي', 'A-', '44444444444444444', 'wife', '2022-11-04', NULL, 55555553, 4770, 928, 10, 1, 1, NULL, '2023-07-17 06:09:02', NULL),
(5, 'بركات', '2233445544', 'menaspoon73@gmail.com', 'alex', 'انثي', 'مصري', 'AB+', 'dddddddddddddddd', 'girl', '2022-11-25', NULL, 5555555, 760, 1000, 10, 1, 1, NULL, '2023-07-30 09:12:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subscription` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `notifications` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `start` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `end` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `neighborhood` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `medical_examinations_type` int(255) DEFAULT NULL,
  `medical_examinations_discount` int(255) DEFAULT NULL,
  `medical_examinations_count` int(255) DEFAULT NULL,
  `medical_examinations_coverage` int(255) DEFAULT NULL,
  `medical_examinations_collection` int(255) DEFAULT NULL,
  `analysis_type` int(255) DEFAULT NULL,
  `analysis_discount` int(255) DEFAULT NULL,
  `analysis_count` int(255) DEFAULT NULL,
  `analysis_collection` int(255) DEFAULT NULL,
  `ray_type` int(255) DEFAULT NULL,
  `ray_discount` int(255) DEFAULT NULL,
  `ray_count` int(255) DEFAULT NULL,
  `ray_collection` int(255) DEFAULT NULL,
  `physical_therapy_type` int(255) DEFAULT NULL,
  `physical_therapy_discount` int(255) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `phone`, `logo`, `subscription`, `notifications`, `discount_percentage`, `start`, `end`, `city`, `neighborhood`, `address`, `medical_examinations_type`, `medical_examinations_discount`, `medical_examinations_count`, `medical_examinations_coverage`, `medical_examinations_collection`, `analysis_type`, `analysis_discount`, `analysis_count`, `analysis_collection`, `ray_type`, `ray_discount`, `ray_count`, `ray_collection`, `physical_therapy_type`, `physical_therapy_discount`, `hospital`, `created`, `updated_at`) VALUES
(1, 'مستشفي الحياة', 'menaspooggn73@gmail.com', '0100000000', '1689242351.png', 'false', '2022-11-09', NULL, '2022-11-08', '2022-11-10', 'alex', '11', 'ليبيا - طرابلس', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3-4-2022', '2023-07-13 09:59:11'),
(3, 'مستشفي السلام', 'menaspoon73@gmail.com', '⁦505580553⁩', NULL, NULL, NULL, NULL, NULL, NULL, 'alex', NULL, 'alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-05 09:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `intensive_care`
--

CREATE TABLE `intensive_care` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `insurance_company` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intensive_care`
--

INSERT INTO `intensive_care` (`id`, `name`, `price`, `category`, `insurance_company`, `service_provider`, `hospital`, `updated_at`, `created_at`) VALUES
(24, 'عناية', 40, 1, NULL, 1, 1, NULL, NULL),
(25, 'عناية سرير', 0, 1, NULL, NULL, 1, '2023-07-28 05:39:58', '2023-07-28 05:39:58'),
(26, 'تحليل دم', 20, 1, NULL, NULL, NULL, '2023-07-28 05:39:58', '2023-07-28 05:39:58'),
(27, 'تحليل بول', 10, 1, NULL, NULL, NULL, '2023-07-28 05:39:58', '2023-07-28 05:39:58'),
(28, 'Mena Saleep', 1000, 1, '1', 3, NULL, '2023-07-28 05:56:07', NULL),
(29, 'Black Jacquard Taffeta Abaya', 90, 1, '1', 3, NULL, NULL, NULL),
(30, 'اسم الفحص', 0, 1, NULL, NULL, NULL, '2023-07-28 05:56:30', '2023-07-28 05:56:30'),
(31, 'تحليل دم', 20, 1, NULL, NULL, NULL, '2023-07-28 05:56:30', '2023-07-28 05:56:30'),
(32, 'تحليل بول', 10, 1, NULL, NULL, NULL, '2023-07-28 05:56:30', '2023-07-28 05:56:30'),
(33, 'اسم الفحص', 90, 1, '1', 3, NULL, '2023-07-28 06:05:41', '2023-07-28 06:05:32'),
(34, 'تحليل دم', 20, 1, '1', 3, NULL, '2023-07-28 06:05:32', '2023-07-28 06:05:32'),
(35, 'تحليل بول', 10, 1, '1', 3, NULL, '2023-07-28 06:05:32', '2023-07-28 06:05:32'),
(36, 'مينا', 50, 1, '1', 3, NULL, NULL, NULL),
(37, 'اسم الفحص', 0, 3, '1', 3, NULL, '2023-07-28 12:06:53', '2023-07-28 12:06:53'),
(38, 'تحليل دم', 20, 3, '1', 3, NULL, '2023-07-28 12:06:53', '2023-07-28 12:06:53'),
(39, 'تحليل بول', 10, 3, '1', 3, NULL, '2023-07-28 12:06:53', '2023-07-28 12:06:53'),
(40, 'اسم الفحص', 0, 3, '1', 3, NULL, '2023-07-28 12:07:53', '2023-07-28 12:07:53'),
(41, 'تحليل دم', 20, 3, '1', 3, NULL, '2023-07-28 12:07:53', '2023-07-28 12:07:53'),
(42, 'تحليل بول', 10, 3, '1', 3, NULL, '2023-07-28 12:07:53', '2023-07-28 12:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `intensive_care_approve_company`
--

CREATE TABLE `intensive_care_approve_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `precent` int(11) DEFAULT 100,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intensive_care_approve_company`
--

INSERT INTO `intensive_care_approve_company` (`id`, `item`, `precent`, `company`, `hospital`, `updated_at`) VALUES
(5, 24, 100, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intensive_care_booking`
--

CREATE TABLE `intensive_care_booking` (
  `id` int(11) NOT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `doctor` int(11) DEFAULT 0,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intensive_care_booking`
--

INSERT INTO `intensive_care_booking` (`id`, `medical_examination`, `price`, `name`, `doctor`, `created`, `time`, `hospital`, `status`, `updated_at`) VALUES
(29, 24, 40, 398, 5, '2023-05-25', NULL, 1, 'ok', '2023-05-25 20:18:53'),
(30, 24, 40, 399, 5, '2023-05-25', NULL, 1, 'ok', '2023-05-25 20:37:37'),
(31, 24, 40, 400, 5, '2023-05-25', NULL, 1, 'ok', '2023-05-25 20:44:16'),
(32, 24, 40, 406, 14, '2023-05-29', NULL, 1, 'ok', '2023-05-29 06:16:23'),
(33, 24, 40, 414, 5, '2023-05-29', NULL, 1, 'ok', '2023-05-29 07:55:22'),
(34, 24, 40, 415, 18, '2023-05-29', NULL, 1, 'ok', '2023-05-29 08:03:14'),
(35, 24, 40, 416, 16, '2023-05-29', NULL, 1, 'ok', '2023-05-29 08:11:48'),
(36, 24, 40, 417, 16, '2023-05-29', NULL, 1, 'ok', '2023-05-29 08:42:52'),
(37, 24, 40, 418, 16, '2023-05-29', NULL, 1, 'ok', '2023-05-29 08:43:29'),
(38, 24, 40, 488, 5, '2023-08-7', NULL, 1, NULL, NULL),
(39, 25, 0, 494, 6, '2023-08-8', NULL, 1, NULL, NULL),
(40, 25, 0, 495, 18, '2023-08-8', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intensive_care_department`
--

CREATE TABLE `intensive_care_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intensive_care_department`
--

INSERT INTO `intensive_care_department` (`id`, `name`, `hospital`, `updated_at`) VALUES
(1, 'Mena Saleep', 1, '2023-05-08 05:05:49'),
(3, 'مينا', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_buying_medicines`
--

CREATE TABLE `invoice_buying_medicines` (
  `id` int(11) NOT NULL,
  `invoice_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `operation_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `supplier` int(255) DEFAULT NULL,
  `discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `paid_up` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `total_due` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_buying_medicines`
--

INSERT INTO `invoice_buying_medicines` (`id`, `invoice_type`, `operation_type`, `supplier`, `discount`, `paid_up`, `total_due`, `created`, `hospital`, `user_id`, `updated_at`) VALUES
(15, 'purchases', 'مدفوع', NULL, NULL, NULL, '1050.00', '22-2-2015', 1, '1', NULL),
(16, 'purchases', 'مدفوع', NULL, NULL, NULL, '1050.00', NULL, 1, '1', NULL),
(17, 'purchases', 'مدفوع', NULL, NULL, NULL, '1050.00', NULL, 1, '1', NULL),
(18, 'purchases', 'مدفوع', NULL, NULL, NULL, '1050.00', NULL, 1, '1', NULL),
(19, 'purchases', 'مدفوع', NULL, NULL, NULL, '1050.00', NULL, 1, '1', NULL),
(20, 'purchases', 'اجل', NULL, NULL, NULL, '127.05', NULL, 1, '1', NULL),
(21, 'purchases', 'اجل', NULL, NULL, NULL, '127.05', NULL, 1, '1', NULL),
(22, 'purchases', 'اجل', NULL, NULL, NULL, '127.05', NULL, 1, '1', NULL),
(23, 'purchases', '0', NULL, NULL, NULL, '10500.00', NULL, 1, '1', NULL),
(24, 'purchases', 'اجل', NULL, NULL, NULL, '127.05', NULL, 1, '1', NULL),
(25, 'purchases', 'اجل', NULL, NULL, NULL, '127.05', NULL, 1, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detales_buying_medicines`
--

CREATE TABLE `invoice_detales_buying_medicines` (
  `id` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `count` varchar(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_detales_buying_medicines`
--

INSERT INTO `invoice_detales_buying_medicines` (`id`, `product`, `count`, `price`, `invoice_id`, `hospital`) VALUES
(1, '2', '10', 10, 5, 1),
(2, '2', '10', 10, 6, 1),
(3, '2', '10', 10, 7, 1),
(4, '2', '10', 10, 8, 1),
(5, '2', '10', 10, 9, 1),
(6, '2', '10', 10, 10, 1),
(7, '2', '10', 10, 11, 1),
(8, '2', '10', 10, 12, 1),
(9, '2', '10', 10, 13, 1),
(10, '2', '10', 10, 14, 1),
(11, '3', '10', 10, 15, 1),
(12, '4', '10', 90, 15, 1),
(13, '3', '10', 10, 16, 1),
(14, '4', '10', 90, 16, 1),
(15, '3', '10', 10, 17, 1),
(16, '4', '10', 90, 17, 1),
(17, '3', '10', 10, 18, 1),
(18, '4', '10', 90, 18, 1),
(19, '3', '10', 10, 19, 1),
(20, '4', '10', 90, 19, 1),
(21, '2', '11', 11, 20, 1),
(22, '2', '11', 11, 21, 1),
(23, '2', '11', 11, 22, 1),
(24, '2', '1000', 10, 23, 1),
(25, '2', '11', 11, 24, 1),
(26, '2', '11', 11, 25, 1),
(27, '2', '11', 11, 26, 1),
(28, '2', '11', 11, 27, 1),
(29, '2', '11', 11, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_examination`
--

CREATE TABLE `medical_examination` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_examination`
--

INSERT INTO `medical_examination` (`id`, `name`, `price`, `category`, `insurance_company`, `service_provider`, `hospital`, `company`, `updated_at`, `created_at`) VALUES
(0, 'غير محدد', 0, 0, 0, 0, 1, 1, NULL, NULL),
(1, 'امراض السكر', 40, 1, 0, 1, 1, NULL, '2022-11-04 19:44:24', NULL),
(2, 'امراض ضغط الدم', 40, 1, 0, 1, 1, NULL, NULL, NULL),
(3, 'امراض القلب والشرايين', 40, 1, 0, 1, 1, NULL, NULL, NULL),
(4, 'امراض السرطان والاورام بانواعها', 40, 1, 0, 1, 1, NULL, NULL, NULL),
(5, 'امراض الجهاز التناسلي', 40, 1, 0, 1, NULL, NULL, NULL, NULL),
(6, 'امراض الكلي', 40, 1, 0, 1, NULL, NULL, '2022-11-04 19:44:56', NULL),
(7, 'مرض الوباء الكبدي', 200, 1, 0, 1, NULL, NULL, NULL, NULL),
(8, 'اصابات العمل الخطيرة', 40, 2, 0, 1, NULL, NULL, NULL, NULL),
(9, 'الحوادث الخطيرة', 40, 2, 0, 1, NULL, NULL, NULL, NULL),
(10, 'حالات الاغماء لاي سبب', 40, 2, 0, 1, NULL, NULL, NULL, NULL),
(11, 'حالات العناية بالمواليد', 40, 2, 0, 1, NULL, NULL, NULL, NULL),
(12, 'امراض النساء', 40, 3, 0, 1, NULL, NULL, NULL, NULL),
(13, 'امراض الاطفال', 40, 4, 0, 1, NULL, NULL, NULL, NULL),
(14, 'عمليات الليزك مغطاة حتي 80%', 40, 5, 0, 1, NULL, NULL, NULL, NULL),
(15, 'امراض الجلدية', 40, 6, 0, 1, NULL, NULL, NULL, NULL),
(16, 'امراض المسالك', 40, 7, 0, 1, NULL, NULL, NULL, NULL),
(17, 'امراض الانف والاذن والحنجرة', 40, 8, 0, 1, NULL, NULL, NULL, NULL),
(18, 'امراض العقم والمساعدة علي الانجاب', 40, 9, 0, 1, NULL, NULL, NULL, NULL),
(19, 'امراض النفسية والعقلية', 40, 11, 0, 1, NULL, NULL, NULL, NULL),
(20, 'امراض العظام', 40, 12, 0, 1, NULL, NULL, NULL, NULL),
(21, 'Black Jacquard Taffeta Abaya', 90, 1, 1, NULL, NULL, NULL, NULL, NULL),
(22, 'مينا', 100, 1, 1, 3, NULL, NULL, NULL, NULL),
(23, 'اسم الفحص', 0, 1, 1, 3, NULL, NULL, '2023-07-29 07:41:44', '2023-07-29 07:41:44'),
(24, 'تحليل دم', 20, 1, 1, 3, NULL, NULL, '2023-07-29 07:41:44', '2023-07-29 07:41:44'),
(25, 'تحليل بول', 10, 1, 1, 3, NULL, NULL, '2023-07-29 07:41:44', '2023-07-29 07:41:44'),
(26, 'اسم الفحص', 0, 1, 1, 3, NULL, NULL, '2023-07-29 07:42:06', '2023-07-29 07:42:06'),
(27, 'تحليل دم', 20, 1, 1, 3, NULL, NULL, '2023-07-29 07:42:06', '2023-07-29 07:42:06'),
(28, 'تحليل بول', 10, 1, 1, 3, NULL, NULL, '2023-07-29 07:42:06', '2023-07-29 07:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `medical_examination_approve_company`
--

CREATE TABLE `medical_examination_approve_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `precent` int(11) DEFAULT 100,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_examination_approve_company`
--

INSERT INTO `medical_examination_approve_company` (`id`, `item`, `precent`, `company`, `hospital`, `updated_at`) VALUES
(6, 2, 100, 1, 1, NULL),
(7, 7, 90, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medical_examination_booking`
--

CREATE TABLE `medical_examination_booking` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `doctor` int(11) DEFAULT 0,
  `price` int(11) DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `key` int(11) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_examination_booking`
--

INSERT INTO `medical_examination_booking` (`id`, `name`, `medical_examination`, `doctor`, `price`, `status`, `hospital`, `key`, `created`, `updated_at`) VALUES
(431, 456, 0, 0, 0, NULL, 1, NULL, '2023-08-6', NULL),
(432, 456, 4, 16, 40, NULL, 1, NULL, '2023-08-6', NULL),
(433, 457, 0, 0, 0, NULL, 1, NULL, '2023-08-6', NULL),
(434, 457, 4, 16, 40, NULL, 1, NULL, '2023-08-6', NULL),
(435, 458, 0, 0, 0, NULL, 1, NULL, '2023-08-6', NULL),
(436, 458, 4, 16, 40, NULL, 1, NULL, '2023-08-6', NULL),
(437, 459, 0, 0, 0, NULL, 1, NULL, '2023-08-6', NULL),
(438, 459, 4, 16, 40, NULL, 1, NULL, '2023-08-6', NULL),
(439, 460, 0, 0, 0, NULL, 1, NULL, '2023-08-6', NULL),
(440, 460, 1, 1, 40, NULL, 1, NULL, '2023-08-6', NULL),
(441, 461, 0, 0, 0, NULL, 1, NULL, '2023-08-6', NULL),
(442, 461, 1, 1, 40, NULL, 1, NULL, '2023-08-6', NULL),
(443, 461, 0, 0, 0, NULL, 1, NULL, '2023-08-6', NULL),
(444, 461, 24, 1, 20, NULL, 1, NULL, '2023-08-6', NULL),
(445, 462, 0, 0, 0, NULL, 1, NULL, '2023-08-6', NULL),
(446, 462, 1, 1, 40, NULL, 1, NULL, '2023-08-6', NULL),
(447, 463, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(448, 463, 1, 6, 40, NULL, 1, NULL, '2023-08-7', NULL),
(449, 464, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(450, 464, 1, 6, 40, NULL, 1, NULL, '2023-08-7', NULL),
(451, 465, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(452, 465, 1, 6, 40, NULL, 1, NULL, '2023-08-7', NULL),
(453, 466, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(454, 466, 1, 6, 40, NULL, 1, NULL, '2023-08-7', NULL),
(455, 474, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(456, 474, 1, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(457, 475, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(458, 475, 1, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(459, 476, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(460, 476, 1, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(461, 477, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(462, 477, 1, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(463, 478, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(464, 478, 1, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(465, 481, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(466, 481, 1, 6, 40, NULL, 1, NULL, '2023-08-7', NULL),
(467, 482, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(468, 482, 1, 6, 40, NULL, 1, NULL, '2023-08-7', NULL),
(469, 483, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(470, 483, 2, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(471, 484, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(472, 484, 2, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(473, 485, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(474, 485, 2, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(475, 486, 0, 0, 0, NULL, 1, NULL, '2023-08-7', NULL),
(476, 486, 2, 5, 40, NULL, 1, NULL, '2023-08-7', NULL),
(477, 492, 0, 0, 0, NULL, 1, NULL, '2023-08-8', NULL),
(478, 492, 1, 5, 40, NULL, 1, NULL, '2023-08-8', NULL),
(479, 494, 0, 0, 0, NULL, 1, NULL, '2023-08-8', NULL),
(480, 494, 1, 1, 40, NULL, 1, NULL, '2023-08-8', NULL),
(481, 495, 0, 0, 0, NULL, 1, NULL, '2023-08-8', NULL),
(482, 495, 1, 1, 40, NULL, 1, NULL, '2023-08-8', NULL),
(483, 499, 0, 0, 0, NULL, 1, NULL, '2023-09-28', NULL),
(484, 499, 2, 1, 40, NULL, 1, NULL, '2023-09-28', NULL),
(485, 500, 0, 0, 0, NULL, 1, NULL, '2023-09-28', NULL),
(486, 500, 1, 5, 40, NULL, 1, NULL, '2023-09-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medical_network`
--

CREATE TABLE `medical_network` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_network`
--

INSERT INTO `medical_network` (`id`, `name`, `insurance_company`) VALUES
(1, 'A+', 1),
(2, 'A', 1),
(3, 'B', 1),
(4, 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `phone`, `email`, `birthday`, `hospital`) VALUES
(7, 'Black Jacquard Taffeta Abaya', '1', NULL, NULL, NULL),
(8, 'Black Jacquard Taffeta Abaya', '0100000000', NULL, NULL, 1),
(9, 'احمد علاء', '1062439441', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE `messenger` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_view` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `message` text CHARACTER SET utf8 NOT NULL,
  `user_view` int(255) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender`, `user`, `view`, `message`, `user_view`, `hospital`, `company`, `created`, `updated_at`) VALUES
(648, NULL, 5, 0, ' تم تعليق طلب اجازتك  -  قف', NULL, NULL, NULL, NULL, NULL),
(649, NULL, 1, 1, ' تم رفض طلب اجازتك  -  قف', NULL, NULL, NULL, NULL, NULL),
(650, NULL, 1, 0, 'تم استلامك للراتب - ', NULL, NULL, NULL, NULL, NULL),
(651, NULL, 5, 0, 'تم استلامك للراتب - ', NULL, NULL, NULL, NULL, NULL),
(652, NULL, 1, 0, 'تم استلامك للراتب - ', NULL, NULL, NULL, NULL, NULL),
(653, NULL, 6, 0, 'تم استلامك للراتب - ', NULL, NULL, NULL, NULL, NULL),
(654, NULL, 6, 0, 'تم استلامك للراتب - ', NULL, NULL, NULL, NULL, NULL),
(655, NULL, 5, 0, 'تم استلامك للراتب - ', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `online_booking`
--

CREATE TABLE `online_booking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `diagnosing` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `wage` int(11) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `user`, `wage`, `bank`, `hospital`, `created`, `date`, `month`) VALUES
(1, 1, 2000, 1, 1, 'July 31, 2023, 12:52 pm', '31-7-2023', '2023-07'),
(2, 5, 2000, 1, 1, 'July 31, 2023, 12:53 pm', '31-7-2023', '2023-07'),
(3, 1, 2000, 3, 1, 'July 31, 2023, 12:54 pm', '31-7-2023', '2023-07'),
(4, 6, 2000, 1, 1, 'July 31, 2023, 6:30 pm', '31-7-2023', '2023-07'),
(5, 6, 2000, 1, 1, 'July 31, 2023, 6:31 pm', '31-7-2023', '2023-08'),
(6, 5, 2000, 4, 1, 'July 31, 2023, 6:31 pm', '31-7-2023', '2023-07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `how_to_use` text CHARACTER SET utf8 DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `expiration_date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `storage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tablet` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `strip` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `meas` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `small_price` int(11) DEFAULT NULL,
  `large_price` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `name`, `how_to_use`, `count`, `category`, `price`, `expiration_date`, `storage`, `type`, `tablet`, `strip`, `volume`, `unit`, `qty`, `meas`, `small_price`, `large_price`, `hospital`, `insurance_company`, `updated_at`) VALUES
(10, 'احمد علاء', NULL, NULL, 1, NULL, NULL, NULL, 'TM', '3', '10', 50, NULL, NULL, NULL, 11, 12, NULL, 1, '2023-07-20 07:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_department`
--

CREATE TABLE `pharmacy_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_department`
--

INSERT INTO `pharmacy_department` (`id`, `name`, `hospital`, `updated_at`) VALUES
(1, 'Mena Saleep fffffffffff', 1, '2023-03-03 03:22:12'),
(2, 'Italian lining with beige lining', 1, NULL),
(3, 'مينا1111', 1, '2023-05-27 18:41:45'),
(4, 'احمد علاء', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `physical_therapy`
--

CREATE TABLE `physical_therapy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physical_therapy`
--

INSERT INTO `physical_therapy` (`id`, `name`, `price`, `category`, `insurance_company`, `service_provider`, `hospital`, `updated_at`, `created_at`) VALUES
(46, 'علاج طبيعي', 20, 4, 1, 3, 1, '2023-07-28 16:55:51', '2023-07-28 16:55:51'),
(47, 'تحليل بول', 10, 4, 1, 3, 1, '2023-07-28 16:55:51', '2023-07-28 16:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `physical_therapy_approve_company`
--

CREATE TABLE `physical_therapy_approve_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `precent` int(11) DEFAULT 100,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physical_therapy_approve_company`
--

INSERT INTO `physical_therapy_approve_company` (`id`, `item`, `precent`, `company`, `hospital`, `updated_at`) VALUES
(4, 24, 100, 1, 1, NULL),
(5, 24, 100, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `physical_therapy_booking`
--

CREATE TABLE `physical_therapy_booking` (
  `id` int(11) NOT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `doctor` int(11) DEFAULT 0,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physical_therapy_booking`
--

INSERT INTO `physical_therapy_booking` (`id`, `medical_examination`, `price`, `name`, `doctor`, `created`, `time`, `hospital`, `status`, `updated_at`) VALUES
(31, 25, 100, 419, 1, '2023-05-29', NULL, 1, 'not', '2023-05-29 08:47:19'),
(32, 25, 100, 420, 5, '2023-05-29', NULL, 1, 'not', '2023-05-29 18:46:48'),
(33, 46, 90, 496, 6, '2023-08-8', NULL, 1, NULL, NULL),
(34, 46, 90, 497, 5, '2023-08-8', NULL, 1, NULL, NULL),
(35, 46, 90, 498, 6, '2023-08-8', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `physical_therapy_department`
--

CREATE TABLE `physical_therapy_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physical_therapy_department`
--

INSERT INTO `physical_therapy_department` (`id`, `name`, `hospital`, `updated_at`) VALUES
(4, 'احمد علاء', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pool`
--

CREATE TABLE `pool` (
  `id` int(11) NOT NULL,
  `plan` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pool` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `money` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `percentage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `number_of_subscribers` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_company` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pool`
--

INSERT INTO `pool` (`id`, `plan`, `pool`, `money`, `percentage`, `number_of_subscribers`, `company`, `insurance_company`) VALUES
(1, '1', '1', '10000', NULL, '5', '10', NULL),
(2, '2', NULL, '5000', '10', '5', NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '4', NULL, '100', '1', '5', NULL, NULL),
(5, '4', '1', '100', '10', '4', NULL, NULL),
(6, '4', '1', '100', '2', '43', '10', NULL),
(7, NULL, '2', '1000', NULL, '19', '10', NULL),
(8, '1', '2', '100', '11', '11', '10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pool_plan`
--

CREATE TABLE `pool_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pool_plan`
--

INSERT INTO `pool_plan` (`id`, `name`, `company`, `insurance_company`) VALUES
(1, 'منفعة مجمعة لكل المشتركين', 0, 1),
(2, 'نسبة لكل المشتركين حتي الحد الاقصي', NULL, 1),
(3, 'نسبة لكل المشتركين بمبلغ المعين', NULL, 1),
(4, 'مبلغ لكل فرد من المشتركين', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pool_service`
--

CREATE TABLE `pool_service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pool_service`
--

INSERT INTO `pool_service` (`id`, `name`, `company`, `insurance_company`) VALUES
(1, 'موزمـــــن', NULL, 1),
(2, 'علاج طبيعــــــي', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `count_stock` int(11) DEFAULT 0,
  `count_hospital` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `count_stock`, `count_hospital`, `hospital`, `updated_at`) VALUES
(1, 'مينا1111', 0, 0, 0, 1, '2023-05-24 13:09:38'),
(2, 'انبوب اكسوجين', 0, 0, 0, 1, NULL),
(3, 'بالطو', 0, 0, 0, 1, NULL),
(4, 'خيط', 0, 0, 0, 1, NULL),
(5, 'مقص', 0, 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_receive`
--

CREATE TABLE `product_receive` (
  `id` int(11) NOT NULL,
  `product` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `recipient` int(11) DEFAULT NULL,
  `date_filter` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_receive`
--

INSERT INTO `product_receive` (`id`, `product`, `count`, `sender`, `recipient`, `date_filter`, `hospital`, `created`) VALUES
(1, 3, 3, 1, 9, '2023-05-24', 1, 'May 24, 2023, 2:50 pm');

-- --------------------------------------------------------

--
-- Table structure for table `quartering`
--

CREATE TABLE `quartering` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `insurance_company` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quartering`
--

INSERT INTO `quartering` (`id`, `name`, `price`, `category`, `insurance_company`, `service_provider`, `hospital`, `updated_at`, `created_at`) VALUES
(25, 'غرفة', 90, 1, NULL, 1, 1, NULL, NULL),
(26, 'غرفة كامله', 90, 1, '1', 3, 1, NULL, NULL),
(27, 'اسم الفحص', 0, 1, NULL, NULL, 1, '2023-07-28 17:51:15', '2023-07-28 17:51:15'),
(28, 'تحليل دم', 20, 1, NULL, NULL, NULL, '2023-07-28 17:51:15', '2023-07-28 17:51:15'),
(29, 'تحليل بول', 10, 1, NULL, NULL, NULL, '2023-07-28 17:51:15', '2023-07-28 17:51:15'),
(30, 'احمد علاء', 90, 1, '1', 3, NULL, NULL, NULL),
(31, 'اسم الفحص', 0, 1, NULL, NULL, NULL, '2023-07-28 17:51:37', '2023-07-28 17:51:37'),
(32, 'تحليل دم', 20, 1, NULL, NULL, NULL, '2023-07-28 17:51:37', '2023-07-28 17:51:37'),
(33, 'تحليل بول', 10, 1, NULL, NULL, NULL, '2023-07-28 17:51:37', '2023-07-28 17:51:37'),
(34, 'اسم الفحص', 0, 1, '1', 3, NULL, '2023-07-28 17:53:49', '2023-07-28 17:53:49'),
(35, 'تحليل دم', 20, 1, '1', 3, NULL, '2023-07-28 17:53:49', '2023-07-28 17:53:49'),
(36, 'تحليل بول', 10, 1, '1', 3, NULL, '2023-07-28 17:53:49', '2023-07-28 17:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `quartering_approve_company`
--

CREATE TABLE `quartering_approve_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `precent` int(11) DEFAULT 100,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quartering_approve_company`
--

INSERT INTO `quartering_approve_company` (`id`, `item`, `precent`, `company`, `hospital`, `updated_at`) VALUES
(1, 21, 100, NULL, 1, NULL),
(2, 21, 100, 1, 1, NULL),
(3, 21, 100, 1, 1, NULL),
(4, 24, 100, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quartering_booking`
--

CREATE TABLE `quartering_booking` (
  `id` int(11) NOT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `doctor` int(11) NOT NULL DEFAULT 0,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quartering_booking`
--

INSERT INTO `quartering_booking` (`id`, `medical_examination`, `price`, `name`, `doctor`, `created`, `time`, `hospital`, `status`, `updated_at`) VALUES
(33, 25, 90, 496, 14, '2023-08-8', NULL, 1, NULL, NULL),
(34, 25, 90, 497, 14, '2023-08-8', NULL, 1, NULL, NULL),
(35, 25, 90, 498, 5, '2023-08-8', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quartering_department`
--

CREATE TABLE `quartering_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quartering_department`
--

INSERT INTO `quartering_department` (`id`, `name`, `hospital`, `updated_at`) VALUES
(1, 'Mena Saleep fffffffffff', 1, '2023-03-03 03:22:12'),
(3, 'احمد علاء', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ray`
--

CREATE TABLE `ray` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ray`
--

INSERT INTO `ray` (`id`, `name`, `price`, `category`, `service_provider`, `hospital`, `insurance_company`, `updated_at`, `created_at`) VALUES
(28, 'اشعه ', 0, 3, 3, 1, 1, '2023-07-28 12:12:33', '2023-07-28 12:12:33'),
(29, 'اشعة رانين', 20, 3, 3, 1, 1, '2023-07-28 12:12:33', '2023-07-28 12:12:33'),
(30, 'تحليل بول', 10, 3, 3, 1, 1, '2023-07-28 12:12:33', '2023-07-28 12:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `ray_approve_company`
--

CREATE TABLE `ray_approve_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `precent` int(11) DEFAULT 100,
  `doctor` int(11) DEFAULT 0,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ray_approve_company`
--

INSERT INTO `ray_approve_company` (`id`, `item`, `precent`, `doctor`, `company`, `hospital`, `updated_at`) VALUES
(4, 24, 100, 0, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ray_booking`
--

CREATE TABLE `ray_booking` (
  `id` int(11) NOT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `doctor` int(11) NOT NULL DEFAULT 0,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ray_booking`
--

INSERT INTO `ray_booking` (`id`, `medical_examination`, `price`, `name`, `doctor`, `created`, `time`, `hospital`, `status`, `updated_at`) VALUES
(55, 44, 20, 478, 6, '2023-08-7', NULL, 1, NULL, NULL),
(56, 30, 10, 482, 5, '2023-08-7', NULL, 1, NULL, NULL),
(57, 29, 20, 483, 18, '2023-08-7', NULL, 1, NULL, NULL),
(58, 29, 20, 484, 18, '2023-08-7', NULL, 1, NULL, NULL),
(59, 29, 20, 485, 18, '2023-08-7', NULL, 1, NULL, NULL),
(60, 29, 20, 486, 18, '2023-08-7', NULL, 1, NULL, NULL),
(61, 28, 0, 493, 6, '2023-08-8', NULL, 1, NULL, NULL),
(62, 28, 0, 494, 6, '2023-08-8', NULL, 1, NULL, NULL),
(63, 29, 20, 495, 6, '2023-08-8', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ray_department`
--

CREATE TABLE `ray_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ray_department`
--

INSERT INTO `ray_department` (`id`, `name`, `hospital`, `updated_at`) VALUES
(3, 'مينا1111', 1, '2023-05-18 16:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `recepion`
--

CREATE TABLE `recepion` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `members` int(11) DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `total_due` int(11) DEFAULT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `receptionist` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `time_filter` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ranking_number` int(11) DEFAULT 0,
  `author` int(11) DEFAULT NULL,
  `type` varchar(22) CHARACTER SET utf8 DEFAULT NULL,
  `online` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recepion`
--

INSERT INTO `recepion` (`id`, `username`, `members`, `phone`, `insurance_number`, `category`, `total_due`, `medical_examination`, `receptionist`, `hospital`, `time_filter`, `ranking_number`, `author`, `type`, `online`, `company`, `created`, `updated_at`) VALUES
(500, NULL, 8, NULL, NULL, NULL, 40, NULL, NULL, 1, '2023-09-28', 0, 1, 'normal', NULL, NULL, '28-9-2023, 6:14 am', '2023-09-28 06:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `branch` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tax_record` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tax_registration_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `issuer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `start` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `end` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_officer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_officer_phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type_contract` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `consultation_period` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `administrative_expenses` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `repayment_period` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bank` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bank_acount_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`id`, `name`, `branch`, `class`, `tel`, `phone`, `email`, `fax`, `tax_record`, `tax_registration_number`, `issuer`, `city`, `address`, `start`, `end`, `insurance_officer`, `insurance_officer_phone`, `type_contract`, `discount`, `consultation_period`, `administrative_expenses`, `repayment_period`, `bank`, `bank_acount_number`, `insurance`, `status`, `company`, `insurance_company`, `updated_at`) VALUES
(3, 'مستشفي السلام', 'ايو المطامير', NULL, 'fffdddddd', '⁦505580553⁩', 'menaspoon73@gmail.com', 'fff', 'ef', 'df', 'df', 'alex', 'alex', '2023-06-02', '2024-06-02', 'qqqq', '7777777', 'فثف', '7', 'ييي', 'ييي', '57', 'بنك مصر', '66', '66', '66', 1, 1, '2023-07-18 17:21:53'),
(4, 'مستشفي الراعي', 'ايو المطامير', NULL, 'fff', '⁦505580553⁩', 'menaspoon73@gmail.com', 'fff', 'ef', 'df', 'df', 'alex', 'alex', '2023-06-02', NULL, 'qqqq', '7777777', NULL, NULL, NULL, NULL, '55', 'بنك مصر', '66', '66', '66', 1, 1, NULL),
(5, 'معمل الامانة', 'ايو المطامير', NULL, 'fff', '⁦505580553⁩', 'menaspoon73@gmail.com', 'fff', 'ef', 'df', 'df', 'alex', 'alex', '2023-06-02', NULL, 'qqqq', '7777777', NULL, NULL, NULL, NULL, '55', 'بنك مصر', '66', '66', '66', 1, 1, NULL),
(6, 'مستوصف الدوار', 'ايو المطامير', NULL, 'fff', '⁦505580553⁩', 'menaspoon73@gmail.com', 'fff', 'ef', 'df', 'df', 'alex', 'alex', '2023-06-02', NULL, 'qqqq', '7777777', NULL, NULL, NULL, NULL, '55', 'بنك مصر', '66', '66', '66', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `hospital` int(11) DEFAULT NULL,
  `service_cost` int(11) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `taxes` int(11) DEFAULT NULL,
  `receive_payments` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `notification_balance` int(11) DEFAULT 1000,
  `notification_count_pharmacy` int(11) DEFAULT 100,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `hospital`, `service_cost`, `discount_percentage`, `taxes`, `receive_payments`, `notification_balance`, `notification_count_pharmacy`, `updated_at`) VALUES
(1, 1, 10, 3, 1, 'booking', 2000, NULL, '2022-11-20 19:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `balance` int(11) DEFAULT 0,
  `discount_percentage` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `phone`, `address`, `balance`, `discount_percentage`, `hospital`, `updated_at`) VALUES
(1, 'Mena Saleep', 'menaspoon73@gmail.com', '2233445544', 'alexffffff', 11, 1, 1, '2022-11-28 07:33:30'),
(2, 'شركة ميديا تك للمستلزمات الطبية', 'mena@gmail.com', '2233445544', 'alex', 0, 1, 1, '2022-11-29 09:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `surgery`
--

CREATE TABLE `surgery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `service_provider` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surgery`
--

INSERT INTO `surgery` (`id`, `name`, `category`, `service_provider`, `price`, `insurance_company`, `hospital`, `updated_at`, `created_at`) VALUES
(35, 'اسم الفحص', NULL, NULL, 5, NULL, NULL, '2023-07-27 07:42:46', '2023-07-27 07:42:46'),
(36, 'تحليل دم', NULL, NULL, 20, NULL, NULL, '2023-07-27 07:42:46', '2023-07-27 07:42:46'),
(37, 'تحليل بول', 2, NULL, 10, NULL, NULL, '2023-07-27 07:42:46', '2023-07-27 07:42:46'),
(38, 'اسم الفحص', 1, 3, 55, 1, NULL, '2023-07-27 07:48:13', '2023-07-27 07:48:13'),
(39, 'تحليل دم', 1, 3, 20, 1, NULL, '2023-07-27 07:48:13', '2023-07-27 07:48:13'),
(40, 'تحليل بول', 1, 3, 10, 1, NULL, '2023-07-27 07:48:13', '2023-07-27 07:48:13'),
(41, 'اسم الفحص', 1, 3, 5, 1, NULL, '2023-07-27 08:23:38', '2023-07-27 08:23:38'),
(42, 'تحليل دم', 1, 3, 20, 1, NULL, '2023-07-27 08:23:38', '2023-07-27 08:23:38'),
(43, 'تحليل بول', 1, 3, 10, 1, 1, '2023-07-27 08:23:38', '2023-07-27 08:23:38'),
(44, 'اسم الفحص', 1, 3, 56, 1, 1, '2023-07-27 08:44:03', '2023-07-27 08:44:03'),
(45, 'عملية ', 1, 3, 20, 1, 1, '2023-07-27 08:44:03', '2023-07-27 08:44:03'),
(46, 'عملية بواسير', 1, 3, 10, 1, 1, '2023-07-27 08:44:03', '2023-07-27 08:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `surgery_approve_company`
--

CREATE TABLE `surgery_approve_company` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `precent` int(11) DEFAULT 100,
  `company` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surgery_approve_company`
--

INSERT INTO `surgery_approve_company` (`id`, `item`, `precent`, `company`, `hospital`, `updated_at`) VALUES
(6, 3, 100, 1, 1, NULL),
(7, 5, 100, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surgery_booking`
--

CREATE TABLE `surgery_booking` (
  `id` int(11) NOT NULL,
  `medical_examination` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `doctor` int(11) NOT NULL DEFAULT 0,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surgery_booking`
--

INSERT INTO `surgery_booking` (`id`, `medical_examination`, `price`, `name`, `doctor`, `created`, `time`, `hospital`, `status`, `updated_at`) VALUES
(32, 0, NULL, 470, 0, '2023-08-7', NULL, 1, NULL, NULL),
(33, 45, NULL, 470, 5, '2023-08-7', NULL, 1, NULL, NULL),
(34, 45, NULL, 472, 5, '2023-08-7', NULL, 1, NULL, NULL),
(35, 45, NULL, 473, 5, '2023-08-7', NULL, 1, NULL, NULL),
(36, 44, NULL, 475, 6, '2023-08-7', NULL, 1, NULL, NULL),
(37, 44, 56, 476, 5, '2023-08-7', NULL, 1, NULL, NULL),
(38, 44, 56, 477, 5, '2023-08-7', NULL, 1, NULL, NULL),
(39, 44, 56, 478, 5, '2023-08-7', NULL, 1, NULL, NULL),
(40, 43, 10, 483, 1, '2023-08-7', NULL, 1, NULL, NULL),
(41, 43, 10, 484, 1, '2023-08-7', NULL, 1, NULL, NULL),
(42, 43, 10, 485, 1, '2023-08-7', NULL, 1, NULL, NULL),
(43, 43, 10, 486, 1, '2023-08-7', NULL, 1, NULL, NULL),
(44, 45, 20, 494, 14, '2023-08-8', NULL, 1, NULL, NULL),
(45, 46, 10, 495, 14, '2023-08-8', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surgery_department`
--

CREATE TABLE `surgery_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surgery_department`
--

INSERT INTO `surgery_department` (`id`, `name`, `hospital`, `updated_at`) VALUES
(1, 'قسم عمليات الطوارئ', 1, '2023-05-29 06:31:49'),
(4, 'احمد علاء', 1, NULL),
(5, 'test', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `name`, `count`, `price`, `hospital`, `updated_at`) VALUES
(1, 'Mena Saleep fffffffffff', 66, NULL, 1, '2023-02-26 23:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `tools_purchases`
--

CREATE TABLE `tools_purchases` (
  `id` int(11) NOT NULL,
  `invoice_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `operation_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `supplier` int(255) DEFAULT NULL,
  `discount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `paid_up` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `total_due` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tools_purchases`
--

INSERT INTO `tools_purchases` (`id`, `invoice_type`, `operation_type`, `supplier`, `discount`, `paid_up`, `total_due`, `created`, `hospital`, `user_id`, `updated_at`) VALUES
(35, 'purchases', '0', 1, NULL, NULL, NULL, NULL, 1, '1', NULL),
(36, 'purchases', '0', 1, NULL, NULL, NULL, NULL, 1, '1', NULL),
(37, 'purchases', '0', 1, NULL, NULL, NULL, NULL, 1, '1', NULL),
(38, 'purchases', '0', 1, NULL, NULL, NULL, NULL, 1, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tools_purchases_details`
--

CREATE TABLE `tools_purchases_details` (
  `id` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `count` varchar(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tools_purchases_details`
--

INSERT INTO `tools_purchases_details` (`id`, `product`, `count`, `price`, `invoice_id`, `hospital`, `user_id`) VALUES
(1, '2', '10', 10, 5, 1, NULL),
(2, '2', '10', 10, 6, 1, NULL),
(3, '2', '10', 10, 7, 1, NULL),
(4, '2', '10', 10, 8, 1, NULL),
(5, '2', '10', 10, 9, 1, NULL),
(6, '2', '10', 10, 10, 1, NULL),
(7, '2', '10', 10, 11, 1, NULL),
(8, '2', '10', 10, 12, 1, NULL),
(9, '2', '10', 10, 13, 1, NULL),
(10, '2', '10', 10, 14, 1, NULL),
(11, '3', '10', 10, 15, 1, NULL),
(12, '4', '10', 90, 15, 1, NULL),
(13, '3', '10', 10, 16, 1, NULL),
(14, '4', '10', 90, 16, 1, NULL),
(15, '3', '10', 10, 17, 1, NULL),
(16, '4', '10', 90, 17, 1, NULL),
(17, '3', '10', 10, 18, 1, NULL),
(18, '4', '10', 90, 18, 1, NULL),
(19, '3', '10', 10, 19, 1, NULL),
(20, '4', '10', 90, 19, 1, NULL),
(21, '2', '11', 11, 20, 1, NULL),
(22, '2', '11', 11, 21, 1, NULL),
(23, '2', '11', 11, 22, 1, NULL),
(24, '2', '1000', 10, 23, 1, NULL),
(25, '2', '11', 11, 24, 1, NULL),
(26, '2', '11', 11, 25, 1, NULL),
(27, '2', '11', 11, 26, 1, NULL),
(28, '2', '11', 11, 27, 1, NULL),
(29, '2', '11', 11, 28, 1, NULL),
(30, '1', '11', 11, 38, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `acount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `text_password`, `hospital`, `insurance_company`, `picture`, `acount`, `company`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mena Saleep', 'menaspoon73@gmail.com', '01000000000008888', NULL, '$2y$10$kAdfwjETIlCCEsu696hLwuOAx1QiwHYIIEOUrh/jgbv6HsQVq/ul6', '12345678', 1, 1, '1668581687.jpg', 'doctor', 1, NULL, '2022-11-04 14:47:05', '2023-07-24 13:24:37'),
(5, 'دكتور محمد ونيس', 'wanies@gmail.com', '2233445544', NULL, '$2y$10$OCSClyR3i/CDm7XhcYJazuCXK8q.EENhSlWmOlnVc4CU09lNfYS7W', '12345678', 1, NULL, NULL, 'doctor', NULL, NULL, NULL, NULL),
(6, 'الجندي اسامة بركات', 'osama@gmail.com', '0100000000', NULL, '$2y$10$/Y/cs9KwLk41HsWXaaGWdeL.dFG4FJJvnB9bDphP1YZO5XrD5fn7q', '12345678', 1, NULL, NULL, 'doctor', NULL, NULL, NULL, NULL),
(8, 'محمد الشامي', 'menaspoon373@gmail.com', '2233445544', NULL, '$2y$10$tFE2YkzU3k17zQfbv7/g0.M1T6PGtk3KTHrTvPBKOCcIIMpk9ojlO', '12345678', 1, 1, '1668614442.webp', 'credit_officer', NULL, NULL, NULL, '2022-11-16 14:00:42'),
(9, 'موظف', 'mail@gmail.com', '454456', NULL, '', NULL, 1, NULL, NULL, 'employee', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `start` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `end` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `reason` text CHARACTER SET utf8 DEFAULT NULL,
  `note` text CHARACTER SET utf8 DEFAULT NULL,
  `note_admin` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`id`, `user`, `start`, `end`, `reason`, `note`, `note_admin`, `status`, `created`, `date`, `hospital`, `updated_at`) VALUES
(1, 1, '2023-03-17', '2023-03-23', 'fffffffffff', 'ccccccccccccc', 'ff', 'done', 'March 17, 2023, 12:07 am', '17-3-2023', 1, '2023-03-17 01:20:30'),
(2, 1, '2023-03-02', '2023-03-23', 'ي', 'يي', NULL, 'wating', 'March 17, 2023, 1:17 am', '17-3-2023', 1, NULL),
(3, 1, '2023-03-10', '2023-03-31', 'متعب', 'متعب جدا', 'بب', 'suspension', 'March 17, 2023, 1:25 am', '17-3-2023', 1, '2023-03-17 01:25:24'),
(4, 1, '2023-03-18', '2023-03-30', 'اجازة', 'اجازة', 'قفق', 'rejected', 'March 17, 2023, 1:30 am', '17-3-2023', 1, '2023-03-17 01:30:37'),
(5, 1, '2023-07-01', '2023-07-31', 'تعبان', 'غغ', 'قف', 'rejected', 'July 31, 2023, 5:39 am', '31-7-2023', 1, '2023-07-31 07:33:09'),
(6, 1, '2023-07-01', '2023-07-31', 'ddd', 'dd', NULL, 'wating', 'July 31, 2023, 7:35 am', '31-7-2023', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytics_approve_company`
--
ALTER TABLE `analytics_approve_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytics_booking`
--
ALTER TABLE `analytics_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytics_company`
--
ALTER TABLE `analytics_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytics_department`
--
ALTER TABLE `analytics_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approve_public`
--
ALTER TABLE `approve_public`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approve_service_details`
--
ALTER TABLE `approve_service_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate_premiums`
--
ALTER TABLE `corporate_premiums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degree_of_residence`
--
ALTER TABLE `degree_of_residence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosing`
--
ALTER TABLE `diagnosing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosing_details`
--
ALTER TABLE `diagnosing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosing_files`
--
ALTER TABLE `diagnosing_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosing_picture`
--
ALTER TABLE `diagnosing_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_approve_company`
--
ALTER TABLE `emergency_approve_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_booking`
--
ALTER TABLE `emergency_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_department`
--
ALTER TABLE `emergency_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intensive_care`
--
ALTER TABLE `intensive_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intensive_care_approve_company`
--
ALTER TABLE `intensive_care_approve_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intensive_care_booking`
--
ALTER TABLE `intensive_care_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intensive_care_department`
--
ALTER TABLE `intensive_care_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_buying_medicines`
--
ALTER TABLE `invoice_buying_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_detales_buying_medicines`
--
ALTER TABLE `invoice_detales_buying_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_examination`
--
ALTER TABLE `medical_examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_examination_approve_company`
--
ALTER TABLE `medical_examination_approve_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_examination_booking`
--
ALTER TABLE `medical_examination_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_network`
--
ALTER TABLE `medical_network`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger`
--
ALTER TABLE `messenger`
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
-- Indexes for table `online_booking`
--
ALTER TABLE `online_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_department`
--
ALTER TABLE `pharmacy_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physical_therapy`
--
ALTER TABLE `physical_therapy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physical_therapy_approve_company`
--
ALTER TABLE `physical_therapy_approve_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physical_therapy_booking`
--
ALTER TABLE `physical_therapy_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physical_therapy_department`
--
ALTER TABLE `physical_therapy_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool`
--
ALTER TABLE `pool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool_plan`
--
ALTER TABLE `pool_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool_service`
--
ALTER TABLE `pool_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_receive`
--
ALTER TABLE `product_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quartering`
--
ALTER TABLE `quartering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quartering_approve_company`
--
ALTER TABLE `quartering_approve_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quartering_booking`
--
ALTER TABLE `quartering_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quartering_department`
--
ALTER TABLE `quartering_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ray`
--
ALTER TABLE `ray`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ray_approve_company`
--
ALTER TABLE `ray_approve_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ray_booking`
--
ALTER TABLE `ray_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ray_department`
--
ALTER TABLE `ray_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recepion`
--
ALTER TABLE `recepion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgery`
--
ALTER TABLE `surgery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgery_approve_company`
--
ALTER TABLE `surgery_approve_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgery_booking`
--
ALTER TABLE `surgery_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgery_department`
--
ALTER TABLE `surgery_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools_purchases`
--
ALTER TABLE `tools_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools_purchases_details`
--
ALTER TABLE `tools_purchases_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `analytics_approve_company`
--
ALTER TABLE `analytics_approve_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `analytics_booking`
--
ALTER TABLE `analytics_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `analytics_company`
--
ALTER TABLE `analytics_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analytics_department`
--
ALTER TABLE `analytics_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `approve`
--
ALTER TABLE `approve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `approve_public`
--
ALTER TABLE `approve_public`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `approve_service_details`
--
ALTER TABLE `approve_service_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `corporate_premiums`
--
ALTER TABLE `corporate_premiums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `degree_of_residence`
--
ALTER TABLE `degree_of_residence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diagnosing`
--
ALTER TABLE `diagnosing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diagnosing_details`
--
ALTER TABLE `diagnosing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `diagnosing_files`
--
ALTER TABLE `diagnosing_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diagnosing_picture`
--
ALTER TABLE `diagnosing_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `emergency_approve_company`
--
ALTER TABLE `emergency_approve_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergency_booking`
--
ALTER TABLE `emergency_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `emergency_department`
--
ALTER TABLE `emergency_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intensive_care`
--
ALTER TABLE `intensive_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `intensive_care_approve_company`
--
ALTER TABLE `intensive_care_approve_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `intensive_care_booking`
--
ALTER TABLE `intensive_care_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `intensive_care_department`
--
ALTER TABLE `intensive_care_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_buying_medicines`
--
ALTER TABLE `invoice_buying_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `invoice_detales_buying_medicines`
--
ALTER TABLE `invoice_detales_buying_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `medical_examination`
--
ALTER TABLE `medical_examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `medical_examination_approve_company`
--
ALTER TABLE `medical_examination_approve_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medical_examination_booking`
--
ALTER TABLE `medical_examination_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487;

--
-- AUTO_INCREMENT for table `medical_network`
--
ALTER TABLE `medical_network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messenger`
--
ALTER TABLE `messenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=656;

--
-- AUTO_INCREMENT for table `online_booking`
--
ALTER TABLE `online_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pharmacy_department`
--
ALTER TABLE `pharmacy_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `physical_therapy`
--
ALTER TABLE `physical_therapy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `physical_therapy_approve_company`
--
ALTER TABLE `physical_therapy_approve_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `physical_therapy_booking`
--
ALTER TABLE `physical_therapy_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `physical_therapy_department`
--
ALTER TABLE `physical_therapy_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pool`
--
ALTER TABLE `pool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pool_plan`
--
ALTER TABLE `pool_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pool_service`
--
ALTER TABLE `pool_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_receive`
--
ALTER TABLE `product_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quartering`
--
ALTER TABLE `quartering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `quartering_approve_company`
--
ALTER TABLE `quartering_approve_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quartering_booking`
--
ALTER TABLE `quartering_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `quartering_department`
--
ALTER TABLE `quartering_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ray`
--
ALTER TABLE `ray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ray_approve_company`
--
ALTER TABLE `ray_approve_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ray_booking`
--
ALTER TABLE `ray_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `ray_department`
--
ALTER TABLE `ray_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recepion`
--
ALTER TABLE `recepion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surgery`
--
ALTER TABLE `surgery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `surgery_approve_company`
--
ALTER TABLE `surgery_approve_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surgery_booking`
--
ALTER TABLE `surgery_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `surgery_department`
--
ALTER TABLE `surgery_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tools_purchases`
--
ALTER TABLE `tools_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tools_purchases_details`
--
ALTER TABLE `tools_purchases_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
