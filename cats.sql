-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table cats.cats
CREATE TABLE IF NOT EXISTS `cats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` varchar(60) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cats.cats: ~1 rows (approximately)
INSERT IGNORE INTO `cats` (`id`, `first_name`, `last_name`, `age`, `phone`, `total`, `created_at`, `updated_at`) VALUES
	(28, 'John', 'Doe', '5', '1234567890', 0.00, '2024-07-19 09:55:05', '2024-07-19 09:55:05');

-- Dumping structure for table cats.cat_courses
CREATE TABLE IF NOT EXISTS `cat_courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `cat_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_course_id` (`course_id`),
  KEY `index_cat_id` (`cat_id`),
  CONSTRAINT `forign_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `cats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `forign_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cats.cat_courses: ~19 rows (approximately)
INSERT IGNORE INTO `cat_courses` (`id`, `course_id`, `cat_id`) VALUES
	(19, 1, 28),
	(20, 2, 28);

-- Dumping structure for table cats.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cats.courses: ~5 rows (approximately)
INSERT IGNORE INTO `courses` (`id`, `name`, `thumb`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Курс «Тигидик»', '/dist/images/c1.png', 600.00, '2024-07-18 11:37:22', '2024-07-19 05:35:13', NULL),
	(2, 'Курс «Я не їв вічність»', '/dist/images/c2.png', 350.00, '2024-07-18 11:37:22', '2024-07-19 05:35:25', NULL),
	(3, 'Курс «Хопа»', '/dist/images/c3.png', 1000.00, '2024-07-18 11:37:22', '2024-07-19 05:35:29', NULL),
	(4, 'Курс «Кусь»', '/dist/images/c4.png', 50.00, '2024-07-18 11:37:22', '2024-07-19 05:35:37', NULL),
	(5, 'Курс «У всьому винен пес»', '/dist/images/c5.png', 600.00, '2024-07-18 11:37:22', '2024-07-19 05:35:40', NULL);

-- Dumping structure for table cats.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cats.migration: ~4 rows (approximately)
INSERT IGNORE INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1721380336),
	('m240718_134700_create_courses', 1721380338),
	('m240718_134702_create_cats', 1721380338),
	('m240718_134703_create_cat_courses', 1721380338);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
