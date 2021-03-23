<!--php_basic_1.php-->
<?php
// 1 - Ép kiểu dữ liệu trong PHP
// Cho phép thay đổi kiểu dữ liệu của biến
$number = 11.2;
var_dump($number);
// Để ép kiểu, sử dụng từ khóa là tên kiểu dữ liệu
// trước giá trị muốn ép
$number1 = (integer) $number;
var_dump($number1); //int = 11
$string1 = (string) $number;
var_dump($string1);
// Các giá trị sau khi ép về boolean sẽ tương đương
// với false: 0,'0', '', null; ngược lại là true
$bool1 = (boolean) $number; //
var_dump($bool1);
$string = '123456';
$bool2 = (boolean) $string;
var_dump($bool2);
// Hiển thị giá trị boolean ra màn hình
// Nếu giá trị = true -> hiển thị là số 1
// Nếu giá trị = false -> hiển thị là số 0
echo $bool1;

if ($bool1) {

}
$arr = (array) $number;
var_dump($arr);
$object = (object) $number;
var_dump($object);
// 2 - HẰNG
// - Là biến, nhưng ko thể gán lại giá trị khác
//cho hằng
// + Dùng từ khóa const
const MAX = 10;
// + Dùng hàm
define('MIN', 5);
echo MAX; //10
// Ưu tiên dùng const hơn, khi học OOP, để khai
//báo hằng trong 1 class bắt buộc phải dùng const
// Gán lại giá trị cho hằng
//MAX = 4;
// - Một số hằng định nghĩa sẵn trong PHP
echo "<br />";
echo __LINE__; // dòng hiện tại đang gọi đến hằng
echo "<br />";
echo __FILE__;// đường dẫn tuyệt đối/vật lý tới
//file đang gọi hằng này
echo "<br />";
echo __DIR__;//đường dẫn tuyệt đối tới thư mục
//cha gần nhất chứa file đang gọi hằng này

// 3 - Hàm
// + TẬp các dòng code
// + Sử dụng lại
// - Khai báo hàm
function show() {
  echo "hàm show";
}
// - Gọi hàm
show();
// - Phân loại hàm:
// Hàm có sẵn
echo date('d-m-Y H:i:s');
// Hàm tự định nghĩa
// + Hàm ko có tham số
function info() {
    echo "hàm info";
}
info(); //hàm info
// + Hàm có tham số, có giá trị trả về
// Viết hàm tính tổng 3 số
function sum($number1, $number2, $number3) {
    $sum = $number1 + $number2 + $number3;
    // Ko nên echo trong hàm
//    echo $sum;
  // Nên dùng từ khóa return để trả về giá trị
    return $sum;
    // Return kết thúc hàm
//    echo "Chuỗi này có đc hiển thị ko?";
}
// Gọi hàm
$sum1 = sum(1, 2, 3);
echo "Tổng  = $sum";// Tổng = 6
$sum2 = sum(2, 3, 4);
echo "Tổng tiếp theo là: $sum2";
// + Hàm có tham số khởi tạo mặc định, có giá trị
//trả về
// Viết hàm hiển thị tên của ng bất kỳ
function showName($name = 'nvmanh') {
    $string = "Hello, $name";
    return $string;
}
// Gọi hàm
$string1 = showName('ABC');
echo $string1;//Hello, ABC
$string2 = showName();
echo $string2; // Hello, nvmanh


// 4 - Truyền giá trị vào hàm theo kiểu
// tham trị và tham chiếu
// Viết hàm thay đổi giá trị ban đầu của biến
$number = 5;
echo "<br> Giá trị ban đầu number = $number";//5
// Viết hàm thay đổi 1 số nào đó
function changeNumber($n) {
    $n = 0;
    echo "Biến n bên trong hàm = $n";//0
}
// Gọi hàm để set lại giá trị cho $number ban đầu
changeNumber($number);
echo "Sau khi gọi hàm, number = $number";//5
// - Kết luận: như vậy biến $number ko hề bị thay
//đổi giá trị, do truyền giá trị vào hàm đang
//truyền theo kiểu tham trị - chỉ truyền giá trị
// vào hàm, chứ ko phải truyền biến gốc vào.
// Truyền tham trị - tạo ra 1 bản sao của biến gốc
// để truyền vào hàm
// - Truyền tham chiếu: truyền bản gốc vào hàm
$a = 4;
echo "<br /> Ban đầu a = $a"; //4
function changeA(&$number) {
    $number = 0;
    echo "Trong hàm, number = $number";
}
// Gọi hàm
changeA($a);
echo "Sau khi gọi hàm, a = $a"; // ????
// - Tính áp dụng:
// + Truyền tham chiếu hay gặp ở các CMS

?>

