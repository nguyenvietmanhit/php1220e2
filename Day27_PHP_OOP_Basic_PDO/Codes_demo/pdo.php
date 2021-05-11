<?php
/**
 * pdo.php
 * 1 - Cách PHP kết nối CSDL MySQL sử dụng cơ chế PDO
 * - Từng học MySQLi: hỗ trợ code theo hướng PHP thuần và cả OOP, trc demo sử dụng
 * PHP thuần -> các hàm có tiền tố mysqli_ -> dễ học, dễ tiếp cận
 * Tuy nhiên MySQLi có 1 nhược điểm duy nhất: chỉ hỗ trợ kết nối tới CSDL tên là
 * MySQL, ko thể kết nối đc tới các DB khác như Oracle, SQLite, SQL Server ....
 * Ko phải là vấn đề lớn vì PHP chủ yếu kết hợp với CSDL MySQL
 * - Học cơ chế mới: PDO - PHP Data Object
 * Hỗ trợ kết nối tới nhiều hệ quản trị CSDL khác nhau: MySQL, SQL Server, Oracle...
 * Nhược điểm: chỉ code đc sử dụng OOP, ko có các hàm PHP thuần như MySQLi -> khó tiếp cận với new member
 * Các Framework / CMS của PHP luôn ưu tiên dùng PDO thay vì MySQLi
 * 2 - Code kết nối CSDL MySQL sử dụng cơ chế PDO:
 * Các bước tương tự MySQLi, chỉ khác về code
 * - Chuẩn bị CSDL mẫu và 1 bảng: truy cập PHPMyadmin để viết truy vấn
 * + Tạo CSDL: php1220e2_pdo
   CREATE DATABASE IF NOT EXISTS php1220e2_pdo
   CHARACTER SET utf8 COLLATE utf8_general_ci;
   + Truy cập CSDL vừa tạo, tạo bảng sau: products: id, name, price, created_at
    CREATE TABLE IF NOT EXISTS products (
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(200),
    price INT(11),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
    );
 *
 */
// 1 - Khởi tạo kết nối
// Khai báo các hằng số chứa thông tin kết nối
// MySQLi: host, username, password, db name, port
// + Chuỗi chứa Data Source Name: khá dài và loằng ngoằng, ko cần nhớ, copy, cú pháp chặt chẽ, ko đc chứa dấu cách,
//ko đc viết xuống dòng
const DB_DSN = 'mysql:host=localhost;dbname=php1220e2_pdo;port=3306;charset=utf8';
// + Username kết nối vào CSDL
const DB_USERNAME = 'root';
// + Password
const DB_PASSWORD = '';
// Code kết nối: với PDO cần code sử dụng try...catch thì mới bắt đc các ngoại lệ sinh ra khi có lỗi kết nối
// try...catch có tác dụng gì -> bắt các lỗi mà ko lường trước đc -> ngoại lệ . VD: bị lỗi chia cho 0 -> thay vì phải
//chủ động check nếu số bị chia khác 0 -> viết phép chia trong try..catch để nhờ nó bắt hộ
// -> PDO ko tự biết đc các lỗi sinh ra khi kết nối mà phải nhờ try...catch
try {
  $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
  die("Lỗi kết nối: " . $e->getMessage());
}
echo "<h2>Kết nối CSDL theo PDO thành công</h2>";
//Chạy file này để test

