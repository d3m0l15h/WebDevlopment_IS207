-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 02:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'user',
  `userid` int(10) UNSIGNED DEFAULT NULL,
  `employerid` int(10) UNSIGNED DEFAULT NULL,
  `adminid` int(10) UNSIGNED DEFAULT NULL,
  `status`  varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `status`  varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `workingtime` varchar(255) DEFAULT NULL,
  `quality` varchar(255) NOT NULL,
  `ownproject` varchar(255) DEFAULT NULL,
  `prize` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `introduce` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status`  varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `salarymin` decimal(18,2) DEFAULT NULL,
  `salarymax` decimal(18,2) DEFAULT NULL,
  `reasons` text NOT NULL,
  `descriptions` text NOT NULL,
  `requirements` text NOT NULL,
  `location` varchar(80) NOT NULL,
  `worktype` varchar(255) NOT NULL,
  `eid` int(10) UNSIGNED NOT NULL,
  `elogo` varchar(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `createon` datetime NOT NULL DEFAULT current_timestamp(),
  `strength` text NOT NULL,
  `status`  varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `introduce` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `ownproject` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `prize` varchar(255) DEFAULT NULL,
  `status`  varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_accounts_users` (`userid`),
  ADD KEY `FK_accounts_admins` (`adminid`),
  ADD KEY `FK_accounts_employers` (`employerid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Table structure for table `apply`
--

CREATE TABLE `applies` (
  `jid`     int(10) UNSIGNED NOT NULL,
  `uid`     int(10) UNSIGNED NOT NULL,
  `time`    timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cv`      varchar(256) DEFAULT NULL,
  `letter`  varchar(256) DEFAULT NULL,
  `status`  varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `applies`
  ADD PRIMARY KEY (`jid`, `uid` ),
  ADD KEY `FK_applies_jobs` (`jid`),
  ADD KEY `FK_applies_users` (`uid`);


-- ALTER TABLE `applies`
--   ADD PRIMARY KEY (`uid`,`jid`),
--   ADD KEY `FK_applies_jobs` (`jid`),
--   ADD KEY `FK_applies_user` (`uid`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_jobs_employers` (`eid`);

--
-- Indexes for table `user`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `FK_accounts_admins` FOREIGN KEY (`adminid`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_accounts_employers` FOREIGN KEY (`employerid`) REFERENCES `employers` (`id`),
  ADD CONSTRAINT `FK_accounts_users` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK_jobs_employers` FOREIGN KEY (`eid`) REFERENCES `employers` (`id`);

ALTER TABLE `applies`
  ADD CONSTRAINT `FK_applies_jobs` FOREIGN KEY (`jid`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `FK_applies_user` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Dumping data for table `user`
--
INSERT INTO `users` (`id`, `name`, `introduce`, `education`, `experience`, `skill`, `ownproject`, `certificate`, `prize`, `status`) VALUES
(1, 'Dat', 'introduce', 'education', 'experience', 'skill', 'ownproject', 'certificate', 'prize', '1');

--
-- Dumping data for table `employer`
--

INSERT INTO `employers` (`id`, `name`, `location`, `workingtime`, `quality`, `ownproject`, `prize`, `email`, `phone`, `introduce`, `logo`, `status`) VALUES
(1, 'FPT', 'Ho Chi Minh', 'Full-time', '50', 'Duy', '1', 'a@a.a', '099455256', 'Fpt software', '1', '1');

--
-- Dumping data for table `account`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `role`, `userid`, `employerid`, `adminid`, `status`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$ELdxtgw4BD/KYvo1zYIRbONWKAIof5kAu1Y7Wb0zNjF/rFDWNVN0y', 'user', 1, NULL, NULL, '1'),
(2, 'emp', 'employer@gmail.com', '$2y$10$WRm0yPFVtnWR.8bpVBlYxOrCCtZK4kY5mPGKfOYoVG7OInn9s/TiG', 'employer', NULL, 1, NULL, '1'),
(3, 'admin', 'duydao@gbst.com', '$2y$10$OWR0Q/HgrLDBRyJaUtWT3.PnX6K2ScAWlW2EgZRa.3fFSnAo1AgnG', 'employer', NULL, 1, NULL, '1');


--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `salary`, `salarymin`, `salarymax`, `reasons`, `descriptions`, `requirements`, `location`, `worktype`, `eid`, `createon`, `strength`, `status`) VALUES
(1, 'Java Backend Developer (MySQL, Spring)', '1000', 1000.00, 2000.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1'),
(2, 'Full stack Developer', '1000', 2000.00, 3000.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1'),
(3, 'Mobile Developer', '1000', 5000.00, 8000.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1'),
(4, 'Senior BA Fintech', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1'),
(5, 'Fresher', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1'),
(6, 'Fresher 2', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1');


COMMIT;