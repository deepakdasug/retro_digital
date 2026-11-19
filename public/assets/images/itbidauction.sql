-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2026 at 05:01 PM
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
-- Database: `itbidauction`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lot_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `module_type` varchar(50) NOT NULL DEFAULT 'general',
  `auction_type` varchar(255) NOT NULL DEFAULT 'forward',
  `transaction_routes` longtext DEFAULT NULL,
  `starting_price` decimal(12,2) NOT NULL,
  `reserve_price` decimal(12,2) DEFAULT NULL,
  `buy_now_price` decimal(12,2) DEFAULT NULL,
  `bid_increment` decimal(10,2) NOT NULL DEFAULT 10.00,
  `current_bid` decimal(12,2) DEFAULT NULL,
  `total_bids` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `condition_grade` varchar(255) DEFAULT NULL,
  `lifecycle_condition` varchar(100) DEFAULT 'Used',
  `compliance_standards` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `upload_list` varchar(255) DEFAULT NULL,
  `upload_list_name` varchar(255) DEFAULT NULL,
  `specifications` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint(20) UNSIGNED DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `lot_number`, `title`, `slug`, `category_id`, `category_name`, `seller_id`, `buyer_id`, `created_by`, `module_type`, `auction_type`, `transaction_routes`, `starting_price`, `reserve_price`, `buy_now_price`, `bid_increment`, `current_bid`, `total_bids`, `quantity`, `condition_grade`, `lifecycle_condition`, `compliance_standards`, `location`, `start_date`, `end_date`, `featured_image`, `description`, `upload_list`, `upload_list_name`, `specifications`, `terms`, `status`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `rejection_reason`, `is_featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BAT-DELL-R730-881', 'Pallet of Dell PowerEdge R730 Enterprise Servers', 'pallet-of-dell-poweredge-r730-enterprise-servers', 1, 'Servers & Blade Infrastructure', 3, NULL, 1, 'general', 'forward', '[\"buy_now\",\"forward\"]', 8400.00, 10000.00, 12000.00, 200.00, 8400.00, 3, 15, 'Grade A', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-08-30 10:11:27', '2026-09-07 10:11:27', 'auctions/auction-pallet-of-dell-poweredge-r730-enterprise-servers-1788190010.jpg', 'Complete rack-mountable units pulled from Chicago data center. Xeon E5-2680v4, 128GB RAM, dual 750W PSUs with rack rails included.', NULL, NULL, 'Processors: 2x Intel Xeon E5-2680 v4 (14-Core, 2.40GHz)\nMemory: 128GB DDR4 ECC Registered\nBays: 8x 2.5\" SFF with caddies\nPSU: Dual 750W Hot-Plug Platinum', 'Free freight palletizing directly to loading dock. 30-day hardware replacement warranty.', 'ended', NULL, NULL, NULL, NULL, NULL, 1, '2026-08-27 14:37:18', '2026-09-18 07:29:36', NULL),
(2, 'BAT-CSCO-9300-883', 'Cisco Catalyst 9300 48-Port PoE+ Network Switches', 'cisco-catalyst-9300-48-port-poe-network-switches', 2, 'Enterprise Networking', 3, NULL, 1, 'general', 'forward', '[\"buy_now\",\"forward\"]', 6000.00, 7500.00, 9000.00, 150.00, 6800.00, 5, 20, 'Grade A+', 'Used', '[\"e-Stewards Verified\",\"R2v3\",\"R2v3 Verified\",\"e-Stewards\"]', 'Boston Logistics Depot', '2026-08-30 10:11:27', '2026-09-07 10:11:27', 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=600', 'Fully factory refurbished, reset to default firmware. Includes rack ears, power cords, and factory packaging.', NULL, NULL, 'Ports: 48x 10/100/1000 PoE+\nUplink: Network Module 4x 10G SFP+\nPower: Dual 715W AC\nFirmware: Cisco IOS-XE 17.06.05', 'Full port test logs provided. Guaranteed zero bad ports.', 'ended', NULL, NULL, NULL, NULL, NULL, 1, '2026-08-27 14:37:18', '2026-09-18 07:29:36', NULL),
(3, 'BAT-APPL-M1-402', 'Corporate Fleet: Apple MacBook Pro 13\" (M1 16GB / 512GB)', 'corporate-fleet-apple-macbook-pro-13-m1-16gb-512gb', 3, 'Laptops & Workstations', 3, NULL, 1, 'general', 'buy_now', '[\"buy_now\",\"forward\"]', 22000.00, 24000.00, 24750.00, 250.00, 22000.00, 0, 45, 'Grade B', 'Used', '[\"R2v3 Certified\"]', 'Dallas ITAD Facility', '2026-08-27 02:37:18', '2026-09-01 14:37:18', 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=600', 'Clean enterprise off-lease laptops. Minor casing scuffs, screens 100% flawless. Battery health > 88%. Genuine chargers included.', NULL, NULL, 'Processor: Apple M1 (8-Core CPU / 8-Core GPU)\nMemory: 16GB Unified Memory\nStorage: 512GB NVMe SSD\nColor: Space Gray', 'Blancco data sanitization report included for every unit.', 'ended', NULL, NULL, NULL, NULL, NULL, 0, '2026-08-27 14:37:18', '2026-09-18 07:29:36', NULL),
(6, 'REV-202608-FWKQ', 'testing for reverse auction ', 'testing-for-reverse-auction', 3, 'Laptops', NULL, 2, 2, 'general', 'reverse', NULL, 22000.00, NULL, NULL, 25.00, 22000.00, 0, 150, 'Grade B+', 'Used', '[\"R2v3 Mandatory\",\"e-Stewards Preferred\"]', 'Buyer Logistics Receiving Dock', '2026-08-31 12:15:22', '2026-09-07 12:15:22', NULL, 'adsfasd asdf adsf dsfaf ', NULL, NULL, NULL, NULL, 'approved', 1, '2026-08-31 12:16:26', NULL, NULL, NULL, 0, '2026-08-31 12:15:22', '2026-08-31 12:16:26', NULL),
(17, 'WTB-202609-S7BJ', '12334 laptop and server ', '12334-laptop-and-server', 1, 'Servers & Blade Infrastructure', NULL, 2, 2, 'wanted_board', 'wanted_board', NULL, 12.00, NULL, 12.00, 1.00, 12.00, 0, 100, 'Grade B', 'Procurement Sourcing', '[\"R2v3 Preferred\",\"Tested Working\"]', 'Buyer Logistics Hub', '2026-09-01 15:28:20', '2026-10-01 15:28:20', NULL, 'asdfas dadsf ', NULL, NULL, 'asdfas dadsf ', NULL, 'approved', 1, '2026-09-01 15:28:28', NULL, NULL, NULL, 0, '2026-09-01 15:28:20', '2026-09-01 15:28:28', NULL),
(22, 'AUC-202609-BYQ2', '495839 dsfalsdjf', '495839-dsfalsdjf', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'general', 'forward', '[\"buy_now\"]', 454.00, NULL, 1345.00, 10.00, NULL, 0, 1, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-09-08 15:11:00', '2026-09-10 03:09:00', 'auctions/seller-lot-495839-dsfalsdjf-1788468067.png', 'asdfads fasdf adsf asd', NULL, NULL, NULL, NULL, 'ended', 1, '2026-09-03 15:11:24', NULL, NULL, NULL, 0, '2026-09-03 15:11:07', '2026-09-24 09:04:24', NULL),
(23, 'AUC-202609-SF5V', '17000 server and RAM', '17000-server-and-ram', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'general', 'forward', '[\"forward\",\"buy_now\"]', 33.00, 33.00, 5000.00, 25.00, 33.00, 0, 1, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-09-22 00:43:00', '2026-10-02 00:43:00', 'auctions/MT6zXKqaiF1afFLcgm2VjyhAXSWno8VIuckTelAM.webp', 'asdf adfa sdf asdfasd f', NULL, NULL, NULL, NULL, 'ended', 1, '2026-09-10 12:45:15', NULL, NULL, NULL, 0, '2026-09-10 12:43:54', '2026-10-05 07:44:17', NULL),
(24, 'AUC-202609-D2UU', '9000 solar panel', '9000-solar-panel', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'general', 'forward', '[\"forward\"]', 33.00, NULL, NULL, 10.00, 34.00, 1, 1, 'Grade A+', 'Used', '[\"R2v3 Verified\"]', 'Chicago Data Center Hub', '2026-09-23 01:27:00', '2026-09-30 04:29:00', 'auctions/bB6MSKvzbINBXhSUIocU96Y5WvACcsjuISjz6puT.webp', '9000 solar panel 9000 solar panel 9000 solar panel', NULL, NULL, NULL, NULL, 'ended', 1, '2026-09-10 13:28:27', NULL, NULL, NULL, 1, '2026-09-10 13:27:57', '2026-09-30 07:09:01', NULL),
(25, 'AUC-202609-EV18', 'Dell PowerEdge R740 2U Rack Servers – Enterprise Fleet', 'dell-poweredge-r740-2u-rack-servers-enterprise-fleet', 3, 'Laptops & Workstations', 3, NULL, 3, 'general', 'forward', '[\"forward\"]', 4500.00, 4500.00, NULL, 100.00, 4500.00, 0, 10, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-09-23 09:33:00', '2026-09-30 09:33:00', 'auctions/seller-lot-dell-poweredge-r740-2u-rack-servers-enterprise-fleet-20260923151352-fbpqg.jpg', 'Refurbished enterprise servers removed from a corporate data center. Units have been inspected, powered on, and tested. Includes Dell rails and power cables. Minor cosmetic wear may be present.', NULL, NULL, '2× Intel Xeon Silver 4114, 64GB DDR4 RAM, 2× 480GB SSD, Dual 10GbE networking, Dual 750W PSUs, RAID controller included.\n', 'Buyer responsible for freight. Pickup available. 30-day limited hardware warranty. Payment due within 5 business days.', 'ended', 1, '2026-09-23 11:49:49', NULL, NULL, NULL, 0, '2026-09-23 09:43:52', '2026-09-30 12:07:20', NULL),
(26, 'AUC-202609-QYJW', 'Cisco Catalyst 9300 Network Switches – Data Center Upgrade Lot', 'cisco-catalyst-9300-network-switches-data-center-upgrade-lot', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'general', 'forward', '[\"forward\"]', 7500.00, 7500.00, NULL, 250.00, 7500.00, 1, 25, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-09-24 09:45:00', '2026-10-10 04:30:00', 'auctions/seller-lot-cisco-catalyst-9300-network-switches-data-center-upgrade-lot-20260923152119-o7a2c.jpg', 'Corporate network equipment from a completed infrastructure upgrade. All units have been visually inspected and powered on. Serial numbers and asset records available to approved buyers.', NULL, NULL, 'Cisco Catalyst C9300-48P, 48× Gigabit Ethernet ports, PoE+, 4× 10G uplink ports, network modules included, AC power supplies included.', 'FOB warehouse. Buyer responsible for shipping and insurance. 14-day DOA warranty. Payment before dispatch.', 'ended', 1, '2026-09-23 11:49:44', NULL, NULL, NULL, 0, '2026-09-23 09:51:19', '2026-10-12 06:58:43', NULL),
(27, 'AUC-202609-CXHY', 'NetApp AFF A300 Storage Array – Enterprise Storage Lot', 'netapp-aff-a300-storage-array-enterprise-storage-lot', 4, 'SAN / NAS Storage Arrays', 3, NULL, 3, 'general', 'forward', '[\"forward\"]', 8000.00, 8000.00, NULL, 250.00, 20250.00, 10, 3, 'Grade A+', 'Used', '[\"ISO 14001\",\"R2v3 Verified\"]', 'Chicago Data Center Hub', '2026-09-28 13:52:00', '2026-09-28 14:23:00', 'auctions/sYFjuMVwzhe2s4U1N8pesYVuJpKLODskPtfVZ3k3.jpg', 'Enterprise storage system decommissioned during a storage refresh. Equipment has undergone visual inspection and functional boot testing. Drives and controllers included as listed in the manifest.\n', NULL, NULL, 'NetApp AFF A300, dual controllers, 24× 1.92TB SSDs, 10GbE connectivity, redundant power supplies, rack-mount hardware included.\n', 'Freight available at buyer\'s expense. Warehouse pickup available by appointment. 30-day limited warranty on controllers and power supplies.', 'ended', 1, '2026-09-23 11:49:33', NULL, NULL, NULL, 0, '2026-09-23 09:57:37', '2026-09-28 14:23:05', NULL),
(29, 'AUC-202609-HBAA', 'Cisco Catalyst 9300 Network Switches – Refurbished Lot', 'cisco-catalyst-9300-network-switches-refurbished-lot', 3, 'Laptops & Workstations', 3, NULL, 3, 'general', 'forward', '[\"forward\",\"buy_now\"]', 7500.00, 7500.00, 10000.00, 25.00, 7600.00, 5, 25, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-09-28 14:16:00', '2026-09-28 14:27:00', 'auctions/seller-lot-cisco-catalyst-9300-network-switches-refurbished-lot-20260928195132-i3jwz.jpg', 'Lot contains 25 Cisco Catalyst 9300 series managed switches. Units were removed from an enterprise network refresh program. Each unit has been visually inspected and powered on.', NULL, NULL, 'Cisco Catalyst 9300, 48-port Gigabit Ethernet, PoE+, 4x 10G uplink support, rack-mountable. Mixed IOS-XE versions. Serial numbers available in manifest.', 'FOB warehouse. Buyer responsible for freight. 30-day DOA warranty. Packaging included.', 'ended', 1, '2026-09-28 14:22:58', NULL, NULL, NULL, 0, '2026-09-28 14:21:32', '2026-09-28 14:27:14', NULL),
(30, 'AUC-202609-MA5A', 'Dell Latitude 5420 Business Laptop Clearance Lot – 80 Units', 'dell-latitude-5420-business-laptop-clearance-lot-80-units', 3, 'Laptops & Workstations', 7, NULL, 7, 'general', 'forward', '[\"forward\"]', 12000.00, 12000.00, NULL, 500.00, 13500.00, 4, 80, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-09-28 14:30:00', '2026-09-29 14:09:00', 'auctions/seller-lot-dell-latitude-5420-business-laptop-clearance-lot-80-units-20260928201012-0hk3f.jpg', 'Bulk lot of Dell Latitude 5420 business laptops sourced from corporate IT asset retirement. Devices have been data-wiped and inspected. Cosmetic condition varies between Grade A and B.', NULL, NULL, 'Intel Core i5-1145G7, 16GB DDR4 RAM, 256GB SSD, 14-inch FHD display, Wi-Fi, Bluetooth, integrated graphics. Chargers included for approximately 90% of units.', 'Sold as a complete lot. Buyer responsible for shipping and import duties where applicable. 14-day functional warranty.', 'ended', 1, '2026-09-28 14:40:43', NULL, NULL, NULL, 0, '2026-09-28 14:40:12', '2026-09-29 14:09:07', NULL),
(31, 'AUC-202609-5ARY', 'NetApp Enterprise Storage Array – Mixed Controller & Disk Lot', 'netapp-enterprise-storage-array-mixed-controller-disk-lot', 1, 'Servers & Blade Infrastructure', 8, NULL, 8, 'general', 'forward', '[\"forward\"]', 3500.00, 3500.00, NULL, 25.00, 3500.00, 0, 12, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-10-10 08:53:00', '2026-10-13 17:53:00', NULL, 'Enterprise storage equipment recovered from a decommissioned data center. Lot includes storage controllers, disk shelves, HDDs and associated rack components. Exact disk configuration provided in attached manifest.', NULL, NULL, 'NetApp FAS series storage equipment, dual-controller configuration, mixed SAS HDDs, disk shelves, rack-mount hardware. Equipment sold based on manifest; batteries and some accessories may require replacement.', 'Sold as-is, where-is. Buyer responsible for inspection, freight, installation and refurbishment. No operational warranty.', 'ended', 1, '2026-09-28 14:55:13', NULL, NULL, NULL, 0, '2026-09-28 14:54:54', '2026-10-16 15:03:47', NULL),
(32, 'AUC-202609-XWSR', 'Test', 'test-2', 1, 'Servers & Blade Infrastructure', 8, NULL, 8, 'general', 'forward', '[\"forward\"]', 1200.00, 1200.00, NULL, 25.00, 1200.00, 0, 1, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', 'Chicago Data Center Hub', '2026-09-29 07:50:00', '2026-10-06 07:50:00', NULL, 'TestTestTestTestTestTestTestTest', NULL, NULL, 'TestTestTestTestTestTest', NULL, 'rejected', NULL, NULL, 1, '2026-09-29 07:51:54', 'Test', 0, '2026-09-29 07:51:11', '2026-09-29 07:51:54', NULL),
(33, 'AUC-202609-W79F', 'Test11:17pm30-09', 'test1117pm30-09', 6, 'Circuit Scrap & Materials', 3, NULL, 3, 'general', 'forward', '[\"forward\",\"buy_now\"]', 14000.00, 14000.00, 15000.00, 400.00, 14000.00, 0, 1, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', NULL, '2026-10-19 07:04:14', '2026-10-26 07:04:14', 'auctions/seller-lot-test1117pm30-09-20260930174819-oyihf.png', 'vTest11:17pm30-09Test11:17pm30-09Test11:17pm30-09', NULL, NULL, 'Test11:17pm30-09Test11:17pm30-09Test11:17pm30-09', 'Test11:17pm30-09Test11:17pm30-09Test11:17pm30-09', 'ended', 1, '2026-10-19 07:04:14', NULL, NULL, NULL, 0, '2026-09-30 12:18:19', '2026-10-26 07:43:24', NULL),
(34, 'AUC-202610-FWOS', 'IT Enterprise Hardware', 'it-enterprise-hardware', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'general', 'forward', '[\"forward\"]', 3500.00, 3500.00, NULL, 100.00, 3500.00, 0, 20, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', NULL, '2026-10-21 06:54:00', '2026-10-26 06:54:00', 'auctions/seller-lot-it-enterprise-hardware-20261019123936-feoda.png', 'Lot of 20 Dell PowerEdge R730 servers decommissioned from a Tier 3 data center. Tested and functioning. Sold as a single pallet. Includes rails and bezels for most units. Minor cosmetic scratches on chassis.', NULL, NULL, ' 2x Intel Xeon E5-2680 v4 CPUs, 128GB DDR4 RAM, No HDDs (caddies included), Dual 750W Power Supplies, iDRAC Enterprise.\n\n', 'Freight LTL shipping only (buyer arranges). No returns accepted. Palletized and shrink-wrapped.', 'ended', 1, '2026-10-19 07:16:08', NULL, NULL, NULL, 0, '2026-10-19 07:06:20', '2026-10-26 07:43:24', NULL),
(35, 'AUC-202610-LH0L', 'Networking Equipment', 'networking-equipment', 2, 'Enterprise Networking', 3, NULL, 3, 'general', 'forward', '[\"forward\",\"buy_now\"]', 1500.00, 1500.00, 2800.00, 25.00, 3075.00, 4, 1, 'Grade B', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', NULL, '2026-10-19 07:15:54', '2026-10-24 07:15:54', 'auctions/seller-lot-networking-equipment-20261019124438-oj281.png', ' 10x Cisco Catalyst C9300-48P switches. Pulled from a working environment. All ports tested. Standard IOS-XE installed.', NULL, NULL, '48x PoE+ ports, 4x SFP+ uplinks, 715W AC Power Supply, Stack cables included.', 'Standard ground shipping. 30-day return window for DOA units. Payment via wire transfer only.', 'ended', 1, '2026-10-19 07:15:54', NULL, NULL, NULL, 0, '2026-10-19 07:14:38', '2026-10-24 08:23:35', NULL),
(36, 'AUC-202610-WXQC', '5,000 lbs Mixed Telecom Circuit Boards', '5000-lbs-mixed-telecom-circuit-boards', 6, 'Circuit Scrap & Materials', 3, NULL, 3, 'general', 'rfq', '[\"rfq\"]', 5000.00, NULL, NULL, 25.00, NULL, 0, 1, 'Scrap/Parts', 'Scrap-for-Parts', '[\"ISO 14001\"]', NULL, '2026-10-19 07:18:45', '2026-10-29 07:18:45', NULL, 'Approximately 5,000 lbs of mixed low-to-mid grade telecom circuit boards. Stored in 4 gaylord boxes. Untested, sold strictly for material recovery and refining.', NULL, NULL, 'Mixed metals, mixed plastics, primarily green boards.', 'Buyer must arrange full truckload freight pickup within 7 days of auction close. No warranty, sold as-is, where-is.', 'ended', 1, '2026-10-19 07:18:45', NULL, NULL, NULL, 0, '2026-10-19 07:17:23', '2026-10-30 01:52:47', NULL),
(37, 'AUC-202610-XDFU', 'IT Enterprise Hardware2', 'it-enterprise-hardware2', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'general', 'forward', '[\"forward\"]', 3500.00, 3500.00, NULL, 99.84, 3500.00, 0, 20, 'Grade A+', 'New', '[\"R2v3 Verified\",\"ISO 14001\"]', NULL, '2026-10-19 14:51:00', '2026-10-19 15:00:00', 'auctions/seller-lot-it-enterprise-hardware2-20261019145329-c21fv.png', ' Lot of 20 Dell PowerEdge R730 servers', NULL, NULL, '2x Intel Xeon E5-2680 v4 CPUs', 'Freight LTL shipping only', 'ended', 1, '2026-10-19 09:24:12', NULL, NULL, NULL, 0, '2026-10-19 09:23:29', '2026-10-20 00:22:11', NULL),
(38, 'AUC-202610-6YA9', 'Test AUction', 'test-auction', 6, 'Circuit Scrap & Materials', 3, NULL, 3, 'general', 'forward', '[\"forward\"]', 999.76, 999.76, NULL, 25.00, 1076.00, 4, 1, 'Grade A+', 'Used', '[\"R2v3 Verified\",\"ISO 14001\"]', NULL, '2026-10-28 03:21:00', '2026-10-28 08:16:00', NULL, 'sewkhrjofjs', NULL, NULL, 'dnakfnsndn', 'd,fnkcn', 'ended', 1, '2026-10-19 10:21:03', NULL, NULL, NULL, 0, '2026-10-19 10:20:45', '2026-10-28 08:16:15', NULL),
(39, 'AUC-202611-RJMWJ', 'NVIDIA DGX A100 640GB AI Supercomputing Node (8x A100 80GB SXM4)', 'nvidia-dgx-a100-640gb-ai-supercomputing-node-8x-a100-80gb-sxm4-fdhs', 7, 'AI Servers & GPU Acceleration', 3, NULL, 1, 'general', 'forward', '[\"forward\",\"buy_now\"]', 45000.00, 55000.00, 75000.00, 500.00, 46000.00, 3, 1, 'Grade A+', 'Used - Data Center Tested', '[\"R2v3 Verified\",\"ISO 14001\",\"e-Stewards Preferred\"]', 'Dallas Equinix IBX Data Center', '2026-11-17 06:43:42', '2026-11-24 08:43:42', NULL, 'Turnkey enterprise AI compute node decommissioned under tier-1 cloud hardware refresh cycle. Equipped with 8x NVIDIA A100 80GB SXM4 GPUs connected via NVSwitch, dual AMD EPYC 7742 64-core processors, 2TB DDR4 ECC RAM, and 30TB NVMe storage. Fully stress-tested with CUDA diagnostics and R2v3 data sanitization certificate included.', NULL, NULL, 'CPU: 2x AMD EPYC 7742 64C/128T\nGPU: 8x NVIDIA A100 80GB SXM4 (640GB HBM2e)\nRAM: 2048 GB DDR4-3200 ECC\nStorage: 4x 7.68TB NVMe U.2 SSDs\nNetworking: 8x Mellanox ConnectX-6 200Gb/s HDR InfiniBand\nPower: 6x 3000W redundant PSUs', 'Free insured crating. Global air-freight available. 60-day replacement warranty on GPU sub-assemblies.', 'live', 1, '2026-11-17 08:43:42', NULL, NULL, NULL, 1, '2026-11-17 08:43:42', '2026-11-17 15:08:49', NULL),
(40, 'AUC-202611-QCES1', 'Fleet Decommission: 20x Cisco Catalyst 9300 48-Port PoE+ Switches (C9300-48P-A)', 'fleet-decommission-20x-cisco-catalyst-9300-48-port-poe-switches-c9300-48p-a-dbuk', 2, 'Enterprise Networking', 3, NULL, 1, 'general', 'forward', '[\"forward\",\"buy_now\"]', 12500.00, 14000.00, 18500.00, 250.00, 12500.00, 0, 20, 'Grade A', 'Corporate Off-Lease', '[\"R2v3 Verified\",\"NIST SP 800-88 Compliant\"]', 'Chicago Logistics Depot Hub', '2026-11-17 06:43:42', '2026-11-24 08:43:42', NULL, 'Lot of 20 Cisco Catalyst 9300-48P switches pulled from an investment bank campus refresh. Each unit includes dual 715W AC power supplies, Network Advantage licenses, and Cisco StackWise-480 kit. Cleared of NVRAM and reset to factory defaults under NIST SP 800-88 guidelines.', NULL, NULL, 'Ports: 48x 10/100/1000 PoE+ (740W power budget)\nUplinks: Modular C9300-NM-8X 10G SFP+ modules included\nStacking: 480 Gbps stacking bandwidth\nAccessories: Dual power supplies, power cords, rack brackets included', 'Palletized and shrink-wrapped. Available for immediate freight dispatch or dock pickup.', 'live', 1, '2026-11-17 08:43:42', NULL, NULL, NULL, 1, '2026-11-17 08:43:42', '2026-11-17 15:08:49', NULL),
(41, 'AUC-202611-I2P17', 'Bulk Lot: 100x Lenovo ThinkPad T14 Gen 3 (Core i7-1265U / 16GB / 512GB NVMe)', 'bulk-lot-100x-lenovo-thinkpad-t14-gen-3-core-i7-1265u-16gb-512gb-nvme-397w', 3, 'Laptops & Workstations', 3, NULL, 1, 'general', 'forward', '[\"forward\",\"buy_now\"]', 28000.00, 32000.00, 38000.00, 500.00, 28000.00, 0, 100, 'Grade A-', 'Refurbished Grade A', '[\"ISO 9001\",\"R2v3 Verified\"]', 'Atlanta Central Facility', '2026-11-17 06:43:42', '2026-11-24 08:43:42', NULL, 'Premium enterprise laptop liquidation. 100 units of Lenovo ThinkPad T14 Gen 3 laptops in outstanding functional and cosmetic condition. Fresh Windows 11 Pro digital licenses attached via motherboard DPK.', NULL, NULL, 'Processor: Intel Core i7-1265U vPro\nMemory: 16GB DDR4 soldered + SO-DIMM\nStorage: 512GB PCIe 4.0 NVMe Opal 2.0\nDisplay: 14.0\" WUXGA (1920x1200) IPS Anti-glare\nBattery health: All units >85% design capacity\nChargers: 65W USB-C authentic Lenovo power adapter included with every unit', 'Standard 30-day DOA return guarantee. Shipped in custom partitioned laptop master cartons on 2 pallets.', 'live', 1, '2026-11-17 08:43:42', NULL, NULL, NULL, 1, '2026-11-17 08:43:42', '2026-11-17 15:08:49', NULL),
(42, 'AUC-202611-409YS', 'NetApp AFF A400 All-Flash SAN Storage Array (24x 7.68TB NVMe SSDs - 184TB Raw)', 'netapp-aff-a400-all-flash-san-storage-array-24x-768tb-nvme-ssds-184tb-raw-3zlh', 4, 'SAN / NAS Storage Arrays', 3, NULL, 1, 'general', 'forward', '[\"forward\",\"buy_now\"]', 22000.00, 26000.00, 34000.00, 500.00, 22000.00, 0, 1, 'Grade A+', 'Pre-Owned Tier-1 Storage', '[\"R2v3 Verified\",\"DoD 5220.22-M Sanitized\"]', 'San Jose Data Center Hub', '2026-11-17 06:43:42', '2026-11-24 08:43:42', NULL, 'Enterprise all-flash array delivering microsecond latency and high IOPS for mission-critical databases and virtualization clusters. Complete with dual active-active controllers, 25GbE optical transceivers, and ONTAP 9.x licensing.', NULL, NULL, 'Raw Capacity: 184.3TB (24x 7.68TB NVMe SSD)\nControllers: Dual HA Controllers w/ 256GB NVRAM\nConnectivity: 8x 25/10GbE SFP28 ports + 4x 100GbE QSFP28 ports\nForm Factor: 4U Rackmount with rail kit', 'Professional crating included. Comprehensive health diagnostics report provided.', 'live', 1, '2026-11-17 08:43:42', NULL, NULL, NULL, 1, '2026-11-17 08:43:42', '2026-11-17 15:08:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auction_bids`
--

