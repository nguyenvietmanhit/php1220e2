<?php
session_start();
/**
 * welcome.php
 */
//Nếu chưa đăng nhập thì ko cho truy cập trang này
if (!isset($_SESSION['username'])) {
  $_SESSION['error'] = 'Bạn chưa đăng nhập';
  header('Location: form_login.php');
  exit();
}

//Debug
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>
<h1><?php echo $_SESSION['success']; ?></h1>
Chào bạn, <b><?php echo $_SESSION['username']; ?></b>
<a href="logout.php">Logout</a>