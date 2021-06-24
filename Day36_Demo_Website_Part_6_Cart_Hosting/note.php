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
 * - Từ Menu PHPStorm -> Tools -> Deployment -> Configuration
 */