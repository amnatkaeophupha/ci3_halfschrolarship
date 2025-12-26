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

 Date: 26/12/2025 16:46:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for program
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program`  (
  `pro_id` int NULL DEFAULT NULL,
  `pro_degree` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fac_id` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of program
-- ----------------------------
INSERT INTO `program` VALUES (1525, 'ครุศาสตรบัณฑิต', 'การศึกษา (วิชาเอก คณิตศาสตร์)', 1);
INSERT INTO `program` VALUES (1526, 'ครุศาสตรบัณฑิต', 'การศึกษา (วิชาเอก วิทยาศาสตร์)', 1);
INSERT INTO `program` VALUES (1527, 'ครุศาสตรบัณฑิต', 'การศึกษา (วิชาเอก สังคมศึกษา)', 1);
INSERT INTO `program` VALUES (1529, 'ครุศาสตรบัณฑิต', 'การศึกษา (วิชาเอก คอมพิวเตอร์ศึกษา)', 1);
INSERT INTO `program` VALUES (1530, 'ครุศาสตรบัณฑิต', 'การศึกษา (วิชาเอก พลศึกษา)', 1);
INSERT INTO `program` VALUES (1531, 'ครุศาสตรบัณฑิต', 'การศึกษา (วิชาเอก การสอนภาษาไทย)', 1);
INSERT INTO `program` VALUES (1532, 'ครุศาสตรบัณฑิต', 'การศึกษา (วิชาเอก การสอนภาษาอังกฤษ)', 1);
INSERT INTO `program` VALUES (1533, 'ครุศาสตรบัณฑิต', 'การศึกษา (วิชาเอก การประถมศึกษา)', 1);
INSERT INTO `program` VALUES (1524, 'ครุศาสตรบัณฑิต', 'การศึกษาพิเศษและการสอนภาษาไทย', 1);
INSERT INTO `program` VALUES (2249, 'ครุศาสตรบัณฑิต', 'นาฏศิลป์ศึกษา', 2);
INSERT INTO `program` VALUES (2250, 'ครุศาสตรบัณฑิต', 'ศิลปศึกษา', 2);
INSERT INTO `program` VALUES (2251, 'ครุศาสตรบัณฑิต', 'ดนตรีศึกษา', 2);
INSERT INTO `program` VALUES (3234, 'ครุศาสตรบัณฑิต', 'วิทยาศาสตร์ศึกษา (แขนงวิชาฟิสิกส์)   ', 3);
INSERT INTO `program` VALUES (3235, 'ครุศาสตรบัณฑิต', 'วิทยาศาสตร์ศึกษา (แขนงวิชาเคมี)   ', 3);
INSERT INTO `program` VALUES (3236, 'ครุศาสตรบัณฑิต', 'วิทยาศาสตร์ศึกษา (แขนงวิชาชีววิทยา)   ', 3);
INSERT INTO `program` VALUES (3328, 'เทคโนโลยีบัณฑิต', 'เทคโนโลยีอุตสาหกรรม (วิชาเอก การจัดการเทคโนโลยีอุตสาหกรรม)', 3);
INSERT INTO `program` VALUES (3329, 'เทคโนโลยีบัณฑิต', 'เทคโนโลยีอุตสาหกรรม (วิชาเอก เทคโนโลยีระบบควบคุมการผลิตอัตโนมัติ)', 3);
INSERT INTO `program` VALUES (2228, 'นิติศาสตรบัณฑิต', 'นิติศาสตร์', 2);
INSERT INTO `program` VALUES (2246, 'นิเทศศาสตรบัณฑิต', 'นิเทศศาสตร์ดิจิทัล', 2);
INSERT INTO `program` VALUES (4259, 'บริหารธุรกิจบัณฑิต', 'การจัดการธุรกิจการค้าสมัยใหม่', 4);
INSERT INTO `program` VALUES (4268, 'บริหารธุรกิจบัณฑิต', 'บริหารธุรกิจ (วิชาเอกการจัดการ)', 4);
INSERT INTO `program` VALUES (4269, 'บริหารธุรกิจบัณฑิต', 'บริหารธุรกิจ (วิชาเอกการจัดการโลจิสติกส์และซัพพลายเชน)', 4);
INSERT INTO `program` VALUES (4270, 'บริหารธุรกิจบัณฑิต', 'บริหารธุรกิจ (วิชาเอกการบริหารทรัพยากรมนุษย์)', 4);
INSERT INTO `program` VALUES (4271, 'บริหารธุรกิจบัณฑิต', 'บริหารธุรกิจ (วิชาเอกคอมพิวเตอร์ธุรกิจดิจิทัล) ', 4);
INSERT INTO `program` VALUES (4272, 'บริหารธุรกิจบัณฑิต', 'บริหารธุรกิจ (วิชาเอกการตลาดดิจิทัลและอิเวนต์)', 4);
INSERT INTO `program` VALUES (2206, 'รัฐประศาสนศาสตรบัณฑิต', 'รัฐประศาสนศาสตร์', 2);
INSERT INTO `program` VALUES (2224, 'รัฐประศาสนศาสตรบัณฑิต', 'การปกครองท้องถิ่น', 2);
INSERT INTO `program` VALUES (3202, 'วิทยาศาสตรบัณฑิต', 'เคมี  ', 3);
INSERT INTO `program` VALUES (3206, 'วิทยาศาสตรบัณฑิต', 'วิทยาการคอมพิวเตอร์  ', 3);
INSERT INTO `program` VALUES (3211, 'วิทยาศาสตรบัณฑิต', 'เทคโนโลยีสารสนเทศ', 3);
INSERT INTO `program` VALUES (3225, 'วิทยาศาสตรบัณฑิต', 'จุลชีววิทยา', 3);
INSERT INTO `program` VALUES (3226, 'วิทยาศาสตรบัณฑิต', 'คหกรรมศาสตร์ ', 3);
INSERT INTO `program` VALUES (3233, 'วิทยาศาสตรบัณฑิต', 'วิทยาศาสตร์และการจัดการเทคโนโลยีอาหาร', 3);
INSERT INTO `program` VALUES (3237, 'วิทยาศาสตรบัณฑิต', 'เทคโนโลยีการเกษตรสมัยใหม่ ', 3);
INSERT INTO `program` VALUES (3238, 'วิทยาศาสตรบัณฑิต', 'เทคโนโลยีสิ่งแวดล้อม ', 3);
INSERT INTO `program` VALUES (3330, 'วิศวกรรมศาสตรบัณฑิต', '   วิศวกรรมปัญญาประดิษฐ์ 2 ปี (ต่อเนื่อง)', 3);
INSERT INTO `program` VALUES (2248, 'ศิลปกรรมศาสตรบัณฑิต', 'ดนตรีสร้างสรรค์', 2);
INSERT INTO `program` VALUES (2203, 'ศิลปศาสตรบัณฑิต', 'ภาษาอังกฤษ', 2);
INSERT INTO `program` VALUES (2209, 'ศิลปศาสตรบัณฑิต', 'ภาษาไทย', 2);
INSERT INTO `program` VALUES (2230, 'ศิลปศาสตรบัณฑิต', 'ประวัติศาสตร์', 2);
INSERT INTO `program` VALUES (2239, 'ศิลปศาสตรบัณฑิต', 'ภาษาจีน', 2);
INSERT INTO `program` VALUES (2240, 'ศิลปศาสตรบัณฑิต', 'การพัฒนาชุมชนและสังคม', 2);
INSERT INTO `program` VALUES (2252, 'ศิลปศาสตรบัณฑิต', 'สหวิทยาการเพื่อการจัดการฮาลาล', 2);
INSERT INTO `program` VALUES (4266, 'ศิลปศาสตรบัณฑิต', 'การท่องเที่ยวและบริการ (แขนงวิชา วิชาการท่องเที่ยว)', 4);
INSERT INTO `program` VALUES (4267, 'ศิลปศาสตรบัณฑิต', 'การท่องเที่ยวและบริการ (แขนงวิชา วิชาการบริการ)', 4);
INSERT INTO `program` VALUES (3231, 'สาธารณสุขศาสตรบัณฑิต', 'สาธารณสุขศาสตร์ ', 3);

SET FOREIGN_KEY_CHECKS = 1;
