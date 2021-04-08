<?php
/**
 * process_file.php
 * Đọc ghi file trong PHP
 */
// 1 - Đọc file: tạo 1 file read.txt, tạo ngang
// hàng với file hiện tại, nhập nội dung tùy ý
//trên nhiều dòng cho file này
// + Đọc từng dòng của file, trả về mảng
$reads = file('read.txt');
echo "<pre>";
print_r($reads);
echo "</pre>";
foreach ($reads AS $read) {
  echo $read . "<br />";
}
// + Đọc toàn bộ file, trả về chuỗi
$string = file_get_contents('read.txt');
echo $string;
// Dùng để lấy nội dung 1 trang web thật
//echo file_get_contents
//("https://vnexpress.net/");
// 2 - Ghi nội dung vào file: file_put_contents,
// nếu file chưa tồn tại, sẽ tự động tạo mới file
// + Ghi đè
file_put_contents('write1.txt',
    '12dsadsadasdasdas');
// + Ghi nối tiếp vào file
file_put_contents('write2.php',
    'HEllo', FILE_APPEND);
// 3 - 1 số hàm thao tác với file
// + Ktra đường dẫn tới file/thư mục tồn hay ko
$is_exists = file_exists('dsa/d.e');
var_dump($is_exists); //false
// + Xóa file theo đường dẫn, thêm @ để bỏ qua lỗi
// khi PHP xóa file có đường dẫn ko tồn tại
@unlink('write2.php');