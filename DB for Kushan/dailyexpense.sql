-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 05:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dailyexpense`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(20) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `expense` int(20) NOT NULL,
  `expensedate` varchar(15) NOT NULL,
  `expensecategory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `user_id`, `expense`, `expensedate`, `expensecategory`) VALUES
(77, '7', 700, '2023-02-01', 'Entertainment'),
(78, '7', 800, '2023-02-01', 'Entertainment'),
(79, '7', 900, '2023-02-01', 'Entertainment'),
(80, '8', 500, '2023-02-01', 'Entertainment'),
(81, '8', 600, '2023-02-01', 'Clothings'),
(82, '8', 750, '2023-03-05', 'Entertainment'),
(83, '8', 980, '2023-03-05', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `groupt`
--

CREATE TABLE `groupt` (
  `gid` int(20) NOT NULL,
  `gname` varchar(120) NOT NULL,
  `gcdate` date NOT NULL DEFAULT current_timestamp(),
  `gadmin` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupt`
--

INSERT INTO `groupt` (`gid`, `gname`, `gcdate`, `gadmin`) VALUES
(2, 'st', '2023-03-05', 'Krishna D'),
(8, 'tt', '2023-03-05', 'Krishna D'),
(9, 'bravoooo', '2023-03-05', 'Krishna D');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `uid` int(20) NOT NULL,
  `gid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`uid`, `gid`) VALUES
(1, 8),
(7, 8),
(8, 8),
(7, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_path` varchar(50) NOT NULL DEFAULT 'default_profile.png',
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `profile_path`, `password`, `trn_date`) VALUES
(1, 'Aniket', 'Kumar', 'ani@123', 'default_profile.png', 'Aniket#10', '2023-02-01 22:17:46'),
(7, 'Kushan', 'Thakur', 'ku@ta', 'default_profile.png', 'b15633efea9083326eafb50731c1ccd9', '2023-02-01 22:20:58'),
(8, 'Krishna', 'D', 'kd@d', 'default_profile.png', 'c9dc96ce6280d0621b7805b067168964', '2023-02-01 22:27:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `groupt`
--
ALTER TABLE `groupt`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `groupt`
--
ALTER TABLE `groupt`
  MODIFY `gid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
