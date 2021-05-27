<?php
//models/Category.php
require_once 'models/Model.php';
class Category extends Model {
  public $name;
  public $description;

  public function insert() {
    // + Viết truy vấn tham số
    $sql_insert = "INSERT INTO categories(name, description) VALUES(:name, :description)";
    // + Cbi obj truy vấn:
    $obj_insert = $this->connection->prepare($sql_insert);
    // + Tạo mảng gán giá trị tham số
    $inserts = [
      ':name' => $this->name,
      ':description' => $this->description
    ];
    // + Thực thi obj truy vấn:
    $is_insert = $obj_insert->execute($inserts);
    return $is_insert;
  }
}