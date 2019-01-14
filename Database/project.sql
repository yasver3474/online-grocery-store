-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 06:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cartToBuy` (IN `user_cart` INT)  BEGIN
insert into buy
select * from orders where user_id=user_cart;
delete from orders where user_id=user_cart;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc1` (IN `user_cart` INT, IN `item_cart` INT, IN `quantity_cart` INT)  BEGIN
insert into buy
select * from orders where user_id=user_cart and item_id=item_cart and quantity=quantity_cart;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`order_id`, `item_id`, `user_id`, `quantity`, `total_price`) VALUES
(3055361, 6005, 1000, 5, 66),
(306376452, 1001, 1001, 4, 40),
(469017414, 1002, 1000, 5, 10),
(469431386, 9001, 1010, 1, 30),
(579273261, 7001, 1001, 5, 10),
(793174937, 1001, 1001, 10, 40),
(900045855, 3001, 1000, 2, 20),
(971659064, 9001, 1010, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(10) NOT NULL,
  `item_no` int(5) NOT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_no`, `item_name`, `quantity`, `type`, `image`, `price`) VALUES
(1001, 1, 'Apple', 46, 'Fruit', 'apple.jpg', 40),
(1002, 2, 'Orange', 60, 'Fruit', 'orange.jpg', 10),
(1003, 3, 'Banana', 120, 'Fruit', 'banana.jpg', 5),
(1004, 4, 'Mango', 50, 'Fruit', 'mango.jpg', 15),
(1005, 5, 'Grapes', 100, 'Fruit', 'grapes.jpg', 25),
(1006, 6, 'Pineapple', 80, 'Fruit', 'pineapple.jpg', 80),
(1007, 7, 'Guava', 150, 'Fruit', 'guava.jpg', 10),
(1008, 8, 'Strawberry', 170, 'Fruit', 'strawberry.jpg', 90),
(1009, 9, 'Cherry', 60, 'Fruit', 'cheery.jpg', 60),
(2001, 10, 'Potatos', 300, 'Vegetable', 'potato.jpg', 20),
(2002, 11, 'Tomato', 200, 'Vegetable', 'tomato.jpg', 50),
(2003, 12, 'Onion', 150, 'Vegetable', 'onion.jpg', 30),
(2004, 13, 'Gralic', 80, 'Vegetable', 'garlic.jpg', 45),
(2005, 14, 'Ladyfinger', 250, 'Vegetable', 'ladyfinger.jpg', 30),
(2006, 15, 'Eggplant', 150, 'Vegetable', 'eggplant.jpg', 40),
(2007, 16, 'Capsicum', 50, 'Vegetable', 'capsicum.jpg', 80),
(2008, 17, 'Cauliflower', 30, 'Vegetable', 'cauliflower.jpg', 60),
(2009, 18, 'Cabbage', 30, 'Vegetable', 'cabbage.jpg', 50),
(3001, 19, 'Dettol', 284, 'Soaps', 'dettol.jpg', 20),
(3002, 20, 'Pears', 378, 'Soaps', 'pears1.jpg', 75),
(3003, 21, 'Lux', 370, 'Soaps', 'lux.jpg', 25),
(3004, 22, 'Dove', 248, 'Soaps', 'dove.jpg', 65),
(3005, 23, 'Nivea', 400, 'Soaps', 'nivea.jpg', 30),
(3006, 24, 'Cinthol', 250, 'Soaps', 'cinthol.jpg', 25),
(3007, 25, 'Park Avenue', 150, 'Soaps', 'parkAvenue.jpg', 35),
(3008, 26, 'Medimix', 80, 'Soaps', 'medimix.jpg', 45),
(3009, 27, 'Santoor', 100, 'Soaps', 'santoor.jpg', 20),
(4001, 28, 'Clinic Plus', 95, 'Shampoos', 'clinicPlus.jpg', 70),
(4002, 29, 'Sunsilk', 150, 'Shampoos', 'sunsilk.jpg', 120),
(4003, 30, 'Head & Shoulders', 200, 'Shampoos', 'head_shoulders.jpg', 170),
(4004, 31, 'Pantene', 79, 'Shampoos', 'pantene.jpg', 210),
(4005, 32, 'Dove Shine', 56, 'Shampoos', 'dove.jpg', 150),
(4006, 33, 'TRESemme Hair Fall Defense', 40, 'Shampoos', 'tresemme.jpg', 270),
(4007, 34, 'L Oreal Paris Hex 6 Oil Shampoo', 60, 'Shampoos', 'loreal.jpg', 225),
(4008, 35, 'Himalaya Anti Hair Fall', 100, 'Shampoos', 'himalaya.jpg', 200),
(4009, 36, 'Vatika', 174, 'Shampoos', 'vatika.jpg', 140),
(5001, 37, 'Surf Excel Detergent', 180, 'Laundry', 'surfexcel.jpg', 320),
(5002, 38, 'Vanish Detergent', 200, 'Laundry', 'vanish.jpg', 270),
(5003, 39, 'Comfort After Wash', 150, 'Laundry', 'comfortafterwash.jpg', 225),
(5004, 40, 'Ariel Liquid Detergent', 170, 'Laundry', 'ariel.jpg', 170),
(5005, 41, 'Surf Excel Liquid Detergent', 84, 'Laundry', 'surfexcelliquid.jpg', 295),
(5006, 42, 'Pegion Detergent', 94, 'Laundry', 'pigeon.jpg', 165),
(5007, 43, 'Rin Bleach', 80, 'Laundry', 'rinbleach.jpg', 60),
(5008, 44, 'Tide Detergent', 100, 'Laundry', 'tide.jpg', 220),
(5009, 45, 'Rin Detergent', 47, 'Laundry', 'rindetergent.jpg', 110),
(6001, 46, 'Harpic', 100, 'Toilet Cleaners', 'harpic.jpg', 79),
(6002, 47, 'Sanifresh', 150, 'Toilet Cleaners', 'sanifresh.jpg', 66),
(6003, 48, 'Harpic White and Shine', 47, 'Toilet Cleaners', 'harpicwhiteandshine.jpg', 76),
(6004, 49, 'Domex', 200, 'Toilet Cleaners', 'domex.jpg', 74),
(6005, 50, 'Harpic Bathroom Cleaner Lemon', 228, 'Toilet Cleaners', 'harpiclemon.jpg', 66),
(6006, 51, 'Lizol Citrus', 170, 'Toilet Cleaners', 'lizolcitrus.jpg', 69),
(6007, 52, 'Harpic Lemon', 290, 'Toilet Cleaners', 'harpiclemon.jpg', 97),
(6008, 53, 'Harpic Rose', 120, 'Toilet Cleaners', 'harpicrose.jpg', 63),
(6009, 54, 'Lizol Original', 126, 'Toilet Cleaners', 'lizol.jpg', 50),
(7001, 55, 'Parle-G', 284, 'Biscuits', 'parleg.jpg', 10),
(7002, 56, 'Dark Fantasy', 145, 'Biscuits', 'DarkFantasy.jpg', 30),
(7003, 57, 'Jim Jam', 140, 'Biscuits', 'jimjam.jpg', 20),
(7004, 58, 'Hide and Seek', 106, 'Biscuits', 'hideandseek.jpeg', 35),
(7005, 59, 'Cheeselings', 140, 'Biscuits', 'cheeslings.jpg', 20),
(7006, 60, 'Monaco', 200, 'Biscuits', 'monaco.jpg', 20),
(7007, 61, 'Marie Light', 180, 'Biscuits', 'marieLight.jpg', 45),
(7008, 62, 'Cheese Cracker', 150, 'Biscuits', 'cheesecracker.jpg', 10),
(7009, 63, 'Good Day', 400, 'Biscuits', 'goodday.jpg', 10),
(8001, 64, 'Lays Blue', 400, 'Chips', 'laysblue.jpg', 20),
(8002, 65, 'Lays Green', 350, 'Chips', 'laysgreen.jpg', 20),
(8003, 66, 'Lays Yellow', 200, 'Chips', 'laysyellow.jpg', 20),
(8004, 67, 'Lays Red', 400, 'Chips', 'laysred.jpg', 20),
(8005, 68, 'Uncle Chips Blue', 170, 'Chips', 'unclechipsblue.jpg', 20),
(8006, 69, 'Uncle Chips Green', 50, 'Chips', 'unclechipsgreen.jpg', 20),
(8007, 70, 'Kurkure Orange', 130, 'Chips', 'kurkureorange.jpg', 20),
(8008, 71, 'Kurkure Green', 10, 'Chips', 'kukuregreen.jpg', 20),
(8009, 72, 'Kurkure Yellow', 106, 'Chips', 'kurkureyellow.jpg', 20),
(9001, 73, 'Haldiram Bhujia', 98, 'Namkeen', 'haldirambhujia.jpg', 30),
(9002, 74, 'Haldiram Aloo Bhujia', 106, 'Namkeen', 'haldiramsaloobhujia.jpg', 35),
(9003, 75, 'Haldiram Punjabi Tadka', 106, 'Namkeen', 'haldirampunjabitadka.jpg', 30),
(9004, 76, 'Haldiram Nut Cracker', 106, 'Namkeen', 'haldiramnutcracker.jpg', 40),
(9005, 77, 'Haldiram Roasted Chana Cracker', 106, 'Namkeen', 'haldiramchanacracker.jpg', 40),
(9006, 78, 'Haldiram Khatta Meetha', 104, 'Namkeen', 'haldiramskhattameetha.jpg', 45),
(9007, 79, 'Haldiram Shahi Mixture', 106, 'Namkeen', 'haldiramsshahimixture.jpg', 50),
(9008, 80, 'Haldiram Panchrattan', 106, 'Namkeen', 'panchratanmixture.jpg', 30),
(9009, 81, 'Haldiram Madrasi Mixture', 106, 'Namkeen', 'madrasimixture.jpg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`) VALUES
(1000, 'yasver3474 ', 'yv12345!'),
(1001, 'swapnil ', 'swapnil1!'),
(1002, 'siddhant_1 ', 'siddhant123!'),
(1003, 'foodieshiva ', 'shiva123!'),
(1004, 'ashish_21 ', 'ashish12$'),
(1005, 'dppshi ', 'Bankeb@17'),
(1006, 'maehundon ', 'mridul99@'),
(1007, 'shrey11 ', 'shrey11!'),
(1008, 'aa12 ', 'aa12!'),
(1009, 'cutiehimanshu ', 'himanshu12!'),
(1010, 'shub12 ', 'Shub123@'),
(1011, 'ganniya ', 'ganniya123!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `item_id` int(10) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  `total_price` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `order_id` int(10) NOT NULL,
  `status_of_order` varchar(20) DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `date_of_delivery` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `email_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `address`, `phone_number`, `email_id`) VALUES
(1000, 'yasver3474', 'Yash', 'JIIT', '9873444783', 'yasver3474@gmail.com'),
(1001, 'swapnil', 'Swapnil Kusumwal', 'Sports Arena, Lucknow, Uttar Pradesh', '9898115610', 'swapnilkusumwal@gmail.com'),
(1002, 'siddhant_1', 'Siddhant Ranjan Sing', 'B-12, Police Society, Bulandsahar', '9654383826', 'siddhantranjan@gmail.com'),
(1003, 'foodieshiva', 'Shiva Kansal', '1751,Near Himalayan Refrigerator, Shivpuri, Hapur(245101), U.P., India, Earth', '8979344042', 'kansalshv@gmail.com'),
(1004, 'ashish_21', 'Ashish', 'Delhi Cantt, Headquartes, Cantt Area, New Delhi', '9812344510', 'ashish123@gmail.com'),
(1007, 'shrey11', 'Shrey', 'Defence Colony , New Delhi', '9898767612', 'shrey@gmail.com'),
(1008, 'aa12', 'aaa', 'JIIT', '1234567890', 'aaa@gmail.com'),
(1009, 'cutiehimanshu', 'Himanshu', 'Agra,Up', '7675457860', 'cutehimanshu@gmail.com'),
(1010, 'shub12', 'shubra', 'JIIT sector-62, noida', '8968009379', 'vermashubra@yahoo.com'),
(1011, 'ganniya', 'Ganesh Hegde', 'JIIT Sector 128', '9898564321', 'ganesh@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
