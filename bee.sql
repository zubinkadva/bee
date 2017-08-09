-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2017 at 12:49 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31-2+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bee`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `gate` tinyint(1) NOT NULL DEFAULT '0',
  `combination` text,
  `pallets` int(11) DEFAULT NULL,
  `owned_by` text,
  `flowers` text,
  `fencing` text,
  `payments` text,
  `notes` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `lat`, `lng`, `gate`, `combination`, `pallets`, `owned_by`, `flowers`, `fencing`, `payments`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Fellsmere', '27.767346', '-80.565870', 1, '1928', 1, 'David Webb', 'Brazilian peppers, palmetto, gallberry', 'Yes', NULL, NULL, '2017-07-18 00:09:07', '2017-07-20 23:24:40'),
(2, 'Fellsmere', '27.761740', '-80.565354', 0, NULL, 34, 'David Webb', 'Brazilian peppers, palmetto, gallberry', 'Yes', NULL, 'Maximum 200 hives = 50 pallets', '2017-07-18 00:11:41', '2017-07-18 00:11:41'),
(3, 'Fellsmere', '27.748843', '-80.559385', 1, NULL, 25, 'David Webb', 'Brazilian peppers, palmetto, gallberry', 'Yes', NULL, NULL, '2017-07-18 00:13:11', '2017-07-20 18:47:31'),
(4, '97th Street', '27.771995', '-80.626685', 1, '1231', 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 00:19:24', '2017-07-18 00:19:24'),
(5, '97th Street', '27.771336', '-80.627659', 0, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, 'Maximum 100 hives = 25 pallets', '2017-07-18 00:21:26', '2017-07-18 00:21:26'),
(6, '97th Street', '27.770635', '-80.626990', 0, NULL, 15, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 00:27:55', '2017-07-18 00:27:55'),
(7, '97th Street', '27.771269', '-80.625746', 0, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 00:29:22', '2017-07-18 00:29:22'),
(8, '97th Street', '27.772300', '-80.632137', 0, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 00:31:30', '2017-07-18 00:31:30'),
(9, '97th Street', '27.775562', '-80.632656', 0, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 00:42:26', '2017-07-18 00:42:26'),
(26, '97th Street', '27.775029', '-80.640870', 1, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, 'Probable location for 100 hives = 25 pallets', '2017-07-18 22:19:35', '2017-07-18 22:19:35'),
(27, '97th Street', '27.776032', '-80.634024', 1, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:20:34', '2017-07-18 22:20:34'),
(28, '97th Street', '27.776431', '-80.634058', 1, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:21:08', '2017-07-18 22:21:08'),
(29, '101th Street', '27.778336', '-80.634064', 1, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:21:42', '2017-07-18 22:21:42'),
(30, '101th Street', '27.779458', '-80.635242', 1, NULL, 25, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:23:44', '2017-07-18 22:23:44'),
(31, '101th Street', '27.779935', '-80.641203', 1, NULL, 26, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:24:32', '2017-07-18 22:24:32'),
(32, '101th Street', '27.781287', '-80.641178', 1, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:25:23', '2017-07-18 22:25:23'),
(33, '101th Street', '27.785958', '-80.641033', 1, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:26:06', '2017-07-18 22:26:06'),
(34, '101th Street', '27.785930', '-80.637940', 1, NULL, 32, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, 'Maximum of 100 hives = 25 pallets', '2017-07-18 22:27:14', '2017-07-18 22:27:14'),
(35, '101th Street', '27.779488', '-80.632986', 1, NULL, 0, 'The Platt family', 'Orange, Brazilian peppers, cabbage palm, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:28:08', '2017-07-18 22:28:08'),
(36, 'Canal Road', '27.819112', '-80.605079', 1, NULL, 0, 'The Platt family', NULL, 'Yes', NULL, NULL, '2017-07-18 22:38:32', '2017-07-18 22:38:32'),
(37, 'Canal Road', '27.818857', '-80.605003', 1, NULL, 1, 'The Platt family', NULL, 'Yes', 'Paid $500', 'Maximum 100 hives = 25 pallets', '2017-07-18 22:39:43', '2017-07-18 22:39:43'),
(38, 'Canal Road', '27.818921', '-80.592550', 1, '1231', 25, 'The Platt family', NULL, 'Yes', NULL, NULL, '2017-07-18 22:41:34', '2017-07-18 22:41:34'),
(39, '54 Canal Road', '27.819252', '-80.622509', 1, NULL, 0, 'Barbara Cruz', 'Cabbage palm, Brazilian peppers, orange, palmetto', 'Yes', '$1000/yr.', 'Maximum 200 hives = 50 pallets', '2017-07-18 22:43:59', '2017-07-18 22:43:59'),
(40, '54 Canal Road', '27.817083', '-80.622972', 1, NULL, 0, 'Barbara Cruz', 'Cabbage palm, Brazilian peppers, orange, palmetto', 'Yes', '$1000/yr.', NULL, '2017-07-18 22:47:19', '2017-07-18 22:47:19'),
(41, 'Centerlane Road', '27.845154', '-80.623251', 1, '0511', 0, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:56:27', '2017-07-18 22:56:27'),
(42, 'Centerlane Road', '27.845307', '-80.627544', 1, NULL, 25, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:58:07', '2017-07-18 22:58:07'),
(43, 'Centerlane Road', '27.845427', '-80.632158', 1, NULL, 0, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, NULL, '2017-07-18 22:59:45', '2017-07-18 22:59:45'),
(44, 'Centerlane Road', '27.845307', '-80.640000', 1, '0511', 0, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, NULL, '2017-07-18 23:01:30', '2017-07-18 23:01:30'),
(45, 'Centerlane Road', '27.845307', '-80.6488', 1, NULL, 25, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, NULL, '2017-07-18 23:02:45', '2017-07-18 23:02:45'),
(46, 'Centerlane Road', '27.845312', '-80.665368', 1, '2130', 0, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, NULL, '2017-07-18 23:05:05', '2017-07-18 23:05:05'),
(47, 'Centerlane Road', '27.851642', '-80.665161', 1, NULL, 0, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, NULL, '2017-07-18 23:08:28', '2017-07-18 23:08:28'),
(48, 'Centerlane Road', '27.865000', '-80.665100', 1, NULL, 2, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, 'Should be 100 hives = 25 pallets', '2017-07-18 23:16:18', '2017-07-18 23:16:18'),
(49, 'Cenerlane Road', '27.865784', '-80.665189', 1, NULL, 12, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, NULL, '2017-07-18 23:19:06', '2017-07-18 23:19:06'),
(50, 'Centerlane Road', '27.856960', '-80.665295', 1, NULL, 25, 'David Webb (one half)', 'Brazilian peppers, palmetto', 'Yes', NULL, '$500 from David Webb', '2017-07-18 23:20:35', '2017-07-18 23:20:35'),
(51, 'Tm Goodwin Road', '27.833139', '-80.665543', 1, NULL, 12, 'Alex Klein', NULL, 'Yes', NULL, 'Should be 100 hives = 25 pallets', '2017-07-18 23:24:53', '2017-07-18 23:24:53'),
(52, 'Tm Goodwin Road', '27.827553', '-80.673762', 1, NULL, 25, 'Alex Klein', NULL, 'Yes', NULL, NULL, '2017-07-18 23:25:33', '2017-07-18 23:25:33'),
(53, 'Tm Goodwin Road', '27.841298', '-80.672025', 1, NULL, 25, 'Alex Klein', NULL, 'Yes', NULL, NULL, '2017-07-18 23:26:37', '2017-07-18 23:26:37'),
(54, 'Willowbrook Street', '27.891916', '-80.632126', 1, NULL, 25, NULL, 'Brazilian peppers, cabbage palm', 'Yes', NULL, NULL, '2017-07-18 23:29:39', '2017-07-18 23:29:39'),
(55, 'Willowbrook Street', '27.890821', '-80.632006', 1, NULL, 25, NULL, 'Brazilian peppers, cabbage palm', 'Yes', NULL, NULL, '2017-07-18 23:32:01', '2017-07-18 23:32:01'),
(56, 'Oakenshaw (The Vossey)', '27.927022', '-80.597670', 1, NULL, 25, NULL, NULL, 'Yes', NULL, NULL, '2017-07-18 23:33:42', '2017-07-18 23:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `ip` text NOT NULL,
  `module` text NOT NULL,
  `triggers` text NOT NULL,
  `action` text NOT NULL,
  `log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `username`, `ip`, `module`, `triggers`, `action`, `log`) VALUES
