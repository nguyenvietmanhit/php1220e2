<?php
//models/Model.php
//Model cha
require_once 'configs/Database.php';
class Model {
  public $connection;

  public function __construct() {
    //khởi tạo kết nối cho thuộc tính connection ngay khi có class con kế thừa từ nó
    try {
      $this->connection = new PDO(Database::DB_DSN, Database::DB_USERNAME, Database::DB_PASSWORD);
    } catch (PDOException $e) {
      die("Lỗi kết nối: " . $e->getMessage());
    }
  }
}