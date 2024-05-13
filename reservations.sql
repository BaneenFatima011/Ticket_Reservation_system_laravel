-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 07:48 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `passenger_id` varchar(10) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `passenger_id`, `seat_id`, `status`, `transport_id`, `route_id`, `created_at`, `updated_at`) VALUES
(95, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:34:01', '2024-05-11 09:34:01'),
(96, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:35:18', '2024-05-11 09:35:18'),
(97, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:35:42', '2024-05-11 09:35:42'),
(98, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:35:59', '2024-05-11 09:35:59'),
(99, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:36:41', '2024-05-11 09:36:41'),
(100, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:36:53', '2024-05-11 09:36:53'),
(101, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:37:06', '2024-05-11 09:37:06'),
(102, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:38:30', '2024-05-11 09:38:30'),
(103, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:40:07', '2024-05-11 09:40:07'),
(104, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:40:33', '2024-05-11 09:40:33'),
(105, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:41:11', '2024-05-11 09:41:11'),
(106, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:41:31', '2024-05-11 09:41:31'),
(107, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:41:53', '2024-05-11 09:41:53'),
(108, '12346', 1386, 'Done', 14, 8, '2024-05-11 09:42:29', '2024-05-12 12:13:42'),
(109, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:44:07', '2024-05-11 09:44:07'),
(110, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:44:17', '2024-05-11 09:44:17'),
(111, '12346', 1386, 'Due', 14, 8, '2024-05-11 09:44:39', '2024-05-11 09:44:39'),
(112, '12346', 1051, 'Due', 14, 8, '2024-05-11 14:26:21', '2024-05-11 14:26:21'),
(113, '12346', 1045, 'Due', 14, 8, '2024-05-11 14:29:16', '2024-05-11 14:29:16'),
(114, '12346', 1052, 'Done', 14, 8, '2024-05-11 14:48:52', '2024-05-11 14:50:58'),
(115, '12346', 1048, 'Due', 14, 8, '2024-05-11 14:51:48', '2024-05-11 14:51:48'),
(116, '12346', 1391, 'Due', 17, 9, '2024-05-12 12:15:42', '2024-05-12 12:15:42'),
(117, '12346', 1044, 'Due', 14, 8, '2024-05-12 22:27:08', '2024-05-12 22:27:08'),
(118, '12346', 1377, 'Due', 14, 8, '2024-05-13 00:26:57', '2024-05-13 00:26:57'),
(119, '12346', 1394, 'Due', 17, 9, '2024-05-13 00:27:22', '2024-05-13 00:27:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `passenger_id` (`passenger_id`),
  ADD KEY `seat_id` (`seat_id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `route_id` (`route_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`passenger_id`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`),
  ADD CONSTRAINT `reservations_ibfk_4` FOREIGN KEY (`transport_id`) REFERENCES `transports` (`bus_id`),
  ADD CONSTRAINT `reservations_ibfk_5` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
