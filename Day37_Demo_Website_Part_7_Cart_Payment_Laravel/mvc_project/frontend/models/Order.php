<?php
require_once 'models/Model.php';
class Order extends Model {
  //Khai báo các thuộc tính cho class, là các trường trong bảng
  public $fullname;
  public $address;
  public $mobile;
  public $email;
  public $note;
  public $price_total;
  public $payment_status;

  public function insert() {
    // + Viết truy vấn dạng tham số, tránh lỗi bảo mật SQL Injection
    // 3 lỗi bảo mật mà tuyển dụng hay hỏi: XSS, SQL Injection, CSRF
    $sql_insert = "INSERT INTO orders(fullname, address, mobile, email, note, price_total, payment_status)
    VALUES(:fullname,:address,:mobile,:email,:note,:price_total,:payment_status)";
    // + Cbi obj truy vấn
    $obj_insert = $this->connection->prepare($sql_insert);
    // + Tạo mảng:
    $inserts = [
      ':fullname' => $this->fullname,
      ':address' => $this->address,
      ':mobile' => $this->mobile,
      ':email' => $this->email,
      ':note' => $this->note,
      ':price_total' => $this->price_total,
      ':payment_status' => $this->payment_status,
    ];
    // + Thực thi obj truy vấn:
    $obj_insert->execute($inserts);
    // Không trả về true/false, mà trả về id của order vửa insert
//    return $is_insert;
    // + Lấy id của bản ghi vừa insert bằng cách sau:
    $order_id = $this->connection->lastInsertId();
    return $order_id;
  }
}