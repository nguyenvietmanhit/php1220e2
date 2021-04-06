<?php
/**
 * demo_form.php
 * Xử lý form với các input radio, checkbox,
 * select, textarea
 */
// XỬ LÝ SUBMIT FORM
// + Debug biến liên quan
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Khai báo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + Chỉ xử lý submit form nếu user
// click nút Submit, dựa vào name của nút submit
// Sử dụng hàm isset để kiểm mảng có tồn tại phần
//tử theo key cho trước hay ko
if (isset($_POST['info'])) {
  // + Tạo và gán biến trung gian để thao tác
  //cho dễ
  $name = $_POST['name'];
  // - Chú ý: với radio và checkbox, nếu ko tích
  //chọn thì PHP sẽ ko bắt được dữ liệu gửi lên
  // Nên khai báo 2 biến $gender và $jobs như sau
  // là ko chắc chắn
  // - Khi xử lý radio và checkbox, luôn cần check
  //nếu tồn tại thì mới thao tác đc -> isset
  //$gender = $_POST['gender'];
  //$jobs = $_POST['jobs'];
  $country = $_POST['country'];
  $note = $_POST['note'];
  // + Validate form: đổ thông tin lỗi vào $error
  // - Tất cả trường ko đc để trống
  // - Tên phải có định dạng email
  // - Tên ít nhất 5 ký tự
  if (empty($name)) {
    $error = 'Phải nhập tên';
  } elseif (!isset($_POST['gender'])) {
    $error = 'Phải chọn giới tính';
  } elseif (!isset($_POST['jobs'])) {
    $error = 'Phải chọn nghề nghiệp';
  } elseif (empty($note)) {
    $error = 'Phải nhập Ghi chú thêm';
  }
  // Validate email: filter_var
  elseif (!filter_var($name,
      FILTER_VALIDATE_EMAIL)) {
    $error = 'Tên phải có định dạng email';
  } elseif (strlen($name) < 5) {
    $error = 'Tên ít nhất 5 ký tự';
  }
  // + Xử lý logic bài toán chỉ khi ko có lỗi
  //nào xảy ra
  if (empty($error)) {
    $result .= "Thông tin vừa nhập: <br />";
    $result .= "Tên: $name <br />";
    // Hiển thị radio cần hiển thị tên có ngữ nghĩa
    $gender = $_POST['gender'];
    $result .= "Giới tính: ";
    switch ($gender) {
      case 0: $result .= "Nữ";break;
      case 1: $result .= "Nam";break;
      default: $result .= "Khác";
    }
    $result .= "<br />";
    // Xử lý checkbox
    $jobs = $_POST['jobs'];
    $result .= "Nghề nghiệp: ";
    foreach ($jobs AS $job) {
      switch ($job) {
        case 0: $result .= "Dev";break;
        case 1: $result .= "Tester";break;
        case 2: $result .= "BA"; break;
      }
    }
    $result .= "<br />";
    // Xử lý select option
    switch ($country) {
      case 0: $result .= "Quốc gia: VN <br />";
        break;
      case 1: $result .= "Quốc gia: JP <br />";
        break;
      case 2: $result .= "Quốc gia: KR <br />";
        break;
    }
    // Xử lý textarea
    $result .= "Ghi chú thêm: $note";
  }
}

?>
<!--
+ Đổ lại dữ liệu ra form sau khi submit
-->
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<h1>Form mô tả thông tin</h1>
<form action="" method="POST">
  Nhập tên:
  <input type="text" name="name"
    value="<?php echo isset($_POST['name']) ?
    $_POST['name'] : '' ?>" />
  <br />
  Chọn giới tính:
<!-- Bắt buộc phải khai bao value cho radio
 , để PHP bắt đc dữ liệu tương ứng -->
  <?php
  // Radio dựa vào thuộc tính checked để tích
  //mặc định, về quy tắc có bao nhiêu radio thì
  //tạo tương ứng biến checked
  $checked_female = '';
  $checked_male = '';
  $checked_another = '';
  if (isset($_POST['gender'])) {
    switch ($_POST['gender']) {
      case 0: $checked_female = 'checked';break;
      case 1: $checked_male = 'checked';break;
      case 2: $checked_another = 'checked';break;
    }
  }
  ?>
  <input type="radio" <?php echo $checked_female; ?>
         name="gender" value="0" /> Nữ
  <input type="radio" <?php echo $checked_male; ?>
         name="gender" value="1" /> Nam
  <input type="radio"
         name="gender" <?php echo $checked_another; ?>
         value="2" /> Khác
  <br />
<!-- Checkbox cần khai báo value như radio -->
  Chọn nghề nghiệp:
  <?php
  // Đổ lại dữ liệu cho checkbox cũng tạo các biến
  // tương ứng giống radio
  // Checked, sử dụng hàm in_array để ktra giá trị
  //có nằm trong mảng hay ko
  ?>
  <input type="checkbox"
         name="jobs[]" value="0" />Dev
  <input type="checkbox"
         name="jobs[]" value="1" /> Tester
  <input type="checkbox"
         name="jobs[]" value="2" /> BA
  <br />
  Chọn quốc gia:
<!-- Bắt buộc phải khai báo value cho option -->
  <?php
  // Có bao nhiêu option tạo tương ứng biến
  // Với select là selected trên option tương ứng
  ?>
  <select name="country">
    <option value="0">VN</option>
    <option value="1">JP</option>
    <option value="2">KR</option>
  </select>
  <br />
  Ghi chú thêm:
  <textarea name="note"><?php echo isset($_POST['note'])
        ? $_POST['note'] : '' ?></textarea>
  <br />
  <input type="submit" name="info"
         value="Gửi thông tin" />
  <input type="reset" value="Xóa thông tin form" />
</form>
