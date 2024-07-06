/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `bacola_food` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bacola_food`;

CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_cost` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `banners` (`id`, `img_url`, `status`, `title`, `title_1`, `title_2`, `sub_title`, `from_cost`, `created_at`, `updated_at`) VALUES
	(1, 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/banner-box.jpg', 1, 'Best Bakery Products', 'Freshest Products', 'Roats Burger', 'only-from', 1200000, '2023-06-08 08:34:04', '2023-06-08 08:34:04'),
	(3, 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/bacola-banner-04.jpg', 1, 'Bacola Natural Foods', 'Special Organic', 'Roats Burger', 'only-from', 2200000, '2023-06-08 08:45:12', '2023-06-08 08:45:12');

CREATE TABLE IF NOT EXISTS `billing_addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vn',
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `default_address` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `billing_addresses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `billing_addresses` (`id`, `user_id`, `first_name`, `last_name`, `company`, `country_code`, `street_address`, `town_city`, `zip_code`, `phone`, `email`, `created_at`, `updated_at`, `default_address`) VALUES
	(1, 12, 'default 123', 'Bền', NULL, 'vn', 'An Bình', 'Long Xuyen', '880000', '0772841374', 'nben19732@gmail.com', '2023-06-14 09:24:34', '2023-06-23 10:16:57', 1),
	(2, 12, 'ship', 'Bền', NULL, 'vn', 'An Bình', 'Long Xuyen', '880000', '0772841374', 'nben19732@gmail.com', '2023-06-14 09:24:34', '2023-06-23 10:04:33', 0);

CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `ship_cost` int DEFAULT '20000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carts` (`id`, `user_id`, `ship_cost`, `created_at`, `updated_at`) VALUES
	(2, 13, 20000, '2023-06-12 15:51:43', '2023-06-12 15:51:43');

CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_product_id_foreign` (`product_id`),
  KEY `cart_items_cart_id_foreign` (`cart_id`),
  CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
	(2, 2, 3, 2, '2023-06-12 15:51:55', '2023-06-12 15:51:56');

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `title`, `img_url`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'FRUITS & VEGETABLE', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/05/fruitvegetables-1.jpg', 'fruits-vegetables', '2023-06-07 08:12:17', '2023-06-07 09:49:54'),
	(2, 'MEATS & SEAFOOD', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/05/meat-1.jpg', 'meats-seafood', '2023-06-07 08:13:09', '2023-06-07 08:13:09'),
	(3, 'BREAKFAST & DAIRY', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/05/dairy-1.jpg', 'breakfast-dairy', '2023-06-07 08:13:28', '2023-06-07 08:13:28'),
	(4, 'BEVERAGES', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-346x310.jpg', 'beverages', '2023-06-07 08:13:44', '2023-06-07 08:13:44'),
	(5, 'BREADS & BAKERY', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/05/breadbakery-1.jpg', 'breads-bakery', '2023-06-07 08:13:57', '2023-06-07 08:13:57'),
	(6, 'FROZEN FOODS', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/category-image4.png', 'frozen-foods', '2023-06-07 08:14:12', '2023-06-07 08:14:12'),
	(7, 'BISCUITS & SNACKS', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/05/biscuitssnacks-1.jpg', 'biscuits-snacks', '2023-06-07 08:14:26', '2023-06-07 08:14:26'),
	(8, 'GROCERY & STAPLES', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/category-image2.png', 'grocery-staples', '2023-06-07 08:14:42', '2023-06-07 08:14:42');

CREATE TABLE IF NOT EXISTS `configs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logo_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_notice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counpon_first_purchase` bigint unsigned NOT NULL,
  `df_benefit1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `df_benefit2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `df_benefit3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_freeship` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `configs_counpon_first_purchase_foreign` (`counpon_first_purchase`),
  CONSTRAINT `configs_counpon_first_purchase_foreign` FOREIGN KEY (`counpon_first_purchase`) REFERENCES `counpons` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `configs` (`id`, `logo_url`, `us_phone`, `store_notice`, `counpon_first_purchase`, `df_benefit1`, `df_benefit2`, `df_benefit3`, `get_freeship`, `created_at`, `updated_at`) VALUES
	(1, 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/bacola-logo.png', '0772856742', 'Due to the COVID 19 epidemic, orders may be processed with a slight delay', 1, 'Free Shipping apply to all orders over $100', 'Guranteed 100% Organic from natural farmas', '1 Day Returns if you change your mind', 10000000, NULL, NULL);

CREATE TABLE IF NOT EXISTS `counpons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int NOT NULL DEFAULT '0',
  `remain` int DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `start_day` datetime NOT NULL,
  `end_day` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `counpons` (`id`, `code`, `rate`, `remain`, `status`, `start_day`, `end_day`, `created_at`, `updated_at`) VALUES
	(1, 'abcd', 13, 10, 1, '2023-09-09 00:00:00', '2023-07-09 00:00:00', '2023-06-08 09:13:07', '2023-06-08 09:14:12'),
	(3, '1234', 10, 10, 1, '2023-06-16 21:25:31', '2023-06-21 21:25:32', '2023-06-16 14:25:36', '2023-06-16 14:25:37');

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `hot_product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `remain` int NOT NULL,
  `start_day` date NOT NULL,
  `end_day` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hot_product_products` (`product_id`),
  CONSTRAINT `FK_hot_product_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `hot_product` (`id`, `product_id`, `remain`, `start_day`, `end_day`, `created_at`, `updated_at`) VALUES
	(1, 1, 10, '2023-06-09', '2023-07-16', NULL, NULL);

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_06_06_152544_create_products_table', 1),
	(6, '2023_06_06_154139_create_categories_table', 1),
	(7, '2023_06_06_154256_create_sub_categories_table', 1),
	(8, '2023_06_06_155123_create_product_categories_table', 1),
	(9, '2023_06_06_160655_create_billing_addresses_second_table', 1),
	(10, '2023_06_06_161049_add_multiple_column_in_users_table', 1),
	(11, '2023_06_06_161829_create_product_reviews_table', 1),
	(12, '2023_06_06_162107_create_carts_table', 1),
	(13, '2023_06_06_162816_create_cart_items_table', 1),
	(14, '2023_06_06_163433_create_counpons_table', 1),
	(15, '2023_06_06_163555_create_orders_table', 1),
	(16, '2023_06_06_163928_create_order_items_table', 1),
	(17, '2023_06_06_182500_create_configs_table', 1),
	(18, '2023_06_06_182841_create_sliders_table', 1),
	(19, '2023_06_06_183033_create_banners_table', 1),
	(20, '2023_06_06_183208_create_solds_table', 1),
	(21, '2023_06_09_145751_create_hot_product_table', 1),
	(22, '2023_06_10_094729_create_weekend_discounts_table', 2),
	(23, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
	(24, '2023_06_11_060212_create_sessions_table', 3),
	(25, '2023_06_19_162932_create_product_wish_lists_table', 4),
	(26, '2023_06_23_112733_add_default_address_column_in_billing_addresses_table', 5),
	(27, '2023_06_24_160528_create_payments_table', 6);

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `shipping_cost` int NOT NULL DEFAULT '0',
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `order_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_id` bigint unsigned DEFAULT NULL,
  `counpon_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_billing_address_id_foreign` (`billing_address_id`),
  KEY `orders_counpon_id_foreign` (`counpon_id`),
  CONSTRAINT `orders_billing_address_id_foreign` FOREIGN KEY (`billing_address_id`) REFERENCES `billing_addresses` (`id`),
  CONSTRAINT `orders_counpon_id_foreign` FOREIGN KEY (`counpon_id`) REFERENCES `counpons` (`id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `user_id`, `shipping_cost`, `payment_method`, `status`, `order_notes`, `billing_address_id`, `counpon_id`, `created_at`, `updated_at`, `total_price`) VALUES
	(14, 12, 0, 'banking', 1, NULL, NULL, NULL, '2023-06-26 16:37:17', '2023-06-26 16:37:17', 12000000),
	(15, 12, 20000, 'banking', 1, NULL, NULL, NULL, '2023-06-26 17:18:29', '2023-06-26 17:18:29', 6320000),
	(16, 12, 0, 'banking', 1, NULL, NULL, NULL, '2023-07-12 11:54:20', '2023-07-12 11:54:20', 14500000),
	(17, 12, 0, 'banking', 1, NULL, NULL, NULL, '2023-07-12 11:56:35', '2023-07-12 11:56:35', 20500000);

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_total` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `created_at`, `updated_at`, `sub_total`) VALUES
	(9, 14, 7, 1, '2023-06-26 16:37:17', '2023-06-26 16:37:17', 6000000),
	(10, 14, 8, 1, '2023-06-26 16:37:17', '2023-06-26 16:37:17', 2000000),
	(11, 15, 14, 1, '2023-06-26 17:18:29', '2023-06-26 17:18:29', 2000000),
	(12, 15, 16, 1, '2023-06-26 17:18:29', '2023-06-26 17:18:29', 6000000),
	(13, 16, 7, 1, '2023-07-12 11:54:20', '2023-07-12 11:54:20', NULL),
	(14, 16, 8, 1, '2023-07-12 11:54:20', '2023-07-12 11:54:20', NULL),
	(15, 17, 7, 1, '2023-07-12 11:56:35', '2023-07-12 11:56:35', NULL),
	(16, 17, 8, 1, '2023-07-12 11:56:35', '2023-07-12 11:56:35', NULL),
	(17, 17, 10, 1, '2023-07-12 11:56:35', '2023-07-12 11:56:35', NULL);

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `amount` int NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vnpay_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`),
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `payments` (`id`, `order_code`, `order_id`, `amount`, `content`, `vnpay_code`, `bank_code`, `result`, `created_at`, `updated_at`) VALUES
	(1, '6791', 14, 1200000000, 'Thanh toan GD:6791', '14049967', 'NCB', 1, '2023-06-26 16:40:15', '2023-06-26 16:40:15'),
	(2, '907', 15, 632000000, 'Thanh toan GD:907', '14049975', 'NCB', 1, '2023-06-26 17:18:29', '2023-06-26 17:18:29'),
	(3, '6331', 16, 1450000000, 'Thanh toan GD:6331', '0', 'VNPAY', 0, '2023-07-12 11:54:20', '2023-07-12 11:54:20'),
	(4, '1408', 17, 2050000000, 'Thanh toan GD:1408', '14065208', 'NCB', 1, '2023-07-12 11:56:35', '2023-07-12 11:56:35');

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mfg` date NOT NULL,
  `life` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL DEFAULT '0',
  `old_price` int DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `qty` smallint NOT NULL DEFAULT '1',
  `best_seller` tinyint(1) NOT NULL DEFAULT '0',
  `hot_product` tinyint(1) NOT NULL DEFAULT '0',
  `trending_product` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `title`, `brand`, `type`, `mfg`, `life`, `slug`, `summary`, `description`, `sku`, `price`, `old_price`, `discount`, `qty`, `best_seller`, `hot_product`, `trending_product`, `created_at`, `updated_at`, `img_url`) VALUES
	(1, 'All Natural Italian-Style Chicken Meatballs', 'Non.1', 'Organic', '2023-06-06', '30 days', 'all-natural-italian-style-chicken-meatballs', 'Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent', 'Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Aenean vel diam ut arcu pharetra dignissim ut sed leo. Vivamus faucibus, ipsum in vestibulum vulputate, lorem orci convallis quam, sit amet consequat nulla felis pharetra lacus. Duis semper erat mauris, sed egestas purus commodo vel.', 'ZU49VOR', 1200000, 700000, 2.50, 100, 0, 0, 1, '2023-06-07 05:12:41', '2023-06-07 05:12:41', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-62-768x691.jpg'),
	(2, 'Wheat Thins Original Crackers', 'Frito Lay, Oreo, Welch\'s', 'Organic', '2023-06-06', '20 days', 'wheat-thins-original-crackers', 'Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent', 'Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Aenean vel diam ut arcu pharetra dignissim ut sed leo. Vivamus faucibus, ipsum in vestibulum vulputate, lorem orci convallis quam, sit amet consequat nulla felis pharetra lacus. Duis semper erat mauris, sed egestas purus commodo vel.', 'ZU49VOR', 3200000, 700000, 25.00, 50, 0, 0, 1, '2023-06-07 06:16:25', '2023-06-07 06:16:25', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-2-768x691.jpg'),
	(3, 'Angie’s Boomchickapop Sweet & Salty Kettle Corn', 'Non.1', 'Organic', '2023-06-06', '20 days', 'angies-boomchickapop-sweet-salty-kettle-corn', 'Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent', 'Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Aenean vel diam ut arcu pharetra dignissim ut sed leo. Vivamus faucibus, ipsum in vestibulum vulputate, lorem orci convallis quam, sit amet consequat nulla felis pharetra lacus. Duis semper erat mauris, sed egestas purus commodo vel.', NULL, 5200000, 700000, 35.00, 10, 0, 0, 1, '2023-06-07 06:18:16', '2023-06-07 06:18:16', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-60-768x691.jpg'),
	(5, 'Amet.', 'Ex.1', 'Sit.', '1976-03-25', 'Qui.', 'Nemo.1', 'Dolor possimus enim non voluptatem. Doloremque cupiditate quia et.', 'Sed quos est consequuntur deleniti sint. Sed ut alias sunt rerum aut.', 'Est.', 7000000, 700000, 58.00, 69, 0, 0, 1, '2023-06-07 06:42:13', '2023-06-07 06:42:13', 'https://salt.tikicdn.com/cache/280x280/ts/product/f2/d1/87/a7bcd5bfcc12fb9ae5a6fbe27e2289a1.png.webp'),
	(6, 'Tempore.', 'Quae.', 'Sit.', '1983-04-05', 'Aut.', 'Ut.', 'Quia omnis culpa quam enim. Beatae expedita sint rem tenetur velit dolor deleniti excepturi.', 'Cupiditate quas omnis ut accusantium consequatur debitis at. Eaque voluptas sunt quod quae.', 'Sunt.', 6000000, 700000, 28.00, 59, 0, 0, 1, '2023-06-07 06:42:13', '2023-06-07 06:42:13', 'https://salt.tikicdn.com/cache/280x280/ts/product/0c/69/c2/8b02d68bf079e29f68f584187a2e91c1.png.webp'),
	(7, 'Dolores.', 'Quae.', 'Qui.', '1980-08-15', 'Quia.', 'Quos.3', 'Eos ipsum tempore occaecati et officiis et aspernatur qui. Ut quod qui itaque in commodi sit.', 'Aut totam sint neque est recusandae eligendi voluptatibus. Ut voluptas accusamus ipsa provident.', 'Non.', 8500000, 700000, 53.00, 19, 1, 0, 0, '2023-06-07 06:42:13', '2022-06-07 06:42:13', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-62-346x310.jpg'),
	(8, 'Quae.', 'Quae.', 'Est.', '2020-11-20', 'Enim.', 'Quis.1', 'Deleniti ipsum velit maiores aut perspiciatis. Omnis tempore reiciendis et.', 'Cupiditate nemo ea porro. Voluptatibus ut asperiores nobis ut.', 'Et.', 6000000, 700000, 76.00, 79, 1, 0, 0, '2023-06-07 06:42:13', '2023-06-07 06:42:13', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-60-346x310.jpg'),
	(9, 'Hic quae.', 'Qui.', 'Et.', '1991-04-20', 'Ea.', 'Eos.1', 'Inventore molestias placeat reiciendis fugit. Ut doloribus rerum ullam odio aut enim.', 'Non est enim veritatis iusto. Esse et sit omnis similique.', 'Odio.', 2000000, 700000, 27.00, 69, 1, 0, 0, '2023-06-07 06:42:13', '2023-06-07 06:42:13', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-46-346x310.jpg'),
	(10, 'Aut quia.', 'Qui.', 'Eum.', '1981-03-29', 'Et.', 'Et.1', 'Vero vero omnis molestiae nam. Possimus sapiente est libero sint enim non magni.', 'Eligendi accusamus quis autem eligendi. Ipsa qui et placeat sit cumque quia.', 'Ea.', 6000000, 700000, 32.00, 16, 1, 0, 0, '2023-06-11 06:42:13', '2023-06-07 06:42:13', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-59-346x310.jpg'),
	(11, 'Esse et.', 'Quae.', 'Et.', '1985-07-02', 'Et.', 'Sit.1', 'Vero cum nemo sapiente quia. Accusamus fugit at placeat molestias. Consectetur et sequi eos.', 'Consequatur excepturi sint repellendus. Eveniet aspernatur molestiae voluptatem nesciunt.', 'Qui.', 6000000, 700000, 68.00, 37, 1, 0, 0, '2023-06-07 06:42:13', '2023-06-07 06:42:13', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-32-346x310.jpg'),
	(12, 'Chobani Complete Vanilla Greek Yogurt', 'Quae.', 'A.', '2007-02-26', 'Eos.', 'Sit.2', 'Cum nemo repudiandae nihil molestiae provident at. Neque ut nihil ad quia.', 'Totam aperiam vel ab. Ullam dolorem et hic et dolorem hic. Est quis aperiam nemo iure.', 'Sint.', 6000000, 700000, 25.00, 53, 0, 1, 0, '2023-06-07 06:42:13', '2023-06-07 06:42:13', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/product-image-50.jpg'),
	(13, 'Deleniti.', 'Ex.1', 'Eius.', '1973-01-30', 'Enim.', 'Nisi.', 'Voluptas neque alias dolor quo qui ducimus. Quis quo voluptas pariatur consequatur.', 'Culpa quis temporibus ipsam et et dicta. Mollitia cupiditate molestias et harum numquam.', 'Et.', 6000000, 700000, 23.00, 45, 0, 0, 0, '2023-06-07 06:42:13', '2023-06-07 06:42:13', 'https://via.placeholder.com/640x480.png/00ee22?text=food+quo'),
	(14, 'Autem in delectus impedit.', 'Sunsilk', 'Sunsilk', '1991-05-11', 'Est.', 'Sint.', 'Unde est quibusdam earum quo qui sunt. Et cupiditate est ut nemo aliquam delectus numquam.', 'Nisi sed et voluptatem voluptatem vitae est. Placeat aperiam ipsam tempore.', 'Quae.', 6000000, 700000, 10.00, 35, 0, 0, 0, '2023-06-10 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/350x350/media/catalog/producttmp/0c/e3/79/db85b6b8e128892aea3e66a00ac1b16f.jpg.webp'),
	(15, 'Ab ipsam qui nam velit sit.', 'Non.1', 'Qui.', '2017-06-06', 'Eos.', 'Fuga.', 'Eaque est quidem rerum nemo at et. Commodi vel nobis odit est optio. Incidunt est autem est nobis.', 'Ipsa corrupti ut dolorem quam asperiores quod sed maxime. Eaque non et voluptatibus adipisci nihil.', 'Et.', 3815400, 700000, 53.00, 12, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/350x350/ts/product/1b/ae/1d/e90f3783947df498614e84996d0ff030.jpg.webp'),
	(16, 'Ea impedit qui omnis ut.', 'Qui.', 'Sunt.', '2004-12-07', 'Qui.', 'Eos.2', 'Labore quis labore ratione eum in. Voluptatem voluptatem rem consequatur tenetur dolores sint aut.', 'Iure suscipit error eum error cumque. Dolorem est sit ipsa culpa.', 'Aut.', 300000, 700000, 12.00, 21, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/5a/52/49/5b84e372b23d69ce1dc9011f5929163c.jpg.webp'),
	(17, 'Blanditiis et facilis sed.', 'Qui.', 'Quis.', '1979-07-07', 'Nemo.', 'Eum.', 'Dolorum illo aspernatur ratione accusamus perferendis placeat ex expedita. Omnis tempore eos et.', 'Id vel explicabo ipsam. Dignissimos dolorem labore aut eligendi possimus perferendis.', 'Id.', 6000000, 700000, 25.00, 18, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/b5/9e/96/a1fa30bcf050c2e660e12a918d682218.jpg.webp'),
	(18, 'Qui qui non ad nemo.', 'Non.1', 'Ut.', '2003-07-24', 'Sed.', 'Cum.', 'Vitae perferendis nemo temporibus. Sed praesentium natus quos omnis quisquam. Et vero ipsam nam.', 'Aliquam aut et ut eum dolor. Enim cumque vero distinctio incidunt iusto.', 'Et.', 3000000, 700000, 63.00, 79, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/0f/6e/7b/66ebc660f2188dff9d7038203ee4c807.png.webp'),
	(19, 'Fugit ipsam numquam esse eos.', 'Ex.1', 'Qui.', '1997-12-25', 'Nemo.', 'In.', 'Est ut laborum impedit. Qui officia quo quisquam omnis quibusdam. Dolorem iusto deserunt enim sit.', 'Cumque sed sit aut molestiae perferendis id laudantium quia. Delectus et fugiat quis repudiandae.', 'Quo.', 6000000, 700000, 52.00, 52, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/5b/63/bd/c14b788f1c800e29d73847ec15c465ec.jpg.webp'),
	(20, 'Maxime odio et sit.', 'Ex.1', 'Quos.', '2018-06-25', 'Et.', 'Odit.', 'Aut cum tempore nam consectetur. Suscipit aspernatur laudantium voluptas qui quia non sunt.', 'Quis debitis reprehenderit voluptatem. Nobis officiis harum omnis.', 'Iste.', 6000000, 700000, 68.00, 14, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/d0/bb/9c/9e317032837452b9ffcb041c94dd7e77.jpg.webp'),
	(21, 'Beatae iusto occaecati cum.', 'Qui.', 'A et.', '1970-05-03', 'Est.', 'Est.', 'In nihil ea cumque voluptas. Occaecati natus et et sunt iure officia earum.', 'Soluta qui fugit earum fuga. Ea molestiae quasi expedita quia.', 'Quo.', 200000, 700000, 32.00, 72, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/a2/ac/06/6c62ee87cb3671a03074dce9ac4bb9f4.png.webp'),
	(22, 'Facere nisi ut magni.', 'Quae.', 'Aut.', '1975-01-16', 'Hic.', 'Qui.1', 'Cumque porro corporis excepturi autem. Dolorem eveniet pariatur sed quas.', 'Fuga non ipsa qui placeat voluptas eveniet ut. Dolores molestias voluptates consequatur eius est.', 'Ut.', 6000000, 700000, 17.00, 46, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/cf/4b/02/f442e57eeda76b730ec408bb6361295c.png.webp'),
	(23, 'Non soluta quam eum et.', 'Quae.', 'Quae.', '2020-02-26', 'Sit.', 'Qui.2', 'Cum quae facere quae et. Autem voluptas aut reprehenderit ut quod non quia.', 'Dolor consequatur cumque eius ex repudiandae vel magnam. Repellat provident maxime eos atque autem.', 'Qui.', 6000000, 700000, 44.00, 64, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/28/6d/e9/b1b8abbb7b7d09ee7ff08cd3fc5f7cc3.png.webp'),
	(24, 'Placeat ipsam eum et dolorum.', 'Quae.', 'Nisi.', '2018-08-12', 'Quia.', 'Quis.2', 'Corporis ab voluptate id sapiente. Consectetur eaque blanditiis similique laboriosam eligendi rem.', 'Quos tempore omnis id cupiditate. Enim et at labore ut magni qui. Eveniet qui sunt eos est ex.', 'Aut.', 6000000, 700000, 72.00, 52, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/46/5f/7a/b260d6b3b80818a1dc71f3c5a4e04db9.jpg.webp'),
	(25, 'In aut nulla sint a beatae.', 'Non.1', 'Aut.', '1995-03-11', 'Et.', 'Enim.1', 'Aut ea adipisci unde dolores. Inventore magni nisi adipisci quia voluptatibus eos.', 'Quia non velit ducimus quod. Sit explicabo voluptas assumenda et corporis.', 'Et.', 2000000, 700000, 13.00, 47, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/3e/1b/ed/0fc9ae05ae8a47f99746afe2f4ca42df.jpg.webp'),
	(26, 'Cumque numquam quaerat sit.', 'Non.1', 'Quam.', '2016-03-21', 'Non.', 'Enim.2', 'Temporibus iure dolorem adipisci laboriosam. Rerum a voluptatem id unde magni tempore.', 'Incidunt quos nesciunt ducimus et quidem qui nesciunt. Laboriosam quis dolorum voluptatem.', 'Ut.', 1500000, 700000, 74.00, 61, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/0d/c6/6c/5954c59446a178914b9dcc237871ccd0.png.webp'),
	(27, 'Sint mollitia quos qui ut.', 'Ex.1', 'Ut.', '2010-01-24', 'Est.', 'Nemo.2', 'Quia reiciendis id totam quod ex. Consequatur unde illo non sit. Explicabo iste soluta ut est quis.', 'Quia sequi nobis quia. Necessitatibus ullam molestias inventore. Modi temporibus et inventore.', 'Ut.', 6000000, 700000, 71.00, 55, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image-3-346x310.jpg'),
	(28, 'Vero rerum eligendi unde est.', 'Ex.1', 'Est.', '1970-07-27', 'Vero.', 'Nemo.3', 'Quia ex omnis magnam esse. Nemo veritatis placeat corrupti facilis. Velit sit dolores sit non.', 'Et nobis veritatis sunt enim ut aut ea. Perspiciatis vel quae molestias laboriosam quos non.', 'Et.', 4444501, 700000, 43.00, 47, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/0f/11/7a/b0d3f635547f1e89222b54aadc9fc374.png.webp'),
	(29, 'Vero harum voluptatum nihil.', 'Quae.', 'Aut.', '2004-12-23', 'Sit.', 'Ut.', 'Facere nostrum eum aut et. Inventore dolorum et ut.', 'Voluptas et explicabo rerum cumque. Blanditiis voluptas et quis autem dolor corrupti.', 'Ut.', 6000000, 700000, 54.00, 10, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/08/c1/ef/b2232d4ce9237d644180d013e01104c8.jpg.webp'),
	(30, 'Et sapiente ipsa quae optio.', 'Quae.', 'Sunt.', '2023-04-18', 'Fuga.', 'Ut.', 'Libero numquam illo iure sit est. Consequuntur qui minima est sit.', 'Enim eum doloremque in consequatur. Iusto ea recusandae in sunt similique. Nihil et non est eum.', 'Modi.', 6000000, 700000, 46.00, 51, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/72/9f/63/d09edb6bc99d1208fa4694da642370a9.jpg.webp'),
	(31, 'Non amet odit amet magni.', 'Quae.', 'Nisi.', '1993-07-31', 'Qui.', 'Qui.3', 'Perferendis vel quis sit. Eos quisquam perferendis non. Porro quos omnis cumque molestias.', 'Consectetur nisi illo ut totam. Est voluptas magnam commodi ipsam odio commodi molestiae.', 'Eum.', 6000000, 700000, 26.00, 35, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/12/ee/06/311de771ebaceaab3034b7626126d6a8.jpg.webp'),
	(32, 'Voluptates cum omnis vel.', 'Qui.', 'Aut.', '1975-12-19', 'Odio.', 'Et.2', 'Saepe deleniti laboriosam quia omnis. Praesentium sequi in animi et dolor.', 'Aut rerum in molestiae illo modi et. Id qui nobis amet iste minima. Magni nam ipsa quisquam.', 'In.', 6000000, 700000, 36.00, 19, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/86/29/ec/62cf665c9d04942dd43f9b6334f7880a.png.webp'),
	(33, 'Quis et iste est et.', 'Qui.', 'Iste.', '1993-06-19', 'In.', 'Et.3', 'Consequatur excepturi sit expedita omnis. Nisi non quam sint unde et iusto inventore voluptas.', 'Rerum qui sequi et doloremque harum. Quod nam est quae beatae dolor.', 'Quod.', 6000000, 700000, 77.00, 11, 0, 0, 0, '2023-06-09 05:55:25', '2023-06-09 05:55:25', 'https://salt.tikicdn.com/cache/280x280/ts/product/53/f6/f5/0c08d34db1c8e165feb8e35e60346a89.jpg.webp');

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `subcategory_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories_product_id_foreign` (`product_id`),
  KEY `product_categories_category_id_foreign` (`category_id`),
  KEY `product_categories_subcategory_id_foreign` (`subcategory_id`),
  CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `subcategory_id`) VALUES
	(9, 1, 1, 6),
	(10, 6, 1, 6),
	(11, 3, 1, 9),
	(12, 15, 1, 7),
	(13, 30, 5, 24),
	(14, 2, 8, 26),
	(15, 5, 7, 8),
	(16, 7, 7, 25),
	(17, 8, 4, 24),
	(18, 10, 5, 10);

CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_product_id_foreign` (`product_id`),
  KEY `product_reviews_user_id_foreign` (`user_id`),
  CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `product_wish_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_wish_lists_user_id_foreign` (`user_id`),
  KEY `product_wish_lists_product_id_foreign` (`product_id`),
  CONSTRAINT `product_wish_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_wish_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('0eWkTbdeT6T5EWtgteXHZaGrBNeRj6MGZ3Orvw1i', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '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aW4gY29tbW9kaSBzaXQuIjtzOjExOiJkZXNjcmlwdGlvbiI7czo5NjoiQXV0IHRvdGFtIHNpbnQgbmVxdWUgZXN0IHJlY3VzYW5kYWUgZWxpZ2VuZGkgdm9sdXB0YXRpYnVzLiBVdCB2b2x1cHRhcyBhY2N1c2FtdXMgaXBzYSBwcm92aWRlbnQuIjtzOjM6InNrdSI7czo0OiJOb24uIjtzOjU6InByaWNlIjtpOjg1MDAwMDA7czo5OiJvbGRfcHJpY2UiO2k6NzAwMDAwO3M6ODoiZGlzY291bnQiO2Q6NTM7czozOiJxdHkiO2k6MTk7czoxMToiYmVzdF9zZWxsZXIiO2k6MTtzOjExOiJob3RfcHJvZHVjdCI7aTowO3M6MTY6InRyZW5kaW5nX3Byb2R1Y3QiO2k6MDtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIzLTA2LTA3IDEzOjQyOjEzIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTA2LTA3IDEzOjQyOjEzIjtzOjc6ImltZ191cmwiO3M6OTI6Imh0dHBzOi8vazRqM2oyczcucm9ja2V0Y2RuLm1lL2JhY29sYS93cC1jb250ZW50L3VwbG9hZHMvMjAyMS8wNC9wcm9kdWN0LWltYWdlLTYyLTM0NngzMTAuanBnIjt9czoxMToiACoAb3JpZ2luYWwiO2E6MjA6e3M6MjoiaWQiO2k6NztzOjU6InRpdGxlIjtzOjg6IkRvbG9yZXMuIjtzOjU6ImJyYW5kIjtzOjU6IlF1YWUuIjtzOjQ6InR5cGUiO3M6NDoiUXVpLiI7czozOiJtZmciO3M6MTA6IjE5ODAtMDgtMTUiO3M6NDoibGlmZSI7czo1OiJRdWlhLiI7czo0OiJzbHVnIjtzOjY6IlF1b3MuMyI7czo3OiJzdW1tYXJ5IjtzOjkzOiJFb3MgaXBzdW0gdGVtcG9yZSBvY2NhZWNhdGkgZXQgb2ZmaWNpaXMgZXQgYXNwZXJuYXR1ciBxdWkuIFV0IHF1b2QgcXVpIGl0YXF1ZSBpbiBjb21tb2RpIHNpdC4iO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjk2OiJBdXQgdG90YW0gc2ludCBuZXF1ZSBlc3QgcmVjdXNhbmRhZSBlbGlnZW5kaSB2b2x1cHRhdGlidXMuIFV0IHZvbHVwdGFzIGFjY3VzYW11cyBpcHNhIHByb3ZpZGVudC4iO3M6Mzoic2t1IjtzOjQ6Ik5vbi4iO3M6NToicHJpY2UiO2k6ODUwMDAwMDtzOjk6Im9sZF9wcmljZSI7aTo3MDAwMDA7czo4OiJkaXNjb3VudCI7ZDo1MztzOjM6InF0eSI7aToxOTtzOjExOiJiZXN0X3NlbGxlciI7aToxO3M6MTE6ImhvdF9wcm9kdWN0IjtpOjA7czoxNjoidHJlbmRpbmdfcHJvZHVjdCI7aTowO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjMtMDYtMDcgMTM6NDI6MTMiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjItMDYtMDcgMTM6NDI6MTMiO3M6NzoiaW1nX3VybCI7czo5MjoiaHR0cHM6Ly9rNGozajJzNy5yb2NrZXRjZG4ubWUvYmFjb2xhL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIxLzA0L3Byb2R1Y3QtaW1hZ2UtNjItMzQ2eDMxMC5qcGciO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjA6e31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjg6IgAqAGRhdGVzIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6Mjp7aTowO3M6MTI6ImZvcm1hdF9wcmljZSI7aToxO3M6MTY6ImZvcm1hdF9vbGRfcHJpY2UiO31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjA6e31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czo5OiIAKgBoaWRkZW4iO2E6MDp7fXM6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTE6IgAqAGZpbGxhYmxlIjthOjE5OntpOjA7czoyOiJpZCI7aToxO3M6NToidGl0bGUiO2k6MjtzOjc6ImltZ191cmwiO2k6MztzOjU6ImJyYW5kIjtpOjQ7czo0OiJ0eXBlIjtpOjU7czozOiJtZmciO2k6NjtzOjQ6ImxpZmUiO2k6NztzOjQ6InNsdWciO2k6ODtzOjc6InN1bW1hcnkiO2k6OTtzOjExOiJkZXNjcmlwdGlvbiI7aToxMDtzOjM6InNrdSI7aToxMTtzOjU6InByaWNlIjtpOjEyO3M6ODoiZGlzY291bnQiO2k6MTM7czozOiJxdHkiO2k6MTQ7czoxMToiYmVzdF9zZWxsZXIiO2k6MTU7czoxMToiaG90X3Byb2R1Y3QiO2k6MTY7czoxNToidHJlZGluZ19wcm9kdWN0IjtpOjE3O3M6MTA6ImNyZWF0ZWRfYXQiO2k6MTg7czoxMDoidXBkYXRlZF9hdCI7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX19fXM6OToic2hpcF9jb3N0IjtpOjIwMDAwO3M6MTI6InNoaXBfYWRkcmVzcyI7aTowO3M6MTM6InN1YlRvdGFsUHJpY2UiO2k6ODUwMDAwMDtzOjEwOiJ0b3RhbFByaWNlIjtpOjg1MjAwMDA7czoxMzoidG90YWxRdWFudGl0eSI7aToxO3M6NzoiY291bnBvbiI7TjtzOjI0OiJjdXJyZW50X3BlcmNlbnRfZnJlZXNoaXAiO2Q6ODU7czoyMjoicmVtYWluX3RvX2dldF9mcmVlc2hpcCI7aToxNTAwMDAwO319', 1689254100);

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `rate_sale` int NOT NULL DEFAULT '0',
  `title_slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle_slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_cost` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sliders_products` (`product_id`),
  CONSTRAINT `FK_sliders_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sliders` (`id`, `img_url`, `status`, `rate_sale`, `title_slider`, `subtitle_slider`, `from_cost`, `created_at`, `updated_at`, `product_id`) VALUES
	(1, 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/slider-image-1.jpg', 1, 20, 'Specialist in the grocery store', 'Only this week. Don’t miss...', 1200000, '2023-06-08 09:00:26', '2023-06-08 09:03:10', 1),
	(3, 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/04/slider-image-2.jpg', 1, 30, 'Feed your family the best', 'Only this week. Don’t miss...', 3200000, '2023-06-08 09:01:44', '2023-06-08 09:01:44', 15),
	(5, 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/05/slider-3.jpg', 1, 40, 'Grocery full of inspiration', 'Only this week. Don’t miss...', 4200000, '2023-06-08 09:03:20', '2023-06-08 09:03:20', 11);

CREATE TABLE IF NOT EXISTS `solds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solds_user_id_foreign` (`user_id`),
  KEY `solds_product_id_foreign` (`product_id`),
  CONSTRAINT `solds_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `solds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sub_categories` (`id`, `category_id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
	(6, 1, 'HERBS & SEASONINGS & Crab', 'herbs-seasonings-crab', '2023-06-07 10:02:55', '2023-06-07 10:27:29'),
	(7, 1, 'PACKAGED PRODUCE', 'packaged-produce', '2023-06-07 10:03:36', '2023-06-07 10:03:36'),
	(8, 1, 'PARTY TRAYS', 'party-trays', '2023-06-07 10:03:52', '2023-06-07 10:03:52'),
	(9, 1, 'CUTS & SPROUTS', 'cuts-sprouts', '2023-06-07 10:04:07', '2023-06-07 10:04:07'),
	(10, 1, 'EXOTIC FRUITS & VEGGIES', 'exotic-fruits-veggies', '2023-06-07 10:04:23', '2023-06-07 10:04:23'),
	(11, 1, 'FRESH FRUITS', 'fresh-fruits', '2023-06-07 10:04:43', '2023-06-07 10:04:43'),
	(13, 1, 'FRESH VEGETABLES', 'fresh-vegetables', '2023-06-07 10:12:33', '2023-06-07 10:12:33'),
	(24, 4, 'COFFEE', 'coffee', NULL, NULL),
	(25, 4, 'CRAFT BEER', 'craft-beer', NULL, NULL),
	(26, 4, 'DRINK BOXES & POUCHES', 'drink-boxes-pouches', NULL, NULL),
	(27, 4, 'MILK & PLANT-BASED MILK', 'milk-plant-based-milk', NULL, NULL),
	(28, 4, 'SODA & POP', 'soda-pop', NULL, NULL);

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ship_id` bigint unsigned DEFAULT NULL,
  `default_address` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_ship_id_foreign` (`ship_id`),
  CONSTRAINT `users_ship_id_foreign` FOREIGN KEY (`ship_id`) REFERENCES `billing_addresses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `phone`, `display_name`, `isAdmin`, `address`, `ship_id`, `default_address`) VALUES
	(12, 'Nguyễn Hồ Thanh Bền 123', 'nben19732@gmail.com', NULL, '$2y$10$qzl7JVpO2c422cOTnOmf6.m1UkGyCBK/77CiFPqNVe6ODHxG7B98.', NULL, NULL, NULL, NULL, '2023-06-11 09:15:12', '2023-06-23 10:54:02', NULL, NULL, 0, NULL, 1, 0),
	(13, 'Nguyễn Bền Nè', 'nben19733@gmail.com', NULL, '$2y$10$s/YN9DAhXDai8hilr8XsHeBfD3WnfN3e9t5r3LKRAU11RXVn/ydrm', NULL, NULL, NULL, NULL, '2023-06-12 08:51:22', '2023-06-12 08:51:22', NULL, NULL, 0, NULL, NULL, 0);

CREATE TABLE IF NOT EXISTS `weekend_discounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rate_sale` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `weekend_discounts` (`id`, `rate_sale`, `title`, `img_url`, `sub_title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, 20, 'Legumes & Cereals', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/08/bacola-banner-01.jpg', 'Feed your family the best', 'blue-diamond-almonds-lightly-salted/', 1, '2023-06-10 03:03:53', '2023-06-10 03:08:59'),
	(2, 50, 'Dairy & Eggs', 'https://k4j3j2s7.rocketcdn.me/bacola/wp-content/uploads/2021/08/bacola-banner-02.jpg', 'A different kind of grocery store', 'organic-cage-free-grade-a-large-brown-eggs', 1, '2023-06-10 03:05:19', '2023-06-10 03:05:19');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
