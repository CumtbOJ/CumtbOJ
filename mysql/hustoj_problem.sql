/*
 Navicat Premium Data Transfer

 Source Server         : thinkphp
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : db

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 11/05/2020 09:11:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hustoj_problem
-- ----------------------------
DROP TABLE IF EXISTS `hustoj_problem`;
CREATE TABLE `hustoj_problem` (
  `status` char(1) DEFAULT NULL,
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `index` varchar(100) DEFAULT NULL,
  `level` varchar(40) DEFAULT NULL,
  `passrate` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hustoj_problem
-- ----------------------------
BEGIN;
INSERT INTO `hustoj_problem` VALUES (NULL, 1, 'A+B Promblem', '', '入门', 0.53);
INSERT INTO `hustoj_problem` VALUES (NULL, 2, '超级玛丽游戏', '', '入门', 0.73);
INSERT INTO `hustoj_problem` VALUES (NULL, 3, '过合卒', 'NOIP普及组', '普及-', 0.42);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
