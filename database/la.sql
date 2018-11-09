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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (1,'123123123','<p>123</p>','2018-09-05 02:48:31','2018-09-26 03:52:30','2018-09-26 03:52:30'),(2,'32','<p>321</p>','2018-09-05 02:46:49','2018-09-04 18:46:39','2018-09-04 18:45:39'),(3,'Laravel','<p>This is test.</p><blockquote><p>echo 12asdf3; &nbsp;a爱爱爱阿萨德发射点发阿萨德发射点发a撒旦法</p></blockquote><figure class=\"image\"><img src=\"http://admin.la.test/uploads/upload/4R1pFjjVZojTjwhweb7u6c65KTNOOuEXHdhcpjvX.png\"></figure><p>&nbsp;</p><p><strong>BBBBB</strong></p><p>&nbsp;</p>','2018-09-05 08:19:11','2018-09-26 03:52:36','2018-09-26 03:52:36'),(4,'asdasdvasdv','<p>asdvasdvasvasdv</p><p>sdvasdvasdvasdv</p><p>asdvasdvasdvasdv</p>','2018-09-06 06:50:46','2018-09-26 03:52:40','2018-09-26 03:52:40'),(5,'asdf','<p>Hello,{{ $name }} .</p><p>Of course, you are not limited to displaying the contents of the variables passed to the view. You may also echo the results of any PHP function. In fact, you can put any PHP code you wish inside of a Blade echo statement:</p><p>The current UNIX timestamp is {{ time() }}.</p><blockquote><p>&nbsp;</p><p>Blade {{ }} statements are automatically sent through PHP\'s htmlspecialcharsfunction to prevent XSS attacks.</p><p>&nbsp;</p><h4>Displaying Unescaped Data</h4><p>By default, Blade {{ }} statements are automatically sent through PHP\'s htmlspecialcharsfunction to prevent XSS attacks. If you do not want your data to be escaped, you may use the following syntax:</p><p>Hello, {!! $name !!}.</p></blockquote>','2018-09-06 06:52:23','2018-09-26 03:52:43','2018-09-26 03:52:43'),(6,'算法 矩阵方程，求解二元一次方程，附带python代码，以下排版阅读比较费劲，酌情阅读','<p><strong>问题：矩阵方程，求解二元一次方程</strong></p><pre><code>2x+y=1\r\n3x+y=6</code></pre><p><strong>原理：矩阵乘法</strong><br />A*X=b</p><pre><code>{2,1   \r\n 3,1} \r\n* \r\n{x \r\n y}\r\n=\r\n2*x+1*y\r\n3*x+1*y\r\n=\r\n{1\r\n 6}</code></pre><p><strong>设：矩阵方程</strong></p><pre><code>A^(-1)*AX = A^(-1)*b\r\n=\r\nEX = A^(-1)b\r\n=\r\nX  = A^(-1)b</code></pre><p><strong>解1：矩阵的逆&nbsp;&nbsp;</strong><br />{2,1&nbsp;&nbsp;<br />&nbsp;3,1}<br />逆矩阵公式嵌套</p><pre><code>(2*1-1*3)/1\r\n*\r\n{1,-1 \r\n -3,2}\r\n=\r\n{-1,1\r\n 3,-2}</code></pre><p><strong>验证解1：逆矩阵 单位矩阵</strong></p><pre><code>{2,1\r\n 3,1}\r\n*\r\n{-1,1\r\n 3,-2}\r\n=\r\n2*-1+1*3=1\r\n2*1+1*-2=0\r\n3*-1*1*3=0\r\n3*1+1*-2=1\r\n=\r\n{1,0\r\n 0,1} 单位矩阵</code></pre><p><strong>解2：</strong></p><pre><code>X = \r\n{-1,1\r\n 3,-2}\r\n*\r\n{1\r\n  6}\r\n=\r\n-1*1+1*6=5\r\n3*1+-2*-6=9\r\n=\r\n{5,-9}</code></pre><p><strong>答：</strong><br />2*5+-9=1<br />3*5+-9=6<br /><br /><strong>python代码</strong><br />&nbsp;</p><pre><code class=\"language-python\">import numpy as np\r\nA = np.array([[2,1],[3,1]])\r\nAI = np.linalg.inv(A)\r\nb = np.array([[1],[6]])\r\n\r\nX = np.dot(AI,b)\r\n\r\nprint(X)</code></pre><p><strong>延伸一个：</strong></p><p>问题：矩阵方程，求解三元一次方程<br />2x+y+z=1<br />3x+y+z=6<br />x+y+4z=6</p><pre><code class=\"language-python\">import numpy as np\r\nA = np.array([[2,1,1],[3,1,1],[1,1,4]])\r\nAI = np.linalg.inv(A)\r\nb = np.array([[1],[6],[6]])\r\nX = np.dot(AI,b)</code></pre><p>&nbsp;</p>','2018-09-26 04:00:06','2018-10-15 06:01:15',NULL),(7,'Laravel 分析一下laravel5.6，pipeline','<p>最近正在阅读laravel框架的源码。</p><p>追踪到一个new Pipeline，简单看了一下代码。</p><p>感觉比较晦涩，所以下面详细的分析一下此逻辑并记录下来，如果有什么不对的地方请大家指出并纠正。</p><p>分割线</p><p>1</p><p>首先调通laravel，输出&ldquo;welcome&rdquo;。</p><p>通过index.php代码追踪到new Pipeline，见另外一个laravel代码追踪逻辑结构图（略糟，凑活看）。</p><p><strong>代码片段new</strong>，也是逻辑入口。</p><pre><code class=\"language-php\">Kernel.php:148\r\n	return (new Pipeline($this-&gt;app))\r\n                    -&gt;send($request)\r\n                    -&gt;through($this-&gt;app-&gt;shouldSkipMiddleware() ? [] : $this-&gt;middleware)\r\n                    -&gt;then($this-&gt;dispatchToRouter());</code></pre><p>此处的主要逻辑是<strong>then()</strong>。</p><p>找到这个类，<strong>代码片段then</strong>，主要逻辑代码。</p><pre><code class=\"language-php\">Pipeline.php父类:98|114\r\n    public function then(Closure $destination)\r\n    {\r\n        $pipeline = array_reduce(\r\n            array_reverse($this-&gt;pipes), $this-&gt;carry(), $this-&gt;prepareDestination($destination)\r\n        );\r\n\r\n        return $pipeline($this-&gt;passable);\r\n    }\r\n    protected function prepareDestination(Closure $destination)\r\n    {\r\n        return function ($passable) use ($destination) {\r\n            return $destination($passable);\r\n        };\r\n    }\r\nPipeline.php类:26\r\n    protected function prepareDestination(Closure $destination)\r\n    {\r\n        return function ($passable) use ($destination) {\r\n            try {\r\n                return $destination($passable);\r\n            } catch (Exception $e) {\r\n                return $this-&gt;handleException($passable, $e);\r\n            } catch (Throwable $e) {\r\n                return $this-&gt;handleException($passable, new FatalThrowableError($e));\r\n            }\r\n        };\r\n    }</code></pre><p><strong>分析then()：</strong></p><p>先分析一下array_reduce函数（laravel优雅的使用？）。</p><p>官方文档：用回调函数迭代地将数组简化为单一的值。</p><p>也就是说，代码片段2经过转换应该同下代码，确实看着代码多一些：</p><pre><code class=\"language-php\">public function then(Closure $destination)\r\n    {\r\n    	$pipeline = $this-&gt;prepareDestination($destination);\r\n        $carry = $this-&gt;carry();\r\n        foreach(array_reverse($this-&gt;pipes) as $key =&gt; $value) {\r\n            $pipeline = $carry($pipeline, $value);\r\n        }\r\n\r\n        return $pipeline($this-&gt;passable);\r\n    }</code></pre><p>让我们替代一下pipeline代码，执行一下看看效果。</p><p>替换执行完毕，看上去是正常的，可以正常的输出&ldquo;welcome&rdquo;。</p><p>2</p><p><strong>继续分析then()：</strong></p><p>替换后，代码迭代array_reverse($this-&gt;pipes)，调用$carry回调函数。array_reverse不说了，自行查阅。</p><p>迭代前，$pipeline=$this-&gt;prepareDestination($destination);，一个回调函数。这个回调函数干嘛的，我们一会再看。</p><p>第一次迭代，相当于$carry($this-&gt;prepareDestination($destination), $value);</p><p>紧接着$carry是什么呢？<strong>看代码片段carry</strong>：</p><pre><code class=\"language-php\">Pipeline类:44\r\nprotected function carry()\r\n    {\r\n        return function ($stack, $pipe) {\r\n            return function ($passable) use ($stack, $pipe) {\r\n                try {\r\n                    $slice = parent::carry();\r\n\r\n                    $callable = $slice($stack, $pipe);\r\n\r\n                    return $callable($passable);\r\n                } catch (Exception $e) {\r\n                    return $this-&gt;handleException($passable, $e);\r\n                } catch (Throwable $e) {\r\n                    return $this-&gt;handleException($passable, new FatalThrowableError($e));\r\n                }\r\n            };\r\n        };\r\n    }\r\nPipeline父类:126\r\nprotected function carry()\r\n    {\r\n        return function ($stack, $pipe) {\r\n            return function ($passable) use ($stack, $pipe) {\r\n                if (is_callable($pipe)) {\r\n                    // If the pipe is an instance of a Closure, we will just call it directly but\r\n                    // otherwise we\'ll resolve the pipes out of the container and call it with\r\n                    // the appropriate method and arguments, returning the results back out.\r\n                    return $pipe($passable, $stack);\r\n                } elseif (! is_object($pipe)) {\r\n                    list($name, $parameters) = $this-&gt;parsePipeString($pipe);\r\n\r\n                    // If the pipe is a string we will parse the string and resolve the class out\r\n                    // of the dependency injection container. We can then build a callable and\r\n                    // execute the pipe function giving in the parameters that are required.\r\n                    $pipe = $this-&gt;getContainer()-&gt;make($name);\r\n\r\n                    $parameters = array_merge([$passable, $stack], $parameters);\r\n                } else {\r\n                    // If the pipe is already an object we\'ll just make a callable and pass it to\r\n                    // the pipe as-is. There is no need to do any extra parsing and formatting\r\n                    // since the object we\'re given was already a fully instantiated object.\r\n                    $parameters = [$passable, $stack];\r\n                }\r\n\r\n                $response = method_exists($pipe, $this-&gt;method)\r\n                                ? $pipe-&gt;{$this-&gt;method}(...$parameters)\r\n                                : $pipe(...$parameters);\r\n\r\n                return $response instanceof Responsable\r\n                            ? $response-&gt;toResponse($this-&gt;container-&gt;make(Request::class))\r\n                            : $response;\r\n            };\r\n        };\r\n    }</code></pre><p>如果是回调函数，则返回。</p><p>如果是对象，则调用对象的handle方法，并把回调函数传进去。</p><p>什么意思呢，意思就是迭代已经定义好的一些类，并把对象$request和回调函数$this-&gt;prepareDestination($destination)，传到handle()函数里面。</p><p>handle()里面有两种情况：</p><p>1、handle()函数，返回回调函数$this-&gt;prepareDestination($destination)，并且把参数$request传到$this-&gt;prepareDestination($request)。</p><p>最终$this-&gt;prepareDestination()处理的$request，都是经过$this-&gt;pipes类处理后的$request。理解为beforeaction。</p><p>&nbsp;</p><p>2、handle()函数，返回<strong>执行</strong>回调函数$this-&gt;prepareDestination($destination)，并且把参数$request传到$this-&gt;prepareDestination($request)。</p><p>理解为afteraction。</p><p>&nbsp;</p><p>有点绕，可能表达的不是很清楚。欢迎来讨论。</p><p>可以参考管道模式的文章：<a href=\"https://blog.csdn.net/weixin_42601421/article/details/81672303\">https://blog.csdn.net/weixin_42601421/article/details/81672303</a></p>','2018-09-26 04:49:34','2018-10-15 06:01:26',NULL),(8,'设计模式 管道设计模式','<p><strong>我理解上的，管道设计模式伪代码，如果有什么错误，请指出纠正，谢谢。</strong></p><pre><code class=\"language-php\">//默认执行函数\r\n$request = new Request();//请求处理\r\n$route = function($request){ return new Response($request); }//返回相应\r\n\r\n//before action\r\nbefore1 = function ($request, $next){ return $next(do($request)); }\r\nbefore2 = function ($request, $next){ return $next(do($request)); }\r\nbefore3 = function ($request, $next){ return $next(do($request)); }\r\nbefore4 = function ($request, $next){ return $next(do($request)); }\r\nbefore5 = function ($request, $next){ return $next(do($request)); }\r\n//after action \r\nafter1 = function ($response, $next){ return do($next($response)); }\r\nafter2 = function ($response, $next){ return do($next($response)); }\r\nafter3 = function ($response, $next){ return do($next($response)); }\r\nafter4 = function ($response, $next){ return do($next($response)); }\r\n//注册所有类\r\n$pipes = [&#39;before1&#39;,&#39;before2&#39;,&#39;before3&#39;,&#39;before4&#39;,&#39;before5&#39;,&#39;after1&#39;,&#39;after2&#39;,&#39;after3&#39;,&#39;after4&#39;];\r\n//管道设计\r\nfunction carray($re, $fun){\r\n	return $fun($request, $re)\r\n}\r\n//最终输出\r\necho array_reduce($pipes, carry(), $route);</code></pre><p><img src=\"data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==\" /><img title=\"点击并拖拽以移动\" src=\"data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==\" style=\"height:15px; width:15px\" /></p><p>//分析<br />执行循序<br />before1 =&gt; before2 =&gt; before3 =&gt; before4 =&gt; before5 =&gt; $route =&gt; after1 =&gt; after2 =&gt; after3 =&gt; after4 =&gt; 输出</p><p><strong>其中：</strong></p><p><strong>数据对象就是$request|$response对象</strong></p><p><strong>过滤器就是before和after具体函数</strong></p><p><strong>管道就是$next回调函数</strong></p>','2018-09-27 04:58:37','2018-10-15 06:01:35',NULL),(9,'docker php fpm','<p>一台机器装多个php版本，很是费劲，研究了一下docker php，贴上来，给大家参考。</p><p>1、本地nginx+docker php-apache</p><p>官网的apache+nginx反向，<strong>我没有验证</strong>。</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\">docker run -it --rm --name php-apache -p 8080:80 -v /home/www/:/home/www/:rw  php:7.2.8-apache</code></pre></div><p>nginx conf</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\">location / {\r\n    proxy_pass   127.0.0.1:8080;\r\n}</code></pre></div><p>2、本地nginx+docker php-fpm</p><p>阅读官网教程后，所得如下：</p><p>volume最好前后写的一样，不容易出错。</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\">docker run -itd --name php7.2 -p 9000:9000 -v /home/dw:/home/dw:rw php:7.2.8-fpm</code></pre></div><p>nginx conf <strong>注意fastcgi_param配置，index.php的执行路径要写对</strong>。</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\">        location ~ \\.php$ {\r\n            fastcgi_pass   127.0.0.1:9000;\r\n            fastcgi_index  index.php;\r\n            fastcgi_param  SCRIPT_FILENAME  /home/www/api/public/<span class=\"hljs-variable\">$fastcgi_script_name</span>;\r\n            include fastcgi_params;\r\n        }</code></pre></div><p>可能会出现404报错</p><p>一般就是没有可执行权限，在宿主机上把对应的项目目录给上755权限。</p><p>临时脚本执行</p><p>不过还是没有直接php执行用的爽。</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\">docker run -it --rm --name php-cli -v /home/www:/home/www:rw php php /home/www/1.php</code></pre></div><p>&nbsp;</p><p>3、其它版本</p><p>多版本php依葫芦画瓢。</p><p>文章仅供参考，有什么问题欢迎提出。</p><p>4、php扩展安装</p><p>mcrypt为例：</p><p>已经安装好7.0 fpm。</p><p>注意，本次用的是7.0，7.2 docker-php-ext-configure提示already compiled，暂时没有找到原因。</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\">docker <span class=\"hljs-built_in\">exec</span> -it php7.0 /bin/bash</code></pre></div><p>进入容器后：&nbsp;</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\"><span class=\"hljs-comment\"># 更新apt-get</span>\r\napt-get update\r\n\r\n<span class=\"hljs-comment\"># 安装mcrypt</span>\r\napt-get install libmcrypt-dev\r\n\r\ndocker-php-ext-configure mcrypt\r\n\r\ndocker-php-ext-install mcrypt </code></pre></div><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\"><span class=\"hljs-comment\"># 安装gd</span>\r\napt-get install libfreetype6-dev libjpeg62-turbo-dev libpng-dev\r\n\r\ndocker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include\r\n\r\ndocker-php-ext-install gd</code></pre></div><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\"><span class=\"hljs-comment\"># 安装zip</span>\r\napt-get install libzip-dev\r\n\r\ndocker-php-ext-configure zip --with-libzip\r\n\r\ndocker-php-ext-install zip\r\n\r\n</code></pre></div><p>安装pdo</p><p>安装bcmath</p><p>退出重启</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\">docker restart php7.0</code></pre><img src=\"data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==\" /><span style=\"background:url(&quot;http://admin.la.test/packages/ckeditor/plugins/widget/images/handle.png&quot;) rgba(220, 220, 220, 0.5); display:block; left:0px; top:-15px\"><img src=\"data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==\" title=\"点击并拖拽以移动\" role=\"presentation\" style=\"height:15px; width:15px\" /></span></div><p>&nbsp;</p>','2018-09-27 04:59:07','2018-09-27 04:59:07',NULL),(10,'docker php-fpm 文件权限问题','<p>docker安装php-fpm。</p><p>&nbsp;</p><p>默认的php-fpm配置文件user和group配置是www-data。文件见（安装了vim）</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\"><span class=\"hljs-comment\"># 进入容器</span>\r\n<span class=\"hljs-comment\"># 查看fpm配置</span>\r\nvi /usr/<span class=\"hljs-built_in\">local</span>/etc/php-fpm.d/www.conf</code></pre></div><p>php-fpm启动后，通过volume共享操作文件，会有权限不一致导致没有权限读写文件的问题。</p><p>通过下面修改，解决权限问题。</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"language-bash hljs\"><span class=\"hljs-comment\"># 进入容器</span>\r\n<span class=\"hljs-comment\"># 查看volume文件在宿主机的权限</span>\r\nll /volume/\r\n<span class=\"hljs-comment\"># 把www-data的用户uid/gid修改成为volume文件权限用户的id</span>\r\nusermod -u 1000 www-data\r\ngroupmod -g 1000 www-data\r\n</code></pre><img src=\"data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==\" /><span style=\"background-image:url(http://admin.la.test/packages/ckeditor/plugins/widget/images/handle.png); background:rgba(220,220,220,0.5)\"><img src=\"data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==\" title=\"点击并拖拽以移动\" role=\"presentation\" style=\"height:15px; width:15px\" /></span></div><p>其它容器如果有volume权限问题，可以参考同样方法。</p>','2018-09-27 04:59:31','2018-09-27 04:59:31',NULL),(11,'docker 时区 php-fpm容器','<p>由于已经运行了容器，不想重新构建。使用下面方法修改。</p><p>原理：替换/etc/locatime</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"hljs\"># 查看/etc/localtime\r\nls -l /etc/localtime\r\n</code></pre></div><p>发现/etc/localtime使用的是软链</p><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"hljs\"># 删除软链\r\nrm /etc/localtime</code></pre></div><div tabindex=\"-1\" contenteditable=\"false\"><pre class=\"has\" data-widget=\"codeSnippet\"><code class=\"hljs\"># 使用上海软链\r\nln -s /usr/share/zoneinfo/Asia/Shanghai /etc/localtime\r\n# 查看时间\r\ndate\r\n# Wed Aug 22 10:47:50 CST 2018</code></pre><img src=\"data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==\" /><span style=\"background-image:url(http://admin.la.test/packages/ckeditor/plugins/widget/images/handle.png); background:rgba(220,220,220,0.5)\"><img src=\"data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==\" title=\"点击并拖拽以移动\" role=\"presentation\" style=\"height:15px; width:15px\" /></span></div><p>修改完成。</p>','2018-09-27 04:59:54','2018-09-27 04:59:54',NULL),(12,'语音识别 语音基础概念','<p><strong>语音是声音和意义的结合体。</strong>语音信号处理是利用数字信号处理技术，对语音进行处理的一门学科。</p><p>技术基础：</p><ul><li>理论：数字信号处理</li><li>理论：语音学</li><li>算法：数字滤波器<ul><li>将混合后的信号进行分离</li><li>恢复被损害的信号</li></ul></li><li>算法：快速博里叶变换（FFT）<ul><li>离散傅立叶变换(DFT)的快速算法<ul><li>连续傅里叶变换在时域和频域上都离散的形式</li><li>参考：https://blog.csdn.net/pizi0475/article/details/52914592</li></ul></li></ul></li></ul><p>应用：语音编码、语音识别、语音合成、说话人识别、语音增强。</p><p>声学特征：</p><ul><li>共振峰（Formant）。<ul><li>声音在经过共振腔时，受到腔体的滤波作用，使得<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E9%A2%91%E5%9F%9F/10790116\">频域</a>中不同频率的能量重新分配，一部分因为共振腔的共振作用得到强化，另一部分则受到衰减。由于能量分布不均匀，强的部分犹如山峰一般，故而称之为共振峰。</li><li>参考：https://baike.baidu.com/item/共振峰/6140265?fr=aladdin</li><li>参考：另外一篇共振峰文章</li></ul></li></ul><p>语音基本特征：</p><ul><li>音质：区别其他声音的特征。</li><li>音调：声音的高低，取决于频率，频率快，音调高。</li><li>音强：即音量，响度。取决于振幅。</li><li>音长：持续时间长短。</li><li>音素：最小最基本单位。分类：<ul><li>元音：声带震动，构成音节主干。所有元音都是浊音。</li><li>辅音：气流在口腔或咽头受到阻碍。声带震动：浊音。声带不震动：清音</li></ul></li><li>音节：语音片段，由音素构成。<ul><li>汉语：一个字是一个音节。一个音节由声母和韵母拼接。声母是一个音素。<ul><li>声调是音节。</li></ul></li></ul></li><li>词：由音节构成。</li><li>句子：由词构成。</li><li>&nbsp;</li></ul><p>时间波形和频谱特征</p><ul><li>浊音是脉冲序列。脉冲之间间隔是基音周期。</li></ul>','2018-10-15 06:00:58','2018-10-18 08:35:18',NULL),(13,'语音识别 共振峰','<p>声音在经过共振腔时，受到腔体的滤波作用，使得<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E9%A2%91%E5%9F%9F/10790116\">频域</a>中不同频率的能量重新分配，一部分因为共振腔的共振作用得到强化，另一部分则受到衰减。由于能量分布不均匀，强的部分犹如山峰一般，故而称之为共振峰。</p><p>参考：https://wenku.baidu.com/view/3c432267ddccda38376baf62.html</p><ul><li><strong>倒谱法</strong></li><li><strong>LPC谱估法</strong></li><li><strong>LPC倒谱法</strong></li></ul><p>&nbsp;</p>','2018-10-18 02:30:34','2018-10-18 02:30:34',NULL);
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

-- Dump completed on 2018-11-09 16:03:39
