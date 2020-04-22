-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 07:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user_name` varchar(100) NOT NULL,
  `admin_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_user_name`, `admin_password`) VALUES
(1, 'admin', '$2y$10$UlJOawxTSdeoOZqUwSWo9uFgQv.1jyy.txZjsoupq8/DTkPZ6ee22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attendance_status` enum('Present','Absent') NOT NULL,
  `attendance_date` date NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `student_id`, `attendance_status`, `attendance_date`, `teacher_id`) VALUES
(1, 1, 'Present', '2019-05-01', 3),
(2, 2, 'Present', '2019-05-01', 3);


-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

CREATE TABLE `tbl_grade` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`grade_id`, `grade_name`) VALUES
(1, 'BCA - 2'),
(2, 'BCA - 4'),
(3, 'BCA - 6');


-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(150) NOT NULL,
  `student_roll_number` varchar(11) NOT NULL,
  `student_dob` date NOT NULL,
  `student_grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `student_roll_number`, `student_dob`, `student_grade_id`) VALUES
(1, 'PRANAYA','16XESB7050', '1999-03-04', 3),
(2, 'B S AFREED', '17XESB7001', '1999-04-19', 3),
(3, 'KAVIYA V', '17XESB7002', '1999-01-15', 3),
(4, 'ABILASH G','17XESB7003', '1999-04-11', 3),
(5, 'AKSHAY KUMAR PANDEY','17XESB7004', '1999-04-11', 3),
(6, 'AMEENULLA SHARIFF','17XESB7005', '1999-04-11', 3),
(7, 'ANISH KUMAR S','17XESB7006', '1999-04-11', 3),
(8, 'ANN ROOPA AUGUSTINE','17XESB7008', '1999-04-11', 3),
(9, 'ANUSHA C','17XESB7009', '1999-04-11', 3),
(10, 'ANUSHA T','17XESB7010', '1999-04-11', 3),
(11, 'ARCHITHA S','17XESB7011', '1999-04-11', 3),
(12, 'B NAVEEN KUMAR','17XESB7012', '1999-04-11', 3),
(13, 'BABAFAKRUDDIN M','17XESB7013', '1999-04-11', 3),
(14, 'BABY BHARGAVI V S','17XESB7014', '1999-04-11', 3),
(15, 'BALAJI T A','17XESB7015', '1999-04-11', 3),
(16, 'BALAJI YADAV M S','17XESB7016', '1999-04-11', 3),
(17, 'BASIL JOHN MATHEW','17XESB7017', '1999-04-11', 3),
(18, 'BHARATH  A R','17XESB7018', '1999-04-11', 3),
(19, 'BHARATH V','17XESB7019', '1999-04-11', 3),
(20, 'BHAVYASHREE N','17XESB7020', '1999-04-11', 3),
(21, 'CHAITHRA N','17XESB7021', '1999-04-11', 3),
(22, 'CHANDAN D U','17XESB7022', '1999-04-11', 3),
(23, 'CHANDRAKANTH REDDY','17XESB7023', '1999-04-11', 3),
(24, 'CHARAN KUMAR L','17XESB7024', '1999-04-11', 3),
(25, 'CHETHAN N','17XESB7025', '1999-04-11', 3),
(26, 'DAYANAND A','17XESB7027', '1999-04-11', 3),
(27, 'DEEPTHI K S','17XESB7028', '1999-04-11', 3),
(28, 'DHANALAKSHMI R','17XESB7029', '1999-04-11', 3),
(29, 'DHANUSH V','17XESB7030', '1999-04-11', 3),
(30, 'GALLA CHANDU','17XESB7032', '1999-04-11', 3),
(31, 'GAYATHRI N','17XESB7033', '1999-04-11', 3),
(32, 'GIRISH Y','17XESB7034', '1999-04-11', 3),
(33, 'GOWTHAMI G N','17XESB7035', '1999-04-11', 3),
(34, 'GURUMURTHY L','17XESB7036', '1999-04-11', 3),
(35, 'HARIPRAKASH E','17XESB7037', '1999-04-11', 3),
(36, 'HARSHITHA S','17XESB7038', '1999-04-11', 3),
(37, 'IQRA ANJUM L','17XESB7039', '1999-04-11', 3),
(38, 'JEEVIKA G','17XESB7040', '1999-04-11', 3),
(39, 'K JYOTHI BABU','17XESB7041', '1999-04-11', 3),
(40, 'KALYAN KUMAR A','17XESB7042', '1999-04-11', 3),
(41, 'KIRAN A','17XESB7043', '1999-04-11', 3),
(42, 'KISHORE GOWDA K S','17XESB7044', '1999-04-11', 3),
(43, 'KOUSHIK S C','17XESB7045', '1999-04-11', 3),
(44, 'LALITH KIRAN SINGH C','17XESB7046', '1999-04-11', 3),
(45, 'LAVANYA P M','17XESB7047', '1999-04-11', 3),
(46, 'LAYA SAHITYA N','17XESB7048', '1999-04-11', 3),
(47, 'LIKHIL S B','17XESB7049', '1999-04-11', 3),
(48, 'MADHU DARSHAN A','17XESB7050', '1999-04-11', 3),
(49, 'MADHUSUDHAN B S','17XESB7051', '1999-04-11', 3),
(50, 'MELVIN JOHNY K J','17XESB7052', '1999-04-11', 3),
(51, 'MOHAMMED SHABAZ SIDDIQUE','17XESB7054', '1999-04-11', 3),
(52, 'MOHAMMED SHAHID C T P','17XESB7055', '1999-04-11', 3),
(53, 'MOHAN PRASAD S','17XESB7056', '1999-04-11', 3),
(54, 'NIKHIL N','17XESB7057', '1999-04-11', 3),
(55, 'NIKHIL U','17XESB7058', '1999-04-11', 3),
(56, 'NIRANJAN KUMAR B','17XESB7060', '1999-04-11', 3),
(57, 'NITHIN R','17XESB7061', '1999-04-11', 3),
(58, 'PRAKRUTHI R','17XESB7063', '1999-04-11', 3),
(59, 'PRAVEEN KUMAR C K','17XESB7064', '1999-04-11', 3),
(60, 'RAHUL V','17XESB7065', '1999-04-11', 3),
(61, 'RANJITH KUMAR C C','17XESB7067', '1999-04-11', 3),
(62, 'RAVI KUMAR R','17XESB7069', '1999-04-11', 3),
(63, 'S KAVYA SHREE','17XESB7070', '1999-04-11', 3),
(64, 'SHAHID ALI KHAN','17XESB7072', '1999-04-11', 3),
(65, 'SHARATH M','17XESB7073', '1999-04-11', 3),
(66, 'SHIREESH B R','17XESB7075', '1999-04-11', 3),
(67, 'SHREYAS P','17XESB7076', '1999-04-11', 3),
(68, 'SOMISETTY MADHUSUDAN RAO','17XESB7077', '1999-04-11', 3),
(69, 'SREELAKSHMI DINESH','17XESB7078', '1999-04-11', 3),
(70, 'SUNIL V','17XESB7080', '1999-04-11', 3),
(71, 'SUSHMA K V','17XESB7081', '1999-04-11', 3),
(72, 'TALARI NITHIN PRASAD','17XESB7003', '1999-04-11', 3),
(73, 'TEJASHWINI S','17XESB7084', '1999-04-11', 3),
(74, 'TUSHAR KANTI SAHA','17XESB7085', '1999-04-11', 3),
(75, 'VAIBHAVI J','17XESB7086', '1999-04-11', 3),
(76, 'VIKAS GOWDA V','17XESB7087', '1999-04-11', 3),
(77, 'VINAYKUMAR N D','17XESB7088', '1999-04-11', 3),
(78, 'YASHAS T N','17XESB7090', '1999-04-11', 3),
(79, 'MANOHAR S','17XESB7091', '1999-04-11', 3);


-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(150) NOT NULL,
  `teacher_address` text NOT NULL,
  `teacher_emailid` varchar(100) NOT NULL,
  `teacher_password` varchar(100) NOT NULL,
  `teacher_qualification` varchar(100) NOT NULL,
  `teacher_doj` date NOT NULL,
  `teacher_image` varchar(100) NOT NULL,
  `teacher_grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_name`, `teacher_address`, `teacher_emailid`, `teacher_password`, `teacher_qualification`, `teacher_doj`, `teacher_image`, `teacher_grade_id`) VALUES
(2, 'MS VANDANA', 'unknown ', 'vandana@gmail.com', '$2y$10$UlJOawxTSdeoOZqUwSWo9uFgQv.1jyy.txZjsoupq8/DTkPZ6ee22', 'B.Sc, B.Ed', '2019-05-01', '5cdd2ed638edc.jpg', 1),
(3, 'Peter Parker', '620 Jody Road, Philadelphia, PA 19108', 'peter_parker@gmail.com', '$2y$10$jmgJN1xvteg6XqBnHvT7UerviGNJOSnF8KFzBHnCky0FJWa74Nvmu', 'M.Sc, B. Ed', '2017-12-31', '5ce53488d50ec.jpg', 2),
(4, 'John Smith', '780 University Drive, Chicago, IL 60606', 'john.smith@gmail.com', '$2y$10$Vb9t4CvkJwm41KXgPehuLOFcM7o5Qdm1RFxSBxzh9cvBcc21AUAiW', 'B.Sc', '2019-05-01', '5cdd2f35be8fa.jpg', 3),
(5, 'Donna Hubber', '3354 Round Table Drive, Cincinnati, OH 45240', 'donna.huber@gmail.com', '$2y$10$SVxX4/7lf3pDs1vrpuJexOG7Ue1e1jqIntGmXip3JzxkB753uxBiO', 'M.Sc', '2019-05-01', '5cdd2f767568c.jpg', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
