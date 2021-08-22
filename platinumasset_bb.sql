-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2021 at 10:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `btc_wallet` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `btc_wallet`) VALUES
(1, 'admin', 'admin@admin.com', '9ae2be73b58b565bce3e47493a56e26a', 'bc1qke3yuy0lrm78larmrk7smjs59ypqv8xgn3npa3');

-- --------------------------------------------------------

--
-- Table structure for table `deleteduser`
--

CREATE TABLE `deleteduser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notiuser` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notiuser`, `notireciver`, `notitype`, `time`) VALUES
(18, 'guybenini@gmail.com', 'Admin', 'Create Account', '2021-08-07 18:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `plan` varchar(110) NOT NULL,
  `useremail` varchar(110) NOT NULL,
  `date` varchar(110) NOT NULL,
  `payment` varchar(110) NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `plan`, `useremail`, `date`, `payment`, `status`) VALUES
(2, 100, 'Bronze', 'guybenini@gmail.com', '17:57 Monday Aug 9, 2021', 'Bitcoin', 'Pending'),
(3, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 21:19', 'Bitcoin', 'Pending'),
(4, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 21:21', 'Bitcoin', 'Pending'),
(5, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 21:22', 'Bitcoin', 'Pending'),
(6, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 21:25', 'Bitcoin', 'Pending'),
(7, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 21:28', 'Bitcoin', 'Pending'),
(8, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 21:30', 'Bitcoin', 'Pending'),
(9, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 21:44', 'Bitcoin', 'Pending'),
(10, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 22:02', 'Bitcoin', 'Pending'),
(11, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 22:04', 'Bitcoin', 'Pending'),
(12, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 22:04', 'Bitcoin', 'Pending'),
(13, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 22:05', 'Bitcoin', 'Pending'),
(14, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 22:10', 'Bitcoin', 'Pending'),
(15, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 22:11', 'Bitcoin', 'Pending'),
(16, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 22:11', 'Bitcoin', 'Pending'),
(17, 100, 'Bronze', 'guybenini@gmail.com', 'Thu Aug 12, 2021 22:21', 'Bitcoin', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(110) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `btc_wallet` varchar(110) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `balance` int(110) NOT NULL,
  `profit` int(110) NOT NULL,
  `plan` varchar(110) NOT NULL,
  `withdrawals` int(110) NOT NULL,
  `deposits` int(110) NOT NULL,
  `pendingwith` int(110) NOT NULL,
  `ref` int(110) NOT NULL,
  `ref_comm` int(110) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `gender`, `mobile`, `btc_wallet`, `designation`, `balance`, `profit`, `plan`, `withdrawals`, `deposits`, `pendingwith`, `ref`, `ref_comm`, `image`, `status`) VALUES
(1, 'Guy Benini', 'guybenini@gmail.com', 'guybenini', '25d55ad283aa400af464c76d713c07ad', 'Male', '08132793416', 'sdhfgeiwgeufowhfWKEPWHRWOfejwfwefwefwfhwfjwjbf', 'User', 0, 0, '0', 500, 0, 500, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(110) NOT NULL,
  `useremail` varchar(110) NOT NULL,
  `amount` int(110) NOT NULL,
  `date` varchar(110) NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `useremail`, `amount`, `date`, `status`) VALUES
(1, 'guybenini@gmail.com', 100, 'Thu Aug 12, 2021 22:44', 'Pending'),
(2, 'guybenini@gmail.com', 1000, 'Thu Aug 12, 2021 22:46', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleteduser`
--
ALTER TABLE `deleteduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deleteduser`
--
ALTER TABLE `deleteduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
