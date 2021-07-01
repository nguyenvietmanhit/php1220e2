<?php
/**
 * note.php
 * 1/ Quy trình đẩy code từ localhost -> server thật
 * - Thuật ngữ:
 * + Hosting: là 1 thư mục trên server, lưu toàn bộ file/thư mục web của bạn,
 * với XAMPP thì mỗi 1 thư mục nằm ngay dưới thư mục htdocs -> trên server là hosting
 * -> thuê hosting -> bên cung cấp host cho phép đẩy code vào thư mục mà họ chỉ định
 * + VPS: là 1 dạng hosting nhưng có cấu hình tốt hơn so với hosting thông thường -> đắt hơn
 * + Domain: tên miền -> là tên để truy cập vào web
 * Nếu ko dùng tên miền -> vẫn truy cập đc web đó thông qua địa chỉ IP của web
 * Tên miền dễ nhớ hơn là địa chỉ IP:
 * VD: Domain: vnexpress.net
 *     IP: vào commandline, gõ: ping vnxpress.net -> nhìn thấy IP
 * Cần mua tên miền, chi phí dựa theo đuôi tên miền: .com rất rẻ, .vn -> đắt
 * 2/ Các bước đẩy code từ localhost -> server thật, sử dụng server free của ITPlus
 * - Giảng viên đã tạo sẵn tài khoản và CSDL
 * - Sử dụng phần mềm gì để đẩy code ?? FileZilla, sử dụng PHPStorm, rất tiện lợi
 * Chú ý: sử dụng tài khoản theo link google excel mà giảng viên cấp, để ko bị chồng chéo nhau
 * _ Khi thuê host: đc cấp: FTP Username, FTP Password, DB NAme, DB Username, DB Password
 * - Cần xác định trc project sẽ đẩy lên, mở project đó bằng PHPStorm, dùng mvc_project từ buổi trước,
 * dùng PHPStorm để mở thư mục này
 * - Từ Menu PHPStorm -> Tools -> Deployment -> Configuration -> click + FTP
 * -> đặt tên Server Name tùy ý
 * - Nhập các thông tin vao, Test Connection -> Ok -> có thể upload code lên server
 * - Bật tab để nhìn trực tiếp thư mục trên server, là thư mục để đẩy code từ localhost lên
 * Menu PHPStorm -> Tools -> Deployment -> Browse Remote Host
 * - Đẩy file/thư mục của project từ localhost lên server bằng cách sau:
 * Chuột phải vào file/thư mục muốn đẩy -> Deployment -> Upload to <tên-server>
 * http://php1220e2-6.itpsoft.com.vn/
 * - CHạy project trên domain thật, domain: php1220e2-10.itpsoft.com.vn đóng vai trò
 * của thư mục htdocs XAMPP
 * http://php1220e2-10.itpsoft.com.vn/frontend
 * http://php1220e2-10.itpsoft.com.vn/backend
 * - CẤu hình CSDL trên server, cần phải sử dụng các thông tin cấu hình DB mà
 * host cung cấp
 * Sử dụng PHPMyAdmin để truy cập DB trên server
 * http://php1220e2-10.itpsoft.com.vn/phpmyadmin
 * - Truy cập vào tên CSDL tương ứng, sử dụng chức năng Import
 * để import file mvc_project.sql
 * - Sửa file kết nối trên localhost cho phù hợp, r đẩy lên
 *
 * 3 / Chức năng Giỏ hàng của bạn
 * mvc_project/frontend/gio-hang-cua-ban.html -> Not found của trình duyệt, vì mọi URL của MVC đều phải
 * tuân theo format: index.php?controller=&action=
 * https://vnexpress.net/lap-ban-chi-dao-chien-dich-tiem-chung-vaccine-covid-19-toan-quoc-4299410.html
 * -> sử dụng Rewrite URL để viết lại url để tạo các đường dẫn thân thiện với user.
 * Hiện này đường dẫn thân thiện là bắt buộc với website thực tế -> SEO web
 * -> Sử dụng file .htaccess để khai báo các URL thân thiện
 * - File .htaccess luôn luôn phài nằm ngang hàng với index.php gốc của mọi ứng dụng MVC
 * - File .htaccess có thể dùng cho nhiều mục đích: cấu hình trang, chặn truy cập -> ko nên chỉnh
 * sửa file này khi ko có kiến thức về nó -> sửa sai 1 ký tự -> die trang
 * - Up đc bao nhiêu project lên server phụ thuộc vào gói host mà
 * bạn mua
 * mvc_project lên server -> abc.vn
 * web1 lên server -> web1.com
 *
 */