-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 09:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `amcid` int(20) NOT NULL,
  `customerid` int(20) NOT NULL,
  `amctypeid` int(5) NOT NULL,
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
(1, 1, 1, '2020-06-18', 3, 2, 16, 18000);

--
-- Triggers `amc`
--
DELIMITER $$
CREATE TRIGGER `define_services` AFTER INSERT ON `amc` FOR EACH ROW BEGIN
    DECLARE sdate date;
    DECLARE day,x int;
    SET day = (new.period*365)/(new.totalservices);
    set x = 1 ;
   	while x <= new.totalservices do
    	SET sdate = DATE_ADD(new.fromdate, INTERVAL day*x DAY);
    	INSERT INTO service(amcid, date, status) VALUES (new.amcid, sdate, 'OPEN'); 
     	set x=x+1;
    end while ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `amc_type`
--

CREATE TABLE `amc_type` (
  `amctypeid` int(5) NOT NULL,
  `amctype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amc_type`
--

INSERT INTO `amc_type` (`amctypeid`, `amctype`) VALUES
(1, 'PREVENTIVE'),
(2, 'WARRANTY');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintid` int(20) NOT NULL,
  `customerid` int(20) NOT NULL,
  `amcid` int(20) NOT NULL,
  `date` date NOT NULL,
  `complainttypeid` int(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintid`, `customerid`, `amcid`, `date`, `complainttypeid`, `status`) VALUES
(1, 1, 1, '1999-05-05', 1, 'CLOSED'),
(2, 1, 1, '0555-05-05', 1, 'OPEN'),
(3, 1, 1, '2020-06-06', 1, 'OPEN'),
(4, 1, 1, '2020-06-24', 1, 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_report`
--

CREATE TABLE `complaint_report` (
  `complaintid` int(20) NOT NULL,
  `defectobserved` varchar(1000) NOT NULL,
  `actiontaken` varchar(1000) NOT NULL,
  `partsreplaced` varchar(1000) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `linevoltage` float NOT NULL,
  `grilltemp` float NOT NULL,
  `current` float NOT NULL,
  `roomtemp` float NOT NULL,
  `timefrom` datetime NOT NULL,
  `timeto` datetime NOT NULL,
  `mechanicremarks` varchar(1000) NOT NULL,
  `mechanicname` varchar(100) NOT NULL,
  `customerremarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_report`
--

INSERT INTO `complaint_report` (`complaintid`, `defectobserved`, `actiontaken`, `partsreplaced`, `remarks`, `linevoltage`, `grilltemp`, `current`, `roomtemp`, `timefrom`, `timeto`, `mechanicremarks`, `mechanicname`, `customerremarks`) VALUES
(1, '', '', '', '', 0, 0, 0, 0, '2020-06-12 12:52:00', '0000-00-00 00:00:00', '', 'OPEN', ''),
(2, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'OPEN', ''),
(3, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'OPEN', ''),
(4, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'OPEN', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `complainttypeid` int(5) NOT NULL,
  `complainttype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`complainttypeid`, `complainttype`) VALUES
