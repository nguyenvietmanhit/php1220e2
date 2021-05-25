<?php
//views/products/index.php
// View của trang liệt kê sp
// Thử debug biến $products sinh ra từ controller tại view này xem view có hiểu đc biến này ko
//echo "<pre>";
//print_r($products);
//echo "</pre>";
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
  <?php foreach ($products as $product): ?>
      <tr>
          <td><?php echo $product['id']; ?></td>
          <td><?php echo $product['name']; ?></td>
          <td><?php echo number_format($product['price']); ?> vnđ</td>
          <td>
<!--              20/05/2021 21:25:50-->
              <?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])); ?>
          </td>
          <td>
              <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">Chi tiết</a>
              <a href="index.php?controller=product&action=update&id=<?php echo $product['id']; ?>">Sửa</a>
              <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']; ?>"
                 onclick="return confirm('Bạn muốn xóa ?')">
                  Xóa
              </a>
          </td>
      </tr>
  <?php endforeach; ?>
</table>
