-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 02:43 PM
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
-- Database: `noithat_hoanhoannn`
--

-- --------------------------------------------------------

--
-- Table structure for table `artisans`
--

CREATE TABLE `artisans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artisans`
--

INSERT INTO `artisans` (`id`, `name`, `image`, `description`, `created_at`) VALUES
(1, 'Cao Lương', 'Chan-dung-nghe-nhan-Tran-Do.jpg', 'Ông là một nghệ nhân kỳ cựu trong lĩnh vực chế tác nội thất, sở hữu nhiều năm kinh nghiệm và tay nghề điêu luyện. Với sự am hiểu sâu sắc về chất liệu gỗ cùng tư duy sáng tạo độc đáo, ông đã tạo nên nhiều sản phẩm nội thất mang đậm dấu ấn cá nhân, vừa tinh xảo vừa bền vững theo thời gian.\r\n\r\nKhông chỉ nổi bật về kỹ thuật, ông còn luôn tiên phong trong việc cập nhật xu hướng thiết kế mới, kết hợp hài hòa giữa nét đẹp truyền thống và phong cách hiện đại. Mỗi sản phẩm do ông thực hiện đều được chăm chút tỉ mỉ, từ khâu lựa chọn nguyên liệu cho đến hoàn thiện chi tiết cuối cùng.\r\n\r\nVới triết lý đặt chất lượng và trải nghiệm khách hàng lên hàng đầu, ông đã góp phần xây dựng uy tín vững chắc cho thương hiệu DTN Home, trở thành một trong những người thợ được khách hàng tin tưởng và đánh giá cao.', '2026-04-19 09:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`) VALUES
(7, 'HOME-BANNER-SLIDE-6-1.png', '2026-04-19 08:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`) VALUES
(1, 'Phòng khách', 'sofa.png'),
(2, 'Phòng ngủ', 'bed.png'),
(3, 'Phòng bếp', 'kitchen.png'),
(4, 'Phòng tắm', 'bath1.png'),
(5, 'Trẻ em', 'kid.png'),
(6, 'Văn phòng', 'office.png');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `zalo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `name`, `phone`, `email`, `address`, `facebook`, `zalo`, `created_at`) VALUES
(1, 'CÔNG TY DTN HOME', '0999999999', 'DTNHOME@gmail.com', 'Số 1 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, '2026-04-19 09:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'đặng tài nguyenm', 'nguyendeptraiokk2004@gmail.com', '1234', 'đáaaaaaa', '2026-04-19 06:11:30'),
(2, 'đâ', 'nguyendeptraiokk2004@gmail.com', 'đa', 'da', '2026-04-19 16:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`id`, `product_id`, `created_at`) VALUES
(1, 2, '2026-04-19 15:20:10'),
(2, 3, '2026-04-19 15:20:11'),
(3, 4, '2026-04-19 15:20:11'),
(4, 5, '2026-04-19 15:20:12'),
(5, 7, '2026-04-19 15:20:22'),
(6, 8, '2026-04-19 15:20:23'),
(7, 9, '2026-04-21 15:34:28'),
(9, 15, '2026-04-21 18:42:50'),
(10, 18, '2026-04-22 02:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(3, 'NGẤT NGÂY VỚI TOP 1 MẪU NỘI THẤT CHUNG CƯ 1 PHÒNG NGỦ ĐẸP NHẤT', 'Trong bối cảnh diện tích nhà ở ngày càng thu hẹp, việc thiết kế nội thất cho căn hộ nhỏ trở thành một bài toán quan trọng. Không chỉ cần đảm bảo tính thẩm mỹ, không gian sống còn phải tiện nghi và tối ưu công năng sử dụng.\r\n\r\nMột trong những giải pháp hiệu quả là sử dụng nội thất đa năng. Các sản phẩm như sofa giường, bàn ăn gấp gọn hay tủ âm tường giúp tiết kiệm diện tích đáng kể. Bên cạnh đó, việc lựa chọn màu sắc sáng như trắng, be hoặc pastel sẽ tạo cảm giác không gian rộng rãi hơn.\r\n\r\nÁnh sáng tự nhiên cũng đóng vai trò quan trọng. Bạn nên tận dụng cửa sổ lớn, kết hợp với rèm mỏng để ánh sáng lan tỏa khắp căn phòng. Ngoài ra, gương trang trí cũng là một mẹo giúp “đánh lừa thị giác”, khiến căn hộ trở nên thoáng đãng hơn.\r\n\r\nCuối cùng, hãy tối giản đồ nội thất không cần thiết. Một không gian gọn gàng, khoa học không chỉ đẹp mắt mà còn mang lại cảm giác thoải mái, dễ chịu trong sinh hoạt hàng ngày.', '1776796068_1-29.jpg', '2026-04-19 06:51:32'),
(4, 'XU HƯỚNG THIẾT KẾ NỘI THẤT PHÒNG KHÁCH 2026', 'Phòng khách luôn được xem là “bộ mặt” của ngôi nhà, nơi thể hiện phong cách sống và gu thẩm mỹ của gia chủ. Trong năm 2026, xu hướng thiết kế nội thất phòng khách hướng đến sự tối giản nhưng vẫn sang trọng và tinh tế.\r\n\r\nCác vật liệu tự nhiên như gỗ, đá và vải linen đang được ưa chuộng. Chúng không chỉ mang lại cảm giác gần gũi mà còn tạo nên không gian ấm cúng. Màu sắc trung tính như nâu, xám, kem kết hợp với điểm nhấn là các gam màu nổi sẽ giúp căn phòng trở nên hài hòa và thu hút hơn.\r\n\r\nBên cạnh đó, các mẫu sofa thiết kế thấp, đường nét mềm mại đang trở thành xu hướng. Kết hợp cùng bàn trà đơn giản và thảm trải sàn họa tiết nhẹ nhàng sẽ tạo nên tổng thể cân đối.\r\n\r\nCông nghệ cũng được tích hợp nhiều hơn vào nội thất, từ hệ thống đèn thông minh đến các thiết bị giải trí hiện đại. Điều này giúp nâng cao trải nghiệm sống, mang lại sự tiện nghi tối đa cho người sử dụng.', '1776796203_ban-tra-nhap-khau-cao-cap-278s.webp', '2026-04-19 07:00:14'),
(5, 'BÍ QUYẾT BỐ TRÍ NỘI THẤT PHÒNG NGỦ NHỎ NHƯNG TIỆN NGHI', 'Phòng ngủ là nơi nghỉ ngơi, thư giãn sau một ngày dài, vì vậy việc bố trí nội thất hợp lý là điều vô cùng quan trọng, đặc biệt với những không gian có diện tích hạn chế.\r\n\r\nĐể tối ưu diện tích, bạn nên lựa chọn giường ngủ có thiết kế tích hợp ngăn kéo hoặc hộc chứa đồ bên dưới. Điều này giúp giảm bớt nhu cầu sử dụng tủ lớn. Ngoài ra, tủ quần áo dạng cửa lùa cũng là lựa chọn thông minh cho không gian nhỏ.\r\n\r\nMàu sắc trong phòng ngủ nên ưu tiên các gam nhẹ nhàng như trắng, xanh nhạt hoặc be để tạo cảm giác thư giãn. Ánh sáng vàng dịu từ đèn ngủ sẽ giúp không gian trở nên ấm áp hơn.\r\n\r\nViệc bố trí nội thất cần đảm bảo sự thông thoáng, tránh đặt quá nhiều đồ gây chật chội. Một vài chi tiết trang trí như tranh treo tường hoặc cây xanh nhỏ sẽ giúp căn phòng thêm sinh động mà không làm mất đi sự gọn gàng.\r\n\r\nMột phòng ngủ được thiết kế hợp lý không chỉ giúp nâng cao chất lượng giấc ngủ mà còn góp phần cải thiện chất lượng cuộc sống.', '1776796287_thiet-ke-phong-ngu-2m.jpeg', '2026-04-19 14:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `payment_method` varchar(50) DEFAULT NULL,
  `shipping_method` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Đang xử lý',
  `discount` int(11) DEFAULT 0,
  `final_total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `phone`, `address`, `total`, `created_at`, `payment_method`, `shipping_method`, `user_id`, `status`, `discount`, `final_total`) VALUES
(45, 'Bàn trà hiện đại', '08974324', 'TPHCM', 1500000, '2026-04-28 19:50:09', 'COD', 'Hỏa tốc', 2, 'Đang xử lý', 150000, 1350000),
(46, 'Bàn trà hiện đại', '08974324', 'TPHCM', 8500000, '2026-04-30 16:21:59', 'COD', 'Hỏa tốc', 2, 'Đang xử lý', 850000, 7650000),
(47, 'nguyen', '08974324', 'TPHCM', 8500000, '2026-04-30 16:26:34', 'COD', 'Hỏa tốc', 2, 'Đang xử lý', 850000, 7650000),
(48, 'Bàn trà hiện đại', '08974324', 'TPHCM', 8500000, '2026-04-30 16:32:46', 'COD', 'Hỏa tốc', 2, 'Đang xử lý', 850000, 7650000),
(49, 'Bàn ăn gỗ', '1234', 'TPHCM', 8500000, '2026-04-30 16:41:13', 'COD', 'Hỏa tốc', 2, 'Đang xử lý', 850000, 7650000),
(50, 'Bàn trà hiện đại', '08974324', 'TPHCM', 8500000, '2026-04-30 16:52:33', 'COD', 'Hỏa tốc', 2, 'completed', 850000, 7650000),
(51, 'ghe', '1234', 'fsd', 8500000, '2026-04-30 17:06:01', 'COD', 'Hỏa tốc', 2, 'Đang xử lý', 850000, 7650000);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `wood` varchar(50) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `price`, `quantity`, `color`, `wood`, `product_id`, `material`) VALUES
(1, 1, 'Bàn uống nước', 9999000, 1, NULL, NULL, NULL, NULL),
(2, 3, 'ghe', 12, 1, NULL, NULL, NULL, NULL),
(3, 3, 'Bàn trà hiện đại', 3200000, 1, NULL, NULL, 8, NULL),
(4, 5, 'Giường châu Âu', 15999000, 9, NULL, NULL, 2, NULL),
(5, 6, 'Bàn ăn gỗ', 8999000, 1, NULL, NULL, 3, NULL),
(6, 7, 'Bàn ăn gỗ', 8999000, 11, NULL, NULL, 3, NULL),
(7, 8, 'Bàn ăn gỗ', 8999000, 1, NULL, NULL, 3, NULL),
(8, 9, 'Bàn ăn gỗ', 8999000, 1, NULL, NULL, 3, NULL),
(9, 10, 'Sofa gỗ cao cấp', 8500000, 1, 'Trắng', 'Gỗ sồi', NULL, NULL),
(10, 10, 'Bàn ăn gỗ', 8999000, 1, 'Trắng', 'Gỗ xoan', 3, NULL),
(11, 11, 'Bàn ăn gỗ', 8999000, 1, 'Nâu', 'Gỗ xoan', 3, NULL),
(12, 12, 'Sofa gỗ cao cấp', 8500000, 1, 'Đen', 'Gỗ sồi', NULL, NULL),
(13, 13, 'Bàn ăn gỗ', 8999000, 1, 'Trắng', 'Gỗ xoan', 3, NULL),
(14, 14, 'Giường châu Âu', 15999000, 1, 'Trắng', 'Gỗ sồi', 2, NULL),
(15, 15, 'Bàn ăn gỗ', 15999000, 1, 'gray', 'Không chọn', 3, NULL),
(16, 17, 'Bàn trà hiện đại', 8999000, 1, 'gray', 'Không chọn', 8, NULL),
(17, 20, 'Bàn ăn gỗ', 15999000, 1, 'gray', 'Không chọn', 3, NULL),
(18, 21, 'Tủ lavabo', 2500000, 8, 'Trắng', 'Gỗ óc chó', 16, NULL),
(19, 22, 'Tủ lavabo', 2500000, 1, 'Trắng', 'Gỗ sồi', 16, NULL),
(20, 23, 'Tủ lavabo', 2500000, 1, 'Trắng', 'Gỗ sồi', 16, NULL),
(21, 24, 'Tủ lavabo', 2500000, 1, 'Nâu', 'Gỗ óc chó', 16, NULL),
(22, 25, 'Tủ lavabo', 2500000, 1, 'Trắng', 'Gỗ sồi', 16, NULL),
(23, 28, 'Bàn trà hiện đại', 8500000, 1, 'Trắng', 'Gỗ sồi', 8, NULL),
(24, 29, 'Bàn trà hiện đại', 8500000, 1, 'Trắng', 'Gỗ xoan', 8, NULL),
(25, 30, 'Nội thất trẻ em (giường cũi)', 1500000, 1, 'Trắng', 'Gỗ xoan', 12, NULL),
(26, 31, 'Giường châu Âu', 12000000, 1, 'Trắng', 'Gỗ sồi', 2, NULL),
(27, 32, 'Giường châu Âu', 12000000, 1, 'Trắng', 'Gỗ sồi', 2, NULL),
(28, 33, 'Giường châu Âu', 12000000, 1, 'Trắng', 'Gỗ sồi', 2, NULL),
(29, 34, 'Giường châu Âu', 12000000, 1, 'Nâu', 'Gỗ sồi', 2, NULL),
(30, 35, 'Giường châu Âu', 12000000, 1, 'Trắng', 'Gỗ sồi', 2, NULL),
(31, 36, 'Bàn ăn gỗ', 3000000, 1, 'Trắng', 'Gỗ sồi', 3, NULL),
(32, 37, 'Nội thất trẻ em (giường cũi)', 1500000, 1, 'Trắng', 'Gỗ sồi', 12, NULL),
(33, 38, 'SOFA hiện đại', 4000000, 1, 'Trắng', 'Gỗ sồi', NULL, NULL),
(34, 39, 'SOFA hiện đại', 4000000, 1, 'Trắng', 'Gỗ sồi', NULL, NULL),
(35, 40, 'Bàn trà hiện đại', 2500000, 1, 'Đen', 'Gỗ óc chó', NULL, NULL),
(36, 41, 'Bàn ăn gỗ', 3000000, 1, 'Trắng', 'Gỗ sồi', NULL, NULL),
(37, 42, 'Giường châu Âu', 12000000, 1, 'Trắng', 'Gỗ sồi', NULL, NULL),
(38, 43, 'Giường châu Âu', 12000000, 1, 'Trắng', 'Gỗ sồi', NULL, NULL),
(39, 44, 'Giường châu Âu', 12000000, 1, 'Trắng', 'Gỗ sồi', NULL, NULL),
(40, 45, 'Nội thất trẻ em (giường cũi)', 1500000, 1, 'Trắng', 'Gỗ sồi', NULL, NULL),
(41, 46, 'Bàn trà hiện đại', 8500000, 1, 'Trắng', NULL, NULL, NULL),
(42, 47, 'Bàn trà hiện đại', 8500000, 1, 'Trắng', NULL, NULL, NULL),
(43, 48, 'Bàn trà hiện đại', 8500000, 1, 'Trắng', NULL, NULL, NULL),
(44, 49, 'Bàn trà hiện đại', 8500000, 1, 'Trắng', NULL, NULL, NULL),
(45, 50, 'Bàn trà hiện đại', 8500000, 1, 'Trắng', NULL, NULL, NULL),
(46, 51, 'Bàn trà hiện đại', 8500000, 1, 'Trắng', NULL, NULL, 'Gỗ sồi');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `materials` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category_id`, `stock`, `materials`) VALUES
(2, 'Giường châu Âu', 12000000, '1776796615_giuong-ngu-23.jpg', 'Giường châu Âu sở hữu thiết kế sang trọng, tinh tế với các đường nét mềm mại và hiện đại. Sản phẩm thường có kích thước rộng rãi, mang lại cảm giác thoải mái khi nghỉ ngơi. Chất liệu cao cấp cùng kiểu dáng đẳng cấp giúp nâng tầm không gian phòng ngủ, tạo nên sự tiện nghi và đẳng cấp cho người sử dụng.', 2, 7, NULL),
(3, 'Bàn ăn gỗ', 3000000, '1776795836_ban-an-8-ghe-go-tu-nhien-2095s.webp', 'Bàn ăn gỗ mang phong cách truyền thống kết hợp hiện đại, tạo cảm giác ấm cúng cho không gian bếp. Sản phẩm được làm từ gỗ tự nhiên hoặc gỗ công nghiệp cao cấp, có độ bền cao và dễ vệ sinh. Đây là nơi lý tưởng để các thành viên trong gia đình quây quần bên nhau trong mỗi bữa ăn.', 3, 6, NULL),
(8, 'Bàn trà hiện đại', 2500000, '1776795768_ban-tra-nhap-khau-cao-cap-278s.webp', 'Bàn trà hiện đại có kiểu dáng đơn giản nhưng sang trọng, thường được đặt ở phòng khách để tiếp khách hoặc trang trí. Mặt bàn rộng rãi, có thể sử dụng để đặt trà, sách hoặc đồ trang trí. Thiết kế nhỏ gọn giúp tiết kiệm diện tích, phù hợp với các căn hộ chung cư hoặc nhà phố.', NULL, 9, NULL),
(12, 'Nội thất trẻ em (giường cũi)', 1500000, 'Noi-cui-em-be-Chilux.png', 'Sản phẩm nội thất trẻ em được thiết kế an toàn, thân thiện với trẻ nhỏ. Giường cũi có các thanh chắn chắc chắn, đảm bảo bé không bị ngã trong quá trình sử dụng. Chất liệu gỗ tự nhiên hoặc gỗ công nghiệp cao cấp, không chứa chất độc hại, giúp phụ huynh yên tâm khi sử dụng cho con nhỏ.', 5, 5, NULL),
(14, 'Tủ văn phòng', 2000000, 'Tủ-ngăn-kéo-3_4-Classic-gỗ-sồi_1.jpg', 'Tủ văn phòng được thiết kế nhằm phục vụ nhu cầu lưu trữ tài liệu, hồ sơ một cách khoa học. Với nhiều ngăn và kích thước khác nhau, sản phẩm giúp sắp xếp giấy tờ gọn gàng, dễ tìm kiếm. Chất liệu thường là gỗ công nghiệp hoặc kim loại, đảm bảo độ bền và tính chuyên nghiệp cho môi trường làm việc.', 6, 10, NULL),
(15, 'SOFA hiện đại', 4000000, '1-29.jpg', 'Sofa hiện đại mang phong cách tối giản nhưng tinh tế, phù hợp với nhiều không gian phòng khách khác nhau. Khung ghế chắc chắn kết hợp với lớp đệm êm ái giúp mang lại cảm giác thoải mái khi sử dụng. Thiết kế màu sắc trung tính dễ phối hợp với các đồ nội thất khác, tạo nên không gian sống sang trọng và ấm cúng.', 1, 7, NULL),
(16, 'Tủ lavabo', 2500000, 'bo-tu-chau-lavabo-phong-tam-thiet-ke-doc-dao-bt14-7-bbd3vvmwd77t0jg.webp', 'Tủ lavabo được thiết kế hiện đại, phù hợp cho không gian phòng tắm gọn gàng và tiện nghi. Sản phẩm thường được làm từ gỗ công nghiệp chống ẩm hoặc nhựa cao cấp, giúp tăng độ bền khi sử dụng trong môi trường ẩm ướt. Ngoài việc nâng đỡ chậu rửa, tủ còn có ngăn chứa tiện lợi để lưu trữ đồ dùng cá nhân như khăn, mỹ phẩm, giúp phòng tắm luôn ngăn nắp.', 4, 10, NULL),
(17, 'Bàn trà hiện đại', 1000000, '1-29.jpg', 'Bàn trà hiện đại', 1, 10, NULL),
(18, 'Bàn trà hiện đại', 8500000, '1-29.jpg', 'ĐẤ', 1, 4, 'Gỗ sồi,óc chó,gỗ lim');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `reply` text DEFAULT NULL,
  `reply_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `reply`, `reply_at`) VALUES
