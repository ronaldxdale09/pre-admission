-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 09:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `initialsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissionbatch`
--

CREATE TABLE `admissionbatch` (
  `admission_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` int(5) NOT NULL,
  `schoolyear` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admissionbatch`
--

INSERT INTO `admissionbatch` (`admission_id`, `start_date`, `end_date`, `is_active`, `schoolyear`) VALUES
(1, '2022-01-01', '2022-01-20', 1, '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `admission_officer`
--

CREATE TABLE `admission_officer` (
  `ao_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_officer`
--

INSERT INTO `admission_officer` (`ao_id`, `user_id`, `college_id`) VALUES
(1, 63, 1);

-- --------------------------------------------------------

--
-- Table structure for table `application_log`
--

CREATE TABLE `application_log` (
  `tracking_id` int(11) NOT NULL,
  `selectedCourse_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `userStatus` varchar(30) DEFAULT NULL,
  `date` varchar(11) DEFAULT NULL,
  `inter_score` varchar(11) DEFAULT NULL,
  `rejectReason` varchar(100) DEFAULT NULL,
  `interview_sched` varchar(50) DEFAULT NULL,
  `academic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_log`
--

INSERT INTO `application_log` (`tracking_id`, `selectedCourse_id`, `user_id`, `college_id`, `course_id`, `file_id`, `userStatus`, `date`, `inter_score`, `rejectReason`, `interview_sched`, `academic_id`) VALUES
(29, 10, 59, 1, 11, 7, 'PENDING', '2022:04:21', NULL, NULL, NULL, NULL),
(30, 10, 59, 1, 11, 7, 'PREQUALIFIED', '2022:04:21', NULL, NULL, NULL, NULL),
(31, 10, 59, 1, 11, 7, 'INTERVIEW', '2022:04:21', NULL, NULL, '1', NULL),
(32, 10, 59, 1, 11, 7, 'QUALIFIED', '2022-04-22 ', '8', NULL, '1', NULL),
(33, 11, 64, 1, 11, 8, 'PENDING', '2022:04:23', NULL, NULL, NULL, NULL),
(34, 11, 64, 1, 11, 8, 'PREQUALIFIED', '2022-04-22 ', NULL, NULL, NULL, NULL),
(35, 11, 64, 1, 11, 8, 'INTERVIEW', '2022-04-22 ', NULL, NULL, '1', NULL),
(36, 11, 64, 1, 11, 8, 'QUALIFIED', '2022-04-22 ', '9', NULL, '1', NULL),
(37, 12, 65, 1, 11, 9, 'PENDING', '2022:04:23', NULL, NULL, NULL, NULL),
(38, 12, 65, 1, 11, 9, 'PREQUALIFIED', '2022-04-22 ', NULL, NULL, NULL, NULL),
(39, 12, 65, 1, 11, 9, 'INTERVIEW', '2022-04-22 ', NULL, NULL, '1', NULL),
(40, 12, 65, 1, 11, 9, 'QUALIFIED', '2022-04-22 ', '9', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `cet_path` text NOT NULL,
  `gmoral_path` text NOT NULL,
  `gpa_path` text NOT NULL,
  `shiftee_path` text DEFAULT NULL,
  `user_id` int(100) NOT NULL,
  `cetValue` varchar(100) NOT NULL,
  `gpaValue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `cet_path`, `gmoral_path`, `gpa_path`, `shiftee_path`, `user_id`, `cetValue`, `gpaValue`) VALUES
(3, 'Beltran Jayson MidtermPart2.docx', 'Fuentebella Beltran Tubat.docx', '', NULL, 53, '88', '88'),
(4, '1.png', '2.jpg', '3.png', NULL, 59, '92', '89'),
(5, 'interview.docx', 'FUENTEBELLA.docx', 'math.docx', NULL, 59, '92', '89'),
(6, '121672723_663647434343160_7795209927003615138_n.jpg', 'frame3.png', 'PIC.jpg', NULL, 59, '92', '99'),
(7, '121672723_663647434343160_7795209927003615138_n.jpg', '124317938_412456019786014_4885017052199692639_n.jpg', '124317938_412456019786014_4885017052199692639_n.jpg', NULL, 59, '92', '89'),
(8, '278507733_509424214049378_6659208761793090505_n.jpg', 'CORRECTION THESIS 2022.docx', '277521680_519630292932792_6851717990056549469_n.jpg', NULL, 64, '88', '99'),
(9, '278507733_509424214049378_6659208761793090505_n.jpg', '278507733_509424214049378_6659208761793090505_n.jpg', '278507733_509424214049378_6659208761793090505_n.jpg', NULL, 65, '95', '80'),
(10, 'brent-soft-dev-proposal.docx', 'brent-soft-dev-proposal.pdf', '278507733_509424214049378_6659208761793090505_n.jpg', NULL, 66, '97', '98'),
(11, 'brent-soft-dev-proposal.docx', 'brent-soft-dev-proposal.pdf', 'notepad.txt', NULL, 66, '97', '98'),
(12, 'brent-soft-dev-proposal.docx', 'Filipino Grievances Against Governor Wood.pptx', 'notepad.txt', NULL, 66, '97', '98'),
(13, 'brent-soft-dev-proposal.docx', 'brent-soft-dev-proposal.docx', '278507733_509424214049378_6659208761793090505_n.jpg', NULL, 64, '88', '98'),
(14, 'brent-soft-dev-proposal.docx', 'brent-soft-dev-proposal.docx', 'brent-soft-dev-proposal.pdf', NULL, 64, '88', '98');

-- --------------------------------------------------------

--
-- Table structure for table `cetresult`
--

CREATE TABLE `cetresult` (
  `applicantid` int(11) NOT NULL,
  `cetresult` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cetresult`
--

INSERT INTO `cetresult` (`applicantid`, `cetresult`, `year`, `fname`, `lname`) VALUES
(201400001, '88', '2014', 'Aizzy Diane', 'Algupera'),
(201400002, '88', '2014', 'Migfren', 'Limen'),
(201800002, '90', '2018', 'Wenefredo', 'Tejero'),
(201800003, '93', '2018', 'Ronald Dale', 'Fuentebella'),
(201800004, '92', '2018', 'Mark Anthony', 'Tubat'),
(201800005, '95', '2018', 'Josua', 'Habil'),
(201800006, '70', '2018', 'Jan Renzo', 'Facto'),
(201801928, '75', '2018', 'Jayson', 'Beltran'),
(202000018, '90', '2020', 'Juztyne Raine', 'Abella'),
(202100001, '92', '2021', 'Hannah Charise', 'Toroy'),
(202100002, '85', '2021', 'Clifford Cyril', 'Jumawan'),
(202100003, '95', '2021', 'Hannah Fatima', 'Sonza'),
(202100004, '96', '2021', 'Mersan', 'Nagdar'),
(202100005, '99', '2021', 'Resham Lal', 'Sohal'),
(202100006, '97', '2021', 'Exan Jhon', 'Carpio'),
(202100007, '90', '2021', 'Faulyn', 'Bernardo'),
(202100008, '91', '2021', 'Cherry Ivy', 'Sagun'),
(202100009, '83', '2021', 'Julie Ann Joyce', 'Mejos'),
(202100010, '60', '2021', 'Wesley', 'Hoffdal'),
(202100011, '50', '2021', 'Yves', 'Surbano');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(100) NOT NULL,
  `college_name` varchar(100) NOT NULL,
  `college_img` text DEFAULT NULL,
  `college_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`, `college_img`, `college_description`) VALUES
(1, 'Institute of Computer Studies', 'ics_seal.jpg', 'mememememememeeh'),
(2, 'College of Engineering', 'engineering.jfif', 'meow'),
(3, 'College of Nursing', 'nursing.png', 'Nursing ');

-- --------------------------------------------------------

--
-- Table structure for table `coursestbl`
--

CREATE TABLE `coursestbl` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` varchar(1000) NOT NULL,
  `college_id` int(11) NOT NULL,
  `course_img` text DEFAULT NULL,
  `quota` int(200) DEFAULT NULL,
  `waiting` int(200) DEFAULT NULL,
  `cet_req` float DEFAULT NULL,
  `gpa_req` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursestbl`
--

INSERT INTO `coursestbl` (`course_id`, `course_name`, `course_description`, `college_id`, `course_img`, `quota`, `waiting`, `cet_req`, `gpa_req`) VALUES
(11, 'Bachelor of Science in Computer Science', 'Computer science is the study of how data and instructions are processed,\r\n                            stored and communicated by computing devices. It involves designing software and addressing\r\n                            fundamental scientific questions about the nature of computation but also involves many\r\n                            aspects of hardware and the architecture of large computer systems.', 1, 'ics_seal.jpg', 120, 20, 85, 86),
(12, 'Bachelor of Science in Information Technology', 'Information technologists help companies and offices in a technological\r\n                            environment stay competitive and active. They help keep all computers in an office running\r\n                            smoothly by conducting repetitive databases and network security activities.', 1, 'ics_seal.jpg', 300, NULL, 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `evaluator`
--

CREATE TABLE `evaluator` (
  `evaluator_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluator`
--

INSERT INTO `evaluator` (`evaluator_id`, `user_id`, `college_id`) VALUES
(2, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `interviewer`
--

CREATE TABLE `interviewer` (
  `interviewer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interviewer`
--

INSERT INTO `interviewer` (`interviewer_id`, `user_id`, `college_id`) VALUES
(1, 62, 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_interviewer`
--

CREATE TABLE `list_interviewer` (
  `ic_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `college_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_interviewer`
--

INSERT INTO `list_interviewer` (`ic_id`, `name`, `college_id`, `course_id`) VALUES
(1, 'Theo Sanson', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `rejection_reason`
--

CREATE TABLE `rejection_reason` (
  `rejection_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejection_reason`
--

INSERT INTO `rejection_reason` (`rejection_id`, `name`) VALUES
(1, 'Insufficient CET Score'),
(2, 'Doesn\'t meet GPA requirements');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_interview`
--

CREATE TABLE `schedule_interview` (
  `schedule_interview_id` int(11) NOT NULL,
  `interview_date` varchar(50) DEFAULT NULL,
  `interview_time` varchar(50) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_interview`
--

INSERT INTO `schedule_interview` (`schedule_interview_id`, `interview_date`, `interview_time`, `quota`, `college_id`, `course_id`) VALUES
(1, '04/20/2022', '08:08:56 am', 100, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `selectedcourse`
--

CREATE TABLE `selectedcourse` (
  `selectedCourse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `userStatus` varchar(100) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  `ic` varchar(100) DEFAULT NULL,
  `average` float DEFAULT NULL,
  `inter_score` int(100) DEFAULT NULL,
  `rejectReason` varchar(100) DEFAULT NULL,
  `interview_sched` varchar(50) DEFAULT NULL,
  `academic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selectedcourse`
--

INSERT INTO `selectedcourse` (`selectedCourse_id`, `user_id`, `college_id`, `course_id`, `file_id`, `userStatus`, `date`, `ic`, `average`, `inter_score`, `rejectReason`, `interview_sched`, `academic_id`) VALUES
(10, 59, 1, 11, 7, 'QUALIFIED', '2022-04-22 00:22:05', '1', NULL, 8, NULL, '1', NULL),
(11, 64, 1, 11, 8, 'QUALIFIED', '2022-04-22 20:47:33', '1', NULL, 9, NULL, '1', NULL),
(12, 65, 1, 11, 9, 'QUALIFIED', '2022-04-22 22:27:26', '1', NULL, 9, NULL, '1', NULL);

--
-- Triggers `selectedcourse`
--
DELIMITER $$
CREATE TRIGGER `applicationlogs` AFTER UPDATE ON `selectedcourse` FOR EACH ROW INSERT into application_log VALUES (null,NEW.selectedCourse_id,NEW.user_id,NEW.college_id,NEW.course_id,NEW.file_id,NEW.userStatus,NEW.date,NEW.inter_score,NEW.rejectReason,NEW.interview_sched,NEW.academic_id)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `newSelectedCourse` AFTER INSERT ON `selectedcourse` FOR EACH ROW INSERT into application_log VALUES (null,NEW.selectedCourse_id,NEW.user_id,NEW.college_id,NEW.course_id,NEW.file_id,NEW.userStatus,NEW.date,NEW.inter_score,NEW.rejectReason,NEW.interview_sched,NEW.academic_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `applicantid` int(11) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `studentType` varchar(100) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `birthdate` varchar(20) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `applicantid`, `fname`, `lname`, `email`, `contactNo`, `address`, `user_type`, `password`, `studentType`, `img`, `birthdate`, `sex`) VALUES
(59, 201800004, 'Mark Anthony', 'Tubat', 'test@gmail.com', NULL, NULL, 'user', '12345', 'Regular', NULL, NULL, NULL),
(60, NULL, 'Jayson', 'Beltz', 'evaluator@evaluator.com', NULL, NULL, 'evaluator', 'evaluator', NULL, NULL, NULL, NULL),
(61, 202100004, 'Mersan', 'Nagdar', 'ronaldxdale@gmail.com', NULL, NULL, 'user', '12345', 'Regular', NULL, NULL, NULL),
(62, NULL, 'mark', 'tubat', 'ics@interviewer.com', NULL, NULL, 'interviewer', 'interviewer', NULL, NULL, NULL, NULL),
(63, NULL, 'Kaxandra', 'Lyka', 'ics@admission.com', NULL, NULL, 'admission', 'admission', NULL, NULL, NULL, NULL),
(64, 201400002, 'Migfren', 'Limen', 'limen@gmail.com', NULL, NULL, 'user', '12345', 'Regular', NULL, NULL, NULL),
(65, 201800005, 'Josua', 'Habil', 'josh@gmail.com', NULL, NULL, 'user', '12345', 'Regular', NULL, NULL, NULL),
(66, 202100006, 'Exan Jhon', 'Carpio', 'user2@gmail.com', NULL, NULL, 'user', '12345', 'Regular', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissionbatch`
--
ALTER TABLE `admissionbatch`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `admission_officer`
--
ALTER TABLE `admission_officer`
  ADD PRIMARY KEY (`ao_id`),
  ADD KEY `ao_user` (`user_id`),
  ADD KEY `ao_college` (`college_id`);

--
-- Indexes for table `application_log`
--
ALTER TABLE `application_log`
  ADD PRIMARY KEY (`tracking_id`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cetresult`
--
ALTER TABLE `cetresult`
  ADD PRIMARY KEY (`applicantid`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `coursestbl`
--
ALTER TABLE `coursestbl`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `evaluator`
--
ALTER TABLE `evaluator`
  ADD PRIMARY KEY (`evaluator_id`),
  ADD KEY `userid` (`user_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `interviewer`
--
ALTER TABLE `interviewer`
  ADD PRIMARY KEY (`interviewer_id`),
  ADD KEY `interviewerUser` (`user_id`),
  ADD KEY `assignedCollege` (`college_id`);

--
-- Indexes for table `list_interviewer`
--
ALTER TABLE `list_interviewer`
  ADD PRIMARY KEY (`ic_id`),
  ADD KEY `interviewCollege` (`college_id`),
  ADD KEY `interviewCourse` (`course_id`);

--
-- Indexes for table `rejection_reason`
--
ALTER TABLE `rejection_reason`
  ADD PRIMARY KEY (`rejection_id`);

--
-- Indexes for table `schedule_interview`
--
ALTER TABLE `schedule_interview`
  ADD PRIMARY KEY (`schedule_interview_id`),
  ADD KEY `schedCollege` (`college_id`),
  ADD KEY `schedCourse` (`course_id`);

--
-- Indexes for table `selectedcourse`
--
ALTER TABLE `selectedcourse`
  ADD PRIMARY KEY (`selectedCourse_id`),
  ADD KEY `user_ID` (`user_id`),
  ADD KEY `college_ID` (`course_id`),
  ADD KEY `file_ID` (`file_id`),
  ADD KEY `collegeID` (`college_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicantid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissionbatch`
--
ALTER TABLE `admissionbatch`
  MODIFY `admission_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_officer`
--
ALTER TABLE `admission_officer`
  MODIFY `ao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_log`
--
ALTER TABLE `application_log`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cetresult`
--
ALTER TABLE `cetresult`
  MODIFY `applicantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202100012;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coursestbl`
--
ALTER TABLE `coursestbl`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `evaluator`
--
ALTER TABLE `evaluator`
  MODIFY `evaluator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `interviewer`
--
ALTER TABLE `interviewer`
  MODIFY `interviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_interviewer`
--
ALTER TABLE `list_interviewer`
  MODIFY `ic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rejection_reason`
--
ALTER TABLE `rejection_reason`
  MODIFY `rejection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule_interview`
--
ALTER TABLE `schedule_interview`
  MODIFY `schedule_interview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `selectedcourse`
--
ALTER TABLE `selectedcourse`
  MODIFY `selectedCourse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_officer`
--
ALTER TABLE `admission_officer`
  ADD CONSTRAINT `ao_college` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `ao_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `evaluator`
--
ALTER TABLE `evaluator`
  ADD CONSTRAINT `college_id` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `interviewer`
--
ALTER TABLE `interviewer`
  ADD CONSTRAINT `assignedCollege` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `interviewerUser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `list_interviewer`
--
ALTER TABLE `list_interviewer`
  ADD CONSTRAINT `interviewCollege` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `interviewCourse` FOREIGN KEY (`course_id`) REFERENCES `coursestbl` (`course_id`);

--
-- Constraints for table `schedule_interview`
--
ALTER TABLE `schedule_interview`
  ADD CONSTRAINT `schedCollege` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `schedCourse` FOREIGN KEY (`course_id`) REFERENCES `coursestbl` (`course_id`);

--
-- Constraints for table `selectedcourse`
--
ALTER TABLE `selectedcourse`
  ADD CONSTRAINT `collegeID` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `file_ID` FOREIGN KEY (`file_id`) REFERENCES `attachment` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `applicant_id` FOREIGN KEY (`applicantid`) REFERENCES `cetresult` (`applicantid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
