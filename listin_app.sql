-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 02:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listin_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(256) NOT NULL,
  `done_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `user_id`, `activity`, `done_on`) VALUES
(253, 31, 'updated your profile', '2019-07-07 18:49:21'),
(254, 31, 'changed your password', '2019-07-07 18:50:02'),
(255, 31, 'created a new strict plan', '2019-07-07 18:50:55'),
(256, 31, 'made a deposit  for modal nikah', '2019-07-07 18:51:11'),
(257, 31, 'created a new flexible plan', '2019-07-07 18:51:50'),
(258, 31, 'made a deposit  for jalan ke bali', '2019-07-07 18:52:10'),
(259, 31, 'withdrew from jalan ke bali', '2019-07-07 18:52:34'),
(260, 31, 'completed the plan for modal nikah', '2019-07-07 18:53:01'),
(261, 31, 'cancelled a plan', '2019-07-07 18:54:00'),
(262, 31, 'withdrew from jalan ke bali', '2019-07-07 18:54:46'),
(263, 31, 'created a new flexible plan', '2019-07-07 18:55:32'),
(264, 31, 'withdrew from modal nikah', '2019-07-07 18:56:07'),
(265, 32, 'updated your profile', '2019-10-08 16:31:04'),
(266, 32, 'created a new strict plan', '2019-10-08 16:31:42'),
(267, 32, 'made a deposit  for modal nikah', '2019-10-08 16:31:49'),
(268, 32, 'made a deposit  for modal nikah', '2019-10-08 16:33:12'),
(269, 33, 'created a new strict plan', '2019-11-12 10:40:21'),
(270, 33, 'completed the plan for modal nikah', '2019-11-12 10:40:52'),
(271, 33, 'created a new flexible plan', '2019-11-12 10:41:27'),
(272, 33, 'made a deposit  for jalan ke bali', '2019-11-12 10:42:08'),
(273, 33, 'withdrew from modal nikah', '2019-11-12 10:42:33'),
(274, 33, 'withdrew from modal nikah', '2019-11-12 10:42:55'),
(275, 33, 'updated your profile', '2019-11-12 10:44:19'),
(276, 33, 'updated your profile', '2019-11-12 10:44:35'),
(277, 33, 'cancelled a plan', '2019-11-12 10:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `list_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `est_cost` double NOT NULL,
  `goal_date` date DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `save_freq` int(11) DEFAULT NULL,
  `trans_needed` int(11) DEFAULT NULL,
  `save_amount` double DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `complete_or_cancel_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`list_id`, `title`, `description`, `est_cost`, `goal_date`, `created_on`, `save_freq`, `trans_needed`, `save_amount`, `status`, `category`, `complete_or_cancel_date`, `user_id`) VALUES
(67, 'modal nikah', 'No description.', 100000, '2019-07-13', '2019-07-07 18:50:55', 3, 0, 50000, 'completed', 'strict', '2019-07-07 18:53:01', 31),
(68, 'jalan ke bali', 'sama keluarga', 50000, NULL, '2019-07-07 18:51:50', NULL, NULL, NULL, 'cancelled', 'flexible', '2019-07-07 18:54:00', 31),
(69, 'beli makan', 'No description.', 24000, NULL, '2019-07-07 18:55:32', NULL, NULL, NULL, 'on_going', 'flexible', NULL, 31),
(70, 'modal nikah', 'ddd', 200000, '2019-10-24', '2019-10-08 16:31:42', 1, 14, 12500, 'on_going', 'strict', NULL, 32),
(71, 'modal nikah', 'halo', 900000, '2019-11-22', '2019-11-12 10:40:21', 7, 0, 630000, 'completed', 'strict', '2019-11-12 10:40:52', 33),
(72, 'jalan ke bali', 'No description.', 100000, NULL, '2019-11-12 10:41:27', NULL, NULL, NULL, 'cancelled', 'flexible', '2019-11-12 10:45:55', 33);

-- --------------------------------------------------------

--
-- Table structure for table `list_details`
--

CREATE TABLE `list_details` (
  `list_detail_id` int(11) NOT NULL,
  `tr_date` datetime NOT NULL,
  `detail_amount` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_details`
--

INSERT INTO `list_details` (`list_detail_id`, `tr_date`, `detail_amount`, `action`, `list_id`) VALUES
(93, '2019-07-07 18:51:11', 50000, 'deposit', 67),
(94, '2019-07-07 18:52:10', 30000, 'deposit', 68),
(95, '2019-07-07 18:52:34', 20000, 'withdraw', 68),
(96, '2019-07-07 18:53:01', 50000, 'deposit', 67),
(97, '2019-07-07 18:54:46', 10000, 'withdraw', 68),
(98, '2019-07-07 18:56:06', 100000, 'withdraw', 67),
(99, '2019-10-08 16:31:49', 12500, 'deposit', 70),
(100, '2019-10-08 16:33:12', 12500, 'deposit', 70),
(101, '2019-11-12 10:40:52', 630000, 'deposit', 71),
(102, '2019-11-12 10:42:08', 50000, 'deposit', 72),
(103, '2019-11-12 10:42:33', 100000, 'withdraw', 71),
(104, '2019-11-12 10:42:55', 90000, 'withdraw', 71);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `register_date`, `image`, `role_id`) VALUES
(31, 'suhendra', 'hendra@gmail.com', '$2y$10$9gogvPE6Rw9ac8gJEzJBNu3ZBa2sFB8M806gMN3BP8XMcyi3zgQZK', '2019-07-07 11:48:13', 'pp7.jpg', 2),
(32, 'Suhendra', '171111022@mhs.stiki.ac.id', '$2y$10$o8g6bO.0QJSNKFW76T438u5EczW9lcFv7ssy9mpRNCddf7O2B/MYW', '2019-10-08 09:30:41', 'ritedik_shadow.png', 2),
(33, 'suhendra', 'suhendra@stiki.ac.id', '$2y$10$UN4hl7miX8Y0bSB4bkJfn.wM8nTKpRZVzLRl.MG4cAVXXnTFTNunC', '2019-11-12 03:27:22', '3840x2160-2613985-spiderman-homecoming-screen-wallpaper.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`wallet_id`, `user_id`, `amount`) VALUES
(16, 31, 0),
(17, 32, 25000),
(18, 33, 490000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `fk_user_activity_id` (`user_id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `list_details`
--
ALTER TABLE `list_details`
  ADD PRIMARY KEY (`list_detail_id`),
  ADD KEY `fk_list_id` (`list_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `fk_user_wallet_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `list_details`
--
ALTER TABLE `list_details`
  MODIFY `list_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_user_activity_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `list_details`
--
ALTER TABLE `list_details`
  ADD CONSTRAINT `fk_list_id` FOREIGN KEY (`list_id`) REFERENCES `lists` (`list_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`);

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `fk_user_wallet_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
