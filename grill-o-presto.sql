-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 05:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grill-o-presto`
--
CREATE DATABASE IF NOT EXISTS `grill-o-presto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `grill-o-presto`;

-- --------------------------------------------------------

--
-- Table structure for table `allergens`
--

CREATE TABLE `allergens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allergen_meals`
--

CREATE TABLE `allergen_meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `allergen_id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_prices`
--

CREATE TABLE `chart_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portion_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
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
-- Table structure for table `history_meals`
--

CREATE TABLE `history_meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`ingredients`)),
  `vegetarian` tinyint(1) NOT NULL DEFAULT 0,
  `gluten_free` tinyint(1) NOT NULL DEFAULT 0,
  `spicy` int(11) NOT NULL DEFAULT 0,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_on_home_page` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_meals`
--

INSERT INTO `history_meals` (`id`, `name`, `ingredients`, `vegetarian`, `gluten_free`, `spicy`, `menu_id`, `image_path`, `is_on_home_page`, `created_at`, `updated_at`) VALUES
(5, 'Possimus ab consequatur explicabo aut.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 570, 2, 'Consequatur quia occaecati culpa qui quia.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(6, 'Saepe molestiae saepe voluptatum ea.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 91, 2, 'Aliquid libero voluptates nemo et repellendus nihil ex.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(7, 'Reiciendis excepturi alias sed qui.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 2518116, 2, 'Cupiditate autem autem voluptates dicta et unde.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(8, 'Non delectus similique provident.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 2101, 3, 'Et vero consequatur tempora aperiam rerum.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(9, 'Architecto et maiores illo est.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 11892, 3, 'Porro sapiente quod aliquid nulla quam.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(10, 'Quae qui tempore ea eum est tenetur et.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 60616, 1, 'Nihil nam et nostrum omnis debitis molestiae et laudantium.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(11, 'Impedit eaque in tempora sunt illo dolor nihil nostrum.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 688, 2, 'Fugit est dolore id a ut esse fugit.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(12, 'Rerum voluptates nesciunt sit quis ea amet.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 5220980, 2, 'Eaque placeat facere assumenda blanditiis.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(13, 'In quae dolorem aut eos.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 6043, 3, 'Enim unde necessitatibus ut adipisci quo repellendus.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(14, 'Odit consectetur voluptatem qui autem.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 2, 3, 'Nostrum in perspiciatis aut repellat repellat eos consequatur.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(15, 'Est aut non ut aut.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 809850797, 2, 'Earum qui aspernatur rerum cupiditate.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(16, 'Praesentium vel eaque consequatur inventore omnis incidunt dolorem et.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 9448, 1, 'Fugiat sed quisquam mollitia aliquid sed modi non.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(17, 'Consequatur tenetur neque porro rem sed delectus est.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 7078461, 3, 'Est consequatur laboriosam rerum aut et velit.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(18, 'Dolor laborum qui id labore voluptatum perferendis ut sequi.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 5428, 1, 'Laborum omnis sunt earum ut iste recusandae.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(19, 'Earum inventore rerum eum explicabo doloribus minima saepe.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 0, 2, 'Sed dolores reiciendis accusantium pariatur aliquam voluptatibus molestiae esse.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(20, 'Voluptatem aut et fugit delectus voluptatum tenetur voluptate quia.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 216626756, 2, 'Sapiente quas repellat in quis veniam.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(21, 'Amet magni totam aut eos ex illum.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 7189388, 2, 'Ut in pariatur asperiores nulla accusamus recusandae.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(22, 'Non vel et ipsam sed.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 370, 1, 'Itaque et repellat libero qui voluptatum.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(23, 'Et minus temporibus eos maiores sint accusantium.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 8179398, 3, 'Quia sunt quod itaque praesentium rem dignissimos et.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(24, 'Ab eius eligendi sunt accusantium.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 5, 1, 'Doloribus excepturi deserunt ipsum assumenda natus quae autem.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(25, 'Nemo aut omnis est iusto necessitatibus.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 82013006, 3, 'Ut sit natus voluptates aliquam aut cumque.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(26, 'Quo perferendis nulla laudantium esse.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 670512335, 3, 'Modi ipsam beatae eum earum cupiditate.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(27, 'Aspernatur porro numquam et.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 4, 1, 'Qui nostrum commodi voluptatibus nostrum consectetur.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(28, 'Amet et id consequuntur ipsa corporis exercitationem corrupti.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 3460, 3, 'Assumenda soluta ea ex ex.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(29, 'Fugit omnis eveniet dolorem.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 3, 3, 'Rem voluptas reiciendis esse ut cum doloribus vel.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(30, 'Non in et voluptatem at sequi ea nobis.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 3971, 2, 'Facilis eum autem aut hic sed.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(31, 'Voluptas minima iusto qui occaecati doloremque vel.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 856, 3, 'Aliquid sit maiores aperiam doloremque molestiae facere.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(32, 'Voluptas et fugiat qui quis.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 62666, 2, 'Culpa architecto et aut dolorem quis dolorum.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(33, 'Aut ut eum iure est repellendus quo accusamus.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 67543667, 2, 'Laborum explicabo velit enim enim in.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(34, 'Sit maxime aut consequatur repellat enim suscipit.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 1, 1, 'Molestiae recusandae eius pariatur expedita et.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(35, 'Sit blanditiis praesentium quasi eligendi quia voluptate laudantium aperiam.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 52, 1, 'Doloremque fugiat voluptas consequatur dignissimos nesciunt recusandae.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(36, 'Natus asperiores occaecati ratione labore officiis quidem.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 21065640, 1, 'Doloremque voluptatem consequatur autem aliquam.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(37, 'Ratione est dolorem delectus.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 620, 1, 'Provident velit non et voluptatem iure et dolorem.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(38, 'Eveniet omnis iure sed eum consequuntur accusamus quas.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 39739484, 1, 'Temporibus vel labore aliquid nihil dicta.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(39, 'Expedita vitae dolorem nihil fugit.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 6, 1, 'Rerum eveniet facilis autem atque.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(40, 'Non incidunt animi reprehenderit autem.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 85483165, 1, 'Alias eum doloribus qui voluptatem sint error.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(41, 'Molestias cupiditate et corporis et molestias vel animi.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 3, 1, 'Et dolor et officia porro tenetur ad sed ullam.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(42, 'Quis fugiat quo corrupti.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 564420, 1, 'Quas sunt sit ut consectetur officia veritatis eos accusamus.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(43, 'Ducimus autem aut consequuntur non impedit.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 868, 1, 'Ipsam aliquam sint rem dolorem totam optio sint.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(44, 'Est sed autem voluptas illo autem iusto asperiores.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 14, 1, 'Eaque vitae minus eaque enim quod velit.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(45, 'Voluptas maxime ex nemo ipsa sit vitae nisi.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 58883810, 1, 'Perferendis omnis at voluptates possimus quisquam sint nostrum.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(46, 'Repellendus laudantium explicabo nulla voluptas veritatis assumenda iste.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 40018053, 1, 'Illum ducimus qui sit ut excepturi.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(47, 'Error occaecati est eum quas aut.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 9, 1, 'Magni harum perspiciatis ab recusandae sed dolorum dicta aliquid.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(48, 'Consequatur consequuntur officia eaque earum doloremque quas est.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 18, 1, 'Recusandae consequatur quaerat dicta nihil quae veritatis dolor.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(49, 'Accusamus sint dicta est ea laudantium autem qui molestiae.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 96, 1, 'Inventore quidem accusantium rerum repellendus labore.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(50, 'Voluptatum eum consectetur saepe.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 326, 1, 'Aliquam omnis aliquid vero eum reprehenderit et.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(51, 'Modi quo et consequatur.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 488377460, 1, 'Ipsum est voluptas quo inventore dolor repellat facilis.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(52, 'Saepe eum natus molestiae.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 18080088, 1, 'Iste quia iure minus et ipsa.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(53, 'Minima suscipit laborum aliquam minus et quam et sed.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 268866117, 1, 'Et corrupti consequatur praesentium.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(54, 'Repellendus est delectus esse omnis eum.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 18871, 1, 'Et et consequatur qui rerum cupiditate.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(55, 'Optio autem quasi porro hic est laudantium.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 4369172, 1, 'Soluta ducimus incidunt quas.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(56, 'Et ut vero in.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 1779, 1, 'Natus a quo rem amet.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(57, 'Repudiandae aut dignissimos dignissimos sed nulla.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 214518, 1, 'Quis sed corrupti facilis natus sapiente modi.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(58, 'Doloremque unde consequatur ut nam at.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 0, 651, 1, 'Fuga atque repellendus provident maiores reprehenderit porro est.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(59, 'Eligendi non voluptatem non culpa aut optio natus.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 1881895, 1, 'Consequatur ut est ea.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(60, 'Veniam veritatis sapiente cumque non expedita.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 4, 1, 'Voluptatem ut at expedita deleniti rerum aperiam ipsam.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(61, 'Ea earum praesentium voluptatem rem optio.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 0, 57950, 1, 'Consectetur repudiandae sunt unde nemo.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(62, 'Praesentium laboriosam aut labore dolor provident dolor placeat.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 79, 1, 'Repellendus maiores laboriosam odit eum dicta.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(63, 'Libero aspernatur aut eum odit.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 0, 1, 7, 1, 'Velit itaque quia aut et eveniet.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14'),
(64, 'Error ducimus alias atque assumenda quidem sint.', '[\"Veniam architecto non eum dolores quia.\",\"Ut eum qui repudiandae praesentium repellendus.\",\"Ut accusamus numquam consequatur nostrum illo.\",\"Quia odio consequuntur aspernatur officia.\",\"Inventore esse delectus soluta animi.\"]', 1, 1, 451903291, 1, 'Error sunt ratione excepturi aut voluptate facere adipisci.', 0, '2022-09-03 04:50:14', '2022-09-03 04:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `info_users`
--

CREATE TABLE `info_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_porte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_users`
--

INSERT INTO `info_users` (`id`, `prenom`, `nom`, `telephone`, `rue`, `no_porte`, `code_postal`, `ville`, `created_at`, `updated_at`) VALUES
(28, 'qqqq', 'qqqq', 'qqq', 'qqq', 'qqq', 'qqq', 'qqq', '2022-09-03 09:40:24', '2022-09-03 09:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ingredients`)),
  `vegetarian` tinyint(1) NOT NULL DEFAULT 0,
  `gluten_free` tinyint(1) NOT NULL DEFAULT 0,
  `spicy` int(11) NOT NULL DEFAULT 0,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_type_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_type_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-09-02', '2022-09-09', '2022-09-03 00:50:10', '2022-09-03 00:50:10'),
