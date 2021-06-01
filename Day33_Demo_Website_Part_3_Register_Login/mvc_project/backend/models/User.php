<?php
//models/User.php
require_once 'models/Model.php';
class User extends Model {
  public $username;
  public $password;

  // Lấy mảng user dựa vào username
  public function getUser($username) {
    // + Viết truy vấn dạng tham số
    $sql_select_one = "SELECT * FROM users WHERE username=:username";
    // + Cbi obj truy vấn:
    $obj_select_one = $this->connection->prepare($sql_select_one);
    // + Tạo mảng:
    $selects = [
      ':username' => $username
    ];
    // + Thực thi obj truy vấn:
    $obj_select_one->execute($selects);
    // + Lấy mảng 1 chiều:
    $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $user;
  }


  // Đăng ký tài khoản -> truy vấn insert
  public function register() {
    // + Viết truy vấn dạng tham số, SQLInjection
    $sql_insert = "INSERT INTO users(username, password) VALUES(:username, :password)";
    // + Cbi obj truy vấn: prepare
    $obj_insert = $this->connection->prepare($sql_insert);
    // + Tạo mảng truyền giá trị tham số câu truy vấn:
    $inserts = [
      ':username' => $this->username,
      ':password' => $this->password
    ];
    // + Thực thi obj truy vấn: execute
    $is_register = $obj_insert->execute($inserts);
    return $is_register;
  }

}