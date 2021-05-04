<?php
require_once 'database.php';
/**
 * crud/detail.php
 * Chi tiết sp
 */
// - Lấy giá trị của id từ url, giống hệt update
// - Validate id ...
$id = $_GET['id'];
// - Lấy bản ghi theo id, giống hệt update


// + Viết truy vấn:
$sql_select_one = "SELECT * FROM products 
WHERE id = $id";
// + Thực thi truy vấn, với SELECT trả về obj trung gian:
$obj_result_one = mysqli_query($connection,
    $sql_select_one);
// + Trả về mảng kết hợp 1 chiều
$product = mysqli_fetch_assoc($obj_result_one);
?>
ID: <?php echo $product['id'];?>
<br />
Name: <?php echo $product['name']; ?>
....
<a href="index.php">Back</a>
