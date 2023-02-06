-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table custom_auth.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table custom_auth.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `token`, `is_verified`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'da.duon', 'da.duon1997@gmail.com', 'AoPcsFkUWPYMyYNu3VekYu95c1DNS4Gq4NSOSuJztP8J5HOXY0wO2sgOWppX', 0, NULL, '$2y$10$XH7ujzaXYQajzkE4jz3DyuQB11COc7w45sQbWlXlEuB.lJzu2ZR4i', NULL, '2022-04-01 10:55:55', '2022-04-01 06:48:11'),
	(2, 'da', 'dda.student@puthisastra.edu.kh', 'zDDVbvUqOE17vUA1AY9Q068jBaEsYdMfYH5TOZFUrJkX66SwAQKvgZgml7ND', 0, NULL, '$2y$10$IJnAYkFm.YLZR5GP5euXuuv7c/Uoz7sKufmg36ZDpL9aCf8uHEeo2', NULL, '2022-04-01 04:22:11', '2022-04-01 06:47:40'),
	(3, 'ziruhygu', 'zaviw@mailinator.com', '', 0, NULL, '$2y$10$mFdy0SI1WReQtxaLvs2y6erBZ0zJHHs/igT7IhxyENntV/n6d2.r6', NULL, '2022-04-01 06:40:30', '2022-04-01 09:12:29'),
	(4, 'user', 'user@gmail.com', NULL, 0, NULL, '$2y$10$qnfN3m4t8eZwTx9hYZSAL.MT54x0iU0SQ56RiHsHfBsa5e1ozSuOG', NULL, '2022-04-20 09:42:23', '2022-04-20 09:42:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
