<?php
session_start();
/**
 * session.php
 * Session trong PHP
 *  - PHiên làm việc: đăng nhập, giỏ hàng
 *  - Là biến kiểu mảng, dùng lưu thông tin, biến
 * session có thể truy cập từ bất cứ file nào trên
 * hệ thống mà ko cần nhúng file
 * VD: Tạo file a.php và b.php ngang hàng với file
 * hiện tại
 * - Session chỉ mất đi khi xóa thủ công hoặc đóng
 * trình duyệt
 * - PHP tạo sẵn biến $_SESSION lưu tất cả các
 * session trên hệ thống, kiểu mảng
 * - Session lưu trên server, user ko thể biết
 * đc server đang có các session nào
 * - Session bảo mật hơn cookie
 * - Bắt buộc phải khởi tạo session thì mới sử
 * dụng được biến $_SESSION
 *
 */
// + Debug xem tất cả session
// đang có trên hệ thống, báo lỗi, bắt buộc phải
//khởi tạo session trước thì mới sử dụng đc biến
//này
// + Khởi tạo phải ở vị trí đầu tiên của 1 file
// + Thêm dữ liệu cho session, chính là thêm
//phần tử mới vào mảng
$_SESSION['name'] = 'nvmanh';
$_SESSION['address'] = 'hn';
$_SESSION['info'] = [
    'city' => 'hn',
    'district' => 'Hoài Đức',
    'village' => 'Sơn Đồng',
];
// + Lấy giá trị session: giống lấy giá trị của
//phần tử mảng
echo $_SESSION['name']; //nvmanh
// + Xóa session: xóa phần tử mảng
unset($_SESSION['address']);

echo "<pre>";
print_r($_SESSION);
echo "</pre>";