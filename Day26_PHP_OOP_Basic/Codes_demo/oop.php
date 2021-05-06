<?php

/**
 * oop.php
 * Lập trình hướng đối tượng trong PHP
 * - OOP - Object Oriented Programming
 * - Tiếp cận OOP theo hướng lấy đối tượng làm trọng tâm để phân tích
 * - Học OOP là bắt buộc, vì các website thực tế đều xây dựng dựa trên OOP
 * Các thuật ngữ chính trong OOP
 * 1/ Class: Lớp
 * VD: Lớp PHP1220E2 là 1 class, các đối tượng bên trong class cùng chung 1 số những đặc
 * điểm như: cùng học PHP, làm quen với nhiều bạn ....
 * Lớp là 1 khuôn mẫu, tất cả đối tượng sinh ra từ lớp cùng chung các đặc điểm và hành vi nào đó
 * VD: 1 bản vẽ chi tiết ngôi nhà chính là 1 class, từ bản vẽ nãy/ từ class này xây đc nhiều
 * ngôi nhà/ object giống nhau
 * Khai báo class trong OOP, quy tắc khai báo tên class: tên class viết hoa các từ đầu tiên
 * của từng từ
 */
class BanVeNgoiNha
{

}

class Student
{

}

// 2 - Object: Đối tượng
// - Đối tượng là các thực thể cụ thể được sinh ra từ class
// VD: Nếu nhìn vào bản vẽ ngôi nhà / class, ko thể biết đc tên chính xác của ngôi nhà là gì. Chỉ biết đc thông tin
//chính xác khi ngôi nhà đc xây xong -> object đc tạo ra
// - Đối tượng có đặc điểm và hành vi, trong OOP, đặc điểm -> thuộc tính, hành vi -> phương thức
// - Khai báo đối tượng, cần tạo class trước:
class Book
{

}

// Khởi tạo đối tượng từ class trên
$sach_van_hoc = new Book();
$sach_toan = new Book();
// Class và Object luôn đi đôi với nhau
// 3 - Thuộc tính của class: là đặc điểm của class đó, có phạm vi truy cập: private, protected, public
// Dựng chức năng CRUD sinh viên -> lấy đối tượng sinh viên để phân tích ra thuộc tính và phương thức -> class
class Student1
{
  // Khai báo thuộc tính cho 1 class, giống khai báo biến trong PHP thuần, do
  //đang khai báo trong class -> thuộc tính
  public $name;
  public $id;
  public $age;
  public $gender;
}

// tạo đối tượng từ class trên, obj truy cập đc tất cả thuộc tính ở phạm vi public của class
// ký tự truy cập: obj->tên-thuộc-tính-public
$student_a = new Student1();
$student_a->name = 'Nguyen Van A';
$student_a->id = 123456;
$student_a->age = 30;
$student_a->gender = 'Nam';
echo "Tên của bạn: " . $student_a->name;
echo "<br > Tuổi: $student_a->age";// cú pháp tương tự như hiển thị biến trong chuỗi kép
//4 - PHương thức của class: là hành vi của đối tượng, về bản chất phương thức là các hàm trong PHP thuần
class Student2
{
  // KHai báo 2 thuộc tính của class
  public $id;
  public $name;

  // KHai báo phương thức cho class
  public function addStudent()
  {
    echo "addStudent";
  }

  public function editStudent($id)
  {
    echo "Sửa sv $id";
  }
}

// KHởi tạo đối tượng từ class: obj truy cập thuộc tính/phương thức public
$student_c = new Student2();
// Truy cập thuộc tính class
$student_c->id = 456;
$student_c->name = 'Sinh viên C';
// Gọi phương thức
$student_c->addStudent();
$student_c->editStudent(6);

// 5 - Phương thức khởi tạo của class: là 1 phương thức đc tự động chạy đầu tiên ngay khi khởi tạo obj từ class
class Student5
{
  public $id;
  public $name;
  //KHai báo phương thức khởi tạo của class theo đúng cú pháp sau
  // Phương thức khởi tạo thường dùng để khởi tạo giá trị mặc định nào đó cho chính thuộc tính của class
  public function __construct()
  {
    echo "Text này hiển thị đầu tiên khi khởi tạo obj từ class này";
  }

  // PHương thức bình thường
  public function show()
  {
    echo "Show";
  }
}

$student_5 = new Student5();
// chạy file
$student_5->show();//Show
// 6 - Từ khóa this -> từng gặp trong JS -> Tham chiếu đến chính đối tượng hiện tại
// Trong OOP, $this đc bên trong class để tham chiếu đến chính class hiện tại, cho phép thao tác với chính
//thuộc tính/phương thức của class đó
class Student6
{
  public $id;
  public $name;

  public function showName()
  {
    echo "showName";
    echo "Name: $this->name";
  }
}

