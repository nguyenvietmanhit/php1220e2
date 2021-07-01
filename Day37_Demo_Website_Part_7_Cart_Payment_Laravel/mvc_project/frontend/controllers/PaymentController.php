<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
  public function index() {
    // - Logic xử lý thanh toán: lưu  vào 2 bảng theo thứ tự sau:
    // + Bảng orders
    // + Bảng order_details
    // - Demo tích hợp thanh toán trực tiếp của 1 bên thứ 3 là Ngân lương
    // Chạy file sau: frontend/libraries/nganluong/index.php
    // Xử lý submit form
    // + Debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['submit'])) {
      $fullname = $_POST['fullname'];
      $address = $_POST['address'];
      $mobile = $_POST['mobile'];
      $email = $_POST['email'];
      $note = $_POST['note'];
      // method là phương thức thanh toán: nếu là trực tuyến = 0, nếu là COD = 1
      $method = $_POST['method'];
      // + Validate form: bỏ qua
      // + Xử lý logic thanh toán chỉ khi ko có lỗi xảy ra
      if (empty($this->error)) {
        // - Lưu vào bảng orders trước:
        $order_model = new Order();
        // Gán giá trị từ form cho thuộc tính của model
        $order_model->fullname = $fullname;
        $order_model->address = $address;
        $order_model->mobile = $mobile;
        $order_model->email = $email;
        $order_model->note = $note;
        // price_total: tổng giá trị đơn hàng, chưa có sẵn mà cần phải tính toán ra
        //dựa vào mảng giỏ hàng
        $price_total = 0;
        foreach ($_SESSION['cart'] AS $product_id => $cart) {
          //Thành tiền của từng item
          $total_item = $cart['quantity'] * $cart['price'];
          // Cộng dồn vào tổng ban đầu
          $price_total += $total_item;
        }
        $order_model->price_total = $price_total;
        // payment_status: trạng thái thanh toán đơn hàng: 0 - chưa thanh toán, 1 - Đã thanh toán
        // Khi mới đặt hàng, trạng thái là chưa thanh toán
        $order_model->payment_status = 0;
        // Chú ý với chức năng và cấu trúc bảng hiện tại, thì cần trả về id của order vừa insert,
        //thay vì trả về true/false
        $order_id = $order_model->insert();
//        var_dump($order_id);
        // - Lưu tiếp vào bảng order_details: chứa thông tin chi tiết về đơn hàng: sp tên gì, giá = bao nhiêu, số lượng đặt
        //bằng ? -> dựa vào giỏ hàng để lưu
        // order_details: order_id, product_name, product_price, quantity
        foreach ($_SESSION['cart'] AS $product_id => $cart) {
          $order_detail_model = new OrderDetail();
          // Gán giá trị thật cho thuộc tính của obj
          $order_detail_model->order_id = $order_id;
          $order_detail_model->product_name = $cart['name'];
          $order_detail_model->product_price = $cart['price'];
          $order_detail_model->quantity = $cart['quantity'];
          // Gọi phương thức để insert vào bảng
          $is_insert = $order_detail_model->insert();
//          var_dump($is_insert);
        }

        // Sau khi lưu thành công vào bảng orders và order_details, cần xử lý chuyển hướng user đến trang tương
        //ứng dựa vào phương thức thanh toán mà họ chọn
        // Nếu user chọn thanh toán trực tuyến, thì chuyển hướng sang trang Ngân lượng, tạo session chứa thông tin cần
        //thiết sang trang Ngân lượng

        // + Gửi mail sử dụng thư viện PHPMailer, có thể tham khảo template mail:
        //views/payments/mail_template_order.php
        // Cần gửi 2 mail: 1 mail xác nhận đơn hàng + 1 mail cảm ơn đã đặt hàng
        if ($method == 0) {
          $_SESSION['info'] = [
            'price_total' => $price_total,
            'fullname' => $fullname,
            'email' => $email,
            'mobile' => $mobile,
          ];
          header("Location: index.php?controller=payment&action=online");
          exit();
        }
        // Nếu là thanh toán COD, thì gửi mail cảm ơn, chuyển hướng về trang cảm ơn
        else {
          header('Location: index.php?controller=payment&action=thanks');
          exit();
        }
      }
    }

    $this->content = $this->render('views/payments/index.php');
    require_once 'views/layouts/main.php';
  }

  public function online() {
    //Gọi ra view của trang Ngân lượng, do trang Ngân lượng dùng view riêng, nên ko gọi layout của hệ thống,
    //mà hiển thị ra luôn
    $this->content = $this->render('libraries/nganluong/index.php');
    echo $this->content;
  }
}