(2, 1, '2022-08-13', '2022-08-20', '2022-09-03 00:50:10', '2022-09-03 00:50:10'),
(3, 2, '2022-09-02', '2022-09-09', '2022-09-03 00:50:10', '2022-09-03 00:50:10'),
(4, 2, '2022-08-13', '2022-08-20', '2022-09-03 00:50:10', '2022-09-03 00:50:10'),
(5, 3, '2022-09-02', '2022-09-09', '2022-09-03 00:50:10', '2022-09-03 00:50:10'),
(6, 3, '2022-08-13', '2022-08-20', '2022-09-03 00:50:10', '2022-09-03 00:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Classique', '2022-09-03 04:49:01', '2022-09-03 04:49:01'),
(2, 'Végétarien', '2022-09-03 04:49:01', '2022-09-03 04:49:01'),
(3, 'Sans Gluten', '2022-09-03 04:49:01', '2022-09-03 04:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `response` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_24_200000_create_menu_types_table', 1),
(6, '2022_08_24_231441_create_menus_table', 1),
(7, '2022_08_24_231558_create_meals_table', 1),
(8, '2022_08_24_231952_create_history_meals_table', 1),
(9, '2022_08_24_232158_create_portions_table', 1),
(10, '2022_08_24_232246_create_chart_prices_table', 1),
(11, '2022_08_24_232334_create_allergen_meals_table', 1),
(12, '2022_08_24_232434_create_allergens_table', 1),
(13, '2022_08_01_231418_create_ticket_types_table', 2),
(14, '2022_09_01_230926_create_tickets_table', 2),
(15, '2022_09_02_230031_create_messages_table', 2),
(16, '2013_08_25_001321_create_infos_users', 3),
(17, '2013_08_25_001649_create_roles_table', 3),
(18, '2014_10_13_000000_create_users_table', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portions`
--

CREATE TABLE `portions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Client', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_type_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_types`
--

CREATE TABLE `ticket_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_types`
--

INSERT INTO `ticket_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Livraison', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_verified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `info_user_id`, `email`, `email_verified_at`, `password`, `password_verified_at`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 28, 'user@user.com', '2022-09-03 02:40:24', '$2y$10$Yh1RLSgDA10JFXJaZaOLX.HMAOfAXoGV7eId9hMM2rz3GPGVXaJg6', NULL, 1, NULL, '2022-09-03 09:40:24', '2022-09-03 09:40:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergens`
--
ALTER TABLE `allergens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allergen_meals`
--
ALTER TABLE `allergen_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_prices`
--
ALTER TABLE `chart_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chart_prices_portion_id_foreign` (`portion_id`),
  ADD KEY `chart_prices_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_meals`
--
ALTER TABLE `history_meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_meals_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `info_users`
--
ALTER TABLE `info_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_menu_type_id_foreign` (`menu_type_id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portions`
--
ALTER TABLE `portions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_ticket_type_id_foreign` (`ticket_type_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_types`
--
ALTER TABLE `ticket_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_info_user_id_foreign` (`info_user_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergens`
--
ALTER TABLE `allergens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allergen_meals`
--
ALTER TABLE `allergen_meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chart_prices`
--
ALTER TABLE `chart_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_meals`
--
ALTER TABLE `history_meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `info_users`
--
ALTER TABLE `info_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portions`
--
ALTER TABLE `portions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_types`
--
ALTER TABLE `ticket_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chart_prices`
--
ALTER TABLE `chart_prices`
  ADD CONSTRAINT `chart_prices_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `chart_prices_portion_id_foreign` FOREIGN KEY (`portion_id`) REFERENCES `portions` (`id`);

--
-- Constraints for table `history_meals`
--
ALTER TABLE `history_meals`
  ADD CONSTRAINT `history_meals_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_menu_type_id_foreign` FOREIGN KEY (`menu_type_id`) REFERENCES `menu_types` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ticket_type_id_foreign` FOREIGN KEY (`ticket_type_id`) REFERENCES `ticket_types` (`id`),
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_info_user_id_foreign` FOREIGN KEY (`info_user_id`) REFERENCES `info_users` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
