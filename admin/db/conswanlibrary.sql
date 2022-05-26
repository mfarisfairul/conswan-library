-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 01:21 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conswanlibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_staff`
--

CREATE TABLE `admin_staff` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pnum` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_type` varchar(100) NOT NULL,
  `admin_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_staff`
--

INSERT INTO `admin_staff` (`admin_id`, `firstname`, `middlename`, `lastname`, `username`, `pnum`, `email`, `password`, `confirm_password`, `admin_image`, `admin_type`, `admin_added`) VALUES
(1, 'Faris', 'Bin', 'Fairul', 'farisfairul', '+6011407518', 'muhammaddfaris01@gmail.com', 'faris123', 'faris123', 'faris.jpg', 'Admin', '2021-12-22 15:10:21'),
(8, 'Imran', 'Bin', 'Nizar', 'imrannizar', '+60174751292', 'imrannizar26@gmail.com', 'imran123', 'imran123', 'imran.jpeg', 'Staff', '2021-12-24 14:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `allowed_book`
--

CREATE TABLE `allowed_book` (
  `allowed_book_id` int(11) NOT NULL,
  `total_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allowed_book`
--

INSERT INTO `allowed_book` (`allowed_book_id`, `total_book`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `allowed_days`
--

CREATE TABLE `allowed_days` (
  `allowed_days_id` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allowed_days`
--

INSERT INTO `allowed_days` (`allowed_days_id`, `no_of_days`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `barcode_id` int(11) NOT NULL,
  `pre_barcode` varchar(100) NOT NULL,
  `mid_barcode` int(100) NOT NULL,
  `suf_barcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`barcode_id`, `pre_barcode`, `mid_barcode`, `suf_barcode`) VALUES
(3, 'CONS', 3, 'LMS'),
(4, 'CONS', 4, 'LMS'),
(5, 'CONS', 5, 'LMS'),
(6, 'CONS', 6, 'LMS'),
(7, 'CONS', 7, 'LMS');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_level` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `category_id` int(50) NOT NULL,
  `book_publisher` varchar(100) NOT NULL,
  `year_publish` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `author_2` varchar(100) NOT NULL,
  `author_3` varchar(100) NOT NULL,
  `author_4` varchar(100) NOT NULL,
  `author_5` varchar(100) NOT NULL,
  `book_copies` varchar(50) NOT NULL,
  `book_available` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `book_barcode` varchar(100) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_level`, `isbn`, `category_id`, `book_publisher`, `year_publish`, `author`, `author_2`, `author_3`, `author_4`, `author_5`, `book_copies`, `book_available`, `status`, `book_barcode`, `book_image`, `book_added`) VALUES
(3, 'Skor A+ SPM 2021 Bahasa Inggeris', 'Form 4 & Form 5', '9789672965336', 2, 'Penerbitan Pelangi Sdn Bhd', 2021, 'Mah Chee Wai', 'Vijayan Periasamy', 'Kaithiri Arumugam', '', '', '4', 'Available', 'New', 'CONS4LMS', 'eng1.jpg', '2021-12-23 02:29:52'),
(4, 'Science Process Skills KSSM SPM (2021)', 'Form 5', '9789837719507', 4, 'Sasbadi Sdn Bhd', 2021, 'Yeap Tok Kheng', '', '', '', '', '5', 'Available', 'Old', 'CONS5LMS', 'sc1.jpg', '2021-12-18 03:04:55'),
(5, 'Nexus Sukses Biology SPM', 'Form 5', '98765432123', 15, 'Sasbadi Sdn Bhd', 2019, 'Dr. Yee Bee Choo', 'Travis Shuit', '', '', '', '', 'Not Available', 'Lost', 'CONS6LMS', '', '2021-05-25 05:53:47'),
(6, 'Skor A+ PT3 Bahasa Melayu ', 'Form 3', '878987898789', 1, 'Sasbadi Sdn Bhd', 2018, 'Joey Tan', 'Vijayan Periasamy', '', '', '', '3', 'Still Available', 'Replacement', 'CONS7LMS', '', '2021-12-24 05:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `borrow_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `borrowed_status` varchar(100) NOT NULL,
  `book_penalty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`borrow_book_id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `date_returned`, `borrowed_status`, `book_penalty`) VALUES
