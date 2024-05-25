-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 08:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pgas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_contact` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(1, 'Edwin Simon', '8606469091', 'edwin321edu@gmail.com', 'edwin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booking_guest` varchar(500) NOT NULL,
  `booking_date` varchar(20) NOT NULL,
  `booking_fromdate` varchar(20) NOT NULL,
  `booking_todate` varchar(50) NOT NULL,
  `booking_status` varchar(500) NOT NULL DEFAULT '0',
  `booking_payment` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `user_id`, `room_id`, `booking_guest`, `booking_date`, `booking_fromdate`, `booking_todate`, `booking_status`, `booking_payment`) VALUES
(10, 29, 13, '2', '2023-11-10', '2023-11-25', '2023-12-20', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, 'Employee'),
(7, 'Student'),
(9, 'Family'),
(10, 'Couple');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(500) NOT NULL,
  `complaint_content` varchar(1000) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_date` varchar(20) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_reply`, `complaint_status`, `user_id`, `complaint_date`, `room_id`) VALUES
(37, 'ou3', 'tetrwy', '', 0, 29, '2023-11-10', 0),
(38, 'lgvydx', ';lujguotf', '', 0, 29, '2023-11-10', 0),
(39, 'lgvydx', ';lujguotf', 'lb hvgviboj\r\n', 1, 29, '2023-11-10', 13),
(40, 'lhyfutc', ';ouguoyf', 'uiyguguywrf', 1, 29, '2023-11-10', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(35, 'Trivandrum'),
(36, 'Kollam'),
(37, 'Pathanamthitta '),
(38, 'Alappuzha'),
(39, 'Kottayam'),
(40, 'Idukki'),
(41, 'Ernakulam'),
(42, 'Trissur'),
(43, 'Palakkad'),
(44, 'Malappuram'),
(45, 'Wayanad'),
(46, 'Kozhikode'),
(47, 'Kannur'),
(48, 'Kasargodu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ftype`
--

CREATE TABLE `tbl_ftype` (
  `ftype_id` int(11) NOT NULL,
  `ftype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ftype`
--

INSERT INTO `tbl_ftype` (`ftype_id`, `ftype_name`) VALUES
(3, 'NON VEGITARIAN'),
(4, 'VEGITARIAN'),
(7, 'NO FOOD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_photo` varchar(500) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_photo`, `room_id`) VALUES
(17, '43927.jpg', 13),
(18, '7165137.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest`
--

CREATE TABLE `tbl_guest` (
  `guest_id` int(11) NOT NULL,
  `guest_name` varchar(50) NOT NULL,
  `guest_address` varchar(500) NOT NULL,
  `guest_gender` varchar(50) NOT NULL,
  `guest_number` varchar(50) NOT NULL,
  `relation_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `guest_photo` varchar(500) NOT NULL,
  `guest_age` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_guest`
--

INSERT INTO `tbl_guest` (`guest_id`, `guest_name`, `guest_address`, `guest_gender`, `guest_number`, `relation_id`, `booking_id`, `guest_photo`, `guest_age`) VALUES
(19, 'kf7riydur', ',jgjchjfxgflujgucfcfyfy', 'Male', '987654310', 11, 10, '7165137.jpg', '2023-11-02'),
(20, 'liyifyyfc', ';iygfutidyr', 'Female', '890876432', 8, 10, '43927.jpg', '2023-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_email` varchar(50) NOT NULL,
  `owner_address` varchar(100) NOT NULL,
  `owner_number` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `owner_gender` varchar(10) NOT NULL,
  `owner_photo` varchar(500) NOT NULL,
  `owner_password` varchar(30) NOT NULL,
  `owner_vstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_owner`
--

INSERT INTO `tbl_owner` (`owner_id`, `owner_name`, `owner_email`, `owner_address`, `owner_number`, `place_id`, `owner_gender`, `owner_photo`, `owner_password`, `owner_vstatus`) VALUES
(17, 'lala', 'lala@gmail.com', '.klhguyogiyghfutfu', '8123456790', 32, 'M', '7165137.jpg', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(20, 'Kovalam', 35),
(21, 'Varkala', 35),
(22, 'Kanykumari', 35),
(23, 'Vizhinjam', 35),
(24, 'Agasthyakoodam', 35),
(25, 'Neendakara', 36),
(26, 'Ambanad', 36),
(27, 'Oachira', 36),
(28, 'Kalladathanni', 36),
(29, 'Sasthamkotta', 36),
(30, 'Gavi', 37),
(31, 'Aranmula', 37),
(32, 'Konni', 37),
(33, 'kullar', 37),
(34, 'Kaviyoor', 37),
(35, 'Arthumkal', 38),
(36, 'Mararikulam', 38),
(37, 'Tottappally', 38),
(38, 'Punnamada', 38),
(39, 'Mannarasala', 38),
(40, 'Munnar', 40),
(41, 'Eravikulam', 40),
(42, 'Vattavada', 40),
(43, 'Tekkadi', 40),
(44, 'Kuttikanam', 40),
(45, 'Kumarakom', 39),
(46, 'Vagamon', 39),
(47, 'Vembanadu', 39),
(48, 'Aruvikuzhi', 39),
(49, 'Marmala', 39),
(50, 'Mattancheri', 40),
(51, 'Fort kochi', 40),
(52, 'Kadamakudy', 40),
(53, 'Cherai', 40),
(54, 'Vallarpadam', 40),
(55, 'Mattancheri', 41),
(56, 'Fort kochi', 41),
(57, 'Kadamakudy', 41),
(58, 'Cherai', 41),
(59, 'Vallarpadam', 41),
(60, 'Athirappilly', 42),
(61, 'Guruvayoor', 42),
(62, 'Kodungallur', 42),
(63, 'Iringalakooda', 42),
(64, 'Chavakadu', 42),
(65, 'Nelliyampathi', 43),
(66, 'Kalpathi', 43),
(67, 'Attapadi', 43),
(68, 'Kollengode', 43),
(69, 'Malampuzha', 43),
(70, 'Tanur', 44),
(71, 'Pazhayangadi', 44),
(72, 'Nilambur', 44),
(73, 'Kadalundi', 44),
(74, 'Kottakunnu', 44),
(75, 'Edakkal', 45),
(76, 'Vythiri', 45),
(77, 'Thirunelly', 45),
(78, 'Kurumbalakotta', 45),
(79, 'Kalpata', 45),
(80, 'Kappadu', 46),
(81, 'Bepoor', 46),
(82, 'Vadakara', 46),
(83, 'Kallayi', 46),
(84, 'Payyoli', 46),
(85, 'Mala', 47),
(86, 'Ezhimala', 47),
(87, 'Arakkal', 47),
(88, 'Tellicherry', 47),
(89, 'Thottada', 47),
(90, 'Ranipuram', 48),
(91, 'Pallikkara', 48),
(92, 'Ananthapuram', 48),
(93, 'Maipadi', 48),
(94, 'kottamcheri', 48);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relation`
--

CREATE TABLE `tbl_relation` (
  `relation_id` int(11) NOT NULL,
  `relation_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_relation`
--

INSERT INTO `tbl_relation` (`relation_id`, `relation_name`) VALUES
(8, 'Wife'),
(9, 'Husband'),
(10, 'son'),
(11, 'Daughter'),
(12, 'Mother'),
(13, 'Father'),
(14, 'Friend'),
(15, 'Grand Father'),
(16, 'Grand Mother'),
(17, 'Relative'),
(18, 'Sibiling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `room_id`, `user_review`, `user_rating`, `user_name`) VALUES
(3, '2023-11-10 10:57:25', 13, 'rtreyetrt', '3', 'rtry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `room_guest` int(11) NOT NULL,
  `room_discription` varchar(500) NOT NULL,
  `room_rent` int(11) NOT NULL,
  `room_security` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `ftype_id` int(11) NOT NULL,
  `room_photo` varchar(500) NOT NULL,
  `room_location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `owner_id`, `room_guest`, `room_discription`, `room_rent`, `room_security`, `category_id`, `ftype_id`, `room_photo`, `room_location`) VALUES
(13, 17, 2, 'fefefef', 23242, '13123', 6, 4, '43927.jpg', 'wdwdw');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subadmin`
--

CREATE TABLE `tbl_subadmin` (
  `subadmin_id` int(11) NOT NULL,
  `subadmin_name` varchar(50) NOT NULL,
  `subadmin_number` varchar(20) NOT NULL,
  `subadmin_email` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL,
  `subadmin_gender` varchar(10) NOT NULL,
  `subadmin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subadmin`
--

INSERT INTO `tbl_subadmin` (`subadmin_id`, `subadmin_name`, `subadmin_number`, `subadmin_email`, `district_id`, `subadmin_gender`, `subadmin_password`) VALUES
(3, 'Aleena Jhon', '2147483647', 'aleena123jhon@gmail.com', 35, 'F', 'aleena'),
(4, 'Simon Daniel', '2147483647', 'simon123daniel@gmail.com', 36, 'M', 'simon'),
(5, 'Victor Joseph ', '2147483647', 'vicor123joseph@gmail.com', 37, 'M', 'victor'),
(6, 'mini Device', '2147483647', 'mini123device@gmail.com', 38, 'F', 'mini'),
(7, 'Jhon Samuel', '2147483647', 'jhon123samuel@gmail.com', 39, 'M', 'jhon'),
(8, 'Antony Sunny', '2147483647', 'antony123sunny@gmail.com', 40, 'M', 'antony'),
(9, 'Lissy marry', '2147483647', 'lissy123marry@gmail.com', 41, 'F', 'lissy'),
(10, 'Melbin Roy', '2147483647', 'melbin123roy@gmail.com', 42, 'M', 'melbin'),
(11, 'Aparna Jose', '9465320078', 'aparna123jose@gmail.com', 43, 'F', 'aparna'),
(12, 'Anil Antony', '6532124578', 'anil123antony@gmail.com', 44, 'M', 'anil'),
(13, 'Teressa jhon', '6465453210', 'teressa123jhon@gmail.com', 45, 'F', 'teressa'),
(14, 'Albert Benny', '7878656512', 'albert123benny@gmail.com', 46, 'M', 'albert'),
(15, 'Gayathi Suresh', '7898654500', 'gayathri123suresh@gmail.com', 47, 'F', 'gayathri'),
(16, 'Arjun Sreenivasan', '9856321470', 'arjun123sreenivasan@gmail.com', 48, 'M', 'arjun'),
(17, 'esdtf', '9834567890', 'abrar1@gmail.com', 47, 'M', '1231');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_number` varchar(20) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_dob` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_proof` varchar(500) NOT NULL,
  `user_photo` varchar(500) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_vstatus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_number`, `user_address`, `user_gender`, `user_dob`, `user_email`, `place_id`, `user_proof`, `user_photo`, `user_password`, `user_vstatus`) VALUES
(29, 'Edwin ', '9123456780', '.khfuitcugcgjcu', 'M', '2023-11-18', '123edu@gmail.com', 32, '43927.jpg', '7165137.jpg', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_ftype`
--
ALTER TABLE `tbl_ftype`
  ADD PRIMARY KEY (`ftype_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_relation`
--
ALTER TABLE `tbl_relation`
  ADD PRIMARY KEY (`relation_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_subadmin`
--
ALTER TABLE `tbl_subadmin`
  ADD PRIMARY KEY (`subadmin_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_ftype`
--
ALTER TABLE `tbl_ftype`
  MODIFY `ftype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_relation`
--
ALTER TABLE `tbl_relation`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_subadmin`
--
ALTER TABLE `tbl_subadmin`
  MODIFY `subadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
