/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : crud

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 18/06/2020 10:23:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `queue` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_06_18_054903_create_model_plans_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_06_18_055305_create_model_plan_users_table', 1);

-- ----------------------------
-- Table structure for plans
-- ----------------------------
DROP TABLE IF EXISTS `plans`;
CREATE TABLE `plans`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plano` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mensalidade` double NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plans
-- ----------------------------
INSERT INTO `plans` VALUES (1, 'Free', 0, NULL, NULL);
INSERT INTO `plans` VALUES (2, 'Basic', 100, NULL, NULL);
INSERT INTO `plans` VALUES (3, 'Plus', 187, NULL, NULL);

-- ----------------------------
-- Table structure for planusers
-- ----------------------------
DROP TABLE IF EXISTS `planusers`;
CREATE TABLE `planusers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of planusers
-- ----------------------------
INSERT INTO `planusers` VALUES (1, 1, 1, NULL, NULL);
INSERT INTO `planusers` VALUES (2, 1, 2, NULL, NULL);
INSERT INTO `planusers` VALUES (3, 2, 2, NULL, NULL);
INSERT INTO `planusers` VALUES (6, 4, 1, NULL, NULL);
INSERT INTO `planusers` VALUES (7, 5, 1, NULL, NULL);
INSERT INTO `planusers` VALUES (8, 5, 2, NULL, NULL);
INSERT INTO `planusers` VALUES (9, 5, 3, NULL, NULL);
INSERT INTO `planusers` VALUES (15, 3, 1, '2020-06-18 11:22:41', '2020-06-18 11:22:41');
INSERT INTO `planusers` VALUES (16, 3, 3, '2020-06-18 11:22:41', '2020-06-18 11:22:41');
INSERT INTO `planusers` VALUES (21, 30, 1, '2020-06-18 11:23:05', '2020-06-18 11:23:05');
INSERT INTO `planusers` VALUES (22, 30, 3, '2020-06-18 11:23:05', '2020-06-18 11:23:05');
INSERT INTO `planusers` VALUES (24, 6, 1, '2020-06-18 12:14:06', '2020-06-18 12:14:06');
INSERT INTO `planusers` VALUES (25, 6, 3, '2020-06-18 12:14:06', '2020-06-18 12:14:06');
INSERT INTO `planusers` VALUES (26, 29, 1, '2020-06-18 12:19:27', '2020-06-18 12:19:27');
INSERT INTO `planusers` VALUES (27, 29, 2, '2020-06-18 12:19:27', '2020-06-18 12:19:27');
INSERT INTO `planusers` VALUES (28, 29, 3, '2020-06-18 12:19:27', '2020-06-18 12:19:27');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefone` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cidade` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nascimento` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Claudianus Boast', 'cboast0@fastcompany.com', '(19) 957645371', 'São Paulo', 'Araraquara', '1993-06-07 04:03:57', NULL, NULL);
INSERT INTO `users` VALUES (2, 'Loni Jennions', 'ljennions1@va.gov', '(19) 905613161', 'São Paulo', 'Limeira', '1985-05-09 00:00:00', NULL, NULL);
INSERT INTO `users` VALUES (3, 'Margi Gilhouley', 'mgilhouley2@telegraph.co.uk', '(19) 966290104', 'São Paulo', 'Araraquara', '2020-06-18 00:00:00', NULL, '2020-06-18 11:22:41');
INSERT INTO `users` VALUES (4, 'Lexy Sprulls', 'lsprulls3@moonfruit.com', '(19) 976121601', 'São Paulo', 'Rio Claro', '2020-06-18 04:53:36', NULL, NULL);
INSERT INTO `users` VALUES (5, 'Marie Shatliff', 'mshatliff4@cbslocal.com', '(19) 991376354', 'São Paulo', 'Rio Claro', '2020-06-18 04:53:37', NULL, NULL);
INSERT INTO `users` VALUES (6, 'Graig Mouncey', 'gmouncey5@so-net.ne.jp', '(19) 941806149', 'São Paulo', 'Araraquara', '1990-03-27 00:00:00', NULL, '2020-06-18 12:14:06');
INSERT INTO `users` VALUES (29, 'Laurice Liger', 'lliger0@php.net', '(35) 971740954', 'Minas Gerais', 'Areado', '1992-10-25 00:00:00', '2020-06-18 10:12:36', '2020-06-18 12:19:27');

SET FOREIGN_KEY_CHECKS = 1;
