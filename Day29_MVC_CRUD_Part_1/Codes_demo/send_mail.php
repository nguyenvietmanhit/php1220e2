<?php
/**
 * send_mail.php
 * Tải tài liệu về, ktra trong thư mục Codes_demo:
 * - Thư mục PHPMailer
 * - File: Cách_tạo_mật_khẩu_ứng_dụng_Gmail.docx
 * Các bạn có thể đọc qua file Cách_tạo_mật_khẩu_ứng_dụng_Gmail.docx
 * - Demo chức năng gửi mail bằng PHP
 * - Website thực tế có rất nhiều chức năng có thể gửi mail: đăng ký, quên mật khẩu,
 * đặt hàng online, thanh toán ..
 * - PHP hỗ trợ 1 hàm có sẵn để gửi mail, thử dùng hàm đó để gửi
 */
// Email ng nhận, set = email của bạn để test cho dễ
//$to = 'nguyenvietmanhit@gmail.com';
//// Tiêu đề mail
//$subject = 'Tiêu đề gửi mail';
//// Nội dung mail
//$body = 'Nội dung mail';
//
//mail($to, $subject, $body);

//Chạy file để test xem có gửi đc mail hay ko ?
// -> báo lỗi -> ko phải mặc định dùng hàm gửi mail có sẵn của PHP là gửi đc mail luôn
// -> gửi mail cần phải cấu hình ở server gửi mail, nếu trên local -> cấu hình file php.ini của XAMPP
//  -> thực tế nên dùng 1 thư viện có sẵn để gửi mail, thay vì phải đi cấu hình server trên local
// -> thư viện PHPMailer, free
// Về nguyên tắc khi sử dụng thư viện: lên docs của thư viên để đọc -> cài đặt và sử dụng ntn
// Search GG: phpmailer: https://github.com/PHPMailer/PHPMailer
// + Tạo 1 file send_mail.php cùng cấp với thư mục PHPMailer
// + Copy code mẫu trên docs ở phần A Simple Example, paste vào đây

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader. comment lại đoạn code này
//require 'vendor/autoload.php';

// + Nhúng 3 file của thư viện PHPMailer theo đúng thứ tự sau:
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
// + Note: Tạo file send_mail.php cùng cấp với thư mục PHPMailer đã tải về

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  // Cấu hình để gửi mail ko bị lỗi font với ký tự có dấu
  $mail->CharSet = 'utf8';
  // Hiển thị debug khi gửi mail
  // TRên local có thể show debug này ra, tuy nhiên khi web chạy thật
  // phải off debug này -> SMTP::DEBUG_OFF
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  // Máy chủ chịu trách nhiệm gửi mail, demo gửi mail sử dụng gmail, host có giá trị sau:
  $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth = true;                                   //Enable SMTP authentication
  // Username là tài khoản Gmail, do đang sử dụng host của Gmail
  $mail->Username = 'nguyenvietmanhit@gmail.com';                     //SMTP username
  // Password: ko phải là password đăng nhập Gmail, là mật khẩu ứng dụng của Gmail
  // Mật khẩu ứng dụng là các mật khẩu mà Gmail cấp cho các ứng dụng từ bên thứ 3
  // Cách lấy mật khẩu ứng dụng: tham khảo file Cách_tạo_mật_khẩu_ứng_dụng_Gmail.docx và làm theo
  $mail->Password = 'axiikibysyiexjjx';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

  //Recipients: cấu hình thông tin người nhận mail
  // + setForm: set tên người gửi mail
  $mail->setFrom('nguyenvietmanhit@gmail.com', 'Nguyễn Viết Mạnh');
  // + addAddress: thêm địa chỉ người gửi
//  $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
  // Dùng chính mail của bạn để test
  $mail->addAddress('nguyenvietmanhit@gmail.com');               //Name is optional
//  $mail->addAddress('nguyenvietmanhit1@gmail.com');               //Name is optional
//  $mail->addReplyTo('info@example.com', 'Information');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

  //Attachments: gửi file đính kèm theo mail
  // Copy 1 file ảnh bất kỳ vào cùng cấp với file hiện tại là file send_mail.php
  $mail->addAttachment('nvmanh.jpg');         //Add attachments
//  $mail->addAttachment('nvmanh.jpg');         //Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content: nội dung mail
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Tiêu đề gửi mail';
  $mail->Body = '<h1>Nội dung mail trong thẻ h1</h1>';
//  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  // Code gửi mail, chạy file này để test xem có gửi đc mail hay ko ?
  $mail->send();
  echo 'Message has been sent';
  //Việc lỗi font sẽ xử lý sau
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Cần 1 bạn thực tập cho ITPlus:
// Biết PHP, OOP, MVC cơ bản là đc -> tinh thần xông pha ko ngại

