<?php
//models/Model.php
// Nhúng file Database.php để lấy các hằng số kết nối
require_once 'configs/Database.php';
/**
 * Class model cha chứa thuộc tính kết nối dùng chung ở các model con kế thừa từ nó
 */
class Model {
  // Thuộc tính kết nối CSDL dùng chung cho các model con
  public $connection;
  // Sử dụng phương thức khởi tạo để khởi tạo thuộc tính connection bằng việc kết nối CSDL
  //theo cơ chế PDO
  // Phương thức khởi tạo của class là PT chạy ngầm đầu tiên mỗi khi khởi tạo obj từ class đó
  public function __construct() {
    // Kết nối CSDL sử dụng PDO
    try {
      $this->connection = new PDO(Database::DB_DSN, Database::DB_USERNAME, Database::DB_PASSWORD);
    } catch (PDOException $e) {
      die("Lỗi kết nối: " . $e->getMessage());
    }
  }
}