(15, 8, 3, '2021-12-29 21:40:58', '2021-12-30 21:40:58', '2021-12-31 22:20:34', 'returned', '1'),
(16, 7, 3, '2022-01-02 02:44:46', '2022-01-03 02:44:46', '0000-00-00 00:00:00', 'borrowed', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `subject_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `subject_category`) VALUES
(1, 'Bahasa Melayu'),
(2, 'English'),
(3, 'Mathematics'),
(4, 'Science'),
(5, 'Sejarah'),
(6, 'Pendidikan Islam'),
(7, 'Pendidikan Moral'),
(8, 'Bahasa Cina'),
(9, 'Bahasa Tamil'),
(10, 'Prinsip Perakaunan'),
(11, 'Ekonomi'),
(12, 'Perniagaan'),
(13, 'Physics'),
(14, 'Chemistry'),
(15, 'Biology'),
(16, 'Additional Mathematics'),
(17, 'Computer Science'),
(18, 'Sains Rumah Tangga'),
(19, 'Reka Cipta');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `penalty_id` int(11) NOT NULL,
  `penalty_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`penalty_id`, `penalty_amount`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `transaction_detail` varchar(100) NOT NULL,
  `transaction_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `book_id`, `user_id`, `admin_name`, `transaction_detail`, `transaction_date`) VALUES
(26, 3, 8, 'Faris Bin Fairul', 'Borrowed Book', '2021-12-29 21:41:00'),
(27, 3, 8, 'Faris Bin Fairul', 'Returned Book', '2021-12-31 22:20:34'),
(28, 3, 7, 'Faris Bin Fairul', 'Borrowed Book', '2022-01-02 02:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `return_book`
--

CREATE TABLE `return_book` (
  `return_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `book_penalty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_book`
--

INSERT INTO `return_book` (`return_book_id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `date_returned`, `book_penalty`) VALUES
(12, 8, 3, '2021-12-29 21:40:58', '2021-12-30 21:40:58', '2021-12-31 22:20:24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(5) NOT NULL,
  `student_num` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `pnum` varchar(15) NOT NULL,
  `homeaddress` varchar(255) NOT NULL,
  `form` varchar(50) NOT NULL,
  `class` varchar(7) NOT NULL,
  `status` varchar(7) NOT NULL,
  `user_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `student_num`, `firstname`, `middlename`, `lastname`, `gender`, `pnum`, `homeaddress`, `form`, `class`, `status`, `user_added`) VALUES
(7, 'F1044', 'Ariff', 'Bin', 'Azmi', 'Male', '+601133482153', 'Puncak Alam,Selangor', 'Form 5', '5SC2', 'Active', '2021-12-29 00:46:02'),
(8, 'P01', 'Nurin Nuwairah', 'Binti', 'Mohd Fairul', 'Female', '+60135200426', 'NO.70, JALAN KIARA, TAMAN KIARA', 'Form 3', '3 Daisy', 'Active', '2021-12-29 00:48:01'),
(9, 'P02', 'NurHusna', 'Binti', 'Md Noordin', 'Female', '+60102940465', 'No. 60,Fasa 2H 32040, Seri Manjung', 'Form 3', '3 Daisy', 'Active', '2021-12-29 00:50:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_staff`
--
ALTER TABLE `admin_staff`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `allowed_book`
--
ALTER TABLE `allowed_book`
  ADD PRIMARY KEY (`allowed_book_id`);

--
-- Indexes for table `allowed_days`
--
ALTER TABLE `allowed_days`
  ADD PRIMARY KEY (`allowed_days_id`);

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`barcode_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD PRIMARY KEY (`borrow_book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`penalty_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `return_book`
--
ALTER TABLE `return_book`
  ADD PRIMARY KEY (`return_book_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_staff`
--
ALTER TABLE `admin_staff`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `allowed_book`
--
ALTER TABLE `allowed_book`
  MODIFY `allowed_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `barcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrow_book`
--
ALTER TABLE `borrow_book`
  MODIFY `borrow_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `return_book`
--
ALTER TABLE `return_book`
  MODIFY `return_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
