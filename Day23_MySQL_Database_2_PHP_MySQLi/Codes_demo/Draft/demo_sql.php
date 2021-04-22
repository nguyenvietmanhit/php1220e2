# SQL ko phân biệt hoa thường: create và CREATE là như nhau, từ khóa nên viết hoa
# Kết thúc câu SQL luôn là dấu ;
# SQL rất chặt chẽ về mặt cú pháp
# 1 - Tạo CSDL:
CREATE DATABASE php0720e_test1;
# Tạo CSDL theo cấu trúc đầy đủ, có thể dùng utf8_unicode_ci
# cho COLLATE
CREATE DATABASE IF NOT EXISTS php0720e_mysql
CHARACTER SET utf8 COLLATE utf8_general_ci;
# 2 - Xóa CSDL
DROP DATABASE php0720e_test1;
# 3 - Sử dụng CSDL, muốn tạo bảng thì phải đứng trong CSDL đó
#thì mới tạo đc, tuy nhiên với PHPMyadmin lệnh này sẽ ko có
#tác dụng, chỉ có tác dụng khi viết SQL trong command line
# nên cần click trực tiếp vào CSDL muốn thao tác
USE php0720e_mysql;
# 4 - CÁc kiểu dữ  liệu trong MySQL: số, chuỗi, ngày giờ
# + Kiểu số: tham khảo trong slide, hay dùng nhất là
# TINYINT: pham vi từ -128 -> 127
# INT: phạm vi ~-2 tỷ -> 2 tỷ
# + Kiểu chuỗi: lưu các chuỗi, hay dùng nhất là:
# VARCHAR: lưu chuỗi tối đa 255 ký tự đổ lại
# TEXT: lưu ko giới hạn ký tự
# + Kiểu ngày giờ: lưu định dạng ngày giờ, thường dùng nhất là:
# DATETIME: định dạng ngày giờ theo format YYYY-MM-DD HH:MM:SS, vd 1 giá trị hợp lệ để lưu đc dạng DATETIME: 2020-09-29 20:59:59
# TIMESTAMP: chỉ khác DATETIME ở 1 điểm duy nhất là tự động lưu đc múi giờ của hệ thống, thường dùng cho các trường sinh tự động, vd như trường ngày tạo
#5 - Tạo bảng: categories có các trường sau:
#id: khóa chính, cơ chế tạo theo kiểu mỗi 1 bản ghi sinh ra, tự động tăng giá trị cho trường này lên 1, INT(11)
#name: tên danh mục, VARCHAR (100)
#description: mô tả chi tiết danh mục, TEXT
#status: trạng thái danh mục, 0 - ẩn, 1 - hiện, TINYINT(1)
#created_at: ngày tạo, để tự động sinh khi có bản ghi đc tạo, TIMESTAMP
CREATE TABLE categories(
id INT(11) AUTO_INCREMENT, #khóa chính, tự động tăng
name VARCHAR(100) DEFAULT NULL, #DEFAULT NuLL cho phép name rỗng vẫn đc lưu, ngược lại là NOT NULL
description TEXT,
status TINYINT(1) DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
#sau khi khai báo các trường, set khóa chính, khóa ngoại cho bảng
PRIMARY KEY (id)
);
 
 
