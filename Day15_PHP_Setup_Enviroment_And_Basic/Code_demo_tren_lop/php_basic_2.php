<?php
/**
 * php_basic_2.php
 */
// 1 - Toán tử
// 10 + 15 -> 10 15 là các toán hạng, + là toán tử
// - Toán tử số học: + - * / % ++ --

$x = 5;
$sum = $x++ - --$x * ++$x;
//5  =  5   -   5  *   6 = -25
// - Toán tử so sánh: > >= < <= == === !=
//, kết quả trả về của toán tử này là boolean
// - Toán tử logic: && || !
// Kết hợp nhiều biểu thức so sánh, kết quả trả
//về của toán tử này là boolean
// - Toán tử gán: = += -= *= /= %=

// 2 - Câu lệnh điều kiện:
// Thực hiện logic dựa vào điều kiện nào đó:
//if else elseif switch case
// + Câu lệnh If: khi chỉ có 1 trường hợp xảy ra
$number = 5;
// ($number > 0): biểu thức điều kiện
if ($number > 0) {
  echo "Number > 0";
}
// Cú pháp viết tắt của If khi hiển thị ra 1 khối
//HTML phức tạp
// Hiển thị bảng HTML nếu $number > 0
// Hiển thị HTML dùng code PHP
if ($number > 0) {
  echo "<table><tr><td>Data</td></tr></table>";
}
?>

<!--Hiển thị HTML bằng cú pháp viết tắt của If-->
<?php if ($number > 0): ?>
  <table border="1" cellspacing="0" cellpadding="8">
    <tr>
      <td>Data1</td>
      <td>Data2</td>
    </tr>
  </table>
<?php endif; ?>

<?php
// - Câu lệnh if...else: 2 trường hợp
$number = -1;
if ($number > 0) {
  echo "Number > 0";
} else {
  echo "Number <= 0";
}
// Toán tử điều kiện thay thế cho if..else khi
//logic đơn giản
echo $number > 0 ? 'Number > 0' : 'Number <= 0';
// Cú pháp viết tắt của if...else khi hiển thị
// HTML phức tạp
?>

<?php if ($number > 0): ?>
  <h2>Number > 0</h2>
<?php else: ?>
  <h1>Number <= 0</h1>
<?php endif; ?>

<?php
// - Câu lệnh If...elseif...else: >= 3 trường hợp
$number = 20;
if ($number >= 8 && $number <= 10) {
  echo "HS Giỏi";
} elseif ($number >= 6.5) {
  echo "HS Khá";
} else {
  echo "HS TB";
}
// Cú pháp viết tắt khi hiển thị HTML phức tạp
?>

<?php if ($number >= 8 && $number <= 10): ?>
  <h2>HS Giỏi</h2>
<?php elseif ($number >= 6.5): ?>
  <h1>HS Khá</h1>
<?php else: ?>
  <h3>HS TB</h3>
<?php endif; ?>

<?php
// - Biểu thức switch case: thay thế if elseif
// trong trường hợp là so sánh bằng, vì cú pháp
//dễ đọc hơn if elseif
$day = 4;
switch ($day) {
  case 1: echo 'Sunday';break;
  case 2: echo "Monday";break;
  case 3: echo "Tuesday"; break;
  case 4: echo "Wednesday"; break;
  default: echo "Unknown";
}

//3 - Vòng lặp: for while do...while
// - For: vòng lặp xác định trc số lần lặp
for ($i = 1; $i <= 10; $i++) {
  echo $i;
}
// - While: vòng lặp ko xác định trc số lần lặp
$i = 1;
while ($i <= 10) {
  echo $i;
  $i++;
}
//  - Do...while: luôn chạy ít nhất 1 lần cho dù
//điều kiện sai ngay từ đầu
do {
  $i = -1;
  echo $i;
} while ($i > 0);
// Với PHP rất ít khi dùng 3 vòng lặp trên, đặc
//thù của PHP chỉ dùng vòng lặp khi thao tác với
//mảng là chính

// 4 - Continue - Break: can thiệp vào quá trình
//lặp
// Continue: bỏ qua lần lặp hiện tại,nhảy tới
//lần lặp kế tiếp, ko chạy code phía sau từ khóa
for ($i = 1; $i <= 10; $i++) {
  echo $i;
  if ($i <= 10) {
    continue;
  }
}
//12345678910

// - Break: thoát hẳn vòng lặp
for ($i = 1; $i <= 10; $i++) {
  if ($i == 8 || $i == 3) {
    break;
  }
  echo $i;
}
//12
?>
