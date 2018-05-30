SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` int(2) unsigned NOT NULL,
  `district_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `district_name`) VALUES
(1, 3, 'Dhaka'),
(2, 3, 'Faridpur'),
(3, 3, 'Gazipur'),
(4, 3, 'Gopalganj'),
(5, 8, 'Jamalpur'),
(6, 3, 'Kishoreganj'),
(7, 3, 'Madaripur'),
(8, 3, 'Manikganj'),
(9, 3, 'Munshiganj'),
(10, 8, 'Mymensingh'),
(11, 3, 'Narayanganj'),
(12, 3, 'Narsingdi'),
(13, 8, 'Netrokona'),
(14, 3, 'Rajbari'),
(15, 3, 'Shariatpur'),
(16, 8, 'Sherpur'),
(17, 3, 'Tangail'),
(18, 5, 'Bogura'),
(19, 5, 'Joypurhat'),
(20, 5, 'Naogaon'),
(21, 5, 'Natore'),
(22, 5, 'Nawabganj'),
(23, 5, 'Pabna'),
(24, 5, 'Rajshahi'),
(25, 5, 'Sirajgonj'),
(26, 6, 'Dinajpur'),
(27, 6, 'Gaibandha'),
(28, 6, 'Kurigram'),
(29, 6, 'Lalmonirhat'),
(30, 6, 'Nilphamari'),
(31, 6, 'Panchagarh'),
(32, 6, 'Rangpur'),
(33, 6, 'Thakurgaon'),
(34, 1, 'Barguna'),
(35, 1, 'Barishal'),
(36, 1, 'Bhola'),
(37, 1, 'Jhalokati'),
(38, 1, 'Patuakhali'),
(39, 1, 'Pirojpur'),
(40, 2, 'Bandarban'),
(41, 2, 'Brahmanbaria'),
(42, 2, 'Chandpur'),
(43, 2, 'Chattogram'),
(44, 2, 'Cumilla'),
(45, 2, 'Cox''s Bazar'),
(46, 2, 'Feni'),
(47, 2, 'Khagrachari'),
(48, 2, 'Lakshmipur'),
(49, 2, 'Noakhali'),
(50, 2, 'Rangamati'),
(51, 7, 'Habiganj'),
(52, 7, 'Maulvibazar'),
(53, 7, 'Sunamganj'),
(54, 7, 'Sylhet'),
(55, 4, 'Bagerhat'),
(56, 4, 'Chuadanga'),
(57, 4, 'Jashore'),
(58, 4, 'Jhenaidah'),
(59, 4, 'Khulna'),
(60, 4, 'Kushtia'),
(61, 4, 'Magura'),
(62, 4, 'Meherpur'),
(63, 4, 'Narail'),
(64, 4, 'Satkhira');
