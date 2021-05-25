/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : php1220e2_pdo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-05-11 21:45:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'abc', '1000', '2021-05-11 20:42:36');
INSERT INTO `products` VALUES ('2', 'abc', '1000', '2021-05-11 20:43:39');
INSERT INTO `products` VALUES ('3', 'Iphone X', '1000', '2021-05-11 20:43:40');
INSERT INTO `products` VALUES ('4', 'Iphone X', '1000', '2021-05-11 20:43:40');
INSERT INTO `products` VALUES ('5', 'Iphone X', '1000', '2021-05-11 20:43:41');
INSERT INTO `products` VALUES ('6', 'Iphone X', '1000', '2021-05-11 21:14:41');
