<?php
//controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
  public function add() {
    echo "các giá trị hiển thị trong phương thức sẽ là kết quả trả về cho ajax";
    echo "<h2 style='color: red'>Thẻ h2</h2>";
  }
}