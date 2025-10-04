-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 07:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `pass`) VALUES
(7, 'admin123@gmail.com', '%861M:6X`\n`\n'),
(8, 'om@gmail.com', '#,3(S\n`\n');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `number` int(12) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sr_no`, `name`, `address`, `number`, `message`) VALUES
(1, 'Om Kachhdiya', 'Bapasitaram chowk, Mavdi, Rajkot. ', 2147483647, 'Hiiiiiiiiiiiiiiiii'),
(2, 'omjudsb', 'Rajkot', 2147483647, 'dfv'),
(3, 'omjudsb', 'Rajkot', 2147483647, 'dafdfg'),
(4, 'Bhautik Pipaliya', 'Rajkot', 2147483647, 'Hii, I am Bhautik.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `number`, `address`, `specialization`, `password`) VALUES
(5, 'DR. Rajesh B. Kachhadiya', 'drrajeshkachhadiya@gmail.com', 9428893488, 'Flate D-502 , Aadarsh Dream - 1 ,Kastury Residency, Mota Mava, Rajkot, Gujarat 360004', 'Cardiology', 'dr@raj'),
(6, 'Dr. Sharda R. Kachhadiya', 'drshardakachhadiya@gmail.com', 9925164257, 'Flate D-502 , Aadarsh Dream - 1 ,Kastury Residency, Mota Mava, Rajkot, Gujarat 360004', 'Orthopedic', 'dr@sarda');

-- --------------------------------------------------------

--
-- Table structure for table `drappoinment`
--

CREATE TABLE `drappoinment` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` bigint(10) NOT NULL,
  `date` varchar(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `drname` varchar(200) NOT NULL,
  `time` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drappoinment`
--

INSERT INTO `drappoinment` (`id`, `name`, `number`, `date`, `state`, `pin`, `drname`, `time`, `email`) VALUES
(38, 'Omkumar R Kachhadiya', 9724293488, '2025-09-09', 'Gujarat', '360004', 'DR. Rajesh B. Kachhadiya', '4:00 PM', 'omrajkachhadiya@gmail.com'),
(39, 'Raj Amrutiya', 7777988078, '2025-09-10', 'Gujarat', '360004', 'Dr. Sharda R. Kachhadiya', '3:00 PM', 'rajamrutiya07@gmail.com'),
(40, 'Dhyey Kachhadiya', 9726393488, '2025-09-19', 'Gujarat', '360004', 'DR. Rajesh B. Kachhadiya', '4:45 PM', 'dhyeyrajkachhadiya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `drlogin`
--

CREATE TABLE `drlogin` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drlogin`
--

INSERT INTO `drlogin` (`id`, `email`, `pass`) VALUES
(5, 'omrajkachhadiya@gmail.com', '&9&]C=&]R\n`\n'),
(7, 'drom@gmail.com', '#,3(S\n`\n');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `img_source` varchar(100) NOT NULL,
  `img_name` varchar(20) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `img_source`, `img_name`, `date`) VALUES
(11, 'image/doctor1.jpg', ' Doctor', '2025-08-30'),
(12, 'image/hospitalimage.jpg', ' Hospital', '2025-08-30'),
(13, 'image/hospital1.jpg', ' Hospital', '2025-08-30'),
(14, 'image/high quality treatment6.jpg', ' hospital', '2025-08-30'),
(15, 'image/gallery_04.jpg', ' Doctor', '2025-08-30'),
(16, 'image/gallery_03.jpg', ' Doctor', '2025-08-30'),
(17, 'image/gallery_01.jpg', ' dental', '2025-08-30'),
(18, 'image/gallery_05.jpg', ' teliscope', '2025-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `ID` int(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `item` varchar(10) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`ID`, `medicine`, `date`, `item`, `price`) VALUES
(10, 'perasitamol', '2025-08-31', '20', '100');

-- --------------------------------------------------------

--
-- Table structure for table `patiant`
--

CREATE TABLE `patiant` (
  `ID` int(11) NOT NULL,
  `treatment` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `price` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patiant`
--

INSERT INTO `patiant` (`ID`, `treatment`, `date`, `price`) VALUES
(13, 'ring wome', ' 2025-08-31', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `patiant_contact`
--

CREATE TABLE `patiant_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `number` bigint(10) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patiant_contact`
--

INSERT INTO `patiant_contact` (`id`, `name`, `address`, `number`, `comment`) VALUES
(1, 'Bhautik Pipaliya', '96 - Rani Bangloes , Mavdi, Rajkot.', 8925874658, 'Hii'),
(2, 'Vivek pipaliya', 'Rani park, BH.Nandanvan, mavdi, rajkot ', 8128140835, 'Hello, I am Vivek'),
(3, 'Dev Trivedi', '35, Kothariya road, Rajkot.', 9847563214, 'Hello'),
(4, 'Meet Rank', '96, Bapasitaram chowk, mavdi, rajkot', 8847563478, 'Hello'),
(5, 'Om Kachadiya', '87, Nandanvan, rajkot', 6958123474, 'I am om'),
(6, 'Dharmik Vishpara', 'Balaji park-10, mavdi, rajkot', 7789251455, 'I am Dharmik'),
(7, 'Nandish Raval', '55,Rani nagar, mg road, junagadh', 9885784625, 'Hii'),
(8, 'Yash Vala', 'Patel nagar, 150-feet ring road, rajkot', 8795478625, 'Hello'),
(9, 'Shailesh Solanki', 'aambedkar nagar, 80-feet ring road, rajkot.', 7878486521, 'Hello'),
(13, 'Om R. Kachhadiya', 'Flat No: D-502 Aadarsh Dream -1 , opp. Kastury Res', 9724293488, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `surgery`
--

CREATE TABLE `surgery` (
  `ID` int(11) NOT NULL,
  `surgery` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surgery`
--

INSERT INTO `surgery` (`ID`, `surgery`, `date`, `price`) VALUES
(10, 'cardiolody', ' 2025-08-01', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `username`) VALUES
(13, 'omrajkachhadiya@gmail.com', 'patiant', 'om kachhadiya'),
(16, 'om@gmail.com', '123', 'om');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drappoinment`
--
ALTER TABLE `drappoinment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `drlogin`
--
ALTER TABLE `drlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patiant`
--
ALTER TABLE `patiant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patiant_contact`
--
ALTER TABLE `patiant_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgery`
--
ALTER TABLE `surgery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `drappoinment`
--
ALTER TABLE `drappoinment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `drlogin`
--
ALTER TABLE `drlogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patiant`
--
ALTER TABLE `patiant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patiant_contact`
--
ALTER TABLE `patiant_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `surgery`
--
ALTER TABLE `surgery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
