<?php
//mvc/configs/Database.php
// Class chứa các hằng số kết nối CSDL theo PDO
// - Quy tắc đặt tên file khi bên trong file chứa 1 class duy nhất: tên file trùng tên class, đặt tên
//class thì viết hoa ký tự đầu tiên của từng từ trong tên class
class Database {
  // KHai báo các hằng số chứa thông tin kết nối CSDL theo PDO
  // + Data Source Name
  const DB_DSN = 'mysql:host=localhost;dbname=php1220e2_pdo;port=3306;charset=utf8';
  // + Username
  const DB_USERNAME = 'root';
  // + Password:
  const DB_PASSWORD = '';
}