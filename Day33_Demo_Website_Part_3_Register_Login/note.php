<?php
/**
 * 1/ Chức năng đăng ký tài khoản
 *  - Form có 2 thông tin cơ bản : username, password , bảng users đã có 2 trường này
 * - Lưu password vào CSDL dạng gì ??? NẾu form user set password = 123456 -> lưu vào bảng user giá trị nào ??
 * -> ko đc lưu password dạng plain text/ user nhập gì lưu y nguyên -> mã hóa password r mới lưu vào CSDL
 * -> dùng các cơ chế mã hóa md5 -> md5 thực tế sẽ ko dùng để mã hóa -> dễ giải mã
 * - Demo dùng cơ chế mã hóa thông dụng của các website thực tế thông qua 1 hàm mà PHP cung cấp
 * Đăng nhập
 * Tìm kiếm danh mục/sản phẩm
 */