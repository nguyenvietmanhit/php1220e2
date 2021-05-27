<?php
// backend/controllers/Controller.php
// Controller cha
class Controller {
  public $page_title; //tiêu đề động của từng trang
  public $error; //thông tin lỗi động của từng trang
  public $content; //nội dung động của view tương ứng

  //Phương thức lấy nội dung file kèm cơ chế truyền biến vào file
  // $file_path: đường dẫn tới file
  // $variables: mảng các biến truyền ra file
  public function render($file_path, $variables = []) {
    extract($variables);
    //Dùng cơ chế bộ nhớ đệm để lưu nội dung file
    ob_start();
    require "$file_path";
    $data = ob_get_clean();
    return $data;
  }
}