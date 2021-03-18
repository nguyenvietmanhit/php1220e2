<!--php_demo.php-->
<?php
// Code backend giấu đc mã nguồn
  echo "Hello, World";

// 1 - Biến
$name = '';
$age = 30;
$address = 'Hà Nội';
// + Quy tắc đặt tên biến: giống hệt JS
//$1name; //ko hợp lệ do tên biến bắt đầu bằng số
//$name&; //ko hợp lệ do chứa ký tự đặc biệt
// - PHP phân biệt hoa thường
$name = '';
$namE = '';
// - Tên biến cần có ý nghĩa, nếu có nhiều từ ngăn
//cách các từ bởi _
$my_age = 5;
// 2 - Hằng:
// có 2 cách khai báo
const PI = 3.14;
const MAX_SIZE = 5;
define('MY_NAME', 'Mạnh');
define('AGE', 22);
// - Nên dùng từ khóa const để khai báo hằng
// - hiển thị hằng/biến, dùng lệnh echo
echo PI; //3.14
// Cố tình gán lại giá trị cho hằng sẽ báo lỗi:
//PI = 1;
// - Một số hằng có sẵn của PHP:
// + Hiển thị số dòng của dòng code hiện tại đang gọi
echo "<br />" . __LINE__;
// + Đường dẫn vật lý tới file đang gọi hằng đó:
echo "<br />" . __FILE__;
// + Đường dẫn vật lý tới thư mục cha gần nhất chứa file
//đang gọi hằng đó:
echo "<br />" . __DIR__;
// 3 - Kiểu dữ liệu trong PHP
// Giống như JS, dựa vào giá trị đc gán cho biến để biêt
//đc kiểu dữ liệu của biến
// + Integer: kiểu số nguyên, phạm vi ~-2 tỷ -> 2 tỷ
$age = 30;
$point = 1;
$check = is_int($age);
// Hàm var_dump dùng debug - xem th ông tin biến
var_dump($check);
// + Float/double: kiểu số thực/số nguyên ngoài phạm vi
//integer
$number1 = 1.23;
$number2 = -1.23;
$check = is_float($number1);
var_dump($check); //true
// + String: kiểu chuỗi
$string1 = 'String 1';
$string2 = "String 2";
$string3 = "String 'abc'";
$check = is_string($string);
var_dump($check); //true
// Có thể hiển thị luôn giá trị của biến bên trong 1
//chuỗi nếu chuỗi đó bao bởi nháy kép, mà ko cần nối chuỗi
$number = 5;
echo "Tuổi của tôi: " . $number;
echo "Tuổi của tôi: $number";
echo 'Tuổi của tôi: $number';
// - Boolean - Kiểu đúng/sai: true/false, với PHP hoa
//thường thoải mái 2 giá trị này
$is_check = TRUE;
$is_member = FALSE;
$is_member1 = True;
$check = is_bool($is_check); //true
// - NULL: có 1 giá trị duy nhất = null
$abc = NULL;
is_null($abc); //true
// - Array: Kiểu mảng, dành 1 buổi chỉ h ọc về mảng
$arr = [1, 2, 3];
is_array($arr); //true
// - Object: đối tượng, học sau

// 4 - Ép kiểu dữ liệu
$number = 11.5;
var_dump($number);//float
$number = (integer) $number;
var_dump($number);//11, integer
$number = (string) $number;
var_dump($number);// 11, string
$number = (boolean) $number;
var_dump($number); //1

if ($number) {
    echo "abc";
}
//5 - Hàm:
// + Hàm có sẵn của PHP
// + Hàm tự định nghĩa: cú pháp giống 100% hàm của JS
function show() {

}
// Hàm ko có tham số, ko có giá trị trả về
function showTest() {
    echo "showTest";
}
showTest();
// Hàm có tham số,có giá trị trả về
// Viết hàm tỉnh tổng 3 số
function sum($number1, $number2, $number3) {
    $sum = $number1 + $number2 + $number3;
    return $sum;
    echo "Code này có chạy ko?";
}
$result = sum(1, 2, 3);
echo "Tổng = $result";// Tổng = 6
$result2 = sum(2, 3, 4);
echo "Result2 = $result2";
// Hàm nên dùng từ khóa return để trả về giá trị
// 6 - Truyền tham trị và tham chiếu
// vd: Viết hàm thay đổi giá trị ban đầu của 1 biến bất kỳ
$number1 = 4;
echo "<p>Biến number1 ban đầu = $number1</p>";
function changeNumber($number) {
    $number = 0;
    echo "<p>Bên trong hàm biến có giá trị = $number</p>";
}
changeNumber($number1);
echo "<p>Sau khi gọi hàm, biến có giá trị = $number1</p>";
// Kết quả: biến number1 ko hề bị thay đổi giá trị, đây
//là kiểu truyền tham trị, bản chất là truyền bản sao
//của biến number1 vào hàm
// + Sử dụng truynef tham chiếu để thay đổi giá trị
$number2 = 4;
echo "<p>Ban đầu biến có giá trị = $number2</p>"; //4
// Truyền tham chiếu bằng cách thêm & trước tham số hàm
function changeNumber2(&$number) {
    $number = 0;
    echo "<p>Bên trong hàm có giá trị = $number</p>";//0
}
changeNumber2($number2);
echo "<p>Sau khi gọi hàm có giá trị = $number2</p>";//0
// Bản chất của truyền tham chiếu là truyền bản gốc của
//biến vào hàm
?>


