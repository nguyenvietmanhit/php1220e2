<?php
/**
 * mysql.php
 * - Cơ sở dữ liệu - Database:
 * là nơi lưu trữ dữ liệu
 * - Có rất nhiều CSDL: MySQL, SQL Server, Oracle,
 * SQLike, MongDB, NoSQL ...
 *- Với PHP, thông dụng nhất vẫn là CSDL MySQL
 *- Có 2 cách để tương tác đc với CSDL: tạo csdl, tạo
 *bảng ...:
 * + Dùng giao diện đồ họa: PHPMyadmin, WorkBench,
 * Navicat ...
 * + Dùng câu truy vấn SQL thông qua command line hoặc
 * các phần mềm hỗ trợ viết SQL, demo viết SQL thông qua
 * PHPMyadmin, tab SQL
 * + XAMPP cần bật service MySQL lên, cổng mặc định =
 * 3306
 * + localhost/phpmyadmin: đường dẫn tới phpmyadmin, do
 * xampp tự tạo username, pass để login tự động vào
 * phpmyadmin
 * - Các thuật ngữ trong CSDL:
 * + Database: tên CSDL
 * + Database có các table - các bảng: lưu trữ các thông
 * tin tương ứng
 * VD: Bảng quản lý user: users
 * Bảng quản lý danh mục: categories
 * Bảng quản lý sản p hẩm: products
 * + Trong table có các thuật ngư sau:
 * - fields - trường/cột: lưu các thuộc tính của đối tượng muốn quản lý
 * VD: Bảng categories - bảng quản lý danh mục, có thể
 * có các field sau: id, name, chi tiết, status, ngày tạo
 * ....
 * - Record/Row - bản ghi: thông tin cụ thể của đối tượng
 * VD: với bảng categories, có các bản ghi sau:
 * + ID = 1, Name = Thể thao, Des = Danh mục thể thao,
 * status = Ẩn, Ngày tạo = 12/12/2020
 * + ID = 2, Name = Thế giới, Des = Danh mục thế giới,
 * status = Hiển thị, Ngày tạo = 12/12/2020
 * - Khóa chính / Primary key: phân biệt các record với
 * nhau, 2 bản ghi bất kỳ trong 1 bảng ko bao giờ trùng
 * khóa chính.
 * Nên set khóa chính theo kiểu tự động tăng
 * - Khóa ngoại / Foreign key: là khóa chính của bảng khác,
 * thể hiện cho mối liên kết giữa 2 bảng với nhau
 * CÁc mối quan hệ trong các bảng có các dạng sau:
 * 1 - 1:
 * 1 - n: danh mục - sản phẩm
 * n - 1:
 * n - n:
 * - PHPMyadmin: tab Export: tạo 1 file .sql chứa CSDL
 * của bạn, được dùng ở chức năng Import của PHPMyadmin
 * - Tạo CSDL: php0920e_export
 *
 * - Thao tác với CSDL bằng cách viết câu truy vấn
 * SQL - Structure Query Langauge, dùng PHPMyadmin, tab
 * SQL
 *
# 1 - Tạo CSDL, với các từ khóa của MySQL nên viết hoa, mặc dù MySQL là ko phân biệt hoa thường, kết thúc câu truy vấn là dấu ;
CREATE DATABASE IF NOT EXISTS
php0920e_demo
CHARACTER SET utf8
COLLATE utf8_general_ci;
# 2 - Xóa CSDL
DROP DATABASE abc;
# 3 - Chọn CSDL sẽ thao tác: lệnh này chỉ hoạt động trên command line đơn thuần, ko có tác dụng ở giao diện đồ họa
USE php0929e_demo;
# 4 - Các kiểu dữ liệu trong MySQL: kiểu số, kiểu chuỗi và
# ngày giờ, cần dựa vòa giá trị có thể có để chọn kiểu dữ liệu cho phù hợp -> tiết kiệm bộ nhớ
# + Kiểu số: sử dụng các kiểu chính: TINYINT, INT, FLOAT
# + Kiểu chuỗi:
# VARCHAR - tối đa 255 ký tự
# TEXT - ko giới hạn ký tự
# + Kiểu ngày tháng: lưu dạng ngày giờ, dùng 2 kiểu chính:
# DATETIME: YYYY-MM-DD HH:MM:SS, Năm-Tháng-Ngày Giờ:Phút:Giây, dùng khi lưu ngày giờ dạng thủ công
# TIMESTAMP: YYYY-MM-DD HH:MM:SS, dùng khi lưu ngày giờ tự động
# Chú ý về định dạng khi lưu dữ liệu ngày giờ, luôn phải có dạng YYYY-MM-DD HH:MM:SS
#VD hợp lệ: 2020-11-30 21:13:30
#VD ko hợp lê: 30-11-2020 21:13:30, 2020/11/30 21:13:30


 */