<?php
/**
 * function_array.php
 * Demo 1 số hàm có sẵn của PHP thao tác với mảng
 */
// - Tính tổng các value trong mảng:
$arr = [1, 2, 3];
echo array_sum($arr); //6
// - Loại bỏ value trùng lặp trong mảng
$arr = [1, 2, 3, 3, 5, 5];
$arr_new = array_unique($arr);
echo "<pre>";
print_r($arr_new);
echo "</pre>";
// - Kiểm tra key có tồn tại trong mảng hay ko
$info = [
  'name' => 'nvmanh',
  'age' => 30
];
$check = array_key_exists('name', $info); //true
// - Tổng số phần tử trong mảng:
echo count($info); //2
// - Chuyển từ chuỗi thành mảng dựa vào ký tự phân tách
$string = 'Tôi là nvmanh';
$arr = explode(' ', $string);
echo "<pre>";
print_r($arr);
echo "</pre>";
// - Chuyển từ mảng về chuỗi ngăn cách bởi ký tự phân tách
$string = implode(' ', $arr); //Tôi là nvmanh
// - Xóa phần tử mảng
$arr = ['a', 'b', 'c'];
unset($arr[2]);
// - Ktra kiểu dữ liệu có phải là mảng hay ko?
$check = is_array($arr); //true
// - Ktra giá trị có tồn tại trong các giá trị của phần
//tử mảng hay ko
$arr = ['a', 'b', 'c'];
$check = in_array('def', $arr); //false