(1, 'ICE FORMATION');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `billingname` varchar(50) NOT NULL,
  `placeid` int(5) NOT NULL,
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
(1, 'jinesh@example.com', 'SBI_CTM', 1, 'Mr', 'Manager', '123456789', '987654321', 'GICT building', 'Ahmedabad', 'India', '380006', 'mrmanager@sbi.com'),
(2, 'jinesh@example.com', 'BOB-meet', 1, 'mee', 'modi', '7987965453', '65465645645', 'a;SGB', 'AHD', 'GUJ', '380001', 'meetmodi8@gmail.com');

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
('jinesh@example.com', 'Jinesh', 'Patel', '$2y$10$bfVowEoz067gqoS5Br9VYugHSjrHLRPhV8LBIUtPSgwW/3KFPiVX2');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ownership`
--

CREATE TABLE `ownership` (
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `paymentmodeid` int(11) NOT NULL,
  `paymentmode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `placeid` int(5) NOT NULL,
  `placetype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`placeid`, `placetype`) VALUES
(1, 'BANK'),
(2, 'CORPORATE');

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

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(11) NOT NULL,
  `amcid` int(11) NOT NULL,
  `date` date NOT NULL,
  `handledby` varchar(30) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `amcid`, `date`, `handledby`, `remarks`, `status`) VALUES
(1, 1, '2020-08-03', '', '', 'OPEN'),
(2, 1, '2020-09-18', '', '', 'OPEN'),
(3, 1, '2020-11-03', '', '', 'OPEN'),
(4, 1, '2020-12-19', '', '', 'OPEN'),
(5, 1, '2021-02-03', '', '', 'OPEN'),
(6, 1, '2021-03-21', '', '', 'OPEN'),
(7, 1, '2021-05-06', '', '', 'OPEN'),
(8, 1, '2021-06-21', '', '', 'OPEN'),
(9, 1, '2021-08-06', '', '', 'OPEN'),
(10, 1, '2021-09-21', '', '', 'OPEN'),
(11, 1, '2021-11-06', '', '', 'OPEN'),
(12, 1, '2021-12-22', '', '', 'OPEN'),
(13, 1, '2022-02-06', '', '', 'OPEN'),
(14, 1, '2022-03-24', '', '', 'OPEN'),
(15, 1, '2022-05-09', '', '', 'OPEN'),
(16, 1, '2022-06-24', '', '', 'OPEN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amc`
--
ALTER TABLE `amc`
  ADD PRIMARY KEY (`amcid`),
  ADD UNIQUE KEY `customerid` (`customerid`,`amctypeid`,`fromdate`,`period`,`quantity`,`totalservices`) USING BTREE,
  ADD KEY `amctypeid` (`amctypeid`);

--
-- Indexes for table `amc_type`
--
ALTER TABLE `amc_type`
  ADD PRIMARY KEY (`amctypeid`),
  ADD UNIQUE KEY `amctype` (`amctype`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintid`),
  ADD UNIQUE KEY `customerid` (`customerid`,`amcid`,`date`,`complainttypeid`) USING BTREE,
  ADD KEY `amcid` (`amcid`),
  ADD KEY `complainttypeid` (`complainttypeid`);

--
-- Indexes for table `complaint_report`
--
ALTER TABLE `complaint_report`
  ADD UNIQUE KEY `complaintid` (`complaintid`);

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`complainttypeid`),
  ADD UNIQUE KEY `complainttype` (`complainttype`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`),
  ADD UNIQUE KEY `billingname` (`billingname`),
  ADD KEY `userid` (`userid`),
  ADD KEY `placeid` (`placeid`);

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
  ADD KEY `payment_ibfk_1` (`customerid`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`paymentmodeid`),
  ADD UNIQUE KEY `paymentmode` (`paymentmode`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`placeid`),
  ADD UNIQUE KEY `placetype` (`placetype`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `modelno` (`modelno`,`productcompany`,`producttype`,`capacity`,`rating`) USING BTREE;

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceid`),
  ADD KEY `amcid` (`amcid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amc`
--
ALTER TABLE `amc`
  MODIFY `amcid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amc_type`
--
ALTER TABLE `amc_type`
  MODIFY `amctypeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `complainttypeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `paymentmodeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `placeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amc`
--
ALTER TABLE `amc`
  ADD CONSTRAINT `amc_ibfk_1` FOREIGN KEY (`amctypeid`) REFERENCES `amc_type` (`amctypeid`),
  ADD CONSTRAINT `amc_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`amcid`) REFERENCES `amc` (`amcid`),
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`),
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`complainttypeid`) REFERENCES `complaint_type` (`complainttypeid`);

--
-- Constraints for table `complaint_report`
--
ALTER TABLE `complaint_report`
  ADD CONSTRAINT `complaint_report_ibfk_1` FOREIGN KEY (`complaintid`) REFERENCES `complaint` (`complaintid`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `employee` (`userid`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`placeid`) REFERENCES `place` (`placeid`);

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

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`amcid`) REFERENCES `amc` (`amcid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
