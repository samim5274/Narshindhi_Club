-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2025 at 10:32 AM
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
(1, 'SAMIM-HosseN', 'admin@admin.com', NULL, NULL, NULL, '$2y$12$R4YF11SvOwmJ1A84m7k8oeVn0hYR2H1LCSmiLwkwM/WJONqdqmSuW', 'user-1763192660.png', '01762164746', 'Dhaka', '2001-12-31', 1, 1, NULL, '2025-11-08 23:12:41', '2025-11-14 13:44:20');

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
(1, 2025112711, '2025-11-27', 1, 1, 1, 250, '2025-11-27 08:34:05', '2025-11-27 08:34:05'),
(2, 2025112711, '2025-11-27', 1, 2, 1, 800, '2025-11-27 08:34:06', '2025-11-27 08:34:06'),
(3, 2025112711, '2025-11-27', 1, 3, 1, 180, '2025-11-27 08:34:07', '2025-11-27 08:34:07'),
(4, 2025112711, '2025-11-27', 1, 4, 1, 350, '2025-11-27 08:34:08', '2025-11-27 08:34:08'),
(5, 2025112712, '2025-11-27', 1, 1, 1, 250, '2025-11-27 08:38:49', '2025-11-27 08:38:49'),
(6, 2025112712, '2025-11-27', 1, 2, 1, 800, '2025-11-27 08:38:50', '2025-11-27 08:38:50'),
(7, 2025112712, '2025-11-27', 1, 3, 1, 180, '2025-11-27 08:38:50', '2025-11-27 08:38:50'),
(8, 2025112712, '2025-11-27', 1, 4, 1, 350, '2025-11-27 08:38:51', '2025-11-27 08:38:51'),
(9, 2025112712, '2025-11-27', 1, 5, 1, 200, '2025-11-27 08:38:52', '2025-11-27 08:38:52'),
(10, 2025112713, '2025-11-27', 1, 1, 1, 250, '2025-11-27 08:45:41', '2025-11-27 08:45:41'),
(11, 2025112713, '2025-11-27', 1, 2, 1, 800, '2025-11-27 08:45:41', '2025-11-27 08:45:41'),
(12, 2025112713, '2025-11-27', 1, 3, 1, 180, '2025-11-27 08:45:42', '2025-11-27 08:45:42'),
(13, 2025112713, '2025-11-27', 1, 4, 1, 350, '2025-11-27 08:45:42', '2025-11-27 08:45:42'),
(14, 2025112713, '2025-11-27', 1, 5, 1, 200, '2025-11-27 08:45:43', '2025-11-27 08:45:43'),
(15, 2025112713, '2025-11-27', 1, 6, 1, 150, '2025-11-27 08:45:43', '2025-11-27 08:45:43');

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
(1, 'Smart Food Restaurant', 'Dhaka, Bangladesh', 'info@smartfood.com', '01712345678', 'https://smartfood.com', '2025-11-27 08:32:57', '2025-11-27 08:32:57');

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
(1, '2025112711', 1, 1580.00, 300.00, 0.00, 1000.00, '2025-11-27', 1, 'N/A', '2025-11-27 08:38:31', '2025-11-27 08:38:31'),
(2, '2025112713', 1, 1930.00, 0.00, 0.00, 1830.00, '2025-11-27', 1, 'N/A', '2025-11-27 08:46:06', '2025-11-27 08:46:06');

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
(1, 'Office', 'Office related expenses', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(2, 'Food', 'Food & Beverages', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(3, 'Travel', 'Travel and transportation', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(4, 'Utilities', 'Electricity, Water, Internet, etc.', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(5, 'Maintenance', 'Repairs & maintenance', '2025-11-27 08:32:57', '2025-11-27 08:32:57');

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
(1, 1, 'Stationery', 'Stationery expense under Office', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(2, 1, 'Software', 'Software expense under Office', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(3, 1, 'Hardware', 'Hardware expense under Office', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(4, 2, 'Snacks', 'Snacks expense under Food', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(5, 2, 'Lunch', 'Lunch expense under Food', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(6, 2, 'Beverages', 'Beverages expense under Food', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(7, 3, 'Taxi', 'Taxi expense under Travel', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(8, 3, 'Bus', 'Bus expense under Travel', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(9, 3, 'Flight', 'Flight expense under Travel', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(10, 4, 'Electricity', 'Electricity expense under Utilities', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(11, 4, 'Water', 'Water expense under Utilities', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(12, 4, 'Internet', 'Internet expense under Utilities', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(13, 4, 'Gas', 'Gas expense under Utilities', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(14, 5, 'Plumbing', 'Plumbing expense under Maintenance', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(15, 5, 'Electrical', 'Electrical expense under Maintenance', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(16, 5, 'Cleaning', 'Cleaning expense under Maintenance', '2025-11-27 08:32:57', '2025-11-27 08:32:57');

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
(1, 'Cheese Burger', 250, 1, 47, 1, 'cheese_burger.jpg', 'Bun, Cheese, Patty, Lettuce, Tomato', '1VW1BAUK', 'Best seller', '2025-11-27 08:32:56', '2025-11-27 08:45:41'),
(2, 'Pepperoni Pizza', 800, 2, 27, 1, 'pepperoni_pizza.jpg', 'Dough, Cheese, Pepperoni, Tomato Sauce', 'CNVWZ8GY', 'Spicy and hot', '2025-11-27 08:32:56', '2025-11-27 08:45:41'),
(3, 'Chicken Sandwich', 180, 3, 37, 1, 'chicken_sandwich.jpg', 'Bread, Chicken, Lettuce, Mayo', 'H0FZLOFR', '', '2025-11-27 08:32:56', '2025-11-27 08:45:42'),
(4, 'Spaghetti Bolognese', 350, 4, 17, 1, 'spaghetti.jpg', 'Spaghetti, Tomato Sauce, Beef', 'YPTYOVSF', '', '2025-11-27 08:32:56', '2025-11-27 08:45:42'),
(5, 'Caesar Salad', 200, 5, 23, 1, 'caesar_salad.jpg', 'Lettuce, Chicken, Caesar Dressing, Croutons', 'NYMYWEHP', '', '2025-11-27 08:32:56', '2025-11-27 08:45:43'),
(6, 'Chocolate Cake', 150, 6, 14, 1, 'chocolate_cake.jpg', 'Flour, Cocoa, Sugar, Eggs, Butter', 'FSGHL2M4', 'Sweet dessert', '2025-11-27 08:32:56', '2025-11-27 08:45:43'),
(7, 'Coca Cola', 60, 7, 100, 1, 'coca_cola.jpg', 'Carbonated Water, Sugar, Flavor', 'HAVGBYEP', '', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(8, 'Grilled Salmon', 900, 8, 10, 1, 'grilled_salmon.jpg', 'Salmon, Lemon, Spices', 'BILQA0AZ', 'Premium dish', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(9, 'BBQ Chicken', 500, 9, 20, 1, 'bbq_chicken.jpg', 'Chicken, BBQ Sauce, Spices', 'YI4V3XVO', '', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(10, 'Pancakes', 120, 10, 30, 1, 'pancakes.jpg', 'Flour, Eggs, Milk, Sugar, Butter', 'YFVKBNYR', 'Breakfast special', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(11, 'Veggie Burger', 220, 1, 40, 1, 'veggie_burger.jpg', 'Bun, Veg Patty, Lettuce, Tomato, Cheese', 'ZM2I7ARK', '', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(12, 'Margherita Pizza', 700, 2, 25, 1, 'margherita_pizza.jpg', 'Dough, Tomato Sauce, Cheese, Basil', 'JDJSH01E', '', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(13, 'Tuna Sandwich', 200, 3, 35, 1, 'tuna_sandwich.jpg', 'Bread, Tuna, Lettuce, Mayo', 'F0UARSJ7', '', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(14, 'Fettuccine Alfredo', 380, 4, 20, 1, 'fettuccine_alfredo.jpg', 'Fettuccine, Cream, Cheese, Butter', 'RIIJBNDV', '', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(15, 'Greek Salad', 210, 5, 30, 1, 'greek_salad.jpg', 'Lettuce, Feta, Olive, Tomato, Cucumber', 'XP7UDPDU', '', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(16, 'Vanilla Cake', 140, 6, 20, 1, 'vanilla_cake.jpg', 'Flour, Sugar, Eggs, Butter, Vanilla', '51OA53NO', '', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(17, 'Orange Juice', 70, 7, 80, 1, 'orange_juice.jpg', 'Orange, Water, Sugar', 'K8TP7FED', '', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(18, 'Grilled Chicken', 550, 9, 25, 1, 'grilled_chicken.jpg', 'Chicken, Herbs, Spices', 'PA2M2YLN', '', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(19, 'Salmon Sushi', 950, 8, 15, 1, 'salmon_sushi.jpg', 'Salmon, Rice, Seaweed', 'CWHVDNIN', 'Premium', '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(20, 'French Toast', 130, 10, 25, 1, 'french_toast.jpg', 'Bread, Eggs, Milk, Sugar, Butter', 'JIEVQWEO', 'Breakfast special', '2025-11-27 08:32:57', '2025-11-27 08:32:57');

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
(1, 'Burgers', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(2, 'Pizza', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(3, 'Sandwiches', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(4, 'Pasta', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(5, 'Salads', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(6, 'Desserts', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(7, 'Beverages', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(8, 'Seafood', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(9, 'Grill', '2025-11-27 08:32:56', '2025-11-27 08:32:56'),
(10, 'Breakfast', '2025-11-27 08:32:56', '2025-11-27 08:32:56');

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
(1, 'SAMIM-HosseN', 'samim@gmail.com', '01762164746', 'Silver', '0', '2025-11-01', '2026-03-31', 1, NULL, '2025-11-25 05:20:12', '2025-11-25 05:20:12'),
(2, 'Fahim Ahmed', 'info@fahim.com', '01762164741', 'Silver', '0', '2025-11-01', '2025-11-30', 1, NULL, '2025-11-25 06:10:03', '2025-11-25 06:10:03');

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
(20, '2025_11_24_161140_create_bank_transection_details_table', 1);

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
(1, '2025-11-27', 1, 2025112711, 1580.00, 17.00, 237.00, 1800.00, 500.00, 1300.00, 0, 1, 'SAMIM-HosseN', '01762164746', 1, '2025-11-27 08:34:25', '2025-11-27 08:38:31'),
(2, '2025-11-27', 1, 2025112712, 1780.00, 0.00, 0.00, 1780.00, 0.00, 1780.00, 0, 1, 'SAMIM-HosseN', '01762164746', 0, '2025-11-27 08:38:56', '2025-11-27 08:38:56'),
(3, '2025-11-27', 1, 2025112713, 1930.00, 0.00, 0.00, 1930.00, 100.00, 1830.00, 0, 1, 'SAMIM-HosseN', '01762164746', 1, '2025-11-27 08:45:47', '2025-11-27 08:46:06');

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
(1, 'Cash', NULL, 1, '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(2, 'Bkash', NULL, 1, '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(3, 'Nagad', NULL, 1, '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(4, 'Rocket', NULL, 1, '2025-11-27 08:32:57', '2025-11-27 08:32:57'),
(5, 'Card', NULL, 1, '2025-11-27 08:32:57', '2025-11-27 08:32:57');

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
(1, 2025112711, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 08:34:05', '2025-11-27 08:34:05'),
(2, 2025112711, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 08:34:06', '2025-11-27 08:34:06'),
(3, 2025112711, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 08:34:07', '2025-11-27 08:34:07'),
(4, 2025112711, '2025-11-27', 4, 0, 1, NULL, 1, '2025-11-27 08:34:08', '2025-11-27 08:34:08'),
(5, 2025112712, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 08:38:49', '2025-11-27 08:38:49'),
(6, 2025112712, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 08:38:50', '2025-11-27 08:38:50'),
(7, 2025112712, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 08:38:50', '2025-11-27 08:38:50'),
(8, 2025112712, '2025-11-27', 4, 0, 1, NULL, 1, '2025-11-27 08:38:51', '2025-11-27 08:38:51'),
(9, 2025112712, '2025-11-27', 5, 0, 1, NULL, 1, '2025-11-27 08:38:52', '2025-11-27 08:38:52'),
(10, 2025112713, '2025-11-27', 1, 0, 1, NULL, 1, '2025-11-27 08:45:41', '2025-11-27 08:45:41'),
(11, 2025112713, '2025-11-27', 2, 0, 1, NULL, 1, '2025-11-27 08:45:41', '2025-11-27 08:45:41'),
(12, 2025112713, '2025-11-27', 3, 0, 1, NULL, 1, '2025-11-27 08:45:42', '2025-11-27 08:45:42'),
(13, 2025112713, '2025-11-27', 4, 0, 1, NULL, 1, '2025-11-27 08:45:42', '2025-11-27 08:45:42'),
(14, 2025112713, '2025-11-27', 5, 0, 1, NULL, 1, '2025-11-27 08:45:43', '2025-11-27 08:45:43'),
(15, 2025112713, '2025-11-27', 6, 0, 1, NULL, 1, '2025-11-27 08:45:43', '2025-11-27 08:45:43');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `due_collections`
--
ALTER TABLE `due_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_foodid_foreign` FOREIGN KEY (`foodId`) REFERENCES `food` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
