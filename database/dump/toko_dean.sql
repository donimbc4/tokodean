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

 Date: 18/04/2021 20:05:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_category
-- ----------------------------
DROP TABLE IF EXISTS `m_category`;
CREATE TABLE `m_category`  (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated _by` int(11) NULL DEFAULT NULL,
  `update_at` datetime(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_category
-- ----------------------------
INSERT INTO `m_category` VALUES (1, 'TSHIRT', 1, 1, '2021-04-18 18:30:56', NULL, NULL);
INSERT INTO `m_category` VALUES (2, 'PANTS', 1, 1, '2021-04-18 18:33:05', NULL, NULL);
INSERT INTO `m_category` VALUES (3, 'SHOES', 1, 0, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `m_category` VALUES (4, 'JACKET', 1, 1, '2021-04-18 18:33:58', NULL, NULL);
INSERT INTO `m_category` VALUES (5, 'HAT', 1, 1, '2021-04-18 18:34:00', NULL, NULL);
INSERT INTO `m_category` VALUES (6, 'KIDS', 1, 1, '2021-04-18 18:39:27', NULL, NULL);

-- ----------------------------
-- Table structure for m_product
-- ----------------------------
DROP TABLE IF EXISTS `m_product`;
CREATE TABLE `m_product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `describtion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10, 0) NOT NULL,
  `size` int(11) NOT NULL,
  `color` tinyint(2) NOT NULL,
  `flag_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
