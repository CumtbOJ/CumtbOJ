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

DROP TABLE IF EXISTS `hustoj_problem`;
CREATE TABLE `hustoj_problem` (
  `status` tinyint DEFAULT 0 NOT NULL,
  `pid` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,	
  `tag` varchar(400) DEFAULT NULL,
  `difficulty` int(40)  NOT NULL,
  `rate` varchar(40) ,
  `totalNumber` int DEFAULT 0,
  `passNumber` int DEFAULT 0,
  `content` TEXT, 
  `inputFormat` TEXT,
  `outputFormat` TEXT,
  `sample` TEXT,
  `historyScore` int DEFAULT 0,
  `hint` TEXT,
  `recommond` TEXT,
  `provider` varchar(100),
  `timeLimit` float NOT NULL,
  `memoryLimit` int NOT NULL,

  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
