-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 09:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `businessmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `business` varchar(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `date`, `business`, `customer`, `amount`) VALUES
(1, '2018-04-12', 'Jia Enterpr', 201801271, 17000),
(2, '2018-04-22', 'Jia Enterpr', 201801271, 5800),
(3, '2018-04-22', 'Jia Enterpr', 201801271, 5800),
(4, '2018-04-22', 'Jia Enterpr', 201801271, 5800),
(5, '2018-04-22', 'Jia Enterpr', 201801271, 0),
(6, '2018-04-22', 'Jia Enterpr', 201801271, 5800),
(7, '2018-04-22', 'Jia Enterpr', 201801271, 10),
(8, '2018-04-23', 'Jia Enterpr', 201801271, 4050),
(9, '2018-04-23', 'Jia Enterpr', 201801271, 670);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'ASUS'),
(2, 'LENOVO'),
(5, 'LG'),
(4, 'MI'),
(9, 'MICROMAX'),
(10, 'motorola'),
(3, 'NOKIA'),
(8, 'OPPO'),
(6, 'SAMSUNG'),
(7, 'VIVO');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `business_owner` varchar(255) NOT NULL,
  `business_password` varchar(255) NOT NULL,
  `GSTIN` varchar(255) DEFAULT NULL,
  `business_PAN` varchar(255) NOT NULL,
  `business_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `business_name`, `business_address`, `business_owner`, `business_password`, `GSTIN`, `business_PAN`, `business_mobile`) VALUES
(1, 'Jia Enterprises', 'Balua, Motihari', 'sameer', '', NULL, 'CTUPK7744L', '8109698905'),
(2, 'V3', 'Indra chok, main market,hoshangabad', 'vaishali', '', NULL, 'VAISH1609V', '9856324170'),
(3, 'Sharma''s', 'I.T.I road, shanti nagar,hoshangabad', 'vaibhav', '', NULL, 'VISHU0601S', '9827282946'),
(4, 'JIA ', 'agarwa motihari,Bihar', 'jiyakhan', '', NULL, 'JIYA1997J', '9584761100'),
(5, 'NAYAR''S', 'ayodhaya baipass,bhopal', 'vishal', '', NULL, 'VISH2009K', '9827546200'),
(6, 'Sai opticals', 'haosing board,gwalior', 'Karansingh', '', NULL, 'KARAN1820N', '7548623540'),
(7, 'V4', 'station ke pichhe, hoshangabad', 'vaishali', '', NULL, 'JHKGT1111H', '8754129636'),
(21, 'samtrik', 'gopalpur', 'samtrik', '12345', 'poiertojdfkfji', 'ctupk7748l', '123456789098'),
(22, 'priya kush', 'l-1144 renukoot', 'piya', 'priyanka', '12345', '123456', '8269799760');

-- --------------------------------------------------------

--
-- Table structure for table `businessbrandmapping`
--

