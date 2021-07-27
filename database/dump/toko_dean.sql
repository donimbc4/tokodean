/*
 Navicat Premium Data Transfer

 Source Server         : localhostMYSQL
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : toko_dean

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 27/07/2021 20:15:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_banner
-- ----------------------------
DROP TABLE IF EXISTS `m_banner`;
CREATE TABLE `m_banner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_banner
-- ----------------------------
INSERT INTO `m_banner` VALUES (3, 'Javascript Banner', 'storage/banner/TrndUTfXN6YR0ukZxu28.jpeg', 1, 1, '2021-04-28 19:15:18', NULL, NULL);
INSERT INTO `m_banner` VALUES (4, 'Test Banner', 'storage/banner/xxTf1sjb8hXcbACpsBa9.jpeg', 1, 1, '2021-04-28 19:21:26', 1, '2021-04-28 20:49:07');

-- ----------------------------
-- Table structure for m_category_products
-- ----------------------------
DROP TABLE IF EXISTS `m_category_products`;
CREATE TABLE `m_category_products`  (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_category_products
-- ----------------------------
INSERT INTO `m_category_products` VALUES (1, 'TSHIRT', 'tshirt', 'storage/categoryProduct/qz15IgJHk7ylLjLV7FB5.jpeg', 1, 1, '2021-04-18 18:30:56', 1, '2021-05-16 14:41:02');
INSERT INTO `m_category_products` VALUES (2, 'PANTS', 'pants', 'storage/categoryProduct/qz15IgJHk7ylLjLV7FB5.jpeg', 1, 1, '2021-04-18 18:33:05', 1, '2021-05-16 14:41:17');
INSERT INTO `m_category_products` VALUES (3, 'SHOES', 'shoes', 'storage/categoryProduct/qz15IgJHk7ylLjLV7FB5.jpeg', 1, 0, '0000-00-00 00:00:00', 1, '2021-05-16 14:41:19');
INSERT INTO `m_category_products` VALUES (4, 'JACKET', 'jacket', 'storage/categoryProduct/qz15IgJHk7ylLjLV7FB5.jpeg', 1, 1, '2021-04-18 18:33:58', 1, '2021-05-16 14:41:20');
INSERT INTO `m_category_products` VALUES (5, 'HAT', 'hat', 'storage/categoryProduct/qz15IgJHk7ylLjLV7FB5.jpeg', 1, 1, '2021-04-18 18:34:00', 1, '2021-05-16 14:41:22');
INSERT INTO `m_category_products` VALUES (6, 'KIDS', 'kids', 'storage/categoryProduct/qz15IgJHk7ylLjLV7FB5.jpeg', 1, 1, '2021-04-18 18:39:27', 1, '2021-05-16 14:41:23');

-- ----------------------------
-- Table structure for m_product
-- ----------------------------
DROP TABLE IF EXISTS `m_product`;
CREATE TABLE `m_product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_product_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10, 0) NOT NULL,
  `size` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_product
-- ----------------------------
INSERT INTO `m_product` VALUES (1, 'Product Test A', 'product-test-a', 3, 'Agus Test 26 April 2021 Update', 150000000, '32', 'Black', 'storage/products/z36yvPeNoZrmY7M5019X.jpeg', 1, 1, '2021-04-26 20:26:24', 1, '2021-05-16 14:42:45');
INSERT INTO `m_product` VALUES (2, 'Kerudung Hitam', 'kerudung-hitam', 1, 'Kerudung Hitam Canggih Ada AC', 100000, 'M', 'Black', 'storage/products/z36yvPeNoZrmY7M5019X.jpeg', 1, 1, '2021-05-16 00:22:57', 1, '2021-05-16 14:42:47');
INSERT INTO `m_product` VALUES (3, 'Kerudung Putih', 'kerudung-putih', 1, 'Kerudung Putih Nih', 80000, 'S', 'Black', 'storage/products/P8txe8G3dWiyEO4s8VS0.jpeg', 1, 1, '2021-05-16 00:24:06', 1, '2021-05-16 14:42:49');
INSERT INTO `m_product` VALUES (4, 'Gelas Foto', 'gelas-foto', 3, 'Gelas Foto Hotel', 150000, 'M', 'White', 'storage/products/jjijCxNEtO0k1qXO3Fmd.jpeg', 1, 1, '2021-05-16 00:24:50', 1, '2021-05-16 14:42:50');

-- ----------------------------
-- Table structure for m_product_photo
-- ----------------------------
DROP TABLE IF EXISTS `m_product_photo`;
CREATE TABLE `m_product_photo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Doni.fahrezi', 'Doni Fahrezi', 'doni.fahrezi@tokodean.com', '2021-04-18 20:00:16', '$2y$10$HYVuG/sNCOrz.8flp68U/uRIUcteG2X5HhNlMvaXgNvw.8BR6592m', NULL, '2021-04-18 19:48:50', '2021-04-18 19:48:50');

SET FOREIGN_KEY_CHECKS = 1;
