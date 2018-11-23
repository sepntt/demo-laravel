-- MySQL dump 10.16  Distrib 10.2.14-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: la
-- ------------------------------------------------------
-- Server version	10.2.14-MariaDB-10.2.14+maria~jessie

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
-- Table structure for table `admin_menu`
--

DROP TABLE IF EXISTS `admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,4,'Index','fa-bar-chart','/',NULL,'2018-09-18 02:46:28'),(2,0,5,'Admin','fa-tasks','',NULL,'2018-09-18 02:46:28'),(3,2,6,'Users','fa-users','auth/users',NULL,'2018-09-18 02:46:28'),(4,2,7,'Roles','fa-user','auth/roles',NULL,'2018-09-18 02:46:28'),(5,2,8,'Permission','fa-ban','auth/permissions',NULL,'2018-09-18 02:46:28'),(6,2,9,'Menu','fa-bars','auth/menu',NULL,'2018-09-18 02:46:28'),(7,2,10,'Operation log','fa-history','auth/logs',NULL,'2018-09-18 02:46:28'),(8,0,16,'Scheduling','fa-clock-o','scheduling','2018-08-21 08:18:48','2018-09-18 02:46:28'),(9,0,11,'Helpers','fa-gears','','2018-09-03 02:34:38','2018-09-18 02:46:28'),(10,9,12,'Scaffold','fa-keyboard-o','helpers/scaffold','2018-09-03 02:34:38','2018-09-18 02:46:28'),(11,9,13,'Database terminal','fa-database','helpers/terminal/database','2018-09-03 02:34:38','2018-09-18 02:46:28'),(12,9,14,'Laravel artisan','fa-terminal','helpers/terminal/artisan','2018-09-03 02:34:38','2018-09-18 02:46:28'),(13,9,15,'Routes','fa-list-alt','helpers/routes','2018-09-03 02:34:38','2018-09-18 02:46:28'),(14,0,1,'博客模块','fa-angellist','blog/blog','2018-09-03 02:37:08','2018-09-18 02:46:22'),(15,14,3,'通知','fa-bars','blog/blog_messages_notice','2018-09-18 02:43:38','2018-09-18 02:53:35'),(16,14,2,'博客管理','fa-bars','blog/blog','2018-09-18 02:46:07','2018-09-18 02:46:28'),(17,0,19,'TODO','fa-keyboard-o','todolist','2018-09-21 05:24:23','2018-10-08 05:55:41'),(18,0,17,'自用','fa-bars','self/shopping/list','2018-10-08 05:54:59','2018-10-08 05:55:41'),(19,18,18,'购物列表','fa-shopping-cart','self/shopping/list','2018-10-08 05:55:35','2018-10-08 05:55:41');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_permissions`
--

DROP TABLE IF EXISTS `admin_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'Scheduling','ext.scheduling',NULL,'/scheduling*','2018-08-21 08:18:48','2018-08-21 08:18:48'),(7,'Admin helpers','ext.helpers',NULL,'/helpers/*','2018-09-03 02:34:38','2018-09-03 02:34:38');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_menu`
--

DROP TABLE IF EXISTS `admin_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL),(1,14,NULL,NULL),(1,15,NULL,NULL),(1,16,NULL,NULL),(1,17,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_permissions`
--

DROP TABLE IF EXISTS `admin_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_users`
--

DROP TABLE IF EXISTS `admin_role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2018-08-21 05:18:24','2018-08-21 05:18:24');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user_permissions`
--

DROP TABLE IF EXISTS `admin_user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'septnn','$2y$10$an9uVnz6uIDzuU7ju4c3lOQhOidJRjhQRAVH109Lax28dgJWinkcW','Administrator',NULL,'QMN0oOCVd3YVJoEoAk4ZxzBEQj5gY1bGjNSs8ZdtLoGdOj9EAb9ez77NmvLq','2018-08-21 05:18:23','2018-09-18 02:30:56');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_messages_notice`
--

