-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2017 at 09:53 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `fname` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `lname` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `title1` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `title2` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `title3` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `title4` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `intro` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_about`, `fname`, `lname`, `title`, `title1`, `title2`, `title3`, `title4`, `intro`) VALUES
(1, 'Jan', 'Kulisek', 'Software Developer', 'Consultant', 'Web Developer', 'Freelancer', 'Web Designer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id_messages` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `subj` varchar(128) COLLATE utf8_bin NOT NULL,
  `web` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(256) COLLATE utf8_bin NOT NULL,
  `msg` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_messages`, `name`, `subj`, `web`, `email`, `msg`) VALUES
(1, 'Joan Mad', 'sbrsdf', 'none', '1@1.com', 'message message message message'),
(2, 'Joan Mad', 'sbrsdf', 'none', '1@1.com', 'message message message message');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id_sessions` int(11) NOT NULL,
  `id` varchar(128) COLLATE utf8_bin NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  `user` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `logged` tinyint(4) NOT NULL DEFAULT '0',
  `date` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id_sessions`, `id`, `ip_address`, `timestamp`, `data`, `user`, `logged`, `date`) VALUES
(26, '7hg0uuplmmr9ve4pepk29ctqnues6314', '::1', 1510727066, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303732373034393b6c6f676765647c623a313b646174657c693a313531303732373036363b, NULL, 0, 1510727066),
(27, '9f00kik1qpvihqus1vdo69ap5e2kg2ce', '::1', 1510727126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303732373130393b6c6f676765647c623a313b646174657c693a313531303732373132363b, NULL, 0, 1510727126),
(28, 's6lbgjtf5or7q8o37ruf0cflt0qajvno', '::1', 1510727136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303732373133363b, NULL, 0, NULL),
(29, '1vtir3qi5f08hub7cpd1rhgre1hs0cmf', '::1', 1510728523, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303732383239323b6c6f676765647c623a313b646174657c693a313531303732383239373b, NULL, 0, 1510728297),
(30, '5v35eb53gu5h5t7k2a1bjkgojobskj28', '::1', 1510728833, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303732383832383b6c6f676765647c623a313b646174657c693a313531303732383239373b, NULL, 0, NULL),
(31, '2f8p70d1o8k2vescath1nure6tqgp1v1', '::1', 1510729482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303732393230373b6c6f676765647c623a313b646174657c693a313531303732383239373b, NULL, 0, NULL),
(32, 'qnm1cl0jg2m35sds1rcemtqhltdq4lkb', '::1', 1510729758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303732393439333b6c6f676765647c623a313b646174657c693a313531303732393530313b, NULL, 0, 1510729501),
(33, 'ofoj0nvc9esh78ru14t3q00tg7tf4m40', '::1', 1510729924, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303732393831363b6c6f676765647c623a313b646174657c693a313531303732393530313b, NULL, 0, NULL),
(34, '07gbi934gdvcfopqi5glsbcpids84fcd', '::1', 1510730183, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303733303138333b6c6f676765647c623a313b646174657c693a313531303732393530313b, NULL, 0, NULL),
(35, 'bmoeime5vu9hi5rmcairpto2hbqtsgi2', '::1', 1510731155, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303733313134313b, NULL, 0, 1510732051),
(36, 'tgut35362silgoef3khiul5f50hptl2h', '::1', 1510732051, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303733323035303b6c6f676765647c623a313b646174657c693a313531303733323035313b, NULL, 0, NULL),
(37, 'jk166fe0taq8jnq5b084plfokk0i3h6t', '::1', 1510732072, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303733323037323b, NULL, 0, 1510766579),
(38, 'ar988a3rke4nghuktpjvgj7h7derclm6', '::1', 1510766579, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303736363537393b6c6f676765647c623a313b646174657c693a313531303736363537393b, NULL, 0, NULL),
(39, 'tt6ga6qtmp8mbvij19at9gguvepr4lc2', '::1', 1510766807, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303736363830373b, NULL, 0, NULL),
(40, '1uohc08n54am6hm5fubam0j1upn9v78f', '::1', 1510770933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303737303731373b, NULL, 0, NULL),
(41, 'm8orns6vl37gbs5ap7vcclv7c36pgv7m', '::1', 1510772344, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303737323334343b, NULL, 0, NULL),
(42, 'sse18nbe84c3hcln7olfprmuaohleb9e', '::1', 1510812519, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831323531313b, NULL, 0, NULL),
(43, '955panf01cp3o8ocnbk31v8k94gkl17r', '::1', 1511038124, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313033373839323b6c6f676765647c623a313b646174657c693a313531313033383132343b, NULL, 1, 1511038124),
(44, '7f50suoag8n5s8u311t18k41t7er5fgu', '::1', 1511038354, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313033383236323b6c6f676765647c623a313b646174657c693a313531313033383132343b, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `fname` varchar(64) COLLATE utf8_bin NOT NULL,
  `lname` varchar(64) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `fname`, `lname`, `email`, `phone`) VALUES
(3, 'master_jk', '$2y$12$8sTFfN5Gh6JKgsgDnNdm5e9h5mi9yZszJOyaQ5Ok0McyzYBqBMHZ2', '', '', 'jan@kulisek.org', '000-111-2222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_messages`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id_sessions`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_messages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id_sessions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
