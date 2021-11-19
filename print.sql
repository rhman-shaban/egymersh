-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2021 at 12:45 AM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.3.30-1+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `print`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `content_ar`, `content_en`, `created_at`, `updated_at`) VALUES
(1, '<p style=\"text-align: center;\"><strong><img src=\"https://via.placeholder.com/300.png/09f/fff  C/O https://placeholder.com/\" alt=\"\" width=\"300\" height=\"300\" /></strong></p>\r\n<p style=\"text-align: center;\"><strong>وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم. </strong></p>', '<p style=\"text-align: center;\"><strong>Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Architecto obcaecati sit maiores a placeat laborum minus aut qui officiis, nisi in officia error omnis eligendi consequuntur, eveniet recusandae similique repudiandae.</strong></p>', NULL, '2021-09-10 21:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `image`, `admin_id`, `active`, `created_at`, `updated_at`) VALUES
(2, 'ahmed', 'ahmed sami', NULL, '$2y$10$gehILwwIcr4cZxddUmhvIuy3kl4jZ1Q5xeg6aHwjlFmGsnMkoVzIC', NULL, 2, 1, '2021-08-28 19:42:49', '2021-08-28 19:42:49'),
(4, 'ahmed sami', 'ahmed samy', NULL, '$2y$10$k4V.g1GFnR8XGxA7kbwMF.zQcBOxCe2rHn506iiQulkkcONssW0Um', 'zv9D15YtyAbPCTbLV2xcDQM4N1PrhxGr0rUj8rrE.jpg', 2, 1, '2021-08-29 18:31:31', '2021-08-29 19:29:00'),
(6, 'wefwef', 'wfeewf', NULL, '$2y$10$0Ti/oMF9HI7rpHozd8TT/udR6haiP3tWzKHqIRg0on.EsFQ29YXvK', '5GuK4zs7zJT44bxWQs0JvlXDnTG5P8LaUfsU1o0n.jpg', 4, 1, '2021-09-13 21:21:35', '2021-09-13 21:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name_en`, `name_ar`, `sort`, `active`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Men\'s Fashion', 'موضه الرجال', 2, 1, 4, '2021-08-30 18:43:36', '2021-08-30 19:08:29'),
(3, NULL, 'Women\'s Fashion', 'موضه  النساء', 2, 1, 4, '2021-08-30 19:37:22', '2021-08-30 19:37:22'),
(4, NULL, 'Home', 'الرئيسيه', 3, 1, 4, '2021-08-30 19:37:41', '2021-08-30 19:37:41'),
(5, 1, 'T-shirts', 'تى شرتات', 1, 1, 4, '2021-08-30 19:38:22', '2021-08-30 19:39:36'),
(6, 1, 'Tank Tops', 'Tank Tops', 2, 1, 4, '2021-08-30 19:38:59', '2021-08-30 19:38:59'),
(7, 3, 'T-shirts', 'تى شرتات', 1, 1, 4, '2021-08-30 19:40:58', '2021-08-30 19:41:21'),
(8, 4, 'Mugs', 'مجات', 1, 1, 4, '2021-08-30 19:42:01', '2021-08-30 19:42:01'),
(9, 4, 'Tableau', 'تابلوهات', 2, 1, 4, '2021-08-30 19:42:38', '2021-08-30 19:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` date NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `phone`, `email`, `message`, `name`, `subject`, `seen`, `created_at`, `updated_at`) VALUES
(2, '01014340346', 'ahmedsamigeek@gmail.com', 'صثبثصصثبصثبصثبصثبصث', 'ahme ssami', NULL, 0, '2021-09-10 23:20:31', '2021-09-10 23:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_28_203750_create_admins_table', 1),
(5, '2021_08_30_180606_add_phone_col_to_users_table', 2),
(7, '2021_08_30_194307_create_categories_table', 3),
(8, '2021_08_30_211316_create_products_table', 4),
(9, '2021_08_30_211325_create_product_sizes_table', 4),
(10, '2021_08_30_211333_create_product_colors_table', 4),
(11, '2021_09_01_210249_create_slides_table', 5),
(12, '2021_09_05_184835_create_sellers_table', 6),
(13, '2021_09_10_212239_create_pages_table', 7),
(14, '2021_09_10_234415_create_abouts_table', 8),
(15, '2021_09_11_005659_create_messages_table', 9),
(16, '2021_09_09_130131_create_seller_products_table', 10),
(17, '2021_09_09_131020_create_seller_product_colors_table', 10),
(18, '2021_09_10_162514_create_stores_table', 10),
(20, '2021_09_15_191422_change_products_table', 11),
(21, '2021_09_15_202528_remove_fron_and_back_image_from_products_tale', 12),
(22, '2021_09_15_203026_add_cols_to_porudtcs_colors_table', 13),
(23, '2021_09_15_203223_add_cols_to_product_sizes_table', 14),
(24, '2021_09_15_215011_create_sizes_table', 15),
(25, '2021_09_17_200721_create_coupons_table', 16),
(26, '2021_09_17_230645_create_offers_table', 16),
(27, '2021_09_18_163622_create_orders_table', 16),
(28, '2021_09_21_190743_add_store_id_to_seller_products_table', 17),
(29, '2021_09_21_190837_add_seller_id_to_stores_table', 17),
(30, '2021_09_21_215426_change_size_to_size_id_col_in_products_sizes_table', 18),
(31, '2021_09_21_215709_change__size_id_col_in_type_products_sizes_table', 19),
(32, '2021_09_18_193123_create_purchases_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `admin_id`, `active`, `title_ar`, `title_en`, `content_ar`, `content_en`, `slug`, `created_at`, `updated_at`) VALUES
(3, 4, 1, 'شروط الاستخدام', 'terms & conditions', '<p>وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', '<div class=\"single-content\">\r\n<p>Please read these Terms of Service (&ldquo;Terms&rdquo;, &ldquo;Terms of Service&rdquo;) carefully before using the https://Evara.com website (the &ldquo;Service&rdquo;) operated by Evara (&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;).</p>\r\n<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>\r\n<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>\r\n<h4>Rights &amp; restrictions</h4>\r\n<ol>\r\n<li>Members must be at least 18 years of age.</li>\r\n<li>Members are granted a time-limited, non-exclusive, revocable, nontransferable, and non-sublicensable right to access that portion of the online course corresponding to the purchase.</li>\r\n<li>The portion of the online course corresponding to the purchase will be available to the Member as long as the course is maintained by the Company, which will be a minimum of one year after Member&rsquo;s purchase.</li>\r\n<li>The videos in the course are provided as a video stream and are not downloadable.</li>\r\n<li>By agreeing to grant such access, the Company does not obligate itself to maintain the course, or to maintain it in its present form.</li>\r\n</ol>\r\n<h4>Links To Other Web Sites</h4>\r\n<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Evara.</p>\r\n<p>Evara has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Evara shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>\r\n<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>\r\n<h4>Termination</h4>\r\n<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>\r\n<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>\r\n<h4>Governing Law</h4>\r\n<p>These Terms shall be governed and construed in accordance with the laws of Viet Nam, without regard to its conflict of law provisions.</p>\r\n<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>\r\n<h4>Changes</h4>\r\n<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>\r\n<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>\r\n<h4>Contact Us</h4>\r\n<p>If you have any questions about these Terms, please <a>contact us</a>.</p>\r\n</div>', NULL, '2021-09-10 22:33:09', '2021-09-10 22:51:57'),
(4, 4, 1, 'معلومات التوصيل', 'Delivery Information', '<p>وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', '<div class=\"single-content\">\r\n<p>Please read these Terms of Service (&ldquo;Terms&rdquo;, &ldquo;Terms of Service&rdquo;) carefully before using the https://Evara.com website (the &ldquo;Service&rdquo;) operated by Evara (&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;).</p>\r\n<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>\r\n<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>\r\n<h4>Rights &amp; restrictions</h4>\r\n<ol>\r\n<li>Members must be at least 18 years of age.</li>\r\n<li>Members are granted a time-limited, non-exclusive, revocable, nontransferable, and non-sublicensable right to access that portion of the online course corresponding to the purchase.</li>\r\n<li>The portion of the online course corresponding to the purchase will be available to the Member as long as the course is maintained by the Company, which will be a minimum of one year after Member&rsquo;s purchase.</li>\r\n<li>The videos in the course are provided as a video stream and are not downloadable.</li>\r\n<li>By agreeing to grant such access, the Company does not obligate itself to maintain the course, or to maintain it in its present form.</li>\r\n</ol>\r\n<h4>Links To Other Web Sites</h4>\r\n<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Evara.</p>\r\n<p>Evara has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Evara shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>\r\n<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>\r\n<h4>Termination</h4>\r\n<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>\r\n<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>\r\n<h4>Governing Law</h4>\r\n<p>These Terms shall be governed and construed in accordance with the laws of Viet Nam, without regard to its conflict of law provisions.</p>\r\n<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>\r\n<h4>Changes</h4>\r\n<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>\r\n<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>\r\n<h4>Contact Us</h4>\r\n<p>If you have any questions about these Terms, please <a>contact us</a>.</p>\r\n</div>', NULL, '2021-09-10 22:33:35', '2021-09-10 22:51:52'),
(5, 4, 1, 'شروط الاستخدام', 'Privacy Policy', '<p>وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', '<div class=\"single-content\">\r\n<p>Please read these Terms of Service (&ldquo;Terms&rdquo;, &ldquo;Terms of Service&rdquo;) carefully before using the https://Evara.com website (the &ldquo;Service&rdquo;) operated by Evara (&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;).</p>\r\n<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>\r\n<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>\r\n<h4>Rights &amp; restrictions</h4>\r\n<ol>\r\n<li>Members must be at least 18 years of age.</li>\r\n<li>Members are granted a time-limited, non-exclusive, revocable, nontransferable, and non-sublicensable right to access that portion of the online course corresponding to the purchase.</li>\r\n<li>The portion of the online course corresponding to the purchase will be available to the Member as long as the course is maintained by the Company, which will be a minimum of one year after Member&rsquo;s purchase.</li>\r\n<li>The videos in the course are provided as a video stream and are not downloadable.</li>\r\n<li>By agreeing to grant such access, the Company does not obligate itself to maintain the course, or to maintain it in its present form.</li>\r\n</ol>\r\n<h4>Links To Other Web Sites</h4>\r\n<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Evara.</p>\r\n<p>Evara has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Evara shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>\r\n<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>\r\n<h4>Termination</h4>\r\n<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>\r\n<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>\r\n<h4>Governing Law</h4>\r\n<p>These Terms shall be governed and construed in accordance with the laws of Viet Nam, without regard to its conflict of law provisions.</p>\r\n<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>\r\n<h4>Changes</h4>\r\n<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>\r\n<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>\r\n<h4>Contact Us</h4>\r\n<p>If you have any questions about these Terms, please <a>contact us</a>.</p>\r\n</div>', NULL, '2021-09-10 22:33:50', '2021-09-10 22:51:44'),
(6, 4, 1, 'مركز الدعم', 'Support Center', '<p>وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', '<div class=\"single-content\">\r\n<p>Please read these Terms of Service (&ldquo;Terms&rdquo;, &ldquo;Terms of Service&rdquo;) carefully before using the https://Evara.com website (the &ldquo;Service&rdquo;) operated by Evara (&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;).</p>\r\n<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>\r\n<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>\r\n<h4>Rights &amp; restrictions</h4>\r\n<ol>\r\n<li>Members must be at least 18 years of age.</li>\r\n<li>Members are granted a time-limited, non-exclusive, revocable, nontransferable, and non-sublicensable right to access that portion of the online course corresponding to the purchase.</li>\r\n<li>The portion of the online course corresponding to the purchase will be available to the Member as long as the course is maintained by the Company, which will be a minimum of one year after Member&rsquo;s purchase.</li>\r\n<li>The videos in the course are provided as a video stream and are not downloadable.</li>\r\n<li>By agreeing to grant such access, the Company does not obligate itself to maintain the course, or to maintain it in its present form.</li>\r\n</ol>\r\n<h4>Links To Other Web Sites</h4>\r\n<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Evara.</p>\r\n<p>Evara has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Evara shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>\r\n<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>\r\n<h4>Termination</h4>\r\n<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>\r\n<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>\r\n<h4>Governing Law</h4>\r\n<p>These Terms shall be governed and construed in accordance with the laws of Viet Nam, without regard to its conflict of law provisions.</p>\r\n<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>\r\n<h4>Changes</h4>\r\n<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>\r\n<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>\r\n<h4>Contact Us</h4>\r\n<p>If you have any questions about these Terms, please <a>contact us</a>.</p>\r\n</div>', NULL, '2021-09-10 22:34:05', '2021-09-10 22:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `admin_id`, `name_ar`, `name_en`, `price`, `description_ar`, `description_en`, `active`, `created_at`, `updated_at`) VALUES
(20, 1, 4, 'wefwef', 'wefwef', 196.00, 'wefwef', 'wefwef', 1, '2021-09-15 20:28:37', '2021-09-15 20:28:37'),
(21, 1, 4, 'wfwefwef', 'wefewf', 300.00, 'wfwef', 'wefewf', 1, '2021-09-16 12:56:10', '2021-09-16 12:56:10'),
(23, 1, 4, 'fffffffffffffffffffffffffffffffffffff', 'ffffffffffffffffffffffffffffff', 100.00, 'fffffffffffffffffffffffffffffffff', 'fffffffffffffffffffffffffffffffff', 1, '2021-09-21 20:11:35', '2021-09-21 20:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `front_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `back_image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color`, `front_image`, `created_at`, `updated_at`, `back_image`) VALUES
(18, 20, '#4e9a06', 'gFi5Ii1qz1U4yVU4BlGP4f2X98Imp6nuCR3tDrkr.jpg', '2021-09-15 20:28:37', '2021-09-15 20:28:37', 'pRc6j19cwUgNJ46tBGm9zPyIU2mqfd7deqtJFa8L.jpg'),
(19, 20, '#c17d11', 'AvXVaAWHs9decWuRNUfBOyifPNlTEaPgauBYWp5Z.jpg', '2021-09-15 20:28:37', '2021-09-15 20:28:37', 'LBgE0Ex14Pu76y76XYTGsNYzMbSH2jjIUNLSA8y6.jpg'),
(20, 21, '#75507b', 'tuJY3kZ58W1ylOOofEzJMwvgYVNHCvaeju21YjxR.jpg', '2021-09-16 12:56:10', '2021-09-16 12:56:10', 'nIcrgqxsWyMFimY9rhFBUFCGgzG87a4pkoaVox46.jpg'),
(22, 23, '#f57900', 'rSFLl892OlQcZ1cTkzZhhjY0EcM5Z6tShHj60YrH.png', '2021-09-21 20:11:35', '2021-09-21 20:11:35', 'NHLfa8IuKrKtV4JGonrzfygNTfzVMsuDVxlq2bpI.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`, `product_color_id`, `quantity`) VALUES
(37, 20, 2, '2021-09-15 20:28:37', '2021-09-15 20:28:37', 18, 44),
(38, 20, 4, '2021-09-15 20:28:37', '2021-09-15 20:28:37', 18, 20),
(39, 20, 5, '2021-09-15 20:28:37', '2021-09-15 20:28:37', 19, 20),
(40, 20, 10, '2021-09-15 20:28:37', '2021-09-15 20:28:37', 19, 30),
(41, 21, 1, '2021-09-16 12:56:10', '2021-09-16 12:56:10', 20, 30),
(42, 21, 3, '2021-09-16 12:56:10', '2021-09-16 12:56:10', 20, 60),
(43, 21, 10, '2021-09-16 12:56:10', '2021-09-16 12:56:10', 20, 20),
(44, 23, 4, '2021-09-21 20:11:35', '2021-09-21 20:11:35', 22, 200),
(45, 23, 3, '2021-09-21 20:11:35', '2021-09-21 20:11:35', 22, 200),
(46, 23, 5, '2021-09-21 20:11:35', '2021-09-21 20:11:35', 22, 10),
(47, 23, 2, '2021-09-21 20:11:35', '2021-09-21 20:11:35', 22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_products_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `printing_field` double NOT NULL DEFAULT 0,
  `redbubble` double NOT NULL DEFAULT 0,
  `merch_by_amazon` double NOT NULL DEFAULT 0,
  `etsy` double NOT NULL DEFAULT 0,
  `teespring` double NOT NULL DEFAULT 0,
  `spreadshirt` double NOT NULL DEFAULT 0,
  `zazzle` double NOT NULL DEFAULT 0,
  `teepublic` double NOT NULL DEFAULT 0,
  `others` double NOT NULL DEFAULT 0,
  `work_online` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make_designs_use` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stores_links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_yourself` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `status`, `name`, `email`, `email_verified_at`, `password`, `phone`, `country`, `printing_field`, `redbubble`, `merch_by_amazon`, `etsy`, `teespring`, `spreadshirt`, `zazzle`, `teepublic`, `others`, `work_online`, `make_designs_use`, `stores_links`, `about_yourself`, `created_at`, `updated_at`) VALUES
(1, 'true', 'ahmed sami', 'ahmedsamigeek@gmail.com', NULL, '$2y$10$xBei.OdFKyVTZ4/ZFLnBUueNzjKDKNJWC90vD3Juwx8CVWeM4xEtC', '01014340346', 'egypt', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', NULL, '', '2021-09-12 20:55:02', '2021-08-23 12:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `seller_products`
--

CREATE TABLE `seller_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'back',
  `translate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `selling_price` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_product_colors`
--

CREATE TABLE `seller_product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_products_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 's', NULL, NULL),
(2, 'M', NULL, NULL),
(3, 'XL', NULL, NULL),
(4, 'L', NULL, NULL),
(5, '2Xl', NULL, NULL),
(6, '3XL', NULL, NULL),
(7, '4XL', NULL, NULL),
(8, '5XL', NULL, NULL),
(9, '6XL', NULL, NULL),
(10, '7Xl', NULL, NULL),
(12, '200 ml', NULL, NULL),
(13, '300ml', NULL, NULL),
(14, '400ml', '2021-09-18 18:56:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `big_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `big_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `admin_id`, `active`, `title_en`, `big_title_en`, `sub_title_en`, `title_ar`, `big_title_ar`, `sub_title_ar`, `image`, `link`, `button_text_en`, `button_text_ar`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 'Upcoming Offer', 'Big Deals From', 'Headphone, Gaming Laptop, PC and more...', 'Upcoming Offer', 'Big Deals From', 'Headphone, Gaming Laptop, PC and more...', 'lVbmsqWF4K3y6i1JoQwSdKS3WC2Aqt5iZBtxjdMa.png', 'https://codecourse.com/', 'Shop Now', 'Shop Now', '2021-09-01 20:19:47', '2021-09-01 20:19:47'),
(3, 4, 0, 'Upcoming Offer', 'Big Deals From', 'Headphone, Gaming Laptop, PC and more...', 'Upcoming Offer', 'Big Deals From', 'Headphone, Gaming Laptop, PC and more...', 'hLav5Q8C1of2D8IQ5oy1KW2DaqfvOJRvhOKWXkoc.png', 'https://codecourse.com/', 'Shop Now', 'Shop Now', '2021-09-01 20:19:49', '2021-09-01 20:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` double NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `logo`, `banner`, `active`, `bio`, `created_at`, `updated_at`, `seller_id`) VALUES
(1, 'samy store', 'logo1.jpg', '', 1, NULL, '2021-09-12 20:55:02', '2021-08-23 12:14:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(2, 'ahmed sami', 'ahmedsamigeek@gmail.com', NULL, '$2y$10$xBei.OdFKyVTZ4/ZFLnBUueNzjKDKNJWC90vD3Juwx8CVWeM4xEtC', NULL, '2021-08-30 16:47:48', '2021-08-30 17:09:40', '01014340346'),
(5, 'efwef', 'wefwef', NULL, 'wefewf', 'wef', '2021-09-12 20:55:02', '2021-08-23 12:14:51', 'wefwef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`),
  ADD KEY `coupons_categories_id_foreign` (`categories_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_seller_products_id_foreign` (`seller_products_id`),
  ADD KEY `purchases_order_id_foreign` (`order_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

--
-- Indexes for table `seller_products`
--
ALTER TABLE `seller_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_product_colors`
--
ALTER TABLE `seller_product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_product_colors_seller_products_id_foreign` (`seller_products_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_products`
--
ALTER TABLE `seller_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_product_colors`
--
ALTER TABLE `seller_product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_seller_products_id_foreign` FOREIGN KEY (`seller_products_id`) REFERENCES `seller_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seller_product_colors`
--
ALTER TABLE `seller_product_colors`
  ADD CONSTRAINT `seller_product_colors_seller_products_id_foreign` FOREIGN KEY (`seller_products_id`) REFERENCES `seller_products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