// 2 - Truy vấn insert bằng PDO
// + Viết truy vấn: PDO có cơ chế viết câu truy vấn dạng truyền tham số: (binding) -> chống lỗi bảo mật
//SQL Injection, nếu viết với MySQIi thuần -> dính lỗi này
//products: id, name, price, created_at
// VD về câu truy vấn thuần, truyển thẳng giá trị vào câu truy vấn -> ko nên truyền thẳng vì có thể dính lỗi
//bảo mật SQL Injection, nên truyền dạng tham số
// $sql_insert = "INSERT INTO products(name, price) VALUES ('Iphone X', 1000)";
// Viết truy vấn kiểu truyền tham số, tham số có ký tư : phía trc, theo sau là tên tham số tùy ý, nên
//đặt tên tham số trùng với tên trường cho dễ nhận biết
$sql_insert = "INSERT INTO products(name, price) VALUES (:name, :price)";
// + Chuẩn bị đối tượng truy vấn:
//echo "<pre>";
//print_r($connection);
//echo "</pre>";
$obj_insert = $connection->prepare($sql_insert);
// + [Tùy chọn] Tạo mảng để truyền giá trị thật vào tham số trong truy vấn, nếu câu truy vấn có tham số thì mới
//có bước này.
// Số phần tử mảng này = số tham số trong câu truy vấn
$inserts = [
  ':name' => 'Iphone X',
  ':price' => 1000
];
// + Thực thi đối tượng truy vấn vừa tạo, truyền vào mảng ở bước trên nếu có
// Giống MySQLi, INSERT UPDATE DELETE -> true/false
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);
//TEst xem -> TRUE/FALSE
// 3 - Truy vấn UPDATE theo PDO: cần kèm theo điều kiện để tránh update toàn bộ bảng
// cập nhật name = abc với bản ghi có id < 3
// + Viết truy vấn dạng tham số
$sql_update = "UPDATE products SET name = :name WHERE id < :id";
// + Chuẩn bị obj truy vấn: prepare
$obj_update = $connection->prepare($sql_update);
// + [Tùy chọn] Tạo mảng truyền giá trị thật cho tham số câu truy vấn
$updates = [
  ':name' => 'abc',
  ':id' => 3
];
// + Thực thi obj truy vấn, truyền vào mảng bước trên nếu có
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 4 - Truy vấn DELETE theo PDO: cần kèm điều kiện nếu ko xóa hết bảng !
// VD: xóa các bản ghi có id > 8
// + Viết truy vấn dạng truyền tham số
$sql_delete = "DELETE FROM products WHERE id > :id";
// + Cbi obj truy vấn: prepare
$obj_delete = $connection->prepare($sql_delete);
// + [Tùy chọn] Tạo mảng để truyền giá trị cho tham số của câu truy vấn
$deletes = [
  ':id' => 8
];
// + Thực thi obj truy vấn, truyền vào mảng ở bước trên nếu có
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
// Các bước của truy vấn INSERT UPDATE DELETE giống hệt nhau, chỉ khác về câu truy vấn
// 5 - Truy vấn SELECT theo PDO: tốn nhiều bước nhất: lấy nhiều bản ghi, lấy 1 bản ghi duy nhất
//a/ Lấy nhiều bản ghi: lấy tất cả sp theo thứ tự giảm dần của ngày tạo
// + Viết truy vấn dạng tham số nếu có
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// + Cbi obj truy vấn: prepare
$obj_select_all = $connection->prepare($sql_select_all);
// + [Tùy chọn] Tạo mảng để truyền giá trị vào tham số trong câu truy vấn nếu có, do câu truy vấn hiện tại ko
//có tham số nào nên bỏ qua bước này
// + Thực thi obj truy vấn: với SELECT thì ko cần tạo biến để chứa kết quả trả về của việc thực thi giống
// như INSERT UPDATE DELETE
// Do ko có bước tạo mảng nên ko truyền gì vào execute
$obj_select_all->execute();
// + Trả về mảng kết hợp chứa dữ liệu mong muốn, luôn nằm sau bước execute, cần truyền vào
// hằng số của class có sẵn, cú pháp gọi hằng của 1 class là gì ::
$products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
// b/ Lấy 1 bản ghi duy nhất:
// VD: lấy bản ghi có id = 2
// + Viết truy vấn dạng tham số nếu có:
$sql_select_one = "SELECT * FROM products WHERE id = :id";
// + Cbi obj truy vấn: prepare
$obj_select_one = $connection->prepare($sql_select_one);
// + [Tùy chọn] Tạo mảng để truyền giá trị vào tham số câu truy vấn nếu có
$selects = [
  ':id' => 2
];
// + Thực thi obj truy vấn, truyền vào mảng nếu có, với SELECT thì ko cần gán biến để lưu kết quả trả về
$obj_select_one->execute($selects);
// + Trả về mảng kết hợp 1 chiều chứa bản ghi duy nhất
$product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($product);
echo "</pre>";
// Nếu việc thực thi ko thành công, lỗi thường do câu truy vấn sai, hoặc khi tạo mảng để truyền giá trị vào
//tham số của câu truy vấn ko đúng: sai tên tham số, số lượng ko khớp ...

