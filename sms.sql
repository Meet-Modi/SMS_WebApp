-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 06:07 PM
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
-- Database: `asg2`
--
CREATE DATABASE IF NOT EXISTS `asg2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `asg2`;

-- --------------------------------------------------------

--
-- Table structure for table `advisor_076`
--

CREATE TABLE `advisor_076` (
  `s_id` varchar(10) NOT NULL,
  `i_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor_076`
--

INSERT INTO `advisor_076` (`s_id`, `i_id`) VALUES
('AU1741072', '10161'),
('AU1741073', '20162'),
('AU1741074', '30163'),
('AU1741075', '40164'),
('AU1741076', '50165');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_076`
--

CREATE TABLE `classroom_076` (
  `building` varchar(10) NOT NULL,
  `room_no` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_076`
--

INSERT INTO `classroom_076` (`building`, `room_no`, `capacity`) VALUES
('AMSOM', 202, 110),
('HL', 204, 120),
('LMP', 205, 150),
('MG', 203, 130),
('SEAS', 201, 100);

-- --------------------------------------------------------

--
-- Table structure for table `course_076`
--

CREATE TABLE `course_076` (
  `course_id` varchar(6) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `dept_name` varchar(15) DEFAULT NULL,
  `credits` decimal(5,0) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_076`
--

INSERT INTO `course_076` (`course_id`, `title`, `dept_name`, `credits`) VALUES
('COM105', 'ETHICS', 'MG', '4'),
('DB101', 'DBMS', 'SEAS', '3'),
('EC101', 'STATISTIC', 'AMSOM', '3'),
('EC201', 'ECONOMICS', 'HL', '4'),
('MAT201', 'PRP', 'LMP', '4');

-- --------------------------------------------------------

--
-- Table structure for table `department_076`
--

CREATE TABLE `department_076` (
  `dept_name` varchar(15) NOT NULL,
  `building` varchar(10) DEFAULT NULL,
  `budget` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_076`
--

INSERT INTO `department_076` (`dept_name`, `building`, `budget`) VALUES
('AMSOM', 'amsom', 90000),
('HL', 'hl', 120000),
('LMP', 'lmp', 10000),
('MG', 'mg', 50000),
('SEAS', 'seas', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_076`
--

CREATE TABLE `instructor_076` (
  `ID` varchar(10) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `dept_name` varchar(15) DEFAULT NULL,
  `salary` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_076`
--

INSERT INTO `instructor_076` (`ID`, `name`, `dept_name`, `salary`) VALUES
('10161', 'NISARG', 'SEAS', 10000),
('20162', 'KAVYAA', 'AMSOM', 120000),
('30163', 'KAUSHA', 'LMP', 80000),
('40164', 'AAKASH', 'MG', 95000),
('50165', 'RAHUL', 'HL', 105000);

-- --------------------------------------------------------

--
-- Table structure for table `prereq_076`
--

CREATE TABLE `prereq_076` (
  `course_id` varchar(8) NOT NULL,
  `prereq_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prereq_076`
--

INSERT INTO `prereq_076` (`course_id`, `prereq_id`) VALUES
('COM105', 'COM105'),
('DB101', 'DB101'),
('EC101', 'EC101'),
('EC201', 'EC201'),
('MAT201', 'MAT201');

-- --------------------------------------------------------

--
-- Table structure for table `section_076`
--

CREATE TABLE `section_076` (
  `course_id` varchar(8) NOT NULL,
  `sec_id` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` decimal(10,0) NOT NULL,
  `building` varchar(10) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `time_slot_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_076`
--

INSERT INTO `section_076` (`course_id`, `sec_id`, `semester`, `year`, `building`, `room_no`, `time_slot_id`) VALUES
('COM105', '5', 5, '2015', 'SEAS', 201, '1115'),
('DB101', '1', 1, '2011', 'AMSOM', 202, '1111'),
('EC101', '3', 3, '2013', 'LMP', 205, '1113'),
('EC201', '2', 2, '2012', 'HL', 204, '1112'),
('MAT201', '4', 4, '2014', 'MG', 203, '1114');

-- --------------------------------------------------------

--
-- Table structure for table `student_076`
--

CREATE TABLE `student_076` (
  `ID` varchar(10) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `dept_name` varchar(15) DEFAULT NULL,
  `tot_cred` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_076`
--

INSERT INTO `student_076` (`ID`, `name`, `dept_name`, `tot_cred`) VALUES
('AU1741072', 'GAURAV', 'LMP', '69'),
('AU1741073', 'HITESH', 'HL', '79'),
('AU1741074', 'ARPIT', 'MG', '76'),
('AU1741075', 'DEVSHREE', 'AMSOM', '68'),
('AU1741076', 'JINESH', 'SEAS', '80');

-- --------------------------------------------------------

--
-- Table structure for table `takes_076`
--

CREATE TABLE `takes_076` (
  `ID` varchar(10) NOT NULL,
  `course_id` varchar(8) NOT NULL,
  `sec_id` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` decimal(10,0) NOT NULL,
  `grade` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takes_076`
--

INSERT INTO `takes_076` (`ID`, `course_id`, `sec_id`, `semester`, `year`, `grade`) VALUES
('AU1741072', 'DB101', '1', 1, '2011', 'A'),
('AU1741073', 'EC201', '2', 2, '2012', 'F'),
('AU1741074', 'EC101', '3', 3, '2013', 'B'),
('AU1741075', 'COM105', '5', 5, '2015', 'D'),
('AU1741076', 'MAT201', '4', 4, '2014', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `teaches_076`
--

CREATE TABLE `teaches_076` (
  `ID` varchar(10) NOT NULL,
  `course_id` varchar(8) NOT NULL,
  `sec_id` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_slot_076`
--

CREATE TABLE `time_slot_076` (
  `time_slot_id` varchar(10) NOT NULL,
  `day` varchar(10) DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot_076`
--

INSERT INTO `time_slot_076` (`time_slot_id`, `day`, `start_time`, `end_time`) VALUES
('1111', 'Tuesday', '2009-00-05 00:00:00', '2009-10-05 00:00:00'),
('1112', 'Monday', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1113', 'Thursday', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1114', 'Friday', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1115', 'Monday', '2011-00-05 00:00:00', '2011-10-05 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor_076`
--
ALTER TABLE `advisor_076`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk_cnt_27` (`i_id`);

--
-- Indexes for table `classroom_076`
--
ALTER TABLE `classroom_076`
  ADD PRIMARY KEY (`building`,`room_no`);

--
-- Indexes for table `course_076`
--
ALTER TABLE `course_076`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk_cnt_1` (`dept_name`);

--
-- Indexes for table `department_076`
--
ALTER TABLE `department_076`
  ADD PRIMARY KEY (`dept_name`),
  ADD UNIQUE KEY `unic_department` (`dept_name`);

--
-- Indexes for table `instructor_076`
--
ALTER TABLE `instructor_076`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unic_instructor` (`dept_name`);

--
-- Indexes for table `prereq_076`
--
ALTER TABLE `prereq_076`
  ADD PRIMARY KEY (`course_id`,`prereq_id`);

--
-- Indexes for table `section_076`
--
ALTER TABLE `section_076`
  ADD PRIMARY KEY (`course_id`,`sec_id`,`semester`,`year`),
  ADD KEY `fk_cnt_4` (`building`,`room_no`),
  ADD KEY `fk_cnt_5` (`time_slot_id`);

--
-- Indexes for table `student_076`
--
ALTER TABLE `student_076`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_cnt` (`dept_name`);

--
-- Indexes for table `takes_076`
--
ALTER TABLE `takes_076`
  ADD PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semester`,`year`),
  ADD KEY `fk_cnt_7` (`course_id`,`sec_id`,`semester`,`year`);

--
-- Indexes for table `teaches_076`
--
ALTER TABLE `teaches_076`
  ADD PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semester`,`year`);

--
-- Indexes for table `time_slot_076`
--
ALTER TABLE `time_slot_076`
  ADD PRIMARY KEY (`time_slot_id`,`start_time`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisor_076`
--
ALTER TABLE `advisor_076`
  ADD CONSTRAINT `fk_cnt_26` FOREIGN KEY (`s_id`) REFERENCES `student_076` (`ID`),
  ADD CONSTRAINT `fk_cnt_27` FOREIGN KEY (`i_id`) REFERENCES `instructor_076` (`ID`);

--
-- Constraints for table `course_076`
--
ALTER TABLE `course_076`
  ADD CONSTRAINT `fk_cnt_1` FOREIGN KEY (`dept_name`) REFERENCES `department_076` (`dept_name`);

--
-- Constraints for table `instructor_076`
--
ALTER TABLE `instructor_076`
  ADD CONSTRAINT `fk_cnt_2` FOREIGN KEY (`dept_name`) REFERENCES `department_076` (`dept_name`);

--
-- Constraints for table `section_076`
--
ALTER TABLE `section_076`
  ADD CONSTRAINT `fk_cnt_3` FOREIGN KEY (`course_id`) REFERENCES `course_076` (`course_id`),
  ADD CONSTRAINT `fk_cnt_4` FOREIGN KEY (`building`,`room_no`) REFERENCES `classroom_076` (`building`, `room_no`),
  ADD CONSTRAINT `fk_cnt_5` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slot_076` (`time_slot_id`);

--
-- Constraints for table `student_076`
--
ALTER TABLE `student_076`
  ADD CONSTRAINT `fk_cnt` FOREIGN KEY (`dept_name`) REFERENCES `department_076` (`dept_name`);

--
-- Constraints for table `takes_076`
--
ALTER TABLE `takes_076`
  ADD CONSTRAINT `fk_cnt_6` FOREIGN KEY (`ID`) REFERENCES `student_076` (`ID`),
  ADD CONSTRAINT `fk_cnt_7` FOREIGN KEY (`course_id`,`sec_id`,`semester`,`year`) REFERENCES `section_076` (`course_id`, `sec_id`, `semester`, `year`);

--
-- Constraints for table `teaches_076`
--
ALTER TABLE `teaches_076`
  ADD CONSTRAINT `fk_cnt_10` FOREIGN KEY (`ID`) REFERENCES `instructor_076` (`ID`);
--
-- Database: `asg6`
--
CREATE DATABASE IF NOT EXISTS `asg6` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `asg6`;
--
-- Database: `asg7`
--
CREATE DATABASE IF NOT EXISTS `asg7` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `asg7`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_no` char(15) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_no`, `transaction_date`, `balance`) VALUES
('AU1741076', '0000-00-00', '1000.00');

--
-- Triggers `account`
--
DELIMITER $$
CREATE TRIGGER `chk_balance_insert` BEFORE INSERT ON `account` FOR EACH ROW begin
declare err varchar(60);
set err = 'Please enter the amount more than 500';
if new.balance < 500 then
signal sqlstate '45001' set message_text = err;
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `chk_balance_update` BEFORE UPDATE ON `account` FOR EACH ROW begin
declare err varchar(100);
set err = 'Add more amount in your account, Minimum balance should be 500';
if new.balance < 500 then
signal sqlstate '45001' set message_text = err;
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classcode` varchar(20) NOT NULL,
  `classdesc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `class`
--
DELIMITER $$
CREATE TRIGGER `delete_child_records` BEFORE DELETE ON `class` FOR EACH ROW begin
delete from student where classcode = old.classcode;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empno` varchar(10) DEFAULT NULL,
  `empname` varchar(30) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `redolog_trigger` BEFORE UPDATE ON `employee` FOR EACH ROW begin
declare message varchar(40);
if old.empno<>new.empno then
       insert into Redolog_values values(curdate(), 'empno', old.empno, new.empno);
    elseif old.empname<>new.empname then
       insert into Redolog_values values(curdate(), 'empname', old.empname, new.empname);
    elseif old.birth_date<>new.birth_date then
       insert into Redolog_values values(curdate(), 'birth_date', old.birth_date, new.birth_date);
elseif old.contact_no<>new.contact_no then
       insert into Redolog_values values(curdate(), 'contact_no', old.contact_no, new.contact_no);
elseif old.email<>new.email then
insert into Redolog_values values(curdate(), 'email', old.email, new.email);
else
       set message = 'Database is not updated';
       signal sqlstate '45001' set message_text = message;
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `stdno` varchar(10) NOT NULL,
  `classcode` varchar(10) NOT NULL,
  `sub1_marks` int(11) DEFAULT NULL,
  `sub2_marks` int(11) DEFAULT NULL,
  `sub3_marks` int(11) DEFAULT NULL,
  `sub4_marks` int(11) DEFAULT NULL,
  `sub5_marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `marks`
--
DELIMITER $$
CREATE TRIGGER `calculate_result` AFTER INSERT ON `marks` FOR EACH ROW begin
declare total_marks int;
declare percentage float;
declare grade char(1);
declare status char(4);
set total_marks = new.sub1_marks + new.sub2_marks + new.sub3_marks + new.sub4_marks + new.sub5_marks;
set percentage = (total_marks/250)*100;
if(percentage < 40) then
set grade = 'F';
set status = 'Fail';
elseif (percentage >= 40 and percentage < 55) then
set grade = 'C';
set status = 'Pass';
elseif (percentage >= 55 and percentage < 70) then
set grade = 'B';
set status = 'Pass';
else 
set grade = 'A';
set status = 'Pass';
end if;
insert into Result values(new.stdno, new.classcode, total_marks, percentage, grade, status);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `redolog_values`
--

CREATE TABLE `redolog_values` (
  `cur_date` date DEFAULT NULL,
  `field_name` varchar(20) DEFAULT NULL,
  `before_value` varchar(30) DEFAULT NULL,
  `after_value` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `stdno` varchar(10) DEFAULT NULL,
  `classcode` varchar(10) DEFAULT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `percentage` float DEFAULT NULL,
  `grade` char(1) DEFAULT NULL,
  `status` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `empno` varchar(10) DEFAULT NULL,
  `salary` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `salary`
--
DELIMITER $$
CREATE TRIGGER `trap_trig_delete` BEFORE DELETE ON `salary` FOR EACH ROW begin
declare message varchar(70);
if(dayofweek(current_date()) = 1 || dayofweek(current_date()) = 7) then
insert into Trapped values(current_user(), current_time_stamp());
set message = 'Delete any data is not allowed at this day';
signal sqlstate '45001' set message_text = message;
end if;
if(extract(hour from now()) >= 22 || extract(hour from now()) <= 6) then
insert into Trapped values(current_user(), current_timestamp());
set message = 'Delete any data is not allowed at this time';
signal sqlstate '45001' set message_text = message;
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trap_trig_insert` BEFORE INSERT ON `salary` FOR EACH ROW begin
declare message varchar(70);
if(dayofweek(current_date()) = 1 || dayofweek(current_date()) = 7) then
insert into Trapped values(current_user(), current_time_stamp());
set message = 'Insert any data is not allowed at this day';
signal sqlstate '45001' set message_text = message;
end if;
if(extract(hour from now()) >= 22 || extract(hour from now()) <= 6) then
insert into Trapped values(current_user(), current_timestamp());
set message = 'Insert any data is not allowed at this time';
signal sqlstate '45001' set message_text = message;
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trap_trig_update` BEFORE UPDATE ON `salary` FOR EACH ROW begin
declare message varchar(70);
if(dayofweek(current_date()) = 1 || dayofweek(current_date()) = 7) then
insert into Trapped values(current_user(), current_time_stamp());
set message = 'Update in any data is not allowed at this day';
signal sqlstate '45001' set message_text = message;
end if;
if(extract(hour from now()) >= 22 || extract(hour from now()) <= 6) then
insert into Trapped values(current_user(), current_timestamp());
set message = 'Update in any data is not allowed at this time';
signal sqlstate '45001' set message_text = message;
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `classcode` varchar(20) DEFAULT NULL,
  `stdno` varchar(20) NOT NULL,
  `stdname` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trapped`
--

CREATE TABLE `trapped` (
  `username` varchar(10) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classcode`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`stdno`,`classcode`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `stdno` (`stdno`,`classcode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stdno`),
  ADD KEY `classcode` (`classcode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`stdno`,`classcode`) REFERENCES `marks` (`stdno`, `classcode`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`classcode`) REFERENCES `class` (`classcode`);
--
-- Database: `assignment_2`
--
CREATE DATABASE IF NOT EXISTS `assignment_2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assignment_2`;

-- --------------------------------------------------------

--
-- Table structure for table `advisor_076`
--

CREATE TABLE `advisor_076` (
  `s_id` varchar(10) NOT NULL,
  `i_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor_076`
--

INSERT INTO `advisor_076` (`s_id`, `i_id`) VALUES
('AU1741072', '10161'),
('AU1741073', '20162'),
('AU1741075', '40164');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_076`
--

CREATE TABLE `classroom_076` (
  `building` varchar(10) NOT NULL,
  `room_no` int(11) NOT NULL,
  `capacity` int(11) DEFAULT '120'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_076`
--

INSERT INTO `classroom_076` (`building`, `room_no`, `capacity`) VALUES
('AMSOM', 202, 110),
('HL', 204, 120),
('LMP', 205, 150),
('MG', 203, 130),
('SEAS', 201, 100);

-- --------------------------------------------------------

--
-- Table structure for table `course_076`
--

CREATE TABLE `course_076` (
  `course_id` varchar(6) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `dept_name` varchar(15) DEFAULT NULL,
  `credits` decimal(5,0) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_076`
--

INSERT INTO `course_076` (`course_id`, `title`, `dept_name`, `credits`) VALUES
('COM105', 'ETHICS', 'MG', '4');

-- --------------------------------------------------------

--
-- Table structure for table `department_076`
--

CREATE TABLE `department_076` (
  `dept_name` varchar(15) NOT NULL,
  `building` varchar(10) DEFAULT NULL,
  `budget` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_076`
--

INSERT INTO `department_076` (`dept_name`, `building`, `budget`) VALUES
('AMSOM', 'amsom', 90000),
('HL', 'hl', 120000),
('LMP', 'lmp', 10000),
('MG', 'mg', 50000),
('SEAS', 'seas', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_076`
--

CREATE TABLE `instructor_076` (
  `ID` varchar(10) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `dept_name` varchar(15) DEFAULT NULL,
  `salary` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_076`
--

INSERT INTO `instructor_076` (`ID`, `name`, `dept_name`, `salary`) VALUES
('10161', 'NISARG', 'SEAS', 10000),
('20162', 'KAVYAA', 'AMSOM', 120000),
('30163', 'KAUSHA', 'LMP', 80000),
('40164', 'AAKASH', 'MG', 95000),
('50165', 'RAHUL', 'HL', 105000);

-- --------------------------------------------------------

--
-- Table structure for table `prereq_076`
--

CREATE TABLE `prereq_076` (
  `course_id` varchar(8) NOT NULL,
  `prereq_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section_076`
--

CREATE TABLE `section_076` (
  `course_id` varchar(8) NOT NULL,
  `sec_id` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` decimal(10,0) NOT NULL,
  `building` varchar(10) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `time_slot_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_076`
--

CREATE TABLE `student_076` (
  `ID` varchar(10) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `dept_name` varchar(15) DEFAULT NULL,
  `tot_cred` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_076`
--

INSERT INTO `student_076` (`ID`, `name`, `dept_name`, `tot_cred`) VALUES
('AU1741072', 'GAURAV', 'LMP', '69'),
('AU1741073', 'HITESH', 'HL', '79'),
('AU1741075', 'DEVSHREE', 'AMSOM', '68');

-- --------------------------------------------------------

--
-- Table structure for table `takes_076`
--

CREATE TABLE `takes_076` (
  `ID` varchar(10) NOT NULL,
  `course_id` varchar(8) NOT NULL,
  `sec_id` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` decimal(10,0) NOT NULL,
  `grade` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teaches_076`
--

CREATE TABLE `teaches_076` (
  `ID` varchar(10) NOT NULL,
  `course_id` varchar(8) NOT NULL,
  `sec_id` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_slot_076`
--

CREATE TABLE `time_slot_076` (
  `time_slot_id` varchar(10) NOT NULL,
  `day` varchar(10) DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot_076`
--

INSERT INTO `time_slot_076` (`time_slot_id`, `day`, `start_time`, `end_time`) VALUES
('1111', 'Tuesday', '2009-00-05 00:00:00', '2009-10-05 00:00:00'),
('1112', 'Monday', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1113', 'Thursday', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1114', 'Friday', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1115', 'Monday', '2011-00-05 00:00:00', '2011-10-05 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor_076`
--
ALTER TABLE `advisor_076`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk_cnt_27` (`i_id`);

--
-- Indexes for table `classroom_076`
--
ALTER TABLE `classroom_076`
  ADD PRIMARY KEY (`building`,`room_no`);

--
-- Indexes for table `course_076`
--
ALTER TABLE `course_076`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk_cnt_1` (`dept_name`);

--
-- Indexes for table `department_076`
--
ALTER TABLE `department_076`
  ADD PRIMARY KEY (`dept_name`),
  ADD UNIQUE KEY `unic_department` (`dept_name`);

--
-- Indexes for table `instructor_076`
--
ALTER TABLE `instructor_076`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unic_instructor` (`dept_name`);

--
-- Indexes for table `prereq_076`
--
ALTER TABLE `prereq_076`
  ADD PRIMARY KEY (`course_id`,`prereq_id`);

--
-- Indexes for table `section_076`
--
ALTER TABLE `section_076`
  ADD PRIMARY KEY (`course_id`,`sec_id`,`semester`,`year`),
  ADD KEY `fk_cnt_4` (`building`,`room_no`),
  ADD KEY `fk_cnt_5` (`time_slot_id`);

--
-- Indexes for table `student_076`
--
ALTER TABLE `student_076`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_cnt` (`dept_name`);

--
-- Indexes for table `takes_076`
--
ALTER TABLE `takes_076`
  ADD PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semester`,`year`),
  ADD KEY `fk_cnt_7` (`course_id`,`sec_id`,`semester`,`year`);

--
-- Indexes for table `teaches_076`
--
ALTER TABLE `teaches_076`
  ADD PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semester`,`year`);

--
-- Indexes for table `time_slot_076`
--
ALTER TABLE `time_slot_076`
  ADD PRIMARY KEY (`time_slot_id`,`start_time`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisor_076`
--
ALTER TABLE `advisor_076`
  ADD CONSTRAINT `fk_cnt_26` FOREIGN KEY (`s_id`) REFERENCES `student_076` (`ID`),
  ADD CONSTRAINT `fk_cnt_27` FOREIGN KEY (`i_id`) REFERENCES `instructor_076` (`ID`);

--
-- Constraints for table `course_076`
--
ALTER TABLE `course_076`
  ADD CONSTRAINT `fk_cnt_1` FOREIGN KEY (`dept_name`) REFERENCES `department_076` (`dept_name`);

--
-- Constraints for table `instructor_076`
--
ALTER TABLE `instructor_076`
  ADD CONSTRAINT `fk_cnt_2` FOREIGN KEY (`dept_name`) REFERENCES `department_076` (`dept_name`);

--
-- Constraints for table `prereq_076`
--
ALTER TABLE `prereq_076`
  ADD CONSTRAINT `fk_cnt_8` FOREIGN KEY (`course_id`) REFERENCES `takes_076` (`course_id`),
  ADD CONSTRAINT `fk_cnt_9` FOREIGN KEY (`course_id`) REFERENCES `takes_076` (`course_id`);

--
-- Constraints for table `section_076`
--
ALTER TABLE `section_076`
  ADD CONSTRAINT `fk_cnt_3` FOREIGN KEY (`course_id`) REFERENCES `course_076` (`course_id`),
  ADD CONSTRAINT `fk_cnt_4` FOREIGN KEY (`building`,`room_no`) REFERENCES `classroom_076` (`building`, `room_no`),
  ADD CONSTRAINT `fk_cnt_5` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slot_076` (`time_slot_id`);

--
-- Constraints for table `student_076`
--
ALTER TABLE `student_076`
  ADD CONSTRAINT `fk_cnt` FOREIGN KEY (`dept_name`) REFERENCES `department_076` (`dept_name`);

--
-- Constraints for table `takes_076`
--
ALTER TABLE `takes_076`
  ADD CONSTRAINT `fk_cnt_6` FOREIGN KEY (`ID`) REFERENCES `student_076` (`ID`),
  ADD CONSTRAINT `fk_cnt_7` FOREIGN KEY (`course_id`,`sec_id`,`semester`,`year`) REFERENCES `section_076` (`course_id`, `sec_id`, `semester`, `year`);

--
-- Constraints for table `teaches_076`
--
ALTER TABLE `teaches_076`
  ADD CONSTRAINT `fk_cnt_10` FOREIGN KEY (`ID`) REFERENCES `instructor_076` (`ID`);
--
-- Database: `assignment_3`
--
CREATE DATABASE IF NOT EXISTS `assignment_3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assignment_3`;

-- --------------------------------------------------------

--
-- Table structure for table `account_076`
--

CREATE TABLE `account_076` (
  `account_number` char(13) NOT NULL,
  `branch_name` varchar(30) DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_076`
--

INSERT INTO `account_076` (`account_number`, `branch_name`, `balance`) VALUES
('SBISBA0000001', 'NAVRANGPURA', '2500000.00'),
('SBISBA0000002', 'VASTRAL', '50000.00'),
('SBISBA0000003', 'GOTRI', '75000.00'),
('SBISBA0000004', 'CTM', '100000.00'),
('SBISBA0000005', 'KAMRAGE', '300000.00'),
('SBISBA0000006', 'GOTRI', '70000.00'),
('SBISBA0000007', 'VASTRAL', '860000.00'),
('SBISBA0000008', 'VASTRAL', '210500.00'),
('SBISBA0000009', 'CTM', '65000.00'),
('SBISBA0000010', 'KOYALI', '705000.00'),
('SBISBA0000011', 'NAVRANGPURA', '95000.00'),
('SBISBA0000012', 'NAVRANGPURA', '25000.00');

-- --------------------------------------------------------

--
-- Table structure for table `borrower_076`
--

CREATE TABLE `borrower_076` (
  `customer_name` varchar(50) DEFAULT NULL,
  `loan_number` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_076`
--

INSERT INTO `borrower_076` (`customer_name`, `loan_number`) VALUES
('JINESH PATEL', 'LN6100000000001'),
('ARPIT PATEL', 'LN6100000000002'),
('JINESH PATEL', 'LN6100000000003'),
('JINESH PATEL', 'LN6100000000004'),
('PARESH PATEL', 'LN6100000000005'),
('NISARG SHAH', 'LN6100000000006'),
('JINESH PATEL', 'LN6100000000007'),
('ARPIT PATEL', 'LN6100000000008'),
('ARPIT PATEL', 'LN6100000000009'),
('ARPIT PATEL', 'LN6100000000010');

-- --------------------------------------------------------

--
-- Table structure for table `branch_076`
--

CREATE TABLE `branch_076` (
  `branch_name` varchar(30) NOT NULL,
  `branch_city` varchar(30) DEFAULT NULL,
  `assets` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_076`
--

INSERT INTO `branch_076` (`branch_name`, `branch_city`, `assets`) VALUES
('ANDHERI', 'MUMBAI', 3),
('CTM', 'AHMEDABAD', 6),
('GOTRI', 'VADODARA', 8),
('KAMRAGE', 'SURAT', 9),
('KOYALI', 'VADODARA', 3),
('NAVRANGPURA', 'AHMEDABAD', 6),
('VASTRAL', 'AHMEDABAD', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer_076`
--

CREATE TABLE `customer_076` (
  `customer_name` varchar(50) NOT NULL,
  `customer_street` varchar(50) DEFAULT NULL,
  `customer_city` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_076`
--

INSERT INTO `customer_076` (`customer_name`, `customer_street`, `customer_city`) VALUES
('ARPIT PATEL', 'MANZALPUR GATE', 'VADODARA'),
('GAURAV PARMAR', 'GURUKUL ROAD', 'AHMEDABAD'),
('JINESH PATEL', 'VASTRAL ROAD', 'AHMEDABAD'),
('NISARG SHAH', 'GOMATIPUR ROAD', 'AHMEDABAD'),
('PANKAJ PATEL', 'SVNIT ROAD', 'SURAT'),
('PARAM SHAH', 'GOTRI ROAD', 'VADODARA'),
('PARESH PATEL', 'LOKMANYA TILAK ROAD', 'AHMEDABAD'),
('SHYAM PATEL', 'MANGAL ROAD', 'SURAT');

-- --------------------------------------------------------

--
-- Table structure for table `depositor_076`
--

CREATE TABLE `depositor_076` (
  `customer_name` varchar(50) DEFAULT NULL,
  `account_number` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depositor_076`
--

INSERT INTO `depositor_076` (`customer_name`, `account_number`) VALUES
('JINESH PATEL', 'SBISBA0000001'),
('ARPIT PATEL', 'SBISBA0000002'),
('PARAM SHAH', 'SBISBA0000003'),
('PANKAJ PATEL', 'SBISBA0000004'),
('PARESH PATEL', 'SBISBA0000005'),
('NISARG SHAH', 'SBISBA0000006');

-- --------------------------------------------------------

--
-- Table structure for table `loan_076`
--

CREATE TABLE `loan_076` (
  `loan_number` char(15) NOT NULL,
  `branch_name` varchar(30) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_076`
--

INSERT INTO `loan_076` (`loan_number`, `branch_name`, `amount`) VALUES
('LN6100000000001', 'VASTRAL', 854000),
('LN6100000000002', 'KOYALI', 1000000),
('LN6100000000003', 'VASTRAL', 365000),
('LN6100000000004', 'GOTRI', 68000),
('LN6100000000005', 'NAVRANGPURA', 550000),
('LN6100000000006', 'NAVRANGPURA', 12000000),
('LN6100000000007', 'CTM', 87000),
('LN6100000000008', 'GOTRI', 654000),
('LN6100000000009', 'VASTRAL', 256000),
('LN6100000000010', 'KOYALI', 9015000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_076`
--
ALTER TABLE `account_076`
  ADD PRIMARY KEY (`account_number`),
  ADD KEY `branch_name` (`branch_name`);

--
-- Indexes for table `borrower_076`
--
ALTER TABLE `borrower_076`
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `loan_number` (`loan_number`);

--
-- Indexes for table `branch_076`
--
ALTER TABLE `branch_076`
  ADD PRIMARY KEY (`branch_name`);

--
-- Indexes for table `customer_076`
--
ALTER TABLE `customer_076`
  ADD PRIMARY KEY (`customer_name`);

--
-- Indexes for table `depositor_076`
--
ALTER TABLE `depositor_076`
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `account_number` (`account_number`);

--
-- Indexes for table `loan_076`
--
ALTER TABLE `loan_076`
  ADD PRIMARY KEY (`loan_number`),
  ADD KEY `branch_name` (`branch_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_076`
--
ALTER TABLE `account_076`
  ADD CONSTRAINT `account_076_ibfk_1` FOREIGN KEY (`branch_name`) REFERENCES `branch_076` (`branch_name`);

--
-- Constraints for table `borrower_076`
--
ALTER TABLE `borrower_076`
  ADD CONSTRAINT `borrower_076_ibfk_1` FOREIGN KEY (`customer_name`) REFERENCES `customer_076` (`customer_name`),
  ADD CONSTRAINT `borrower_076_ibfk_2` FOREIGN KEY (`loan_number`) REFERENCES `loan_076` (`loan_number`);

--
-- Constraints for table `depositor_076`
--
ALTER TABLE `depositor_076`
  ADD CONSTRAINT `depositor_076_ibfk_1` FOREIGN KEY (`customer_name`) REFERENCES `customer_076` (`customer_name`),
  ADD CONSTRAINT `depositor_076_ibfk_2` FOREIGN KEY (`account_number`) REFERENCES `account_076` (`account_number`);

--
-- Constraints for table `loan_076`
--
ALTER TABLE `loan_076`
  ADD CONSTRAINT `loan_076_ibfk_1` FOREIGN KEY (`branch_name`) REFERENCES `branch_076` (`branch_name`);
--
-- Database: `labexam1`
--
CREATE DATABASE IF NOT EXISTS `labexam1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `labexam1`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptno` varchar(10) NOT NULL,
  `deptname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptno`, `deptname`) VALUES
('dept01', 'ICT'),
('dept02', 'MECH'),
('dept03', 'CHEM');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empno` varchar(15) NOT NULL,
  `empname` varchar(30) DEFAULT NULL,
  `deptno` varchar(10) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `hiredate` date DEFAULT NULL,
  `basicsalary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empno`, `empname`, `deptno`, `birthdate`, `hiredate`, `basicsalary`) VALUES
('emp01', 'Jinesh Patel', 'dept01', '2000-03-03', '2020-12-25', '250000.00'),
('emp02', 'Param Shah', 'dept02', '1996-08-01', '2025-08-03', '300000.00'),
('emp03', 'Rushil Shah', 'dept01', '1985-06-06', '2010-10-23', '25600.00'),
('emp04', 'Meet Modi', 'dept01', '1997-01-05', '2021-05-10', '120000.00'),
('emp05', 'Gaurav Parmar', 'dept03', '2001-04-13', '2028-09-19', '15000.00'),
('emp06', 'Aditya Bajaj', 'dept03', '1991-03-22', '2012-01-17', '64400.00'),
('emp07', 'Nisarg Shah', 'dept02', '1995-06-15', '2030-03-09', '98600.00'),
('emp08', 'Harshiv Patel', 'dept01', '1984-11-09', '2018-11-15', '350000.00'),
('emp09', 'Charmil Gandhi', 'dept03', '1987-12-11', '2009-05-02', '680000.00'),
('emp10', 'Shyam Patel', 'dept02', '1967-10-16', '1990-04-01', '345000.00'),
('emp11', 'Vandit Gajjar', 'dept02', '1975-06-20', '1996-03-19', '78500.00'),
('emp12', 'Harsh Patel', 'dept03', '1971-05-30', '1998-05-20', '68300.00');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `empno` varchar(15) NOT NULL,
  `salary_date` date DEFAULT NULL,
  `DA` decimal(8,2) DEFAULT NULL,
  `HRA` decimal(8,2) DEFAULT NULL,
  `PT` decimal(8,2) DEFAULT NULL,
  `PF` decimal(8,2) DEFAULT NULL,
  `MA` decimal(8,2) DEFAULT NULL,
  `Netsalary` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`empno`, `salary_date`, `DA`, `HRA`, `PT`, `PF`, `MA`, `Netsalary`) VALUES
('emp01', '2021-11-09', '500.00', '300.00', '150.00', '200.00', '1000.00', '251450.00'),
('emp02', '2029-03-08', '600.00', '400.00', '200.00', '250.00', '1200.00', '301750.00'),
('emp03', '2016-05-07', '400.00', '200.00', '200.00', '150.00', '1400.00', '27250.00'),
('emp04', '2025-06-04', '1000.00', '900.00', '300.00', '200.00', '800.00', '122200.00'),
('emp05', '2030-01-05', '2500.00', '500.00', '100.00', '150.00', '900.00', '18650.00'),
('emp06', '2018-03-03', '800.00', '1100.00', '250.00', '300.00', '1100.00', '66850.00'),
('emp07', '2035-02-15', '900.00', '300.00', '150.00', '400.00', '1200.00', '100450.00'),
('emp08', '2019-09-12', '1100.00', '500.00', '450.00', '1000.00', '1500.00', '351650.00'),
('emp09', '2011-12-01', '300.00', '150.00', '100.00', '200.00', '700.00', '680850.00'),
('emp10', '1995-02-06', '1000.00', '200.00', '150.00', '300.00', '900.00', '346650.00'),
('emp11', '1998-06-10', '700.00', '800.00', '400.00', '100.00', '1000.00', '80500.00'),
('emp12', '1999-09-03', '800.00', '400.00', '200.00', '200.00', '1300.00', '70400.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptno`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empno`),
  ADD KEY `deptno` (`deptno`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD KEY `empno` (`empno`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`deptno`) REFERENCES `department` (`deptno`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`empno`) REFERENCES `employee` (`empno`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"on\",\"relation_lines\":\"true\",\"full_screen\":\"on\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Dumping data for table `pma__navigationhiding`
--

INSERT INTO `pma__navigationhiding` (`username`, `item_name`, `item_type`, `db_name`, `table_name`) VALUES
('root', 'a', 'table', 'test', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('localhost', '[{\"db\":\"test\",\"table\":\"ticket\"}]'),
('root', '[{\"db\":\"sms\",\"table\":\"customer\"},{\"db\":\"sms\",\"table\":\"ownership\"},{\"db\":\"sms\",\"table\":\"product\"},{\"db\":\"sms\",\"table\":\"place\"},{\"db\":\"sms\",\"table\":\"payment\"},{\"db\":\"sms\",\"table\":\"payment_mode\"},{\"db\":\"sms\",\"table\":\"employee\"},{\"db\":\"sms\",\"table\":\"admin\"},{\"db\":\"sms\",\"table\":\"complain_type\"},{\"db\":\"sms\",\"table\":\"amc\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('assignment_2', 'takes_076', 'ID'),
('sms', 'payment', 'customerid'),
('test', 'bus', 'bus_no'),
('test', 'route', 'route_no');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'sms', 'customer', '{\"sorted_col\":\"`customer`.`address` ASC\"}', '2020-05-29 17:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('bdb_usser', '2019-04-13 18:08:22', '{\"Console\\/Mode\":\"collapse\"}'),
('localhost', '2019-04-16 04:43:01', '{\"Console\\/Mode\":\"collapse\"}'),
('root', '2020-05-31 16:06:45', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":196}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `rentforcement`
--
CREATE DATABASE IF NOT EXISTS `rentforcement` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rentforcement`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `pdesc` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `duration` int(11) NOT NULL,
  `doa` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_available`
--

CREATE TABLE `product_available` (
  `id` int(11) NOT NULL,
  `enddate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_visual`
--

CREATE TABLE `product_visual` (
  `id` int(11) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `emailaddr` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `uadhaar` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_content`
--

CREATE TABLE `user_content` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_available`
--
ALTER TABLE `product_available`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `sms`
--
CREATE DATABASE IF NOT EXISTS `sms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sms`;

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
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `a`
--

CREATE TABLE `a` (
  `pid` int(10) NOT NULL,
  `pname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a`
--

INSERT INTO `a` (`pid`, `pname`) VALUES
(1, 'abc'),
(2, 'cde'),
(11, 'efg'),
(14, 'ghi'),
(15, 'ijk'),
(16, 'klm');

-- --------------------------------------------------------

--
-- Table structure for table `b`
--

CREATE TABLE `b` (
  `pid` int(10) NOT NULL,
  `pname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b`
--

INSERT INTO `b` (`pid`, `pname`) VALUES
(2, 'cde'),
(11, 'efg'),
(15, 'ijk'),
(16, 'klm');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_no` varchar(10) NOT NULL,
  `bus_type` varchar(20) DEFAULT NULL,
  `total_seats` int(8) DEFAULT NULL,
  `route_id` varchar(10) DEFAULT NULL,
  `schedule_id` varchar(10) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `conductor_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_no`, `bus_type`, `total_seats`, `route_id`, `schedule_id`, `driver_id`, `conductor_id`) VALUES
('1001', 'AC_Sleeper', 40, 'Ah_Su_01', 'MWF1', 'dri01', 'con01'),
('1002', 'Semi_Sleeper', 40, 'Mh_Su_01', 'MWTF1', 'dri02', 'con02'),
('1003', 'Seated', 45, 'Ah_Su_01', 'TTFS1', 'dri03', 'con03'),
('1004', 'Sleeper', 30, 'Mh_Su_01', 'TTFS1', 'dri04', 'con04'),
('1005', 'AC_Semi_Sleeper', 50, 'Mh_Vd_01', 'TTFS1', 'dri05', 'dri01');

--
-- Triggers `bus`
--
DELIMITER $$
CREATE TRIGGER `dricon` BEFORE INSERT ON `bus` FOR EACH ROW begin
	declare error1, error2 varchar(80);
	set error1 = 'THIS EMPLOYEE ID CANNOT BE GIVEN IN DRIVER FIELD';
	set error2 = 'THIS EMPLOYEE ID CANNOT BE GIVEN IN CONDUCTOR FIELD';

	if new.driver_id <> 'dri%' then
		signal sqlstate '45001' set message_text = error1;
	end if;	
	if new.conductor_id <> 'con%' then
		signal sqlstate '45001' set message_text = error2;
	end if;	

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(10) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `m_name` varchar(30) DEFAULT NULL,
  `l_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `post` varchar(20) DEFAULT NULL,
  `privilege` int(5) DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `f_name`, `m_name`, `l_name`, `dob`, `doj`, `gender`, `contact_no`, `email_id`, `password`, `post`, `privilege`) VALUES
('admin01', 'Jinesh', NULL, 'Patel', '2000-03-03', '2018-07-23', 'male', '+91 8511210681', NULL, 'admin@0303', 'DBA', 1),
('admin02', 'Shyam', NULL, 'Patel', '1999-10-21', '2018-04-14', 'male', '+918733890608', 'xyz@gmail.com', 'qwerty', 'DBA', 1),
('con01', 'Devi', NULL, 'Patel', '1988-04-16', '2015-02-18', 'female', '+914520136129', 'devip@gmail.com', 'devip@12345', 'Conductor', 3),
('con02', 'Kalika', NULL, 'Kukadia', '1998-01-19', '2019-01-05', 'female', '+917842033169', 'kalikak@gmail.com', 'kalikak@12345', 'Conductor', 3),
('con03', 'Jay', NULL, 'Parmar', '1994-02-25', '2016-09-23', 'male', '+911200346120', 'jayp@gmail.com', 'jayp@12345', 'Conductor', 3),
('con04', 'Jeel', NULL, 'Dave', '1992-05-28', '2015-03-12', 'male', '+914565623101', 'jeeld@gmail.com', 'jeeld@12345', 'Conductor', 3),
('con05', 'Magan', NULL, 'Patel', '1997-03-04', '2018-12-22', 'male', '+914123542698', 'maganp@gmail.com', 'maganp@12345', 'Conductor', 3),
('dri01', 'Ajay', NULL, 'Patel', '1995-01-16', '2018-07-09', 'male', '+911237894560', 'aj@gmail.com', 'aj@12345', 'Driver', 3),
('dri02', 'Geeta', NULL, 'Parmar', '1990-11-12', '2016-12-01', 'female', '+914561832300', 'geetap@gmail.com', 'geeta@12345', 'Driver', 3),
('dri03', 'Vani', NULL, 'Sheth', '1999-12-09', '2018-05-08', 'female', '+914423156790', 'vani@gmail.com', 'vani@12345', 'Driver', 3),
('dri04', 'Shantanu', NULL, 'Sheth', '1996-10-16', '2018-06-01', 'male', '+911287564930', 'ss@gmail.com', 'ss@12345', 'Driver', 3),
('dri05', 'Kevin', NULL, 'Kukadia', '1998-06-15', '2017-09-01', 'male', '+911203452103', 'kevink@gmail.com', 'kevink@12345', 'Driver', 3),
('staff01', 'Gaurav', NULL, 'Parmar', '2000-03-05', '2018-09-21', 'male', '+918849771362', 'gp@gmail.com', 'gp@12345', 'Staff', 2),
('staff02', 'Mihir', NULL, 'Kanjaria', '2000-06-19', '2018-08-14', 'male', '+917894259160', 'mk@gmail.com', 'mk@12345', 'Staff', 2);

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `emp_trigger` BEFORE INSERT ON `employee` FOR EACH ROW begin
declare error, error1, error2, error3 varchar(80);
declare age INT;
declare birth, j year;
set error = 'YOU ARE UNDERAGE TO DO THIS JOB';
set error1 = 'THIS EMPLOYEE CANNOT HAVE ADMIN PRIVILEGES';
set error2 = 'THIS EMPLOYEE CANNOT HAVE STAFF PRIVILEGES';
set error3 = 'THIS EMPLOYEE CANNOT HAVE WORKER PRIVILEGES';
set birth = EXTRACT(YEAR FROM new.dob);
set j = EXTRACT(YEAR FROM new.doj);
set age = j - birth ;

if age < 18  then
signal sqlstate '45001' set message_text = error;
end if;

if new.privilege = 1 and new.employee_id  <> 'admin%' then
signal sqlstate '45001' set message_text = error1;
elseif new.privilege = 2 and new.employee_id  <> 'sta%' then
signal sqlstate '45001' set message_text = error2;
elseif new.privilege = 3 and (new.employee_id  <> 'dri%' or new.employee_id  <> 'con%') then
signal sqlstate '45001' set message_text = error3;
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` varchar(20) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `m_name` varchar(30) DEFAULT NULL,
  `l_name` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `Gender` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `f_name`, `m_name`, `l_name`, `dob`, `contact_no`, `email_id`, `password`, `Gender`) VALUES
('pass1', 'Meet', NULL, 'Modi', '2000-08-25', '+917894259161', 'mm@gmail.com', 'mm@12345', 'male'),
('pass2', 'Manav', NULL, 'Darji', '2000-06-20', '+917894259163', 'md@gmail.com', 'md@12345', 'male'),
('pass3', 'Jay', NULL, 'Shah', '2000-06-18', '+917894259164', 'js@gmail.com', 'js@12345', 'male'),
('pass4', 'Harshiv', NULL, 'Patel', '1998-09-25', '+917845123069', 'hp@gmail.com', 'hp@12345', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(30) NOT NULL,
  `ticket_no` varchar(20) DEFAULT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_amount` decimal(20,2) DEFAULT NULL,
  `card_no` varchar(30) DEFAULT NULL,
  `transaction_id` varchar(30) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `ticket_no`, `payment_type`, `total_amount`, `card_no`, `transaction_id`, `payment_date`, `payment_status`) VALUES
('payment00001', 'ticket0001', 'cash', '10000.00', NULL, NULL, '2019-04-15', 'successful'),
('payment00002', 'ticket0002', 'card', '5000.00', '4567891238256312', 'trans01id000001', '2019-04-14', 'pending'),
('payment00003', 'ticket0003', 'net banking', '3000.00', NULL, 'trans02id000002', '2019-04-13', 'successful'),
('payment00004', 'ticket0004', 'card', '6000.00', '2315495239413923', 'trans01id000003', '2019-04-14', 'pending'),
('payment00005', 'ticket0005', 'net banking', '4000.00', NULL, 'trans02id000004', '2019-04-15', 'successful'),
('payment00006', 'ticket0006', 'cash', '3000.00', NULL, NULL, '2019-04-12', 'successful');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_no` varchar(10) NOT NULL,
  `station_1_no` varchar(10) DEFAULT NULL,
  `station_2_no` varchar(10) DEFAULT NULL,
  `station_3_no` varchar(10) DEFAULT NULL,
  `departure_station` varchar(10) DEFAULT NULL,
  `Last_Station` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_no`, `station_1_no`, `station_2_no`, `station_3_no`, `departure_station`, `Last_Station`) VALUES
('Ah_Su_01', 'Ahd02', 'Vad01', 'Sur01', 'Ahd01', 'Sur02'),
('Mh_Su_01', 'Meh02', 'Ahd01', 'Vad02', 'Meh01', 'Sur02'),
('Mh_Vd_01', 'Ahd02', 'Vad01', 'Sur01', 'Meh01', 'Vad02'),
('Rj_Su_01', 'Ahd01', 'Vad02', 'Vad01', 'Raj01', 'Sur02'),
('Vd_Mh_01', 'Vad02', 'Ahd02', 'Ahd01', 'Vad01', 'Meh01');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` varchar(10) NOT NULL,
  `departure_time` time DEFAULT NULL,
  `mon` int(2) DEFAULT NULL,
  `tue` int(2) DEFAULT NULL,
  `wed` int(2) DEFAULT NULL,
  `thu` int(2) DEFAULT NULL,
  `fri` int(2) DEFAULT NULL,
  `sat` int(2) DEFAULT NULL,
  `sun` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `departure_time`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`) VALUES
('MWF1', '07:10:00', 1, 0, 1, 0, 1, 0, 0),
('MWTF1', '16:30:00', 1, 0, 1, 1, 1, 0, 0),
('TTFS1', '05:40:00', 0, 1, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_no` varchar(10) NOT NULL,
  `station_name` varchar(50) NOT NULL,
  `city` varchar(40) DEFAULT NULL,
  `total_platform` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_no`, `station_name`, `city`, `total_platform`) VALUES
('Ahd01', 'Maninagar', 'Ahmedabad', 3),
('Ahd02', 'Nehrunagar', 'Ahmedabad', 4),
('Meh01', 'Mehsana', 'Mehsana', 3),
('Meh02', 'Panchot', 'Mehsana', 2),
('Raj01', 'Morbi', 'Rajkot', 2),
('Raj02', 'Rajkot', 'Rajkot', 3),
('Sur01', 'Kamrej', 'Surat', 2),
('Sur02', 'Udhna', 'Surat', 4),
('Vad01', 'Subhanpura', 'Vadodara', 2),
('Vad02', 'Gotri', 'Vadodara', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_no` varchar(20) NOT NULL,
  `booked_date` date DEFAULT NULL,
  `bus_no` varchar(10) DEFAULT NULL,
  `passenger_id` varchar(10) DEFAULT NULL,
  `booked_seats` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_no`, `booked_date`, `bus_no`, `passenger_id`, `booked_seats`) VALUES
('ticket0001', '2019-04-17', '1001', 'pass2', 5),
('ticket0002', '2019-04-19', '1001', 'pass3', 5),
('ticket0003', '2019-04-17', '1001', 'pass1', 3),
('ticket0004', '2019-02-06', '1001', 'pass3', 6),
('ticket0005', '2019-03-07', '1001', 'pass1', 4),
('ticket0006', '2019-03-12', '1001', 'pass3', 5),
('ticket0007', '2019-04-01', '1003', 'pass1', 1),
('ticket0008', '2019-01-20', '1001', 'pass2', 0),
('ticket0009', '2019-04-17', '1003', 'pass1', 2),
('ticket0010', '2019-04-17', '1004', 'pass1', 2),
('ticket0011', '2019-04-16', '1002', 'pass1', 5),
('ticket0012', '2019-04-18', '1003', 'pass2', 5),
('ticket0013', '2019-04-14', '1005', 'pass1', 5),
('ticket0014', '2019-04-14', '1003', 'pass2', 1),
('ticket0015', '2019-04-14', '1001', 'pass1', 3);

--
-- Triggers `ticket`
--
DELIMITER $$
CREATE TRIGGER `nbt` BEFORE INSERT ON `ticket` FOR EACH ROW begin
declare error varchar(100);
declare error1 varchar(100);
declare error2 varchar(50);
declare available_seats INT;
declare total_seats1 INT;
declare total_booked_seats INT;
declare total_seat INT;
declare total_pending INT;
set error1 = 'FIRST CLEAR THE PAYMENT OF PREVIOUS TICKETS';
set error2 = 'NUMBER OF SEATS YOU REQUESTED ARE NOT AVAILABLE';

set error = 'YOU WILL BE BLOCKED IF YOU BOOK ANYMORE TICKETS, SEAT BOOK LIMIT TO 20 IN 5 CONSECUTIVE BOOK';

SELECT SUM(a.booked_seats) INTO total_seat FROM (SELECT t.booked_date, t.booked_seats FROM ticket t
INNER JOIN passenger p
ON t.passenger_id = p.passenger_id where p.passenger_id = new.passenger_id order by t.booked_date desc limit 5) AS a;

SELECT count(b.ticket_no) into total_pending FROM passenger a inner join ticket b on a.passenger_id = b.passenger_id inner join payment c on b.ticket_no = c.ticket_no where c.payment_status = 'pending' and b.passenger_id = new.passenger_id group by a.passenger_id ;

SELECT total_seats INTO total_seats1 FROM bus b WHERE b.bus_no = new.bus_no;
SELECT  SUM(booked_seats) INTO total_booked_seats FROM bus b inner join ticket t on b.bus_no = t.bus_no WHERE t.bus_no = new.bus_no;

if ((new.booked_seats + total_seat)  > 20) then
signal sqlstate '45001' set message_text = error;
end if;


if (total_pending ) >0 then
signal sqlstate '45001' set message_text = error1;
end if;


set available_seats = total_seats1 - total_booked_seats ;
if available_seats < new.booked_seats  then
signal sqlstate '45001' set message_text = error2;
end if;

end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_no`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `conductor_id` (`conductor_id`),
  ADD KEY `route_no` (`route_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `contact_no` (`contact_no`),
  ADD UNIQUE KEY `contact_no_2` (`contact_no`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `email_id_2` (`email_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `ticket_no` (`ticket_no`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_no`),
  ADD KEY `departure_station` (`departure_station`),
  ADD KEY `Last_Station` (`Last_Station`),
  ADD KEY `station_1_no` (`station_1_no`),
  ADD KEY `station_2_no` (`station_2_no`),
  ADD KEY `station_3_no` (`station_3_no`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_no`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_no`),
  ADD KEY `bus_no` (`bus_no`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`),
  ADD CONSTRAINT `bus_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `bus_ibfk_4` FOREIGN KEY (`conductor_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `bus_ibfk_5` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_no`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ticket_no`) REFERENCES `ticket` (`ticket_no`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`departure_station`) REFERENCES `station` (`station_no`),
  ADD CONSTRAINT `route_ibfk_2` FOREIGN KEY (`Last_Station`) REFERENCES `station` (`station_no`),
  ADD CONSTRAINT `route_ibfk_3` FOREIGN KEY (`station_1_no`) REFERENCES `station` (`station_no`),
  ADD CONSTRAINT `route_ibfk_4` FOREIGN KEY (`station_2_no`) REFERENCES `station` (`station_no`),
  ADD CONSTRAINT `route_ibfk_5` FOREIGN KEY (`station_3_no`) REFERENCES `station` (`station_no`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`bus_no`) REFERENCES `bus` (`bus_no`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
