-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 06:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merohostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `username`, `password`) VALUES
(40, 'rabin', 'Rabin_user', 'c6f057b86584942e415435ffb1fa93d4'),
(41, 'admin main', 'admin', 'e6e061838856bf47e1de730719fb2609');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `hostel_id` int(11) NOT NULL,
  `checkin_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `customer_id`, `hostel_id`, `checkin_date`) VALUES
(1, 1, 34, '2022-06-26'),
(2, 1, 31, '2022-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `Username`, `Email`, `Password`, `PhoneNo`, `Address`, `Gender`) VALUES
(1, 'user', 'user@gmail.com', 'ba5ef51294fea5cb4eadea5306f3ca3b', '9800000000', 'kathmandu', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(20) CHARACTER SET utf8 NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `booked` varchar(25) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `image_name`, `name`, `price`, `address`, `contact`, `type`, `booked`, `description`) VALUES
(31, 'Hostel-Name-3930.jpg', 'Garima Hostel', '18000', 'Pulchowk', '9862331929', 'girls', 'no', '1 seater'),
(32, 'Hostel-Name-4413.jpg', 'Bhaktapur House', '9000', 'Thimi,Bhaktapur', '9847569788', 'boys', 'no', '6 seater '),
(33, 'Hostel-Name-9890.jpg', 'Bhibhuti Girls Hostel', '12000', 'Kupandol,Lalitpur', '9847569788', 'girls', 'yes', '3 seater'),
(34, 'Hostel-Name-2671.jpg', 'Holmo Home', '8000', 'Boudha,Kathmadnu', '9847569788', 'boys', 'no', '2 seater'),
(35, 'Hostel-Name-4938.jpg', 'Kusang Boys Home', '9000', 'Sankhamul,Kathmandu', '9847569788', 'boys', 'no', '3seater'),
(36, 'Hostel-Name-6455.jpg', 'Premium Girls Home', '18000', 'Pulchowk,Lalitpur', '9862331929', 'girls', 'no', '2 seater'),
(37, 'Hostel-Name-4596.jpg', 'Swikar Boys Hostel', '12000', 'Dharan', '9847569788', 'boys', 'no', '2 seater'),
(38, 'Hostel-Name-6874.jpg', 'Thamel Boys House', '9000', 'Thamel,Kathmandu', '9847569788', 'boys', 'no', '2 seater');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
