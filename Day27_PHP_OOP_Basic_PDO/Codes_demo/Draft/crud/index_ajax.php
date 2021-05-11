<?php
/**
 * crud/index_ajax.php
 * - Liệt kê sp bằng cơ chế ajax - tương tác với CSDL
 * mà ko tải lại trang
 * - Ajax - Asynchronous Javascript And XML - cơ chế
 * ko đồng bộ
 * - PHP theo cơ chế đồng bộ -> chức năng code sau phải
 * chờ chức năng trước nó chạy xong thì mới đến lượt ->
 * ngăn xếp - First In First Out
 * - Ko đồng bộ: ko cần chờ chức năng trc chạy xong
 * - Ajax tạo ra website có tính trải nghiệm ng dùng cao
 * -> xử lý tốn công hơn so với PHP thuần
 * - Để đơn giản nên dùng jQuery khi gọi Ajax
 * - Demo chức năng Liệt kê sp bằng Ajax
 */
?>
<a href="#" id="click-ajax">
  Click để show danh sách sp
</a>
<!--Nơi hiển thị kết quả trả về từ ajax-->
<div id="result"></div>

<!--Copy js/jquery-3.5.1.min.js ngang hàng với file
hiện tại-->
<!--Tích hợp jquery vào hệ thống-->
<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  // Click vào thẻ a sẽ gọi ajax
      $('#click-ajax').click(function() {
          // Tạo 1 đối tượng ajax
          var obj_ajax = {
              // Url PHP gửi data từ ajax lên
              url: 'get_product_ajax.php',
              // Phương thức truyền dữ liệu: post/get
              method: 'POST',
              // Data gửi lên PHP, với chức năng liệt
              //kê sp thì ko cần data truyền -> demo
              data: {
                  name: 'Manh',
                  age: 123,
                  address: 'HN'
              },
              // Hàm chứa kết quả trả về từ PHP thông qua
              //tham số data (đặt tên tùy ý)
              success: function(data) {
                  console.log(data);
                  // Xử lý kết quả trả về từ PHP tại đây
                  //thông qua tham số data
                  // Hiển thị nội dung vao selector
                  $('#result').html(data);
              }
          };
          // Cách debug Ajax -> Inspect HTML -> Network
          // Gọi ajax theo cú pháp của jQuery
          $.ajax(obj_ajax);
      });
  });
</script>