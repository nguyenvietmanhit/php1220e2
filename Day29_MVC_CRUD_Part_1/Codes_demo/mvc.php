<?php
/**
 * mvc.php
 * 1 - Mô hình MVC trong Lập trình hướng đối tượng PHP
 * - Là mô hình kiến trúc phần mềm 3 lớp gồm M - Model, V - View, C - Controller
 * - Là khung để xây dựng ra các website thực tế.
 * Liệu ko dùng MVC dựng web thực tế hay ko?? Có, tuy nhiên code sẽ phức tạp, và các thành
 * viên vào dự án sau rất khó để đọc hiểu code
 * - MVC phổ biến trong Framework và CMS của PHP: 100%
 * - MVC sử dụng OOP làm nền tảng để xây dựng -> phải biết OOP thì mới học đc -> khó
 * - MVC tách biệt ứng dụng web làm 3 thành phần riêng biệt là M - V - C
 * 2 - Thành phần MVC:
 * - M - Model: là các class chịu trách nhiệm tương tác với CSDL, ko nên xử lý logic hoặc
 * hiển thị view ở Model
 * - V - View: là file hiển thị dữ liệu cho người dùng, ko nên viết logic tương tác với
 * CSDL hoặc xử lý logic ở view
 * - C - Controller: là class, đóng vao trò trung gian luân chuyển dữ liệu giữa Model và View,
 * xử lý logic
 * 3 - Luồng xử lý dữ liệu trong MVC
 * - User gửi request lên website của bạn
 * - Controller nhận request
 * - Controller gọi Model để nhờ Model truy vấn CSDL
 * - Model truy vấn xong trả lại dữ liệu cho Controller
 * - Controller gửi dữ liệu đó ra View để nhờ View hiển thị thành HTML
 * - View hiển thị xong trả lại khối HTML đó cho Controller
 * - Controller gửi khối HTML đó về cho user
 * 4 - Tổ chức thư mục của mô hình MVC
 * + Tùy ng tạo ra MVC mà sẽ có cấu trúc thư mục khác nhau
 * + Tạo cấu trúc thư mục như sau:
 * mvc / : thư mục gốc
 *     /assets: chứa tất cả file liên quan đến frontend như HTML, CSS, JS
 *             /css: chứa các file css của ứng dụng
 *                  /style.css: file css chính của ứng dụng
 *            /js: chứa các file js của ứng dụng
 *               /script.js: file js chính
 *           /images: chứa các ảnh tĩnh của trang
 *     /configs: chứa các class thông tin cấu hình như database, cấu hình hệ thống ...
 *            /Database.php: class chứa các hằng số kết nối CSDL theo PDO
 *     /controllers: chứa class controller - C, chú ý về cách đặt tên controller: <tên-controller>Controller.php
 *                 /ProductController.php: controller xử lý sp
 *                 /Controller.php: controller cha để tất cả các controller sẽ kế thừa
 *     /models: chứa các class model - C
 *            /Product.php: model xử lý truy vấn CSDL cho bảng sp
 *            /Model.php: model cha để tất cả model sẽ kế thừa từ nó
 *    /views: chứa các file view của ứng dụng, phân cấp theo từng đối tượng
 *          /products: chứa các file view liên quan đến sp
 *                   /index.php: view liệt kê sp
 *                  /create.php: thêm mới sp
 *                  /update.php: cập nhật sp
 *                  /detail.php: chi tiết sp
 *         /layouts: chứa file bố cục của trang: cấu trúc HTML chứa các thành phần chung như header, footer .., chỉ
 *                   khác ở phần nội dung động theo từng trang
 *                 /main.php: file layout chính của trang
 *    .htaccess: file cấu hình liên quan đến trang như rewrite url, cho phép truy cập trang hay ko ...
 *    index.php: file index gốc của ứng dụng MVC, tên file bắt buộc phải là index.php
 */