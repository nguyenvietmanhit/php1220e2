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
# Kiểu số - Number: lưu thông tin dạng số
  Hay gặp ở 2 dạng:
 TINYINT: tốn 1 Byte để lưu, phạm vi từ -128 -> 127
 INT: tốn 4 Byte để lưu, phạm vi ~ -2 tỷ -> +2 tỷ
 FLOAT: lưu số thực
# Kiểu chuỗi - String: lưu thông tin dạng chuỗi
 VARCHAR: lưu thông tin chuỗi có độ dài ký tự
 thay đổi, tối đa 255 ký tự
 TEXT: lưu chuỗi độ dài tối đa ~ 65000 ký tự
# Kiểu ngày giờ - Date time: lưu thông tin dạng
 thời gian
 Kiểu dữ liệu ngày giờ khi lưu vào CSDL bắt buộc
 phải có định dạng sau:
 Năm-Tháng-Ngày Giờ:Phút:Giây
 Viết tắt:
 + Năm: Y - 4 số đầy đủ của năm: 2021, 2010
    y - 2 số cuối của năm: 21, 10.
   Khi lưu thì bắt buộc phải là Y
 + Tháng: m
 + Ngày: d
 + Giờ: H
 + Phút: i
 + Giây: s
 - VD: Lưu ngày giờ hiện tại vào CSDL
 2021-04-22 19:15:15
 + Dùng 2 kiểu ngày giờ sau:cả 2 kiểu đều lưu cả
 ngày tháng và thời gian Y-m-d H:i:s
 DATETIME: lưu ngày giờ sinh ra kiểu thủ công, vd:
 ngày sinh, phạm vi lưu thoải mái
 TIMESTAMP: lưu ngày giờ sinh tự động bởi hệ thống,
 VD: ngày giờ tạo bản ghi, ngày giờ cập nhật bản
 ghi. Phạm vi ko rộng như DATETIME: 01-01-1970
 đến năm 2038
 *
 * #6 - TẠo bảng: Tạo bảng quản lý danh mục và
 * bảng quản lý sản phẩm, 2 bảng có mối liên
 * kết với nhau: 1 danh mục sẽ có nhiều sp, 1sp
 * chỉ thuộc về 1 danh mục
 * + Bảng danh mục: categories:
 * - id: khóa chính, INT, sinh tự động theo cơ chế
 * tăng lên 1 mỗi khi có 1 bản ghi mới sinh ra:
 * AUTO_INCREMENT - trường nghiệp vụ
 * - name: tên danh mục, VARCHAR(100), cho phép
 * giá trị null: DEFAULT NULL
 * - created_at: ngày giờ tạo danh mục, TIMESTAMP,
 * để sinh tự động cần dùng:
 * DEFAULT CURRENT_TIMESTAMP
 * Truy vấn SQL tạo bảng categories:
# SQL tạo bảng categories:id,name,created_at
CREATE TABLE IF NOT EXISTS categories(
id INT(11) AUTO_INCREMENT,
name VARCHAR(100) DEFAULT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
# khai báo khóa chính, khóa ngoại nếu có
PRIMARY KEY (id)
);
 * + Bảng quản lý thông tin sản phẩm: products
 * id: khóa chính, kiểu INT(11), tự động tăng
 * name: tên sp, VARCHAR(200), cho phép NULL
 * price: giá sp, INT(11), ko cho phép NULL: NOT NULL
 * content: chi tiết sp, TEXT, cho phép NULL
 * category_id: id của danh mục, INT(11), khóa ngoại
 * created_at: ngày tạo, TIMESTAMP,
 * Viết truy vấn SQL tạo bảng products
 *
 * #Tạo bảng products: id,category_id,name,price,content,created_at
CREATE TABLE IF NOT EXISTS products(
id INT(11) AUTO_INCREMENT,
category_id INT(11),
name VARCHAR(200),
price INT(11) NOT NULL,
content TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id),
FOREIGN KEY (category_id) REFERENCES categories(id)
);
 *
 * 7/ Truy vấn Insert: thêm dữ liệu vào bảng
 *
#7/ Truy vấn Insert: thêm dữ liệu vào bảng
# Thêm vào bảng categories: id, name, created_at
# Chỉ thêm dữ liệu cho các trường sinh thủ
#công, ko thêm cho trường sinh tự động
#INSERT INTO categories(name)
#VALUES('Thể thao');

