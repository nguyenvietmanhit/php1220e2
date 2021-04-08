<?php
/**
 * form_upload_2.php
 * Demo xử lý upload file trong form
 */
// XỬ LÝ FORM
// + Debug
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";
// + Tạo biến lỗi và kết quả
$error = '';
$result = '';
// + Nếu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo biến
  $avatars = $_FILES['avatar'];
  // + Validate form:
  // File upload phải là ảnh
  // File upload dung lượng <= 2Mb
  // + Xử lý logic bài toán chỉ khi ko có lỗi nào
  //xảy ra
  if (empty($error)) {
    // Xử lý upload file nếu có file tải lên
    if ($avatars['error'] == 0) {
      // + Định nghĩa thư mục sẽ chứa file upload,
      $dir_upload = "uploads";
      // + Code để tạo thư mục, chứ ko tạo thủ
      //công, cần check nếu đường dẫn thư mục
      // chưa tồn tại thì mới tạo: file_exists()
      if (!file_exists($dir_upload)) {
        // Tao thư mục: mkdir : make directory
        mkdir($dir_upload);
      }
      // Xử lý trùng file, tạo ra tên file mang
      //tính duy nhất, sử dụng hàm time() để lấy
      //thời gian hiện tại: số giây tính từ thời
      //điểm hiện tại so với mốc 01/01/1970
//      var_dump(time());
      $filename = time() . "-" . $avatars['name'];
      // + Upload file vào thư mục uploads: PHP
      // chuyển file từ thư mục tạm -> thư mục
      // đích: move_uploaded_file
      $is_upload =
      move_uploaded_file($avatars['tmp_name'],
      "$dir_upload/$filename");
      // + Hiển thị thông tin file vừa upload
      if ($is_upload) {
          $result .= "Tên file sau khi
                upload: $filename <br />";
          $result .= "Đường dẫn tới file upload: 
          $dir_upload/$filename <br />";
          // Đuôi file
        $extension = pathinfo($filename,
            PATHINFO_EXTENSION);
        $result .= "Đuôi file: $extension <br />";
        $result .= "<img src='$dir_upload/$filename' 
        height='100px' /> <br />";
        // Dung lượng file tính bằng Mb
        // 1MB = 1024KB = 1024 * 1024 B
        $file_size_mb = $avatars['size'] / 1024 / 1024;
        $file_size_mb = round($file_size_mb, 2);
        $result .= "Dung lượng file: $file_size_mb MB";
      }
    }
  }
}

?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post"
      enctype="multipart/form-data">
  Chọn ảnh:
  <input type="file" name="avatar" />
  <br />
  <input type="submit" name="submit"
         value="Upload" />
</form>
