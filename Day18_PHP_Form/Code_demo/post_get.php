<?php
/**
 * post_get.php
 * Chi tiết về phương thức POST và GET trong form
 */
// 1 - Đặc điểm của phương thức GET
// + Dữ liệu của form đổ lên url theo dạng sau:
// <URL>?name1=value1&name2=value2&.....
// + PHP tạo ra sẵn 1 biến chứa tất cả thông tin gửi
// lên từ form dạng GET: $_GET: dạng mảng
// Debug:
echo "<pre>";
print_r($_GET);
echo "</pre>";
// + Khi mới tải form, mảng $_GET là mảng rỗng
// + Khi submit form, mảng $_GET sẽ có các phần tử
// Lấy giá trị gửi lên
// + CHÚ Ý: luôn phải chờ user submit form xong thì
// lấy đc dữ liệu
// Về code, luôn kiểm tra sự tồn tại mảng dựa theo
//name của nút submit, sử dụng hàm sau: isset
// Hàm isset luôn được dùng để kiểm tra 1 mảng có tồn
//tại phần tử mảng nào theo key cho trước hay ko
if (isset($_GET['submit']) == TRUE) {
  $name = $_GET['name'];
  $age = $_GET['age'];
  echo "Tên vừa nhập = $name <br />";
  echo "Tuổi vừa nhập = $age <br />";
}
// - GET ko sử dụng cho các dữ liệu nhập dạng
//nhạy cảm như password, pass ngân hàng

?>
<h1>Form dùng GET</h1>
<form method="GET" action="">
  Nhập tên:
  <input type="text" name="name" /> <br />
  Nhập tuổi:
  <input type="number" name="age" /><br />
  <input type="submit" name="submit" value="Gửi" />
</form>


<?php
//2 - Phương thức POST
// + Gửi dữ liệu dạng ngầm, ko hiển thị lên url
// + Bảo mật hơn GET
// + PHP có sẵn 1 biến mảng $_POST chứa thông tin
// dữ liệu gửi lên từ form
// + Cơ chế xử lý dữ liệu với POST và GET giống nhau
echo "<pre>";
print_r($_POST);
echo "</pre>";
// 3 - Biến $_REQUEST
// + Biến dạng mảng có sẵn của PHP, chứa thông tin của
// $_POST, $_GET và $_COOKIE
// + Nên sử dụng $_POST hoặc $_GET thay vì $_REQUEST
// để lấy dữ liệu từ form
// 4 - Biến $_SERVER
// + Là biến dạng mảng có sẵn của PHP, chứa thông tin
//của máy chủ đang chạy PHP
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
?>
<form action="" method="post">
    Nhập username:
    <input type="text" name="username" /> <br />
    Nhập password:
    <input type="password" name="password" /> <br />
    <input type="submit" name="login" value="Login" />
</form>
