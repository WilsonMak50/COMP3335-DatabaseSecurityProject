-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Nov 20, 2022 at 05:16 PM
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
-- Database: `comp3335`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(155) NOT NULL,
  `salt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `salt`) VALUES
(1, 'kenny', 'kenny@admin.com', '88d658ed9cdc1a4cfa8d0971d0b5738f11caa0958d50c43ee4b6f1566cfc7aee', 1234),
(2, 'harry', 'harry@admin.com', 'bff94628140f6c3216709c13ccdb2f07df2644e515b4d3dfc311e642c7d49930', 2345),
(3, 'wilson', 'wilson@admin.com', '22011393', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(155) NOT NULL,
  `salt` int NOT NULL,
  `ctime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `ctime`) VALUES
(1, 'apple', 'apple@example.com', 'a3bca80e619c78ce04a8225fed8f6942be5020c66e69856393d824d7529b5e56', 1221, ''),
(2, 'banana', 'banana@example.com', '4e5bc7a29d29da8742ab754ed8fbce3fda77c0cf29f63243493f881985f79171', 1532, ''),
(3, 'car', 'car@example.com', '0e63f4bb4b0ae5781b72e5f499a44ac6985d5b3c6125948894c92a44bada39c6', 4325, ''),
(4, 'dog', 'dog@example.com', '4c54d6b49809a2c00c3a0582dfc72af32f31565210f55f42700c57bfcfe9bc94', 2232, ''),
(5, 'edge', 'edge@example.com', 'fefa51fda7da09ac4fa4b910b201533e1b1de36d6dc72d8a4ce8d376b64a4aa7', 3232, ''),
(6, 'Jason8964', '8964@8964', '1601f9c148c5ecb1617428a797d48a9755a80286ab0137c33efbe304710e4cef', 1397, 'Sun Nov 20 23:14:04 HKT 2022'),
(7, 'test', 'test@gmail.com', '9abf5fff6f37e930d2f3f999622bbceda57ce5a1027fd99cd95023cc9453b681', 9610, 'Sun Nov 20 23:14:36 HKT 2022'),
(18, 'apple10', 'apple10@gmail.com', '3baf14f62a832fb0272f0aff0e0134bee04692a5802698e4bb4278d60d32bf0a', 486, 'Sun Nov 20 23:34:23 HKT 2022'),
(19, 'apple11', 'apple11@gmail.com', 'b0f33dc910ad9f82c0124acbaf58ab9f5171c8ba88fde09642fbdc76728754cb', 4590, 'Sun Nov 20 23:38:46 HKT 2022'),
(20, 'test1', 'test@test.com', '2b9859f59561228e78e05927134bae24f01c102d2f6f0f62b4ca926be335c6db', 5752, 'Sun Nov 20 23:41:26 HKT 2022'),
(21, 'apple12', 'apple12@gmail.com', '15ab8fd9278b877ba3312b2cc3205fb2718f1d621b93dd886d799dd2093470fc', 9795, 'Sun Nov 20 23:50:20 HKT 2022'),
(22, 'test2', 't2@2', '0c191ba5d96cc31c760ccdd86e5316f59be86de61251b518480b08ee269ee75c', 608, 'Mon Nov 21 1:05:53 HKT 2022');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO user_logs VALUES(null, NEW.id, 'Inserted', Now() + INTERVAL 8 HOUR)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `action`, `cdate`) VALUES
(1, 19, 'Inserted', '2022-11-20 21:38:46'),
(2, 20, 'Inserted', '2022-11-20 23:41:26'),
(3, 21, 'Inserted', '2022-11-20 23:50:20'),
(4, 22, 'Inserted', '2022-11-21 01:05:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
