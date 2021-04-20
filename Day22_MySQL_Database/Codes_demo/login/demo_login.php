<?php
session_start();
// + Check lỗi bảo mật: nếu đăng nhập thành công
// thì ko cho phép truy cập lại form login nữa
if (isset($_SESSION['username'])) {
  $_SESSION['success'] = 'Bạn đã đăng nhập rồi';
  header('Location: welcome.php');
  exit();
}

// + Ktra nếu tích vào ghi nhớ đăng nhập
//thì là đăng nhập thành công
if (isset($_COOKIE['username']) &&
    isset($_COOKIE['password'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    // Chuyển hướng tới trang đăng nhập thành công
    $_SESSION['success'] =
        'Ghi nhớ đăng nhập thành công';
    header('Location: welcome.php');
    exit();
}

/**
 * demo_login.php
 * Demo chức đăng nhập đơn giản
 * - Chứa form đăng nhập: nhập username, nhập
 * password và checkbox ghi nhớ đăng nhập
 */
// XỬ LÝ SUBMIT FORM
// + Debug
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo biến chứa lỗi, nếu form có lỗi, hiển
//thì lỗi ở trang hiện tại
$error = '';
// + Nếu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian
  $username = $_POST['username'];
  $password = $_POST['password'];
  // + Validate form:
  // Username, password ko đc để trống
  // Username phải lớn hơn 3 ký tự
  if (empty($username) || empty($password)) {
    $error = 'Phải nhập tất cả các trường';
  } elseif (strlen($username) <= 3) {
    $error = 'Username phải > 3 ký tự';
  }
  // + Xử lý logic đăng nhập chỉ khi ko có lỗi nào
  //xảy ra
  if (empty($error)) {
    // Giả sử đăng nhập thành công khi username
    //có định dạng email
    if (filter_var($username,
        FILTER_VALIDATE_EMAIL)) {
      // - Xử lý đăng nhập thành công
      // + Xử lý lưu cookie cho chức năng Ghi nhớ
      // đăng nhập và có tích vào
      // ghi nhớ đăng nhập
      if (isset($_POST['remember'])) {
        setcookie('username', $username,
            time() + 3600);
        // demo
        setcookie('password', $password,
            time() + 3600);
      }
      // + Khi đăng nhập thành công, hiển thị
      // username và 1 thông báo đăng nhập thành công
      // ở file welcome.php
      // + Trước khi chuyển hướng, cần lưu lại
      //các thông tin cần thiết -> dùng session/
      //cookie để lưu, với chức năng đăng nhập
      // -> session để lưu
      $_SESSION['username'] = $username;
      $_SESSION['success'] = 'Đăng nhập thành công';
      // + Hàm chuyển hướng: sau Location: là
      //url / tên file sẽ chuyển hướng tới
      header('Location: welcome.php');
      //Kết thúc header luôn là exit để đảm bảo
      // chuyển hướng thành công trong mọi
      //trường hợp
      exit();
    } else {
      $error = 'Sai tài khoản/mật khẩu';
    }
  }
}
?>

<!--Hiển thị session error nếu có-->
<?php
if (isset($_SESSION['error'])) {
  echo
"<h3 style='color: red'>{$_SESSION['error']}</h3>";
  unset($_SESSION['error']);
}
?>

<!--Hiển thị session success nếu có-->
<?php
if (isset($_SESSION['success'])) {
  echo
  "<h3 style='color: green'>{$_SESSION['success']}</h3>";
  unset($_SESSION['success']);
}
?>


<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post">
  <h1>Form đăng nhập</h1>
  Nhập username
  <input type="text" name="username" value="" />
  <br />
  Nhập mật khẩu:
  <input type="password" name="password" />
  <br />
<!-- Nếu form chỉ có 1 checkbox duy nhất, thì
 name ko cần ở dạng mảng-->
  <input type="checkbox" name="remember" />
  Ghi nhớ đăng nhập
  <br />
  <input type="submit" name="submit"
         value="Đăng nhập" />
</form>

