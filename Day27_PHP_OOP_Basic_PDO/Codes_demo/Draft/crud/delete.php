<?php
session_start();
require_once 'database.php';
/**
 * crud/delete.php
 * Xóa sp theo id
 */
// - Lấy id từ url, validate id, giống hệt update/detail
$id = $_GET['id'];
// - Tương tác CSDL để xóa bản ghi theo id
// Viết truy vấn
$sql_delete = "DELETE FROM products WHERE id = $id";
// Thực thi truy vấn
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
if ($is_delete) {
  $_SESSION['success'] = 'Xóa thành công';
} else {
  $_SESSION['error'] = 'Xóa thất bại';
}
header('Location: index.php');
exit();
?>