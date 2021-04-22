<?php
/**
 * demo_cookie.php
 * Cookie trong PHP
 * - Cookie dùng lưu thông tin -> biến
 * - Thông tin lưu trong cookie ko mất đi khi
 * đóng trình duyệt, sẽ có thời gian sống
 * - Cookie hay đc sử dụng để quảng cáo, lưu các
 * cấu hình của web
 * - Cookie lưu trên trình duyệt của bạn, còn
 * session lưu trên server -> có thể xem đc cookie
 * của 1 trang web, ko thể xem đc session của
 * trang đó
 * - PHP có sẵn biến $_COOKIE lưu tất cả thông
 * tin về cookie đang có trên trình duyệt, là
 * kiểu mảng
 */
//echo "<pre>";
//print_r($_COOKIE);
//echo "</pre>";
// Thao tác cơ bản với cookie
// + Thêm cookie mới, ko thêm phần tử mới như mảng
//, mà cần dùng hàm sau để thêm
// Thời gian sống tính bằng giây, tính từ thời
//gian hiện tại
setcookie('fullname', 'nvmanh',
    time() + 3600);

// + LẤy giá trị cookie: thao tác giống mảng
//echo $_COOKIE['fullname']; //nvmanh
// + Xóa cookie: ko dùng hàm unset để xóa, dùng
//hàm setcookie, set thời gian sống là số âm /
//thời điểm quá khứ
setcookie('fullname', '',
    time() - 1);


setcookie('address', 'HN',
    time() + 10);
// Không hiển thị đơn giản bằng cách sau đc
//echo $_COOKIE['address']; //HN
echo isset($_COOKIE['address']) ?
    $_COOKIE['address'] : '';

// - Cách xem cookie đang có trên trình duyệt:
// Inspect HTML -> Application, mục Storage ->
// Cookie

echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

// So sánh session và cookie
// - Giống nhau:
// + Đều dùng để lưu trữ thông tin
// + Cách truy cập: có thể truy cập session và
//cookie từ bất cứ nơi đâu trên hệ thống
// - Khác nhau:
// + Session bảo mật hơn cookie, session lưu trên
// server (ko thể xem), cookie lưu trên trình
//duyệt (xem đc)
// + Session mất khi đóng trình duyệt, cookie thì
// ko
// + Session cần khởi tạo thì mới dùng đc, cookie
//ko cần