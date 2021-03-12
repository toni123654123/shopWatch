-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 12, 2021 lúc 07:39 AM
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
(8, 'admin', 'MTIzNDU2Nzg5', 'Admin', '0157465465465', 'tunasdfa@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `image`, `content`, `author`, `time`) VALUES
(1, 'Google inks pact for new 35-storey office', 'single_blog_1.png', '<p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower</p>', 'Tung Nguyen', '03/12 06:58'),
(2, 'Second divided from form fish beast made every of seas all gathered us saying he our', 'single_blog_2.png', '<p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower</p>', 'Tuan Nguyen', '03/12 07:00'),
(7, 'Đồng hồ xin của nước Anh', 'single_blog_4.png', '<p>&nbsp;</p>\r\n\r\n<p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has ', 'Tung nguyen', '03/12 07:20'),
(8, 'Đồng hồ 2021 có giá giảm mạnh trên thị trường do Covid', 'single_blog_3.png', '<p>&lt;p&gt;MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the will', 'Tung Nguyen', '03/12 07:20'),
(9, 'Trên thế giới vướng phải Covid, khiến những thương hiệu đồng hồ bị giảm sút ', 'single_blog_5.png', '<p>&lt;p&gt;MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the will', 'Tung Nguyen', '03/12 07:21');

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
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `cmt_name` varchar(255) NOT NULL,
  `cmt_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmt_id`, `userid`, `proId`, `cmt_name`, `cmt_text`) VALUES
(1, 1, 2, 'tung161099', 'Sản phẩm chất lượng. Nhớ mua nhé ae'),
(3, 1, 3, 'tung161099', 'Đồng hồ rẻ chất lượng cao'),
(5, 2, 1, 'tung999', 'asfdasfdasdf'),
(6, 2, 3, 'tung999', 'asdfasdfasdfasdf'),
(8, 3, 2, 'Nguyen van b', 'dasdasdasd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderName` varchar(255) NOT NULL,
  `orderPhone` varchar(255) NOT NULL,
  `orderShip` varchar(255) NOT NULL,
  `orderEmail` varchar(255) NOT NULL,
  `orderTotal` varchar(255) NOT NULL,
  `Payments` int(11) NOT NULL,
  `orderStatus` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `userid`, `orderName`, `orderPhone`, `orderShip`, `orderEmail`, `orderTotal`, `Payments`, `orderStatus`) VALUES
(1, 1, 'Nguyễn Quang Tùng', '0123465789', 'Thanh Trì, Hà Nội', 'nguyenvana@gmail.com', '16500', 0, 2),
(2, 2, 'Nguyễn Văn Toan', '0123465789', 'Hải Phòng', 'nguyenvan123@gmail.com', '15000', 1, 1),
(3, 2, 'Nguyễn Văn B', '0123456798', 'Hà nội', 'nguyenvvv@gmail.com', '15500', 0, -1),
(4, 1, 'Nguyễn AAAA', '0123465789', 'Hà Nội', 'tung@gmail.com', '15000', 0, 2),
(5, 3, 'Nguyễn 78956', '0123456879', 'Hà Nọi', 'uyiu@gmail.com', '500', 1, 2),
(6, 3, 'Nguyễn Văn Tùng', '0132465789', 'Hoàng Mai, Hà Nội', 'tungvv@gmail.com', '55800', 0, 0),
(7, 4, 'ádasd', 'adsasd', 'ádsda', 'asdaa@xn--ad-rma', '15000', 0, 2),
(8, 1, 'Nguyễn Quang Tùng', '0123456789', 'Hà Nội', 'tung123@gamil.com', '15500', 0, -1),
(9, 4, 'Nguyễn HHHHH', '01237893646', 'Hà Nôi', 'Tun1324@gmail.com', '15500', 1, -1);

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
(15, 6, 6, 'HUBLOT CLASSIC FUSION TITANIUM', 'popular3.png', '24000', '1', '24000'),
(16, 6, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(17, 6, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(18, 6, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(19, 6, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(20, 6, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(21, 6, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(22, 6, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(23, 7, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(24, 7, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(25, 7, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(26, 7, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(27, 7, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(28, 8, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(29, 8, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500'),
(30, 9, 2, 'Rolex Cosmograph Daytona', 'popular1.png', '15000', '1', '15000'),
(31, 9, 3, 'Atlantic Swiss ', 'popular2.png', '500', '1', '500');

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
(6, 2, 'HUBLOT CLASSIC FUSION TITANIUM', 'popular3.png', '<p>M&atilde; sản phẩm: 542.nx.9010.lr.1704</p>\r\n\r\n<p>Thương hiệu: Hublot</p>\r\n\r\n<p>Xuất xứ:&nbsp;Thụy Sĩ</p>\r\n\r\n<p>D&ograve;ng: Classic Fusion</p>\r\n\r\n<p>K&iacute;nh: Sapphire</p>\r\n\r\n<p>K&iacute;ch thước: 42 mm&nbsp;</p>\r\n\r\n<p>Bộ m&aacute;y: Automatic -&am', '24000'),
(11, 5, 'Casio G-Shock', 'popular5.png', '<p>Vật liệu vỏ / gờ: Titanium</p>\r\n\r\n<p>D&acirc;y đeo bằng Titanium</p>\r\n\r\n<p>Chốt gập 3 chỉ với một lần bấm</p>\r\n\r\n<p>Mặt k&iacute;nh saphia với lớp phủ kh&ocirc;ng phản quang</p>\r\n\r\n<p>IP m&agrave;u đen</p>\r\n\r\n<p>TRIPLE G RESIST (Chống va đập, chống lực', '2000'),
(12, 3, 'G-Timeless YA126458', 'new_product1.png', '<p>asdasdasd</p>\r\n', '3000'),
(13, 3, ' Patek Philippe Grand Complications', 'new_product2.png', '<p>asdasd</p>\r\n', '10000'),
(14, 3, 'Rolex Cosmograph Daytona', 'new_product3.png', '<p>asdasd</p>\r\n', '5000');

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
(2, 'tung999', 'MTIzNDU2Nzg5', 'Nguyễn Văn B', '0123456798', 'nguyenvvv@gmail.com', 'Hà Nội'),
(3, 'Nguyen van b', 'MTIzNDU2Nzg5', 'asdfasdf', '301654654', 'sdf@fasd', 'afdasd'),
(4, 'nguyenvana', 'NjU0NjU0NjU0', 'jhgasd', '65066546', 'bjhkjh@ijhl', 'jhvj');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `proId` (`proId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `userid` (`userid`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `proId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`proId`) REFERENCES `product` (`proId`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

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
