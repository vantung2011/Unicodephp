<?php
$numbers = [7, 5, 2, 9, 8];
print_r($numbers);
echo '<br>';
//Tim min max cua mang
$max = $numbers[0];
$min = $numbers[0];
for ($i = 0; $i < count($numbers); $i++) {
  if($numbers[$i] > $max ){
    $max  = $numbers[$i];
  }
  if($numbers[$i] < $min ){
    $min  = $numbers[$i];
  }
}
echo 'So lon nhat trong mang la '. $max;
echo '<br>';
echo 'So nho nhat trong mang la '. $min;
echo '<br>';
//Sap xep mang
echo '<pre>';
print_r($numbers);
echo '<pre>';
for ($i = 0; $i < count($numbers); $i++) {
  for ($j = $i+1; $j < count($numbers); $j++) {
    if($numbers[$i] > $numbers[$j]) {
      $swap = $numbers[$i];
      $numbers[$i] = $numbers[$j];
      $numbers[$j] = $swap;
    }
  }
}
echo '<pre>';
print_r($numbers);
echo '<pre>';
//Chen vao 1 vi tri bat ki
$pos = 2;
$x = 'Hello';
for($i = count($numbers); $i>=$pos; $i--){
  $numbers[$i] = $numbers[$i - 1];
}
$numbers[$pos] = $x;
count($numbers)+1 ;
echo '<pre>';
print_r($numbers);
echo '<pre>';
echo 'Gia tri da chen vao ' . $x . ' vi tri ' . $pos;
?>
