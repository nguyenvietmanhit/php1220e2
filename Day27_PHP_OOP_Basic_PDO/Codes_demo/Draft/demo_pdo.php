<?php
/**
 * demo_pdo.php
 * Kết nối CSDL theo cơ chế PDO
 * - PHP Data Object
 * - Là cơ chế kết nối CSDL sử dụng hoàn toàn cú pháp
 * của OOP
 * - MySQLi chỉ hỗ trợ kết nối tới CSDL MySQL, ngoài ra
 * MySQLi hỗ trợ 2 cách kết nối: php thuần và OOP
 * - PDO hỗ trợ kết nối tới tất cả CSDL thông dụng
 */
// - Tạo CSDL: php1020e_pdo
/**
CREATE DATABASE IF NOT EXISTS php1020e_pdo
CHARACTER SET utf8 COLLATE utf8_general_ci;
 */
// - Tạo bảng books: id, name, amount, created_at
/**
CREATE TABLE IF NOT EXISTS books(
id INT(11) AUTO_INCREMENT,
name VARCHAR(255),
amount INT(11),
created_at timestamp DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
 *
 */
// 1 - Khởi tạo kết nối
// Chuỗi kết nối: Data Source Name
const DB_DSN = 'mysql:host=localhost;dbname=php1020e_pdo;port=3306;charset=utf8';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
// Với PDO dùng khối lệnh try catch để kết nối
// Try catch: chạy code và nhờ class có sẵn bắt hộ các lỗi
//có thể phát sinh trong code (ngoại lệ)
try {
  $connection = new PDO(DB_DSN,
      DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
  die("Lỗi kết nối: " . $e->getMessage());
}
echo "Kết nối CSDL php1020e_pdo thành công";
// 2 - Truy vấn INSERT
// books: id, name, amount, created_at
// + Viết câu truy vấn dạng giá trị ở dạng tham số
// + PDO hỗ trợ chống lỗi bảo mật SQL Injection ngay bên
// trong câu truy vấn -> truyền giá trị dạng tham số
// + Nếu giá trị là chuỗi -> bắt buộc phải ở dạng tham số
// + Nếu giá trị là số -> ko bắt buộc
$sql_insert = "INSERT INTO books(name, amount)
VALUES(:name, :amount)";
// + Chuẩn bị đối tượng truy vấn
$obj_insert = $connection->prepare($sql_insert);
// + (Optional) Tạo mảng truyền giá trị thật cho các
// tham số trong câu truy vấn nếu có
// Số phần tử mảng = số tham số trong câu truy vấn
$inserts = [
    ':name' => 'Sách văn học',
    ':amount' => 10
];
// + Thực thi đối tượng truy vấn trên
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);

// 3 - Truy vấn UPDATE
// Update name = Name 1, amount = 1 cho bản ghi có
//id = 1
// + Viết câu truy vấn dạng tham số
$sql_update = "UPDATE books 
SET name = :name, amount = :amount WHERE id = :id";
// + Cbi obj truy vấn:
$obj_update = $connection->prepare($sql_update);
// + Tạo mảng để truyền giá trị cho tham số truy vấn
$updates = [
    ':name' => 'Name 1',
    ':amount' => 1,
    ':id' => 1
];
// + Thực thi obj truy vấn
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 4 - Truy vấn DELETE
// Xóa các bản ghi có id > 10
// + Viết truy vấn dạng tham số
$sql_delete = "DELETE FROM books WHERE id > :id";
// + Cbi obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// + Tạo mảng truyền giá trị:
$deletes = [
  ':id' => 10
];
// + Thực thi obj truy vấn
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);

// 5 - Truy vấn SELECT
// a/ Select nhiều bản ghi
// Lấy tất cả bản ghi theo chiều giảm dần của ngày tạo
// + Viết truy vấn
$sql_select_all = "SELECT * FROM books 
ORDER BY created_at DESC";
// + Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// + Tạo mảng -> bỏ qua vì câu truy vấn ko có tham số
// + Thưc thi obj truy vấn, với SELECT ko cần thao tác
// với kết quả trả về sau khi thực thi
$obj_select_all->execute();
// + Trả về mảng kết hợp từ obj truy vấn trên
$books = $obj_select_all
    ->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($books);
echo "</pre>";
//b - Lấy 1 bản ghi: có id = 1
// + Viết truy vấn
$sql_select_one = "SELECT * FROM books WHERE id = 1";
// + Cbi obj truy vấn
$obj_select_one = $connection->prepare($sql_select_one);
// + Tạo mảng -> bỏ qua
// + Thực thi obj truy vấn
$obj_select_one->execute();
// + Trả về mảng kết hợp từ obj truy vấn
$book = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($book);
echo "</pre>";


