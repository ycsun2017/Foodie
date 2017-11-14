/*
Navicat MySQL Data Transfer

Source Server         : corner
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : dbproject

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2016-11-21 01:43:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `title` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `content` text NOT NULL,
  `noticeID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`noticeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('Travel taxes will not be scrapped', 'corner', '2016-11-20 22:09:00', 'Travel taxes will not be scrapped, but the law should be amended to use the entire fund for the construction of tourism-related infrastructure instead of funding educational and cultural projects, the Tourism minister said Saturday.\r\nUnder Republic Act 9593 or the Tourism Act of 1999, 50 percent of the total travel taxes collected will be given to the Tourism Infrastructure and Enterprise Zone Authority (TIEZA), 40 percent to the Commission on Higher Education (CHED), and 10 percent to the National Commission for the Culture and the Arts (NCCA).', '1');
INSERT INTO `notice` VALUES ('Workers at Chicagos Hare Airport to Strike Before Thanksgiving', 'laura', '2016-11-19 22:00:00', 'Janitors, baggage handlers, cabin cleaners and wheelchair attendants, who are not unionized but are working with the Service Employees International Union, are seeking a wage of $15 an hour. Some are paid minimum wage, which is $8.25 in Illinois.', '2');
