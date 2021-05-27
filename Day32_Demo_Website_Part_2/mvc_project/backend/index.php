<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//backend/index.php
//File index gốc của ứng dụng: phân tích url MVC, gọi controller tương ứng thực thi
// Demo chức năng THêm mới danh mục:
//index.php?controller=category&action=create
// + Lấy gtri controller và action từ url
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home'; //category
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; //create
// + Chuyển đổi controller thành tên file controller tương ứng: CategoryController
$controller = ucfirst($controller); //Category
$controller .= "Controller"; //CategoryController
// + Nhúng file controller nếu tồn tại, nhúng file phải tư duy từ file index.php gốc của ứng dụng
$path_controller = "controllers/$controller.php";
if (!file_exists($path_controller)) {
  die("Trang bạn tìm ko tồn tại");
}
require_once "$path_controller";
$obj = new $controller();
if (!method_exists($obj, $action)) {
  die("PHương thức $action ko tồn tại trong controller $controller");
}
$obj->$action();
?>