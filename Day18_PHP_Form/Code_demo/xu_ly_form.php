<?php
/**
 * xu_ly_form.php
 * Quy trình xử lý form trong PHP
 * - Đề bài: tạo 1 form nhập tên, hiển thị tên ra
 * màn hình, yêu cầu tên ko đc để trống và phải nhập
 * ít nhất 5 ký tự
 */
// Xử lý submit form phía trên khai báo form HTML
// Các bước xử lý form
// + Debug dựa vào phương thức của form, xem các thông
//tin form gửi lên đã đủ hết hay chưa, và giúp lấy
//giá trị phần tử mảng theo key trực quan hơn
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo các biến chứa thông tin lỗi và kết quả để
// hiển thị ra màn hình
$error = '';
$result = '';
// + Chỉ xử lý form nếu user submit form
if (isset($_POST['submit'])) {
  // Toàn bộ logic xử lý phải nằm trong khối code này
  // + Tạo biến và gán giá trị từ mảng cho dễ thao tác
  $fullname = $_POST['fullname'];
//  var_dump($fullname);
  // + Validate form: kiểm tra dữ liệu nhập từ form,
  // có thể xử lý validate form bằng JS, tuy nhiên
  // luôn phải có bước validate form bằng PHP
  // - Tên ko đc để trống: empty
  // - Tên phải nhập ít nhất 5 ký tự:strlen
  // Logic validate: nếu có lỗi thì đổ vào
  // biến $error
  if (empty($fullname)) {
    $error = "Tên ko đc để trống";
  } elseif (strlen($fullname) < 5) {
    $error = "Tên phải chứa ít nhất 5 ký tự";
  }
  // + Xử lý logic bài toán chỉ khi ko có lỗi nào
  //xảy ra
  if (empty($error)) {
    // Đổ dữ liệu vào biến $result
    $result = "Tên vừa nhập: $fullname";
  }
  // + Hiển thị lỗi và kết quả ra form
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
  Nhập tên của bạn:
  <!-- + Đổ lại dữ liệu đã nhập ra form
   sau khi submit -->
  <input type="text" name="fullname"
         value="<?php echo isset($_POST['fullname'])
           ? $_POST['fullname'] : ''; ?>" />

  <input type="submit" name="submit"
         value="Show thông tin" />
</form>
