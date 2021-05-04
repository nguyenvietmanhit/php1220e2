<?php
session_start();
require_once 'database.php';
/**
 * Ứng dụng CRUD - Create Read Update Delete
 * 4 chức năng nền tảng của bất cứ 1 website nào
 * Cấu trúc thư mục: qly sản phẩm
 * crud/
 *     /database.php: cấu hình kết nối CSDL theo mySQli
 *     /index.php: liệt kê sản phẩm
 *     /create.php: form thêm mới sp
 *     /update.php: form update sp
 *     /detail.php: chi tiết sp
 *     /delete.php: xử lý xóa sp
 */
//crud/index.php
?>

<?php
// Session dạng flash
if (isset($_SESSION['success'])) {
  echo $_SESSION['success'];
  unset($_SESSION['success']);
}
// Session dạng flash, chứa lỗi nếu có
if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
  unset($_SESSION['error']);
}

// Xử lý lấy dữ liệu từ bảng products
// + Viết truy vấn: theo thứ tự giảm dần của ngày tạo
$sql_select_all =
    "SELECT * FROM products ORDER BY created_at DESC";
// + Thực thi truy vấn
$obj_result_all = mysqli_query($connection,
    $sql_select_all);
// + Lấy dữ liệu trả về dưới dạng mảng kết hợp
$products = mysqli_fetch_all($obj_result_all,
    MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
?>
<a href="create.php">Thêm mới sp</a>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Avatar</th>
        <th>Created_at</th>
        <th></th>
    </tr>
  <?php foreach ($products AS $product): ?>
      <tr>
          <td><?php echo $product['id']; ?></td>
          <td><?php echo $product['name']; ?></td>
          <td>
          <?php echo number_format($product['price']); ?>
          </td>
          <td>
      <img src="uploads/<?php echo $product['avatar'] ?>"
           height="80px"/>
          </td>
          <td>
<!--              09-01-2021 20:52:11-->
      <?php
      $created_at = date('d-M-Y H:i:s',
          strtotime($product['created_at']));
      echo $created_at;
      ?>
          </td>
          <td>
              <?php
              $url_detail = "detail.php?id=" . $product['id'];
              $url_update = "update.php?id=" . $product['id'];
              $url_delete = "delete.php?id=" . $product['id'];
              ?>
              <a href="<?php echo $url_detail; ?>">Chi tiết</a>
              <a href="<?php echo $url_update; ?>">Sửa</a>
              <a href="<?php echo $url_delete; ?>"
                 onclick="return confirm('Muốn xóa ko?')">
                  Xóa
              </a>
          </td>
      </tr>
<!-- Ctrl + Alt + L -->
  <?php endforeach; ?>
</table>
