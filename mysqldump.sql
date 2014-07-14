-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ungabunga
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `operator_id` int(11) DEFAULT NULL,
  `delivery_point_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unique_idx` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A45BDDC163EAC02A` (`unique_idx`),
  UNIQUE KEY `UNIQ_A45BDDC18A0E4E7F` (`reply_id`),
  KEY `IDX_A45BDDC19395C3F3` (`customer_id`),
  KEY `IDX_A45BDDC1584598A3` (`operator_id`),
  KEY `IDX_A45BDDC1A1492FCE` (`delivery_point_id`),
  KEY `application_email_idx` (`email`),
  CONSTRAINT `FK_A45BDDC1584598A3` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`id`),
  CONSTRAINT `FK_A45BDDC18A0E4E7F` FOREIGN KEY (`reply_id`) REFERENCES `application_reply` (`id`),
  CONSTRAINT `FK_A45BDDC19395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `FK_A45BDDC1A1492FCE` FOREIGN KEY (`delivery_point_id`) REFERENCES `delivery_point` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES (7,NULL,32,2,1,'bangatest20@mailforspam.com','191631070514','2014-05-07 19:16:31'),(8,NULL,35,2,1,'bangabongo3420@mailforspam.com','192141070514','2014-05-07 19:21:41'),(9,NULL,36,2,1,'tototo@mailforspam.com','160331140514','2014-05-14 16:03:31'),(10,NULL,36,3,1,'tototo@mailforspam.com','160928140514','2014-05-14 16:09:28'),(11,NULL,37,3,1,'111q1q@mailforspam.com','162238140514','2014-05-14 16:22:38'),(12,NULL,38,3,1,'11v11q@mailforspam.com','163446140514','2014-05-14 16:34:46'),(13,NULL,39,2,1,'bangabingo34@mailforspam.com','154821150514','2014-05-15 15:48:21'),(14,1,39,3,1,'bangabingo34@mailforspam.com','141517160514','2014-05-16 14:15:17'),(15,NULL,39,2,1,'bangabingo34@mailforspam.com','143507160514','2014-05-16 14:35:07'),(16,2,39,3,1,'bangabingo34@mailforspam.com','143545160514','2014-05-16 14:35:45'),(17,NULL,39,2,1,'bangabingo34@mailforspam.com','143641160514','2014-05-16 14:36:41'),(18,3,39,3,1,'bangabingo34@mailforspam.com','143657160514','2014-05-16 14:36:57'),(19,4,39,2,1,'bangabingo34@mailforspam.com','140003190514','2014-05-19 14:00:03'),(20,5,39,3,1,'bangabingo34@mailforspam.com','140041190514','2014-05-19 14:00:41'),(21,6,37,2,1,'111q1q@mailforspam.com','145444200514','2014-05-20 14:54:44'),(22,7,37,3,1,'111q1q@mailforspam.com','150052200514','2014-05-20 15:00:52'),(23,9,39,2,1,'bangabingo34@mailforspam.com','144334220514','2014-05-22 14:43:34'),(24,8,39,3,1,'bangabingo34@mailforspam.com','144348220514','2014-05-22 14:43:48'),(25,NULL,37,2,1,'111q1q@mailforspam.com','183600220514','2014-05-22 18:36:00'),(26,NULL,37,3,1,'111q1q@mailforspam.com','183607220514','2014-05-22 18:36:07'),(27,NULL,37,2,1,'111q1q@mailforspam.com','162519230514','2014-05-23 16:25:19'),(28,NULL,37,3,1,'111q1q@mailforspam.com','162537230514','2014-05-23 16:25:37'),(29,NULL,37,2,1,'111q1q@mailforspam.com','162635230514','2014-05-23 16:26:35'),(30,NULL,37,3,1,'111q1q@mailforspam.com','145759260514','2014-05-26 14:57:59'),(31,NULL,37,2,1,'111q1q@mailforspam.com','150157260514','2014-05-26 15:01:57'),(32,NULL,5,2,1,'artem_burnaev@mail.ru','190808260614','2014-06-26 19:08:08'),(33,NULL,5,2,2,'artem_burnaev@mail.ru','170642300614','2014-06-30 17:06:42'),(34,NULL,8,2,1,'test12398648@mailforspam.com','171223300614','2014-06-30 17:12:23');
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_data`
--

DROP TABLE IF EXISTS `application_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `shop_entry_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A1F9BEB3E030ACD` (`application_id`),
  KEY `IDX_5A1F9BEB618EB3D4` (`shop_entry_id`),
  CONSTRAINT `FK_5A1F9BEB3E030ACD` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`),
  CONSTRAINT `FK_5A1F9BEB618EB3D4` FOREIGN KEY (`shop_entry_id`) REFERENCES `shop_entry` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_data`
--

