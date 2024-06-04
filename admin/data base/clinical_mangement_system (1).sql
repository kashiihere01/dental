-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 06:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinical_mangement_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `status` enum('available','booked') NOT NULL DEFAULT 'available',
  `slot` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctor_id`, `patient_id`, `status`, `slot`, `date`, `created_at`) VALUES
(1, 1, 2, 'booked', '1', '2024-06-07', '2024-06-03 06:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `speciality` varchar(200) NOT NULL,
  `doctor_image` varchar(123) NOT NULL,
  `start_time` varchar(200) NOT NULL,
  `end_time` varchar(211) NOT NULL,
  `checkup_average_time` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_name`, `speciality`, `doctor_image`, `start_time`, `end_time`, `checkup_average_time`, `created_at`, `description`) VALUES
(1, 'Dr. John Doe', 'Implant Surgeon', '1717412738team-1.jpg', '8:00 AM', '10:00 AM', '30min', '2024-06-03 11:05:38', 'bxzfcbzc'),
(2, 'Dr. Kevin', ' Orthodontists', '1717412783team-3.jpg', '10:00 AM', '12:00 PM', '30min', '2024-06-03 11:06:23', 'vbcvbc'),
(3, 'Dr. Shelly R. Gruen', ' Oral Pathologist', '1717412824team-4.jpg', '12:00 PM', '2:00 PM', '30min', '2024-06-03 11:07:04', 'fkjdmfd'),
(4, 'Dr. Faisal Ali', 'Endodontist', '1717412943team-5.jpg', '2:00 PM', '4:00 PM', '30min', '2024-06-03 11:09:03', 'xc,jck'),
(5, 'Adeel Shakir', 'Pediatric Dentist', '1717413083testimonial-1.jpg', '4:00 PM', '6:00 PM', '30min', '2024-06-03 11:11:23', 'cvgfg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `city`, `password`, `created_at`) VALUES
(1, 'kashi', 'kashi@gmail.com', 'lodhran', '123', '2024-06-03 04:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `patient_messages`
--

CREATE TABLE `patient_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` enum('read','unread','','') NOT NULL DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_messages`
--

INSERT INTO `patient_messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'hyjf', 'km67667@gmail.com', 'xcvgfdgfg', 'gzgzgdgzggg', 'unread', '2024-05-30 04:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `name`, `price`, `image`, `created_at`) VALUES
(1, 'Teeth whitening', '73', '1717411886price-1.jpg', '2024-06-03 10:51:26'),
(2, 'Dental implant', '40', '1717411910price-2.jpg', '2024-06-03 10:51:50'),
(3, 'dental canal', '30', '1717411960price-3.jpg', '2024-06-03 10:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `image`, `created_at`) VALUES
(2, 'Teeth Whitening', '1717411670service-4.jpg', '2024-06-03 10:47:50'),
(3, 'Cosmetic Dentistry', '1717411695service-1.jpg', '2024-06-03 10:48:15'),
(4, 'Dental Implants', '1717411740service-2.jpg', '2024-06-03 10:49:00'),
(5, 'Dental Bridges', '1717411762service-3.jpg', '2024-06-03 10:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `slot_start_time` varchar(200) NOT NULL,
  `slot_end_time` varchar(200) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slot_start_time`, `slot_end_time`, `doctor_id`) VALUES
(1, '10:00 AM', '8:15 AM', 1),
(2, '9:15 AM', '8:30 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_mobile` varchar(200) NOT NULL,
  `user_city` varchar(200) NOT NULL,
  `user_image` varchar(211) NOT NULL,
  `user_about` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `role` enum('admin','employee','doctor','') NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_mobile`, `user_city`, `user_image`, `user_about`, `password`, `description`, `created_at`, `status`, `role`) VALUES
(1, 'kashi', 'kashi@gmail.com', '', '', '', '', '123', '', '2024-05-29 16:51:30', 'active', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_messages`
--
ALTER TABLE `patient_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_messages`
--
ALTER TABLE `patient_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
