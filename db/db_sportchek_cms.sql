-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2020 at 02:07 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportchek_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(32) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'running'),
(2, 'basketball'),
(3, 'soccer'),
(4, 'skate'),
(5, 'golf'),
(6, 'sneaker'),
(7, 'sandals');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `prod_id` int(4) NOT NULL AUTO_INCREMENT,
  `prod_number` int(14) NOT NULL,
  `image` varchar(32) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prod_id`, `prod_number`, `image`, `name`, `description`, `price`, `category`) VALUES
(1, 333225140, 'saucony_switchback.jpg', 'Saucony Men’s Switchback ISO Trail Running Shoes', 'For the Saucony Men’s Switchback ISO Trail Running Shoes, Saucony partnered with BOA Technology® to take their dial lacing system and com- bine it with our ISOFIT construction, creating a game-changing fit expe- rience that quickly and easily hugs your foot. The low profile, full-length EVERUN contoured midsole of this trail running shoe gives amazing flexi- bility and energy return while cradling and protecting your foot. The du- al-density PWRTRAC outsole com- bines a firmer center footprint with a softer, tackier perimeter for traction, allowing you to conquer all obstacles in your path.', '$169.99', '1'),
(2, 333224887, 'saucony_fastswitch_9.jpg', 'Saucony Men’s Fastwitch 9 Trail Running Shoes', 'The all new Saucony Men’s Fastwitch 9 Trail Running Shoe is ready to take you from just being a “finisher” to fin- ishing first. The lightweight SSL mid- sole and PWRTRAC outsole will give you great cushion and traction, while the engineered mesh upper provides a breathable fit. It’s time to lace up, push the pace, and win the race in the all new Fastwitch 9.', '$139.99', '1'),
(3, 333150917, 'adidas_ultraboost_running.jpg', 'adidas Men’s Ultra Boost S&L Running Shoes', 'Running style for the sneakerhead. The adidas Men’s Ulta Boost S&L Running Shoes reimagine the adidas Ultraboost with a premium leather up- per. They’re set on a layer of blacked- out Boost, giving you an energised feel on the move.', '$249.99', '1'),
(4, 332994215, 'adidas_ultraboost_white.jpg', 'adidas Men’s Ultraboost 20 Running Shoes', 'A new day. A new run. Make it\r\nyour best. The adidas Men’s Ultra Boost 20 Running Shoes feature a foot-hugging knit upper. Stitched-in reinforcement is precisely placed to give you support in the places you need it most. The soft elastane heel delivers a more comfortable fit. Re- sponsive cushioning returns energy to your stride with every footstrike for that I-could-run-forever feeling.', '$250.00', '1'),
(5, 332970996, 'nike_joyride.jpg', 'Nike Men’s Joyride Dual Run Running Shoes', 'The Nike Joyride Dual Run blazes its own route. Tiny foam beads under- foot combined with traditional cush- ioning in the forefoot give an incredibly smooth feel that conforms to your foot.', '$170.00', '1'),
(6, 333016728, 'under_armour_curry_7.jpg', 'Under Armour Men’s Curry 7 “Chinese New Year” Basketball Shoes', 'The Under Armour Men’s Curry\r\n7 “Chinese New Year” Basketball Shoe’s upper features translucent layering of synthetic leather, mesh & TPU skins for reinforcement in zonal areas for comfort, stability & mobility.', '$159.99', '2'),
(7, 332954165, 'nike_kyrie_flytrap.jpg', 'Nike Men’s Kyrie Flytrap II Basketball Shoes - Black/Chrome', 'Kyrie Irving disrupts defenses with his dizzying array of jab steps, spin moves and ankle-breaking cross- overs. The Nike Men’s Kyrie Flytrap II Basketball Shoes perfectly comple- ments his game, providing maximum control, energy return and all-angle traction.', '$104.99', '2'),
(8, 333068321, 'adidas_harden_stepback.jpg', 'adidas Men’s Harden Stepback Basketball Shoes', 'Nobody stands between you and the hoop. The adidas Men’s Harden Stepback Basketball Shoes are built with a grippy rubber outsole so you can stop on a dime and knock down your jumper as if you were James Harden. The lightweight, breathable feel and wider forefoot mean you can wear them even after you’ve finished hooping.', '$72.94', '2'),
(9, 333068427, 'adidas_dame_6.jpg', 'adidas Men’s Dame 6 Ruthless Basketball Shoes', 'Get on the court and lead by exam- ple, just like Damian Lillard. Thes adi- das Men’s Dame 6 Ruthless Basket- ball Shoe are ultralight, so you can fly up and down the floor. A herringbone outsole provides grip when you slam on the brakes and pull up from a distance. The upper reflects Dame’s quiet leadership on the court and influential personality off of it.', '$159.99', '2'),
(10, 332912833, 'nike_lebron_witness.jpg', 'Nike Men’s Zoom LeBron Witness IV Running Shoes - Black/Red', 'Be a force on the court in the LeBron Witness 4, a great fit for players who want to be locked in around the ankle but still feel light. The sculpted, pad- ded collar and exterior heel counter provide a stable fit, while visible cush- ioning units under the forefoot return energy with every step.', '$134.99', '2'),
(11, 333050576, 'adidas_predator_20.jpg', 'adidas Men’s Predator 20.2 DS Firm Ground Cleats', 'You’re not cheating the system. You’re just bending the rules. Find your unfair advantage and transform your game with all-new adidas Pred- ator. These football boots have a seamless tongue that locks you in. Hundreds of rubber elements grip the ball for extra swerve. Take con- trol in the adidas Predator 20.2 Firm Ground Cleats.', '$159.99', '3'),
(12, 332998290, 'nike_phantom_vision.jpg', 'Nike Unisex Phantom Vision 2 Academy Mid Soccer Cleats', 'The Nike Unisex Phantom Vision 2 Academy Mid-Ground Cleats bring a new level of fierce precision to the pitch. A foot-hugging inner sleeve is concealed in a NIKESKIN upper to create a boot for the finishers, the providers and the battlers of today’s game.', '$104.99', '3'),
(13, 333059980, 'diadora_dominaire.jpg', 'Diadora Men’s Dominaire Firm Ground Cleats - Volt/Black', 'Dominate the field with every stride\r\nin this lightweight, classicly designed boot. Interior heel cushioning along with a low profile shock absorbing insole gives you the best fit comfort to outlast the opponent.', '$74.99', '3'),
(14, 332947855, 'nike_mercurial_superfly_7.jpg', 'Nike Men’s Mercurial Superfly 7 Pro Firm Ground Cleats', 'Building on the 360 innovation of the 6, the Nike Men’s Mercurial Superfly 7 Pro Firm Ground Cleats add a Nike Aerotrak zone that grips the turf to help supercharge the traction.', '$194.99', '3'),
(15, 332947342, 'nike_tiempo_legend_8.jpg', 'Nike Unisex Tiempo Legend 8 Elite Firm Ground Cleats', 'The Nike Unisex Tiempo Legend 8 Elite Firm Ground Cleats take the legendary touch of premium kanga- roo leather and adds foot-hugging Quad-Fit mesh in the lining and a wraparound Flyknit tongue that feels supportive under your arch.', ' $299.99', '3'),
(16, 333004442, 'nike_SB_airmax.jpg', 'Nike Men’s SB Air Max Janoski 2 Skate Shoes', 'The Nike SB Air Max Stefan Janoski 2 hugs your foot with a breathable textile upper. A Max Air unit in the heel cushions every step, while a rubber outsole optimizes grip when you’re on your board.', '$144.99', '4'),
(17, 333004455, 'nike_SB_charge.jpg', 'Nike Men’s SB Charge Suede Skate Shoes', 'Sleek and low, the Nike SB Charge Suede is a skate staple. Its flexible design pairs plush foam with soft suede for comfort right out of the box.', '$87.99', '4'),
(18, 332853825, 'vans_authentic_white.jpg', 'Vans Men’s Authentic Shoes - White', 'The Vans Made For The Makers collection features tough shoes for tough jobs and the creative commu- nities around them. Whether you’re an artist, surfboard shaper, barber,\r\nor tattoo artist, Made For The Mak- ers was built for maximum comfort so you can do what you love all day. Featuring slip-resistant, certified out- soles in addition to vulcanized lugged outsoles, the Made For The Mak- ers Authentic UC also includes 8 oz Vansguard canvas uppers to repel liquids and dirt, and molded drop-in UltraCush sockliners for long-lasting comfort.', '$84.99', '4'),
(19, 332934136, 'nike_sb_charge_mid.pg', 'Nike Men’s SB Charge Mid Canvas Skate Shoes - Black/White', 'Get a lift in the Nike SB Charge Mid Canvas. Its mid-top collar hugs your ankles while you skate, while its flexi- ble design gives you the mobility you need to charge hard.', '$94.99', '4'),
(20, 332853800, 'vans_old_skool.jpg', 'Vans Men’s Old Skool Shoes - Night Sky/Gum', 'The Gum Old Skool, the Vans clas- sic skate shoe and first to bare the iconic sidestripe, is a low top lace-up featuring sturdy canvas and suede uppers, re-enforced toecaps to with- stand repeated wear, padded collars for support and flexibility, gum-colored sidewalls, and signature rubber waffle outsoles.', '$79.99', '4'),
(21, 333046871, 'nike_roshe_golf.jpg', 'Nike Men’s Roshe G Golf Shoes', 'Inspired by a Nike icon, the Nike Ro- she G elevates your look with plush, breathable materials. Its integrated traction pattern means you won’t lose time transitioning from the course to the concrete.', '$110.99', '5'),
(22, 333051453, 'adi_golf.jpg', 'Adi Golf Mens Code Chaos', 'These men’s golf shoes are built with a rubber, spikeless Chaos Trax- ion outsole for exceptional grip and lightweight traction on the links. A responsive Boost midsole with extra cushioning in the sockliner delivers enhanced comfort, while an extend- ed heel and microfiber tongue add stability and structure. RAIN.RDY blocks the wind and rain while keep- ing your feet dry.', '$200.00', '5'),
(23, 332961532, 'adidas_adicross_bounce.pg', 'adidas Men’s adicross Bounce 2 Shoes - White', 'Transition from the course to the street in style in these men’s golf shoes. They feature ultra-soft Cloud- foam cushioning with a Bounce midsole for all-day comfort on every step. A custom lacing system offers locked-in support on and off the links.', '$170.00', '5'),
(24, 332961614, 'adidas_forgefiber_boa.jpg', 'adidas Men’s Forgefiber Boa Shoes - White', 'These men’s golf shoes are built for lightweight stability on the links. They feature a weather-resistant stretch upper with an innovative Boa® Clo- sure System for comfort and a cus- tom fit. A Boost midsole gives you responsive cushioning, while Climas- torm provides breathable protection in wet conditions.', '$200.00', '5'),
(25, 333053489, 'puma_grip_fusion.jpg', 'Puma Grip Fusion Sport 2.0 White', 'inspired by the adult’s Grip Fusion Sport, the Grip Fusion Sport 2.0 JR boasts an extremely comfortable fit, r and sporty midsole that will keep you cool and comfortable all-day long.\r\nit’s a must have for both parents and children.', '$109.99', '5'),
(26, 333046779, 'nike_air_max_slides.jpg', 'Nike Men’s Air Max 90 Slide Sandals', 'The Nike Air Max 90 Slide honors the legendary shoe that shook up the sneaker scene 30 years ago. The visible Max Air unit in the heel cele- brates its strong heritage, while color- ful stitched in TPU elements add retro styling. The foam footbed and plush strap lining offer comfort and support. An embroidered Swoosh and pre- mium materials elevate this slide into a category all its own. After 30 years of stardom, the legend of Air Max continues to build and bridge new worlds.', '$94.00', '7'),
(27, 333020357, 'nike_benassi_slides.jpg', 'Nike Men’s Benassi “Just Do It” Slide Sandals', 'The Nike Benassi JDI Slide is light- weight and sporty. It features the Nike logo on the foot strap, which is lined in soft fabric. Its foam midsole adds spring to your kicked-back style.', '$29.99', '7'),
(28, 333017433, 'under_armour_ignite_slides.jpg', 'Under Armour Men’s Ignite VI Slide Sandals', 'The Under Armour Men’s Ignite VI Slide Sandals have an adjustable synthetic strap with soft foam un- derneath for added comfort, and a footbed built with two layers of Perfor- mance 4D Foam® for unprecedent- ed comfort.', '$39.99', '7'),
(29, 332932783, 'nike_offcourt_slides.jpg', 'Nike Men’s Offcourt Slide Sandals - Black', 'The Nike Men’s Offcourt Slide Sandals is a lightweight sandal with a classic logo embellished on the strap. The innovative foam and jersey lining ensure an effortlessly comfortable experience.', '$41.99', '7'),
(30, 332995433, 'crocs_classic.jpg', 'Crocs Men’s Classic Clog - Army Green', 'The iconic clog that started a comfort revolution around the world! The irrev- erent, go-to comfort shoe that you’re sure to fall deeper in love with day after day. Crocs Classic Clogs feature lightweight Iconic Crocs ComfortTM,\r\na color for every personality, and offer an ongoing invitation to be comfort- able in your own shoes.', '$34.94', '7'),
(31, 333068239, 'adidas_nmd.jpg', 'adidas Men’s NMD_R1 Shoes', 'The past inspires the future. These NMD_R1 Shoes combine the best\r\nof adidas’ latest technical innovations with a look that honours the past. Re- sponsive cushioning and a stretchy, sock-like upper give a supremely comfortable feel.', '$170.00', '6'),
(32, 332999418, 'champion_slippers.jpg', 'Champion Men’s University C Slippers - Oxford Grey/Blue/Red', 'Champion’s University Slippers add\r\na sporty vibe to a walk downtime or anytime. The soft jersey upper, \r\nembroidered logo and fun mini pouch pocket is inspired by Champion’s \r\nfamous fleece hoodie. Slip-on style with an ultra-soft plush lining for warmth, perfect for the winter season.', '$72.99', '6'),
(33, 333014916, 'converse_ct.jpg', 'Converse Men’s CT All Star Shoes', 'WHERE IT COUNTS. Not so fast. Modeled from our iconic basketball sneaker, The Fastbreak, the Chuck Taylor All Star CS puts comfort front and center with added padding through the tongue and collar. This low top model sports archival inspired details, a faux leather collar, and a clean look.\r\n', '$64.99', '6'),
(34, 333068264, 'adidas_superstar.jpg', 'adidas Men’s Superstar Shoes', 'Originally made for basketball courts in the ’70s. Celebrated by hip hop royalty in the ’80s. The adidas Super- star shoe is now a lifestyle staple for streetwear enthusiasts. The world-famous shell toe feature remains, providing style and protection. Just like it did on the \r\nB-ball courts back in the day. Now, whether at a festival or walking in the street you can enjoy yourself without the fear of being stepped on. The serrated 3-Stripes detail and adidas Superstar box logo adds OG authenticity to your look.', '$100.00', '6'),
(35, 333073622, 'puma_replicat_pirelli.jpg', 'PUMA Men’s Replicat X Pirelli v2 Shoes - Black/Puma Red/White', 'The Replicat-X Pirelli takes on the ferocity and form of the modern \r\nracecar while staying true to PUMA’s \r\nauthentic Motorsport DNA. This \r\nupdated version features an outsole directly inspired by the tread pattern of the CinturatoTM Pirelli Blue Wet- one of Pirelli’s highest performing race tires. Incorporating an F1-inspired \r\nperformance outsole that wraps up around the foot for added grip and support, the Replicat-X is as ideal on the track as it is on the street.', '$62.38', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_category`
--

DROP TABLE IF EXISTS `tbl_prod_category`;
CREATE TABLE IF NOT EXISTS `tbl_prod_category` (
  `prod_cat_id` int(12) NOT NULL AUTO_INCREMENT,
  `prod_id` int(12) NOT NULL,
  `category_id` int(12) NOT NULL,
  PRIMARY KEY (`prod_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prod_category`
--

INSERT INTO `tbl_prod_category` (`prod_cat_id`, `prod_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 4),
(17, 17, 4),
(18, 18, 4),
(19, 19, 4),
(20, 20, 4),
(21, 21, 5),
(22, 22, 5),
(23, 23, 5),
(24, 24, 5),
(25, 25, 5),
(26, 26, 6),
(27, 27, 6),
(28, 28, 6),
(29, 29, 6),
(30, 30, 6),
(31, 31, 7),
(32, 32, 7),
(33, 33, 7),
(34, 34, 7),
(35, 35, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(32) DEFAULT NULL,
  `verified` int(1) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `first_name`, `user_name`, `user_email`, `user_password`, `verified`, `user_ip`) VALUES
(1, 'Malek', 'malek', 'FaragMalek14@gmail.com', 'test', 1, '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
