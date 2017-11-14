/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : tourism_syc_1111

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-11-21 11:34:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` double(10,4) DEFAULT NULL,
  `longitude` double(10,4) DEFAULT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES ('1', '1', 'Metropark Hotel Causeway Bay Hong Kong', 'No.148 Tung Lo Wan Road, Causeway Bay, Hong Kong 852, China', 'http://www.metroparkhotelcausewaybay.com/eng/', '22.2813', '114.1922');
INSERT INTO `hotel` VALUES ('2', '1', 'The Upper House', 'Pacific Place, 88 Queensway, Hong Kong, China', 'http://www.upperhouse.com/en/default', '22.2773', '114.1663');
INSERT INTO `hotel` VALUES ('3', '1', 'Four Seasons Hotel Hong Kong', 'No.8 Finance Street, Central, Hong Kong, China', 'http://www.fourseasons.com/hongkong/landing_3/?source=tahongkongblhotel', '22.2863', '114.1569');
INSERT INTO `hotel` VALUES ('4', '1', 'Hotel ICON', 'No.17 Science Museum Road, Tsim Sha Tsui East, Kowloon, Hong Kong, China', 'http://www.hotel-icon.com/', '22.3006', '114.1797');
INSERT INTO `hotel` VALUES ('5', '1', 'The Ritz-Carlton, Hong Kong', 'International Commerce Center, No.1 Austin Road West, Kowloon, Hong Kong, China', 'http://www.ritzcarlton.com/en/hotels/china/hong-kong?scid=963c9455-b549-4ab9-a2ce-878572f939ad&mid=mid&pid=rccorpta', '22.3035', '114.1602');
INSERT INTO `hotel` VALUES ('6', '1', 'The Peninsula Hong Kong', 'Salisbury Road, Tsim Sha Tsui | Kowloon, Hong Kong, China', 'http://hongkong.peninsula.com/en/default', '22.2953', '114.1721');
INSERT INTO `hotel` VALUES ('7', '1', 'The T Hotel', '6th Floor, VTC Pokfulam Complex,145 Pokfulam Road, Hong Kong, China', 'http://www.thotel.edu.hk/', '22.2601', '114.1359');
INSERT INTO `hotel` VALUES ('8', '1', 'Hullett House', '1881 Heritage, 2A Canton Road, Tsim Sha Tsui, Kowloon, Hong Kong, China', 'https://www.tripadvisor.com/Hotel_Review-g294217-d1776902-Reviews-Hullett_House-Hong_Kong.html', '22.2956', '114.1699');
INSERT INTO `hotel` VALUES ('9', '1', 'Mandarin Oriental, Hong Kong', 'No.5 Connaught Road, Central, Hong Kong, China', 'http://www.mandarinoriental.com/hongkong/?kw=MOHKG-Business-Listing-Website&htl=MOHKG&eng=TripAdvisor&src=paidlisting', '22.2821', '114.1595');
INSERT INTO `hotel` VALUES ('10', '1', 'The Landmark Mandarin Oriental, Hong Kong', 'The Landmark, 15 Queen\'s Road Central, Hong Kong, China', 'http://www.mandarinoriental.com/landmark/?kw=LMHKG-Business-Listing-Website&htl=LMHKG&eng=TripAdvisor&src=paidlisting', '22.2807', '114.1578');
