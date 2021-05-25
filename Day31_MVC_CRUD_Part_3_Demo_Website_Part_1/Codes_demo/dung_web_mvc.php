<?php
/**
 * dung_web_mvc.php
 * Các bước triển khai/xây dựng 1 website thực tế bằng PHP
 * - Cần phải chủ động xây dựng website của riêng bạn!
 *
 * CÁC BƯỚC XÂY DỰNG WEBSITE:
 * B1 - LÊn ý tưởng về website: bán hàng, thi online, tin tức ...
 * B2 - Chuẩn bị giao diện tĩnh cho website: frontend và backend
 * + Tự code cả frontend và backend
 * + Tìm template mẫu trên mạng
 * Ý tưởng: nên tham khảo các website thực tế cùng chủ đề để xem các chức
 * năng trên trang -> xác định đc giao diện tương ứng
 *
 * B3 - Phân tích CSDL từ giao diện tĩnh ở B2
 * Xem toàn bộ các trang giao diện tĩnh
 * Mỗi 1 trang sẽ nhìn từ trên xuống dưới để phân tích xem các phần hiển thị trên trang có cần
 * lưu vào CSDL hay ko ? -> cần lưu -> tạo 1 bảng -> tạo các trường để lưu các thông tin đó
 * Trong tài liệu: cbi sẵn giao diện frontend và backend demo, tại thư mục mockup_html
 * + Tập trung vào giao diện frontend để phân tích CSDL
 * - NẾu lưu thì thông tin động, admin có thể sửa đc thông qua giao diện
 * - Nếu ko lưu -> thông tin tĩnh, chỉ có thể sửa trực tiếp trong code, nếu thông tin ít khi thay
 * đổi thì ko cần lưu vào CSDL
 * - Tạo bảng products, chứa thông tin về sản phẩm -> cần xác định các trường cho bảng này ->
 * các trường đến từ thông tin của sản phẩm -> cần check tất cả các file giao diện chứa
 * thông tin về sản phẩm: index.html, product.html, product_detail.html
 * Phân tích các trường liên quan đến nghiệp vụ của sp:
 * id: khóa chính của bảng, INT
 * title: tên sp, VARCHAR
 * avatar: tên file ảnh sp, VARCHAR
 * price: giá sp, INT
 * category_id: id của danh mục, khóa ngoại liên kết với bảng categories, INT
 * summary: mô tả ngắn cho sp, VARCHAR
 * content: mô tả chi tiết, TEXT
 * seo_title: SEO Google cho title sp, VARCHAR
 * seo_description: SEO mô tả cho sp, VARCHAR
 * seo_keywords: SEO từ khóa của sp, VARCHAR
 * status: trang thái sp, nếu = 0 : ẩn, = 1: hiển thị, TINYINT
 * created_at: ngày tạo: TIMESTAMP
 *
 * - Bảng categories: chứa thông tin về danh mục
 * id: khóa chính
 * name: tên danh mục, VARCHAR
 * avatar: tên file ảnh, VARCHAR
 * description: mô tả thêm cho danh muc TEXT
 * status: trạng thái, TINYINY
 * created_at: ngày tạo , TIMESTAMP
 *
 * - File file_create_db.html: chứa các truy vấn tạo bảng cho website demo
 * + Sử dụng PHPmyadmin tạo CSDL php1220e2_project:
 * CREATE DATABASE IF NOT EXISTS php1220e2_project
 * CHARACTER SET UTF8 COLLATE utf8_general_ci;
 * + Sau khi tạo CSDL, copy nội dung file file_create_db.html vào tab SQL của PHPMyadmin để tạo các bảng
 *
 * B4: Tạo cấu trúc MVC cho website: tạo cấu trúc file/thư mục sau:
 * mvc_project /
 *             /backend: chứa cấu trúc file/thư mục MVC đã học
 *                     /assets
 *                     /configs
 *                     /controllers
 *                     /models
 *                     /views
 *                     /.htaccess
 *                     /index.php
 *            /frontend: chứa cấu trúc file/thư mục MVC đã học
                       /assets
 *                     /configs
 *                     /controllers
 *                     /models
 *                     /.htaccess
 *                     /index.php
 * Tự tạo ở nhà cấu trúc MVC cho thư mục backend và frontend
 *
 * B5: Code
 * + Code backend trước
 * CHÚ Ý: CẦN CHỦ ĐỘNG CHUẨN BỊ PROJECT ĐỂ BẢO VỆ CUỐI KHÓA
 * Crawn data -> kéo dữ liệu từ site khác về làm dữ liệu của mình -> thư viện DOM của PHP
 *
 *
 *
 *
 *
 */