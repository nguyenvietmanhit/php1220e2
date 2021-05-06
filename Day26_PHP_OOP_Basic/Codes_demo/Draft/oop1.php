<?php
/**
 * oop1.php
 * Các phương pháp lập trình truyền trống
 * + Lập trình tuyến tính: nghĩ gì code nấy
 */
// Tính tổng của 2 số bất kỳ
$number1 = 4;
$number2 = 5;
$sum = $number1 + $number2;
echo $sum;
// + Lập trình có cấu trúc: viết hàm
function sum($number1, $number2) {
  return $number1 + $number2;
}
echo sum(1, 2);
// -> Lập trình hướng đối tượng: tiếp cận theo đối tượng,
//chứ ko tiếp cận theo chức năng (hàm) của lập trình
//có cấu trúc
// -> học lại lập trình theo hướng tiếp cận khác
// + Các web site hiện nay đều dựa trên OOP