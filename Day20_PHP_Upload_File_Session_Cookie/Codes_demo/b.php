<?php
/**
 * b.php
 * Muốn sử dụng biến $var1 của file a.php?
 * Cần nhúng file a.php vào thì mới dùng đc
 */
require_once 'a.php';
echo $var1;