-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2017 a las 00:05:32
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solomusica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Viento', NULL, NULL),
(2, 'Cuerda', NULL, NULL),
(3, 'Percucion', NULL, NULL),
(4, 'accesorios', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `images_route` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `images_route`, `publication_id`, `created_at`, `updated_at`) VALUES
(1, '21_3910395977_800.jpg', 1, '2017-11-09 15:21:40', '2017-11-09 15:21:40'),
(2, '21_40GX-7.jpg', 1, '2017-11-09 15:21:40', '2017-11-09 15:21:40'),
(3, '21_40rx7.jpg', 1, '2017-11-09 15:21:40', '2017-11-09 15:21:40'),
(4, '21_40YamahaCFIIIS.jpg', 1, '2017-11-09 15:21:40', '2017-11-09 15:21:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_05_04_023528_regions_table', 1),
(2, '2013_05_04_023600_sectors_table', 1),
(3, '2013_06_04_210332_users_profile_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_05_01_214459_categories_table', 1),
(7, '2017_05_01_214622_publications_table', 1),
(8, '2017_05_01_214645_comments_table', 1),
(9, '2017_05_01_214706_images_table', 1),
(10, '2017_05_01_214752_favorites_table', 1),
(11, '2017_11_05_005345_payments_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `through` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publications`
--

CREATE TABLE `publications` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `cantView` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sector_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `publications`
--

INSERT INTO `publications` (`id`, `name`, `quantity`, `price`, `type`, `state`, `cantView`, `start_date`, `end_date`, `description`, `user_id`, `category_id`, `sector_id`, `created_at`, `updated_at`) VALUES
(1, 'piano yamaha', 1, 6000000, 'gratis', 'activo', 0, '2017-11-09', '2017-12-09', 'el mejor piano de los ultimos 100 milenios', 2, 2, 76, '2017-11-09 15:21:39', '2017-11-09 15:21:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tarapacá¡ (I)', NULL, NULL),
(2, 'Antofagasta (II)', NULL, NULL),
(3, 'Atacama (III)', NULL, NULL),
(4, 'Coquimbo (IV)', NULL, NULL),
(5, 'Valparaiso (V)', NULL, NULL),
(6, 'Libertador General Bernardo O\'Higgins (VI)', NULL, NULL),
(7, 'Maule (VII)', NULL, NULL),
(8, 'Biobio (VIII)', NULL, NULL),
(9, 'La Araucaní­a (IX)', NULL, NULL),
(10, 'Los Lagos (X)', NULL, NULL),
(11, 'Aysén del General Carlos Ibañez del Campo (XI)', NULL, NULL),
(12, 'Magallanes y de la Antartica Chilena (XII)', NULL, NULL),
(13, 'Metropolitana de Santiago (RM)', NULL, NULL),
(14, 'Los Ri­os (XIV)', NULL, NULL),
(15, 'Arica y Parinacota (XV)', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectors`
--

CREATE TABLE `sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'ARICA', 15, NULL, NULL),
(2, 'IQUIQUE', 1, NULL, NULL),
(3, 'HUARA', 1, NULL, NULL),
(4, 'PICA', 1, NULL, NULL),
(5, 'POZO ALMONTE', 1, NULL, NULL),
(6, 'TOCOPILLA', 2, NULL, NULL),
(7, 'ANTOFAGASTA', 2, NULL, NULL),
(8, 'MEJILLONES', 2, NULL, NULL),
(9, 'TALTAL', 2, NULL, NULL),
(10, 'CALAMA', 2, NULL, NULL),
(11, 'CHAÑARAL', 3, NULL, NULL),
(12, 'DIEGO DE ALMAGRO', 3, NULL, NULL),
(13, 'COPIAPO', 3, NULL, NULL),
(14, 'CALDERA', 3, NULL, NULL),
(15, 'TIERRA AMARILLA', 3, NULL, NULL),
(16, 'VALLENAR', 3, NULL, NULL),
(17, 'FREIRINA', 3, NULL, NULL),
(18, 'HUASCO', 3, NULL, NULL),
(19, 'LA SERENA', 4, NULL, NULL),
(20, 'LA HIGUERA', 4, NULL, NULL),
(21, 'COQUIMBO', 4, NULL, NULL),
(22, 'ANDACOLLO', 4, NULL, NULL),
(23, 'VICUÃ‘A', 4, NULL, NULL),
(24, 'PAIHUANO', 4, NULL, NULL),
(25, 'OVALLE', 4, NULL, NULL),
(26, 'MONTE PATRIA', 4, NULL, NULL),
(27, 'PUNITAQUI', 4, NULL, NULL),
(28, 'RIO HURTADO', 4, NULL, NULL),
(29, 'COMBARBALA', 4, NULL, NULL),
(30, 'ILLAPEL', 4, NULL, NULL),
(31, 'CANELA', 4, NULL, NULL),
(32, 'SALAMANCA', 4, NULL, NULL),
(33, 'LOS VILOS', 4, NULL, NULL),
(34, 'VALPARAISO', 5, NULL, NULL),
(35, 'QUINTERO', 5, NULL, NULL),
(36, 'PUCHUNCAVI', 5, NULL, NULL),
(37, 'VIÑA DEL MAR', 5, NULL, NULL),
(38, 'QUILPUE', 5, NULL, NULL),
(39, 'VILLA ALEMANA', 5, NULL, NULL),
(40, 'CASABLANCA', 5, NULL, NULL),
(41, 'ISLA DE PASCUA', 5, NULL, NULL),
(42, 'SAN ANTONIO', 5, NULL, NULL),
(43, 'SANTO DOMINGO', 5, NULL, NULL),
(44, 'ALGARROBO', 5, NULL, NULL),
(46, 'CARTAGENA', 5, NULL, NULL),
(47, 'EL TABO', 5, NULL, NULL),
(48, 'QUILLOTA', 5, NULL, NULL),
(49, 'LA CRUZ', 5, NULL, NULL),
(50, 'LA CALERA', 5, NULL, NULL),
(51, 'HIJUELAS', 5, NULL, NULL),
(52, 'NOGALES', 5, NULL, NULL),
(53, 'LIMACHE', 5, NULL, NULL),
(54, 'OLMUE', 5, NULL, NULL),
(55, 'PETORCA', 5, NULL, NULL),
(56, 'CABILDO', 5, NULL, NULL),
(57, 'PAPUDO', 5, NULL, NULL),
(58, 'ZAPALLAR', 5, NULL, NULL),
(59, 'LA LIGUA', 5, NULL, NULL),
(60, 'SAN FELIPE', 5, NULL, NULL),
(61, 'PUTAENDO', 5, NULL, NULL),
(62, 'PANQUEHUE', 5, NULL, NULL),
(63, 'CATEMU', 5, NULL, NULL),
(64, 'SANTA MARIA', 5, NULL, NULL),
(65, 'LLAY LLAY', 5, NULL, NULL),
(66, 'LOS ANDES', 5, NULL, NULL),
(67, 'CALLE LARGA', 5, NULL, NULL),
(68, 'RINCONADA', 5, NULL, NULL),
(69, 'SAN ESTEBAN', 5, NULL, NULL),
(70, 'SANTIAGO CENTRO', 13, NULL, NULL),
(71, 'LAS CONDES', 13, NULL, NULL),
(72, 'PROVIDENCIA', 13, NULL, NULL),
(73, 'SANTIAGO OESTE', 13, NULL, NULL),
(75, 'CONCHALI', 13, NULL, NULL),
(76, 'COLINA', 13, NULL, NULL),
(77, 'RENCA', 13, NULL, NULL),
(78, 'LAMPA', 13, NULL, NULL),
(79, 'QUILICURA', 13, NULL, NULL),
(80, 'TIL-TIL', 13, NULL, NULL),
(81, 'QUINTA NORMAL', 13, NULL, NULL),
(82, 'PUDAHUEL', 13, NULL, NULL),
(83, 'CURACAVI', 13, NULL, NULL),
(84, 'SANTIAGO SUR', 13, NULL, NULL),
(85, 'PEÃ‘AFLOR', 13, NULL, NULL),
(86, 'TALAGANTE', 13, NULL, NULL),
(87, 'ISLA DE MAIPO', 13, NULL, NULL),
(88, 'MELIPILLA', 13, NULL, NULL),
(89, 'EL MONTE', 13, NULL, NULL),
(90, 'MARIA PINTO', 13, NULL, NULL),
(91, 'ÑUÑOA', 13, NULL, NULL),
(92, 'LA REINA', 13, NULL, NULL),
(93, 'LA FLORIDA', 13, NULL, NULL),
(94, 'MAIPU', 13, NULL, NULL),
(95, 'SAN MIGUEL', 13, NULL, NULL),
(96, 'LA CISTERNA', 13, NULL, NULL),
(97, 'LA GRANJA', 13, NULL, NULL),
(98, 'SAN BERNARDO', 13, NULL, NULL),
(99, 'CALERA DE TANGO', 13, NULL, NULL),
(100, 'PUENTE ALTO', 13, NULL, NULL),
(101, 'PIRQUE', 13, NULL, NULL),
(104, 'PAINE', 13, NULL, NULL),
(105, 'RANCAGUA', 6, NULL, NULL),
(106, 'MACHALI', 6, NULL, NULL),
(107, 'GRANEROS', 6, NULL, NULL),
(108, 'SAN PEDRO', 13, NULL, NULL),
(109, 'ALHUE', 13, NULL, NULL),
(110, 'CODEGUA', 6, NULL, NULL),
(111, 'SAN FRANCISCO DE MOSTAZAL', 6, NULL, NULL),
(113, 'COLTAUCO', 6, NULL, NULL),
(114, 'COINCO', 6, NULL, NULL),
(115, 'PEUMO', 6, NULL, NULL),
(116, 'LAS CABRAS', 6, NULL, NULL),
(117, 'SAN VICENTE', 6, NULL, NULL),
(118, 'PICHIDEGUA', 6, NULL, NULL),
(119, 'REQUINOA', 6, NULL, NULL),
(121, 'RENGO', 6, NULL, NULL),
(122, 'MALLOA', 6, NULL, NULL),
(123, 'QUINTA DE TILCOCO', 6, NULL, NULL),
(124, 'SAN FERNANDO', 6, NULL, NULL),
(125, 'CHIMBARONGO', 6, NULL, NULL),
(126, 'NANCAGUA', 6, NULL, NULL),
(127, 'PLACILLA', 6, NULL, NULL),
(128, 'SANTA CRUZ', 6, NULL, NULL),
(129, 'LOLOL', 6, NULL, NULL),
(130, 'PALMILLA', 6, NULL, NULL),
(131, 'PERALILLO', 6, NULL, NULL),
(132, 'CHEPICA', 6, NULL, NULL),
(133, 'PAREDONES', 6, NULL, NULL),
(134, 'MARCHIGUE', 6, NULL, NULL),
(135, 'PUMANQUE', 6, NULL, NULL),
(136, 'LITUECHE', 6, NULL, NULL),
(137, 'PICHILEMU', 6, NULL, NULL),
(138, 'NAVIDAD', 6, NULL, NULL),
(139, 'LA ESTRELLA', 6, NULL, NULL),
(140, 'CURICO', 7, NULL, NULL),
(141, 'ROMERAL', 7, NULL, NULL),
(142, 'TENO', 7, NULL, NULL),
(143, 'RAUCO', 7, NULL, NULL),
(145, 'LICANTEN', 7, NULL, NULL),
(146, 'VICHUQUEN', 7, NULL, NULL),
(147, 'MOLINA', 7, NULL, NULL),
(148, 'SAGRADA FAMILIA', 7, NULL, NULL),
(149, 'RIO CLARO', 7, NULL, NULL),
(150, 'TALCA', 7, NULL, NULL),
(151, 'SAN CLEMENTE', 7, NULL, NULL),
(152, 'PELARCO', 7, NULL, NULL),
(153, 'PENCAHUE', 7, NULL, NULL),
(154, 'MAULE', 7, NULL, NULL),
(155, 'CUREPTO', 7, NULL, NULL),
(156, 'SAN JAVIER', 7, NULL, NULL),
(157, 'CONSTITUCION', 7, NULL, NULL),
(158, 'EMPEDRADO', 7, NULL, NULL),
(159, 'LINARES', 7, NULL, NULL),
(161, 'COLBUN', 7, NULL, NULL),
(162, 'LONGAVI', 7, NULL, NULL),
(163, 'VILLA ALEGRE', 7, NULL, NULL),
(164, 'PARRAL', 7, NULL, NULL),
(165, 'RETIRO', 7, NULL, NULL),
(166, 'CAUQUENES', 7, NULL, NULL),
(167, 'CHANCO', 7, NULL, NULL),
(168, 'CHILLAN', 8, NULL, NULL),
(169, 'PINTO', 8, NULL, NULL),
(170, 'COIHUECO', 8, NULL, NULL),
(171, 'PORTEZUELO', 8, NULL, NULL),
(172, 'QUIRIHUE', 8, NULL, NULL),
(173, 'TREHUACO', 8, NULL, NULL),
(174, 'NINHUE', 8, NULL, NULL),
(175, 'COBQUECURA', 8, NULL, NULL),
(176, 'SAN CARLOS', 8, NULL, NULL),
(177, 'SAN GREGORIO DE Ãƒâ€˜IQUEN', 8, NULL, NULL),
(178, 'SAN FABIAN', 8, NULL, NULL),
(179, 'SAN NICOLAS', 8, NULL, NULL),
(180, 'BULNES', 8, NULL, NULL),
(181, 'SAN IGNACIO', 8, NULL, NULL),
(182, 'QUILLON', 8, NULL, NULL),
(183, 'YUNGAY', 8, NULL, NULL),
(184, 'PEMUCO', 8, NULL, NULL),
(185, 'EL CARMEN', 8, NULL, NULL),
(186, 'COELEMU', 8, NULL, NULL),
(187, 'RANQUIL', 8, NULL, NULL),
(188, 'CONCEPCION', 8, NULL, NULL),
(190, 'TOME', 8, NULL, NULL),
(191, 'PENCO', 8, NULL, NULL),
(192, 'HUALQUI', 8, NULL, NULL),
(193, 'FLORIDA', 8, NULL, NULL),
(194, 'CORONEL', 8, NULL, NULL),
(195, 'LOTA', 8, NULL, NULL),
(196, 'SANTA JUANA', 8, NULL, NULL),
(197, 'CURANILAHUE', 8, NULL, NULL),
(198, 'ARAUCO', 8, NULL, NULL),
(199, 'LEBU', 8, NULL, NULL),
(200, 'LOS ALAMOS', 8, NULL, NULL),
(201, 'CAÑETE', 8, NULL, NULL),
(202, 'CONTULMO', 8, NULL, NULL),
(203, 'TIRUA', 8, NULL, NULL),
(204, 'LOS ANGELES', 8, NULL, NULL),
(205, 'SANTA BARBARA', 8, NULL, NULL),
(206, 'QUILLECO', 8, NULL, NULL),
(207, 'YUMBEL', 8, NULL, NULL),
(208, 'CABRERO', 8, NULL, NULL),
(209, 'TUCAPEL', 8, NULL, NULL),
(210, 'LAJA', 8, NULL, NULL),
(211, 'SAN ROSENDO', 8, NULL, NULL),
(212, 'NACIMIENTO', 8, NULL, NULL),
(213, 'NEGRETE', 8, NULL, NULL),
(214, 'MULCHEN', 8, NULL, NULL),
(215, 'QUILACO', 8, NULL, NULL),
(216, 'ANGOL', 9, NULL, NULL),
(217, 'PUREN', 9, NULL, NULL),
(218, 'LOS SAUCES', 9, NULL, NULL),
(219, 'RENAICO', 9, NULL, NULL),
(220, 'COLLIPULLI', 9, NULL, NULL),
(221, 'ERCILLA', 9, NULL, NULL),
(222, 'TRAIGUEN', 9, NULL, NULL),
(223, 'LUMACO', 9, NULL, NULL),
(224, 'VICTORIA', 9, NULL, NULL),
(225, 'CURACAUTIN', 9, NULL, NULL),
(226, 'LONQUIMAY', 9, NULL, NULL),
(227, 'TEMUCO', 9, NULL, NULL),
(228, 'VILCUN', 9, NULL, NULL),
(229, 'FREIRE', 9, NULL, NULL),
(230, 'CUNCO', 9, NULL, NULL),
(231, 'LAUTARO', 9, NULL, NULL),
(232, 'GALVARINO', 9, NULL, NULL),
(233, 'PERQUENCO', 9, NULL, NULL),
(234, 'NUEVA IMPERIAL', 9, NULL, NULL),
(235, 'CARAHUE', 9, NULL, NULL),
(236, 'PUERTO SAAVEDRA', 9, NULL, NULL),
(237, 'PITRUFQUEN', 9, NULL, NULL),
(238, 'GORBEA', 9, NULL, NULL),
(239, 'TOLTEN', 9, NULL, NULL),
(240, 'LONCOCHE', 9, NULL, NULL),
(241, 'VILLARRICA', 9, NULL, NULL),
(242, 'PUCON', 9, NULL, NULL),
(243, 'VALDIVIA', 14, NULL, NULL),
(244, 'CORRAL', 14, NULL, NULL),
(245, 'MARIQUINA', 14, NULL, NULL),
(246, 'MAFIL', 14, NULL, NULL),
(247, 'LOS LAGOS', 14, NULL, NULL),
(248, 'FUTRONO', 14, NULL, NULL),
(249, 'LANCO', 14, NULL, NULL),
(250, 'PANGUIPULLI', 14, NULL, NULL),
(251, 'LA UNION', 14, NULL, NULL),
(252, 'PAILLACO', 14, NULL, NULL),
(253, 'RIO BUENO', 14, NULL, NULL),
(254, 'LAGO RANCO', 14, NULL, NULL),
(255, 'OSORNO', 10, NULL, NULL),
(256, 'PUYEHUE', 10, NULL, NULL),
(257, 'SAN PABLO', 10, NULL, NULL),
(258, 'PUERTO OCTAY', 10, NULL, NULL),
(259, 'RIO NEGRO', 10, NULL, NULL),
(260, 'PURRANQUE', 10, NULL, NULL),
(261, 'PUERTO MONTT', 10, NULL, NULL),
(262, 'COCHAMO', 10, NULL, NULL),
(263, 'MAULLIN', 10, NULL, NULL),
(264, 'LOS MUERMOS', 10, NULL, NULL),
(265, 'CALBUCO', 10, NULL, NULL),
(266, 'PUERTO VARAS', 10, NULL, NULL),
(267, 'LLANQUIHUE', 10, NULL, NULL),
(268, 'FRESIA', 10, NULL, NULL),
(270, 'CASTRO', 10, NULL, NULL),
(271, 'CHONCHI', 10, NULL, NULL),
(272, 'QUEILEN', 10, NULL, NULL),
(273, 'QUELLON', 10, NULL, NULL),
(274, 'PUQUELDON', 10, NULL, NULL),
(275, 'QUINCHAO', 10, NULL, NULL),
(276, 'CURACO DE VELEZ', 10, NULL, NULL),
(277, 'ANCUD', 10, NULL, NULL),
(278, 'QUEMCHI', 10, NULL, NULL),
(279, 'DALCAHUE', 10, NULL, NULL),
(280, 'CHAITEN', 10, NULL, NULL),
(281, 'FUTALEUFU', 10, NULL, NULL),
(282, 'PALENA', 10, NULL, NULL),
(284, 'COYHAIQUE', 11, NULL, NULL),
(285, 'AYSEN', 11, NULL, NULL),
(286, 'CISNES', 11, NULL, NULL),
(287, 'CHILE CHICO', 11, NULL, NULL),
(288, 'RIO IBAÑEZ', 11, NULL, NULL),
(289, 'COCHRANE', 11, NULL, NULL),
(290, 'PUNTA ARENAS', 12, NULL, NULL),
(291, 'PUERTO NATALES', 12, NULL, NULL),
(292, 'PORVENIR', 12, NULL, NULL),
(293, 'GENERAL LAGOS', 15, NULL, NULL),
(294, 'PUTRE', 15, NULL, NULL),
(295, 'CAMARONES', 15, NULL, NULL),
(296, 'CAMINA', 1, NULL, NULL),
(297, 'COLCHANE', 1, NULL, NULL),
(298, 'MARIA ELENA', 2, NULL, NULL),
(299, 'SIERRA GORDA', 2, NULL, NULL),
(301, 'SAN PEDRO DE ATACAMA', 2, NULL, NULL),
(302, 'ALTO DEL CARMEN', 3, NULL, NULL),
(303, 'ANTUCO', 8, NULL, NULL),
(304, 'MELIPEUCO', 9, NULL, NULL),
(305, 'CURARREHUE', 9, NULL, NULL),
(306, 'TEODORO SCHMIDT', 9, NULL, NULL),
(307, 'SAN JUAN DE LA COSTA', 10, NULL, NULL),
(308, 'HUALAIHUE', 10, NULL, NULL),
(309, 'GUAITECAS', 11, NULL, NULL),
(310, 'O\'HIGGINS', 11, NULL, NULL),
(311, 'TORTEL', 11, NULL, NULL),
(312, 'LAGO VERDE', 11, NULL, NULL),
(313, 'TORRES DEL PAINE', 12, NULL, NULL),
(314, 'RIO VERDE', 12, NULL, NULL),
(315, 'SAN GREGORIO', 12, NULL, NULL),
(316, 'LAGUNA BLANCA', 12, NULL, NULL),
(317, 'PRIMAVERA', 12, NULL, NULL),
(318, 'TIMAUKEL', 12, NULL, NULL),
(319, 'NAVARINO', 12, NULL, NULL),
(320, 'PELLUHUE', 7, NULL, NULL),
(321, 'JUAN FERNANDEZ', 5, NULL, NULL),
(322, 'PEÑALOLEN', 13, NULL, NULL),
(323, 'MACUL', 13, NULL, NULL),
(324, 'CERRO NAVIA', 13, NULL, NULL),
(325, 'LO PRADO', 13, NULL, NULL),
(326, 'SAN RAMON', 13, NULL, NULL),
(327, 'LA PINTANA', 13, NULL, NULL),
(328, 'ESTACION CENTRAL', 13, NULL, NULL),
(329, 'RECOLETA', 13, NULL, NULL),
(330, 'INDEPENDENCIA', 13, NULL, NULL),
(331, 'VITACURA', 13, NULL, NULL),
(332, 'LO BARNECHEA', 13, NULL, NULL),
(333, 'CERRILLOS', 13, NULL, NULL),
(334, 'HUECHURABA', 13, NULL, NULL),
(335, 'SAN JOAQUIN', 13, NULL, NULL),
(336, 'PEDRO AGUIRRE CERDA', 13, NULL, NULL),
(337, 'LO ESPEJO', 13, NULL, NULL),
(338, 'EL BOSQUE', 13, NULL, NULL),
(339, 'PADRE HURTADO', 13, NULL, NULL),
(340, 'CONCON', 5, NULL, NULL),
(341, 'SAN RAFAEL', 7, NULL, NULL),
(342, 'CHILLAN VIEJO', 8, NULL, NULL),
(343, 'SAN PEDRO DE LA PAZ', 8, NULL, NULL),
(344, 'CHIGUAYANTE', 8, NULL, NULL),
(345, 'PADRE LAS CASAS', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userprofile_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `phone`, `userprofile_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Benjamín Ignacio Salazar Castillo', '', 'benjamin.salazar17@gmail.com', '$2y$10$LNnhEFndn.4QZEHneUkSjOnoFuXsAi65J.nJ7zZQN3JwQ0Nzn6DWe', NULL, 1, 'YIF8WVzBTmsM8U0XrZQDrjxJrprmI8daOOFOGgWbiXY7n7IAE6lfBqRT6zjp', '2017-11-09 15:14:26', '2017-11-09 15:14:26'),
(4, 'benjaminsafef', 'salazar castilloefedgf', 'benjamiefefn.salazar17@gmail.com', '$2y$10$CFWuLpMm6etGX65TJBdsXeA4GSA.mrBL8aYhNK1X3fho4xwA5boVO', '6679151623', 1, NULL, '2017-11-09 18:01:46', '2017-11-09 18:01:46'),
(5, 'benjamin', 'hilkiy', 'iyliu', '$2y$10$K1YbMj1nDZmmnGZ2cNO.LOXX.1nQ15L3KRU6a1JN/Xn1eK4Oa/K8G', '9999', 1, NULL, '2017-11-09 18:03:41', '2017-11-09 18:03:41'),
(6, 'diego', 'cisterna', 'dgooo18@gmail.com', '$2y$10$jXAXFtJr7iOCweueSMeU5e9LLN4PZnho.HgDlDi1ygrLpVMe26qZi', '123456', 1, 'GHKx4fFqchq5mvPQUiwo5reDp5fUBF9GTlNdPDJoDQjJGpQoc9EE51hdwHzY', '2017-11-09 18:04:47', '2017-11-09 18:04:47'),
(7, 'pablo', 'pablo', 'pablo@', '$2y$10$AZPSQkWNmi0SbIisMBSoHeLScu8osqu6J3fZX001K4Gq0MLIMyWYq', '1234', 1, NULL, '2017-11-09 18:07:24', '2017-11-09 18:07:24'),
(9, 'benja', 'salazar castillo', 'ignacio.bisc@gmail.com', '$2y$10$Qj37P8IiR8434JoJH4Gs2ehuTSwCIwR4edDUgQoDMZCHWV9OZC/qu', '1234', 1, 'rO1II4bI3zGJIAr44PIy9VHEnZFxkHueQLO6isQxzGF7aISHvMb3JDDNkcmL', '2017-11-10 22:34:47', '2017-11-10 22:34:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_profile`
--

INSERT INTO `users_profile` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'personal', NULL, NULL),
(2, 'empresa', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_publication_id_foreign` (`publication_id`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_publication_id_foreign` (`publication_id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_publication_id_foreign` (`publication_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_publication_id_foreign` (`publication_id`);

--
-- Indices de la tabla `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publications_user_id_foreign` (`user_id`),
  ADD KEY `publications_category_id_foreign` (`category_id`),
  ADD KEY `publications_sector_id_foreign` (`sector_id`);

--
-- Indices de la tabla `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectors_region_id_foreign` (`region_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_userprofile_id_foreign` (`userprofile_id`);

--
-- Indices de la tabla `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publications_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `sectors_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_userprofile_id_foreign` FOREIGN KEY (`userprofile_id`) REFERENCES `users_profile` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
