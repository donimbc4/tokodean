/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : toko_dean

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 18/08/2021 10:48:02
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for m_category_products
-- ----------------------------
DROP TABLE IF EXISTS `m_category_products`;
CREATE TABLE `m_category_products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_category_products
-- ----------------------------
INSERT INTO `m_category_products` VALUES (1, 'Pants', 'pants', 'storage/categoryProduct/BljP7nF7z71fo3LZVawp.jpeg', 1, 1, '2021-07-27 20:43:47', 1, '2021-07-27 20:46:54');
INSERT INTO `m_category_products` VALUES (2, 'T-Shirt', 't-shirt', 'storage/categoryProduct/lgmDo4ZuAP8glzsJpc0h.jpeg', 1, 1, '2021-07-27 20:49:34', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_product
-- ----------------------------
INSERT INTO `m_product` VALUES (3, 'Celana Knight Blue Ankle TR', 'celana-knight-blue-ankle-tr', 1, 'It’s Knight Blue Ankle Pants that everyone should know and love about. Made by the finest solid polyester tetoron rayon, it’s perfect for your daily commute! Grab one (or two or more!) and tell others how comfort and great this pant is', 379000, 'L', 'Blue', 'storage/products/kdQVGS4FCXhHmNZsE0re.jpeg', 1, 1, '2021-07-27 21:00:01', NULL, NULL);

-- ----------------------------
-- Table structure for m_product_photo
-- ----------------------------
DROP TABLE IF EXISTS `m_product_photo`;
CREATE TABLE `m_product_photo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `flag_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_product_photo
-- ----------------------------
INSERT INTO `m_product_photo` VALUES (1, 3, 'storage/products/3/UNFP1tpA0bWAlMSZRgvVQDFNYdUgWpoBRoy8tjnn.jpg', 1, 1, '2021-07-27 21:00:01', NULL, NULL);
INSERT INTO `m_product_photo` VALUES (2, 3, 'storage/products/3/e59OnlkkneIaXOnJ8TQql75XzttHy7qdLnjvD43F.jpg', 1, 1, '2021-07-27 21:00:01', NULL, NULL);
INSERT INTO `m_product_photo` VALUES (3, 3, 'storage/products/3/sgaBBJgn14LpfTUOGc5XmXMbJD9cY1v1mrF7Y9XL.jpg', 1, 1, '2021-07-27 21:00:01', NULL, NULL);
INSERT INTO `m_product_photo` VALUES (4, 3, 'storage/products/3/xndB28Wt979sXsjEAT0Bao3vSIPjyjmbe49rPQ4P.jpg', 1, 1, '2021-07-27 21:00:01', NULL, NULL);

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
-- Table structure for trans_d_order_product
-- ----------------------------
DROP TABLE IF EXISTS `trans_d_order_product`;
CREATE TABLE `trans_d_order_product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_h_order` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trans_h_order
-- ----------------------------
DROP TABLE IF EXISTS `trans_h_order`;
CREATE TABLE `trans_h_order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` date NOT NULL,
  `customer_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_adress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_phone_number` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `flag_order` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
