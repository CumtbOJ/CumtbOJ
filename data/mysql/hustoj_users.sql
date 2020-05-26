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

 Date: 10/05/2020 22:20:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `hustoj_users`;
CREATE TABLE `hustoj_users` (
  `nickname` varchar(40) NOT NULL,
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` varchar(40) DEFAULT '0',
  `school` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `super` tinyint DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

SET FOREIGN_KEY_CHECKS = 1;
