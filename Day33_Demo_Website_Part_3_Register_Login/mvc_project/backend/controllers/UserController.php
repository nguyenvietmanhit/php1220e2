<?php
require_once 'controllers/Controller.php';

class UserController extends Controller {

  // index.php?controller=user&action=register
  // Đăng ký tài khoản user
  public function register() {
    // Gọi view
    // + Lấy nội dung view:
    $this->content = $this->render('views/users/register.php');
    // + Gọi layout để hiển thị, cần tạo 1 layout khác để hiển thị
    // Copy file layout chính, giữ nguyên nhúng file css, js, chỉ thay đổi phần body cho
    // phù hợp -> copy file main.php -> main_login.php
    require_once 'views/layouts/main.php';
  }
}