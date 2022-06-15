-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2022 lúc 06:48 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_sale_clothes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `MABL` varchar(10) NOT NULL,
  `MASP` char(5) NOT NULL,
  `NDBL` varchar(1000) NOT NULL,
  `NGAYDANG` date NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SDT` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsx`
--

CREATE TABLE `hangsx` (
  `MAHANGSX` char(5) NOT NULL,
  `TENHANG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hangsx`
--

INSERT INTO `hangsx` (`MAHANGSX`, `TENHANG`) VALUES
('BTS', 'JungKook'),
('CHN', 'Channel'),
('ELN', 'Elegant');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID` int(11) NOT NULL,
  `TENKH` varchar(50) NOT NULL,
  `SDT` char(10) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ND` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID`, `TENKH`, `SDT`, `EMAIL`, `ND`) VALUES
(1, 'Vũ Minh Toán', '0869762836', 'vuminhtoan2001@gmail.com', 'Em có nhu cầu tìm 1 bộ Vest hoàn chỉnh màu tím than ạ! Ac có thể tư vấn giúp em đc ko ạ?'),
(2, 'Vũ Thị Thảo Linh', '098453213', 'thaolinh@gmail.com', 'Em cần mua 1 Quần Âu ! Shop có thể tư vấn thêm được không ạ ?'),
(6, 'Nguyễn Cao Hải', '0869762836', 'vuminhtoan2002@gmail.com', 'Test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `contact`) VALUES
(1, 'vuminhtoan2001@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MALOAI` char(5) NOT NULL,
  `TENLOAI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MALOAI`, `TENLOAI`) VALUES
('AP', 'Áo phông'),
('APL', 'Áo Pô Lô'),
('ASM', 'Áo sơ mi'),
('AV', 'Áo Veston'),
('Q', 'Quần'),
('QA', 'Quần Âu'),
('QS', 'Quần Sooc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `ngaydathang` date NOT NULL,
  `thanhtoan` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`id`, `name`, `phone`, `address`, `email`, `total`, `ngaydathang`, `thanhtoan`, `status`) VALUES
