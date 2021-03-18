<!--demo.php-->
<h1>Demo PHP</h1>
<style>
  h1 {color: red;}
</style>
<script>
  console.log('test');
</script>
<!--Khai báo vùng lam việc của PHP-->
<?php
// Viết code PHP trong thẻ php
echo "Hello, World";
/**
 * Hướng dẫn chạy file .php sử dụng PHPStorm:
 * + Start XAMPP, enable Apache
 * + Đảm bảo file .php nằm trong đường dẫn sau:
 * C:/xampp/htdocs
 * + Giả sử đường dẫn tới file demo.php là:
 * C:/xampp/htdocs/demo.php
 * + Lên trình duyệt gõ url sau: localhost/demo.php
 * - Sử dụng PHPStorm dể chạy file  .php đơn giản nhât
 * mà ko cần qtam đến cáu trúc thư mục đang chứa file đó
 * + Tạo cấu trúc file/thư mục như sau, tạo trong htdocs
 * parent1/parent2/parent3/parent4/demo.php
 * + Chạy thủ công:
 * localhost/parent1/parent2/parent3/parent4/demo.php
 * + Sử dụng PHPStorm, File -> Open, mở thư mục cha gốc
 * mà đang chứa file .php muốn chạy
 */
?>
<input type="text" placeholder="<?php echo 123456; ?>" />

