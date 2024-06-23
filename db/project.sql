-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 06:42 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin67@gmail.com', 'Admin#123', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`, `price`) VALUES
(103, 1, 1, 1, 15000),
(104, 18, 1, 2, 6400),
(105, 6, 9, 1, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `categoryName`, `categoryImage`) VALUES
(1, 'Toys', 'o.jpg'),
(2, 'Soft Toys', 'g.jpg'),
(3, 'New Born', 'nb.jpg'),
(5, 'Kids Clothing', 'baby.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user`, `email`, `message`) VALUES
(1, 'Ashani', 'mmanm2018@gmail.com', 'How much days will it take to deliver my order?'),
(7, 'Dewmi', 'Dew12@gmail.com', 'Delivery cost?');

-- --------------------------------------------------------

--
-- Table structure for table `deliver`
--

CREATE TABLE `deliver` (
  `No` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Invoice_no` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliver`
--

INSERT INTO `deliver` (`No`, `Date`, `Invoice_no`, `amount`) VALUES
(1, '2023-08-26 23:44:04', 118040675, 2200);

-- --------------------------------------------------------

--
-- Table structure for table `display`
--

CREATE TABLE `display` (
  `item_no` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `code` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `priceQ` double(20,2) NOT NULL,
  `AMOUNT` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `local_customer`
--

CREATE TABLE `local_customer` (
  `Customer_id` int(11) NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `local_customer`
--

INSERT INTO `local_customer` (`Customer_id`, `Customer_Name`, `Address`, `Telephone`) VALUES
(1, 'Ashani', 'Bogamuwa Boyagane', 72323548),
(2, 'isuru', 'Maraluwawa', 77765654),
(3, 'Kethmini', 'Malkaduwawa', 77765165),
(4, 'Isuru', 'Maaraluwawa', 78651665),
(5, 'Kaweesha', 'Ibbagamuwa', 7265465);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `postal` int(11) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `item_types` int(11) NOT NULL,
  `total_items` int(11) NOT NULL,
  `invoice_num` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address`, `postal`, `mobile`, `amount`, `item_types`, `total_items`, `invoice_num`, `date`, `status`, `type`) VALUES
(1, 7, 'Ihalagame,Galgamuwa', 600700, '778856324', 49200, 2, 4, 114744822, '2023-08-27 15:16:11', 'Pending', 0),
(2, 8, 'Wahara,Kurunegala', 60000, '782525655', 15000, 1, 1, 8395455, '2023-08-27 15:17:49', 'Complete', 0),
(3, 1, 'Bogamuwa,Boyagane', 60027, '711234566', 5400, 1, 2, 1782817834, '2023-08-28 06:35:10', 'Complete', 0),
(4, 2, 'Alawatugoda,Kandy', 20000, '718573689', 13800, 2, 3, 437849149, '2023-08-27 15:20:51', 'Complete', 0),
(5, 9, 'Malabe,Colombo', 700, '761212455', 4800, 1, 3, 372931702, '2023-08-27 15:22:16', 'Pending', 0),
(6, 0, 'none', 0, '_', 22800, 2, 5, 8704, '2023-08-27 15:41:13', 'Complete', 1),
(7, 0, 'none', 0, '_', 90000, 1, 6, 5917, '2023-08-27 15:45:29', 'Complete', 1),
(8, 9, 'Malabe,Colombo', 700, '761212455', 7100, 2, 3, 6405009, '2023-10-24 13:55:29', 'Complete', 0),
(9, 1, 'Bogamuwa', 60027, '711234566', 51000, 2, 5, 849118015, '2023-08-28 04:12:47', 'Pending', 0),
(10, 1, 'Bogamuwa', 60027, '711234566', 6400, 1, 2, 687332115, '2023-10-24 13:54:22', 'Complete', 0),
(11, 1, 'Bogamuwa', 60027, '711234566', 2700, 1, 1, 1925811564, '2023-08-28 06:34:26', 'Pending', 0),
(12, 1, 'Bogamuwa,Boyagane', 60027, '711234566', 7600, 1, 2, 143800264, '2023-08-30 08:07:56', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `user_name` varchar(100) NOT NULL,
  `psw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`user_name`, `psw`) VALUES
('admin', 123);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `invoice` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `user`, `invoice`, `sub_total`, `grand_total`) VALUES
(16, 8, 'Shalani', 8395455, 15000, 15400),
(17, 2, 'Ishan', 437849149, 13800, 14200),
(18, 0, 'Local', 8704, 22800, 22800),
(19, 0, 'Local', 5917, 90000, 90000),
(20, 1, 'Ashani', 1782817834, 5400, 5800),
(21, 1, 'Ashani', 687332115, 6400, 6800),
(22, 9, 'Vishwa', 6405009, 7100, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `quantitysold`
--

CREATE TABLE `quantitysold` (
  `user_id` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quantitysold`
--

INSERT INTO `quantitysold` (`user_id`, `invoice`, `product_id`, `qty`) VALUES
(1, 1228242527, 3, 4),
(1, 1228242527, 4, 1),
(1, 1276695338, 13, 6),
(1, 1276695338, 14, 2),
(2, 1468325564, 3, 2),
(2, 1468325564, 8, 1),
(1, 1052298023, 4, 3),
(1, 1745041800, 2, 1),
(1, 1745041800, 15, 5),
(1, 1745041800, 5, 2),
(2, 165912798, 6, 1),
(2, 165912798, 11, 2),
(2, 1771181822, 5, 3),
(2, 963308211, 5, 1),
(1, 897217670, 1, 5),
(1, 163478670, 9, 5),
(1, 1409729759, 6, 1),
(1, 1409729759, 8, 3),
(1, 338676458, 7, 1),
(1, 338676458, 17, 2),
(1, 1600035931, 15, 5),
(1, 1726899426, 15, 2),
(1, 1993716168, 18, 35),
(2, 826571127, 8, 2),
(2, 2119205002, 19, 7),
(2, 1693093183, 15, 3),
(1, 1879927412, 8, 2),
(9, 111705011, 20, 1),
(9, 111705011, 7, 3),
(7, 1529289243, 17, 8),
(8, 1570117387, 6, 1),
(1, 1392476449, 6, 9),
(1, 1392476449, 1, 1),
(2, 1694303804, 2, 3),
(1, 1620868815, 2, 1),
(1, 1746313348, 1, 2),
(1, 923640494, 19, 3),
(1, 1762385882, 19, 3),
(1, 1697439196, 19, 3),
(1, 1006503155, 19, 3),
(1, 931767931, 19, 3),
(1, 1243715134, 19, 3),
(1, 1315708296, 19, 3),
(2, 1798400338, 19, 5),
(2, 1178247337, 19, 5),
(2, 1007918075, 19, 5),
(2, 1498306542, 19, 5),
(2, 1291417143, 19, 5),
(2, 516604019, 7, 2),
(2, 983149039, 7, 2),
(2, 1070013164, 2, 1),
(2, 342011443, 2, 1),
(2, 1445458965, 2, 3),
(2, 1720624249, 2, 3),
(2, 1645726914, 15, 2),
(2, 2128485578, 11, 6),
(1, 1019292423, 18, 3),
(10, 1235758734, 20, 3),
(0, 1553, 7, 5),
(1, 1812731766, 2, 1),
(1, 1812731766, 18, 2),
(0, 3669, 16, 3),
(0, 5555, 4, 2),
(7, 1180406755, 7, 2),
(0, 1777, 14, 2),
(0, 1777, 12, 3),
(0, 3325, 14, 2),
(0, 8987, 4, 2),
(0, 8987, 7, 5),
(7, 1778803629, 2, 1),
(7, 114744822, 1, 3),
(7, 114744822, 10, 1),
(8, 8395455, 1, 1),
(1, 1782817834, 17, 2),
(2, 437849149, 5, 1),
(2, 437849149, 20, 2),
(9, 372931702, 12, 3),
(0, 8704, 14, 2),
(0, 8704, 20, 3),
(0, 5917, 1, 6),
(9, 6405009, 14, 1),
(9, 6405009, 12, 2),
(1, 2027770579, 4, 2),
(1, 2027770579, 1, 3),
(1, 849118015, 4, 2),
(1, 849118015, 1, 3),
(1, 1591113381, 18, 2),
(1, 687332115, 18, 2),
(1, 1925811564, 17, 1),
(1, 143800264, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `user_name`, `user_image`, `feedback`, `stars`) VALUES
(1, 1, 'Ashani', 'ashani.jpeg', 'Excellent Service                    ', 4),
(2, 2, 'Ishan', 'ishan.jpeg', ' Loved online shopping in Kids planet!                    ', 5),
(3, 7, 'Dewmi', 'dew.jpeg', 'Very helpful                    ', 3),
(4, 8, 'Shalani', 'shalani.jpeg', 'Thank you for online shopping service                    ', 4),
(5, 9, 'Vishwa', 'vishwa.jpeg', 'I highly recommend KidsPlanet                     ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `select_orders`
--

CREATE TABLE `select_orders` (
  `DATE` date NOT NULL DEFAULT current_timestamp(),
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Items` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE `toys` (
  `id` int(11) NOT NULL,
  `photo` varchar(400) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `addedStock` int(11) NOT NULL,
  `remainingStock` int(11) NOT NULL,
  `stock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `photo`, `name`, `category`, `description`, `price`, `addedStock`, `remainingStock`, `stock`) VALUES
(1, 'car2.PNG', 'Car', 'Toys', '   A model car, or toy car, is a miniature representation of an automobile.                                                             ', 15000, 30, 6, 'Yes'),
(2, 'bike.PNG', 'Bike', 'Toys', '    A wheeled vehicle that has two wheels and is moved by foot pedals.                                                             ', 2000, 15, 0, 'No'),
(3, 'jeep.jpg', 'Jeep', 'Toys', '     A jeep is a rugged car made for driving in difficult conditions.                                                                                                    ', 3000, 6, 0, 'No'),
(4, 'download.jpg', 'Truck', 'Toys', '    A wheeled vehicle for moving heavy articles.                                                                                ', 3000, 40, 28, 'Yes'),
(5, 'set.jpg', 'Baby Set', 'New Born', '   Pink Keepsake Box with Baby Clothes, Teddy Bear and Newborn Essentials                                                            ', 3800, 25, 16, 'Yes'),
(6, 'teddy.jpg', 'Teddy', 'Soft Toys', '   A teddy bear is a childrens toy made from soft or furry material.                                                            ', 2000, 20, 8, 'Yes'),
(7, 'flower.png', 'Flower', 'Soft Toys', '  A smaller decorative pot with  flowers.                                        ', 1100, 40, 20, 'Yes'),
(8, 'n.jpg', 'Rabit', 'Soft Toys', '  Soft toys that are made of cloth filled with a soft material.                                        ', 1600, 30, 22, 'Yes'),
(9, 'bike.PNG', 'Bicycle', 'Toys', '    All-in-one baby tricycle for toddlers aged 10 months+                                                                                 ', 5800, 5, 0, 'No'),
(10, 'walker.jpg', 'Walker', 'New Born', '  Children walker multifunctional easy installation folding side portable baby walker CC420                                        ', 4200, 20, 19, 'Yes'),
(11, 'bbb.PNG', 'Building blocks', 'Toys', '  These are the the best educational toys for toddlers and preschoolers                                         ', 1600, 33, 25, 'Yes'),
(12, 'plush.PNG', 'Plush soft toy', 'Soft Toys', '  Soft Toy, made with soft wool grade fabric, soft and comfortable.                                        ', 1600, 22, 14, 'Yes'),
(13, 'bouncer.jpg', 'Bouncer', 'New Born', '   Bouncy seat for soothing & entertaining Switch on calming vibrations                                                            ', 9800, 16, 10, 'Yes'),
(14, 'sleep.png', 'Sleeping Bag', 'New Born', '    Kids Joy Snoozie Sleeping Bag                                                            ', 3900, 20, 11, 'Yes'),
(15, 'elephant.jpg', 'Elephant', 'Soft Toys', '          Soft and cuddly elephant to soothe little one with 2 gentle songs 20 melodies                                           ', 2900, 18, 1, 'Yes'),
(16, 'nappy.png', 'Nappies', 'New Born', 'Cloth nappies are made with the finest cotton fibers making them ultra soft absorbent and durable. ', 1900, 60, 57, 'Yes'),
(17, 'romper.jpeg', 'Romper', 'Kids Clothing', ' New autumn and winter baby bodysuit for Boys and Girls                     ', 2700, 50, 37, 'Yes'),
(18, 'dress.jpeg', 'Mini dress', 'Kids Clothing', '    Custom Logo Summer Puff sleeve dress Flower girl cotton dress for age 1 to4 years                                                                                ', 3200, 50, 6, 'Yes'),
(19, 'suit.jpeg', 'BodySuit', 'Kids Clothing', '    Factory Custom Print Baby Bamboo Onesie Baby Clothes Short Sleeve Baby Bamboo Bodysuit                                                                                ', 2600, 53, 0, 'No'),
(20, '3.jpeg', 'Suit set', 'Kids Clothing', ' Boys clothes. Summer new style suit shirt short sleeved suit  set                    ', 5000, 14, 5, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_image` varchar(400) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `email`, `mobile`, `city`, `user_image`, `gender`) VALUES
(1, 'Ashani', 'Ashani#123', 'mmanm2018@gmail.com', 711234566, 'Kurunegala', 'ashani.jpeg', 'Female'),
(2, 'Ishan', 'Ishu#123', 'dissa@gmail.com', 718573689, 'Kandy', 'ishan.jpeg', 'Male'),
(7, 'Dewmi', 'Dewmi#123', 'Dew12@gmail.com', 778856324, 'Galgamuwa', 'dew.jpeg', 'Female'),
(8, 'Shalani', 'Shala#123', 'Shala33@gmail.com', 782525655, 'Kurunegala', 'shalani.jpeg', 'Female'),
(9, 'Vishwa', 'Vish#123', 'Vish88@gmail.com', 761212455, 'Colombo', 'vishwa.jpeg', 'Female'),
(11, 'thushani', 'Thushani#123', 'thush123@gmail.com', 713361655, 'Kurunegala', 'ash.png', 'Female'),
(12, 'gayani', 'Gayani#123', 'gayani_123@gmail.com', 727361655, 'Kurunegala', 'ash.png', 'Female'),
(13, 'fgvt', 'Ashani#12', 'asdf@gmail.com', 727361655, 'Kurunegala', 'ash2.png', 'Female'),
(14, 'binara', 'Binara#12', 'bina.as@gmail.com', 775026694, 'kandy', 'ash.png', 'Male'),
(15, 'Saween', 'Sawee#123', 'Sawee123@gmail.com', 727361655, 'Kurunegala', 'car.jpg', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver`
--
ALTER TABLE `deliver`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `local_customer`
--
ALTER TABLE `local_customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliver`
--
ALTER TABLE `deliver`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `display`
--
ALTER TABLE `display`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `local_customer`
--
ALTER TABLE `local_customer`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
