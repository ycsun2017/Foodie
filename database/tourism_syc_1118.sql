-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-18 01:10:55
-- 服务器版本： 5.7.10-log
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- 表的结构 `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `city`
--

INSERT INTO `city` (`city_id`, `name`) VALUES
(1, 'Hong Kong'),
(2, 'New York'),
(3, 'Beijing'),
(4, 'Shanghai');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hotel`
--

CREATE TABLE `hotel` (
  `place_id` int(11) NOT NULL,
  `scenery_id` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hotel`
--

INSERT INTO `hotel` (`place_id`, `scenery_id`, `website`, `name`) VALUES
(1, 1, 'http://www.dianping.com/shop/2761450', 'Intercontinental HongKong'),
(2, 1, 'http://www.dianping.com/shop/2652121', 'Peninsula Hotel'),
(3, 2, 'http://www.dianping.com/shop/17250496', 'Ovolo Hotel'),
(4, 2, 'http://www.dianping.com/shop/4174305', 'L\'Hotel South Island'),
(5, NULL, NULL, NULL),
(6, NULL, NULL, NULL),
(7, NULL, NULL, NULL),
(8, NULL, NULL, NULL),
(9, NULL, NULL, NULL),
(10, NULL, NULL, NULL),
(11, NULL, NULL, NULL),
(12, NULL, NULL, NULL),
(13, NULL, NULL, NULL),
(14, NULL, NULL, NULL),
(15, NULL, NULL, NULL),
(16, NULL, NULL, NULL),
(17, NULL, NULL, NULL),
(18, NULL, NULL, NULL),
(19, NULL, NULL, NULL),
(20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `restaurant`
--

CREATE TABLE `restaurant` (
  `place_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `description` text,
  `city_id` int(11) DEFAULT NULL,
  `tag` text,
  `phone_number` varchar(255) DEFAULT NULL,
  `Opening Hours` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,4) DEFAULT NULL,
  `longitude` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `restaurant`
--

