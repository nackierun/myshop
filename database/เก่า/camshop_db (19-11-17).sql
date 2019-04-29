-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2017 at 06:01 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `AdminId` int(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `CatId` int(11) NOT NULL,
  `CatName` varchar(100) NOT NULL,
  `StockLimit` int(100) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_count`
--

CREATE TABLE `tbl_count` (
  `CountName` varchar(100) NOT NULL,
  `Count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_count`
--

INSERT INTO `tbl_count` (`CountName`, `Count`) VALUES
('Order', 52),
('Stock', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `MemberId` int(11) NOT NULL,
  `Username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Display` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Surname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Gender` enum('M','F') CHARACTER SET utf8 NOT NULL,
  `Nickname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Address` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `City` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Postcode` varchar(100) CHARACTER SET utf8 NOT NULL,
  `HTel` varchar(100) CHARACTER SET utf8 NOT NULL,
  `MTel` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL,
  `IP` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `OrderId` varchar(100) NOT NULL,
  `MemberId` int(100) NOT NULL,
  `Total` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Shipping` varchar(100) NOT NULL,
  `ShippingDate` date NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `DetailId` int(100) NOT NULL,
  `OrderId` varchar(100) NOT NULL,
  `ProductId` int(100) NOT NULL,
  `Quanlity` int(100) NOT NULL,
  `Price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `MetaKeyword` varchar(100) NOT NULL,
  `MetaDescription` varchar(200) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `CatId` int(11) NOT NULL,
  `ProductCode` varchar(100) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Promotion` enum('Y','N') NOT NULL DEFAULT 'N',
  `New` enum('Y','N') NOT NULL DEFAULT 'N',
  `Quanlity` int(100) NOT NULL,
  `PriceNormal` int(100) NOT NULL,
  `p_price` double NOT NULL,
  `PriceSend` int(100) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_detail` longtext NOT NULL,
  `Popular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `MetaKeyword`, `MetaDescription`, `p_name`, `CatId`, `ProductCode`, `ProductName`, `Promotion`, `New`, `Quanlity`, `PriceNormal`, `p_price`, `PriceSend`, `p_img`, `p_detail`, `Popular`) VALUES
(1, 'camera', 'camera', 'camera', 2, 'camera', 'camera', 'Y', 'Y', 0, 4500, 3000, 0, '2157113320171014_115323.PNG', 'camera', 0),
(2, 'camera', 'camera', 'camera', 2, 'camera', 'camera', 'Y', 'Y', 30, 4200, 3900, 0, '2157113320171014_115323.PNG', 'camera', 0),
(3, 'camera', 'camera', 'camera', 2, 'camera', 'camera', 'Y', 'Y', 17, 4200, 3900, 0, '2157113320171014_115323.PNG', 'camera', 0),
(4, 'camera', 'camera', 'camera', 2, 'camera', 'camera', 'Y', 'N', 22, 15000, 9200, 0, '2157113320171014_115323.PNG', 'camera', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `StockId` varchar(100) NOT NULL,
  `Total` int(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`StockId`, `Total`, `Date`) VALUES
('Stock-00029', 94500, '2012-06-29'),
('Stock-00030', 185250, '2012-06-29'),
('Stock-00031', 325000, '2012-07-01'),
('Stock-00032', 3000, '2012-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_detail`
--

CREATE TABLE `tbl_stock_detail` (
  `DetailId` int(11) NOT NULL,
  `StockId` varchar(100) NOT NULL,
  `ProductId` int(100) NOT NULL,
  `Quanlity` int(100) NOT NULL,
  `Price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`CatId`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`MemberId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`DetailId`);

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
-- Indexes for table `tbl_stock_detail`
--
ALTER TABLE `tbl_stock_detail`
  ADD PRIMARY KEY (`DetailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `AdminId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `DetailId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  MODIFY `ReplyId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_stock_detail`
--
ALTER TABLE `tbl_stock_detail`
  MODIFY `DetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