(1, 'zkadva2016', '127.0.0.1', 'Login', 'Reset password', 'Zubin Kadva raised a password reset request', '2017-06-29 16:30:00'),
(2, 'zkadva2016', '127.0.0.1', 'Login', 'Reset password', 'Zubin Kadva changed his/her password', '2017-06-29 16:31:34'),
(3, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-29 19:05:59'),
(4, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 19:08:15'),
(5, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 19:09:24'),
(6, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 19:11:06'),
(7, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-29 20:20:35'),
(8, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 20:35:00'),
(9, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 21:06:30'),
(10, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 21:15:05'),
(11, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 21:30:07'),
(12, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 22:41:15'),
(13, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 22:50:15'),
(14, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-29 23:11:01'),
(15, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 14:26:17'),
(16, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-30 15:23:35'),
(17, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 15:25:00'),
(18, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-30 15:25:28'),
(19, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 15:26:57'),
(20, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-30 15:27:01'),
(21, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 15:27:15'),
(22, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-30 15:27:21'),
(23, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 15:27:44'),
(24, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 18:06:55'),
(25, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 18:15:46'),
(26, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 19:31:15'),
(27, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 19:40:07'),
(28, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:20:33'),
(29, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:20:39'),
(30, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:20:55'),
(31, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:24:08'),
(32, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:24:58'),
(33, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:25:51'),
(34, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:25:56'),
(35, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:27:09'),
(36, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-30 20:30:12'),
(37, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 20:30:14'),
(38, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 20:30:40'),
(39, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 20:31:06'),
(40, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:32:48'),
(41, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:34:06'),
(42, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-30 20:34:15'),
(43, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 20:34:30'),
(44, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:34:46'),
(45, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:35:15'),
(46, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:35:25'),
(47, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:36:07'),
(48, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:36:21'),
(49, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-06-30 20:36:47'),
(50, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 20:40:59'),
(51, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:44:49'),
(52, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:50:12'),
(53, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:52:43'),
(54, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:52:51'),
(55, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:55:27'),
(56, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:55:39'),
(57, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 20:59:16'),
(58, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 22:21:33'),
(59, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-06-30 22:26:54'),
(60, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 22:49:27'),
(61, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 22:49:35'),
(62, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 22:54:32'),
(63, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-06-30 23:03:00'),
(64, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-05 15:52:27'),
(65, 'zkadva2016', '127.0.0.1', 'Master', 'Users', 'zkadva2016 deleted user "zkadva2016"', '2017-07-05 23:46:24'),
(66, 'zkadva2016', '127.0.0.1', 'Master', 'Users', 'zkadva2016 deleted user "zkadva2017"', '2017-07-05 23:46:39'),
(67, 'zkadva2016', '127.0.0.1', 'Master', 'Users', 'zkadva2016 could not delete user "zkadva2016"', '2017-07-05 23:46:51'),
(68, 'zkadva2016', '127.0.0.1', 'Master', 'Users', 'zkadva2016 changed user "zkadva2016" status', '2017-07-05 23:49:13'),
(69, 'zkadva2016', '127.0.0.1', 'Master', 'User add', 'zkadva2016 added user ZKADVA2013', '2017-07-06 00:53:11'),
(70, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-06 15:20:30'),
(71, 'zkadva2016', '127.0.0.1', 'Master', 'User delete', 'zkadva2016 could not delete user "zkadva2017"', '2017-07-06 15:30:21'),
(72, 'zkadva2016', '127.0.0.1', 'Master', 'User delete', 'zkadva2016 could not delete user "zkadva2017"', '2017-07-06 15:30:45'),
(73, 'zkadva2016', '127.0.0.1', 'Master', 'User edit', 'zkadva2016 edited user zkadva2017', '2017-07-06 15:31:11'),
(74, 'zkadva2016', '127.0.0.1', 'Master', 'User edit', 'zkadva2016 edited user zkadva2017', '2017-07-06 15:31:44'),
(75, 'zkadva2016', '127.0.0.1', 'Master', 'User add', 'zkadva2016 added user ;lk', '2017-07-06 15:32:30'),
(76, 'zkadva2016', '127.0.0.1', 'Profile', 'Update', 'zkadva2016 updated his/her profile', '2017-07-06 15:35:22'),
(77, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-06 15:38:58'),
(78, 'zkadva2016', '127.0.0.1', 'Master', 'User add', 'zkadva2016 added user ff', '2017-07-06 16:03:30'),
(79, 'zkadva2016', '127.0.0.1', 'Master', 'User add', 'zkadva2016 added user saa', '2017-07-06 16:08:05'),
(80, 'saa', '127.0.0.1', 'User', 'Activate account', '45 56 activated his/her account', '2017-07-06 16:17:39'),
(81, 'saa', '127.0.0.1', 'User', 'Activate account', '45 56 activated his/her account', '2017-07-06 16:18:03'),
(82, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-07-06 16:18:26'),
(83, 'saa', '127.0.0.1', 'Login', 'Logged in', '45 56 logged in', '2017-07-06 16:18:33'),
(84, 'saa', '127.0.0.1', 'Master', 'User toggle', 'saa changed user "zkadva2016" status', '2017-07-06 16:19:38'),
(85, 'saa', '127.0.0.1', 'Logout', 'Logged out', '45 56 logged out', '2017-07-06 16:19:42'),
(86, 'saa', '127.0.0.1', 'Login', 'Logged in', '45 56 logged in', '2017-07-06 16:20:11'),
(87, 'saa', '127.0.0.1', 'Master', 'User toggle', 'saa changed user "zkadva2016" status', '2017-07-06 16:20:19'),
(88, 'saa', '127.0.0.1', 'Master', 'User delete', 'saa deleted users zkadva2017, ZKADVA2013', '2017-07-06 17:14:52'),
(89, 'saa', '127.0.0.1', 'Master', 'User delete', 'saa deleted users ZKADVA2013, ;lk, ff, ff, saa', '2017-07-06 17:15:21'),
(90, 'saa', '127.0.0.1', 'Master', 'User delete', 'saa deleted users ;lk, ff, ff, saa', '2017-07-06 17:21:06'),
(91, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-06 17:21:09'),
(92, 'zkadva2016', '127.0.0.1', 'Master', 'User add', 'zkadva2016 added user sg', '2017-07-06 17:21:39'),
(93, 'zkadva2016', '127.0.0.1', 'Master', 'User add', 'zkadva2016 added user sdgs', '2017-07-06 17:21:46'),
(94, 'zkadva2016', '127.0.0.1', 'Master', 'User delete', 'zkadva2016 deleted users sg, sdgs', '2017-07-06 17:33:08'),
(95, 'zkadva2016', '127.0.0.1', 'Logout', 'Logged out', 'Zubin Kadva logged out', '2017-07-06 18:24:53'),
(96, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-06 18:25:07'),
(97, 'zkadva2016', '163.118.78.65', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-06 22:02:10'),
(98, 'zkadva2016', '163.118.78.65', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-06 22:11:48'),
(99, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-11 16:28:19'),
(100, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-11 18:51:32'),
(101, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-13 16:59:05'),
(102, 'zkadva2016', '127.0.0.1', 'Login', 'Logged in', 'Zubin Kadva logged in', '2017-07-19 22:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first` text NOT NULL,
  `last` text NOT NULL,
  `username` text NOT NULL,
  `password` text,
  `email` text NOT NULL,
  `avatar` text,
  `is_active` tinyint(1) NOT NULL,
  `remember_token` text,
  `current_session` text,
  `reset_token` text,
  `created_at` datetime NOT NULL,
  `created_by` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `username`, `password`, `email`, `avatar`, `is_active`, `remember_token`, `current_session`, `reset_token`, `created_at`, `created_by`, `updated_at`, `last_login`) VALUES
(1, 'Zubin', 'Kadva', 'zkadva2016', '$2y$10$g3LwfVPgxt3MwBrf8G2ty.mPrdh2MdcsIYLIzhJd.Rgihj4O35OTS', 'zkadva2016@my.fit.edu', 'eyJpdiI6InJGbnVZcEdFTkRrRzRtYzY1UE9nRlE9PSIsInZhbHVlIjoicG9mY1pnTEdpYVVIdFNKZ1gyTlBCWFpHY1pOQ1ZoRFZ1S21ScFAwNUlCaz0iLCJtYWMiOiI0ZTdkMTkyMDgzZWE0YjhhM2QwMDMxYzM3OWIwZTVhYjhhZmJlNzIxYTg4OGY2ZTZkMDRkMjg4YmYyY2M0OWMzIn0=', 1, '9NaCza9cnBRZQyxuXogzKHkDrSNOnOICbXmELVlWtBPEH79HuLStcJuSul6B', 'wVn9QfZaLwkMfEM15WnWGx5f5TBDy9wAcJwRDokt', '', '2017-06-27 00:00:00', 'laravel', '2017-07-06 15:35:22', '2017-07-19 22:20:18'),
(10, 'asd', 'dgsa', 'zkadva2015', NULL, 'zkadva2016@my.fit.edu', NULL, 1, NULL, NULL, '$2y$10$T4MAcSbSb58OiMFiNL7YPOjxFWO2nt5ZfdtRs.9lbHefwk2FdI12O', '2017-07-06 22:14:15', 'zkadva2016', '2017-07-06 22:14:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