LOCK TABLES `application_data` WRITE;
/*!40000 ALTER TABLE `application_data` DISABLE KEYS */;
INSERT INTO `application_data` VALUES (11,7,1,4),(12,7,2,3),(13,8,2,4),(14,8,1,3),(15,9,1,0),(16,10,1,0),(17,11,1,0),(18,12,1,0),(19,13,1,2),(20,13,1,1),(21,14,1,1),(22,14,1,3),(23,15,2,4),(24,15,1,5),(25,16,1,1),(26,16,1,3),(27,17,1,1),(28,17,1,3),(29,18,1,2),(30,18,1,4),(31,19,2,0),(32,19,1,1),(33,19,1,0),(34,20,1,3),(35,21,1,0),(36,22,1,0),(37,23,1,1),(38,23,1,1),(39,24,1,1),(40,24,1,1),(41,24,1,1),(42,25,1,0),(43,26,1,0),(44,27,1,0),(45,28,2,0),(46,29,1,0),(47,30,1,0),(48,31,1,0),(49,32,2,1),(50,33,2,1),(51,34,1,0);
/*!40000 ALTER TABLE `application_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_reply`
--

DROP TABLE IF EXISTS `application_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1E3C219A3E030ACD` (`application_id`),
  KEY `IDX_1E3C219A23EDC87` (`subject_id`),
  CONSTRAINT `FK_1E3C219A23EDC87` FOREIGN KEY (`subject_id`) REFERENCES `application_reply_subject` (`id`),
  CONSTRAINT `FK_1E3C219A3E030ACD` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_reply`
--

LOCK TABLES `application_reply` WRITE;
/*!40000 ALTER TABLE `application_reply` DISABLE KEYS */;
INSERT INTO `application_reply` VALUES (1,14,2,'','2014-05-16 14:25:44'),(2,16,1,'','2014-05-16 14:47:33'),(3,18,3,'лдльпэжывьмижди<br>жадиь<br>','2014-05-16 14:48:43'),(4,19,2,'','2014-05-19 14:02:31'),(5,20,3,'Cdjq nlkld,f\'lcv\';kfmb\'kfm<br>','2014-05-19 14:02:52'),(6,21,2,'','2014-05-20 14:59:50'),(7,22,2,'стлцфьсцьф','2014-05-20 15:02:44'),(8,24,1,'dfdfdfdfdfdfvvso;fvjnalskfnlanb;lajfnb;janfb;lajnfblajneblajenb;lanb;lanb','2014-05-22 15:02:51'),(9,23,2,'','2014-05-22 15:05:35');
/*!40000 ALTER TABLE `application_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_reply_subject`
--

DROP TABLE IF EXISTS `application_reply_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_reply_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assigned_text` longtext COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F464AB235E237E06` (`name`),
  KEY `application_reply_subject_slug_idx` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_reply_subject`
--

LOCK TABLES `application_reply_subject` WRITE;
/*!40000 ALTER TABLE `application_reply_subject` DISABLE KEYS */;
INSERT INTO `application_reply_subject` VALUES (1,'Координаты (тест)','Примите координаты','Текст координат, текст, Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,Текст координат, текст,<br>','koordinaty-tiest','2014-05-04 15:30:38','2014-05-16 14:31:36'),(2,'Отказ (тест)','Заявка не будет выполнена (тест)','Текст отказа..<br>Текст, текст, текст<br>Текст, текст, текст<br>Текст, текст, текст<br>Текст, текст, текст<br>Текст, текст, текстТекст, текст, текстТекст, текст, текстТекст, текст, текст<br>Текст, текст, текст<br>Текст, текст, текст<br>Текст, текст, текстТекст, текст, текстТекст, текст, текстТекст, текст, текст<br><br><br><br><br><br><br><br><br><br><br><br><br><br>','otkaz-tiest','2014-05-04 15:31:14','2014-05-16 14:31:11'),(3,'Свой текст ( писать в поле шаблон письма)','Свой текст','frefcacwa','svoi-tiekst-pisat-v-polie-shablon-pis-ma','2014-05-16 14:32:09','2014-05-16 16:44:02');
/*!40000 ALTER TABLE `application_reply_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_72113DE65E237E06` (`name`),
  KEY `blog_category_slug_idx` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_category`
--

LOCK TABLES `blog_category` WRITE;
/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
INSERT INTO `blog_category` VALUES (1,'Ликбез','likbiez',0,'2014-05-04 16:11:44','2014-05-04 16:11:44'),(2,'Личности','lichnosti',0,'2014-05-04 16:12:04','2014-05-04 16:12:04'),(3,'Полезности','polieznosti',0,'2014-05-04 16:12:21','2014-05-04 16:12:21'),(4,'Технологии','tiekhnologhii',0,'2014-06-16 18:11:43','2014-06-16 18:11:43');
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_entry`
--

DROP TABLE IF EXISTS `blog_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `on_homepage` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DBCEDEB8CB76011C` (`blog_category_id`),
  KEY `blog_entry_slug_idx` (`slug`),
  CONSTRAINT `FK_DBCEDEB8CB76011C` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_entry`
--

LOCK TABLES `blog_entry` WRITE;
/*!40000 ALTER TABLE `blog_entry` DISABLE KEYS */;
INSERT INTO `blog_entry` VALUES (2,1,'Что же такое бонг?','http://bangabar.com/uploads/1403178409.5749-53a2cda98c5b67.51546176-1.jpg','<span>Начнем с простого и вроде бы очевидного. <br>Что же такое бонг и зачем он нужен? Почему бонг давно стал самым популярным курительным девайсом во всем мире (за исключением, как обычно, России)?<span><br>Если Вы всю жизнь пользовались самодельными девайсами, то наверняка, хотите знать почему нужно платить деньги, если все, вроде бы, то же самое можно смастерить самому из того, что лежит на расстоянии максимум 5-10 метров.</span><span><br><br><b>Итак, как бонг меняет процесс курения?</b></span><span><br><br><span>Принцип работы бонга чем-то похож на кальян. Проходя через налитую в бонг жидкость, дым охлаждается и очищается от смол, канцерогенов и прочей гадости. Конечно, не думайте, что это «совершенно безвредный дым»<br>Но вредных веществ в нем становиться явно меньше.</span></span><br><span><br>В свою очередь всем активным веществам не составляет труда пройти через воду, поэтому эффект от курения ничуть не станет меньше. Даже наоборот. Через бонг вы можете вдохнуть намного больше дыма за один раз, а это неминуемо повлечет за собой усиление эффекта от курения.&lt;/p&gt;</span><span><br>Представьте, что Вы вдыхаете прохладный дым, который не обжигает и не дерет горло. Он почти не вызывает кашель. Вы не испытываете ни малейшего дискомфорта, а только получаете удовольствие. И в то же время, несмотря на всю легкость процесса, эффект от курения приобретает новую силу.</span><br></span><br><span><span><span><b>KICK-технология</b><br><br></span>Усилить эффект от курения помогает так называемая KICK-технология специальное отверстие в нижней части бонга. В процессе курения вы зажимаете его пальцем, а когда бонг наполнится дымом отпускаете. Весь накопившейся дым моментально окажется в ваших легких, а сами вы ощутите то, что называют трубо-эффектом</span><span>.<br>Играли в Need For Speed? Ну так вот, отпустить KICK-отверстие это примерно то же самое, что нажать на кнопку</span><span><br><br><b>Как курить через бонг?</b></span><span><br><br>Пошагово процесс курения через бонг выглядит следующим образом</span><span>:<br>Налейте в бонг воду и засыпьте лед (если у Вас ICE-бонг)</span><br></span><ul><li>Измельчите свой любимый табак (лучше всего это сделать гриндером или в крайнем случае ножницами)</li></ul><ul><li>Насыпьте его в чашу</li></ul><ul><li>Возьмите бонг в руку, зажав пальцем KICK-отверстие</li></ul><ul><li>Поднесите горлышко ко рту, начинайте поджигать табак и одновременно вдыхать через горлышко&lt;/li&gt;</li></ul><ul><li>Вдохните столько дыма, сколько хотите. Или сможете</li></ul><ul><li>В конце, когда бонг будет полон дыма, отпустите KICK-отверстие и испытайте турбо-эффект </li></ul><span>Не думаю, что стоит подробно рассказывать, как бонг меняет ощущение от курения и придает ему соответствующую эстетику. Если сомневаетесь, просто спросите любого обладателя бонга.<span><br><br><b>Из чего делаются бонги?</b></span><span><br><br>Материал девайса вот что имеет огромное значение. Ведь Вы никогда не захотите пить хорошее вино из пластиковых стаканчиков? Тогда почему курить любимый табак через обплавленную&nbsp; пластиковую тару</span><span>?<br>Самые популярные материалы для бонгов это акрил и стекло. Немного менее популярны керамические бонги. Встречаются бонги из металла, бамбука и еще более экзотических материалов.<br></span></span><br>Но об этом я расскажу в других постах.. Спасибо за внимание!<br><br>',1,'chto-zhie-takoie-bongh','2014-05-19 15:35:54','2014-06-19 15:47:01'),(3,1,'Ода девайсам','http://bangabar.com/uploads/1403178437.3747-53a2cdc55b7879.58477312-3.jpg','<span>Бонги, вапорайзеры, гриндеры и еще десятки непривычных забугорных словечек, описывающих разнообразные устройства и приспособления&nbsp; для курения табака. Казалось бы – зачем? На кой черт они нужны? Ведь всегда можно найти что-то под рукой, сделать самому, стрельнуть у друга и особо не париться.&nbsp; И не нужны все эти выпендрежные девайсы для мажоров. Я попробую переубедить тебя, дорогой читатель.<span><br><span><br>Нет ничего лучше, чем залить кристально-чистую, играющую в солнечном свете сотнями бликов, холодную, первозданную водичку в девайс. Ощутить приятную, уверенную, не напрягающую тяжесть бонга в своей руке.Увидеть, как чистый огонь захватывает табак. Как тот разгорается и тлеет в такт твоему вдоху. Услышать звук воды, который так же сопроводит тебя и дым. О да, дым, жирный, тягучий, медленный, который заполнит все пространство девайса, а потом и тебя. Который окутает с ног до головы, подхватит и расскажет сотни историй, покажет миллионы картин.</span></span><span><br><br>Это не мажорство или позерство. Это часть культуры. Часть правил. Природа требует соблюдения ритуалов. Не зря в древности, когда люди открыли табак, с ним обращались почтенно. Девайсы появились сразу же и прочно заняли свое место подле человека. Их вырезали из камня и кости, вытачивали из дерева,&nbsp; раскрашивали и украшали, им давали имена. Они служили людям, помогали им познать окружающий мир. Конечно, с тех времен многое поменялось, но не надо забывать мудрость предков.Иначе это пустая трата времени и сил.&nbsp; Твоих сил и сил природы.</span><span><br><span>Это как часть этикета. Как то, что говорила тебе мама, когда ты маленький, баловался за столом. Конечно можно, и когда-то даже удобно есть руками, сидя на корточках, перед телевизором или на диване. Но так и пищеварение нарушится, и у окружающих ты прослывешь неряхой и грязнулей, и удовольствия получишь в разы меньше. Тут все так же.<br><br></span></span>Я уже не буду писать об охлаждении и фильтрации и грамотном измельчении, об устройствах, которые позволяют свести все пагубные эффекты сгорания практически на ноль. Или вообще отказать от горения, предлагая другой путь. Об отсутствии, при должном уходе, смол и прочей гадости в твоих легких. То есть и без того почти безопасное вещество, становится, с тем же вапорайзером, полностью безвредным. А это много стоит. Ведь здоровье важная штука, как ни крути словами.<span><br><br>Вообще девайсы как хорошие часы. Многие говорят зачем, ведь я могу посмотреть время на телефоне. Или купить самые дешевые, главное что бы тикали исправно. Но когда ты видишь у человека на руке добротные, не вычурные, стильные котлы о нем уже складывается положительно мнение. Подумай об этом.</span><span><br><span><br>Все так. Все просто. Или вопрос в деньгах? Люди сегодня тратят сотни килограммов купюр на ненужные, бездушные вещи. Бонг ли, вапорайзер ли это чуть больше. Это истории, это ощущения, это переживания. На них грешно жалеть денежки, да и стоят они сейчас вполне доступно, и круто, что можно без проблем заказать их по интернету.</span></span><span><br><br>Не знаю, поможет ли тебе то, что я пишу. Надеюсь да. Ведь ты давно задумывался об этом. Но как-то все время откладывал, проходя мимо витрин. Закрывая вкладки в своем браузере. Кидая прощальный взгляд на стеклянного мерзавца, уходя с тусовки домой.</span><span><br>Ничто не должно сдерживать тебя. Сделай правильный выбор. Кури красиво.</span></span><br>',1,'oda-dievaisam','2014-05-19 16:57:05','2014-06-19 15:47:27'),(4,1,'Бумага для самокруток','http://bangabar.com/uploads/1403178467.5029-53a2cde37ac620.23613726-2.jpg','<span>Бумага для самокруток это небольшие листочки бумаги, с помощью которых не сложно скрутить самый настоящий джоинт или проще говоря косяк. Существует несколько сотен видов бумаги, которые различаются цветом, размером, вкусом, запахом и материалом.<span><br><b><br>Бумага во всем мире</b></span><span>.<br>Европа лидирует в производстве бумаги и продают её по всему миру. Также изготовлением бумаги занимаются такие страны, как США, Бразилия, Страны Азии, Австралия и Россия.</span>Самые известные мировые брэнды : RAW, Elements, JOB, Juicy Jays, OCB, RizLa+, Mascotte, Smoking, Pay-Pay, Rollit, TOP, Zig-Zag. Я бы рекомендуовал использовать бумагу фирм Raw или </span><span>Elements как самые натуральные и качественные бумажки!<br><b><br>Размер бумаги</b>.<br>Основные размеры бумажек показаны на рисунке. Размер считается пропорционально забиваемой самокрутке, т.е 1 ¼ содержит на четверть больше табака, чем обычная, на половину больше и так далее. А компания Elements , пошла дальше и выпустила 12 дюймовую (30,48 см) упаковку бумаги, из которой можно скрутить джоинт длиной в 4 раза больше обычного!<span><br><br></span><b>Виды бумаги и её упаковка</b><span><br>Существует 3 основных вида бумаги:</span><span><br>1.Классическая</span><span> (картинка 1)<br>2.Бумага со срезанными углами – для наиболее лёгкого скручивания руками.</span><span><span> (картинка 2)<br></span>3.Кармашек – бумага для новичков. Достаточно просто засыпать табак в «карман», заклеить и готово!<br><br></span>Бумажки упаковывают в классические картонные пачки от 24 до 300 шт.,их скручивают в рулоны и даже продают уже в виде готовых конусов (фирмы Cyclones и RAW).<span><br><br><b>Материал</b><br>В основном бумагу изготавливают из древесины (целлюлозы), льна , конопли, кукурузы, бамбука, рисовой соломы или эспарто.</span><span><br>Самые популярные материалы конопля и рис. Конопляная бумага имеет специфический запах. Рисовая же бумага тоньше и оставляет меньше пепла. И в отличии от конопляной имеет меньший запах, поэтому её производство наиболее популярно.</span><span><br>Целлюлоза используется для изготовления абсолютно прозрачных бумажек.</span><span><br>Полностью органическая бумага RAW считается менее вредной, так как не проходит стадию отбеливания и изготавливается без применения каких-либо химический веществ. Лён, кукуруза и бамбук используются в производстве крайне редко.</span><br><span><br><b>Толщина</b></span><span><br>Новичку проще сделать самокрутку из более плотной бумаги, которая лучше держит форму и не так легко рвётся. В то время как опытные курильщики могут скрутить джоинт из практически прозрачной, супер тонкой бумаги.</span><span><br>Толстая бумага также больше подходит для курения табака, в такой бумаге табак равномерно прогревается и хорошо горит. Любителям же не табачных курительных смесей больше подойдёт более тонкая бумага. Считается что чем тоньше бумага тем меньше она портит вкус. Всё сводится к тому, что опытным путём вы найдёте самую подходящую бумагу именно для ваших целей.</span><span><br><br><b>Клейкая часть бумаги</b><br>Большинство производителей, покрывают один край бумажки специальным клейким слоем. Эта тонкая линия при контакте со слюной позволяет склеивать самокрутку при закручивании и помогает ей держать нужную форму.</span><span><br>Клейкую часть делают преимущественно их сахара, что довольно безопасно при курении.</span><span><br><br><b>Запах</b><br>Некоторые виды бумаги пропитывают всевозможными ароматами, начиная от тропических фруктов и заканчивая ароматами кофе и ванили. Компания Juicy Jay’s является мировым лидером по производству ароматизированных бумажек. В её ассортименте более 30 различных вкусов!</span><span><br><br><b>Цвет</b><br>Стандартный цвет бумаги - белый. Такого цвета добиваются путём химического отбеливания сырья. И до последнего времени это был самый популярный цвет. Сейчас уже существует бумага всех основных цветов. Как в полноцветном варианте так и полупрозрачная. Существует даже бумага которая, благодаря особому составу , светится в темноте!</span><span><br><br></span>Такие компании как UltraEco, ALEDA, ALedinha и OCB наладили производство уникальных, абсолютно прозрачных бумажек.<span><br>Так же на бумагу наносятся рисунки, по которым ,как правило, можно определить её вкус. А некоторые компании, такие как RAW, держат особую марку исключительно натурального производства, потому их бумага слегка бежевого цвета.</span></span><br>',1,'bumagha-dlia-samokrutok','2014-05-19 18:29:15','2014-06-19 15:47:54'),(5,3,'Как ухаживать за бонгом','http://bangabar.com/uploads/1403178493.8616-53a2cdfdd25cb6.77790687-Снимок.jpg','<span><span>Сегодня я расскажу, <b>как ухаживать за бонгом</b>, мыть и чистить его. Вы узнаете, что можно использовать из арсенала домашних средств, а в каких случаях могут понадобиться специальные приспособления.</span><span><br>Опытный курильщик знает, что со временем на внутренних стенках бонга образуется густой налёт, который издаёт характерный запах. В некоторых случаях девайс настолько теряет свой первозданный облик, что его незаслуженно отправляют с глаз подальше.</span><span><br><span><br>На стенках этого стеклянного бонга характерный налёт (картинка)</span></span><span><br><span><br>Чтобы бонг радовал как в первый раз, достаточно соблюдать несколько совсем несложных правил:\\</span></span><span><br><span><br>1. Регулярность</span></span><span><br>После каждого сеанса курения хорошо промывайте бонг холодной водой. Это поможет избавиться от запаха и не даст отложиться налёту на стенках. Если у Вас совсем на это нет времени (или желания), хотя бы слейте из него воду. Главное, не откладывайте это на потом: нет ничего хуже, чем запах постоявшей много дней водички в бонге. Чем чаще Вы моете бонг ― тем проще его потом чистить. Как говорится, легче предотвратить, чем лечить </span><span><br><span><br>2. Стеклянные и акриловые бонги чистят по-разному</span></span><span><br>Стеклянные девайсы неприхотливы и хорошо отмываются горячей водой. Только не заливайте бонг кипятком! Используйте просто горячую воду, она не подвергает материал испытаниям на прочность. Для очистки стекла можно использовать соду. Она хорошо очищает и не царапает стекло (в отличие от акрила).</span><span><br>Акриловые бонги нуждаются в более тщательном уходе, поскольку акрил способен впитывать запах дыма. Наиболее безвредным способом считается вымачивание в тёплой воде с неагрессивным моющим средством. Растворите в тёплой воде хозяйственное мыло или гель для мытья посуды. Наполните этим раствором ёмкость, погрузите туда ваш акриловый бонг и позвольте ему отстояться несколько часов.</span><span><br>Тут я должна предупредить владельцев стильных девайсов с рисунками о потенциальной опасности. Помните, что следует исключать длительный контакт рисунка с моющей жидкостью (в том числе и водой) во избежание его повреждения.&lt;/p&gt;</span><span><br><span><br>3. При «генеральной» чистке бонга старайтесь использовать натуральные вещества</span></span><span><br>Вам же потом из него курить! Вот некоторые рецепты.</span><span><br>Для очистки налёта хорошо использовать крупу (например, рис). Просто засыпаете горсть в бонг, заливаете водой, зажимаете отверстия и трясёте как маракасы, пока не устанете. Дальше работаете ёршиком. При необходимости повторяете процедуру несколько раз.</span><span><br>Также весьма эффективна смесь спирта и крупной соли. Спирт растворяет плотный налёт, а частицы соли действуют как скраб. Наполните этой смесью бонг и далее действуйте так же, как в первом рецепте</span><span><br><span><br>Соль и спирт очистят даже самый плотный налёт</span></span><span> (картинка)<br><br>Я не рекомендую использовать кислоты, ацетоны и другие агрессивные жидкости. Во-первых, их использование может необратимо испортить внешний вид девайса, а во-вторых, нанести вред вашему здоровью! При несоблюдении техники безопасности вы можете получить химический ожог дыхательных органов. При попадании на кожу – труднозаживаемые раны. </span><span><br><br>4. Для очистки труднодоступных мест используйте специальные средства. Я рекомендую использовать специальные ёршики для бонгов. В ряде случаев это может стать гораздо более удобным способом, чем кусок ваты, намотанный на длинную проволоку &lt;</span><span><br><span><br>5. Относитесь к своему бонгу как солдат к оружию, как мастер к инструменту</span></span><span>.<br>Регулярно ухаживайте, чистите, берегите ваш бонг, и он вам прослужит долгое время!<br></span></span><br>',1,'kak-ukhazhivat-za-bonghom','2014-05-19 19:10:38','2014-06-19 15:48:20'),(6,2,'Боб Марли','http://bangabar.com/uploads/1403178522.4979-53a2ce1a798e26.95544039-4.jpg','<span><b>Боб Марли</b>&nbsp;&nbsp;—&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">ямайский</a>&nbsp;музыкант,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%93%D0%B8%D1%82%D0%B0%D1%80%D0%B8%D1%81%D1%82\">гитарист</a>,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%92%D0%BE%D0%BA%D0%B0%D0%BB%D0%B8%D1%81%D1%82\">вокалист</a>&nbsp;и&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BC%D0%BF%D0%BE%D0%B7%D0%B8%D1%82%D0%BE%D1%80\">композитор</a>. Несмотря на то, что со времени его смерти прошло много лет, Боб Марли до сих пор является самым известным исполнителем в стиле&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A0%D0%B5%D0%B3%D0%B3%D0%B8\">регги</a>. Именно благодаря его международному успеху&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A0%D0%B5%D0%B3%D0%B3%D0%B8\">регги</a>&nbsp;приобрёл широкую популярность за пределами&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">Ямайки</a>.&nbsp;</span><span>Боб Марли был одним из виднейших сторонников&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9F%D0%B0%D0%BD%D0%B0%D1%84%D1%80%D0%B8%D0%BA%D0%B0%D0%BD%D0%B8%D0%B7%D0%BC\">панафриканизма</a>&nbsp;и правоверным&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D1%81%D1%82%D0%B0%D1%84%D0%B0%D1%80%D0%B8%D0%B0%D0%BD%D1%81%D1%82%D0%B2%D0%BE\">растаманом</a>; многие последователи этого движения даже считают Марли пророком.<br><u><br></u></span><h3>Ранние годы</h3><span>Боб Марли родился в деревне Найн-Майлс,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">Ямайка</a>. Его отец, Норвал Марли, по происхождению европеец, служил офицером ВМС&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%92%D0%B5%D0%BB%D0%B8%D0%BA%D0%BE%D0%B1%D1%80%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F\">Великобритании</a>, а потом служил управляющим на одной из плантаций Ямайки. Там он познакомился с матерью Роберта, 16-летней ямайской девушкой Седеллой Букер. При жизни Роберт видел своего отца всего 2 раза. В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1955_%D0%B3%D0%BE%D0%B4\">1955 году</a>, когда Бобу Марли было 10 лет, Норвал умер.</span><span>Когда-то, ещё не влившись в течение регги, совсем молодой Боб Марли был&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A0%D1%83%D0%B4-%D0%B1%D0%BE%D0%B8\">руд-боем</a>. Руд-бои всячески подчеркивали свое презрение к опасностям. Одним из внешних признаков руди была бритая голова. Излюбленной одеждой руд-боев был чёрный костюм, а также галстуки и шляпы, заимствованные из американских приключенческих фильмов.</span><span>В конце 1950-х Марли, как и многие другие ямайские провинциалы, перебрался вместе с матерью в столицу Ямайки<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D0%BD%D0%B3%D1%81%D1%82%D0%BE%D0%BD_(%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0)\">Кингстон</a>, где поселился в бедном районе&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/w/index.php?title=%D0%A2%D1%80%D0%B5%D0%BD%D1%87%D1%82%D0%B0%D1%83%D0%BD&amp;action=edit&amp;redlink=1\">Тренчтаун</a>. Там он познакомился с&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/w/index.php?title=%D0%9B%D0%B8%D0%B2%D0%B8%D0%BD%D0%B3%D1%81%D1%82%D0%BE%D0%BD,_%D0%9D%D0%B5%D0%B2%D0%B8%D0%BB%D0%BB&amp;action=edit&amp;redlink=1\">Невиллом Ливингстоном</a>&nbsp;по прозвищу Банни, с которым и начал делать свои первые шаги в музыке. После окончания школы Марли устроился работать сварщиком, а в свободное время совершенствовал свои&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9C%D1%83%D0%B7%D1%8B%D0%BA%D0%B0\">музыкальные</a>&nbsp;навыки. Помощь в этом ему оказал известный ямайский музыкант&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/w/index.php?title=%D0%94%D0%B6%D0%BE_%D0%A5%D0%B8%D0%B3%D0%B3%D1%81&amp;action=edit&amp;redlink=1\">Джо Хиггс</a>, дававший Марли и Банни бесплатные уроки&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%92%D0%BE%D0%BA%D0%B0%D0%BB\">вокала</a>. Вскоре состоялось знакомство с Питером Макинтошем, который позже станет известен как&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9F%D0%B8%D1%82%D0%B5%D1%80_%D0%A2%D0%BE%D1%88\">Питер Тош</a>.<br></span><h3>Начало карьеры</h3><div><div><a rel=\"\" target=\"\" href=\"http://commons.wikimedia.org/wiki/File:Bob_Marley_house_in_Nine_Mile.jpg?uselang=ru\"><img src=\"http://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Bob_Marley_house_in_Nine_Mile.jpg/220px-Bob_Marley_house_in_Nine_Mile.jpg\" alt=\"\" height=\"165\" width=\"220\"></a><div><div><a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A4%D0%B0%D0%B9%D0%BB:Bob_Marley_house_in_Nine_Mile.jpg\"><img src=\"http://bits.wikimedia.org/static-1.24wmf8/skins/common/images/magnify-clip.png\" alt=\"\" height=\"11\" width=\"15\"></a></div>Родной дом Марли в Nine Mile, Ямайка</div></div></div><span>В 19 лет Боб Марли дебютировал с синглом «Judge Not», который написал вместе с Джо Хиггсом. В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1963_%D0%B3%D0%BE%D0%B4\">1963 году</a>&nbsp;при помощи того же Хиггса Боб Марли организовал вокальную группу&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/The_Wailers_(%D1%80%D0%B5%D0%B3%D0%B3%D0%B8-%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D0%B0)\">The Wailers</a>, в которую, помимо него, вошли Питер Тош, Банни Ливингстон, Джуниор Брейтуэйт, Черри Грин и Беверли Келсо. Музыкальным директором группы стал её бас-гитарист Астон «Family Man» Баррет. Первый же сингл группы «Simmer Down» (<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1964\">1964</a>) возглавил хит-парад&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">Ямайки</a>&nbsp;и разошёлся тиражом более чем 80 тысяч экземпляров. В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1965_%D0%B3%D0%BE%D0%B4\">1965 году</a>&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/The_Wailers_(%D1%80%D0%B5%D0%B3%D0%B3%D0%B8-%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D0%B0)\">The Wailers</a>&nbsp;сократили состав до трио и, несмотря на успех песен (например, «Rude Boy» вошла в местный «Тор 10»), в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1966_%D0%B3%D0%BE%D0%B4\">1966 году</a>&nbsp;распались.</span><span>Некоторое время Боб Марли работал подсобным рабочим на автомобильном заводе в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A1%D0%A8%D0%90\">США</a>, куда переехала его мать, но вскоре вернулся на Ямайку и воссоздал&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/The_Wailers_(%D1%80%D0%B5%D0%B3%D0%B3%D0%B8-%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D0%B0)\">The Wailers</a>. Группа работала в самых разных жанрах&nbsp;—&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A1%D0%BA%D0%B0\">ска</a>,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D0%BB%D0%B8%D0%BF%D1%81%D0%BE_(%D0%BC%D1%83%D0%B7%D1%8B%D0%BA%D0%B0)\">калипсо</a>,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A4%D1%8C%D1%8E%D0%B6%D0%BD\">фьюжн</a>, но за пределы острова её популярность не распространялась. В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1971_%D0%B3%D0%BE%D0%B4\">1971 году</a>&nbsp;музыканты организовали собственную фирму грамзаписи «Tuff Gong», но и это предприятие успеха не имело.</span><span>Однако в конце 1971 года Боб Марли подписал контракт с американским певцом&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/w/index.php?title=%D0%94%D0%B6%D0%BE%D0%BD%D0%BD%D0%B8_%D0%9D%D1%8D%D1%88&amp;action=edit&amp;redlink=1\">Джонни Нэшем</a>&nbsp;и написал для него две песни, ставшие хитами: «Guava Jelly» и «Stir It Up». В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1972_%D0%B3%D0%BE%D0%B4\">1972 году</a>&nbsp;«<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/The_Wailers_(%D1%80%D0%B5%D0%B3%D0%B3%D0%B8-%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D0%B0)\">The Wailers</a>» наконец получили контракт с международной фирмой<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/Island_Records\">Island Records</a>&nbsp;и выпустили альбом «Catch A Fire», ставший их первой продукцией, которая вышла за пределы&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">Ямайки</a>. Популярность группы росла, и во многом музыкантам помог&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AD%D1%80%D0%B8%D0%BA_%D0%9A%D0%BB%D1%8D%D0%BF%D1%82%D0%BE%D0%BD\">Эрик Клэптон</a>, который включил в свой альбом композицию&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/The_Wailers_(%D1%80%D0%B5%D0%B3%D0%B3%D0%B8-%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D0%B0)\">The Wailers</a>&nbsp;«<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/I_Shot_The_Sheriff\">I Shot The Sheriff</a>», ставшую международным хитом. В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1973_%D0%B3%D0%BE%D0%B4\">1973 году</a>&nbsp;группа предприняла гастроли по&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A1%D0%A8%D0%90\">США</a>. Вскоре Тош и Ливингстон покинули группу, начав сольную карьеру.</span><u><br><br></u><h3>Bob Marley &amp; The Wailers</h3><span>Боб Марли включил в состав&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/The_Wailers_(%D1%80%D0%B5%D0%B3%D0%B3%D0%B8-%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D0%B0)\">The Wailers</a>&nbsp;женское вокальное трио (группа I-THREE, в состав которой входила жена Боба, Рита Марли), сменил название на&nbsp;<i>Bob Marley And The Wailers</i>&nbsp;и вместе со своим бывшим наставником Хиггсом отправился в турне по Африке, Европе и обеим Америкам. К середине&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1970-%D0%B5\">1970-х</a>&nbsp;годов Боб Марли и его группа стали признанными лидерами регги, а в Великобритании практически все новые песни Марли входили в «Тор 40» («<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/No_woman,_no_cry\">No woman, no cry</a>», 1975; «Exodus», 1977; «Waiting In Vain», 1977; «Satisfy My Soul», 1978) и Top 10 («Jamming», 1977; «Is This Love», 1978).</span><span>В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A1%D0%A8%D0%90\">США</a>, однако, лишь композиция «Roots, Rock, Reggae» попала в хит-парад категории «поп» (1976, 51-е место), а «Could You Be Loved» прошла по категории&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D1%83%D0%BB\">соул</a>&nbsp;(1980, 56-е место), но альбомы группы неизменно занимали высокие места, а песни «любви, веры и бунта», как называли их произведения журналисты, пользовались невероятной популярностью в среде интеллектуальной элиты. На Ямайке же Боб Марли стал настоящей культовой фигурой, его политические и религиозные выступления публика воспринимала как откровения святого. В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1976_%D0%B3%D0%BE%D0%B4\">1976 году</a>&nbsp;на него, поневоле оказавшегося втянутым в местную политику, было совершено покушение. Несмотря на тяжёлую рану, он провел все запланированные концерты, объяснив это тем, что в мире слишком много зла и он не имеет права тратить хотя бы один день впустую.</span><h3>Последние годы жизни</h3><div><div><a rel=\"\" target=\"\" href=\"http://commons.wikimedia.org/wiki/File:Bob-Marley-in-Concert_Zurich_05-30-80.jpg?uselang=ru\"><img src=\"http://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Bob-Marley-in-Concert_Zurich_05-30-80.jpg/220px-Bob-Marley-in-Concert_Zurich_05-30-80.jpg\" alt=\"\" height=\"182\" width=\"220\"></a><div><div><a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A4%D0%B0%D0%B9%D0%BB:Bob-Marley-in-Concert_Zurich_05-30-80.jpg\"><img src=\"http://bits.wikimedia.org/static-1.24wmf8/skins/common/images/magnify-clip.png\" alt=\"\" height=\"11\" width=\"15\"></a></div>Боб Марли. Концерт в Цюрихе З0 мая 1980</div></div></div><span>В июле&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1977_%D0%B3%D0%BE%D0%B4\">1977 года</a>&nbsp;у Марли была обнаружена злокачественная&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9C%D0%B5%D0%BB%D0%B0%D0%BD%D0%BE%D0%BC%D0%B0\">меланома</a>&nbsp;на большом пальце ноги.<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%92%D0%B8%D0%BA%D0%B8%D0%BF%D0%B5%D0%B4%D0%B8%D1%8F:%D0%A1%D1%81%D1%8B%D0%BB%D0%BA%D0%B8_%D0%BD%D0%B0_%D0%B8%D1%81%D1%82%D0%BE%D1%87%D0%BD%D0%B8%D0%BA%D0%B8\">[<i>источник&nbsp;не&nbsp;указан&nbsp;591&nbsp;день</i>]</a>&nbsp;Он отказался от&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%90%D0%BC%D0%BF%D1%83%D1%82%D0%B0%D1%86%D0%B8%D1%8F\">ампутации</a>, мотивируя это боязнью потерять возможность играть в футбол и потерять пластику на сцене, кроме того, растаманы верят, что тело должно оставаться «целым»:</span><blockquote><span>Раста не приемлет ампутации. Я не допускаю, чтобы человека разбирали на запчасти.<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9C%D0%B0%D1%80%D0%BB%D0%B8,_%D0%91%D0%BE%D0%B1#cite_note-2\">[2]</a></span></blockquote><span>В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1980_%D0%B3%D0%BE%D0%B4\">1980 году</a>&nbsp;Марли выступил в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%97%D0%B8%D0%BC%D0%B1%D0%B0%D0%B1%D0%B2%D0%B5\">Зимбабве</a>, получившей в том году независимость от&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%92%D0%B5%D0%BB%D0%B8%D0%BA%D0%BE%D0%B1%D1%80%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F\">Великобритании</a>: к тому времени Марли был символом африканского единства, особенно в бывших колониальных странах. Следом прошли успешные гастроли по Германии. Однако намеченное американское турне было отменено, когда, проведя два концерта в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9C%D1%8D%D0%B4%D0%B8%D1%81%D0%BE%D0%BD-%D0%A1%D0%BA%D0%B2%D0%B5%D1%80-%D0%93%D0%B0%D1%80%D0%B4%D0%B5%D0%BD\">Мэдисон-Сквер-Гарден</a>, певец потерял сознание во время пробежки в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A6%D0%B5%D0%BD%D1%82%D1%80%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9_%D0%BF%D0%B0%D1%80%D0%BA_(%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA)\">центральном парке Нью-Йорка</a>. Боб Марли прошёл курс лечения в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9C%D1%8E%D0%BD%D1%85%D0%B5%D0%BD\">Мюнхене</a>&nbsp;у специалиста по раковым заболеваниям Йозефа Иссельса (<a rel=\"\" target=\"\" href=\"http://de.wikipedia.org/wiki/Josef_Issels\">Josef Issels</a>), но безрезультатно. В результате болезни у Марли начали выпадать<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%94%D1%80%D0%B5%D0%B4\">дреды</a>, и их пришлось состричь.&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/4_%D0%BC%D0%B0%D1%8F\">4 мая</a>&nbsp;1980 года Боб Марли крестился в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AD%D1%84%D0%B8%D0%BE%D0%BF%D1%81%D0%BA%D0%B0%D1%8F_%D0%BF%D1%80%D0%B0%D0%B2%D0%BE%D1%81%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F_%D1%86%D0%B5%D1%80%D0%BA%D0%BE%D0%B2%D1%8C\">Эфиопской православной церкви</a>&nbsp;в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D0%BD%D0%B3%D1%81%D1%82%D0%BE%D0%BD_(%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0)\">Кингстоне</a>&nbsp;и взял имя Берхане Селассие (на&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%90%D0%BC%D1%85%D0%B0%D1%80%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA\">амхарском языке</a>&nbsp;— Свет Святой Троицы). Затем он был награждён Ямайским Орденом Почёта. Боб Марли желал провести свои последние дни на&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">Ямайке</a>, но из-за состояния здоровья перелёт из Германии пришлось прервать в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9C%D0%B0%D0%B9%D0%B0%D0%BC%D0%B8\">Майами</a>,<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A4%D0%BB%D0%BE%D1%80%D0%B8%D0%B4%D0%B0\">Флорида</a>. Несмотря на интенсивное лечение,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/11_%D0%BC%D0%B0%D1%8F\">11 мая</a>&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1981_%D0%B3%D0%BE%D0%B4\">1981 года</a>&nbsp;Боб Марли скончался в больнице. Последними словами, сказанными им сыну, были: «Money can’t buy life» (<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A0%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA\">рус.</a>&nbsp;<i>Деньги не могут купить жизнь</i>).</span><span>Боб Марли был похоронен на&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">Ямайке</a>. Его похороны прошли по законам&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AD%D1%84%D0%B8%D0%BE%D0%BF%D1%81%D0%BA%D0%B0%D1%8F_%D0%BF%D1%80%D0%B0%D0%B2%D0%BE%D1%81%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F_%D1%86%D0%B5%D1%80%D0%BA%D0%BE%D0%B2%D1%8C\">Эфиопской православной церкви</a>, при соблюдении традиций&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D1%81%D1%82%D0%B0%D1%84%D0%B0%D1%80%D0%B8%D0%B0%D0%BD%D1%81%D1%82%D0%B2%D0%BE\">растафарианства</a>. В склепе рядом с ним покоятся гитара «<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/Gibson_Les_Paul\">Gibson Les Paul</a>»,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A4%D1%83%D1%82%D0%B1%D0%BE%D0%BB\">футбольный</a>&nbsp;мяч, пучок&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9C%D0%B0%D1%80%D0%B8%D1%85%D1%83%D0%B0%D0%BD%D0%B0\">марихуаны</a>,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%91%D0%B8%D0%B1%D0%BB%D0%B8%D1%8F\">Библия</a>&nbsp;и кольцо, которое он носил постоянно (подарок&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AD%D1%84%D0%B8%D0%BE%D0%BF%D0%B8%D1%8F\">эфиопского</a>&nbsp;принца, старшего сына&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A5%D0%B0%D0%B9%D0%BB%D0%B5_%D0%A1%D0%B5%D0%BB%D0%B0%D1%81%D1%81%D0%B8%D0%B5_I\">Хайле Селассие I</a>).</span><span>В 2012 году вышел документальный фильм «<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9C%D0%B0%D1%80%D0%BB%D0%B8_(%D1%84%D0%B8%D0%BB%D1%8C%D0%BC)\">Марли</a>».</span><u><br></u>',1,'bob-marli','2014-06-16 19:03:01','2014-06-19 15:48:54'),(7,3,'Обзор вапорайзера Eagle Bill’s','http://bangabar.com/uploads/1403178596.0449-53a2ce640af607.31454762-7.jpg','<div>Если вы ищете стильный, портативный и незаметный вапорайзер, тогда эта модель для вас. Eagle Bill’s Shake and Vape&nbsp; — небольшой, портативный&nbsp; вапорайзер в виде трубки, который позволит вам покурить в дороге.Он похож на обычную трубку, но он выпаривает действующие вещества из стаффа, вместо того чтобы сжигать. Сделан он из стекла. Чтобы загрузить вапорайзер, снимите верхний экран и положите размолотый стафф в чашечку. Убедитесь, что табак тонко измельчен — это условие максимального выпаривания. Загрузив чашечку, снова закройте ее экраном. Многие рекомендуют использовать турбозажигалки для этого вапоразйера, но и обычная зажигалка тоже справится с задачей. Нагревайте низ чашечки, и стафф должнен стать коричневой, а не черной, в то время как пары станут видны внутри чашечки. Чтобы усилить выход пара, слегка потрясите трубку, а потом вдыхайте.<br>.<a rel=\"\" target=\"\" href=\"http://rumarijuana.com/wp-content/uploads/2014/04/Eagle-Bill-Vaporizer-Instructions.jpg\"><img src=\"http://rumarijuana.com/wp-content/uploads/2014/04/Eagle-Bill-Vaporizer-Instructions.jpg\" alt=\"Eagle-Bill-Vaporizer-Instructions\" height=\"314\" width=\"250\"><br></a>Нужно время, чтобы привыкнуть не сжигать стафф, а выпаривать из него вещества, так что аккуратнее пользуйтесь зажигалкой. А еще, поскольку вапорайзер сделан из стекла, он здорово разогревается при использовании. Вкус паров довольно резкий по сравнению с тем, что дают другие подобные вапорайзеры, и этот девайс позволяет вам использовать табак максимально экономно. Но если уметь им пользоваться! Eagle Bill’s Shake and Vape Vaporizer&nbsp;- отличный переносной вапорайзер, который понравится всем. Он станет отличным подарком другу, а также дешевым и эффективным дополнением к вашей коллекции трубок.</div><div><span>Но есть минус - &nbsp;очень хрупкая вещь! Осторожнее!<br>Также следует учесть, что&nbsp;обычной зажигалкой нагревать трубку проблематично, советую использовать горелки, которые можно найти, к примеру,&nbsp;в строительных супермаркетах.<br><br></span></div>',1,'obzor-vaporaiziera-eagle-bill-s','2014-06-16 19:14:27','2014-06-19 15:52:37'),(8,4,'Глицериновый холод','http://bangabar.com/uploads/1403177849.3322-53a2cb79511805.03982423-8.jpg','<div><span>Время идёт, даже бежит. Вокруг с колоссальной скоростью появляются инновации и улучшения. И техника охлаждения дыма не исключение. Сегодня я расскажу еще об одном способе охлаждения дыма с помощью глицерина. Способе весьма эффективном, но, к сожалению, не распространенном у нас, хотя в западных странах он известен давно и используется достаточно часто.<br><br></span></div><div></div><div><b>Немного химии.<br><br></b></div><div></div><div><span>Глицерин – вещество, встречающееся частенько в нашей жизни. Он используется в пищевой, медицинской, химической промышленности, табачном и кожевенном производстве. Играет важную биологическую роль для нашего непоседливого организма. Имеет сладкий вкус. Считается, что стопроцентный глицерин замерзает при +18°, но его редко можно наблюдать в кристаллическом состоянии. Так происходит из-за колоссальной гигроскопичности глицерина. Присутствие даже небольших количеств воды понижает точку его замерзания и препятствует кристаллизации. Глицерин растворяется в воде в любом соотношении при температуре выше 0°.<br><br></span></div><div></div><div><b>Как это работает.<br><br></b></div><div></div><div>Бравые парни с Нового Света, шарящие в химии, просекли фишку и создали специальные глицериновые бонги. Главными особенностями стандартных глицериновых бонгов являются сборная конструкция и наличие специального прекулера, наполненного глицерином с полой спиралью внутри </div><div>Перед тем, как подымить, этот прекулер кладут ненадолго в холодильник. После вставляют в бонг, и воздух, проходя через воду в бонге, попадает в прекулер и контактно охлаждается замороженным глицерином, стремясь через спираль прямиком в твои лёгкие и радуя еще больше чем обычно. В последнее время можно найти работающие по такой же схеме глицериновые шлифы для бонгов, что делает такое охлаждение еще более удобным и разнообразным.</div><div><span>Ни в коем случае нельзя заливать в такой прекулер воду и замораживать ее, потому как стенки спирали треснут, после того как лёд сдавит ее!<br><br></span></div><div></div><div><b>Плюсы и минусы.<br><br></b></div><div></div><div>К безусловным плюсам стоит отнести великолепное охлаждение, некоторые считаю что в разы лучше чем у льда. Так же к плюсам нужно относить широкии возможности кастомизации и тюнинга бонгов, благодаря разборной конструкции и различным глицериновым прекулерам и шлифам. Плюс ко всему глицерин можно легко сделать разных цветов, что прибавляет яркости и позитива твоему курению.</div><div>Минусами же является трудность чистки спирали внутри прекулера и достаточно кусающаяся цена.</div><div>Глицериновые бонги и бабблеры различных размеров и конструкций уже прочно закрепились на рынке курительных девайсов. На сегодняшний день в продаже имеются такие штуки, как ручные глицериновые трубки-вапорайзеры. Вот только в наши края всё это добро, к сожалению, поступает редко. Однако, как известно, ищущий найдёт. А такую возможность разнообразить новыми ощущениями свой ритуал курения упускать нельзя.</div>',1,'glitsierinovyi-kholod','2014-06-19 15:43:38','2014-06-19 15:46:16'),(9,2,'Маркус Гарви','http://bangabar.com/uploads/1403181167.672-53a2d86fa41242.08013136-marcus-garvey.jpg','<span><b>Ма́ркус Га́рви</b>&nbsp;(<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%90%D0%BD%D0%B3%D0%BB%D0%B8%D0%B9%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA\">англ.</a>&nbsp;<i>Marcus Mosiah Garvey</i>,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/17_%D0%B0%D0%B2%D0%B3%D1%83%D1%81%D1%82%D0%B0\">17 августа</a>&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1887\">1887</a>,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">Ямайка</a>&nbsp;—&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/10_%D0%B8%D1%8E%D0%BD%D1%8F\">10 июня</a>&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1940\">1940</a>,&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9B%D0%BE%D0%BD%D0%B4%D0%BE%D0%BD\">Лондон</a>)&nbsp;— основоположник растафарианства, деятель всемирного движения&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9D%D0%B5%D0%B3%D1%80\">негров</a>&nbsp;за права и освобождение от угнетения. Основатель Всемирной ассоциации по улучшению положения негров (the Universal Negro Improvement Association, UNIA).<br><br></span><div><b>Биография<br><br></b></div><span>Родился на острове&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%AF%D0%BC%D0%B0%D0%B9%D0%BA%D0%B0\">Ямайка</a>, бывшем тогда&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%91%D1%80%D0%B8%D1%82%D0%B0%D0%BD%D1%81%D0%BA%D0%B8%D0%B5_%D0%BA%D0%BE%D0%BB%D0%BE%D0%BD%D0%B8%D0%B8\">британским</a>&nbsp;колониальным владением. Посещал школу до 14 лет, после чего занимался самообразованием.&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1_%D0%B0%D0%B2%D0%B3%D1%83%D1%81%D1%82%D0%B0\">1 августа</a>&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1914_%D0%B3%D0%BE%D0%B4\">1914 года</a>&nbsp;вместе с товарищем основал на Ямайке «Всемирную ассоциацию по улучшению положения негров», однако не добившись больших успехов, уехал в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A1%D0%A8%D0%90\">США</a>&nbsp;и там основал несколько филиалов ассоциации. В&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1922\">1922</a>&nbsp;году Гарви был осуждён за финансовые махинации и провёл пять лет в тюрьме, после чего потерял весь свой авторитет в негритянском движении. Умер в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/1940_%D0%B3%D0%BE%D0%B4\">1940 году</a>&nbsp;в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9B%D0%BE%D0%BD%D0%B4%D0%BE%D0%BD\">Лондоне</a>&nbsp;будучи в политической изоляции.<br><br></span><div><b>Взгляды<br><br></b></div><span>Придавал большое значение расовой чистоте&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9D%D0%B5%D0%B3%D1%80%D1%8B\">негров</a>&nbsp;и призывал американских граждан африканского происхождения переселяться в&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%90%D1%84%D1%80%D0%B8%D0%BA%D0%B0\">Африку</a>. На почве расового этноцентризма сблизился даже с откровенно расистской организацией&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%9A%D1%83-%D0%BA%D0%BB%D1%83%D0%BA%D1%81-%D0%BA%D0%BB%D0%B0%D0%BD\">Ку-клукс-клан</a>. В своих речах предрекал коронацию чёрного короля на африканском континенте, благодаря чему эфиопский Император&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A5%D0%B0%D0%B9%D0%BB%D0%B5_%D0%A1%D0%B5%D0%BB%D0%B0%D1%81%D1%81%D0%B8%D0%B5_I\">Хайле Селассие I</a>&nbsp;был провозглашён приверженцами&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D1%81%D1%82%D0%B0%D1%84%D0%B0%D1%80%D0%B8%D0%B0%D0%BD%D1%81%D1%82%D0%B2%D0%BE\">растафарианства</a>&nbsp;воплощением&nbsp;<a rel=\"\" target=\"\" href=\"http://ru.wikipedia.org/wiki/%D0%94%D0%B6%D0%B0\">Джа</a>&nbsp;(Бога).</span><br>',0,'markus-garvi','2014-06-19 16:29:41','2014-06-19 16:39:30');
/*!40000 ALTER TABLE `blog_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_code_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_81398E09E7927C74` (`email`),
  KEY `IDX_81398E092FAE4625` (`promo_code_id`),
  KEY `customer_token_confirmed_idx` (`token`,`confirmed`),
  KEY `customer_email_password_confirmed_idx` (`email`,`password`,`confirmed`),
  CONSTRAINT `FK_81398E092FAE4625` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (2,3,'test12398647@mailforspam.com','test',0,'d4679a0f27b3ed7b3e3aed056c8bb784','2014-06-26 10:05:38','2014-06-26 10:05:38'),(3,3,'sergey2013a2014@mail.ru','qwasqwasqwas',1,'655fc81ebe9a09bbda79c3e7477efd61','2014-06-26 14:52:03','2014-06-27 19:09:37'),(4,3,'valeranikitin2010@mail.ru','qwasqwasqwas',0,'d2c72691f06ee0e5b8d3759eec012e9c','2014-06-26 14:59:15','2014-06-26 14:59:15'),(5,3,'artem_burnaev@mail.ru','2743753',1,'8a2ccdcb2cb88f57a4835937cf2b7fc7','2014-06-26 18:39:40','2014-06-26 18:40:50'),(6,3,'serega2013a2014@mail.ru','qwasqwasqwasqwas',0,'3057c51fea477d0ff817743e3653efd6','2014-06-27 18:57:44','2014-06-27 18:57:44'),(7,3,'152kolec@gmail.com','xperia',0,'f571ee2a733cd139316324b8cd8cd42a','2014-06-28 16:06:06','2014-06-28 16:06:06'),(8,3,'test12398648@mailforspam.com','test',1,'6fcd53f88f1fc635641cba44e7764c8d','2014-06-30 17:09:43','2014-06-30 17:10:53'),(9,3,'dituze@mailtemp.info','dituze',1,'4c28f199138e47ec556978635dc1d583','2014-07-01 16:34:51','2014-07-01 16:35:35');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_point`
--

DROP TABLE IF EXISTS `delivery_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` longtext COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_point_email_idx` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_point`
--

LOCK TABLES `delivery_point` WRITE;
/*!40000 ALTER TABLE `delivery_point` DISABLE KEYS */;
INSERT INTO `delivery_point` VALUES (1,'Сенная',NULL,'siennaia','2014-05-04 14:58:34','2014-06-25 16:41:19'),(2,'Швейцария','Парк Швейцария<br>','shvieitsariia','2014-06-22 18:20:12','2014-06-30 17:05:57');
/*!40000 ALTER TABLE `delivery_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ext_log_entries`
--

DROP TABLE IF EXISTS `ext_log_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ext_log_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_class_lookup_idx` (`object_class`),
  KEY `log_date_lookup_idx` (`logged_at`),
  KEY `log_user_lookup_idx` (`username`),
  KEY `log_version_lookup_idx` (`object_id`,`object_class`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ext_log_entries`
--

LOCK TABLES `ext_log_entries` WRITE;
/*!40000 ALTER TABLE `ext_log_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_log_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ext_translations`
--

DROP TABLE IF EXISTS `ext_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ext_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`),
  KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ext_translations`
--

LOCK TABLES `ext_translations` WRITE;
/*!40000 ALTER TABLE `ext_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operator`
--

DROP TABLE IF EXISTS `operator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supervisor_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wallet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apps_count` int(11) NOT NULL,
  `closed_apps_count` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D7A6A781E7927C74` (`email`),
  UNIQUE KEY `UNIQ_D7A6A781290B2F37` (`nick`),
  KEY `IDX_D7A6A78119E9AC5F` (`supervisor_id`),
  KEY `operator_wallet_idx` (`wallet`),
  KEY `operator_apps_count_idx` (`apps_count`),
  CONSTRAINT `FK_D7A6A78119E9AC5F` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operator`
--

LOCK TABLES `operator` WRITE;
/*!40000 ALTER TABLE `operator` DISABLE KEYS */;
INSERT INTO `operator` VALUES (2,1,'alexdobrov1@gmail.com','operator2','89063592778',16,3,1,'2014-05-07 19:15:31','2014-06-30 17:12:23'),(3,1,'operator3@mailforspam.com','operator3','11111111',12,6,0,'2014-05-14 16:08:57','2014-06-20 18:26:00');
/*!40000 ALTER TABLE `operator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promo_code`
--

DROP TABLE IF EXISTS `promo_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promo_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `promo_code_code_idx` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promo_code`
--

LOCK TABLES `promo_code` WRITE;
/*!40000 ALTER TABLE `promo_code` DISABLE KEYS */;
INSERT INTO `promo_code` VALUES (3,'contact',NULL,'2014-06-26 10:05:27','2014-06-26 10:05:27');
/*!40000 ALTER TABLE `promo_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_info` longtext COLLATE utf8_unicode_ci,
  `slider_images` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Магазин работает в тестовом режиме, поэтому возможны технические сбои. Заказы, вопросы и предложения присылайте на почту&nbsp;alexdobrov1@gmail.com (ответ 1 раз в сутки)<br>','a:4:{i:0;s:75:\"http://bangabar.com/uploads/1403179848.5791-53a2d3488d6086.83655611-4sl.jpg\";i:1;s:75:\"http://bangabar.com/uploads/1403177333.5622-53a2c9758943c2.85474717-2sl.jpg\";i:2;s:75:\"http://bangabar.com/uploads/1403177340.7702-53a2c97cbc0958.21273847-1sl.jpg\";i:3;s:75:\"http://bangabar.com/uploads/1403177346.6683-53a2c982a329a8.65047927-3sl.jpg\";}');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_entry`
--

DROP TABLE IF EXISTS `shop_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sale` tinyint(1) NOT NULL,
  `bestseller` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_entry_slug_idx` (`slug`),
  KEY `shop_entry_price_idx` (`price`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_entry`
--

LOCK TABLES `shop_entry` WRITE;
/*!40000 ALTER TABLE `shop_entry` DISABLE KEYS */;
INSERT INTO `shop_entry` VALUES (1,'MT',1000,'http://bangabar.com/uploads/1403275033.3583-53a44719577bd5.67207503-1.png',0,0,'mt','2014-04-29 15:06:37','2014-06-20 18:42:36'),(2,'SB',800,'http://bangabar.com/uploads/1403275295.4447-53a4481f6c94b9.93547200-1.png',1,0,'sb','2014-04-29 18:15:49','2014-06-29 21:29:13'),(3,'PP',1200,'http://bangabar.com/uploads/1403275060.794-53a44734c1d922.34870087-1.png',0,1,'pp','2014-06-20 18:37:59','2014-06-20 18:43:03'),(4,'MTO',800,'http://bangabar.com/uploads/1403275116.6377-53a4476c9bb2b7.98545929-1.png',1,0,'mto','2014-06-20 18:38:42','2014-06-20 18:43:24'),(5,'AI',1000,'http://bangabar.com/uploads/1403275166.3671-53a4479e599f09.98430909-1.png',0,0,'ai','2014-06-20 18:39:29','2014-06-20 18:43:16');
/*!40000 ALTER TABLE `shop_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4D9192F8E7927C74` (`email`),
  UNIQUE KEY `UNIQ_4D9192F8290B2F37` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisor`
--

LOCK TABLES `supervisor` WRITE;
/*!40000 ALTER TABLE `supervisor` DISABLE KEYS */;
INSERT INTO `supervisor` VALUES (1,'supervisor1@mailforspam.com','supervisor1','2014-04-28 17:20:10','2014-04-28 17:20:10');
/*!40000 ALTER TABLE `supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_user`
--

DROP TABLE IF EXISTS `system_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9C5F65BF92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_9C5F65BFA0D96FBF` (`email_canonical`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_user`
--

LOCK TABLES `system_user` WRITE;
/*!40000 ALTER TABLE `system_user` DISABLE KEYS */;
INSERT INTO `system_user` VALUES (1,'admin','admin','admin@example.com','admin@example.com',1,'kb445mjgkn40w04c0gso0skwgg08cwo','Fx3QpuFJ6egaviHUAXuJlsW82sSdAJV6UwK0afSXVt+dXYLEwY1VTzjLeP79774XpHeNhTY1l1tKIpoCcrzWDQ==','2014-07-07 15:01:34',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),(2,'login_name','login_name','email@some.com','email@some.com',0,'6zs6hmrn9s4kcwckcgs8oocc8sg8g0g','js/mmgP3eycgFYYNFNqbQOBRT+mUphhEPiIK2i80bzt9IC60avpU96DZIeOeaTLc0i/eFiwOt0HvLxfHgG+mvA==','2014-05-15 17:03:38',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL);
/*!40000 ALTER TABLE `system_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-08  2:39:55
