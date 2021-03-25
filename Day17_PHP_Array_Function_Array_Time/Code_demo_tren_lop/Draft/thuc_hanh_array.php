<?php
/**
 * thuc_hanh_array.php
 */
//Cho biết đây là mảng loại nào và tính tổng và tích
// của các phần tử trong mảng sau:
$arrs = [12, 50, 60, 90, 12, 25, 60];
$sum = 0;
$multiple = 1;
foreach ($arrs AS $key => $value) {
  $sum += $value;
  $multiple *= $value;
}
echo "Tổng = $sum, Tích = $multiple";

//
$arrs = ['đỏ', 'xanh', 'cam', 'trắng'];
$value1 = $arrs[0]; //đỏ
$value2 = $arrs[1]; //xanh
$value3 = $arrs[2]; //cam
$value4 = $arrs[3]; //trắng
echo "Màu <span style='color: red'>$value1</span> 
là màu yêu thích của";

//
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
?>
<table border="1" cellspacing="0" cellpadding="8">
  <tr>
    <th>Tên khóa học</th>
  </tr>
  <?php foreach ($arrs AS $value): ?>
    <tr>
      <td><?php echo $value; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
