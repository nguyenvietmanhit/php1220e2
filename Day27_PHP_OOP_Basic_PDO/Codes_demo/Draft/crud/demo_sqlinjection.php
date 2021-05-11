<?php
/**
 * demo_sql_injection.php
 * Demo lỗi bảo mật SQL Injection trong câu truy vấn
 * - Là cách tấn công vào câu truy vấn SQL thông qua việc
 * nhập liệu trên form
 * - Với cách truy vấn từ trc đến giờ chắc chắn bị dính
 * lỗi bảo mật này
 * - Demo tìm kiếm sp theo tên
 */
require_once 'database.php';
// Xử lý submit
if (isset($_GET['submit'])) {
  // Để fix lỗi bảo mật SQL Injection, cần xử lý dữ liệu
  //lấy từ form trc khi đưa vào câu truy vấn
  $name = $_GET['name'];
  // + Thực tế khi dùng mysqli luôn phải sử dụng hàm
  //sau khi lấy giá trị từ form
  $name = mysqli_real_escape_string($connection, $name);

  // Truy vấn CSDL, tìm sp có tên chứa biến $name

  // + Viết truy vấn:
  $sql_select_all =
"SELECT * FROM products WHERE name LIKE '%$name%'";
  var_dump($sql_select_all);
  // + Thực thi truy vấn:
  $obj_select_all = mysqli_query($connection,
      $sql_select_all);
  // + Trả về mảng kết hợp từ đối tượng trên
  $products = mysqli_fetch_all($obj_select_all,
      MYSQLI_ASSOC);
  echo "<pre>";
  print_r($products);
  echo "</pre>";
  // Thử nhập chuỗi vào input tìm kiếm
  // 123456' OR name != '
}
?>
<form action="" method="get">
  Nhập tên sp
  <input type="text" name="name" />
  <input type="submit" name="submit" value="Tìm kiếm" />
</form>
