-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 09:41 AM
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
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `role`, `userid`, `employerid`, `adminid`, `status`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$ELdxtgw4BD/KYvo1zYIRbONWKAIof5kAu1Y7Wb0zNjF/rFDWNVN0y', 'user', 1, NULL, NULL, '1'),
(2, 'emp', 'employer@gmail.com', '$2y$10$WRm0yPFVtnWR.8bpVBlYxOrCCtZK4kY5mPGKfOYoVG7OInn9s/TiG', 'employer', NULL, 1, NULL, '1'),
(3, 'admin', 'duydao@gbst.com', '$2y$10$OWR0Q/HgrLDBRyJaUtWT3.PnX6K2ScAWlW2EgZRa.3fFSnAo1AgnG', 'employer', NULL, 1, NULL, '1'),
(5, 'duyd', 'user2@gmail.com', '$2y$10$l/B3XT0niwFJs/GcVF9M6OyCdGo5ITbObGBHathtfY5fF9aPIGOue', 'user', 2, NULL, NULL, '1'),
(6, 'nab', 'nab@gmail.com', '$2y$10$2UyKVxh4bme6etxMDxg5ru2YgUztlFFPWYShzM5cxRPIBHtc9oajK', 'employer', NULL, 2, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `status`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `applies`
--

CREATE TABLE `applies` (
  `jid` int(10) UNSIGNED NOT NULL,
  `uid` int(10) UNSIGNED NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cv` varchar(256) DEFAULT NULL,
  `letter` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applies`
--

INSERT INTO `applies` (`jid`, `uid`, `time`, `cv`, `letter`, `status`) VALUES
(1, 1, '2023-12-12 00:38:08', '', 'fdsgsdgd', '3'),
(7, 2, '2023-12-13 01:12:10', 'assets/img/resume/20231212175009Duy.png', 'Xin hãy tuyển tôi', '3');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `workingtime` varchar(255) DEFAULT NULL,
  `quality` varchar(255) DEFAULT NULL,
  `ownproject` varchar(255) DEFAULT NULL,
  `prize` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `introduce` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `name`, `location`, `workingtime`, `quality`, `ownproject`, `prize`, `phone`, `introduce`, `logo`, `status`) VALUES
(1, 'FPT', 'Ho Chi Minh', 'Full-time', '50', 'Duy', '1', '099455256', 'Fpt software', 'assets/img/avatar/20231212025557FPT.webp', '1'),
(2, 'NAB Innovation Centre Vietnam', 'Ho Chi Minh', NULL, NULL, NULL, NULL, '9099999555', 'The NAB Innovation Centre Vietnam is owned by NAB - Australia’s largest business bank.', 'assets/img/avatar/20231212163842NAB Innovation Centre Vietnam.webp', '1');

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
  `createon` datetime NOT NULL DEFAULT current_timestamp(),
  `strength` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `worktime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `salary`, `salarymin`, `salarymax`, `reasons`, `descriptions`, `requirements`, `location`, `worktype`, `eid`, `createon`, `strength`, `status`, `worktime`) VALUES
(1, 'Java Backend Developer (MySQL, Spring)', '1000', 1000.00, 2000.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time'),
(2, 'Full stack Developer', '1000', 2000.00, 3000.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time'),
(3, 'Mobile Developer', '1000', 5000.00, 8000.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time'),
(4, 'Senior BA Fintech', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time'),
(5, 'Fresher', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time'),
(6, 'Fresher 2', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'Company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time'),
(7, 'Senior/Lead Business Analyst', '1000', 3000.00, 4500.00, '<p><strong>1. Generous compensation and benefit package</strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Attractive salary and benefits &nbsp;</li>\r\n	<li>20-day annual leave and 7-day sick leave, etc. &nbsp;</li>\r\n	<li>13th month salary and Annual Performance Bonus &nbsp;</li>\r\n	<li>Premium healthcare for yourself and family members &nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>2. Exciting career and development opportunities </strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Large scale products with modern technologies in banking domain &nbsp;</li>\r\n	<li>Clear roadmap for career advancement in both technical and leadership pathways &nbsp;</li>\r\n	<li>Sponsored certificates in both IT and banking/finance &nbsp;</li>\r\n	<li>Premium accounts on Udemy/A Cloud Guru/Coursera/LinkedIn, etc. &nbsp;</li>\r\n	<li>English learning with native teachers &nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>3. Professional and engaging working environment</strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Hybrid working model and excellent work-life balance   &nbsp;</li>\r\n	<li>Well-equipped &amp; modern Agile office with fully-stocked pantry  &nbsp;</li>\r\n	<li>Annual company trip and events   &nbsp;</li>\r\n</ul>', '<p><em><strong>By applying for the above position, you accept and agree that your personal data and any information stated in the attached curriculum vitae (CV) will be used and processed by ITViec and NICV for recruitment purposes. The storage and processing of such information will comply with the applicable laws of Vietnam, and the policies and procedures of ITViec and NICV regarding personal data, as amended from time to time.</strong></em></p>\r\n\r\n<p><strong>ABOUT THE JOB</strong></p>\r\n\r\n<p>As a Senior/Lead Business Analyst, you will assist with the decomposition of work, writing Business Outcomes, Epics, Features, and User Stories so that the squad clearly articulates value, acceptance criteria, and estimates to get their work done. They support decision making with clear, insightful analysis, which allows the Product Owner to make decisions on ideation viability, sequencing, and shaping business context.</p>\r\n\r\n<p><strong>YOUR JOB RESPONSIBILITIES</strong></p>\r\n\r\n<p><strong>1. User Story Definition:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Works with the Product Owner to understand, elicit, analyse, document and communicate business requirements and articulate product vision with a strong focus on value delivery&nbsp;</li>\r\n	<li>Assists the Product Owner to define and own the value definition of Stories, including facilitating and influencing the prioritisation of the backlog&nbsp;</li>\r\n	<li>Expert in translating end user / customer insights into Stories complete with Acceptance Criteria, which can easily be understood by the Development Team&nbsp;</li>\r\n	<li>Provides discipline, rigor and technical skills to the requirements definition and validation process</li>\r\n</ul>\r\n\r\n<p><strong>2. Planning &amp; Engagement:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Partners with key stakeholders and Product Owners to articulate product vision; documents problem/opportunity and broader context; defines desired future states using outcomes as measures of success with a strong focus on value delivery&nbsp;</li>\r\n	<li>Collaborates with key stakeholders across business and technology to complete the required artefacts and capture necessary inputs&nbsp;</li>\r\n	<li>Works with the team to produce high fidelity estimates by providing crystal clear requirements definitions&nbsp;</li>\r\n	<li>Typically works ahead of the Team to elicit requirements for the next Sprint&#39;s Stories&nbsp;</li>\r\n	<li>Shared accountability with other Team Members to help refine the Backlog and estimate the Initiatives, Features and Stories at the planning meetings&nbsp;</li>\r\n	<li>Proactive around risks, issues, blockers and raises them as soon as possible&nbsp;</li>\r\n	<li>Constantly looks for opportunities to improve the overall process&nbsp;</li>\r\n	<li>Available to the team to answer questions relating to product requirements, and works with the team to breakdown Stories and translate business requirements into terms that Developers will understand&nbsp;</li>\r\n	<li>Participates in the demos during the Sprint review&nbsp;</li>\r\n	<li>Provide guidance to Analysts, including training and mentoring on tools and techniques</li>\r\n	<li>Work with business users to elicit and define user requirements using the most appropriate method(s), and translate them into functional requirements, and contribute to the management expectations &nbsp;</li>\r\n	<li>Encourages team members to speak up and share open and honest perspectives &nbsp;</li>\r\n	<li>Communicates clear, consistent to the team that creates shared purpose, and aligns plans and actions to the organisation&rsquo;s strategic ambition.&nbsp;</li>\r\n	<li>Actively nurtures existing talent and proactively brings in new/diverse talent and capabilities to their team to deliver on the strategic ambition and future needs of the business unit &nbsp;</li>\r\n	<li>Solves problems collaboratively by working to overcome barriers and break down silos that get in the way of outcomes.&nbsp;</li>\r\n	<li>Be responsible for team engagement &amp; relations&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>3. Other Essential Accountabilities</strong></p>\r\n\r\n<ul>\r\n	<li>Decomposition of work - Drafting Business Outcomes, Epics and Features and User Stories to articulate value; lead activities which establishes a product backlog</li>\r\n	<li>Epic sequence optionality, including articulating, senior stakeholder communication, and recommendations for tradeoffs involved in technical decisions</li>\r\n	<li>Data collation, deep analysis and data interpretation/communication for informed decision making across complex environments</li>\r\n	<li>Ownership of as is/to be process maps, interaction models, customer journey maps and environments aligned to enterprise process architecture, applied within complex environments</li>\r\n	<li>Logically structuring problems, taking into consideration the business context and deep analysis to articulate the Epics in Progressive Elaboration documentation</li>\r\n</ul>', '<p><strong>Must have</strong></p>\r\n\r\n<ol>\r\n	<li>Having&nbsp;<strong>5+ years&rsquo; work experience</strong>&nbsp;as a&nbsp;<strong>Business Analyst</strong>&nbsp;(in any industry)&nbsp;</li>\r\n	<li>Strong project experience across multiple business units and complex environments and&nbsp;<strong>methodologies (e.g.</strong>&nbsp;<strong>Agile, Waterfall</strong>)&nbsp;</li>\r\n	<li>Advanced skills in using suitable tools for business modelling, drawing business and technical flows/diagrams, creating mock-ups /wireframes/prototypes, etc.</li>\r\n	<li>Good skill in Elicitation and Requirement analysis &amp; documentation with a high-level focus on details&nbsp;</li>\r\n	<li>Working knowledge of technical concepts (e.g. user interfaces, API, databases, system integration) and dealing with technical stakeholders&nbsp;</li>\r\n	<li>Experience in the UI/UX or understanding of user-centric mindset</li>\r\n	<li><strong>Excellent English communication skills (both verbal &amp; written)&nbsp;</strong>and strong Presentation capabilities</li>\r\n	<li>Hands-on&nbsp;<strong>experience in influencing and collaborating</strong>&nbsp;with internal stakeholders such as Product Owners, Solution Designers and Architects</li>\r\n	<li>Strong problem solving and troubleshooting skills, with detail-oriented mindset&nbsp;</li>\r\n	<li>Experience about&nbsp;<strong>PowerBI, PowerQuery, PowerScripting on Excel other Data tools</strong></li>\r\n	<li>Preferable about&nbsp;<strong>data analyst experience</strong>, or working experience with project related to l<strong>arge scale</strong>,&nbsp;<strong>large data</strong></li>\r\n</ol>\r\n\r\n<p><strong>Nice-to-have</strong></p>\r\n\r\n<ol>\r\n	<li>Have basic knowledge of cloud-based technologies (Amazon Web Services is preferred)&nbsp;</li>\r\n	<li>Experience or knowledge of BABOK&reg; Knowledge Areas&nbsp;</li>\r\n	<li>Bachelor&rsquo;s Degree, preferably in IT, Business, Computer Science, or related area&nbsp;</li>\r\n	<li>Experience in the Banking or Financial Services industry&nbsp;</li>\r\n	<li>Any additional certification or training in BA, PO, UX or related area (e.g. PSPO, CSPO, CBAP)</li>\r\n	<li>Knowledge of<strong>&nbsp;Infra, Network, Security, Sharepoints</strong></li>\r\n</ol>', 'HCM', 'Company', 2, '2023-12-12 23:41:47', '<ul>\r\n	<li>Very competitive remuneration package</li>\r\n	<li>Build products for millions of users in Australia</li>\r\n	<li>Hybrid and flexible working environment</li>\r\n</ul>', '1', 'Full-time');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
  `status` varchar(1) NOT NULL DEFAULT '1',
  `location` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `introduce`, `education`, `experience`, `skill`, `ownproject`, `certificate`, `prize`, `status`, `location`, `avatar`, `phone`, `email`) VALUES
(1, 'Dat', 'introduce', 'education', 'experience', 'skill', NULL, 'certificate', 'prize', '1', NULL, 'assets/img/avatar/20231212020531Dat.webp', '', 'user@gmail.com'),
(2, 'Duy', 'Senior Full-stack Developer\r\n12 years of developing software', 'Master', '12', 'Full stack', '11', 'AWS', NULL, '1', 'HCM', 'assets/img/avatar/20231212155759.jpg', '0945869855', 'user2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_accounts_users` (`userid`),
  ADD KEY `FK_accounts_admins` (`adminid`),
  ADD KEY `FK_accounts_employers` (`employerid`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`jid`,`uid`),
  ADD KEY `FK_applies_jobs` (`jid`),
  ADD KEY `FK_applies_users` (`uid`);

--
-- Indexes for table `employers`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `FK_accounts_admins` FOREIGN KEY (`adminid`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_accounts_employers` FOREIGN KEY (`employerid`) REFERENCES `employers` (`id`),
  ADD CONSTRAINT `FK_accounts_users` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `applies`
--
ALTER TABLE `applies`
  ADD CONSTRAINT `FK_applies_jobs` FOREIGN KEY (`jid`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `FK_applies_user` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK_jobs_employers` FOREIGN KEY (`eid`) REFERENCES `employers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;