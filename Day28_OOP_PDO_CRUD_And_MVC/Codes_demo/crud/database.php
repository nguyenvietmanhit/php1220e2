<?php
/**
 * crud/database.php
 * Thực hiện kết nối CSDL MySQL theo cơ chế PDO, tạo ra obj kết nối dùng cho các chức năng
 * CRUD
 */
// + Tạo các hằng số kết nối
// Data source name
const DB_DSN = 'mysql:host=localhost;dbname=php1220e2_pdo;port=3306;charset=utf8';
// Username
const DB_USERNAME = 'root';
// Password
const DB_PASSWORD = '';
// + Code kết nối:
try {
  $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
  die("Lỗi kết nối: " . $e->getMessage());
}
echo "<h2>Kết nối CSDL theo PDO thành công</h2>";
// Chạy file này để test
//