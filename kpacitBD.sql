-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 12-10-2021 a las 23:36:32
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kpacit2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounting`
--

CREATE TABLE `accounting` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `webinar_id` int(10) UNSIGNED DEFAULT NULL,
  `meeting_time_id` int(10) UNSIGNED DEFAULT NULL,
  `subscribe_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `tax` tinyint(1) NOT NULL DEFAULT '0',
  `amount` decimal(13,2) DEFAULT NULL,
  `type` enum('addiction','deduction') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_account` enum('income','asset','subscribe','promotion') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_type` enum('automatic','manual') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'automatic',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `advertising_banners`
--

CREATE TABLE `advertising_banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('home1','home2','course','course_sidebar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL DEFAULT '12',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `advertising_banners`
--

INSERT INTO `advertising_banners` (`id`, `title`, `position`, `image`, `size`, `link`, `published`, `created_at`) VALUES
(2, 'Home - Join as instructor', 'home1', '/store/1/default_images/banners/become_instructor_banner.png', 12, '/login', 1, 1607885353),
(3, 'Certificate validation - Home', 'home2', '/store/1/default_images/banners/validate_certificates_banner.png', 6, '/certificate_validation', 1, 1607885656),
(4, 'Empresa- Home', 'home2', '/store/1/empresa.png', 6, '/pages/empresa', 1, 1607885681),
(6, 'Reserve a meeting - Course page', 'course_sidebar', '/store/1/default_images/banners/reserve_a_meeting.png', 12, '/instructors', 1, 1607886391),
(7, 'Certificate validation - Course page', 'course_sidebar', '/store/1/default_images/banners/validate_certificates_banner.png', 12, '/certificate_validation', 1, 1607886440);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `badges`
--

CREATE TABLE `badges` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('register_date','course_count','course_rate','sale_count','support_rate') COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `badges`
--

INSERT INTO `badges` (`id`, `title`, `description`, `image`, `type`, `condition`, `created_at`) VALUES
(21, 'Nuevo Usuario', 'Tiene 1 curso', '/store/1/default_images/badges/new_user.svg', 'register_date', '{\"from\":\"1\",\"to\":\"30\"}', 1625553769),
(22, 'Usuario Real', '6 meses de suscripción', '/store/1/default_images/badges/loyal_user.svg', 'register_date', '{\"from\":\"31\",\"to\":\"180\"}', 1625554171),
(23, 'Usuario fiel', '1 año de suscripcion', '/store/1/default_images/badges/faithful_user.svg', 'register_date', '{\"from\":\"181\",\"to\":\"365\"}', 1625554495),
(24, 'Vendedor Junior', 'Has 1 Class', '/store/1/default_images/badges/junior_vendor.svg', 'course_count', '{\"from\":\"1\",\"to\":\"1\"}', 1625554772),
(25, 'Vendedor Senior', 'Tiene 2 cursos', '/store/1/default_images/badges/senior_vendor.svg', 'course_count', '{\"from\":\"2\",\"to\":\"2\"}', 1625554960),
(26, 'Vendedor Experto', 'Tiene de 3 a 6 cursos', '/store/1/default_images/badges/expert_vendor.svg', 'course_count', '{\"from\":\"3\",\"to\":\"6\"}', 1625555421),
(27, 'Bronze Classes', 'Classes Rating from 2 to 3', '/store/1/default_images/badges/bronze_classes.svg', 'course_rate', '{\"from\":\"2\",\"to\":\"3\"}', 1625556048),
(28, 'Silver Classes', 'Classes Rating from 3 to 4', '/store/1/default_images/badges/silver_classes.svg', 'course_rate', '{\"from\":\"3\",\"to\":\"4\"}', 1625556159),
(29, 'Golden Classes', 'Classes Rating from 4 to 5', '/store/1/default_images/badges/golden_classes.svg', 'course_rate', '{\"from\":\"4\",\"to\":\"5\"}', 1625556284),
(30, 'Best Seller', 'Classes Sales from 1 to 2', '/store/1/default_images/badges/best_seller.svg', 'sale_count', '{\"from\":\"1\",\"to\":\"2\"}', 1625557021),
(31, 'Top Seller', 'Classes Sales from 3 to 9', '/store/1/default_images/badges/top_seller.svg', 'sale_count', '{\"from\":\"3\",\"to\":\"9\"}', 1625557247),
(32, 'King Seller', 'Classes Sales from 10 to 20', '/store/1/default_images/badges/king_seller.svg', 'sale_count', '{\"from\":\"10\",\"to\":\"20\"}', 1625558061),
(33, 'Buen Soporte', 'Support Rating from 2 to 3', '/store/1/default_images/badges/good_support.svg', 'support_rate', '{\"from\":\"2\",\"to\":\"3\"}', 1625558473),
(34, 'Amazing Support', 'Support Rating from 3 to 4', '/store/1/default_images/badges/amazing_support.svg', 'support_rate', '{\"from\":\"3\",\"to\":\"4\"}', 1625558682),
(35, 'Fantastic Support', 'Support Rating from 4 to 5', '/store/1/default_images/badges/fantastic_support.svg', 'support_rate', '{\"from\":\"4\",\"to\":\"5\"}', 1625558892);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `become_instructors`
--

CREATE TABLE `become_instructors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','accept','reject') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_count` int(10) UNSIGNED DEFAULT '0',
  `enable_comment` tinyint(1) NOT NULL DEFAULT '1',
  `status` enum('pending','publish') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `slug`) VALUES
(33, 'Announcements', 'Vel-consequatur'),
(34, 'Articles', 'Facilis-ea'),
(36, 'Events', 'Fugit-dignissimos-possimus'),
(37, 'News', 'new');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED DEFAULT NULL,
  `reserve_meeting_id` int(10) UNSIGNED DEFAULT NULL,
  `subscribe_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL,
  `ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `special_offer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificates`
--

CREATE TABLE `certificates` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `quiz_result_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `user_grade` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificates_templates`
--

CREATE TABLE `certificates_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_x` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_y` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_size` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','publish') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `certificates_templates`
--

