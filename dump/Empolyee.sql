-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Nov 20, 2022 at 05:17 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Empolyee`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `empolyee_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `department` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post` varchar(255) NOT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`empolyee_id`, `name`, `department`, `post`, `salary`) VALUES
(8, 'kobe', 'buyer', 'manager', 9000),
(9, 'anson', 'buyer', '', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `empolyee_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `department` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post` varchar(255) NOT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cs`
--

INSERT INTO `cs` (`empolyee_id`, `name`, `department`, `post`, `salary`) VALUES
(1, 'amy', 'customer service', '', 10000),
(2, 'Tom', 'customer service', '', 10000),
(3, 'David', 'customer service', 'manager', 18000),
(4, 'Jason', 'customer service', '', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `empolyee_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `department` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post` varchar(255) NOT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`empolyee_id`, `name`, `department`, `post`, `salary`) VALUES
(5, 'Peter', 'delivery', '', 13000),
(6, 'KT', 'delivery', '', 13000),
(7, 'ian', 'delivery', 'manager', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `empolyee`
--

CREATE TABLE `empolyee` (
  `empolyee_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post` varchar(255) NOT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='empolyee table';

--
-- Dumping data for table `empolyee`
--

INSERT INTO `empolyee` (`empolyee_id`, `name`, `department`, `post`, `salary`) VALUES
(1, 'amy', 'customer service', '', 10000),
(2, 'Tom', 'customer service', '', 10000),
(3, 'David', 'customer service', 'manager', 18000),
(4, 'Jason', 'customer service', '', 10000),
(5, 'Peter', 'delivery', '', 13000),
(6, 'KT', 'delivery', '', 13000),
(7, 'ian', 'delivery', 'manager', 22000),
(8, 'kobe', 'buyer', 'manager', 9000),
(9, 'anson', 'buyer', '', 7000),
(10, 'Jamie', 'HR', '', 10000),
(11, 'Cathey', 'HR', 'manager', 13000),
(12, 'Ingrid', '', 'database admin', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `empolyee_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `department` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post` varchar(255) NOT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`empolyee_id`, `name`, `department`, `post`, `salary`) VALUES
(10, 'Jamie', 'HR', '', 10000),
(11, 'Cathey', 'HR', 'manager', 13000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empolyee`
--
ALTER TABLE `empolyee`
  ADD PRIMARY KEY (`empolyee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empolyee`
--
ALTER TABLE `empolyee`
  MODIFY `empolyee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
