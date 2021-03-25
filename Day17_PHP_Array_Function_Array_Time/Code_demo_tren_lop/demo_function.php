<?php
//demo_function.php
// Demo 1 số hàm cơ bản xử lý mảng, chuỗi, số,
//thời gian
// - Thao tác với mảng
// + Tính tổng giá trị của mảng
$arr = [1, 2, 3];
// Cách đọc comment hàm có sẵn trong PHPStorm,
//khi gõ tên dùng Ctrl + Q để hiển thị comment hàm
$sum = array_sum($arr);
var_dump($sum); //6
// + Ktra key có tồn tại hay ko
$arr = [
    'name' => 'nvmanh',
    'age' => 31
];
$check = array_key_exists('name', $arr); //
// + Loại bỏ phần tử trùng
$arr = [1, 2, 3, 4, 1, 1, 2, 2];
$arr_new = array_unique($arr);
echo "<pre>";
print_r($arr_new);
echo "</pre>";
// + Đếm số phần tử mảng
$arr = [1, 2, 3];
echo count($arr); //3
// + Chuyển từ string thành array dựa theo ký
//tự phân tách
$string = "1,2,3,4,5,6,7";
$arr = explode(',', $string);
echo "<pre>";
print_r($arr);
echo "</pre>";
// + Chuyển từ array -> string dựa vào ký tự
//phân tách
$string = implode('-', $arr);
var_dump($string);//1-2-3-4-5-6-7
// + Lấy giá trị của phần tử mảng cuối cùng
$arr = ['a', 'b', 'c', 'd', 'e'];
echo $arr[4]; //e
echo end($arr); //e
// + Lấy giá trị của phần tủ mảng đầu tiên
echo $arr[0]; //a
echo reset($arr); //a
// + Xóa phần tử mảng theo key: unset
$arr = [1, 2, 3];
unset($arr[2]);
echo "<pre>";
print_r($arr);
echo "</pre>";
// + Ktra có phải mảng hay ko:
$check = is_array($arr); //true
// + Ktra giá trị có tồn tại trong mảng hay ko
$arr = [1, 2, 3, 4];
$check = in_array(2, $arr); //true
// + Tìm max, min
$max = max($arr); //4
$min = min($arr); //1
// + Sắp xếp mảng theo chiều tăng dần giá trị
$arr = [1, 4, 2, 3, 9, 5];
sort($arr);
echo "<pre>";
print_r($arr);
echo "</pre>";

// - Làm bài tập và thực hành các slide về các hàm
// string, number, time