-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 04:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodtiger`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `Name`, `Email`, `Password`, `Position`) VALUES
(1, 'Foodtiger', 'admin@admin.com', '$2y$10$U4pkflE7x9vTSuZe7U6Inu.1/Aac4QGIbplbvyihNEHzGfFKrSj.m', 'Super Admin'),
(2, 'HandsomeC', 'yeong4470@gmail.com', '$2y$10$bLnd7aj3muaETBOKSFJ/kuRyn2X2I3bsyL74v.pjIIoaI0JKIZ9g.', 'Admin'),
(3, 'Deliver Man', '123@123gmail.com', '$2y$10$U4pkflE7x9vTSuZe7U6Inu.1/Aac4QGIbplbvyihNEHzGfFKrSj.m', 'Deliver Man'),
(9, 'JY Wong', 'yuan-0619@hotmail.com', '$2y$10$U4pkflE7x9vTSuZe7U6Inu.1/Aac4QGIbplbvyihNEHzGfFKrSj.m', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `contain` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Email` varchar(255) NOT NULL,
  `Author` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `contain`, `image`, `time_date`, `Email`, `Author`) VALUES
(1, 'Chinese Cuisine ', '    The most prominent regional cuisines in China are Anhui, Cantonese, Fujian, Hunan, Jiangsu, Shandong, Szechuan, and Zhejiang. Cantonese cuisine is famous all over the world for its distinctive style. Most dishes are steamed and stir-frying which makes it healthy and non-greasy.', 'A typical Chinese meal will have two things - a carbohydrate or starch like noodles, rice or buns, and accompanying stir fries or dishes of veggies, fish and meat. They use a lot of fresh vegetables like mushroom, water chestnuts, bamboo and even tofu', '../image/blog/chinese food.jpg', '2020-11-25 07:13:22', 'admin@admin.com', 'Foodtiger'),
(2, 'Western Cuisine ', '  European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term \"European\", or more specifically \"continental\" cuisine, is used to refer more strictly to the cuisine of the western parts of mainland Europe.', 'East Asians contrast Western cuisine with Asian styles of cooking, the way Westerners refer to the varied cuisines of East Asia as Asian cuisine.', '../image/blog/western food.jpg', '2020-11-25 05:19:55', 'admin@admin.com', 'Foodtiger'),
(3, 'Malay Cuisine ', '   Malay cuisine is the cooking tradition of ethnic Malays of Southeast Asia, residing in modern-day Malaysia, Indonesia (parts of Sumatra and Kalimantan), Singapore, Brunei, Southern Thailand and the Philippines (mostly southern) as well as in Cocos Islands, Sri Lanka and South Africa.', 'Mee goreng mamak. Mee goreng mamak, Apam balik. This is the ultimate Malaysian pancake, Nasi kerabu, Ayam percik (chicken with percik sauce), Nasi lemak, Roti john, Rendang (beef, chicken or lamb), Kuih.', '../image/blog/malay food.jpg', '2020-11-25 05:20:34', 'admin@admin.com', 'Foodtiger');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `name`, `description`, `image`) VALUES
(2, 'Chinese', 'Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Overseas Chinese who have settled in other parts of the world.', '../../image/category/chinese food.jpg'),
(3, 'Western', 'European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term ', '../../image/category/western food.jpg'),
(4, 'Indian', 'Indian cuisine consists of a variety of regional and traditional cuisines native to the Indian subcontinent. Given the diversity in soil, climate, culture, ethnic groups, and occupations,', '../../image/category/indian food.jpg'),
(5, 'Korean', 'Korean cuisine is largely based on rice, vegetables, and (at least in the South) meats. Traditional Korean meals are named for the number of side dishes that accompany steam-cooked short-grain rice. Kimchi is served at nearly every meal.', '../../image/category/Korean food.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `to_user` varchar(255) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `to_user`, `from_user`, `message`, `time_date`, `status`) VALUES
(1, 'yeong4470@gmail.com', 'admin', 'hi', '2020-11-25 07:59:47', 3),
(2, 'admin', 'rjgaming0619@gmail.com', 'hi', '2020-11-25 08:36:38', 1),
(3, 'yeong4470@gmail.com', 'admin', 'hi', '2020-11-25 08:01:17', 3),
(4, 'yeong4470@gmail.com', 'admin', 'hi', '2020-11-25 08:06:44', 3),
(5, 'yeong4470@gmail.com', 'admin', 'hi', '2020-11-25 08:06:44', 3),
(6, 'yeong4470@gmail.com', 'admin', 'hi', '2020-11-26 03:19:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `Name`, `Email`, `PhoneNo`, `Address`, `Password`) VALUES
(1, 'HandsomeC', 'yeong4470@gmail.com', '0147464470', '27,jalan indah', '$2y$10$gevtf749FJBJMhkydZPDOuLdjxLF1O5xiNF6R9uQga7lWRR13Fyq.'),
(2, 'qefewf', 'grwg@rfver.com', '0147464470', '27edweewfef', '$2y$10$Nzh2jASFeCUJobmfYgweX.kaa1jneALLvHX6AVSeWwSWipmH1H3im'),
(3, 'egewge', 'admin@admin.com', '014-7464470', '27edwe', '$2y$10$s94xO95WlK6wBRDEjwSmduF0JzXtBEBtmsYydMt8GNvLvdONgWnfS'),
(4, 'Jiahuitey', 'jiahuitey852003@hotmail.com', '01110858782', 'No53,Jalan Indah12/12,Taman Bukit Indah,81200 JB', '$2y$10$3joXWrQdw2LPSgCbUv0YzOPWOQaRPuFENZaf4eMkf5klv1vS3N6lu'),
(54, 'qwertylim', 'lkyj222@gmail.ocm', '01111481639j', '11,lembing123', '$2y$10$KPXXqip8m.WMk8D3ohOcouq16ktcPe8M0P4oITbErHK.Tr5tpYj7G'),
(57, 'Yeong Chee Chiew', 'admin@adrrrmin.com', '0147464470', '27edwe', '$2y$10$HnQCh1ypjh5qFM322Y..BubRjByDsp0EK1YVVfHRSrX.wcP8BixGe'),
(58, 'JYuan', 'rjgaming0619@gmail.com', '01201029311', 'Jalanah h1h213', '$2y$10$ib/FhbmQ4iFYOjSk7JSXOuyc1M.3amS8myrVKXZL.GVRam9v79qa6'),
(59, 'Wong Jun', 'yuan-0619@hotmail.com', '01201029312', 'Jalanah h1h213', '$2y$10$Dm1irp1kJjfZ.N/uyWcq8.ox60iqiZKfgB5WhJ8ZKzy1x30RRlcV6'),
(60, 'Wong Jun Yuan', 'pigpig6070@gmail.com', '012010293121', 'Jalanah h1h213', '$2y$10$gfIT6dZm7HyID6HZOP3Nr.NZNqe7o35w5x4HscanovayjDTHXM4pO');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

CREATE TABLE `cus_order` (
  `custorder_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`custorder_id`, `order_id`, `email`, `status`, `msg`, `time_date`) VALUES
(3, '5fbdf51689eb2', 'rjgaming0619@gmail.com', 'done', 'This is for you!!', '2020-11-25 06:09:42'),
(4, '5fbe25b30dcfe', 'rjgaming0619@gmail.com', 'done', '-', '2020-11-25 09:48:22'),
(5, '5fbf0fb3ef7ef', 'rjgaming0619@gmail.com', 'done', '-', '2020-11-26 02:20:23'),
(6, '5fbf11dc47c5f', 'rjgaming0619@gmail.com', 'done', 'aaa', '2020-11-26 02:24:33'),
(8, '5fc06428e9512', 'rjgaming0619@gmail.com', 'done', '-', '2020-11-27 02:30:12'),
(10, '5fc0658e0ba40', '', 'have not', '-', '2020-11-27 02:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Email`, `Name`, `phone`, `feedback`, `suggestions`) VALUES
(1, 'rjgaming0619@gmail.com', 'JYuan', '01201029311', 'excellent', 'This is so nice');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `f_id` int(11) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `nameFood` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageFood` varchar(500) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `cart_id`, `nameFood`, `description`, `imageFood`, `price`) VALUES
(5, 2, 'Char kway teowv', 'Char kway teow  is a popular noodle dish from Maritime Southeast Asia, notably in Indonesia, Malaysia, Singapore, and Brunei. In Hokkien, Char means â€œstir-friedâ€ and kway teow refers to flat rice noodles. The dish is considered a national favourite in', '../../image/food/char kway teow.jpg', 20),
(6, 2, 'Bak kut teh', 'Bak kut teh is a pork rib dish cooked in broth popularly served in Malaysia and Singapore where there is a predominant Hoklo and Teochew community, and also in neighbouring areas like Indonesia in Riau Islands and Southern Thailand.', '../../image/food/Bak Kut Teh.jpg', 8),
(8, 3, 'Pizza', 'Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients', '../../image/food/pizza.jpg', 12),
(9, 3, 'Burger', 'Burger is a sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. The patty may be pan fried, grilled, smoked or flame broiled. ... A hamburger topped with cheese is called a cheeseburger', '../../image/food/burger.jpg', 8),
(10, 3, 'Beef', 'Beef, flesh of mature cattle, as distinguished from veal, the flesh of calves. The best beef is obtained from early maturing, special beef breeds. High-quality beef has firm, velvety, fine-grained lean, bright red in colour and well-marbled. The fat is sm', '../../image/food/beef.jpg', 15),
(11, 4, 'Roti Canai', 'Roti canai is made from dough which is usually composed of fat (usually ghee), flour and water; some recipes also include sweetened condensed milk. The dough is repeatedly kneaded, flattened, oiled, and folded before proofing, creating layers.', '../../image/food/roti canai.jpeg', 3),
(12, 4, 'Dosa', 'A dosa is a rice pancake, originating from South India, made from a fermented batter. It is somewhat similar to a crepe in appearance. Its main ingredients are rice and black gram, ground together in a fine, smooth batter with a dash of salt.', '../../image/food/tosei.jpg', 2),
(14, 4, 'Maggi goreng', 'Maggi goreng is a style of cooking instant noodles, in particular the Maggi product range, which is common in Malaysia. It is commonly served at Indian Muslim (or Mamak) food stalls in Malaysia and Singapore.', '../../image/food/maggi goreng.jpg', 6),
(17, 5, 'Kimchi', 'Kimchi is Korean terminology for fermented vegetables, and encompasses salt and seasoned vegetables. Kimchi is a traditional Korean dish consisting of pickled vegetables, which is mainly served as a side dish with every meal, but also can be served as a m', '../../image/food/Kimchi.jpg', 8),
(18, 5, 'Bibimbap ', 'Bibimbap sometimes romanized as bi bim bap or bi bim bop, is a Korean rice dish. The term  sometimes romanized as bi bim bap or bi bim bop, is a Korean rice dish.', '../../image/food/bibimbap.jpg', 10),
(19, 5, 'Japchae', 'Japchae is a sweet and savory dish of stir-fried glass noodles and vegetables that is popular in Korean cuisine.Japchae is typically prepared with dangmyeon (ë‹¹ë©´, å”éºµ), a type of cellophane noodles made from sweet potato starch; the noodles are topp', '../../image/food/Japchae.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `cust_id` varchar(255) NOT NULL,
  `order_id` int(30) NOT NULL,
  `foodname` varchar(255) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`cust_id`, `order_id`, `foodname`, `price`, `quantity`, `email`, `date_time`) VALUES
('5fbdf51689eb2', 4, ' Pizza ', 12, 1, ' rjgaming0619@gmail.com ', '2020-11-25 06:09:34'),
('5fbe25b30dcfe', 5, ' Pizza ', 12, 1, ' rjgaming0619@gmail.com ', '2020-11-25 09:37:00'),
('5fbf0fb3ef7ef', 6, ' Pizza ', 12, 1, '  ', '2020-11-26 02:15:29'),
('5fbf11dc47c5f', 7, ' Bak kut teh ', 8, 1, ' rjgaming0619@gmail.com ', '2020-11-26 02:24:30'),
('5fc06428e9512', 10, ' Pizza ', 12, 1, '  ', '2020-11-27 02:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_way` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `receive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `email`, `Name`, `PhoneNo`, `Address`, `price`, `time_date`, `payment_way`, `status`, `receive`) VALUES
(1, '5fbdf51689eb2', 'rjgaming0619@gmail.com', 'JYuan', '01201029311', 'Jalanah h1h213', 13, '2020-11-25 06:09:34', 'cash', 'paid', 'yes'),
(2, '5fbe25b30dcfe', 'rjgaming0619@gmail.com', 'JYuan', '01201029311', 'Jalanah h1h213', 13, '2020-11-25 09:37:00', 'cash', 'paid', 'yes'),
(3, '5fbf0fb3ef7ef', 'rjgaming0619@gmail.com', 'JYuan', '01201029311', 'Jalanah h1h213', 13, '2020-11-26 02:15:29', 'cash', 'unpaid', 'no'),
(4, '5fbf11dc47c5f', 'rjgaming0619@gmail.com', 'JYuan', '01201029311', 'Jalanah h1h213', 9, '2020-11-26 02:24:30', 'cash', 'unpaid', 'no'),
(5, '5fc06428e9512', 'rjgaming0619@gmail.com', 'JYuan', '01201029311', 'Jalanah h1h213', 13, '2020-11-27 02:30:11', 'paypal', 'paid', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`id`, `payment_id`, `payer_id`, `amount`, `currency`, `payment_status`) VALUES
(1, '5fbded3c2ab40', 'R3CX3DM53UCXW', 13.20, 'MYR', 'approved'),
(2, '5fbdee88754ef', 'R3CX3DM53UCXW', 22.00, 'MYR', 'approved'),
(3, '5fbdef219068c', 'R3CX3DM53UCXW', 22.00, 'MYR', 'approved'),
(4, '5fc06428e9512', 'R3CX3DM53UCXW', 13.20, 'MYR', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `requestjob`
--

CREATE TABLE `requestjob` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `years` varchar(255) NOT NULL,
  `language` varchar(50) NOT NULL,
  `citizen` varchar(15) NOT NULL,
  `validDriverLicense` varchar(50) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestjob`
--

INSERT INTO `requestjob` (`id`, `firstName`, `lastName`, `PhoneNo`, `Email`, `years`, `language`, `citizen`, `validDriverLicense`, `vehicle`, `City`, `status`, `time_date`) VALUES
(1, 'JY', 'Wong', '012010293 ', 'yuan-0619@hotmail.com', 'above', ' Malay', 'Yes', 'Valid', 'Motorcycle', 'Johor Bahru', 'approve', '2020-11-25 07:35:07'),
(4, 'JY', 'Wong', '012010293 ', 'yuan-0619@hotmail.com1123', 'Yes', ' Malay', 'Yes', 'Valid', 'Car', 'Sarawak (Kuching,Sibu,Bintulu)', 'have not approve', '2020-11-26 06:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `returnorder`
--

CREATE TABLE `returnorder` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(500) CHARACTER SET utf8 NOT NULL,
  `statusreturn` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnorder`
--

INSERT INTO `returnorder` (`id`, `order_id`, `name`, `reason`, `image`, `statusreturn`, `date`) VALUES
(1, '5fbdf51689eb2', 'JYuan', 'Food is destroyed!!!', '../image/return/chinese food.jpg', 'Approve', '2020-11-25 07:48:47'),
(2, '5fbe25b30dcfe', 'JYuan', 'aaa', '../image/return/indian food.jpg', 'Pending', '2020-11-26 03:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `comment_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `comment` varchar(200) CHARACTER SET utf8 NOT NULL,
  `comment_sender_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`comment_id`, `food_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 8, 'hi', 'JYuan', '2020-11-25 09:02:01'),
(2, 8, 'hi', 'JYuan', '2020-11-25 09:04:05'),
(3, 8, 'o', 'JYuan', '2020-11-25 09:05:20'),
(4, 8, 'aaa', 'JYuan', '2020-11-25 09:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `stripe`
--

CREATE TABLE `stripe` (
  `id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD PRIMARY KEY (`custorder_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `username` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestjob`
--
ALTER TABLE `requestjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returnorder`
--
ALTER TABLE `returnorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `stripe`
--
ALTER TABLE `stripe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `custorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requestjob`
--
ALTER TABLE `requestjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `returnorder`
--
ALTER TABLE `returnorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stripe`
--
ALTER TABLE `stripe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
