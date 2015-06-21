
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Table structure for table `facuties_tbl`
--

CREATE TABLE IF NOT EXISTS `facuties_tbl` (
  `faculties_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `faculties_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`faculties_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `facuties_tbl`
--



-- --------------------------------------------------------

--
-- Table structure for table `stu_score_tbl`
--

CREATE TABLE IF NOT EXISTS `stu_score_tbl` (
  `ss_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(50) NOT NULL,
  `faculties_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `miderm` float NOT NULL,
  `final` float NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `stu_score_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `stu_tbl`
--

CREATE TABLE IF NOT EXISTS `stu_tbl` (
  `roll_no` int(10) NOT NULL,
  `stu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stu_tbl`
--

INSERT INTO `stu_tbl` (`roll_no`,`stu_id`, `f_name`, `l_name`, `gender`, `dob`,  `address`, `phone`, `email`) VALUES
(2116,1 ,'Saif-ur-', 'Rehman', 'Male', '1991-03-01', 'Lahore', '03054038588', 'saif-ur@gmail.com'),
(2115,2 ,'Jazib', 'Bashir', 'Male', '1990-05-04', '  Lahore', '03054038588', 'jazib@yahoo.com'),
(2103,3 ,'Tahir', 'Awan', 'Male', '1988-05-05', '   Lahore', '03054038588', 'tahir@gmail.com   '),
(2110,4 ,'Abdul', 'Jabbar', 'Male', '1989-06-06', 'Lahore', '03054038588 ', 'jabbar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sub_tbl`
--

CREATE TABLE IF NOT EXISTS `sub_tbl` (
  `sub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `faculties_id` varchar(50) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sub_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE IF NOT EXISTS `teacher_tbl` (
  `teacher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `married` char(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_id`, `f_name`, `l_name`, `gender`, `dob`,  `address`, `degree`, `salary`, `married`, `phone`, `email`) VALUES
(1, 'Yameen', 'Bashir', 'Male', '1985-03-05', 'Lahore', 'Master', 1500, 'No', '015 871 787', 'yameen.like@gmail.com'),
(2, 'Atta-ur-', 'Rehman', 'Male', '1986-03-08', 'Lahore', 'Bachelor', 1500, 'Yes', '016 572 393', 'attarehman@gmail.com'),
(3, 'Hussain', 'Naqvi', 'Male', '1990-07-03', 'Lahore', 'Bachelor', 1000, 'Yes', '087 666 55 ', 'hussain@gmail.com'),
(4, 'Maria', 'Atif', 'Male', '0000-00-00', 'Lahore', 'Bachelor', 1000, 'Yes', '099 77 66 33', 'maria@gmail.com');


-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_tbl`
--
INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'Admin');
