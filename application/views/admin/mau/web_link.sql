-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2015 at 07:03 PM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fttedu_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `web_link`
--

CREATE TABLE IF NOT EXISTS `web_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1014 ;

--
-- Dumping data for table `web_link`
--

INSERT INTO `web_link` (`id`, `image`, `title`, `link`, `description`) VALUES
(1004, 'DTN1.png', 'Đoàn thanh niên', 'http://doanthanhnien.qnu.edu.vn/index.php/vi/', '0'),
(1005, 'tc1.png', 'Đào tạo tín chí', 'http://tinchi.qnu.edu.vn/', '0'),
(1006, 'logo_dhqn.png', 'Trường ĐH Quy Nhơn', 'http://www.qnu.edu.vn/', '0'),
(1007, 'logo-32.png', 'Bộ giáo dục đào tạo', 'http://www.moet.gov.vn/?page=9.6', '0'),
(1008, 'pcbinhdinh2.png', 'pc bình định', 'http://pcbinhdinh.com.vn/', '0'),
(1009, 'tttt2.png', 'Thông tin truyền thông', 'http://mic.gov.vn/Trang/trangchu.aspx', '0'),
(1010, 'sxdbd.png', 'Sở xây dựng bình định', 'http://sxd.binhdinh.gov.vn/', '0'),
(1011, 'Baner_congTTDT11.jpg', 'Cổng thông tin truyền thông', 'http://www.binhdinh.gov.vn/inetcloud/portal/main/page/home.ivt', '0'),
(1012, 'bkhn.png', 'Bách khoa hà nội', 'http://www.hust.edu.vn/web/vi/home', '0'),
(1013, 'logo_BKHCM11.gif', 'Bách khoa hồ chí minh', 'http://www.hcmut.edu.vn/vi', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
