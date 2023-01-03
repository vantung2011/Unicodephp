<?php
//1. Tính lương
$luong = 15000000;
$thue;
$luongSauThue;
if ($luong > 15000000) {
  $thue = 30 / 100;
  $luongSauThue = $luong - $luong * $thue;
} elseif ($luong >= 7000000 && $luong <= 15000000) {
  $thue = 20 / 100;
  $luongSauThue = $luong - $luong * $thue;
} else {
  $thue = 10 / 100;
  $luongSauThue = $luong - $luong * $thue;
}
echo 'Lương: ' . $luong . '<br>';
echo 'Thuế thu nhập ' . ($thue * 100) . '%: ' . $luong * $thue . '<br>';
echo 'Tiền lương thực nhận: ' . $luongSauThue;
echo '<br>--------------------<br>';

//2.Xét tuổi vào lớp 10
$tuoi = 16;
echo 'Số tuổi: ' . $tuoi . '<br>';
echo ($tuoi >= 16) ? 'Đã đủ tuổi vào 10' : 'Chưa đủ tuổi vào 10';
echo '<br>--------------------<br>';

// Tìm max 3 số
$a = 1;
$b = 2;
$c = 3;
if ($a > $b && $a > $c) {
  echo '$a là số lớn nhất';
} elseif ($b > $a && $b > $c) {
  echo '$b là số lớn nhất';
} elseif ($c > $a && $c > $b) {
  echo 'c là số lớn nhất';
}
//Hoan vi 2 so
echo '<br>--------------------<br>';

$a = 3;
$b = 4;
echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo 'Giá trị của a sau khi hoán vị: ' . $a . '<br>';
echo 'Giá trị của b sau khi hoán vị: ' . $b . '<br>';

//TInh xep hang hoc luc
echo '<br>--------------------<br>';
$kiemTra = 8;
$giuaKy = 8;
$cuoiKy = 8;
$avg = ($kiemTra + $cuoiKy + $giuaKy) / 3;
if ($avg >= 9.0) {
  echo 'Hạng A';
} elseif ($avg >= 7.0 && $avg < 9.0) {
  echo 'Hạng B';
} elseif ($avg >= 5.0 && $avg < 7.0) {
  echo 'Hạng C';
} else {
  echo 'Hạng F';
}
?>