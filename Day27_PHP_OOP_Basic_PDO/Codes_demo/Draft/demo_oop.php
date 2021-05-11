<?php
/**
 * demo_oop.php
 * 1 - Lập trình hướng đối tượng
 * - OOP - Object Oriented Programming
 * - Là phương pháp lập trình tiếp cận dựa vào các
 *  đối tượng, khác với lập trình có cấu trúc là cách
 *  tiếp cận theo chức năng
 * - OOP có rất nhiều lợi thế so với lập trình có cấu
 * trúc
 * - OOP là nền tảng chính của các Framework và CMS PHP
 * - Khó tiếp cận với newbie
 * 2 - Các thuật ngữ/cú pháp khai báo trong OOP
 */
// - Class
// Bản thiết kế 1 ngôi nhà trên giấy -> class
// Từ bản thiết kế này -> xây đc rất nhiều ngôi nhà giống
//nhau. Các ngôi nhà thật -> các object - đối tượng
// + Class là 1 khuôn mẫu/bản mẫu của đối tượng
// + Class và object luôn đi kèm với nhau
// + Class sinh ra các object
// + Tên class nên viết hoa ký tự đầu tiên của từng từ
// + 1 file nếu chứa class thì tên file sẽ trùng với tên
// class đó. VD: class Hello -> Hello.php
// + Class đặc trưng bởi thuộc tính/phương thức
class MyPerson {}
class Person {
  // - Phân tích đối tượng cụ thể trc:
  //Đặc điểm của đối tượng đó -> thuộc tính của class
  //Hành vi của đối tượng -> phương thức của class
  // - Thuộc tính của class giống như 1 biến PHP thuần
  // - Phương thức của class giống như 1 hàm PHP thuần
 // + Khai báo các thuộc tính trong class
  public $name;
  public $age;
  public $is_love;
  public $address;
 // + Khai báo phương thức trong class
  public function run() {
    echo "Running";
  }

  public function study() {
    echo "Study";
  }
}

// - Object - Đối tượng
// + Đc tạo ra từ class
// + Đối tượng sinh ra từ class sẽ truy cập/sử dụng
// đc tất cả thuộc tính và phương thức của class đó
// theo 2 phạm vi truy cập: protected/public
$obj_hung = new Person();
var_dump($obj_hung); //object
// Sử dụng đối tượng trên truy cập TT/PT của class, sử
//dụng ký tự ->
$obj_hung->name = 'Hưng';
$obj_hung->age = 30;
$obj_hung->is_love = TRUE;
$obj_hung->address = 'Ha Noi';
$obj_hung->run();
$obj_hung->study();
echo "<pre>";
print_r($obj_hung);
echo "</pre>";
//Tạo 1 đối tượng khác
$obj_phuong = new Person();
$obj_phuong->name = 'Phượng';
$obj_phuong->age = 32;
$obj_phuong->address = 'HCM';
$obj_phuong->is_love = FALSE;
$obj_phuong->run();
$obj_phuong->study();
// - Thuộc tính của class: khai báo như các biến PHP
// thuần
// - Phương thức của class: khai báo như các hàm PHP
//thuần
// - Phương thức khởi tạo của 1 class
// + Các phương thức do bạn tạo ra trong class, khi tạo
//đối tượng phải gọi thủ công phương thức đó
// + Phương thức khởi tạo chạy ngầm, chạy đầu tiên ngay
//khi khởi tạo obj từ 1 class
// + Thường dùng để khởi tạo giá trị mặc định cho chính
//các thuộc tính của class
class TestConstructor {
  // Cú pháp bắt buộc của phương thức khởi tạo
  public function __construct() {
    echo "Text này chạy đầu tiên ngay khi khởi tạo obj";
  }

  public function show() {
    echo 'show';
  }
}
$test1 = new TestConstructor();
$test1->show(); //Show
// - Từ khóa this
// + Sử dụng bên trong 1 class, tham chiếu đến chính
//class đó
// + Bên trong class muốn truy cập chính các TT/PT của nó
// phải sử dụng từ khóa this
// + Sử dụng this bên trong class giống như khi sử dụng
//tên đối tượng bên ngoài class
class TestThis {
  public $name;
  public $age;

  public function show() {
    // Bắt buộc phải dùng $this thì mới truy cập đc
    //TT/PT trong nội bộ class
    $string = "Tên của bạn: $this->name";
    $string .= " Tuổi của bạn: $this->age";
    return $string;
  }
  public function test1() {
    echo 'test1';
  }
  public function test2() {
    $this->test1();
  }
}
$test = new TestThis();
$test->name = 'ABC';
$test->age = 30;
$string = $test->show();
echo $string;
// - Phạm vi truy cập
// + Là các từ khóa đặt trước tên TT/PT, quy định quyền
//truy cập vào TT/PT
// + private, protected, public
// + private: TT/PT private chỉ truy cập đc trong nội bộ
//class, bên ngoài đó sẽ ko truy cập
class TestPrivate {
  private $name;
  public $age;
  private function test1() {
    echo 'test1';
  }
  public function test2() {
    echo $this->name; // nội bộ class truy cập private ok
    $this->test1(); //nội bộ class  truy cập private ok
    echo 'test2';
  }
}
$obj = new TestPrivate();
//$obj->name = 'Hello'; // lỗi, vì đang bên ngoài class
// nên ko thể truy cập đc private
$obj->age = 30; //truy cập ok
// - protected: truy cập đc trong nội bộ class và trong
//class kế thừa từ class đó
class TestParent {
  protected $name;
  private $age;
  public $address;
  public function show() {
    // Nội bộ class truy cập thoải mái
    $this->name = 'abc';
    $this->age = 30;
    $this->address = 'hn';
  }
}
class TestChildren extends TestParent {
  public function demo() {
    // Thử truy cập vào thuộc tính của class cha
    // Sử dụng this tương đương với cả con và cha
    $this->name = 'manh'; // protected -> truy cập oki
//    $this->age = 30; // ko thể truy cập private
    $this->address = 'HN'; //public -> ok
  }
}
$obj = new TestChildren();
//$obj->name = 'Name 1'; // obj truy cập protected đc ko
// -> báo lỗi
// + public: truy cập đc từ mọi nơi, để đơn giản khai
//báo public cho TT/PT
