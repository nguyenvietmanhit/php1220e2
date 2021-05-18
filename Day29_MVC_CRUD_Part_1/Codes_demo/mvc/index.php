<?php
session_start();
// Set múi giờ cho hệ thống
// + Thử hiển thị ngày giờ hiện tại xem có đúng múi giờ của VN hay ko?
//Chạy file này để test -> ko phải múi giờ của VN, cần phải set lại múi giờ
date_default_timezone_set('Asia/Ho_Chi_Minh');
//echo date('d-m-Y H:i:s');

/**
 * mvc/index.php
 * - Thứ tự code các file ko trong MVC (ko cố định):
 * + Code file configs/Database.php
 * + Code file mvc/index.php
 *
 *
 * - File index.php: file index gốc của ứng dụng MVC, tên file bắt buộc phải là index
 * - Khi chạy 1 ứng dụng MVC, luôn luôn phải tìm file index.php gốc này để chạy
 * - Trong mô hình MVC, ko hề thấy sự xuất hiện của file index.php này ? MVC là mô hình,
 * code thực tế xuất hiện khái niệm file index.php gốc này
 * - File index gốc nó nằm giữa trình duyệt và controller: bắt các request từ trình duyệt gửi lên,
 * phân tích request này -> gọi đúng controller tương ứng -> MVC -> mọi ứng dụng MVC đều phải chạy qua
 * file index này đầu tiên
 * - Ý tưởng code: phân tích url -> lấy ra đc controller và phương thức tương ứng
 * - URL trong MVC ntn ? Cần tuân theo quy tắc đặt url đúng chuẩn của mô hình MVC đó,
 * với MVC hiện tại thì url bắt buộc phải có định dạng sau:
 * index.php?controller=<tên-controller>&action=<tên-phương-thức-tương-ứng-của-controller>
 * VD url thêm mới sản phẩm:
 * index.php?controller=product&action=create
 * VD url sửa sp:
 * index.php?controller=product&action=edit&id=4
 */
// Demo với url thêm mới sản phẩm: index.php?controller=product&action=create
// - Phân tích url để lấy giá trị của 2 tham số controller và action
// 1 website bao giờ cũng có trang chủ, là trang mà ko có tham số truyền lên -> cần xử lý khi ko truyền
//tham số controller và action thì sẽ nhận controller và action mặc định
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home'; //product
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; //create
// - Biến đổi controller thành đúng tên file controller tương ứng để cbi cho bước nhúng file controller
// THường 1 chức năng sẽ có 1 bộ MVC xử lý. VD:
// Đối tượng sản phẩm: Product.php | products/index,create,edit.php | ProductController.php
// Đối tượng user: User.php | users/index,create,edit.php | UserController.php
// -> biến đổi controller
// Chuyển ký tự đầu tiên thành ký tự hoa
$controller = ucfirst($controller); //Product
$controller .= "Controller"; //ProductController
// - Tạo biến chứa đường dẫn tới file controller tương ứng: tên file controller với mô hình MVC này
//bắt buộc phải có định dạng sau: <tên-controller>Controller.php
$path_controller = "controllers/$controller.php"; //controllers/ProductController.php
// - Trước khi nhúng file controller, cần check nếu đường dẫn ko tồn tại thì báo lỗi die trang
if (!file_exists($path_controller)) {
  die('Page not found - Trang bạn tìm ko tồn tại');
}
// - Nhúng file
require_once "$path_controller";
// - Khởi tạo đối tượng từ controller tương ứng sau khi nhúng file trên,
// để cbi cho bước gọi phương thức tương ứng
$obj = new $controller();
// - OOP - Dùng obj trên để truy cập phương thức: $action, cần ktra phương thức
// có tồn tại trong class hay ko -> giống như tham số controller,
// tham số action cũng có thể bị user
//sửa trên url
if (!method_exists($obj, $action)) {
  die("Ko tồn tại phương thức $action trong class $controller");
}
// - Obj truy cập action để thực thi chức năng
$obj->$action();
//Chạy url sau trên trình duyệt: dùng cách chạy tắt của PHPSTorm, đứng tại file index.php gốc để chạy, gõ thủ công
// ?controller=product&action=create sau tên file
//index.php?controller=product&action=create
// Thực hành lại: tạo lại cấu trúc thư mục mvc, code lại file index gốc ....