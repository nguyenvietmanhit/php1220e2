<?php
/**
 * chua_bai_tap_13_ngay_17.php
 */
$numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
//•	Tính toán giá trị trung bình của mảng trên
// + Lấy tổng số phần tử đang có trong mảng
$count = count($numbers);
// Hàm var_dump thường dùng để deubg dữ liệu kiểu
//nguyên thủy: số, chuỗi, boolean
//var_dump($count);
// Cấu trúc echo pre dùng debug dữ liệu có cấu trúc
//như mảng, đối tượng
// + Tính tổng tất cả phần tử trong mảng
$sum = 0;
foreach ($numbers AS $number) {
  $sum += $number;
}
//var_dump($sum);
$average = $sum / $count;
//var_dump($average);
echo "Giá trị trung bình = $average <br />";

//•	Liệt kê các số có giá trị lớn hơn
// giá trị trung bình đó
//•	Liệt kê các số có giá trị nhỏ hơn
// hoặc bằng giá trị trung bình đó
// + Tạo mảng để lưu các giá trị thỏa mãn
$arr1 = [];
$arr2 = [];
foreach ($numbers AS $number) {
  if ($number > $average) {
    //Đẩy giá trị thỏa mãn vào mảng $arr1
    $arr1[] = $number;
  } else {
    $arr2[] = $number;
  }
}
// Loaị bỏ phần tử mảng có giá trị trùng lặp
$arr1 = array_unique($arr1);
$arr2 = array_unique($arr2);
echo "<pre>";
print_r($arr1);
echo "</pre>";
echo "<pre>";
print_r($arr2);
echo "</pre>";
// Hiển thị kết quả bằng cách chuyển từ mảng về
//chuỗi
$string1 = implode(', ', $arr1);
$string2 = implode(', ', $arr2);
echo "Các giá trị lớn hơn $average là: $string1 <br>";
echo "Các giá trị nhỏ hơn $average là: $string2 <br>";