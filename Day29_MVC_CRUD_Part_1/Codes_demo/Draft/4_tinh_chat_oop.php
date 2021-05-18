<?php
/**
 * 4_tinh_chat_oop.php
 * 4 TÍNH CHẤT CỦA OOP
 * - Tính trừu tượng: thể hiện của các abstract class, được dùng
 * cho mục đích kế thừa
 *
 */
abstract class Person {
  abstract public function getName();

  public function show() {
    echo "abc";
  }
}
/**
 * - Tính đóng gói: thể hiện cho sự che giấu thông tin trong
 * OOP, chính là các phạm vi truy cập: private, protected,
 * public
 *
 * - Tính kế thừa: thể hiện của từ khóa extends, 1 class con
 * có thể kế thừa tất cả thuộc tính/phương thức của class cha
 * có phạm vi truy cập protected và public. PHP hỗ trợ đơn
 * kế thừa
 * - Tính đa hình: thể hiện của các interface, 1 phương thức
 * khi đc implement từ class cụ thể có thể override theo
 * mục đích riêng của từng class đó
 *
 */
  interface Config1 {
    public function sendMail();
    public function getMail();
  }

  class A implements Config1 {

    public function sendMail()
    {
      // TODO: Implement sendMail() method.
    }

    public function getMail()
    {
      // TODO: Implement getMail() method.
    }
  }