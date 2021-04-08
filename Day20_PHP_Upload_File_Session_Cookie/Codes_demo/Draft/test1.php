<?php
session_start();
/**
 * test1.php
 */
//$name = 'nvmanh';
// Demo truy cập sesison có key = fullname từ file
//session.php
// Luôn phải check session đc sinh ra từ đâu, và dùng
//hàm isset, để fix trường hợp dùng trình duyệt ẩn
//truy cập thẳng vào file hiện tại
//echo $_SESSION['fullname'];
echo isset($_SESSION['fullname']) ? $_SESSION['fullname']
    : '';