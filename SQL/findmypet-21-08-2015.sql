-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2015 at 06:34 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `findmypet`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE IF NOT EXISTS `baiviet` (
  `ID` int(11) NOT NULL,
  `TieuDe` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenDN` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `IDDanhMuc` int(11) NOT NULL,
  `KiemDuyet` tinyint(1) NOT NULL,
  `NgayDang` date NOT NULL,
  `Loai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Giong` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DacDiem` text COLLATE utf8_unicode_ci NOT NULL,
  `TinhCach` text COLLATE utf8_unicode_ci NOT NULL,
  `KhaNang` text COLLATE utf8_unicode_ci NOT NULL,
  `NguonGoc` text COLLATE utf8_unicode_ci NOT NULL,
  `TieuChuan` text COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Mau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tuoi` int(11) NOT NULL,
  `DacDiemNhanDang` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`ID`, `TieuDe`, `TomTat`, `NoiDung`, `HinhAnh`, `TenDN`, `IDDanhMuc`, `KiemDuyet`, `NgayDang`, `Loai`, `Giong`, `DacDiem`, `TinhCach`, `KhaNang`, `NguonGoc`, `TieuChuan`, `Ten`, `Mau`, `Tuoi`, `DacDiemNhanDang`) VALUES
(1, 'Tiêu chuẩn chó Alaskan Malamute', 'Là một trong ba dòng chó kéo xe chính hay còn gọi là chó tuyết gồm có Alaskan Malamute, Husky và Smo', 'Là một trong ba dòng chó kéo xe chính hay còn gọi là chó tuyết gồm có Alaskan Malamute, Husky và Smoyed. Cũng giống như bất kỳ giống chó khác, chó Alaska cũng có những tiêu chuẩn riêng để đánh giá, xét trên các tiêu chí về ngoại hình, vóc dáng hay màu sắc. Vậy tiêu chí để chọn lựa những chú Alaska đẹp, tiêu chuẩn là gì? Cùng điểm qua một vài đặc điểm cơ bản cũng như một số tiêu chí lý tưởng để đánh giá vẻ đẹp của những chú chó tuyết Alaska.\r\nNgoại hình tiêu chuẩn chó Alaska\r\n\r\n* Tầm vóc\r\n\r\n     Tiêu chuẩn về giống chó Alaskan Malamute có kích cỡ lý tưởng trọng lượng phải đạt từ 75 - 85 pounds (34 – 38,5 kg) và chiều cao từ 23 - 25 inches (58 – 63,5 cm).\r\n\r\nCấu trúc thân hình của Alaskan Malamute phải cân xứng với khung xương to, cơ thể không thừa cân, xương thì cân đối với kích cỡ. Tỷ lệcơ thể cân đối là chiều cao/chiều dài= 9/10 trong đó chiều dài được tính từ khớp xương vai tới mép sau xương chậu, còn chiều cao tính từ mặt đất đến đỉnh xương vai.\r\n\r\nNgực có chiều sâu bằng ½ chiều cao tính đến vai và điểm sâu nhất nằm ngay sau chân trước. Chó Alaska Malamute tốt phải nặng xương, cẳng chân khỏe, bàn chân tốt, ngực rộng, cơ bắp săn chắc, đôi vai vạm vỡ, cùng nhiều thuộc tính thể chất cần thiết khác giúp cho chúng hoạt động hiệu quả. Dáng đi cần phải vững chãi, cân bằng, không mỏi mệt. Chúng có một dáng vẻ kiêu hãnh, năng động, với thân mình luôn đứng vững chắc trên gan bàn chân, đầu ngẩng cao, đôi mắt lanh lợi.\r\n\r\n \r\n* Phần đầu\r\n\r\nĐầu rộng và sâu, cân đối với toàn bộ cơ thể, phần khung xương giữa hai tai hơi tròn, càng về phía mắt càng thuôn và hẹp dần. Hai mắt nằm xếch lên phía trên. Hình quả hạnh nhân với cỡ trung bình. Giữa hai mắt là một nếp nhăn nhỏ. Phần giao nhau giữa đầu và mõm hơi nghiêng nhẹ xuống dưới.\r\n\r\nMõm to và có phần đồ sộ so với đầu, mõm không dài, không nhọn, nhưng cũng không quá ngắn hoặc mập. Hai môi có viền mép đều phủ kín, hàm trên và dưới rộng, răng lớn. Răng cửa hàm trên luôn khớp với răng cửa hàm dưới. Răng nhô ra ngoài hay thụt vào đều bị xem là khuyết điểm.\r\n\r\nTai có cỡ vừa phải, nhưng phải nhỏ so với đầu. Tai hình tam giác, chỏm vành tai hơi tròn. Hai tai cách nhau một khoảng rộng, nằm trên gờ sau xương đầu, thẳng hàng với góc trên của mắt. Khi tai dựng thường hướng về phía trước. Thỉnh thoảng tai cụp vào đầu khi đang hoạt động hoặc làm việc. Chó có tai ở cao quá trên đầu là không đạt chuẩn.\r\n\r\n \r\n* Đường nét cơ thể\r\n\r\nCổ rất khỏe và hơi có hình vòng cung. Ngực rất phát triển. Cơ thể săn chắc, gọn gàng. Lưng thẳng và dốc nhẹ về phía hông.\r\n\r\nThắt lưng cứng và nhiều cơ bắp. Thắt lưng dài là không chuẩn vì có thể làm lưng yếu đi. Đuôi không quá cao hay quá thấp, phần mấu đuôi giáp với thân thẳng hàng với xương sống.\r\n\r\nKhi đứng, đuôi chó cong lên trên lưng, không cụt, cong sát vào lưng hay có lông ngắn như đuôi cáo. Ngược lại, đuôi chó Malamute rất dày lông và trông như chiếc lông vũ đang phấp phới.\r\n\r\n\r\n- Thân trước\r\n\r\nVai hơi xuôi, chân trước nặng xương và nhiều cơ, chân thẳng hàng với cổ chân khi nhìn từ phía trước. Cổ chân ngắn, khỏe và hơi dốc khi nhìn nghiêng. Bàn chân lớn, các ngón chân khít vào nhau và cong đều, móng chân ngắn, khỏe, gan đệm bàn chân dày và cứng. Ở giữa các ngón chân có 1 lớp lông bảo vệ tạo cho chó một vẻ ngoài vững chắc và gọn gàng\r\n\r\n\r\n- Thân sau\r\n\r\nHai chân sau rộng, cơ đùi rất phát triển. Khuỷu chân sau hơi cong, các khớp khuỷu chân sau cong và xuôi xuống. Nhìn từ phía sau, các chân sau khi đứng và di chuyển luôn đồng bộ với chân trước, cách chân trước không quá gần hoặc quá xa. Chó có móng đeo là không tốt, do đó nên cắt móng đeo sớm sau khi chó mới sinh.\r\n\r\nChân chó Malamute phải cho thấy một thể lực phi thường và một sức đẩy cực mạnh. Bất kỳ một dấu hiệu không khỏe mạnh nào ở cẳng chân, bàn chân, thân trước hay sau, khi đứng im hay di chuyển đều là khuyết điểm nghiêm trọng. Một số khuyết điểm có thể kể ra gồm: chân bẹt vẹo ra, khuỷu chân sau to, khuỷu chân yếu, vai quá thẳng và thiếu độ nghiêng, dáng đi cứng nhắc (hoặc không cân bằng và vững), tính tình hời hợt, chậm chạp, xương nhẹ và cơ thể không cân đối.\r\n\r\n \r\nMàu sắc tiêu chuẩn với chó Alaska Malamute\r\n\r\nChó Malamute có những màu thông thường với những sắc thái khác nhau gồm trắng pha xám đen, trắng pha xám lông chồn, trắng pha đen, trắng pha đỏ, hoặc trắng tuyền một màu.\r\n\r\nMàu trắng tuyền là màu đơn duy nhất được công nhận ở chó Malamute. Tất cả các màu khác phải có lớp dưới màu trắng, đồng thời được nhấn bởi màu trắng ở vùng mặt, ngực và chân. Thân mình có màu loang lỗ hoặc phân bố không đều là không tốt.\r\n\r\n Alaskan Malamute đẹp nhất là nhờ bộ lông dày mượt, đặc biệt cái đuôi xõa đều cong ngược trên lưng như một bông lau. Bộ lông kép dày gồm 2 lớp ngăn không cho cái lạnh buốt xương ngấm vào cơ thể. Lớp lông dài bên ngoài đặc biệt không thấm nước, lớp lông trong ngắn hơn nhưng rất dày, có cấu trúc như lông cừu nên việc chăm sóc bộ lông cho chúng đòi hỏi phải rất kiên trì.\r\n\r\nChiều dài lông tăng dần ở vai, cổ, lưng, mông, dọc theo đuôi. Vào mùa hè lông chó Malamute trở nên ngắn và thưa hơn. Nên để lông tự nhiên, không nên tỉa lông trừ vùng quanh móng chân để bàn chân trông gọn gàng sạch sẽ hơn. Vùng lông quanh cổ dài hơn hẳn so với các nơi khác để bảo vệ tối đa cho mặt.\r\n\r\nCác đường nét trên mặt tạo thành một đặc điểm khu biệt, với một chỏm lông trên đỉnh đầu, còn mặt thì có thể toàn màu trắng hoặc được điểm xuyết bởi một vệt lông dài khác màu. Đuôi rất dày lông, cong lên trên lưng trông như một chiếc lông vũ đang phấp phới.\r\n\r\nCặp mắt hình quả hạnh và luôn là màu nâu. Mắt đen được coi là tốt, ngược lại mắt xanh dương bị xem là một khuyết điểm lớn, biểu hiện của sự pha giống nên sẽ không đủ tiêu chuẩn trình diễn.\r\n\r\nTiêu chuẩn chó Alaska về đặc điểm của Mũi, môi, viền mắt phải màu đen đối với chó mọi màu lông, ngoại trừ chó lông đỏ thì những bộ phận trên có thể màu nâu. Chó có hiện tượng “mũi tuyết” với đường viền mũi nhạt hơn cũng được chấp nhận.', 'alaska-14-8-15.jpg', 'ntcong', 1, 1, '2015-08-14', '', '', '', '', '', '', '', '', '', 0, ''),
(2, 'Những Tiêu chuẩn của một con chó phú quốc tốt ', 'Thế nào là một con chó phú quốc tốt và được gọi là đạt tiêu chuẩn? Có rất nhiều người mua chó phú quốc về nuôi mà không biết như thế nào là một con chó phú quốc tốt......', '<p>C&aacute;c ti&ecirc;u chuẩn chọn ch&oacute; ph&uacute; quốc tốt Theo hiệp hội ch&oacute; Việt Nam v&agrave; những kinh nghiệm của những cụ gi&agrave; cao tuổi sinh sống tại h&ograve;n đảo ph&uacute; quốc, nơi được cho l&agrave; nguồn gốc của d&ograve;ng ch&oacute; săn nhanh nhẹn n&agrave;y. Với rất nhiều đặc điểm v&agrave; ti&ecirc;u ch&iacute; để đ&aacute;nh gi&aacute; thế n&agrave;o l&agrave; một ch&uacute; ch&oacute; ph&uacute; quốc đẹp, th&igrave; phần lớn l&agrave; dựa v&agrave;o đặc điểm h&igrave;nh d&aacute;ng b&ecirc;n ngo&agrave;i của ch&oacute;. Một phần nữa, l&agrave; ch&oacute; ph&uacute; quốc tốt hay kh&ocirc;ng c&ograve;n c&oacute; 1 phần dựa v&agrave;o gia phả, những ch&uacute; ch&oacute; đạt những giả cao trong c&aacute;c cuộc thi dog show. Nhưng h&ocirc;m nay, ch&uacute;ng ta chỉ đề cập đến c&aacute;c ti&ecirc;u ch&iacute; về h&igrave;nh d&aacute;ng b&ecirc;n ngo&agrave;i của ch&oacute; ph&uacute; quốc m&agrave; th&ocirc;i. Ti&ecirc;u Chuẩn đầu ch&oacute; Ph&uacute; Quốc Một con ch&oacute; ph&uacute; quốc đạt ti&ecirc;u chuẩn cần phải c&oacute; bộ thủ, bộ đầu c&oacute; những đặc điểm như sau: Đầu ch&oacute; phải d&agrave;i, thon, 2 t&agrave;i phải nhọn v&agrave; d&agrave;i lu&ocirc;n lu&ocirc;n dựng đứng v&agrave; ke nhau. Với nhiều ch&uacute; ch&oacute; ph&uacute; quốc m&agrave; tai cụp hoặc kh&ocirc;ng c&acirc;n đều đối xừng th&igrave; coi như l&agrave; hỏng. D&ugrave; m&agrave;u l&ocirc;ng thế n&agrave;o th&igrave; m&otilde;m ch&oacute; ph&uacute; quốc lu&ocirc;n c&oacute; m&agrave;u đen. Đ&ocirc;i mắt nh&igrave;n sắc lạnh v&agrave; c&oacute; m&agrave;u n&acirc;u. Ti&ecirc;u chuẩn của th&acirc;n h&igrave;nh ch&oacute; ph&uacute; quốc Để được đ&aacute;nh gi&aacute; l&agrave; một ch&uacute; ch&oacute; ph&uacute; quốc đạt ti&ecirc;u chuẩn th&igrave; nhất thiết ch&oacute; phải c&oacute; th&acirc;n h&igrave;nh thon gọn, cấu tr&uacute;c thon v&agrave; chắc khỏe. Lu&ocirc;n thể hiện sự nhanh nhẹn v&agrave; sắc b&eacute;n trong từng hoạt động của ch&oacute;. Ch&oacute; ph&uacute; quốc c&oacute; bụng thon, nhỏ. B&ecirc;n cạnh đ&oacute; l&agrave; phần ngực ch&oacute; to rộng v&agrave; nở, ngực s&acirc;u ngang bằng với khuỷu ch&acirc;n. Với ch&oacute; ph&uacute; quốc đạt ti&ecirc;u chuẩn th&igrave; ch&oacute; phải ch&oacute; chiều d&agrave;i th&acirc;n lu&ocirc;n lu&ocirc;n d&agrave;i hơn so với chiều cao của ch&oacute;. Ch&oacute; ph&uacute; quốc c&oacute; 4 ch&acirc;n thon gọn, kết cấu sương chắc khỏe, ch&acirc;n ch&oacute; lu&ocirc;n duỗi thẳng tắp khi đứng. Một đặc điểm rất nổi bật ở d&ograve;ng ch&oacute; săn ở đảo ph&uacute; quốc n&agrave;y đ&oacute; l&agrave; ở mỗi b&agrave;n ch&acirc;n của ch&uacute;ng, lu&ocirc;n c&oacute; m&agrave;ng giữ c&aacute;c ng&oacute;n ch&acirc;n giống như kiểu m&agrave;ng ở ch&acirc;n vịt. Vốn dĩ lo&agrave;i ch&oacute; đảo n&agrave;y sống ở v&ugrave;ng biển, n&ecirc;n việc ch&uacute;ng phải thường xuy&ecirc;n bơi lội đ&atilde; khiến ch&uacute;ng phải ph&aacute;t triển th&iacute;ch nghi với m&ocirc;i trường đặc biệt ở v&ugrave;ng đảo n&oacute; sống. Ti&ecirc;u chuẩn của đu&ocirc;i ch&oacute; ph&uacute; quốc Ch&oacute; ph&uacute; quốc l&agrave; phải c&oacute; đu&ocirc;i v&uacute;t cần c&acirc;u, l&uacute;c n&agrave;o đu&ocirc;i ch&oacute; cũng phải cong ở ph&iacute;a tr&ecirc;n lưng khoảng 1/4 v&ograve;ng tr&ograve;n hoặc cong 1/2 v&ograve;ng tr&ograve;n. V&agrave; đu&ocirc;i lu&ocirc;n được giữ c&acirc;n bằng trong khi ch&oacute; đang đứng. Ti&ecirc;u chuẩn m&agrave;u l&ocirc;ng của ch&oacute; ph&uacute; qu&ocirc;c Ch&oacute; ph&uacute; quốc c&oacute; rất nhiều m&agrave;u l&ocirc;ng nhưng phổ biến nhất vẫn l&agrave; c&aacute;c m&agrave;u như m&agrave;u đen, m&agrave;u v&agrave;ng, m&agrave;u vện cọp, Đối với những c&aacute;c thể ch&oacute; ph&uacute; quốc c&oacute; m&agrave;u trắng hoặc m&agrave;u đen trắng th&igrave; c&aacute;c chuy&ecirc;n gia cho rằng ch&uacute;ng kh&ocirc;ng tốt. L&ocirc;ng ch&oacute; c&oacute; độ ngắn khoảng 2cm, ngắn v&agrave; thẳng, l&ocirc;ng ch&oacute; lu&ocirc;n nằm s&aacute;t th&acirc;n. Mỗi khi n&oacute;i đến ch&oacute; ph&uacute; quốc th&igrave; kh&ocirc;ng thể bỏ qua đặc điểm n&agrave;y được đ&oacute; l&agrave; xo&aacute;y ở lưng. Nhiều người thường hay gọi đ&oacute; l&agrave; xo&aacute;y kiếm v&igrave; xo&aacute;y tr&ecirc;n lưng chạy dọc từ phần tr&ecirc;n bả vai đến tận cuối đu&ocirc;i, do ở phần giữa lưng c&oacute; c&aacute;c đ&aacute;m l&ocirc;ng mọc ngược tạo n&ecirc;n. Độ rộng của xo&aacute;y kiếm tr&ecirc;n lưng ch&oacute; ph&uacute; quốc t&ugrave;y thuộc v&agrave;o từng c&aacute; thể, nhưng tối thiểu l&agrave; khoảng 3 cm. Đối với nhiều người, họ cho rằng ch&oacute; ph&uacute; quốc l&agrave; loại ch&oacute; phong thủy, chủ nu&ocirc;i ch&oacute; n&agrave;y sẽ tạo th&ecirc;m được quyền uy cho gia chủ. Ch&oacute; ph&uacute; quốc thuần chủng sinh đẻ Đối với ch&oacute; ph&uacute; quốc đạt ti&ecirc;u chuẩn l&agrave; phải được đẻ v&agrave; sinh sản ở trong hang. Đ&acirc;y l&agrave; bản năng rất hoang d&atilde; của lo&agrave;i ch&oacute; xo&aacute;y ph&uacute; quốc n&agrave;y. Kể cả khi ch&oacute; ph&uacute; quốc được nu&ocirc;i trong đất liền đi chăng nữa, th&igrave; nhiều c&aacute; thể vấn c&oacute; th&oacute;i quen đ&agrave;o ổ c&aacute;t ở trong vườn để l&agrave;m ổ sinh đẻ. Ch&oacute; ph&uacute; quốc đ&agrave;o hang l&agrave;m ổ đẻ gần như đ&oacute; l&agrave; bản năng hoang d&atilde; của lo&agrave;i ch&oacute; n&agrave;y. Với những ti&ecirc;u chuẩn của ch&oacute; ph&uacute; quốc thuần chủng, bạn c&oacute; thể dựa v&agrave;o h&igrave;nh d&aacute;ng của ch&oacute; để c&oacute; thể tuyển chọn được một con ch&oacute; ph&uacute; quốc tốt nhất. Tất nhi&ecirc;n bạn phải c&oacute; một ch&uacute;t may mắn nữa nếu như bạn chọn ch&oacute; từ khi mới t&aacute;ch mẹ. Ch&uacute;c c&aacute;c bạn th&agrave;nh c&ocirc;ng ! ( Nguồn tổng hợp tr&ecirc;n Internet)</p>\r\n', 'phu-quoc-15-8-15.jpg', 'ntcong', 1, 1, '2015-08-21', 'Chó', 'Phú Quốc', '', '', '', 'Được tìm thấy và thuần hóa lần đầu tiên tại đảo Phú Quốc - Việt Nam', '', '', '', 0, ''),
(3, 'Tin mat 1', 'Tin mat 1', '', '1.jpg', 'thanhvien', 2, 0, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(4, 'Tin mat 2', 'Tin mat 2', '', '2.jpg', 'thanhvien', 2, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(5, 'Tin mat 3', 'Tin mat 3', '', '3.jpg', 'thanhvien', 2, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(6, 'Tin mat 4', 'Tin mat 4', '', '4.jpg', 'thanhvien', 2, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(7, 'Tin mat 5', 'Tin mat 5', '', '5.jpg', 'thanhvien', 2, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(8, 'Tin mat 6', 'Tin mat 6', '', '6.jpg', 'thanhvien', 2, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(9, 'Tin Tim 1', 'Tin Tim 1', '', '2.jpg', 'thanhvien', 3, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(10, 'Tin Tim 2', 'Tin Tim 2', '', '10.jpg', 'thanhvien', 3, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(11, 'Tin Tim 3', 'Tin Tim 3', '', '11.jpg', 'thanhvien', 3, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(12, 'Tin Tim 4', 'Tin Tim 4', '', '12.jpg', 'thanhvien', 3, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(14, 'Bai viet 2', 'Bai viet 2', '', '16.jpg', 'thanhvien', 1, 0, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(15, 'Bai viet 3', 'Bai viet 3', '', '9.jpg', 'thanhvien', 1, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(16, 'Bai viet 4', 'Bai viet 4', '', '17.jpg', 'thanhvien', 1, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, ''),
(17, 'Tin Tim 5', 'Tin Tim 5', '', 'Dog3.jpeg', '', 3, 1, '2015-08-21', '', '', '', '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `baiviet_thucung`
--

CREATE TABLE IF NOT EXISTS `baiviet_thucung` (
  `IDBaiViet` int(11) NOT NULL,
  `IDThuCung` int(11) NOT NULL,
  `Ten` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `Mau` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `Tuoi` int(4) NOT NULL,
  `DacDiemNhanDang` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baiviet_thucung`
--

INSERT INTO `baiviet_thucung` (`IDBaiViet`, `IDThuCung`, `Ten`, `Mau`, `Tuoi`, `DacDiemNhanDang`) VALUES
(1, 6, '', '', 0, ''),
(2, 8, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE IF NOT EXISTS `binhluan` (
  `ID` int(11) NOT NULL,
  `IDBinhLuan` int(11) NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `TenDN` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `Ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `KiemDuyet` tinyint(1) NOT NULL DEFAULT '0',
  `NgayBinhLuan` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`ID`, `IDBinhLuan`, `NoiDung`, `TenDN`, `Ho`, `Ten`, `Email`, `SoDienThoai`, `KiemDuyet`, `NgayBinhLuan`) VALUES
(3, 1, 'Test bình luận 1', 'ntcong', '', 'Công', '', '0984775586', 0, '2015-08-17'),
(4, 2, 'Test bình luận 2 ádasdasdasdasdasd oh yeahcsascacasc', 'dmtri', 'Đặng Minh', '', 'abc@yahoo.com', '', 1, '2015-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc` (
  `ID` int(11) NOT NULL,
  `TenDanhMuc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`ID`, `TenDanhMuc`, `MoTa`) VALUES
(1, 'BaiViet', 'Bài viết về những kiến thức cơ bản của thú cưng'),
(2, 'TinMat', 'Tin mất thú cưng'),
(3, 'TinTim', 'Tin tìm chủ của thú cưng');

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE IF NOT EXISTS `phanquyen` (
  `MaPhanQuyen` int(11) NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`MaPhanQuyen`, `MoTa`) VALUES
(1, 'Admin'),
(2, 'Thành viên'),
(3, 'Khách');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `ID` int(11) NOT NULL,
  `TenFile` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`ID`, `TenFile`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg'),
(6, '6.jpg'),
(7, '7.jpg'),
(8, '8.jpg'),
(9, '9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thucung`
--

CREATE TABLE IF NOT EXISTS `thucung` (
  `ID` int(11) NOT NULL,
  `Loai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Giong` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DacDiem` text COLLATE utf8_unicode_ci NOT NULL,
  `TinhCach` text COLLATE utf8_unicode_ci NOT NULL,
  `KhaNang` text COLLATE utf8_unicode_ci NOT NULL,
  `NguonGoc` text COLLATE utf8_unicode_ci NOT NULL,
  `TieuChuan` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thucung`
--

INSERT INTO `thucung` (`ID`, `Loai`, `Giong`, `DacDiem`, `TinhCach`, `KhaNang`, `NguonGoc`, `TieuChuan`) VALUES
(1, 'Chó', 'husky', 'khỏe mạnh, gọn chắc và xếp trong nhóm chó nghiệp vụ. Màu lông có đủ loại, từ trắng tuyền cho đến đen. Các vệt pha màu khác trên đầu được coi là phổ biến và được chấp nhận. Các loại pha màu có như sau: Đen & Trắng, Đỏ & Trắng (từ vàng cam đến nâu sậm), Xám & Trắng (từ bạc đến xám sói), Chồn & Trắng (đỏ cam với chót lông màu đen), màu Agouti & Trắng, màu Trắng tuyền. Các đốm màu pha thường được chấp nhận, đặc biệt là 2 đốm màu trắng phía trên mắt, tạo hiệu ứng 4 mắt. Mắt có hình hạnh nhân, hơi xếch. Màu mắt của chúng chó thể là xanh da trời, nâu, hổ phách hoặc tổ hợp của 3 màu nói trên. Cũng hay thường gặp Husky với 2 mắt 2 màu xanh - nâu. Bàn chân rộng, có lông mọc ở kẽ ngón chân giúp cho chúng thuận tiện khi di chuyển trên tuyết. Tai vểnh dựng đứng, đuôi cong lưỡi liềm.Husky có bộ lông lớp trong dày và lớp lông phía ngoài mềm mại giúp chúng có thể chống chọi được với nhiệt độ âm 50-60 độ C.\r\nCần được vận động và yêu thương nhiều\r\n', 'Rất hiền, yêu mọi người, đặc biệt rất nhẹ nhàng với trẻ con. LÀ loài khá sạch sẽ, không ồn ào, không kén ăn. Ít khi nổi cáu, giận dỗi, tấn công các loài khác.Husky rất thích đi dạo cùng với chủ.', 'Husky được nuôi chủ yếu như giống chó bầu bạn, tuy nhiên ở một số nơi vẫn thường được sử dụng để kéo xe và đua tốc độ.', 'Ở Siberi, năm 1909 đưa đến Alaska và được nuôi rộng rãi đến những nơi khác', ''),
(2, 'chó', 'Samoyed', 'Thân hình gọn gàng, mạnh mẽ của giống chó này có thể cho ta thấy sức mạnh của chúng ngay từ cái nhìn đầu tiên. Bộ lông dày và bóng mượt có màu vàng, trắng, kem và hơi hung vàng, tuy vậy màu trắng vẫn được ưa chuộng nhất. Samoyed là giống chó mạnh mẽ, năng nổ và rất linh hoạt. Chúng có cái đầu khoẻ, mõm nhọn. mũi màu đen hoặc nâu và bộ hàm rất khoẻ. Mắt màu sẫm, xếch và sâu. Tai có kích thước vừa phải, hơi tròn ở đỉnh và luôn dựng đứng. Đuôi dài, xù lông và luôn cuộn tròn dựng đứng ở trên lưng. Chân thẳng, gân guốc. Bàn chân phẳng và phủ đầy lông. Bộ lông rất dày và cứng hơi gợn sóng. Dưới lớp lông này là lớp lông mềm dày dặn, giúp chúng chống chọi với cái lạnh của vùng ôn đới.\r\n', 'Là giống chó rất thông minh, ưa hoà bình. Rất trung thành, chúng có xu hướng chỉ quyến luyến với 1 người chủ, tuy vẫn tỏ ra yêu mến những người khác. Dễ chịu, thân thiên và thích chơi đùa. Chúng luôn vui mừng với tất cả mọi người, kể cả người lạ. Chính vì đặc tính này nên chúng ít được sử dụng làm chó canh gác. Tuy nhiên chúng có thể sủa khi có người lạ để báo cho chủ nhân biết. Thích nghi tốt với cuộc giống gia đình và luôn yêu mến trẻ. Giống chó này thường được huấn luyện để làm việc trong một nhóm. Chúng không chủ động tìm kiếm kẻ thù, tuy vậy sẵn sàng phòng thủ khi cần thiết. Không nên để cho chúng chơi một mình với các súc vật nhỏ khác, tuy vậy sẽ rất có ích khi cho chúng hoà đồng sớm với các loài khác từ lúc còn nhỏ. Rất thích sủa.', 'trước đây được sử dụng để kéo xe trượt tuyết', 'có nguồn gốc từ vùng Siberia', 'Rất cần chăm sóc bộ lông.Có thể sống trong điều kiện căn hộ nếu có không gian dành cho nó tập luyện. Chúng rất hoạt động trong nhà và thoải mái nhất khi ở không gian rộng như là sân vườn. Bộ lông dày không cho phép chúng sống ở những nơi có thời tiết nóng quá.'),
(3, 'mèo', 'mèo mướp', 'dáng người nhỏ nhắn, nhanh nhẹn,bộ lông ngắn bao hết cơ thể, có màu vằn xám hoặc màu vàng.khuông mặt nhỏ, hai lỗ mũi to, mắt tinh nhanh, tai vểnh lên cao, bốn chân thon dài, chắc khỏe, bộ móng vuốt sắc nhọn, đuôi dài, cong lên phía lưng.', '', 'có khả năng len trèo tốt, bắt chuột tốt', 'phổ biến ở Việt NAm', ''),
(4, 'mèo', 'mèo Ba Tư', 'sống mũi rất ngắn nên thường được gọi là mèo mặt tịt. Chúng có thân hình chắc khỏe, đầu to, hai mắt tròn biểu cảm.\r\nbộ lông 2 lớp với lớp lông dài phía ngoài và lớp lông ngắn khá dày ở bên trong. Đuôi của chúng luôn xù nên việc chăm sóc cho bộ lông của giống mèo này là một công việc rất quan trọng nhất. Rụng lông rất nhiều.rất nhiều màu lông khác nhau: Màu kem, màu trắng, màu xám xanh (blue), màu đỏ, màu nâu, vằn vện…', 'bản tính mềm mại, dễ chịu và ôn hòa', 'Chúng không tỏ ra khó chịu khi bị nhốt trong nhà suốt ngày, và việc được thả ra vườn cũng không lấy gì làm quá quan trọng, mặc dù nếu được thả, chúng cũng sẽ sẵn sàng leo trèo cây cối với sự khoan khoái rõ rệt. ', 'Ba Tư', 'yêu cầu tuyệt đối của giống mèo này là mũi ngắn và mắt to. Tuy vậy, những cá thể đạt được các tiêu chí trên có thể sẽ gặp khó khăn trong việc uống nước hoặc bị chảy nước mắt. '),
(6, 'Chó', 'Alaska - Alaskan Malamute', 'Alaskan Malamute có chiều cao trung bình là 63,5 cm và có thể cao đến 68,5 cm và có sự cân đối về chiều cao, cân nặng, cấu trúc xương và cơ bắp. Xương chân lớn rất cơ bắp để phục vụ cho việc kéo xe. Với hình dáng ngoài không được quý phái, duyên dáng hay có dáng thể thao như một số giống khác mà nó có nét tương đồng với loài sói Bắc Mỹ. Cặp mắt màu nâu, nâu đen hình quả hạnh, tai nhỏ đầy lông tơ. Alaskan Malamute đẹp nhất là nhờ bộ lông dày mượt, đặc biệt cái đuôi hình bông lau xõa đều cong ngược trên lưng.  Bộ lông dày thô, mềm, bóng và có sắc biến thiên dần từ màu trắng toát ở phần bụng tới màu đen lên đến trên sống lưng và có khuôn mặt rất đẹp với những mảng trắng. Đuôi luôn cuộn phía trên lưng. Giống chó Alaskan Malamute có hai lớp lông ngăn không cho cái lạnh buốt giá ngấm vào cơ thể. Lớp lông dài phía ngoài không thấm nước, lớp lông trong ngắn hơn nhưng rất dày lớp lông trong ngắn và cấu trúc như những sợi lông cừu. Do vậy mà việc chăm sóc lông phải yêu cầu rất nhiều thời gian và chu đáo. Nếu nuôi tại các gia đình thì phải chải lông thường xuyên để tránh lông rụng bám vào thảm hay chăn đệm.', 'Chúng thông minh, hiền hòa, luôn biết nghe lời dù là chó cái hay đực và luôn nổi bật trong công việc. Thích trẻ nhỏ và luôn hòa thuận với nhũng vật nuôi khác. Tuy nhiên thường thì Malamute không có thói quen nhặt bóng hay tha đồ vật như một số giống chó săn khác vì mục đích nuôi từ cổ xưa của người Eskimo không vì mục đích săn bắn mà chỉ để kéo xe nên bản tính săn mồi trong nó rất ít. Đặc biệt là không bao giờ tấn công mèo, điều rất khác với đa số các con chó khác. Alaskan Malamute là giống chó thông minh nên có khả năng học tập rất nhanh và rất biết vâng lời. Bản chất rất tò mò và vô cùng hiếu động nên Malamute rất thích được lao động.', 'Alaskan Malamute có thể tự đi rất xa mà vẫn tìm được đường về. Do tập tục sống bầy đàn nên khi nuôi trong gia đình thì chúng rất nghe lời chủ bởi coi chủ như con đầu đàn, luôn phục tùng và có khuynh hướng luôn sẵn sàng bảo vệ đàn của mình khi có kẻ muốn tấn công hay xâm phạm. Malamute có khả năng học và dễ tuân lệnh. Chúng rất thích thú khi được kéo vật gì đó trên những đoạn đường dài cùng bầy đàn của nó. Việc di chuyển trên tuyết trong không gian rộng lớn thì rất tốt.', 'Alaskan Malamute hay Mahlemuts là một giống chó kéo xe ở Alaska. Giống chó sói được đặt tên theo bộ tộc Mahlemut là Malamute. Người Eskimo du mục ở Alaska đã khám phá ra chúng có khả năng di chuyển và kéo xe trên tuyết một khoảng cách rất lớn và liên tục. Họ đã cho lai tạo với những giống khác như chó Newfoundland hoặc St Bernard để có được giống chó ngày càng to hơn, khỏe hơn, bền bỉ hơn, và chịu được thời tiết khắc nghiệt của vùng Bắc Cực. Người Nga đã dùng những chú chó này đê chở lông thú và thịt thú rừng tới những khu vực lân cận để bán và đổi các mặt hàng khác. Giống chó này đòi hỏi được tập luyện hàng ngày nếu không chúng sẽ buồn chán và phá hoại.[1]', ''),
(8, 'Chó', 'Phú Quốc', '', '', '', 'Được tìm thấy và thuần hóa lần đầu tiên tại đảo Phú Quốc - Việt Nam', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `TenDN` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `MaPhanQuyen` int(11) NOT NULL,
  `Ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`TenDN`, `MatKhau`, `MaPhanQuyen`, `Ho`, `Ten`, `Email`, `DiaChi`, `SoDienThoai`) VALUES
('1', 'á', 2, '', '', '', '', ''),
('a', 'b', 2, '', '', 'abc@gmail.com', '', ''),
('dmtri', '123456', 1, 'Đăng Minh', 'Trí', 'milomoli2134@gmail.com', '', '01662220123'),
('mtdung', '123456', 1, 'Mai Tiến', 'Dũng', 'maidungqb92@gmail.com', '', '0962658391'),
('ntcong', '123456', 1, 'Nguyễn Thành', 'Công', 'ntcong.cdsp@gmail.com', '181 Trần Phú, Huế', '0984775586'),
('ptnha', '123456', 1, 'Phan Thị Ngọc', 'Hà', 'haptngocha@gmail.com', '', '0977316891'),
('test', '123', 2, 'Nguyễn Thành', 'Công', 'ntcong.cdsp@gmail.com', '181 Trần Phú, Huế', '0984775586'),
('thanhvien', '1', 2, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`ID`), ADD KEY `IDDanhMuc` (`IDDanhMuc`);

--
-- Indexes for table `baiviet_thucung`
--
ALTER TABLE `baiviet_thucung`
  ADD PRIMARY KEY (`IDBaiViet`,`IDThuCung`), ADD KEY `IDThuCung` (`IDThuCung`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ID`), ADD KEY `IDBinhLuan` (`IDBinhLuan`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaPhanQuyen`), ADD UNIQUE KEY `MaPhanQuyen` (`MaPhanQuyen`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thucung`
--
ALTER TABLE `thucung`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`TenDN`), ADD KEY `MaPhanQuyen` (`MaPhanQuyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `MaPhanQuyen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `thucung`
--
ALTER TABLE `thucung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
