-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2017_06_29_083152_create_themes_table',	1),
(4,	'2017_06_29_083213_create_questions_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `theme_id` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `answer` text,
  `asking_user_name` text NOT NULL,
  `asking_user_email` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_theme_id_foreign` (`theme_id`),
  CONSTRAINT `questions_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`id`, `theme_id`, `text`, `date`, `answer`, `asking_user_name`, `asking_user_email`, `status`, `created_at`, `updated_at`) VALUES
(3,	1,	'Как вывести текст на странице?',	'2017-07-07 11:51:30',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Анатолий',	'we@xn--we-tmc.ru',	1,	'2017-07-07 06:51:30',	'2017-07-10 01:52:46'),
(6,	8,	'Как написать разметку?',	'2017-07-09 12:53:57',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Андрей',	'we@we.ru',	1,	'2017-07-09 07:53:57',	'2017-07-10 01:52:56'),
(8,	9,	'Что такое селектор класса?',	'2017-07-10 06:53:30',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Петр',	'ffgtg@efwe.ru',	2,	'2017-07-10 01:53:30',	'2017-07-10 02:13:58'),
(9,	2,	'Как написать строку подключения к БД?',	'2017-07-10 06:54:10',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Алексей',	'wikool@frbt.ru',	1,	'2017-07-10 01:54:10',	'2017-07-10 02:14:30'),
(10,	1,	'Как объявить переменную?',	'2017-07-10 07:04:32',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Дмитрий',	'we@we.ru',	2,	'2017-07-10 02:04:32',	'2017-07-10 02:15:02'),
(11,	1,	'Как установить Laravel?',	'2017-07-10 07:05:05',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Степан',	'ervvbyb@ervtvt.com',	2,	'2017-07-10 02:05:05',	'2017-07-10 02:15:06'),
(12,	1,	'Что такое шаблонизатор?',	'2017-07-10 07:05:37',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Евгений',	'avervek@yandex.ru',	1,	'2017-07-10 02:05:37',	'2017-07-10 02:15:10'),
(13,	2,	'Как создать базу данных?',	'2017-07-10 07:06:24',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Роман',	'weeee@rrvwe.ru',	1,	'2017-07-10 02:06:24',	'2017-07-10 02:14:39'),
(14,	2,	'Как создать таблицу в БД?',	'2017-07-10 07:07:41',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Яна',	'wrrre@fhhhh.ru',	1,	'2017-07-10 02:07:41',	'2017-07-10 02:14:25'),
(15,	2,	'Что такое localhost?',	'2017-07-10 07:08:31',	'',	'Семен',	'wewein@gmail.com',	0,	'2017-07-10 02:08:31',	'2017-07-10 02:08:31'),
(16,	8,	'Что такое тег?',	'2017-07-10 07:10:04',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Андрей',	'email@ewce.ru',	1,	'2017-07-10 02:10:04',	'2017-07-10 02:14:03'),
(17,	8,	'Как вставить видео на страницу?',	'2017-07-10 07:10:28',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Сергей',	'wqqe@weqq.ru',	2,	'2017-07-10 02:10:28',	'2017-07-10 02:14:18'),
(18,	8,	'Как вывести изображение на страницу?',	'2017-07-10 07:11:07',	'',	'Анатолий',	'we@we.ru',	0,	'2017-07-10 02:11:07',	'2017-07-10 02:11:07'),
(19,	9,	'Что такое каскадные таблицы стилей?',	'2017-07-10 07:11:47',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Лев',	'awed2@gmail.com',	1,	'2017-07-10 02:11:47',	'2017-07-10 02:13:44'),
(20,	9,	'Как подключить файл стилей?',	'2017-07-10 07:12:16',	'',	'Ольга',	'wewen@gmqefwail.com',	0,	'2017-07-10 02:12:16',	'2017-07-10 02:12:16'),
(21,	9,	'Что такое БЭМ?',	'2017-07-10 07:12:50',	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',	'Владимир',	'wwwwe@wwwwwe.ru',	1,	'2017-07-10 02:12:50',	'2017-07-10 02:13:50');

DROP TABLE IF EXISTS `themes`;
CREATE TABLE `themes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `themes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'PHP',	'2017-07-07 06:50:15',	'2017-07-07 06:50:15'),
(2,	'MySQL',	'2017-07-07 06:50:21',	'2017-07-07 06:50:21'),
(8,	'HTML5',	'2017-07-09 07:46:32',	'2017-07-09 07:46:32'),
(9,	'CSS3',	'2017-07-09 07:46:37',	'2017-07-09 07:46:37');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4,	'Андрей Валерьевич',	'admin@gmail.com',	'$2y$10$OvQpUYbrSP1Aq31H7shDU.ldCpvuu0EO4KHWk9bAVKYIVC8ffUvce',	'S141hzFm8DYgr6PMpNa5CP9D0wIbXe9hHVthTuwcBFrA4Horp1xE8DzUxDCT',	'2017-07-06 13:36:28',	'2017-07-09 14:22:12'),
(6,	'Сергей Петрович',	'admin2@gmail.com',	'$2y$10$Suj21oYaco2hU/VtcLYZ7eNTNd3PLc49a/6Cizjl9Di.MNKa6gX52',	NULL,	'2017-07-09 14:24:51',	'2017-07-09 14:24:51'),
(7,	'Иван Иванович',	'admin3@gmail.com',	'$2y$10$tSUut1NyMHZXL5XG3OypN.w.VvWmA9Bt1FpnVYgQHdy54WPt5XDPe',	'IrndfviEbqhZLrM8UoeXi1W2jEdXANW5pRtMCEFkCBnaQGPhLXimXCg0XI8G',	'2017-07-09 14:25:06',	'2017-07-09 14:34:18');

-- 2017-07-10 07:16:51