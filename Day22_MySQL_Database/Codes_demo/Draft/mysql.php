<?php
/**
 * mysql.php
 * Làm việc với Database MySQL
 * - Từ trc đến giờ -> website đều là web tĩnh
 * - Website bắt buộc phải là web động -> có tương tác
 * với CSDL
 * - Website viết bằng PHP có thể kết nối đc với nhiều
 * CSDL: MySQL, SQL Server, Oracle, SQL Lite, Mongo DB ..
 * - THông dụng nhất luôn là CSDL MySQL
 * - Làm sao để cài đặt CSDL MySQL -> XAMPP
 * - Để quản trị CSDL MySQL, có 2 cách:
 * + Dùng command line: ko hướng dẫn
 * + Dùng giao diện đồ họa: PHPMyadmin, Navicat,
 * WorkBench ...
 * - Dùng PHPMyadmin để quản trị CSDL MySQL
 * - Để truy cập PHPMyamdin: localhost/phpmyadmin
 * - Các thuật ngữ trong CSDL:
 * + Database: tên CSDL: php1020e_test, chứa các bảng
 * + Tables: các bảng lưu trữ thông tin.
 * Bảng users: lưu các thông tin của user
 * Đặt tên bảng ở dạng số nhiều: users, categories,
 * products
 * + Trong bảng có các thuật ngữ sau:
 * a/ Column/Trường-Cột: mô tả cấu trúc bảng
 * VD:bảng users có các trường: id, fullname, age, address
 * b/ Record/Bản ghi: dữ liệu cụ thể của từng đối tương
 * trong bảng
 * VD: bản ghi đầu tiên của bảng users có các thông tin
 * sau: id=1, fullname=nvmanh, age=30, address=HN
 * c/ Khóa chính của bảng: là trường phân biệt các bản
 * ghi với nhau, cơ chế sinh khóa chính thường sẽ để giá
 * trị của khóa chính là số, tự động tăng lên 1 mỗi khi
 * có bản ghi mới sinh ra -> AUTO INCREMENT
 * d/ Khóa ngoại của bảng: FOREIGN KEY, là khóa chính
 * của 1 bảng khác -> các bảng có mối quan hệ -> khoá
 * ngoại liên kết các bảng với nhau
 *
 */