INSERT INTO `certificates_templates` (`id`, `title`, `body`, `image`, `position_x`, `position_y`, `font_size`, `text_color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Certificado Kpacit', 'Certifica que: [student] \r\nSupero el  [course] con\r\nun [grade]%, exitosamente\r\nID Kpacit : [certificate_id]', '/store/1/default_images/certificate.jpg', '320', '400', '32', '#314963', 'publish', 1608663541, 1629652269);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `review_id` int(10) UNSIGNED DEFAULT NULL,
  `webinar_id` int(10) UNSIGNED DEFAULT NULL,
  `blog_id` int(10) UNSIGNED DEFAULT NULL,
  `reply_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `viewed_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_reports`
--

CREATE TABLE `comments_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED DEFAULT NULL,
  `webinar_id` int(10) UNSIGNED DEFAULT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','replied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_learning`
--

CREATE TABLE `course_learning` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `text_lesson_id` int(10) UNSIGNED DEFAULT NULL,
  `file_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(10) UNSIGNED DEFAULT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `type` enum('all_users','special_users') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `expired_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `discounts`
--

INSERT INTO `discounts` (`id`, `creator_id`, `title`, `code`, `percent`, `amount`, `count`, `type`, `status`, `expired_at`, `created_at`) VALUES
(7, 1, 'Black Friday', 'BLK2021', 20, 10, 20, 'all_users', 'active', 1639427340, 1626132792);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discount_users`
--

CREATE TABLE `discount_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `discount_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feature_webinars`
--

CREATE TABLE `feature_webinars` (
  `id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `page` enum('categories','home','home_categories') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('publish','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessibility` enum('free','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `downloadable` tinyint(1) DEFAULT '0',
  `storage` enum('local','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filters`
--

CREATE TABLE `filters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filter_options`
--

CREATE TABLE `filter_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_id` int(10) UNSIGNED NOT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `follows`
--

CREATE TABLE `follows` (
  `id` int(10) UNSIGNED NOT NULL,
  `follower` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('requested','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `group_users`
--

CREATE TABLE `group_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meetings`
--

CREATE TABLE `meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meeting_times`
--

CREATE TABLE `meeting_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `meeting_id` int(10) UNSIGNED NOT NULL,
  `day_label` enum('saturday','sunday','monday','tuesday','wednesday','thursday','friday') COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_09_145553_create_roles_table', 1),
(4, '2020_08_09_145834_create_sections_table', 1),
(5, '2020_08_09_145926_create_permissions_table', 1),
(6, '2020_08_24_163003_create_webinars_table', 1),
(7, '2020_08_24_164823_create_webinar_partner_teacher_table', 1),
(8, '2020_08_24_165658_create_tags_table', 1),
(9, '2020_08_24_165835_create_webinar_tag_table', 1),
(10, '2020_08_24_171611_create_categories_table', 1),
(11, '2020_08_29_052437_create_filters_table', 1),
(12, '2020_08_29_052900_create_filter_options_table', 1),
(13, '2020_08_29_054455_add_category_id_in_webinar_table', 1),
(14, '2020_09_01_174741_add_seo_description_and_start_end_time_in_webinar_table', 1),
(15, '2020_09_02_180508_create_webinar_filter_option_table', 1),
(16, '2020_09_02_193923_create_tickets_table', 1),
(17, '2020_09_02_210447_create_sessions_table', 1),
(18, '2020_09_02_212642_create_files_table', 1),
(19, '2020_09_03_175543_create_faqs_table', 1),
(20, '2020_09_08_175539_delete_webinar_tag_and_update_tag_table', 1),
(21, '2020_09_09_154522_create_quizzes_table', 1),
(22, '2020_09_09_174646_create_quizzes_questions_table', 1),
(23, '2020_09_09_182726_create_quizzes_questions_answers_table', 1),
(24, '2020_09_14_160028_create_prerequisites_table', 1),
(25, '2020_09_14_183235_nullable_item_id_in_quizzes_table', 1),
(26, '2020_09_14_190110_create_webinar_quizzes_table', 1),
(27, '2020_09_16_163835_create_quizzes_results_table', 1),
(28, '2020_09_24_102115_add_total_mark_in_quize_table', 1),
(29, '2020_09_24_132242_create_comment_table', 1),
(30, '2020_09_24_132639_create_favorites_table', 1),
(31, '2020_09_26_181200_create_certificate_table', 1),
(32, '2020_09_26_181444_create_certificates_templates_table', 1),
(33, '2020_09_30_170451_add_slug_in_webinars_table', 1),
(34, '2020_09_30_191202_create_purchases_table', 1),
(35, '2020_10_02_063828_create_rating_table', 1),
(36, '2020_10_02_094723_edit_table_and_add_foreign_key', 1),
(37, '2020_10_08_055408_add_reviwes_table', 1),
(38, '2020_10_08_084100_edit_status_comments_table', 1),
(39, '2020_10_08_121041_create_meetings_table', 2),
(40, '2020_10_08_121621_create_meeting_times_table', 2),
(41, '2020_10_08_121848_create_meeting_requests_table', 2),
(42, '2020_10_15_172913_add_about_and_head_line_in_users_table', 2),
(43, '2020_10_15_173645_create_follow_table', 2),
(46, '2020_10_17_100606_create_badges_table', 3),
(47, '2020_10_08_121848_create_reserve_meetings_table', 4),
(48, '2020_10_20_193013_update_users_table', 5),
(49, '2020_10_20_211927_create_users_metas_table', 6),
(50, '2020_10_18_220323_convert_creatore_user_id_to_creator_id', 7),
(51, '2020_10_22_153502_create_cart_table', 7),
(52, '2020_10_22_154636_create_orders_table', 7),
(53, '2020_10_22_155930_create_order_items_table', 7),
(54, '2020_10_23_204203_create_sales_table', 7),
(55, '2020_10_23_211459_create_accounting_table', 7),
(56, '2020_10_23_213515_create_discounts_table', 7),
(57, '2020_10_23_213934_create_discount_users_table', 7),
(58, '2020_10_23_235444_create_ticket_users_table', 7),
(59, '2020_10_25_172331_create_groups_table', 7),
(60, '2020_10_25_172523_create_group_users_table', 7),
(62, '2020_11_02_202754_edit_email_in_users_table', 8),
(63, '2020_11_03_200314_edit_some_tables', 9),
(64, '2020_11_06_193300_create_settings_table', 10),
(67, '2020_11_09_202533_create_feature_webinars_table', 11),
(68, '2020_11_10_193459_edit_webinars_table', 12),
(69, '2020_11_11_203344_create_trend_categories_table', 13),
(72, '2020_11_11_222833_create_blog_categories_table', 14),
(75, '2020_11_11_231204_create_blog_table', 15),
(76, '2020_10_25_223247_add_sub_title_tickets_table', 16),
(77, '2020_10_28_001340_add_count_in_discount_users_table', 16),
(78, '2020_10_28_221509_create_payment_channels_table', 16),
(79, '2020_11_01_120909_change_class_name_enum_payment_channels_table', 16),
(80, '2020_11_07_233948_add_some_raw_in_order_items__table', 16),
(81, '2020_11_10_061350_add_discount_id_in_order_items_table', 16),
(82, '2020_11_10_071651_decimal_orders_order_items_sales_table', 16),
(83, '2020_11_11_193138_change_reference_id_type_in_orders_tabel', 16),
(84, '2020_11_11_222413_change_meeting_id_to_meeting_time_id_in_order_items_table', 16),
(85, '2020_11_11_225421_add_locked_at_and_reserved_at_and_change_request_time_to_day_in_reserve_meetings_table', 17),
(86, '2020_11_12_000116_add_type_in_orders_table', 17),
(87, '2020_11_12_001912_change_meeting_id_to_meeting_time_id_in_accounting_table', 17),
(88, '2020_11_12_133009_decimal_paid_amount_in_reserve_meetings_table', 17),
(91, '2020_11_12_170109_add_blog_id_to_comments_table', 18),
(98, '2020_11_14_201228_add_bio_and_ban_to_users_table', 20),
(99, '2020_11_14_224447_create_users_badges_table', 21),
(100, '2020_11_14_233319_create_payout_request_table', 22),
(101, '2020_11_15_010622_change_byer_id_and_add_seller_id_in_sales_table', 22),
(102, '2020_11_16_195009_create_supports_table', 22),
(103, '2020_11_16_201814_create_support_departments_table', 22),
(107, '2020_11_16_202254_create_supports_table', 23),
(109, '2020_11_17_192744_create_support_conversations_table', 24),
(110, '2020_11_17_072348_create_offline_payments_table', 25),
(111, '2020_11_19_191943_add_replied_status_to_comments_table', 25),
(114, '2020_11_20_215748_create_subscribes_table', 26),
(115, '2020_11_21_185519_create_notification_templates_table', 27),
(116, '2020_11_22_210832_create_promotions_table', 28),
(118, '2020_11_23_194153_add_status_column_to_discounts_table', 29),
(119, '2020_11_23_213532_create_users_occupations_table', 30),
(120, '2020_11_30_220855_change_amount_in_payouts_table', 31),
(121, '2020_11_30_231334_add_pay_date_in_offline_payments_table', 31),
(122, '2020_11_30_233018_add_charge_enum_in_type_in_orders_table', 31),
(123, '2020_12_01_193948_create_testimonials_table', 32),
(124, '2020_12_02_202043_edit_and_add_types_to_webinars_table', 33),
(128, '2020_12_04_204048_add_column_creator_id_to_some_tables', 34),
(129, '2020_12_05_205320_create_text_lessons_table', 35),
(130, '2020_12_05_210052_create_text_lessons_attachments_table', 36),
(131, '2020_12_06_215701_add_order_column_to_webinar_items_tables', 37),
(132, '2020_12_11_114844_add_column_storage_to_files_table', 38),
(133, '2020_12_07_211009_add_subscribe_id_in_order_items_table', 39),
(134, '2020_12_07_211657_nullable_payment_method_in_orders_table', 39),
(135, '2020_12_07_212306_add_subscribe_enum__type_in_orders_table', 39),
(136, '2020_12_07_223237_changes_in_sales_table', 39),
(137, '2020_12_07_224925_add_subscribe_id_in_accounting_table', 39),
(138, '2020_12_07_230200_create_subscribe_uses_table', 39),
(139, '2020_12_11_123209_add_subscribe_type_account_in_accounting_table', 39),
(140, '2020_12_11_132819_add_sale_id_in_subscribe_use_in_subscribe_uses_table', 39),
(141, '2020_12_11_135824_add_subscribe_payment_method_in_sales_table', 39),
(143, '2020_12_13_205751_create_advertising_banners_table', 41),
(145, '2020_12_14_204251_create_become_instructors_table', 42),
(146, '2020_11_12_232207_create_reports_table', 43),
(147, '2020_11_12_232207_create_comments_reports_table', 44),
(148, '2020_12_17_210822_create_webinar_reports_table', 45),
(150, '2020_12_18_181551_create_notifications_table', 46),
(151, '2020_12_18_195833_create_notifications_status_table', 47),
(152, '2020_12_19_195152_add_status_column_to_payment_channels_table', 48),
(154, '2020_12_20_231434_create_contacts_table', 49),
(155, '2020_12_21_210345_edit_quizzes_table', 50),
(156, '2020_12_24_221715_add_column_to_users_table', 50),
(157, '2020_12_24_084728_create_special_offers_table', 51),
(158, '2020_12_25_204545_add_promotion_enum_type_in_orders_table', 51),
(159, '2020_12_25_205139_add_promotion_id_in_order_items_table', 51),
(160, '2020_12_25_205811_add_promotion_id_in_accounting_table', 51),
(161, '2020_12_25_210341_add_promotion_id_in_sales_table', 51),
(162, '2020_12_25_212453_add_promotion_type_account_enum_in_accounting_table', 51),
(163, '2020_12_25_231005_add_promotion_type_enum_in_sales_table', 51),
(166, '2020_12_29_192943_add_column_reply_to_contacts_table', 53),
(167, '2020_12_30_225001_create_payu_transactions_table', 54),
(168, '2021_01_06_202649_edit_column_password_from_users_table', 55),
(169, '2021_01_08_134022_add_api_column_to_sessions_table', 56),
(170, '2021_01_10_215540_add_column_store_type_to_accounting', 57),
(173, '2021_01_13_214145_edit_carts_table', 58),
(174, '2021_01_13_230725_delete_column_type_from_orders_table', 59),
(175, '2021_01_20_214653_add_discount_column_to_reserve_meetings_table', 60),
(177, '2021_01_27_193915_add_foreign_key_to_support_conversations_table', 61),
(178, '2021_02_02_203821_add_viewed_at_column_to_comments_table', 62),
(180, '2021_02_12_134504_add_financial_approval_column_to_users_table', 64),
(181, '2021_02_12_131916_create_verifications_table', 65),
(182, '2021_02_15_221518_add_certificate_to_users_table', 66),
(183, '2021_02_16_194103_add_cloumn_private_to_webinars_table', 66),
(184, '2021_02_18_213601_edit_rates_column_webinar_reviews_table', 67),
(188, '2021_02_27_212131_create_noticeboards_table', 68),
(189, '2021_02_27_213940_create_noticeboards_status_table', 68),
(191, '2021_02_28_195025_edit_groups_table', 69),
(192, '2021_03_06_205221_create_newsletters_table', 70),
(193, '2021_03_12_105526_add_is_main_column_to_roles_table', 71),
(194, '2021_03_12_202441_add_description_column_to_feature_webinars_table', 72),
(195, '2021_03_18_130248_edit_status_column_from_supports_table', 73),
(196, '2021_03_19_113306_add_column_order_to_categories_table', 74),
(197, '2021_03_19_115939_add_column_order_to_filter_options_table', 75),
(199, '2021_03_24_100005_edit_discounts_table', 76),
(200, '2021_03_27_204551_create_sales_status_table', 77),
(202, '2021_03_28_182558_add_column_page_to_settings_table', 78),
(206, '2021_03_31_195835_add_new_status_in_reserve_meetings_table', 79),
(207, '2020_12_12_204705_create_course_learning_table', 80),
(208, '2021_04_19_195452_add_meta_description_column_to_blog_table', 81),
(209, '2021_04_21_200131_add_icon_column_to_categories_table', 82),
(210, '2021_04_21_203746_add_is_popular_column_to_subscribes_table', 83),
(211, '2021_04_25_203955_add_is_charge_account_column_to_order_items', 84),
(212, '2021_04_25_203955_add_is_charge_account_column_to_orders', 85),
(213, '2021_05_13_111720_add_moderator_secret_column_to_sessions_table', 86),
(214, '2021_05_13_123920_add_zoom_id_column_to_sessions_table', 87),
(215, '2021_05_14_182848_create_session_reminds_table', 88),
(217, '2021_05_25_193743_create_users_zoom_api_table', 89),
(218, '2021_05_25_205716_add_new_column_to_sessions_table', 90),
(219, '2021_05_27_095128_add_user_id_to_newsletters_table', 91),
(220, '2020_12_27_192459_create_pages_table', 92);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `newsletters`
--

INSERT INTO `newsletters` (`id`, `user_id`, `email`, `created_at`) VALUES
(9, 1031, 'oficumplimiento@ecoondas.co', 1630090162);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticeboards`
--

CREATE TABLE `noticeboards` (
  `id` int(10) UNSIGNED NOT NULL,
  `organ_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('all','organizations','students','instructors','students_and_instructors') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticeboards`
--

INSERT INTO `noticeboards` (`id`, `organ_id`, `user_id`, `type`, `sender`, `title`, `message`, `created_at`) VALUES
(10, NULL, NULL, 'all', 'Staff', 'Top summer classes', '<p>You can find top summer courses on the platform homepage and get all of them with 50% discount by using \"mysummer\" discount coupon.</p>', 1625921717),
(11, NULL, NULL, 'instructors', 'Staff', 'Instructor terms of services changed', '<p>Instructors terms of services changed on July 17. You can read terms on the terms page.</p>', 1625921872),
(12, NULL, NULL, 'all', 'Staff', 'New Year Sales Festival', '<p>Due to the New Year Festival, users who buy more than $ 200 will be given a 20% discount code.</p>', 1626132374),
(15, NULL, NULL, 'instructors', 'Staff', 'Nueva noticia de kpacit', '<p>Esto es una prueba de noticias</p>', 1630245231);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticeboards_status`
--

CREATE TABLE `noticeboards_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `noticeboard_id` int(10) UNSIGNED NOT NULL,
  `seen_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticeboards_status`
--

INSERT INTO `noticeboards_status` (`id`, `user_id`, `noticeboard_id`, `seen_at`) VALUES
(7, 1015, 11, 1626204347),
(8, 1041, 15, 1630249456),
(9, 1041, 12, 1630249459);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` enum('system','admin') COLLATE utf8mb4_unicode_ci DEFAULT 'system',
  `type` enum('single','all_users','students','instructors','organizations','group') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `group_id`, `title`, `message`, `sender`, `type`, `created_at`) VALUES
(1368, 1, NULL, 'New comment for your class', '<p>Robert B. Gray left a new comment on your class The Future of Energy .</p>', 'system', 'single', 1625863108),
(1370, 1, NULL, 'New comment for your class', '<p>Jade Harrison left a new comment on your class Excel from Beginner to Advanced .</p>', 'system', 'single', 1625863203),
(1372, 1, NULL, 'New comment for your class', '<p>Morgan Sullivan left a new comment on your class How to Manage & Influence Your Virtual Team .</p>', 'system', 'single', 1625863345),
(1373, 1, NULL, 'New comment for your class', '<p>Robert Ransdell left a new comment on your class Learn Python Programming .</p>', 'system', 'single', 1625863462),
(1378, 1, NULL, 'New comment for your class', '<p>James Kong left a new comment on your class Learn Python Programming .</p>', 'system', 'single', 1625864259),
(1380, 1, NULL, 'New comment for your class', '<p>Ricardo dave left a new comment on your class How to Travel Around the World .</p>', 'system', 'single', 1625864416),
(1382, 1, NULL, 'New comment for your class', '<p>Cameron Schofield left a new comment on your class The Future of Energy .</p>', 'system', 'single', 1625864526),
(1384, 1, NULL, 'New support ticket', '<p>New support ticket received with subject Convert Videos .</p>', 'system', 'single', 1625891270),
(1385, 1, NULL, 'New support ticket', '<p>New support ticket received with subject Pre-purchase question .</p>', 'system', 'single', 1625891677),
(1386, 1, NULL, 'New support ticket', '<p>New support ticket received with subject Pending Offline Payment .</p>', 'system', 'single', 1625891851),
(1387, 1, NULL, 'New support ticket', '<p>New support ticket received with subject Commission Rate .</p>', 'system', 'single', 1625892221),
(1388, 1, NULL, 'New support ticket', '<p>New support ticket received with subject Class delay .</p>', 'system', 'single', 1625895874),
(1389, 1, NULL, 'New reply on support ticket', '<p>The support ticket with the subject Class delay updated with a new reply.</p>', 'system', 'single', 1625897110),
(1390, 1, NULL, 'New reply on support ticket', '<p>The support ticket with the subject Class delay updated with a new reply.</p>', 'system', 'single', 1625898890),
(1459, 1, NULL, 'New payout request', '<p>New payout request received with the amount 332 . You can manage it using the admin panel.</p>', 'system', 'single', 1626061192),
(1462, 1, NULL, 'New payout request', '<p>New payout request received with the amount 80 . You can manage it using the admin panel.</p>', 'system', 'single', 1626061254),
(1474, NULL, NULL, 'New sales', '<p>Congratulations! There is a new sales for your class Bronze Subscribe .</p>', 'system', 'single', 1626061450),
(1491, 1, NULL, 'New support ticket', '<p>New support ticket received with subject Refund Request #64237 .</p>', 'system', 'single', 1626063457),
(1492, 1, NULL, 'New reply on support ticket', '<p>The support ticket with the subject Refund Request #64237 updated with a new reply.</p>', 'system', 'single', 1626063547),
(1534, 1, NULL, 'New comment for your class', '<p>Robert Ransdell left a new comment on your class Health And Fitness Masterclass .</p>', 'system', 'single', 1626235679),
(1546, 1, NULL, 'New comment for your class', '<p>Cameron Schofield left a new comment on your class Become a Product Manager .</p>', 'system', 'single', 1626240118),
(1556, NULL, NULL, 'New sales', '<p>Congratulations! There is a new sales for your class The Future of Energy .</p>', 'system', 'single', 1626241152),
(1564, 1, NULL, 'New comment for your class', '<p>Kate Williams left a new comment on your class Become a Product Manager .</p>', 'system', 'single', 1626241320),
(1566, 1, NULL, 'New comment for your class', '<p>Kate Williams left a new comment on your class Active Listening: You Can Be a Great Listener .</p>', 'system', 'single', 1626241386),
(1570, 1, NULL, 'New badge', '<p>Congratilations! You received Faitful User&nbsp;badge.</p>', 'system', 'single', 1626242992),
(1583, 1, NULL, 'New support ticket', '<p>New support ticket received with subject Problem with quiz .</p>', 'system', 'single', 1626250124),
(1590, 1, NULL, 'New comment for your class', '<p>Robert Ransdell left a new comment on your class Learn Python Programming .</p>', 'system', 'single', 1626493830),
(1599, 1, NULL, 'New comment for your class', '<p>Robert B. Gray left a new comment on your class Active Listening: You Can Be a Great Listener .</p>', 'system', 'single', 1626509207),
(1600, 1, NULL, 'New comment for your class', '<p>Robert B. Gray left a new comment on your class Active Listening: You Can Be a Great Listener .</p>', 'system', 'single', 1626509327),
(1601, 1, NULL, 'New comment for your class', '<p>Robert Ransdell left a new comment on your class Become a Product Manager .</p>', 'system', 'single', 1626509546),
(1644, 1, NULL, 'New badge', '<p>Congratilations! You received Usuario fiel&nbsp;badge.</p>', 'system', 'single', 1630010600),
(1680, 1, NULL, 'New support ticket', '<p>New support ticket received with subject No puedo comprar con epayco .</p>', 'system', 'single', 1630244337);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications_status`
--

CREATE TABLE `notifications_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL,
  `seen_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `notifications_status`
--

INSERT INTO `notifications_status` (`id`, `user_id`, `notification_id`, `seen_at`) VALUES
(11, 1, 1601, 1629766078),
(12, 1, 1600, 1629766078),
(13, 1, 1599, 1629766078),
(14, 1, 1590, 1629766078),
(15, 1, 1583, 1629766078),
(16, 1, 1570, 1629766078),
(17, 1, 1566, 1629766078),
(18, 1, 1564, 1629766078),
(19, 1, 1546, 1629766078),
(20, 1, 1534, 1629766078),
(21, 1, 1492, 1629766078),
(22, 1, 1491, 1629766078),
(23, 1, 1462, 1629766078),
(24, 1, 1459, 1629766078),
(25, 1, 1390, 1629766078),
(26, 1, 1389, 1629766078),
(27, 1, 1388, 1629766078),
(28, 1, 1387, 1629766078),
(29, 1, 1386, 1629766078),
(30, 1, 1385, 1629766078),
(31, 1, 1384, 1629766078),
(32, 1, 1382, 1629766078),
(33, 1, 1380, 1629766078),
(34, 1, 1378, 1629766078),
(35, 1, 1373, 1629766078),
(36, 1, 1372, 1629766078),
(37, 1, 1370, 1629766078),
(38, 1, 1368, 1629766078),
(56, 1, 1680, 1630244646);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `title`, `template`) VALUES
(2, 'New badge', '<p>Congratilations! You received [u.b.title]&nbsp;badge.</p>'),
(3, 'Your user group changed', '<p>Your user group changed to [u.g.title] .</p>'),
(4, 'Your class created', '<p>Your class [c.title] successfully created. It will be published after approval.</p>'),
(5, 'Your class approved', '<p>Your class [c.title] successfully approved. Now you can find it on the website.</p>'),
(6, 'Your class rejected', '<p>Sorry, Your class [c.title] rejected because it doesn\'t meet requirements or is against the community rules.</p>'),
(7, 'New comment for your class', '<p>[u.name] left a new comment on your class [c.title] .</p>'),
(8, 'New class support message', '<p>user [u.name] send new support message for course with title [c.title] .</p>'),
(9, 'New reply on support conversation', '<p>New reply on a support conversation on your class [c.title] support.</p>'),
(10, 'New support ticket', '<p>New support ticket received with subject [s.t.title] .</p>'),
(11, 'New reply on support ticket', '<p>The support ticket with the subject [s.t.title] updated with a new reply.</p>'),
(12, 'New financial document', '<p>&nbsp;New financial document submitted for your class [c.title] with type [f.d.type] and amount [amount] .</p>'),
(13, 'New payout request', '<p>New payout request received with the amount [payout.amount] . You can manage it using the admin panel.</p>'),
(14, 'Payout has been processed', 'Your payout has been processed with the amount [payout.amount]&nbsp;&nbsp;to your account [payout.account] .'),
(15, 'New sales', '<p>Congratulations! There is a new sales for your class [c.title] .</p>'),
(16, 'New purchase completed', '<p>The class [c.title] successfully purchased. Now you can start learning.</p>'),
(17, 'New feedback', '<p>Your class [c.title] received a [rate.count] stars rating from [student.name] .</p>'),
(18, 'Offline payment submitted', '<p>An offline payment request with the amount [amount] submitted successfully.</p>'),
(19, 'Offline payment approved', '<p>Offline payment request with the amount [amount] successfully approved.</p>'),
(20, 'Offline payment rejected', '<p>Sorry, offline payment request with the amount [amount]&nbsp;rejected.</p>'),
(21, 'Subscription plan activated', '<p>[s.p.name] subscription package activated by user [u.name] .</p>'),
(22, 'New meeting request', '<p>New meeting booked by [u.name] for [time.date] with the amount [amount] .</p>'),
(23, 'New meeting join URL', '<p>The reserved meeting join URL created by [instructor.name]. Join the meeting on [time.date] using this URL: [link] .</p>'),
(24, 'Meeting reminder', '<p>You have a meeting on [time.date] . Don\'t forget to join it on time.</p>'),
(25, 'Meeting finished', '<p>The meeting finished. Instructor: [instructor.name] Student:&nbsp; [student.name]&nbsp; Meeting time: [time.date] .</p>'),
(26, 'New contact message', '<p>New contact message with title [c.u.title] received from [u.name] .</p>'),
(27, 'Live class reminder', '<p>Your live class [c.title] will be conducted on [time.date] . Join it on time.</p>'),
(28, 'Promotion plan activated', '<p>Promotion plan [p.p.name]&nbsp;&nbsp;activated for the call [c.title] .</p>'),
(29, 'Promotion plan purchased', '<p>There is new request for activating [p.p.name] for class [c.title] .&nbsp;</p>'),
(30, 'New certificate', '<p>You achieved a new certificate for [c.title] . You can download it from the class page or your panel.</p>'),
(31, 'New pending quiz', '<p>[student.name] passed [q.title] quiz of the [c.title] class and waiting for correction to get results.</p>'),
(32, 'Waiting quiz result', '<p>Your pending quiz corrected and your result is [q.result] for [q.title] quiz of [c.title] class.</p>'),
(33, 'New comment', '<p>[u.name] left a new comment and waiting for approval.</p>'),
(34, 'Payout request submitted', '<p>Your payout request successfully submitted for [payout.amount] . You will receive an email when processed.</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offline_payments`
--

CREATE TABLE `offline_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `bank` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_number` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('waiting','approved','reject') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `pay_date` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','paying','paid','fail') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` enum('credit','payment_channel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_charge_account` tinyint(1) NOT NULL DEFAULT '0',
  `amount` int(10) UNSIGNED NOT NULL,
  `tax` decimal(13,2) DEFAULT NULL,
  `total_discount` decimal(13,2) DEFAULT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `reference_id` text COLLATE utf8mb4_unicode_ci,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED DEFAULT NULL,
  `subscribe_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL,
  `reserve_meeting_id` int(10) UNSIGNED DEFAULT NULL,
  `ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `tax` int(10) UNSIGNED DEFAULT NULL,
  `tax_price` decimal(13,2) DEFAULT NULL,
  `commission` int(10) UNSIGNED DEFAULT NULL,
  `commission_price` decimal(13,2) DEFAULT NULL,
  `discount` decimal(13,2) DEFAULT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `created_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robot` tinyint(1) NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('publish','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `link`, `name`, `title`, `seo_description`, `robot`, `content`, `status`, `created_at`) VALUES
(3, '/about', 'Conocenos', 'Por Que Kpacit', 'Rocket LMS is an online course marketplace with a pile of features that helps you to run your online education business easily.', 1, '<div><div><b>KPACIT&nbsp;</b>es un mercado de cursos en línea con un montón de características que le ayudaran a dirigir su negocio de educación en línea fácilmente. Esta plataforma ayuda a los instructores y a los estudiantes a ponerse en contacto y a compartir conocimientos.</div><div><br></div><div>Los profesores podrán crear ilimitados cursos de vídeo, clases en directo, cursos de texto, proyectos, cuestionarios, archivos, etc. y los estudiantes podrán utilizar el material educativo y aumentar su nivel de habilidad.</div><div><br></div><div>Kpacit se basa en las necesidades reales de las empresas, en las diferencias culturales y en las investigaciones avanzadas de los usuarios, por lo que cubre los requisitos de su empresa de manera eficiente.</div></div><div style=\"text-align: center; \"><img src=\"/store/1/default_images/about.png\" style=\"width: 1110px;\"><br></div><div><br></div><div><b>POR QUÉ ELEGIR KPACIT?</b></div><div><br></div><div><div>- Solución integral para empresas</div><div>- Múltiples tipos de contenido para sus estudiantes</div><div>- Integración con las plataformas mas reconocidas</div><div>- Integración con el calendario de Google para tus estudiantes</div><div>- Soporte de reuniones 1 a 1 en línea o 1 a Muchos</div><div>- Puedes crear cursos en solitario o en compañia de otros instructores</div><div>- Sistema de educación organizacional</div><div>- Diferentes modalidades de pago</div><div>- Llega a tus estudiantes de cualquier parte del mundo</div></div>', 'publish', 1609088468),
(5, '/terms', 'Terminos & Condiciones', 'Terminos & Condiciones', 'Nuestra misión es mejorar la vida a través del aprendizaje. Permitimos a cualquier persona en cualquier lugar crear y compartir contenidos educativos (instructores) y acceder a esos contenidos educativos para aprender.', 1, '<p><b>NOTA: ES TEXTO EJEMPLO</b></p><p>Our mission is to improve lives through learning. We enable anyone anywhere to create and share educational content (instructors) and to access that educational content to learn (students). We consider our marketplace model the best way to offer valuable educational content to our users. We need rules to keep our platform and services safe for you, us, and our student and instructor community. These Terms apply to all your activities on the Udemy website, the Udemy mobile applications, our TV applications, our APIs, and other related services (“<b>Services</b>”).</p><p>If you publish content on our platform, you must also agree to the Instructor Terms. We also provide details regarding our processing of the personal data of our students and instructors in our Privacy Policy. If you are using our platform for Business as part of your organization’s Udemy for Business subscription, you should consult our Udemy for Business Privacy Statement.</p><p style=\"text-align: center; \"><img src=\"/store/1/default_images/blogs/home2.png\" style=\"width: 954px;\"><br></p><p>You need an account for most activities on our platform, including to <b>purchase</b> and access content or to <b>submit content for publication</b>. When setting up and maintaining your account, you must provide and continue to provide accurate and complete information, including a valid email address. You have complete responsibility for your account and everything that happens on your account, including for any harm or damage (to us or anyone else) caused by someone using your account without your permission. This means you need to be careful with your password. You may not transfer your account to someone else or use someone else’s account. If you contact us to request access to an account, we will not grant you such access unless you can provide us with the information that we need to prove you are the owner of that account. In the event of the death of a user, the account of that user will be closed.</p>', 'publish', 1625633448);
INSERT INTO `pages` (`id`, `link`, `name`, `title`, `seo_description`, `robot`, `content`, `status`, `created_at`) VALUES
(6, '/empresa', 'Empresa', 'Registro Empresa', 'Registro Empresa Kpacit', 1, '<p style=\"text-align: center; \"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAyAAAAfQCAYAAAA6rTtiAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAABKFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0n77u/JyBpZD0nVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkJz8+Cjx4OnhtcG1ldGEgeG1sbnM6eD0nYWRvYmU6bnM6bWV0YS8nPgo8cmRmOlJERiB4bWxuczpyZGY9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMnPgoKIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PScnCiAgeG1sbnM6QXR0cmliPSdodHRwOi8vbnMuYXR0cmlidXRpb24uY29tL2Fkcy8xLjAvJz4KICA8QXR0cmliOkFkcz4KICAgPHJkZjpTZXE+CiAgICA8cmRmOmxpIHJkZjpwYXJzZVR5cGU9J1Jlc291cmNlJz4KICAgICA8QXR0cmliOkNyZWF0ZWQ+MjAyMS0wOC0yNTwvQXR0cmliOkNyZWF0ZWQ+CiAgICAgPEF0dHJpYjpFeHRJZD5iMTU0MjZmZS1jMjg3LTQ2MDgtYjBiMC0zMGJlZmY5OWRjZjc8L0F0dHJpYjpFeHRJZD4KICAgICA8QXR0cmliOkZiSWQ+NTI1MjY1OTE0MTc5NTgwPC9BdHRyaWI6RmJJZD4KICAgICA8QXR0cmliOlRvdWNoVHlwZT4yPC9BdHRyaWI6VG91Y2hUeXBlPgogICAgPC9yZGY6bGk+CiAgIDwvcmRmOlNlcT4KICA8L0F0dHJpYjpBZHM+CiA8L3JkZjpEZXNjcmlwdGlvbj4KCiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0nJwogIHhtbG5zOmRjPSdodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyc+CiAgPGRjOnRpdGxlPgogICA8cmRmOkFsdD4KICAgIDxyZGY6bGkgeG1sOmxhbmc9J3gtZGVmYXVsdCc+T3JnYW5pYyBFZHVjYXRpb25hbCBUZWNobm9sb2d5IENsYXNzcm9vbSBBZ3JlZW1lbnRzIEluZm9ncmFwaGljPC9yZGY6bGk+CiAgIDwvcmRm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BQyr46Y+3jU6apB2nwUAqErnens6d5d+HtHTZwwZd8Qr+vcTvWZMn0uXa2bCAgZERE5gEzoRZa/wb5SNv2wG/AFE9otI9Y1d59WxFIgRxcj/6ZegzZ3S++pHqbh+gs+LHm7WByT6S34R7RbpurJUIteKd/MeWVMr9rzxXpfIZxD//Imdu69rCPT8fNfw1/Vz6s/7ICIaihhAiChrCSEATUVox2GEXtqY1hWFut3cThyH3G/eC9e8CwHDioYhIiIi6owBhIiyW3hVovbvPQ3rwNFOm9ClbSRE2H0JyoxJyP33f4Q6vhQwM2efECIiokzCAEJEQ4J1thGBJ35rL5kaaTxG6gNA1x3TRcUY5D/1z3BdOj36GEMIERFRBwYQIspqIrqSEhB48W203/9deyM4AXsUwrIgDTOlXzDD+3FY9mpOYswI5PzLPdCmVUAG7I3ysiaESHSsSGV2eY8xe/QRERENFFfBIqKsF7vyUuDVrTCOfh05X70bSvloOHbHrLuQ89W/g/zsD2HWne9YjSnDCQCypR1WbV2cJwUQMrgOLBERDQr3ASGirBK7D0inx6P7L8AehfC4AY/Lwd/YS3u/ilY/ZNDotGFdpooun5vjtpcT7vrZCQHZ2g6EzKx4P0MS9wEhoiGAIyBENCR02wk7GAJCIYergj2dKcvuGKU/CASC8Z/MwvdDRESZhQGEiIaUTr+Vz4Tx3SwaJUjos8ui90NERJkpOyYlExERERHRkMAAQkREREREacMAQkREREREacMAQkREREREacMAQkREREREacMAQkREREREacNleIko+2TC8rpEREQ0IAwgRJRVuAsFERFRduMULCIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShsGECIiIiIiShvN6QKIaOBEqRdKxWgIbx5Engci1wPk50Dk50DkeOzveR6I/FwgPwcQAmhug3mgFrKxBbKl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\" style=\"width: 50%;\" data-filename=\"Classroom Agreements Infographic.png\"><br></p>', 'publish', 1629925087);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('av18981848@gmail.com', 'cYTtJLR86NoxZ0whf465XoQa98hhxAxx2Q7t3zeaeTJRYoUMQwqqzb4rgqP2', '2021-02-20 13:35:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_channels`
--

CREATE TABLE `payment_channels` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` enum('Paypal','Paystack','Paytm','Payu','Razorpay','Zarinpal','Stripe','Paysera','Cashu','YandexCheckout','MercadoPago','Bitpay','Midtrans','Iyzipay','Flutterwave','Payfort') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `payment_channels`
--

INSERT INTO `payment_channels` (`id`, `title`, `class_name`, `status`, `image`, `settings`, `created_at`) VALUES
(1, 'Paypal', 'Paypal', 'inactive', '/store/1/default_images/gateways/paypal.png', '', '1617345734'),
(4, 'Payu', 'Payu', 'inactive', '/store/1/default_images/gateways/payu.png', '', '1617345734'),
(5, 'Razorpay', 'Razorpay', 'inactive', '/store/1/default_images/gateways/razorpay.png', '', '1617345734'),
(7, 'Epayco', 'Stripe', 'active', '/store/1/3e181eb6-5180-4105-9895-40ee56c5304d.png', '', '1617345734');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payouts`
--

CREATE TABLE `payouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `account_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_bank_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('waiting','done','reject') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payu_transactions`
--

CREATE TABLE `payu_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paid_for_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paid_for_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateway` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','failed','successful','invalid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `verified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `allow` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `section_id`, `allow`) VALUES
(5189, 2, 1, 1),
(5190, 2, 2, 1),
(5191, 2, 3, 1),
(5192, 2, 4, 1),
(5193, 2, 5, 1),
(5194, 2, 6, 1),
(5195, 2, 7, 1),
(5196, 2, 8, 1),
(5197, 2, 9, 1),
(5198, 2, 10, 1),
(5199, 2, 11, 1),
(5200, 2, 12, 1),
(5201, 2, 13, 1),
(5202, 2, 14, 1),
(5203, 2, 15, 1),
(5204, 2, 16, 1),
(5205, 2, 17, 1),
(5206, 2, 25, 1),
(5207, 2, 26, 1),
(5208, 2, 50, 1),
(5209, 2, 51, 1),
(5210, 2, 52, 1),
(5211, 2, 53, 1),
(5212, 2, 54, 1),
(5213, 2, 100, 1),
(5214, 2, 101, 1),
(5215, 2, 102, 1),
(5216, 2, 103, 1),
(5217, 2, 104, 1),
(5218, 2, 105, 1),
(5219, 2, 106, 1),
(5220, 2, 107, 1),
(5221, 2, 108, 1),
(5222, 2, 109, 1),
(5223, 2, 110, 1),
(5224, 2, 111, 1),
(5225, 2, 112, 1),
(5226, 2, 113, 1),
(5227, 2, 114, 1),
(5228, 2, 115, 1),
(5229, 2, 150, 1),
(5230, 2, 151, 1),
(5231, 2, 152, 1),
(5232, 2, 153, 1),
(5233, 2, 154, 1),
(5234, 2, 155, 1),
(5235, 2, 156, 1),
(5236, 2, 157, 1),
(5237, 2, 158, 1),
(5238, 2, 200, 1),
(5239, 2, 201, 1),
(5240, 2, 202, 1),
(5241, 2, 203, 1),
(5242, 2, 204, 1),
(5243, 2, 205, 1),
(5244, 2, 206, 1),
(5245, 2, 207, 1),
(5246, 2, 208, 1),
(5247, 2, 250, 1),
(5248, 2, 251, 1),
(5249, 2, 252, 1),
(5250, 2, 253, 1),
(5251, 2, 254, 1),
(5252, 2, 300, 1),
(5253, 2, 301, 1),
(5254, 2, 302, 1),
(5255, 2, 303, 1),
(5256, 2, 304, 1),
(5257, 2, 350, 1),
(5258, 2, 351, 1),
(5259, 2, 352, 1),
(5260, 2, 353, 1),
(5261, 2, 354, 1),
(5262, 2, 355, 1),
(5263, 2, 356, 1),
(5264, 2, 400, 1),
(5265, 2, 401, 1),
(5266, 2, 402, 1),
(5267, 2, 403, 1),
(5268, 2, 404, 1),
(5269, 2, 405, 1),
(5270, 2, 450, 1),
(5271, 2, 451, 1),
(5272, 2, 452, 1),
(5273, 2, 453, 1),
(5274, 2, 454, 1),
(5275, 2, 455, 1),
(5276, 2, 456, 1),
(5277, 2, 457, 1),
(5278, 2, 458, 1),
(5279, 2, 459, 1),
(5280, 2, 500, 1),
(5281, 2, 501, 1),
(5282, 2, 502, 1),
(5283, 2, 503, 1),
(5284, 2, 504, 1),
(5285, 2, 505, 1),
(5286, 2, 550, 1),
(5287, 2, 551, 1),
(5288, 2, 552, 1),
(5289, 2, 553, 1),
(5290, 2, 554, 1),
(5291, 2, 600, 1),
(5292, 2, 601, 1),
(5293, 2, 602, 1),
(5294, 2, 603, 1),
(5295, 2, 650, 1),
(5296, 2, 651, 1),
(5297, 2, 652, 1),
(5298, 2, 653, 1),
(5299, 2, 654, 1),
(5300, 2, 655, 1),
(5301, 2, 656, 1),
(5302, 2, 657, 1),
(5303, 2, 658, 1),
(5304, 2, 700, 1),
(5305, 2, 701, 1),
(5306, 2, 702, 1),
(5307, 2, 703, 1),
(5308, 2, 704, 1),
(5309, 2, 705, 1),
(5310, 2, 706, 1),
(5311, 2, 707, 1),
(5312, 2, 708, 1),
(5313, 2, 750, 1),
(5314, 2, 751, 1),
(5315, 2, 752, 1),
(5316, 2, 753, 1),
(5317, 2, 754, 1),
(5318, 2, 800, 1),
(5319, 2, 801, 1),
(5320, 2, 802, 1),
(5321, 2, 803, 1),
(5322, 2, 850, 1),
(5323, 2, 851, 1),
(5324, 2, 852, 1),
(5325, 2, 853, 1),
(5326, 2, 854, 1),
(5327, 2, 900, 1),
(5328, 2, 901, 1),
(5329, 2, 902, 1),
(5330, 2, 903, 1),
(5331, 2, 904, 1),
(5332, 2, 950, 1),
(5333, 2, 951, 1),
(5334, 2, 952, 1),
(5335, 2, 953, 1),
(5336, 2, 954, 1),
(5337, 2, 955, 1),
(5338, 2, 956, 1),
(5339, 2, 957, 1),
(5340, 2, 958, 1),
(5341, 2, 959, 1),
(5342, 2, 1000, 1),
(5343, 2, 1001, 1),
(5344, 2, 1002, 1),
(5345, 2, 1003, 1),
(5346, 2, 1004, 1),
(5347, 2, 1050, 1),
(5348, 2, 1051, 1),
(5349, 2, 1052, 1),
(5350, 2, 1053, 1),
(5351, 2, 1054, 1),
(5352, 2, 1055, 1),
(5353, 2, 1056, 1),
(5354, 2, 1057, 1),
(5355, 2, 1058, 1),
(5356, 2, 1059, 1),
(5357, 2, 1075, 1),
(5358, 2, 1076, 1),
(5359, 2, 1077, 1),
(5360, 2, 1078, 1),
(5361, 2, 1079, 1),
(5362, 2, 1100, 1),
(5363, 2, 1101, 1),
(5364, 2, 1102, 1),
(5365, 2, 1103, 1),
(5366, 2, 1104, 1),
(5367, 2, 1150, 1),
(5368, 2, 1151, 1),
(5369, 2, 1152, 1),
(5370, 2, 1153, 1),
(5371, 2, 1154, 1),
(5372, 2, 1200, 1),
(5373, 2, 1201, 1),
(5374, 2, 1202, 1),
(5375, 2, 1203, 1),
(5376, 2, 1204, 1),
(5377, 2, 1230, 1),
(5378, 2, 1231, 1),
(5379, 2, 1232, 1),
(5380, 2, 1233, 1),
(5381, 2, 1250, 1),
(5382, 2, 1251, 1),
(5383, 2, 1252, 1),
(5384, 2, 1253, 1),
(5385, 2, 1300, 1),
(5386, 2, 1301, 1),
(5387, 2, 1302, 1),
(5388, 2, 1303, 1),
(5389, 2, 1304, 1),
(5390, 2, 1305, 1),
(5391, 2, 1350, 1),
(5392, 2, 1351, 1),
(5393, 2, 1352, 1),
(5394, 2, 1353, 1),
(5395, 2, 1354, 1),
(5396, 2, 1355, 1),
(5397, 2, 1400, 1),
(5398, 2, 1401, 1),
(5399, 2, 1402, 1),
(5400, 2, 1403, 1),
(5401, 2, 1404, 1),
(5402, 2, 1405, 1),
(5403, 2, 1406, 1),
(5404, 2, 1407, 1),
(5405, 2, 1408, 1),
(5406, 2, 1409, 1),
(5407, 2, 1410, 1),
(5408, 2, 1450, 1),
(5409, 2, 1451, 1),
(5410, 2, 1452, 1),
(5411, 2, 1453, 1),
(5412, 2, 1454, 1),
(5413, 2, 1455, 1),
(5414, 2, 1500, 1),
(5415, 2, 1501, 1),
(5416, 2, 1502, 1),
(5417, 2, 1503, 1),
(5418, 2, 1504, 1),
(5419, 2, 1550, 1),
(5420, 2, 1551, 1),
(5421, 2, 1552, 1),
(5422, 2, 1553, 1),
(5423, 2, 1554, 1),
(5424, 2, 1600, 1),
(5425, 2, 1601, 1),
(5426, 2, 1602, 1),
(5427, 2, 1603, 1),
(5428, 2, 1604, 1),
(5429, 2, 1650, 1),
(5430, 2, 1651, 1),
(5431, 2, 1652, 1),
(5493, 6, 1, 1),
(5494, 6, 2, 1),
(5495, 6, 3, 1),
(5496, 6, 4, 1),
(5497, 6, 5, 1),
(5498, 6, 6, 1),
(5499, 6, 7, 1),
(5500, 6, 8, 1),
(5501, 6, 9, 1),
(5502, 6, 10, 1),
(5503, 6, 11, 1),
(5504, 6, 12, 1),
(5505, 6, 13, 1),
(5506, 6, 14, 1),
(5507, 6, 15, 1),
(5508, 6, 16, 1),
(5509, 6, 17, 1),
(5510, 6, 25, 1),
(5511, 6, 26, 1),
(5512, 6, 100, 1),
(5513, 6, 101, 1),
(5514, 6, 102, 1),
(5515, 6, 103, 1),
(5516, 6, 104, 1),
(5517, 6, 105, 1),
(5518, 6, 106, 1),
(5519, 6, 108, 1),
(5520, 6, 109, 1),
(5521, 6, 110, 1),
(5522, 6, 112, 1),
(5523, 6, 113, 1),
(5524, 6, 114, 1),
(5525, 6, 115, 1),
(5526, 6, 550, 1),
(5527, 6, 551, 1),
(5528, 6, 552, 1),
(5529, 6, 553, 1),
(5530, 6, 554, 1),
(5531, 6, 750, 1),
(5532, 6, 751, 1),
(5533, 6, 753, 1),
(5534, 6, 754, 1),
(5535, 6, 800, 1),
(5536, 6, 801, 1),
(5537, 6, 802, 1),
(5538, 6, 803, 1),
(5539, 6, 1230, 1),
(5540, 6, 1231, 1),
(5541, 6, 1232, 1),
(5542, 6, 1233, 1),
(5543, 6, 1250, 1),
(5544, 6, 1251, 1),
(5545, 6, 1252, 1),
(5546, 6, 1600, 1),
(5547, 6, 1601, 1),
(5548, 6, 1602, 1),
(5549, 6, 1603, 1),
(5576, 9, 1, 1),
(5577, 9, 2, 1),
(5578, 9, 3, 1),
(5579, 9, 4, 1),
(5580, 9, 5, 1),
(5581, 9, 6, 1),
(5582, 9, 7, 1),
(5583, 9, 8, 1),
(5584, 9, 9, 1),
(5585, 9, 10, 1),
(5586, 9, 11, 1),
(5587, 9, 12, 1),
(5588, 9, 13, 1),
(5589, 9, 14, 1),
(5590, 9, 15, 1),
(5591, 9, 16, 1),
(5592, 9, 17, 1),
(5593, 9, 700, 1),
(5594, 9, 701, 1),
(5595, 9, 702, 1),
(5596, 9, 703, 1),
(5597, 9, 704, 1),
(5598, 9, 705, 1),
(5599, 9, 706, 1),
(5600, 9, 707, 1),
(5601, 9, 708, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prerequisites`
--

CREATE TABLE `prerequisites` (
  `id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `prerequisite_id` int(10) UNSIGNED NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `days`, `price`, `icon`, `is_popular`, `description`, `created_at`) VALUES
(2, 'Gold', 15, 150, '/store/1/default_images/subscribe_packages/gold.svg', 1, 'One of your classes will be displayed at the top of the category list and homepage slider', 1625992059),
(3, 'Bronze', 15, 50, '/store/1/default_images/subscribe_packages/bronze.svg', 0, 'One of your classes will be displayed at the top of the category list', 1625991921),
(4, 'Silver', 15, 90, '/store/1/default_images/subscribe_packages/silver.svg', 0, 'One of your classes will be displayed at the homepage slider', 1625991978);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED DEFAULT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `webinar_title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `attempt` int(11) DEFAULT NULL,
  `pass_mark` int(11) NOT NULL,
  `certificate` tinyint(1) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mark` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quizzes_questions`
--

CREATE TABLE `quizzes_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('multiple','descriptive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quizzes_questions_answers`
--

CREATE TABLE `quizzes_questions_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quizzes_results`
--

CREATE TABLE `quizzes_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `results` text COLLATE utf8mb4_unicode_ci,
  `user_grade` int(11) DEFAULT NULL,
  `status` enum('passed','failed','waiting') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `rate` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserve_meetings`
--

CREATE TABLE `reserve_meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `meeting_id` int(11) DEFAULT NULL,
  `sale_id` int(10) UNSIGNED DEFAULT NULL,
  `meeting_time_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `paid_amount` decimal(13,2) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','open','finished','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `locked_at` int(11) DEFAULT NULL,
  `reserved_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `caption`, `users_count`, `is_admin`, `created_at`) VALUES
(1, 'user', 'User role', 0, 0, 1604418504),
(2, 'admin', 'Admin role', 0, 1, 1604418504),
(3, 'organization', 'Organization role', 0, 0, 1604418504),
(4, 'teacher', 'Teacher role', 0, 0, 1604418504),
(6, 'education', 'Staff role', 0, 1, 1613370817),
(9, 'Author Role', 'Author', 0, 1, 1625093577);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED DEFAULT NULL,
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `webinar_id` int(10) UNSIGNED DEFAULT NULL,
  `meeting_id` int(10) UNSIGNED DEFAULT NULL,
  `subscribe_id` int(10) UNSIGNED DEFAULT NULL,
  `ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('webinar','meeting','subscribe','promotion') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` enum('credit','payment_channel','subscribe') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `tax` decimal(13,2) DEFAULT NULL,
  `commission` decimal(13,2) DEFAULT NULL,
  `discount` decimal(13,2) DEFAULT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `refund_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_log`
--

CREATE TABLE `sales_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_id` int(10) UNSIGNED NOT NULL,
  `viewed_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_group_id` int(10) UNSIGNED DEFAULT NULL,
  `caption` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `name`, `section_group_id`, `caption`) VALUES
(1, 'admin_general_dashboard', NULL, 'General Dashboard'),
(2, 'admin_general_dashboard_show', 1, 'General Dashboard page'),
(3, 'admin_general_dashboard_quick_access_links', 1, 'Quick access links in General Dashboard'),
(4, 'admin_general_dashboard_daily_sales_statistics', 1, 'Daily Sales Type Statistics Section'),
(5, 'admin_general_dashboard_income_statistics', 1, 'Income Statistics Section'),
(6, 'admin_general_dashboard_total_sales_statistics', 1, 'Total Sales Statistics Section'),
(7, 'admin_general_dashboard_new_sales', 1, 'New Sales Section'),
(8, 'admin_general_dashboard_new_comments', 1, 'New Comments Section'),
(9, 'admin_general_dashboard_new_tickets', 1, 'New Tickets Section'),
(10, 'admin_general_dashboard_new_reviews', 1, 'New Reviews Section'),
(11, 'admin_general_dashboard_sales_statistics_chart', 1, 'Sales Statistics Chart'),
(12, 'admin_general_dashboard_recent_comments', 1, 'Recent comments Section'),
(13, 'admin_general_dashboard_recent_tickets', 1, 'Recent tickets Section'),
(14, 'admin_general_dashboard_recent_webinars', 1, 'Recent webinars Section'),
(15, 'admin_general_dashboard_recent_courses', 1, 'Recent courses Section'),
(16, 'admin_general_dashboard_users_statistics_chart', 1, 'Users Statistics Chart'),
(17, 'admin_clear_cache', 1, 'Clear cache'),
(25, 'admin_marketing_dashboard', NULL, 'Marketing Dashboard'),
(26, 'admin_marketing_dashboard_show', 25, 'Marketing Dashboard page'),
(50, 'admin_roles', NULL, 'Roles'),
(51, 'admin_roles_list', 50, 'Roles List'),
(52, 'admin_roles_create', 50, 'Roles Create'),
(53, 'admin_roles_edit', 50, 'Roles Edit'),
(54, 'admin_roles_delete', 50, 'Roles Delete'),
(100, 'admin_users', NULL, 'Users'),
(101, 'admin_staffs_list', 100, 'Staffs list'),
(102, 'admin_users_list', 100, 'Students list'),
(103, 'admin_instructors_list', 100, 'Instructors list'),
(104, 'admin_organizations_list', 100, 'Organizations list'),
(105, 'admin_users_create', 100, 'Users Create'),
(106, 'admin_users_edit', 100, 'Users Edit'),
(107, 'admin_users_delete', 100, 'Users Delete'),
(108, 'admin_users_export_excel', 100, 'List Export excel'),
(109, 'admin_users_badges', 100, 'Users Badges'),
(110, 'admin_users_badges_edit', 100, 'Badges edit'),
(111, 'admin_users_badges_delete', 100, 'Badges delete'),
(112, 'admin_users_impersonate', 100, 'users impersonate (login by users)'),
(113, 'admin_become_instructors_list', 100, 'Lists of requests for become instructors'),
(114, 'admin_become_instructors_reject', 100, 'Reject requests for become instructors'),
(115, 'admin_become_instructors_delete', 100, 'Delete requests for become instructors'),
(150, 'admin_webinars', NULL, 'Webinars'),
(151, 'admin_webinars_list', 150, 'Webinars List'),
(152, 'admin_webinars_create', 150, 'Webinars Create'),
(153, 'admin_webinars_edit', 150, 'Webinars Edit'),
(154, 'admin_webinars_delete', 150, 'Webinars Delete'),
(155, 'admin_webinars_export_excel', 150, 'Feature webinars list'),
(156, 'admin_feature_webinars', 150, 'Feature webinars list'),
(157, 'admin_feature_webinars_create', 150, 'create feature webinar'),
(158, 'admin_feature_webinars_export_excel', 150, 'Feature webinar export excel'),
(200, 'admin_categories', NULL, 'Categories'),
(201, 'admin_categories_list', 200, 'Categories List'),
(202, 'admin_categories_create', 200, 'Categories Create'),
(203, 'admin_categories_edit', 200, 'Categories Edit'),
(204, 'admin_categories_delete', 200, 'Categories Delete'),
(205, 'admin_trending_categories', 200, 'Trends Categories List'),
(206, 'admin_create_trending_categories', 200, 'Create Trend Categories'),
(207, 'admin_edit_trending_categories', 200, 'Edit Trend Categories'),
(208, 'admin_delete_trending_categories', 200, 'Delete Trend Categories'),
(250, 'admin_tags', NULL, 'Tags'),
(251, 'admin_tags_list', 250, 'Tags List'),
(252, 'admin_tags_create', 250, 'Tags Create'),
(253, 'admin_tags_edit', 250, 'Tags Edit'),
(254, 'admin_tags_delete', 250, 'Tags Delete'),
(300, 'admin_filters', NULL, 'Filters'),
(301, 'admin_filters_list', 300, 'Filters List'),
(302, 'admin_filters_create', 300, 'Filters Create'),
(303, 'admin_filters_edit', 300, 'Filters Edit'),
(304, 'admin_filters_delete', 300, 'Filters Delete'),
(350, 'admin_quizzes', NULL, 'Quizzes'),
(351, 'admin_quizzes_list', 350, 'Quizzes List'),
(352, 'admin_quizzes_edit', 350, 'Quiz edit'),
(353, 'admin_quizzes_delete', 350, 'Quiz delete'),
(354, 'admin_quizzes_results', 350, 'Quizzes results'),
(355, 'admin_quizzes_results_delete', 350, 'Quizzes results delete'),
(356, 'admin_quizzes_lists_excel', 350, 'Quizzes export excel'),
(400, 'admin_quiz_result', NULL, 'Quiz Result'),
(401, 'admin_quiz_result_list', 400, 'Quiz Result List'),
(402, 'admin_quiz_result_create', 400, 'Quiz Result Create'),
(403, 'admin_quiz_result_edit', 400, 'Quiz Result Edit'),
(404, 'admin_quiz_result_delete', 400, 'Quiz Result Delete'),
(405, 'admin_quiz_result_export_excel', 400, 'quiz result export excel'),
(450, 'admin_certificate', NULL, 'Certificate'),
(451, 'admin_certificate_list', 450, 'Certificate List'),
(452, 'admin_certificate_create', 450, 'Certificate Create'),
(453, 'admin_certificate_edit', 450, 'Certificate Edit'),
(454, 'admin_certificate_delete', 450, 'Certificate Delete'),
(455, 'admin_certificate_template_list', 450, 'Certificate template lists'),
(456, 'admin_certificate_template_create', 450, 'Certificate template create'),
(457, 'admin_certificate_template_edit', 450, 'Certificate template edit'),
(458, 'admin_certificate_template_delete', 450, 'Certificate template delete'),
(459, 'admin_certificate_export_excel', 450, 'Certificates export excel'),
(500, 'admin_discount_codes', NULL, 'Discount codes'),
(501, 'admin_discount_codes_list', 500, 'Discount codes list'),
(502, 'admin_discount_codes_create', 500, 'Discount codes create'),
(503, 'admin_discount_codes_edit', 500, 'Discount codes edit'),
(504, 'admin_discount_codes_delete', 500, 'Discount codes delete'),
(505, 'admin_discount_codes_export', 500, 'Discount codes export excel'),
(550, 'admin_group', NULL, 'Groups'),
(551, 'admin_group_list', 550, 'Groups List'),
(552, 'admin_group_create', 550, 'Groups Create'),
(553, 'admin_group_edit', 550, 'Groups Edit'),
(554, 'admin_group_delete', 550, 'Groups Delete'),
(600, 'admin_payment_channel', NULL, 'Payment Channels'),
(601, 'admin_payment_channel_list', 600, 'Payment Channels List'),
(602, 'admin_payment_channel_toggle_status', 600, 'active or inactive channel'),
(603, 'admin_payment_channel_edit', 600, 'Payment Channels Edit'),
(650, 'admin_settings', NULL, 'settings'),
(651, 'admin_settings_general', 650, 'General settings'),
(652, 'admin_settings_financial', 650, 'Financial settings'),
(653, 'admin_settings_personalization', 650, 'Personalization settings'),
(654, 'admin_settings_notifications', 650, 'Notifications settings'),
(655, 'admin_settings_seo', 650, 'Seo settings'),
(656, 'admin_settings_customization', 650, 'Customization settings'),
(657, 'admin_settings_notifications', 650, 'Notifications settings'),
(658, 'admin_settings_home_sections', 650, 'Home sections settings'),
(700, 'admin_blog', NULL, 'Blog'),
(701, 'admin_blog_lists', 700, 'Blog lists'),
(702, 'admin_blog_create', 700, 'Blog create'),
(703, 'admin_blog_edit', 700, 'Blog edit'),
(704, 'admin_blog_delete', 700, 'Blog delete'),
(705, 'admin_blog_categories', 700, 'Blog categories list'),
(706, 'admin_blog_categories_create', 700, 'Blog categories create'),
(707, 'admin_blog_categories_edit', 700, 'Blog categories edit'),
(708, 'admin_blog_categories_delete', 700, 'Blog categories delete'),
(750, 'admin_sales', NULL, 'Sales'),
(751, 'admin_sales_list', 750, 'Sales List'),
(752, 'admin_sales_refund', 750, 'Sales Refund'),
(753, 'admin_sales_invoice', 750, 'Sales invoice'),
(754, 'admin_sales_export', 750, 'Sales Export Excel'),
(800, 'admin_documents', NULL, 'Balances'),
(801, 'admin_documents_list', 800, 'Balances List'),
(802, 'admin_documents_create', 800, 'Balances Create'),
(803, 'admin_documents_print', 800, 'Balances print'),
(850, 'admin_payouts', NULL, 'Payout'),
(851, 'admin_payouts_list', 850, 'Payout List'),
(852, 'admin_payouts_reject', 850, 'Payout Reject'),
(853, 'admin_payouts_payout', 850, 'Payout accept'),
(854, 'admin_payouts_export_excel', 850, 'Payout export excel'),
(900, 'admin_offline_payments', NULL, 'Offline Payments'),
(901, 'admin_offline_payments_list', 900, 'Offline Payments List'),
(902, 'admin_offline_payments_reject', 900, 'Offline Payments Reject'),
(903, 'admin_offline_payments_approved', 900, 'Offline Payments Approved'),
(904, 'admin_offline_payments_export_excel', 900, 'Offline Payments export excel'),
(950, 'admin_supports', NULL, 'Supports'),
(951, 'admin_supports_list', 950, 'Supports List'),
(952, 'admin_support_send', 950, 'Send Support'),
(953, 'admin_supports_reply', 950, 'Supports reply'),
(954, 'admin_supports_delete', 950, 'Supports delete'),
(955, 'admin_support_departments', 950, 'Support departments lists'),
(956, 'admin_support_department_create', 950, 'Create support department'),
(957, 'admin_support_departments_edit', 950, 'Edit support departments'),
(958, 'admin_support_departments_delete', 950, 'Delete support department'),
(959, 'admin_support_course_conversations', 950, 'Course conversations'),
(1000, 'admin_subscribe', NULL, 'Subscribes'),
(1001, 'admin_subscribe_list', 1000, 'Subscribes list'),
(1002, 'admin_subscribe_create', 1000, 'Subscribes create'),
(1003, 'admin_subscribe_edit', 1000, 'Subscribes edit'),
(1004, 'admin_subscribe_delete', 1000, 'Subscribes delete'),
(1050, 'admin_notifications', NULL, 'Notifications'),
(1051, 'admin_notifications_list', 1050, 'Notifications list'),
(1052, 'admin_notifications_send', 1050, 'Send Notifications'),
(1053, 'admin_notifications_edit', 1050, 'Edit and details Notifications'),
(1054, 'admin_notifications_delete', 1050, 'Delete Notifications'),
(1055, 'admin_notifications_markAllRead', 1050, 'Mark All Read Notifications'),
(1056, 'admin_notifications_templates', 1050, 'Notifications templates'),
(1057, 'admin_notifications_template_create', 1050, 'Create notification template'),
(1058, 'admin_notifications_template_edit', 1050, 'Edit notification template'),
(1059, 'admin_notifications_template_delete', 1050, 'Delete notification template'),
(1075, 'admin_noticeboards', NULL, 'Noticeboards'),
(1076, 'admin_noticeboards_list', 1075, 'Noticeboards list'),
(1077, 'admin_noticeboards_send', 1075, 'Send Noticeboards'),
(1078, 'admin_noticeboards_edit', 1075, 'Edit Noticeboards'),
(1079, 'admin_noticeboards_delete', 1075, 'Delete Noticeboards'),
(1100, 'admin_promotion', NULL, 'Promotions'),
(1101, 'admin_promotion_list', 1100, 'Promotions list'),
(1102, 'admin_promotion_create', 1100, 'Promotion create'),
(1103, 'admin_promotion_edit', 1100, 'Promotion edit'),
(1104, 'admin_promotion_delete', 1100, 'Promotion delete'),
(1150, 'admin_testimonials', NULL, 'testimonials'),
(1151, 'admin_testimonials_list', 1150, 'testimonials list'),
(1152, 'admin_testimonials_create', 1150, 'testimonials create'),
(1153, 'admin_testimonials_edit', 1150, 'testimonials edit'),
(1154, 'admin_testimonials_delete', 1150, 'testimonials delete'),
(1200, 'admin_advertising', NULL, 'advertising'),
(1201, 'admin_advertising_banners', 1200, 'advertising banners list'),
(1202, 'admin_advertising_banners_create', 1200, 'create advertising banner'),
(1203, 'admin_advertising_banners_edit', 1200, 'edit advertising banner'),
(1204, 'admin_advertising_banners_delete', 1200, 'delete advertising banner'),
(1230, 'admin_newsletters', NULL, 'Newsletters'),
(1231, 'admin_newsletters_lists', 1230, 'Newsletters lists'),
(1232, 'admin_newsletters_delete', 1230, 'Delete newsletters item'),
(1233, 'admin_newsletters_export_excel', 1230, 'Export excel newsletters item'),
(1250, 'admin_contacts', NULL, 'Contacts'),
(1251, 'admin_contacts_lists', 1250, 'Contacts lists'),
(1252, 'admin_contacts_reply', 1250, 'Contacts reply'),
(1253, 'admin_contacts_delete', 1250, 'Contacts delete'),
(1300, 'admin_product_discount', NULL, 'product discount'),
(1301, 'admin_product_discount_list', 1300, 'product discount list'),
(1302, 'admin_product_discount_create', 1300, 'create product discount'),
(1303, 'admin_product_discount_edit', 1300, 'edit product discount'),
(1304, 'admin_product_discount_delete', 1300, 'delete product discount'),
(1305, 'admin_product_discount_export', 1300, 'delete product export excel'),
(1350, 'admin_pages', NULL, 'pages'),
(1351, 'admin_pages_list', 1350, 'pages list'),
(1352, 'admin_pages_create', 1350, 'pages create'),
(1353, 'admin_pages_edit', 1350, 'pages edit'),
(1354, 'admin_pages_toggle', 1350, 'pages toggle publish/draft'),
(1355, 'admin_pages_delete', 1350, 'pages delete'),
(1400, 'admin_comments', NULL, 'Comments'),
(1401, 'admin_webinar_comments', 1400, 'Classes comments'),
(1402, 'admin_webinar_comments_edit', 1400, 'Classes comments edit'),
(1403, 'admin_webinar_comments_reply', 1400, 'Classes comments reply'),
(1404, 'admin_webinar_comments_delete', 1400, 'Classes comments delete'),
(1405, 'admin_webinar_comments_status', 1400, 'Classes comments status (active or pending)'),
(1406, 'admin_blog_comments', 1400, 'Blog comments'),
(1407, 'admin_blog_comments_edit', 1400, 'Blog comments edit'),
(1408, 'admin_blog_comments_reply', 1400, 'Blog comments reply'),
(1409, 'admin_blog_comments_delete', 1400, 'Blog comments delete'),
(1410, 'admin_blog_comments_status', 1400, 'Blog comments status (active or pending)'),
(1450, 'admin_reports', NULL, 'Reports'),
(1451, 'admin_webinar_reports', 1450, 'Classes reports'),
(1452, 'admin_webinar_comments_reports', 1450, 'Classes Comments reports'),
(1453, 'admin_webinar_reports_delete', 1450, 'Classes reports delete'),
(1454, 'admin_blog_comments_reports', 1450, 'Blog Comments reports'),
(1455, 'admin_report_reasons', 1450, 'Reports reasons'),
(1500, 'admin_additional_pages', NULL, 'Additional Pages'),
(1501, 'admin_additional_pages_404', 1500, '404 error page settings'),
(1502, 'admin_additional_pages_contact_us', 1500, 'Contact page settings'),
(1503, 'admin_additional_pages_footer', 1500, 'Footer settings'),
(1504, 'admin_additional_pages_navbar_links', 1500, 'Top Navbar links settings'),
(1550, 'admin_appointments', NULL, 'Appointments'),
(1551, 'admin_appointments_lists', 1550, 'Appointments lists'),
(1552, 'admin_appointments_join', 1550, 'Appointments join'),
(1553, 'admin_appointments_send_reminder', 1550, 'Appointments send reminder'),
(1554, 'admin_appointments_cancel', 1550, 'Appointments cancel'),
(1600, 'admin_reviews', NULL, 'Reviews'),
(1601, 'admin_reviews_lists', 1600, 'Reviews lists'),
(1602, 'admin_reviews_status_toggle', 1600, 'Reviews status toggle (publish or hidden)'),
(1603, 'admin_reviews_detail_show', 1600, 'Review details page'),
(1604, 'admin_reviews_delete', 1600, 'Review delete'),
(1650, 'admin_consultants', NULL, 'Consultants'),
(1651, 'admin_consultants_lists', 1650, 'Consultants lists'),
(1652, 'admin_consultants_export_excel', 1650, 'Consultants export excel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zoom_start_link` text COLLATE utf8mb4_unicode_ci,
  `session_api` enum('local','big_blue_button','zoom') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'local',
  `api_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moderator_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `session_reminds`
--

CREATE TABLE `session_reminds` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` enum('general','financial','personalization','notifications','seo','customization','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `page`, `name`, `value`, `updated_at`) VALUES
(1, 'seo', 'seo_metas', '{\"home\":{\"title\":\"Home\",\"description\":\"home page Description\",\"robot\":\"index\"},\"search\":{\"title\":\"Search\",\"description\":\"search page Description\",\"robot\":\"index\"},\"categories\":{\"title\":\"Category\",\"description\":\"categories page Description\",\"robot\":\"index\"},\"login\":{\"title\":\"Login\",\"description\":\"login page description\",\"robot\":\"index\"},\"register\":{\"title\":\"Register\",\"description\":\"register page Description\",\"robot\":\"index\"},\"about\":{\"title\":\"about page title\",\"description\":\"about page Description\"},\"contact\":{\"title\":\"Contact\",\"description\":\"contact page Description update\",\"robot\":\"index\"},\"certificate_validation\":{\"title\":\"Certificate Validation\",\"description\":\"Certificate validation description\",\"robot\":\"index\"},\"classes\":{\"title\":\"Classes\",\"description\":\"Classes page Description\",\"robot\":\"index\"},\"blog\":{\"title\":\"Blog\",\"description\":\"Blog page description\",\"robot\":\"index\"},\"instructors\":{\"title\":\"Instructors\",\"description\":\"instructors page Description\",\"robot\":\"index\"},\"organizations\":{\"title\":\"Organizations\",\"description\":\"Organizations page description\",\"robot\":\"index\"}}', 1625294079),
(2, 'general', 'socials', '{\"Instagram\":{\"title\":\"Instagram\",\"image\":\"\\/store\\/1\\/default_images\\/social\\/instagram.svg\",\"link\":\"https:\\/\\/www.instagram.com\\/\",\"order\":\"1\"},\"Whatsapp\":{\"title\":\"Whatsapp\",\"image\":\"\\/store\\/1\\/default_images\\/social\\/whatsapp.svg\",\"link\":\"https:\\/\\/web.whatsapp.com\\/\",\"order\":\"2\"},\"Twitter\":{\"title\":\"Twitter\",\"image\":\"\\/store\\/1\\/default_images\\/social\\/twitter.svg\",\"link\":\"https:\\/\\/twitter.com\\/\",\"order\":\"3\"},\"Linkedin\":{\"title\":\"Linkedin\",\"image\":\"\\/store\\/1\\/default_images\\/social\\/linkedin.svg\",\"link\":\"https:\\/\\/www.linkedin.com\\/\",\"order\":\"4\"},\"Facebook\":{\"title\":\"Facebook\",\"image\":\"\\/store\\/1\\/default_images\\/social\\/facebook.svg\",\"link\":\"https:\\/\\/www.facebook.com\\/\",\"order\":\"5\"}}', 1625301320),
(4, 'other', 'footer', '{\"second_column\":{\"title\":\"Links\",\"value\":\"<p><a href=\\\"\\/login\\\"><font color=\\\"#ffffff\\\">- Acceder<\\/font><\\/a><\\/p><p><font color=\\\"#ffffff\\\"><a href=\\\"\\/register\\\"><font color=\\\"#ffffff\\\">- Registrate<\\/font><\\/a><br><\\/font><\\/p><p><a href=\\\"\\/blog\\\"><font color=\\\"#ffffff\\\">- Blog<\\/font><\\/a><\\/p><p><a href=\\\"\\/contact\\\"><font color=\\\"#ffffff\\\">- Contacto<\\/font><\\/a><\\/p><p><font color=\\\"#ffffff\\\"><a href=\\\"\\/certificate_validation\\\"><font color=\\\"#ffffff\\\">- Validar Certificado<\\/font><\\/a><br><\\/font><\\/p><p><font color=\\\"#ffffff\\\"><a href=\\\"\\/become_instructor\\\"><font color=\\\"#ffffff\\\">- Ser Profesor<\\/font><\\/a><\\/font><\\/p><p><a href=\\\"\\/pages\\/about\\\"><font color=\\\"#ffffff\\\">- Quienes Somos<\\/font><\\/a><br><\\/p>\"},\"first_column\":{\"title\":\"Quienes Somos\",\"value\":\"<p><font color=\\\"#ffffff\\\">Kpacit es un sistema de gesti\\u00f3n de aprendizaje Online con todas las funciones que le ayudaran a dirigir su negocio de educaci\\u00f3n. Esta plataforma ayuda a los instructores\\/Empresas a crear materiales educativos profesionales y ayuda a los estudiantes a aprender de los mejores instructores.<\\/font><\\/p>\"},\"third_column\":{\"title\":\"Legal\",\"value\":\"<p><a href=\\\"#\\\" target=\\\"_blank\\\"><font color=\\\"#ffffff\\\">- Terminos &amp; Condiciones<\\/font><\\/a><\\/p><p><a href=\\\"#\\\" target=\\\"_blank\\\"><font color=\\\"#ffffff\\\">- Politica de Privacidad<\\/font><\\/a><\\/p><p><a href=\\\"#\\\" target=\\\"_blank\\\"><font color=\\\"#ffffff\\\">- Politica de Reembolso<\\/font><\\/a><\\/p><p><a href=\\\"#\\\" target=\\\"_blank\\\"><font color=\\\"#ffffff\\\">- Politica de Cookies<\\/font><\\/a><\\/p><p><a href=\\\"#\\\" target=\\\"_blank\\\"><font color=\\\"#ffffff\\\">- Mapa del sitio<\\/font><\\/a><\\/p><p><\\/p>\"},\"forth_column\":{\"title\":\"Apps Moviles\",\"value\":\"<p><img src=\\\"\\/store\\/1\\/_google-play-png-app-store-google-play.png\\\" style=\\\"width: 75%;\\\"><br><\\/p>\"}}', 1629721202),
(5, 'general', 'general', '{\"site_name\":\"Kpacit\",\"site_email\":\"info@kpacit.com\",\"site_phone\":\"+57 415-716-1\",\"site_language\":\"ES\",\"register_method\":\"mobile\",\"user_languages\":[\"EN\",\"ES\"],\"fav_icon\":\"\\/store\\/1\\/favicon60d8dddcb03b8.png\",\"logo\":\"\\/store\\/1\\/logo60d8ddbc6a69a.png\",\"footer_logo\":\"\\/store\\/1\\/logo-kpacit-footer.svg\",\"webinar_reminder_schedule\":\"1\",\"preloading\":\"1\",\"hero_section2\":\"1\"}', 1632739457),
(6, 'financial', 'financial', '{\"commission\":\"20\",\"tax\":\"19\",\"minimum_payout\":\"300000\",\"currency\":\"COP\"}', 1629654150),
(8, 'personalization', 'home_hero', '{\"title\":\"Kpacit - Sue\\u00f1a en grande...\",\"description\":\"Ambici\\u00f3n aceptada. Aprende las \\u00faltimas habilidades para alcanzar tus objetivos profesionales.  \\u00bfQu\\u00e9 quieres aprender?\",\"hero_background\":\"\\/store\\/1\\/default_images\\/hero_1.jpg\"}', 1629676866),
(12, 'customization', 'custom_css_js', '{\"css\":\".text-secondary {\\r\\n    color: #ee2354!important;\\r\\n}\\r\\n\\r\\n.btn-primary {\\r\\n    color: #fff;\\r\\n    background-color: #ff1e58;\\r\\n    box-shadow: 0 3px 6px 0 rgb(255 30 88 \\/ 30%);\\r\\n    transition: all .3s;\\r\\n    border-color: #ff1e58;\\r\\n}\\r\\n.bg-secondary {\\r\\n    background-color: #ef2354!important;\\r\\n}\\r\\n.navbar .nav-item .nav-link {\\r\\n    font-size: 17px;\\r\\n    text-align: center;\\r\\n    color: #343434;\\r\\n    font-weight: 600;\\r\\n}\\r\\n\\r\\n.stats-container .stats-item .stat-title {\\r\\n    font-size: 20px;\\r\\n    font-weight: 700;\\r\\n    line-height: 1.25;\\r\\n    color: #00d990;\\r\\n    pointer-events: none;\\r\\n}\\r\\n\\r\\n.stats-container .stats-item:hover {\\r\\n    transform: translateY(-25px);\\r\\n    background-color: #ee2354;\\r\\n    transition: all .5s ease;\\r\\n    box-shadow: 0 10px 40px 0 rgb(0 0 0 \\/ 20%);\\r\\n}\\r\\n.home-sections .section-title {\\r\\n    font-size: 35px;\\r\\n    font-weight: 700;\\r\\n    line-height: 1.5;\\r\\n    color: #00da91;\\r\\n    pointer-events: none;\\r\\n}\\r\\n.cart-banner {\\r\\n    width: 100%;\\r\\n    padding: 100px 0;\\r\\n    background-color: #F22354;\\r\\n}\",\"js\":null}', 1629764985),
(14, 'personalization', 'page_background', '{\"admin_login\":\"\\/store\\/1\\/default_images\\/admin_login.jpg\",\"admin_dashboard\":\"\\/store\\/1\\/default_images\\/admin_dashboard.jpg\",\"login\":\"\\/store\\/1\\/default_images\\/front_login.jpg\",\"register\":\"\\/store\\/1\\/default_images\\/front_register.jpg\",\"remember_pass\":\"\\/store\\/1\\/default_images\\/password_recovery.jpg\",\"verification\":\"\\/store\\/1\\/default_images\\/verification.jpg\",\"search\":\"\\/store\\/1\\/default_images\\/search_cover.png\",\"categories\":\"\\/store\\/1\\/default_images\\/category_cover.png\",\"become_instructor\":\"\\/store\\/1\\/default_images\\/become_instructor.jpg\",\"certificate_validation\":\"\\/store\\/1\\/default_images\\/certificate_validation.jpg\",\"blog\":\"\\/store\\/1\\/default_images\\/blogs_cover.png\",\"instructors\":\"\\/store\\/1\\/default_images\\/instructors_cover.png\",\"organizations\":\"\\/store\\/1\\/default_images\\/organizations_cover.png\",\"dashboard\":\"\\/store\\/1\\/dashboard.png\",\"user_avatar\":\"\\/store\\/1\\/default_images\\/default_profile.jpg\",\"user_cover\":\"\\/store\\/1\\/default_images\\/default_cover.jpg\"}', 1625988370),
(15, 'personalization', 'home_hero2', '{\"title\":\"Kpacit - Sue\\u00f1a en grande...\",\"description\":\"Ambici\\u00f3n aceptada. Aprende las \\u00faltimas habilidades para alcanzar tus objetivos profesionales.  \\u00bfQu\\u00e9 quieres aprender?\",\"hero_background\":\"\\/assets\\/default\\/img\\/home\\/world.png\",\"hero_vector\":\"\\/store\\/1\\/animated-header.json\",\"has_lottie\":\"1\"}', 1629652906),
(20, 'other', 'report_reasons', '{\"1\":\"Rude Content\",\"2\":\"Against Rules\",\"3\":\"Not Related\",\"4\":\"Spam\"}', 1625992126),
(22, 'notifications', 'notifications', '{\"new_comment_admin\":\"33\",\"support_message_admin\":\"10\",\"support_message_replied_admin\":\"11\",\"promotion_plan_admin\":\"29\",\"new_contact_message\":\"26\",\"new_badge\":\"2\",\"change_user_group\":\"3\",\"course_created\":\"4\",\"course_approve\":\"5\",\"course_reject\":\"6\",\"new_comment\":\"7\",\"support_message\":\"8\",\"support_message_replied\":\"9\",\"new_rating\":\"17\",\"webinar_reminder\":\"27\",\"new_financial_document\":\"12\",\"payout_request\":\"34\",\"payout_proceed\":\"14\",\"offline_payment_request\":\"18\",\"offline_payment_approved\":\"19\",\"offline_payment_rejected\":\"20\",\"new_sales\":\"15\",\"new_purchase\":\"16\",\"new_subscribe_plan\":\"21\",\"promotion_plan\":\"28\",\"new_appointment\":\"22\",\"new_appointment_link\":\"23\",\"appointment_reminder\":\"24\",\"meeting_finished\":\"25\",\"new_certificate\":\"30\",\"waiting_quiz\":\"31\",\"waiting_quiz_result\":\"32\",\"payout_request_admin\":\"13\"}', 1625551833),
(23, 'financial', 'site_bank_accounts', '{\"158\":{\"title\":\"Bancolombia\",\"image\":\"\\/store\\/1\\/2560px-Logo_Bancolombia.svg.png\",\"card_id\":\"Ahorros\",\"account_id\":\"Kpacit\",\"iban\":\"22222222222222\"}}', 1629672259),
(24, 'other', 'contact_us', '{\"background\":\"\\/assets\\/default\\/img\\/home\\/coures-banner.png\",\"latitude\":\"6.2068941\",\"longitude\":\"-75.5797054\",\"map_zoom\":\"16\",\"phones\":\"+57 707-750-1, +57 415-716-1, +57 415-716-1\",\"emails\":\"info@kpacit.com,finanzas@kpacit.com,hr@kpacit.com\",\"address\":\"Medellin, Antioquia\\r\\nColombia,\\r\\nSur America\"}', 1629653168),
(25, 'personalization', 'home_sections', '{\"best_sellers\":\"1\",\"free_classes\":\"1\",\"discount_classes\":\"1\",\"best_rates\":\"1\",\"trend_categories\":\"1\",\"testimonials\":\"1\",\"blog\":\"1\",\"instructors\":\"1\"}', 1629676848),
(26, 'other', 'navbar_links', '{\"Home\":{\"title\":\"Inicio\",\"link\":\"\\/\",\"order\":\"1\"},\"About_Us\":{\"title\":\"Profesores\",\"link\":\"\\/instructors\",\"order\":\"3\"},\"Contact\":{\"title\":\"Contacto\",\"link\":\"\\/contact\",\"order\":\"6\"},\"Blog\":{\"title\":\"Blog\",\"link\":\"\\/blog\",\"order\":\"5\"},\"Classes\":{\"title\":\"Cursos\",\"link\":\"\\/classes?sort=newest\",\"order\":\"2\"}}', 1629675241),
(27, 'personalization', 'home_video_or_image_box', '{\"link\":\"\\/classes\",\"title\":\"Kpacit - Sue\\u00f1a en grande...\",\"description\":\"Ambici\\u00f3n aceptada. Aprende las \\u00faltimas habilidades para alcanzar tus objetivos profesionales.  \\u00bfQu\\u00e9 quieres aprender?\",\"background\":\"\\/store\\/1\\/default_images\\/home_video_section.png\"}', 1629676876),
(28, 'other', '404', '{\"error_image\":\"\\/store\\/1\\/default_images\\/404.svg\",\"error_title\":\"404 - Lo Sentimos!\",\"error_description\":\"El enlace seleccionado no existe o podr\\u00eda haber ser eliminado. Pruebe con un enlace v\\u00e1lido.\"}', 1629653236),
(29, 'personalization', 'panel_sidebar', '{\"link\":\"\\/classes?sort=newest\",\"background\":\"\\/store\\/1\\/sidebar-user.png\"}', 1628536185);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `special_offers`
--

CREATE TABLE `special_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` int(10) UNSIGNED NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `from_date` int(10) UNSIGNED NOT NULL,
  `to_date` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscribes`
--

CREATE TABLE `subscribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usable_count` int(10) UNSIGNED NOT NULL,
  `days` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `subscribes`
--

INSERT INTO `subscribes` (`id`, `title`, `usable_count`, `days`, `price`, `icon`, `description`, `is_popular`, `created_at`) VALUES
(3, 'Bronze', 100, 15, 20, '/assets/default/img/icons/cup.png', 'Suggested for personal usage', 0, 1625519780),
(4, 'Gold', 1000, 30, 100, '/store/1/default_images/subscribe_packages/gold.svg', 'Suggested for big businesses', 1, 1625519568),
(5, 'Silver', 400, 30, 50, '/store/1/default_images/subscribe_packages/silver.svg', 'Suggested for small businesses', 0, 1625519652);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscribe_uses`
--

CREATE TABLE `subscribe_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subscribe_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `sale_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supports`
--

CREATE TABLE `supports` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('open','close','replied','supporter_replied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `support_conversations`
--

CREATE TABLE `support_conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `support_id` int(10) UNSIGNED NOT NULL,
  `supporter_id` int(10) UNSIGNED DEFAULT NULL,
  `sender_id` int(10) UNSIGNED DEFAULT NULL,
  `attach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `support_departments`
--

CREATE TABLE `support_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `support_departments`
--

INSERT INTO `support_departments` (`id`, `title`, `created_at`) VALUES
(2, 'Financial', 1616404842),
(3, 'Content', 1626249560),
(4, 'Marketing', 1626249572);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_name`, `user_avatar`, `user_bio`, `rate`, `comment`, `status`, `created_at`) VALUES
(2, 'Mateo Lora', '/store/1/default_images/testimonials/profile_picture (28).jpg', 'Panaderia', '5', '\"Curso de panaderia rapida, Excelente, Kpacit excelente plataforma.\"', 'active', 1606841889),
(3, 'Laura Vega', '/store/1/default_images/testimonials/profile_picture (50).jpg', 'Marketing Digital', '5', '\"Adpatable, Rapida, Simple - Ideal para aprender\"', 'active', 1606841910),
(4, 'Natasha Castro', '/store/1/default_images/testimonials/profile_picture (38).jpg', 'Florista', '4', '\"Cursos de acceso al trabajo, cortos, simples y con profesores calificados.\"', 'active', 1606841929),
(5, 'Carlos Rojas', '/store/1/default_images/testimonials/profile_picture (20).jpg', 'Diseñador', '5', '\"El profesor atento, rapido, util y excelente nivel educativo, lo recomiendo.\"', 'active', 1606841946),
(6, 'David Lopez', '/store/1/default_images/testimonials/profile_picture (52).jpg', 'Pintor', '5', '\"Cursos cortos y simples de entender para incluso los mas viejos\"', 'active', 1606842000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `text_lessons`
--

CREATE TABLE `text_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study_time` int(10) UNSIGNED DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessibility` enum('free','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  `order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `text_lessons_attachments`
--

CREATE TABLE `text_lessons_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text_lesson_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` int(10) UNSIGNED DEFAULT NULL,
  `end_date` int(10) UNSIGNED DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_users`
--

CREATE TABLE `ticket_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trend_categories`
--

CREATE TABLE `trend_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `organ_id` int(11) DEFAULT NULL,
  `mobile` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `financial_approval` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_img` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','pending','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `public_message` tinyint(1) NOT NULL DEFAULT '0',
  `account_type` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_scan` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` int(10) UNSIGNED DEFAULT NULL,
  `ban` tinyint(1) NOT NULL DEFAULT '0',
  `ban_start_at` int(10) UNSIGNED DEFAULT NULL,
  `ban_end_at` int(10) UNSIGNED DEFAULT NULL,
  `offline` tinyint(1) NOT NULL DEFAULT '0',
  `offline_message` text COLLATE utf8mb4_unicode_ci,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `full_name`, `role_name`, `role_id`, `organ_id`, `mobile`, `email`, `bio`, `password`, `google_id`, `facebook_id`, `remember_token`, `verified`, `financial_approval`, `avatar`, `cover_img`, `headline`, `about`, `address`, `status`, `language`, `newsletter`, `public_message`, `account_type`, `iban`, `account_id`, `identity_scan`, `certificate`, `commission`, `ban`, `ban_start_at`, `ban_end_at`, `offline`, `offline_message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin', 2, NULL, '00000000', 'admin@kpacit.com', 'Kpacit2020*', '$2y$10$tvYgAeJU4MDS10rk3jHe5OHyuGkGLpSPX7jONhYGGBD7TP6GmkXWO', NULL, NULL, 'QL0BNIyOBlwxM5ypB6yMkNlkuk8qYqnSs3ur6lq09q3oM1fxH1SlG04CSO3e', 1, 0, 'default_images/logo-new.jpg', NULL, NULL, NULL, NULL, 'active', 'ES', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, 1597826952, 1597826952, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_badges`
--

CREATE TABLE `users_badges` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `badge_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_metas`
--

CREATE TABLE `users_metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `users_metas`
--

INSERT INTO `users_metas` (`id`, `user_id`, `name`, `value`) VALUES
(21, 1016, 'education', 'BS in Mechanical Engineering from Santa Clara University'),
(22, 1016, 'education', 'MS in Mechanical Engineering from Santa Clara University'),
(23, 1016, 'experience', 'professional instructor and trainer for Data Science and programming'),
(24, 1016, 'experience', 'Head of Data Science for Pierian Data Inc'),
(25, 1015, 'experience', 'supporting proprietary Unix operating systems including AIX, HP-UX, and Solaris.'),
(26, 1015, 'experience', '10 years of experience working with Linux systems'),
(27, 1015, 'education', 'Red Hat Certified Engineer (RHCE)'),
(28, 1015, 'education', 'AWS Certified DevOps Engineer - Professional'),
(29, 1015, 'education', 'Linux Foundation Certified System Administrator'),
(30, 929, 'experience', 'Director at Cisco Systems 2015 - 2021'),
(31, 929, 'experience', 'research assistant at Harvard University 2010 - 2019'),
(32, 929, 'experience', 'Amazon bestselling author'),
(33, 923, 'experience', 'marketing strategies at Microlab 2010-2015'),
(34, 923, 'education', 'Associate of Business Administration from Imperial College London'),
(35, 923, 'education', 'Bachelor of International Business Economics from University of Cambridge'),
(36, 923, 'education', 'Master of Business Administration from King\'s College London'),
(37, 3, 'experience', 'Five-time TED speaker'),
(38, 3, 'education', 'Associate of Applied Business from Stanford University'),
(39, 3, 'education', 'Bachelor of Science in Business from Harvard University'),
(40, 3, 'education', 'Master of Computational Finance from University of Chicago'),
(41, 870, 'education', 'Associate in Physical Therapy from University of British Columbia'),
(42, 870, 'education', 'Bachelor of Arts in Psychology from Duke University'),
(43, 870, 'education', 'Master of Public Health from Cornell University'),
(44, 929, 'education', 'Associate of Applied Business from University of Leeds'),
(45, 929, 'education', 'Bachelor of Management and Organizational Studies from University of Sheffield'),
(46, 929, 'education', 'Master of Management from Durham University'),
(47, 934, 'education', 'Bachelor of Science in Information Technology from University of Glasgow'),
(48, 934, 'education', 'Master of Science in Information Systems (MSIS) from Delft University of Technology'),
(49, 934, 'experience', 'Web Developer at Uber 2015 - 2018'),
(50, 1015, 'education', 'Master of Science in Information Systems (MSIS) from University of Sydney'),
(51, 1031, 'education', 'Economista'),
(52, 1031, 'experience', 'Oficial de cumplimiento Ecoondas 2020-2021'),
(53, 1041, 'education', 'Ing Quimico'),
(54, 1041, 'experience', '10 años de experiencia en el area de ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_occupations`
--

CREATE TABLE `users_occupations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_zoom_api`
--

CREATE TABLE `users_zoom_api` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jwt_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verifications`
--

CREATE TABLE `verifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `mobile` char(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_at` int(10) UNSIGNED DEFAULT NULL,
  `expired_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webinars`
--

CREATE TABLE `webinars` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('webinar','course','text_lesson') COLLATE utf8mb4_unicode_ci NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` int(11) DEFAULT NULL,
  `duration` int(10) UNSIGNED DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_demo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int(10) UNSIGNED DEFAULT NULL,
  `price` decimal(13,2) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `support` tinyint(1) DEFAULT '0',
  `downloadable` tinyint(1) DEFAULT '0',
  `partner_instructor` tinyint(1) DEFAULT '0',
  `subscribe` tinyint(1) DEFAULT '0',
  `message_for_reviewer` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','pending','is_draft','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webinar_filter_option`
--

CREATE TABLE `webinar_filter_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `filter_option_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webinar_partner_teacher`
--

CREATE TABLE `webinar_partner_teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webinar_reports`
--

CREATE TABLE `webinar_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webinar_reviews`
--

CREATE TABLE `webinar_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `webinar_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `content_quality` int(10) UNSIGNED NOT NULL,
  `instructor_skills` int(10) UNSIGNED NOT NULL,
  `purchase_worth` int(10) UNSIGNED NOT NULL,
  `support_quality` int(10) UNSIGNED NOT NULL,
  `rates` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','active') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `accounting_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `accounting_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `accounting_meeting_time_id_foreign` (`meeting_time_id`) USING BTREE,
  ADD KEY `accounting_promotion_id_foreign` (`promotion_id`) USING BTREE;

--
-- Indices de la tabla `advertising_banners`
--
ALTER TABLE `advertising_banners`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `badges_type_index` (`type`) USING BTREE;

--
-- Indices de la tabla `become_instructors`
--
ALTER TABLE `become_instructors`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `become_instructors_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `blog_category_id_foreign` (`category_id`) USING BTREE;

--
-- Indices de la tabla `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `cart_creator_id_foreign` (`creator_id`) USING BTREE,
  ADD KEY `cart_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `cart_ticket_id_foreign` (`ticket_id`) USING BTREE,
  ADD KEY `cart_reserve_meeting_id_foreign` (`reserve_meeting_id`) USING BTREE,
  ADD KEY `cart_subscribe_id_foreign` (`subscribe_id`) USING BTREE,
  ADD KEY `cart_promotion_id_foreign` (`promotion_id`) USING BTREE,
  ADD KEY `cart_special_offer_id_foreign` (`special_offer_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `parent_id` (`parent_id`) USING BTREE;

--
-- Indices de la tabla `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `certificates_quiz_id_foreign` (`quiz_id`) USING BTREE,
  ADD KEY `certificates_quiz_result_id_foreign` (`quiz_result_id`) USING BTREE,
  ADD KEY `certificates_student_id_foreign` (`student_id`) USING BTREE;

--
-- Indices de la tabla `certificates_templates`
--
ALTER TABLE `certificates_templates`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `comments_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `comments_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `comments_review_id_foreign` (`review_id`) USING BTREE,
  ADD KEY `comments_reply_id_foreign` (`reply_id`) USING BTREE;

--
-- Indices de la tabla `comments_reports`
--
ALTER TABLE `comments_reports`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `comments_reports_comment_id_foreign` (`comment_id`) USING BTREE;

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `course_learning`
--
ALTER TABLE `course_learning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_learning_user_id_foreign` (`user_id`),
  ADD KEY `course_learning_text_lesson_id_foreign` (`text_lesson_id`),
  ADD KEY `course_learning_file_id_foreign` (`file_id`),
  ADD KEY `course_learning_session_id_foreign` (`session_id`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `discounts_code_unique` (`code`),
  ADD KEY `discounts_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `discount_users`
--
ALTER TABLE `discount_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `discount_users_discount_id_foreign` (`discount_id`) USING BTREE,
  ADD KEY `discount_users_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `faqs_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `faqs_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `favorites_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `favorites_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `feature_webinars`
--
ALTER TABLE `feature_webinars`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `feature_webinars_webinar_id_index` (`webinar_id`) USING BTREE;

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `files_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `files_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `filters_category_id_foreign` (`category_id`) USING BTREE;

--
-- Indices de la tabla `filter_options`
--
ALTER TABLE `filter_options`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `filter_options_filter_id_foreign` (`filter_id`) USING BTREE;

--
-- Indices de la tabla `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `follows_follower_foreign` (`follower`) USING BTREE,
  ADD KEY `follows_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `groups_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `group_users_group_id_foreign` (`group_id`) USING BTREE,
  ADD KEY `group_users_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `meetings_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `meeting_times`
--
ALTER TABLE `meeting_times`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `meeting_times_meeting_id_foreign` (`meeting_id`) USING BTREE;

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticeboards`
--
ALTER TABLE `noticeboards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticeboards_organ_id_foreign` (`organ_id`),
  ADD KEY `noticeboards_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `noticeboards_status`
--
ALTER TABLE `noticeboards_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticeboards_status_noticeboard_id_foreign` (`noticeboard_id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `notifications_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `notifications_group_id_foreign` (`group_id`) USING BTREE;

--
-- Indices de la tabla `notifications_status`
--
ALTER TABLE `notifications_status`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `notifications_status_notification_id_foreign` (`notification_id`) USING BTREE;

--
-- Indices de la tabla `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `offline_payments_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `orders_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `order_items_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `order_items_order_id_foreign` (`order_id`) USING BTREE,
  ADD KEY `order_items_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `order_items_ticket_id_foreign` (`ticket_id`) USING BTREE,
  ADD KEY `order_items_reserve_meeting_id_foreign` (`reserve_meeting_id`) USING BTREE,
  ADD KEY `order_items_subscribe_id_foreign` (`subscribe_id`) USING BTREE,
  ADD KEY `order_items_promotion_id_foreign` (`promotion_id`) USING BTREE;

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_link_unique` (`link`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indices de la tabla `payment_channels`
--
ALTER TABLE `payment_channels`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `payouts_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `payu_transactions`
--
ALTER TABLE `payu_transactions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `payu_transactions_transaction_id_unique` (`transaction_id`) USING BTREE,
  ADD KEY `payu_transactions_status_index` (`status`) USING BTREE,
  ADD KEY `payu_transactions_verified_at_index` (`verified_at`) USING BTREE;

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `permissions_role_id_index` (`role_id`) USING BTREE,
  ADD KEY `permissions_section_id_index` (`section_id`) USING BTREE;

--
-- Indices de la tabla `prerequisites`
--
ALTER TABLE `prerequisites`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `prerequisites_webinar_id_foreign` (`webinar_id`) USING BTREE;

--
-- Indices de la tabla `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `purchases_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `purchases_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `quizzes_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `quizzes_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `quizzes_questions`
--
ALTER TABLE `quizzes_questions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `quizzes_questions_quiz_id_foreign` (`quiz_id`) USING BTREE,
  ADD KEY `quizzes_questions_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `quizzes_questions_answers`
--
ALTER TABLE `quizzes_questions_answers`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `quizzes_questions_answers_question_id_foreign` (`question_id`) USING BTREE,
  ADD KEY `quizzes_questions_answers_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `quizzes_results`
--
ALTER TABLE `quizzes_results`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `quizzes_results_quiz_id_foreign` (`quiz_id`) USING BTREE,
  ADD KEY `quizzes_results_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `rating_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `rating_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `rating_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `reserve_meetings`
--
ALTER TABLE `reserve_meetings`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `reserve_meetings_meeting_time_id_foreign` (`meeting_time_id`) USING BTREE,
  ADD KEY `reserve_meetings_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `reserve_meetings_sale_id_foreign` (`sale_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sales_order_id_foreign` (`order_id`) USING BTREE,
  ADD KEY `sales_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `sales_meeting_id_foreign` (`meeting_id`) USING BTREE,
  ADD KEY `sales_ticket_id_foreign` (`ticket_id`) USING BTREE,
  ADD KEY `sales_buyer_id_foreign` (`buyer_id`) USING BTREE,
  ADD KEY `sales_seller_id_foreign` (`seller_id`) USING BTREE,
  ADD KEY `sales_promotion_id_foreign` (`promotion_id`) USING BTREE;

--
-- Indices de la tabla `sales_log`
--
ALTER TABLE `sales_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_status_sale_id_foreign` (`sale_id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sessions_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `sessions_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `session_reminds`
--
ALTER TABLE `session_reminds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_reminds_session_id_foreign` (`session_id`),
  ADD KEY `session_reminds_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `name` (`name`) USING BTREE;

--
-- Indices de la tabla `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `special_offers_creator_id_foreign` (`creator_id`) USING BTREE,
  ADD KEY `special_offers_webinar_id_foreign` (`webinar_id`) USING BTREE;

--
-- Indices de la tabla `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `subscribe_uses`
--
ALTER TABLE `subscribe_uses`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `subscribe_uses_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `subscribe_uses_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `subscribe_uses_subscribe_id_foreign` (`subscribe_id`) USING BTREE,
  ADD KEY `subscribe_uses_sale_id_foreign` (`sale_id`) USING BTREE;

--
-- Indices de la tabla `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `supports_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `supports_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `supports_department_id_foreign` (`department_id`) USING BTREE;

--
-- Indices de la tabla `support_conversations`
--
ALTER TABLE `support_conversations`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `support_conversations_support_id_foreign` (`support_id`) USING BTREE,
  ADD KEY `support_conversations_sender_id_foreign` (`sender_id`) USING BTREE,
  ADD KEY `support_conversations_supporter_id_foreign` (`supporter_id`) USING BTREE;

--
-- Indices de la tabla `support_departments`
--
ALTER TABLE `support_departments`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `tags_webinar_id_foreign` (`webinar_id`) USING BTREE;

--
-- Indices de la tabla `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `text_lessons`
--
ALTER TABLE `text_lessons`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `text_lessons_creator_id_foreign` (`creator_id`) USING BTREE,
  ADD KEY `text_lessons_webinar_id_foreign` (`webinar_id`) USING BTREE;

--
-- Indices de la tabla `text_lessons_attachments`
--
ALTER TABLE `text_lessons_attachments`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `text_lessons_attachments_text_lesson_id_foreign` (`text_lesson_id`) USING BTREE,
  ADD KEY `text_lessons_attachments_file_id_foreign` (`file_id`) USING BTREE;

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `tickets_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `tickets_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `ticket_users`
--
ALTER TABLE `ticket_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ticket_users_ticket_id_foreign` (`ticket_id`) USING BTREE,
  ADD KEY `ticket_users_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `trend_categories`
--
ALTER TABLE `trend_categories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `trend_categories_category_id_index` (`category_id`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`) USING BTREE;

--
-- Indices de la tabla `users_badges`
--
ALTER TABLE `users_badges`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `users_badges_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `users_badges_badge_id_foreign` (`badge_id`) USING BTREE;

--
-- Indices de la tabla `users_metas`
--
ALTER TABLE `users_metas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `users_occupations`
--
ALTER TABLE `users_occupations`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `users_occupations_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `users_occupations_category_id_foreign` (`category_id`) USING BTREE;

--
-- Indices de la tabla `users_zoom_api`
--
ALTER TABLE `users_zoom_api`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_zoom_api_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `verifications_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indices de la tabla `webinars`
--
ALTER TABLE `webinars`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `webinars_slug_unique` (`slug`) USING BTREE,
  ADD KEY `webinars_teacher_id_foreign` (`teacher_id`) USING BTREE,
  ADD KEY `webinars_category_id_foreign` (`category_id`) USING BTREE,
  ADD KEY `webinars_slug_index` (`slug`) USING BTREE,
  ADD KEY `webinars_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- Indices de la tabla `webinar_filter_option`
--
ALTER TABLE `webinar_filter_option`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `webinar_filter_option_filter_option_id_foreign` (`filter_option_id`) USING BTREE,
  ADD KEY `webinar_filter_option_webinar_id_foreign` (`webinar_id`) USING BTREE;

--
-- Indices de la tabla `webinar_partner_teacher`
--
ALTER TABLE `webinar_partner_teacher`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `webinar_partner_teacher_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `webinar_partner_teacher_teacher_id_foreign` (`teacher_id`) USING BTREE;

--
-- Indices de la tabla `webinar_reports`
--
ALTER TABLE `webinar_reports`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `webinar_reports_webinar_id_foreign` (`webinar_id`) USING BTREE;

--
-- Indices de la tabla `webinar_reviews`
--
ALTER TABLE `webinar_reviews`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `webinar_reviews_webinar_id_foreign` (`webinar_id`) USING BTREE,
  ADD KEY `webinar_reviews_creator_id_foreign` (`creator_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounting`
--
ALTER TABLE `accounting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `advertising_banners`
--
ALTER TABLE `advertising_banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `become_instructors`
--
ALTER TABLE `become_instructors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `certificates_templates`
--
ALTER TABLE `certificates_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comments_reports`
--
ALTER TABLE `comments_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `course_learning`
--
ALTER TABLE `course_learning`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `discount_users`
--
ALTER TABLE `discount_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `feature_webinars`
--
ALTER TABLE `feature_webinars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `filter_options`
--
ALTER TABLE `filter_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `group_users`
--
ALTER TABLE `group_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `meeting_times`
--
ALTER TABLE `meeting_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `noticeboards`
--
ALTER TABLE `noticeboards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `noticeboards_status`
--
ALTER TABLE `noticeboards_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1681;

--
-- AUTO_INCREMENT de la tabla `notifications_status`
--
ALTER TABLE `notifications_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `offline_payments`
--
ALTER TABLE `offline_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `payment_channels`
--
ALTER TABLE `payment_channels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payu_transactions`
--
ALTER TABLE `payu_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5602;

--
-- AUTO_INCREMENT de la tabla `prerequisites`
--
ALTER TABLE `prerequisites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quizzes_questions`
--
ALTER TABLE `quizzes_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quizzes_questions_answers`
--
ALTER TABLE `quizzes_questions_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quizzes_results`
--
ALTER TABLE `quizzes_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserve_meetings`
--
ALTER TABLE `reserve_meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales_log`
--
ALTER TABLE `sales_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1653;

--
-- AUTO_INCREMENT de la tabla `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `session_reminds`
--
ALTER TABLE `session_reminds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subscribe_uses`
--
ALTER TABLE `subscribe_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `support_conversations`
--
ALTER TABLE `support_conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `support_departments`
--
ALTER TABLE `support_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `text_lessons`
--
ALTER TABLE `text_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `text_lessons_attachments`
--
ALTER TABLE `text_lessons_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket_users`
--
ALTER TABLE `ticket_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trend_categories`
--
ALTER TABLE `trend_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users_badges`
--
ALTER TABLE `users_badges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_metas`
--
ALTER TABLE `users_metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `users_occupations`
--
ALTER TABLE `users_occupations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_zoom_api`
--
ALTER TABLE `users_zoom_api`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webinars`
--
ALTER TABLE `webinars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webinar_filter_option`
--
ALTER TABLE `webinar_filter_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webinar_partner_teacher`
--
ALTER TABLE `webinar_partner_teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webinar_reports`
--
ALTER TABLE `webinar_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webinar_reviews`
--
ALTER TABLE `webinar_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accounting`
--
ALTER TABLE `accounting`
  ADD CONSTRAINT `accounting_meeting_time_id_foreign` FOREIGN KEY (`meeting_time_id`) REFERENCES `meeting_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accounting_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accounting_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accounting_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `become_instructors`
--
ALTER TABLE `become_instructors`
  ADD CONSTRAINT `become_instructors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_reserve_meeting_id_foreign` FOREIGN KEY (`reserve_meeting_id`) REFERENCES `reserve_meetings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_special_offer_id_foreign` FOREIGN KEY (`special_offer_id`) REFERENCES `special_offers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_subscribe_id_foreign` FOREIGN KEY (`subscribe_id`) REFERENCES `subscribes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_quiz_result_id_foreign` FOREIGN KEY (`quiz_result_id`) REFERENCES `quizzes_results` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_reply_id_foreign` FOREIGN KEY (`reply_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `webinar_reviews` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comments_reports`
--
ALTER TABLE `comments_reports`
  ADD CONSTRAINT `comments_reports_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `course_learning`
--
ALTER TABLE `course_learning`
  ADD CONSTRAINT `course_learning_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_learning_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_learning_text_lesson_id_foreign` FOREIGN KEY (`text_lesson_id`) REFERENCES `text_lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_learning_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `discount_users`
--
ALTER TABLE `discount_users`
  ADD CONSTRAINT `discount_users_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discount_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faqs_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `feature_webinars`
--
ALTER TABLE `feature_webinars`
  ADD CONSTRAINT `feature_webinars_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `files_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `filters`
--
ALTER TABLE `filters`
  ADD CONSTRAINT `filters_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `filter_options`
--
ALTER TABLE `filter_options`
  ADD CONSTRAINT `filter_options_filter_id_foreign` FOREIGN KEY (`filter_id`) REFERENCES `filters` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_follower_foreign` FOREIGN KEY (`follower`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `group_users`
--
ALTER TABLE `group_users`
  ADD CONSTRAINT `group_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `meeting_times`
--
ALTER TABLE `meeting_times`
  ADD CONSTRAINT `meeting_times_meeting_id_foreign` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticeboards`
--
ALTER TABLE `noticeboards`
  ADD CONSTRAINT `noticeboards_organ_id_foreign` FOREIGN KEY (`organ_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `noticeboards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticeboards_status`
--
ALTER TABLE `noticeboards_status`
  ADD CONSTRAINT `noticeboards_status_noticeboard_id_foreign` FOREIGN KEY (`noticeboard_id`) REFERENCES `noticeboards` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notifications_status`
--
ALTER TABLE `notifications_status`
  ADD CONSTRAINT `notifications_status_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD CONSTRAINT `offline_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_reserve_meeting_id_foreign` FOREIGN KEY (`reserve_meeting_id`) REFERENCES `reserve_meetings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_subscribe_id_foreign` FOREIGN KEY (`subscribe_id`) REFERENCES `subscribes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payouts`
--
ALTER TABLE `payouts`
  ADD CONSTRAINT `payouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Filtros para la tabla `prerequisites`
--
ALTER TABLE `prerequisites`
  ADD CONSTRAINT `prerequisites_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `quizzes_questions`
--
ALTER TABLE `quizzes_questions`
  ADD CONSTRAINT `quizzes_questions_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `quizzes_questions_answers`
--
ALTER TABLE `quizzes_questions_answers`
  ADD CONSTRAINT `quizzes_questions_answers_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_questions_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `quizzes_questions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `quizzes_results`
--
ALTER TABLE `quizzes_results`
  ADD CONSTRAINT `quizzes_results_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reserve_meetings`
--
ALTER TABLE `reserve_meetings`
  ADD CONSTRAINT `reserve_meetings_meeting_time_id_foreign` FOREIGN KEY (`meeting_time_id`) REFERENCES `meeting_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_meetings_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_meetings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_meeting_id_foreign` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sales_log`
--
ALTER TABLE `sales_log`
  ADD CONSTRAINT `sales_status_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sessions_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `session_reminds`
--
ALTER TABLE `session_reminds`
  ADD CONSTRAINT `session_reminds_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `session_reminds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `special_offers`
--
ALTER TABLE `special_offers`
  ADD CONSTRAINT `special_offers_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `special_offers_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `subscribe_uses`
--
ALTER TABLE `subscribe_uses`
  ADD CONSTRAINT `subscribe_uses_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribe_uses_subscribe_id_foreign` FOREIGN KEY (`subscribe_id`) REFERENCES `subscribes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribe_uses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribe_uses_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `supports`
--
ALTER TABLE `supports`
  ADD CONSTRAINT `supports_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `support_departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supports_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `support_conversations`
--
ALTER TABLE `support_conversations`
  ADD CONSTRAINT `support_conversations_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `support_conversations_support_id_foreign` FOREIGN KEY (`support_id`) REFERENCES `supports` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `text_lessons`
--
ALTER TABLE `text_lessons`
  ADD CONSTRAINT `text_lessons_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `text_lessons_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `text_lessons_attachments`
--
ALTER TABLE `text_lessons_attachments`
  ADD CONSTRAINT `text_lessons_attachments_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `text_lessons_attachments_text_lesson_id_foreign` FOREIGN KEY (`text_lesson_id`) REFERENCES `text_lessons` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ticket_users`
--
ALTER TABLE `ticket_users`
  ADD CONSTRAINT `ticket_users_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `trend_categories`
--
ALTER TABLE `trend_categories`
  ADD CONSTRAINT `trend_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users_badges`
--
ALTER TABLE `users_badges`
  ADD CONSTRAINT `users_badges_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_badges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users_occupations`
--
ALTER TABLE `users_occupations`
  ADD CONSTRAINT `users_occupations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_occupations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users_zoom_api`
--
ALTER TABLE `users_zoom_api`
  ADD CONSTRAINT `users_zoom_api_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `verifications`
--
ALTER TABLE `verifications`
  ADD CONSTRAINT `verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `webinars`
--
ALTER TABLE `webinars`
  ADD CONSTRAINT `webinars_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `webinars_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `webinars_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `webinar_filter_option`
--
ALTER TABLE `webinar_filter_option`
  ADD CONSTRAINT `webinar_filter_option_filter_option_id_foreign` FOREIGN KEY (`filter_option_id`) REFERENCES `filter_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `webinar_filter_option_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `webinar_partner_teacher`
--
ALTER TABLE `webinar_partner_teacher`
  ADD CONSTRAINT `webinar_partner_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `webinar_partner_teacher_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `webinar_reports`
--
ALTER TABLE `webinar_reports`
  ADD CONSTRAINT `webinar_reports_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `webinar_reviews`
--
ALTER TABLE `webinar_reviews`
  ADD CONSTRAINT `webinar_reviews_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `webinar_reviews_webinar_id_foreign` FOREIGN KEY (`webinar_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
