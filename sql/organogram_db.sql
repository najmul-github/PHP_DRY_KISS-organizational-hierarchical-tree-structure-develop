-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 09:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organogram_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Department A'),
(2, 'Department B'),
(3, 'Department C');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'CEO A', 'ceo@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(2, 'CEO B', 'ceo@company2.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(3, 'CEO C', 'ceo@company3.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(4, 'COO X', 'coo@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(5, 'COO Y', 'coo@company2.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(6, 'COO Z', 'coo@company3.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(7, 'General Manager 1', 'gm1@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(8, 'General Manager 2', 'gm2@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(9, 'General Manager 3', 'gm3@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(10, 'Manager 1', 'manager1@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(11, 'Manager 2', 'manager2@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(12, 'Manager 3', 'manager3@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(13, 'Supervisor 1', 'supervisor1@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(14, 'Supervisor 2', 'supervisor2@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(15, 'Supervisor 3', 'supervisor3@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(16, 'Staff 1', 'staff1@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(17, 'Staff 2', 'staff2@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11'),
(18, 'Staff 3', 'staff3@company.com', '$2y$10$u1w2PF/bCm7ODhJR5NXg0OjtvCdq.ireyvIa2/PKX8W67Rh0eYFri', '2023-10-31 21:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `employee_department_roles`
--

CREATE TABLE `employee_department_roles` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_department_roles`
--

INSERT INTO `employee_department_roles` (`id`, `employee_id`, `department_id`, `role_id`, `manager_id`, `created_at`) VALUES
(1, 1, 1, 1, NULL, '2023-10-31 21:33:11'),
(2, 2, 2, 2, NULL, '2023-10-31 21:33:11'),
(3, 3, 3, 1, NULL, '2023-10-31 21:33:11'),
(4, 4, 1, 2, 1, '2023-10-31 21:33:11'),
(5, 5, 2, 2, 2, '2023-10-31 21:33:11'),
(6, 6, 3, 2, 3, '2023-10-31 21:33:11'),
(7, 7, 1, 3, 1, '2023-10-31 21:33:11'),
(8, 8, 2, 3, 2, '2023-10-31 21:33:11'),
(9, 9, 3, 3, 3, '2023-10-31 21:33:11'),
(10, 10, 1, 4, 7, '2023-10-31 21:33:11'),
(11, 11, 2, 4, 8, '2023-10-31 21:33:11'),
(12, 12, 3, 4, 9, '2023-10-31 21:33:11'),
(13, 13, 1, 5, 10, '2023-10-31 21:33:11'),
(14, 14, 2, 5, 11, '2023-10-31 21:33:11'),
(15, 15, 3, 5, 12, '2023-10-31 21:33:11'),
(16, 16, 1, 6, 13, '2023-10-31 21:33:11'),
(17, 17, 2, 6, 14, '2023-10-31 21:33:11'),
(18, 18, 3, 6, 15, '2023-10-31 21:33:11'),
(19, 1, 2, 1, NULL, '2023-10-31 22:22:12'),
(20, 15, 2, 5, 11, '2023-10-31 21:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'CEO'),
(2, 'COO'),
(3, 'General Manager'),
(4, 'Manager'),
(5, 'Supervisor'),
(6, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_department_roles`
--
ALTER TABLE `employee_department_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee_department_roles`
--
ALTER TABLE `employee_department_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_department_roles`
--
ALTER TABLE `employee_department_roles`
  ADD CONSTRAINT `employee_department_roles_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `employee_department_roles_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `employee_department_roles_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `employee_department_roles_ibfk_4` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
