-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2023 at 11:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jomashop_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accId` int(10) NOT NULL,
  `accUsername` text NOT NULL,
  `accPassword` text NOT NULL,
  `accAuthority` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authorities`
--

CREATE TABLE `authorities` (
  `authId` int(10) NOT NULL,
  `authName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorities`
--

INSERT INTO `authorities` (`authId`, `authName`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `billdetails`
--

CREATE TABLE `billdetails` (
  `billDetailId` int(10) NOT NULL,
  `billId` int(10) NOT NULL,
  `watchId` int(10) NOT NULL,
  `quanlity` smallint(6) NOT NULL,
  `soldPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `billId` int(10) NOT NULL,
  `billOrderDate` date NOT NULL,
  `billDeliveryDate` date NOT NULL,
  `billTotal` double NOT NULL,
  `billCustomer` int(10) NOT NULL,
  `billManager` int(10) NOT NULL,
  `billStatus` int(10) NOT NULL,
  `billRevAdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandId` int(10) NOT NULL,
  `brandName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandId`, `brandName`) VALUES
(1, 'Baume'),
(2, 'Breitling'),
(3, 'Cartier'),
(4, 'Citizen'),
(5, 'Hamilton'),
(6, 'Hublot'),
(7, 'Invicta'),
(8, 'IWC'),
(9, 'Longines'),
(10, 'Michael'),
(11, 'Movado'),
(12, 'Omega'),
(13, 'Panerai'),
(14, 'Rolex'),
(15, 'Seiko'),
(16, 'Tag'),
(17, 'Tissot'),
(18, 'Tudor');

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `cartDetailId` int(10) NOT NULL,
  `cartId` int(10) NOT NULL,
  `watchId` int(10) NOT NULL,
  `watchQuanlity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartId` int(10) NOT NULL,
  `cartCustomerId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `caseshapes`
--

CREATE TABLE `caseshapes` (
  `caseId` int(10) NOT NULL,
  `caseName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `caseshapes`
--

INSERT INTO `caseshapes` (`caseId`, `caseName`) VALUES
(1, 'Cushion'),
(2, 'Dodecagon'),
(3, 'Octagon'),
(4, 'Oval'),
(5, 'Rectangle'),
(6, 'Round'),
(7, 'Square'),
(8, 'Tonneau'),
(9, 'Triangle'),
(10, 'Unique');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cateId` int(10) NOT NULL,
  `cateName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cateId`, `cateName`) VALUES
(1, 'Smart Watch'),
(2, 'Watches');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cusId` int(10) NOT NULL,
  `cusFirstName` text NOT NULL,
  `cusLastName` text NOT NULL,
  `cusCompany` text NOT NULL,
  `cusPhone` text NOT NULL,
  `cusEmail` text NOT NULL,
  `cusAdd1` text NOT NULL,
  `cusAdd2` text NOT NULL,
  `cusCity` text NOT NULL,
  `cusState` text NOT NULL,
  `cusZip` text NOT NULL,
  `cusCountry` text NOT NULL,
  `cusAccount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `feaId` int(10) NOT NULL,
  `feaName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`feaId`, `feaName`) VALUES
(1, 'Alarm'),
(2, 'Alligator Leather'),
(3, 'Altimeter'),
(4, 'Analog'),
(5, 'Annual Calendar'),
(6, 'Atomic Timekeeping'),
(7, 'Bluetooth'),
(8, 'Calculator'),
(9, 'Calendar'),
(10, 'Ceramic'),
(11, 'Chronograph'),
(12, 'Chronometer'),
(13, 'Compass'),
(14, 'Day/Night Indicator'),
(15, 'Diamond'),
(16, 'Digital'),
(17, 'Equation of Time'),
(18, 'Flyback'),
(19, 'GMT'),
(20, 'Gold'),
(21, 'GPS'),
(22, 'Heart Rate Monitor'),
(23, 'Leap Year Indicator'),
(24, 'Leather'),
(25, 'Month'),
(26, 'Moon Phase'),
(27, 'Perpetual'),
(28, 'Plastic'),
(29, 'Platinum'),
(30, 'Power Reserve Indicator'),
(31, 'Rattrapante'),
(32, 'Repeater'),
(33, 'Retrograde'),
(34, 'Rubber'),
(35, 'Solar'),
(36, 'Stainless Steel'),
(37, 'Thermometer'),
(38, 'Time Zone'),
(39, 'Titanium'),
(40, 'Tourbillon'),
(41, 'World Time');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `manId` int(10) NOT NULL,
  `manFirstName` text NOT NULL,
  `manLastName` text NOT NULL,
  `manPhone` text NOT NULL,
  `manAccount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE `movements` (
  `moveId` int(10) NOT NULL,
  `moveName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movements`
--

INSERT INTO `movements` (`moveId`, `moveName`) VALUES
(1, 'Movement'),
(2, 'Automatic'),
(3, 'Eco-Drive'),
(4, 'Hand Wind'),
(5, 'Quartz');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `statusId` int(10) NOT NULL,
  `statusName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`statusId`, `statusName`) VALUES
(1, 'Ordered'),
(2, 'Acepted'),
(3, 'Delivering'),
(4, 'Delivered'),
(5, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `styleId` int(10) NOT NULL,
  `styleName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`styleId`, `styleName`) VALUES
(1, 'Casual'),
(2, 'Dive'),
(3, 'Dress'),
(4, 'Fashion'),
(5, 'Luxury'),
(6, 'Military'),
(7, 'Pilot'),
(8, 'Smart'),
(9, 'Sport'),
(10, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeId` int(10) NOT NULL,
  `typeName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeId`, `typeName`) VALUES
(1, 'Analog'),
(2, 'Analog-Digital'),
(3, 'Analog-Digital');

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `brand` int(10) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `model` text NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `sale` double NOT NULL,
  `caseSize` double NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `instock` int(11) NOT NULL,
  `watchLabel` text NOT NULL,
  `movement` int(10) NOT NULL,
  `engine` text NOT NULL,
  `powerReserve` int(11) NOT NULL,
  `caseThickness` double NOT NULL,
  `caseMaterial` text NOT NULL,
  `caseShape` int(10) NOT NULL,
  `caseBack` text NOT NULL,
  `bandMaterial` text NOT NULL,
  `bandType` text NOT NULL,
  `bandColor` text NOT NULL,
  `bandLength` double NOT NULL,
  `bandWidth` double NOT NULL,
  `clasp` text NOT NULL,
  `dialColor` text NOT NULL,
  `type` int(10) NOT NULL,
  `crystal` text NOT NULL,
  `hands` text NOT NULL,
  `dialMarkers` text NOT NULL,
  `secondMarkers` text NOT NULL,
  `lumine` text NOT NULL,
  `bezel` text NOT NULL,
  `bezelColor` text NOT NULL,
  `bezelMaterial` text NOT NULL,
  `crown` text NOT NULL,
  `waterRes` text NOT NULL,
  `calendar` text NOT NULL,
  `func` text NOT NULL,
  `features` int(10) NOT NULL,
  `style` int(10) NOT NULL,
  `warranty` text NOT NULL,
  `department` text NOT NULL,
  `category` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`id`, `name`, `brand`, `description`, `price`, `model`, `gender`, `sale`, `caseSize`, `img1`, `img2`, `img3`, `instock`, `watchLabel`, `movement`, `engine`, `powerReserve`, `caseThickness`, `caseMaterial`, `caseShape`, `caseBack`, `bandMaterial`, `bandType`, `bandColor`, `bandLength`, `bandWidth`, `clasp`, `dialColor`, `type`, `crystal`, `hands`, `dialMarkers`, `secondMarkers`, `lumine`, `bezel`, `bezelColor`, `bezelMaterial`, `crown`, `waterRes`, `calendar`, `func`, `features`, `style`, `warranty`, `department`, `category`) VALUES
(3, 'Slim Runway Black Dial Men\'s Watch', 10, 'Black ion-plated stainless steel case and bracelet. Fixed black ion-plated bezel. Black dial with black hands and index hour markers. Dial Type: Analog. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 44 mm. Case thickness: 9 mm. Band width: 21 mm. Deployment clasp with a push button release.', 99.99, 'MK8507', 1, 20, 44, 'Michael1_1.jpg', 'Michael1_2.jpg', 'Michael1_3.jpg', 100, 'Slim Runway', 5, '0', 0, 9, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Black', 0, 0, 'Deployment with Push Button Release', 'Black', 1, 'Scratch Resistant Mineral', 'Black', 'Index', '0', '0', 'Fixed', 'Black Ion-plated', 'Stainless Steel', 'Pull / Push', '0', '0', 'Hour, Minute, Second', 36, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(4, 'Pyper Quartz Crystal Black Dial Ladies Watch', 10, 'Gold-tone alloy case with a gold-tone alloy bracelet. Fixed gold-tone alloy bezel set with crystals. Black dial with gold-tone hands and crystal hour markers. Dial Type: Analog. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 38 mm. Case thickness: 9 mm. Band width: 16 mm. Fold over clasp with a safety release. Water resistant at 30 meters / 100 feet. Functions: hour, minute, second. Pyper Series. Dress watch style. Michael Kors Pyper Quartz Crystal Black Dial Ladies Watch MK4593.', 99.99, 'MK4593', 1, 30, 38, 'Michael2_1.jpg', 'Michael2_2.jpg', 'Michael2_3.jpg', 100, 'Pyper', 5, 'o', 0, 9, 'Alloy', 6, 'Solid', 'Alloy', 'Bracelet', 'Gold-tone', 0, 0, 'Fold Over with Safety Release', 'Black', 1, 'Scratch Resistant Mineral', 'Gold-tone', 'Crystal', '', '', 'Fixed', 'Gold-tone', 'Alloy set with Crystals', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute, Second', 20, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(5, 'Camille Three-Hand Quartz Crystal Ladies Watch', 10, 'Rose gold-tone stainless steel case with a red leather strap. Fixed rose gold-tone bezel with crystal set. Rose gold and red crystal dial with rose gold-tone hands and alternating Roman numeral and index hour markers. Dial Type: Analog. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape, case size: 33 mm. Band width: 16 mm. Tang clasp. Water resistant at 50 meters / 165 feet. Functions: hour, minute, second. Camille Series. Dress watch style. Michael Kors Camille Three-Hand Quartz Crystal Ladies Watch MK4701.', 109, '\r\nMK4701', 0, 20, 33, 'Michael3_1.jpg', 'Michael3_2.jpg', 'Michael3_3.jpg', 100, 'Camille', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Strap', 'Blue', 0, 0, 'Tang', 'Rose Gold and Red Crystal', 1, 'Scratch Resistant Mineral', 'Rose Gold-tone', 'Alternating Roman Numeral and Index', '', '', 'Fixed', 'Rose Gold-tone', 'Crystal Set', 'Pull / Push', '', '', 'Hour, Minute, Second', 24, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(6, 'Pyper Crystal Black Dial Ladies Watch', 10, 'Yellow gold-tone stainless steel case with a black leather strap. Fixed yellow gold-tone stainless steel bezel. Black dial with yellow gold-tone hands and crystal-tipped index hour markers. Minute markers around the outer rim. Dial Type: Analog. Seiko VJ21 quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 38 mm. Case thickness: 7 mm. Band width: 18 mm. Tang clasp. Water resistant at 50 meters / 165 feet. Functions: hour, minute, second. Casual watch style. Watch label: Japan Movt. Michael Kors Pyper Crystal Black Dial Ladies Watch MK2747.', 93, 'MK2747', 1, 20, 38, 'Michael4_1.jpg', 'Michael4_2.jpg', 'Michael4_3.jpg', 100, 'Japan Movt', 5, 'Seiko Caliber VJ21', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Strap', 'Black', 0, 18, 'Tang', 'Black', 1, 'Scratch Resistant Mineral', 'Yellow Gold-tone', 'Crystal-tipped Index', 'Minute Markers around the outer rim', '', 'Fixed', 'Yellow Gold-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', '', 'Hour, Minute, Second', 20, 1, '2 Year Jomashop Warranty', 'Watches', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accId`),
  ADD KEY `accAuthority` (`accAuthority`);

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`authId`);

--
-- Indexes for table `billdetails`
--
ALTER TABLE `billdetails`
  ADD PRIMARY KEY (`billDetailId`),
  ADD KEY `billId` (`billId`),
  ADD KEY `watchId` (`watchId`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`billId`),
  ADD KEY `billCustomer` (`billCustomer`),
  ADD KEY `billManager` (`billManager`),
  ADD KEY `billStatus` (`billStatus`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`cartDetailId`),
  ADD KEY `cartId` (`cartId`),
  ADD KEY `watchId` (`watchId`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `cartCustomerId` (`cartCustomerId`);

--
-- Indexes for table `caseshapes`
--
ALTER TABLE `caseshapes`
  ADD PRIMARY KEY (`caseId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cateId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cusId`),
  ADD KEY `cusAccount` (`cusAccount`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`feaId`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`manId`),
  ADD KEY `manAccount` (`manAccount`);

--
-- Indexes for table `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`moveId`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`styleId`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand` (`brand`),
  ADD KEY `movement` (`movement`),
  ADD KEY `caseShape` (`caseShape`),
  ADD KEY `type` (`type`),
  ADD KEY `features` (`features`),
  ADD KEY `style` (`style`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `authorities`
--
ALTER TABLE `authorities`
  MODIFY `authId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billdetails`
--
ALTER TABLE `billdetails`
  MODIFY `billDetailId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `billId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `cartDetailId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `caseshapes`
--
ALTER TABLE `caseshapes`
  MODIFY `caseId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cateId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cusId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `feaId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `manId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movements`
--
ALTER TABLE `movements`
  MODIFY `moveId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `statusId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `styleId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `Fk_AcAu` FOREIGN KEY (`accAuthority`) REFERENCES `authorities` (`authId`);

--
-- Constraints for table `billdetails`
--
ALTER TABLE `billdetails`
  ADD CONSTRAINT `Fk_BdBi` FOREIGN KEY (`billId`) REFERENCES `bills` (`billId`),
  ADD CONSTRAINT `Fk_BdWa` FOREIGN KEY (`watchId`) REFERENCES `watches` (`id`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `Fk_BiCu` FOREIGN KEY (`billCustomer`) REFERENCES `customers` (`cusId`),
  ADD CONSTRAINT `Fk_BiMa` FOREIGN KEY (`billManager`) REFERENCES `managers` (`manId`),
  ADD CONSTRAINT `Fk_BiSt` FOREIGN KEY (`billStatus`) REFERENCES `statuses` (`statusId`);

--
-- Constraints for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD CONSTRAINT `Fk_CdCa` FOREIGN KEY (`cartId`) REFERENCES `carts` (`cartId`),
  ADD CONSTRAINT `Fk_CdWa` FOREIGN KEY (`watchId`) REFERENCES `watches` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `Fk_CaCu` FOREIGN KEY (`cartCustomerId`) REFERENCES `customers` (`cusId`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `Fk_CuAc` FOREIGN KEY (`cusAccount`) REFERENCES `accounts` (`accId`);

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `Fk_MaAc` FOREIGN KEY (`manAccount`) REFERENCES `accounts` (`accId`);

--
-- Constraints for table `watches`
--
ALTER TABLE `watches`
  ADD CONSTRAINT `Fk_WaBr` FOREIGN KEY (`brand`) REFERENCES `brands` (`brandId`),
  ADD CONSTRAINT `Fk_WaCp` FOREIGN KEY (`caseShape`) REFERENCES `caseshapes` (`caseId`),
  ADD CONSTRAINT `Fk_WaCt` FOREIGN KEY (`category`) REFERENCES `categories` (`cateId`),
  ADD CONSTRAINT `Fk_WaFe` FOREIGN KEY (`features`) REFERENCES `features` (`feaId`),
  ADD CONSTRAINT `Fk_WaMm` FOREIGN KEY (`movement`) REFERENCES `movements` (`moveId`),
  ADD CONSTRAINT `Fk_WaSt` FOREIGN KEY (`style`) REFERENCES `styles` (`styleId`),
  ADD CONSTRAINT `Fk_WaTy` FOREIGN KEY (`type`) REFERENCES `types` (`typeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
