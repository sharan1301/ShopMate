-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 04:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `best_seller`
--

CREATE TABLE `best_seller` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_times` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `best_seller`
--

INSERT INTO `best_seller` (`id`, `product_id`, `order_times`) VALUES
(104, 29, 2),
(105, 33, 1),
(106, 27, 3),
(107, 28, 2),
(108, 15, 1),
(109, 21, 1),
(110, 34, 1),
(111, 16, 1),
(112, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(8, 'Mobiles', 1),
(9, 'Men\'s Fashion', 1),
(13, 'Bags', 1),
(14, 'Footwear', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `block_no` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `order_status` int(30) NOT NULL,
  `txn_id` varchar(400) NOT NULL,
  `pay_id` varchar(400) NOT NULL,
  `added_on` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `block_no`, `city`, `state`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `txn_id`, `pay_id`, `added_on`) VALUES
(63, 26, 'Car Street', '12', 'Erode', 'TN', 638316, 'razorpay', 4578, 'success', 1, 'Ekr5NfmljugAM3SJydKR', 'a5c58287a7732f2cc9931deaadc54599', 'July 04,2022 02:37:25 pm'),
(64, 26, 'Car Street', '12', 'Erode', 'TN', 638316, 'razorpay', 3052, 'success', 1, 'vVkGiU03o6tNxh2rgqYQ', '73267dcb23522eebdfb2cf5e41ba7e6e', 'July 04,2022 03:13:03 pm'),
(65, 26, 'Car Street', '12', 'Erode', 'TN', 638316, 'razorpay', 4140.91, 'success', 1, 'cA9gfvIQO7yhbXnYUt15', '2cf25958f32d2c9eb6dcd39720f1edcb', 'July 04,2022 03:49:43 pm'),
(66, 26, 'cawfegr', '12', 'qewre', 'tn', 789255, 'razorpay', 87200, 'success', 1, 'TyGvpzSx6hVicNtHom9q', '6bc048e01f068498a050215db4801db3', 'July 06,2022 03:40:08 pm'),
(67, 39, '29 nambi eda st', '29', 'nagercoil', 'tamilnadu', 629001, 'razorpay', 3815, 'success', 1, 'O8sFnElzvIYMNfRimrWo', '675a7372ac9b6b779f03332f43916648', 'July 07,2022 11:06:20 pm');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `added_on` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`, `added_on`) VALUES
(59, 55, 29, 2, 1500, 'July 04,2022 01:49:47 am'),
(60, 56, 33, 1, 4000, 'July 04,2022 01:51:51 am'),
(61, 57, 27, 1, 4700, 'July 04,2022 03:05:50 am'),
(62, 58, 27, 1, 4700, 'July 04,2022 03:06:32 am'),
(63, 59, 27, 1, 4700, 'July 04,2022 03:10:13 am'),
(64, 60, 28, 1, 4200, 'July 04,2022 12:26:28 pm'),
(65, 61, 15, 1, 55000, 'July 04,2022 12:32:40 pm'),
(66, 62, 29, 1, 1500, 'July 04,2022 12:34:43 pm'),
(67, 63, 28, 1, 4200, 'July 04,2022 02:37:25 pm'),
(68, 64, 21, 2, 1400, 'July 04,2022 03:13:03 pm'),
(69, 65, 34, 1, 3799, 'July 04,2022 03:49:43 pm'),
(70, 66, 16, 1, 80000, 'July 06,2022 03:40:08 pm'),
(71, 67, 32, 1, 3500, 'July 07,2022 11:06:20 pm');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(15, 8, 'One Plus 8Pro', 60000, 55000, 20, '627823424_Arcticsky_9.png', 'OnePlus 8 Pro Mobile (Glacial Green 8GB RAM+128GB Storage)', 'The OnePlus 8 Pro is an IP68 rated phone that is resistant to dust and water. It comes with an impressive 6.78-inch AMOLED panel that has a resolution of 1440x3168 pixels with high color accuracy and HDR10+ support. Also, it can run at 120Hz at the QHD+ resolution. The display of the phone is vibrant, colorful, and bright. \r\n\r\n \r\n\r\nThe smartphone runs OxygenOS 10, based on Android 10, and is powered by Qualcomm Snapdragon 865 processor, coupled with 8GB/12GB LPDDR5 RAM. Talking about the internal storage of the phone, OnePlus 8 Pro has 128GB and 256GB of UFS 3.0 storage versions. \r\n\r\n \r\n\r\nTo shoot amazing photos and videos, there is a quad rear camera setup that consists of a 48 MP primary camera, an 8 MP secondary camera with a telephoto lens, a 48 MP camera with a wide-angle lens, and a 5 MP ‘Color Filter’ camera sensor. Also, it features a 16 MP camera at the front that lets you capture amazing selfies.\r\n\r\n \r\n\r\nThe OnePlus 8 Pro is powered with a non-removable 4,510mAh battery that supports Warp Charge 30T (5V/ 6A) and Warp Charge 30 Wireless technologies. There is also reverse wireless charging support.', 'OnePlus 8 Pro', 'OnePlus 8 Pro', 'OnePlus 8 Pro', 1),
(16, 8, 'Samsung Galaxy S22 Ultra', 90000, 80000, 20, '206469925_unnamed.png', 'Samsung Galaxy S22 5G Mobile(Phantom White, 8GB, 128GB Storage)', 'The Samsung Galaxy S22 specs are top-notch including a Snapdragon 8 Gen 1 chipset, 8GB RAM coupled with 128/256GB storage, and a 3700mAh battery with 25W charging speed. The phone sports a 6.1-inch Dynamic AMOLED display with an adaptive 120Hz refresh rate. In the camera department there is a Triple-sensor setup is present.', 'Samsung Galaxy S22', 'Samsung Galaxy S22', 'Samsung Galaxy S22', 1),
(19, 13, 'Skybags 15Litres', 1000, 900, 15, '186052881_b1.jpeg', 'Skybags makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Skybags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.', 'Skybags makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Skybags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.Skybags’ school backpacks not only rank high on looks but also offer various features which make them irresistible. The well-thought designs make sure school children are comfortable when they carry these backpacks with them to school. From small backpacks to big ones, there is a size that’s right for each and every child. Skybags makes online shopping hassle-free and fun with the varied options available. Whether it is high school bags for girls or stylish school bags for boys, there are umpteen number of options available online at your disposal. With spacious compartments, pockets for holding different things, fabric water bottle holders, long-lasting cushioned shoulder straps, stationary pouches, secret pockets and stylish designs, there is something for everyone at Skybags.', 'Sky Bags', 'Backpacks', 'Backpacks,Sky Bags', 1),
(20, 13, 'American Tourister 15Litres', 1500, 1000, 15, '505727212_download.jfif', 'American Tourister makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Our Bags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.', 'American Tourister makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Our Bags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.American Tourister school backpacks not only rank high on looks but also offer various features which make them irresistible. The well-thought designs make sure school children are comfortable when they carry these backpacks with them to school. From small backpacks to big ones, there is a size that’s right for each and every child. American Touristermakes online shopping hassle-free and fun with the varied options available. Whether it is high school bags for girls or stylish school bags for boys, there are umpteen number of options available online at your disposal. With spacious compartments, pockets for holding different things, fabric water bottle holders, long-lasting cushioned shoulder straps, stationary pouches, secret pockets and stylish designs, there is something for everyone at American Tourister.', 'American Tourister', 'Backpacks', 'Backpacks,American Tourister', 1),
(21, 13, 'AdVenture Bags', 1500, 1400, 15, '789513936_b4.jpeg', 'Skybags makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Skybags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.', 'Skybags makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Skybags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.Skybags’ school backpacks not only rank high on looks but also offer various features which make them irresistible. The well-thought designs make sure school children are comfortable when they carry these backpacks with them to school. From small backpacks to big ones, there is a size that’s right for each and every child. Skybags makes online shopping hassle-free and fun with the varied options available. Whether it is high school bags for girls or stylish school bags for boys, there are umpteen number of options available online at your disposal. With spacious compartments, pockets for holding different things, fabric water bottle holders, long-lasting cushioned shoulder straps, stationary pouches, secret pockets and stylish designs, there is something for everyone at Skybags.', 'AdVenture', 'Backpack', 'AdVenture,Backpack', 1),
(22, 13, 'StrapIt Bags 15Litres', 1500, 1200, 15, '772985098_b2.jpeg', 'American Tourister makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Skybags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.', 'American Tourister makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Our Bags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.American Tourister school backpacks not only rank high on looks but also offer various features which make them irresistible. The well-thought designs make sure school children are comfortable when they carry these backpacks with them to school. From small backpacks to big ones, there is a size that’s right for each and every child. American Touristermakes online shopping hassle-free and fun with the varied options available. Whether it is high school bags for girls or stylish school bags for boys, there are umpteen number of options available online at your disposal. With spacious compartments, pockets for holding different things, fabric water bottle holders, long-lasting cushioned shoulder straps, stationary pouches, secret pockets and stylish designs, there is something for everyone at American Tourister.American Tourister makes buying school bags fun. An important purchase, school bags will always hold a special place in our hearts. This is the phase in your life which is never coming back. This is when you make the best of friends and your school backpacks will always carry lots of memories other than your books and stationary. When you set out to buy school bags online, there are plenty of choices available. However, Skybags ensures you get stylish and functional school bags for boys online as well as school bags for girls online. With a variety of fun colours and graphics, these school backpacks are one of the best buys for school time.', 'StrapIt Bags', 'Backpack', 'Backpack', 1),
(23, 12, 'Boat Airdopes 141', 1500, 800, 15, '803732868_download (3).jfif', 'boAt Airdopes 141 42H Playtime, Beast Mode ENx Tech, ASAP Charge, IWP, IPX4 Water Resistance, Smooth Touch Controls Bluetooth Truly Wireless in Ear Earbuds with Mic', 'Playback- Enjoy an extended break on weekends with your favourite episodes on stream, virtue of a playback time of up to 42 hours including the 6 hours nonstop playtime for earbuds.\r\nBeast Mode- Our BEAST mode makes these true wireless earbuds a partner in entertainment with real-time audio and low latency experience.\r\nClear Voice Calls- It dons built-in mic on each earbud along with our ENx Environmental Noise Cancellation tech that ensures a smooth delivery of your voice via voice calls.\r\nboAt Signature Sound- Delve into your cherished boAt Immersive auditory time with Airdopes 141.\r\nASAP Charge- The earbuds are equipped with our ASAP Charge feature that offers up to 75 min of playtime in just 5 min of charge; while the carry case comes along with the Type C interface.\r\nInstant Connect- Connect to your morning playlists without any hiccup via the Insta Wake N’ Pair technology that powers on these true wireless earbuds as soon as you open the case cover.\r\nIP Rating- The earbuds\' body comes protected with IPX4 rating for water and sweat resistance.', 'Boat Airdopes 141 TWS', 'TWS', 'TWS,Boat Airdopes', 1),
(24, 10, 'Dell Inspiron 15 5510 Laptop', 65000, 63999, 15, '859924622_download (5).jfif', 'Dell Inspiron 5518 Intel I5-11300H Laptop, 16Gb, 512Gb Ssd, Windows 11 + Ms Office\'21, Nvidia Mx450 2Gb, 15.6 Inches (39.62 Cms) 250 Nits Fhd, Platinum Silver, Fpr + Backlit Kb (D560691Win9S, 1.64Kgs)', 'Processor: Intel i5-11300H (3.10 GHz up to 4.40 GHz)\r\nRAM & Storage: 16GB DDR4 (2 DIMM Slots) & 512GB SSD\r\nGraphics: NVIDIA GeForce MX450 2GB GDDR5\r\nSoftware: Win 11 + Office H&S 2021\r\nDisplay: 15.6\" FHD WVA AG Narrow Border 250 nits & Backlit Keyboard + Fingerprint Reader\r\nPorts: HDMI 1.4b, (1) USB 3.2 Gen 2x2 Type-C (DP/PowerDelivery) – i3/i5, (2) USB 3.2 Gen 1 Type-A, SD card reader, (1) Headphone & Microphone Audio Jack\r\nWiFu & BT: Intel Wi-Fi 6 2x2 (Gig+) and Bluetooth 5.1', 'Dell Inspiron 5510 Laptop', 'Laptop', 'Dell,Laptop', 1),
(25, 8, 'Realme Narzo 50i', 17000, 15000, 20, '750760119_1647863579726.png', 'realme narzo 50i Phone (Carbon Black, 4GB RAM+64GB Storage) - 6.5\\\" inch Large Display | 5000mAh Battery', 'realme narzo 50i mobile comes with a massive battery that supports up to 43 days in standby. Whether gaming, calling or entertainment, realme narzo 50i is built to last. Its Super Power Saving Mode lets you go on even at 5% power.Capture your life\\\'s memorable moments in high resolution 8MP AI Camera of the realme narzo 50i. It comes with f/2.0 large aperture that catches more light for better picture quality. Even when you zoom in, the pictures are crystal clear.Multi-task, play games and enjoy content on the realme narzo 50i seamlessly, thanks to its powerful Octa-core processor.', 'Realme Narzo 50i', 'Mobile', 'Realme,Mobile', 1),
(26, 8, 'Iphone 13 Pro Max', 120000, 116000, 20, '705771574_61cecOpZrxL._SX679_.jpg', 'Apple iPhone 13 Mobile (128GB) - Midnight', '15 cm (6.1-inch) Super Retina XDR display\r\nCinematic mode adds shallow depth of field and shifts focus automatically in your videos\r\nAdvanced dual-camera system with 12MP Wide and Ultra Wide cameras; Photographic Styles, Smart HDR 4, Night mode, 4K Dolby Vision HDR recording\r\n12MP TrueDepth front camera with Night mode, 4K Dolby Vision HDR recording\r\nA15 Bionic chip for lightning-fast performance\r\nUp to 19 hours of video playback\r\nDurable design with Ceramic Shield', 'Iphone 13 Pro Max', 'Iphone Mobile', 'Mobile,Iphone', 1),
(27, 9, 'Adidas Shirt', 5000, 4700, 15, '655795008_f1.jpg', 'Adidas Men\'s Athletics 3 Stripe Shirts Sleeve Jersey', 'Care Instructions: Machine Wash\r\nFit Type: Regular\r\nMen\'s t-shirt for everyday wear\r\nRegular fit is wider at the body, with a straight silhouette\r\nCrewneck for a comfortable fit\r\nThis product is made with recycled content as part of our ambition to end plastic waste; By buying cotton products from us, you\'re supporting more sustainable cotton farming', 'Adidas Men\'s Athletics 3 Stripe Shirts Sleeve Jersey', 'Adidas T-Shirt', 'Adidas Shirt', 1),
(28, 9, 'Puma T-Shirt', 4500, 4200, 15, '196463126_f3.jpg', 'Adidas Men\'s Athletics 3 Stripe Shirts Sleeve Jersey', 'Care Instructions: Machine Wash\r\nFit Type: Regular\r\nMen\'s t-shirt for everyday wear\r\nRegular fit is wider at the body, with a straight silhouette\r\nCrewneck for a comfortable fit\r\nThis product is made with recycled content as part of our ambition to end plastic waste; By buying cotton products from us, you\'re supporting more sustainable cotton farming', 'Puma Men\'s Athletics 3 Stripe Shirts Sleeve Jersey', 'Puma T-Shirt', 'Puma,Shirt', 1),
(29, 9, 'Nike T-Shirt', 2000, 1500, 15, '457941248_f2.jpg', 'Nike Men\'s Athletics 3 Stripe Shirts Sleeve Jersey', 'Care Instructions: Machine Wash\r\nFit Type: Regular\r\nMen\'s t-shirt for everyday wear\r\nRegular fit is wider at the body, with a straight silhouette\r\nCrewneck for a comfortable fit\r\nThis product is made with recycled content as part of our ambition to end plastic waste; By buying cotton products from us, you\'re supporting more sustainable cotton farming', 'Nike Men\'s Athletics 3 Stripe Shirts Sleeve Jersey', 'Nike Shirt', 'Nike,Shirt', 1),
(30, 9, 'Reebok Shirt', 4000, 3500, 15, '308195276_f4.jpg', 'Reebok Men\'s Athletics 3 Stripe Shirts Sleeve Jersey', 'Care Instructions: Machine Wash\r\nFit Type: Regular\r\nMen\'s t-shirt for everyday wear\r\nRegular fit is wider at the body, with a straight silhouette\r\nCrewneck for a comfortable fit\r\nThis product is made with recycled content as part of our ambition to end plastic waste; By buying cotton products from us, you\'re supporting more sustainable cotton farming', 'Reebok T-Shirt', 'Reebok T-Shirt', 'Reebok,T-Shirt', 1),
(31, 14, 'Nike Footwear', 2000, 1500, 15, '453931611_product-1.jpg', 'Reebok Men\'s Stride Walker Walking Shoe', 'Closure: Lace-Up\r\nShoe Width: Medium\r\nMaterial: Syenthetic\r\nColor: Flat Grey - Vector Navy\r\nPackage Contents: 1 Pair of Shoes\r\nIdeal For: Men', 'Reebok Footwear', 'Reebok Footwear', 'Reebok Footwear', 1),
(32, 14, 'Nike Walking Shoe', 4000, 3500, 20, '978925709_product-8.jpg', 'Nike Men\'s Stride Walker Walking Shoe', 'Closure: Lace-Up\r\nShoe Width: Medium\r\nMaterial: Syenthetic\r\nColor: Flat Grey - Vector Navy\r\nPackage Contents: 1 Pair of Shoes.Footwear\r\nIdeal For: Men', 'Nike Footwear', 'Nike Footwear', 'Nike Footwear', 1),
(33, 14, 'Adidas Walking Shoes', 4500, 4000, 50, '908548329_product-8.jpg', 'Adidas Men\'s Athletics Stripe Footwear', 'Closure: Lace-Up\r\nShoe Width: Medium\r\nMaterial: Syenthetic\r\nColor: Flat Grey - Vector Navy\r\nPackage Contents: 1 Pair of Shoes\r\nIdeal For: Men', 'Adidas Men\'s Athletics Stripe Footwear', 'Adidas Men\'s Athletics Stripe Footwear', 'Adidas Men\'s Athletics Stripe Footwear', 1),
(34, 14, 'Puma Walking Shoes', 4000, 3799, 15, '638964963_product-2.jpg', 'Puma Men\'s Athletics Stripe Footwear', 'Closure: Lace-Up\r\nShoe Width: Medium\r\nMaterial: Syenthetic\r\nColor: Flat Grey - Vector Navy\r\nPackage Contents: 1 Pair of Shoes\r\nIdeal For: Men', 'Puma Walking Footwear', 'Puma Walking Footwear', 'Puma Walking Footwear', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `status` text NOT NULL,
  `added_on` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `user_id`, `product_id`, `rating`, `review`, `status`, `added_on`) VALUES