CREATE TABLE `businessbrandmapping` (
  `id` int(11) NOT NULL,
  `business` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businessbrandmapping`
--

INSERT INTO `businessbrandmapping` (`id`, `business`, `brand`) VALUES
(1, 'JIA ', ''),
(2, 'Jia Enterprises', 'MICROMAX'),
(3, 'NAYAR''S', ''),
(4, 'priya kush', ''),
(5, 'Sai opticals', ''),
(6, 'Sharma''s', ''),
(7, 'V3', ''),
(8, 'V4', ''),
(9, 'Jia Enterprises', 'LENOVO'),
(10, 'Jia Enterprises', 'ASUS'),
(11, 'Jia Enterprises', 'OPPO'),
(12, 'Jia Enterprises', 'MICROMAX'),
(13, 'Jia Enterprises', 'NOKIA');

-- --------------------------------------------------------

--
-- Table structure for table `businesscategorymapping`
--

CREATE TABLE `businesscategorymapping` (
  `id` int(11) NOT NULL,
  `business` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businessmodelmapping`
--

CREATE TABLE `businessmodelmapping` (
  `id` int(11) NOT NULL,
  `business` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businesssubmodelmapping`
--

CREATE TABLE `businesssubmodelmapping` (
  `id` int(11) NOT NULL,
  `sub_model_name` varchar(255) NOT NULL,
  `business_owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(6, 'All books'),
(4, 'Beauty,Health,Grocery'),
(1, 'electronics'),
(2, 'mobiles,computers'),
(5, 'Toys,Baby products'),
(3, 'TV,Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `name`, `email`, `mobile`, `address`) VALUES
(1, 201801271, 'hasan', 'hrajakhan@gmail.com', '7739856619', 'agarwa, motihari'),
(7, 201801301, 'Rajesh kumar', 'rajesh31@gmail.com', '9658745210', 'shayam nagar, gwalior.'),
(8, 201802161, 'kunal singh', 'kunal14@gmail.com', '7548963250', 'narayan nagar,bhopal'),
(9, 201813141, 'Smeer ', 'sam29@gamil.com', '7584963250', 'motihari, bihar'),
(10, 201804122, 'Narayani devi', 'narayni63@gmail.com', '8159632410', 'kali nagar,jhansi'),
(11, 201805192, 'laxmi nayar', 'laxmi08@gmail.com', '9568745231', 'kalika nagar,bihar');

-- --------------------------------------------------------

--
-- Table structure for table `customercount`
--

CREATE TABLE `customercount` (
  `value` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customercount`
--

INSERT INTO `customercount` (`value`, `date`) VALUES
(2, '2018-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `brand`) VALUES
(1, 'edge s9', 'ASUS'),
(2, 'K5+', 'LG'),
(3, 'REDMI3Sprime', 'MI'),
(4, 'SM-G313HU', 'ASUS'),
(5, 'LUMIA360', 'ASUS'),
(6, 'ZENPHONESELFEE', 'MI'),
(7, 'Nokia6', 'NOKIA'),
(8, 'Lenovo k8 note', 'LENOVO'),
(9, 'Lenovo k6600 plus', 'LENOVO'),
(10, 'Asus zenfone 3', 'ASUS'),
(11, 'Nokia lumia 536', 'NOKIA'),
(12, 'Micromax canvas juice 3', 'MICROMAX'),
(13, 'Canvas spark 2 ', 'MICROMAX'),
(14, 'canvas xpress 2', 'MICROMAX'),
(15, 'Canvas sliver 2', 'MICROMAX'),
(16, 'Bolt D303', 'MICROMAX'),
(17, 'Samsung Galaxy j2 pro', 'SAMSUNG'),
(18, 'Samsung Galaxy J7+', 'SAMSUNG'),
(19, 'Samsung Galaxy A5', 'SAMSUNG'),
(20, 'Samsung galaxy A7', 'SAMSUNG'),
(21, 'Samsung galaxy c5 pro', 'SAMSUNG'),
(22, 'Vivo V5 Lite', 'VIVO'),
(23, 'Vivo V5', 'VIVO'),
(24, 'Vivo V7+', 'VIVO'),
(25, 'Vivo V3', 'VIVO'),
(26, 'Vivo Y66', 'VIVO'),
(27, 'Oppo A71', 'OPPO'),
(28, 'Oppo F5', 'OPPO'),
(29, 'Oppo A83', 'OPPO'),
(30, 'Oppo F3 Lite', 'OPPO'),
(31, 'oppo R9s plus', 'OPPO'),
(32, 'Moto X4', 'motorola'),
(33, 'moto G5S', 'motorola'),
(34, 'Moto G5S plus', 'motorola'),
(35, 'Moto Z2 force', 'motorola'),
(36, 'Moto C plus', 'motorola'),
(37, 'Moto E4', 'motorola'),
(38, 'Moto E4 plus', 'motorola'),
(40, 'Moto G5 plus', 'motorola'),
(41, 'Moto M2', 'motorola'),
(42, 'Mi 5X', 'MI'),
(43, 'Mi Max 2', 'MI'),
(44, 'Mi 6 plus', 'MI'),
(45, 'Mi 5c', 'MI'),
(46, 'Mi A1', 'MI'),
(47, 'MI Note 3', 'MI'),
(48, 'Mi max', 'MI');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_serial` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `bill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_serial`, `customer_id`, `bill`) VALUES
(1, '65748', '201801271', 1),
(2, '75378272', '201801271', 201804221),
(3, '45789000', '201801271', 201804221),
(9, '2456789', '201801271', 201804231);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `owner_mobile` varchar(255) NOT NULL,
  `owner_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `owner_name`, `owner_email`, `username`, `password`, `owner_mobile`, `owner_address`) VALUES
(1, 'vaishali kahar', 'vaishalikahar63@gmail.com', 'vaishali', 'vaishu12345', '9770095397', 'kachde dabba k pichhe, bus adda, hoshangabad'),
(2, 'sameer', 'sameer@123.com', 'sameer', 'sameer123', '8109698905', 'agarwa, motihari'),
(3, 'Karan singh', 'karansingh18@gmail.com', 'Karansingh', '123456789', '9857764669', 'narayan nagar,bhanpur,gwalior.'),
(4, 'Vaibhav sharma', 'vaibhav96@gmail.com', 'vaibhav', '123456789', '9827282946', 'I.T.I road, shanti nagar, hoshangabad'),
(5, 'Vishal nayar', 'vishalnayar20@gmail.com', 'vishal', '123456789', '9584779650', 'haosing board colony,bhopal'),
(6, 'Kunal ajneriya', 'kunal63@gmail.com', 'kunal', '123456789', '7584996320', 'kolhar road,bhopal'),
(7, 'Vaishnavi jha', 'vaishnavijha06@gmail.com', 'vaishnavi', '987654321', '7895462309', 'arera colony, bhopal'),
(8, 'Jiya khan', 'jiyakhan20@gmail.com', 'jiyakhan', '98754321', '9584762510', 'manakchi road,jharkhand'),
(11, 'ahmad', 'ahmad@gmail.com', 'ahmad', 'ahmad123', '9876543210', 'wdwhfdifgihfwhfi'),
(12, 'jhjuh', 'sfh@gmail.com', 'ggjhjh', 'abc', '65656', 'hih'),
(13, 'priyanka', 'priya@gmail.com', 'priya', 'priya123', '985647222', 'cuhgejsetpoihuhcoxyutwaodqwdnzvp'),
(14, 'samtrik', 'samtrik@yahoo.com', 'samtrik', 'samtrik123', '12345678901', 'motihari, bihar'),
(15, 'priya', 'goldy.priya30@gmail.com', 'piya', 'priyanka', '8269799760', 'kushum jain bhopal');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `business` varchar(255) NOT NULL,
  `CP` int(11) NOT NULL,
  `MP` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `availability` enum('sold','available','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `serial_number`, `category`, `brand`, `model`, `business`, `CP`, `MP`, `tax`, `availability`) VALUES
(1, '75378272', 'electronics', 'LENOVO', 'Lenovo k8 note', 'Jia Enterprises', 6738, 646, 5, 'available'),
(2, '45789000', 'mobiles,computers', 'MICROMAX', 'Micromax canvas juice 3', 'Jia Enterprises', 47889, 4588, 12, 'sold'),
(3, '2456789', 'TV,Electronics', 'OPPO', 'Oppo A71', 'Jia Enterprises', 467896, 3467, 18, 'sold'),
(4, '1234567689', 'electronics', 'ASUS', 'edge s9', 'Jia Enterprises', 2345, 234, 5, 'sold'),
(6, '123456', 'electronics', 'NOKIA', 'Nokia6', 'priya kush', 24000, 1200, 5, 'available'),
(7, '1236988', 'All books', 'LENOVO', 'Lenovo k8 note', 'priya kush', 12999, 1200, 12, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `sub_model`
--

CREATE TABLE `sub_model` (
  `id` int(11) NOT NULL,
  `sub_model_name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `name` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`) VALUES
(1, 0),
(2, 5),
(3, 12),
(4, 18),
(5, 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`business_name`),
  ADD UNIQUE KEY `mobile` (`business_mobile`),
  ADD UNIQUE KEY `PAN` (`business_PAN`),
  ADD UNIQUE KEY `GSTIN` (`GSTIN`);

--
-- Indexes for table `businessbrandmapping`
--
ALTER TABLE `businessbrandmapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesscategorymapping`
--
ALTER TABLE `businesscategorymapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businessmodelmapping`
--
ALTER TABLE `businessmodelmapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesssubmodelmapping`
--
ALTER TABLE `businesssubmodelmapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product` (`product_serial`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`owner_email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile` (`owner_mobile`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ni` (`serial_number`);

--
-- Indexes for table `sub_model`
--
ALTER TABLE `sub_model`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_model_name` (`sub_model_name`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `businessbrandmapping`
--
ALTER TABLE `businessbrandmapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `businesscategorymapping`
--
ALTER TABLE `businesscategorymapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `businessmodelmapping`
--
ALTER TABLE `businessmodelmapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `businesssubmodelmapping`
--
ALTER TABLE `businesssubmodelmapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sub_model`
--
ALTER TABLE `sub_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
