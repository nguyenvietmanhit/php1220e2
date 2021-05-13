<?php
session_start();
require_once 'database.php';
/**
 * crud/update.php
 * Sửa sản phẩm
 * - Về cơ bản, chức năng có thể sử dụng lại từ chức năng thêm mới, tận dụng lại code
 * của form thêm mới
 * - Copy nội dung file create.php
 */
// - Lấy thông tin sản phẩm tương ứng để đổ dữ liệu ra form, code này sẽ viết
//trên logic xử lý submit form
// Url: update.php?id=4
// Xử lý validate cho tham số id trc khi lấy giá trị:

$id = $_GET['id'];
// - Tương tác với CSDL để lấy ra sp theo id: SELECT
// + Viết truy vấn dạng tham số
$sql_select_one = "SELECT * FROM products WHERE id = :id";
// + Cbi obj truy vấn:
$obj_select_one = $connection->prepare($sql_select_one);
// + [Tùy chọn] Tạo mảng truyền giá trị cho tham số câu truy vấn nếu có
$selects = [
  ':id' => $id
];
// + Thực thi obj truy vấn:
$obj_select_one->execute($selects);
// + TRả về mảng kết hợp 1 chiều:
$product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($product);
echo "</pre>";

// - Xử lý submit form
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
    // Cập nhật dữ liệu vào bản ghi tương ứng
    // + Viết truy vấn dạng tham số:
    $sql_update = "UPDATE products SET name=:name, price=:price WHERE id=:id";
    // + Cbi obj truy vấn
    $obj_update = $connection->prepare($sql_update);
    // + [Tùy chọn] Tạo mảng để truyền giá trị cho tham số của câu truy vấn
    $updates = [
      ':name' => $name,
      ':price' => $price,
      ':id' => $id
    ];
    // + Thực thi obj truy vấn:
    $is_update = $obj_update->execute($updates);
//    var_dump($is_update);
    //Test
    if ($is_update) {
      $_SESSION['success'] = "Cập nhật sp thành công";
      header('Location: index.php');
      exit();
    } else {
      $error = "Cập nhật sp thất bại";
    }
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<!--Đổ dữ liệu của sp ra input form-->
<form action="" method="post">
  Nhập tên sp:
  <input type="text" name="name" value="<?php echo $product['name']; ?>" />
  <br />
  Nhập giá sp:
  <input type="number" name="price" value="<?php echo $product['price']; ?>" />
  <br />
  <input type="submit" name="submit" value="Cập nhật" />
</form>
