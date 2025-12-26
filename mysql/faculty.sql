/*
 Navicat Premium Data Transfer

 Source Server         : www.webaru
 Source Server Type    : MySQL
 Source Server Version : 100526 (10.5.26-MariaDB-0+deb11u2)
 Source Host           : www.aru.ac.th:3306
 Source Schema         : ci3_halfschrolarship

 Target Server Type    : MySQL
 Target Server Version : 100526 (10.5.26-MariaDB-0+deb11u2)
 File Encoding         : 65001

 Date: 26/12/2025 16:46:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for faculty
-- ----------------------------
DROP TABLE IF EXISTS `faculty`;
CREATE TABLE `faculty`  (
  `fac_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fac_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faculty
-- ----------------------------
INSERT INTO `faculty` VALUES ('1', 'คณะครุศาสตร์');
INSERT INTO `faculty` VALUES ('2', 'คณะมนุษยศาสตร์และสังคมศาสตร์');
INSERT INTO `faculty` VALUES ('3', 'คณะวิทยาศาสตร์และเทคโนโลยี');
INSERT INTO `faculty` VALUES ('4', 'คณะวิทยาการจัดการ');

SET FOREIGN_KEY_CHECKS = 1;