CREATE TABLE `auction_bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` enum('winning','outbid','accepted','cancelled') NOT NULL DEFAULT 'winning',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_bids`
--

INSERT INTO `auction_bids` (`id`, `auction_id`, `buyer_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, 2, 34.00, 'winning', '2026-09-23 10:07:14', '2026-09-23 10:07:14'),
(2, 27, 2, 18000.00, 'outbid', '2026-09-25 09:55:42', '2026-09-25 09:55:57'),
(3, 27, 2, 18250.00, 'outbid', '2026-09-25 09:55:57', '2026-09-28 14:13:41'),
(4, 27, 2, 18500.00, 'outbid', '2026-09-28 14:13:41', '2026-09-28 14:14:11'),
(5, 27, 9, 18750.00, 'outbid', '2026-09-28 14:14:11', '2026-09-28 14:14:30'),
(6, 27, 2, 19000.00, 'outbid', '2026-09-28 14:14:30', '2026-09-28 14:14:39'),
(7, 27, 9, 19250.00, 'outbid', '2026-09-28 14:14:39', '2026-09-28 14:14:49'),
(8, 27, 2, 19500.00, 'outbid', '2026-09-28 14:14:49', '2026-09-28 14:14:51'),
(9, 27, 2, 19750.00, 'outbid', '2026-09-28 14:14:51', '2026-09-28 14:14:54'),
(10, 27, 2, 20000.00, 'outbid', '2026-09-28 14:14:54', '2026-09-28 14:15:06'),
(11, 27, 9, 20250.00, 'winning', '2026-09-28 14:15:06', '2026-09-28 14:15:06'),
(12, 29, 2, 7500.00, 'outbid', '2026-09-28 14:23:40', '2026-09-28 14:24:45'),
(13, 29, 9, 7525.00, 'outbid', '2026-09-28 14:24:45', '2026-09-28 14:25:14'),
(14, 29, 2, 7550.00, 'outbid', '2026-09-28 14:25:14', '2026-09-28 14:25:27'),
(15, 29, 2, 7575.00, 'outbid', '2026-09-28 14:25:27', '2026-09-28 14:25:38'),
(16, 29, 9, 7600.00, 'winning', '2026-09-28 14:25:38', '2026-09-28 14:25:38'),
(17, 30, 2, 12000.00, 'outbid', '2026-09-28 14:42:19', '2026-09-28 14:42:37'),
(18, 30, 9, 12500.00, 'outbid', '2026-09-28 14:42:37', '2026-09-28 14:42:57'),
(19, 30, 10, 13000.00, 'outbid', '2026-09-28 14:42:57', '2026-09-28 15:14:49'),
(20, 30, 2, 13500.00, 'winning', '2026-09-28 15:14:49', '2026-09-28 15:14:49'),
(21, 26, 2, 7500.00, 'winning', '2026-10-08 10:02:43', '2026-10-08 10:02:43'),
(22, 35, 2, 3000.00, 'outbid', '2026-10-19 08:24:16', '2026-10-19 08:26:49'),
(23, 35, 10, 3025.00, 'outbid', '2026-10-19 08:26:49', '2026-10-19 08:27:33'),
(24, 35, 9, 3050.00, 'outbid', '2026-10-19 08:27:33', '2026-10-19 08:46:44'),
(25, 35, 10, 3075.00, 'winning', '2026-10-19 08:46:44', '2026-10-19 08:46:44'),
(26, 38, 2, 1000.00, 'outbid', '2026-10-19 10:21:33', '2026-10-19 10:21:38'),
(27, 38, 2, 1025.00, 'outbid', '2026-10-19 10:21:38', '2026-10-19 10:23:29'),
(28, 38, 10, 1051.00, 'outbid', '2026-10-19 10:23:29', '2026-10-28 08:11:57'),
(29, 38, 10, 1076.00, 'winning', '2026-10-28 08:11:57', '2026-10-28 08:11:57'),
(30, 39, 2, 45000.00, 'outbid', '2026-11-17 08:44:06', '2026-11-17 08:45:03'),
(31, 39, 2, 45500.00, 'outbid', '2026-11-17 08:45:03', '2026-11-17 08:45:31'),
(32, 39, 2, 46000.00, 'winning', '2026-11-17 08:45:31', '2026-11-17 08:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `auction_buy_now_purchases`
--

CREATE TABLE `auction_buy_now_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total_amount` decimal(18,2) NOT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending',
  `purchased_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auction_categories`
--

CREATE TABLE `auction_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_categories`
--

INSERT INTO `auction_categories` (`id`, `name`, `slug`, `description`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Servers & Blade Infrastructure', 'servers-infrastructure', 'Enterprise rackmount, blade, and high-density computing servers.', 'las la-server', 'active', '2026-08-27 14:37:18', '2026-08-27 14:37:18'),
(2, 'Enterprise Networking', 'enterprise-networking', 'Managed switches, routers, security appliances, and transceivers.', 'las la-network-wired', 'active', '2026-08-27 14:37:18', '2026-08-27 14:37:18'),
(3, 'Laptops & Workstations', 'laptops-workstations', 'Off-lease corporate laptops, mobile workstations, and mini PCs.', 'las la-laptop', 'active', '2026-08-27 14:37:18', '2026-08-27 14:37:18'),
(4, 'SAN / NAS Storage Arrays', 'storage-arrays', 'High-capacity storage disk shelves, SAS drives, and flash arrays.', 'las la-hdd', 'active', '2026-08-27 14:37:18', '2026-08-27 14:37:18'),
(5, 'Components & Memory', 'components-memory', 'Server ECC RAM, CPUs, RAID controllers, and power supply units.', 'las la-microchip', 'active', '2026-08-27 14:37:18', '2026-08-27 14:37:18'),
(6, 'Circuit Scrap & Materials', 'circuit-scrap', 'Assayed motherboard scrap, precious metal recovery lots, and e-waste.', 'las la-recycle', 'active', '2026-08-27 14:37:18', '2026-08-27 14:37:18'),
(7, 'AI Servers & GPU Acceleration', 'ai-servers-gpu-acceleration', 'High-performance AI, Deep Learning clusters, NVIDIA HGX/DGX and PCIe GPU servers.', NULL, 'active', '2026-11-17 08:43:42', '2026-11-17 08:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `auction_images`
--

CREATE TABLE `auction_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_images`
--

INSERT INTO `auction_images` (`id`, `auction_id`, `path`, `is_featured`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'auctions/auction-pallet-of-dell-poweredge-r730-enterprise-servers-1788190010.jpg', 1, 0, '2026-09-18 07:27:02', '2026-09-18 07:27:02'),
(2, 2, 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=600', 1, 0, '2026-09-18 07:27:02', '2026-09-18 07:27:02'),
(3, 3, 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=600', 1, 0, '2026-09-18 07:27:02', '2026-09-18 07:27:02'),
(5, 22, 'auctions/seller-lot-495839-dsfalsdjf-1788468067.png', 1, 0, '2026-09-18 07:27:02', '2026-09-18 07:27:02'),
(10, 24, 'auctions/images/X3P3HxG2oQjg7aF0zW5GXsdsYFjhcftDOyz5Y2Nw.jpg', 0, 1, '2026-09-22 13:14:10', '2026-09-22 13:14:10'),
(11, 24, 'auctions/bB6MSKvzbINBXhSUIocU96Y5WvACcsjuISjz6puT.webp', 1, 0, '2026-09-22 13:17:32', '2026-09-22 13:17:32'),
(12, 23, 'auctions/MT6zXKqaiF1afFLcgm2VjyhAXSWno8VIuckTelAM.webp', 1, 0, '2026-09-22 13:22:16', '2026-09-22 13:22:16'),
(13, 23, 'auctions/images/ihMYtc6MJrEVUXFVGM0V2liypDCGd8SmVaUV8S5m.webp', 0, 1, '2026-09-22 13:22:16', '2026-09-22 13:22:16'),
(14, 25, 'auctions/seller-lot-dell-poweredge-r740-2u-rack-servers-enterprise-fleet-20260923151352-fbpqg.jpg', 1, 0, '2026-09-23 09:43:52', '2026-09-23 09:43:52'),
(15, 26, 'auctions/seller-lot-cisco-catalyst-9300-network-switches-data-center-upgrade-lot-20260923152119-o7a2c.jpg', 1, 0, '2026-09-23 09:51:19', '2026-09-23 09:51:19'),
(16, 27, 'auctions/sYFjuMVwzhe2s4U1N8pesYVuJpKLODskPtfVZ3k3.jpg', 1, 0, '2026-09-23 12:01:44', '2026-09-23 12:01:44'),
(17, 27, 'auctions/images/hKoOXxh1tbVSjvzSU6PMhd8xNn6AIM11ick02WAm.jpg', 0, 1, '2026-09-23 12:01:44', '2026-09-23 12:01:44'),
(18, 29, 'auctions/seller-lot-cisco-catalyst-9300-network-switches-refurbished-lot-20260928195132-i3jwz.jpg', 1, 0, '2026-09-28 14:21:32', '2026-09-28 14:21:32'),
(19, 30, 'auctions/seller-lot-dell-latitude-5420-business-laptop-clearance-lot-80-units-20260928201012-0hk3f.jpg', 1, 0, '2026-09-28 14:40:12', '2026-09-28 14:40:12'),
(20, 33, 'auctions/seller-lot-test1117pm30-09-20260930174819-oyihf.png', 1, 0, '2026-09-30 12:18:19', '2026-09-30 12:18:19'),
(21, 33, 'auctions/images/seller-auction-image-test1117pm30-09-20260930174859-drfkk.jpg', 0, 1, '2026-09-30 12:18:59', '2026-09-30 12:18:59'),
(22, 26, 'auctions/images/QcbZsgiOSIbb6fBnpZZR2ZMIOQRqYCZOYCGQPHyL.jpg', 0, 1, '2026-10-09 13:56:39', '2026-10-09 13:56:39'),
(23, 26, 'auctions/images/Vtq2lUQHQ60PrSQzVrLi7LfBx4JmwlzCmzukYYZn.jpg', 0, 2, '2026-10-09 13:56:39', '2026-10-09 13:56:39'),
(24, 26, 'auctions/images/b8Ysa2TGC33skrYPRiRJK8G6pqpXqzCjkYHDInXI.jpg', 0, 3, '2026-10-09 13:56:39', '2026-10-09 13:56:39'),
(25, 26, 'auctions/images/vc191nEXbTHqLyJJKADKZwwbCc220XzhbyzrUHtd.jpg', 0, 4, '2026-10-09 13:56:39', '2026-10-09 13:56:39'),
(26, 34, 'auctions/seller-lot-it-enterprise-hardware-20261019123936-feoda.png', 1, 0, '2026-10-19 07:09:36', '2026-10-19 07:09:36'),
(27, 35, 'auctions/seller-lot-networking-equipment-20261019124438-oj281.png', 1, 0, '2026-10-19 07:14:38', '2026-10-19 07:14:38'),
(28, 37, 'auctions/seller-lot-it-enterprise-hardware2-20261019145329-c21fv.png', 1, 0, '2026-10-19 09:23:29', '2026-10-19 09:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `author_id`, `status`, `published_at`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'testing blog', 'testing-blod', 'afadsf asdf asdf ajlkxcvl\';k;lxcvobiopm akj klasd icxjvkbljkiwejrnlmnjljljab\nadsf\na\nsdf', '\n            <a href=\"{{ route(\'about.us\') }}\"\n                class=\"nav-link-custom {{ request()->routeIs(\'about.us\') ? \'active\' : \'\' }}\">\n                About Us\n            </a>\n            <a href=\"{{ route(\'blog.index\') }}\"\n                class=\"nav-link-custom {{ request()->routeIs(\'blog.*\') ? \'active\' : \'\' }}\">\n                Blog\n            </a>\n            <a href=\"{{ route(\'contact.us\') }}\"\n                class=\"nav-link-custom {{ request()->routeIs(\'contact.us\') ? \'active\' : \'\' }}\">\n                Contact Us\n            </a>\n            @auth(\'portal\')\n            <a href=\"{{ route(\'seller.hub\') }}\" id=\"navUploadStockBtn\"\n                class=\"btn btn-primary btn-sm ms-2 d-inline-flex align-items-center gap-2 px-3 py-1 fw-medium\">\n                <i class=\"iconoir-upload fs-14\"></i>\n                <span>Upload Stock</span>\n            </a>\n            @endauth\n        </nav>\nMobile navigation drawer links (7 items) and conditional Upload Stock button:\nhtml\n\n\n            <!-- Mobile Navigation Links -->\n            <nav class=\"d-flex flex-column gap-1 mb-3\">\n                <a href=\"{{ url(\'/\') }}\" class=\"nav-link-custom {{ request()->is(\'/\') ? \'active\' : \'\' }}\">\n                    Browse Lots\n                </a>\n                <a href=\"{{ route(\'reverse.auctions\') }}\"\n                    class=\"nav-link-custom {{ request()->routeIs(\'reverse.auctions\') ? \'active\' : \'\' }}\">\n                    Reverse Auctions\n                </a>\n                <a href=\"{{ route(\'wanted.board\') }}\"\n                    class=\"nav-link-custom {{ request()->routeIs(\'wanted.board\') ? \'active\' : \'\' }}\">\n                    Wanted Board\n                </a>\n                <a href=\"{{ route(\'trade.in\') }}\"\n                    class=\"nav-link-custom {{ request()->routeIs(\'trade.in\') ? \'active\' : \'\' }}\">\n                    ITAD Fleet Trade-In\n                </a>\n                <a href=\"{{ route(\'about.us\') }}\"\n                    class=\"nav-link-custom {{ request()->routeIs(\'about.us\') ? \'active\' : \'\' }}\">\n                    About Us\n                </a>\n                <a href=\"{{ route(\'blog.index\') }}\"\n                    class=\"nav-link-custom {{ request()->routeIs(\'blog.*\') ? \'active\' : \'\' }}\">\n                    Blog\n                </a>\n                <a href=\"{{ route(\'contact.us\') }}\"\n                    class=\"nav-link-custom {{ request()->routeIs(\'contact.us\') ? \'active\' : \'\' }}\">\n                    Contact Us\n                </a>\n            </nav>\n            <div class=\"d-flex flex-column gap-2 pt-2 border-top border-light-subtle\">\n                @auth(\'portal\')\n                <a href=\"{{ route(\'seller.hub\') }}\"\n                    class=\"btn btn-primary btn-sm d-flex align-items-center justify-content-center gap-2 py-2\">\n                    <i class=\"iconoir-upload\"></i>\n                    <span>Upload Stock</span>\n                </a>\n                @php\n                $mobilePortalUser = \\Illuminate\\Support\\Facades\\Auth::guard(\'portal\')->user();\n                $mobileDashboardRoute = $mobilePortalUser?->isSeller()\n                ? route(\'seller.dashboard\')\n                : route(\'buyer.dashboard\');\n                @endphp\n                ...\n                @else\n                <a href=\"{{ route(\'customer.login\') }}\" class=\"btn btn-outline-primary btn-sm py-2 text-center\">\n                    Login\n                </a>\n                <a href=\"{{ route(\'customer.register\') }}\" class=\"btn btn-outline-primary btn-sm py-2 text-center\">\n                    Register\n                </a>\n                @endauth\n            </div>\nB. routes/frontend.php\nphp\n\n\nRoute::get(\'/about-us\', function () {\n    return view(\'frontend/pages/about-us\');\n})->name(\'about.us\');\nRoute::livewire(\'/blog\', \\App\\Livewire\\Frontend\\Blog\\Index::class)\n    ->name(\'blog.index\');\nRoute::livewire(\'/blog/{slug}\', \\App\\Livewire\\Frontend\\Blog\\Show::class)\n    ->name(\'blog.show\');\nRoute::livewire(\'/contact-us\', \\App\\Livewire\\Frontend\\Contact\\Index::class)\n    ->name(\'contact.us\');\nC. routes/web.php\nphp\n\n\n        /*\n        |--------------------------------------------------------------------------\n        | Blogs CMS\n        |--------------------------------------------------------------------------\n        */\n        Route::livewire(\'/blogs\', BlogsIndex::class)->name(\'blogs.index\');\n        Route::livewire(\'/blogs/create\', BlogsCreate::class)->name(\'blogs.create\');\n        Route::livewire(\'/blogs/{blog}/edit\', BlogsEdit::class)->name(\'blogs.edit\');\n        /*\n        |--------------------------------------------------------------------------\n        | Contact Inquiries\n        |--------------------------------------------------------------------------\n        */\n        Route::livewire(\'/contact-inquiries\', ContactInquiriesIndex::class)->name(\'contact-inquiries.index\');\nD. resources/views/admin/common/sidebar.blade.php\nhtml\n\n\n                    <!-- Contact Inquiries -->\n                    <li class=\"nav-item\">\n                        <a class=\"nav-link {{ request()->routeIs(\'admin.contact-inquiries.*\') ? \'active\' : \'\' }}\"\n                            href=\"{{ $safeRoute(\'admin.contact-inquiries.index\') }}\"\n                            @if(\\Illuminate\\Support\\Facades\\Route::has(\'admin.contact-inquiries.index\')) @endif>\n                            <i class=\"iconoir-mail menu-icon\"></i>\n                            <span>Contact Inquiries</span>\n                        </a>\n                    </li>\n                    <!-- Blogs CMS -->\n                    <li class=\"nav-item\">\n                        <a class=\"nav-link {{ request()->routeIs(\'admin.blogs.*\') ? \'active\' : \'\' }}\"\n                            href=\"{{ $safeRoute(\'admin.blogs.index\') }}\"\n                            @if(\\Illuminate\\Support\\Facades\\Route::has(\'admin.blogs.index\')) @endif>\n                            <i class=\"iconoir-newspaper menu-icon\"></i>\n                            <span>Blogs</span>\n                        </a>\n                    </li>\n4. Existing Files & Functionality Intentionally Left Unchanged\nThe following core modules and files were protected with zero breaking changes:\n\nBuyer & Seller Authentication: Login.php, Register.php, and EnsurePortalUser.php continue using guard auth:portal.\nAdmin Authentication & Guards: EnsureInternalUser.php and Spatie permission resolution remain untouched.\nCore Marketplace Workflows:\nindex.blade.php (Browse Lots & Hero NLP search)\nreverse-auctions.blade.php (Reverse RFQ contracts)\nwanted-board.blade.php (WTB broadcast board)\ntrade-in.blade.php (ITAD Fleet disposal workflow)\nseller-hub.blade.php (Stock upload pipeline)\nbuyer-dashboard.blade.php & seller-dashboard.blade.php\nSecurity Center & Verification Dossiers: SecuritySetting, FraudAlert, IntrusionLog, DmClearance, Buyer Show, and Seller Show.\nSupport Tickets Module: tickets and ticket_replies workflows.\n5. Migration & Artisan Commands\nbash\n\n\n# 1. Run database migrations\nC:\\xampp8.2\\php\\php.exe artisan migrate\n# 2. Clear application and view caches\nC:\\xampp8.2\\php\\php.exe artisan optimize:clear\n# 3. Create storage link for public blog images (if not already linked)\nC:\\xampp8.2\\php\\php.exe artisan storage:link\n# 4. Run full test suite\nC:\\xampp8.2\\php\\php.exe artisan test --filter=\"FrontendExtensionsTest|SecurityCenterTest|SupportTicketsTest\"\n6. Verification Results\nAll 20 automated feature tests pass with 69 assertions in 9.77s:\n\ntext\n\n\nPASS  Tests\\Feature\\FrontendExtensionsTest\n✓ guest cannot see upload stock button in header                               0.34s  \n✓ authenticated buyer or seller sees upload stock button                       0.04s  \n✓ about us page loads with required sections                                   0.02s  \n✓ public blog listing only shows published posts                               0.04s  \n✓ public blog detail accessible by slug and blocks drafts                      0.03s  \n✓ admin can create edit and publish blogs                                      0.07s  \n✓ contact form submits and validates successfully                              0.04s  \n✓ admin can view contact inquiries and update status                           0.04s  \n✓ all navigation links resolve with 200 status                                 0.05s  \nPASS  Tests\\Feature\\SecurityCenterTest\n✓ guest cannot access security center                                          0.05s  \n✓ admin can access security center                                             4.66s  \n✓ security settings can be saved                                               0.14s  \n✓ high security mode can be toggled                                            0.10s  \n✓ communication gatekeeper dm clearance                                        0.20s  \n✓ fraud alert can be resolved                                                  0.11s  \nPASS  Tests\\Feature\\SupportTicketsTest\n✓ guest cannot access customer tickets                                         0.08s  \n✓ authenticated buyer can raise ticket                                         0.65s  \n✓ buyer can only view own tickets                                              0.95s  \n✓ customer can reply to ticket                                                 0.12s  \n✓ admin can view tickets and update status                                     1.88s  \nTests:    20 passed (69 assertions)\nDuration: 9.77s', 'blogs/GBH2G52z4DSvAfZIA6wZY4V7FHkAp2tREbHVOJWb.png', 1, 'published', '2026-08-24 18:30:00', 'test adfads', 'fgsdf sg', '2026-08-25 12:28:30', '2026-09-11 07:42:53'),
(2, 'Second blog', 'second', 'Second blog', 'hello second blog', 'blogs/6SqNd6rdsUF9tTGaa9da5meAgPGb2g5Te3iIjTq4.png', 1, 'published', '2026-08-25 18:30:00', 'hello second blog', 'hello second blogdad adsfa dsfa dsfadsfad', '2026-08-25 13:22:34', '2026-09-11 07:43:10'),
(3, 'testing website sdfadf', 'test', 'adafds asdf asd', 'asd fasdf asd', 'blogs/QXr4lRzSIKrMEkmlzm1ThK2fUwqOf617vy3PcBXv.png', 1, 'published', '2026-08-26 18:30:00', 'asd fads', 'ads fasdf ', '2026-08-28 07:53:01', '2026-09-11 07:43:30'),
(4, 'Test', 'testt', NULL, 'Test test test', NULL, 1, 'draft', NULL, NULL, NULL, '2026-09-24 09:43:59', '2026-09-24 09:43:59'),
(5, '2026 Enterprise ITAD Trends: Managing AI Cluster Decommissioning and Circular Hardware Lifecycles', '2026-enterprise-itad-trends-ai-clusters-j6kz', 'As hyperscale AI clusters and high-density GPU servers undergo rapid generational upgrades, enterprise IT asset disposition requires specialized cryogenic data destruction and circular liquidation pathways.', '## The Evolution of Enterprise ITAD in the AI Era\n\nThe explosive proliferation of GPU compute clusters (such as NVIDIA HGX and DGX systems) has fundamentally transformed corporate hardware lifecycles. Rather than traditional 5-year enterprise server refresh cycles, AI accelerators are being upgraded every 18 to 24 months to satisfy training efficiency requirements.\n\n### Critical Compliance Safeguards\n\n1. **Cryptographic Sanitization**: Hardware security modules (HSMs) and NVMe multi-tenant namespaces require NIST SP 800-88 Rev. 1 clear, purge, and destroy protocols.\n2. **R2v3 Certified Environmental Tracking**: Materials must be tracked to final disposition to guarantee zero e-waste landfill outcomes.\n3. **Secondary Market Value Recovery**: Liquidating enterprise server nodes via forward auctions and bulk corporate trading unlocks maximum residual recovery for asset owners.\n\nIT Bid Auction facilitates transparent, verified liquidation between accredited enterprise sellers and qualified global buyers under authenticated KYC protocols.', NULL, NULL, 'published', '2026-11-17 08:43:42', NULL, NULL, '2026-11-17 08:43:42', '2026-11-17 08:43:42');

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
('admin-login:admin@itbidauctions.com|127.0.0.1', 'i:1;', 1794951792),
('admin-login:admin@itbidauctions.com|127.0.0.1:timer', 'i:1794951792;', 1794951792),
('admin-login:manager@itbidauctions.com|127.0.0.1', 'i:2;', 1794931020),
('admin-login:manager@itbidauctions.com|127.0.0.1:timer', 'i:1794931020;', 1794931020),
('auction_marketplace_lifecycle_sync_lock', 'b:1;', 1794947989),
('captcha_3107959ebffa3390b0a68553b3aded9c', 'a:6:{i:0;s:1:\"h\";i:1;s:1:\"l\";i:2;s:1:\"7\";i:3;s:1:\"2\";i:4;s:1:\"x\";i:5;s:1:\"r\";}', 1794926072),
('captcha_3f7793bb85ba788f51b95ebcb7a95420', 'a:6:{i:0;s:1:\"k\";i:1;s:1:\"x\";i:2;s:1:\"i\";i:3;s:1:\"z\";i:4;s:1:\"e\";i:5;s:1:\"d\";}', 1794926084),
('captcha_9035e9164ae9aa422186e2b0464a1125', 'a:6:{i:0;s:1:\"t\";i:1;s:1:\"f\";i:2;s:1:\"2\";i:3;s:1:\"f\";i:4;s:1:\"b\";i:5;s:1:\"v\";}', 1794923863),
('captcha_bff635d9659dacbe6ca4690c662990bc', 'a:6:{i:0;s:1:\"j\";i:1;s:1:\"e\";i:2;s:1:\"m\";i:3;s:1:\"m\";i:4;s:1:\"8\";i:5;s:1:\"a\";}', 1794927644),
('captcha_f146c85465d1a372be4e81df26a95b29', 'a:6:{i:0;s:1:\"h\";i:1;s:1:\"o\";i:2;s:1:\"e\";i:3;s:1:\"o\";i:4;s:1:\"b\";i:5;s:1:\"r\";}', 1794927637),
('login-bot:admin:127.0.0.1', 'i:2;', 1794951312),
('login-bot:admin:127.0.0.1:timer', 'i:1794951312;', 1794951312),
('reverse_auction_lifecycle_sync_lock', 'b:1;', 1794951560),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:24:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:14:\"dashboard.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:19:\"internal-users.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:29:\"internal-users.create-manager\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:33:\"internal-users.create-team-member\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:19:\"internal-users.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:28:\"internal-users.change-status\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:21:\"internal-users.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:10:\"roles.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"roles.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:10:\"roles.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"roles.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:16:\"permissions.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:18:\"permissions.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:16:\"permissions.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:18:\"permissions.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"portal-users.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:20:\"portal-users.approve\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:19:\"portal-users.reject\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:20:\"portal-users.suspend\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:21:\"portal-documents.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:23:\"portal-documents.verify\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:14:\"auction.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:15:\"security.manage\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:13:\"security.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:7:\"Manager\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"Team Member\";s:1:\"c\";s:3:\"web\";}}}', 1795011371);

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
-- Table structure for table `contact_inquiries`
--

CREATE TABLE `contact_inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `interested_in` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('new','in_progress','contacted','closed') NOT NULL DEFAULT 'new',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_inquiries`
--

INSERT INTO `contact_inquiries` (`id`, `name`, `email`, `phone`, `company_name`, `address`, `interested_in`, `message`, `status`, `admin_notes`, `created_at`, `updated_at`) VALUES
(1, 'test', 'adfds@gmail.com', '989654645', 'asdf', 'afasd', 'Browse Lots / Auctions', 'asdf', 'new', NULL, '2026-08-28 08:08:30', '2026-08-28 08:08:30'),
(2, 'Hi', 'test@123', NULL, NULL, NULL, 'Buying IT Equipment', NULL, 'new', NULL, '2026-09-30 14:00:51', '2026-09-30 14:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_tradings`
--

CREATE TABLE `corporate_tradings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lot_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `module_type` varchar(50) NOT NULL DEFAULT 'corporate_trading',
  `auction_type` varchar(50) NOT NULL DEFAULT 'corporate_trading',
  `transaction_routes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `starting_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `reserve_price` decimal(12,2) DEFAULT NULL,
  `buy_now_price` decimal(12,2) DEFAULT NULL,
  `bid_increment` decimal(10,2) NOT NULL DEFAULT 10.00,
  `current_bid` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_bids` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `condition_grade` varchar(255) DEFAULT NULL,
  `lifecycle_condition` varchar(255) DEFAULT NULL,
  `compliance_standards` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `gallery_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `specifications` text DEFAULT NULL,
  `upload_list` varchar(255) DEFAULT NULL,
  `upload_list_name` varchar(255) DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `approval_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint(20) UNSIGNED DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corporate_tradings`
--

INSERT INTO `corporate_tradings` (`id`, `lot_number`, `title`, `slug`, `category_id`, `category_name`, `seller_id`, `buyer_id`, `created_by`, `module_type`, `auction_type`, `transaction_routes`, `starting_price`, `reserve_price`, `buy_now_price`, `bid_increment`, `current_bid`, `total_bids`, `quantity`, `condition_grade`, `lifecycle_condition`, `compliance_standards`, `location`, `start_date`, `end_date`, `featured_image`, `gallery_images`, `description`, `specifications`, `upload_list`, `upload_list_name`, `terms`, `approval_status`, `status`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `rejection_reason`, `is_featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CORP-202608-XP2Q', 'Test lot Decommissioned Fleet: 40x Cisco Catalyst 3850 48-Port PoE+ Gigabit Switches', 'test-lot-decommissioned-fleet-40x-cisco-catalyst-3850-48-port-poe-gigabit-switches', NULL, 'Corporate Fleet', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 1, 'Corporate Fleet', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-08-31 13:54:14', '2026-09-30 13:54:14', NULL, NULL, 'adfads adsf ads adsf adsf asdfasdkljxvnxoi xnlvmcpoeponlcxjkdfpo poa df dklsmds', 'adfads adsf ads adsf adsf asdfasdkljxvnxoi xnlvmcpoeponlcxjkdfpo poa df dklsmds', NULL, NULL, NULL, 'approved', 'approved', NULL, NULL, NULL, NULL, NULL, 0, '2026-08-31 13:54:14', '2026-09-01 09:24:14', '2026-09-01 09:24:14'),
(2, 'CORP-202608-YJUS', 'Test Fleet Liquidation: 200x Lenovo ThinkPad T490s', 'test-fleet-liquidation-200x-lenovo-thinkpad-t490s', NULL, 'Corporate Fleet', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 200, 'Corporate Fleet', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-08-31 14:08:17', '2026-09-30 14:08:17', NULL, NULL, 'Tested working off-lease units complete with OEM power supplies and sanitized NVMe storage.', 'Tested working off-lease units complete with OEM power supplies and sanitized NVMe storage.', 'corporate-lists/test_manifest.xlsx', 'Lenovo_T490s_Lot_Manifest.xlsx', NULL, 'approved', 'approved', 1, '2026-08-31 14:08:17', NULL, NULL, NULL, 0, '2026-08-31 14:08:17', '2026-08-31 14:08:17', '2026-08-31 14:08:17'),
(3, 'CORP-202608-C5GW', 'Second Pending Fleet Lot: 50x Dell PowerEdge R740', 'second-pending-fleet-lot-50x-dell-poweredge-r740', NULL, 'Corporate Fleet', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 50, NULL, 'Used', NULL, NULL, '2026-08-31 14:08:17', '2026-09-30 14:08:17', NULL, NULL, 'Dual Xeon Gold, 128GB RAM, 8-bay chassis.', NULL, NULL, NULL, NULL, 'rejected', 'rejected', NULL, NULL, 1, '2026-08-31 14:08:17', 'Missing data sanitization documentation.', 0, '2026-08-31 14:08:17', '2026-08-31 14:08:17', '2026-08-31 14:08:17'),
(4, 'CORP-202608-SIWU', 'test by anil Decommissioned Fleet: 40x Cisco Catalyst 3850 48-Port PoE+ Gigabit Switches', 'test-by-anil-decommissioned-fleet-40x-cisco-catalyst-3850-48-port-poe-gigabit-switches', 6, 'Circuit Scrap & Materials', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 1.00, NULL, 454.00, 0.00, 0.00, 0, 1, 'Corporate Fleet', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-08-31 14:10:00', '2026-09-30 14:10:00', NULL, NULL, '## Task: Fix Corporate Trading Board Lot Approval & Frontend Publishing Workflow\n\nAct as a **senior Laravel developer and system architect**. Carefully inspect the existing project implementation related to the **Corporate Trading Board**, especially the workflow for adding stock/lots, admin approval, stock status, and frontend listing.\n\n### Current Problem\n\nThe **Corporate Trading Board** currently allows a user to add a lot/stock, but the **admin approval functionality is not working correctly**.\n\nLots submitted through the Corporate Trading Board must **not become publicly available immediately**. Every newly submitted lot must first go through an **Admin Approval process**.\n\nPlease investigate the complete existing flow and correct whatever is preventing the administrator from properly approving these submitted lots.\n\n### Required Workflow\n\nThe expected workflow must be:\n\n**User Adds Lot/Stock → Pending Admin Approval → Admin Reviews Lot → Admin Approves → Stock Becomes Live → Stock Appears on Website Frontend**\n\nWhen a buyer/seller/user adds a new lot from the **Corporate Trading Board**:\n\n1. Save the lot successfully in the existing database structure.\n2. Its initial status must be treated as **Pending Approval**.\n3. The lot must be available to the administrator for review from the appropriate existing admin section.\n4. The admin must be able to **Approve** the submitted stock/lot.\n5. Until approval is completed, the stock/lot must **not be shown as a live listing on the public frontend**.\n6. Once the admin approves the stock, immediately update its appropriate approval/live status.\n7. After successful admin approval, that stock/lot must automatically become **Live**.\n8. The approved stock must then appear in the appropriate **frontend Corporate Trading Board / stock listing section of the website**.\n9. Rejected, pending, inactive, or unapproved stock must never appear as a live frontend listing.\n\n### Important: Fix the Existing Admin Approval Problem\n\nCurrently, the Corporate Trading Board stock/lot is **not being approved correctly from the admin side**.\n\nTrace the complete functionality, including where applicable:\n\n* Corporate Trading Board form submission\n* Routes\n* Controllers / Livewire components\n* Models\n* Database relationships\n* Existing migrations/schema\n* Validation\n* Status/approval fields\n* Admin listing\n* Admin detail/view page\n* Approve action\n* Database update logic\n* Frontend queries\n* Frontend visibility conditions\n* Authentication/authorization\n* Buyer/Seller ownership relationships\n\nIdentify the actual root cause rather than applying only a visual/UI workaround.\n\n### Admin Approval Logic\n\nThe administrator must have proper functionality to review submitted stock and perform an approval action.\n\nAfter clicking **Approve**:\n\n* Approval must successfully save in the database.\n* The lot should no longer remain in Pending status.\n* It should be marked using the project\'s appropriate existing approved/live status structure.\n* The frontend should recognize the approved record immediately.\n* The approved lot must appear on the public website wherever Corporate Trading Board lots are displayed.\n\nPrevent accidental duplicate approval or inconsistent states.\n\n### Frontend Visibility Rule\n\nThe frontend query must return **only admin-approved and live Corporate Trading Board stock**.\n\nConceptually:\n\n**Pending → Not Visible**\n**Rejected → Not Visible**\n**Inactive → Not Visible**\n**Approved + Live → Visible on Frontend**\n\nDo not rely only on hiding records through CSS or Blade conditions if the database query itself should restrict them. Implement the visibility rule at the appropriate application/query level.\n\n### Database Changes\n\nFirst inspect the existing database schema.\n\nIf appropriate approval/status fields already exist, **reuse them** instead of creating duplicate fields.\n\nIf the required fields genuinely do not exist, you may safely add the minimum necessary migration/model functionality required to support:\n\n* Pending\n* Approved\n* Rejected, if already supported by the project\'s workflow\n* Live/Inactive status, where required\n\nAny database changes must remain backward-compatible with existing records and functionality.\n\n### Existing UI and Project Standards\n\nUse the project\'s existing:\n\n* Admin dashboard design\n* Frontend design\n* CSS\n* Bootstrap/classes\n* Fonts\n* Components\n* Tables\n* Buttons\n* Modals\n* Notifications/toasts\n* Route structure\n* Authentication system\n* Coding conventions\n\nDo not introduce a completely different UI or duplicate module unnecessarily.\n\n### Testing Requirements\n\nAfter implementation, verify at minimum:\n\n**Scenario 1:** User adds Corporate Trading Board stock → record is created successfully → status is Pending → stock does not appear publicly.\n\n**Scenario 2:** Admin opens the submitted stock → clicks Approve → approval saves successfully.\n\n**Scenario 3:** Approved stock automatically becomes Live and appears correctly on the website frontend.\n\n**Scenario 4:** Another pending stock remains hidden from the frontend.\n\n**Scenario 5:** Rejected/inactive stock does not appear publicly.\n\n**Scenario 6:** Existing Corporate Trading Board records and other auction modules continue working normally.\n\nAlso verify there are no:\n\n* SQL errors\n* Missing-column errors\n* Route errors\n* Authorization errors\n* Mass-assignment errors\n* Null-reference errors\n* Duplicate listings\n\n## Critical Development Constraint\n\n**Do not remove, rewrite, break, or unnecessarily modify any existing working functionality or code.**\n\nPreserve the existing project architecture and business logic.\n\nOnly **add or minimally extend the code necessary** to implement and repair the Corporate Trading Board admin approval and frontend publishing functionality described above.\n\nDo not modify unrelated Auction, Reverse Auction, RFQ, Buyer Dashboard, Seller Hub, Admin, or other existing modules unless a minimal integration change is absolutely necessary for this functionality.\n\n### Final Expected Result\n\nThe final system must work exactly like this:\n\n**Corporate Trading Board Lot Added → Admin Approval Required → Admin Approves → Stock Automatically Becomes Live → Approved Stock Appears on Frontend Website.**\n\nThe implementation must be functional at the **database, backend, admin dashboard, and frontend levels**, not merely a visual change.\n', 'sd dsfdfsd sdfdsf sd', 'corporate-lists/ceyuAM2noXRlSrpa3CndHMbBDhovxrwqM8Mt3MNP.xlsx', 'Monthly Attendance Sheet_Month_8_2026_RETROTECH BUSINESS SOLUTIONS PRIVATE LIMITED.xlsx', 'jfakdls alkdfja sdf aldsfjkla', 'rejected', 'rejected', 1, '2026-08-31 14:11:17', NULL, NULL, NULL, 0, '2026-08-31 14:10:38', '2026-09-02 08:22:54', '2026-09-02 08:22:54'),
(5, 'TEST-CTA-202608-GXDS', 'Test Corporate Auction Lot 100x HP EliteBooks', 'test-corporate-auction-lot-100x-hp-elitebooks', NULL, NULL, 3, NULL, 3, 'corporate_trading', 'forward', '[\"buy_now\",\"rfq\"]', 15000.00, NULL, 15000.00, 0.00, 0.00, 0, 100, NULL, 'Used', NULL, NULL, '2026-08-31 14:35:24', '2026-09-30 14:35:24', NULL, NULL, 'Tested fleet off-lease units.', NULL, NULL, NULL, NULL, 'approved', 'approved', 1, '2026-08-31 14:35:24', NULL, NULL, NULL, 0, '2026-08-31 14:35:24', '2026-08-31 14:35:24', '2026-08-31 14:35:24'),
(6, 'TEST-CTR-202608-8QRG', 'Test Corporate Reverse Sourcing 500x DDR4 ECC Server RAM', 'test-corporate-reverse-sourcing-500x-ddr4-ecc-server-ram', NULL, NULL, NULL, 2, 2, 'corporate_trading', 'reverse', '[\"buy_now\",\"rfq\"]', 25000.00, NULL, 25000.00, 0.00, 0.00, 0, 500, NULL, 'Used', NULL, NULL, '2026-08-31 14:35:24', '2026-09-30 14:35:24', NULL, NULL, 'Target budget ceiling $25,000 for Samsung / Hynix modules.', NULL, NULL, NULL, NULL, 'approved', 'approved', 1, '2026-08-31 14:35:24', NULL, NULL, NULL, 0, '2026-08-31 14:35:24', '2026-08-31 14:35:24', '2026-08-31 14:35:24'),
(7, 'CORP-202608-EITY', 'i have 100 scrp laoptop and other elelctronic materical', 'i-have-100-scrp-laoptop-and-other-elelctronic-materical', NULL, 'Corporate Fleet', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 1, 'Corporate Fleet', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-08-31 15:10:09', '2026-09-30 15:10:09', NULL, NULL, 'adslfkj asdkjkljsdfkjladfskjlkjldfaskjl kjdskjf', 'adslfkj asdkjkljsdfkjladfskjlkjldfaskjl kjdskjf', 'corporate-lists/F1iXtIMzkLoRff4CYs3YknD70OPknorGADsgrIpc.docx', 'Frappe_CRM_Sales_Purchase_Operations_Handbook_100_Pages.docx', NULL, 'approved', 'approved', 1, '2026-08-31 15:10:50', NULL, NULL, NULL, 0, '2026-08-31 15:10:09', '2026-09-01 09:23:57', '2026-09-01 09:23:57'),
(8, 'CORP-202608-VEMI', 'testing for admin approval', 'testing-for-admin-approval', NULL, 'Corporate Fleet', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 1, 'Corporate Fleet', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-08-31 15:21:26', '2026-09-30 15:21:26', NULL, NULL, 'testing for admin approval', 'testing for admin approval', 'corporate-lists/8zn8vl2PlGMBmjaEuKkwllz8Z1iebLpXS0F7Gt8R.xlsx', 'Monthly Attendance Sheet_Month_8_2026_RETROTECH BUSINESS SOLUTIONS PRIVATE LIMITED.xlsx', NULL, 'approved', 'approved', 1, '2026-08-31 15:22:24', NULL, NULL, NULL, 0, '2026-08-31 15:21:26', '2026-09-01 09:23:51', '2026-09-01 09:23:51'),
(9, 'CORP-202609-D3T7', 'test 1000 laptop will be handled by compnay', 'test-1000-laptop-will-be-handled-by-compnay', NULL, 'Corporate Fleet', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 1, 'Corporate Fleet', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-09-02 07:38:29', '2026-10-02 07:38:29', NULL, NULL, 'this is descript how these laptops are we are now discussing about ', 'this is descript how these laptops are we are now discussing about ', 'corporate-lists/pC1lC0dJ5mNHsURGI87AfPRRJaJHOwxvTmkTclc9.xlsx', 'Monthly Attendance Sheet_Month_8_2026_RETROTECH BUSINESS SOLUTIONS PRIVATE LIMITED.xlsx', NULL, 'pending', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2026-09-02 07:38:29', '2026-09-02 08:14:57', '2026-09-02 08:14:57'),
(10, 'CORP-202609-DKHI', '1000 laptop and other resources ', '1000-laptop-and-other-resources', NULL, 'Corporate Fleet', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 1, 'Corporate Fleet', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-09-02 08:06:12', '2026-10-02 08:06:12', NULL, NULL, 'I am detail of all related things', 'I am detail of all related things', 'corporate-lists/Tdu96j6VFDOYobRyWmfifvBBsQy5xW29xtHXfprd.xlsx', 'Monthly Attendance Sheet_Month_8_2026_RETROTECH BUSINESS SOLUTIONS PRIVATE LIMITED.xlsx', NULL, 'pending', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2026-09-02 08:06:12', '2026-09-02 08:14:52', '2026-09-02 08:14:52'),
(13, 'CORP-202609-B8VQ', '1000 laptop will handled by this case', '1000-laptop-will-handled-by-this-case', NULL, 'Corporate Fleet', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 1, 'Corporate Fleet', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-09-02 08:25:38', '2026-10-02 08:25:38', NULL, NULL, '1000 laptop will handled by this case I am description of this ', '1000 laptop will handled by this case I am description of this ', 'corporate-lists/1uXTXM00T8UBERtSMnbSDByKjDCiXn5LIALxETUb.xlsx', '1770928583-698e39c7afaf5.xlsx', NULL, 'approved', 'approved', 1, '2026-09-02 08:45:10', NULL, NULL, NULL, 0, '2026-09-02 08:25:38', '2026-09-02 08:45:10', NULL),
(14, 'CORP-202609-LUMU', 'Test Corp Lot Verification', 'test-corp-lot-verification', NULL, NULL, 3, NULL, NULL, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', 'pending_approval', NULL, NULL, NULL, NULL, NULL, 0, '2026-09-02 09:14:19', '2026-09-02 09:14:31', '2026-09-02 09:14:31'),
(15, 'CORP-202609-HJRW', 'Test Corp Lot Verification', 'test-corp-lot-verification-1', NULL, NULL, 3, NULL, NULL, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.00, NULL, NULL, 0.00, 0.00, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', 'pending_approval', NULL, NULL, NULL, NULL, NULL, 0, '2026-09-02 09:14:31', '2026-09-02 09:14:31', '2026-09-02 09:14:31'),
(16, 'CORP-202610-SUPCR', '50x Dell PowerEdge R750 2U Servers', '50x-dell-poweredge-r750-2u-servers', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 4250.00, NULL, 4250.00, 0.00, 0.00, 0, 50, 'Grade A', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-10-19 07:23:22', '2026-11-18 07:19:00', NULL, NULL, 'Lot of 50 Dell PowerEdge R750 servers decommissioned from a Tier 3 data center. All units are tested, working, and have been factory reset.\n\nConfiguration per unit: 2x Intel Xeon Gold 6338 CPUs, 256GB DDR4 RAM, 2x 960GB SSD, Broadcom Dual Port 25Gb NIC, Dual 1400W Power Supplies, ReadyRails included.\n\nCondition: Grade A - Very minor cosmetic wear on top lids; bezels included.\n\nPackaging & Logistics: Palletized and shrink-wrapped. Must ship via LTL freight. Buyer arranges shipping.\nTerms: Fixed price per unit. Direct RFQs welcome for bulk purchases of 20+ units.', 'Lot of 50 Dell PowerEdge R750 servers decommissioned from a Tier 3 data center. All units are tested, working, and have been factory reset.\n\nConfiguration per unit: 2x Intel Xeon Gold 6338 CPUs, 256GB DDR4 RAM, 2x 960GB SSD, Broadcom Dual Port 25Gb NIC, Dual 1400W Power Supplies, ReadyRails included.\n\nCondition: Grade A - Very minor cosmetic wear on top lids; bezels included.\n\nPackaging & Logistics: Palletized and shrink-wrapped. Must ship via LTL freight. Buyer arranges shipping.\nTerms: Fixed price per unit. Direct RFQs welcome for bulk purchases of 20+ units.', NULL, NULL, NULL, 'approved', 'ended', 1, '2026-10-19 07:38:15', NULL, NULL, NULL, 0, '2026-10-19 07:23:22', '2026-10-19 09:03:33', NULL),
(17, 'CORP-202610-ZMIGH', 'Cisco Catalyst 9200L 48-Port Switches', 'cisco-catalyst-9200l-48-port-switches', 2, 'Enterprise Networking', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 850.00, NULL, 850.00, 0.00, 0.00, 0, 25, 'Grade B', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-10-19 07:37:08', '2026-11-18 07:18:00', NULL, NULL, '25x Cisco Catalyst C9200L-48P-4G switches pulled from a recent network upgrade.\n\nConfiguration: 48x PoE+ ports, 4x 1G SFP uplinks, Network Essentials license.\n\nCondition: Grade B - Fully functional. Some units have minor rack rash, scuffs on the chassis, and slight discoloration from standard data center use.\n\nPackaging: Boxed individually with power cables, but no original mounting kits.\nLogistics: Ships via UPS Ground or standard freight.\nTerms: Fixed price. Buyer pays shipping. Send a message for detailed port testing logs.', '25x Cisco Catalyst C9200L-48P-4G switches pulled from a recent network upgrade.\n\nConfiguration: 48x PoE+ ports, 4x 1G SFP uplinks, Network Essentials license.\n\nCondition: Grade B - Fully functional. Some units have minor rack rash, scuffs on the chassis, and slight discoloration from standard data center use.\n\nPackaging: Boxed individually with power cables, but no original mounting kits.\nLogistics: Ships via UPS Ground or standard freight.\nTerms: Fixed price. Buyer pays shipping. Send a message for detailed port testing logs.', NULL, NULL, NULL, 'approved', 'ended', 1, '2026-10-19 07:38:10', NULL, NULL, NULL, 0, '2026-10-19 07:37:08', '2026-10-19 08:52:52', NULL),
(18, 'CORP-202610-CPYHY', 'Dell Latitude 5420 Laptops', 'dell-latitude-5420-laptops', 3, 'Laptops & Workstations', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 200.00, NULL, 200.00, 0.00, 0.00, 0, 200, 'Grade B', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics DepotCorporate Logistics Depot', '2026-10-19 07:40:01', '2026-11-18 07:18:00', NULL, NULL, 'Large lot of 200 Dell Latitude 5420 business laptops. Perfect for refurbishers or educational institutions.\n\nConfiguration: Intel Core i5-1145G7, 16GB RAM, 256GB NVMe SSD, 14\" FHD Display, Windows 10 Pro installed.\n\nCondition: Grade B - Corporate off-lease. Expect typical signs of use (keyboard shine, minor screen scratches, lid scuffs). No major cracks or broken hinges. Batteries hold a charge.\n\nPackaging & Logistics: Laptops will be packed 10 per box with power adapters. Shipped on 4 standard pallets.\nTerms: Fixed price per unit. No returns. Direct RFQ pricing available if purchasing the entire lot of 200 at once.\n\n', 'Large lot of 200 Dell Latitude 5420 business laptops. Perfect for refurbishers or educational institutions.\n\nConfiguration: Intel Core i5-1145G7, 16GB RAM, 256GB NVMe SSD, 14\" FHD Display, Windows 10 Pro installed.\n\nCondition: Grade B - Corporate off-lease. Expect typical signs of use (keyboard shine, minor screen scratches, lid scuffs). No major cracks or broken hinges. Batteries hold a charge.\n\nPackaging & Logistics: Laptops will be packed 10 per box with power adapters. Shipped on 4 standard pallets.\nTerms: Fixed price per unit. No returns. Direct RFQ pricing available if purchasing the entire lot of 200 at once.\n\n', NULL, NULL, NULL, 'approved', 'live', 1, '2026-10-19 09:06:22', NULL, NULL, NULL, 0, '2026-10-19 07:40:01', '2026-10-19 09:06:22', NULL),
(19, 'CORP-202610-MOA9M', 'Dell Latitude 5420 Laptops', 'dell-latitude-5420-laptops-1', 3, 'Laptops & Workstations', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 0.01, NULL, 0.01, 0.00, 0.00, 0, 50, 'Grade A', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depot', '2026-10-19 09:04:52', '2026-11-18 09:03:00', NULL, NULL, 'Large lot of 200 Dell Latitude 5420 business laptops. Perfect for refurbishers or educational institutions.\n\nConfiguration: Intel Core i5-1145G7, 16GB RAM, 256GB NVMe SSD, 14\" FHD Display, Windows 10 Pro installed.\n\nCondition: Grade B - Corporate off-lease. Expect typical signs of use (keyboard shine, minor screen scratches, lid scuffs). No major cracks or broken hinges. Batteries hold a charge.\n\nPackaging & Logistics: Laptops will be packed 10 per box with power adapters. Shipped on 4 standard pallets.\nTerms: Fixed price per unit. No returns. Direct RFQ pricing available if purchasing the entire lot of 200 at once.\n\n', 'Large lot of 200 Dell Latitude 5420 business laptops. Perfect for refurbishers or educational institutions.\n\nConfiguration: Intel Core i5-1145G7, 16GB RAM, 256GB NVMe SSD, 14\" FHD Display, Windows 10 Pro installed.\n\nCondition: Grade B - Corporate off-lease. Expect typical signs of use (keyboard shine, minor screen scratches, lid scuffs). No major cracks or broken hinges. Batteries hold a charge.\n\nPackaging & Logistics: Laptops will be packed 10 per box with power adapters. Shipped on 4 standard pallets.\nTerms: Fixed price per unit. No returns. Direct RFQ pricing available if purchasing the entire lot of 200 at once.\n\n', NULL, NULL, NULL, 'approved', 'ended', 1, '2026-10-19 09:06:14', NULL, NULL, NULL, 0, '2026-10-19 09:04:52', '2026-10-19 09:14:45', NULL),
(20, 'CORP-202610-6YLKO', 'High-End Enterprise Servers', 'high-end-enterprise-servers', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 150.00, NULL, 150.00, 0.00, 0.00, 0, 50, 'Grade B', 'Corporate Off-Lease', '[\"R2v3 Certified\",\"e-Stewards Preferred\"]', 'Corporate Logistics Depotserfewg', '2026-10-19 09:32:21', '2026-10-19 10:10:00', NULL, NULL, 'ddfgasdbs', 'ddfgasdbs', NULL, NULL, NULL, 'approved', 'live', 1, '2026-10-19 09:32:49', NULL, NULL, NULL, 0, '2026-10-19 09:32:21', '2026-10-19 09:32:49', NULL),
(21, 'CORP-202611-DF8H1', 'Corporate ITAD Fleet: 50x Dell PowerEdge R650 1U Dual Xeon Silver 4314 Servers', 'corporate-fleet-50x-dell-poweredge-r650-bswc', 1, 'Servers & Blade Infrastructure', 3, NULL, 3, 'corporate_trading', 'corporate_trading', '[\"buy_now\",\"rfq\"]', 78000.00, NULL, 78000.00, 0.00, 0.00, 0, 50, 'Corporate Fleet', 'Corporate Off-Lease Grade A', '[\"R2v3 Certified\",\"e-Stewards Preferred\",\"ISO 14001\"]', 'Dallas Corporate Logistics Depot', '2026-11-16 08:43:42', '2026-12-01 08:43:42', NULL, NULL, 'Complete corporate datacenter fleet decommissioning. 50 uniform Dell PowerEdge R650 1U servers pulled from an active colocation rack. Clean BIOS, iDRAC Enterprise licenses, fully tested and certified under R2v3 standards.', 'Per Server: Dual Intel Xeon Silver 4314 (32 Cores / 64 Threads total per node), 128GB DDR4-3200 ECC, Dual 800W Platinum PSUs, 8x 2.5\" hot-swap SAS/SATA backplanes, PERC H745 RAID.', NULL, NULL, 'Sold as full lot or minimum order quantity of 10 units via RFQ. Escrow checkout available.', 'approved', 'live', 1, '2026-11-17 08:43:42', NULL, NULL, NULL, 1, '2026-11-17 08:43:42', '2026-11-17 08:43:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corporate_trading_buy_now_purchases`
--

CREATE TABLE `corporate_trading_buy_now_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `corporate_trading_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total_amount` decimal(18,2) NOT NULL,
  `status` enum('pending','completed','cancelled') NOT NULL DEFAULT 'pending',
  `purchased_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corporate_trading_buy_now_purchases`
--

INSERT INTO `corporate_trading_buy_now_purchases` (`id`, `corporate_trading_id`, `buyer_id`, `price`, `quantity`, `total_amount`, `status`, `purchased_at`, `created_at`, `updated_at`) VALUES
(1, 17, 2, 850.00, 25, 21250.00, 'pending', '2026-10-19 08:52:52', '2026-10-19 08:52:52', '2026-10-19 08:52:52'),
(2, 16, 2, 4250.00, 50, 212500.00, 'pending', '2026-10-19 09:03:33', '2026-10-19 09:03:33', '2026-10-19 09:03:33'),
(3, 19, 2, 2.00, 50, 100.00, 'pending', '2026-10-19 09:14:45', '2026-10-19 09:14:45', '2026-10-19 09:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iso_code` varchar(255) NOT NULL,
  `dial_code` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso_code`, `dial_code`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'Jamaica', 'JM', '+1876', '/uploads/flag/jamaica.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(2, 'Comoros', 'KM', '+269', '/uploads/flag/comoros.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(3, 'Zimbabwe', 'ZW', '+263', '/uploads/flag/zimbabwe.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(4, 'Sint Maarten', 'SX', '+1721', '/uploads/flag/sint_maarten.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(5, 'Laos', 'LA', '+856', '/uploads/flag/laos.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(6, 'Latvia', 'LV', '+371', '/uploads/flag/latvia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(7, 'Tajikistan', 'TJ', '+992', '/uploads/flag/tajikistan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(8, 'United Kingdom', 'GB', '+44', '/uploads/flag/united_kingdom.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(9, 'Nicaragua', 'NI', '+505', '/uploads/flag/nicaragua.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(10, 'Sudan', 'SD', '+249', '/uploads/flag/sudan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(11, 'Greece', 'GR', '+30', '/uploads/flag/greece.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(12, 'Lithuania', 'LT', '+370', '/uploads/flag/lithuania.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(13, 'Rwanda', 'RW', '+250', '/uploads/flag/rwanda.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(14, 'Senegal', 'SN', '+221', '/uploads/flag/senegal.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(15, 'Monaco', 'MC', '+377', '/uploads/flag/monaco.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(16, 'Lesotho', 'LS', '+266', '/uploads/flag/lesotho.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(17, 'Tunisia', 'TN', '+216', '/uploads/flag/tunisia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(18, 'Vanuatu', 'VU', '+678', '/uploads/flag/vanuatu.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(19, 'Ecuador', 'EC', '+593', '/uploads/flag/ecuador.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(20, 'Kuwait', 'KW', '+965', '/uploads/flag/kuwait.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(21, 'Philippines', 'PH', '+63', '/uploads/flag/philippines.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(22, 'Chile', 'CL', '+56', '/uploads/flag/chile.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(23, 'Bahamas', 'BS', '+1242', '/uploads/flag/bahamas.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(24, 'Tanzania', 'TZ', '+255', '/uploads/flag/tanzania.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(25, 'Costa Rica', 'CR', '+506', '/uploads/flag/costa_rica.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(26, 'Morocco', 'MA', '+212', '/uploads/flag/morocco.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(27, 'Montenegro', 'ME', '+382', '/uploads/flag/montenegro.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(28, 'Micronesia', 'FM', '+691', '/uploads/flag/micronesia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(29, 'Portugal', 'PT', '+351', '/uploads/flag/portugal.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(30, 'United Arab Emirates', 'AE', '+971', '/uploads/flag/united_arab_emirates.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(31, 'Libya', 'LY', '+218', '/uploads/flag/libya.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(32, 'Luxembourg', 'LU', '+352', '/uploads/flag/luxembourg.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(33, 'Jersey', 'JE', '+44', '/uploads/flag/jersey.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(34, 'Solomon Islands', 'SB', '+677', '/uploads/flag/solomon_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(35, 'Algeria', 'DZ', '+213', '/uploads/flag/algeria.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(36, 'Antigua and Barbuda', 'AG', '+1268', '/uploads/flag/antigua_and_barbuda.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(37, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '+290', '/uploads/flag/saint_helena_ascension_and_tristan_da_cunha.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(38, 'Brazil', 'BR', '+55', '/uploads/flag/brazil.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(39, 'South Georgia', 'GS', '+500', '/uploads/flag/south_georgia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(40, 'Mali', 'ML', '+223', '/uploads/flag/mali.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(41, 'Pakistan', 'PK', '+92', '/uploads/flag/pakistan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(42, 'Trinidad and Tobago', 'TT', '+1868', '/uploads/flag/trinidad_and_tobago.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(43, 'Armenia', 'AM', '+374', '/uploads/flag/armenia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(44, 'Bangladesh', 'BD', '+880', '/uploads/flag/bangladesh.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(45, 'Turks and Caicos Islands', 'TC', '+1649', '/uploads/flag/turks_and_caicos_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(46, 'Turkmenistan', 'TM', '+993', '/uploads/flag/turkmenistan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(47, 'Faroe Islands', 'FO', '+298', '/uploads/flag/faroe_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(48, 'Palau', 'PW', '+680', '/uploads/flag/palau.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(49, 'Cuba', 'CU', '+53', '/uploads/flag/cuba.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(50, 'Chad', 'TD', '+235', '/uploads/flag/chad.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(51, 'Bosnia and Herzegovina', 'BA', '+387', '/uploads/flag/bosnia_and_herzegovina.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(52, 'Botswana', 'BW', '+267', '/uploads/flag/botswana.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(53, 'Estonia', 'EE', '+372', '/uploads/flag/estonia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(54, 'British Indian Ocean Territory', 'IO', '+246', '/uploads/flag/british_indian_ocean_territory.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(55, 'French Southern and Antarctic Lands', 'TF', '+262', '/uploads/flag/french_southern_and_antarctic_lands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(56, 'Greenland', 'GL', '+299', '/uploads/flag/greenland.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(57, 'Christmas Island', 'CX', '+61', '/uploads/flag/christmas_island.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(58, 'Pitcairn Islands', 'PN', '+64', '/uploads/flag/pitcairn_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(59, 'Western Sahara', 'EH', '+2125288', '/uploads/flag/western_sahara.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(60, 'Montserrat', 'MS', '+1664', '/uploads/flag/montserrat.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(61, 'Bahrain', 'BH', '+973', '/uploads/flag/bahrain.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(62, 'Dominican Republic', 'DO', '+1809', '/uploads/flag/dominican_republic.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(63, 'United States', 'US', '+1', '/uploads/flag/united_states.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(64, 'Cook Islands', 'CK', '+682', '/uploads/flag/cook_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(65, 'Colombia', 'CO', '+57', '/uploads/flag/colombia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(66, 'Guinea', 'GN', '+224', '/uploads/flag/guinea.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(67, 'Ireland', 'IE', '+353', '/uploads/flag/ireland.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(68, 'Maldives', 'MV', '+960', '/uploads/flag/maldives.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(69, 'Panama', 'PA', '+507', '/uploads/flag/panama.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(70, 'Mozambique', 'MZ', '+258', '/uploads/flag/mozambique.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(71, 'Oman', 'OM', '+968', '/uploads/flag/oman.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(72, 'Czechia', 'CZ', '+420', '/uploads/flag/czechia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(73, 'Heard Island and McDonald Islands', 'HM', 'N/A', '/uploads/flag/heard_island_and_mcdonald_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(74, 'Saint Vincent and the Grenadines', 'VC', '+1784', '/uploads/flag/saint_vincent_and_the_grenadines.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(75, 'Haiti', 'HT', '+509', '/uploads/flag/haiti.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(76, 'Nigeria', 'NG', '+234', '/uploads/flag/nigeria.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(77, 'British Virgin Islands', 'VG', '+1284', '/uploads/flag/british_virgin_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(78, 'Namibia', 'NA', '+264', '/uploads/flag/namibia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(79, 'Dominica', 'DM', '+1767', '/uploads/flag/dominica.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(80, 'Canada', 'CA', '+1', '/uploads/flag/canada.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(81, 'Guernsey', 'GG', '+44', '/uploads/flag/guernsey.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(82, 'Niger', 'NE', '+227', '/uploads/flag/niger.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(83, 'Indonesia', 'ID', '+62', '/uploads/flag/indonesia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(84, 'Yemen', 'YE', '+967', '/uploads/flag/yemen.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(85, 'Palestine', 'PS', '+970', '/uploads/flag/palestine.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(86, 'Gabon', 'GA', '+241', '/uploads/flag/gabon.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(87, 'Eritrea', 'ER', '+291', '/uploads/flag/eritrea.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(88, 'Cyprus', 'CY', '+357', '/uploads/flag/cyprus.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(89, 'Hong Kong', 'HK', '+852', '/uploads/flag/hong_kong.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(90, 'Bouvet Island', 'BV', '+47', '/uploads/flag/bouvet_island.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(91, 'Slovakia', 'SK', '+421', '/uploads/flag/slovakia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(92, 'Slovenia', 'SI', '+386', '/uploads/flag/slovenia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(93, 'Niue', 'NU', '+683', '/uploads/flag/niue.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(94, 'Kiribati', 'KI', '+686', '/uploads/flag/kiribati.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(95, 'Germany', 'DE', '+49', '/uploads/flag/germany.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(96, 'Kosovo', 'XK', '+383', '/uploads/flag/kosovo.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(97, 'Ivory Coast', 'CI', '+225', '/uploads/flag/ivory_coast.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(98, 'Sri Lanka', 'LK', '+94', '/uploads/flag/sri_lanka.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(99, 'Saint Martin', 'MF', '+590', '/uploads/flag/saint_martin.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(100, 'Belgium', 'BE', '+32', '/uploads/flag/belgium.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(101, 'Israel', 'IL', '+972', '/uploads/flag/israel.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(102, 'Åland Islands', 'AX', '+35818', '/uploads/flag/_land_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(103, 'Northern Mariana Islands', 'MP', '+1670', '/uploads/flag/northern_mariana_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(104, 'Denmark', 'DK', '+45', '/uploads/flag/denmark.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(105, 'Bermuda', 'BM', '+1441', '/uploads/flag/bermuda.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(106, 'Gibraltar', 'GI', '+350', '/uploads/flag/gibraltar.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(107, 'Syria', 'SY', '+963', '/uploads/flag/syria.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(108, 'Timor-Leste', 'TL', '+670', '/uploads/flag/timor_leste.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(109, 'San Marino', 'SM', '+378', '/uploads/flag/san_marino.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(110, 'Gambia', 'GM', '+220', '/uploads/flag/gambia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(111, 'Peru', 'PE', '+51', '/uploads/flag/peru.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(112, 'Guinea-Bissau', 'GW', '+245', '/uploads/flag/guinea_bissau.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(113, 'Sierra Leone', 'SL', '+232', '/uploads/flag/sierra_leone.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(114, 'Turkey', 'TR', '+90', '/uploads/flag/turkey.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(115, 'Bolivia', 'BO', '+591', '/uploads/flag/bolivia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(116, 'Norway', 'NO', '+47', '/uploads/flag/norway.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(117, 'Republic of the Congo', 'CG', '+242', '/uploads/flag/republic_of_the_congo.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(118, 'Eswatini', 'SZ', '+268', '/uploads/flag/eswatini.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(119, 'Paraguay', 'PY', '+595', '/uploads/flag/paraguay.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(120, 'Ukraine', 'UA', '+380', '/uploads/flag/ukraine.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(121, 'Malaysia', 'MY', '+60', '/uploads/flag/malaysia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(122, 'Tonga', 'TO', '+676', '/uploads/flag/tonga.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(123, 'Benin', 'BJ', '+229', '/uploads/flag/benin.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(124, 'Sweden', 'SE', '+46', '/uploads/flag/sweden.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(125, 'Tuvalu', 'TV', '+688', '/uploads/flag/tuvalu.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(126, 'Mongolia', 'MN', '+976', '/uploads/flag/mongolia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(127, 'South Africa', 'ZA', '+27', '/uploads/flag/south_africa.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(128, 'Curaçao', 'CW', '+599', '/uploads/flag/cura_ao.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(129, 'Australia', 'AU', '+61', '/uploads/flag/australia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(130, 'Saint Kitts and Nevis', 'KN', '+1869', '/uploads/flag/saint_kitts_and_nevis.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(131, 'Ghana', 'GH', '+233', '/uploads/flag/ghana.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(132, 'Iraq', 'IQ', '+964', '/uploads/flag/iraq.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(133, 'Vietnam', 'VN', '+84', '/uploads/flag/vietnam.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(134, 'Guyana', 'GY', '+592', '/uploads/flag/guyana.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(135, 'Azerbaijan', 'AZ', '+994', '/uploads/flag/azerbaijan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(136, 'Cameroon', 'CM', '+237', '/uploads/flag/cameroon.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(137, 'Egypt', 'EG', '+20', '/uploads/flag/egypt.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(138, 'Iceland', 'IS', '+354', '/uploads/flag/iceland.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(139, 'Venezuela', 'VE', '+58', '/uploads/flag/venezuela.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(140, 'Barbados', 'BB', '+1246', '/uploads/flag/barbados.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(141, 'Falkland Islands', 'FK', '+500', '/uploads/flag/falkland_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(142, 'Malawi', 'MW', '+265', '/uploads/flag/malawi.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(143, 'Kyrgyzstan', 'KG', '+996', '/uploads/flag/kyrgyzstan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(144, 'Taiwan', 'TW', '+886', '/uploads/flag/taiwan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(145, 'Bulgaria', 'BG', '+359', '/uploads/flag/bulgaria.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(146, 'North Korea', 'KP', '+850', '/uploads/flag/north_korea.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(147, 'Andorra', 'AD', '+376', '/uploads/flag/andorra.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(148, 'Angola', 'AO', '+244', '/uploads/flag/angola.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(149, 'Saint Barthélemy', 'BL', '+590', '/uploads/flag/saint_barth_lemy.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(150, 'Russia', 'RU', '+73', '/uploads/flag/russia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(151, 'Burkina Faso', 'BF', '+226', '/uploads/flag/burkina_faso.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(152, 'Vatican City', 'VA', '+3906698', '/uploads/flag/vatican_city.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(153, 'Isle of Man', 'IM', '+44', '/uploads/flag/isle_of_man.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(154, 'Afghanistan', 'AF', '+93', '/uploads/flag/afghanistan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(155, 'Croatia', 'HR', '+385', '/uploads/flag/croatia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(156, 'Bhutan', 'BT', '+975', '/uploads/flag/bhutan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(157, 'Belarus', 'BY', '+375', '/uploads/flag/belarus.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(158, 'Cocos (Keeling) Islands', 'CC', '+61', '/uploads/flag/cocos_keeling_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(159, 'New Zealand', 'NZ', '+64', '/uploads/flag/new_zealand.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(160, 'Madagascar', 'MG', '+261', '/uploads/flag/madagascar.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(161, 'Thailand', 'TH', '+66', '/uploads/flag/thailand.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(162, 'Georgia', 'GE', '+995', '/uploads/flag/georgia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(163, 'India', 'IN', '+91', '/uploads/flag/india.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(164, 'China', 'CN', '+86', '/uploads/flag/china.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(165, 'Saint Pierre and Miquelon', 'PM', '+508', '/uploads/flag/saint_pierre_and_miquelon.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(166, 'Puerto Rico', 'PR', '+1787', '/uploads/flag/puerto_rico.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(167, 'Djibouti', 'DJ', '+253', '/uploads/flag/djibouti.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(168, 'Saudi Arabia', 'SA', '+966', '/uploads/flag/saudi_arabia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(169, 'Iran', 'IR', '+98', '/uploads/flag/iran.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(170, 'Zambia', 'ZM', '+260', '/uploads/flag/zambia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(171, 'Ethiopia', 'ET', '+251', '/uploads/flag/ethiopia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(172, 'Macau', 'MO', '+853', '/uploads/flag/macau.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(173, 'Guatemala', 'GT', '+502', '/uploads/flag/guatemala.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(174, 'Martinique', 'MQ', '+596', '/uploads/flag/martinique.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(175, 'Suriname', 'SR', '+597', '/uploads/flag/suriname.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(176, 'Uruguay', 'UY', '+598', '/uploads/flag/uruguay.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(177, 'Italy', 'IT', '+39', '/uploads/flag/italy.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(178, 'New Caledonia', 'NC', '+687', '/uploads/flag/new_caledonia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(179, 'Fiji', 'FJ', '+679', '/uploads/flag/fiji.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(180, 'Aruba', 'AW', '+297', '/uploads/flag/aruba.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(181, 'São Tomé and Príncipe', 'ST', '+239', '/uploads/flag/s_o_tom_and_pr_ncipe.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(182, 'Switzerland', 'CH', '+41', '/uploads/flag/switzerland.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(183, 'DR Congo', 'CD', '+243', '/uploads/flag/dr_congo.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(184, 'Finland', 'FI', '+358', '/uploads/flag/finland.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(185, 'Malta', 'MT', '+356', '/uploads/flag/malta.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(186, 'El Salvador', 'SV', '+503', '/uploads/flag/el_salvador.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(187, 'Jordan', 'JO', '+962', '/uploads/flag/jordan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(188, 'Tokelau', 'TK', '+690', '/uploads/flag/tokelau.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(189, 'Nauru', 'NR', '+674', '/uploads/flag/nauru.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(190, 'Poland', 'PL', '+48', '/uploads/flag/poland.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(191, 'Mauritania', 'MR', '+222', '/uploads/flag/mauritania.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(192, 'Wallis and Futuna', 'WF', '+681', '/uploads/flag/wallis_and_futuna.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(193, 'Antarctica', 'AQ', 'N/A', '/uploads/flag/antarctica.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(194, 'Guam', 'GU', '+1671', '/uploads/flag/guam.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(195, 'North Macedonia', 'MK', '+389', '/uploads/flag/north_macedonia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(196, 'Togo', 'TG', '+228', '/uploads/flag/togo.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(197, 'Myanmar', 'MM', '+95', '/uploads/flag/myanmar.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(198, 'Qatar', 'QA', '+974', '/uploads/flag/qatar.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(199, 'France', 'FR', '+33', '/uploads/flag/france.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(200, 'Mayotte', 'YT', '+262', '/uploads/flag/mayotte.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(201, 'Norfolk Island', 'NF', '+672', '/uploads/flag/norfolk_island.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(202, 'Seychelles', 'SC', '+248', '/uploads/flag/seychelles.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(203, 'Moldova', 'MD', '+373', '/uploads/flag/moldova.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(204, 'South Sudan', 'SS', '+211', '/uploads/flag/south_sudan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(205, 'Brunei', 'BN', '+673', '/uploads/flag/brunei.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(206, 'Japan', 'JP', '+81', '/uploads/flag/japan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(207, 'Grenada', 'GD', '+1473', '/uploads/flag/grenada.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(208, 'Spain', 'ES', '+34', '/uploads/flag/spain.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(209, 'Caribbean Netherlands', 'BQ', '+599', '/uploads/flag/caribbean_netherlands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(210, 'Papua New Guinea', 'PG', '+675', '/uploads/flag/papua_new_guinea.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(211, 'Uzbekistan', 'UZ', '+998', '/uploads/flag/uzbekistan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(212, 'Argentina', 'AR', '+54', '/uploads/flag/argentina.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(213, 'South Korea', 'KR', '+82', '/uploads/flag/south_korea.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(214, 'Belize', 'BZ', '+501', '/uploads/flag/belize.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(215, 'Réunion', 'RE', '+262', '/uploads/flag/r_union.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(216, 'Mexico', 'MX', '+52', '/uploads/flag/mexico.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(217, 'United States Virgin Islands', 'VI', '+1340', '/uploads/flag/united_states_virgin_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(218, 'Serbia', 'RS', '+381', '/uploads/flag/serbia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(219, 'United States Minor Outlying Islands', 'UM', '+268', '/uploads/flag/united_states_minor_outlying_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(220, 'Cape Verde', 'CV', '+238', '/uploads/flag/cape_verde.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(221, 'Cambodia', 'KH', '+855', '/uploads/flag/cambodia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(222, 'Romania', 'RO', '+40', '/uploads/flag/romania.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(223, 'Hungary', 'HU', '+36', '/uploads/flag/hungary.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(224, 'Marshall Islands', 'MH', '+692', '/uploads/flag/marshall_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(225, 'Somalia', 'SO', '+252', '/uploads/flag/somalia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(226, 'Albania', 'AL', '+355', '/uploads/flag/albania.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(227, 'French Polynesia', 'PF', '+689', '/uploads/flag/french_polynesia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(228, 'Burundi', 'BI', '+257', '/uploads/flag/burundi.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(229, 'Central African Republic', 'CF', '+236', '/uploads/flag/central_african_republic.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(230, 'French Guiana', 'GF', '+594', '/uploads/flag/french_guiana.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(231, 'American Samoa', 'AS', '+1684', '/uploads/flag/american_samoa.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(232, 'Saint Lucia', 'LC', '+1758', '/uploads/flag/saint_lucia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(233, 'Uganda', 'UG', '+256', '/uploads/flag/uganda.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(234, 'Honduras', 'HN', '+504', '/uploads/flag/honduras.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(235, 'Kazakhstan', 'KZ', '+76', '/uploads/flag/kazakhstan.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(236, 'Kenya', 'KE', '+254', '/uploads/flag/kenya.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(237, 'Samoa', 'WS', '+685', '/uploads/flag/samoa.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(238, 'Nepal', 'NP', '+977', '/uploads/flag/nepal.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(239, 'Equatorial Guinea', 'GQ', '+240', '/uploads/flag/equatorial_guinea.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(240, 'Lebanon', 'LB', '+961', '/uploads/flag/lebanon.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(241, 'Mauritius', 'MU', '+230', '/uploads/flag/mauritius.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(242, 'Liechtenstein', 'LI', '+423', '/uploads/flag/liechtenstein.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(243, 'Cayman Islands', 'KY', '+1345', '/uploads/flag/cayman_islands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(244, 'Anguilla', 'AI', '+1264', '/uploads/flag/anguilla.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(245, 'Guadeloupe', 'GP', '+590', '/uploads/flag/guadeloupe.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(246, 'Austria', 'AT', '+43', '/uploads/flag/austria.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(247, 'Netherlands', 'NL', '+31', '/uploads/flag/netherlands.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(248, 'Svalbard and Jan Mayen', 'SJ', '+4779', '/uploads/flag/svalbard_and_jan_mayen.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(249, 'Singapore', 'SG', '+65', '/uploads/flag/singapore.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19'),
(250, 'Liberia', 'LR', '+231', '/uploads/flag/liberia.png', '2025-09-18 16:25:19', '2025-09-18 16:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `dm_clearances`
--

CREATE TABLE `dm_clearances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `granted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','revoked') NOT NULL DEFAULT 'active',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dm_clearances`
--

INSERT INTO `dm_clearances` (`id`, `buyer_id`, `seller_id`, `granted_by`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, 'active', 'personaml reasona', '2026-08-25 09:30:22', '2026-09-10 12:40:24');

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
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(255) DEFAULT 'General',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `category`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'What is IT Bid Auction and how does the marketplace work?', 'IT Bid Auction is a dedicated B2B technology clearinghouse connecting verified enterprise buyers and accredited suppliers. Our platform facilitates bulk hardware auctions, reverse procurement bidding, wanted board inquiries, corporate trade-in fleet liquidations, and direct RFQ negotiations for enterprise IT assets under rigorous R2v3, ISO 14001, and e-Stewards standards.', 'General', 'active', 1, '2026-09-02 09:32:12', '2026-09-02 09:32:12'),
(2, 'Who is eligible to participate as a Buyer or Seller on the platform?', 'Participation is open to verified business entities, certified ITAD (IT Asset Disposition) recyclers, corporate enterprises, OEMs, VARs, and authorized hardware brokers. All accounts undergo business entity identity validation and administrative review to maintain transaction security and compliance integrity across the marketplace.', 'General', 'active', 2, '2026-09-02 09:32:12', '2026-09-02 09:32:12'),
(3, 'How do Standard Auctions and Live Bidding work?', 'Sellers list serialized or bulk lots with starting prices, reserve valuations, hardware grading (Grade A, Grade B, etc.), and complete manifests. Verified buyers can submit competitive bids in real-time. Once the auction concludes, the highest qualifying bid above the reserve price locks the lot into contract fulfillment.', 'Auctions & Bidding', 'active', 3, '2026-09-02 09:32:12', '2026-09-02 09:32:12'),
(4, 'What is Reverse Auction sourcing and how do Buyers benefit?', 'In Reverse Auctions, enterprise buyers post specific hardware procurement requirements (such as 200 units of Core i7 laptops or 50 enterprise rack servers). Qualified suppliers submit declining bids to win the fulfillment contract, enabling buyers to source hardware at the most competitive market price.', 'Auctions & Bidding', 'active', 4, '2026-09-02 09:32:12', '2026-09-02 09:32:12'),
(5, 'How does the Direct RFQ Negotiation Gateway operate?', 'Buyers can initiate a direct Request for Quotation (RFQ) on any listing or custom lot. This immediately opens an active direct negotiation thread between the buyer and seller to adjust unit rates, negotiate freight and logistics terms, and finalize commercial agreements without delays.', 'Auctions & Bidding', 'active', 5, '2026-09-02 09:32:12', '2026-09-02 09:32:12'),
(6, 'How does Corporate Trading & Fleet Buyback work for enterprise asset disposal?', 'Corporate Trading allows enterprise organizations and asset managers to liquidate decommissioned or retired hardware fleets in bulk. Sellers submit asset manifests and receive evaluated lot rates, customized logistics pickups, data sanitization certificates, and structured settlement options.', 'Corporate Trading', 'active', 6, '2026-09-02 09:32:12', '2026-09-02 09:32:12'),
(7, 'What data sanitization and environmental compliance standards are required?', 'All asset processing, data wiping, and hardware recycling adhere strictly to NIST 800-88 Rev. 1 sanitization standards and R2v3 / e-Stewards environmental guidelines. Certificates of Data Sanitization (CoD) and Certificates of Destruction (CoD) are logged with cryptographic verification.', 'Compliance & Logistics', 'active', 7, '2026-09-02 09:32:12', '2026-09-02 09:32:12'),
(8, 'What payment methods and settlement options are supported?', 'We support secure wire transfers (ACH/Fedwire), escrow-backed corporate checkout, net-term credit arrangements for accredited enterprise accounts, and verified credit card transactions. Funds are held in escrow until logistics receipt and initial inspection milestones are satisfied.', 'Payments & Security', 'active', 8, '2026-09-02 09:32:12', '2026-09-02 09:32:12'),
(10, 'How does the Reverse Auction mechanism work for enterprise hardware procurement?', 'In a Reverse Auction, enterprise buyers post their exact hardware specifications, target budget ceiling, and quantity required. Qualified and verified sellers then submit competing downward price offers to win the supply contract. The bidding continues until the countdown ends, allowing buyers to secure the lowest market price while suppliers compete fairly under pre-negotiated compliance and escrow terms.', 'Procurement & Bidding', 'active', 0, '2026-11-17 08:43:42', '2026-11-17 08:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `fraud_alerts`
--

CREATE TABLE `fraud_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `severity` enum('critical','high','medium','low') NOT NULL DEFAULT 'high',
  `status` enum('active','acknowledged','resolved') NOT NULL DEFAULT 'active',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fraud_alerts`
--

INSERT INTO `fraud_alerts` (`id`, `title`, `description`, `severity`, `status`, `user_id`, `ip_address`, `location`, `created_at`, `updated_at`) VALUES
(1, 'HIGH FRAUD RISK ORDER', 'Attempted checkout of $120,000 Corp EDP lot. User has no prior order history.', 'critical', 'resolved', NULL, '194.26.29.114', 'Frankfurt, Germany', '2026-08-25 09:30:22', '2026-09-22 13:11:46'),
(2, 'IMPOSSIBLE TRAVEL', 'Login from Paris, France. Previous active session was 20 minutes prior from Chicago, USA.', 'high', 'resolved', NULL, '185.124.112.48', 'Paris, France', '2026-08-25 09:30:22', '2026-09-02 10:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `intrusion_logs`
--

CREATE TABLE `intrusion_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `signature_description` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `severity` enum('critical','high','medium','low') NOT NULL DEFAULT 'medium',
  `payload` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intrusion_logs`
--

INSERT INTO `intrusion_logs` (`id`, `type`, `signature_description`, `ip_address`, `severity`, `payload`, `created_at`, `updated_at`) VALUES
(1, 'Malicious File Extension Blocked', 'User recycle_pro attempted to upload \"invoice_update.exe\" via listing portal. Payload sanitized and quarantined.', '185.124.112.48', 'critical', '{\"filename\":\"invoice_update.exe\",\"mime\":\"application/x-dosexec\",\"size_kb\":450}', '2026-08-25 09:30:22', '2026-08-25 09:30:22'),
(2, 'XSS Injection Prevented', 'Sanitized SQL query injection syntax detected in search bar input: \"SELECT * FROM users...\"', '104.28.244.18', 'medium', '{\"input\":\"\' UNION SELECT username, password FROM users --\",\"endpoint\":\"/auctions/search\"}', '2026-08-25 09:30:22', '2026-08-25 09:30:22'),
(3, 'Brute Force Login Lockout', 'Failed Admin login threshold reached for [admin@itbidauctions.com].', '27.123.86.74', 'critical', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"cooldown_seconds\":494,\"max_attempts\":5}', '2026-10-19 06:48:23', '2026-10-19 06:48:23');

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
(1, '2026_08_11_193633_create_permission_tables', 1),
(2, '2026_08_14_175551_create_users_table', 1),
(3, '2026_08_14_175950_create_cache_table', 1),
(4, '2026_08_14_180121_create_jobs_table', 1),
(5, '2026_08_14_182353_create_user_profiles_table', 1),
(6, '2026_08_14_182815_create_user_documents_table', 1),
(7, '2026_08_14_183302_create_user_status_logs_table', 1),
(8, '2026_08_25_200000_create_security_center_tables', 2),
(9, '2026_08_25_210000_create_tickets_table', 3),
(10, '2026_08_25_231000_create_blogs_table', 4),
(11, '2026_08_25_232000_create_contact_inquiries_table', 5),
(12, '2026_08_28_000001_create_rfq_requests_table', 6),
(13, '2026_08_28_000002_create_rfq_messages_table', 6),
(14, '2026_08_28_000003_add_module_to_rfq_requests_table', 7),
(15, '2026_08_28_020000_create_auctions_and_categories_tables', 8),
(16, '2026_08_28_030000_add_transaction_routes_to_auctions_table', 9),
(17, '2026_08_31_200000_add_approval_workflow_to_auctions_table', 10),
(18, '2026_09_01_010000_add_upload_list_to_auctions_table', 11),
(19, '2026_09_01_020000_add_module_type_to_auctions_table', 12),
(20, '2026_09_01_030000_create_bids_table', 13),
(21, '2026_09_02_200000_create_corporate_tradings_table', 14),
(22, '2026_09_02_210000_create_faqs_table', 15),
(23, '2026_09_02_181318_create_reverse_auctions_table', 16),
(24, '2026_09_02_181840_create_reverse_auction_bids_table', 16),
(25, '2026_09_02_182005_add_reverse_auction_id_to_rfq_requests_table', 16),
(26, '2026_09_02_204100_add_rfq_rejection_fields_table', 16),
(27, '2026_09_03_143748_create_auction_bids_table', 16),
(28, '2026_09_03_144109_create_auction_buy_now_purchases_table', 16),
(29, '2026_09_03_175221_create_wanted_board_requests_table', 16),
(30, '2026_09_03_175557_add_corporate_approval_status_table', 16),
(31, '2026_09_03_180012_add_wanted_corporate_links_to_rfq_requests_table', 16),
(32, '2026_09_05_000001_create_wishlists_table', 17),
(33, '2026_09_04_155655_clean_shared_rfq_architecture_table', 18),
(34, '2026_09_04_185729_add_rfq_suspension_controls', 18),
(35, '2026_09_09_200445_create_corporate_trading_buy_now_purchases_table', 18),
(36, '2026_09_09_201519_normalize_corporate_trading_buy_now_only', 18),
(37, '2026_09_11_000001_migrate_legacy_pending_rfqs_to_ready_to_negotiate', 19),
(38, '2026_09_15_135731_restore_corporate_rfq_without_bidding_table', 20),
(39, '2026_09_17_181130_create_auction_images_table', 20);

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
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6);

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
(1, 'dashboard.view', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(2, 'internal-users.view', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(3, 'internal-users.create-manager', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(4, 'internal-users.create-team-member', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(5, 'internal-users.edit', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(6, 'internal-users.change-status', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(7, 'internal-users.delete', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(8, 'roles.view', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(9, 'roles.create', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(10, 'roles.edit', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(11, 'roles.delete', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(12, 'permissions.view', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(13, 'permissions.create', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(14, 'permissions.edit', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(15, 'permissions.delete', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(16, 'portal-users.view', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(17, 'portal-users.approve', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(18, 'portal-users.reject', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(19, 'portal-users.suspend', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(20, 'portal-documents.view', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(21, 'portal-documents.verify', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(22, 'auction.create', 'web', '2026-08-19 12:12:16', '2026-08-19 12:14:36'),
(23, 'security.manage', 'web', '2026-08-25 09:30:22', '2026-08-25 09:30:22'),
(24, 'security.view', 'web', '2026-08-25 09:30:22', '2026-08-25 09:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `reverse_auctions`
--

CREATE TABLE `reverse_auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `legacy_auction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `currency` char(3) NOT NULL DEFAULT 'USD',
  `budget_ceiling` decimal(15,2) NOT NULL,
  `target_price` decimal(15,2) DEFAULT NULL,
  `bid_decrement` decimal(15,2) NOT NULL DEFAULT 10.00,
  `current_lowest_bid` decimal(15,2) DEFAULT NULL,
  `total_bids` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `condition_grade` varchar(100) DEFAULT NULL,
  `compliance_standards` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `specifications` longtext DEFAULT NULL,
  `terms` longtext DEFAULT NULL,
  `approval_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `status` enum('draft','scheduled','live','ended','cancelled') NOT NULL DEFAULT 'draft',
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint(20) UNSIGNED DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `legacy_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reverse_auctions`
--

INSERT INTO `reverse_auctions` (`id`, `legacy_auction_id`, `reference_number`, `title`, `slug`, `category_id`, `category_name`, `buyer_id`, `created_by`, `currency`, `budget_ceiling`, `target_price`, `bid_decrement`, `current_lowest_bid`, `total_bids`, `quantity`, `condition_grade`, `compliance_standards`, `location`, `start_date`, `end_date`, `featured_image`, `description`, `specifications`, `terms`, `approval_status`, `status`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `rejection_reason`, `is_featured`, `legacy_payload`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'REV-202609-OMUMF', 'Business Laptops – 14 Inch', 'business-laptops-14-inch', 3, 'Laptops & Workstations', 2, 2, 'USD', 42000.00, 750.00, 10.00, 42000.00, 0, 50, 'Grade B', '[]', NULL, '2026-09-23 11:50:04', '2026-09-30 11:50:04', 'reverse-auctions/euq87W49D71fiHI1aaszzseXcKmEGvekVZshRMdn.jpg', 'Procurement of business laptops with Intel Core i5 or equivalent processor, 16GB RAM, 512GB SSD, Wi-Fi, Windows 11 Pro and minimum 3-year onsite warranty.\n', NULL, NULL, 'approved', 'ended', 1, '2026-09-23 11:50:04', NULL, NULL, NULL, 0, NULL, '2026-09-23 10:05:24', '2026-09-30 12:02:12', NULL),
(2, NULL, 'REV-202609-7EWYL', 'Test', 'test', 6, 'Circuit Scrap & Materials', 2, 2, 'USD', 15000.00, NULL, 25.00, 15000.00, 0, 100, 'Grade B', '[]', NULL, '2026-09-24 07:08:50', '2026-10-01 07:08:50', NULL, 'Test Test Test Test Test Test ', NULL, NULL, 'pending', 'draft', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2026-09-24 07:08:50', '2026-09-24 07:13:25', '2026-09-24 07:13:25'),
(3, NULL, 'REV-202609-WP15Y', 'Test', 'test-1', 6, 'Circuit Scrap & Materials', 2, 2, 'USD', 15000.00, 100.00, 25.00, 15000.00, 0, 100, 'Grade B', '[]', NULL, '2026-09-24 07:12:37', '2026-10-01 07:12:37', NULL, 'Test Test Test Test Test Test ', NULL, NULL, 'pending', 'draft', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2026-09-24 07:12:37', '2026-09-24 07:13:19', '2026-09-24 07:13:19'),
(4, NULL, 'REV-202609-1GMAN', 'Test', 'test-2', 6, 'Circuit Scrap & Materials', 2, 2, 'USD', 15000.00, NULL, 25.00, 14975.00, 1, 100, 'Grade B', '[]', NULL, '2026-09-24 07:27:12', '2026-09-24 07:30:07', NULL, 'Test TestTestTestTestTest', NULL, NULL, 'approved', 'ended', 1, '2026-09-24 07:27:12', NULL, NULL, NULL, 0, NULL, '2026-09-24 07:24:49', '2026-09-24 07:30:07', NULL),
(5, NULL, 'REV-202609-TBVS3', 'Dell PowerEdge R740 Server – Bulk Procurement', 'dell-poweredge-r740-server-bulk-procurement', 3, 'Laptops & Workstations', 2, 2, 'USD', 18000.00, 15500.00, 100.00, 17700.00, 3, 25, 'Grade A', '[]', 'Gurugram, Haryana', '2026-09-29 06:49:00', '2026-09-29 14:12:00', NULL, 'Dell PowerEdge R740 servers required for enterprise infrastructure. Minimum 64GB RAM, dual processor configuration, tested and fully functional units required.', NULL, NULL, 'approved', 'ended', 1, '2026-09-29 06:49:42', NULL, NULL, NULL, 0, NULL, '2026-09-29 06:49:18', '2026-09-29 14:15:48', NULL),
(6, NULL, 'REV-202609-4WMVJ', 'Cisco Enterprise Network Switches – Bulk Requirement', 'cisco-enterprise-network-switches-bulk-requirement', 6, 'Circuit Scrap & Materials', 9, 9, 'USD', 12500.00, 10500.00, 50.00, 12300.00, 4, 50, 'Grade A+', '[]', 'Noida, Uttar Pradesh', '2026-09-29 07:04:22', '2026-10-02 07:04:22', NULL, 'Requirement for enterprise-grade managed network switches. Original products with minimum 24 Gigabit ports, tested condition and required accessories.Requirement for enterprise-grade managed network switches. Original products with minimum 24 Gigabit ports, tested condition and required accessories.Requirement for enterprise-grade managed network switches. Original products with minimum 24 Gigabit ports, tested condition and required accessories.Requirement for enterprise-grade managed network switches. Original products with minimum 24 Gigabit ports, tested condition and required accessories.Requirement for enterprise-grade managed network switches. Original products with minimum 24 Gigabit ports, tested condition and required accessories.Requirement for enterprise-grade managed network switches. Original products with minimum 24 Gigabit ports, tested condition and required accessories.Requirement for enterprise-grade managed network switches. Original products with minimum 24 Gigabit ports, tested condition and required accessories.', NULL, NULL, 'approved', 'ended', 1, '2026-09-29 07:04:22', NULL, NULL, NULL, 0, NULL, '2026-09-29 07:04:00', '2026-10-05 11:53:50', NULL),
(7, NULL, 'REV-202609-1TMXQ', 'Business Laptops – Core i5 13th Gen Bulk Purchase', 'business-laptops-core-i5-13th-gen-bulk-purchase', 3, 'Laptops & Workstations', 10, 10, 'USD', 45000.00, 40000.00, 400.00, 45000.00, 0, 100, 'Grade A', '[]', NULL, '2026-09-29 07:21:38', '2026-10-06 07:21:38', 'reverse-auctions/oO5i9LPwPWYuqxbRcV3BedDtAuVWh2EcXkw77o9B.jpg', 'Business-class laptops required for corporate deployment. Intel Core i5 13th Gen or equivalent, minimum 16GB RAM, 512GB SSD and Windows 11 Pro.', NULL, NULL, 'approved', 'ended', 1, '2026-09-29 07:21:38', NULL, NULL, NULL, 0, NULL, '2026-09-29 07:21:01', '2026-10-07 10:15:28', NULL),
(8, NULL, 'REV-202610-XWNBD', 'Bulk Printed Circuit Board (PCB) Scrap Purchase', 'bulk-printed-circuit-board-pcb-scrap-purchase', 6, 'Circuit Scrap & Materials', 2, 2, 'USD', 75000.00, 60000.00, 500.00, 65000.00, 3, 500, 'Grade B', '[\"e-Stewards Verified\"]', 'Delhi,India', '2026-10-19 07:03:38', '2026-10-26 07:03:38', 'reverse-auctions/5mWdZcC2RufzYn8v6iCKEuhl0Ki5OfqQTXYyzQMA.jpg', 'Procurement of mixed printed circuit board (PCB) scrap from electronic devices for authorized material recovery and recycling. Material must be sorted, free from excessive contamination, and packed securely for transportation.', 'Mixed PCB scrap from computers, routers, and electronic equipment. No batteries, hazardous liquid waste, or unrelated municipal waste.', 'Seller must include transportation charges in the quoted price. Material will be inspected upon delivery, and payment will be processed after quantity and quality verification.', 'approved', 'ended', 1, '2026-10-19 07:03:38', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:00:30', '2026-10-26 07:42:56', NULL),
(9, NULL, 'REV-202610-ZVTPP', 'Bulk Enterprise Network Switches Procurement', 'bulk-enterprise-network-switches-procurement', 2, 'Enterprise Networking', 2, 2, 'USD', 25000.00, 20000.00, 250.00, 22000.00, 3, 50, 'Grade A', '[\"ISO 14001\"]', 'New Delhi, India', '2026-10-19 07:16:28', '2026-10-26 07:16:28', 'reverse-auctions/zoAck1bfORBOOQpsg5TEI6ibiuK0swNjZkErbCQr.jpg', 'Procurement of enterprise-grade managed network switches for corporate infrastructure upgrades. Equipment must support VLAN, Layer 3 routing, redundant power supplies, and centralized network management.', '48-port Gigabit Ethernet switches, 10G uplink support, rack-mountable design, and manufacturer warranty.', 'Delivery, installation, and a minimum 3-year manufacturer warranty must be included in the quote.', 'approved', 'ended', 1, '2026-10-19 07:16:28', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:04:59', '2026-10-26 07:42:56', NULL),
(10, NULL, 'REV-202610-LNPX3', 'Enterprise Rack Server Procurement for Data Center', 'enterprise-rack-server-procurement-for-data-center', 1, 'Servers & Blade Infrastructure', 2, 2, 'USD', 50000.00, 42000.00, 250.00, 42500.00, 3, 10, 'Grade A', '[\"ISO 14001\"]', 'Noida, Uttar Pradesh', '2026-10-19 07:16:25', '2026-10-19 09:39:30', 'reverse-auctions/ggDGMs1A3id4ubnoES7sZDXTiKT7S3v1ts5E63Tw.jpg', 'Procurement of enterprise rack servers for virtualization, application hosting, and database workloads. Suppliers must provide compatible hardware, redundant components, and enterprise-level technical support.', 'Dual-socket server platform, 256 GB RAM, enterprise SSD storage, dual redundant power supplies, hardware RAID, and remote management.', 'Include delivery, rack installation, configuration assistance, and a 3-year onsite support agreement.', 'approved', 'ended', 1, '2026-10-19 07:16:25', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:08:55', '2026-10-19 09:39:30', NULL),
(11, NULL, 'REV-202610-RW9CI', 'Enterprise SSD Drives for Server Upgrades', 'enterprise-ssd-drives-for-server-upgrades', 5, 'Components & Memory', 9, 9, 'USD', 12000.00, 10000.00, 100.00, 12000.00, 0, 100, 'Grade A', '[\"ISO 14001\"]', 'Bengaluru, Karnataka', '2026-10-19 09:07:07', '2026-10-26 09:07:07', 'reverse-auctions/hKwQuKNXUSNtEernYCpA0ymFJxpwEJTXR4yOopiS.jpg', 'Procurement of enterprise-grade SSD drives for data center storage expansion. All units must be new, genuine, and compatible with enterprise server environments.', '1.92 TB enterprise SSDs, SATA or SAS interface, power-loss protection, and manufacturer warranty.', 'Include shipping, packaging, taxes, and a minimum 3-year manufacturer warranty.', 'approved', 'ended', 1, '2026-10-19 09:07:07', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:59:02', '2026-10-26 10:37:20', NULL),
(12, NULL, 'REV-202610-5MLBT', 'Enterprise Wireless Access Point Procurement', 'enterprise-wireless-access-point-procurement', 2, 'Enterprise Networking', 9, 9, 'USD', 16000.00, 13000.00, 200.00, 16000.00, 0, 80, 'Grade A', '[\"ISO 14001\"]', 'Hyderabad, Telangana', '2026-10-19 09:07:05', '2026-10-22 09:07:05', 'reverse-auctions/KfsyWl4L7Lx2yeh71JSHYhmmqxiqeJpWHWz9Df7J.jpg', 'Supply of enterprise wireless access points for office connectivity and high-density user environments. Devices must support secure authentication, centralized management, and reliable wireless coverage.', 'Wi-Fi 6, dual-band operation, WPA3 security, VLAN support, PoE compatibility, and centralized controller or cloud management.', 'Include delivery, mounting accessories, required licenses, and a minimum 3-year hardware warranty.', 'approved', 'ended', 1, '2026-10-19 09:07:05', NULL, NULL, NULL, 0, NULL, '2026-10-19 08:01:59', '2026-10-22 19:06:51', NULL),
(13, NULL, 'REV-202610-TUVRI', 'Bulk Purchase of Business-Class Laptops', 'bulk-purchase-of-business-class-laptops', 3, 'Laptops & Workstations', 9, 9, 'USD', 48000.00, 42000.00, 500.00, 48000.00, 0, 60, 'Grade A', '[\"R2v3 Verified\"]', 'Gurugram, Haryana', '2026-10-19 09:07:04', '2026-10-26 09:07:04', 'reverse-auctions/LD9Z5qQ6kVbhIxqdKzqfM5IziGr7NgZt7f3NO4Oa.jpg', 'Procurement of business-class laptops for employee deployment and office expansion. All devices must be new, have consistent configurations, and include genuine operating system licenses.', 'Intel Core i5 or equivalent, 16 GB RAM, 512 GB NVMe SSD, 14-inch Full HD display, Wi-Fi 6, and Windows 11 Pro.', 'Include delivery, taxes, laptop bags, and a 3-year onsite warranty.', 'approved', 'ended', 1, '2026-10-19 09:07:04', NULL, NULL, NULL, 0, NULL, '2026-10-19 08:05:07', '2026-10-26 10:37:20', NULL),
(14, NULL, 'REV-202610-VQFIQ', 'Enterprise Backup Storage System Acquisition', 'enterprise-backup-storage-system-acquisition', 4, 'SAN / NAS Storage Arrays', 10, 10, 'USD', 60000.00, 51000.00, 500.00, 60000.00, 0, 6, 'Grade A', '[\"ISO 14001\"]', 'Mumbai, Maharashtra', '2026-10-19 09:07:02', '2026-10-26 09:07:02', 'reverse-auctions/ZkG6nfnBxIqdp5gWKZ774LRzYcUygyB9A8veVaK3.jpg', 'Procurement of enterprise storage arrays for centralized backups, disaster recovery, and business-critical data retention. Systems must provide data protection and support future storage expansion.', 'Minimum 100 TB raw capacity per system, RAID support, redundant controllers, 10 GbE connectivity, snapshots, and replication.', 'Include storage drives, software licenses, installation, configuration, freight, and a minimum 3-year support agreement.', 'approved', 'ended', 1, '2026-10-19 09:07:02', NULL, NULL, NULL, 0, NULL, '2026-10-19 08:08:59', '2026-10-26 10:37:20', NULL),
(15, NULL, 'REV-202610-BX52Q', 'Enterprise Virtualization Rack Server Procurement', 'enterprise-virtualization-rack-server-procurement', 1, 'Servers & Blade Infrastructure', 10, 10, 'USD', 80000.00, 68000.00, 1000.00, 80000.00, 0, 8, 'Grade A', '[\"ISO 14001\"]', 'Noida, Uttar Pradesh', '2026-10-28 08:10:00', '2026-10-28 08:52:04', 'reverse-auctions/86qhROs2Ca0Fm69jAnZf2zW8B368vwk0WhqiagNX.jpg', 'Supply of enterprise rack servers to consolidate workloads and deploy virtual machines for business applications. Servers must support high availability and remote hardware management.', 'Dual-socket capable platform, 256 GB ECC RAM, enterprise NVMe storage, hardware RAID, redundant power supplies, and remote management.', 'Include rack installation, configuration assistance, delivery, and a 3-year onsite support agreement.', 'approved', 'ended', 1, '2026-10-19 09:07:00', NULL, NULL, NULL, 0, NULL, '2026-10-19 08:12:04', '2026-10-28 08:52:04', NULL),
(16, NULL, 'REV-202610-U1FOV', 'Bulk Aluminum Scrap for Recycling Operations', 'bulk-aluminum-scrap-for-recycling-operations', 6, 'Circuit Scrap & Materials', 10, 10, 'USD', 7500.00, 6500.00, 100.00, 7500.00, 0, 5000, 'Grade B', '[\"e-Stewards Verified\"]', 'Jaipur, Rajasthan', '2026-10-19 09:06:00', '2026-10-19 10:03:00', 'reverse-auctions/CKzgANpnSNi2czG1FocHNJ4Ekn6TvoImj1J8WSGB.jpg', 'Procurement of sorted industrial aluminum scrap for recycling and secondary metal recovery. Suppliers must provide consistent material quality and ensure that scrap is free from hazardous contamination.', 'Sorted aluminum scrap, clearly identified alloy or material type, free from excessive moisture, oils, and unrelated materials.', 'Quotes must include transportation, loading, packaging, and weight verification. Final acceptance is subject to material inspection.', 'approved', 'ended', 1, '2026-10-19 09:06:58', NULL, NULL, NULL, 0, NULL, '2026-10-19 08:14:09', '2026-10-28 08:02:03', NULL),
(17, NULL, 'REV-202611-LQB1H', 'Procurement Tender: 500x Enterprise Grade 1.92TB SATA 2.5\" SSDs (Samsung PM893 / Micron 5400)', 'procurement-tender-500x-sata-ssds-o7dn', 4, 'SAN / NAS Storage Arrays', 2, 2, 'USD', 65000.00, 52500.00, 500.00, 57000.00, 4, 500, 'Factory Recertified or New Pulls', '[\"ISO 9001\",\"SMART Health 100% verified\"]', 'Shipment to Chicago Receiving Hub', '2026-11-16 20:43:42', '2026-11-22 08:43:42', NULL, 'Enterprise data center operator seeking verified supplier quotes for 500 units of enterprise read-intensive 1.92TB SATA 6Gb/s 2.5\" SSDs. Drives must have 100% remaining endurance lifetime and clean OEM firmware.', 'Capacity: 1.92TB (1920GB)\nInterface: SATA 6Gb/s\nForm Factor: 2.5\" 7mm\nAcceptable OEM Models: Samsung PM883 / PM893, Micron 5300 PRO / 5400 PRO, Intel D3-S4510 / S4610\nHealth: 100% SMART life remaining, zero bad sectors', 'Net-30 or Escrow payment upon 48-hour delivery inspection. Suppliers must hold R2v3 or ISO certification.', 'approved', 'live', 1, '2026-11-17 08:43:42', NULL, NULL, NULL, 1, NULL, '2026-11-17 08:43:42', '2026-11-17 08:45:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reverse_auction_bids`
--

CREATE TABLE `reverse_auction_bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reverse_auction_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `currency` char(3) NOT NULL DEFAULT 'USD',
  `amount_per_unit` decimal(15,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total_amount` decimal(18,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` enum('winning','outbid','accepted','rejected','withdrawn') NOT NULL DEFAULT 'winning',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reverse_auction_bids`
--

INSERT INTO `reverse_auction_bids` (`id`, `reverse_auction_id`, `seller_id`, `currency`, `amount_per_unit`, `quantity`, `total_amount`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'USD', 14975.00, 100, 1497500.00, 'Test', 'rejected', '2026-09-24 07:28:04', '2026-09-24 07:30:07'),
(2, 4, 3, 'USD', 14845.00, 100, 1484500.00, 'Awarded through Direct RFQ RFQ-2026-R4XSRX at negotiated terms.', 'accepted', '2026-09-24 07:30:07', '2026-09-24 07:30:07'),
(3, 5, 3, 'USD', 17900.00, 25, 447500.00, NULL, 'outbid', '2026-09-29 06:51:50', '2026-09-29 06:56:12'),
(4, 5, 7, 'USD', 17800.00, 25, 445000.00, NULL, 'outbid', '2026-09-29 06:56:12', '2026-09-29 06:58:05'),
(5, 5, 8, 'USD', 17700.00, 25, 442500.00, NULL, 'accepted', '2026-09-29 06:58:05', '2026-09-29 15:27:26'),
(6, 6, 8, 'USD', 12450.00, 50, 622500.00, NULL, 'outbid', '2026-09-29 07:05:49', '2026-09-29 07:06:11'),
(7, 6, 3, 'USD', 12400.00, 50, 620000.00, NULL, 'outbid', '2026-09-29 07:06:11', '2026-09-29 07:06:30'),
(8, 6, 7, 'USD', 12350.00, 50, 617500.00, NULL, 'outbid', '2026-09-29 07:06:30', '2026-09-29 07:08:16'),
(9, 6, 7, 'USD', 12300.00, 50, 615000.00, NULL, 'winning', '2026-09-29 07:08:16', '2026-09-29 07:08:16'),
(10, 10, 7, 'USD', 50000.00, 10, 500000.00, 'You will not regret it', 'outbid', '2026-10-19 07:53:35', '2026-10-19 08:01:54'),
(11, 9, 7, 'USD', 24749.00, 50, 1237450.00, 'This is the best stock, you will get', 'outbid', '2026-10-19 07:54:26', '2026-10-19 08:02:11'),
(12, 8, 7, 'USD', 75000.00, 500, 37500000.00, 'Buy the best stock', 'outbid', '2026-10-19 07:54:52', '2026-10-19 08:02:29'),
(13, 10, 7, 'USD', 49750.00, 10, 497500.00, 'Buy this stock at less price but best stock', 'outbid', '2026-10-19 08:01:54', '2026-10-19 08:04:14'),
(14, 9, 7, 'USD', 24499.00, 50, 1224950.00, 'Cheap but best', 'outbid', '2026-10-19 08:02:11', '2026-10-19 08:04:41'),
(15, 8, 7, 'USD', 74500.00, 500, 37250000.00, 'Get the best', 'outbid', '2026-10-19 08:02:29', '2026-10-19 08:05:20'),
(16, 10, 3, 'USD', 42500.00, 10, 425000.00, 'sale is on, get this now', 'rejected', '2026-10-19 08:04:14', '2026-10-19 09:39:30'),
(17, 9, 3, 'USD', 22000.00, 50, 1100000.00, 'Order now, sale is on', 'winning', '2026-10-19 08:04:41', '2026-10-19 08:04:41'),
(18, 8, 3, 'USD', 65000.00, 500, 32500000.00, 'Get the best at cheapest', 'winning', '2026-10-19 08:05:20', '2026-10-19 08:05:20'),
(19, 10, 3, 'USD', 4250000.00, 10, 42500000.00, 'Awarded through Direct RFQ RFQ-2026-ILKAWL at negotiated terms.', 'accepted', '2026-10-19 09:39:30', '2026-10-19 09:39:30'),
(20, 16, 3, 'USD', 7000.00, 5000, 35000000.00, 'Awarded through Direct RFQ RFQ-2026-OJVJ0W at negotiated terms.', 'accepted', '2026-10-19 10:03:06', '2026-10-19 10:03:06'),
(21, 15, 3, 'USD', 98456.00, 8, 787648.00, 'Awarded through Direct RFQ RFQ-2026-ZN77JR at negotiated terms.', 'accepted', '2026-10-28 08:52:04', '2026-10-28 08:52:04'),
(22, 17, 7, 'USD', 57500.00, 500, 28750000.00, 'Supplier verified quotation with 100% SMART health certificate.', 'outbid', '2026-11-17 08:45:03', '2026-11-17 08:45:31'),
(23, 17, 7, 'USD', 57000.00, 500, 28500000.00, 'Supplier verified quotation with 100% SMART health certificate.', 'winning', '2026-11-17 08:45:31', '2026-11-17 08:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_messages`
--

CREATE TABLE `rfq_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfq_request_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'message',
  `message` text DEFAULT NULL,
  `price_per_unit` decimal(12,2) DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `total_amount` decimal(14,2) DEFAULT NULL,
  `offer_status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rfq_messages`
--

INSERT INTO `rfq_messages` (`id`, `rfq_request_id`, `user_id`, `type`, `message`, `price_per_unit`, `quantity`, `total_amount`, `offer_status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'counter_offer', 'Hello, we can offer 5 units of Dell PowerEdge R740 at USD 1,650 per unit. Units are Grade A refurbished, tested and include a 90-day warranty. Please confirm if this offer works for you.', 1650.00, 50, 82500.00, 'accepted', '2026-09-23 14:23:22', '2026-09-23 14:26:55'),
(2, 1, 2, 'accept', 'jaklin farnadis confirmed the commercial offer at USD 1,650.00/unit for 50 unit(s), total USD 82,500.00. Wanted Board requirement marked Fulfilled.', 1650.00, 50, 82500.00, 'accepted', '2026-09-23 14:26:55', '2026-09-23 14:26:55'),
(3, 2, 3, 'counter_offer', 'Hello Tata Services, we can supply Dell PowerEdge R740 servers in Grade A refurbished condition. Our offer is USD 1,550 per unit for 5 units. Each server will be tested and includes a 90-day warranty. Please confirm if you would like to proceed.', 1400.00, 100, 140000.00, 'declined', '2026-09-23 14:32:21', '2026-09-23 14:32:42'),
(4, 2, 2, 'decline', 'jaklin farnadis ended this RFQ negotiation. Further messaging is disabled.', NULL, NULL, NULL, 'declined', '2026-09-23 14:32:42', '2026-09-23 14:32:42'),
(5, 3, 3, 'system', 'hello we are here opened a Direct RFQ for Reverse Auction REV-202609-1GMAN. Use messages or a specific counter offer to negotiate commercial terms.', NULL, NULL, NULL, NULL, '2026-09-24 07:28:09', '2026-09-24 07:28:09'),
(6, 3, 3, 'counter_offer', '14845', 14845.00, 100, 1484500.00, 'accepted', '2026-09-24 07:28:41', '2026-09-24 07:30:07'),
(7, 3, 2, 'accept', 'jaklin farnadis confirmed the commercial offer at USD 14,845.00/unit for 100 unit(s), total USD 1,484,500.00. Reverse Auction awarded to this Seller and competing award paths were closed.', 14845.00, 100, 1484500.00, 'accepted', '2026-09-24 07:30:07', '2026-09-24 07:30:07'),
(8, 4, 3, 'system', 'hello we are here opened a Direct RFQ for Reverse Auction REV-202609-OMUMF. Use messages or a specific counter offer to negotiate commercial terms.', NULL, NULL, NULL, NULL, '2026-09-28 13:53:49', '2026-09-28 13:53:49'),
(9, 6, 8, 'system', 'Seller2 opened a Direct RFQ for Reverse Auction REV-202609-1TMXQ. Use messages or a specific counter offer to negotiate commercial terms.', NULL, NULL, NULL, NULL, '2026-09-29 07:46:41', '2026-09-29 07:46:41'),
(10, 7, 2, 'decline', 'jaklin farnadis ended this RFQ negotiation. Further messaging is disabled.', NULL, NULL, NULL, 'declined', '2026-09-29 15:28:14', '2026-09-29 15:28:14'),
(11, 8, 3, 'system', 'hello we are here opened a Direct RFQ for Reverse Auction REV-202609-4WMVJ. Use messages or a specific counter offer to negotiate commercial terms.', NULL, NULL, NULL, NULL, '2026-09-30 12:54:18', '2026-09-30 12:54:18'),
(12, 5, 3, 'message', 'hi', NULL, NULL, NULL, NULL, '2026-10-09 12:49:11', '2026-10-09 12:49:11'),
(13, 9, 2, 'message', 'I want to buy this item', NULL, NULL, NULL, NULL, '2026-10-19 09:06:48', '2026-10-19 09:06:48'),
(14, 9, 2, 'message', 'Are you there', NULL, NULL, NULL, NULL, '2026-10-19 09:09:09', '2026-10-19 09:09:09'),
(15, 9, 3, 'message', 'A', NULL, NULL, NULL, NULL, '2026-10-19 09:09:35', '2026-10-19 09:09:35'),
(16, 9, 3, 'message', 'Address', NULL, NULL, NULL, NULL, '2026-10-19 09:10:09', '2026-10-19 09:10:09'),
(17, 9, 3, 'message', 'AQ', NULL, NULL, NULL, NULL, '2026-10-19 09:10:50', '2026-10-19 09:10:50'),
(18, 9, 2, 'message', 'I want to buy at this price', NULL, NULL, NULL, NULL, '2026-10-19 09:13:37', '2026-10-19 09:13:37'),
(19, 9, 2, 'counter_offer', 'I want to buy at this price', 2.00, 50, 100.00, 'accepted', '2026-10-19 09:14:11', '2026-10-19 09:14:45'),
(20, 9, 3, 'accept', 'hello we are here confirmed the commercial offer at USD 2.00/unit for 50 unit(s), total USD 100.00. Corporate Trading listing marked Sold/Ended and an order record was created.', 2.00, 50, 100.00, 'accepted', '2026-10-19 09:14:45', '2026-10-19 09:14:45'),
(21, 10, 2, 'system', 'jaklin farnadis opened a Direct RFQ for Reverse Auction REV-202610-LNPX3. Use messages or a specific counter offer to negotiate commercial terms.', NULL, NULL, NULL, NULL, '2026-10-19 09:30:00', '2026-10-19 09:30:00'),
(22, 10, 2, 'message', 'then moves towards the deal confirmation', NULL, NULL, NULL, NULL, '2026-10-19 09:30:48', '2026-10-19 09:30:48'),
(23, 10, 3, 'message', 'ersadtd', NULL, NULL, NULL, NULL, '2026-10-19 09:34:35', '2026-10-19 09:34:35'),
(24, 10, 3, 'counter_offer', 'wer', 123.00, 10, 1230.00, 'superseded', '2026-10-19 09:35:06', '2026-10-19 09:36:05'),
(25, 10, 2, 'message', 'not at this amount', NULL, NULL, NULL, NULL, '2026-10-19 09:35:43', '2026-10-19 09:35:43'),
(26, 10, 2, 'counter_offer', 'we offered me at this price', 425000.00, 10, 4250000.00, 'superseded', '2026-10-19 09:36:05', '2026-10-19 09:39:02'),
(27, 10, 3, 'counter_offer', 'gkg', 4250000.00, 10, 42500000.00, 'accepted', '2026-10-19 09:39:02', '2026-10-19 09:39:30'),
(28, 10, 2, 'accept', 'jaklin farnadis confirmed the commercial offer at USD 4,250,000.00/unit for 10 unit(s), total USD 42,500,000.00. Reverse Auction awarded to this Seller and competing award paths were closed.', 4250000.00, 10, 42500000.00, 'accepted', '2026-10-19 09:39:30', '2026-10-19 09:39:30'),
(29, 11, 7, 'message', 'hoi', NULL, NULL, NULL, NULL, '2026-10-19 09:42:51', '2026-10-19 09:42:51'),
(30, 12, 3, 'message', 'hi', NULL, NULL, NULL, NULL, '2026-10-19 09:44:56', '2026-10-19 09:44:56'),
(31, 12, 9, 'message', 'hello', NULL, NULL, NULL, NULL, '2026-10-19 09:46:21', '2026-10-19 09:46:21'),
(32, 12, 3, 'counter_offer', 'dc', 10000.00, 4, 40000.00, 'superseded', '2026-10-19 09:46:48', '2026-10-19 09:50:33'),
(33, 12, 9, 'counter_offer', 'can we come together at this price', 9000.00, 4, 36000.00, 'superseded', '2026-10-19 09:50:33', '2026-10-19 09:51:47'),
(34, 12, 3, 'counter_offer', 'diwali sale', 9999.00, 4, 39996.00, 'declined', '2026-10-19 09:51:47', '2026-10-19 09:52:25'),
(35, 12, 9, 'decline', 'Buyer1 ended this RFQ negotiation. Further messaging is disabled.', NULL, NULL, NULL, 'declined', '2026-10-19 09:52:25', '2026-10-19 09:52:25'),
(36, 13, 3, 'message', 'hii', NULL, NULL, NULL, NULL, '2026-10-19 09:54:02', '2026-10-19 09:54:02'),
(37, 14, 3, 'system', 'hello we are here opened a Direct RFQ for Reverse Auction REV-202610-U1FOV. Use messages or a specific counter offer to negotiate commercial terms.', NULL, NULL, NULL, NULL, '2026-10-19 09:57:06', '2026-10-19 09:57:06'),
(38, 14, 3, 'message', 'hi', NULL, NULL, NULL, NULL, '2026-10-19 09:57:29', '2026-10-19 09:57:29'),
(39, 14, 10, 'message', 'ftfuffcguh', NULL, NULL, NULL, NULL, '2026-10-19 09:58:00', '2026-10-19 09:58:00'),
(40, 14, 3, 'counter_offer', 'tgtdf', 7600.00, 5000, 38000000.00, 'superseded', '2026-10-19 09:58:15', '2026-10-19 10:00:31'),
(41, 14, 3, 'counter_offer', 'gdg', 7800.00, 5000, 39000000.00, 'superseded', '2026-10-19 10:00:31', '2026-10-19 10:01:18'),
(42, 14, 3, 'counter_offer', 'hrt', 7900.00, 5000, 39500000.00, 'superseded', '2026-10-19 10:01:18', '2026-10-19 10:01:35'),
(43, 14, 10, 'counter_offer', 'I want to buy at this price', 7000.00, 5000, 35000000.00, 'superseded', '2026-10-19 10:01:35', '2026-10-19 10:02:44'),
(44, 14, 3, 'counter_offer', 'gfvctuv', 7000.00, 5000, 35000000.00, 'accepted', '2026-10-19 10:02:44', '2026-10-19 10:03:06'),
(45, 14, 10, 'accept', 'Buyer2 confirmed the commercial offer at USD 7,000.00/unit for 5,000 unit(s), total USD 35,000,000.00. Reverse Auction awarded to this Seller and competing award paths were closed.', 7000.00, 5000, 35000000.00, 'accepted', '2026-10-19 10:03:06', '2026-10-19 10:03:06'),
(46, 5, 2, 'message', 'sdfds', NULL, NULL, NULL, NULL, '2026-10-28 07:48:49', '2026-10-28 07:48:49'),
(47, 5, 2, 'message', 'sdfsdhasddkljklas tklasjkd fasd', NULL, NULL, NULL, NULL, '2026-10-28 07:48:59', '2026-10-28 07:48:59'),
(48, 5, 2, 'message', 'dsdfg sdfgsdf', NULL, NULL, NULL, NULL, '2026-10-28 07:53:07', '2026-10-28 07:53:07'),
(49, 5, 2, 'counter_offer', 'ghjghj', 100.00, 100, 10000.00, 'pending', '2026-10-28 07:54:53', '2026-10-28 07:54:53'),
(50, 15, 3, 'system', 'hello we are here opened a Direct RFQ for Reverse Auction REV-202610-BX52Q. Use messages or a specific counter offer to negotiate commercial terms.', NULL, NULL, NULL, NULL, '2026-10-28 08:21:48', '2026-10-28 08:21:48'),
(51, 15, 3, 'message', 'hii', NULL, NULL, NULL, NULL, '2026-10-28 08:22:00', '2026-10-28 08:22:00'),
(52, 15, 10, 'counter_offer', 'i want it at this price', 85000.00, 8, 680000.00, 'superseded', '2026-10-28 08:22:45', '2026-10-28 08:24:58'),
(53, 15, 3, 'counter_offer', 'ok', 85000.00, 8, 680000.00, 'superseded', '2026-10-28 08:24:58', '2026-10-28 08:50:33'),
(54, 15, 10, 'counter_offer', 'few', 5111.00, 8, 40888.00, 'superseded', '2026-10-28 08:50:33', '2026-10-28 08:51:35'),
(55, 15, 3, 'counter_offer', 'bjg', 98456.00, 8, 787648.00, 'accepted', '2026-10-28 08:51:35', '2026-10-28 08:52:04'),
(56, 15, 10, 'accept', 'Buyer2 confirmed the commercial offer at USD 98,456.00/unit for 8 unit(s), total USD 787,648.00. Reverse Auction awarded to this Seller and competing award paths were closed.', 98456.00, 8, 787648.00, 'accepted', '2026-10-28 08:52:04', '2026-10-28 08:52:04'),
(57, 16, 7, 'system', 'Seller1 opened a Direct RFQ for Reverse Auction REV-202611-LQB1H. Use messages or a specific counter offer to negotiate commercial terms.', NULL, NULL, NULL, NULL, '2026-11-17 08:45:03', '2026-11-17 08:45:03'),
(58, 16, 7, 'message', 'Hello, we have ready inventory in our Chicago hub. Can dispatch within 24 hours of PO confirmation.', NULL, NULL, NULL, NULL, '2026-11-17 08:45:31', '2026-11-17 08:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_requests`
--

CREATE TABLE `rfq_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfq_number` varchar(255) NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `module` varchar(50) NOT NULL DEFAULT 'auction',
  `auction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reverse_auction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `target_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `current_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `currency` varchar(10) NOT NULL DEFAULT 'USD',
  `terms` text DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'approved',
  `rejection_reason` text DEFAULT NULL,
  `is_suspended` tinyint(1) NOT NULL DEFAULT 0,
  `suspended_by` bigint(20) UNSIGNED DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `suspension_reason` text DEFAULT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint(20) UNSIGNED DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `last_activity_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `wanted_board_id` bigint(20) UNSIGNED DEFAULT NULL,
  `corporate_trading_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rfq_requests`
--

INSERT INTO `rfq_requests` (`id`, `rfq_number`, `buyer_id`, `seller_id`, `product_name`, `category`, `module`, `auction_id`, `reverse_auction_id`, `quantity`, `target_price`, `current_price`, `currency`, `terms`, `status`, `rejection_reason`, `is_suspended`, `suspended_by`, `suspended_at`, `suspension_reason`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `last_activity_at`, `created_at`, `updated_at`, `wanted_board_id`, `corporate_trading_id`) VALUES
(1, 'RFQ-2026-99GTI1', 2, 3, 'Enterprise SSD Storage Drive', 'Components & Memory', 'wanted_board', NULL, NULL, 50, 180.00, 1650.00, 'USD', 'Please quote for 50 units with bulk pricing. Include warranty, health/life percentage if refurbished, delivery time, and return/replacement terms.', 'accepted', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-09-23 14:26:55', '2026-09-23 14:20:30', '2026-09-23 14:26:55', 3, NULL),
(2, 'RFQ-2026-LQWFVI', 2, 3, 'Dell PowerEdge R740 Server', 'Laptops & Workstations', 'wanted_board', NULL, NULL, 100, 5.00, 1400.00, 'USD', 'Please provide unit price, bulk discount, warranty period, lead time, and shipping cost. Seller must provide actual product photos and serial numbers before purchase.', 'declined', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-09-23 14:32:42', '2026-09-23 14:29:57', '2026-09-23 14:32:42', 1, NULL),
(3, 'RFQ-2026-R4XSRX', 2, 3, 'Test', 'Circuit Scrap & Materials', 'reverse_auction', NULL, 4, 100, 14975.00, 14845.00, 'USD', NULL, 'accepted', NULL, 0, NULL, NULL, NULL, NULL, '2026-09-24 07:28:09', NULL, NULL, '2026-09-24 07:30:07', '2026-09-24 07:28:09', '2026-09-24 07:30:07', NULL, NULL),
(4, 'RFQ-2026-ULNR6O', 2, 3, 'Business Laptops – 14 Inch', 'Laptops & Workstations', 'reverse_auction', NULL, 1, 50, 42000.00, 42000.00, 'USD', NULL, 'approved', NULL, 0, NULL, NULL, NULL, NULL, '2026-09-28 13:53:49', NULL, NULL, '2026-09-28 13:53:49', '2026-09-28 13:53:49', '2026-09-28 13:53:49', NULL, NULL),
(5, 'RFQ-2026-GLNX2P', 2, 3, 'Dell PowerEdge R740 Server', 'Laptops & Workstations', 'wanted_board', NULL, NULL, 100, 5.00, 100.00, 'USD', 'Please provide unit price, bulk discount, warranty period, lead time, and shipping cost. Seller must provide actual product photos and serial numbers before purchase.', 'negotiating', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-28 07:54:53', '2026-09-28 13:54:49', '2026-10-28 07:54:53', 1, NULL),
(6, 'RFQ-2026-VN67F4', 10, 8, 'Business Laptops – Core i5 13th Gen Bulk Purchase', 'Laptops & Workstations', 'reverse_auction', NULL, 7, 100, 45000.00, 45000.00, 'USD', NULL, 'approved', NULL, 0, NULL, NULL, NULL, NULL, '2026-09-29 07:46:41', NULL, NULL, '2026-09-29 07:46:41', '2026-09-29 07:46:41', '2026-09-29 07:46:41', NULL, NULL),
(7, 'RFQ-2026-BSERWC', 2, 8, 'Dell PowerEdge R740 Server', 'Laptops & Workstations', 'wanted_board', NULL, NULL, 100, 5.00, 5.00, 'USD', 'Please provide unit price, bulk discount, warranty period, lead time, and shipping cost. Seller must provide actual product photos and serial numbers before purchase.', 'declined', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-09-29 15:28:14', '2026-09-29 07:46:58', '2026-09-29 15:28:14', 1, NULL),
(8, 'RFQ-2026-W0FOAT', 9, 3, 'Cisco Enterprise Network Switches – Bulk Requirement', 'Circuit Scrap & Materials', 'reverse_auction', NULL, 6, 50, 12400.00, 12400.00, 'USD', NULL, 'approved', NULL, 0, NULL, NULL, NULL, NULL, '2026-09-30 12:54:18', NULL, NULL, '2026-09-30 12:54:18', '2026-09-30 12:54:18', '2026-09-30 12:54:18', NULL, NULL),
(9, 'RFQ-2026-FNDAYP', 2, 3, 'Dell Latitude 5420 Laptops', 'Laptops & Workstations', 'corporate_trading', NULL, NULL, 50, 0.01, 2.00, 'USD', NULL, 'accepted', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-19 09:14:45', '2026-10-19 09:06:48', '2026-10-19 09:14:45', NULL, 19),
(10, 'RFQ-2026-ILKAWL', 2, 3, 'Enterprise Rack Server Procurement for Data Center', 'Servers & Blade Infrastructure', 'reverse_auction', NULL, 10, 10, 42500.00, 4250000.00, 'USD', 'Include delivery, rack installation, configuration assistance, and a 3-year onsite support agreement.', 'accepted', NULL, 0, NULL, NULL, NULL, NULL, '2026-10-19 09:30:00', NULL, NULL, '2026-10-19 09:39:30', '2026-10-19 09:30:00', '2026-10-19 09:39:30', NULL, NULL),
(11, 'RFQ-2026-JY7WU0', 9, 7, 'GPU-Enabled AI Compute Servers', 'Servers & Blade Infrastructure', 'wanted_board', NULL, NULL, 4, 12000.00, 12000.00, 'USD', 'Provide the complete hardware configuration, exact GPU model, power requirements, AI software compatibility, warranty coverage, shipping, installation, and delivery lead time. State any optional software licensing costs separately.', 'negotiating', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-19 09:42:51', '2026-10-19 09:42:00', '2026-10-19 09:42:51', 15, NULL),
(12, 'RFQ-2026-KL62PK', 9, 3, 'GPU-Enabled AI Compute Servers', 'Servers & Blade Infrastructure', 'wanted_board', NULL, NULL, 4, 12000.00, 9999.00, 'USD', 'Provide the complete hardware configuration, exact GPU model, power requirements, AI software compatibility, warranty coverage, shipping, installation, and delivery lead time. State any optional software licensing costs separately.', 'declined', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-19 09:52:25', '2026-10-19 09:44:48', '2026-10-19 09:52:25', 15, NULL),
(13, 'RFQ-2026-O1XA8F', 9, 3, 'GPU-Enabled AI Compute Servers', 'Servers & Blade Infrastructure', 'wanted_board', NULL, NULL, 4, 12000.00, 12000.00, 'USD', 'Provide the complete hardware configuration, exact GPU model, power requirements, AI software compatibility, warranty coverage, shipping, installation, and delivery lead time. State any optional software licensing costs separately.', 'negotiating', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-19 09:54:02', '2026-10-19 09:53:51', '2026-10-19 09:54:02', 15, NULL),
(14, 'RFQ-2026-OJVJ0W', 10, 3, 'Bulk Aluminum Scrap for Recycling Operations', 'Circuit Scrap & Materials', 'reverse_auction', NULL, 16, 5000, 7500.00, 7000.00, 'USD', 'Quotes must include transportation, loading, packaging, and weight verification. Final acceptance is subject to material inspection.', 'accepted', NULL, 0, NULL, NULL, NULL, NULL, '2026-10-19 09:57:06', NULL, NULL, '2026-10-19 10:03:06', '2026-10-19 09:57:06', '2026-10-19 10:03:06', NULL, NULL),
(15, 'RFQ-2026-ZN77JR', 10, 3, 'Enterprise Virtualization Rack Server Procurement', 'Servers & Blade Infrastructure', 'reverse_auction', NULL, 15, 8, 80000.00, 98456.00, 'USD', 'Include rack installation, configuration assistance, delivery, and a 3-year onsite support agreement.', 'accepted', NULL, 0, NULL, NULL, NULL, NULL, '2026-10-28 08:21:48', NULL, NULL, '2026-10-28 08:52:04', '2026-10-28 08:21:48', '2026-10-28 08:52:04', NULL, NULL),
(16, 'RFQ-2026-QZLQBC', 2, 7, 'Procurement Tender: 500x Enterprise Grade 1.92TB SATA 2.5\" SSDs (Samsung PM893 / Micron 5400)', 'SAN / NAS Storage Arrays', 'reverse_auction', NULL, 17, 500, 57500.00, 57500.00, 'USD', 'Net-30 or Escrow payment upon 48-hour delivery inspection. Suppliers must hold R2v3 or ISO certification.', 'approved', NULL, 0, NULL, NULL, NULL, NULL, '2026-11-17 08:45:03', NULL, NULL, '2026-11-17 08:45:03', '2026-11-17 08:45:03', '2026-11-17 08:45:03', NULL, NULL);

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
(1, 'Admin', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(2, 'Manager', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08'),
(3, 'Team Member', 'web', '2026-08-19 07:46:08', '2026-08-19 07:46:08');

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
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(22, 2),
(23, 1),
(24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `security_audit_logs`
--

CREATE TABLE `security_audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actor_uid` varchar(255) NOT NULL DEFAULT 'system',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action_type` varchar(255) NOT NULL,
  `telemetry` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `audit_code` varchar(255) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `security_audit_logs`
--

INSERT INTO `security_audit_logs` (`id`, `actor_uid`, `user_id`, `action_type`, `telemetry`, `ip_address`, `location`, `audit_code`, `details`, `created_at`, `updated_at`) VALUES
(1, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-XGWFZ1', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-22 11:56:19', '2026-09-22 11:56:19'),
(2, 'seller@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-XEAV5P', '{\"guard\":\"portal\",\"email\":\"seller@gmail.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-09-22 11:59:53', '2026-09-22 11:59:53'),
(3, 'seller@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-XZ7T4M', '{\"guard\":\"portal\",\"email\":\"seller@gmail.com\",\"attempts_remaining\":3,\"ip\":\"125.21.4.83\"}', '2026-09-22 11:59:55', '2026-09-22 11:59:55'),
(4, 'seller@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-I1SLUX', '{\"guard\":\"portal\",\"email\":\"seller@gmail.com\",\"attempts_remaining\":2,\"ip\":\"125.21.4.83\"}', '2026-09-22 11:59:57', '2026-09-22 11:59:57'),
(5, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-0ZI9IZ', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-22 12:00:03', '2026-09-22 12:00:03'),
(6, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-0YILQ3', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-22 12:00:55', '2026-09-22 12:00:55'),
(7, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-XLTV6J', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-22 13:09:45', '2026-09-22 13:09:45'),
(8, 'admin', 1, 'DEFENSES_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-9XTCDS', '{\"field\":\"high_security_mode\",\"new_value\":true,\"status\":\"ENABLED\"}', '2026-09-22 13:10:07', '2026-09-22 13:10:07'),
(9, 'admin', 1, 'SETTINGS_MODIFIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-KXLI6M', '{\"action\":\"Defenses Configuration parameters saved\",\"max_login_attempts\":5,\"lockout_duration\":9,\"session_timeout\":120}', '2026-09-22 13:10:11', '2026-09-22 13:10:11'),
(10, 'admin', 1, 'FRAUD_ALERT_RESOLVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-AQFPWD', '{\"alert_id\":1,\"title\":\"HIGH FRAUD RISK ORDER\",\"ip_address\":\"194.26.29.114\"}', '2026-09-22 13:11:46', '2026-09-22 13:11:46'),
(11, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-G6OSQT', '{\"auction_id\":24,\"lot_number\":\"AUC-202609-D2UU\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-22 13:13:03', '2026-09-22 13:13:03'),
(12, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-AMRAVN', '{\"auction_id\":24,\"lot_number\":\"AUC-202609-D2UU\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-22 13:14:10', '2026-09-22 13:14:10'),
(13, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-0IQIUY', '{\"auction_id\":24,\"lot_number\":\"AUC-202609-D2UU\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-22 13:17:32', '2026-09-22 13:17:32'),
(14, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MPKA58', '{\"auction_id\":23,\"lot_number\":\"AUC-202609-SF5V\",\"transaction_routes\":[\"forward\",\"buy_now\"],\"updated_by\":1}', '2026-09-22 13:22:16', '2026-09-22 13:22:16'),
(15, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ZFH1G2', '{\"auction_id\":23,\"lot_number\":\"AUC-202609-SF5V\",\"transaction_routes\":[\"forward\",\"buy_now\"],\"updated_by\":1}', '2026-09-22 13:22:46', '2026-09-22 13:22:46'),
(16, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-WI1UJ5', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 06:25:17', '2026-09-23 06:25:17'),
(17, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-5MF43S', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 07:50:03', '2026-09-23 07:50:03'),
(18, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-WYMO2I', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 07:52:35', '2026-09-23 07:52:35'),
(19, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-DIIWTK', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 08:45:17', '2026-09-23 08:45:17'),
(20, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-QILELL', '{\"auction_id\":25,\"lot_number\":\"AUC-202609-EV18\",\"title\":\"Dell PowerEdge R740 2U Rack Servers \\u2013 Enterprise Fleet\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":true,\"featured_image\":\"auctions\\/seller-lot-dell-poweredge-r740-2u-rack-servers-enterprise-fleet-20260923151352-fbpqg.jpg\",\"has_manifest\":false,\"manifest_name\":null}', '2026-09-23 09:43:52', '2026-09-23 09:43:52'),
(21, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-77X0XM', '{\"auction_id\":26,\"lot_number\":\"AUC-202609-QYJW\",\"title\":\"Cisco Catalyst 9300 Network Switches \\u2013 Data Center Upgrade Lot\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":true,\"featured_image\":\"auctions\\/seller-lot-cisco-catalyst-9300-network-switches-data-center-upgrade-lot-20260923152119-o7a2c.jpg\",\"has_manifest\":false,\"manifest_name\":null}', '2026-09-23 09:51:19', '2026-09-23 09:51:19'),
(22, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-YQFYBS', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"title\":\"NetApp AFF A300 Storage Array \\u2013 Enterprise Storage Lot\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":false,\"featured_image\":null,\"has_manifest\":false,\"manifest_name\":null}', '2026-09-23 09:57:37', '2026-09-23 09:57:37'),
(23, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-CPHFPM', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 09:58:18', '2026-09-23 09:58:18'),
(24, 'sdfuu', 2, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-GNIVTS', '{\"reverse_auction_id\":1,\"reference_number\":\"REV-202609-OMUMF\",\"buyer_id\":2,\"budget_ceiling\":\"42000.00\"}', '2026-09-23 10:05:24', '2026-09-23 10:05:24'),
(25, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-AVCAIR', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 11:41:51', '2026-09-23 11:41:51'),
(26, 'admin@itbitauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-SISAJ0', '{\"guard\":\"portal\",\"email\":\"admin@itbitauctions.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-09-23 11:46:36', '2026-09-23 11:46:36'),
(27, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-PE2CVB', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-09-23 11:47:26', '2026-09-23 11:47:26'),
(28, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ET2TAK', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":3,\"ip\":\"125.21.4.83\"}', '2026-09-23 11:47:40', '2026-09-23 11:47:40'),
(29, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-3SLEC9', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":2,\"ip\":\"125.21.4.83\"}', '2026-09-23 11:48:00', '2026-09-23 11:48:00'),
(30, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-9G13M1', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 11:49:12', '2026-09-23 11:49:12'),
(31, 'admin', 1, 'AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-PVLOEI', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"title\":\"NetApp AFF A300 Storage Array \\u2013 Enterprise Storage Lot\",\"published_status\":\"scheduled\",\"approved_by\":1}', '2026-09-23 11:49:33', '2026-09-23 11:49:33'),
(32, 'admin', 1, 'AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ISRDSM', '{\"auction_id\":26,\"lot_number\":\"AUC-202609-QYJW\",\"title\":\"Cisco Catalyst 9300 Network Switches \\u2013 Data Center Upgrade Lot\",\"published_status\":\"scheduled\",\"approved_by\":1}', '2026-09-23 11:49:44', '2026-09-23 11:49:44'),
(33, 'admin', 1, 'AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-KXEGXU', '{\"auction_id\":25,\"lot_number\":\"AUC-202609-EV18\",\"title\":\"Dell PowerEdge R740 2U Rack Servers \\u2013 Enterprise Fleet\",\"published_status\":\"live\",\"approved_by\":1}', '2026-09-23 11:49:49', '2026-09-23 11:49:49'),
(34, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-JLQX6P', '{\"reverse_auction_id\":1,\"reference_number\":\"REV-202609-OMUMF\",\"approved_by\":1}', '2026-09-23 11:50:04', '2026-09-23 11:50:04'),
(35, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-J7TN9P', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 11:51:39', '2026-09-23 11:51:39'),
(36, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ENVGAN', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 11:54:45', '2026-09-23 11:54:45'),
(37, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-R5VVTW', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-23 12:01:44', '2026-09-23 12:01:44'),
(38, 'sdfuu', 2, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-OMHFDB', '{\"wanted_board_id\":1,\"request_number\":\"WTB-202609-PXMNH\",\"buyer_id\":2,\"target_price\":\"5.00\",\"quantity\":100}', '2026-09-23 14:09:05', '2026-09-23 14:09:05'),
(39, 'sdfuu', 2, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-OVLH57', '{\"wanted_board_id\":2,\"request_number\":\"WTB-202609-QGK9E\",\"buyer_id\":2,\"target_price\":\"1200.00\",\"quantity\":100}', '2026-09-23 14:11:54', '2026-09-23 14:11:54'),
(40, 'sdfuu', 2, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-WXHIRE', '{\"wanted_board_id\":3,\"request_number\":\"WTB-202609-OB47S\",\"buyer_id\":2,\"target_price\":\"180.00\",\"quantity\":50}', '2026-09-23 14:14:07', '2026-09-23 14:14:07'),
(41, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-GIEWS3', '{\"wanted_board_id\":3,\"request_number\":\"WTB-202609-OB47S\",\"buyer_id\":2,\"approved_by\":1}', '2026-09-23 14:14:38', '2026-09-23 14:14:38'),
(42, 'admin', 1, 'WANTED_BOARD_REJECTED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MNJ5NY', '{\"wanted_board_id\":2,\"request_number\":\"WTB-202609-QGK9E\",\"buyer_id\":2,\"rejected_by\":1,\"reason\":\"Price to high\"}', '2026-09-23 14:19:24', '2026-09-23 14:19:24'),
(43, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-QXA52J', '{\"wanted_board_id\":1,\"request_number\":\"WTB-202609-PXMNH\",\"buyer_id\":2,\"approved_by\":1}', '2026-09-23 14:19:38', '2026-09-23 14:19:38'),
(44, 'seller@gmail.com', 3, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-JURHU0', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-23T17:33:41+00:00\",\"expired_at\":\"2026-09-23T19:50:31.072215Z\"}', '2026-09-23 14:20:31', '2026-09-23 14:20:31'),
(45, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-DVHI5O', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 14:20:55', '2026-09-23 14:20:55'),
(46, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-BRK5JN', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-23 15:26:18', '2026-09-23 15:26:18'),
(47, 'buyer@gmail.com', 2, 'SESSION_TIMEOUT', 'IP: 157.49.115.211 | Loc: Local / Internal', '157.49.115.211', 'Local / Internal', 'AUD-SWOVCA', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-23T20:05:33+00:00\",\"expired_at\":\"2026-09-24T12:24:35.165662Z\"}', '2026-09-24 06:54:35', '2026-09-24 06:54:35'),
(48, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 157.49.115.211 | Loc: Local / Internal', '157.49.115.211', 'Local / Internal', 'AUD-4VX3HE', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"157.49.115.211\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-24 06:54:40', '2026-09-24 06:54:40'),
(49, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 157.49.115.211 | Loc: Local / Internal', '157.49.115.211', 'Local / Internal', 'AUD-4E2XTV', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-23T20:08:37+00:00\",\"expired_at\":\"2026-09-24T12:25:20.131125Z\"}', '2026-09-24 06:55:20', '2026-09-24 06:55:20'),
(50, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 157.49.115.211 | Loc: Local / Internal', '157.49.115.211', 'Local / Internal', 'AUD-RNONOS', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"157.49.115.211\"}', '2026-09-24 06:56:05', '2026-09-24 06:56:05'),
(51, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 157.49.115.211 | Loc: Local / Internal', '157.49.115.211', 'Local / Internal', 'AUD-SFXJPJ', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"157.49.115.211\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-24 06:56:18', '2026-09-24 06:56:18'),
(52, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 157.49.115.211 | Loc: Local / Internal', '157.49.115.211', 'Local / Internal', 'AUD-BSCYGQ', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"157.49.115.211\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-24 06:57:19', '2026-09-24 06:57:19'),
(53, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 157.49.115.211 | Loc: Local / Internal', '157.49.115.211', 'Local / Internal', 'AUD-5JFEBX', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"157.49.115.211\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-24 06:58:37', '2026-09-24 06:58:37'),
(54, 'sdfuu', 2, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 157.49.116.58 | Loc: Local / Internal', '157.49.116.58', 'Local / Internal', 'AUD-HJAV3B', '{\"wanted_board_id\":4,\"request_number\":\"WTB-202609-BWAQD\",\"buyer_id\":2,\"target_price\":\"15.00\",\"quantity\":100}', '2026-09-24 07:07:51', '2026-09-24 07:07:51'),
(55, 'sdfuu', 2, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 157.49.116.58 | Loc: Local / Internal', '157.49.116.58', 'Local / Internal', 'AUD-5K7IP8', '{\"reverse_auction_id\":2,\"reference_number\":\"REV-202609-7EWYL\",\"buyer_id\":2,\"budget_ceiling\":\"15000.00\"}', '2026-09-24 07:08:50', '2026-09-24 07:08:50'),
(56, 'sdfuu', 2, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 157.49.116.58 | Loc: Local / Internal', '157.49.116.58', 'Local / Internal', 'AUD-DSQKWG', '{\"reverse_auction_id\":3,\"reference_number\":\"REV-202609-WP15Y\",\"buyer_id\":2,\"budget_ceiling\":\"15000.00\"}', '2026-09-24 07:12:37', '2026-09-24 07:12:37'),
(57, 'sdfuu', 2, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 157.49.112.76 | Loc: Local / Internal', '157.49.112.76', 'Local / Internal', 'AUD-DE7WKX', '{\"reverse_auction_id\":4,\"reference_number\":\"REV-202609-1GMAN\",\"buyer_id\":2,\"budget_ceiling\":\"15000.00\"}', '2026-09-24 07:24:49', '2026-09-24 07:24:49'),
(58, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 157.49.113.221 | Loc: Local / Internal', '157.49.113.221', 'Local / Internal', 'AUD-JBYMDJ', '{\"reverse_auction_id\":4,\"reference_number\":\"REV-202609-1GMAN\",\"approved_by\":1}', '2026-09-24 07:27:12', '2026-09-24 07:27:12'),
(59, 'system', NULL, 'REVERSE_AUCTION_RFQ_OPENED', 'IP: 157.49.113.221 | Loc: Local / Internal', '157.49.113.221', 'Local / Internal', 'AUD-5L25GW', '{\"reverse_auction_id\":4,\"reference_number\":\"REV-202609-1GMAN\",\"rfq_id\":3,\"rfq_number\":\"RFQ-2026-R4XSRX\",\"buyer_id\":2,\"seller_id\":3,\"initiated_by\":3}', '2026-09-24 07:28:09', '2026-09-24 07:28:09'),
(60, 'sdfuu', 2, 'REVERSE_AUCTION_RFQ_AWARD_ACCEPTED', 'IP: 157.49.113.221 | Loc: Local / Internal', '157.49.113.221', 'Local / Internal', 'AUD-2PYAH6', '{\"reverse_auction_id\":4,\"reference_number\":\"REV-202609-1GMAN\",\"rfq_id\":3,\"rfq_number\":\"RFQ-2026-R4XSRX\",\"buyer_id\":2,\"seller_id\":3,\"reverse_auction_bid_id\":2,\"amount_per_unit\":\"14845.00\",\"quantity\":100,\"total_amount\":\"1484500.00\",\"award_source\":\"rfq\"}', '2026-09-24 07:30:07', '2026-09-24 07:30:07'),
(61, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-RXQXE7', '{\"auction_id\":22,\"lot_number\":\"AUC-202609-BYQ2\",\"transaction_routes\":[\"buy_now\"],\"updated_by\":1}', '2026-09-24 08:55:57', '2026-09-24 08:55:57'),
(62, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-UQTR4A', '{\"auction_id\":28,\"lot_number\":\"AUC-202609-BSL1\",\"title\":\"test\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":false,\"featured_image\":null,\"has_manifest\":false,\"manifest_name\":null}', '2026-09-24 08:59:34', '2026-09-24 08:59:34'),
(63, 'admin', 1, 'AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-VQFRDA', '{\"auction_id\":28,\"lot_number\":\"AUC-202609-BSL1\",\"title\":\"test\",\"published_status\":\"live\",\"approved_by\":1}', '2026-09-24 08:59:49', '2026-09-24 08:59:49'),
(64, 'admin', 1, 'AUCTION_DELETED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-TPMR0G', '{\"auction_id\":28,\"lot_number\":\"AUC-202609-BSL1\",\"title\":\"test\",\"deleted_by\":1}', '2026-09-24 09:03:32', '2026-09-24 09:03:32'),
(65, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-GSWLHI', '{\"auction_id\":22,\"lot_number\":\"AUC-202609-BYQ2\",\"transaction_routes\":[\"buy_now\"],\"updated_by\":1}', '2026-09-24 09:04:24', '2026-09-24 09:04:24'),
(66, 'admin', 1, 'TICKET_STATUS_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-N4PRCJ', '{\"ticket_number\":\"TCK-2026-PHWA3M\",\"old_status\":\"in_progress\",\"new_status\":\"in_progress\",\"new_priority\":\"medium\",\"updated_by\":\"System Administrator\"}', '2026-09-24 09:11:32', '2026-09-24 09:11:32'),
(67, 'admin', 1, 'TICKET_STATUS_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-6PVUSZ', '{\"ticket_number\":\"TCK-2026-PHWA3M\",\"old_status\":\"in_progress\",\"new_status\":\"in_progress\",\"new_priority\":\"urgent\",\"updated_by\":\"System Administrator\"}', '2026-09-24 09:12:19', '2026-09-24 09:12:19'),
(68, 'admin', 1, 'TICKET_STATUS_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-IMZBSR', '{\"ticket_number\":\"TCK-2026-PHWA3M\",\"old_status\":\"in_progress\",\"new_status\":\"closed\",\"new_priority\":\"urgent\",\"updated_by\":\"System Administrator\"}', '2026-09-24 09:13:38', '2026-09-24 09:13:38'),
(69, 'admin', 1, 'TICKET_STATUS_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-IT6QBM', '{\"ticket_number\":\"TCK-2026-PHWA3M\",\"old_status\":\"closed\",\"new_status\":\"in_progress\",\"new_priority\":\"urgent\",\"updated_by\":\"System Administrator\"}', '2026-09-24 09:17:41', '2026-09-24 09:17:41'),
(70, 'test@test', 4, 'LOGIN_ACCESS_DENIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-XW2AQQ', '{\"guard\":\"portal\",\"reason\":\"Registration pending\",\"user_id\":4,\"ip\":\"125.21.4.83\"}', '2026-09-24 09:25:16', '2026-09-24 09:25:16'),
(71, 'admin', 1, 'SELLER_ACCOUNT_REJECTED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-QNW9EQ', '{\"user_id\":4,\"email\":\"test@test\",\"old_status\":\"pending\",\"new_status\":\"rejected\",\"reason\":\"Fake\",\"rejected_by\":1}', '2026-09-24 09:26:44', '2026-09-24 09:26:44'),
(72, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-U7K55N', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-24 09:50:40', '2026-09-24 09:50:40'),
(73, 'seller@gmail.com', 3, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-2IZIZT', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-24T15:28:24+00:00\",\"expired_at\":\"2026-09-24T17:56:27.265955Z\"}', '2026-09-24 12:26:27', '2026-09-24 12:26:27'),
(74, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MAR7AR', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-24T15:34:57+00:00\",\"expired_at\":\"2026-09-24T19:26:18.904842Z\"}', '2026-09-24 13:56:18', '2026-09-24 13:56:18'),
(75, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-A1OCSZ', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-24T15:34:57+00:00\",\"expired_at\":\"2026-09-24T19:26:18.926800Z\"}', '2026-09-24 13:56:18', '2026-09-24 13:56:18'),
(76, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MVYJJ3', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-25 09:47:56', '2026-09-25 09:47:56'),
(77, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-EGNGQW', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-25 09:48:41', '2026-09-25 09:48:41'),
(78, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-NKA5FT', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-25 09:49:19', '2026-09-25 09:49:19'),
(79, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-VMTURZ', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-25 09:53:51', '2026-09-25 09:53:51'),
(80, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-HZYZLB', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-25 09:55:24', '2026-09-25 09:55:24'),
(81, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-5QE1EK', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-25T16:46:32+00:00\",\"expired_at\":\"2026-09-25T18:52:02.716715Z\"}', '2026-09-25 13:22:02', '2026-09-25 13:22:02'),
(82, 'seller@gmail.com', 3, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-LPYCRV', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-25T15:31:47+00:00\",\"expired_at\":\"2026-09-25T19:20:19.120651Z\"}', '2026-09-25 13:50:19', '2026-09-25 13:50:19'),
(83, 'admin@itbidauction.com', 1, 'LOGIN_ACCESS_DENIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-KBOVVB', '{\"guard\":\"portal\",\"reason\":\"Non-portal account\",\"user_id\":1,\"ip\":\"125.21.4.83\"}', '2026-09-25 13:50:26', '2026-09-25 13:50:26'),
(84, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-XUU63K', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 12:52:46', '2026-09-28 12:52:46'),
(85, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-KI62YW', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 12:53:06', '2026-09-28 12:53:06'),
(86, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-IS8KKD', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 12:53:51', '2026-09-28 12:53:51'),
(87, 'admin', 1, 'PORTAL_DOCUMENT_VERIFIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-F7KPXJ', '{\"document_id\":4,\"user_id\":7,\"account_type\":\"seller\",\"document_type\":\"r2v3_certificate\",\"reviewed_by\":1}', '2026-09-28 13:00:35', '2026-09-28 13:00:35'),
(88, 'admin', 1, 'SELLER_ACCOUNT_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-DCOGGS', '{\"user_id\":7,\"email\":\"seller1@gmail.com\",\"old_status\":\"pending\",\"new_status\":\"active\",\"approved_by\":1}', '2026-09-28 13:00:42', '2026-09-28 13:00:42'),
(89, 'seller1', 7, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-IVOEIY', '{\"guard\":\"portal\",\"user_id\":7,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 13:01:10', '2026-09-28 13:01:10'),
(90, 'admin', 1, 'PORTAL_DOCUMENT_VERIFIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-5YTMLT', '{\"document_id\":5,\"user_id\":8,\"account_type\":\"seller\",\"document_type\":\"e_stewards_certificate\",\"reviewed_by\":1}', '2026-09-28 13:03:46', '2026-09-28 13:03:46'),
(91, 'admin', 1, 'SELLER_ACCOUNT_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-TLPO3G', '{\"user_id\":8,\"email\":\"seller2@gmail.com\",\"old_status\":\"pending\",\"new_status\":\"active\",\"approved_by\":1}', '2026-09-28 13:03:52', '2026-09-28 13:03:52'),
(92, 'admin', 1, 'PORTAL_DOCUMENT_VERIFIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-CVSEVR', '{\"document_id\":6,\"user_id\":9,\"account_type\":\"buyer\",\"document_type\":\"r2v3_certificate\",\"reviewed_by\":1}', '2026-09-28 13:06:01', '2026-09-28 13:06:01'),
(93, 'admin', 1, 'BUYER_ACCOUNT_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-NLC2NI', '{\"user_id\":9,\"email\":\"buyer1@gmail.com\",\"old_status\":\"pending\",\"new_status\":\"active\",\"approved_by\":1}', '2026-09-28 13:06:06', '2026-09-28 13:06:06'),
(94, 'admin', 1, 'PORTAL_DOCUMENT_VERIFIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-C5U7DB', '{\"document_id\":7,\"user_id\":10,\"account_type\":\"buyer\",\"document_type\":\"business_registration\",\"reviewed_by\":1}', '2026-09-28 13:07:49', '2026-09-28 13:07:49'),
(95, 'admin', 1, 'BUYER_ACCOUNT_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ADQPVU', '{\"user_id\":10,\"email\":\"buyer2@gmail.com\",\"old_status\":\"pending\",\"new_status\":\"active\",\"approved_by\":1}', '2026-09-28 13:07:58', '2026-09-28 13:07:58'),
(96, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-4XUSRH', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 13:15:18', '2026-09-28 13:15:18'),
(97, 'buyer1', 9, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-2ICG2B', '{\"guard\":\"portal\",\"user_id\":9,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 13:16:05', '2026-09-28 13:16:05'),
(98, 'seller1', 7, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-QXWAXF', '{\"guard\":\"portal\",\"user_id\":7,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36 Edg\\/153.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 13:17:17', '2026-09-28 13:17:17'),
(99, 'seller2', 8, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ZDLYC1', '{\"guard\":\"portal\",\"user_id\":8,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 13:17:54', '2026-09-28 13:17:54'),
(100, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-A9XYGW', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 13:27:12', '2026-09-28 13:27:12'),
(101, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-SUF5NH', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 13:30:23', '2026-09-28 13:30:23'),
(102, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-KXWMJI', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 13:51:47', '2026-09-28 13:51:47'),
(103, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-PASNJF', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 13:52:32', '2026-09-28 13:52:32'),
(104, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-BYKM2V', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 13:53:24', '2026-09-28 13:53:24'),
(105, 'system', NULL, 'REVERSE_AUCTION_RFQ_OPENED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-8DI6AB', '{\"reverse_auction_id\":1,\"reference_number\":\"REV-202609-OMUMF\",\"rfq_id\":4,\"rfq_number\":\"RFQ-2026-ULNR6O\",\"buyer_id\":2,\"seller_id\":3,\"initiated_by\":3}', '2026-09-28 13:53:49', '2026-09-28 13:53:49'),
(106, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-V6ENJY', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 14:07:19', '2026-09-28 14:07:19'),
(107, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-KI6SXI', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 14:08:29', '2026-09-28 14:08:29'),
(108, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-PQ5RC3', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 14:09:31', '2026-09-28 14:09:31'),
(109, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-II0XJV', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 14:10:46', '2026-09-28 14:10:46'),
(110, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-CLJPQ4', '{\"auction_id\":27,\"lot_number\":\"AUC-202609-CXHY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-28 14:11:41', '2026-09-28 14:11:41'),
(111, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-IZEOSE', '{\"auction_id\":29,\"lot_number\":\"AUC-202609-HBAA\",\"title\":\"Cisco Catalyst 9300 Network Switches \\u2013 Refurbished Lot\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":true,\"featured_image\":\"auctions\\/seller-lot-cisco-catalyst-9300-network-switches-refurbished-lot-20260928195132-i3jwz.jpg\",\"has_manifest\":false,\"manifest_name\":null}', '2026-09-28 14:21:32', '2026-09-28 14:21:32'),
(112, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ZTIUTH', '{\"auction_id\":29,\"lot_number\":\"AUC-202609-HBAA\",\"transaction_routes\":[\"forward\",\"buy_now\"],\"updated_by\":1}', '2026-09-28 14:22:52', '2026-09-28 14:22:52'),
(113, 'admin', 1, 'AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-RAKH4O', '{\"auction_id\":29,\"lot_number\":\"AUC-202609-HBAA\",\"title\":\"Cisco Catalyst 9300 Network Switches \\u2013 Refurbished Lot\",\"published_status\":\"live\",\"approved_by\":1}', '2026-09-28 14:22:58', '2026-09-28 14:22:58'),
(114, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-AVD6V4', '{\"auction_id\":29,\"lot_number\":\"AUC-202609-HBAA\",\"transaction_routes\":[\"forward\",\"buy_now\"],\"updated_by\":1}', '2026-09-28 14:26:19', '2026-09-28 14:26:19'),
(115, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-EBQWY6', '{\"auction_id\":29,\"lot_number\":\"AUC-202609-HBAA\",\"transaction_routes\":[\"forward\",\"buy_now\"],\"updated_by\":1}', '2026-09-28 14:26:40', '2026-09-28 14:26:40'),
(116, 'buyer2', 10, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-GAJASH', '{\"guard\":\"portal\",\"user_id\":10,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 14:32:14', '2026-09-28 14:32:14'),
(117, 'seller1', 7, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-13QNHC', '{\"auction_id\":30,\"lot_number\":\"AUC-202609-MA5A\",\"title\":\"Dell Latitude 5420 Business Laptop Clearance Lot \\u2013 80 Units\",\"seller_id\":7,\"status\":\"pending\",\"has_featured_image\":true,\"featured_image\":\"auctions\\/seller-lot-dell-latitude-5420-business-laptop-clearance-lot-80-units-20260928201012-0hk3f.jpg\",\"has_manifest\":false,\"manifest_name\":null}', '2026-09-28 14:40:12', '2026-09-28 14:40:12'),
(118, 'admin', 1, 'AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-USPEST', '{\"auction_id\":30,\"lot_number\":\"AUC-202609-MA5A\",\"title\":\"Dell Latitude 5420 Business Laptop Clearance Lot \\u2013 80 Units\",\"published_status\":\"live\",\"approved_by\":1}', '2026-09-28 14:40:43', '2026-09-28 14:40:43'),
(119, 'seller2@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-3NIU7F', '{\"guard\":\"portal\",\"email\":\"seller2@gmail.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-09-28 14:52:40', '2026-09-28 14:52:40'),
(120, 'seller2', 8, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-GSSCU7', '{\"guard\":\"portal\",\"user_id\":8,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-28 14:52:57', '2026-09-28 14:52:57'),
(121, 'seller2', 8, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-QDGXVB', '{\"auction_id\":31,\"lot_number\":\"AUC-202609-5ARY\",\"title\":\"NetApp Enterprise Storage Array \\u2013 Mixed Controller & Disk Lot\",\"seller_id\":8,\"status\":\"pending\",\"has_featured_image\":false,\"featured_image\":null,\"has_manifest\":false,\"manifest_name\":null}', '2026-09-28 14:54:54', '2026-09-28 14:54:54'),
(122, 'admin', 1, 'AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-A05NEX', '{\"auction_id\":31,\"lot_number\":\"AUC-202609-5ARY\",\"title\":\"NetApp Enterprise Storage Array \\u2013 Mixed Controller & Disk Lot\",\"published_status\":\"live\",\"approved_by\":1}', '2026-09-28 14:55:13', '2026-09-28 14:55:13'),
(123, 'anilpatel.mt2@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ANOVMJ', '{\"guard\":\"portal\",\"email\":\"anilpatel.mt2@gmail.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-09-28 15:24:13', '2026-09-28 15:24:13'),
(124, 'anilpatel.mt2@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-HEAVM8', '{\"guard\":\"portal\",\"email\":\"anilpatel.mt2@gmail.com\",\"attempts_remaining\":3,\"ip\":\"125.21.4.83\"}', '2026-09-28 15:24:25', '2026-09-28 15:24:25'),
(125, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-148JHK', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-28T20:25:04+00:00\",\"expired_at\":\"2026-09-29T12:08:14.692001Z\"}', '2026-09-29 06:38:14', '2026-09-29 06:38:14'),
(126, 'buyer@gmail.com', 2, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-RGXNBZ', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-28T20:48:53+00:00\",\"expired_at\":\"2026-09-29T12:09:06.677841Z\"}', '2026-09-29 06:39:06', '2026-09-29 06:39:06'),
(127, 'buyer1@gmail.com', 9, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-1L4HQ2', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-28T20:43:43+00:00\",\"expired_at\":\"2026-09-29T12:09:26.594498Z\"}', '2026-09-29 06:39:26', '2026-09-29 06:39:26'),
(128, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-JZR8IH', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 06:40:02', '2026-09-29 06:40:02'),
(129, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MFHXAT', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 06:43:32', '2026-09-29 06:43:32'),
(130, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-QKLEHL', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 06:43:57', '2026-09-29 06:43:57'),
(131, 'sdfuu', 2, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-43VHSK', '{\"reverse_auction_id\":5,\"reference_number\":\"REV-202609-TBVS3\",\"buyer_id\":2,\"budget_ceiling\":\"18000.00\"}', '2026-09-29 06:49:18', '2026-09-29 06:49:18'),
(132, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-YIM84E', '{\"reverse_auction_id\":5,\"reference_number\":\"REV-202609-TBVS3\",\"approved_by\":1}', '2026-09-29 06:49:42', '2026-09-29 06:49:42'),
(133, 'seller1', 7, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-FJR8PA', '{\"guard\":\"portal\",\"user_id\":7,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 06:55:41', '2026-09-29 06:55:41'),
(134, 'seller2', 8, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-TP0BY6', '{\"guard\":\"portal\",\"user_id\":8,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 06:57:54', '2026-09-29 06:57:54'),
(135, 'buyer1', 9, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-6G3MT5', '{\"guard\":\"portal\",\"user_id\":9,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 06:58:54', '2026-09-29 06:58:54'),
(136, 'buyer1', 9, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-9WZP0I', '{\"reverse_auction_id\":6,\"reference_number\":\"REV-202609-4WMVJ\",\"buyer_id\":9,\"budget_ceiling\":\"12500.00\"}', '2026-09-29 07:04:00', '2026-09-29 07:04:00');
INSERT INTO `security_audit_logs` (`id`, `actor_uid`, `user_id`, `action_type`, `telemetry`, `ip_address`, `location`, `audit_code`, `details`, `created_at`, `updated_at`) VALUES
(137, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-11IN2Z', '{\"reverse_auction_id\":6,\"reference_number\":\"REV-202609-4WMVJ\",\"approved_by\":1}', '2026-09-29 07:04:22', '2026-09-29 07:04:22'),
(138, 'buyer2', 10, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-CYAPHL', '{\"guard\":\"portal\",\"user_id\":10,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 07:17:07', '2026-09-29 07:17:07'),
(139, 'buyer2', 10, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-TZ9FB4', '{\"reverse_auction_id\":7,\"reference_number\":\"REV-202609-1TMXQ\",\"buyer_id\":10,\"budget_ceiling\":\"45000.00\"}', '2026-09-29 07:21:01', '2026-09-29 07:21:01'),
(140, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-3EXIGV', '{\"reverse_auction_id\":7,\"reference_number\":\"REV-202609-1TMXQ\",\"approved_by\":1}', '2026-09-29 07:21:38', '2026-09-29 07:21:38'),
(141, 'system', NULL, 'REVERSE_AUCTION_RFQ_OPENED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-XICXSL', '{\"reverse_auction_id\":7,\"reference_number\":\"REV-202609-1TMXQ\",\"rfq_id\":6,\"rfq_number\":\"RFQ-2026-VN67F4\",\"buyer_id\":10,\"seller_id\":8,\"initiated_by\":8}', '2026-09-29 07:46:41', '2026-09-29 07:46:41'),
(142, 'seller2', 8, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-PJ57PO', '{\"auction_id\":32,\"lot_number\":\"AUC-202609-XWSR\",\"title\":\"Test\",\"seller_id\":8,\"status\":\"pending\",\"has_featured_image\":false,\"featured_image\":null,\"has_manifest\":false,\"manifest_name\":null}', '2026-09-29 07:51:11', '2026-09-29 07:51:11'),
(143, 'admin', 1, 'AUCTION_REJECTED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-EUQTEO', '{\"auction_id\":32,\"lot_number\":\"AUC-202609-XWSR\",\"title\":\"Test\",\"rejected_by\":1,\"reason\":\"Test\"}', '2026-09-29 07:51:54', '2026-09-29 07:51:54'),
(144, 'seller@gmail.com', 1, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-AFJQDY', '{\"guard\":\"portal\",\"email\":\"seller@gmail.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-09-29 12:58:42', '2026-09-29 12:58:42'),
(145, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-WMS0UM', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 12:58:51', '2026-09-29 12:58:51'),
(146, 'admin@itbidauction.com', 1, 'LOGIN_ACCESS_DENIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-C3QHKY', '{\"guard\":\"portal\",\"reason\":\"Non-portal account\",\"user_id\":1,\"ip\":\"125.21.4.83\"}', '2026-09-29 13:03:10', '2026-09-29 13:03:10'),
(147, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-3DHAHT', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-09-29 13:03:58', '2026-09-29 13:03:58'),
(148, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-LNSDL5', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 13:04:05', '2026-09-29 13:04:05'),
(149, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-VQSZ64', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 14:03:21', '2026-09-29 14:03:21'),
(150, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MJ2FRZ', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-29T13:21:37+00:00\",\"expired_at\":\"2026-09-29T19:34:11.032840Z\"}', '2026-09-29 14:04:11', '2026-09-29 14:04:11'),
(151, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-YNOVXZ', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 14:04:14', '2026-09-29 14:04:14'),
(152, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-SHNBXK', '{\"auction_id\":30,\"lot_number\":\"AUC-202609-MA5A\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-29 14:06:35', '2026-09-29 14:06:35'),
(153, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-IIFKCM', '{\"auction_id\":30,\"lot_number\":\"AUC-202609-MA5A\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-09-29 14:08:27', '2026-09-29 14:08:27'),
(154, 'buyer1', 9, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-LCEUM4', '{\"guard\":\"portal\",\"user_id\":9,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 14:09:51', '2026-09-29 14:09:51'),
(155, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-B95DSS', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 14:13:00', '2026-09-29 14:13:00'),
(156, 'seller2', 8, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-UOMZ3U', '{\"guard\":\"portal\",\"user_id\":8,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 14:14:42', '2026-09-29 14:14:42'),
(157, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-EYP0YF', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 14:17:09', '2026-09-29 14:17:09'),
(158, 'sdfuu', 2, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-FXCSEB', '{\"wanted_board_id\":5,\"request_number\":\"WTB-202609-RTCVZ\",\"buyer_id\":2,\"target_price\":\"15.00\",\"quantity\":100}', '2026-09-29 14:22:29', '2026-09-29 14:22:29'),
(159, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-5SCKTC', '{\"wanted_board_id\":5,\"request_number\":\"WTB-202609-RTCVZ\",\"buyer_id\":2,\"approved_by\":1}', '2026-09-29 14:22:43', '2026-09-29 14:22:43'),
(160, 'buyer1@gmail.com', 9, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ZNQGOZ', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-29T13:09:18+00:00\",\"expired_at\":\"2026-09-29T19:54:33.401968Z\"}', '2026-09-29 14:24:33', '2026-09-29 14:24:33'),
(161, 'bayer1@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-WBLHXV', '{\"guard\":\"portal\",\"email\":\"bayer1@gmail.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-09-29 14:24:50', '2026-09-29 14:24:50'),
(162, 'bayer1@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-JH4OQW', '{\"guard\":\"portal\",\"email\":\"bayer1@gmail.com\",\"attempts_remaining\":3,\"ip\":\"125.21.4.83\"}', '2026-09-29 14:25:03', '2026-09-29 14:25:03'),
(163, 'buyer1', 9, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-DEPFM2', '{\"guard\":\"portal\",\"user_id\":9,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 14:25:12', '2026-09-29 14:25:12'),
(164, 'buyer1', 9, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-1BYRCI', '{\"wanted_board_id\":6,\"request_number\":\"WTB-202609-4CJSS\",\"buyer_id\":9,\"target_price\":\"15.00\",\"quantity\":100}', '2026-09-29 14:25:49', '2026-09-29 14:25:49'),
(165, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-9IPLJA', '{\"wanted_board_id\":6,\"request_number\":\"WTB-202609-4CJSS\",\"buyer_id\":9,\"approved_by\":1}', '2026-09-29 14:26:04', '2026-09-29 14:26:04'),
(166, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ZYVU7U', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 15:25:06', '2026-09-29 15:25:06'),
(167, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-EHEZKU', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-29 15:26:36', '2026-09-29 15:26:36'),
(168, 'sdfuu', 2, 'REVERSE_AUCTION_WINNING_BID_ACCEPTED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-GXZSEP', '{\"reverse_auction_id\":5,\"reference_number\":\"REV-202609-TBVS3\",\"buyer_id\":2,\"seller_id\":8,\"reverse_auction_bid_id\":5,\"amount_per_unit\":\"17700.00\",\"quantity\":25,\"total_amount\":\"442500.00\",\"award_source\":\"reverse_bid\"}', '2026-09-29 15:27:26', '2026-09-29 15:27:26'),
(169, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-JKYEJD', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-30 07:08:54', '2026-09-30 07:08:54'),
(170, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-FUEGLJ', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-30 07:14:16', '2026-09-30 07:14:16'),
(171, 'admin@itbidauction.com', 1, 'LOGIN_ACCESS_DENIED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-OWIERQ', '{\"guard\":\"portal\",\"reason\":\"Non-portal account\",\"user_id\":1,\"ip\":\"125.21.4.83\"}', '2026-09-30 11:35:34', '2026-09-30 11:35:34'),
(172, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-ICI7ON', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-29T19:56:00+00:00\",\"expired_at\":\"2026-09-30T17:05:43.838886Z\"}', '2026-09-30 11:35:43', '2026-09-30 11:35:43'),
(173, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-WTRVMN', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-30 11:35:50', '2026-09-30 11:35:50'),
(174, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MKRQBQ', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-30 11:36:40', '2026-09-30 11:36:40'),
(175, 'admin', 1, 'TICKET_STATUS_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-L0PRYP', '{\"ticket_number\":\"TCK-2026-OG8PO2\",\"old_status\":\"open\",\"new_status\":\"open\",\"new_priority\":\"urgent\",\"updated_by\":\"System Administrator\"}', '2026-09-30 11:47:47', '2026-09-30 11:47:47'),
(176, 'admin', 1, 'TICKET_STATUS_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-YPSRLE', '{\"ticket_number\":\"TCK-2026-OG8PO2\",\"old_status\":\"open\",\"new_status\":\"in_progress\",\"new_priority\":\"urgent\",\"updated_by\":\"System Administrator\"}', '2026-09-30 12:02:00', '2026-09-30 12:02:00'),
(177, 'buyer@gmail.com', 2, 'SESSION_TIMEOUT', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-DWQ85X', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-09-29T19:56:08+00:00\",\"expired_at\":\"2026-09-30T17:42:45.292995Z\"}', '2026-09-30 12:12:45', '2026-09-30 12:12:45'),
(178, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-8L4AK2', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-09-30 12:12:50', '2026-09-30 12:12:50'),
(179, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-BG6I6I', '{\"auction_id\":33,\"lot_number\":\"AUC-202609-W79F\",\"title\":\"Test11:17pm30-09\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":true,\"featured_image\":\"auctions\\/seller-lot-test1117pm30-09-20260930174819-oyihf.png\",\"has_manifest\":false,\"manifest_name\":null}', '2026-09-30 12:18:19', '2026-09-30 12:18:19'),
(180, 'hello', 3, 'AUCTION_PENDING_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-Z6NEFZ', '{\"auction_id\":33,\"lot_number\":\"AUC-202609-W79F\",\"seller_id\":3,\"old_status\":\"pending\",\"new_status\":\"pending\"}', '2026-09-30 12:18:59', '2026-09-30 12:18:59'),
(181, 'hello', 3, 'AUCTION_PENDING_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-LQ2HS6', '{\"auction_id\":33,\"lot_number\":\"AUC-202609-W79F\",\"seller_id\":3,\"old_status\":\"pending\",\"new_status\":\"pending\"}', '2026-09-30 12:20:16', '2026-09-30 12:20:16'),
(182, 'admin', 1, 'TICKET_STATUS_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-6GXCFU', '{\"ticket_number\":\"TCK-2026-OG8PO2\",\"old_status\":\"in_progress\",\"new_status\":\"closed\",\"new_priority\":\"urgent\",\"updated_by\":\"System Administrator\"}', '2026-09-30 12:50:53', '2026-09-30 12:50:53'),
(183, 'hello', 3, 'REVERSE_AUCTION_RFQ_OPENED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-C9ZN3M', '{\"reverse_auction_id\":6,\"reference_number\":\"REV-202609-4WMVJ\",\"rfq_id\":8,\"rfq_number\":\"RFQ-2026-W0FOAT\",\"buyer_id\":9,\"seller_id\":3,\"initiated_by\":3}', '2026-09-30 12:54:18', '2026-09-30 12:54:18'),
(184, 'admin', 1, 'TICKET_STATUS_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-JBUJJP', '{\"ticket_number\":\"TCK-2026-PHWA3M\",\"old_status\":\"in_progress\",\"new_status\":\"resolved\",\"new_priority\":\"urgent\",\"updated_by\":\"System Administrator\"}', '2026-09-30 13:28:10', '2026-09-30 13:28:10'),
(185, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MB3N0Y', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-07 10:15:27', '2026-10-07 10:15:27'),
(186, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-SHOS0K', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-08 10:02:22', '2026-10-08 10:02:22'),
(187, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MAYQDM', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-08 10:04:16', '2026-10-08 10:04:16'),
(188, 'buyer@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-6UKQKV', '{\"guard\":\"portal\",\"email\":\"buyer@gmail.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-10-09 12:07:18', '2026-10-09 12:07:18'),
(189, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-I4P2G2', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-09 12:07:23', '2026-10-09 12:07:23'),
(190, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-TCLM9F', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-09 12:08:15', '2026-10-09 12:08:15'),
(191, 'admin@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-4UPHSM', '{\"guard\":\"web\",\"email\":\"admin@gmail.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-10-09 12:09:30', '2026-10-09 12:09:30'),
(192, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MNUXGB', '{\"guard\":\"portal\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-10-09 12:10:19', '2026-10-09 12:10:19'),
(193, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-I8Y98P', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-09 12:10:27', '2026-10-09 12:10:27'),
(194, 'admin@itbuidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-O9PKRC', '{\"guard\":\"web\",\"email\":\"admin@itbuidauctions.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-10-09 12:11:04', '2026-10-09 12:11:04'),
(195, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-I7ZRNS', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-10-09 12:11:15', '2026-10-09 12:11:15'),
(196, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-JI9IRL', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":3,\"ip\":\"125.21.4.83\"}', '2026-10-09 12:11:30', '2026-10-09 12:11:30'),
(197, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-DAOYW8', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":2,\"ip\":\"125.21.4.83\"}', '2026-10-09 12:12:01', '2026-10-09 12:12:01'),
(198, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-XKB75W', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-09 12:12:14', '2026-10-09 12:12:14'),
(199, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-FCS71M', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-09 12:17:34', '2026-10-09 12:17:34'),
(200, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-IWP5CB', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36 Edg\\/154.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-09 12:35:02', '2026-10-09 12:35:02'),
(201, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-AAXGHB', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36 Edg\\/155.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-09 13:16:41', '2026-10-09 13:16:41'),
(202, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-3OVXVR', '{\"auction_id\":31,\"lot_number\":\"AUC-202609-5ARY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-10-09 13:17:36', '2026-10-09 13:17:36'),
(203, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-25RXRN', '{\"auction_id\":31,\"lot_number\":\"AUC-202609-5ARY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-10-09 13:18:34', '2026-10-09 13:18:34'),
(204, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-05RI2F', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36 Edg\\/155.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-09 13:55:08', '2026-10-09 13:55:08'),
(205, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-YKIOO2', '{\"auction_id\":26,\"lot_number\":\"AUC-202609-QYJW\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-10-09 13:56:39', '2026-10-09 13:56:39'),
(206, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-9Z2URI', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-12 06:58:24', '2026-10-12 06:58:24'),
(207, 'admin', 1, 'AUCTION_UPDATED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-GGG2QC', '{\"auction_id\":31,\"lot_number\":\"AUC-202609-5ARY\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-10-12 06:59:37', '2026-10-12 06:59:37'),
(208, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-YALNRZ', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-10-12 09:56:05', '2026-10-12 09:56:05'),
(209, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-6BEQMR', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-12 09:56:14', '2026-10-12 09:56:14'),
(210, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-MVNONO', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"125.21.4.83\"}', '2026-10-12 13:11:26', '2026-10-12 13:11:26'),
(211, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-HAFHVV', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":3,\"ip\":\"125.21.4.83\"}', '2026-10-12 13:11:36', '2026-10-12 13:11:36'),
(212, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-SACUR3', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36 Edg\\/155.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-12 13:11:48', '2026-10-12 13:11:48'),
(213, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-QAKW7Y', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-12 15:09:43', '2026-10-12 15:09:43'),
(214, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 125.21.4.83 | Loc: Local / Internal', '125.21.4.83', 'Local / Internal', 'AUD-RV903E', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"125.21.4.83\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-13 07:21:54', '2026-10-13 07:21:54'),
(215, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-ZRTUIX', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-16 15:03:32', '2026-10-16 15:03:32'),
(216, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NM2DGK', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-16 15:08:05', '2026-10-16 15:08:05'),
(217, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-JHZES3', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-16 15:18:03', '2026-10-16 15:18:03'),
(218, 'admin@b2bbulkmail.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-3DO3DA', '{\"guard\":\"web\",\"email\":\"admin@b2bbulkmail.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:47:17', '2026-10-19 06:47:17'),
(219, 'admin@itbidauction.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-FVAJOC', '{\"guard\":\"web\",\"email\":\"admin@itbidauction.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:47:32', '2026-10-19 06:47:32'),
(220, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-SQ4K6A', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:47:37', '2026-10-19 06:47:37'),
(221, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-F3BFAL', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":3,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:47:52', '2026-10-19 06:47:52'),
(222, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-CLSOVZ', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":2,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:48:15', '2026-10-19 06:48:15'),
(223, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-ZMWWIE', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":1,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:48:19', '2026-10-19 06:48:19'),
(224, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NYPYDZ', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":0,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:48:23', '2026-10-19 06:48:23'),
(225, 'admin@itbidauctions.com', NULL, 'LOGIN_LOCKOUT_TRIGGERED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-MO49SM', '{\"guard\":\"web\",\"reason\":\"Failed login threshold reached\",\"max_attempts\":5,\"cooldown_minutes\":9,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:48:23', '2026-10-19 06:48:23'),
(226, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-3DNVSQ', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36 Edg\\/155.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 06:48:48', '2026-10-19 06:48:48'),
(227, 'seller@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-CIHKIG', '{\"guard\":\"portal\",\"email\":\"seller@gmail.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-19 06:51:14', '2026-10-19 06:51:14'),
(228, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-KX0GYD', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 06:52:28', '2026-10-19 06:52:28'),
(229, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-UZ88DA', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 06:53:29', '2026-10-19 06:53:29'),
(230, 'sdfuu', 2, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-MPLAKA', '{\"reverse_auction_id\":8,\"reference_number\":\"REV-202610-XWNBD\",\"buyer_id\":2,\"budget_ceiling\":\"75000.00\"}', '2026-10-19 07:00:30', '2026-10-19 07:00:30'),
(231, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-FRM01V', '{\"reverse_auction_id\":8,\"reference_number\":\"REV-202610-XWNBD\",\"approved_by\":1}', '2026-10-19 07:03:38', '2026-10-19 07:03:38'),
(232, 'admin', 1, 'AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-TRNWLE', '{\"auction_id\":33,\"lot_number\":\"AUC-202609-W79F\",\"title\":\"Test11:17pm30-09\",\"published_status\":\"live\",\"start_date\":\"2026-10-19 12:34:14\",\"end_date\":\"2026-10-26 12:34:14\",\"approved_by\":1}', '2026-10-19 07:04:14', '2026-10-19 07:04:14'),
(233, 'sdfuu', 2, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-DXMKEO', '{\"reverse_auction_id\":9,\"reference_number\":\"REV-202610-ZVTPP\",\"buyer_id\":2,\"budget_ceiling\":\"2500000.00\"}', '2026-10-19 07:04:59', '2026-10-19 07:04:59'),
(234, 'buyer1', 9, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-YGYAO0', '{\"guard\":\"portal\",\"user_id\":9,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 07:05:36', '2026-10-19 07:05:36'),
(235, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-AQB31X', '{\"auction_id\":34,\"lot_number\":\"AUC-202610-FWOS\",\"title\":\"IT Enterprise Hardware\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":false,\"featured_image\":null,\"has_manifest\":false,\"manifest_name\":null}', '2026-10-19 07:06:20', '2026-10-19 07:06:20'),
(236, 'seller1', 7, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NFXEBK', '{\"guard\":\"portal\",\"user_id\":7,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36 Edg\\/155.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 07:06:58', '2026-10-19 07:06:58'),
(237, 'sdfuu', 2, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-3DCTT3', '{\"reverse_auction_id\":10,\"reference_number\":\"REV-202610-LNPX3\",\"buyer_id\":2,\"budget_ceiling\":\"5000000.00\"}', '2026-10-19 07:08:55', '2026-10-19 07:08:55'),
(238, 'hello', 3, 'AUCTION_PENDING_UPDATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-RAERAH', '{\"auction_id\":34,\"lot_number\":\"AUC-202610-FWOS\",\"seller_id\":3,\"old_status\":\"pending\",\"new_status\":\"pending\"}', '2026-10-19 07:09:36', '2026-10-19 07:09:36'),
(239, 'sdfuu', 2, 'REVERSE_AUCTION_PENDING_UPDATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-MDUCKZ', '{\"reverse_auction_id\":9,\"reference_number\":\"REV-202610-ZVTPP\",\"buyer_id\":2}', '2026-10-19 07:10:00', '2026-10-19 07:10:00'),
(240, 'sdfuu', 2, 'REVERSE_AUCTION_PENDING_UPDATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-ND5EZS', '{\"reverse_auction_id\":10,\"reference_number\":\"REV-202610-LNPX3\",\"buyer_id\":2}', '2026-10-19 07:10:27', '2026-10-19 07:10:27'),
(241, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-PXT1ZL', '{\"auction_id\":35,\"lot_number\":\"AUC-202610-LH0L\",\"title\":\"Networking Equipment\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":true,\"featured_image\":\"auctions\\/seller-lot-networking-equipment-20261019124438-oj281.png\",\"has_manifest\":false,\"manifest_name\":null}', '2026-10-19 07:14:38', '2026-10-19 07:14:38'),
(242, 'admin', 1, 'AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-7YYNPW', '{\"auction_id\":35,\"lot_number\":\"AUC-202610-LH0L\",\"title\":\"Networking Equipment\",\"published_status\":\"live\",\"start_date\":\"2026-10-19 12:45:54\",\"end_date\":\"2026-10-24 12:45:54\",\"approved_by\":1}', '2026-10-19 07:15:54', '2026-10-19 07:15:54'),
(243, 'admin', 1, 'AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-A6ADWV', '{\"auction_id\":34,\"lot_number\":\"AUC-202610-FWOS\",\"title\":\"IT Enterprise Hardware\",\"published_status\":\"scheduled\",\"start_date\":\"2026-10-21 12:24:00\",\"end_date\":\"2026-10-26 12:24:00\",\"approved_by\":1}', '2026-10-19 07:16:08', '2026-10-19 07:16:08'),
(244, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-G04LRO', '{\"reverse_auction_id\":10,\"reference_number\":\"REV-202610-LNPX3\",\"approved_by\":1}', '2026-10-19 07:16:25', '2026-10-19 07:16:25'),
(245, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-BZD8SZ', '{\"reverse_auction_id\":9,\"reference_number\":\"REV-202610-ZVTPP\",\"approved_by\":1}', '2026-10-19 07:16:28', '2026-10-19 07:16:28'),
(246, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-TY3JKM', '{\"auction_id\":36,\"lot_number\":\"AUC-202610-WXQC\",\"title\":\"5,000 lbs Mixed Telecom Circuit Boards\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":false,\"featured_image\":null,\"has_manifest\":false,\"manifest_name\":null}', '2026-10-19 07:17:23', '2026-10-19 07:17:23'),
(247, 'admin', 1, 'AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NXMFHF', '{\"auction_id\":36,\"lot_number\":\"AUC-202610-WXQC\",\"title\":\"5,000 lbs Mixed Telecom Circuit Boards\",\"published_status\":\"live\",\"start_date\":\"2026-10-19 12:48:45\",\"end_date\":\"2026-10-29 12:48:45\",\"approved_by\":1}', '2026-10-19 07:18:45', '2026-10-19 07:18:45'),
(248, 'sdfuu', 2, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-G0FKKJ', '{\"wanted_board_id\":7,\"request_number\":\"WTB-202610-I0NXN\",\"buyer_id\":2,\"target_price\":\"45.00\",\"quantity\":200}', '2026-10-19 07:19:59', '2026-10-19 07:19:59'),
(249, 'sdfuu', 2, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-E9L2HX', '{\"wanted_board_id\":8,\"request_number\":\"WTB-202610-3OL7I\",\"buyer_id\":2,\"target_price\":\"800.00\",\"quantity\":25}', '2026-10-19 07:21:54', '2026-10-19 07:21:54'),
(250, 'hello', 3, 'CORPORATE_TRADING_LOT_CREATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-7IHSSU', '{\"corporate_trading_id\":16,\"lot_number\":\"CORP-202610-SUPCR\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"buy_now_price\":\"4250.00\",\"approval_status\":\"pending\",\"status\":\"draft\"}', '2026-10-19 07:23:22', '2026-10-19 07:23:22'),
(251, 'sdfuu', 2, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-W3C1UW', '{\"wanted_board_id\":9,\"request_number\":\"WTB-202610-GZJKL\",\"buyer_id\":2,\"target_price\":\"4500.00\",\"quantity\":10}', '2026-10-19 07:23:25', '2026-10-19 07:23:25'),
(252, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-IM8TOX', '{\"wanted_board_id\":9,\"request_number\":\"WTB-202610-GZJKL\",\"buyer_id\":2,\"approved_by\":1}', '2026-10-19 07:25:46', '2026-10-19 07:25:46'),
(253, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-VOIISI', '{\"wanted_board_id\":8,\"request_number\":\"WTB-202610-3OL7I\",\"buyer_id\":2,\"approved_by\":1}', '2026-10-19 07:25:51', '2026-10-19 07:25:51'),
(254, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-JBBDWH', '{\"wanted_board_id\":7,\"request_number\":\"WTB-202610-I0NXN\",\"buyer_id\":2,\"approved_by\":1}', '2026-10-19 07:25:56', '2026-10-19 07:25:56'),
(255, 'hello', 3, 'CORPORATE_TRADING_LOT_CREATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-6OQGTW', '{\"corporate_trading_id\":17,\"lot_number\":\"CORP-202610-ZMIGH\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"buy_now_price\":\"850.00\",\"approval_status\":\"pending\",\"status\":\"draft\"}', '2026-10-19 07:37:08', '2026-10-19 07:37:08'),
(256, 'buyer1@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-DR2O8U', '{\"guard\":\"portal\",\"email\":\"buyer1@gmail.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-19 07:37:46', '2026-10-19 07:37:46'),
(257, 'buyer1', 9, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-Q9AN8O', '{\"guard\":\"portal\",\"user_id\":9,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 07:38:10', '2026-10-19 07:38:10'),
(258, 'admin', 1, 'CORPORATE_TRADING_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-YLDZSJ', '{\"corporate_trading_id\":17,\"lot_number\":\"CORP-202610-ZMIGH\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"approved_by\":1}', '2026-10-19 07:38:10', '2026-10-19 07:38:10'),
(259, 'admin', 1, 'CORPORATE_TRADING_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NBDEG2', '{\"corporate_trading_id\":16,\"lot_number\":\"CORP-202610-SUPCR\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"approved_by\":1}', '2026-10-19 07:38:15', '2026-10-19 07:38:15'),
(260, 'buyer2', 10, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-GF62SC', '{\"guard\":\"portal\",\"user_id\":10,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36 Edg\\/155.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 07:39:00', '2026-10-19 07:39:00'),
(261, 'hello', 3, 'CORPORATE_TRADING_LOT_CREATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-TVVHFG', '{\"corporate_trading_id\":18,\"lot_number\":\"CORP-202610-CPYHY\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"buy_now_price\":\"200.00\",\"approval_status\":\"pending\",\"status\":\"draft\"}', '2026-10-19 07:40:01', '2026-10-19 07:40:01'),
(262, 'buyer2', 10, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-H7JGP2', '{\"wanted_board_id\":10,\"request_number\":\"WTB-202610-4HITT\",\"buyer_id\":10,\"target_price\":\"4.50\",\"quantity\":800}', '2026-10-19 07:43:43', '2026-10-19 07:43:43'),
(263, 'buyer2', 10, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-EF5JFF', '{\"wanted_board_id\":11,\"request_number\":\"WTB-202610-BCR6B\",\"buyer_id\":10,\"target_price\":\"180.00\",\"quantity\":120}', '2026-10-19 07:45:37', '2026-10-19 07:45:37'),
(264, 'seller1', 7, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-K15QEQ', '{\"guard\":\"portal\",\"user_id\":7,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36 Edg\\/155.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 07:46:22', '2026-10-19 07:46:22'),
(265, 'buyer2', 10, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-33TZIN', '{\"wanted_board_id\":12,\"request_number\":\"WTB-202610-BPKB7\",\"buyer_id\":10,\"target_price\":\"2200.00\",\"quantity\":8}', '2026-10-19 07:47:58', '2026-10-19 07:47:58'),
(266, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-6HGU90', '{\"wanted_board_id\":12,\"request_number\":\"WTB-202610-BPKB7\",\"buyer_id\":10,\"approved_by\":1}', '2026-10-19 07:49:12', '2026-10-19 07:49:12'),
(267, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-KYP5AZ', '{\"wanted_board_id\":11,\"request_number\":\"WTB-202610-BCR6B\",\"buyer_id\":10,\"approved_by\":1}', '2026-10-19 07:49:16', '2026-10-19 07:49:16'),
(268, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-7XUNHV', '{\"wanted_board_id\":10,\"request_number\":\"WTB-202610-4HITT\",\"buyer_id\":10,\"approved_by\":1}', '2026-10-19 07:49:20', '2026-10-19 07:49:20'),
(269, 'buyer1', 9, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NBBZPV', '{\"wanted_board_id\":13,\"request_number\":\"WTB-202610-LHHEL\",\"buyer_id\":9,\"target_price\":\"1800.00\",\"quantity\":20}', '2026-10-19 07:50:52', '2026-10-19 07:50:52'),
(270, 'buyer1', 9, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-KOBTEX', '{\"wanted_board_id\":14,\"request_number\":\"WTB-202610-MJPKJ\",\"buyer_id\":9,\"target_price\":\"8500.00\",\"quantity\":1}', '2026-10-19 07:54:07', '2026-10-19 07:54:07'),
(271, 'buyer1', 9, 'WANTED_BOARD_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-YJIQBL', '{\"wanted_board_id\":15,\"request_number\":\"WTB-202610-1S8AS\",\"buyer_id\":9,\"target_price\":\"12000.00\",\"quantity\":4}', '2026-10-19 07:55:30', '2026-10-19 07:55:30'),
(272, 'buyer1', 9, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-EZKDBZ', '{\"reverse_auction_id\":11,\"reference_number\":\"REV-202610-RW9CI\",\"buyer_id\":9,\"budget_ceiling\":\"12000.00\"}', '2026-10-19 07:59:02', '2026-10-19 07:59:02');
INSERT INTO `security_audit_logs` (`id`, `actor_uid`, `user_id`, `action_type`, `telemetry`, `ip_address`, `location`, `audit_code`, `details`, `created_at`, `updated_at`) VALUES
(273, 'seller2', 8, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-N3YPJN', '{\"guard\":\"portal\",\"user_id\":8,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 07:59:03', '2026-10-19 07:59:03'),
(274, 'buyer1', 9, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-OCGYXA', '{\"reverse_auction_id\":12,\"reference_number\":\"REV-202610-5MLBT\",\"buyer_id\":9,\"budget_ceiling\":\"16000.00\"}', '2026-10-19 08:01:59', '2026-10-19 08:01:59'),
(275, 'buyer1', 9, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-M5DNN0', '{\"reverse_auction_id\":13,\"reference_number\":\"REV-202610-TUVRI\",\"buyer_id\":9,\"budget_ceiling\":\"48000.00\"}', '2026-10-19 08:05:07', '2026-10-19 08:05:07'),
(276, 'buyer2', 10, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-YI319K', '{\"reverse_auction_id\":14,\"reference_number\":\"REV-202610-VQFIQ\",\"buyer_id\":10,\"budget_ceiling\":\"60000.00\"}', '2026-10-19 08:08:59', '2026-10-19 08:08:59'),
(277, 'buyer2', 10, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-0MKYLQ', '{\"reverse_auction_id\":15,\"reference_number\":\"REV-202610-BX52Q\",\"buyer_id\":10,\"budget_ceiling\":\"80000.00\"}', '2026-10-19 08:12:04', '2026-10-19 08:12:04'),
(278, 'buyer2', 10, 'REVERSE_AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-W32M8Q', '{\"reverse_auction_id\":16,\"reference_number\":\"REV-202610-U1FOV\",\"buyer_id\":10,\"budget_ceiling\":\"7500.00\"}', '2026-10-19 08:14:09', '2026-10-19 08:14:09'),
(279, 'hello', 3, 'CORPORATE_TRADING_LOT_CREATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-1HOHFR', '{\"corporate_trading_id\":19,\"lot_number\":\"CORP-202610-MOA9M\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"buy_now_price\":\"0.01\",\"approval_status\":\"pending\",\"status\":\"draft\"}', '2026-10-19 09:04:52', '2026-10-19 09:04:52'),
(280, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-Z9JWCY', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 09:06:03', '2026-10-19 09:06:03'),
(281, 'admin', 1, 'CORPORATE_TRADING_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-SJ1U7D', '{\"corporate_trading_id\":19,\"lot_number\":\"CORP-202610-MOA9M\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"approved_by\":1}', '2026-10-19 09:06:14', '2026-10-19 09:06:14'),
(282, 'admin', 1, 'CORPORATE_TRADING_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-LC3WFL', '{\"corporate_trading_id\":18,\"lot_number\":\"CORP-202610-CPYHY\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"approved_by\":1}', '2026-10-19 09:06:22', '2026-10-19 09:06:22'),
(283, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-IPZIDC', '{\"wanted_board_id\":15,\"request_number\":\"WTB-202610-1S8AS\",\"buyer_id\":9,\"approved_by\":1}', '2026-10-19 09:06:34', '2026-10-19 09:06:34'),
(284, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-VSDPSZ', '{\"wanted_board_id\":14,\"request_number\":\"WTB-202610-MJPKJ\",\"buyer_id\":9,\"approved_by\":1}', '2026-10-19 09:06:38', '2026-10-19 09:06:38'),
(285, 'admin', 1, 'WANTED_BOARD_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-BHTAY1', '{\"wanted_board_id\":13,\"request_number\":\"WTB-202610-LHHEL\",\"buyer_id\":9,\"approved_by\":1}', '2026-10-19 09:06:42', '2026-10-19 09:06:42'),
(286, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-I2XPIP', '{\"reverse_auction_id\":16,\"reference_number\":\"REV-202610-U1FOV\",\"approved_by\":1}', '2026-10-19 09:06:58', '2026-10-19 09:06:58'),
(287, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-R7XJRW', '{\"reverse_auction_id\":15,\"reference_number\":\"REV-202610-BX52Q\",\"approved_by\":1}', '2026-10-19 09:07:00', '2026-10-19 09:07:00'),
(288, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-0TJJMW', '{\"reverse_auction_id\":14,\"reference_number\":\"REV-202610-VQFIQ\",\"approved_by\":1}', '2026-10-19 09:07:02', '2026-10-19 09:07:02'),
(289, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-K6RRGL', '{\"reverse_auction_id\":13,\"reference_number\":\"REV-202610-TUVRI\",\"approved_by\":1}', '2026-10-19 09:07:04', '2026-10-19 09:07:04'),
(290, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-REVUEV', '{\"reverse_auction_id\":12,\"reference_number\":\"REV-202610-5MLBT\",\"approved_by\":1}', '2026-10-19 09:07:05', '2026-10-19 09:07:05'),
(291, 'admin', 1, 'REVERSE_AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NAKL1M', '{\"reverse_auction_id\":11,\"reference_number\":\"REV-202610-RW9CI\",\"approved_by\":1}', '2026-10-19 09:07:07', '2026-10-19 09:07:07'),
(292, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NDY5XA', '{\"auction_id\":37,\"lot_number\":\"AUC-202610-XDFU\",\"title\":\"IT Enterprise Hardware2\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":true,\"featured_image\":\"auctions\\/seller-lot-it-enterprise-hardware2-20261019145329-c21fv.png\",\"has_manifest\":false,\"manifest_name\":null}', '2026-10-19 09:23:29', '2026-10-19 09:23:29'),
(293, 'admin', 1, 'AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-7FCRH6', '{\"auction_id\":37,\"lot_number\":\"AUC-202610-XDFU\",\"title\":\"IT Enterprise Hardware2\",\"published_status\":\"scheduled\",\"start_date\":\"2026-10-19 20:21:00\",\"end_date\":\"2026-10-19 20:30:00\",\"approved_by\":1}', '2026-10-19 09:24:12', '2026-10-19 09:24:12'),
(294, 'sdfuu', 2, 'REVERSE_AUCTION_RFQ_OPENED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-LQ9OZ5', '{\"reverse_auction_id\":10,\"reference_number\":\"REV-202610-LNPX3\",\"rfq_id\":10,\"rfq_number\":\"RFQ-2026-ILKAWL\",\"buyer_id\":2,\"seller_id\":3,\"initiated_by\":2}', '2026-10-19 09:30:00', '2026-10-19 09:30:00'),
(295, 'hello', 3, 'CORPORATE_TRADING_LOT_CREATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-WUI1E2', '{\"corporate_trading_id\":20,\"lot_number\":\"CORP-202610-6YLKO\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"buy_now_price\":\"150.00\",\"approval_status\":\"pending\",\"status\":\"draft\"}', '2026-10-19 09:32:21', '2026-10-19 09:32:21'),
(296, 'admin', 1, 'CORPORATE_TRADING_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-FWSRUE', '{\"corporate_trading_id\":20,\"lot_number\":\"CORP-202610-6YLKO\",\"seller_id\":3,\"transaction_routes\":[\"buy_now\",\"rfq\"],\"approved_by\":1}', '2026-10-19 09:32:49', '2026-10-19 09:32:49'),
(297, 'sdfuu', 2, 'REVERSE_AUCTION_RFQ_AWARD_ACCEPTED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-A9OXVZ', '{\"reverse_auction_id\":10,\"reference_number\":\"REV-202610-LNPX3\",\"rfq_id\":10,\"rfq_number\":\"RFQ-2026-ILKAWL\",\"buyer_id\":2,\"seller_id\":3,\"reverse_auction_bid_id\":19,\"amount_per_unit\":\"4250000.00\",\"quantity\":10,\"total_amount\":\"42500000.00\",\"award_source\":\"rfq\"}', '2026-10-19 09:39:30', '2026-10-19 09:39:30'),
(298, 'system', NULL, 'REVERSE_AUCTION_RFQ_OPENED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-QJGGGN', '{\"reverse_auction_id\":16,\"reference_number\":\"REV-202610-U1FOV\",\"rfq_id\":14,\"rfq_number\":\"RFQ-2026-OJVJ0W\",\"buyer_id\":10,\"seller_id\":3,\"initiated_by\":3}', '2026-10-19 09:57:06', '2026-10-19 09:57:06'),
(299, 'buyer2', 10, 'REVERSE_AUCTION_RFQ_AWARD_ACCEPTED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-QMHK48', '{\"reverse_auction_id\":16,\"reference_number\":\"REV-202610-U1FOV\",\"rfq_id\":14,\"rfq_number\":\"RFQ-2026-OJVJ0W\",\"buyer_id\":10,\"seller_id\":3,\"reverse_auction_bid_id\":20,\"amount_per_unit\":\"7000.00\",\"quantity\":5000,\"total_amount\":\"35000000.00\",\"award_source\":\"rfq\"}', '2026-10-19 10:03:06', '2026-10-19 10:03:06'),
(300, 'hello', 3, 'AUCTION_SUBMITTED_FOR_APPROVAL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-GUNALL', '{\"auction_id\":38,\"lot_number\":\"AUC-202610-6YA9\",\"title\":\"Test AUction\",\"seller_id\":3,\"status\":\"pending\",\"has_featured_image\":false,\"featured_image\":null,\"has_manifest\":false,\"manifest_name\":null}', '2026-10-19 10:20:45', '2026-10-19 10:20:45'),
(301, 'admin', 1, 'AUCTION_APPROVED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-FLKKJL', '{\"auction_id\":38,\"lot_number\":\"AUC-202610-6YA9\",\"title\":\"Test AUction\",\"published_status\":\"live\",\"start_date\":\"2026-10-19 15:51:03\",\"end_date\":\"2026-10-19 15:55:03\",\"approved_by\":1}', '2026-10-19 10:21:03', '2026-10-19 10:21:03'),
(302, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-R8H6RH', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 11:39:47', '2026-10-19 11:39:47'),
(303, 'seller2@gmail.com', 8, 'SESSION_TIMEOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-WMSWDG', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-10-19T13:50:49+00:00\",\"expired_at\":\"2026-10-19T17:21:26.506235Z\"}', '2026-10-19 11:51:26', '2026-10-19 11:51:26'),
(304, 'seller1', 7, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-SSANNJ', '{\"guard\":\"portal\",\"user_id\":7,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-19 11:52:06', '2026-10-19 11:52:06'),
(305, 'seller1@gmail.com', 7, 'SESSION_TIMEOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-ADN3IT', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-10-19T17:31:59+00:00\",\"expired_at\":\"2026-10-19T20:33:38.930135Z\"}', '2026-10-19 15:03:38', '2026-10-19 15:03:38'),
(306, 'ben@b2bexportsllc.r1orcom', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-O785SZ', '{\"guard\":\"portal\",\"email\":\"ben@b2bexportsllc.r1orcom\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-19 15:06:40', '2026-10-19 15:06:40'),
(307, 'ben@b2bexportsllc.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-MMFOSR', '{\"guard\":\"portal\",\"email\":\"ben@b2bexportsllc.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-19 15:07:23', '2026-10-19 15:07:23'),
(308, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-S5W53W', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-10-19T15:51:20+00:00\",\"expired_at\":\"2026-10-20T12:06:55.002182Z\"}', '2026-10-20 06:36:55', '2026-10-20 06:36:55'),
(309, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-8DVZ2V', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36 Edg\\/155.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-26 07:42:55', '2026-10-26 07:42:55'),
(310, 'buyer@gmail.com', 2, 'SESSION_TIMEOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-PXTGFX', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-10-26T13:40:20+00:00\",\"expired_at\":\"2026-10-26T17:49:26.296129Z\"}', '2026-10-26 12:19:26', '2026-10-26 12:19:26'),
(311, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-8QUXXE', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-26 12:25:27', '2026-10-26 12:25:27'),
(312, 'buyer@gmail.com', 2, 'SESSION_TIMEOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-WQFPAK', '{\"guard\":\"portal\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-10-26T17:58:14+00:00\",\"expired_at\":\"2026-10-26T20:12:31.742434Z\"}', '2026-10-26 14:42:31', '2026-10-26 14:42:31'),
(313, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-OXBG77', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36 Edg\\/156.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-28 07:48:19', '2026-10-28 07:48:19'),
(314, 'sdfuu', 2, 'LOGOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-U4TKYI', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36 Edg\\/156.0.0.0\"}', '2026-10-28 07:51:26', '2026-10-28 07:51:26'),
(315, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-1IHQBG', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36 Edg\\/156.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-28 07:52:57', '2026-10-28 07:52:57'),
(316, 'seller@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-HTJICU', '{\"guard\":\"portal\",\"email\":\"seller@gmail.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-28 07:56:57', '2026-10-28 07:56:57'),
(317, 'seller@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-6SPLNG', '{\"guard\":\"portal\",\"email\":\"seller@gmail.com\",\"attempts_remaining\":3,\"ip\":\"27.123.86.74\"}', '2026-10-28 07:57:33', '2026-10-28 07:57:33'),
(318, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-VHNM8O', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"remember\":true,\"session_timeout_minutes\":120}', '2026-10-28 07:57:39', '2026-10-28 07:57:39'),
(319, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-BOG8LK', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-28 07:58:01', '2026-10-28 07:58:01'),
(320, 'sdfuu', 2, 'LOGOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-CHPPLC', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\"}', '2026-10-28 08:00:07', '2026-10-28 08:00:07'),
(321, 'admin@itbauction.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-SQLGJJ', '{\"guard\":\"web\",\"email\":\"admin@itbauction.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-28 08:00:42', '2026-10-28 08:00:42'),
(322, 'admin@itbauctions.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-CGRRZZ', '{\"guard\":\"web\",\"email\":\"admin@itbauctions.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-28 08:00:49', '2026-10-28 08:00:49'),
(323, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-3HHEBZ', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-10-28 08:01:01', '2026-10-28 08:01:01'),
(324, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-CJAHPN', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-28 08:01:08', '2026-10-28 08:01:08'),
(325, 'admin', 1, 'AUCTION_UPDATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-DRALSB', '{\"auction_id\":38,\"lot_number\":\"AUC-202610-6YA9\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-10-28 08:04:33', '2026-10-28 08:04:33'),
(326, 'admin', 1, 'AUCTION_UPDATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-GJNPXG', '{\"auction_id\":38,\"lot_number\":\"AUC-202610-6YA9\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-10-28 08:05:57', '2026-10-28 08:05:57'),
(327, 'buyer2', 10, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-AX2UOR', '{\"guard\":\"portal\",\"user_id\":10,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-28 08:07:25', '2026-10-28 08:07:25'),
(328, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-OJAOHB', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36 Edg\\/156.0.0.0\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-10-28 08:08:25', '2026-10-28 08:08:25'),
(329, 'admin', 1, 'AUCTION_UPDATED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-FPBI20', '{\"auction_id\":38,\"lot_number\":\"AUC-202610-6YA9\",\"transaction_routes\":[\"forward\"],\"updated_by\":1}', '2026-10-28 08:14:04', '2026-10-28 08:14:04'),
(330, 'hello', 3, 'REVERSE_AUCTION_RFQ_OPENED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-NWRQ7G', '{\"reverse_auction_id\":15,\"reference_number\":\"REV-202610-BX52Q\",\"rfq_id\":15,\"rfq_number\":\"RFQ-2026-ZN77JR\",\"buyer_id\":10,\"seller_id\":3,\"initiated_by\":3}', '2026-10-28 08:21:48', '2026-10-28 08:21:48'),
(331, 'buyer2', 10, 'REVERSE_AUCTION_RFQ_AWARD_ACCEPTED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-HXXXMZ', '{\"reverse_auction_id\":15,\"reference_number\":\"REV-202610-BX52Q\",\"rfq_id\":15,\"rfq_number\":\"RFQ-2026-ZN77JR\",\"buyer_id\":10,\"seller_id\":3,\"reverse_auction_bid_id\":21,\"amount_per_unit\":\"98456.00\",\"quantity\":8,\"total_amount\":\"787648.00\",\"award_source\":\"rfq\"}', '2026-10-28 08:52:04', '2026-10-28 08:52:04'),
(332, 'buyer2', 10, 'LOGOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-6C1NWF', '{\"guard\":\"portal\",\"user_id\":10,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\"}', '2026-10-28 09:06:23', '2026-10-28 09:06:23'),
(333, 'hello', 3, 'LOGOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-DHBZII', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36 Edg\\/156.0.0.0\"}', '2026-10-28 09:06:33', '2026-10-28 09:06:33'),
(334, 'sdfuu', 2, 'LOGOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-1CU5PS', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36 Edg\\/156.0.0.0\"}', '2026-10-28 09:19:20', '2026-10-28 09:19:20'),
(335, 'buyer@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-PCV9WC', '{\"guard\":\"portal\",\"email\":\"buyer@gmail.com\",\"attempts_remaining\":4,\"ip\":\"27.123.86.74\"}', '2026-11-03 09:02:28', '2026-11-03 09:02:28'),
(336, 'buyer@gmail.com', NULL, 'LOGIN_FAILED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-54XZ03', '{\"guard\":\"portal\",\"email\":\"buyer@gmail.com\",\"attempts_remaining\":3,\"ip\":\"27.123.86.74\"}', '2026-11-03 09:03:20', '2026-11-03 09:03:20'),
(337, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 42.108.26.11 | Loc: Local / Internal', '42.108.26.11', 'Local / Internal', 'AUD-0YRUHH', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"42.108.26.11\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-11-03 09:04:58', '2026-11-03 09:04:58'),
(338, 'sdfuu', 2, 'LOGOUT', 'IP: 42.108.26.11 | Loc: Local / Internal', '42.108.26.11', 'Local / Internal', 'AUD-EB4ZZF', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"42.108.26.11\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\"}', '2026-11-03 09:05:10', '2026-11-03 09:05:10'),
(339, 'sdfuu', 2, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-XVRWVW', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-11-03 09:06:53', '2026-11-03 09:06:53'),
(340, 'sdfuu', 2, 'LOGOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-MIEJVA', '{\"guard\":\"portal\",\"user_id\":2,\"account_type\":\"buyer\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\"}', '2026-11-03 09:10:39', '2026-11-03 09:10:39'),
(341, 'hello', 3, 'LOGIN_SUCCESSFUL', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-ATO0L7', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-11-03 09:10:58', '2026-11-03 09:10:58'),
(342, 'hello', 3, 'LOGOUT', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-V6BUSQ', '{\"guard\":\"portal\",\"user_id\":3,\"account_type\":\"seller\",\"ip\":\"27.123.86.74\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\"}', '2026-11-03 09:12:16', '2026-11-03 09:12:16'),
(343, 'admin@itbidauction.com', 1, 'LOGIN_ACCESS_DENIED', 'IP: 27.123.86.74 | Loc: Local / Internal', '27.123.86.74', 'Local / Internal', 'AUD-EYPWXO', '{\"guard\":\"portal\",\"reason\":\"Non-portal account\",\"user_id\":1,\"ip\":\"27.123.86.74\"}', '2026-11-16 15:53:51', '2026-11-16 15:53:51'),
(344, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-IPOFXI', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"127.0.0.1\"}', '2026-11-17 08:27:21', '2026-11-17 08:27:21'),
(345, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-77SHZG', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":3,\"ip\":\"127.0.0.1\"}', '2026-11-17 08:27:30', '2026-11-17 08:27:30'),
(346, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-ZLZTR4', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/157.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-11-17 08:27:46', '2026-11-17 08:27:46'),
(347, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-IX0W71', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/157.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-11-17 08:34:50', '2026-11-17 08:34:50'),
(348, 'system', NULL, 'REVERSE_AUCTION_RFQ_OPENED', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-VULVP0', '{\"reverse_auction_id\":17,\"reference_number\":\"REV-202611-LQB1H\",\"rfq_id\":16,\"rfq_number\":\"RFQ-2026-QZLQBC\",\"buyer_id\":2,\"seller_id\":7,\"initiated_by\":7}', '2026-11-17 08:45:03', '2026-11-17 08:45:03'),
(349, 'manager@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-9DVOVC', '{\"guard\":\"web\",\"email\":\"manager@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"127.0.0.1\"}', '2026-11-17 10:18:00', '2026-11-17 10:18:00'),
(350, 'manager@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-L9RE2I', '{\"guard\":\"web\",\"email\":\"manager@itbidauctions.com\",\"attempts_remaining\":3,\"ip\":\"127.0.0.1\"}', '2026-11-17 10:18:08', '2026-11-17 10:18:08'),
(351, 'admin@itbidauction.com', 1, 'SESSION_TIMEOUT', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-6KKKV5', '{\"guard\":\"web\",\"reason\":\"inactivity\",\"timeout_minutes\":120,\"last_activity_at\":\"2026-11-17T16:30:08+00:00\",\"expired_at\":\"2026-11-17T20:58:11.527166Z\"}', '2026-11-17 15:28:11', '2026-11-17 15:28:11'),
(352, 'admin@itbidauctions.com', NULL, 'LOGIN_FAILED', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-9C8ROW', '{\"guard\":\"web\",\"email\":\"admin@itbidauctions.com\",\"attempts_remaining\":4,\"ip\":\"127.0.0.1\"}', '2026-11-17 16:04:12', '2026-11-17 16:04:12'),
(353, 'admin', 1, 'LOGIN_SUCCESSFUL', 'IP: 127.0.0.1 | Loc: Internal Network', '127.0.0.1', 'Internal Network', 'AUD-29KKHV', '{\"guard\":\"web\",\"user_id\":1,\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/157.0.0.0 Safari\\/537.36\",\"remember\":false,\"session_timeout_minutes\":120}', '2026-11-17 16:04:16', '2026-11-17 16:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `security_settings`
--

CREATE TABLE `security_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `high_security_mode` tinyint(1) NOT NULL DEFAULT 0,
  `max_login_attempts` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `lockout_duration_minutes` int(10) UNSIGNED NOT NULL DEFAULT 15,
  `bot_rate_limit_per_minute` int(10) UNSIGNED NOT NULL DEFAULT 60,
  `session_timeout_minutes` int(10) UNSIGNED NOT NULL DEFAULT 120,
  `password_min_length` int(10) UNSIGNED NOT NULL DEFAULT 8,
  `require_uppercase` tinyint(1) NOT NULL DEFAULT 1,
  `require_numeric` tinyint(1) NOT NULL DEFAULT 1,
  `require_special_char` tinyint(1) NOT NULL DEFAULT 1,
  `double_confirmation_admin_actions` tinyint(1) NOT NULL DEFAULT 1,
  `restrict_chat_to_bidders` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `security_settings`
--

INSERT INTO `security_settings` (`id`, `high_security_mode`, `max_login_attempts`, `lockout_duration_minutes`, `bot_rate_limit_per_minute`, `session_timeout_minutes`, `password_min_length`, `require_uppercase`, `require_numeric`, `require_special_char`, `double_confirmation_admin_actions`, `restrict_chat_to_bidders`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 9, 10, 120, 8, 1, 1, 1, 1, 1, '2026-08-25 09:30:22', '2026-09-22 13:10:11');

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
('0p29BmWV0gvH0D5rsXibQAmQd0FiUZv7d2JE2CcD', NULL, '45.138.12.16', 'Mozilla/5.0 (Fedora; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHNpdjhQblZLRzBmSld0dGJzZG1SRms1T2hrUUFTVnNuTTJ2SEphMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794872562),
('2JxmVUfKT8x2XdCeYasDOSbbOhby2oJFdihZqGz3', NULL, '66.132.195.209', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDh0aWUzMkd5Zkd6S1pJNDZsaUNmVlVaTnRxZXpUSHVFa294RTB1cCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794916439),
('3UErzzLAlzDryGuTtiQSkSmhH9lTZaO11Mi3ctlp', NULL, '27.123.86.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUzQwY1M5Um1WN3hQZ2ZLR0tNME1KTExISWZkOTQ3dzlOeFEwbE1yNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794864004),
('5eCcq7TuzMr98TbaOdPJP3pUuD3minOa841tbzGr', NULL, '40.77.167.10', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiME1kQnJzT3hBdVdlSmVqQTNoeEhIZ0lvZjV1VkY3TkhVRWxjOUNrZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9hdWN0aW9ucyI7czo1OiJyb3V0ZSI7czoyMDoibWFya2V0cGxhY2UuYXVjdGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794912820),
('7IQPsZfwWKtxpqVGiVdFAC3Bond1m7Fh8ybtx9QW', NULL, '40.77.167.47', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGRMSHVpQXNST0NhSzJiN0hqT293aURJcnlFalBWeVYwYjN4QjdnOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794870279),
('8jshelddWKqyLD0GtgRod5kK9PUT6zjM7cQB5mZg', NULL, '52.167.144.25', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzF3TVU3WXJnTWxndFhDaldPUlRMSnFSUzd0VURCRWluYzV2MTBXNSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9hdWN0aW9ucyI7czo1OiJyb3V0ZSI7czoyMDoibWFya2V0cGxhY2UuYXVjdGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794854070),
('bAoZnKonQEvKuQ3rvItxOMcwCsrqC0w5FgxxpImB', NULL, '40.77.167.7', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVNDR3JESm56UlZZcWxobjdGT2NVQVZqTGVIRUdTRFREeW5PNjczNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794881341),
('bciD8L3tZLKvqDltEPc1YXzPA4PH41wC09pXsACS', NULL, '194.164.107.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicENnbFFRZnAweVdSbFhad2pwRGFNajlMeWNLV0ZHMGJyQTFkbkFvcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794897090),
('blFK8YbBwkDcFSfqolsFGwqrPPumznL2QjDXB5HP', NULL, '192.155.90.42', 'RootEvidence/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVh0SVhBR3c5aUdEUTlGb3pYa2tiN2JwNEZaaFA2aTZPaGNJWmJGSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794916334),
('BnrJcop3nbjfqExR5QvmjsSvF55gMUinXT2kkW9l', NULL, '45.138.12.16', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDVsM2dwSndQTEZ5b1h4YmYxd2puWE1Icms0c0ZjZVFBZHJvbDJtSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794910001),
('BOg5v2afnamaFsXoQ16VcFBzFDaITScWbIrdWFsb', NULL, '172.234.113.166', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTBESFBFYk1VZmREdHBnYVI2VnFneGNUamVaUVdJM2VZN1djN2h0VyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794896689),
('cAuu89Dn5y5PdUzxZ3dAIxK3HcyPnm8fYOXitFDv', NULL, '40.77.167.79', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickk4bU53VGxyTXM4RGFLSUc3WUZGb09yWnllWnZ5WGdabXp6RmxEViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794890249),
('cHZeUtk2gLWFSlOoHt44tJYTn5aaNumVOTZdCRW3', NULL, '27.123.86.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ3FWN0hVOWF1RlJsM3U5VGJrdDFoeDRhV1dWY1ZyOXVWUkFHblNiUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS8/cT1zZXJ2ZXIiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjA6InBhc3N3b3JkX2hhc2hfcG9ydGFsIjtzOjY0OiJmMGExMWQ1ZTI3MjI5ZmU5M2U0MjljMTAyNTA0MWFmNWE0ZmRkNjg5YmNhMjA4MWI4NWJkZGY5NWVkYjk1MjQ5IjtzOjc6ImNhcHRjaGEiO2E6Mzp7czo5OiJzZW5zaXRpdmUiO2I6MDtzOjM6ImtleSI7czozMTI6ImV5SnBkaUk2SWpZdlJVNVBkSGRRUVdsUVFVMTROVVZLT0VSc1QyYzlQU0lzSW5aaGJIVmxJam9pVlZKNVRscE1OVkI1V1cxc1kwdHdWV3B3YzFaV1VqRnZTMHN2TXpBeVFqQXZhemxEYW05RFRWVTFUazVtTld4NlJtOTJVa0ZLY0VOQ09IUnhWMHR6TVRoNkwwSlRiMHQ2YW05bVpqQnNOWFJzWVM5dll6RjFSRUl6VmpKNU9XZHJkMUJ3S3pkV1dpOWhiMmM5SWl3aWJXRmpJam9pT0RZek5EUXdaVEV6Wm1Fek5HRmpZbVU1T0Rrd05tVXlZakkzWWpJMU1URmpNV1E0TXpBeU16RmlZbU5rT1RZek1XSTROMkZsWlRJNVpUVmtNalZtTWlJc0luUmhaeUk2SWlKOSI7czo3OiJlbmNyeXB0IjtiOjE7fX0=', 1794864334),
('DAyKUU8QlhSiY2SZLvMZYKhf58nqECVeX2BFzRC2', 1, '127.0.0.1', 'Symfony', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkJCc2gyTUllYXQyTEdQaUxuUjhQZ25ZalNlWGM5a3ZvNlZXQXVZSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvYWRtaW4vbG9naW4iO3M6NToicm91dGUiO3M6MTE6ImFkbWluLmxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794924969),
('DHbhx8StVxNG5wEdiVZVquLKf0hYQTDxmF2Jwt4O', NULL, '34.69.171.12', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVlDVVF3ZEJVUlI5dVhNc3pDN1UwT08yeTZhN1ljN0tVdU5sQU5FYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794918330),
('dkfB4csl2aBpsCSzqb8hFWWhHrX6Ootwh10jBHnW', NULL, '40.77.167.72', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVXRyQ25TNjUwTzY5S3l2QWxuYVAxSk1ucWthRThyemo0dldkUzk1bCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL3RpY2tldHMiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0ODoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL2xvZ2luIjtzOjU6InJvdXRlIjtzOjE0OiJjdXN0b21lci5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1794903974),
('DPY57mjSHjofygR9sWrtlYQD7R8GNfwZNf9B1cE0', NULL, '202.142.67.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHBoTUpYRVM4OWQ0VlI3N0lIbW9oUWxKSzlwSDZmT0VqTXU5WlU1SyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jYXB0Y2hhL2ZsYXQ/NldJZGxaZTYlM0Z2PTAiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoiY2FwdGNoYSI7YTozOntzOjk6InNlbnNpdGl2ZSI7YjowO3M6Mzoia2V5IjtzOjMxMjoiZXlKcGRpSTZJbEJTVjI4eVpHNTFaa05LVGxack5qQnNTR1k1V1djOVBTSXNJblpoYkhWbElqb2lObXhLY0ZOdFltVk5MMVpZVEhwdloxRTVUMk5NYm01TE1qZFJLM1pxZERWUWNXSndRbGRXYVZkNVVXWjBhR1JRTWtsclZHUllNQ3R0VnpSaVpHTlBZVTF4UVUxd1oyUnFiM0l5U3pneFVsZ3hXSEIzVkVjeGVFMWhheTlhTldJd1ZEQlFZM2RNUkZweFpUZzlJaXdpYldGaklqb2lZMk5sWmpRMU1tVmpNbVZpWlROaE1EWXlZV05rTkdKak1tUTVPRGxpTkdVd1lUUmhPRGxoWVRJeVlqRm1Oek14TkRWbFpERmtZbU5tTURabFptVTROaUlzSW5SaFp5STZJaUo5IjtzOjc6ImVuY3J5cHQiO2I6MTt9fQ==', 1794894782),
('FgfpWk4ebPF18ShzmXEFxNhOJKsrLqEePKzpYRDV', NULL, '34.83.238.131', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTR1QUszMXZGc0RaZzBGMm1SVFFzSzdjblpXdFkyWWRtcm1tNkNUaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794863772),
('FQZkOKQoebqylKYfK8p0zl4L4N0sSxgHKzYcqFBm', NULL, '51.68.248.16', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUhDWklYRzlmbnZnM0VUbk5sNE0wenRUM1JnVU5kUVphUkN1bEt3YyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794859536),
('g3yQaD9HC4Xh02PngEGnMeVODnctYsMJKf0vr6LE', NULL, '40.77.167.27', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0xIejBiWkZzTDZNODlkMVBPSFFEYnYwazRyeXJlWXRWMzdhaWliUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6ODA6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9hdWN0aW9ucy81MDAwLWxicy1taXhlZC10ZWxlY29tLWNpcmN1aXQtYm9hcmRzIjtzOjU6InJvdXRlIjtzOjI1OiJtYXJrZXRwbGFjZS5hdWN0aW9ucy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794891451),
('GwzM4AU88qb7LAg4FxeBcqVpb2or1YN9sJScezzx', NULL, '52.167.144.211', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVERrZDJRdUxYS0x2NWV3VWxSQnlPeTVESFNJTGRINGlNVTNhM1FINCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794899117),
('Hfs9JRwVi2vBT3b5j4T4djCCEgTGHRX4T1M60gIt', NULL, '154.192.227.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieU5EaFZQdnBidEx6REhLUEQwT1Yxb0xJRzRxWDFYblpVNXhkRkVJWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9mYXEiO3M6NToicm91dGUiO3M6MzoiZmFxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794862390),
('IAQy2yebMdqSCXKKLtnUU0as1je6BydI1jMY9bAv', NULL, '40.77.167.254', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHhlVmt0cTBRdzNiWXJBQkxnWHU5ZTJKVm5VQW5vRDV6cnVhdHBmUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794916812),
('idiALEQlviVUCd7jcuITvGrUy8OsW2ccOe5jqgtp', NULL, '45.92.1.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVFjSVU3eEE0MFdlVWZxYWVEZkI1YldXcFRkV0RVV3ZOWEFnNzNpQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794850291),
('Ikx1fawnWZkLicbi4UI83EyzKyilwlOWU2ORKo27', NULL, '86.54.28.253', 'RootEvidence/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRno3cDk4d09OU0d1eGUwSkt4YjBBOHU2NmJFY0p5QWZ5cUIwb2trOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794906566),
('JtaDo3LSXB7axNMrJliIh3i0jgj87E3m1yD00qDO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWd6SjExOEFVVlpwUUU1bTZISlNkNnFFd1A3SkFTZHAzQ2ZhVHpZeiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794930112),
('kmY2nWt3i0pNY41XfUA6nCmq40LnflwcwqG5uWcA', NULL, '27.123.86.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamE2eW9xQ3Z1c0h3bjgwMEFwd3J5UkZncEFRSjB4eU5VckNyMG9kQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794864085),
('LH8LxPZHL6ZxbSdLDOs5cAeeSiRTFv3KsQ2k5m11', NULL, '52.167.144.173', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibzRsTVZTWDBGRUtEZ2FZVEhjdWN2NEFsbnF4Q3A3djhaY0x1SXFLbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL3RpY2tldHMiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0ODoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL2xvZ2luIjtzOjU6InJvdXRlIjtzOjE0OiJjdXN0b21lci5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1794885675),
('liG2guCW5dbZyvzPDAj8M8HX6jLQtJDH1vAOfaTR', NULL, '86.54.28.253', 'RootEvidence/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0lramI2YnhiUElzY2k0V21PcWdRMDBZWUNsODBFMXJBQ0Q5TzVpYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794906305),
('Lvn6WbagqPQmzDVFzpqcHgQBpC85DvbZ5iEdVPG1', NULL, '27.123.86.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjd0aUhmS0lBU0MyaFlvd3d5T05WeXl6R0dVS2hJUHE4QjVIaHVQUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794921547),
('MzCxIckAOOSukaDH0IiX4hlGSm0ePS7cJwoNSouM', NULL, '195.178.110.199', 'Mozilla/5.0 (compatible; scanner/1.0)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNklwUXZZVE82WHFzdUFqYzBHWFFhNXZTcUFWUzZBalBoSWRmMGVraCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794876166),
('OFQh8lbCtwLDPf8rS8GH9iKOIpMm3jDgHoQdW0zA', NULL, '27.123.86.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic09PN3VxZjBJcG93SVlVVUVjdzNNRmdyRm5zVFFCejg3bzBSYlF3UyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794866079),
('P4Djg2ZjpTo64ALfvGv3ploUZITeKNu9SxBXYGIA', NULL, '161.35.145.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiektmd1FkdUFzZ3lGS2h0cVV2SUxlaXc5M1dyamFvZWdHbUJzejN5aSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794855344),
('PBNh5nKhVdsrd0UuAR4LnhowTwR0mSFHuJbxhfDp', NULL, '207.46.13.14', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWm5Jak1SVWh2MmszeTNPNEtCNDJPNFZBeTRFaW9TZENzVUNNZGxpbCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9yZXZlcnNlLWF1Y3Rpb25zIjtzOjU6InJvdXRlIjtzOjE2OiJyZXZlcnNlLmF1Y3Rpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794875819),
('PGRUhaNdg5aafFPEJgLpk7NbkUCl1LYazlaNGMGz', NULL, '136.85.75.199', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 14_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidE1WTHNSVEtaNnZwYUpWM1hEVGVpVlNxYk9ON01iMVAyd25zNzNVZiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794849086),
('plUwTk4nEvYLBQyvN2CxTyVmLBexzjXSpxOAoor4', NULL, '45.138.12.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVNWdG5YZnJ1QldjNk9YVlpzNlZWbjcxNEd1aEZVdmpqSHd0N1FGRSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794911007),
('pTpi7TVoH45nXVcuYSXViUzKhzwtuDhjbFET1gqc', NULL, '172.253.234.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDR4SnJacUdkMjVKemVaUFZQc2oyVnZPTnJkRHphR3NHRlpIcWM5WCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794862598),
('QWx2do0HXo1uDFymlq7IOo80kJcmNn37l1VKwiOw', NULL, '45.138.12.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXlkVHYzeklUVkhmalhrMjB5VUZFWDlTaEM0Z3E0MkUxMXBOUTVVRyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794872930),
('rgK6MhEL8K9kL2i38pjEYZoJQohYvSvYMPTexILW', NULL, '192.210.150.198', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicTdLdEx5TEdneEttN0FmbHQ1MHpXT2JMV1h5M0kydlppclJFY01NbiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9yZXZlcnNlLWF1Y3Rpb25zIjtzOjU6InJvdXRlIjtzOjE2OiJyZXZlcnNlLmF1Y3Rpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL3RpY2tldHMiO319', 1794901171),
('SyO1fTvyvhBAyrqJ4d1m8fxi00fEOS9M8eT16AfM', NULL, '216.226.76.20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicng5WHU5VFR0eFZBTlo5MEZaOGloOGh3Qk5wU2tzOHg1VndzbXZnZiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794851272),
('Syw6sisUo1NdM4HmuCqA4GMsnLRnFDI8Bd36GR6s', NULL, '86.54.28.253', 'RootEvidence/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZktVSGpTMU9yYUFvYVBXVXJDQUREVWVvcmxlMmczQm1LYnFGTmJQUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794906306),
('thVeHhtSxk6N4tq7Krsi3vff8CfKWd3ZxTOp81El', NULL, '192.155.90.42', 'RootEvidence/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTU5CbzFYNGQ1YzlKWlh1dDF4UnZJYUc5aGZ5TnRDU1dwdU16MmtHWiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794917323),
('TimLmbdS7LDduSsJTHMxvcsy50WVbBhcEFSyQZRK', NULL, '52.167.144.211', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXRoUWJZemIwTFpJYUtFeFFHdFB2eExyWUxGQkJic1dMRmdRSGhWVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794863075),
('U8aOWmqeRrH51SgEwd6jhu0UcbSjGIJG6tONcItl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzB5VkpwWXRiYkpvUXNGZ00zNVpKVG84MmxjNW0yT1kzWkxxeUNJTCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9sb2dpbiI7czo1OiJyb3V0ZSI7czoxMToiYWRtaW4ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794930488),
('UDPlUxkJG1K8d1bQRomZgRJqaWDtEnY2Nj6Kjgu8', NULL, '40.77.167.57', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR2ZtYWpJemVob3NTWDlGbFhRMmFBbFBvMjFsSllkcG5HM3hqWmp1cCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL3RpY2tldHMiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0ODoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL2xvZ2luIjtzOjU6InJvdXRlIjtzOjE0OiJjdXN0b21lci5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1794849062),
('UjaDSyiwOW9nDrlDEUJnZA2yxqDwiGQwpX7PChmk', NULL, '27.123.86.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnEwemtOTTRyYnNaZ2hyU2JPOGxPcTVHWnR3WWlFa2dpUUEzcUxoVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794921550),
('UWUVWjKCoA6YO4JROt7oMVGXYAYjsWhmBuWWsgzK', NULL, '52.112.74.61', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5 skype-url-preview@microsoft.com', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVEVUbDc3dkxwMjZWZllkcFhCenZNQlUwaVcwa3A3WE5CUzZRUzFDeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794862091),
('VaGQY67weE3ZlLKifIdf8xqqPBSNh1aJZLQnRQ3Z', NULL, '52.112.49.157', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5 skype-url-preview@microsoft.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzdUVGlZZXVxM2E0VWJzTHVsQldOR2UyT0ltRVJVckQwTUVEUjlZaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794862090),
('VbA0HU74iL7ylTd0ondgb4WLTeeJSS6zBFsP6xs3', NULL, '40.77.167.154', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFp0Rk5XOTNHeUFsbDVjd0RpcmhObkVNNXNXZHp3N2swSGEybnNmUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794855886),
('wH9sGpMt4TcohIsI3P8btBoJIUsebmhAgj4SszLA', NULL, '52.112.49.156', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5 skype-url-preview@microsoft.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzlITEVYT2YxdGlKSlROekg2V1VpdnFsZ2lWUWZjOGNkTWVza2dOZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794862089),
('xQUX1Kzodol3dGp89b5lLNORyocoSodewYcHbGuf', NULL, '52.167.144.176', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRU16VGVmR1Bzbk0zeVp3WDk2NllwcjQwRGVDdnVERE84aU9hc0lJWiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9hdWN0aW9ucyI7czo1OiJyb3V0ZSI7czoyMDoibWFya2V0cGxhY2UuYXVjdGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794849371),
('xUSsH4sL2nLwwkVNkDOnbmjM9EGhysk19y5R9dJY', NULL, '45.138.12.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFI3RElOTmViSURIa1JrTnM2SERVNURWMll5blJtZVkxVXFKbXdBeCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794872930),
('y2BygBC47IQQOFtYC2ebVPQhOax7abdNjCHsEeRO', NULL, '40.77.167.1', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVU5DSU12YkRMRUoxSXBXVWs4S00yT0FlbzVwM3hBYWlRZ0hxYlRlNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794907904),
('yMV1CFPzaWA3uvbDiqqoDcc0KcXYPDqf1IYM4iNt', NULL, '192.155.90.42', 'RootEvidence/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnZzUEtqNVFWbTVwcTZwMGN4NnB6UTJVUmcxSHpVZU04S2ZOQ29SRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794916334),
('yvSL7robR8kbDZeHuRritu8EKwOkER1ao0d5tNd2', NULL, '40.77.167.75', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV01vTXdCZEtZdENtRG9MV3FHQUo0cWpPdGlWbXFDV3NTZEdHclNxaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL3RpY2tldHMiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0ODoiaHR0cHM6Ly93d3cuZGV2Lml0YmlkYXVjdGlvbnMuY29tL2N1c3RvbWVyL2xvZ2luIjtzOjU6InJvdXRlIjtzOjE0OiJjdXN0b21lci5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1794867424),
('zfoxy9lPMDdQn6cqqOjc1FrbfpMZKzDtUxVa4AZ0', NULL, '195.178.110.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnBaZDFnbEJhTzZTVTFIR1F2VVZkQmRTRHcycDZkdWxHdEFpcmh6UyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1794876135),
('ZNG1ZGbLiWdw8XCYpboSlpYfYrzEvFkaVqCuL3QW', NULL, '40.77.167.13', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjlLTExES1V3V1hqN0V3WnFuTGxMeFVHWTFLQkRUc2diQ2NWOXllZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmRldi5pdGJpZGF1Y3Rpb25zLmNvbS9jdXN0b21lci9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1794848621),
('zWpdhblYllNkaBjVWeLDl7CBfWyOUxs5cQfa4qsL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiTEN4Yjg5RVlBeG16ZllFT3ZxZmdEdEdjRlVwZDJMYXoxdFFGVjI3dSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb3Jwb3JhdGUtdHJhZGluZyI7czo1OiJyb3V0ZSI7czoxNzoiY29ycG9yYXRlLnRyYWRpbmciO31zOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiNTNlYWIwOWRjMWM5YTA0MDY1MWNmMzM2MmFkMjA1YWM2NTM5NDhkMmFmYTAwMTYyNjg3YTMyM2FmMDdkNTYyYyI7czo3OiJjYXB0Y2hhIjthOjM6e3M6OToic2Vuc2l0aXZlIjtiOjA7czozOiJrZXkiO3M6MzEyOiJleUpwZGlJNklrVkdjV28wYkhSWE9VeEZNMHN5VjNCU1pWRlVSbWM5UFNJc0luWmhiSFZsSWpvaVpEVnBRUzl2Y2xOQlRVVkxlRzlTWmxaQlFYcHRhbVEyYUdObmEwZFhPWEYwTm5VMVp5OW9VMjFQYkdWUllrOVFlV05zZWtOdmNGTlBhemxwZG1WQmRXSkRPSE14WWxCVmVGY3dRMFZYYmpGTWMxRkVaRXR4T1VKMFJUZFZlSEEwTUZkbEsycDRRWGM1ZVdjOUlpd2liV0ZqSWpvaVpqTm1NakU1WmpSbE5HWm1NekZrWm1aaE4yRTJNVFl4TUdJMU1URmtNVFk0TmpObVl6ZG1OMk5sTlRJNE0yRTNOVEF3TWpFeE56RXlZelkxWlRFNVlTSXNJblJoWnlJNklpSjkiO3M6NzoiZW5jcnlwdCI7YjoxO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMyOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vcmZxcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyNjoic2VjdXJpdHlfbGFzdF9hY3Rpdml0eV93ZWIiO2k6MTc5NDk1MTMyOTt9', 1794951584);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` enum('buyer','seller') NOT NULL DEFAULT 'buyer',
  `subject` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'general_inquiry',
  `priority` enum('low','medium','high','urgent') NOT NULL DEFAULT 'medium',
  `description` longtext NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `attachment_name` varchar(255) DEFAULT NULL,
  `status` enum('open','in_progress','pending','resolved','closed') NOT NULL DEFAULT 'open',
  `admin_notes` text DEFAULT NULL,
  `resolved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `last_replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_number`, `user_id`, `user_type`, `subject`, `category`, `priority`, `description`, `attachment`, `attachment_name`, `status`, `admin_notes`, `resolved_by`, `resolved_at`, `last_replied_at`, `created_at`, `updated_at`) VALUES
(1, 'TCK-2026-PHWA3M', 2, 'buyer', 'Image error', 'general_inquiry', 'urgent', 'Error on Main auctions when image is not uploaded', NULL, NULL, 'in_progress', NULL, NULL, NULL, '2026-09-30 13:58:47', '2026-09-24 09:07:16', '2026-09-30 13:58:47'),
(2, 'TCK-2026-OG8PO2', 3, 'seller', 'Corporate Trading List issue', 'general_inquiry', 'urgent', 'Corporate Trading List issue', 'tickets/jNKT9udFzavhMgTjtnez6OEBL3RNIYtBTqDdIWRn.png', 'Screenshot 2026-09-30 224540.png', 'closed', NULL, 1, '2026-09-30 12:50:53', NULL, '2026-09-30 11:46:52', '2026-09-30 12:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_admin_reply` tinyint(1) NOT NULL DEFAULT 0,
  `message` longtext NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `attachment_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `user_id`, `is_admin_reply`, `message`, `attachment`, `attachment_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Hi,\n\nThank you for reporting the issue. We have noted the error occurring on the Main Auctions page when no image is uploaded. Our team will look into this and verify whether an image is required or if the page should work without an image.\n\nWe’ll update you once we have more information.\n\nThanks for your patience.', NULL, NULL, '2026-09-24 09:11:00', '2026-09-24 09:11:00'),
(2, 1, 1, 1, 'HI hi hi', NULL, NULL, '2026-09-30 13:58:27', '2026-09-30 13:58:27'),
(3, 1, 2, 0, 'HHHHH', NULL, NULL, '2026-09-30 13:58:47', '2026-09-30 13:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` enum('buyer','seller') DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','active','rejected','suspended') NOT NULL DEFAULT 'active',
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint(20) UNSIGNED DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `suspended_by` bigint(20) UNSIGNED DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `suspension_reason` text DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `username`, `email`, `phone`, `email_verified_at`, `password`, `account_type`, `manager_id`, `created_by`, `status`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `rejection_reason`, `suspended_by`, `suspended_at`, `suspension_reason`, `last_login_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'System Administrator', 'admin', 'admin@itbidauction.com', NULL, NULL, '$2y$12$d4BOFGz3hq.sLhIU7z1VJO5bD1KpNZN7ZCCQitoo9KkU2Imp29MCm', NULL, NULL, NULL, 'active', NULL, '2026-08-19 07:46:08', NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-17 16:04:16', NULL, '2026-08-19 07:46:09', '2026-11-17 16:04:16', NULL),
(2, 'b711d256-92de-4e19-8cf7-e17f42ca1cf2', 'jaklin farnadis', 'sdfuu', 'buyer@gmail.com', '9827572767', NULL, '$2y$12$d4BOFGz3hq.sLhIU7z1VJO5bD1KpNZN7ZCCQitoo9KkU2Imp29MCm', 'buyer', NULL, NULL, 'active', 1, '2026-08-21 14:49:37', NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-03 09:06:53', 'bmPTIiR0WWF83MMDAKIUC2Cf92I9V7yIQKvkj0C4hwGV6H52CBiKptkn8sPm', '2026-08-21 14:49:08', '2026-11-03 09:06:53', NULL),
(3, '05c010dd-bfa1-4d43-88e7-ddc0f3a84c89', 'hello we are here', 'hello', 'seller@gmail.com', '+91 9827572767', NULL, '$2y$12$d4BOFGz3hq.sLhIU7z1VJO5bD1KpNZN7ZCCQitoo9KkU2Imp29MCm', 'seller', NULL, NULL, 'active', 1, '2026-08-25 08:54:12', NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-03 09:10:58', 'tG1IDpAthQhAriikpsc36RYdnl178QFwkRbvkWuFKH0wPJfVwh8Kxbi1vAaG', '2026-08-25 08:01:31', '2026-11-03 09:10:58', NULL),
(4, 'c48859c9-c6e0-4e9d-ab66-7aba342c0c43', 'Test', 'test', 'test@test', '9876543210', NULL, '$2y$12$CaHz3i02zUZie8WeO5WstuVXjcu/gkPhHrDKWmFSDN5Rr8INuFz0G', 'seller', NULL, NULL, 'rejected', NULL, NULL, 1, '2026-09-24 09:26:44', 'Fake', NULL, NULL, NULL, NULL, NULL, '2026-09-24 09:24:44', '2026-09-24 09:26:44', NULL),
(5, NULL, 'Manager', 'manager', 'manager@itbidauctions.com', '9876543210', NULL, '$2y$12$T/zQ2QZhw/OhNt1elPMQ7evkKsYpKBBMofWlJ9QpdqDpwSsXbjfyy', NULL, NULL, 1, 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-09-24 09:28:26', '2026-09-24 09:28:26', NULL),
(6, NULL, 'Tl', 'tl', 'tl@itbidauctions.com', '9876543210', NULL, '$2y$12$xfZULgTVcrtyVZ3daiCsUewXeBV.PO3RtVJb4RCHNL6mouS2W74Am', NULL, 5, 1, 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-09-24 09:31:52', '2026-09-24 09:31:52', NULL),
(7, 'df8653d2-11e3-452c-a52a-f1caa980619a', 'Seller1', 'seller1', 'seller1@gmail.com', '9876543210', NULL, '$2y$12$2kNvhG/hg4BfSCTuiHAdQe/lSpldR6o7.JczM7GXz72yeUJ9TKBAq', 'seller', NULL, NULL, 'active', 1, '2026-09-28 13:00:42', NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-19 11:52:06', NULL, '2026-09-28 12:58:51', '2026-10-19 11:52:06', NULL),
(8, '21a5b58f-b042-4ac5-a513-3ac62f529ea5', 'Seller2', 'seller2', 'seller2@gmail.com', '9876543210', NULL, '$2y$12$BH3r0nGAqrjlGCSqy7WzAO5nlZQyVh7u/0iAuqKgXlM18uVp035Bm', 'seller', NULL, NULL, 'active', 1, '2026-09-28 13:03:52', NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-19 07:59:03', NULL, '2026-09-28 13:03:22', '2026-10-19 07:59:03', NULL),
(9, 'e137dad9-e331-4141-9534-49bd6d166e7e', 'Buyer1', 'buyer1', 'buyer1@gmail.com', '9876543210', NULL, '$2y$12$lLv4TdZz36pHKxFez/ybhOUdZMqEF99M8xctDYXcVsQDG.dMzucGS', 'buyer', NULL, NULL, 'active', 1, '2026-09-28 13:06:06', NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-19 07:38:10', NULL, '2026-09-28 13:05:23', '2026-10-19 07:38:10', NULL),
(10, 'ef49e755-63cb-420d-9725-964da091098c', 'Buyer2', 'buyer2', 'buyer2@gmail.com', '9876543210', NULL, '$2y$12$j2d73ayBUhJZc8TMqK4y6eDxn1S4uHGJ7DTk876rQin3L7HuNC4Hu', 'buyer', NULL, NULL, 'active', 1, '2026-09-28 13:07:58', NULL, NULL, NULL, NULL, NULL, NULL, '2026-10-28 08:07:25', NULL, '2026-09-28 13:07:29', '2026-10-28 08:07:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `document_number` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `status` enum('pending','verified','rejected') NOT NULL DEFAULT 'pending',
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`id`, `user_id`, `document_type`, `document_name`, `document_number`, `file_path`, `status`, `verified_by`, `verified_at`, `rejection_reason`, `created_at`, `updated_at`) VALUES
(1, 2, 'business_registration', 'Privacy Policy.pdf', NULL, 'user-documents/b711d256-92de-4e19-8cf7-e17f42ca1cf2/CiDx0gL3sVHbh7pif15zju12NslX0gn3bf831ZGP.pdf', 'verified', 1, '2026-08-25 08:05:01', NULL, '2026-08-21 14:49:08', '2026-08-25 08:05:01'),
(2, 3, 'tax_certificate', 'Employee Leave Balance_2026-01-01_2026-12-31_RETROTECH BUSINESS SOLUTIONS PRIVATE LIMITED_Active_1.pdf', NULL, 'user-documents/05c010dd-bfa1-4d43-88e7-ddc0f3a84c89/AQVsPm1L23tdfTMVxda1jXh29zxuoUyuIZwcS7H2.pdf', 'verified', 1, '2026-08-25 08:04:57', NULL, '2026-08-25 08:01:31', '2026-08-25 08:04:57'),
(3, 4, 'business_registration', 'pexels-brett-sayles-2881232.jpg', NULL, 'user-documents/c48859c9-c6e0-4e9d-ab66-7aba342c0c43/lvdoE6NFIsz59h2d3KoQTZkoBKOHWEjCOOxHDLed.jpg', 'pending', NULL, NULL, NULL, '2026-09-24 09:24:44', '2026-09-24 09:24:44'),
(4, 7, 'r2v3_certificate', 'pexels-cookiecutter-17489153.jpg', NULL, 'user-documents/df8653d2-11e3-452c-a52a-f1caa980619a/n0VsQQrHoI3epOytg6b2IOFCFl39peokY6D5Mrp9.jpg', 'verified', 1, '2026-09-28 13:00:35', NULL, '2026-09-28 12:58:51', '2026-09-28 13:00:35'),
(5, 8, 'e_stewards_certificate', 'pexels-cookiecutter-17489153.jpg', NULL, 'user-documents/21a5b58f-b042-4ac5-a513-3ac62f529ea5/eb9oQfYXnB8aqWA0lrha2zuBf3INkV7k9uFNj7QX.jpg', 'verified', 1, '2026-09-28 13:03:46', NULL, '2026-09-28 13:03:22', '2026-09-28 13:03:46'),
(6, 9, 'r2v3_certificate', 'pexels-cookiecutter-17489153.jpg', NULL, 'user-documents/e137dad9-e331-4141-9534-49bd6d166e7e/jur46ruqiftHFORxknkq43pW9UXLxmwkkFtpIT7p.jpg', 'verified', 1, '2026-09-28 13:06:01', NULL, '2026-09-28 13:05:23', '2026-09-28 13:06:01'),
(7, 10, 'business_registration', 'pexels-brett-sayles-2881232.jpg', NULL, 'user-documents/ef49e755-63cb-420d-9725-964da091098c/pud6aaqesB1D1vtDi6qjwPaCb3udQVS67F1LfwTQ.jpg', 'verified', 1, '2026-09-28 13:07:49', NULL, '2026-09-28 13:07:29', '2026-09-28 13:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `company_registration_number` varchar(255) DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postal_code` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `company_name`, `contact_person`, `business_type`, `website`, `company_registration_number`, `tax_id`, `country`, `state`, `city`, `address`, `postal_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'tata services', 'jaklin farnadis', NULL, 'http://127.0.0.1:8000/customer/register', 'sdfs', NULL, 'India', 'Madhya Pradesh', 'bhopal', 'adf asd asdf dfsa fsd', '458551', NULL, '2026-08-21 14:49:08', '2026-08-21 14:49:08'),
(2, 3, 'i am seller', 'hello we are here', NULL, 'https://google.com', '534545', '3453453', 'India', 'mp', 'asdf', 'kasdjf aklsd flk alds fjalk', '9896465', NULL, '2026-08-25 08:01:31', '2026-08-25 08:01:31'),
(3, 4, 'Test', 'Test', NULL, NULL, NULL, NULL, 'test', 'test', 'test', 'Test', 'test', NULL, '2026-09-24 09:24:44', '2026-09-24 09:24:44'),
(4, 7, 'Seller1', 'Seller1', NULL, NULL, NULL, NULL, 'Us', 'NY', 'NY', 'NY Hs. town 121', '221056', NULL, '2026-09-28 12:58:51', '2026-09-28 12:58:51'),
(5, 8, 'Seller2', 'Seller2', NULL, NULL, NULL, NULL, 'US', 'NY', 'NY', 'NY', '229081', NULL, '2026-09-28 13:03:22', '2026-09-28 13:03:22'),
(6, 9, 'Buyer1', 'Buyer1', NULL, NULL, NULL, NULL, 'US', 'NY', 'NY', 'NY', '208971', NULL, '2026-09-28 13:05:23', '2026-09-28 13:05:23'),
(7, 10, 'Buyer2', 'Buyer2', NULL, NULL, NULL, NULL, 'US', 'NY', 'NY', 'NY', '208901', NULL, '2026-09-28 13:07:29', '2026-09-28 13:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_status_logs`
--

CREATE TABLE `user_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `old_status` varchar(255) DEFAULT NULL,
  `new_status` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `performed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_status_logs`
--

INSERT INTO `user_status_logs` (`id`, `user_id`, `old_status`, `new_status`, `action`, `performed_by`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 2, 'pending', 'active', 'approved', 1, 'Buyer approved by admin.', '2026-08-21 14:49:37', '2026-08-21 14:49:37'),
(2, 3, 'pending', 'active', 'approved', 1, 'Seller approved by admin after document verification.', '2026-08-25 08:54:13', '2026-08-25 08:54:13'),
(3, 4, 'pending', 'rejected', 'rejected', 1, 'Fake', '2026-09-24 09:26:44', '2026-09-24 09:26:44'),
(4, 7, 'pending', 'active', 'approved', 1, 'Seller approved by admin after account/document review.', '2026-09-28 13:00:42', '2026-09-28 13:00:42'),
(5, 8, 'pending', 'active', 'approved', 1, 'Seller approved by admin after account/document review.', '2026-09-28 13:03:52', '2026-09-28 13:03:52'),
(6, 9, 'pending', 'active', 'approved', 1, 'Buyer approved by admin after account/document review.', '2026-09-28 13:06:06', '2026-09-28 13:06:06'),
(7, 10, 'pending', 'active', 'approved', 1, 'Buyer approved by admin after account/document review.', '2026-09-28 13:07:58', '2026-09-28 13:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `wanted_board_requests`
--

CREATE TABLE `wanted_board_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `legacy_auction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `request_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `currency` char(3) NOT NULL DEFAULT 'USD',
  `target_price` decimal(15,2) DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `condition_grade` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `specifications` longtext DEFAULT NULL,
  `terms` longtext DEFAULT NULL,
  `approval_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `status` enum('draft','open','fulfilled','closed','cancelled') NOT NULL DEFAULT 'draft',
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint(20) UNSIGNED DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `legacy_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wanted_board_requests`
--

INSERT INTO `wanted_board_requests` (`id`, `legacy_auction_id`, `request_number`, `title`, `slug`, `category_id`, `category_name`, `buyer_id`, `created_by`, `currency`, `target_price`, `quantity`, `condition_grade`, `location`, `required_by`, `featured_image`, `description`, `specifications`, `terms`, `approval_status`, `status`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `rejection_reason`, `is_featured`, `legacy_payload`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'WTB-202609-PXMNH', 'Dell PowerEdge R740 Server', 'dell-poweredge-r740-server', 3, 'Laptops & Workstations', 2, 2, 'USD', 5.00, 100, 'Grade A', 'Dallas, TX, USA', '2026-10-23', NULL, 'Looking for reliable Dell rack servers for virtualization and enterprise workloads.       ', 'Dell PowerEdge R740, 2× Intel Xeon Silver 4214, 128GB DDR4 RAM, RAID controller, dual PSU, 8×2.5\" bays, tested and fully functional.', 'Please provide unit price, bulk discount, warranty period, lead time, and shipping cost. Seller must provide actual product photos and serial numbers before purchase.', 'approved', 'open', 1, '2026-09-23 14:19:38', NULL, NULL, NULL, 0, NULL, '2026-09-23 14:09:05', '2026-09-23 14:19:38', NULL),
(2, NULL, 'WTB-202609-QGK9E', 'Cisco Catalyst 9300 Switches', 'cisco-catalyst-9300-switches', 6, 'Circuit Scrap & Materials', 2, 2, 'USD', 1200.00, 100, 'Grade B', 'Chicago, IL, USA', '2026-11-15', NULL, 'Required enterprise-grade managed network switches for office and data-center connectivity.', 'Cisco Catalyst 9300, 48× Gigabit Ethernet ports, PoE+, Layer 3 support, stackable, original accessories and power cables required.', 'Quote should include unit price, delivery timeline, warranty, shipping, and available quantity. Preference for suppliers with enterprise networking experience.', 'rejected', 'draft', NULL, NULL, 1, '2026-09-23 14:19:24', 'Price to high', 0, NULL, '2026-09-23 14:11:54', '2026-09-23 14:19:24', NULL),
(3, NULL, 'WTB-202609-OB47S', 'Enterprise SSD Storage Drive', 'enterprise-ssd-storage-drive', 5, 'Components & Memory', 2, 2, 'USD', 180.00, 50, 'Grade A', 'Austin, TX, USA', '2026-10-23', NULL, 'Looking for enterprise SSDs for expanding existing server storage infrastructure.', '1.92TB Enterprise SATA SSD, 2.5-inch, mixed-use/endurance grade, compatible with Dell/HP enterprise servers, minimum 3 DWPD', 'Please quote for 50 units with bulk pricing. Include warranty, health/life percentage if refurbished, delivery time, and return/replacement terms.', 'approved', 'fulfilled', 1, '2026-09-23 14:14:38', NULL, NULL, NULL, 0, NULL, '2026-09-23 14:14:07', '2026-09-23 14:26:55', NULL),
(4, NULL, 'WTB-202609-BWAQD', 'Test', 'test', 6, 'Circuit Scrap & Materials', 2, 2, 'USD', 15.00, 100, 'Grade B', NULL, '2026-10-24', NULL, 'Test Test Test Test Test Test Test Test Test ', NULL, NULL, 'pending', 'draft', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2026-09-24 07:07:51', '2026-09-24 07:07:51', NULL),
(5, NULL, 'WTB-202609-RTCVZ', 'Test1:22Am', 'test122am', 6, 'Circuit Scrap & Materials', 2, 2, 'USD', 15.00, 100, 'Grade B', NULL, '2026-10-29', NULL, 'TestTestTestTestTestTestTestTestTestTest', NULL, NULL, 'approved', 'open', 1, '2026-09-29 14:22:43', NULL, NULL, NULL, 0, NULL, '2026-09-29 14:22:29', '2026-09-29 14:22:43', NULL),
(6, NULL, 'WTB-202609-4CJSS', 'Test1:25Buyer1', 'test125buyer1', 6, 'Circuit Scrap & Materials', 9, 9, 'USD', 15.00, 100, 'Grade B', NULL, '2026-10-29', NULL, 'TestTestTestTestTestTestTestTest', NULL, NULL, 'approved', 'open', 1, '2026-09-29 14:26:04', NULL, NULL, NULL, 0, NULL, '2026-09-29 14:25:49', '2026-09-29 14:26:04', NULL),
(7, NULL, 'WTB-202610-I0NXN', 'Bulk Procurement of RAM Modules and Enterprise SSDs', 'bulk-procurement-of-ram-modules-and-enterprise-ssds', 5, 'Components & Memory', 2, 2, 'USD', 45.00, 200, 'Grade A', 'New Delhi, India', '2026-11-18', NULL, 'We require 200 enterprise-grade memory and storage components for server upgrades and IT infrastructure expansion. Suppliers should provide genuine products with verified specifications and manufacturer warranty.', '100 × 16 GB DDR4 ECC RAM modules\n100 × 1 TB enterprise SATA SSDs\nNew, unused components\nCompatible with enterprise server platforms', 'Quote price per unit in USD. Include shipping, applicable taxes, delivery timeline, stock availability, and warranty details.', 'approved', 'open', 1, '2026-10-19 07:25:56', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:19:59', '2026-10-19 07:25:56', NULL),
(8, NULL, 'WTB-202610-3OL7I', 'Procurement of Enterprise Managed Network Switches', 'procurement-of-enterprise-managed-network-switches', 2, 'Enterprise Networking', 2, 2, 'USD', 800.00, 25, 'Grade A', 'Gurugram, Haryana', '2026-11-25', NULL, 'We are seeking enterprise managed network switches for our corporate network expansion. Products must be suitable for continuous business operations and support centralized network management.', '48 Gigabit Ethernet ports\n10G SFP+ uplink support\nVLAN and Layer 3 routing support\nRack-mountable form factor\nNew equipment with manufacturer warranty', 'Provide per-unit pricing, brand and model numbers, warranty period, delivery charges, lead time, and technical datasheets. Equivalent products may be proposed with full specifications.', 'approved', 'open', 1, '2026-10-19 07:25:51', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:21:54', '2026-10-19 07:25:51', NULL),
(9, NULL, 'WTB-202610-GZJKL', 'Supply of Enterprise Rack Servers for Data Center Expansion', 'supply-of-enterprise-rack-servers-for-data-center-expansion', 1, 'Servers & Blade Infrastructure', 2, 2, 'USD', 4500.00, 10, 'Grade B', 'Noida, Uttar Pradesh', '2026-11-16', NULL, 'We require enterprise rack servers to support virtualization, application hosting, and database workloads. Suppliers must provide reliable hardware with enterprise-level support and compatible components.', 'Dual-socket server platform\nMinimum 256 GB RAM\nEnterprise SSD storage\nRedundant power supplies\nHardware RAID and remote management\nMinimum 3-year manufacturer warranty', 'Include per-unit pricing, server configuration, brand and model, delivery and installation charges, support terms, and expected delivery date. Provide a detailed technical quotation.', 'approved', 'open', 1, '2026-10-19 07:25:46', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:23:25', '2026-10-19 07:25:46', NULL),
(10, NULL, 'WTB-202610-4HITT', 'Copper-Bearing PCB Scrap for Metal Recovery', 'copper-bearing-pcb-scrap-for-metal-recovery', 6, 'Circuit Scrap & Materials', 10, 10, 'USD', 4.50, 800, 'Grade B', 'Jaipur, Rajasthan', '2026-11-18', NULL, 'We require copper-bearing printed circuit board scrap from electronic equipment for authorized recycling and material recovery. Suppliers must provide sorted material with consistent quality and accurate weight records.', 'Mixed PCB scrap from computers and networking equipment.\nFree from batteries, liquids, and unrelated waste.\nProperly segregated and securely packaged.\nMaterial composition details required.', 'Quote price per kilogram in USD. Include transportation, packaging, loading charges, material origin, and estimated delivery date.', 'approved', 'open', 1, '2026-10-19 07:49:20', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:43:43', '2026-10-19 07:49:20', NULL),
(11, NULL, 'WTB-202610-BCR6B', 'DDR5 Server Memory Procurement', 'ddr5-server-memory-procurement', 5, 'Components & Memory', 10, 10, 'USD', 180.00, 120, 'Grade A', 'Bengaluru, Karnataka', '2026-10-29', NULL, 'We are seeking high-quality DDR5 server memory modules for upgrading enterprise compute infrastructure. All components must be genuine, unused, and compatible with supported server platforms.', '64 GB DDR5 ECC RDIMM modules.\nMinimum 4800 MT/s memory speed.\nCompatible with enterprise server hardware.\nManufacturer part number and datasheet required.', 'Provide per-module pricing, brand, model, stock availability, warranty, shipping charges, and delivery lead time. Counterfeit or refurbished products are not acceptable.', 'approved', 'open', 1, '2026-10-19 07:49:16', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:45:37', '2026-10-19 07:49:16', NULL),
(12, NULL, 'WTB-202610-BPKB7', 'Enterprise Firewall Appliance Supply', 'enterprise-firewall-appliance-supply', 2, 'Enterprise Networking', 10, 10, 'USD', 2200.00, 8, 'Grade A', 'Hyderabad, Telangana', '2026-11-20', NULL, 'Procurement of next-generation firewall appliances to strengthen network security across corporate offices. Devices should provide centralized administration, threat prevention, and secure VPN connectivity.', 'Minimum 2 Gbps firewall throughput.\nIPS, application control, and VPN support.\nGigabit Ethernet interfaces.\nCentralized management capability.\nValid manufacturer support and security updates.', 'Include hardware price, subscription and licensing costs, support duration, installation charges, warranty, and delivery timeline. Clearly separate recurring license costs from one-time costs.', 'approved', 'open', 1, '2026-10-19 07:49:12', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:47:58', '2026-10-19 07:49:12', NULL),
(13, NULL, 'WTB-202610-LHHEL', 'High-Performance Engineering Workstations', 'high-performance-engineering-workstations', 3, 'Laptops & Workstations', 9, 9, 'USD', 1800.00, 20, 'Grade A', NULL, '2026-11-24', NULL, 'We require high-performance desktop workstations for CAD, 3D modelling, engineering simulations, and technical design workloads. Suppliers should offer business-grade equipment with reliable after-sales support.', 'Intel Core i7 or equivalent processor.\n32 GB RAM, expandable.\n1 TB NVMe SSD.\nDedicated graphics card with 8 GB VRAM or higher.\nWindows 11 Pro and a 3-year warranty.', 'Quote per workstation with complete configuration, graphics card model, operating system licensing, delivery, warranty, and optional installation charges.', 'approved', 'open', 1, '2026-10-19 09:06:42', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:50:52', '2026-10-19 09:06:42', NULL),
(14, NULL, 'WTB-202610-MJPKJ', 'Enterprise NAS Storage Expansion', 'enterprise-nas-storage-expansion', 4, 'SAN / NAS Storage Arrays', 9, 9, 'USD', 8500.00, 1, 'Grade A', 'Mumbai, Maharashtra', '2026-11-30', NULL, 'Procurement of enterprise NAS storage systems for centralized file storage, backup, and business continuity. Systems must support secure access, data redundancy, and expansion as storage requirements grow.', 'Minimum 12 drive bays per system.\nMinimum 80 TB raw capacity per system.\nRAID support and redundant network connectivity.\n10 GbE networking.\nSnapshot, replication, and backup support.', 'Specify whether drives are included, usable versus raw capacity, storage software licensing, warranty, installation, migration assistance, and ongoing support costs.', 'approved', 'open', 1, '2026-10-19 09:06:38', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:54:07', '2026-10-19 09:06:38', NULL),
(15, NULL, 'WTB-202610-1S8AS', 'GPU-Enabled AI Compute Servers', 'gpu-enabled-ai-compute-servers', 1, 'Servers & Blade Infrastructure', 9, 9, 'USD', 12000.00, 4, 'Grade A', 'Chennai, Tamil Nadu', '2026-12-15', NULL, 'We are looking for GPU-enabled rack servers for AI development, machine learning experimentation, and accelerated computing. Systems must provide reliable thermal management, sufficient power delivery, and compatibility with commonly used AI frameworks.', 'Dual-socket capable enterprise server platform.\nMinimum 256 GB ECC RAM.\nOne supported GPU with at least 24 GB VRAM.\nNVMe SSD storage with RAID capability.\nRedundant power supplies and remote management.\nMinimum 3-year hardware warranty.', 'Provide the complete hardware configuration, exact GPU model, power requirements, AI software compatibility, warranty coverage, shipping, installation, and delivery lead time. State any optional software licensing costs separately.', 'approved', 'open', 1, '2026-10-19 09:06:34', NULL, NULL, NULL, 0, NULL, '2026-10-19 07:55:30', '2026-10-19 09:06:34', NULL),
(16, NULL, 'WTB-202611-T2K4L', 'WTB: 200x Intel Xeon Platinum 8280 / 8280L Processors (Cascade Lake Socket 3647)', 'wtb-200x-intel-xeon-platinum-8280-g30m', 1, 'Servers & Blade Infrastructure', 2, 2, 'USD', 38000.00, 200, 'Used - Clean Tested', 'Worldwide (Supplier to quote FOB or DDP)', '2026-12-07', NULL, 'Immediate requirement for 200x Intel Xeon Platinum 8280 processors (28 Cores / 56 Threads, 2.70 GHz base, 38.5MB Cache). Matching stepping preferred. Tested working without bent pins or substrate damage.', 'Model: Intel Xeon Platinum 8280\nsSpec: SRF9P or SRF9Q\nSocket: FCLGA3647\nTDP: 205W', 'Wire transfer, Escrow, or Letter of Credit. Fast settlement upon delivery verification.', 'approved', 'open', 1, '2026-11-17 08:43:42', NULL, NULL, NULL, 1, NULL, '2026-11-17 08:43:42', '2026-11-17 08:43:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wishlistable_type` varchar(255) NOT NULL,
  `wishlistable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `wishlistable_type`, `wishlistable_id`, `created_at`, `updated_at`) VALUES
(4, 2, 'App\\Models\\Auction', 24, '2026-09-11 08:52:34', '2026-09-11 08:52:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auctions_lot_number_unique` (`lot_number`),
  ADD UNIQUE KEY `auctions_slug_unique` (`slug`),
  ADD KEY `auctions_category_id_foreign` (`category_id`),
  ADD KEY `auctions_seller_id_foreign` (`seller_id`),
  ADD KEY `auctions_created_by_foreign` (`created_by`),
  ADD KEY `auctions_status_start_date_end_date_index` (`status`,`start_date`,`end_date`),
  ADD KEY `auctions_auction_type_index` (`auction_type`),
  ADD KEY `auctions_buyer_id_foreign` (`buyer_id`),
  ADD KEY `auctions_approved_by_foreign` (`approved_by`),
  ADD KEY `auctions_rejected_by_foreign` (`rejected_by`),
  ADD KEY `auctions_module_type_index` (`module_type`);

--
-- Indexes for table `auction_bids`
--
ALTER TABLE `auction_bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auction_bids_auction_id_amount_index` (`auction_id`,`amount`),
  ADD KEY `auction_bids_buyer_id_created_at_index` (`buyer_id`,`created_at`);

--
-- Indexes for table `auction_buy_now_purchases`
--
ALTER TABLE `auction_buy_now_purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auction_buy_now_purchases_auction_id_unique` (`auction_id`),
  ADD KEY `auction_buy_now_purchases_buyer_id_foreign` (`buyer_id`);

--
-- Indexes for table `auction_categories`
--
ALTER TABLE `auction_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auction_categories_slug_unique` (`slug`);

--
-- Indexes for table `auction_images`
--
ALTER TABLE `auction_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auction_images_auction_id_path_unique` (`auction_id`,`path`),
  ADD KEY `auction_images_auction_id_is_featured_sort_order_index` (`auction_id`,`is_featured`,`sort_order`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_author_id_foreign` (`author_id`),
  ADD KEY `blogs_status_published_at_index` (`status`,`published_at`),
  ADD KEY `blogs_slug_index` (`slug`);

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
-- Indexes for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_inquiries_status_index` (`status`),
  ADD KEY `contact_inquiries_created_at_index` (`created_at`);

--
-- Indexes for table `corporate_tradings`
--
ALTER TABLE `corporate_tradings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `corporate_tradings_lot_number_unique` (`lot_number`),
  ADD UNIQUE KEY `corporate_tradings_slug_unique` (`slug`),
  ADD KEY `corporate_tradings_category_id_foreign` (`category_id`),
  ADD KEY `corporate_tradings_seller_id_foreign` (`seller_id`),
  ADD KEY `corporate_tradings_buyer_id_foreign` (`buyer_id`),
  ADD KEY `corporate_tradings_created_by_foreign` (`created_by`),
  ADD KEY `corporate_tradings_approved_by_foreign` (`approved_by`),
  ADD KEY `corporate_tradings_rejected_by_foreign` (`rejected_by`),
  ADD KEY `corporate_tradings_status_start_date_end_date_index` (`status`,`start_date`,`end_date`),
  ADD KEY `corporate_tradings_module_type_index` (`module_type`),
  ADD KEY `corporate_tradings_auction_type_index` (`auction_type`),
  ADD KEY `corporate_tradings_status_index` (`status`);

--
-- Indexes for table `corporate_trading_buy_now_purchases`
--
ALTER TABLE `corporate_trading_buy_now_purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `corporate_trading_buy_now_purchases_corporate_trading_id_unique` (`corporate_trading_id`),
  ADD KEY `corporate_trading_buy_now_purchases_buyer_id_foreign` (`buyer_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_clearances`
--
ALTER TABLE `dm_clearances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dm_clearances_seller_id_foreign` (`seller_id`),
  ADD KEY `dm_clearances_granted_by_foreign` (`granted_by`),
  ADD KEY `dm_clearances_buyer_id_seller_id_status_index` (`buyer_id`,`seller_id`,`status`);

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
  ADD KEY `faqs_status_sort_order_index` (`status`,`sort_order`),
  ADD KEY `faqs_category_index` (`category`);

--
-- Indexes for table `fraud_alerts`
--
ALTER TABLE `fraud_alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fraud_alerts_user_id_foreign` (`user_id`),
  ADD KEY `fraud_alerts_status_severity_index` (`status`,`severity`);

--
-- Indexes for table `intrusion_logs`
--
ALTER TABLE `intrusion_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intrusion_logs_type_severity_index` (`type`,`severity`);

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
-- Indexes for table `reverse_auctions`
--
ALTER TABLE `reverse_auctions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reverse_auctions_reference_number_unique` (`reference_number`),
  ADD UNIQUE KEY `reverse_auctions_slug_unique` (`slug`),
  ADD UNIQUE KEY `reverse_auctions_legacy_auction_id_unique` (`legacy_auction_id`),
  ADD KEY `reverse_auctions_category_id_foreign` (`category_id`),
  ADD KEY `reverse_auctions_created_by_foreign` (`created_by`),
  ADD KEY `reverse_auctions_approved_by_foreign` (`approved_by`),
  ADD KEY `reverse_auctions_rejected_by_foreign` (`rejected_by`),
  ADD KEY `reverse_auctions_approval_status_status_index` (`approval_status`,`status`),
  ADD KEY `reverse_auctions_start_date_end_date_index` (`start_date`,`end_date`),
  ADD KEY `reverse_auctions_buyer_id_created_at_index` (`buyer_id`,`created_at`);

--
-- Indexes for table `reverse_auction_bids`
--
ALTER TABLE `reverse_auction_bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reverse_bids_auction_amount_index` (`reverse_auction_id`,`amount_per_unit`),
  ADD KEY `reverse_bids_seller_created_index` (`seller_id`,`created_at`);

--
-- Indexes for table `rfq_messages`
--
ALTER TABLE `rfq_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rfq_messages_user_id_foreign` (`user_id`),
  ADD KEY `rfq_messages_rfq_request_id_created_at_index` (`rfq_request_id`,`created_at`);

--
-- Indexes for table `rfq_requests`
--
ALTER TABLE `rfq_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rfq_requests_rfq_number_unique` (`rfq_number`),
  ADD KEY `rfq_requests_approved_by_foreign` (`approved_by`),
  ADD KEY `rfq_requests_buyer_id_status_index` (`buyer_id`,`status`),
  ADD KEY `rfq_requests_seller_id_status_index` (`seller_id`,`status`),
  ADD KEY `rfq_requests_status_index` (`status`),
  ADD KEY `rfq_requests_module_index` (`module`),
  ADD KEY `rfq_requests_reverse_auction_id_foreign` (`reverse_auction_id`),
  ADD KEY `rfq_requests_rejected_by_foreign` (`rejected_by`),
  ADD KEY `rfq_requests_wanted_board_id_foreign` (`wanted_board_id`),
  ADD KEY `rfq_requests_corporate_trading_id_foreign` (`corporate_trading_id`),
  ADD KEY `rfq_requests_suspended_by_foreign` (`suspended_by`);

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
-- Indexes for table `security_audit_logs`
--
ALTER TABLE `security_audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `security_audit_logs_audit_code_unique` (`audit_code`),
  ADD KEY `security_audit_logs_user_id_foreign` (`user_id`),
  ADD KEY `security_audit_logs_action_type_created_at_index` (`action_type`,`created_at`),
  ADD KEY `security_audit_logs_actor_uid_index` (`actor_uid`);

--
-- Indexes for table `security_settings`
--
ALTER TABLE `security_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_number_unique` (`ticket_number`),
  ADD KEY `tickets_resolved_by_foreign` (`resolved_by`),
  ADD KEY `tickets_user_id_status_index` (`user_id`,`status`),
  ADD KEY `tickets_user_type_status_index` (`user_type`,`status`),
  ADD KEY `tickets_ticket_number_index` (`ticket_number`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replies_user_id_foreign` (`user_id`),
  ADD KEY `ticket_replies_ticket_id_index` (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_manager_id_foreign` (`manager_id`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_approved_by_foreign` (`approved_by`),
  ADD KEY `users_rejected_by_foreign` (`rejected_by`),
  ADD KEY `users_suspended_by_foreign` (`suspended_by`),
  ADD KEY `users_account_type_index` (`account_type`),
  ADD KEY `users_status_index` (`status`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_documents_user_id_foreign` (`user_id`),
  ADD KEY `user_documents_verified_by_foreign` (`verified_by`),
  ADD KEY `user_documents_document_type_index` (`document_type`),
  ADD KEY `user_documents_status_index` (`status`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_profiles_user_id_unique` (`user_id`);

--
-- Indexes for table `user_status_logs`
--
ALTER TABLE `user_status_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_status_logs_user_id_foreign` (`user_id`),
  ADD KEY `user_status_logs_performed_by_foreign` (`performed_by`),
  ADD KEY `user_status_logs_new_status_index` (`new_status`),
  ADD KEY `user_status_logs_action_index` (`action`);

--
-- Indexes for table `wanted_board_requests`
--
ALTER TABLE `wanted_board_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wanted_board_requests_request_number_unique` (`request_number`),
  ADD UNIQUE KEY `wanted_board_requests_slug_unique` (`slug`),
  ADD UNIQUE KEY `wanted_board_requests_legacy_auction_id_unique` (`legacy_auction_id`),
  ADD KEY `wanted_board_requests_category_id_foreign` (`category_id`),
  ADD KEY `wanted_board_requests_created_by_foreign` (`created_by`),
  ADD KEY `wanted_board_requests_approved_by_foreign` (`approved_by`),
  ADD KEY `wanted_board_requests_rejected_by_foreign` (`rejected_by`),
  ADD KEY `wanted_board_requests_approval_status_status_index` (`approval_status`,`status`),
  ADD KEY `wanted_board_requests_buyer_id_created_at_index` (`buyer_id`,`created_at`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_wishlist_unique` (`user_id`,`wishlistable_type`,`wishlistable_id`),
  ADD KEY `wishlists_wishlistable_type_wishlistable_id_index` (`wishlistable_type`,`wishlistable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `auction_bids`
--
ALTER TABLE `auction_bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `auction_buy_now_purchases`
--
ALTER TABLE `auction_buy_now_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auction_categories`
--
ALTER TABLE `auction_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `auction_images`
--
ALTER TABLE `auction_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `corporate_tradings`
--
ALTER TABLE `corporate_tradings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `corporate_trading_buy_now_purchases`
--
ALTER TABLE `corporate_trading_buy_now_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `dm_clearances`
--
ALTER TABLE `dm_clearances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fraud_alerts`
--
ALTER TABLE `fraud_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `intrusion_logs`
--
ALTER TABLE `intrusion_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reverse_auctions`
--
ALTER TABLE `reverse_auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reverse_auction_bids`
--
ALTER TABLE `reverse_auction_bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rfq_messages`
--
ALTER TABLE `rfq_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `rfq_requests`
--
ALTER TABLE `rfq_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `security_audit_logs`
--
ALTER TABLE `security_audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `security_settings`
--
ALTER TABLE `security_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_status_logs`
--
ALTER TABLE `user_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wanted_board_requests`
--
ALTER TABLE `wanted_board_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `auctions_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `auctions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `auction_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `auctions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `auctions_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `auctions_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `auction_bids`
--
ALTER TABLE `auction_bids`
  ADD CONSTRAINT `auction_bids_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auction_bids_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auction_buy_now_purchases`
--
ALTER TABLE `auction_buy_now_purchases`
  ADD CONSTRAINT `auction_buy_now_purchases_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auction_buy_now_purchases_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auction_images`
--
ALTER TABLE `auction_images`
  ADD CONSTRAINT `auction_images_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `corporate_tradings`
--
ALTER TABLE `corporate_tradings`
  ADD CONSTRAINT `corporate_tradings_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `corporate_tradings_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `corporate_tradings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `auction_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `corporate_tradings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `corporate_tradings_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `corporate_tradings_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `corporate_trading_buy_now_purchases`
--
ALTER TABLE `corporate_trading_buy_now_purchases`
  ADD CONSTRAINT `corporate_trading_buy_now_purchases_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `corporate_trading_buy_now_purchases_corporate_trading_id_foreign` FOREIGN KEY (`corporate_trading_id`) REFERENCES `corporate_tradings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dm_clearances`
--
ALTER TABLE `dm_clearances`
  ADD CONSTRAINT `dm_clearances_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dm_clearances_granted_by_foreign` FOREIGN KEY (`granted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `dm_clearances_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fraud_alerts`
--
ALTER TABLE `fraud_alerts`
  ADD CONSTRAINT `fraud_alerts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `reverse_auctions`
--
ALTER TABLE `reverse_auctions`
  ADD CONSTRAINT `reverse_auctions_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reverse_auctions_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reverse_auctions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `auction_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reverse_auctions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reverse_auctions_legacy_auction_id_foreign` FOREIGN KEY (`legacy_auction_id`) REFERENCES `auctions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reverse_auctions_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reverse_auction_bids`
--
ALTER TABLE `reverse_auction_bids`
  ADD CONSTRAINT `reverse_auction_bids_reverse_auction_id_foreign` FOREIGN KEY (`reverse_auction_id`) REFERENCES `reverse_auctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reverse_auction_bids_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rfq_messages`
--
ALTER TABLE `rfq_messages`
  ADD CONSTRAINT `rfq_messages_rfq_request_id_foreign` FOREIGN KEY (`rfq_request_id`) REFERENCES `rfq_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rfq_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rfq_requests`
--
ALTER TABLE `rfq_requests`
  ADD CONSTRAINT `rfq_requests_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rfq_requests_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rfq_requests_corporate_trading_id_foreign` FOREIGN KEY (`corporate_trading_id`) REFERENCES `corporate_tradings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rfq_requests_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rfq_requests_reverse_auction_id_foreign` FOREIGN KEY (`reverse_auction_id`) REFERENCES `reverse_auctions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rfq_requests_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rfq_requests_suspended_by_foreign` FOREIGN KEY (`suspended_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rfq_requests_wanted_board_id_foreign` FOREIGN KEY (`wanted_board_id`) REFERENCES `wanted_board_requests` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `security_audit_logs`
--
ALTER TABLE `security_audit_logs`
  ADD CONSTRAINT `security_audit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_resolved_by_foreign` FOREIGN KEY (`resolved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD CONSTRAINT `ticket_replies_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_suspended_by_foreign` FOREIGN KEY (`suspended_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD CONSTRAINT `user_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_documents_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_status_logs`
--
ALTER TABLE `user_status_logs`
  ADD CONSTRAINT `user_status_logs_performed_by_foreign` FOREIGN KEY (`performed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_status_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wanted_board_requests`
--
ALTER TABLE `wanted_board_requests`
  ADD CONSTRAINT `wanted_board_requests_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wanted_board_requests_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wanted_board_requests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `auction_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wanted_board_requests_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wanted_board_requests_legacy_auction_id_foreign` FOREIGN KEY (`legacy_auction_id`) REFERENCES `auctions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wanted_board_requests_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
