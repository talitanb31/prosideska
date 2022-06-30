-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 04:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prosideska_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('superadmin','admin','user','kepaladesa') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(5, 'Admin', 'admin', '$2y$10$k9lw/1MXd4yhM51cVPhNuej8/luvCqk2WkEHGhlesNK21q4huYqOi', 'admin', '2022-04-04 18:23:30', '2022-04-04 18:23:30'),
(6, 'Superadmin', 'superadmin', '$2y$10$k9lw/1MXd4yhM51cVPhNuej8/luvCqk2WkEHGhlesNK21q4huYqOi', 'superadmin', '2022-04-04 18:23:30', '2022-04-04 18:23:30'),
(7, 'admin 2', 'admindua', '$2y$10$JlZTZpJEK5ETHSOAZ4pexO53B9zbhHBibikSkQxrTj.WV6Z.2zvB.', 'admin', '2022-06-18 13:22:27', '2022-06-18 13:22:27'),
(8, 'Kepala Desa', 'kepaladesa', '$2y$10$k9lw/1MXd4yhM51cVPhNuej8/luvCqk2WkEHGhlesNK21q4huYqOi', 'kepaladesa', '2022-04-04 18:23:30', '2022-04-04 18:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `cover` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `id_admin`, `cover`, `title`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 4, '1592446127_160222141838-indonesian-food-ayam-goreng-2010-1900px.jpg', 'Berita', 'berita', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a nulla massa. Aenean nec ante scelerisque sem imperdiet dapibus. Curabitur quis libero imperdiet, vulputate lorem id, tincidunt turpis. Integer lacinia cursus urna, ac suscipit lorem maximus at. Quisque molestie aliquam libero sit amet hendrerit. Etiam ut aliquam sapien, vel vulputate arcu. Cras quis ultrices magna. Sed vitae elementum odio, nec rutrum purus. Donec blandit arcu sed bibendum sodales. Nulla commodo sollicitudin libero, et ornare ipsum tincidunt ut. Aenean semper lorem vitae aliquet rhoncus. Ut ut risus sapien. Aliquam neque tellus, fermentum id neque eleifend, feugiat dictum ipsum. Nullam eget lacus elementum, mollis dui at, auctor massa.\r\n\r\nPraesent imperdiet commodo nunc, at vestibulum augue malesuada at. Cras risus lacus, sagittis non arcu ac, rhoncus tempor ligula. Sed viverra tellus in facilisis ultrices. Cras non nisi id nisi elementum pulvinar in eget diam. Aenean vestibulum lacus a felis tristique, eget pharetra sem malesuada. Nam mattis erat non lacus condimentum, a cursus elit fringilla. Vestibulum ultrices efficitur posuere. Aenean porta purus sit amet nunc cursus vehicula. Cras sed euismod quam. Proin velit libero, semper vitae venenatis eget, laoreet et nunc. Phasellus non est posuere, tempus nunc in, efficitur nulla. Integer elit augue, semper sed nulla a, facilisis condimentum ante. Ut lobortis leo hendrerit tellus bibendum, ut ultrices neque dapibus. Ut tortor ipsum, laoreet a sem ut, rhoncus consequat lacus. Vivamus consequat ligula in mi feugiat tempus in eget mi. Duis mauris odio, fringilla vitae mi non, lacinia consequat sem.', '2022-04-04 10:51:05', '2022-04-04 10:51:05'),
(2, 4, '1593680222_Screenshot_1.png', 'Berita Gaga', 'berita-gaga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a nulla massa. Aenean nec ante scelerisque sem imperdiet dapibus. Curabitur quis libero imperdiet, vulputate lorem id, tincidunt turpis. Integer lacinia cursus urna, ac suscipit lorem maximus at. Quisque molestie aliquam libero sit amet hendrerit. Etiam ut aliquam sapien, vel vulputate arcu. Cras quis ultrices magna. Sed vitae elementum odio, nec rutrum purus. Donec blandit arcu sed bibendum sodales. Nulla commodo sollicitudin libero, et ornare ipsum tincidunt ut. Aenean semper lorem vitae aliquet rhoncus. Ut ut risus sapien. Aliquam neque tellus, fermentum id neque eleifend, feugiat dictum ipsum. Nullam eget lacus elementum, mollis dui at, auctor massa.\r\n\r\nPraesent imperdiet commodo nunc, at vestibulum augue malesuada at. Cras risus lacus, sagittis non arcu ac, rhoncus tempor ligula. Sed viverra tellus in facilisis ultrices. Cras non nisi id nisi elementum pulvinar in eget diam. Aenean vestibulum lacus a felis tristique, eget pharetra sem malesuada. Nam mattis erat non lacus condimentum, a cursus elit fringilla. Vestibulum ultrices efficitur posuere. Aenean porta purus sit amet nunc cursus vehicula. Cras sed euismod quam. Proin velit libero, semper vitae venenatis eget, laoreet et nunc. Phasellus non est posuere, tempus nunc in, efficitur nulla. Integer elit augue, semper sed nulla a, facilisis condimentum ante. Ut lobortis leo hendrerit tellus bibendum, ut ultrices neque dapibus. Ut tortor ipsum, laoreet a sem ut, rhoncus consequat lacus. Vivamus consequat ligula in mi feugiat tempus in eget mi. Duis mauris odio, fringilla vitae mi non, lacinia consequat sem.', '2022-04-04 10:51:27', '2022-04-04 10:51:27'),
(3, 4, '1592458958_The-famous-nasi-goreng-dish-of-DB-960x640.jpg', 'Irure pariatur Accu', 'irure-pariatur-accu', 'Suscipit possimus i', '2022-04-04 10:52:00', '2022-04-04 10:52:00'),
(4, 4, '1593839157_MIE_GORENG_SEAFOOD_2.jpg', 'Eos illo est fugia', 'eos-illo-est-fugia', 'Praesentium tempor r', '2022-04-04 10:52:05', '2022-04-04 10:52:05'),
(5, 4, '1593838957_NASI_GORENG_SEAFOOD.jpg', 'Quasi ex velit fugit', 'quasi-ex-velit-fugit', 'Facere non dolore po', '2022-04-04 10:52:15', '2022-04-04 10:52:15'),
(6, 4, '1593676092_Screenshot_1.png', 'Quidem molestiae qua', 'quidem-molestiae-qua', 'Temporibus est adipi', '2022-04-04 10:52:19', '2022-04-04 10:52:19'),
(7, 4, '1593839692_BihunGorengAyam1.jpg', 'Aut ad et occaecat s', 'aut-ad-et-occaecat-s', 'Tempore at fugit q', '2022-04-04 10:52:23', '2022-04-04 10:52:23'),
(8, 4, '1593845775_DPP07E3061A150C26.jpg', 'Tes Berita cuy', 'tes-berita-cuy', 'larjkashd auidas hdauisdtg yuqwgyusgdasgdj asdgyuagsd asdgyquwg', '2022-04-04 10:57:55', '2022-04-04 10:57:55'),
(9, 4, '1593696722_kppd-00_sejarah-dan-jenis-kopi_sejarah-kopi_800x450_cc0-min.jpg', 'Dolores id dolores r', 'dolores-id-dolores-r', 'Omnis maxime eius en', '2022-04-04 11:32:31', '2022-04-04 11:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subjek` text DEFAULT NULL,
  `pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `jenis`) VALUES
(2, 'Surat Keterangan Pindah'),
(4, 'Surat Tidak Mampu'),
(5, 'Surat Kelahiran'),
(6, 'Surat Usaha'),
(8, 'Surat Kematian'),
(10, 'Surat Kuasa'),
(11, 'Surat Keterangan Kehilangan'),
(12, 'Surat Keterangan Belum Menikah'),
(13, 'Surat Keterangan Perjalanan'),
(14, 'Surat Keterangan Cacatan Kepolisian'),
(15, 'Surat Perwalian');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `dusun` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `ekonomi` text DEFAULT NULL,
  `file_kk` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id`, `alamat`, `dusun`, `rt`, `rw`, `ekonomi`, `file_kk`, `created_at`, `updated_at`) VALUES
