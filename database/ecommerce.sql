-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 03:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `image`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'TANGGUH PRIMANDANU', 'tangguhprimandanu@gmail.com', '085273415077', NULL, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2024-01-11 05:25:25', '2023-12-31 09:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_cart` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_completed` enum('F','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id_cart`, `customer_id`, `order_date`, `is_completed`) VALUES
(1, 1, '2024-01-10 23:42:23', 'F'),
(2, 1, '2024-01-11 03:37:04', 'T'),
(3, 2, '2024-08-14 15:09:35', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `cartsitems`
--

CREATE TABLE `cartsitems` (
  `id_cartsitem` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `material_id` int(11) DEFAULT NULL,
  `laminasi_id` int(11) DEFAULT NULL,
  `facetype_id` int(11) DEFAULT NULL,
  `finishing_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `ukuran` varchar(30) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `filecontoh` varchar(150) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartsitems`
--

INSERT INTO `cartsitems` (`id_cartsitem`, `cart_id`, `product_id`, `material_id`, `laminasi_id`, `facetype_id`, `finishing_id`, `size_id`, `ukuran`, `template_id`, `keterangan`, `filecontoh`, `quantity`, `price`) VALUES
(1, 1, 5, NULL, 6, 3, 9, 5, NULL, NULL, 'test brosur', 'aa2a232ee0620d358d2c69f0f62b9cb2.jpg', 2, '56000'),
(3, 1, 6, 13, NULL, NULL, NULL, 7, NULL, NULL, 'dsads', '924af05b4036f22b935b181ec7c48bc9.jpg', 2, '134000'),
(5, 2, 10, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, 999, '999000'),
(6, 2, 1, 1, NULL, NULL, 1, NULL, '2 mx3m', NULL, 'test', 'ee5bac8bd0b411e59ba87e3978d16f69.jpeg', 5, '510000'),
(7, 2, 2, 4, 2, 1, 8, NULL, NULL, NULL, 'test kartu nama', 'fd2a0344aba3d99d11829db3cb5fc4fb.jpg', 5, '310000'),
(8, 2, 4, 11, NULL, NULL, NULL, 2, NULL, NULL, 'test contoh roll up banner', 'e28df4457f834f7d4f56b3c415824387.jpg', 5, '1825000'),
(9, 2, 5, NULL, 7, 3, 9, 5, NULL, NULL, 'test', '661a33d1f6fd33c85affeb264d535c07.jpg', 100, '4900000'),
(10, 3, 10, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 100, '100000');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `categories` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categories`, `categories`) VALUES
(1, 'Undangan'),
(2, 'Spanduk-Banner-Baliho'),
(3, 'Kartu Nama'),
(4, 'Roll Up Banner'),
(5, 'Brosur'),
(6, 'Standing Banner'),
(7, 'Sticker'),
(8, 'Alat Tulis'),
(9, 'Merchandise');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `name`, `email`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ferdy Ramadhan', 'ferdyramadhan99@gmail.com', '085273415077', '68880c1b70aeeb596c91bc192b9064f157445353', '2024-01-11 04:52:04', '2024-01-05 18:58:10'),
(2, 'Asiyah', 'mmmmm32ips2@gmail.com', '082223508704', '4ab2078d3fcc7ee53cdff2a36a0d679c03973e92', '2024-08-14 15:08:28', '2024-08-14 15:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `facetypes`
--

CREATE TABLE `facetypes` (
  `id_facetype` int(11) NOT NULL,
  `facetype` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `add_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facetypes`
--

INSERT INTO `facetypes` (`id_facetype`, `facetype`, `description`, `categories_id`, `add_price`) VALUES
(1, '1 Muka', 'Jenis Muka Kartu Nama', 3, '0'),
(2, '2 Muka (bolak balik)', 'Jenis Muka Kartu Nama', 3, '26250'),
(3, '1 Muka', 'Jenis Muka Brosur', 5, '0'),
(4, '2 Muka (bolak balik)', 'Jenis Muka Brosur', 5, '28000');

-- --------------------------------------------------------

--
-- Table structure for table `finishings`
--

CREATE TABLE `finishings` (
  `id_finishing` int(11) NOT NULL,
  `finishing` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `add_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finishings`
--

INSERT INTO `finishings` (`id_finishing`, `finishing`, `description`, `categories_id`, `add_price`) VALUES
(1, 'Lebih Putih Keliling (3cm)', 'Jenis Finishing Spanduk-Banner-Baliho', 2, '0'),
(2, 'Lebih Putih Keliling (10cm)', 'Jenis Finishing Spanduk-Banner-Baliho', 2, '1000'),
(3, 'Lipat + Mata Ayam per 50 cm', 'Jenis Finishing Spanduk-Banner-Baliho', 2, '500'),
(4, 'Lipat + Mata Ayam Ujung', 'Jenis Finishing Spanduk-Banner-Baliho', 2, '0'),
(5, 'Lipat Pas', 'Jenis Finishing Spanduk-Banner-Baliho', 2, '0'),
(6, 'BillBoard', 'Jenis Finishing Spanduk-Banner-Baliho', 2, '1000'),
(7, 'Ujung Kotak', 'Jenis Finishing Kartu Nama', 3, '0'),
(8, 'Ujung Round', 'Jenis Finishing Kartu Nama', 3, '10000'),
(9, 'Potong Saja', 'Jenis Finishing Brosur', 5, '0'),
(10, 'Lipat 2', 'Jenis Finishing Brosur', 5, '5250'),
(11, 'Lipat 3', 'Jenis Finishing Brosur', 5, '7000'),
(12, 'Tanpa Cutting', 'Jenis Finishing Sticker', 7, '0'),
(13, 'Kiss Cut / Cutting Countur', 'Jenis Finishing Sticker', 7, '4000');

-- --------------------------------------------------------

--
-- Table structure for table `laminations`
--

CREATE TABLE `laminations` (
  `id_lamination` int(11) NOT NULL,
  `lamination` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `add_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laminations`
--

INSERT INTO `laminations` (`id_lamination`, `lamination`, `description`, `categories_id`, `add_price`) VALUES
(1, 'Tanpa Laminasi', 'Laminasi Kartu Nama', 3, '0'),
(2, 'Laminasi Panas Matte', 'Laminasi Kartu Nama', 3, '17000'),
(3, 'Laminasi Panas Glossy', 'Laminasi Kartu Nama', 3, '17000'),
(4, 'Laminasi Dingin Matte', 'Laminasi Kartu Nama', 3, '45000'),
(5, 'Laminasi Dingin Glossy', 'Laminasi Kartu Nama', 3, '45000'),
(6, 'Tanpa Laminasi', 'Laminasi Brosur', 5, '0'),
(7, 'Laminasi Doff', 'Laminasi Brosur', 5, '21000'),
(8, 'Laminasi Glossy', 'Laminasi Brosur', 5, '21000'),
(9, 'Tanpa Laminasi', 'Laminasi Sticker', 7, '0'),
(10, 'Laminasi Panas Glossy', 'Laminasi Sticker', 7, '3000'),
(11, 'Laminasi Panas Doff', 'Laminasi Sticker', 7, '3000'),
(12, 'Laminasi Dingin Glossy', 'Laminasi Sticker', 7, '5000'),
(13, 'Laminasi Dingin Doff', 'Laminasi Sticker', 7, '5000');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id_material` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `add_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id_material`, `material`, `description`, `categories_id`, `add_price`) VALUES
(1, 'Frontlite Cina 280gr', 'Bahan Spanduk – Banner – Baliho', 2, '17000'),
(2, 'Frontlite Cina 340gr', 'Bahan Spanduk – Banner – Baliho', 2, '21000'),
(3, 'Frontlite Korcin 440gr', 'Bahan Spanduk – Banner – Baliho', 2, '49000'),
(4, 'Artpaper 260gr', 'Bahan Kartu Nama', 3, '35000'),
(5, 'LMO (tahan air, anti sobek)', 'Bahan Kartu Nama', 3, '70000'),
(6, 'Kartu Tik', 'Bahan Kartu Nama', 3, '40000'),
(7, 'Concord', 'Bahan Kartu Nama', 3, '40000'),
(8, 'Jasmine Putih', 'Bahan Kartu Nama', 3, '40000'),
(9, 'Jasmine Gading', 'Bahan Kartu Nama', 3, '40000'),
(10, 'Frontlite Cina 280gr', 'Bahan Roll Up Banner', 4, '0'),
(11, 'Frontlite Cina 340gr', 'Bahan Roll Up Banner', 4, '5000'),
(12, 'Frontlite Korcin 440gr', 'Bahan Roll Up Banner', 4, '33000'),
(13, 'Frontlite Cina 280gr', 'Bahan Standing Banner', 6, '0'),
(14, 'Frontlite Cina 340gr', 'Bahan Standing Banner', 6, '5000'),
(15, 'Frontlite KorCin 440gr', 'Bahan Standing Banner', 6, '33000'),
(16, 'Sticker Kromo / Bontax', 'Bahan Sticker', 7, '0'),
(17, 'Sticker HVS', 'Bahan Sticker', 7, '1000'),
(18, 'Sticker Vynil Putih Glossy', 'Bahan Sticker', 7, '4000'),
(19, 'Sticker Vynil Putih Doff', 'Bahan Sticker', 7, '4000'),
(20, 'Sticker Vynil Transparan Glossy', 'Bahan Sticker', 7, '4000');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `nameproduct` varchar(255) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `perusahaan` varchar(150) DEFAULT NULL,
  `negara` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kodepos` int(11) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `catatan` text DEFAULT NULL,
  `jmlbayar` varchar(20) NOT NULL,
  `tglbayar` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(20) NOT NULL,
  `status` enum('B','S','T','F') NOT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `send_order` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `cart_id`, `nameproduct`, `namalengkap`, `perusahaan`, `negara`, `alamat`, `kota`, `provinsi`, `kodepos`, `telepon`, `email`, `catatan`, `jmlbayar`, `tglbayar`, `payment_method`, `status`, `payment_proof`, `send_order`) VALUES
(1, 1, 2, 'test brosur', 'Ferdy Ramadhan', 'Diskominfo', 'INDONESIA', 'Metro', 'Lampung Utara', 'LAMPUNG', 34511, '085273415077', 'ferdyramadhan99@gmail.com', 'Kirim secepatnya ya kak', '8544000', '2024-01-11 03:55:38', 'BANK BCA', 'S', NULL, NULL),
(2, 2, 3, 'Undangan', 'Asiyah', 'Osik_makeup', '', 'jatisari', 'test', 'JAWA TENGAH', 51271, '082223508704', 'mmmmm32ips2@gmail.com', '', '100000', '2024-08-14 15:09:59', 'BANK BCA', 'S', 'bukti_transaksi3.jpg', '2024-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `id_image` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id_image`, `product_id`, `image`, `description`) VALUES
(1, 1, '41396bdd838f443111988e68a33157b0.png', ''),
(2, 1, 'f5c7927daf9b7d3ee60e1968cbe2c706.png', ''),
(3, 1, '03394877a6ec61037b3637ea03330708.png', ''),
(4, 2, '25dc059f084abf4875e72e037fe66555.jpg', ''),
(5, 2, '2fda1cd4b596beb0baff3747f3991618.jpg', ''),
(6, 2, '526859e875afebc034f65c2490f1e29f.jpg', ''),
(7, 2, 'dddab0aec830c7f9381caca648d1c240.jpg', ''),
(8, 4, 'e23e9d74ecb8490f6c126dffc4a71a33.jpg', ''),
(9, 4, 'bbf6b1fb990cfe891d120bb6659d0587.jpg', ''),
(10, 4, 'eab0be59efacf86f4c4d6f3855d9e6cc.jpg', ''),
(11, 4, '1459e61d30778fe320fdb5d5e79516a0.jpg', ''),
(13, 6, 'ef4d6a4b1490a612508ca790c8de742c.jpg', ''),
(14, 6, 'a1680788929dae7d97a7d6309fde15cc.jpg', ''),
(16, 7, '6f1426f2005b7674ae42064be25cc081.png', 'Template 1'),
(17, 7, 'c4862d2304e82bac748e9ffa500a7c77.png', 'Template 2'),
(18, 7, '6ce3d11483021793eaa02381ce4e06b8.png', 'Template 3'),
(19, 7, '44fcbe9ea9e2389e1bdcae0dc0d48ff0.png', 'Template 4'),
(20, 7, '4a1fbafc0cf5c09970a8783ce83be9d7.png', 'Template 5'),
(22, 8, '67fc906bbeac9d05e8428a99b09dd28f.jpg', ''),
(23, 8, '81ba56aa744dc0c3f22a1cdaf880e9e0.jpg', ''),
(24, 9, 'dc76e7e0725c6550e96d425b29ca616f.png', ''),
(25, 5, '94c806a8e749d001d47117ad5db01af6.jpg', ''),
(26, 5, '94ea68d5e44e9ff684a41a665a7571a5.jpg', ''),
(27, 5, '2705aaca9d7c576666d7fd5a5639abb0.jpg', ''),
(30, 10, '4e16723f39b16226c9010f76d08ed018.jpeg', 'Template 1'),
(31, 10, 'bb8c02d507887fc2a21ef32cfdc88eb4.jpg', 'Template 2');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `information` text NOT NULL,
  `baseprice` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `featureimage` varchar(150) DEFAULT NULL,
  `categories_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `description`, `information`, `baseprice`, `stock`, `featureimage`, `categories_id`, `created_at`) VALUES
(1, 'Spanduk – Banner – Baliho', 'Diperuntukkan sebagai media promosi yang umum ditemukan di tempat umum, baik di dalam maupun luar ruangan.\r\n\r\nDicetak menggunakan Mesin Outdoor dan Tinta Solvent.\r\n\r\nHasil cetak akan tahan air dan tahan sinar matahari hingga satu tahun (tergantung bahan yang digunakan).', 'informasi', '17000', 100, '5aae3b0eb786ccdf3de9bcb2b8da9385.png', 2, '2024-01-02 17:58:58'),
(2, 'Kartu Nama – Bussiness Card', 'deskripsi Kartu Nama – Bussiness Card', 'informasi Kartu Nama – Bussiness Card', '35000', 1000, '785374be0dcf28ab8c1f5f6016f55304.jpg', 3, '2024-01-02 19:00:20'),
(3, 'Kartu Nama Super', 'Kartu Nama Media paling sering digunakan Untuk promosi perusahaan Anda. Kartu Nama ini berukuran 9 x 5.5 cm 1 bok berisi 96 Lembar.\r\n\r\nDan Ada Beberapa Pilihan Bahan untuk Kartu Nama dan bisa Ditambah Laminating.\r\n\r\nBisa Dijadikan Kartu Diskon juga, Kartu Ucapan dll', 'Weight	250 g', '20000', 100, '789607c7b34c89ccbbeb1a6d4448e3bc.jpg', 3, '2024-01-02 19:16:53'),
(4, 'Roll Up Banner', 'Sebagai sarana promosi yang menarik, Roll up banner adalah jenis banner yang penggunaannya ditarik dari bawah ke atas pada bagian headernya.\r\n\r\nKelebihan Roll -banner :\r\n\r\nMudah dibawa bawa, karena gambar otomatis akan ketarik ke dalam tiangnya\r\nPaling Awet, gambarnya jarang sobel… tiang tidak mudah rusak\r\nCocok Untuk Promosi UMKM', '-', '225000', 100, '9cfaab801b9a77da87726708142c85a2.jpg', 4, '2024-01-02 19:46:50'),
(5, 'test brosur', 'test deskripsi', 'test informasi', '28000', 100, '7e8640b0fdcac0655854cfc2891c6aba.jpg', 5, '2024-01-05 06:55:24'),
(6, 'test standing banner', 'Y banner adalah Display promosi yang sudah menjadi salah satu andalan dalam berpromosi, cocok digunakan untuk semua kegiatan. Tiang Terbuat dari Alumunium yg BERKUALITAS TINGGI dan berbentuk huruf Y Dilengkapi tas oxford hitam sehingga mudah dibawa-bawa.\r\n\r\nKelebihan Y-banner :\r\n\r\nMudah dibawa\r\nHarga Paling Terjangkau\r\nCocok Untuk Promosi UMKM\r\nLebih Tahan dibanding X – Banner\r\nTidak Mudah Roboh terkena angin', 'Weight	1800 g', '67000', 100, '37d0c6d9177b304d56c6523ee50d3c7a.jpg', 6, '2024-01-05 07:39:58'),
(7, 'test sticker', 'Sticker ini sticker yang paling sering untuk buat LABEL STICKER KEMASAN\r\nBiasanya ditempelkan di produk untuk BRANDING / MEREK\r\n\r\nSangat Cocok Buat Usaha UMKM buat yang baru coba coba bikin makanan, bikin produk dll karena :\r\n– Harga terjangkau\r\n– Bikin dengan qty sedikit aja bisa, bahkan 1 lembar aja bisa\r\n– Proses tidak memakan waktu Lama\r\n\r\nAda 3 bahan yang umumnya dipakai :\r\n\r\n1. Sticker Kromo / Bontax\r\nStiker yang berbahan dasar kertas di beri lapisan glossy sehingga lebih mengkilap, Tahan Cipratan Air, Tahun UV, Anti Gores. Ini bahan yang sangat umum dipakai\r\n\r\n2. Sticker HVS\r\nStiker yang berbahan dasar kertas. Tahan Cipratan Air, Tahun UV, Anti Gores. Kelebihannya bisa di tulis dengan Bolpen/Pencil.\r\n\r\n3. Sticker Vynil Putih\r\nSticker Berbahan Vynil seperti Plastik dan berwarna Putih Kelebihan bahan ini TIDAK MUDAH SOBEK, Tahan Rendam Air, Tahan UV, Tahan Gores. Biasaya dipakai di kemasan yang masuk kulkas dan terkena air seperti shampoo, sabun dll\r\n\r\n4. Sticker Vynil Transparan\r\nSticker Berbahan Vynil seperti Plastik dan Transparan Kelebihan bahan ini TIDAK MUDAH SOBEK, Tahan Rendam Air, Tahan UV, Tahan Gores.\r\n\r\nDari semua bahan yang bisa dipakai bisa ditambahkan Laminasi dan dipotong sesuai bentuk yang diinginkan\r\n\r\nKami Menggunakan Mesin berteknologi Laser untuk Printing ini, Mesin Fuji Xerox PrimeLink\r\n\r\nCONTOH ISI sticker per-lembar A3+\r\nBULAT/KOTAK\r\n> Ukuran 2 x 2 cm isi 247 pcs\r\n> Ukuran 3 x 3 cm isi 117 pcs\r\n> Ukuran 4 x 4 cm isi 70 pcs\r\n> Ukuran 5 x 5 cm isi 40 pcs\r\n> Ukuran 6 x 6 cm isi 35 pcs\r\n> Ukuran 7 x 7 cm isi 24 pcs\r\n> Ukuran 8 x 8 cm isi 15 pcs\r\n> Ukuran 9 x 9 cm isi 12 pcs\r\n> Ukuran 10×10 cm isi 12 pcs\r\n\r\nPERSEGI PANJANG\r\n> Ukuran 6,3 x 9 cm isi 18 pcs\r\n> Ukuran 8,4 x 12 cm isi 10 pcs\r\n> Ukuran 10,5 x15 cm isi 8 pcs', 'Weight	30 g', '6000', 100, 'cce2aa9f3b5aeb1bd97f290713b534e0.png', 7, '2024-01-05 08:14:31'),
(8, 'Sidu Kertas HVS 70gram A4', 'test deskripsi', 'test informasi', '50000', 100, 'f8958179a4a4799b4c55c2dd5fec3561.jpg', 8, '2024-01-05 14:36:40'),
(9, 'Kalendar Meja', 'Cetak Kalender Duduk / Meja Tahun Baru Ukuran A5 8 LBR – Custom', 'Weight	210 g', '37000', 100, '52aaa9721bafbb9851dd5600d889a247.png', 9, '2024-01-05 14:51:39'),
(10, 'Undangan', 'test deskripsi', 'test informasi', '1000', 5000, 'a9fea2311a91c8f8e29ba353054afe44.jpeg', 1, '2024-01-05 15:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id_prov` int(2) NOT NULL,
  `nama_prov` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id_prov`, `nama_prov`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id_size` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `categories_id` int(11) NOT NULL,
  `add_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id_size`, `size`, `description`, `categories_id`, `add_price`) VALUES
