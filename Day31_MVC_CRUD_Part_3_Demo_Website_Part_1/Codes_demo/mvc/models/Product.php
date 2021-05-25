<?php
//models/Product.php
//NHúng file model cha, tư duy nhúng của MVC: phải đứng từ file index.php gốc để nhúng
require_once 'models/Model.php';
/**
 * class Model tương tác với bảng products
 * Model là mapping/ánh xạ đến bảng của đối tượng tương ứng
 * Ko nên viết code kết nối CSDL ở model Product, sẽ viết ở Model cha
 */
class Product extends Model {
  // KHai báo các thuộc tính của model là các trường của bảng
  public $name;
  public $price;
  public $created_at;
  // Sử dụng đc thuộc tính $connection của model cha
  // Xây dựng phương thức thêm mới vào bảng products
  public function insert() {
    // bảng products: id, name, price, created_at
    // + Viết truy vấn theo cơ chế truyền tham số vào câu truy vấn, để tránh lỗi
    // bảo mật SQL Injection:
    $sql_insert = "INSERT INTO products(name, price) VALUES(:name, :price)";
    // + Cbi obj truy vấn: prepare, đối tượng kết nối CSDL chính là thuộc tính $connection của model cha
    $obj_insert = $this->connection->prepare($sql_insert);
    // + [Tùy chọn] Tạo mảng để truyền giá trị thật cho tham số của câu truy vấn
    $inserts = [
      // Giá trị thật đến từ chính thuộc tính của class
      ':name' => $this->name,
      ':price' => $this->price
    ];
    // + Thực thi obj truy vấn: execute, với truy vấn INSERT, UPDATE, DELETE -> boolean
    $is_insert = $obj_insert->execute($inserts);
    return $is_insert;
  }
  // Phương thức lấy tất cả sp
  public function getAll() {
    // + Tạo truy vấn lấy tất cả sp theo chiều giảm dần của ngày tạo
    $sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
    // + Cbi obj truy vấn: prepare
    $obj_select_all = $this->connection->prepare($sql_select_all);
    // + [Tùy chọn] Tạo mảng => bỏ qua vì truy vấn ko có tham số
    // + Thực thi obj truy vấn, với SELECT ko cần tạo biến chứa kết quả trả về
    $obj_select_all->execute();
    // + Trả về mảng các sp
    $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  // Phương thức lấy sp theo id truyền vào
  public function getOne($id) {
    // + Viết truy vấn dạng tham số, SQL Injection
    $sql_select_one = "SELECT * FROM products WHERE id = :id";
    // + Cbi obj truy vấn: prepare
    $obj_select_one = $this->connection->prepare($sql_select_one);
    // + [Tùy chọn] Tạo mảng truyền giá trị thật cho tham số câu truy vấn nếu có
    $selects = [
      ':id' => $id
    ];
    // + Thực thi obj truy vấn
    $obj_select_one->execute($selects);
    // + Trả về mảng 1 chiều chứa 1 bản ghi duy nhất:
    $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $product;
  }

  //Phương thức cập nhật sp theo id truyền vào
  public function update($id) {
    // + Viết câu truy vấn dạng tham số
    $sql_update = "UPDATE products SET name = :name, price = :price WHERE id = :id";
    // + Cbi obj truy vấn:
    $obj_update = $this->connection->prepare($sql_update);
    // + Tạo mảng truyền giá trị cho tham số câu truy vấn nếu có
    $updates = [
      ':name' => $this->name,
      ':price' => $this->price,
      ':id' => $id
    ];
    // + Thực thi
    $is_update = $obj_update->execute($updates);
    return $is_update;
  }

  // PHương thức xóa sp theo id
  public function delete($id) {
    // + Viết truy vấn dạng tham số
    $sql_delete = "DELETE FROM products WHERE id = :id";
    // + Cbi obj truy vấn
    $obj_delete = $this->connection->prepare($sql_delete);
    // + Tạo mảng:
    $deletes = [
      ':id' => $id
    ];
    // + Thực thi obj truy vấn:
    $is_delete = $obj_delete->execute($deletes);
    return $is_delete;
  }
}