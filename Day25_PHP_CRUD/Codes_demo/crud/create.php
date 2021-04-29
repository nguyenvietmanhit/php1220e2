<?php
session_start();
// Nhúng file database.php để sử dụng đc biến
// kết nối
// 2 cơ chế nhúng file: include, require
require_once 'database.php';
/**
 * crud/create.php
 * Form thêm mới sp
 * products: id,name,price,avatar,created_at
 */
// Xử lý submit form
// + Debug: xem thông tin biến
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// + Khai báo biến chứa lỗi
$error = '';
// + Nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo và gán biến để thao tác cho dễ
  $name = $_POST['name'];
  $price = $_POST['price'];
  $avatars = $_FILES['avatar'];
  // + Validate form:
  // Tên và giá phải nhập
  // Tên ít nhất 3 ký tự
  // File upload phải là ảnh, dung lượng max = 2Mb
  if (empty($name) || empty($price)) {
    $error = 'Tên hoặc giá ko đc để trống';
  } elseif (strlen($name) < 3) {
    $error = 'Tên ít nhất 3 ký tự';
  } elseif (!is_numeric($price)) {
    $error = 'Giá phải là số';
  } elseif ($avatars['error'] == 0) {
    // File upload phải là ảnh
    $extension = pathinfo($avatars['name'],
        PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    var_dump($extension);
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extension, $allowed)) {
      $error = 'File upload phải là ảnh';
    }
    // Dung lượng tối đa 2Mb
    $size_b = $avatars['size'];
    // 1Mb = 1024KB = 1024 * 1024 B
    $size_mb = $size_b / 1024 / 1024;
    $size_mb = round($size_mb, 2);
    if ($size_mb > 2) {
      $error = 'File max = 2Mb';
    }

    // + Xử lý logic chính bài toán chỉ khi ko
    // lỗi nào xảy ra
    if (empty($error)) {
      // + Xử lý upload file nếu có
      $avatar = '';
      if ($avatars['error'] == 0) {
        $dir_uploads = 'uploads';
        // Nếu chưa tồn tại thì mới tạo
        if (!file_exists($dir_uploads)) {
          mkdir($dir_uploads);
        }
        // Sinh tên file mang tính duy nhất
        $avatar = time() . "-" . $avatars['name'];
        // Upload file vào thư mục uploads
        move_uploaded_file($avatars['tmp_name'],
            "$dir_uploads/$avatar");
      }
      // + Thêm data vào bảng products
      // Cần kết nối CSDL
      //products: id,name,price,avatar,created_at
      // - Viết truy vấn:
      $sql_insert = "INSERT INTO 
products(name,price,avatar) 
VALUES('$name', $price, '$avatar')";
      // - Thực thi truy vấn:
      $is_insert = mysqli_query($connection, $sql_insert);
      if ($is_insert) {
          $_SESSION['success'] = 'Thêm mới thành công';
          header('Location: index.php');
          exit();
      } else {
          $error = 'Thêm mới thất bại';
      }

    }
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form thêm mới sp</h2>
<form action="" method="post"
      enctype="multipart/form-data">
  Nhập tên sp:
  <input type="text" name="name" value="" />
  <br />
  Nhập giá sp:
  <input type="text" name="price" value="" />
  <br />
  Tải ảnh đại diện:
  <input type="file" name="avatar" />
  <br />
  <input type="submit" name="submit" value="Lưu" />
  <a href="index.php">Về trang danh sách</a>
</form>

