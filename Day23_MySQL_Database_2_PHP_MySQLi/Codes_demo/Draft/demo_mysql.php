<?php
/**
 * demo_mysql.php
 * Làm việc với CSDL MySQL
 * + Khi cài XAMPP, mặc định đã cài webserver Apache, PHP và
 * CSDL MySQL
 * + Tương tác với CSDL thông qua việc gửi các câu truy vấn -
 * câu SQL (Structure Query Language)
 * + Có cách để thao tác với CSDL MySQL: dùng command line hoặc
 * dùng UI, demo dùng UI - sử dụng phpMyAdmin để quản trị
 * CSDL MySQL (XAMPP cài sẵn r)
 * + Start dịch vụ MySQL trên XAMPP
 *  + Truy cập PHPMyAdmin theo link:
 * http://localhost/phpmyadmin
 * + Mặc định, XAMPP tự động đăng nhập khi truy cập vào
 * PHPMyadmin với username = root và password = '';
 * + Học MySQL với PHP: học cách viết câu truy vấn SQL, chứ ko
 * dựa hoàn toàn vào giao diện PHPMyadmin
 * - Thuật ngữ trong CSDL
 * + Database: tên CSDL
 * + Table: các bảng dùng để chứa dữ liệu. Trong bảng sẽ có
 * thêm 2 thuật ngữ:
 * Cột/trường/: mô tả thông tin cho bảng
 * Bản ghi/record: các dữ liệu cụ thể của đối tượng
 * + VD:
 * Có 1 CSDL: quanlybanhang, có thể có chức năng quản lý laptop,
 * qly user, quản lý news .... -> có các bảng: laptops, users,
 * news ...
 * Thử phân tích bảng user xem có các trường gì:
 * name, age, job, address, is_married, gender ...
 * Thông tin 1 bản ghi/record:
 * name=ABC, age=30, job=Dev, address=ha noi, is_married = true,
 * gender = nam
 * + Khóa chính của 1 bảng (primary key): phân biệt các record/
 *bản ghi với nhau, giữa 2 bản ghi bất kỳ ko thể trùng khóa
 * chính
 * + Khóa ngoại của 1 bảng (foreign key): là khóa chính của bảng
 * khác, là sợi dây liên kết giữa các bảng có mối liên hê
 *
 * 3 - Học các câu truy vấn SQL để tương tác với CSDL MySQL
 * , để test câu SQL, sử dụng PHPMyadmin để viết
 * code và chạy trực tiếp thông qua tab SQL của PHPMyadmin
 *
 */





