<?php
session_start();
/**
 * logout.php
 * Xử lý logout tài khoản
 * - Xóa tất cả các session sinh ra lúc đăng
 * nhập thành công
 */
// Xóa cookie đã lưu ở Ghi nhớ đăng nhập
setcookie('username',
    '', time() - 1);
setcookie('password', '',
    time() - 1);
unset($_SESSION['username']);
// Chuyển hướng về trang login
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: demo_login.php');
exit();