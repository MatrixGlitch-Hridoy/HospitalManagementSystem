-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 04:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'Admin', 'admin@gmail.com', '@Admin3024', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookappoint`
--

CREATE TABLE `bookappoint` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `uid` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookappoint`
--

INSERT INTO `bookappoint` (`id`, `username`, `specialization`, `fees`, `date`, `day`, `reason`, `status`, `comment`, `uid`, `d_id`) VALUES
(32, 'Dr Nabil', 'Cardiologists', '2000', '2021-04-27', 'Thursday', 'matha betha', 'Pending', '', 46, 22),
(33, 'Dr Nabil', 'Cardiologists', '2000', '2021-04-27', 'Thursday', 'chest pain', 'Approved', 'dont worry will check', 22, 22),
(34, 'Dr Ononna', 'Destist', '1000', '2021-04-30', 'Friday', 'daat betha', 'Done', 'okay keep patience', 22, 26),
(35, 'Dr Fahad', 'Neurologists', '3000', '2021-04-29', 'Thursday', 'kidney pain', 'Declined', '', 22, 24);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `fees` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `stime` varchar(255) NOT NULL,
  `etime` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `username`, `email`, `password`, `specialization`, `fees`, `phone`, `gender`, `date`, `day`, `stime`, `etime`, `status`) VALUES
(22, 'Dr Nabil', 'nabil@gmail.com', '@Hrila3024', 'Cardiologists', '2000', '01711111111', 'Male', '2021-04-27', 'Thursday', '10:00', '17:00', 'available'),
(23, 'Dr Mahi', 'mahi@gmail.com', '@Hrila3024', 'Nephrologists', '3000', '01711133333', 'Male', '2021-04-28', 'Wednesday', '10:00', '17:00', 'available'),
(24, 'Dr Fahad', 'fahad@gmail.com', '@Hrila3024', 'Neurologists', '3000', '01911111111', 'Male', '2021-04-29', 'Thursday', '10:00', '17:00', 'available'),
(25, 'Dr Khalid', 'khalid@gmail.com', '@Hrila3024', 'Cardiologists', '2000', '01716102755', 'Male', '2021-04-28', 'Wednesday', '10:00', '17:00', 'available'),
(26, 'Dr Ononna', 'onu@gmail.com', '@Hrila3024', 'Destist', '1000', '01744411133', 'Female', '2021-04-30', 'Friday', '00:00', '21:00', 'available'),
(27, 'Dr Rabeya', 'rabeya@gmail.com', '@Hrila3024', 'Cardiologists', '2000', '01814443432', 'Female', '2021-04-27', 'Tuesday', '10:00', '17:00', 'available'),
(28, 'Dr Nafisa', 'nafisa@gmail.com', '@Hrila3024', 'Gynaecologist', '3000', '0193333333', 'Female', '2021-04-28', 'Wednesday', '10:00', '17:00', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `manage_order`
--

CREATE TABLE `manage_order` (
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_order`
--

INSERT INTO `manage_order` (`order_id`, `username`, `email`, `address`, `phone`, `payment`) VALUES
(8, 'hridoy', 'hridoyrizvikhalid@gmail.com', 'Dhaka ', '01751385880', 'Cod'),
(9, 'hridoy', 'hridoyrizvikhalid@gmail.com', 'Dhaka ', '01751385880', 'Cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `mName` varchar(255) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `mType` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unitPrice` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `mName`, `generic`, `mType`, `quantity`, `unitPrice`, `image`) VALUES
(9, 'Napa', 'Square', 'Painkiller', '200', '5', '../pharmacist/upload-images/napa.png'),
(10, 'Ace', 'Square', 'Painkiller', '400', '5', '../pharmacist/upload-images/ace.jpg'),
(11, 'Alatrol', 'Baximco', 'Allergy', '200', '5', '../pharmacist/upload-images/unnamed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `username`, `email`, `password`, `address`, `phone`, `gender`) VALUES
(22, 'Rizvi', 'hridoyrizvikhalid@gmail.com', '@Hrila3024', '', '', 'Male'),
(46, 'Rakib', 'rakib@gmail.com', '@Hrila3024', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists`
--

CREATE TABLE `pharmacists` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacists`
--

INSERT INTO `pharmacists` (`id`, `username`, `email`, `password`, `address`, `phone`, `gender`, `user_type`) VALUES
(1, 'pharmacist', 'pharmacist@hms.com', '@Admin3024', 'Dhaka Cantonment', '01751385880', 'Male', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(31, 'admin', 'admin@gmail.com', '@Admin3024', 'admin'),
(33, 'Hridoy', 'doctor@gmail.com', '@Doctor3024', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(100) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `item_name`, `price`, `quantity`) VALUES
(16, 'Napa', '5', '1'),
(16, 'peracitamil', '5', '1'),
(17, 'Napa', '5', '1'),
(17, 'peracitamil', '5', '1'),
(17, 'something', '5', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookappoint`
--
ALTER TABLE `bookappoint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid_fk` (`uid`),
  ADD KEY `d_id_fk` (`d_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_order`
--
ALTER TABLE `manage_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `bookappoint`
--
ALTER TABLE `bookappoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `manage_order`
--
ALTER TABLE `manage_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pharmacists`
--
ALTER TABLE `pharmacists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookappoint`
--
ALTER TABLE `bookappoint`
  ADD CONSTRAINT `bookappoint_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookappoint_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
