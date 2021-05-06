<?php
/**
 * phuong_phap_tiep_can_lap_trinh.php
 * Liệt kê các phương pháp code từ trước đến giờ mà các bạn gặp
 *
 */
// Viết code tính tổng 2 số bất kỳ
// 1 - Lập trình tuyến tính: code theo kiểu nghĩ gì viết nấy, code từ trên xuống dưới
$number1 = 2;
$number2 = 5;
$sum = $number1 + $number2;
echo "Tổng của 2 số = $sum";
// Hầu như bạn mới nào cũng dùng
// - 2 - Lập trình có cấu trúc: biêt tổ chức code thành các hàm để có thể tái sử dụng
function sum($number1, $number2) {
  $sum = $number1 + $number2;
  return $sum;
}
echo sum(1, 2); //3
echo sum(3, 2); //5
// Hướng này chia chương trình thành theo chức năng (hàm)
// Phù hợp cho phát triển web trong những năm trước
// 3 - Lập trình hướng đối tượng: lấy đối tượng làm trọng tâm để phân tích ra đặc điểm và hành vi của
//đối tượng đó
// - Ưu điểm của lập trình hướng đối tượng so với các phương pháp còn lại
// + Có tính kế thừa
// + Tiếp cận theo hướng lấy đối tượng làm trọng tâm để phân tích -> thực tế
// + Tính bảo mật thông qua tính đóng gói và che giấu thông tin
// - Nhược điểm: khó tiếp cận vì có nhiều thuật ngữ