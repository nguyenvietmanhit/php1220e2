//frontend/assets/js/script.js
//File js chính của frontend, hệ thống đã tích hợp jQuery

// document.ready đảm bảo code JS chạy sau cùng ko qtrong vị trí
//chờ HTML CSS chạy xong thì mới chạy code JS
// Cần xóa cache trình duyệt để trình duyệt nhận JS mới: Ctrl + Shift + R
$(document).ready(function() {
   $('.add-to-cart').click(function() {
       // Lấy ra id của sản phẩm vừa click, để cbi cho bước gọi ajax
       var product_id = $(this).attr('data-id');
       // Gọi ajax, truyền id sản phẩm lên cùng ajax
       var obj_ajax = {
           // Url ajax, chính là url mvc
           url: 'index.php?controller=cart&action=add',
           // Phương thức truyền dữ liệu
           method: 'GET',
           // Các tham số truyền lên cùng ajax
           data: {
               // tên tham số: giá trị
               product_id: product_id
           },
           // Nơi nhận kết quả trả về từ PHP thông qua tham số data truyền vào
           success: function(data) {
               console.log(data);
           }
       };
       // Gọi ajax dùng cú pháp của jQuery
       $.ajax(obj_ajax);
       // Chạy ứng dụng, cách debug ajax -> xem ajax hoạt động ntn ?
       // Inspect -> Click thêm vào giỏ để gọi ajax -> tab Network -> XHR -> thấy url PHP mà ajax gọi
       // -> click vào URL đó để xem các thông tin của nó
   });
});