<?php
/**
 * array.php
 * Kiểu dữ liệu mảng trong PHP
 * + Thao tác với mảng nhiều nhất trong PHP
 * 1 - Định nghĩa
 * + Khai báo tên 500ae, tạo 500 biến
 * + Khai báo thông tin của 1 người: họ tên, tuổi, địa
 * chỉ
 * + Mảng là kiểu dữ liệu PHP có thể lưu nhiều giá trị
 * tại 1 thời điểm
 *
 *
 *
 */
//2 - Cú pháp khai báo mảng, có 2 cách:
// + Dùng từ khóa array
$info = array('Mạnh', 30, 'Hà Nội', true);
// Mảng 4 phần tử:
// + Phần tử đầu tiên: giá trị = Mạnh
// + Phần tử thứ 2: giá trị = 30
// + Phần tử thứ 3: giá trị = Hà Nội
// + Phần tử thứ 4: giá trị = true
// - Thông dụng với các phiên bản PHP từ 5.4 đổ về trc
// + Dùng []: cách thông dụng
$info = ['Mạnh', 30, 'Hà Nội', true];
// 2 - Thuật ngữ của mảng: element (phần tử), key, value
$info = ['Mạnh', 30, 'HN'];
// + Phần tử mảng
// + Key của phần tử mảng: giá trị để xác định phần tử
//mảng đó
// + Value của phần tử mảng: giá trị của phần tử mảng
//theo key tương ứng
$info = ['Mạnh', 30, 'HN'];
// Cách debug kiểu dữ liệu mảng để xem thông tin
//key - value
echo "<pre>";
print_r($info);
echo "</pre>";

// 3 - Thao tác với mảng:
// + Thêm phần tử vào cuối mảng
$arr = [];
// Thêm phần tử với key tự động tăng
$arr[] = 123;
// Thêm phần tử có chỉ định cụ thể key
$arr[9] = 'abc';
echo "<pre>";
print_r($arr);
echo "</pre>";
// + Lấy giá trị của phần tử mảng: có 2 cách, luôn
//phải biết đc key của phần tử mảng thì mới lấy đc
//giá trị của nó
// - Lấy thủ công:
$info = [1, 2, 3, 4, 5 ,6];
echo "<pre>";
print_r($info);
echo "</pre>";
echo $info[5]; //6
echo $info[6]; // báo lỗi do phần tử có key = 6 ko tồn tại
// - Xóa phần tử mảng: luôn phải biết key
$info = [1, 2, 3, 4, 5 ,6];
unset($info[0]);

// - Sửa giá trị của phần tử mảng
$info = [1, 2, 3, 4, 5 ,6];
$info[2] = 'abc';
echo "<pre>";
print_r($info);
echo "</pre>";

// - Dùng foreach để lấy tất cả
// 4 - Vòng lặp foreach
// + Có 1 mảng gồm 500 phần tử, lấy giá trị của tất cả
//500 phần tử đó
echo $arr[0];
//echo $arr[1];//báo lỗi
//..
$arr = [1, 'abc', 2, 'def', true, false, NULL];
// - Sử dụng for để lặp mảng
$count = count($arr); //7
echo "<br />";
for ($i = 0; $i < 7; $i++) {
  //câu lệnh echo hiển thị kiểu dữ liệu string
  //nên khi hiển thị giá trị true/false bằng echo, thì
  //sẽ ép kiểu như sau: true -> '1', false -> ''
  var_dump($arr[$i]); //
}
// Sử dụng for, while,do..while chỉ áp dụng cho các mảng
//đơn giản, thực tế sẽ ít dùng
// - Sử dụng foreach: có 2 cú pháp khai báo
// Foreach: lặp qua từng phần tử mảng, biết dc luôn key
//và value tương ứng của từng phần tử mảng, thể hiển ra
//qua các biến trong foreach
$arr = [1, 'a', 'b', 'c', 'd'];
// + Dạng khuyết key
echo "<br />";
foreach ($arr AS $value) {
  echo $value;
}
// + Dạng đầy đủ cả key và value
foreach ($arr AS $key => $value) {
  echo " <br />Phần tử mảng, key = $key, value = $value";
}
// Thay đổi tên biến $key, $value thoải mái
$arr = ['a', 'b', 'c'];
foreach ($arr AS $k => $v) {
  echo "<br />Key: $k, Value: $v";
}
// 5 - Cú pháp viết tắt của foreach khi viết lồng với
//HTML
// + Hiển thị giá trị của phần tử mảng vào khối HTML sau
$arr = [1, 2, 3, 4, 5, 6];
foreach ($arr AS $key => $value) {
  echo "<div style='background:red;width: 200px;height: 200px;'>";
  echo "<p>$value</p>";
  echo "<b>$value</b>";
  echo "<i>$value</i>";
  echo "</div>";
}
$arr = [1, 2, 3, 4, 5, 6];
?>
<?php foreach ($arr AS $k => $v): ?>
  <div style="background: red; width: 200px; height: 200px">
    <p><?php echo $v; ?></p>
    <b><?php echo $v; ?></b>
    <i><?php echo $v; ?></i>
  </div>
<?php endforeach; ?>
<?php
// 6 - Phân loại mảng
// + Mảng tuần tự: tất cả key của từng phần tử đều là
//số nguyên, key của phần tử đầu tiên = 0
$arr1 = ['a', 'b', 'c'];
$arr2 = [
    3 => 'abc',
    5 => 123,
    9 => 'def',
    'ghi'
];
echo "<pre>";
print_r($arr2);
echo "</pre>";
echo $arr2[9]; //def
foreach ($arr2 AS $key => $value) {
  echo "<br /> Key: $key, Value: $value";
}
// + Mảng kết hợp: key có cả dạng string
$info = [
    'name' => 'nvmanh',
    'age' => 30,
    'address' => 'HN',
    'is_male' => true,
    5 => 'abc'
];
echo $info['address']; //HN
foreach ($info AS $key => $value) {
  echo "<br />Key: $key, Value: $value";
}
// + Mảng đa chiều: mảng trong mảng, key có thể ở cả số
//và chuỗi
$students = [
    'name' => 'SV A',
    'age' => 25,
    'class' => [
        'teacher' => 'Teacher A',
        'amount' => 50,
        'info' => [1, 2, 3, 4, 5, 6]
    ]
];
echo $students['class']['amount']; //50
foreach ($students AS $key => $student) {
//  echo "<br />Key: $key, Value: $student";
}
// + Mảng càng nhiều chiều thì càng phức tạp, nên dừng
//ở tối đa 3 chiều nếu là mảng do bạn tạo ra

?>

20m<sup>2</sup>
20m<sub>2</sub>
