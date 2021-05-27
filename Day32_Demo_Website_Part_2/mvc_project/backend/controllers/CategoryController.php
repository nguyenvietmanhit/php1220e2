<?php
//backend/controllers/CategoryController.php
//Controller quản lý các danh mục
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
//index.php?controller=category&action=create
class CategoryController extends Controller {
  //Phương thức thêm mới danh mục
  public function create() {
    // - Xử lý submit form thêm mới danh mục
    // + Debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // + Ktra nếu submit form thì mới xử lý
    if (isset($_POST['submit'])) {
      // + Tạo biến trung gian
      $name = $_POST['name'];
      $description = $_POST['description'];
      // + Validate form, nếu có lỗi đổ thuộc tính erorr của controller cha
      // + Xử lý logic thêm mới danh mục chỉ khi ko có lỗi xảy ra
      // Cần gọi model để nhờ model thực hiện thêm mới
      $category_model = new Category();
      $category_model->name = $name;
      $category_model->description = $description;
      $is_insert = $category_model->insert();
      var_dump($is_insert);
    }

    // Gọi view để hiển thị form thêm mới, với mô hình MVC sẽ thao tác gọi view như sau:
    // + LẤy nội dung file view tương ứng
    $this->content = $this->render('views/categories/create.php');
    // + Gọi layout để hiển thị nội dung file view
    require_once 'views/layouts/main.php';
  }
}