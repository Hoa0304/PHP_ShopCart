-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 08, 2019 lúc 12:47 PM
-- Phiên bản máy phục vụ: 8.0.15
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopcart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giay`
--

CREATE TABLE `giay` (
  `IDGiay` int(11) NOT NULL,
  `TenGiay` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GiaAo` int(11) NOT NULL,
  `GiaThuc` int(11) NOT NULL,
  `ProductDetails` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `anhDemo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giay`
--

INSERT INTO `giay` (`IDGiay`, `TenGiay`, `GiaAo`, `GiaThuc`, `ProductDetails`, `anhDemo`, `SL`) VALUES
(1, 'GIÀY BÓNG ĐÁ X 19.1 FIRM GROUND', 1000, 500, 'X không đơn thuần là một đôi giày. Đây là lời khẳng định rằng tốc độ sẽ chọc thủng hàng phòng ngự đối phương, thay vì đi vào ngõ cụt. ', 'F35316_02_standard.jpg', 3),
(2, 'PUSHA T OZWEEGO', 250, 130, 'Pusha T came from the street to claim his status as a global name. A collaboration with the hip hop artist, these Pusha T Ozweego shoes take late-\'90s and early-\'00s running style in a new direction. They feature a textile and suede upper and a rubber outsole.', 'EE7000_01_standard.jpg', 2),
(3, 'GIÀY PHARRELL WILLIAMS CRAZY BYW LVL X', 1200, 600, 'Được đi bởi các cầu thủ bóng rổ huyền thoại, mẫu giày của những năm 90 này nổi bật với phong cách khác lạ đến nỗi được gọi với cái tên Crazy. Mẫu giày Crazy BYW này kế nhiệm phong cách đó bằng cách kết hợp nét cổ điển với lớp đệm cải tiến. Phiên bản giày Pharrell Williams Hu này có thân giày trên bằng vải dệt và các hạt đệm Boost trong đế giữa mang đến khả năng chuyển hồi năng lượng và cảm giác thoải mái. Bên trong là miếng lót giày mang chữ ký Pharrell lấy cảm hứng từ nghệ thuật bấm huyệt cổ đại.', 'EF3500_01_standard.jpg', 10),
(4, 'GIÀY SOBAKOV 2.0', 700, 350, 'Mẫu giày Sobakov tôn vinh tinh thần bóng đá hiện đại. Mẫu giày bằng vải dệt kim co giãn này có phần dây buộc thiết kế bất đối xứng và đế giữa cao su được chạm khắc cỡ lớn. Để gìn giữ di sản bóng đá của adidas, mẫu giày có những điểm nhấn họa tiết thêu và 3 Sọc đổi hướng phản quang phỏng theo những chi tiết trên đôi Predator Accelerator \'98 huyền thoại.', 'D98155_01_standard.jpg', 4),
(5, 'GIÀY HUMAN WILLIAMS HU NMD', 1100, 550, 'Thông qua sự kết hợp màu sắc rực rỡ với từ ngữ thể hiện niềm hy vọng và sự bao dung, nhạc sĩ kiêm nhà thiết kế Pharrell Williams muốn tôn vinh những sắc màu nhân văn. Mẫu giày này làm mới phong cách NMD nổi tiếng bằng hình trái tim có chữ \"Human Made\" thêu trên thân giày bằng vải dệt. Đệm đỡ Boost chuyển hồi năng lượng bất tận và tạo sự thoải mái trên mỗi sải bước.', 'EF7223_01_standard.jpg', 1),
(6, 'GIÀY CAO SU LƯU HÓA CONTINENTAL', 200, 100, 'Lấy cảm hứng từ mẫu giày tập trong nhà vào đầu thập niên 80, Continental 80 mang đến kiểu dáng mới mẻ với phong cách cổ điển. Thân giày trên bằng vải canvas và da khoe ô đặt logo theo phong cách cổ điển ngay cạnh dây giày. Đế giày bằng cao su lưu hóa cho cảm giác cực kỳ vững chân.', 'FV2701_01_standard.jpg', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `IDIMG` int(11) NOT NULL,
  `UrlImg` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IDGiay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`IDIMG`, `UrlImg`, `IDGiay`) VALUES
(1, 'F35316_02_standard.jpg', 1),
(2, 'F35316_03_standard.jpg', 1),
(3, 'F35316_010_hover_standard.jpg', 1),
(4, 'F35316_012_hover_standard.jpg', 1),
(5, 'EE7000_010_hover_standard.jpg', 2),
(6, 'EE7000_012_hover_standard.jpg', 2),
(7, 'EE7000_02_standard.jpg', 2),
(8, 'EE7000_03_standard.jpg', 2),
(9, 'EF3500_01_standard.jpg', 3),
(10, 'EF3500_010_hover_standard.jpg', 3),
(11, 'EF3500_02_standard.jpg', 3),
(12, 'EF3500_03_standard.jpg', 3),
(13, 'EF3500_04_standard.jpg', 3),
(14, 'EF3500_05_standard.jpg', 3),
(15, 'D98155_01_standard.jpg', 4),
(16, 'D98155_010_hover_standard.jpg', 4),
(17, 'D98155_02_standard.jpg', 4),
(18, 'D98155_04_standard.jpg', 4),
(19, 'EF7223_01_standard.jpg', 5),
(20, 'EF7223_010_hover_standard.jpg', 5),
(21, 'EF7223_03_standard.jpg', 5),
(22, 'EF7223_04_standard.jpg', 5),
(23, 'EF7223_41_detail.jpg', 5),
(24, 'FV2701_01_standard.jpg', 6),
(25, 'FV2701_02_standard.jpg', 6),
(26, 'FV2701_04_standard.jpg', 6),
(27, 'FV2701_05_standard.jpg', 6),
(28, 'FV2701_06_standard.jpg', 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giay`
--
ALTER TABLE `giay`
  ADD PRIMARY KEY (`IDGiay`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`IDIMG`),
  ADD KEY `IDGiay` (`IDGiay`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giay`
--
ALTER TABLE `giay`
  MODIFY `IDGiay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `IDIMG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`IDGiay`) REFERENCES `giay` (`IDGiay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
