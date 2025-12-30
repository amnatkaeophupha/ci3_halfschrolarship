/*
 Navicat Premium Data Transfer

 Source Server         : wampp
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : ci_halfschrolarship

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 30/12/2025 14:19:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for applicant
-- ----------------------------
DROP TABLE IF EXISTS `applicant`;
CREATE TABLE `applicant`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `school_province` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birth_day` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birth_month` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birth_year` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cid` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ethnicity` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nationality` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `religion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_moo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_soi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_road` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_subdistrict` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_district` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_province` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_zipcode` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `education_level` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gpa` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fac_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `family_income` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `special_ability` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `achievements` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_cid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_transcript` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_portfolio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of applicant
-- ----------------------------
INSERT INTO `applicant` VALUES (4, 'สาธิตมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา', '14', 'นายอำนาจ  แก้วภูผา', '6', '6', '2013', '1234567890123', 'ไทย', 'ไทย', 'พุทธ', '7/1', '6', '-', '-', '140103', '1401', '14', '13000', '0818535021', 'ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)', '3.99', NULL, '3206', '8000', 'ตกปลา', 'นอน', '4_cid.pdf', '4_transcript.pdf', '4_portfolio.pdf', '2025-12-26 12:37:24');
INSERT INTO `applicant` VALUES (5, 'สาธิตมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา', '80', 'นายอำนาจ  แก้วภูผา', '6', '6', '2025', '0123456789123', 'ไทย', 'ไทย', 'พุทธ', '7/1', '6', '-', '-', '140115', '1401', '14', '13000', '0818535021', 'มัธยมศึกษาตอนปลาย', '4.00', NULL, '4271', '8000', 'ตกปลา', 'นอน', '5_cid.pdf', '5_transcript.pdf', '5_portfolio.pdf', '2025-12-29 04:01:44');
INSERT INTO `applicant` VALUES (6, 'สาธิตมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา', '24', 'นายอำนาจ  แก้วภูผา', '6', '5', '2012', '0123456789123', 'ไทย', 'ไทย', 'พุทธ', '7/1', '6', '-', '-', '240305', '2403', '24', '24170', '0818535021', 'ประกาศนียบัตรวิชาชีพ (ปวช.)', '3.99', NULL, '2249', '8000', 'ตกปลา', 'นอน', '6_cid.pdf', '6_transcript.pdf', '6_portfolio.pdf', '2025-12-29 08:03:17');

SET FOREIGN_KEY_CHECKS = 1;
