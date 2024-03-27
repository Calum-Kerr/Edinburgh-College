-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 04:41 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_ecar_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_campus`
--

CREATE TABLE `college_campus` (
  `campus_id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `college_campus`
--

INSERT INTO `college_campus` (`campus_id`, `name`) VALUES
(1, 'Sigthill'),
(2, 'Granton'),
(3, 'Milton Road'),
(4, 'Midlothian');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `vehicle_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(85) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `reservation_type_id` tinyint(2) UNSIGNED NOT NULL DEFAULT 1,
  `reservation_status_id` tinyint(2) UNSIGNED NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reference_number`, `origin`, `destination`, `start_date`, `start_time`, `end_date`, `end_time`, `vehicle_id`, `user_id`, `title`, `description`, `reservation_type_id`, `reservation_status_id`, `date_created`, `last_modified`) VALUES
(23, 'zkWnSBse7V', 'Sigthill', 'Granton', '2022-12-12', '12:12:00', '2022-12-21', '12:12:00', 1, 1, 'My Booking zkWnSBse7V', 'Car', 1, 1, '2022-05-24 14:29:31', '2022-05-24 14:29:31'),
(26, 'snKRW9LmSV', 'Sigthill', 'Granton', '2022-01-01', '12:00:00', '2022-02-01', '12:00:00', 5, 1, 'My Booking snKRW9LmSV', '', 1, 1, '2022-05-24 15:15:39', '2022-05-24 15:15:39'),
(36, 'Tn4stvIS69', 'Sigthill', 'Granton', '2022-04-12', '12:12:00', '2022-04-15', '12:21:00', 1, 1, 'My Booking Tn4stvIS69', 'Example car.', 1, 3, '2022-06-12 15:56:35', '2022-06-12 15:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_status`
--

CREATE TABLE `reservation_status` (
  `reservation_status_id` tinyint(2) UNSIGNED NOT NULL,
  `label` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_status`
--

INSERT INTO `reservation_status` (`reservation_status_id`, `label`) VALUES
(1, 'Active'),
(2, 'Pending'),
(3, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_type`
--

CREATE TABLE `reservation_type` (
  `reservation_type_id` tinyint(2) UNSIGNED NOT NULL,
  `label` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_type`
--

INSERT INTO `reservation_type` (`reservation_type_id`, `label`) VALUES
(1, 'Reservation'),
(2, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(85) DEFAULT NULL,
  `first_name` varchar(85) NOT NULL,
  `last_name` varchar(85) NOT NULL,
  `email` varchar(85) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `staff_number` varchar(20) DEFAULT NULL,
  `staff_position` varchar(20) DEFAULT NULL,
  `campus_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `driving_licence_number` varchar(20) DEFAULT NULL,
  `dvla_check_code` varchar(20) DEFAULT NULL,
  `password` varchar(85) NOT NULL,
  `salt` varchar(85) NOT NULL,
  `role_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `user_status_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `email`, `contact_number`, `staff_number`, `staff_position`, `campus_id`, `driving_licence_number`, `dvla_check_code`, `password`, `salt`, `role_id`, `user_status_id`, `date_created`, `last_modified`, `last_login`) VALUES
(1, 'GM', 'George', 'Mason', 'admin@admin.com', '1212112', '1212112', 'Lecturer', 1, 'MASONcanDRIVE', 'jqPS5N0H', '1234', '', 1, 1, '2021-05-25 15:32:44', '2021-05-25 15:39:12', '2021-06-07 20:57:02'),
(2, 'CK', 'Calum', 'Kerr', 'calumxkerr@gmail.com', '07716410136', '1234', 'Admin', 1, 'CALUM12345CK1234', 'hgf231jhgf', 'test', '', 1, 1, '2022-05-17 15:47:39', '2022-06-09 14:40:58', NULL),
(3, 'Userlow', 'User', 'low', 'userlow@user.com', '071234567890', NULL, NULL, 1, 'User12345low', 'user354345', 'lowblow', '', 3, 1, '2022-06-12 17:34:32', NULL, NULL),
(4, 'Third User', 'Third', 'User', 'thirdusesr@thirduser.com', '071234567891', NULL, NULL, 3, 'THIRD123456USER', 'THIRDUSER1234', 'thirduser', '', 3, 1, '2022-06-13 15:35:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `role_level` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `name`, `role_level`) VALUES
(1, 'Group Admin', 1),
(2, 'Application Admin', 2),
(3, 'Application User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `user_status_id` tinyint(2) UNSIGNED NOT NULL,
  `label` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user_status_id`, `label`) VALUES
(1, 'Active'),
(2, 'Pending'),
(3, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` smallint(5) UNSIGNED NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `notes` text NOT NULL,
  `isactive` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `requires_approval` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `image_name` varchar(50) NOT NULL,
  `campus_id` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `registration_number`, `make`, `model`, `colour`, `description`, `notes`, `isactive`, `requires_approval`, `image_name`, `campus_id`) VALUES
(1, 'SM12 PVW', 'Nissan', 'Leaf', 'White', 'Vehicle to be used by Edinburgh College teaching/non-teaching staff.', 'No scratches or dents.', 1, 0, 'nissan-leaf.png', 1),
(2, 'SM13 PVW', 'Nissan', 'Leaf', 'White', 'Vehicle to be used by Edinburgh College teaching/non-teaching staff.', 'No scratches or dents.', 1, 0, 'nissan-leaf.png', 2),
(3, 'SM14 PVW', 'BMW', 'i3', 'White', 'Vehicle to be used by Edinburgh College teaching/non-teaching staff.', 'No scratches or dents.', 1, 0, 'bmw-i3.png', 3),
(4, 'SM15 PVW', 'BMW', 'i3', 'White', 'Vehicle to be used by Edinburgh College teaching/non-teaching staff.', 'No scratches or dents.', 1, 0, 'bmw-i3.png', 4),
(5, 'SM16 PVW', 'Porche', '911 GT3 RS', 'Light-grey', 'Vehicle to be used by Edinburgh College teaching/non-teaching staff.', 'No scratches or dents.', 1, 0, 'Porsche-911-GT3-RS.png', 1),
(6, 'SM17 PVW', 'Audi', 'e-Tron', 'grey', 'Vehicle to be used by Edinburgh College teaching/non-teaching staff.', 'No scratches or dents.', 1, 0, 'audi-e-tron.png', 4),
(7, 'SM18 PVW', 'Porche', '911 GT3 RS', 'Light-grey', 'Vehicle to be used by Edinburgh College teaching/non-teaching staff.', 'No scratches or dents.', 1, 0, 'Porsche-911-GT3-RS.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_campus`
--
ALTER TABLE `college_campus`
  ADD PRIMARY KEY (`campus_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reservation_type_id` (`reservation_type_id`),
  ADD KEY `reservation_status_id` (`reservation_status_id`);

--
-- Indexes for table `reservation_status`
--
ALTER TABLE `reservation_status`
  ADD PRIMARY KEY (`reservation_status_id`);

--
-- Indexes for table `reservation_type`
--
ALTER TABLE `reservation_type`
  ADD PRIMARY KEY (`reservation_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `campus_id` (`campus_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_status_id` (`user_status_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`user_status_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `campus_id` (`campus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college_campus`
--
ALTER TABLE `college_campus`
  MODIFY `campus_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `reservation_status`
--
ALTER TABLE `reservation_status`
  MODIFY `reservation_status_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation_type`
--
ALTER TABLE `reservation_type`
  MODIFY `reservation_type_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_status_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`reservation_type_id`) REFERENCES `reservation_type` (`reservation_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`reservation_status_id`) REFERENCES `reservation_status` (`reservation_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `college_campus` (`campus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`user_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `college_campus` (`campus_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
