<?php
session_start();
require_once 'database.php';
/**
 * crud/delete.php
 * Xóa sản phẩm
 */
// delete.php?id=7;
// + Lấy id từ url, cần validate tham số id trc khi lấy
$id = $_GET['id'];
// + Tương tác với CSDL để xóa sp theo id
// - Viết truy vấn dạng tham số
$sql_delete = "DELETE FROM products WHERE id=:id";
// - Cbi obj truy vấn: prepare
$obj_delete = $connection->prepare($sql_delete);
// - [] Tạo mảng:
$deletes = [
  ':id' => $id
];
// - Thực thi obj truy vấn: execute
$is_delete = $obj_delete->execute($deletes);
//var_dump($is_delete);
if ($is_delete) {
  $_SESSION['success'] = 'Xóa sp thành công';
} else {
  $_SESSION['error'] = 'Xóa sp thất bại';
}
header('Location: index.php');
exit();
// Ứng dụng CRUD theo PDO này sẽ áp dụng khi thi WPM2