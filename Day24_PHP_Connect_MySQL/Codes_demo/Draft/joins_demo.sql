/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : joins

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 04/12/2020 09:42:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên danh mục',
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0) COMMENT 'Ngày tạo danh mục, tự động sinh',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'id = 1, Danh mục Tivi', '2020-12-04 09:08:21');
INSERT INTO `categories` VALUES (2, 'id = 2, Danh mục Tủ lạnh', '2020-12-02 09:08:28');
INSERT INTO `categories` VALUES (3, 'id = 3, Danh mục Điều hòa', '2020-12-30 09:08:32');
INSERT INTO `categories` VALUES (4, 'id = 4, Danh mục Laptop', '2020-12-08 09:08:34');
INSERT INTO `categories` VALUES (5, 'id = 5, Danh mục Điện thoại', '2020-12-08 09:08:36');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa chinh',
  `category_id` int(11) NULL DEFAULT NULL COMMENT 'Khoái ngoại, liên kết với bảng categories',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên sản phẩm',
  `price` int(11) NULL DEFAULT NULL COMMENT 'Giá sản phẩm',
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0) COMMENT 'Ngày tạo sản phẩm, tự động sinh',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 1, 'id=1, Tivi Samsung', 1000, '2020-12-04 09:16:37');
INSERT INTO `products` VALUES (2, 1, 'id=2, Tivi Toshiba', 2000, '2020-12-04 09:16:54');
INSERT INTO `products` VALUES (3, 2, 'id=3, Tủ lạnh Samsung', 11111, '2020-12-04 09:16:56');
INSERT INTO `products` VALUES (4, 2, 'id=4, Tủ lạnh Toshiba', 2222, '2020-12-04 09:19:01');
INSERT INTO `products` VALUES (5, 4, 'id=5, Laptop Asus', 3333, '2020-12-04 09:19:34');
INSERT INTO `products` VALUES (6, 4, 'id=6, Laptop Toshiba', 4444, '2020-12-04 09:19:49');
INSERT INTO `products` VALUES (7, 4, 'id=7, Laptop Dell', 5555, '2020-12-04 09:20:13');
INSERT INTO `products` VALUES (8, NULL, 'id=8, Sản phẩm ko gắn với danh mục nào', 6666, '2020-12-04 09:28:02');

SET FOREIGN_KEY_CHECKS = 1;
