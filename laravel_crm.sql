/*
 Navicat MySQL Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : laravel_crm

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 04/11/2018 20:28:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for crm_clients
-- ----------------------------
DROP TABLE IF EXISTS `crm_clients`;
CREATE TABLE `crm_clients`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enter` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_clients
-- ----------------------------
INSERT INTO `crm_clients` VALUES (1, '腾讯', '阳毅', '18777327332', '电话营销', 'admin( 姐姐 )', '2018-10-30 12:40:32', '2018-10-30 12:40:32');
INSERT INTO `crm_clients` VALUES (2, '腾讯-x', '阳毅', '18777327333', '电话营销', 'admin( 姐姐 )', '2018-10-30 12:44:34', '2018-10-30 12:44:34');
INSERT INTO `crm_clients` VALUES (4, '华为', '奥特曼', '18777327331', '电话营销', 'admin( 姐姐 )', '2018-10-30 12:45:35', '2018-10-30 12:45:35');
INSERT INTO `crm_clients` VALUES (5, '微博', '奥特曼', '18777327331', '电话营销', 'admin( 姐姐 )', '2018-10-30 12:45:44', '2018-10-30 12:45:44');
INSERT INTO `crm_clients` VALUES (6, '阿里巴巴', '奥特曼', '18777327331', '电话营销', 'admin( 姐姐 )', '2018-10-30 12:46:00', '2018-10-30 12:46:00');
INSERT INTO `crm_clients` VALUES (7, '京东集团', '奥特曼', '18777327331', '电话营销', 'admin( 姐姐 )', '2018-10-30 12:46:13', '2018-10-30 12:46:13');
INSERT INTO `crm_clients` VALUES (9, '腾讯--test!!', '奥特曼', '18777327331', '主动联系', 'admin( 姐姐 )', '2018-10-30 12:49:03', '2018-10-30 13:07:33');

-- ----------------------------
-- Table structure for crm_documentaries
-- ----------------------------
DROP TABLE IF EXISTS `crm_documentaries`;
CREATE TABLE `crm_documentaries`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sn` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_company` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `way` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `evolve` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enter` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_documentaries
-- ----------------------------
INSERT INTO `crm_documentaries` VALUES (1, '20181101131636', 'test01', 7, '京东集团', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:16:36', '2018-11-01 13:16:36');
INSERT INTO `crm_documentaries` VALUES (3, '20181101131704', 'test02', 9, '腾讯--test!!', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:17:04', '2018-11-01 13:17:04');
INSERT INTO `crm_documentaries` VALUES (4, '20181101131717', 'test03', 6, '阿里巴巴', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:17:17', '2018-11-01 13:17:17');
INSERT INTO `crm_documentaries` VALUES (6, '20181101131731', 'test05', 6, '阿里巴巴', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:17:31', '2018-11-01 13:17:31');
INSERT INTO `crm_documentaries` VALUES (7, '20181101132518', 'test07', 5, '微博', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:25:18', '2018-11-01 13:25:18');
INSERT INTO `crm_documentaries` VALUES (8, '20181101132519', 'test07', 5, '微博', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:25:19', '2018-11-01 13:25:19');
INSERT INTO `crm_documentaries` VALUES (9, '20181101132537', 'test07', 1, '腾讯', 32, 'test02', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:25:37', '2018-11-01 13:25:37');
INSERT INTO `crm_documentaries` VALUES (10, '20181101132558', 'test07', 4, '华为', 34, 'test04', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:25:58', '2018-11-01 13:25:58');
INSERT INTO `crm_documentaries` VALUES (11, '20181101133619', 'test08', 7, '京东集团', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:36:19', '2018-11-01 13:36:19');
INSERT INTO `crm_documentaries` VALUES (12, '20181101133620', 'test08', 7, '京东集团', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:36:20', '2018-11-01 13:36:20');
INSERT INTO `crm_documentaries` VALUES (13, '20181101133816', 'test09', 2, '腾讯-x', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:38:16', '2018-11-01 13:38:16');
INSERT INTO `crm_documentaries` VALUES (14, '20181101133847', 'test10', 7, '京东集团', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:38:47', '2018-11-01 13:38:47');
INSERT INTO `crm_documentaries` VALUES (15, '20181101134209', 'test10', 7, '京东集团', 33, 'test03', '上门拜访', '谈判中', 'test......!!!', 'admin( 姐姐 )', '2018-11-01 13:42:09', '2018-11-01 13:42:09');

-- ----------------------------
-- Table structure for crm_informs
-- ----------------------------
DROP TABLE IF EXISTS `crm_informs`;
CREATE TABLE `crm_informs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_informs
-- ----------------------------
INSERT INTO `crm_informs` VALUES (1, '关于春节放假通知...!!!', '<p>关于春节放假通知...!!!关于春节放假通知...!!!关于春节放假通知...!!!关于春节放假通知...!!!关于春节放假通知...!!!关于春节放假通知...!!!</p>', 2, 'admin( 姐姐 )', '2018-11-02 13:23:44', '2018-11-02 13:23:44');
INSERT INTO `crm_informs` VALUES (2, '关于国庆放假通知...!!!', '<p>关于国庆放假通知...!!!关于国庆放假通知...!!!关于国庆放假通知...!!!关于国庆放假通知...!!!关于国庆放假通知...!!!关于国庆放假通知...!!!关于国庆放假通知...!!!</p>', 2, 'admin( 姐姐 )', '2018-11-02 13:25:01', '2018-11-02 13:25:01');
INSERT INTO `crm_informs` VALUES (3, '关于中秋放假通知...!!!', '<p>关于中秋放假通知...!!!关于中秋放假通知...!!!关于中秋放假通知...!!!关于中秋放假通知...!!!关于中秋放假通知...!!!</p>', 2, 'admin( 姐姐 )', '2018-11-02 13:25:49', '2018-11-02 13:50:05');

-- ----------------------------
-- Table structure for crm_inlibs
-- ----------------------------
DROP TABLE IF EXISTS `crm_inlibs`;
CREATE TABLE `crm_inlibs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `staff_name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `mode` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_explain` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enter` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_inlibs
-- ----------------------------
INSERT INTO `crm_inlibs` VALUES (10, 12, 10, '姐姐', 29, '采购', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:03:28', '2018-10-29 12:03:28');
INSERT INTO `crm_inlibs` VALUES (11, 11, 10, 'test01', 30, '采购', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:03:49', '2018-10-29 12:03:49');
INSERT INTO `crm_inlibs` VALUES (12, 8, 20, 'test01', 30, '采购', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:04:11', '2018-10-29 12:04:11');
INSERT INTO `crm_inlibs` VALUES (13, 6, 10, 'test01', 30, '采购', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:07:24', '2018-10-29 12:07:24');
INSERT INTO `crm_inlibs` VALUES (14, 3, 10, '噗噗', 27, '采购', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:11:07', '2018-10-29 12:11:07');
INSERT INTO `crm_inlibs` VALUES (15, 4, 10, '姐姐', 29, '退货', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:11:37', '2018-10-29 12:11:37');
INSERT INTO `crm_inlibs` VALUES (16, 8, 10, '姐姐', 29, '退货', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:12:34', '2018-10-29 12:12:34');
INSERT INTO `crm_inlibs` VALUES (17, 9, 10, '噗噗', 27, '退货', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:13:34', '2018-10-29 12:13:34');
INSERT INTO `crm_inlibs` VALUES (18, 6, 10, '姐姐', 29, '退货', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:29:31', '2018-10-29 12:29:31');
INSERT INTO `crm_inlibs` VALUES (19, 11, 10, '姐姐', 29, '退货', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:31:13', '2018-10-29 12:31:13');
INSERT INTO `crm_inlibs` VALUES (20, 8, 10, '姐姐', 29, '退货', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:31:41', '2018-10-29 12:31:41');
INSERT INTO `crm_inlibs` VALUES (21, 11, 10, 'test02', 31, '退货', 'test...!!!', 'admin( 姐姐 )', '2018-10-29 12:51:40', '2018-10-29 12:51:40');

-- ----------------------------
-- Table structure for crm_letters
-- ----------------------------
DROP TABLE IF EXISTS `crm_letters`;
CREATE TABLE `crm_letters`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sread` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_letters
-- ----------------------------
INSERT INTO `crm_letters` VALUES (1, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 30, 'test01', '未读', 'admin( 姐姐 )', 2, '2018-11-02 14:56:45', '2018-11-02 14:56:45');
INSERT INTO `crm_letters` VALUES (2, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 30, 'test01', '未读', 'admin( 姐姐 )', 2, '2018-11-02 14:56:46', '2018-11-02 14:56:46');
INSERT INTO `crm_letters` VALUES (3, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:20', '2018-11-02 14:57:20');
INSERT INTO `crm_letters` VALUES (4, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:20', '2018-11-02 14:57:20');
INSERT INTO `crm_letters` VALUES (5, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:20', '2018-11-02 14:57:20');
INSERT INTO `crm_letters` VALUES (6, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:20', '2018-11-02 14:57:20');
INSERT INTO `crm_letters` VALUES (7, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:21', '2018-11-02 14:57:21');
INSERT INTO `crm_letters` VALUES (8, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:21', '2018-11-02 14:57:21');
INSERT INTO `crm_letters` VALUES (9, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:21', '2018-11-02 14:57:21');
INSERT INTO `crm_letters` VALUES (10, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:21', '2018-11-02 14:57:21');
INSERT INTO `crm_letters` VALUES (11, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:21', '2018-11-02 14:57:21');
INSERT INTO `crm_letters` VALUES (12, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:21', '2018-11-02 14:57:21');
INSERT INTO `crm_letters` VALUES (13, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 2, '姐姐', '未读', 'admin02( test04)', 14, '2018-11-02 14:57:21', '2018-11-02 14:57:21');
INSERT INTO `crm_letters` VALUES (14, '<p>test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!</p>', 32, 'test02', '未读', 'admin( 姐姐 )', 2, '2018-11-02 15:04:29', '2018-11-02 15:04:29');

-- ----------------------------
-- Table structure for crm_migrations
-- ----------------------------
DROP TABLE IF EXISTS `crm_migrations`;
CREATE TABLE `crm_migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_migrations
-- ----------------------------
INSERT INTO `crm_migrations` VALUES (7, '2014_10_12_000000_create_users_table', 3);
INSERT INTO `crm_migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `crm_migrations` VALUES (3, '2018_10_20_095653_create_posts_table', 1);
INSERT INTO `crm_migrations` VALUES (4, '2018_10_22_070314_create_staffs_table', 2);
INSERT INTO `crm_migrations` VALUES (5, '2018_10_22_084214_create_staff_extends_table', 2);
INSERT INTO `crm_migrations` VALUES (8, '2018_10_26_035341_create_product_table', 4);
INSERT INTO `crm_migrations` VALUES (9, '2018_10_26_071435_create_product_extends_table', 4);
INSERT INTO `crm_migrations` VALUES (11, '2018_10_29_064530_create_inlibs_table', 5);
INSERT INTO `crm_migrations` VALUES (12, '2018_10_30_120359_create_clients_table', 6);
INSERT INTO `crm_migrations` VALUES (13, '2018_11_01_112437_create_documentaries_table', 7);
INSERT INTO `crm_migrations` VALUES (14, '2018_11_02_053829_create_order_table', 8);
INSERT INTO `crm_migrations` VALUES (15, '2018_11_02_062311_create_order_extends_table', 9);
INSERT INTO `crm_migrations` VALUES (16, '2018_11_02_124321_create_informs_table', 10);
INSERT INTO `crm_migrations` VALUES (18, '2018_11_02_140030_create_letters_table', 11);
INSERT INTO `crm_migrations` VALUES (19, '2018_11_03_035016_create_outlib_table', 12);
INSERT INTO `crm_migrations` VALUES (20, '2018_11_03_103528_create_receipts_table', 13);
INSERT INTO `crm_migrations` VALUES (21, '2018_11_03_120308_create_works_table', 14);
INSERT INTO `crm_migrations` VALUES (22, '2018_11_03_120402_create_work_stages_table', 14);
INSERT INTO `crm_migrations` VALUES (23, '2018_11_04_062322_create_permission_tables', 15);

-- ----------------------------
-- Table structure for crm_model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `crm_model_has_permissions`;
CREATE TABLE `crm_model_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for crm_model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `crm_model_has_roles`;
CREATE TABLE `crm_model_has_roles`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_model_has_roles
-- ----------------------------
INSERT INTO `crm_model_has_roles` VALUES (1, 'App\\Models\\User', 3);
INSERT INTO `crm_model_has_roles` VALUES (2, 'App\\Models\\User', 2);

-- ----------------------------
-- Table structure for crm_order_extends
-- ----------------------------
DROP TABLE IF EXISTS `crm_order_extends`;
CREATE TABLE `crm_order_extends`  (
  `order_id` int(11) NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_order_extends
-- ----------------------------
INSERT INTO `crm_order_extends` VALUES (7, 'test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!');
INSERT INTO `crm_order_extends` VALUES (8, 'test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!');
INSERT INTO `crm_order_extends` VALUES (9, 'test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!test...!!!');

-- ----------------------------
-- Table structure for crm_orders
-- ----------------------------
DROP TABLE IF EXISTS `crm_orders`;
CREATE TABLE `crm_orders`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sn` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `documentary_id` int(11) NOT NULL,
  `original` decimal(8, 2) NOT NULL,
  `cost` decimal(8, 2) NOT NULL,
  `pay_state` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enter` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_orders
-- ----------------------------
INSERT INTO `crm_orders` VALUES (7, '20181103042747', 'test...!!!', 14, 20000.00, 26394.00, '未支付', 'admin( 姐姐 )', '2018-11-03 04:27:47', '2018-11-03 04:27:47');
INSERT INTO `crm_orders` VALUES (8, '20181103043222', 'test...!!!', 14, 20000.00, 13197.00, '未支付', 'admin( 姐姐 )', '2018-11-03 04:32:22', '2018-11-03 04:32:22');
INSERT INTO `crm_orders` VALUES (9, '20181103043737', 'test...!!!', 12, 20000.00, 37197.00, '已支付', 'admin( 姐姐 )', '2018-11-03 04:37:37', '2018-11-03 10:43:53');

-- ----------------------------
-- Table structure for crm_outlibs
-- ----------------------------
DROP TABLE IF EXISTS `crm_outlibs`;
CREATE TABLE `crm_outlibs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_sn` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `state` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `clerk` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `enter` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dispose_time` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_outlibs
-- ----------------------------
INSERT INTO `crm_outlibs` VALUES (3, 8, '20181103042747', 3, '未处理', NULL, 'admin( 姐姐 )', NULL, '2018-11-03 04:27:47', '2018-11-03 04:27:47');
INSERT INTO `crm_outlibs` VALUES (4, 8, '20181103042747', 3, '未处理', NULL, 'admin( 姐姐 )', NULL, '2018-11-03 04:27:47', '2018-11-03 04:27:47');
INSERT INTO `crm_outlibs` VALUES (5, 8, '20181103043222', 3, '未处理', NULL, 'admin( 姐姐 )', NULL, '2018-11-03 04:32:22', '2018-11-03 04:32:22');
INSERT INTO `crm_outlibs` VALUES (6, 4, '20181103043737', 1, '已收款', NULL, 'admin( 姐姐 )', NULL, '2018-11-03 04:37:37', '2018-11-03 10:43:53');
INSERT INTO `crm_outlibs` VALUES (7, 8, '20181103043737', 3, '已出货', 'admin( 姐姐 )', 'admin( 姐姐 )', '2018-11-03 11:55:50', '2018-11-03 04:37:37', '2018-11-03 11:55:50');
INSERT INTO `crm_outlibs` VALUES (8, 4, '20181103043737', 1, '已出货', 'admin( 姐姐 )', 'admin( 姐姐 )', '2018-11-03 11:53:17', '2018-11-03 04:37:37', '2018-11-03 11:53:17');

-- ----------------------------
-- Table structure for crm_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `crm_password_resets`;
CREATE TABLE `crm_password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for crm_permissions
-- ----------------------------
DROP TABLE IF EXISTS `crm_permissions`;
CREATE TABLE `crm_permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_permissions
-- ----------------------------
INSERT INTO `crm_permissions` VALUES (3, 'Alarm index', 'web', '2018-11-04 06:55:31', '2018-11-04 06:55:31');
INSERT INTO `crm_permissions` VALUES (4, 'Allo index', 'web', '2018-11-04 06:56:02', '2018-11-04 06:56:02');
INSERT INTO `crm_permissions` VALUES (5, 'Client index', 'web', '2018-11-04 06:57:00', '2018-11-04 06:57:00');
INSERT INTO `crm_permissions` VALUES (6, 'Documentary index', 'web', '2018-11-04 06:57:16', '2018-11-04 06:57:16');
INSERT INTO `crm_permissions` VALUES (7, 'Index index', 'web', '2018-11-04 06:57:30', '2018-11-04 06:57:30');
INSERT INTO `crm_permissions` VALUES (8, 'Inform index', 'web', '2018-11-04 06:57:47', '2018-11-04 06:57:47');
INSERT INTO `crm_permissions` VALUES (9, 'Inlib index', 'web', '2018-11-04 06:58:03', '2018-11-04 06:58:03');
INSERT INTO `crm_permissions` VALUES (10, 'Letter index', 'web', '2018-11-04 06:58:16', '2018-11-04 06:58:16');
INSERT INTO `crm_permissions` VALUES (11, 'Order index', 'web', '2018-11-04 06:58:37', '2018-11-04 06:58:37');
INSERT INTO `crm_permissions` VALUES (12, 'Outlib index', 'web', '2018-11-04 06:58:52', '2018-11-04 06:58:52');
INSERT INTO `crm_permissions` VALUES (13, 'Payment index', 'web', '2018-11-04 06:59:05', '2018-11-04 06:59:05');
INSERT INTO `crm_permissions` VALUES (14, 'Permission index', 'web', '2018-11-04 06:59:19', '2018-11-04 06:59:19');
INSERT INTO `crm_permissions` VALUES (15, 'Permission create', 'web', '2018-11-04 06:59:42', '2018-11-04 06:59:42');
INSERT INTO `crm_permissions` VALUES (17, 'Permission store', 'web', '2018-11-04 07:00:16', '2018-11-04 07:00:16');
INSERT INTO `crm_permissions` VALUES (18, 'Post index', 'web', '2018-11-04 07:00:26', '2018-11-04 07:00:26');
INSERT INTO `crm_permissions` VALUES (19, 'Procure index', 'web', '2018-11-04 07:00:39', '2018-11-04 07:00:39');
INSERT INTO `crm_permissions` VALUES (20, 'Product index', 'web', '2018-11-04 07:00:52', '2018-11-04 07:00:52');
INSERT INTO `crm_permissions` VALUES (21, 'Receipt index', 'web', '2018-11-04 07:01:08', '2018-11-04 07:01:08');
INSERT INTO `crm_permissions` VALUES (22, 'Staff index', 'web', '2018-11-04 07:01:24', '2018-11-04 07:01:24');
INSERT INTO `crm_permissions` VALUES (23, 'User index', 'web', '2018-11-04 07:01:37', '2018-11-04 07:01:37');
INSERT INTO `crm_permissions` VALUES (24, 'Work index', 'web', '2018-11-04 07:01:48', '2018-11-04 07:01:48');
INSERT INTO `crm_permissions` VALUES (25, 'User_Roles', 'web', '2018-11-04 17:55:30', '2018-11-04 17:55:32');
INSERT INTO `crm_permissions` VALUES (26, 'Role_Permission', 'web', '2018-11-04 17:55:57', '2018-11-04 17:56:00');
INSERT INTO `crm_permissions` VALUES (27, 'User_Role', 'web', '2018-11-04 17:56:17', '2018-11-04 17:56:21');

-- ----------------------------
-- Table structure for crm_posts
-- ----------------------------
DROP TABLE IF EXISTS `crm_posts`;
CREATE TABLE `crm_posts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 62 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_posts
-- ----------------------------
INSERT INTO `crm_posts` VALUES (15, 'php开发工程师', '2018-10-21 07:13:31', '2018-10-21 07:13:31');
INSERT INTO `crm_posts` VALUES (16, 'c#开发工程师', '2018-10-21 07:13:52', '2018-10-21 07:13:52');
INSERT INTO `crm_posts` VALUES (17, 'c++开发工程师', '2018-10-21 07:14:00', '2018-10-21 07:14:00');
INSERT INTO `crm_posts` VALUES (18, 'liunx工程师', '2018-10-21 07:14:14', '2018-10-21 07:14:14');
INSERT INTO `crm_posts` VALUES (19, '项目经理', '2018-10-21 07:14:29', '2018-10-21 07:14:29');
INSERT INTO `crm_posts` VALUES (20, '总经理', '2018-10-21 07:14:46', '2018-10-21 07:14:46');
INSERT INTO `crm_posts` VALUES (21, 'web前端开发工程师', '2018-10-21 07:15:01', '2018-10-21 07:15:01');
INSERT INTO `crm_posts` VALUES (22, 'go开发工程师', '2018-10-21 07:17:07', '2018-10-21 12:47:01');

-- ----------------------------
-- Table structure for crm_product_extends
-- ----------------------------
DROP TABLE IF EXISTS `crm_product_extends`;
CREATE TABLE `crm_product_extends`  (
  `product_id` int(11) NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_product_extends
-- ----------------------------
INSERT INTO `crm_product_extends` VALUES (3, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (4, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (5, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (6, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (7, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (8, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (9, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (10, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (11, '<p>test...!!!!<br/></p>');
INSERT INTO `crm_product_extends` VALUES (12, '<p>test....!!!<br/></p>');

-- ----------------------------
-- Table structure for crm_products
-- ----------------------------
DROP TABLE IF EXISTS `crm_products`;
CREATE TABLE `crm_products`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sn` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_price` decimal(10, 2) NOT NULL,
  `sell_price` decimal(10, 2) NOT NULL,
  `unit` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory` smallint(6) NULL DEFAULT 0,
  `inventory_in` mediumint(9) NULL DEFAULT 0,
  `inventory_out` mediumint(9) NULL DEFAULT 0,
  `inventory_alarm` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_products
-- ----------------------------
INSERT INTO `crm_products` VALUES (3, '10001', '计算器', '办公耗材', 100.00, 120.00, '个', 10, 10, 0, 10, '2018-10-26 11:44:56', '2018-10-29 12:11:07');
INSERT INTO `crm_products` VALUES (4, '10002', 'thinkpad -T580', '办公耗材', 9999.00, 12000.00, '台', 8, 10, 2, 10, '2018-10-26 11:50:41', '2018-11-03 04:37:37');
INSERT INTO `crm_products` VALUES (5, '10003', 'thinkpad -T480', '办公耗材', 9999.00, 12000.00, '台', 0, 0, 0, 10, '2018-10-26 11:51:03', '2018-10-26 11:51:03');
INSERT INTO `crm_products` VALUES (6, '10004', 'thinkpad -T480s', '办公耗材', 9999.00, 12000.00, '台', 20, 20, 0, 10, '2018-10-26 11:51:16', '2018-10-29 12:29:32');
INSERT INTO `crm_products` VALUES (7, '10005', '华为p20', '数码产品', 3999.00, 4399.00, '台', 0, 0, 0, 10, '2018-10-26 11:51:49', '2018-10-26 11:51:49');
INSERT INTO `crm_products` VALUES (8, '10006', '华为-mate20', '数码产品', 3999.00, 4399.00, '台', 28, 40, 12, 10, '2018-10-26 11:52:07', '2018-11-03 04:37:37');
INSERT INTO `crm_products` VALUES (9, '10007', 'iphone-xs', '数码产品', 3999.00, 4399.00, '台', 10, 10, 0, 10, '2018-10-26 11:53:46', '2018-10-29 12:13:34');
INSERT INTO `crm_products` VALUES (10, '10008', 'iphone-x', '数码产品', 3999.00, 4399.00, '台', 0, 0, 0, 10, '2018-10-26 11:54:06', '2018-10-29 10:20:34');
INSERT INTO `crm_products` VALUES (11, '10009', 'iphone-xx', '数码产品', 3999.00, 4399.00, '台', 30, 30, 0, 10, '2018-10-26 11:55:33', '2018-10-29 12:51:40');
INSERT INTO `crm_products` VALUES (12, '10010', '鼠标', '办公耗材', 33.00, 33.00, '个', 10, 10, 0, 10, '2018-10-26 12:10:55', '2018-10-29 12:03:28');

-- ----------------------------
-- Table structure for crm_receipts
-- ----------------------------
DROP TABLE IF EXISTS `crm_receipts`;
CREATE TABLE `crm_receipts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_sn` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` decimal(8, 2) NOT NULL,
  `enter` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of crm_receipts
-- ----------------------------
INSERT INTO `crm_receipts` VALUES (1, 'test...!!!收款', '20181103043737', 20000.00, 'admin( 姐姐 )', 'test...!!!收款test...!!!收款test...!!!收款', '2018-11-03 10:43:53', '2018-11-03 10:43:53');

-- ----------------------------
-- Table structure for crm_role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `crm_role_has_permissions`;
CREATE TABLE `crm_role_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of crm_role_has_permissions
-- ----------------------------
INSERT INTO `crm_role_has_permissions` VALUES (3, 2);
INSERT INTO `crm_role_has_permissions` VALUES (4, 2);
INSERT INTO `crm_role_has_permissions` VALUES (5, 2);
INSERT INTO `crm_role_has_permissions` VALUES (6, 2);
INSERT INTO `crm_role_has_permissions` VALUES (7, 1);
INSERT INTO `crm_role_has_permissions` VALUES (7, 2);
INSERT INTO `crm_role_has_permissions` VALUES (8, 2);
INSERT INTO `crm_role_has_permissions` VALUES (9, 2);
INSERT INTO `crm_role_has_permissions` VALUES (10, 2);
INSERT INTO `crm_role_has_permissions` VALUES (11, 2);
INSERT INTO `crm_role_has_permissions` VALUES (12, 2);
INSERT INTO `crm_role_has_permissions` VALUES (13, 2);
INSERT INTO `crm_role_has_permissions` VALUES (14, 2);
INSERT INTO `crm_role_has_permissions` VALUES (15, 2);
INSERT INTO `crm_role_has_permissions` VALUES (17, 2);
INSERT INTO `crm_role_has_permissions` VALUES (18, 2);
INSERT INTO `crm_role_has_permissions` VALUES (19, 2);
INSERT INTO `crm_role_has_permissions` VALUES (20, 2);
INSERT INTO `crm_role_has_permissions` VALUES (21, 2);
INSERT INTO `crm_role_has_permissions` VALUES (22, 2);
INSERT INTO `crm_role_has_permissions` VALUES (23, 2);
INSERT INTO `crm_role_has_permissions` VALUES (24, 2);
INSERT INTO `crm_role_has_permissions` VALUES (25, 2);
INSERT INTO `crm_role_has_permissions` VALUES (26, 2);
INSERT INTO `crm_role_has_permissions` VALUES (27, 2);
INSERT INTO `crm_role_has_permissions` VALUES (28, 2);

-- ----------------------------
-- Table structure for crm_roles
-- ----------------------------
DROP TABLE IF EXISTS `crm_roles`;
CREATE TABLE `crm_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_roles
-- ----------------------------
INSERT INTO `crm_roles` VALUES (1, '管理员', 'web', '2018-11-04 07:15:48', '2018-11-04 07:15:48');
INSERT INTO `crm_roles` VALUES (2, '超级管理员', 'web', '2018-11-04 07:15:59', '2018-11-04 07:15:59');

-- ----------------------------
-- Table structure for crm_staff_extends
-- ----------------------------
DROP TABLE IF EXISTS `crm_staff_extends`;
CREATE TABLE `crm_staff_extends`  (
  `staff_id` int(11) NOT NULL,
  `health` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_address` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduate_date` date NOT NULL,
  `graduate_college` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_staff_extends
-- ----------------------------
INSERT INTO `crm_staff_extends` VALUES (19, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (20, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (21, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (22, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (23, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (26, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (25, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (24, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (27, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (28, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (29, '良好', '计算机', '本地农村户口', '北京', '2018-10-02', '北京大学', 'test...!!!!', '<p>test...!!!!</p>');
INSERT INTO `crm_staff_extends` VALUES (30, '良好', '计算机', '本地农村户口', '北京', '2018-10-25', 'test学校', 'test。。。！！！', '<p>test。。。！！！</p>');
INSERT INTO `crm_staff_extends` VALUES (31, '良好', '计算机', '本地城市户口', '北京', '2018-10-26', '北京大学', 'test!!!1', '<p>test!!!1</p>');
INSERT INTO `crm_staff_extends` VALUES (32, '良好', '计算机', '本地城市户口', '北京', '2018-10-26', '北京大学', 'test!!!1', '<p>test!!!1</p>');
INSERT INTO `crm_staff_extends` VALUES (33, '良好', '计算机', '本地城市户口', '北京', '2018-10-26', '北京大学', 'test!!!1', '<p>test!!!1</p>');
INSERT INTO `crm_staff_extends` VALUES (34, '良好', '计算机', '本地城市户口', '北京', '2018-10-26', '北京大学', 'test!!!1', '<p>test!!!1</p>');

-- ----------------------------
-- Table structure for crm_staffs
-- ----------------------------
DROP TABLE IF EXISTS `crm_staffs`;
CREATE TABLE `crm_staffs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_status` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `dimission_date` date NOT NULL,
  `politics_statu` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_staffs
-- ----------------------------
INSERT INTO `crm_staffs` VALUES (19, NULL, '哈哈', '1001', '男', 'c#开发工程师', '正式员工', '450325199711151533', '18777327245', '汉族', '离异', '调休', '2018-10-04', '2018-10-19', '群众', '硕士', '2018-10-22 15:32:19', '2018-10-22 15:32:19');
INSERT INTO `crm_staffs` VALUES (20, NULL, '呵呵', '1002', '男', 'c#开发工程师', '正式员工', '450325199711151532', '18777327246', '汉族', '离异', '调休', '2018-10-04', '2018-10-19', '群众', '硕士', '2018-10-22 15:43:51', '2018-10-25 10:29:22');
INSERT INTO `crm_staffs` VALUES (21, NULL, '嘻嘻', '1003', '男', 'c#开发工程师', '正式员工', '450325199711151535', '18777327247', '汉族', '离异', '调休', '2018-10-04', '2018-10-19', '群众', '硕士', '2018-10-22 15:44:43', '2018-10-25 10:55:28');
INSERT INTO `crm_staffs` VALUES (22, NULL, '嚯嚯', '1004', '男', 'c#开发工程师', '正式员工', '450325199711151536', '18777327248', '汉族', '离异', '调休', '2018-10-04', '2018-10-19', '群众', '硕士', '2018-10-22 15:45:06', '2018-10-25 10:53:06');
INSERT INTO `crm_staffs` VALUES (24, NULL, '咯咯', '1006', '男', 'c#开发工程师', '正式员工', '450325199711151537', '18777327249', '汉族', '离异', '调休', '2018-10-04', '2018-10-19', '群众', '硕士', '2018-10-22 15:45:37', '2018-10-25 10:55:57');
INSERT INTO `crm_staffs` VALUES (27, 20, '噗噗', '1007', '男', 'php开发工程师', '正式员工', '450325199711151539', '18777327212', '汉族', '离异', '调休', '2018-10-04', '2018-10-19', '群众', '硕士', '2018-10-22 15:47:30', '2018-10-25 10:24:50');
INSERT INTO `crm_staffs` VALUES (28, NULL, '哥哥', '1008', '男', 'php开发工程师', '正式员工', '450325199711151521', '18777327276', '汉族', '离异', '调休', '2018-10-04', '2018-10-19', '群众', '硕士', '2018-10-22 15:48:52', '2018-10-25 10:55:28');
INSERT INTO `crm_staffs` VALUES (29, 2, '姐姐', '1009', '男', 'php开发工程师', '正式员工', '450325199711151527', '18777327292', '汉族', '离异', '调休', '2018-10-04', '2018-10-19', '群众', '硕士', '2018-10-22 15:49:13', '2018-10-29 06:38:19');
INSERT INTO `crm_staffs` VALUES (30, 18, 'test01', '2001', '男', 'php开发工程师', '正式员工', '450325199711151566', '18777327322', '汉族', '已婚', '在职', '2018-10-11', '2018-11-01', '群众', '中专', '2018-10-23 12:26:08', '2018-10-25 10:23:50');
INSERT INTO `crm_staffs` VALUES (31, 15, 'test02', '3301', '男', 'c#开发工程师', '临时员工', '450325199711151530', '18777327344', '汉族', '已婚', '调休', '2018-10-10', '2018-10-20', '群众', '本科', '2018-10-23 13:40:31', '2018-10-25 10:23:39');
INSERT INTO `crm_staffs` VALUES (32, 3, 'test02', '3302', '男', 'c#开发工程师', '临时员工', '450325199711151570', '18777227344', '汉族', '已婚', '调休', '2018-10-10', '2018-10-20', '群众', '本科', '2018-10-23 13:40:59', '2018-10-25 07:47:52');
INSERT INTO `crm_staffs` VALUES (33, NULL, 'test03', '3303', '男', 'c#开发工程师', '临时员工', '450425199711151570', '18277227344', '汉族', '已婚', '调休', '2018-10-10', '2018-10-20', '群众', '本科', '2018-10-23 13:41:23', '2018-10-29 06:38:19');
INSERT INTO `crm_staffs` VALUES (34, 14, 'test04', '3303', '男', 'c#开发工程师', '临时员工', '450425199711151570', '18277227344', '汉族', '已婚', '调休', '2018-10-10', '2018-10-20', '群众', '本科', '2018-10-23 13:41:23', '2018-10-25 10:23:25');

-- ----------------------------
-- Table structure for crm_users
-- ----------------------------
DROP TABLE IF EXISTS `crm_users`;
CREATE TABLE `crm_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_time` datetime(0) NOT NULL,
  `last_login_ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_count` int(11) NOT NULL,
  `state` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_users
-- ----------------------------
INSERT INTO `crm_users` VALUES (2, 'admin', NULL, '$2y$10$460W.1gE3ChT2bKPoJbWT.DPTwu7cJzqNafuJwiSZkNG8K9UBrk0a', '2018-10-25 07:44:14', '127.0.0.1', 0, '正常', '姐姐', '0v2Y3CbhbYaqblJ9fiJSWHtu7FtHjFZZtXN9gKOZypqYMdu4n3qnj5lx62o3', '2018-10-25 07:44:14', '2018-10-29 06:38:19');
INSERT INTO `crm_users` VALUES (3, 'admin01', NULL, '$2y$10$JOkexe0sV6V0.fyvFUmBbemn2C2fjdzYUVrRhLa9kgIBVx7UkSfvC', '2018-10-25 07:47:52', '127.0.0.1', 0, '正常', 'test02', 'DwkcxRplSQbUHQzLK2K44SNhYALfUlAvaxvaUVqDRn3PyKthhtA5r67H55nc', '2018-10-25 07:47:52', '2018-10-25 07:47:52');
INSERT INTO `crm_users` VALUES (14, 'admin02', NULL, '$2y$10$LdpAejC0CKBZjn/0p8BqjOGNiFRaAIoKSuPzqRJzGAp9MxwxiDx6u', '2018-10-25 10:23:24', '127.0.0.1', 0, '正常', 'test04', 'a2LiRcFpmLufY5FlHDNCaaoasUqIIUdcrHJ06x0auNJSM4rwQvfqGRflbZpy', '2018-10-25 10:23:25', '2018-10-25 10:23:25');
INSERT INTO `crm_users` VALUES (15, 'admin03', NULL, '$2y$10$LlevY6eDtjCrMAOWZSgZMOnB97bRXPAnmDKEmFMZ13/72.mTK8NCG', '2018-10-25 10:23:39', '127.0.0.1', 0, '正常', 'test02', NULL, '2018-10-25 10:23:39', '2018-10-25 10:23:39');
INSERT INTO `crm_users` VALUES (18, 'admin04', NULL, '$2y$10$e1v/.NoxzCDHGq78UG/nB.Z/9yEP7jYayp0OCRiahpr2vH3QrJ3sO', '2018-10-25 10:23:50', '127.0.0.1', 0, '正常', 'test01', NULL, '2018-10-25 10:23:50', '2018-10-25 10:23:50');
INSERT INTO `crm_users` VALUES (20, 'admin05', NULL, '$2y$10$ao/2oFmP7ItuVQY2MjAi5umRsGSVm8WkezSRUenrtBClTaxWxtdKa', '2018-10-25 10:24:50', '127.0.0.1', 0, '正常', '噗噗', NULL, '2018-10-25 10:24:50', '2018-10-25 10:24:50');

-- ----------------------------
-- Table structure for crm_work_stages
-- ----------------------------
DROP TABLE IF EXISTS `crm_work_stages`;
CREATE TABLE `crm_work_stages`  (
  `work_id` int(11) NOT NULL,
  `title` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_work_stages
-- ----------------------------
INSERT INTO `crm_work_stages` VALUES (4, '创建工作任务', '2018-11-03 13:28:29', '2018-11-03 13:28:29');
INSERT INTO `crm_work_stages` VALUES (7, '创建工作任务', '2018-11-03 13:29:11', '2018-11-03 13:29:11');
INSERT INTO `crm_work_stages` VALUES (7, 'test...!!!', '2018-11-03 13:29:30', '2018-11-03 13:29:30');
INSERT INTO `crm_work_stages` VALUES (7, 'test...!!!01', '2018-11-03 13:29:36', '2018-11-03 13:29:36');
INSERT INTO `crm_work_stages` VALUES (8, '创建工作任务', '2018-11-03 14:20:20', '2018-11-03 14:20:20');
INSERT INTO `crm_work_stages` VALUES (8, 'test...!!!222', '2018-11-03 14:24:11', '2018-11-03 14:24:11');
INSERT INTO `crm_work_stages` VALUES (8, 'test...!!!333', '2018-11-03 14:24:19', '2018-11-03 14:24:19');

-- ----------------------------
-- Table structure for crm_works
-- ----------------------------
DROP TABLE IF EXISTS `crm_works`;
CREATE TABLE `crm_works`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `allo_id` int(11) NOT NULL,
  `allo_name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crm_works
-- ----------------------------
INSERT INTO `crm_works` VALUES (4, 'crm系统的开发', '业务', '创建工作计划', '进行中', '2018-11-08', '2018-11-17', 2, 'admin( 姐姐 )', 2, 'admin( 姐姐 )', '2018-11-03 13:28:29', '2018-11-03 13:28:29');
INSERT INTO `crm_works` VALUES (7, 'crm系统的开发02', '业务', 'test...!!!01', '已完成', '2018-11-08', '2018-11-17', 2, 'admin( 姐姐 )', 2, 'admin( 姐姐 )', '2018-11-03 13:29:11', '2018-11-03 13:29:38');
INSERT INTO `crm_works` VALUES (8, 'test...!!!3333', '业务', 'test...!!!333', '已完成', '2018-11-01', '2018-11-14', 32, 'test02', 2, 'admin( 姐姐 )', '2018-11-03 14:20:20', '2018-11-03 14:24:31');

SET FOREIGN_KEY_CHECKS = 1;
