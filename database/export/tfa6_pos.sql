-- TFA6 Laravel POS - database export
-- Database: `tfa6_pos` (MySQL / MariaDB, e.g. XAMPP)
-- Generated from the Laravel migrations + seeders in this repository
-- (php artisan migrate --seed). Import in phpMyAdmin: Import > choose this file > Go.
-- Sample user accounts all use the demo password: password

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `tfa6_pos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tfa6_pos`;

-- Drop existing tables so the file can be re-imported
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `migrations`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `password_reset_tokens`;
DROP TABLE IF EXISTS `sessions`;
DROP TABLE IF EXISTS `cache`;
DROP TABLE IF EXISTS `cache_locks`;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `job_batches`;
DROP TABLE IF EXISTS `failed_jobs`;
DROP TABLE IF EXISTS `customers`;
SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
-- Table structure for `migrations` (Laravel migration history)

create table `migrations` (`id` int unsigned not null auto_increment primary key, `migration` varchar(255) not null, `batch` int not null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- --------------------------------------------------------
-- From migration: database/migrations/0001_01_01_000000_create_users_table.php

create table `users` (`id` bigint unsigned not null auto_increment primary key, `username` varchar(50) not null, `full_name` varchar(255) not null, `email` varchar(255) not null, `role` enum('Administrator', 'Store Manager', 'Cashier', 'Inventory Clerk') not null default 'Cashier', `status` enum('Active', 'Inactive') not null default 'Active', `last_login_at` timestamp null, `email_verified_at` timestamp null, `password` varchar(255) not null, `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `users` add unique `users_username_unique`(`username`);
alter table `users` add unique `users_email_unique`(`email`);
create table `password_reset_tokens` (`email` varchar(255) not null, `token` varchar(255) not null, `created_at` timestamp null, primary key (`email`)) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `sessions` (`id` varchar(255) not null, `user_id` bigint unsigned null, `ip_address` varchar(45) null, `user_agent` text null, `payload` longtext not null, `last_activity` int not null, primary key (`id`)) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `sessions` add index `sessions_user_id_index`(`user_id`);
alter table `sessions` add index `sessions_last_activity_index`(`last_activity`);

-- --------------------------------------------------------
-- From migration: database/migrations/0001_01_01_000001_create_cache_table.php

create table `cache` (`key` varchar(255) not null, `value` mediumtext not null, `expiration` int not null, primary key (`key`)) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `cache` add index `cache_expiration_index`(`expiration`);
create table `cache_locks` (`key` varchar(255) not null, `owner` varchar(255) not null, `expiration` int not null, primary key (`key`)) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `cache_locks` add index `cache_locks_expiration_index`(`expiration`);

-- --------------------------------------------------------
-- From migration: database/migrations/0001_01_01_000002_create_jobs_table.php

create table `jobs` (`id` bigint unsigned not null auto_increment primary key, `queue` varchar(255) not null, `payload` longtext not null, `attempts` tinyint unsigned not null, `reserved_at` int unsigned null, `available_at` int unsigned not null, `created_at` int unsigned not null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `jobs` add index `jobs_queue_index`(`queue`);
create table `job_batches` (`id` varchar(255) not null, `name` varchar(255) not null, `total_jobs` int not null, `pending_jobs` int not null, `failed_jobs` int not null, `failed_job_ids` longtext not null, `options` mediumtext null, `cancelled_at` int null, `created_at` int not null, `finished_at` int null, primary key (`id`)) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `failed_jobs` (`id` bigint unsigned not null auto_increment primary key, `uuid` varchar(255) not null, `connection` text not null, `queue` text not null, `payload` longtext not null, `exception` longtext not null, `failed_at` timestamp not null default CURRENT_TIMESTAMP) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `failed_jobs` add unique `failed_jobs_uuid_unique`(`uuid`);

-- --------------------------------------------------------
-- From migration: database/migrations/2026_10_20_142106_create_customers_table.php

create table `customers` (`id` bigint unsigned not null auto_increment primary key, `code` varchar(20) not null, `full_name` varchar(255) not null, `email` varchar(255) not null, `phone` varchar(20) not null, `city` varchar(100) not null, `tier` enum('Regular', 'Silver', 'Gold') not null default 'Regular', `points` int unsigned not null default '0', `status` enum('Active', 'Inactive') not null default 'Active', `joined` date not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `customers` add unique `customers_code_unique`(`code`);
alter table `customers` add unique `customers_email_unique`(`email`);

-- --------------------------------------------------------
-- Seeded data

-- Data for table `migrations`
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_20_142106_create_customers_table', 1);

-- Data for table `users`
INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `role`, `status`, `last_login_at`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kyle Pingol', 'kpingol', 'kyle.pingol@example.com', 'Administrator', 'Active', '2026-10-20 08:15:00', NULL, '$2y$12$S9KAVoVqAeXnF8MIfUmWN.mbjlhpTFNloUMd.tlIuB0/GbxyyiNja', NULL, '2026-10-20 14:29:12', '2026-10-20 14:29:12'),
(2, 'Andrea Lim', 'alim', 'andrea.lim@example.com', 'Store Manager', 'Active', '2026-10-20 07:58:00', NULL, '$2y$12$vQh5eE4YNJcZtyegX98Ix.diV4OTVZnnJ3va2hSgaWWBfZGC5wSmy', NULL, '2026-10-20 14:29:12', '2026-10-20 14:29:12'),
(3, 'Joshua Ramos', 'jramos', 'joshua.ramos@example.com', 'Cashier', 'Active', '2026-10-19 18:42:00', NULL, '$2y$12$cjz1QboeVHzspVKxKy0oJOhznyj4D9UIfQIcwK62q2cYyMwEiHfwO', NULL, '2026-10-20 14:29:12', '2026-10-20 14:29:12'),
(4, 'Kristine Navarro', 'knavarro', 'kristine.navarro@example.com', 'Cashier', 'Active', '2026-10-19 13:05:00', NULL, '$2y$12$PEfg8FYldQKIj2oUsIfYXegUvhRPTFr0Vkz2GCsj2b92FpMR0iwWO', NULL, '2026-10-20 14:29:12', '2026-10-20 14:29:12'),
(5, 'Daniel Aquino', 'daquino', 'daniel.aquino@example.com', 'Inventory Clerk', 'Active', '2026-10-18 16:30:00', NULL, '$2y$12$LWObqSfegqBhPwBKSqcvkOZBtNX/I94VhAkYUXk/LbvvAIhvdiZIy', NULL, '2026-10-20 14:29:13', '2026-10-20 14:29:13'),
(6, 'Patricia Cruz', 'pcruz', 'patricia.cruz@example.com', 'Cashier', 'Inactive', '2026-09-30 11:12:00', NULL, '$2y$12$06dzcu7vcBQk7Od3A0LYMeKizHsvTJzWVmaZLOuboYUuGzt3Livym', NULL, '2026-10-20 14:29:13', '2026-10-20 14:29:13');

-- Data for table `customers`
INSERT INTO `customers` (`id`, `code`, `full_name`, `email`, `phone`, `city`, `tier`, `points`, `status`, `joined`, `created_at`, `updated_at`) VALUES
(1, 'CUS-0001', 'Maria Santos', 'maria.santos@example.com', '0917 555 0101', 'Quezon City', 'Gold', 2450, 'Active', '2025-01-14', '2026-10-20 14:29:13', '2026-10-20 14:29:13'),
(2, 'CUS-0002', 'Juan Dela Cruz', 'juan.delacruz@example.com', '0918 555 0102', 'Manila', 'Silver', 1180, 'Active', '2025-03-02', '2026-10-20 14:29:13', '2026-10-20 14:29:13'),
(3, 'CUS-0003', 'Angela Reyes', 'angela.reyes@example.com', '0919 555 0103', 'Makati City', 'Regular', 320, 'Active', '2025-06-21', '2026-10-20 14:29:13', '2026-10-20 14:29:13'),
(4, 'CUS-0004', 'Paolo Garcia', 'paolo.garcia@example.com', '0920 555 0104', 'Taguig City', 'Gold', 3105, 'Active', '2024-11-08', '2026-10-20 14:29:13', '2026-10-20 14:29:13'),
(5, 'CUS-0005', 'Bea Mendoza', 'bea.mendoza@example.com', '0921 555 0105', 'Pasig City', 'Silver', 875, 'Inactive', '2025-02-27', '2026-10-20 14:29:13', '2026-10-20 14:29:13'),
(6, 'CUS-0006', 'Carlo Bautista', 'carlo.bautista@example.com', '0922 555 0106', 'Caloocan City', 'Regular', 140, 'Active', '2025-09-05', '2026-10-20 14:29:13', '2026-10-20 14:29:13');

COMMIT;
