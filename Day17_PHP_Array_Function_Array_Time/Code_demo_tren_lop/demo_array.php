<?php
//demo_array.php
echo "<h1>Mảng trong PHP</h1>";
// 1 - Kiểu dữ liệu mảng trong PHP
// - Bài toán: tạo biến lưu tên 500 ae -> tạo
// 500 biến -> mất công
// -> sử dụng mảng để lưu 500 tên, chỉ cần 1 biến
//duy nhất
// - Mảng là 1 kiểu dữ liệu của PHP cho phép lưu
// nhiều giá trị tại 1 thời điểm
// 2 - Khai báo: có 2 cách
// + Cách thông dụng, áp dụng cho PHP từ
// 5.4 trở lên
$arr1 = [1, 2, 3, 's'];
// + Áp dung cho tất cả phiên bản PHP
$arr2 = array(1, 2, 3, 's');
// 3 - Debug 1 mảng
var_dump($arr1);
// + Cách debug mảng hay dùng
echo "<pre>";
print_r($arr1);
echo "</pre>";


// 4 - Thuật ngữ về mảng
$arr = [1, 2, 3, 's'];
echo "<pre>";
print_r($arr);
echo "</pre>";
// + Phần tử mảng: key => value
// + Key của phần tử mảng: dấu hiệu nhận biết
//phần tử mảng đó - xác định vị trí của phần tử
//mảng
// + Value của phần tử mảng: giá trị tương ứng
//dựa theo key của phần tử đó
// + Các phần tử mảng cách nhau bởi dấu ,
//trong mảng
//5 - Thao tác lấy giá trị của phần tử mảng
$arr = [1, 2, 3, 4, 'a', 'b', 'c'];
echo "<pre>";
print_r($arr);
echo "</pre>";
// + Để lấy value của 1 phần tử mảng, bắt buộc
// phải dựa vào key tương ứng
// + Cú pháp: <tên-mảng>[<key>] ...
echo $arr[4]; //a
echo $arr[1]; //2
// + Là cách lấy value thủ công
// 6 - Vòng lặp foreach
// - Là vòng lặp chuyên dùng để lặp mảng
// + Dùng for để hiển thị tất cả cả giá trị mảng:
$arr = [1, 2, 3, 4];
$count = count($arr);
var_dump($count);
echo "<pre>";
print_r($arr);
echo "</pre>";
for ($key = 0; $key < $count; $key++) {
  echo $arr[$key];
}
// + Dùng foreach: có 2 kiểu viết
$arr = ['a', 'b', 'c', 'd'];
echo "<pre>";
print_r($arr);
echo "</pre>";
// - Foreach dạng đầy đủ cả key và value
// + Cách hoạt động của foreach: lặp qua từng
//phần tử mảng, tại mỗi phần tử xác định được luôn
// key và value, đặt làm 2 biến trong foreach
foreach ($arr AS $key => $value) {
  echo "Key = $key có value = $value <br />";
}
$arr2 = [1, 2, 3, 4, 5, 6];
foreach ($arr2 AS $k => $v) {
  echo "Key: $k, Value: $v <br />";
}
// - Foreach dạng khuyết key: sử dụng khi logic
//bên trong foreach ko cần thao tác với key
$arr3 = [1, 2, 3, 4];
foreach ($arr3 AS $value) {
  echo "Value: $value <br />";
}
// + Kết luận: luôn dùng foreach để lặp mảng
// 7 - Phân loại mảng
// - Mảng tuần tự/ Mảng số nguyên: key của phần
//tử mảng phải là số nguyên, nếu ko chỉ định
//tường minh key, thì phần tử đầu tiên của mảng
//có key = 0
$arr1 = [1, 2, 3, 'a', 'b', 'c'];
echo "<pre>";
print_r($arr1);
echo "</pre>";
echo $arr1[4]; //b
foreach ($arr1 AS $key => $value) {
  echo "Key: $key, Value: $value <br />";
}
// - Mảng kết hợp: key của mảng xuất hiện thêm
// cả dạng chuỗi, mô tả thông tin rõ hơn là
//mảng số nguyên
// Tạo 1 mảng lưu thông tin của 1 người
// Nhìn cho dễ: mỗi 1 phần tử viết trên 1 dòng,
//theo cú pháp key => value
$info = [
    'name' => 'nvmanh',
    'age' => 31,
    'address' => 'Hoài Đức - Hà Nội',
    4 => 'abc'
];
echo $info['age']; //31
echo $info[4];//abc
echo "<pre>";
print_r($info);
echo "</pre>";
foreach ($info AS $k => $v) {
  echo "Key: $k, Value: $v <br />";
}
// - Mảng đa chiều: mảng trong mảng, các phần tử
//mảng có giá trị là 1 mảng khác
$arr1 = [
    'name' => 'nvmanh',
    'address' => [
        'city' => 'Hà Nội',
        'district' => 'Hoài Đức'
    ]
];
echo $arr1['address']['district']; //Hoài Đức
foreach ($arr1 AS $key => $value) {
  // Báo lỗi vì ko thể echo 1 mảng đc
//  echo "Key: $key, Value: $value <br />";
}

// Mảng 3 chiều
$arr = [
    'name' => 'nvmanh',
    'info' => [
        'age' => 31,
        'class' => [
            'name' => 'PHP1220E2',
            'amount' => 26
        ]
    ]
];
echo $arr['info']['class']['amount']; //26
echo "<pre>";
print_r($arr);
echo "</pre>";
// + Mảng càng nhiều chiều thì độ phức tạp càng
//cao, nếu mảng do bạn tạo ra thì nên dừng ở
//tối đa 3 chiều
