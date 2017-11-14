-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-21 20:23:54
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
-- 表的结构 `restaurant`
--

CREATE TABLE `restaurant` (
  `place_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price_up` int(11) DEFAULT NULL,
  `price_down` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text,
  `city_id` int(11) DEFAULT NULL,
  `tag` text,
  `phone_number` varchar(255) DEFAULT NULL,
  `opening_hours` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,4) DEFAULT NULL,
  `longitude` decimal(10,4) DEFAULT NULL,
  `like_num` int(11) DEFAULT '0',
  `merchant` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `restaurant`
--

INSERT INTO `restaurant` (`place_id`, `name`, `price_up`, `price_down`, `address`, `description`, `city_id`, `tag`, `phone_number`, `opening_hours`, `latitude`, `longitude`, `like_num`, `merchant`) VALUES
(1, 'Bostonian Seafood and Grill', 401, 800, 'Lower lobby level, The Langham Hong Kong, 8 Peking Road, Tsim Sha Tsui, Kowloon, Tsim Sha Tsui', 'Offering a new shipyard chic scene, this inspiring urban space personifies a reclaimed style with an industrial vibe to socially share in the heart of bustling Tsim Sha Tsui. Featured characteristics include a craft brew bar, a principal dining area and a private champagne room. The smartly designed details contain curated collections of vintage accessories where metal and steel meet wood. Guests can expect a menu filled with tasty talents that carry seasonal land and sea favourites of various international influences. Adding a whole new depth to dining, prepare to share and submerse in a scene to be seen.', 1, 'International\r\nSeafood\r\nWestern Restaurant\r\nHotel Restaurant\r\nOyster Bar Baked and Raw Signature Oysters House-made Beetroot Cured Salmon Lobster Thermidor USDA Prime Cowboy Steak Black Cod Fish and Clams in “Salsa Verde” Sauce “Fish and Chips” Atlantic Cod in Sam Adams Beer Batter', '2132 7898', 'Mon to Sat: 12:00-15:00; 17:00-23:00 Sun: 11:00-15:00 ; 17:00-23:00', '22.2964', '114.1697', 342, 2),
(2, 'Burgeroom', 51, 100, 'Shop D, G/F, Food Street, 50-56 Paterson Street, Fashion Walk, Causeway Bay', 'A popular restaurant that always has a long queue, it has stylish decorations after moving to Fashion Walk. The goose liver burger is their signature dish.', 1, 'American\r\nHamburger\r\nFast Food Foie Gras Beef Burger Portobello Cheese Burger Soft Shell Crab Burger Lobster Burger', '2890 9130', 'Mon-Sun: 11:00-00:00', '22.3008', '114.1724', 487, 3),
(3, 'Next Station Dessert', 51, 100, 'G/F., 13 Hak Po Street, Mong Kok', 'Mong Kok popular dessert restaurant Next Station Dessert With a wide variety of dessert choices and reasonable price, recommendation are Purple sweet potato mountain and Vanilla bubble with durian ice-cream.', 1, 'Western\r\nDessert\r\nIce Cream/yogurt\r\nCoffee Shop', '2668 8355', 'Mon-Sun: 15:00-01:00', '22.3174', '114.1726', 408, 4),
(4, 'HeSheEat', 51, 100, 'Shop 4, G/F, Ngai Hing Mansion, 22 Pak Po Street, Mong Kok', 'HeSheEat is a popular dessert restaurant. The owner loves to create new desserts for customers. It often has exclusive and seasonal new creations to surprise fans.', 1, 'Western\r\nDessert\r\nIce Cream/yogurt\r\nWestern Restaurant\r\nCoffee Shop', '5571 3056', 'Mon-Sun: 13:00-01:00', '22.3177', '114.1729', 384, 5),
(5, 'The Pudding Nouveau', 101, 200, 'G/F, 17A King Street, Tai Hang', 'Frequently hitting the OpenRice monthly chart, the sweets symbol of this Tai Hang little shop is the waffle series while the salts symbol is All Day Breakfast. Both are the favourites of youngsters.', 1, 'French\r\nWestern\r\nDessert\r\nIce Cream/yogurt\r\nAll Day Breakfast\r\nCoffee Shop', '3585 7325', 'Mon-Fri: 15:00-23:30 Sat-Sun & PH: 12:00-23:30', '22.2787', '114.1919', 213, 0),
(6, '\r\nVia Tokyo', 1, 50, 'Shop 1A-1B, G/F, Leishun Court, 106-126 Leighton Road, Causeway Bay', 'Via Tokyo’s popular Matcha ice-cream is made of matcha powder from Kyoto and the smoothest Hokkaido milk. Their best-selling ice-cream has a firm texture and strong scent of green tea and milk.', 1, 'Japanese\r\nDessert\r\nIce Cream/yogurt', '2895 1116', 'Mon-Thu & Sun: 11:00-22:30 Fri-Sat & PH: 11:00-23:00', '22.2780', '114.1864', 311, 0),
(7, 'Burger Joys', 101, 200, 'Shop E, G/F, De Fenwick, 42-50 Lockhart Road, Wan Chai', 'Burger with French Michelin’s bread, potato chips with black truffle made it is outstanding from the other burger restaurants. And the Signature double cheese burger contains 2 beef inside which is really attractive. They offer vegetarian burger too.', 1, 'American\r\nHamburger\r\nWestern Restaurant', '2787 1288', 'Mon-Thu & Sun: 11:00-22:30 Fri-Sat & PH: 11:00-23:00', '22.2779', '114.1706', 319, 0),
(8, 'The Grill Room', 201, 400, '5/F, The L. Square, 459-461 Lockhart Road, Causeway Bay', 'It mainly offers grilling food. You may feel free to eat as much babyback ribs as you can in 90 minutes every Tuesday.', 1, 'Western\r\nBBQ\r\nRoast Meat\r\nSteak House\r\nWestern Restaurant Salmon Tartare Slow Cooked Salmon Pork Ribs with Coleslaw n Fries 16 oz Angus Rib Eye Steak Vongole Clams Capellini Crispy Skin Pork Belly', '2897 6838', 'Mon-Sun: 12:00-15:00, 17:00-23:00\r\nLast order: 22:30', '22.2802', '114.1816', 344, 0),
(9, 'Little Vegas', 101, 200, '25/F, Bartlock Centre, 3 Yiu Wa Street, Causeway Bay', 'Las Vegas is the theme of this American restaurant. The mega -size pizza and spaghetti best suit large gang of friends to share together.', 1, 'Western\r\nPizza\r\nAll Day Breakfast\r\nWestern Restaurant', '2622 2369', 'Mon :12:00-15:30.1800-2230 (Last Order: 22:00) Tue-Thu:12:00-15:30.1800-22:30(Last Order: 22:00) Fri-Sat :12:00-15:30.1800-23:00(Last Order: 22:30) Sun :12:00-15:30.1800-22:30(Last Order:22:30)', '22.2777', '114.1822', 252, 0),
(10, 'Wa Shou Yakiniku', 201, 400, 'Shop 3, G/F, Tak Wai Building, 23-27 Cheong Lok Street, Jordan', 'Carefully select high quality Japanese wagyu beef and match with special secret sauce, provide food more flavor. BBQ master in restaurant would teach you some tips on BBQ, make sure your meal is delicious and surprised.', 1, 'Japanese\r\nRoast Meat\r\nSkewer\r\nSkewer', '2264 8928', 'Mon-Sun: 12:00-15:00; 18:30-22:30', '22.3064', '114.1725', 239, 0),
(11, 'CHEF STAGE de Eddy Chu', 401, 800, '19/F, 17-19 Ashley Road, Tsim Sha Tsui', 'It mixes the concept of western restaurant and Chinese stall together, and offers fresh food and wine. Customers can share a high-class and relaxing atmosphere.', 1, 'Western\r\nInternational\r\nWine\r\nSeafood\r\nWestern Restaurant', '2303 0999', 'Mon-Sun: 11:30-22:30', '22.2969', '114.1703', 274, 0),
(12, 'Sushi Man', 401, 800, 'Shop 5, G/F,Lee Fat House, No. 5 Yan Lok Square, Yuen Long', 'Orthodox Japanese restaurant, with almost 90% of the ingredients imported from Japan, including Otoro cheek and fins.', 1, 'Japanese\r\nSushi/Sashimi', '2285 9477', 'Mon-Sun: 12:00-14:30; 18:30-22:30', '22.4434', '114.0267', 194, 0),
(13, 'Thai Chef Thais Restaurant', 101, 200, 'G/F, 126 Tung Choi Street, Mong Kok', 'Pay attention to every details of food and quality, for example, chef will pick fresh seafood everyday and wagyu is imported from Japan.', 1, 'Thai\r\nSeafood\r\nBBQ\r\nCurry\r\nSkewer\r\nSkewer', '2749 9900', 'Mon-Sun: AM07:00-AM02:00', '22.3214', '114.1702', 235, 0),
(14, 'Volcano Grill', 201, 400, '9-10/F, The L. Square, 459-461 Lockhart Road, Causeway Bay', NULL, 1, 'Japanese\r\nSkewer\r\nAll-you-can-eat\r\nSkewer', '2889 7008', 'Mon-Sun: 17:00-02:00', '22.2802', '114.1814', 276, 0),
(15, 'Thai on 5 Seafood Grill and Bar', 201, 400, '5/F, 1 Knutsford Terrace, Tsim Sha Tsui', 'Thai on 5 Seafood Grill and Bar has its exclusive Thai afternoon tea set served in three-tiered cake stand and other modern Thai cuisines that stand out from the traditional ones.', 1, 'Thai\r\nSeafood\r\nBBQ', '2721 9898', 'Mon-Sun: 15:00-01:30', '22.3012', '114.1731', 214, 0),
(16, 'Hiroshi', 101, 200, 'Shop 502, 5/F, The ONE, 100 Nathan Road, Tsim Sha Tsui', 'Japanese food and dessert restaurant with signature dish matcha cake roll.', 1, 'Japanese\r\nDessert\r\nYoshoku', '2737 2665', 'Mon-Sat: 12:00-23:00 Sun: 12:00-22:30', '22.3039', '114.1691', 213, 0),
(17, 'tori izakaya', 201, 400, '17/F, Macau Yat Yuen Centre, 525 Hennessy Road, Causeway Bay', NULL, 1, 'Japanese\r\nRoast Meat\r\nRobatayaki\r\nSkewer\r\nIzakaya\r\nSkewer', '2717 7001', 'Sun-Thu: 18:00-01:00 Fri-Sat: 18:00-02:00', '22.2803', '114.1838', 189, 0),
(18, 'Mackie Kitchen', 101, 200, 'G/F, 9 Caroline Hill Road, Causeway Bay', 'Café of Mackie study\'s , serves snacks, salads, steaks and pasta. Variety of coffee favor choice is available.', 1, 'Western\r\nWestern Restaurant\r\nCoffee Shop', '2808 0351', 'Mon.-Sun. 12:00-22:00', '22.2775', '114.1865', 235, 0),
(19, 'Kyo Hayashiya', 51, 100, 'Shop 603-604, 6/F, Hysan Place, 500 Hennessy Road, Causeway Bay', 'It got over a century history in Kyoto. It mainly offer matcha parfait and other matcha products.', 1, 'Japanese\r\nDessert', '3580 1838', 'Sun-Thurs: 11:30-22:00 Fri-Sat: 11:30-22:30', '22.2774', '114.1868', 221, 0),
(20, 'Tulsi & Wine', 101, 200, 'G/F, 10-11 The Bonham Mansion, 63 Bonham Road, Sai Ying Pun, Western District', 'Tulsi & Wine is a western restaurant located at Kennedy Town. It serves unique dishes and it provides delivery service for party food.', 1, 'Indian\r\nInternational\r\nWine\r\nPizza\r\nCurry', '2517 7077', 'Tue-Sun: 11:30-15:00; 18:00-23:30', '22.2844', '114.1408', 262, 0),
(21, 'Tai O Lookout', 101, 200, '1/F, Tai O Heritage Hotel, Shek Tsai Po Street, Tai O', '', 1, 'Western\r\nWestern Restaurant\r\nFood Wise Eateries', '2985 8383', 'Mon.-Sun.: 07:30-22:00', '22.2532', '113.8539', 37, 0),
(22, 'Dream Maker Restaurant', 101, 200, '1/F, New Kwai Fong Gardens, Ho Chuck Centre, 2-10 Kwai Yi Road, Kwai Fong', NULL, 1, 'Japanese\r\nBuffet\r\nAll-you-can-eat\r\nYoshoku', '26289636', 'Mon - Sun:11:30-16:00; 17:30-23:00', '22.3567', '114.1273', 137, 0),
(23, 'Forever', 101, 200, 'G/F, Block B, Manhattan Plaza, 23 Sai Ching Street, Yuen Long', NULL, 1, 'Italian\r\nWestern Restaurant', '2443 1228', 'Mon-Sun: 11:30-23:00', '22.4413', '114.0283', 113, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`place_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
