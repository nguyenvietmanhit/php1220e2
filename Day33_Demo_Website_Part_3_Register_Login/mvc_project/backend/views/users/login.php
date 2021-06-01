<?php
//views/users/login.php
?>

<form action="" method="post" class="container">
  <h2>Form đăng nhập</h2>
  <div class="form-group">
    <label for="username">Nhập username</label>
    <input type="text" name="username" id="username" class="form-control" />
  </div>
  <div class="form-group">
    <label for="password">Nhập password</label>
    <input type="password" name="password" id="password" class="form-control" />
  </div>
  <div class="form-group">
    <input type="submit" name="submit" value="Đăng nhập" class="btn btn-success" />
    <p>
      Nếu chưa có tài khoản, đăng ký tại <a href="index.php?controller=user&action=register">đây</a>
    </p>
  </div>
</form>
