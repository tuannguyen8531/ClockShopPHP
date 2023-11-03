-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 11:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
(1, '5 Automatic Black Dial Stainless Steel Men\'s Watch', 15, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel. Black dial with luminous hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Day of the week and date display at the 3 o\'clock position. Seiko caliber 7S26 automatic movement with a 40-hour power reserve. Scratch resistant Hardlex crystal. Skeleton case back. Round case shape. Case size: 37 mm. Case thickness: 12 mm. Band width: 19 mm. Fold over clasp with a push button release. Water resistant at 30 meters / 100 feet. Functions: date, day, hour, minute, second. Additional Info: day and date display at 3. silver tone hands, hour markers. Casual watch style. Seiko 5 Automatic Black Dial Stainless Steel Men\'s Watch SNXS79K1.', 109, 'SNXS79K1', 1, 56, 37, 'Seiko1_1.jpg', 'Seiko1_2.jpg', 'Seiko1_3.jpg', 100, 'Seiko 5', 2, 'Seiko Caliber 7S26', 40, 12, 'Stainless Steel', 6, 'Skeleton', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 19, 'Fold Over with Push Button Release', 'Black', 1, 'Scratch Resistant Hardlex', 'Luminous', 'Index', 'Minute markers around the outer rim', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', '', '30 meters / 100 feet', 'Day of the week and Date display at the 3 o\'clock position', 'Date, Day, Hour, Minute, Second', 36, 1, '3 Year Jomashop Warranty', 'Watches', 2),
(2, '5 Automatic Black Arabic Dial Men\'s Watch', 15, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Black dial with luminous silver-tone hands and arabic numeral hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Day of the week and date display at the 3 o\'clock position. Seiko Caliber 7S26 Automatic movement, based upon Seiko 7002, containing 21 Jewels, bitting at 21600 vph, and has a power reserve of approximately 40 hours. Scratch resistant mineral crystal. Pull / push crown. Transparent see through case back. Round case shape, case size: 42 mm. Band width: 22 mm. Fold over clasp with a push button release. Water resistant at 50 meters / 165 feet. Functions: date, day, hour, minute, second. Seiko 5 Series. Casual watch style. Watch label: Made in Japan. Seiko 5 Automatic Black Dial Men\'s Watch SNKP21J1.', 169, 'SNKP21J1', 1, 32, 42, 'Seiko2_1.jpg', 'Seiko2_2.jpg', 'Seiko2_3.jpg', 100, 'Seiko 5', 2, 'Seiko Caliber 7S26', 40, 0, 'Stainless Steel', 6, 'Transparent See Through', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 22, 'Fold Over with Push Button Release', 'Black', 1, 'Scratch Resistant Mineral', 'Luminous Silver-tone', 'Arabic Numeral', 'Minute Markers around the outer rim', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', 'Day of the Week and Date display at the 3 o\'clock position', 'Date, Day, Hour, Minute, Second', 4, 1, '3 Year Jomashop Warranty', 'Watches', 2),
(3, 'Chronograph Quartz Champagne Dial Men\'s Watch\r\n', 15, 'Stainless steel case with a black leather strap. Fixed stainless steel bezel. Champagne dial with luminous silver-tone dauphine-style hands and index hour markers. Minute markers. Tachymeter markings around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display between the 4 and 5 o\'clock positions. Chronograph - three sub-dials displaying: 60 second, 60 minute and 12 hour. Seiko caliber 8T67 quartz movement. Scratch resistant Hardlex crystal. Pull / push crown. Solid case back. Round case shape. Case size: 40 mm. Case thickness: 12 mm. Band width: 20 mm. Tang clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second, tachymeter. Chronograph Series. Sport watch style. Watch label: Japan Movt. Seiko Chronograph Quartz Champagne Dial Men\'s Watch SSB383.', 120, 'SSB383', 1, 63, 42, 'Seiko3_1.jpg', 'Seiko3_2.jpg', 'Seiko3_3.jpg', 100, 'Chronograph', 5, 'Seiko Caliber 8T67', 0, 12, 'Stainless Steel', 6, 'Solid', 'Leather', 'Strap', 'Black', 0, 20, 'Tang', 'Champagne', 1, 'Scratch Resistant Hardlex', 'Luminous Silver-tone Dauphine-style', 'Index', 'Minute Markers. Tachymeter Markings around the outer rim', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '100 meters / 330 feet', 'Date display between the 4 and 5 o\'clock positions', 'Date, Hour, Minute, Second, Tachymeter', 11, 9, '3 Year Jomashop Warranty', 'Watches', 2),
(4, 'Essentials Quartz White Dial Unisex Watch', 15, 'Yellow gold-tone stainless steel case with a black (croco-embossed) leather strap. Fixed yellow gold-tone stainless steel bezel. White dial with black hands and Roman numeral hour markers. Minute markers around an inner ring. Dial Type: Analog. Caliber 4N30 quartz movement. Scratch resistant Hardlex crystal. Pull / push crown. Solid case back. Rectangle case shape, case size: 38 x 28 mm, case thickness: 6 mm. Band width: 24 mm. Tang clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute. Essentials Series. Casual watch style. Watch label: Japan Movt. Seiko Essentials Quartz White Dial Unisex Watch SWR052.', 129, 'SWR052', 2, 40, 38.28, 'Seiko4_1.jpg', 'Seiko4_2.jpg', 'Seiko4_3.jpg', 100, 'Essentials', 5, 'Caliber 4N30', 0, 6, 'Stainless Steel', 5, 'Solid', '(Croco-Embossed) Leather', 'Strap', 'Black', 0, 24, 'Tang', 'White', 1, 'Scratch Resistant Hardlex', 'Black', 'Roman Numeral', 'Minute Markers around an inner ring', '', 'Fixed', 'Yellow Gold-tone', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute', 20, 1, '3 Year Jomashop Warranty', 'Watches', 2);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
