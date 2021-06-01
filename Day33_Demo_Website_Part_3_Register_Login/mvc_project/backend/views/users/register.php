<?php
//views/users/register.php
// View cho chức năng đky user, dựng form bằng Boostrap
?>
<form action="" method="post" class="container">
  <h2>Form đăng ký tài khoản</h2>
  <div class="form-group">
<!--  for của label trùng id của input để tạo hiệu ứng: click vào label tự động nhảy vào ô nhập input  -->
    <label for="username">Nhập username</label>
    <input type="text" name="username" id="username" class="form-control" value="" />
  </div>
  <div class="form-group">
    <label for="password">Nhập password</label>
    <input type="password" name="password" id="password" class="form-control" />
  </div>
<!-- Cần thêm 1 trường Nhập lại password:  -->
  <div class="form-group">
    <label for="password_confirm">Nhập lại password</label>
    <input type="password" name="password_confirm" id="password_confirm" class="form-control" />
  </div>
  <div class="form-group">
    <input type="submit" value="Đăng ký" name="submit" class="btn btn-primary" />
    <p>
      Nếu đã tài khoản, đăng nhập tại <a href="index.php?controller=user&action=login">đây</a>
    </p>
  </div>
</form>
<!--Nghỉ giải lao 15p-->