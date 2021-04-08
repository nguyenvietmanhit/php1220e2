<?php
session_start();
//require_once 'test1.php';
/**
 * session.php
 * Session trong PHP
 * - Bài toán: tạo 1 file test1.php ngang hàng,
 * trong file này khai báo 1 biến $name =
 * '<tên-của-ban>';
 * - Muốn sử dụng biến $name từ file test1.php?
 * - Nếu có 1000 file cùng muốn dùng lại biến $name ->
 * nhúng file 1000 lần
 * - Thay đổi lại cơ chế lưu trữ thông tin -> dùng biến
 * dạng session và cookie để lưu trữ
 * SESSION:
 * - Dùng để lưu trữ thông tin
 * - Biến đc lưu bởi session có thể đc truy cập từ
 * bất cứ đâu trên hệ thống
 * - PHiên làm việc: có thời điểm bắt đầu và kết thúc
 * session. Session bắt đầu khi tạo, kết thúc bằng 1 trong
 * 2 cách: xóa thủ công / đóng trình duyệt
 * - CÁc ứng dụng dùng session: login, giỏ hàng ..
 * - PHP tạo ra 1 biến dạng mảng $_SESSION, chứa tất
 * cả thông tin về session trên hệ thống
 * - Session hoạt động trên Server, user ko thể biết đc
 * server PHP đang có các session nào
 * - Thao tác với session giống hệt thao tác mảng
 * - Luôn phải khởi tạo session thì mới dùng đc biến
 * $_SESSION
 */
//echo $name;
// + Thêm session mới:
$_SESSION['address'] = 'HN';
$_SESSION['info'] = [
  'class' => 'php1020e',
  'amount' => 25
];
// + Hiển thị session
echo $_SESSION['info']['amount']; //25
// + Xóa session:
unset($_SESSION['info']['amount']);

// Chạy file session.php -> sinh ra đc session sau
$_SESSION['fullname'] = 'Nguyễn Viết Mạnh';

echo "<pre>";
print_r($_SESSION);
echo "</pre>";