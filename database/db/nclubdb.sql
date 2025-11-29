-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2025 at 10:08 AM
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
-- Database: `nclubdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `github_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `facebook_id`, `google_id`, `github_id`, `password`, `photo`, `phone`, `address`, `dob`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SAMIM HOSSEN', 'admin@example.com', NULL, NULL, NULL, '$2y$12$OtH1/Jkn0Zrmmd.eoL8eLuwSgZmLgRVBmxJuh6UfF3kLQPMafye8O', 'user-1764239956.png', '01700000000', 'Admin Office', '2001-01-01', 1, 1, NULL, '2025-11-27 10:13:21', '2025-11-27 10:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `routing_number` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_transection_details`
--

CREATE TABLE `bank_transection_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `remarks` text NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `userId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `reg`, `date`, `userId`, `foodId`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(27, 2025112711, '2025-11-27', 1, 1, 1, 250, '2025-11-27 11:50:08', '2025-11-27 11:50:08'),
(28, 2025112711, '2025-11-27', 1, 2, 1, 800, '2025-11-27 11:50:09', '2025-11-27 11:50:09'),
(29, 2025112711, '2025-11-27', 1, 3, 1, 180, '2025-11-27 11:50:10', '2025-11-27 11:50:10'),
(30, 2025112711, '2025-11-27', 1, 4, 1, 350, '2025-11-27 11:50:10', '2025-11-27 11:50:10'),
(31, 2025112712, '2025-11-27', 1, 3, 1, 180, '2025-11-27 11:51:57', '2025-11-27 11:51:57'),
(32, 2025112712, '2025-11-27', 1, 4, 1, 350, '2025-11-27 11:51:58', '2025-11-27 11:51:58'),
(33, 2025112713, '2025-11-27', 1, 20, 1, 130, '2025-11-27 11:56:22', '2025-11-27 11:56:22'),
(34, 2025112713, '2025-11-27', 1, 19, 1, 950, '2025-11-27 11:56:23', '2025-11-27 11:56:23'),
(35, 2025112713, '2025-11-27', 1, 18, 1, 550, '2025-11-27 11:56:24', '2025-11-27 11:56:24'),
(36, 2025112713, '2025-11-27', 1, 17, 1, 70, '2025-11-27 11:56:25', '2025-11-27 11:56:25'),
(37, 2025112713, '2025-11-27', 1, 13, 1, 200, '2025-11-27 11:56:25', '2025-11-27 11:56:25'),
(38, 2025112713, '2025-11-27', 1, 14, 1, 380, '2025-11-27 11:56:26', '2025-11-27 11:56:26'),
(39, 2025112713, '2025-11-27', 1, 15, 1, 210, '2025-11-27 11:56:26', '2025-11-27 11:56:26'),
(40, 2025112713, '2025-11-27', 1, 16, 1, 140, '2025-11-27 11:56:27', '2025-11-27 11:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `email`, `phone`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Smart Food Restaurant', 'Dhaka, Bangladesh', 'info@smartfood.com', '01712345678', 'https://smartfood.com', '2025-11-27 10:13:22', '2025-11-27 10:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `due_collections`
--

CREATE TABLE `due_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` varchar(255) DEFAULT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `due` decimal(12,2) DEFAULT NULL,
  `pay` decimal(12,2) DEFAULT NULL,
  `payment_date` date NOT NULL DEFAULT '2025-11-27',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `due_collections`
--

INSERT INTO `due_collections` (`id`, `reg`, `member_id`, `total`, `discount`, `due`, `pay`, `payment_date`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(12, NULL, 2, 1000.00, 200.00, 1000.00, 800.00, '2025-11-27', 1, 'Due collection for member phone: 01762164746', '2025-11-27 11:50:31', '2025-11-27 11:50:31'),
(13, NULL, 2, 1500.00, 100.00, 500.00, 400.00, '2025-11-27', 1, 'Due collection for member phone: 01762164746', '2025-11-27 11:52:17', '2025-11-27 11:52:17'),
(17, NULL, 1, 2000.00, 500.00, 2000.00, 1500.00, '2025-11-27', 1, 'Due collection for member phone: 01700000000', '2025-11-27 11:59:14', '2025-11-27 11:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `expense_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `category_id`, `subcategory_id`, `user_id`, `title`, `description`, `amount`, `expense_date`, `created_at`, `updated_at`) VALUES
(2, 2, 5, 1, 'Lunch', 'N/A', 500.00, '2025-11-29', '2025-11-29 07:56:16', '2025-11-29 07:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Office', 'Office related expenses', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(2, 'Food', 'Food & Beverages', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(3, 'Travel', 'Travel and transportation', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(4, 'Utilities', 'Electricity, Water, Internet, etc.', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(5, 'Maintenance', 'Repairs & maintenance', '2025-11-27 10:13:22', '2025-11-27 10:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `expense_subcategories`
--

CREATE TABLE `expense_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_subcategories`
--

INSERT INTO `expense_subcategories` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Stationery', 'Stationery expense under Office', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(2, 1, 'Software', 'Software expense under Office', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(3, 1, 'Hardware', 'Hardware expense under Office', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(4, 2, 'Snacks', 'Snacks expense under Food', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(5, 2, 'Lunch', 'Lunch expense under Food', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(6, 2, 'Beverages', 'Beverages expense under Food', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(7, 3, 'Taxi', 'Taxi expense under Travel', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(8, 3, 'Bus', 'Bus expense under Travel', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(9, 3, 'Flight', 'Flight expense under Travel', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(10, 4, 'Electricity', 'Electricity expense under Utilities', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(11, 4, 'Water', 'Water expense under Utilities', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(12, 4, 'Internet', 'Internet expense under Utilities', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(13, 4, 'Gas', 'Gas expense under Utilities', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(14, 5, 'Plumbing', 'Plumbing expense under Maintenance', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(15, 5, 'Electrical', 'Electrical expense under Maintenance', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(16, 5, 'Cleaning', 'Cleaning expense under Maintenance', '2025-11-27 10:13:22', '2025-11-27 10:13:22');

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
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `category_id`, `stock`, `status`, `image`, `ingredients`, `sku`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Cheese Burger', 250, 1, 44, 1, 'cheese_burger.jpg', 'Bun, Cheese, Patty, Lettuce, Tomato', 'TQMKDYSW', 'Stock inserted date of 2025-11-29', '2025-11-27 10:13:22', '2025-11-29 05:46:18'),
(2, 'Pepperoni Pizza', 800, 2, 23, 1, 'pepperoni_pizza.jpg', 'Dough, Cheese, Pepperoni, Tomato Sauce', 'AG5GFMGB', 'Stock inserted date of 2025-11-29', '2025-11-27 10:13:22', '2025-11-29 05:47:55'),
(3, 'Chicken Sandwich', 180, 3, 32, 1, 'chicken_sandwich.jpg', 'Bread, Chicken, Lettuce, Mayo', 'L9WNTDAV', '', '2025-11-27 10:13:22', '2025-11-27 11:51:57'),
(4, 'Spaghetti Bolognese', 350, 4, 17, 1, 'spaghetti.jpg', 'Spaghetti, Tomato Sauce, Beef', '1CZPXFLI', '', '2025-11-27 10:13:22', '2025-11-27 11:51:58'),
(5, 'Caesar Salad', 200, 5, 25, 1, 'caesar_salad.jpg', 'Lettuce, Chicken, Caesar Dressing, Croutons', 'OLSZCOTD', '', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(6, 'Chocolate Cake', 150, 6, 20, 1, 'chocolate_cake.jpg', 'Flour, Cocoa, Sugar, Eggs, Butter', 'JUYPBHXL', 'Stock inserted date of 2025-11-29', '2025-11-27 10:13:22', '2025-11-29 05:31:16'),
(7, 'Coca Cola', 60, 7, 100, 1, 'coca_cola.jpg', 'Carbonated Water, Sugar, Flavor', 'A1ABU3GH', '', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(8, 'Grilled Salmon', 900, 8, 10, 1, 'grilled_salmon.jpg', 'Salmon, Lemon, Spices', 'XCGKATMT', 'Premium dish', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(9, 'BBQ Chicken', 500, 9, 20, 1, 'bbq_chicken.jpg', 'Chicken, BBQ Sauce, Spices', 'F48YPFHZ', '', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(10, 'Pancakes', 120, 10, 30, 1, 'pancakes.jpg', 'Flour, Eggs, Milk, Sugar, Butter', 'KTUMI74R', 'Breakfast special', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(11, 'Veggie Burger', 220, 1, 40, 1, 'veggie_burger.jpg', 'Bun, Veg Patty, Lettuce, Tomato, Cheese', 'JSID1KCN', '', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(12, 'Margherita Pizza', 700, 2, 25, 1, 'margherita_pizza.jpg', 'Dough, Tomato Sauce, Cheese, Basil', 'XCVHP1OS', '', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(13, 'Tuna Sandwich', 200, 3, 34, 1, 'tuna_sandwich.jpg', 'Bread, Tuna, Lettuce, Mayo', 'FCAUK857', '', '2025-11-27 10:13:22', '2025-11-27 11:56:25'),
(14, 'Fettuccine Alfredo', 380, 4, 18, 1, 'fettuccine_alfredo.jpg', 'Fettuccine, Cream, Cheese, Butter', '5L9AISQO', '', '2025-11-27 10:13:22', '2025-11-27 11:56:26'),
(15, 'Greek Salad', 210, 5, 27, 1, 'greek_salad.jpg', 'Lettuce, Feta, Olive, Tomato, Cucumber', 'JK6YVZQC', '', '2025-11-27 10:13:22', '2025-11-27 11:56:26'),
(16, 'Vanilla Cake', 140, 6, 19, 1, 'vanilla_cake.jpg', 'Flour, Sugar, Eggs, Butter, Vanilla', 'WUQFVW8I', '', '2025-11-27 10:13:22', '2025-11-27 11:56:27'),
(17, 'Orange Juice', 70, 7, 79, 1, 'orange_juice.jpg', 'Orange, Water, Sugar', '0E8NDLHU', '', '2025-11-27 10:13:22', '2025-11-27 11:56:25'),
(18, 'Grilled Chicken', 550, 9, 24, 1, 'grilled_chicken.jpg', 'Chicken, Herbs, Spices', 'TI7D7HUM', '', '2025-11-27 10:13:22', '2025-11-27 11:56:24'),
(19, 'Salmon Sushi', 950, 8, 14, 1, 'salmon_sushi.jpg', 'Salmon, Rice, Seaweed', 'Q7MJ4Y8V', 'Premium', '2025-11-27 10:13:22', '2025-11-27 11:56:23'),
(20, 'French Toast', 130, 10, 23, 1, 'french_toast.jpg', 'Bread, Eggs, Milk, Sugar, Butter', 'YGUZMLJS', 'Breakfast special', '2025-11-27 10:13:22', '2025-11-27 11:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Burgers', '2025-11-27 10:13:21', '2025-11-27 10:13:21'),
(2, 'Pizza', '2025-11-27 10:13:21', '2025-11-27 10:13:21'),
(3, 'Sandwiches', '2025-11-27 10:13:21', '2025-11-27 10:13:21'),
(4, 'Pasta', '2025-11-27 10:13:21', '2025-11-27 10:13:21'),
(5, 'Salads', '2025-11-27 10:13:21', '2025-11-27 10:13:21'),
(6, 'Desserts', '2025-11-27 10:13:21', '2025-11-27 10:13:21'),
(7, 'Beverages', '2025-11-27 10:13:21', '2025-11-27 10:13:21'),
(8, 'Seafood', '2025-11-27 10:13:21', '2025-11-27 10:13:21'),
(9, 'Grill', '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(10, 'Breakfast', '2025-11-27 10:13:22', '2025-11-27 10:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `income_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `category_id`, `subcategory_id`, `user_id`, `title`, `description`, `amount`, `income_date`, `created_at`, `updated_at`) VALUES
(1, 6, 12, 1, 'Sale', 'N/A', 150.00, '2025-11-29', '2025-11-29 05:28:16', '2025-11-29 05:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Business Income', 'Income from business', '2025-11-29 05:27:22', '2025-11-29 05:27:22'),
(2, 'Salary', 'Monthly salary from job', '2025-11-29 05:27:22', '2025-11-29 05:27:22'),
(3, 'Investment', 'Income from investments', '2025-11-29 05:27:22', '2025-11-29 05:27:22'),
(4, 'Freelancing', 'Freelancing earning', '2025-11-29 05:27:22', '2025-11-29 05:27:22'),
(5, 'Rental Income', 'Income from renting properties', '2025-11-29 05:27:22', '2025-11-29 05:27:22'),
(6, 'Sale', NULL, '2025-11-29 05:27:37', '2025-11-29 05:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `income_sub_categories`
--

CREATE TABLE `income_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_sub_categories`
--

INSERT INTO `income_sub_categories` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Retail Shop', 'Income from shop sales', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(2, 1, 'Wholesale', 'Wholesale business income', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(3, 2, 'Basic Salary', 'Monthly salary', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(4, 2, 'Overtime', 'Extra work payment', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(5, 3, 'Stocks', 'Income from stock investment', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(6, 3, 'Bank Interest', 'Interest income', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(7, 4, 'Web Development', 'Freelance projects', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(8, 4, 'Graphics Design', 'Freelance graphics work', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(9, 5, 'House Rent', 'Rent from homes', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(10, 5, 'Shop Rent', 'Rent from shops', '2025-11-29 05:27:25', '2025-11-29 05:27:25'),
(12, 6, 'Box Sale', 'N/A', '2025-11-29 05:27:43', '2025-11-29 05:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `membership_type` enum('Silver','Gold','Platinum') NOT NULL DEFAULT 'Silver',
  `point` varchar(255) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `email`, `phone`, `membership_type`, `point`, `start_date`, `expiry_date`, `is_active`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Default Member', 'member@example.com', '01700000000', 'Platinum', '0', '2025-11-27', '2026-11-27', 1, 'Auto-generated member.', '2025-11-27 10:19:05', '2025-11-27 10:19:05'),
(2, 'SAMIM HOSSEN', 'samim@example.com', '01762164746', 'Platinum', '0', '2025-11-27', '2026-11-27', 1, 'Auto-generated member.', '2025-11-27 10:19:30', '2025-11-27 10:19:30');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_11_10_041538_create_admins_table', 1),
(7, '2025_11_10_070245_create_food_categories_table', 1),
(8, '2025_11_10_070248_create_food_table', 1),
(9, '2025_11_10_084359_create_carts_table', 1),
(10, '2025_11_10_085815_create_stocks_table', 1),
(11, '2025_11_10_095452_create_companies_table', 1),
(12, '2025_11_10_100934_create_payment_methods_table', 1),
(13, '2025_11_10_123159_create_orders_table', 1),
(14, '2025_11_11_075415_create_memberships_table', 1),
(15, '2025_11_11_075416_create_due_collections_table', 1),
(16, '2025_11_15_135339_create_expense_categories_table', 1),
(17, '2025_11_15_135414_create_expense_subcategories_table', 1),
(18, '2025_11_15_135503_create_expenses_table', 1),
(19, '2025_11_24_150051_create_bank_details_table', 1),
(20, '2025_11_24_161140_create_bank_transection_details_table', 1),
(21, '2025_11_29_103945_create_incomes_table', 2),
(31, '2025_11_29_104608_create_income_categories_table', 3),
(32, '2025_11_29_104617_create_income_sub_categories_table', 3),
(33, '2025_11_29_104618_create_incomes_table', 3),
(36, '2025_11_29_122202_create_products_table', 4),
(37, '2025_11_29_134305_create_product_stock_details_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `vat` decimal(12,2) DEFAULT NULL,
  `payable` decimal(12,2) DEFAULT NULL,
  `pay` decimal(12,2) DEFAULT NULL,
  `due` decimal(12,2) DEFAULT NULL,
  `kitchen` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `paymentMethod` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL DEFAULT '0',
  `customerPhone` varchar(255) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `user_id`, `reg`, `total`, `discount`, `vat`, `payable`, `pay`, `due`, `kitchen`, `paymentMethod`, `customerName`, `customerPhone`, `status`, `created_at`, `updated_at`) VALUES
(15, '2025-11-27', 1, 2025112711, 1580.00, 80.00, 0.00, 1500.00, 500.00, 1000.00, 0, 1, 'SAMIM HOSSEN', '01762164746', 0, '2025-11-27 11:50:19', '2025-11-27 11:50:19'),
(16, '2025-11-27', 1, 2025112712, 530.00, 30.00, 0.00, 500.00, 0.00, 500.00, 0, 1, 'SAMIM HOSSEN', '01762164746', 0, '2025-11-27 11:52:03', '2025-11-27 11:52:03'),
(17, '2025-11-27', 1, 2025112713, 2630.00, 30.00, 0.00, 2600.00, 600.00, 2000.00, 0, 1, 'Default Member', '01700000000', 0, '2025-11-27 11:56:39', '2025-11-27 11:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cash', NULL, 1, '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(2, 'Bkash', NULL, 1, '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(3, 'Nagad', NULL, 1, '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(4, 'Rocket', NULL, 1, '2025-11-27 10:13:22', '2025-11-27 10:13:22'),
(5, 'Card', NULL, 1, '2025-11-27 10:13:22', '2025-11-27 10:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(255) NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `purchase_price`, `total_price`, `stock`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Fresh Atta', 220.00, 300.00, 5, 'Daily household atta', '2025-11-29 07:20:10', '2025-11-29 09:07:18'),
(2, 'Rupchanda Soybean Oil', 150.00, 185.00, 0, 'Premium soybean oil', '2025-11-29 07:20:10', '2025-11-29 09:07:11'),
(3, 'ACI Pure Salt', 25.00, 35.00, 70, 'Refined iodized salt', '2025-11-29 07:20:10', '2025-11-29 08:08:56'),
(4, 'Teer Sugar ', 85.00, 110.00, 50, 'Best quality sugar', '2025-11-29 07:20:10', '2025-11-29 07:52:33'),
(5, 'Miniket Rice', 360.00, 450.00, 50, 'Popular miniket rice', '2025-11-29 07:20:10', '2025-11-29 07:52:52'),
(6, 'Moshari ', 16.00, 25.00, 50, 'Daily essential mosquito coil', '2025-11-29 07:20:10', '2025-11-29 07:52:56'),
(7, 'Dettol Soap (100g)', 50.00, 70.00, 42, 'Protection antibacterial soap', '2025-11-29 07:20:10', '2025-11-29 07:52:59'),
(8, 'Horlicks Family Pack', 440.00, 550.00, 520, 'Popular health drink', '2025-11-29 07:20:10', '2025-11-29 07:53:03'),
(9, 'Fresh Milk Powder', 240.00, 310.00, 74, 'Daily milk powder', '2025-11-29 07:20:10', '2025-11-29 07:53:07'),
(10, 'Lifebuoy Handwash', 65.00, 85.00, 5, 'Daily hygiene product', '2025-11-29 07:20:10', '2025-11-29 09:07:40'),
(11, 'Savlon Antiseptic', 85.00, 120.00, 42, 'For first aid', '2025-11-29 07:20:10', '2025-11-29 07:53:17'),
(12, 'Mug Dal ', 115.00, 140.00, 32, 'Daily cooking dal', '2025-11-29 07:20:10', '2025-11-29 07:53:23'),
(13, 'Potato ', 24.00, 35.00, 10, 'Daily vegetable', '2025-11-29 07:20:10', '2025-11-29 09:07:45'),
(14, 'Onion ', 70.00, 90.00, 0, 'Essential kitchen item', '2025-11-29 07:20:10', '2025-11-29 08:51:15'),
(15, 'Egg', 30.00, 300.00, 30, 'Essential kitchen', '2025-11-29 07:25:50', '2025-11-29 07:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock_details`
--

CREATE TABLE `product_stock_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `stockIn` int(11) NOT NULL DEFAULT 0,
  `stockOut` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stock_details`
--

INSERT INTO `product_stock_details` (`id`, `date`, `user_id`, `product_id`, `stockIn`, `stockOut`, `remark`, `created_at`, `updated_at`) VALUES
(1, '2025-11-29', 1, 4, 50, 0, 'Stock In Added', '2025-11-29 07:52:33', '2025-11-29 07:52:33'),
(2, '2025-11-29', 1, 5, 50, 0, 'Stock In Added', '2025-11-29 07:52:52', '2025-11-29 07:52:52'),
(3, '2025-11-29', 1, 6, 50, 0, 'Stock In Added', '2025-11-29 07:52:56', '2025-11-29 07:52:56'),
(4, '2025-11-29', 1, 7, 42, 0, 'Stock In Added', '2025-11-29 07:52:59', '2025-11-29 07:52:59'),
(5, '2025-11-29', 1, 8, 520, 0, 'Stock In Added', '2025-11-29 07:53:03', '2025-11-29 07:53:03'),
(6, '2025-11-29', 1, 9, 74, 0, 'Stock In Added', '2025-11-29 07:53:07', '2025-11-29 07:53:07'),
(7, '2025-11-29', 1, 10, 25, 0, 'Stock In Added', '2025-11-29 07:53:12', '2025-11-29 07:53:12'),
(8, '2025-11-29', 1, 11, 42, 0, 'Stock In Added', '2025-11-29 07:53:17', '2025-11-29 07:53:17'),
(9, '2025-11-29', 1, 13, 25, 0, 'Stock In Added', '2025-11-29 07:53:20', '2025-11-29 07:53:20'),
(10, '2025-11-29', 1, 12, 32, 0, 'Stock In Added', '2025-11-29 07:53:23', '2025-11-29 07:53:23'),
(11, '2025-11-29', 1, 14, 12, 0, 'Stock In Added', '2025-11-29 07:53:26', '2025-11-29 07:53:26'),
(12, '2025-11-29', 1, 15, 30, 0, 'Stock In Added', '2025-11-29 07:53:31', '2025-11-29 07:53:31'),
(13, '2025-11-29', 1, 2, 1, 0, 'Stock In Added', '2025-11-29 07:58:38', '2025-11-29 07:58:38'),
(14, '2025-11-29', 1, 14, 0, 10, 'Stock Out Added', '2025-11-29 08:01:48', '2025-11-29 08:01:48'),
(15, '2025-11-29', 1, 3, 20, 0, 'Stock In Added', '2025-11-29 08:08:56', '2025-11-29 08:08:56'),
(16, '2025-11-29', 1, 2, 0, 5, 'Stock Out Added', '2025-11-29 08:50:03', '2025-11-29 08:50:03'),
(17, '2025-11-29', 1, 14, 10, 0, 'Stock In Added', '2025-11-29 08:50:42', '2025-11-29 08:50:42'),
(18, '2025-11-29', 1, 14, 0, 2, 'Stock Out Added', '2025-11-29 08:50:56', '2025-11-29 08:50:56'),
(19, '2025-11-29', 1, 14, 0, 11, 'Stock Out Added', '2025-11-29 08:51:02', '2025-11-29 08:51:02'),
(20, '2025-11-29', 1, 14, 1, 0, 'Stock In Added', '2025-11-29 08:51:15', '2025-11-29 08:51:15'),
(21, '2025-11-29', 1, 2, 0, 8, 'Stock Out Added', '2025-11-29 09:07:11', '2025-11-29 09:07:11'),
(22, '2025-11-29', 1, 1, 0, 15, 'Stock Out Added', '2025-11-29 09:07:18', '2025-11-29 09:07:18'),
(23, '2025-11-29', 1, 10, 0, 15, 'Stock Out Added', '2025-11-29 09:07:24', '2025-11-29 09:07:24'),
(24, '2025-11-29', 1, 10, 0, 5, 'Stock Out Added', '2025-11-29 09:07:40', '2025-11-29 09:07:40'),
(25, '2025-11-29', 1, 13, 0, 15, 'Stock Out Added', '2025-11-29 09:07:45', '2025-11-29 09:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `foodId` bigint(20) UNSIGNED NOT NULL,
  `stockIn` int(11) NOT NULL DEFAULT 0,
  `stockOut` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `reg`, `date`, `foodId`, `stockIn`, `stockOut`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 2025112711, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 10:13:34', '2025-11-27 10:13:34'),
(2, 2025112711, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 10:13:35', '2025-11-27 10:13:35'),
(3, 2025112711, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 10:13:35', '2025-11-27 10:13:35'),
(4, 2025112712, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 10:22:16', '2025-11-27 10:22:16'),
(5, 2025112712, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 10:22:16', '2025-11-27 10:22:16'),
(6, 2025112712, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 10:22:17', '2025-11-27 10:22:17'),
(7, 2025112713, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 10:26:03', '2025-11-27 10:26:03'),
(8, 2025112713, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 10:26:03', '2025-11-27 10:26:03'),
(9, 2025112713, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 10:26:04', '2025-11-27 10:26:04'),
(10, 2025112714, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 10:29:37', '2025-11-27 10:29:37'),
(11, 2025112714, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 10:29:38', '2025-11-27 10:29:38'),
(12, 2025112714, '2025-11-27', 4, 0, 1, NULL, 1, '2025-11-27 10:29:39', '2025-11-27 10:29:39'),
(13, 2025112715, '2025-11-27', 14, 0, 1, NULL, 1, '2025-11-27 10:50:54', '2025-11-27 10:50:54'),
(14, 2025112715, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 10:50:55', '2025-11-27 10:50:55'),
(15, 2025112715, '2025-11-27', 15, 0, 1, NULL, 1, '2025-11-27 10:50:57', '2025-11-27 10:50:57'),
(16, 2025112716, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 11:33:52', '2025-11-27 11:33:52'),
(17, 2025112716, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 11:33:53', '2025-11-27 11:33:53'),
(18, 2025112716, '2025-11-27', 15, 0, 1, NULL, 1, '2025-11-27 11:33:54', '2025-11-27 11:33:54'),
(19, 2025112716, '2025-11-27', 20, 0, 1, NULL, 1, '2025-11-27 11:33:57', '2025-11-27 11:33:57'),
(20, 2025112717, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 11:42:54', '2025-11-27 11:42:54'),
(21, 2025112717, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 11:42:55', '2025-11-27 11:42:55'),
(22, 2025112717, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 11:42:55', '2025-11-27 11:42:55'),
(23, 2025112717, '2025-11-27', 6, 0, 1, NULL, 1, '2025-11-27 11:42:56', '2025-11-27 11:42:56'),
(24, 2025112718, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 11:49:23', '2025-11-27 11:49:23'),
(25, 2025112718, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 11:49:24', '2025-11-27 11:49:24'),
(26, 2025112718, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 11:49:25', '2025-11-27 11:49:25'),
(27, 2025112711, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 11:50:08', '2025-11-27 11:50:08'),
(28, 2025112711, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 11:50:09', '2025-11-27 11:50:09'),
(29, 2025112711, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 11:50:10', '2025-11-27 11:50:10'),
(30, 2025112711, '2025-11-27', 4, 0, 1, NULL, 1, '2025-11-27 11:50:10', '2025-11-27 11:50:10'),
(31, 2025112712, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 11:51:57', '2025-11-27 11:51:57'),
(32, 2025112712, '2025-11-27', 4, 0, 1, NULL, 1, '2025-11-27 11:51:58', '2025-11-27 11:51:58'),
(33, 2025112713, '2025-11-27', 20, 0, 1, NULL, 1, '2025-11-27 11:56:22', '2025-11-27 11:56:22'),
(34, 2025112713, '2025-11-27', 19, 0, 1, NULL, 1, '2025-11-27 11:56:23', '2025-11-27 11:56:23'),
(35, 2025112713, '2025-11-27', 18, 0, 1, NULL, 1, '2025-11-27 11:56:24', '2025-11-27 11:56:24'),
(36, 2025112713, '2025-11-27', 17, 0, 1, NULL, 1, '2025-11-27 11:56:25', '2025-11-27 11:56:25'),
(37, 2025112713, '2025-11-27', 13, 0, 1, NULL, 1, '2025-11-27 11:56:25', '2025-11-27 11:56:25'),
(38, 2025112713, '2025-11-27', 14, 0, 1, NULL, 1, '2025-11-27 11:56:26', '2025-11-27 11:56:26'),
(39, 2025112713, '2025-11-27', 15, 0, 1, NULL, 1, '2025-11-27 11:56:26', '2025-11-27 11:56:26'),
(40, 2025112713, '2025-11-27', 16, 0, 1, NULL, 1, '2025-11-27 11:56:27', '2025-11-27 11:56:27'),
(41, 0, '2025-11-29', 6, 6, 0, 'Stock In', 0, '2025-11-29 05:31:16', '2025-11-29 05:31:16'),
(42, 0, '2025-11-29', 1, 1, 0, 'Stock In', 0, '2025-11-29 05:46:18', '2025-11-29 05:46:18'),
(43, 0, '2025-11-29', 2, 2, 0, 'Stock In', 3, '2025-11-29 05:47:55', '2025-11-29 05:47:55');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bank_details_account_number_unique` (`account_number`);

--
-- Indexes for table `bank_transection_details`
--
ALTER TABLE `bank_transection_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_transection_details_bank_id_foreign` (`bank_id`),
  ADD KEY `bank_transection_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `due_collections`
--
ALTER TABLE `due_collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `due_collections_member_id_foreign` (`member_id`),
  ADD KEY `due_collections_user_id_foreign` (`user_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_category_id_foreign` (`category_id`),
  ADD KEY `expenses_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expense_categories_name_unique` (`name`);

--
-- Indexes for table `expense_subcategories`
--
ALTER TABLE `expense_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `food_sku_unique` (`sku`),
  ADD KEY `food_category_id_foreign` (`category_id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_category_id_foreign` (`category_id`),
  ADD KEY `incomes_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `incomes_user_id_foreign` (`user_id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `income_categories_name_unique` (`name`);

--
-- Indexes for table `income_sub_categories`
--
ALTER TABLE `income_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `memberships_email_unique` (`email`),
  ADD UNIQUE KEY `memberships_phone_unique` (`phone`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_reg_unique` (`reg`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_name_unique` (`name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stock_details`
--
ALTER TABLE `product_stock_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_stock_details_user_id_foreign` (`user_id`),
  ADD KEY `product_stock_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_foodid_foreign` (`foodId`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_transection_details`
--
ALTER TABLE `bank_transection_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `due_collections`
--
ALTER TABLE `due_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense_subcategories`
--
ALTER TABLE `expense_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `income_sub_categories`
--
ALTER TABLE `income_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_stock_details`
--
ALTER TABLE `product_stock_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_transection_details`
--
ALTER TABLE `bank_transection_details`
  ADD CONSTRAINT `bank_transection_details_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `bank_details` (`id`),
  ADD CONSTRAINT `bank_transection_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `due_collections`
--
ALTER TABLE `due_collections`
  ADD CONSTRAINT `due_collections_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `memberships` (`id`),
  ADD CONSTRAINT `due_collections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `expense_categories` (`id`),
  ADD CONSTRAINT `expenses_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `expense_subcategories` (`id`),
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `expense_subcategories`
--
ALTER TABLE `expense_subcategories`
  ADD CONSTRAINT `expense_subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `expense_categories` (`id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `food_categories` (`id`);

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `income_categories` (`id`),
  ADD CONSTRAINT `incomes_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `income_sub_categories` (`id`),
  ADD CONSTRAINT `incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `income_sub_categories`
--
ALTER TABLE `income_sub_categories`
  ADD CONSTRAINT `income_sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `income_categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `product_stock_details`
--
ALTER TABLE `product_stock_details`
  ADD CONSTRAINT `product_stock_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_stock_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_foodid_foreign` FOREIGN KEY (`foodId`) REFERENCES `food` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
