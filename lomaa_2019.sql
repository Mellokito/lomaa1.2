-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 29 nov. 2019 à 00:28
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lomaa_2019`
--
CREATE DATABASE IF NOT EXISTS `lomaa_2019` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `lomaa_2019`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `auteur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fichier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `auteur`, `image`, `fichier`, `slug`, `user_id`, `categorie_id`, `valide`, `publish`, `created_at`, `updated_at`) VALUES
(3, 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', '<p dir=\"rtl\">وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض</p>', '2019-11-22 00:00:00', 'وريم ايبسوم', 'yJpdiI6IlwvMW4yMkZCRlJVWFRxK1JZamljYVF3PT0iLCJ2YWx.jpg', NULL, 'eyJpdiI6IlFzOHNaQkV3', 1, 4, 0, 0, '2019-11-22 18:56:32', '2019-11-22 18:56:32'),
(4, 'انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق', '<p dir=\"rtl\">لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p dir=\"rtl\">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام &quot;هنا يوجد محتوى نصي، هنا يوجد محتوى نصي&quot; فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال &quot;lorem ipsum&quot; في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.</p>\r\n\r\n<p dir=\"rtl\">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.</p>', '2019-11-22 00:00:00', 'وريم ايبسوم', 'yJpdiI6ImFlSTF6d0FNTTROUVFQOG5henFNOFE9PSIsInZhbHV.jpg', NULL, 'eyJpdiI6IjJQWXY0d0xudGNOZ', 1, 10, 0, 0, '2019-11-22 19:00:42', '2019-11-22 22:10:29'),
(5, 'يوضع في التصاميم لتعرض', '<p>test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;</p>', '2019-11-23 00:00:00', 'وريم ايبسوم', 'yJpdiI6InJodnc0ZXQwQ3J1VnNlZnp6dHBMZVE9PSIsInZhbHV.jpg', NULL, 'kZsSVJvc1dlZDd6ZnRsd', 1, 10, 0, 0, '2019-11-22 23:11:06', '2019-11-22 23:11:06'),
(7, 'test articleq', '<p>qsdqsdqsdqsdqsdqsd</p>', '2019-11-23 00:00:00', 'qdqsdqsd', 'yJpdiI6Ikk0Wm8yNzBiQjB1UWhNSHNFQWRBeWc9PSIsInZhbHV.jpg', NULL, 'lU4STVkVkpkNHFUMTBGM', 1, 17, 1, 1, '2019-11-23 13:29:43', '2019-11-24 16:29:11'),
(8, 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', '<p>&nbsp;art icle par user</p>', '2019-11-24 00:00:00', 'user', 'yJpdiI6IlwveHpLbjByYW5weHdvSitkRGZZUlwvUT09IiwidmF.jpg', NULL, 'ml2bmp5Sk5WUjBESUJPQ', 2, 17, 0, 0, '2019-11-23 22:44:33', '2019-11-23 22:44:33'),
(9, 'test', '<p>qsdqsd</p>', '2019-11-24 00:00:00', 'qsdqsdsd', 'yJpdiI6IjdvZFwvbFdOMldEUGcyQSt6YjRKRHF3PT0iLCJ2YWx.jpg', NULL, 'nFQSzU2N0tjWXFodjFlb', 2, 4, 1, 1, '2019-11-23 23:19:14', '2019-11-24 05:56:05'),
(10, 'test', '<p>qsdqsd</p>', '2019-11-24 00:00:00', 'qsdqsd', 'yJpdiI6IktiTVNuaFFOcW1GYTFJaStKRG1BcFE9PSIsInZhbHV.jpg', NULL, 'lwvblpRMVJQZFR6S1lpa', 1, 4, 1, 1, '2019-11-24 00:22:52', '2019-11-24 16:30:53'),
(11, 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', '<p>sqsssssssssssssssssssssssssss</p>', '2019-11-24 00:00:00', 'وريم ايبسوم', 'yJpdiI6ImFka0ZydjVUOGJBdVI3M01kb3puNHc9PSIsInZhbHV.jpg', NULL, 'llhVjhaYm0xeno5VXA0N', 2, 4, 1, 0, '2019-11-24 00:25:17', '2019-11-24 16:28:17'),
(12, 'kjkjkjkj', '<p>kjuhkjhkjh</p>', '2019-11-24 00:00:00', 'jhgjhgjhgjh', 'yJpdiI6Imh4Tk1aUHpsRDdzNllONW1LdTdqdEE9PSIsInZhbHV.jpg', 'yJpdiI6ImVGSjc4eDRvRjZIeEFSektuRVoyZ3c9PSIsInZhbHV.docx', 'eyJpdiI6ImQ1b1hlZSs2aU4xb', 2, 4, 1, 0, '2019-11-24 16:51:45', '2019-11-25 01:37:45');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `slug`, `valide`, `publish`, `created_at`, `updated_at`) VALUES
(4, 'مقارنة الأديان', 'eyJpdiI6IjhnTjBoYmt5', 1, 1, '2019-11-22 17:24:45', '2019-11-22 17:24:45'),
(5, 'دراسة العقائد', 'eyJpdiI6IlF0TG9JYTM3', 1, 1, '2019-11-22 17:24:55', '2019-11-22 17:24:55'),
(6, 'دراسة شرائع الأديان', 'eyJpdiI6InB0R1wvWHlz', 1, 1, '2019-11-22 17:25:09', '2019-11-22 17:25:09'),
(7, 'الدراسات الصوفية', 'eyJpdiI6InpUUnJlbUh4', 1, 1, '2019-11-22 17:25:18', '2019-11-22 17:25:18'),
(8, 'التطرف والارهاب', 'eyJpdiI6ImFhNU5HdGRI', 1, 1, '2019-11-22 17:25:29', '2019-11-22 17:25:29'),
(9, 'علم الاجتماع الديني', 'eyJpdiI6ImNPZE0wVXYy', 1, 1, '2019-11-22 17:25:40', '2019-11-22 18:08:04'),
(10, 'علم النفس الديني', 'eyJpdiI6Im5qRXRNZmZi', 1, 1, '2019-11-22 18:08:18', '2019-11-22 18:08:18'),
(11, 'الإعلام الديني', 'eyJpdiI6Ik1cLzBnR1dN', 1, 1, '2019-11-22 18:08:30', '2019-11-22 18:08:30'),
(12, 'الدين والقانون', 'eyJpdiI6ImRyanNsakhS', 1, 1, '2019-11-22 18:08:41', '2019-11-22 18:08:41'),
(13, 'التحقيق', 'eyJpdiI6IlBwdHVpSUdU', 1, 1, '2019-11-22 18:08:53', '2019-11-22 18:08:53'),
(17, 'حوارات', 'mJ1RmRJNWFOUjVKcUorV', 1, 1, '2019-11-22 20:35:26', '2019-11-22 20:35:26'),
(18, 'حلق علمية', 'k1oTEJwdVpxSUFGZ1wvN', 1, 1, '2019-11-22 20:36:08', '2019-11-22 20:36:08');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_droit_acces`
--

CREATE TABLE `categorie_droit_acces` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_evenements`
--

CREATE TABLE `categorie_evenements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_evenements`
--

INSERT INTO `categorie_evenements` (`id`, `nom`, `slug`, `valide`, `publish`, `created_at`, `updated_at`) VALUES
(3, 'ملتقيات ومؤتمرات', 'eyJpdiI6Ink0UGwwcDl6', 1, 1, '2019-11-22 18:10:28', '2019-11-25 22:24:21'),
(4, 'مناقشة أطاريح جامعية', 'eyJpdiI6IlB2RmdweE5z', 1, 1, '2019-11-22 18:10:42', '2019-11-25 22:24:15'),
(5, 'دورات تدريبية', 'eyJpdiI6Ikp4cDFueGZh', 1, 1, '2019-11-22 18:10:52', '2019-11-25 22:24:10');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_evenement_droit_acces`
--

CREATE TABLE `categorie_evenement_droit_acces` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `nom`, `email`, `contenu`, `valide`, `publish`, `article_id`, `created_at`, `updated_at`) VALUES
(1, 'testbbbbb', 'samia@gmail.com', 'the thisng is that i dont like u', 0, 0, 10, '2019-11-27 20:29:07', '2019-11-27 20:29:07'),
(2, 'test', 'test@test.ma', 'qsqssqsqsqs', 0, 0, 10, '2019-11-27 20:29:43', '2019-11-27 20:29:43'),
(3, 'test 12', 'test@test.ma', '12321654', 0, 0, 10, '2019-11-27 20:30:09', '2019-11-27 20:30:09'),
(4, 'testbbbbb', 'saidhaiba@gmail.com', 'kjlkjlkj', 0, 0, 10, '2019-11-28 22:24:42', '2019-11-28 22:24:42');

-- --------------------------------------------------------

--
-- Structure de la table `editions`
--

CREATE TABLE `editions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_publication` datetime DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `editions`
--

INSERT INTO `editions` (`id`, `titre`, `description`, `auteur`, `date_publication`, `image`, `slug`, `valide`, `publish`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', '<p>وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض</p>', 'وريم ايبسوم', '2019-11-23 00:00:00', 'yJpdiI6ImxKeStiSktGbXl4STl0MmxJR0NIbWc9PSIsInZhbHV.jpg', 'llVemJ3emRRdW5DejFsQ', 1, 1, 1, '2019-11-23 14:57:04', '2019-11-24 16:20:33'),
(3, 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', '<p>وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض&nbsp;</p>', 'وريم ايبسوم', '2019-11-23 00:00:00', 'yJpdiI6ImhvcHNXNEZ2WWl3NzVqbkhnR1RDd2c9PSIsInZhbHV.jpg', 'jdlNmNjQUcza2FBZDIzM', 0, 0, 1, '2019-11-23 15:13:14', '2019-11-23 15:13:14');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intervenant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `titre`, `contenu`, `date`, `image`, `slug`, `intervenant`, `lieu`, `adresse`, `site`, `user_id`, `categorie_id`, `valide`, `publish`, `created_at`, `updated_at`) VALUES
(3, 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', '<p dir=\"rtl\">وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض</p>', '2019-11-22 12:00:00', 'yJpdiI6ImtHSHdCM3NwZnZhZENEWEVFaVQ3d2c9PSIsInZhbHV.jpg', 'eyJpdiI6IiswM0sxZ3g4anh3e', 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', NULL, NULL, 1, 3, 1, 1, '2019-11-22 18:58:13', '2019-11-24 17:09:43'),
(4, 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض', '<p>وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرضوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض</p>', '2019-11-23 10:00:00', 'yJpdiI6IkJhbDYzblFaUFgrVU5yaEtJTFVWekE9PSIsInZhbHV.jpg', 'mpDZlloQVI0QjZUNWUrV', 'التصاميم لتعرض', 'وريم ايبسوم ه', NULL, NULL, 1, 3, 1, 1, '2019-11-22 23:18:58', '2019-11-28 21:42:09'),
(5, 'يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف', '<h3 dir=\"rtl\">يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;يوم دراسيّ بعنوان قيم الاعتدال والتسامح في مواجهة التطرّف&nbsp;</h3>', '2019-11-23 12:00:00', 'yJpdiI6ImVTbzZhR24wcmErOGY0RGxcLzRzXC90dz09IiwidmF.jpg', 'jJIbjROU1dRZ2VscEFDd', 'يوم دراسيّ', 'الرباط', NULL, NULL, 1, 3, 0, 0, '2019-11-22 23:33:25', '2019-11-25 22:05:30'),
(6, 'الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف', '<h3 dir=\"rtl\">&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;&nbsp;الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف&nbsp;</h3>', '2019-11-15 10:00:00', 'yJpdiI6IlwveGlGUDYwcTRkSVkyVUFmUFdxdUlBPT0iLCJ2YWx.jpg', 'mdSU2pZSExWZ2dmYXFNU', 'الدكتور سعيد شبار يشارك في مائدة مستديرة حول: العلوم الإنسانية وقضايا الإرهاب والتطرف', 'الرباط', NULL, NULL, 1, 3, 0, 0, '2019-11-22 23:34:58', '2019-11-23 15:20:15'),
(7, 'أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر', '<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a>&nbsp;</h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3><a href=\"http://www.lomaa-test.ma/events-detail.html\">أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر</a></h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>', '2019-11-23 08:00:00', 'yJpdiI6IncrRFdtZHhTZUpiVE1BY1FQVWNoRUE9PSIsInZhbHV.jpg', 'nBBR2xkeGZFcnB6emxSY', 'أساتذة بالرباط يناقشون المذهب الأشعري وقضايا العصر', 'الرباط', NULL, NULL, 1, 3, 0, 0, '2019-11-22 23:36:39', '2019-11-22 23:36:39');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `nom`, `valide`, `publish`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'حلق علمية', 1, 1, 'yJpdiI6InNKZDJxUDVMRXlLcXF3dWVLMmN4ZWc9PSIsInZhbHV.jpg', 1, '2019-11-23 19:34:18', '2019-11-26 22:04:30'),
(2, 'الدراسات الصوفية', 1, 1, 'yJpdiI6ImNcL3JITCtqbXJ5TlhiNnJndFord3BBPT0iLCJ2YWx.jpg', 1, '2019-11-23 19:34:32', '2019-11-26 22:05:03'),
(4, 'علم الاجتماع الديني', 1, 1, 'yJpdiI6IjNhZVVwQzRmR2ljNU9VUWkyXC9MQUJnPT0iLCJ2YWx.jpg', 2, '2019-11-25 02:05:42', '2019-11-26 22:05:53');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_16_183828_create_categories_table', 1),
(5, '2019_10_16_211025_create_articles_table', 1),
(6, '2019_11_16_225952_create_commentaires_table', 1),
(7, '2019_11_19_223826_create_categorie_droit_acces_table', 1),
(8, '2019_11_20_183805_create_user_article_notification', 1),
(9, '2019_11_21_180227_create_categorie_evenements_table', 1),
(10, '2019_11_21_181348_create_evenements_table', 1),
(11, '2019_11_21_190747_create_user_evenement_notification', 1),
(12, '2019_11_21_191335_create_categorie_evenement_droit_acces_table', 1),
(13, '2019_11_21_212723_create_sliders_table', 1),
(14, '2019_11_23_154438_create_editions_table', 1),
(15, '2019_11_23_181735_create_videos_table', 1),
(16, '2019_11_23_201730_create_images_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ordre` int(11) NOT NULL,
  `sliderable_id` bigint(20) UNSIGNED NOT NULL,
  `sliderable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sliders`
--

INSERT INTO `sliders` (`id`, `ordre`, `sliderable_id`, `sliderable_type`, `created_at`, `updated_at`) VALUES
(13, 1, 10, 'App\\Article', '2019-11-28 21:57:13', '2019-11-28 21:57:13'),
(14, 2, 4, 'App\\Evenement', '2019-11-28 21:58:08', '2019-11-28 21:58:08');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `edition` tinyint(1) NOT NULL,
  `image` tinyint(1) NOT NULL,
  `video` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `statut`, `edition`, `image`, `video`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'said haiba', 'saidhaiba@gmail.com', NULL, '$2y$10$QTB9csOuA1.aNIm94CEzpeEHrMuKVSPTvDrkahzdxA7YzIbUwYtdi', 1, 1, 0, 0, 0, NULL, NULL, NULL),
(2, 'user user', 'user@user.com', NULL, '$2y$10$QTB9csOuA1.aNIm94CEzpeEHrMuKVSPTvDrkahzdxA7YzIbUwYtdi', 2, 1, 0, 1, 0, NULL, NULL, '2019-11-27 19:35:41');

-- --------------------------------------------------------

--
-- Structure de la table `user_article_notification`
--

CREATE TABLE `user_article_notification` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_evenement_notification`
--

CREATE TABLE `user_evenement_notification` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `evenement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_youtube` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `titre`, `description`, `code_youtube`, `image`, `slug`, `valide`, `publish`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'من هم العلويون؟', 'العلويون طائفة دينية تأسست منذ مئات السنين، لكن الغموض يخيم على معتقداتها. ماذا تعرفون عنها؟', '123456789', 'yJpdiI6Im1DZ1RZdjFCRmx2V1U2QnNkOG40clE9PSIsInZhbHV.jpg', 'kEwWGdBOFhYMzJLeU8we', 1, 1, 1, '2019-11-23 18:10:05', '2019-11-25 17:44:57');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_categorie_id_foreign` (`categorie_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_droit_acces`
--
ALTER TABLE `categorie_droit_acces`
  ADD PRIMARY KEY (`user_id`,`categorie_id`),
  ADD KEY `categorie_droit_acces_categorie_id_foreign` (`categorie_id`);

--
-- Index pour la table `categorie_evenements`
--
ALTER TABLE `categorie_evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_evenement_droit_acces`
--
ALTER TABLE `categorie_evenement_droit_acces`
  ADD PRIMARY KEY (`user_id`,`categorie_id`),
  ADD KEY `categorie_evenement_droit_acces_categorie_id_foreign` (`categorie_id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_article_id_foreign` (`article_id`);

--
-- Index pour la table `editions`
--
ALTER TABLE `editions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editions_user_id_foreign` (`user_id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evenements_user_id_foreign` (`user_id`),
  ADD KEY `evenements_categorie_evenement_id_foreign` (`categorie_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `user_article_notification`
--
ALTER TABLE `user_article_notification`
  ADD PRIMARY KEY (`user_id`,`article_id`),
  ADD KEY `user_article_notification_article_id_foreign` (`article_id`);

--
-- Index pour la table `user_evenement_notification`
--
ALTER TABLE `user_evenement_notification`
  ADD PRIMARY KEY (`user_id`,`evenement_id`),
  ADD KEY `user_evenement_notification_evenement_id_foreign` (`evenement_id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `categorie_evenements`
--
ALTER TABLE `categorie_evenements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `editions`
--
ALTER TABLE `editions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `categorie_droit_acces`
--
ALTER TABLE `categorie_droit_acces`
  ADD CONSTRAINT `categorie_droit_acces_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorie_droit_acces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `categorie_evenement_droit_acces`
--
ALTER TABLE `categorie_evenement_droit_acces`
  ADD CONSTRAINT `categorie_evenement_droit_acces_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categorie_evenements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorie_evenement_droit_acces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `editions`
--
ALTER TABLE `editions`
  ADD CONSTRAINT `editions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `evenements_categorie_evenement_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categorie_evenements` (`id`),
  ADD CONSTRAINT `evenements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `user_article_notification`
--
ALTER TABLE `user_article_notification`
  ADD CONSTRAINT `user_article_notification_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_article_notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_evenement_notification`
--
ALTER TABLE `user_evenement_notification`
  ADD CONSTRAINT `user_evenement_notification_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_evenement_notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
