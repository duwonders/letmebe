/*
 Navicat Premium Data Transfer

 Source Server         : duwonders
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : localhost
 Source Database       : limit

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : utf-8

 Date: 08/30/2015 16:15:12 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `all`
-- ----------------------------
DROP TABLE IF EXISTS `all`;
CREATE TABLE `all` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `limit` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `all`
-- ----------------------------
BEGIN;
INSERT INTO `all` VALUES ('3', '杜泽萱', '123123', '1', '1'), ('4', '妹子y', '123123', '3', '1'), ('7', '妹子w', '123123', '2', '1'), ('9', '妹子h', '123123', '3', '1'), ('10', '妹子l', '123123', '2', '1'), ('12', '妹子t', '123123', null, null), ('13', '妹子t', '123123', null, null), ('14', '妹子t', '123123', null, null), ('16', '妹子k', '123123', '3', '1');
COMMIT;

-- ----------------------------
--  Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `comment`
-- ----------------------------
BEGIN;
INSERT INTO `comment` VALUES ('2', '杜泽萱', '欢迎各位基佬来到聊天室'), ('3', '杜泽萱', 'dsadsa'), ('4', '杜泽萱', 'dsada'), ('5', '杜泽萱', 'dsada'), ('6', '杜泽萱', 'dsada'), ('7', '杜泽萱', 'dsada'), ('8', '杜泽萱', 'dsada'), ('9', '杜泽萱', 'dsada'), ('10', '杜泽萱', 'dsada'), ('11', '杜泽萱', 'dsada'), ('12', '杜泽萱', 'dsada'), ('13', '杜泽萱', 'dsada'), ('14', '杜泽萱', 'dsada'), ('15', '杜泽萱', 'blabla'), ('16', '杜泽萱', 'haha'), ('17', '杜泽萱', '的萨达'), ('18', '杜泽萱', '的萨达'), ('19', '妹子w', '哈哈我解除经验了');
COMMIT;

-- ----------------------------
--  Table structure for `limit`
-- ----------------------------
DROP TABLE IF EXISTS `limit`;
CREATE TABLE `limit` (
  `limitid` int(11) NOT NULL AUTO_INCREMENT,
  `limit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`limitid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `limit`
-- ----------------------------
BEGIN;
INSERT INTO `limit` VALUES ('1', '网站开发者'), ('2', '管理员'), ('3', '普通用户');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
