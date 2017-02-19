-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2017 at 07:20 PM
-- Server version: 5.5.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gisoobot_bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_bgimage`
--

CREATE TABLE `gs_bgimage` (
  `id` int(11) NOT NULL,
  `Link` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_bgimage`
--

INSERT INTO `gs_bgimage` (`id`, `Link`) VALUES
(1, 'theme/dist/bg/blurred-background-1.jpg'),
(4, 'theme/dist/bg/blurred-background-2.jpg'),
(3, 'theme/dist/bg/blurred-background-3.jpg'),
(5, 'theme/dist/bg/blurred-background-4.jpg'),
(6, 'theme/dist/bg/blurred-background-5.jpg'),
(7, 'theme/dist/bg/blurred-background-6.jpg'),
(8, 'theme/dist/bg/blurred-background-7.jpg'),
(9, 'theme/dist/bg/blurred-background-8.jpg'),
(10, 'theme/dist/bg/blurred-background-9.jpg'),
(11, 'theme/dist/bg/blurred-background-10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gs_options`
--

CREATE TABLE `gs_options` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `int` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_options`
--

INSERT INTO `gs_options` (`id`, `name`, `text`, `int`) VALUES
(1, 'views', '', 1368),
(2, 'logo', '', 0),
(3, 'sitename', 'Gisoo Bot', 0),
(4, 'sitename2', 'ربات آنلاین', 0),
(5, 'sitetag', '', 0),
(6, 'sitefooter', 'تمام حقوق این اسکریپت برای گیسو محفوظ است .', 0),
(7, 'TelegramBotAPI', '303314859:AAGbbJOmK-3ngQP6WApYpZmq8ubCGggb4e0', 0),
(8, 'BotID', '', 0),
(9, 'BotName', '', 0),
(10, 'TelegramAdminUID', '71595348', 0),
(11, 'TelegramAdminID', 'aliasghar_ramin', 0),
(12, '‌‌BotDebug', '', 0),
(13, 'botchannel', '@testerr', 0),
(14, 'webapi', '123456789asdasdasdasdADAFDFdsad', 0),
(15, 'rphone', '', 1),
(16, 'botin', '', 43),
(17, 'botout', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `gs_posts`
--

CREATE TABLE `gs_posts` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `text` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `shdate` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `date` datetime NOT NULL,
  `tags` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `edit` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL DEFAULT 'YES'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_posts`
--

INSERT INTO `gs_posts` (`id`, `title`, `text`, `shdate`, `date`, `tags`, `type`, `edit`) VALUES
(1, 'صفحه پیدا نشد', 'صفحه مورد نظر شما پیدا نشد', 'آغاز دنیا', '0000-00-00 00:00:00', 'تماس با ما ، ', 'PAGE', 'NO'),
(2, 'تست', 'تست', 'تست', '2016-09-08 00:00:00', '', 'NEWS', 'NO'),
(3, 'تست', 'تست', '', '2016-10-18 00:00:00', '', 'PAGE', 'NO'),
(4, 'تست', '', '', '2016-10-18 00:00:00', '', 'NEWS', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `gs_tbot_commands`
--

CREATE TABLE `gs_tbot_commands` (
  `id` int(11) NOT NULL,
  `command` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `photo` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `video` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `keyboard` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_tbot_commands`
--

INSERT INTO `gs_tbot_commands` (`id`, `command`, `photo`, `video`, `text`, `keyboard`, `type`) VALUES
(1, '%D8%AF%D8%B1%DB%8C%D8%A7%D9%81%D8%AA+%D8%B4%D9%85%D8%A7%D8%B1%D9%87+%D8%AA%D9%84%D9%81%D9%86', '', '', '%D8%A8%D8%A7+%D8%B3%D9%84%D8%A7%D9%85++%F0%9F%91%8B+%DA%A9%D8%A7%D8%B1%D8%A8%D8%B1+%DA%AF%D8%B1%D8%A7%D9%85%DB%8C+%E2%9D%A4%EF%B8%8F+.%0D%0A%D8%A8%D9%87+%D8%B1%D8%A8%D8%A7%D8%AA+%D9%85%D8%A7+%D8%AE%D9%88%D8%B4+%D8%A2%D9%85%D8%AF%DB%8C%D8%AF+%E2%9D%A4%EF%B8%8F++.%0D%0A%D8%A8%D8%B1%D8%A7%DB%8C+%D8%B9%D8%B6%D9%88%DB%8C%D8%AA+%D8%AF%D8%B1+%D8%B3%DB%8C%D8%B3%D8%AA%D9%85+%D8%B4%D9%85%D8%A7+%D8%A8%D8%A7%DB%8C%D8%AF+%D8%AF%DA%A9%D9%85%D9%87+%D8%B2%DB%8C%D8%B1++%F0%9F%91%87++%D8%B1%D8%A7+%D9%84%D9%85%D8%B3+%DA%A9%D9%86%DB%8C%D8%AF+.%0D%0A%D8%A8%D8%A7+%D8%AA%D8%B4%DA%A9%D8%B1+%F0%9F%99%8F+.', '%7B%0D%0A%09%22keyboard%22%3A+%5B%0D%0A%09%09%5B%0D%0A%09%09%09%7B%0D%0A%09%09%09%09%22text%22%3A+%22%F0%9F%93%B1+%D8%AB%D8%A8%D8%AA+%D8%B4%D9%85%D8%A7%D8%B1%D9%87+%D8%AA%D9%84%D9%81%D9%86+%F0%9F%93%B1%22%2C%0D%0A%09%09%09%09%22request_contact%22%3A+true%0D%0A%09%09%09%7D%0D%0A%09%09%5D%0D%0A%09%5D%2C%0D%0A%09%22one_time_keyboard%22%3A+true%2C%0D%0A%09%22resize_keyboard%22%3A+true%0D%0A%7D', 3),
(2, '%D8%AA%D8%A7%DB%8C%DB%8C%D8%AF+%D8%AF%D8%B1%DB%8C%D8%A7%D9%81%D8%AA+%D8%B4%D9%85%D8%A7%D8%B1%D9%87+%D8%AA%D9%84%D9%81%D9%86', '', '', '%D8%A8%D8%B3%DB%8C%D8%A7%D8%B1+%D8%A7%D8%B2+%D8%B4%D9%85%D8%A7+%D9%85%D9%85%D9%86%D9%88%D9%86%D9%85+%F0%9F%99%8F++%D8%A8%D8%A7%D8%A8%D8%AA+%D8%AB%D8%A8%D8%AA+%D8%B4%D9%85%D8%A7%D8%B1%D9%87+%F0%9F%93%B1+%D8%AA%D9%84%D9%81%D9%86+%D9%87%D9%85%D8%B1%D8%A7%D9%87%D8%AA%D9%88%D9%86+.%0D%0A%E2%9C%85+%D8%AD%D8%A7%D9%84%D8%A7+%D9%85%DB%8C%D8%AA%D9%88%D9%86%DB%8C%D8%AF+%D8%A8%D8%A7+%D8%B2%D8%AF%D9%86+%D8%AF%DA%A9%D9%85%D9%87+%D9%88%D8%B1%D9%88%D8%AF+%D8%A8%D9%87+%D8%B1%D8%A8%D8%A7%D8%AA+%D8%A7%D8%B2+%D8%A7%D9%85%DA%A9%D8%A7%D9%86%D8%A7%D8%AA+%D9%85%D9%86+%D8%A7%D8%B3%D8%AA%D9%81%D8%A7%D8%AF%D9%87+%DA%A9%D9%86%DB%8C%D8%AF+%21', '%7B%0D%0A%09%22keyboard%22%3A+%5B%0D%0A%09%09%5B%0D%0A%09%09%09%22%E2%9C%85+%D9%88%D8%B1%D9%88%D8%AF+%D8%A8%D9%87+%D8%B1%D8%A8%D8%A7%D8%AA%22%0D%0A%09%09%5D%0D%0A%09%5D%0D%0A%7D', 3),
(3, '%E2%9C%85+%D9%88%D8%B1%D9%88%D8%AF+%D8%A8%D9%87+%D8%B1%D8%A8%D8%A7%D8%AA', 'http://www.aramin.co/img/hafez.jpg', '', '%D9%85%D9%86%D9%88+%D8%A7%D8%B5%D9%84%DB%8C%0D%0A%D9%86%D8%A7%D9%85+%D8%B4%D9%85%D8%A7+%3A+%25name%25%0D%0A%D9%81%D8%A7%D9%85%DB%8C%D9%84+%D8%B4%D9%85%D8%A7+%3A+%25lname%25%0D%0A%D8%A2%DB%8C%D8%AF%DB%8C+%D8%AA%D9%84%DA%AF%D8%B1%D8%A7%D9%85+%3A+%25uname%25', '%7B%0D%0A%09%22keyboard%22%3A+%5B%0D%0A%09%09%5B%0D%0A%09%09%09%221%22%0D%0A%09%09%5D%2C%0D%0A%09%09%5B%0D%0A%09%09%09%221%22%2C%0D%0A%09%09%09%222%22%0D%0A%09%09%5D%0D%0A%09%5D%0D%0A%7D', 1),
(4, '%2Fstart', '', 'BAADBAADUwEAAuqO3QPOqizXMW3dZQI', '%D9%85%D9%86%D9%88+%D8%A7%D8%B5%D9%84%DB%8C%0D%0A%D9%86%D8%A7%D9%85+%D8%B4%D9%85%D8%A7+%3A+%25name%25%0D%0A%D9%81%D8%A7%D9%85%DB%8C%D9%84+%D8%B4%D9%85%D8%A7+%3A+%25lname%25%0D%0A%D8%A2%DB%8C%D8%AF%DB%8C+%D8%AA%D9%84%DA%AF%D8%B1%D8%A7%D9%85+%3A+%25uname%25', '%7B%0D%0A%09%22keyboard%22%3A+%5B%0D%0A%09%09%5B%0D%0A%09%09%09%221%22%0D%0A%09%09%5D%2C%0D%0A%09%09%5B%0D%0A%09%09%09%221%22%2C%0D%0A%09%09%09%222%22%0D%0A%09%09%5D%0D%0A%09%5D%0D%0A%7D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gs_tbot_users`
--

CREATE TABLE `gs_tbot_users` (
  `ID` int(255) NOT NULL,
  `UID` text COLLATE utf8_persian_ci NOT NULL,
  `UName` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `FName` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `LName` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `ChatID` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `phone` text COLLATE utf8_persian_ci NOT NULL,
  `rdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `gs_tbot_users`
--

INSERT INTO `gs_tbot_users` (`ID`, `UID`, `UName`, `FName`, `LName`, `ChatID`, `phone`, `rdate`) VALUES
(1, '', '', '', '', '', '', '2017-01-07'),
(2, '71595348', 'aliasgharramin', 'Aliasghar', 'Ramin', '71595348', '989128896675', '2017-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `gs_users`
--

CREATE TABLE `gs_users` (
  `id` int(11) NOT NULL,
  `user` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `pass` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `emailechek` int(11) NOT NULL DEFAULT '0',
  `rdate` date NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_users`
--

INSERT INTO `gs_users` (`id`, `user`, `pass`, `email`, `name`, `emailechek`, `rdate`, `type`) VALUES
(1, 'admin', '$2a$08$0bG7a1Un94R/XJHYZvpUb.bGry43RpEoDUYDVf9Cu0g80IyISUb1a', 'ar.p360@hotmail.com', 'علی اصغر رامین', 1, '2016-09-24', 'ADMIN'),
(2, 'programer', '$2a$08$dzuPXReoBr7IxKLYNEPdOOhMyOXwUvAHh35iyMNZ4EEJUSfICk5a6', 'ar.p360@hotmail.com', 'علی اصغر رامین', 1, '2017-01-10', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bgimage`
--
ALTER TABLE `gs_bgimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_options`
--
ALTER TABLE `gs_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_posts`
--
ALTER TABLE `gs_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_tbot_commands`
--
ALTER TABLE `gs_tbot_commands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_tbot_users`
--
ALTER TABLE `gs_tbot_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gs_users`
--
ALTER TABLE `gs_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bgimage`
--
ALTER TABLE `gs_bgimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `gs_options`
--
ALTER TABLE `gs_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `gs_posts`
--
ALTER TABLE `gs_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gs_tbot_commands`
--
ALTER TABLE `gs_tbot_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gs_tbot_users`
--
ALTER TABLE `gs_tbot_users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gs_users`
--
ALTER TABLE `gs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
