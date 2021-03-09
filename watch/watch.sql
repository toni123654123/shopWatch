-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 27, 2021 lúc 08:03 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `watch`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `adUser` varchar(255) NOT NULL,
  `adPass` varchar(255) NOT NULL,
  `adName` varchar(255) NOT NULL,
  `adPhone` varchar(30) NOT NULL,
  `adEmail` varchar(150) NOT NULL,
  `adRole` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `adUser`, `adPass`, `adName`, `adPhone`, `adEmail`, `adRole`) VALUES
(1, 'tungadmin', 'dHVuZ3BlbzEyMw==', 'tung', '0123456789', 'tung99@gmail.com', 0),
(2, 'toanadmin', 'MTIzNDU2Nzg5', 'Toan', '0123456789', 'toan@gmail.com', 1),
(3, 'vanadmin', 'YWRtaW5ANzg1MA==', 'van', '0123456789', 'van@gmail.com', 2),
(4, 'test1111', 'MTIzNDU2Nzg5', 'test', '0123456789', 'test@gmail.com', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(2, 'Hublot'),
(3, 'Rolex'),
(4, 'Omega'),
(5, 'Casio');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `orderName` varchar(255) NOT NULL,
  `orderPhone` varchar(255) NOT NULL,
  `orderShip` varchar(255) NOT NULL,
  `orderEmail` varchar(255) NOT NULL,
  `orderTotal` varchar(255) NOT NULL,
  `orderStatus` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `orderName`, `orderPhone`, `orderShip`, `orderEmail`, `orderTotal`, `orderStatus`) VALUES
(1, 'Nguyễn Quang Tùng', '0123465789', 'Thanh Trì, Hà Nội', 'nguyenvana@gmail.com', '16500', 2),
(2, 'Nguyễn Văn Toan', '0123465789', 'Hải Phòng', 'nguyenvan123@gmail.com', '15000', 1),
(3, 'Nguyễn Văn B', '0123456798', 'Hà nội', 'nguyenvvv@gmail.com', '15500', 2),
(4, 'Nguyễn AAAA', '0123465789', 'Hà Nội', 'tung@gmail.com', '15000', 2),
(5, 'Nguyễn 78956', '0123456879', 'Hà Nọi', 'uyiu@gmail.com', '500', 2),
(6, 'Nguyễn Văn Tùng', '0132465789', 'Hoàng Mai, Hà Nội', 'tungvv@gmail.com', '55800', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `ordetail_Name` varchar(255) NOT NULL,
  `ordetail_Image` varchar(255) NOT NULL,
  `ordetail_Price` varchar(255) NOT NULL,
  `ordetail_Qty` varchar(255) NOT NULL,
  `ordetail_Total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`detail_id`, `order_id`, `proId`, `ordetail_Name`, `ordetail_Image`, `ordetail_Price`, `ordetail_Qty`, `ordetail_Total`) VALUES
(3, 1, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(4, 1, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(5, 1, 1, 'Hublot Classic Fusion Black Magic', 'popular6.png', '1000', '1', '1000'),
(6, 2, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(7, 3, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(8, 3, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(9, 4, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(10, 5, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(11, 6, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '2', '30000'),
(12, 6, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(13, 6, 1, 'Hublot Classic Fusion Black Magic', 'popular6.png', '1000', '1', '1000'),
(14, 6, 4, 'Jacques Lemans ', 'popular4.png', '300', '1', '300'),
(15, 6, 6, 'HUBLOT CLASSIC FUSION TITANIUM', 'popular3.png', '24000', '1', '24000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `proId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proImage` varchar(255) NOT NULL,
  `proDetail` varchar(255) NOT NULL,
  `proPrice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`proId`, `catId`, `proName`, `proImage`, `proDetail`, `proPrice`) VALUES
(1, 2, 'Hublot Classic Fusion Black Magic', 'popular6.png', '<p>&rsaquo; M&atilde; sản phẩm: 328245<br />\r\n&rsaquo; Nhập h&agrave;ng 4-8 tuần<br />\r\n&rsaquo; Miễn ph&iacute; vận chuyển<br />\r\n&rsaquo; Bảo h&agrave;nh 2 năm<br />\r\n&rsaquo; Gọi (028) 3929 3939 hoặc (024) 3936 3939 để đặt h&agrave;ng</p>\r\n', '1000'),
(2, 3, 'Rolex Cosmograph Daytona', 'popular1.png', '<p>M&atilde; SP&nbsp;116595RBOWDP</p>\r\n\r\n<p>Xuất xứ&nbsp;Thụy Sỹ</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Loại m&aacute;y&nbsp;Caliber Rolex 4130 - Trữ c&oacute;t 72 giờ</p>\r\n\r\n<p>K&iacute;ch cỡ mặt số&nbsp;40mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;12.63mm</', '15000'),
(3, 4, 'Atlantic Swiss ', 'popular2.png', '<p>H&atilde;ng sản xuất:&nbsp;Atlantic</p>\r\n\r\n<p>Kiểu d&aacute;ng:&nbsp;Đồng hồ nam</p>\r\n\r\n<p>Chất liệu d&acirc;y:&nbsp;d&acirc;y da</p>\r\n\r\n<p>Chất liệu mặt:&nbsp;&nbsp;Sapphire ( K&iacute;nh chống trầy )</p>\r\n\r\n<p>Chất liệu vỏ :&nbsp;Th&eacute;p kh&ocirc', '500'),
(4, 5, 'Jacques Lemans ', 'popular4.png', '<p>Đường k&iacute;nh mặt</p>\r\n\r\n<p><a href=\"javascript://\">40 mm</a></p>\r\n\r\n<p>Chống nước</p>\r\n\r\n<p><a href=\"javascript://\">10 ATM</a></p>\r\n\r\n<p>Chất liệu mặt</p>\r\n\r\n<p>Krysterna crystal ( k&iacute;nh cứng )</p>\r\n\r\n<p>Năng lượng sử dụng</p>\r\n\r\n<p>Quartz/P', '300'),
(6, 2, 'HUBLOT CLASSIC FUSION TITANIUM', 'popular3.png', '<p>M&atilde; sản phẩm: 542.nx.9010.lr.1704</p>\r\n\r\n<p>Thương hiệu: Hublot</p>\r\n\r\n<p>Xuất xứ:&nbsp;Thụy Sĩ</p>\r\n\r\n<p>D&ograve;ng: Classic Fusion</p>\r\n\r\n<p>K&iacute;nh: Sapphire</p>\r\n\r\n<p>K&iacute;ch thước: 42 mm&nbsp;</p>\r\n\r\n<p>Bộ m&aacute;y: Automatic -&am', '24000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userid`, `user`, `password`, `fullname`, `phone`, `email`, `address`) VALUES
(1, 'tung161099', 'dHVuZ3BlbzEyMw==', 'Nguyễn Quang Tùng', '0123465789', 'nguyenvana@gmail.com', 'Hà Nội'),
(2, 'tung999', 'MTIzNDU2Nzg5', 'Nguyễn Văn B', '0123456798', 'nguyenvvv@gmail.com', 'Hà Nội');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `proId` (`proId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proId`),
  ADD KEY `catId` (`catId`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `proId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`proId`) REFERENCES `product` (`proId`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
