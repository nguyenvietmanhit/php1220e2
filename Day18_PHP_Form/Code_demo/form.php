<?php
/**
 * form.php
 * Xử lý form trong PHP
 * - Nhìn bằng mắt thường, có input để nhập dữ liệu
 * thì là form, có nút gửi thông tin đi
 * - User nhập thông tin vào form, khi click nút
 * gửi thông tin đi -> PHP sẽ xử lý thông tin đó
 * - Form có 2 dạng dữ liệu chính:
 * Dạng cơ bản: text, số ...
 * Dạng file
 * - Có thể ko cần form mà vẫn lấy đc dữ liệu, thông
 * qua cơ chế Ajax của Javascript
 */
?>
<h1>Khai báo form</h1>
<!--
- action: đường dẫn xử lý dữ liệu gửi lên từ form,
nếu là giá trị rỗng chính là url/file hiện tại sẽ
xử lý thông tin từ form gửi lên
- method: phương thức gửi dữ liệu đi, có 2 method:
POST: dữ liệu truyền ngầm, bảo mật hơn GET
GET: dữ liệu từ form đổ lên url
-->
<form action="" method="POST">
  <h3>Form đăng nhập</h3>
  Nhập username:
<!--
 Bắt buộc phải khai báo thuộc tính name cho input,
 để PHP biết được dữ liệu gửi lên từ input này
 -->
  <input type="text" name="username" value="" />
  <br />
  Nhập mật khẩu:
  <input type="password" name="password" />
  <br />
<!-- Form không thể thiếu nút gửi thông đi -
 nút Submit form
 -->
  <input type="submit"
         name="login" value="Đăng nhập" />
</form>
