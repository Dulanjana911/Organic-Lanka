-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 06:25 AM
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
-- Database: `grocerry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$rmBnmFdpbtw4DatgAogaf.uAJp.EYQs8koJ.I7ThwspQw7SVYo3ce');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_orders`
--

CREATE TABLE `assigned_orders` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_type`
--

CREATE TABLE `business_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_type`
--

INSERT INTO `business_type` (`id`, `type`) VALUES
(1, 'wholesaler');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `total` float DEFAULT 0,
  `is_applied` tinyint(1) DEFAULT 0,
  `promo` float DEFAULT 0,
  `is_add_w` tinyint(1) DEFAULT 0,
  `wl_amt` float DEFAULT 0,
  `final_amt` float DEFAULT 0,
  `ship_fee` tinyint(1) DEFAULT 0,
  `belonging_city` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `u_id`, `total`, `is_applied`, `promo`, `is_add_w`, `wl_amt`, `final_amt`, `ship_fee`, `belonging_city`) VALUES
(1, 3, 4641, 0, 0, 0, 0, 4641, 0, 0),
(2, 5, 810.28, 0, 0, 0, 0, 810.28, 0, 0),
(3, 6, 4641, 0, 0, 0, 0, 4641, 0, 0),
(4, 7, 1547, 0, 0, 0, 0, 1547, 0, 0),
(5, 8, 202, 0, 0, 0, 0, 452, 127, 0),
(6, 9, 2100, 0, 0, 0, 0, 2100, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `p_id`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(3, 1, 1, 1),
(4, 2, 1, 1),
(5, 3, 1, 1),
(6, 3, 1, 2),
(7, 4, 1, 1),
(8, 2, 4, 1),
(9, 5, 4, 1),
(11, 2, 8, 1),
(15, 6, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`) VALUES
(1, 'Vegetables', 1),
(2, 'Grains', 1),
(3, 'Herbs', 1),
(4, 'Spices', 1),
(5, 'Beverages', 1),
(6, 'Fruits', 1),
(7, 'Nuts', 1),
(8, 'Crops', 1),
(9, 'Processed Foods', 1),
(10, 'Eggs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `s_id`, `c_id`, `city_name`) VALUES
(1, 1, 1, 'Kandy'),
(2, 1, 1, 'Nuwara Eliya'),
(3, 1, 1, 'Matale'),
(4, 1, 1, 'Gampola'),
(5, 1, 1, 'Hatton'),
(6, 1, 1, 'Kegalle'),
(7, 1, 1, 'Dambulla'),
(8, 2, 1, 'Batticaloa'),
(9, 2, 1, 'Trincomalee'),
(10, 2, 1, 'Ampara'),
(11, 2, 1, 'Kalmunai'),
(12, 2, 1, 'Kattankudy'),
(13, 2, 1, 'Valaichchenai'),
(14, 2, 1, 'Eravur'),
(15, 2, 1, 'Chenkalady'),
(16, 2, 1, 'Sammanthurai'),
(17, 2, 1, 'Akkaraipattu'),
(18, 2, 1, 'Vavunathivu'),
(19, 2, 1, 'Kalkudah'),
(20, 2, 1, 'Pottuvil'),
(21, 2, 1, 'Valvettithurai'),
(22, 3, 1, 'Anuradhapura'),
(23, 3, 1, 'Mihintale'),
(24, 3, 1, 'Medawachchiya'),
(25, 3, 1, 'Kekirawa'),
(26, 3, 1, 'Talawa'),
(27, 3, 1, 'Nochchiyagama'),
(28, 3, 1, 'Galenbindunuwewa'),
(29, 3, 1, 'Eppawala'),
(30, 3, 1, 'Thambuttegama'),
(31, 3, 1, 'Horowpathana'),
(32, 3, 1, 'Rajanganaya'),
(33, 3, 1, 'Kahatagasdigiliya'),
(34, 3, 1, 'Polonnaruwa'),
(35, 3, 1, 'Hingurakgoda'),
(36, 3, 1, 'Kaduruwela'),
(37, 3, 1, 'Medirigiriya'),
(38, 3, 1, 'Manampitiya'),
(39, 3, 1, 'Lankapura'),
(40, 3, 1, 'Elahera'),
(41, 4, 1, 'Jaffna'),
(42, 4, 1, 'Kilinochchi'),
(43, 4, 1, 'Mannar'),
(44, 4, 1, 'Vavuniya'),
(45, 4, 1, 'Point Pedro'),
(46, 4, 1, 'Chavakachcheri'),
(47, 4, 1, 'Mullaitivu'),
(48, 4, 1, 'Poonakary'),
(49, 4, 1, 'Kayts'),
(50, 4, 1, 'Mankulam'),
(51, 4, 1, 'Vadamarachchi'),
(52, 4, 1, 'Nallur'),
(53, 9, 1, 'Hanwella'),
(54, 9, 1, 'Delgoda');

-- --------------------------------------------------------

--
-- Table structure for table `cnfrm_delivery`
--

CREATE TABLE `cnfrm_delivery` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cnfrm_undelivery`
--

CREATE TABLE `cnfrm_undelivery` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `com` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compensation_claims`
--

CREATE TABLE `compensation_claims` (
  `claim_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `crop_damage_description` text NOT NULL,
  `damage_date` datetime NOT NULL,
  `estimated_extent_of_damage` varchar(255) NOT NULL,
  `evidence_files` varchar(500) DEFAULT NULL,
  `relevant_records` text DEFAULT NULL,
  `cause_of_damage` text NOT NULL,
  `estimated_financial_losses` decimal(10,2) NOT NULL,
  `crop_type` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compensation_claims`
--

INSERT INTO `compensation_claims` (`claim_id`, `name`, `email`, `phone_number`, `address`, `id_number`, `crop_damage_description`, `damage_date`, `estimated_extent_of_damage`, `evidence_files`, `relevant_records`, `cause_of_damage`, `estimated_financial_losses`, `crop_type`, `submitted_at`) VALUES
(10, 'Dulanjana Kavishan', 'dulanjana.kavishan572@gmail.com', '0726358366', '550,daranagama delgoda', '200110703188', 'Compensation claims for coconut fields involve legal actions taken by coconut farmers or landowners seeking financial restitution for damages incurred to their coconut crops or land. These claims may arise from factors such as natural disasters, pest infestations, or industrial activities that result in reduced yields or destruction of coconut trees. The process typically involves the claimant presenting evidence of the damages suffered and seeking compensation for lost income, rehabilitation costs, and other related expenses. Compensation claims for coconut fields aim to provide support and relief to those whose livelihoods depend on the health and productivity of their coconut plantations.', '2024-05-11 14:42:00', 'More', 'uploads/Coco.jpg', 'Compensation claims for coconut fields involve legal actions taken by coconut farmers or landowners seeking financial restitution for damages incurred to their coconut crops or land. These claims may arise from factors such as natural disasters, pest infestations, or industrial activities that result in reduced yields or destruction of coconut trees. The process typically involves the claimant presenting evidence of the damages suffered and seeking compensation for lost income, rehabilitation costs, and other related expenses. Compensation claims for coconut fields aim to provide support and relief to those whose livelihoods depend on the health and productivity of their coconut plantations.', 'Compensation claims for coconut fields involve legal actions taken by coconut farmers or landowners seeking financial restitution for damages incurred to their coconut crops or land. These claims may arise from factors such as natural disasters, pest infestations, or industrial activities that result in reduced yields or destruction of coconut trees. The process typically involves the claimant presenting evidence of the damages suffered and seeking compensation for lost income, rehabilitation costs, and other related expenses. Compensation claims for coconut fields aim to provide support and relief to those whose livelihoods depend on the health and productivity of their coconut plantations.', -8.00, 'coconut', '2024-05-11 18:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `cntry_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `cntry_name`) VALUES
(1, 'Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `dc`
--

CREATE TABLE `dc` (
  `id` int(11) NOT NULL,
  `dc` float NOT NULL,
  `pc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dc`
--

INSERT INTO `dc` (`id`, `dc`, `pc`) VALUES
(1, 500, 250);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `dv_name` varchar(255) NOT NULL,
  `dv_username` varchar(255) NOT NULL,
  `dv_password` text NOT NULL,
  `dv_email` varchar(255) NOT NULL,
  `dv_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dv_time`
--

CREATE TABLE `dv_time` (
  `id` int(11) NOT NULL,
  `from` varchar(100) NOT NULL,
  `tto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dv_time`
--

INSERT INTO `dv_time` (`id`, `from`, `tto`) VALUES
(1, '10:43', '18:43');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer_application`
--

CREATE TABLE `fertilizer_application` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `identification_number` varchar(50) DEFAULT NULL,
  `farm_size` decimal(10,2) DEFAULT NULL,
  `crop_type` varchar(255) DEFAULT NULL,
  `fertilizer_quantity` decimal(10,2) DEFAULT NULL,
  `crop_intended` varchar(255) DEFAULT NULL,
  `crop_stage` enum('Planting','Growing','Harvesting') DEFAULT NULL,
  `yield_expectations` decimal(10,2) DEFAULT NULL,
  `additional_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fertilizer_application`
--

INSERT INTO `fertilizer_application` (`id`, `name`, `phone`, `email`, `address`, `identification_number`, `farm_size`, `crop_type`, `fertilizer_quantity`, `crop_intended`, `crop_stage`, `yield_expectations`, `additional_info`) VALUES
(3, 'Dulanjana Kavishan', '0726358366', 'dulanjana.kavishan572@gmail.com', '550,daranagama delgoda', '200110703188', 50.00, 'Coconut', 5.00, 'Coconut', 'Growing', 2.00, 'Eppawela Rock Phosphate (ERP) and Triple Supper Phosphate (TSP) '),
(4, 'Dulanjana Kavishan', '0726358366', 'dulanjana.kavishan572@gmail.com', '550,daranagama delgoda', '200110703188', 50.00, 'Coconut', 25.00, 'Coconut', 'Planting', 25.00, 'Eppawela Rock Phosphate (ERP) and Triple Supper Phosphate (TSP) ');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer_reports`
--

CREATE TABLE `fertilizer_reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `identification_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nature_of_problem` varchar(255) NOT NULL,
  `extent_of_damage` varchar(255) NOT NULL,
  `date_of_occurrence` datetime NOT NULL,
  `type_of_fertilizer` varchar(255) NOT NULL,
  `brand_manufacturer` varchar(255) NOT NULL,
  `crops_affected` varchar(255) NOT NULL,
  `crop_stage` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `visual_documentation` varchar(255) DEFAULT NULL,
  `supporting_documents` varchar(255) DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `problem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fertilizer_reports`
--

INSERT INTO `fertilizer_reports` (`id`, `name`, `contact`, `identification_number`, `address`, `nature_of_problem`, `extent_of_damage`, `date_of_occurrence`, `type_of_fertilizer`, `brand_manufacturer`, `crops_affected`, `crop_stage`, `description`, `visual_documentation`, `supporting_documents`, `additional_notes`, `created_at`, `problem`) VALUES
(2147483647, 'Dulanjana Kavishan', '0726358366', '200110703188', '550,daranagama delgoda', 'Not good quality', 'no', '2024-05-10 23:39:00', 'Nitrogen fertilizers', 'no', 'oats', 'Growing', 'Abcd', 'Fertilizer.jpeg', 'blank.pdf', 'Need quick response', '2024-05-11 18:09:12', 'Not good quality');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `filter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `isue`
--

CREATE TABLE `isue` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monitoringdata`
--

CREATE TABLE `monitoringdata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `identification_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `encounter_datetime` datetime NOT NULL,
  `media_path` varchar(255) NOT NULL,
  `crops_affected` varchar(255) NOT NULL,
  `crop_stage` varchar(50) NOT NULL,
  `estimated_damage_or_impact` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_posts`
--

CREATE TABLE `news_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_posts`
--

INSERT INTO `news_posts` (`id`, `title`, `featured_image`, `content`, `tags`, `publish_date`) VALUES
(2, 'Unilever Sri Lanka and Ministry of Agriculture and Plantation Industries sign MoU on sustainable tea production', 'News 1.jpg', 'The Ministry of Agriculture and Plantation Industries and Unilever Sri Lanka recently entered into a Memorandum of Understanding (MoU) to develop the country’s first national and globally accepted standard for sustainable tea production. \r\n\r\nThis first-of-its-kind initiative signifies a shared commitment to propel the Sri Lankan tea industry towards a more sustainable and ethical future.  \r\n\r\nThe MoU signing ceremony was graced by Minister of Agriculture and Plantation Industries Mahinda Amaraweera, Ministry of Agriculture and Plantation Industries Secretary B.L.A.J. Dharmakeerthi, the Chairman and representatives of Sri Lanka Tea Board, and other tea industry dignitaries. \r\n\r\nUnilever Sri Lanka’s ‘Ceytea’ factory is the largest supplier of black tea extract to the Global Pepsi-Lipton JV and its world-famous Iced Tea brands ‘Lipton’ and ‘Brisk’. The manufacturing site in Agarapathana has been at the centre stage of innovation and sustainability in value-added tea. \r\n\r\nUnilever Sri Lanka Supply Chain Director Damith Abeyratne said, “Unilever Ceytea factory in Agarapathana is the largest supplier of black tea extract to the Global Pepsi-Lipton JV. This collaboration with the Ministry of Agriculture and Plantation Industries is a significant step forward in our efforts to drive sustainable sourcing of agricultural raw materials under the Unilever Climate Action Transition Plan. The initiative positively benefits ‘Ceylon Tea’ because today’s global demand is for sustainably farmed agricultural produce.”\r\n\r\nFurther commenting on this partnership, Ministry of Agriculture and Plantation Industries Secretary B.L.A.J. Dharmakeerthi stated, “The Ministry of Agriculture and Plantation Industries is delighted to join forces with Unilever Sri Lanka in this public-private partnership. This MoU represents a crucial step towards strengthening the Ceylon Tea industry’s global competitiveness. By implementing these comprehensive measures, we aim to solidify Sri Lanka’s reputation as a global leader in ethical and sustainable tea production.” \r\n\r\nSri Lanka is among the top five tea exporters globally. This standard will address three key areas: minimising environmental impact through regenerative and deforestation-free agriculture, ensuring fair and respectful treatment for all tea industry workers through ethical workplace practices, and guaranteeing the safety and quality of Sri Lankan tea through rigorous testing and monitoring procedures.\r\n\r\n', 'Ministry of Agriculture, Tea production, Mahinda Amaraweera', '2024-05-10 05:16:58'),
(5, 'True value of Ceylon Cinnamon', 'News 2.jpg', 'Everything needs to have a reason, framed in its purpose. Without reason and purpose, life and everything that is part of living decays into meaninglessness. Mark Twain brilliantly explained, “The two most important days in life are the day you were born and the day you find out why.” That truth applies as much to life as to business. There was a time – when it was thought private enterprise – businesses pursuing their own interests – would contribute to a better outcome for society as a whole. It was thought that individuals in pursuit of profit would inadvertently contribute to the economic well-being of society as a whole.\r\n\r\nIt didn’t work out like that. Two brilliant academics on two different sides of the Atlantic Ocean, explained that Adam Smith’s ‘invisible hand’ and Friedman’s notion of prosperity through growth, had no relevance in reality. Canadian Law Professor Joel Bakan and British Professor of Economics Mariana Mazzucato corrected that misconception, reframing theory with consideration of a natural part of the human condition that their predecessors had failed to see; greed, which – left unchecked – only fuels the crises of inequality, climate, health and conflict that are part of our lives today.\r\n\r\nThat is important context to the story of Ceylon Cinnamon...\r\n\r\nCeylon Cinnamon has no equal; a spice with provenance that other herbs, spices and gourmet ingredients can only fantasise about, its recorded history begins in 2800BC. Cinnamon is mentioned in the Holy Bible. In ancient Roman times our Cinnamon was a prized and alluring luxury, as valuable as gold, silver and precious gemstones. Ancient Egyptians and Greeks were no different in their appreciation of Cinnamon from Taprobane (now Sri Lanka), and considered the spice so precious that it was equal in value to gold and ivory, offered to pharoahs and gods. \r\n\r\nKing Solomon, at the time (970-931 BC) considered richer and wiser than any other ruler, counted cinnamon amongst his treasures and regularly dispatched his fleet to Tarshish (present day Galle, Sri Lanka) for fresh supplies. Cinnamon was treasured for its fragrance, loved for its taste, prized for its rarity and desired for its mystery. The allure of Ceylon Cinnamon triggered great oceanic expeditions, wars, conquests and fuelled a global trade in the precious spice.\r\n\r\nMuch has changed since then, not in the qualities of Ceylon Cinnamon, but in the manner in which Cinnamon is traded. Cinnamon has become a victim of its own success, diminished in the hands of global spice traders and brands motivated solely by profit and the pursuit of market dominance, but diminished also by the compliance of the Cinnamon industry in Sri Lanka.\r\n\r\nAs Mazzucato explains, price does not equate to value, and while Cinnamon is a spice that attracts a high price relative to other spices, true value – value creation – is very different to value extraction. It is the difference between sustainable growth – an industry with a foundation – and extraction – industry that lacks resilience, and is vulnerable to the multitude of climate, social and other crises that we encounter with alarming regularity today.', 'Ceylon Cinnamon', '2024-05-10 05:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `ofd`
--

CREATE TABLE `ofd` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `o_id` text NOT NULL,
  `u_id` int(11) NOT NULL,
  `ad_id` int(11) DEFAULT 0,
  `dv_date` varchar(255) DEFAULT '',
  `dv_time` varchar(255) DEFAULT '',
  `payment_type` int(11) DEFAULT 0,
  `payment_status` int(11) DEFAULT 0,
  `order_status` int(11) DEFAULT 0,
  `mihpayid` varchar(255) DEFAULT '',
  `txnid` varchar(255) DEFAULT '',
  `payu_status` varchar(255) DEFAULT '',
  `total_amt` float DEFAULT 0,
  `ship_fee_order` float DEFAULT 0,
  `final_val` float DEFAULT 0,
  `isnew` int(11) DEFAULT 0,
  `delivered_by` int(11) DEFAULT 0,
  `u_cnfrm` int(11) DEFAULT 0,
  `ptu` int(11) DEFAULT 0,
  `udvc` int(11) DEFAULT 0,
  `is_p_app` int(11) DEFAULT 0,
  `is_w_ap` int(11) DEFAULT 0,
  `prmo` float DEFAULT 0,
  `wlmt` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `o_id`, `u_id`, `ad_id`, `dv_date`, `dv_time`, `payment_type`, `payment_status`, `order_status`, `mihpayid`, `txnid`, `payu_status`, `total_amt`, `ship_fee_order`, `final_val`, `isnew`, `delivered_by`, `u_cnfrm`, `ptu`, `udvc`, `is_p_app`, `is_w_ap`, `prmo`, `wlmt`) VALUES
(1, 'ODX561714404765', 8, 8, '1', 'Today', 2, 0, 1, '', '20efbc19e04f2372abe6', '', 202, 127, 452, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'ODX231714405083', 8, 8, '1', 'Tomorrow', 2, 0, 1, '', 'e498b4f25a08ac9b4dd9', '', 202, 127, 452, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `hover` int(11) DEFAULT 0,
  `rcvd` int(11) DEFAULT 0,
  `delivered_qty` int(100) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `oid`, `p_id`, `qty`, `hover`, `rcvd`, `delivered_qty`) VALUES
(1, 1, 4, 1, 0, 0, 0),
(2, 2, 4, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `o_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `o_status`) VALUES
(1, 'Placing'),
(2, 'Placed'),
(3, 'Assigned'),
(4, 'Out for delivery'),
(5, 'Delivered'),
(6, 'Undelivered'),
(7, 'Issue');

-- --------------------------------------------------------

--
-- Table structure for table `order_stlmnt`
--

CREATE TABLE `order_stlmnt` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `val` float DEFAULT 0,
  `sc` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_time`
--

CREATE TABLE `order_time` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `o_status` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pestanddiseasemonitoring`
--

CREATE TABLE `pestanddiseasemonitoring` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_time` datetime NOT NULL,
  `media` text NOT NULL,
  `crops` varchar(255) NOT NULL,
  `crop_stage` varchar(20) NOT NULL,
  `estimated_damage` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pestanddiseasemonitoring`
--

INSERT INTO `pestanddiseasemonitoring` (`id`, `name`, `contact`, `id_number`, `address`, `description`, `date_time`, `media`, `crops`, `crop_stage`, `estimated_damage`, `notes`) VALUES
(6, 'Dulanjana Kavishan', 'dulanjana.kavishan572@gmail.com', '200110703188', '550,daranagama delgoda', 'Pest and disease damage refers to the harm inflicted on plants, crops, or ecosystems by various organisms such as insects, fungi, bacteria, viruses, or other pathogens. These harmful agents can cause a wide range of detrimental effects, including reduced crop yields, deterioration of plant health, and even complete loss of vegetation in severe cases. Pest and disease damage often result in economic losses for farmers, disruption of food supply chains, and ecological imbalances. Effective management strategies such as pest control measures, disease-resistant crop varieties, and integrated pest management (IPM) practices are crucial for mitigating the impacts of pest and disease damage on agricultural and natural systems.', '2024-05-11 23:49:00', 'uploads/pest and diseses.jpeg', ' oats', 'planting', 'More', 'Pest and disease damage refers to the harm inflicted on plants, crops, or ecosystems by various organisms such as insects, fungi, bacteria, viruses, or other pathogens. These harmful agents can cause a wide range of detrimental effects, including reduced crop yields, deterioration of plant health, and even complete loss of vegetation in severe cases. Pest and disease damage often result in economic losses for farmers, disruption of food supply chains, and ecological imbalances. Effective management strategies such as pest control measures, disease-resistant crop varieties, and integrated pest management (IPM) practices are crucial for mitigating the impacts of pest and disease damage on agricultural and natural systems.');

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cn_id` int(11) NOT NULL,
  `pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`id`, `c_id`, `s_id`, `cn_id`, `pincode`) VALUES
(1, 41, 4, 1, '40000'),
(2, 53, 9, 1, '10650'),
(3, 54, 9, 1, '11700');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sell_price` float NOT NULL,
  `fa` float NOT NULL,
  `shrt_desc` text NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `disclaimer` text NOT NULL,
  `isappp` int(11) NOT NULL,
  `isnew` tinyint(1) NOT NULL,
  `bs` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_by` int(11) NOT NULL,
  `belonging_city` int(11) NOT NULL,
  `tax` float NOT NULL,
  `sku` varchar(255) NOT NULL,
  `isapp` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `scat_id`, `product_name`, `img1`, `img2`, `img3`, `img4`, `price`, `sell_price`, `fa`, `shrt_desc`, `description`, `qty`, `disclaimer`, `isappp`, `isnew`, `bs`, `status`, `added_by`, `belonging_city`, `tax`, `sku`, `isapp`) VALUES
(2, 10, 0, 'Local Eggs', '3094270301714992014.jpg', '2146655551713768063.jpg', '2598136161713768063.jpg', '9140369511713768063.jpg', 60, 54, 54, 'Not Select', 'Introducing Sri Lankan Eggs – a culinary treasure cherished for their freshness, flavor, and nutritional value, straight from the fertile lands of Sri Lanka. Sourced from local farms where chickens roam freely and are cared for with respect, Sri Lankan Eggs are a symbol of wholesome goodness and quality.\n\nGrown in the pristine environment of Sri Lanka\'s countryside, these eggs reflect the natural abundance and purity of the island. The chickens are allowed to graze on nutrient-rich vegetation, supplemented with a balanced diet, ensuring that each egg is packed with essential vitamins, minerals, and protein.\n\nSri Lankan Eggs are renowned for their superior taste and freshness. Each egg is carefully selected and inspected to meet stringent quality standards, guaranteeing that only the best make it to your table. With their firm whites and vibrant yolks, these eggs add richness and depth of flavor to a variety of dishes, from hearty breakfasts to decadent desserts.\n\nNot only are Sri Lankan Eggs delicious, but they\'re also a nutritious choice for any diet. Rich in protein, vitamins, and healthy fats, they provide a wholesome source of energy and essential nutrients to fuel your day.\n\nSourced from responsible and sustainable farms, Sri Lankan Eggs uphold the highest standards of animal welfare and environmental stewardship. By choosing Sri Lankan Eggs, you\'re not just enjoying a superior product – you\'re supporting local farmers and sustainable agriculture practices.\n\nExperience the taste of tradition and the goodness of nature with Sri Lankan Eggs – a culinary essential that brings the flavors of Sri Lanka to your kitchen with every crack.', 1, 'Apply', 0, 0, 0, 1, 3, 41, 0, 'P12PS87N', 1),
(3, 4, 0, 'Chilli powder', '4763687991714993103.jpg', '3171373521713883436.jpg', '8360539041713883436.jpeg', '7416470291713883436.jpg', 320, 300, 300, 'G', 'Introducing Sri Lankan Chilli Powder – a fiery spice that ignites the taste buds with the bold flavors of the island\'s vibrant culinary heritage. Crafted from premium-quality dried red chilies sourced from the fertile fields of Sri Lanka, this spice blend captures the essence of authentic Sri Lankan cuisine.\n\nSri Lankan Chilli Powder is renowned for its rich color, intense heat, and complex flavor profile. Made from a carefully selected blend of sun-dried red chilies, each with its own unique heat level and aroma, this spice adds depth and dimension to a wide range of dishes.\n\nWhether used as a seasoning for curries, marinades, or sambols (spicy condiments), Sri Lankan Chilli Powder imparts a bold and distinctive flavor that is sure to tantalize the taste buds. From mild to extra hot varieties, there\'s a chili powder to suit every palate preference, allowing you to customize the heat level of your favorite dishes.\n\nBeyond its fiery flavor, Sri Lankan Chilli Powder also offers a host of health benefits. Rich in capsaicin, the compound responsible for the chili\'s heat, it has been shown to boost metabolism, aid digestion, and even have anti-inflammatory properties when consumed in moderation.\n\nSourced from sustainable farms and processed with the utmost care and attention to quality and purity, Sri Lankan Chilli Powder is a testament to the island\'s commitment to excellence in spice production. Each batch is carefully ground and packaged to preserve its freshness and potency, ensuring that you get the full flavor experience with every pinch.\n\nElevate your culinary creations with the bold and authentic flavors of Sri Lankan Chilli Powder – a spice blend that brings the heat and the heart of Sri Lanka to your kitchen.', 250, 'Apply', 0, 0, 0, 1, 3, 41, 0, 'S37IC17D', 1),
(4, 6, 0, 'Avocados', '6130174291714293744.jpg', '5586382911714293744.jpg', '5035683631714293744.jpg', '7302013911714293744.jpg', 230, 200, 202, 'G', 'Introducing Sri Lankan Avocados – a creamy indulgence harvested from the verdant orchards of Sri Lanka\'s tropical paradise. Renowned for their rich, buttery texture and exquisite flavor, Sri Lankan Avocados offer a taste of luxury straight from the heart of the island.\n\nGrown in the fertile soils and sun-drenched climate of Sri Lanka, these avocados flourish under optimal conditions, resulting in fruit of exceptional quality and taste. Each avocado is carefully handpicked at the peak of ripeness, ensuring a creamy texture and vibrant flavor that delights the palate with every spoonful.\n\nSri Lankan Avocados are prized for their versatility and nutritional value. Packed with heart-healthy monounsaturated fats, fiber, vitamins, and minerals, including potassium and vitamin E, they offer a delicious way to nourish your body and indulge your senses.\n\nWhether enjoyed mashed on toast, blended into creamy smoothies, or sliced into salads and sushi rolls, Sri Lankan Avocados elevate any dish with their velvety texture and rich flavor. Their natural creaminess makes them a favorite ingredient in both savory and sweet recipes, adding depth and decadence to every bite.\n\nGrown using sustainable farming practices and harvested with care, Sri Lankan Avocados are a testament to the island\'s commitment to quality and environmental stewardship. From orchard to table, each avocado undergoes rigorous quality checks to ensure freshness and flavor, so you can enjoy the pure taste of tropical luxury with every bite.\n\nExperience the indulgent taste of Sri Lanka with Sri Lankan Avocados – a creamy delicacy that transports you to the sun-kissed shores of the tropics with every luxurious mouthful.', 500, 'Apply', 0, 0, 0, 1, 3, 41, 1, 'C67TA57T', 1),
(5, 6, 0, 'Papaya', '2218386761714536249.png', '9587776921714536249.jpg', '2318462831714536249.jpeg', '6821150161714536249.jpg', 250, 220, 220, 'KG', 'Introducing Sri Lankan Papaya – a tropical treasure bursting with sweetness and vibrant flavor, harvested from the sun-drenched orchards of Sri Lanka\'s lush landscapes. Renowned for its luscious texture and heavenly aroma, Sri Lankan Papaya is a true delight for the senses.\n\nGrown in the fertile soils and warm climate of Sri Lanka, these papayas thrive under the nurturing embrace of nature. Each fruit is handpicked at the peak of ripeness, ensuring a perfect balance of sweetness and tanginess that tantalizes the taste buds with every bite.\n\nSri Lankan Papaya is prized for its succulent flesh, which ranges from golden yellow to orange, depending on the variety. Rich in vitamins, minerals, and antioxidants, including vitamin C and beta-carotene, this tropical fruit not only delights the palate but also nourishes the body from within.\n\nWhether enjoyed fresh on its own, blended into smoothies, or incorporated into salads and desserts, Sri Lankan Papaya adds a burst of tropical flavor and nutritional goodness to any dish. Its versatility in the kitchen makes it a favorite ingredient among chefs and home cooks alike, offering endless possibilities for culinary creativity.\n\nSri Lankan Papaya is grown using sustainable farming practices, with a focus on quality and environmental responsibility. From orchard to table, each fruit undergoes stringent quality checks to ensure freshness and flavor, so you can enjoy the pure taste of paradise with every bite.\n\nExperience the exotic taste of Sri Lanka with Sri Lankan Papaya – a delicious and nutritious addition to your daily diet that transports you to the sun-kissed shores of the tropics with every mouthwatering bite.', 1, 'Apply', 0, 0, 0, 1, 3, 41, 0, 'V16TF47G', 1),
(6, 1, 0, 'carrot', '8106568541714914731.jpg', '7727447741714914731.jpeg', '4553443321714914731.jpg', '4713915931714914731.jpg', 170, 135, 135, 'G', 'Introducing Sri Lankan Carrots – vibrant, crisp, and bursting with flavor, these vegetables embody the essence of freshness and quality straight from the island\'s fertile soil. Grown in the lush, tropical climate of Sri Lanka, these carrots are cultivated with care and expertise to deliver a superior culinary experience.\n\nSri Lankan Carrots are known for their exceptional taste and texture. Their vibrant orange hue indicates their rich concentration of beta-carotene, a powerful antioxidant that promotes eye health and overall wellness. Each carrot is handpicked at the peak of ripeness, ensuring optimal sweetness and crunchiness in every bite.\n\nWhat sets Sri Lankan Carrots apart is not just their color and taste but also their versatility in the kitchen. Whether raw, roasted, steamed, or grated into salads, these carrots add a burst of flavor and nutritional value to any dish. Their natural sweetness makes them a favorite ingredient in both savory and sweet recipes, from hearty stews to decadent carrot cakes.\n\nSri Lankan Carrots are grown using sustainable farming practices, with a focus on soil health and environmental stewardship. From farm to table, each carrot undergoes rigorous quality checks to ensure freshness and purity, giving you the confidence that you\'re enjoying the best nature has to offer.\n\nAdd a touch of tropical flair to your meals with Sri Lankan Carrots – a wholesome and delicious addition to any culinary creation. Whether enjoyed as a snack, a side dish, or a main course ingredient, these carrots bring the authentic taste of Sri Lanka to your plate, one crunchy bite at a time.', 250, 'Apply', 0, 0, 0, 1, 3, 41, 0, 'V93UC74M', 1),
(7, 6, 0, 'Grapes', '8903885871714989416.jpg', '5855870871714989066.jpg', '5132822161714989066.jpg', '3217742591714989066.jpg', 700, 700, 700, 'G', 'Introducing Sri Lankan Grapes – a luscious delight that embodies the unique flavors of the island\'s fertile soil and tropical climate. Grown in select regions across Sri Lanka, these grapes boast a distinctive taste and texture that set them apart from their counterparts.\n\nSri Lankan grapes are cultivated with meticulous care, nurtured under the warm sun and gentle rains that characterize the island\'s diverse landscapes. The result is a grape variety that is bursting with flavor, offering a perfect balance of sweetness and juiciness with every bite.\n\nRenowned for their vibrant colors and plumpness, Sri Lankan grapes come in an array of varieties, each with its own flavor profile and characteristics. From the crisp and refreshing Thompson Seedless to the rich and intense Red Globe, there\'s a grape to suit every palate preference.\n\nWhat sets Sri Lankan grapes apart is not just their taste but also their quality. Grown using sustainable farming practices and harvested at the peak of ripeness, these grapes are carefully inspected to ensure that only the finest specimens make it to your table.\n\nWhether enjoyed as a healthy snack on its own, added to fruit salads, or paired with cheese and nuts for a gourmet treat, Sri Lankan grapes elevate any culinary experience. Packed with antioxidants, vitamins, and minerals, they not only tantalize your taste buds but also nourish your body from within.\n\nExperience the exotic flavors of Sri Lanka with every succulent bite of Sri Lankan grapes – a true taste of paradise in every bunch.', 300, 'Apply', 0, 0, 0, 1, 3, 41, 10, 'Y59JT35Q', 1),
(8, 5, 0, 'king coconut drink', '3427963091714991184.jpg', '6879096881714991184.jpg', '2563322601714991184.jpg', '1549086771714991184.jpg', 550, 548, 608.28, 'Unit', 'Sri Lankan King Coconut Drink offers a refreshing and exotic taste that captures the essence of tropical paradise. Sourced from the sweet, golden-orange King Coconut, native to the island of Sri Lanka, this beverage is a delightful blend of hydration and natural sweetness.\n\nThe King Coconut, known locally as \"Thambili,\" is revered for its distinct flavor and nutritional properties. Its water is naturally sweet, with a hint of nuttiness, and is packed with electrolytes, making it a perfect thirst-quencher in the warm Sri Lankan climate.\n\nTo create Sri Lankan King Coconut Drink, the young, green coconuts are carefully harvested, and their tops are expertly sliced open to access the refreshing water inside. The water is then bottled or packaged for immediate consumption, capturing its freshness and purity.\n\nThis beverage is enjoyed chilled, offering a cool respite from the heat of the day. Its naturally sweet taste makes it a favorite among both locals and visitors alike, providing a healthier alternative to sugary sodas and artificially flavored drinks.\n\nSri Lankan King Coconut Drink not only satisfies thirst but also replenishes the body with essential nutrients, including potassium, magnesium, and vitamins. Whether sipped on a leisurely beach day or enjoyed as a revitalizing pick-me-up, this tropical elixir transports you to the sun-kissed shores of Sri Lanka with every sip.', 1, 'Apply', 0, 0, 0, 1, 4, 54, 10, 'E14RB77O', 1),
(9, 2, 0, 'Dal', '1342118501715132910.jpeg', '9289525841715132850.jpg', '6743567141715132773.jpg', '9845071881715132821.jpg', 200, 200, 224, 'G', 'Sri Lankan Dal is a delicious and nutritious lentil dish that holds a special place in Sri Lankan cuisine. Made from various types of lentils such as red lentils (masoor dal), pigeon peas (toor dal), or split mung beans (mung dal), it is a versatile and flavorful dish enjoyed by many.\n\nThe preparation of Sri Lankan Dal typically involves cooking the lentils with a blend of aromatic spices such as curry leaves, mustard seeds, cumin seeds, turmeric, garlic, and onions. Coconut milk is often added to enhance the creaminess and richness of the dish, giving it a distinct Sri Lankan flavor profile.\n\nThe consistency of Sri Lankan Dal can vary from thick and hearty to more soupy, depending on personal preference and regional variations. It is commonly served as a main dish accompanied by rice or roti (flatbread) and a variety of vegetable curries or sambols (spicy condiments).\n\nNot only is Sri Lankan Dal satisfying and flavorful, but it also provides a good source of plant-based protein, fiber, and essential nutrients, making it a popular choice for vegetarians and vegans. Its comforting taste and nutritional benefits make it a beloved staple in Sri Lankan households and a must-try for anyone looking to explore the diverse flavors of South Asian cuisine.', 500, 'Apply', 0, 0, 0, 1, 4, 54, 3, 'U45NL18P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_ad_on`
--

CREATE TABLE `product_ad_on` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_ad_on`
--

INSERT INTO `product_ad_on` (`id`, `pid`, `added_on`) VALUES
(1, 1, '2024-03-19 07:29:51'),
(2, 2, '2024-04-22 06:41:02'),
(3, 3, '2024-04-23 14:43:56'),
(4, 4, '2024-04-28 08:42:23'),
(5, 5, '2024-05-01 04:04:08'),
(6, 6, '2024-05-05 13:12:11'),
(7, 7, '2024-05-06 09:51:06'),
(8, 8, '2024-05-06 10:26:23'),
(9, 9, '2024-05-08 01:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `code` varchar(60) NOT NULL,
  `dis` float NOT NULL,
  `minbal` float NOT NULL,
  `scat` int(11) NOT NULL,
  `adb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_filter`
--

CREATE TABLE `p_filter` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_reject`
--

CREATE TABLE `p_reject` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cause` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_sfilter`
--

CREATE TABLE `p_sfilter` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sfid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection`
--

CREATE TABLE `rejection` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT '',
  `password` text NOT NULL,
  `mobile` varchar(50) DEFAULT '',
  `f_name` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `tob` int(11) DEFAULT 0,
  `country` int(11) DEFAULT 0,
  `state` int(11) DEFAULT 0,
  `city` int(11) DEFAULT 0,
  `pin` int(11) DEFAULT 0,
  `b_name` varchar(255) DEFAULT '',
  `b_crft` varchar(255) DEFAULT '',
  `is_gst` tinyint(1) DEFAULT 0,
  `gst_id` varchar(255) DEFAULT '',
  `gst_crft` varchar(255) DEFAULT '',
  `acc_num` varchar(255) DEFAULT '',
  `acc_holder` varchar(255) DEFAULT '',
  `ifsc` varchar(255) DEFAULT '',
  `bank` varchar(255) DEFAULT '',
  `branch` varchar(255) DEFAULT '',
  `isapp` int(11) DEFAULT 0,
  `is_new` tinyint(1) NOT NULL,
  `is_cp` tinyint(1) DEFAULT 0,
  `adhar` varchar(255) DEFAULT '',
  `pan` varchar(255) DEFAULT '',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `email`, `password`, `mobile`, `f_name`, `address`, `tob`, `country`, `state`, `city`, `pin`, `b_name`, `b_crft`, `is_gst`, `gst_id`, `gst_crft`, `acc_num`, `acc_holder`, `ifsc`, `bank`, `branch`, `isapp`, `is_new`, `is_cp`, `adhar`, `pan`, `status`) VALUES
(2, 'dlgalpaya@gmail.com', '$2y$10$smDXvOAUzjCxbT1UANKetuvtvfkDCRyE3oTBKCq20Mn37lAY/uYbK', '0786266558', 'dinuka sadaruwan', '07640392010', 1, 1, 4, 41, 1, 'ds studio', '3734800321707978132.png', 2, 'No GST', '0', '001930193049', 'deelaka', '2039203', 'BOC', 'hanwella', 1, 0, 1, '3594598871707978132.png', '8396640561707978132.png', 1),
(3, 'deelaka.lakpura94@gmail.com', '$2y$10$a1qNERtWYuLI5.Qc5Q0E6uluUkWAbsWInmBWdFYf45M9ztPVvZIie', '0769433403', 'deelaka galpaya', 'jaffna', 1, 1, 4, 41, 1, 'Deelaka', '7886322461710833252.PNG', 2, 'No GST', '0', '4302392320232', 'deelaka', '292392', 'BOC', 'JAFFNA', 1, 0, 1, '6128915881710833252.PNG', '9287473821710833252.PNG', 1),
(4, 'dulanjana.kavishan572@gmail.com', '$2y$10$LaQxSGLEtL3HcsJCWFLmSeDMIIYOMQlw7Q04xZj7.WntwIlmDo6MS', '0726358366', 'Dulanjana Kavishan', '550,daranagama delgoda', 1, 1, 9, 54, 3, 'Ceylon products', '1601382571714990367.png', 1, '101010', '3809011271714990367.png', '200101703188', 'dulanjana kavishan', '203239', 'Sampath Bank', 'Delgoda', 1, 0, 1, '9983141171714990367.jpeg', '5551641681714990367.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller_wallet`
--

CREATE TABLE `seller_wallet` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `ballance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_wallet`
--

INSERT INTO `seller_wallet` (`id`, `seller_id`, `ballance`) VALUES
(1, 2, 0),
(2, 3, 0),
(3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller_w_msg`
--

CREATE TABLE `seller_w_msg` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cod` tinyint(1) NOT NULL,
  `msg` text NOT NULL,
  `balance` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_new` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_w_msg`
--

INSERT INTO `seller_w_msg` (`id`, `s_id`, `cod`, `msg`, `balance`, `added_on`, `is_new`) VALUES
(1, 2, 1, 'Wallet created', 0, '2024-02-15 06:22:47', 1),
(2, 3, 1, 'Wallet created', 0, '2024-03-19 07:28:40', 1),
(3, 4, 1, 'Wallet created', 0, '2024-05-06 10:13:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `c_id`, `state_name`) VALUES
(1, 1, 'Central Province'),
(2, 1, 'Eastern Province'),
(3, 1, 'North Central Province'),
(4, 1, 'Northern Province'),
(5, 1, 'North Western Province'),
(6, 1, 'Sabaragamuwa Province'),
(7, 1, 'Southern Province'),
(8, 1, 'Uva Province'),
(9, 1, 'Western Province');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_filter`
--

CREATE TABLE `sub_filter` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `subfilter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT '',
  `password` text DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `m_vfd` tinyint(1) DEFAULT 0,
  `e_vfd` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `mobile`, `name`, `m_vfd`, `e_vfd`, `status`) VALUES
(1, 'deelaka@gmail.com', '$2y$10$DVBPL70Iy8tyrMk3MOGAv.7r9YYgxYFm5Duf7uEoRWUZXHi0dSdpy', '752056898', 'Deelaka Lakpura', 0, 0, 1),
(2, 'deelaka21@gmail.com', '$2y$10$PgMAnEXkBGiyLDimGL.ynuSb8CNcWidcAuJ68CJFsVsbxwuV7vl/K', '752056898', 'Deelaka Lakpura', 0, 0, 1),
(3, 'admin@gmail.com', '$2y$10$4LLKD5hy4QbFYuewX6DZmO5J4McInaf0nbbJUAFGxvloj5nendVcG', '0769433403', 'dilshi', 0, 0, 1),
(4, 'deelaka2001@gmail.com', '$2y$10$ELhoK06Jnj00aIXvE/cS3uutRK2Kx/8t7gA/MyTpPVDMcEnTE.wQa', '0752056898', 'Deelaka Lakpura', 0, 0, 1),
(5, 'deelaka.lakpura94@gmail.com', '$2y$10$rkSanPzCHphWcXt8S35etunMMMdv.PCv6Cahh2KFp.4YGqtSnEcLu', '0752056898', 'Deelaka Lakpura', 0, 1, 1),
(6, 'deelaka.lakpura94@gmail.com', '$2y$10$41Ulb7w.S5wRJy.rbAK81ezGb2Zyir0hj8KWK/Y4.ei3Zown6/s8u', '0752056898', 'Deelaka Lakpura', 0, 1, 1),
(7, 'dinuka2001@gmail.com', '$2y$10$f3o1ShJgajUnsFRZ6UoN4.009XlwlfEp6W3.12STguo46TX.MG2Ia', '0752056898', 'dinuka sadaruwan', 1, 1, 1),
(8, 'mahagamamudalige@gmail.com', '$2y$10$s3dSmE1XSBUPkVFijQGJweW6JY6s..VrxxrhAH7EvsC.gXFet5VOO', '0769433403', 'dilshi', 1, 1, 1),
(9, 'dulanjana.kavishan572@gmail.com', '$2y$10$Ob42e1niIKE7.47IktUfVupkTl1Fjs2il/xcoCslppUMk2qN3IQpS', '0726358366', 'Dulanjana Kavishan', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type_ad` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_city` int(11) NOT NULL,
  `user_add` varchar(255) NOT NULL,
  `user_pin` varchar(255) NOT NULL,
  `user_local` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `uid`, `type_ad`, `user_name`, `user_mobile`, `user_city`, `user_add`, `user_pin`, `user_local`) VALUES
(6, 7, 'on', 'dinuka sadaruwan', '0752056898', 53, 'C7/SF/01 Government housing scheme', '10650', 'Sri Lanka'),
(7, 5, 'on', 'Deelaka Lakpura', '752056898', 53, 'C7/SF/01 Government housing scheme', '10650', 'Sri Lanka'),
(8, 8, 'Home', 'dilshi', '0769433403', 53, 'sf2/20 godagama', '10650', 'Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet`
--

CREATE TABLE `user_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ballance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_wallet`
--

INSERT INTO `user_wallet` (`id`, `user_id`, `ballance`) VALUES
(1, 1, 20000),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_w_msg`
--

CREATE TABLE `user_w_msg` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cod` tinyint(1) NOT NULL,
  `msg` text NOT NULL,
  `balance` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_new` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_w_msg`
--

INSERT INTO `user_w_msg` (`id`, `u_id`, `cod`, `msg`, `balance`, `added_on`, `is_new`) VALUES
(1, 1, 1, 'Wallet created', 0, '2024-02-10 14:29:32', 1),
(2, 2, 1, 'Wallet created', 0, '2024-02-14 08:42:47', 1),
(3, 3, 1, 'Wallet created', 0, '2024-03-19 07:22:49', 1),
(4, 4, 1, 'Wallet created', 0, '2024-03-23 06:05:53', 1),
(5, 5, 1, 'Wallet created', 0, '2024-04-13 04:27:25', 1),
(6, 6, 1, 'Wallet created', 0, '2024-04-13 04:29:16', 1),
(7, 7, 1, 'Wallet created', 0, '2024-04-22 05:54:02', 1),
(8, 8, 1, 'Wallet created', 0, '2024-04-29 15:16:16', 1),
(9, 9, 1, 'Wallet created', 0, '2024-05-09 06:05:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `witdraw_req`
--

CREATE TABLE `witdraw_req` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `amount_w` float NOT NULL,
  `amount_r` float NOT NULL,
  `isnew` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_orders`
--
ALTER TABLE `assigned_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_type`
--
ALTER TABLE `business_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnfrm_delivery`
--
ALTER TABLE `cnfrm_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnfrm_undelivery`
--
ALTER TABLE `cnfrm_undelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compensation_claims`
--
ALTER TABLE `compensation_claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc`
--
ALTER TABLE `dc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dv_time`
--
ALTER TABLE `dv_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fertilizer_application`
--
ALTER TABLE `fertilizer_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fertilizer_reports`
--
ALTER TABLE `fertilizer_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isue`
--
ALTER TABLE `isue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoringdata`
--
ALTER TABLE `monitoringdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_posts`
--
ALTER TABLE `news_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ofd`
--
ALTER TABLE `ofd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_stlmnt`
--
ALTER TABLE `order_stlmnt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_time`
--
ALTER TABLE `order_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pestanddiseasemonitoring`
--
ALTER TABLE `pestanddiseasemonitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ad_on`
--
ALTER TABLE `product_ad_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_filter`
--
ALTER TABLE `p_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_reject`
--
ALTER TABLE `p_reject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_sfilter`
--
ALTER TABLE `p_sfilter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection`
--
ALTER TABLE `rejection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_wallet`
--
ALTER TABLE `seller_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_w_msg`
--
ALTER TABLE `seller_w_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_filter`
--
ALTER TABLE `sub_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_w_msg`
--
ALTER TABLE `user_w_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `witdraw_req`
--
ALTER TABLE `witdraw_req`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_orders`
--
ALTER TABLE `assigned_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_type`
--
ALTER TABLE `business_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cnfrm_delivery`
--
ALTER TABLE `cnfrm_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cnfrm_undelivery`
--
ALTER TABLE `cnfrm_undelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compensation_claims`
--
ALTER TABLE `compensation_claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dc`
--
ALTER TABLE `dc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dv_time`
--
ALTER TABLE `dv_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fertilizer_application`
--
ALTER TABLE `fertilizer_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fertilizer_reports`
--
ALTER TABLE `fertilizer_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isue`
--
ALTER TABLE `isue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoringdata`
--
ALTER TABLE `monitoringdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_posts`
--
ALTER TABLE `news_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ofd`
--
ALTER TABLE `ofd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_stlmnt`
--
ALTER TABLE `order_stlmnt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_time`
--
ALTER TABLE `order_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pestanddiseasemonitoring`
--
ALTER TABLE `pestanddiseasemonitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_ad_on`
--
ALTER TABLE `product_ad_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_filter`
--
ALTER TABLE `p_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_reject`
--
ALTER TABLE `p_reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_sfilter`
--
ALTER TABLE `p_sfilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection`
--
ALTER TABLE `rejection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller_wallet`
--
ALTER TABLE `seller_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller_w_msg`
--
ALTER TABLE `seller_w_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_filter`
--
ALTER TABLE `sub_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_wallet`
--
ALTER TABLE `user_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_w_msg`
--
ALTER TABLE `user_w_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `witdraw_req`
--
ALTER TABLE `witdraw_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
