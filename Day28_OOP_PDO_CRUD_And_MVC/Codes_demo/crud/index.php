<?php
session_start();
require_once 'database.php';
/**
 * crud/index.php
 * Liệt kê sản phẩm
 *
 * Demo CRUD sản phẩm đơn giản sử dụng PHP kết nối với CSDL MySQL bằng cơ chế PDO
 * Tạo cấu trúc thư mục như sau:
 * crud /
 *      / database.php: kết nối CSDL theo PDO, tạo ra biến kết nối sử dụng cho các chức năng CRUD
 *      / create.php: form thêm mới sp
 *      / update.php: form cập nhật sp
 *      / index.php: danh sách sp
 *      / detail.php: xem chi tiết sp
 *      / delete.php: xóa sp
 */
// Tương tác với CSDL để lấy ra các sp đang có trong bảng products
// + Viết truy vấn dạng tham số nếu có, lấy theo giảm dần của ngày tạo
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// + Cbi đối tượng truy vấn: prepare
$obj_select_all = $connection->prepare($sql_select_all);
// + [Tùy chọn] Tạo mảng để truyền giá trị -> bỏ qua vì câu truy vấn ko có tham số
// + Thực thi obj truy vấn: execute
$obj_select_all->execute();
// + Lấy dữ liệu dưới dạng mảng kết hợp nhiều phần tử: fetchAll
$products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
// Session dạng flash: hiển thị session ra r xóa luôn -> flash, unset
?>
<?php
// Hiển thị ra session thông báo nếu có
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
<a href="create.php">THêm mới sp</a>
<table border="1" cellspacing="0" cellpadding="6">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Created_at</th>
    <th></th>
  </tr>
  <?php foreach($products AS $product): ?>
      <tr>
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo number_format($product['price']); ?> vnđ</td>
        <td>
<!--            13/05/2020 12:34:50-->
            <?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])); ?>
        </td>
        <td>
          <a href="detail.php?id=<?php echo $product['id']; ?>">Xem</a>
          <a href="update.php?id=<?php echo $product['id']; ?>">Sửa</a>
          <a href="delete.php?id=<?php echo $product['id']; ?>"
             onclick="return confirm('Chắc chắn muốn xóa?')">Xóa</a>
        </td>
      </tr>
  <?php endforeach; ?>
<!--    Các bạn nghỉ giải lao 10p -->
</table>