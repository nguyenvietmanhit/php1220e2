// assets/js/script.js
// File js chính của ứng dụng
// Code JS tích hợp CKEditor vào input của form
$(document).ready(function() {
   // Chú ý khi tích hợp CKEditor:
   //+ CKEditor chỉ tích hợp đc với duy nhất textarea, ko thể tích hợp với
   //input, select, radio ...
   // + Ckeditor sử dụng thuộc tính name của textarea để tích hợp
   // CKEDITOR.replace('description');
   // Check trong tab Console của trình duyệt xem có lỗi JS nào ko, nếu ko có lỗi
    //thì cần xóa cache trình duyệt để trình duyệt nhận code CSS/JS mới:
    //Chrome: Ctrl + Shift + R

   // + Tích hợp cả CKEditor và CKFinder trong 1 dòng lệnh sau:
    CKEDITOR.replace('description', {
        //đường dẫn đến file ckfinder.html của ckfinder
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        //đường dẫn đến file connector.php của ckfinder
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    // Một só trường hợp bị lỗi do PHP đang cấu hình disable thư viện gd trong file php.ini, cần phải
    //setting file này để eabled lên
    // -> mở XAMPP -> Apache -> Config -> php.ini, bỏ dấu ; trước 3 extension sau
    //extension=fileinfo
    //extension=gd2
    // - Sau đó restart lại Apache -> Stop -> Start
});