DROP TABLE IF EXISTS `blog_messages_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_messages_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `messages_id` int(10) NOT NULL DEFAULT 0 COMMENT 'message id',
  `color` varchar(20) NOT NULL DEFAULT '' COMMENT '提示颜色',
  `topped_at` timestamp NULL DEFAULT NULL COMMENT '置顶的时间',
  `rules` varchar(255) NOT NULL DEFAULT '' COMMENT '权限',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='blog通知消息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_messages_notice`
--

LOCK TABLES `blog_messages_notice` WRITE;
/*!40000 ALTER TABLE `blog_messages_notice` DISABLE KEYS */;
INSERT INTO `blog_messages_notice` VALUES (1,1,'primary',NULL,'','2018-09-18 07:29:34','2018-09-26 03:56:19',NULL),(2,2,'warning','2018-09-18 07:33:04','','2018-09-18 07:33:04','2018-09-26 03:52:54','2018-09-26 03:52:54');
/*!40000 ALTER TABLE `blog_messages_notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (1,'123123123','<p>123</p>','2018-09-05 02:48:31','2018-09-26 03:52:30','2018-09-26 03:52:30'),(2,'32','<p>321</p>','2018-09-05 02:46:49','2018-09-04 18:46:39','2018-09-04 18:45:39'),(3,'Laravel','<p>This is test.</p><blockquote><p>echo 12asdf3; &nbsp;a爱爱爱阿萨德发射点发阿萨德发射点发a撒旦法</p></blockquote><figure class=\"image\"><img src=\"http://admin.la.test/uploads/upload/4R1pFjjVZojTjwhweb7u6c65KTNOOuEXHdhcpjvX.png\"></figure><p>&nbsp;</p><p><strong>BBBBB</strong></p><p>&nbsp;</p>','2018-09-05 08:19:11','2018-09-26 03:52:36','2018-09-26 03:52:36'),(4,'asdasdvasdv','<p>asdvasdvasvasdv</p><p>sdvasdvasdvasdv</p><p>asdvasdvasdvasdv</p>','2018-09-06 06:50:46','2018-09-26 03:52:40','2018-09-26 03:52:40'),(5,'asdf','<p>Hello,{{ $name }} .</p><p>Of course, you are not limited to displaying the contents of the variables passed to the view. You may also echo the results of any PHP function. In fact, you can put any PHP code you wish inside of a Blade echo statement:</p><p>The current UNIX timestamp is {{ time() }}.</p><blockquote><p>&nbsp;</p><p>Blade {{ }} statements are automatically sent through PHP\'s htmlspecialcharsfunction to prevent XSS attacks.</p><p>&nbsp;</p><h4>Displaying Unescaped Data</h4><p>By default, Blade {{ }} statements are automatically sent through PHP\'s htmlspecialcharsfunction to prevent XSS attacks. If you do not want your data to be escaped, you may use the following syntax:</p><p>Hello, {!! $name !!}.</p></blockquote>','2018-09-06 06:52:23','2018-09-26 03:52:43','2018-09-26 03:52:43'),(6,'算法 矩阵方程，求解二元一次方程，附带python代码，以下排版阅读比较费劲，酌情阅读','### 问题：矩阵方程，求解二元一次方程\r\n2x+y=1\r\n3x+y=6\r\n原理：矩阵乘法\r\n$$AX=b$$\r\n相当于\r\n$$\\binom{2,1}{3,1}\\binom{x}{y}=\\binom{2x+1y}{3x+1y}=\\binom{1}{6}$$\r\n\r\n设：矩阵方程\r\n$$A^{-1}AX=A^{-1}b$$\r\n$$=$$\r\n$$EX = A^{-1}b$$\r\n$$=$$\r\n$$X=A^{-1}b$$\r\n\r\n解1：矩阵的逆 \r\n$$\\binom{2,1}{3,1}$$\r\n逆矩阵公式嵌套\r\n\r\n$$\\\\dfrac{(2\\\\bigotimes1-1\\\\bigotimes3)}{1} \\binom{1,-1}{-3,2}=\\binom{-1,1}{3,-2}$$\r\n\r\n验证解1：逆矩阵 单位矩阵\r\n$$\\binom{2,1}{3,1}\\binom{-1,1}{3,-2}$$\r\n$$=$$\r\n2$$\\\\bigotimes$$-1+1$$\\\\bigotimes$$3=1\r\n2$$\\\\bigotimes$$1+1$$\\\\bigotimes$$-2=0\r\n3$$\\\\bigotimes$$-1$$\\\\bigotimes$$1$$\\\\bigotimes$$3=0\r\n3$$\\\\bigotimes$$1+1$$\\\\bigotimes$$-2=1\r\n$$=\\binom{1,0}{0,1}$$\r\n单位矩阵\r\n解2：\r\n$$X= \\binom{-1,1}{3,-2}\\binom{1}{6}$$\r\n$$=$$\r\n-1$$\\\\bigotimes$$1+1$$\\\\bigotimes$$6=5\r\n3$$\\\\bigotimes$$1+-2$$\\\\bigotimes$$-6=9\r\n$$=\\binom{5}{-9}$$\r\n\r\n答：\r\n2$$\\\\bigotimes$$5+-9=1\r\n3$$\\\\bigotimes$$5+-9=6\r\n\r\npython代码\r\n```python\r\nimport numpy as np\r\nA = np.array([[2,1],[3,1]])\r\nAI = np.linalg.inv(A)\r\nb = np.array([[1],[6]])\r\n\r\nX = np.dot(AI,b)\r\n\r\nprint(X)\r\n```\r\n\r\n延伸一个：\r\n问题：矩阵方程，求解三元一次方程\r\n2x+y+z=1\r\n3x+y+z=6\r\nx+y+4z=6\r\n\r\n```python\r\nimport numpy as np\r\nA = np.array([[2,1,1],[3,1,1],[1,1,4]])\r\nAI = np.linalg.inv(A)\r\nb = np.array([[1],[6],[6]])\r\nX = np.dot(AI,b)\r\n```','2018-09-26 04:00:06','2018-11-19 08:28:32',NULL),(7,'Laravel 分析一下laravel5.6，pipeline','最近正在阅读laravel框架的源码。\r\n\r\n追踪到一个new Pipeline，简单看了一下代码。\r\n感觉比较晦涩，所以下面详细的分析一下此逻辑并记录下来，如果有什么不对的地方请大家指出并纠正。\r\n\r\n------------\r\n### 首先调通laravel，输出“welcome”。\r\n通过index.php代码追踪到new Pipeline，见另外一个laravel代码追踪逻辑结构图（略糟，凑活看）。\r\n\r\n代码片段new，也是逻辑入口。\r\nKernel.php:148\r\n```\r\nreturn (new Pipeline($this->app))\r\n                    ->send($request)\r\n                    ->through($this->app->shouldSkipMiddleware() ? [] : $this->middleware)\r\n                    ->then($this->dispatchToRouter());\r\n```\r\n\r\n此处的主要逻辑是then()。找到这个类，代码片段then，主要逻辑代码。Pipeline.php父类:98|114\r\n```\r\n	public function then(Closure $destination)\r\n    {\r\n        $pipeline = array_reduce(\r\n            array_reverse($this->pipes), $this->carry(), $this->prepareDestination($destination)\r\n        );\r\n\r\n        return $pipeline($this->passable);\r\n    }\r\n    protected function prepareDestination(Closure $destination)\r\n    {\r\n        return function ($passable) use ($destination) {\r\n            return $destination($passable);\r\n        };\r\n    }\r\n```\r\nPipeline.php类:26\r\n```\r\n	protected function prepareDestination(Closure $destination)\r\n    {\r\n        return function ($passable) use ($destination) {\r\n            try {\r\n                return $destination($passable);\r\n            } catch (Exception $e) {\r\n                return $this->handleException($passable, $e);\r\n            } catch (Throwable $e) {\r\n                return $this->handleException($passable, new FatalThrowableError($e));\r\n            }\r\n        };\r\n    }\r\n```\r\n分析then()：先分析一下array_reduce函数（laravel优雅的使用？）。官方文档：用回调函数迭代地将数组简化为单一的值。\r\n也就是说，代码片段2经过转换应该同下代码，确实看着代码多一些：\r\n\r\n````\r\n	public function then(Closure $destination)\r\n    {\r\n    	$pipeline = $this->prepareDestination($destination);\r\n        $carry = $this->carry();\r\n        foreach(array_reverse($this->pipes) as $key => $value) {\r\n            $pipeline = $carry($pipeline, $value);\r\n        }\r\n\r\n        return $pipeline($this->passable);\r\n    }\r\n````\r\n让我们替代一下pipeline代码，执行一下看看效果。\r\n替换执行完毕，看上去是正常的，可以正常的输出“welcome”。\r\n\r\n### 继续分析then()：\r\n替换后，代码迭代`array_reverse($this->pipes)`，调用$carry回调函数。array_reverse不说了，自行查阅。\r\n迭代前，`$pipeline=$this->prepareDestination($destination);`，一个回调函数。这个回调函数干嘛的，我们一会再看。\r\n第一次迭代，相当于`$carry($this->prepareDestination($destination), $value);`\r\n紧接着$carry是什么呢？看代码片段carry：\r\nPipeline类:44\r\n```\r\n	protected function carry()\r\n    {\r\n        return function ($stack, $pipe) {\r\n            return function ($passable) use ($stack, $pipe) {\r\n                try {\r\n                    $slice = parent::carry();\r\n\r\n                    $callable = $slice($stack, $pipe);\r\n\r\n                    return $callable($passable);\r\n                } catch (Exception $e) {\r\n                    return $this->handleException($passable, $e);\r\n                } catch (Throwable $e) {\r\n                    return $this->handleException($passable, new FatalThrowableError($e));\r\n                }\r\n            };\r\n        };\r\n    }\r\n```\r\nPipeline父类:126\r\n```\r\n	protected function carry()\r\n    {\r\n        return function ($stack, $pipe) {\r\n            return function ($passable) use ($stack, $pipe) {\r\n                if (is_callable($pipe)) {\r\n                    // If the pipe is an instance of a Closure, we will just call it directly but\r\n                    // otherwise we\'ll resolve the pipes out of the container and call it with\r\n                    // the appropriate method and arguments, returning the results back out.\r\n                    return $pipe($passable, $stack);\r\n                } elseif (! is_object($pipe)) {\r\n                    list($name, $parameters) = $this->parsePipeString($pipe);\r\n\r\n                    // If the pipe is a string we will parse the string and resolve the class out\r\n                    // of the dependency injection container. We can then build a callable and\r\n                    // execute the pipe function giving in the parameters that are required.\r\n                    $pipe = $this->getContainer()->make($name);\r\n\r\n                    $parameters = array_merge([$passable, $stack], $parameters);\r\n                } else {\r\n                    // If the pipe is already an object we\'ll just make a callable and pass it to\r\n                    // the pipe as-is. There is no need to do any extra parsing and formatting\r\n                    // since the object we\'re given was already a fully instantiated object.\r\n                    $parameters = [$passable, $stack];\r\n                }\r\n\r\n                $response = method_exists($pipe, $this->method)\r\n                                ? $pipe->{$this->method}(...$parameters)\r\n                                : $pipe(...$parameters);\r\n\r\n                return $response instanceof Responsable\r\n                            ? $response->toResponse($this->container->make(Request::class))\r\n                            : $response;\r\n            };\r\n        };\r\n    }\r\n```\r\n如果是回调函数，则返回。\r\n如果是对象，则调用对象的handle方法，并把回调函数传进去。\r\n什么意思呢，意思就是迭代已经定义好的一些类，并把对象$request和回调函数`$this->prepareDestination($destination)`，传到handle()函数里面。\r\n\r\n### handle()里面有两种情况：\r\n1、`handle()`函数，返回回调函数`$this->prepareDestination($destination)`，并且把参数`$request`传到`$this->prepareDestination($request)`。\r\n最终`$this->prepareDestination()`处理的`$request`，都是经过`$this->pipes`类处理后的`$request`。理解为beforeaction。\r\n\r\n2、`handle()`函数，返回**执行**回调函数`$this->prepareDestination($destination)`，并且把参数`$request`传到`$this->prepareDestination($request)`。\r\n理解为afteraction。\r\n\r\n有点绕，可能表达的不是很清楚。欢迎来讨论。\r\n\r\n可以参考管道模式的文章','2018-09-26 04:49:34','2018-11-19 07:55:14',NULL),(8,'设计模式 管道设计模式','**我理解上的，管道设计模式伪代码，如果有什么错误，请指出纠正，谢谢。**\r\n\r\n```\r\n//默认执行函数\r\n$request = new Request();//请求处理\r\n$route = function($request){ return new Response($request); }//返回相应\r\n\r\n//before action\r\nbefore1 = function ($request, $next){ return $next(do($request)); }\r\nbefore2 = function ($request, $next){ return $next(do($request)); }\r\nbefore3 = function ($request, $next){ return $next(do($request)); }\r\nbefore4 = function ($request, $next){ return $next(do($request)); }\r\nbefore5 = function ($request, $next){ return $next(do($request)); }\r\n//after action \r\nafter1 = function ($response, $next){ return do($next($response)); }\r\nafter2 = function ($response, $next){ return do($next($response)); }\r\nafter3 = function ($response, $next){ return do($next($response)); }\r\nafter4 = function ($response, $next){ return do($next($response)); }\r\n//注册所有类\r\n$pipes = [\'before1\',\'before2\',\'before3\',\'before4\',\'before5\',\'after1\',\'after2\',\'after3\',\'after4\'];\r\n//管道设计\r\nfunction carray($re, $fun){\r\n	return $fun($request, $re)\r\n}\r\n//最终输出\r\necho array_reduce($pipes, carry(), $route);\r\n```\r\n\r\n**分析**\r\n执行循序\r\nbefore1 => before2 => before3 => before4 => before5 => $route => after1 => after2 => after3 => after4 => 输出\r\n\r\n**其中：**\r\n\r\n**数据对象就是$request|$response对象\r\n过滤器就是before和after具体函数\r\n管道就是$next回调函数**','2018-09-27 04:58:37','2018-11-19 07:46:17',NULL),(9,'docker php fpm','### 一台机器装多个php版本，很是费劲，研究了一下docker php，贴上来，给大家参考。\r\n\r\n1、本地nginx+docker php-apache\r\n官网的apache+nginx反向，我没有验证。\r\n`docker run -it --rm --name php-apache -p 8080:80 -v /home/www/:/home/www/:rw  php:7.2.8-apache `\r\nnginx conf\r\n```\r\nlocation / {\r\n    proxy_pass   127.0.0.1:8080;\r\n}\r\n```\r\n2、本地nginx+docker php-fpm\r\n阅读官网教程后，所得如下：\r\nvolume最好前后写的一样，不容易出错。\r\n`docker run -itd --name php7.2 -p 9000:9000 -v /home/dw:/home/dw:rw php:7.2.8-fpm`\r\nnginx conf注意fastcgi_param配置，index.php的执行路径要写对\r\n```\r\nlocation ~ \\.php$ {\r\n            fastcgi_pass   127.0.0.1:9000;\r\n            fastcgi_index  index.php;\r\n            fastcgi_param  SCRIPT_FILENAME  /home/www/api/public$fastcgi_script_name;\r\n            include fastcgi_params;\r\n        }\r\n```\r\n可能会出现404报错\r\n一般就是没有可执行权限，在宿主机上把对应的项目目录给上755权限。\r\n临时脚本执行\r\n不过还是没有直接php执行用的爽。\r\n`docker run -it --rm --name php-cli -v /home/www:/home/www:rw php php /home/www/1.php`\r\n3、其它版本\r\n多版本php依葫芦画瓢。\r\n文章仅供参考，有什么问题欢迎提出。\r\n\r\n4、php扩展安装\r\nmcrypt为例：\r\n已经安装好7.0 fpm。\r\n注意，本次用的是7.0，7.2 docker-php-ext-configure提示already compiled，暂时没有找到原因。\r\n`docker <span class=\"hljs-built_in\">exec</span> -it php7.0 /bin/bash`\r\n进入容器后： \r\n更新\r\n`apt-get`\r\n\r\n`apt-get update`\r\n\r\n安装mcrypt\r\n`apt-get install libmcrypt-dev`\r\n\r\n`docker-php-ext-configure mcrypt`\r\n\r\n`docker-php-ext-install mcrypt `\r\n\r\n安装gd\r\n`apt-get install libfreetype6-dev libjpeg62-turbo-dev libpng-dev`\r\n\r\n`docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include`\r\n\r\n`docker-php-ext-install gd`\r\n安装zip\r\n`apt-get install libzip-dev`\r\n\r\n`docker-php-ext-configure zip --with-libzip`\r\n\r\n`docker-php-ext-install zip`\r\n\r\n安装pdo\r\n安装bcmath\r\n退出重启\r\n`docker restart php7.0`','2018-09-27 04:59:07','2018-11-19 08:42:26',NULL),(10,'docker php-fpm 文件权限问题','### docker安装php-fpm。\r\n\r\n默认的php-fpm配置文件user和group配置是www-data。文件见（安装了vim）\r\n进入容器，查看fpm配置\r\n`vi /usr/local/etc/php-fpm.d/www.conf`\r\nphp-fpm启动后，通过volume共享操作文件，会有权限不一致导致没有权限读写文件的问题。\r\n通过下面修改，解决权限问题。\r\n\r\n进入容器\r\n查看volume文件在宿主机的权限\r\n`ll /volume/`\r\n\r\n把www-data的用户uid/gid修改成为volume文件权限用户的id\r\n`usermod -u 1000 www-data`\r\n`groupmod -g 1000 www-data`\r\n\r\n其它容器如果有volume权限问题，可以参考同样方法。','2018-09-27 04:59:31','2018-11-19 08:32:22',NULL),(11,'docker 时区 php-fpm容器','### 由于已经运行了容器，不想重新构建。使用下面方法修改。\r\n原理：替换/etc/locatime\r\n\r\n查看/etc/localtime\r\n`ls -l /etc/localtime`\r\n发现/etc/localtime使用的是软链\r\n\r\n删除软链\r\n`rm /etc/localtime`\r\n\r\n使用上海软链\r\n`ln -s /usr/share/zoneinfo/Asia/Shanghai /etc/localtime`\r\n查看时间\r\n`date`\r\n`Wed Aug 22 10:47:50 CST 2018`\r\n修改完成。','2018-09-27 04:59:54','2018-11-19 08:30:24',NULL),(12,'语音识别 语音基础概念','语音是声音和意义的结合体。语音信号处理是利用数字信号处理技术，对语音进行处理的一门学科。\r\n\r\n###### 1.技术基础：\r\n\r\n理论：数字信号处理\r\n理论：语音学\r\n算法：数字滤波器\r\n- 将混合后的信号进行分离\r\n- 恢复被损害的信号\r\n\r\n算法：快速博里叶变换（FFT）\r\n- 离散傅立叶变换(DFT)的快速算法\r\n - 连续傅里叶变换在时域和频域上都离散的形式\r\n - 参考：https://blog.csdn.net/pizi0475/article/details/52914592\r\n \r\n应用：语音编码、语音识别、语音合成、说话人识别、语音增强。\r\n\r\n###### 2.声学特征：\r\n\r\n共振峰（Formant）。\r\n- 声音在经过共振腔时，受到腔体的滤波作用，使得频域中不同频率的能量重新分配，一部分因为共振腔的共振作用得到强化，另一部分则受到衰减。由于能量分布不均匀，强的部分犹如山峰一般，故而称之为共振峰。\r\n- 参考：https://baike.baidu.com/item/共振峰/6140265?fr=aladdin\r\n- 参考：另外一篇共振峰文章\r\n\r\n###### 3.语音基本特征：\r\n\r\n音质：区别其他声音的特征。\r\n音调：声音的高低，取决于频率，频率快，音调高。\r\n音强：即音量，响度。取决于振幅。\r\n音长：持续时间长短。\r\n音素：最小最基本单位。分类：\r\n- 元音：声带震动，构成音节主干。所有元音都是浊音。\r\n- 辅音：气流在口腔或咽头受到阻碍。声带震动：浊音。声带不震动：清音\r\n音节：语音片段，由音素构成。\r\n- 汉语：一个字是一个音节。一个音节由声母和韵母拼接。声母是一个音素。声调是音节。\r\n\r\n词：由音节构成。\r\n句子：由词构成。\r\n \r\n###### 4.时间波形和频谱特征\r\n\r\n浊音是脉冲序列。脉冲之间间隔是基音周期。','2018-10-15 06:00:58','2018-11-19 07:29:06',NULL),(13,'语音识别 共振峰','声音在经过共振腔时，受到腔体的滤波作用，使得[频域](https://baike.baidu.com/item/%E9%A2%91%E5%9F%9F/10790116 \"频域\")中不同频率的能量重新分配，一部分因为共振腔的共振作用得到强化，另一部分则受到衰减。由于能量分布不均匀，强的部分犹如山峰一般，故而称之为共振峰。\r\n\r\n参考：https://wenku.baidu.com/view/3c432267ddccda38376baf62.html\r\n\r\n1. 倒谱法\r\n2. LPC谱估法\r\n3. LPC倒谱法','2018-10-18 02:30:34','2018-11-19 07:41:09',NULL),(14,'1111111111','<p>11111111111111</p>','2018-11-15 09:07:10','2018-11-15 09:21:38','2018-11-15 09:21:38'),(15,'1111111111','<p>11111111111111</p>','2018-11-15 09:07:31','2018-11-15 09:21:33','2018-11-15 09:21:33'),(16,'11111111111111',NULL,'2018-11-15 09:08:52','2018-11-15 09:21:16','2018-11-15 09:21:16'),(17,'11111111111','<p>2222222222222222222</p>','2018-11-15 09:41:14','2018-11-16 02:40:38','2018-11-16 02:40:38'),(18,'2222222222222222','<p>2222222222222222222</p>','2018-11-15 09:41:22','2018-11-16 02:40:34','2018-11-16 02:40:34'),(19,'asdf','<p>asdf</p>','2018-11-16 06:50:49','2018-11-16 06:51:02','2018-11-16 06:51:02'),(20,'语音识别 语音基础概念','<p><strong>语音是声音和意义的结合体。</strong>语音信号处理是利用数字信号处理技术，对语音进行处理的一门学科。</p><p>技术基础：</p><ul><li>理论：数字信号处理</li><li>理论：语音学</li><li>算法：数字滤波器<ul><li>将混合后的信号进行分离</li><li>恢复被损害的信号</li></ul></li><li>算法：快速博里叶变换（FFT）<ul><li>离散傅立叶变换(DFT)的快速算法<ul><li>连续傅里叶变换在时域和频域上都离散的形式</li><li>参考：https://blog.csdn.net/pizi0475/article/details/52914592</li></ul></li></ul></li></ul><p>应用：语音编码、语音识别、语音合成、说话人识别、语音增强。</p><p>声学特征：</p><ul><li>共振峰（Formant）。<ul><li>声音在经过共振腔时，受到腔体的滤波作用，使得<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E9%A2%91%E5%9F%9F/10790116\">频域</a>中不同频率的能量重新分配，一部分因为共振腔的共振作用得到强化，另一部分则受到衰减。由于能量分布不均匀，强的部分犹如山峰一般，故而称之为共振峰。</li><li>参考：https://baike.baidu.com/item/共振峰/6140265?fr=aladdin</li><li>参考：另外一篇共振峰文章</li></ul></li></ul><p>语音基本特征：</p><ul><li>音质：区别其他声音的特征。</li><li>音调：声音的高低，取决于频率，频率快，音调高。</li><li>音强：即音量，响度。取决于振幅。</li><li>音长：持续时间长短。</li><li>音素：最小最基本单位。分类：<ul><li>元音：声带震动，构成音节主干。所有元音都是浊音。</li><li>辅音：气流在口腔或咽头受到阻碍。声带震动：浊音。声带不震动：清音</li></ul></li><li>音节：语音片段，由音素构成。<ul><li>汉语：一个字是一个音节。一个音节由声母和韵母拼接。声母是一个音素。<ul><li>声调是音节。</li></ul></li></ul></li><li>词：由音节构成。</li><li>句子：由词构成。</li><li>&nbsp;</li></ul><p>时间波形和频谱特征</p><ul><li>浊音是脉冲序列。脉冲之间间隔是基音周期。</li></ul>','2018-11-16 06:56:44','2018-11-16 07:00:05','2018-11-16 07:00:05'),(21,'test','<p>&lt;?asdfasdf</p><p>ajsdnflakjsdfn&gt;</p>','2018-11-16 07:00:26','2018-11-16 09:00:54','2018-11-16 09:00:54'),(22,'Laravel 问题汇总-未解决','**Blade**\r\n当模版变量存在<?符号的时候，当前这一行会被注释\r\n\r\nphp代码：\r\n`return view(\'index\',\'a\'=>\"<?123\");`\r\nblade模版代码\r\n`{!!$a!!}}`\r\n\r\n网页的源代码，此时变量$a从<?开始注释，并且找到最近的结束标签，结束注释\r\n`... <!?--123 ... </div--> ... `','2018-11-16 08:07:37','2018-11-19 07:23:37',NULL),(23,'22222222222','<p>222222222222222</p>','2018-11-16 09:07:29','2018-11-16 09:10:30','2018-11-16 09:10:30'),(24,'123','# test\r\n## 挺好的\r\n\r\n`\r\n<?php\r\necho 123\r\n`\r\ndfasdf\r\n```php\r\necho 123;\r\n\r\n```\r\n\r\n- 阿斯蒂芬\r\n- asdf','2018-11-16 09:25:16','2018-11-19 07:23:43','2018-11-19 07:23:43');
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL DEFAULT '' COMMENT '消息',
  `content` text NOT NULL COMMENT '消息内容',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'目前整体项目运行中，<a href=\"https://github.com/sepntt/septnn\" target=\"__blank\">Github<a>','<p>官方通知：你看看就行。</p>','2018-09-26 03:57:33','2018-09-26 03:57:33',NULL),(2,'置顶的公告','<p>置顶的公告</p>','2018-09-18 07:33:04','2018-09-18 07:33:04',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_04_173148_create_admin_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todolist`
--

DROP TABLE IF EXISTS `todolist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `todolist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `todo` varchar(50) NOT NULL COMMENT '做什么',
  `done` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0已完成;1计划中;2进行中;',
  `version` float NOT NULL DEFAULT 0.1 COMMENT '版本',
  `desc` text NOT NULL COMMENT '描述',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todolist`
--

LOCK TABLES `todolist` WRITE;
/*!40000 ALTER TABLE `todolist` DISABLE KEYS */;
INSERT INTO `todolist` VALUES (1,'todolist',0,0.01,'<p>注释：1完成，0未完成</p><ul><li>1基础</li></ul>','2018-09-27 06:15:36','2018-09-27 06:15:36',NULL),(2,'博客系统',2,0.01,'<p>注释：1完成，0未完成</p><ul><li>1基础</li><li>1后台富文本编辑器</li><li>0后台富文本编辑器-图片上传</li><li>0Markdown编辑器</li><li>0文章统计</li><li>0top5</li><li>0关键字搜索</li><li>0博客分类</li></ul>','2018-09-27 06:13:05','2018-09-27 06:13:05',NULL),(3,'语音识别',1,0,'<p>注释：1完成，0未完成</p><ul><li>0 基础</li><li>0 artsarn训练</li><li>0 mfcc算法</li><li>0 h5获取语音</li><li>0 语音识别</li><li>0 对接硬件服务<ul><li>电视</li></ul></li></ul>','2018-09-27 06:17:10','2018-09-27 06:17:10',NULL),(4,'自用',2,0.01,'<p>注释：</p><ul><li>1购物列表0.1版本</li><li>0表单，添加默认选项，并且可填写</li><li>0添加手机端直接填写表单</li></ul>','2018-10-22 02:55:09','2018-10-22 02:55:09',NULL);
/*!40000 ALTER TABLE `todolist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_files`
--

DROP TABLE IF EXISTS `upload_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='上传的文件库';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_files`
--

LOCK TABLES `upload_files` WRITE;
/*!40000 ALTER TABLE `upload_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'septnn','septnn@sina.com','$2y$10$ktUXpu4PmffpGFDaATV3rum/fD47wFSGAyznogXrPuzIbauFgqPZG','olun8K934ijAXZrAIycADG92IImL1F28JxRJFeao96wdOQWCxUSzTCQaFwGJ','2018-08-29 23:32:13','2018-11-05 01:50:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-23 16:51:57
