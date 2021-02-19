-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 09:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `final_gallery`
--

CREATE TABLE `final_gallery` (
  `pk_gallery_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `gallery_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_images`
--

CREATE TABLE `final_images` (
  `pk_img_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `fk_tag_id` int(11) NOT NULL,
  `img_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_img_gallery`
--

CREATE TABLE `final_img_gallery` (
  `fk_img_id` int(11) NOT NULL,
  `fk_gallery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_tags`
--

CREATE TABLE `final_tags` (
  `pk_tag_id` int(11) NOT NULL,
  `tag_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_users`
--

CREATE TABLE `final_users` (
  `pk_user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_users`
--

INSERT INTO `final_users` (`pk_user_id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'kalyhart', 'a2b02e4bdd3a74d81392393782163ea6', 'Kailey ', 'Hart'),
(2, 'kalyhart2', '164c2399eb67de88b9e5141d731e1aa8', '', ''),
(4, '', '$2y$10$D2UEkQLN1J8JB2lFJuW2qukvugUMnammDFbWnzPrEZKiEhF9dE1US', '', ''),
(5, '', '$2y$10$4SZynBie5NMrkcFSgtj0Y.I2Jv9n2Z6scJNehQD37tnrqUJwVIntu', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final_gallery`
--
ALTER TABLE `final_gallery`
  ADD PRIMARY KEY (`pk_gallery_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `final_images`
--
ALTER TABLE `final_images`
  ADD PRIMARY KEY (`pk_img_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_tag_id` (`fk_tag_id`);

--
-- Indexes for table `final_img_gallery`
--
ALTER TABLE `final_img_gallery`
  ADD KEY `fk_img_id` (`fk_img_id`),
  ADD KEY `fk_gallery_id` (`fk_gallery_id`);

--
-- Indexes for table `final_tags`
--
ALTER TABLE `final_tags`
  ADD PRIMARY KEY (`pk_tag_id`);

--
-- Indexes for table `final_users`
--
ALTER TABLE `final_users`
  ADD PRIMARY KEY (`pk_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `final_gallery`
--
ALTER TABLE `final_gallery`
  MODIFY `pk_gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_images`
--
ALTER TABLE `final_images`
  MODIFY `pk_img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_users`
--
ALTER TABLE `final_users`
  MODIFY `pk_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `final_gallery`
--
ALTER TABLE `final_gallery`
  ADD CONSTRAINT `final_gallery_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `final_users` (`pk_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `final_images`
--
ALTER TABLE `final_images`
  ADD CONSTRAINT `final_images_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `final_users` (`pk_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `final_images_ibfk_2` FOREIGN KEY (`fk_tag_id`) REFERENCES `final_tags` (`pk_tag_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `final_img_gallery`
--
ALTER TABLE `final_img_gallery`
  ADD CONSTRAINT `final_img_gallery_ibfk_1` FOREIGN KEY (`fk_gallery_id`) REFERENCES `final_gallery` (`pk_gallery_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `final_img_gallery_ibfk_2` FOREIGN KEY (`fk_img_id`) REFERENCES `final_images` (`pk_img_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