(1, 2, 2, 5, 'tốt', '2026-04-28 02:45:57', NULL, NULL),
(3, 2, 12, 5, 'tốt', '2026-04-28 01:47:21', NULL, NULL),
(4, 2, 18, 5, 'ok', '2026-04-28 02:30:16', NULL, NULL),
(5, 2, 16, 5, 'tệ', '2026-04-28 02:30:31', NULL, NULL),
(6, 2, 14, 5, 'cũng ổn', '2026-04-28 02:31:56', NULL, NULL),
(7, 2, 8, 3, 'tệ', '2026-04-28 02:46:45', NULL, NULL),
(8, 7, 2, 2, 'tệ', '2026-04-28 02:47:16', 'sr bn', '2026-04-28 03:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `review_likes`
--

CREATE TABLE `review_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `avatar`) VALUES
(1, 'Admin', 'admin@ngocquang.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', NULL, 'default.png'),
(2, 'Dang Nguyen', 'nguyendeptraiokk2004@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '08974324', '1777309267_z6834884391366_fade2c13f0cf2df67cc7f652825d009e.jpg'),
(5, 'trinh', 'a@ngocquang.com', '202cb962ac59075b964b07152d234b70', 'user', '1234', '1777314117_Heart-shaped-watercolor-Vietnam-flag-independent-asia-elections_400147_wh860.png');

-- --------------------------------------------------------

--
-- Table structure for table `viewed_products`
--

CREATE TABLE `viewed_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `viewed_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewed_products`
--

INSERT INTO `viewed_products` (`id`, `user_id`, `product_id`, `viewed_at`) VALUES
(1, 2, 2, '2026-04-27 23:17:57'),
(2, 5, 2, '2026-04-28 01:20:41'),
(3, 5, 2, '2026-04-28 01:21:08'),
(4, 5, 2, '2026-04-28 01:22:08'),
(5, 5, 2, '2026-04-28 01:22:48'),
(6, 5, 2, '2026-04-28 01:23:36'),
(7, 5, 2, '2026-04-28 01:25:44'),
(8, 5, 2, '2026-04-28 01:27:02'),
(9, 5, 2, '2026-04-28 01:27:13'),
(10, 5, 2, '2026-04-28 01:33:11'),
(11, 5, 2, '2026-04-28 01:33:19'),
(12, 2, 2, '2026-04-28 01:33:46'),
(13, 2, 2, '2026-04-28 01:35:34'),
(14, 2, 2, '2026-04-28 01:35:52'),
(15, 7, 2, '2026-04-28 01:36:31'),
(16, 7, 3, '2026-04-28 01:37:17'),
(17, 2, 3, '2026-04-28 01:37:46'),
(18, 2, 12, '2026-04-28 01:42:08'),
(19, 2, 12, '2026-04-28 01:47:16'),
(20, 2, 12, '2026-04-28 01:47:21'),
(21, 2, 15, '2026-04-28 02:15:01'),
(22, 2, 15, '2026-04-28 02:22:15'),
(23, 2, 8, '2026-04-28 02:22:59'),
(24, 2, 18, '2026-04-28 02:30:12'),
(25, 2, 18, '2026-04-28 02:30:16'),
(26, 2, 18, '2026-04-28 02:30:20'),
(27, 2, 16, '2026-04-28 02:30:25'),
(28, 2, 16, '2026-04-28 02:30:32'),
(29, 2, 14, '2026-04-28 02:31:47'),
(30, 2, 14, '2026-04-28 02:31:56'),
(31, 2, 14, '2026-04-28 02:37:17'),
(32, 2, 16, '2026-04-28 02:39:01'),
(33, 2, 2, '2026-04-28 02:39:06'),
(34, 2, 2, '2026-04-28 02:40:20'),
(35, 2, 8, '2026-04-28 02:40:24'),
(36, 2, 8, '2026-04-28 02:40:26'),
(37, 2, 8, '2026-04-28 02:40:26'),
(38, 2, 8, '2026-04-28 02:40:26'),
(39, 2, 8, '2026-04-28 02:40:26'),
(40, 2, 8, '2026-04-28 02:40:36'),
(41, 2, 8, '2026-04-28 02:40:39'),
(42, 2, 8, '2026-04-28 02:44:47'),
(43, 2, 8, '2026-04-28 02:45:19'),
(44, 2, 2, '2026-04-28 02:45:45'),
(45, 2, 2, '2026-04-28 02:45:57'),
(46, 2, 2, '2026-04-28 02:46:12'),
(47, 2, 2, '2026-04-28 02:46:17'),
(48, 2, 8, '2026-04-28 02:46:28'),
(49, 2, 8, '2026-04-28 02:46:36'),
(50, 2, 8, '2026-04-28 02:46:45'),
(51, 7, 2, '2026-04-28 02:46:57'),
(52, 7, 2, '2026-04-28 02:47:06'),
(53, 7, 2, '2026-04-28 02:47:16'),
(54, 7, 2, '2026-04-28 02:49:42'),
(55, 7, 2, '2026-04-28 02:49:55'),
(56, 7, 2, '2026-04-28 02:53:39'),
(57, 7, 2, '2026-04-28 02:53:47'),
(58, 7, 2, '2026-04-28 03:03:07'),
(59, 7, 2, '2026-04-28 03:07:02'),
(60, 7, 2, '2026-04-28 03:15:12'),
(61, 7, 2, '2026-04-28 03:15:23'),
(62, 7, 2, '2026-04-28 03:15:26'),
(63, 7, 2, '2026-04-28 03:15:28'),
(64, 7, 2, '2026-04-28 03:15:31'),
(65, 7, 2, '2026-04-28 03:15:32'),
(66, 7, 2, '2026-04-28 03:28:39'),
(67, 2, 14, '2026-04-28 03:29:16'),
(68, 2, 14, '2026-04-28 03:29:19'),
(69, 2, 14, '2026-04-28 03:29:21'),
(70, 2, 2, '2026-04-28 10:24:55'),
(71, 2, 2, '2026-04-28 12:32:34'),
(72, 2, 2, '2026-04-28 12:42:29'),
(73, 2, 2, '2026-04-28 12:42:49'),
(74, 2, 14, '2026-04-28 12:49:58'),
(75, 2, 14, '2026-04-28 12:50:03'),
(76, 2, 14, '2026-04-28 12:50:10'),
(77, 2, 2, '2026-04-28 19:24:21'),
(78, 2, 2, '2026-04-28 19:32:01'),
(79, 2, 2, '2026-04-28 19:45:56'),
(80, 2, 12, '2026-04-28 19:49:47'),
(81, 2, 8, '2026-04-30 14:47:34'),
(82, 2, 2, '2026-04-30 15:05:11'),
(83, 2, 2, '2026-04-30 15:05:13'),
(84, 2, 2, '2026-04-30 15:05:14'),
(85, 2, 2, '2026-04-30 15:14:02'),
(86, 2, 20, '2026-04-30 15:14:13'),
(87, 2, 20, '2026-04-30 15:14:34'),
(88, 2, 2, '2026-04-30 15:34:55'),
(89, 2, 3, '2026-04-30 15:35:13'),
(90, 2, 18, '2026-04-30 15:35:22'),
(91, 2, 18, '2026-04-30 15:35:35'),
(92, 2, 18, '2026-04-30 15:37:31'),
(93, 2, 18, '2026-04-30 15:44:57'),
(94, 2, 18, '2026-04-30 15:49:09'),
(95, 2, 18, '2026-04-30 15:52:42'),
(96, 2, 18, '2026-04-30 15:58:16'),
(97, 2, 18, '2026-04-30 16:07:32'),
(98, 2, 18, '2026-04-30 16:10:28'),
(99, 2, 18, '2026-04-30 16:10:28'),
(100, 2, 18, '2026-04-30 16:15:33'),
(101, 2, 18, '2026-04-30 16:15:34'),
(102, 2, 18, '2026-04-30 16:15:34'),
(103, 2, 18, '2026-04-30 16:15:34'),
(104, 2, 18, '2026-04-30 16:15:34'),
(105, 2, 18, '2026-04-30 16:15:34'),
(106, 2, 18, '2026-04-30 16:16:04'),
(107, 2, 18, '2026-04-30 16:20:09'),
(108, 2, 18, '2026-04-30 16:26:20'),
(109, 2, 18, '2026-04-30 16:32:28'),
(110, 2, 18, '2026-04-30 16:41:01'),
(111, 2, 18, '2026-04-30 16:52:20'),
(112, 2, 18, '2026-04-30 17:05:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artisans`
--
ALTER TABLE `artisans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_review` (`user_id`,`product_id`);

--
-- Indexes for table `review_likes`
--
ALTER TABLE `review_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewed_products`
--
ALTER TABLE `viewed_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artisans`
--
ALTER TABLE `artisans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review_likes`
--
ALTER TABLE `review_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `viewed_products`
--
ALTER TABLE `viewed_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
