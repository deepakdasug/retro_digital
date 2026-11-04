-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2026 at 10:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retro_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `excerpt` text NOT NULL,
  `content_blocks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content_blocks`)),
  `author_name` varchar(255) NOT NULL,
  `author_designation` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `focus_keyword` varchar(255) DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `robots_meta` varchar(255) NOT NULL DEFAULT 'index, follow',
  `schema_markup` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`schema_markup`)),
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `post_status` varchar(20) NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `comment_status` tinyint(1) NOT NULL DEFAULT 1,
  `reading_time` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `image_path`, `excerpt`, `content_blocks`, `author_name`, `author_designation`, `category`, `tags`, `meta_title`, `meta_description`, `focus_keyword`, `canonical_url`, `robots_meta`, `schema_markup`, `is_published`, `post_status`, `published_at`, `comment_status`, `reading_time`, `created_at`, `updated_at`) VALUES
(1, 'The Future of IT Asset Disposition: Why Circular Economy Matters', 'the-future-of-it-asset-disposition-why-circular-economy-matters', 'blog_images/Y3gjM7ve0gjuQmndWfglcYL1AdDjeegV8s8pOKDR.jpg', 'Discover how modern companies are turning old IT equipment into a strategic advantage by focusing on responsible disposal and data security.', '[{\"type\":\"heading\",\"size\":null,\"alignment\":null,\"content\":\"Introduction to ITAD\"},{\"type\":\"paragraph\",\"size\":null,\"alignment\":null,\"content\":\"IT Asset Disposition (ITAD) is no longer just about throwing away old computers. It is a strategic process that ensures data security, maximizes return on investment, and supports environmental sustainability.\"},{\"type\":\"subheading\",\"size\":null,\"alignment\":null,\"content\":\"Why Data Security is Paramount\"},{\"type\":\"paragraph\",\"size\":null,\"alignment\":null,\"content\":\"Every hard drive contains sensitive data. Proper ITAD ensures that this data is securely wiped or physically destroyed according to NIST standards before the equipment leaves your premises.\"},{\"type\":\"image\",\"size\":\"w-1\\/2\",\"alignment\":\"mx-auto\",\"image_path\":\"blog_content_images\\/dor7mxE4iV6U4rDzvHkJ8ZDuVi7Z5htxYr7GxB4v.jpg\",\"content\":null},{\"type\":\"heading\",\"size\":null,\"alignment\":null,\"content\":\"The Environmental Impact\"},{\"type\":\"paragraph\",\"size\":null,\"alignment\":null,\"content\":\"By refurbishing and remarketing functional equipment, we reduce e-waste and prevent harmful materials from entering landfills. This aligns with global ESG (Environmental, Social, and Governance) goals.\"},{\"type\":\"subheading\",\"size\":null,\"alignment\":null,\"content\":\"\"}]', 'Deepak Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 1, 'draft', '2026-10-22 12:04:48', 1, NULL, '2026-10-22 12:04:48', '2026-10-22 14:23:59'),
(2, 'test post', 'test-post', NULL, 'A short introduction to responsible IT asset lifecycle planning.', '[{\"type\":\"html\",\"content\":\"<p>Retrotech helps organizations manage IT assets responsibly through secure data handling, reuse, and practical lifecycle planning. A clear process can support stronger oversight, reduce waste, and make each project easier to coordinate.<\\/p>\"}]', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 1, 'draft', '2026-10-23 08:25:31', 1, NULL, '2026-10-23 07:36:55', '2026-10-23 08:25:31'),
(3, 'Retrotech Blog Editor Verification', 'retrotech-blog-editor-verification', NULL, 'A brief sample post to verify rich text editing and publishing.', '[{\"type\":\"html\",\"content\":\"<p>Welcome to our test article. CKEditor is accepting content. Edit screen verified. ksd lkajsdf ajdldksfjalk adsdfalkdjfaldsf\\u00a0<\\/p>\"}]', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 1, 'draft', '2026-10-23 08:25:13', 1, NULL, '2026-10-23 07:44:26', '2026-10-23 11:41:28'),
(4, 'Diwali', 'diwali', NULL, 'jhbnhih', '[{\"type\":\"html\",\"content\":\"<p>rom Wikipedia, the free encyclopedia<\\/p><figure class=\\\"table\\\"><table><thead><tr><th><strong>Diwali<\\/strong><\\/th><\\/tr><\\/thead><tbody><tr><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Rangoli\\\">Rangoli<\\/a> decorations, made using coloured fine powder or sand, are popular during Diwal<\\/td><\\/tr><\\/tbody><\\/table><\\/figure><p>\\u00a0<\\/p><p><i>\\\"Deepawali\\\" and \\\"Dipawali\\\" redirect here. For other uses, see <\\/i><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Deepavali_(disambiguation)\\\"><i>Deepavali (disambiguation)<\\/i><\\/a><i>.<\\/i><\\/p><figure class=\\\"table\\\"><table><thead><tr><th><strong>Diwali<\\/strong><\\/th><th>\\u00a0<\\/th><\\/tr><\\/thead><tbody><tr><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Rangoli\\\">Rangoli<\\/a> decorations, made using coloured fine powder or sand, are popular during Diwali.<\\/td><td>\\u00a0<\\/td><\\/tr><tr><td>Official name<\\/td><td><i>D\\u012bp\\u0101val\\u012b<\\/i><\\/td><\\/tr><tr><td>Also called<\\/td><td>Deepavali, Deepawali<\\/td><\\/tr><tr><td>Observed\\u00a0by<\\/td><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindus\\\">Hindus<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Jains\\\">Jains<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Sikhs\\\">Sikhs<\\/a>,<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-1\\\">[1]<\\/a> some <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Buddhism\\\">Buddhists<\\/a> (notably <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Newar_Buddhism\\\">Newar Buddhists<\\/a><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-diwaliBuddhist-2\\\">[2]<\\/a>)<\\/td><\\/tr><tr><td>Type<\\/td><td>Religious, cultural, seasonal<\\/td><\\/tr><tr><td>Significance<\\/td><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#Religious_significance\\\"><i>See below<\\/i><\\/a><\\/td><\\/tr><tr><td>Celebrations<\\/td><td><ul><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diya_(light)\\\">Diya<\\/a> lighting<\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Puja_(Hinduism)\\\"><i>puja<\\/i><\\/a> (worship and prayer)<\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hukka_Paati\\\"><i>Hukka Paati<\\/i><\\/a> in <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Mithila_region\\\">Mithila region<\\/a><\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Homa_(ritual)\\\"><i>havan<\\/i><\\/a> (fire offering)<\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Vrata\\\"><i>vrat<\\/i><\\/a> (fasting)<\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/D%C4%81na\\\"><i>d\\u0101na<\\/i><\\/a> (charity)<\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Mel%C4%81\\\"><i>mel\\u0101<\\/i><\\/a> (fairs\\/shows)<\\/li><li>home cleansing and decoration<\\/li><li>fireworks<\\/li><li>gifts<\\/li><li>and partaking in a feast and <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Sweets_from_the_Indian_subcontinent\\\">sweets<\\/a><\\/li><\\/ul><\\/td><\\/tr><tr><td>Begins<\\/td><td><ul><li>Ashwayuja 27 or Ashwayuja 28 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar#amanta\\\">amanta<\\/a> tradition)<\\/li><li>Kartika 12 or Kartika 13 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar#purnimanta\\\">purnimanta<\\/a> tradition)<\\/li><\\/ul><\\/td><\\/tr><tr><td>Ends<\\/td><td><ul><li>Kartika 2 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar#amanta\\\">amanta<\\/a> tradition)<\\/li><li>Kartika 17 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar#purnimanta\\\">purnimanta<\\/a> tradition)<\\/li><\\/ul><\\/td><\\/tr><tr><td>Date<\\/td><td>Ashvin Krishna Trayodashi, Ashvin Krishna Chaturdashi, Ashvin Amavasya, Kartik Shukla Pratipada, Kartik Shukla Dwitiya<\\/td><\\/tr><tr><td>2026\\u00a0date<\\/td><td><p>November<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-3\\\">[3]<\\/a><\\/p><ul><li>6 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Dhanteras\\\">Dhanteras<\\/a>\\/Yama Deepam\\/Kwah Puja\\/Kaag Tihar)<\\/li><li>7 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Naraka_Chaturdashi\\\">Naraka Chaturdashi<\\/a>\\/Kali Chaudas\\/Hanuman Puja\\/Chhoti Diwali\\/Khicha Puja\\/<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kukur_Tihar\\\">Kukur Tihar<\\/a>)<\\/li><li>8 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Lakshmi_Puja\\\">Lakshmi Puja<\\/a>\\/<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kali_Puja\\\">Kali Puja<\\/a>\\/Sharda Puja\\/Kedar Gauri Vrat\\/Sa Puja\\/Gai Tihar)<\\/li><li>9 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Govardhan_Puja\\\">Govardhan Puja<\\/a>\\/<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Balipratipada\\\">Balipratipada<\\/a>\\/<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Mha_Puja\\\">Mha Puja<\\/a>\\/Goru Puja)<\\/li><li>10 (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bhai_Dooj\\\">Bhai Dooj<\\/a>\\/<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Vishwakarma_Puja\\\">Vishwakarma Puja<\\/a>\\/<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Indian_New_Year\'s_days\\\">Gujarati New Year<\\/a>\\/Kija Puja)<\\/li><\\/ul><\\/td><\\/tr><tr><td>2027\\u00a0date<\\/td><td>29 October 2027<\\/td><\\/tr><tr><td>2028\\u00a0date<\\/td><td>17 October 2028<\\/td><\\/tr><tr><td>Duration<\\/td><td>5 or 6 days (regional variations)<\\/td><\\/tr><tr><td>Frequency<\\/td><td>Annual<\\/td><\\/tr><tr><td>Related\\u00a0to<\\/td><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali_(Jainism)\\\">Diwali (Jainism)<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bandi_Chhor_Divas\\\">Bandi Chhor Divas<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Tihar_(festival)\\\">Tihar<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Swanti_(festival)\\\">Swanti<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Sohrai\\\">Sohrai<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bandna\\\">Bandna<\\/a><\\/td><\\/tr><\\/tbody><\\/table><\\/figure><figure class=\\\"table\\\"><table><thead><tr><th><strong>Explanatory note<br>on Hindu festival dates<\\/strong><\\/th><\\/tr><\\/thead><tbody><tr><td><p>The <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Astronomical_basis_of_the_Hindu_calendar\\\">Hindu calendar<\\/a> is lunisolar but most festival dates are specified using the lunar portion of the calendar. A lunar day is uniquely identified by three calendar elements: <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Astronomical_basis_of_the_Hindu_calendar#chandramasa\\\"><i>m\\u0101sa<\\/i><\\/a> (lunar month), <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Astronomical_basis_of_the_Hindu_calendar#paksha\\\"><i>pak\\u1e63a<\\/i><\\/a> (lunar fortnight) and <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Astronomical_basis_of_the_Hindu_calendar#tithi\\\"><i>tithi<\\/i><\\/a> (lunar day).<\\/p><p>Furthermore, when specifying the masa, one of two traditions are applicable, viz. <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar#amanta\\\"><i>am\\u0101nta<\\/i><\\/a> \\/ <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar#purnimanta\\\"><i>p\\u016br\\u1e47im\\u0101nta<\\/i><\\/a>. If a festival falls in the waning phase of the moon, these two traditions identify the same lunar day as falling in two different (but successive) masa.<\\/p><p>A lunar year is shorter than a solar year by about eleven days. As a result, most Hindu festivals occur on different days in successive years on the Gregorian calendar.<\\/p><\\/td><\\/tr><tr><td><ul><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Template:Hindu_festival_date_info\\\">v<\\/a><\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Template_talk:Hindu_festival_date_info\\\">t<\\/a><\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Special:EditPage\\/Template:Hindu_festival_date_info\\\">e<\\/a><\\/li><\\/ul><\\/td><\\/tr><\\/tbody><\\/table><\\/figure><figure class=\\\"table\\\"><table><tbody><tr><td>Part of <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Category:Hinduism\\\">a series<\\/a> on<\\/td><\\/tr><tr><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hinduism\\\">Hinduism<\\/a><\\/td><\\/tr><tr><td>\\u00a0<\\/td><\\/tr><tr><td><ul><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindus\\\"><strong>Hindus<\\/strong><\\/a><\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_mythology\\\"><strong>Mythology<\\/strong><\\/a><\\/li><\\/ul><\\/td><\\/tr><tr><td><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_synthesis\\\"><strong>Origin<\\/strong><\\/a><strong> and <\\/strong><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/History_of_Hinduism\\\"><strong>history<\\/strong><\\/a><\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Sampradaya\\\"><strong>Sampradaya (traditions)<\\/strong><\\/a><\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_deities\\\"><strong>Deities<\\/strong><\\/a><\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_philosophy\\\"><strong>Concepts<\\/strong><\\/a><\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><p><strong>Practices<\\/strong><\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_philosophy\\\"><strong>Philosophical schools<\\/strong><\\/a><\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/List_of_Hindu_gurus_and_sants\\\"><strong>Gurus, <\\/strong><i><strong>rishi<\\/strong><\\/i><strong>, philosophers<\\/strong><\\/a><\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_texts\\\"><strong>Texts<\\/strong><\\/a><\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><p>\\u00a0<\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><\\/td><\\/tr><tr><td><p><strong>Hindu culture and society<\\/strong><\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<ul><li>\\u00a0<ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<ul><li>\\u00a0<ul><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<ul><li>\\u00a0<\\/li><\\/ul><\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Portal:Hinduism\\\"><strong>Other topics<\\/strong><\\/a><\\/p><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><li>\\u00a0<\\/li><li>\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><ul><li>\\u00a0<\\/li><\\/ul><\\/td><\\/tr><tr><td><ul><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Glossary_of_Hinduism_terms\\\"><strong>Glossary<\\/strong><\\/a><\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Outline_of_Hinduism\\\"><strong>Outline<\\/strong><\\/a><\\/li><li><strong>\\u00a0<\\/strong><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Portal:Hinduism\\\"><strong>Hinduism portal<\\/strong><\\/a><\\/li><\\/ul><\\/td><\\/tr><tr><td><ul><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Template:Hinduism\\\">v<\\/a><\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Template_talk:Hinduism\\\">t<\\/a><\\/li><li><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Special:EditPage\\/Template:Hinduism\\\">e<\\/a><\\/li><\\/ul><\\/td><\\/tr><\\/tbody><\\/table><\\/figure><figure class=\\\"table\\\"><table><thead><tr><th><strong>Deepavali<\\/strong><\\/th><th>\\u00a0<\\/th><\\/tr><\\/thead><tbody><tr><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/UNESCO_Intangible_Cultural_Heritage_Lists\\\"><strong>UNESCO Intangible Cultural Heritage<\\/strong><\\/a><\\/td><td>\\u00a0<\\/td><\\/tr><tr><td>Country<\\/td><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/India\\\">India<\\/a><\\/td><\\/tr><tr><td>Reference<\\/td><td><a href=\\\"https:\\/\\/ich.unesco.org\\/en\\/RL\\/02312\\\">02312<\\/a><\\/td><\\/tr><tr><td>Region<\\/td><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Template:UNESCO_Representative_List_of_the_Intangible_Cultural_Heritage_of_Humanity\\/APA\\\">Asia and the Pacific<\\/a><\\/td><\\/tr><tr><td>Inscription history<\\/td><td>\\u00a0<\\/td><\\/tr><tr><td>Inscription<\\/td><td>2025 (20th session)<\\/td><\\/tr><tr><td><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/UNESCO_Intangible_Cultural_Heritage_Lists\\\">List<\\/a><\\/td><td>Representative<\\/td><\\/tr><\\/tbody><\\/table><\\/figure><p><strong>Dipavali<\\/strong> (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/IAST\\\">IAST<\\/a>: <i>D\\u012bp\\u0101val\\u012b<\\/i>),<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-4\\\">[a]<\\/a> commonly known as <strong>Diwali<\\/strong> (<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Help:IPA\\/English\\\">\\/d\\u026a\\u02c8w\\u0251\\u02d0li\\u02d0\\/<\\/a>),<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-Mead-2008a-5\\\">[4]<\\/a> is the <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_festival\\\">Hindu festival<\\/a> of lights, with variations celebrated in other <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Indian_religions\\\">Indian religions<\\/a> such as <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Jainism\\\">Jainism<\\/a> and <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Sikhism\\\">Sikhism<\\/a>.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-6\\\">[b]<\\/a> It is associated with the spiritual victory or triumph of <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Dharma\\\"><i>Dharma<\\/i><\\/a> over <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Adharma\\\"><i>Adharma<\\/i><\\/a>, light over darkness, good over evil, and knowledge over ignorance.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-Heiligman31-7\\\">[5]<\\/a><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-htoday-8\\\">[6]<\\/a><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-Mead-2008b-9\\\">[7]<\\/a><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-melton252-10\\\">[8]<\\/a> Diwali is celebrated during the <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar\\\">Hindu lunisolar<\\/a> months of <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Ashvin_(month)\\\">Ashvin<\\/a> (according to the <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar#amanta\\\">amanta<\\/a> tradition) and <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kartika_(month)\\\">K\\u0101rtika<\\/a> \\u2013 between around mid-October and mid-November.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-16\\\">[14]<\\/a> The celebrations generally last five or six days.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-FOOTNOTEFieldhouse2017150%E2%80%93151-17\\\">[15]<\\/a><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-18\\\">[16]<\\/a><\\/p><p>Diwali is connected to various religious events, deities, and personalities, such as being the day <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Rama\\\">Rama<\\/a> returned to his <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kosala\\\">kingdom<\\/a> in <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Ayodhya_(Ramayana)\\\">Ayodhya<\\/a> with his wife <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Sita\\\">Sita<\\/a> and his brother <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Lakshmana\\\">Lakshmana<\\/a> after defeating the demon king <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Ravana\\\">Ravana<\\/a>.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-dhcd-19\\\">[17]<\\/a> It is also widely associated with <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Lakshmi\\\">Lakshmi<\\/a>, the goddess of prosperity, and <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Ganesha\\\">Ganesha<\\/a>, the god of wisdom and the remover of obstacles.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-Suzanne_Barchers_2013-20\\\">[18]<\\/a> Other regional traditions connect the holiday to <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Vishnu\\\">Vishnu<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Krishna\\\">Krishna<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Durga\\\">Durga<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Shiva\\\">Shiva<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kali\\\">Kali<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hanuman\\\">Hanuman<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kubera\\\">Kubera<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Yama\\\">Yama<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Yami\\\">Yami<\\/a>, <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Dhanvantari\\\">Dhanvantari<\\/a>, or <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Vishvakarman\\\">Vishvakarman<\\/a>.<\\/p><p>Primarily a <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindus\\\">Hindu<\\/a> festival, variations of Diwali are also celebrated by adherents of other faiths.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-FOOTNOTEFieldhouse2017150%E2%80%93151-17\\\">[15]<\\/a> The <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Jainism\\\">Jains<\\/a> observe their <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali_(Jainism)\\\">own Diwali<\\/a> which marks the final liberation of <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Mahavira\\\">Mahavira<\\/a>.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-Sharma2006-21\\\">[19]<\\/a><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-N._Upadhye,_Review_1982_pp._231%E2%80%93232-22\\\">[20]<\\/a> The <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Sikhism\\\">Sikhs<\\/a> celebrate <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bandi_Chhor_Divas\\\">Bandi Chhor Divas<\\/a> to mark the release of <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Guru_Hargobind\\\">Guru Hargobind<\\/a> from a <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Mughal_Empire\\\">Mughal<\\/a> prison.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-23\\\">[21]<\\/a> <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Newar_Buddhism\\\">Newar Buddhists<\\/a>, unlike other <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Buddhism\\\">Buddhists<\\/a>, celebrate Diwali by worshipping Lakshmi, while the Hindus of <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Eastern_India\\\">Eastern India<\\/a> and <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bangladesh\\\">Bangladesh<\\/a> generally, celebrate Diwali by worshipping the <a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kali\\\">goddess Kali<\\/a>.<a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-MK72-24\\\">[22]<\\/a><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-diwaliBuddhist-2\\\">[2]<\\/a><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali#cite_note-Prem_Saran_2012_175-25\\\">[23]<\\/a><\\/p><p>During the festival, celebrants illuminate their homes,<\\/p>\"}]', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 1, 'draft', '2026-10-23 07:57:02', 1, NULL, '2026-10-23 07:57:02', '2026-10-23 07:58:43');
INSERT INTO `blog_posts` (`id`, `title`, `slug`, `image_path`, `excerpt`, `content_blocks`, `author_name`, `author_designation`, `category`, `tags`, `meta_title`, `meta_description`, `focus_keyword`, `canonical_url`, `robots_meta`, `schema_markup`, `is_published`, `post_status`, `published_at`, `comment_status`, `reading_time`, `created_at`, `updated_at`) VALUES
(5, 'Chhath Pooja', 'chhath-pooja', 'blog_images/UGlp4UlTbAL5vbyCYYIHGFrxqnj38DFt6XnyJ0pf.jpg', 'Chhath Pooja of Bihar', '[{\"type\":\"html\",\"content\":\"<h1 class=\\\"firstHeading mw-first-heading\\\" style=\'border-width: 0px; color: rgb(16, 20, 24); font-family: \\\"Linux Libertine\\\", Georgia, Times, \\\"Source Serif 4\\\", serif; font-size: 1.8em; line-height: 1.375; margin: 0px; padding: 0px\' id=\\\"firstHeading\\\"><span class=\\\"mw-page-title-main\\\">Chhath<\\/span><\\/h1><div class=\\\"vector-dropdown mw-portlet mw-portlet-lang\\\" style=\\\"float: right; margin-right: calc(-12px)\\\" id=\\\"p-lang-btn\\\"><input type=\\\"checkbox\\\"><\\/div><div class=\\\"vector-page-toolbar\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; text-align: start\\\"><div class=\\\"vector-page-toolbar-container\\\" style=\\\"font-size: 14px; margin-bottom: 1px\\\"><div style=\\\"margin: 0px -8px\\\" id=\\\"left-navigation\\\"><div class=\\\"vector-menu vector-menu-tabs mw-portlet mw-portlet-associated-pages\\\" id=\\\"p-associated-pages\\\"><div class=\\\"vector-menu-content\\\" style=\\\"width: 95.8125px\\\"><ul class=\\\"vector-menu-content-list\\\" style=\\\"margin: 0px; padding: 0px\\\"><li class=\\\"selected mw-list-item vector-tab-noicon\\\" style=\\\"margin: 0px 8px\\\"><a style=\\\"color: rgb(32, 33, 34) !important\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath\\\" title=\\\"View the content page [alt-c]\\\"><span>Article<\\/span><\\/a><\\/li><li class=\\\"mw-list-item vector-tab-noicon\\\" style=\\\"margin: 0px 8px\\\"><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Talk:Chhath\\\" title=\\\"Discuss improvements to the content page [alt-t]\\\"><span>Talk<\\/span><\\/a><\\/li><\\/ul><\\/div><\\/div><\\/div><div class=\\\"vector-collapsible\\\" style=\\\"margin: 0px -8px\\\" id=\\\"right-navigation\\\"><div class=\\\"vector-menu vector-menu-tabs mw-portlet mw-portlet-views\\\" id=\\\"p-views\\\"><div class=\\\"vector-menu-content\\\" style=\\\"width: 180.812px\\\"><ul class=\\\"vector-menu-content-list\\\" style=\\\"margin: 0px; padding: 0px\\\"><li class=\\\"selected mw-list-item vector-menu-item--collapsible vector-tab-noicon\\\" style=\\\"margin: 0px 8px\\\"><a style=\\\"color: rgb(32, 33, 34) !important\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath\\\"><span>Read<\\/span><\\/a><\\/li><li class=\\\"mw-list-item vector-menu-item--collapsible vector-tab-noicon\\\" style=\\\"margin: 0px 8px\\\"><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/w\\/index.php?title=Chhath&amp;action=edit\\\" title=\\\"Edit this page [alt-e]\\\"><span>Edit<\\/span><\\/a><\\/li><li class=\\\"mw-list-item vector-menu-item--collapsible vector-tab-noicon\\\" style=\\\"margin: 0px 8px\\\"><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/w\\/index.php?title=Chhath&amp;action=history\\\" title=\\\"Past revisions of this page [alt-h]\\\"><span>View history<\\/span><\\/a><\\/li><\\/ul><\\/div><\\/div><\\/div><\\/div><\\/div><p><input type=\\\"checkbox\\\"><\\/p><div class=\\\"vector-page-toolbar\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; text-align: start\\\"><div><div><div><div class=\\\"vector-dropdown-content\\\" style=\\\"background-color: rgb(255, 255, 255); font-size: 14px; height: 0px; padding: 16px; width: max-content\\\"><div class=\\\"vector-unpinned-container\\\" id=\\\"vector-page-tools-unpinned-container\\\"><div class=\\\"vector-page-tools vector-pinnable-element\\\" style=\\\"font-size: 14px\\\" id=\\\"vector-page-tools\\\"><div class=\\\"vector-pinnable-header vector-page-tools-pinnable-header vector-pinnable-header-unpinned\\\" style=\\\"line-height: 1.6; margin-bottom: 6px; padding-bottom: 6px\\\"><div class=\\\"vector-pinnable-header-label\\\" style=\\\"border-width: 0px; font-size: 14px; margin: 0px 0.5rem 0px 0px; padding: 0px; vertical-align: middle\\\">\\u00a0<\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><p><\\/p><div class=\\\"vector-page-toolbar\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; text-align: start\\\"><div class=\\\"vector-page-toolbar-container\\\" style=\\\"font-size: 14px; margin-bottom: 1px\\\"><div class=\\\"vector-collapsible\\\" style=\\\"margin: 0px -8px\\\" id=\\\"right-navigation\\\"><div class=\\\"vector-dropdown vector-page-tools-dropdown\\\" id=\\\"vector-page-tools-dropdown\\\"><div class=\\\"vector-dropdown-content\\\" style=\\\"background-color: rgb(255, 255, 255); font-size: 14px; height: 0px; padding: 16px; width: max-content\\\"><div class=\\\"vector-unpinned-container\\\" id=\\\"vector-page-tools-unpinned-container\\\"><div class=\\\"vector-page-tools vector-pinnable-element\\\" style=\\\"font-size: 14px\\\" id=\\\"vector-page-tools\\\"><div class=\\\"vector-menu mw-portlet mw-portlet-tb\\\" id=\\\"p-tb\\\"><div class=\\\"vector-menu-heading\\\" style=\\\"color: rgb(84, 89, 93); margin: 6px 0px; padding: 6px 0px\\\">\\u00a0<\\/div><div class=\\\"vector-menu-content\\\"><ul class=\\\"vector-menu-content-list\\\" style=\\\"margin: 0px; padding: 0px\\\"><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item mw-list-item-js\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item mw-list-item-js\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><\\/ul><\\/div><\\/div><div class=\\\"vector-menu mw-portlet mw-portlet-coll-print_export\\\" id=\\\"p-coll-print_export\\\"><div class=\\\"vector-menu-heading\\\" style=\\\"color: rgb(84, 89, 93); margin: 6px 0px; padding: 6px 0px\\\">\\u00a0<\\/div><div class=\\\"vector-menu-content\\\"><ul class=\\\"vector-menu-content-list\\\" style=\\\"margin: 0px; padding: 0px\\\"><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><\\/ul><\\/div><\\/div><div class=\\\"vector-menu mw-portlet mw-portlet-wikibase-otherprojects\\\" id=\\\"p-wikibase-otherprojects\\\"><div class=\\\"vector-menu-heading\\\" style=\\\"color: rgb(84, 89, 93); margin: 6px 0px; padding: 6px 0px\\\">\\u00a0<\\/div><div class=\\\"vector-menu-content\\\"><ul class=\\\"vector-menu-content-list\\\" style=\\\"margin: 0px; padding: 0px\\\"><li class=\\\"wb-otherproject-link wb-otherproject-commons mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><li class=\\\"wb-otherproject-link wb-otherproject-wikibase-dataitem mw-list-item\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\">\\u00a0<\\/li><\\/ul><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><div class=\\\"vector-column-end no-font-mode-scale\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; margin-top: 2.8rem; text-align: start; width: 12.25rem\\\"><div class=\\\"vector-sticky-pinned-container\\\"><div class=\\\"vector-pinned-container\\\" style=\\\"background-color: rgb(255, 255, 255); margin-bottom: 2rem; padding: 0px 16px\\\" id=\\\"vector-appearance-pinned-container\\\"><div class=\\\"vector-appearance vector-pinnable-element\\\" style=\\\"font-size: 14px\\\" id=\\\"vector-appearance\\\"><div class=\\\"vector-pinnable-header vector-appearance-pinnable-header vector-pinnable-header-pinned\\\" style=\\\"line-height: 1.6; margin-bottom: 6px; padding-bottom: 6px\\\"><div class=\\\"vector-pinnable-header-label\\\" style=\\\"border-width: 0px; font-size: 14px; margin: 0px 0.5rem 0px 0px; padding: 0px; vertical-align: middle\\\"><strong>Appearance<\\/strong><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><p>hide<\\/p><div class=\\\"vector-column-end no-font-mode-scale\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; margin-top: 2.8rem; text-align: start; width: 12.25rem\\\"><div class=\\\"vector-sticky-pinned-container\\\"><div class=\\\"vector-pinned-container\\\" style=\\\"background-color: rgb(255, 255, 255); margin-bottom: 2rem; padding: 0px 16px\\\" id=\\\"vector-appearance-pinned-container\\\"><div class=\\\"vector-appearance vector-pinnable-element\\\" style=\\\"font-size: 14px\\\" id=\\\"vector-appearance\\\"><div class=\\\"mw-portlet mw-portlet-skin-client-prefs-vector-feature-custom-font-size vector-menu\\\" id=\\\"skin-client-prefs-vector-feature-custom-font-size\\\"><div class=\\\"vector-menu-heading\\\" style=\\\"color: rgb(84, 89, 93); margin: 6px 0px; padding: 6px 0px\\\">Text<\\/div><div class=\\\"vector-menu-content\\\"><ul class=\\\"vector-menu-content-list\\\" style=\\\"margin: 0px; padding: 0px\\\"><li class=\\\"mw-list-item mw-list-item-js\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\"><div><div class=\\\"cdx-radio\\\" style=\\\"margin-bottom: 6px\\\"><input type=\\\"radio\\\"><span class=\\\"cdx-label__label__text\\\">Small<\\/span><\\/div><div class=\\\"cdx-radio\\\" style=\\\"margin-bottom: 6px\\\"><input type=\\\"radio\\\"><span class=\\\"cdx-label__label__text\\\">Standard<\\/span><\\/div><div class=\\\"cdx-radio\\\" style=\\\"margin-bottom: 0px\\\"><input type=\\\"radio\\\"><span class=\\\"cdx-label__label__text\\\">Large<\\/span><\\/div><\\/div><\\/li><\\/ul><\\/div><\\/div><div class=\\\"mw-portlet mw-portlet-skin-client-prefs-vector-feature-limited-width vector-menu\\\" id=\\\"skin-client-prefs-vector-feature-limited-width\\\"><div class=\\\"vector-menu-heading\\\" style=\\\"color: rgb(84, 89, 93); margin: 6px 0px; padding: 6px 0px\\\">Width<\\/div><div class=\\\"vector-menu-content\\\"><ul class=\\\"vector-menu-content-list\\\" style=\\\"margin: 0px; padding: 0px\\\"><li class=\\\"mw-list-item mw-list-item-js\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\"><div><div class=\\\"cdx-radio\\\" style=\\\"margin-bottom: 6px\\\"><input type=\\\"radio\\\"><span class=\\\"cdx-label__label__text\\\">Standard<\\/span><\\/div><div class=\\\"cdx-radio\\\" style=\\\"margin-bottom: 0px\\\"><input type=\\\"radio\\\"><span class=\\\"cdx-label__label__text\\\">Wide<\\/span><\\/div><\\/div><\\/li><\\/ul><\\/div><\\/div><div class=\\\"mw-portlet mw-portlet-skin-client-prefs-skin-theme vector-menu\\\" id=\\\"skin-client-prefs-skin-theme\\\"><div class=\\\"vector-menu-heading\\\" style=\\\"color: rgb(84, 89, 93); margin: 6px 0px; padding: 6px 0px\\\">Color<\\/div><div class=\\\"vector-menu-content\\\"><ul class=\\\"vector-menu-content-list\\\" style=\\\"margin: 0px; padding: 0px\\\"><li class=\\\"mw-list-item mw-list-item-js\\\" style=\\\"margin-bottom: 0.1em; padding: 0px\\\"><div><div class=\\\"cdx-radio\\\" style=\\\"margin-bottom: 6px\\\"><input type=\\\"radio\\\"><span class=\\\"cdx-label__label__text\\\">Automatic<\\/span><\\/div><div class=\\\"cdx-radio\\\" style=\\\"margin-bottom: 6px\\\"><input type=\\\"radio\\\"><span class=\\\"cdx-label__label__text\\\">Light<\\/span><\\/div><div class=\\\"cdx-radio\\\" style=\\\"margin-bottom: 0px\\\"><input type=\\\"radio\\\"><span class=\\\"cdx-label__label__text\\\">Dark<\\/span><\\/div><\\/div><\\/li><\\/ul><\\/div><\\/div><\\/div><\\/div><\\/div><\\/div><div class=\\\"vector-body ve-init-mw-desktopArticleTarget-targetContainer\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; line-height: 1.625; text-align: start\\\" id=\\\"bodyContent\\\"><div class=\\\"vector-body-before-content\\\"><div class=\\\"mw-indicators\\\" style=\\\"float: right; font-size: 14px; line-height: 1.6; margin-top: 8px\\\">\\u00a0<\\/div><div class=\\\"noprint\\\" style=\\\"font-size: 14px; margin-top: 8px\\\" id=\\\"siteSub\\\">From Wikipedia, the free encyclopedia<\\/div><div id=\\\"contentSub\\\"><div id=\\\"mw-content-subtitle\\\">\\u00a0<\\/div><\\/div><\\/div><div class=\\\"mw-body-content\\\" style=\\\"margin-top: 16px\\\" id=\\\"mw-content-text\\\"><div class=\\\"mw-content-ltr mw-parser-output\\\"><div class=\\\"hatnote navigation-not-searchable\\\" style=\\\"margin-bottom: 0.5em; padding-left: 1.6em\\\" id=\\\"mwBA\\\"><i>See also: <\\/i><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bharat-Nepal_Maitri_Chhath_Ghat\\\" title=\\\"Bharat-Nepal Maitri Chhath Ghat\\\"><i>Bharat-Nepal Maitri Chhath Ghat<\\/i><\\/a><i><span>\\u00a0<\\/span>and <\\/i><a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bharat_-_Nepal_Jhim_Chhath_Ghat\\\" title=\\\"Bharat - Nepal Jhim Chhath Ghat\\\"><i>Bharat - Nepal Jhim Chhath Ghat<\\/i><\\/a><\\/div><figure class=\\\"table table-style-align-right\\\" style=\\\"width: 22em\\\"><table class=\\\"infobox vevent\\\" style=\\\"background-color: rgb(248, 249, 250); border: 0.666667px solid rgb(162, 169, 177); color: rgb(32, 33, 34); font-size: 14.08px; line-height: 1.5em; margin-bottom: 0.5em; margin-right: 0px; margin-top: 0.5em; padding: 0.2em\\\"><thead><tr><th class=\\\"infobox-above hd\\\" style=\\\"background-color: transparent; color: inherit; font-size: 17.6px; text-align: center; vertical-align: top\\\" colspan=\\\"2\\\"><strong>Chhath Puja<br><\\/strong><a class=\\\"extiw\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/mai.wikipedia.org\\/wiki\\/%E0%A4%9B%E0%A4%A0%20%E0%A4%AA%E0%A5%82%E0%A4%9C%E0%A4%BE\\\" title=\\\"mai:\\u091b\\u0920 \\u092a\\u0942\\u091c\\u093e\\\"><strong>\\ud805\\udc95\\ud805\\udc9a \\ud805\\udca3\\ud805\\udcb4\\ud805\\udc96\\ud805\\udcb0<\\/strong><\\/a><strong> (<\\/strong><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Maithili_language\\\" title=\\\"Maithili language\\\"><strong>Maithili<\\/strong><\\/a><strong>)<br><\\/strong><a class=\\\"extiw\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/bh.wikipedia.org\\/wiki\\/%E0%A4%9B%E0%A4%A0%20%E0%A4%AA%E0%A5%82%E0%A4%9C%E0%A4%BE\\\" title=\\\"bh:\\u091b\\u0920 \\u092a\\u0942\\u091c\\u093e\\\"><strong>\\u091b\\u0920 \\u092a\\u0942\\u091c\\u093e<\\/strong><\\/a><strong> (<\\/strong><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bhojpuri_language\\\" title=\\\"Bhojpuri language\\\"><strong>Bhojpuri<\\/strong><\\/a><strong>)<\\/strong><\\/th><\\/tr><\\/thead><tbody><tr><td class=\\\"infobox-image\\\" style=\\\"text-align: center; vertical-align: top\\\" colspan=\\\"2\\\"><p><a class=\\\"mw-file-description\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/File:JanakpurChhathParvaFestival.jpg\\\"><span class=\\\"mw-default-size\\\"><img class=\\\"image_resized mw-file-element mw-file-upright\\\" style=\\\"border-width: 0px; height: auto; vertical-align: middle; width: 250px\\\" src=\\\"https:\\/\\/thumb.wikimedia.org\\/wikipedia\\/commons\\/thumb\\/0\\/0f\\/JanakpurChhathParvaFestival.jpg\\/250px-JanakpurChhathParvaFestival.jpg?utm_source=en.wikipedia.org&amp;utm_campaign=parser&amp;utm_content=thumbnail\\\" alt=\\\"Devotees gathered at a pond to worship the sun god Surya and his sister Chhathi Maiya in Janakpurdham, Madhesh Province, Nepal\\\" width=\\\"250\\\" height=\\\"140\\\"><\\/span><\\/a><\\/p><div class=\\\"infobox-caption\\\">Devotees gathered at a pond to worship the sun god <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/List_of_solar_deities\\\" title=\\\"List of solar deities\\\">Surya<\\/a> and his sister <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Shashthi\\\" title=\\\"Shashthi\\\">Chhathi Maiya<\\/a> in <a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Janakpurdham\\\" title=\\\"Janakpurdham\\\">Janakpurdham<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Madhesh_Province\\\" title=\\\"Madhesh Province\\\">Madhesh Province<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Nepal\\\" title=\\\"Nepal\\\">Nepal<\\/a> (2008)<\\/div><\\/td><\\/tr><tr><th class=\\\"infobox-label\\\" style=\\\"vertical-align: top\\\" scope=\\\"row\\\">Also called<\\/th><td class=\\\"infobox-data\\\" style=\\\"vertical-align: top\\\"><div class=\\\"hlist\\\"><ul style=\\\"margin: 0px; padding: 0px\\\"><li style=\\\"margin: 0px\\\">Chhaith<\\/li><li style=\\\"margin: 0px\\\">Chhath Parva<\\/li><li style=\\\"margin: 0px\\\">Chhath Puja<\\/li><li style=\\\"margin: 0px\\\">Dala Chhath<\\/li><li style=\\\"margin: 0px\\\">Dala Puja<\\/li><li style=\\\"margin: 0px\\\">Surya Shashthi<\\/li><\\/ul><\\/div><\\/td><\\/tr><tr><th class=\\\"infobox-label\\\" style=\\\"vertical-align: top\\\" scope=\\\"row\\\">Observed<span>\\u00a0<\\/span>by<\\/th><td class=\\\"infobox-data\\\" style=\\\"vertical-align: top\\\"><p><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Indian_people\\\" title=\\\"Indian people\\\">Indians<\\/a> and <a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Nepali_people\\\" title=\\\"Nepali people\\\">Nepalese<\\/a><\\/p><ul style=\\\"margin: 0.3em 0px 0px 1.6em; padding: 0px\\\"><li style=\\\"margin-bottom: 0.1em\\\"><a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Maithil\\\" title=\\\"Maithil\\\">Maithils<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bhojpuri_people\\\" title=\\\"Bhojpuri people\\\">Bhojpuriyas<\\/a>, <a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Magahi_people\\\" title=\\\"Magahi people\\\">Magahis<\\/a>, and<\\/li><\\/ul><p><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Tharu_people\\\" title=\\\"Tharu people\\\">Tharus<\\/a><\\/p><\\/td><\\/tr><tr><th class=\\\"infobox-label\\\" style=\\\"vertical-align: top\\\" scope=\\\"row\\\">Type<\\/th><td class=\\\"infobox-data\\\" style=\\\"vertical-align: top\\\">Cultural, historical, religious<\\/td><\\/tr><tr><th class=\\\"infobox-label\\\" style=\\\"vertical-align: top\\\" scope=\\\"row\\\">Significance<\\/th><td class=\\\"infobox-data summary\\\" style=\\\"vertical-align: top\\\">Veneration of the sun god <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/List_of_solar_deities\\\" title=\\\"List of solar deities\\\">Surya<\\/a> and his sister <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Shashthi\\\" title=\\\"Shashthi\\\">Chhathi Maiya<\\/a><\\/td><\\/tr><tr><th class=\\\"infobox-label\\\" style=\\\"vertical-align: top\\\" scope=\\\"row\\\">Date<\\/th><td class=\\\"infobox-data\\\" style=\\\"vertical-align: top\\\">13 November \\u2013 16 November (2026)<\\/td><\\/tr><tr><th class=\\\"infobox-label\\\" style=\\\"vertical-align: top\\\" scope=\\\"row\\\">Duration<\\/th><td class=\\\"infobox-data\\\" style=\\\"vertical-align: top\\\">4 days<\\/td><\\/tr><tr><th class=\\\"infobox-label\\\" style=\\\"vertical-align: top\\\" scope=\\\"row\\\">Frequency<\\/th><td class=\\\"infobox-data\\\" style=\\\"vertical-align: top\\\">Annual<\\/td><\\/tr><\\/tbody><\\/table><\\/figure><\\/div><\\/div><\\/div><p><a class=\\\"mw-file-description\\\" style=\\\"border-width: 0px; color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/File:Chhath_Puja_at_Basuki_Bihari_North.jpg\\\" id=\\\"mwDA\\\"><img class=\\\"image_resized mw-file-element\\\" style=\\\"background-color: rgb(255, 255, 255); border: 0.666667px solid rgb(200, 204, 209); color: rgb(32, 33, 34); height: auto; margin: 3px; vertical-align: middle; width: 250px\\\" src=\\\"https:\\/\\/thumb.wikimedia.org\\/wikipedia\\/commons\\/thumb\\/6\\/68\\/Chhath_Puja_at_Basuki_Bihari_North.jpg\\/250px-Chhath_Puja_at_Basuki_Bihari_North.jpg?utm_source=en.wikipedia.org&amp;utm_campaign=parser&amp;utm_content=thumbnail\\\" width=\\\"250\\\" height=\\\"188\\\"><\\/a><\\/p><div class=\\\"vector-body ve-init-mw-desktopArticleTarget-targetContainer\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; line-height: 1.625; text-align: start\\\" id=\\\"bodyContent\\\"><div><div><figure class=\\\"mw-default-size\\\" style=\\\"background-color: rgb(248, 249, 250); color: rgb(32, 33, 34); float: right; line-height: 0; margin: 0.5em 0px 1.3em 1.4em; text-align: center\\\"><figcaption style=\\\"background-color: inherit; font-size: 14.144px; line-height: 1.4em; padding: 0px 6px 6px; text-align: start\\\">Chhath Puja at Chaudhary Pokhar in <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Basuki_Bihari\\\" title=\\\"Basuki Bihari\\\" id=\\\"mwDw\\\">Basuki Bihari<\\/a> town of Bihar<\\/figcaption><\\/figure><p style=\\\"margin: 0.5em 0px 1em\\\" id=\\\"mwEA\\\"><b><strong>Chhath<\\/strong><\\/b>, also called <b><strong>Chhath Puja<\\/strong><\\/b>, is an ancient <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hinduism\\\" title=\\\"Hinduism\\\" id=\\\"mwEw\\\">Hindu<\\/a> festival native to <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/East_India\\\" title=\\\"East India\\\" id=\\\"mwFA\\\">East India<\\/a> and southern <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Nepal\\\" title=\\\"Nepal\\\" id=\\\"mwFQ\\\">Nepal<\\/a>.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-1\\\" id=\\\"mwFg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwGA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwFw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">1<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwGQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> It is celebrated<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-2\\\" id=\\\"mwGg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwHA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwGw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">2<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwHQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> primarily in the Indian state of <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bihar\\\" title=\\\"Bihar\\\" id=\\\"mwHg\\\">Bihar<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Jharkhand\\\" title=\\\"Jharkhand\\\" id=\\\"mwHw\\\">Jharkhand<\\/a>, and <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Purvanchal\\\" title=\\\"Purvanchal\\\" id=\\\"mwIA\\\">eastern Uttar Pradesh<\\/a>;<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-3\\\" id=\\\"mwIQ\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwIw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwIg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">3<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwJA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-4\\\" id=\\\"mwJQ\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwJw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwJg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">4<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwKA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> and <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Koshi_Province\\\" title=\\\"Koshi Province\\\" id=\\\"mwKQ\\\">Koshi<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Gandaki_Province\\\" title=\\\"Gandaki Province\\\" id=\\\"mwKg\\\">Gandaki<\\/a>, <a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Bagmati\\\" title=\\\"Bagmati\\\" id=\\\"mwKw\\\">Bagmati<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Lumbini_Province\\\" title=\\\"Lumbini Province\\\" id=\\\"mwLA\\\">Lumbini<\\/a>, and <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Madhesh_Province\\\" title=\\\"Madhesh Province\\\" id=\\\"mwLQ\\\">Madhesh<\\/a> provinces of Nepal.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-5\\\" id=\\\"mwLg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwMA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwLw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">5<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwMQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-6\\\" id=\\\"mwMg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwNA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwMw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">6<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwNQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-7\\\" id=\\\"mwNg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwOA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwNw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">7<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwOQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-8\\\" id=\\\"mwOg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwPA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwOw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">8<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwPQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> In major urban centres like <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Delhi\\\" title=\\\"Delhi\\\" id=\\\"mwPg\\\">Delhi<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Mumbai\\\" title=\\\"Mumbai\\\" id=\\\"mwPw\\\">Mumbai<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kolkata\\\" title=\\\"Kolkata\\\" id=\\\"mwQA\\\">Kolkata<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Janakpur\\\" title=\\\"Janakpur\\\" id=\\\"mwQQ\\\">Janakpur<\\/a>, and <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kathmandu\\\" title=\\\"Kathmandu\\\" id=\\\"mwQg\\\">Kathmandu<\\/a>, the diaspora celebrates Chhath to preserve their cultural heritage.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-9\\\" id=\\\"mwQw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwRQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwRA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">9<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwRg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-10\\\" id=\\\"mwRw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwSQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwSA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">10<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwSg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-11\\\" id=\\\"mwSw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwTQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwTA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">11<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwTg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-12\\\" id=\\\"mwTw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwUQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwUA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">12<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwUg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> The festival is also celebrated by the diaspora<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-13\\\" id=\\\"mwUw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwVQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwVA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">13<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwVg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-14\\\" id=\\\"mwVw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwWQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwWA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">14<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwWg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> in countries such as the United States, Australia, Singapore, Malaysia, the United Arab Emirates, Canada, Mauritius, Japan, and the United Kingdom.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-15\\\" id=\\\"mwWw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwXQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwXA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">15<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwXg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/p><p style=\\\"margin: 0.5em 0px 1em\\\" id=\\\"mwXw\\\">During Chhath <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Puja_(Hinduism)\\\" title=\\\"Puja (Hinduism)\\\" id=\\\"mwYA\\\">Puja<\\/a>, prayers are dedicated to the <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Solar_deity\\\" title=\\\"Solar deity\\\" id=\\\"mwYQ\\\">solar deity<\\/a>, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Surya\\\" title=\\\"Surya\\\" id=\\\"mwYg\\\">Surya<\\/a>, to express gratitude for the blessings of life on Earth and to seek the fulfilment of personal wishes.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-16\\\" id=\\\"mwYw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwZQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwZA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">16<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwZg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> The Hindu goddess Chhathi Maiya (or <a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhathi_Mata\\\" title=\\\"Chhathi Mata\\\" id=\\\"mwZw\\\">Chhathi Mata<\\/a>)\\u2014the sixth form of <a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Prak%E1%B9%9Bti\\\" title=\\\"Prak\\u1e5bti\\\" id=\\\"mwaA\\\">Prakriti<\\/a> and Surya\'s sister\\u2014is also worshipped during the festival. It is celebrated for six days after <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Diwali\\\" title=\\\"Diwali\\\" id=\\\"mwaQ\\\">Deepavali<\\/a> or <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Tihar_(festival)\\\" title=\\\"Tihar (festival)\\\" id=\\\"mwag\\\">Tihar<\\/a>, until the sixth day of the <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Lunar_month\\\" title=\\\"Lunar month\\\" id=\\\"mwaw\\\">lunar month<\\/a> of Kartika (October or November) in the <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_calendar\\\" title=\\\"Hindu calendar\\\" id=\\\"mwbA\\\">Hindu calendar<\\/a> (<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Vikram_Samvat\\\" title=\\\"Vikram Samvat\\\" id=\\\"mwbQ\\\">Vikram Samvat<\\/a>), which is why it is called \'Surya Shashti Vrata\'.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-17\\\" id=\\\"mwbg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwcA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwbw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">17<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwcQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-18\\\" id=\\\"mwcg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwdA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwcw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">18<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwdQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-19\\\" id=\\\"mwdg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mweA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwdw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">19<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mweQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> The rituals are observed over three nights and four days,<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-20\\\" id=\\\"mweg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwfA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwew\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">20<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwfQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> and include holy bathing, fasting, abstaining from drinking water as a <a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Vratta\\\" title=\\\"Vratta\\\" id=\\\"mwfg\\\"><i>vrata<\\/i><\\/a> (devotion), standing in water, and offering <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Prasada\\\" title=\\\"Prasada\\\" id=\\\"mwgQ\\\"><i>prasada<\\/i><\\/a> (prayer offerings of food) and <a class=\\\"mw-redirect\\\" style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Arghya\\\" title=\\\"Arghya\\\" id=\\\"mwgw\\\"><i>arghya<\\/i><\\/a> to the rising and setting of the Sun.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-21\\\" id=\\\"mwhA\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwhg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwhQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">21<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwhw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> Some devotees also perform a <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Prostration\\\" title=\\\"Prostration\\\" id=\\\"mwiA\\\">prostration<\\/a> march as they head towards the riverbanks.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-22\\\" id=\\\"mwiQ\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwiw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwig\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">22<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwjA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> All devotees prepare similar <i>prasada<\\/i> and offerings.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-23\\\" id=\\\"mwjg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwkA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwjw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">23<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwkQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-24\\\" id=\\\"mwkg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwlA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwkw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">24<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwlQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/p><div class=\\\"mw-heading mw-heading2\\\" style=\'color: rgb(16, 20, 24); font-family: \\\"Linux Libertine\\\", Georgia, Times, \\\"Source Serif 4\\\", serif; font-size: 1.5em; line-height: 1.375; margin: 0.25em 0px; padding-bottom: 0.17em; padding-top: 0.5em\'><h2 style=\'border-width: 0px; color: inherit; font-family: \\\"Linux Libertine\\\", Georgia, Times, \\\"Source Serif 4\\\", serif; font-size: inherit; line-height: 1.375; margin: 0px 0px 0.25em; padding: 0px\' id=\\\"Traditional_food_and_offerings\\\">Traditional food and offerings<\\/h2><\\/div><p style=\\\"margin: 0.5em 0px 1em\\\" id=\\\"mwmA\\\">Chhath Puja is also marked by the preparation and offering of a variety of traditional and <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Sattvic_diet\\\" title=\\\"Sattvic diet\\\" id=\\\"mwmQ\\\">sattvic<\\/a> (pure and vegetarian) dishes that are cooked without onion or garlic. These food items hold cultural and religious importance, often passed down through generations.<\\/p><p style=\\\"margin: 0.5em 0px 1em\\\" id=\\\"mwmg\\\">Four of the most important traditional prasadas (offerings) offered during Chhath Puja are:<\\/p><ol style=\\\"margin: -0.5em 0px 0px 3.2em; padding: 0px\\\"><li style=\\\"margin-bottom: 0.1em\\\"><b><strong>Thekua<\\/strong><\\/b> \\u2013 A crispy, sweet snack made from wheat flour, <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Jaggery\\\" title=\\\"Jaggery\\\" id=\\\"mwng\\\">jaggery<\\/a>, and <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Ghee\\\" title=\\\"Ghee\\\" id=\\\"mwnw\\\">ghee<\\/a>, then deep-fried. Thekua is the most iconic offering of Chhath Puja.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-25\\\" id=\\\"mwoA\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwog\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwoQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">25<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwow\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/li><li style=\\\"margin-bottom: 0.1em\\\"><b><strong>Rasabali<\\/strong><\\/b> \\u2013 A traditional dessert made from flattened rice soaked in sweetened milk, flavored with cardamom and dry fruits.<\\/li><li style=\\\"margin-bottom: 0.1em\\\"><b><strong>Kasar (Laddoo)<\\/strong><\\/b> \\u2013 Made with powdered rice or wheat flour and jaggery, these laddoos are shaped into small balls and are considered a holy offering.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-26\\\" id=\\\"mwqA\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwqg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwqQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">26<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwqw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/li><li style=\\\"margin-bottom: 0.1em\\\"><b><strong>Rice Laddu (Peethha)<\\/strong><\\/b> \\u2013 A steamed or fried dumpling filled with jaggery and coconut, especially common in Bihar and Eastern UP.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-27\\\" id=\\\"mwrg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwsA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwrw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">27<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwsQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/li><\\/ol><p style=\\\"margin: 0.5em 0px 1em\\\" id=\\\"mwsg\\\">These recipes are not only offerings but also symbolize purity, devotion, and cultural richness associated with the Chhath festival.<\\/p><div class=\\\"mw-heading mw-heading2\\\" style=\'color: rgb(16, 20, 24); font-family: \\\"Linux Libertine\\\", Georgia, Times, \\\"Source Serif 4\\\", serif; font-size: 1.5em; line-height: 1.375; margin: 0.25em 0px; padding-bottom: 0.17em; padding-top: 0.5em\'><h2 style=\'border-width: 0px; color: inherit; font-family: \\\"Linux Libertine\\\", Georgia, Times, \\\"Source Serif 4\\\", serif; font-size: inherit; line-height: 1.375; margin: 0px 0px 0.25em; padding: 0px\' id=\\\"Significance\\\">Significance<\\/h2><\\/div><p style=\\\"margin: 0.5em 0px 1em\\\" id=\\\"mwtA\\\">Chhath Puja is dedicated to <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Surya\\\" title=\\\"Surya\\\" id=\\\"mwtQ\\\">Surya<\\/a>, the Sun God, as it is thought that the sun is visible to every being and is the basis of life of all creatures on Earth.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-28\\\" id=\\\"mwtg\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwuA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwtw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">28<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwuQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> Chhathi Maiya (or Chhathi Mata) is also worshipped on this day. According to <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Hindu_astrology\\\" title=\\\"Hindu astrology\\\" id=\\\"mwug\\\">Vedic astrology<\\/a>, Chhathi Maiya grants children long life and good health by shielding them from illnesses and diseases.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-:0-29\\\" id=\\\"mwuw\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwvQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwvA\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">29<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwvg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/p><div class=\\\"mw-heading mw-heading2\\\" style=\'color: rgb(16, 20, 24); font-family: \\\"Linux Libertine\\\", Georgia, Times, \\\"Source Serif 4\\\", serif; font-size: 1.5em; line-height: 1.375; margin: 0.25em 0px; padding-bottom: 0.17em; padding-top: 0.5em\'><h2 style=\'border-width: 0px; color: inherit; font-family: \\\"Linux Libertine\\\", Georgia, Times, \\\"Source Serif 4\\\", serif; font-size: inherit; line-height: 1.375; margin: 0px 0px 0.25em; padding: 0px\' id=\\\"Description\\\">Description<\\/h2><\\/div><\\/div><\\/div><\\/div><p><a class=\\\"mw-file-description\\\" style=\\\"border-width: 0px; color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/File:Ranipokhari-IMG_3228.jpg\\\" id=\\\"mwwQ\\\"><img class=\\\"image_resized mw-file-element\\\" style=\\\"background-color: rgb(255, 255, 255); border: 0.666667px solid rgb(200, 204, 209); color: rgb(32, 33, 34); height: auto; margin: 3px; vertical-align: middle; width: 250px\\\" src=\\\"https:\\/\\/thumb.wikimedia.org\\/wikipedia\\/commons\\/thumb\\/d\\/d5\\/Ranipokhari-IMG_3228.jpg\\/250px-Ranipokhari-IMG_3228.jpg?utm_source=en.wikipedia.org&amp;utm_campaign=parser&amp;utm_content=thumbnail\\\" alt=\\\"Rani Pokhari, a 17th-century pond in Kathmandu decorated with lights at night for Chhath celebration\\\" width=\\\"250\\\" height=\\\"167\\\"><\\/a><\\/p><div class=\\\"vector-body ve-init-mw-desktopArticleTarget-targetContainer\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; line-height: 1.625; text-align: start\\\" id=\\\"bodyContent\\\"><div><div><figure class=\\\"mw-default-size\\\" style=\\\"background-color: rgb(248, 249, 250); color: rgb(32, 33, 34); float: right; line-height: 0; margin: 0.5em 0px 1.3em 1.4em; text-align: center\\\"><figcaption style=\\\"background-color: inherit; font-size: 14.144px; line-height: 1.4em; padding: 0px 6px 6px; text-align: start\\\">Chhath celebration (2015) at <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Rani_Pokhari\\\" title=\\\"Rani Pokhari\\\" id=\\\"mwxA\\\">Rani Pokhari<\\/a>, a 17th-century pond in <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kathmandu\\\" title=\\\"Kathmandu\\\" id=\\\"mwxQ\\\">Kathmandu<\\/a><\\/figcaption><\\/figure><\\/div><\\/div><\\/div><p><a class=\\\"mw-file-description\\\" style=\\\"border-width: 0px; color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/File:Chhath_Pooja_in_Delhi.jpg\\\" id=\\\"mwxw\\\"><img class=\\\"image_resized mw-file-element\\\" style=\\\"background-color: rgb(255, 255, 255); border: 0.666667px solid rgb(200, 204, 209); color: rgb(32, 33, 34); height: auto; margin: 3px; vertical-align: middle; width: 250px\\\" src=\\\"https:\\/\\/thumb.wikimedia.org\\/wikipedia\\/commons\\/thumb\\/f\\/f1\\/Chhath_Pooja_in_Delhi.jpg\\/250px-Chhath_Pooja_in_Delhi.jpg?utm_source=en.wikipedia.org&amp;utm_campaign=parser&amp;utm_content=thumbnail\\\" width=\\\"250\\\" height=\\\"333\\\"><\\/a><\\/p><div class=\\\"vector-body ve-init-mw-desktopArticleTarget-targetContainer\\\" style=\\\"background-color: rgb(255, 255, 255); color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px; line-height: 1.625; text-align: start\\\" id=\\\"bodyContent\\\"><div class=\\\"mw-body-content\\\" style=\\\"margin-top: 16px\\\" id=\\\"mw-content-text\\\"><div class=\\\"mw-content-ltr mw-parser-output\\\"><figure class=\\\"mw-default-size\\\" style=\\\"background-color: rgb(248, 249, 250); color: rgb(32, 33, 34); float: right; line-height: 0; margin: 0.5em 0px 1.3em 1.4em; text-align: center\\\"><figcaption style=\\\"background-color: inherit; font-size: 14.144px; line-height: 1.4em; padding: 0px 6px 6px; text-align: start\\\">Chhath celebrations happening at a temporary pond made for devotees in Shahdara, Delhi<\\/figcaption><\\/figure><p style=\\\"margin: 0.5em 0px 1em\\\" id=\\\"mwyg\\\">Chhath Puja is a <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/List_of_folk_festivals\\\" title=\\\"List of folk festivals\\\" id=\\\"mwyw\\\">folk festival<\\/a> that lasts four days. It starts with Kartik Shukla Chaturthi and ends with Kartik Shukla Saptami. Chhath is celebrated twice a year:<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-30\\\" id=\\\"mwzA\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwzg\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mwzQ\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">30<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mwzw\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/p><ol style=\\\"margin: -0.5em 0px 0px 3.2em; padding: 0px\\\"><li style=\\\"margin-bottom: 0.1em\\\">Chaiti Chhath \\u2013 observed in the <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chaitra\\\" title=\\\"Chaitra\\\" id=\\\"mw0g\\\">Chaitra<\\/a> month of <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Vikram_Samvat\\\" title=\\\"Vikram Samvat\\\" id=\\\"mw0w\\\">Vikram Samvat<\\/a>.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-31\\\" id=\\\"mw1A\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mw1g\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mw1Q\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">31<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mw1w\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/li><li style=\\\"margin-bottom: 0.1em\\\">Kartik Chhath \\u2013 celebrated at a very large scale in the <a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kartika_(month)\\\" title=\\\"Kartika (month)\\\" id=\\\"mw2Q\\\">Kartika<\\/a> month of Vikram Samvat.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-32\\\" id=\\\"mw2g\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mw3A\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mw2w\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">32<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mw3Q\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a><\\/li><\\/ol><p style=\\\"margin: 0.5em 0px 1em\\\" id=\\\"mw3g\\\">The main worshippers, called <i><span id=\\\"mw3w\\\">parvaitin<\\/span><\\/i> (transl.<span id=\\\"mw4g\\\">\\u2009<\\/span><span id=\\\"mw4g\\\">\'devotees\'<\\/span>, from Sanskrit <i>parva<\\/i>, meaning \'occasion\' or \'festival\'), are usually women. However, men also observe this festival as Chhath is not a gender-specific festival.<a style=\\\"color: rgb(51, 102, 204)\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Chhath#cite_note-33\\\" id=\\\"mw5A\\\"><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mw5g\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">[<\\/sup><\\/span><span class=\\\"mw-reflink-text\\\" id=\\\"mw5Q\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">33<\\/sup><\\/span><span class=\\\"mw-reflink-text cite-bracket\\\" id=\\\"mw5w\\\"><sup class=\\\"mw-ref reference\\\" style=\\\"font-size: 12.8px; line-height: 1\\\">]<\\/sup><\\/span><\\/a> The <i><span id=\\\"mw6A\\\">parvaitin<\\/span><\\/i> pray for the well-being of their family, and for the prosperity of their children.<\\/p><div class=\\\"mw-heading mw-heading3\\\" style=\\\"color: rgb(16, 20, 24); font-size: 1.2em; line-height: 1.6; margin: 0.25em 0px; padding-bottom: 0px; padding-top: 0.5em\\\"><h3 style=\\\"border-width: 0px; color: inherit; font-family: inherit; font-size: inherit; line-height: 1.6; margin: 0px 0px 0.25em; padding: 0px\\\" id=\\\"Nahaay_khaay_(day_1)\\\"><i><strong>Nahaay khaay<\\/strong><\\/i><strong> (day 1)<\\/strong><\\/h3><\\/div><\\/div><\\/div><\\/div>\"}]', 'D1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 1, 'draft', '2026-10-23 09:12:23', 1, NULL, '2026-10-23 09:12:23', '2026-10-23 09:12:23');
INSERT INTO `blog_posts` (`id`, `title`, `slug`, `image_path`, `excerpt`, `content_blocks`, `author_name`, `author_designation`, `category`, `tags`, `meta_title`, `meta_description`, `focus_keyword`, `canonical_url`, `robots_meta`, `schema_markup`, `is_published`, `post_status`, `published_at`, `comment_status`, `reading_time`, `created_at`, `updated_at`) VALUES
(6, 'alksd  a lfaksdj', 'alksd-a-lfaksdj', 'blog_images/AmEwJVH3xezUdD6kthUKlGAIdct4XbNgJzkmI1LG.png', 'akdslfjak', '[{\"type\":\"html\",\"content\":\"<p>skdjf lasdf jlaksdjfla sdjfk<\\/p>\"}]', 'Admin', 'alksdjflk', NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 1, 'draft', '2026-10-23 11:48:35', 1, NULL, '2026-10-23 11:46:58', '2026-10-23 11:48:35'),
(7, 'The Complete Guide to Enterprise IT Asset Disposition (ITAD) in 2026', 'complete-guide-enterprise-itad-2026', 'blog_images/it-asset-management.jpg', 'Learn how modern enterprises navigate hardware refresh cycles, safeguard corporate data, and recoup maximum asset value through structured ITAD.', '[{\"type\":\"html\",\"content\":\"<h2>Navigating Modern IT Asset Disposition<\\/h2><p>IT Asset Disposition (ITAD) has evolved from a back-office logistics task into a boardroom strategic priority. With enterprise hardware lifecycles averaging three to four years, corporate technology officers face dual imperatives: preventing catastrophic data breaches while fulfilling environmental sustainability commitments.<\\/p><h3>Key Pillars of a World-Class ITAD Program<\\/h3><ul><li><strong>Audited Chain of Custody:<\\/strong> GPS-tracked sealed transport and barcoded bin scanning from office pickup to destruction facility.<\\/li><li><strong>Certified Data Sanitization:<\\/strong> Adherence to NIST Special Publication 800-88 Revision 1 guidelines for magnetic and flash media.<\\/li><li><strong>Component Value Recovery:<\\/strong> Testing and harvesting functional enterprise CPUs, high-density ECC RAM, and enterprise NVMe drives for secondary remarketing.<\\/li><\\/ul><p>By implementing a proactive ITAD framework, organizations routinely recover between 15% and 35% of original hardware acquisition costs while maintaining bulletproof compliance audits.<\\/p>\"}]', 'Admin', 'Lead Infrastructure Architect', 'ITAD Strategy', '[\"ITAD\",\"Enterprise IT\",\"Asset Management\",\"Hardware Lifecycle\"]', 'Complete Enterprise ITAD Guide 2026 | Retrotech Insights', 'A comprehensive blueprint for enterprise IT asset disposition, covering chain of custody, data wiping, and hardware remarketing.', 'enterprise itad', 'http://localhost/blog/complete-guide-enterprise-itad-2026', 'index, follow', NULL, 1, 'published', '2026-10-25 05:00:15', 1, 1, '2026-11-03 15:42:15', '2026-11-03 15:54:10'),
(8, 'NIST 800-88 vs. DoD 5220.22-M: Which Data Destruction Standard Do You Need?', 'nist-800-88-vs-dod-5220-data-destruction-standards', 'blog_images/it-data-destruction.jpg', 'A deep dive into media sanitization protocols, comparing physical degaussing, mechanical shredding, and multi-pass cryptographic erasure.', '[{\"type\":\"html\",\"content\":\"<h2>Understanding Media Sanitization in the Flash Era<\\/h2><p>For decades, the United States Department of Defense standard (DoD 5220.22-M) was the de facto requirement for magnetic disk sanitization. However, the rise of solid-state drives (SSDs), NVMe media, and wear-leveling NAND controllers has made traditional multi-pass overwriting obsolete and potentially dangerous.<\\/p><h3>Why NIST 800-88 Rev 1 is the Gold Standard<\\/h3><p>The National Institute of Standards and Technology (NIST) 800-88 framework introduces three explicit sanitization tiers:<\\/p><ol><li><strong>Clear:<\\/strong> Logical sanitization using standard user-accessible commands across all writeable storage locations.<\\/li><li><strong>Purge:<\\/strong> Executes controller-level Cryptographic Erase or physical block-level firmware wiping, making target recovery infeasible even using laboratory equipment.<\\/li><li><strong>Destroy:<\\/strong> Mechanical shredding, disintegration, or incineration reducing the physical medium to sub-millimeter particles.<\\/li><\\/ol>\"}]', 'Himanshu Singh', 'Chief Information Security Officer', 'Data Security', '[\"Data Security\",\"NIST 800-88\",\"DoD Standards\",\"Compliance\"]', 'NIST 800-88 vs DoD 5220.22-M Data Destruction Comparison', 'Detailed technical comparison of NIST 800-88 and DoD data erasure protocols for SSDs and HDDs.', 'NIST 800-88 data destruction', 'http://localhost/blog/nist-800-88-vs-dod-5220-data-destruction-standards', 'index, follow', NULL, 1, 'published', '2026-10-26 05:00:15', 1, 6, '2026-11-03 15:42:15', '2026-11-03 15:42:15'),
(9, 'Best Practices for Seamless Data Center Decommissioning', 'best-practices-data-center-decommissioning', 'blog_images/data-center-decommissioning.jpg', 'Retiring rack servers and SAN storage requires strict chain-of-custody tracking, minimal downtime, and zero data leakage.', '[{\"type\":\"html\",\"content\":\"<h2>Planning a Cloud Migration or Facility Consolidation<\\/h2><p>Data center decommissioning is among the highest-risk projects in enterprise IT. Beyond moving physical chassis, engineers must orchestrate power phase-downs, cable mapping, cable deracking, and real-time asset reconciliation against Configuration Management Databases (CMDB).<\\/p><h3>Crucial Phases for Risk-Free Decommissioning<\\/h3><ul><li><strong>Discovery & Asset Audit:<\\/strong> Pre-project barcode labeling and live-to-staged asset validation.<\\/li><li><strong>Secure Network Isolation:<\\/strong> Severing VLANs and verifying that backup clusters have resumed all active workloads.<\\/li><li><strong>On-Site Data Erase or Degaussing:<\\/strong> Wiping storage arrays prior to hardware leaving facility perimeters.<\\/li><li><strong>Logistical Extraction:<\\/strong> Custom anti-static crating, specialized server lifts, and bonded freight transit.<\\/li><\\/ul>\"}]', 'Deepak Kumar', 'Lead Infrastructure Architect', 'Infrastructure', '[\"Data Center\",\"Decommissioning\",\"Servers\",\"SAN Storage\"]', 'Data Center Decommissioning Best Practices | Retrotech', 'Step-by-step checklist for retiring enterprise data center racks and SAN storage safely and sustainably.', 'data center decommissioning', 'http://localhost/blog/best-practices-data-center-decommissioning', 'index, follow', NULL, 1, 'published', '2026-10-27 05:00:15', 1, 7, '2026-11-03 15:42:15', '2026-11-03 15:42:15'),
(10, 'Hard Drive Shredding vs. Degaussing: Choosing the Right Destruction Method', 'hard-drive-shredding-vs-degaussing-methods', 'blog_images/hard-disk-destruction.jpg', 'Understand when high-coercivity electromagnetic degaussing is required versus industrial dual-shaft mechanical shredding.', '[{\"type\":\"html\",\"content\":\"<h2>Physical Media Destruction: Mechanics and Security<\\/h2><p>When high-security regulations (such as HIPAA, GDPR, or defense sector contracts) require total physical elimination of storage media, organizations must decide between electromagnetic degaussing and mechanical shredding.<\\/p><h3>High-Coercivity Degaussing<\\/h3><p>Degaussers generate intense magnetic pulses (often exceeding 10,000 to 20,000 Gauss) that permanently disrupt the magnetic domains on spinning hard disk platters and tape cartridges. This renders magnetic tracks permanently unreadable.<\\/p><h3>Industrial Multi-Shaft Shredding<\\/h3><p>Mechanical shredders utilize counter-rotating hardened steel cutting blades that crush, tear, and fracture storage devices into irregular fragments measuring 20mm or smaller. Shredding is universally applicable across traditional HDDs, solid-state drives, optical media, and smart cards.<\\/p>\"}]', 'Admin', 'Chief Information Security Officer', 'Data Security', '[\"Hard Drive Shredding\",\"Degaussing\",\"Physical Destruction\"]', 'Hard Drive Shredding vs Degaussing Guide | Retrotech', 'Compare physical drive shredding and degaussing for magnetic and flash storage media.', 'hard drive shredding', 'http://localhost/blog/hard-drive-shredding-vs-degaussing-methods', 'index, follow', NULL, 1, 'published', '2026-10-28 05:00:15', 1, 1, '2026-11-03 15:42:15', '2026-11-03 15:53:58'),
(11, 'Corporate E-Waste Compliance: Navigating Global Environmental Standards', 'corporate-ewaste-compliance-global-standards', 'blog_images/process-2.jpg', 'How global companies achieve zero-landfill milestones while adhering to WEEE, RoHS, and local environmental regulations.', '[{\"type\":\"html\",\"content\":\"<h2>The Circular Economy and Electronics Waste<\\/h2><p>Over 60 million metric tons of electronic waste are generated globally every year, with less than 22% properly recycled. For corporations, improperly discarded electronics represent both catastrophic regulatory penalties and substantial environmental brand damage.<\\/p><h3>Key International Frameworks<\\/h3><ul><li><strong>WEEE Directive (EU):<\\/strong> Strict extended producer responsibility guidelines demanding verified recycling and recovery quotas.<\\/li><li><strong>RoHS:<\\/strong> Restrictions on hazardous substances such as lead, mercury, and cadmium in electrical equipment.<\\/li><li><strong>R2 (Responsible Recycling) & e-Stewards:<\\/strong> Global third-party certifications ensuring ethical downstream accountability with zero overseas dumping.<\\/li><\\/ul>\"}]', 'Deepak Kumar', 'Lead Infrastructure Architect', 'Sustainability', '[\"E-Waste\",\"Sustainability\",\"Circular Economy\",\"ESG Compliance\"]', 'Corporate E-Waste Compliance & Environmental Standards', 'A guide for enterprises to achieve zero-landfill IT sustainability and maintain strict regulatory compliance.', 'corporate e-waste compliance', 'http://localhost/blog/corporate-ewaste-compliance-global-standards', 'index, follow', NULL, 1, 'published', '2026-10-29 05:00:15', 1, 5, '2026-11-03 15:42:15', '2026-11-03 15:42:15'),
(12, 'Maximizing Residual Value with Enterprise IT Hardware Remarketing', 'maximizing-residual-value-it-hardware-remarketing', 'blog_images/it-asset-remarketing.jpg', 'Turn decommissioned laptops, enterprise switches, and GPUs into positive cash flow through global B2B secondary channels.', '[{\"type\":\"html\",\"content\":\"<h2>Turning Sunken IT Costs into Working Capital<\\/h2><p>When organizations upgrade fleets of thousands of laptops or transition enterprise workloads to hybrid cloud architectures, the retired hardware frequently still possesses considerable operational life. Selling directly to consumer marketplaces is slow and fraught with compliance vulnerabilities.<\\/p><h3>The Multi-Tier Remarketing Workflow<\\/h3><p>Retrotech utilizes a structured diagnostics and multi-channel liquidation pipeline:<\\/p><ol><li><strong>Deep Component Testing:<\\/strong> Comprehensive stress-testing of motherboards, memory channels, battery health, and display panels.<\\/li><li><strong>Cosmetic Reconditioning:<\\/strong> Ultrasonically cleaned, sanitized chassis graded under standardized Grade A\\/B\\/C metrics.<\\/li><li><strong>Global B2B Broker Distribution:<\\/strong> Access to enterprise purchasers, university laboratories, and certified refurbishing networks across 40+ countries.<\\/li><\\/ol>\"}]', 'Deepak Kumar', 'Lead Infrastructure Architect', 'Asset Recovery', '[\"Remarketing\",\"Asset Recovery\",\"Hardware Resale\",\"Cost Optimization\"]', 'Maximize Enterprise IT Hardware Resale Value | Retrotech', 'Discover how enterprise hardware remarketing recovers valuable capital from retired workstations, servers, and networking gear.', 'it hardware remarketing', 'http://localhost/blog/maximizing-residual-value-it-hardware-remarketing', 'index, follow', NULL, 1, 'published', '2026-10-30 05:00:15', 1, 5, '2026-11-03 15:42:15', '2026-11-03 15:42:15'),
(13, 'Building Secure APIs for Enterprise Systems: Architecture & Governance', 'building-secure-apis-enterprise-architecture', 'blog_images/api-development.jpg', 'Design scalable microservices, implement OAuth2/mTLS authentication, and maintain granular telemetry for mission-critical workflows.', '[{\"type\":\"html\",\"content\":\"<h2>The Foundation of Modern Distributed Architecture<\\/h2><p>APIs are the digital nervous system of the modern enterprise. As companies connect disparate ERPs, supply chain logistics engines, and customer portals, API security posture directly dictates overall system resilience.<\\/p><h3>Core Pillars of Enterprise API Security<\\/h3><ul><li><strong>Mutual TLS (mTLS):<\\/strong> Enforcing two-way cryptographic verification between microservices to prevent man-in-the-middle exploits.<\\/li><li><strong>Rate Limiting & Token Bucket Algorithms:<\\/strong> Defending endpoints against Denial of Service (DoS) and credential stuffing attacks.<\\/li><li><strong>Granular Scope Authorization:<\\/strong> Implementing role-based access control (RBAC) and attribute-based access control (ABAC) embedded in signed JWT assertions.<\\/li><\\/ul>\"}]', 'Deepak Kumar', 'Lead Infrastructure Architect', 'Enterprise Tech', '[\"API Security\",\"Microservices\",\"OAuth2\",\"System Architecture\"]', 'Enterprise API Architecture & Security Blueprint | Retrotech', 'Architectural guide for engineering resilient, high-throughput enterprise APIs with modern cryptographic protections.', 'secure enterprise apis', 'http://localhost/blog/building-secure-apis-enterprise-architecture', 'index, follow', NULL, 1, 'published', '2026-10-31 05:00:15', 1, 6, '2026-11-03 15:42:15', '2026-11-03 15:42:15'),
(14, 'Custom CRM vs. Off-The-Shelf SaaS: What Scale-Ups Must Know', 'custom-crm-vs-off-the-shelf-saas-scaleups', 'blog_images/crm-development.jpg', 'Comparing licensing overhead, customization bottlenecks, and data ownership when architecting tailored CRM pipelines.', '[{\"type\":\"html\",\"content\":\"<h2>The Tipping Point of Enterprise Software<\\/h2><p>Commercial SaaS customer relationship platforms offer rapid onboarding, but rapidly growing businesses frequently encounter the \\\"SaaS license tax\\\" where recurring monthly seat fees skyrocket while custom workflow requirements remain constrained by proprietary platform limitations.<\\/p><h3>Evaluating the Total Cost of Ownership (TCO)<\\/h3><p>When evaluated over a 3-5 year timeline, custom enterprise software built on robust open frameworks offers decisive benefits:<\\/p><ul><li><strong>Complete Data Sovereignty:<\\/strong> No third-party data aggregation; databases reside within your own dedicated VPC infrastructure.<\\/li><li><strong>Zero Per-User Licensing:<\\/strong> Scale from 50 to 5,000 employees without incurring incremental monthly licensing fees.<\\/li><li><strong>Bespoke Automation:<\\/strong> Deep automated integrations directly with warehouse scanners, internal ERPs, and specialized logistics pipelines.<\\/li><\\/ul>\"}]', 'Himanshu Singh', 'Chief Information Security Officer', 'Software Engineering', '[\"CRM\",\"Custom Software\",\"SaaS\",\"Business Scalability\"]', 'Custom CRM vs SaaS Comparison for Growing Enterprises', 'Should your company buy or build a CRM? Analyze total cost of ownership, security, and scalability.', 'custom crm development', 'http://localhost/blog/custom-crm-vs-off-the-shelf-saas-scaleups', 'index, follow', NULL, 1, 'published', '2026-11-01 05:00:15', 1, 5, '2026-11-03 15:42:15', '2026-11-03 15:42:15'),
(15, 'Multi-Tenant SaaS Architecture: Database Isolation Patterns and Scaling', 'multi-tenant-saas-architecture-database-patterns', 'blog_images/saas-application.jpg', 'Explore database-per-tenant, schema-per-tenant, and shared-schema designs with row-level security for high-growth SaaS platforms.', '[{\"type\":\"html\",\"content\":\"<h2>Architectural Decision-Making for Modern Cloud SaaS<\\/h2><p>Engineering multi-tenant applications requires balancing infrastructure cost efficiency against stringent tenant data isolation requirements. Choosing the wrong data storage pattern early in the product lifecycle can lead to painful, expensive refactoring later.<\\/p><h3>The Three Common Multi-Tenancy Patterns<\\/h3><ol><li><strong>Separate Database per Tenant:<\\/strong> Total physical data segregation. Highest security and compliance isolation, simplified backups, but higher idle infrastructure costs.<\\/li><li><strong>Shared Database, Separate Schemas:<\\/strong> Moderate resource utilization with distinct namespace tables per customer.<\\/li><li><strong>Shared Database, Shared Schema with Tenant ID:<\\/strong> Lowest operating cost. Relies on application-level filtering or database Row-Level Security (RLS) policies.<\\/li><\\/ol>\"}]', 'Deepak Kumar', 'Lead Infrastructure Architect', 'Cloud Architecture', '[\"SaaS\",\"Multi-Tenancy\",\"Database Design\",\"Cloud Architecture\"]', 'Multi-Tenant SaaS Architecture & Isolation Patterns', 'Comprehensive technical comparison of multi-tenant database designs for enterprise cloud applications.', 'multi-tenant saas architecture', 'http://localhost/blog/multi-tenant-saas-architecture-database-patterns', 'index, follow', NULL, 1, 'published', '2026-11-02 05:00:15', 1, 6, '2026-11-03 15:42:15', '2026-11-03 15:42:15'),
(16, 'Modern Web Development: Why Performance and Core Web Vitals Drive Conversions', 'modern-web-development-performance-core-web-vitals', 'blog_images/web-development.jpg', 'How optimizing Largest Contentful Paint (LCP) and Cumulative Layout Shift (CLS) directly impacts enterprise user retention and organic SEO.', '[{\"type\":\"html\",\"content\":\"<h2>Speed as a Core Business Metric<\\/h2><p>Website performance is no longer an engineering vanity metric\\u2014it directly dictates organic search rankings, user retention, and enterprise pipeline conversion rates. Google has made Core Web Vitals an explicit ranking signal in search algorithms.<\\/p><h3>Key Core Web Vitals Explained<\\/h3><ul><li><strong>Largest Contentful Paint (LCP):<\\/strong> Measures perceived loading speed. Marks when the page main content has likely loaded. Target: Under 2.5 seconds.<\\/li><li><strong>Interaction to Next Paint (INP):<\\/strong> Assesses overall page responsiveness to user interactions. Target: Under 200 milliseconds.<\\/li><li><strong>Cumulative Layout Shift (CLS):<\\/strong> Measures visual stability and unexpected layout movement during page render. Target: Under 0.1 score.<\\/li><\\/ul><p>Adopting lightweight frontend frameworks, server-side asset pre-rendering, modern image codecs (WebP, AVIF), and edge CDN caching ensures consistently pristine lighthouse scores.<\\/p>\"}]', 'Deepak Kumar', 'Lead Infrastructure Architect', 'Web Development', '[\"Web Development\",\"Core Web Vitals\",\"PageSpeed\",\"SEO\"]', 'Core Web Vitals & Web Performance Guide | Retrotech', 'How modern web performance engineering directly fuels search engine rankings and business conversions.', 'core web vitals performance', 'http://localhost/blog/modern-web-development-performance-core-web-vitals', 'index, follow', NULL, 1, 'published', '2026-11-03 05:00:15', 1, 5, '2026-11-03 15:42:15', '2026-11-03 15:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-b2ec88d0c43df059b66b02dcbce52f2f', 'i:1;', 1793741591),
('laravel-cache-b2ec88d0c43df059b66b02dcbce52f2f:timer', 'i:1793741591;', 1793741591);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `referral_source` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `company_name`, `company_address`, `website_url`, `referral_source`, `service`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Deepak Kumar', 'd@test.com', '+919953960473', 'Retro', 'Phase 1', 'https://www.retrotechdigital.com', 'Social Media', 'IT Data Destruction', 'It\'s a test detail', '2026-10-22 13:29:38', '2026-10-22 13:30:30'),
(3, 'd', 'admin@test.com', '+919973960087', 'B2B Exports LLC', 'Bali,Apasadh,Nawada\r\nBihar,805108', NULL, NULL, NULL, 'skdfj', '2026-10-22 13:54:19', '2026-10-22 13:54:58'),
(4, 'sdfa', 'deepakdasug23102005@gmail.com', '78654', NULL, NULL, NULL, NULL, NULL, 'adsfas afsd', '2026-10-23 11:43:40', '2026-10-23 11:43:40'),
(5, 'sdfa', 'deepakdasug23102005@gmail.com', '78654', NULL, NULL, NULL, NULL, NULL, 'adsfas afsd', '2026-10-23 11:43:41', '2026-10-23 11:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` text NOT NULL,
  `answer` longtext NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `category` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `model_type`, `model_id`, `question`, `answer`, `order`, `category`, `subcategory`, `sort_order`, `is_published`, `is_featured`, `meta_title`, `meta_description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'blog', 7, 'What are the main phases of an enterprise ITAD program?', 'A comprehensive ITAD program encompasses inventory discovery, secure chain of custody logistics, verified data sanitization, asset remarketing, and certified zero-landfill recycling.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 1, '2026-11-03 15:42:15', '2026-11-03 15:54:10', NULL),
(2, 'blog', 7, 'How does ITAD help maximize return on investment?', 'Through secondary-market component remarketing and parts harvesting, turning legacy hardware into recoverable working capital.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, 1, '2026-11-03 15:42:15', '2026-11-03 15:54:10', NULL),
(3, 'blog', 7, 'Are ITAD services covered under insurance and liability protections?', 'Yes, enterprise ITAD partners provide comprehensive environmental liability indemnification and serialized certificates of destruction.', 3, NULL, NULL, 3, 1, 0, NULL, NULL, NULL, 1, '2026-11-03 15:42:15', '2026-11-03 15:54:35', NULL),
(4, 'blog', 8, 'Why is NIST 800-88 preferred over older DoD standards?', 'NIST 800-88 accounts for modern SSDs and NVMe flash memory where traditional magnetic overwriting is ineffective due to wear-leveling algorithms.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(5, 'blog', 8, 'Does Retrotech provide serialized certificates of destruction?', 'Yes, every sanitized drive or shredded device receives an audited serialized Certificate of Destruction complete with drive serial numbers and timestamps.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(6, 'blog', 9, 'How long does a data center decommissioning project take?', 'Depending on rack count and location, timelines range from a single weekend maintenance window to 3-4 weeks with phased facility extraction.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(7, 'blog', 9, 'Can active systems continue running during partial decommissioning?', 'Yes, our engineers isolate retired rack rows and power distribution units (PDUs) without interrupting active production clusters.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(8, 'blog', 10, 'Can shredded hard drive platters ever be pieced back together?', 'No. Industrial cross-cut shredding fractures the magnetic crystalline structure into minute jagged pieces, making magnetic microscopy reconstruction physically impossibles.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 1, '2026-11-03 15:42:15', '2026-11-03 15:53:58', NULL),
(9, 'blog', 10, 'Does degaussing work on solid state drives (SSDs)?', 'No. Degaussing only affects magnetic storage. SSDs store data using integrated electrical charge traps and must be shredded or cryptographically purged.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, 1, '2026-11-03 15:42:15', '2026-11-03 15:53:58', NULL),
(10, 'blog', 11, 'What does zero-landfill electronic recycling mean?', 'Zero-landfill means 100% of disassembled device components are either refurbished for reuse or smelted into raw commodity metals and recyclable plastics, leaving zero waste in landfills.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(11, 'blog', 11, 'Can Retrotech generate ESG metrics for annual corporate sustainability audits?', 'Yes, our portal provides audited environmental impact statements including total gross weight processed, greenhouse gas emissions avoided, and recycled materials breakdown.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(12, 'blog', 12, 'Which IT equipment categories command the highest residual value?', 'Enterprise GPU accelerators, high-capacity DDR4/DDR5 registered ECC RAM, core 100GbE managed switches, and late-generation business laptops consistently achieve top market resale value.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(13, 'blog', 12, 'How does profit sharing work in hardware consignment?', 'Retrotech offers transparent revenue share models where clients receive real-time visibility into secondary sales with agreed-upon net liquidation distributions.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(14, 'blog', 13, 'What is the recommended authentication scheme for B2B API integrations?', 'Mutual TLS (mTLS) combined with OAuth2 Client Credentials grant and strict IP allowlisting provides the most robust zero-trust defense.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(15, 'blog', 13, 'How should breaking changes be introduced to production APIs?', 'Utilize explicit semantic URI path versioning (e.g., /api/v2) with backwards-compatible response contracts and a minimum 12-month deprecation lifecycle.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(16, 'blog', 14, 'When does custom CRM development become more cost effective than commercial SaaS?', 'Generally when organization headcounts exceed 50-75 seats and the workflows require deep bespoke integrations with proprietary operational databases.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(17, 'blog', 14, 'Can a custom CRM integrate seamlessly with legacy ERP platforms?', 'Yes, custom applications are purpose-built with tailored webhook receivers and direct SQL or REST connectors for legacy ERP synchronization.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(18, 'blog', 15, 'Which multi-tenant architecture pattern offers the strongest regulatory compliance?', 'Database-per-tenant provides absolute physical data separation, making it the preferred approach for HIPAA, SOC2 Type II, and banking sector certifications.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(19, 'blog', 15, 'How can cross-tenant data leakage be prevented in shared schema environments?', 'Utilize PostgreSQL Row-Level Security (RLS) enforced at the database connection pool level combined with automated multi-tenant unit test suites.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(20, 'blog', 16, 'What are the three primary Google Core Web Vitals metrics?', 'Largest Contentful Paint (LCP) for loading speed, Interaction to Next Paint (INP) for responsiveness, and Cumulative Layout Shift (CLS) for visual stability.', 1, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL),
(21, 'blog', 16, 'How does faster web load time translate to business revenue?', 'Studies consistently demonstrate that every 100ms improvement in page speed boosts conversion rates by up to 8% and significantly reduces user bounce rates.', 2, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '2026-11-03 15:42:15', '2026-11-03 15:42:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `intro_heading` varchar(255) DEFAULT NULL,
  `intro_description` text DEFAULT NULL,
  `intro_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `canonical_url` varchar(2048) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industry_contents`
--

CREATE TABLE `industry_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL,
  `content_type` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_16_201319_create_contacts_table', 2),
(5, '2026_10_19_172243_add_details_to_contacts_table', 3),
(6, '2026_10_22_152001_create_blog_posts_table', 4),
(7, '2026_10_22_153732_add_is_admin_to_users_table', 5),
(8, '2026_10_22_180000_remove_author_designation_from_blog_posts_table', 6),
(9, '2026_10_22_181500_add_author_designation_to_blog_posts_table', 7),
(10, '2026_10_22_184053_add_status_to_contacts_table', 8),
(11, '2026_10_23_000000_remove_status_from_contacts_table', 9),
(12, '2026_10_22_195602_add_two_factor_columns_to_users_table', 10),
(13, '2026_10_22_195603_create_passkeys_table', 10),
(14, '2026_10_23_174543_create_testimonials_table', 10),
(15, '2026_10_23_194535_change_rating_to_decimal_in_testimonials_table', 11),
(16, '2026_10_27_125932_create_services_table', 12),
(17, '2026_10_27_131610_create_tech_developments_table', 12),
(18, '2026_10_27_142956_create_tech_development_sections_table', 12),
(19, '2026_10_27_152225_add_details_to_services_table', 12),
(20, '2026_10_28_124041_create_industries_table', 12),
(21, '2026_10_28_124056_create_industry_contents_table', 12),
(22, '2026_10_28_131811_create_web_pages_table', 12),
(23, '2026_10_28_131836_create_web_page_sections_table', 12),
(24, '2026_11_02_135010_add_new_columns_to_blog_posts', 12),
(25, '2026_11_02_160000_repair_blog_posts_core_columns', 12),
(26, '2026_11_02_164500_rename_category_id_to_category_on_blog_posts', 12),
(27, '2026_11_04_000000_create_faqs_table', 12),
(28, '2026_11_04_000001_add_polymorphic_columns_to_faqs_table', 13),
(29, '2026_11_03_213649_create_permission_tables', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `passkeys`
--

CREATE TABLE `passkeys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `credential_id` varchar(255) NOT NULL,
  `credential` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`credential`)),
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(2, 'blogs.view', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(3, 'blogs.create', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(4, 'blogs.edit', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(5, 'blogs.delete', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(6, 'webpages.view', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(7, 'webpages.create', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(8, 'webpages.edit', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(9, 'webpages.delete', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(10, 'services.view', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(11, 'services.edit', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(12, 'services.delete', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(13, 'tech_developments.delete', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(14, 'testimonials.view', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(15, 'testimonials.create', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(16, 'testimonials.edit', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(17, 'testimonials.delete', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(18, 'faqs.view', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(19, 'faqs.create', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(20, 'faqs.edit', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(21, 'faqs.delete', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(22, 'contacts.view', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(23, 'contacts.delete', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(24, 'roles.view', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(25, 'roles.create', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(26, 'roles.edit', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(27, 'roles.delete', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(28, 'users.manage', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(2, 'admin', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(3, 'editor', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(4, 'author', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56'),
(5, 'viewer', 'web', '2026-11-03 16:08:56', '2026-11-03 16:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(10, 3),
(10, 5),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(14, 3),
(14, 5),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(22, 3),
(22, 5),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(500) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `icon_svg` varchar(255) DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `slug`, `title`, `short_description`, `meta_description`, `hero_image`, `icon_svg`, `content`, `created_at`, `updated_at`) VALUES
(1, 'search-engine-optimization', 'Search Engine Optimization', 'Rank higher, earn trust, and win qualified organic traffic with technical, on-page and content-led SEO.', 'Professional SEO services by Retrotech — technical audits, keyword strategy, content and link building that move rankings and revenue.', 'https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?auto=format&fit=crop&w=900&q=80', 'chart', '{\"hero\":{\"badge\":\"Award-Winning SEO Agency\",\"subtitle\":\"Connect with ready-to-buy customers through search. We combine technical SEO, content strategy and authority building to compound organic growth month after month.\",\"cta\":\"Get a Free SEO Audit\"},\"topics\":[\"Technical SEO\",\"On-Page SEO\",\"Off-Page SEO\",\"Keyword Research\",\"Content Strategy\",\"Link Building\",\"Local SEO\",\"Site Speed\",\"Schema Markup\",\"Core Web Vitals\",\"Analytics\",\"Reporting\"],\"about\":{\"heading\":\"Search visibility that compounds over time.\",\"paragraph\":\"Retrotech builds SEO programs that start with a forensic technical audit, layer on intent-driven keyword strategy, then compound value through authoritative content and clean link acquisition. Every month you get transparent reporting tied to actual revenue.\",\"features\":[[\"chart\",\"Data-Backed Strategy\",\"Every keyword decision is validated by search volume, intent and competitor gap analysis.\",\"Rank for terms that actually convert, not vanity traffic.\"],[\"bolt\",\"Technical Excellence\",\"Crawlability, indexation, Core Web Vitals and structured data handled end to end.\",\"Google indexes your best pages \\u2014 and ranks them.\"],[\"pen\",\"Content That Ranks\",\"Briefs, drafts and optimization built around topical authority.\",\"Content earns links and converts readers.\"],[\"shield\",\"White-Hat Only\",\"No shortcuts, no risky link schemes \\u2014 only sustainable, compliant tactics.\",\"Rankings that survive Google algorithm updates.\"]]},\"rows\":[[\"chart\",\"Technical SEO Audit\",\"A forensic crawl of your site \\u2014 crawl errors, redirects, index bloat, structured data and Core Web Vitals \\u2014 with a prioritized fix list.\",\"seo-audit\"],[\"list\",\"Keyword & Intent Mapping\",\"We map every page to real search intent, quantify opportunity, and build a 6\\u201312 month content roadmap.\",\"seo-keywords\"],[\"pen\",\"On-Page Optimization\",\"Title tags, meta descriptions, headings, internal linking, schema markup \\u2014 all tuned for both crawlers and humans.\",\"seo-onpage\"],[\"bolt\",\"Link Acquisition\",\"Editorially-earned backlinks from relevant, high-authority sites. No PBNs, no private networks, no spam.\",\"seo-links\"],[\"pen\",\"Content Production\",\"Long-form, expert-reviewed content designed to answer queries and earn links. Writer briefs, editing, publishing.\",\"seo-content\"]],\"projects\":[[\"Retail & E-commerce\",\"Online store ranked for 400+ product keywords, tripling non-paid revenue.\",[726,1026,\"488%\"],[2940,4310,\"488%\"],\"seo-p1\"],[\"SaaS & B2B\",\"B2B platform grew qualified demo requests via long-tail content.\",[410,620,\"210%\"],[1890,2750,\"210%\"],\"seo-p2\"],[\"Local Services\",\"Local business dominated \\\"near me\\\" searches across 3 cities.\",[530,780,\"320%\"],[2410,3390,\"320%\"],\"seo-p3\"]],\"workflow\":[[\"bolt\",\"Discovery & Goal Setting\",\"Understand business model, target markets, competitors and current visibility.\"],[\"list\",\"Technical Audit\",\"Deep crawl: indexation, redirects, speed, schema, mobile usability.\"],[\"chart\",\"Keyword Research\",\"Validate demand, intent, difficulty and business value for each target term.\"],[\"pen\",\"Content Roadmap\",\"Map keywords to pages; plan creation and optimization in priority order.\"],[\"bolt\",\"On-Page Optimization\",\"Ship title\\/meta\\/heading\\/linking changes page by page.\"],[\"list\",\"Technical Fixes\",\"Resolve crawl issues, speed bottlenecks and structured-data gaps.\"],[\"pen\",\"Content Production\",\"Write, review and publish \\u2014 long-form, cited and authoritative.\"],[\"arrow\",\"Link Acquisition\",\"Outreach, digital PR and editorial placements to build authority.\"],[\"chart\",\"Rank Tracking & Analytics\",\"Weekly tracking of keyword positions, organic traffic and conversion.\"],[\"shield\",\"Monthly Reporting & Iteration\",\"Reviewed playbook: what worked, what to double down on, what to drop.\"]],\"faqs\":[[\"How long until we see SEO results?\",\"Foundational fixes often move rankings within 30\\u201360 days. Meaningful organic growth typically appears by months 3\\u20136. Local SEO can be faster.\"],[\"Do you guarantee #1 rankings?\",\"No ethical SEO can guarantee rankings \\u2014 anyone who does is misleading you. We commit to strategy, execution and transparent reporting.\"],[\"Do you follow Google guidelines?\",\"Yes \\u2014 100% white-hat. Every tactic we use aligns with Google Search Essentials.\"],[\"Do you write content too?\",\"Yes. Every piece goes through a subject-matter-expert brief, a specialist writer and a fact-check pass.\"]],\"related\":[\"content-marketing\",\"paid-marketing\",\"social-media-marketing\"]}', '2026-11-03 15:55:51', '2026-11-03 15:55:51'),
(2, 'social-media-marketing', 'Social Media Marketing', 'Grow awareness and community with platform-native content, paid amplification and honest reporting.', 'Social media marketing services by Retrotech — strategy, content, paid social, community management and reporting across Instagram, LinkedIn, X and more.', 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?auto=format&fit=crop&w=900&q=80', 'chat', '{\"hero\":{\"badge\":\"Full-Service Social Media Team\",\"subtitle\":\"Turn social from a content treadmill into a measurable growth channel. Strategy, creative, paid amplification and community \\u2014 all under one roof.\",\"cta\":\"Get a Social Audit\"},\"topics\":[\"Instagram\",\"LinkedIn\",\"X (Twitter)\",\"Facebook\",\"Reels\",\"Shorts\",\"Content Calendar\",\"Community\",\"Paid Social\",\"Influencers\",\"Analytics\",\"Reporting\"],\"about\":{\"heading\":\"Social platforms built for business outcomes.\",\"paragraph\":\"Retrotech treats social as a full funnel \\u2014 from awareness reels that stop the scroll, to LinkedIn thought-leadership that lands enterprise leads, to community replies that keep customers coming back. Every asset is measured, iterated and reported monthly.\",\"features\":[[\"pen\",\"Platform-Native Creative\",\"Instagram needs different skills than LinkedIn. We build for each channel individually.\",\"Higher engagement, lower cost per result.\"],[\"bolt\",\"Paid Amplification\",\"Organic only goes so far \\u2014 we amplify top posts to reach the right audience fast.\",\"Predictable reach and lead flow.\"],[\"chat\",\"Community Management\",\"DMs, comments, reviews handled promptly with brand-consistent voice.\",\"Real conversations convert to customers.\"],[\"chart\",\"Full-Funnel Analytics\",\"Reach, engagement, clicks, cost per lead and revenue \\u2014 tracked end to end.\",\"Know exactly what to scale, what to cut.\"]]},\"rows\":[[\"chat\",\"Channel Strategy\",\"Pick the 2\\u20133 platforms that actually matter for your audience. Build a distinct playbook per channel.\",\"social-strategy\"],[\"pen\",\"Content Calendar\",\"Monthly calendar of posts, reels, carousels and stories \\u2014 planned, designed and scheduled.\",\"social-calendar\"],[\"bolt\",\"Paid Social Campaigns\",\"Meta, LinkedIn, TikTok ads with creative testing, audience research and bid strategy.\",\"social-paid\"],[\"user\",\"Community Management\",\"Replies, DMs and review responses handled daily, with escalation rules and FAQs.\",\"social-community\"],[\"chart\",\"Reporting & Optimization\",\"Monthly reviews: top posts, worst posts, cost per outcome, next-month plan.\",\"social-report\"]],\"projects\":[[\"D2C Fashion Brand\",\"Reels-first strategy grew follower base by 4x and drove direct sales.\",[12,48,\"300%\"],[680,2140,\"300%\"],\"social-p1\"],[\"B2B SaaS\",\"LinkedIn thought leadership drove inbound enterprise demos.\",[9,27,\"200%\"],[410,980,\"200%\"],\"social-p2\"],[\"Fitness Studio\",\"Instagram Reels + local targeting filled weekend classes.\",[4,18,\"350%\"],[240,720,\"350%\"],\"social-p3\"]],\"workflow\":[[\"bolt\",\"Brand & Audience Discovery\",\"Understand brand voice, target personas and current social footprint.\"],[\"list\",\"Channel Selection\",\"Pick the platforms where your buyers actually spend time.\"],[\"pen\",\"Content Pillars\",\"3\\u20135 recurring content themes that build brand and drive outcomes.\"],[\"list\",\"Monthly Calendar\",\"Detailed plan of posts, formats, CTAs and dates.\"],[\"pen\",\"Design & Copy\",\"Short-form video, carousels, static posts \\u2014 platform-perfect.\"],[\"bolt\",\"Paid Amplification\",\"Boost top organic posts + always-on campaigns for lead gen.\"],[\"chat\",\"Community Engagement\",\"Daily replies, DMs and review responses.\"],[\"arrow\",\"Scheduling & Publishing\",\"Scheduled via tools with timezone targeting per channel.\"],[\"chart\",\"Weekly Analytics Review\",\"Performance check: best posts, worst posts, spend efficiency.\"],[\"shield\",\"Monthly Strategy Iteration\",\"Full report + next-month plan based on what worked.\"]],\"faqs\":[[\"How many posts per month?\",\"Typically 12\\u201320 posts per platform, depending on tier. Includes reels, carousels, stories and statics.\"],[\"Do you handle replies and DMs?\",\"Yes \\u2014 daily community management is included in most tiers. We route sales leads to you immediately.\"],[\"Do you manage paid social budget?\",\"Yes. Ad spend is billed separately at cost, but we manage targeting, creative and bidding.\"],[\"Which platforms do you support?\",\"Instagram, LinkedIn, X, Facebook, TikTok, YouTube Shorts and Pinterest.\"]],\"related\":[\"paid-marketing\",\"content-marketing\",\"video-marketing\"]}', '2026-11-03 15:55:51', '2026-11-03 15:55:51'),
(3, 'paid-marketing', 'Paid Marketing', 'Turn ad spend into predictable revenue with Google, Meta and LinkedIn campaigns built for ROI.', 'Paid marketing services by Retrotech — Google Ads, Meta Ads, LinkedIn Ads, creative testing and conversion tracking that delivers real ROI.', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80', 'bolt', '{\"hero\":{\"badge\":\"Performance Marketing Experts\",\"subtitle\":\"Stop funding campaigns you can\\u2019t measure. We build paid funnels \\u2014 Google, Meta, LinkedIn \\u2014 that pay for themselves and scale predictably.\",\"cta\":\"Request a Media Plan\"},\"topics\":[\"Google Ads\",\"Meta Ads\",\"LinkedIn Ads\",\"YouTube Ads\",\"Shopping Ads\",\"Retargeting\",\"Creative Testing\",\"Bid Strategy\",\"Landing Pages\",\"Conversion Tracking\",\"Attribution\",\"Reporting\"],\"about\":{\"heading\":\"Paid campaigns engineered for ROI, not vanity metrics.\",\"paragraph\":\"Retrotech builds paid programs the way a portfolio manager builds positions \\u2014 small tests to validate, then aggressive scaling on proven winners. Every dollar is tracked to a conversion event.\",\"features\":[[\"bolt\",\"Full-Funnel Campaigns\",\"Awareness, consideration and retargeting layers working together.\",\"The right message at every stage of the funnel.\"],[\"chart\",\"Creative Testing\",\"Rigorous A\\/B testing of ads, hooks, and offers.\",\"The best-performing creative scales; the rest gets cut.\"],[\"shield\",\"Accurate Tracking\",\"GA4, server-side tracking and conversion APIs.\",\"Decisions based on truth, not attribution guesswork.\"],[\"user\",\"Landing Page CRO\",\"Ads only work if the landing page does.\",\"Higher conversion rate = lower cost per acquisition.\"]]},\"rows\":[[\"chart\",\"Account Setup & Audit\",\"Full rebuild of account structure, campaign naming, conversion tracking and attribution.\",\"paid-setup\"],[\"bolt\",\"Google Search & Shopping\",\"High-intent keyword campaigns, Shopping feeds, Performance Max \\u2014 tuned weekly.\",\"paid-google\"],[\"user\",\"Meta & Social Ads\",\"Facebook and Instagram ad funnels built around broad targeting and creative iteration.\",\"paid-meta\"],[\"list\",\"LinkedIn B2B Ads\",\"Account-based targeting for B2B lead gen, thought-leadership ads and demo requests.\",\"paid-linkedin\"],[\"pen\",\"Landing Page CRO\",\"Test copy, layout, offer and form to lift conversion rate without more spend.\",\"paid-cro\"]],\"projects\":[[\"E-commerce\",\"Google Shopping + Meta retargeting scaled ROAS to 5.8x.\",[240,720,\"188%\"],[1210,2980,\"188%\"],\"paid-p1\"],[\"B2B SaaS\",\"LinkedIn ABM campaigns drove $1.2M pipeline in 90 days.\",[310,850,\"174%\"],[1580,3410,\"174%\"],\"paid-p2\"],[\"Real Estate\",\"Meta lead-gen funnel reduced cost per lead by 62%.\",[180,470,\"160%\"],[820,1980,\"160%\"],\"paid-p3\"]],\"workflow\":[[\"shield\",\"Account Access & Audit\",\"Full review of existing accounts, tracking and creative.\"],[\"chart\",\"Conversion Tracking\",\"GA4, server-side events, offline imports \\u2014 properly wired.\"],[\"list\",\"Campaign Architecture\",\"Naming, account structure, budget split by funnel stage.\"],[\"pen\",\"Creative Development\",\"Ad copy, images, video assets \\u2014 enough variants to test properly.\"],[\"bolt\",\"Launch Test Wave\",\"Small-budget tests to find winning audiences and creative.\"],[\"chart\",\"Data Review\",\"Read results after 5\\u20137 days \\u2014 winners vs. losers identified.\"],[\"arrow\",\"Scale Winners\",\"Push budget on winning combos; kill losers quickly.\"],[\"pen\",\"Landing Page Tuning\",\"CRO tests based on the ad promise and traffic source.\"],[\"bolt\",\"Ongoing Iteration\",\"Weekly optimization, monthly creative refresh.\"],[\"shield\",\"Reporting & Transparency\",\"Live dashboards + monthly deep dive with recommendations.\"]],\"faqs\":[[\"What ad budget do I need?\",\"Most clients see meaningful traction from $1.5k+ per month in ad spend. Below this, data accumulates too slowly to optimize effectively.\"],[\"Do you charge a % of ad spend?\",\"We offer both flat retainer and % of spend \\u2014 we\\u2019ll recommend based on your budget and goals.\"],[\"Do you handle creative too?\",\"Yes \\u2014 static, video and UGC-style creative included in most retainers.\"],[\"What platforms do you run?\",\"Google, Meta (Facebook + Instagram), LinkedIn, YouTube, and TikTok.\"]],\"related\":[\"search-engine-optimization\",\"social-media-marketing\",\"email-marketing\"]}', '2026-11-03 15:55:51', '2026-11-03 15:55:51'),
(4, 'email-marketing', 'Email Marketing', 'Own your audience with automated email funnels, segmentation and campaigns that convert.', 'Email marketing services by Retrotech — automation, segmentation, flows and campaigns that turn subscribers into repeat customers.', 'https://images.unsplash.com/photo-1596526131083-e8c633c948d2?auto=format&fit=crop&w=900&q=80', 'mail', '{\"hero\":{\"badge\":\"Retention Marketing Specialists\",\"subtitle\":\"Email is still the highest-ROI channel in digital. We build automated flows and campaigns that turn subscribers into repeat customers \\u2014 while keeping deliverability intact.\",\"cta\":\"Get a Flow Audit\"},\"topics\":[\"Welcome Flows\",\"Abandoned Cart\",\"Browse Abandonment\",\"Post-Purchase\",\"Win-Back\",\"Segmentation\",\"A\\/B Testing\",\"Deliverability\",\"List Growth\",\"Klaviyo\",\"Mailchimp\",\"Reporting\"],\"about\":{\"heading\":\"Email that feels personal, performs like performance.\",\"paragraph\":\"Retrotech builds email systems that run like clockwork \\u2014 welcome flows, cart recovery, post-purchase nurture, win-backs \\u2014 plus seasonal campaigns that get opened. Every send is tested, segmented and measured.\",\"features\":[[\"bolt\",\"Automated Flows\",\"Welcome, cart, post-purchase, win-back \\u2014 set once, run forever.\",\"Revenue on autopilot, no per-campaign effort.\"],[\"list\",\"Smart Segmentation\",\"Segment by behavior, purchase history and lifecycle stage.\",\"The right message to the right subscriber.\"],[\"shield\",\"Deliverability Focus\",\"SPF, DKIM, DMARC, warm-up, list hygiene \\u2014 deliverability-first.\",\"Emails land in the inbox, not spam.\"],[\"chart\",\"Revenue Attribution\",\"Every email tracked to open, click and revenue.\",\"See exactly which flow earns what.\"]]},\"rows\":[[\"mail\",\"Flow Architecture\",\"Welcome, cart, browse, post-purchase, win-back \\u2014 mapped end to end.\",\"email-flows\"],[\"list\",\"List Growth & Lead Magnets\",\"Pop-ups, quizzes, lead magnets \\u2014 growing quality subscribers.\",\"email-growth\"],[\"pen\",\"Design & Copywriting\",\"Brand-aligned templates and copy engineered for clicks.\",\"email-design\"],[\"bolt\",\"A\\/B Testing\",\"Subject lines, send times, content layouts \\u2014 rigorously tested.\",\"email-abtest\"],[\"shield\",\"Deliverability & Compliance\",\"Authentication, warming, list hygiene and CAN-SPAM\\/GDPR compliance.\",\"email-deliver\"]],\"projects\":[[\"D2C Skincare\",\"Welcome + win-back flows drove 38% of email revenue.\",[4,15,\"275%\"],[180,640,\"275%\"],\"email-p1\"],[\"B2B Services\",\"Nurture sequences doubled demo bookings.\",[3,12,\"300%\"],[140,560,\"300%\"],\"email-p2\"],[\"Online Courses\",\"Segmented campaigns lifted open rate to 62%.\",[8,22,\"175%\"],[320,890,\"175%\"],\"email-p3\"]],\"workflow\":[[\"list\",\"Audit & Setup\",\"Review existing lists, flows, sender reputation.\"],[\"bolt\",\"Authentication\",\"SPF, DKIM and DMARC configured correctly.\"],[\"pen\",\"Flow Design\",\"Map the customer lifecycle to email touchpoints.\"],[\"mail\",\"Template Build\",\"Modular, mobile-first templates for each flow.\"],[\"pen\",\"Copywriting\",\"Subject lines, body copy and CTAs written for each flow.\"],[\"list\",\"Segmentation\",\"Behavior and lifecycle segments built inside your ESP.\"],[\"bolt\",\"Flow Launch\",\"Flows enabled and tested end-to-end.\"],[\"chart\",\"A\\/B Testing\",\"Subject lines, content and send times tested and iterated.\"],[\"arrow\",\"Campaign Calendar\",\"Seasonal campaigns planned and designed in advance.\"],[\"shield\",\"Reporting & Optimization\",\"Monthly report + flow tuning + new opportunities.\"]],\"faqs\":[[\"Which email platforms do you use?\",\"Klaviyo, Mailchimp, HubSpot, ActiveCampaign and Brevo. We\\u2019ll recommend one based on your stack.\"],[\"Do you build the flows or just write copy?\",\"Both \\u2014 flow design, template build, copywriting and deployment end to end.\"],[\"How long does setup take?\",\"Typically 3\\u20134 weeks for a full flow build. Existing accounts can be optimized in 1\\u20132 weeks.\"],[\"Can you fix deliverability issues?\",\"Yes \\u2014 this is one of our specialities. We audit and fix SPF\\/DKIM\\/DMARC, warming and list hygiene.\"]],\"related\":[\"search-engine-optimization\",\"content-marketing\",\"social-media-marketing\"]}', '2026-11-03 15:55:51', '2026-11-03 15:55:51'),
(5, 'orm-services', 'ORM Services', 'Protect and improve your brand reputation across Google, review sites and social channels.', 'Online reputation management by Retrotech — review strategy, Google Business optimization, complaint handling, brand monitoring and crisis response.', 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80', 'shield', '{\"hero\":{\"badge\":\"Reputation Defence Experts\",\"subtitle\":\"Your reputation is your first impression. We monitor, respond and rebuild across Google, review sites and social \\u2014 with a structured playbook ready to deploy.\",\"cta\":\"Get a Reputation Audit\"},\"topics\":[\"Google Reviews\",\"Trustpilot\",\"Glassdoor\",\"Complaint Handling\",\"Brand Monitoring\",\"Crisis Response\",\"Knowledge Panel\",\"Local Listings\",\"Review Generation\",\"Competitor Watch\",\"SERP Control\",\"Reporting\"],\"about\":{\"heading\":\"Proactive reputation management \\u2014 not damage control.\",\"paragraph\":\"Retrotech builds reputation programs that get ahead of problems: review generation engines, response playbooks, brand monitoring, and SERP strategies that keep the good stuff visible and the bad stuff buried.\",\"features\":[[\"shield\",\"Real-Time Monitoring\",\"Brand mentions, review sites and search results tracked 24\\/7.\",\"You hear it first \\u2014 not last.\"],[\"chat\",\"Response Playbooks\",\"Response templates and escalation paths ready for every scenario.\",\"Consistent, brand-safe replies within hours.\"],[\"pen\",\"Review Generation\",\"Automated review request flows that lift rating scores.\",\"More 5-stars, more customers.\"],[\"chart\",\"SERP Control\",\"Own page 1 with brand-owned assets and positive press.\",\"Damage pushed off the first page.\"]]},\"rows\":[[\"shield\",\"Brand Audit\",\"Full audit across Google, review sites and social mentions.\",\"orm-audit\"],[\"chat\",\"Review Response\",\"Professional, brand-consistent replies to every review within 24h.\",\"orm-response\"],[\"bolt\",\"Review Generation\",\"Automated request flows triggered post-purchase or post-service.\",\"orm-generate\"],[\"list\",\"Complaint Escalation\",\"Tiered playbook for handling complex complaints without escalation.\",\"orm-complaints\"],[\"chart\",\"SERP & Crisis\",\"Content and PR to control page 1 search results during a crisis.\",\"orm-crisis\"]],\"projects\":[[\"Healthcare\",\"Grew Google rating from 3.6 to 4.8 in 6 months.\",[12,48,\"300%\"],[680,2140,\"300%\"],\"orm-p1\"],[\"E-commerce\",\"Negative reviews buried from page 1 by month 3.\",[9,27,\"200%\"],[410,980,\"200%\"],\"orm-p2\"],[\"SaaS\",\"Crisis response playbook averted major PR damage.\",[4,18,\"350%\"],[240,720,\"350%\"],\"orm-p3\"]],\"workflow\":[[\"shield\",\"Audit\",\"Map all mentions across Google, review sites and social.\"],[\"list\",\"Prioritization\",\"Sort issues by severity and business impact.\"],[\"chat\",\"Response Playbooks\",\"Standard responses for common scenarios, escalation rules for edge cases.\"],[\"bolt\",\"Review Generation\",\"Automated request flows triggered at the right moment.\"],[\"pen\",\"Content Assets\",\"Own the SERP with owned content, press and case studies.\"],[\"arrow\",\"PR & Outreach\",\"Third-party credibility to push down negatives.\"],[\"chart\",\"Competitor Monitoring\",\"Track competitor mentions and reputation shifts.\"],[\"shield\",\"Crisis Readiness\",\"Standby playbook, holding statements, response team.\"],[\"arrow\",\"SERP Tracking\",\"Weekly check of page 1 results for your brand keywords.\"],[\"chart\",\"Reporting\",\"Monthly dashboard of mentions, sentiment, ratings and SERP position.\"]],\"faqs\":[[\"Can you remove bad reviews?\",\"Genuine reviews cannot be removed. But we can flag reviews that violate platform policies, bury negatives through SERP control, and rebuild overall rating with volume.\"],[\"How quickly can you help?\",\"Response playbooks deploy within days. Rating improvement is typically visible in 30\\u201390 days. Crisis response is immediate.\"],[\"Do you offer 24\\/7 monitoring?\",\"Yes \\u2014 24\\/7 brand monitoring is standard on all ORM retainers.\"],[\"Can you help during a PR crisis?\",\"Yes \\u2014 we maintain a crisis-response retainer with pre-approved statements and rapid deployment.\"]],\"related\":[\"social-media-marketing\",\"search-engine-optimization\",\"content-marketing\"]}', '2026-11-03 15:55:51', '2026-11-03 15:55:51'),
(6, 'content-marketing', 'Content Marketing', 'Build authority with content that ranks, converts and compounds — blogs, guides and thought leadership.', 'Content marketing services by Retrotech — strategy, writing, editing and distribution for blogs, guides and thought leadership that drive real revenue.', 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=900&q=80', 'list', '{\"hero\":{\"badge\":\"Content-Led Growth\",\"subtitle\":\"Good content earns rankings, links and trust \\u2014 but only if it\\u2019s the right content, written well, and distributed properly. We build engines that do all three.\",\"cta\":\"Request a Content Audit\"},\"topics\":[\"Content Strategy\",\"Blog Posts\",\"Pillar Pages\",\"Thought Leadership\",\"Case Studies\",\"Whitepapers\",\"SEO Writing\",\"Editorial Calendar\",\"Subject Experts\",\"Distribution\",\"Analytics\",\"Reporting\"],\"about\":{\"heading\":\"Content that earns attention \\u2014 and revenue.\",\"paragraph\":\"Retrotech builds content programs that compound. We start from real search and buyer intent data, brief each piece with subject-matter experts, write in your voice, and distribute like a publisher \\u2014 not a blog.\",\"features\":[[\"list\",\"Data-Backed Topics\",\"Every topic validated by search demand, buyer intent and competitor gap.\",\"Content that gets found by the right people.\"],[\"pen\",\"Expert-Led Writing\",\"Subject-matter experts briefed and interviewed for each piece.\",\"Credibility and depth that AI content can\\u2019t match.\"],[\"chart\",\"SEO & AEO Optimized\",\"Tuned for both traditional SEO and AI-search citation.\",\"Content visible in Google \\u2014 and in AI answers.\"],[\"bolt\",\"Distribution Engine\",\"Repurposed across email, social, LinkedIn and video.\",\"Each piece works 5\\u201310x harder.\"]]},\"rows\":[[\"list\",\"Content Strategy\",\"Audience research, buyer journey mapping, topic clusters and publishing cadence.\",\"content-strategy\"],[\"pen\",\"Editorial Calendar\",\"Monthly and quarterly calendar \\u2014 what, when, who, and why.\",\"content-calendar\"],[\"list\",\"Content Production\",\"Blog posts, guides, whitepapers, case studies \\u2014 written, edited, fact-checked.\",\"content-write\"],[\"bolt\",\"Distribution\",\"Cross-channel promotion: newsletter, social, repurposed video and PDF.\",\"content-distribute\"],[\"chart\",\"Analytics & Iteration\",\"Track rankings, traffic and conversions \\u2014 iterate to double down on winners.\",\"content-report\"]],\"projects\":[[\"B2B SaaS\",\"Content engine drove 45% of all inbound leads.\",[12,48,\"300%\"],[680,2140,\"300%\"],\"content-p1\"],[\"Fintech\",\"Pillar pages ranked #1 for 12 commercial keywords.\",[9,27,\"200%\"],[410,980,\"200%\"],\"content-p2\"],[\"Healthcare\",\"Case studies + guides cut sales cycle by 30%.\",[4,18,\"350%\"],[240,720,\"350%\"],\"content-p3\"]],\"workflow\":[[\"bolt\",\"Discovery\",\"Understand audience, product and revenue goals.\"],[\"list\",\"Content Strategy\",\"Cluster plan, cadence and channel map.\"],[\"pen\",\"Topic Briefs\",\"Detailed briefs with SEO intent, outline and SMEs to interview.\"],[\"list\",\"Subject Expert Outreach\",\"Interview founders and team to capture unique POVs.\"],[\"pen\",\"Writing & Editing\",\"Draft, edit, fact-check, design inline visuals.\"],[\"shield\",\"Publishing Prep\",\"SEO checks, metadata, internal linking, schema.\"],[\"arrow\",\"Publishing & Promotion\",\"Publish + distribute to newsletter, social and LinkedIn.\"],[\"bolt\",\"Repurposing\",\"Each piece \\u2192 4 social posts + 1 video + 1 newsletter.\"],[\"chart\",\"Analytics\",\"Traffic, rankings, conversions per piece \\u2014 reviewed monthly.\"],[\"shield\",\"Iteration\",\"Improve top performers, cull bottom, publish next.\"]],\"faqs\":[[\"Who writes the content?\",\"Trained writers paired with subject-matter experts from your team (or ours) for credibility.\"],[\"Do you research topics?\",\"Yes \\u2014 topic selection is based on search volume, intent and competitor gap data.\"],[\"Do you handle publishing?\",\"Yes \\u2014 we can publish directly to your CMS or deliver ready-to-publish drafts.\"],[\"How long until content pays off?\",\"Usually 3\\u20136 months for compounding SEO, faster for distribution-led content.\"]],\"related\":[\"search-engine-optimization\",\"email-marketing\",\"social-media-marketing\"]}', '2026-11-03 15:55:51', '2026-11-03 15:55:51'),
(7, 'video-marketing', 'Video Marketing', 'Short-form reels, YouTube strategy and repurposed long-form video that build brand and drive sales.', 'Video marketing services by Retrotech — short-form reels, YouTube strategy, ad creative and long-form brand video production.', 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=900&q=80', 'pen', '{\"hero\":{\"badge\":\"Short-Form & Long-Form Video\",\"subtitle\":\"Video is now the front door of your brand. We build reels, YouTube content, ad creative and repurposed clips that actually move people to act.\",\"cta\":\"Plan a Video Strategy\"},\"topics\":[\"Reels\",\"YouTube\",\"Shorts\",\"TikTok\",\"Ad Creative\",\"Editing\",\"Scripting\",\"Storyboards\",\"Repurposing\",\"Thumbnails\",\"Audience Research\",\"Analytics\"],\"about\":{\"heading\":\"Video content built for both algorithms and customers.\",\"paragraph\":\"Retrotech runs a full video engine \\u2014 ideation, scripting, shooting, editing and repurposing \\u2014 so each piece works hard across reels, Shorts, TikTok, YouTube and paid ads. Native to each platform, never repurposed lazily.\",\"features\":[[\"pen\",\"Reels & Shorts Engine\",\"Fast, scroll-stopping short-form content produced weekly.\",\"Consistent reach without creative burnout.\"],[\"bolt\",\"YouTube Strategy\",\"Long-form SEO-driven content that builds audience and authority.\",\"Compounding reach, evergreen traffic.\"],[\"chart\",\"Ad Creative Testing\",\"Meta and YouTube video ads built to convert.\",\"Higher thumb-stop and lower CPMs.\"],[\"user\",\"Full Production\",\"Idea \\u2192 script \\u2192 shoot \\u2192 edit \\u2192 publish, managed end to end.\",\"One accountable team. Zero handoffs.\"]]},\"rows\":[[\"pen\",\"Content Ideation\",\"Data-driven idea pipeline \\u2014 what\\u2019s trending, what competitors miss, what your audience wants.\",\"video-ideas\"],[\"list\",\"Scripting & Storyboards\",\"Hooks, structure and narrative designed for retention.\",\"video-script\"],[\"bolt\",\"Filming & Production\",\"Studio or on-location shoots, UGC-style creator shoots, or remote recording.\",\"video-shoot\"],[\"pen\",\"Post-Production\",\"Editing, captions, animations, sound design and platform-ready exports.\",\"video-edit\"],[\"chart\",\"Distribution & Analytics\",\"Publishing across channels + performance tracking per video.\",\"video-report\"]],\"projects\":[[\"Skincare D2C\",\"Reels strategy drove 12M organic views in 90 days.\",[12,48,\"300%\"],[680,2140,\"300%\"],\"video-p1\"],[\"SaaS Platform\",\"YouTube channel turned into the #1 demo source.\",[9,27,\"200%\"],[410,980,\"200%\"],\"video-p2\"],[\"Fitness Brand\",\"TikTok + Reels creative drove app installs at $0.62 CPI.\",[4,18,\"350%\"],[240,720,\"350%\"],\"video-p3\"]],\"workflow\":[[\"list\",\"Audience & Channel Research\",\"Where does your audience watch? What hooks them?\"],[\"bolt\",\"Content Pillars\",\"3\\u20135 recurring themes so content builds an identity.\"],[\"pen\",\"Scripting\",\"Hook \\u2192 tension \\u2192 resolution \\u2192 CTA.\"],[\"list\",\"Production Plan\",\"Shoot schedule, locations, talent, props.\"],[\"bolt\",\"Filming\",\"Studio, on-location or UGC-style \\u2014 match the format to the message.\"],[\"pen\",\"Editing\",\"Cut, caption, animate, sound design, platform exports.\"],[\"chart\",\"Platform-Native Publishing\",\"Publish with the right dimensions, hooks and captions per channel.\"],[\"arrow\",\"Repurposing\",\"One long video \\u2192 8\\u201310 short clips \\u2192 LinkedIn carousels.\"],[\"shield\",\"Compliance & Rights\",\"Music licensing, usage rights, disclosure compliance.\"],[\"chart\",\"Analytics & Iteration\",\"Watch time, retention, CTR \\u2014 iterated monthly.\"]],\"faqs\":[[\"Do you shoot the videos or do we?\",\"Both models work. We can shoot in our studio or work with your existing content team.\"],[\"How many videos per month?\",\"Typically 4\\u20138 long-form and 12\\u201320 short clips monthly, depending on tier.\"],[\"Do you handle UGC creators?\",\"Yes \\u2014 we manage a network of creators for authentic UGC-style content.\"],[\"What about music licensing?\",\"All music used is properly licensed. We handle the compliance.\"]],\"related\":[\"social-media-marketing\",\"paid-marketing\",\"content-marketing\"]}', '2026-11-03 15:55:51', '2026-11-03 15:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0LMQoVtaQST7Jcc4XHdVG964RzKYUxHd3F4oPaPf', NULL, '::1', 'curl/8.21.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMGpmQUtacktqbXB1czg4b1ExV2xrdlBjQW9WUEJ0NmVwdmtTNEY5VCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1793739140),
('E4TYSvJkctPPrX1kFAnwdbF3SgLiGOVgJz7i7kOw', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUWlDdzF4QTZQbVpQR3B5ZDVtMjdGMEJqeHVTRTgyU2xERVNSNUpaaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly9sb2NhbGhvc3QvcmV0cm9fZGlnaXRhbC9wdWJsaWMvdGVjaC1kZXZlbG9wbWVudC9jcm0tZGV2ZWxvcG1lbnQiO3M6NToicm91dGUiO3M6MjE6InRlY2gtZGV2ZWxvcG1lbnQuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImZmMmU3ZGYwNDVkY2YxNDVmY2IwYmRiNmJjYTU5NzBhMWYzNTY5MDJlYzhlODUxNmU5OGZhZDcwNzFmNTVjOGIiO30=', 1793739925),
('eb2HwhVpvfKAqST85oZyprl7p1MxnV6HYPGHjoXN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibTBVNllQTnJIUHNkNVdVM3pCSFhzRW9RSHVHdTdtTTlzOTNLbmo2MSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL3Rlc3RpbW9uaWFscy9jcmVhdGUiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0MDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL3Rlc3RpbW9uaWFscyI7czo1OiJyb3V0ZSI7czoyNDoiYWRtaW4udGVzdGltb25pYWxzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiMTkwNTMzYjZhOGRlMjYxYzkzZWVhMDVkYzAzYjIxNDljZGU0ZGUyNTA0ODZhYzI3NWY3OTY1YWY3M2IyN2RlNyI7fQ==', 1793019741),
('hU3ECoAxv4rbEzhSjf6cmv4S8bo5mvmdeffNN3pc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczdaNHRKdVoyVTA5NHJOdHJ4MWdENG8wMWtSUXlDY1JPZmgxTnFESiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1793021805),
('kyAv8nJtie1xmNO82s8VRRCmsev3Ndx5cVZIuHlh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.143.1 Chrome/150.0.7871.250 Electron/43.7.7 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWxqdXpBRDdJNnBESVZFalNtSEJ1YTBpenREYmdmdXBCYUd5QTIycSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1793026244),
('lRftZSdfTmCFbJ5IO9sLzX1MWUDa2PUKkfpVfFvm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTjY0ME1RUDFwNVo5MDVIRWJ3dUo4eEJuZHBLYUZVN1R3c0lGTmJkYyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMi9hZG1pbi9kYXNoYm9hcmQ/dGFiPXdlYnBhZ2UiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMi9hZG1pbi9kYXNoYm9hcmQ/dGFiPWJsb2dzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiZmYyZTdkZjA0NWRjZjE0NWZjYjBiZGI2YmNhNTk3MGExZjM1NjkwMmVjOGU4NTE2ZTk4ZmFkNzA3MWY1NWM4YiI7fQ==', 1793742638),
('NmCoT7m0kXxvBApMtYZFUaV9yfYB85BMa2lYebkB', NULL, '127.0.0.1', 'curl/8.21.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTFGU1JzT3BkbmJPTlRxVlpYNVlIblFKN253NjZxcmtRdkZWQ2tJaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4MC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793741514),
('PXZL5rpFm4P7SFAcDntjmeO7x0AuCTVYo4QNXfBk', NULL, '192.168.0.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2JSbG9uUU1MSjIycnVLalNrdDQzZXllUkk2QVIxV1FXZFVMZkJ3eiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4LjAuMTQ2OjgwMDAiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793021942),
('qtLOo9mpLVFGtUku0zoMzQKXSrdHZLvWiDsUbQhQ', NULL, '192.168.0.189', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmR3cXVUWWZuSVJZMUZwTm1HSW1lQzJySXhZcktoUGxoMEZOemUxbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4LjAuMTQ2OjgwMDAiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793022120),
('QzpwB6f5xzrUfda26Cdj2YHyy6bHaPSlfuGdIzDW', NULL, '::1', 'curl/8.21.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXB5RFBldEcydkRMTHkyeTlUZWJCZWhXc1VzNHZ5ZGoyUXltcTN0byI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3QvcmV0cm9fZGlnaXRhbC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793739152),
('v1stnnmHIxFJqcqK6oLkAYS0E9ihXfVoIZCK8KOH', 1, '127.0.0.1', 'curl/8.21.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVURmaThNRGJwaUJhOVhxYmFqc3U1bnZkelpPRWlSbXlhd3UwUWxEeiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4MC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImZmMmU3ZGYwNDVkY2YxNDVmY2IwYmRiNmJjYTU5NzBhMWYzNTY5MDJlYzhlODUxNmU5OGZhZDcwNzFmNTVjOGIiO30=', 1793741532),
('vRxOxb5H4DfKar20MzkENp6XoBJJ3Kyx7OLbYULc', NULL, '::1', 'curl/8.21.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibFBreEJWT2xZYTdJaFZOSFBqSkRUOVU4ZmxPVTRlZWc5cmdkN2c0VCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1793740448),
('WyVrpYQs0iCaQNducVuGQtnDt4xFMrnaHNIrPc1K', NULL, '127.0.0.1', 'curl/8.21.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVnlYdmRyM0g3SFpMazFQM1JtSkhmSmg0STRTREVZS2VwTDVyTEhYeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1793740559),
('xyCcvl9SOEMlCjEBkfata31vB5pgazmvn3277mWO', NULL, '192.168.0.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTVFN3JtN2tUaUtNWnNiWWRWVXlDR1kyYXBlV0lUWm5mMWZ1cVl4MiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xOTIuMTY4LjAuMTQ2OjgwMDAvc2VydmljZXMvY3VzdG9tLWFwcGxpY2F0aW9uIjtzOjU6InJvdXRlIjtzOjEyOiJjYXRhbG9nLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1793020868),
('YR3Vlc0HE4DlBD3AyCHAe5SOUbJFzoYUrJt27zth', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiak5rS2ozRXlqZ2d1d0VvbmREUlpZbXlwS3JDeHNjbjljTDZRVEw1aiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ibG9nIjtzOjU6InJvdXRlIjtzOjQ6ImJsb2ciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiIxOTA1MzNiNmE4ZGUyNjFjOTNlZWEwNWRjMDNiMjE0OWNkZTRkZTI1MDQ4NmFjMjc1Zjc5NjVhZjczYjI3ZGU3Ijt9', 1793026273);

-- --------------------------------------------------------

--
-- Table structure for table `tech_developments`
--

CREATE TABLE `tech_developments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tech_development_sections`
--

CREATE TABLE `tech_development_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tech_development_id` bigint(20) UNSIGNED NOT NULL,
  `section_type` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `location`, `rating`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'D', 'Bihar', 4.9, 'This is a test', 'testimonials/VXgDugPMVE5vMi1vTnfCyGgukWXEYaI2C0phYwEj.jpg', '2026-10-23 14:43:06', '2026-10-23 14:43:06'),
(2, 'jshfksd', 'Ghaziabad, Uttar Pradesh, India', 5.0, 'lkdsfjaldskj alkddflkasdjlkfajsd', 'testimonials/GHuElwxikndUNB0S2P38c9Uy5lgkRGRMdYvPVUaS.png', '2026-10-23 14:57:43', '2026-10-23 14:57:43'),
(3, 'Sarah Jenkins', 'Ghaziabad, Uttar Pradesh, India', 4.2, 'I cannot speak highly enough of the service I received from start to finish. From the initial consultation, the team was incredibly professional, attentive, and genuinely interested in understanding my specific needs. They didn\'t just try to sell me the most expensive option; instead, they carefully analyzed my requirements and recommended a tailored solution that perfectly fit my budget and long-term goals. The delivery was prompt, and the installation process was flawless. Even weeks later, their customer support team checked in to ensure everything was running smoothly. It\'s rare to find a company that truly values its clients like this. The product quality is exceptional, the attention to detail is unmatched, and the overall experience has been nothing short of outstanding. I highly recommend them to anyone looking for top-tier service and unparalleled expertise in this industry.\r\nI cannot speak highly enough of the service I received from start to finish. From the initial consultation, the team was incredibly professional, attentive, and genuinely interested in understanding my specific needs. They didn\'t just try to sell me the most expensive option; instead, they carefully analyzed my requirements and recommended a tailored solution that perfectly fit my budget and long-term goals. The delivery was prompt, and the installation process was flawless. Even weeks later, their customer support team checked in to ensure everything was running smoothly. It\'s rare to find a company that truly values its clients like this. The product quality is exceptional, the attention to detail is unmatched, and the overall experience has been nothing short of outstanding. I highly recommend them to anyone looking for top-tier service and unparalleled expertise in this industry.\r\nI cannot speak highly enough of the service I received from start to finish. From the initial consultation, the team was incredibly professional, attentive, and genuinely interested in understanding my specific needs. They didn\'t just try to sell me the most expensive option; instead, they carefully analyzed my requirements and recommended a tailored solution that perfectly fit my budget and long-term goals. The delivery was prompt, and the installation process was flawless. Even weeks later, their customer support team checked in to ensure everything was running smoothly. It\'s rare to find a company that truly values its clients like this. The product quality is exceptional, the attention to detail is unmatched, and the overall experience has been nothing short of outstanding. I highly recommend them to anyone looking for top-tier service and unparalleled expertise in this industry.', 'testimonials/TQcZOaoKiqHzOD29CaY753HUbfIuTXUEO83PPtlW.png', '2026-10-26 07:32:20', '2026-10-26 07:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin@test.com', NULL, '$2y$12$Zl4QlmZ/vMAZvbvst4C7deTKgu7TVbCikMTGNPq.RyRSFyAKUN6KS', NULL, NULL, NULL, NULL, '2026-10-22 09:09:58', '2026-10-23 13:00:37', 1),
(3, 'Editor Staff', 'editor@test.com', NULL, '$2y$12$oCmTBRZxC53TYlVG5TvQB.nbWg3TG/DH3fRlKjE.LgB8rBn1VUuwu', NULL, NULL, NULL, NULL, '2026-11-03 16:21:16', '2026-11-03 16:21:16', 0),
(4, 'Author Writer', 'author@test.com', NULL, '$2y$12$U3tZTxxagXdxk.DPqSjXz.Z4NdTF6A4vKzSaJc8zmQbja1JpAMhia', NULL, NULL, NULL, NULL, '2026-11-03 16:21:16', '2026-11-03 16:21:16', 0),
(5, 'Support Viewer', 'viewer@test.com', NULL, '$2y$12$PD2nkVyAXa5HeW6TsEDPHehvnM0Z27Jr/vSgkHvpIrBHY8zQai1u.', NULL, NULL, NULL, NULL, '2026-11-03 16:21:16', '2026-11-03 16:21:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_pages`
--

CREATE TABLE `web_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'marketing',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `short_description` varchar(500) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_page_sections`
--

CREATE TABLE `web_page_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_page_id` bigint(20) UNSIGNED NOT NULL,
  `section_type` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_created_by_foreign` (`created_by`),
  ADD KEY `faqs_updated_by_foreign` (`updated_by`),
  ADD KEY `faqs_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `industries_slug_unique` (`slug`);

--
-- Indexes for table `industry_contents`
--
ALTER TABLE `industry_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industry_contents_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `passkeys`
--
ALTER TABLE `passkeys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passkeys_credential_id_unique` (`credential_id`),
  ADD KEY `passkeys_user_id_index` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tech_developments`
--
ALTER TABLE `tech_developments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tech_developments_slug_unique` (`slug`);

--
-- Indexes for table `tech_development_sections`
--
ALTER TABLE `tech_development_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tech_development_sections_tech_development_id_foreign` (`tech_development_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_pages`
--
ALTER TABLE `web_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `web_pages_slug_unique` (`slug`);

--
-- Indexes for table `web_page_sections`
--
ALTER TABLE `web_page_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `web_page_sections_web_page_id_foreign` (`web_page_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industry_contents`
--
ALTER TABLE `industry_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `passkeys`
--
ALTER TABLE `passkeys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tech_developments`
--
ALTER TABLE `tech_developments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tech_development_sections`
--
ALTER TABLE `tech_development_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `web_pages`
--
ALTER TABLE `web_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_page_sections`
--
ALTER TABLE `web_page_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `faqs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `industry_contents`
--
ALTER TABLE `industry_contents`
  ADD CONSTRAINT `industry_contents_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `passkeys`
--
ALTER TABLE `passkeys`
  ADD CONSTRAINT `passkeys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tech_development_sections`
--
ALTER TABLE `tech_development_sections`
  ADD CONSTRAINT `tech_development_sections_tech_development_id_foreign` FOREIGN KEY (`tech_development_id`) REFERENCES `tech_developments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `web_page_sections`
--
ALTER TABLE `web_page_sections`
  ADD CONSTRAINT `web_page_sections_web_page_id_foreign` FOREIGN KEY (`web_page_id`) REFERENCES `web_pages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
