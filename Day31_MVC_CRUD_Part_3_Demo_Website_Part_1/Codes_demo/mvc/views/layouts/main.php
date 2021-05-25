<?php
//views/layouts/main.php
/**
 * File layout động chính của mô hình MVC
 * 1 website có thể có nhiều file layout , tùy chức năng
 * Layout: khung HTML chứa các nội dung động theo từng view
 * CẦn xử lý động cho file layout: các thông tin động tương ứng từng view phải thể hiện ra ở
 * file layout này, file layout này đc nhúng bởi controller
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <title>
      <?php
      //Sử dụng $this được là do file layout này đang được nhúng bởi class controller tương ứng
      echo $this->page_title;
      ?>
    </title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/js/script.js"></script>
  </head>
  <body>
    <div class="header">
      Đây là header chung cho tất cả các view
    </div>

    <div class="main">
<!--    Hiển thị tất cả thông tin lỗi, session tại file layout này, vì chức năng
    nào cũng sẽ gọi file layout này
    -->
      <h3 style="color: red"><?php echo $this->error; ?></h3>
      <?php
      if (isset($_SESSION['success'])) {
          echo $_SESSION['success'];
          unset($_SESSION['success']);
      }

      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      // Lớp mình nghỉ giải lao 10p
      ?>
      <?php
      // Hiển thị nội dung động theo từng view
      echo $this->content;
      ?>
    </div>

    <div class="footer">
      Đây là footer chung cho tất cả view
    </div>
  </body>
</html>
