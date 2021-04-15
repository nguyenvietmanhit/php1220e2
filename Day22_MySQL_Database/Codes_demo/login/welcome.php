<?php
session_start();
/**
 * welcome.php
 * + Tạo cùng cấp với file demo_login.php
 * + Hiển thị thông tin user vừa đăng nhập
 * thành công
 */
// + Thử mở trình duyệt ẩn: truy cập vào file
//welcome.php -> vẫn truy cập đc là sai, cần xử
//lý nếu chưa login ko cho phép truy cập
if (!isset($_SESSION['username'])) {
  $_SESSION['error'] = 'Bạn chưa đăng nhập';
  header('Location: demo_login.php');
  exit();
}

// Debug session
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
$username = $_SESSION['username'];
// Chỉ hiển thị session dạng message 1 lần duy nhất
// bằng cơ chế: sau khi echo sẽ xóa luôn
// -> dạng flash
if (isset($_SESSION['success'])) {
  $success = $_SESSION['success'];
  echo "<h2>$success</h2>";
  unset($_SESSION['success']);
}

echo "Chào bạn, $username";
echo "<a href='logout.php'>Thoát tài khoản</a>";