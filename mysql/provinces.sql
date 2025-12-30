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

 Date: 30/12/2025 14:19:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces`  (
  `province_code` int NOT NULL,
  `province_name_th` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `province_name_th_short` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `province_name_en` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `geography_id` int NULL DEFAULT 0,
  PRIMARY KEY (`province_code`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO `provinces` VALUES (10, 'กรุงเทพมหานคร', 'กทม', 'Bangkok', 2);
INSERT INTO `provinces` VALUES (11, 'สมุทรปราการ', 'สป', 'Samut Prakan', 2);
INSERT INTO `provinces` VALUES (12, 'นนทบุรี', 'นบ', 'Nonthaburi', 2);
INSERT INTO `provinces` VALUES (13, 'ปทุมธานี', 'ปท', 'Pathum Thani', 2);
INSERT INTO `provinces` VALUES (14, 'พระนครศรีอยุธยา', 'อย', 'Phra Nakhon Si Ayutthaya', 2);
INSERT INTO `provinces` VALUES (15, 'อ่างทอง', 'อท', 'Ang Thong', 2);
INSERT INTO `provinces` VALUES (16, 'ลพบุรี', 'ลบ', 'Loburi', 2);
INSERT INTO `provinces` VALUES (17, 'สิงห์บุรี', 'สห', 'Sing Buri', 2);
INSERT INTO `provinces` VALUES (18, 'ชัยนาท', 'ชน', 'Chai Nat', 2);
INSERT INTO `provinces` VALUES (19, 'สระบุรี', 'สบ', 'Saraburi', 2);
INSERT INTO `provinces` VALUES (20, 'ชลบุรี', 'ชบ', 'Chon Buri', 5);
INSERT INTO `provinces` VALUES (21, 'ระยอง', 'รย', 'Rayong', 5);
INSERT INTO `provinces` VALUES (22, 'จันทบุรี', 'จบ', 'Chanthaburi', 5);
INSERT INTO `provinces` VALUES (23, 'ตราด', 'ตร', 'Trat', 5);
INSERT INTO `provinces` VALUES (24, 'ฉะเชิงเทรา', 'ฉท', 'Chachoengsao', 5);
INSERT INTO `provinces` VALUES (25, 'ปราจีนบุรี', 'ปจ', 'Prachin Buri', 5);
INSERT INTO `provinces` VALUES (26, 'นครนายก', 'นย', 'Nakhon Nayok', 2);
INSERT INTO `provinces` VALUES (27, 'สระแก้ว', 'สก', 'Sa Kaeo', 5);
INSERT INTO `provinces` VALUES (30, 'นครราชสีมา', 'นม', 'Nakhon Ratchasima', 3);
INSERT INTO `provinces` VALUES (31, 'บุรีรัมย์', 'บร', 'Buri Ram', 3);
INSERT INTO `provinces` VALUES (32, 'สุรินทร์', 'สร', 'Surin', 3);
INSERT INTO `provinces` VALUES (33, 'ศรีสะเกษ', 'ศก', 'Si Sa Ket', 3);
INSERT INTO `provinces` VALUES (34, 'อุบลราชธานี', 'อบ', 'Ubon Ratchathani', 3);
INSERT INTO `provinces` VALUES (35, 'ยโสธร', 'ยส', 'Yasothon', 3);
INSERT INTO `provinces` VALUES (36, 'ชัยภูมิ', 'ชย', 'Chaiyaphum', 3);
INSERT INTO `provinces` VALUES (37, 'อำนาจเจริญ', 'อจ', 'Amnat Charoen', 3);
INSERT INTO `provinces` VALUES (38, 'หนองบัวลำภู', 'บก', 'Nong Bua Lam Phu', 3);
INSERT INTO `provinces` VALUES (39, 'ขอนแก่น', 'นภ', 'Khon Kaen', 3);
INSERT INTO `provinces` VALUES (40, 'อุดรธานี', 'ขก', 'Udon Thani', 3);
INSERT INTO `provinces` VALUES (41, 'เลย', 'อธ', 'Loei', 3);
INSERT INTO `provinces` VALUES (42, 'หนองคาย', 'เลย', 'Nong Khai', 3);
INSERT INTO `provinces` VALUES (43, 'มหาสารคาม', 'นค', 'Maha Sarakham', 3);
INSERT INTO `provinces` VALUES (44, 'ร้อยเอ็ด', 'มค', 'Roi Et', 3);
INSERT INTO `provinces` VALUES (45, 'กาฬสินธุ์', 'รอ', 'Kalasin', 3);
INSERT INTO `provinces` VALUES (46, 'สกลนคร', 'กส', 'Sakon Nakhon', 3);
INSERT INTO `provinces` VALUES (47, 'นครพนม', 'สน', 'Nakhon Phanom', 3);
INSERT INTO `provinces` VALUES (48, 'มุกดาหาร', 'นพ', 'Mukdahan', 3);
INSERT INTO `provinces` VALUES (49, 'เชียงใหม่', 'มห', 'Chiang Mai', 1);
INSERT INTO `provinces` VALUES (50, 'ลำพูน', 'ชม', 'Lamphun', 1);
INSERT INTO `provinces` VALUES (51, 'ลำปาง', 'ลพ', 'Lampang', 1);
INSERT INTO `provinces` VALUES (52, 'อุตรดิตถ์', 'ลป', 'Uttaradit', 1);
INSERT INTO `provinces` VALUES (53, 'แพร่', 'อด', 'Phrae', 1);
INSERT INTO `provinces` VALUES (54, 'น่าน', 'พร', 'Nan', 1);
INSERT INTO `provinces` VALUES (55, 'พะเยา', 'นน', 'Phayao', 1);
INSERT INTO `provinces` VALUES (56, 'เชียงราย', 'พย', 'Chiang Rai', 1);
INSERT INTO `provinces` VALUES (57, 'แม่ฮ่องสอน', 'ชร', 'Mae Hong Son', 1);
INSERT INTO `provinces` VALUES (58, 'นครสวรรค์', 'มส', 'Nakhon Sawan', 2);
INSERT INTO `provinces` VALUES (60, 'อุทัยธานี', 'นว', 'Uthai Thani', 2);
INSERT INTO `provinces` VALUES (61, 'กำแพงเพชร', 'อน', 'Kamphaeng Phet', 2);
INSERT INTO `provinces` VALUES (62, 'ตาก', 'กพ', 'Tak', 4);
INSERT INTO `provinces` VALUES (63, 'สุโขทัย', 'ตก', 'Sukhothai', 2);
INSERT INTO `provinces` VALUES (64, 'พิษณุโลก', 'สท', 'Phitsanulok', 2);
INSERT INTO `provinces` VALUES (65, 'พิจิตร', 'พล', 'Phichit', 2);
INSERT INTO `provinces` VALUES (66, 'เพชรบูรณ์', 'พจ', 'Phetchabun', 2);
INSERT INTO `provinces` VALUES (67, 'ราชบุรี', 'พช', 'Ratchaburi', 4);
INSERT INTO `provinces` VALUES (70, 'กาญจนบุรี', 'รบ', 'Kanchanaburi', 4);
INSERT INTO `provinces` VALUES (71, 'สุพรรณบุรี', 'กจ', 'Suphan Buri', 2);
INSERT INTO `provinces` VALUES (72, 'นครปฐม', 'สพ', 'Nakhon Pathom', 2);
INSERT INTO `provinces` VALUES (73, 'สมุทรสาคร', 'นป', 'Samut Sakhon', 2);
INSERT INTO `provinces` VALUES (74, 'สมุทรสงคราม', 'สค', 'Samut Songkhram', 2);
INSERT INTO `provinces` VALUES (75, 'เพชรบุรี', 'สส', 'Phetchaburi', 4);
INSERT INTO `provinces` VALUES (76, 'ประจวบคีรีขันธ์', 'พบ', 'Prachuap Khiri Khan', 4);
INSERT INTO `provinces` VALUES (77, 'นครศรีธรรมราช', 'ปข', 'Nakhon Si Thammarat', 6);
INSERT INTO `provinces` VALUES (80, 'กระบี่', 'นศ', 'Krabi', 6);
INSERT INTO `provinces` VALUES (81, 'พังงา', 'กบ', 'Phangnga', 6);
INSERT INTO `provinces` VALUES (82, 'ภูเก็ต', 'พง', 'Phuket', 6);
INSERT INTO `provinces` VALUES (83, 'สุราษฎร์ธานี', 'ภก', 'Surat Thani', 6);
INSERT INTO `provinces` VALUES (84, 'ระนอง', 'สฎ', 'Ranong', 6);
INSERT INTO `provinces` VALUES (85, 'ชุมพร', 'รน', 'Chumphon', 6);
INSERT INTO `provinces` VALUES (86, 'สงขลา', 'ชพ', 'Songkhla', 6);
INSERT INTO `provinces` VALUES (90, 'สตูล', 'สข', 'Satun', 6);
INSERT INTO `provinces` VALUES (91, 'ตรัง', 'สต', 'Trang', 6);
INSERT INTO `provinces` VALUES (92, 'พัทลุง', 'ตง', 'Phatthalung', 6);
INSERT INTO `provinces` VALUES (93, 'ปัตตานี', 'พท', 'Pattani', 6);
INSERT INTO `provinces` VALUES (94, 'ยะลา', 'ปน', 'Yala', 6);
INSERT INTO `provinces` VALUES (95, 'นราธิวาส', 'ยล', 'Narathiwat', 6);
INSERT INTO `provinces` VALUES (96, 'บึงกาฬ', 'นธ', 'buogkan', 3);

SET FOREIGN_KEY_CHECKS = 1;
