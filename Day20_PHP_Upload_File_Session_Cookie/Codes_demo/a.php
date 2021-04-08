<?php
session_start();
/**
 * a.php
 * Thử hiển thị session trên hệ thống
 * Thử mở trình duyệt ẩn, chạy file a.php này
 */
// Khi thao tác với session, luôn phải đảm bảo
//session tồn tại thì mới thao tác đc
//echo $_SESSION['name']; //nvmanh
echo isset($_SESSION['name']) ?
    $_SESSION['name'] : '';

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

