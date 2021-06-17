<?php
//controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
  public function add() {
    echo "các giá trị hiển thị trong phương thức sẽ là kết quả trả về cho ajax";
    echo "<h2 style='color: red'>Thẻ h2</h2>";
    // Đăng ký tên đề tài sớm, để buổi tới để demo upload code lên host thật của itplus
    // -> làm cho website của bạn chạy thật -> chỉ áp dụng cho bạn có đky đề tài, do trung tâm chỉ hỗ
    //trợ tối đa 10 account upload cho 1 lớp -> đky ở status bên PĐT post
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    $product_id = $_GET['product_id'];
    // Gọi model để lấy sp theo id
    $product_model = new Product();
    $product = $product_model->getById($product_id);
    // Tạo mảng để chứa các thông tin sp sẽ lưu trong giỏ: tên sp, lưu giá sp, avatar, số lượng sp
    $cart = [
      'name' => $product['title'],
      'price' => $product['price'],
      'avatar' => $product['avatar'],
      'quantity' => 1, //mặc định mỗi 1 lần thêm sp vào giỏ sẽ chỉ thêm 1 sp
    ];
    // - Xử lý logic để thêm cart vào session giỏ hàng: key là id của sp, value là mảng $cart,
    // mảng giỏ hàng đặt tên là $_SESSION['cart']
    // + Nếu giỏ hàng chưa từng tồn tại trc đó, thì tạo giỏ hàng, thêm sp đầu tiên vào giỏ
    if (!isset($_SESSION['cart'])) {
//      $_SESSION['cart'] = [
//        $product_id => $cart
//      ];
      $_SESSION['cart'][$product_id] = $cart;
    }
    // ngược lại nếu giỏ hàng đã tồn tại, thì lại check các case sau
    else {
      // Có 2 trường hợp xảy ra: để biết đc sp thêm vào có tồn tại trong mảng giỏ hàng hay chưa, dựa vào
      //key của mảng giỏ hàng => id của sản phẩm => nếu id trùng -> update quantity, ngược lại thêm mới
      // sử dụng hàm array_key_exists để ktra key đã tồn tại trong mảng hay chưa
      $is_key_exist = array_key_exists($product_id, $_SESSION['cart']);
      // + Nếu sp thêm vào giỏ đã tồn tại trong giỏ, cập nhật số lượng của sp đó lên 1: quantity
      if ($is_key_exist) {
        $_SESSION['cart'][$product_id]['quantity']++;
      } else {
        // + NẾu sp thêm vào giỏ chưa tồn tại, thêm sp mới vào giỏ
        $_SESSION['cart'][$product_id] = $cart;
      }
    }
    // Debug giỏ hàng
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";
  }
}