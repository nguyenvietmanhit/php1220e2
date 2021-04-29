<?php
session_start();
//index.php
require_once 'database.php';
/**
 * Demo chức năng CRUD - Create - Read - Update
 * - Delete
 * crud
 *     /index.php: R - hiển thị danh sách sp
 *     /create.php: C - Thêm mới sp
 *     /update.php: U - Cập nhật sp
 *     /detail.php: Chi tiết sp
 *     /database.php: Kết nối CSDL
 * Code Create trước
 */
// Kết nối CSDL lấy tất cả sp trong bảng products
// - Viết truy vấn:
$sql_select_all = "SELECT * FROM products 
ORDER BY created_at DESC";
// - Thực thi truy vấn: với SELECT trả về obj,
//với INSERT, UPDATE, DELETE boolean
$obj_select_all = mysqli_query($connection,
    $sql_select_all);
// - Lấy mảng kết hợp
$products = mysqli_fetch_all($obj_select_all,
    MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
?>
<a href="create.php">Thêm mới</a>
<h2>Danh sách sp</h2>
<table border="1" cellspacing="0" cellpadding="8">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Avatar</th>
    <th>Created_at</th>
    <th></th>
  </tr>
  <?php foreach($products AS $product): ?>
  <tr>
    <td><?php echo $product['id']; ?></td>
    <td><?php echo $product['name']; ?></td>
    <td>
      <?php echo number_format($product['price'])?>
    </td>
    <td>
      <img src="uploads/<?php echo $product['avatar']?>"
           height="100px" />
    </td>
    <td>
<!--      29/04/2021 20:48:58-->
      <?php echo date('d/m/Y H:i:s',
          strtotime($product['created_at'])) ?>
    </td>
    <td>
      <a
  href="update.php?id=<?php echo $product['id']?>">Sửa</a> &nbsp; &nbsp;
      <a
  href="delete.php?id=<?php echo $product['id']?>"
 onclick="return confirm('Chắc chắn xóa ko?')">
        Xóa
      </a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
