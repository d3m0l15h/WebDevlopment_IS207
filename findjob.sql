-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 05:04 PM
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
  `adminid` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `role`, `userid`, `employerid`, `adminid`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$PcgDo3BzVmxFT3N9UYeTd.SIXN/uBVG255KDbQXqFvOYVt.CXCfti', 'user', 1, NULL, NULL),
(2, 'emp', 'employer@gmail.com', '$2y$10$WRm0yPFVtnWR.8bpVBlYxOrCCtZK4kY5mPGKfOYoVG7OInn9s/TiG', 'employer', NULL, 1, NULL),
(3, 'admin', 'duydao@gbst.com', '$2y$10$OWR0Q/HgrLDBRyJaUtWT3.PnX6K2ScAWlW2EgZRa.3fFSnAo1AgnG', 'admin', NULL, NULL, 1),
(5, 'duyd', 'user2@gmail.com', '$2y$10$l/B3XT0niwFJs/GcVF9M6OyCdGo5ITbObGBHathtfY5fF9aPIGOue', 'user', 2, NULL, NULL),
(6, 'nab', 'nab@gmail.com', '$2y$10$2UyKVxh4bme6etxMDxg5ru2YgUztlFFPWYShzM5cxRPIBHtc9oajK', 'employer', NULL, 2, NULL),
(7, 'tyme', 'a.a@a.a', '$2y$10$mAI38u0U3GZUcpo6HdS4SOj3nxFQXbZWZNoELiZqbRP6aIiYl6ykK', 'employer', NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `status`) VALUES
(1, '1');

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
(1, 1, '2023-12-19 10:47:12', '', 'fdsgsdgd', '2'),
(1, 2, '2023-12-16 15:20:10', 'assets/img/resume/20231216152010Duy.webp', 'ứng tuyển', '1'),
(3, 1, '2023-12-20 10:17:27', 'assets/img/resume/20231220081229Dat.jpg', '1234', '2'),
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
  `ownproject` text DEFAULT NULL,
  `prize` text DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `introduce` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '3',
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `name`, `location`, `workingtime`, `quality`, `ownproject`, `prize`, `phone`, `introduce`, `logo`, `status`, `email`) VALUES
(1, 'FPT', 'Ho Chi Minh', 'Full-time', '50', 'Duy', '1', '099455256', 'Fpt software', 'assets/img/avatar/20231212025557FPT.webp', '1', 'employer@gmail.com'),
(2, 'NAB Innovation Centre Vietnam', 'Ho Chi Minh', NULL, NULL, NULL, NULL, '9099999555', 'The NAB Innovation Centre Vietnam is owned by NAB - Australia’s largest business bank.', 'assets/img/avatar/20231212163842NAB Innovation Centre Vietnam.webp', '1', NULL),
(3, 'tyme', 'HCM', NULL, NULL, NULL, NULL, '0901 880 200', NULL, NULL, '3', 'a.a@a.a');

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
  `worktime` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `salary`, `salarymin`, `salarymax`, `reasons`, `descriptions`, `requirements`, `location`, `worktype`, `eid`, `createon`, `strength`, `status`, `worktime`, `level`) VALUES
