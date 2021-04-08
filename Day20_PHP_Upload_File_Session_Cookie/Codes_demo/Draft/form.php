<?php
/**
 * form.php
 * Xử lý input radio, checkbox, select
 */
// XỬ LÝ SUBMIT FORM
// + Debug biến liên quan
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + Ktra nếu submit form r thì mới xử lý đc
if (isset($_POST['submit'])) {
  // + Tạo và gán biến trung gian
//  Gán kiểu sau là chưa an toàn
//  $gender = $_POST['gender'];
//  $jobs = $_POST['jobs'];
  $country = $_POST['country'];
  $description = $_POST['description'];
  //Thử test ko nhập/ko chọn gì -> submit form -> bị lỗi
  // do trong code đang thao tác với key ko tồn tại
  // của mảng $_POST
  // Với radio/checkbox, luôn cần phải kiểm tra nếu tồn
  //tại key thì mới thao tác đc, để tránh case ko tích
  //vào radio/checkbox nào -> dùng hàm isset
  // + Validate form:
  // Gender và checkbox bắt buộc phải tích
  if (!isset($_POST['gender'])) {
    $error = 'Phải chọn giới tính';
  } elseif (!isset($_POST['jobs'])) {
    $error = 'Phải chọn nghề nghiệp';
  }
  // - Xử lý logic hiển thị thông tin form chỉ khi ko
  // có lỗi xảy ra
  if (empty($error)) {
    // Hiển thị giới tính, có thể gán trung đc vì đã
    //xử lý validate ko tồn tại r
    $gender = $_POST['gender'];
    $result .= "Giới tính vừa chọn: ";
    switch ($gender) {
      case 1: $result .= " Nam"; break;
      case 2: $result .= " Nữ";break;
      case 3: $result .= " Khác";
    }
    // Hiển thị nghề nghiệp
    $jobs = $_POST['jobs'];
    $result .= "<br /> Nghề nghiệp: ";
    foreach ($jobs AS $job) {
      switch ($job) {
        // Chú ý break trong switch case chỉ thoát khỏi
        //switch case, ko thoát foreach
        case 1: $result .= " Dev ";break;
        case 2: $result .= " Tester ";break;
        case 3: $result .= " BA ";
      }
    }
    // Hiển thị quốc gia: select
    $result .= "<br />Quốc gia: ";
    switch ($country) {
      case 1: $result .= " VN";break;
      case 2: $result .= " USA";break;
      case 3: $result .= " JP";
    }
    // Hiển thị Mô tả thêm: textarea
    $result .= "<br /> Mô tả thêm: $description";
  }
}
?>
<!-- + Hiển thị error và result ra form -->
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!-- + Đổ dữ liệu ra form -->
<form action="" method="post">
  Chọn giới tính
<!-- Với radio cần khai báo value để PHP biết đc
 radio vừa chọn là gì-->
<!-- Name của radio ở dạng đơn vì chỉ chọn 1 trong
 nhiều -->
  <?php
  // + Đổ lại dữ liệu cho radio vào thuộc tính checked
  // Có bao nhiêu radio tạo bấy nhiêu biến để set checked
  $gender_male = '';
  $gender_female = '';
  $gender_another = '';
  if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    switch ($gender) {
      case 1: $gender_male = 'checked';break;
      case 2: $gender_female = 'checked';break;
      case 3: $gender_another = 'checked';
    }
  }
  ?>
  <input type="radio" name="gender" value="1"
   <?php echo $gender_male; ?> /> Nam
  <input type="radio" name="gender" value="2"
  <?php echo $gender_female; ?>/> Nữ
  <input type="radio" name="gender" value="3"
  <?php echo $gender_another; ?>/> Khác
  <br />
  Chọn nghề nghiệp:
<!-- Với checkbox, nếu có >= 2 checkbox thì name bắt
 buộc phải ở dạng mảng
 Checkbox dựa vào value để gửi dữ liệu lên PHP-->
  <?php
  // + Đổ lại dữ liệu cho checkbox, dựa vào thuộc tính
  //checked
  // Có bao nhiêu checkbox có bấy nhiêu biến set checked
  $job_dev = '';
  $job_tester = '';
  $job_ba = '';
  if (isset($_POST['jobs'])) {
    $jobs = $_POST['jobs'];
    foreach ($jobs AS $job) {
      switch ($job) {
        case 1: $job_dev = 'checked';break;
        case 2: $job_tester = 'checked';break;
        case 3: $job_ba = 'checked';
      }
    }
  }
  ?>
  <input <?php echo $job_dev; ?> type="checkbox" name="jobs[]" value="1" /> Dev
  <input <?php echo $job_tester; ?> type="checkbox" name="jobs[]" value="2" /> Tester
  <input <?php echo $job_ba; ?> type="checkbox" name="jobs[]" value="3" /> BA
  <br />
  Chọn quốc gia:
<!-- Cần khai báo value cho option để gửi dữ liệu lên
 PHP-->
  <?php
  // + Đổ lại dữ liệu cho quốc gia: select, sử dụng
  //thuộc tinh selected tại option tương ứng
  // Select chọn 1 trong nhiều xử lý giống hệt radio
  $country_vn ='';
  $country_usa ='';
  $country_jp ='';
  if (isset($_POST['country'])) {
    $country = $_POST['country'];
    switch ($country) {
      case 1: $country_vn = 'selected';break;
      case 2: $country_usa = 'selected';break;
      case 3: $country_jp = 'selected';
    }
  }
  ?>
  <select name="country">
    <option <?php echo $country_vn; ?> value="1">VN</option>
    <option <?php echo $country_usa; ?> value="2">USA</option>
    <option <?php echo $country_jp; ?> value="3">JP</option>
  </select>
  <br />
  Mô tả thêm:
  <?php
  // + Đổ dữ liệu vào textarea, đổ vào nội dung giữa
  //cặp thẻ, chú ý ko đc có dấu cách giữa cặp thẻ này
  $description = isset($_POST['description']) ?
      $_POST['description'] : '';
  ?>
  <textarea name="description"><?php echo $description; ?></textarea>
  <br />
  <input type="submit" name="submit" value="Show info" />
</form>
