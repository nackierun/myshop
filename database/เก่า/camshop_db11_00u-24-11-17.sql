-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2017 at 05:00 AM
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
  `m_detail` varchar(500) CHARACTER SET utf8 NOT NULL,
  `m_fname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_lname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Gender` enum('M','F') CHARACTER SET utf8 NOT NULL,
  `Address` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `City` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_postcode` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_hnumber` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_mnumber` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `m_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`m_id`, `m_username`, `m_password`, `m_detail`, `m_fname`, `m_lname`, `Gender`, `Address`, `City`, `m_postcode`, `m_hnumber`, `m_mnumber`, `m_email`, `m_date`) VALUES
(1, 'nack', 'nack', '', 'nack', '', 'M', 'bangkok', '', '', '', '4564', 'nack@gmail.com', '2017-11-24 02:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(1) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `name`, `address`, `email`, `phone`, `order_status`, `order_date`) VALUES
(2, 'dkawkda', 'wdawd', 'd@gmail.com', '55', 1, '2017-11-24 07:14:17'),
(3, 'dawd', 'dawd', 'd@gmail.com', 'ad', 1, '2017-11-24 07:24:47'),
(4, 'awd', 'daw', 'd@gmail.com', 'daw', 1, '2017-11-24 07:29:29'),
(5, 'dasdd', 'dd', 'd@gmail.com', 'dd', 1, '2017-11-24 07:30:00'),
(6, 'dasdd', 'd', 'd@gmail.com', 'dd', 1, '2017-11-24 07:31:54'),
(7, 'daw', 'wada', 'd@gmail.com', 'awd', 1, '2017-11-24 07:32:19'),
(8, 'à¸™à¸²à¸¢à¸”à¸µ', 'à¸à¸£à¸¸à¸‡à¹€à¸—à¸ž', 'ff@gmail.com', '05125', 1, '2017-11-24 07:46:16'),
(9, 'wd', 'd', 'd@gmail.com', 'ddf', 1, '2017-11-24 10:57:29');

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
(6, 3, 36, 1, 61000),
(5, 0, 37, 1, 65000),
(4, 0, 36, 1, 61000),
(7, 4, 37, 1, 65000),
(8, 4, 36, 1, 61000),
(9, 5, 36, 1, 61000),
(10, 6, 36, 1, 61000),
(11, 7, 36, 1, 61000),
(12, 8, 36, 4, 244000),
(13, 9, 40, 1, 79000);

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
(36, 'A6000', 'sony', 61000, '', 'What is the Sony A6000? Sonyâ€™s new a6000 is an update of the Sony NEX-6, a very well-regarded CSC that managed to stay the course for a good four years. That it lasted so long is testament to how special it was, given the brief shelf-life of new models nowadays. The newcomer, then, has a job to do to match or better the popularity and staying power of its prestigious forbear. Of course, no company would bring out a successor to such an impressive camera thatâ€™s just a tinkered version of the one that went before. So how has Sony looked to improve the model? Well, the distinctive NEX shape has been retained but itâ€™s all change inside, for Sony has included some of best technology it currently has to offer. Read more at http://www.trustedreviews.com/reviews/sony-a6000#bOmkrfVubrS9XzHC.99\r\n\r\nà¸£à¸²à¸„à¸² (à¸šà¸²à¸—)', '2017-11-23 21:34:41'),
(37, 'EOS', 'CANON', 65000, '', 'EOS\r\nBEST CAMERA', '2017-11-23 21:59:38'),
(38, 'XA', 'fuji', 550000, '', 'XA0000\r\n0005', '2017-11-23 22:36:56'),
(39, 'D6', 'NIKON', 65000, '', 'D6', '2017-11-23 22:38:40'),
(40, 'EOS 200D', 'CANON', 79000, '', 'Best Entry-Level DSLR\r\nKey features:\r\n\r\n24.2MP APS-C CMOS sensor\r\nISO 100-25,600 (expandable to ISO 51,200)\r\n5fps continuous shooting\r\n3-inch, 1.04m-dot vari-angle touchscreen LCD\r\nDual Pixel AF / 9-point AF\r\nPentamirror viewfinder with 95% coverage\r\nPositioned between the entry-level 1300D and slightly more advanced 760D/800D models, the Canon EOS 200D succeeds 2013â€™s 100D model bringing with it a generous number of hardware upgrades and feature enhancements. Billed by Canon as a â€œcompact, simple and versatileâ€ camera the 200D is primarily targeted at those looking to buy their first DSLR along with existing owners of older entry-level Canon DSLRs.\r\n\r\nDespite its relatively humble positioning the 200D comes equipped with a good set of features for the price, not least Canonâ€™s Dual Pixel AF technology that employs on-sensor phase-detection pixels for impressively speedy autofocus performance in live view mode. This alone is a big distinguishing factor between the 200D and the cheaper 1300D, which doesnâ€™t get Dual Pixel AF and can be painfully slow to focus in live view. Operated through the viewfinder, the 200D sticks with the same 9-point phase-detection AF system employed by the 1300D and 100D. The other most notable enhancement is the addition of a high-resolution, vari-angle LCD display on the back that provides touchscreen control over the camera. Again, this is something that is absent on the 1300D.\r\n\r\nAt its core the 200D is built around the same 24.2MP APS-C sensor thatâ€™s used inside the 77D and 800D, which is paired with Canonâ€™s latest DIGIC 7 image processor. This raises the cameraâ€™s maximum burst speed up to 5fps â€“ one frame faster than its predecessor. Native sensitivity, meanwhile, ranges from ISO 100 to 25,600 with an expanded â€œHiâ€ setting of ISO 51,200. Shutter speeds range from 30sec to 1/4000sec. Video can be recorded up to a maximum 1080p Full HD at 60fps, with a dedicated microphone jack also provided should you want to use an external mic.\r\n\r\nWhile build quality obviously isnâ€™t as robust as more expensive Canon DSLRs, the 200D feels solid enough in the hand. Itâ€™s also impressively small and compact for a DSLR. In fact, Canon claim itâ€™s the worldâ€™s smallest DSLR to feature a vari-angle LCD. Physical controls although relatively few, are well spaced and easy to reach. Overall, for those looking to buy into the Canon DSLR ecosystem who want something a bit more advanced than the bare-bones 1300D, the 200D represents a solid option.\r\n\r\nAt time of review the Canon EOS 200D was available for Â£579 body-only, or Â£679 with a Canon 18-55mm IS STM kit lens.\r\n\r\n\r\nRead more at http://www.trustedreviews.com/guide/best-dslr-camera#jZJqXOKVV1A8Hou8.99', '2017-11-23 22:44:02'),
(41, 'Sony A9 (Body)', 'sony', 533333, '', 'Color	No\r\nWeight	673.0000\r\nWebsite	No\r\nBrand	SONY\r\nType	Mirrorless\r\nMegapixels	24.2\r\nImage Sensor Type	Full-Frame Stacked CMOS Sensor\r\nFile Formats	JPEG, RAW\r\nStorage Media	SD, SDHC, SDXC, Memory Stick Duo\r\nPower Supply	1 x NP-FZ100 Rechargeable Lithium-Ion Battery Pack, 7.2 VDC, 2280 mAh\r\nBattery Life	No\r\nScreen Size	3\"\r\nWeight	673 g\r\nDimensions	126.9 x 95.6 x 63.0 mm\r\nColor Available	No\r\nMin.SIO	100\r\nMax.ISO	51200\r\nScene Mode	Aperture Priority, Auto, Manual, Program, Shutter Priority Metering Range: EV -3.0 - EV 20.0 Compensation: -5 EV to +5 EV (in 1/3 or 1/2 EV Steps)\r\nShutter Speed (fastest)	1/32000\r\nShutter Speed (lowest)	30\r\nContinuous Shooting	20 fps\r\nLens Mount	Sony E-Mount\r\nLens Compatibility', '2017-11-24 03:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `QuestionId` int(11) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` longtext NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `IP` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Count` int(11) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reply`
--

CREATE TABLE `tbl_reply` (
  `ReplyId` int(100) NOT NULL,
  `QuestionId` int(100) NOT NULL,
  `Description` longtext NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `IP` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`QuestionId`);

--
-- Indexes for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  ADD PRIMARY KEY (`ReplyId`);

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
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  MODIFY `ReplyId` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
