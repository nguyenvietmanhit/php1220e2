<?php
//views/products/create.php
// Có nên khai báo cấu trúc HTML tại từng file view con hay ko ?
// 1 website thực tế có rất nhiều chức năng -> tương đương rất nhiều view
// -> nếu khai báo khung HTML cho từng view -> lặp lại và ko linh hoạt
// -> cần xây dựng cấu trúc HTML theo kiểu layout động -> chỉ tạo 1 khung HTML duy nhất
//, đổ nội dung động của từng view con vào layout động này
// Mô hình MVC phải sử dụng layout động -> là 1 view
// Bảng products:id, name, price, created_at
?>
<h1>Form thêm mới sp</h1>
<form action="" method="post">
    Nhập tên sp:
    <input type="text" name="name" value="" />
    <br />
    Nhập giá sp:
    <input type="number" name="price" value="" />
    <br />
    <input type="submit" name="submit" value="Lưu" />
<!--  Mọi link trong MVC đều phải tuân theo quy tắc đã đặt ra: url phải có 2 tham số controller và action  -->
    <a href="index.php?controller=product&action=index">Về trang danh sách</a>
</form>

