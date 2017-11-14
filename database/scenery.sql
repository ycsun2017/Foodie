/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : tourism_syc_1111

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-11-20 14:09:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for scenery
-- ----------------------------
DROP TABLE IF EXISTS `scenery`;
CREATE TABLE `scenery` (
  `scenery_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `latitude` decimal(10,4) DEFAULT NULL,
  `longitude` decimal(10,4) DEFAULT NULL,
  PRIMARY KEY (`scenery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of scenery
-- ----------------------------
INSERT INTO `scenery` VALUES ('1', 'Victoria Harbour', '1', '0', '344-352 Reclamation Street, 344-352 Reclamation Street, Hong Kong', '22.2937', '114.1740');
INSERT INTO `scenery` VALUES ('2', 'Ocean Park', '1', '320', 'Hong Kong Island Wong Chuk Hang Nam Long Shan Aberdeen Ocean Park Road', '22.2467', '114.1757');
INSERT INTO `scenery` VALUES ('3', 'Disneyland', '1', '450', 'Disneyland Resort, Lantau Island, Hong Kong', '22.3130', '114.0413');
INSERT INTO `scenery` VALUES ('4', 'Madame Tussauds', '1', '225', 'P101, The Peak Tower, 128 Peak Road, Hong Kong', '22.2712', '114.1499');
INSERT INTO `scenery` VALUES ('5', 'Victoria Peak', '1', '0', '118 Peak Road, Hong Kong Island', '22.2758', '114.1455');
INSERT INTO `scenery` VALUES ('6', 'Central', '1', '0', 'Hong Kong Central & Western District', '22.2799', '114.1587');
INSERT INTO `scenery` VALUES ('7', 'Repulse Bay', '1', '0', 'South of Hong Kong Island', '22.2366', '114.1961');
INSERT INTO `scenery` VALUES ('8', 'Golden Bauhinia Square', '1', '0', 'Hong Kong Convention and Exhibition Center, 1 Expo Drive, Wan Chai, Hong Kong', '22.2844', '113.9412');
INSERT INTO `scenery` VALUES ('9', 'Lantau Island', '1', '0', 'Tsuen Wan District, Hong Kong', '22.2665', '113.9410');
INSERT INTO `scenery` VALUES ('10', 'Mong Kok', '1', '0', 'North end of Nathan Road, Hong Kong', '22.3203', '114.1694');
INSERT INTO `scenery` VALUES ('11', 'Statue of Liberty', '2', '12', 'Liberty Island, 10004 New York Harbor', '40.6893', '-74.0439');
INSERT INTO `scenery` VALUES ('12', 'Wall Street', '2', '0', '40 Wall Street New York, NY 10005', '40.7061', '-74.0088');
INSERT INTO `scenery` VALUES ('13', 'Metropolitan Museum of Art', '2', '25', '1000 5th Avenue New York, NY 10028', '40.7794', '-73.9630');
INSERT INTO `scenery` VALUES ('14', 'Central Park', '2', '0', 'Fifth avenue and 64th street corner', '40.7829', '-73.9655');
INSERT INTO `scenery` VALUES ('15', 'Broadway', '2', '0', 'Broadway', '41.1118', '-73.8583');
INSERT INTO `scenery` VALUES ('16', 'Times Square\r\n', '2', '0', 'Broadway, New York City, NY 10036 (Manhattan)', '40.7589', '-73.9848');
INSERT INTO `scenery` VALUES ('17', 'Empire State Building', '2', '25', '350 Fifth Avenue, Between 33rd and 34th Streets, New York City, NY 10118 (Midtown)', '40.7484', '-73.9849');
INSERT INTO `scenery` VALUES ('18', 'Colambia University', '2', '0', '116th Street, New York City, NY 10027 (Manhattan)', '40.8076', '-73.9624');
INSERT INTO `scenery` VALUES ('19', 'Museum of Natural History', '2', '0', '79th Street and Central Park West, New York City, NY 10024 (Midtown, Upper West Side)', '40.7813', '-73.9738');
INSERT INTO `scenery` VALUES ('20', 'New York University', '2', '0', '70 Washington Square South, New York City, NY (Greenwich Village)', '40.7296', '-73.9964');
INSERT INTO `scenery` VALUES ('21', 'Forbidden City', '3', '60', 'No.4 Jingshanqian Street, Dongcheng District', '39.9164', '116.3974');
INSERT INTO `scenery` VALUES ('22', 'Summer Palace', '3', '30', 'Haidian District, Beijing New Gongmen Road on the 19th', '39.9999', '116.2755');
INSERT INTO `scenery` VALUES ('23', 'Badaling Great Wall', '3', '40', 'Yanqing County, Beijing Junduigou Road north exit', '40.3597', '116.0205');
INSERT INTO `scenery` VALUES ('24', 'Ti\'anmen Square', '3', '0', 'North of Tiananmen Square, Dongcheng District, Beijing', '39.9055', '116.3978');
INSERT INTO `scenery` VALUES ('25', 'Bird\'s Nest', '3', '50', '\r\nAnding Road, Chaoyang District, Beijing on the 3rd', '39.9928', '116.3963');
INSERT INTO `scenery` VALUES ('26', 'Hou Hai', '3', '0', 'Beijing Xicheng District', '39.9450', '116.3817');
INSERT INTO `scenery` VALUES ('27', 'Peking University', '3', '0', 'No.5, Summer Palace Road, Haidian District, Beijing', '39.9885', '116.3088');
INSERT INTO `scenery` VALUES ('28', 'Tiantan Park', '3', '15', 'Dongcheng District, Beijing', '39.8837', '116.4130');
INSERT INTO `scenery` VALUES ('29', 'Nanluoguxiang', '3', '0', 'Dongcheng District, Beijing', '39.9373', '116.4032');
INSERT INTO `scenery` VALUES ('30', 'Xiangshan Park', '3', '10', 'Haidian District, Beijing', '39.9924', '116.1872');
INSERT INTO `scenery` VALUES ('31', 'The Bund', '4', '0', 'Shanghai Huangpu District', '31.2393', '121.4898');
INSERT INTO `scenery` VALUES ('32', 'Pearl of the Orient', '4', '150', 'Shanghai Huangpu River Bank', '31.2399', '121.4997');
INSERT INTO `scenery` VALUES ('33', 'Old Town God Temple', '4', '10', 'Shanghai Huangpu District', '31.2294', '121.4933');
INSERT INTO `scenery` VALUES ('34', 'Nanjing Road', '4', '0', 'Shanghai Huangpu District', '31.2348', '121.4751');
INSERT INTO `scenery` VALUES ('35', 'Shanghai Science center', '4', '60', '2000, Century Avenue, Pudong New Area, Shanghai ', '31.2179', '121.5416');
INSERT INTO `scenery` VALUES ('36', 'Thames Township', '4', '0', 'Songjiang District of Shanghai', '31.0920', '121.1991');
INSERT INTO `scenery` VALUES ('37', 'Happy Valley', '4', '200', 'Songjiang District of Shanghai', '31.0955', '121.2154');
INSERT INTO `scenery` VALUES ('38', 'Fudan University', '4', '0', 'Shanghai Yangpu District', '31.2965', '121.5046');
INSERT INTO `scenery` VALUES ('39', 'Shanghai Zoo', '4', '40', '2381 Hongqiao Road, Changning District, Shanghai', '31.1930', '121.3630');
INSERT INTO `scenery` VALUES ('40', 'Madame Tussauds', '4', '150', 'New World Commercial Building, 2-68 Nanjing West Road, Huangpu District, Shanghai', '31.2347', '121.4741');
