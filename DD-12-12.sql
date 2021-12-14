-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 02:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a`
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
(1, 'صثبصثب', 'صثبثصب', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin_images/default.png',
  `admin_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `role`, `image`, `admin_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'ahmed samy', 'ahmed samy', 'ahmedsamigeek@gmail.com', '$2y$10$88cHYtgG02M9K6SyPDbk/.x6SbDhzVGD4Ca.se1Fsr1ss4sDYV8OO', '0', 'x0rq6eMd3yMan5IEdeDqhHSH1e2iRDe9OwOFybjo.jpg', 1, 1, '2021-10-01 18:22:40', '2021-10-06 07:26:01'),
(2, 'Ali', 'Ali', NULL, '$2y$10$zkPD/tW1qvxjqdQLQimgPubwt3ViBJjojS8rF2OuzPiaWSFbJhpNK', '0', 'admin_images/default.png', 1, 1, '2021-10-12 21:54:37', '2021-10-12 21:54:37'),
(3, 'Mahmoud', 'Mahmoud', NULL, '$2y$10$GKMwkUfaNIPCEgg7VCbJnOb/mYnVljRJUGoC26PQ8.ae4PUwuc8zi', '0', 'uUpYAA2KOIpSDEYDLr1b52MrYuTfWprc9uCVDb9T.jpg', 1, 1, '2021-10-15 16:59:52', '2021-10-15 16:59:52'),
(4, 'admin', 'admin', 'admin@gmail.com', '$2y$10$qwecHOqXwqXQD2kWhxzcsuJPpiE/Y8j4uvYyCz6sVzIgomYu/zSMK', '0', 'admin_images/default.png', 1, 1, '2021-11-17 03:51:58', '2021-11-17 03:51:58');

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
(1, NULL, 'Men', 'رجال', 0, 1, 1, '2021-10-01 18:22:29', '2021-12-02 23:06:28'),
(2, NULL, 'Women', 'نساء', 0, 1, 1, '2021-10-01 18:22:29', '2021-12-02 23:06:53'),
(3, NULL, 'Home', 'المنزل', 10, 1, 1, '2021-10-01 18:22:29', '2021-12-02 23:07:20'),
(4, 1, 'Men\'s T-shirt', 'تيشيرت رجالي', 1, 1, 4, '2021-12-02 23:08:06', '2021-12-02 23:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `comment_manuals`
--

CREATE TABLE `comment_manuals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `value`, `end`, `categories_id`, `created_at`, `updated_at`) VALUES
(1, 'test', '60', '2022-01-01', 1, '2021-10-01 18:22:40', '2021-10-01 18:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 means active 0 means not active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `name_ar`, `name_en`, `active`, `created_at`, `updated_at`) VALUES
(1, 'الاسكندريه', 'alexandira', 1, '2021-10-04 04:25:07', '2021-10-04 04:25:07'),
(2, 'اسوان', 'aswan', 1, '2021-10-04 04:25:07', '2021-10-04 04:25:07'),
(3, 'الدقهليه', 'daqhlia', 1, '2021-10-04 04:25:07', '2021-10-04 04:25:07'),
(4, 'القاهرة', 'القاهرة', 1, '2021-10-05 10:17:59', '2021-10-05 10:17:59'),
(5, 'الإسماعيلية', 'الإسماعيلية', 1, '2021-10-05 10:18:18', '2021-10-05 10:18:18'),
(6, 'أسوان', 'أسوان', 1, '2021-10-05 10:18:25', '2021-10-05 10:18:25'),
(7, 'أسيوط', 'أسيوط', 1, '2021-10-05 10:18:33', '2021-10-05 10:18:33'),
(8, 'الأقصر', 'الأقصر', 1, '2021-10-05 10:18:41', '2021-10-05 10:18:41'),
(9, 'البحر الأحمر', 'البحر الأحمر', 1, '2021-10-05 10:18:50', '2021-10-05 10:18:50'),
(10, 'البحيرة', 'البحيرة', 1, '2021-10-05 10:18:59', '2021-10-05 10:18:59'),
(11, 'بني سويف', 'بني سويف', 1, '2021-10-05 10:19:06', '2021-10-05 10:33:38');

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
(1, '83479224236', 'no-replyunfossyquog@gmail.com', 'Good day!  egymerch.com \r\n \r\nWe propose \r\n \r\nSending your message through the feedback form which can be found on the sites in the contact partition. Contact form are filled in by our software and the captcha is solved. The profit of this method is that messages sent through feedback forms are whitelisted. This method raise the odds that your message will be open. \r\n \r\nOur database contains more than 27 million sites around the world to which we can send your message. \r\n \r\nThe cost of one million messages 49 USD \r\n \r\nFREE TEST mailing Up to 50,000 messages. \r\n \r\n \r\nThis offer is created automatically.  Use our contacts for communication. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.', 'DavidNek', 'Do you want cheap and innovative advertising for little money?', 0, '2021-10-10 20:42:47', '2021-10-10 20:42:47'),
(8, '81382379829', 'noormohammedali966@gmail.com', 'Hello Dear, \r\nAs-salamu alaykum \r\nFirst let me introduce myself, My name is Noor Mohammed Ali Al-Koofee from Iraq. \r\n \r\nI am married in Saudi Arabia. My Husband has been domestically abusive lately, the rate of abuse has attracted public attention since 2019 after a popular television presenter, Rania al-Baz, was severely beaten by her own husband too, I am interested in investing in your country through your personal guidelines. Before the Covid-19 Pandemic started, I saved a total of $20 Million currently deposited in the bank ready to be wire transferred to your country for possible investment & migration opportunities. \r\n \r\nIf interested, kindly contact me to send all proof of funds for your consideration. I cannot say everything here but I can be reached directly on WhatsApp only: +966592291747, or mailto:contact@noormohammedali.com or Email: noormohammedali966@gmail.com \r\n \r\nSincerely yours, \r\nNoor Mohammed Ali Al-Koofee \r\nSaudi Arabia', 'Mohammed Koofee', 'Help is Needed', 0, '2021-10-20 15:30:43', '2021-10-20 15:30:43'),
(11, '81211476479', 'martinbr@consultant.com', 'Hello, \r\nWe provide funding through our venture capital company to both start-up and existing companies either looking for funding for expansion or to accelerate growth in their company. \r\n \r\nWe have a structured joint venture investment plan in which we are interested in an annual return on investment not more than 10% ROI. \r\n \r\nWe are also currently structuring a convertible debt and loan financing of 3% interest repayable annually with no early repayment penalties. \r\n \r\nIf you have a business plan or executive summary I can review to understand a much better idea of your business and what you are looking to do, this will assist in determining the best possible investment structure we can pursue and discuss more extensively. \r\n \r\nIf you are interested in any of the above, kindly respond to us via this email andrew.goldenberg@castleprojectservicesltd.com \r\n \r\nI wait to hear from you. \r\n \r\nSincerely, \r\n \r\nAndrew Goldenberge \r\n \r\nInvestment/Wealth Manager \r\nCastle Project Services Ltd. \r\nE-Mail: andrew.goldenberg@castleprojectservicesltd.com', 'Andrew Goldenberge', 'Please feel free to contact us at anytime if you need loan or partnership from us.', 0, '2021-10-21 01:54:33', '2021-10-21 01:54:33'),
(12, '81211476479', 'martinbr@consultant.com', 'Hello, \r\nWe provide funding through our venture capital company to both start-up and existing companies either looking for funding for expansion or to accelerate growth in their company. \r\n \r\nWe have a structured joint venture investment plan in which we are interested in an annual return on investment not more than 10% ROI. \r\n \r\nWe are also currently structuring a convertible debt and loan financing of 3% interest repayable annually with no early repayment penalties. \r\n \r\nIf you have a business plan or executive summary I can review to understand a much better idea of your business and what you are looking to do, this will assist in determining the best possible investment structure we can pursue and discuss more extensively. \r\n \r\nIf you are interested in any of the above, kindly respond to us via this email andrew.goldenberg@castleprojectservicesltd.com \r\n \r\nI wait to hear from you. \r\n \r\nSincerely, \r\n \r\nAndrew Goldenberge \r\n \r\nInvestment/Wealth Manager \r\nCastle Project Services Ltd. \r\nE-Mail: andrew.goldenberg@castleprojectservicesltd.com', 'Andrew Goldenberge', 'Please feel free to contact us at anytime if you need loan or partnership from us.', 0, '2021-10-21 01:54:33', '2021-10-21 01:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2021_08_30_180606_add_phone_col_to_users_table', 1),
(6, '2021_08_30_194307_create_categories_table', 1),
(7, '2021_08_30_211316_create_products_table', 1),
(8, '2021_08_30_211333_create_product_colors_table', 1),
(9, '2021_08_30_211334_create_product_sizes_table', 1),
(10, '2021_09_01_210249_create_slides_table', 1),
(11, '2021_09_05_184835_create_sellers_table', 1),
(12, '2021_09_09_130131_create_seller_products_table', 1),
(13, '2021_09_09_131020_create_seller_product_colors_table', 1),
(14, '2021_09_10_162514_create_stores_table', 1),
(15, '2021_09_10_212239_create_pages_table', 1),
(16, '2021_09_10_234415_create_abouts_table', 1),
(17, '2021_09_11_005659_create_messages_table', 1),
(18, '2021_09_15_191422_change_products_table', 1),
(19, '2021_09_15_202528_remove_fron_and_back_image_from_products_tale', 1),
(20, '2021_09_15_203026_add_cols_to_porudtcs_colors_table', 1),
(21, '2021_09_15_203223_add_cols_to_product_sizes_table', 1),
(22, '2021_09_15_215011_create_sizes_table', 1),
(23, '2021_09_17_200721_create_coupons_table', 1),
(24, '2021_09_17_230645_create_offers_table', 1),
(25, '2021_09_18_163622_create_orders_table', 1),
(26, '2021_09_18_193123_create_purchases_table', 1),
(27, '2021_09_21_190743_add_store_id_to_seller_products_table', 1),
(28, '2021_09_21_190837_add_seller_id_to_stores_table', 1),
(29, '2021_09_21_215426_change_size_to_size_id_col_in_products_sizes_table', 1),
(30, '2021_09_21_215709_change__size_id_col_in_type_products_sizes_table', 1),
(31, '2021_09_27_113409_create_replies_table', 1),
(32, '2021_10_01_170216_create_notifications_table', 1),
(33, '2021_10_03_073303_create_user_addresses_table', 2),
(34, '2021_10_03_081930_change_some_cols_in_orders_table', 2),
(35, '2021_10_03_085120_change_the_name_of_purchases_table_to_order_items', 3),
(36, '2021_10_03_085317_create_governorates_table', 4),
(37, '2021_10_03_085606_create_order_statuses_table', 5),
(38, '2021_10_03_085636_create_order_comments_table', 5),
(39, '2021_10_02_180048_create_notification_eyes_table', 6),
(40, '2021_10_04_081035_create_shipping_companies_table', 7),
(41, '2021_10_04_084105_create_shipping_company_prices_table', 7),
(42, '2021_10_05_133236_add_col_to_order_status_table', 8),
(43, '2021_10_09_095527_create_wish_lists_table', 9),
(44, '2021_10_10_180320_create_user_reviews_table', 10),
(45, '2021_10_12_195014_add_more_cols_to_seller_products_table', 11),
(46, '2021_10_08_210232_create_order_item_colors_table', 12),
(47, '2021_10_08_210250_create_order_item_sizes_table', 12),
(48, '2021_10_18_161447_create_product_seller_images_table', 12),
(49, '2021_10_22_165512_create_order_status_table', 12),
(50, '2021_10_24_210433_add_column_to_sellers_table', 12),
(51, '2021_11_08_180704_create_order_sellers_table', 12),
(52, '2021_11_08_180737_create_product_orders_table', 13),
(53, '2021_11_08_195149_mm', 14),
(54, '2021_11_09_180737_create_product_orders_table', 15),
(55, '2021_11_09_024332_create_wallets_table', 16),
(56, '2021_11_16_100517_create_news_table', 17),
(57, '2021_11_20_121655_create_comment_manuals_table', 18),
(58, '2021_11_22_121655_create_comment_manuals_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `category`, `created_at`, `updated_at`) VALUES
(1, 'your first tips', '<p>add your first store</p>', 'Tips to grow', '2021-11-16 08:30:19', '2021-11-16 08:30:19'),
(2, 'your first tips', '<p>add your first store</p>', 'Tips to grow', '2021-11-16 08:30:55', '2021-11-16 08:30:55'),
(3, 'www', '<p>you are acepted and isert the news and show to user</p>', 'News', '2021-11-16 08:32:06', '2021-11-16 08:32:06'),
(4, 'your first tips', '<h5>lmlkmlkmn&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; klmg;wm;wmg;wm;wmg;wmgw;mgw;mg;wmgw;mgw;mg;wm</h5>', 'News', '2021-11-17 00:36:49', '2021-11-17 00:36:49'),
(5, 'have anew product', '<p>we are add anew product in egymersh</p>', 'News', '2021-11-17 00:39:09', '2021-11-17 00:39:09'),
(6, 'mmmmmmmmmmmmmm', '<p>mmmmmmm mmmmmmmmmmmmmmmmm&nbsp;&nbsp; mmmmmmmmmmmmmmm&nbsp;&nbsp; mmmmmmmmmm</p>', 'Tips to grow', '2021-11-17 00:43:16', '2021-11-17 00:43:16'),
(7, 'message from mahmoud', '<p>messsage from exeption knveenvoqv</p>', 'Tips to grow', '2021-11-17 18:53:18', '2021-11-17 18:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `admin_id`, `title_ar`, `title_en`, `message_ar`, `message_en`, `status`, `created_at`, `updated_at`) VALUES
(4, '4', 'title Arbic', 'title English', '<p><span style=\"font-size: 13px;\">شششششششششششششششششششش</span></p>\r\n<div class=\"tox tox-tinymce\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 1px solid #cccccc; font-variant: inherit; font-stretch: inherit; font-size: 16px; line-height: normal; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen-Sans, Ubuntu, Cantarell, \'Helvetica Neue\', sans-serif; vertical-align: initial; box-shadow: none; color: #222f3e; cursor: auto; -webkit-tap-highlight-color: transparent; text-shadow: none; border-radius: 0px; display: flex; flex-direction: column; overflow: hidden; position: relative; visibility: hidden; direction: ltr; height: 200px;\" role=\"application\" aria-disabled=\"false\">\r\n<div class=\"tox-editor-container\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex: 1 1 auto; flex-direction: column; overflow: hidden;\">\r\n<div class=\"tox-editor-header\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-decoration-line: inherit; text-shadow: inherit; background: 0px 0px #2a3042; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; z-index: 1; transition: box-shadow 0.5s ease 0s;\" data-alloy-vertical-dir=\"toptobottom\">\r\n<div class=\"tox-menubar\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: left 0px top 0px #ffffff; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex: 0 0 auto; flex-wrap: wrap;\" role=\"menubar\" data-alloy-tabstop=\"true\"><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">File</span></button><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background: #dee0e2; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">Edit</span></button><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">View</span></button><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">Insert</span></button><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">Format</span></button></div>\r\n<div class=\"tox-toolbar-overlord\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px #ffffff; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\" role=\"group\" aria-disabled=\"false\">\r\n<div class=\"tox-toolbar__primary\" style=\"box-sizing: inherit; margin: -1px 0px 0px; padding: 0px; border-width: 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background-position: left 0px top 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex: 0 0 auto; flex-wrap: wrap; border-color: #cccccc initial initial initial; border-style: solid initial initial initial;\" role=\"group\">\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border-width: 0px 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap; border-color: initial #cccccc initial initial; border-style: initial solid initial initial;\" tabindex=\"-1\" title=\"history\" role=\"toolbar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border-width: 0px 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap; border-color: initial #cccccc initial initial; border-style: initial solid initial initial;\" tabindex=\"-1\" title=\"styles\" role=\"toolbar\" data-alloy-tabstop=\"true\"><button class=\"tox-tbtn tox-tbtn--select tox-tbtn--bespoke\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" title=\"Formats\" type=\"button\" aria-label=\"Formats\" aria-haspopup=\"true\" aria-expanded=\"false\"></button><button class=\"tox-tbtn tox-tbtn--select tox-tbtn--bespoke\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" title=\"Formats\" type=\"button\" aria-label=\"Formats\" aria-haspopup=\"true\" aria-expanded=\"false\"><span class=\"tox-tbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: nowrap; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: 7em; overflow: hidden; text-overflow: ellipsis;\">Paragraph</span></button>\r\n<div class=\"tox-tbtn__select-chevron\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: 16px; align-items: center; display: flex; justify-content: center;\">&nbsp;</div>\r\n</div>\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border-width: 0px 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap; border-color: initial #cccccc initial initial; border-style: initial solid initial initial;\" tabindex=\"-1\" title=\"formatting\" role=\"toolbar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border-width: 0px 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap; border-color: initial #cccccc initial initial; border-style: initial solid initial initial;\" tabindex=\"-1\" title=\"alignment\" role=\"toolbar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap;\" tabindex=\"-1\" title=\"indentation\" role=\"toolbar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"tox-anchorbar\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex: 0 0 auto;\">&nbsp;</div>\r\n</div>\r\n<div class=\"tox-sidebar-wrap\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-decoration-line: inherit; text-shadow: inherit; background: 0px 0px #2a3042; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex-direction: row; flex-grow: 1; min-height: 0px;\">&nbsp;</div>\r\n</div>\r\n</div>', '<p><span style=\"font-size: 13px;\">شششششششششششششششششششش</span></p>\r\n<div class=\"tox tox-tinymce\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 1px solid #cccccc; font-variant: inherit; font-stretch: inherit; font-size: 16px; line-height: normal; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen-Sans, Ubuntu, Cantarell, \'Helvetica Neue\', sans-serif; vertical-align: initial; box-shadow: none; color: #222f3e; cursor: auto; -webkit-tap-highlight-color: transparent; text-shadow: none; border-radius: 0px; display: flex; flex-direction: column; overflow: hidden; position: relative; visibility: hidden; direction: ltr; height: 200px;\" role=\"application\" aria-disabled=\"false\">\r\n<div class=\"tox-editor-container\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex: 1 1 auto; flex-direction: column; overflow: hidden;\">\r\n<div class=\"tox-editor-header\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-decoration-line: inherit; text-shadow: inherit; background: 0px 0px #2a3042; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; z-index: 1; transition: box-shadow 0.5s ease 0s;\" data-alloy-vertical-dir=\"toptobottom\">\r\n<div class=\"tox-menubar\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: left 0px top 0px #ffffff; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex: 0 0 auto; flex-wrap: wrap;\" role=\"menubar\" data-alloy-tabstop=\"true\"><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">File</span></button><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background: #dee0e2; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">Edit</span></button><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">View</span></button><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">Insert</span></button><button class=\"tox-mbtn tox-mbtn--select\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" role=\"menuitem\" type=\"button\" aria-haspopup=\"true\" data-alloy-tabstop=\"true\" aria-expanded=\"false\"><span class=\"tox-mbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\">Format</span></button></div>\r\n<div class=\"tox-toolbar-overlord\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px #ffffff; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto;\" role=\"group\" aria-disabled=\"false\">\r\n<div class=\"tox-toolbar__primary\" style=\"box-sizing: inherit; margin: -1px 0px 0px; padding: 0px; border-width: 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background-position: left 0px top 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex: 0 0 auto; flex-wrap: wrap; border-color: #cccccc initial initial initial; border-style: solid initial initial initial;\" role=\"group\">\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border-width: 0px 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap; border-color: initial #cccccc initial initial; border-style: initial solid initial initial;\" tabindex=\"-1\" title=\"history\" role=\"toolbar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border-width: 0px 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap; border-color: initial #cccccc initial initial; border-style: initial solid initial initial;\" tabindex=\"-1\" title=\"styles\" role=\"toolbar\" data-alloy-tabstop=\"true\"><button class=\"tox-tbtn tox-tbtn--select tox-tbtn--bespoke\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" title=\"Formats\" type=\"button\" aria-label=\"Formats\" aria-haspopup=\"true\" aria-expanded=\"false\"></button><button class=\"tox-tbtn tox-tbtn--select tox-tbtn--bespoke\" style=\"box-sizing: inherit; font-family: inherit; font-size: 14px; line-height: inherit; margin: 2px 0px 3px; overflow: hidden; appearance: button; border-radius: 3px; text-decoration: inherit; cursor: pointer; color: #222f3e; direction: inherit; font-style: normal; font-weight: 400; -webkit-tap-highlight-color: inherit; text-align: inherit; text-shadow: inherit; vertical-align: inherit; white-space: inherit; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: none; float: none; height: 34px; max-width: none; outline: 0px; padding: 0px 4px; position: static; width: auto; align-items: center; display: flex; flex: 0 0 auto; justify-content: center; user-select: none; border: 0px initial initial;\" tabindex=\"-1\" title=\"Formats\" type=\"button\" aria-label=\"Formats\" aria-haspopup=\"true\" aria-expanded=\"false\"><span class=\"tox-tbtn__select-label\" style=\"box-sizing: inherit; margin: 0px 4px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: inherit; color: inherit; cursor: default; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: nowrap; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: 7em; overflow: hidden; text-overflow: ellipsis;\">Paragraph</span></button>\r\n<div class=\"tox-tbtn__select-chevron\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: 16px; align-items: center; display: flex; justify-content: center;\">&nbsp;</div>\r\n</div>\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border-width: 0px 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap; border-color: initial #cccccc initial initial; border-style: initial solid initial initial;\" tabindex=\"-1\" title=\"formatting\" role=\"toolbar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border-width: 0px 1px 0px 0px; border-image: initial; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap; border-color: initial #cccccc initial initial; border-style: initial solid initial initial;\" tabindex=\"-1\" title=\"alignment\" role=\"toolbar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n<div class=\"tox-toolbar__group\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 4px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; align-items: center; display: flex; flex-wrap: wrap;\" tabindex=\"-1\" title=\"indentation\" role=\"toolbar\" data-alloy-tabstop=\"true\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"tox-anchorbar\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: inherit; color: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-align: inherit; text-decoration: inherit; text-shadow: inherit; text-transform: inherit; white-space: inherit; background: 0px 0px; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex: 0 0 auto;\">&nbsp;</div>\r\n</div>\r\n<div class=\"tox-sidebar-wrap\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: inherit; cursor: inherit; direction: inherit; -webkit-tap-highlight-color: inherit; text-decoration-line: inherit; text-shadow: inherit; background: 0px 0px #2a3042; box-shadow: none; float: none; height: auto; max-width: none; outline: 0px; position: static; width: auto; display: flex; flex-direction: row; flex-grow: 1; min-height: 0px;\">&nbsp;</div>\r\n</div>\r\n</div>', '1', '2021-12-01 20:53:55', '2021-12-01 20:53:55'),
(5, '4', 'شششششش', 'ششششش', '<p>http://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/create</p>', '<p>http://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/create</p>', '1', '2021-12-01 20:54:12', '2021-12-01 20:54:12'),
(6, '4', 'يييييييي', 'يييييييييييييي', '<p>http://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/create</p>', '<p>http://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/createhttp://127.0.0.1:8000/en/Dashboard/notifications/create</p>', '1', '2021-12-01 20:54:27', '2021-12-01 20:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `notification_eyes`
--

CREATE TABLE `notification_eyes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_eyes`
--

INSERT INTO `notification_eyes` (`id`, `seller_id`, `notification_id`, `created_at`, `updated_at`) VALUES
(5, 1, 6, '2021-12-01 20:55:13', '2021-12-01 20:55:13'),
(6, 1, 5, '2021-12-01 21:16:59', '2021-12-01 21:16:59'),
(7, 1, 4, '2021-12-01 21:17:05', '2021-12-01 21:17:05'),
(8, 17, 4, '2021-12-01 21:22:48', '2021-12-01 21:22:48'),
(9, 17, 5, '2021-12-01 21:22:53', '2021-12-01 21:22:53'),
(10, 17, 6, '2021-12-01 21:23:00', '2021-12-01 21:23:00'),
(11, 19, 5, '2021-12-01 21:33:10', '2021-12-01 21:33:10');

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

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'Get great devices up to 50% off <a href=\"#\">View details</a>', 'Get great devices up to 50% off <a href=\"#\">View details</a>', '2021-10-01 18:22:41', '2021-10-01 18:22:41'),
(2, 'Supper Value Deals - Save more with coupons', 'Supper Value Deals - Save more with coupons', '2021-10-01 18:22:41', '2021-10-01 18:22:41'),
(3, 'Trendy 25silver jewelry, save up 35% off today <a href=\"#\">Shop now</a>', 'Trendy 25silver jewelry, save up 35% off today <a href=\"#\">Shop now</a>', '2021-10-01 18:22:41', '2021-10-01 18:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `total` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_id` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 means its new and not seen , 1 means seen indeed',
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Manual` int(11) DEFAULT NULL,
  `Organic` int(11) DEFAULT NULL,
  `Delivered` int(11) DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `addres` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Column 17` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `total`, `order_status_id`, `created_at`, `updated_at`, `user_id`, `address_id`, `notes`, `seen`, `order_number`, `Manual`, `Organic`, `Delivered`, `full_name`, `phone`, `addres`, `shipping`, `Column 17`) VALUES
(20, 110.00, '100', 0, '2021-12-11 23:27:37', '2021-12-11 23:27:37', 1, 4, NULL, 0, '1', NULL, NULL, NULL, 'Seller', 12312123, 'Address', '50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_comments`
--

CREATE TABLE `order_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_products_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `seller_products_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`, `color_id`, `color`, `size_id`, `size`) VALUES
(39, 101, 20, '2', '110.00', '2021-12-11 23:27:37', '2021-12-11 23:27:37', '97', '#db0a0a', '1', 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `order_sellers`
--

CREATE TABLE `order_sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `government` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `notes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` int(11) NOT NULL,
  `message` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `color`) VALUES
(1, 'Poccessing', 'قيد التنفيذ', '2021-10-04 04:25:07', '2021-10-04 04:25:07', '#f0a31c'),
(2, 'Preparing', 'جارى التجهيز', '2021-10-04 04:25:07', '2021-04-28 14:47:39', '#f0861c'),
(3, 'shipped', 'تم الشحن', '2021-09-12 20:55:02', '2021-09-12 20:55:02', '#1c43f0'),
(4, 'delivred', 'تم التسليم ', '2021-09-12 20:55:02', '2021-09-12 20:55:02', '#4ea20d'),
(5, 'cancelled', 'تم الالغاء', '2021-09-12 20:55:02', '2021-09-12 20:55:02', '#e2151e');

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

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(31, 1, 1, '11-28-2021 arblic', '11-28-2021 english', 223.00, 'Arabic Description', 'Arabic Description', 1, '2021-11-28 19:42:58', '2021-11-28 19:42:58'),
(32, 4, 4, 'تيشيرت عادي', 'Classis Tee', 52.00, 'Arabic DescriptionArabic DescriptionArabic DescriptionArabic Description', 'Arabic DescriptionArabic DescriptionArabic Description', 1, '2021-12-02 23:11:14', '2021-12-02 23:11:14'),
(33, 4, 4, 'Arabic Name 12/4', 'English Name12/4', 42.00, 'Arabic DescriptionArabic DescriptionArabic Description', 'Arabic DescriptionArabic DescriptionArabic Description', 1, '2021-12-03 22:38:13', '2021-12-03 22:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'defult.png',
  `back_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'front-default.png',
  `front_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'back-default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color`, `back_image`, `front_image`, `created_at`, `updated_at`) VALUES
(96, 33, '#112be8', 'front-default.png', 'aHNgwFL85tpzl9c9LnYmQ2dbfVO5INC1JPQjIjZ5.png', '2021-12-03 22:38:14', '2021-12-03 22:38:14'),
(97, 33, '#db0a0a', 'front-default.png', 'SVPFktNVBemQdhcGcPjwUEHxv6EPl8dzvv99NH5I.png', '2021-12-03 22:38:14', '2021-12-03 22:38:14'),
(98, 33, '#00db1a', 'front-default.png', 'Iqd3UeaBtd5zo8ccFSTL3QDbMGf2PowNxrA3J2F0.png', '2021-12-03 22:38:15', '2021-12-03 22:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_seller_images`
--

CREATE TABLE `product_seller_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_products_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_seller_images`
--

INSERT INTO `product_seller_images` (`id`, `image`, `seller_products_id`, `created_at`, `updated_at`) VALUES
(108, 'EizBMfdnCIyAHhXz.png', 100, '2021-12-11 22:50:08', '2021-12-11 22:50:08'),
(109, 'r41geJTUZzu0wyM3.png', 100, '2021-12-11 22:50:09', '2021-12-11 22:50:09'),
(110, 'f9Qi9l93luhVSYKT.png', 100, '2021-12-11 22:50:10', '2021-12-11 22:50:10'),
(111, 'v4DJ3lXaAOLQ8sHy.png', 101, '2021-12-11 22:53:43', '2021-12-11 22:53:43'),
(112, 'Ay1GPq1KjpcOy8ls.png', 101, '2021-12-11 22:53:44', '2021-12-11 22:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `product_color_id`, `quantity`, `size_id`, `created_at`, `updated_at`) VALUES
(79, 30, '89', '50', '2', '2021-11-28 19:39:40', '2021-12-06 20:01:41'),
(80, 30, '89', '23', '2', '2021-11-28 19:39:40', '2021-12-06 20:01:41'),
(81, 31, '90', '37', '2', '2021-11-28 19:42:59', '2021-12-06 20:01:41'),
(82, 31, '90', '47', '3', '2021-11-28 19:42:59', '2021-12-06 21:42:13'),
(83, 31, '91', '45', '4', '2021-11-28 19:42:59', '2021-12-06 21:42:15'),
(84, 31, '91', '25', '5', '2021-11-28 19:42:59', '2021-12-06 20:01:39'),
(85, 31, '91', '46', '3', '2021-11-28 19:42:59', '2021-12-06 21:42:13'),
(86, 31, '92', '47', '2', '2021-11-28 19:42:59', '2021-12-06 20:01:41'),
(87, 31, '92', '46', '4', '2021-11-28 19:42:59', '2021-12-06 21:42:15'),
(88, 32, '93', '40', '2', '2021-12-02 23:11:16', '2021-12-06 20:01:41'),
(89, 32, '94', '44', '5', '2021-12-02 23:11:16', '2021-12-06 20:01:39'),
(90, 32, '95', '50', '3', '2021-12-02 23:11:16', '2021-12-06 21:42:14'),
(91, 33, '96', '19', '2', '2021-12-03 22:38:14', '2021-12-06 21:42:12'),
(92, 33, '96', '49', '3', '2021-12-03 22:38:14', '2021-12-06 21:42:14'),
(93, 33, '96', '20', '5', '2021-12-03 22:38:14', '2021-12-06 21:42:13'),
(94, 33, '97', '41', '4', '2021-12-03 22:38:15', '2021-12-06 21:42:15'),
(95, 33, '97', '42', '1', '2021-12-03 22:38:15', '2021-12-06 21:42:13'),
(96, 33, '97', '40', '2', '2021-12-03 22:38:15', '2021-12-06 21:42:13'),
(97, 33, '98', '40', '5', '2021-12-03 22:38:15', '2021-12-06 20:01:39'),
(98, 33, '98', '49', '2', '2021-12-03 22:38:15', '2021-12-06 20:01:41'),
(99, 33, '98', '40', '4', '2021-12-03 22:38:15', '2021-12-06 21:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `seller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(8,2) NOT NULL DEFAULT 0.00,
  `totle_order` double NOT NULL DEFAULT 0,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'seller_images/default.png',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `printing_field` double NOT NULL DEFAULT 0,
  `redbubble` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_by_amazon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `etsy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `teespring` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `spreadshirt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `zazzle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `teepublic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `others` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `work_online_lap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `work_online_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `make_designs_from_social` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make_designs_from_paid_ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make_designs_from_organically` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stores_links` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_yourself` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `addres` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `status`, `seller`, `name`, `user_name`, `email`, `password`, `total_price`, `totle_order`, `phone`, `image`, `country`, `image_country`, `printing_field`, `redbubble`, `merch_by_amazon`, `etsy`, `teespring`, `spreadshirt`, `zazzle`, `teepublic`, `others`, `work_online_lap`, `work_online_mobile`, `make_designs_from_social`, `make_designs_from_paid_ad`, `make_designs_from_organically`, `stores_links`, `about_yourself`, `remember_token`, `created_at`, `updated_at`, `addres`, `address`) VALUES
(1, 'true', '1', 'Seller', 'Seller', 'super_admin@app.com', '$2y$10$8iprgYBerJ/33bLBhtchG.WMdpuNigndQTManxJOuYM5tZlr4bPfa', 0.00, 0, '12312123', 'seller_images/G0PvN33jqlrmXdRsoCneEsA9ND9pQ3psb1ZlJ55r.jpg', NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAUCAYAAAB8gkaAAAAA+0lEQVR4XmOISWb49JyP4f9/BtpjBplOht8SPQz/92hgSlIbgy1jmMXwn2UGw/8GX4b/v5kwFVELwy2DYZdChv+0ClYMy0CYVsGK1TJaBSuD+CTWr+gWIWPzZu73D220Tv7X1z9MKWaQWSaD1WfIWGKJxP89T/b8pxQQZRkIs8xh+d9wtuH/77+/0c0gGhBtGQy7bHX5//zrc3RziAKD0zK6BSPVEgjXdC68SV96svT73PrckzU1NYcpxQwMODI1AzBTMwAzNQMwUzOAMiRVMDbLgMUVgwa6QmpgdMuABTEDH7oiamGYZTQJNnQMsoxmwYaOgc0C2gUbKgYAqNY2dVJpCUIAAAAASUVORK5CYII=', 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:38', '2021-12-11 15:54:18', '', 'Address'),
(2, 'true', '1', 'Seller1', 'Seller1', 'admin1@app.com', '$2y$10$SuLdSM/6eP0UAhTB0WwYxuczv71fpGQuOGHEYXJrRZYOfmyvFCYBu', 0.00, 0, '12312123', 'seller_images/default.png', 'sudan', NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:38', '2021-10-01 18:22:38', '', NULL),
(3, 'true', '1', 'Seller2', 'Seller2', 'Seller2@app.com', '$2y$10$Ag3d/6ur0Cak4OAGkrPNLe3ayq6GwVxas21wzsjAKU8Z.Oxpndvza', 0.00, 0, '12312123', 'seller_images/default.png', 'sudan', NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:39', '2021-10-01 18:22:39', '', NULL),
(4, 'true', '1', 'Seller3', 'Seller3', 'Seller3@app.com', '$2y$10$dZwTTlsHgk3RCRC5hgtRmu4IUvP/nBGIRsieptAD0XBTCXI0B0hPi', 0.00, 0, '12312123', 'seller_images/default.png', 'sudan', NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:39', '2021-10-01 18:22:39', '', NULL),
(5, 'false', '1', 'Seller4', 'Seller4', 'admin4@app.com', '$2y$10$XWK9Gg0lfGJphrWW56dBJ.FZf1xXI2329jysij2iANqQGOYBjB.LS', 0.00, 0, '12312123', 'seller_images/default.png', 'sudan', NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:39', '2021-10-01 18:22:39', '', NULL),
(6, 'false', '1', 'Seller5', 'Seller', 'admin5@app.com', '$2y$10$XWK9Gg0lfGJphrWW56dBJ.FZf1xXI2329jysij2iANqQGOYBjB.LS', 0.00, 0, '12312123', 'seller_images/default.png', 'sudan', NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:39', '2021-10-01 18:22:39', '', NULL),
(7, 'false', '1', 'Seller6', 'Seller6', 'Seller16@app.com', '$2y$10$XWK9Gg0lfGJphrWW56dBJ.FZf1xXI2329jysij2iANqQGOYBjB.LS', 0.00, 0, '12312123', 'seller_images/default.png', 'sudan', NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:39', '2021-10-01 18:22:39', '', NULL),
(8, 'true', '1', 'Seller7', 'Seller7', 'Seller7@app.com', '$2y$10$XWK9Gg0lfGJphrWW56dBJ.FZf1xXI2329jysij2iANqQGOYBjB.LS', 0.00, 0, '12312123', 'seller_images/default.png', 'sudan', NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:39', '2021-10-02 09:02:25', '', NULL),
(9, 'true', '1', 'ali', NULL, 'test@gmail.com', '$2y$10$Ki6bJ3kYcqNX7Q.XY4CGpuIjiqnh2WnuHP5yo6gB.jL50L1iEUlNC', 0.00, 0, '123123123', 'seller_images/default.png', 'Andorra', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAUCAYAAAB8gkaAAAABeUlEQVR4Xu3TzSuDAQDH8ecP8LLFspXmZRShRLPSis1IRLs4qKHNbSUpYnkJa4bnEQfLUl62npmXlXBYRLOthmS2wjzeS3JwcHRQ++Hmwi7PDrTD9/y5/H6EsMAUJvjL+KnymgGE74mI3SjyEOCU/tY9EcMi9fex620B3hgOguuC6GEeqxQ+ey0cpAKkugI75irsz8th6y9kH7PrS+FSV8FvaIRTJ8bpYBaOJ4sx11XELuZeyMd0Wx0ueuvxfqVFkCzBU3sSQuPpMHcqsTWRxR62SYkw1iLDoa4MwR4FvAYpzmZz4Z+TwNgkx8kyjz3swRUPSiMBM8THs46LG0c2XqyJYGghRpvEYJxx7GFeSz5MHUqESBEuu1PgM+eAmeHhzibCiKocR0tp7GGvgTgs9imxSrVihdLAolfBbmwGPayCZaABj55k9rCvtd3ucnBAZ3yushJT2mrQgzK45zNxu5fA7hq/n/d0jYuAIxXnG4nRO3WkYtj/xD4AnmOmmt/O4U8AAAAASUVORK5CYII=', 1, '0', 'Merch By Amazon', '0', 'Teespring (Spring)', '0', 'Zazzle', '0', '0', 'Pc/lap top', 'Mobile', 'Free from social', NULL, 'Organically (site traffic)', 'https://egymerch.com/en/sellers', 'https://egymerch.com/en/sellershttps://egymerch.com/en/sellershttps://egymerch.com/en/sellers', NULL, '2021-10-12 21:52:09', '2021-10-12 21:53:05', '', NULL),
(10, 'true', '1', 'Mahmoud Seller', NULL, 'Test@seller.com', '$2y$10$kL7RNYDXlXdLv.FHz/1kFurovPbInymLVrzgJIMcNuMQ0h5vjGScq', 0.00, 0, 'd', 'seller_images/default.png', NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAUCAYAAAB8gkaAAAAB7ElEQVR4XmMwMIn+7Rhc+V9SP/a/kVv+f237LDDbJawaTIP4IHEQG6RO1ijhv4pl6n8zz8L/DRZ+//fauhCNGXSsU7/6JzT/V7dJBxsAwiALIjO7wDRMDCQPUwcSB1ncUz/l+ot9B/YTixmM3fJ/g1yakN8PdjHIsNC0DhQaWT44uQ1sGYi9ctPh/6QABj2zhB9FDXP+K5gl/feJbfzvEVkHZpc1zwPTID5IHMQGqQNZYhtQBnZIo2fc2+ORsY+JxQzaFklfQQZlV06H+yyleBI4jkA0zGcgeZA6UPCC4hAUd+25TTfvzpl3mFgMDsb8mplgzSBfgFwNsii9bAqYBvFB4iB5mDpQHIKCk+Rg1DaO/QEzCORykE9AbJBFIBrEB4nDLAL51tKnBCxPejCaxX8DxQ9IMyi1wXwGEwPxQeLIYiDLQHHWGl3w8HJl3XliMTgYQQZUtS0Exw0opSH7DJbyQPKweITlO5KDUd8y8RssfkA+cAmtBgcXyBcgGsSH+QykDiQGsowsn3k7pz13d8367Gif+tnFKQOMQWxf7/wv6GLo6qYnltxBNxAfZgD67j66d2kFGC6U1+5CdwGtMMPxiNhT6EmUVpi+wXhn+pyN6MUKrfAwDsZnO/esQ6/kaIUZ9to630evvmmFAUOxrmQB62SbAAAAAElFTkSuQmCC', 1, '0', '0', '0', '0', '0', 'Zazzle', '0', '0', 'Pc/lap top', 'Mobile', NULL, 'Paid ads', NULL, 'sd', 'sd', NULL, '2021-10-15 20:36:51', '2021-12-09 22:02:21', '', NULL),
(13, 'true', '1', 'rhman', NULL, 'rhman@test.com', '$2y$10$FwMY6MZHrqWDJAoYDwrl5OT2CR/EtRIVcvrdSSQyHJWDdwrSbjxN2', 0.00, 0, '01125802099', 'seller_images/default.png', NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAUCAYAAAB8gkaAAAAB7ElEQVR4XmMwMIn+7Rhc+V9SP/a/kVv+f237LDDbJawaTIP4IHEQG6RO1ijhv4pl6n8zz8L/DRZ+//fauhCNGXSsU7/6JzT/V7dJBxsAwiALIjO7wDRMDCQPUwcSB1ncUz/l+ot9B/YTixmM3fJ/g1yakN8PdjHIsNC0DhQaWT44uQ1sGYi9ctPh/6QABj2zhB9FDXP+K5gl/feJbfzvEVkHZpc1zwPTID5IHMQGqQNZYhtQBnZIo2fc2+ORsY+JxQzaFklfQQZlV06H+yyleBI4jkA0zGcgeZA6UPCC4hAUd+25TTfvzpl3mFgMDsb8mplgzSBfgFwNsii9bAqYBvFB4iB5mDpQHIKCk+Rg1DaO/QEzCORykE9AbJBFIBrEB4nDLAL51tKnBCxPejCaxX8DxQ9IMyi1wXwGEwPxQeLIYiDLQHHWGl3w8HJl3XliMTgYQQZUtS0Exw0opSH7DJbyQPKweITlO5KDUd8y8RssfkA+cAmtBgcXyBcgGsSH+QykDiQGsowsn3k7pz13d8367Gif+tnFKQOMQWxf7/wv6GLo6qYnltxBNxAfZgD67j66d2kFGC6U1+5CdwGtMMPxiNhT6EmUVpi+wXhn+pyN6MUKrfAwDsZnO/esQ6/kaIUZ9to630evvmmFAUOxrmQB62SbAAAAAElFTkSuQmCC', 1, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', 'Mobile', NULL, NULL, NULL, NULL, 'rr', NULL, '2021-11-03 23:48:52', '2021-11-03 23:48:52', '', NULL),
(14, 'false', '0', 'rhman', NULL, 'rhman@user.com', '$2y$10$88cHYtgG02M9K6SyPDbk/.x6SbDhzVGD4Ca.se1Fsr1ss4sDYV8OO', 0.00, 0, 'rhman@test.com', 'seller_images/default.png', NULL, NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-04 01:16:38', '2021-11-04 01:16:38', '', NULL),
(16, 'false', '0', 'ali 30-11', NULL, 'ali@user.com', '$2y$10$jHMtzVRHbjaQAIsJyZ5tyeSM.jCMy7u.HdniWn7gfH7Jvr3GWZhGW', 0.00, 0, '1234567', 'seller_images/default.png', NULL, NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-29 21:26:25', '2021-11-29 21:26:25', '0', '0'),
(17, 'true', '1', 'Seller', 'Seller', 'aa@app.com', '$2y$10$8iprgYBerJ/33bLBhtchG.WMdpuNigndQTManxJOuYM5tZlr4bPfa', 0.00, 0, '12312123', 'seller_images/default.png', 'sudan', NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', '0', 'make_designs_use', NULL, NULL, NULL, 'make_designs_use', NULL, '2021-10-01 18:22:38', '2021-11-29 23:07:35', '', 'Address'),
(18, 'false', '1', 'aaaa', NULL, 'aaaa@app.com', '$2y$10$FuwcrBaECvEsT50w0HFWSupDYOWykr23th8seJ3upfe3wMw1BKrMy', 0.00, 0, '1234567', 'seller_images/default.png', NULL, NULL, 1, 'Redbubble', 'Merch By Amazon', '0', '0', '0', '0', 'Teepublic', '0', 'Pc/lap top', 'Mobile', 'Free from social', NULL, 'Organically (site traffic)', 'http://127.0.0.1:8000/en/sellers', 'http://127.0.0.1:8000/en/sellershttp://127.0.0.1:8000/en/sellershttp://127.0.0.1:8000/en/sellers', NULL, '2021-12-01 21:30:08', '2021-12-01 21:30:08', '0', '0'),
(19, 'false', '1', 'as', NULL, 'as@app.com', '$2y$10$t2/aj8uTpPW94aW.GFvcmurQukbDJNKSebth9R9XDOURkFz7T01Mi', 0.00, 0, '12312323', 'seller_images/default.png', NULL, NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', 'Pc/lap top', 'Mobile', 'Free from social', 'Paid ads', NULL, NULL, 'http://127.0.0.1:8000/en/sellers', NULL, '2021-12-01 21:32:02', '2021-12-01 21:32:02', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `seller_products`
--

CREATE TABLE `seller_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sub_totle` double NOT NULL DEFAULT 0,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `selling_price` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views_count` int(11) DEFAULT NULL,
  `rates` int(11) DEFAULT NULL,
  `defult_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` bigint(20) DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_products`
--

INSERT INTO `seller_products` (`id`, `store_id`, `seller_id`, `category_id`, `product_id`, `count_order`, `sub_totle`, `title`, `tag`, `description`, `price`, `selling_price`, `created_at`, `updated_at`, `views_count`, `rates`, `defult_image`, `image`, `logo`) VALUES
(100, '49', 1, '4', '33', '0', 0, 'fssgs', '[{\"value\":\"fsf\"}]', 'gsfgsfg', 56, 14, '2021-12-11 22:50:07', '2021-12-11 22:50:07', NULL, NULL, 'pm6v9TCx09gJNRyl.png', NULL, 'QO0bFh3kVCij3Pam.png'),
(101, '49', 1, '4', '33', '0', 0, 'gfsg', '[{\"value\":\"sfgsfgs\"}]', 'fgsfgsf', 55, 13, '2021-12-11 22:53:42', '2021-12-11 22:53:42', NULL, NULL, 'mkrEx8IBVhrJk9ky.png', NULL, 'rlyKAD3ejXFQxvnP.png');

-- --------------------------------------------------------

--
-- Table structure for table `seller_product_colors`
--

CREATE TABLE `seller_product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_product_id` bigint(20) UNSIGNED NOT NULL,
  `product_color_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_product_colors`
--

INSERT INTO `seller_product_colors` (`id`, `seller_product_id`, `product_color_id`) VALUES
(192, 100, 96),
(193, 100, 98),
(194, 100, 97),
(195, 101, 96),
(196, 101, 97),
(197, 101, 98);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_companies`
--

CREATE TABLE `shipping_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `main` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_companies`
--

INSERT INTO `shipping_companies` (`id`, `name`, `active`, `main`, `created_at`, `updated_at`) VALUES
(9, 'aramex', 1, 1, '2021-10-05 12:13:27', '2021-10-05 12:13:27'),
(11, 'Fedex', 1, NULL, '2021-10-05 12:53:27', '2021-10-05 12:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_company_prices`
--

CREATE TABLE `shipping_company_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_company_id` int(11) NOT NULL,
  `governorate_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_company_prices`
--

INSERT INTO `shipping_company_prices` (`id`, `shipping_company_id`, `governorate_id`, `price`, `created_at`, `updated_at`) VALUES
(7, 9, 2, 20.00, '2021-10-05 12:13:27', '2021-10-05 12:13:27'),
(8, 9, 3, 59.00, '2021-10-05 12:13:27', '2021-10-05 12:13:27'),
(9, 9, 4, 50.00, '2021-10-05 12:13:27', '2021-10-05 12:13:27'),
(10, 9, 5, 10.00, '2021-10-05 12:13:27', '2021-10-05 12:13:27'),
(11, 9, 6, 30.00, '2021-10-05 12:13:27', '2021-10-05 12:13:27'),
(12, 9, 10, 10.00, '2021-10-05 12:13:27', '2021-10-05 12:13:27'),
(22, 11, 5, 10.00, '2021-10-05 12:53:27', '2021-10-05 12:53:27'),
(23, 11, 6, 30.00, '2021-10-05 12:53:27', '2021-10-05 12:53:27'),
(24, 11, 10, 10.00, '2021-10-05 12:53:27', '2021-10-05 12:53:27'),
(29, 11, 1, 12.00, '2021-10-06 05:58:41', '2021-10-06 05:58:41'),
(30, 11, 2, 50.00, '2021-10-06 05:58:55', '2021-10-06 05:58:55'),
(31, 11, 3, 60.00, '2021-10-06 05:58:55', '2021-10-06 05:58:55'),
(32, 11, 4, 30.00, '2021-10-06 06:00:47', '2021-10-06 06:00:47');

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
(1, 'XXL', '2021-10-01 18:22:39', '2021-10-01 18:22:39'),
(2, 'LG', '2021-10-01 18:22:39', '2021-10-01 18:22:39'),
(3, 'LM', '2021-10-01 18:22:40', '2021-10-01 18:22:40'),
(4, 'XL', '2021-10-01 18:22:40', '2021-10-01 18:22:40'),
(5, 'MD', '2021-10-01 18:22:40', '2021-10-01 18:22:40');

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
(1, 4, 1, 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 'VNQW3bf20otRcqqlB2k5vUwV5LENAr4EpYgyufbH.jpg', 'http://127.0.0.1:8000/en/Dashboard/slides/create', 'aa', 'aa', '2021-12-01 19:13:52', '2021-12-01 19:13:52'),
(2, 4, 1, 'English title', 'English Big Title', 'English Sub Title', 'Arabic title', 'Arabic Big Title', 'Arabic Sub Title', '5u05dROHstCpTIlASp78NJWdRA8vOUuCFL05BaCC.jpg', 'http://127.0.0.1:8000/Dashboard/slides/create', 'English Button Text', 'Arabic Button Text', '2021-12-01 21:56:20', '2021-12-01 21:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'store_images/logo.jpg',
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'store_images/bg.jpg',
  `active` double NOT NULL DEFAULT 1,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `seller_id`, `name`, `logo`, `banner`, `active`, `bio`, `created_at`, `updated_at`) VALUES
(48, 1, 'store one 12/3', 'store_images/0wEgi9mRveKnlPXvfSRI626WFqRfSRNmpuTK3NkM.jpg', 'store_images/uGwjkhDGGOWpjC3V9lwc0uhMhjlf3C4CUFQFUJ7p.jpg', 1, 'descrption descrption descrption descrption descrption descrption descrption descrption descrption', '2021-12-03 18:45:59', '2021-12-03 18:45:59'),
(49, 1, 'store toe 12/3', 'store_images/lbjyRLzG8H9XAuZkhnlZ87Pl07lUw8xqmekGvtz9.png', 'store_images/5sk9TZARSmJsC5gYEV9GDtb7K1DbisnXDWoYc3ba.png', 1, 'descrption descrption descrption descrption descrption descrption', '2021-12-03 18:46:35', '2021-12-04 22:46:24'),
(50, 1, 'store three 12/3', 'store_images/y8FV7uluGo6JM7WhPavk5F8ieQ4ENhwnCoAyOsRJ.jpg', 'store_images/a06famyPpj3eWXRj69wo9OfPhY9CTmtDEdm490Qk.jpg', 1, 'descrption descrption descrption descrption descrption descrption descrption descrption', '2021-12-03 18:47:08', '2021-12-03 18:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'ahmed sami', 'ahmedsamigeek@gmail.com', NULL, '$2y$10$XWK9Gg0lfGJphrWW56dBJ.FZf1xXI2329jysij2iANqQGOYBjB.LS', NULL, '2021-10-05 07:27:04', NULL, '01014340346');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `governorate_id` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `long` decimal(10,7) DEFAULT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `governorate_id`, `city`, `full_address`, `place_name`, `user_id`, `long`, `lat`, `created_at`, `updated_at`) VALUES
(1, 1, 'mansoura', 'دميره - طلخا  دقهليه', 'البيت', 1, NULL, NULL, '2021-10-04 04:25:07', '2021-10-04 04:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE `user_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_product_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_reviews`
--

INSERT INTO `user_reviews` (`id`, `user_id`, `seller_product_id`, `comment`, `publish`, `created_at`, `updated_at`) VALUES
(1, 1, 41, 'الموقع دا لوز اللوز و كمان المنتجات فشيخه اوى ', 'yes', '2021-10-10 18:08:02', '2021-10-10 18:08:02'),
(2, 1, 40, 'المنتجات كويسه و عجبتنى', 'yes', '2021-10-10 18:08:02', '2021-10-10 18:08:02'),
(3, 1, 44, 'المنتجات جودتها عاليه و حلو', 'yes', '2021-10-04 04:25:07', '2021-10-04 04:25:07'),
(4, 1, 43, 'حبيت الموقع و تصميمه مين الجماد الى عامله دا ', 'yes', '2021-10-04 04:25:07', '2021-10-04 04:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `payway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `seller_id` int(11) NOT NULL,
  `status_en` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_ar` enum('تحت الانتظار','تم التحويل','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'تحت الانتظار',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `price`, `phone`, `payway`, `message`, `seller_id`, `status_en`, `status_ar`, `created_at`, `updated_at`) VALUES
(1, 120, 1025801099, 'vodafone cash', NULL, 13, 'confirmed', 'تم التحويل', '2021-11-09 17:42:45', '2021-11-20 16:44:51'),
(2, 120, 1258054, 'volvo', '-', 13, 'pending', 'تحت الانتظار', '2021-11-09 17:43:27', '2021-11-09 17:43:27'),
(3, 120, 112580109, 'volvo', '-', 13, 'pending', 'تحت الانتظار', '2021-11-10 15:08:59', '2021-11-10 15:08:59'),
(4, 20, 1125801099, 'volvo', '-', 13, 'pending', 'تحت الانتظار', '2021-11-13 23:14:40', '2021-11-13 23:14:40'),
(5, 120, 12345668, 'vodafone cash', '-', 13, 'pending', 'تحت الانتظار', '2021-11-17 18:24:00', '2021-11-17 18:24:00'),
(6, 120, 0, 'vodafone cash', '-', 13, 'pending', 'تحت الانتظار', '2021-11-21 13:31:02', '2021-11-21 13:31:02'),
(7, 12, 125848, 'vodafone cash', 'mahmoud from egymersh', 13, 'pending', 'تحت الانتظار', '2021-11-21 13:31:28', '2021-11-21 13:34:31'),
(8, 150, 12345678, 'فودافون كاش', NULL, 1, 'confirmed', 'تحت الانتظار', '2021-11-29 21:32:37', '2021-11-29 21:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_product_id` int(11) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `comment_manuals`
--
ALTER TABLE `comment_manuals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_manuals_order_id_foreign` (`order_id`),
  ADD KEY `comment_manuals_admin_id_foreign` (`admin_id`);

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
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_eyes`
--
ALTER TABLE `notification_eyes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_eyes_notification_id_foreign` (`notification_id`),
  ADD KEY `notification_eyes_seller_id_foreign` (`seller_id`);

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
-- Indexes for table `order_comments`
--
ALTER TABLE `order_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_seller_products_id_foreign` (`seller_products_id`),
  ADD KEY `purchases_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_sellers`
--
ALTER TABLE `order_sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
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
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_orders_order_id_foreign` (`order_id`),
  ADD KEY `product_orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_seller_images`
--
ALTER TABLE `product_seller_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_seller_images_seller_products_id_foreign` (`seller_products_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_seller_id_foreign` (`seller_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_products_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `seller_product_colors`
--
ALTER TABLE `seller_product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_product_colors_seller_product_id_foreign` (`seller_product_id`),
  ADD KEY `seller_product_colors_product_color_id_foreign` (`product_color_id`);

--
-- Indexes for table `shipping_companies`
--
ALTER TABLE `shipping_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_company_prices`
--
ALTER TABLE `shipping_company_prices`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment_manuals`
--
ALTER TABLE `comment_manuals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification_eyes`
--
ALTER TABLE `notification_eyes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_comments`
--
ALTER TABLE `order_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_sellers`
--
ALTER TABLE `order_sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `product_seller_images`
--
ALTER TABLE `product_seller_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seller_products`
--
ALTER TABLE `seller_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `seller_product_colors`
--
ALTER TABLE `seller_product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `shipping_companies`
--
ALTER TABLE `shipping_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipping_company_prices`
--
ALTER TABLE `shipping_company_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_manuals`
--
ALTER TABLE `comment_manuals`
  ADD CONSTRAINT `comment_manuals_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_manuals_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order_sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_eyes`
--
ALTER TABLE `notification_eyes`
  ADD CONSTRAINT `notification_eyes_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_eyes_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `purchases_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_seller_products_id_foreign` FOREIGN KEY (`seller_products_id`) REFERENCES `seller_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `product_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order_sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `seller_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_seller_images`
--
ALTER TABLE `product_seller_images`
  ADD CONSTRAINT `product_seller_images_seller_products_id_foreign` FOREIGN KEY (`seller_products_id`) REFERENCES `seller_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seller_products`
--
ALTER TABLE `seller_products`
  ADD CONSTRAINT `seller_products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seller_product_colors`
--
ALTER TABLE `seller_product_colors`
  ADD CONSTRAINT `seller_product_colors_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seller_product_colors_seller_product_id_foreign` FOREIGN KEY (`seller_product_id`) REFERENCES `seller_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