INSERT INTO `restaurant` (`place_id`, `name`, `price`, `address`, `description`, `city_id`, `tag`, `phone_number`, `Opening Hours`, `latitude`, `longitude`) VALUES
(1, 'Bostonian Seafood and Grill', ' HK$401-800', 'Lower lobby level, The Langham Hong Kong, 8 Peking Road, Tsim Sha Tsui, Kowloon, Tsim Sha Tsui', 'Offering a new shipyard chic scene, this inspiring urban space personifies a reclaimed style with an industrial vibe to socially share in the heart of bustling Tsim Sha Tsui. Featured characteristics include a craft brew bar, a principal dining area and a private champagne room. The smartly designed details contain curated collections of vintage accessories where metal and steel meet wood. Guests can expect a menu filled with tasty talents that carry seasonal land and sea favourites of various international influences. Adding a whole new depth to dining, prepare to share and submerse in a scene to be seen.', 1, 'International\r\nSeafood\r\nWestern Restaurant\r\nHotel Restaurant\r\nOyster Bar Baked and Raw Signature Oysters House-made Beetroot Cured Salmon Lobster Thermidor USDA Prime Cowboy Steak Black Cod Fish and Clams in “Salsa Verde” Sauce “Fish and Chips” Atlantic Cod in Sam Adams Beer Batter', '2132 7898', 'Mon to Sat: 12:00-15:00; 17:00-23:00 Sun: 11:00-15:00 ; 17:00-23:00', NULL, NULL),
(2, 'Burgeroom', ' HK$51-100', 'Shop D, G/F, Food Street, 50-56 Paterson Street, Fashion Walk, Causeway Bay', 'A popular restaurant that always has a long queue, it has stylish decorations after moving to Fashion Walk. The goose liver burger is their signature dish.', 1, 'American\r\nHamburger\r\nFast Food Foie Gras Beef Burger Portobello Cheese Burger Soft Shell Crab Burger Lobster Burger', '2890 9130', 'Mon-Sun: 11:00-00:00', NULL, NULL),
(3, 'Next Station Dessert', '\r\n HK$51-100', 'G/F., 13 Hak Po Street, Mong Kok', 'Mong Kok popular dessert restaurant Next Station Dessert With a wide variety of dessert choices and reasonable price, recommendation are Purple sweet potato mountain and Vanilla bubble with durian ice-cream.', 1, 'Western\r\nDessert\r\nIce Cream/yogurt\r\nCoffee Shop', '2668 8355', 'Mon-Sun: 15:00-01:00', NULL, NULL),
(4, 'HeSheEat', '\r\n HK$51-100', 'Shop 4, G/F, Ngai Hing Mansion, 22 Pak Po Street, Mong Kok', 'HeSheEat is a popular dessert restaurant. The owner loves to create new desserts for customers. It often has exclusive and seasonal new creations to surprise fans.', 1, 'Western\r\nDessert\r\nIce Cream/yogurt\r\nWestern Restaurant\r\nCoffee Shop', '5571 3056', 'Mon-Sun: 13:00-01:00', NULL, NULL),
(5, 'The Pudding Nouveau', '\r\n HK$101-200', 'G/F, 17A King Street, Tai Hang', 'Frequently hitting the OpenRice monthly chart, the sweets symbol of this Tai Hang little shop is the waffle series while the salts symbol is All Day Breakfast. Both are the favourites of youngsters.', 1, 'French\r\nWestern\r\nDessert\r\nIce Cream/yogurt\r\nAll Day Breakfast\r\nCoffee Shop', '3585 7325', 'Mon-Fri: 15:00-23:30 Sat-Sun & PH: 12:00-23:30', NULL, NULL),
(6, '\r\nVia Tokyo', '\r\n Below HK$50', 'Shop 1A-1B, G/F, Leishun Court, 106-126 Leighton Road, Causeway Bay', 'Via Tokyo’s popular Matcha ice-cream is made of matcha powder from Kyoto and the smoothest Hokkaido milk. Their best-selling ice-cream has a firm texture and strong scent of green tea and milk.', 1, 'Japanese\r\nDessert\r\nIce Cream/yogurt', '2895 1116', 'Mon-Thu & Sun: 11:00-22:30 Fri-Sat & PH: 11:00-23:00', NULL, NULL),
(7, 'Burger Joys', '\r\n HK$101-200', 'Shop E, G/F, De Fenwick, 42-50 Lockhart Road, Wan Chai', 'Burger with French Michelin’s bread, potato chips with black truffle made it is outstanding from the other burger restaurants. And the Signature double cheese burger contains 2 beef inside which is really attractive. They offer vegetarian burger too.', 1, 'American\r\nHamburger\r\nWestern Restaurant', '2787 1288', NULL, NULL, NULL),
(8, 'The Grill Room', '\r\n HK$201-400', '5/F, The L. Square, 459-461 Lockhart Road, Causeway Bay', 'It mainly offers grilling food. You may feel free to eat as much babyback ribs as you can in 90 minutes every Tuesday.', 1, 'Western\r\nBBQ\r\nRoast Meat\r\nSteak House\r\nWestern Restaurant Salmon Tartare Slow Cooked Salmon Pork Ribs with Coleslaw n Fries 16 oz Angus Rib Eye Steak Vongole Clams Capellini Crispy Skin Pork Belly', '2897 6838', 'Mon-Sun: 12:00-15:00, 17:00-23:00\r\nLast order: 22:30', NULL, NULL),
(9, 'Little Vegas', '\r\n HK$101-200', '25/F, Bartlock Centre, 3 Yiu Wa Street, Causeway Bay', 'Las Vegas is the theme of this American restaurant. The mega -size pizza and spaghetti best suit large gang of friends to share together.', 1, 'Western\r\nPizza\r\nAll Day Breakfast\r\nWestern Restaurant', '2622 2369', 'Mon :12:00-15:30.1800-2230 (Last Order: 22:00) Tue-Thu:12:00-15:30.1800-22:30(Last Order: 22:00) Fri-Sat :12:00-15:30.1800-23:00(Last Order: 22:30) Sun :12:00-15:30.1800-22:30(Last Order:22:30)', NULL, NULL),
(10, 'Wa Shou Yakiniku', ' HK$201-400', 'Shop 3, G/F, Tak Wai Building, 23-27 Cheong Lok Street, Jordan', 'Carefully select high quality Japanese wagyu beef and match with special secret sauce, provide food more flavor. BBQ master in restaurant would teach you some tips on BBQ, make sure your meal is delicious and surprised.', 1, 'Japanese\r\nRoast Meat\r\nSkewer\r\nSkewer', '2264 8928', 'Mon-Sun: 12:00-15:00; 18:30-22:30', NULL, NULL),
(11, 'CHEF STAGE de Eddy Chu', '\r\n HK$401-800', '19/F, 17-19 Ashley Road, Tsim Sha Tsui', 'It mixes the concept of western restaurant and Chinese stall together, and offers fresh food and wine. Customers can share a high-class and relaxing atmosphere.', 1, 'Western\r\nInternational\r\nWine\r\nSeafood\r\nWestern Restaurant', '2303 0999', 'Mon-Sun: 11:30-22:30', NULL, NULL),
(12, 'Sushi Man', ' HK$401-800', 'Shop 5, G/F,Lee Fat House, No. 5 Yan Lok Square, Yuen Long', 'Orthodox Japanese restaurant, with almost 90% of the ingredients imported from Japan, including Otoro cheek and fins.', 1, 'Japanese\r\nSushi/Sashimi', '2285 9477', 'Mon-Sun: 12:00-14:30; 18:30-22:30', NULL, NULL),
(13, 'Thai Chef Thais Restaurant', ' HK$101-200', 'G/F, 126 Tung Choi Street, Mong Kok', 'Pay attention to every details of food and quality, for example, chef will pick fresh seafood everyday and wagyu is imported from Japan.', 1, 'Thai\r\nSeafood\r\nBBQ\r\nCurry\r\nSkewer\r\nSkewer', '2749 9900', 'Mon-Sun: AM07:00-AM02:00', NULL, NULL),
(14, 'Volcano Grill', ' HK$201-400', '9-10/F, The L. Square, 459-461 Lockhart Road, Causeway Bay', NULL, 1, 'Japanese\r\nSkewer\r\nAll-you-can-eat\r\nSkewer', '2889 7008', 'Mon-Sun: 17:00-02:00', NULL, NULL),
(15, 'Thai on 5 Seafood Grill and Bar', ' HK$201-400', '5/F, 1 Knutsford Terrace, Tsim Sha Tsui', 'Thai on 5 Seafood Grill and Bar has its exclusive Thai afternoon tea set served in three-tiered cake stand and other modern Thai cuisines that stand out from the traditional ones.', 1, 'Thai\r\nSeafood\r\nBBQ', '2721 9898', 'Mon-Sun: 15:00-01:30', NULL, NULL),
(16, 'Hiroshi', ' HK$101-200', 'Shop 502, 5/F, The ONE, 100 Nathan Road, Tsim Sha Tsui', 'Japanese food and dessert restaurant with signature dish matcha cake roll.', 1, 'Japanese\r\nDessert\r\nYoshoku', '2737 2665', 'Mon-Sat: 12:00-23:00 Sun: 12:00-22:30', NULL, NULL),
(17, 'tori izakaya', '\r\n HK$201-400', '17/F, Macau Yat Yuen Centre, 525 Hennessy Road, Causeway Bay', NULL, 1, 'Japanese\r\nRoast Meat\r\nRobatayaki\r\nSkewer\r\nIzakaya\r\nSkewer', '2717 7001', 'Sun-Thu: 18:00-01:00 Fri-Sat: 18:00-02:00', NULL, NULL),
(18, 'Mackie Kitchen', ' HK$101-200', 'G/F, 9 Caroline Hill Road, Causeway Bay', 'Café of Mackie study\'s , serves snacks, salads, steaks and pasta. Variety of coffee favor choice is available.', 1, 'Western\r\nWestern Restaurant\r\nCoffee Shop', '2808 0351', 'Mon.-Sun. 12:00-22:00', NULL, NULL),
(19, 'Kyo Hayashiya', ' HK$51-100', 'Shop 603-604, 6/F, Hysan Place, 500 Hennessy Road, Causeway Bay', 'It got over a century history in Kyoto. It mainly offer matcha parfait and other matcha products.', 1, 'Japanese\r\nDessert', '3580 1838', 'Sun-Thurs: 11:30-22:00 Fri-Sat: 11:30-22:30', NULL, NULL),
(20, 'Tulsi & Wine', '\r\n HK$101-200', 'G/F, 10-11 The Bonham Mansion, 63 Bonham Road, Sai Ying Pun, Western District', 'Tulsi & Wine is a western restaurant located at Kennedy Town. It serves unique dishes and it provides delivery service for party food.', 1, 'Indian\r\nInternational\r\nWine\r\nPizza\r\nCurry', '2517 7077', 'Tue-Sun: 11:30-15:00; 18:00-23:30', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `scenery`
--

CREATE TABLE `scenery` (
  `scenery_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `latitude` decimal(10,4) DEFAULT NULL,
  `longitude` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `scenery`
--

INSERT INTO `scenery` (`scenery_id`, `name`, `city_id`, `price`, `address`, `latitude`, `longitude`) VALUES
(1, 'Victoria Harbour', 1, '0', '344-352 Reclamation Street, 344-352 Reclamation Street, Hong Kong', '22.2937', '114.1740'),
(2, 'Ocean Park', 1, '320', 'Hong Kong Island Wong Chuk Hang Nam Long Shan Aberdeen Ocean Park Road', '22.2467', '114.1757'),
(3, 'Disneyland', 1, '450', 'Disneyland Resort, Lantau Island, Hong Kong', '22.3130', '114.0413'),
(4, 'Madame Tussauds', 1, '225', 'P101, The Peak Tower, 128 Peak Road, Hong Kong', '22.2712', '114.1499'),
(5, 'Victoria Peak', 1, '0', '118 Peak Road, Hong Kong Island', '22.2758', '114.1455'),
(6, 'Central', 1, '0', 'Hong Kong Central & Western District', '22.2799', '114.1587'),
(7, 'Repulse Bay', 1, '0', 'South of Hong Kong Island', '22.2366', '114.1961'),
(8, 'Golden Bauhinia Square', 1, '0', 'Hong Kong Convention and Exhibition Center, 1 Expo Drive, Wan Chai, Hong Kong', '22.2844', '113.9412'),
(9, 'Lantau Island', 1, '0', 'Tsuen Wan District, Hong Kong', '22.2665', '113.9410'),
(10, 'Mong Kok', 1, '0', 'North end of Nathan Road, Hong Kong', '22.3203', '114.1694'),
(11, 'Statue of Liberty', 2, '12', 'Liberty Island, 10004 New York Harbor', '40.6893', '-74.0439'),
(12, 'Wall Street', 2, '0', '40 Wall Street New York, NY 10005', '40.7061', '-74.0088'),
(13, 'Metropolitan Museum of Art', 2, '25', '1000 5th Avenue New York, NY 10028', '40.7794', '-73.9630'),
(14, 'Central Park', 2, '0', 'Fifth avenue and 64th street corner', '40.7829', '-73.9655'),
(15, 'Broadway', 2, '0', 'Broadway', '41.1118', '-73.8583'),
(16, 'Times Square\r\n', 2, '0', 'Broadway, New York City, NY 10036 (Manhattan)', '40.7589', '-73.9848'),
(17, 'Empire State Building', 2, '25', '350 Fifth Avenue, Between 33rd and 34th Streets, New York City, NY 10118 (Midtown)', '40.7484', '-73.9849'),
(18, 'Colambia University', 2, '0', '116th Street, New York City, NY 10027 (Manhattan)', '40.8076', '-73.9624'),
(19, 'Museum of Natural History', 2, '0', '79th Street and Central Park West, New York City, NY 10024 (Midtown, Upper West Side)', '40.7813', '-73.9738'),
(20, 'New York University', 2, '0', '70 Washington Square South, New York City, NY (Greenwich Village)', '40.7296', '-73.9964'),
(21, 'Forbidden City', 3, '60', 'No.4 Jingshanqian Street, Dongcheng District', '39.9164', '116.3974'),
(22, 'Summer Palace', 3, '30', 'Haidian District, Beijing New Gongmen Road on the 19th', '39.9999', '116.2755'),
(23, 'Badaling Great Wall', 3, '40', 'Yanqing County, Beijing Junduigou Road north exit', '40.3597', '116.0205'),
(24, 'Ti\'anmen Square', 3, '0', 'North of Tiananmen Square, Dongcheng District, Beijing', '39.9055', '116.3978'),
(25, 'Bird\'s Nest', 3, '50', '\r\nAnding Road, Chaoyang District, Beijing on the 3rd', '39.9928', '116.3963'),
(26, 'Hou Hai', 3, '0', 'Beijing Xicheng District', '39.9450', '116.3817'),
(27, 'Peking University', 3, '0', 'No.5, Summer Palace Road, Haidian District, Beijing', '39.9885', '116.3088'),
(28, 'Tiantan Park', 3, '15', 'Dongcheng District, Beijing', '39.8837', '116.4130'),
(29, 'Nanluoguxiang', 3, '0', 'Dongcheng District, Beijing', '39.9373', '116.4032'),
(30, 'Xiangshan Park', 3, '10', 'Haidian District, Beijing', '39.9924', '116.1872'),
(31, 'The Bund', 4, '0', 'Shanghai Huangpu District', '31.2393', '121.4898'),
(32, 'Pearl of the Orient', 4, '150', 'Shanghai Huangpu River Bank', '31.2399', '121.4997'),
(33, 'Old Town God Temple', 4, '10', 'Shanghai Huangpu District', '31.2294', '121.4933'),
(34, 'Nanjing Road', 4, '0', 'Shanghai Huangpu District', '31.2348', '121.4751'),
(35, 'Shanghai Science center', 4, '60', '2000, Century Avenue, Pudong New Area, Shanghai ', '31.2179', '121.5416'),
(36, 'Thames Township', 4, '0', 'Songjiang District of Shanghai', '31.0920', '121.1991'),
(37, 'Happy Valley', 4, '200', 'Songjiang District of Shanghai', '31.0955', '121.2154'),
(38, 'Fudan University', 4, '0', 'Shanghai Yangpu District', '31.2965', '121.5046'),
(39, 'Shanghai Zoo', 4, '40', '2381 Hongqiao Road, Changning District, Shanghai', '31.1930', '121.3630'),
(40, 'Madame Tussauds', 4, '150', 'New World Commercial Building, 2-68 Nanjing West Road, Huangpu District, Shanghai', '31.2347', '121.4741');

-- --------------------------------------------------------

--
-- 表的结构 `travelplan`
--

CREATE TABLE `travelplan` (
  `plan_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `scenery1` int(11) NOT NULL,
  `scenery2` int(11) NOT NULL,
  `lunch` int(11) NOT NULL,
  `dinner` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `is_public` int(11) NOT NULL DEFAULT '1',
  `is_friend` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `fullname`, `age`, `phone_number`, `is_admin`) VALUES
(1, 'souniangao@163.com', 'diudiu', '111111', '', 0, '0', b'1'),
(2, '16010899X@connect.polyu.hk', '16010899X', '111111', '16010899X', 0, '0', b'0');

-- --------------------------------------------------------

--
-- 表的结构 `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `wish_list`
--

INSERT INTO `wish_list` (`id`, `user_id`, `restaurant_id`) VALUES
(4, 1, 5),
(5, 1, 7),
(6, 1, 13),
(7, 1, 10),
(8, 1, 11),
(10, 1, 6),
(11, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `scenery`
--
ALTER TABLE `scenery`
  ADD PRIMARY KEY (`scenery_id`);

--
-- Indexes for table `travelplan`
--
ALTER TABLE `travelplan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `hotel`
--
ALTER TABLE `hotel`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `scenery`
--
ALTER TABLE `scenery`
  MODIFY `scenery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
