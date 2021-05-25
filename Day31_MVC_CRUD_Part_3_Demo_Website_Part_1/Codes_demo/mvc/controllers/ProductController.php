<?php
// - Với mô hình MVC, cần thay đổi tư về đường dẫn tương đối khi nhúng file, luôn phải đứng từ file index gốc của
// mô hình MVC để nhúng file
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
// Khi sử dụng 1 class từ 1 file khác, cần nhúng file chứa class đó thì mới sd đc
//controllers/ProductController.php
// Controller xử lý cho đối tượng product
// Thử chạy lại url ban đầu xem có lỗi khác ko ?
// index.php?controller=product&action=create
class ProductController extends Controller {
  public function create() {
    // + Xử lý submit form trên logic hiển thị ra view, xử lý ở controller
    // - Debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // - Tạo biến chứa lỗi, tuy nhiên với MVC bỏ qua, sử dụng thuộc tính $error của
    //controller cha
    // - Xử lý nếu user submit form
    if (isset($_POST['submit'])) {
      // - Tạo biến trung gian
      $name = $_POST['name'];
      $price = $_POST['price'];
      // - Validate form:
      // + Tên sp ko đc để trống
      // + Tên sp phải chứa ít nhất 3 ký tự trở lên
      if (empty($name)) {
        $this->error = 'Tên sp ko đc để trống';
      } elseif (strlen($name) < 3) {
        $this->error = 'Tên sp phải từ 3 ký tự trở lên';
      }

      // - Xử lý logic chính là thêm sp vào CSDL chỉ khi ko có lỗi xảy ra
      if (empty($this->error)) {
        // + Cần gọi Model để nhờ Model tương tác với CSDL -> thêm sp vào CSDL
        // + Code chuẩn MVC thì sẽ ko viết code tương tác CSDL ở controlelr -> Model
        // Nhúng file model vào để sử dụng đc class tương ứng
        $product_model = new Product();
        // Gán giá trị từ form cho đối tượng trên
        $product_model->name = $name;
        $product_model->price = $price;
        // Gọi phương thức insert trên obj trên
        $is_insert = $product_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm sp thành công';
          // Mọi url trong MVC đều phải tuân theo quy tắc đã đặt ra
          header('Location: index.php?controller=product&action=index');
          exit();
        } else {
          $this->error = 'Thêm sp thất bại';
        }
      }
    }

    // + Sau khi xác định đc phương thức của controller, đi gọi view để hiển thị giao diện trc
    // MVC : Controller gọi View
    // + Lấy nội dung của file view tương ứng sử dụng phương thức render của controller cha, gán vào thuộc tính
    //content của controller cha
    // File view đang nằm ở đường dẫn: views/products/create.php, theo tư duy đứng từ file index gốc
    //để nhúng
    $this->content = $this->render('views/products/create.php');
    // Set tiêu đề trang
    $this->page_title = 'Trang thêm mới sp';
//    echo $this->content;
    // + Gọi layout/nhúng file layout tương ứng để hiển thị nội dung file ở trên
    require_once 'views/layouts/main.php';
  }

  // PHương thức liệt kê sp dựa trên khung MVC đã dựng
  //controllers/ProductController.php
  public function index() {
    // + Gọi model để lấy danh sách sp
    $product_model = new Product();
    $products = $product_model->getAll();
    // + Để view tương ứng hiểu đc các biến từ controller sinh ra, cần
    // truyền biến này ra view trong tham số thứ 2 của phương thức render
    $variables = [
      // Mỗi phần tử mảng sẽ theo cú pháp:
      // tên-biến-sd-ở-view => giá-trị-tương-ứng-ở-controller
      'products' => $products, //view tương ứng sẽ có biến $products
//      'abc' => 123, //view tương ứng sẽ có biến $abc
//      'def' => 'dsadsa', //view tương ứng sẽ có biến $def
    ];
    // + Controller gọi view để hiển thị ds sản phẩm
    // Lấy nội dung view tương ứng
    $this->content = $this->render('views/products/index.php', $variables);
    $this->page_title = 'Trang liệt kê sp';
    // Gọi layout để hiển thị nội dung trên
    require_once 'views/layouts/main.php';
  }

  // Phương thức cập nhật sp theo id
  public function update() {

    // + Lấy sp tương ứng theo id truyền từ url để đổ ra view
    //index.php?controller=product&action=update&id=9
    // Validate id hợp lệ: nếu tham số id ko tồn tại hoặc tồn tại nhưng ko phải số
    // -> ko cho truy cập trang này
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số Id ko hợp lệ';
      header('Location: index.php?controller=product&action=index');
      exit();
    }
    $id = $_GET['id'];
    $product_model = new Product();
    // + Xử lý submit form / đứng trước hiển thị form
    // - Debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // - Ktra nếu user submit form thì mới xử lý
    if (isset($_POST['submit'])) {
      // - Gán biến trung gian
      $name = $_POST['name'];
      $price = $_POST['price'];
      // - Validate: nếu có lỗi sẽ đổ vào thuộc tính error -> bỏ qua
      // - Xử lý cập nhật sp chỉ khi ko có lỗi xảy ra
      if (empty($this->error)) {
        // + Gọi model để cập nhật sp
        // Gán giá trị cho thuộc tính name và price của class
        $product_model->name = $name;
        $product_model->price = $price;
        $is_update = $product_model->update($id);
//        var_dump($is_update);
        if ($is_update) {
          $_SESSION['success'] = 'Cập nhật sp thành công';
          header('Location: index.php?controller=product&action=index');
          exit();
        } else {
          $this->error = 'Cập nhật sp thất bại';
        }
      }
    }
    // + Gọi Model để lấy sp theo id -> MVC -> Controller gọi Model
    $product = $product_model->getOne($id);

    // + Lấy nội dung view và gọi layout để hiển thị view cho user,
    // truyền biến $product ra view để view có thể sử dụng
    $this->content = $this->render('views/products/update.php', [
      'product' => $product
    ]);
    $this->page_title = 'Trang cập nhật sp';
    require_once 'views/layouts/main.php';
  }

  //Phương thức delete
  public function delete() {
    // + Ko cần view
    // + Đoạn validate id copy từ chức năng update
    //index.php?controller=product&action=delete&id=9
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số Id ko hợp lệ';
      header('Location: index.php?controller=product&action=index');
      exit();
    }
    $id = $_GET['id'];
    // + Gọi model để xóa sp theo id
    $product_model = new Product();
    $is_delete = $product_model->delete($id);
//    var_dump($is_delete);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa sp thành công';
    } else {
      $_SESSION['error'] = 'Xóa sp thất bại';
    }
    header('Location: index.php?controller=product&action=index');
    exit();
    // Các bạn nghỉ giải lao 15p
  }
}
//