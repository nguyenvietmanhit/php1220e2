<?php
/**
 * note_xdebug.php
 * Giới thiệu về XDebug
 * - Có bạn nào đã từng nghe đến niệm XDebug chưa ??
 * - Debug là gì? Là xem thông tin biến, debug code -> fix lỗi -> ktra từng dòng code viết ra, xem giá
 * trị sinh ra sau từng dòng code -> giá trị đó đã đúng với logic lúc bạn code hay chưa ?
 * + Nếu ko dùng Xdebug -> cần kiểm tra thủ công bằng các hàm của PHP như var_dump, echo pre ...
 * -> nếu logic code có 1000 dòng -> cần ktra thủ công 1000 lần -> bất khả thi
 * -> XDebug ktra tự động -> ko cần phải viết thủ công var_dump, echo pre
 * + Code CMS: Wordpress, Zoomla, Magento, Drupal -> các cms này đã code sẵn rất nhiều chức năng, cần dựa vào
 * các chức năng có sẵn để phát triển -> ko nắm rõ luồng chạy của CMS này ntn ? -> Xdebug giúp bạn hình dung rõ hơn
 * chức năng của bạn chạy qua các file nào trc khi đến code của bạn !
 * Nếu code Framework -> code chức năng từ đầu thì Xdebug ko khác biệt lắm về hiểu luồng chạy
 * -> cần biết sử dụng XDebug khi code
 * + Hầu hết các IDE code như PHPStorm, Netbean đều tích hợp sẵn Xdebug
 * + Ktra XDebug hoạt động hay chưa
 * - Bật trình lắng nghe của Xdebug: là icon điện thoại ở trên thanh menu PHPStorm
 * - Tạo ra các breakpoint trong code của bạn: là các điểm dừng mà XDebug sẽ dừng lại để lắng nghe
 * - Chạy lại file
 * -
 */
echo "<h2>Test</h2>";
//note_debug.php?controller=product&action=create
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
//var_dump($controller);
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
//var_dump($action);
// Chuyển ký tự đầu của controller thành chữ hoa
$controller = ucfirst($controller);
//var_dump($controller);
$controller .= "Controller";
// Test với mảng
$string = '1,2,3,4,5,6';
$arrs = explode(',', $string);
$a = 5;
//echo "<pre>";
//print_r($arrs);
//echo "</pre>";
// Nghỉ giải lao 15p