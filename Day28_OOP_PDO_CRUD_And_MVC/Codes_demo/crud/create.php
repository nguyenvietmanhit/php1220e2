<?php
session_start();
require_once 'database.php';
/**
 * crud/create.php
 * Chức năng thêm mới sản phẩm:
 * products: id, name, price, created_at
 */
// Xử lý submit form
// + Debug:
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo biến chứa lỗi
$error = '';
// + Chỉ xử lý form nếu user submit form:
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian
  $name = $_POST['name'];
  $price = $_POST['price'];
  // + Validate form: nếu có lỗi thì đổ vào biến $error
  // + Xử lý dữ liệu từ form chỉ khi ko có lỗi xảy ra
  if (empty($error)) {
    // Insert vào bảng products, cần sử dụng đối tượng $connection
    // kết nối từ file database.php, cần nhúng file
    // + Viết truy vấn sử dụng tham số để tránh lỗi bảo mật SQLInjection
    $sql_insert = "INSERT INTO products(name,price) VALUES(:name,:price)";
    // + Cbi đối tượng truy vấn: prepare
    $obj_insert = $connection->prepare($sql_insert);
    // + [Tùy chọn] Tạo mảng để truyền giá trị vào tham số cho câu truy vấn:
    $inserts = [
      ':name' => $name,
      ':price' => $price
    ];
    // + Thực thi đối tượng truy vấn: execute
    $is_insert = $obj_insert->execute($inserts);
//    var_dump($is_insert);
    //Test file
    if ($is_insert) {
      $_SESSION['success'] = 'Thêm sp thành công';
      // Chuyển hướng
      header('Location: index.php');exit();
    } else {
      $error = 'Thêm sp thất bại';
    }
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post">
  Nhập tên sp:
  <input type="text" name="name" value="" />
  <br />
  Nhập giá sp:
  <input type="number" name="price" value="" />
  <br />
  <input type="submit" name="submit" value="Lưu" />
</form>
