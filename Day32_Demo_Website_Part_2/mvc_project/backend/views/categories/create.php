<?php
//views/categories/create.php
//Hiển thị form thêm mới category
//categories:id,name,type,avatar,description,status,created_at,updated_at
?>
<h1>Form thêm mới danh mục</h1>
<form action="" method="post">
    <label>Tên danh mục:</label>
    <input type="text" name="name" value="" class="form-control"/>
    <br/>
    <label>Mô tả chi tiết danh mục:</label>
    <textarea name="description" class="form-control"></textarea>
    <br/>
    <input type="submit" name="submit" value="Lưu" class="btn btn-primary" />
</form>
<!--
Với các nội dung chi tiết sẽ cần cho phép người dùng format nội dung và chèn ảnh theo ý của họ
, nên cần tích hợp trình soạn thảo và trình upload ảnh để user thao tác bằng giao diện, vì
user ko biết HTML
- Tích hợp trình soạn thảo CKEditor, các bước tích hợp CKEditor (tích hợp CKEditor trước -> CKFinder)
+ Search CKEditor -> Tải file .rar về -> Giải nén -> copy thư mục ckeditor vào thư mục assets của MVC
+ Nhúng file assets/ckeditor/ckeditor.js vào file layout main.php của hệ thống

- Tích hợp trình upload ảnh CKFinder: mặc định CKEditor ko có chức năng upload ảnh từ máy tính lên -> cần
cài thêm CKFinder
+ Search CKfinder -> Tải file .rar về -> giải nén -> ckfinder -> copy vào thư mục assets của MVC
+ Cần cấu hình CKFinder thì mới sử dụng được -> trong thư mục ckfinder này đã cấu hình sẵn r
+ Tích hợp vào CKEditor
-->