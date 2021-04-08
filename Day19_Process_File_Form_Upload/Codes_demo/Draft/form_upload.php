<?php
/**
 * form_upload.php
 * Xử lý upload file với form
 */
// Chú ý:
// + Nếu form có input upload file, bắt buộc form đó
// phải khai báo 2 thông tin sau:
// - method = POST
// - Thêm enctype='multipart/form-data'
// + Không dùng $_POST/$_GET, mà dùng $_FILES để thao
// tác với file


// Giải thích về $_FILES
// - Mảng 2 chiều
// - Các key:
// + name: tên + đuôi file
// + type: định dạng file
// + tmp_name: đường dẫn tạm mà XAMPP tạo ra để lưu file
// + error:
// 0 -> ko có lỗi, file đc upload vào thư mục tạm
// thành công
// 1 -> file upload vượt quá dung lượng cho phép trong
//cấu hình hệ thống
//2, 3, 4 ...
// Chỉ cần quan tâm đến giá trị = 0, nếu error = 0 thì
//xử lý upload, ngược lại thì thôi
// + size: dung lượng file upload, đơn vị là Byte B
// 1Mb = 1024Kb = 1024 * 1024 B

// XỬ LÝ SUBMIT FORM
// + Debug $_POST, $_FILES
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// + Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + Ktra nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Gán biến trung gian để thao tác cho dễ
  $name = $_POST['name'];
  $avatar_arr = $_FILES['avatar']; // mảng 1 chiều
  // + Validate form:
  // Name ko đc để trống: empty
  // File upload phải là ảnh
  // File upload dung lương ko  vượt quá 2Mb
  if (empty($name)) {
    $error = 'Phải nhập tên';
  }
  // Khi xử lý file, luôn phải kiểm tra nếu có upload
  //file thành công thì mới thao tác, luôn phải dựa
  //vào error, nếu = 0 thì mới xử lý
  elseif ($avatar_arr['error'] == 0) {
    // + Validate file upload phải là ảnh,
    // dựa vào đuôi file
    // LẤy đuôi file từ tên file
    $extension = pathinfo($avatar_arr['name'],
        PATHINFO_EXTENSION);
//    var_dump($extension);
    // Chuyển đuôi file về chữ thường
    $extension = strtolower($extension);
    // Tạo mảng chứa danh sách các đuôi file ảnh hợp lệ
    $extension_allow = ['png', 'jpg', 'jpeg', 'gif'];
    if (!in_array($extension, $extension_allow)) {
      $error = "Phải upload file ảnh";
    }
    // + Validate file upload dung lượng < 2MB
    $file_size_b = $avatar_arr['size'];
    // Chuyển về đơn vị MB: 1MB = 1024Kb = 1024 * 1024 B
    $file_size_mb = $file_size_b / 1024 / 1024;
    // Làm tròn giá trị cho đẹp
    $file_size_mb = round($file_size_mb, 2);
//    var_dump($file_size_mb);
    if ($file_size_mb > 2) {
      $error = 'File upload ko đc vượt quá 2MB';
    }
  }
  // + Hiển thị thông tin và upload file nếu ko có lỗi
  //xảy ra
//  if (!$error);
  if (empty($error)) {
    $result .= "Tên: $name <br />";
    // + Xử lý upload file, hiển thị thông tin file ra form
    if ($avatar_arr['error'] == 0) {
      // Tạo thư mục sẽ upload file vào, tạo thư mục
      //uploads ngang hàng với file hiện tại (ko tạo bằng
      //tay), cần tạo thư mục bằng code
      $dir_upload = "uploads";
      // Cần ktra nếu thư mục chưa tồn tại thì mới tạo
      if (!file_exists($dir_upload)) {
        //Tạo thư mục bằng code: make directory
        mkdir($dir_upload);
      }
      // Cần tạo ra tên file mang tính duy nhất để tránh
      //ghi đè file với các file trùng tên
      // Sử dụng hàm time() để lấy thời gian mang tính
      //duy nhất -> trả về số giây từ thời điểm hiện tại
      // so với mốc 01-01-1970
      $filename = time() . "-" . $avatar_arr['name'];
//      var_dump($filename);
      // Chuyển file từ thư mục tạm -> thư mục gốc uploads
      $is_upload =
      move_uploaded_file($avatar_arr['tmp_name'],
        $dir_upload . "/" . $filename);
      var_dump($is_upload);
      // Hiển thị thông tin file ra màn hình
      // Hiển thị ảnh vừa upload
      $result .= "<img src='$dir_upload/$filename'
                    height='100px' /> <br />";
      $result .= "Tên file: {$avatar_arr['name']} <br />";
      $extension = pathinfo($avatar_arr['name'],
          PATHINFO_EXTENSION);
      $result .= "Đuôi file: $extension <br />";
      $result .= "Đường dẫn tạm: {$avatar_arr['tmp_name']}";
      $result .= "Mã lỗi: {$avatar_arr['error']} <br />";
      $file_size_mb = round($avatar_arr['size'] / 1024 /1024,
          2);
      $result .= "Dung lượng: $file_size_mb MB";
    }
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post"
      enctype="multipart/form-data">
  Tên:
  <input type="text" name="name" value="" />
  <br />
  Ảnh đại diện:
  <input type="file" name="avatar" />
  <br />
  <input type="submit" name="submit" value="Show" />
</form>