# Thêm nhiều bản ghi cùng 1 truy vấn:
INSERT INTO categories(name)
VALUES('Thế giới'), ('Kinh tế'), ('Khoa học');
# Thêm dữ liệu vào bảng products: id, category_id, name, price, content, created_at
# Chú ý khi thêm giá trị cho khóa ngoại category_id, cần phải dựa vào bảng categories để thêm giá trị id đã tồn tại
INSERT INTO products(category_id, name, price, content)
VALUES(1, 'Bóng đá', 1000, 'Chi tiết bóng đá'),
(1, 'Cầu lông', 3000, 'Chi tiết cầu lông'),
(1, 'Bóng bàn', 4000, 'Chi tiết bóng bàn');

 * 8 / Truy vấn lấy dữ liệu: SELECT

#8 / Truy vấn lấy dữ liệu: SELECT
# Lấy tất cả các trường của tất cả bản ghi trong bảng products
SELECT * FROM products;
# Lấy 1 vài trường
SELECT id, name, price FROM products;
# Lấy kèm theo điều kiện: WHERE
SELECT * FROM products WHERE price < 2000;
# Lấy kết hợp nhiều điều kiện sử dụng AND OR
SELECT * FROM products WHERE price <= 2000
AND id < 3;
# Lấy giới hạn bản ghi: LIMIT
SELECT * FROM products LIMIT 2;
# LẤy giới hạn bản ghi: LIMIT start,limit
SELECT * FROM products LIMIT 2,3;
# Truy cập cập nhật bản ghi: UPDATE, luôn sử
# dụng WHERE khi update, nếu ko update toàn bộ
# bảng !
UPDATE products SET name = 'Name123', price = 5000 WHERE id = 1;
# 12/ Truy vấn xóa bản ghi: DELETE, luôn cần
# WHERE khi xóa
DELETE FROM products WHERE id > 10;
# 4 truy vấn cơ bản: INSERT, SELECT, UPDATE, DELETE
# 13 - Từ khóa LIKE: tìm kiếm tương đối: ký tự % đại diện cho 1 ký tự bất kỳ
SELECT * FROM products WHERE name LIKE '%a%';
# Tìm kiếm tuyệt đối:
SELECT * FROM products WHERE name = 'a';
# 14 - Sắp xếp thứ tự bản ghi trả về: ORDER BY
SELECT * FROM products ORDER BY created_at DESC;
# DESC: giảm dần - descending
# ASC: tăng dần - ascending

#15 - Join bảng:
# VD: lấy tất cả sản phẩm kèm theo tên danh mục tương ứng của sp đó
# Join bảng chỉ thực hiện đc khi 2 bảng có mối liên kết
# 3 cơ chế join chính: INNER JOIN, LEFT JOIN,
# RIGHT JOIN -> INNER JOIN -> LEFT JOIN
# + INNER JOIN: cả 2 bảng đều phải có dữ liệu
# thì mới trả về kết quả -> đảm bảo tính toàn
# vẹn của data
# LEFT JOIN: dựa vào bảng gốc(LEFT) để join vào bảng kia, nếu bảng join có dữ liệu thì trả về, còn nếu ko có vẫn trả về nhưng giá trị sẽ bị null
# Truy vấn INNER JOIN, phải thêm tên bảng vào trước tên trường
# Đặt định dạng - alias cho trường/bảng, sử dụng từ khóa AS
SELECT products.*,categories.name AS category_name
FROM products
INNER JOIN categories
ON products.category_id = categories.id
 * 16 - Từ khóa IN

#16 - Từ khóa IN: thay thế cho OR
# VD: tìm tất cả danh mục có id = 1 hoặc = 2 hoặc 5
SELECT * FROM categories WHERE id = 1 OR id = 2 OR id = 5;
SELECT * FROM categories WHERE id IN (1, 2, 5);
#17 - BETWEEN: thay thế cho >= AND <=
#VD: tìm danh mục có id trong khoảng từ 2 đến 5
SELECT * FROM categories WHERE id >= 2 AND id <= 5;
SELECT * FROM categories WHERE id BETWEEN 2 AND 5;
#18 - Hàm COUNT: đếm số bản ghi trả về từ SELECT
SELECT COUNT(id) AS count_id FROM categories;
#19 - Hàm MAX: lấy giá trị max theo trường
SELECT MAX(id) FROM categories;
#20 - Hàm MIN, AVG, SUM
#21 - GROUP BY: nhóm giá trị theo trường nào đó, để sử dụng
# cho mục đích tính toán trên nhóm giá trị này
#VD: Tìm xem có bao nhiêu thí sinh đạt điểm 8 và 9 như bảng students dưới
SELECT diemthi, COUNT(diemthi) FROM students
GROUP BY diemthi;


 */