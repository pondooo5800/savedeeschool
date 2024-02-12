/*
 Navicat Premium Data Transfer

 Source Server         : localhost_mamp
 Source Server Type    : MySQL
 Source Server Version : 50734
 Source Host           : localhost:8889
 Source Schema         : oems_beta

 Target Server Type    : MySQL
 Target Server Version : 50734
 File Encoding         : 65001

 Date: 07/02/2024 02:16:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for courseopens
-- ----------------------------
DROP TABLE IF EXISTS `courseopens`;
CREATE TABLE `courseopens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of courseopens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of courses
-- ----------------------------
BEGIN;
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (24, 'Oracle Database 11g', '<p>This Oracle Database 11g: SQL Fundamentals I - Self-Study Coursec is designed to teach you the fundamentals of SQL using Oracle Database 11g database technology. Using the powerful Structured Query Language (SQL), the data contained within relational databases can be retrieved, managed, and manipulated.</p>', '2021-08-18 02:23:15', '2021-08-18 02:23:15');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (23, 'AWS Certified Database', '<p>Earn an industry-recognized credential from AWS that validates your expertise in the breadth of AWS database services and accelerating the use of database technology to drive your organization&rsquo;s business transformation. Build credibility and confidence by highlighting your ability to design, recommend, and maintain the optimal AWS database solution for a use case.</p>', '2021-08-18 02:23:15', '2021-08-18 02:23:15');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (32, 'รถจักรยานยนต์ 15 ชม.', '<p class=\"MsoNormal\" style=\"margin-bottom: 0cm;\"><span style=\"font-family: Angsana New, serif;\"><span style=\"font-size: 21.3333px;\"><strong>wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</strong></span></span></p>', '2024-01-07 07:06:47', '2024-01-21 14:49:12');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (33, 'รถยนต์ 15 ชม. ( ไม่มีพื้นฐาน )', '<p class=\"MsoNormal\" style=\"margin-bottom: 0cm;\"><strong><span lang=\"TH\" style=\"font-size: 16.0pt; line-height: 107%; font-family: \'Angsana New\',serif;\">เรียน อบรม และสอบที่โรงเรียน <span style=\"mso-spacerun: yes;\">&nbsp;</span></span></strong></p>', '2024-01-07 07:07:31', '2024-01-07 07:10:17');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (34, 'รถยนต์ 15 ชม. ( มีพื้นฐาน )', '<p>รถยนต์ 15 ชม. ( ไม่มีพื้นฐาน )</p>', '2024-01-07 07:10:31', '2024-01-07 07:10:31');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (35, 'เรียนขับรถยนต์เสริทมทักษะ', '<p>ต้องกาาความมั่นใจ</p>', '2024-01-07 07:11:12', '2024-01-07 07:11:12');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (36, 'รถยนขนส่ง ชนิดที่ 2', '<p>2</p>', '2024-01-07 07:11:45', '2024-01-07 07:11:45');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (37, 'รถขนส่ง ชนิดที่ 3', '<p>3</p>', '2024-01-07 07:12:05', '2024-01-07 07:12:17');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (38, 'อบรมต่อใบขับขี่', '<p>ต่อ</p>', '2024-01-07 07:12:41', '2024-01-07 07:12:41');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (39, 'ทำบัตรและต่อบัตร TSM', '<p>TSM</p>', '2024-01-07 07:13:10', '2024-01-07 07:13:10');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (40, 'ทำบัตรและต่อบัตร ADR', '<p>ADR</p>', '2024-01-07 07:13:39', '2024-01-07 07:13:39');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (41, 'อบรมพนักงานขับรถ', '<p>เสริมทักษะ ความรู้ความสามารถในการขับขี่</p>', '2024-01-07 07:14:33', '2024-01-07 07:14:33');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (42, 'รถโฟคลิฟท์', '<p>ลิฟ</p>', '2024-01-07 07:15:16', '2024-01-07 07:15:16');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (43, 'รถป้ายแดงและรถมือสอง', '<p>รถมือสอง</p>', '2024-01-07 07:15:43', '2024-01-07 07:15:43');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (44, 'เช้คเบี้ยประกันภัยปี 2024', '<p>2024</p>', '2024-01-07 07:16:27', '2024-01-07 07:16:27');
INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (45, 'asf', '<p>sdfasdf</p>', '2024-02-06 09:01:42', '2024-02-06 09:01:42');
COMMIT;

-- ----------------------------
-- Table structure for enrolments
-- ----------------------------
DROP TABLE IF EXISTS `enrolments`;
CREATE TABLE `enrolments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) unsigned NOT NULL,
  `course_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of enrolments
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2020_11_01_055336_create_courses_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2020_11_05_014416_create_quizzes_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2020_11_05_021601_create_questions_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2020_11_08_140402_create_user_quizzes_table', 5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13, '2020_12_04_081252_create_products_table', 6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18, '2020_12_05_133218_create_sessions_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19, '2020_12_11_155656_create_students_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20, '2021_08_14_152617_create_settings_table', 8);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21, '2021_08_15_110730_create_ratings_table', 9);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_options` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_answers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of questions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for quizzes
-- ----------------------------
DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE `quizzes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_qns` int(11) NOT NULL,
  `review_qns` tinyint(1) NOT NULL DEFAULT '0',
  `show_answer` tinyint(1) NOT NULL DEFAULT '0',
  `show_pagination` tinyint(1) NOT NULL DEFAULT '0',
  `duration_lb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `passing_grade` decimal(5,2) NOT NULL,
  `retake` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `available_on` datetime DEFAULT NULL,
  `random_qns` tinyint(4) NOT NULL,
  `qns_list` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_rate` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of quizzes
-- ----------------------------
BEGIN;
INSERT INTO `quizzes` (`id`, `course_id`, `title`, `description`, `number_qns`, `review_qns`, `show_answer`, `show_pagination`, `duration_lb`, `duration`, `passing_grade`, `retake`, `created_at`, `updated_at`, `available_on`, `random_qns`, `qns_list`, `status`, `access_code`, `allow_rate`) VALUES (7, '24', 'Oracle Database 11g: SQL Fundamentals I', '<h4>&nbsp;</h4>', 10, 0, 0, 1, 'minute', 20, 80.00, 0, '2021-08-18 01:51:13', '2021-08-18 02:30:21', '2021-08-18 10:00:00', 1, NULL, 'Active', 'Lgr6N6u6Jy', 1);
INSERT INTO `quizzes` (`id`, `course_id`, `title`, `description`, `number_qns`, `review_qns`, `show_answer`, `show_pagination`, `duration_lb`, `duration`, `passing_grade`, `retake`, `created_at`, `updated_at`, `available_on`, `random_qns`, `qns_list`, `status`, `access_code`, `allow_rate`) VALUES (6, '23', 'Amazon AWS Certified Database - Specialty Exam', '<h4>Language&nbsp;</h4>\r\n<p>This exam is offered in English.</p>\r\n<h4>Response types</h4>\r\n<p>There are two types of questions on the exam:</p>\r\n<p>a) Multiple choice: Has one correct response and three incorrect responses (distractors)</p>\r\n<p>b) Multiple responses: Has two or more correct responses out of five or more response options</p>\r\n<p>Select one or more responses that best complete the statement or answer the question. Distractors, or incorrect answers, are response options that a candidate with incomplete knowledge or skill might choose. Distractors are generally plausible responses that match the content area. Unanswered questions are scored as incorrect; there is no penalty for guessing. The exam includes 20 questions that will affect your score.</p>\r\n<h4>Exam results&nbsp;</h4>\r\n<p>The AWS Certified Database exam is a pass or fail exam. The exam is scored against a minimum standard established by AWS professionals who follow certification industry best practices and guidelines. Your score shows how you performed on the exam as a whole and whether or not you passed. Scaled scoring models help equate scores across multiple exam forms that might have slightly different difficulty levels.</p>', 5, 1, 1, 1, 'minute', 50, 80.00, 0, '2021-08-14 12:49:28', '2021-08-18 00:05:16', NULL, 1, NULL, 'Active', 'SlxIfwIsGV', 1);
COMMIT;

-- ----------------------------
-- Table structure for ratings
-- ----------------------------
DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ratings
-- ----------------------------
BEGIN;
INSERT INTO `ratings` (`id`, `student_id`, `quiz_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES (2, 6, 6, 2, 'This course is very difficult. I failed badly in this course.', '2021-08-16 19:15:36', '2021-08-16 19:15:42');
INSERT INTO `ratings` (`id`, `student_id`, `quiz_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES (3, 7, 6, 4, 'I have passed.', '2021-08-17 10:58:08', '2021-08-17 10:58:08');
INSERT INTO `ratings` (`id`, `student_id`, `quiz_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES (4, 8, 6, 2, 'Very difficult, I don\'t know how to do the question.', '2021-08-17 11:19:36', '2021-08-17 11:19:36');
INSERT INTO `ratings` (`id`, `student_id`, `quiz_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES (5, 9, 6, 1, 'This quiz is super difficult.', '2021-08-18 01:14:51', '2021-08-18 01:14:51');
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
BEGIN;
INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `option`, `value`) VALUES (1, '2021-08-14 14:50:00', '2023-12-30 09:13:26', 'name', 'SAVEDEE');
INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `option`, `value`) VALUES (4, '2021-08-15 09:32:47', '2021-08-15 09:32:47', 'sender-email', 'nonereply@oems.com');
INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `option`, `value`) VALUES (3, '2021-08-15 01:16:04', '2023-12-30 09:13:26', 'copyright', 'SAVEDEE');
INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `option`, `value`) VALUES (5, '2021-08-15 09:32:47', '2021-08-15 09:32:47', 'smtp-server', 'smtp.gmail.com');
INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `option`, `value`) VALUES (6, '2021-08-15 09:32:47', '2021-08-15 09:32:47', 'smtp-username', 'sgwebfreelancer@gmail.com');
INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `option`, `value`) VALUES (7, '2021-08-15 09:32:47', '2021-08-15 09:32:47', 'smtp-password', '1812wynn');
INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `option`, `value`) VALUES (8, '2021-08-15 09:32:47', '2021-08-15 09:32:47', 'smtp-port', '465');
INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `option`, `value`) VALUES (9, '2021-08-15 10:12:43', '2021-08-15 10:12:43', 'smtp-encryption', 'SSL');
COMMIT;

-- ----------------------------
-- Table structure for slides
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of slides
-- ----------------------------
BEGIN;
INSERT INTO `slides` (`id`, `title`, `image_name`, `created_at`, `updated_at`) VALUES (12, '1', '1705846032.jpg', '2024-01-21 14:07:12', '2024-01-21 14:07:12');
INSERT INTO `slides` (`id`, `title`, `image_name`, `created_at`, `updated_at`) VALUES (13, '22', '1706774361.jpg', '2024-02-01 07:43:31', '2024-02-01 07:59:21');
COMMIT;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logged_in` datetime DEFAULT NULL,
  `access_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_quiz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_student_number_unique` (`student_number`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of students
-- ----------------------------
BEGIN;
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (9, 'Koo Cui Ling', 'clkoo@hotmail.com', 'KIM8976546', '2021-08-18 03:17:14', 'Lgr6N6u6Jy', '7', '2021-08-17 23:38:23', '2021-08-18 02:17:14');
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (8, 'Zamind Ali', 'zaminda@hotmail.com', 'UEN202109843', '2021-08-17 12:07:55', 'SlxIfwIsGV', '6', '2021-08-17 11:07:55', '2021-08-17 11:07:55');
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (6, 'Chan Chong Meng', 'chongmeng95@hotmail.com', 'UE89098495', '2021-08-17 08:31:37', 'SlxIfwIsGV', '6', '2021-08-14 12:22:48', '2021-08-17 07:31:37');
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (7, 'Tan Siong Mei', 'siongmei95@oems.edu.uk', 'UEN20210989', '2021-08-17 11:53:25', 'SlxIfwIsGV', '6', '2021-08-17 10:53:25', '2021-08-17 10:53:25');
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (10, 'รัฐพงศ์ ภูสีโสม', 'pondooo5800@gmail.com', 'AC123', NULL, NULL, NULL, '2023-12-31 08:08:08', '2023-12-31 08:08:08');
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (12, 'eee', 'owner1@email.com', 'SD57719691', NULL, NULL, NULL, '2024-01-05 08:33:44', '2024-01-05 08:33:44');
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (14, 'Rattapong', 'owner@email.com', 'SD28267416', NULL, NULL, NULL, '2024-01-05 08:47:41', '2024-01-05 08:47:41');
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (20, 'Rattapong', 'pond_5800_pond@hotmail.com', 'SD72089007', NULL, NULL, NULL, '2024-01-21 13:50:57', '2024-01-21 13:50:57');
INSERT INTO `students` (`id`, `name`, `email`, `student_number`, `logged_in`, `access_code`, `current_quiz`, `created_at`, `updated_at`) VALUES (21, 'ds', 'sdf2@adsf.com', 'SD81349839', NULL, NULL, NULL, '2024-01-22 04:37:42', '2024-01-22 04:37:42');
COMMIT;

-- ----------------------------
-- Table structure for user_quizzes
-- ----------------------------
DROP TABLE IF EXISTS `user_quizzes`;
CREATE TABLE `user_quizzes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `question_answers` longtext COLLATE utf8mb4_unicode_ci,
  `results` longtext COLLATE utf8mb4_unicode_ci,
  `current_question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_correct` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_json` text COLLATE utf8mb4_unicode_ci,
  `time_taken` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_quizzes
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'admin', 'ADMIN', 'admin@gmail.com', NULL, '$2y$10$v9nUkPE8S7RQKvtVnqBHZeQ8J0DEGXqLbAbj0pvFQ2uCclKaBxXeq', NULL, '2020-10-31 13:46:09', '2020-10-31 13:46:09');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
