<?php
/**
 * phuong_phap_lap_trinh.php
 * 3 phương pháp/cách tiếp cận lập trình hiện nay
 * - Lập trình tuyến tính: nghĩ gì viết nấy
 * VD với tính tổng 2 số
 */
$number1 = 1;
$number2 = 2;
$sum = $number1 + $number2;
echo $sum;
// - Lập trình có cấu trúc: biết tách chương trình
//thành các chức năng nhỏ hơn -> hàm
function add($number1, $number2) {
  return $number1 + $number2;
}
echo add(1, 2); //3
// - Lập trình hướng đối tượng: nhiều lợi thế so với
//lập trình có cấu trúc, sự phức tạp khi mới học