(1, 'Tech Lead /Senior Fullstack Developer (.NET or NodeJS)', '0', 3000.00, 5000.00, '<p><strong>BENEFITS&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Salary in probation: 100%</li>\r\n	<li>13th-month salary</li>\r\n	<li>Review salary once per years</li>\r\n	<li>Insurances such as Vietnamese labor law and premium health care</li>\r\n	<li>Meal and parking allowances are covered by the company</li>\r\n	<li>Exciting company outings/events and team-building activities</li>\r\n	<li>Open, friendly, professional working environment, values-driven, and agile culture.</li>\r\n	<li>Attractive career path, we focus on your development.</li>\r\n	<li>Sponsorship for training courses, and professional certificates</li>\r\n	<li>Work-life balance 40-hr per week from Mon to Fri.</li>\r\n</ul>\r\n\r\n<p><strong>WORKING HOUR</strong>: Monday &ndash; Friday, flexible time</p>\r\n\r\n<p><strong>INTERVIEW PROCESS:</strong>&nbsp;2 Rounds&nbsp;</p>', '<p>We are looking for talented and experienced full-stack .NET or Nodejs and &nbsp;Angular or ReactJS engineers (from Senior to Lead levels) to join our team. The engineers are responsible for designing, developing, and maintaining web applications using full-stack (.NET or Nodejs) technologies. The ideal candidate will have a strong understanding of frontend and backend technologies and the ability to work independently and as part of a team.</p>\r\n\r\n<p><strong>RESPONSIBILITIES</strong></p>\r\n\r\n<ul>\r\n	<li>Communicate directly to the clients on the requirement clarification and analysis.</li>\r\n	<li>Understand requirements and estimate assigned tasks&nbsp;</li>\r\n	<li>Define technical solutions &amp; project structure, create sample code structure, provide technical direction/support/train, and coach development team&nbsp;</li>\r\n	<li>Ensure that the software meets the functional and non-functional requirements</li>\r\n	<li>Apply the best practices and standards for coding, testing, debugging, and documentation&nbsp;</li>\r\n	<li>Review and evaluate the code quality and performance of the software&nbsp;</li>\r\n	<li>Design, develop, and maintain high-quality web applications using full stack .NET or Nodejs (Angular or ReactJS).</li>\r\n	<li>Work with other engineers to build and deploy scalable and reliable applications.</li>\r\n	<li>Troubleshoot, debug and fix complex issues.</li>\r\n	<li>Stay up to date on the latest technologies and trends.</li>\r\n	<li>Follow coding standards and working processes to ensure the quality and delivery timeline of the project.&nbsp;</li>\r\n</ul>', '<ul>\r\n	<li><strong>4+ years of experience in web application development&nbsp;</strong></li>\r\n	<li><strong>At least 1 year</strong>&nbsp;of experience&nbsp;<strong>as a leader</strong></li>\r\n	<li>Strong hands-on experience with .NET or NodeJS.</li>\r\n	<li>Strong understanding of software engineering principles and practices</li>\r\n	<li>Ability to write clean, maintainable, and scalable codes.</li>\r\n	<li>Familiarity with various database systems, such as MS SQL, MySQL, PostgreSQL, or other relational databases.</li>\r\n	<li>Knowledge and experience of various software architecture styles and patterns, such as layered, Microservices, SOA, DDD, and S.O.L.I.D principles,&hellip; is a plus</li>\r\n	<li>Experience with GIT</li>\r\n	<li>Experience with UI development frameworks like Angular, ReactJS, and VueJS is a BIG plus</li>\r\n	<li>Experience with one of the popular cloud computing services like AWS/Azure/GCP</li>\r\n	<li>Experience with Agile/Scrum development methodologies</li>\r\n	<li>Good analytical, problem-solving, and troubleshooting skills</li>\r\n	<li>Ability to work independently and as part of a team</li>\r\n	<li>Strong communication and interpersonal skills</li>\r\n	<li>Can communication, collaboration, and leadership skills</li>\r\n</ul>', 'HCM', 'company', 1, '2023-12-08 23:58:08', '<ul>\r\n	<li>Premium Healthcare</li>\r\n	<li>Attractive career path</li>\r\n	<li>Review salary once per years</li>\r\n</ul>', '1', 'Full-time', 'senior'),
(2, 'UI/UX Designer (Mid/Senior)', '1000', 2000.00, 3000.00, '<ul>\r\n	<li>A young and dynamic team where you can develop your career path and improve your English skills</li>\r\n	<li>An exciting project which uses cutting-edge technology</li>\r\n	<li>14 days annual leave per year</li>\r\n	<li>13th-month salary</li>\r\n	<li>Private insurance for employees. After 1 year, company will cover the insurance for family members (spouse, children)</li>\r\n	<li>Providing Laptop to work</li>\r\n	<li>Company trip&nbsp;</li>\r\n	<li>Annual health check&nbsp;</li>\r\n	<li>Monthly teambuilding activities</li>\r\n</ul>', '<p>Fullerton Healthcare Group is looking to expand its technical capabilities to enhance our service offerings and improve internal processes. There is ample opportunity to grow and learn with the deeply motivated team at Fullerton Healthcare Group.&nbsp;</p>\r\n\r\n<p>We are looking for candidates with deep expertise in User Experience and User Interface design work for both web and mobile applications. UI/UX Designers responsibilities include gathering user requirements, designing graphic elements and building navigation components. To be successful in this role, you should have experience with design software and wireframe tools.&nbsp;We believe that you also have a portfolio of professional design projects that includes work with mobile applications that is ready to be discussed on the interview.&nbsp;</p>\r\n\r\n<p><strong>Responsibilities&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Gather and evaluate user requirements in collaboration with product managers,&nbsp;s and engineers</li>\r\n	<li>Develop wireframes, prototypes, and interactive mockups to illustrate how the app function and look like.</li>\r\n	<li>Design system-wise components (interface elements, like menus, tabs&hellip;)</li>\r\n	<li>Prepare and present rough drafts to internal teams and key stakeholders</li>\r\n	<li>Plan and conduct cross-functional (BA, PM, Engineering&hellip;) product strategy and implement to facilitate UX creation and ensure design output</li>\r\n	<li>Ensure consistent and intuitive user experiences across multiple devices and platforms.</li>\r\n	<li>Identify and troubleshoot UX problems and conduct adjustments based on user feedback</li>\r\n	<li>Create original graphic designs (e.g images, sketches and tables)</li>\r\n	<li>Design videos to introduce upcoming mobile products</li>\r\n	<li>Collaborate with developers to ensure accurate implementation of design specifications.</li>\r\n	<li>Stay updated with the latest design trends, tools, and technologies to continuously improve design processes.</li>\r\n</ul>', '<ul>\r\n	<li>Bachelor&rsquo;s degree in Design, Human-Computer Interaction, or a related field (or equivalent practical experience).</li>\r\n	<li>At least 2 years of experiences in UX/UI Design preferably in the Healthcare industry</li>\r\n	<li>Proven work experience as a Designer with a strong portfolio showcasing your design expertise.&nbsp;</li>\r\n	<li>Demonstrated ability to create visually appealing and intuitive user interfaces for web and mobile applications.</li>\r\n	<li>Knowledge of Figma (Adobe Suite is a plus)&nbsp;</li>\r\n	<li>Basic knowledge of video</li>\r\n	<li>Team spirit and strong communication skills to collaborate with various stakeholders</li>\r\n	<li>Good multi-tasking and time-management skills</li>\r\n	<li>Good English written and oral proficiency</li>\r\n</ul>', 'HCM', 'remote', 1, '2023-12-08 23:58:08', '<ul>\r\n	<li>Exciting projects and young team</li>\r\n	<li>Global company and dynamic environment</li>\r\n	<li>Competitive Salary and great benefits</li>\r\n</ul>', '1', 'Full-time', 'senior'),
(3, 'Mobile Developer', '1000', 5000.00, 8000.00, '<p>reason</p>', '<p>descriptions</p>', '<p>requirements</p>', 'DN', 'hybrid', 1, '2023-12-08 23:58:08', '<p>strength</p>', '1', 'Part-time', 'manager'),
(4, 'Senior BA Fintech', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time', 'senior'),
(5, 'Fresher', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time', 'fresher'),
(6, 'Fresher 2', '1000', 200.00, 300.00, 'reason', 'descriptions', 'requirements', 'Ho Chi Minh', 'company', 1, '2023-12-08 23:58:08', '', '1', 'Full-time', 'fresher'),
(7, 'Senior/Lead Business Analyst', '1000', 3000.00, 4500.00, '<p><strong>1. Generous compensation and benefit package</strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Attractive salary and benefits &nbsp;</li>\r\n	<li>20-day annual leave and 7-day sick leave, etc. &nbsp;</li>\r\n	<li>13th month salary and Annual Performance Bonus &nbsp;</li>\r\n	<li>Premium healthcare for yourself and family members &nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>2. Exciting career and development opportunities </strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Large scale products with modern technologies in banking domain &nbsp;</li>\r\n	<li>Clear roadmap for career advancement in both technical and leadership pathways &nbsp;</li>\r\n	<li>Sponsored certificates in both IT and banking/finance &nbsp;</li>\r\n	<li>Premium accounts on Udemy/A Cloud Guru/Coursera/LinkedIn, etc. &nbsp;</li>\r\n	<li>English learning with native teachers &nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>3. Professional and engaging working environment</strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Hybrid working model and excellent work-life balance   &nbsp;</li>\r\n	<li>Well-equipped &amp; modern Agile office with fully-stocked pantry  &nbsp;</li>\r\n	<li>Annual company trip and events   &nbsp;</li>\r\n</ul>', '<p><em><strong>By applying for the above position, you accept and agree that your personal data and any information stated in the attached curriculum vitae (CV) will be used and processed by ITViec and NICV for recruitment purposes. The storage and processing of such information will comply with the applicable laws of Vietnam, and the policies and procedures of ITViec and NICV regarding personal data, as amended from time to time.</strong></em></p>\r\n\r\n<p><strong>ABOUT THE JOB</strong></p>\r\n\r\n<p>As a Senior/Lead Business Analyst, you will assist with the decomposition of work, writing Business Outcomes, Epics, Features, and User Stories so that the squad clearly articulates value, acceptance criteria, and estimates to get their work done. They support decision making with clear, insightful analysis, which allows the Product Owner to make decisions on ideation viability, sequencing, and shaping business context.</p>\r\n\r\n<p><strong>YOUR JOB RESPONSIBILITIES</strong></p>\r\n\r\n<p><strong>1. User Story Definition:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Works with the Product Owner to understand, elicit, analyse, document and communicate business requirements and articulate product vision with a strong focus on value delivery&nbsp;</li>\r\n	<li>Assists the Product Owner to define and own the value definition of Stories, including facilitating and influencing the prioritisation of the backlog&nbsp;</li>\r\n	<li>Expert in translating end user / customer insights into Stories complete with Acceptance Criteria, which can easily be understood by the Development Team&nbsp;</li>\r\n	<li>Provides discipline, rigor and technical skills to the requirements definition and validation process</li>\r\n</ul>\r\n\r\n<p><strong>2. Planning &amp; Engagement:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Partners with key stakeholders and Product Owners to articulate product vision; documents problem/opportunity and broader context; defines desired future states using outcomes as measures of success with a strong focus on value delivery&nbsp;</li>\r\n	<li>Collaborates with key stakeholders across business and technology to complete the required artefacts and capture necessary inputs&nbsp;</li>\r\n	<li>Works with the team to produce high fidelity estimates by providing crystal clear requirements definitions&nbsp;</li>\r\n	<li>Typically works ahead of the Team to elicit requirements for the next Sprint&#39;s Stories&nbsp;</li>\r\n	<li>Shared accountability with other Team Members to help refine the Backlog and estimate the Initiatives, Features and Stories at the planning meetings&nbsp;</li>\r\n	<li>Proactive around risks, issues, blockers and raises them as soon as possible&nbsp;</li>\r\n	<li>Constantly looks for opportunities to improve the overall process&nbsp;</li>\r\n	<li>Available to the team to answer questions relating to product requirements, and works with the team to breakdown Stories and translate business requirements into terms that Developers will understand&nbsp;</li>\r\n	<li>Participates in the demos during the Sprint review&nbsp;</li>\r\n	<li>Provide guidance to Analysts, including training and mentoring on tools and techniques</li>\r\n	<li>Work with business users to elicit and define user requirements using the most appropriate method(s), and translate them into functional requirements, and contribute to the management expectations &nbsp;</li>\r\n	<li>Encourages team members to speak up and share open and honest perspectives &nbsp;</li>\r\n	<li>Communicates clear, consistent to the team that creates shared purpose, and aligns plans and actions to the organisation&rsquo;s strategic ambition.&nbsp;</li>\r\n	<li>Actively nurtures existing talent and proactively brings in new/diverse talent and capabilities to their team to deliver on the strategic ambition and future needs of the business unit &nbsp;</li>\r\n	<li>Solves problems collaboratively by working to overcome barriers and break down silos that get in the way of outcomes.&nbsp;</li>\r\n	<li>Be responsible for team engagement &amp; relations&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>3. Other Essential Accountabilities</strong></p>\r\n\r\n<ul>\r\n	<li>Decomposition of work - Drafting Business Outcomes, Epics and Features and User Stories to articulate value; lead activities which establishes a product backlog</li>\r\n	<li>Epic sequence optionality, including articulating, senior stakeholder communication, and recommendations for tradeoffs involved in technical decisions</li>\r\n	<li>Data collation, deep analysis and data interpretation/communication for informed decision making across complex environments</li>\r\n	<li>Ownership of as is/to be process maps, interaction models, customer journey maps and environments aligned to enterprise process architecture, applied within complex environments</li>\r\n	<li>Logically structuring problems, taking into consideration the business context and deep analysis to articulate the Epics in Progressive Elaboration documentation</li>\r\n</ul>', '<p><strong>Must have</strong></p>\r\n\r\n<ol>\r\n	<li>Having&nbsp;<strong>5+ years&rsquo; work experience</strong>&nbsp;as a&nbsp;<strong>Business Analyst</strong>&nbsp;(in any industry)&nbsp;</li>\r\n	<li>Strong project experience across multiple business units and complex environments and&nbsp;<strong>methodologies (e.g.</strong>&nbsp;<strong>Agile, Waterfall</strong>)&nbsp;</li>\r\n	<li>Advanced skills in using suitable tools for business modelling, drawing business and technical flows/diagrams, creating mock-ups /wireframes/prototypes, etc.</li>\r\n	<li>Good skill in Elicitation and Requirement analysis &amp; documentation with a high-level focus on details&nbsp;</li>\r\n	<li>Working knowledge of technical concepts (e.g. user interfaces, API, databases, system integration) and dealing with technical stakeholders&nbsp;</li>\r\n	<li>Experience in the UI/UX or understanding of user-centric mindset</li>\r\n	<li><strong>Excellent English communication skills (both verbal &amp; written)&nbsp;</strong>and strong Presentation capabilities</li>\r\n	<li>Hands-on&nbsp;<strong>experience in influencing and collaborating</strong>&nbsp;with internal stakeholders such as Product Owners, Solution Designers and Architects</li>\r\n	<li>Strong problem solving and troubleshooting skills, with detail-oriented mindset&nbsp;</li>\r\n	<li>Experience about&nbsp;<strong>PowerBI, PowerQuery, PowerScripting on Excel other Data tools</strong></li>\r\n	<li>Preferable about&nbsp;<strong>data analyst experience</strong>, or working experience with project related to l<strong>arge scale</strong>,&nbsp;<strong>large data</strong></li>\r\n</ol>\r\n\r\n<p><strong>Nice-to-have</strong></p>\r\n\r\n<ol>\r\n	<li>Have basic knowledge of cloud-based technologies (Amazon Web Services is preferred)&nbsp;</li>\r\n	<li>Experience or knowledge of BABOK&reg; Knowledge Areas&nbsp;</li>\r\n	<li>Bachelor&rsquo;s Degree, preferably in IT, Business, Computer Science, or related area&nbsp;</li>\r\n	<li>Experience in the Banking or Financial Services industry&nbsp;</li>\r\n	<li>Any additional certification or training in BA, PO, UX or related area (e.g. PSPO, CSPO, CBAP)</li>\r\n	<li>Knowledge of<strong>&nbsp;Infra, Network, Security, Sharepoints</strong></li>\r\n</ol>', 'HCM', 'company', 2, '2023-12-12 23:41:47', '<ul>\r\n	<li>Very competitive remuneration package</li>\r\n	<li>Build products for millions of users in Australia</li>\r\n	<li>Hybrid and flexible working environment</li>\r\n</ul>', '1', 'Full-time', 'senior');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `introduce` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `skill` text DEFAULT NULL,
  `ownproject` text DEFAULT NULL,
  `certificate` text DEFAULT NULL,
  `prize` text DEFAULT NULL,
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
(2, 'Duy', 'Senior Full-stack Developer\r\n12 years of developing software', 'Master', '12', 'Full stack', '11', 'AWS', NULL, '1', 'HCM', 'assets/img/avatar/20231217145250Duy.jpg', '0945869855', 'user2@gmail.com');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
