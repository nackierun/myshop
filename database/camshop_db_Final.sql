-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 11:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ad_id` int(11) NOT NULL,
  `ad_user` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `ad_status` varchar(100) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_detail` varchar(100) NOT NULL,
  `ad_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ad_id`, `ad_user`, `ad_password`, `ad_status`, `ad_name`, `ad_detail`, `ad_date`) VALUES
(2, 'admin', 'admin', 'admin', 'thanasak', 'nack', '2017-11-24 01:03:23'),
(3, 'root', '12345678', 'admin', 'nack', 'nack', '2017-11-24 02:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_date`) VALUES
(20, 'sony', '2017-11-23 18:19:33'),
(21, 'fuji', '2017-11-23 18:19:44'),
(25, 'NIKON', '2017-11-23 21:41:32'),
(26, 'CANON', '2017-11-23 21:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `m_id` int(11) NOT NULL,
  `m_username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_level` int(1) NOT NULL,
  `m_fullname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_address` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `m_number` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(1) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `name`, `address`, `email`, `phone`, `order_status`, `order_date`) VALUES
(14, 'à¸•à¸²à¸à¸¥à¹‰à¸­à¸‡à¹ƒà¸™à¸•à¸³à¸™à¸²à¸™', 'à¹€à¸—à¸·à¸­à¸à¹€à¸‚à¸²à¸«à¸´à¸¡à¸²à¸¥à¸±à¸¢', 'cameraman@gmail.com', '0800000', 3, '2017-12-09 01:08:20'),
(13, 'à¸•à¸²à¸à¸¥à¹‰à¸­à¸‡à¹ƒà¸™à¸•à¸³à¸™à¸²à¸™', 'à¹€à¸—à¸·à¸­à¸à¹€à¸‚à¸²', 'cameraman@gmail.com', '0800000', 3, '2017-12-09 01:05:44'),
(12, 'nack', 'nack', 'nack@h.com', '012345', 4, '2017-12-08 22:08:15'),
(11, 'à¹à¸¡à¸§', 'à¸™à¹‰à¸³', 'cat@m.com', '5498', 2, '2017-12-08 07:32:41'),
(15, 'à¸™à¸²à¸¢à¸™à¹‰à¸­à¸¢', 'à¸à¸¥à¸­à¸¢à¹ƒà¸ˆ', 'nainoi@h.com', '4545', 1, '2017-12-09 01:22:07'),
(16, 'à¸à¸²à¸™à¸°à¸¨à¸±à¸à¸”à¸´à¹Œ à¸¨à¸£à¸µà¸ªà¸¸à¸§à¸£à¸£à¸“', 'à¸§à¸±à¸”à¸šà¸²à¸‡à¸™à¸²', 'srisuwan2538@gmail.com', '0917695191', 2, '2017-12-09 17:00:28'),
(17, 'oh3oh', 'bangna Rd.3322', 'thanasak@m.com', '+660000', 1, '2017-12-09 17:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `order_id`, `p_id`, `p_qty`, `total`) VALUES
(25, 16, 70, 1, 59000),
(24, 16, 68, 1, 79000),
(23, 16, 67, 2, 178000),
(22, 15, 71, 1, 78900),
(21, 14, 70, 1, 59000),
(20, 13, 67, 1, 89000),
(19, 12, 72, 1, 49000),
(18, 12, 69, 56, 6210400),
(16, 11, 70, 1, 59000),
(17, 12, 70, 68, 4012000),
(26, 17, 68, 1, 79000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` int(11) NOT NULL,
  `pay_email` varchar(200) NOT NULL,
  `pay_number` varchar(200) NOT NULL,
  `pay_img` varchar(200) NOT NULL,
  `pay_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `pay_email`, `pay_number`, `pay_img`, `pay_date`) VALUES
(8, 'nack@g.com', '123456', '11466633220171208_234214.png', '2017-12-08 16:42:14'),
(9, 'nack@g.com', '12345', '107826000020171209_005758.jpg', '2017-12-08 17:57:58'),
(10, 'cameraman@gmail.com', '0800000', '86319169320171209_010909.PNG', '2017-12-08 18:09:09'),
(11, 'srisuwan2538@gmail.com', '0917695191', '8360657820171209_170259.jpg', '2017-12-09 10:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `p_price` double NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_detail` longtext NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `cat_name`, `p_price`, `p_img`, `p_detail`, `date_save`) VALUES
(67, 'Alpha a7R III', 'sony', 89000, '45850269820171208_063307.png', 'Body type 	SLR-style mirrorless\r\nMax resolution 	7952 x 5304\r\nEffective pixels 	42 megapixels\r\nSensor size 	Full frame (35.9 x 24 mm)\r\nSensor type 	BSI-CMOS\r\nISO 	Auto, 100-32000 (expands to 50-102400)\r\nLens mount 	Sony E', '2017-12-07 23:33:07'),
(68, 'DSC-RX10 IV', 'sony', 79000, '46894076920171208_070103.png', 'The Sony Cyber-shot DSC-RX10 IV is an enthusiast long zoom camera that improves upon its predecessor by adding a new image processor (the Bionz X from the a9), a hybrid AF system with 325 phase-detect points and 24 fps continuous shooting. It continues to use a 20MP 1\"-type stacked CMOS sensor and 24-600mm equiv. F2.4-4 lens. Images can be composed on a new 3\" tilting touchscreen LCD or the same OLED electronic viewfinder found on the RX10 III.', '2017-12-08 00:01:03'),
(69, 'G1 X Mark III', 'CANON', 110900, '32970756120171208_070653.png', 'Body type 	Large sensor compact\r\nMax resolution 	6000 x 4000\r\nEffective pixels 	24 megapixels\r\nSensor size 	APS-C (22.3 x 14.9 mm)\r\nSensor type 	CMOS\r\nISO 	Auto, 100-25600', '2017-12-08 00:06:53'),
(70, 'EOS M100', 'CANON', 59000, '36303619220171208_070817.png', 'Body type 	Rangefinder-style mirrorless\r\nMax resolution 	6000 x 4000\r\nEffective pixels 	24 megapixels\r\nSensor size 	APS-C (22.3 x 14.9 mm)\r\nSensor type 	CMOS\r\nISO 	Auto, 100-25600\r\nLens mount 	Canon EF-M', '2017-12-08 00:08:17'),
(71, 'Fujifilm X-E3', 'fuji', 78900, '19060335820171208_071322.png', 'Body type 	Rangefinder-style mirrorless\r\nMax resolution 	6000 x 4000\r\nEffective pixels 	24 megapixels\r\nSensor size 	APS-C (23.6 x 15.6 mm)\r\nSensor type 	CMOS\r\nISO 	Auto, 200 - 12800 (expandable to 100-51200)\r\nLens mount 	Fujifilm X\r\nFocal length mult. 	1.5Ã—\r\nArticulated LCD 	Fixed\r\nScreen size 	3â€³', '2017-12-08 00:13:22'),
(72, 'Fujifilm X-A3', 'fuji', 49000, '189394593520171208_071500.png', 'Body type 	Rangefinder-style mirrorless\r\nMax resolution 	6000 x 4000\r\nEffective pixels 	24 megapixels\r\nSensor size 	APS-C (23.5 x 15.7 mm)\r\nSensor type 	CMOS\r\nISO 	Auto, 200-6400 (expandable to 100-25600)\r\nLens mount 	Fujifilm X\r\nFocal length mult. 	1.5Ã—', '2017-12-08 00:15:00'),
(73, 'Nikon D850', 'NIKON', 89700, '20424845720171208_071716.png', 'Body type 	Mid-size SLR\r\nMax resolution 	8256 x 5504\r\nEffective pixels 	46 megapixels\r\nSensor size 	Full frame (35.9 x 23.9 mm)\r\nSensor type 	BSI-CMOS\r\nISO 	Auto, 64-25600 (expands to 32-102400)\r\nLens mount 	Nikon F\r\nFocal length mult. 	1Ã—\r\nArticulated LCD 	Tilting\r\nScreen size 	3.2â€³', '2017-12-08 00:17:16'),
(74, 'Nikon D7500', 'NIKON', 78900, '185167438120171208_071835.png', 'The Nikon D7500 is a midrange DSLR that brings updates to the D7200 and also borrows technology from the D500. It features the 20MP CMOS sensor from the D500, making it capable of 4K video at up to 30fps, and expanding its sensitivity to a maximum of ISO 1,640,000. While it keeps the 51-point AF system from the D7200', '2017-12-08 00:18:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
