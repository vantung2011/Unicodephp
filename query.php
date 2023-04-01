<?php
require('trait/Builder.php');
require('class/function.php');
$db = new Database();
$sql = $db->table('users')
          ->select('*')
          ->get();
echo $sql;
$getData = $db->getData($sql);
echo '<pre>';
print_r($getData);
echo '</pre>';
echo '<br>';
$db2 = new Database();
$insert = $db2->table('users')->create([
   'id' => '1',
   'name' => 'name',
   'email' => 'gmail@gmail.com',
])->add();
echo $insert;