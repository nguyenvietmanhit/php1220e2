<?php
/**
 * demo_mysqli.php
 * Kết nối CSDL MySQL trong PHP sử dụng thư viện
 * MySQLi
 * - Web động: tương tác với CSDL, web tĩnh thì ko
 * - PHP và MySQL hoàn toàn độc lập với nhau,
 * cần phải có cơ chế để liên kết PHP và MySQL
 * -> dùng thư viện MySQLi có sẵn để liên kết
 * - XAMPP tích hợp sẵn MySQLi
 * - MySQLi chỉ hỗ trợ kết nối tới 1 CSDL duy nhất
 * là MySQL
 * - Sang phần OOP: cơ chế PDO - PHP Data Object
 * - MySQLi cung cấp 2 hướng tiếp cận: PHP thuần
 * và OOP -> dùng PHP thuần
 * + Demo PHP kết nối MySQL thông qua 4 truy vấn:
 * SELECT, INSERT, UPDATE, DELETE
 * + Chuẩn bị tài nguyên:
 * - Tạo CSDL: php1220e2_crud (Create - Read -
 * Update - Delete)
#Tạo CSDL php1220e2_crud
CREATE DATABASE IF NOT EXISTS
php1220e2_crud
CHARACTER SET utf8
COLLATE utf8_general_ci;
 * - Tạo bảng: products
 * (id,name,price,avatar,created_at)
 *
 * # Tạo bảng products(id,name,price,avatar,created_at):
CREATE TABLE IF NOT EXISTS products(
id INT(11) AUTO_INCREMENT,
name VARCHAR(150),
price INT(11),
avatar VARCHAR(200),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
)
 * - Demo dùng PHPMyadmin để thao tác với CSDL:
 * TẠo CSDL: php1220e2_test
 * Tạo bảng: users: id, name, age, created_at
 * Thêm/sửa/xóa
 * Export CSDL php1220e2_test ra file .sql:
 * Import CSDL từ file .sql: Tạo CSDL sẽ import
 * php1220e2_import
 *
 * + Demo các bước kết nối CSDL từ PHP theo cơ
 * chế MySQLi, PHP có các hàm có tiền tố mysqli_
 * để thao tác
 */
// - Khai báo các hằng số lưu thông tin kết nối
// Máy chủ chứa CSDL MySQL: localhost là thuật
// ngữ CSDL đc lưu trên chính nơi gọi CSDL đó
const DB_HOST = 'localhost';
// Username kết nối vào CSDL MySQL
const DB_USERNAME = 'root'; //mặc định đc tạo khi
//cài XAMPP
// Password kết nối vào CSDL MySQL
const DB_PASSWORD = '';// XAMPP tạo
// TÊn CSDL sẽ kết nối:
const DB_NAME = 'php1220e2_crud';
// Cổng kết nối vào CSDL MySQL
const DB_PORT = 3306;
// - Khởi tạo kết nối:
$connection = mysqli_connect(DB_HOST,
    DB_USERNAME, DB_PASSWORD,
    DB_NAME, DB_PORT);
if (!$connection) {
  die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo "<h2>Kết nối CSDL thành công</h2>";
// Sử dụng biến nối để thực thi các truy vấn
// 1/ Demo truy vấn Thêm dữ liệu:
// products(id, name, price, avatar, created_at)
// + Viết truy vấn: chú ý dữ liệu thêm cho trường
// phải tương ứng với kiểu dữ liệu của PHP
// Chỉ thêm cho trường thủ công
$sql_insert = "INSERT INTO 
products(name, price, avatar)
VALUES('Iphone X', 1000, 'iphonex.jpg'), 
('Samsung S7', 2000, 'samsungs7.jpg')";
// + Thực thi truy vấn
// Với truy vấn INSERT, UPDATE, DELETE thì kết
// quả sau khi thực thi luôn là Boolean
$is_insert = mysqli_query($connection, $sql_insert);
// Cách debug khi FALSE, Copy nội dung câu truy
//vấn paste SQL của PHPMyadmin để chạy trực tiếp
var_dump($is_insert);

// 2/ Demo truy vấn lấy dữ liệu: SELECT
// - Lấy nhiều bản ghi: lấy tất cả sp đang có
//sắp xếp theo chiều giảm dần ngày tạo
// + Viết truy vấn
$sql_select_all = "SELECT * FROM products 
ORDER BY created_at DESC";
// + Thực thi truy vấn: kết quả trả về ko phải
// Boolean, mà là 1 obj trung gian
$obj_select_all = mysqli_query($connection,
    $sql_select_all);
//echo "<pre>";
//print_r($obj_select_all);
//echo "</pre>";
// + Lấy mảng dữ liệu từ obj trung gian trên:
$products = mysqli_fetch_all($obj_select_all,
    MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
foreach ($products AS $product) {
  echo "Tên sản phẩm: {$product['name']} <br />";
}
// - Lấy 1 bản ghi duy nhất
//Lấy sản phẩm có id = 1; -> trả về 1 bản ghi
// + Viết truy vấn:
$sql_select_one = "SELECT * FROM products 
WHERE id = 1";
// + Thực thi truy vấn
$obj_select_one = mysqli_query($connection,
    $sql_select_one);
// + Trả về mảng kết hợp 1 chiều chứa thông tin
// sp
$product = mysqli_fetch_assoc($obj_select_one);
echo "<pre>";
print_r($product);
echo "</pre>";
echo $product['name'];

// - 3 / Truy cập cập nhật: điều kiện cập nhật
// Cập nhật name = 'ABC' với sp có id < 3
// + Viết truy vấn:
$sql_update = "UPDATE products SET name='ABC' 
WHERE id < 3";
// + Thực thi truy vấn:
$is_update = mysqli_query($connection,
    $sql_update);
var_dump($is_update);
// 4 - Truy vấn xóa: kèm theo điều kiện
// Xóa sp có id > 8
// + Viết truy vấn:
$sql_delete = "DELETE FROM products 
WHERE id > 8";
// + Thực thi truy vấn:
$is_delete = mysqli_query($connection,
    $sql_delete);
var_dump($is_delete);