<?php
require('trait/Builder.php');
require('class/function.php');
$db = new Database();
$sql = $db->table('users')
          ->select('id, name, email')
          ->where('id', ' = ', '? ')->where(' email', ' = ', '? ')
          ->get();
echo $sql;
echo '<br>';
$db2 = new Database();
$insert = $db2->table('users')->create([
   'id' => '1',
   'name' => 'name',
   'email' => 'gmail@gmail.com',
])->add();
echo $insert;

