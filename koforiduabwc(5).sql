-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:3306
-- Generation Time: Dec 14, 2022 at 03:27 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koforiduabwc`
--

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `dues_id` int(10) NOT NULL,
  `grouptype` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `Year` int(100) NOT NULL,
  `memberid` int(10) NOT NULL,
  `dateofpayment` date NOT NULL,
  `AdminID` int(10) NOT NULL,
  `ApprovedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`dues_id`, `grouptype`, `amount`, `month`, `Year`, `memberid`, `dateofpayment`, `AdminID`, `ApprovedBy`) VALUES
(12, 'Adom', 10, 'January', 2022, 23, '2022-12-13', 10, 'Juls');

-- --------------------------------------------------------

--
-- Table structure for table `funerals`
--

CREATE TABLE `funerals` (
  `funeral_id` int(10) NOT NULL,
  `funeral_name` varchar(100) NOT NULL,
  `funeral_date` date NOT NULL,
  `deceased_status` varchar(100) NOT NULL,
  `deceased_group` varchar(100) NOT NULL,
  `funeral_region` varchar(100) NOT NULL,
  `funeral_month` varchar(100) NOT NULL,
  `funeral_location` varchar(100) NOT NULL,
  `AdminID` int(10) NOT NULL,
  `AddedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funerals`
--

INSERT INTO `funerals` (`funeral_id`, `funeral_name`, `funeral_date`, `deceased_status`, `deceased_group`, `funeral_region`, `funeral_month`, `funeral_location`, `AdminID`, `AddedBy`) VALUES
(7, 'Mr. XYZ Funeral', '2022-12-17', 'Not a Member', 'Not Applicable', 'BONO EAST', 'January', 'Location lostic', 8, 'Emmanuel'),
(8, 'Mr. Mansssss', '2022-12-17', 'Member', 'Second Chance', 'SAVANNAH', 'January', 'Location lostic', 8, 'Emmanuel');

-- --------------------------------------------------------

--
-- Table structure for table `funeral_contributions`
--

CREATE TABLE `funeral_contributions` (
  `contribution_id` int(10) NOT NULL,
  `funeral_name` varchar(100) NOT NULL,
  `grouptype` varchar(100) NOT NULL,
  `deceased_status` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `memberid` int(11) NOT NULL,
  `contribution_date` date NOT NULL,
  `month` varchar(100) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `ApprovedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MemberID` int(10) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Grouptype` varchar(100) NOT NULL,
  `AdminID` int(10) NOT NULL,
  `AddedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `Firstname`, `Lastname`, `Contact`, `Gender`, `Grouptype`, `AdminID`, `AddedBy`) VALUES
(23, 'Emmanuel', 'King', '+233242521565', 'Male', 'Adom', 9, 'Mary'),
(25, 'Godfred', 'Asante', '+233242521565', 'Male', 'Second Chance', 9, 'Mary');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Firstname`, `Lastname`, `Username`, `Contact`, `Password`, `usertype`) VALUES
(8, 'Emma', 'Odonks', 'Emmanuel', '+233550805562', 'b5e3fc8136ce8649ccb29ae5031b8776', 'Admin'),
(9, 'Mary', 'Vlad', 'Mary', '+233242521565', 'e8d87c0a22221778a7de706d1f05ad0f', 'Admin'),
(10, 'Julius', 'Opoku', 'Juls', '+233550805562', 'df519937548171759693c14026c7b871', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`dues_id`);

--
-- Indexes for table `funerals`
--
ALTER TABLE `funerals`
  ADD PRIMARY KEY (`funeral_id`);

--
-- Indexes for table `funeral_contributions`
--
ALTER TABLE `funeral_contributions`
  ADD PRIMARY KEY (`contribution_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `dues_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `funerals`
--
ALTER TABLE `funerals`
  MODIFY `funeral_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `funeral_contributions`
--
ALTER TABLE `funeral_contributions`
  MODIFY `contribution_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
