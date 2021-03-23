<?php
//file1.php
// Nhúng file trong PHP
// - Thực tế website sẽ chia làm các file có mục đích
//riêng
// - Có 2 cơ chế nhúng file: include và require, 4 hàm sau:
// + include
// + include_once
// + require
// + require_once
// - Tạo 1 file file2.php, tạo ngang hàng với file hiện
//tại
// - Bản chất nhúng file: copy tất cả nội dung file2.php
//paste vào vị trị đang nhúng tại file1.php
//include 'file2dsadsasadsa.php';
//include_once 'file2.php';
//include_once 'file2.php';
//include_once 'file2.php';
//include_once 'file2.php';
require 'file2dsadsasda.php';
//include 'file2.php';
echo "<br />";
// Vẫn hiển thị đc giá trị của number, mặc dù trong
//file1.php ko hề thấy khai báo, do đã nhúng file2.php
echo $number;
echo "<h1>Nội dung này có đc hiển thị ko?</h1>";
// + Tổng quát lại:
// - include và requrie chỉ khác nhau về cơ chế hiển thị lỗi
//và thực thi code phía sau đoạn lỗi khi nhúng file
//ko tồn tại
// - _once kiểm tra xem đã nhúng file trc đó hay chưa,
//đảm bảo 1 file chỉ đc nhúng 1 lần duy nhất trên trang
// + Nên dùng hàm require_once để nhúng file