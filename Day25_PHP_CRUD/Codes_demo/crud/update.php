<?php
/**
 * update.php
 * Cập nhật sp theo id truyền từ url
 * crud/update.php?id=9
 */
// - Lấy id từ url
$id  = $_GET['id'];
// - Kết nối CSDL lấy sp theo id -> 1 bản ghi
// - Truyền thông tin sp ra form
// - Xử lý submit khá giống Thêm mới
