<!-- 1. Bang cuu chuong -->
<table width="100%" >
  <?php
  $n = 10;
  echo '<tr>';
  for ($i=2; $i <$n ; $i++) {
    echo '<td>';
    for ($j=1; $j <=$n ; $j++) {
      echo $i . 'x' . $j . '=' . $i * $j.'<br>';
    }
    echo '</td>'; 
  }
  echo '</tr>';
  ?>
</table>
<!-- --2 Tong so nguyen tu 1 den N -->

<?php
echo '<br>';
$sum = 0;
$n = 5;
$check = 0;
if($n<2){
  echo 'Tong = 0';
}
else{
  for($i=2; $i<=$n; $i++){
    for($j=1; $j<=$i; $j++){
      if($i%$j==0){
        $check++;
      }
    }
    if ($check == 2) {
      $sum += $i;
    }
    $check = 0;
  }
  echo $sum;
}
echo '<br>';
$n = 10;
$a;
$a1 = 1;
$a2 = 0;
//<!-- 3. Hiển thị N số Fibonaci đầu tiên -->
for ($i = 0; $i <=$n ; $i++) {
    $a = $a1 + $a2;
    $a1 = $a2;
    $a2 = $a;
    echo $a . ' ';  
  }