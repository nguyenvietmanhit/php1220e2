<?php
/**
 * database.php
 * Cơ sở dữ liệu MySQL
 * - Cơ bản về CSDL phục vụ cho lập
 * trình
 * 1 / CSDL là gì?
 * + Dùng để lưu trữ thông tin mang tính vĩnh viễn
 * + Có nhiều CSDL khác nhau: MySQL, SQL Server,
 * Oracle, MongoDB, SQLite ....
 * + Với PHP thông dụng nhất là MySQL -> cả
 * 2 đều free
 * 2 / CSDL MySQL
 * + Sử dụng câu truy vấn để tương tác với CSDL:
 * SQL: Structure Query Language
 * + Học CSDL là phải học cách viết truy vấn
 * SQL -> môn mới, độc lập với HTML CSS JS PHP
 * + Làm cách nào để viết và chạy câu truy vấn
 * SQL viết ra -> cài đặt CSDL MySQL lên máy
 *-> XAMPP cài luôn CSDL MySQL -> mở XAMPP -> Start
 * Module MySQL -> port = 3306
 * + Cách quản trị CSDL: 2 cách
 * - Dùng dòng lệnh
 * - Dùng giao diện đồ họa: dùng cách này ->
 * XAMPP khi cài MySQL cũng cài luôn PHPMyadmin -
 * là công cụ qtri CSDL MySQL bằng giao diện:
 * http://localhost/phpmyadmin
 * 3 / Thuật ngữ CSDL nói chung
 * + Database: CSDL
 * + Table: quản lý các thông tin của các đối
 *tượng giống nhau
 * Bảng quản lý thông tin sinh viên: students
 * Bảng quản lý sản phẩm: products
 * Bảng quản lý danh mục: categories
 * 1 Database có thể có nhiều Table
 * Quy tắc đặt tên bảng: tên-đối-tượng-số-nhiều
 * viết thường hết
 * + Field/Column: Trường/Cột của Bảng -> Trường
 * -> là đặc điểm/thông tin sẽ lưu về đối tượng
 * đó:
 * VD: Bảng students: id, name, age, birthday
 * + Row/Record: Hàng dữ liệu/Bản ghi cụ thể của
 * Bảng -> Bản ghi -> là thông tin cụ thể của
 * 1 đối tượng cụ thể
 * VD: Bảng students:
 * Bản ghi cụ thể: id = MS01, name = NV A,
 * age = 31, birthday = 12/12/2020
 * + Primary key: khóa chính của 1 bảng, là 1
 * trường của bảng, dùng để phân biệt các bản ghi
 * với nhau
 * VD: bảng students tạo 1 trường = id đóng vai
 * trò là khóa chính
 * + Foreign key: khóa ngoại/phụ: là 1 trương của
 * bảng, dùng liên kết các bảng lại với nhau
 * VD: bảng danh mục và bảng sản phẩm: liên kết
 * với nhau: 1 - 1, 1 - n, n - 1, n - n -> bắt
 * buộc phải tạo ra khóa ngoại.
 * VD:
 * Bảng categories: id, name
 * Bảng products: id, name, price, content,
 * category_id
 * -> khóa ngoại là trường bình thường của bảng
 * đang chứa nó nhưng là khóa chính của bảng mà
 * sẽ liên kết
 * -> quy tắc đặt tên khóa ngoại:
 * <tên-bang-liên-kết-số-ít>_id. VD: product_id,
 * category_id, user_id, news_id
 * Khóa chính thường đặt tên cố định = id
 * 4 / Thao tác với CSDL: có 2 cách:
 * - Dùng câu truy vấn SQL để thao tác: bắt buộc
 * - Dùng đồ họa PHPMyadmin: tùy chọn: Navicat,
 * MySQL Workbench
 *
 * 5 / Các truy vấn SQL cơ bản:
 * với CSDL MySQL thì truy vấn SQL ko phân biệt
 * hoa thường -> quy tắc: từ khóa của SQL viết
 * hoa, còn tên csdl, tên bảng, tên trường viết
 * thường
 * Để viết và chạy câu truy vấn SQL sử dungj đồ họa
 * của PHPMyadmin -> tab SQL -> viết truy vấn
 * - Tạo CSDL
 *
# 1 - Tạo CSDL
# CREATE DATABASE php1220e2_test1;
# 2 - Xóa CSDL
#DROP DATABASE php1220e2_test1;
# 3 - Tạo CSDL dạng đầy đủ
CREATE DATABASE IF NOT EXISTS
php1220e2_mysql
CHARACTER SET utf8 # cho phep lưu ký tự có dấu vào CSDL
COLLATE utf8_general_ci;
# 4 - Chọn CSDL sẽ thao tác: muốn tạo bảng, tạo trường ...cần
# ở trong cái CSDL đó thì mới thao đc
USE php1220e2_mysql; #chỉ có tác dụng nếu
#viết SQL bằng dòng lệnh, ko có tác dụng
# khi dùng PHPMyadmin -> click thẳng vào
# CSDL muốn thao tác
# 5 - Các kiểu dữ liệu trong MySQL: 3 kiểu
# Kiểu số - Number
# Kiểu chuỗi - String
# Kiểu Date Time




 */