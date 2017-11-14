-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-21 20:20:22
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
  `user_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `place_id`, `content`) VALUES
(1, 1, 2, 'I fell in love with the place when it just opened where the young owners were there pretty hands on. You could hear the patty sizzling away. Now that it has gone franchise, I found the service less personal and the taste not as good as it was. It was not awful but no longer something I got super excited about. Probably will still go when I have a craving though.'),
(2, 2, 2, 'This is my first time dining at this burger place. Technically it\'s more like a self-serve fast food stall that you have to purchase food at the cashier then they\'ll deliver your order to your table. The atmosphere is not bad, but the rooms between tables are too tight that you can hear other people\'s talks. So disappointed with the food there, the buns were cold, the patty is warm outside but cold inside... not appealing at all... suspect they pre cooked all the patties in advance  also, the hot drink i ordered was luke warm which feels like it had been sitting around for half an hour before it was served... Won\'t go back to this place again '),
(3, 3, 2, 'Good ol\' juicy burger but could be better. First, the chips were standard crispy but bland. The burger should be the hero but what\'s Batman without an equally good Robin? Second, the foie gras costed more than the whole burger! A burger costed about $70 but add a foie gras and it became $150. Not worth the money in my opinion. Since the burger was already juicy enough, the richness of the foie gras had no added value. If there\'s a second chance, I would just order the normal burger, order sides that I hope is more satisfying than ordinary chips.'),
(4, 5, 3, 'Came here on a Saturday night and was about a 20minute wait outside. They don\'t give out numbers, so if you step out of line, you may just lose your spot. '),
(5, 4, 3, 'People always say that girls have got another "stomach" for desserts even after stuffing ourselves with a full meal. To me, it\'s never a complete meal without desserts!I\'ve heard much about this dessert place and decided to drop by for desserts after dinner nearby. The queue was pretty long even for a weekday night so it got my friend and I anticipating the food much haha.'),
(6, 3, 4, ' It\'s been a while since I last visited HeSheEat Café, one of my favorite places for comfort food so while I was in Causeway Bay this afternoon, I decided to drop by for a quick one before starting my shopping spree. '),
(7, 2, 4, 'Arrived at 930pm, 2nd in the queue\r\nI ordered my favourite green tea lava cake on each visit\r\nI couldn\'t believe my eyes when it arrived... it looked plastic. It\'s doesn\'t appear n taste NOT like how it used to be.\r\nHesheeat has gone downhill. My iced coconut latte lacks coconut & coffee flavour. It\'s like having 糖水\r\nI won\'t be going back there again'),
(8, 1, 4, '30/10 This restaurant does not take bookings which was good as for Friday evening trying to find a place to eat at 7pm was hard. I didn\'t have to wait long till I got a table. The restaurant itself is quite small and seating was a little crammed but afterall it\'s about the food and not the seating but seating and environment is very important. The food can served pretty quick. '),
(9, 2, 1, 'While 2016 has been a boring year for restaurant openings, it\'s the year of re-branding and makeover. Recently, we saw Riva and The Deck successfully transformed into Skye rooftop bar at Park Lane Hotel and Blue Butcher now officially "Blue - Butcher and Meat Specialist". Even Bostonian, the decade-old surf-and-turf resto at Langham Hotel, decided it was time for a facelift.'),
(10, 3, 1, 'I like the decorations,just make me feel different worldFood is very good and dessert is exceptional'),
(11, 4, 1, 'A very nice environment with nice food and service.'),
(12, 5, 1, 'After a two-month makeover, the reinvented Bostonian Seafood and Grill has relaunched its space Nestled underground of The Langham, Hong Kong hotel, offering an honest taste of shared dishes and drinks, in a more inspiring urban vibe.'),
(13, 1, 5, 'Went on a rainy afternoon with zero diners, all the better as food was quick! Had the duck and waffle, jumbo French style croissant and two iced drinks.Really enjoyed the croissant item- chunky crayfish and a really generous portion. Crispy fries which was a mountain pile!Good food and drinks! Will definitely be back to try the other items'),
(14, 2, 6, 'Popular matcha soft serve with a defined matcha taste that ends with a soft bitter note. I personally prefer a softserve that is less thick in texture but the taste and the creamy texture is a combination that is easily well liked by many, even if you are not a hard core matcha fan.'),
(15, 3, 6, 'I popped into via Tokyo whilst staying in causeway bay and the ice cream is definitely tasty. I\'m not much of a matcha ice cream can but via Tokyo certainly do the best! seating isn\'t great because the shop is rather small with limited seats but overall a good experience. I wish the black sesame ice cream was displayed on the menu because I didn\'t realise they served it until someone next to me ordered some! '),
(16, 4, 7, 'I was really surprised at first at all the smileys and positive reviews. After trying the burger, have to say it is totally worth the hype. The bun is to die for. Went in during lunchtime on a Monday, was very busy and the place is small and cramped but food is great!! I am definitely bringing a group of friends back to this place sometime on a weekend. Highly recommend the truffle fries and the hamburger with bacon ;)'),
(17, 5, 7, 'Yum yum yum ; these three words conclude my dinner tonight in Burger Joy. '),
(18, 1, 8, 'Came to The Grill Room for the first time. The drinks were above my expectation! Excellent mocktail and milkshake!'),
(19, 2, 8, 'We had the Dinner tonight at a open kitchen restaurant - The Grill Room, be frank, the environment is not that cozy,and so, it means that we should be able to get good value food as money will be spent on food and less on RENT. True, not bad, we like their steak quite a lot, and the dishes presentation were all great... Good for gathering for friends, but may not be ideal for romantic dinner, unless you have already put a ring on your lady . '),
(20, 3, 9, 'The decorations of the place and the ambience were nice. The chicken wings were interesting the rest of the food was just OK.'),
(21, 4, 10, 'Not easy to find Japanese grill in Gordon. The closest location will possibly Mong Kok or Tst. \r\n'),
(22, 5, 10, 'Very enjoyable experience; fast service, very friendly staff. I had the pickle burger - awesome! and I\'ll be coming back to try the other'),
(23, 1, 10, 'I like the Japanese music here，which is fast but not too loud.'),
(24, 2, 11, 'We went there for he lunch and they have good options for set lunch. The food quality is very good for the set lunch price. Definitely recommend it. And I will visit again!'),
(25, 3, 11, 'Introduced by friend and heard the chef here is pretty famous in cooking. The place is in the TST which is not very hard to locate. It is on high level so the view is pretty good for date night. '),
(26, 4, 11, 'The views of this restaurant are quite impressive as you can see the victoria harbour views and the opposite site of the harbour-central of hong kong island .'),
(27, 5, 21, 'Tai O Lookout is one of the best places to enjoy a relaxing afternoon. Enjoying an afternoon tea with the boundaryless seaview could certainly calm your mind. It was full house on the Sunday I went, we\r\nwaited 10 mins to be seated by the window.');

-- --------------------------------------------------------

--
-- 表的结构 `day_plan`
--

CREATE TABLE `day_plan` (
  `plan_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `scenery_1` int(11) NOT NULL,
  `scenery_2` int(11) NOT NULL,
  `restaurant_1` int(11) NOT NULL,
  `restaurant_2` int(11) NOT NULL,
  `hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `day_plan`
--

INSERT INTO `day_plan` (`plan_id`, `day_id`, `scenery_1`, `scenery_2`, `restaurant_1`, `restaurant_2`, `hotel`) VALUES
(4, 1, 1, 2, 1, 2, 1),
(5, 1, 1, 2, 2, 4, 1),
(8, 1, 6, 2, 7, 3, 3),
(8, 2, 1, 4, 2, 1, 0),
(9, 1, 1, 2, 8, 3, 3),
(9, 2, 3, 4, 12, 19, 0),
(9, 3, 5, 6, 1, 2, 0),
(10, 1, 7, 2, 3, 3, 3),
(10, 2, 3, 0, 4, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `following`
--

CREATE TABLE `following` (
  `s_user_id` int(11) NOT NULL,
  `t_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `following`
