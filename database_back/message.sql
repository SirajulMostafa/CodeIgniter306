-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2016 at 11:32 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `message`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `message_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`message_id`, `date`, `user_from`, `user_to`, `subject`, `content`, `location`, `status`) VALUES
(15, '2016-03-23 08:12:10', 7, 2, 'asdf', 'sdfsdf', 'inbox', 'unread'),
(16, '2016-03-23 08:12:29', 7, 1, 'Sample', 'Hi admins...', 'inbox', 'unread'),
(17, '2016-03-23 08:13:40', 1, 2, 'Subject 102', 'Your welcome jimzky :)', 'inbox', 'unread'),
(18, '2016-03-23 08:13:59', 1, 7, 'Sample', 'Hello user01. Howz your day today?', 'inbox', 'unread'),
(19, '2016-03-23 11:16:06', 1, 10, 'Welcome user05', 'Dear User05,\r\n\r\nThis is a sample message!\r\n\r\nTHank you,\r\nADMIN', 'inbox', 'unread'),
(20, '2016-03-23 11:18:51', 1, 7, 'Sample', 'Hello User01', 'inbox', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_sent`
--

CREATE TABLE IF NOT EXISTS `tbl_message_sent` (
  `message_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message_sent`
--

INSERT INTO `tbl_message_sent` (`message_id`, `date`, `user_from`, `user_to`, `subject`, `content`, `location`, `status`) VALUES
(8, '2016-03-22 10:01:32', 2, 1, 'sdf', 'sure sure. as in now nah?', 'inbox', 'unread'),
(9, '2016-03-22 10:09:05', 2, 1, 'dafuq', 'sample message', 'inbox', 'unread'),
(11, '2016-03-22 11:39:30', 2, 1, 'Internet Connection', 'We have a good connection :) thank you', 'inbox', 'unread'),
(13, '2016-03-22 14:22:10', 1, 2, 'Subject 101', 'This is only a sample message of the system.\r\n\r\nThank you,\r\nJIMMY B. LOMOCSO JR.', 'inbox', 'unread'),
(14, '2016-03-22 17:01:07', 2, 1, 'Subject 102', 'I received it. thank you!!!', 'inbox', 'unread'),
(15, '2016-03-23 08:12:10', 7, 2, 'asdf', 'sdfsdf', 'inbox', 'unread'),
(16, '2016-03-23 08:12:29', 7, 1, 'Sample', 'Hi admin', 'inbox', 'unread'),
(17, '2016-03-23 08:13:40', 1, 2, 'Subject 102', 'Your welcome jimzky :)', 'inbox', 'unread'),
(18, '2016-03-23 08:13:59', 1, 7, 'Sample', 'Hello user01. Howz your day today?', 'inbox', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL,
  `id_no` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `id_no`, `username`, `password`, `level`, `status`, `date_created`) VALUES
(1, '00036', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 0, '2016-03-23 06:17:30'),
(2, '0001', 'sirajul', '21232f297a57a5a743894a0e4a801fc3', '', 1, '2016-03-22 13:29:23'),
(6, '1235', 'Mostafa', '21232f297a57a5a743894a0e4a801fc3', '', 1, '2016-03-22 05:11:11'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_from` (`user_from`),
  ADD KEY `user_to` (`user_to`),
  ADD KEY `subject` (`subject`),
  ADD FULLTEXT KEY `content` (`content`);

--
-- Indexes for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
