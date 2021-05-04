crud<?php
session_start();
require_once 'database.php';
/**
 * crud/update.php
 * Form cập nhật sản phẩm
 * Thường form cập nhật giống hệt form thêm mới, chỉ khác
 * ở dữ liệu mặc định đổ ra form -> copy form HTML
 * thêm mới -> paste sang form cập nhật
 */
// - Validate tham số id trên url
//update.php
//update.php?id=dsadsa
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  $_SESSION['error'] = 'Id ko hợp lệ';
  header('Location: index.php');
  exit();
}
$id = $_GET['id'];
// - Lấy dữ liệu của bản ghi tương ứng đổ ra form
// + Viết truy vấn:
$sql_select_one = "SELECT * FROM products 
WHERE id = $id";
// + Thực thi truy vấn, với SELECT trả về obj trung gian:
$obj_result_one = mysqli_query($connection,
    $sql_select_one);
// + Trả về mảng kết hợp 1 chiều
$product = mysqli_fetch_assoc($obj_result_one);

// - Xử lý submit form, tương tự như Thêm mới
// + Debug
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// + Tạo biến chứa lỗi
$error = '';
// + Nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian
  $name = $_POST['name'];
  $price = $_POST['price'];
  $avatar_arr = $_FILES['avatar'];
  // + Validate form: giống hệt thêm mới
  // + Xử lý upload file nếu có và cập nhật dữ liệu
  // chỉ khi ko có lỗi
  if (empty($error)) {
    // + Xử lý upload file nếu có
    // KHởi tạo biến chứa tên file đang có của sp
    $avatar = $product['avatar'];
    if ($avatar_arr['error'] == 0) {
      // Xóa ảnh cũ đi tránh rác hệ thống,
      // ký tự @ hack ko báo lỗi nếu xóa
      // 1 file ko tồn tại
      @unlink('uploads/' . $avatar);
      // Bỏ qua bước tạo thư mục uploads vì luôn tồn tại
      // r - đã xử lý khi thêm mới
      // Sinh file mang tính duy nhất
      $avatar = time() . "-" . $avatar_arr['name'];
      move_uploaded_file($avatar_arr['tmp_name'],
          "uploads/$avatar");
    }
    // + Tương tác với CSDL để update dữ liệu
    // Viết truy vấn:
    $sql_update = "UPDATE products 
    SET name='$name', price=$price, avatar='$avatar'
    WHERE id = $id";
    // Thực thi
    $is_update = mysqli_query($connection, $sql_update);
    if ($is_update) {
      $_SESSION['success'] = 'Update thành công';
      header('Location: index.php');
      exit();
    } else {
      $error = 'Update thất bại';
    }
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h1>Form cập nhật sản phẩm</h1>
<form action="" method="post"
      enctype="multipart/form-data">
  Tên sp:
  <input type="text" name="name"
 value="<?php echo $product['name']; ?>" />
  <br />
  Giá sp:
  <input type="number" name="price"
 value="<?php echo $product['price']; ?>" />
  <br />
  Ảnh sp:
  <input type="file" name="avatar" />
  <img src="uploads/<?php echo $product['avatar']; ?>"
  height="80" />
  <br />
  <input type="submit" name="submit" value="Cập nhật" />
  <a href="index.php">Back</a>
</form>
