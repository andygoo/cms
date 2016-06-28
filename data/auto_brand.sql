/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : rric_new

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-06-28 18:17:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auto_brand`
-- ----------------------------
DROP TABLE IF EXISTS `auto_brand`;
CREATE TABLE `auto_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `pinyin` varchar(255) NOT NULL DEFAULT '' COMMENT '拼音',
  `first_char` varchar(10) NOT NULL DEFAULT '' COMMENT '拼音首字母',
  `img_url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片url',
  `show_status` int(2) NOT NULL DEFAULT '1' COMMENT '默认是否显示:0-不显示 1-显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auto_brand
-- ----------------------------
INSERT INTO `auto_brand` VALUES ('34', '阿尔法罗密欧', 'aerfaluomiou', 'A', '', '1');
INSERT INTO `auto_brand` VALUES ('35', '阿斯顿·马丁', 'asidun·mading', 'A', '', '1');
INSERT INTO `auto_brand` VALUES ('33', '奥迪', 'aodi', 'A', '', '1');
INSERT INTO `auto_brand` VALUES ('140', '巴博斯', 'babosi', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('120', '宝骏', 'baojun', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('15', '宝马', 'baoma', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('40', '保时捷', 'baoshijie', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('27', '北京汽车', 'beijingqiche', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('203', '北汽幻速', 'beiqihuansu', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('208', '北汽新能源', 'beiqixinnengyuan', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('154', '北汽制造', 'beiqizhizao', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('36', '奔驰', 'benchi', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('95', '奔腾', 'benteng', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('14', '本田', 'bentian', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('75', '比亚迪', 'biyadi', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('13', '标致', 'biaozhi', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('38', '别克', 'bieke', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('39', '宾利', 'binli', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('37', '布加迪', 'bujiadi', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('79', '昌河', 'changhe', 'C', '', '1');
INSERT INTO `auto_brand` VALUES ('76', '长安', 'changan', 'C', '', '1');
INSERT INTO `auto_brand` VALUES ('163', '长安商用', 'changanshangyong', 'C', '', '1');
INSERT INTO `auto_brand` VALUES ('77', '长城', 'changcheng', 'C', '', '1');
INSERT INTO `auto_brand` VALUES ('169', 'DS', 'DS', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('92', '大发', 'dafa', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('1', '大众', 'dazhong', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('41', '道奇', 'daoqi', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('32', '东风', 'dongfeng', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('187', '东风风度', 'dongfengfengdu', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('113', '东风风神', 'dongfengfengshen', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('165', '东风风行', 'dongfengfengxing', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('81', '东南', 'dongnan', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('42', '法拉利', 'falali', 'F', '', '1');
INSERT INTO `auto_brand` VALUES ('11', '菲亚特', 'feiyate', 'F', '', '1');
INSERT INTO `auto_brand` VALUES ('3', '丰田', 'fengtian', 'F', '', '1');
INSERT INTO `auto_brand` VALUES ('141', '福迪', 'fudi', 'F', '', '1');
INSERT INTO `auto_brand` VALUES ('8', '福特', 'fute', 'F', '', '1');
INSERT INTO `auto_brand` VALUES ('96', '福田', 'futian', 'F', '', '1');
INSERT INTO `auto_brand` VALUES ('112', 'GMC', 'GMC', 'G', '', '1');
INSERT INTO `auto_brand` VALUES ('152', '观致', 'guanzhi', 'G', '', '1');
INSERT INTO `auto_brand` VALUES ('116', '光冈', 'guanggang', 'G', '', '1');
INSERT INTO `auto_brand` VALUES ('82', '广汽传祺', 'yanqichuanqi', 'G', '', '1');
INSERT INTO `auto_brand` VALUES ('108', '广汽吉奥', 'yanqijiao', 'G', '', '1');
INSERT INTO `auto_brand` VALUES ('24', '哈飞', 'hafei', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('181', '哈弗', 'hafu', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('86', '海马', 'haima', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('43', '悍马', 'hanma', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('91', '红旗', 'hongqi', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('85', '华普', 'huapu', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('220', '华颂', 'huasong', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('87', '华泰', 'huatai', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('97', '黄海', 'huanghai', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('46', 'Jeep', 'Jeep', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('25', '吉利汽车', 'jiliqiche', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('84', '江淮', 'jianghuai', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('119', '江铃', 'jiangling', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('44', '捷豹', 'jiebao', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('83', '金杯', 'jinbei', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('151', '九龙', 'jiulong', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('109', 'KTM', 'KTM', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('156', '卡尔森', 'kaersen', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('224', '卡升', 'kasheng', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('199', '卡威', 'kawei', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('101', '开瑞', 'kairui', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('47', '凯迪拉克', 'kaidilake', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('214', '凯翼', 'kaiyi', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('100', '科尼赛克', 'kenisaike', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('9', '克莱斯勒', 'kelaisile', 'K', '', '1');
INSERT INTO `auto_brand` VALUES ('48', '兰博基尼', 'lanbojini', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('118', '劳伦士', 'laolunshi', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('54', '劳斯莱斯', 'laosilaisi', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('215', '雷丁', 'leiding', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('52', '雷克萨斯', 'leikesasi', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('10', '雷诺', 'leinuo', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('124', '理念', 'linian', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('80', '力帆', 'lifan', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('89', '莲花汽车', 'lianhuaqiche', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('78', '猎豹汽车', 'liebaoqiche', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('51', '林肯', 'linken', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('53', '铃木', 'lingmu', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('204', '陆地方舟', 'ludifangzhou', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('88', '陆风', 'lufeng', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('49', '路虎', 'luhu', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('50', '路特斯', 'lutesi', 'L', '', '1');
INSERT INTO `auto_brand` VALUES ('20', 'MG', 'MG', 'M', '', '1');
INSERT INTO `auto_brand` VALUES ('56', 'MINI', 'MINI', 'M', '', '1');
INSERT INTO `auto_brand` VALUES ('58', '马自达', 'mazida', 'M', '', '1');
INSERT INTO `auto_brand` VALUES ('57', '玛莎拉蒂', 'mashaladi', 'M', '', '1');
INSERT INTO `auto_brand` VALUES ('55', '迈巴赫', 'maibahe', 'M', '', '1');
INSERT INTO `auto_brand` VALUES ('129', '迈凯伦', 'maikailun', 'M', '', '1');
INSERT INTO `auto_brand` VALUES ('168', '摩根', 'mogen', 'M', '', '1');
INSERT INTO `auto_brand` VALUES ('130', '纳智捷', 'nazhijie', 'N', '', '1');
INSERT INTO `auto_brand` VALUES ('60', '讴歌', 'ouge', 'O', '', '1');
INSERT INTO `auto_brand` VALUES ('59', '欧宝', 'oubao', 'O', '', '1');
INSERT INTO `auto_brand` VALUES ('146', '欧朗', 'oulang', 'O', '', '1');
INSERT INTO `auto_brand` VALUES ('26', '奇瑞', 'qirui', 'Q', '', '1');
INSERT INTO `auto_brand` VALUES ('122', '启辰', 'qichen', 'Q', '', '1');
INSERT INTO `auto_brand` VALUES ('62', '起亚', 'qiya', 'Q', '', '1');
INSERT INTO `auto_brand` VALUES ('63', '日产', 'richan', 'R', '', '1');
INSERT INTO `auto_brand` VALUES ('19', '荣威', 'rongwei', 'R', '', '1');
INSERT INTO `auto_brand` VALUES ('174', '如虎', 'ruhu', 'R', '', '1');
INSERT INTO `auto_brand` VALUES ('103', '瑞麒', 'ruiqi', 'R', '', '1');
INSERT INTO `auto_brand` VALUES ('45', 'smart', 'smart', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('64', '萨博', 'sabo', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('68', '三菱', 'sanling', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('155', '上汽大通', 'shangqidatong', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('173', '绅宝', 'shenbao', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('66', '世爵', 'shijue', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('90', '双环', 'shuanghuan', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('69', '双龙', 'shuanglong', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('162', '思铭', 'siming', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('65', '斯巴鲁', 'sibalu', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('67', '斯柯达', 'sikeda', 'S', '', '1');
INSERT INTO `auto_brand` VALUES ('202', '泰卡特', 'taikate', 'T', '', '1');
INSERT INTO `auto_brand` VALUES ('133', '特斯拉', 'tesila', 'T', '', '1');
INSERT INTO `auto_brand` VALUES ('161', '腾势', 'tengshi', 'T', '', '1');
INSERT INTO `auto_brand` VALUES ('102', '威麟', 'weilin', 'W', '', '1');
INSERT INTO `auto_brand` VALUES ('99', '威兹曼', 'weiziman', 'W', '', '1');
INSERT INTO `auto_brand` VALUES ('70', '沃尔沃', 'woerwo', 'W', '', '1');
INSERT INTO `auto_brand` VALUES ('98', '西雅特', 'xiyate', 'X', '', '1');
INSERT INTO `auto_brand` VALUES ('12', '现代', 'xiandai', 'X', '', '1');
INSERT INTO `auto_brand` VALUES ('185', '新凯', 'xinkai', 'X', '', '1');
INSERT INTO `auto_brand` VALUES ('71', '雪佛兰', 'xuefolan', 'X', '', '1');
INSERT INTO `auto_brand` VALUES ('72', '雪铁龙', 'xuetielong', 'X', '', '1');
INSERT INTO `auto_brand` VALUES ('111', '野马汽车', 'yemaqiche', 'Y', '', '1');
INSERT INTO `auto_brand` VALUES ('110', '一汽', 'yiqi', 'Y', '', '1');
INSERT INTO `auto_brand` VALUES ('73', '英菲尼迪', 'yingfeinidi', 'Y', '', '1');
INSERT INTO `auto_brand` VALUES ('192', '英致', 'yingzhi', 'Y', '', '1');
INSERT INTO `auto_brand` VALUES ('93', '永源', 'yongyuan', 'Y', '', '1');
INSERT INTO `auto_brand` VALUES ('206', '知豆', 'zhidou', 'Z', '', '1');
INSERT INTO `auto_brand` VALUES ('22', '中华', 'zhonghua', 'Z', '', '1');
INSERT INTO `auto_brand` VALUES ('74', '中兴', 'zhongxing', 'Z', '', '1');
INSERT INTO `auto_brand` VALUES ('94', '众泰', 'zhongtai', 'Z', '', '1');
INSERT INTO `auto_brand` VALUES ('114', '五菱汽车', 'wulingqiche', 'W', '', '1');
INSERT INTO `auto_brand` VALUES ('142', '东风小康', 'dongfengxiaokang', 'D', '', '1');
INSERT INTO `auto_brand` VALUES ('143', '北汽威旺', 'beiqiweiwang', 'B', '', '1');
INSERT INTO `auto_brand` VALUES ('144', '依维柯', 'yiweike', 'Y', '', '1');
INSERT INTO `auto_brand` VALUES ('150', '海格', 'haige', 'H', '', '1');
INSERT INTO `auto_brand` VALUES ('175', '金旅', 'jinlv', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('197', '福汽启腾', 'fuqiqiteng', 'F', '', '1');
INSERT INTO `auto_brand` VALUES ('213', '南京金龙', 'nanjingjinlong', 'N', '', '1');
INSERT INTO `auto_brand` VALUES ('145', '金龙', 'jinlong', 'J', '', '1');
INSERT INTO `auto_brand` VALUES ('221', '安凯客车', 'ankaikeche', 'A', '', '1');
INSERT INTO `auto_brand` VALUES ('196', '成功汽车', 'chenggongqiche', 'C', '', '1');