(15, 26, 28, 'Bad', 'This is for testing', '1', '2022-07-04 02:30:09'),
(16, 26, 29, 'Very Good', 'Good', '1', '2022-07-04 03:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(1, 8, 'Samsung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(26, 'Omprakash', 'omprakash', 'omprakash@gmail.com', '7845222019', 'June 23,2022 9:49:02 pm'),
(33, 'Giritharan', 'Giri@2004', 'giri@gmail.com', '9488043308', 'July 04,2022 8:30:27 am'),
(34, 'Mohan Prasad', 'mohanPrasad2004!@', 'mohan2004@gmail.com', '7894561230', 'July 04,2022 8:35:09 am'),
(35, 'Madhubalan', 'madhubalanK2003!', 'madhubalan2003@gmail.com', '7894561230', 'July 04,2022 8:39:12 am'),
(36, 'Narendran', 'qwe123Q@', 'naren@gmail.com', '1234567890', 'July 04,2022 8:42:03 am'),
(37, 'Mohanraj', 'Mohan@2004', 'mohanjeeva18@gmail.com', '6383717142', 'July 04,2022 8:43:31 am'),
(38, '', '', '', '', 'July 04,2022 11:14:37 am'),
(39, 'RISHI SUBHA', 'Rishi@2021', 'srishi5287@gmail.com', '9042807902', 'July 07,2022 7:34:49 pm');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(46, 0, 27, '2022-07-04 12:01:32 pm'),
(49, 26, 29, '2022-07-04 02:30:28 pm'),
(50, 26, 33, '2022-07-04 02:30:32 pm'),
(51, 26, 30, '2022-07-04 03:10:21 pm'),
(52, 26, 25, '2022-07-04 03:51:04 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_seller`
--
ALTER TABLE `best_seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `best_seller`
--
ALTER TABLE `best_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
