-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 02:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seatbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Level` int(2) NOT NULL,
  `phoneno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Username`, `Password`, `Level`, `phoneno`) VALUES
(0, 'Bonny', '654321', 0, ''),
(0, 'Nicholas', '654321', 0, ''),
(0, 'Victor', '123456', 0, '0703504761'),
(0, 'Vincent', '214354', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `operating days`
--

CREATE TABLE `operating days` (
  `Day` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operating days`
--

INSERT INTO `operating days` (`Day`, `Time`) VALUES
('Mon', '8'),
('Tues', '8'),
('Wed', '8'),
('Thurs', '8'),
('Friday', '8');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `SeatId` int(11) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Occupant` varchar(40) NOT NULL,
  `Serial` varchar(50) NOT NULL,
  `CountDownTime` time NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `startTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`SeatId`, `Status`, `Occupant`, `Serial`, `CountDownTime`, `Date`, `startTime`) VALUES
(1, 'Not Occupied', '', '', '17:00:00', '2022-02-03 16:00:00', '2003-02-22 12:57:19'),
(2, 'Not Occupied', '', '', '00:00:00', '2022-02-03 16:50:00', '2022-02-03 16:24:27'),
(3, 'Not Occupied', '', '', '00:00:00', '2022-02-03 16:17:00', '2022-02-03 16:17:01'),
(4, 'Not Occupied', '', '', '00:00:00', '2022-02-02 00:00:00', '2022-02-03 14:50:21'),
(5, 'Not Occupied', '', '', '00:00:00', '2022-02-03 00:00:00', '2022-02-03 15:05:36'),
(7, 'Not Occupied', '', '', '00:00:00', '2022-01-28 00:00:00', '2022-02-03 14:50:21'),
(8, 'Not Occupied', '', '76', '00:00:00', '0000-00-00 00:00:00', '2022-02-03 14:50:21'),
(11, 'Not Occupied', '', '82', '00:00:00', '2022-01-28 00:00:00', '2022-02-03 14:50:21'),
(12, 'Not Occupied', '', '47', '00:00:00', '2022-01-28 00:00:00', '2022-02-03 14:50:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`SeatId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `SeatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
