<?php
//controllers/Controller.php
/**
 * Class cha của tất cả các controller
 * Chứa thuộc tính / phương thức dùng chung cho controller con
 */
class Controller {
  // Khai báo thuộc tính dùng chung cho controller con kế thừa từ nó
  // + Tiêu đề động của từng trang
  public $page_title;
  // + Thông tin lỗi động của từng trang
  public $error;
  // + Nội dung động của từng trang
  public $content;

  // Khai báo 1 phương thức dùng để lấy nội dung của 1 file bất kỳ, kèm theo cơ chế truyền biến
  //tường mình vào file đó để sử dụng -> lấy nội dung động của view
  // $file_path: đường dẫn tới file muốn lấy nội dung
  // $variables: mảng chứa các biến sẽ truyền ra file để sử dụng
  // file_get_contents:
  public function render($file_path, $variables = []) {
    // + Giải nén mảng biến truyền vào
    extract($variables);
    // + Bắt đầu sử dụng bộ nhớ đệm để đọc nội dung file từ đường dẫn file truyền vào
    ob_start();
    // + Nhúng file để lưu nội dung file vào bộ nhớ đệm
    require "$file_path";
    // + Kết thúc sử dụng bộ nhớ đệm để trả về nội dung file
    $content = ob_get_clean();

    // + Trả về nội dung file vừa đọc đc
    return $content;
  }
}