(1, 'wwww', 'ads', '1', '2', 'asd', 'asd', '2022-03-23 13:44:22', '2022-03-23 08:40:12'),
(2, 'Eaque quo temporibus', 'Quia ratione dicta e', '21', '56', 'Nostrum qui voluptat', '', '2022-03-23 08:34:56', '2022-03-23 08:34:56'),
(3, 'Dolore neque qui qui', 'Id provident hic om', '37', '31', 'Consequuntur reicien', '', '2022-03-23 08:35:21', '2022-03-23 08:35:21'),
(6, 'Aut voluptates culpa', 'Nobis cupidatat volu', '70', '73', 'Neque sint labore no', '1650304125668.jpg', '2022-04-20 03:08:49', '2022-04-20 03:08:49'),
(7, 'asdads', 'wq3eqwe', '64', '47', '22222', 'croped.jpeg', '2022-04-20 03:09:05', '2022-04-20 03:09:05'),
(8, 'qweqwe123eqwe', 'qweqwewqe', '2', '2', '21312312', 'bpbd_1_(1)_1.png', '2022-04-20 03:09:44', '2022-04-20 03:09:44'),
(9, 'In ut error dolorum ', 'Alias natus duis ut ', '17', '48', 'Sapiente velit illo', 'Logo-Polije-Politeknik-Negeri-Jember-Original.png', '2022-05-17 07:16:52', '2022-05-17 07:16:52'),
(10, 'tes', 'Rem praesentium simi', '69', '14', 'Nostrud distinctio ', 'WhatsApp Image 2022-05-16 at 07_46_30.jpeg', '2022-05-17 07:17:19', '2022-05-17 07:17:19'),
(11, 'halo', 'Repudiandae id maxi', '70', '52', 'Voluptatem dicta lo', 'WhatsApp Image 2022-05-16 at 07_46_30.jpeg', '2022-05-17 07:28:51', '2022-05-17 07:28:51'),
(12, 'tes gambar', 'Eos fugiat necessit', '17', '8', 'Aut sapiente dolor o', 'WhatsApp Image 2022-05-16 at 07_46_30.jpeg', '2022-05-17 07:29:18', '2022-05-17 07:29:18'),
(13, 'In ea maiores itaque', 'Repellendus Aliquid', '64', '21', 'Suscipit modi sunt v', 'WhatsApp-Image-2022-05-16-at-07.46.30.jpeg', '2022-05-17 07:36:32', '2022-05-17 07:36:32'),
(14, 'haha', 'Magna velit minus a ', '80', '83', 'Earum facere vel lab', 'WhatsApp-Image-2022-05-16-at-07.46.30.jpeg', '2022-05-17 07:36:46', '2022-05-17 07:36:46'),
(15, 'wewew', 'Enim eligendi at vol', '30', '22', 'Esse repellendus Ne', 'WhatsApp Image 2022-05-16 at 07_46_30.jpeg', '2022-05-17 07:38:33', '2022-05-17 07:38:33'),
(16, 'Dolor commodo reicie', 'Officia incidunt ea', '56', '11', 'Illo eiusmod ratione', 'WhatsApp-Image-2022-05-16-at-07.46.30.jpeg', '2022-05-17 07:41:53', '2022-05-17 07:41:53'),
(17, 'wowow', 'Ex velit quae praes', '99', '14', 'Corporis vel autem e', 'WhatsApp Image 2022-05-16 at 07_46_30.jpeg', '2022-05-17 07:42:38', '2022-05-17 07:42:38'),
(18, 'akak', 'Iusto quis fuga Nis', '86', '73', 'Accusantium aute sun', 'screenshot-support_google_com-2022_04_23-18_10_30.png', '2022-05-17 07:43:02', '2022-05-17 07:43:02'),
(19, 'kuku', 'Architecto reprehend', '84', '32', 'Ullam libero dolor n', 'WhatsApp Image 2022-05-16 at 07_42_54.jpeg', '2022-05-17 07:43:46', '2022-05-17 07:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'AF', 'Afghanistan'),
(52, 'AL', 'Albania'),
(53, 'DZ', 'Algeria'),
(54, 'DS', 'American Samoa'),
(55, 'AD', 'Andorra'),
(56, 'AO', 'Angola'),
(57, 'AI', 'Anguilla'),
(58, 'AQ', 'Antarctica'),
(59, 'AG', 'Antigua and Barbuda'),
(60, 'AR', 'Argentina'),
(61, 'AM', 'Armenia'),
(62, 'AW', 'Aruba'),
(63, 'AU', 'Australia'),
(64, 'AT', 'Austria'),
(65, 'AZ', 'Azerbaijan'),
(66, 'BS', 'Bahamas'),
(67, 'BH', 'Bahrain'),
(68, 'BD', 'Bangladesh'),
(69, 'BB', 'Barbados'),
(70, 'BY', 'Belarus'),
(71, 'BE', 'Belgium'),
(72, 'BZ', 'Belize'),
(73, 'BJ', 'Benin'),
(74, 'BM', 'Bermuda'),
(75, 'BT', 'Bhutan'),
(76, 'BO', 'Bolivia'),
(77, 'BA', 'Bosnia and Herzegovina'),
(78, 'BW', 'Botswana'),
(79, 'BV', 'Bouvet Island'),
(80, 'BR', 'Brazil'),
(81, 'IO', 'British Indian Ocean Territory'),
(82, 'BN', 'Brunei Darussalam'),
(83, 'BG', 'Bulgaria'),
(84, 'BF', 'Burkina Faso'),
(85, 'BI', 'Burundi'),
(86, 'KH', 'Cambodia'),
(87, 'CM', 'Cameroon'),
(88, 'CA', 'Canada'),
(89, 'CV', 'Cape Verde'),
(90, 'KY', 'Cayman Islands'),
(91, 'CF', 'Central African Republic'),
(92, 'TD', 'Chad'),
(93, 'CL', 'Chile'),
(94, 'CN', 'China'),
(95, 'CX', 'Christmas Island'),
(96, 'CC', 'Cocos (Keeling) Islands'),
(97, 'CO', 'Colombia'),
(98, 'KM', 'Comoros'),
(99, 'CD', 'Democratic Republic of the Congo'),
(100, 'CG', 'Republic of Congo'),
(101, 'CK', 'Cook Islands'),
(102, 'CR', 'Costa Rica'),
(103, 'HR', 'Croatia (Hrvatska)'),
(104, 'CU', 'Cuba'),
(105, 'CY', 'Cyprus'),
(106, 'CZ', 'Czech Republic'),
(107, 'DK', 'Denmark'),
(108, 'DJ', 'Djibouti'),
(109, 'DM', 'Dominica'),
(110, 'DO', 'Dominican Republic'),
(111, 'TP', 'East Timor'),
(112, 'EC', 'Ecuador'),
(113, 'EG', 'Egypt'),
(114, 'SV', 'El Salvador'),
(115, 'GQ', 'Equatorial Guinea'),
(116, 'ER', 'Eritrea'),
(117, 'EE', 'Estonia'),
(118, 'ET', 'Ethiopia'),
(119, 'FK', 'Falkland Islands (Malvinas)'),
(120, 'FO', 'Faroe Islands'),
(121, 'FJ', 'Fiji'),
(122, 'FI', 'Finland'),
(123, 'FR', 'France'),
(124, 'FX', 'France, Metropolitan'),
(125, 'GF', 'French Guiana'),
(126, 'PF', 'French Polynesia'),
(127, 'TF', 'French Southern Territories'),
(128, 'GA', 'Gabon'),
(129, 'GM', 'Gambia'),
(130, 'GE', 'Georgia'),
(131, 'DE', 'Germany'),
(132, 'GH', 'Ghana'),
(133, 'GI', 'Gibraltar'),
(134, 'GK', 'Guernsey'),
(135, 'GR', 'Greece'),
(136, 'GL', 'Greenland'),
(137, 'GD', 'Grenada'),
(138, 'GP', 'Guadeloupe'),
(139, 'GU', 'Guam'),
(140, 'GT', 'Guatemala'),
(141, 'GN', 'Guinea'),
(142, 'GW', 'Guinea-Bissau'),
(143, 'GY', 'Guyana'),
(144, 'HT', 'Haiti'),
(145, 'HM', 'Heard and Mc Donald Islands'),
(146, 'HN', 'Honduras'),
(147, 'HK', 'Hong Kong'),
(148, 'HU', 'Hungary'),
(149, 'IS', 'Iceland'),
(150, 'IN', 'India'),
(151, 'IM', 'Isle of Man'),
(152, 'ID', 'Indonesia'),
(153, 'IR', 'Iran (Islamic Republic of)'),
(154, 'IQ', 'Iraq'),
(155, 'IE', 'Ireland'),
(156, 'IL', 'Israel'),
(157, 'IT', 'Italy'),
(158, 'CI', 'Ivory Coast'),
(159, 'JE', 'Jersey'),
(160, 'JM', 'Jamaica'),
(161, 'JP', 'Japan'),
(162, 'JO', 'Jordan'),
(163, 'KZ', 'Kazakhstan'),
(164, 'KE', 'Kenya'),
(165, 'KI', 'Kiribati'),
(166, 'KP', 'Korea, Democratic People\'s Republic of'),
(167, 'KR', 'Korea, Republic of'),
(168, 'XK', 'Kosovo'),
(169, 'KW', 'Kuwait'),
(170, 'KG', 'Kyrgyzstan'),
(171, 'LA', 'Lao People\'s Democratic Republic'),
(172, 'LV', 'Latvia'),
(173, 'LB', 'Lebanon'),
(174, 'LS', 'Lesotho'),
(175, 'LR', 'Liberia'),
(176, 'LY', 'Libyan Arab Jamahiriya'),
(177, 'LI', 'Liechtenstein'),
(178, 'LT', 'Lithuania'),
(179, 'LU', 'Luxembourg'),
(180, 'MO', 'Macau'),
(181, 'MK', 'North Macedonia'),
(182, 'MG', 'Madagascar'),
(183, 'MW', 'Malawi'),
(184, 'MY', 'Malaysia'),
(185, 'MV', 'Maldives'),
(186, 'ML', 'Mali'),
(187, 'MT', 'Malta'),
(188, 'MH', 'Marshall Islands'),
(189, 'MQ', 'Martinique'),
(190, 'MR', 'Mauritania'),
(191, 'MU', 'Mauritius'),
(192, 'TY', 'Mayotte'),
(193, 'MX', 'Mexico'),
(194, 'FM', 'Micronesia, Federated States of'),
(195, 'MD', 'Moldova, Republic of'),
(196, 'MC', 'Monaco'),
(197, 'MN', 'Mongolia'),
(198, 'ME', 'Montenegro'),
(199, 'MS', 'Montserrat'),
(200, 'MA', 'Morocco'),
(201, 'MZ', 'Mozambique'),
(202, 'MM', 'Myanmar'),
(203, 'NA', 'Namibia'),
(204, 'NR', 'Nauru'),
(205, 'NP', 'Nepal'),
(206, 'NL', 'Netherlands'),
(207, 'AN', 'Netherlands Antilles'),
(208, 'NC', 'New Caledonia'),
(209, 'NZ', 'New Zealand'),
(210, 'NI', 'Nicaragua'),
(211, 'NE', 'Niger'),
(212, 'NG', 'Nigeria'),
(213, 'NU', 'Niue'),
(214, 'NF', 'Norfolk Island'),
(215, 'MP', 'Northern Mariana Islands'),
(216, 'NO', 'Norway'),
(217, 'OM', 'Oman'),
(218, 'PK', 'Pakistan'),
(219, 'PW', 'Palau'),
(220, 'PS', 'Palestine'),
(221, 'PA', 'Panama'),
(222, 'PG', 'Papua New Guinea'),
(223, 'PY', 'Paraguay'),
(224, 'PE', 'Peru'),
(225, 'PH', 'Philippines'),
(226, 'PN', 'Pitcairn'),
(227, 'PL', 'Poland'),
(228, 'PT', 'Portugal'),
(229, 'PR', 'Puerto Rico'),
(230, 'QA', 'Qatar'),
(231, 'RE', 'Reunion'),
(232, 'RO', 'Romania'),
(233, 'RU', 'Russian Federation'),
(234, 'RW', 'Rwanda'),
(235, 'KN', 'Saint Kitts and Nevis'),
(236, 'LC', 'Saint Lucia'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'WS', 'Samoa'),
(239, 'SM', 'San Marino'),
(240, 'ST', 'Sao Tome and Principe'),
(241, 'SA', 'Saudi Arabia'),
(242, 'SN', 'Senegal'),
(243, 'RS', 'Serbia'),
(244, 'SC', 'Seychelles'),
(245, 'SL', 'Sierra Leone'),
(246, 'SG', 'Singapore'),
(247, 'SK', 'Slovakia'),
(248, 'SI', 'Slovenia'),
(249, 'SB', 'Solomon Islands'),
(250, 'SO', 'Somalia'),
(251, 'ZA', 'South Africa'),
(252, 'GS', 'South Georgia South Sandwich Islands'),
(253, 'SS', 'South Sudan'),
(254, 'ES', 'Spain'),
(255, 'LK', 'Sri Lanka'),
(256, 'SH', 'St. Helena'),
(257, 'PM', 'St. Pierre and Miquelon'),
(258, 'SD', 'Sudan'),
(259, 'SR', 'Suriname'),
(260, 'SJ', 'Svalbard and Jan Mayen Islands'),
(261, 'SZ', 'Swaziland'),
(262, 'SE', 'Sweden'),
(263, 'CH', 'Switzerland'),
(264, 'SY', 'Syrian Arab Republic'),
(265, 'TW', 'Taiwan'),
(266, 'TJ', 'Tajikistan'),
(267, 'TZ', 'Tanzania, United Republic of'),
(268, 'TH', 'Thailand'),
(269, 'TG', 'Togo'),
(270, 'TK', 'Tokelau'),
(271, 'TO', 'Tonga'),
(272, 'TT', 'Trinidad and Tobago'),
(273, 'TN', 'Tunisia'),
(274, 'TR', 'Turkey'),
(275, 'TM', 'Turkmenistan'),
(276, 'TC', 'Turks and Caicos Islands'),
(277, 'TV', 'Tuvalu'),
(278, 'UG', 'Uganda'),
(279, 'UA', 'Ukraine'),
(280, 'AE', 'United Arab Emirates'),
(281, 'GB', 'United Kingdom'),
(282, 'US', 'United States'),
(283, 'UM', 'United States minor outlying islands'),
(284, 'UY', 'Uruguay'),
(285, 'UZ', 'Uzbekistan'),
(286, 'VU', 'Vanuatu'),
(287, 'VA', 'Vatican City State'),
(288, 'VE', 'Venezuela'),
(289, 'VN', 'Vietnam'),
(290, 'VG', 'Virgin Islands (British)'),
(291, 'VI', 'Virgin Islands (U.S.)'),
(292, 'WF', 'Wallis and Futuna Islands'),
(293, 'EH', 'Western Sahara'),
(294, 'YE', 'Yemen'),
(295, 'ZM', 'Zambia'),
(296, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `nik`, `pesan`) VALUES
(1, '3511182612000001', 'Permintaan surat anda sudah diterima.');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'BELUM / TIDAK BEKERJA'),
(2, 'MENGURUS RUMAH TANGGA'),
(3, 'PELAJAR / MAHASISWA'),
(4, 'PENSIUNAN'),
(5, 'PEGAWAI NEGERI SIPIL');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'TAMAT SD / SEDERAJAT'),
(2, 'TIDAK / BELUM SEKOLAH'),
(3, 'SLTA / SEDERAJAT'),
(4, 'SLTP / SEDERAJAT'),
(5, 'BELUM TAMAT SD / SEDERAJAT'),
(6, 'DIPLOMA IV / STRATA I'),
(7, 'DIPLOMA I / II'),
(8, 'AKADEMI / DIPLOMA III / S.MUDA'),
(9, 'STRATA II'),
(10, 'STRATA III');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Budha','Hindu','Konghuchu') NOT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text DEFAULT NULL,
  `gol_darah` enum('A','AB','O','-') NOT NULL DEFAULT '-',
  `id_negara` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `status_pernikahan` enum('BELUM KAWIN','KAWIN','CERAI HIDUP','CERAI MATI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `agama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `gol_darah`, `id_negara`, `id_pendidikan`, `id_pekerjaan`, `status_pernikahan`) VALUES
('3511182612000001', 'Muhammad Khalil Zhillullah', 'Islam', 'Muhammad Khalil Zhillullah', '2022-04-13', 'Laki-laki', 'Bondowoso', 'O', 152, 6, 3, 'BELUM KAWIN'),
('3511182612000002', 'Amelia Kamila', 'Islam', 'Bondowoso', '2006-09-16', 'Perempuan', NULL, 'O', 152, 3, 3, 'BELUM KAWIN'),
('3511182612000004', 'Rifjan Jundilla', 'Islam', 'Bondowoso', '2022-04-13', 'Laki-laki', 'Probolinggo', 'AB', 152, 8, 3, 'BELUM KAWIN');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_surat`
--

CREATE TABLE `permintaan_surat` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `status` enum('pending','diproses','ditolak','selesai') NOT NULL DEFAULT 'pending',
  `nik` varchar(16) DEFAULT NULL,
  `form_data` longtext NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `acc_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan_surat`
--

INSERT INTO `permintaan_surat` (`id`, `no_urut`, `id_jenis_surat`, `status`, `nik`, `form_data`, `id_admin`, `created_at`, `updated_at`, `acc_at`) VALUES
(1, 1, 14, 'diproses', '3511182612000001', '{\"jenis_surat\":\"Surat Keterangan Cacatan Kepolisian\",\"id_jenis_surat\":\"14\"}', 8, '2022-06-10 09:02:01', '2022-06-30 09:02:01', '2022-06-30 09:41:01'),
(2, 2, 14, 'selesai', '3511182612000001', '{\"jenis_surat\":\"Surat Keterangan Cacatan Kepolisian\",\"id_jenis_surat\":\"14\"}', 5, '2022-06-10 09:02:38', '2022-06-10 09:02:38', NULL),
(3, 3, 2, 'pending', '3511182612000001', '{\"jenis_surat\":\"Surat Keterangan Pindah\",\"id_jenis_surat\":\"2\",\"no_kk\":\"1234567891234567\",\"nik_kepala_keluarga\":\"1234567891234569\",\"nama_kepala_keluarga\":\"Subandi\",\"alamat\":\"Probolinggo\",\"rt\":\"1\",\"rw\":\"2\",\"kelurahan\":\"Sukosari\",\"kecamatan\":\"Tamanan\",\"kab\":\"Bondowoso\",\"prov\":\"Jawa Timur\",\"tgl_pindah\":\"2022-06-15\",\"alasan\":\"\",\"alasan_lainnya\":\"Bosen sama tetangga\",\"klasifikasi\":\"\",\"jenis\":\"2\",\"alamat_tujuan_pindah\":\"\",\"rt_tujuan\":\"2\",\"rw_tujuan\":\"\",\"kelurahan_tujuan\":\"Curahdami\",\"kecamatan_tujuan\":\"Tangsel Wetan\",\"kab_tujuan\":\"Jember\",\"prov_tujuan\":\"Jawa Tengah\",\"tgl_kedatangan\":\"2022-06-24\",\"tidak_pindah\":\"1\",\"pindah\":\"1\",\"rencana_tgl_pindah\":\"2022-06-24\",\"nik_keluarga\":[\"2\"],\"nama_keluarga\":[\"Bambang\"],\"shdk\":[\"Test\"]}', 5, '2022-06-10 09:07:11', '2022-06-29 14:23:11', NULL),
(4, 4, 4, 'diproses', '3511182612000002', '{\"jenis_surat\":\"Surat Tidak Mampu\",\"id_jenis_surat\":\"4\",\"tujuan\":\"Pesyaratan Beasiswa Kabupaten Bondowoso\",\"nama\":\"Bapak Joko\",\"nik\":\"3511182612000001\",\"tempat_lahir\":\"Bondowoso\",\"tanggal_lahir\":\"2022-06-30\",\"nama_instansi\":\"Pemerintah Kabupaten\"}', 5, '2022-06-10 09:10:10', '2022-06-30 09:10:10', NULL),
(5, 4, 6, 'diproses', '3511182612000001', '{\"jenis_surat\":\"Surat Usaha\",\"id_jenis_surat\":\"6\",\"bidang_usaha\":\"Teknologi\"}', 8, '2022-06-26 01:51:10', '2022-06-30 01:51:10', NULL),
(6, 3, 6, 'pending', '3511182612000001', '{\"jenis_surat\":\"Surat Usaha\",\"id_jenis_surat\":\"6\",\"bidang_usaha\":\"Jahit-menjahit\"}', NULL, '2022-06-27 08:22:55', '2022-06-27 08:22:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `syarat_surat`
--

CREATE TABLE `syarat_surat` (
  `id` int(11) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `syarat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `berita_id_admin` (`id_admin`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `penduduk_id_pendidikan_foreign` (`id_pendidikan`),
  ADD KEY `penduduk_id_penduduk_foreign` (`id_pekerjaan`),
  ADD KEY `id_negara` (`id_negara`);

--
-- Indexes for table `permintaan_surat`
--
ALTER TABLE `permintaan_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permintaan_surat_id_admin` (`id_admin`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- Indexes for table `syarat_surat`
--
ALTER TABLE `syarat_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permintaan_surat`
--
ALTER TABLE `permintaan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `syarat_surat`
--
ALTER TABLE `syarat_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_nik` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_id_negara_foreign` FOREIGN KEY (`id_negara`) REFERENCES `negara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penduduk_id_pendidikan_foreign` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penduduk_id_penduduk_foreign` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permintaan_surat`
--
ALTER TABLE `permintaan_surat`
  ADD CONSTRAINT `permintaan_surat_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_surat_id_jenis_surat` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `syarat_surat`
--
ALTER TABLE `syarat_surat`
  ADD CONSTRAINT `jenis_surat_id_jenis_surat_foreign` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
