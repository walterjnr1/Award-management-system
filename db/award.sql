-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 02:21 PM
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
-- Database: `award`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `ID` int(7) NOT NULL,
  `candName` varchar(44) NOT NULL,
  `userid` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `category` varchar(45) NOT NULL,
  `photo` varchar(5500) NOT NULL,
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`ID`, `candName`, `userid`, `phone`, `dept`, `category`, `photo`, `count`) VALUES
(10, 'Nse Walker', 'escobar2012', '08067361023', 'Computer Science', 'Best dress Lecturer', 'uploadImage/eddy passport.jpg', 0),
(11, 'Namso John', '786562', '0806575432', 'Mass Communication', 'Best dress Lecturer', 'uploadImage/avatar6.jpg', 1),
(12, 'Emem Sampson', '7987865', '0806575432', 'Mass Communication', 'Lecturer of the year', 'uploadImage/avatar1.jpg', 0),
(13, 'Idara Ikpatan', '79878657', '0806575432', 'Mass Communication', 'Lecturer of the year', 'uploadImage/Yomi-Adegoke_R.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(5) NOT NULL,
  `name` varchar(3000) NOT NULL,
  `description` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `name`, `description`) VALUES
(9, 'Best dress Lecturer', 'This category is for Best dress Lecturer both Male and female in foundation polytechnic with a good dress sense. '),
(10, 'Lecturer of the year', 'This category is for a lecturer that is always punctual to classes, friendly with students and respect his boundaries.');

-- --------------------------------------------------------

--
-- Table structure for table `tblregister`
--

CREATE TABLE `tblregister` (
  `ID` int(4) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `user_type` varchar(9) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `date_reg` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL,
  `photo` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblregister`
--

INSERT INTO `tblregister` (`ID`, `fullname`, `userid`, `password`, `email`, `sex`, `dob`, `user_type`, `dept`, `date_reg`, `status`, `photo`) VALUES
(1, 'Emem Usoro Joseph', '36303-1234567-8', '12345678', 'ibra@yahoo.com', 'Female', '02/08/2023', 'Student', 'Mass Communication', '2023-08-26 06:09:01', '0', 'uploadImage/default.jpg'),
(2, 'Candid Gleseme ', '340', 'escobar2012', 'newleastpaysolution@gmail.com', 'Male', '2023-08-11', 'Lecturer', 'Computer Science', '2023-08-26 06:13:26', '1', 'uploadImage/didi.jpg'),
(3, 'Victor Nyah', '36303-1234567-8wrwe', 'escobar2012', 'ibra@yahoo.comw', 'Female', '01/08/2023', 'Student', 'Mass Communication', '2023-08-26 06:52:35', '1', 'uploadImage/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `fullname` varchar(34) NOT NULL,
  `photo` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `phone`, `fullname`, `photo`) VALUES
('walterjnr1', 'escobar2012', '08067361023', 'Ndueso Walter ', 'uploadImage/11.png');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `ID` int(5) NOT NULL,
  `voter_userid` varchar(15) NOT NULL,
  `cand_userid` varchar(15) NOT NULL,
  `category` varchar(1500) NOT NULL,
  `voting_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`ID`, `voter_userid`, `cand_userid`, `category`, `voting_date`) VALUES
(4, '340', '786562 ', 'Best dress Lecturer', '2023-08-28 07:53:01'),
(5, '340', '79878657 ', 'Lecturer of the year', '2023-08-28 07:53:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblregister`
--
ALTER TABLE `tblregister`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblregister`
--
ALTER TABLE `tblregister`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
