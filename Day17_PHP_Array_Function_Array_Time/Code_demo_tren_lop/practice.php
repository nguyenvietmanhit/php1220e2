<?php
//practice.php
// - Bài 1
//Cho biết đây là mảng loại nào
// và tính tổng và tích của các phần tử
// trong mảng sau:
$arrs = [12, 50, 60, 90, 12, 25, 60];
$sum = 0;
$multiple = 1;
foreach ($arrs AS $value) {
  $sum += $value;
  $multiple *= $value;
}
echo "Tổng = $sum, Tích = $multiple";
echo "<br />";
// - Bài 2:
$arrs = ['đỏ', 'xanh', 'cam', 'trắng'];
$do = $arrs[0];
$xanh = $arrs[1];
$cam = $arrs[2];
$trang = $arrs[3];
$string = "Màu <span class='red'>$do</span> là màu yêu thích của Anh, 
<span class='red'>$trang</span> là màu yêu thích của Sơn, 
<span class='red'>$cam</span> là màu yêu thích của Thắng, 
còn màu yêu thích của tôi là màu
 <span class='red'>$xanh</span>";
// - Bài 3
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
echo "<table border='1' cellspacing='0' cellpadding='8'>";
  echo "<tr>";
    echo "<th>Tên khóa học</th>";
  echo "</tr>";
  foreach($arrs AS $course) {
    echo "<tr>";
      echo "<td>$course</td>";
    echo "</tr>";
  }
echo "</table>";
  // Cách trên sẽ phức tạp khi HTML phức tạp, nên
//dùng cú pháp viết tắt của foreach
?>

<table border="1" cellspacing="0" cellpadding="8">
  <tr>
    <th>Tên khóa học</th>
  </tr>
  <?php foreach($arrs AS $course): ?>
    <tr>
      <td><?php echo $course; ?></td>
    </tr>
  <?php endforeach; ?>
</table>