(1, '60x160 cm', 'Ukuran Roll Up Banner', 4, '202000'),
(2, '85x200 cm', 'Ukuran Roll Up Banner', 4, '242000'),
(3, 'A4 (21x29cm)', 'Ukuran Brosur', 5, '100000'),
(4, 'A5 (14x21cm)', 'Ukuran Brosur', 5, '52000'),
(5, 'A6 (10x14cm)', 'Ukuran Brosur', 5, '28000'),
(6, '1/3 A4 (9x21cm)', 'Ukuran Brosur', 5, '36000'),
(7, '60x160 cm', 'Ukuran Standing Banner', 6, '67000');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `template` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `add_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `undangans`
--

CREATE TABLE `undangans` (
  `id_undangan` int(11) NOT NULL,
  `cartsitem_id` int(11) NOT NULL,
  `nama_wanita` varchar(100) NOT NULL,
  `panggilan_wanita` varchar(100) NOT NULL,
  `ayah_wanita` varchar(100) NOT NULL,
  `ibu_wanita` varchar(100) NOT NULL,
  `alamat_wanita` varchar(255) NOT NULL,
  `nama_pria` varchar(100) NOT NULL,
  `panggilan_pria` varchar(100) NOT NULL,
  `ayah_pria` varchar(100) NOT NULL,
  `ibu_pria` varchar(100) NOT NULL,
  `alamat_pria` varchar(255) NOT NULL,
  `tanggalakad` date NOT NULL,
  `jamakad` time NOT NULL,
  `tempatakad` varchar(255) NOT NULL,
  `tanggalresepsi` date NOT NULL,
  `jamresepsi` time NOT NULL,
  `tempatresepsi` varchar(255) NOT NULL,
  `turut1` varchar(100) DEFAULT NULL,
  `turut2` varchar(100) DEFAULT NULL,
  `turut3` varchar(100) DEFAULT NULL,
  `turut4` varchar(100) DEFAULT NULL,
  `turut5` varchar(100) DEFAULT NULL,
  `model_undangan` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `jmlpesanan` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `namapemesan` varchar(100) NOT NULL,
  `emailpemesan` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `undangans`
--

INSERT INTO `undangans` (`id_undangan`, `cartsitem_id`, `nama_wanita`, `panggilan_wanita`, `ayah_wanita`, `ibu_wanita`, `alamat_wanita`, `nama_pria`, `panggilan_pria`, `ayah_pria`, `ibu_pria`, `alamat_pria`, `tanggalakad`, `jamakad`, `tempatakad`, `tanggalresepsi`, `jamresepsi`, `tempatresepsi`, `turut1`, `turut2`, `turut3`, `turut4`, `turut5`, `model_undangan`, `harga`, `jmlpesanan`, `customer_id`, `namapemesan`, `emailpemesan`, `telepon`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 'Siti', 'Siti', 'Yatono', 'Yatini', 'Pekalongan', 'Budi', 'Budi', 'Satono', 'Sulaseh', 'Kotabumi', '2024-01-19', '09:00:00', 'Pekalongan', '2024-01-25', '10:00:00', 'Kotabumi', 'Budi Utomo', 'Ardian Saputri', 'Wahdi', 'Martahan', 'Anton Widawan', '30', '999000', 999, 1, 'Ferdy Ramadhan', 'ferdyramadhan99@gmail.com', '085273415077', 'Belum Diperiksa', '2024-01-11 03:37:18', '2024-01-11 03:37:18'),
(4, 10, 'Asiyah', 'Osik', 'Miskono', 'Rasminah', 'Jatisari', 'Primadanu', 'Danu', 'Mutinah', 'Agus Sardjono', 'Babadan', '2024-08-15', '12:11:00', 'jkhsdjka', '2024-08-15', '23:10:00', 'ahd', 'Agus', 'Dini', 'Ita', '', '', '', '100000', 100, 2, 'Asiyah', 'mmmmm32ips2@gmail.com', '082223508704', 'Belum Diperiksa', '2024-08-14 15:09:35', '2024-08-14 15:09:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `cartsitems`
--
ALTER TABLE `cartsitems`
  ADD PRIMARY KEY (`id_cartsitem`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `facetypes`
--
ALTER TABLE `facetypes`
  ADD PRIMARY KEY (`id_facetype`);

--
-- Indexes for table `finishings`
--
ALTER TABLE `finishings`
  ADD PRIMARY KEY (`id_finishing`);

--
-- Indexes for table `laminations`
--
ALTER TABLE `laminations`
  ADD PRIMARY KEY (`id_lamination`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undangans`
--
ALTER TABLE `undangans`
  ADD PRIMARY KEY (`id_undangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cartsitems`
--
ALTER TABLE `cartsitems`
  MODIFY `id_cartsitem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facetypes`
--
ALTER TABLE `facetypes`
  MODIFY `id_facetype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `finishings`
--
ALTER TABLE `finishings`
  MODIFY `id_finishing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laminations`
--
ALTER TABLE `laminations`
  MODIFY `id_lamination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `undangans`
--
ALTER TABLE `undangans`
  MODIFY `id_undangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
