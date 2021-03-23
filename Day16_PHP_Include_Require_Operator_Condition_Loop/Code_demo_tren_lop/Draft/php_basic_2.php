<!--php_basic_2.php-->
<?php
// TOÁN TỬ: giống hệt như Javascript
// 1 - Toán tử số học: tính toán biểu thức xung quanh nó
$number1 = 5;
$number2 = 2;
echo $number1 + $number2; //7
echo $number1 - $number2; //3
echo $number1 * $number2; //10
echo $number1 / $number2; //2.5
echo $number1 % $number2; //1
$number1++;
echo $number1; //6
$number2--;
echo $number2;//1
// 2 - Toán tử so sánh: kết quả trả về true/false
$number1 = 5;
$number2 = 2;
// So sánh bằng dùng 2 dấu bằng
var_dump($number1 == $number2); //false
var_dump($number1 != $number2); //true
var_dump($number1 > $number2); //true
var_dump($number1 >= $number2); //true
var_dump($number1 < $number2); // false
var_dump($number1 <= 5); //true

// 3 - Toán tử logic: kết hợp các biểu thức so sánh, kết
//quả trả về là true/false
// AND &&
$number1 = 5;
$number2 = 2;
var_dump(($number1 > 0) && ($number2 > 0)); //true
// OR ||
var_dump(($number1 > 0) || ($number2 < 0));//true
// NOT !
var_dump(!($number1 > 0)); //false
// 4 - Toán tử gán: =
$number1 = 5;
$number1 += 2; //7 $number1 = $number1 + 2
$number1 -= 1; //6
$number1 *= 2; //12
$number1 /= 4; //3
$number1 %= 2; //1
// CÂU LỆNH ĐIỀU KIỆN: if, else, elseif, switch case
// biểu thức điều kiện trong câu lệnh điều kiện luôn
//trả về boolean, chỉ chạy logic code khi gặp case đúng -
//khi biểu thức điều kiện trả về TRUE
// 1 - If: dùng khi chỉ có case duy nhất
$number1 = 5;
if ($number1 > 0) {
  echo "Biến number1  > 0";
}
// 2 - If else: dùng cho 2 case
$number1 = 5;
if ($number1 == 2) {
  echo "Number 1 = 2";
} else {
  echo "Number 1 khác 2";
}
// Toán tử điều kiện dùng thay thế cho if..else khi logic
//code bên trong if...else đơn giản ? :
echo $number1 == 2 ? 'Number1 = 2' : 'Number 1 khác 2';
// 3 - If elseif else: dùng > 3 case
$number1 = 5;
if ($number1 == 1) {
  echo "number1 = 1";
} elseif ($number1 == 3) {
  echo "number 1 = 3";
} elseif ($number1 == 5) {
  echo "number = 5";
} else {
  echo "number 1 khác 1, 3, 5";
}
// 4 - Switch case: thay thế if..elseif, chỉ dùng đc
//khi biểu thức điều kiện là so sánh bằng
switch ($number1) {
  case 1: echo "Number1 = 1";break;
  case 3: echo "Number1 = 3";break;
  case 5: echo "Number1 = 5";break;
  default: echo "Number 1 khác 1, 3, 5";
}
// Sử dụng cú pháp viết tắt của câu lệnh điều kiện khi
//hiển thị mã HTML phức tạp
// + Kiểm tra nếu biến number > 0 thì hiển thị 1 cấu
//trúc HTML sau:
// Viết theo kiểu ko dùng thẻ viết tắt của câu lệnh
//điều kiện:
$number = 1;
if ($number > 0) {
  echo '
    <div style="width: 100px;height:100px;background: red">
      <h1>Thẻ h1</h1>
      <p>Thẻ p</p>
      <i>Thẻ i</i>
    </div>';
}
// Sử dụng thẻ viết tắt câu lệnh điều kiện để hiển thị
//ra mã HTML, tách biệt code PHP và HTML
?>
<?php if ($number > 0) : ?>
  <div style="width: 100px; height: 100px;background: red">
    <h1>Thẻ h1</h1>
    <p>Thẻ p</p>
    <i>Thẻ i</i>
  </div>
<?php endif; ?>

<?php
$number = 5;
?>
<?php if ($number == 1): ?>
  <h2 style="color: red">Biến number = 1</h2>
<?php elseif ($number == 3): ?>
  <h2 style="color: green">Biến number = 3</h2>
<?php elseif ($number == 5): ?>
  <h2 style="color: yellow">Biến number = 5</h2>
<?php else: ?>
  <p>Number khác 1, 3, 5</p>
<?php endif; ?>

<?php
// VÒNG LẶP
// Với PHP, rất ít khi dùng for, while, do..while để lặp
// 1 - For: vòng lặp xác định trc số lần lặp
for ($i = 1; $i <= 10; $i++) {
  echo $i;
}
//12345678910
// 2 - While
$j = 1;
while ($j <= 10) {
  echo $j;
  $j++;
}
//3 - Do...while
$k = 1;
do {
  echo $k;
} while($k < 0);
// BREAK - CONTINUE : Can thiệp vào quy trình lặp
// Break:thoát hẳn vòng lặp, ko chạy code phía sau break
for ($i = 1; $i <= 10; $i++) {
  echo $i;
  if ($i < 1 || $i >= 8 ) {
    break;
  }
} //12345678
//12345678
//12345678910
// Continue: bỏ qua lần lặp hiện tại, nhảy tới lần lặp
//kế tiếp, bỏ qua -> ko chạy code phía sau continue
for ($i = 1; $i <= 10; $i++) {
  if ($i < 0 || $i == 10) {
    continue;
  }
  echo $i;
}//123456789
//123456789
//
//9



//12345678910


//112345678910
//12345678910
//1122334455667788991010

?>