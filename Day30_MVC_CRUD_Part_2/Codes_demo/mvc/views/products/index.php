<?php
//views/products/index.php
// View của trang liệt kê sp
// Thử debug biến $products sinh ra từ controller tại view này xem view có hiểu đc biến này ko
echo "<pre>";
print_r($products);
echo "</pre>";
// Foreach mảng này ra table
?>
<a href="index.php?controller=product&action=create">Thêm mới sp</a>
<table border="1" cellspacing="0" cellpadding="8">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Created_at</th>
    <th></th>
  </tr>
  <tr>
    <td>2</td>
    <td>Name 2</td>
    <td>20,000 vnđ</td>
    <td>20/05/2021 21:25:50</td>
    <td>
      <a href="index.php?controller=product&action=detail&id=2">Chi tiết</a>
      <a href="index.php?controller=product&action=update&id=2">Sửa</a>
      <a href="index.php?controller=product&action=delete&id=2"
         onclick="return confirm('Bạn muốn xóa ?')">
          Xóa
      </a>
    </td>
  </tr>
</table>
