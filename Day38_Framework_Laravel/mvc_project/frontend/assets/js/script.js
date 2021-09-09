// assets/js/script.js
// Gọi sự kiện trên nút Thêm vào giỏ
$(document).ready(function() {
    $('.add-to-cart').click(function () {
       // Lấy ra id của sp vừa click
       var product_id = $(this).attr('data-id');
       // Gọi ajax để nhờ PHP thêm sp hiện
        //tại vào giỏ hàng
        $.ajax({
            url: 'index.php?controller=cart&action=add',
            method: 'POST',
            data: {
                'product_id': product_id
            },
            success: function(data) {
                console.log(data);
                // Hiển thị cho user biết thêm thành công
                $('.ajax-message')
                    .html('Thêm sp vào giỏ thành công')
                    .addClass('ajax-message-active');
                // Chỉ hiển thị message trên trong 3s
                setTimeout(function(){
                    $('.ajax-message')
                    .removeClass('ajax-message-active');
                }, 3000);

                // Tăng số lượng sp trong giỏ lên 1
                // Lấy số lượng hiện tại đang có
                var total = $('.cart-amount').html();
                total++;
                //Set lại giá trị mới
                $('.cart-amount').html(total);
                $('.cart-amount-mobile').html(total);
            }
        });
        // Cách debug ajax
        // Inspect HTML -> Network
    });
});