-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 06:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `password`) VALUES
('admin', 'sde@123$');

-- --------------------------------------------------------

--
-- Table structure for table `amc`
--

CREATE TABLE `amc` (
  `amcid` varchar(20) NOT NULL,
  `customerid` varchar(20) NOT NULL,
  `amctypeid` varchar(5) NOT NULL,
  `fromdate` date NOT NULL,
  `period` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalservices` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amc`
--

INSERT INTO `amc` (`amcid`, `customerid`, `amctypeid`, `fromdate`, `period`, `quantity`, `totalservices`, `amount`) VALUES
('1', '1', '1', '2020-01-01', 8, 6, 16, 24000),
('2', '2', '3', '2019-01-12', 2, 4, 4, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `amc_type`
--

CREATE TABLE `amc_type` (
  `amctypeid` varchar(5) NOT NULL,
  `amctype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amc_type`
--

INSERT INTO `amc_type` (`amctypeid`, `amctype`) VALUES
('1', 'PREVENTIVE'),
('3', 'WARRENTY');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintid` int(20) NOT NULL,
  `customerid` int(20) NOT NULL,
  `complainttypeid` int(5) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complain_type`
--

CREATE TABLE `complain_type` (
  `complaintypeid` int(5) NOT NULL,
  `complaintype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `billingname` varchar(50) NOT NULL,
  `placeid` varchar(5) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `contactno1` varchar(15) NOT NULL,
  `contactno2` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `userid`, `billingname`, `placeid`, `firstname`, `lastname`, `contactno1`, `contactno2`, `address`, `city`, `state`, `pincode`, `email`) VALUES
(1, 'jinesh@example.com', 'SBI_CTM', '1', 'ABC', 'XYZ', '123456', '654321', 'MAHADEVNAGAR TEKRA', 'Ahmedabad', 'GUJARAT', '382418', 'ABC@XYZ.com'),
(2, 'jinesh@example.com', 'SBI', '2', 'GHI', 'PQR', '456456456', '323323323', 'aasdfgdv', 'ahmedabad', 'gujarat', '654321', 'XYZ@ABC.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `userid` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`userid`, `firstname`, `lastname`, `password`) VALUES
('jinesh@example.com', 'Jinesh', 'Patel', '$2y$10$/MQxZYe2UguG.ZXXhu/YWukn6no5M5b5lxZ65lKB.jfZILnFQuwCu');

-- --------------------------------------------------------

--
-- Table structure for table `ownership`
--

CREATE TABLE `ownership` (
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ownership`
--

INSERT INTO `ownership` (`customerid`, `productid`, `quantity`) VALUES
(1, 1, 2),
(1, 2, 3),
(1, 5, 10),
(2, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `invoiceno` varchar(20) NOT NULL,
  `paymentmodeid` int(11) NOT NULL,
  `receiveddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `customerid`, `invoiceno`, `paymentmodeid`, `receiveddate`, `status`, `amount`) VALUES
(1, 1, '123465', 1, '2020-05-29', 'Pending', 5000),
(2, 2, '789456', 2, '2020-05-29', 'PAID', 8000),
(3, 2, '789213', 2, '2020-04-29', 'Pending', 4000),
(4, 2, '7894456', 2, '2020-04-29', 'Pending', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `paymentmodeid` int(11) NOT NULL,
  `paymentmode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`paymentmodeid`, `paymentmode`) VALUES
(1, 'CHEQUE'),
(2, 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `placeid` varchar(5) NOT NULL,
  `placetype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`placeid`, `placetype`) VALUES
('1', 'BANK'),
('2', 'HOME/RESIDENCE');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `modelno` varchar(20) NOT NULL,
  `productcompany` varchar(30) NOT NULL,
  `producttype` varchar(30) NOT NULL,
  `capacity` float NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `modelno`, `productcompany`, `producttype`, `capacity`, `rating`) VALUES
(1, 'XSF-155F', 'HITACHI', 'SPLIT', 1, 3.5),
(2, 'FZX-123F', 'DAIKIN', 'WINDOW', 4, 4),
(4, 'ABC-322F', 'DAIKIN', 'SPLIT', 5, 2),
(5, 'ABD-322F', 'DAIKIN', 'SPLIT', 5, 2),
(6, 'ABZ322F', 'DAIKIN', 'SPLIT', 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amc`
--
ALTER TABLE `amc`
  ADD PRIMARY KEY (`amcid`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintid`);

--
-- Indexes for table `complain_type`
--
ALTER TABLE `complain_type`
  ADD PRIMARY KEY (`complaintypeid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `ownership`
--
ALTER TABLE `ownership`
  ADD UNIQUE KEY `customerid` (`customerid`,`productid`) USING BTREE,
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD UNIQUE KEY `invoiceno` (`invoiceno`),
  ADD KEY `paymentmodeid` (`paymentmodeid`),
  ADD KEY `payment_ibfk_1` (`customerid`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`paymentmodeid`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`placeid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `modelno` (`modelno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintid` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complain_type`
--
ALTER TABLE `complain_type`
  MODIFY `complaintypeid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `paymentmodeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ownership`
--
ALTER TABLE `ownership`
  ADD CONSTRAINT `ownership_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`),
  ADD CONSTRAINT `ownership_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
