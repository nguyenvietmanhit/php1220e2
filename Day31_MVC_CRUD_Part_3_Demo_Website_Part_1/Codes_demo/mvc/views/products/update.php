<?php
//views/products/update.php
// Form cập nhật sản phẩm: tận dụng lại HTML của form thêm mới
// Copy nội dung file create.php
?>
<h1>Form cập nhật sp</h1>
<form action="" method="post">
  Nhập tên sp:
  <input type="text" name="name" value="<?php echo $product['name']; ?>" />
  <br />
  Nhập giá sp:
  <input type="number" name="price" value="<?php echo $product['price']; ?>" />
  <br />
  <input type="submit" name="submit" value="Lưu" />
  <!--  Mọi link trong MVC đều phải tuân theo quy tắc đã đặt ra: url phải có 2 tham số controller và action  -->
  <a href="index.php?controller=product&action=index">Về trang danh sách</a>
</form>


