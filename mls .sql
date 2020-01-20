-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 10:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mls`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `fullname`, `admin_image`) VALUES
(24, 'cszaid.farah@yahoo.com', 'aaa', 'farah', 'IMG_20181220_205018_079.jpg'),
(26, 'o@yahoo.com', 'o', 'osama', 'ui-sherman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_image`) VALUES
(17, 'home', 'here you can find any service may appear in home', 'house.png'),
(18, 'hotel', 'here you can find any service may appear in hotels', 'hotel.png'),
(19, 'university', 'all service you need in universities will be here', 'school.png'),
(22, 'school', 'whatever  service you want in schools you will find it here', 'education.png'),
(23, 'restaurant', 'popular restaurants ', 'dish.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_admin`
--

CREATE TABLE `contact_admin` (
  `req_id` int(3) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `admin_id` int(3) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_admin`
--

INSERT INTO `contact_admin` (`req_id`, `customer_id`, `customer_name`, `customer_email`, `admin_id`, `message`) VALUES
(51, 12, 'majd', 'm@m.com', 26, 'its a very helpful website'),
(53, 8, 'saja', 'sss@yahoo.com', 26, 'i like the design , its easy to use and very good thanks'),
(54, 8, 'saja', 'sss@yahoo.com', 24, 'hello admin i like the way you make your website '),
(55, 8, 'saja', 'sss@yahoo.com', 24, 'its a very useful website'),
(56, 12, 'majd', 'm@m.com', 0, 'dddd'),
(57, 12, 'majd', 'm@m.com', 26, 'hola admin i just wanna to tell you your website helps me alot and I able to work through it. thanks');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(3) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `phone`) VALUES
(8, 'saja', 'sss@yahoo.com', 'saja', 'amman/zarqa', '0790981219'),
(9, 'rana', 'rr@hotmail.com', 'rana', 'jordan/irbid', '0987347338'),
(10, 'fouad', 'fouad@r.com', 'fouad', 'usa/california', '0989498756'),
(11, 'bara', 'b@yahoo.com', 'bara', 'jordan/jerash', '0786352428'),
(12, 'majd', 'm@m.com', 'mm', 'jordan/amman', '0789363547'),
(13, 'ahmad', 'a@yahoo.com', 'ahmad', 'jordan/tafila', '0798542180');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `provider_id` int(3) NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `ser_id` int(3) NOT NULL,
  `provider_image` varchar(255) NOT NULL,
  `provider_email` varchar(255) NOT NULL,
  `provider_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`provider_id`, `provider_name`, `phone`, `ser_id`, `provider_image`, `provider_email`, `provider_password`) VALUES
(37, 'farah', '0789762334', 19, 'fr-08.jpg', 'zaid.fofo@yahoo.com', 'ff'),
(38, 'ahmad', '0789762334', 18, 'fr-06.jpg', 'admin@admin.com', 'aa'),
(39, 'osama', '0789762334', 18, '404.png', 'o@yahoo.com', 'o'),
(40, 'dema', '0789762334', 19, 'customer-img1.jpg', 'dema@gmail.com', 'dema'),
(41, 'laith', '0789762334', 19, 'customer-img2.jpg', 'l@gmail.com', 'laith'),
(42, '', '', 0, 'al-daraweesh-culture-wheel-amman-3420727897.jpg.jpg', '', ''),
(43, 'Al Quds Al Jadeed Restaurant', '(06) 556 0300', 31, 'al-quds.jpg', 'alquds@yahoo.com', 'alquds'),
(44, 'burgerizz', '0897365397', 32, 'AF1QipNbkbSHbiaOTLm7QwcwkP50K34pmMUYi0P0e9hdw408-h306-k-no.jpeg', 'burgerizz@yahoo.com', 'burgerizz'),
(46, 'Sakeyat Addaraweesh', '0896376528', 33, 'al-daraweesh-culture-wheel-amman-3420727897.jpg.jpg', 'SakeyatAddaraweesh@gmail.com', 'sakeyat'),
(47, 'marah', '0796538643', 24, 'customer-img1.jpg', 'marah@gmail.com', 'marah'),
(48, 'jamal', '0795431876', 21, 'ui-danro.jpg', 'jjjjj@g.com', 'jamal'),
(49, 'issam', '0796528753', 22, 'ui-sam.jpg', 'issam@y.com', 'issam'),
(50, 'kamal', '0797534964', 23, 'ui-sherman.jpg', 'kamal@yahoo.com', 'kamal'),
(51, 'lana', '0798356278', 25, 'ui-divya.jpg', 'lana@y.com', 'lana'),
(52, 'anas', '0786398257', 26, 'ui-danro.jpg', 'anas@h.com', 'anas'),
(53, 'rana', '0797453724', 34, 'follow-img.jpg', 'rr@hotmail.com', 'rana'),
(54, 'tamer', '0796309354', 35, 'ui-zac.jpg', 't@hotmail.com', 'tamer'),
(55, 'mona', '0786356298', 35, 'fr-10.jpg', 'm@m.com', 'mona'),
(56, 'laith', '0789762334', 22, 'fr-01.jpg', 'admin@admin.com', 'll'),
(58, 'rawad', '0798652419', 20, '2-format43.jpg', 'r@yahoo.com', 'rawad'),
(59, 'arjoun', '0789762334', 20, '14233048_300956023621769_3787535454464285498_n.jpg', 'admin@admin.com', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(3) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `provider_id` int(3) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `customer_id`, `customer_name`, `address`, `provider_id`, `message`) VALUES
(48, 8, 'saja', 'amman/zarqa', 37, 'hello farah i need your service plz call me to know more details.'),
(49, 8, 'saja', 'amman/zarqa', 37, 'if you want a job call me'),
(51, 8, 'saja', 'amman/zarqa', 37, 'this is new sms'),
(59, 8, 'saja', 'amman/zarqa', 39, 'hello contact me to have more details about my order plz.'),
(60, 10, 'fouad', 'usa/california', 37, 'hi farah i need your help could you please contact with me ?'),
(92, 8, 'saja', 'amman/zarqa', 53, 'flowers basket with multi colors ,can you provide me with your offers?'),
(93, 9, 'rana', 'jordan/irbid', 44, 'do you have pizza ?'),
(114, 12, 'majd', 'jordan/amman', 43, 'how much mansaf is?'),
(138, 12, 'majd', 'jordan/amman', 53, 'i need a flower box with multicolors how much it takes?'),
(139, 13, 'ahmad', 'jordan/tafila', 52, 'hi anas I have a son and he is 5 years old ,I face many problems to interact with him ,how can i meet you to give you more details about him?'),
(140, 13, 'ahmad', 'jordan/tafila', 58, 'hello rawad can i give you more details about what i need?'),
(141, 8, 'saja', 'amman/zarqa', 58, 'good morning , I need 3 persons to work in my home, can you tell me if you are available in monday 2nd of april 2020?'),
(142, 12, 'majd', 'jordan/amman', 58, 'hi sir, i need you to come and see my home when can you come?');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ser_id` int(3) NOT NULL,
  `ser_name` varchar(255) NOT NULL,
  `ser_desc` varchar(255) NOT NULL,
  `ser_image` varchar(255) NOT NULL,
  `cat_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ser_id`, `ser_name`, `ser_desc`, `ser_image`, `cat_id`) VALUES
(20, 'home cleaner', 'Dusting, sweeping, mopping, and washing floors, toilets, showers, tubs, driveways, windows, and counters.', 'residentialcleaningservice.jpg', 17),
(21, 'electrician ', ' maintain and repair electrical control, wiring, and lighting systems. ... Troubleshoot electrical issues using appropriate of testing devices.', 'electrician-1154x768.jpg', 17),
(22, 'carpenter', ' structures and fixtures, such as windows and molding. ... Construct building frameworks, including walls, floors, and doorframes.', 'young-stylish-cabinet-maker-with--glasses-and-hairstyle--strong--handsome-craftsman-holding-saw-and-wood-blank-at-workplace-944613244-5af9afc2a18d9e003c17040c.jpg', 17),
(23, 'blacksmith', 'creates objects from wrought iron or steel by forging the metal', 'artisan-blacksmith-equipment-2918011.jpg', 17),
(24, 'learning english', 'learn how to speak and understand the English language, read and write English at the same time.', 'English-Teacher-Cover-Letter-Banner.jpg', 22),
(25, 'office cleaner', 'cleaning equipment and supplies to maintain a high standard of cleanliness for the business that employs you', 'Commercial-Office-Cleaning.jpg', 22),
(26, 'social guide', ' provides integral and necessary services to educators, students and families to create the best programs and plans to help all children and adolescents be successful in and out of school.', 'bozgplgeoya54_article.jpg', 22),
(29, 'food delivery', ' Drivers transport food items from production areas to customers. A typical resume sample for this position mentions duties such as loading food, transporting it to the destination, making sure food safety standards are respected, collecting payments, and', 'food-delivery-service-order-online-man-blue-uniform-hand-holding-packaging-container-paper-bag-white-background-152464049.jpg', 22),
(31, 'traditional food', 'you will find restaurant who make a traditional food', '0105.jpg', 23),
(32, 'junk food', 'you will find restaurant who make junk food', 'image_c6ece50ec6fa1c0dd69bfbd1a13a4845.png', 23),
(33, 'caffe', 'you will find caffe', 'shutterstock_751955788-1.jpg', 23),
(34, 'flowers delivery', 'receive flowers in fastest way', '706844.jpg', 18),
(35, 'painter', ' prepares walls and other surfaces for painting by using sandpaper, scraping and removing old paint.', 'dearborn-painting-professional.jpg', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_admin`
--
ALTER TABLE `contact_admin`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ser_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contact_admin`
--
ALTER TABLE `contact_admin`
  MODIFY `req_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `provider_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ser_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