--

INSERT INTO `following` (`s_user_id`, `t_user_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(3, 4),
(1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `hotel`
--

CREATE TABLE `hotel` (
  `place_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` double(10,4) DEFAULT NULL,
  `longitude` double(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hotel`
--

INSERT INTO `hotel` (`place_id`, `city_id`, `name`, `address`, `website`, `latitude`, `longitude`) VALUES
(1, 1, 'Metropark Hotel Causeway Bay Hong Kong', 'No.148 Tung Lo Wan Road, Causeway Bay, Hong Kong 852, China', 'http://www.metroparkhotelcausewaybay.com/eng/', 22.2813, 114.1922),
(2, 1, 'The Upper House', 'Pacific Place, 88 Queensway, Hong Kong, China', 'http://www.upperhouse.com/en/default', 22.2773, 114.1663),
(3, 1, 'Four Seasons Hotel Hong Kong', 'No.8 Finance Street, Central, Hong Kong, China', 'http://www.fourseasons.com/hongkong/landing_3/?source=tahongkongblhotel', 22.2863, 114.1569),
(4, 1, 'Hotel ICON', 'No.17 Science Museum Road, Tsim Sha Tsui East, Kowloon, Hong Kong, China', 'http://www.hotel-icon.com/', 22.3006, 114.1797),
(5, 1, 'The Ritz-Carlton, Hong Kong', 'International Commerce Center, No.1 Austin Road West, Kowloon, Hong Kong, China', 'http://www.ritzcarlton.com/en/hotels/china/hong-kong?scid=963c9455-b549-4ab9-a2ce-878572f939ad&mid=mid&pid=rccorpta', 22.3035, 114.1602),
(6, 1, 'The Peninsula Hong Kong', 'Salisbury Road, Tsim Sha Tsui | Kowloon, Hong Kong, China', 'http://hongkong.peninsula.com/en/default', 22.2953, 114.1721),
(7, 1, 'The T Hotel', '6th Floor, VTC Pokfulam Complex,145 Pokfulam Road, Hong Kong, China', 'http://www.thotel.edu.hk/', 22.2601, 114.1359),
(8, 1, 'Hullett House', '1881 Heritage, 2A Canton Road, Tsim Sha Tsui, Kowloon, Hong Kong, China', 'https://www.tripadvisor.com/Hotel_Review-g294217-d1776902-Reviews-Hullett_House-Hong_Kong.html', 22.2956, 114.1699),
(9, 1, 'Mandarin Oriental, Hong Kong', 'No.5 Connaught Road, Central, Hong Kong, China', 'http://www.mandarinoriental.com/hongkong/?kw=MOHKG-Business-Listing-Website&htl=MOHKG&eng=TripAdvisor&src=paidlisting', 22.2821, 114.1595),
(10, 1, 'The Landmark Mandarin Oriental, Hong Kong', 'The Landmark, 15 Queen\'s Road Central, Hong Kong, China', 'http://www.mandarinoriental.com/landmark/?kw=LMHKG-Business-Listing-Website&htl=LMHKG&eng=TripAdvisor&src=paidlisting', 22.2807, 114.1578);

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE `notice` (
  `title` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `content` text NOT NULL,
  `noticeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `notice`
--

INSERT INTO `notice` (`title`, `author`, `time`, `content`, `noticeID`) VALUES
('Travel taxes will not be scrapped', 'corner', '2016-11-20 22:09:00', 'Travel taxes will not be scrapped, but the law should be amended to use the entire fund for the construction of tourism-related infrastructure instead of funding educational and cultural projects, the Tourism minister said Saturday.\r\nUnder Republic Act 9593 or the Tourism Act of 1999, 50 percent of the total travel taxes collected will be given to the Tourism Infrastructure and Enterprise Zone Authority (TIEZA), 40 percent to the Commission on Higher Education (CHED), and 10 percent to the National Commission for the Culture and the Arts (NCCA).', 1),
('Workers at Chicagos Hare Airport to Strike Before Thanksgiving', 'laura', '2016-11-19 22:00:00', 'Janitors, baggage handlers, cabin cleaners and wheelchair attendants, who are not unionized but are working with the Service Employees International Union, are seeking a wage of $15 an hour. Some are paid minimum wage, which is $8.25 in Illinois.', 2);

-- --------------------------------------------------------

--
-- 表的结构 `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `days` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_completed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `plan`
--

INSERT INTO `plan` (`plan_id`, `user_id`, `name`, `days`, `time`, `is_completed`) VALUES
(4, 1, 'test', 1, '2016-11-19 08:35:14', 1),
(5, 1, '12334', 1, '2016-11-19 08:41:41', 1),
(8, 1, 'test', 2, '2016-11-20 14:31:24', 0),
(9, 3, 'my plan 1', 3, '2016-11-20 14:55:22', 0),
(10, 1, '123', 2, '2016-11-21 02:37:58', 1);

-- --------------------------------------------------------

--
-- 表的结构 `plan_comment`
--

CREATE TABLE `plan_comment` (
  `comment_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `plan_comment`
--

INSERT INTO `plan_comment` (`comment_id`, `plan_id`, `content`) VALUES
(1, 4, 'abcdetyryurty'),
(2, 5, 'test');

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
(1, 'souniangao@163.com', 'diudiu', '111111', 'Sun Yanchao', 20, '110', b'1'),
(2, '16010899X@connect.polyu.hk', '16010899X', '111111', '16010899X', 0, '0', b'0'),
(3, '1@1', 'first', '111111', '', 0, '', b'0'),
(4, '2@2', 'second', '111111', '', 0, '', b'0'),
(5, '3@3', 'third', '111111', '', 0, '', b'0'),
(6, 'daf@1', 'daf', 'aa', '', 0, '', b'0'),
(7, '4@4', 'fourth', '111111', '', 12, '15680801690', b'0');

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 8);

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
-- Indexes for table `day_plan`
--
ALTER TABLE `day_plan`
  ADD PRIMARY KEY (`plan_id`,`day_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`noticeID`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `plan_comment`
--
ALTER TABLE `plan_comment`
  ADD PRIMARY KEY (`comment_id`);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用表AUTO_INCREMENT `hotel`
--
ALTER TABLE `hotel`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `noticeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `plan_comment`
--
ALTER TABLE `plan_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `scenery`
--
ALTER TABLE `scenery`
  MODIFY `scenery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
