-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 10:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharetube`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(255) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Education'),
(2, 'Religion'),
(3, 'Movies'),
(4, 'Lifestyle'),
(5, 'Nature'),
(6, 'Sports'),
(7, 'Animation'),
(8, 'Design'),
(9, 'Tech'),
(10, 'Health'),
(11, 'Execrise'),
(12, 'Foods'),
(13, 'Documentary');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `comment` text NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `comment_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `usr_id`, `video_id`, `comment_time`) VALUES
(10, 'I like the bouncing..', 'sT-UPFROhAM1ln', 'sTdrzvEuJK', '1686731725'),
(11, 'Great animation', 'sT-UPFROhAM1ln', 'sTdrzvEuJK', '1686734367'),
(12, 'Mr Cool', 'sT-U9sgw85Bhpo', 'sTdrzvEuJK', '1686736659'),
(13, 'I love geography', 'sT-U9sgw85Bhpo', 'sTVTWpdGDU', '1686806954'),
(14, 'Very true', 'sT-U9sgw85Bhpo', 'sTD72lAbCa', '1686806999'),
(15, 'Wont miss it', 'sT-U9sgw85Bhpo', 'sTePstcp1k', '1686819397'),
(16, 'I am so scared ', 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sTPIaNSQLRnp4KVAve07mUbcOF2', '1687006426'),
(17, 'I like this video', 'sT-U4E3bUBPxr0OiF1c2myCg5NHSRqMWwt', 'sTtZLuUvy1kAd75HGwQTfIW3X2N', '1687103147');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `usr_id`, `video_id`) VALUES
(3, 'sT-U9sgw85Bhpo', 'sTdrzvEuJK'),
(7, 'sT-U9sgw85Bhpo', 'sTH4fMuqT6'),
(8, 'sT-U9sgw85Bhpo', 'sTVABbGLu7'),
(9, 'sT-U9sgw85Bhpo', 'sTIOVTUoXZ'),
(10, 'sT-UHzEGCf0ewi', 'sTdRoTHEkF'),
(11, 'sT-UPFROhAM1ln', 'sTUdBGE48H'),
(12, 'sT-U9sgw85Bhpo', 'sTVTWpdGDU'),
(13, 'sT-U9sgw85Bhpo', 'sTD72lAbCa'),
(14, 'sT-U9sgw85Bhpo', 'sT6t7dQ0zu'),
(15, 'sT-U9sgw85Bhpo', 'sTePstcp1k'),
(16, 'sT-U9sgw85Bhpo', 'sT7hIuMzeO'),
(17, 'sT-U9sgw85Bhpo', 'sTjuDHmJ6Z'),
(18, 'sT-U9sgw85Bhpo', 'sTg2Y31Lx0'),
(19, 'sT-U9sgw85Bhpo', 'sTuUB1hf5t'),
(20, 'sT-U9sgw85Bhpo', 'sTUdBGE48H'),
(21, 'sT-UHzEGCf0ewi', 'sTVABbGLu7'),
(22, 'sT-UHzEGCf0ewi', 'sT6t7dQ0zu'),
(23, 'sT-UHzEGCf0ewi', 'sTH4fMuqT6'),
(25, 'sT-UrItAdkf0Jh', 'sTYDhM8aG1d9mWz4qiKx7eOQRf0'),
(26, 'sT-UHzEGCf0ewi', 'sTjao1Adx3Nzv8PcZ5D9IYrMpW7'),
(27, 'sT-UHzEGCf0ewi', 'sTy1QPIaxOJrUTkCWwXgHciM63D'),
(29, 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', 'sTg2Y31Lx0'),
(30, 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', 'sTieoUNSZTcy7q0zEF1ltwJpDk8'),
(31, 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', 'sTtZLuUvy1kAd75HGwQTfIW3X2N'),
(32, 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', 'sT6t7dQ0zu'),
(33, 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', 'sTePstcp1k'),
(34, 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(35, 'sT-U9sgw85Bhpo', 'sTtZLuUvy1kAd75HGwQTfIW3X2N'),
(36, 'sT-U9sgw85Bhpo', 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(37, 'sT-U9sgw85Bhpo', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(38, 'sT-U9sgw85Bhpo', 'sTieoUNSZTcy7q0zEF1ltwJpDk8'),
(40, 'sT-U9sgw85Bhpo', 'sTPiT1BgrZtbz6FpQvGwoWyO7XU'),
(41, 'sT-U9sgw85Bhpo', 'sTxnaUeupGOKXhRMoqW916ld5Sz'),
(42, 'sT-U9sgw85Bhpo', 'sTeSZghIJrnmc15HVuAx8BR9dKL'),
(43, 'sT-U9sgw85Bhpo', 'sT5jPkcJsMKI4aB3uFV2XlZLhpY'),
(44, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(45, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4ymXLjowxedvsNFAT709bDKVM'),
(46, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sTPIaNSQLRnp4KVAve07mUbcOF2'),
(47, 'sT-U9sgw85Bhpo', 'sT6qau8vZFtr7VdGUXBlHifM1xC'),
(48, 'sT-U9sgw85Bhpo', 'sT4ymXLjowxedvsNFAT709bDKVM'),
(50, 'sT-U4E3bUBPxr0OiF1c2myCg5NHSRqMWwt', 'sTtZLuUvy1kAd75HGwQTfIW3X2N'),
(51, 'sT-UrItAdkf0Jh', 'sTipblJsBN0SCAfr8KPuOWva76w'),
(52, 'sT-U9sgw85Bhpo', 'sTfPiwrAme5RgVWCQLhkZY8IDdN'),
(53, 'sT-U9sgw85Bhpo', 'sT81Ujct6HfWEqoupgSvwaeB73T');

-- --------------------------------------------------------

--
-- Table structure for table `like_comments`
--

CREATE TABLE `like_comments` (
  `like_comment_id` int(250) NOT NULL,
  `comment_id` int(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_comments`
--

INSERT INTO `like_comments` (`like_comment_id`, `comment_id`, `usr_id`) VALUES
(3, 8, 'sT-U9sgw85Bhpo'),
(5, 8, 'sT-UHzEGCf0ewi'),
(6, 3, 'sT-UHzEGCf0ewi'),
(9, 9, 'sT-UPFROhAM1ln'),
(11, 10, 'sT-UPFROhAM1ln'),
(12, 12, 'sT-U9sgw85Bhpo'),
(14, 10, 'sT-U9sgw85Bhpo'),
(15, 11, 'sT-U9sgw85Bhpo');

-- --------------------------------------------------------

--
-- Table structure for table `login_usr_views`
--

CREATE TABLE `login_usr_views` (
  `login_view_id` int(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_usr_views`
--

INSERT INTO `login_usr_views` (`login_view_id`, `usr_id`, `video_id`) VALUES
(1, 'sT-U9sgw85Bhpo', 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(2, 'sT-U9sgw85Bhpo', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(3, 'sT-U9sgw85Bhpo', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(4, 'sT-U9sgw85Bhpo', 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(5, 'sT-U9sgw85Bhpo', 'sTtZLuUvy1kAd75HGwQTfIW3X2N'),
(6, 'sT-U9sgw85Bhpo', 'sTieoUNSZTcy7q0zEF1ltwJpDk8'),
(7, 'sT-U9sgw85Bhpo', 'sTieoUNSZTcy7q0zEF1ltwJpDk8'),
(9, 'sT-U9sgw85Bhpo', 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(10, 'sT-U9sgw85Bhpo', 'sTPiT1BgrZtbz6FpQvGwoWyO7XU'),
(11, 'sT-U9sgw85Bhpo', 'sT5jPkcJsMKI4aB3uFV2XlZLhpY'),
(12, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(13, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(14, 'sT-U9sgw85Bhpo', 'sTxnaUeupGOKXhRMoqW916ld5Sz'),
(16, 'sT-U4E3bUBPxr0OiF1c2myCg5NHSRqMWwt', 'sTtZLuUvy1kAd75HGwQTfIW3X2N');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comments`
--

CREATE TABLE `reply_comments` (
  `reply_id` int(255) NOT NULL,
  `comment_id` int(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `reply_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply_comments`
--

INSERT INTO `reply_comments` (`reply_id`, `comment_id`, `reply`, `usr_id`, `reply_time`) VALUES
(2, 12, 'Yes', 'sT-U9sgw85Bhpo', '1686738274');

-- --------------------------------------------------------

--
-- Table structure for table `saved_videos`
--

CREATE TABLE `saved_videos` (
  `saved_id` int(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_videos`
--

INSERT INTO `saved_videos` (`saved_id`, `usr_id`, `video_id`) VALUES
(27, 'sT-UHzEGCf0ewi', 'sTdRoTHEkF'),
(35, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4ymXLjowxedvsNFAT709bDKVM'),
(36, 'sT-U9sgw85Bhpo', 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(39, 'sT-U4E3bUBPxr0OiF1c2myCg5NHSRqMWwt', 'sTtZLuUvy1kAd75HGwQTfIW3X2N');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `sub_id` int(255) NOT NULL,
  `usr_subscriber_id` varchar(255) NOT NULL,
  `usr_channel_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`sub_id`, `usr_subscriber_id`, `usr_channel_id`) VALUES
(42, 'sT-U9sgw85Bhpo', 'sT-UPFROhAM1ln'),
(46, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT-U9sgw85Bhpo'),
(49, 'sT-U9sgw85Bhpo', 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1'),
(51, 'sT-U9sgw85Bhpo', 'sT-UrItAdkf0Jh'),
(52, 'sT-U9sgw85Bhpo', 'sT-U9sgw85Bhpo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usr_mail` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `usr_token` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `username`, `usr_mail`, `pwd`, `usr_token`) VALUES
('sT-U9sgw85Bhpo', 'bornmajor', 'osbornmaja@gmail.com', '$2y$12$JZfembieSKBsp86.TxtNUeojWsp0JPNedRRzFp2n.GMqKvbG6yLgq', 1),
('sT-UHzEGCf0ewi', '', 'osbornmangaro@gmail.com', '$2y$12$zWLzhXgb8r6/i/hEihCYsudY5DILIi/jP3HwHdloO3.5X7b/o5cfe', 2),
('sT-UPFROhAM1ln', '', 'oscarmuye@yahoo.com', '$2y$12$2i6sLq39J.2nfvqbTfbFreaSUsx.fOcM8mEtL8sVMp7QlP02CoI/e', 3),
('sT-UrItAdkf0Jh', '', 'osmangaro@yahoo.com', '$2y$12$ZbebM/5n.D.DTCTlR73iMOvX.kUjPIdPPb.9r2ZUDdeikijGKbHSe', 4),
('sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', '', 'rhodaanzazi@yahoo.com', '$2y$12$rFfntziIDARZaIqttQ/HTeBUpSTGIwowmXZD5MnzHfZT2yyKW05am', 5),
('sT-U4E3bUBPxr0OiF1c2myCg5NHSRqMWwt', '', 'osbornmaja@outlook.com', '$2y$12$Q1ESXGzo9FvSShiY/DQxfOwcFGgsuVSLzzpJ5SwcgfjpbMERMYyWe', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `likes_id` int(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`likes_id`, `usr_id`, `video_id`) VALUES
(15, 'sT-UrItAdkf0Jh', 'sTdRoTHEkF'),
(26, 'sT-UHzEGCf0ewi', 'sTVABbGLu7'),
(29, 'sT-UrItAdkf0Jh', 'sTVABbGLu7'),
(30, 'sT-UrItAdkf0Jh', 'sTIOVTUoXZ'),
(31, 'sT-UrItAdkf0Jh', 'sTH4fMuqT6'),
(32, 'sT-U9sgw85Bhpo', 'sTH4fMuqT6'),
(33, 'sT-UrItAdkf0Jh', 'sTuUB1hf5t'),
(34, 'sT-UPFROhAM1ln', 'sTdRoTHEkF'),
(37, 'sT-U9sgw85Bhpo', 'sTVABbGLu7'),
(38, 'sT-U9sgw85Bhpo', 'sTVTWpdGDU'),
(41, 'sT-U9sgw85Bhpo', 'sTePstcp1k'),
(43, 'sT-UHzEGCf0ewi', 'sTjao1Adx3Nzv8PcZ5D9IYrMpW7'),
(44, 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(46, 'sT-U9sgw85Bhpo', 'sT5jPkcJsMKI4aB3uFV2XlZLhpY'),
(47, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(48, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4ymXLjowxedvsNFAT709bDKVM'),
(49, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sTPIaNSQLRnp4KVAve07mUbcOF2'),
(50, 'sT-U9sgw85Bhpo', 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(53, 'sT-U4E3bUBPxr0OiF1c2myCg5NHSRqMWwt', 'sTtZLuUvy1kAd75HGwQTfIW3X2N'),
(54, 'sT-UrItAdkf0Jh', 'sTipblJsBN0SCAfr8KPuOWva76w'),
(55, 'sT-U9sgw85Bhpo', 'sT81Ujct6HfWEqoupgSvwaeB73T');

-- --------------------------------------------------------

--
-- Table structure for table `usr_tags`
--

CREATE TABLE `usr_tags` (
  `usr_tags_id` int(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `cat_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usr_tags`
--

INSERT INTO `usr_tags` (`usr_tags_id`, `usr_id`, `video_id`, `cat_id`) VALUES
(1, 'sT-U9sgw85Bhpo', 'sTtZLuUvy1kAd75HGwQTfIW3X2N', 8),
(2, 'sT-U9sgw85Bhpo', 'sTieoUNSZTcy7q0zEF1ltwJpDk8', 8),
(3, 'sT-U9sgw85Bhpo', 'sTieoUNSZTcy7q0zEF1ltwJpDk8', 8),
(5, 'sT-U9sgw85Bhpo', 'sTUplv2TKg4MLzAxZXfVnkj3qDJ', 1),
(6, 'sT-U9sgw85Bhpo', 'sTPiT1BgrZtbz6FpQvGwoWyO7XU', 12),
(7, 'sT-U9sgw85Bhpo', 'sT5jPkcJsMKI4aB3uFV2XlZLhpY', 9),
(8, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR', 11),
(9, 'sT-UpVDPbv5Qs1z0UgSRAWduIaXy7GwMLC', 'sT4Ww7y9oSODxGU3p0gZbT8u5rR', 11),
(10, 'sT-U9sgw85Bhpo', 'sTxnaUeupGOKXhRMoqW916ld5Sz', 12),
(12, 'sT-U4E3bUBPxr0OiF1c2myCg5NHSRqMWwt', 'sTtZLuUvy1kAd75HGwQTfIW3X2N', 8);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_desc` varchar(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `date_published` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_url`, `video_title`, `video_desc`, `cat_id`, `thumbnail`, `usr_id`, `date_published`) VALUES
('sT4Ww7y9oSODxGU3p0gZbT8u5rR', '836779693', 'Let\'s get moving -', 'White & purple modern gym & fitness Video -\nwhen you feel like quitting,remember why you started', 11, 'https://i.ibb.co/4WxJ6GZ/lets-get-moving-fitness.png', 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', '1686891988'),
('sT5jPkcJsMKI4aB3uFV2XlZLhpY', '837140697', 'Screens |Technology Addiction Short Film| 2018', 'Screens is a short film about the impact of technology and mobile devices in out daily life. we get so caught up in the race with technology and in the end we are the losers in this race. it\'s time we all disconnect for a while and be present.', 9, 'https://i.ibb.co/hc0Vyh0/screens-short-film.png', 'sT-U9sgw85Bhpo', '1687003086'),
('sT6qau8vZFtr7VdGUXBlHifM1xC', '837118252', 'Breaking the Stigma - A short film about mental health', 'Barking and Dagenham Youth Forum wants to get young people of Barking and Dagenham talking about mental health. If you or somebody you know is having a tough time, visit Big White Wall where you can speak with one of the online Wall Guides and get the sup', 10, 'https://i.ibb.co/8rBnFg6/breaking-the-stigma.png', 'sT-U9sgw85Bhpo', '1686992454'),
('sT7hIuMzeO', '836411698', 'Science and technology', 'Blue and white illustrative modern science and tech education video', 9, 'https://i.ibb.co/b6S3KGX/science-and-tech.png', 'sT-UPFROhAM1ln', '1686892387 '),
('sT81Ujct6HfWEqoupgSvwaeB73T', '837307361', 'Caudrado dance', 'Caudrado celebration', 6, 'https://i.ibb.co/8Btv4kk/caudrado.jpg', 'sT-U9sgw85Bhpo', '1687091695'),
('sT9TWQnKoU71m5eAd34E0cMVlDz', '837454415', 'Albert Einstein Explains Theory of Relativity | Albert Einstein Real Video | Colour Footage', 'In this video, Albert Einstein is explaining his theory of relativity. The most popular theory in the history. Please watch video till the end. This video contains colour footage of Albert Einstein', 1, 'https://i.ibb.co/KWHmgkC/relativity.png', 'sT-UrItAdkf0Jh', '1687153131'),
('sTeSZghIJrnmc15HVuAx8BR9dKL', '836777986', 'My fitness routine - workout and meal tips', 'Fitness routine Intro', 11, 'https://i.ibb.co/RSyrnr9/fitness-routine.png', 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', '1686891205'),
('sTfPiwrAme5RgVWCQLhkZY8IDdN', '837478308', 'Final deathtination', 'Final deathtination ', 7, 'https://i.ibb.co/HYhMrbT/animation.png', 'sT-U9sgw85Bhpo', '1687160385'),
('sTieoUNSZTcy7q0zEF1ltwJpDk8', '836799492', 'Free Adobe After Effects Intro Templates', 'The amazing FREE AE template is a smooth and simple project that features 5 image or video placeholder, 4 text placeholder, 1 logo placeholders, and a custom color controller for easily changing the template\'s color pallet. Customizing is simple. Put your', 8, 'https://i.ibb.co/y8JbMgr/Free-Adobe-After-Effects-Intro-Templates.png', 'sT-UHzEGCf0ewi', '1686899021'),
('sTIjJSuCOV2ta8ivDdw1ofHx7nK', '837305991', 'Ronaldo celebrates with Anthony', 'Ronaldo best celebrations', 6, 'https://i.ibb.co/0FxbQsD/ronaldo.jpg', 'sT-U9sgw85Bhpo', '1687091220'),
('sTipblJsBN0SCAfr8KPuOWva76w', '837456400', 'Walk By Faith & Not By Sight - Short Film', 'You must walk by faith, and not by sight. Life tries to interrupt the will of the Most High, causing us to stray away from the path of His \r\ndivine will. ', 2, 'https://i.ibb.co/fSyJQk8/walk-by-faith.png', 'sT-UrItAdkf0Jh', '1687154131 '),
('sTjao1Adx3Nzv8PcZ5D9IYrMpW7', '836792391', 'Short Opener', 'Short Opener is a fun and dynamically animated After Effects template with a stylish design, simple text animations and smooth transitioning effects. It\'s with 4 editable text layers and 3 media placeholders. A great way to show off your traveling, vacati', 4, 'https://i.ibb.co/qWTBpn4/opener.png', 'sT-UHzEGCf0ewi', '1686896678'),
('sTokczuxN7PpnUfJ6Z2KAGir8Et', '836790624', 'Forgotten strangers', 'Yellow red modern retro aesthetic film title typographic intro video', 3, 'https://i.ibb.co/9b299h2/forgotten-strangers.png', 'sT-UHzEGCf0ewi', '1686896061'),
('sTP3RfoUVDYWMCiH2OFwySbqxkg', '836802587', 'Welcome hiking', 'An After Effects template. It includes 12 text placeholders, 5 media placeholders, 1 logo placeholder, 1 music placeholder, and a color controllers panel. You can use it as an intro to your show, or as a promotion to your brand and products. Check out my ', 11, 'https://i.ibb.co/7pxgz0v/welcome-hiking.png', 'sT-Ug5GaoRZBywDeWs8YH4FNALzuQrCVv1', '1686899852'),
('sTPIaNSQLRnp4KVAve07mUbcOF2', '836786735', 'Human arm horror shadow', 'Shadow human arm horror channel youtube intro', 3, 'https://i.ibb.co/mXXkvv3/horror-story.png', 'sT-UHzEGCf0ewi', '1686894648'),
('sTPiT1BgrZtbz6FpQvGwoWyO7XU', '837112593', 'THE COOK | Award-Winning Short Film (2022)', 'HE COOK (Vincent Bossel, 2022) | A young chef cooks up a mysterious dish', 12, 'https://i.ibb.co/RCqLMhq/the-cook.png', 'sT-U9sgw85Bhpo', '1686990047'),
('sTtZLuUvy1kAd75HGwQTfIW3X2N', '836798459', 'Free Retro Wave Intro Flat Design', 'Free Retro Wave Intro Flat Design is a fresh After Effects template. A colorful, funky and flashy design with a cool distorting effect that elegantly reveals your tagline and logo. This template features 2 editable text layers, 1 logo placeholder and a fu', 8, 'https://i.ibb.co/zNFzPCZ/retro-wave-motion.png', 'sT-UHzEGCf0ewi', '1686898575'),
('sTUdBGE48H', '836409269', '100% for the planet', 'All sea animal', 5, 'https://i.ibb.co/M6Cjfyy/sea-animal.png', 'sT-UPFROhAM1ln', '1686853691 '),
('sTUplv2TKg4MLzAxZXfVnkj3qDJ', '836919865', 'Education For Life ⭐ Short Film', 'This year marks 50 years of partnership with the European Union, a key strategic partner for UNRWA. Critical EU support to the UNRWA education programme over the last 50 years has provided quality and inclusive education to millions of Palestine refugees ', 1, 'https://i.ibb.co/nB3FVsF/education-for-life.png', 'sT-U9sgw85Bhpo', '1686926307'),
('sTuUB1hf5t', '836041091', 'How to cook a perfect steak', 'Best way to cook perfect steak', 1, 'https://i.ibb.co/PwfWJ7D/steak.png', 'sT-UrItAdkf0Jh', '1686834965 '),
('sTVABbGLu7', '835855162', 'Musyimi & Company - Legal Services Kenya', 'An introduction to the firm of Musyimi & Company which is an all service firm in the Republic of Kenya with specialisation in Civil & Commercial Litigation, Family Law, Property Law and Commercial & Corporate Law.', 4, 'https://i.ibb.co/4RnyhK7/laywer.png', 'sT-U9sgw85Bhpo', '1686812026'),
('sTvsnarKeN5MhBbJclgyZUu4kFD', '837301114', 'Stone | 1 Minute Short Film | Hot Shot', 'Remove strains from others paths and God will remove them from yours. Value humans. Value humanity.', 2, 'https://i.ibb.co/JFvHDQN/stone.png', 'sT-U9sgw85Bhpo', '1687088713'),
('sTxnaUeupGOKXhRMoqW916ld5Sz', '837114267', 'Breakfast | A Short Film', 'Instagram: https://www.instagram.com/food_finessa/\nTwitter: https://twitter.com/FoodFinessa?lang=en\nFacebook: https://www.facebook.com/profile.php?...', 12, 'https://i.ibb.co/hXnmpKL/breakfast-short-film.png', 'sT-U9sgw85Bhpo', '1686990629');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(255) NOT NULL,
  `video_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`view_id`, `video_id`) VALUES
(37, 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(38, 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(39, 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(40, 'sTVABbGLu7'),
(41, 'sTVABbGLu7'),
(42, 'sTVABbGLu7'),
(43, 'sTVABbGLu7'),
(44, 'sTVABbGLu7'),
(45, 'sTVABbGLu7'),
(46, 'sTtZLuUvy1kAd75HGwQTfIW3X2N'),
(47, 'sTuUB1hf5t'),
(48, 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(49, 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(50, 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(51, 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(52, 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(53, 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(54, 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(55, 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(56, 'sTtZLuUvy1kAd75HGwQTfIW3X2N'),
(57, 'sTieoUNSZTcy7q0zEF1ltwJpDk8'),
(58, 'sTieoUNSZTcy7q0zEF1ltwJpDk8'),
(60, 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(61, 'sTPiT1BgrZtbz6FpQvGwoWyO7XU'),
(62, 'sT5jPkcJsMKI4aB3uFV2XlZLhpY'),
(63, 'sTUplv2TKg4MLzAxZXfVnkj3qDJ'),
(64, 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(65, 'sT4Ww7y9oSODxGU3p0gZbT8u5rR'),
(66, 'sTxnaUeupGOKXhRMoqW916ld5Sz'),
(68, 'sTtZLuUvy1kAd75HGwQTfIW3X2N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `like_comments`
--
ALTER TABLE `like_comments`
  ADD PRIMARY KEY (`like_comment_id`);

--
-- Indexes for table `login_usr_views`
--
ALTER TABLE `login_usr_views`
  ADD PRIMARY KEY (`login_view_id`);

--
-- Indexes for table `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `saved_videos`
--
ALTER TABLE `saved_videos`
  ADD PRIMARY KEY (`saved_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_token`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`likes_id`);

--
-- Indexes for table `usr_tags`
--
ALTER TABLE `usr_tags`
  ADD PRIMARY KEY (`usr_tags_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `like_comments`
--
ALTER TABLE `like_comments`
  MODIFY `like_comment_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_usr_views`
--
ALTER TABLE `login_usr_views`
  MODIFY `login_view_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reply_comments`
--
ALTER TABLE `reply_comments`
  MODIFY `reply_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saved_videos`
--
ALTER TABLE `saved_videos`
  MODIFY `saved_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_token` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `likes_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `usr_tags`
--
ALTER TABLE `usr_tags`
  MODIFY `usr_tags_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
