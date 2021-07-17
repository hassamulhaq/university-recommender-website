-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 02:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_recommender_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_details`
--

CREATE TABLE `admission_details` (
  `admission_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `season` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admission_details`
--

INSERT INTO `admission_details` (`admission_id`, `university_id`, `season`, `start_date`, `end_date`, `details`) VALUES
(1, 4, 'Fall', '2021-05-01', '2021-05-30', 'Please apply before end date.'),
(3, 1, 'Spring', '2023-05-01', '2025-05-03', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`) VALUES
(1, 'BSCS'),
(2, 'BS'),
(3, 'IT'),
(6, 'IO'),
(7, 'BSCS Math'),
(8, 'Bio');

-- --------------------------------------------------------

--
-- Table structure for table `program_university`
--

CREATE TABLE `program_university` (
  `id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `merit` int(11) NOT NULL,
  `duration` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fee` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `best_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_university`
--

INSERT INTO `program_university` (`id`, `university_id`, `program_id`, `merit`, `duration`, `fee`, `best_for`, `program_link`, `details`) VALUES
(5, 3, 1, 80, '2 years', '400000', 'Fsc Engineering', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n'),
(8, 5, 6, 30, '8 years', '500000000', 'ICS', '', 'NA'),
(10, 1, 2, 90, '8 years', '900000', 'Fsc Engineering', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor...\r\n\r\n'),
(28, 4, 1, 80, '2742', '7474', 'ICS', '7474', '274274'),
(29, 4, 2, 70, '2 years', '2000000', 'ICS', 'https://mail.yandex.com/', 'В разделе Показатели качества следите за прогрессом получения знаков и ростом индекса качества сайта, а также сравнивайте свой сайт с другими по различным параметрам.\r\nВ разделе Диагностика можно быстро узнавать об ошибках на сайте, а также получать рекомендации, как их устранить. Вебмастер автоматически проверяет сайт более чем по 25 параметрам. Чтобы оперативно получать отчеты об ошибках, сводки о работе сайта в целом, его отдельных страниц и Турбо-страниц, подпишитесь на уведомления Вебмастера. И конечно, не забудьте подписаться на еженедельную сводку по сайту.');

-- --------------------------------------------------------

--
-- Table structure for table `search_list`
--

CREATE TABLE `search_list` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inter_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inter_percentage` int(11) NOT NULL,
  `interested_program` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admission_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `save_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `search_list`
--

INSERT INTO `search_list` (`list_id`, `user_id`, `inter_subject`, `inter_percentage`, `interested_program`, `fee_start`, `fee_end`, `admission_date`, `season`, `save_date`) VALUES
(1, 1, 'Fsc Engineering', 90, 'BSCS', '0', '500000', '2021-05-01', 'fall', '2021-05-03'),
(3, 1, 'Fsc Bio', 0, 'BS', '0', '500000', '2021-05-20', 'spring', '2021-05-03'),
(4, 1, 'Fsc Bio', 0, 'BS', '0', '500000', '2021-05-20', 'spring', '2021-05-03'),
(5, 1, 'Fsc Bio', 0, 'BS', '0', '500000', '2021-05-20', 'spring', '2021-05-03'),
(10, 18, 'Fsc Bio', 0, 'IT', '0', '500000', '2021-04-30', 'spring', '2021-05-05'),
(11, 1, 'Fsc Engineering', 0, 'BSCS', '0', '500000', '2021-05-28', 'fall', '2021-05-05'),
(12, 1, 'FA', 0, 'BSCS Math', '0', '500000', '2021-05-01', 'spring', '2021-05-05'),
(13, 1, 'Fsc Bio', 72, 'BSCS', '20000', '30000', '2021-06-06', 'spring', '2021-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `university_id` int(11) NOT NULL,
  `university_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `founded` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `campus` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `hours` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`university_id`, `university_name`, `founded`, `website`, `phone`, `location`, `campus`, `hours`, `details`, `image`, `created_at`) VALUES
(1, 'Lahore Garrison University', '2021-04-06', 'na.edu.pk', '0333252154454', 'location: AZ', 'NARAN01', '10AM to 3AM', 'The University of the Punjab, also referred to as Punjab University, is a public research university located in Lahore, Punjab, Pakistan.The Senate house now known as Punjab university old campus, Lahore ... Wikipedia', 'download (2).jfif', '2021-04-24 00:56:29'),
(3, 'University of the Punjab', '2021-04-06', 'pu.edu.pk', '0333252154454', 'Quaid-e-Azam University, Islamabad, 15320', 'SKP01', '10AM to 3AM', 'The University of the Punjab, also referred to as Punjab University, is a public research university located in Lahore, Punjab, Pakistan.The Senate house now known as Punjab university old campus, Lahore ... Wikipedia', 'download.jfif', '2021-04-24 01:00:55'),
(4, 'Quaid e Azam University', '1985-03-12', 'https://qau.edu.pk/', 'Quaid-e-Azam University, Islamabad, 15320', 'location: AZ', 'Urban', '9:00AM to 8PM', 'Undergraduate tuition and fees: Domestic tuition 17,600 PKR, International tuition 200,000 PKR (2011 – 12)', 'QAU-Logo.jpg', '2021-05-01 16:22:59'),
(5, 'Harvard University', '1990-11-13', 'http://al.edu.pk/', '756567567575', 'Lahore --- -updated', 'LHR', '08:00AM - 5:00PM', 'ffsffvv cvbdfsdh olj djf lsd hfiosd fsodfls jl.', 'download.jpg', '2021-05-04 02:37:42'),
(6, 'Mehran University Of Pakistan', '2021-05-28', 'https://mehranuni.pk', '0564412541231', 'Peshawar', 'Peshawar001', '24', 'sdasdffsg sdfgsgsdsdasdffsg sdfgsgsdsdasdffsg sdfgsgsd', 'download.jpg', '2021-05-28 16:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cnic` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `university_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `study_program` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_semester` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `user_role` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `join_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `gender`, `date_of_birth`, `cnic`, `profile_image`, `address`, `email`, `phone`, `university_name`, `study_program`, `current_semester`, `password`, `status`, `user_role`, `join_date`) VALUES
(1, 'admin', 'Hassam', 'Ul Haq', 'male', '2021-10-12', '35404-505-909', 'images/slide__01.jpg', 'Bikhi Road', 'admin@yahoo.com', '03330442925', 'VU', 'BSCS', '9', 'admin', 'approved', 'admin', '2021-02-03'),
(11, 'Hassam', 'Ul Haq', 'Khan', 'male', '2021-04-21', '52375437453453', '../images/slide__01.jpg', 'Bikhi Road', 'user@yahoo.com', '0333252154454', 'VU', 'BSCS', '6', 'admin', 'approved', 'user', '2021-01-18'),
(17, 'admin', 'Dev', 'Hassan', 'male', '2021-10-12', '35404-505-909', 'images/slide__01.jpg', 'Bikhi Road', 'admin@gmail.com', '03330442925', 'VU', 'BSCS', '9', 'admin', 'approved', 'admin', '2021-02-01'),
(18, 'Ikram', 'Khan', 'Khan', 'male', '2021-04-21', '52375437453453', '../images/slide__01.jpg', 'Bikhi Road', 'user@ikram.com', '0333252154450', 'VU', 'BSCS', '6', 'admin', 'pending', 'user', '2021-02-01'),
(19, 'Nimbra', 'Ahmed', 'Khan', 'male', '2021-04-21', '52375437453453', '../images/slide__01.jpg', 'Bikhi Road', 'user@yahoo.com', '0333252154454', 'VU', 'BSCS', '6', 'admin', 'pending', 'user', '2021-01-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_details`
--
ALTER TABLE `admission_details`
  ADD PRIMARY KEY (`admission_id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `program_university`
--
ALTER TABLE `program_university`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `search_list`
--
ALTER TABLE `search_list`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`university_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_details`
--
ALTER TABLE `admission_details`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_university`
--
ALTER TABLE `program_university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `search_list`
--
ALTER TABLE `search_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_details`
--
ALTER TABLE `admission_details`
  ADD CONSTRAINT `admission_details_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `universities` (`university_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_university`
--
ALTER TABLE `program_university`
  ADD CONSTRAINT `program_university_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_university_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `universities` (`university_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `search_list`
--
ALTER TABLE `search_list`
  ADD CONSTRAINT `search_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
