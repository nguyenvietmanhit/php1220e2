<?php
session_start();
/**
 * logout.php
 * Xử lý logout
 * Xóa các session đã tạo lúc login thành công
 *
 */
// Xóa cookie liên quan đến user
setcookie('username', NULL, time() - 1);
setcookie('password', NULL, time() - 1);
unset($_SESSION['username']);
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: form_login.php');
exit();