// Tạo obj
$student_6 = new Student6();
$student_6->name = 'Sinh viên 6';
$student_6->showName(); //showName Name: Sinh viên 6
// 7 - Phạm vi truy cập: là từ khóa đặt trước khai báo thuộc tính/phương thức, set phạm vi truy cập cho TT/PT
// private, protected, public
// + private: riêng tư: pham vi truy cập hẹp nhất: chỉ truy cập đc bên trong nội bộ class, bên ngoài class ko thể
//truy cập đc
class Student7
{
  public $id;
  private $name;

  public function show()
  {
    echo "show";
  }

  private function display()
  {
    echo "display";
    echo $this->name;// không báo lỗi vì đang truy cập nội bộ class
  }
}

// Tạo obj
$student_7 = new Student7();
$student_7->id = 123456;
//$student_7->name = 'Student 7'; // báo lỗi ko thể truy cập private từ bên ngoài class
// Để truy cập đc private, class khai báo thêm các PT get/set ở dạng public
// + protected: rộng hơn private, nội bộ class và class con kế thừa từ nó truy cập đc, ngoài ra ko truy cập đc
class Student71
{
  public $id;
  protected $name;

  public function show()
  {
    echo 'show';
  }

  protected function display()
  {
    echo 'display';
    echo $this->name; //oke
  }
}

class StudentChild extends Student71
{
  public function testChild()
  {
    echo $this->name; //vẫn truy cập đc protected do kế thừa từ class cha
  }
}

// tạo obj
$student_71 = new Student71();
//$student_71->name = 'Student 71'; //báo lỗi: bên ngoài class ko thể truy cập đc
// + public: phạm vi công khai: ở đâu cũng truy cập đc
// 8 - Từ khóa static: tĩnh, khởi tạo lần đầu tiên ngay khi khai báo, nên ko cần tạo đối tượng để truy cập, truy cập
//thẳng luôn, là từ khóa đứng trc tên TT/PT
class Student8
{
  // KHai báo hằng trong class
  const PI = 3.14;

  public static $id;
  public static $name;

  public static function show()
  {
    echo 'show';
    //nội bộ class, ngoài tên class sử dụng từ self để truy cập TT/PT tĩnh
    echo self::$id;
  }
}

// Với TT/PT static, ko thể dùng đối tượng để truy cập, truy cập theo cách sau: tên-class::tên-TT/PT, đây cũng là
//cú pháp truy cập hằng trong class
Student8::$id = 5;
echo Student8::$id; //5
Student8::show();
echo Student8::PI;//3.14
// 9 - Từ khóa extends: dùng cho tính kế thừa trong OOP, dùng rất nhiều
// PHP hỗ trợ đơn kế thừa: tại 1 thời điểm, 1 class chỉ kế thừa duy nhất 1 class
// Class con kế thừa/sử dụng lại đc tất cả TT/PT class cha có phạm vi truy cập protected  và public
class Person
{
  public $name;
  public $age;
}

class Student9 extends Person
{
  // Mặc định class con truy cập đc TT/PT protected và public của class cha
  public function getName()
  {
    echo $this->name;
  }
}

//Từ khóa static tạo ra các TT/PT ở dạng tĩnh, cho phép truy cập TT/PT tĩnh này mà ko cần khởi tạo đối tượng
// Tên-class::tên-TT/PT
// 10 - Từ khóa abstract: tạo ra các class trừu tượng, phải đứng ở phạm vi thiết kế hệ thống thì mới đưa ra đc
//class abstract chuẩn
abstract class Test
{
  // Khác class thường: có các PT ko có nội dung, ko thể khởi tạo obj từ class abstract
  public $name;
  public $age;

  public function show()
  {
    echo 'show';
  }

  //Phương thức trừu tượng
  abstract public function getName();
}

//Cố tình tạo obj từ class abstract sẽ báo lỗi
//$ab1 = new Test();
//Dùng trong tính kế thừa, class kế thừa từ class abstract bắt buộc phải định nghĩa chi tiết cho PT abstract
class Ab1 extends Test
{
  public function getName()
  {
    // TODO: Implement getName() method.
    echo "getName";
  }
}

// 11 - Từ khóa implements: thực thi các interface
// Interface giống như 1 bộ khung cho các class implement từ nó
// Interface ko thể khai báo đc thuộc tính
// Interface chỉ khai báo PT mà ko có nội dung
interface Config {
  //public $id; // không thể khai báo TT trong interface
  public function sendMail();
//  public function show() {
//    echo "show";
//  }
  public function receiveMail();
}
// Tạo class thực thi các interface
// PHP hỗ trợ đa interface: 1 class có thể thực thi nhiều interface tại 1 thời điểm
class Mail implements Config {
  public function sendMail()  {
    // TODO: Implement sendMail() method.
  }

  public function receiveMail()  {
    // TODO: Implement receiveMail() method.
  }
}