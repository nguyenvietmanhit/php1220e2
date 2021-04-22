<?php
/**
 * cookie.php
 */
//echo file_get_contents("https://vnexpress.net");

// Inspect -> Application -> Cookie
// + Khởi tạo cookie, ko giống như thêm phần tử vào mảng
//$_COOKIE['name'] = 'abc';
// Tạo cookie có name=fullname, value=nvmanh, tồn tại
//trong 120s tính từ thời điểm tạo ra
setcookie('fullname', 'nvmanh',
    time() + 5);
// + Lấy giá trị cookie, giống thao tác mảng
echo isset($_COOKIE['fullname']) ? $_COOKIE['fullname']
: '';
// + Xóa cookie: ko xóa dùng hàm unset, dùng hàm
//setcookie -> thời gian sống là số âm
setcookie('fullname', '', time() - 1);

// - Session - Cookie: GIống nhau
// Đều dùng để lưu thông tin
// - Session - Cookie: Khác nhau
// + session lưu trên server, cookie lưu ở
// trình duyêt/client
// + session mất đi khi đóng trình duyệt,
// còn cookie thì ko

echo "<pre>";
print_r($_COOKIE);
echo "</pre>";