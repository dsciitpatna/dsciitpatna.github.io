-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 10:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsc-leaderboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(40) NOT NULL,
  `timestamp` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `token`, `timestamp`) VALUES
(1, 'starnyc312@gmail.com', 'dc724af18fbdd4e59189f5fe768a5f8311527050', 'd425829caaef0447a0817d07c2960331f024eb20', 1559994944);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(900) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `description`, `date`) VALUES
(15, 'Announcement 1', 'lorem ipsum dolar slit amet lorem ipsum dolar slit amet lorem ipsum dolar slit amet', '2019-06-12 01:25:17'),
(16, 'Announcement 2', 'lorem ipsum dolar slit amet lorem ipsum dolar slit amet lorem ipsum dolar slit amet', '2019-06-12 01:26:57'),
(17, 'Announcement 3', 'lorem ipsum dolar slit amet lorem ipsum dolar slit amet lorem ipsum dolar slit amet', '2019-06-12 01:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `buddingprojects`
--

CREATE TABLE `buddingprojects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(900) NOT NULL,
  `img_src` varchar(900) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buddingprojects`
--

INSERT INTO `buddingprojects` (`id`, `title`, `description`, `img_src`, `created_date`, `filter`) VALUES
(5, 'Budding app', 'ewfuegfewy', '', '2019-06-11 23:49:47', 'app');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `name`, `rollno`, `points`, `dateCreated`) VALUES
(1, 'asdf', '1801zz01', 50, '2019-05-15 11:32:45'),
(2, 'feut 3fred', '1801zz02', 200, '2019-05-15 11:33:19'),
(4, 'aman', '1801zz34', 520, '2019-05-15 11:42:49'),
(6, 'Ashwani', '1801EE13', 500, '2019-05-15 12:17:02'),
(7, 'Ashwani Cash', '1801ZZ69', 0, '2019-06-08 11:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `projectideas`
--

CREATE TABLE `projectideas` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `organization_url` varchar(900) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `tags` varchar(9999) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectideas`
--

INSERT INTO `projectideas` (`id`, `date`, `name`, `organization`, `organization_url`, `title`, `description`, `tags`, `email`) VALUES
(1, '2019-06-11 21:22:25', 'Ashwani Yadav', 'IIT Patna', 'https://www.iitp.ac.in/gymkhana/', 'Udne wali car', 'Wanna fly with me', 'WEb, ReactJS', 'abc@gmail.com'),
(8, '2019-06-11 23:02:10', 'John Doe', 'IIT B', 'https://www.cdewcfewfc.com', 'EHR', 'sfegfre erbtenb', 'efwrg, efwgv, fegefw', 'xyz@gmail.com'),
(10, '2019-06-11 23:15:43', 'Ash Yadav', 'IIT P', 'https://www.cdewcfewfc.com', 'safewvewbr reb', 'wegfwrb gwrgbwr', '', 'zxcv@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(900) NOT NULL,
  `github_link` varchar(900) NOT NULL,
  `img_src` varchar(900) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filter` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `github_link`, `img_src`, `created_date`, `filter`, `status`) VALUES
(1, 'Web 1', 'dewfew ewfwrgr egh4thb yj5yj h564j', 'https://github.com/dsciitpatna/', '', '2019-06-08 23:24:58', 'web', '1'),
(2, 'App 1', 'lorem ipsum dolar slit amet lorem ipsum dolar slit amet', 'https://github.com/dsciitpatna/', '', '2019-06-09 00:48:16', 'app', '0'),
(4, 'Blockchain & Cryptocurrency 1', 'lorem ipsum dolar slit amet lorem ipsum dolar slit amet', 'https://github.com/dsciitpatna/', '', '2019-06-09 00:50:36', 'block', '0'),
(5, 'IOT 1', 'lorem ipsum dolar slit amet lorem ipsum dolar slit amet', 'https://github.com/dsciitpatna/', '', '2019-06-09 00:51:45', 'iot', '0'),
(6, 'Cloud 1', 'lorem ipsum dolar slit amet lorem ipsum dolar slit amet', 'https://github.com/dsciitpatna/', '', '2019-06-09 00:51:58', 'cloud', '0'),
(9, 'App 2', 'dewfe tbtbtrb tbr', 'https://github.com/dsciitpatna/', '', '2019-06-09 01:42:00', 'app', '1');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` varchar(500) NOT NULL,
  `long_desc` varchar(900) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `title`, `short_desc`, `long_desc`, `date`) VALUES
(2, 'title 2', 'short desc 2', 'long desc 2', '2019-05-02'),
(6, 'title 3', 'sdewghtyju wreht ', 'efrtrh hthpiwrguwhgu wrhguq', '2019-05-14'),
(7, 'holi kab hai', 'kab hai holi', 'lorem ipsum lorem ipsumlorem ipsumlorem ipsum', '2019-05-01'),
(9, 'title 4', 'wde ewfw ef ', 'dqwwiyefgy3 f4gefy8gy7fg479yr927f f4ifg497gf974', '2019-06-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buddingprojects`
--
ALTER TABLE `buddingprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectideas`
--
ALTER TABLE `projectideas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `buddingprojects`
--
ALTER TABLE `buddingprojects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projectideas`
--
ALTER TABLE `projectideas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
