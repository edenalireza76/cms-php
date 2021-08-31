-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2021 at 09:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `sort`, `status`) VALUES
(43, 'درباره ما', 1, 1),
(44, 'تماس با ما', 2, 1),
(45, 'تماس با ما', 2, 0),
(48, 'بلاگ', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `content` text COLLATE utf8_persian_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `writer` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `image`, `content`, `tag`, `writer`, `date`) VALUES
(14, 'دوره جامــع آمــوزش PHP', 'https://toplearn.com/img/course/3fe2f3a4-f9f1-435e-b5d4-69ccd6066f23php.png', '<p>بان PHP یک زبان اسکریپتی و open source است که برای طراحی برنامه های تحت وب &nbsp;مورد استفاده قرار میگیرد. منظور از سمت سرور بودن چیست؟ بدین معنا که صفحات PHP ابتدا توسط سرور ، پردازش شده و سپس خروجی به صورت کدهای HTML &nbsp;برای مرورگر &nbsp;ارسال می شود.</p>\r\n\r\n<p>PHP مخفف Hypertext PreProcessor به معنای پیش پردازند ابرمتن است.</p>\r\n\r\n<p>زبان PHP در سایت های بزرگی همچون :&nbsp;<strong>Wikipedia ,&nbsp;</strong>Facebook, Slack , MailChimp , Wordpress ,Yahoo مورد استفاده قرار میگیرد</p>\r\n\r\n<p>&nbsp;این زبان بدلیل مزیت های فراوانی که دارد توانسته است در دنیای برنامه نویسی جایگاه ویژه ای برای خود باز کند و طرفداران زیادی را برای خود جذب نماید.از جمله مزیت های آن میتوان به موارد زیر اشاره کرد :</p>\r\n', 'php ', 1, '1623071954'),
(19, 'دوره آموزش جامع NodeJs', 'https://toplearn.com/img/course/img-course-%DA%86%D9%87%D8%A7%D8%B1-%D8%B4%D9%86%D8%A8%D9%87-%DB%B3-%D8%A7%D8%B1%D8%AF%DB%8C%D8%A8%D9%87%D8%B4%D8%AA-%DB%B1%DB%B3%DB%B9%DB%B9-65103705-591.jpg', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 4, '1623074774'),
(20, 'طراحی وب پیشرفته + 12 پروژه عملی  ', 'https://toplearn.com/img/course/af068497-8da9-4f3c-ae9b-243597308fb8webdesign.png', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 4, '1623074703'),
(21, 'آموزش کتابخانه Volley', 'https://toplearn.com/img/course/54a49440-9e07-4711-b14d-ea6f2a6190bbvolley.png', '<p>s</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;&gt;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;&gt;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 1, '1623074625'),
(9, 'آموزش نرم افزار Adobe Bridge', 'https://toplearn.com/img/course/a42aad30-3080-4938-97c1-b7aa716b4fb4%D9%85%D8%AE%D8%B5%D9%88%D8%B5_%D9%86%D8%A7%D8%B4%D9%86%D9%88%D8%A7%DB%8C%D8%A7%D9%86_php_%D8%AF%D9%88%D8%B1%D9%87_%D8%A2%D9%85%D9%88%D8%B2%D8%B4%DB%8C.png', '<p>PHP یک زبان قدرتمند برای ساخت وب سایت های پویا است. این زبان اسکریپتی میتواند با HTML ادغام شود. php یک زبان در سمت سرور است, بدین معنا که کدهای php روی سرور تفسیر میشوند و خروجی html و یا خروجی های دیگری تولید میکند که توسط کاربر قابل مشاهده است.</p>\r\n', 'php ', 2, '1622487533');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `age` int(11) NOT NULL DEFAULT '18',
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `age`, `password`, `role`) VALUES
(20, 'ali', 'alimoghimian66@gmail.com', 13, '1234', 1),
(22, 'amir76', 'amirazizi76@gmail.com', 19, '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

DROP TABLE IF EXISTS `writers`;
CREATE TABLE IF NOT EXISTS `writers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `name`) VALUES
(1, 'alireza'),
(2, 'قاسم '),
(3, 'علیرضا مقیمیان یزد '),
(4, 'معین حسین پور');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
