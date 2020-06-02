SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `hustoj_submit_record`;
CREATE TABLE `hustoj_submit_record` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uid` int unsigned NOT NULL,
  `pid` int unsigned NOT NULL,
  `language` char(10) NOT NULL,
  `code` text NOT NULL,
  `score` int NOT NULL,
  `create_time` datetime(0),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1102 DEFAULT CHARSET=utf8mb4 ;

SET FOREIGN_KEY_CHECKS = 1;