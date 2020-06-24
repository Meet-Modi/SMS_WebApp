-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 08:04 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_today_service` (IN `param` DATE)  NO SQL
BEGIN
DECLARE var integer(20);
SET var = (SELECT
    amc.customerid
FROM amc
INNER JOIN service ON amc.amcid=(SELECT service.amcid WHERE service.date = param));
SELECT customer.billingname FROM customer WHERE customer.customerid IN (var);
END$$

DELIMITER ;

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
(1, 1, 1, '2020-06-18', 3, 2, 16, 18000),
(2, 2, 1, '2020-06-09', 2, 66, 26, 180),
(3, 1, 1, '2010-06-19', 2, 6, 16, 1800),
(4, 1, 1, '2020-06-12', 2, 6, 16, 1800),
(5, 2, 2, '2020-06-23', 2, 2, 16, 10);

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
(1, 1, 3, '1999-05-05', 1, 'CLOSED'),
(2, 1, 1, '0555-05-05', 1, 'OPEN'),
(3, 1, 1, '2020-06-06', 1, 'OPEN'),
(4, 1, 1, '2020-06-24', 1, 'OPEN'),
(5, 2, 2, '2020-06-11', 1, 'OPEN'),
(6, 1, 1, '2020-06-12', 7, 'OPEN'),
(7, 2, 2, '2020-07-23', 1, 'OPEN'),
(8, 1, 3, '2020-06-20', 1, 'OPEN'),
(9, 2, 5, '2020-06-26', 1, 'OPEN');

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
(1, '', '', '', '', 0, 0, 0, 0, '2020-06-12 12:52:00', '0000-00-00 00:00:00', '', 'Late ltif', ''),
(2, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'OPEN', ''),
(3, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'OPEN', ''),
(4, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'OPEN', ''),
(5, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'OPEN', ''),
(6, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'OPEN', ''),
(7, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(8, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(9, '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '');

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
(7, 'GAS LEAKAGE'),
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
(1, 'jinesh@example.com', 'SBI_CTM', 1, 'meet', 'modi', '123456789', '987654321', 'Ankleshwar', 'Ahmedabad', 'Gujarat', '380001', 'meetmodi8@gmail.com'),
(2, 'jinesh@example.com', 'BOB-meet', 1, 'mee', 'modi', '7987965453', '65465645645', 'a;SGB', 'AHD', 'GUJ', '380001', 'meetmodi8@gmail.com'),
(4, 'saransh@example.com', 'aseasse', 1, 'MEet', 'Modi', '123456789', '987654321', '1687', 'assxa', 'asxaxa', '123456', 'meetmodi8@uadud.com');

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
('jinesh@example.com', 'Jinesh', 'Patel', '$2y$10$bfVowEoz067gqoS5Br9VYugHSjrHLRPhV8LBIUtPSgwW/3KFPiVX2'),
('meet@example.com', 'meet', 'modi', '$2y$10$xO9R6BkM8Wvi2HUtlAXFVu8Y8T2faMimBnuPr2dzNqiPKk839wxSC');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`id`, `name`, `age`) VALUES
(1, 'Late ltif', 49),
(2, 'aalsu pir', 12);

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
(2, 22, 1),
(2, 23, 5),
(4, 22, 1),
(4, 23, 1);

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
(2, 'CORPORATE'),
(3, 'HOME/RESIDENCE'),
(4, 'OFFICE');

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
(22, 'asafdsc', 'DAIKIN', 'WINDOW', 1, 3),
(23, 'zxvxcvcd', 'DAIKIN', 'WINDOW', 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(20) NOT NULL,
  `amcid` int(20) NOT NULL,
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
(3, 1, '2020-08-03', '', '', 'OPEN'),
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
(16, 1, '2022-06-24', '', '', 'OPEN'),
(20, 1, '2020-09-18', 'nobody', '', 'OPEN'),
(21, 2, '2020-07-07', 'Late ltif', '', 'OPEN'),
(22, 2, '2020-08-03', '', '', 'OPEN'),
(23, 2, '2020-09-01', '', '', 'OPEN'),
(24, 2, '2020-09-29', '', '', 'OPEN'),
(25, 2, '2020-10-27', '', '', 'OPEN'),
(26, 2, '2020-11-24', '', '', 'OPEN'),
(27, 2, '2020-12-22', '', '', 'OPEN'),
(28, 2, '2021-01-19', '', '', 'OPEN'),
(29, 2, '2021-02-16', '', '', 'OPEN'),
(30, 2, '2021-03-16', '', '', 'OPEN'),
(31, 2, '2021-04-13', '', '', 'OPEN'),
(32, 2, '2021-05-11', '', '', 'OPEN'),
(33, 2, '2021-06-08', '', '', 'OPEN'),
(34, 2, '2021-07-06', '', '', 'OPEN'),
(35, 2, '2021-08-03', '', '', 'OPEN'),
(36, 2, '2021-08-31', '', '', 'OPEN'),
(37, 2, '2021-09-28', '', '', 'OPEN'),
(38, 2, '2021-10-26', '', '', 'OPEN'),
(39, 2, '2021-11-23', '', '', 'OPEN'),
(40, 2, '2021-12-21', '', '', 'OPEN'),
(41, 2, '2022-01-18', '', '', 'OPEN'),
(42, 2, '2022-02-15', '', '', 'OPEN'),
(43, 2, '2022-03-15', '', '', 'OPEN'),
(44, 2, '2022-04-12', '', '', 'OPEN'),
(45, 2, '2022-05-10', '', '', 'OPEN'),
(46, 2, '2022-06-07', '', '', 'OPEN'),
(47, 3, '2010-08-04', '', '', 'OPEN'),
(48, 3, '2010-09-19', '', '', 'OPEN'),
(49, 3, '2010-11-04', '', '', 'OPEN'),
(50, 3, '2010-12-20', '', '', 'OPEN'),
(51, 3, '2011-02-04', '', '', 'OPEN'),
(52, 3, '2011-03-22', '', '', 'OPEN'),
(53, 3, '2011-05-07', '', '', 'OPEN'),
(54, 3, '2011-06-22', '', '', 'OPEN'),
(55, 3, '2011-08-07', '', '', 'OPEN'),
(56, 3, '2011-09-22', '', '', 'OPEN'),
(57, 3, '2011-11-07', '', '', 'OPEN'),
(58, 3, '2011-12-23', '', '', 'OPEN'),
(59, 3, '2012-02-07', '', '', 'OPEN'),
(60, 3, '2012-03-24', '', '', 'OPEN'),
(61, 3, '2012-05-09', '', '', 'OPEN'),
(62, 3, '2012-06-24', '', '', 'OPEN'),
(63, 4, '2020-07-28', '', '', 'OPEN'),
(64, 4, '2020-09-12', '', '', 'OPEN'),
(65, 4, '2020-10-28', '', '', 'OPEN'),
(66, 4, '2020-12-13', '', '', 'OPEN'),
(67, 4, '2021-01-28', '', '', 'OPEN'),
(68, 4, '2021-03-15', '', '', 'OPEN'),
(69, 4, '2021-04-30', '', '', 'OPEN'),
(70, 4, '2021-06-15', '', '', 'OPEN'),
(71, 4, '2021-07-31', '', '', 'OPEN'),
(72, 4, '2021-09-15', '', '', 'OPEN'),
(73, 4, '2021-10-31', '', '', 'OPEN'),
(74, 4, '2021-12-16', '', '', 'OPEN'),
(75, 4, '2022-01-31', '', '', 'OPEN'),
(76, 4, '2022-03-18', '', '', 'OPEN'),
(77, 4, '2022-05-03', '', '', 'OPEN'),
(78, 4, '2022-06-18', '', '', 'OPEN'),
(79, 5, '2020-08-08', '', '', 'OPEN'),
(80, 5, '2020-09-23', '', '', 'OPEN'),
(81, 5, '2020-11-08', '', '', 'OPEN'),
(82, 5, '2020-12-24', '', '', 'OPEN'),
(83, 5, '2021-02-08', '', '', 'OPEN'),
(84, 5, '2021-03-26', '', '', 'OPEN'),
(85, 5, '2021-05-11', '', '', 'OPEN'),
(86, 5, '2021-06-26', '', '', 'OPEN'),
(87, 5, '2021-08-11', '', '', 'OPEN'),
(88, 5, '2021-09-26', '', '', 'OPEN'),
(89, 5, '2021-11-11', '', '', 'OPEN'),
(90, 5, '2021-12-27', '', '', 'OPEN'),
(91, 5, '2022-02-11', '', '', 'OPEN'),
(92, 5, '2022-03-29', '', '', 'OPEN'),
(93, 5, '2022-05-14', '', '', 'OPEN'),
(94, 5, '2022-06-29', '', '', 'OPEN');

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
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `amcid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `amc_type`
--
ALTER TABLE `amc_type`
  MODIFY `amctypeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `complainttypeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `placeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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
