<?php
/**
 * crud/database.php
 * Kết nối CSDL theo MySQLi, đc dùng cho các chức năng
 * CRUD khác
 * - Tạo CSDL: php1020e_crud
CREATE DATABASE IF NOT EXISTS php1020e_crud
CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - Click CSDL vừa tạo, tạo bảng: products
 * id: khóa chính
 * name: VARCHAR (150)
 * price: INT (11)
 * avatar: lưu tên file ảnh upload, VARCHAR(150)
 * created_at: thời gian tạo sp, tự động sinh, TIMESTAMP,
 * DEFAULT CURRENT_TIMESTAMP
* - Tạo CSDL: php1020e_crud
CREATE DATABASE IF NOT EXISTS php1020e_crud
CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - SQL tạo bảng:
CREATE TABLE IF NOT EXISTS products(
  id INT(11) AUTO_INCREMENT,
  name VARCHAR(150),
  price INT(11),
  avatar VARCHAR(150),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
 */
// crud/database.php
// - Các hằng số kết nối CSDL
// Máy chủ chứa CSDL
const DB_HOST = 'localhost';
// Username kết nối vào CSDL
const DB_USERNAME = 'root';
// Mật khẩu kết nối vào CSDL
const DB_PASSWORD = '';
// Tên CSDL sẽ kết nối
const DB_NAME = 'php1020e_crud';
// Cổng kết nối vào CSDL
const DB_PORT = 3306;
// - Kết nối CSDL theo cơ chế MySQLi
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
  die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo "<h2>Kết nối CSDL " . DB_NAME . " thành công</h2>";

