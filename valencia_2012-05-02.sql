# ************************************************************
# Sequel Pro SQL dump
# Версия 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Адрес: localhost (MySQL 5.1.44)
# Схема: valencia
# Время создания: 2012-05-02 21:25:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы agreements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agreements`;

CREATE TABLE `agreements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `number` char(32) DEFAULT '',
  `date_sign` date DEFAULT NULL,
  `is_sent` int(11) DEFAULT NULL,
  `is_returned` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `agreements` WRITE;
/*!40000 ALTER TABLE `agreements` DISABLE KEYS */;

INSERT INTO `agreements` (`id`, `company_id`, `number`, `date_sign`, `is_sent`, `is_returned`)
VALUES
	(1,2,'143/d','0005-12-20',1,1),
	(2,1,'14','2012-12-05',1,0),
	(3,1,'12','2017-05-05',0,0);

/*!40000 ALTER TABLE `agreements` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы appositions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `appositions`;

CREATE TABLE `appositions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agreement_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `statement_date` date DEFAULT NULL,
  `faktura_date` date DEFAULT NULL,
  `is_statement_returned` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `number` char(64) DEFAULT NULL,
  `date_sign` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `appositions` WRITE;
/*!40000 ALTER TABLE `appositions` DISABLE KEYS */;

INSERT INTO `appositions` (`id`, `agreement_id`, `type`, `invoice_date`, `statement_date`, `faktura_date`, `is_statement_returned`, `user_id`, `number`, `date_sign`)
VALUES
	(1,1,NULL,'2012-10-11',NULL,NULL,NULL,2,'1','2012-11-11');

/*!40000 ALTER TABLE `appositions` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы companys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companys`;

CREATE TABLE `companys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `address` text,
  `phone` text,
  `persons` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `companys` WRITE;
/*!40000 ALTER TABLE `companys` DISABLE KEYS */;

INSERT INTO `companys` (`id`, `name`, `address`, `phone`, `persons`)
VALUES
	(1,'Адривер','ул. Радио, д. 24, строение 1 (бизнес-центр «Яуза-Тауэр»), 2 подъезд, 5 этаж, офис 507, Москва, 105005\n\nКак нас найти: выходите из метро на станции Бауманская, переходите дорогу и садитесь на любой трамвай или маршрутку. Доезжаете до остановки «Лефортовская набережная». Далее двигаетесь по направлению движения автомобилей до конца длинного здания. Поворачиваете направо и заходите во второй подъезд. Мы находимся на 5-ом этаже БЦ «Яуза Тауэр».','+7 (495) 981-44-00',NULL),
	(2,'Соль','Россия, 127006, г. Москва,\nул. Малая Дмитровка, д. 20,\nБизнес Центр «Школа журналистов», 3 этаж','+7 (495) 980-80-68',NULL);

/*!40000 ALTER TABLE `companys` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы documents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `date_to_go` date DEFAULT NULL,
  `flags` int(11) DEFAULT NULL,
  `history` mediumtext,
  `notes` mediumtext,
  `owner_id` int(11) DEFAULT NULL,
  `backcall_id` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;

INSERT INTO `documents` (`id`, `company_id`, `date_to_go`, `flags`, `history`, `notes`, `owner_id`, `backcall_id`, `person_id`)
VALUES
	(1,1,'2012-05-03',NULL,NULL,'sdf',1,2,0);

/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы persons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `persons`;

CREATE TABLE `persons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(25) DEFAULT NULL,
  `surname` char(25) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `phone` tinytext,
  `position` tinytext,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;

INSERT INTO `persons` (`id`, `name`, `surname`, `email`, `phone`, `position`, `company_id`)
VALUES
	(1,'Ольга','Лукьянчук','olga.lukyanchuk@sol-agency.ru','+7 985 996 26 20 (моб)','Senior media manager',2),
	(2,'Дмитрий','Карманов','dmitriy.karmanov@sup.com','+7 (916) 557-28-01 (моб)','Директор Департамента Рекламных Технологий и Автоматизации',2);

/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT '',
  `surname` char(20) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `email` char(64) DEFAULT NULL,
  `flags` char(10) DEFAULT NULL,
  `password` char(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `surname`, `phone`, `email`, `flags`, `password`)
VALUES
	(1,'Андрей','Соловьев','775147527','andrey.a.soloviev@gmail.com','31','reclesib'),
	(2,'Екатерина','Давыдова',NULL,'штывафыва','7','фывафыва');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
