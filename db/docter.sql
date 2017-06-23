-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 03:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docter`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `address2` text NOT NULL,
  `dateofbirth` varchar(12) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `Alcohollevel` decimal(10,3) NOT NULL,
  `proceduredate` varchar(12) NOT NULL,
  `status` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Zip` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `admin_staus` tinyint(1) NOT NULL,
  `country` varchar(255) NOT NULL,
  `cron_update` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `address`, `address2`, `dateofbirth`, `phone`, `email`, `Alcohollevel`, `proceduredate`, `status`, `City`, `State`, `Zip`, `gender`, `userid`, `admin_staus`, `country`, `cron_update`, `password`, `user_status`) VALUES
(9, 'adnan', 'anwer', 'lahore', 'lahore', '1996-01-26', '+921234567', 'adnandani@gmail.com', '0.234', '2017-03-28', 'Armed', 'karachi', 'Louisiana', '54000', 'Male', 'adnan1996-01-26', 0, '', 0, '', 0),
(10, 'usman', 'ali', 'adsdad', 'asdasd', '2016-05-10', '1234534678o', 'asd@fgyh.gha', '2.000', '2017-03-20', 'Armed', 'DASD', 'Kentucky', '23435', 'Male', 'usman2016-05-10', 0, '', 0, '', 0),
(11, 'abid', 'seth', 'lahore', 'kot mota singh', '0000-00-00', '+923004623130', 'adnandani@gmail.com', '0.003', '0000-00-00', 'Armed', 'karachi', 'Georgia', '54000', 'Male', 'abid03/01/2017', 0, '', 0, '', 0),
(12, 'Tahir', 'jamil', '62 E Forrest Feezor St,', 'nill', '1991-09-03', '1321312312', 'zartash.tahir042@gmail.com', '0.060', '2017-03-27', 'DisArmed', 'Vail', 'Arizona', '85641', 'Male', 'Tahir1991-09-03', 0, '', 0, '', 0),
(13, 'tahir', 'khan', 'asda sd da sd asd', '  sadasdasd', '04-04-2017', '94543427492', 'zartash.tahir042@gmail.com', '1.000', '0000-00-00', 'DisArmed', 'Lahore', 'Massachusetts', '54000', 'Male', 'tahk04042017', 0, '', 0, '$2y$10$Kz0hJLxtP9G4uGrozSuIj.Rb05IWGbUZF.PPrZaj407KilzLI7H86', 0),
(14, 'test', 'dsdsad', '62 E Forrest Feezor St,', '', '03-26-2017', '5209829303', 'zartash.tahir042@gmail.com', '1.345', '0000-00-00', 'DisArmed', 'Vail', 'Arizona', '85641', 'N/A', 'tesd03262017', 0, '', 1, '12345', 1),
(15, 'Tahir', 'jamil', '62 E Forrest Feezor St,', 'asd', '02-03-2013', '9259829303', 'zartash.tahir042@gmail.com', '1.455', '04-05-2017', 'DisArmed', 'Vail', 'Arizona', '85641', 'N/A', 'Tahj02032013', 0, 'UK', 1, 'admin@123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
