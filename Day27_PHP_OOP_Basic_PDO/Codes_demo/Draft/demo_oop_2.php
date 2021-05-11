<?php
/**
 * demo_oop_2.php
 * Tiếp tục các khái niệm cơ bản của OOP
 * - Từ khóa static
 */
class Class1 {
  public $name;
  public function getName() {
    return $this->name;
  }
}
$obj1 = new Class1();
$obj1->name = 'abc';
echo $obj1->getName(); //abc
// - Từ khóa static
// + Bình thường tt/pt của class ko phải static thì để
// truy cập đc nó bắt buộc phải khởi tạo thì mới truy
//cập đc
// + Nếu tt/pt mà đc khai báo dạng static thì ko cần
//khởi tạo đối tượng mà vẫn có thể truy cập đc
// + Khai báo static sau phạm vi truy cập của tt/pt
class TestStatic {
  // Thuộc tính tĩnh
  public static $address = 'Hà Nội';
  public $name = 'Mạnh';
  // Phương thức tĩnh
  public static function show() {
    echo "show";
  }
  public static function info() {
    // Bên trong 1 class, muốn truy cập tt/pt tĩnh sử
    //dụng cú pháp sau:
    // <tên-class>::<tên tt/pt tĩnh>
    // self::<tên tt/pt tĩnh>
    self::$address = 'Test123';
  }
}
// Bên ngoài class, để truy cập tt/pt tĩnh,
// ko khởi tạo đối tượng mà sẽ truy cập theo cú pháp sau:
// <tên-class>::<tên tt/pt>
echo TestStatic::$address; // tên tt có $
TestStatic::show();
TestStatic::info();
// Cú pháp truy cập static cùng cho truy cập hằng số
// của 1 class
class TestConstant {
  //Khai báo hằng trong 1 class bắt buộc phải dùng const
  const PI = 3.14;
}
echo TestConstant::PI; //3.14
// - Từ khóa extends: thể hiện cho tính kế thừa trong OOP
// + Class con kế thừa từ class cha thì class sẽ truy cập
// /sử dụng lại được các tt/pt của class cha có phạm vi
//truy cập = protected, public
// + PHP chỉ hỗ trợ đơn kế thừa, 1 class chỉ kế thừa đc
// 1 class cha
class Person {
  public $name;
  public $age;
  protected $address;
  private $private;
  public function test1() {
    echo 'test1';
  }
  protected function test2() {
    echo 'test2';
  }
}
class Student extends Person {
  public function show1() {
    // Bên trong class con, $this dùng cho cả class cho
    $this->address = 'New address';
    $this->address = 'ABC';
  }
}
$obj = new Student();
//$obj->address = 'Address';
$obj->name= 'Name';
$obj->age = 30;
//$obj->private = '???';
// - Từ khóa abstract
// + Tính trừu tượng của OOP
// + Áp dụng cho class, từ khóa abstract trước từ khóa
//class
// + Sử dụng ở phạm vi thiết kế ban đầu của hệ thống
abstract class TestAbstract {
  // Class abstract khai tt/pt như bình thường
  public $name;
  public function show() {
    echo "HEllo";
  }
  // Phương thức trừu tượng, ko có nội dung, sử dụng từ
  //khóa abstract
  abstract public function config();
}
// + Không thể khởi tạo obj từ 1 class abstract
//$obj = new TestAbstract();
// + Class abstract dùng cho kế thừa
class Test1 extends TestAbstract {
  // Class con bắt buộc phải implement/cụ thể hóa nội dung
  //cho phương thức trừu tượng của class abstract nếu có
  public function config() {
    echo "Config test";
  }
}
// - Từ khóa implements
// + Thực thi các interface
// + Interface tương tự abstract, cũng giống 1 cái khung
//, đứng ở vị trí thiết kế hệ thống mới nhìn ra đc
interface Config {
  // Ko thể khai báo thuộc tính trong interface
//  public $name;
// Không thể khai báo phương thức có nội dung
//    public function test() {
//      echo "test";
//    }
// - Bắt buộc phải là public cho phương thức
    public function sendMail();
    public function getMail();
}
class TestInterface implements Config {
  // Bắt buộc phải cụ thể hóa nội dung phương thức đang
  //có trong interface
  public function sendMail() {
    echo "Sendmail";
  }
  public function getMail() {
    echo "Get mail";
  }
}
// - 1 class có thể implements nhiều interface