<?php
session_start();
/**
 * logout.php
 * Xử lý logout tài khoản
 * - Xóa tất cả các session sinh ra lúc đăng
 * nhập thành công
 */
unset($_SESSION['username']);
// Chuyển hướng về trang login
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: demo_login.php');
exit();