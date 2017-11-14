/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : tourism_syc_1111

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-11-21 11:34:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '2', 'I fell in love with the place when it just opened where the young owners were there pretty hands on. You could hear the patty sizzling away. Now that it has gone franchise, I found the service less personal and the taste not as good as it was. It was not awful but no longer something I got super excited about. Probably will still go when I have a craving though.');
INSERT INTO `comment` VALUES ('2', '2', '2', 'This is my first time dining at this burger place. Technically it\'s more like a self-serve fast food stall that you have to purchase food at the cashier then they\'ll deliver your order to your table. The atmosphere is not bad, but the rooms between tables are too tight that you can hear other people\'s talks. So disappointed with the food there, the buns were cold, the patty is warm outside but cold inside... not appealing at all... suspect they pre cooked all the patties in advance  also, the hot drink i ordered was luke warm which feels like it had been sitting around for half an hour before it was served... Won\'t go back to this place again ');
INSERT INTO `comment` VALUES ('3', '3', '2', 'Good ol\' juicy burger but could be better. First, the chips were standard crispy but bland. The burger should be the hero but what\'s Batman without an equally good Robin? Second, the foie gras costed more than the whole burger! A burger costed about $70 but add a foie gras and it became $150. Not worth the money in my opinion. Since the burger was already juicy enough, the richness of the foie gras had no added value. If there\'s a second chance, I would just order the normal burger, order sides that I hope is more satisfying than ordinary chips.');
INSERT INTO `comment` VALUES ('4', '5', '3', 'Came here on a Saturday night and was about a 20minute wait outside. They don\'t give out numbers, so if you step out of line, you may just lose your spot. ');
INSERT INTO `comment` VALUES ('5', '4', '3', 'People always say that girls have got another \"stomach\" for desserts even after stuffing ourselves with a full meal. To me, it\'s never a complete meal without desserts!I\'ve heard much about this dessert place and decided to drop by for desserts after dinner nearby. The queue was pretty long even for a weekday night so it got my friend and I anticipating the food much haha.');
INSERT INTO `comment` VALUES ('6', '3', '4', ' It\'s been a while since I last visited HeSheEat Café, one of my favorite places for comfort food so while I was in Causeway Bay this afternoon, I decided to drop by for a quick one before starting my shopping spree. ');
INSERT INTO `comment` VALUES ('7', '2', '4', 'Arrived at 930pm, 2nd in the queue\r\nI ordered my favourite green tea lava cake on each visit\r\nI couldn\'t believe my eyes when it arrived... it looked plastic. It\'s doesn\'t appear n taste NOT like how it used to be.\r\nHesheeat has gone downhill. My iced coconut latte lacks coconut & coffee flavour. It\'s like having 糖水\r\nI won\'t be going back there again');
INSERT INTO `comment` VALUES ('8', '1', '4', '30/10 This restaurant does not take bookings which was good as for Friday evening trying to find a place to eat at 7pm was hard. I didn\'t have to wait long till I got a table. The restaurant itself is quite small and seating was a little crammed but afterall it\'s about the food and not the seating but seating and environment is very important. The food can served pretty quick. ');
INSERT INTO `comment` VALUES ('9', '2', '1', 'While 2016 has been a boring year for restaurant openings, it\'s the year of re-branding and makeover. Recently, we saw Riva and The Deck successfully transformed into Skye rooftop bar at Park Lane Hotel and Blue Butcher now officially \"Blue - Butcher and Meat Specialist\". Even Bostonian, the decade-old surf-and-turf resto at Langham Hotel, decided it was time for a facelift.');
INSERT INTO `comment` VALUES ('10', '3', '1', 'I like the decorations,just make me feel different worldFood is very good and dessert is exceptional');
INSERT INTO `comment` VALUES ('11', '4', '1', 'A very nice environment with nice food and service.');
INSERT INTO `comment` VALUES ('12', '5', '1', 'After a two-month makeover, the reinvented Bostonian Seafood and Grill has relaunched its space Nestled underground of The Langham, Hong Kong hotel, offering an honest taste of shared dishes and drinks, in a more inspiring urban vibe.');
INSERT INTO `comment` VALUES ('13', '1', '5', 'Went on a rainy afternoon with zero diners, all the better as food was quick! Had the duck and waffle, jumbo French style croissant and two iced drinks.Really enjoyed the croissant item- chunky crayfish and a really generous portion. Crispy fries which was a mountain pile!Good food and drinks! Will definitely be back to try the other items');
INSERT INTO `comment` VALUES ('14', '2', '6', 'Popular matcha soft serve with a defined matcha taste that ends with a soft bitter note. I personally prefer a softserve that is less thick in texture but the taste and the creamy texture is a combination that is easily well liked by many, even if you are not a hard core matcha fan.');
INSERT INTO `comment` VALUES ('15', '3', '6', 'I popped into via Tokyo whilst staying in causeway bay and the ice cream is definitely tasty. I\'m not much of a matcha ice cream can but via Tokyo certainly do the best! seating isn\'t great because the shop is rather small with limited seats but overall a good experience. I wish the black sesame ice cream was displayed on the menu because I didn\'t realise they served it until someone next to me ordered some! ');
INSERT INTO `comment` VALUES ('16', '4', '7', 'I was really surprised at first at all the smileys and positive reviews. After trying the burger, have to say it is totally worth the hype. The bun is to die for. Went in during lunchtime on a Monday, was very busy and the place is small and cramped but food is great!! I am definitely bringing a group of friends back to this place sometime on a weekend. Highly recommend the truffle fries and the hamburger with bacon ;)');
INSERT INTO `comment` VALUES ('17', '5', '7', 'Yum yum yum ; these three words conclude my dinner tonight in Burger Joy. ');
INSERT INTO `comment` VALUES ('18', '1', '8', 'Came to The Grill Room for the first time. The drinks were above my expectation! Excellent mocktail and milkshake!');
INSERT INTO `comment` VALUES ('19', '2', '8', 'We had the Dinner tonight at a open kitchen restaurant - The Grill Room, be frank, the environment is not that cozy,and so, it means that we should be able to get good value food as money will be spent on food and less on RENT. True, not bad, we like their steak quite a lot, and the dishes presentation were all great... Good for gathering for friends, but may not be ideal for romantic dinner, unless you have already put a ring on your lady . ');
INSERT INTO `comment` VALUES ('20', '3', '9', 'The decorations of the place and the ambience were nice. The chicken wings were interesting the rest of the food was just OK.');
INSERT INTO `comment` VALUES ('21', '4', '10', 'Not easy to find Japanese grill in Gordon. The closest location will possibly Mong Kok or Tst. \r\n');
INSERT INTO `comment` VALUES ('22', '5', '10', 'Very enjoyable experience; fast service, very friendly staff. I had the pickle burger - awesome! and I\'ll be coming back to try the other');
INSERT INTO `comment` VALUES ('23', '1', '10', 'I like the Japanese music here，which is fast but not too loud.');
INSERT INTO `comment` VALUES ('24', '2', '11', 'We went there for he lunch and they have good options for set lunch. The food quality is very good for the set lunch price. Definitely recommend it. And I will visit again!');
INSERT INTO `comment` VALUES ('25', '3', '11', 'Introduced by friend and heard the chef here is pretty famous in cooking. The place is in the TST which is not very hard to locate. It is on high level so the view is pretty good for date night. ');
INSERT INTO `comment` VALUES ('26', '4', '11', 'The views of this restaurant are quite impressive as you can see the victoria harbour views and the opposite site of the harbour-central of hong kong island .');
INSERT INTO `comment` VALUES ('27', '5', '21', 'Tai O Lookout is one of the best places to enjoy a relaxing afternoon. Enjoying an afternoon tea with the boundaryless seaview could certainly calm your mind. It was full house on the Sunday I went, we\r\nwaited 10 mins to be seated by the window.');
