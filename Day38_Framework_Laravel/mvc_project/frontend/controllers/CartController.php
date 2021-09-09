<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
  public function add() {
    // + Lấy id của sp truyền lên
    $product_id = $_POST['product_id'];
    var_dump($product_id);
    // + LẤy thông tin sp trong db dựa vào id
    $product_model = new Product();
    $product = $product_model
        ->getById($product_id);
    // + Tạo mảng lưu thông tin cần thiết cho giỏ
    $cart = [
        'name' => $product['title'],
        'price' => $product['price'],
        'avatar' => $product['avatar'],
        'quantity' => 1
    ];
    // + Xử lý thêm vào giỏ hàng (session)
    // Nếu giỏ hàng chưa từng tồn tại
    if (!isset($_SESSION['cart'])) {
      // Tạo mới giỏ hàng, thêm phần tử đầu tiên
//      cho giỏ
      $_SESSION['cart'][$product_id] = $cart;
    }
    // ngược lại giỏ hàng đã tồn tại
    else {
      // Nếu sp thêm vào đã tồn tại thì chỉ cập
      //nhật số lượng tăng lên 1, ko thêm phần
      //tử mới, kiểm tra product id mới thêm có
      //tồn tại trong các key của giỏ hàng hay ko
      if (array_key_exists($product_id,
          $_SESSION['cart'])) {
        $_SESSION['cart'][$product_id]['quantity']++;
      } else {
        $_SESSION['cart'][$product_id] = $cart;
      }
    }

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
  }

  public function index() {
    // Xử lý update Giỏ hàng:
    echo "<pre>";
    print_r($_POST);
    print_r($_SESSION['cart']);
    echo "</pre>";
    if (isset($_POST['submit'])) {
      // Xử lý nếu số lượng là âm thì chuyển hướng
      foreach ($_POST AS $product_id => $quantity) {
        if (is_numeric($quantity) && $quantity < 0){
          $_SESSION['error'] = 'Số lượng phải > 0';
          header('Location: gio-hang-cua-ban.html');
          exit();
        }
      }

      // Cập nhật giỏ hàng bằng cách lặp session
      // giỏ hàng, gán số lượng mới từ form
      //cho từng phần tử trong giỏ
      foreach ($_SESSION['cart']
               AS $product_id => $cart) {
        $_SESSION['cart'][$product_id]['quantity']
        = $_POST[$product_id];
      }
      $_SESSION['success'] = 'Cập nhật giỏ thành công';
    }

    // Lấy nội dung view
    $this->content =
    $this->render('views/carts/index.php');
    // Gọi layout
    require_once 'views/layouts/main.php';
  }

  public function delete() {
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    // Xóa sp khỏi giỏ
    $product_id = $_GET['id'];
    unset($_SESSION['cart'][$product_id]);
    $_SESSION['success'] =
        'Xóa sp khỏi giỏ thành công';
    header('Location: gio-hang-cua-ban.html');
    exit();
  }
}