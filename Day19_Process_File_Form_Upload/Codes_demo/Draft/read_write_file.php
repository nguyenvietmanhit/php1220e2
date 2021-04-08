<?php
/**
 * read_write_file
 * Đọc ghi file với PHP
 * - Ứng dụng:
 * import file Excel, CSV -> đọc file -> lưu vào CSDL
 * Ghi log của ứng dụng -> ghi file
 * - Demo đọc file: tạo 1 file test.txt, ngang hàng
 * với file hiện tại, ghi nội dung tùy ý trên nhiều hàng
 */
// + Đọc từng hàng dữ liệu -> trả về 1 mảng, mỗi phần tử
//mảng là 1 hàng dữ liệu
$reads = file('test.txt');
echo "<pre>";
print_r($reads);
echo "</pre>";
foreach ($reads AS $key => $read) {
  echo $read . "<br />";
}
// + Đọc toàn bộ nội dung, ko phân biệt hàng -> trả về
//1 string
$string = file_get_contents('test.txt');
echo $string;
// Hàm trên có thể lấy đc nội dung từ 1 url
//echo file_get_contents("https://vnexpress.net");
// fopen, fread cũng dùng để đọc file -> phức tạp hơn
// - Ghi nội dung vào file
// Ghi đè nội dung file
file_put_contents('write.txt', 'String 234');
// Ghi nối tiếp vào nội dung file đã có:
file_put_contents('write.txt',
    'Hello abc', FILE_APPEND);
// Có thể dùng fwrite để ghi nội dung file -> phức tạp
// - Một số hàm khác về file:
// + Xóa file
unlink('write.txt');
// Thêm @ trc tên hàm để bỏ qua lỗi khi đường dẫn file
//ko tồn tại
@unlink('write.txt');
// + Kiểm tra đường dẫn tới file/thư mục có tồn tại hay ko
$check = file_exists('test.txt');
var_dump($check); //true
