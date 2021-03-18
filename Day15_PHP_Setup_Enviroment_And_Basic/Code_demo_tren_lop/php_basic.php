<!--php_basic.php-->
<!--Demo code PHP đầu tiên-->
<!DOCTYPE html>
<html>
<head>
    <!--  Ctrl + Space: gợi ý tên biến/hàm
      Ctrl + Alt + L : format code
      -->
    <meta charset="UTF-8"/>
    <title>Code PHP đầu tiên</title>
</head>
<body>
    <h1>Hello world</h1>
    <?php
    // Code PHP phải nằm trong cặp thẻ php
    echo number_format(100000000);
    // Không thể xem đc mã nguồn của PHP khi
    //xem nguồn trang
    // - HTML, CSS, JS ko thể giấu đc
    // - PHP giấu đc mã nguồn
    ?>
</body>
</html>


<?php
// CÁC KHÁI NIỆM CƠ BẢN CỦA PHP, GIỐNG VỚI JS
// 1 - Biến: biến đổi, lưu trữ giá trị
// Sử dụng ký tự $ trước tên biến để khai báo
$name = 'Mạnh';
// Hàm hiển thị giá trị
echo $name;
$age = 31;
echo "<i>$age</i>";
// - Quy tắc đặt tên biến: giống JS
// ko đc bắt đầu bằng số, ko chứa ký tự đặc biệt
// ko trùng với từ khóa của ngôn ngữ đó
// Lỗi cú pháp làm die trang (các code trc đó
//cũng ko chạy đc)
//$1name = 'Mạnh';
//2  Kiểu dữ liệu: nhìn bằng mắt dựa vào giá trị
//đang gán cho biến đó để biết kiểu dữ liệu
// - Integer: kiểu số nguyên
$number = 2;
$check = is_int($number);
//Debug
var_dump($check);
// - Float/double: kiểu số thực, thường dùng float
$number = 3.5;
$check = is_float($number); // true
// - String: chuỗi, đc bao bởi nháy đơn hoặc kép
$string1 = 'String 1';
$string2 = "String 2";
$string3 = "Hello, 'Mạnh' ";
$name = 'nvmanh';
// Nối chuỗi trong PHP dùng ký tự .
echo 'Tôi là: ' . $name;
// Ko cần nối chuỗi bằng cách sử dụng dấu nháy
//kép khi hiển thị chuỗi
echo "Hello: $name";
echo 'Hello: $name';
is_string($string1);
// - Boolean: chỉ chứa 2 giá trị duy nhất là
//true/false, với PHP hoa thường thoải mái 2 gtri
//này
$check = false;
$check1 = False;
$check2 = TRUE;
is_bool($check);
// - NULL: 1 giá trị duy nhất = null
$var1 = NULL;
is_null($var1);
// - Array: kiểu mảng, lưu đc nhiều giá trị
//tại 1 thời điểm
$arr = [1, 2, 'a', true, null, [] ];
is_array($arr);
// - Object: kiểu đối tượng, sẽ học sau

?>