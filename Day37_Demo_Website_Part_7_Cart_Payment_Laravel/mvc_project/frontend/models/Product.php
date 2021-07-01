<?php
//models/Product.php;
require_once 'models/Model.php';
class Product extends Model {

  // Lấy sản phẩm có tên chứa từ khóa $search
  public function getProductSearch($search) {
    // + Viết truy vấn dạng tham só: SQL Injection
    // Ký tự % đại diện cho ký tứ bất kỳ trong MySQL
    // sam -> sam, abcsam, ípsam123
    $sql_select_all = "SELECT * FROM products WHERE title LIKE :search";
    // + Cbi obj truy vấn: prepare
    $obj_select_all = $this->connection->prepare($sql_select_all);
    // + Tạo mảng truyền giá trị vào câu truy vấn
    $selects = [
      ':search' => "%$search%"
    ];
    // + Thực thị obj truy vấn: execute
    $obj_select_all->execute($selects);
    // + Trả về mảng kết hợp
    $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $products;
    // Test lại chức năng tìm kiếm

  }

  public function getProductInHomePage($params = []) {
    $str_filter = '';
    if (isset($params['category'])) {
      $str_category = $params['category'];
      $str_filter .= " AND categories.id IN $str_category";
    }
    if (isset($params['price'])) {
      $str_price = $params['price'];
      $str_filter .= " AND $str_price";
    }
    //do cả 2 bảng products và categories đều có trường name, nên cần phải thay đổi lại tên cột cho 1 trong 2 bảng
    $sql_select = "SELECT products.*, categories.name 
          AS category_name FROM products
          INNER JOIN categories ON products.category_id = categories.id
          WHERE products.status = 1 $str_filter";

    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();

    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  /**
   * Lấy thông tin sản phẩm theo id
   * @param $id
   * @return mixed
   */
  public function getById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id");

    $obj_select->execute();
    $product =  $obj_select->fetch(PDO::FETCH_ASSOC);
    return $product;
  }
}

