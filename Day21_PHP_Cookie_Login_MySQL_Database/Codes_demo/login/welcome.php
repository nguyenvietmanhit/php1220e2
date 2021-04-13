<?php
session_start();
/**
 * login/welcome.php
 */
// + Ktra nếu chưa login thì cho truy cập vào file này,
//dựa vào key=username
if (!isset($_SESSION['username'])) {
  $_SESSION['error'] = 'Bạn cần đăng nhập';
  header('Location: form_login.php');
  exit();
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>
<h3 style="color: green">
  <?php
  if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    //Hiển thị xong xóa luôn -> session dạng flash
    unset($_SESSION['success']);
  }
  ?>
</h3>
<b>Chào bạn, <?php echo $_SESSION['username']; ?></b>
<a href="logout.php">Logout</a>
