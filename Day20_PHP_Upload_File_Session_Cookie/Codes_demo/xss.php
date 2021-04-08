<?php
/**
 * xss.php
 * Demo lỗi bảo mật trong form: tấn công XSS
 * Cross-Site Scripting: tấn công bằng các đoạn
 * code Javascript
 */
// Xử lý form
// + NẾu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // Thử nhập name sau, thấy xuất hiện alert
  // -> form đang bị lỗi XSS
  // <script>alert(document.cookie)</script>
  // + Cách chống: ko hiển thị thẳng data từ form
  // cho chạy qua hàm chuyển đổi các ký tự đặc
  ////biệt thành ký tự an toàn
  $name = $_POST['name'];
  // + Web thực tế luôn cần sử dụng hàm này trc
  //khi hiển thị ra màn hình
  $name = htmlspecialchars($name);
//  $name = htmlentities($name);
  echo $name;
}
// - Lỗi bảo mật CSRF: giả mạo người thao tác với
//form -> tự tìm hiểu
?>
<form action="" method="post">
  Nhập tên:
  <input type="text" name="name" />
  <br />
  <input type="submit"
         name="submit" value="Show" />
</form>
