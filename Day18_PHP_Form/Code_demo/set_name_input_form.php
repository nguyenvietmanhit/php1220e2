<?php
/**
 * set_name_input_form.php
 * Chú ý về cách đặt thuộc tính name cho input
 */
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
<!--
+ Với các input chỉ nhập đc 1 giá trị duy nhất tại
1 thời điểm, thì name ở dạng text đơn thông thường
+ Với các input nhập đc nhiều giá trị tại thời điểm
là checkbox, select dạng multiple, file dạng multiple,
thì name phải ở dạng mảng. VD: jobs[]
-->
<form action="" method="post">
  Nhập tên:
  <input type="text" name="fullname" /><br />
  Nhập pass:
  <input type="password" name="password" /> <br />
  Giới tính:
  <input type="radio" name="gender" value="0" />Nữ
  <input type="radio" name="gender" value="1" />Nam
  <input type="radio" name="gender" value="2" />Khác
  <br />
  Nghề nghiệp:
  <input type="checkbox" name="jobs[]" value="0" />Job 0
  <input type="checkbox" name="jobs[]" value="1" />Job 1
  <input type="checkbox" name="jobs[]" value="2" />Job 2
  <br />
  Select dạng đơn:
  <select name="select_one">
    <option value="0">Option 0</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
  </select>
  <br />
  Select nhiều:
  <select multiple name="select_multiple[]">
    <option value="0">Op 0</option>
    <option value="1">Op 1</option>
    <option value="2">Op 2</option>
  </select>
  <br />
  Ghi chú thêm
  <textarea name="note"></textarea>
  <br />
  <input type="submit" name="submit" value="Info" />
</form>
