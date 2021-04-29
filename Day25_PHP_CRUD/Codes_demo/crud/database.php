<?php
/**
 * crud/database.php
 * Kết nối CSDL, tạo ra biến kết nối để
 * nhúng vào chức năng khác
 */
// Máy chủ chứa CSDL sẽ kết nối
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php1220e2_crud';
const DB_PORT = 3306;
// Khởi tạo kết nối:
$connection = mysqli_connect(DB_HOST,
    DB_USERNAME, DB_PASSWORD, DB_NAME,
    DB_PORT);
if (!$connection) {
  die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo "<h2>Kết nối CSDL thành công</h2>";
