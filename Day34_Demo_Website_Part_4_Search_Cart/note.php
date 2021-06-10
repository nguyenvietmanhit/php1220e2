<?php
//note.php
/**
 * 1/ Demo chức năng tìm kiếm sản phẩm bên frontend:
 * - Ko thể thiếu với bất kỳ 1 website nào
 * - Tìm kiếm có 2 kiểu: tuyệt đối và tương đối
 * Tuyệt đối: muốn mua đt Samsung A7 -> gõ chính xác cả Samsung A7 thì mới tìm đc
 * Tương đối: muốn mua đt Samsung A7 -> gõ sam -> các đt chứa từ sam này
 * - Về truy vấn SQL:
 * tuyệt đối tương đương điều kiện =
 * tương đối dùng từ khóa LIKE: thực tế các website có nhiều data ko sử dụng LIKE -> tốc độ truy vấn rất chậm
 * -> dùng dịch vụ search có trả phí từ bên ngoài: Algolia Search, Elastich Search
 * - Code:
 *  Nên dùng phương thức GET cho form -> copy url gửi cho ng khác -> search đc
 * , ngược lại nếu dùng POST thì ko truyền đc tham số lên url -> gửi cho ng khác -> url gốc
 *
 * 2/ Demo chức năng Giỏ hàng
 * - Chức năng thong dụng website bán hàng:
 * - Giống đi siêu thị, có xe đẩy -> giỏ hàng -> ra quầy thanh toán
 * - Về mặt logic, lưu giỏ hàng theo cơ chế nào ??
 * Database: thông tin lâu dài -> các hệ thống web thực tế lớn -> áp dụng cho tài khoản đã đăng nhập -> tạo bảng
 * - carts: id, user_id, product_cart_id
 * - product_carts: title, price, quantity
 * - user thêm sp vào giỏ: nếu trc đó user chưa từng thêm -> tạo bảng mới theo tên user -> ko đc trùng tên bảng
 * -> insert cart vào bảng vừa tạo
 *
 * Session: thông tin tạm thời -> có thể bị mất -> áp dụng cho demo
 * Cookie: thông tin tạm thời -> có thể bị mất -> thao tác phức tạp hơn session
 *
 * * //File: thông tin lâu dài -> ít lưu theo cách này -> Bỏ qua
 * -> sử dụng Session để lưu giỏ hàng -> quan trọng nhất là cấu trúc của session
 * -> giỏ hàng sử dụng session có cấu trúc dạng sau:
 * - Key của từng phần tử trong giỏ => id của sp
 * - Value của từng phần tử trong giỏ => mảng các thông tin sẽ lưu về sp tương ứng
 *
 */
$carts = [
  5 => [
    'name' => 'Tivi SS',
    'avatar' => 'tivi-ss.jpg',
    'price' => 100,
    'quantity' => 5
  ],
  2 => [
    'name' => 'Tivi Toshiba ',
    'avatar' => 'toshiba.jpg',
    'price' => 200,
    'quantity' => 1
  ],
];
/*
  * - Code chức năng Thêm sp vào giỏ hàng:
  * + Nên dùng ajax cho chức năng này, để tránh tải lại trang mỗi khi thêm vào giỏ -> tạo hiệu ứng tốt
 * cho user -> code phức tạp hơn -> đánh đổi trải nghiệm user lấy sự phức tạp hơn khi code
 * + Sử dụng Ajax của thư viện jQuery cho đơn giản, hơn là dùng Ajax của Javascript thuần
 * + Khi click thêm vào giỏ của sp tương ứng -> gọi Ajax để nhờ PHP thêm sp vào giỏ hàng
 * ->cần có cách nhận biết đang click vào sản phẩm
  */














