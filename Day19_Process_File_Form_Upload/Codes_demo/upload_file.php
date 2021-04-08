<?php
/**
 * upload_file.php
 * Xử lý upload file trong form PHP
 */
// + Thử debug $_GET: ko bắt được dữ liệu của file
// + Thử debug $_POST: chưa bắt đc dữ liệu file
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + PHP tạo ra 1 biến có sẵn là $_FILES chứa
//toàn bộ thông tin về file: mảng 2 chiều
echo "<pre>";
print_r($_FILES);
echo "</pre>";
// - Để bắt được dữ liệu file, bắt buộc form phải
//thỏa mãn 2 điều kiện sau:
// + Method = POST
// + Thêm enctype='multipart/form-data' vào thẻ
//form

// XỬ LÝ SUBMIT FORM
// + Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// + Nếu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian
  $name = $_POST['name'];
  $avatars = $_FILES['avatar'];
  // + Validate form:
  // - Tên phải nhập
  // - File upload phải là ảnh
  // - File upload dung lượng <= 2Mb
  if (empty($name)) {
    $error = 'Tên phải nhập';
  }
  // - Luôn luôn kiểm tra nếu có file tải lên thì
  //mới xử lý validate file, dựa vào key = error
  elseif ($avatars['error'] == 0) {
    // - File phải là ảnh
    // Lấy đuôi file:
    $extension = pathinfo($avatars['name'],
        PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    // Tạo mảng chứa các đuôi file hợp lệ
    $allowed = ['jpg', 'png', 'gif', 'jpeg'];
    // Ktra đuôi file tồn tại trong mảng hay ko
    if (!in_array($extension, $allowed)) {
      $error = 'File phải là ảnh';
    }
    // - File phải <= 2MB
    // Mặc định key=size có đơn vị = Byte (B)
    // 1MB = 1024KB = 1024 * 1024 B
    $file_b = $avatars['size'];
    // Chuyển từ Byte về MB
    $file_mb = $file_b / 1024 / 1024;
//    var_dump($file_mb);
    // Giữ lại 2 số thập phân
    $file_mb = round($file_mb, 2);
//    var_dump($file_mb);
    if ($file_mb > 2) {
      $error = 'File phải <= 2MB';
    }
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="POST"
      enctype="multipart/form-data">
  Nhập tên:
  <input type="text" name="name" value="" />
  <br />
  Upload ảnh đại diện:
  <input type="file" name="avatar" />
  <br />
  <input type="submit" name="submit"
         value="Upload" />
</form>