(1, 'Vũ Minh Toán', '0869762824', 'Hồng Thuận, Giao Thủy, Nam Định', 'vuminhtoan2001@gmail.com', 5474000, '2021-09-05', 'Thanh toán khi giao hàng', 1),
(2, 'Trần Xuân Diệu', '0123645789', 'Nam Định', 'tranxuandieu@gmail.com', 3368000, '2021-02-06', 'Thanh toán khi giao hàng', 1),
(3, 'Đỗ Đức Du', '0978652341', 'Nam Định', 'doducdu@gmail.com', 6128000, '2021-10-06', 'Thanh toán khi giao hàng', 1),
(4, 'Vũ Thị Mai Linh', '0968754224', 'Nam Định', 'mailinh@gmail.com', 1785000, '2021-03-06', 'Thanh toán qua thẻ ngân hàng', 0),
(5, 'Quách Tuấn Du', '0983761734', 'Hà Nội', 'dutuan@gmail.com', 1628000, '2021-02-13', 'Thanh toán khi giao hàng', 0),
(6, 'Bình Yên', '0124887224', 'Hà Nội', 'yenbinh2@gmail.com', 650000, '2021-06-23', 'Thanh toán qua thẻ ngân hàng', 0),
(7, 'Vương Trần', '0936189174', 'Hà Nội', 'vuminhtoan2001@gmail.com', 549000, '2021-06-24', 'Thanh toán qua thẻ ngân hàng', 0),
(8, 'Tiêu Trần', '0886267188', 'Hà Nội', 'tieutran@gmail.com', 549000, '2021-06-24', 'Thanh toán khi giao hàng', 0),
(9, 'Tinh Nguyễn', '0993773991', 'Hà Nội', 'tinhnguyen@gmail.com', 4193000, '2021-06-24', 'Thanh toán khi giao hàng', 0),
(10, 'Tình Nguyễn', '0827615323', 'Hà Nội', 'tinhnguyen@gmail.com', 4193000, '2021-06-24', 'Thanh toán khi giao hàng', 0),
(11, 'Trịnh Trần', '0263712943', 'Hà Nội', 'trinhtran@gmail.com', 5990000, '2021-06-24', 'Thanh toán khi giao hàng', 1),
(12, 'Trịnh Trần', '0991283721', 'Hà Nội', 'trinhtran@gmail.com', 599000, '2021-06-24', 'Thanh toán khi giao hàng', 0),
(13, 'abc', '0869762836', 'xóm 9 hồng thuận giao thủy nam định', 'vuminhtoan2002@gmail.com', 700000, '2022-02-20', 'Thanh toán khi giao hàng', 0),
(14, 'Vũ Minh Toán', '0869762836', 'xóm 9 hồng thuận giao thủy nam định', 'vuminhtoan2002@gmail.com', 150000, '2022-02-21', 'Thanh toán khi giao hàng', 0),
(15, 'Vũ Văn Thiện', '0869762836', 'xóm 9 hồng thuận giao thủy nam định', 'vuminhtoan2002@gmail.com', 1409000, '2022-02-21', 'Thanh toán khi giao hàng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oderdetail`
--

CREATE TABLE `oderdetail` (
  `masp` varchar(50) NOT NULL,
  `tensp` varchar(200) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giatien` double NOT NULL,
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oderdetail`
--

INSERT INTO `oderdetail` (`masp`, `tensp`, `soluong`, `giatien`, `id`, `id_order`) VALUES
('AVL03', 'Áo Vest Nam AVL03', 1, 3999000, 6, 1),
('QSD02', 'Quần Sooc Nâu QSD02', 1, 766000, 7, 1),
('ASM01', 'Áo sơ mi trắng ASM01', 1, 709000, 8, 1),
('AVL02', 'Áo Vest Nam AVL02', 1, 1590000, 12, 2),
('ASMD0', 'Áo sơ mi ASMD01', 1, 979000, 13, 2),
('QA02', 'Quần âu QA02', 1, 799000, 14, 2),
('ASMX0', 'Áo sơ mi xanh ASMX01', 1, 1979000, 15, 3),
('QSD04', 'Quần Sooc Nâu QSD04', 1, 150000, 17, 3),
('ASMGD', 'Áo sơ mi ghi đá ASMGD01', 3, 595000, 18, 4),
('APC02', 'Áo Phông Cộc Họa Tiết APC02', 2, 489000, 19, 5),
('APC03', 'Áo Phông Cộc Hồng Nhạt APC03', 1, 650000, 20, 5),
('APC03', 'Áo Phông Cộc Hồng Nhạt APC03', 1, 650000, 21, 6),
('APC04', 'Áo Phông Ghi Đậm APC04', 1, 549000, 22, 7),
('APC04', 'Áo Phông Ghi Đậm APC04', 1, 549000, 23, 8),
('QSD01', 'Quần Sooc Trắng QSD01', 7, 599000, 24, 9),
('QSD01', 'Quần Sooc Trắng QSD01', 7, 599000, 25, 10),
('QSD01', 'Quần Sooc Trắng QSD01', 10, 599000, 26, 11),
('QSD01', 'Quần Sooc Trắng QSD01', 1, 599000, 27, 12),
('Nguyễn Viết Duy', 'ASMX0', 0, 1, 1979000, 0),
('QA05', 'Quần âu QA04', 1, 700000, 1979023, 13),
('QSD04', 'Quần Sooc Nâu QSD04', 1, 150000, 1979024, 14),
('ASM01', 'Áo sơ mi trắng ASM01', 1, 709000, 1979025, 15),
('QA05', 'Quần âu QA04', 1, 700000, 1979026, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` char(5) NOT NULL,
  `TENSP` varchar(100) NOT NULL,
  `GIA_SALE` double NOT NULL,
  `GIA` double NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `NGAYNHAP` date NOT NULL,
  `ANH` varchar(100) NOT NULL,
  `MOTA` text NOT NULL,
  `MAHANGSX` char(5) NOT NULL,
  `MALOAI` char(5) NOT NULL,
  `MAUSAC` varchar(50) NOT NULL,
  `CHATLIEU` text NOT NULL,
  `VIEW` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TENSP`, `GIA_SALE`, `GIA`, `SOLUONG`, `NGAYNHAP`, `ANH`, `MOTA`, `MAHANGSX`, `MALOAI`, `MAUSAC`, `CHATLIEU`, `VIEW`) VALUES
('APC03', 'Áo Phông Cộc Hồng Nhạt APC03', 600000, 650000, 10, '2021-06-09', 'apc3.jpg', 'Áo Phông Hồng Nhạt APC03 mềm mại, thoáng mát, bền màu,giảm nhiệt nhanh, chống co rút, đồng thời vẫn đảm bảo vừa vặn số đo hình thể. Thiết kế lịch sự và chỉn chu. Màu sắc hài hòa  giúp áo dễ kết hợp với các trang phục khác.', 'BTS', 'AP', 'Hồng nhạt', 'Chất liệu co dãn, đàn hồi thoải mái khi vận động. Thấm mồ hôi tốt, hút ẩm và làm mát cơ thể. Dệt từ loại xơ, sợi có khả năng ngăn chặn vi khuẩn, nấm, mốc phát triển.', 6),
('APC04', 'Áo Phông Ghi Đậm APC04', 0, 549000, 10, '2021-05-09', 'apc4.jpg', 'Áo Phông mềm mại, thoáng mát, bền màu,giảm nhiệt nhanh, chống co rút, đồng thời vẫn đảm bảo vừa vặn số đo hình thể. Thiết kế lịch sự và chỉn chu. Màu sắc nam tính giúp áo dễ kết hợp với các trang phục khác.', 'BTS', 'AP', 'Ghi đậm', 'Áo là sự kết hợp ưu điểm của cotton, modal tự nhiên mềm mại, thoáng mát, xốp nhẹ và độ bền chắc, màu sắc sắc nét của sợi Polyester. Áo co giãn thoải mái nhờ sợi spandex.', 25),
('APC05', 'Áo Phông Trắng APC05', 0, 399000, 10, '2021-05-09', 'apc5.jpg', 'Áo phông mềm mại, thoáng mát, bền màu,giảm nhiệt nhanh, chống co rút, đồng thời vẫn đảm bảo vừa vặn số đo hình thể. Thiết kế lịch sự và chỉn chu. Màu sắc nam tính giúp áo dễ kết hợp với các trang phục khác.', 'ELN', 'AP', 'Trắng', 'Chất liệu co dãn, đàn hồi thoải mái khi vận động. Thấm mồ hôi tốt, hút ẩm và làm mát cơ thể. Dệt từ loại xơ, sợi có khả năng ngăn chặn vi khuẩn, nấm, mốc phát triển.', 2),
('APC06', 'Áo Phông Xanh APC06', 0, 250000, 10, '2021-05-11', 'apc6.jpg', 'Áo phông mềm mại, thoáng mát, bền màu,giảm nhiệt nhanh, chống co rút, đồng thời vẫn đảm bảo vừa vặn số đo hình thể. Thiết kế lịch sự và chỉn chu. Màu sắc nam tính giúp áo dễ kết hợp với các trang phục khác.', 'ELN', 'AP', 'Xanh', 'Chất liệu co dãn, đàn hồi thoải mái khi vận động. Thấm mồ hôi tốt, hút ẩm và làm mát cơ thể. Dệt từ loại xơ, sợi có khả năng ngăn chặn vi khuẩn, nấm, mốc phát triển.', 17),
('ASM01', 'Áo sơ mi trắng ASM01', 0, 709000, 10, '2021-04-01', 'ASM01.jpg', '- Áo sơ mi cộc tay kiểu dáng Slim Fit ôm gọn gàng cơ thể và tôn dáng người mặc. Thiết kế cơ bản với cổ đứng gọn gàng. Kết hợp tà lượn thời trang giúp áo dễ dàng kết hợp với nhiều loại trang phục khác nhau.', 'BTS', 'ASM', 'Trắng', 'Chất liệu Bamboo từ sợi tre thiên nhiên có khả năng kháng khuẩn, kháng tia UV, bề mặt mềm mại, thoáng mát, thích hợp mặc mọi mùa trong năm.- Kết hợp sợi Polyspun giúp áo giữ phom dáng tốt, hạn chế nhăn co, dễ chăm sóc và bền màu sau thời gian dài sử dụng kết hợp chất liệu cotton hút ẩm, thấm mồ hôi dễ giặt ủi.', 2),
('ASM02', 'Áo sơ mi trắng ASM02', 0, 709000, 10, '2021-04-01', 'ASM02.jpg', '- Áo sơ mi cộc tay kiểu dáng Slim Fit ôm gọn gàng cơ thể và tôn dáng người mặc.- Thiết kế cơ bản với cổ đứng gọn gàng. Kết hợp tà lượn thời trang giúp áo dễ dàng kết hợp với nhiều loại trang phục khác nhau.', 'ELN', 'ASM', 'Trắng', 'Chất liệu Bamboo từ sợi tre thiên nhiên có khả năng kháng khuẩn, kháng tia UV, bề mặt mềm mại, thoáng mát, thích hợp mặc mọi mùa trong năm.- Kết hợp sợi Polyspun giúp áo giữ phom dáng tốt, hạn chế nhăn co, dễ chăm sóc và bền màu sau thời gian dài sử dụng kết hợp chất liệu cotton hút ẩm, thấm mồ hôi dễ giặt ủi.', 1),
('ASMGD', 'Áo sơ mi ghi đá ASMGD01', 0, 595000, 10, '2021-05-09', 'ASMGD01.jpg', 'Áo sơ mi dài tay kiểu dáng Slim Fit ôm gọn gàng cơ thể và tôn dáng người mặc.', 'BTS', 'ASM', 'Ghi đá', 'Chất liệu Bamboo từ sợi tre thiên nhiên có khả năng kháng khuẩn, kháng tia UV, bề mặt mềm mại, thoáng mát, thích hợp mặc mọi mùa trong năm.', 0),
('ASMK0', 'Áo sơ mi kẻ ASMK01', 0, 959000, 10, '0000-00-00', 'ASMK01.jpg', 'Áo sơ mi dài tay kiểu dáng Slim Fit ôm gọn gàng cơ thể và tôn dáng người mặc.', 'ELN', 'ASM', 'Ghi đen', 'Chất liệu Bamboo từ sợi tre thiên nhiên có khả năng kháng khuẩn, kháng tia UV, bề mặt mềm mại, thoáng mát, thích hợp mặc mọi mùa trong năm.', 0),
('ASMX0', 'Áo sơ mi xanh ASMX01', 0, 1979000, 10, '2021-04-01', 'ASMX01.jpg', 'Áo sơ mi dài tay kiểu dáng Slim Fit ôm gọn gàng cơ thể và tôn dáng người mặc.', 'BTS', 'ASM', '', 'Chất liệu Bamboo từ sợi tre thiên nhiên có khả năng kháng khuẩn, kháng tia UV, bề mặt mềm mại, thoáng mát, thích hợp mặc mọi mùa trong năm.', 1),
('AVL01', 'Áo Vest Nam AVL01', 0, 2560000, 10, '2021-04-01', 'avl.jpg', 'Áo vest kiểu dáng Slim Fit ôm gọn gàng cơ thể. Thiết kế với 1 khuy, 2 đường xẻ tà, độn vai vừa phải mang đến vẻ lịch lãm truyền thống nhưng vẫn trẻ trung. Đường may áo tỉ mỉ, màu xanh đậm nhã nhặn dễ kết hợp trang phục, mang đến phong cách Smart Casual lịch thiệp và hiện đại cho người mặc.', 'ELN', 'AV', 'Ghi chì', 'Áo Vest được làm từ chất liệu 100% cotton USA với đặc tính mềm mại, thấm hút mồ hôi tốt, mang cảm giác dễ chịu mùa hè, giữ ấm mùa đông và thoải mái trong mọi hoạt động. Sản phẩm chống co rút và vô cùng an toàn cho người sử dụng.', 0),
('AVL02', 'Áo Vest Nam AVL02', 0, 1590000, 10, '2021-04-01', 'avl1.jpg', 'Áo vest kiểu dáng Slim Fit ôm gọn gàng cơ thể. Thiết kế với 1 khuy, 2 đường xẻ tà, độn vai vừa phải mang đến vẻ lịch lãm truyền thống nhưng vẫn trẻ trung. Đường may áo tỉ mỉ, màu xanh đậm nhã nhặn dễ kết hợp trang phục, mang đến phong cách Smart Casual lịch thiệp và hiện đại cho người mặc.', 'BTS', 'AV', 'Xanh', 'Áo Vest được làm từ chất liệu 100% cotton USA với đặc tính mềm mại, thấm hút mồ hôi tốt, mang cảm giác dễ chịu mùa hè, giữ ấm mùa đông và thoải mái trong mọi hoạt động. Sản phẩm chống co rút và vô cùng an toàn cho người sử dụng.', 2),
('AVL03', 'Áo Vest Nam AVL03', 0, 3999000, 10, '2021-04-01', 'avl2.jpg', 'Áo vest kiểu dáng Slim Fit ôm gọn gàng cơ thể. Thiết kế với 1 khuy, 2 đường xẻ tà, độn vai vừa phải mang đến vẻ lịch lãm truyền thống nhưng vẫn trẻ trung. Đường may áo tỉ mỉ, màu xanh đậm nhã nhặn dễ kết hợp trang phục, mang đến phong cách Smart Casual lịch thiệp và hiện đại cho người mặc.', 'BTS', 'AV', 'Ghi', 'Áo Vest được làm từ chất liệu 100% cotton USA với đặc tính mềm mại, thấm hút mồ hôi tốt, mang cảm giác dễ chịu mùa hè, giữ ấm mùa đông và thoải mái trong mọi hoạt động. Sản phẩm chống co rút và vô cùng an toàn cho người sử dụng.', 0),
('AVL04', 'Áo Vest Nam AVL04', 0, 1999000, 10, '2021-04-01', 'avl3.jpg', 'Áo vest kiểu dáng Slim Fit ôm gọn gàng cơ thể. Thiết kế với 1 khuy, 2 đường xẻ tà, độn vai vừa phải mang đến vẻ lịch lãm truyền thống nhưng vẫn trẻ trung. Đường may áo tỉ mỉ, màu xanh đậm nhã nhặn dễ kết hợp trang phục, mang đến phong cách Smart Casual lịch thiệp và hiện đại cho người mặc.', 'BTS', 'AV', 'Ghi', 'Áo Vest được làm từ chất liệu 100% cotton USA với đặc tính mềm mại, thấm hút mồ hôi tốt, mang cảm giác dễ chịu mùa hè, giữ ấm mùa đông và thoải mái trong mọi hoạt động. Sản phẩm chống co rút và vô cùng an toàn cho người sử dụng.', 0),
('AVL05', 'Áo Vest Nam AVL05', 0, 1490000, 10, '2021-01-10', 'avl4.jpg', 'Áo vest kiểu dáng Slim Fit ôm gọn gàng cơ thể. Thiết kế với 1 khuy, 2 đường xẻ tà, độn vai vừa phải mang đến vẻ lịch lãm truyền thống nhưng vẫn trẻ trung. Đường may áo tỉ mỉ, màu xanh đậm nhã nhặn dễ kết hợp trang phục, mang đến phong cách Smart Casual lịch thiệp và hiện đại cho người mặc.', 'ELN', 'AV', 'Xám', 'Áo Vest được làm từ chất liệu 100% cotton USA với đặc tính mềm mại, thấm hút mồ hôi tốt, mang cảm giác dễ chịu mùa hè, giữ ấm mùa đông và thoải mái trong mọi hoạt động. Sản phẩm chống co rút và vô cùng an toàn cho người sử dụng.', 0),
('AVL06', 'Áo Vest Nam AVL06', 0, 1200000, 10, '2021-05-10', 'avs01.jpg', 'Áo vest kiểu dáng Slim Fit ôm gọn gàng cơ thể. Thiết kế với 1 khuy, 2 đường xẻ tà, độn vai vừa phải mang đến vẻ lịch lãm truyền thống nhưng vẫn trẻ trung. Đường may áo tỉ mỉ, màu xanh đậm nhã nhặn dễ kết hợp trang phục, mang đến phong cách Smart Casual lịch thiệp và hiện đại cho người mặc.', 'BTS', 'AV', 'Xám trắng', 'Áo Vest được làm từ chất liệu 100% cotton USA với đặc tính mềm mại, thấm hút mồ hôi tốt, mang cảm giác dễ chịu mùa hè, giữ ấm mùa đông và thoải mái trong mọi hoạt động. Sản phẩm chống co rút và vô cùng an toàn cho người sử dụng.', 0),
('QA01', 'Quần âu QA01', 0, 499000, 20, '2021-04-01', 'qvl.jpg', 'Quần âu form dáng slimfit ôm vừa phải, tôn dáng người mặc. Mềm,ít nhăn,hút ẩm,co giãn và đàn hồi cao Có thể làm mát vào mùa hè và giữ ấm vào mùa đông. Thiết kế chỉn chu với nếp ly vĩnh viễn Supercrease giúp quần luôn đứng dáng, bền vững với giặt ủi, mang đến vẻ lịch lãm. Quần có túi xẻ hai bên, túi khuy cài phía sau tiện lợi. Gấu quần chờ, được may vừa vặn với số đo của từng khách hàng.', 'BTS', 'QA', 'Tím than', '50%WOOL-50%POLY. Chất liệu vải Tuytsi với bề mặt mềm, mịn, ít co giãn đem lại cảm giác thoải mái cho người mặc đồng thời định hình form dáng tốt. Kết hợp chất liệu Rayon giúp vải bền đẹp và giữ độ bền màu theo thời gian. Quần có độ co giãn nhất định nhờ sợi Spandex.', 1),
('QA02', 'Quần âu QA02', 0, 799000, 10, '2021-04-01', 'qvl1.jpg', 'Quần âu form dáng slimfit ôm vừa phải, tôn dáng người mặc. Mềm,ít nhăn,hút ẩm,co giãn và đàn hồi cao Có thể làm mát vào mùa hè và giữ ấm vào mùa đông. Thiết kế chỉn chu với nếp ly vĩnh viễn Supercrease giúp quần luôn đứng dáng, bền vững với giặt ủi, mang đến vẻ lịch lãm. Quần có túi xẻ hai bên, túi khuy cài phía sau tiện lợi. Gấu quần chờ, được may vừa vặn với số đo của từng khách hàng.', 'ELN', 'QA', 'Xanh đậm', '50%WOOL-50%POLY. Chất liệu vải Tuytsi với bề mặt mềm, mịn, ít co giãn đem lại cảm giác thoải mái cho người mặc đồng thời định hình form dáng tốt. Kết hợp chất liệu Rayon giúp vải bền đẹp và giữ độ bền màu theo thời gian. Quần có độ co giãn nhất định nhờ sợi Spandex.', 1),
('QA03', 'Quần âu QA03', 0, 689000, 10, '2021-04-01', 'qvl2.jpg', 'Quần âu form dáng slimfit ôm vừa phải, tôn dáng người mặc. Mềm,ít nhăn,hút ẩm,co giãn và đàn hồi cao Có thể làm mát vào mùa hè và giữ ấm vào mùa đông. Thiết kế chỉn chu với nếp ly vĩnh viễn Supercrease giúp quần luôn đứng dáng, bền vững với giặt ủi, mang đến vẻ lịch lãm. Quần có túi xẻ hai bên, túi khuy cài phía sau tiện lợi. Gấu quần chờ, được may vừa vặn với số đo của từng khách hàng.', 'ELN', 'QA', 'Tím than', '50%WOOL-50%POLY. Chất liệu vải Tuytsi với bề mặt mềm, mịn, ít co giãn đem lại cảm giác thoải mái cho người mặc đồng thời định hình form dáng tốt. Kết hợp chất liệu Rayon giúp vải bền đẹp và giữ độ bền màu theo thời gian. Quần có độ co giãn nhất định nhờ sợi Spandex.', 0),
('QA04', 'Quần âu QA04', 5000000, 5789000, 2, '2021-04-01', 'qvl3.jpg', 'Quần âu form dáng slimfit ôm vừa phải, tôn dáng người mặc. Mềm,ít nhăn,hút ẩm,co giãn và đàn hồi cao Có thể làm mát vào mùa hè và giữ ấm vào mùa đông. Thiết kế chỉn chu với nếp ly vĩnh viễn Supercrease giúp quần luôn đứng dáng, bền vững với giặt ủi, mang đến vẻ lịch lãm. Quần có túi xẻ hai bên, túi khuy cài phía sau tiện lợi. Gấu quần chờ, được may vừa vặn với số đo của từng khách hàng.', 'ELN', 'QA', 'Đen', '50%WOOL-50%POLY. Chất liệu vải Tuytsi với bề mặt mềm, mịn, ít co giãn đem lại cảm giác thoải mái cho người mặc đồng thời định hình form dáng tốt. Kết hợp chất liệu Rayon giúp vải bền đẹp và giữ độ bền màu theo thời gian. Quần có độ co giãn nhất định nhờ sợi Spandex.', 1),
('QA05', 'Quần âu QA04', 700000, 749000, 10, '2021-05-09', 'qvl4.jpg', 'Quần âu form dáng slimfit ôm vừa phải, tôn dáng người mặc. Mềm,ít nhăn,hút ẩm,co giãn và đàn hồi cao Có thể làm mát vào mùa hè và giữ ấm vào mùa đông. Thiết kế chỉn chu với nếp ly vĩnh viễn Supercrease giúp quần luôn đứng dáng, bền vững với giặt ủi, mang đến vẻ lịch lãm. Quần có túi xẻ hai bên, túi khuy cài phía sau tiện lợi. Gấu quần chờ, được may vừa vặn với số đo của từng khách hàng.', 'BTS', 'QA', 'Nâu nhạt', '0%WOOL-50%POLY. Chất liệu vải Tuytsi với bề mặt mềm, mịn, ít co giãn đem lại cảm giác thoải mái cho người mặc đồng thời định hình form dáng tốt. Kết hợp chất liệu Rayon giúp vải bền đẹp và giữ độ bền màu theo thời gian. Quần có độ co giãn nhất định nhờ sợi Spandex.	', 2),
('QA06', 'Quần Âu QA06', 0, 849000, 10, '2021-05-09', 'qvl5.jpg', 'Quần âu form dáng slimfit ôm vừa phải, tôn dáng người mặc. Mềm,ít nhăn,hút ẩm,co giãn và đàn hồi cao Có thể làm mát vào mùa hè và giữ ấm vào mùa đông. Thiết kế chỉn chu với nếp ly vĩnh viễn Supercrease giúp quần luôn đứng dáng, bền vững với giặt ủi, mang đến vẻ lịch lãm. Quần có túi xẻ hai bên, túi khuy cài phía sau tiện lợi. Gấu quần chờ, được may vừa vặn với số đo của từng khách hàng.', 'BTS', 'QA', 'Xanh nhạt', '0%WOOL-50%POLY. Chất liệu vải Tuytsi với bề mặt mềm, mịn, ít co giãn đem lại cảm giác thoải mái cho người mặc đồng thời định hình form dáng tốt. Kết hợp chất liệu Rayon giúp vải bền đẹp và giữ độ bền màu theo thời gian. Quần có độ co giãn nhất định nhờ sợi Spandex.	', 0),
('QSD01', 'Quần Sooc Trắng QSD01', 500000, 599000, 10, '2021-08-01', 'qsd.jpg', 'Quần short Khaki phom dáng Regular Fit vừa vặn, suông nhẹ, thoải mái. Thiết kế trẻ trung, dễ kết hợp với các trang phục khác nhau; đường may tỉ mỉ mang đến vẻ thanh lịch, đồng thời vẫn đảm bảo tính năng động và tiện lợi nhờ túi xẻ 2 bên và túi sau.', 'BTS', 'QS', 'Trắng', 'Chất liệu cotton 100% cao cấp có bề mặt xốp nhẹ, thoáng mát. Vải cotton thấm hút mồ hôi tốt, dễ chịu khi tiếp xúc với da, không gây kích ứng, giải pháp hữu hiệu cho những ngày hè nóng bức.', 1),
('QSD02', 'Quần Sooc Nâu QSD02', 0, 766000, 10, '2021-05-11', 'qsd1.jpg', 'Quần short Khaki phom dáng Regular Fit vừa vặn, suông nhẹ, thoải mái. Thiết kế trẻ trung, dễ kết hợp với các trang phục khác nhau; đường may tỉ mỉ mang đến vẻ thanh lịch, đồng thời vẫn đảm bảo tính năng động và tiện lợi nhờ túi xẻ 2 bên và túi sau.', 'BTS', 'QS', 'Nâu nhạt', 'Chất liệu cotton 100% cao cấp có bề mặt xốp nhẹ, thoáng mát. Vải cotton thấm hút mồ hôi tốt, dễ chịu khi tiếp xúc với da, không gây kích ứng, giải pháp hữu hiệu cho những ngày hè nóng bức.', 2),
('QSD03', 'Quần Sooc Nâu QSD03', 0, 879000, 10, '2021-04-01', 'qsd2.jpg', 'Quần short Khaki phom dáng Regular Fit vừa vặn, suông nhẹ, thoải mái. Thiết kế trẻ trung, dễ kết hợp với các trang phục khác nhau; đường may tỉ mỉ mang đến vẻ thanh lịch, đồng thời vẫn đảm bảo tính năng động và tiện lợi nhờ túi xẻ 2 bên và túi sau.', 'ELN', 'QS', 'Be', 'Chất liệu cotton 100% cao cấp có bề mặt xốp nhẹ, thoáng mát. Vải cotton thấm hút mồ hôi tốt, dễ chịu khi tiếp xúc với da, không gây kích ứng, giải pháp hữu hiệu cho những ngày hè nóng bức.', 0),
('QSD04', 'Quần Sooc Nâu QSD04', 0, 150000, 10, '2021-05-11', 'qsd3.jpg', 'Quần short Khaki phom dáng Regular Fit vừa vặn, suông nhẹ, thoải mái. Thiết kế trẻ trung, dễ kết hợp với các trang phục khác nhau; đường may tỉ mỉ mang đến vẻ thanh lịch, đồng thời vẫn đảm bảo tính năng động và tiện lợi nhờ túi xẻ 2 bên và túi sau.', 'ELN', 'QS', 'Ghi nhạt', 'Chất liệu cotton 100% cao cấp có bề mặt xốp nhẹ, thoáng mát. Vải cotton thấm hút mồ hôi tốt, dễ chịu khi tiếp xúc với da, không gây kích ứng, giải pháp hữu hiệu cho những ngày hè nóng bức.', 1),
('QSD05', 'Quần Sooc Đen QSD05', 0, 349000, 10, '2021-04-05', 'qsd4.jpg', 'Quần short Khaki phom dáng Regular Fit vừa vặn, suông nhẹ, thoải mái. Thiết kế trẻ trung, dễ kết hợp với các trang phục khác nhau; đường may tỉ mỉ mang đến vẻ thanh lịch, đồng thời vẫn đảm bảo tính năng động và tiện lợi nhờ túi xẻ 2 bên và túi sau.', 'ELN', 'QS', 'Đen', 'Chất liệu cotton 100% cao cấp có bề mặt xốp nhẹ, thoáng mát. Vải cotton thấm hút mồ hôi tốt, dễ chịu khi tiếp xúc với da, không gây kích ứng, giải pháp hữu hiệu cho những ngày hè nóng bức.', 0),
('QSD06', 'Quần Sooc Xanh QSD06', 0, 449000, 10, '2021-03-03', 'qsd5.jpg', 'Quần short Khaki phom dáng Regular Fit vừa vặn, suông nhẹ, thoải mái. Thiết kế trẻ trung, dễ kết hợp với các trang phục khác nhau; đường may tỉ mỉ mang đến vẻ thanh lịch, đồng thời vẫn đảm bảo tính năng động và tiện lợi nhờ túi xẻ 2 bên và túi sau.', 'BTS', 'QS', 'Xanh', 'Chất liệu cotton 100% cao cấp có bề mặt xốp nhẹ, thoáng mát. Vải cotton thấm hút mồ hôi tốt, dễ chịu khi tiếp xúc với da, không gây kích ứng, giải pháp hữu hiệu cho những ngày hè nóng bức.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MATIN` char(5) NOT NULL,
  `TIEUDE` text NOT NULL,
  `ANH` varchar(100) NOT NULL,
  `NOIDUNG` text NOT NULL,
  `NGAYDANG` date NOT NULL,
  `NDNGAN` text NOT NULL,
  `LOAITIN` text NOT NULL,
  `TIEUDE2` text NOT NULL,
  `ND2` text NOT NULL,
  `ANH2` text NOT NULL,
  `TIEUDE3` text NOT NULL,
  `ND3` text NOT NULL,
  `ANH3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`MATIN`, `TIEUDE`, `ANH`, `NOIDUNG`, `NGAYDANG`, `NDNGAN`, `LOAITIN`, `TIEUDE2`, `ND2`, `ANH2`, `TIEUDE3`, `ND3`, `ANH3`) VALUES
('T01', 'BẠN CÓ BIẾT TRANG PHỤC CŨNG LÀ YẾU TỐ ẢNH HƯỞNG ĐẾN BUỔI PHỎNG VẤN', 'new1.jpg', 'Đã có lần nào bạn bị đánh giá thấp trong buổi phỏng vấn chỉ vì phong cách thời trang của mình không?\r\n\r\nCó lần nào sau buổi phỏng vấn bạn chợt nhận ra bản thân mình phạm lỗi nghiêm trọng từ cách chọn trang phục không?\r\n\r\nHay trước giờ bạn vẫn  nghĩ đi phỏng vấn thì mặc gì chẳng được, quan trọng là năng lực thôi?\r\n\r\nVậy thì các chàng hãy thay đổi ngay suy nghĩ nhé bởi việc chọn cho mình bộ trang phục chỉn chu là điều cực kỳ quan trọng đó.', '2021-05-05', 'Việc lựa chọn trang phục khi đi phỏng vấn rất quan trọng, có thể quyết định tới kết quả của buổi phỏng vấn. Hãy cùng Phan Nguyễn mix & match, lựa chọn trang phục phù hợp cho những sự kiện quan trọng.', 'TIN HOT', 'Tại sao phải chú ý đến trang phục khi đi phỏng vấn?', '- Ánh nhìn thiện cảm của nhà tuyển dụng\r\n\r\n- Rút ngắn khoảng cách ngay từ lần gặp mặt đầu tiên \r\n\r\n- Tự tin hơn khi mình chỉnh chu ngay từ vẻ ngoài', 'T01-Anh2.jpg', 'Vậy phái mạnh nên mặc gì để thành trong buổi phỏng vấn ? ', 'Lựa chọn các bộ vest với gam màu trung tính như xanh navy, màu be, màu ghi xám chính là phương thức rút ngắn khoảng cách trong lần đầu gặp mặt. \r\n\r\nKhi khoác lên mình bộ vest công sở là bạn đang thể hiện phong cách đĩnh đạc, nghiêm túc của mình đối với công ty, cũng đang ngầm thể hiện cho nhà tuyển dụng biết bạn đang quý trọng cơ hội của mình trong buổi phỏng vấn.\r\n\r\nVest công sở Phan Nguyễn chính là người bạn đồng hành cùng các chàng trai trong từng bước đi đến với thành công.\r\n\r\nĐi phỏng vấn ứng tuyển để tìm được công việc phù hợp với đam mê và sở trường của mình là điều cực kỳ quan trọng với tất cả mọi người đặc biệt là đấng mày râu. Đừng để cơ hội của mình trôi đi chỉ vì bị nhà tuyển dụng đánh giá lỗi trang phục. \r\n\r\nCùng khám phá xem nếu bạn chọn cho mình trang phục nghiêm túc thì sẽ mang lại những ưu thế gì và nên mặc gì để làm nên sự thành công cho buổi phỏng vấn nhé!\r\n\r\n', 'T01-Anh3.jpg'),
('T02', 'QUẦN SHORT LINEN NAM ĐẸP, BỀN, HÚT ẨM TỐT |THỜI TRANG NAM', 'new2.jpg', 'Quần short linen nam được cánh mày râu yêu thích bởi màu sắc nhã nhặn, chất liệu thoáng mát và cảm giác thoải mái khi mặc. Cùng với sự năng động, trẻ trung, các mẫu quần short vải linen còn dễ kết hợp trang phục. Một chiếc quần short gam màu màu sắc trung tính của phối với áo thun, áo sơ mi nam ngắn tay hoặc áo Polo sẽ giúp người mặc trở nên tươi trẻ, ngoài phóng khoáng và thời thượng.', '2021-05-11', 'Quần short linen nam được cánh mày râu yêu thích bởi màu sắc nhã nhặn, chất liệu thoáng mát và cảm giác thoải mái khi mặc. Cùng với sự năng động, trẻ trung, các mẫu quần short vải linen còn dễ kết hợp trang phục. Một chiếc quần short gam màu màu sắc trung tính phối với áo thun, áo sơ mi nam ngắn tay hoặc áo Polo sẽ giúp người mặc trở nên tươi trẻ, ngoài phóng khoáng và thời thượng.', 'TIN HOT', 'Ưu điểm quần short chất liệu vải linen', 'Vải linen hay còn được gọi là là vải lanh hoặc vải đũi. Linen là một trong những chất liệu có lịch sử tồn tại lâu đời nhất trên thế giới. Nguyên liệu chính để dệt nên Linen là gốc và rể của cây lanh.\r\n\r\nƯu điểm của loại vải này là nhẹ, mềm mại và bóng mượt. Đặc biệt, chất liệu này có khả năng thấm hút mồ hôi tốt, hút ẩm nhanh, bền chắc, thoáng mát. Ngoài ra, linen cũng là loại vải chịu nhiệt, chịu nắng tốt, có thể mặc thoải mái ở ngoài trời. Độ giữ ẩm tiêu chuẩn của chất vải linene là 10-12%, do đó, vải hút và nhả nước khá nhanh.\r\n\r\nNhờ các ưu điểm của vải linen mà quần short làm từ chất liệu này rất thoáng mát. Siêu hút mồ môi, chống nắng và rất dễ chịu khi mặc. Vải được dệt chắc chắn nên sợ vải bền bỉ, có thể giặt tay và giặt máy thoải mái. Mỗi lần ướt nước và phơi khô, quần short vải line lại như mới. Do đặc tính đặc trưng của sợi linen mà quần short có độ nhăn tự nhiên. Cũng chính đặc điểm này đã tạo nên sự phong trần, cá tính cho người mặc.', '', 'Quần short linen nam đẹp chuẩn phong cách', 'Từ lâu, các mẫu quần short nam đã được cánh mày râu ưu tiên lựa chọn nhờ tính ứng dụng cao. Mặc thoải mái, thoáng mát, dễ kết hợp trang phục và tạp phong cách trẻ trung, năng động. Đón đầu xu hướng đó, Phan Nguyễn đã thiết kế và sản xuất các mẫu quần short vải linen đẹp dành riêng cho nam giới.\r\n\r\nThiết kế quần tinh tế, hiện đại, kiểu dáng slinfit tôn dáng và giúp đôi chân trở nên thon gọn hơn. Hai bên hông quần có túi xẻ 2 bên, mặt sau quần có túi cài sau tiện lợi. Lưng quần có thiết kế dây thắt cực kỳ tinh tế. Bên cạnh thiết kế đẹp, quần còn có form dáng chuẩn, ống quần đứng dáng và có độ ôm vừa phải giúp người mặc che khuyết điểm và tôn dáng. Kiểu dáng slimfit ôm gọn cơ thể nhưng lkhông quá chật, tạo tính thẩm mỹ và sự thoải mái cho người mặc.', ''),
('T03', 'CHÌA KHÓA CHO PHÁI MẠNH MỘT MÙA HÈ NĂNG ĐỘNG', 'new3.jpg', 'Trong bộ sưu tập Hè, Shop mang đến cho các tín đồ yêu thời trang chất liệu micro modal - một chất liệu mới đem lại cảm giác thoáng, mịn, đầm tay nhưng không kém phần nhẹ nhàng.\r\n\r\nNhững chiếc áo phông với họa tiết in, kẻ sọc với gam màu mát mẻ sẽ là lựa chọn không thể thiếu trong tủ đồ của cánh mày râu. Bên cạnh đó, bạn cũng có thể chọn cho mình một chiếc áo phông trơn đơn giản hay những chiếc sơ mi cộc tay mang đầy màu sắc nhiệt đới mới lạ trong bộ sưu tập này. \r\n\r\nSự kết hợp giữa các họa tiết bắt mắt của thời trang nam và những chiếc quần sooc mát mẻ sẽ đem đến một vẻ ngoài nam tính dành cho các chàng trai.', '2021-05-08', 'Trong bộ sưu tập Hè, Shop mang đến cho các tín đồ yêu thời trang chất liệu micro modal - một chất liệu mới đem lại cảm giác thoáng, mịn, đầm tay nhưng không kém phần nhẹ nhàng.', 'TIN HOT', 'Key word cho những set đồ mùa hè chính là: Thoải mái, đơn giản và nổi bật', ' Shop sẽ mang đến cho các tín đồ yêu thời trang chất liệu micro modal - Một chất liệu mới vô cùng đặc biệt trong mùa hè này', 'T03-anh2.jpg', 'Quần sooc kết hợp với áo phông chất liệu cotton sẽ đem đến cảm giác thoải mái hơn trong những ngày hè', 'Áo phông trơn một màu kết hợp với quần sooc cũng là một lựa chọn không tồi cho mùa hè nóng nực..\r\nMùa hè là dịp mà các chàng trai  có cơ hội trải nghiệm những set đồ sắc màu năng động.\r\nNhững chiếc áo phông với họa tiết in nhiều màu sắc cùng chất liệu thoáng mát sẽ là lựa chọn không thể thiếu trong tủ đồ của cánh mày râu', 'T03-anh3.jpg'),
('T04', 'SHOP TUYỂN DỤNG CỬA HÀNG TRƯỞNG', 'newtuyendung1.jpg', 'Để đáp ứng nhu cầu ngày càng phát triển, Shop đang cần tuyển dụng vị trí nhân viên cửa hàng trưởng với những yêu cầu dưới đây...', '2021-05-12', 'Để đáp ứng nhu cầu ngày càng phát triển, Shop đang cần tuyển dụng vị trí nhân viên cửa hàng trưởng với những yêu cầu dưới đây...', 'TIN TUYỂN DỤNG', 'Để đáp ứng nhu cầu ngày càng phát triển, Công ty Cổ phần Thời trang Phan Nguyễn đang cần tuyển dụng vị trí nhân viên cửa hàng trưởng với những yêu cầu dưới đây:', '', 'T04-anh2.jpg', 'Hình Thức Nộp Hồ Sơ:', '- Nộp hồ sơ trực tiếp tại: Trụ sở : 322/95/12 Nhân Mỹ - Mỹ Đình - Hà Nội (Chấp nhận hồ sơ photo) hoặc gửi CV qua email: tuyendung.laibien@gmail.com\r\n\r\n- Người liên hệ: Phòng Nhân sự – 0352.170.829 (liên lạc trong giờ hành chính).\r\n\r\n', 'T04-anh2.jpg'),
('T05', 'SHOP TUYỂN DỤNG NHÂN VIÊN CONTENT MARKETING', 'newtuyendung2.jpg', 'Để đáp ứng nhu cầu ngày càng phát triển, Shop đang cần tuyển dụng vị trí nhân viên Content Marketing với những yêu cầu dưới đây:', '2021-05-07', 'Để đáp ứng nhu cầu ngày càng phát triển, Shop đang cần tuyển dụng vị trí nhân viên Content Marketing với những yêu cầu dưới đây:', 'TIN TUYỂN DỤNG', 'Để đáp ứng nhu cầu ngày càng phát triển, Shop cần tuyển dụng vị trí nhân viên Content Marketing với những yêu cầu dưới đây:', '', 'T05-anh2.jpg', 'Hình Thức Nộp Hồ Sơ:', '- Nộp hồ sơ trực tiếp tại: Trụ sở  -  Số 322 Mỹ Đình Hà Nội (Chấp nhận hồ sơ photo) hoặc gửi CV qua email: tuyendung.laivanbien@gmail.com\r\n\r\n- Người liên hệ: Phòng Nhân sự – 0352.170.829 (liên lạc trong giờ hành chính).', ''),
('T06', 'SHOP TUYỂN DỤNG NHÂN VIÊN SALE ONLINE', 'newtuyendung3.jpg', 'Để đáp ứng nhu cầu ngày càng phát triển, Shop đang cần tuyển dụng vị trí nhân viên sales online với những yêu cầu dưới đây:', '2021-05-01', 'Để đáp ứng nhu cầu ngày càng phát triển, Shop đang cần tuyển dụng vị trí nhân viên sales online với những yêu cầu dưới đây:', 'TIN TUYỂN DỤNG', 'Để đáp ứng nhu cầu ngày càng phát triển, Shop đang cần tuyển dụng vị trí nhân viên sales online với những yêu cầu dưới đây:', '', 'T06-anh2.jpg', 'Thời hạn nộp hồ sơ: 30/06/2020  .Hình Thức Nộp Hồ Sơ:', '- Nộp hồ sơ trực tiếp tại: Trụ sở - Số 322 Mỹ Đình Hà Nội (Chấp nhận hồ sơ photo) hoặc gửi CV qua email: tuyendung.laivanbien@gmail.com - Người liên hệ: Phòng Nhân sự – 0352.170.829 (liên lạc trong giờ hành chính).', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `level`) VALUES
(1, 'quanly', '123', 'vuminhtoan2001@gmail.com', 1),
(2, 'admin', 'admin', 'vuminhtoan2002@gmail.com', 1),
(7, 'user', '123', 'vuminhtoan2003@gmail.com', 0),
(20, 'thaolinh', '1234', 'thaolinh@gmail.com', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MABL`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`MAHANGSX`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MALOAI`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MAHANGSX` (`MAHANGSX`),
  ADD KEY `MALOAI` (`MALOAI`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MATIN`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `oderdetail`
--
ALTER TABLE `oderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1979027;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `bl_sp` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sp_hangsx` FOREIGN KEY (`MAHANGSX`) REFERENCES `hangsx` (`MAHANGSX`),
  ADD CONSTRAINT `sp_loaisp` FOREIGN KEY (`MALOAI`) REFERENCES `loaisp` (`MALOAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
