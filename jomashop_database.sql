-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 09:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(2, 'Analog-Digital');

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
(4, 'Essentials Quartz White Dial Unisex Watch', 15, 'Yellow gold-tone stainless steel case with a black (croco-embossed) leather strap. Fixed yellow gold-tone stainless steel bezel. White dial with black hands and Roman numeral hour markers. Minute markers around an inner ring. Dial Type: Analog. Caliber 4N30 quartz movement. Scratch resistant Hardlex crystal. Pull / push crown. Solid case back. Rectangle case shape, case size: 38 x 28 mm, case thickness: 6 mm. Band width: 24 mm. Tang clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute. Essentials Series. Casual watch style. Watch label: Japan Movt. Seiko Essentials Quartz White Dial Unisex Watch SWR052.', 129, 'SWR052', 2, 40, 38.28, 'Seiko4_1.jpg', 'Seiko4_2.jpg', 'Seiko4_3.jpg', 100, 'Essentials', 5, 'Caliber 4N30', 0, 6, 'Stainless Steel', 5, 'Solid', '(Croco-Embossed) Leather', 'Strap', 'Black', 0, 24, 'Tang', 'White', 1, 'Scratch Resistant Hardlex', 'Black', 'Roman Numeral', 'Minute Markers around an inner ring', '', 'Fixed', 'Yellow Gold-tone', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute', 20, 1, '3 Year Jomashop Warranty', 'Watches', 2),
(5, 'Riviera Automatic Blue Dial Men\'s Watch MOA', 1, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Blue dial with luminous silver-tone hands and index hour markers. Roman numerals appear at the 6 and 12 o\'clock positions. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Automatic movement. Scratch resistant sapphire crystal. Pull / push crown. Transparent case back. Dodecagon case shape, case size: 42 mm. Butterfly deployant clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Riviera Series. Sport watch style. Watch label: Swiss Made. Baume et Mercier Riviera Automatic Blue Dial Men\'s Watch MOA10620.', 1500, 'MOA10620', 1, 33, 42, 'baume1.jpg', 'baume1_1.jpg', 'baume1_2.jpg', 100, 'Swiss Made', 2, '', 0, 0, '', 2, 'Transparent', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Butterfly Deployant', 'Blue', 1, 'Scratch Resistant Sapphire', 'Scratch Resistant Sapphire', 'Index', 'Roman Numerals appear at the 6 and 12 o\'clock positions.', 'Hands and Markers\r\n', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 9, '2 Year Jomashop Warranty', 'Watches', 2),
(6, 'Riviera 1020 Automatic Smokey Grey Dial Unisex Watch', 1, 'Satin-finished stainless steel case with a grey rubber strap. Fixed satin-finished titanium bezel. Smokey grey dial with rose gold-tone hands and index-Roman numeral hour markers. Roman numeral marker appears at the 6 and 12 o\'clock position. Date scale around the outer rim. Dial Type: Analog. Luminescent hands and markers. Baume et Mercier Calibre BM13-1975A COSC Automatic movement, containing 21 Jewels, bitting at 28800 vph, and has a power reserve of approximately 120 hours. Scratch resistant sapphire crystal. Transparent case back. Dodecagonal case shape, case size: 39 mm, case thickness: 10.31 mm. Folding clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Riviera 1020 Series. Luxury watch style. Watch label: Swiss Made. Baume et Mercier Riviera 1020 Automatic Smokey Grey Dial Unisex Watch M0A10720.', 2670.9, 'M0A10720', 2, 30, 39, 'baume2.jpg', 'baume2_1.jpg', 'baume2_2.jpg', 100, 'Swiss Made', 2, 'Baume et Mercier Calibre BM13-1975A COSC', 120, 10.31, 'Stainless Steel', 6, 'Transparent', 'Rubber', 'Strap', 'Grey', 0, 0, 'Folding', 'Smokey Grey', 1, 'Scratch Resistant Sapphire', 'Rose Gold-tone', 'Index-Roman Numeral', '\r\nRoman Numeral Marker appears at the 6 and 12 o\'clock position. Date Scale around the outer rim', 'Hands and Markers', 'Fixed', 'Satin-finished', 'Titanium', '', '100 meters / 330 feet', '', 'Date, Hour, Minute, Second', 39, 5, '', 'Watches', 2),
(7, 'Clifton Chronograph Automatic Black Dial Men\'s Watch', 1, 'Silver-tone stainless steel case with a black leather strap. Fixed silver-tone stainless steel bezel. Black dial with silver-tone hands and Arabic numeral hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Day of the week and date display at the 3 o\'clock position. Automatic movement. Scratch resistant sapphire crystal. Pull / push crown. Transparent case back. Round case shape, case size: 44 mm, case thickness: 14.9 mm. Band width: 22 mm, band length: 8 inches. Deployment with push button release clasp. Water resistant at 50 meters / 165 feet. Functions: chronograph, day, date, hour, minute, second. Additional Info: hours, minutes, seconds, day-date, chronograph. Clifton Series. Luxury watch style. Watch label: Swiss Made. Baume et Mercier Clifton Chronograph Automatic Black Dial Men\'s Watch M0A10372.', 1650, 'M0A10372', 1, 61, 44, 'baume3.jpg', 'baume3_1.jpg', 'baume3_2.jpg', 100, 'Swiss Made', 2, '', 0, 14.9, 'Swiss Made', 6, 'Transparent', 'Leather', 'Strap\r\n', 'Black', 8, 22, 'Deployment with Push Button Release', 'Black', 1, 'Scratch Resistant Sapphire', 'Silver-tone', 'Arabic Numeral', 'Minute Markers around the outer rim', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', 'Day of the Week and Date display at the 3 o\'clock position', 'Chronograph, Day, Date, Hour, Minute, Second', 11, 5, '', 'Watches\r\n', 2),
(8, 'Riviera Automatic Blue Dial Men\'s Watch', 1, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel. Transparent blue sapphire dial with luminous silver-tone hands and index hour markers. Roman numerals appear at the 6 and 12 o\'clock positions. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Baumatic BM13-1975A automatic movement with a 120-hour power reserve. Scratch resistant sapphire crystal. Transparent case back. Dodecagon case shape, case size: 42 mm, case thickness: 10.7 mm. Deployment with push button release clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Additional Info: original box, manual (complete accessories). Riviera Series. Luxury watch style. Watch label: Swiss Made. Baume et Mercier Riviera Automatic Blue Dial Men\'s Watch M0A10616.', 2034, 'M0A10616', 1, 30, 42, 'baume4.jpg', 'baume4_1.jpg', 'baume4_2.jpg', 100, 'Swiss Made', 2, 'Baumatic BM13-1975A', 120, 10.7, 'Stainless Steel', 2, 'Transparent\r\n', 'Transparent\r\n', 'Bracelet', 'Silver-tone', 0, 0, 'Deployment with Push Button Release', 'Transparent Blue Sapphire', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Index', 'Roman Numerals appear at the 6 and 12 o\'clock positions', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', '', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(9, 'Riviera Automatic Green Dial Men\'s Watch', 1, 'Stainless steel case with a green rubber strap. Fixed stainless steel bezel. Green dial with luminous silver-tone hands and index hour markers. Roman numerals appear at the 6 and 12 o\'clock positions. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Automatic movement. Scratch resistant sapphire crystal. Pull / push crown. Transparent case back. Dodecagon case shape. Case size: 42 mm. Fold over clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Riviera Series. Sport watch style. Watch label: Swiss Made. Baume et Mercier Riviera Automatic Green Dial Men\'s Watch MOA10618.', 1050, 'MOA10618', 1, 31, 42, 'baume5.jpg', 'baume5_1.jpg', 'baume5_2.jpg', 100, 'Swiss Made', 2, '', 0, 0, 'Stainless Steel', 2, 'Transparent', 'Rubber', 'Strap', 'Green', 0, 0, 'Fold Over', 'Green', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Index', 'Roman Numerals appear at the 6 and 12 o\'clock positions', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 9, '2 Year Jomashop Warranty', 'Watches', 2),
(10, 'Riviera Automatic Blue Dial Men\'s Watch', 1, 'Stainless steel case with a blue rubber strap. Fixed stainless steel bezel. Blue dial with luminous silver-tone hands and index hour markers. Roman numerals appear at the 6 and 12 o\'clock positions. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Automatic movement. Scratch resistant sapphire crystal. Screw down crown. Transparent case back. Dodecagon case shape. Case size: 42 mm. Fold over clasp with a push button release. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Riviera Series. Sport watch style. Watch label: Swiss Made. Baume et Mercier Riviera Automatic Blue Dial Men\'s Watch MOA10619.', 1700, 'MOA10619', 1, 30, 42, 'baume6.jpg', 'baume6_1.jpg', 'baume6_2.jpg', 100, 'Swiss Made', 2, '', 0, 0, 'Stainless Steel', 2, 'Transparent', 'Rubber', 'Strap', 'Blue\r\n', 0, 0, 'Fold Over with Push Button Release', 'Blue', 1, 'Scratch Resistant Sapphir', 'Luminous Silver-tone', 'Index', 'Roman Numerals appear at the 6 and 12 o\'clock positions', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Screw Down\r\n', '100 meters / 330 feet\r\n', 'Date Display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 9, '2 Year Jomashop Warranty', 'Watches', 2),
(11, 'Classima Automatic Men\'s Watch', 1, 'Stainless steel case with a black (calfskin) leather strap. Fixed stainless steel bezel. White dial with silver-tone rhodium-plated leaf-style hands and index hour markers. Roman numerals mark the 3, 6, 9 and 12 o\'clock positions. Minute markers around the outer rim. Dial Type: Analog. Date display at the 3 o\'clock position. Sellita caliber SW200 automatic movement, containing 26 Jewels, bitting at 28800 vph, and has a power reserve of approximately 38 hours. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape. Case size: 42 mm. Case thickness: 9 mm. Band width: 22 mm. Tang clasp. Water resistant at 50 meters / 165 feet. Functions: date, hour, minute, second. Classima Series. Luxury watch style. Watch label: Swiss Made. Item Variations: A10332, 10332. Baume et Mercier Classima Automatic Men\'s Watch MOA10332.', 1900, 'MOA10332', 1, 37, 42, 'baume7.jpg', 'baume7_1.jpg', 'baume7_2.jpg', 100, 'Swiss Made', 2, 'Sellita Caliber SW200', 38, 9, 'Stainless Steel', 6, 'Solid', '(Calfskin) Leather', 'Strap', 'Black', 0, 22, 'Tang', 'White', 1, 'Scratch Resistant Sapphire', 'Silver-tone Rhodium-plated Leaf-style', 'Index', 'Roman Numerals mark the 3, 6, 9 and 12 o\'clock positions. Minute Markers around the outer rim', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(12, 'Classima Automatic Green Dial Men\'s Watch', 1, 'Silver-tone stainless steel case with a green canvas strap. Fixed silver-tone stainless steel bezel. Green dial with black hands and Roman & index hour markers. Minute markers around the outer rim. Dial Type: Analog. Date display at the 3 o\'clock position. Automatic movement. Solid case back. Round case shape, case size: 42 mm. Buckle clasp. Water resistant at 50 meters / 165 feet. Functions: date, hour, minute, second. Classima Series. Casual watch style. Watch label: Swiss Made. Baume et Mercier Classima Automatic Green Dial Men\'s Watch M0A10696.', 1070, 'M0A10696', 1, 40, 42, 'baume8.jpg', 'baume8_1.jpg', 'baume8_2.jpg', 100, 'Swiss Made', 2, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Canvas', 'Strap', 'Green', 0, 0, 'Buckle', 'Green', 1, '', 'Black', 'Roman & Index', 'Minute Markers around the outer rim', '', 'Fixed', 'Silver-tone', 'Stainless Steel', '', '50 meters / 165 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 1, '', 'Watches', 2),
(13, 'Premier Chronograph Hand Wind Green Dial Men\'s Watch', 2, 'Stainless steel case with a brown leather strap. Fixed stainless steel bezel. Green dial with luminous silver-tone hands and Arabic numeral hour markers. Minute markers. Arabic numeral minute markers (at 5 minute intervals). Tachymeter markings around the outer rim. Dial Type: Analog. Luminescent hands and markers. Chronograph - two sub-dials displaying: 60 second and 30 minute. Breitling Calibre B09 hand wind movement with a 70-hour power reserve. Scratch resistant sapphire crystal. Pull / push crown. Transparent case back. Round case shape, case size: 40 mm, case thickness: 13 mm. Band width: 20 mm / 18 mm. Fold over clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, hour, minute, second. Premier Series. Dress watch style. Watch label: Swiss Made. Breitling Premier Chronograph Hand Wind Green Dial Men\'s Watch AB0930D31L1P1.', 698.89, 'AB0930D31L1P1', 1, 26, 40, 'breitling1.jpg', 'breitling1_1.jpg', 'breitling1_2.jpg', 100, 'Swiss Made', 4, 'Breitling Calibre B09', 70, 13, 'Stainless Steel', 6, 'Transparent', 'Leather', 'Leather', 'Brown', 0, 20, 'Fold Over\r\n', 'Green\r\n', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Arabic Numeral', 'Minute Markers. Arabic Numeral Minute Markers (at 5 minute intervals). Tachymeter Markings around the outer rim', 'Hands and Markers', 'Fixed', 'Stainless Steel', 'Stainless Steel\r\n', 'Pull / Push', '', '100 meters / 330 feet', 'Chronograph, Hour, Minute, Second', 11, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(14, 'Endurance Pro Chronograph Quartz Black Dial Men\'s Watch', 2, 'Black composite (Breitlight) case with a yellow rubber strap. Bi-directional rotating black composite (Breitlight) bezel showing 360 degree (compass) markings. Black dial with luminous silver-tone hands and Arabic numeral hour markers. Minute markers. Pulsometer markings around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display between the 4 and 5 o\'clock positions. Chronograph - three sub-dials displaying: 60 second, 30 minute and 1/10th of a second. Breitling calibre 82 quartz movement. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Case size: 44 mm. Case thickness: 12.5 mm. Band width: 22 mm. Tang clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second. Endurance Pro Series. Casual watch style. Watch label: Swiss Made. Breitling Endurance Pro Chronograph Quartz Black Dial Men\'s Watch X82310A41B1S1.', 270, 'X82310A41B1S1', 1, 27, 44, 'breitling2.jpg', 'breitling2_1.jpg', 'breitling2_2.jpg', 100, 'Swiss Made', 5, 'Breitling Calibre 82', 0, 12.5, 'Composite (Breitlight)', 6, 'Solid', 'Rubber', 'Strap', 'Yellow', 0, 22, 'Tang', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Arabic Numeral', 'Minute Markers. Pulsometer Markings around the outer rim', 'Hands and Markers', 'Bi-Directional Rotating', 'Black', 'Composite (Breitlight) showing 360 Degree (Compass) Markings', 'Screw Down', '100 meters / 330 feet', 'Date display between 4 and 5 o\'clock position', 'Chronograph, Date, Hour, Minute, Second', 11, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(15, 'Endurance Pro Chronograph Quartz Black Dial Men\'s Watch', 2, 'Black composite (ultralight polymer) case with a red rubber strap. Bi-directional rotating black composite (ultralight polymer) bezel showing (360 degree) compass markings bezel. Black dial with luminous silver-tone hands and Arabic numeral hour markers. Minute markers. Pulsometer markings around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display between the 4 and 5 o\'clock positions. Chronograph - three sub-dials displaying: 60 second, 30 minute and 1/10th of a second. Breitling Calibre 82 quartz movement. Scratch resistant sapphire crystal. Screw down crown. Round case shape. Case size: 44 mm. Band width: 22 mm. Tang clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second. Endurance Pro Series. Casual watch style. Watch label: Swiss Made. Breitling Endurance Pro Chronograph Quartz Black Dial Men\'s Watch X82310D91B1S1.', 2980, 'X82310D91B1S1', 1, 25, 44, 'breitling3.jpg', 'breitling3_1.jpg', 'breitling3_2.jpg', 100, 'Swiss Made', 5, 'Swiss Made', 0, 0, 'Composite (Ultralight Polymer)', 6, '', 'Rubber', 'Strap', 'Red', 0, 22, 'Tang', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Arabic Numeral', 'Minute Markers. Pulsometer Markings around the outer rim', 'Hands and Markers', 'Bi-directional Rotating', 'Black', 'Composite (Ultralight Polymer) showing Compass Markings', 'Screw Down', '100 meters / 330 feet', 'Date display between the 4 and 5 o\'clock positions', 'Chronograph, Date, Hour, Minute, Second', 11, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(16, 'Professional Chronograph Quartz Chronometer Black Dial Men\'s Watch\r\n', 2, 'Black breitlight (ultralight polymer) case with a blue rubber strap. Bi-directional rotating black breitlight (ultralight polymer) bezel showing 360 degree (compass) markings. Black dial with luminous silver-tone hands and Arabic numeral hour markers. Minute markers. Pulsation scale around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display between the 4 and 5 o\'clock positions. Chronograph - three sub-dials displaying: 60 second, 30 minute and 1/10th of a second. Breitling Calibre 82 quartz movement. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape. Case size: 44 mm. Tang clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second, chronometer. Professional Series. Luxury watch style. Watch label: Swiss Made. Breitling Professional Chronograph Quartz Chronometer Black Dial Men\'s Watch X82310D51B1S1.', 290, 'X82310D51B1S1', 1, 24, 44, 'breitling4.jpg', 'breitling4_1.jpg', 'breitling4_2.jpg', 100, 'Swiss Made', 5, 'Breitling Calibre 82', 0, 0, 'Breitlight (Ultralight Polymer)', 6, 'Solid\r\n', 'Rubber', 'Strap', 'Blue', 0, 0, 'Tang', 'Black\r\n', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Arabic Numeral', 'Minute Markers. Pulsation Scale around the outer rim', 'Hands and Markers', 'Bi-Directional Rotating', 'Black', 'Breitlight (Ultralight Polymer)', 'Pull / Push\r\n', '100 meters / 330 feet', 'Date display between the 4 and 5 o\'clock positions', 'Chronograph, Date, Hour, Minute, Second, Chronometer', 11, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(17, 'Chronomat 38 Chronograph Automatic Chronometer Watch', 2, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel. Mother of pearl dial with luminous silver-tone hands and index hour markers. Minute markers. Tachymeter markings around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Chronograph - three sub-dials displaying: 60 second, 30 minute and 12 hour. Breitling calibre 13 automatic movement with a 42-hour power reserve. Scratch resistant sapphire crystal. Screw locked crown. Solid case back. Round case shape. Case size: 38 mm. Case thickness: 15 mm. Band width: 20 mm, band length: 7.5 inches. Deployment clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, chronometer, date, hour, minute, second. Luxury watch style. Breitling Chronomat 38 Chronograph Automatic Chronometer Unisex Watch W1331012-A774-385A.', 498, 'W1331012-A774-385A', 2, 38, 38, 'breitling5.jpg', 'breitling5_1.jpg', 'breitling5_2.jpg', 100, '', 2, 'Breitling Calibre 13', 42, 15, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', '', 7.5, 20, 'Deployment', 'Mother of Pearl', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Index', 'Minute Markers. Tachymeter Markings around the outer rim', 'Hands and Markers', 'Fixed', '\r\n', 'Stainless Steel', 'Screw Locked', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Chronograph, Chronometer, Date, Hour, Minute, Second', 11, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(18, 'Superocean Heritage II Automatic Chronometer 42 mm Black Dial Men\'s Watch', 2, 'Stainless steel case with a stainless steel mesh bracelet. Uni-directional rotating stainless steel bezel with a black ceramic top ring. Black dial with luminous silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 6 o\'clock position. Breitling calibre 20 automatic movement with a 70-hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Case size: 42 mm. Case thickness: 14.35 mm. Band width: 22 mm. Fold over slip through clasp. Water resistant at 200 meters / 660 feet. Functions: date, hour, minute, second, chronometer. Luxury watch style. Watch label: Swiss Made. Item Variations: AB201012-BF73-154A. Breitling Superocean Heritage II Automatic Chronometer Black Dial Men\'s Watch AB2010121B1A1.', 3100, 'AB2010121B1A1', 1, 28, 42, 'breitling6.jpg', 'breitling6_1.jpg', 'breitling6_2.jpg', 100, 'Swiss Made', 2, 'Breitling Calibre 20', 70, 14.35, 'Stainless Steel', 6, 'Solid', 'Stainless Steel Mesh', 'Bracelet', 'Silver-tone', 0, 22, 'Fold Over Slip Through', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Index', 'Minute Markers around the outer rim', 'Hands and Markers', 'Uni-directional Rotating\r\n', 'Silver-tone', 'Stainless Steel with a Black Ceramic Top Ring', 'Screw Down', '200 meters / 660 feet', 'Date display at the 6 o\'clock position', 'Date, Hour, Minute, Second, Chronometer', 36, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(19, 'Premier B25 Datora Chronograph Automatic Brown Dial Men\'s Watch', 2, 'Stainless steel case with a brown leather strap. Fixed stainless steel bezel. Brown dial with luminous silver-tone hands and Arabic numeral hour markers. Minute markers. Tachymeter markings around the outer rim. Dial Type: Analog. Luminescent hands and markers. Day of the week and month display below the 12 o\'clock position. Chronoppgraph - two sub-dials displaying: 60 second and 30 minute. Date / moonphase subv-dial. Breitling calibre 25 automatic movement, based upon ETA 2892-A2, containing 21 Jewels, bitting at 28800 vph, and has a power reserve of approximately 42 hours. Scratch resistant sapphire crystal. Pull / push crown. Transparent case back. Round case shape. Case size: 42 mm. Case thickness: 15.3 mm. Band width: 22 mm. Fold over clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, tachymeter, date, hour, minute, small second. Additional Info: original box, manual (complete accessories). Premier B25 Datora Series. Luxury watch style. Watch label: Swiss Made. Breitling Premier B25 Datora Chronograph Automatic Brown Dial Men\'s Watch AB2510201K1P1.', 9990, 'AB2510201K1P1', 1, 30, 42, 'breitling7.jpg', 'breitling7_1.jpg', 'breitling7_2.jpg', 100, 'Swiss Made', 2, 'Breitling Calibre 25', 42, 15.3, 'Stainless Steel', 6, 'Transparent', 'Leather', 'Strap', 'Brown', 0, 22, 'Fold Over', 'Brown', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Arabic Numeral', 'Minute Markers. Tachymeter Markings around the outer rim', 'Hands and Markers\r\n', 'Fixed', '\r\nSilver-tone', 'Stainless Steel', 'Pull / Push', '200 meters / 660 feet', 'Day of the Week and Month display below the 12 o\'clock position', 'Chronograph, Tachymeter, Date, Hour, Minute, Small Second', 11, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(20, 'Airwolf Raven Chronograph Automatic Men\'s Watch A27363A2-B823SS', 2, 'Stainless steel case with a stainless steel bracelet. Bi-directional rotating bezel. Black dial with luminous hands and index hour markers. Tachymeter scale appears around the outer rim. Dial Type: Analog. Date display at the 6 o\'clock position. Chronograph - three sub-dials displaying: 60 second, 60 minute and 12 hour. Automatic movement. Scratch resistant sapphire crystal. Case diameter: 43.5 mm. Case thickness: 16 mm. Round case shape. Deployment with push button clasp. Water resistant at 200 meters / 660 feet. Functions: chronograph, date, hour, minute, second. Luxury watch style. Watch label: Swiss Made. Breitling Airwolf Raven Chronograph Automatic Men\'s Watch A27363A2-B823SS.', 4650, 'A27363A2/B823.140A', 1, 28, 43.5, 'breitling8.jpg', 'breitling8_1.jpg', 'breitling8_2.jpg', 100, 'breitling8.jpg', 2, 'Breitling Calibre 27', 42, 16, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Deployment with Push Button Release', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous', 'Index', 'Tachymeter scale appears around the outer rim', 'Hands and Markers', 'Bi-directional rotating', 'Brown', '', '', '200 meters / 660 feet', 'Date display at the 6 o\'clock position', 'Chronograph, Chronometer, Date, Hour, Minute, Second', 11, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(21, 'Tank Solo XL Automatic Silver Dial Men\'s Watch', 3, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Silver-tone dial with blued-steel sword-shaped hands and black Roman numeral hour markers. Minute markers around an inner ring. Dial Type: Analog. Date display at the 6 o\'clock position. Cartier Calibre 049 Automatic movement, based upon ETA 2892-A2, containing 21 Jewels, bitting at 28800 vph, and has a power reserve of approximately 42 hours. Scratch resistant sapphire crystal. Beaded set with a synthetic spinel cabochon, crown. Solid case back. Rectangle case shape, case size: 40.85 mm x 31 mm, case thickness: 7.65 mm. Band width: 22 mm, band length: 7 inches. Deployment with push button release clasp. Water resistant at 30 meters / 100 feet. Functions: date, hour, minute, second. Tank Anglaise Series. Luxury watch style. Watch label: Swiss Made. Pre-owned Cartier Tank Solo XL Automatic Silver Dial Men\'s Watch W5200028.', 2900, 'W5200028', 1, 19, 40, 'cartier1.jpg', 'cartier1_1.jpg', 'cartier1_2.jpg', 100, 'Swiss Made', 2, 'Cartier Calibre 049', 42, 7.65, 'Stainless Steel', 5, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone\r\n', 7, 22, 'Deployment with Push Button Release', 'Silver-tone', 1, 'Scratch Resistant Sapphire', 'Blued-steel Sword-shaped', 'Black Roman Numeral', 'Minute Markers around an inner ring', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Stainless Steel', '30 meters / 100 feet', '30 meters / 100 feet', 'Date, Hour, Minute, Second', 36, 5, '1 Year Jomashop Warranty', 'Watches', 2),
(22, 'Santos Medium Model Silvered Opaline Dial Men\'s Watch', 3, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel. Silvered opaline dial with blued-steel sword-shaped hands and black Roman numeral hour markers. Minute markers around an inner ring. Dial Type: Analog. Cartier calibre 1847 MC automatic movement, containing 23 Jewels, bitting at 28800 vph, and has a power reserve of approximately 42 hours. Scratch resistant sapphire crystal. Blue cabochoon crown. Solid case back. Square case shape. Case dimensions: 35.1 mm x 41.9 mm. Case thickness: 8.83 mm. Band width: 16 mm. Deployment clasp. Water resistant at 100 meters / 330 feet. Functions: hour, minute, second. Additional Info: interchangeable calfskin leather strap. Santos Series. Luxury watch style. Watch label: Swiss Made. Cartier Santos Silvered Opaline Dial Men\'s Watch WSSA0029.', 6809, 'WSSA0029\r\n', 1, 7, 41.9, 'cartier2.jpg', 'cartier2_1.jpg', 'cartier2_2.jpg', 100, 'Swiss Made\r\n', 2, 'Cartier Calibre 1847 MC', 42, 8.83, 'Stainless Steel', 7, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 16, 'Deployment', 'Silvered Opaline', 1, 'Scratch Resistant Sapphire', 'Blued-steel Sword-shaped', 'Black Roman Numeral', 'Minute Markers around an inner ring', '\r\n', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Blue Cabochoon', 'Blue Cabochoon', '\r\n', 'Hour, Minute, Second', 36, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(23, 'Santos Automatic Men\'s Watch\r\n', 3, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Silvered opaline dial with blued-steel sword-shaped hands and black Roman numeral hour markers. Minute markers around an inner ring. Dial Type: Analog. Date display at the 6 o\'clock position. Cartier Calibre 1847 MC Automatic movement, containing 23 Jewels, bitting at 28800 vph, and has a power reserve of approximately 42 hours. Scratch resistant sapphire crystal. Blue cabochoon crown. Solid case back. Square case shape, case size: 39.8 mm x 47.5 mm, case thickness: 9.08 mm. Deployment clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Santos Series. Luxury watch style. Watch label: Swiss Made. Pre-owned Cartier Santos Automatic Men\'s Watch WSSA0018.\r\n', 6880, 'WSSA0018', 1, 17, 47.5, 'cartier3.jpg', 'cartier3_1.jpg', 'cartier3_2.jpg', 100, 'Swiss Made', 2, 'Cartier Calibre 1847 MC', 42, 0, 'Stainless Steel', 7, 'Solid', 'Stainless Steel', 'Bracelet\r\n', 'Silver-tone', 0, 0, 'Deployment', 'Silvered Opaline', 1, 'Scratch Resistant Sapphire', 'Blued-steel Sword-shaped', 'Black Roman Numeral', 'Minute Markers around an inner ring', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Blue Cabochoon', '100 meters / 330 feet', 'Date display at the 6 o\'clock position', 'Date, Hour, Minute, Second', 36, 5, '1 Year Jomashop Warranty', 'Watches', 2),
(24, 'Tank Solo XL Automatic Silver Dial Men\'s Watch', 3, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Silver-tone dial with blued-steel sword-shaped hands and black Roman numeral hour markers. Minute markers around an inner ring. Dial Type: Analog. Date display at the 6 o\'clock position. Cartier Calibre 049 Automatic movement, based upon ETA 2892-A2, containing 21 Jewels, bitting at 28800 vph, and has a power reserve of approximately 42 hours. Scratch resistant sapphire crystal. Beaded set with a synthetic spinel cabochon, crown. Solid case back. Rectangle case shape, case size: 40.85 mm x 31 mm, case thickness: 7.65 mm. Band width: 22 mm, band length: 7 inches. Deployment with push button release clasp. Water resistant at 30 meters / 100 feet. Functions: date, hour, minute, second. Tank Anglaise Series. Luxury watch style. Watch label: Swiss Made. Pre-owned Cartier Tank Solo XL Automatic Silver Dial Men\'s Watch W5200028.', 278, 'W5200028', 1, 0, 40.85, 'cartier4.jpg', 'cartier4_1.jpg', 'cartier4_2.jpg', 100, 'Swiss Made', 2, 'Cartier Calibre 049', 0, 7.65, 'Stainless Steel', 5, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 7, 22, 'Deployment with Push Button Release', 'Silver-tone', 1, 'Scratch Resistant Sapphire', 'Blued-steel Sword-shaped', 'Black Roman Numeral', 'Minute Markers around an inner ring', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Beaded set with a Synthetic Spinel Cabochon,', '30 meters / 100 feet', 'Date display at the 6 o\'clock position', 'Date, Hour, Minute, Second', 36, 5, '1 Year Jomashop Warranty', 'Watches', 2),
(25, 'Santos Large Model Automatic Grey Dial Men\'s Watch', 3, 'Stainless steel case with a stainless steel bracelet. Fixed black ADLC bezel. Grey dial with luminous silver-tone hands and Roman numeral hour markers. Minute markers around an inner ring. Dial Type: Analog. Luminescent hands and markers. Date display at the 6 o\'clock position. Cartier calibre 1847 MC automatic movement, containing 23 Jewels, bitting at 28800 vph, and has a power reserve of approximately 42 hours. Scratch resistant sapphire crystal. Cabochon set crown. Solid case back. Square case shape. Case size: 39.8 mm, case thickness: 9.38 mm. Deployment clasp with a push button release. Water resistant at 30 meters / 100 feet. Functions: date, hour, minute, second. Santos Series. Luxury watch style. Watch label: Swiss Made. Cartier Santos Large Model Automatic Grey Dial Men\'s Watch WSSA0037.', 690, 'WSSA0037', 1, 14, 39.8, 'cartier5.jpg', 'cartier5_1.jpg', 'cartier5_2.jpg', 100, 'Swiss Made', 2, 'Cartier Calibre 1847 MC', 42, 9.38, 'Stainless Steel', 7, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Deployment with Push Button Release', 'Grey', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Roman Numeral', 'Minute Markers around an inner ring', 'Hands and Markers', 'Fixed', 'Black ADLC', 'Stainless Steel', 'Cabochon Set', '30 meters / 100 feet', 'Date display at the 6 o\'clock position', 'Date, Hour, Minute, Second', 36, 5, '', 'Watches', 2),
(26, 'Santos Galbee Quartz Ladies Watch', 3, 'Silver-tone stainless steel case and bracelet. Fixed yellow gold-tone 18kt yellow gold bezel. Beige dial with blued-steel sword-shaped hands and Roman numeral hour markers. Minute scale around the inner rim. Dial Type: Analog. Quartz movement. Scratch resistant sapphire crystal. Cabochon crown. Square case shape, case size: 24 mm. Band length: 5 inches. Fold over clasp with a safety release. Functions: hour, minute, second. Santos Galbee Series. Luxury watch style. Watch label: Swiss Made. Pre-owned Cartier Santos Galbee Quartz Ladies Watch 1170902.', 3809, '1170902', 0, 0, 24, 'cartier6.jpg', 'cartier6_1.jpg', 'cartier6_2.jpg', 100, 'Swiss Made', 5, '\r\n', 0, 0, 'Stainless Steel', 7, '', 'Stainless Steel', 'Bracelet', 'Silver-tone', 5, 0, 'Fold Over with Safety Release', 'Beige', 1, 'Scratch Resistant Sapphire', 'Blued-steel Sword-shaped', 'Roman Numeral', 'Minute Scale around the inner rim', '', 'Fixed', 'Yellow Gold-tone', '18kt Yellow Gold', 'Cabochon\r\n', '', '', 'Hour, Minute, Second', 36, 5, '1 Year Jomashop Warranty\r\n', 'Watches', 2),
(27, 'Calibre de Automatic Men\'s Watch', 3, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Silver opaline dial with luminous black sword-shaped hands and Roman numeral hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. One subdial displaying: small second. Cartier Calibre 1904-PS MC Automatic movement, containing 27 Jewels, bitting at 28800 vph, and has a power reserve of approximately 48 hours. Scratch resistant sapphire crystal. Steel with a faceted blue synthetic spinel crown. Skeleton case back. Round case shape, case size: 42 mm, case thickness: 10 mm. Band width: 24 mm, band length: 6 3/4 inches. Deployment clasp. Water resistant at 30 meters / 100 feet. Functions: date, hour, minute, second. Calibre De Cartier Series. Dress watch style. Watch label: Swiss Made. Pre-owned Cartier Calibre de Cartier Automatic Men\'s Watch W7100015.', 450.6, 'W7100015', 1, 49, 42, 'cartier7.jpg', 'cartier7_1.jpg', 'cartier7_2.jpg', 100, 'Swiss Made', 2, 'Cartier Calibre 1904-PS MC', 42, 10, 'Stainless Steel', 6, 'Skeleton', 'Stainless Steel', 'Bracelet', 'Silver-tone', 6, 24, 'Deployment', 'Silver Opaline', 1, 'Scratch Resistant Sapphire', 'uminous Black Sword-shaped', 'Roman Numeral', 'Minute markers around the outer r', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Steel with a Faceted Blue Synthetic Spinel', '30 meters / 100 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 5, '1 Year Jomashop Warranty', 'Watches', 2),
(28, 'Calibre de Automatic Black Dial Men\'s Watch', 3, 'Silver-tone stainless steel case and bracelet. Fixed stainless steel bezel. Black dial with luminous silver-tone hands and Roman numeral and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. One subdial displaying: small second at the 6 o\'clock position. Cartier Calibre 1904-PS MC Automatic movement, containing 27 Jewels, bitting at 28800 vph, and has a power reserve of approximately 48 hours. Scratch resistant sapphire crystal. Octagonal with a faceted blue synthetic spinel crown. Skeleton case back. Round case shape, case size: 42 mm, case thickness: 10 mm. Band width: 24 mm. Deployment clasp. Water resistant at 30 meters / 100 feet. Functions: date, hour, minute, small second. Calibre De Cartier Series. Dress watch style. Watch label: Swiss Made. Pre-owned Cartier Calibre de Cartier Automatic Black Dial Men\'s Watch W7100016.', 370, 'W7100016', 1, 49, 42, 'cartier8.jpg', 'cartier8_1.jpg', 'cartier8_2.jpg', 100, 'Swiss Made', 2, 'Cartier Calibre 1904-PS MC', 48, 10, 'Stainless Steel', 6, 'Skeleton\r\n', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 24, 'Deployment', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', '\r\nRoman Numeral and Index', 'Minute markers around the outer rim', 'Hands and Markers', 'Fixed\r\n', '', 'Stainless Steel', 'Octagonal with a Faceted Blue Synthetic Spinel', '30 meters / 100 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Small Second', 36, 3, '1 Year Jomashop Warranty', 'Watches', 2),
(29, 'Tsuyosa Automatic Red Dial Watch', 4, 'Gold-tone stainless steel case and bracelet. Fixed gold-tone stainless steel bezel. Red dial with gold-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Citizen Caliber 8210 Automatic movement, containing 21 Jewels, bitting at 21600 vph, and has a power reserve of approximately 45 hours. Scratch resistant sapphire crystal. Pull / push crown. Transparent see through case back. Round case shape, case size: 40 mm, case thickness: 11.7 mm. Fold over clasp with a safety release. Water resistant at 50 meters / 165 feet. Functions: date, hour, minute, second. Tsuyosa Series. Casual watch style. Watch label: Japan Movt. Citizen Tsuyosa Automatic Red Dial Watch NJ0153-82X.', 269, 'NJ0153-82X', 2, 0, 40, 'citizen1.jpg', 'citizen1_1.jpg', 'citizen1_2.jpg', 100, 'Japan Movt', 2, 'Citizen Caliber 8210', 45, 11.7, 'Stainless Steel', 6, 'Transparent See Through', 'Stainless Steel', 'Bracelet', 'Gold-tone', 0, 0, 'Fold Over with Safety Release', 'Red', 1, 'Scratch Resistant Sapphire', 'Gold-tone', 'Index', 'Minute Markers around the outer rim', 'Hands and Markers', 'Fixed', 'Gold-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 1, '5 Year Jomashop Warranty', 'Watches', 2),
(30, 'Automatic Orange Dial Men\'s Watch', 4, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Orange dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Citizen Caliber 8210 Automatic movement, containing 21 Jewels, bitting at 21600 vph, and has a power reserve of approximately 45 hours. Scratch resistant sapphire crystal. Pull / push crown. Transparent case back. Round case shape, case size: 40 mm, case thickness: 11.7 mm. Fold over clasp with a safety release. Water resistant at 50 meters / 165 feet. Functions: date, hour, minute, second. Casual watch style. Watch label: Japan Movt. Citizen Automatic Orange Dial Men\'s Watch NJ0150-81Z.', 249, 'NJ0150-81Z', 1, 58, 40, 'citizen2.jpg', 'citizen2_1.jpg', 'citizen2_2.jpg', 100, 'Japan Movt', 2, 'Citizen Caliber 8210', 45, 11.7, 'Stainless Steel', 6, 'Transparent', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Fold Over with Safety Release', 'Orange', 1, 'Scratch Resistant Sapphire', 'Silver-tone', 'Index', 'Minute Markers around the outer rim', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 1, '5 Year Jomashop Warranty', 'Watches', 2),
(31, 'Automatic Blue Dial Men\'s Watch', 4, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Blue dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Date display at the 3 o\'clock position. Citizen Caliber 8210 Automatic movement, containing 21 Jewels, bitting at 21600 vph, and has a power reserve of approximately 45 hours. Scratch resistant sapphire crystal. Pull / push crown. Transparent see through case back. Round case shape, case size: 40 mm, case thickness: 11.7 mm. Fold over clasp with a safety release. Water resistant at 50 meters / 165 feet. Functions: date, hour, minute, second. Casual watch style. Watch label: Japan Movt. Citizen Automatic Blue Dial Men\'s Watch NJ0151-88X.', 249, 'NJ0151-88X', 1, 58, 40, 'citizen3.jpg', 'citizen3_1.jpg', 'citizen3_2.jpg', 100, 'Japan Movt', 2, 'Citizen Caliber 8210', 45, 11.7, 'Stainless Steel', 6, 'Transparent See Through', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Fold Over with Safety Release', 'Blue', 1, 'Scratch Resistant Sapphire', 'Silver-tone', 'Index', 'Minute Markers around the outer rim', '\r\n', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 1, '5 Year Jomashop Warranty', 'Watches', 2),
(32, 'Promaster Automatic Blue Dial Men\'s Watch', 4, 'Silver-tone stainless steel case with a black rubber strap. Uni-directional rotating blue stainless steel bezel. Blue dial with luminous hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Day of the week and date display at the 3 o\'clock position. Citizen Caliber 8204 automatic movement. Scratch resistant mineral crystal. Screw down crown. Solid case back. Round case shape, case size: 41 mm, case thickness: 13.7 mm. Buckle clasp. Water resistant at 200 meters / 660 feet. Functions: date, day, hour, minute, second. Promaster Series. Dive watch style. Watch label: Japan Movt. Citizen Promaster Automatic Blue Dial Men\'s Watch NY0129-07L.', 204.99, 'NY0129-07L', 1, 54, 41, 'citizen4.jpg', 'citizen4_1.jpg', 'citizen4_2.jpg', 100, 'Japan Movt', 2, 'Citizen Caliber 8204', 0, 13.7, 'Stainless Steel', 6, 'Solid', 'Rubber', 'Strap', 'Black', 0, 0, 'Buckle', 'Blue', 1, 'Scratch Resistant Mineral', 'Luminous', 'Index', 'Minute Markers around the outer rim', 'Hands and Markers', 'Uni-directional Rotating', 'Blue', 'Stainless Steel', 'Screw Down', '200 meters / 660 feet', 'Day of the Week and Date display at the 3 o\'clock position', 'Date, Day, Hour, Minute, Second', 36, 2, '5 Year Jomashop Warranty', 'Watches', 2),
(33, 'Automatic Yellow Dial Men\'s Watch', 4, 'Silver-tone stainless steel case and bracelet. Uni-directional rotating silver-tone stainless steel bezel with an inlaid black ring. Yellow dial with black hands and index-Arabic numeral hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Citizen Caliber 8210 Automatic movement, containing 21 Jewels, bitting at 21600 vph, and has a power reserve of approximately 45 hours. Scratch resistant mineral crystal. Pull / push crown. Transparent see through case back. Round case shape, case size: 43 mm, case thickness: 12.4 mm. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Casual watch style. Watch label: Japan Movt. Citizen Automatic Yellow Dial Men\'s Watch NJ0170-83Z.', 164, 'NJ0170-83Z', 1, 70, 43, 'citizen5.jpg', 'citizen5_1.jpg', 'citizen5_2.jpg', 100, 'Japan Movt', 2, 'Citizen Caliber 8210', 45, 12.4, 'Stainless Steel', 6, 'Transparent See Through', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, '', 'Yellow', 1, 'Scratch Resistant Mineral', 'Black', 'Index-Arabic Numeral', 'Minute Markers around the outer rim', 'Hands and Markers', 'Uni-directional Rotating', 'Silver-tone', 'Stainless Steel with an inlaid Black Ring', 'Pull / Push', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 1, '5 Year Jomashop Warranty', 'Watches', 2);
INSERT INTO `watches` (`id`, `name`, `brand`, `description`, `price`, `model`, `gender`, `sale`, `caseSize`, `img1`, `img2`, `img3`, `instock`, `watchLabel`, `movement`, `engine`, `powerReserve`, `caseThickness`, `caseMaterial`, `caseShape`, `caseBack`, `bandMaterial`, `bandType`, `bandColor`, `bandLength`, `bandWidth`, `clasp`, `dialColor`, `type`, `crystal`, `hands`, `dialMarkers`, `secondMarkers`, `lumine`, `bezel`, `bezelColor`, `bezelMaterial`, `crown`, `waterRes`, `calendar`, `func`, `features`, `style`, `warranty`, `department`, `category`) VALUES
(34, 'Promaster Automatic Blue Dial Men\'s Watch', 4, 'Silver-tone stainless steel case with a black silicone strap. Uni-directional rotating silver-tone stainless steel bezel with a red and blue ring. Blue dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Day of the week and date display at the 3 o\'clock position. Automatic movement. Scratch resistant mineral crystal. Screw down crown. Solid case back. Round case shape, case size: 42 mm. Buckle clasp. Water resistant at 200 meters / 660 feet. Functions: date, day, hour, minute, second. Promaster Series. Sport watch style. Watch label: Japan Movt. Citizen Promaster Automatic Blue Dial Men\'s Watch NY0086-16L.', 175, 'NY0086-16L', 1, 46, 42, 'citizen5.jpg', 'citizen5_1.jpg', 'citizen5_2.jpg', 100, 'Japan Movt', 2, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Silicone', 'Strap', 'Black', 0, 0, 'Buckle', 'Blue', 1, 'Scratch Resistant Mineral', 'Silver-tone', 'Index', 'Minute Markers around the outer rim', 'Hands and Markers', 'Uni-directional Rotating', 'Silver-tone', 'Stainless Steel with Red and Blue Ring', 'Screw Down', '200 meters / 660 feet', 'Day of the Week and Date display at the 3 o\'clock position', 'Date, Day, Hour, Minute, Second', 36, 9, '5 Year Jomashop Warranty', 'Watches', 2),
(35, 'Automatic Blue Dial Men\'s Watch', 4, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Blue dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Citizen Caliber 8210 Automatic movement, containing 21 Jewels, bitting at 21600 vph, and has a power reserve of approximately 45 hours. Scratch resistant sapphire crystal. Pull / push crown. Transparent case back. Round case shape, case size: 40 mm, case thickness: 11.7 mm. Band width: 22 mm. Deployment with push button release clasp. Water resistant at 50 meters / 165 feet. Functions: date, hour, minute, second. Casual watch style. Watch label: Japan Movt. Citizen Automatic Blue Dial Men\'s Watch NJ0151-88L.', 249, 'NJ0151-88L', 1, 45, 40, 'citizen7.jpg', 'citizen7_1.jpg', 'citizen7_2.jpg', 100, 'Japan Movt', 2, 'Citizen Caliber 8210', 45, 11.7, 'Stainless Steel', 6, 'Transparent', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 22, 'Deployment with Push Button Release', 'Blue', 1, 'Scratch Resistant Sapphire', 'Silver-tone', 'Index', 'Minute Markers around the outer rim', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second', 36, 1, '5 Year Jomashop Warranty', 'Watches', 2),
(36, 'Promaster Diver Automatic Orange Dial Men\'s Watch', 4, 'Silver-tone stainless steel case with a black rubber strap. Uni-directional rotating silver-tone stainless steel with an inlaid black top ring bezel. Smoky orange dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Day of the week and date display at the 3 o\'clock position. Citizen Caliber 8204 automatic movement. Scratch resistant mineral crystal. Screw down crown. Solid case back. Round case shape, case size: 41 mm, case thickness: 13.7 mm. Tang clasp. Water resistant at 200 meters / 660 feet. Functions: date, day, hour, minute, second. Promaster Diver Series. Dive watch style. Watch label: Japan Movt. Citizen Promaster Diver Automatic Orange Dial Men\'s Watch NY0120-01Z.', 193.19, 'NY0120-01Z', 1, 49, 41, 'citizen8.jpg', 'citizen8_1.jpg', 'citizen8_2.jpg', 100, 'Japan Movt', 2, 'Citizen Caliber 8204', 0, 13.7, 'Stainless Steel', 6, 'Solid', 'Rubber', 'Strap', 'Black', 0, 0, 'Tang', 'Smoky Orange', 1, 'Scratch Resistant Mineral', 'Silver-tone', 'Index', 'Minute Markers around the outer rim', 'Hands and Markers', 'Uni-directional Rotating', 'Silver-tone', 'Stainless Steel with an inlaid Black Top Ring', 'Screw Down', '200 meters / 660 feet', 'Day of the Week and Date display at the 3 o\'clock position', 'Date, Day, Hour, Minute, Second', 36, 2, '5 Year Jomashop Warranty', 'Watches', 2),
(37, 'Slim Runway Black Dial Men\'s Watch', 10, 'Black ion-plated stainless steel case and bracelet. Fixed black ion-plated bezel. Black dial with black hands and index hour markers. Dial Type: Analog. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 44 mm. Case thickness: 9 mm. Band width: 21 mm. Deployment clasp with a push button release.', 99.99, 'MK8507', 1, 20, 44, 'Michael1_1.jpg', 'Michael1_2.jpg', 'Michael1_3.jpg', 100, 'Slim Runway', 5, '0', 0, 9, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Black', 0, 0, 'Deployment with Push Button Release', 'Black', 1, 'Scratch Resistant Mineral', 'Black', 'Index', '0', '0', 'Fixed', 'Black Ion-plated', 'Stainless Steel', 'Pull / Push', '0', '0', 'Hour, Minute, Second', 36, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(38, 'Pyper Quartz Crystal Black Dial Ladies Watch', 10, 'Gold-tone alloy case with a gold-tone alloy bracelet. Fixed gold-tone alloy bezel set with crystals. Black dial with gold-tone hands and crystal hour markers. Dial Type: Analog. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 38 mm. Case thickness: 9 mm. Band width: 16 mm. Fold over clasp with a safety release. Water resistant at 30 meters / 100 feet. Functions: hour, minute, second. Pyper Series. Dress watch style. Michael Kors Pyper Quartz Crystal Black Dial Ladies Watch MK4593.', 99.99, 'MK4593', 1, 30, 38, 'Michael2_1.jpg', 'Michael2_2.jpg', 'Michael2_3.jpg', 100, 'Pyper', 5, 'o', 0, 9, 'Alloy', 6, 'Solid', 'Alloy', 'Bracelet', 'Gold-tone', 0, 0, 'Fold Over with Safety Release', 'Black', 1, 'Scratch Resistant Mineral', 'Gold-tone', 'Crystal', '', '', 'Fixed', 'Gold-tone', 'Alloy set with Crystals', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute, Second', 20, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(39, 'Camille Three-Hand Quartz Crystal Ladies Watch', 10, 'Rose gold-tone stainless steel case with a red leather strap. Fixed rose gold-tone bezel with crystal set. Rose gold and red crystal dial with rose gold-tone hands and alternating Roman numeral and index hour markers. Dial Type: Analog. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape, case size: 33 mm. Band width: 16 mm. Tang clasp. Water resistant at 50 meters / 165 feet. Functions: hour, minute, second. Camille Series. Dress watch style. Michael Kors Camille Three-Hand Quartz Crystal Ladies Watch MK4701.', 109, 'MK4701', 0, 20, 33, 'Michael3_1.jpg', 'Michael3_2.jpg', 'Michael3_3.jpg', 100, 'Camille', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Strap', 'Blue', 0, 0, 'Tang', 'Rose Gold and Red Crystal', 1, 'Scratch Resistant Mineral', 'Rose Gold-tone', 'Alternating Roman Numeral and Index', '', '', 'Fixed', 'Rose Gold-tone', 'Crystal Set', 'Pull / Push', '', '', 'Hour, Minute, Second', 24, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(40, 'Pyper Crystal Black Dial Ladies Watch', 10, 'Yellow gold-tone stainless steel case with a black leather strap. Fixed yellow gold-tone stainless steel bezel. Black dial with yellow gold-tone hands and crystal-tipped index hour markers. Minute markers around the outer rim. Dial Type: Analog. Seiko VJ21 quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 38 mm. Case thickness: 7 mm. Band width: 18 mm. Tang clasp. Water resistant at 50 meters / 165 feet. Functions: hour, minute, second. Casual watch style. Watch label: Japan Movt. Michael Kors Pyper Crystal Black Dial Ladies Watch MK2747.', 93, 'MK2747', 1, 20, 38, 'Michael4_1.jpg', 'Michael4_2.jpg', 'Michael4_3.jpg', 100, 'Japan Movt', 5, 'Seiko Caliber VJ21', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Strap', 'Black', 0, 18, 'Tang', 'Black', 1, 'Scratch Resistant Mineral', 'Yellow Gold-tone', 'Crystal-tipped Index', 'Minute Markers around the outer rim', '', 'Fixed', 'Yellow Gold-tone', 'Stainless Steel', 'Pull / Push', '50 meters / 165 feet', '', 'Hour, Minute, Second', 20, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(41, 'Oversized Runway Chronograph Quartz Black Dial Men\'s Watch', 10, 'Black stainless steel case and bracelet. Fixed black stainless steel bezel. Black dial with black hands and index-Arabic numeral hour markers. Minute markers around the outer rim. Dial Type: Analog. Date display between 4 and 5 o\'clock position. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape, case size: 45 mm. Deployment with push button release clasp. Water resistant at 30 meters / 100 feet. Functions: chronograph, hour, minute, second. Runway Series. Casual watch style. Michael Kors Oversized Runway Chronograph Quartz Black Dial Men\'s Watch MK9073.', 162, 'MK9073', 1, 20, 45, 'Michael5_1.jpg', 'Michael5_2.jpg', 'Michael5_3.jpg', 100, 'Runway', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel\r\n', 'Bracelet', 'Black', 0, 0, 'Deployment with Push Button Release', 'Black', 1, 'Deployment with Push Button Release', 'Black', 'Index-Arabic Numeral', 'Minute Markers around the outer rim', '', 'Fixed', 'Black', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', 'Date display between 4 and 5 o\'clock position', 'Chronograph, Hour, Minute, Second', 11, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(42, 'Lennox His And Hers Quartz Gold Crystal Pave Dial Watch Set', 10, 'Gold-tone stainless steel case and bracelet. Fixed gold-tone bezel with crystal set. Gold pave dial with gold-tone hands and index-Arabic numeral hour markers. Arabic numeral marker appears at the 12 o\'clock position. Dial Type: Analog. Date display between 4 and 5 o\'clock position. Chronograph - three sub-dials displaying: 60 second, 30 minute and 24 hour. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape, case size: 45 mm. Fold over clasp with a safety release. Water resistant at 50 meters / 165 feet. Functions: chronograph, date, hour, minute, second. Additional Info: michael kors\' his-and-hers set includes a men\'s 45mm lennox chronograph watch and a ladies\' 33mm mini lennox bracelet watch. ', 357, 'MK1061SET', 1, 20, 45, 'Michael6_1.jpg', 'Michael6_2.jpg', 'Michael6_3.jpg', 100, 'Lennox His And Hers', 4, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Black', 0, 0, 'Fold Over with Safety Release', 'Gold', 1, 'Scratch Resistant Mineral', 'Gold-tone', 'Index-Arabic Numeral', '', '', 'Fixed', 'Gold-tone', 'Crystal Set', 'Pull / Push', '50 meters / 165 feet', 'Date display between 4 and 5 o\'clock position', 'Chronograph, Date, Hour, Minute, Second', 6, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(43, 'Cortlandt Chronograph Quartz Black Dial Men\'s Watch', 10, 'Gold-tone stainless steel case with a brown leather strap. Fixed gold-tone bezel. Black dial with luminous gold-tone hands and index hour markers. Minute markers. 24 hour markers. Tachymeter markings around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display between the 4 and 5 o\'clock positions. Chronograph - three sub-dials displaying: 60 second, 30 minute and 24 hours. Quartz movement. Scratch resistant mineral crystal. Solid case back. Round case shape. Case size: 44 mm. Case thickness: 10.9 mm. Band width: 22 mm. Tang clasp. Water resistant at 50 meters / 165 feet. Functions: chronograph, date, hour, minute, second, military. Cortlandt Series. Casual watch style. Michael Kors Cortlandt Chronograph Quartz Black Dial Men\'s Watch MK8906.', 124, 'MK8906', 1, 23, 44, 'Michael7_1.jpg', 'Michael7_2.jpg', 'Michael7_3.jpg', 100, 'Cortlandt', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Leather', 'Strap\r\n', 'Brown', 0, 0, 'Tang', 'Black', 1, 'Scratch Resistant Mineral', 'Luminous Gold-tone', 'IMARKERS\r\n', 'Minute Markers. 24 Hour Markers. Tachymeter Markings around the outer rim', 'Hands and Markers', 'Fixed', 'Gold-tone', 'Stainless Steel', '', '50 meters / 165 fee', 'Date display between the 4 and 5 o\'clock positions', 'Chronograph, Date, Hour, Minute, Second, Military', 9, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(44, 'Bradshaw Chronograph Quartz Black Dial Ladies Watch', 10, 'Gold-tone stainless steel case and bracelet. Fixed gold-tone bezel. Black dial with gold-tone hands and alternating index and Roman numeral hour markers. Arabic numeral minute markers (at 5 minute intervals). Minute markers around the outer rim. Dial Type: Analog. Date display between the 4 and 5 o\'clock positions. Chronograph - three sub-dials displaying: 60 second, 30 minute and 24 hour. Quartz movement. Scratch resistant mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 36 mm. Case thickness: 11 mm. Band width: 18 mm. Fold over clasp with a safety release. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second. Bradshaw Series. Sport watch style. Michael Kors Bradshaw Chronograph Quartz Black Dial Ladies Watch MK6959.', 144, 'MODEL\r\n', 0, 20, 36, 'Michael8_1.jpg', 'Michael8_2.jpg', 'Michael8_3.jpg', 100, 'Bradshaw', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel\r\n', 'Bracelet', 'Black', 0, 0, 'Fold Over with Safety Release', 'Black', 1, 'Scratch Resistant Mineral', 'Gold-tone', 'Alternating Index and Roman Numeral', 'Arabic Numeral Minute Markers (at 5 minute intervals). Minute Markers around the outer rim', '', 'Fixed', 'Gold-tone', 'Stainless Steel', 'Pull / Push', '100 meters / 330 feet', 'Date display between the 4 and 5 o\'clock positions', 'Chronograph, Date, Hour, Minute, Second', 6, 9, '2 Year Jomashop Warranty', 'Watches', 2),
(45, 'Bold Black Dial Black Ion-plated Men\'s Watch 3600261', 11, ' Fixed black ion-plated bezel. Black dial with black hands and index hour markers. The Movado dot marks the 12 o\'clock position. Dial Type: Analog. Quartz movement. Scratch resistant K1 crystal. Pull / push crown. Solid case back. Case size: 44 mm. Case thickness: 12 mm. Round case shape. Band width: 23 mm. Band length: 9 inches. Deployment clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute. Casual watch style. Movado Bold Black Dial Black Ion-plated Men\'s Watch 36002613600261.', 239.99, '3600261', 0, 10, 33, 'Movado1_1.png', 'Movado1_2.png', 'Movado1_3.png', 100, 'Bold', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel Mesh', 'Bracelet', 'Black Ion-plated', 9, 23, 'Deployment', 'Index', 1, 'Scratch Resistant K1 Mineral', 'Black', 'Index', 'Movado Dot marks the 12 o\'clock position.', '', 'Fixed', 'Black Ion-plated', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute', 4, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(46, 'Bold Gold Dial Ladies Watch', 11, 'Gold dial with yellow gold-tone hands. No markers. The Movado dot appears at the 12 o\'clock position. Dial Type: Analog. Quartz movement. Scratch resistant K1 mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 32 mm. Case thickness: 7.95 mm. Band width: 14.5 mm. Deployment clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute,. Additional Info: in general, withstands splashes or brief immersion in water, but not suitable for swimming or bathing. Casual watch style. Movado Bold Gold Dial Ladies Watch 3600382.', 224, '3600382', 1, 20, 22, 'Movado2_1.png', 'Movado2_2.png', 'Movado2_3.png', 100, 'Bold', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Yellow Gold PVD', 0, 14.5, 'Deployment', 'Gold', 1, 'Scratch Resistant K1 Mineral', 'Yellow Gold-tone', '', 'No Markers. Movado Dot appears at the 12 o\'clock position', '', 'Fixed', 'Yellow Gold PVD', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute,', 9, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(47, 'Bold Quartz Gunmetal Dial Men\'s Watch', 11, 'Black ion-plated stainless steel case with a black ion-plated stainless steel mesh bracelet. Fixed black on-plated bezel. Gunmetal dial with black hands and index hour markers. Minute markers around the outer rim. Movado dot appears at the 12 o\'clock position. Dial Type: Analog. One subdial displaying: small seconds. Quartz movement. Scratch resistant K1 mineral crystal. Pull / push crown. Solid case back. Round case shape. Case size: 45 mm. Case thickness: 10 mm. Band width: 22 mm. Fold over slip through clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute, second. Bold Series. Casual watch style. Watch label: Swiss Movt. Movado Bold Quartz Gunmetal Dial Men\'s Watch 3600679.', 299, '', 0, 20, 22, 'Movado3_1.png', 'Movado3_2.png', 'Movado3_3.png', 100, 'Swiss Movt', 1, '', 0, 40, 'Stainless Steel', 6, 'Solid', 'Stainless Steel Mesh', 'Bracelet', 'Black Ion-plated', 0, 22, 'Fold Over Slip Through', 'Gunmetal', 1, 'Scratch Resistant K1 Mineral', 'Black', '\r\nIndex', 'Minute Markers around the outer rim. Movado Dot appears at the 12 o\'clock position', '', 'Fixed', 'Black on-plated', 'Stainless Steel Mesh', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute, Second', 11, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(48, 'Black Dial Two-tone Men\'s Watch', 11, 'Stainless steel case with a two-tone (silver-tone and yellow gold PVD) stainless steel bracelet. Fixed stainless steel bezel. Black dial with yellow gold-tone dauphine-style hands. No markers. The Movado dot appears at the 12 o\'clock position. Dial Type: Analog. Quartz movement. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape. Case size: 39 mm. Case thickness: 7 mm. Band width: 21 mm. Deployment clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute. Dive watch style. Watch label: Swiss Made. Movado Black Dial Two-tone Men\'s Watch 0606958', 289, '0606958', 0, 10, 39, 'Movado4_1.png', 'Movado4_2.png', 'Movado4_3.png', 100, 'Swiss Made', 5, '', 0, 27, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Two-tone (Silver-tone and Yellow Gold PVD)', 0, 21, 'Deployment', 'Black', 1, 'Scratch Resistant Sapphire', 'Yellow Gold-tone Dauphine-style', 'The signature Movado Dot appears at the 12 o\'clock position', 'No Markers. Movado Dot appears at the 12 o\'clock position', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute', 36, 2, '2 Year Jomashop Warranty', 'Watches', 2),
(49, 'Bold Trend Quartz Silver Dial Men\'s Watch', 11, 'Silver-tone stainless steel case with a navy leather strap. Fixed silver-tone stainless steel bezel. Silver dial with silver-tone hands. Movado dot appears at the 12 o\'clock position. Dial Type: Analog. Quartz movement. Scratch resistant K1 mineral crystal. Pull / push crown. Solid case back. Round case shape, case size: 45 mm. Tang clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute, small second. Bold Series. Casual watch style. Watch label: Swiss', 259, '3600769', 1, 20, 45, 'Movado5_1.png', 'Movado5_2.png', 'Movado5_3.png', 100, 'Swiss Made', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Leather', 'Strap', 'Navy', 0, 0, 'Trang', 'Silver', 1, 'K1 Mineral', 'Silver-tone', '', 'Movado Dot appears at the 12 o\'clock position', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Pus', '30 meters / 100 feet', '', 'Hour, Minute, Small Second', 12, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(50, 'Bold Quartz Black Dial Men\'s Watch', 11, 'Black ion-plated stainless steel case with a grey leather strap. Fixed black ion-plated bezel. Black museum dial with black hands and index hour markers. Minute markers around the outer rim. The Movado dot appears at the 12 o\'clock position. Dial Type: Analog. Small seconds sub-dial. Quartz movement. Scratch resistant K1 mineral crystal. Pull / push crown. Solid case back. Round case shape, case size: 44.5 mm. Tang clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute, second. Bold Series. Dress watch style. Movado Bold Quartz Black Dial Men\'s Watch 3600770.', 239, '3600770', 1, 10, 44.5, 'Movado6_1.png', 'Movado6_2.png', 'Movado6_3.png', 100, 'Bold', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Leather', 'Strap', 'Grey', 0, 0, 'Tang', 'Black Museum', 1, 'Scratch Resistant K1 Mineral', 'Black', 'Index', '', 'Minute Markers around the outer rim. Movado Dot appears at the 12 o\'clock position', 'Fixed', 'Black Ion-plated', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', '', '30 meters / 100 feet', 4, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(51, 'Classic Museum Quartz Black Dial Ladies Watch', 11, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel. Black dial with silver-tone dauphine-style shape hands. No markers. The Movado dot appears at the 12 o\'clock position. Dial Type: Analog. Quartz movement. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape. Case size: 28 mm. Band width: 14 mm. Butterfly clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute. Casual watch style. Watch label: Swiss Movt. Movado Classic Museum Quartz Black Dial Ladies Watch 2100017.', 254, '2100017', 0, 20, 28, 'Movado7_1.png', 'Movado7_2.png', 'Movado7_3.png', 100, 'Swiss Movt', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Butterfly', 'Black', 1, 'Scratch Resistant Sapphire', 'Silver-tone Dauphine-style shape', '', 'No Markers. Movado Dot appears at the 12 o\'clock position', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute', 36, 1, '2 Year Jomashop Warranty', 'Watches', 2),
(52, 'Bold Evolution Quartz Black Dial Ladies Watch\r\n', 11, 'Black IP stainless steel case and bracelet. Fixed black IP stainless steel bezel. Black dial with black hands. Movardo dot appears at the 12 o\'clock position. Dial Type: Analog. Quartz movement. Scratch resistant K1 crystal. Pull / push crown. Solid case back. Round case shape, case size: 34 mm. Deployment with push button release clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute. Bold Evolution Series. Dress watch style. Watch label: Swiss Made. Movado Bold Evolution Quartz Black Dial Ladies Watch 3600829.', 289, '3600829', 1, 20, 34, 'Movado8_1.png', 'Movado8_2.png', 'Movado8_3.png', 100, 'Swiss Made', 5, '', 0, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Black IP', 0, 0, 'Deployment with Push Button Release', 'Black', 1, 'Scratch Resistant K1', 'Black', '', 'Movardo Dot appears at the 12 o\'clock position', '', 'Fixed', 'Black IP', 'Stainless Steel', 'Pull / Push', '30 meters / 100 feet', '', 'Hour, Minute', 36, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(53, 'Speedmaster Racing Automatic Chronograph Men\'s Watch', 12, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel with black aluminum top ring showing tachymeter markings. Black dial with luminous silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 6 o\'clock position. Chronograph - three sub-dials displaying: 60 second, 30 minute and 12 hour. Omega calibre 3330 automatic movement with a 52-hour power reserve. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Case size: 40 mm. Case thickness: 15 mm. Round case shape. Band width: 19 mm. Band length: 8.5 inches. Deployment clasp with a push button release. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second, chronometer, tachymeter. Luxury watch style. Watch label: Swiss Made. Item Variations: 326 30 40 50 01 001, 326-30-40-50-01-001, 326/30/40/50/01/001, 32630405001001. Omega Speedmaster Racing Automatic Chronograph Men\'s Watch 326.30.40.50.01.001.', 3.395, '326.30.40.50.01.001', 0, 20, 40, 'Omega1_1.png', 'Omega1_2.png', 'Omega1_3.png', 100, 'Speedmaster Racing', 2, 'Omega Calibre 3330', 52, 15, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 8.5, 19, 'Deployment with Push Button Release', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Index', 'Minute Markers around the outer rim', '', 'Fixed Tachymeter Scale', 'Black', 'Aluminum Top Ring', 'Pull / Push', '100 meters / 330 feet', 'Date display at the 6 o\'clock position', 'Chronograph, Date, Hour, Minute, Second, Chronometer, Tachymeter', 5, 5, '4 Year Jomashop Warranty', 'Watches', 2),
(54, 'Speedmaster Chronograph Hand Wind Black Dial Men\'s Watch', 12, 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel with an inlaid black aluminium ring bezel. Black dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Chronograph - three sub-dials displaying: 60 second, 30 minute and 12 hour. Omega Calibre 3861 Automatic movement, based upon Lemania 1873, containing 26 Jewels, bitting at 21600 vph, and has a power reserve of approximately 50 hours. Scratch resistant hesalite crystal crystal. Pull / push crown. Solid case back. Round case shape, case size: 42 mm, case thickness: 13.58 mm. Deployment clasp. Water resistant at 50 meters / 165 feet. Functions: chronograph, hour, minute, second. Additional Info: original box, manual (complete accessories). Speedmaster Series. Dive watch style. Watch label: Swiss Made. Omega Speedmaster Chronograph Hand Wind Black Dial Men\'s Watch 310.30.42.50.01.001.', 5.6, '310.30.42.50.01.001', 0, 20, 42, 'Omega2_1.png', 'Omega2_2.png', 'Omega2_3.png', 100, 'Speedmaster', 4, '', 55, 13.58, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Deployment', 'Black', 1, 'Hesalite crystal', 'Silver-tone', 'Index', 'Minute Markers around the outer rim', 'Three - 60 Second, 30 Minute and 12 Hour', 'Fixed', 'Silver-tone', 'Stainless Steel with an inlaid Black Aluminium Ring', 'Pull / Push', '50 meters / 165 feet', '', 'Chronograph, Hour, Minute, Second', 11, 2, '4 Year Jomashop Warranty', 'Watches', 2),
(55, 'Seamaster Automatic Blue Dial Steel Men\'s Watch', 12, 'Stainless steel case with a stainless steel bracelet. Uni-directional rotating stainless steel bezel with a blue ceramic (count-up elapsed time) top ring bezel. Blue dial with rhodium-plated skeleton hands and dot hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 6 o\'clock position. Omega calibre 8800 automatic movement, containing 35 Jewels, bitting at 25200 vph, and has a power reserve of approximately 55 hours. Scratch resistant sapphire crystal. Screw down crown. Transparent case back. Round case shape. Case size: 42 mm. Case thickness: 14 mm. Band width: 20 mm. Deployment clasp with a push button release. Water resistant at 300 meters / 1000 feet. Functions: date, hour, minute, second. Seamaster Series. Dive watch style. Watch label: Swiss Made. Omega Seamaster Automatic Blue Dial Steel Men\'s Watch 210.30.42.20.03.001.', 4.525, '210.30.42.20.03.001', 1, 20, 42, 'Omega3_1.png', 'Omega3_2.png', 'Omega3_3.png', 100, 'Swiss Made', 2, 'Omega Calibre 8800', 55, 0, 'Stainless Steel', 6, 'Transparent', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 20, 'Deployment with Push Button Release', 'Blue', 1, 'Scratch Resistant Sapphire', 'Rhodium-plated Skeleton', 'Dot', 'Minute Markers around the outer rim', '', 'Uni-directional Rotating', 'Silver-tone', 'Stainless Steel with a Blue Ceramic (Count-Up Elapsed Time) Top Ring', 'Screw Down', '300 meters / 1000 feet\r\n', 'Date display at the 6 o\'clock position', 'Date, Hour, Minute, Second', 12, 2, '4 Year Jomashop Warranty', 'Watches', 2),
(56, 'De Ville Prestige Blue Dial Men\'s Watch', 12, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel. Blue dial with silver-tone dauphine-style hands and index hour markers. Roman numeral marks the 3, 6, 9 and 12 o\'clock position. Dial Type: Analog. Date display at the 3 o\'clock position. Omega calibre 2500 automatic movement, based upon ETA 2892-A2, containing 27 Jewels, bitting at 25200 vph, and has a power reserve of approximately 48 hours. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape, Case size: 36.8 mm. Case thickness: 10 mm. Band width: 21.6 mm. Band length: 8.5 inches. Deployment clasp with a push button release. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second, co-axial escapement, chronometer. Luxury watch style. Watch label: Swiss Made. Item Variations: 42410372003001. Omega De Ville Prestige Blue Dial Men\'s Watch 424.10.37.20.03.001.', 2.195, '424.10.37.20.03.001', 1, 20, 38.8, 'Omega4_1.png', 'Omega4_2.png', 'Omega4_3.png', 100, 'Swiss Made', 2, 'Omega Calibre 2500', 48, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 8.5, 21.6, '\r\nDeployment with Push Button Release', 'Blue', 1, 'Scratch Resistant Sapphire', 'Silver-tone Dauphine-style', 'Index', 'Roman Numeral marks the 3, 6, 9 and 12 o\'clock position.', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second, Co-Axial Escapement, Chronometer', 12, 5, '4 Year Jomashop Warranty', 'Watches', 2),
(57, 'Speedmaster Racing Automatic Chronograph Men\'s Watch 32630405002001', 12, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel with a black aluminium ring showing tachymeter markings. Silver dial with luminous black hands and index hour markers. Arabic numeral minute markers (at 5 minute intervals). Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 6 o\'clock position. Chronograph - three sub-dials displaying: 60 second, 30 minute and 12 hour. Omega calibre 3330 automatic movement, based upon ETA Valjoux 7753, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 52 hours. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape. Case size: 40 mm. Case thickness: 15 mm. Band width: 19 mm. Band length: 8.5 inches. Fold over clasp with a push button release. Water resistant at 100 meters / 330 feet. Functions: chronograph, tachymeter, date, hour, minute, second, chronometer. Speedmaster Racing Series. Luxury watch style. Watch label: Swiss Made. Omega Speedmaster Racing Automatic Chronograph Men\'s Watch 32630405002001.', 3.349, '326.30.40.50.02.001', 1, 20, 40, 'Omega5_1.png', 'Omega5_2.png', 'Omega5_3.png', 100, 'Swiss Made', 2, 'Omega Calibre 3330', 52, 15, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 8.5, 19, 'Fold Over with Push Button Release', 'Silver', 1, 'Scratch Resistant Sapphire', 'Luminous Black', 'Index', 'Arabic Numeral Minute markers (at 5 minute intervals). Minute Markers around the outer rim', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel with a Black Aluminium Top Ring showing Tachymeter Markings', 'Pull / Push', '100 meters / 330 feet', 'Date display at the 6 o\'clock position', 'Chronograph, Tachymeter, Date, Hour, Minute, Second, Chronometer', 11, 1, '4 Year Jomashop Warranty', 'Watches', 2),
(58, 'Seamaster 300M \"007 Edition\" \"No Time To Die\" Automatic Chronometer', 12, 'Grey titanium case with a grey titanium mesh bracelet. Uni-directional rotating grey titanium bezel. Brown dial with luminous titanium hands and dot hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Omega calibre 8806 automatic movement, containing 35 Jewels, bitting at 25200 vph, and has a power reserve of approximately 55 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Case size: 42 mm. Band width: 20 mm. Fold over slip through clasp. Water resistant at 300 meters / 100 feet. Functions: hour, minute, second, co-axial escapement, chronometer, magnetic resistant. Additional Info: 007 edition. Seamaster Series. Luxury watch style. Watch label: Swiss Made. Omega Seamaster 300M \"007 Edition\" \"No Time To Die\" Automatic Chronometer Brown Dial Men\'s Watch 210.90.42.20.01.001.', 7.95, '210.90.42.20.01.001', 1, 20, 42, 'Omega6_1.png', 'Omega6_2.png', 'Omega6_3.png', 100, 'Swiss Made', 2, 'Omega Calibre 8806', 55, 0, 'Titanium', 6, 'Solid', 'Titanium Mesh', 'Bracelet', 'Grey', 0, 20, 'Fold Over Slip Through', 'Brown', 1, 'Scratch Resistant Sapphire', 'Luminous Titanium', 'Dot', 'Minute Markers around the outer rim', 'Hands and Markers', 'Uni-directional Rotating', 'Grey', 'Titanium', 'Screw Down', '30 meters / 100 feet', '', 'Hour, Minute, Second, Co-Axial Escapement, Chronometer, Magnetic Resistant', 39, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(59, 'Speedmaster Racing Automatic Chronograph Black Dial Men\'s Watch', 12, 'Stainless steel case with a black rubber strap. Fixed stainless steel bezel with a black aluminium ring showing tachymeter markings. Black dial with luminous silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 6 o\'clock position. Chronograph - three sub-dials displaying: 60 second, 30 minute and 12 hour. Omega calibre 3330 automatic movement, based upon ETA Valjoux 7753, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 52 hours. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape. Case size: 40 mm. Case thickness: 16 mm. Band width: 21.6 mm. Band length: 8.5 inches. Fold over clasp with a push button release. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second, chronometer. Speedmaster Racing Series. Luxury watch style. Watch label: Swiss Made. Item Variations: 326 32 40 50 01 001, 326-32-40-50-01-001, 326/32/40/50/01/001, 32632405001001. Omega Speedmaster Racing Automatic Chronograph Black Dial Men\'s Watch 326.32.40.50.01.001.', 3.695, '326.32.40.50.01.001', 0, 0, 40, 'Omega7_1.png', 'Omega7_2.png', 'Omega7_3.png', 100, 'Swiss Made', 2, 'Omega Calibre 3330', 52, 16, 'Stainless Steel', 6, 'Solid', 'Rubber', 'Strap', 'Black', 8.5, 21.6, 'FolFd Over with Push Button Release', 'Black', 1, 'Scratch Resistant Sapphire', '', 'Index', 'Minute Markers around the outer rim', '', 'Fixed', 'Silver-tone', 'Stainless Steel with a Black Aluminium Ring with Tachymeter Marki', 'Pull / Push', '100 meters / 330 feet\r\n', 'Date display at the 6 o\'clock position', 'Chronograph, Date, Hour, Minute, Second, Chronometer', 9, 5, '4 Year Jomashop Warranty', 'Watches', 2),
(60, 'Seamaster Automatic Blue Dial Men\'s Watch', 12, 'Stainless steel case with a blue rubber strap. Uni-directional rotating stainless steel bezel with a blue ceramic (count-up elapsed time) top ring. Blue dial with luminous rhodium-plated skeleton hands and dot hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 6 o\'clock position. Omega calibre 8800 automatic movement, containing 35 Jewels, bitting at 25200 vph, and has a power reserve of approximately 55 hours. Scratch resistant sapphire crystal. Screw down crown. Transparent case back. Round case shape. Case size: 42 mm. Band width: 20 mm. Tang clasp. Water resistant at 300 meters / 1000 feet. Functions: date, hour, minute, second, co-axial escapement, chronometer. Seamaster Series. Dive watch style. Watch label: Swiss Made. Omega Seamaster Automatic Blue Dial Men\'s Watch 210.32.42.20.03.001.', 4.08, '210.32.42.20.03.001', 0, 10, 42, 'Omega8_1.png', 'Omega8_2.png', 'Omega8_3.png', 100, 'Swiss Made', 2, 'Omega Calibre 8800', 55, 0, 'Stainless Steel', 6, 'Transparent', 'Rubber', 'Strap', 'Blue', 0, 20, 'Tang', 'Blue', 1, 'Scratch Resistant Sapphire', 'Luminous Rhodium-plated Skeleton', 'Dot', 'Minute Markers around the outer rim', 'Hands and Markers', 'Uni-directional Rotating', 'Silver-tone', 'Stainless Steel with a Blue Ceramic (Count-Up Elapsed Time) Top Ring', 'Screw Down', '300 meters / 1000 feet', 'Date display at the 6 o\'clock position', 'Date, Hour, Minute, Second, Co-Axial Escapement, Chronometer', 34, 2, '4 Year Jomashop Warranty', 'Watches', 2),
(61, 'Luminor Marina Automatic Chronometer Black Dial Men\'s Watch', 13, 'Silver-tone stainless steel case with a black rubber strap. Fixed silver-tone polished stainless steel bezel. Black dial with luminous hands and Arabic numeral hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. One subdial displaying: small second at the 9 o\'clock position. Panerai Calibre OP III Automatic movement, based upon 7750-P1, containing 21 Jewels, bitting at 28800 vph, and has a power reserve of approximately 42 hours. Scratch resistant domed anti-reflective sapphire crystal. Stainless steel with patented locking mecha crown. Solid case back. Cushion case shape, case size: 44 mm. Deployment clasp. Water resistant at 300 meters / 1000 feet. Functions: date, hour, minute, small second, chronometer. Luminor Marina Automatic Series. Dive watch style. Watch label: Swiss Made. Pre-owned Panerai Luminor Marina Automatic Chronometer Black Dial Men\'s Watch PAM00164.', 3.95, 'PAM00164', 0, 10, 42, 'Paneral1_1.png', 'Paneral1_2.png', 'Paneral1_3.png', 100, 'Swiss Made', 2, 'Panerai Calibre OP III', 42, 0, 'Stainless Steel', 1, 'Solid', 'Rubber', 'Strap', 'Black', 0, 20, 'Deployment', 'Blue', 1, 'Scratch Resistant Sapphire', 'Luminous', 'Arabic Numeral', 'Minute Markers around the outer rim', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Polished Stainless Steel', 'Stainless Steel with Patented Locking Mecha', '300 meters / 1000 feet', 'Date display at the 6 o\'clock position', 'Date, Hour, Minute, Small Second, Chronometer', 36, 6, '1 Year Jomashop Warranty', 'Watches', 2),
(62, 'Luminor 1950 3 Days GMT Automatic Black Dial Men\'s Watch', 13, 'Silver-tone stainless steel case with a black rubber strap. Fixed silver-tone stainless steel bezel. Black dial with luminous hands and stick hour markers. Arabic numerals mark the 6, 9 and 12 o\'clock positions. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. One subdial displaying: small second at the 9 o\'clock position. Panerai Calibre P.9001 Automatic movement, containing 29 Jewels, composed of 229 parts, bitting at 28800 vph, and has a power reserve of approximately 72 hours. Scratch resistant sapphire crystal. Fluted protected crown. Sapphire crystal exhibition case back. Cushion case shape, case size: 44 mm, case thickness: 18 mm. Band width: 24 mm. Fold over clasp with a safety release. Water resistant at 300 meters / 1000 feet. Functions: GMT, date, hour, minute, small second, power reserve indicator. Luminor 1950 3 Days Gmt Automatic Series. Dress watch style. Watch label: Swiss Made. Pre-owned Panerai Luminor 1950 3 Days GMT Automatic Black Dial Men\'s Watch PAM00320.', 4.495, 'PAM00320', 1, 10, 44, 'Paneral2_1.png', 'Paneral2_2.png', 'Paneral2_3.png', 100, 'Swiss Made', 2, 'Panerai Calibre P.9001', 72, 18, 'Stainless Steel', 1, 'Sapphire Crystal Exhibition', 'Stainless Steel', 'Strap', 'Black', 0, 24, 'Fold Over with Safety Release', 'Blue', 1, 'Scratch Resistant Sapphire', 'Luminous', 'Arabic Numerals mark the 6, 9 and 12 o\'clock positions', 'Arabic Numerals mark the 6, 9 and 12 o\'clock positions', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Polished Stainless Steel', 'Fluted Protected', '300 meters / 1000 feet', 'Date display at the 3 o\'clock position', 'GMT, Date, Hour, Minute, Small Second, Power Reserve Indicator', 34, 6, '1 Year Jomashop Warranty', 'Watches', 2),
(63, 'Luminor Quaranta Automatic White Dial Men\'s Watch', 13, 'Stainless steel case with a black leather strap. Fixed stainless steel bezel. White dial with index-Arabic numeral hour markers. Dial Type: Analog. One subdial displaying: small second. Panerai Calibre P.900 Automatic movement, based upon Panerai OP XXXIV, containing 25 Jewels, bitting at 28800 vph, and has a power reserve of approximately 72 hours. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape, case size: 40 mm. Tang clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, small second. Luminor Series. Luxury watch style. Watch label: Swiss Made. Panerai Luminor Quaranta Automatic White Dial Men\'s Watch PAM01371.', 6.29, 'PAM01371', 0, 10, 40, 'Paneral3_1.png', 'Paneral3_2.png', 'Paneral3_3.png', 100, 'Swiss Made', 2, 'Panerai Calibre P.900', 72, 0, 'Stainless Steel', 6, 'Solid', 'Rubber', 'Strap', 'Black', 0, 0, 'Tang', 'White', 1, 'Scratch Resistant Sapphire', '', 'Index-Arabic Numeral', 'One - Small Second', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '300 meters / 1000 feet', '', 'Date, Hour, Minute, Small Second', 36, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(64, 'Luminor 1950 Automatic Black Dial Men\'s Watch', 13, 'Silver-tone stainless steel case with a black rubber strap. Fixed silver-tone stainless steel bezel. Black dial with luminous silver-tone hands and Arabic numeral hour markers. Dial Type: Analog. Luminescent hands. Date display at the 3 o\'clock position. One subdial displaying: small second. Panerai Calibre P.9010 Automatic movement, containing 31 Jewels, composed of 200 parts, bitting at 28800 vph, and has a power reserve of approximately 72 hours. Scratch resistant sapphire crystal. Pull / push crown. Transparent case back. Cushion case shape, case size: 44 mm, case thickness: 15.6 mm. Band width: 24 mm. Buckle clasp. Water resistant at 300 meters / 1000 feet. Functions: date, hour, minute, second. Luminor 1950 Series. Luxury watch style. Watch label: Swiss Made. Pre-owned Panerai Luminor 1950 Automatic Black Dial Men\'s Watch PAM01359.', 4.695, 'PAM01359', 0, 10, 44, 'Paneral4_1.png', 'Paneral4_2.png', 'Paneral4_3.png', 100, 'Swiss Made', 2, 'Panerai Calibre P.900', 72, 0, 'Stainless Steel', 1, 'Transparent', 'Rubber', 'Analog', 'Black', 0, 0, 'Tang', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Arabic Numeral', 'Small Second', 'Hands', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '300 meters / 1000 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Small Second', 36, 5, '1 Year Jomashop Warranty', 'Watches', 2),
(65, 'Luminor Blu Mare Hand Wind Blue Dial Men\'s Watch', 13, 'Stainless steel case with a blue leather strap. Fixed stainless steel bezel. Blue dial with index numeral hour markers. Arabic numerals appear at the 3, 6 and 12 o\'clock positions. Dial Type: Analog. Small seconds sub-dial. Panerai calibre P.6000 hand wind movement, containing 19 Jewels, bitting at 21600 vph, and has a power reserve of approximately 72 hours. Scratch resistant sapphire crystal. Solid case back. Cushion case shape. Case size: 44 mm. Case thickness: 13.05 mm. Tang clasp. Water resistant at 100 meters / 330 feet. Functions: hour, minute, second. Additional Info: original box, manual (complete accessories). Luminor Series. Luxury watch style. Watch label: Swiss Made. Panerai Luminor Blu Mare Hand Wind Blue Dial Men\'s Watch PAM01085.', 4.85, 'PAM01085', 0, 10, 44, 'Paneral5_1.png', 'Paneral5_2.png', 'Paneral5_3.png', 100, 'Swiss Made', 4, 'Panerai Calibre P.600', 72, 0, 'Stainless Steel', 1, 'Solid', 'Leather', 'Strap', 'Blue', 0, 0, 'Tang', 'Blue', 1, 'Scratch Resistant Sapphire', 'Silver-tone', 'Index', 'Arabic Numerals appear at the 3, 6 and 12 o\'clock positions', 'Hands', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '100 meters / 330 feet', '', 'Hour, Minute, Small Second', 36, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(66, 'Radiomir Black Seal Hand Wind Black Dial Men\'s Watch', 13, 'Stainless steel case with a black (calfskin) leather strap. Fixed stainless steel bezel. Black dial with luminous black hands and index hour markers. Arabic numerals appear at the 3, 6 and 12 o\'clock positions. Dial Type: Analog. Luminescent hands and markers. Small seconds sub-dial. Panerai calibre P.6000 hand wind movement, containing 19 Jewels, bitting at 21600 vph, and has a power reserve of approximately 72 hours. Scratch resistant sapphire crystal. Solid case back. Cushion case shape. Case size: 45 mm. Band width: 27 mm. Tang clasp. Water resistant at 100 meters / 330 feet. Functions: hour, minute, second. Radiomir Black Seal Series. Dress watch style. Watch label: Swiss Made. Panerai Radiomir Black Seal Hand Wind Black Dial Men\'s Watch PAM00754.', 4.15, 'PAM00754', 0, 10, 45, 'Paneral6_1.png', 'Paneral6_2.png', 'Paneral6_3.png', 100, 'Swiss Made', 4, 'Panerai Calibre P.6000', 72, 0, 'Stainless Steel', 1, 'Solid', 'Leather', 'Strap', 'Black', 0, 27, 'Tang', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Black', 'Index', 'Arabic Numerals appear at the 3, 6 and 12 o\'clock positions', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '100 meters / 330 feet', '', 'Hour, Minute, Second', 36, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(67, 'Luminor Marina Automatic Blue Dial Men\'s Watch', 13, 'Stainless steel case with a blue (alligator) leather strap. Fixed stainless steel bezel. Blue dial with luminous silver-tone hands and index hour markers. Arabic numerals appear at the 6, 9 and 12 o\'clock positions. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Small seconds sub-dial at the 9 o\'clock position. . Panerai calibre P.9010 automatic movement, containing 31 Jewels, composed of 200 parts, bitting at 28800 vph, and has a power reserve of approximately 72 hours. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Cushion case shape. Case size: 44 mm. Case thickness: 14 mm. Tang clasp. Water resistant at 300 meters / 1000 feet. Functions: date, hour, minute, small second. Luminor Marina Series. Luxury watch style. Watch label: Swiss Made. Panerai Luminor Marina Automatic Blue Dial Men\'s Watch PAM01313.', 6.775, 'PAM01313', 0, 10, 44, 'Paneral7_1.png', 'Paneral7_2.png', 'Paneral7_3.png', 100, 'Swiss Made', 2, 'Panerai Calibre P.9000', 72, 14, 'Stainless Steel', 1, 'Solid', 'Leather', 'Strap', 'Blue', 0, 0, 'Tang', 'Blue', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Index', 'Arabic Numerals appear at the 3, 6 and 12 o\'clock positions', 'Hands and Markers', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '300 meters / 1000 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Small Second', 2, 3, '2 Year Jomashop Warranty', 'Watches', 2),
(68, 'Luminor Quaranta Automatic White Dial Men\'s Watch', 13, 'Stainless steel case with a black leather strap. Fixed stainless steel bezel. White dial with index-Arabic numeral hour markers. Dial Type: Analog. One subdial displaying: small second. Panerai Calibre P.900 Automatic movement, based upon Panerai OP XXXIV, containing 25 Jewels, bitting at 28800 vph, and has a power reserve of approximately 72 hours. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape, case size: 40 mm. Tang clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, small second. Luminor Series. Luxury watch style. Watch label: Swiss Made. Panerai Luminor Quaranta Automatic White Dial Men\'s Watch PAM01371.', 6.29, 'PAM01371', 0, 0, 40, 'Paneral8_1.png', 'Paneral8_2.png', 'Paneral8_3.png', 100, 'Swiss Made', 2, 'Panerai Calibre P.9000', 72, 0, 'Stainless Steel', 6, 'Solid', 'Alligator Leather', 'Strap', 'Blue', 0, 0, 'Tang', 'White', 1, 'Scratch Resistant Sapphire', '', 'Index-Arabic Numeral', 'One - Small Second', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Pull / Push', '300 meters / 1000 feet', '', 'Date, Hour, Minute, Small Second', 4, 5, '2 Year Jomashop Warranty', 'Watches', 2);
INSERT INTO `watches` (`id`, `name`, `brand`, `description`, `price`, `model`, `gender`, `sale`, `caseSize`, `img1`, `img2`, `img3`, `instock`, `watchLabel`, `movement`, `engine`, `powerReserve`, `caseThickness`, `caseMaterial`, `caseShape`, `caseBack`, `bandMaterial`, `bandType`, `bandColor`, `bandLength`, `bandWidth`, `clasp`, `dialColor`, `type`, `crystal`, `hands`, `dialMarkers`, `secondMarkers`, `lumine`, `bezel`, `bezelColor`, `bezelMaterial`, `crown`, `waterRes`, `calendar`, `func`, `features`, `style`, `warranty`, `department`, `category`) VALUES
(69, 'Explorer Automatic Black Dial Men\'s Watch', 13, 'Silver-tone stainless steel case with a silver-tone stainless steel oyster bracelet. Fixed domed silver-tone stainless steel bezel. Black dial with silver-tone Mercedes-logo, sword, and Breguet-style shape hands and stick with Arabic numerals at 3, 6, and 9 o\'clock positions hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Rolex Calibre 3130 Automatic movement, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 48 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape, case size: 36 mm, case thickness: 12 mm. Band width: 20 mm, band length: 6 3/4 inches. Fold over clasp. Water resistant at 100 meters / 330 feet. Functions: hours, minutes, seconds. Explorer Series. Luxury watch style. Watch label: Swiss Made. Pre-owned Rolex Explorer Automatic Black Dial Men\'s Watch 114270BKASO.', 5.495, '114270BKASO', 1, 0, 40, 'Rolex1_1.png', 'Rolex1_2.png', 'Rolex1_3.png', 100, 'Swiss Made', 2, 'Rolex Calibre 3130', 48, 12, 'Stainless Steel', 6, 'Solid', 'Stainless steel Oyster', 'Bracelet', 'Silver-tone', 6, 20, 'Fold Over', 'Silver-tone', 1, '', '', 'Index-Arabic Numeral', 'One - Small Second', '', 'Fixed Domed', 'Silver-tone', 'Stainless Steel', 'Screw Down', '100 meters / 330 feet', 'Hours, Minutes, Seconds', 'Date, Hour, Minute, Small Second', 36, 5, '\r\n1 Year Jomashop Warranty', 'Watches', 2),
(70, 'Submariner Automatic Chronometer Black Dial Men\'s Watch BKSO', 13, 'Rolex Submariner Automatic Chronometer Black Dial Men\'s Watch 124060BKSO - 2022 model with Rolex boxes Stainless steel case with a stainless steel bracelet. Uni-directional rotating stainless steel bezel with a black ceramic ring. Black dial with silver-tone hands and dot hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Rolex calibre 3230 automatic movement, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 70 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Case size: 41 mm. Case thickness: 12.5 mm. Oysterlock clasp. Water resistant at 300 meters / 1000 feet. Functions: hour, minute, second, chronometer. Submariner Series. Luxury watch style. Watch label: Swiss Made. Item Variations: M124060-0001, 124060ln. Rolex Submariner Automatic Chronometer Black Dial Men\'s Watch 124060BKSO.', 12.35, '124060', 1, 0, 41, 'Rolex2_1.png', 'Rolex2_2.png', 'Rolex2_3.png', 100, 'Swiss Made', 2, 'Rolex Calibre 3230', 70, 12.5, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Oysterlock', 'Black', 1, 'Scratch Resistant Sapphire', 'Silver-tone', 'Dot', 'Minute Markers around the outer rim', 'Hands and Markers', 'Uni-directional Rotating', 'Silver-tone', 'Stainless Steel with a Black Ceramic Ring', 'Screw Down', '300 meters / 1000 feet', '', 'Hour, Minute, Second, Chronometer', 36, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(71, 'GMT-Master II GMT Black Dial Batman Bezel Men\'s Watch', 13, '126710blnr. Stainless steel case with a stainless steel Rolex jubilee bracelet. Bi-directional rotating stainless steel bezel with a black and blue (Batman) ring showing 24 hour markers. Black dial with luminous silver-tone hands and dot hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Rolex calibre 3285 automatic movement with a 70-hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Case size: 40 mm. Folding oysterlock clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second, 24 hours, GMT. Additional Info: 126710blro-0001, m126710blro-0001. Luxury watch style. Watch label: Swiss Made. Rolex GMT-Master II \" Batman\" Black and Blue Bezel Automatic Men\'s Jubilee Watch 126710BKSJ.', 18.25, '126710blnr', 1, 0, 40, 'Rolex3_1.png', 'Rolex3_2.png', 'Rolex3_3.png', 100, 'Swiss Made', 2, 'Rolex Calibre 3285', 70, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Folding Oysterlock', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Dot', 'Minute Markers around the outer rim', 'Hands and Markers', 'Bi-directional Rotating', 'Blue and Black (Batman)', 'Stainless Steel with a Black Ceramic Ring', 'Screw Down', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Date, Hour, Minute, Second, 24 Hours, GMT', 36, 5, '2 Year Jomashop Warranty', 'Watches', 2),
(72, 'GMT Master II Black Index Dial Oyster Bracelet Steel Men\'s Watch', 13, 'Silver-tone stainless steel case and bracelet. Bi-directional rotating ceramic bezel with a black top ring. Black dial with luminous hands and luminous dots hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hand and dial markers. Date display at the 3 o\'clock position. Rolex Calibre 3186 Automatic movement, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 50 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape, case size: 40 mm, case thickness: 12 mm. Band width: 19.5 mm, band length: 7 1/4 inches. Folding oyster lock clasp. Water resistant at 100 meters / 330 feet. Functions: GMT, second time zone, date, hour, minute, second, chronometer. Additional Info: GMT timekeeping; green center hand indicates second time zone. Gmt-master II Series. Sport watch style. Watch label: Swiss Made. Pre-owned Rolex GMT Master II Black Index Dial Oyster Bracelet Steel Men\'s Watch 116710LN.', 11.495, '116710LN', 1, 0, 40, 'Rolex4_1.png', 'Rolex4_2.png', 'Rolex4_3.png', 100, 'Swiss Made', 2, 'Rolex Calibre 3186', 50, 12, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Stainless Steel', 7, 19.5, 'Folding Oyster Lock', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Dot', 'Minute Markers Around The Outer Rim', '', 'Bi-directional Rotating', 'Bi-directional Rotating', 'Ceramic', 'Screw Down', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'GMT, Second Time Zone, Date, Hour, Minute, Second, Chronometer', 38, 9, '1 Year Jomashop Warranty', 'Watches', 2),
(73, 'Submariner Automatic Chronometer Black Dial Men\'s Watch BKSO', 13, 'Stainless steel case with a stainless steel bracelet. Uni-directional rotating stainless steel bezel with a black ceramic ring. Black dial with luminous silver-tone hands and dot hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Rolex calibre 3235 automatic movement, based upon Rolex 3035, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 70 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Case size: 41 mm. Oysterlock clasp. Water resistant at 300 meters / 1000 feet. Functions: date, hour, minute, second, chronometer. Submariner Series. Luxury watch style. Watch label: Swiss Made. Item Variations: M126610LN-0001. Rolex Submariner Automatic Chronometer Black Dial Men\'s Watch 126610LNBKSO.', 14.95, '126610LN', 1, 0, 41, 'Rolex5_1.png', 'Rolex5_2.png', 'Rolex5_3.png', 100, 'Swiss Made', 2, 'Rolex Calibre 3235', 70, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Stainless Steel', 0, 0, 'Oysterlock', 'Black', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Dot', 'Minute Markers Around The Outer Rim', 'Hands and Markers', 'Uni-directional Rotating', 'Silver-tone', 'Stainless Steel with a Black Ceramic Ring', 'Screw Down', '300 meters / 1000 feet', 'Date display at the 3 o\'clock position', 'GMT, Second Time Zone, Date, Hour, Minute, Second, Chronometer', 36, 9, '1 Year Jomashop Warranty', 'Watches', 2),
(74, 'Oyster Perpetual 41 Automatic Blue Dial Men\'s Watch', 13, 'Stainless steel case with a stainless steel bracelet. Fixed stainless steel bezel. Blue dial with luminous silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Rolex calibre 3230 Automatic movement, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 70 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Case size: 41 mm. Oysterlock clasp. Water resistant at 100 meters / 330 feet. Functions: hour, minute, second, chronometer. Oyster Perpetual 41 Series. Sport watch style. Watch label: Swiss Made. Item Variations: M124300-0003. Rolex Oyster Perpetual 41 Automatic Blue Dial Men\'s Watch 124300BLSO.', 8.795, '124300BLSO', 1, 0, 41, 'Rolex6_1.png', 'Rolex6_2.png', 'Rolex6_3.png', 100, 'Swiss Made', 2, 'Rolex Calibre 3230', 70, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel', 'Bracelet', 'Silver-tone', 0, 0, 'Oysterlock', 'Blue', 1, 'Scratch Resistant Sapphire', 'Luminous Silver-tone', 'Index', 'Minute Markers around the outer rim', '', 'Fixed', 'Silver-tone', 'Stainless Steel', 'Screw Down', '100 meters / 330 feet', '', 'Hour, Minute, Second, Chronometer\r\n', 27, 9, '2 Year Jomashop Warranty', 'Watches', 2),
(75, 'Datejust Blue Dial Automatic Men\'s Jubilee Watch', 13, 'Stainless steel case with a stainless steel Rolex jubilee bracelet. Fixed fluted 18kt white gold bezel. Blue dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog. Date display at the 3 o\'clock position. Rolex calibre 3235 automatic movement with a 70-hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Case size: 41 mm. Round case shape. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Luxury watch style. Watch label: Swiss Made. Rolex Datejust Blue Dial Automatic Men\'s Jubilee Watch 126334BLSJ.', 14.55, '126334BLSJ', 1, 0, 41, 'Rolex7_1.png', 'Rolex7_2.png', 'Rolex7_3.png', 100, 'Swiss Made', 2, 'Rolex Calibre 3235', 70, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel Rolex Jubilee', 'Bracelet', 'Silver-tone', 0, 0, 'Oysterlock', 'Blue', 1, 'Scratch Resistant Sapphire', 'Silver-tone', 'Index', 'Minute Markers around the outer rim', '', 'Fixed Fluted', '18kt White Gold', '18kt White Gold', 'Screw Down', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Hour, Minute, Second, Chronometer\r\n', 4, 9, '2 Year Jomashop Warranty', 'Watches', 2),
(76, 'Datejust Automatic Men\'s Watch', 13, 'Silver-tone stainless steel case with a silver-tone stainless steel jubilee bracelet. Fixed fluted silver-tone stainless steel bezel. Rhodium dial with silver-tone hands and luminous stick hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display at the 3 o\'clock position. Rolex Calibre 3135 Automatic movement, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 48 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape, case size: 36 mm. Fold over clasp. Water resistant at 100 meters / 330 feet. Functions: hours, minutes, seconds, date. Datejust Series. Luxury watch style. Watch label: Swiss Made. Pre-owned Rolex Datejust Automatic Men\'s Watch 16234RSJ.', 5.495, '16234RSJ', 1, 0, 41, 'Rolex8_1.png', 'Rolex8_2.png', 'Rolex8_3.png', 100, 'Swiss Made', 2, 'Rolex Calibre 3135', 70, 0, 'Stainless Steel', 6, 'Solid', 'Stainless Steel Rolex Jubilee', 'Bracelet', 'Silver-tone', 0, 0, 'Oysterlock', 'Blue', 1, 'Scratch Resistant Sapphire', 'Silver-tone', 'Index', 'Minute Markers around the outer rim', '', 'Fixed Fluted', '18kt White Gold', '18kt White Gold', 'Screw Down', '100 meters / 330 feet', 'Date display at the 3 o\'clock position', 'Hour, Minute, Second, Chronometer\r\n', 4, 9, '2 Year Jomashop Warranty', 'Watches', 2);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
