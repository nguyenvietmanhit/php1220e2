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
               // Xử lý trả về, hiển thị cho user biết họ đã thêm sp thành công vào giỏ
               // Inspect HTML, tab Elements, search/ Ctrl + F: ajax-message
               // - Set text và thêm class cho selector .ajax-message
               $('.ajax-message')
                   .html('Thêm sp vào giỏ thành công')
                   .addClass('ajax-message-active');
               // Tự động ẩn message trên sau khoảng thời gian nào đó
               // hàm này có tác dụng thực thi code bên trong nó sau 1 khoảng thời gian tính bằng ms
               setTimeout(function() {
                   $('.ajax-message').removeClass('ajax-message-active');
               }, 3000);
               // Cập nhật tăng số lượng của icon giỏ hàng lên 1
               // Lấy số lượng hiện tại đang có trong giỏ
               var cart_total = $('.cart-amount').html();
               // Tăng biến lên 1
               cart_total++;
               // Set lại giá trị mới cho selector trên
               $('.cart-amount').html(cart_total);
               // Set luôn trên mobile
               $('.cart-amount-mobile').html(cart_total);
           }
       };
       // Gọi ajax dùng cú pháp của jQuery
       $.ajax(obj_ajax);
       // Chạy ứng dụng, cách debug ajax -> xem ajax hoạt động ntn ?
       // Inspect -> Click thêm vào giỏ để gọi ajax -> tab Network -> XHR -> thấy url PHP mà ajax gọi
       // -> click vào URL đó để xem các thông tin của nó
   });
});