<?php
session_start();
/**
 * login/form_login.php
 * Demo chức năng Đăng nhập đơn giản
 * login/form_login.php: form đăng nhập
 *      /logout.php: xử lý đăng xuất
 *      /welcome.php: hiển thị thông báo sau khi
 *                    đăng nhập thành công
 */
// - Xử lý nếu đăng nhập r thì ko cho truy cập form login
//nữa
if (isset($_SESSION['username'])) {
  $_SESSION['success'] = 'Bạn đã đăng nhập';
  header('Location: welcome.php');
  exit();
}

// - Xử lý nếu có cookie username -> đăng nhập thành công
if (isset($_COOKIE['username'])) {
  $_SESSION['username'] = $_COOKIE['username'];
  $_SESSION['success'] = 'Tự động login';
  header('Location: welcome.php');
  exit();
}


// Mô tả: nếu username > 3 ký tự -> đăng nhập thành công
// XỬ LÝ SUBMIT FORM
// + Debug
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo biến chứa lỗi
$error = '';
// + Nếu user submit form thì mới xử lý
if (isset($_POST['login'])) {
  // + Tạo biến trung gian
  $username = $_POST['username'];
  $password = $_POST['password'];
  // +  Validate form:
  // Username và password ko đc để trống
  if (empty($username) || empty($password)) {
    $error = 'Username/Password ko đc để trống';
  }
  // + Xử lý logic login chỉ khi ko có lỗi
  if (empty($error)) {
    // Login thành công khi username > 3 ký tự
    if (strlen($username) > 3) {
      // + Lưu cookie username và password khi login
      //thành công nếu user có tích vào Ghi nhớ đăng nhập
      if (isset($_POST['remember'])) {
        setcookie('username', $username,
            time() + 3600);
        setcookie('password', $password,
            time() + 3600);
      }


      // Đăng nhập thành công, chuyển hướng tới file
      //welcome.php, hiển thị 1 message "Đăng nhập thành
      //công" tại file đó
      // Trước khi chuyển hướng, tạo session lưu message
      $_SESSION['success'] = 'Đăng nhập thành công';
      // Session lưu username
      $_SESSION['username'] = $username;
      header('Location: welcome.php');
      //Luôn kết thúc chuyển hướng bằng exit()
      exit();
    } else {
      $error = 'Sai tài khoản hoặc mật khẩu';
    }
  }
}
?>
<h3 style="color: green">
  <?php
  if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
  }
  ?>
</h3>
<h3 style="color: red">
  <?php
  if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
  }
  ?>
</h3>
<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post">
  Username: <input type="text" name="username" value="" />
  <br />
  Password:
  <input type="password" name="password" value="" />
  <br />
  <input type="checkbox" name="remember" value="1" />
  Ghi nhớ đăng nhập
  <br />
  <input type="submit" name="login" value="Login" />
</form>
