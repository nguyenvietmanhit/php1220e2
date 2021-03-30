<?php
/**
 * form_1.php
 */



// CÁC BƯỚC XỬ LÝ SUBMIT FORM
// CODE PHP xử lý submit đặt trước khai báo HTML form
// - Debug biến liên quan đến form: $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";
// - Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// - Chỉ xử lý submit nếu user click vào nút Submit, vì
//khi đó mới lấy đc các giá trị từ form gửi lên
// Kiểm tra tồn tại phần tử mảng nào có key trùng với
//name của nút submit hay ko: isset
if (isset($_POST['submit']) == TRUE) {
  // - Tạo biến trung gian để thao tác cho dễ (option)
  $fullname = $_POST['fullname'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  // - Validate form: rất quan trọng, ktra dữ liệu từ
  //người dùng, nếu có lỗi thì đổ vào biến $error
  // Valiate form bằng PHP là bắt buộc phải có, kể cả
  // đã validate form bằng JS từ trước
  // + Tất cả các trường ko đc để trống: empty
  // + Tên phải ít nhất 3 ký tự: strlen
  // + Tuổi phải là số: is_numeric
  // + Email phải đúng định dạng: filter_var
  if (empty($fullname) || empty($age) || empty($email)) {
    $error = 'Phải nhập tất cả trường';
  } elseif (strlen($fullname) < 3) {
    $error = 'Tên ít nhất 3 ký tự';
  } elseif (!is_numeric($age)) {
    $error = 'Tuổi phải nhập số';
  } elseif (!filter_var($email,
      FILTER_VALIDATE_EMAIL)) {
    $error = 'Email chưa đúng định dạng';
  }
  // - Xử lý logic bài toán chỉ khi ko có lỗi nào xảy ra
  if (empty($error)) {
    // Hiển thị vào biến result theo kiểu nối chuỗi
    $result .= "Tên: $fullname <br />";
    $result .= "Tuổi: $age <br />";
    $result .= "Email: $email";
  }
}
?>
<!-- - Hiển thị error và result ra màn hình-->
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!--- Đổ lại dữ liệu đã nhập ra form-->
<form action="" method="post">
  Nhập tên:
  <input type="text" name="fullname"
value="<?php echo isset($_POST['fullname']) ?
$_POST['fullname'] : '';
?>" />
  <br />
  Nhập tuổi:
  <input type="text" name="age" value="" /><br />
  Nhập email:
  <input type="text" name="email" value="" /><br />
  <input type="submit" name="submit" value="Show" />
</form>


